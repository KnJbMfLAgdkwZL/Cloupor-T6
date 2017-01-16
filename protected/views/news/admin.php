<?php
$this->menu=array(
	array('label'=>'Create News', 'url'=>array('create')),
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
});
");
?>
<h1>Manage News</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'Header',
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
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>