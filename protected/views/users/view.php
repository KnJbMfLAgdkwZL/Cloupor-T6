<?php
$this->menu=array(
	array('label'=>Yii::t('main-ui', 'Create Users'), 'url'=>array('create')),
	array('label'=>Yii::t('main-ui', 'Update Users'), 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>Yii::t('main-ui', 'Delete Users'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main-ui', 'Manage Users'), 'url'=>array('admin')),
	);
$str = Yii::t('main-ui', 'View Users');
echo "<h1>$str {$model->Login}</h1>";
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
					'label'=>Yii::t('main-ui', 'Login'),
					'type'=>'raw',
					'value' =>function($data)
					{
						return CHtml::encode($data->Login);
					},),
				array(
					'label'=>Yii::t('main-ui', 'Registration Date'),
					'type'=>'raw',
					'value' =>function($data)
					{
						return CHtml::encode($data->Reg_Date);
					},),
				array(
					'label'=>Yii::t('main-ui', 'Role'),
					'type'=>'raw',
					'value' =>function($data)
					{
						return CHtml::encode($data->users_roles->Name);
					},),
                array(
                    'label'=>Yii::t('main-ui', 'Comments'),
                    'type'=>'raw',
                    'value' =>function($data)
                    {
                        return CHtml::encode($data->Comments);
                    },),
                array(
                    'label'=>Yii::t('main-ui', 'Requisites'),
                    'type'=>'raw',
                    'value' =>function($data)
                    {
                        return CHtml::encode($data->Requisites);
                    },),
                array(
                    'label'=>Yii::t('main-ui', 'Jabber'),
                    'type'=>'raw',
                    'value' =>function($data)
                    {
                        return CHtml::encode($data->Jabber);
                    },),
                array(
                    'label'=>Yii::t('main-ui', 'Wmid'),
                    'type'=>'raw',
                    'value' =>function($data)
                    {
                        return CHtml::encode($data->Wmid);
                    },),

				),
			));
?>