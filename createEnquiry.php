<?php
require_once ($ConstantsArray ['dbServerUrl'] . "Utils/DropdownUtil.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Managers/EnquiryMgr.php");
$enquery = new Enquiry();
$isFullfilled = "";
$isRental = "";
$id = null;
if(isset($_POST["id"])){
	$id = $_POST["id"];
	$enqueryMgr = EnquiryMgr::getInstance();
	$enquery = $enqueryMgr->findBySeq($id);
	$path = "images/propertyImages/".$id ."_thumb."."JPG";
	if (file_exists($path)){
		$imagePath = $path;
	}
	if(!empty($enquery->getIsFullfilled())){
		$isFullfilled = "checked"; 
	}
	if(!empty($enquery->getIsRental())){
		$isRental = "checked";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Enquiry</title>
	<?include "ScriptsInclude.php"?>
</head>

<body>

    <div id="wrapper">
        <?php include("menuInclude.php")?>     
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        </div>
         <div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>
							Create New Enquiry
						</h5>
					</div>
					<div class="ibox-content mainDiv">
						<form method="post" action="Actions/EnquiryAction.php" id="enquiryForm" class="form-horizontal">
							<input type="hidden" name="call" value="saveEnquiry">
							<input type="hidden" name="seq" value="<?php echo $enquery->getSeq()?>" >
							<div class="form-group">
								<label class="col-sm-1 control-label">Type</label>
								<div class="col-sm-5">
									<?php echo DropDownUtils::getPropertyTypeDD("propertytype", "", $enquery->getPropertyType())?>
								</div>
								<label class="col-sm-1 control-label">Purpose</label>
								<div class="col-sm-5">
									<?php echo DropDownUtils::getPurposeTypeDD("purpose", "", $enquery->getPurpose())?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Address</label>
								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" id="address" name="address"><?php echo $enquery->getAddress()?></textarea>
								</div>
								<label class="col-sm-1 control-label">Landmark</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" value="<?php echo $enquery->getLandmark()?>" id="landmark" name="landmark">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-1 control-label">Area</label>
								<div class="col-sm-1">
									<input class="form-control" type="text" value="<?php echo $enquery->getPropertyArea()?>" id="propertyArea" name="propertyarea">
								</div>
								<label class="col-sm-1 control-label">Unit</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value="<?php echo $enquery->getPropertyUnit()?>" id="propertyUnit" name="propertyunit">
								</div>
								<label class="col-sm-1 control-label">Dimensions</label>
								<div class="col-sm-1">
									<input class="form-control" type="text" id="landmark" value="<?php echo $enquery->getDimensionLength()?>" name="dimensionlength" placeholder="Length">
								</div>
								<div class="col-sm-1">
									<input class="form-control" type="text" id="landmark" value="<?php echo $enquery->getDimensionBreadth()?>" name="dimensionbreadth"  placeholder="Breadth">
								</div>
								<label class="col-sm-1 control-label">Facing</label>
								<div class="col-sm-3">
									<?php echo DropDownUtils::getFacingTypeDD("facing", "", $enquery->getFacing())?>
								</div>
								
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Referred</label>
								<div class="col-sm-3">
									<input class="form-control" type="text" value="<?php echo $enquery->getReferredby()?>" id="referred" name="referredby">
								</div>
								<label class="col-sm-1 control-label">Name</label>
								<div class="col-sm-3">
									<input class="form-control" type="text" value="<?php echo $enquery->getContactPerson()?>" id="contactPerson" name="contactperson">
								</div>
								<label class="col-sm-1 control-label">Mobile</label>
								<div class="col-sm-3">
									<input class="form-control" type="text" value="<?php echo $enquery->getContactMobile()?>" id="contactMobile" name="contactmobile">
								</div>
								
								
							</div>
							
							<div class="form-group">
								<label class="col-sm-1 control-label">Address</label>
									<div class="col-sm-5">
										<textarea rows="3" cols="4" class="form-control" name="contactaddress"><?php echo $enquery->getContactAddress()?></textarea>
									</div>
								
							</div>
							<div class="form-group i-checks">
								<label class="col-sm-1 control-label">Amount</label>
									<div class="col-sm-2">
										<input class="form-control" type="text" value="<?php echo $enquery->getExpectedAmount()?>" id="expectedAmount" name="expectedamount">
									</div>
								<label class="col-sm-1 control-label"></label> 
									<label class="col-sm-2 control-label" style="text-align: left">
										<input type="checkbox" name="isrental" <?php echo $isRental?> id="isrental">
										Rental
									</label> 
									<label class="col-sm-2 control-label">
										<input type="checkbox"	name="isfullfilled" <?php echo $isFullfilled?> id="isfullfilled"> 
										Fullfill
									</label>
									
							</div>
							<div class="form-group specifications">
								<label class="col-sm-2 control-label">Specifications</label>

								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" style="height:50px !important" name="specifications" ><?php echo $enquery->getSpecifications()?></textarea>

								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-9">
									<button class="btn btn-primary ladda-button"
										data-style="expand-right" id="saveBtn" type="button">
										<span class="ladda-label">Save</span>
									</button>
									<?php if($id == 0){?>
										<span id="saveNewBtnDiv"><button
												class="btn btn-primary ladda-button"
												data-style="expand-right" id="saveNewBtn" type="button">
												<span class="ladda-label">Save & New</span>
											</button></span>
									<?php }?>
									<button type="button" class="btn btn-white" id="cancelBtn"
										data-dismiss="modal">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
        </div>
        </div>
        
</body>

</html>
<script type="text/javascript">
$(document).ready(function () {
	    $('.i-checks').iCheck({
	        checkboxClass: 'icheckbox_square-green',
	        radioClass: 'iradio_square-green',
	    });
    	$("#saveBtn").click(function(e){
    	    var btn = this;
    	    ValidateAndSave(e,btn);
    	});
    	<?php if($id == 0){?>
	    	$("#saveNewBtn").click(function(e){
	    	    var btn = this;
	    	    ValidateAndSave(e,btn);
	    	});
    	<?php }?>
        $("#cancelBtn").click(function(e){
        	location.href = ("showEnquiries.php");          
		});
});
$('#enquiryForm').jqxValidator({
	hintType: 'label',
	animationDuration: 0,
	rules: [
	{ input: '#address', message: 'Address is required!', action: 'keyup, blur', rule: 'required' },
	{ input: '#contactPerson', message: 'Name is required!', action: 'keyup, blur', rule: 'required' },
	{ input: '#contactMobile', message: 'Mobile is required!', action: 'keyup, blur', rule: 'required' }
	]
});

function submit(e,btn){
    e.preventDefault();
    var l = Ladda.create(btn);
    l.start();    
    $('#enquiryForm').ajaxSubmit(function( data ){
        l.stop();
        showResponseToastr(data,null,"enquiryForm","mainDiv");
        btnId = btn.id
        if(btnId == "saveBtn"){
 		   location.href = "showEnquiries.php";
 	   }
    })
}
function ValidateAndSave(e,btn){
    var validationResult = function (isValid){
       if (isValid) {
    	   submit(e,btn);   
        }
    }
   $('#enquiryForm').jqxValidator('validate', validationResult);
}       
</script>