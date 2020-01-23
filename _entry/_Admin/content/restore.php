        <!-- Page header -->
        <div class="page-header">
          <div class="page-header-content">
            <div class="page-title">
              <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Data</span> - Meja</h4>
            </div>

          </div>

          <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
              <li><a href="?page=Home"><i class="icon-home2 position-left"></i> Dashboard</a></li>
              <li><a href="?page=Categori">Entri Referensi</a></li>
              <li class="active">Meja</li>
            </ul>

          </div>
        </div>
        <!-- /page header -->

        <!-- Content area -->
        <div class="content">
          <div class="col-md-6">
              <form class="form-horizontal" method="post">
                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-flat">
                      <div class="panel-heading">
                        <h5 class="panel-title">Restore<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                        <div class="heading-elements">
                          <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                  </ul>
                                </div>
                      </div>

                      <div class="panel-body">
                        
                        <div class="form-group">
                          <label class="col-lg-3 control-label">Database:</label>
                          <div class="col-lg-9">
                            <div class="uploader"><input type="file" class="file-styled" name="datafile"></div>
                            <span class="help-block">Masukan Database Format Sql</span>
                          </div>
                        </div>

                        <div class="text-right">
                          <button type="submit" class="btn btn-primary legitRipple" name="restore">Restore <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
<?php
if(isset($_POST['restore'])){
$conn=mysql_connect("localhost","root","089658902142");
mysql_select_db("kasir",$conn);
$nama_file=$_FILES['datafile']['name'];
$ukuran=$_FILES['datafile']['size'];
if ($nama_file==""){
echo "Fatal Error";
}
else{
//definisikan variabel file dan alamat file
$uploaddir='restore/';
$alamatfile=$uploaddir.$nama_file;
if (move_uploaded_file($_FILES['datafile']['tmp_name'],$alamatfile)){
$filename = 'restore/'.$nama_file.'';                                   
$templine = '';
$lines = file($filename);
foreach ($lines as $line){
if (substr($line, 0, 2) == '--' || $line == '')
continue;
$templine .= $line;
if (substr(trim($line), -1, 1) == ';'){
mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
$templine = '';
}
}
echo "<center>Restore Database Telah Berhasil, Silahkan dicek !</center>";
}
else{
echo "Restore Database Gagal, kode error = " . $_FILES['location']['error'];
}   
}
}
else{
unset($_POST['restore']);
}
?>              
            </div>
   
        </div>
            </div>
          </div>
          <!-- /dashboard content -->
          </div>
        <!-- /content area -->

      </div>
      <!-- /main content -->

    </div>
    <!-- /page content -->

  </div>
  <!-- /page container -->