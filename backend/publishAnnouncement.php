<?php
session_start();
$myId = $_SESSION['User_ID'];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user
$link = $connect -> real_escape_string($_POST['link']);
$description = $connect -> real_escape_string($_POST['description']);
$school = $_POST['school'];
$now = date("Y-m-d H:i:s");

// Query to save the consultancy announcement
$Insert=$connect ->prepare("INSERT INTO consultancy_announcement(consultancy_announcement,consultancy_announcement_link,
consultancy_announcement_date,consultancy_announcement_school,consultancy_announcement_poster)
    VALUES (?,?,?,?,?)");
$Insert->bind_param("sssii",$description,$link,$now,$school,$myId);
$Insert->execute();
if($Insert)
{
    echo "Published";
    
}
else
{
    echo "A request failed. Something went wrong.";
} 

?>