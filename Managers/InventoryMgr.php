<?php
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Inventory.php");
require_once($ConstantsArray['dbServerUrl'] ."DataStores/BeanDataStore.php");
require_once($ConstantsArray['dbServerUrl'] ."Enums/FacingType.php");
require_once($ConstantsArray['dbServerUrl'] ."Enums/PropertyType.php");
class InventoryMgr{

    private static $inventoryMgr;
    private static $inventoryDataStore;
    public static function getInstance()
    {
        if (!self::$inventoryMgr)
        {
            self::$inventoryMgr = new InventoryMgr();
            self::$inventoryDataStore = new BeanDataStore(Inventory::$className,Inventory::$tableName); 
        }
        return self::$inventoryMgr;
    }
    
    public function saveInventory($inventoryObj){
    	$id = self::$inventoryDataStore->save($inventoryObj);
    	return $id;
    }
    
    public function findBySeq($seq){
    	$inventoryObj = self::$inventoryDataStore->findBySeq($seq);
    	return $inventoryObj;
    }
    
    public function findArrayBySeq($seq){
    	$inventoryArr = self::$inventoryDataStore->findArrayBySeq($seq);
    	return $inventoryArr;
    }
    
    public function deleteBySeq($seqs){
    	$flag = self::$inventoryDataStore->deleteInList($seqs);
    	if($flag){
    		$this->deleteImages($seqs);
    	}
    	return $flag;
    }
    
    public function deleteImages($seqs){
    	$seqs = explode(",", $seqs);
    	foreach ($seqs as $seq){
    		$imagePath = StringConstants::PROPERTY_IMAGE_PATH;
    		$orgImagePath = $imagePath . $seq.".jpg";
    		FileUtil::deletefile($orgImagePath);
    		$optImagePath = $imagePath . $seq."_opt.jpg";
    		FileUtil::deletefile($optImagePath);
    		$thumbImagePath = $imagePath . $seq."_thumb.jpg";
    		FileUtil::deletefile($thumbImagePath);
    	}	
    }
    
   	public function changeAvailableStatus($isAvailabletatus,$seq){
   		$colVal["isavailable"] = $isAvailabletatus;
   		$where["seq"] = $seq;
   		self::$inventoryDataStore->updateByAttributesWithBindParams($colVal,$where);
   	}
   	
   	public function findAll(){
   		$inventories = self::$inventoryDataStore->findAll();
   		return $inventories;
   	}
   	
   	public function findAllArr($isApplyFilter = false){
   		$inventoriesArr = self::$inventoryDataStore->findAllArr($isApplyFilter);
   		return $inventoriesArr;
   	}
   	
   	public function getInventoryForGrid($isApplyFilter = false){
   		$inventories = $this->findAllArr($isApplyFilter);
   		$InArr = array();
   		foreach ($inventories as $inventory){
   			$arr = $inventory;
   			$arr["facing"]  = FacingType::getValue($inventory["facing"]);
   			$arr["propertytype"]  = PropertyType::getValue($inventory["propertytype"]);
   			array_push($InArr, $arr);
   		}
   		$mainArr["Rows"] = $InArr;
   		$mainArr["TotalRows"] = $this->getAllInventoryCount($isApplyFilter);
   		return $mainArr;
   	}
   	
   	public function getAllInventoryCount($isApplyFilter){
   		$count = self::$inventoryDataStore->executeCountQuery(null,$isApplyFilter);
   		return $count;
   	}
   	
   	
   	
   	

}


?>
