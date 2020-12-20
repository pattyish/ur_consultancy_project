<?php
session_start();
$myId = $_SESSION[''];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user
$consultancy_id = $connect -> real_escape_string($_POST['']);
$consultant_id = // select according to Nat Id chosen
$start_date = $connect -> real_escape_string($_POST['']);
$end_date = $connect -> real_escape_string($_POST['']);
$contract_amount = $connect -> real_escape_string($_POST['']);*
$assigner = $myId;
$now = date("Y:m:d h:i:s");
$status_id = 1;

// Query to insert into database
$Insert=$connect ->prepare("INSERT INTO consultant_contract(contract_consultancy_id,contract_consultant_id,contract_sign_date,
contract_start_date,contract_end_date,contract_amount,contract_assigner_id) 
 VALUES(?,?,?,?,?,?,?)");
$Insert->bind_param("iisssii",$consultancy_id,$consultant_id,$now,$start_date,$end_date,$contract_amount,$assigner);
$Insert->execute();
if($Insert)
{
    echo "A new contract is successfully signed";
    // send email to the consultant to let him/her know that s/he has been assigned a task
    $subject = "";
    $message = "";
    $headers = ;
    $to = ;
   // if(mail($to,$subject,$message,$headers))
}
else
{
    echo "A request failed. Something went wrong.";
} 

?>