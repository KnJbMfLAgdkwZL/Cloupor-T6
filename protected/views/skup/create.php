<?php
$this->menu=array(
	array('label'=>'Manage Skup', 'url'=>array('admin')),
);
?>
<h1>Create Skup</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>