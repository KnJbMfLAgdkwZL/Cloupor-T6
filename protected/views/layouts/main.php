<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
		<!--
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
		-->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/JavaScript/jquery-2.1.1.js"></script>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>
	<body>
		<div class="container" id="page">
			<div id="header">
			</div>
			<div id="mainmenu">
			<?php
				$arr = array();
				$role = Yii::app()->user->getRole();
				if($role == 'Admin')
				{
					$arr[] = array('label'=>'Home', 'url'=>array('/site/index'));
					$arr[] = array('label'=>'Users', 'url'=>array('/Users/admin'));
					$arr[] = array('label'=>'Couriers', 'url'=>array('/Couriers/index'));
					$arr[] = array('label'=>'Request', 'url'=>array('/Couriers/Request'));
					$arr[] = array('label'=>'Packs', 'url'=>array('/Couriers/Packs'));
					$arr[] = array('label'=>'Settings', 'url'=>array('/News/admin'));
					$arr[] = array('label'=>'Skup', 'url'=>array('/Skup/index'));
					$arr[] = array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest);
				}
				if($role == 'Support')
				{
					$arr[] = array('label'=>'Home', 'url'=>array('/site/index'));
					$arr[] = array('label'=>'All couriers', 'url'=>array('/Couriers/Support'));
					$arr[] = array('label'=>'All packs', 'url'=>array('/Couriers/PacksInfoForSupport'));
					$arr[] = array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest);
				}
				if($role == 'Staffer')
				{
					$arr[] = array('label'=>'Home', 'url'=>array('/site/index'));
					$arr[] = array('label'=>'My couriers', 'url'=>array('/Couriers/StafferCouriers'));
					$arr[] = array('label'=>'My packs', 'url'=>array('/Couriers/StafferPacks'));
					$arr[] = array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest);
				}
				$this->widget('zii.widgets.CMenu', array('items'=>$arr,));
			?>
			</div>
			<?php
				echo $content;
			?>
			<div class="clear">
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>