<?php
require_once('../IConstants.inc');
require_once($ConstantsArray['dbServerUrl'] ."Managers/EnquiryMgr.php");
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Enquiry.php");
require_once($ConstantsArray['dbServerUrl'] ."StringConstants.php");
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
$enquiryMgr = EnquiryMgr::getInstance();
if(!empty($isMobile)){
	header ( 'Access-Control-Allow-Origin: *' );
	header ( "Access-Control-Allow-Credentials: true" );
	header ( 'Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS' );
	header ( 'Access-Control-Max-Age: 1000' );
	header ( 'Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description' );
	header ( "Content-type: application/json" );
}
if($call == "saveEnquiry"){
	try{
		$enquiry = new Enquiry();
		$enquiry->createFromRequest($_REQUEST);
		$isRental = 0;
		if(isset($_REQUEST["isrental"]) && !empty($_REQUEST["isrental"])){
			$isRental =  1;
		}
		$enquiry->setIsRental($isRental);
		$isFullfilled = 0;
		if(isset($_REQUEST["isfullfilled"]) && !empty($_REQUEST["isfullfilled"])){
			$isFullfilled =  1;
		}
		$enquiry->setIsRental($isRental);
		$enquiry->setIsFullfilled($isFullfilled);
		if(empty($enquiry->getSeq())){
			$enquiry->setCreatedOn(new DateTime());
		}
		$enquiry->setLastmodifiedon(new DateTime());
		$id = $enquiryMgr->saveEnquiry($enquiry);
		$message = "Enquiry Saved Successfully";
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
}else if($call == "deleteEnquiry"){
         $ids = $_GET["ids"];
         try{
            $enquiryMgr->deleteBySeq($ids);
            $message = "Record Deleted successfully";
        }catch(Exception $e){
            $success = 0;
            $message  = $e->getMessage();
        }
        $response = new ArrayObject();
        $response["success"]  = $success;
        $response["message"]  = $message;
        echo json_encode($response);
 }else if($call == "getEnquiryDetails"){
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$enquiryMgr = EnquiryMgr::getInstance();
		$enquiry = $enquiryMgr->findArrayBySeq($id);
		if(empty($enquiry)){
			$response["enquiry"] = null;
			$success = 0;
			$message = "Invalid enquiry id";
		}else{
			$response = new ArrayObject();
			$response["enquiry"] = $enquiry;
			$response["success"]  = 1;
			$response["message"]  = "";
			echo json_encode($response);
		}
	}else{
		$success = 0;
		$message = "Invalid enquiry id";
	}
}