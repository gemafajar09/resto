<?php
session_start();
if($_SESSION['nama_level']=="admin") {
    header("Location: ../_Admin/index");
}

elseif ($_SESSION['nama_level']=="waiter") {
	header("Location: ../_Waiter/index");
}

elseif ($_SESSION['nama_level']=="") {
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
				<div class="page-header no-padding">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Setting</span> - Profile</h4>
						</div>

					</div>

					<div class="breadcrumb-line no-margin">
						<ul class="breadcrumb">
							<li><a href="index"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Profile</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Cover area -->
				<div class="profile-cover">
					<div class="profile-cover-img" style="background-image: url(assets/images/demo/cover2.jpg)"></div>
					<div class="media">
<?php
$username=$_SESSION['username'];
$query_mysqli = mysqli_query($conn, "SELECT * FROM user INNER JOIN level ON user.id_level=level.id_level where username='$_SESSION[username]'")or die(mysqli_error());
while($data = mysqli_fetch_array($query_mysqli)){
?>
						<div class="media-left">
							<a href="#" class="profile-thumb">
								<img src="../assets/images/pengguna/<?php echo $data['gambar_user']; ?>"" class="img-circle img-md" alt="">
							</a>
						</div>

						<div class="media-body">
				    		<h1>
<?php echo $data['nama_user']; ?>


				    			<small class="display-block"><?php echo $data['nama_level']; ?></small>				    		
				    		</h1>
						</div>
<?php } ?>
					</div>
				</div>
				<!-- /cover area -->


				<!-- Toolbar -->
				<div class="navbar navbar-default navbar-xs content-group">
					<ul class="nav navbar-nav visible-xs-block">
						<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
					</ul>

					<div class="navbar-collapse collapse" id="navbar-filter">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i> Settings</a></li>
						</ul>

					</div>
				</div>
				<!-- /toolbar -->


				<!-- Content area -->
				<div class="content">

					<!-- User profile -->
					<div class="row">
						<div class="col-lg-9">
							<div class="tabbable">
								<div class="tab-content">
							
									<div class="tab-pane fade in active" id="settings">

										<!-- Profile info -->
										<div class="panel panel-flat">
											<div class="panel-heading">
												<h6 class="panel-title">Profile</h6>
												<div class="heading-elements">
													<ul class="icons-list">
								                		<li><a data-action="collapse"></a></li>
								                		<li><a data-action="reload"></a></li>
								                		<li><a data-action="close"></a></li>
								                	</ul>
							                	</div>
											</div>

											<div class="panel-body">
					<?php
                                include ("../koneksi.php");
                                if(isset($_GET['id_user']))
                                {
                                    $id_user=$_GET['id_user'];

                                    if (empty($id_user)) 
                                    {
                                        echo "ID Tidak Tersedia!";
                                    }
                                }else
                                {
                                    die("ID Tidak Tersedia!");
                                }
                                $query= "SELECT * FROM user INNER JOIN level ON user.id_level=level.id_level  WHERE id_user='$id_user'";
                                $sql = mysqli_query($conn,$query);
                                while ($hasil = mysqli_fetch_array($sql))
                                {
                                    $id_user              =   $hasil['id_user'];
                                    $email    	          =   $hasil['email'];
                                    $nama_user            =   $hasil['nama_user'];
                                    $username             =   $hasil['username'];
                                    $id_level             =   $hasil['id_level'];
                                }
                      ?> 
												<form action="proses/update_profile?id_user=<?php echo $id_user; ?>" method="post" enctype="multipart/form-data">
													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>Username</label>
																<input type="text" name="username" onkeypress="hack(event)" value="<?php echo $username; ?>" class="form-control">
															</div>
															<div class="col-md-6">
																<label>Nama User</label>
																<input type="text" name="nama_user" onkeypress="hack(event)" value="<?php echo $nama_user; ?>" class="form-control">
															</div>
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-md-6">
																<label>Email</label>
																<input type="email" name="email" onkeypress="hack(event)" value="<?php echo $email; ?>" class="form-control">
															</div>
															<div class="col-md-6">
									                            <label>Level</label>
									                            <select class="select" name="id_level">
									                                <option value="" disabled select>Pilih Level</option>
										                            <option value="3" <?php if($id_level=='3') {echo 'select="select"';} ?>>Kasir</option>
									                            </select>
															</div>
														</div>
													</div>

							                        <div class="text-right">
							                        	<button type="submit" class="btn btn-primary" value="Action" name="action">Update <i class="icon-arrow-right14 position-right"></i></button>
							                        </div>
												</form>
											</div>
										</div>
										<!-- /profile info -->

									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3">

							<!-- Navigation -->
					    	<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Info Aplikasi</h6>
								</div>

								<div class="list-group no-border no-padding-top">
									<a href="" class="list-group-item"><i class="icon-user-tie"></i> Development</a>
									<a href="#" class="list-group-item"><i class="icon-user"></i> BUDI</a>
									<a href="#" class="list-group-item"><i class="icon-city"></i> SMKN 1 CIOMAS</a>
									<div class="list-group-divider"></div>
									<a href="#" class="list-group-item"><i class="icon-phone2"></i> 087741214105</a>
									<a href="#" class="list-group-item"><i class="icon-info3"></i> Kasir Restoran V.1.2</a>
								</div>
							</div>
							<!-- /navigation -->
							
						</div>
					</div>
					<!-- /user profile -->

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
