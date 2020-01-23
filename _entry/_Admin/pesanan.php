<?php
session_start();
if($_SESSION['nama_level']=="") {
    header("Location: ../index");
}

elseif ($_SESSION['nama_level']=="waiter") {
    header("Location: ../_Waiter/index");
}

elseif ($_SESSION['nama_level']=="kasir") {
    header("Location: ../_Kasir/index");
}

elseif ($_SESSION['nama_level']=="owner") {
    header("Location: ../_Owner/index");
}

?>
<?php require_once("../koneksi.php");?>
<?php
include "pages/head.php";
?>

<body>
<?php
include "pages/navbar.php";
?>

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

<?php
include "pages/menu.php";
?>          


            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Content area -->
                <div class="content">
                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-md-14">

                            <div class="col-md-6">
                            <div class="panel">
                    <div class="panel-body">
                        <input type="text" placeholder="Search Masakan" id="keywords" class="form-control blog-search"
                               onkeyup="searchFilter()">
                    </div>
                </div>
                        
                            
                        <div class="container-detached">
                            <div id="show_product" class="content-detached">
                        <?php
                        include "../koneksi.php";
                                    // Include / load file koneksi.php
                                    // Cek apakah terdapat data pada page URL
                                    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                                    $limit = 3; // Jumlah data per halamanya

                                    // Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
                                    $limit_start = ($page - 1) * $limit;

                                    // Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
                                    $data=mysqli_query($conn, "SELECT * FROM masakan where status_masakan='Y'LIMIT ".$limit_start.",".$limit);
                                    $no = $limit_start + 1; // Untuk penomoran tabel
                                    while($show=mysqli_fetch_array($data)){
                                    ?>
                            <ul class="media-list">
                                <li class="media panel panel-body stack-media-on-mobile">
                                    <a href="../assets/images/placeholder.jpg" class="media-left" data-popup="lightbox">
                                        <img src="../assets/images/masakan/<?php echo $show['image']; ?>" width="96" alt="">
                                    </a>

                                    <div class="media-body">
                                        <h6 class="media-heading text-semibold">
                                            <a href="#"><?php echo $show['nama_masakan']; ?></a>
                                        </h6>
                                    </div>

                                    <div class="media-right text-center">
                                        <h3 class="no-margin text-semibold"><?php echo'Rp '.number_format($show['harga']); ?></h3>

                                        <a href="cart?act=add&amp;id_masakan=<?php echo $show['id_masakan']; ?> &amp;ref=pesanan" class="btn bg-teal-400 mt-15"><i class="icon-cart-add position-left"></i> Add to cart</a>

                                    </div>
                                </li>
                                </ul>
                                <?php } ?>
                                <!-- /list -->
                            </div>
                            <div class="pagination">
               <?php
            if ($page == 1) { // Jika page adalah pake ke 1, maka disable link PREV
            ?>
                <li class="disabled"><a href="#">First</a></li>
                <li class="disabled"><a href="#">&laquo;</a></li>
            <?php
            } else { // Jika buka page ke 1
                $link_prev = ($page > 1) ? $page - 1 : 1;
            ?>
                <li><a href="pesanan?page=1">First</a></li>
                <li><a href="pesanan?page=<?php echo $link_prev; ?>">&laquo;</a></li>
            <?php
            }
            ?>

            <!-- LINK NUMBER -->
            <?php
            // Buat query untuk menghitung semua jumlah data
            $sql2 = mysqli_query($conn,"SELECT COUNT(*) AS jumlah FROM masakan ");
            ($get_jumlah = (mysqli_fetch_array($sql2)));

            $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamanya
            $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
            $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
            $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

            for ($i = $start_number; $i <= $end_number; $i++) {
                $link_active = ($page == $i) ? 'class="active"' : '';
            ?>
                <li <?php echo $link_active; ?>><a href="pesanan?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                <li><a href="pesanan?page=<?php echo $link_next; ?>">&raquo;</a></li>
                <li><a href="pesanan?page=<?php echo $jumlah_page; ?>">Last</a></li>
            <?php
            }
            ?>
        </div>
                        </div>
                    </div>
                    <!-- Detached sidebar -->
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-body">

                        <div class="blog-post">

                            <div class="media">
                                <div class="panel-body">
                                    <form action="proses/pesanan" method="post" id="tambah">
                                    
                                    <table class="table datatable-responsive">
                                        <thead>
                                        <tr>
            <?php
            if (isset($_SESSION['items1'])){
                foreach ($_SESSION['items1'] as $key => $val) {
                    $query = mysqli_query($conn, "SELECT * FROM meja where id_meja = '$key'");
                    $data = mysqli_fetch_array($query);
                    ?>
                    <input class="form-control" type="text" onkeypress="hack(event)" name="nama" placeholder="Masukan Nama Pelanggan" required>
                    <input type="hidden" name="no_meja" onkeypress="hack(event)" value="<?php echo $data['id_meja'];?>">
                    <?php
                }
            }?>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Qty</th>    
                                            <th>Sub Total</th>
                                            <th>Opsi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
        //MENAMPILKAN DETAIL KERANJANG BELANJA//
                      $no = 1;
                      $total = 0;
    //mysql_select_db($database_conn, $conn);
                      if (isset($_SESSION['items'])) {
                          foreach ($_SESSION['items'] as $key => $val) {
                            $query = mysqli_query($conn, "SELECT * FROM masakan WHERE id_masakan = '$key'");
                            $data = mysqli_fetch_array($query);
                            $jumlah_barang = mysqli_num_rows($query);
                            $jumlah_harga = $data['harga'] * $val;
                            $total += $jumlah_harga;
                            $harga = $data['harga'];
                            $hasil = "Rp.".number_format($harga,2,',','.');
                            $hasil1 = "Rp.".number_format($jumlah_harga,2,',','.');
                            ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><input type="hidden" name="id_masakan" value="<?php echo $data['id_masakan']; ?>"><?php echo $data['nama_masakan']; ?></td>
                        <td><?php echo $hasil; ?></td>
                        <td><a href="cart.php?act=plus&amp;id_masakan=<?php echo $data['id_masakan']; ?> &amp;ref=pesanan" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></a><input type="hidden" name="jumlah" value="<?php echo ($val); ?>"><?php echo ($val); ?> Pcs <a href="cart.php?act=min&amp;id_masakan=<?php echo $data['id_masakan']; ?> &amp;ref=pesanan" class="btn btn-default"><i class="glyphicon glyphicon-minus"></i></a>
                        </td>
                        <td><?php echo $hasil1; ?></td>
                        <td><input type="text" onkeypress="hack(event)" name="keterangan" class="form-control" placeholder="Jika Ada Catatan"></td>

                </tr>
                

           <?php
                    //mysql_free_result($query);      
            }
              //$total += $sub;
            }?>
            <?php
        if($total == 0){ ?>
          <td colspan="4" align="center"><?php echo "Tabel Makanan Anda Kosong!"; ?></td>
        <?php } else { ?>
           <td colspan="6" style="font-size: 18px;"><b><div style="padding-right: 80px;" class="pull-right"><input type="hidden" value="<?php echo $total;?>" name="total_bayar">Total Harga Anda : Rp. <?php echo number_format($total); ?>,- </div> </b></td>
          
<?php 
}
?>

                                        
                                        <tr>
                                            <td colspan="4" align="reight">
                                                <button class="btn btn-primary" type="submit" ><i class="fa fa-shopping-cart"></i> Konfirmasi
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                        </div>
                    </div>
                    <!-- /dashboard content -->
        

                    <!-- Footer -->
                    <div class="footer text-muted">
                        &copy; 2019. <a href="#">Goresto</a> by <a href="http://goresto.epizy.com" target="_blank">RPL1_BUDAy </a>
                    </div>
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

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
                        url: $(this).attr('action'),
                        method: $(this).attr('method'),
                        data: new FormData(this),   
                        dataType: 'JSON',
                        contentType: false,
                        processData: false,
                        success: function(data){
                            if(data.hasil == true)
                            {
                            
                                window.location.assign('pesanan');
                            }
                            else{
                                swal({
                                    title : 'Gagal',
                                    icon  : 'error',
                                    text  : data.pesan,
                                });
                            }
                        }
                 
                   });
            });
        });
    </script>

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

</script>

</body>
</html>