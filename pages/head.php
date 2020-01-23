<?php
    @session_start();
    include "_entry/koneksi.php";

    if (@$_SESSION['nama']) {
        header("location: pelanggan/");
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pelanggan - Kasir Restoran</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="_entry/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="_entry/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="_entry/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="_entry/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="_entry/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="_entry/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="_entry/assets/js/core/libraries/bootstrap.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="_entry/assets/js/core/app.js"></script>
	<script type="text/javascript" src="_entry/assets/js/pages/layout_navbar_secondary_fixed.js"></script>

	<script type="text/javascript" src="_entry/assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index"><img style="height: 20px; width: 80px;" src="_entry/assets/images/logo1.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-home2"></i> Nama Pelanggan</a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">

			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<span>Login</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#" data-toggle="modal" data-target="#modal_form_inline"><i class="icon-user"></i> Nama Pelanggan</a></li>
						<li><a href="_entry"><i class="icon-user"></i> Login Petugas</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
