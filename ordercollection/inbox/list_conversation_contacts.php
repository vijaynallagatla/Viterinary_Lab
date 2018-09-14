<?php

require('../dbConfig.php');
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$role=$_SESSION["role"];
$sql = "SELECT * from inbox where message_to='" . $_SESSION['user_name'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$messageList="";
	
    while($row = $result->fetch_assoc()) {
        $messageList .= '<blockquote class="option"  onClick="load_message(' . $row['id'] . ')"> <h5>' . $row['message_from'] . '</h5><h6>' . $row['message_subject'] . '</h6><h6 style="float:right;position:relative;margin-top:-10px">' . $row["time"] . '</h6></blockquote></script>';
    }
	echo $messageList;
} else {
    echo "<h3>No Messages in Inbox</h3>";
}
$conn->close();

?>