<?php 
// select all people that I can chat with
$retrieve = "SELECT * FROM users INNER JOIN user_type ON users.user_type_id = user_type.user_type_id AND users.user_status_id = 1 ORDER BY users.user_first_name ASC ";
$retrieve = mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
if($retrieveCount > 0)
{
    while($lineRetrieve = mysqli_fetch_object($retrieve))
    {
        $user_id = $lineRetrieve -> user_id;
        $fName = $lineRetrieve -> user_first_name;
        $lName = $lineRetrieve -> user_last_name;
        $gender = $lineRetrieve -> user_gender;
        $natId = $lineRetrieve -> user_national_id;
        $email = $lineRetrieve -> user_email;
        $user_type = $lineRetrieve -> user_type;
        $user_profile_image = $lineRetrieve -> user_profile_image;
        if($user_id == $myId)
        {
            continue;
        }
        // get number of unreads message for each user
        $Unread_Query="SELECT COUNT(*) AS nbr FROM message WHERE (message.message_receiver_id =$myId AND message.message_sender_id =$user_id) AND message.message_reads = 2 ";
        $Unread_Answer=mysqli_query($connect,$Unread_Query);
        while($Unread_Line=mysqli_fetch_object($Unread_Answer))
        {
            $Unreads_Number=$Unread_Line ->nbr;
        }
        ?>
        <li class="userToChat" value="<?php echo $user_id; ?>" username="<?php echo $fName; ?>">
            <img src="<?php echo "backend/".$user_profile_image; ?>" alt="User Image" style="width:60px; height:60px; object-fit:cover; object-position: 50% 0;">
            <a class="users-list-name"  href="#"><?php echo $fName; ?></a>
            <span class="users-list-date">
                <?php echo $user_type; ?>
                <span class="w3-badge w3-green">
                    <?php if($Unreads_Number>0){echo $Unreads_Number;} else{} ?> 
                </span></span>
            
        </li>
        <?php
    }
}
else
{
    echo "No users to chat with.";
}
include 'backend/jsForChatting.php';
?>

