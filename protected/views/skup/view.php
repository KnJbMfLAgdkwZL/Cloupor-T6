<?php
$this->menu=array(
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
		//'Id',
		'Merchandise',
		'Comment',
		'No1',
		'No2',
		'No3',
		//'Skupforever',
		array(
			'name'=>'Skupforever',
			'type'=>'raw',
			'value' =>function($data)
			{
				$arr = array('No', 'Yes');
				if(array_key_exists($data->Skupforever, $arr))
				{
					return CHtml::encode($arr[$data->Skupforever]);
				}
				else
				{
					return CHtml::encode('');
				}
			},),
	),
)); ?>