<?php
$this->menu=array(
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'View News', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>
<h1>Update News <?php echo $model->Id; ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>