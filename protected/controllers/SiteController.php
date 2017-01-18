<?php
class SiteController extends Controller
{
	public function actions()
	{
		/*return array(
			'page'=>array(
				'class'=>'CViewAction',
			),
		);*/
	}
	public function actionError()
	{
		if($error = Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	public function actionChangeLanguage($Lang)
	{
		Yii::app()->session['language'] = $Lang;
		//$this->redirect(Yii::app()->homeUrl);
		$this->redirect($_SERVER['HTTP_REFERER']);
	}
	public function actionIndex()
	{
		$model = new LoginForm;
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		if(Yii::app()->user->isGuest)
		{
			$this->render('login',array('model'=>$model));
		}
		else
		{
			$id = Yii::app()->user->getId();
			$sql = "SELECT * FROM `news` WHERE news.OnlyFor = :role
				AND not exists 
					(SELECT * FROM `newsshown` 
					WHERE newsshown.IdNews = news.Id
					AND newsshown.IdUsers = :id)
                ORDER BY news.Id DESC
                LIMIT 10";
			$role = Yii::app()->user->getRole();
			if($role == 'Admin')//1
			{
				$this->render('indexAdmin');
			}
			elseif($role == 'Support')//2
			{
				$role = 2;
				$dataReader = Yii::app()->db->createCommand($sql);
				$dataReader->bindParam(":id", $id, PDO::PARAM_STR);
				$dataReader->bindParam(":role", $role, PDO::PARAM_STR);
				$news = $dataReader->queryAll();
				$model = new CArrayDataProvider($news, array(
					'keyField'=>'Id',
					'sort'=>array('attributes'=>array('Id', 'Header', 'Body', 'Date', 'OnlyFo')),
					'pagination'=>array('pageSize'=>10)
					)
				);
				$this->render('indexSupport', array('model'=>$model));
			}
			elseif($role == 'Staffer')//3
			{
				$role = 3;
				$dataReader = Yii::app()->db->createCommand($sql);
				$dataReader->bindParam(":id", $id, PDO::PARAM_STR);
				$dataReader->bindParam(":role", $role, PDO::PARAM_STR);
				$news = $dataReader->queryAll();
				$model = new CArrayDataProvider($news, array(
					'keyField'=>'Id',
					'sort'=>array('attributes'=>array('Id', 'Header', 'Body', 'Date', 'OnlyFo')),
					'pagination'=>array('pageSize'=>10)));

				$now = new Skup('search');
				$now->unsetAttributes();
				$now->attributes = array('Skupforever'=> 0);
				if(isset($_GET['Skup']))
					$now->attributes = $_GET['Skup'];

				$forever = new Skup('search');
				$forever->unsetAttributes();
				$forever->attributes = array('Skupforever'=> 1);
				if(isset($_GET['Skup']))
					$forever->attributes = $_GET['Skup'];

				$this->render('indexStaffer', array('model'=>$model,'now'=>$now,'forever'=>$forever,));
			}
		}
	}
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}