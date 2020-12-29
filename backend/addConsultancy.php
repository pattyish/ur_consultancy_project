<?php
session_start();
$myId = $_SESSION['User_ID'];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user
$name = $connect -> real_escape_string($_POST['name']);
$sign_date = $connect -> real_escape_string($_POST['sign_date']);
$start_date = $connect -> real_escape_string($_POST['start_date']);
$end_date = $connect -> real_escape_string($_POST['end_date']);
$amount = $_POST['amount'];
$currency = $connect -> real_escape_string($_POST['currency']);
$ur_charges = $_POST['ur_charges'];
$tax_charges = $_POST['tax_charges'];
$consultant_charges = $_POST['consultant_charges'];
$client = $_POST['client'];
$teamLeader = $_POST['teamLeader'];
$now = date("Y-m-d h:i:s");
$status_id = 1;

// Query to insert into database
//$Insert = "INSERT INTO consultancy (consultancy_name,consultancy_sign_date,consultancy_start_date,consultancy_end_date,consultancy_amount,consultancy_currency,consultancy_UR_percentage,consultancy_Tax_percentage,consultancy_consultants_percentage,consultancy_client_id,consultancy_progress,consultancy_adder) VALUES ('','','','',5000000,'',20,30,50,2,1,6)";
//$Insert =  mysqli_query($connect,$Insert);

$Insert = $connect -> prepare("INSERT INTO consultancy(consultancy_name,consultancy_sign_date,consultancy_start_date,
consultancy_end_date,consultancy_amount,consultancy_currency,consultancy_UR_percentage,
consultancy_Tax_percentage,consultancy_consultants_percentage,consultancy_client_id,consultancy_adder,consultancy_leader) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
$Insert->bind_param("ssssdsdddiii",$name,$now,$start_date,$end_date,$amount,$currency,$ur_charges,$tax_charges,
$consultant_charges,$client,$myId,$teamLeader);
$Insert->execute();
if($Insert)
{
    echo "A new consultancy is successfully recorded.";
}
else
{
    echo "A request failed.";
} 

?>