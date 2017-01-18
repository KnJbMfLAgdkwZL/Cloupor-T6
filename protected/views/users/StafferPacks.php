<link href="http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic"
rel="stylesheet" type="text/css" />
<style>
.price
{
	font-family: 'PT Sans', serif;
}
</style>
<?php
$str = Yii::t('main-ui','Staffer Information');
echo "<h1>$str $name</h1>";
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=> $model,
	'columns'=>
		array(
			array(
				'name'=>'Id',
				'header'=>Yii::t('main-ui','Id'),
				'type'=>'raw',
				'value' =>function($data)
				{
					$str = CHtml::encode($data->Id);
					$url = "couriers/ShowPack&id={$data->Id}";
					return CHtml::link($str, array(Yii::app()->request->baseUrl.$url));
				},),
			array(
				'name' => 'Date',
				'header'=>Yii::t('main-ui','Date'),
				'value' =>'CHtml::encode($data->Date)',
				'type' => 'html',
				'filter'=> false,
				),
			array(
				'name'=>'Courier',
				'header'=>Yii::t('main-ui','Courier'),
				'type'=>'raw',
				'value' =>function($data)
				{
					$str = CHtml::encode($data->couriertb->Lastname." ".$data->couriertb->Name);
					$url = "couriers/view&id={$data->couriertb->Id}";
					return CHtml::link($str, array(Yii::app()->request->baseUrl.$url));
				},),
			array(
				'name' => 'Track',
				'header'=>Yii::t('main-ui','Track'),
				'value' =>'CHtml::encode($data->Track)',
				'type' => 'html',
				'filter'=> false,
				),
			array(
				'name' => 'Comment',
				'header'=>Yii::t('main-ui','Comment'),
				'value' =>'CHtml::encode($data->Comment)',
				'type' => 'html',
				'filter'=> false,
				),
			array(
				'name' => 'Skup_reShip',
				'header'=>Yii::t('main-ui','Reship'),
				'value' =>'CHtml::encode($data->Skup_reShip)',
				'type' => 'html',
				'filter'=> false,
				),
			array(
				'name' => 'Summ',
				'header'=>Yii::t('main-ui','Summa'),
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
				'header'=>Yii::t('main-ui','Status'),
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