<?php
require_once('../IConstants.inc');
require_once($ConstantsArray['dbServerUrl'] ."Managers/InventoryMgr.php");
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Inventory.php");
$call = "";
if(isset($_POST["call"])){
	$call = $_POST["call"];
}else{
	$call = $_GET["call"];
}
$success = 1;
$message = "";
$inventoryMgr = InventoryMgr::getInstance();
if($call == "saveInventory"){
	$seq = 0;
	if(isset($_REQUEST["seq"])){
		$seq = $_REQUEST["seq"];
	}
// 	$purpose = $_REQUEST["purpose"];
// 	$medium = $_REQUEST["medium"];
// 	$plotnumber = $_REQUEST["plotnumber"];
// 	$address1 = $_REQUEST["address1"];
// 	$address2 = $_REQUEST["address2"];
// 	$landmark = $_REQUEST["landmark"];
// 	$city = $_REQUEST["city"];
// 	$propertyarea = $_REQUEST["propertyarea"];
// 	$propertyunit = $_REQUEST["propertyunit"];
// 	$dimensionlength = $_REQUEST["dimensionlength"];
// 	$dimensionbreadth = $_REQUEST["dimensionbreadth"];
// 	$facing = $_REQUEST["facing"];
// 	$referredby = $_REQUEST["referredby"];
// 	$contactperson = $_REQUEST["contactperson"];
// 	$contactmobile = $_REQUEST["contactmobile"];
// 	$contactaddress = $_REQUEST["contactaddress"];
// 	$rate = $_REQUEST["rate"];
// 	$expectedamount = $_REQUEST["expectedamount"];
// 	$documentation = $_REQUEST["documentation"];
// 	$time = $_REQUEST["time"];
// 	$furnishing = $_REQUEST["furnishing"];
// 	$furnishingdetails = $_REQUEST["furnishingdetails"];
// 	$stories = $_REQUEST["stories"];
// 	$constructionyears = $_REQUEST["constructionyears"];
// 	$totalsellers = $_REQUEST["totalsellers"];
// 	$propertynumbers = $_REQUEST["propertynumbers"];
// 	$acquired = $_REQUEST["acquired"];
// 	$propertytype = $_REQUEST["propertytype"];
// 	$totalrooms = $_REQUEST["totalrooms"];
// 	$isrental = $_REQUEST["isrental"];
// 	$createdon = $_REQUEST["createdon"];
// 	$lastmodifiedon = $_REQUEST["lastmodifiedon"];
// 	$isavailable = $_REQUEST["isavailable"];
// 	$inventory = new Inventory();
	try{
		$inventory = new Inventory($_POST);
		$isRental = 0;
		if(!empty($inventory->getIsRental())){
			$isRental =  1;
		}
		$inventory->setIsRental($isRental);
		$isAvailable = 0;
		if(!empty($inventory->getIsAvailable())){
			$isAvailable =  1;
		}
		$inventory->setIsRental($isRental);
		$inventory->setIsAvailable($isAvailable);
		$inventory->setCreatedOn(new DateTime());
		$inventory->setLastmodifiedon(new DateTime());
		$inventoryMgr->saveInventory($inventory);
		$message = "Inventory Saved Successfully";
	}catch(Exception $e){
		$success = 0;
		$message  = $e->getMessage();
	}
	$response = new ArrayObject();
	$response["success"]  = $success;
	$response["message"]  = $message;
	echo json_encode($response);
}