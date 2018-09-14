<?php
session_start();
$lab=$_SESSION['role'];

require('dbConfig.php');
$barcode=$_REQUEST['barcode'];
$sampleID=$_REQUEST['sample'];
$sampleResult=$_REQUEST['sampleResult'];
$testsPerformed=$_REQUEST['testsPerformed'];
$tests_performed_date=$_REQUEST['tests_performed_date'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE labs set result_status='1' , lab_result='" .$sampleResult ."' where barcode='" . $barcode . "' AND sample_id = '" . $sampleID . "' AND lab = '" . $_SESSION['role'] . "'";
$result = $conn->query($sql);

for($i=0;$i<sizeof($testsPerformed);$i++){
	$sql = "UPDATE tests_performed set lab_id='" . $lab ."', tests_performed_date='" . $tests_performed_date . "' where accession='" . $barcode . "' AND sample_id = '" . $sampleID . "' AND test_name='" . $testsPerformed[$i] . "'";
$result = $conn->query($sql);

}

$sql="select result_status from labs where result_status='0' AND sample_id= '" . $sampleID . "'";

$r=$conn->query($sql);

if($r->num_rows>0){
	
}else{
	$sql="Update sample_entry set sample_state='1' where sample_id=" . $sampleID;
	$conn->query($sql);
	

}
if($result){
	echo "Sample accepted and sent for Approval";
}else{
	echo "Sample could not be updated into database ";
}

$conn->close();
?>