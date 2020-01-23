<?php
require_once('../../models/database.php');
include "../../koneksi.php";
include "../pages/head1.php";
$db = new database();
?>

<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Data Masakan</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<button type="button" class="btn bg-primary-400 btn-labeled legitRipple tambah_masakan klik" data-toggle="modal" data-target="#mymodal_tambah_masakan"><b><i class="icon-plus3"></i></b> Tambah Menu</button>
							<a href="laporan_masakan" type="button" class="btn bg-danger-400 btn-labeled legitRipple klik"><b><i class="icon-printer"></i></b> Cetak</a>
						</div>

						<table class="table datatable-responsive">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Masakan</th>
									<th>Harga</th>
									<th>Jenis</th>
									<th>Status Masakan</th>
									<th>Gambar</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php
		                    $no = 1;
		                    foreach($db->show_masakan() as $x){
		                    ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $x['nama_masakan']; ?></td>
									<td><?php echo'Rp '.number_format($x['harga']); ?></td>
									<td><?php echo $x['jenis']; ?></td>
									<td>
			                      	<?php
			                      	if($x['status_masakan'] == 'Y')
			                      	{
			                      	?>
			                      	<a href="approve_masakan?table=masakan&id_masakan=<?php echo $x['id_masakan']; ?>&action=not-verifed" class="btn btn-primary btn-md">
			                      	Tersedia
			                      	</a>
			                      	<?php
			                      	}else{
			                      	?>
			                      	<a href="approve_masakan?table=masakan&id_masakan=<?php echo $x['id_masakan']; ?>&action=verifed" class="btn btn-danger btn-md">
			                      	Habis
			                      	</a>
			                      	<?php
			                      	}
			                      	?>
			                    	</td>
									<td>
										<img style="width: 50px; height: 50px;" src="../assets/images/masakan/<?php echo $x['image'];?>" alt="">
									</td>
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a class="ubah_masakan klik" data-toggle="modal" data-target="#mymodal_ubah_masakan" value="<?php echo $x['id_masakan'];?>"><i class="icon-pencil7"></i> Edit</a></li>
													<li><a class="hapus_masakan klik" value="<?php echo $x['id_masakan'];?>"><i class="icon-bin"></i> Hapus</a></li>
												</ul>
											</li>
										</ul>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->

<!-- Modal -->
<div class="modal fade" id="mymodal_ubah_masakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<div id="modal_ubah_masakan"></div>
    	</div>
 	 </div>
</div>
<!-- Modal -->


<!-- Modal -->

<div class="modal fade" id="mymodal_tambah_masakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<form action="proses/tambah_menu.php" method="post" enctype="multipart/form-data" id="form_tambah_masakan">
    			
	      		<div class="modal-header bg-primary">
	        		<h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	      			<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="nama_masakan" class="label-control">Nama Menu</label>
						<input type="text" maxlength = "30" class="form-control" name="nama_masakan" id="nama_masakan" placeholder="Masukan Nama Masakan..." required oninvalid="this.setCustomValidity('Nama Masakan Harus Di isi')" onkeypress="hack(event)" oninput="setCustomValidity('')">
							</div>

							<div class="col-sm-6">
								<label for="id_kategori">kategori</label required>
			                    <select id="id_kategori" name="id_kategori" class="select">  
			                    <option value="" disabled selected>Pilih Kategori</option>
			                    <?php
			                    include "../koneksi.php";
			                    $query = mysqli_query($conn, "SELECT * from kategori ORDER BY nama_kategori ASC");
			                    while ($data=mysqli_fetch_array($query)) {
			                    ?>
			                    <option value="<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></option>
			                    <?php } ?>
			                    </select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="harga" class="label-control">Harga</label>
								<input type="number" maxlength="10" class="form-control" name="harga" id="harga" placeholder="Masukan Harga..." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required oninvalid="this.setCustomValidity('Harga Harus Di isi')" onkeypress="hack(event)" oninput="setCustomValidity('')">
							</div>

							<div class="col-sm-6">
								<label>Jenis</label>
								<select id="jenis" name="jenis" class="select">
									<option value="" disabled selected>Pilih</option>
									<option value="Makanan">Makanan</option>
									<option value="Minuman">Minuman</option>
								</select>
							</div>
						</div>
					</div>
	  
	        		<div class="form-group">
						<label for="level" class="display-block">Gambar</label><br>
						<img src="../assets/images/blank_images.svg" alt="" id="image_upload_preview" style="height: 120px; width: 120px"><br>
						<input type="file" accept="image/*" class="file-input" name="gambar" id="inputGambar" required oninvalid="this.setCustomValidity('Gambar Harus Di isi')" oninput="setCustomValidity('')">
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-primary klik"><i class="glyphicon glyphicon-send"></i> Simpan</button>
	      		</div>
    		</form>
    	</div>
 	 </div>
</div>
<!-- Modal -->
