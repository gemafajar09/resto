<?php
	include'../../koneksi.php';
	$kategori = $_POST['nama_kategori'];
	

	$data['pesan'] = 'Terjadi Kesalahan';
	$data['hasil'] = false;
	
		
			$query = $conn->query("INSERT INTO kategori VALUES(NULL, '$kategori')");
			if ($query) {
				$data['hasil'] = true;
				$data['pesan'] = 'Data berhasil ditambahkan';
			}
			else{
				$data['pesan'] = 'Gagal menambahkan data';
			}
		
	

	echo json_encode($data);

?>