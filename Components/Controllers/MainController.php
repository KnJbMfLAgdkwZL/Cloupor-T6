<?php
class MainController
{
    static function Route()
    {   
		$action = 'Main';
		$method = self::GetMethod();
		if(self::NotEmpty($method))
		{
			$method = self::ClearHtml($method);
			if(self::NotEmpty($method['action']))
			{
				$action = $method['action'];
			}
        }
		if(method_exists('MainController', $action))
		{
			self::$action();
		}
		else
		{
			self::Error404();
		}
    }
	static function NotEmpty(&$var)
	{
		if(isset($var))
		{
			if(!empty($var))
			{
				return true;
			}
		}
		return false;
	}
	static function GetMethod()
	{
		$method = null;
		if(self::NotEmpty($_GET))
		{
			$method = &$_GET;
		}
		if(self::NotEmpty($_POST))
		{
			$method = &$_POST;
		}
		return $method;
	}
	static function GetParams()
	{
		$params = null;
		$method = self::GetMethod();
		if(self::NotEmpty($method))
			$params = $method;
		if(self::NotEmpty($params['action']))
			unset($params['action']);
		return $params;
	}
	static function ClearHtml($mass) 
	{
		foreach($mass as $key=>$val)
		{
			$mass[$key] = trim($mass[$key]);
			$mass[$key] = stripslashes($mass[$key]);
			$mass[$key] = htmlspecialchars($mass[$key]);
		}
		return $mass;
	}
	static function Render($page, $model=null)
	{
		if(self::NotEmpty($model))
		{
			extract($model, EXTR_PREFIX_SAME, '');
		}
		require_once('header.php');
		require_once("/$page/$page.php");
		require_once('footer.php');
	}
	static function Main()
    {
		print self::UserCheck();
		self::Render('Main');
    }
	static function Error404()
	{
		header("HTTP/1.0 404 Not Found");
		header("Status: 404 Not Found");
		http_response_code(404);
		self::Render('Error404');
		exit();
	}
	static function UserRegistr()
	{
		$params = self::GetParams();
		$salt = 'G6oiBXgxkSKbHulD5u8qWzIHHvCpRAjLBil3gryGGs9sXere';
		$params['Password'] = md5(md5($params['Password']).$salt);
		DataBase::UserInsert($params);
	}
	static function UserLogin()
    {
		$params = self::GetParams();
		$salt = 'G6oiBXgxkSKbHulD5u8qWzIHHvCpRAjLBil3gryGGs9sXere';
		$params['Password'] = md5(md5($params['Password']).$salt);
		$result = DataBase::UserGet($params);
		if(self::NotEmpty($result))
        {
			$str = $params['Login'].$params['Password'].mt_rand(11111, 999999);
			$i = 0;
			$randstr = '';
			$len = strlen($str);
			while($i < $len)
			{
				$randstr.= $str[mt_rand(0, $len-1)];
				$i++;
			}
			$name = md5(md5($randstr));
			$time = time();
			DataBase::SessionDelete($result);
			session_start();
			$_SESSION['users_id'] = $result['Id'];
			$_SESSION['users_session_name'] = $name;
			$_SESSION['users_time'] = $time;
			$params = array('users_id'=>$result['Id'], 'users_session_name'=>$name, 'users_time'=>$time);
			DataBase::SessionInsert($params);
            header('Location: /');
        }
        else
        {
			//print "<script>alert('Неправильный Логин или пароль')</script>";
			header('Location: /');
        }
    }
	static function UserLogout()
	{
		session_start();
		if(self::NotEmpty($_SESSION))
		{
			if(self::NotEmpty($_SESSION['users_id']) && self::NotEmpty($_SESSION['users_session_name']))
			{
				$result = DataBase::SessionGet($_SESSION);
				if(self::NotEmpty($result))
				{
					$result['Id'] = $result['users_id'];
					DataBase::SessionDelete($result);
				}
			}
		}
		session_destroy();
		setcookie(session_name(), '');
		header('Location: /');
	}
    static function UserCheck()
    {
		session_start();
		if(self::NotEmpty($_SESSION))
        {
			if(self::NotEmpty($_SESSION['users_id']) && self::NotEmpty($_SESSION['users_session_name']))
			{
				$result = DataBase::SessionGet($_SESSION);
				if(self::NotEmpty($result))
                {
					$result = DataBase::UserGetById($result);
					if(self::NotEmpty($result))
                    {
						return $result['Role'];
                    }
                }
            }
        }
		session_destroy();
		setcookie(session_name(), '');
        return 0;
    }

	static function Couriers()
	{
		$Couriers = Couriers::SELECT();
		$model = array('Couriers'=>$Couriers);
		self::Render('Couriers', $model);
	}
	static function CourierInsert()
	{
		$params = self::GetParams();
		$params['DOB'] = strtotime($params['DOB']) + 30000;
		$params['Start_Date'] = strtotime($params['Start_Date']) + 30000;
		$params['Finish_Date'] = strtotime($params['Finish_Date']) + 30000;
		Couriers::INSERT($params);
		self::Couriers();
	}
	static function CourierUpdate()
	{
		$params = self::GetParams();
		DataBase::CourierUpdate($params);
	}

}