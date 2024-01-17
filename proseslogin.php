<?php
session_start();
include 'koneksi.php';

$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

$data = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$cek = mysqli_query($koneksi, $data);
if(mysqli_num_rows($cek) > 0){
    $_SESSION['username'] = $username;
    header("Location: admin.php");
}else{
    $data = "SELECT * FROM pengurus WHERE username = '$username' AND password = '$password'";
    $cek = mysqli_query($koneksi, $data);
    if(mysqli_num_rows($cek) > 0){
        $_SESSION['username'] = $username;
        header("Location: index.php");
    }else{
        echo "Username atau password salah. <a href='login.php'>Kembali</a>";
    }
}
?>