<h1>My packs For Support</h1>
<?php
echo CHtml::link('Add pack', array(Yii::app()->request->baseUrl.'StafferAddPack'));

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
						$status =  array("Sent", "Post", "Delivered", "Canceled", "reShip", "Rat");
						if (array_key_exists($data->Status, $status))
						{
							return CHtml::encode($status[$data->Status]);
						}
						else
						{
							return CHtml::encode('');
						}
					},
					),
				),
			));
?>