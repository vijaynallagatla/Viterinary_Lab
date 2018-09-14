<?php

require('dbConfig.php');
$sampleID=$_REQUEST['sample'];

session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from order_entry where order_id=(select order_id from sample_entry where sample_id= '".$sampleID . "')";
$result = $conn->query($sql);

$diseaseSQL ="SELECT * from disease_suspected where sample_id= '" . $sampleID . "'";
$diseaseSuspected=$conn->query($diseaseSQL);

$rowStart='<div class="row" ><div class="col-md-12"><center><h4>'. $_SESSION['role'] . ' - Result Entry</h4></center>';
$str="";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	
       $str .= $rowStart .'<table class="table table-bordered"> <tr><td><span>Accession : </span>' . $sampleID . '</td><td><span>Application Date : </span>' . $row['application_date'] . '</td><td><span>Recieved Date : </span>' . $row['sample_received_date'] . '</td></tr><tr><td  style="width:50%"><span>Owner Name & Address : </span><br/>';
	   $str .= $row["owner_name"] . '<br/>' . $row['owner_address'] . '<br/>' . $row['owner_number'] . '<br/>' . $row['owner_email_id'] . '</td><td style="width:50%">
				<span>Investigation Place/ Referred By :</span><br/>' . $row['doctor_name']. '<br/>' . $row['doctor_address'] . '<br/>' . $row['doctor_number'] . '<br/>' . $row['doctor_email_id'] . '</td></tr>';
    }
} else {
    echo "<h3>No Orders found in Order entry</h3>";
}

$sql="SELECT * from sample_entry where sample_id=".$sampleID;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
		$str .= '<tr><td><span>Species : </span>'.$row['species'] . '</td><td><span>Sample Type : </span>' . $row['sample_type'].'</td><td><span>';
		$str .='Animal Age : </span>'.$row['animal_age'] . '</td></tr><tr><td><span>Sex : </span>' . $row['sex'].'</td><td colspan="2">';
		$str .='<span>Animal History : </span>' . $row['animal_history'].'</td></tr>';
		
		if($diseaseSuspected->num_rows>0){
		
			$temp="";
			while($diseaseSuspect = $diseaseSuspected->fetch_assoc())
				$temp .= $diseaseSuspect['disease_suspected'] . ". ";
			
			$str .='<tr><td colspan="3"><span>Disease Suspected : ' . $temp . '</td></tr>';
				
		}
		$str .='</table></div></div>';
		
		$sql="SELECT test_name from tests_performed where sample_id=".$sampleID;
		$result1 = $conn->query($sql);
		$options="";
		while($row3=$result1->fetch_assoc()){
			$options .= '<option value="' . $row3['test_name'] . '">' . $row3['test_name'] . '</option>';
		}
		
		$sql="SELECT * from sample_result_format where lab='" . $_SESSION['role'] . "'";
		$result = $conn->query($sql);
		$format="<option>None</option>";
		
		while($row4=$result->fetch_assoc()){
			$format .= '<option value="' . $row4['format_name'] . '">' . $row4['format_name'] . '</option>';
		}
		
		$str .='<div class="card"><center><button onclick="previewResults()" class="btn btn-info">Preview Results</button><button onclick="acceptSample()" class="btn btn-success">Accept and Submit</button><button data-toggle="modal" data-target="#sampleRejection" class="btn btn-warning">Reject Sample</button></div>';
		echo $str;
} else {
    echo "<h3>No Sample in Sample entry</h3>";
}
$conn->close();

?>