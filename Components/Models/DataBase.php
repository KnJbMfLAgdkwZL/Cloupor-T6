<?php
class DataBase
{
    static protected $Host = 'localhost';
	static protected $DBname = 'cloupor';
	static protected $Username = 'root';
    static protected $Password = '';
    static protected $DBH;
    static function Connect()
    {
        if(!isset(self::$DBH))
        {
            $Connection = 'mysql:host='.self::$Host.';dbname='.self::$DBname.';charset=utf8';
            self::$DBH = new PDO($Connection, self::$Username, self::$Password);
        }
    }
    static function Disconnect()
    {
        self::$DBH = null;
    }
    static function Execute($sql, $params=null)
    {
        self::Connect();
        $stm = self::$DBH->prepare($sql);
        $stm->execute($params);
        $items = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $items;
    }

	static function UserGet($params)
    {
		$sql = 'CALL UserGet(:Login, :Password)';
		$params = array(
			':Login'	=>	$params['Login'],
			':Password'	=>	$params['Password']
			);
        $result = self::Execute($sql, $params);
		if(count($result) > 0)
			$result = $result[0];
        return $result;
    }
	static function UserGetById($params)
    {
		$sql = 'CALL UserGetById(:Id)';
		$params = array(
			':Id'	=>	$params['users_id']
			);
		$result = self::Execute($sql, $params);
		if(count($result) > 0)
			$result = $result[0];
		return $result;
	}
	static function UserInsert($params)
	{
		$sql = 'CALL UserInsert(:Login, :Password, :Role)';
		$params = array(
			':Login'	=>	$params['Login'],
			':Password'	=>	$params['Password'],
			':Role'	=>	1
			);
		self::Execute($sql, $params);
	}
	static function SessionGet($params)
	{
		$sql = 'CALL SessionGet(:users_id, :users_session_name)';
		$params = array(
			':users_id'	=>	$params['users_id'],
			':users_session_name'	=>	$params['users_session_name']
			);
		$result = self::Execute($sql, $params);
		if(count($result) > 0)
			$result = $result[0];
		return $result;
	}
	static function SessionInsert($params)
	{
		$sql = 'CALL SessionInsert(:id, :name, :time)';
		$params = array(
			':id'	=>	$params['users_id'],
			':name'	=>	$params['users_session_name'],
			':time'	=>	$params['users_time']
			);
		self::Execute($sql, $params);
	}
	static function SessionDelete($params)
	{
		$sql = 'CALL SessionDelete(:Id)';
		$params = array(
			':Id'	=>	$params['Id']
			);
		self::Execute($sql, $params);
	}
	
}