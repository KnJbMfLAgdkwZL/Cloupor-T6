<?php
$this->menu=array(
	array('label'=>Yii::t('main-ui','Create Couriers'), 'url'=>array('create')),
	array('label'=>Yii::t('main-ui','Update Couriers'), 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>Yii::t('main-ui','Delete Couriers'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main-ui','Manage Couriers'), 'url'=>array('admin')),
);
?>
<h1><?= Yii::t('main-ui','View Couriers'); ?> <?php echo $model->Lastname.' '.$model->Name; ?></h1>
<?php
	$model['Sex'] = $model['Sex'] ==0 ? 'Women' : 'Man';
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'label'=>Yii::t('main-ui', 'Id'),
			'type'=>'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Id);
			},),
		array(
			'label' => Yii::t('main-ui','Name'),
				'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Name);
			},),
		array(
			'label' => Yii::t('main-ui','Lastname'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Lastname);
			},),
		array(
			'label'=>Yii::t('main-ui','Support'),
			'type'=>'raw',
			'value' =>function($data)
			{
				if(isset($data->Supp->Login))
				{
					$str = CHtml::encode($data->Supp->Login);
					$url = "users/view&id={$data->Supp->Id}";
					return CHtml::link($str, array(Yii::app()->request->baseUrl.$url));
				}
				else
				{
					return CHtml::encode('');
				}
			},),
		array(
			'label' => Yii::t('main-ui','Date Of Birth'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->DOB);
			},),
		array(
			'label' => Yii::t('main-ui','Sex'),
			'value' =>'CHtml::encode($data->Sex)',
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Sex);
			},),
		array(
			'label' => Yii::t('main-ui','Street'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Street);
			},),
		array(
			'label' => Yii::t('main-ui','Appartment'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Appartment);
			},),
		array(
			'label' => Yii::t('main-ui','Zip'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Zip);
			},),
		array(
			'label' => Yii::t('main-ui','City'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->City);
			},),
		array(
			'label' => Yii::t('main-ui','Country'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Country);
			},),
		array(
			'label' => Yii::t('main-ui','DHL Office'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->DHL_Office);
			},),
		array(
			'label' => Yii::t('main-ui','Email'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Email);
			},),
		array(
			'label' => Yii::t('main-ui','Skype/ICQ'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Skype_ICQ);
			},),
		array(
			'label' => Yii::t('main-ui','Phone'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Phone);
			},),
		array(
			'label' => Yii::t('main-ui','Scan ID'),
			'type'=>'raw',
			'value' =>function($data)
			{
				if(isset($data->Scan_ID))
				{
					$str = CHtml::encode($data->Scan_ID);
					$url = $data->Scan_ID;
					if (strpos($url, 'http://') === false)
					{
						$url = 'http://'.$url;
					}
					return CHtml::link($str, $url);
				}
				else
				{
					return CHtml::encode('');
				}
			},),
		array(
			'label' => Yii::t('main-ui','Scan Registration'),
			'type'=>'raw',
			'value' =>function($data)
			{
				if(isset($data->Scan_Registration))
				{
					$str = CHtml::encode($data->Scan_Registration);
					$url = $data->Scan_Registration;
					if (strpos($url, 'http://') === false)
					{
						$url = 'http://'.$url;
					}
					return CHtml::link($str, $url);
				}
				else
				{
					return CHtml::encode('');
				}
			},),
		array(
			'label' => Yii::t('main-ui','Scan Agreement'),
			'type'=>'raw',
			'value' =>function($data)
			{
				if(isset($data->Scan_Agreement))
				{
					$str = CHtml::encode($data->Scan_Agreement);
					$url = $data->Scan_Agreement;
					if (strpos($url, 'http://') === false)
					{
						$url = 'http://'.$url;
					}
					return CHtml::link($str, $url);
				}
				else
				{
					return CHtml::encode('');
				}
			},),
		array(
			'label' => Yii::t('main-ui','Start Date'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Start_Date);
			},),
		array(
			'label' => Yii::t('main-ui','Finish Date'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Finish_Date);
			},),
		array(
			'label' => Yii::t('main-ui','Pay Comment'),
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Pay_Comment);
			},),
		array(
			'label' => Yii::t('main-ui','Staff Comment'),
			'value' =>'CHtml::encode($data->Staff_Comment)',
			'type' => 'raw',
			'value' =>function($data)
			{
				return CHtml::encode($data->Staff_Comment);
			},),
		array(
			'label' => Yii::t('main-ui','Status'),
			'type'=>'raw',
			'value' =>function($data)
			{
				$arr = array('New', 'Test', 'Active','Problem', 'Rat', 'Veteran');
				if(array_key_exists($data->Status, $arr))
				{
					return CHtml::encode($arr[$data->Status]);
				}
				else
				{
					return CHtml::encode('');
				}
			},),	
))); ?>