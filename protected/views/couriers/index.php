<?php
$this->menu=array(
	array('label'=>'Create Couriers', 'url'=>array('create')),
	array('label'=>'Manage Couriers', 'url'=>array('admin')),
);
?>

<h1>Couriers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
