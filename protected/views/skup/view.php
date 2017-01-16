<?php
/* @var $this SkupController */
/* @var $model Skup */

$this->breadcrumbs=array(
	'Skups'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Skup', 'url'=>array('index')),
	array('label'=>'Create Skup', 'url'=>array('create')),
	array('label'=>'Update Skup', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Skup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Skup', 'url'=>array('admin')),
);
?>

<h1>View Skup #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Goods',
		'Comment',
		'No1',
		'No2',
		'No3',
		'Skupforever',
	),
)); ?>
