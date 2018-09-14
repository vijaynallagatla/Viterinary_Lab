<?php

require('../dbConfig.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT id,sample_type,sample_desc from sample_type";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$sampleType_list;
    while($row = $result->fetch_assoc()) {
        $sampleType_list .= "<option>" . $row['sample_type'] ."</option>";
    }
	echo $sampleType_list;
} else {
    echo "<h3>No Species Found in Database</h3>";
}
$conn->close();

?>