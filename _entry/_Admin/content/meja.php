				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Data</span> - Meja</h4>
						</div>

					</div>

					<div class="breadcrumb-line breadcrumb-line-component">
						<ul class="breadcrumb">
							<li><a href="?page=Home"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="?page=Categori">Entri Referensi</a></li>
							<li class="active">Meja</li>
						</ul>

					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">


					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Data Meja</h5>
							<button type="button" href="#modal_tambah_meja" class="btn bg-primary-400 btn-labeled legitRipple" data-toggle="modal"><b><i class="icon-plus3"></i></b> Tambah Meja</button>
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
									<th>No Meja</th>
									<th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
<?php
include "../koneksi.php";

$no = 1;
$query = mysqli_query($conn, "SELECT * FROM meja ORDER BY no_meja ASC" );
while ($data=mysqli_fetch_array($query)) {
?>								
									<tr>
									<td><?php echo $no++."."; ?></td>
									<td><?php echo $data['no_meja']; ?></td>
									<td>
									  <?php if ($data['status'] == 'kosong') { ?>
				                      <span class="label label-success">
				                        <i class="fa fa-check-square-o"></i> Kosong
				                      </span>
				                      <?php } else { ?>
				                      <span class="label label-danger">
				                        <i class="fa fa-ban"></i> Penuh
				                      </span>
				                      <?php } ?>
									</td>
									<td class="text-center">
										<button type="button" href="#modal_edit_meja<?php echo $data['id_meja']; ?>" class="btn bg-teal-400 btn-labeled legitRipple" data-toggle="modal"><b><i class="icon-pencil7"></i></b> Edit</button>
                                    </td>
								</tr>
							<?php } ?>
						</tbody>
						</table>
					</div>
					<!-- /basic datatable -->

<!-- Modal -->
<div class="modal fade" id="modal_tambah_meja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<form action="proses/controler.php?action=tambah_meja" method="post" enctype="multipart/form-data">
    			
	      		<div class="modal-header bg-primary">
	        		<h5 class="modal-title" id="exampleModalLabel">Tambah Meja</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
						<label for="no_meja" class="label-control">Meja</label>
						<input type="text" class="form-control" name="no_meja" id="no_meja" placeholder="Masukan No Meja..." required>
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
$a = "SELECT * FROM meja";
$b = mysqli_query($conn,$a);
while ($c = mysqli_fetch_array($b)) {
	$id_meja = $c['id_meja'];

?>

<?php 
include "../koneksi.php";
$id_meja = $c['id_meja'];
$a = mysqli_query($conn,"SELECT * FROM meja WHERE id_meja='$id_meja'");
$e = mysqli_fetch_array($a);
?>
<!-- Modal -->
<div class="modal fade" id="modal_edit_meja<?php echo $e['id_meja']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<form action="proses/controler.php?action=update_meja" method="post" enctype="multipart/form-data">
    			
	      		<div class="modal-header bg-primary">
	        		<h5 class="modal-title" id="exampleModalLabel">Edit Meja</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
						<label for="no_meja" class="label-control"> Meja</label>
						<input type="hidden" name="id_meja" value="<?php echo $e['id_meja']?>">
						<input type="text" class="form-control" name="no_meja" id="no_meja" placeholder="Masukan No Meja..." value="<?php echo $e['no_meja']?>" required>
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