<?php
	include '../../_entry/koneksi.php';
	session_start();
	$id_pelanggan = $_SESSION['id_pelanggan'];
	$id_pesanan = $_SESSION['id_pesanan'];
	$total_pesanan = strtolower(htmlspecialchars(addslashes(trim($_POST['total_pesanan']))));
	$data['hasil'] = false;
	$data['pesan'] = 'Terjadi Kesalahan';
	$query = $conn->query("UPDATE pesanan SET status_pesanan = 'menunggu diantar', total_pesanan = $total_pesanan WHERE status_pesanan = 'memilih menu' AND id_pelanggan = '$id_pelanggan' AND id_pesanan = '$id_pesanan'");

	if ($query) {


		$_SESSION['sukses'] = true;
		$data['hasil'] = true;
		$data['pesan'] = 'Berhasil';
	}

	echo json_encode($data);
?>