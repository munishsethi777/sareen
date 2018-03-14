<?//include("sessioncheck.php");?>
<html>
<head>
<link href="styles/plugins/iCheck/custom.css" rel="stylesheet">
<?include "ScriptsInclude.php";?>
</head>
<body class='default'>
	<div id="wrapper" class="wrapper-content animated fadeInRight">
        <?include("adminMenu.php");?>
        <div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>
							Create New Property Inventory
						</h5>
					</div>
					<div class="ibox-content mainDiv">
						<form method="post" action="Actions/MailMessageAction.php"
							id="createMessageForm" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-1 control-label">Type</label>
								<div class="col-sm-5">
									<select class="form-control">
										<option>Plot</option>
										<option>House</option>
										<option>Building</option>
										<option>Rental</option>
									</select>
								</div>
								<label class="col-sm-1 control-label">Medium</label>
								<div class="col-sm-5">
									<select class="form-control">
										<option>Direct</option>
										<option>Broker</option>
										<option>Relative</option>
										<option>Relative incharge</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Plot Number</label>
								<div class="col-sm-5">
									<input class="form-control" type="text" id="plotNumber" name="plotNumber">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Address1</label>
								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" name="address1"></textarea>
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
									<input class="form-control" type="text" id="propertyArea" name="propertyArea">
								</div>
								<label class="col-sm-1 control-label">Dimensions</label>
								<div class="col-sm-1">
									<input class="form-control" type="text" id="landmark" name="landmark" placeholder="Length">
								</div>
								<div class="col-sm-1">
									<input class="form-control" type="text" id="landmark" name="landmark"  placeholder="Breadth">
								</div>
								
								<label class="col-sm-2 control-label">Facing</label>
								<div class="col-sm-2">
									<select class="form-control">
										<option>North</option>
										<option>East</option>
										<option>West</option>
										<option>South</option>
									</select>
								</div>
								<label class="col-sm-1 control-label">Referred</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="referred" name="referred">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-1 control-label">Name</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="contactPerson" name="contactPerson">
								</div>
								<label class="col-sm-1 control-label">Mobile</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="contactMobile" name="contactMobile">
								</div>
								
								<label class="col-sm-1 control-label">Address</label>
								<div class="col-sm-5">
									<textarea rows="3" cols="4" class="form-control" name="contactAddress"></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-1 control-label">Rate</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="rate" name="rate">
								</div>
								<label class="col-sm-1 control-label">Amount</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="contactMobile" name="contactMobile">
								</div>
								
								<label class="col-sm-1 control-label">Documents</label>
								<div class="col-sm-2">
									<select class="form-control">
										<option>Registry</option>
										<option>Agreement</option>
										<option>Attorney</option>
										<option>Full Final</option>
									</select>
								</div>
								<label class="col-sm-1 control-label">Time</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" id="time" name="time">
								</div>
								
							</div>
							
							
							
							<div class="form-group i-checks"">
								<label class="col-sm-1 control-label"></label> 
									<label class="col-sm-2 control-label" style="text-align: left">
										<input type="checkbox" name="isEmail" id="isEmail">
										Rental
									</label> 
									<label class="col-sm-2 control-label">
										<input type="checkbox"	name="isMobileNotification" id="isMobileNotification"> 
										Available
									</label>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Send On</label>
								<div id="sendOnDiv" class="col-sm-10">
									<div class="row" style="margin: 10px 0px;">
										<div class="col-sm-3 i-checks">
											<input type="radio" 
												value="onParticulerDate" name="actOption" id="actOption">
											Particular Date
										</div>
										<div class="col-sm-4" id="sendDateDiv">
											<input class="form-control" placeholder="Select Date"
												value=">" type="text" id="sendDate"
												name="sendDate">

										</div>
									</div>

									<div class="row" style="margin: 10px 0px;">
										<div class="col-sm-3 i-checks">
											<input type="radio" >
												value="onEnrollment" name="actOption" id="actOption"> Module
											Enrollment
										</div>
									</div>

									<div class="row" style="margin: 10px 0px;">
										<div class="col-sm-3 i-checks">
											<input type="radio" 
												value="onCompletion" name="actOption" id="actOption"> Module
											Completion
										</div>
									</div>

									<div class="row" style="margin: 10px 0px;">
										<div class="col-sm-3 i-checks">
											<input type="radio"  value="onMarks"
												name="actOption" id="actOption"> Module Marks
										</div>
										<div id="moduleMarksDiv">
											<div class="col-sm-2 ">
												<select class="form-control" id="conditionOperator"
													name="conditionOperator">
													<option value="onMarksGreaterThan">></option>
													<option value="onMarksLessThan"><</option>
													<option value="onMarksEqualTo">=</option>
												</select>
											</div>
											<div class="col-sm-1">
												<input class="form-control" 
													type="text" id="percent" name="percent">
											</div>
											<div class="col-sm-1">Percent</div>
										</div>
									</div>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-2 control-label"></label>
								<div class="col-sm-9">
									<div id="criteriaDiv" class="row i-checks">
										<div class="col-sm-3">
											<input type="radio" value="module" checked="checked"
												name="sendOnCriteria" id="sendOnCriteria"> Modules
										</div>
										<div class="col-sm-3">
											<input type="radio" value="learningProfile"
												 name="sendOnCriteria"
												id="sendOnCriteria"> Learner's Profiles
										</div>
										<!--  <div class="col-sm-3">
	                                                <input type="radio" value="customField" name="actOption" id="actOption"> Custom Fields
	                                            </div>-->
									</div>
								</div>
							</div>
							<!--  <div class="form-group" id="learningPlanDiv">
                                    <label class="col-sm-2 control-label">Learning Plans</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <select class="form-control chosen-select" onchange="loadModule(false)" id="learningPlanDD" name="learningPlanDD[]" multiple>
                                            </select>
                                            <label class="jqx-validator-error-label" id="lpError"></label>
                                        </div>
                                    </div>
                                </div>-->
							<div class="form-group" id="moduleDiv">
								<label class="col-sm-2 control-label">Modules</label>
								<div class="row">
									<div class="col-sm-6">
										<select class="form-control chosen-select1" id="moduleDD"
											name="moduleDD[]" multiple>
										</select> <label class="jqx-validator-error-label"
											id="moduleError"></label>
									</div>
								</div>
							</div>
							<div class="form-group" style="display: none"
								id="learningProfileDiv">
								<label class="col-sm-2 control-label">Learner's Profiles</label>
								<div class="row">
									<div class="col-sm-6">
										<select class="form-control chosen-select"
											name="learningProfiles[]" id="profilesDD" multiple></select>
										<label class="jqx-validator-error-label" id="lprofileError"></label>
									</div>
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
</body>
</html>
<script src="scripts/FormValidators/CreateMessageValidations.js"></script>
<script src="scripts/FormValidators/FormValidators.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    	$('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
        $(".chosen-select1").chosen({width:"100%"});
        $('#editor').summernote({
			height: 100,
			minHeight: null,             // set minimum height of editor
			maxHeight: null,             // set maximum height of editor
			focus: true ,
			maximumImageFileSize: 512000 
		});
//         $('#sendOnDiv').on('ifChecked', function(event){
//         	var value = $("input[type='radio'][name='actOption']:checked").val();
//         	showHideSendDate(value);
//   		});
//          $("#saveBtn").click(function(e){
//             ValidateAndSave(e,this);
//         });

//         $("#saveNewBtn").click(function(e){
//             ValidateAndSave(e,this);
//         });
//         $("#cancelBtn").click(function(e){
//             location.href = "manageMessages.php";
//         });
        
//         $('#criteriaDiv').on('ifChanged', function(event){
//         	var value = $("input[type='radio'][name='sendOnCriteria']:checked").val();
//         	 showHideDiv(value + "Div");
//   		});
        
    });
    function populateProfiles(){
        var url = 'Actions/LearningProfileAction.php?call=getLearnerProfiles';
        $.getJSON(url, function(data){
            var options = "";
            $.each(data, function(index , value){
                  options += "<option value='" + value.id + "'>" + value.awesomefontid  + " " + value.tag + "</option>";
            });
            $("#profilesDD").html(options);
            $(".chosen-select").chosen({width:"100%"});
            var values = "<?echo $profileSeqs?>";
            if(values.length > 0){
                values = values.split(",")
                $('.chosen-select').val(values).trigger("chosen:updated");
            }
        });
    }
    function showHideDiv(divId){
        $("#moduleDiv").hide();
        $("#learningProfileDiv").hide();
        $("#" + divId).show();
    }

    function populateDropdown(profiles){
    	options = "";
        $.each(profiles, function(key, value){
            options += "<option value='" + value.id + "'>" + value.title + "</option>";

        })
        $("#learningPlanDD").html(options);
        $(".chosen-select").chosen({width:"100%"});
        var values = "<?echo $lpSeqs?>";
        if(values.length > 0){
            values = values.split(",");
            $('.chosen-select').val(values).trigger("chosen:updated");
            loadModule(false);
        }
     }

    function showHideSendDate(value){
    	$("#moduleDiv").show();
        if(value == "onParticulerDate"){
            $("#sendDateDiv").show();
            $("#criteriaDiv").show();
            var value = $("input[type='radio'][name='sendOnCriteria']:checked").val();
    		showHideDiv(value + "Div");
        }else{
             $("#sendDateDiv").hide();
             $("#criteriaDiv").hide()
             $("#learningProfileDiv").hide();
        }
        
        if(value == "onMarks"){
            $("#moduleMarksDiv").show();
        }else{
            $("#moduleMarksDiv").hide();
        }
        loadModule(true);
    }

    function showHideModule(isChecked){
        if(isChecked){
            $("#deactivateDateDiv").show();
        }else{
            $("#deactivateDateDiv").hide();
        }
    }

    function ValidateAndSave(e,btn){
        var validationResult = function (isValid){
           if (isValid) {
               saveMailMessage(e,btn);
            }
        }
       $('#createMessageForm').jqxValidator('validate', validationResult);
    }


    function loadModule(flag){
        var vals = [];
        var url = "";
        if(flag){
        	url = 'Actions/ModuleAction.php?call=getModulesBySelectedLearningPlan';
        	value = $("input[type='radio'][name='actOption']:checked").val();
            if(value == "onMarks"){
            	url += '&moduleType=quiz';
            }
            
        }else{
            $( '#learningPlanDD :selected' ).each( function( i, selected ) {
                vals[i] = $( selected ).val();
            });
            url = 'Actions/ModuleAction.php?call=getModulesBySelectedLearningPlan&ids=' + vals;
        }
        $.getJSON(url, function(data){
            var options = "";
            $("#moduleDD").html(options);
            $.each(data, function(index , value){
                 if(value.lptitle != undefined){
                    $('.chosen-select1').append("<option value='"+value.lpseq + "_" + value.id+"'>"+value.title+" ("+ value.lptitle +")</option>");
                 }else{
                    $('.chosen-select1').append("<option value='" + value.id+"'>"+value.title + "</option>");
                 }
            });
            $('.chosen-select1').trigger("chosen:updated");
            var values = "<?echo $moduleSeqs?>";
            if(values.length > 0){
                values = values.split(",")
                $('.chosen-select1').val(values).trigger("chosen:updated");
            }
        });
    }

    function saveMailMessage(e,btn){
        var editorData = $('#editor').summernote('code');
        $("#messageText").val(editorData);
        e.preventDefault();
        var moduleseqs = [];
        $( '#moduleDD :selected' ).each( function( i, selected ) {
            moduleseqs[i] = $( selected ).val();
        });
        $("#moduleSeqs").val(moduleseqs);

        var vals = [];
        $( '#learningPlanDD :selected' ).each( function( i, selected ) {
            vals[i] = $( selected ).val();
         });
        $("#lpSeqs").val(vals);

        var l = Ladda.create(btn);
        l.start();
        $('#createMessageForm').ajaxSubmit(function( data ){
            l.stop();
            var obj = $.parseJSON(data);
            var dataRow = "";
            if(btn.id == "saveBtn"){
                showResponseToastr(data,null,"createMessageForm","mainDiv");
                if(obj.success == 1){
                     window.setTimeout(function(){window.location.href = "manageMessages.php"},500);
                }
            }else{
                showResponseNotification(data,"mainDiv","createMessageForm");
            }

        })
     }
</script>