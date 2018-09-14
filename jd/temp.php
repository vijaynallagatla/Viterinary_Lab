<?php

require('dbConfig.php');
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * from labs where lab_id=45";
$result = $conn->query($sql);
$str="";
if ($result->num_rows > 0) {
	$i=1;
	    while($row = $result->fetch_assoc()) {
				$str = $row['lab_result'];	
		}
}else{
		
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
<script>
$(document).ready(function() {
    $('#data-table').DataTable();
} );

</script>
</head>
<body>

<div>
	<?php
		echo $str;
	?>
	
</div>
</body>
</html>