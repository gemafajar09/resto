<?php 
    session_start();
    include '../_entry/koneksi.php';
    require 'proses/cek_login.php';
    if (empty($_SESSION['id_pesanan'])) {
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
                            <form id="konfirmasi_pesanan" class="clearfix" method="post" action="proses/konfirmasi_pesanan">      
                            <div class="col-lg-12" id="menu_order"></div>
                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-send"></i> Konfirmasi Pesanan</button>
                        </form>
                        </div><!-- /.row -->
                        
                    </div><!-- /.pm-cart-info-container -->
                    
                </div><!-- /.col-lg-12 -->
            
            </div>
        </div>
        
        
        <!-- BODY CONTENT end -->
           
<?php
include "pages/footer.php";
?>

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
