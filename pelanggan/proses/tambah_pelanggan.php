<?php
	include '../../_entry/koneksi.php';

	$data['hasil'] = false;
	$data['pesan'] = 'Terjadi Kesalahan';
	$id_meja	   = strtolower(htmlspecialchars(addslashes(trim($_POST['id_meja']))));
	$nama = strtolower(htmlspecialchars(addslashes(trim($_POST['nama']))));

	//buat id_pelanggan
	$id_pelanggan = 'IP';
	$id_pelanggan .= rand(0, 999999);

	$input_pelanggan = $conn->query("INSERT INTO pelanggan VALUES('$id_pelanggan', '$nama')");
	$token = $conn->query("SELECT * from token");

	if ($input_pelanggan && $token == $token) 
	{
		$query = $conn->query("UPDATE meja SET status = 'penuh' WHERE id_meja = $id_meja");
		session_start();
		$_SESSION['id_pelanggan'] = $id_pelanggan;
		$_SESSION['id_meja']      = $id_meja;
		$_SESSION['token'] 			= $token;
		$data['hasil'] = true;
		$data['pesan'] = 'Berhasil';
	}

	echo json_encode($data);
