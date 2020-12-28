<?php
session_start();
$myId = $_SESSION['User_ID'];

include 'Database.php'; // include database connection

// declaration of variables needed to insert a new user
$consultancy_id  = $_POST['consultancy_id'];
$consultant_id = $_POST['consultant_id'];
$start_date = $connect -> real_escape_string($_POST['start_date']);
$end_date = $connect -> real_escape_string($_POST['end_date']);
$amount = $_POST['amount'];
$now = date("Y-m-d h:i:s");
$status_id = 1;

// Check if the user is not already a consultant on the chosen consultancy
// Select all membbers of the group selected
$query_check = "SELECT * FROM consultant_contract WHERE consultant_contract.contract_consultancy_id = $consultancy_id
                 AND consultant_contract.contract_consultant_id = $consultant_id ";
$query_check = mysqli_query($connect,$query_check);
$count_check = mysqli_num_rows($query_check);
if($count_check > 0)
{
    echo "<i class='text-red'>This consultant is already assigned to this task.</i>";
}
else
{

    $Insert = $connect -> prepare("INSERT INTO consultant_contract(contract_consultancy_id,contract_consultant_id,contract_sign_date,contract_start_date,
    contract_end_date,contract_amount,contract_assigner_id) VALUES (?,?,?,?,?,?,?)");
    $Insert->bind_param("iisssdi",$consultancy_id,$consultant_id,$now,$start_date,$end_date,$amount,$myId);
    $Insert->execute();
    if($Insert)
    {
        echo "A contract is successfully recorded.";
    }
    else
    {
        echo "A request failed.";
    } 
} 

    ?>