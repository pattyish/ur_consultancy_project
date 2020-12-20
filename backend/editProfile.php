<?php
session_start();
$myId = $_SESSION['User_ID'];
include 'Database.php';
// declaration of variables needed to insert a new user
$fname = $connect -> real_escape_string($_POST['']);
$lname = $connect -> real_escape_string($_POST['']);
$gender = $connect -> real_escape_string($_POST['']);
$national_id = $connect -> real_escape_string($_POST['']);
$password =  $connect -> real_escape_string($_POST['']);
//$email = $connect -> real_escape_string($_POST['']);
$password = md5($password);

// file to retrieve all existing consultants and show them in table with possible options
$update = $update -> prepare("UPDATE users SET users.user_first_name =? ,users.user_last_name =? 
,users.user_gender =?,users.user_national_id =?,users.user_email =?
,users.user_password =? WHERE users.user_id =? ");
$update = bind_param("ssssssi",$fname,$lname,$gender,$national_id,$email,$password,$myId);
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