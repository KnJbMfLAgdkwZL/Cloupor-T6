<h1>Support info</h1>
<h2><?php echo $name; ?></h2>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=> $model,
	'columns'=>
	array(
		 	array(
				'name' => 'Id',
				'value' =>'CHtml::encode($data["Id"])',
				'type' => 'html',
				'filter'=> false,
				),
			array(
				'name' => 'Date',
				'value' =>'CHtml::encode($data["Date"])',
				'type' => 'html',
				'filter'=> false,
				),

			array(
				'name'=>'Courier',
				'type'=>'raw',
				'value' =>function($data)
				{
					$str = CHtml::encode($data["Lastname"]." ".$data["Name"]);
					$url = "couriers/view&id={$data['CourierId']}";
					return CHtml::link($str, array(Yii::app()->request->baseUrl.$url));
				},),

			array(
				'name' => 'Track',
				'value' =>'CHtml::encode($data["Track"])',
				'type' => 'html',
				'filter'=> false,
				),
			array(
				'name' => 'Skup_reShip',
				'value' =>'CHtml::encode($data["Skup_reShip"])',
				'type' => 'html',
				'filter'=> false,
				),
			array(
				'name'=>'Staffer',
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