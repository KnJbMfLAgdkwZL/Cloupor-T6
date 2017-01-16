<?php
/* @var $this SkupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Skups',
);

$this->menu=array(
	array('label'=>'Create Skup', 'url'=>array('create')),
	array('label'=>'Manage Skup', 'url'=>array('admin')),
);
?>

<h1>Skups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
