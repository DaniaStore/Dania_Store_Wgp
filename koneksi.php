<?php
$db_host = "localhost";
$username = "root";
$password = "";
$databse = "cv_db";

$koneksi = mysqli_connect($db_host, $username, $password, $databse);

if(mysqli_connect_error()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>
