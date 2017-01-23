<h1><?= Yii::t('main-ui','Staffer, My couriers');?></h1>
<?php
echo CHtml::link(Yii::t('main-ui','Rentals courier'), array(Yii::app()->request->baseUrl.'StafferRentalsCourier'));

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=> $model,
	'columns'=>array(
				array(
					'name' => 'Id',
					'header' => Yii::t('main-ui','Id'),
					'value' =>'CHtml::encode($data->Coriers->Id)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Country',
					'header' => Yii::t('main-ui','Country'),
					'value' =>'CHtml::encode($data->Coriers->Country)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Zip',
					'header' => Yii::t('main-ui','Zip'),
					'value' =>'CHtml::encode($data->Coriers->Zip)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'City',
					'header' => Yii::t('main-ui','City'),
					'value' =>'CHtml::encode($data->Coriers->City)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Street',
					'header' => Yii::t('main-ui','Street'),
					'value' =>'CHtml::encode($data->Coriers->Street)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Appartment',
					'header' => Yii::t('main-ui','Appartment'),
					'value' =>'CHtml::encode($data->Coriers->Appartment)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Name',
					'header' => Yii::t('main-ui','Name'),
					'value' =>'CHtml::encode($data->Coriers->Name)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Lastname',
					'header' => Yii::t('main-ui','Lastname'),
					'value' =>'CHtml::encode($data->Coriers->Lastname)',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Start Date',
					'header' => Yii::t('main-ui','Start Date'),
					'value' =>'CHtml::encode(date("m/d/Y", $data->Coriers->Start_Date))',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Packs',
					'header' => Yii::t('main-ui','Packs'),
					'value' =>function($data)
					{
						$id = $data->Coriers->Id;
						$condition = 'Courier=:id AND Status = 0';
						$params = array(':id'=>$id);
						$post = Packs::model()->findAll($condition,$params);
						$s1 = count($post);

						$condition = 'Courier=:id AND Status = 2';
						$params = array(':id'=>$id);
						$post = Packs::model()->findAll($condition,$params);
						$s2 = count($post);

						$condition = 'Courier=:id AND Status = 1';
						$params = array(':id'=>$id);
						$post = Packs::model()->findAll($condition,$params);
						$s3 = count($post);

						return CHtml::encode("$s1|$s2|$s3");
					},
					'type'=>'raw',
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
					'header' => Yii::t('main-ui','Finish Date'),
					'value' =>'CHtml::encode(date("m/d/Y", $data->Coriers->Finish_Date))',
					'type' => 'html',
					'filter'=> false,
					),
				array(
					'name' => 'Staff Comment',
					'header' => Yii::t('main-ui','Staff Comment'),
					'value' =>'CHtml::encode($data->Coriers->Staff_Comment)',
					'type' => 'html',
					'filter'=> false,
					),
				),
			));
			
?>