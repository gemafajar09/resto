<?php
	$data['hasil'] = true;
	$data['pesan'] = 'Berhasil';
	include '../../koneksi.php';
	session_start();
	$username = $_SESSION['username'];
	$query = $conn->query("SELECT * FROM user WHERE username = '$username'");
	$data = mysqli_fetch_assoc($query);
	$id_user = $data['id_user'];
	$id_pesanan = $_POST['id_pesanan'];

	

	$query = $conn->query("UPDATE pesanan SET status_pesanan = 'menunggu dimasak', id_user = $id_user WHERE id_pesanan = '$id_pesanan'");
	if ($query) {
		$data['hasil'] = true;
		$data['pesan'] = 'Berhasil';
	}

	echo json_encode($data);
?>