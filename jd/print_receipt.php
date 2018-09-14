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
<link href="../css/bootstrap-table.css" rel="stylesheet">
<!--Icons-->

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap-table.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	
	<script src="../js/bootstrap-datepicker.js"></script>

<script src="../js/lumino.glyphs.js"></script>
<script src="../js/bootbox.min.js"></script>
<style>
.circular-card{
	background-color:#fff;
	padding: 10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);	
	padding-right:10px;	
	margin-bottom:10px;	
	border-radius: 6px ;
}

.card{
	background-color:#fff;
	padding: 10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);	
	padding-right:10px;	
	margin-bottom:10px;	
	 
}
</style>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script>
function searchResults(){
var radios = document.querySelectorAll('input[type="radio"]:checked');
var value = radios.length>0? radios[0].value: null;
    // do something here
	console.log(value);
	switch(value){
		case "receiptNo" : 
			$.post("print/result_byReceiptNo.php",
			{
				receipt_no: document.getElementById("query").value
			},
			function(data, status){
				document.getElementById("results").innerHTML=data;
			});
		
		break;
		case "accession" : 
		$.post("print/result_byAccessionNo.php",
			{
				accession: document.getElementById("query").value
			},
			function(data, status){
				document.getElementById("results").innerHTML=data;
			});
		
		break;
		case "appRefNo"	 : 
		$.post("print/result_byAppRefNo.php",
			{
				appRefNo: document.getElementById("query").value
			},
			function(data, status){
				document.getElementById("results").innerHTML=data;
			});
		
		break;
		
		default : bootbox.alert("Kindly Select the preferred search criteria");
	}
}

function viewReport(s){
window.open('viewReport.php?lab_id='+s);
}
</script>
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
			<li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="inbox.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> Inbox</a></li>
			<li><a href="ordersapproval.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Order Approval</a></li>
			<li><a href="resultFormatData.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Report Formats</a></li>
			<li><a href="orderEntry.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Order Entry</a></li>
			<li><a href="database_history.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Orders History</a></li>
			<li ><a href="add_species.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Species</a></li>
			<li><a href="add_sampleType.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></use></svg> Sample Type</a></li>
			<li><a href="add_tests.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></use></svg> Tests</a></li>
			<li ><a href="add_diseaseNames.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></use></svg> Disease</a></li>
			<li><a href="annual_report.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></use></svg> Annual Report</a></li>
			
			<li><a href="order_state.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg> Sample Results</a></li>
			<li class="active"><a href="print_receipt.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"></use></svg> Print Document/Statement</a></li>
			
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Print Sample Reports</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"> View / Print Reports</h1>
			</div>
		</div><!--/.row-->
		
		<!-- Div Search -->
		<div class="row"> <!--Row -->
			<div class="col-lg-12">
				<div class="circular-card">
					<div style="padding:20px">
					
						 <label class="radio-inline">
						  <input type="radio" name="optradio" value="appRefNo">Application Ref. No.
						</label>
						<label class="radio-inline">
						  <input type="radio" name="optradio" value="receiptNo">CM/REceipt No.
						</label>
						<label class="radio-inline">
						  <input type="radio" name="optradio" value="accession">Accession/Barcode
						</label>
						<br/><br/>
						<input type="text" class="form-control " id="query" style="width:30%;display:inline;margin-right:20px" placeholder=""/><button class="btn btn-md btn-primary" onclick="searchResults()"><span class="glyphicon glyphicon-search"></span> Search </button>
				
					</div>
				</div>
			</div><!--Col-->
		</div><!--/ .row -->
		
		<!-- Div Search Results-->
		<div class="row"> <!--Row -->
			<div class="col-lg-12">
				<div class="circular-card">
					<div id="results">
						
					
					</div>
				</div>
			</div><!--Col-->
		</div><!--/ .row -->
		
		
		
								
		
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
