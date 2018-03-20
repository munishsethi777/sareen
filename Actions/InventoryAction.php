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
	try{
		$inventory = new Inventory();
		$inventory->createFromRequest($_POST);
		$isRental = 0;
		if(isset($_POST["isrental"])){
			$isRental =  1;
		}
		$inventory->setIsRental($isRental);
		$isAvailable = 0;
		if(isset($_POST["isavailable"])){
			$isAvailable =  1;
		}
		$inventory->setIsRental($isRental);
		$inventory->setIsAvailable($isAvailable);
		if(empty($inventory->getSeq())){
			$inventory->setCreatedOn(new DateTime());
		}
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
}else if($call == "getInventories"){
	$inventoryMgr = $inventoryMgr::getInstance();
	$inventories = $inventoryMgr->getInventoryForGrid(true);
	$json = json_encode($inventories);
	echo $json;
}else if($call == "deleteInventory"){
         $ids = $_GET["ids"];
         try{
         	$inventoryMgr = $inventoryMgr::getInstance();
            $inventoryMgr->deleteBySeq($ids);
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