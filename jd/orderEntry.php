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
<title>IAH&amp;VB </title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">
<script src="../js/jquery-1.11.1.min.js"></script>

<script src="js/validate.js"></script>
<!--Icons-->
<script src="../js/lumino.glyphs.js"></script>
  <script src="../js/bootstrap-select.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap-select.min.css"/>
  <script src="../js/bootbox.min.js"></script>
<style>
.card1 {
	padding: 10px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	padding-right:10px;
	margin-bottom:10px;
	border-radius:1px;
	background-color:#fff;
	margin-left:15px;
	margin-right:15px;
}

</style>
<script>
var specimenCount=1;

function addNewSpecimen() {
	specimenCount++;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#addNewSample").append(this.responseText);			
            }
        };
        xmlhttp.open("GET", "addNewSpecimen.php?id="+specimenCount, true);
        xmlhttp.send();
		

    }
	
	function loadLab(){
			var labss=[];
			labss[i]=$("#lab"+i).val();
			//console.log(labss)
	}
	
	


</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<!-- Collection Order entry -->
<script>
$(document).ready(function(){
$('select').selectpicker();
});
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
			<li ><a href="ordersapproval.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Order Approval</a></li>
			<li><a href="resultFormatData.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Report Formats</a></li>
			<li class="active"><a href="orderEntry.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Order Entry</a></li>
			<li><a href="database_history.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Orders History</a></li>
			<li ><a href="add_species.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Species</a></li>
			<li><a href="add_sampleType.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></use></svg> Sample Type</a></li>
			<li><a href="add_tests.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></use></svg> Tests</a></li>
			<li><a href="add_diseaseNames.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></use></svg> Disease</a></li>
			<li><a href="annual_report.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></use></svg> Annual Report</a></li>
			
			<li><a href="order_state.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg> Sample Results</a></li>
			<li><a href="print_receipt.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"></use></svg> Print Document/Statement</a></li>
			
		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-md-offset-3 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Sample Registration</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					
					<div class="panel-heading"><use xlink:href="#stroked-email"></use></svg> Regular Sample Registration</div>
					
					<div class="panel-body">
						<form class="form-horizontal">
							<fieldset>
								
								<div class="form-group">
									<label class="col-md-3 control-label">Application Date</label>
									<div class="col-md-3">
										<div class="input-group date" data-provide="datepicker">
											<input id="application_date" type="text" class="form-control">
											<div  class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</div>
										</div>
									</div>
									<label class="col-md-3 control-label">Sample Received Date</label>
									<div class="col-md-3">
										<div class="input-group date" data-provide="datepicker">
											<input id="sample_received_date" type="text" class="form-control">
											<div  class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</div>
										</div>
									</div>
									
								</div>
							
								<div class="form-group">
									<label class="col-md-3 control-label">Reference Number</label>
									<div class="col-md-3">
									<input name="reference_number" type="text" id="reference_number" placeholder="Enter Reference Number" class="form-control">
									</div>
									<label class="col-md-3 control-label">CM/Receipt Number</label>
									<div class="col-md-3">
									<input name="receipt_number" id="receipt_number" type="text" placeholder="Enter Receipt Number" class="form-control">
									</div>
									
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Owner Name</label>
									<div class="col-md-3">
									<input name="owner_fname" id="owner_name" type="text" placeholder="FirstName, LastName" class="form-control">
									</div>
									<label class="col-md-3 control-label">Owner Ph/Mob Number</label>
									<div class="col-md-3">
									<input id="owner_number" name="owner_number"  type="number" placeholder="Enter Ph/Mob Number" class="form-control">
									</div>
									
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Doctor Name</label>
									<div class="col-md-3">
									<input name="doctor_name" id="doctor_name" type="text" placeholder="FirstName, LastName" class="form-control">
									</div>
									<label class="col-md-3 control-label">Doctor Ph/Mob Number</label>
									<div class="col-md-3">
									<input name="doctor_number" id="doctor_number" type="number" placeholder="Enter Ph/Mob Number" class="form-control">
									</div>
									
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Place</label>
									<div class="col-md-3">
									<select class="form-control" name="sample_place" id="sample_place" placeholder="Select Place">
									  <option>Bagalkote</option>
									  <option>Bannerghatta</option>
									  <option>Bengaluru</option>
									  <option>Belgaum</option>
									  <option>Bellary</option>
									  <option>Bidar</option>
									  <option>Dhawanagere</option>
									  <option>Gulbarga</option>
									  <option>Kolar</option>
									  <option>Mangalore</option>
									  <option>Mysore</option>
									  <option>Shimogga</option>
									  <option>Shira</option>
									  <option>Sirsi</option>
									  <option>Other</option>
									</select>
									</div>
									<label class="col-md-3 control-label">Address</label>
									<div class="col-md-3">
									<textarea name="sample_address" id="sample_address" type="text" placeholder="Enter Address" class="form-control"></textarea>
									</div>	
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label">Doctor email-id</label>
									<div class="col-md-3">
									<input  name="doctor_email" id="doctor_email" type="email" placeholder="Ex : vijay@pastelloid.com" class="form-control">
									</div>
									<label class="col-md-3 control-label">Owners email-id</label>
									<div class="col-md-3">
									<input  name="owner_email" id="owner_email" type="email" placeholder="Ex : vijay@pastelloid.com" class="form-control">
									</div>
									
								</div>

								<!-- Form actions -->
								
							</fieldset>
						</form>
					</div>
				</div>
				
			
			</div><!--/.col-->
			
			<div class="row">
				<div class="col-md-12">
				
					<div class="card1">
							<div style="display:inline">
							<h4 style="margin-left:15px;display:inline"><b>Specimen Details</b></h4>
							
							</div>
							<hr/>
							
								<form class="form-horizontal">
									<fieldset>
										<label style="float:right">Specimen Sample - 1</label><br/>
										<div class="form-group">
											<label class="col-md-3 control-label">Species </label>
											<div class="col-md-3">
												<select name="specimenSpecies[]" value="val" id="0" class="form-control">
													<?php include('species/list_species.php'); ?>
												</select>
											</div>
											<label class="col-md-3 control-label">Sample Type </label>
											<div class="col-md-3">
												<select name="sampleType[]" value="val" class="form-control">
													<?php include('sampleType/list_sampleType.php'); ?>
													
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Select Labs </label>
											
											<div class="col-md-3">
												<select id="lab0" name="lab[]" class="selectpicker" multiple>
													<option value="DBM">DBM</option>
													<option value="DIO">DIO</option>
													<option value="DBT">DBT</option>
													<option value="DP">DP</option>
													<option value="SE">SE</option>
													<option value="DV">DV</option>
													<option value="E&I">E&amp;I</option>
													<option value="GD">GD</option>
												</select>
											</div>	
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Animal Age</label>
											<div class="col-md-3"> 	
											<input name="animalAge[]"  type="text" placeholder="Enter Age in numbers" class="form-control">
											</div>
											<label class="col-md-3 control-label">Sex</label>
											<div class="col-md-3">
												<select name="animalSex[]" value="Male" class="form-control">
													<option>Male</option>
													<option>Female</option>
												</select>
											</div>
									
										</div>
										
										
										
										<!-- Tests Required -->

											<div class="form-group">
											<label class="col-md-3 control-label">Select Tests Required </label>
											
											<div class="col-md-6 col-lg-6">
												<select id="tests0" name="testsRequired[]" class="selectpicker" multiple>
													<?php include('tests/list_tests_required.php'); ?>
													
												</select>
											</div>	
										</div>
										
										<!-- Disease Suspected -->
											<div class="form-group">
											<label class="col-md-3 control-label">Select Disease Suspected </label>
											
											<div class="col-md-6 col-lg-6">
												<select id="tests0" name="diseaseSuspect[]" class="selectpicker" multiple>
													<?php include('disease/list_diseaseNames.php'); ?>
												</select>
											</div>	
										</div>
										
										
										
										<div class="form-group">
											<label class="col-md-3 control-label">Animal History </label>
											<div class="col-md-9"> 	
											<textarea name="animalHistory[]" placeholder="Enter the Animal History" type="text" class="form-control"></textarea>
											</div>					
									
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Accession </label>
											<div class="col-md-4"> 	
											<input name="barcode[]" placeholder="Scan the barcode" type="text" class="form-control"></textarea>
											</div>					
									
										</div>
									</fieldset>
								</form>
							
					</div><!--/ .card -->
					</div>
					</div>
					
					<div id="addNewSample">
						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card1">
							<center>
							<button class="btn btn-primary" id="addNewSpecimen" onClick="addNewSpecimen()">Add Another Record</button>
							<button data-toggle="modal" data-target="#order_submission" class="btn btn-success">Submit Orders</button>
								
							<button onclick="loadLab()" class="btn btn-warning">Reject Order</button>
							</center>
							</div>
						</div>
						
						
					
			</div>
			
										

								
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
		  
	<!-- Modal -->
<div id="order_submission" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Orders Submission</h4>
      </div>
      <div class="modal-body">
        <p>Do you really wish to submit Orders?</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="submit_orders" class="btn btn-success" data-dismiss="modal">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>
	
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
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
