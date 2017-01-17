<?php
$this->menu=array(
	array('label'=>'Create Skup', 'url'=>array('create')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#skup-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Manage Skups</h1>
<hr/>
<h3>Skup now</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'now-grid',
	'dataProvider'=>$now->search(),
	'filter'=>$now,
	'columns'=>array(
				'Merchandise',
				'Comment',
				'No1',
				'No2',
				'No3',
				array(
					'name'=>'Skupforever',
					'type'=>'raw',
					'filter'=> false,
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
				array(
					'class'=>'CButtonColumn',
					),
				),
			));
?>
<br/><br/><br/>
<hr/>
<h3>Skup forever</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'forever-grid',
	'dataProvider'=>$forever->search(),
	'filter'=>$forever,
	'columns'=>array(
				'Merchandise',
				'Comment',
				'No1',
				'No2',
				'No3',
				array(
					'name'=>'Skupforever',
					'type'=>'raw',
					'filter'=> false,
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
				array(
					'class'=>'CButtonColumn',
					),
				),
			));
?>