<?php
session_start();
include 'Database.php';
$Username = $connect ->real_escape_string($_POST['UserName']);
$MyId = $_SESSION['User_ID'];

// get my buddies list  
$Get_Query = "SELECT * FROM users WHERE users.user_first_name LIKE '%$Username%' OR users.user_last_name LIKE '%$Username%'";
$Get_Answer = mysqli_query($connect,$Get_Query);
$Get_Count = mysqli_num_rows($Get_Answer);
if($Get_Count == 0)
{
    echo " No data matches with your input ";
}
else
{
    while($line = mysqli_fetch_object($Get_Answer))
    {
        $Accepter_Id = $line -> Accepter_Id;
        $FriendName = $line -> Friend_GivenName;
    }
}
?>