<div class="modal fade" id="activate_client<?php echo $clientId; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> <b><span class="text-danger"><?php echo $clients; ?></span> Client will be
                    Enabled.</b>
                </h4>
            </div>
            <div class="modal-body">
                <p>By clicking on Activate Button, this client will be able to use system again. </br>
                    Are sure you want to enable this Client?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> &nbsp;&nbsp;
                <span style="font-size: 15px;" id="DC<?php echo $clientId; ?>"></span> &nbsp;&nbsp;
                <button type="button" class="btn btn-warning disableClient" value="<?php echo $clientId; ?>">Activate</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>