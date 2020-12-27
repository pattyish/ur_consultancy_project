<?php
$getEmail = "SELECT * FROM users WHERE users.user_status_id = 1";
$getEmail = mysqli_query($connect,$getEmail);
$countEmail = mysqli_num_rows($getEmail);
?>
<select id="userEmailMultiple" class="form-control select2" multiple="multiple"
            data-placeholder="Search" style="width: 100%;">
    <option value="">Type Id here</option>
<?php
if($countEmail > 0)
{
    while($lineRetrieve=mysqli_fetch_object($getEmail))
    {
        $user_id = $lineRetrieve -> user_id;
        $fName = $lineRetrieve -> user_first_name;
        $lName = $lineRetrieve -> user_last_name;
        $gender = $lineRetrieve -> user_gender;
        $natId = $lineRetrieve -> user_national_id; 
        $user_email = $lineRetrieve -> user_email; 
        ?>
        <option value = "<?php echo $user_id; ?>"><?php echo $user_email." -- ".$fName." ".$lName; ?></option>
        <?php
            
    }
}
?>
</select>