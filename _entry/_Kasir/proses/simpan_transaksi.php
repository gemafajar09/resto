<?php
	include '../../koneksi.php';

	$id_user 		= htmlspecialchars(addslashes(trim($_POST['id_user'])));
	$id_pesanan 	= htmlspecialchars(addslashes(trim($_POST['id_pesanan'])));
	$tanggal 		= htmlspecialchars(addslashes(trim($_POST['tanggal'])));
	$total_bayar	= htmlspecialchars(addslashes(trim($_POST['total_bayar'])));
	$jumlah_uang    = htmlspecialchars(addslashes(trim($_POST['jumlah_uang'])));
	$no_meja 		= htmlspecialchars(addslashes(trim($_POST['no_meja'])));
	
	$data['pesan'] = 'Terjadi Kesalahan';
	$data['hasil'] = false;

	$query = $conn->query("UPDATE meja set status = 'kosong' where id_meja = '$no_meja'");

	if ($jumlah_uang < $total_bayar) {
		$data['pesan'] = 'Jumlah pembayaran kurang';
	}
	else{
		$transaksi = $conn->query("INSERT INTO transaksi VALUES(NULL, '$id_user', '$id_pesanan', '$tanggal', '$total_bayar', '$jumlah_uang')");
		if ($transaksi) {

			$query = $conn->query("UPDATE pesanan SET status_pesanan = 'selesai' WHERE id_pesanan = '$id_pesanan'");
			if ($query) {
				$data['hasil'] = true;
				$data['pesan'] = 'Berhasil';
				
			}
			
		}
	}

	echo json_encode($data);
?>
