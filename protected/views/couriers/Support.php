<h1><?= Yii::t('main-ui','Manage Couriers'); ?></h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=>$model,
	//'filter'=>$model,
	'columns'=>array(
				array(
					'name' => 'Id',
					'header' => Yii::t('main-ui','Id'),
					'value' =>'CHtml::encode($data->Id)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Name',
					'header' => Yii::t('main-ui','Name'),
					'value' =>'CHtml::encode($data->Name)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Lastname',
					'header' => Yii::t('main-ui','Lastname'),
					'value' =>'CHtml::encode($data->Lastname)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Support',
					'header' => Yii::t('main-ui','Support'),
					'value' =>'CHtml::encode($data->Supp->Login)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'DOB',
					'header' => Yii::t('main-ui','Date Of Birth'),
					'value' =>'CHtml::encode(date("m/d/Y", $data->DOB))',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Sex',
					'header' => Yii::t('main-ui','Sex'),
					'value' =>'CHtml::encode($data->Sex==0 ? "Women" : "Man" )',
					'type' => 'html',
					'filter'=> false,
					),
				//'Street',
				//'Appartment',
				//'Zip',
				array(
					'name' => 'City',
					'header' => Yii::t('main-ui','City'),
					'value' =>'CHtml::encode($data->City)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Country',
					'header' => Yii::t('main-ui','Country'),
					'value' =>'CHtml::encode($data->Country)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Packs',
					'header' => Yii::t('main-ui','Packs'),
					'value' =>'CHtml::encode("7|10|8")',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Start_Date',
					'header' => Yii::t('main-ui','Start Date'),
					'value' =>'CHtml::encode(date("m/d/Y", $data->Start_Date))',
					'type' => 'html',
					'filter'=> false,
					),
				//'Finish_Date',
				array(
					'name' => 'Finish_Date',
					'header' => Yii::t('main-ui','Finish Date'),
					'value' =>'CHtml::encode(date("m/d/Y", $data->Finish_Date))',
					'type' => 'html',
					'filter'=> false,
					),
				//'Pay_Comment',
				array(
					'name' => 'Staff_Comment',
					'header' => Yii::t('main-ui','Staff Comment'),
					'value' =>'CHtml::encode($data->Staff_Comment)',
					'type' => 'html',
					'filter'=> false,
					),

				array(
					'name'=>'Status',
					'header' => Yii::t('main-ui','Status'),
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
					'header' => Yii::t('main-ui','Info'),
					'type'=>'raw',
					'value' =>
					function($data)
					{
						return CHtml::link(Yii::t('main-ui','Info'), array(Yii::app()->request->baseUrl.'CouriersInfoForSupport', 'id' => $data->Id));
					}
				),
			),
));
?>