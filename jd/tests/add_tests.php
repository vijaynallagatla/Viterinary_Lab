<?php
require('../dbConfig.php');

$name=$_REQUEST['test_name'];
$desc=$_REQUEST['test_desc'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$st=$conn->prepare("insert into test_names(test_name,test_desc) VALUES('$name','$desc')") ;
	$st->execute();
	
	echo "Successfully Test Names has been added !!!";
	
}catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>