<?php 
    include '../_entry/koneksi.php';
    session_start();
    $id_pelanggan = $_SESSION['id_pelanggan'];
    $id_pesanan   = $_SESSION['id_pesanan']; 
?>
        <div class="order-summary clearfix">
                            <div class="col-lg-12">
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
$query = $conn->query("SELECT * FROM detail_pesanan INNER JOIN pesanan  ON detail_pesanan.id_pesanan = pesanan.id_pesanan INNER JOIN masakan ON detail_pesanan.id_masakan = masakan.id_masakan WHERE pesanan.id_pesanan = '$id_pesanan' AND pesanan.id_pelanggan = '$id_pelanggan' AND pesanan.status_pesanan = 'memilih menu'");
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
                                        <td class="text-right"><button class="main-btn icon-btn hapus_pesanan" value="<?php echo $data['id_detail_pesanan'];?>" type="button"><i class="fa fa-close"></i></button></td>
                                    </tr>
                                    <?php
                                        $total_semua = $total_semua + $data['total_harga'];
                                        endwhile;
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="empty" colspan="3"><a href="index" class="btn btn-warning">Tambah Pesanan</a></th>
                                        <th>TOTAL</th>
                                        <th colspan="2" class="total">Rp. <?php echo number_format($total_semua);?></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <input type="hidden" name="total_pesanan" value="<?php echo $total_semua;?>">              
                        </div>