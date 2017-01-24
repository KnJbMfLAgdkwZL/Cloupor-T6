<?php
$this->menu=array(
	array('label'=>Yii::t('main-ui','Create Users'), 'url'=>array('create')),
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
$str = Yii::t('main-ui','Manage Users');
echo "<h1>$str</h1>";

	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'users-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			array(
				'name' => 'Id',
				'header' => Yii::t('main-ui','Id'),
				'value' =>'CHtml::encode($data->Id)',
				'type' => 'html',
				),
			array(
				'name' => 'Login',
				'header' => Yii::t('main-ui','Login'),
				'value' =>'CHtml::encode($data->Login)',
				'type' => 'html',
				),
			array(
				'name' => 'Reg_Date',
				'header' => Yii::t('main-ui','Registration Date'),
				'value' =>'CHtml::encode($data->Reg_Date)',
				'type' => 'html',
				'filter'=> false,
				),
			array(
					'name' => 'Role',
					'header' => Yii::t('main-ui','Role'),
					'value' =>'CHtml::encode($data->users_roles->Name)',
					'type' => 'html',
					'filter'=> false,
				),

            array(
                'name' => 'Comments',
                'header' => Yii::t('main-ui','Comments'),
                'value' =>'CHtml::encode($data->Comments)',
                'type' => 'html',
            ),
            array(
                'name' => 'Requisites',
                'header' => Yii::t('main-ui','Requisites'),
                'value' =>'CHtml::encode($data->Requisites)',
                'type' => 'html',
            ),
            array(
                'name' => 'Jabber',
                'header' => Yii::t('main-ui','Jabber'),
                'value' =>'CHtml::encode($data->Jabber)',
                'type' => 'html',
            ),
            array(
                'name' => 'Wmid',
                'header' => Yii::t('main-ui','Wmid'),
                'value' =>'CHtml::encode($data->Wmid)',
                'type' => 'html',
            ),

			array(
				'class'=>'CButtonColumn',
			),
		),
	));
?>
<style>
    .span-19
    {
        width: 75.12345%;
    }
</style>