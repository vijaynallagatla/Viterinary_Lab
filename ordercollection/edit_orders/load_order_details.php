<?php

$orderID=$_REQUEST['orderID'];
require('../../dbConfig.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "select * from order_entry where order_id=" . $orderID;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$sampleType_list;
    $row = $result->fetch_assoc();
	echo json_encode($row);
} else {
    echo "<h3>No Species Found in Database</h3>";
}
$conn->close();

?>
