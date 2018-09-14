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
<link href="../css/bootstrap-datepicker3.standalone.css" rel="stylesheet">

<script src="../js/jquery-1.9.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<link href="../css/styles.css" rel="stylesheet">
	<script src="../js/bootstrap-datepicker.js"></script>
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

#load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("img/loading.gif") no-repeat center center rgba(0,0,0,0.25)
}

.btn {
    
    border: 0 none;
    font-weight: 400;
    letter-spacing: 1px;
    text-transform: uppercase;
}
 
.btn:focus, .btn:active:focus, .btn.active:focus {
    outline: 0 none;
}
 
 
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active{
    background: #33a6cc;
}
 
.btn-primary:active, .btn-primary.active {
    background: #007299;
    box-shadow: none;
}

.btn-success {
	background: #008080;
	padding: 10px 20px;
	font-weight:700;
	border-radius: 24px;
}
.btn-info {
	padding: 10px 20px;
	font-weight:700;
	background: #5DADE2;
	border-radius: 24px;
}
.btn-warning {
	padding: 10px 20px;
	font-weight:700;
	background: #E74C3C;
	border-radius: 24px;
}


</style>
<script>

 $('.datepicker').datepicker();

document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
      document.getElementById('contents').style.visibility="hidden";
	  //  $("#contents").css("visibility", "hidden");
  } else if (state == 'complete') {
      setTimeout(function(){
		
         document.getElementById('interactive');
		// $("#load").css("visibility", "hidden");
         // $("#contents").css("visibility", "visible");
		 document.getElementById('load').style.visibility="hidden";
        document.getElementById('contents').style.visibility="visible";
      },1000);
  }
}
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
	
	function getState(str){
		$.post("getPlaces_list.php",
    {
        state: str.value
    },
    function(data, status){
	$("#sample_place")
       .html(data)
       .selectpicker('refresh');
	}
	);
	}


	   
</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<!-- Collection Order entry -->

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
			<li ><a href="inbox.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> Inbox</a></li>
			<li  class="active"><a href="orderEntry.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Order Entry</a></li>
			
			<li><a href="database_history.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Orders History</a></li>
			<li ><a href="add_species.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Species</a></li>
			<li><a href="add_sampleType.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></use></svg> Sample Type</a></li>
			<li><a href="add_tests.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></use></svg> Tests</a></li>
			<li><a href="add_diseaseNames.php"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></use></svg> Disease</a></li>
			<li><a href="order_state.php"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg> Sample Results</a></li>
			<li><a href="print_receipt.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"></use></svg> Print Document/Statement</a></li>
			
		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-md-offset-3 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Order Entry</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					
					<div class="panel-heading"><use xlink:href="#stroked-email"></use></svg> Orders Registration</div>
					
					<div class="panel-body">
						<form class="form-horizontal">
							<fieldset>
								
								<div class="form-group">
									<label class="col-md-3 control-label">Application Date</label>
									<div class="col-md-3">
										<div class="input-group date" data-provide="datepicker">
											<input id="application_date" class="form-control">
											<div  class="input-group-addon">
												<span class="glyphicon glyphicon-th"></span>
											</div>
										</div>
									</div>
									<label class="col-md-3 control-label">Sample Received Date</label>
									<div class="col-md-3">
										<div class="input-group date" data-provide="datepicker">
											<input id="sample_received_date" type="text" class="form-control">
											<div  class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
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
									<label class="col-md-3 control-label">State</label>
									<div class="col-md-3">
										<select class="form-control" name="sample_state" onchange="getState(this)" id="sample_state" placeholder="Select Place">
										  <option value="Nill">Nill</option>
										  <option value="AndhraPradesh">Andhra Pradesh</option>
										  <option value="ArunachalPradesh">Arunachal Pradesh</option>
										  <option value="Assam">Assam</option>
										  <option value="Bihar">Bihar</option>
										  <option value="Chhattisgarh">Chhattisgarh</option>
										  <option value="Goa">Goa</option>
										  <option value="Gujarat">Gujarat</option>
										  <option value="Haryana">Haryana</option>
										  <option value="HimachalPradesh">Himachal Pradesh</option>
										  <option value="JammuKashmir">Jammu & Kashmir</option>
										  <option value="Jharkhand">Jharkhand</option>
										  <option value="Karnataka">Karnataka</option>
										  <option value="Kerala">Kerala</option>
										  <option value="MadhyaPradesh">Madhya Pradesh</option>
										  <option value="Maharashtra">Maharashtra</option>
										  <option value="Manipur">Manipur</option>
										  <option value="Meghalaya">Meghalaya</option>
										  <option value="Mizoram">Mizoram</option>
										  <option value="Nagaland">Nagaland</option>
										  <option value="Odisha">Odisha</option>
										  <option value="Punjab">Punjab</option>
										  <option value="Rajasthan">Rajasthan</option>
										  <option value="Sikkim">Sikkim</option>
										  <option value="TamilNadu">Tamil Nadu</option>
										  <option value="Telangana">Telangana</option>
										  <option value="Tripura">Tripura</option>
										  <option value="UttarPradesh">Uttar Pradesh</option>
										  <option value="Uttarkhand">Uttarkhand</option>
										  <option value="WestBengal">West Bengal</option>
									</select>
									</div>
									<label class="col-md-3 control-label">Place</label>
									<div class="col-md-3">
										<select  name="sample_place" class="selectpicker" id="sample_place">
										 <option>Nill</option>
										</select>
									</div>	
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Owners Address</label>
									<div class="col-md-3">
										<textarea name="owner_address" id="owner_address" type="text" placeholder="Enter Owner's Address" class="form-control"></textarea>
									</div>
									<label class="col-md-3 control-label">Doctors Address</label>
									<div class="col-md-3">
										<textarea name="doctor_address" id="doctor_address" type="text" placeholder="Enter Doctor's or Reference Address" class="form-control"></textarea>
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
												<select name="sampleType[]"  value="val" class="form-control">
													<?php include('sampleType/list_sampleType.php'); ?>
													
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Select Labs </label>
											
											<div class="col-md-6">
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
												<select name="animalSex[]" class="selectpicker">
													<option value="Nil">Nil</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
									
										</div>
										
										
										
										<!-- Tests Required -->

											<div class="form-group">
											<label class="col-md-3 control-label">Select Tests Required </label>
											
											<div class="col-md-6 col-lg-6" >
												<select id="testsRequired0" name="testsRequired[]" data-width="50%"style="min-width:400px" class="selectpicker" multiple>
													<?php include('tests/list_tests_required.php'); ?>
													
												</select>
											</div>	
										</div>
										
										<!-- Disease Suspected -->
											<div class="form-group">
											<label class="col-md-3 control-label">Select Disease Suspected </label>
											
											<div class="col-md-6 col-lg-6">
												<select id="diseaseSuspected0" name="diseaseSuspected[]" data-width="50%" class="selectpicker" multiple>
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
							<div class="card1" style="padding:20px">
							<center>
							<button data-toggle="modal" data-target="#order_submission" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Submit Orders</button>
							<button class="btn btn-info" id="addNewSpecimen" onClick="addNewSpecimen()"><span class="glyphicon glyphicon-plus"></span> Add Another Sample</button>
							<button onclick="loadLab()" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span> Reject Order</button>
							
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
        <button type="button" id="submit_orders" class="btn btn-success round " data-dismiss="modal">Submit</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>
	
	 <div id="load"></div>

	
	<script>
$(document).ready(function () {
                
                $('#application_date').datepicker({
                    format: "dd-mm-yyyy"
                });  
            
            });
	</script>
</body>

</html>
