<?php

$orderID=$_REQUEST['orderID'];

require('../../dbConfig.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "delete from order_entry where order_id=" . $orderID;
$result = $conn->query($sql);

$sql="delete from sample_entry where order_id=" . $orderID;
$result1=$conn->query($sql);

$sql="delete from labs where order_id=" . $orderID;
$result2=$conn->query($sql);


if ($result=== TRUE) {
   echo "success";
} else {
    echo "fail";
}
$conn->close();

?>
