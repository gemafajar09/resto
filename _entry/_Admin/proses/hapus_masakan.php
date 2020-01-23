<?php
	include '../../koneksi.php';

	$id_masakan = $_GET['id_masakan'];

	$data['hasil'] = false;
	$data['pesan'] = 'Terjadi kesalahan...';

	$query = $conn->query("SELECT * FROM masakan WHERE id_masakan = $id_masakan");
	$data = mysqli_fetch_assoc($query);

	$gambar = $data['image'];

	
	
	$query = $conn->query("DELETE FROM masakan WHERE id_masakan = $id_masakan");

	if ($query) {
		if (file_exists('../../assets/images/masakan/'.$gambar))
		{
			unlink('../../assets/images/masakan/'.$gambar);
		}
		$data['hasil'] = true;
		$data['pesan'] = 'Data berhasil dihapus';
	}

	echo json_encode($data);


?>