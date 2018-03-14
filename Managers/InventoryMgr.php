<?php
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Inventory.php");
require_once($ConstantsArray['dbServerUrl'] ."DataStores/CompanyDataStore.php");
require_once($ConstantsArray['dbServerUrl'] ."Utils/SessionUtil.php5");
require_once($ConstantsArray['dbServerUrl'] ."Utils/SecurityUtil.php");
require_once($ConstantsArray['dbServerUrl'] ."Utils/FileUtil.php");
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/CompanyModule.php");
require_once($ConstantsArray['dbServerUrl']. "Managers/AdminCompanyMgr.php");

class InventoryMgr{

    private static $companyMgr;
    private static $companyModuleDataStore;
    public static function getInstance()
    {
        if (!self::$companyMgr)
        {
            self::$companyMgr = new InventoryMgr();
            self::$companyModuleDataStore = new BeanDataStore(CompanyModule::$className,CompanyModule::$tableName); 
        }
        return self::$companyMgr;
    }
    public function SignUpCompany($constantsArray = null){
    	$CDS = CompanyDataStore::getInstance();
    	$seq = 0;
        if(isset($_POST["seq"])){
        	$seq = $_POST["seq"]; 
        }
    	$name = $_POST["name"];
        $description = $_POST["description"];
        $email = $_POST["email"];
        $mobile = $_POST["mobileno"];
        $contactPerson = $_POST["contactperson"];
        $address = $_POST["address"];
        $phone =   $_POST["phone"];
        $isUpdate = "";
        $isAddCompany = "";
        if(isset($_POST["isAddCompany"])){
        	$isAddCompany = $_POST["isAddCompany"];
        }
        if(isset($_POST["isUpdate"])){
        	$isUpdate = $_POST["isUpdate"];
        }       
        $company = new Company();
        if(!empty($seq)){
        	$company = $CDS->FindBySeq($seq);
        	$company->setSeq($seq);
        }
        $company->setName($name);
        $company->setDescription($description);
        $company->setEmailId($email);
        $company->setMobileNo($mobile);
        $company->setContactPerson($contactPerson);
        $company->setAddress($address);
        $company->setPhone($phone);
        $company->setIsEnabled(true);
        $company->setCreatedOn(new DateTime());
        $sessionUtil = SessionUtil::getInstance();
        
        if($isUpdate == "true"){            
            $seq = $sessionUtil->getAdminLoggedInCompanySeq();
            $company->setSeq($seq);
        }else{
        	$loggedInCompanySeq = $sessionUtil->getAdminLoggedInCompanySeq();
        	if(!empty($loggedInCompanySeq)){
        		$loggedInCompany = $CDS->findBySeq($loggedInCompanySeq);
        		if(!empty($loggedInCompany)){
            		$permisions = $loggedInCompany->getPermisions();
            		$company->setPermisions($permisions);
        		}
        	}
        }
       
        $this->checkVaidations($company);
        if($isAddCompany != "true"){
        	$adminMgr = new AdminMgr();
        	$admin = $adminMgr->getAdminObjectFromRequest();
        	$adminMgr->checkValidations($admin);
        }
        $companySeq = $CDS->save($company);
        if($isAddCompany == "true"){
        	$adminSeq = $sessionUtil->getAdminLoggedInSeq();
        }else{
        	$adminSeq = $adminMgr->saveAdmin($admin,$companySeq);
        } 
        $adminCompanyMgr = AdminCompanyMgr::getInstance();
        $adminCompanyMgr->saveAdminCompany($adminSeq, $companySeq);
        //if($isUpdate == "true"){
        	$company->setSeq($companySeq);
        	$isUploadedImage  = false;
        	
        	if(isset($_FILES["imgfileToUpload"])){
        		$file = $_FILES["imgfileToUpload"];
        		$uploaddir = $constantsArray["CompanyImagePath"]."companylogo/";
        		$fileName = $this->uploadCompanyImage($file,$companySeq,$uploaddir); 
        		$company->setLogoImage($fileName);
        		$isUploadedImage = true;
        	}
        	if(isset($_FILES["headerImgfileToUpload"])){
        		$file = $_FILES["headerImgfileToUpload"];
        		$uploaddir = $constantsArray["CompanyImagePath"]."/companyheader/";
        		$fileName = $this->uploadCompanyImage($file,$companySeq,$uploaddir);
        		$company->setHeaderImage($fileName);
        		$isUploadedImage = true;
        	}
        	if($isUploadedImage){
        		$CDS->save($company);
        	}
       // }
    }
    
    private function uploadCompanyImage($file,$companySeq,$uploaddir){
	    	$filename = $file["name"];
	    	$imageType = pathinfo($filename, PATHINFO_EXTENSION);
	    	$filename = $companySeq .".". $imageType;
	    	$fileName = FileUtil::uploadImageFiles($file,$uploaddir,$filename);
	    	return $fileName;
    }
    
    public function getSignUpUrl($appUrl){
        $sessionUtil = SessionUtil::getInstance();
        $adminSeq = $sessionUtil->getAdminLoggedInSeq();
        $companySeq = $sessionUtil->getAdminLoggedInCompanySeq();
        $url = $appUrl;
        $url .= "/userSignup.php?aid=";
        $url .= SecurityUtil::Encode($adminSeq);
        $url .= "&cid=";
        $url .= SecurityUtil::Encode($companySeq);        
        return $url;
    }
    public function getSignUpPrideUrl($appUrl){
        $sessionUtil = SessionUtil::getInstance();
        $adminSeq = $sessionUtil->getAdminLoggedInSeq();
        $companySeq = $sessionUtil->getAdminLoggedInCompanySeq();
        $url = $appUrl;
        $url .= "/pride.php?aid=";
        $url .= SecurityUtil::Encode($adminSeq);
        $url .= "&cid=";
        $url .= SecurityUtil::Encode($companySeq);        
        return $url;
    }
    public function getSignUpGeneralUrl($appUrl){
        $sessionUtil = SessionUtil::getInstance();
        $adminSeq = $sessionUtil->getAdminLoggedInSeq();
        $companySeq = $sessionUtil->getAdminLoggedInCompanySeq();
        $url = $appUrl;
        $url .= "/general.php?aid=";
        $url .= SecurityUtil::Encode($adminSeq);
        $url .= "&cid=";
        $url .= SecurityUtil::Encode($companySeq);        
        return $url;
    }
    private function checkVaidations($company){
        if($this->isExist($company,$company->getEmailId(),"emailid")){
            throw new Exception(StringConstants::EMAIL_EXIST);
        } 
        if($this->isExist($company,$company->getMobileNo(),"mobileno")){
            throw new Exception(StringConstants::MOBILE_EXIST);
        }if($this->isExist($company,$company->getName(),"name")){
            throw new Exception(StringConstants::COMPANY_NAME);
        } 
    }
    private function isExist($company,$value,$attrName){
        $seq = $company->getSeq();
        $att[0] = $attrName;
        $att[1] = "seq";
        $colVal[$attrName] = $value;
        $CDS = CompanyDataStore::getInstance();
        $existingCompany = $CDS->executeAttributeQuery($att,$colVal);
        $isExist = false;
        if(!empty($existingCompany)){   
            if(empty($seq) || $seq != $existingCompany[0]["seq"]){
                $isExist = true;        
            }
        }
        return $isExist;
    }
   private function isAdminExist($admin,$attrName){
        $seq = $company->getSeq();
        $att[0] = $attrName;
        $att[1] = "seq";
        $colVal[$attrName] = $company->getEmailId();
        $CDS = CompanyDataStore::getInstance();
        $existingCompany = $CDS->executeAttributeQuery($att,$colVal);
        $isExist = false;
        if(!empty($existingCompany)){   
            if(empty($seq) || $seq != $existingCompany[0]["seq"]){
                $isExist = true;        
            }
        }
        return $isExist;
    }
    public function getCompanyBySeq($companySeq){
        $CDS = CompanyDataStore::getInstance();
        $company =  $CDS->FindBySeq($companySeq);
        return $company;
    }

    public function getCompanyPrefix($companySeq){
        $CDS = CompanyDataStore::getInstance();
        $prefix =  $CDS->getPrefix($companySeq);
        return $prefix;
    }

    public function updateCompanyPrefix($companySeq,$prefix){
        $CDS = CompanyDataStore::getInstance();
        $prefix =  $CDS->updateCompanyPrefix($companySeq,$prefix);
    }
    
    public function saveCompanyModule($moduleId){
        $sessionUtil = SessionUtil::getInstance();
        $adminSeq = $sessionUtil->getAdminLoggedInSeq();
        $companySeq = $sessionUtil->getAdminLoggedInCompanySeq();
        $companyModule = new CompanyModule();
        $companyModule->setAddedOn(new DateTime());
        $companyModule->setAdminSeq($adminSeq);
        $companyModule->setCompanySeq($companySeq);
        $companyModule->setModuleSeq($moduleId);
        $this->deleteCompanyModule($moduleId);       
        self::$companyModuleDataStore->save($companyModule);
    }
    public function deleteCompanyModule($moduleId){
        $sessionUtil = SessionUtil::getInstance();
        $companySeq = $sessionUtil->getAdminLoggedInCompanySeq();
        $colValues["companyseq"]  =  $companySeq;
        $colValues["moduleseq"] = $moduleId;
        self::$companyModuleDataStore->deleteByAttribute($colValues);
    }
	
    public function findAll(){
    	$CDS = CompanyDataStore::getInstance();
    	$companies = $CDS->findAll();
    	return $companies;
    }
    
    public function getLearnerProfilesAndModulesByAdmin(){
    	$profileAndModuleArr = LearningProfileMgr::getInstance()->getLearningProfileNamesByAdmin();
    	$lpArr = LearningPlanMgr::getInstance()->getLearningPlanNameByAdmin();
    	$profileAndModuleArr = array_merge($profileAndModuleArr,$lpArr);    	 
    	$moduleArr = ModuleMgr::getInstance()->getModuleNameIdByAdmin(ModuleType::QUIZ);
    	$profileAndModuleArr = array_merge($profileAndModuleArr,$moduleArr);
    	return $profileAndModuleArr;
    }
    
    public function getAllCompaniesByAdmin($isApplyFilter = false){
    	$sessionUtil = SessionUtil::getInstance();
    	$adminSeq = $sessionUtil->getAdminLoggedInSeq();
    	$sql = "select c.* from companies c inner join admincompanies ac on c.seq = ac.companyseq where ac.adminseq =  $adminSeq";
    	$CDS = CompanyDataStore::getInstance();
    	$companies = $CDS->executeQuery($sql,$isApplyFilter);
    	return $companies;
    }
    
    public function getAllCompaniesCountByAdmin(){
    	$sessionUtil = SessionUtil::getInstance();
    	$adminSeq = $sessionUtil->getAdminLoggedInSeq();
    	$sql = "select count(c.seq) from companies c inner join admincompanies ac on c.seq = ac.companyseq where ac.adminseq =  $adminSeq";
    	$CDS = CompanyDataStore::getInstance();
    	$count = $CDS->executeCountQueryWithSql($sql,true);
    }
    
    public function getAllCompaniesByAdminJSON($isApplyFilter = false){
    	$companies = $this->getAllCompaniesByAdmin($isApplyFilter);
    	$arr["Rows"] = $companies;
    	$arr["TotalRows"] = $this->getAllCompaniesCountByAdmin();
    	$json = json_encode($arr);
    	return $json;
    }
	
    public function isMobileEnabled($companySeq){
    	$CDS = CompanyDataStore::getInstance();
    	$isMobileEnabled = $CDS->isMobileEnabled($companySeq);
    	return $isMobileEnabled;
    }

}


?>
