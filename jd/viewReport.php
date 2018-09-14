<?php

require_once('tcpdf/tcpdf.php');

require_once('dbConfig.php');

$lab_id=$_REQUEST['lab_id'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	$sql = "SELECT * from labs where lab_id='" . $lab_id . "'";
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	
	$order_id=$row['order_id'];
	$sample_id=$row['sample_id'];
	



$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Vijay Kumar');
$pdf->SetTitle('SRDDL Report');
$pdf->SetSubject('IAH & VB, SRDDL Reports');
$pdf->SetKeywords('IAHVB, PDF, SRDDL, test, report');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 20);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD
<h3>SRDDL Report</h3>
$order_id $sample_id
EOD;

// print a block of text using Write()
$pdf->writeHTMLCell(0, 0, '', '', $txt, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+?>