<?php
error_reporting(0);
session_start();
if($_SESSION['nama_level']=="admin") {
    header("Location: _Admin/index");
}

elseif ($_SESSION['nama_level']=="waiter") {
    header("Location: _Waiter/index");
}

elseif ($_SESSION['nama_level']=="kasir") {
    header("Location: _Kasir/index");
}

elseif ($_SESSION['nama_level']=="owner") {
    header("Location: _Owner/index");
}

?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Waroeng Raja Sambal</title>

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
                    <form action="proses" method="post" class="form-validate">
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                <h5 class="content-group">Aplikasi Restoran <small class="display-block">Raja Sambal</small></h5>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" class="form-control" placeholder="Username" name="username" onkeypress="hack(event)" required="required">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" class="form-control" placeholder="Password" name="password" onkeypress="hack(event)" required="required">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group login-options">
                                <div class="row">
                                    <div class="col-sm-6">
                                    </div>

                                    <div class="col-sm-6 text-right">
                                        <a href="forget">Forgot password?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="login" class="btn bg-pink-400 btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
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
