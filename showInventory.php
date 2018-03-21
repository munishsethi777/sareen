<?php
require_once ($ConstantsArray ['dbServerUrl'] . "Utils/DropdownUtil.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Properties</title>
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
	                        <h5>Inventories</h5>
	                    </div>
	                    <div class="ibox-content">
	                    	<form name="searchInventory" type="GET" action="#">
		                    	<div class="row">
		                    		<div class="form-group">
										<label class="col-sm-1 control-label">Type</label>
										<div class="col-sm-2">
											<?php echo DropDownUtils::getPropertyTypeDD("propertytype", "", "")?>
										</div>
										<label class="col-sm-1 control-label">Purpose</label>
										<div class="col-sm-2">
											<?php echo DropDownUtils::getPurposeTypeDD("purpose", "", "")?>
										</div>
										<label class="col-sm-1 control-label">Medium</label>
										<div class="col-sm-2">
												<?php echo DropDownUtils::getMediumTypeDD("medium", "", "")?>
										</div>
										<label class="col-sm-1 control-label">Facing</label>
										<div class="col-sm-2">
											<?php echo DropDownUtils::getFacingTypeDD("facing", "", "")?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<label class="col-sm-1 control-label">Stories</label>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="stories"  name="stories">
										</div>
										
										<label class="col-sm-1 control-label">Amount</label>
										<div class="col-sm-2">
											<input class="form-control" type="text"  id="amount" name="amount">
										</div>
										
										<label class="col-sm-1 control-label">Rental</label>
										<label class="col-sm-2 control-label i-checks" style="text-align: left;padding-left:15px">
											<input type="checkbox" name="isrental" id="isrental">
											
										</label> 
									</div>
		                    	</div>
	                    	</form>
	                        <div id="inventoryGrid" style="margin-top:8px"></div>
	                    </div>
	                </div>
	            </div>
        	</div>
       </div>
    </div>
    <form id="form1" name="form1" method="post" action="createInventory.php">
     	<input type="hidden" id="id" name="id"/>
   	</form>
   	<form id="form2" name="form2" method="post" action="viewInventoryDetail.php">
     	<input type="hidden" id="seq" name="seq"/>
   	</form>
   	<div id="createNewModalForm" class="modal fade" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
            	<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Property</h4>
                </div>
                <div class="modal-body mainDiv">
                    <div class="row" >
                    	<div class="col-sm-12">
                    			
                    	</div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
	</body>
</html>

	<script type="text/javascript">
        $(document).ready(function(){
           loadGrid()
           $('.i-checks').iCheck({
	        	checkboxClass: 'icheckbox_square-green',
	        	radioClass: 'iradio_square-green',
	    	});
        });
        function loadGrid(){
        	var actions = function (row, columnfield, value, defaulthtml, columnproperties) {
                data = $('#inventoryGrid').jqxGrid('getrowdata', row);
                var html = "<div style='text-align: center; margin-top:1px;font-size:18px'><a href='javascript:viewDetail("+ data['seq'] + ")' ><i class='fa fa-server' title='View Detail'></i></a>";
                    html += "</div>";
                
                return html;
            }
            var columns = [
              { text: 'id', datafield: 'seq' , hidden:true},
              { text: 'Property Type', datafield: 'propertytype', width:"10%"},
              { text: 'Area', datafield: 'propertyarea',width:"10%"},
              { text: 'PlotNumber' , datafield: 'plotnumber',width:"10%" },  
              { text: 'Address', datafield: 'address1',width:"30%"},            
              { text: 'Name', datafield: 'contactperson',width:"14%"},
              { text: 'Contact', datafield: 'contactmobile',width:"14%"},
              { text: 'View Detail', datafield: 'action',cellsrenderer:actions,width:'9%'},
              
            ]
           
            var source =
            {
                datatype: "json",
                id: 'id',
                pagesize: 20,
                datafields: [{ name: 'seq', type: 'integer' }, 
                            { name: 'plotnumber', type: 'string' }, 
                            { name: 'propertyarea', type: 'string' },
                            { name: 'propertytype', type: 'string'},
                            { name: 'address1', type: 'string'},
                            { name: 'contactperson', type: 'string'},
                            { name: 'contactmobile', type: 'string'},
                            { name: 'action', type: 'string' } 
                            ],                          
                url: 'Actions/InventoryAction.php?call=getInventories',
                root: 'Rows',
                cache: false,
                beforeprocessing: function(data)
                {        
                    source.totalrecords = data.TotalRows;
                },
                filter: function()
                {
                    // update the grid and send a request to the server.
                    $("#inventoryGrid").jqxGrid('updatebounddata', 'filter');
                },
                sort: function()
                {
                    // update the grid and send a request to the server.
                    $("#inventoryGrid").jqxGrid('updatebounddata', 'sort');
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
            $("#inventoryGrid").jqxGrid(
            {
            width: '100%',
            height: '75%',
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
                        location.href = ("createInventory.php");
                    });
                    editButton.click(function (event){
                        var selectedrowindex = $("#inventoryGrid").jqxGrid('selectedrowindexes');
                        if(selectedrowindex.length != 1){
                            bootbox.alert("Please Select single row for edit.", function() {});
                            return;    
                        }
                        var row = $('#inventoryGrid').jqxGrid('getrowdata', selectedrowindex);
                        $("#id").val(row.seq);                        
                        $("#form1").submit();                   
                        });
                     deleteButton.click(function (event) {
                    	 deleteRows("inventoryGrid","Actions/InventoryAction.php?call=deleteInventory");
                     });
                    // reload grid data.
                    reloadButton.click(function (event) {
                        $("#inventoryGrid").jqxGrid({ source: dataAdapter });
                    });
                }
            });
        }
        function viewDetail(seq){
             $("#seq").val(seq);                        
             $("#form2").submit();  
        }
</script>