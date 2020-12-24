<?php
session_start();

$myId=$_SESSION['User_ID'];
// compress image
include 'compressImage.php';
include 'Database.php';
$ImageName=$_FILES["file"]["name"];
if($ImageName !== "" && !empty($_FILES["file"]["name"]))
{
	$target_dir = "profile_img/";
	$target_file = $target_dir ."".$myId."".basename($_FILES["file"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "PNG" ) 
	{
		echo "The file is not an image";
	}
	else
	{
		$target_file = $target_dir."".$myId."".md5("".rand(0,100000)."".time()."".basename($_FILES["file"]["name"])).".".$imageFileType;

		$target_filee= $connect -> real_escape_string($target_file);
		$imageTemp=$_FILES["file"]["tmp_name"];
		$imageSize=$_FILES["file"]["size"];
		// set compress Quality according to image size
		$compressQuality=90;
		if($imageSize <= 500000)
		{
			$compressQuality=90;
			echo "90";
		}
		else if($imageSize <= 1000000)
		{
			$compressQuality=70;
			echo "70";
		}
		else if($imageSize <= 15000000)
		{
			$compressQuality=30;
			echo "30";
		}
		else
		{
			$compressQuality=20;
			echo "20";
		}
		// real compression
		$CompressedImage=compressImage($imageTemp,$target_filee,$compressQuality);
		if($CompressedImage)
		{
			// Update User Table and change Profile
			$UpdatUsers=$connect ->prepare("UPDATE users SET users.user_profile_image=? WHERE users.user_id=?");
			$UpdatUsers->bind_param("si",$target_filee,$myId);
			$UpdatUsers->execute();
			if($UpdatUsers)
			{
				echo "Profile Uploaded successfully.".$target_filee;
				?>
				<script>
					//window.location.href='profile.php';
				</script>
				<?php
			}
			else
			{
				echo "Error occured. May be connection failed ";
			}
		}
		else
		{
			echo "Upload failed, may be caused by wrong image format";
		}
	}
}
else
{
	
}
?>