<?php
$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>
<h1>Update Users <?php echo $model->Id; ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>