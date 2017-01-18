<?php
$str = Yii::t('main-ui','Staffers Request new Courier');
echo "<h1>$str</h1>";
$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'couriers-grid',
	'dataProvider' => $model,
	'columns' => array(
		array(
			'name' => 'Corier',
			'header' => Yii::t('main-ui','Courier'),
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
			'header' => Yii::t('main-ui','Address'),
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
			'header' => Yii::t('main-ui','Corier Support'),
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
			'header' => Yii::t('main-ui','Corier Status'),
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
			'header' => Yii::t('main-ui','Request from'),
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
			'header' => Yii::t('main-ui','Set Request'),
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