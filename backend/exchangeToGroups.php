<?php 
session_start();
// this file is loaded when a user clicks on view partners
$myId = $_SESSION['User_ID'];
include 'Database.php';
// select all people that I can chat with
$retrieve = "SELECT * FROM chat_group INNER JOIN group_members INNER JOIN users 
            ON chat_group.chat_group_id = group_members.group_id AND
             users.user_id = chat_group.chat_group_creator WHERE group_members.member_id = $myId
              AND chat_group.chat_group_status = 1 ORDER BY chat_group.chat_group_name ASC ";
$retrieve = mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
?>
<ul class="users-list clearfix" id="groupsToChatWith">
<?php
if($retrieveCount > 0)
{
    while($lineRetrieve = mysqli_fetch_object($retrieve))
    {
        $chat_group_id = $lineRetrieve -> chat_group_id;
        $chat_group_name = $lineRetrieve -> chat_group_name;
        $chat_group_description = $lineRetrieve -> chat_group_description;
        $join_date = $lineRetrieve -> join_date;
        $chat_group_create_date = $lineRetrieve -> chat_group_create_date;
        $chat_group_creator_id = $lineRetrieve -> chat_group_creator;
        $chat_group_creator = $lineRetrieve -> user_first_name;
        // get number of unreads message for each user
        /*$Unread_Query="SELECT COUNT(*) AS nbr FROM group_mesages 
                        WHERE (group_mesages.group_mesages_groupTo  =$chat_group_id AND
                        group_mesages.group_mesages_sender  != $myId)";
        $Unread_Answer=mysqli_query($connect,$Unread_Query);
        while($Unread_Line=mysqli_fetch_object($Unread_Answer))
        {
            $Unreads_Number=$Unread_Line ->nbr;
        } */
        ?>
        <li class="groupToChat" value="<?php echo $chat_group_id; ?>" groupname="<?php echo $chat_group_name; ?>" 
        creator="<?php echo $chat_group_creator_id; ?>" me="<?php echo $myId; ?>">
            <img src="<?php echo "backend/img/groups.jpg"; ?>" alt="Group Image" style="width:60px; height:60px; object-fit:cover; object-position: 50% 0;">
            <a class="users-list-name groupToChat" href="#">
                <?php echo $chat_group_name; ?>
            </a>
            <small class="users-list-date">
                <?php echo $chat_group_creator; ?>
                <!--
                <span class="w3-badge w3-green">
                    <?php //if($Unreads_Number>0){echo $Unreads_Number;} else{} ?> 
                </span>
                -->
            </small>
            
        </li>
        <?php
    }
}
else
{
    echo "No groups belong to you.";
}
?>
</ul>
<?php
include 'jsForChatting.php';
?>

