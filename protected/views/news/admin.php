<?php
$this->menu=array(
	array('label'=>Yii::t('main-ui','Create News'), 'url'=>array('create')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});");
$str = Yii::t('main-ui','Manage News');
echo "<h1>$str</h1>";
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'Header',
			'header' => Yii::t('main-ui','Header'),
			'type'=>'raw',
			'value' =>function($data)
			{
				$str = $data->Header;
				$size = 140;
				if(strlen($str) >= $size)
				{
					$str = substr($str, 0, $size);
					$str .= '...';
				}
				return CHtml::encode($str);
			},),
		array(
			'name'=>'Body',
			'header' => Yii::t('main-ui','Body'),
			'type'=>'raw',
			'value' =>function($data)
			{
				$str = $data->Body;
				$size = 140;
				if(strlen($str) >= $size)
				{
					$str = substr($str, 0, $size);
					$str .= '...';
				}
				return CHtml::encode($str);
			},),
		array(
			'name' => 'Date',
			'header' => Yii::t('main-ui','Date'),
			'value' =>'CHtml::encode($data->Date)',
			'type' => 'html',
			),
		array(
			'name'=>'OnlyFor',
			'header' => Yii::t('main-ui','Only For'),
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
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>