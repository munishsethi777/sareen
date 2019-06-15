<?php
require_once('../IConstants.inc');
require_once($ConstantsArray['dbServerUrl'] ."Managers/NoteMgr.php");
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Note.php");
require_once($ConstantsArray['dbServerUrl'] ."StringConstants.php");
require_once($ConstantsArray['dbServerUrl'] ."Utils/SessionUtil.php");
$call = "";
$isMobile = 0;
if(isset($_POST["call"])){
	$call = $_POST["call"];
}else{
	$call = $_GET["call"];
	if(isset($_GET["ismobile"])){
		$isMobile = $_GET["ismobile"];
	}
}
$success = 1;
$message = "";
$noteMgr = NoteMgr::getInstance();
if(!empty($isMobile)){
	header ( 'Access-Control-Allow-Origin: *' );
	header ( "Access-Control-Allow-Credentials: true" );
	header ( 'Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS' );
	header ( 'Access-Control-Max-Age: 1000' );
	header ( 'Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description' );
	header ( "Content-type: application/json" );
}
if($call == "saveNote"){
	try{
		$note = new Note();
		$note->createFromRequest($_REQUEST);
		$note->setLastmodifiedon(new DateTime());
		$note->setCreatedOn(new DateTime());
		$sessionUtil = SessionUtil::getInstance();
		$adminSeq = $sessionUtil->getAdminLoggedInSeq();
		$note->setAdminSeq($adminSeq);
		$id = $noteMgr->saveNote($note);
		$message = "Note Saved Successfully";
	}catch(Exception $e){
		$success = 0;
		$message  = $e->getMessage();
	}
	$response = new ArrayObject();
	$response["success"]  = $success;
	$response["message"]  = $message;
	echo json_encode($response);
}
else if($call == "getNotes"){
	$notes = $noteMgr->getAllForGrid(true);
	$json = json_encode($notes);
	echo $json;
}else if($call == "deleteNotes"){
	$ids = $_GET["ids"];
	try{
		$noteMgr->deleteNotes($ids);
		$message = "Record Deleted successfully";
	}catch(Exception $e){
		$success = 0;
		$message  = $e->getMessage();
	}
	$response = new ArrayObject();
	$response["success"]  = $success;
	$response["message"]  = $message;
	echo json_encode($response);
}
