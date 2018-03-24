<?php
require_once ($ConstantsArray ['dbServerUrl'] . "Utils/DropdownUtil.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Managers/EnquiryMgr.php");
$enquiry = new Enquiry();
$isFullfilled = "No";
$isRental = "No";
$id = null;

if(isset($_POST["seq"])){
	$id = $_POST["seq"];
	$enquiryMgr = EnquiryMgr::getInstance();
	$enquiry = $enquiryMgr->findBySeq($id);
	if(!empty($enquiry->getIsFullfilled())){
		$isFullfilled = "Yes";
	}
	if(!empty($enquiry->getIsRental())){
		$isRental = "Yes";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA | Basic Form</title>
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
							Create New Property Inventory
						</h5>
					</div>
					<div class="ibox-content mainDiv">
						<form method="post" action="Actions/InventoryAction.php" id="inventoryForm" class="form-horizontal">
							<input type="hidden" name="call" value="saveInventory">
							<div class="form-group">
								<label class="col-sm-2">Type : </label>
								<div class="col-sm-2">
									<?php $propertyType = PropertyType::getValue($enquiry->getPropertyType());
									echo $propertyType?>
								</div>
								
							</div>
							<div class="form-group">
								<label class="col-sm-2 ">Purpose : </label>
								<div class="col-sm-2">
									<?php $purpose = PurposeType::getValue($enquiry->getPurpose()) ;
									echo $purpose?>
								</div>
								<label class="col-sm-2">Address: </label>
								<div class="col-sm-4">
									<?php echo $enquiry->getAddress()?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2">Landmark : </label>
								<div class="col-sm-2">
									<?php echo $enquiry->getLandmark()?>
								</div>
								<label class="col-sm-1">Area : </label>
								<div class="col-sm-1">
									<?php echo $enquiry->getPropertyArea() . " " . $enquiry->getPropertyUnit()?>
								</div>
								<label class="col-sm-1 ">Length : </label>
								<div class="col-sm-1">
									<?php echo $enquiry->getDimensionLength()?>
								</div>
								<label class="col-sm-2 ">Breadth : </label>
								<div class="col-sm-1">
									<?php echo $enquiry->getDimensionBreadth()?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Facing : </label>
								<div class="col-sm-2">
									<?php $facing = FacingType::getValue($enquiry->getFacing());
									echo $facing?>
								</div>
								<label class="col-sm-2">Referred By : </label>
								<div class="col-sm-2">
									<?php echo $enquiry->getReferredby()?>
								</div>
								<label class="col-sm-2">Name : </label>
								<div class="col-sm-2">
									<?php echo $enquiry->getContactPerson()?>
								</div>
							</div>
							<div class="form-group">
								
								<label class="col-sm-2">Mobile : </label>
								<div class="col-sm-2">
									<?php echo $enquiry->getContactMobile()?>
								</div>
								
								<label class="col-sm-2">Address : </label>
								<div class="col-sm-5">
									<?php echo $enquiry->getContactAddress()?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2">Amount : </label>
								<div class="col-sm-2">
									<?php echo $enquiry->getExpectedAmount()?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Rental : </label>
								<div class="col-sm-2">
									<?php echo $isRental?>
								</div>
								<label class="col-sm-2">Fullfilled : </label>
								<div class="col-sm-2">
									<?php echo $isFullfilled?>
								</div>
							</div>
							<div class="form-group furnishing" style="display:none">
								<label class="col-sm-2">Furnishing : </label>
								<div class="col-sm-2">
									<?php $furnishing = FurnishingType::getValue($enquiry->getFurnishing()) ;
									echo $furnishing?>
								</div>
								<label class="col-sm-2">Details : </label>
								<div class="col-sm-5">
									<?php echo $enquiry->getFurnishingDetails()?>
								</div>
							</div>
							
							<div class="form-group specifications">
								<label class="col-sm-2">Specifications</label>
								<div class="col-sm-2">
									<?php echo $enquiry->getSpecifications()?>
								</div>
								<label class="col-sm-1 control-label">Image</label>
								<div class="col-sm-4">
									<input type="file" id="inventoryImage" name="inventoryImage"
										class="form-control hidden" /> <label for="inventoryImage"><a><img
											alt="image" id="inventoryImg" class="img" width="300px;"
											src="<?echo $imagePath."?".time() ?>"></a></label> <label
										class="jqx-validator-error-label" id="imageError"></label>
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