<?php
session_start();
$lab=$_SESSION['role'];
$formatName=$_POST['formatName'];
$resultFormat=$_POST['resultFormat'];

require('dbConfig.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO sample_result_format (format_name, result_format,lab) values ('" . $formatName. "','" . $resultFormat . "','" . $lab . "')";
$result = $conn->query($sql);

if($result){
	echo "Successfully added new Format to database !!!";
}else{
	echo " Failed to add result format into database !!!" . $lab;
}

$conn->close();

?>