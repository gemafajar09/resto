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
<?php require_once("../koneksi.php");?>
<?php
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
			<!-- Main content -->
			<div class="content-wrapper">
				

				<!-- Content area -->
				<div class="content">
				<!-- Grid -->	
					<div class="row">
<?php
include "../koneksi.php";
// Include / load file koneksi.php
// Cek apakah terdapat data pada page URL
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;

$limit = 8; // Jumlah data per halamanya

// Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
$limit_start = ($page - 1) * $limit;

// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
$data=mysqli_query($conn, "SELECT * FROM meja where status='kosong'  LIMIT ".$limit_start.",".$limit);
$no = $limit_start + 1; // Untuk penomoran tabel
while($show=mysqli_fetch_array($data)){
$id_meja = $show['id_meja'];
$meja = $show['no_meja'];
?>

						<div class="col-lg-3 col-md-6">
							<div class="thumbnail no-padding">
								<div class="thumb">
									<img src="../assets/images/placeholder.jpg" alt="">
									<div class="caption-overflow">
										<span>
											<a href="cart_meja?act1=add&amp;id_meja=<?php echo $show['no_meja'];?> &amp;ref1=pesanan" title="PESAN MEJA" class="btn bg-success-400 btn-icon btn-xs legitRipple"><i class="icon-cart"></i></a>
										</span>
									</div>
								</div>
							
						    	<div class="caption text-center">
						    		<h2 class="text-semibold no-margin"><?php echo $meja;?> <small class="display-block">No Meja</small></h2>
						    	</div>
					    	</div>
						</div>
						<?php } ?>
					</div>
				<!-- /grid -->


							<!-- Pagination -->
							<div class="text-center content-group-lg pt-20">
								<ul class="pagination">
			<?php
            if ($page == 1) { // Jika page adalah pake ke 1, maka disable link PREV
            ?>
                <li class="disabled"><a href="#">First</a></li>
                <li class="disabled"><a href="#">&laquo;</a></li>
            <?php
            } else { // Jika buka page ke 1
                $link_prev = ($page > 1) ? $page - 1 : 1;
            ?>
                <li><a href="pilih_meja?page=1">First</a></li>
                <li><a href="pilih_meja?page=<?php echo $link_prev; ?>">&laquo;</a></li>
            <?php
            }
            ?>

            <!-- LINK NUMBER -->
            <?php
            // Buat query untuk menghitung semua jumlah data
            $sql2 = mysqli_query($conn,"SELECT COUNT(*) AS jumlah FROM meja ");
            ($get_jumlah = (mysqli_fetch_array($sql2)));

            $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamanya
            $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
            $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
            $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

            for ($i = $start_number; $i <= $end_number; $i++) {
                $link_active = ($page == $i) ? 'class="active"' : '';
            ?>
                <li <?php echo $link_active; ?>><a href="pilih_meja?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>

            <!-- LINK NEXT AND LAST -->
            <?php
            // Jika page sama dengan jumlah page, maka disable link NEXT nya
            // Artinya page tersebut adalah page terakhir
            if ($page == $jumlah_page) { // Jika page terakhir
            ?>
                <li class="disabled"><a href="#">&raquo;</a></li>
                <li class="disabled"><a href="#">Last</a></li>
            <?php
            } else { // Jika bukan page terakhir
                $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
            ?>
                <li><a href="pilih_meja?page=<?php echo $link_next; ?>">&raquo;</a></li>
                <li><a href="pilih_meja?page=<?php echo $jumlah_page; ?>">Last</a></li>
            <?php
            }
            ?>
								</ul>
							</div>
							<!-- /pagination -->

<?php
include "../koneksi.php";

// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
$data=mysqli_query($conn, "SELECT * FROM meja where status='penuh'");
$no = $limit_start + 1; // Untuk penomoran tabel
while($show=mysqli_fetch_array($data)){
$id_meja = $show['no_meja'];
$meja = $show['no_meja'];
?>

							<div class="col-lg-3 col-md-6">
							<div class="thumbnail no-padding">
								<div class="thumb">
									<img src="../assets/images/placeholder.jpg" alt="">
									<div class="caption-overflow">
										<span>
											Sudah Digunakan
										</span>
									</div>
								</div>
							
						    	<div class="caption text-center">
						    		<h2 class="text-semibold no-margin"><?php echo $meja;?> <small class="display-block">No Meja</small></h2>
						    	</div>
					    	</div>
						</div>
<?php } ?>

						</div>
					</div>
					<!-- /dashboard content -->
					</div>
				<!-- /content area -->
				</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->
		
				<div class="footer text-muted">
                        &copy; 2019. <a href="#">Rajasambal</a> by <a href"" target="_blank">Eno </a>
                </div>

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
