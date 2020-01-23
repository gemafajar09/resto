<?php 
include "pages/head.php";
?>

	<!-- Second navbar -->
	<div class="navbar navbar-default navbar-xs" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-circle-down2"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav">
				<li><a href="index"><i class="icon-list3 position-left"></i> Daftar Menu</a></li>
				<li class="active"><a href="meja"><i class="icon-table position-left"></i> Daftar Meja</a></li>
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-help position-left"></i> Info <span class="caret"></span></a>

					<ul class="dropdown-menu">
						<li><a href="#">Info Aplikasi</a></li>
					</ul>
				</li>
			</ul>

		</div>
	</div>
	<!-- /second navbar -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Daftar</span> - Menu</h4>
						</div>

					</div>

					<div class="breadcrumb-line breadcrumb-line-component">
						<ul class="breadcrumb">
							<li><a href="index"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Daftar Meja</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Detached content -->
					<div class="container-detached">
						<div class="content-detached">

							<!-- Grid -->
							<div class="row">
								<?php
								include "_entry/koneksi.php";
                                    // Include / load file koneksi.php
                                    // Cek apakah terdapat data pada page URL
                                    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                                    $limit = 8; // Jumlah data per halamanya

                                    // Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
                                    $limit_start = ($page - 1) * $limit;

                                    // Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
                                    $data=mysqli_query($conn, "SELECT * FROM meja where status='kosong'LIMIT ".$limit_start.",".$limit);
                                    $no = $limit_start + 1; // Untuk penomoran tabel
                                    while($show=mysqli_fetch_array($data)){
                                    ?>
								<div class="col-lg-3">
							<div class="panel">
								<div class="panel-body text-center">
									<div class="icon-object border-success text-success"><i class="icon-table"></i></div>
									<h5 class="text-semibold"><?php echo $show['no_meja']; ?></h5>
								</div>
							</div>
							</div>
							<?php } ?>
								
							</div>
							<!-- /grid -->


							<!-- Pagination -->
							<div class="text-center content-group-lg pt-20">
								<ul class="pagination">
			<?php
            if ($page == 1) { // Jika page adalah pake ke 1, maka disable link PREV
            ?>
                <li class="disabled"><a href="#">First</a></li>
                <li class="disabled"><a href="#">&laquo;</a></li>
            <?php
            } else { // Jika buka page ke 1
                $link_prev = ($page > 1) ? $page - 1 : 1;
            ?>
                <li><a href="meja?page=1">First</a></li>
                <li><a href="meja?page=<?php echo $link_prev; ?>">&laquo;</a></li>
            <?php
            }
            ?>

            <!-- LINK NUMBER -->
            <?php
            // Buat query untuk menghitung semua jumlah data
            $sql2 = mysqli_query($conn,"SELECT COUNT(*) AS jumlah FROM meja ");
            ($get_jumlah = (mysqli_fetch_array($sql2)));

            $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamanya
            $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
            $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
            $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

            for ($i = $start_number; $i <= $end_number; $i++) {
                $link_active = ($page == $i) ? 'class="active"' : '';
            ?>
                <li <?php echo $link_active; ?>><a href="meja?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>

            <!-- LINK NEXT AND LAST -->
            <?php
            // Jika page sama dengan jumlah page, maka disable link NEXT nya
            // Artinya page tersebut adalah page terakhir
            if ($page == $jumlah_page) { // Jika page terakhir
            ?>
                <li class="disabled"><a href="#">&raquo;</a></li>
                <li class="disabled"><a href="#">Last</a></li>
            <?php
            } else { // Jika bukan page terakhir
                $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
            ?>
                <li><a href="meja?page=<?php echo $link_next; ?>">&raquo;</a></li>
                <li><a href="meja?page=<?php echo $jumlah_page; ?>">Last</a></li>
            <?php
            }
            ?>
								</ul>
							</div>
							<!-- /pagination -->

						</div>
					</div>
					<!-- /detached content -->

					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

			<!-- Inline form modal -->
					<div id="modal_form_inline" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content text-center">
								<div class="modal-header">
									<h5 class="modal-title">Login Pelanggan</h5>
								</div>

								<form action="pelanggan/proses/tambah_pelanggan.php" method="post" id="tambah" class="form-inline">
									<div class="modal-body">

										<div class="form-group has-feedback">
											<label for="nama">Nama: </label>
											<input type="text" name="nama" placeholder="Masukan Nama" class="form-control" required oninvalid="this.setCustomValidity('Nama Harus Di isi')" onkeypress="hack(event)" oninput="setCustomValidity('')">
											<div class="form-control-feedback">
												<i class="icon-user text-muted"></i>
											</div>
										</div>

										<div class="form-group has-feedback">
											<label for="id_meja" class="label-control">Kode Meja: </label>
											<select name="id_meja" id="id_meja" class="form-control">
												<?php
													$query = $conn->query("SELECT * FROM meja WHERE status = 'kosong'");
													$hitung = mysqli_num_rows($query);
													while($rows = mysqli_fetch_assoc($query)):
												?>
													<option value="<?php echo $rows['id_meja'];?>"><?php echo $rows['no_meja'];?></option>
												<?php endwhile;?>
											</select>
										</div>

									</div>
									<?php
										if ($hitung  < 1) {
											echo"<div class='alert alert-danger'>Mohon maaf meja sedang penuh</div>";
										}
										else{
									?>
									<div class="modal-footer text-center">
										<button type="submit" name="logadm" class="btn btn-primary">Sign me in <i class="icon-plus22"></i></button>
									</div>
									<?php } ?>
								</form>
							</div>
						</div>
					</div>
					<!-- /inline form modal -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

<script type="text/javascript">
	function hack(evt) {
		var ch = String.fromCharCode(evt.which);
		if (!(/[a-zA-Z0-9]/.test(ch))) {
			evt.preventDefault();
		}
	}
</script>

	<script>
		$(document).ready(function(){

			$('#tambah').submit(function(e){
				e.preventDefault();
				$.ajax({
					url:$(this).attr('action'),
					method:$(this).attr('method'),
					data: new FormData(this),
					dataType: 'JSON',
					contentType: false,
					processData: false,
					success: function(data)
					{
						if(data.hasil == true)
						{
							window.location.assign('pelanggan/index');
						}
						else
						{
							
							swal({
								title: 'Gagal',
								icon: 'error',
								text: data.pesan
							});
						}
					}
				});
			});
		});
	</script>

</body>
</html>
