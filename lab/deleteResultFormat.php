<?php

require('dbConfig.php');

$id=$_REQUEST['format_id'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM sample_result_format where id='" . $id . "'";
$result = $conn->query($sql);

if($result){
	
		echo "Successfully Result Format is deleted from database !!!";
}else{
	echo " Failed to delete the selected format !!!";
}

$conn->close();

?>
