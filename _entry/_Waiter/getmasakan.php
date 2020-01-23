<?php
include("../koneksi.php");
$keywords = $_GET['keywords'];
$query = mysqli_query($conn,"SELECT * FROM masakan WHERE nama_masakan LIKE '%" . $keywords . "%' ");
while ($data = mysqli_fetch_array($query)) {
    if (count($data) == 1) { ?>
        <div class="images item ">
            <h1>Product yang anda cari masih kosong</h1>
        </div>
    <?php } else {
        ?>
                            <li class="media panel panel-body stack-media-on-mobile">
                                <a href="../assets/images/placeholder.jpg" class="media-left" data-popup="lightbox">
                                    <img src="../assets/images/masakan/<?php echo $data['image']; ?>" width="96" alt="">
                                </a>

                                <div class="media-body">
                                    <h6 class="media-heading text-semibold">
                                        <a href="cart?act=add&amp;id_masakan=<?php echo $show['id_masakan']; ?> &amp;ref=pesanan"><?php echo $data['nama_masakan']; ?></a>
                                    </h6>

                                    <ul class="list-inline list-inline-separate mb-10">
                                        <li><a href="#" class="text-muted"><?php echo $data['id_kategori']; ?></a></li>
                                    </ul>

                                    <p class="content-group-sm"></p>
                                </div>

                                <div class="media-right text-center">
                                    <h3 class="no-margin text-semibold"><?php echo'Rp '.number_format($data['harga']); ?></h3>

                                    <a href="cart?act=add&amp;id_masakan=<?php echo $data['id_masakan']; ?> &amp;ref=pesanan" class="btn bg-teal-400 mt-15"><i class="icon-cart-add position-left"></i> Add to cart</a>
                                </div>
                            </li>
                            </ul>
                            <!-- /list -->
    <?php }
} ?>
