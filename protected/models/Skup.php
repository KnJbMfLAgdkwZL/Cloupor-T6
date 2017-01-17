<?php
//$Id
//$Merchandise
//$Comment
//$No1
//$No2
//$No3
//$Skupforever
class Skup extends CActiveRecord
{
	public function tableName()
	{
		return 'skup';
	}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Merchandise, Comment', 'required'),
			array('Skupforever', 'numerical', 'integerOnly'=>true),
			array('No1, No2, No3', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Merchandise, Comment, No1, No2, No3, Skupforever', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Merchandise' => 'Merchandise',
			'Comment' => 'Comment',
			'No1' => 'No1',
			'No2' => 'No2',
			'No3' => 'No3',
			'Skupforever' => 'Skupforever',
		);
	}
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria;
		$criteria->compare('Id',$this->Id);
		$criteria->compare('Merchandise',$this->Merchandise,true);
		$criteria->compare('Comment',$this->Comment,true);
		$criteria->compare('No1',$this->No1,true);
		$criteria->compare('No2',$this->No2,true);
		$criteria->compare('No3',$this->No3,true);
		$criteria->compare('Skupforever',$this->Skupforever);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}