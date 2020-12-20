<?php
session_start();
$myId = $_SESSION[''];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user
$name = $connect -> real_escape_string($_POST['']);
$ = $connect -> real_escape_string($_POST['']);
$ = $connect -> real_escape_string($_POST['']);
$ = $connect -> real_escape_string($_POST['']);
$ = $connect -> real_escape_string($_POST['']);
$now = date("Y:m:d h:i:s");
$status_id = 1;

// Query to insert into database
$Insert=$connect ->prepare("INSERT INTO consultancy(consultancy_name,consultancy_sign_date,consultancy_start_date,consultancy_end_date,consultancy_amount,consultancy_currency,consultancy_UR_percentage,consultancy_Tax_percentage,consultancy_consultants_percentage,consultancy_client_id) 
 VALUES(?,?,?,?,?,?,?,?,?,?)");
$Insert->bind_param("ssssisiiii",$name,$d);
$Insert->execute();
if($Insert)
{
    echo "A new consultancy is successfully saved";
    // send email to the consultant to let him/her know that s/he has been assigned a task
    $subject = "";
    $message = "";
    $headers = ;
    $to = ;
   // if(mail($to,$subject,$message,$headers))
}
else
{
    echo "A request failed.";
} 

?>