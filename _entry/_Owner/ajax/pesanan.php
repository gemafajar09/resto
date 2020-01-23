<?php
require_once('../../models/database.php');
include "../../koneksi.php";
include "../pages/head1.php";
$db = new database();

$tanggal = date("Y-m-d");
if(isset($_GET['tanggal']))
{
    $tanggal = $_GET['tanggal'];
}
?>
<!-- Basic datatable -->
                   <div class="col-md-8">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Data Pesanan</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <!-- <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>-->
                                    <li>
                                    <form action="" method="POST" id="form-data">
                                        <div class="form-group">
                                            <input type="date" value="<?= $tanggal ?>" name="tanggal" class="form-control" onchange="tampilkanData(this)">
                                        </div>
                                    </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <script>                      
                            function tampilkanData(tanggal){
                                loadData_pesanan('ajax/pesanan.php?tanggal=' + tanggal.value);
                            }
                        </script>
                        <div class="panel-body">
                <?php
                    $query = $conn->query("SELECT * FROM pesanan WHERE tanggal = DATE('$tanggal') order by status_pesanan");
                    $hitung = mysqli_num_rows($query);
                ?>
                Jumlah Pesanan : <strong><?php echo $hitung;?></strong> Pesanan<br>
                
                        </div>

                        <table class="table datatable-responsive">
                            <thead>
                                <tr>
                                    <th>ID Pesanan</th>
                                    <th>No Meja</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
foreach($db->show_pesanan($tanggal) as $x){
?>
                                <tr>
                                    <td><?php echo $x['id_pesanan']; ?></td>
                                    <td><?php echo $x['no_meja']; ?></td>
                                    <td><?php echo $x['tanggal']; ?></td>
                                    <td><span class="label label-primary"><?php echo $x['status_pesanan']; ?></span></td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a class="lihat_pesanan klik" data-toggle="modal" data-target="#mymodal_lihat_pesanan" value="<?php echo $x['id_pesanan'];?>"> Lihat</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <!-- /basic datatable -->


                    <!-- Basic datatable -->
                   <div class="col-md-4">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Data Konfirmasi Pesanan</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="box-mid border-warning" style="overflow-y: auto; max-height: 500px">
        <?php
            $data = $conn->query("SELECT * FROM pesanan INNER JOIN meja ON pesanan.no_meja = meja.id_meja WHERE pesanan.status_pesanan = 'menunggu dimasak'");
            $hitung = mysqli_num_rows($data);
        ?>
        <h4>Pesanan Masuk <span class="badge" style="background-color: red"><?php echo $hitung;?></span></h4>
        <h5>Status <span class="label label-warning">menunggu diantar</span></h5>
        <hr>
        <?php
            if ($hitung > 0) {
            
            while($rows = mysqli_fetch_assoc($data)) :
        ?>
        <div class="info-box" style="height: 150px">
            <center><strong>Meja : <?php echo $rows['no_meja'];?></strong></center>
            ID Pesanan : <?php echo $rows['id_pesanan'];?> <br>
            Tanggal Pesan :<?php echo $rows['tanggal'];?><br>
            <button class="btn btn-info btn-sm pull-right lihat_pesanan" data-toggle="modal" data-target="#mymodal_lihat_pesanan" value="<?php echo $rows['id_pesanan'];?>">Lihat Pesanan</button>
        </div>
        <?php
            endwhile;
        
            }
            else{

            
        ?>
        <div class="box-info">
            <center><img src="../assets/images/empty_cart.jpg" alt="" style="height: 170px; width: 170px"></center>
        </div>
    <?php } ?>
    </div>
                        </div>

                    </div>
                </div>

<!-- Modal -->
<div class="modal fade" id="mymodal_lihat_pesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_lihat_pesanan"></div>
        </div>
     </div>
</div>
<!-- Modal -->