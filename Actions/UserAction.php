<?php
 require_once('../IConstants.inc');
 require_once($ConstantsArray['dbServerUrl'] ."Managers/UserMgr.php");
 require_once($ConstantsArray['dbServerUrl'] ."Managers/AdminMgr.php");
 require_once($ConstantsArray['dbServerUrl'] ."Managers/CertificateMgr.php");
 require_once($ConstantsArray['dbServerUrl'] ."Managers/ImageMgr.php");
 require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/User.php");
 require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Certificate.php");
 require_once($ConstantsArray['dbServerUrl'] ."Managers/LearningProfileMgr.php");
 require_once($ConstantsArray['dbServerUrl'] ."Managers/CustomFieldMgr.php");
 require_once($ConstantsArray['dbServerUrl'] ."Utils/ImageUtil.php");
 require_once($ConstantsArray['dbServerUrl'] ."Utils/CustomFieldsFormGenerator.php");
 require_once($ConstantsArray['dbServerUrl'] ."Utils/SecurityUtil.php");
 require_once($ConstantsArray['dbServerUrl'] ."Utils/FileUtil.php");
 require_once($ConstantsArray['dbServerUrl'] ."Utils/MailerUtils.php"); 
 require_once($ConstantsArray['dbServerUrl'] ."Managers/LearningPlanMgr.php");
 require_once($ConstantsArray['dbServerUrl'] ."StringConstants.php");
 require_once($ConstantsArray['dbServerUrl'] ."Managers/CustomFieldValueMgr.php");
 require_once($ConstantsArray['dbServerUrl'] ."Enums/EntityType.php");
 require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Assessor.php");
 require_once($ConstantsArray['dbServerUrl'] ."Managers/AssessorMgr.php");
 require_once($ConstantsArray['dbServerUrl'] ."Enums/CertificateStatus.php");
 require_once($ConstantsArray['dbServerUrl'] ."Managers/UserLogMgr.php");
 require_once($ConstantsArray['dbServerUrl'] ."Enums/LogType.php");
 require_once($ConstantsArray['dbServerUrl'] ."Managers/UserLogMgr.php");
 
 

  $call = "";
   if(isset($_POST["call"])){
        $call = $_POST["call"];
    }else{
        $call = $_GET["call"];
   }
   $success = 1;
   $message = "";
   $sessionUtil = SessionUtil::getInstance();
   $userSeq = $sessionUtil->getUserLoggedInSeq();
   $companySeq = null;
   if(!empty($userSeq)){
   		$companySeq = $sessionUtil->getUserLoggedInCompanySeq();
   }
   $customFieldsFormGenerator = CustomFieldsFormGenerator::getInstance();
  if($call == "updateProfilePicture"){
        try{
            $img = $_POST['imgSrc'];
            $orgImg = $_POST['imgSrcOrg'];
            $path = $ConstantsArray['UserImagePath'];
            $imageName = ImageUtil::uploadImage($path,$img,$orgImg,$userSeq);
            $userMgr = UserMgr::getInstance();
            $userMgr->updateUserProfilePic($userSeq, $imageName);
            $message = "Profile Picture Updated Successfully";
            UserLogMgr::addLog(LogType::update_profile_pic);
        }catch (Exception $e){
            $success = 0;
            $message  = $e->getMessage();
        }
        $response = new ArrayObject();
        $response["success"]  = $success;
        $response["message"]  = $message;
        $response["imagepath"] = "images/UserImages/$userSeq.png";
        echo json_encode($response);
        
    }
    
    if($call == "loginAsManager"){
    	$learnerManagerSeq = $sessionUtil->getUserLoggedInManagerSeq();
    	$adminManager = AdminMgr::getInstance();
    	$flag = $adminManager->loginLearnerAsManager($learnerManagerSeq);
    	$location = $ConstantsArray["ApplicationURL"] . "/UserDashboard.php";
    	if($flag){
    		$location = $ConstantsArray["ApplicationURL"] . "/adminDashboard.php";
    	}
    	header("Location: ". $location); /* Redirect browser */
    	exit();
    }
    
    if(isset($_GET['call']) && $_GET['call'] == "takeSnapeShot"){
        try{
            $img = $_FILES['webcam']['tmp_name'];
            $moduleSeq = $_GET["moduleSeq"];
            $lpSeq = $_GET["lpSeq"];
            $bytes = file_get_contents($img);
            $bytes = base64_encode($bytes);
            $activity = new Activity();
            $activity->setUserSeq($userSeq);
            $activity->setDateOfPlay(new DateTime());
            $activity->setIsCompleted(0);
            $activity->setProgress(0);
            $activity->setUserImage($bytes);
            $activity->setLearningPlanSeq($lpSeq);
            $activity->setModuleSeq($moduleSeq);
            $activityMgr = ActivityMgr::getInstance();
            $activityMgr->saveActivity($activity);            
        }catch (Exception $e){
            $success = 0;
            $message  = $e->getMessage();
        }
        $response = new ArrayObject();
        $response["success"]  = $success;
        $response["message"]  = $message;
        echo json_encode($response);
    } 
    
    
     if($call == "forgotPassword"){
        $UDS = UserDataStore::getInstance();
        try{
            $username = $_POST['username'];
            if(!empty($username)){     
                $user = $UDS->findByUserName($username);
                if(!empty($user)){
                    $mailMessage = new MailMessage();
                    $mailMessage->setSubject("Ezae - Retreive Password");
                    $mailMessage->setMessage("Hello,<br/><br/>Password for UserName  " . $username . " is ". $user->getPassword()."<br/><br/>Ezae Team.");
                    MailMessageUtil::sendforgotPasswordEmail($mailMessage,$user);        
                }else{
                    throw new Exception("User Name is not exist");
                }
            }           
            $message = "your password emailed to your email account";
        }catch (Exception $e){
            $success = 0;
            $message  = $e->getMessage();
        }
        $response = new ArrayObject();
        $response["success"]  = $success;
        $response["message"]  = $message;
        echo json_encode($response);
    }
    if($call == "changePassword"){
        $password = $_POST["newPassword"];
        $earlierPassword = $_POST["earlierPassword"];
        try{

            $userMgr = UserMgr::getInstance();
            $isPasswordExists = $userMgr->isPasswordExist($earlierPassword);
            if($isPasswordExists){
                 $userMgr->ChangePassword($password);
                 $message = "Password Updated Successfully";
                 UserLogMgr::addLog(LogType::change_password);
            }else{
                $message = "Incorrect Current Password!";
                $success =0;
            }
        }catch(Exception $e){
            $success = 0;
            $message  = $e->getMessage();
        }
        $response = new ArrayObject();
        $response["success"]  = $success;
        $response["message"]  = $message;
        echo json_encode($response);
    }
    if($call == "loginUser"){
      $username = $_POST["username"];
      $password = $_POST["password"];
      $userMgr = UserMgr::getInstance();
      try{
          $user = $userMgr->logInUser($username,$password);
          if($user != null){
              $sessionUtil->createUserSession($user);
              UserLogMgr::addLog(LogType::login);
          }else{
              $success = 0;
              $message = "Incorrect Username or Password";
          }
      }catch(Exception $e){
           $success = 0;
           $message  = $e->getMessage();
      }
      $res = new ArrayObject();
      $res["success"]  = $success;
      $res["message"]  = $message;
      echo json_encode($res);
      return;
    }
    
    if($call == "refreshSession"){
    	$flag = $sessionUtil->refreshSession();
    	if($flag){
    		echo 1;
    	}
    	echo 0;
    }
    
    if($call == "getUserFieldForm"){
      $sessionUtil = SessionUtil::getInstance();
      $userSeq = $sessionUtil->getUserLoggedInSeq();
      $html = $customFieldsFormGenerator->getFormHtmlForUser($userSeq);
      echo $html;

  }

  if($call == "signup"){
    $post = $_POST;
    unset($post["call"]);
    $adminSeq = SecurityUtil::Decode($post["aid"]);
    $companySeq = SecurityUtil::Decode($post["cid"]);
    if(isset($_POST["lpfId"])){
        $lpfSeq = SecurityUtil::Decode($post["lpfId"]);
        unset($post["lpfId"]);    
    }
    unset($post["aid"]);
    unset($post["cid"]);
    try{
    	//$userCustomFields = $customFieldsFormGenerator->getCustomfieldsFromArr($post);
        $matchingRuleMgr = MatchingRuleMgr::getInstance();
        $learningProfileMgr = LearningProfileMgr::getInstance(); 
        $matchingRule = $matchingRuleMgr->getRequiredMatchingRules($adminSeq,$companySeq);
        $user = new user();
        $userNameFieldName = StringConstants::DEFAULT_USERNAME_FIELDNAME;
        $PasswordFieldName = StringConstants::DEFAULT_PASSWORD_FIELDNAME;
        $emailFieldName = StringConstants::DEFAULT_EMAIL_FIELDNAME;
        $nameFieldName  = StringConstants::DEFAULT_NAME_FIELDNAME;
        if(isset($post[$matchingRule["usernamefield"]])){
            $userNameFieldName = $matchingRule["usernamefield"];
        }
        if(isset($post[$matchingRule["passwordfield"]])){
            $PasswordFieldName = $matchingRule["passwordfield"];
        }
        if(isset($post[$matchingRule["emailfield"]])){
            $emailFieldName = $matchingRule["emailfield"];
        }
        if(isset($post[$matchingRule["namefield"]])){
        	$nameFieldName = $matchingRule["namefield"];
        }
        $username = $post[$userNameFieldName];
        if(is_array($username)){
        	$username = $username[1];
        }
        $password = $post[$PasswordFieldName];
        if(is_array($password)){
        	$password = $password[1];
        }
        $email = $post[$emailFieldName];
        if(is_array($email)){
        	$email = $email[1];
        }
        $name = $post[$nameFieldName];
        if(is_array($name)){
        	$name = $name[1];
        }
        $user->setUserName($username);
        $user->setPassword($password);
        $user->setEmailId($email);
        $user->setName($name);
        $user->setLastModifiedOn(new DateTime());
        //$user->setCustomFieldValues($userCustomFields);
        $user->setCreatedOn(new DateTime());
        $user->setAdminSeq($adminSeq);
        $user->setCompanySeq($companySeq);
        $user->setSeq(0);
        $user->setIsEnabled(true);
        $userMgr = UserMgr::getInstance();
        $userMgr->Save($user);
        $customFieldValueMgr = CustomFieldValueMgr::getInstance(EntityType::USER);
        $customFieldValueMgr->saveFieldValue($post, $user->getSeq());
        if(!empty($_FILES)){
        	$uploaddir = $ConstantsArray["UserImagePath"];
        	$imageFields = array();
        	$imageMgr = ImageMgr::getInstance();
        	foreach($_FILES as $fieldName=>$file){    
        		$imageFieldSeq = $post[$fieldName];
        		$imageSeq = $imageMgr->save($file, $user->getSeq());
        		$filename = $file["name"][0];
        		$imageType = pathinfo($filename, PATHINFO_EXTENSION);
        		$filename = $imageSeq .".". $imageType;
        		$imgfilePath = FileUtil::uploadImageFiles($file,$uploaddir,$filename);
        		$imageFieldSeq[1] = $imageSeq;
        	    $imageFields[$fieldName] = $imageFieldSeq;
        	}
        	$customFieldArr = array_merge($post, $imageFields);        	   
        	$customFieldValueMgr->saveFieldValue($customFieldArr, $user->getSeq());
        	//$userCustomFields = $customFieldsFormGenerator->getCustomfieldsWithImageSeqFromArr($post,$imageFields);
        	//$userMgr->updateCustomFields($user->getSeq(),$userCustomFields);
        }
        if(!empty($lpfSeq)){
            $userLearningProfile = new UserLearningProfile();
            $userLearningProfile->setAdminSeq($adminSeq);
            $userLearningProfile->setTagSeq($lpfSeq);
            $userLearningProfile->setUserSeq($user->getSeq());
            $learningProfileMgr->setProfileOnLearner($userLearningProfile);    
        }
        $sessionUtil->createUserSession($user);
        UserLogMgr::addLog(LogType::login);
        MailerUtils::sendUserSignUpNotification($user);
        $message = "Sign up Successfully";
    }catch(Exception $e){    	
          $success = 0;
          $message  = $e->getMessage();
          $trace = $e->getTrace();
          if($trace[0]["args"][0][1] == "1062"){
          	 $message = "User with name '" . $username ."' is already exists";
          }
    }
     $res = new ArrayObject();
     $res["success"]  = $success;
     $res["message"]  = $message;
     echo json_encode($res);

  }
  
    if($call == "isUserNameExist"){
        $userMgr = UserMgr::getInstance();
        $username = $_GET["username"];
        $flag = $userMgr->isUserNameAlreadyExist($username);
        $res = new ArrayObject();
        $res["isExist"]  = $flag ? 1 :0;
        echo json_encode($res);
        return;
    }
     //used to display learningplans in user's training page learningplans dropdown
    if($call == "getLearningPlansForUser"){
        $learningPlanMgr = LearningPlanMgr::getInstance();
        $learningPlans = $learningPlanMgr->getLearningPlansForUser($userSeq);
        echo json_encode($learningPlans);
    }
    //used to display modules in user training grid
    if($call == "getModulesForUserTrainingGrid"){
        try{
            $moduleMgr = ModuleMgr::getInstance();
            $learningPlanSeq = $_GET["learningPlanSeq"];
            $data = $moduleMgr->getModulesForUserTrainingGrid($userSeq,$learningPlanSeq);
        }catch(Exception $e){
            $success = 0;
            $message  = $e->getMessage();
        }
        echo $data;
    }
    
  if($call == "submitContactForm"){   
    try{
          $bool = MailerUtils::sendContactEmail($_POST);
          if($bool){
              $message =  "Your ticket has been successfully submitted. We will get back to you shortly";
          }else{
              $success = 0;
              $message = "Error During Submit Contact Us";
          }
    }catch(Exception $e){
          $success = 0;
          $message  = $e->getMessage();
    }
     $res = new ArrayObject();
     $res["success"]  = $success;
     $res["message"]  = $message;
     echo json_encode($res);
  }
  if($call == "downloadCertificate"){ 
    $moduleName = $_POST["moduleName"];
    $dateOfPlay = $_POST["dateOfPlay"];  
    $userMgr = UserMgr::getInstance();
    $userMgr->downloadCertificate($moduleName,$dateOfPlay);     
  }
  
  if($call == "getUsersByCompany"){
  	try{
  		$seqs = $_GET["seqs"];
	  	$userManager = UserMgr::getInstance();
	  	$users = $userManager->getUsersForDropDown($seqs);
	  	echo json_encode($users);	
  	}catch (Exception $e){
  		$msg = $e->getMessage();
  	}
  	
  }
  
  if($call == "createCertificate"){
  	try{
  		$userManager = UserMgr::getInstance();
  		$sessionUtil = SessionUtil::getInstance();
  		$userSeq = $sessionUtil->getUserLoggedInSeq();
  		$name = $_POST["name"];
  		$seq  = 0;
  		if(isset($_POST["seq"])){
  			$seq = $_POST["seq"];
  		}
  		unset($_POST["name"]);
  		$imageSeq = 0;
  		$certificateMgr = CertificateMgr::getInstance();
  		if(!empty($seq) && !isset($_FILES["certfile"])){
  			$exitingCert = $certificateMgr->findBySeq($seq);
  			$imageSeq = $exitingCert->getUserResourceSeq();
  		}else{
  			$imageMgr = ImageMgr::getInstance();
  			$file = $_FILES["certfile"];
  			$imageSeq = $imageMgr->save($file, $userSeq);
  			$uploaddir = $ConstantsArray["UserCertificatePath"];
  			$filename = $file["name"];
  			$imageType = pathinfo($filename, PATHINFO_EXTENSION);
  			$filename = $imageSeq .".". $imageType;
  			$imgfilePath = FileUtil::uploadImageFiles($file,$uploaddir,$filename);
  		}
  		
        ///$customFieldsValues = $customFieldsFormGenerator->getCustomfieldsFromArr($_POST);
  		$certificate = new Certificate();
  		$certificate->setSeq($seq);  		
  		$certificate->setCompanySeq($companySeq);
  		//$certificate->setIsApproved(0);
  		$certificate->setName($name);
  		//$certificate->setCustomFieldValues($customFieldsValues);
  		$certificate->setUploadedOn(new DateTime());
  		$certificate->setUserResourceSeq($imageSeq);  		
  		$certificate->setUserSeq($userSeq);  		
  		$id = $certificateMgr->save($certificate);
  		$certificate->setSeq($id);
  		$customFieldValueMgr = CustomFieldValueMgr::getInstance();
  		unset($_POST["seq"]);
  		unset($_POST["call"]);
  		$customFieldValueMgr->save($_POST, $id);
  		MailerUtils::sendCertificateUploaded($certificate, $userSeq);
  		$message = "Certificate Uploaded Successfully";
  	}catch (Exception $e){
  		 $success = 0;
         $message  = $e->getMessage();
  	}
  	$res = new ArrayObject();
  	$res["success"]  = $success;
  	$res["message"]  = $message;
  	echo json_encode($res);
  }
  
  if($call == "getCertificates"){
  	$certificateMgr = CertificateMgr::getInstance();
  	$json = $certificateMgr->getCertificateJson();
  	echo $json;
  }
  
  if($call == "searchUser"){
  	$searchString = $_GET["q"];
  	$userManager = UserMgr::getInstance();
  	$users  = $userManager->searchUsers($searchString);
  	$response['results'] = array();
  	foreach($users as $user){
  		$text = $user['name'];
  		if($text == null){
  			$text = $user['username'];
  		}
  		$json = array();
  		$json['text'] = $text;
  		$json['id'] = $user['seq'];
  		array_push($response['results'],$json);
  	}
  	echo json_encode($response);
  }  
  
  if($call == "registerAssessor"){
  	try{
  		$assessorMgr = AssessorMgr::getInstance();
  		$emails = $_POST["email"];
  		$mobiles = $_POST["mobile"];
  		$seqs = $_POST["seq"];
  		$assessorSeqs = $_POST["assessorSeq"];
  		$status = $_POST["status"];
  		$i = 0;
  		foreach($emails as $email){
  			$assessor = new Assessor();  			
  			$assessor->setLastModifiedOn(new DateTime());
  			$assessor->setCreatedOn(new DateTime());
  			$assessor->setCompanySeq($companySeq);
  			$assessor->setEmail($email);
  			$assessor->setMobile($mobiles[$i]);   	
  			$assessor->setStatus(CertificateStatus::pending);
  			$assessor->setCampaignAssessorSeq($assessorSeqs[$i]);
  			if(!empty($status[$i])){  			
  				$assessor->setStatus($status[$i]);
  			}
  			$assessor->setUserSeq($userSeq);
  			$seq = 0;
  			if(!empty($seqs)){
  				$seq = $seqs[$i];
  			}
  			$assessor->setSeq($seq);
  			$assessorMgr->save($assessor);
  			$i++;
  		}
  		$message = "Assessor Registered Successfully";
  	}catch (Exception $e){
  		 $success = 0;
         $message  = $e->getMessage();
  	}	
  	$res = new ArrayObject();
  	$res["success"]  = $success;
  	$res["message"]  = $message;
  	echo json_encode($res);
  }
  
   if($call == "getCampaigns360LearnerByCampaign") {
   	    $campaignSeq = $_GET["campaignSeq"];
	   	try{
	   		$userMgr = UserMgr::getInstance();
	   		$json = $userMgr->get360LearnersJSON($campaignSeq);
	   		echo $json;
	   	}catch(Exception $e){
	   		$success = 0;
	   		$message  = $e->getMessage();
	   	}
   }
   
   if($call == "getAllUserLogsByCompanyForGrid") {
   
   	try{
   		$userLogMgr = UserLogMgr::getInstance();
   		$logs = $userLogMgr->getAllUserLogsByCompanyForGrid();
   		echo json_encode($logs);
   	}catch(Exception $e){
   		$success = 0;
   		$message  = $e->getMessage();
   	}
   }
   
   if($call == "getUserLogsforDashboard") {
	   	try{
	   		$userLogMgr = UserLogMgr::getInstance();
	   		$logs = $userLogMgr->getUserLogsforDashboard();
	   		echo json_encode($logs);
	   	}catch(Exception $e){
	   		$success = 0;
	   		$message  = $e->getMessage();
	   	}
   }
   
   
   

   
?>
