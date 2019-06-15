<?php include("SessionCheck.php");
require_once ($ConstantsArray ['dbServerUrl'] . "BusinessObjects/Note.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Managers/NoteMgr.php");
$note = new Note();
if(isset($_POST["id"])){
	$id = $_POST["id"];
	$noteMgr = NoteMgr::getInstance();
	$note = $noteMgr->findBySeq($id);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create/Update Note</title>
<?include "ScriptsInclude.php"?>
	<style>
		.chosen-single{padding:4px !important;}
	</style>
</head>
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
								Create Note
							</h5>
						</div>
						<div class="ibox-content mainDiv">
							<form method="post" action="Actions/NoteAction.php" id="noteForm" class="form-horizontal">
								<input type="hidden" name="call" value="saveNote">
								<input type="hidden" name="seq" value="<?php echo $note->getSeq()?>"  >
								<div class="form-group">
									<label class="col-sm-1 control-label">Note</label>
									<div class="col-sm-10">
										<textarea rows="10" required class="form-control" id="detail" name="detail"><?php echo $note->getDetail()?></textarea>
									</div>
								</div>
								<div class="form-group">
								<div class="col-sm-4 col-sm-offset-8">
									<button class="btn btn-primary ladda-button"
										data-style="expand-right" onclick="saveNote(this)" id="saveBtn" type="button">
										<span class="ladda-label">Save</span>
									</button>
									<?php if($note->getSeq() == 0){?>
										<span id="saveNewBtnDiv"><button
												class="btn btn-primary ladda-button"
												data-style="expand-right" id="saveNewBtn" onclick="saveNote(this)" type="button">
												<span class="ladda-label">Save & New</span>
											</button></span>
									<?php }?>
									<button type="button" class="btn btn-white" onclick="cancel()" id="cancelBtn"
										data-dismiss="modal">Cancel</button>
								</div>
							</div>	
							</form>
						</div>
					</div>
				</div>	
	        </div>
        </div>
</html>

<script type="text/javascript">
function cancel(){
	location.href = "showNotes.php";
}
function saveNote(btn){
	if($("#noteForm")[0].checkValidity()) {
		var l = Ladda.create(btn);
		l.start(); 
		$('#noteForm').ajaxSubmit(function( data ){
		   l.stop(); 
		   var flag = showResponseToastr(data,null,null,"ibox");
		   if(flag){
			   $("textarea#detail").val("");
			   if(btn.id == "saveBtn"){
			   		window.setTimeout(function(){window.location.href = "showNotes.php"},100);
			   }
		   }
	    })	
	}else{
		$("#noteForm")[0].reportValidity();
	}
}
</script>