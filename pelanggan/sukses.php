<?php 
    include '../_entry/koneksi.php';
    require 'proses/cek_login.php';
    if (empty($_SESSION['sukses'])) {
        header('location:index');
    }
?>
<?php
Include "pages/head.php";
Include "pages/menu.php";
?>  
        <!-- SUB-HEADER area -->
        <div class="pm-sub-header-container pm-parallax-panel" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
        	
            <div class="pm-sub-header-title-container">
            	<p class="pm-sub-header-title"><span>Shopping cart</span></p>
                <p class="pm-sub-header-message">Ready to checkout?</p>
            </div>
            
        </div>
        
        <!-- SUB-HEADER area end -->
        
        <!-- BODY CONTENT starts here -->
        
        <div class="container pm-containerPadding-top-80 pm-containerPadding-bottom-40">
        	<div class="row">
            
            	<div class="col-lg-12">
                	
                    <div class="pm-cart-info-container">
                    	
                        <div class="row">
                        <div class="col-lg-12">
<?php 
    $id_pelanggan = $_SESSION['id_pelanggan'];
    $id_pesanan   = $_SESSION['id_pesanan']; 
?>
        <div class="order-summary clearfix">
                            <div class="section-title">
                                <h3 class="title">Pesanan Anda</h3>
                            </div>
                            <table class="shopping-cart-table table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th></th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$total_semua = 0;
$query = $conn->query("SELECT * FROM detail_pesanan INNER JOIN pesanan  ON detail_pesanan.id_pesanan = pesanan.id_pesanan INNER JOIN masakan ON detail_pesanan.id_masakan = masakan.id_masakan WHERE pesanan.id_pesanan = '$id_pesanan' AND pesanan.id_pelanggan = '$id_pelanggan' AND pesanan.status_pesanan = 'menunggu diantar'");
while($data = mysqli_fetch_assoc($query)) :
?>

                                    <tr>
                                        <td class="thumb">
                                            <img style="width: 80px; height: 80px;" src="../_entry/assets/images/masakan/<?php echo $data['image'];?>" alt="">
                                        </td>
                                        <td class="details">
                                            <a href="#"><?php echo $data['nama_masakan'];?></a>
                                            
                                        </td>
                                        <td class="price text-center"><strong>Rp. <?php echo number_format($data['harga']);?></strong>
                                        </td>
                                        <td class="qty text-center"><?php echo $data['jumlah'];?></td>
                                        <td class="total text-center">Rp. <?php echo number_format($data['total_harga']);?></td>
                                        
                                    </tr>
                                    <?php
                                        $total_semua = $total_semua + $data['total_harga'];
                                        endwhile;
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>TOTAL</th>
                                        <th colspan="2" class="total">Rp. <?php echo number_format($total_semua);?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                </div>
            </div>  
        </div>
        </div>
    </div>
</div>
        
        
        <!-- BODY CONTENT end -->
        
           
<?php
include "pages/footer.php";
?>   

  </body>
</html>
