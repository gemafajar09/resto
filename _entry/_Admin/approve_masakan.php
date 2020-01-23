<?php
include "../koneksi.php";
$tabel = $_GET['table'];
$id_masakan = $_GET['id_masakan'];
$aksi = $_GET['action'];
if($aksi == "not-verifed")
{
	$sql = mysqli_query($conn, "UPDATE $tabel SET status_masakan='N' where id_masakan='$id_masakan'");
	header('location:' .$_SERVER['HTTP_REFERER']);
}else if($aksi == "verifed"){
	$sql = mysqli_query($conn, "UPDATE $tabel SET status_masakan='Y' where id_masakan='$id_masakan'");
	header('location:' .$_SERVER['HTTP_REFERER']);
}
?>