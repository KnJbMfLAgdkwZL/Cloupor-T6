<?php
$this->menu=array(
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>
<h1>Create News</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>