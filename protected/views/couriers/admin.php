<?php
$this->menu=array(
	array('label'=>Yii::t('main-ui','Create Couriers'), 'url'=>array('create')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#couriers-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$str = Yii::t('main-ui','Manage Couriers');
echo "<h1>$str</h1>";
echo CHtml::link(Yii::t('main-ui','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=>$model->search(),
	//'htmlOptions'=>array('class'=>'MYTESTCLASS'),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'Id',
			'header' => Yii::t('main-ui','Id'),
			'value' =>'CHtml::encode($data->Id)',
			'type' => 'html',
			),
        /*
		array(
			'name' => 'Name',
			'header' => Yii::t('main-ui','Name'),
			'value' =>'CHtml::encode($data->Name)',
			'type' => 'html',
			),
		array(
			'name' => 'Lastname',
			'header' => Yii::t('main-ui','Lastname'),
			'value' =>'CHtml::encode($data->Lastname)',
			'type' => 'html',
			),
        */
        array(
            'name' => 'Lastname',
            'header' => Yii::t('main-ui','Lastname').' '.Yii::t('main-ui','Name'),
            'type' => 'raw',
            'value' =>function($data)
            {
                return CHtml::encode($data->Lastname.' '.$data->Name);
            },
        ),
        array(
            'name' => 'Country',
            'header' => Yii::t('main-ui','Country'),
            'type' => 'raw',
            'value' =>function($data)
            {
                return CHtml::encode($data->Country);
            },
        ),
        array(
            'name' => 'City',
            'header' => Yii::t('main-ui','City'),
            'type' => 'raw',
            'value' =>function($data)
            {
                return CHtml::encode($data->City);
            },
        ),


		array(
			'name'=>'Support',
			'header' => Yii::t('main-ui','Support'),
			'type'=>'raw',
			'filter'=> false,
			'value' =>function($data)
			{
				if(isset($data->Supp->Login))
				{
					$str = CHtml::encode($data->Supp->Login);
					$url = "users/view&id={$data->Supp->Id}";
					return CHtml::link($str, array(Yii::app()->request->baseUrl.$url));
				}
				else
				{
					return CHtml::encode('');
				}
			},),
		array(
			'name' => 'DOB',
			'header' => Yii::t('main-ui','Date Of Birth'),
			'value' =>'CHtml::encode(date("m/d/Y", $data->DOB))',
			'type' => 'html',
			'filter'=> false,
			),
		array(
			'name' => 'Sex',
			'header' => Yii::t('main-ui','Sex'),
			'value' =>'CHtml::encode($data->Sex==0 ? "Women" : "Man" )',
			'type' => 'html',
			'filter'=> false,
			),
		array(
			'name'=>'Status',
			'header' => Yii::t('main-ui','Status'),
			'type'=>'raw',
			'filter'=> false,
			'value' =>
			function($data)
			{
				$status = array('New', 'Test', 'Active','Problem', 'Rat', 'Veteran');
				return CHtml::dropDownList("$data->Id", $data->Status, $status);
			},
			'cssClassExpression' => '"StatusSelected"',
			),
		array(
			'class'=>'CButtonColumn',
			//'htmlOptions'=>array('class'=>'CGridView_thbutton'),
		),
	),
));
Yii::app()->clientScript->registerScript('sel_status', "
	$('.StatusSelected > select').change(function()
	{
        var packId = this.id;
		var status = this.value;
        $.ajax({
            url: '?r=couriers/AdminUpdateCourierStatus',
            data: {Id: packId, Status: status},
            type: 'POST',
            success: function(msg)
			{
            }
        });
	});
");
?>