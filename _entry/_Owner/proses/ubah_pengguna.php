<?php
	include '../../koneksi.php';
	$id_user = $_POST['id_user'];
	$gambar_lama = $_POST['gambar_lama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama_user = $_POST['nama_user'];
	$email = $_POST['email'];
	$id_level = $_POST['id_level'];
	$status = $_POST['status'];
	

	//Gambar
	$gambar = $_FILES['gambar']['name'];
	$lokasi_gambar  = $_FILES['gambar']['tmp_name'];
	$extensi = explode('.', $gambar);
	$extensi = strtolower(end($extensi));
	$extensiValid = ['jpg', 'jpeg', 'gif', 'png'];
	$size = $_FILES['gambar']['size'];
	$namaGambar = 'user_';
	$namaGambar .= rand(10,99999);
	$namaGambar .= '.';
	$namaGambar .= $extensi;

	$data['hasil'] = false;
	$data['pesan'] = 'Terjadi Kesalahan';

	if ($gambar == NULL) {
		
		$query = $conn->query("UPDATE user SET username = '$username', password = '$password', nama_user = '$nama_user', email = '$email', id_level = '$id_level', status = '$status' WHERE id_user = $id_user");
		if ($query) {
			$data['hasil'] = true;
			$data['pesan'] = 'Data Berhasil Diubah';
		}
	}

	else{
		if (move_uploaded_file($lokasi_gambar, '../../assets/images/pengguna/'. $namaGambar)) 
		{
			$query = $conn->query("UPDATE user SET username = '$username', password = '$password', nama_user = '$nama_user', email = '$email', id_level = '$id_level', status = '$status', gambar = '$namaGambar' WHERE id_user = $id_user");
			
			if ($query) 
			{
				if (file_exists('../../assets/images/pengguna/' . $gambar_lama)) {
					unlink('../../assets/images/pengguna/' . $gambar_lama);
				}

				$data['hasil'] = true;
				$data['pesan'] = 'Data Berhasil Diubah';
			}

		}
	}

	echo json_encode($data);
?>