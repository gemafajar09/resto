<?php
require_once('../../models/database.php');
include "../../koneksi.php";
include "../pages/head1.php";
$db = new database();
?>
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Data Pengguna</h5>
                			<button type="button" class="btn bg-primary-400 btn-labeled legitRipple tambah_pengguna klik" data-toggle="modal" data-target="#mymodal_tambah_pengguna"><b><i class="icon-plus3"></i></b> Tambah Pengguna</button>
                			<a href="laporan_pengguna" type="button" class="btn bg-danger-400 btn-labeled legitRipple klik"><b><i class="icon-printer"></i></b> Cetak</a>
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
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama User</th>
                        <th>Level</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach($db->show_pengguna() as $x){
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $x['username']; ?></td>
                        <td>***</td>
                        <td><?php echo $x['nama_user']; ?></td>
                        <td><?php echo $x['nama_level']; ?></td>
                        <td><?php echo $x['email']; ?></td>
                        <td>
                          <?php
                          if($x['status'] == 'Y')
                          {
                          ?>
                          <a href="approve?table=user&id_user=<?php echo $x['id_user']; ?>&action=not-verifed" class="btn btn-primary btn-md">
                          Aktif
                          </a>
                          <?php
                          }else{
                          ?>
                          <a href="approve?table=user&id_user=<?php echo $x['id_user']; ?>&action=verifed" class="btn btn-danger btn-md">
                          Tidak Aktif
                          </a>
                          <?php
                          }
                          ?>
                        </td>
                        <td>
							<img style="width: 50px; height: 50px;" src="../assets/images/pengguna/<?php echo $x['gambar_user'];?>" alt="">
						</td>
                        <td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a class="ubah_pengguna klik" data-toggle="modal" data-target="#mymodal_ubah_pengguna" value="<?php echo $x['id_user'];?>"><i class="icon-pencil7"></i> Edit</a></li>
													<li><a class="hapus_pengguna klik" value="<?php echo $x['id_user'];?>"><i class="icon-bin"></i> Hapus</a></li>
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
<div class="modal fade" id="mymodal_ubah_pengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<div id="modal_ubah_pengguna"></div>
    	</div>
 	 </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="mymodal_tambah_pengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<form action="proses/tambah_pengguna.php" method="post" enctype="multipart/form-data" id="form_tambah_pengguna">
    			
	      		<div class="modal-header bg-primary">
	        		<h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
	        			<div class="row">
							<div class="col-sm-6">
						<label for="username" class="label-control">Username</label>
						<input type="text" maxlength = "20" class="form-control" name="username" id="username" placeholder="Masukan Username..." required oninvalid="this.setCustomValidity('Username Harus Di isi')" onkeypress="hack(event)" oninput="setCustomValidity('')">
	        		</div>
	        		<div class="col-sm-6">
							<label for="nama_user" class="label-control">Nama</label>
							<input type="text" maxlength = "20" class="form-control" name="nama_user" id="nama_user" placeholder="Masukan Nama..." required oninvalid="this.setCustomValidity('Nama Harus Di isi')" onkeypress="hack(event)" oninput="setCustomValidity('')">
	        			</div>
		          </div>
		      </div>
	        		<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="password" class="label-control">Password</label>
						<input type="password" maxlength = "20" class="form-control" name="password" id="password" placeholder="Masukan Password..." required oninvalid="this.setCustomValidity('Password Harus Di isi')" onkeypress="hack(event)" oninput="setCustomValidity('')">
							</div>

							<div class="col-sm-6">
								<label for="konfirmasi_password" class="label-control">Konfirmasi Password</label>
						<input type="password" maxlength="20" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Masukan Password Sekali Lagi..." required oninvalid="this.setCustomValidity('Konfirmasi Password Harus Di isi')" oninput="setCustomValidity('')">
							</div>
						</div>
					</div>
					
	        		<div class="form-group">
	        		<div class="row">
	        			<div class="col-sm-6">
							<label for="email" class="label-control">Email</label>
							<input type="email" maxlength = "30" class="form-control" name="email" id="email" placeholder="Masukan Email..." required oninvalid="this.setCustomValidity('Email Harus Di isi')" onkeypress="hack(event)" oninput="setCustomValidity('')">
			        	</div>
			        	<div class="col-sm-6">
		                <label for="id_kategori">Level</label required>
		                    <select id="id_level" name="id_level" class="select" required oninvalid="this.setCustomValidity('Level Harus Di isi')" oninput="setCustomValidity('')">  
		                    <option value="" disabled selected>Pilih Level</option>
		                    <?php
		                    include "../koneksi.php";
		                    $query = mysqli_query($conn, "SELECT * from level ORDER BY nama_level ASC");
		                    while ($data=mysqli_fetch_array($query)) {
		                    ?>
		                    <option value="<?php echo $data['id_level']; ?>"><?php echo $data['nama_level']; ?></option>
		                    <?php } ?>
		                    </select>
		              </div>
			        </div>
			        </div>

	        		<div class="form-group">
						<label for="level" class="label-control">Gambar</label><br>
						<img src="../assets/images/blank_images.svg" alt="" id="image_upload_preview" style="height: 100px; width: 100px">
						<input type="file" accept="image/*" class="file-input" name="gambar" id="inputGambar" required oninvalid="this.setCustomValidity('Gambar Harus Di isi')" oninput="setCustomValidity('')">
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-primary klik"><i class="fa fa-send"></i> Simpan</button>
	      		</div>
    		</form>
    	</div>
 	 </div>
</div>
<!-- Modal -->