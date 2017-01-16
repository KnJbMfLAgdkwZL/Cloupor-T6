<?php
$this->menu=array(
	array('label'=>'List Couriers', 'url'=>array('index')),
	array('label'=>'Create Couriers', 'url'=>array('create')),
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
?>
<h1>Manage Couriers</h1>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Id',
		'Name',
		'Lastname',
		array(
			'name'=>'Support',
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
		//'DOB',
		array(
			'name' => 'DOB',
			'value' =>'CHtml::encode(date("m/d/Y", $data->DOB))',
			'type' => 'html',
			'filter'=> false,
			),
		//'Sex',
		array(
			'name' => 'Sex',
			'value' =>'CHtml::encode($data->Sex==0 ? "Women" : "Man" )',
			'type' => 'html',
			'filter'=> false,
			),

		array(
			'name'=>'Status',
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
/*		'Street',
		'Appartment',
		'Zip',
		'City',
		'Country',
		'DHL_Office',
		'Email',
		'Skype_ICQ',
		'Phone',
		'Scan_ID',
		'Scan_Registration',
		'Scan_Agreement',
		'Start_Date',
		'Finish_Date',
		'Pay_Comment',
		'Staff_Comment',
		'Status',				*/
		array(
			'class'=>'CButtonColumn',
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