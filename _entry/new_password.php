<?php
session_start();

include ('koneksi.php');
include ('function.php');

$email = $_GET['email'];
$token = $_GET['token'];

$userID = UserID($email); 

$verifytoken = verifytoken($userID, $token);




if(isset($_POST['submit']))
{
  $new_password = $_POST['new_password'];
  $new_password = md5($new_password);
  $retype_password = $_POST['retype_password'];
  $retype_password = md5($retype_password);
  
  if($new_password == $retype_password)
  {
    $update_password = mysqli_query($conn, "UPDATE user SET password = '$new_password' WHERE id_user = $userID");
    if($update_password)
    {
        mysqli_query($conn, "UPDATE recovery_keys SET valid = 0 WHERE userID = $userID AND token ='$token'");
        $msg = '<div class="alert alert-primary alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <strong>Password berhasil di ganti!</strong>Please login new passowrd. 
                                    </div>';
        $msgclass = 'bg-success';    }
  }else
  {
     $msg = "Password doesn't match";
     $msgclass = 'bg-danger';
  }
  
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Goresto - Kasir Restoran</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="assets/js/core/app.js"></script>
    <script type="text/javascript" src="assets/js/pages/login_validation.js"></script>

    <script type="text/javascript" src="assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container login-cover">

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content pb-20">

                    <!-- Form with validation -->
                    <form method="post" class="form-validate">
<?php if(isset($msg)) { ?>
    <div><?php echo $msg; ?></div>
<?php } ?>
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                <h5 class="content-group">Aplikasi Kasir Restoran <small class="display-block">Go Resto</small></h5>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" class="form-control" placeholder="Password Baru" onkeypress="hack(event)" name="new_password" required="required">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" class="form-control" placeholder="Konfirmasi Password" onkeypress="hack(event)" name="retype_password" required="required">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn bg-pink-400 btn-block">Ganti Password <i class="icon-arrow-right14 position-right"></i></button>
                            </div>

                            <div class="text-center">
                                <a href="index">Login?</a>
                            </div>
                        
                        </div>
                    </form>
                    <!-- /form with validation -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

<script type="text/javascript">
    function hack(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[a-zA-Z0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>

</body>
</html>
