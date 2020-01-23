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
                			<button type="button" class="btn bg-primary-400 btn-labeled legitRipple tambah_pengguna klik" data-toggle="modal" data-target="#modal_akses"><b><i class="icon-reading"></i></b> Tambah Petugas</button>
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
                       <a href="#" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $x['id_user'];?>">Edit</a>

                        <!--<a href="proses_hak.php?id_user=<?php echo $x['id_user']; ?>&aksi=hapus"onclick="return confirm('Are you sure?')"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>      
                        </td>-->
                      </tr>
									
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->


       <?php
                include "../koneksi.php";
                $no=0;
                $data = "SELECT * from user";
                $bacadata = mysqli_query($conn, $data);
                while($select_result = mysqli_fetch_array($bacadata))
                {
                  ?>
                  <?php
                $id = $select_result['id_user']; 
                $query_edit = mysqli_query($conn,"SELECT * FROM user WHERE id_user='$id'");
                $r = mysqli_fetch_array($query_edit);
                ?>
<!-- Modal -->
<div class="modal" id="myModal<?php echo $select_result['id_user'];?>" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Form Edit Menu</h4>
                  </div>

                  <div class="modal-body">
                    <form role="form"  method="POST" action="proses_hak.php?aksi=update" enctype="multipart/form-data" class="form-horizontal form-material"">
                            <div class="form-group">
                                <label for="username" class="col-md-4">Username :</label>
                                    <div class="col-md-8">
                                      <input type="hidden" name="id_user" value="<?php echo $r['id_user']?>">
                                      <input type="text" id="username" class="form-control" placeholder="Masukkan Username" name="username" value="<?php echo $r['username']?>" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="password" class="col-md-4">Password :</label>
                                    <div class="col-md-8">
                                      <input type="password" name="password" id="password" class="form-control" placeholder="">
                                      <input type="hidden" name="password_lama" placeholder="" value="<?php echo $r['password'] ?>" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="email" class="col-md-4">Email :</label>
                                    <div class="col-md-8">
                                      <input type="email" id="email" class="form-control" placeholder="Masukkan Email yang Falid" name="email" value="<?php echo $r['email']?>" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="nama_user" class="col-md-4">Nama User :</label>
                                    <div class="col-md-8">
                                      <input type="text" id="nama_user" class="form-control" placeholder="Masukkan Nama Anda" name="nama_user" value="<?php echo $r['nama_user']?>" required/>
                                    </div>
                                </div>
                               <div class="form-group">
                                 <label for="id_level" class="col-md-4">Nama Level :</label>
                                    <select name="id_level" class="form-control col-md-8">
                                    <?php     
                                    include"../koneksi.php";
                                      $select=mysqli_query($conn, "SELECT * FROM level");
                                      while($show=mysqli_fetch_array($select)){
                                    ?>
                                      <option value="<?=$show['id_level'];?>" <?=$r['id_level']==$show['id_level']?'selected':null?>><?=$show['nama_level'];?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                      <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div><!-- /.box-body -->
                    </form>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
<?php } ?>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <div class="modal fade" id="modal_akses" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title text-center">FORM TAMBAH User</h4>
            </div>
            <div class="modal-body">
              <h6 class="modal-title text-left"><b></b></h6>
              <br />
                <form class="form-horizontal" role="form" method="post" action="proses_hak.php?aksi=input_user" enctype="multipart/form-data">
                
                  <div class="form-group">
                    <label for="username" class="col-md-4">Username</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="username" id="username" placeholder="Usename" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-md-4">Password</label>
                    <div class="col-md-8">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-md-4">Email</label>
                    <div class="col-md-8">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama_user" class="col-md-4">Nama User</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Nama"  required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="level" class="col-md-4">Level</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="id_level" id="id_level"  placeholder="Level" required />
                    </div>
                  </div>
                  <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
                </form>
              </div>
            
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

					$('.tambah_pengguna').click(function(){
						$("#inputGambar").change(function () {
		        			readURL(this);
		   				});

		   				$('#form_tambah_pengguna').submit(function(e){
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
		   								$('#mymodal_tambah_pengguna').modal('hide');
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