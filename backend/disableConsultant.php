<?php
session_start();
include 'Database.php';
$myId = $_SESSION['User_ID'];
$userId = $_POST['userId'];
if($myId == $userId)
{
    echo " Sorry, you can not delete yourself";
}
else
{
    // A query will disable the selected user
    $disable = "UPDATE users SET users.user_status_id = 2 WHERE users.user_id = $userId ";
    $disable = mysqli_query($connect,$disable);
    if($disable)
    {
        echo "Success";
    }
    else
    {
        echo "<i class='text-green'><b>Failed. Something went wrong.</b></i>";
    }
}

?>