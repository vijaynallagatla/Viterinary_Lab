<?php
require('dbConfig.php');

$sample_received_date 	= $_REQUEST["sample_received_date"];
$application_date	 	= $_REQUEST['application_date'];
$reference_number 		= $_REQUEST['reference_number'];
$receipt_number			= $_REQUEST['receipt_number'];
$owner_number			= $_REQUEST['owner_number'];
$owner_name				= $_REQUEST['owner_name'];
$owner_email_id			= $_REQUEST['owner_email_id'];
$doctor_name			= $_REQUEST['doctor_name'];
$doctor_number			= $_REQUEST['doctor_number'];
$doctor_email_id		= $_REQUEST['doctor_email_id'];
$barcode				= array($_REQUEST['barcode']);
$barcode				= $barcode[0];
$sample_state			= $_REQUEST['sample_state'];
$sample_place			= $_REQUEST['sample_place'];
$owner_address			= $_REQUEST['owner_address'];
$doctor_address			= $_REQUEST['doctor_address'];
$species				= array($_REQUEST['species']);
$species				= $species[0];
$sampleType				= array($_REQUEST['sampleType']);
$sampleType				= $sampleType[0];
$animalAge				= array($_REQUEST['animalAge']);
$animalAge				= $animalAge[0];
$animalSex				= array($_REQUEST['animalSex']);
$animalSex				= $animalSex[0];
$animalHistory			= array($_REQUEST['animalHistory']);
$animalHistory			= $animalHistory[0];
$testsRequired			= array($_REQUEST['testsRequired']);
$testsRequired			= $testsRequired[0];
$diseaseSuspect			= array($_REQUEST['diseaseSuspect']);
$diseaseSuspect			= $diseaseSuspect[0];
$lab					= array($_REQUEST['lab']);
$lab					= $lab[0];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$data=array($application_date, $sample_received_date, $receipt_number, $owner_name, $owner_number, $owner_email_id, $sample_state,$sample_place, $owner_address,$doctor_address, $doctor_name, $doctor_number, $doctor_email_id, $reference_number, "0");
// prepare and bind
$stmt = $conn->prepare("INSERT INTO ORDER_ENTRY(application_date, sample_received_date, cm_receipt_number, owner_name, owner_number, owner_email_id,state, place, owner_address,doctor_address, doctor_name, doctor_number, doctor_email_id, reference_number, order_state) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$st=$conn->prepare("select order_id from order_entry order by order_id DESC LIMIT 1");
$stmt->execute($data);
$st->execute();

$ordersResult=$st->fetch(PDO::FETCH_ASSOC);
$order_id = $ordersResult['order_id'];

	for($i=0;$i<sizeof($species);$i++){
		$data=array($order_id, $barcode[$i], $species[$i], $sampleType[$i], $animalAge[$i], $animalSex[$i], $animalHistory[$i]);
		$stmt = $conn->prepare("INSERT INTO SAMPLE_ENTRY(order_id, barcode,species, sample_type, animal_age, sex, animal_history) VALUES(?, ?, ?, ?, ?, ?, ?)");
		$st=$conn->prepare("select sample_id from sample_entry order by sample_id DESC LIMIT 1");
		$stmt->execute($data);
		$st->execute();
		
		$sampleResult=$st->fetch(PDO::FETCH_ASSOC);
		$sample_id=$sampleResult['sample_id'];
		
		$l=$lab[$i];
		
		for($j=0;$j<sizeof($l);$j++)
		{
			$specimenLab=$l[$j];
			$data=array($order_id, $barcode[$i], $sample_id,$specimenLab);
			$stmt = $conn->prepare("INSERT INTO labs(order_id, barcode, sample_id, lab) VALUES(?, ?, ?, ?)");
			$stmt->execute($data);
		}
		
		$tests=$testsRequired[$i];
		for($j=0;$j<sizeof($tests);$j++)
		{
			$specimenTests=$tests[$j];
			$data=array($barcode[$i], $sample_id,$specimenTests);
			$stmt = $conn->prepare("INSERT INTO tests_performed(accession, sample_id, test_name) VALUES(?, ?, ?)");
			$stmt->execute($data);
		}
		
		$disease=$diseaseSuspect[$i];
		for($j=0;$j<sizeof($disease);$j++)
		{
			$diseaseSuspected=$disease[$j];
			$data=array($barcode[$i], $sample_id,$diseaseSuspected);
			$stmt = $conn->prepare("INSERT INTO disease_suspected(accession, sample_id, disease_suspected) VALUES(?, ?, ?)");
			$stmt->execute($data);
		}
	}
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
 ?>