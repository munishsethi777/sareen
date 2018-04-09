<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administration - Easy Assessment Engine</title>
        <?include "ScriptsInclude.php"?>
        <script type="text/javascript">
            $(document).ready(function () {
                //$('.form-control').jqxInput({  });
                $('#loginForm').jqxValidator({
                    rules: [
                           { input: '#usernameInput', message: 'UserName is required!', action: 'keyup, blur', rule: 'required' },
                           { input: '#usernameInput', message: 'UserName must be less than 250 characters!', action: 'keyup, blur', rule: 'length=0,250' },

                           { input: '#passwordInput', message: 'Password is required!', action: 'keyup, blur', rule: 'required' },
                           { input: '#passwordInput', message: 'Password must be less than 250 characters!', action: 'keyup, blur', rule: 'length=0,250' },
                           ]
                });
                //$('#loginButton').jqxButton({ width: 100, height: 25 });
                $("#loginButton").click(function (e) {
                    validateAndSave(e,this);
                });
                $("#loginForm").on('validationSuccess', function () {
                    $("#loginForm-iframe").fadeIn('fast');
                });
                $('#usernameInput').keypress(function (e) {
                    btn = $("#loginButton")[0];
                    if (e.which == 13) {
                        validateAndSave(e,btn);
                        return false;
                    }
                })
                $('#passwordInput').keypress(function (e) {
                    btn = $("#loginButton")[0];
                    if (e.which == 13) {
                        validateAndSave(e,btn);
                        return false;
                    }
                })
            });

            function validateAndSave(e,btn){
                var validationResult = function (isValid) {
                    if (isValid) {
                        submitLogin(e,btn);
                    }
                }
                $('#loginForm').jqxValidator('validate', validationResult);
            }
            function submitLogin(e,btn){
                var l = Ladda.create(btn);
                l.start();
                $formData = $("#loginForm").serializeArray();
                $.getJSON( "Actions/AdminAction.php?call=loginAdmin", $formData,function( data ){
                    l.stop();
                    if(data.success == 0){
                        toastr.error("Invaid username or Password",'Login Failed');
                    }else{
                        window.location = "index.php";
                    }
                });
            }
            </script>
    </head>
<body class="gray-bg">
<div class="loginColumns animated fadeInDown">
    <div class="row">
        <div class="col-md-6">
	        <h1 class="font-bold">Welcome to Sareen Property</h1>
	        <p>
	        	Please login with your credentials sent to you.
	        </p>
        </div>
        <div class="col-md-6">
            <div class="ibox-content">

                <form class="form-horizontal" id="loginForm" method="POST" name="loginForm">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                      <input type="text" name="username" class="form-control input-lg" id="usernameInput">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                      <input type="password" name="password" class="form-control input-lg" id="passwordInput">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button class="btn btn-primary block full-width m-b ladda-button" data-style="expand-right" id="loginButton" type="button">
                            <span class="ladda-label">Login</span>
                        </button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>



