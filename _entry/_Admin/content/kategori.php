				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Data</span> - Kategori</h4>
						</div>

					</div>

					<div class="breadcrumb-line breadcrumb-line-component">
						<ul class="breadcrumb">
							<li><a href="?page=Home"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="?page=Categori">Entri Referensi</a></li>
							<li class="active">Kategori</li>
						</ul>

					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">


					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Data Kategori</h5>
							<button type="button" href="#modal_tambah_kategori" class="btn bg-primary-400 btn-labeled legitRipple tambah_menu klik" data-toggle="modal"><b><i class="icon-plus3"></i></b> Tambah Menu</button>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<div id="kategori"></div>
						</div>
						<table class="table datatable-basic">
							<thead>
								<tr>
									<th>No</th>
									<th>Kategori</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
<?php
include "../koneksi.php";

$no = 1;
$query = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nama_kategori ASC" );
while ($data=mysqli_fetch_array($query)) {
?>								<tr>
									<td><?php echo $no++."."; ?></td>
									<td><?php echo $data['nama_kategori']; ?></td>
									<td class="text-center">
										<button type="button" href="#modal_edit_kategori<?php echo $data['id_kategori']; ?>" class="btn bg-teal-400 btn-labeled legitRipple tambah_menu klik" data-toggle="modal"><b><i class="icon-pencil7"></i></b> Edit</button>
                                    </td>
								</tr>
							<?php } ?>
						</tbody>
						</table>
					</div>

<!-- Modal -->
<div class="modal fade" id="modal_tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<form action="proses/controler.php?action=tambah_kategori" method="post" enctype="multipart/form-data">
    			
	      		<div class="modal-header bg-primary">
	        		<h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
						<label for="nama_kategori" class="label-control">Kategori</label>
						<input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Masukan Kategori..." required>
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
$a = "SELECT * FROM kategori";
$b = mysqli_query($conn,$a);
while ($c = mysqli_fetch_array($b)) {
	$id_kategori = $c['id_kategori'];

?>

<?php 
include "../koneksi.php";
$id_kategori = $c['id_kategori'];
$a = mysqli_query($conn,"SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
$e = mysqli_fetch_array($a);
?>
<!-- Modal -->
<div class="modal fade" id="modal_edit_kategori<?php echo $e['id_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<form action="proses/controler.php?action=update_kategori" method="post" enctype="multipart/form-data">
    			
	      		<div class="modal-header bg-primary">
	        		<h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
						<label for="nama_kategori" class="label-control">Kategori</label>
						<input type="hidden" name="id_kategori" value="<?php echo $e['id_kategori']?>">
						<input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Masukan Kategori..." value="<?php echo $e['nama_kategori']?>" required>
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