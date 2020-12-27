<?php 
session_start();
$myId = $_SESSION['User_ID'];
include 'Database.php';

$groupId = intval($_POST['groupId']);

// select all messages to load
$Message_Query = "SELECT * FROM group_mesages WHERE group_mesages.group_mesages_groupTo =$groupId ORDER BY group_mesages.group_mesages_id DESC LIMIT 100 ";
$Message_Query = mysqli_query($connect,$Message_Query);
$Message_Count = mysqli_num_rows($Message_Query);
if($Message_Count == 0)
{
    echo "No conversion made in this group";
}
else
{
   //get messages to display
   $Message_Query = "SELECT * FROM group_mesages INNER JOIN users INNER JOIN chat_group ON 
   group_mesages.group_mesages_sender = users.user_id AND group_mesages.group_mesages_groupTo = chat_group.chat_group_id
   WHERE group_mesages.group_mesages_groupTo = $groupId ORDER BY group_mesages.group_mesages_id DESC LIMIT 100;";
   $Message_Answer=mysqli_query($connect,$Message_Query);
   while($line=mysqli_fetch_object($Message_Answer))
   {
       $Message_Id=$line ->group_mesages_id ;
       $Send_Messages=$line ->group_mesages_content;
       $Send_Image=$line ->group_mesages_img;
       $DocMessage=$line ->group_mesages_doc;
       $sender=$line ->group_mesages_sender;
       $sender_first_name=$line ->user_first_name;
       $sender_last_name=$line ->user_last_name;
       $sender_profile=$line ->user_profile_image;
       $sender_type=$line ->user_type_id;
       $creator=$line ->chat_group_creator;
       $MessageTime=$line ->group_mesages_sendDate;
       if($sender==$myId)
       {
       ?>
       <span class="w3-right">
            <div class="direct-chat-msg right" style="width: 500px;">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Me</span>
                    <span class="direct-chat-timestamp pull-right"><?php echo $MessageTime; ?></span>
                </div>
                <img class="direct-chat-img" src="<?php echo "backend/".$sender_profile; ?>" alt="profile">
                <div class="direct-chat-text w3-green">
                <?php echo $Send_Messages; ?>
                </div>
            </div>
        </span>
       <?php
       }
       else
       {
       ?>
       <span class="w3-left">
            <div class="direct-chat-msg" style="width: 500px;">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">
                        <?php 
                            echo $firstName." "; 
                            if($creator == $sender)
                            {
                                echo "Admin "; 
                            }
                            if($sender_type == 1)
                            {
                                echo "(Dir.) "; 
                            }
                            else if($sender_type == 2)
                            {
                                echo "(BDCS) "; 
                            }
                            else if($sender_type == 3)
                            {
                                echo " "; 
                            }
                        ?>
                    </span>
                    <span class="direct-chat-timestamp pull-right"><?php echo $MessageTime; ?></span>
                </div>
                <img class="direct-chat-img" src="<?php echo "backend/".$sender_profile; ?>" alt="profile">

                <div class="direct-chat-text">
                    <?php echo $Send_Messages; ?>
                </div>
            </div>
        </span>
       <?php 
       }
   }
}

?>