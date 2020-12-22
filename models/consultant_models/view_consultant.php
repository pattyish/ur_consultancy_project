<div class="modal fade" id="view_consultant<?php echo $user_id;  ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">More details about <b><span
                            class="text-primary"><?php echo $fName." ".$lName ?></span></b></h4>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Full Name</td>
                        <td><?php echo $fName." ".$lName ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Gender</td>
                        <td><?php echo $gender; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">National ID</td>
                        <td><?php echo  $natId; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Email</td>
                        <td><?php echo  $email; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; font-weight: bold;">Department</td>
                        <td><?php echo  $department; ?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>