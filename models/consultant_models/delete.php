<div class="modal fade" id="delete_consultant<?php echo $user_id;  ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>A user <span class="text-danger"><?php echo $fName." ".$lName ?></span> will
                    be disabled</b></h4>
            </div>
            <div class="modal-body">
                <p>By clicking on Delete Button, this user will no long be a member of the system. </br>
                    Are sure you want to disable this user?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> &nbsp;&nbsp;
                <span style="font-size: 15px;" id="DCF<?php echo $user_id; ?>"></span> &nbsp;&nbsp;
                <button type="button" class="btn btn-danger disableConsultant" value="<?php echo $user_id; ?>">Delete</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>