<?php
$this->menu=array(
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'Update News', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete News', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>
<h1>View News #<?php echo $model->Id; ?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Header',
		'Body',
		'Date',
		array(
			'name'=>'OnlyFor',
			'type'=>'raw',
			'filter'=> false,
			'value' =>function($data)
			{
				$list = array(2 => 'Support', 3 => 'Staffer');
				if (array_key_exists($data->OnlyFor, $list))
				{
					return CHtml::encode($list[$data->OnlyFor]);
				}
				else
				{
					return CHtml::encode('');
				}
			},),
	),
)); ?>