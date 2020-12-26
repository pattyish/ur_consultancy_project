<?php
session_start();
include 'backend/Database.php';
if(!(isset($_SESSION['User_ID'])))
{
    ?>
    <script>
        window.location.href='_pages/login.php';
    </script>
    <?php
}
else if(isset($_SESSION['User_ID']))
{
    $myId = $_SESSION['User_ID'];
    // update all needed information
    // keep use online
    $bynow = date("Y-m-d H:i:s");
    $byno = date("Y-m-d", strtotime("yesterday"));
    $lastActive = "UPDATE users SET user_last_active= '$bynow' WHERE user_id=$myId";
    $lastActive = mysqli_query($connect,$lastActive);
    
    // complete all consultancies whose end date is yesterday
    $complete = "UPDATE consultancy SET consultancy.consultancy_progress = 2 WHERE consultancy.consultancy_end_date <= '$byno'";
    $complete = mysqli_query($connect,$complete);
 
    // complete all consultants contract whose end date is yesterday
    //$completeContract = "UPDATE consultant_contract SET consultant_contract.contract_progress_id = 2 WHERE consultant_contract.contract_end_date = '$byno'";
    //$completeContract = mysqli_query($connect,$completeContract);

    // This query is to replace session when every time a user loads
    $myInfoQuery = "SELECT * FROM users INNER JOIN user_type INNER JOIN country INNER JOIN department ON users.user_type_id = user_type.user_type_id 
    AND users.user_country = country.country_id AND users.user_department = department.department_id
     WHERE (users.user_id = '$myId') AND users.user_status_id= 1";
    $myInfoQuery = mysqli_query($connect,$myInfoQuery);
    while($line=mysqli_fetch_object($myInfoQuery)) // get results in loop
    {
        $MYUserId= $line -> user_id;
        $MYFirstname= $line -> user_first_name;
        $MYLastname= $line -> user_last_name;
        $MYUser_Gender= $line -> user_gender;
        $MYUserEmail= $line -> user_email;
        $MYUserPassword= $line -> user_password;
        $MYUserType= $line -> user_type_id;
        $MYUserTypeName= $line -> user_type;
        $MYUserNational_id= $line -> user_national_id;
        $MYCountryId= $line -> country_id;
        $MYCountry= $line -> country_name;
        $MYUserProfileImage= $line -> user_profile_image;
        $MYuser_adder_id= $line -> user_adder_id;
        $MYuser_location= $line -> user_location;
        $MYuser_education= $line -> user_education;
        $MYuser_summary= $line -> user_summary;
        $MYuser_phone= $line -> user_phone;
        $MYuser_last_active= $line -> user_last_active;
        $MYdepartment_id= $line -> department_id;
        $MYdepartment_name= $line -> department_name;
    }
}

?>
<!DOCTYPE html>
<html>
<?php
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UR Consultancy | Dashboard</title>
    <link rel="shortcut icon" href="backend/img/logo.JPG" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="dist/css/w3.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Select2 -->
    <!-- my style-->
    <link rel="stylesheet" href="dist/css/css_style.css">
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script src="Jquery/jquery.js"></script>
        <script src="js/myJs.js"></script>
	    <script src="Jquery/jquery.form.min.js"></script>

        <script>
        // autoLoad
        function AutloadMessages()
        {
            $.ajax({
                type: "POST",
                url: "refresh.php",
                success: function(data){
                    $("#userToChatWith").html(data);
                }
            });
        }
        AutloadMessages();
        setInterval(function () {
            AutloadMessages(); 
        }, 5000); 

    </script>
</head>