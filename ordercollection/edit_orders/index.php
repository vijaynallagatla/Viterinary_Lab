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
<title>IAH &amp; VB</title>
	
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/bootstrap-table.css" rel="stylesheet">
<link href="../../css/styles.css" rel="stylesheet">
<link href="../../css/datepicker3.css" rel="stylesheet">
<script src="../../js/jquery-1.11.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script> 
<link href="../../css/myBtn.css" rel="stylesheet">
<script src="../../js/bootstrap-datepicker.js"></script>
  <script src="../../js/bootstrap-select.min.js"></script>
  <link rel="stylesheet" href="../../css/bootstrap-select.min.css"/>
  <script src="../../js/bootbox.min.js"></script>
<!--Icons-->
<script src="../../js/lumino.glyphs.js"></script>
<script>

	
	
	function loadData(orderID){
		$.post('load_order_details.php',
		{
			orderID:orderID
		},
		function(data,status){
			order=JSON.parse(data);
			el("application_date").value=order["application_date"];
			el("sample_received_date").value=order["sample_received_date"];
			el("reference_number").value=order["reference_number"];
			el("receipt_number").value=order["cm_receipt_number"];
			el("owner_name").value=order["owner_name"];
			el("owner_number").value=order["owner_number"];
			el("doctor_name").value=order["doctor_name"];
			el("doctor_number").value=order["doctor_number"];
			el("sample_state").value=order["state"];
			setState(order["state"],order["place"]);
			el("owner_address").value=order["owner_address"];
			el("doctor_address").value=order["doctor_address"];
			el("doctor_email").value=order["doctor_email_id"];
			el("owner_email").value=order["owner_email_id"];
	
		}
		);	
	}
	
	function el(id){
			return document.getElementById(id);
		}
		
			function getState(str){
		$.post("../getPlaces_list.php",
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
		
	function setState(str,str2){
		$.post("../getPlaces_list.php",
			{
				state: str
			},
			function(data, status){
				$("#sample_place")
				   .html(data)
				   .selectpicker('refresh');			
						$('#sample_place').val(str2);
						$('#sample_place').selectpicker('render');  
			}
		);
	}
	
	
	function updateOrderData(){
		bootbox.confirm({
			title: "Update Order Details",
			message: "Are sure that you want to Update the Order deatils ?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-primary'
					
				},
				cancel: {
					label: 'No',
					className: 'btn-default'
					
				}
				
			},
			callback: function (result) {
				if(result==true)
				{
					$.post("updateOrderData.php",
						{
							orderID:<?php echo $_REQUEST['orderID']; ?>,
							application_date:el("application_date").value,
							sample_received_date:el("sample_received_date").value,
							reference_number:el("reference_number").value,
							receipt_number:el("receipt_number").value,
							owner_name:el("owner_name").value,
							owner_number:el("owner_number").value,
							doctor_name:el("doctor_name").value,
							sample_state:el("sample_state").value,
							sample_place:el("sample_place").value,
							owner_address:el("owner_address").value,
							doctor_email:el("doctor_email").value,
							owner_email:el("owner_email").value,
							doctor_number: el("doctor_number").value,
							doctor_address:el("doctor_address").value
							
						},
						function(data,status){
							if(status=="success"){
								bootbox.alert("Successfully Updated Order details", function(){ window.close(); });
								
							}else{
								bootbox.alert("Failed to Update Order details");
							}
						}
					);
				}
			}
		});
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
				<a class="navbar-brand" style="color:#fffff" href="#"><b><span style="color:#fffff"><img class="img img-responsive" style="width:50px;height:50px;display:inline" src="../img/logo.png"></span> &nbsp;Institute of Animal Health &amp; Veterenary Biologicals </b></a>
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
	
	<div class="container" style="margin-top:20px">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Edit Order Information </div>
					<div class="panel-body">
						<div class="canvas-wrapper">
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
										<select  name="sample_place" class="form-control" id="sample_place">
										 <option>Nill</option>
										 <option>Null</option>
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
						
						<div>
						<center>
						
						<hr/>
						<button class="btn btn-success" onclick="updateOrderData()">Save Changes</button>
						<button class="btn btn-warning">Cancel</button>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script>
	
	loadData(<?php echo $_REQUEST['orderID']; ?>);
	</script>
</body>
</html>
