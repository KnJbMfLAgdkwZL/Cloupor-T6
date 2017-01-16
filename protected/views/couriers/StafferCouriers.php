<h1>Staffer My couriers</h1>
<?php
echo CHtml::link('Rentals courier', array(Yii::app()->request->baseUrl.'StafferRentalsCourier'));

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=> $model,
	'columns'=>array(
				array(
					'name' => 'Id',
					'value' =>'CHtml::encode($data->Coriers->Id)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Country',
					'value' =>'CHtml::encode($data->Coriers->Country)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Zip',
					'value' =>'CHtml::encode($data->Coriers->Zip)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'City',
					'value' =>'CHtml::encode($data->Coriers->City)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Street',
					'value' =>'CHtml::encode($data->Coriers->Street)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Appartment',
					'value' =>'CHtml::encode($data->Coriers->Appartment)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Name',
					'value' =>'CHtml::encode($data->Coriers->Name)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Lastname',
					'value' =>'CHtml::encode($data->Coriers->Lastname)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Start Date',
					'value' =>'CHtml::encode(date("m/d/Y", $data->Coriers->Start_Date))',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Packs',
					'value' =>'CHtml::encode( "7|10|8" )',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name'=>'Status',
					'type'=>'raw',
					'value' =>
					function($data)
					{
						$status = array("New", "Test", "Active", "Problem", "Rat", "Veteran");
						if (array_key_exists($data->Coriers->Status, $status))
						{
							return CHtml::encode($status[$data->Coriers->Status]);
						}
						else
						{
							return CHtml::encode('');
						}
					}
					),
				array(
					'name' => 'Finish Date',
					'value' =>'CHtml::encode(date("m/d/Y", $data->Coriers->Finish_Date))',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Staff Comment',
					'value' =>'CHtml::encode($data->Coriers->Staff_Comment)',
					'type' => 'html',
					'filter'=> false,
					),
				),
			));
			
?>