<div class="modal fade" id="disable_client<?php echo $clientId; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> <b><span class="text-danger"><?php echo $clients; ?></span> Client will be
                    disabled</b>
                </h4>
            </div>
            <div class="modal-body">
                <p>By clicking on Delete Button this user will no long member of system. </br>
                    Are sure you want to disable this Client.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" id="disableClient" class="btn btn-danger">Delete</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>