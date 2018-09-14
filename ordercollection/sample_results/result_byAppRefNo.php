<?php
require('../dbConfig.php');

$appRefNo=$_REQUEST['appRefNo'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from order_entry where reference_number='" . $appRefNo . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$row = $result->fetch_assoc();
	$order_id=$row['order_id'];
    
	$sql1 = "SELECT * from sample_entry where order_id='" . $order_id . "'";
	$result1 = $conn->query($sql1);
	$id=1;
	$str='<table class="table">
	<tr>
		<th>ID</th>
		<th>Accession</th>
		<th>Species</th>
		<th>Sample Type</th>
		<th>Animal Age</th>
		<th>Animal Sex</th>
		
		<th>Animal History</th>
		<th>Result Status</th>
	</tr>
	
	';
	if ($result1->num_rows > 0) {
	while($row1 = $result1->fetch_assoc()) {
		$state ="pending";
        $str .= '<tr><td>' . $id .'</td>
				<td>' . $row1['barcode'] . '</td>
				<td>' . $row1['species'] . '</td>
				<td>' . $row1['sample_type'] . '</td>
				<td>' . $row1['animal_age'] . '</td>
				<td>' . $row1['sex'] . '</td>
				
				<td>' . $row1['animal_history'] . '</td>';
				if($row1['sample_state'] == 0) 
					$state="Pending";
				else if($row1['sample_state'] == 1) 
					$state= "InProgress";
				else if($row1['sample_state'] == 2)
					$state="Reports Generated";
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
	
} else {
    echo "<h3>No Such Samples Found with selected search Criteria. Kindly re-enter the Valid Data. </h3>";
}
$conn->close();


?>