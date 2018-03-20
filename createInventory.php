<?php
require_once ($ConstantsArray ['dbServerUrl'] . "Utils/DropdownUtil.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Inventory</title>
   <script src="scripts/jquery-3.1.1.min.js"></script>
	<!-- Toastr -->
	<link href="styles/plugins/toastr/toastr.min.css" rel="stylesheet">
	<script src="scripts/plugins/toastr/toastr.min.js"></script>
	<!-- Custom and plugin javascript -->
	<script src="scripts/inspinia.js"></script>
	<link href="styles/bootstrap.min.css" rel="stylesheet">
	<link href="styles/animate.css" rel="stylesheet">
	<link href="styles/style.css" rel="stylesheet">
	<link href="styles/custom.css" rel="stylesheet">
	
	<!-- button ladda -->
	<link rel="stylesheet" href="styles/ladda-themeless.min.css">
	<script src="scripts/jquery.form.min.js"></script>
	<script src="scripts/spin.min.js"></script>
	<script src="scripts/ladda.min.js"></script>
	
	
	<!-- Jquery Validate -->
	<script src="scripts/plugins/validate/jquery.validate.min.js"></script>
	
	
	
	<!--Bootstrap-->
	<script src="scripts/bootstrap.min.js"></script>
	<link href="styles/bootstrap.min.css" rel="stylesheet">
	<link href="styles/animate.css" rel="stylesheet">
	<link href="styles/style.css" rel="stylesheet">
	<!-- BootBOX-->
	<script src="scripts/bootbox.js"></script>
	
	<!-- iCheck -->
	<link href="styles/plugins/iCheck/custom.css" rel="stylesheet">
	<script src="scripts/plugins/iCheck/icheck.min.js"></script>
	<!-- Font Awesome -->
	<link href="styles/font-awesome.min.css" rel="stylesheet">
	<!-- JQX Widgets -->
	<link rel="stylesheet" href="jqwidgets/styles/jqx.base.css" type="text/css" />
	<script type="text/javascript" src="jqwidgets/jqxcore.js"></script>
	<script type="text/javascript" src="jqwidgets/jqxvalidator.js"></script>
	<!-- Mainly scripts -->
	<script src="scripts/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="scripts/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="scripts/example.js"></script>
	<style type="text/css">
	.control-label{
		font-weight:normal;
		padding-top:0px !important;
		font-size:12px;
		line-height:14px;
	}
	.form-control{
		padding:4px;
		font-size:12px;
		height:30px !important;
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
						<h5>
							Create New Property Inventory
						</h5>
					</div>
					<div class="ibox-content mainDiv">
						<form method="post" action="Actions/InventoryAction.php" id="inventoryForm" class="form-horizontal">
							<input type="hidden" name="call" value="saveInventory">
							<input type="hidden" name="seq" value="0">
							<div class="form-group">
								<label class="col-sm-1 control-label">Type</label>
								<div class="col-sm-5">
									<?php echo DropDownUtils::getPropertyTypeDD("propertytype", "", "")?>
								</div>
								<label class="col-sm-1 control-label">Medium</label>
								<div class="col-sm-5">
									<div class="col-sm-5">
										<?php echo DropDownUtils::getMediumTypeDD("medium", "", "")?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Plot Number</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" id="plotnumber" name="plotnumber">
								</div>
								<label class="col-sm-1 control-label">Purpose</label>
								<div class="col-sm-5">
									<?php echo DropDownUtils::getPurposeTypeDD("purpose", "", "")?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Address1</label>
								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" id="address1" name="address1"></textarea>
								</div>
								<label class="col-sm-1 control-label">Address2</label>
								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" name="address2"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">City</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" id="city" name="city">
								</div>
								<label class="col-sm-1 control-label">Landmark</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" id="landmark" name="landmark">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Area</label>
								<div class="col-sm-1">
									<input class="form-control" type="text" id="propertyArea" name="propertyarea">
								</div>
								<label class="col-sm-1 control-label">Dimensions</label>
								<div class="col-sm-1">
									<input class="form-control" type="text" id="landmark" name="dimensionlength" placeholder="Length">
								</div>
								<div class="col-sm-1">
									<input class="form-control" type="text" id="landmark" name="dimensionbreadth"  placeholder="Breadth">
								</div>
								
								<label class="col-sm-2 control-label">Facing</label>
								<div class="col-sm-2">
									<?php echo DropDownUtils::getFacingTypeDD("facing", "", "")?>
								</div>
								<label class="col-sm-1 control-label">Referred</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="referred" name="referredby">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Name</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="contactPerson" name="contactperson">
								</div>
								<label class="col-sm-1 control-label">Mobile</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="contactMobile" name="contactmobile">
								</div>
								
								<label class="col-sm-1 control-label">Address</label>
								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" name="contactaddress"></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-1 control-label">Rate</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="rate" name="rate">
								</div>
								<label class="col-sm-1 control-label">Amount</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="expectedAmount" name="expectedamount">
								</div>
								
								<label class="col-sm-1 control-label">Documents</label>
								<div class="col-sm-2">
									<?php echo DropDownUtils::getDocumentTypeDD("documentation", "", "")?>
								</div>
								<label class="col-sm-1 control-label">Time</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="time" name="time">
								</div>
							</div>
							<div class="form-group i-checks"">
								<label class="col-sm-1 control-label"></label> 
									<label class="col-sm-2 control-label" style="text-align: left">
										<input type="checkbox" name="isrental" id="isrental">
										Rental
									</label> 
									<label class="col-sm-2 control-label">
										<input type="checkbox"	name="isavailable" id="isavailable"> 
										Available
									</label>
							</div>
							
							<div class="form-group furnishing" style="display:none">
								<label class="col-sm-1 control-label">Furnishing</label>
								<div class="col-sm-5">
									<?php echo DropDownUtils::getFurnishingDD("furnishing", "", "")?>
								</div>
								<label class="col-sm-1 control-label">Details</label>
								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" name="furnishingdetails"></textarea>
								</div>
							</div>
							
							<div class="form-group stories" style="display:none">
								<label class="col-sm-1 control-label">Stories</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="stories" name="stories">
								</div>
								<label class="col-sm-1 control-label">Years of Construction</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="constructionyears" name="constructionyears">
								</div>
							</div>
							
							<div class="form-group agriculturalLand" style="display:none">
								<label class="col-sm-1 control-label">Sellers</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="totalsellers" name="totalsellers">
								</div>
								<label class="col-sm-1 control-label">Property Numbers</label>
								<div class="col-sm-3">
									<?php echo DropDownUtils::getPropertyTypeDD("propertynumbers", "", "")?>
								</div>
								<label class="col-sm-1 control-label">Acquired</label>
								<div class="col-sm-3">
									<select name="acquired" class="form-control">
										<option>Self Purchased</option>
										<option>Ancestral</option>
									</select>
								</div>
							</div>
							
							
							<div class="form-group floorNumber" style="display:none">
								<label class="col-sm-1 control-label">Floor Number</label>
								<div class="col-sm-3">
									<input class="form-control" type="text" id="floornumber" name="floornumber">
								</div>
							</div>
							
							<div class="form-group specifications" style="display:none">
								<label class="col-sm-1 control-label">Specifications</label>
								<div class="col-sm-11">
									<textarea rows="10" cols="4" class="form-control" name="specifications" style="height:50px !important"></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-9">
									<button class="btn btn-primary ladda-button"
										data-style="expand-right" id="saveBtn" type="button">
										<span class="ladda-label">Save</span>
									</button>
									<span id="saveNewBtnDiv"><button
											class="btn btn-primary ladda-button"
											data-style="expand-right" id="saveNewBtn" type="button">
											<span class="ladda-label">Save & New</span>
										</button></span>
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
                $( "#propertytype" ).change(function() {
                		$(".furnishing").hide();
						$(".stories").hide();
						$(".agriculturalLand").hide();
						$(".floorNumber").hide();
						$(".specifications").hide();
						
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
            function submit(e,btn){
        	    e.preventDefault();
        	    var l = Ladda.create(btn);
        	    l.start();    
        	    $('#inventoryForm').ajaxSubmit(function( data ){
        	        l.stop();
        	        showResponseToastr(data,null,"inventoryForm","mainDiv");
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
            
        </script>
</body>

</html>
