<?php 
include "../../models/database.php";
$db = new database();
 
$aksi = $_GET['action'];

//Proses Kategori===============================================================================

//tambah Kategori
if($aksi == "tambah_kategori"){
	$db->tambah_kategori($_POST['nama_kategori']);
   	header('Location: '.$_SERVER['HTTP_REFERER']);
}

// Akhir Tambah Kategori

// Update Kategori

 elseif($aksi == "update_kategori"){		
		$db->update_kategori($_POST['id_kategori'],$_POST['nama_kategori']);
	header('Location: '.$_SERVER['HTTP_REFERER']);		
	
 }

// Akhir Update Kategori

// Delete Kategori

 elseif($aksi == "hapus_kategori"){ 	
 	$db->hapus_kategori($_GET['id_kategori']);
	header("location:../kategori");
 }


 //Proses Pengguna===============================================================================


//Proses Meja===================================================================================

 //Tambah Meja
elseif($aksi == "tambah_meja"){
	$db->tambah_meja($_POST['no_meja']);
   	header('Location: '.$_SERVER['HTTP_REFERER']);
}

// Akhir Tambah Meja

// Update Meja

 elseif($aksi == "update_meja"){		
		$db->update_meja($_POST['id_meja'],$_POST['no_meja']);
	header('Location: '.$_SERVER['HTTP_REFERER']);		
	
 }

// Akhir Update Meja

// Delete Meja

 elseif($aksi == "hapus_meja"){ 	
 	$db->hapus_meja($_GET['id_meja']);
	header("location:../meja");
 }



//Proses Level===================================================================================

 //Tambah Level
elseif($aksi == "tambah_level"){
	$db->tambah_level($_POST['nama_level']);
   	header('Location: '.$_SERVER['HTTP_REFERER']);
}

// Akhir Tambah Meja

// Update Meja

 elseif($aksi == "update_level"){		
		$db->update_level($_POST['id_level'],$_POST['nama_level']);
	header('Location: '.$_SERVER['HTTP_REFERER']);		
	
 }

// Akhir Update Meja

// Delete Meja

 elseif($aksi == "hapus_level"){ 	
 	$db->hapus_level($_GET['id_level']);
	header("location:../level");
 }

?>