<?php
 require_once("BeanDataStore.php.php5");
 require_once($ConstantsArray['dbServerUrl']. "BusinessObjects/Admin.php");

 class AdminDataStore extends BeanDataStore.php{
    private static $adminDataStore;

    public static function getInstance()
    {
        if (!self::$adminDataStore)
        {
            self::$adminDataStore = new AdminDataStore("Admin",Admin::$tableName);
                return self::$adminDataStore;
        }
        return self::$adminDataStore;
    }

    public function findByUserName($userName){
        $colValuePair = array();
        $colValuePair["username"] = $userName;
        $userList = self::executeConditionQuery($colValuePair);
        if(sizeof($userList) > 0){
            return $userList[0];
        }
        return null;
    }

    public function findByCompany($companySeq){
        $colValuePair = array();
        /*'companyseq' is columnName*/ $colValuePair["companyseq"] = $companySeq;
        $userList = $this->executeConditionQuery($colValuePair);
        if(sizeof($userList) > 0){
            return $userList[0];
        }
        return null;
    }

    public function ChangePassword($password,$adminSeq){
        $query = "update admins set password  = '$password' where seq = $adminSeq ";
        $this->executeQuery($query);   
    }
    
    public function updateHeaderText($headerText,$adminSeq){
        $colVal["signupformheader"] = $headerText;
        $condition["seq"] = $adminSeq;
        //$query = mysql_escape_string($query);
        $this->updateByAttributesWithBindParams($colVal,$condition);
    }




 }
?>
