<?php
/* @var $this CouriersController */
/* @var $model Couriers */

$this->breadcrumbs=array(
	'Couriers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Couriers', 'url'=>array('index')),
	array('label'=>'Manage Couriers', 'url'=>array('admin')),
);
?>

<h1>Create Couriers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>