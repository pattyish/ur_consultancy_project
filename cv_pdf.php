<?php 
include 'backend/Database.php';
if(isset($_GET['cv_id'])){
	$consultant_id = $_GET['cv_id'];
	// file to retrieve all existing consultants and show them in table with possible options
	$retrieve = "SELECT * FROM users INNER JOIN user_type INNER JOIN department INNER JOIN country INNER JOIN 
	school ON department.school_id  = school.school_id AND users.user_type_id = user_type.user_type_id AND
	 users.user_department = department.department_id AND 	users.user_country = country.country_id
	  WHERE users.user_status_id = 1 AND users.user_id = $consultant_id";
	$retrieve = mysqli_query($connect,$retrieve);
	$retrieveCount = mysqli_num_rows($retrieve);
	$gender_value = "";
	$phone_number = "";
	$education = "";
	$summary = "";
	$location = "";
	$now = date("d/m/Y");
	if($retrieveCount > 0)
	{
		while($lineRetrieve = mysqli_fetch_object($retrieve))
		{
			$user_id = $lineRetrieve -> user_id;
			$fName = $lineRetrieve -> user_first_name;
			$lName = $lineRetrieve -> user_last_name;
			$gender = $lineRetrieve -> user_gender;
			$natId = $lineRetrieve -> user_national_id;
			$email = $lineRetrieve -> user_email;
			$department = $lineRetrieve -> department_name;
			$school = $lineRetrieve -> school_name;
			$user_type = $lineRetrieve -> user_type;
			$user_type_id = $lineRetrieve -> user_type_id;
			$department_id = $lineRetrieve -> department_id;
			$country_name = $lineRetrieve -> country_name;
			$country_id = $lineRetrieve -> country_id;
			$user_phone = $lineRetrieve -> user_phone;
			$user_summary = $lineRetrieve -> user_summary;
			$user_education = $lineRetrieve -> user_education;
			$user_location = $lineRetrieve -> user_location;
			if($gender == "M")
			{
              $gender_value = "Male";
			}
			else
			{
			  $gender_value ="Female";
			}
			if($user_phone == "Input your number")
			{
				$phone_number = "No Updated Yet";
			}
			else
			{
                $phone_number = $user_phone;
			}
			if($user_location == "")
			{
				$location = "No Updated Yet";
			}
			else
			{
				$location = $user_location;	
			}
		}
	}    	
// Include the main TCPDF library (search for installation path).
require_once('TCPDF/tcpdf.php');

class PDF extends TCPDF{
	public function Header(){
		// Set font
		$this->Ln(5);
		$this->SetFont('times', 'B', 16);
		// Title
		$this->Cell(0, 15, 'UR CONSULTANCY MEMBERSHIP CONFIRMATION ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
		$this->Ln(1);
		//$this->Cell(0, 15, '______________________________________ ', 0, 0, 'L');
		$this->Ln(10);
	}
}

// create new PDF document
$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Paul Patrick');
$pdf->SetTitle('My CV');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
//names
$pdf->Ln(10);
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(40,5,'Names',0,0,'L');
$pdf->SetFont('times', '', 14);
$pdf->Cell(149,5,$fName.' '.$lName,0,0,'L');
$pdf->Ln(10);
//gendet
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(40,5,'Gender',0,0,'L');
$pdf->SetFont('times', '', 14);
$pdf->Cell(149,5,$gender_value,0,0,'L');
$pdf->Ln(10);
//County
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(40,5,'Country',0,0,'L');
$pdf->SetFont('times', '', 14);
$pdf->Cell(149,5,$country_name,0,0,'L');
$pdf->Ln(10);
//Natinaol ID
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(40,5,'National ID',0,0,'L');
$pdf->SetFont('times', '', 14);
$pdf->Cell(149,5,$natId,0,0,'L');
$pdf->Ln(10);
//Email
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(40,5,'Email',0,0,'L');
$pdf->SetFont('times', '', 14);
$pdf->Cell(149,5,$email,0,0,'L');
$pdf->Ln(10);
// phone number
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(40,5,'Tel',0,0,'L');
$pdf->SetFont('times', '', 14);
$pdf->Cell(149,5,$phone_number ,0,0,'L');
$pdf->Ln(10);
//location
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(40,5,'Location',0,0,'L');
$pdf->SetFont('times', '', 14);
$pdf->Cell(149,5,$location ,0,0,'L');
$pdf->Ln(25);
//education
$pdf->SetFont('times', 'B', 16);
$pdf->Cell(189,5,'EDUCATION BACKGROUND AND SPECIFICATION',0,0,'L');
$pdf->Ln(1);
$pdf->Cell(189, 15,'___________________________', 0, 0,'L');
$pdf->SetFont('times', '', 14);
$pdf->Ln(10);
$pdf->MultiCell(189,5,$user_education,0, 'L', 0, 1, '', '', true);
//footer
$pdf->Ln(15);
$pdf->SetFont('times', 'B', 16);
$pdf->Cell(189,5,'CONFIRMATION',0,0,'L');
$pdf->Ln(1);
$pdf->Cell(189, 15, '________________', 0, 0,'L');
$pdf->SetFont('times', '', 14);
$pdf->Ln(15);
$pdf->MultiCell(189, 15, 'This is to confirm that '.$fName.' '.$lName.' is an active consultant of University of Rwanda, in school of '.$school.' and department of '.$department.'.', 0, 'L', 0, 1, '', '', true);
$pdf->Ln(40);
$pdf->Cell(100,5,'Done at Kigali on    '.$now,0,0,'C');
// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));



// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('cv.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

}
?>