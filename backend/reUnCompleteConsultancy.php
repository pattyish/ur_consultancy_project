<?php
session_start();
include 'Database.php';
$myId = $_SESSION['User_ID'];
$consultancy_id = $_POST['consultancy_id'];
$newEndDate = $_POST['newEndDate'];

// A query will disable the selected user
$disable = "UPDATE consultancy SET consultancy.consultancy_progress = 1, consultancy.consultancy_end_date = '$newEndDate' WHERE consultancy.consultancy_id = $consultancy_id ";
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