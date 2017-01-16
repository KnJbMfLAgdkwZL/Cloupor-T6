<h1>Staffers Request new Courier</h1>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'couriers-grid',
	'dataProvider' => $model,
	'columns' => array(
		array(
			'name' => 'Corier',
			'type' => 'raw',
			'value' => function($data)
			{
				if(isset($data->Coriers))
				{
					$str = CHtml::encode($data->Coriers->Lastname.' '.$data->Coriers->Name);
					$url = Yii::app()->request->baseUrl.'couriers/view&id='.$data->Coriers->Id;
					return CHtml::link($str, array($url));
				}
				return CHtml::encode('');
			}
		),
		array(
			'name' => 'Address',
			'type' => 'raw',
			'value' => function($data)
			{
				if(isset($data->Coriers))
					return CHtml::encode($data->Coriers->Country.' '.$data->Coriers->City.' '.$data->Coriers->Street);
				return CHtml::encode('');
			}
		),
		array(
			'name' => 'Corier Support',
			'type' => 'raw',
			'value' => function($data)
			{
				if(isset($data->Coriers))
				{
					$str = CHtml::encode($data->Coriers->Supp->Login);
					$url = Yii::app()->request->baseUrl.'users/view&id='.$data->Coriers->Supp->Id;
					return CHtml::link($str, array($url));
				}
				return CHtml::encode('');
			}
		),
		array(
			'name' => 'Corier Status',
			'type' => 'raw',
			'value' => function($data)
			{
				if(isset($data->Coriers))
				{
					$arr = array('New', 'Test', 'Active','Problem', 'Rat', 'Veteran');
					if(array_key_exists($data->Coriers->Status, $arr))
						return CHtml::encode($arr[$data->Coriers->Status]);
				}
				return CHtml::encode('');
			}
		),
		array(
			'name' => 'Request from',
			'type' => 'raw',
			'value' => function($data)
			{
				if(isset($data->Staffer))
				{
					$str = CHtml::encode($data->Staffer->Login);
					$url = Yii::app()->request->baseUrl.'users/view&id='.$data->Staffer->Id;
					return CHtml::link($str, array($url));
				}
				return CHtml::encode('');
			}
		),
		array(
			'name' => 'Set Request',
			'type' => 'raw',
			'value' => function($data)
			{
				$request = array(-1 => 'Refuse', 0 => 'Waiting', 1 => 'Approved');
				return CHtml::dropDownList("$data->Id", $data->Request, $request);
			},
			'cssClassExpression' => '"StatusSelected"',
		)
	)
));
Yii::app()->clientScript->registerScript('sel_status', "
	$('.StatusSelected > select').change(function()
	{
        var packId = this.id;
		var status = this.value;
        $.ajax({
            url: '?r=couriers/SetRequest',
            data: {Id: packId, Status: status},
            type: 'POST',
            success: function(msg)
			{
            }
        });
	});
");
?>