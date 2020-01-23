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
<?php
include "pages/head.php";
require "../koneksi.php";
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
                    
                <div id="pesanan"></div>

                    <!-- Footer -->
                    <div class="footer text-muted">
                        &copy; 2019. <a href="#">Raja Sambal</a> by <a href="http://goresto.epizy.com" target="_blank">SIUNIDHA</a>
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
    <audio id="klik" src="../assets/audio/klik.mp3"></audio>
    <audio id="success" src="../assets/audio/success.mp3"></audio>
    <audio id="error" src="../assets/audio/error.wav"></audio>
<script>
        
            loadData_pesanan();

            function klik()
            {
                $('.klik').click(function(){
                    document.getElementById('klik').play(); 
                }); 
            }

            function error()
            {
                document.getElementById('error').play();    
            }  

            function success()
            {
                document.getElementById('success').play();  
            }

            function loadData_pesanan(url = 'ajax/pesanan.php')
            {
                $.get(url, function(data){
                    $('#pesanan').html(data);
                    $('.lihat_pesanan').click(function(){
                        let id_pesanan = $(this).attr('value')
                        $.get('modal_lihat_pesanan.php?id_pesanan='+id_pesanan, function(data){
                            $('#modal_lihat_pesanan').html(data);
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
                                        $('#mymodal_lihat_pesanan').modal('hide');
                                        $('.modal-backdrop').remove();
                                        $('body').removeClass('modal-open');
                                        success();
                                        swal({
                                            title : 'Sukses',
                                            icon  : 'success',
                                            text  : data.pesan, 
                                        });
                                        loadData_pesanan();
                                    }
                                    else{
                                        error();
                                        swal({
                                            title : 'Sukses',
                                            icon  : 'error',
                                            text  : data.pesan,
                                        });
                                    }
                                }
                            });
                            })
                        });
                    })
                })
            }
            $(document).ready(function(){
            klik();
        });
    </script>


</body>
</html>