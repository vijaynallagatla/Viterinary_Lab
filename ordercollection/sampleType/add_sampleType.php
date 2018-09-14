<?php
require('../dbConfig.php');

$name=$_REQUEST['sample_type'];
$desc=$_REQUEST['sample_desc'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$st=$conn->prepare("insert into sample_type(sample_type,sample_desc) VALUES('$name','$desc')") ;
	$st->execute();
	
	echo "Successfully Sample Type has been added !!!";
	
}catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>