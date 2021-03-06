<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UR-Consultancy</title>
    <link rel="shortcut icon" href="../backend/img/logo.JPG" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script src="../Jquery/jquery.js"></script>
        <script src="../js/myJs.js"></script>
        <script>
        $(document).ready(function(){
            $("#login_form").on("submit",function(e){
                e.preventDefault();
                var uName= $("#username").val();
                var password= $("#password").val();
                if($.trim(uName).length == 0 || $.trim(password).length == 0)
                {
                    $("#login_feedback").html("<i class='text-red'><b>Fill all fields.</b></i>");
                }
                else
                {
                    $("#login_feedback").html("<i class='text-blue'><b>Checking...</b></i>");
                    // AJAX to link to backend/addUser
                    $.ajax({
                        type:"post",
                        url:"../backend/login.php",
                        data: {uName : uName, password : password},
                        success: function(response)
                        {
                            $("#login_feedback").html("<i class='text-green'>"+response+"</i>");
                        }
                    }); 
                }
                
            });
        });
        </script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>UR-CONSULTANCY</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Use Email And Password to Sign in</p>

            <form id="login_form">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" id="username" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    <!--
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                        -->
                        <span id="login_feedback" style="padding: 10px 0px; margin: 4px 0px;"> </span>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" id="btnlog" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                    
                </div>
            </form>
            <!-- /.social-auth-links -->
            <a href="requestPassword">I forgot my password</a><br>
            <?php // echo password_hash("consultancy12", PASSWORD_DEFAULT); ?>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js"></script>
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
    </script>
</body>

</html>