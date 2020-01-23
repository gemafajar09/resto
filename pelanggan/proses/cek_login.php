<?php
	error_reporting(0);
	session_start();	

	if (empty($_SESSION['id_pelanggan'])) {
		header('location:../../');
	}
	else{

		$id_pelanggan = $_SESSION['id_pelanggan'];
		
		$query = $conn->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
		$hitung = mysqli_num_rows($query);
		if ($hitung > 0) {
			$data = mysqli_fetch_assoc($query);

			
			$nama = $data['nama'];
		}
		else{
			header('location:../../');
		}
	}
?>