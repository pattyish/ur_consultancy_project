<?php
session_start();
include 'Database.php';
$myId = $_SESSION['User_ID'];
$userId = $_POST['userId'];
$groupId = $_POST['groupId'];
// A query will disable the selected user
$enable = "UPDATE group_members SET group_members.group_members_status = 1 WHERE 
            group_members.member_id = $userId AND group_members.group_id = $groupId";
$enable = mysqli_query($connect,$enable);
if($enable)
{
    echo "Enabled";
}
else
{
    echo "Failed";
}

?>