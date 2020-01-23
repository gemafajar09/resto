<?php
	include '../../_entry/koneksi.php';
	$id_pesanan = $_GET['id_pesanan'];

	$data['pesan'] = 'Terjadi Kesalahan';
	$data['hasil'] = false;
	$query = $conn->query("DELETE FROM detail_pesanan WHERE id_detail_pesanan = $id_pesanan");

	if ($query) {
		$data['hasil'] = true;
		$data['pesan'] = 'Berhasil';
	}

	echo json_encode($data);
?>