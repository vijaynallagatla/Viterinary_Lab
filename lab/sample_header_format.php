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
<link href="../css/styles.css" rel="stylesheet">
	<script src="js/jquery-1.12.4.js"></script>
	<script src="../js/bootstrap.min.js"></script>

<script src="../js/bootbox.min.js"></script>
<!--Icons-->
<script src="../js/lumino.glyphs.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="editor/editor.css" type="text/css" rel="stylesheet"/>
	<script src="editor/editor.js"></script>
<script>

function _el(element){
	return document.getElementById(element);
}

$.get( "resultFormatData.php", function( data ) {
  _el("sampleFormat").innerHTML=data;
});


function viewFormat(format_id){
	$.get( "viewResultFormat.php?format_id="+format_id, function( data ) {
		bootbox.alert(data);
	});
}

function deleteFormat(format_id){
	$.get( "deleteResultFormat.php?format_id="+format_id, function( data ) {
		bootbox.alert(data);
		window.location.reload();
	});
}

var editor;
			$(document).ready(function() {
				var editor = $("#editorResultFormat").Editor();
			});
function addNewFormat(){
		$.post("addNewFormat.php",
    {
        formatName: document.getElementById("formatName").value,
		resultFormat: $("#editorResultFormat").Editor("getText")
    },
    function(data, status){
		bootbox.alert(data);
    });
}
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
			<li><a href="pending_samples.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Pending Samples</a></li>
			<li class="active"><a href="sample_result_format.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Sample Result Format</a></li>
			<li><a href="database_history.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Submitted Samples</a></li>
			<li><a href="print_receipt.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"></use></svg> Print Document/Statement</a></li>
			
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Sample Result Format</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sample Result Format</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-5">
				<div class="panel panel-teal panel-widget ">
				<a href="#addNewFormat" data-toggle="modal" data-target="#addNewFormat">
					<div class="row no-padding">
						<div class="col-sm-6 col-lg-2 widget-left">
							<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>
						</div>
						<div class="col-sm-9 col-lg-6 widget-right">
							<div class="large">Add New Format</div>
							
						</div>
					</div>
					</a>
				</div>
			</div>
			
			
		</div><!--/.row-->	
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div id="sampleFormat">
							
						</div>
						
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
		
		
		
								
		
	</div>	<!--/.main-->
	
	
	<!-- Modal -->
<div id="addNewFormat" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Format</h4>
      </div>
      <div class="modal-body">
        <p>Create new Specimen result format using this tool.</p>
		
		<label> Enter Format Name </label><input type="text" class="form-control" id="formatName" Placeholder="Enter the format name here..." required/>
		<div class="container-fluid">
			<div class="row">
				<div class="container-fluid" style="margin-right:10px">
					<div class="row">
						<div class="col-lg-12 nopadding">
							<textarea id="editorResultFormat" style="overflow-x: scroll;"></textarea> 
						</div>
					</div>
				</div>
			</div>
		</div> 
      </div>
	
      <div class="modal-footer">
        <button type="submit" onClick="addNewFormat()" class="btn btn-primary">Add </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>

</html>

