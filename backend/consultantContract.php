<?php
session_start();
$myId = $_SESSION['User_ID'];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user
$consultancy_id  = $_POST['consultancy_id'];
$consultant_id = $_POST['consultant_id'];
$start_date = $connect -> real_escape_string($_POST['start_date']);
$end_date = $connect -> real_escape_string($_POST['end_date']);
$amount = $_POST['amount'];
$now = date("Y-m-d h:i:s");
$status_id = 1;

$Insert = $connect -> prepare("INSERT INTO consultant_contract(contract_consultancy_id,contract_consultant_id,contract_sign_date,contract_start_date,
contract_end_date,contract_amount,contract_assigner_id) VALUES (?,?,?,?,?,?,?)");
$Insert->bind_param("iisssdi",$consultancy_id,$consultant_id,$now,$start_date,$end_date,$amount,$myId);
$Insert->execute();
if($Insert)
{
    echo "A contract is successfully recorded.";
}
else
{
    echo "A request failed.";
} 

?>