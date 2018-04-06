<?php
require_once ($ConstantsArray ['dbServerUrl'] . "Utils/DropdownUtil.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Managers/InventoryMgr.php");
$inventory = new Inventory();
$isAvailable = "";
$isRental = "";
$imagePath = "images/dummy.jpg";
$id = null;
$isAvailable = "checked";
if(isset($_POST["id"])){
	$id = $_POST["id"];
	$inventoryMgr = InventoryMgr::getInstance();
	$inventory = $inventoryMgr->findBySeq($id);
	$path = "images/propertyImages/".$id ."_thumb."."jpg";
	if (file_exists($path)){
		$imagePath = $path;
	}
	if(!empty($inventory->getIsAvailable())){
		$isAvailable = "checked"; 
	}else{
		$isAvailable = "";
	}
	if(!empty($inventory->getIsRental())){
		$isRental = "checked";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Property</title>
	<?include "ScriptsInclude.php"?>
	<style type="text/css">
		h4{
			padding-bottom:20px;
		}
		.hr-line-dashed{
			border-top:1px dashed #b4b6b7;
		}
	</style>
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
						 <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
							<a class="navbar-minimalize minimalize-styl-2 btn btn-primary "
								href="#"><i class="fa fa-bars"></i> </a>
						</nav>
						<h5>
							Create New Property Inventory
						</h5>
					</div>
					<div class="ibox-content mainDiv">
						<form method="post" action="Actions/InventoryAction.php" id="inventoryForm" class="form-horizontal">
							<input type="hidden" name="call" value="saveInventory">
							<input type="hidden" name="seq" value="<?php echo $inventory->getSeq()?>" >
							<h4>USER INFO</h4>
							<div class="form-group">
								<label class="col-sm-1 control-label">Name</label>
								<div class="col-sm-4">
									<input class="form-control" type="text" value="<?php echo $inventory->getContactPerson()?>" id="contactPerson" name="contactperson">
								</div>
								<label class="col-sm-1 control-label col-sm-offset-1">Mobile</label>
								<div class="col-sm-4">
									<input class="form-control" type="text" value="<?php echo $inventory->getContactMobile()?>" id="contactMobile" name="contactmobile">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Address</label>
								<div class="col-sm-4">
									<textarea rows="2" cols="4" class="form-control" name="contactaddress"><?php echo $inventory->getContactAddress()?></textarea>
								</div>
								
								<label class="col-sm-2 control-label">Referred by</label>
								<div class="col-sm-4">
									<input class="form-control" type="text" value="<?php echo $inventory->getReferredby()?>" id="referred" name="referredby">
								</div>
							</div>
							
							<div class="hr-line-dashed"></div>
							<h4>PROPERTY INFO</h4>
							<div class="form-group">
								<label class="col-sm-1 control-label">Type</label>
								<div class="col-sm-4">
									<?php echo DropDownUtils::getPropertyTypeDD("propertytype", "", $inventory->getPropertyType())?>
								</div>
								<label class="col-sm-1 control-label col-sm-offset-1">Purpose</label>
								<div class="col-sm-4">
									<?php echo DropDownUtils::getPurposeTypeDD("purpose", "", $inventory->getPurpose())?>
								</div>
							</div>
							<div class="form-group i-checks">
								<label class="col-sm-1 control-label">Medium</label>
								<div class="col-sm-4">
									<?php echo DropDownUtils::getMediumTypeDD("medium", "showDetail(this.value)", $inventory->getMedium())?>
								</div>
								<label class="col-sm-2 col-sm-offset-2 control-label" style="text-align: left">
									<input type="checkbox" name="isrental" <?php echo $isRental?> id="isrental">
									Rental
								</label> 
							</div>
							<div id="mediumDetail" style="display: none">
								<div class="form-group">
									<label class="col-sm-1 control-label">Name</label>
									<div class="col-sm-4">
										<input class="form-control" type="text" value="<?php echo $inventory->getMediumName()?>" id="mediumname" name="mediumname">
									</div>
									<label class="col-sm-1 control-label col-sm-offset-1">Phone</label>
									<div class="col-sm-4">
										<input class="form-control" type="text" value="<?php echo $inventory->getMediumPhone()?>" id="mediumphone" name="mediumphone">
									</div>
									
								</div>
								<div class="form-group">
									<label class="col-sm-1 control-label">Address</label>
									<div class="col-sm-4">
										<input class="form-control" type="text" value="<?php echo $inventory->getMediumAddress()?>" id="mediumaddress" name="mediumaddress">
									</div>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<h4>LOCATION</h4>
							<div class="form-group">
								
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Plot #</label>
								<div class="col-sm-4">
									<input class="form-control" type="text" id="plotnumber" value="<?php echo $inventory->getPlotNumber()?>" name="plotnumber">
								</div>
								
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Address1</label>
								<div class="col-sm-4">
									<textarea rows="3" cols="4" class="form-control" id="address1" name="address1"><?php echo $inventory->getAddress1()?></textarea>
								</div>
								<label class="col-sm-2 control-label">Address2</label>
								<div class="col-sm-4">
									<textarea rows="3" cols="4" class="form-control" name="address2"><?php echo $inventory->getAddress2()?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">City</label>
								<div class="col-sm-4">
									<input class="form-control" type="text" value="<?php echo $inventory->getCity()?>" id="city" name="city">
								</div>
								<label class="col-sm-2 control-label">Landmark</label>
								<div class="col-sm-4">
									<input class="form-control" type="text" value="<?php echo $inventory->getLandmark()?>" id="landmark" name="landmark">
								</div>
							</div>
							
							<div class="hr-line-dashed"></div>
							<h4>PROPERTY AREA</h4>
							<div class="form-group">
								<label class="col-sm-1 control-label">Area</label>
								<div class="col-sm-1">
									<input class="form-control" type="text" value="<?php echo $inventory->getPropertyArea()?>" id="propertyArea" name="propertyarea">
								</div>
								<label class="col-sm-1 control-label">Unit</label>
								<div class="col-sm-2">
									<?php echo DropDownUtils::getPropertyUnitsDD("propertyunit", "", $inventory->getPropertyUnit())?>
								</div>
								
								
								
								<label class="col-sm-2 control-label">Dimensions</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="landmark" value="<?php echo $inventory->getDimensionLength()?>" name="dimensionlength" placeholder="Length">
								</div>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="landmark" value="<?php echo $inventory->getDimensionBreadth()?>" name="dimensionbreadth"  placeholder="Breadth">
								</div>
							</div>
							
							<div class="hr-line-dashed"></div>
							<h4>PROPERTY FEATURES</h4>
							<div class="form-group">	
								<label class="col-sm-1 control-label">Facing</label>
								<div class="col-sm-2">
									<?php echo DropDownUtils::getFacingTypeDD("facing", "", $inventory->getFacing())?>
								</div>
								
								<label class="col-sm-2 control-label">Documents</label>
								<div class="col-sm-2">
									<?php echo DropDownUtils::getDocumentTypeDD("documentation", "", $inventory->getDocumentation())?>
								</div>
								
								<label class="col-sm-1 control-label">Time</label>
								<div class="col-sm-1">
									<input class="form-control" type="text" value="<?php echo $inventory->getTime()?>" id="time" name="time">
								</div>
							</div>
							
							<div class="form-group">	
								<label class="col-sm-1 control-label">Approval Type</label>
								<div class="col-sm-2">
									<?php echo DropDownUtils::getApprovalTypeDD("approvaltype", "", $inventory->getApprovalType())?>
								</div>
								<label class="col-sm-2 control-label">PropertySide</label>
								<div class="col-sm-2">
									<?php echo DropDownUtils::getPropertySideTypeDD("propertysides", "", $inventory->getPropertySides())?>
								</div>
							</div>
							<div class="form-group furnishing" style="display:none">
								<label class="col-sm-1 control-label">Furnishing</label>
								<div class="col-sm-5">
									<?php echo DropDownUtils::getFurnishingDD("furnishing", "", $inventory->getFurnishing())?>
								</div>
								<label class="col-sm-1 control-label">Details</label>
								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" name="furnishingdetails"><?php echo $inventory->getFurnishingDetails()?></textarea>
								</div>
							</div>
							
							<div class="form-group stories" style="display:none">
								<label class="col-sm-1 control-label">Stories</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value="<?php echo $inventory->getStories()?>" id="stories" name="stories">
								</div>
								<label class="col-sm-1 control-label">Years of Construction</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value="<?php echo $inventory->getConstructionYears()?>" id="constructionyears" name="constructionyears">
								</div>
								
								<label class="col-sm-1 control-label">Image</label>
								<div class="col-sm-4">
									<input type="file" id="inventoryImage" name="inventoryImage"
										class="form-control hidden" /> <label for="inventoryImage"><a><img
											alt="image" id="inventoryImg" class="img" width="100px;"
											src="<?echo $imagePath."?".time() ?>"></a></label> <label
										class="jqx-validator-error-label" id="imageError"></label>
								</div>
							</div>
							
							<div class="form-group agriculturalLand" style="display:none">
								<label class="col-sm-1 control-label">Property Numbers</label>
								<div class="col-sm-2">
									<?php echo DropDownUtils::getPropertyNumberTypeDD("propertynumbers", "", $inventory->getPropertyNumbers())?>
								</div>
							
								<label class="col-sm-1 control-label">Sellers</label>
								<div class="col-sm-1">
									<input class="form-control" type="text" value="<?php echo $inventory->getTotalSellers()?>" id="totalsellers" name="totalsellers">
								</div>
								
								<label class="col-sm-2 control-label">Acquired</label>
								<div class="col-sm-3">
									<?php echo DropDownUtils::getAcquiredTypeDD("acquired", "", $inventory->getAcquired())?>
								</div>
							</div>
							
							
							<div class="form-group floorNumber" style="display:none">
								<label class="col-sm-1 control-label">Floor Number</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" value="<?php echo $inventory->getFloorNumber()?>" id="floornumber" name="floornumber">

								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<h4>LOCATION</h4>
							<div class="form-group">
								<div class="col-sm-4">
										<div class="row">
											<label class="col-sm-4 control-label">Longitude</label>
											<div class="col-sm-8">
												<input class="form-control" type="text" id="longitude" name="longitude" value="<?php echo $inventory->getLongitude()?>">
											</div>
										</div>
										<div class="row" style="margin-top:30px;">
											<label class="col-sm-4 control-label">Latitude</label>
											<div class="col-sm-8">
												<input class="form-control" type="text" id="latitude" name="latitude" value="<?php echo $inventory->getLatitude()?>">
											</div>
										</div>
										<div class="row" style="margin-top:30px;">
											<label class="col-sm-4 control-label" id="markerStatus"></label>
											<label class="col-sm-4 control-label" id="info"></label>
											<label class="col-sm-4 control-label" id="address"></label>
											
										</div>
								</div>	
							
								<div class="col-sm-8">
									<div style="width:100%;height:300px;" id="map"></div>
								</div>
							</div>
							
							
							
							
							
							<div class="hr-line-dashed"></div>
							<h4>PRICING</h4>
							<div class="form-group">
								<label class="col-sm-1 control-label">Rate</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value="<?php echo $inventory->getRate()?>" id="rate" name="rate">
								</div>
								<label class="col-sm-1 control-label">Amount</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value="<?php echo $inventory->getExpectedAmount()?>" id="expectedAmount" name="expectedamount">
								</div>
								
								<label class="col-sm-1 control-label">Specifications</label>
								<div class="col-sm-5">
									<textarea rows="4" cols="4" class="form-control" style="height:70px !important" name="specifications" ><?php echo $inventory->getSpecifications()?></textarea>
								</div>
							</div>
							<div class="form-group i-checks">
									<label class="col-sm-1 control-label">Availability</label> 
									<label class="col-sm-1 control-label">
										<input type="checkbox"	name="isavailable" <?php echo $isAvailable?> id="isavailable"> 
										
								</label>
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
var map, infoWindow;
$(document).ready(function () {
	$(".furnishing").show();
	$(".stories").show();
	$(".agriculturalLand").show();
	$(".floorNumber").show();
	$(".specifications").show();
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
        	location.href = ("showInventory.php");          
		});
        $("#inventoryImage").change(function(){
            readInventoryIMG(this);
         });
	    $( "#propertytype" ).change(function() {
				$(".furnishing").hide();
				$(".stories").hide();
				$(".agriculturalLand").hide();
				$(".floorNumber").hide();
				$(".specifications").show();
				
				if(this.value == "building"){
					$(".furnishing").show();
					$(".stories").show();
					$(".floorNumber").show();
					$(".specifications").show();
	       		}else if(this.value == "house"){
	       			$(".furnishing").show();
					$(".stories").show();
					$(".specifications").show();
	           	}else if(this.value == "plot"){
	           		$(".agriculturalLand").show();
					$(".specifications").show();
	           	}else if(this.value == "bank"){
	           		$(".furnishing").show();
					$(".stories").show();
					$(".floorNumber").show();
					$(".specifications").show();
	            }else if(this.value == "floor"){
	            	$(".floorNumber").show();
					$(".specifications").show();
	            }else if(this.value == "sco"){
	            	$(".stories").show();
					$(".floorNumber").show();
					$(".specifications").show();
	            }else if(this.value == "mallShop"){
	            	$(".stories").show();
					$(".floorNumber").show();
					$(".specifications").show();
	            }else if(this.value == "godown"){
	            	$(".stories").show();
					$(".floorNumber").show();
					$(".specifications").show();
	            }else if(this.value == "parkingArea"){
	            	$(".specifications").show();
	            }else if(this.value == "foodLounge"){
	            	$(".stories").show();
					$(".floorNumber").show();
					$(".specifications").show();
	
	            }
	    })
	    $( "#propertytype" ).change();
	    showDetail("<?php echo $inventory->getMedium()?>");
});
$('#inventoryForm').jqxValidator({
	hintType: 'label',
	animationDuration: 0,
	rules: [
	{ input: '#address1', message: 'Address1 is required!', action: 'keyup, blur', rule: 'required' },
	{ input: '#contactPerson', message: 'Name is required!', action: 'keyup, blur', rule: 'required' },
	{ input: '#contactMobile', message: 'Mobile is required!', action: 'keyup, blur', rule: 'required' }
	]
});
function readInventoryIMG(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#inventoryImg').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function showDetail(value){
	if(value != 'direct' && value != undefined && value != ""){
		$("#mediumDetail").show();
	}else{
		$("#mediumDetail").hide();
	}
}

function submit(e,btn){
    e.preventDefault();
    var l = Ladda.create(btn);
    l.start();    
    $('#inventoryForm').ajaxSubmit(function( data ){
        l.stop();
        showResponseToastr(data,null,"inventoryForm","mainDiv");
        btnId = btn.id
        if(btnId == "saveBtn"){
 		   location.href = "showInventory.php";
 	   }
    })
}
function ValidateAndSave(e,btn){
    var validationResult = function (isValid){
       if (isValid) {
    	   submit(e,btn);   
        }
    }
   $('#inventoryForm').jqxValidator('validate', validationResult);
}
function initMap() {
	var lat = 50.897660000000002;
	var lng = 75.8631612;
	<?php if(!empty($inventory->getLongitude())){
			echo ("lng = ".$inventory->getLongitude().";");
			echo ("lat = ".$inventory->getLatitude().";");
		}
	?>
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: lat, lng: lng},
      zoom: 15
    });
    infoWindow = new google.maps.InfoWindow;
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      	navigator.geolocation.getCurrentPosition(function(position) {
        $("#longitude").val(position.coords.longitude);
        $("#latitude").val(position.coords.latitude);
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
      		
        infoWindow.setPosition(pos);
        infoWindow.setContent('Location found.');
        infoWindow.open(map);
        map.setCenter(pos);
      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
      });
    }else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
    google.maps.event.addListener(map, 'click', function( event ){
    	$("#longitude").val(event.latLng.lng());
      	$("#latitude").val(event.latLng.lat());
      	placeMarker(event.latLng);
    });
    
  }

	function placeMarker(location) {
	    var marker = new google.maps.Marker({
	        position: location, 
	        map: map
	    });
	}
	
  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                          'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC9V55rJSrsXjDc2VgJtFtH4qCw2dS2G74&callback=initMap"
	  type="text/javascript"></script>