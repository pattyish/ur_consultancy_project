<?php 
session_start();
$myId=$_SESSION['User_ID'];
include 'Database.php';
$OP=$connect ->real_escape_string($_POST['OP']);
$NP=$connect ->real_escape_string($_POST['NP']);
$NP=password_hash($NP, PASSWORD_DEFAULT);
$CNP=$connect ->real_escape_string($_POST['CNP']);

// Get the old password of mine
$Get_Query="SELECT * FROM users WHERE users.user_id=$myId";
$Get_Answer=mysqli_query($connect,$Get_Query);
while($Get_Line=mysqli_fetch_object($Get_Answer))
{
    $OldPass=$Get_Line ->user_password;
}
if(password_verify($OP,$OldPass))
{
    //Update query
    $Update_Query="UPDATE users SET users.user_password='".$NP."' WHERE users.User_Id=$myId";
    $Update_Answer=mysqli_query($connect,$Update_Query);
    if($Update_Answer)
    {
        ?>
        <b><i class="text-green">Password Changed</i></b>
        <?php
    }
}
else
{
    ?>
    <b><i class="text-red">Current Password you have entered is incorrect</i></b>
    <?php	
}
?>