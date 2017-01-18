<?php
$this->menu=array(
	array('label'=>'Create Couriers', 'url'=>array('create')),
	array('label'=>'View Couriers', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Couriers', 'url'=>array('admin')),
);
?>
<h1>Update Couriers <?php echo $model->Id; ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>