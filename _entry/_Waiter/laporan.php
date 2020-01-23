<?php
session_start();
if($_SESSION['nama_level']=="admin") {
    header("Location: ../index");
}

elseif ($_SESSION['nama_level']=="") {
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
							
                <!-- Basic datatable -->
                 <div class="col-md-12">
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
									<th>Nama Waiter</th>
									<th>Pesanan</th>
									<th>Tanggal</th>
									<th>Total Pesanan</th>
									<th>Bayar</th>
								</tr>
							</thead>
							<tbody>
<?php 
include "../koneksi.php";
$no = 1;
$sql = mysqli_query($conn, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id_user = user.id_user");
while ($data = mysqli_fetch_assoc($sql)) {
?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $data['nama_user']; ?></td>
                                    <td><?php echo $data['id_pesanan']; ?></td>
									<td><?php echo $data['tanggal']; ?></td>
									<td><?php echo $data['total_bayar']; ?></td>
                                    <td><?php echo $data['jumlah_uang']; ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
					<!-- /basic datatable -->

<!-- Modal -->
<form method="POST" action="report-filter.php" target="_blank" >
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><small>PRINT FILTER DATE</small></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
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
                        &copy; 2019. <a href="#">Goresto</a> by <a href="http://goresto.epizy.com" target="_blank">RPL1_BUDAy </a>
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
