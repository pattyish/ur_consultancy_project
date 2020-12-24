<div class="modal fade" id="change_profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b> <span class="text-success">Change Profile Image</span></b></h4>
            </div>
            <div class="modal-body">
                <form action="" id="uploadProfileImage">
                    <div class="form-group">
                        <input type="file" class="form-control" id="profileImage" style="border-radius: 5px;">
                    </div>
                    <div class="priveiw bg-success" id="profileImagePriview"
                        style="width: 200px; height: 200px; border-radius: 5px;">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> &nbsp;&nbsp;
                <span style="font-size: 15px;" id="changeProfileFeedBack"></span> &nbsp;&nbsp;
                <button type="button" class="btn btn-primary" style="">Upload</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>