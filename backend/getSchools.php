<?php
$getSchools= "SELECT * FROM school ORDER BY school.school_name ASC";
$getSchools = mysqli_query($connect,$getSchools);
$countSchools =mysqli_num_rows($getSchools);
if($countSchools > 0)
{
    while($line=mysqli_fetch_object($getSchools))
    {
        $schoolId = $line -> school_id;
        $school = $line -> school_name; 
        ?>
        <option value = "<?php echo $schoolId; ?>"><?php echo $school; ?></option>
        <?php
    }
}
?>