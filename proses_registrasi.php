<?php
include 'koneksi.php';

$role = $_POST['role'];
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

if($role == 'admin'){
    $sql = "INSERT INTO admin (nama_lengkap, email, username, password) VALUES ('$nama_lengkap', '$email', '$username', '$password')";
}else if($role == 'user'){
    $sql = "INSERT INTO pengurus (nama_lengkap, email, username, password) VALUES ('$nama_lengkap', '$email', '$username', '$password')";
}
if(mysqli_query($koneksi, $sql)){
    echo "<script>alert('Registrasi anda telah berhasil.'); window.location = 'login.php'</script>";

    // "Registrasi berhasil. <a href='login.php'>Klik disini</a> untuk login.";
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
