		<?php
	$id_order = session_id();
	include "../koneksi.php";
	$grand_total = mysqli_query($conn,"SELECT SUM(harga * jumlah) AS TOTAL FROM  
	        'masakan'
	        INNER JOIN 'detail_order' 
	            ON ('masakan'.'id_masakan' = 'detail_order'.'id_masakan') 
	                                            WHERE detail_order.id_detail_order'" );
	$rowGrandTotal = mysqli_fetch_array($grand_total);
	?>
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

						<div class="col-md-8">
							<div class="panel">
	                <div class="panel-body">
	                    <input type="text" placeholder="Search Masakan" id="keywords" class="form-control blog-search"
	                           onkeyup="searchFilter()">
	                </div>
	            </div>
						<div class="container-detached">
							<div id="show_product" class="content-detached">
						<?php $query = mysqli_query($conn,"SELECT * FROM masakan mkn INNER JOIN kategori ktg ON mkn.id_kategori=ktg.id_kategori");
	                    while ($data = mysqli_fetch_array($query)) { ?>
							<ul class="media-list">
								<li class="media panel panel-body stack-media-on-mobile">
									<a href="../assets/images/placeholder.jpg" class="media-left" data-popup="lightbox">
										<img src="../assets/images/masakan/<?php echo $data['image']; ?>" width="96" alt="">
									</a>

									<div class="media-body">
										<h6 class="media-heading text-semibold">
											<a href="#"><?php echo $data['nama_masakan']; ?></a>
										</h6>

										<ul class="list-inline list-inline-separate mb-10">
											<li><a href="#" class="text-muted"><?php echo $data['id_kategori']; ?></a></li>
										</ul>

										<p class="content-group-sm">Masakan</p>
									</div>

									<div class="media-right text-center">
										<h3 class="no-margin text-semibold"><?php echo'Rp '.number_format($data['harga']); ?></h3>

										<a href="cart.php?mod=basket&act=add&id=<?php echo $data['id_masakan'] ?>" type="button" class="btn bg-teal-400 mt-15"><i class="icon-cart-add position-left"></i> Add to cart</a>
									</div>
								</li>
								</ul>
								<?php } ?>
								<!-- /list -->
							</div>
						</div>
					</div>


						<!-- Detached sidebar -->
						<div class="col-md-4">
							<div class="panel">
	                			<div class="panel-body">
	                    			<h1>Rp. <?php echo number_format($rowGrandTotal['TOTAL'], 0, ',', '.'); ?></h1>
	                			</div>
	            			</div>
	            <div class="panel">
	                <div class="panel-body">

	                    <div class="blog-post">

	                        <div class="media">
	                            <div class="panel-body">
	                                <table class="table datatable-responsive">
	                                    <thead>
	                                    <tr>
	                                        <td></td>
	                                        <th>Nama</th>
	                                        <th>Harga</th>
	                                        <th>Qty</th>
	                                        <th>Sub Total</th>
	                                    </tr>
	                                    </thead>
	                                    <tbody>
	                                    <?php
	                                    include "../koneksi.php";
	                                    $query = mysqli_query($conn,"SELECT *
	                                        FROM 'masakan' INNER JOIN 'detail_order'
	                                        ON ('masakan'.'id_masakan' = 'detail_order'.'id_masakan') 
	                                        WHERE detail_order.id_detail_order'");
	                                    $no = 1;
	                                    $total = 0;

	                                    while ($data = mysqli_fetch_array($query)) {
	                                        $sub_total = +$data['harga'] * $data['jumlah'];
	                                        $total += $sub_total;
	                                        ?>
	                                        <tr>
	                                            <td>
	                                                <a href="cart.php?mod=basket&act=del&id=<?php echo $data['id_detail_order'] ?>"><i
	                                                            class="fa fa-times" style="color: red"></i></a>
	                                            </td>
	                                            <td>
	                                                <?php echo $data['nama_masakan'] ?></td>
	                                            <td><?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
	                                            <td><?php echo $data['jumlah']; ?></td>
	                                            <td><?php echo number_format($sub_total, 0, ',', '.'); ?></td>
	                                        </tr>
	                                    <?php } ?>
	                                    <tr>
	                                        <td colspan="4">
	                                            Total
	                                        </td>
	                                        <td>
	                                            <?php echo number_format($total, 0, ',', '.'); ?>
	                                        </td>
	                                    </tr>
	                                    <tr>
	                                        <td colspan="4" align="reight">

	                                            <button class="btn btn-primary" type="submit" data-toggle="modal"
	                                                    data-target="#myModal"><i class="fa fa-shopping-cart"></i> Bayar
	                                            </button>
	                                        </td>

	                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	                                             aria-labelledby="myModalLabel" aria-hidden="true">
	                                            <div class="modal-dialog">
	                                                <div class="modal-content">
	                                                    <div class="modal-header">
	                                                        <button type="button" class="close" data-dismiss="modal"
	                                                                aria-hidden="true">&times;
	                                                        </button>
	                                                        <?php

	                                                        ?>
	                                                        <h4 class="modal-title">GRAND TOTAL :
	                                                            Rp. <?php echo number_format($rowGrandTotal['TOTAL'], 0, ',', '.'); ?></h4>
	                                                    </div>

	                                                    <div class="modal-body row">
	                                                        <div class="col-md-12">
	                                                            <!--<form method="POST" action="?hal=cetak">-->
	                                                                <form method="POST" action="?hal=cetak">
	                                                                <div class="form-group">
	                                                                    <label> Chash</label>

	                                                                </div>


	                                                                <div class="form-group">
	                                                                    <input type="hidden" id="type1" name="grand_total"
	                                                                           onKeyUp="kalkulatorTambah(getElementById('type1').value,this.value);"
	                                                                           value="<?php echo number_format($rowGrandTotal['TOTAL'], 0, ',', '.'); ?>"/>

	                                                                    <input type="text" class="form-control input-lg"
	                                                                           id="type2" name="cash"
	                                                                           onKeyUp="kalkulatorTambah(getElementById('type1').value,this.value);"
	                                                                           value="<?php echo number_format($rowGrandTotal['TOTAL'], 0, ',', '.'); ?>"/>


	                                                                </div>

	                                                                <div class="form-group">

	                                                                    <label> Kembalian</label>
	                                                                    <input type="hidden" name="kembalian"
	                                                                           id="kembalian">
	                                                                    <h1>

	                                                               <span id="result">
	                                                                </span></h1>
	                                                                </div>

	                                                                <div class="pull-right">
	                                                                    <button class="btn btn-primary btn-sm"
	                                                                            type="submit"><i
	                                                                                class="fa fa-check-square-o"></i> OK
	                                                                    </button>
	                                                                    <button class="btn btn-danger btn-sm"
	                                                                            data-dismiss="modal" aria-hidden="true"
	                                                                            type="button"><i class="fa fa-times"></i>
	                                                                        Cancel
	                                                                    </button>
	                                                                </div>
	                                                            </form>

	                                                        </div>
	                                                    </div>

	                                                </div>
	                                            </div>
	                                        </div>
	                                        <!-- end modal -->
	                                    </tr>
	                                    </tbody>
	                                </table>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>	
					
					</div>
			            <!-- /detached sidebar -->


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

	<script>
	    function searchFilter(page_num) {
	        // page_num = page_num?page_num:0;
	        var keywords = $('#keywords').val();
	        // var sortBy = $('#sortBy').val();
	        $.ajax({
	            type: 'GET',
	            url: 'getmasakan.php',
	            data: '?hal=post&keywords=' + keywords,
	            beforeSend: function () {
	                $('.loading-overlay').show();
	            },
	            success: function (html) {
	                $('#show_product').html(html);
	                $('.loading-overlay').fadeOut("slow");
	            }
	        });
	    }

	    function formatRupiah(angka, prefix) {
	        var number_string = angka.replace(/[^,\d]/g, '').toString(),
	            split = number_string.split(','),
	            sisa = split[0].length % 3,
	            rupiah = split[0].substr(0, sisa),
	            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	        if (ribuan) {
	            separator = sisa ? '.' : '';
	            rupiah += separator + ribuan.join('.');
	        }

	        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	    }

	    function convertToRupiah(angka) {
	        var rupiah = '';
	        var angkarev = angka.toString().split('').reverse().join('');
	        for (var i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
	        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
	    }

	    function kalkulatorTambah(type1, type2) {

	        var a = parseInt(type1.replace(/,.*|[^0-9]/g, ''), 10); //eval(type1);
	        var b = parseInt(type2.replace(/,.*|[^0-9]/g, ''), 10);
	        var hasil = b - a;

	        var jumlah = 'Rp. ' + hasil.toFixed(0).replace(/(d)(?=(ddd)+(?!d))/g, "$1.");
	        //var total = NilaiRupiah(hasil);
	        // console.info('hahah')
	        document.getElementById('result').innerHTML = convertToRupiah(hasil);

	        document.getElementById("kembalian").value = convertToRupiah(hasil); //document.getElementById("type2").value;

	    }

	    /* Tanpa Rupiah */
	    var tanpa_rupiah = document.getElementById('type1');
	    tanpa_rupiah.addEventListener('keyup', function (e) {
	        tanpa_rupiah.value = formatRupiah(this.value);
	    });

	    var puser = document.getElementById('type2');
	    puser.addEventListener('keyup', function (e) {
	        puser.value = formatRupiah(this.value);
	    });

	</script>