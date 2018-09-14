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
	
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/bootstrap-table.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">

<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<link href="css/jquery.dataTables.min.css" rel="stylesheet">
<script src="js/jquery.dataTables.min.js"></script>

<!--Icons-->
<script src="../js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script>

$(document).ready(function() {
    $('#data-table').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "scripts/users_server_processing.php"
    } );
} );
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
			<li><a href="ordersApproval.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Orders in Approval</a></li>
			<li class="active"><a href="user_profiles.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User Profiles</a></li>
			<li><a href="database_history.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Orders History</a></li>
			<li><a href="print_receipt.php"><svg class="glyph stroked printer"><use xlink:href="#stroked-printer"></use></svg> Print Document/Statement</a></li>
			
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Profile</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User Profiles</h1>
			</div>
		</div><!--/.row-->
				
		
			<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget ">
				<a href="#addUser" data-toggle="modal" data-target="#addUser">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">Add </div>
							
						</div>
					</div>
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">Modify </div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked paper coffee cup"><use xlink:href="#stroked-paper-coffee-cup"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">Delete</div>
							
						</div>
					</div>
				</div>
			</div>
			
		</div><!--/.row-->	
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Existing Users</div>
					<div class="panel-body">
						<table id="data-table" class="display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>User ID</th>
									<th>Name</th>
									<th>Username</th>
									<th>Designation</th>
									<th>Lab Access</th>
									<th>Contact Number</th>
									<th>Address</th>
									<th>Email</th>
									
								</tr>
							</thead>
							
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
	</div><!--/.main-->

	
	<!-- Modal -->
  <div class="modal fade" id="addUser" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="margin-left:50px">
	  <form class="fieldset" action="" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New User</h4>
        </div>
        <div class="modal-body">
          
			<div class="row">
				<div class="col-md-3">
					<label>Name</label><br/>
					<input class="form-control" type="text" placeholder="Enter FirstName, LastName" name="name"/>
				</div>
				<div class="col-md-4">
					<label>Username</label><br/>
					<input class="form-control" type="text" placeholder="Enter Username" name="username"/>
				</div>
				<div class="col-md-4">
					<label>Password</label><br/>
					<input class="form-control" type="password" placeholder="Enter Password" name="username"/>
				</div>
				
			</div>
			<br/>
			<div class="row">
				<div class="col-md-3">
					<label>Lab Access</label><br/>
					<select class="form-control">
						<option>DBM - Bacteriology</option>
						<option>DIO - Pathology</option>
						<option>DBT - Toxicology</option>
						<option>DP - Pathology</option>
						<option>SE - Sero Epidemology</option>
						<option>DV - Virology</option>
						<option> E &amp; I</option>
						<option>GD - Genetics Lab</option>
						<option>Other</option>
					</select>
				</div>
				<div class="col-md-4">
					<label>Designation</label><br/>
					<input class="form-control" type="text" placeholder="Enter Designation" name="username"/>
				</div>
				<div class="col-md-4">
					<label>Contact Number</label><br/>
					<input class="form-control" type="number" placeholder="Enter Contact number" name="username"/>
				</div>	
			</div>
			<br/>
			
			<div class="row">
				<div class="col-md-4">
					<label>Email Id</label><br/>
					<input class="form-control" type="email" placeholder="Enter Email Id, Ex: vijay@pastelloid.com" name="email"/>
				</div>
				<div class="col-md-6">
					<label>Address</label><br/>
					<textarea class="form-control" placeholder="Enter Address" cols="8"></textarea>
				</div>
				
			</div>
		
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
		  </form>
      </div>
    </div>
  </div>
  
	


	<script>
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
