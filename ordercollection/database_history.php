<?php

session_start();
if(isset($_SESSION['user_name'])){

}else{
	header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>IAH & VB</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">
	<script src="js/jquery-1.12.4.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
<link href="css/jquery.dataTables.min.css" rel="stylesheet">
<script src="js/jquery.dataTables.min.js"></script>
<!--Icons-->
<script src="../js/bootbox.min.js"></script>
<script src="../js/lumino.glyphs.js"></script>
<script>

$(document).ready(function() {
	
	// Orders datatable
    var orderTableData=$('#orders-table').DataTable( {
		"scrollX": true,
        "processing": true,
        "serverSide": true,
		"order": [[ 1, "desc" ]],
        "ajax": "history/orders_processing.php",
		"columnDefs": [ {
            "targets": 0,
            "data": null,
            "defaultContent": "<button id='btnEditOrder' class='btn btn-primary btn-xs' style='margin-right:2px'><span class='glyphicon glyphicon-pencil'></span></button><button id='btnDeleteOrder' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></button>"
			} ]
    } );

	// Samples datatable
   var sampleTableData= $('#samples-table').DataTable( {
		"scrollX": true,
        "processing": true,
        "serverSide": true,
		"order": [[ 1, "desc" ]],
        "ajax": "history/samples_processing.php",
		"columnDefs": [ {
            "targets": 0,
            "data": null,
            "defaultContent": "<button id='btnEditSample' class='btn btn-primary btn-xs' style='margin-right:2px'><span class='glyphicon glyphicon-pencil'></span></button><button id='btnDeleteSample' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></button>"
			} ]
    } );
	
	//Edit Orders using OrderID
	$('#orders-table tbody').on( 'click', '#btnEditOrder', function () {
        var data = orderTableData.row( $(this).parents('tr') ).data();
			window.open('edit_orders/index.php?orderID='+data[1], '_blank');
    } );
	
	//Edit Sample using SampleId and Lab
	$('#samples-table tbody').on( 'click', '#btnEditSample', function () {
        var data = sampleTableData.row( $(this).parents('tr') ).data();
			window.open('edit_sample/index.php?sampleID='+data[2]+'&Lab='+data[8], '_blank');
    } );
	
	//Delete selected Order along with all the associated sample details in database
	$('#orders-table tbody').on( 'click', '#btnDeleteOrder', function () {
        var data = orderTableData.row( $(this).parents('tr') ).data();
			//window.open('edit_orders/index.php?orderID='+data[1], '_blank');
			
			bootbox.confirm({ 
			  
			  message: "Are you sure that you want to permanently delete the selected Order ?", 
			  callback: function(result){
						if(result==true){
							deleteOrder(data[1]);
							//window.reload();
						}
			  /* result is a boolean; true = OK, false = Cancel*/ }
			});
    } );
	
	
	
	function deleteOrder(orderID){
		
					$.post("edit_orders/deleteOrder.php",
					{
						orderID:orderID
					},
					function(data,status){
						if(data=="success"){
							bootbox.alert("Selected Order has been Successfull deleted !!!",function(){ location.reload();});
						}else{
							bootbox.alert("Failed to delete Order!!!");
						}
					}
					);
				
	}
} );

</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-fixed-top" style="background-color:#4977d7" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" style="color:#fffff" href="#"><b><span style="color:#fffff"><img class="img img-responsive" style="width:50px;height:50px;display:inline" src="img/logo.png"></span> &nbsp;Institute of Animal Health &amp; Veterenary Biologicals </b></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" style="margin-right:10px;" ><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg>INBOX   <span class="badge">0</span></a>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $_SESSION["user_name"];  ?> &nbsp;  <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>		
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li ><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="inbox.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> Inbox</a></li>
			<li><a href="orderEntry.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Order Entry</a></li>
			<li class="active"><a href="database_history.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Orders History</a></li>
			<li ><a href="add_species.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Species</a></li>
			<li><a href="add_sampleType.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></use></svg> Sample Type</a></li>
			<li><a href="add_tests.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></use></svg> Tests</a></li>
			<li><a href="add_diseaseNames.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></use></svg> Disease</a></li>
			<li><a href="order_state.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg> Sample Results</a></li>
			<li><a href="print_receipt.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"></use></svg> Print Document/Statement</a></li>
			
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Orders History</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Orders History </div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table id="orders-table" class="display nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Modify</th>
									<th>Order ID</th>
									<th>Appl Date</th>
									<th>CM Number</th>
									<th>Reference Number</th>
									<th>Sample Received Date</th>
									<th>Owner Name</th>
									<th>Owner Number</th>
									<th>Owner EmailID</th>
									<th>Doctor's Name</th>
									<th>Doctor's Number</th>
									<th>Doctor's EmailID</th>
									<th>State</th>
									<th>Place</th>
									<th class="display wrap">Owner Address</th>
									<th>Doctor's Address</th>
								</tr>
							</thead>
							
						</table>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Samples History </div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<table id="samples-table" class="display nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									
									<th>Modify</th>
									<th>Order ID</th>
									<th>Sample ID</th>
									<th>Accession</th>
									<th>Species</th>
									<th>Sample Type</th>
									<th>Animal Age</th>
									<th>Sex</th>
									<th>Lab</th>
									<th>Animal History</th>
								</tr>
							</thead>
							
						</table>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		
		
								
		
	</div>	<!--/.main-->


	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
