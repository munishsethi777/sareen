<?include("SessionCheck.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Notes</title>
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
	                        <div id="noteGrid"></div>
	                    </div>
	                </div>
	            </div>
        	</div>
       </div>
    </div>
    <form id="form1" name="form1" method="post" action="createNote.php">
     	<input type="hidden" id="id" name="id"/>
   	</form>
  </body>
</html>

	<script type="text/javascript">
	 isSelectAll = false;
        $(document).ready(function(){
           loadGrid()
        });
        function loadGrid(){
		    var columns = [
              { text: 'id', datafield: 'seq' , hidden:true},
              { text: 'Note', datafield: 'detail', width:"82%"},
              { text: 'Modified', datafield: 'lastmodifiedon',cellsformat: 'd-M-yyyy hh:mm tt',width:"13%"}
            ]
           
            var source =
            {
                datatype: "json",
                id: 'id',
                pagesize: 20,
                sortcolumn: 'lastmodifiedon',
                sortdirection: 'desc',
                datafields: [{ name: 'seq', type: 'integer' }, 
                            { name: 'detail', type: 'string' }, 
                            { name: 'lastmodifiedon', type: 'date'},
                            { name: 'action', type: 'string' } 
                            ],                          
                url: 'Actions/NoteAction.php?call=getNotes',
                root: 'Rows',
                cache: false,
                beforeprocessing: function(data)
                {        
                    source.totalrecords = data.TotalRows;
                },
                filter: function()
                {
                    // update the grid and send a request to the server.
                    $("#noteGrid").jqxGrid('updatebounddata', 'filter');
                },
                sort: function()
                {
                    // update the grid and send a request to the server.
                    $("#noteGrid").jqxGrid('updatebounddata', 'sort');
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
            $("#noteGrid").jqxGrid(
            {
            	width: '100%',
    			height: '75%',
    			source: dataAdapter,
    			filterable: true,
    			sortable: true,
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
    			rendergridrows: function (toolbar) {
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
                        location.href = ("createNote.php");
                    });
                    editButton.click(function (event){
                        var selectedrowindex = $("#noteGrid").jqxGrid('selectedrowindexes');
                        var value = -1;
                        indexes = selectedrowindex.filter(function(item) { 
                            return item !== value
                        })
                        if(indexes.length != 1){
                            bootbox.alert("Please Select single row for edit.", function() {});
                            return;    
                        }
                        var row = $('#noteGrid').jqxGrid('getrowdata', indexes);
                        $("#id").val(row.seq);                        
                        $("#form1").submit();                   
                        });
                     deleteButton.click(function (event) {
                    	 deleteRows("noteGrid","Actions/NoteAction.php?call=deleteNotes");
                     });
                     $("#noteGrid").bind('rowselect', function (event) {
                         var selectedRowIndex = event.args.rowindex;
                          var pageSize = event.args.owner.rows.records.length - 1;                       
                         if($.isArray(selectedRowIndex)){           
                             if(isSelectAll){
                                 isSelectAll = false;    
                             } else{
                                 isSelectAll = true;
                             }                                                                     
                             $('#noteGrid').jqxGrid('clearselection');
                             if(isSelectAll){
                                 for (i = 0; i <= pageSize; i++) {
                                     var index = $('#noteGrid').jqxGrid('getrowboundindex', i);
                                     $('#noteGrid').jqxGrid('selectrow', index);
                                 }    
                             }
                         }                        
                    });
                    // reload grid data.
                    reloadButton.click(function (event) {
                        $("#noteGrid").jqxGrid({ source: dataAdapter });
                    });
                }
            });
        }
        function viewDetail(seq){
             $("#seq").val(seq);  
             $("#detailMode").val(true);                      
             $("#form2").submit();  
        }

        
</script>