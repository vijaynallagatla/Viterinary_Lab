<?php
require('../dbConfig.php');

session_start();
$lab=$_SESSION['role'];
$refNo=$_REQUEST['appRefNo'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	$sql = "SELECT * from order_entry O,sample_entry S, labs L where O.reference_number='" . $refNo . "' AND O.order_id=S.order_id AND L.sample_id=S.sample_id AND lab='" . $lab . "'";
	$result = $conn->query($sql);
	
	$id=1;
	$str='<table class="table">
	<tr>
		<th>ID</th>
		<th>Accession</th>
		<th>Species</th>
		<th>Sample Type</th>
		<th>Laboratory</th>
		<th>Report Status</th>
	</tr>
	
	';
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$state ="pending";
        $str .= '<tr><td>' . $id .'</td>
				<td>' . $row['barcode'] . '</td>
				<td>' . $row['species'] . '</td>
				<td>' . $row['sample_type'] . '</td>
				<td>' . $row['lab'] . '</td>';
				if($row['result_status'] == 0) 
					$state="Pending";
				else if($row['result_status'] == 1) 
					$state= "InProgress";
				else if($row['result_status'] == 2)
					$state='<button class="btn btn-xs btn-primary" onclick=viewReport("' . $row['lab_id'] . '")>View / Print</button>';
				else
					$state="Rejected";
				$str .= '<td>' . $state . '</td></tr>';
				
				$id++;
		    }
			
			$str .= '</table>';
			echo $str;
	}else{
		echo "No Samples are added into this Reference Number";
	}
	
$conn->close();


?>