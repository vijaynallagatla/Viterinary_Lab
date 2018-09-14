<?php

$format=$_REQUEST['format'];

require('dbConfig.php');
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo $format;
$sql = "SELECT * from sample_result_format where format_name='" . $format . "' AND lab = '" . $_SESSION['role'] . "'";
$result = $conn->query($sql);

$row=$result->fetch_assoc();
if($result->num_rows>0)
	echo $row['result_format'];
else
	echo "NotFound";

?>