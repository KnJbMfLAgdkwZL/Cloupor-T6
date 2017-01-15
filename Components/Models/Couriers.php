<?php
class Couriers
{
	/*
	1	Id					int(11)
	2	Name				varchar(255)	
	3	Lastname			varchar(255)	
	4	Support				int(11)	
	5	DOB					int(10)
	6	Sex					tinyint(1)	
	7	Street				varchar(255)	
	8	Appartment			varchar(255)	
	9	Zip					varchar(255)	
	10	City				varchar(255)	
	11	Country				varchar(255)	
	12	DHL_Office			varchar(255)	
	13	Email				varchar(255)	
	14	Skype_ICQ			varchar(255)	
	15	Phone				varchar(255)	
	16	Scan_ID				varchar(255)	
	17	Scan_Registration	varchar(255)	
	18	Scan_Agreement		varchar(255)	
	19	Start_Date			int(10)
	20	Finish_Date			int(10)
	21	Pay_Comment			text	
	22	Staff_Comment		text	
	23	Status				tinyint(4)
	*/
	static function DELETE($params)
	{
		$sql = 'CALL Couriers_DELETE(:Id)';
		$params = array(
			':Id'	=>	$params['Id']
		);
		DataBase::Execute($sql, $params);
	}
	static function INSERT($params)
	{
		$sql = 'CALL Couriers_INSERT(:Name, :Lastname, :Support, :DOB, :Sex, :Street, :Appartment, :Zip, :City, :Country, :DHL_Office, :Email, :Skype_ICQ, :Phone, :Scan_ID, :Scan_Registration, :Scan_Agreement, :Start_Date, :Finish_Date, :Pay_Comment, :Staff_Comment, :Status)';
		$params = array(
			':Name'	=>	$params['Name'],
			':Lastname'	=>	$params['Lastname'],
			':Support'	=>	$params['Support'],
			':DOB'	=>	$params['DOB'],
			':Sex'	=>	$params['Sex'],
			':Street'	=>	$params['Street'],
			':Appartment'	=>	$params['Appartment'],
			':Zip'	=>	$params['Zip'],
			':City'	=>	$params['City'],
			':Country'	=>	$params['Country'],
			':DHL_Office'	=>	$params['DHL_Office'],
			':Email'	=>	$params['Email'],
			':Skype_ICQ'	=>	$params['Skype_ICQ'],
			':Phone'	=>	$params['Phone'],
			':Scan_ID'	=>	$params['Scan_ID'],
			':Scan_Registration'	=>	$params['Scan_Registration'],
			':Scan_Agreement'	=>	$params['Scan_Agreement'],
			':Start_Date'	=>	$params['Start_Date'],
			':Finish_Date'	=>	$params['Finish_Date'],
			':Pay_Comment'	=>	$params['Pay_Comment'],
			':Staff_Comment'	=>	$params['Staff_Comment'],
			':Status'	=>	$params['Status']
			);
		DataBase::Execute($sql, $params);
	}
	static function SELECT()
	{
		$sql = 'CALL Couriers_SELECT()';
		$result = DataBase::Execute($sql);
		return $result;
	}
	static function UPDATE($params)
	{
		$sql = 'CALL Couriers_UPDATE(:Id, :Name, :Lastname, :Support, :DOB, :Sex, :Street, :Appartment, :Zip, :City, :Country, :DHL_Office, :Email, :Skype_ICQ, :Phone, :Scan_ID, :Scan_Registration, :Scan_Agreement, :Start_Date, :Finish_Date, :Pay_Comment, :Staff_Comment, :Status)';
		$params = array(
			':Id'	=>	$params['Id'],
			':Name'	=>	$params['Name'],
			':Lastname'	=>	$params['Lastname'],
			':Support'	=>	$params['Support'],
			':DOB'	=>	$params['DOB'],
			':Sex'	=>	$params['Sex'],
			':Street'	=>	$params['Street'],
			':Appartment'	=>	$params['Appartment'],
			':Zip'	=>	$params['Zip'],
			':City'	=>	$params['City'],
			':Country'	=>	$params['Country'],
			':DHL_Office'	=>	$params['DHL_Office'],
			':Email'	=>	$params['Email'],
			':Skype_ICQ'	=>	$params['Skype_ICQ'],
			':Phone'	=>	$params['Phone'],
			':Scan_ID'	=>	$params['Scan_ID'],
			':Scan_Registration'	=>	$params['Scan_Registration'],
			':Scan_Agreement'	=>	$params['Scan_Agreement'],
			':Start_Date'	=>	$params['Start_Date'],
			':Finish_Date'	=>	$params['Finish_Date'],
			':Pay_Comment'	=>	$params['Pay_Comment'],
			':Staff_Comment'	=>	$params['Staff_Comment'],
			':Status'	=>	$params['Status']
			);
		DataBase::Execute($sql, $params);
	}
}