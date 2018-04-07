<?php
require_once('../IConstants.inc');
require_once($ConstantsArray['dbServerUrl'] ."Managers/AdminMgr.php");
require_once($ConstantsArray['dbServerUrl'] ."Utils/SessionUtil.php");
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Admin.php");
$call = "";
if(isset($_GET["call"])){
	$call = $_GET["call"];
}else{
	$call = $_POST["call"];
}
if($call == "loginAdmin"){
	$username = $_GET["username"];
	$password = $_GET["password"];
	$adminMgr = AdminMgr::getInstance();
	$admin = $adminMgr->logInAdmin($username,$password);
	if(!empty($admin) && $admin->getPassword() == $password){
		$sessionUtil = SessionUtil::getInstance();
		$sessionUtil->createAdminSession($admin);
		echo 1;
	}else{
		echo 0;
	}
	return;
}