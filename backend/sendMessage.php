<?php
session_start();
?>
<?php
if(!(isset($_SESSION['User_ID'])))
{
	?>
	<script>
        alert("First login");
        window.location.href='Welcome';</script>
	<?php
}
else
{
	// detecting links
    include 'detectLinks.php';
	include 'Database.php';
	$Message= $connect -> real_escape_string($_POST['Message']);
	$Message=nl2br($Message);
	$myId=$_SESSION['User_ID'];
	$receiverId= $connect -> real_escape_string($_POST['receiverId']);

	include 'timeDifference.php'; // function to find timeCounter() 

    // doing our staff, first get the data of the receiver
	$query="SELECT * FROM users WHERE users.user_id=$receiverId;";
	$answer=mysqli_query($connect,$query);
	while($line=mysqli_fetch_object($answer))
	{
        $firstName=$line ->user_first_name;
        $lastName=$line ->user_last_name;
	}

	// update message to readable message
	$messageReads = 1;
	$Update_Query = $connect ->prepare("UPDATE message SET message_reads=? WHERE (message.message_receiver_id=? AND message.message_receiver_id=?)");
	$Update_Query = bind_param("iii",$messageReads,$myId,$receiverId);
	$Update_Query -> execute();
	
	//insert into message table
	$Insert_Query = "INSERT INTO message(message_content,message_send_date,message_sender_id,message_status_id,message_status_id) VALUES()";
	$Insert_Query = mysqli_query($connect,$Insert_Query);
	if(!$Insert_Query)
	{
		echo "Message is not sent. Something went wrong";
	}
	else
	{ 
		// show updated chats
		$message_Query = "SELECT * FROM message WHERE (message.message_receiver_id=$myId OR message.message_sender_id=$myId) AND (message.message_receiver_id=$receiverId OR message.message_sender_id=$receiverId) ORDER BY message.message_id DESC LIMIT 10;";
		$message_Query = mysqli_query($connect,$message_Query);
		$Message_Count = mysqli_num_rows($message_Query);
		if($Message_Count == 0)
		{
			echo "No conversation";
		}
		else
		{
			while($lineMessage = mysqli_fetch_object($message_Query))
			{
				$message_text = $lineMessage -> message_content;
				$message_image = $lineMessage -> message_img;
				$message_doc = $message_Query -> message_file_docs;
			}
			echo " Display new messages after saving sent one";
		}    
	}
	?>
	<span id="LoadSign" style="font-size: 20px;">
		<small>Click Load More for more chats</small>
	</span>
	<div id="RemoveThisRow">
		<input type="hidden" id="LastMessageId" value="<?php echo $LastMessageId; ?>">
		<input type="hidden" value="<?php echo $receiverId; ?>" id="receiverId">
	</div>
	<?php 
} // end of else
?>