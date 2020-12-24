<?php
session_start();

$myId=$_SESSION['User_ID'];
// compress image
include 'compressImage.php';
include 'Database.php';
$ImageName=$_FILES['imageProfile']['name'];
if($ImageName !== "" && !empty($_FILES['imageProfile']['name']))
{
	echo "hhhhhhh";
}
else
{
	echo "<script>alert('None selected');
	window.location.href='backend/profile.php';
	</script>";
}
?>