<?php
require_once('../IConstants.inc');
require_once($ConstantsArray['dbServerUrl'] ."Managers/AdminMgr.php");
require_once($ConstantsArray['dbServerUrl'] ."Utils/SessionUtil.php");
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Admin.php");
$success = 1;
$call = "";
$response = new ArrayObject();
$isMobile = 0;
if(isset($_GET["call"])){
	$call = $_GET["call"];
	if(isset($_GET["ismobile"])){
		$isMobile = $_GET["ismobile"];
	}
}else{
	$call = $_POST["call"];
	
}
if(!empty($isMobile)){
	if(isset($_GET["adminSeq"]) && !empty($_GET["adminSeq"])){
		$sessionUtil = SessionUtil::getInstance();
		$admin = new Admin();
		$adminSeq = $_GET["adminSeq"];
		$admin->setSeq($adminSeq);
		$sessionUtil->createAdminSession($admin);
	}
}
if($call == "loginAdmin"){
	$username = $_GET["username"];
	$password = $_GET["password"];
	$adminMgr = AdminMgr::getInstance();
	$admin = $adminMgr->logInAdmin($username,$password);
	if(!empty($admin) && $admin->getPassword() == $password){
		$sessionUtil = SessionUtil::getInstance();
		$sessionUtil->createAdminSession($admin);
		$response["admin"] = $adminMgr->toArray($admin);
	}else{
		$success = 0;
		$message = "Incorrect Username or Password";
	}
}
if($call == "changePassword"){
	$password = $_GET["newPassword"];
	$earlierPassword = $_GET["earlierPassword"];
	try{
		$adminMgr = AdminMgr::getInstance();
		$isPasswordExists = $adminMgr->isPasswordExist($earlierPassword);
		if($isPasswordExists){
			$adminMgr->ChangePassword($password);
			$message = "Password Updated Successfully";
		}else{
			$message = "Incorrect Current Password!";
			$success = 0;
		}

	}catch(Exception $e){
		$success = 0;
		$message  = $e->getMessage();
	}
}
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
header("Content-type: application/json");
$response["success"] = $success;
$response["message"] = $message;
echo json_encode($response);
return;