<div class="modal fade" id="make_contract<?php echo $consultancy_id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Signing a contract to <span
                            class="text-blue"><b>"<?php echo $consultancy_name; ?>"</b></span>
                    </b></h4>
            </div>
            <div class="modal-body">
                <form class="form" id="searchConsultant">
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Choose only one National Id or Name </label>
                            <?php
                            include 'backend/getUsersNatId.php';
                            ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> &nbsp;&nbsp;
                <span style="font-size: 15px;" id="userContract<?php echo $consultancy_id; ?>"></span> &nbsp;&nbsp;
                <button type="button" class="btn btn-primary signContractWithUser" value="<?php echo $consultancy_id; ?>">Proceed</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>