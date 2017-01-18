<?php
$this->menu=array(
	array('label'=>Yii::t('main-ui','Create Skup'), 'url'=>array('create')),
	array('label'=>Yii::t('main-ui','View Skup'), 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>Yii::t('main-ui','Manage Skup'), 'url'=>array('admin')),
);
$str = Yii::t('main-ui','Update Skup');
echo "<h1>$str {$model->Merchandise}</h1>";

$this->renderPartial('_form', array('model'=>$model));
?>