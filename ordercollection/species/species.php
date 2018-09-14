<?php

require('dbConfig.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM species";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$species='<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Species Name</th>
					<th>Species Description</th>
					<th>Delete</th>
				</tr>
	
	
	';
	$id=1;
    while($row = $result->fetch_assoc()) {
        $species .= '
					<tr>
						<td>' . $id . '</td>
						<td>' . $row['species_name'] . '</td>
						<td>' . $row['species_desc'] . '</td>
						<td>
							<a onclick="deleteSpecies(' .$row['id'] . ')" class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>		
		';
		$id++;
    }
	$species .="</table>";
	echo $species;
} else {
    echo "<h3>No Pending Samples</h3>";
}
$conn->close();

?>