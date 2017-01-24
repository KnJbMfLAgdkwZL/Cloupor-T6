<link href="http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic"
rel="stylesheet" type="text/css" />
<style>
.price
{
	font-family: 'PT Sans', serif;
}
</style>
<style type="text/css">
    @font-face { font-family: "Rubl Sign"; src: url(http://www.artlebedev.ru/;-)/ruble.eot); }
    span.rur { font-family: "Rubl Sign"; text-transform: uppercase; // text-transform: none;}
    span.rur span { position: absolute; overflow: hidden; width: .45em; height: 1em; margin: .1ex 0 0 -.55em; // display: none; }
    span.rur span:before { content: '\2013'; }
</style>
<?php
global $status;
$status = array("Sent", "Post", "Delivered", "Canceled", "reShip", "Rat");

$str = Yii::t('main-ui','Packs');
echo "<h1>$str</h1>";

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'couriers-grid',
	//'htmlOptions'=>array('class'=>'rtrgfdf'),
	'dataProvider' => $model,
    //$data->status
    'rowCssClassExpression' => '"Color_$data->Status"',
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
					'value' => function($data) {
                        if (isset($data->staffer)) {
                            $str = CHtml::encode($data->staffer->Login);
                            $url = Yii::app()->request->baseUrl . 'users/view&id=' . $data->staffer->Id;
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
					'name' => 'Courier',
					'header' => Yii::t('main-ui','Coriers'),
					'type' => 'raw',
					'value' => function($data) {
                        if (isset($data->couriertb)) {
                            $str = CHtml::encode($data->couriertb->Lastname . ' ' . $data->couriertb->Name);
                            $url = Yii::app()->request->baseUrl . 'couriers/view&id=' . $data->couriertb->Id;
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
                            'Rub'=>'<span class="rur">p<span>уб.</span>',
							//'Rub'=>'<span class="price">&#8399;</span>'
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
                    'value' => function($data) {
                        global $status;
                        return CHtml::encode( $status[$data->Status] );
                    },
                    'cssClassExpression' => '"StatusSelected"',
                ),

				)
			));
?>
<style>
.Color_0
{
    background-color:  rgba(216, 216, 49, 0.33);
}
.Color_1
{
    background-color: rgba(255, 165, 0, 0.42);
}
.Color_2
{
    background-color: rgba(144, 238, 144, 0.51);
}
.Color_3
{
    background-color: rgba(255, 0, 0, 0.62);
}
.Color_4
{
    background-color: rgba(0, 128, 0, 0.77);
}
.Color_5
{
    background-color: rgba(139, 0, 0, 0.85);
}
</style>