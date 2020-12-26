<?php
$currentUserType = $MYUserType;
$getNatId = "SELECT * FROM users WHERE users.user_status_id = 1";
$getNatId = mysqli_query($connect,$getNatId);
$countNatId = mysqli_num_rows($getNatId);
?>
<select id="userNatId<?php echo $consultancy_id; ?>" class="form-control select2" multiple="multiple"
            data-placeholder="Select a State" style="width: 100%;">
    <option>Type Id here</option>
<?php
if($countNatId > 0)
{
    while($lineRetrieve=mysqli_fetch_object($getNatId))
    {
        $user_id = $lineRetrieve -> user_id;
        $fName = $lineRetrieve -> user_first_name;
        $lName = $lineRetrieve -> user_last_name;
        $gender = $lineRetrieve -> user_gender;
        $natId = $lineRetrieve -> user_national_id; 
        ?>
        <option value = "<?php echo $natId; ?>"><?php echo $natId." -- ".$lName; ?></option>
        <?php
            
    }
}
?>
</select>