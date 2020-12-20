<?php
// file to retrieve all existing consultants and show them in table with possible options
$retrieve = "SELECT * FROM users INNER JOIN user_type ON users.user_type_id = user_type.user_type_id;";
$retrieve = mysqli_query($connect,$retrieve);
$retrieveCount = mysqli_num_rows($retrieve);
if($retrieveCount > 0)
{
    while($lineRetrieve = mysqli_fetch_object($retrieve))
    {
        $fName = $lineRetrieve -> user_first_name;
        $lName = $lineRetrieve -> user_last_name;
        $gender = $lineRetrieve -> user_gender;
        $natId = $lineRetrieve -> user_national_id;
        $email = $lineRetrieve -> user_email;
        ?>
        <tr>
            <td><?php echo $fName." ".$lName ?></td>
            <td><?php echo $gender; ?></td>
            <td><?php echo $natId; ?></td>
            <td><?php echo $email; ?></td>
            <td>
                <div class="btn-group btn-group-sm table-button-div">
                    <a href="#" data-toggle="modal" data-target=""
                        class=" btn btn-info table_button">
                        <i class="fa fa-eye"></i> View
                    </a>
                    <a href="#" data-toggle="modal" data-target=""
                        class=" btn btn-success table_button">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a href="#" data-toggle="modal" data-target=""
                        class="btn btn-danger table_button">
                        <i class="fa fa-trash"></i> Delete
                    </a>
                </div>
            </td>
        </tr>
        <?php
    }
}
else
{
    echo "No consultancts available";
}
?>