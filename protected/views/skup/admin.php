<?php
$this->menu=array(
	array('label'=>Yii::t('main-ui', 'Create Skup'), 'url'=>array('create')),
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
$str = Yii::t('main-ui', 'Manage Skups');
echo "<h1>$str</h1>", "<hr/>";
$str = Yii::t('main-ui', 'Skup now');
echo "<h3>$str</h3>";
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'now-grid',
	'dataProvider'=>$now->search(),
	'filter'=>$now,
	'columns'=>array(
				array(
					'name' => 'Merchandise',
					'header' => Yii::t('main-ui','Merchandise'),
					'value' =>'CHtml::encode($data->Merchandise)',
					'type' => 'html',
					),
				array(
					'name' => 'Comment',
					'header' => Yii::t('main-ui','Comment'),
					'value' =>'CHtml::encode($data->Comment)',
					'type' => 'html',
					),
				'No1',
				'No2',
				'No3',
				array(
					'name'=>'Skupforever',
					'header' => Yii::t('main-ui','Skup forever'),
					'type'=>'raw',
					'filter'=> false,
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
				array(
					'class'=>'CButtonColumn',
					),
				),
			));

echo "<br/><br/><br/><hr/>";
$str = Yii::t('main-ui', 'Skup forever');
echo "<h3>$str</h3>";
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'forever-grid',
	'dataProvider'=>$forever->search(),
	'filter'=>$forever,
	'columns'=>array(
				array(
					'name' => 'Merchandise',
					'header' => Yii::t('main-ui','Merchandise'),
					'value' =>'CHtml::encode($data->Merchandise)',
					'type' => 'html',
					),
				array(
					'name' => 'Comment',
					'header' => Yii::t('main-ui','Comment'),
					'value' =>'CHtml::encode($data->Comment)',
					'type' => 'html',
					),
				'No1',
				'No2',
				'No3',
				array(
					'name'=>'Skupforever',
					'header' => Yii::t('main-ui','Skup forever'),
					'type'=>'raw',
					'filter'=> false,
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
				array(
					'class'=>'CButtonColumn',
					),
				),
			));
?>