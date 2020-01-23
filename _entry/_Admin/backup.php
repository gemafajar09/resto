<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: ../index");
    die();
}
?>
<?php
require_once('../models/database.php');
include "../koneksi.php";
$db = new database();
include "pages/head.php";
include "cek.php";
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
<?php
error_reporting(0);
$file=date("Ymd").'_backup_database_'.time().'.sql';
backup_tables("localhost","root","089658902142","goresto",$file);
?>   
					<div class="col-md-4">
							<div class="panel panel-body border-top-primary text-center">
								<h6 class="no-margin text-semibold">Backup Database</h6>
								<p class="text-muted content-group-sm"></p>

		                    	<a type="submit" onclick="location.href='download_backup_data?nama_file=<?php echo $file;?>'" class="btn bg-teal-400 btn-labeled btn-rounded legitRipple"><b><i class="icon-download"></i></b> Backup</a>
							</div>
					</div>
<?php  
function backup_tables($host,$user,$pass,$name,$nama_file,$tables ='*')  {
$link = mysql_connect($host,$user,$pass);
mysql_select_db($name,$link);
if($tables == '*'){
$tables = array();
$result = mysql_query('SHOW TABLES');
while($row = mysql_fetch_row($result)){
$tables[] = $row[0];
}
}
else{//jika hanya table-table tertentu
$tables = is_array($tables) ? $tables : explode(',',$tables);
}
foreach($tables as $table){
$result = mysql_query('SELECT * FROM '.$table);
$num_fields = mysql_num_fields($result);
$return.= 'DROP TABLE '.$table.';';//menyisipkan query drop table untuk nanti hapus table yang lama
$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
$return.= "\n\n".$row2[1].";\n\n";
for ($i = 0; $i < $num_fields; $i++) {
while($row = mysql_fetch_row($result)){
//menyisipkan query Insert. untuk nanti memasukan data yang lama ketable yang baru dibuat
$return.= 'INSERT INTO '.$table.' VALUES(';
for($j=0; $j<$num_fields; $j++) {
//akan menelusuri setiap baris query didalam
$row[$j] = addslashes($row[$j]);
$row[$j] = ereg_replace("\n","\\n",$row[$j]);
if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
if ($j<($num_fields-1)) { $return.= ','; }
}
$return.= ");\n";
}
}
$return.="\n\n\n";
}                           
//simpan file di folder
$nama_file;
$handle = fopen('backup/'.$nama_file,'w+');
fwrite($handle,$return);
fclose($handle);
}
?>                     
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

</body>
</html>
