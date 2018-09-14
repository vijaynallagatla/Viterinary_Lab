<?php

$orderID=$_REQUEST['orderID'];
$sample_received_date 	= $_REQUEST["sample_received_date"];
$application_date	 	= $_REQUEST['application_date'];
$reference_number 		= $_REQUEST['reference_number'];
$receipt_number			= $_REQUEST['receipt_number'];
$owner_number			= $_REQUEST['owner_number'];
$owner_name				= $_REQUEST['owner_name'];
$owner_email_id			= $_REQUEST['owner_email'];
$doctor_name			= $_REQUEST['doctor_name'];
$doctor_number			= $_REQUEST['doctor_number'];
$doctor_email_id		= $_REQUEST['doctor_email'];
$state					= $_REQUEST['sample_state'];
$place					= $_REQUEST['sample_place'];
$owner_address			= $_REQUEST['owner_address'];
$doctor_address			= $_REQUEST['doctor_address'];

require('../../dbConfig.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "update order_entry SET sample_received_date='" . $sample_received_date . "', application_date='" . $application_date . "', reference_number='" . $reference_number . "', cm_receipt_number='" . $receipt_number ."', owner_name='" . $owner_name . "', owner_number='" . $owner_number . "', doctor_name='" . $doctor_name . "', doctor_number=" . $doctor_number . ", state='" . $state . "', place='" . $place . "', doctor_email_id='" . $doctor_email_id . "', owner_email_id='" . $owner_email_id . "', owner_address='" . $owner_address . "', doctor_address='" . $doctor_address . "' where order_id=" . $orderID;
$result = $conn->query($sql);

if ($result=== TRUE) {
   echo "success";
} else {
    echo "fail";
}
$conn->close();

?>
