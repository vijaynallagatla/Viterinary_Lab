<?php
require_once('../tcpdf/tcpdf.php');

$lab_name="Lab";

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
		
        $html = '  <br/><br/> <br/><br/><br/><div>
							<img  src="..\img\print_header.jpg" alt="Emblem"/>
						</div>';
     $this->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'top', $autopadding = true);
   }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

 session_start();
 $connect = mysqli_connect("localhost", "root", "", "iahvb"); 

 if(isset($_REQUEST["lab_id"]))  
 {  
      //require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("SRDDL Reports");  
      $obj_pdf->SetHeaderData('', 'Hello', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('verdana');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      //$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT); 
	  $obj_pdf->setCellHeightRatio(1);
      $obj_pdf->setPrintHeader(true);  
      $obj_pdf->setPrintFooter(true);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
	  
	  
	  // set margins
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP+20, PDF_MARGIN_RIGHT);
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


      $obj_pdf->AddPage();  
      $content = '';  
      /* $content .= '  
      <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
                <th>Order ID</th>  
                <th>Application Date</th>  
                <th>Receipt Number</th>  
                <th>Sample Received Date</th>  
                <th>Owner Name</th>  
                <th>Doctor Name</th>  
                <th>Doctor Number</th>  
                <th>State</th>  
                <th>Place</th>  
                <th>Owner Address</th>  
                <th>Doctor Address</th>  
           </tr>  
      ';  
	  */
	  $sql = "SELECT A.description,A.lab_name,B.lab,B.lab_id FROM lab_names A,labs B where B.lab_id='" . $_REQUEST['lab_id'] . "' AND A.lab_name=B.lab";  
      $result = mysqli_query($connect, $sql);  
      $lab_name = mysqli_fetch_array($result); 
	  
	  
	  $content .='
	  <center>
		<h4 align="center">' . $lab_name['description'] . '</h4>	
		<h5 align="center">Laboratory Report</h5>  
	  </center><br>
	  
	  ';
	  
	  $obj_pdf->setCellHeightRatio(0.8);
	  $obj_pdf->writeHTML($content); 
      $content .= fetch_data($obj_pdf);  
     // $obj_pdf->writeHTML($content); 
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 
 
 

 
  function fetch_data($obj_pdf)  
 {  
		$obj_pdf->setCellHeightRatio(0.6);
      $output = '';  
       $connect = mysqli_connect("localhost", "root", "", "iahvb"); 
      $sql = "SELECT A.lab_result,A.lab_id,A.sample_id,A.order_id,B.sample_id, B.order_id, B.barcode, B.species, B.sample_type, B.animal_age, B.sex, B.animal_history, C.order_id, C.application_date, C.cm_receipt_number, C.sample_received_date, C.owner_name, C.owner_number, C.owner_email_id, C.place, C.state, C.owner_address, C.doctor_address, C.doctor_name, C.doctor_number, C.doctor_email_id, C.reference_number FROM labs A,sample_entry B, order_entry C where A.lab_id='" . $_REQUEST['lab_id'] . "' AND A.sample_id=B.sample_id AND C.order_id=B.order_id";  
		
	 $result = mysqli_query($connect, $sql);  
      $row = mysqli_fetch_array($result);   
      $output .= '<p style="float:left;weight:bold">No: IAH/SRDDL/DVS/' . $row['barcode'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date : ' . $row['application_date'] . '<p style="text-align:left;weight:bold">Recieved Date : ' . $row['sample_received_date'];
	     $obj_pdf->writeHTML($output); 
	  $obj_pdf->setCellHeightRatio(1.2);
	   $output = '<br/><br/>To,<br/>' . $row["owner_name"] . '<br/>' . $row['owner_address'] . '<br/>' . $row['owner_number'] . '<br/>' . $row['owner_email_id'] . '
				<br/><br/>Ref :<br/>' . $row['doctor_name']. '<br/>' . $row['doctor_address'] . '<br/>' . $row['doctor_number'] . '<br/>' . $row['doctor_email_id'] . '';  
	  
	  	$sql = "SELECT * from labs where lab_id='" . $_REQUEST['lab_id'] . "'";
		$result = mysqli_query($connect, $sql);  
		$row = mysqli_fetch_array($result);
		
		$output .= '<hr/><h4>Result : </h4>';
		$output .='<div>' . $row['lab_result'] . '</div>';
		
			   $obj_pdf->writeHTML($output); 
 }  
?>

<!doctype html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}

 .left, .right, .center {
    
    height: 80px;
}

.left {
    float: left;
   
}
.right {
    float: right;
   
}
.center {
    text-align: center;
}
</style>
</head>
<body>
</body>
</html>