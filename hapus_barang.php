<?php
include 'koneksi.php';

$br_id = $_POST['br_id'];

$sql = "DELETE FROM barang WHERE br_id = $br_id";

if(mysqli_query($koneksi, $sql)){
    echo"<script>alert('Barang Berhasil dihapus.'); window.location = 'admin.php'</script>";
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
