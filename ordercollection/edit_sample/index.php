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
					<div class="panel-heading">Edit Sample Information </div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<form class="form-horizontal">
									<fieldset>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Species </label>
											<div class="col-md-3">
												<select name="specimenSpecies" id="specimenSpecies" value="val" id="0" class="form-control">
													<?php include('../species/list_species.php'); ?>
												</select>
											</div>
											<label class="col-md-3 control-label">Sample Type </label>
											<div class="col-md-3">
												<select name="sampleType" id="sampleType" value="val" class="form-control">
													<?php include('../sampleType/list_sampleType.php'); ?>
													
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Select Labs </label>
											
											<div class="col-md-3">
												<select id="lab" name="lab" class="form-control" >
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
											<input name="animalAge" id="animalAge" type="text" placeholder="Enter Age in numbers" class="form-control">
											</div>
											<label class="col-md-3 control-label">Sex</label>
											<div class="col-md-3">
												<select name="animalSex" id="animalSex" class="form-control">
													<option value="Nil">Nil</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
									
										</div>
										
										
										
						
										
										
										<div class="form-group">
											<label class="col-md-3 control-label">Animal History </label>
											<div class="col-md-9"> 	
											<textarea name="animalHistory" id="animalHistory" placeholder="Enter the Animal History" type="text" class="form-control"></textarea>
											</div>					
									
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Accession </label>
											<div class="col-md-4"> 	
											<input name="barcode" id="barcode" placeholder="Scan the barcode" type="text" class="form-control"></textarea>
											</div>					
									
										</div>
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
