<?php
	include '../../koneksi.php';
	$id = $_GET['id'];
	$query = $conn->query("SELECT * FROM masakan WHERE id_masakan = $id");
	$data = mysqli_fetch_assoc($query);
?>

<form action="proses/ubah_menu.php" method="post" enctype="multipart/form-data" id="form_ubah_menu">
    			
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Ubah Menu</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
	        			<input type="hidden" name="id_menu" value="<?php echo $id;?>">
	        			<input type="hidden" name="gambar_lama" value="<?php echo $data['image'];?>">
						<label for="nama_masakan" class="label-control">Nama Menu</label>
						<input type="text" class="form-control" name="nama_masakan" id="nama_masakan" value="<?php echo $data['nama_masakan'];?>" required>
	        		</div>
	        		<div class="form-group">
						<label for="harga" class="label-control">Harga</label>
						<input type="number" class="form-control" name="harga" id="harga" value="<?php echo $data['harga'];?>" required>
	        		</div>
	        		<div class="form-group">
						<label>Jenis</label>
						<select id="jenis" name="jenis" value="<?php echo $data['jenis'];?>" class="form-control">
							<option value="">Pilih</option>
							<option value="Makanan">Makanan</option>
							<option value="Minuman">Minuman</option>
						</select>
					</div>
	        		<div class="form-group">
						<label>Status Makanan</label>
						<select id="status_masakan" name="status_masakan" value="<?php echo $data['status_masakan'];?>" class="form-control">
							<option value="">Pilih</option>
							<option value="Tersedia">Tersedia</option>
							<option value="Habis">Habis</option>
						</select>
					</div>

	        		<div class="form-group">
						<label for="level" class="label-control">Gambar</label><br>
						<img src="../assets/images/masakan/<?php echo $data['image'];?>" alt="" id="image_upload_preview" style="height: 120px; width: 120px"><br>
						<input type="file" class="btn btn-default btn-block" name="gambar" id="inputGambar"><br>
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Simpan</button>
	      		</div>
    		</form>