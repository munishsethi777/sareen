<?php
require_once ($ConstantsArray ['dbServerUrl'] . "Utils/DropdownUtil.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Managers/InventoryMgr.php");
$inventory = new Inventory();
$isAvailable = "No";
$isRental = "No";
$id = null;
$imagePath = "images/dummy.jpg";
if(isset($_POST["seq"])){
	$id = $_POST["seq"];
	$inventoryMgr = InventoryMgr::getInstance();
	$inventory = $inventoryMgr->findBySeq($id);
	$path = "images/propertyImages/".$id ."_thumb."."JPG";
	if (file_exists($path)){
		$imagePath = $path;
	}
	if(!empty($inventory->getIsAvailable())){
		$isAvailable = "Yes"; 
	}
	if(!empty($inventory->getIsRental())){
		$isRental = "Yes";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Property</title>
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
									<?php $propertyType = PropertyType::getValue($inventory->getPropertyType());
									echo $propertyType?>
								</div>
								<label class="col-sm-2">Medium : </label>
									<div class="col-sm-2">
										<?php $mediumType = MediumType::getValue($inventory->getMedium()); 
										echo $mediumType?>
									</div>
								<label class="col-sm-2">Plot Number : </label>
								<div class="col-sm-2">
									<?php echo $inventory->getPlotNumber()?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 ">Purpose : </label>
								<div class="col-sm-2">
									<?php $purpose = PurposeType::getValue($inventory->getPurpose()) ;
									echo $purpose?>
								</div>
								<label class="col-sm-2">Address1: </label>
								<div class="col-sm-4">
									<?php echo $inventory->getAddress1()?>
								</div>
							</div>
						
							<div class="form-group">
								<label class="col-sm-2">City : </label>
								<div class="col-sm-2">
									<?php echo $inventory->getCity()?>
								</div>
								<label class="col-sm-2">Address2: </label>
								<div class="col-sm-5">
									<?php echo $inventory->getAddress2()?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2">Landmark : </label>
								<div class="col-sm-2">
									<?php echo $inventory->getLandmark()?>
								</div>
								<label class="col-sm-1">Area : </label>
								<div class="col-sm-1">
									<?php echo $inventory->getPropertyArea()?>
								</div>
								<label class="col-sm-1 ">Length : </label>
								<div class="col-sm-1">
									<?php echo $inventory->getDimensionLength()?>
								</div>
								<label class="col-sm-2 ">Breadth : </label>
								<div class="col-sm-1">
									<?php echo $inventory->getDimensionBreadth()?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2">Facing : </label>
								<div class="col-sm-2">
									<?php $facing = FacingType::getValue($inventory->getFacing());
									echo $facing?>
								</div>
								<label class="col-sm-2">Referred By : </label>
								<div class="col-sm-2">
									<?php echo $inventory->getReferredby()?>
								</div>
								<label class="col-sm-2">Name : </label>
								<div class="col-sm-2">
									<?php echo $inventory->getContactPerson()?>
								</div>
							</div>
							<div class="form-group">
								
								<label class="col-sm-2">Mobile : </label>
								<div class="col-sm-2">
									<?php echo $inventory->getContactMobile()?>
								</div>
								
								<label class="col-sm-2">Address : </label>
								<div class="col-sm-5">
									<?php echo $inventory->getContactAddress()?>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2">Rate : </label>
								<div class="col-sm-2">
									<?php echo $inventory->getRate()?>
								</div>
								<label class="col-sm-2">Amount : </label>
								<div class="col-sm-2">
									<?php echo $inventory->getExpectedAmount()?>
								</div>
								
								<label class="col-sm-2">Documents : </label>
								<div class="col-sm-2">
									<?php $document = DocumentType::getValue($inventory->getDocumentation());
									echo $document?>
								</div>
								
							</div>
							<div class="form-group">
								<label class="col-sm-2">Time : </label>
								<div class="col-sm-2">
									<?php echo $inventory->getTime()?>
								</div>
								<label class="col-sm-2">Rental : </label>
								<div class="col-sm-2">
									<?php echo $isRental?>
								</div>
								<label class="col-sm-2">Available : </label>
								<div class="col-sm-2">
									<?php echo $isAvailable?>
								</div>
							</div>
							<div class="form-group furnishing" style="display:none">
								<label class="col-sm-2">Furnishing : </label>
								<div class="col-sm-2">
									<?php $furnishing = FurnishingType::getValue($inventory->getFurnishing()) ;
									echo $furnishing?>
								</div>
								<label class="col-sm-2">Details : </label>
								<div class="col-sm-5">
									<?php echo $inventory->getFurnishingDetails()?>
								</div>
							</div>
							
							<div class="form-group stories" style="display:none">
								<label class="col-sm-2">Stories : </label>
								<div class="col-sm-2">
									<?php echo $inventory->getStories()?>
								</div>
								<label class="col-sm-3">Years of Construction : </label>
								<div class="col-sm-2">
									<?php echo $inventory->getConstructionYears()?>
								</div>
							</div>
							<div class="form-group agriculturalLand" style="display:none">
								<label class="col-sm-2">Sellers</label>
								<div class="col-sm-2">
									<?php echo $inventory->getTotalSellers()?>
								</div>
								<label class="col-sm-2">Property Numbers</label>
								<div class="col-sm-2">
									<?php echo $inventory->getPropertyType()?>
								</div>
								<label class="col-sm-2 control-label">Acquired</label>
								<div class="col-sm-2">
									<?php echo $inventory->getAcquired()?>
								</div>
							</div>
							<div class="form-group floorNumber" style="display:none">
								<label class="col-sm-2">Floor Number</label>
								<div class="col-sm-2">
									<?php echo $inventory->getFloorNumber()?>
								</div>
							</div>
							
							<div class="form-group specifications" style="display:none">
								<label class="col-sm-2">Specifications</label>
								<div class="col-sm-2">
									<?php echo $inventory->getSpecifications()?>
								</div>
								<label class="col-sm-1 control-label">Image</label>
								<div class="col-sm-4">
									<a>
										<img alt="image" id="inventoryImg" class="img" width="150px;"
											src="<?echo $imagePath."?".time() ?>"></a>
								</div>
							</div>
							
							<a href="showInventory.php" class="btn btn-primary">
								<span class="ladda-label">Back to Properties</span>
							</a>
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
    		$(".furnishing").hide();
			$(".stories").hide();
			$(".agriculturalLand").hide();
			$(".floorNumber").hide();
			$(".specifications").hide();
			value = "<?php echo $inventory->getPropertyType()?>"
			if(value == "building"){
				$(".furnishing").show();
				$(".stories").show();
				$(".floorNumber").show();
				$(".specifications").show();
       		}else if(value == "house"){
       			$(".furnishing").show();
				$(".stories").show();
				$(".specifications").show();
           	}else if(value == "plot"){
           		$(".agriculturalLand").show();
				$(".specifications").show();
           	}else if(value == "bank"){
           		$(".furnishing").show();
				$(".stories").show();
				$(".floorNumber").show();
				$(".specifications").show();
            }else if(value == "floor"){
            	$(".floorNumber").show();
				$(".specifications").show();
            }else if(value == "sco"){
            	$(".stories").show();
				$(".floorNumber").show();
				$(".specifications").show();
            }else if(value == "mallShop"){
            	$(".stories").show();
				$(".floorNumber").show();
				$(".specifications").show();
            }else if(value == "godown"){
            	$(".stories").show();
				$(".floorNumber").show();
				$(".specifications").show();
            }else if(value == "parkingArea"){
            	$(".specifications").show();
            }else if(value == "foodLounge"){
            	$(".stories").show();
				$(".floorNumber").show();
				$(".specifications").show();
            }
	    
});      
</script>