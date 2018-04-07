<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
	<?include "ScriptsInclude.php"?>
	<style>
		.chosen-single{padding:4px !important;}
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
							Change Password
						</h5>
					</div>
					<div class="ibox-content mainDiv">
						<div class="row">                 
                     <div class="col-sm-12">                                                           
                        <div class="col-sm-6">
                            <form role="form" id="changePasswordForm" action = "Actions/AdminAction.php">
                                <input type="hidden" id ="call" name="call" value="changePassword"/>
                                <div class="form-group"><label>Current Password</label> 
                                    <input type="password" id="earlierPassword" name="earlierPassword" class="form-control">
                                </div>
                                <div class="form-group"><label>New Password</label> 
                                    <input type="password" id="newPassword" name="newPassword" class="form-control">
                                </div>
                                <div class="form-group"><label>Confirm Password</label>
                                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control">
                                </div>
                                <div>
                                     <button class="btn btn-primary ladda-button" data-style="expand-right" id="saveBtn" type="button">
                                        <span class="ladda-label">Save</span>
                                    </button>
                               </div>  
                               
                            </form>
                        </div>                        
                     </div>
                </div>	 
					</div>
				</div>
			</div>
		</div>
        </div>
        </div>   
</body>
</html>
 <script src="scripts/FormValidators/ChangePasswordValidations.js"></script> 
<script type="text/javascript">
$(document).ready(function(){ 
    $("#saveBtn").click(function(e){
        var btn = this;
        var validationResult = function (isValid) {
            if (isValid) {
                changePassword(e,btn);
            }
        }
        $('#changePasswordForm').jqxValidator('validate', validationResult);   
    })
});
function changePassword(e,btn){
    e.preventDefault();
    var l = Ladda.create(btn);
    l.start();
    $('#changePasswordForm').ajaxSubmit(function( data ){
        l.stop();
        showResponseToastr(data,null,"changePasswordForm","mainDiv");
    })
} 
</script>