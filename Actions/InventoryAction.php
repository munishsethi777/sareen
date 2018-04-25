<?php
require_once('../IConstants.inc');
require_once($ConstantsArray['dbServerUrl'] ."Managers/InventoryMgr.php");
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Inventory.php");
require_once($ConstantsArray['dbServerUrl'] ."Utils/FileUtil.php");
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
$response = new ArrayObject();
$inventoryMgr = InventoryMgr::getInstance();
if(!empty($isMobile)){
	header ( 'Access-Control-Allow-Origin: *' );
	header ( "Access-Control-Allow-Credentials: true" );
	header ( 'Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS' );
	header ( 'Access-Control-Max-Age: 1000' );
	header ( 'Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description' );
	header ( "Content-type: application/json" );
}
if($call == "saveInventory"){
	try{
		$inventory = new Inventory();
		$inventory->createFromRequest($_REQUEST);
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
		
		if($inventory->getMedium() == "direct"){
			$inventory->setMediumName("");
			$inventory->setMediumAddress("");
			$inventory->setMediumPhone("");
		}
		$inventory->setLastmodifiedon(new DateTime());
		$id = $inventoryMgr->saveInventory($inventory);
		if(isset($_FILES["inventoryImage"])){
			$file = $_FILES["inventoryImage"];
			$filename = $file["name"];
			$imageType = pathinfo($filename, PATHINFO_EXTENSION);
			$uploaddir = StringConstants::PROPERTY_IMAGE_PATH;
			$filename = $id .".". $imageType;
			$imageName = FileUtil::uploadImageFiles($file,$uploaddir,$filename);
			$destination = $uploaddir.$imageName;
			$thumbnailDestination = $uploaddir .$id ."_thumb.". $imageType;
			FileUtil::resizeImageAndUpload($destination,$thumbnailDestination);
		}
		$message = "Inventory Saved Successfully";
	}catch(Exception $e){
		$success = 0;
		$message  = $e->getMessage();
	}
	
}else if($call == "getInventories"){
	$inventoryMgr = $inventoryMgr::getInstance();
	$inventories = $inventoryMgr->getInventoryForGrid(true);
	$json = json_encode($inventories);
	echo $json;
	return;
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
        return;
 }

 $response ["success"] = $success;
 $response ["message"] = $message;
 echo json_encode ( $response );
 return;