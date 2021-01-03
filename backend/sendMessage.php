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
	// detecting links
    include 'detectLinks.php';
	include 'Database.php';
	$Message= $_POST['messageContent'];
	//$Message=nl2br($Message);
	$myId = $_SESSION['User_ID'];
	$receiverId = $_POST['userId'];
	$now = date("Y-m-d h:i:s");

	include 'timeDifference.php'; // function to find timeCounter() 

    // doing our staff, first get the data of the receiver
	$query="SELECT * FROM users WHERE users.user_id=$receiverId;";
	$answer=mysqli_query($connect,$query);
	while($line=mysqli_fetch_object($answer))
	{
        $firstName=$line ->user_first_name;
        $lastName=$line ->user_last_name;
        $receiverProfileImage=$line ->user_profile_image;
	}
	//insert into message table
	$Insert_Query = $connect ->prepare("INSERT INTO message(message_content,message_send_date,message_sender_id,message_receiver_id) 
					VALUES(?,?,?,?)");
	$Insert_Query -> bind_param("ssii",$Message,$now,$myId,$receiverId);
	$Insert_Query -> execute();
	if(!$Insert_Query)
	{
		echo "Message is not sent. Something went wrong";
	}
	else
	{ 
		$Message_Query="SELECT * FROM message WHERE (message.message_receiver_id =$myId OR message.message_sender_id =$myId) AND (message.message_receiver_id =$receiverId OR message.message_sender_id =$receiverId) ORDER BY message.message_id DESC LIMIT 10;";
		$Message_Answer=mysqli_query($connect,$Message_Query);
		while($line=mysqli_fetch_object($Message_Answer))
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
							<span class="direct-chat-timestamp pull-right"><?php echo $MessageTime; ?></span>
						</div>
						<img class="direct-chat-img" src="<?php echo "backend/".$myProfileImage; ?>" alt="profile">
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
							<span class="direct-chat-timestamp pull-right"><?php echo $MessageTime; ?></span>
						</div>
						<img class="direct-chat-img" src="<?php echo "backend/".$receiverProfileImage; ?>" alt="profile">

						<div class="direct-chat-text">
							<?php echo $Send_Messages; ?>
						</div>
					</div>
				</span>
				<?php 
			}
		}
	}

	// update message to readable message
	$messageReads = 1;
	$Update_Query = $connect ->prepare("UPDATE message SET message_reads=? WHERE (message.message_receiver_id=? AND message.message_receiver_id=?)");
	$Update_Query -> bind_param("iii",$messageReads,$myId,$receiverId);
	$Update_Query -> execute();
} // end of else
?>