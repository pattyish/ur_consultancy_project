<?php
session_start();
?>
<title>Consultancy</title>
<link rel="shortcut icon" href="img/HelloLogo1.JPG" />
<?php
$myId=$_SESSION['User_ID'];
// compress image
include 'compressImage.php';
include 'Database.php';
$imageName=$_FILES['Profile_Photo']['name'];
if($imageName !== "" && !empty($_FILES['Profile_Photo']['name']))
{
	$target_dir = "Profile_Images/";
	$target_file = $target_dir ."".$myId."".basename($_FILES["Profile_Photo"]["name"]);
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "PNG" ) 
	{
		echo "The file is not an image";
	}
	else
	{
		$target_file = $target_dir."".$myId."".md5("".rand(0,100000)."".time()."".basename($_FILES["Profile_Photo"]["name"])).".".$imageFileType;

		$target_filee = $connect -> real_escape_string($target_file);
		$imageTemp=$_FILES["Profile_Photo"]["tmp_name"];
		$imageSize=$_FILES["Profile_Photo"]["size"];
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
		$CompressedImage = compressImage($imageTemp,$target_filee,$compressQuality);
		if($CompressedImage)
		{
			// update users and change the profile path
			$change = $connect ->prepare("UPDATE users SET users.UserProfileImage=? WHERE users.User_Id=?");
			$change -> bind_param("si",$target_filee,$myId);
			$change->execute(); 
			if($change)
			{
				echo "Profile uploaded and changed.";
				?>
				<script>
					window.location.href = 'myProfile';
				</script>
				<?php
			}
			else
			{
				echo "Profile has not changed. Something went wrong.";
			}
		}
		else
		{
			echo "Upload failed. You might have chosen a wrong format.";
		}
	}
}
else
{
    ?>
    <script>
        alert('None selected');
        window.location.href='MyProfile';
	</script>
    <?php
}
?>