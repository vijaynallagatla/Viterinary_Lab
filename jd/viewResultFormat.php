<?php

require('dbConfig.php');

$id=$_REQUEST['format_id'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM sample_result_format where id='" . $id . "'";
$result = $conn->query($sql);

if($result){
	$str='';
	while($row = $result->fetch_assoc()) {
		$str .= "<h4>Format Name : " . $row['format_name'] . "</h4><hr/>";
		$str .= $row['result_format'] ;
	}
	echo $str;
}else{
	echo " There are No Sample Result Format Found in Database";
}

$conn->close();

?>