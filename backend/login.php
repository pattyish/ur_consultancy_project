<?php
session_start();
include 'Database.php'; // include database connection
$UserEmail = $connect -> real_escape_string($_POST['uName']);
$UserPass = $connect -> real_escape_string($_POST['password']);
// check user account info
$Query_check = "SELECT * FROM users INNER JOIN user_type INNER JOIN country INNER JOIN department ON users.user_type_id = user_type.user_type_id 
                AND users.user_country = country.country_id AND users.user_department = department.department_id
                 WHERE (users.user_email = '$UserEmail')";
$Answer_check = mysqli_query($connect,$Query_check);
$Count_check = mysqli_num_rows($Answer_check);
if($Count_check == 0)
{
    echo "Oops, user is not found!<br>";
}
else
{
    while($line=mysqli_fetch_object($Answer_check)) // get results in loop
    {
        $UserId= $line -> user_id;
        $Firstname= $line -> user_first_name;
        $Lastname= $line -> user_last_name;
        $User_Gender= $line -> user_gender;
        $UserEmail= $line -> user_email;
        $UserPassword= $line -> user_password;
        $UserType= $line -> user_type_id;
        $UserTypeName= $line -> user_type;
        $UserNational_id= $line -> user_national_id;
        $CountryId= $line -> country_id;
        $Country= $line -> country_name;
        $UserProfileImage= $line -> user_profile_image;
        $user_adder_id= $line -> user_adder_id;
        $user_location= $line -> user_location;
        $user_education= $line -> user_education;
        $user_summary= $line -> user_summary;
        $user_phone= $line -> user_phone;
        $user_last_active= $line -> user_last_active;
        $department_name= $line -> department_name;
    }

    if(password_verify($UserPass,$UserPassword)) // verify if the password entered matches with a hash
    {
        $_SESSION['FirstName']=$Firstname;
        $_SESSION['LastName']=$Lastname;
        $_SESSION['User_ID']=$UserId;
        $_SESSION['UserEmail']=$UserEmail;
        $_SESSION['Gender']=$User_Gender;
        $_SESSION['UserPassword']=$UserPassword;
        $_SESSION['UserEmail']=$UserEmail;
        $_SESSION['UserType']=$UserType;
        $_SESSION['UserTypeName']=$UserTypeName;
        $_SESSION['UserNational_id']=$UserNational_id;
        $_SESSION['CountryId']=$CountryId;
        $_SESSION['Country']=$Country;
        $_SESSION['UserProfileImage']=$UserProfileImage;
        $_SESSION['UserLocation']=$user_location;
        $_SESSION['UserEducation']=$user_education;
        $_SESSION['UserSummary']=$user_summary;
        $_SESSION['UserPhone']=$user_phone;
        $_SESSION['UserLastAct']=$user_last_active;
        $_SESSION['UserDepartment']=$department_name;

        echo "Welcome, ".$_SESSION['FirstName']; // Feedback to the user.
        if($UserType == 1) // if admin
        {
            ?>
            <script>window.location.href='../index.php';</script>
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
        echo "Oops, none matches your input!". password_hash($UserPass, PASSWORD_DEFAULT);
    }
}
?>
