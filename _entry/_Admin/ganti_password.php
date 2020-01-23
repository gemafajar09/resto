<?php
session_start();
if($_SESSION['nama_level']=="") {
    header("Location: ../_Admin/index");
}

elseif ($_SESSION['nama_level']=="waiter") {
	header("Location: ../_Waiter/index");
}

elseif ($_SESSION['nama_level']=="kasir") {
	header("Location: ../_Kasir/index");
}

elseif ($_SESSION['nama_level']=="owner") {
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
				
				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Ganti</span> - Password</h4>
						</div>

					</div>

					<div class="breadcrumb-line breadcrumb-line-component">
						<ul class="breadcrumb">
							<li><a href="index"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li>Setting</li>
							<li class="active">Ganti Password</li>
						</ul>

					</div>
				</div>
				<!-- /page header -->

						<!-- Content area -->
						<div class="content">
<!-- Vertical form options -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Basic layout-->
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title">Ganti Password</h5>
										<div class="heading-elements">
											<ul class="icons-list">
						                		<li><a data-action="collapse"></a></li>
						                		<li><a data-action="reload"></a></li>
						                		<li><a data-action="close"></a></li>
						                	</ul>
					                	</div>
									</div>

									<?php
                                include '../koneksi.php';
                                if (isset($_GET['id_user'])) {
                                    $id_user = $_GET['id_user'];
                                }
                                else {
                                die ("Error. No ID Selected! ");    
                                }
                                //proses ganti password
                                if (isset($_POST['Ganti'])) {
                                $id_user          = htmlspecialchars(addslashes(trim($_POST['id_user'])));
                                $password_lama    = htmlspecialchars(addslashes(trim(md5($_POST['password_lama']))));
                                $password_baru    = htmlspecialchars(addslashes(trim(md5($_POST['password_baru']))));
                                //cek old password
                                $query = "SELECT * FROM user WHERE id_user='$id_user' AND password='$password_lama'";
                                $sql = mysqli_query ($conn, $query);
                                $hasil = mysqli_num_rows ($sql);
                                if (! $hasil >= 1) {
                                    ?>
                                        <script language="JavaScript">
                                        alert('Password lama tidak sesuai! Silahkan ulang kembali!');
                                        document.location='index';
                                        </script>
                                    <?php
                                        unset($_SESSION['id_user']);
                                        session_destroy();
                                }
                                //validasi data data kosong
                                else if (empty($_POST['password_baru'])) {
                                        echo "<script>alert('Ganti Password Gagal, Data Tidak Boleh Kosong!');document.location.href='index'</script>/n";      
                                }

                                else {
                                //update data
                                $query = "UPDATE user SET password='$password_baru' WHERE id_user='$id_user'";
                                $sql = mysqli_query ($conn, $query);
                                //setelah berhasil update
                                if ($sql) {
                                    echo "<script>alert('Ganti Password Berhasil, Silahkan Login Kembali');document.location.href='../logout'</script>/n";  
                                } else {
                                    echo "<script>alert('Ganti Password Gagal!');document.location.href='index'</script>/n";      
                                }
                                }
                                }
                            ?>

									<form action="" method="post" >
									<div class="panel-body">
										<input name="id_user" id="id_user" type="hidden" value="<?=$id_user?>">
										<div class="form-group">
											<label for="password_lama">Password Lama</label>
											<input name="password_lama" maxlength="15" type="password" placeholder="Masukan Password Lama" class="form-control" onkeypress="hack(event)" required="">
										</div>

										<div class="form-group">
											<label for="password_lama">Password Baru</label>
											<input name="password_baru" maxlength="15" type="password" placeholder="Masukan Password Baru" class="form-control" onkeypress="hack(event)" required="">
										</div>

										<div class="text-right">
											<button type="submit" value="Ganti" name="Ganti" class="btn btn-primary">Ganti Password <i class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</form>
								</div>
							<!-- /basic layout -->

						</div>

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
