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
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootbox.min.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/bootstrap-table.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
<style>
.well{
	margin-right:30px
}
.ScrollStyle
{
    max-height: 63vh;
    overflow-y: scroll;
	min-height:63vh;
}
.ScrollStyle2
{
    max-height: 73vh;
    overflow-y: auto;
	overflow-x:hidden
	
}
body, html {
  height: 100%;
}

body {
  background: #eee;
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 300;
}

.container {
  max-width: 800px;
  margin:10px auto;
}

.text-center {
  text-align: center;
}

.quote-card {
  background: #fff;
  color: #222222;
  padding: 20px;
  padding-left: 50px;
  box-sizing: border-box;
  box-shadow: 0 2px 4px rgba(34, 34, 34, 0.12);
  position: relative;
  overflow: hidden;
  min-height: 120px;
}
.quote-card p {
  font-size: 22px;
  line-height: 1.5;
  margin: 0;
  max-width: 80%;
}
.quote-card cite {
  font-size: 16px;
  margin-top: 10px;
  display: block;
  font-weight: 200;
  opacity: 0.8;
}
.quote-card:before {
  font-family: Georgia, serif;
  content: "“";
  position: absolute;
  top: 10px;
  left: 10px;
  font-size: 5em;
  color: rgba(238, 238, 238, 0.8);
  font-weight: normal;
}
.quote-card:after {
  font-family: Georgia, serif;
  content: "”";
  position: absolute;
  bottom: -110px;
  line-height: 100px;
  right: -32px;
  font-size: 25em;
  color: rgba(238, 238, 238, 0.8);
  font-weight: normal;
}
@media (max-width: 640px) {
  .quote-card:after {
    font-size: 22em;
    right: -25px;
  }
}
.quote-card.blue-card {
  background: #0078FF;
  color: #ffffff;
  box-shadow: 0 1px 2px rgba(34, 34, 34, 0.12), 0 2px 4px rgba(34, 34, 34, 0.24);
}
.quote-card.blue-card:before, .quote-card.blue-card:after {
  color: #5FAAFF;
}
.quote-card.green-card {
  background: #00970B;
  color: #ffffff;
  box-shadow: 0 1px 2px rgba(34, 34, 34, 0.12), 0 2px 4px rgba(34, 34, 34, 0.24);
}
.quote-card.green-card:before, .quote-card.green-card:after {
  color:#59E063 ;
}

.quote-card.red-card {
  background: #F61E32;
  color: #ffffff;
  box-shadow: 0 1px 2px rgba(34, 34, 34, 0.12), 0 2px 4px rgba(34, 34, 34, 0.24);
}
.quote-card.red-card:before, .quote-card.red-card:after {
  color:#F65665 ;
}

.quote-card.yellow-card {
  background: #F9A825;
  color: #222222;
  box-shadow: 0 1px 2px rgba(34, 34, 34, 0.12), 0 2px 4px rgba(34, 34, 34, 0.24);
}
.quote-card.yellow-card:before, .quote-card.yellow-card:after {
  color: #FBC02D;
}

.option
{
    background-color:#F8F9F9;
    margin-right: 10px;
	margin-top:-5px;
}

.option.active, .btn-success
{
    background-color: #AED6F1;
}

</style>
<!--Icons-->
<script src="../js/lumino.glyphs.js"></script>
<script>

update_inbox();
function update_inbox(){
	var xhttp_messageList;
if (window.XMLHttpRequest) {
    xhttp_messageList = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp_messageList = new ActiveXObject("Microsoft.XMLHTTP");
}
xhttp_messageList.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		
		//console.log(obj[0]["samples_in_approval"]);
      document.getElementById("messageList").innerHTML = this.responseText;
    }
  };
xhttp_messageList.open("POST", "inbox/list_conversation_contacts.php", true);
xhttp_messageList.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp_messageList.send();
}



$( document ).on( "click", "blockquote.option", function() {
  $(this).addClass("active").siblings().removeClass("active");
});


function load_message(id){
	var xhttp_msg;
if (window.XMLHttpRequest) {
    xhttp_msg = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp_msg = new ActiveXObject("Microsoft.XMLHTTP");
}
xhttp_msg.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("loadedMessage").innerHTML = this.responseText;		
  }
};
xhttp_msg.open("POST", "inbox/loadMessage.php?id="+id, true);
xhttp_msg.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp_msg.send();
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
				<a class="navbar-brand" style="color:#fffff" href="#"><b><span style="color:#fffff"><img class="img img-responsive" style="width:50px;height:50px;display:inline" src="../img/iahvb.png"></span> &nbsp;Institute of Animal Health &amp; Veterenary Biologicals </b></a>
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
		<li class="active"><a href="inbox.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> Inbox</a></li>
		<li><a href="orderEntry.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Order Entry</a></li>
		<li><a href="database_history.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Orders History</a></li>
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
				<li class="active">Pending Samples</li>
			</ol>
		</div><!--/.row-->
				
		
		<div class="row" >
			<div class="col-lg-12">
				<div class="panel panel-default" style="height:65vhvh;" >
					<div class="panel-heading">Pending Samples - Accept/Reject, Upload results</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<div class="pending_accessions">	
									<input type="text" placeholder="Search" class="form-control" id="searchAccession"/>
									<hr/>
								<div class="ScrollStyle">
									<div id="messageList">
										No Recent Messages
									</div>
								</div>
							</div>
							</div>
							<div class="col-md-9">
								<div class="edgecard" id="samplesDemog">
									<div class="ScrollStyle2" style="margin-right:-15px">
									<button class="btn btn-info" data-toggle="modal" data-target="#composeMessage">Compose New Message</button>
									<div style="margin-top:30px" id="loadedMessage">
										
									</div>
									
									</div>
								</div>
							</div>
						</div>
					</div>
						
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
	</div><!--/.main-->

	<!-- Sample Rejection Modal -->


<!-- Modal -->
  <div class="modal fade" id="composeMessage" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Compose New Message</h4>
        </div>
        <div class="modal-body">
          <label>Enter Recepient User ID :</label>
		  <input type="text" class="form-control" id="recepient_userID" name="name"/>
			<label>Date and Time : </label>
		  <input type="text" class="form-control" name="date"/>
			<label>Subject : </label>
		  <input type="text" id="subject" class="form-control" name="date"/>
		  <label>Message : </label>
		  <textarea class="form-control" rows="5"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success " data-dismiss="modal">Send</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>



	<script src="../js/bootstrap.min.js"></script>

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
