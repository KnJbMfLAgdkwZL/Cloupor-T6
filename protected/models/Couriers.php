<?php
class Couriers extends CActiveRecord
{
	public function tableName()
	{
		return 'couriers';
	}
	public function rules()
	{
		return array(
			array('Name, Lastname, Support, DOB, Sex, Street, Appartment, Zip, City, Country, DHL_Office, Email, Skype_ICQ, Phone, Scan_ID, Scan_Registration, Scan_Agreement, Start_Date, Finish_Date, Pay_Comment, Staff_Comment, Status', 'required'),
			array('Support, Sex, Status', 'numerical', 'integerOnly'=>true),
			array('Name, Lastname, Street, Appartment, Zip, City, Country, DHL_Office, Email, Skype_ICQ, Phone, Scan_ID, Scan_Registration, Scan_Agreement', 'length', 'max'=>255),
			array('DOB, Start_Date, Finish_Date', 'length', 'max'=>10),
			array('Id, Name, Lastname, Support, DOB, Sex, Street, Appartment, Zip, City, Country, DHL_Office, Email, Skype_ICQ, Phone, Scan_ID, Scan_Registration, Scan_Agreement, Start_Date, Finish_Date, Pay_Comment, Staff_Comment, Status', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array(
			'Supp' => array(self::BELONGS_TO, 'Users', 'Support'),
			'Staffer' => array(self::HAS_MANY, 'Staffercoriers', 'IdStaffer'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Name' => 'Name',
			'Lastname' => 'Lastname',
			'Support' => 'Support',
			'DOB' => 'Dob',
			'Sex' => 'Sex',
			'Street' => 'Street',
			'Appartment' => 'Appartment',
			'Zip' => 'Zip',
			'City' => 'City',
			'Country' => 'Country',
			'DHL_Office' => 'Dhl Office',
			'Email' => 'Email',
			'Skype_ICQ' => 'Skype Icq',
			'Phone' => 'Phone',
			'Scan_ID' => 'Scan',
			'Scan_Registration' => 'Scan Registration',
			'Scan_Agreement' => 'Scan Agreement',
			'Start_Date' => 'Start Date',
			'Finish_Date' => 'Finish Date',
			'Pay_Comment' => 'Pay Comment',
			'Staff_Comment' => 'Staff Comment',
			'Status' => 'Status',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('Id',$this->Id);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Lastname',$this->Lastname,true);
		$criteria->compare('Support',$this->Support);
		$criteria->compare('DOB',$this->DOB,true);
		$criteria->compare('Sex',$this->Sex);
		$criteria->compare('Street',$this->Street,true);
		$criteria->compare('Appartment',$this->Appartment,true);
		$criteria->compare('Zip',$this->Zip,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('Country',$this->Country,true);
		$criteria->compare('DHL_Office',$this->DHL_Office,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Skype_ICQ',$this->Skype_ICQ,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('Scan_ID',$this->Scan_ID,true);
		$criteria->compare('Scan_Registration',$this->Scan_Registration,true);
		$criteria->compare('Scan_Agreement',$this->Scan_Agreement,true);
		$criteria->compare('Start_Date',$this->Start_Date,true);
		$criteria->compare('Finish_Date',$this->Finish_Date,true);
		$criteria->compare('Pay_Comment',$this->Pay_Comment,true);
		$criteria->compare('Staff_Comment',$this->Staff_Comment,true);
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