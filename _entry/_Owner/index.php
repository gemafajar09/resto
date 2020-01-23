<?php
session_start();
if($_SESSION['nama_level']=="admin") {
    header("Location: ../_Admin/index");
}

elseif ($_SESSION['nama_level']=="waiter") {
	header("Location: ../_Waiter/index");
}

elseif ($_SESSION['nama_level']=="kasir") {
	header("Location: ../_Kasir/index");
}

elseif ($_SESSION['nama_level']=="") {
	header("Location: ../_Owner/index");
}

?>
<?php
require_once('../models/database.php');
include "../koneksi.php";
$db = new database();
include "pages/head.php";
?>
<body>

<?php
include "pages/navbar.php";
?>

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

<?php
include "pages/menu.php";
?>			

<!-- Main content -->
			<div class="content-wrapper">
				

				<!-- Content area -->
				<div class="content">

					<!-- Quick stats boxes -->
							<div class="row">
								
								<!-- Members online -->
								<div class="col-sm-6 col-md-3">
									<div class="panel panel-body bg-orange-400 has-bg-image">
										<div class="media no-margin">
											<div class="media-body">
												<h3 class="no-margin">
<?php
    $pesanan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pesanan WHERE status_pesanan='selesai'"));
    echo $pesanan;
?>													
												</h3>
												<span class="text-uppercase text-size-mini">total Pesanan</span>
											</div>

											<div class="media-right media-middle">
												<i class="icon-menu6 icon-3x opacity-75"></i>
											</div>
										</div>
									</div>
								</div>
								<!-- /members online -->

								<!-- Members online -->
								<div class="col-sm-6 col-md-3">
									<div class="panel panel-body bg-danger-400 has-bg-image">
										<div class="media no-margin">
											<div class="media-body">
												<h3 class="no-margin">
<?php
    $menu = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM masakan WHERE status_masakan='Y'"));
    echo $menu;
?>
												</h3>
												<span class="text-uppercase text-size-mini">total Menu</span>
											</div>

											<div class="media-right media-middle">
												<i class="icon-list3 icon-3x opacity-75"></i>
											</div>
										</div>
									</div>
								</div>
								<!-- /members online -->

								<!-- Members online -->
								<div class="col-sm-6 col-md-3">
									<div class="panel panel-body bg-blue-400 has-bg-image">
										<div class="media no-margin">
											<div class="media-body">
												<h3 class="no-margin">
<?php
    $Transaksi = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM transaksi"));
    echo $Transaksi;
?>														
												</h3>
												<span class="text-uppercase text-size-mini">total Transaksi</span>
											</div>

											<div class="media-right media-middle">
												<i class="icon-cash3 icon-3x opacity-75"></i>
											</div>
										</div>
									</div>
								</div>
								<!-- /members online -->

								<!-- Members online -->
								<div class="col-sm-6 col-md-3">
									<div class="panel panel-body bg-indigo-400 has-bg-image">
										<div class="media no-margin">
											<div class="media-body">
												<h3 class="no-margin">
<?php
    $Pengguna = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE status='Y'"));
    echo $Pengguna;
?>													
												</h3>
												<span class="text-uppercase text-size-mini">total Pengguna</span>
											</div>

											<div class="media-right media-middle">
												<i class="icon-users4 icon-3x opacity-75"></i>
											</div>
										</div>
									</div>
								</div>
								<!-- /members online -->

							</div>
							<!-- /quick stats boxes -->	 

						</div>

						

						</div>
					</div>
					<!-- /dashboard content -->
					</div>
				<!-- /content area -->
				</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	


</body>
</html>
