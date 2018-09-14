<?php
require('../dbConfig.php');

$accession=$_REQUEST['accession'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	$sql1 = "SELECT * from labs where barcode='" . $accession . "'";
	$result1 = $conn->query($sql1);

	$sql="SELECT * from sample_entry where barcode='" . $accession . "'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	$id=1;
	$str='<table class="table">
	<tr>
		<th>ID</th>
		<th>Accession</th>
		<th>Species</th>
		<th>Sample Type</th>
		<th>Tests Required</th>
		<th>Disease Suspected</th>
		<th>Laboratory</th>
		<th>Report Status</th>
	</tr>
	
	';
	if ($result1->num_rows > 0) {
	while($row1 = $result1->fetch_assoc()) {
		$state ="pending";
        $str .= '<tr><td>' . $id .'</td>
				<td>' . $row['barcode'] . '</td>
				<td>' . $row['species'] . '</td>
				<td>' . $row['sample_type'] . '</td>
				<td>' . $row['tests_required'] . '</td>
				<td>' . $row['disease_suspected'] . '</td>
				<td>' . $row1['lab'] . '</td>';
				if($row1['result_status'] == 0) 
					$state="Pending";
				else if($row1['result_status'] == 1) 
					$state= "InProgress";
				else if($row1['result_status'] == 2)
					$state='<button class="btn btn-xs btn-primary" formtarget="_blank"  onclick="viewReport(' . $row1['lab_id'] . ')">View / Print</button>';
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