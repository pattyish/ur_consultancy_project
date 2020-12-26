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
                        <div class="preview text-center" id=""
                            style="width: 250px; height: 250px; border-radius: 5px;">
                            <img id="profilePreviewHolder" src="<?php echo "backend/".$MYUserProfileImage; ?>"
                             class="img w3-round-xlarge" style="width: 200px; height: 200px; object-fit:cover; object-position: 70% 0;" alt="profile">
                        </div>
                        <progress id="prog" max="100" value="50" style="display: none; height: 30px;">
                        </progress><span style="font-size: 20px;" id="results"></span>
                                        
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
<script>
  $(document).ready(function() {

    //upload profile image with progress
	$("#uploadProfileImage").on("submit",function(e){
		e.preventDefault();
        var fd = new FormData();
        var ImageName=$("#chooseProfileImage").val();
        if(ImageName!="")
        {
            var files = $('#chooseProfileImage')[0].files[0];
            fd.append('file',files);

            $('#SendImage').attr("disabled",true);
            $('#results').html("<i class='text-blue'><b>Wait, we are uploading your profile...</b></i>");
            $.ajax({
                url: "backend/changeProfilePicture.php",
                type: "post",
                data: fd,
                contentType: false,
                processData: false,
                success: function(response)
                {
                    $('#SendImage').attr("disabled",false);
                    $("#uploadProfileImage").trigger("reset");
                    $('#results').html(response);
                    
                }
            });
        }
        else
        {
            
            $('#results').html("<i class='text-red'><b>No file chosen...</b>");
        }
    });
    //preview user profile image before upload
    function readURL(input) 
    {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        $("#profilePreviewHolder").attr("src", e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
        }
    }
        
    $("#chooseProfileImage").on("change",function() {
        //alert("changed");
    readURL(this);
    });
});
</script>