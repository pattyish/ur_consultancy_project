<?php
session_start();
$myId = $_SESSION['User_ID'];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user

$groupId = $_POST['groupId'];
$now = date("Y-m-d H:i:s");

// Select all membbers of the group selected
$query_check = "SELECT * FROM group_members INNER JOIN users INNER JOIN chat_group ON
                 group_members.member_id = users.user_id AND group_members.group_id = chat_group.chat_group_id 
                 WHERE group_members.group_id = $groupId ORDER BY users.user_first_name ASC";
$query_check = mysqli_query($connect,$query_check);
$count_check = mysqli_num_rows($query_check);
if($count_check < 0)
{
    echo "Group has no other members.";
}
else
{
    ?>
    <table>
    <?php
    while($lineMember = mysqli_fetch_object($query_check))
    {
        $user_id = $lineMember -> user_id;
        $user_first_name = $lineMember -> user_first_name;
        $user_last_name = $lineMember -> user_last_name;
        $user_profile_image = $lineMember -> user_profile_image;
        $group_members_status = $lineMember -> group_members_status;
        $user_type_id = $lineMember -> user_type_id;
        $group_id = $lineMember -> group_id;
        $chat_group_creator = $lineMember -> chat_group_creator;
        if($user_id != $myId)
        {
            // script to enable and disable is written below down there
        ?>
            <tr><td style="padding-right: 20px; padding-bottom: 10px;">
            <img class="profile-user-img img-responsive img-circle"
                                src="<?php echo "backend/".$user_profile_image; ?>" alt="User profile picture"
                                style="width:90px; height:90px; object-fit:cover; object-position: 50% 0;"> &nbsp;
            <?php echo $user_first_name." ".$user_last_name; ?></td>
            <td>
            <?php
            if($chat_group_creator == $myId)
            {
                if($group_members_status == 1)
                {
                    ?>
                    <i class="fa fa-check bg-green"></i> &nbsp; 
                    <button id="DTU<?php echo $user_id; ?>" class="btn btn-danger disableGroupMember" userId="<?php echo $user_id; ?>" groupId="<?php echo $group_id; ?>">
                    Disable</button>
                    <?php
                }
                else if($group_members_status == 2)
                {
                    ?>
                    <i class="fa fa-times bg-red"></i> &nbsp; 
                    <button id="ETU<?php echo $user_id; ?>" class="btn btn-success enableGroupMember" userId="<?php echo $user_id; ?>" groupId="<?php echo $group_id; ?>">
                    Enable</button>
                    <?php
                }
                // let them know, this id Director
                if($user_type_id == 1)
                {
                    ?>
                    <i class="text-blue text-bold">Dir.</i>
                    <?php
                }
            }   
            ?>
            </td></tr>
        <?php
       } 
    }
    ?>
    </table>
    <?php
}
?>
<script>
$(document).ready(function(){
    //Disable any group member
    $(".disableGroupMember").on("click",function(){
        var userId= $(this).attr("userId");
        var groupId= $(this).attr("groupId");
            
        $("#DTU"+userId).html("Disabling..");
        $.ajax({
            type: "post",
            url: "backend/disableGroupMember.php",
            data: {groupId : groupId, userId : userId},
            success: function(response)
            {
                $("#DTU"+userId).html(response);
                $("#DTU"+userId).attr("disabled", true);
            }
        }); 
    });

    //Enable any group member
    $(".enableGroupMember").on("click",function(){
        var userId= $(this).attr("userId");
        var groupId= $(this).attr("groupId");
            
        $("#ETU"+userId).html("Enabling..");
        $.ajax({
            type: "post",
            url: "backend/enableGroupMember.php",
            data: {groupId : groupId, userId : userId},
            success: function(response)
            {
                $("#ETU"+userId).html(response);
                $("#ETU"+userId).attr("disabled", true);
            }
        }); 
    });
});
</script>
