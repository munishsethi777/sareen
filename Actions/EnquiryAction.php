<?php
require_once('../IConstants.inc');
require_once($ConstantsArray['dbServerUrl'] ."Managers/EnquiryMgr.php");
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Enquiry.php");
require_once($ConstantsArray['dbServerUrl'] ."StringConstants.php");
$call = "";
if(isset($_POST["call"])){
	$call = $_POST["call"];
}else{
	$call = $_GET["call"];
}
$success = 1;
$message = "";
$enquiryMgr = EnquiryMgr::getInstance();
if($call == "saveEnquiry"){
	try{
		$enquiry = new Enquiry();
		$enquiry->createFromRequest($_POST);
		$isRental = 0;
		if(isset($_POST["isrental"])){
			$isRental =  1;
		}
		$enquiry->setIsRental($isRental);
		$isFullfilled = 0;
		if(isset($_POST["isfullfilled"])){
			$isFullfilled =  1;
		}
		$enquiry->setIsRental($isRental);
		$enquiry->setIsFullfilled($isFullfilled);
		if(empty($enquiry->getSeq())){
			$enquiry->setCreatedOn(new DateTime());
		}
		$enquiry->setLastmodifiedon(new DateTime());
		$id = $enquiryMgr->saveEnquiry($enquiry);
		$message = "Enquery Saved Successfully";
	}catch(Exception $e){
		$success = 0;
		$message  = $e->getMessage();
	}
	$response = new ArrayObject();
	$response["success"]  = $success;
	$response["message"]  = $message;
	echo json_encode($response);
}else if($call == "getEnquiries"){
	$enquiries = $enquiryMgr->getEnqueryForGrid(true);
	$json = json_encode($enquiries);
	echo $json;
}