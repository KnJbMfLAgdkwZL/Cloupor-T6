<?php
/* @var $this SkupController */
/* @var $model Skup */

$this->breadcrumbs=array(
	'Skups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Skup', 'url'=>array('index')),
	array('label'=>'Manage Skup', 'url'=>array('admin')),
);
?>

<h1>Create Skup</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>