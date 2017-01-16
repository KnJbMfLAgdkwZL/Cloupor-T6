<?php
$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Manage Users</h1>
<?php
	
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'users-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'Id',
			'Login',
			array(
				'name' => 'Reg_Date',
					'value' =>'CHtml::encode($data->Reg_Date)',
				'type' => 'html',
				'filter'=> false,
				),
			array(
					'name' => 'Role',
					'value' =>'CHtml::encode($data->users_roles->Name)',
					'type' => 'html',
					'filter'=> false,
				),
			array(
				'class'=>'CButtonColumn',
			),
		),
	));
?>