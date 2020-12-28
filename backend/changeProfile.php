<?php
session_start();
$myId = $_SESSION['User_ID'];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user
$fname = $connect -> real_escape_string($_POST['fName']);
$lname = $connect -> real_escape_string($_POST['lName']);
$gender = $connect -> real_escape_string($_POST['gender']);
$national_id = $connect -> real_escape_string($_POST['natId']);
$email = $connect -> real_escape_string($_POST['userEmail']);
$email = strtolower($email);
$userType = $_POST['userType'];
$country = $_POST['country'];
$department = $_POST['department'];
$location = $connect -> real_escape_string($_POST['userLocation']);
$education = $connect -> real_escape_string($_POST['userEducation']);
$summary = $connect -> real_escape_string($_POST['userSummary']);
$userPhone = $connect -> real_escape_string($_POST['userPhone']);

// Query to insert into database
/*$Update = $connect ->prepare("UPDATE users SET user_first_name=? ,user_last_name=?,
         user_gender=?, user_email=?, user_country=? , user_department=? , user_location=?, 
         user_education=?, user_summary=?, user_phone=? WHERE users.user_id=? ");
$Update -> bind_param("ssssiissssi",$fname,$lname,$gender,$email,$country,$department,$location,
$education,$summary,$userPhone,$myId);
$Update->execute();
*/
$Update= " UPDATE users SET user_first_name='$fname', user_last_name='$lname',
 user_gender='$gender', user_email='$email', user_country=$country, user_department=$department,
  user_location='$location', user_education='$education', user_summary='$summary', user_phone='$userPhone' WHERE
  users.user_id= $myId";
$Update = mysqli_query($connect,$Update);
if($Update)
{
    echo "Profile is successfully changed.";
}
else
{
    echo "<i class='text-red'>A request failed. You may be using email or ID which are already exist.</i>";
}
?>