<?php 
    session_start();
    include '../_entry/koneksi.php';
    require 'proses/cek_login.php';
    if (!empty($_SESSION['id_pesanan'])) {
        header('location:index');
    }
?>
<?php
Include "pages/head.php";
?>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--18">
            <div class="ht__bradcaump__wrap d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">cart page</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                  <span class="breadcrumb-item active">cart page</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area --> 
        <!-- cart-main-area start -->
        <div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <form method="post" action="proses/konfirmasi_pesanan.php" id="konfirmasi_pesanan">      
                            <div id="menu_order"></div>
                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-send"></i> Konfirmasi Pesanan</button>
                        </form>
                </div>
            </div>  
        </div>
        <!-- cart-main-area end -->
        <!-- Start Footer Area -->
        <footer class="footer__area footer--1">
            <div class="copyright bg--theme">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="copyright__inner">
                                <div class="cpy__right--left">
                                    <p>@All Right Reserved.<a href="https://rajasambal.com">Raja Sambal</a></p>
                                </div>
                                <div class="cpy__right--right">
                                    <a href="#">
                                        <img src="images/icon/shape/2.png" alt="payment images">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Area -->           
	</div><!-- //Main wrapper -->

	<!-- JS Files -->

	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/active.js"></script>

    <script>
        $(document).ready(function(){
            
            loadData_menu();

            function loadData_menu()
            {
                $.get('menu_order.php', function(data){
                    $('#menu_order').html(data);
                        $('.hapus_pesanan').click(function(){
                            let id_pesanan = $(this).attr('value');
                            $.ajax({
                                url: 'proses/hapus_pesanan.php?id_pesanan='+id_pesanan,
                                method: $(this).attr('method'),
                                dataType: 'json',
                                success: function(data){
                                    if(data.hasil == true)
                                    {
                                    
                                        loadData_menu();
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

                    $('#konfirmasi_pesanan').submit(function(e){
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
                                    window.location.assign('sukses');
                                }
                                else{
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
            }
        });
    </script>

</body>
</html>
