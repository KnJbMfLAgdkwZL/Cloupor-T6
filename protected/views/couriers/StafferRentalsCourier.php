<h1><?= Yii::t('main-ui','Staffer, Rentals Courier'); ?></h1>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'couriers-grid',
	'dataProvider'=> $model,
	'columns'=>array(
				array(
					'name' => 'Id',
					'header' => Yii::t('main-ui','Id'),
					'value' =>'CHtml::encode($data["Id"])',
					'type' => 'html',
					),
				array(
					'name' => 'Country',
					'header' => Yii::t('main-ui','Country'),
					'value' =>'CHtml::encode($data["Country"])',
					'type' => 'html',
					),
				array(
					'name' => 'Zip',
					'header' => Yii::t('main-ui','Zip'),
					'value' =>'CHtml::encode($data["Zip"])',
					'type' => 'html',
					),
				array(
					'name' => 'City',
					'header' => Yii::t('main-ui','City'),
					'value' =>'CHtml::encode($data["City"])',
					'type' => 'html',
					),
				array(
					'name' => 'Street',
					'header' => Yii::t('main-ui','Street'),
					'value' =>'CHtml::encode($data["Street"])',
					'type' => 'html',
					),
				array(
					'name' => 'Appartment',
					'header' => Yii::t('main-ui','Appartment'),
					'value' =>'CHtml::encode($data["Appartment"])',
					'type' => 'html',
					),
				array(
					'name' => 'Name',
					'header' => Yii::t('main-ui','Name'),
					'value' =>'CHtml::encode($data["Name"])',
					'type' => 'html',
					),
				array(
					'name' => 'Lastname',
					'header' => Yii::t('main-ui','Lastname'),
					'value' =>'CHtml::encode($data["Lastname"])',
					'type' => 'html',
					),
				array(
					'name'=>'Start_Date',
					'header' => Yii::t('main-ui','Start Date'),
					'type'=>'raw',
					'value' =>function($data)
					{
						return CHtml::encode(date("m/d/Y", $data['Start_Date']));
					}),
				array(
					'name' => 'Packs',
					'header' => Yii::t('main-ui','Packs'),
					'value' =>function($data)
					{
						$id = $data["Id"];
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
					'header' => Yii::t('main-ui','Finish Date'),
					'type'=>'raw',
					'value' =>function($data)
					{
						return CHtml::encode(date("m/d/Y", $data['Finish_Date']));
					}),

				array(
					'name'=>'Staff_Comment',
					'header' => Yii::t('main-ui','Staff Comment'),
					'type'=>'raw',
					'value' =>function($data)
					{
						return CHtml::encode($data['Staff_Comment']);
					}),

					array(
					'name'=>'Rentals Courier',
					'header' => Yii::t('main-ui','Rentals Courier'),
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