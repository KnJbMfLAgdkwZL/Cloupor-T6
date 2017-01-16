<?php
/* @var $this SkupController */
/* @var $model Skup */

$this->breadcrumbs=array(
	'Skups'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Skup', 'url'=>array('index')),
	array('label'=>'Create Skup', 'url'=>array('create')),
	array('label'=>'View Skup', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Skup', 'url'=>array('admin')),
);
?>

<h1>Update Skup <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>