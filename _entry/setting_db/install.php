<?php  
include "../setting.php";
$db_c = new mysqli($host,$user,$pass);
$koneksi = new mysqli($host,$user,$pass,$db);
$check_tb = $koneksi->query("SELECT * FROM kasir");
if ($koneksi->connect_error) {
	$sql = "CREATE DATABASE $db";
	if ($db_c->query($sql)) {
		header("location: install.php");
	}
}elseif (!empty($koneksi) AND empty($check_tb)) {
	$sql = $koneksi->query("
		CREATE TABLE IF NOT EXISTS `masakan` (
		`id_masakan` varchar(10) NOT NULL,
		`nama_masakan` varchar(50) NOT NULL,
		`harga` int(15) NOT NULL,
		`status_masakan` enum('Tersedia','Habis') NOT NULL,
		`gambar_menu` varchar(30) NOT NULL,
		PRIMARY KEY (`id_masakan`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
		");
	$sql.= $koneksi->query("
		CREATE TABLE IF NOT EXISTS `transaksi` (
		`id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
		`id_user` int(150) NOT NULL,
		`id_pesanan` int NOT NULL,
		`tanggal` date NOT NULL,
		`total_bayar` int(20) NOT NULL,
		PRIMARY KEY (`id_transaksi`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
		");
	$sql.= $koneksi->query("
		CREATE TABLE IF NOT EXISTS `detail_pesanan` (
		`id_detail_pesanan` int(11) NOT NULL AUTO_INCREMENT,
		`id_pesanan` int(11) NOT NULL,
		`id_masakan` int(11) NOT NULL,
		`keterangan` varchar(30) NOT NULL,
		`status_detail_pemesanan` varchar(30) NOT NULL,
		PRIMARY KEY (`id_detail_pesanan`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
		");
	$sql.= $koneksi->query("
		INSERT INTO user VALUES('1','admin','827ccb0eea8a706c4c34a16891f84e7b','Administrator','budibuday05@gmail.com','1');
		");
	$sql.= $koneksi->query("
		CREATE TABLE IF NOT EXISTS `pesanan` (
		`id_pesanan` int(10) NOT NULL AUTO_INCREMENT,
		`no_meja` varchar(25) NOT NULL,
		`tanggal` date NOT NULL,
		`id_user` int(15) NOT NULL,
		`keterangan` varchar(30) NOT NULL,
		`statu_pesanan` varchar(30) NOT NULL,
		PRIMARY KEY (`id_pesanan`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
		");
	$sql.= $koneksi->query("
		CREATE TABLE IF NOT EXISTS `level` (
		`id_level` varchar(20) NOT NULL,
		`nama_level` varchar(10) NOT NULL,
		PRIMARY KEY (`id_level`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
		");
	$sql.= $koneksi->query("
		CREATE TABLE IF NOT EXISTS `user` (
		`id_user` int(11) NOT NULL,
		`username` varchar(30) NOT NULL,
		`password` varchar(50) NOT NULL,
		`nama_user` varchar(30) NOT NULL,
		`email` varchar(40) NOT NULL,
		`id_level` int(10) NOT NULL,
		PRIMARY KEY (`id_user`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
		");
	if ($sql) {
		header("location: ../index.php");
	}else {
		echo "Tidak Dapat Membuat Table";
	}
}else {
	echo "<script>alert('Anda Sudah Pernah Menjalankan Proses ini');window.location='../index.php'</script>";
}
?>