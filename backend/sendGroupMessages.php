<?php
session_start();
if(!(isset($_SESSION['User_ID'])))
{
	?>
	<script>
        alert("First login");
        window.location.href='login.php';</script>
	<?php
}
else
{
    ?>
    <link rel="stylesheet" href="dist/css/css_style.css">
    <?php
	// detecting links
    include 'detectLinks.php';
	include 'Database.php';
	$Message= $connect -> real_escape_string($_POST['messageContent']);
	//$Message=nl2br($Message);
	$myId = $_SESSION['User_ID'];
    $groupId = intval($_POST['groupId']);
	$now = date("Y-m-d h:i:s");

	include 'timeDifference.php'; // function to find timeCounter() 

    // doing our staff

    //insert into message table
	$Insert_Query = $connect ->prepare("INSERT INTO group_mesages
                    (group_mesages_content,group_mesages_sendDate,group_mesages_sender,group_mesages_groupTo) 
                    VALUES(?,?,?,?)");
    $Insert_Query -> bind_param("ssii",$Message,$now,$myId,$groupId);
    $Insert_Query -> execute();
    if(!$Insert_Query)
    {
    echo "Message is not sent. Something went wrong";
    }
    else
    { 
        //get messages to display
        $Message_Query = "SELECT * FROM group_mesages INNER JOIN users INNER JOIN chat_group ON 
        group_mesages.group_mesages_sender = users.user_id AND group_mesages.group_mesages_groupTo = chat_group.chat_group_id WHERE group_mesages.group_mesages_groupTo = $groupId 
        ORDER BY group_mesages.group_mesages_id DESC LIMIT 100;";
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
} // end of else
?>