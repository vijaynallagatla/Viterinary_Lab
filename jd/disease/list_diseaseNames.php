<?php

require('../dbConfig.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id,disease_name,disease_desc from disease_names";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$species_list;
    while($row = $result->fetch_assoc()) {
        $species_list .= "<option value=" . $row['disease_name'] . ">" . $row['disease_name'] ."</option>";
    }
	echo $species_list;
} else {
    echo "<h3>No Species Found in Database</h3>";
}
$conn->close();

?>