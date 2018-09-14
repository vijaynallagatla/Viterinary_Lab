<?php

require('../dbConfig.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id,test_name,test_desc from test_names";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$test_names;
    while($row = $result->fetch_assoc()) {
        $test_names .= "<option value=" . $row['test_name'] . ">" . $row['test_name'] ."</option>";
    }
	echo $test_names;
} else {
    echo "<h3>No Species Found in Database</h3>";
}
$conn->close();

?>