<?php
$this->menu=array(
	array('label'=>Yii::t('main-ui','Manage Couriers'), 'url'=>array('admin')),
);
$str = Yii::t('main-ui','Create Couriers');
echo"<h1>$str</h1>";
$this->renderPartial('_form', array('model'=>$model)); ?>