<link href="http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic"
rel="stylesheet" type="text/css" />
<style>
.price
{
	font-family: 'PT Sans', serif;
}
</style>

<h1>Packs</h1>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'couriers-grid',
	'dataProvider' => $model,
	'columns' => array(
				'Id',
				array(
					'name' => 'Staffer',
					'type' => 'raw',
					'value' => function($data)
					{
						if(isset($data->staffer))
						{
							$str = CHtml::encode($data->staffer->Login);
							$url = Yii::app()->request->baseUrl.'users/view&id='.$data->staffer->Id;
							return CHtml::link($str, array($url));
						}
						return CHtml::encode('');
					}
					),
				'Date',
				array(
					'name' => 'Corier',
					'type' => 'raw',
					'value' => function($data)
					{
						if(isset($data->couriertb))
						{
							$str = CHtml::encode($data->couriertb->Lastname.' '.$data->couriertb->Name);
							$url = Yii::app()->request->baseUrl.'couriers/view&id='.$data->couriertb->Id;
							return CHtml::link($str, array($url));
						}
						return CHtml::encode('');
					}
					),
				'Skup_reShip',
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



				)
			));
?>