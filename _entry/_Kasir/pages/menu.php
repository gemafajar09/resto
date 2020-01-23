<?php require_once("../koneksi.php");
    
    if (!isset($_SESSION)) {
        session_start();
    } ?>
			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">	
					<!-- User menu -->
					<div class="sidebar-user-material">
<?php
$username=$_SESSION['username'];
$query_mysqli = mysqli_query($conn, "SELECT * FROM user where username='$_SESSION[username]'")or die(mysqli_error());
while($data = mysqli_fetch_array($query_mysqli)){
?>
						<div class="category-content">
							<div class="sidebar-user-material-content">
								<a href="#"><img src="../assets/images/pengguna/<?php echo $data['gambar_user']; ?>" class="img-circle img-responsive" alt=""></a>
								<h6>
<?php echo $data['nama_user']; ?>
                          </h6>
							</div>
														
							<div class="sidebar-user-material-menu">
								<a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
							</div>
						</div>
						
						<div class="navigation-wrapper collapse" id="user-nav">
							<ul class="navigation">
								<li><a href="profile?id_user=<?php echo $data['id_user']; ?>"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
								<li><a href="ganti_password?id_user=<?php echo $data['id_user']; ?>"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
								<li><a href="../logout.php"><i class="icon-switch2"></i> <span>Logout</span></a></li>
							</ul>
						</div>
<?php } ?>
					</div>
					<!-- /user menu -->

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
<?php
	$query = $conn->query("SELECT * FROM pesanan INNER JOIN meja ON pesanan.no_meja = meja.id_meja WHERE pesanan.status_pesanan = 'menunggu pembayaran'");
	$hitung = mysqli_num_rows($query);
?>
								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="active"><a href="index"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Entri Transaksi</span><span class="label bg-blue-400"><?php echo $hitung;?></span></a>
									<ul>
										<li><a href="transaksi">Transaksi</a></li>
									</ul>
								</li> 
								
								<!-- /main -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->	
