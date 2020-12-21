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
$random_number = rand(100000,999999);
$password1 = md5("".$random_number."".time()."".$email);
$password = password_hash($password1, PASSWORD_DEFAULT);
$status_id = 1;
$user_type_id = $connect -> real_escape_string($_POST['userType']);
$country = $_POST['country'];
$department = $_POST['department'];
$profile_image = "";

if($gender == 'M')
{
    $profile_image = "img/mimage.png";
}
else
{
    $profile_image = "img/fimage.png";
}

// check uniqueness of Account info: Uname and Password
$query_check = "SELECT * FROM users WHERE users.user_email='$email' OR users.user_national_id='$national_id'";
$query_check = mysqli_query($connect,$query_check);
$count_check = mysqli_num_rows($query_check);
if($count_check > 0)
{
    echo "Neither email nor National ID can be replicated.";
}
else
{
    // Query to insert into database
    $Insert = $connect ->prepare("INSERT INTO 
    users(user_first_name,user_last_name,user_gender,user_national_id,user_email,user_password,
    user_status_id,user_type_id,user_country,user_profile_image,user_adder_id,user_department )
     VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
    $Insert -> bind_param("ssssssiiisii",$fname,$lname,$gender,$national_id,$email,$password,$status_id,$user_type_id,$country,$profile_image,$myId,$department );
    $Insert->execute();
    if($Insert)
    {
        echo "A new user is successfully added";
        // send email to new user to let him/her know he has been added i =n the system
        $to = "";
        $subject = "";
        $message = "";
        $header = "";
        //mail($to,$subject,$message);
    }
    else
    {
        echo "A request failed.";
    }
}  

?>