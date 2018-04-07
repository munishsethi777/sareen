<?php
class SessionUtil{
	private static $sessionUtil;
	private static $ADMIN_LOGGED_IN = "adminLoggedIn";
	public static function getInstance(){
		if(!self::$sessionUtil){
			session_start();
			self::$sessionUtil = new SessionUtil();
			return self::$sessionUtil;
		}
		return self::$sessionUtil;
	}
	
	public function createAdminSession(Admin $admin){
		$arr = new ArrayObject();
		$arr[0] = $admin->getSeq();
		$arr[1] = $admin->getName();
		$_SESSION[self::$ADMIN_LOGGED_IN] = $arr;
	}
	
	
	public function getAdminLoggedInName(){
		if($_SESSION[self::$ADMIN_LOGGED_IN] != null){
			$arr = $_SESSION[self::$ADMIN_LOGGED_IN];
			return $arr[1];
		}
	}
	
	public function getAdminLoggedInSeq(){
		if($_SESSION[self::$ADMIN_LOGGED_IN] != null){
			$arr = $_SESSION[self::$ADMIN_LOGGED_IN];
			return $arr[0];
		}
	}
	
	public function isSessionAdmin(){
		if(	$_SESSION[self::$ADMIN_LOGGED_IN] != null){
			return true;
		}
		return false;
	}
	
	public function sessionCheck(){
		$bool = self::isSessionAdmin();
		if($bool == false){
			header("location: adminLogin.php");
			die;
		}
	}
	
	public function destroySession(){
		$boolAdmin = self::isSessionAdmin();
		$_SESSION = array();
		session_destroy();
		if($boolAdmin == true){
			header("Location:adminLogin.php");
			die;
		}
	}
}
?>