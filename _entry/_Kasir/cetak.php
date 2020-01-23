<?php
session_start();
error_reporting(0);
if($_SESSION['nama_level']=="admin") {
    header("Location: ../index");
}

elseif ($_SESSION['nama_level']=="waiter") {
    header("Location: ../_Waiter/index");
}

elseif ($_SESSION['nama_level']=="") {
    header("Location: ../_Kasir/index");
}

elseif ($_SESSION['nama_level']=="owner") {
    header("Location: ../_Owner/index");
}

?>

<?php
    include '../koneksi.php';
    $id_transaksi = $_GET['id_transaksi'];
    $query = $conn->query("
        SELECT * FROM transaksi
        INNER JOIN pesanan ON transaksi.id_pesanan = pesanan.id_pesanan 
        INNER JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id_pelanggan WHERE id_transaksi='$id_transaksi'");
    $data = mysqli_fetch_assoc($query);
    $id_pesanan = $data['id_pesanan'];

?>

<?php
$username=$_SESSION['username'];
$query_mysqli = mysqli_query($conn, "SELECT * FROM user where username='$_SESSION[username]'")or die(mysqli_error());
while($hasil = mysqli_fetch_array($query_mysqli)){
?>
<?php } ?>
<?php
echo
"<script>
window.print();
</script>";
?>
<div class="col-md-5">
            <div id="struk">
                <!-- struk -->
                <div style="width:327px; 
                padding:0 10px 20px 10px; 
                margin:0 auto; 
                background:#ffffff; color:#4d4d4d;
                 font:13px /1.5 Tahoma; border:4px double #dddddd;">


                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>

                        <tr>
                            <td valign="top"
                                style="width:100px; padding:10px 0; border-bottom:4px double #dddddd;text-align: center;">
                                <img src="../assets/images/logo.png" style="margin:0 auto; width:75px; border:0;">
                            </td>


                            <td colspan="2" valign="top"
                                style="width:150px; padding:10px 0; border-bottom:4px double #dddddd; text-align:center; font-size:11px; line-height:16px;    padding-top: 20px;">
                                Raja Sambal<br>
                                Jl. Lubuk begalung Kec. Padang Timur<br>
                                Padang<br>
                                TLP. 087741214105<br>
                            </td>
                        </tr>

                        <tr>
                            <td valign="top" style="width:100px; padding:10px 0 0 0; font-size:11px; ">
                                Nota : <?php echo $id_pesanan; ?> </td>
                            <td colspan="2" valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px; "> Kasir
                                : 01 <?php echo $_SESSION['username']; ?>
                            </td>
                        </tr>

                        <?php

                        //exit();
                        $CetakNota = mysqli_query($conn,"SELECT * FROM detail_pesanan,masakan 
                                     WHERE detail_pesanan.id_masakan=masakan.id_masakan 
                                     AND id_pesanan='$id_pesanan'");
                        $totalcetak = 0;
                        $itemcetak = 0;
                        while ($datacetak = mysqli_fetch_array($CetakNota)) {
                            $subtotalcetak = +$datacetak['jumlah'] * $datacetak['harga'];
                            $totalcetak += $subtotalcetak;
                            $itemcetak += $datacetak['jumlah'];
                            ?>
                            <tr>
                                <td valign="top"
                                    style="width:100px; padding:10px 0 0 0; font-size:11px; "><?php echo $datacetak['nama_masakan']; ?></td>
                                <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px; ">
                                &nbsp;&nbsp;&nbsp;|    Qty : <?= $datacetak['jumlah'] ?>
                                </td>
                                <td style="font-size:11px; text-align: right;">
                                    Rp. <?php echo number_format($subtotalcetak, 0, ',', '.'); ?></td>
                            </tr>
                            </tr>
                            <?php
                        }
                        ?>

                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px; ">Total</td>
                            <td valign="top" style="width:100px; padding:10px 0 0 0;font-size:11px;text-align: right; ">
                                Rp. <?php echo number_format($totalcetak, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px; ">CASH</td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px;text-align: right; ">
                                Rp. <?php echo number_format($data['jumlah_uang'], 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px; ">Kembali</td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px;text-align: right;">
                                Rp. <?php
                                $kembali = str_replace(".", "", $data['jumlah_uang']) - $data['total_bayar'];
                                echo number_format($kembali, 0, ',', '.');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td valign="top" style="width:100px; padding:3px 0 0 0;font-size:11px; ">Items</td>
                            <td valign="top"
                                style="width:100px; padding:3px 0 0 0;font-size:11px;text-align: right; "><?php echo $itemcetak; ?></td>
                        </tr>

                        <tr>
                            <td colspan="3" valign="top"
                                style="text-align: center;width:100px; padding:10px 0 0 0;font-size:11px; ">
                                ***************<?php echo date("Y-m-d") . "-" . date("H:i:s"); ?>**************
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center;font-size:11px; ">BARANG YANG SUDAH DIBELI</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: center;font-size:11px; ">TIDAK DAPAT
                                DITUKAR/DIKEMBALIKAN
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- struk end -->
