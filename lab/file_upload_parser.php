<?php
session_start();
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true

$fp      = fopen("test_uploads/" . $fileName, 'r');
$content = fread($fp, filesize($fileTmpLoc));
$content = addslashes($content);
fclose($fp);
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}

if(move_uploaded_file($fileTmpLoc, "test_uploads/" .$fileName)){
   // echo "$fileName upload is complete";
   ini_set('auto_detect_line_endings',TRUE);
$handle = fopen("test_uploads/$fileName",'r');
$msg='<table class="table table-hover table-stripped" >';
$row=1;
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $num = count($data);
    if($row==1){
		$msg .="<tr>";
		for ($c=0; $c < $num; $c++) 
        $msg .= "<th>" . $data[$c] . "</th>";
		$msg .="</tr>";
		$row++;
	}else{
		$row++;
    $msg .="<tr>";
    for ($c=0; $c < $num; $c++) 
        $msg .= "<td>" . $data[$c] . " </td>";
		$msg .="</tr>";
		
	}
}


	
require('dbConfig.php');
$barcode=$_REQUEST['barcode'];
$sampleID=$_REQUEST['sample'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$msg .= "</table>";
$sql = "UPDATE labs set lab_result = '" . $msg ."' where barcode='" . $barcode . "' AND sample_id = '" . $sampleID . "' AND lab = '" . $_SESSION['role'] . "'";
$result = $conn->query($sql);

$conn->close();

echo $msg;
} else {
    echo "move_uploaded_file function failed";
}
?>