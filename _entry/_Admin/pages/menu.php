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
	$data = $conn->query("SELECT * FROM pesanan INNER JOIN meja ON pesanan.no_meja = meja.id_meja WHERE pesanan.status_pesanan = 'menunggu diantar'");
	$hitung = mysqli_num_rows($data);
?>
<?php
	$query = $conn->query("SELECT * FROM pesanan INNER JOIN meja ON pesanan.no_meja = meja.id_meja WHERE pesanan.status_pesanan = 'menunggu pembayaran'");
	$hitung1 = mysqli_num_rows($query);
?>

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="active"><a href="index"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Entri Referensi</span></a>
									<ul>
										<li><a href="masakan">Masakan</a></li>
										<li><a href="meja">Meja</a></li>
										<li><a href="kategori">Kategori</a></li>
										<li><a href="level">Level</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Entri Order</span><span class="label bg-blue-400"><?php echo $hitung;?></a>
									<ul>
										<li><a href="pilih_meja">Pemesanan</a></li>
										<li><a href="list_pesanan">List Pemesanan</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Entri Transaksi</span><span class="label bg-blue-400"><?php echo $hitung1;?></a>
									<ul>
										<li><a href="transaksi">Transaksi</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Generate Laporan</span></a>
									<ul>
										<li><a href="laporan">Laporan</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Pengguna</span></a>
									<ul>
										<li><a href="pengguna">Pengguna</a></li>
									</ul>
								</li>
								<!-- /main -->

								<!-- Pengaturan -->
								<li class="navigation-header"><span>Pengaturan</span> <i class="icon-menu" title="Forms"></i></li>
								<li>
									<a href="#"><i class="icon-pencil3"></i> <span>Backup & Restore</span></a>
									<ul>
										<li><a href="backup.php">Backup</a></li>
										<li><a href="restore.php">Restore</a></li>
									</ul>
								</li>
								<!-- /Pengaturan -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->	