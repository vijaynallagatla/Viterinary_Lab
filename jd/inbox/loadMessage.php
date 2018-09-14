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
$sql = "SELECT * from inbox where id='" . $_REQUEST['id'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$messageList="";
	
    while($row = $result->fetch_assoc()) {
        $messageList .= '<div class="well"  ><h5> From : ' . $row['message_from'] . '</h5><h6>' . $row["time"] . '</h6> <h5> Subject : ' . $row['message_subject'] . '</h5><br/><h4> Message</h4><p>' . $row['message_body'] . '</div></script>';
    }
	echo $messageList;
} else {
    echo "<h3>No Messages in Inbox</h3>";
}
$conn->close();

?>