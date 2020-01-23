<?php
	require_once('../../models/database.php');
	include "../../koneksi.php";
	include "../pages/head1.php";
	$db = new database();
	$id_masakan = $_GET['id_masakan'];
	$query = $conn->query("SELECT * FROM masakan WHERE id_masakan = $id_masakan");
	$data = mysqli_fetch_array($query);
?>
<form action="proses/ubah_masakan.php" method="post" enctype="multipart/form-data" id="form_ubah_masakan">
    			
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Ubah Masakan</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>

	     		 <div class="modal-body">
	      			<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<input type="hidden" name="id_masakan" value="<?php echo $id_masakan;?>">
	        					<input type="hidden" name="gambar_lama" value="<?php echo $data['image'];?>">
								<label for="nama_masakan" class="label-control">Nama Masakan</label>
								<input type="text" maxlength = "30" class="form-control" name="nama_masakan" id="nama_masakan" value="<?php echo $data['nama_masakan'];?>" onkeypress="hack(event)" required oninvalid="this.setCustomValidity('Nama Masakan Harus Di isi')" oninput="setCustomValidity('')">
							</div>

							<div class="col-sm-6">
								<label for="id_kategori">Kategori</label required>
			                    <select id="id_kategori" name="id_kategori" class="select">  
			                    <option value="" disabled select>Pilih Kategori</option>
			                    <?php
			                    include "../koneksi.php";
			                    $query = mysqli_query($conn, "SELECT * from kategori ORDER BY nama_kategori ASC");
			                    while ($data=mysqli_fetch_array($query)) {
			                    ?>
			                    <option value="<?php echo $data['id_kategori']; ?><?php if($id_kategori=='nama_kategori') {echo 'select="select"';} ?>"><?php echo $data['nama_kategori']; ?></option>
			                    <?php } ?>
			                    </select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="harga" class="label-control">Harga</label>
								<input type="number" maxlength="10" class="form-control" name="harga" id="harga" value="<?php echo $data['harga'];?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="hack(event)" required oninvalid="this.setCustomValidity('Harga Harus Di isi')" oninput="setCustomValidity('')">
							</div>

							<div class="col-sm-6">
								<label>Jenis</label>
								<select id="jenis" name="jenis" class="select">
									<option value="" disabled select>Pilih</option>
									<option value="Makanan <?php if($jenis=='Makanan') {echo 'select="select"';} ?>">Makanan</option>
									<option value="Minuman <?php if($jenis=='Minuman') {echo 'select="select"';} ?>">Minuman</option>
								</select>
							</div>
						</div>
					</div>
	  
	        		<div class="form-group">
	        			<div class="row">
	        				<div class="col-sm-12">
								<label>Jenis</label>
								<select id="status_masakan" name="status_masakan" class="select">
									<option value="" disabled select>Pilih</option>
									<option value="Y <?php if($status_masakan=='Y') {echo 'select="select"';} ?>">Tersedia</option>
									<option value="N <?php if($status_masakan=='N') {echo 'select="select"';} ?>">Habis</option>
								</select>
							</div>

							<div class="col-sm-12">
								<label for="level" class="display-block">Gambar</label><br>
								<img src="../assets/images/masakan/<?php echo $data['image'];?>" alt="" id="image_upload_preview" style="height: 100px; width: 100px"><br>
								<input type="file" class="file-input" name="gambar" id="inputGambar" required oninvalid="this.setCustomValidity('Gambar Harus Di isi')" oninput="setCustomValidity('')">
							</div>

						</div>
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Simpan</button>
	      		</div>
    		</form>