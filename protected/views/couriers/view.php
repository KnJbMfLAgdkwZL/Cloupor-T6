<?php
$this->menu=array(
	array('label'=>'List Couriers', 'url'=>array('index')),
	array('label'=>'Create Couriers', 'url'=>array('create')),
	array('label'=>'Update Couriers', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Couriers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Couriers', 'url'=>array('admin')),
);
?>
<h1>View Couriers #<?php echo $model->Id; ?></h1>
<?php
	$model['Sex'] = $model['Sex'] ==0 ? 'Women' : 'Man';
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Name',
		'Lastname',
		//'Supp.Login',
		array(
			'name'=>'Support',
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
		'DOB',
		'Sex',
		'Street',
		'Appartment',
		'Zip',
		'City',
		'Country',
		'DHL_Office',
		'Email',
		'Skype_ICQ',
		'Phone',
		//'Scan_ID',
		array(
			'name'=>'Scan_ID',
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
		//'Scan_Registration',
		array(
			'name'=>'Scan_Registration',
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
		//'Scan_Agreement',
		array(
			'name'=>'Scan_Agreement',
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
		'Start_Date',
		'Finish_Date',
		'Pay_Comment',
		'Staff_Comment',
		//'Status',
		array(
			'name'=>'Status',
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
	),
)); ?>

