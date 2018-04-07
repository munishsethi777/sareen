<?php
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Admin.php");
require_once($ConstantsArray['dbServerUrl'] ."DataStores/BeanDataStore.php");
class AdminMgr{
	private static $adminMgr;
	private static $adminDataStore;
	
	public static function getInstance()
	{
		if (!self::$adminMgr)
		{
			self::$adminMgr = new AdminMgr();
			self::$adminDataStore = new BeanDataStore(Admin::$className,Admin::$tableName);
		}
		return self::$adminMgr;
	}
	
	public function logInAdmin($username, $password){
		$conditionVal["username"] = $username;
		$admin = self::$adminDataStore->executeConditionQuery($conditionVal);
		if(!empty($admin)){
			return $admin[0];
		}
		return null;
	}
	
	public function getAllAdmins(){
		$admins = self::$adminDataStore->findAll();
		return $admins;
	}
}