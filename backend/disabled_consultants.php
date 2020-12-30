<?php
// file to retrieve all existing consultants and show them in table with possible options
$retrieve = "SELECT * FROM users INNER JOIN user_type INNER JOIN department INNER JOIN country INNER JOIN school
INNER JOIN college ON department.school_id = school.school_id AND school.college_id = college.college_id AND 
users.user_type_id = user_type.user_type_id AND users.user_department = department.department_id AND 
users.user_country = country.country_id WHERE users.user_status_id = 2";
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
        $country_name = $lineRetrieve -> country_name;
        $user_status_id  = $lineRetrieve -> user_status_id;
        // college info
        $department = $lineRetrieve -> department_name;
        $school_name = $lineRetrieve -> school_name;
        $college_name = $lineRetrieve -> college_name;
        ?>
        <tr>
            <td><?php echo $fName." ".$lName ?></td>
            <td><?php echo $gender; ?></td>
            <td><?php echo $natId; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $department; ?></td>
            <td>
            <?php include 'models/consultant_models/view_consultant.php'; ?>
                <div class="btn-group btn-group-sm table-button-div">
                    <a href="#" data-toggle="modal" data-target="#view_consultant<?php echo $user_id;  ?>"
                        class=" btn btn-info table_button">
                        <i class="fa fa-eye"></i> View
                    </a>
                    <a href="#" data-toggle="modal" data-target="#edit_consultant<?php echo $user_id;  ?>"
                        class=" btn btn-warning table_button">
                        <i class="fa fa-edit"></i> Activate
                    </a>
                </div>
                <?php include 'models/consultant_models/reActivateUser.php'; ?>
            </td>
            <?php include 'models/consultant_models/delete.php'; ?>
        </tr>
        <?php
    }
}
else
{
    echo "";
}
?>
<input type="hidden" id="totalDConsultants" value="<?php echo $retrieveCount; ?>">