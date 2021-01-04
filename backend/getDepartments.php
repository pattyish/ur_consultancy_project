<?php
$getDepartments= "SELECT * FROM department ORDER BY department.department_name ASC";
$getDepartments = mysqli_query($connect,$getDepartments);
$countDepartment =mysqli_num_rows($getDepartments);
if($countDepartment > 0)
{
    while($line=mysqli_fetch_object($getDepartments))
    {
        $departmentId = $line -> department_id;
        $department = $line -> department_name; 
        ?>
        <option value = "<?php echo $departmentId; ?>"><?php echo $department; ?></option>
        <?php
    }
}
?>