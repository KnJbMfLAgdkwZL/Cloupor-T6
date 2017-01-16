<?php
class UsersController extends Controller
{
	public $layout='//layouts/column2';
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('view','create','update','admin','delete'),
				'roles'=> array('Admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionView($id)
	{
		$info = $this->loadModel($id);
		$role = $info->Role;
		if($role == 1)//Admin Info
		{
			$this->render('view',array('model'=>$info));
		}
		if($role == 2)//Support Info
		{
			$sql = "
			SELECT
				packs.Id, packs.Date, 
				couriers.Lastname, 
				couriers.Name, 
				packs.Track, 
				packs.Skup_reShip, 
				users.Login,
				users.Id As StaferId,
				couriers.Id AS CourierId
			FROM packs, couriers, users 
			WHERE packs.Courier = couriers.Id 
			AND users.Id = packs.Staffer 
			AND couriers.Support = :id";
			$dataReader = Yii::app()->db->createCommand($sql);
			$dataReader->bindParam(":id", $id, PDO::PARAM_STR);
			$couriers = $dataReader->queryAll();
			$model = new CArrayDataProvider($couriers, array(
				'keyField'=>'Id',
				'sort' => array(
					'attributes'=>array('Id', 'Date', 'Courier', 'Track', 'Skup_reShip', 'Staffer'),),
				'pagination' => array('pageSize'=>10,),)
			);
			$name = $info->Login;
			$this->render('SupportPacks', array('model'=>$model, 'name'=>$name));
		}
		if($role == 3)//Stuffer Info
		{
			$name = $info->Login;
			$model = new CActiveDataProvider('Packs', array(
				'criteria'=>array(
							'condition'=>'Staffer = :Id',
							'params'=>array(':Id'=>$id),
							'with' => array('couriertb'),
							)));
			$this->render('StafferPacks',array('model'=>$model, 'name'=>$name));
		}
		//$this->render('view',array('model'=>$info));
	}
	public function actionCreate()
	{
		$model = new Users;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Users']))
		{
			$model->attributes = $_POST['Users'];
			$model->attributes = $this->SafePassword($model->attributes);

			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
			else
			{
				$arr = $model->attributes;
				$arr['Password'] = '';
				$model->attributes = $arr;
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function SafePassword($attributes)
	{
		if($attributes['Password'] != '')
			$attributes['Password'] = CPasswordHelper::hashPassword($attributes['Password']);
		else if($attributes['Id'] != null)
		{
			$old = Users::model()->findByPk($attributes['Id']);
			$attributes['Password'] = $old->attributes['Password'];
		}
		return $attributes;
	}
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		$arr = $model->attributes;
		$arr['Password'] = '';
		$model->attributes = $arr;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Users']))
		{
			$model->attributes = $_POST['Users'];
			$model->attributes = $this->SafePassword($model->attributes);
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}