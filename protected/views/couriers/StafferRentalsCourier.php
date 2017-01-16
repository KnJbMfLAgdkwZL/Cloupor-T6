<h1>Staffer Rentals Courier</h1>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=> $model,
	'columns'=>array(
				'Id',
				'Country',
				'Zip',
				'City',
				'Street',
				'Appartment',
				'Name',
				'Lastname',
				array(
					'name'=>'Start_Date',
					'type'=>'raw',
					'value' =>function($data)
					{
						return CHtml::encode(date("m/d/Y", $data['Start_Date']));
					}),
				array(
					'name'=>'Packs',
					'type'=>'raw',
					'value' =>function($data)
					{
						return CHtml::encode( "7|10|8" );
					}),
				array(
					'name'=>'Status',
					'type'=>'raw',
					'value' =>function($data)
					{
						$status = array("New", "Test", "Active", "Problem", "Rat", "Veteran");
						if (array_key_exists($data['Status'], $status))
						{
							return CHtml::encode($status[$data['Status']]);
						}
						else
						{
							return CHtml::encode('');
						}
					}),
				array(
					'name'=>'Finish_Date',
					'type'=>'raw',
					'value' =>function($data)
					{
						return CHtml::encode(date("m/d/Y", $data['Finish_Date']));
					}),

				array(
					'name'=>'Staff_Comment',
					'type'=>'raw',
					'value' =>function($data)
					{
						return CHtml::encode($data['Staff_Comment']);
					}),

					array(
					'name'=>'Rentals Courier',
					'type'=>'raw',
					'value' =>
					function($data)
					{
						return CHtml::link('Rentals', 
							array(Yii::app()->request->baseUrl.'StaferGetCourier', 'id' => $data['Id']));
					}),

				),
			)
		);
?>