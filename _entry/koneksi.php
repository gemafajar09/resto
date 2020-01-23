<?php
$host = "localhost";
$user = "root";
$pass = "";
$namadb = "goresto";

$conn = mysqli_connect($host, $user, $pass, $namadb);
if (!$conn) 
{
		die("Connection Failed : ". mysqli_connect_error() );
}
?>
