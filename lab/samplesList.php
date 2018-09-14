<?php

require('dbConfig.php');
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$role=$_SESSION["role"];
$sql = "SELECT L.lab,L.barcode,O.order_id,L.result_status,L.sample_id,S.sample_id,S.species, O.sample_received_date from labs L,sample_entry S,order_entry O where L.result_status=0 AND L.lab='". $role . "' AND L.sample_id=S.sample_id AND S.order_id = O.order_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$sampleList="";
	
    while($row = $result->fetch_assoc()) {
        $sampleList .= '<blockquote class="option"  onClick="load_sample('.trim($row['barcode']).','.$row['sample_id'].',' . $row['sample_id'] .')"><h4> Accession : ' . $row['barcode'] ."</h4><h5>Species : " . $row['species'] . '</h5><h6 style="float:right;position:relative;margin-top:-10px">' . $row['sample_received_date'] . '</h6></blockquote><script>

        
    </script>';
    }
	echo $sampleList;
} else {
    echo "<h3>No Pending Samples</h3>";
}
$conn->close();

?>