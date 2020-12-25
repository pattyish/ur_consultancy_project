<?php
session_start();
include 'Database.php';
$myId = $_SESSION['User_ID'];
$clientId = $_POST['clientId'];

// A query will disable the selected user
$disable = "UPDATE client SET client.client_status = 1 WHERE client.client_id = $clientId ";
$disable = mysqli_query($connect,$disable);
if($disable)
{
    echo "Reactivated.";
}
else
{
    echo "<i class='text-green'><b>Failed. Something went wrong.</b></i>";
}

?>