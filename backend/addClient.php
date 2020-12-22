<?php
session_start();
$myId = $_SESSION['User_ID'];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user
$name = $connect -> real_escape_string($_POST['cName']);
$email = $connect -> real_escape_string($_POST['cEmail']);
$email = strtolower($email);
$address = $_POST['country'];


// check uniqueness of Account info: Uname and Password
$query_check = "SELECT * FROM client WHERE client.client_email='$email' OR client.client_name='$name'";
$query_check = mysqli_query($connect,$query_check);
$count_check = mysqli_num_rows($query_check);
if($count_check > 0)
{
    echo "Remember, client name and email should be unique. So, you are causing conflicts.";
}
else
{
    // Query to insert into database
    $Insert=$connect ->prepare("INSERT INTO client(client_name,client_email,country_id) VALUES (?,?,?)");
    $Insert->bind_param("ssi",$name,$email,$address);
    $Insert->execute();
    if($Insert)
    {
        echo "A new client is successfully added";
        // send email to new user to let him/her know he has been added i =n the system
        $to = "";
        $subject = "";
        $message = "";
        $header = "";
        // mail($to,$subject,$message);
    }
    else
    {
        echo "A request failed. Something went wrong.";
    }
}  

?>