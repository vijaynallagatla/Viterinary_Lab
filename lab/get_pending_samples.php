<?php
require('dbConfig.php');
$pending_orders=0;
session_start();
$lab=$_SESSION['role'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$st=$conn->prepare("select count(result_status) AS pending_samples from labs where result_status=0 AND lab='" . $lab . "'");
	$st1=$conn->prepare("select count(result_status) AS samples_in_approval from labs where result_status=1 AND lab='" . $lab . "'");
	$st->execute();
	$st1->execute();
	$samples_in_approval=$st1->fetch(PDO::FETCH_ASSOC);
	$pending_samples=$st->fetch(PDO::FETCH_ASSOC);
	$pending_samples = $pending_samples['pending_samples'];
	$samples_in_approval = $samples_in_approval['samples_in_approval'];
	
	$results=[["pending_samples" => $pending_samples,	"samples_in_approval" => $samples_in_approval]];
			
	echo json_encode($results);
	
}catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>