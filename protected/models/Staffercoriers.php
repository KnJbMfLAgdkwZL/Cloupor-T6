<?php
class Staffercoriers extends CActiveRecord
{
	public function tableName()
	{
		return 'staffercoriers';
	}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdStaffer, IdCoriers', 'required'),
			array('IdStaffer, IdCoriers, Request', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, IdStaffer, IdCoriers, Request', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Staffer' => array(self::BELONGS_TO, 'Users', 'IdStaffer'),
			'Coriers' => array(self::BELONGS_TO, 'Couriers', 'IdCoriers'),
			);
	}
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'IdStaffer' => 'Id Staffer',
			'IdCoriers' => 'Id Coriers',
			'Request' => 'Request',
		);
	}
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria;
		$criteria->compare('Id',$this->Id);
		$criteria->compare('IdStaffer',$this->IdStaffer);
		$criteria->compare('IdCoriers',$this->IdCoriers);
		$criteria->compare('Request',$this->Request);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function getAssocList()
	{
		$id = Yii::app()->user->getId();
		$criteria = new CDbCriteria();
		$criteria->addCondition("IdStaffer = :id");
		$criteria->addCondition("IdCoriers = Coriers.Id");
		$criteria->addCondition("Request = 1");
		$criteria->with = array('Coriers');
		$criteria->params = array('id' => $id );
		$models = Staffercoriers::model()->findAll($criteria);
		return CHtml::listData($models, 'Coriers.Id', function($model) {
				return CHtml::encode($model->Coriers->Lastname.' '.$model->Coriers->Name);
		});
	}
}