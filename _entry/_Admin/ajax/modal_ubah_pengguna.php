<?php
	require_once('../../models/database.php');
	include "../../koneksi.php";
	include "../pages/head1.php";
	$db = new database();
	include '../../koneksi.php';
	$id_user = $_GET['id_user'];
	$query = $conn->query("SELECT * FROM user WHERE id_user = $id_user");
	$data = mysqli_fetch_assoc($query);
?>

<form action="proses/ubah_pengguna.php" method="post" enctype="multipart/form-data" id="form_ubah_pengguna">
    			
	      		<div class="modal-header bg-primary">
	        		<h5 class="modal-title" id="exampleModalLabel">Ubah Pengguna</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>

	     		 <div class="modal-body">
	      			<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<input type="hidden" name="id_user" value="<?php echo $id_user;?>">
	        					<input type="hidden" name="gambar_lama" value="<?php echo $data['gambar_user'];?>">
								<label for="username" class="label-control">Username</label>
								<input type="text" maxlength = "20" class="form-control" name="username" id="username" value="<?php echo $data['username'];?>" required oninvalid="this.setCustomValidity('username Harus Di isi')" onkeypress="hack(event)" oninput="setCustomValidity('')">
							</div>
							
							<div class="col-sm-6">
								<label for="nama_user" class="label-control">Nama User</label>
								<input type="text" maxlength="20" class="form-control" name="nama_user" id="nama_user" value="<?php echo $data['nama_user'];?>" required oninvalid="this.setCustomValidity('Nama User Harus Di isi')" onkeypress="hack(event)" oninput="setCustomValidity('')">
							</div>

							
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="password" class="label-control">Password</label>
								<input type="password" class="form-control" name="password" id="password" value="<?php echo $data['password'];?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "20" required oninvalid="this.setCustomValidity('Password Harus Di isi')" onkeypress="hack(event)" oninput="setCustomValidity('')">
							</div>

							<div class="col-sm-6">
								<label for="email" class="label-control">Email</label>
								<input type="email" class="form-control" name="email" id="email" value="<?php echo $data['email'];?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "20" required oninvalid="this.setCustomValidity('Email Harus Di isi')" onkeypress="hack(event)" oninput="setCustomValidity('')">
							</div>

						</div>
					</div>
	  
	        		<div class="form-group">
	        			<div class="row">
	        				<div class="col-sm-6">
								<label for="id_level">Level</label>
			                    <select id="id_level" name="id_level" class="select">  
			                    <option value="" disabled select>Pilih Level</option>
			                    <?php
			                    include "../koneksi.php";
			                    $query = mysqli_query($conn, "SELECT * from level ORDER BY nama_level ASC");
			                    while ($hasil=mysqli_fetch_array($query)) {
			                    ?>
			                    <option value="<?php echo $hasil['id_level']; ?><?php if($id_level=='nama_level') {echo 'select="select"';} ?>"><?php echo $hasil['nama_level']; ?></option>
			                    <?php } ?>
			                    </select>
							</div>

	        				<div class="col-sm-6">
								<label>Status </label>
								<select id="status" name="status" class="select">
									<option value="" disabled select>Pilih</option>
									<option value="Y <?php if($status=='Y') {echo 'select="select"';} ?>">Aktif</option>
									<option value="N <?php if($status=='N') {echo 'select="select"';} ?>">Non Aktif</option>
								</select>
							</div> 

						</div>
	        		</div>
	        		<div class="form-group">
	        			<div class="row">
	        				<div class="col-sm-12">
								<label for="level" class="display-block">Gambar</label><br>
								<img src="../assets/images/pengguna/<?php echo $data['gambar_user'];?>" alt="" id="image_upload_preview" style="height: 100px; width: 100px"><br>
								<input type="file" class="file-input" name="gambar" id="inputGambar" >
							</div>
						</div>
					</div>

	      		</div>

	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Simpan</button>
	      		</div>
    		</form>