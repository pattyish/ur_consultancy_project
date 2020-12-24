<div class="modal fade" id="change_profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b> <span class="text-success">Change Profile Image</span></b></h4>
            </div>
            <form action="" id="uploadProfileImage" action="changeProfilePicture.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                        <div class="form-group">
                            <input type="file" class="form-control" name="imageProfile" id="chooseProfileImage" style="border-radius: 6px;" accept=".jpg,.JPEG,.JPG,.png;.PNG">
                        </div>
                        <div class="preview bg-success text-center" id=""
                            style="width: 250px; height: 250px; border-radius: 5px;">
                            <img id="profilePreviewHolder" src="<?php echo $MYUserProfileImage; ?>" class="img w3-round-xlarge" style="width: 200px; height: auto;" alt="profile">
                        </div>
                        <progress id="prog" max="100" value="50" style="display: none; height: 30px;">
                        </progress><span style="font-size: 20px;" id="results">ssqsq</span>
                                        
                </div>
                <div class="modal-footer">
                    <button type="button" id="uploadProfile" class="btn btn-default pull-left" data-dismiss="modal">Close</button> &nbsp;&nbsp;
                    <span style="font-size: 15px;" id="changeProfileFeedBack"></span> &nbsp;&nbsp;
                    <button type="submit" id="SendImage" class="btn btn-primary" style="">Upload</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
