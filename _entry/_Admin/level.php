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

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Data</span> - Level</h4>
						</div>

					</div>

					<div class="breadcrumb-line breadcrumb-line-component">
						<ul class="breadcrumb">
							<li><a href="?page=Home"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="?page=Categori">Entri Referensi</a></li>
							<li class="active">Level</li>
						</ul>

					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">


					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Data Level</h5>
							<button type="button" href="#modal_tambah_level" class="btn bg-primary-400 btn-labeled legitRipple klik" data-toggle="modal"><b><i class="icon-plus3"></i></b> Tambah Level</button>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<table class="table datatable-responsive">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Level</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
<?php
$no = 1;
foreach($db->show_level() as $x){
?>								<tr>
									<td><?php echo $no++."."; ?></td>
									<td><?php echo $x['nama_level']; ?></td>
                                    <td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#modal_edit_level<?php echo $x['id_level']; ?>" data-toggle="modal"  value="<?php echo $x['id_level'];?>"><i class="icon-pencil7"></i> Edit</a></li>
													<li><a href="proses/controler?id_level=<?php echo $x['id_level']; ?>&action=hapus_level"><i class="icon-bin"></i> Hapus</a></li>
												</ul>
											</li>
										</ul>
									</td>
								</tr>
							<?php } ?>
						</tbody>
						</table>
					</div>

<!-- Modal -->
<div class="modal fade" id="modal_tambah_level" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<form action="proses/controler.php?action=tambah_level" method="post" enctype="multipart/form-data">
    			
	      		<div class="modal-header bg-primary">
	        		<h5 class="modal-title" id="exampleModalLabel">Tambah Level</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
						<label for="nama_level" class="label-control">Level</label>
						<input type="text" maxlength="15" class="form-control" name="nama_level" id="nama_level" placeholder="Masukan Level..." required oninvalid="this.setCustomValidity('Nama Level Harus Di isi')" onkeypress="hack(event)" oninput="setCustomValidity('')">
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i> Simpan</button>
	      		</div>
    		</form>
    	</div>
 	 </div>
</div>
<!-- Modal -->
<?php
include "../koneksi.php";
$a = "SELECT * FROM level";
$b = mysqli_query($conn,$a);
while ($c = mysqli_fetch_array($b)) {
	$id_level = $c['id_level'];

?>

<?php 
include "../koneksi.php";
$id_level = $c['id_level'];
$a = mysqli_query($conn,"SELECT * FROM level WHERE id_level='$id_level'");
$e = mysqli_fetch_array($a);
?>
<!-- Modal -->
<div class="modal fade" id="modal_edit_level<?php echo $e['id_level']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<form action="proses/controler.php?action=update_level" method="post" enctype="multipart/form-data">
    			
	      		<div class="modal-header bg-primary">
	        		<h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
						<label for="nama_level" class="label-control">Kategori</label>
						<input type="hidden" name="id_level" value="<?php echo $e['id_level']?>">
						<input type="text" class="form-control" maxlength="15" name="nama_level" id="nama_level" placeholder="Masukan Kategori..." value="<?php echo $e['nama_level']?>" onkeypress="hack(event)" required oninvalid="this.setCustomValidity('Nama Level Harus Di isi')" oninput="setCustomValidity('')">
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i> Simpan</button>
	      		</div>
    		</form>
    	</div>
 	 </div>
</div>
<!-- Modal -->


<?php } ?>
					
				</div>
					<!-- /basic datatable -->

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
