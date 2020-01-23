<?php
require_once('../../models/database.php');
include "../../koneksi.php";
include "../pages/head1.php";
$db = new database();
$tanggal = date("Y-m-d");
if(isset($_GET['tanggal']))
{
    $tanggal = $_GET['tanggal'];
}
?>
<!-- Basic datatable -->
                   <div class="col-md-8">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Data Transaksi</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
									<br>
                                    <li>
                                    <form action="" method="POST" id="form-data">
                                        <div class="form-group">
                                            <input type="date" value="<?= $tanggal ?>" name="tanggal" class="form-control" onchange="tampilkanData(this)">
                                        </div>
                                    </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
						<script>
							function tampilkanData(tanggal){
								// document.getElementById("form-data").submit();
								loadData_pesanan('ajax/pembayaran.php?tanggal=' + tanggal.value);
							}
						</script>
                        <div class="panel-body">
                        </div>

                        <table class="table datatable-responsive">
                            <thead>
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <th>Total Pesanan</th>
                                    <th>Total Bayar</th>
                                    <th>Kembalian</th>
                                    <th>Tanggal</th>
									
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
		                    $total = 0;
		                    foreach($db->show_transaksi($tanggal) as $x){
		                    ?>
							<tr>
							
								<td><?php echo $x['nama'];?></td>
								<td>Rp. <?php echo number_format($x['total_bayar']);?></td>
								<td>Rp. <?php echo number_format($x['jumlah_uang']);?></td>
								<td>Rp. <?php echo number_format($x['jumlah_uang']-$x['total_bayar']);?></td>
								<td><?php echo $x['tanggal'];?></td>
								
								
								<td class="text-center">
									<ul class="icons-list">
										<!-- <li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a class="lihat_transaksi klik" data-toggle="modal" data-target="#mymodal_lihat_transaksi"  value="<?php echo $x['id_transaksi'];?>"><i class="icon-eye2"></i> Lihat</a></li>
											</ul>
										</li> -->
										<li class="dropdown">
											<a href="cetak?id_transaksi=<?php echo $x['id_transaksi']; ?>" class="btn btn-primary">
												Print
											</a>
										</li> 
									</ul>
								</td>

							</tr>
							<?php
								$total = $total + $x['total_bayar'];
								}
							?>
							
                            </tbody>
                            <tr>
								<td colspan="2"><strong><h4>Total</h4></td>
								<td colspan="2"><strong><h4>Rp. <?php echo number_format($total);?></h4></td>
							</tr>
                        </table>
                    </div>
                </div>
                    <!-- /basic datatable -->


                    <!-- Basic datatable -->
                   <div class="col-md-4">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Data Konfirmasi Transaksi</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="box-mid border-warning" style="overflow-y: auto; max-height: 500px">
        <?php
			$query = $conn->query("SELECT * FROM pesanan INNER JOIN meja ON pesanan.no_meja = meja.id_meja WHERE pesanan.status_pesanan = 'menunggu pembayaran'");
			$hitung = mysqli_num_rows($query);
		?>
		<h4>Pesanan Masuk <span class="badge" style="background-color: red"><?php echo $hitung;?></span></h4>
		<h5>Status <span class="label label-warning">menunggu pembayaran</span></h5>
		<hr>
		<?php
			if ($hitung > 0) {
			
			while($rows = mysqli_fetch_assoc($query)) :
		?>
		<div class="info-box" style="height: 150px">
			<center><strong>Meja : <?php echo $rows['no_meja'];?></strong></center>
			ID Pesanan : <?php echo $rows['id_pesanan'];?> <br>
			Tanggal Pesan :<?php echo $rows['tanggal'];?><br>
			<button class="btn btn-info btn-sm pull-right lihat_pesanan klik" data-toggle="modal" data-target="#mymodal_lihat_pesanan" value="<?php echo $rows['id_pesanan'];?>">Konfirmasi Pembayaran</button>
		</div>
		<?php
			endwhile;
		
			}
			else{

			
		?>
		<div class="box-info">
			<center><img src="../assets/images/empty_cart.jpg" alt="" style="height: 170px; width: 170px"></center>
		</div>
	<?php } ?>
	</div>




<!-- Modal -->
<div class="modal fade" id="mymodal_lihat_pesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<div id="modal_lihat_pesanan"></div>
    	</div>
 	 </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="mymodal_lihat_transaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<div id="modal_lihat_transaksi"></div>
    	</div>
 	 </div>
</div>
<!-- Modal -->