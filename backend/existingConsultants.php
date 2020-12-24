<?php
// file to retrieve all existing consultants and show them in table with possible options
$retrieve = "SELECT * FROM users INNER JOIN user_type INNER JOIN department ON 
users.user_type_id = user_type.user_type_id AND users.user_department = department.department_id
WHERE users.user_status_id = 1;";
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
        $department = $lineRetrieve -> department_name;
        ?>
        <tr>
            <td><?php echo $fName." ".$lName; ?></td>
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
                        class=" btn btn-success table_button">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="#" data-toggle="modal" data-target="#delete_consultant<?php echo $user_id;  ?>"
                        class="btn btn-danger table_button">
                        <i class="fa fa-trash"></i> Delete
                    </a>
                </div>
                <?php include 'models/consultant_models/edit_consultant.php'; ?>
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