<?php
$this->menu=array(
	array('label'=>Yii::t('main-ui','Create Skup'), 'url'=>array('create')),
	array('label'=>Yii::t('main-ui','Update Skup'), 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>Yii::t('main-ui','Delete Skup'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main-ui','Manage Skup'), 'url'=>array('admin')),
);

$str = Yii::t('main-ui', 'View Skup');
echo "<h1>$str {$model->Merchandise}</h1>";

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'label'=>Yii::t('main-ui', 'Merchandise'),
			'type'=>'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Merchandise);
			},),
		array(
			'label'=>Yii::t('main-ui', 'Comment'),
			'type'=>'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Comment);
			},),
		'No1',
		'No2',
		'No3',
		array(
			'label'=>Yii::t('main-ui', 'Skup forever'),
			'type'=>'raw',
			'value' =>function($data)
			{
				$arr = array('No', 'Yes');
				if(array_key_exists($data->Skupforever, $arr))
				{
					return Yii::t('main-ui',CHtml::encode($arr[$data->Skupforever]));
				}
				else
				{
					return CHtml::encode('');
				}
			},),
	),
)); ?>