<link href="http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic"
rel="stylesheet" type="text/css" />
<style>
.price
{
	font-family: 'PT Sans', serif;
}
</style>
<?php
$str = Yii::t('main-ui','Packs');
echo "<h1>$str</h1>";
$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'couriers-grid',
	//'htmlOptions'=>array('class'=>'MYTESTCLASS'),
	'dataProvider' => $model,
	'columns' => array(
				array(
					'name' => 'Id',
					'header' => Yii::t('main-ui','Id'),
					'value' =>'CHtml::encode($data->Id)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Staffer',
					'header' => Yii::t('main-ui','Staffer'),
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
				array(
					'name' => 'Date',
					'header' => Yii::t('main-ui','Date'),
					'value' =>'CHtml::encode($data->Date)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Corier',
					'header' => Yii::t('main-ui','Coriers'),
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