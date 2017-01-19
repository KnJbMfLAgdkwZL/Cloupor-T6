<?php
$this->menu=array(
	array('label'=>Yii::t('main-ui','Create Couriers'), 'url'=>array('create')),
	array('label'=>Yii::t('main-ui','View Couriers'), 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>Yii::t('main-ui','Manage Couriers'), 'url'=>array('admin')),
);
?>
<h1><?= Yii::t('main-ui','Update Couriers'); ?> <?php echo $model->Lastname.' '.$model->Name; ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>