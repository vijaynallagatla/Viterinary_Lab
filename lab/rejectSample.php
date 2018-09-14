<?php
session_start();
$lab=$_SESSION['role'];

require('dbConfig.php');
$barcode=$_REQUEST['barcode'];
$sampleID=$_REQUEST['sample'];
$rejection_reason=$_REQUEST['rejection_reason'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE labs set result_status='4', lab_result='" . $rejection_reason . "' where barcode='" . $barcode . "' AND sample_id = '" . $sampleID . "' AND lab = '" . $_SESSION['role'] . "'";
$result = $conn->query($sql);

if($result){
	echo "Sample Rejected Successfully !!!";
}else{
	echo "Sample Rejection could not be updated into database ";
}

$conn->close();
?>