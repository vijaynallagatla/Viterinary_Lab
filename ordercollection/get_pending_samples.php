<?php
require('dbConfig.php');
$pending_orders=0;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$st=$conn->prepare("select count(sample_state) AS pending_samples from sample_entry where sample_state=0");
	$st->execute();
	$pending_orders=$st->fetch(PDO::FETCH_ASSOC);
	$pending_orders = $pending_orders['pending_samples'];
	
	echo $pending_orders;
	
}catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>