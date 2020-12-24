$(document).ready(function(){

    // Adding new user
    $("#saveConsultant").on("submit",function(e){
        e.preventDefault();
        var fName = $("#fName").val();
        var lName = $("#lName").val();
        var gender = $("#gender").val();
        var natId = $("#natId").val();
        var userEmail = $("#userEmail").val();
        var userType = $("#userType").val();
        var country = $("#country").val();
        var department = $("#department").val();
        if($.trim(fName).length == 0 || $.trim(lName).length == 0 || $.trim(gender).length == 0
         || $.trim(natId).length == 0 || $.trim(userEmail).length == 0 || $.trim(userType).length == 0
         || $.trim(country).length == 0 || $.trim(department).length == 0)
        {
            $("#feedback").html("<i class='text-red'><b>All fields are required.</b></i>");
        }
        else
        {
            $("#feedback").html("Saving...");
            // AJAX to link to backend/addUser
            $.ajax({
                type:"post",
                url:"backend/addUser.php",
                data: {fName : fName, lName : lName, gender : gender, natId : natId , userEmail : userEmail, userType : userType, country : country, department : department},
                success: function(response)
                {
                    $("#feedback").html("<i class='text-red'><b>"+response+"</b></i>");
                    if(response.includes("successfully"))
                    {
                        $("#fName").val("");
                        $("#lName").val("");
                        $("#gender").val("");
                        $("#natId").val("");
                        $("#userEmail").val("");
                        $("#userType").val("");
                        $("#country").val("");
                    }
                }
            });   
        }
    });

    // Adding new client
    $("#addClientForm").on("submit",function(e){
        e.preventDefault();
        var cName = $("#clientName").val();
        var cEmail = $("#clientEmail").val();
        var country = $("#country").val();
        if($.trim(cName).length == 0 || $.trim(cEmail).length == 0 || $.trim(country).length == 0)
        {
            $("#addClientFeedback").html("<i class='text-red'><b>All fields are required.</b></i>");
        }
        else
        {
            $("#addClientFeedback").html("Saving...");
            // AJAX to link to backend/addUser
            $.ajax({
                type:"post",
                url:"backend/addClient.php",
                data: {cName : cName, cEmail : cEmail, country : country},
                success: function(response)
                {
                    $("#addClientFeedback").html("<i class='text-green'><b>"+response+"</b></i>");
                    if(response.includes("successfully"))
                    {
                        $("#clientName").val("");
                        $("#clientEmail").val("");
                        $("#country").val("");
                    }
                }
            });   
        }
    });

    // Adding new consultancy
    $("#addConsultancyForm").on("submit",function(e){
        e.preventDefault();
        var cName = $("#consultancy_name").val();
        var sign_date = $("#sign_date").val();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var amount = parseInt($("#amount").val());
        var currency = $("#currency").val();
        var ur_charges = parseInt($("#chargesToUr").val());
        var tax_charges = parseInt($("#taxCharges").val());
        var all_charges = ur_charges + tax_charges;
        var consultant_charges = 100 - all_charges;
        var client = $("#client").val();
        if($.trim(cName).length == 0 || $.trim(sign_date).length == 0
        || $.trim(start_date).length == 0 || $.trim(end_date).length == 0 || $.trim(amount).length == 0
        || $.trim(currency).length == 0 || $.trim(ur_charges).length == 0 || $.trim(tax_charges).length == 0 || $.trim(client).length == 0)
        {
            $("#addConsultancyFeedback").html("<i class='text-red'><b>All fields are required. "+client+"</b></i>");
        }
        else
        {
            if(start_date > end_date)
            {
                $("#addConsultancyFeedback").html("<i class='text-red'><b>Start date should be the date before the end date.</b></i>"); 
            }
            else if(all_charges >= 100)
            {
                $("#addConsultancyFeedback").html("<i class='text-red'><b>Consider changing your charges percentages. It seems to be unusual.</b></i>"); 
            }
            else
            {
                $("#addConsultancyFeedback").html("<i class='text-blue'><b>Saving...</b></i>");
                // AJAX to link to backend/addConsultancy.php
                  $.ajax({
                    type:"post",
                    url:"backend/addConsultancy.php",
                    data: {name : cName, sign_date : sign_date, start_date : start_date, end_date : end_date,
                            amount  : amount, currency : currency, ur_charges : ur_charges, tax_charges : tax_charges,
                            consultant_charges : consultant_charges, client : client},
                    success: function(response)
                    {
                        $("#addConsultancyFeedback").html("<i class='text-green'><b>"+response+"</b></i>");
                        if(response.includes("successfully"))
                        {
                            $("#consultancy_name").val("");
                            $("#start_date").val("");
                            $("#end_date").val("");
                            $("#amount").val("");
                            $("#currency").val("");
                            $("#chargesToUr").val("");
                            $("#taxCharges").val("");
                            $("#client").val("");
                        }
                    }
                });  
            }
        }
    });

    // Edit new consultancy
    $("#editConsultancyForm").on("submit",function(e){
        e.preventDefault();
        var consultancyId = parseInt($("#consultancyId").val());
        var cName = $("#consultancy_name").val();
        //var sign_date = $("#sign_date").val();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var amount1 = $("#amount").val();
        var amount = parseInt($("#amount").val());
        var currency = $("#currency").val();
        var ur_charges1 = $("#chargesToUr").val();
        var ur_charges = parseInt($("#chargesToUr").val());
        var tax_charges1 = $("#taxCharges").val();
        var tax_charges = parseInt($("#taxCharges").val());
        var all_charges = ur_charges + tax_charges;
        var client1 = $("#client").val();
        var client = parseInt($("#client").val());
        if($.trim(cName).length == 0 || $.trim(start_date).length == 0 || $.trim(end_date).length == 0 || $.trim(amount1).length == 0
        || $.trim(currency).length == 0 || $.trim(ur_charges1).length == 0 || $.trim(tax_charges1).length == 0 || $.trim(client1).length == 0)
        {
            $("#editConsultancyFeedback").html("<i class='text-red'><b>All fields are required. </b></i>");
        }
        else
        {
            if(start_date > end_date)
            {
                $("#editConsultancyFeedback").html("<i class='text-red'><b>Start date should be the date before the end date.</b></i>"); 
            }
            else if(all_charges >= 100)
            {
                $("#editConsultancyFeedback").html("<i class='text-red'><b>Consider changing your charges percentages. It seems to be unusual.</b></i>"+client); 
            }
            else
            {
                $("#editConsultancyFeedback").html("<i class='text-blue'><b>Saving...</b></i>");
                // AJAX to link to backend/editConsultancy.php
                $.ajax({
                    type:"post",
                    url:"backend/editConsultancy.php",
                    data: {consultancyId : consultancyId, name : cName, start_date : start_date, end_date : end_date,
                            amount  : amount, currency : currency, ur_charges : ur_charges, tax_charges : tax_charges, client : client},
                    success: function(response)
                    {
                        $("#editConsultancyFeedback").html("<i class='text-green'><b>"+response+"</b></i>");
                    }
                });  
            }
        }
    });

    // Changing Password
    $("#changePasswordForm").on("submit",function(e){
        e.preventDefault();
        var OP = $("#oldPassword").val();
        var NP = $("#newPassword").val();
        var CNP = $("#cNewPassword").val();
        if($.trim(OP).length == 0 || $.trim(NP).length == 0 || $.trim(CNP).length == 0)
        {
            $("#changePasswordFeedback").html("<i class='text-red'><b>All fields are required.</b></i>");
        }
        else
        {
            if(NP.length < 6)
            {
                $("#changePasswordFeedback").html("<i class='text-red'><b>Password should be least 6 characters.</b></i>");
            }
            else if(NP != CNP)
            {
                $("#changePasswordFeedback").html("<i class='text-red'><b>Confirmed password is not correct.</b></i>");
            }
            else if(OP == CNP && OP == NP)
            {
                $("#changePasswordFeedback").html("<i class='text-red'><b>Your new password seems to be the same as the oldest password.</b></i>");
            }
            else
            {
                $("#changePasswordFeedback").html("<i class='text-blue'><b>Wait... Changes are being saved.</b></i>");
                // AJAX to link to backend/changeYourPassword
                $.ajax({
                    type: "post",
                    url: "backend/changeYourPassword.php",
                    data: {OP : OP, NP : NP, CNP : CNP},
                    success: function(response)
                    {
                        $("#changePasswordFeedback").html(response);
                        if(response.includes("Changed"))
                        {
                            $("#oldPassword").val("");
                            $("#newPassword").val("");
                            $("#cNewPassword").val("");
                        }
                    }
                });  
            }
        }
    });

    // Updating user profile
    $("#UpdateProfile").on("submit",function(e){
        e.preventDefault();
        var fName = $("#firstName").val();
        var lName = $("#lastName").val();
        var gender = $("#Gender").val();
        var natId = $("#natId").val();
        var userEmail = $("#userEmail").val();
        var userPhone = $("#phone").val();
        var userType = parseInt($("#userType").val());
        var country = parseInt($("#country").val());
        var department = parseInt($("#department").val());
        var userLocation = $("#userLocation").val();
        var userEducation = $("#userEducation").val();
        var userSummary = $("#userSummary").val();
        if($.trim(fName).length == 0 || $.trim(lName).length == 0 || $.trim(gender).length == 0
        || $.trim(natId).length == 0 || $.trim(userEmail).length == 0 || $.trim(userPhone).length == 0 || $.trim(userType).length == 0
        || $.trim(country).length == 0 || $.trim(department).length == 0 || $.trim(userLocation).length == 0
        || $.trim(userEducation).length == 0 || $.trim(userSummary).length == 0)
        {
            $("#updateProfileFeedback").html("<i class='text-red'><b>All fields are required.</b></i>");
        }
        else
        {
            $("#updateProfileFeedback").html("<i class='text-blue'><b>Wait... Changes are being saved.</b></i>");
            // AJAX to link to backend/changeProfile
            $.ajax({
                type: "post",
                url: "backend/changeProfile.php",
                data: {fName : fName, lName : lName, gender : gender, natId : natId, userEmail : userEmail, userPhone : userPhone, userType : userType, country : country, department : department, userLocation : userLocation, userEducation : userEducation, userSummary : userSummary},
                success: function(response)
                {
                    $("#updateProfileFeedback").html("<i class='text-green'><b>"+response+"</b></i>");
                    if(response.includes("changed"))
                    {
                        setTimeout(function() {
                            window.location.href="profile.php";  
                        }, 3000);
                    }
                }
            }); 
        }
    });

    // Disable a consultant
    $(".disableConsultant").on("click",function(e){
        e.preventDefault();
        var userId = $(this).val();
        $.ajax({
            type: "post",
            url: "backend/disableConsultant.php",
            data: {userId : userId},
            success: function(response)
            {
                $("#DCF"+userId).html("<b><i class='text-green'>"+response+"</i></b>");
                
                if(response.includes("Success"))
                {
                    $("#DCF"+userId).append(". <b><i class='text-green'>The page will refresh in 3 secs.</i></b>");
                    setTimeout(function() {
                        window.location.href="all_consultants.php";  
                    }, 3000);
                }
            }
        }); 
    });

    // Disable a client
    $(".disableClient").on("click",function(e){
        e.preventDefault();
        var clientId = $(this).val();
        // link to backend/disableClient
        $.ajax({
            type: "post",
            url: "backend/disableClient.php",
            data: {clientId : clientId},
            success: function(response)
            {
                $("#DC"+clientId).html("<b><i class='text-green'>"+response+"</i></b>");
                
                if(response.includes("Success"))
                {
                    $("#DC"+clientId).append(". <b><i class='text-green'>The page will refresh in 3 secs.</i></b>");
                    setTimeout(function() {
                        window.location.href="all_clients.php";  
                    }, 3000);
                }
            }
        }); 
    });

    // chatting with other users
    $(".userToChat").on("click",function(e){
        
    });

     // Sign contract with a consultant
     $("#signContractForm").on("submit",function(e){
        e.preventDefault();
        var consultancy_id = parseInt($("#consultancy_id").val());
        var consultant_id = parseInt($("#consultant_id").val());
        var sign_date = $("#sign_date").val();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var amount = parseInt($("#amount").val());
        var currency = $("#currency").val();
        var ur_charges = parseInt($("#chargesToUr").val());
        var tax_charges = parseInt($("#taxCharges").val());
        var all_charges = ur_charges + tax_charges;
        var consultant_charges = 100 - all_charges;
        var client = $("#client").val();
        if($.trim(sign_date).length == 0
        || $.trim(start_date).length == 0 || $.trim(end_date).length == 0 || $.trim(amount).length == 0
        || $.trim(currency).length == 0 || $.trim(ur_charges).length == 0 || $.trim(tax_charges).length == 0 || $.trim(client).length == 0)
        {
            $("#addConsultancyFeedback").html("<i class='text-red'><b>All fields are required. "+client+"</b></i>");
        }
        else
        {
            if(start_date > end_date)
            {
                $("#addConsultancyFeedback").html("<i class='text-red'><b>Start date should be the date before the end date.</b></i>"); 
            }
            else if(all_charges >= 100)
            {
                $("#addConsultancyFeedback").html("<i class='text-red'><b>Consider changing your charges percentages. It seems to be unusual.</b></i>"); 
            }
            else
            {
                $("#addConsultancyFeedback").html("<i class='text-blue'><b>Saving...</b></i>");
                // AJAX to link to backend/addConsultancy.php
                  $.ajax({
                    type:"post",
                    url:"backend/addConsultancy.php",
                    data: {name : cName, sign_date : sign_date, start_date : start_date, end_date : end_date,
                            amount  : amount, currency : currency, ur_charges : ur_charges, tax_charges : tax_charges,
                            consultant_charges : consultant_charges, client : client},
                    success: function(response)
                    {
                        $("#addConsultancyFeedback").html("<i class='text-green'><b>"+response+"</b></i>");
                        if(response.includes("successfully"))
                        {
                            $("#consultancy_name").val("");
                            $("#start_date").val("");
                            $("#end_date").val("");
                            $("#amount").val("");
                            $("#currency").val("");
                            $("#chargesToUr").val("");
                            $("#taxCharges").val("");
                            $("#client").val("");
                        }
                    }
                });  
            }
        }
    });

     //preview user profile image before upload
    function readURL(input) {
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
                url: "ssss.php",
                type: "post",
                data: fd,
                contentType: false,
                processData: false,
                success: function(response)
                {
                    alert("Heyyye");
                    //$('#SendImage').attr("disabled",false);
                    //$("#uploadProfileImage").trigger("reset");
                   // $('#results').html(response);
                    
                }
            });
        }
        else
        {
            
            $('#results').html("<i class='text-red'><b>No file chosen...</b>");
        }
	});
});