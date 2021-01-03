<?php 
include 'backend/Database.php';
if(isset($_GET['cv_id'])){
	$consultant_id = $_GET['cv_id'];
	// file to retrieve all existing consultants and show them in table with possible options
	$retrieve = "SELECT * FROM users INNER JOIN user_type INNER JOIN department INNER JOIN country INNER JOIN 
	school ON department.school_id = school.school_id AND users.user_type_id = user_type.user_type_id AND 
	users.user_department = department.department_id AND users.user_country = country.country_id 
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
		// Logo
		$image_file = K_PATH_IMAGES.'ur_logo_black.png';
		$this->Image($image_file, 15, 10, 80, 30, 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$this->Ln(24);
		$this->Cell(0, 15,'_______________________________________________________________________________________________', 0, 0,'L');

	}
}

// create new PDF document
$pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Paul Patrick');
$pdf->SetTitle('Contract With Consultant');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' cv', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
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
$pdf->SetFont('dejavusans', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
$pdf->Ln(27);
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(189,5,'CONTRACT FOR CONSULTANCY SERVICES',0,0,'C');
$pdf->Ln(15);
$pdf->Cell(189,5,'BETWEEN THE UNDERSIGNED',0,0,'L');
$pdf->Ln(11);
$pdf->SetFont('times', '', 12);
$pdf->MultiCell(189, 15, 'The University of Rwanda (UR) a public high learning institution established by the law no 71/2013 of 23/09/2013, having its office in Mburabuturo, Gikondo, and P.O.BOX 4285 Kigali Rwanda, hereinafter referred to as “UR - Consultancy Services”', 0, 'L', 0, 1, '', '', true);
$pdf->Ln(10);
$pdf->Cell(189,5,'-And- ',0,0,'L');
$pdf->Ln(10);
$pdf->MultiCell(189, 15, '…………………………….. (Full Name) Léonard carrying ID 1197580026902066, hereinafter referred to as 
“Consultant”', 0, 'L', 0, 1, '', '', true);
$pdf->Ln(10);
$pdf->MultiCell(189, 15, 'WHEREAS Royal HaskoningDHV, an independent and international Dutch engineering company, in collaboration with the UR - College of Science and Technology have decided to provide a two-month training to Rwandan university graduates in the framework of capacity building of the project "Sugar make it work / Isukari Imvugo Tuyigire Ingiro (IITI);', 0, 'L', 0, 1, '', '', true);
$pdf->Ln(12);
$pdf->MultiCell(189, 15, 'WHEREAS, UR desires to hire a consultant to take part in the project as trainer on behalf of UR - College of Science and Technology;', 0, 'L', 0, 1, '', '', true);
$pdf->Ln(12);
$pdf->MultiCell(189, 15, 'WHEREAS ………………………(Full name )  has expressed his desire to be hired by 
UR- Consultancy Services;', 0, 'L', 0, 1, '', '', true);
$pdf->Ln(20);
$pdf->MultiCell(189, 15, 'NOW, THEREFORE UR - Consultancy Services and the Consultant have agreed as follows:', 0, 'c', 0, 1, '', '', true);
$pdf->Ln(50);

$pdf->SetFont('times', 'B', 12);
$pdf->Cell(189, 15,'SCOPE OF WORK', 0, 0,'L');
$pdf->Ln(2);
$pdf->Cell(189, 15,'_________________________', 0, 0,'L');
$pdf->SetFont('times', '', 12);
$pdf->Ln(15);
$pdf->MultiCell(189,5,$user_education,0, 'L', 0, 1, '', '', true);


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