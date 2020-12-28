<?php
session_start();
include 'Database.php';
$myId = $_SESSION['User_ID'];
$userId = $_POST['userId'];
$groupId = $_POST['groupId'];
// A query will disable the selected user
$disable = "UPDATE group_members SET group_members.group_members_status = 2 WHERE 
            group_members.member_id = $userId AND group_members.group_id = $groupId";
$disable = mysqli_query($connect,$disable);
if($disable)
{
    echo "Disabled";
}
else
{
    echo "Failed";
}

?>