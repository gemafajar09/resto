<?php
session_start();
if($_SESSION['nama_level']=="admin") {
    header("Location: ../_Admin/index");
}

elseif ($_SESSION['nama_level']=="") {
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
                    
                   <div id="pembayaran"></div>

                    <!-- Footer -->
                    <div class="footer text-muted">
                        &copy; 2019. <a href="#">Radja Sambal</a> by <a href="http://goresto.epizy.com" target="_blank">Eno </a>
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
            klik();
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

            function loadData_pesanan()
            {
                $.get('ajax/pembayaran.php', function(data){
                    $('#pembayaran').html(data);
                    $('.lihat_pesanan').click(function(){
                        let id_pesanan = $(this).attr('value')
                        $.get('ajax/menunggu_pembayaran?id_pesanan='+id_pesanan, function(data){
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
                                            title : 'Gagal',
                                            icon  : 'error',
                                            text  : data.pesan,
                                        });
                                    }
                                }
                            });
                            })
                        });
                    });

                    $('.lihat_transaksi').click(function(){
                        let id_transaksi = $(this).attr('value');
                        $.get('ajax/modal_lihat_transaksi?id_transaksi='+id_transaksi, function(data){
                            $('#modal_lihat_transaksi').html(data);
                        });
                    });
                })
            }
        });
    </script>

    <script>

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



</body>
</html>