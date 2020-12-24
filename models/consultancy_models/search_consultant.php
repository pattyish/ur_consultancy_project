<div class="modal fade" id="make_contract<?php echo $consultancy_id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Prepare Contract To<span
                            class="text-success"><?php echo $consultancy_name; ?></span>
                    </b></h4>
            </div>
            <div class="modal-body">
                <form class="form" id="searchConsultant">
                    <div class="form-group">
                        <label>Search Consultant By National Id</label>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Find Consultant By National Id...." style="border-radius: 5px;"
                            class="form-control" name="consultant_id" id="consultant_id">
                        <input type="text" value="<?php echo $consultancy_id; ?>" style="border-radius: 5px;" class="form-control hidden"
                            name="consultancy_id" id="consultancy_id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> &nbsp;&nbsp;
                <button type="button" class="btn btn-primary">Preceed</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>