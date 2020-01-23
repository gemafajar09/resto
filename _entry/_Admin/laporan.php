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
include "pages/head.php";
$db = new database();
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
							
                <!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Data Transaksi</h5>
                			<button type="button" class="btn bg-primary-400 btn-labeled legitRipple tambah_menu klik" data-toggle="modal" href="#exampleModal"><b><i class="icon-printer"></i></b> Cetak</button>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
						</div>

						<table class="table datatable-responsive">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama User</th>
									<th>Pesanan</th>
									<th>Tanggal</th>
									<th>Total Pesanan</th>
									<th>Bayar</th>
								</tr>
							</thead>
							<tbody>
<?php
$no = 1;
foreach($db->laporan() as $x){
?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $x['nama_user']; ?></td>
                                    <td><?php echo $x['id_pesanan']; ?></td>
									<td><?php echo $x['tanggal']; ?></td>
									<td><?php echo $x['total_bayar']; ?></td>
                                    <td><?php echo $x['jumlah_uang']; ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->

<!-- Modal -->
<form method="POST" action="report-filter.php" target="_blank" >
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      	<div class="modal-header bg-primary">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h6 class="modal-title">Laporan</h6>
		</div>
    <div class="modal-body">
      <div class="form-group">
        <label class="control-label">Mulai Tanggal</label>
        <input type="date" name="from" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">
    </div>
    <div class="form-group">
        <label class="control-label">Sampai Tanggal</label>
        <input type="date" name="end" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">
    </div>                
    <div class="form-group">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit" name="submit" value="proses" onclick="return valid();">Print</button>
    </div>
</div>
</div>  
</div>
</div>
</form>
<!--end modal-->

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
                        &copy; 2019. <a href="#">Raja Sambal</a> by <a href="Rajasambal" target="_blank">Skripsi </a>
                </div>
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
