<?php
    require_once('IConstants.inc');
    require_once($ConstantsArray['dbServerUrl'] ."Utils/SessionUtil.php5");
    require_once($ConstantsArray['dbServerUrl'] ."Managers/UserLogMgr.php");
    require_once($ConstantsArray['dbServerUrl'] ."Enums/LogType.php");    
    require_once($ConstantsArray['dbServerUrl'] ."Enums/RoleType.php");
    $sessionUtil = SessionUtil::getInstance();
    $role = $sessionUtil->getLoggedInRole();
    if($role == RoleType::USER){
    	UserLogMgr::addLog(LogType::logout);
    }
    $sessionUtil->destroySession();
?>
