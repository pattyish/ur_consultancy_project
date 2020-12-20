<?php
session_start();
include 'Database.php'; // include database connection
$UserEmail=$connect -> real_escape_string($_POST['email']);
$UserPass=$connect -> real_escape_string($_POST['Upass']);
// check user account info
$Query_check = "SELECT * FROM users WHERE (users.user_email = '$UserEmail')";
$Answer_check = mysqli_query($connect,$Query_check);
$Count_check = mysqli_num_rows($Answer_check);
if($Count_check == 0)
{
    echo "Oops, user is not found!";
}
else
{
    while($line=mysqli_fetch_object($Answer_check)) // get results in loop
    {
        $UserId= $line -> user_id;
        $Firstname= $line -> user_first_name;
        $Lastname= $line -> user_last_name;
        $UserEmail= $line -> user_email;
        $UserPassword= $line -> user_password;
        $UserType= $line -> user_type_id;
        $UserNational_id= $line -> user_national_id;
        $UserProfileImage= $line -> user_profile_image;
        $user_adder_id= $line -> user_adder_id;
    }

    if(password_verify($UserPass,$UserPassword)) // verify if the password entered matches with a hash
    {
        $_SESSION['FirstName']=$Firstname;
        $_SESSION['LastName']=$Lastname;
        $_SESSION['User_ID']=$UserId;
        $_SESSION['UserEmail']=$UserEmail;
        $_SESSION['UserPassword']=$UserPassword;
        $_SESSION['UserEmail']=$UserEmail;
        $_SESSION['UserType']=$UserType;
        $_SESSION['UserNational_id']=$UserNational_id;
        $_SESSION['UserProfileImage']=$UserProfileImage;

        echo "Welcome. ".$_SESSION['FirstName']; // Feedback to the user.
        if($UserType == 1) // if admin
        {
            ?>
            <script>window.location.href='admin/Home';</script>
            <?php
        }
        else if($UserType == 2) // if BDSC
        {
            ?>
            <script>window.location.href='bdsc/Home';</script>
            <?php
        }
        else if($UserType == 3) // if normal consultant
        {
            ?>
            <script>window.location.href='consultant/HomeConsultant';</script>
            <?php
        }
        else
        {
            echo "Sorry, something went wrong";
        }
    }
    else
    {
        echo "Oops, incorrect username or password!";
    }
}
?>
