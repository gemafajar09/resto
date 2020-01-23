<?php
// Load file koneksi.php
include "../../koneksi.php";

// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$id_user = $_GET['id_user'];

// Ambil Data yang Dikirim dari Form
	$username       = $_POST['username'];
	$nama_user  	= $_POST['nama_user'];
	$email  		= $_POST['email'];
	$id_level       = $_POST['id_level'];

// Proses ubah data ke Database
		$query = "UPDATE user SET username='".$username."', nama_user='".$nama_user."', email='".$email."', id_level='".$id_level."' WHERE id_user='".$id_user."'";
		$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			echo "<script>alert('Ganti Profile Berhasil, Silahkan Login Kembali');document.location.href='../../logout'</script>/n";
		}else{
			// Jika Gagal, Lakukan :
			echo "<script>alert('Ganti Profile Gagal di Update!');document.location.href='../index'</script>/n";
		}
?>