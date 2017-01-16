<?php
class Packs extends CActiveRecord
{
	public function tableName()
	{
		return 'packs';
	}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Date, Courier, Staffer, Track, Summ, Currency, Status', 'required'),
			array('Courier, Staffer, Status', 'numerical', 'integerOnly'=>true),
			array('Summ', 'numerical'),
			array('Track, Skup_reShip, Currency', 'length', 'max'=>255),
			array('Comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Date, Courier, Staffer, Track, Comment, Skup_reShip, Summ, Currency, Status', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
			'staffer' => array(self::BELONGS_TO, 'Users', 'Staffer'),
			'couriertb' => array(self::BELONGS_TO, 'Couriers', 'Courier'),
			);
	}
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Date' => 'Date',
			'Courier' => 'Courier',
			'Staffer' => 'Staffer',
			'Track' => 'Track',
			'Comment' => 'Comment',
			'Skup_reShip' => 'Skup Re Ship',
			'Summ' => 'Summ',
			'Currency' => 'Currency',
			'Status' => 'Status',
		);
	}
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
		$criteria->compare('Id',$this->Id);
		$criteria->compare('Date',$this->Date,true);
		$criteria->compare('Courier',$this->Courier);
		$criteria->compare('Staffer',$this->Staffer);
		$criteria->compare('Track',$this->Track,true);
		$criteria->compare('Comment',$this->Comment,true);
		$criteria->compare('Skup_reShip',$this->Skup_reShip,true);
		$criteria->compare('Summ',$this->Summ);
		$criteria->compare('Currency',$this->Currency,true);
		$criteria->compare('Status',$this->Status);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}