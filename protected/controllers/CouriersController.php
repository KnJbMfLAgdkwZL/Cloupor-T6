<?php
class CouriersController extends Controller
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
					'actions'=>array('Support', 'CouriersInfoForSupport', 'PacksInfoForSupport',
						'SupportUpdatePackStatus'),
				'roles'=> array('Support'),
				),
			array('allow',
					'actions'=>array('index','StafferCouriers', 'StafferPacks', 'StafferAddPack',
						'StafferRentalsCourier', 'StaferGetCourier'),
				'roles'=> array('Staffer'),
				),
			array('allow',
					'actions'=>array('Packs', 'SetRequest', 'Request', 'index','view','create','update','admin','delete', 'AdminUpdateCourierStatus'),
				'roles'=> array('Admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionRequest()
	{
		$model = new CActiveDataProvider(
			'Staffercoriers', array(
				'criteria' => array(
					'condition' => 'Request = 0'
				)
			)
		);
		$this->render('Request', array('model'=>$model));
	}
	public function actionPacks()
	{
		$model = new CActiveDataProvider('Packs');
		$this->render('Packs', array('model'=>$model));
	}
	public function actionSetRequest()
	{
		if(isset($_POST['Id']) && isset($_POST['Status']))
		{
			$id = $_POST['Id'];
			$status = $_POST['Status'];
			$model = Staffercoriers::model()->findByPk($id);
			$attributes = $model->attributes;
			$attributes['Request'] = $status;
			$model->attributes = $attributes;
			$model->save();
		}
	}
	public function actionStaferGetCourier($id)
	{
		$Staffer = Yii::app()->user->getId();
		$model = new Staffercoriers;
		$model->attributes = array('IdStaffer'=>$Staffer, 'IdCoriers'=>$id, 'Request'=>0);
		$model->save();
		$this->redirect(array('StafferRentalsCourier'));
	}
	public function actionStafferRentalsCourier()
	{/*SELECT * FROM `couriers` WHERE not exists (SELECT * FROM `staffercoriers` Where staffercoriers.IdCoriers = couriers.Id And staffercoriers.IdStaffer = 27 )*/
		$id = Yii::app()->user->getId();
		$sql = "SELECT * FROM `couriers`
		WHERE not exists
		(SELECT * FROM `staffercoriers`
		Where staffercoriers.IdCoriers = couriers.Id And staffercoriers.IdStaffer = :id)";
		$dataReader = Yii::app()->db->createCommand($sql);
		$dataReader->bindParam(":id", $id, PDO::PARAM_STR);
		$couriers = $dataReader->queryAll();
		$model = new CArrayDataProvider($couriers, array(
			'keyField'=>'Id',
			'sort'=>array(
						'attributes'=>array('Id', 'Country', 'Zip', 'City', 'Street', 'Appartment', 'Name', 'Lastname', 'Start_Date', 'Status', 'Finish_Date', 'Staff_Comment'),
						),
					'pagination'=>array(
						'pageSize'=>10,
						),
			)
		);
		$this->render('StafferRentalsCourier', array('model'=>$model,));
	}
	public function actionStafferAddPack()
	{
		$model = new Packs;
		if(isset($_POST['Packs']))
		{
			$_POST['Packs']['Date'] = date('Y-m-d', strtotime($_POST['Packs']['Date']) + 30000);
			$_POST['Packs']['Staffer'] = Yii::app()->user->getId();
			$_POST['Packs']['Status'] = 0;
			$sum = 0;
			$goods = array();
			foreach($_POST['Goods']['Price'] as $key=>$val)
			{
				$sum += $_POST['Goods']['Count'][$key] * $val;
				$goods[$key]['Merchandise'] = $_POST['Goods']['Merchandise'][$key];
				$goods[$key]['Price'] = $val;
				$goods[$key]['Count'] = $_POST['Goods']['Count'][$key];
				$goods[$key]['Shop_link'] = $_POST['Goods']['Shop_link'][$key];
			}
			$_POST['Packs']['Summ'] = $sum;
			$model->attributes = $_POST['Packs'];
			if($model->save())
			{
				foreach($goods as $key=>$val)
				{
					$good = new Goods;
					$val['PacksId'] = $model->Id;
					$good->attributes = $val;
					$good->save();
				}
				$this->redirect(array('StafferPacks'));
			}
		}
		else
		{
			$this->render('StafferAddPack', array('model'=>$model,));
		}
	}
	public function actionStafferCouriers()
	{
		$id = Yii::app()->user->getId();
		$model = new CActiveDataProvider('Staffercoriers', array(
		'criteria' => array(
		'condition' =>
			'IdStaffer = :id
			AND IdCoriers = Coriers.Id
			AND Request = 1',
		'params' => array('id' => $id ),
		'with' => array('Coriers'),
		),));
		$this->render('StafferCouriers', array('model'=>$model,));
	}
	public function actionStafferPacks()
	{
		$id = Yii::app()->user->getId();
		$model = new CActiveDataProvider('Packs', array(
			'criteria'=>array(
				'condition'=>'Staffer = :Id',
				'params'=>array(':Id'=>$id),
				'with' => array('couriertb'),
						)));
		$this->render('StafferPacks',array('model'=>$model ,));
	}
	public function actionSupport()
	{
		$id = Yii::app()->user->getId();
		$model = new CActiveDataProvider('Couriers', array(
			'criteria'=>array(
				'condition' => ('Support = :id'),
				'params' => array('id' => $id ),
				),));
		$this->render('Support',array('model'=>$model,));
	}
	public function actionSupportUpdatePackStatus()
	{
		if(isset($_POST['Id']) && isset($_POST['Status']))
		{
			$id = $_POST['Id'];
			$status = $_POST['Status'];
			$model = Packs::model()->findByPk($id);
			$attributes = $model->attributes;
			$attributes['Status'] = $status;
			$model->attributes = $attributes;
			$model->save();
		}
	}
	public function actionAdminUpdateCourierStatus()
	{
		if(isset($_POST['Id']) && isset($_POST['Status']))
		{
			$id = $_POST['Id'];
			$status = $_POST['Status'];
			$model = Couriers::model()->findByPk($id);
			$attributes = $model->attributes;
			$attributes['Status'] = $status;
			$model->attributes = $attributes;
			$model->save();
		}
	}
	public function actionCouriersInfoForSupport($id)
	{
		$sid = Yii::app()->user->getId();
		$model = new CActiveDataProvider('Packs', array(
			'criteria'=>array(
				'condition'=>'couriertb.Support = :Id AND Courier = :id',
				'params'=>array(':Id'=>$sid, ':id'=>$id),
				'with' => array('couriertb'),
			),));
		$this->render('CouriersInfoForSupport',array('model'=>$model,));
	}
	public function actionPacksInfoForSupport()
	{
		$id = Yii::app()->user->getId();
		$model = new CActiveDataProvider('Packs', array(
			'criteria'=>array(
				'condition'=>'couriertb.Support = :Id',
				'params'=>array(':Id'=>$id),
				'with' => array('couriertb'),
			)));
		$this->render('PacksInfoForSupport',array('model'=>$model ,));
	}
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$attributes = $model->attributes;
		$attributes['DOB'] = date('m/d/Y', $attributes['DOB']);
		$attributes['Start_Date'] = date('m/d/Y', $attributes['Start_Date']);
		$attributes['Finish_Date'] = date('m/d/Y', $attributes['Finish_Date']);
		$model->attributes = $attributes;

		$this->render('view',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new Couriers;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Couriers']))
		{
			$_POST['Couriers']['DOB'] = strtotime($_POST['Couriers']['DOB']) + 30000;
			$_POST['Couriers']['Start_Date'] = strtotime($_POST['Couriers']['Start_Date']) + 30000;
			$_POST['Couriers']['Finish_Date'] = strtotime($_POST['Couriers']['Finish_Date']) + 30000;

			$model->attributes=$_POST['Couriers'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$attributes = $model->attributes;
		$attributes['DOB'] = date('m/d/Y', $attributes['DOB']);
		$attributes['Start_Date'] = date('m/d/Y', $attributes['Start_Date']);
		$attributes['Finish_Date'] = date('m/d/Y', $attributes['Finish_Date']);
		$model->attributes = $attributes;

		if(isset($_POST['Couriers']))
		{
			$_POST['Couriers']['DOB'] = strtotime($_POST['Couriers']['DOB']) + 30000;
			$_POST['Couriers']['Start_Date'] = strtotime($_POST['Couriers']['Start_Date']) + 30000;
			$_POST['Couriers']['Finish_Date'] = strtotime($_POST['Couriers']['Finish_Date']) + 30000;

			$model->attributes=$_POST['Couriers'];
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
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Couriers');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionAdmin()
	{
		$model = new Couriers('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Couriers']))
			$model->attributes=$_GET['Couriers'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function loadModel($id)
	{
		$model=Couriers::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='couriers-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}