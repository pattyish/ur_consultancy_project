<?php
session_start();
include 'Database.php';
// declaration of variables needed to insert a new user
$userId = $connect -> real_escape_string($_POST['']);
$fname = $connect -> real_escape_string($_POST['']);
$lname = $connect -> real_escape_string($_POST['']);
$email = $connect -> real_escape_string($_POST['']);
$gender = $connect -> real_escape_string($_POST['']);
$national_id = $connect -> real_escape_string($_POST['']);
$status_id = $connect -> real_escape_string($_POST['']);
$type_id = $connect -> real_escape_string($_POST['']);

// file to retrieve all existing consultants and show them in table with possible options
$update = $update -> prepare("UPDATE users SET users.user_first_name =? ,users.user_last_name =? 
,users.user_gender =? ,users.user_national_id =? ,users.user_email =?
,users.user_status_id =? ,users.user_type_id =? WHERE users.user_id =? ");
$update = bind_param("sssssiii",$fname,$lname,$gender,$national_id,$email,$status_id,$type_id,$userId);
$update -> execute();
if($update)
{
    echo "Your profile changed.";
}
else
{
    echo "Request failed. Something went wrong.";
}
?>