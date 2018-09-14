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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>

* {
	font-family: Arial, sans;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
}

h1 {
	margin: 1em 0;
	text-align: center;
}

#container {
    margin: 0 auto;
    width: 50%;  /* Ancho del contenedor */
}

#container input {
	height: 2.5em;
	visibility: hidden;
}

#container label {
	background: #f9f9f9;  /* Fondo de las pestañas */
	border-radius: .25em .25em 0 0;
	color: #888;  /* Color del texto de las pestañas */
	cursor: pointer;
	display: block;
	float: left;
	font-size: 1em;  /* Tamaño del texto de las pestañas */
	height: 2.5em;
	line-height: 2.5em;
	margin-right: .25em;
	padding: 0 1.5em;
	text-align: center;
}

#container input:hover + label {
	background: #ddd;  /* Fondo de las pestañas al pasar el cursor por encima */
	color: #666;  /* Color del texto de las pestañas al pasar el cursor por encima */
}

#container input:checked + label {
	background: #f1f1f1;  /* Fondo de las pestañas al presionar */
	color: #444; /* Color de las pestañas al presionar */
	position: relative;
	z-index: 6;
	/*
	-webkit-transition: .1s;
	-moz-transition: .1s;
	-o-transition: .1s;
	-ms-transition: .1s;
	*/
}

#content {
	background: #f1f1f1;  /* Fondo del contenido */
	border-radius: 0 .25em .25em .25em;
	min-height: 20em;  /* Alto del contenido */
	position: relative;
	width: 100%;
	z-index: 5;
}

#content div {
	opacity: 0;
	padding: 1.5em;
	position: absolute;
	z-index: -100;
	/*
	transition: all linear 0.1s;
	*/
}

#content-1 p {
	clear: both;
	margin-bottom: 1em;
}
#content-1 p.left img {
	float: left;
	margin-right: 1em;
}
#content-1 p.last {
	margin-bottom: 0;
}

#content-2 p {
	float: left;
	width: 48.5%;
}
#content-2 p.column-right {
	margin-left: 3%;
}
#content-2 p img {
	display: block;
	margin: 0 auto 1em auto;
}
#content-3 p,
#content-3 ul {
	margin-bottom: 1em;
}
#content-3 ul {
	margin-left: 2em;
}

#container input#tab-1:checked ~ #content #content-1,
#container input#tab-2:checked ~ #content #content-2,
#container input#tab-3:checked ~ #content #content-3 {
    opacity: 1;
    z-index: 100;
}

input.visible {
  visibility: visible !important;
}

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
$( document ).on( "click", "blockquote.option", function() {
  $(this).addClass("active").siblings().removeClass("active");
});



		

var fileName;
var m_barcode;
var m_sample;

update_sampleList();
function update_sampleList(){
	var xhttp_sampleList;
if (window.XMLHttpRequest) {
    xhttp_sampleList = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp_sampleList = new ActiveXObject("Microsoft.XMLHTTP");
}
xhttp_sampleList.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		
		//console.log(obj[0]["samples_in_approval"]);
      document.getElementById("samplesList").innerHTML = this.responseText;
      
    }
  };
xhttp_sampleList.open("POST", "samplesList.php", true);
xhttp_sampleList.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp_sampleList.send();
}

function acceptSample(){
	
	var xhttp;
if (window.XMLHttpRequest) {
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		
		//console.log(obj[0]["samples_in_approval"]);
      bootbox.alert(this.responseText,refreshWindow());
	  _("loadedSample").innerHTML="<center><h5>Load New Sample </h5></center>";
     
    }
  };
  
xhttp.open("POST", "acceptSample.php?barcode="+m_barcode+"&sample="+m_sample, true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send();
}

function rejectSample(){
	var rejection_reason=_("rejection_reason").value;
	var xhttp;
if (window.XMLHttpRequest) {
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		
		//console.log(obj[0]["samples_in_approval"]);
      bootbox.alert(this.responseText,refreshWindow());
	  _("loadedSample").innerHTML="<center><h5>Load New Sample </h5></center>";
      
    }
  };
  
xhttp.open("POST", "rejectSample.php?barcode="+m_barcode+"&sample="+m_sample+"&rejection_reason="+rejection_reason, true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send();
}

function refreshWindow(){
	update_sampleList();
	$( function() {
    $( "#accordion" ).accordion();
  } );
}

function load_sample(barcode,sample){
	m_barcode=barcode;
	m_sample=sample;
	
	var xhttp_sample;
if (window.XMLHttpRequest) {
    xhttp_sample = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp_sample = new ActiveXObject("Microsoft.XMLHTTP");
}
xhttp_sample.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		
		//console.log(obj[0]["samples_in_approval"]);
      document.getElementById("loadedSample").innerHTML = this.responseText;
    }
  };
xhttp_sample.open("POST", "loadSample.php?sample="+sample, true);
xhttp_sample.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp_sample.send();
}




</script>
<script>
/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
function _(el){
	return document.getElementById(el);
}

function uploadFile(){
	$("#progressbar").css("display","block")
	var file = _("file1").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	fileName=file.name;
	var formdata = new FormData();
	formdata.append("file1", file);
	formdata.append("barcode",m_barcode);
	formdata.append("sample",m_sample);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "file_upload_parser.php");
	ajax.send(formdata);
}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	
	$("#state").attr("aria-valuenow", Math.round(percent));
	$("#state").css("width", Math.round(percent)+"%");
	_("state").innerHTML= Math.round(percent)+"% Complete";
		
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
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
			<li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="inbox.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> Inbox</a></li>
			<li class="active"><a href="ordersapproval.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Order Approval</a></li>
			<li><a href="resultFormatData.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Report Formats</a></li>
			<li><a href="orderEntry.php"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Order Entry</a></li>
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
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active"> Samples in approval</li>
			</ol>
		</div><!--/.row-->
				
		
		<div class="row" >
			<div class="col-lg-12">
				<div class="panel panel-default" style="height:65vhvh;" >
					<div class="panel-heading">Samples in Approval State </div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<div class="pending_accessions">
									
									<input type="text" placeholder="Search" class="form-control" id="searchAccession"/>
									<hr/>
								<div class="ScrollStyle">
									<div id="samplesList">
									
									</div>
								
							
								</div>
							</div>
							</div>
							<div class="col-md-9">
								<div class="edgecard" id="samplesDemog">
									<div class="ScrollStyle2" style="margin-right:-15px">
									<div id="loadedSample">
										
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
<div id="sampleRejection" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Specimen Sample Rejection</h4>
      </div>
      <div class="modal-body">
        <p>Enter the valid reasons for Rejecting the Specimen Sample.</p>
		<input type="text" class="form-control" id="rejection_reason"/>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="rejectSample()" class="btn btn-info" data-dismiss="modal">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
Try it Yourself »


	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/bootstrap-table.js"></script>
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
