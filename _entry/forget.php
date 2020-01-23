<?php
    @session_start();
    include "koneksi.php";

    if (@$_SESSION['username']) {
        header("location: _Admin/");
    }
    else if(@$_SESSION['username'])
    {
    header("location: Waiter/");
  }
  else if(@$_SESSION['username'])
    {
    header("location: Kasir/");
  }  
  else if(@$_SESSION['username'])
    {
    header("location: Owner/");
  }    
?>

<?php
include ('function.php');
  
if(isset($_POST['submit']))
{
  $email = $_POST['email'];
  $email = mysqli_real_escape_string($conn, $email);
  
  if(checkUser($email) == "true")
  {
    $userID = UserID($email);
    $token = generateRandomString();
    
    $query = mysqli_query($conn, "INSERT INTO recovery_keys (userID, token) VALUES ($userID, '$token') ");
    if($query)
    {
       $send_mail = send_mail($email, $token);


      if($send_mail === 'success')
      {
         $msg = '<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold">Password berhasil di kirim ke email anda <a href="#" class="alert-link">this important</a> alert message.
                    </div>';
         $msgclass = 'bg-success';
      }else{
        $msg = '<div class="alert alert-danger alert-styled-left alert-bordered">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold">Email</span> Wong <a href="#" class="alert-link">try submitting again</a>.
                    </div>';
        $msgclass = 'bg-danger';
      }



    }else
    {
        $msg = '<div class="alert alert-danger alert-styled-left alert-bordered">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold">Oh snap!</span>Email Tidak Terdaftar.<a href="#" class="alert-link">try submitting again</a>.
                    </div>';
         $msgclass = 'bg-danger';
    }
    
  }else
  {
    $msg = '<div class="alert alert-danger alert-styled-left alert-bordered">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold">Email! </span> tidak terdaftar di Database <a href="#" class="alert-link">try submitting again</a>.
                    </div>';
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
    <title>Raja Sambal - Kasir Restoran</title>

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

                    <!-- Password recovery -->
					<form action="" method="post">
<?php if(isset($msg)) {?>
    <div><?php echo $msg; ?></div>
<?php } ?>
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
								<h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>
							</div>

							<div class="form-group has-feedback">
								<input type="email" name="email" id="email" class="form-control" onkeypress="hack(event)" placeholder="Your email">
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
							</div>

							<button type="submit" name="submit" class="btn bg-pink-400 btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>
					<!-- /password recovery -->

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
