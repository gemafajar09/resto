<?php  
// ========== #connection ++++++++++++++++++++ change
include "setting.php";	
$koneksi = new mysqli($host,$user,$pass,$db);
if ($koneksi->connect_error) {
	unlink('setting.php');
	header("location: setting_db/");
}

// ========== #define   ++++++++++++++++++++ change
define('base_url', 'http://localhost/goresto/');
define('assets', base_url.'assets');
define('images', base_url.'images');
define('lib', base_url.'lib');
define('module', base_url.'module');
define('module_utama', base_url.'module_utama');
define('plugin', base_url.'plugin');

//define('module_set', 'module'); // ++++++++++ Error !
define('module_set', 'module_1'); // ++++++++++ Revisi !

//module_1 admin hanya bisa input kasir yang memiliki hak akses pasok dan penjualan 
//module_1 proses distributor buku dan pasok ada di (pasok) dan penjualan ada (dikasir)

// ============= #title setting  ++++++++++++++++++++ change
$title = 'Sistem Penjualan Buku';


// ========== #set default 
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
session_start();


// ============ #session level
$session_login = $_SESSION['id_kasir'];


// ========== #session penjualan
$check_data_keranjang = $_SESSION['penjualan_buku_id'];


// =============== #include function
include "plugin/function.php/mata_uang_id.php";
include "plugin/function.php/indonesian_date.php";
include "plugin/function.php/write_log.php";
include "plugin/backup.restore.mysql/backup.php";
include "plugin/backup.restore.mysql/restore.php";


// =============== #security akses
$sql = $koneksi->query("SELECT * FROM kasir WHERE id_kasir='$session_login'");
$check = $sql->fetch_array();
$check_nama_kasir = $check['nama'];
$akses = $check['akses'];
$check_alamat_kasir = $check['alamat'];
$check_telepon_kasir = $check['telepon'];
$check_status_kasir = $check['status'];

// buat variabel tiap akses
$a_full = preg_match("/full/", $akses);
$a_penjualan = preg_match("/penjualan/", $akses);
$a_buku = preg_match("/buku/", $akses);
$a_pasok = preg_match("/pasok/", $akses);
$a_distributor = preg_match("/distributor/", $akses);
$a_kasir = preg_match("/kasir/", $akses);


// ==================== #bikin fungsi redirect
function redirect($datalink){
	$header = "<script>window.location.href='".$datalink."'</script>";
	return $header;
}

// validasi array if values if duplicate // copyright github
function array_has_dupes($array){
	return count($array) !== count(array_unique($array));
}

// detect IE, this code from stackoverflow
function isIE(){
	$isIE = preg_match("/MSIE ([0-9]{1,}[\.0-9]{0,})/",$_SERVER['HTTP_USER_AGENT'],$version);
	if($isIE){
		return $version[1];
	}
	return $isIE;
}
?>