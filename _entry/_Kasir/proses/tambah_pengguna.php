<?php
	include'../../koneksi.php';
	$username 				= htmlspecialchars(addslashes(trim($_POST['username'])));
	$password 				= htmlspecialchars(addslashes(trim(md5($_POST['password']))));
	$konfirmasi_password 	= htmlspecialchars(addslashes(trim(md5($_POST['konfirmasi_password']))));
	$nama_user 				= htmlspecialchars(addslashes(trim($_POST['nama_user'])));
	$email 					= htmlspecialchars(addslashes(trim($_POST['email'])));
	$id_level 				= htmlspecialchars(addslashes(trim($_POST['id_level'])));

	//gambar
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

	$data['pesan'] = 'Terjadi Kesalahan';
	$data['hasil'] = false;

	$query = $conn->query("SELECT * FROM user WHERE username = '$username'");
	$hitung = mysqli_num_rows($query);

	if ($hitung > 0) {
		$data['pesan'] = 'Username sudah digunakan';
	}
	else if ($password != $konfirmasi_password) {
		$data['pesan'] = 'Password tidak sama';
	}
	else{
		if (move_uploaded_file($lokasi_gambar, '../../assets/images/pengguna/' . $namaGambar)) {
			$query = $conn->query("INSERT INTO user VALUES(NULL, '$username', '$password', '$nama_user', '$email', '$id_level', 'Y', '$namaGambar')");
			if ($query) {
				$data['hasil'] = true;
				$data['pesan'] = 'Data berhasil ditambahkan';
			}
		}
	}

	echo json_encode($data);

?>