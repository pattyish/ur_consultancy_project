<?php
session_start();
$myId = $_SESSION['User_ID'];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user

$groupId = $_POST['groupId'];
$member_id  = $_POST['userId'];
$now = date("Y-m-d H:i:s");

// check if this user is not already a group member
$query_check = "SELECT * FROM group_members WHERE group_members.group_id = $groupId AND group_members.member_id = $member_id ";
$query_check = mysqli_query($connect,$query_check);
$count_check = mysqli_num_rows($query_check);
if($count_check > 0)
{
    echo "Chosen user is already a group member.";
}
else
{
     // Query to add the group
     $Insert=$connect ->prepare("INSERT INTO group_members(group_id,member_id,join_date)
     VALUES (?,?,?)");
    $Insert->bind_param("iis",$groupId,$member_id,$now);
    $Insert->execute();
    if($Insert)
    {
        echo "A new member is added";
    }
    else
    {
        echo "A request failed. Something went wrong.";
    }
}

?>