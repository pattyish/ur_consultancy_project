<?php
session_start();
$myId = $_SESSION['User_ID'];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user
$groupName = $connect -> real_escape_string($_POST['groupName']);
$description = $connect -> real_escape_string($_POST['description']);
$now = date("Y-m-d H:i:s");

$admin = "SELECT * FROM users WHERE users.user_type_id = 1 AND users.user_status_id = 1";
$admin = mysqli_query($connect,$admin);
while($line=mysqli_fetch_object($admin))
{
    $user_id=$line ->user_id ;
}

// check uniqueness of group info
$query_check = "SELECT * FROM chat_group WHERE chat_group.chat_group_name='$groupName' AND chat_group.chat_group_status = 1";
$query_check = mysqli_query($connect,$query_check);
$count_check = mysqli_num_rows($query_check);
if($count_check > 0)
{
    echo "Group name has been taken.";
}
else
{
    // Query to add the group
    $Insert=$connect ->prepare("INSERT INTO chat_group(chat_group_name,chat_group_create_date,chat_group_creator,chat_group_description)
     VALUES (?,?,?,?)");
    $Insert->bind_param("ssis",$groupName,$now,$myId,$description);
    $Insert->execute();
    if($Insert)
    {
        echo "A new group is created";
        
        // get this new created group
        $get = "SELECT MAX(chat_group_id) as recent FROM chat_group;";
        $get = mysqli_query($connect,$get);
        while($getLine = mysqli_fetch_object($get))
        {
            $group_id = $getLine -> recent;  
        }

        // Query to add admin in the group
        $add=$connect ->prepare("INSERT INTO group_members(group_id,member_id,join_date)
        VALUES (?,?,?)");
        $add->bind_param("sis",$group_id,$myId,$now);
        $add->execute();

        // Query to add admin of the system in the group
        $group_members_status = 2; 
        $add=$connect ->prepare("INSERT INTO group_members(group_id,member_id,join_date,group_members_status)
        VALUES (?,?,?)");
        $add->bind_param("sisi",$group_id,$user_id,$now,$group_members_status);
        $add->execute();
    }
    else
    {
        echo "A request failed. Something went wrong.";
    }
}  

?>