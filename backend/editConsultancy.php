<?php
session_start();
$myId = $_SESSION['User_ID'];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user
$consultancyId = $connect -> real_escape_string($_POST['consultancyId']);
$name = $_POST['name'];
$start_date = $connect -> real_escape_string($_POST['start_date']);
$end_date = $connect -> real_escape_string($_POST['end_date']);
$amount = $_POST['amount'];
$teamLeader = $_POST['teamLeader'];
$currency = $connect -> real_escape_string($_POST['currency']);
$ur_charges = $_POST['ur_charges'];
$tax_charges = $_POST['tax_charges'];
$consultant_charges = 100 - ($ur_charges + $tax_charges);
$client = $_POST['client'];
$now = date("Y-m-d h:i:s");
$status_id = 1;

$Update = $connect -> prepare("UPDATE consultancy SET consultancy_name=?, consultancy_start_date=?, consultancy_end_date=?, 
consultancy_amount=?, consultancy_currency=?, consultancy_UR_percentage=?, consultancy_Tax_percentage=?, 
consultancy_consultants_percentage=?, consultancy_client_id=?, consultancy_leader=?  WHERE consultancy_id=? ");
$Update->bind_param("sssdsdddiii",$name,$start_date,$end_date,$amount,$currency,$ur_charges,$tax_charges,$consultant_charges,$client,$teamLeader,$consultancyId);
$Update->execute();
if($Update)
{
    echo "Changes applied.";
}
else
{
    echo "A request failed. Something went wrong";
} 

?>