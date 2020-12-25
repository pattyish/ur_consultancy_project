<?php
session_start();
$myId = $_SESSION['User_ID'];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user
$user_id = $_POST['user_id'];
$fname = $connect -> real_escape_string($_POST['fName']);
$lname = $connect -> real_escape_string($_POST['lName']);
$gender = $connect -> real_escape_string($_POST['gender']);
$national_id = $connect -> real_escape_string($_POST['natId']);
$email = $connect -> real_escape_string($_POST['userEmail']);
$email = strtolower($email);
$user_type_id = $connect -> real_escape_string($_POST['userType']);
$country = $_POST['country'];
$department = $_POST['department'];
$now = date("Y-m-d h:i:s");

// check uniqueness of Account info: Uname and Password
$query_check = "SELECT * FROM users WHERE (users.user_email='$email' OR users.user_national_id='$national_id') AND users.user_id != $user_id";
$query_check = mysqli_query($connect,$query_check);
$count_check = mysqli_num_rows($query_check);
if($count_check > 0)
{
    echo "<span class='text-red'>Neither email nor National ID can be replicated.</span>";
}
else
{
    // Query to update users info
    $Update = $connect ->prepare("UPDATE 
    users SET user_first_name = ?,user_last_name = ?,user_gender = ?,user_national_id = ?,user_email = ?,
    user_type_id = ?,user_country = ?,user_department = ? WHERE users.user_id= ? ");
    $Update -> bind_param("sssssiiii",$fname,$lname,$gender,$national_id,$email,$user_type_id,$country,$department,$user_id);
    $Update->execute();
    if($Update)
    {
        echo "Information has successfully changed";
    }
    else
    {
        echo "A request failed.";
    }
}  

?>