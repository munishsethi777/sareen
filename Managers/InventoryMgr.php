<?php
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Inventory.php");
require_once($ConstantsArray['dbServerUrl'] ."DataStores/BeanDataStore.php");
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
    	return $flag;
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
   	
   	

}


?>
