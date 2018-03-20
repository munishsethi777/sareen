<?php
require_once ($ConstantsArray ['dbServerUrl'] . "Utils/DropdownUtil.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Managers/InventoryMgr.php");
$inventory = new Inventory();
if(isset($_POST["id"])){
	$id = $_POST["id"];
	$inventoryMgr = InventoryMgr::getInstance();
	$inventory = $inventoryMgr->findBySeq($id);
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
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class=""><a href="showInventory.php">
                	<i class="fa fa-desktop"></i> <span class="nav-label">Manage Inventory</span></a>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
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
									<?php echo DropDownUtils::getPropertyTypeDD("propertytype", "", $inventory->getPropertyType())?>
								</div>
								<label class="col-sm-1 control-label">Medium</label>
								<div class="col-sm-5">
									<div class="col-sm-5">
										<?php echo DropDownUtils::getMediumTypeDD("medium", "", $inventory->getMedium())?>
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
									<?php echo DropDownUtils::getPurposeTypeDD("purpose", "", $inventory->getPurpose())?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Address1</label>
								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" id="address1" name="address1"><?php echo $inventory->getAddress1()?></textarea>
								</div>
								<label class="col-sm-1 control-label">Address2</label>
								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" name="address2"><?php echo $inventory->getAddress2()?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">City</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" value=<?php echo $inventory->getCity()?> id="city" name="city">
								</div>
								<label class="col-sm-1 control-label">Landmark</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" value=<?php echo $inventory->getLandmark()?> id="landmark" name="landmark">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Area</label>
								<div class="col-sm-1">
									<input class="form-control" type="text" value=<?php echo $inventory->getPropertyArea()?> id="propertyArea" name="propertyarea">
								</div>
								<label class="col-sm-1 control-label">Dimensions</label>
								<div class="col-sm-1">
									<input class="form-control" type="text" id="landmark" value=<?php echo $inventory->getDimensionLength()?> name="dimensionlength" placeholder="Length">
								</div>
								<div class="col-sm-1">
									<input class="form-control" type="text" id="landmark" value=<?php echo $inventory->getDimensionBreadth()?> name="dimensionbreadth"  placeholder="Breadth">
								</div>
								
								<label class="col-sm-2 control-label">Facing</label>
								<div class="col-sm-2">
									<?php echo DropDownUtils::getFacingTypeDD("facing", "", $inventory->getFacing())?>
								</div>
								<label class="col-sm-1 control-label">Referred</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value=<?php echo $inventory->getReferredby()?> id="referred" name="referredby">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Name</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value=<?php echo $inventory->getContactPerson()?> id="contactPerson" name="contactperson">
								</div>
								<label class="col-sm-1 control-label">Mobile</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value=<?php echo $inventory->getContactMobile()?> id="contactMobile" name="contactmobile">
								</div>
								
								<label class="col-sm-1 control-label">Address</label>
								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" name="contactaddress">value=<?php echo $inventory->getContactAddress()?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-1 control-label">Rate</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value=<?php echo $inventory->getRate()?> id="rate" name="rate">
								</div>
								<label class="col-sm-1 control-label">Amount</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value=<?php echo $inventory->getExpectedAmount()?> id="expectedAmount" name="expectedamount">
								</div>
								
								<label class="col-sm-1 control-label">Documents</label>
								<div class="col-sm-2">
									<?php echo DropDownUtils::getDocumentTypeDD("documentation", "", $inventory->getDocumentation())?>
								</div>
								<label class="col-sm-1 control-label">Time</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value=<?php echo $inventory->getTime()?> id="time" name="time">
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
							
							<hr>
							House Fields
							<hr>
							<div class="form-group">
								<label class="col-sm-1 control-label">Furnishing</label>
								<div class="col-sm-5">
									<?php echo DropDownUtils::getFurnishingDD("furnishing", "", $inventory->getFurnishing())?>
								</div>
								<label class="col-sm-1 control-label">Details</label>
								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" name="furnishingdetails"><?php echo $inventory->getFurnishingDetails()?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-1 control-label">Stories</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value="<?php echo $inventory->getStories()?>" id="stories" name="stories">
								</div>
								<label class="col-sm-1 control-label">Years of Construction</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value="<?php echo $inventory->getConstructionYears()?>" id="constructionyears" name="constructionyears">
								</div>
							</div>
							
							<hr>
							Agricultural Land
							<hr>
							<div class="form-group">
								<label class="col-sm-1 control-label">Sellers</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" value="<?php echo $inventory->getTotalSellers()?>" id="totalsellers" name="totalsellers">
								</div>
								<label class="col-sm-1 control-label">Property Numbers</label>
								<div class="col-sm-3">
									<?php echo DropDownUtils::getPropertyTypeDD("propertynumbers", "", $inventory->getPropertyType())?>
								</div>
								<label class="col-sm-1 control-label">Acquired</label>
								<div class="col-sm-3">
									<?php echo DropDownUtils::getPropertyTypeDD("acquired", "", $inventory->getAcquired())?>
								</div>
							</div>
							
							
							<hr>
							Other for Building/Mall/Floor/Bank etc
							<hr>
							<div class="form-group">
								<label class="col-sm-1 control-label">Floor Number</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" value="<?php echo $inventory->getFloorNumber()?>" id="floornumber" name="floornumber">
								</div>
								<label class="col-sm-1 control-label">Specifications</label>
								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" name="specifications"><?php echo $inventory->getSpecification()?></textarea>
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
                $("#cancelBtn").click(function(e){
                	location.href = ("showInventory.php");          
            	});
            });
            $('#inventoryForm').jqxValidator({
            	hintType: 'label',
            	animationDuration: 0,
            	rules: [
            	{ input: '#address1', message: 'Address1 is required!', action: 'keyup, blur', rule: 'required' },
            	{ input: '#contactPerson', message: 'Name is required!', action: 'keyup, blur', rule: 'required' },
            	{ input: '#contactMobile', message: 'Mobile11 is required!', action: 'keyup, blur', rule: 'required' }
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
