<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>IAH&amp;VB</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<style>
.copyright { min-height:20px; background-color:#4877d7;bottom:0;}
.copyright p { text-align:left; color:#FFF; padding:10px 0; margin-bottom:0px;}
.heading7 { font-size:21px; font-weight:700; color:#d9d6d6; margin-bottom:22px;}
.post p { font-size:12px; color:#FFF; line-height:20px;}
.post p span { display:block; color:#8f8f8f;}
.bottom_ul { list-style-type:none; float:right; margin-bottom:0px;}
.bottom_ul li { float:left; line-height:30px;}
.bottom_ul li:after { content:"/"; color:#FFF; margin-right:8px; margin-left:8px;}
.bottom_ul li a { color:#FFF;  font-size:12px;}

body{
overflow-x:hidden;
}
form {
border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
width: 100%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
box-sizing: border-box;
}

button {
background-color: #4877d7;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 100%;
}

button:hover {
opacity: 0.8;
}

.cancelbtn {
width: auto;
padding: 10px 18px;
background-color: #f44336;
}

.imgcontainer {
text-align: center;
margin: 24px 0 12px 0;
}

img.avatar {
width: 40%;
border-radius: 50%;
}

.container {
padding: 16px;
}

span.psw {
float: right;
padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
span.psw {
display: block;
float: none;
}
.cancelbtn {
width: 100%;
}
}
</style>

</head>

<body>
<div class="row" style="background-color:#4877d7;margin-top:-50px">

<div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" style="padding-left:30px;"><a href="#"><img class="img-responsive" src="img/logo-iahvb.png" alt="Logo"></a></td>
<center><td align="center" style="align:center"><img class="img-responsive" src="img/iahvb-header.jpg" alt="Logo"></td></center>
<td align="right" style="padding-right:60px;"><a href="#" target="_blank"><img class="img-responsive" src="img/institute-logo.png" alt="Logo"></a></td>
</tr>
</table>

</div>
</div>
<div class="row card" style="margin:auto;width:50%;">
<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">

<div class="imgcontainer">
<h3> Login </h3>
</div>

<div class="container-fluid">
<label><b>User ID <span style="color:red">*</span></b></label>
<div style="color:red" id="result"></div>
<input type="text" id="username" placeholder="Enter User ID" name="username" required>

<label><b>Password <span style="color:red">*</span></b></label>
<input type="password" id="pwd" placeholder="Enter Password" name="password" required>
<input type="checkbox" checked="checked"> Remember me    
<button id="btn_login" type="submit">Login</button>

</div>
</div>
<div class="col-md-4 " style="margin:auto 0;padding: 100px 0;height:50%">
<b>Trouble Loging In?</b>
<ul>
<li>Make sure there are no spaces in User ID or Password</li>
<li>Passwords are case sensitive, Make sure Caps Lock is not ON</li>
</ul>

</div>

</div>

<footer style="position:fixed;bottom:0;width:100%;">

<div class="copyright">
<div class="container">
<div class="col-md-6">
<p>© 2017 - All Rights with IAH & VB. Developed and Maintained by Pastelloid Pvt Ltd</p>
</div>
<div class="col-md-6">
<ul class="bottom_ul">
<li><a href="http://www.pastelloid.com" target="_blank">www.pastelloid.com</a></li>
<li><a href="#">About us</a></li>
<li><a href="#">Faq's</a></li>
<li><a href="#">Contact us</a></li>
<li><a href="#">Site Map</a></li>
</ul>
</div>
</div>
</div>


</footer>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>	

<script>

$("#btn_login").click(function(){
 
    $.post("user_authentication.php",
    {
        username: $("#username").val(),
        password: $("#pwd").val()
    },
    function(data, status){
      switch(data){
        case "jd" : window.location.href = "jd/";break;
        case "ordercollection" : window.location.href = "ordercollection/";break;
        case "lab" : window.location.href = "lab/";break;
        default :   $("#result").text(data);
                   
      }
      
    });
});


</script>
</body>

</html>
