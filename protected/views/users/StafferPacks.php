<link href="http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic"
rel="stylesheet" type="text/css" />
<style>
.price
{
	font-family: 'PT Sans', serif;
}
</style>

<h1>Staffer info</h1>
<h2><?php echo $name; ?></h2>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=> $model,
	'columns'=>
		array(
			array(
				'name'=>'Id',
				'type'=>'raw',
				'value' =>function($data)
				{
					$str = CHtml::encode($data->Id);
					$url = "couriers/ShowPack&id={$data->Id}";
					return CHtml::link($str, array(Yii::app()->request->baseUrl.$url));
				},),
			array(
				'name' => 'Date',
				'value' =>'CHtml::encode($data->Date)',
				'type' => 'html',
				'filter'=> false,
				),
			array(
				'name'=>'Courier',
				'type'=>'raw',
				'value' =>function($data)
				{
					$str = CHtml::encode($data->couriertb->Lastname." ".$data->couriertb->Name);
					$url = "couriers/view&id={$data->couriertb->Id}";
					return CHtml::link($str, array(Yii::app()->request->baseUrl.$url));
				},),
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
				'type' => 'raw',
				'value' => function($data)
				{
					$mas = array(
						'Usd'=>'$',
						'Eur'=>'&euro;',
						'Rub'=>'<span class="price">&#8399;</span>'
					);
					$str = ' '.$data->Summ;
					if(array_key_exists($data->Currency, $mas))
					{
						$str = $mas[$data->Currency].' '.$data->Summ;
					}
					return $str;
				},),
			array(
				'name'=>'Status',
				'type'=>'raw',
				'value' =>
					function($data)
					{
						$status = array("Sent", "Post", "Delivered", "Canceled", "reShip", "Rat");
						return CHtml::dropDownList("$data->Id", $data->Status, $status);
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