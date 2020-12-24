<?php 
// select all people that I can chat with
$retrieve = "SELECT * FROM users INNER JOIN user_type ON users.user_type_id = user_type.user_type_id;";
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
        ?>
        <li class="userToChat" value="<?php echo $user_id; ?>" username="<?php echo $fName; ?>">
            <img src="<?php echo "backend/".$user_profile_image; ?>" alt="User Image" style="width:60px; height:60px; object-fit:cover; object-position: 50% 0;">
            <a class="users-list-name"  href="#"><?php echo $fName; ?></a>
            <span class="users-list-date"><?php echo $user_type; ?></span>
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

