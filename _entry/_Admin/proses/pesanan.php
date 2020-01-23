<?php
include "../../koneksi.php";
session_start();
		
		$id_masakan 	= htmlspecialchars(addslashes(trim($_POST['id_masakan'])));
		$no_meja 		= htmlspecialchars(addslashes(trim($_POST['no_meja'])));
		$jumlah 		= htmlspecialchars(addslashes(trim($_POST['jumlah'])));
		$keterangan 	= htmlspecialchars(addslashes(trim($_POST['keterangan'])));
		
		//buat id_pelanggan
		$nama = strtolower(htmlspecialchars(addslashes(trim($_POST['nama']))));
		$id_pelanggan = 'IP';
		$id_pelanggan .= rand(0, 999999);

		$query = $conn->query("SELECT * FROM masakan WHERE id_masakan = $id_masakan");
			$rows = mysqli_fetch_assoc($query);

			$total_harga = $rows['harga']*$jumlah;

		$query = $conn->query("INSERT INTO pelanggan VALUES('$id_pelanggan', '$nama')");
		$query = $conn->query("UPDATE meja set status = 'penuh' where id_meja = '$no_meja'");

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
			
			$query = $conn->query("INSERT INTO pesanan VALUES('$id_pesanan', '$no_meja', CURRENT_TIMESTAMP, '0', '$id_pelanggan' ,'$keterangan', 'menunggu diantar',$total_harga)");
			if ($query) {
				$query = $conn->query("INSERT INTO detail_pesanan VALUES(NULL, '$id_pesanan', $id_masakan, $jumlah, '$keterangan', 'memilih menu',$total_harga)");
				if ($query) {
					echo "<script>alert('Berhasil Memesan!');document.location.href='index'</script>";
				}
					$_SESSION['id_pesanan'] = $id_pesanan;
			}else{
				$data['pesan'] = 'gagal';
			}
	 	}
	}
	else{
		$id_pesanan = $_SESSION['id_pesanan'];
		$query = $conn->query("INSERT INTO detail_pesanan VALUES(NULL, '$id_pesanan', $id_masakan, $jumlah, '$keterangan', 'memilih menu',$total_harga)");
		if ($query) {
					echo "<script>alert('Berhasil Memesan!');document.location.href='index'</script>";
					
			}
		else{
				$data['pesan'] = 'gagal';
		}
	}

			unset($_SESSION['items']);
			unset($_SESSION['items1']);
			echo json_encode($data);
?>