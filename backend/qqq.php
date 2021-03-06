<?php 
session_start();
$myId = $_SESSION['User_ID'];
include 'Database.php';
?>
<link rel="stylesheet" href="dist/css/w3.css">
<?php
$userId = $_POST['userId'];

// update message to readable message
$Update_Query="UPDATE message SET message_reads=1 WHERE (message.message_receiver_id=$myId AND message.message_sender_id=$userId)";
$Update_Answer=mysqli_query($connect,$Update_Query);

// doing our staff, first get the data of the receiver
$query="SELECT * FROM users WHERE users.user_id=$userId;";
$answer=mysqli_query($connect,$query);
while($line=mysqli_fetch_object($answer))
{
    $firstName=$line ->user_first_name;
    $lastName=$line ->user_last_name;
    $receiverProfileImage=$line ->user_profile_image;
}
// select all messages to load
$Message_Query = "SELECT * FROM message WHERE (message.message_receiver_id=$myId OR message.message_sender_id=$myId) AND (message.message_receiver_id=$userId OR message.message_sender_id=$userId) ORDER BY message.message_Id DESC LIMIT 100;";
$Message_Query = mysqli_query($connect,$Message_Query);
$Message_Count = mysqli_num_rows($Message_Query);
if($Message_Count == 0)
{
    echo "No conversion made so far";
}
else
{
    while($line=mysqli_fetch_object($Message_Query))
    {
        $Message_Id=$line ->message_id ;
        $Send_Messages=$line ->message_content;
        $Send_Image=$line ->message_img;
        $DocMessage=$line ->message_file_docs;
        $sender=$line ->message_sender_id ;
        $receiver=$line ->message_receiver_id ;
        $Reads=$line ->message_reads;
        $MessageTime=$line ->message_send_date;
        if($sender==$myId)
        {
            // my profile
            $myProfile="SELECT user_profile_image FROM users WHERE users.user_id=$myId";
            $myProfileAnswer=mysqli_query($connect,$myProfile);
            while($myProfileLine=mysqli_fetch_object($myProfileAnswer))
            {
                $myProfileImage=$myProfileLine ->user_profile_image;
            }
            ?>
            <span class="w3-right">
                <div class="direct-chat-msg right" style="width: 500px;">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Me</span>
                        <span class="direct-chat-timestamp pull-right">
                            <?php echo $MessageTime; ?>
                            <?php
                            if($Reads == 1)
							{
    							?>
                                <i class="fa fa-check" aria-hidden="true" style="font-size:15px; color:blue;"></i>
    							<?php
    						}
    						?>
                        </span>
                    </div>
                    <img class="direct-chat-img" src="<?php echo "backend/".$myProfileImage; ?>" alt="profile" style="width:40px; height:40px; object-fit:cover; object-position: 50% 0;">
                    <div class="direct-chat-text">
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
                        <span class="direct-chat-name pull-left"><?php echo $firstName; ?></span>
                        <span class="direct-chat-timestamp pull-right">
                            <?php echo $MessageTime; ?>
                        </span>
                    </div>
                    <img class="direct-chat-img" src="<?php echo "backend/".$receiverProfileImage; ?>" alt="profile" style="width:40px; height:40px; object-fit:cover; object-position: 50% 0;">

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