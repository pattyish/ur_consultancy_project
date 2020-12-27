<div class="modal fade" id="add_group_member">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span
                            class="text-info"><b>Add Member to Group</b></span>
                    </b></h4>
            </div>
            <div class="modal-body">
                <form class="form" id="searchConsultant">
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Find User By Email </label>
                            <?php
                            include 'backend/getUsersEmails.php';
                            ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> 
                <span style="font-size: 15px;" id="addMemberFeedback"></span> &nbsp;&nbsp;
                <button type="button" id="addThisMember" class="btn btn-primary"><i class="fa fa-plus"></i> Add Member</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>