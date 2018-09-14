<?php
session_start();
$lab=$_SESSION['role'];

require('dbConfig.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM sample_result_format where lab='" . $_SESSION['role'] . "'";
$result = $conn->query($sql);

if($result){
	$str='<table class="table"><tr><th>SI</th><th>Result Format Name</th><th>Options</th></tr>';
	$i=1;
	while($row = $result->fetch_assoc()) {
		$str .= "<tr><td>" . $i . "</td>";
		$str .= "<td>" . $row['format_name'] . "</td>";
		$str .= '<td><button class="btn btn-xs btn-primary" onClick="viewFormat(' . $row["id"] . ')">View</button><button onClick="deleteFormat(' . $row["id"] . ')" class="btn btn-xs btn-warning">Delete</button></td>';
		$i++;
	}
	$str .="</table>";
	echo $str;
}else{
	echo " There are No Sample Result Format Found in Database";
}

$conn->close();

?>