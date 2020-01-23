<?php
	include '../../_entry/koneksi.php';
	session_start();

		$id_masakan = strtolower(htmlspecialchars(addslashes(trim($_POST['id_masakan']))));
		$jumlah = strtolower(htmlspecialchars(addslashes(trim($_POST['jumlah']))));
		$keterangan = strtolower(htmlspecialchars(addslashes(trim($_POST['keterangan']))));
		//id_pelanggan dari session
		$id_pelanggan = $_SESSION['id_pelanggan'];

		//id meja dari session
		$id_meja = $_SESSION['id_meja'];

		$query = $conn->query("SELECT * FROM masakan WHERE id_masakan = $id_masakan");
			$rows = mysqli_fetch_assoc($query);

			$total_harga = $rows['harga']*$jumlah;


	if(empty($_SESSION['id_pesanan']))
	{	

		$id_pesanan = 'IDP';
		$id_pesanan .= rand(0, 99999);

		$data['pesan'] = 'Terjadi Kesalahan';
		$data['hasil'] = false;

		if ($jumlah >= 10) {
			$data['pesan'] = 'Maksimal pesanan 10';
			$data['hasil'] = false;

	 	}
	 	else{
			
			$query = $conn->query("INSERT INTO pesanan VALUES('$id_pesanan', '$id_meja', CURRENT_TIMESTAMP, '0', '$id_pelanggan' ,'$keterangan', 'memilih menu',$total_harga)");
			if ($query) {
				$query = $conn->query("INSERT INTO detail_pesanan VALUES(NULL, '$id_pesanan', $id_masakan, $jumlah, '$keterangan', 'memilih menu',$total_harga)");
				if ($query) {
					$data['hasil'] = true;
					$data['pesan'] = 'Berhasil';
					$_SESSION['id_pesanan'] = $id_pesanan;
				}
			}else{
				$data['pesan'] = 'gagal';
			}
	 	}
	}
	else{
		$id_pesanan = $_SESSION['id_pesanan'];
		$query = $conn->query("INSERT INTO detail_pesanan VALUES(NULL, '$id_pesanan', $id_masakan, $jumlah, '$keterangan', 'memilih menu',$total_harga)");
		if ($query) {
					$data['hasil'] = true;
					$data['pesan'] = 'Berhasil';
					
			}
		else{
				$data['pesan'] = 'gagal';
		}
	}

	

	echo json_encode($data);
?>