<?php
$str = Yii::t('main-ui','Couriers All Packs Info For Support');
echo "<h1>$str</h1>";
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=> $model,
	'columns'=>array(
				array(
					'name' => 'Id',
					'header' => Yii::t('main-ui','Id'),
					'value' =>'CHtml::encode($data->Id)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Date',
					'header' => Yii::t('main-ui','Date'),
					'value' =>'CHtml::encode($data->Date)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Courier',
					'header' => Yii::t('main-ui','Courier'),
					'value' =>'CHtml::encode($data->couriertb->Lastname." ".$data->couriertb->Name)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Track',
					'header' => Yii::t('main-ui','Track'),
					'value' =>'CHtml::encode($data->Track)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Comment',
					'header' => Yii::t('main-ui','Comment'),
					'value' =>'CHtml::encode($data->Comment)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Skup_reShip',
					'header' => Yii::t('main-ui','Reship'),
					'value' =>'CHtml::encode($data->Skup_reShip)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Summ',
					'header' => Yii::t('main-ui','Summa'),
					'value' =>'CHtml::encode($data->Summ)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Currency',
					'header' => Yii::t('main-ui','Currency'),
					'value' =>'CHtml::encode($data->Currency)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name'=>'Status',
					'header' => Yii::t('main-ui','Status'),
					'type'=>'raw',
					'value' =>
					function($data)
					{
						return CHtml::dropDownList("$data->Id", $data->Status, array("Sent", "Post", "Delivered", "Canceled", "reShip", "Rat"));
					},
					'cssClassExpression' => '"StatusSelected"',
					),
				),
			));

Yii::app()->clientScript->registerScript('sel_status', "
	$('.StatusSelected > select').change(function()
	{
        var packId = this.id;
		var status = this.value;
        $.ajax({
            url: '?r=couriers/SupportUpdatePackStatus',
            data: {Id: packId, Status: status},
            type: 'POST',
            success: function(msg)
			{
            }
        });
	});
");
			
?>