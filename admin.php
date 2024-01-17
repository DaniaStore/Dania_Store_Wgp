<?php
include 'koneksi.php';
$result_select = mysqli_query($koneksi, "SELECT * FROM barang");
$mode = "Tambah"; // Mode default adalah "Tambah"
$br_nm = "";
$br_hrg = "";
$br_stok = "";
$br_satuan = "";
$ket = "";

if (isset($_POST['submit'])) {
    $br_nm = $_POST['br_nm'];
    $br_hrg = $_POST['br_hrg'];
    $br_stok = $_POST['br_stok'];
    $br_satuan = $_POST['br_satuan'];
    $ket = $_POST['ket'];

    // Menangani upload file
    $br_gbr = $_FILES['br_gbr']['name'];
    $tmp_name = $_FILES['br_gbr']['tmp_name'];
    $dir_upload = "gambar/";
    $br_gbr_upload = $dir_upload . $br_gbr;

    // Memindahkan file ke direktori upload
    if (move_uploaded_file($tmp_name, $br_gbr_upload)) {
        // Cek apakah data barang sudah ada atau belum
        $query_check = "SELECT * FROM barang WHERE br_nm='$br_nm'";
        $result_check = mysqli_query($koneksi, $query_check);

        if (mysqli_num_rows($result_check) > 0) {
            // Jika data barang sudah ada, lakukan update
            $row = mysqli_fetch_assoc($result_check);
            $br_id = $row['br_id'];

            $query_update = "UPDATE barang SET br_hrg='$br_hrg', br_stok='$br_stok', br_satuan='$br_satuan', ket='$ket', br_gbr='$br_gbr_upload' WHERE br_id='$br_id'";
            $result_update = mysqli_query($koneksi, $query_update);

            if (!$result_update) {
                die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
            } else {
                echo "<script>alert('Barang berhasil diubah.');window.location='index.php';</script>";
            }
        } else {
            // Jika data barang belum ada, lakukan insert
            $query_insert = "INSERT INTO barang (br_nm, br_hrg, br_stok, br_satuan, ket, br_gbr) VALUES ('$br_nm', '$br_hrg', '$br_stok', '$br_satuan', '$ket', '$br_gbr_upload')";
            $result_insert = mysqli_query($koneksi, $query_insert);

            if (!$result_insert) {
                die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
            } else {
                echo "<script>alert('Data berhasil ditambah.');window.location='produk.php';</script>";
            }
        }
    } else {
        echo "<script>alert('Gagal apload gambar.');window.location='admin.php';</script>";
    }
} elseif (isset($_GET['br_id'])) {
    $mode = "Ubah";
    $br_id = $_GET['br_id'];

    if (isset($_GET['action']) && $_GET['action'] == 'hapus') {
        // Jika parameter 'action' adalah 'hapus', hapus data barang
        $query_delete = "DELETE FROM barang WHERE br_id='$br_id'";
        $result_delete = mysqli_query($koneksi, $query_delete);

        if (!$result_delete) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil dihapus.');window.location='produk.php';</script>";
        }
    } else {
        $query_select = "SELECT * FROM barang WHERE br_id='$br_id'";
        $result_select = mysqli_query($koneksi, $query_select);

        if (mysqli_num_rows($result_select) > 0) {
            $row = mysqli_fetch_assoc($result_select);
            $br_nm = $row['br_nm'];
            $br_hrg = $row['br_hrg'];
            $br_stok = $row['br_stok'];
            $br_satuan = $row['br_satuan'];
            $ket = $row['ket'];
        } else {
            die("Data barang tidak ditemukan.");
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Dania Store</title>
    <style type="text/css">
        .logo-navbar{
            width: 179px;
            height: auto;
            margin-top: 15px;
            margin-right: 0 0 px;
            margin-left: 0 0px;
        }
        .container .tentang{
            text-align: center;
            margin-left: 250px;
        }
        .container .alamat{
            text-align: center;
        }
        .button1{
            margin-left: 1269px;

        }
        .container-semua{
            background: #FFA07A;
        }
        .kelas{
            margin-right: 30px;
        }
        form .kelas{
            margin-right: 10px;
        }
        .warna{
            color: white;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container-semua">
<div class="button1"><button type="button" class="btn btn-secondary"><a href="logout.php">Logout</a></button></div>
    <div class="container">
        <h2 class="form-signin-heading"><center><font color="#fff" size="5px">Halaman Admin</font></center></h2><br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="kelas"> 
                <ul>
                    <li>
                        <input type="text" name="br_nm" placeholder="nama barang" value="<?php echo isset($br_nm) ? $br_nm : ''; ?>">
                        <input type="number" name="br_hrg" placeholder="harga" value="<?php echo isset($br_hrg) ? $br_hrg : ''; ?>">
                        <input type="number" name="br_stok" placeholder="stok" value="<?php echo isset($br_stok) ? $br_stok : ''; ?>">
                        <input type="text" name="br_satuan" placeholder="br_satuan" value="<?php echo isset($br_satuan) ? $br_satuan : ''; ?>">
                        <textarea name="ket"><?php echo isset($ket) ? $ket : ''; ?></textarea>
                        <input type="file" name="br_gbr">
                        <input type="submit" name="submit" value="<?php echo $mode; ?>">
                    </li>
                </ul>
            </div>
        </form>
                <table class="table">
            <thead>
                <tr class="warna">
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                    <th>gambar</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result_select)): ?>
                <tr class="warna">
                    <td><?php echo $row['br_nm']; ?></td>
                    <td><?php echo $row['br_hrg']; ?></td>
                    <td><?php echo $row['br_stok']; ?></td>
                    <td><img src="<?php echo $row['br_gbr']; ?>" width="50px"></td>
                    <td><?php echo $row['br_satuan']; ?></td>
                    <td><?php echo $row['ket']; ?></td>

                    <td>
                        <form method="post" action="hapus_barang.php">
                            <input type="hidden" name="br_id" value="<?php echo $row['br_id']; ?>">
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>