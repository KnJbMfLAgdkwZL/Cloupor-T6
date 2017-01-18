<?php

$str = Yii::t('main-ui','Support Information');
echo "<h1>$str $name</h1>";

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=> $model,
	'columns'=>
	array(
		 	array(
				'name' => 'Id',
				'header'=>Yii::t('main-ui','Id'),
				'value' =>'CHtml::encode($data["Id"])',
				'type' => 'html',
				'filter'=> false,
				),
			array(
				'name' => 'Date',
				'header'=>Yii::t('main-ui','Date'),
				'value' =>'CHtml::encode($data["Date"])',
				'type' => 'html',
				'filter'=> false,
				),

			array(
				'name'=>'Courier',
				'header'=>Yii::t('main-ui','Courier'),
				'type'=>'raw',
				'value' =>function($data)
				{
					$str = CHtml::encode($data["Lastname"]." ".$data["Name"]);
					$url = "couriers/view&id={$data['CourierId']}";
					return CHtml::link($str, array(Yii::app()->request->baseUrl.$url));
				},),

			array(
				'name' => 'Track',
				'header'=>Yii::t('main-ui','Track'),
				'value' =>'CHtml::encode($data["Track"])',
				'type' => 'html',
				'filter'=> false,
				),
			array(
				'name' => 'Skup_reShip',
				'header'=>Yii::t('main-ui','Reship'),
				'value' =>'CHtml::encode($data["Skup_reShip"])',
				'type' => 'html',
				'filter'=> false,
				),
			array(
				'name'=>'Staffer',
				'header'=>Yii::t('main-ui','Staffer'),
				'type'=>'raw',
				'value' =>function($data)
					{
						$str = CHtml::encode($data["Login"]);
						$url = "view&id={$data['StaferId']}";
						return CHtml::link($str, array(Yii::app()->request->baseUrl.$url));
				},),
			),
		)
	);
?>