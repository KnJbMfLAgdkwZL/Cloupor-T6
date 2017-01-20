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
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/MyStyle.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
		-->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/JavaScript/jquery-2.1.1.js"></script>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<style>
			.local
			{
				position: absolute;
			}
			.litem
			{
				cursor: pointer;
				color: darkcyan;
				margin: 1px;
			}
		</style>
	</head>
	<body>
		<span class="local">
			<a class="litem" href="?r=site/ChangeLanguage&Lang=en">Eng</a>
			<a class="litem" href="?r=site/ChangeLanguage&Lang=ru">Rus</a>
		</span>
		<div class="container" id="page">
			<div id="header">
			</div>
			<div id="mainmenu">
			<?php
				$arr = array();
				$role = Yii::app()->user->getRole();
				if(!Yii::app()->user->isGuest)
				{
					$arr[] = array('label'=>Yii::t('main-ui', 'Home'), 'url'=>array('/site/index'));
					if($role == 'Admin')
					{
						$arr[] = array('label'=>Yii::t('main-ui', 'Users'), 'url'=>array('/Users/admin'));
						$arr[] = array('label'=>Yii::t('main-ui', 'Couriers'), 'url'=>array('/Couriers/admin'));
						$arr[] = array('label'=>Yii::t('main-ui', 'Request'), 'url'=>array('/Couriers/Request'));
						$arr[] = array('label'=>Yii::t('main-ui', 'Packs'), 'url'=>array('/Couriers/Packs'));
						$arr[] = array('label'=>Yii::t('main-ui', 'Settings'), 'url'=>array('/News/admin'));
						$arr[] = array('label'=>Yii::t('main-ui', 'Skup'), 'url'=>array('/Skup/admin'));
					}
					if($role == 'Support')
					{
						$arr[] = array('label'=>Yii::t('main-ui', 'All couriers'), 'url'=>array('/Couriers/Support'));
						$arr[] = array('label'=>Yii::t('main-ui', 'All packs'), 'url'=>array('/Couriers/PacksInfoForSupport'));
					}
					if($role == 'Staffer')
					{
						$arr[] = array('label'=>Yii::t('main-ui', 'My couriers'), 'url'=>array('/Couriers/StafferCouriers'));
						$arr[] = array('label'=>Yii::t('main-ui', 'My packs'), 'url'=>array('/Couriers/StafferPacks'));
					}
					$arr[] = array('label'=>Yii::t('main-ui', 'Logout').' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest);
					$this->widget('zii.widgets.CMenu',
						array(
								'items'=>$arr,
								'htmlOptions' => array('class' => 'navbar navbar-default'), 	
							)
					);
				}
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