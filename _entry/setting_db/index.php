<?php
if (file_exists('../setting.php')) {
	include "../setting.php";
	$koneksi = new mysqli($host,$user,$pass,$db);
	if ($koneksi->connect_error) {
		unlink('setting.php');
		header("location: setting_db/");
	}else {
		echo "Anda Sudah Pernah Menyettingnya Jika Ingin Menyetting Ulang Maka Hapus Database dan File setting.php ";
	}
}else {
?>

<title>Setting Database</title>
<link href="assets/bootstrap.min.css" rel="stylesheet" type="text/css">
<body style="margin:15% auto;width:250px;">
	<center>
		<form method="POST" enctype="multipart/form-data">
			<div class="form-group">				
			<input class="form-control" type="text" name="a" value="localhost">
			</div>
			<div class="form-group">				
			<input class="form-control" type="text" name="b" placeholder="username">
			</div>
			<div class="form-group">				
			<input class="form-control" type="text" name="c" placeholder="password">
			</div>
			<div class="form-group">				
			<input class="form-control" type="text" name="d" placeholder="database">
			</div>
			<div class="form-group">
			<input class="form-control" type="submit" name="input" value="Save">
			</div>												
		</form>
	</center>
</body>
<?php  
if (isset($_POST['input'])) {
file_put_contents('../setting.php', 
'<?php  
$host = "'.htmlspecialchars($_POST['a']).'";
$user = "'.htmlspecialchars($_POST['b']).'";
$pass = "'.htmlspecialchars($_POST['c']).'";
$db = "'.htmlspecialchars($_POST['d']).'";
?>'
);
header("location: install.php");
}
?>

<?php	
}
?>