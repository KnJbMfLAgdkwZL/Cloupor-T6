<h1>Manage Couriers</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=>$model,
	//'filter'=>$model,
	'columns'=>array(
				array(
					'name' => 'Id',
					'value' =>'CHtml::encode($data->Id)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Name',
					'value' =>'CHtml::encode($data->Name)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Lastname',
					'value' =>'CHtml::encode($data->Lastname)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Support',
					'value' =>'CHtml::encode($data->Supp->Login)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'DOB',
					'value' =>'CHtml::encode(date("m/d/Y", $data->DOB))',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Sex',
					'value' =>'CHtml::encode($data->Sex==0 ? "Women" : "Man" )',
					'type' => 'html',
					'filter'=> false,
					),
				//'Street',
				//'Appartment',
				//'Zip',
				array(
					'name' => 'City',
					'value' =>'CHtml::encode($data->City)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Country',
					'value' =>'CHtml::encode($data->Country)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Packs',
					'value' =>'CHtml::encode("7|10|8")',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Start_Date',
					'value' =>'CHtml::encode(date("m/d/Y", $data->Start_Date))',
					'type' => 'html',
					'filter'=> false,
					),
				//'Finish_Date',
				array(
					'name' => 'Finish_Date',
					'value' =>'CHtml::encode(date("m/d/Y", $data->Finish_Date))',
					'type' => 'html',
					'filter'=> false,
					),
				//'Pay_Comment',
				array(
					'name' => 'Staff_Comment',
					'value' =>'CHtml::encode($data->Staff_Comment)',
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
						if (array_key_exists($data->Status, $status))
						{
							return CHtml::encode($status[$data->Status]);
						}
						else
						{
							return CHtml::encode('');
						}
					}
					),
				array(
					'name'=>'Info',
					'type'=>'raw',
					'value' =>
					function($data)
					{
						return CHtml::link('Info', array(Yii::app()->request->baseUrl.'CouriersInfoForSupport', 'id' => $data->Id));
					}
				),
			),
));
?>