<?php
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Enquiry.php");
require_once($ConstantsArray['dbServerUrl'] ."DataStores/BeanDataStore.php");
require_once($ConstantsArray['dbServerUrl'] ."Enums/FacingType.php");
require_once($ConstantsArray['dbServerUrl'] ."Enums/PropertyType.php");
class EnquiryMgr{

	private static $enquiryMgr;
	private static $enquiryDataStore;
	public static function getInstance()
	{
		if (!self::$enquiryMgr)
		{
			self::$enquiryMgr = new EnquiryMgr();
			self::$enquiryDataStore = new BeanDataStore(Enquiry::$className,Enquiry::$tableName);
		}
		return self::$enquiryMgr;
	}

	public function saveEnquiry($enquiryObj){
		$id = self::$enquiryDataStore->save($enquiryObj);
		return $id;
	}

	public function findBySeq($seq){
		$enquiryObj = self::$enquiryDataStore->findBySeq($seq);
		return $enquiryObj;
	}

	public function findArrayBySeq($seq){
		$inventoryArr = self::$enquiryDataStore->findArrayBySeq($seq);
		return $inventoryArr;
	}

	public function deleteBySeq($seqs){
		$flag = self::$enquiryDataStore->deleteInList($seqs);
		return $flag;
	}

	public function findAll(){
		$inventories = self::$enquiryDataStore->findAll();
		return $inventories;
	}

	public function findAllArr($isApplyFilter = false){
	    $inventoriesArr = self::$enquiryDataStore->findAllArr($isApplyFilter);
		return $inventoriesArr;
	}

	public function getEnqueryForGrid($isApplyFilter = false){
		$enquiries = $this->findAllArr($isApplyFilter);
		$InArr = array();
		foreach ($enquiries as $enquiry){
			$arr = $enquiry;
			$arr["facing"]  = FacingType::getValue($enquiry["facing"]);
			$arr["propertytype"]  = PropertyType::getValue($enquiry["propertytype"]);
			array_push($InArr, $arr);
		}
		$mainArr["Rows"] = $InArr;
		$mainArr["TotalRows"] = $this->getAllEnqueryCount($isApplyFilter);
		return $mainArr;
	}

	public function getAllEnqueryCount($isApplyFilter){
		$count = self::$enquiryDataStore->executeCountQuery(null,$isApplyFilter);
		return $count;
	}





}


?>
