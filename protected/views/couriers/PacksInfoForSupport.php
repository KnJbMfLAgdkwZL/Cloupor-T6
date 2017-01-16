<h1>Couriers All Packs Info For Support</h1>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=> $model,
	'columns'=>array(
				array(
					'name' => 'Id',
					'value' =>'CHtml::encode($data->Id)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Date',
					'value' =>'CHtml::encode($data->Date)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Courier',
					'value' =>'CHtml::encode($data->couriertb->Lastname." ".$data->couriertb->Name)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Track',
					'value' =>'CHtml::encode($data->Track)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Comment',
					'value' =>'CHtml::encode($data->Comment)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Skup_reShip',
					'value' =>'CHtml::encode($data->Skup_reShip)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Summ',
					'value' =>'CHtml::encode($data->Summ)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Currency',
					'value' =>'CHtml::encode($data->Currency)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name'=>'Status',
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