<?include("sessioncheck.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Utils/DropdownUtil.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Enquiries</title>
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
	                <div class="ibox">
	                    <div class="ibox-title">
	                    	 <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
								<a class="navbar-minimalize minimalize-styl-2 btn btn-primary "
									href="#"><i class="fa fa-bars"></i> </a>
							</nav>
	                        <h5>Enquiries</h5>
	                    </div>
	                    <div class="ibox-content">
	                    	
		                    	<div class="row">
		                    		<div class="form-group">
										<label class="col-sm-1 control-label">Type</label>
										<div class="col-sm-2">
											<?php echo DropDownUtils::getPropertyTypeDD("propertytype", "", "",true)?>
										</div>
										<label class="col-sm-1 control-label">Purpose</label>
										<div class="col-sm-2">
											<?php echo DropDownUtils::getPurposeTypeDD("purpose", "", "",true)?>
										</div>
										<label class="col-sm-1 control-label">Facing</label>
										<div class="col-sm-2">
											<?php echo DropDownUtils::getFacingTypeDD("facing", "", "",true)?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<label class="col-sm-1 control-label">Amount</label>
											<div class="col-sm-2">
												<input class="form-control" type="text"  id="expectedamount" name="expectedamount">
											</div>
											
											<label class="col-sm-1 control-label">Rental</label>
											<label class="col-sm-1 control-label i-checks" style="text-align: left;padding-left:15px">
												<input type="checkbox" name="isrental" id="isrental">
												
											</label> 
											<label class="col-sm-1 control-label">Fullfilled</label>
											<label class="col-sm-1 control-label i-checks" style="text-align: left;padding-left:15px">
												<input type="checkbox" name="isfullfilled" id="isfullfilled">
											</label> 
									</div>
		                    	</div>
	                    	
	                        <div id="enqueryGrid" style="margin-top:8px"></div>
	                    </div>
	                </div>
	            </div>
        	</div>
       </div>
    </div>
    <form id="form1" name="form1" method="post" action="createEnquiry.php">
     	<input type="hidden" id="id" name="id"/>
   	</form>
   	<form id="form2" name="form2" method="post" action="viewEnquiryDetail.php">
     	<input type="hidden" id="seq" name="seq"/>
   	</form>
  </body>
</html>

	<script type="text/javascript">
	   
        $(document).ready(function(){
           loadGrid()
           $('.i-checks').iCheck({
	        	checkboxClass: 'icheckbox_square-green',
	        	radioClass: 'iradio_square-green',
	    	});
           var applyFilter = function (datafield) {
        	   $("#enqueryGrid").jqxGrid('clearfilters');
        	   $("#enqueryGrid").jqxGrid('clear');
        	   var filtertype = 'stringfilter';
               if (datafield == 'date') filtertype = 'datefilter';
               if (datafield == 'price' || datafield == 'quantity') filtertype = 'numericfilter';
               var filtergroup = new $.jqx.filter();
               var filterData = getFilterQueryData();
               $.each(filterData, function( key, value ) {
                   if(value != null && value != "" && value != "all"){
	            	   var filter_or_operator = 1;
	                   var filtervalue = value;
	                   var filtercondition = 'contains';
	                   var filter = filtergroup.createfilter(filtertype, filtervalue, filtercondition);
	                   filtergroup.addfilter(filter_or_operator, filter);
	                   // add the filters.
	                   $("#enqueryGrid").jqxGrid('addfilter', key, filtergroup);
                   }
               });
              
               
               // apply the filters.
               $("#enqueryGrid").jqxGrid('applyfilters');
           }
           
           // applies the filter.
           $("#propertytype").change(function () {
        	   applyFilter("propertytype")
           });
           $("#purpose").change(function () {
        	   applyFilter("purpose")
           });
          
           $("#facing").change(function () {
        	   applyFilter("facing")
           });
           $("#expectedamount").change(function () {
        	   applyFilter("expectedamount")
           });
           $('#isrental').on('ifChanged', function(event){
        	   applyFilter("isrental")
     		});
           $('#isfullfilled').on('ifChanged', function(event){
        	   applyFilter("isavailable")
     		});
        });
        
        function filterCall(dataField){
            applyFilter(dataField);
        }

		function getFilterQueryData(){
			var propertyType = $("#propertytype").val();
			var purpose = $("#purpose").val();
			var facing = $("#facing").val();
			var expectedAmount = $("#expectedamount").val();
			var isRentalChecked =$("input[type='checkbox'][name='isrental']:checked").val()
			var isrental = "";
			if(isRentalChecked == "on"){
				isrental = "1"
			} 
			var isFullfilledChecked =$("input[type='checkbox'][name='isfullfilled']:checked").val()
			var isFullfilled = "";
			if(isFullfilledChecked == "on"){
				isFullfilled = "1"
			} 
			var data = {propertytype: propertyType, purpose: purpose,facing: facing,expectedamount:expectedAmount,isrental:isrental,isfullfilled:isFullfilled};
			return data
		}
        
        function loadGrid(){
			$("#enqueryGrid").bind('bindingcomplete', function (event) {
        		
        	});
        	var actions = function (row, columnfield, value, defaulthtml, columnproperties) {
                data = $('#enqueryGrid').jqxGrid('getrowdata', row);
                var html = "<div style='text-align: center; margin-top:1px;font-size:18px'><a href='javascript:viewDetail("+ data['seq'] + ")' ><i class='fa fa-server' title='View Detail'></i></a>";
                    html += "</div>";
                
                return html;
            }
            var columns = [
              { text: 'id', datafield: 'seq' , hidden:true},
              { text: 'Type', datafield: 'propertytype', width:"7%"},
              { text: 'Purpose', datafield: 'purpose', hidden:true,width:"10%"},
              { text: 'Facing', datafield: 'facing', hidden:true,width:"10%"},
              { text: 'Amount', datafield: 'expectedamount', hidden:true,width:"10%"},
              { text: 'Rental', datafield: 'isrental', hidden:true,width:"10%"},
              { text: 'Fullfilled', datafield: 'isfullfilled', hidden:true,width:"10%"},
              { text: 'Area', datafield: 'propertyarea',width:"5%"},
              { text: 'Address', datafield: 'address',width:"28%"},            
              { text: 'Name', datafield: 'contactperson',width:"12%"},
              { text: 'Contact', datafield: 'contactmobile',width:"10%"},
              { text: 'Modified', datafield: 'lastmodifiedon',cellsformat: 'd-M-yyyy hh:mm tt',width:"13%"},
              { text: 'Created', datafield: 'createdon',cellsformat: 'd-M-yyyy hh:mm tt',width:"13%"},
              { text: 'Detail', datafield: 'action',cellsrenderer:actions,width:'5%'},
              
            ]
           
            var source =
            {
                datatype: "json",
                id: 'id',
                pagesize: 20,
                sortcolumn: 'lastmodifiedon',
                sortdirection: 'desc',
                datafields: [{ name: 'seq', type: 'integer' }, 
                            { name: 'plotnumber', type: 'string' }, 
                            { name: 'propertyarea', type: 'string' },
                            { name: 'purpose', type: 'string' },
                            { name: 'facing', type: 'string' },
                            { name: 'expectedamount', type: 'integer' },
                            { name: 'isrental', type: 'integer' },
                            { name: 'isfullfilled', type: 'integer' },
                            { name: 'propertytype', type: 'string'},
                            { name: 'address', type: 'string'},
                            { name: 'contactperson', type: 'string'},
                            { name: 'contactmobile', type: 'string'},
                            { name: 'lastmodifiedon', type: 'date'},
                            { name: 'createdon', type: 'date'},
                            { name: 'action', type: 'string' } 
                            ],                          
                url: 'Actions/EnquiryAction.php?call=getEnquiries',
                root: 'Rows',
                cache: false,
                beforeprocessing: function(data)
                {        
                    source.totalrecords = data.TotalRows;
                },
                filter: function()
                {
                    // update the grid and send a request to the server.
                    $("#enqueryGrid").jqxGrid('updatebounddata', 'filter');
                },
                sort: function()
                {
                    // update the grid and send a request to the server.
                    $("#enqueryGrid").jqxGrid('updatebounddata', 'sort');
                },
                addrow: function (rowid, rowdata, position, commit) {
                    commit(true);
                },
                deleterow: function (rowid, commit) {
                    commit(true);
                },
                updaterow: function (rowid, newdata, commit) {
                    commit(true);
                }
            };
            
            var dataAdapter = new $.jqx.dataAdapter(source);
            // initialize jqxGrid
            $("#enqueryGrid").jqxGrid(
            {
            width: '100%',
            height: '90%',
            source: dataAdapter,
            sortable: true,            
            filterable: true,
            autoshowfiltericon: true,
            columns: columns,
            pageable: true,
            altrows: true,
            enabletooltips: true,
            columnsresize: true,
            columnsreorder: true,
            selectionmode: 'checkbox',
            showstatusbar: true,   
            virtualmode: true,   
            rendergridrows: function()
            {
                  return dataAdapter.records;     
            },
                renderstatusbar: function (statusbar) {
                    // appends buttons to the status bar.
                    var container = $("<div style='overflow: hidden; position: relative; margin: 5px;height:30px'></div>");
                    var addButton = $("<div style='float: left; margin-left: 5px;'><i class='fa fa-plus-square'></i><span style='margin-left: 4px; position: relative;'>Add</span></div>");
                    var deleteButton = $("<div style='float: left; margin-left: 5px;'><i class='fa fa-times-circle'></i><span style='margin-left: 4px; position: relative;'>Delete</span></div>");
                    var editButton = $("<div style='float: left; margin-left: 5px;'><i class='fa fa-edit'></i><span style='margin-left: 4px; position: relative;'>Edit</span></div>");
                    var reloadButton = $("<div style='float: left; margin-left: 5px;'><i class='fa fa-refresh'></i><span style='margin-left: 4px; position: relative;'>Reload</span></div>");

                    container.append(addButton);
                    container.append(editButton);
                    container.append(deleteButton);
                    container.append(reloadButton);
                    statusbar.append(container);
                    addButton.jqxButton({  width: 65, height: 18 });
                    deleteButton.jqxButton({  width: 65, height: 18 });
                    editButton.jqxButton({  width: 65, height: 18 });
                    reloadButton.jqxButton({  width: 70, height: 18 });
                    // create new row.
                    addButton.click(function (event) {
                        location.href = ("createEnquiry.php");
                    });
                    editButton.click(function (event){
                        var selectedrowindex = $("#enqueryGrid").jqxGrid('selectedrowindexes');
                        if(selectedrowindex.length != 1){
                            bootbox.alert("Please Select single row for edit.", function() {});
                            return;    
                        }
                        var row = $('#enqueryGrid').jqxGrid('getrowdata', selectedrowindex);
                        $("#id").val(row.seq);                        
                        $("#form1").submit();                   
                        });
                     deleteButton.click(function (event) {
                    	 deleteRows("enqueryGrid","Actions/EnquiryAction.php?call=deleteEnquiry");
                     });
                    // reload grid data.
                    reloadButton.click(function (event) {
                        $("#enqueryGrid").jqxGrid({ source: dataAdapter });
                    });
                }
            });
        }
        function viewDetail(seq){
             $("#seq").val(seq);                        
             $("#form2").submit();  
        }

        
</script>