<?php
	include '../../koneksi.php';
	$gambar_lama 	= $_POST['gambar_lama'];
	$nama_masakan 	= $_POST['nama_masakan'];
	$id_kategori 	= $_POST['id_kategori'];
	$jenis 			= $_POST['jenis'];
	$harga 			= $_POST['harga'];
	$status_masakan = $_POST['status_masakan'];
	$id_masakan 	= $_POST['id_masakan'];
	

	//Gambar
	$gambar = $_FILES['gambar']['name'];
	$lokasi_gambar  = $_FILES['gambar']['tmp_name'];
	$extensi = explode('.', $gambar);
	$extensi = strtolower(end($extensi));
	$extensiValid = ['jpg', 'jpeg', 'gif', 'png'];
	$size = $_FILES['gambar']['size'];
	$namaGambar = 'menu_';
	$namaGambar .= rand(10,99999);
	$namaGambar .= '.';
	$namaGambar .= $extensi;

	$data['hasil'] = false;
	$data['pesan'] = 'Terjadi Kesalahan';

	if ($gambar == NULL) {
		
		$query = $conn->query("UPDATE masakan SET nama_masakan = '$nama_masakan', harga = '$harga', id_kategori = '$id_kategori', jenis = '$jenis', status_masakan = '$status_masakan', WHERE id_masakan = $id_masakan");
		if ($query) {
			$data['hasil'] = true;
			$data['pesan'] = 'Data Berhasil Diubah';
		}
	}

	else{
		if (move_uploaded_file($lokasi_gambar, '../../assets/images/masakan/'. $namaGambar)) 
		{
			$query = $conn->query("UPDATE masakan SET nama_masakan = '$nama_masakan', harga = '$harga', id_kategori = '$id_kategori', jenis = '$jenis', status_masakan = '$status_masakan', gambar = '$namaGambar' WHERE id_masakan = $id_masakan");
			
			if ($query) 
			{
				if (file_exists('../../assets/images/masakan/' . $gambar_lama)) {
					unlink('../../assets/images/masakan/' . $gambar_lama);
				}

				$data['hasil'] = true;
				$data['pesan'] = 'Data Berhasil Diubah';
			}

		}
	}

	echo json_encode($data);
?>