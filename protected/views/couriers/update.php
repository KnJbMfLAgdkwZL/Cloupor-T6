<?php
/* @var $this CouriersController */
/* @var $model Couriers */

$this->breadcrumbs=array(
	'Couriers'=>array('index'),
	$model->Name=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Couriers', 'url'=>array('index')),
	array('label'=>'Create Couriers', 'url'=>array('create')),
	array('label'=>'View Couriers', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Couriers', 'url'=>array('admin')),
);
?>

<h1>Update Couriers <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>