				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Data</span> - Menu</h4>
						</div>

					</div>

					<div class="breadcrumb-line breadcrumb-line-component">
						<ul class="breadcrumb">
							<li><a href="?page=Home"><i class="icon-home2 position-left"></i> Dashboard</a></li>
							<li><a href="?page=Menu">Entri Referensi</a></li>
							<li class="active">Menu</li>
						</ul>

					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Data Masakan</h5>
                			<button type="button" class="btn bg-primary-400 btn-labeled legitRipple tambah_menu klik" data-toggle="modal" data-target="#mymodal_tambah_menu"><b><i class="icon-plus3"></i></b> Tambah Menu</button>
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
include "../koneksi.php";
$no = 1;
$sql = mysqli_query($conn, "SELECT * FROM masakan ORDER BY id_masakan DESC");
while ($data = mysqli_fetch_assoc($sql)) {
?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $data['nama_masakan']; ?></td>
									<td><?php echo'Rp '.number_format($data['harga']); ?></td>
									<td><?php echo $data['jenis']; ?></td>
									<td>
									  <?php if ($data['status_masakan'] == 'Y') { ?>
				                      <span class="label label-success">
				                        <i class="fa fa-check-square-o"></i> Tersedia
				                      </span>
				                      <?php } else { ?>
				                      <span class="label label-danger">
				                        <i class="fa fa-ban"></i> Habis
				                      </span>
				                      <?php } ?>
									</td>
									<td>
										<img style="width: 50px; height: 50px;" src="../assets/images/masakan/<?php echo $data['image'];?>" alt="">
									</td>
									<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#" data-toggle="modal" data-target="#mymodal_ubah_menu" value="<?php echo $data['id_masakan'];?>><i class="icon-file-pdf"></i> Edit</a></li>
													<li><a href="#" value="<?php echo $data['id_masakan'];?>><i class="icon-file-excel"></i> Hapus</a></li>
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
<div class="modal fade" id="mymodal_ubah_menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<?php
	include '../koneksi.php';
	$id_masakan = $_GET['id_masakan'];
	$query = $conn->query("SELECT * FROM masakan WHERE id_masakan = $id_masakan");
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
	        			<input type="hidden" name="id_masakan" value="<?php echo $id;?>">
	        			<input type="hidden" name="gambar_lama" value="<?php echo $data['image'];?>">
						<label for="nama_masakan" class="label-control">Nama Menu</label>
						<input type="text" class="form-control" name="nama_masakan" id="nama_masakan" value="<?php echo $data['nama_masakan'];?>" required oninvalid="this.setCustomValidity('Nama Masakan Harus Di isi')" oninput="setCustomValidity('')">
	        		</div>
	        		<div class="form-group">
						<label for="harga" class="label-control">Harga</label>
						<input type="number" class="form-control" name="harga" id="harga" value="<?php echo $data['harga'];?>" required oninvalid="this.setCustomValidity('Harga Harus Di isi')" oninput="setCustomValidity('')">
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
						<label for="gambar" class="display-block">Gambar</label><br>
						<img src="../assets/images/masakan/<?php echo $data['image'];?>" alt="" id="image_upload_preview" style="height: 120px; width: 120px"><br>
						<input type="file" class="file-styled" name="gambar" id="inputGambar" required oninvalid="this.setCustomValidity('Gambar Harus Di isi')" oninput="setCustomValidity('')">
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Simpan</button>
	      		</div>
    		</form>
    	</div>
 	 </div>
</div>
<!-- Modal -->


<!-- Modal -->

<div class="modal fade" id="mymodal_tambah_menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<form action="proses/tambah_menu.php" method="post" enctype="multipart/form-data" id="form_tambah_menu">
    			
	      		<div class="modal-header bg-primary">
	        		<h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	       			</button>
	     		 </div>
	      		<div class="modal-body">
	        		<div class="form-group">
						<label for="nama_masakan" class="label-control">Nama Menu</label>
						<input type="text" class="form-control" name="nama_masakan" id="nama_masakan" placeholder="Masukan Nama Masakan..." required oninvalid="this.setCustomValidity('Nama Masakan Harus Di isi')" oninput="setCustomValidity('')">
	        		</div>
	        		<div class="form-group">
		                <label for="id_kategori">kategori</label required>
		                    <select id="id_kategori" name="id_kategori" class="form-control">  
		                    <option>Pilih Kategori</option>
		                    <?php
		                    include "../koneksi.php";
		                    $query = mysqli_query($conn, "SELECT * from kategori ORDER BY nama_kategori ASC");
		                    while ($data=mysqli_fetch_array($query)) {
		                    ?>
		                    <option value="<?php echo $data['nama_kategori']; ?>"><?php echo $data['nama_kategori']; ?></option>
		                    <?php } ?>
		                    </select>
		              </div>
	        		<div class="form-group">
						<label for="harga" class="label-control">Harga</label>
						<input type="number" class="form-control" name="harga" id="harga" placeholder="Masukan Harga..." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"type = "number"maxlength = "10" required oninvalid="this.setCustomValidity('Harga Harus Di isi')" oninput="setCustomValidity('')">
	        		</div>
	        		<div class="form-group">
						<label>Jenis</label>
						<select id="jenis" name="jenis" class="form-control">
							<option value="">Pilih</option>
							<option value="Makanan">Makanan</option>
							<option value="Minuman">Minuman</option>
						</select>
					</div>
	        		<div class="form-group">
						<label>Status Makanan</label>
						<select id="status_masakan" name="status_masakan" class="form-control">
							<option value="">Pilih</option>
							<option value="Y">Tersedia</option>
							<option value="N">Habis</option>
						</select>
					</div>

	        		<div class="form-group">
						<label for="level" class="display-block">Gambar</label><br>
						<img src="../assets/images/blank_images.svg" alt="" id="image_upload_preview" style="height: 120px; width: 120px"><br>
						<input type="file" class="file-styled" name="gambar" id="inputGambar" required oninvalid="this.setCustomValidity('Gambar Harus Di isi')" oninput="setCustomValidity('')">
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

	<audio id="klik" src="../assets/audio/klik.mp3"></audio>
	<audio id="success" src="../assets/audio/success.mp3"></audio>
	<audio id="error" src="../assets/audio/error.wav"></audio>
	<script>
    	$(document).ready(function(){
    		klik();
    		loadData_menu();

    		function klik()
			{
				$('.klik').click(function(){
    				document.getElementById('klik').play();	
    			});	
			}

			function error()
			{
				document.getElementById('error').play();	
			}  

			function success()
			{
				document.getElementById('success').play();	
			}

			function loadData_menu(keyword = '')
			{
				$.get('masakan.php?keyword='+keyword, function(data){
					$('#menu').html(data);

					$('.tambah_menu').click(function(){
						$("#inputGambar").change(function () {
		        			readURL(this);
		   				});

		   				$('#form_tambah_menu').submit(function(e){
		   					e.preventDefault();
		   					$.ajax({
		   						url: $(this).attr('action'),
		   						method: $(this).attr('method'),
		   						data: new FormData(this),
		   						dataType: 'JSON',
		   						contentType: false,
		   						processData: false,
		   						success: function(data){
		   							if(data.hasil == true)
		   							{
		   								$('#mymodal_tambah_menu').modal('hide');
										$('.modal-backdrop').remove();
										$('body').removeClass('modal-open');
		   								success();
		   								swal({
		   									title : 'Sukses',
		   									icon  : 'success',
		   									text  : data.pesan, 
		   								});
		   								loadData_menu();
		   							}
		   							else{
		   								error();
		   								swal({
		   									title : 'Sukses',
		   									icon  : 'error',
		   									text  : data.pesan,
		   								});
		   							}
		   						}
		   					});
		   				});
					});

					
					$('.ubah_menu').click(function(){
						let id = $(this).attr('value');
						$.get('modal_ubah_menu.php?id='+id, function(data){
							$('#modal_ubah_menu').html(data);
							$('#form_ubah_menu').submit(function(e){
								e.preventDefault();
								var me = $(this);
								$.ajax
								({
									url:me.attr('action'),
									method:'POST',
									data:new FormData(this),
									dataType:'JSON',
									contentType:false,
									processData:false,
									beforeSend:function()
									{
										$('#pesan').html('<b>Uploading...</b>');
									},
									success:function(data)
									{
										if (data.hasil == true) 
										{
											$('#mymodal_ubah_menu').modal('hide');
												$('.modal-backdrop').remove();
												$('body').removeClass('modal-open');
												success();
												swal({
										            title: "Sukses",
										            text: data.pesan, 
										            icon: "success",
										    })
											loadData_menu();

										}
										else
										{
											error();
											swal({
														icon: 'error',
														title: 'Gagal',
														text: data.pesan,
													})
													return false;
										}
									}
								});
							});
						});
					});

					$('.hapus_menu').click(function(){
						let id_menu = $(this).attr('value');
						swal({
				            title: "Lanjutkan Menghapus?",
				            text: 'Data yang dihapus tidak dapat dikembalikan.', 
				            icon: "warning",
				            buttons: true,
				            dangerMode: true,
				        })
				        .then((willDelete) =>
				        {
				          	if (willDelete) 
				          	{
				          		$.ajax
						  		({
									url:'proses/hapus_menu.php?id_menu='+id_menu,
									method:'POST',
									dataType:'JSON',
									success: function(data){
										if (data.hasil == true) {
											success();
								            swal(data.pesan, {
								              icon: "success",
								            });
											loadData_menu();
										}
										else
										{
											error();
								            swal(data.pesan, {
								              icon: "error",
								            });
										}
									}

								});        
				          	}
				          	
				        });

					});

					klik();
				});


			}

			$('#cari').keyup(function(){
				var keyword = $(this).val();
				loadData_menu(keyword);
			});

			function readURL(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();

		            reader.onload = function (e) {
		                $('#image_upload_preview').attr('src', e.target.result);
		            }

		            reader.readAsDataURL(input.files[0]);
		        }
			}


    	});
    </script>