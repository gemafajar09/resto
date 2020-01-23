<?php
	include '../../koneksi.php';

	$id_user = $_GET['id_user'];

	$data['hasil'] = false;
	$data['pesan'] = 'Terjadi kesalahan...';

	$query = $conn->query("SELECT * FROM user WHERE id_user = $id_user");
	$data = mysqli_fetch_assoc($query);

	$gambar = $data['gambar_user'];

	
	
	$query = $conn->query("DELETE FROM user WHERE id_user = $id_user");

	if ($query) {
		if (file_exists('../../assets/images/pengguna/'.$gambar))
		{
			unlink('../../assets/images/pengguna/'.$gambar);
		}
		$data['hasil'] = true;
		$data['pesan'] = 'Data berhasil dihapus';
	}

	echo json_encode($data);


?>