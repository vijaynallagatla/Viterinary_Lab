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
<link href="css/jquery.dataTables.min.css" rel="stylesheet">
<script src="js/jquery.dataTables.min.js"></script>
<!--Icons-->
<script src="../js/bootbox.min.js"></script>
<script src="../js/lumino.glyphs.js"></script>
<script>

$(document).ready(function() {
    var table=$('#data-table').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "scripts/server_processing.php",
		"columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button class='btn btn-primary btn-xs'>Edit</button>"
        } ]
    } );
	
	$('#data-table tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        bootbox.alert( 
		
		data[0] +"'s salary is: " 
		
		);
    } );
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
		<li><a href="pending_samples.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Pending Samples</a></li>			
		<li><a href="sample_result_format.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Report Result Format</a></li>
		<li class="active"><a href="database_history.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Submitted Samples</a></li>
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
				<h1 class="page-header">Orders History</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<table id="data-table" class="display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Sample Id</th>
									<th>Accession</th>
									<th>Species</th>
									<th>Sample Type</th>
									<th>Animal Age</th>
									<th>Sex</th>
									<th>Operation</th>
									
								</tr>
							</thead>
							
						</table>
						
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
		
		
								
		
	</div>	<!--/.main-->


	
</body>

</html>
