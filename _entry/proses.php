<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) 
{
	$username = strtolower(htmlspecialchars(addslashes(trim($_POST['username']))));
	$password = trim(md5(strtolower($_POST['password'])));

	$query = mysqli_query($conn, "SELECT * FROM user usr INNER JOIN level lvl ON usr.id_level=lvl.id_level WHERE username='$username' AND password='$password' AND status='Y' ");
	if (mysqli_num_rows($query) == 0) 
	{
		echo "<script>alert('Login Gagal Password / username Salah !!!');document.location.href='index'</script>/n";
	}elseif ($username == $_POST['username'] && $password == $_POST['password']) {

	}else{
		$row = mysqli_fetch_assoc($query);
		$_SESSION['username']	= $row['username'];
		$_SESSION['nama_level']  = $row['nama_level'];
		
		if($row['nama_level'] == "admin")
		{	
			echo "<script>alert('Welcome To Administrator!');document.location.href='_Admin/'</script>/n";
		}
		else if($row['nama_level'] =="waiter")
		{
			echo "<script>alert('Welcome To Waiter !');document.location.href='_Waiter/'</script>/n";
		}
		else if($row['nama_level'] =="kasir")
		{
			echo "<script>alert('Welcome To Kasir !');document.location.href='_Kasir/'</script>/n";
		}
		else if($row['nama_level'] =="owner")
		{
			echo "<script>alert('Welcome To Dapur !');document.location.href='_Owner/'</script>/n";
		}
		else if($row['nama_level'] =="pelanggan")
		{
			echo "<script>alert('Welcome To Pelanggan !');document.location.href='_Pelanggan/'</script>/n";
		}
		else
		{
			echo "<script>alert('Login Gagal !!!');document.location.href='index'</script>/n";
		}
	}
}else{
	echo "<script>alert('Anda belum mengisi Form !!!');document.location.href='index'</script>/n";
}
?>