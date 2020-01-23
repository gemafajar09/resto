<?php
require_once('../../models/database.php');
include "../../koneksi.php";
include "../pages/head1.php";
$db = new database();
?>
<!-- Basic datatable -->
                   <div class="col-md-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Data Transaksi</h5>
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
		                    foreach($db->show_transaksi() as $x){
		                    ?>
							<tr>
							
								<td><?php echo $x['nama'];?></td>
								<td>Rp. <?php echo number_format($x['total_bayar']);?></td>
								<td>Rp. <?php echo number_format($x['jumlah_uang']);?></td>
								<td>Rp. <?php echo number_format($x['jumlah_uang']-$x['total_bayar']);?></td>
								<td><?php echo $x['tanggal'];?></td>
								
								
								<td class="text-center">
										<ul class="icons-list">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
													<i class="icon-menu9"></i>
												</a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a class="lihat_transaksi klik" data-toggle="modal" data-target="#mymodal_lihat_transaksi"  value="<?php echo $x['id_transaksi'];?>"><i class="icon-eye2"></i> Lihat</a></li>
												</ul>
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