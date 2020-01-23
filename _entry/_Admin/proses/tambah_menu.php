<?php
	include'../../koneksi.php';
	$nama_masakan 	= htmlspecialchars(addslashes(trim($_POST['nama_masakan'])));
	$id_kategori 	= htmlspecialchars(addslashes(trim($_POST['id_kategori'])));
	$jenis 			= htmlspecialchars(addslashes(trim($_POST['jenis'])));
	$harga 			= htmlspecialchars(addslashes(trim($_POST['harga'])));

	//gambar
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

	$data['pesan'] = 'Terjadi Kesalahan';
	$data['hasil'] = false;

	$query = $conn->query("SELECT * FROM masakan WHERE nama_masakan = '$nama_masakan'");
	$hitung = mysqli_num_rows($query);

	if ($hitung > 0) {
		$data['pesan'] = 'Masakan sudah ada';
	}
	else if ($nama_masakan > 1) {
		$data['pesan'] = 'Masakan sudah ada';
	}
	else{
		if (move_uploaded_file($lokasi_gambar, '../../assets/images/masakan/' . $namaGambar)) {
			$query = $conn->query("INSERT INTO masakan  VALUES(NULL, '$nama_masakan', '$id_kategori', '$jenis', '$harga', '$namaGambar', 'Y')");
			if ($query) {
				$data['hasil'] = true;
				$data['pesan'] = 'Data berhasil ditambahkan';
			}
		}
	}

	echo json_encode($data);

?>