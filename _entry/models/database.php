<?php 

class database{

	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "goresto";
	public $mysqli;

	function __construct(){
		$this->mysqli = new mysqli($this->host, $this->uname, $this->pass ,$this->db);
	}
//Controller Pengguna =========================================================================

	function show_pengguna(){
		$data =$this->mysqli->query("SELECT * FROM user INNER JOIN level ON user.id_level = level.id_level");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function show_pengguna1(){
		$data =$this->mysqli->query("SELECT * FROM user INNER JOIN level ON user.id_level = level.id_level WHERE nama_level='kasir'");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function show_pengguna2(){
		$data =$this->mysqli->query("SELECT * FROM user INNER JOIN level ON user.id_level = level.id_level WHERE nama_level='waiter'");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}


	function tambah_pengguna($username,$password,$email,$nama_user,$id_level,$status){
		$data =$this->mysqli->query("insert into user values('','$username','$password','$email','$nama_user','$id_level','N')");
	}	


	function update_pengguna($id_user){
		$data =$this->mysqli->query("SELECT * FROM user INNER JOIN level ON user.id_level = level.id_level where id_user='$id_user'");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}


//Controller Akhir Pengguna =========================================================================


//Controller Masakana =========================================================================

	function show_masakan(){
		$data =$this->mysqli->query("SELECT * FROM masakan ORDER BY id_masakan DESC");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}


//Controller Akhir Masakana =========================================================================




//Controller Kategori =========================================================================

	function tambah_kategori($nama_kategori){
		$data = $this->mysqli->query("insert into kategori values('','$nama_kategori')");
	}

	function update_kategori($id_kategori,$nama_kategori){
		$data = $this->mysqli->query("UPDATE kategori set nama_kategori='$nama_kategori' where id_kategori='$id_kategori'");
	}

	function show_kategori(){
		$data =$this->mysqli->query("SELECT * FROM kategori");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function hapus_kategori($id_kategori){
		$data = $this->mysqli->query("DELETE from kategori where id_kategori='$id_kategori'");
	}

//Akhir Controller Meja ========================================================================

//Controller Meja =============================================================================
	
	function tambah_meja($no_meja){
		$data =$this->mysqli->query("insert into meja values('','$no_meja', 'kosong')");
	}

	function update_meja($id_meja,$no_meja){
		$data = $this->mysqli->query("UPDATE meja set no_meja='$no_meja', status='kosong' where id_meja='$id_meja'");
	}

	function show_meja(){
		$data =$this->mysqli->query("SELECT * FROM meja ORDER BY no_meja ASC ");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function hapus_meja($id_meja){
		$data = $this->mysqli->query("DELETE from meja where id_meja='$id_meja'");
	}
//Akhir Controller Meja ========================================================================


// Controller Transaksi ========================================================================

	function show_transaksi($tanggal = ""){
		$sql = "SELECT * FROM transaksi JOIN pesanan ON transaksi.id_pesanan = pesanan.id_pesanan JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id_pelanggan ORDER BY id_transaksi DESC";
		if($tanggal== '')
		{
			$sql = "SELECT * FROM transaksi JOIN pesanan ON transaksi.id_pesanan = pesanan.id_pesanan JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id_pelanggan ORDER BY id_transaksi DESC";
		}else{
			$sql = "SELECT * FROM transaksi JOIN pesanan ON transaksi.id_pesanan = pesanan.id_pesanan JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id_pelanggan
			WHERE transaksi.tanggal = DATE('$tanggal')
			 ORDER BY id_transaksi DESC";
		}
		$data =$this->mysqli->query($sql);
		$hasil = array();
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

//Akhir Controller Transaksi ========================================================================

//Controller Pesanan =========================================================================

	function show_pesanan($tanggal = ''){
		if($tanggal== ''){
			$sql = "SELECT * FROM pesanan ORDER BY status_pesanan DESC";
		}else{
			$sql = "SELECT * FROM pesanan a LEFT JOIN meja b ON b.id_meja=a.no_meja WHERE a.tanggal=date('$tanggal') ORDER BY a.status_pesanan DESC";
		}
		$data =$this->mysqli->query($sql); 
		$hasil = array();
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
			
			
		}
		return $hasil;
	}


//Controller Akhir Pesanan =========================================================================


//Controller Pesanan =========================================================================

	function laporan(){
		$data =$this->mysqli->query("SELECT * FROM transaksi INNER JOIN user ON transaksi.id_user = user.id_user"); 
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}


//Controller Akhir Pesanan =========================================================================

//Controller Meja =============================================================================
	
	function tambah_level($nama_level){
		$data =$this->mysqli->query("insert into level values('','$nama_level')");
	}

	function update_level($id_level,$nama_level){
		$data = $this->mysqli->query("UPDATE level set nama_level='$nama_level' where id_level='$id_level'");
	}

	function show_level(){
		$data =$this->mysqli->query("SELECT * FROM level ORDER BY nama_level ASC ");
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

	function hapus_level($id_level){
		$data = $this->mysqli->query("DELETE from level where id_level='$id_level'");
	}
//Akhir Controller Meja ========================================================================


} 
?>