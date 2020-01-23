<?php
include "../koneksi.php";
$tabel = $_GET['table'];
$id_user = $_GET['id_user'];
$aksi = $_GET['action'];
if($aksi == "not-verifed")
{
	$sql = mysqli_query($conn, "UPDATE $tabel SET status='N' where id_user='$id_user'");
	header('location:' .$_SERVER['HTTP_REFERER']);
}else if($aksi == "verifed"){
	$sql = mysqli_query($conn, "UPDATE $tabel SET status='Y' where id_user='$id_user'");
	header('location:' .$_SERVER['HTTP_REFERER']);
}
?>