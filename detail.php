<?php require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dania Store Waingapu</title> 
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
		.totalid{
			margin-left: 90px;
		}
	</style>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="logo-span3">
						
					<a class="brand" href="#"><img class="logo-navbar" src="img/4.png" alt="Logo"></a>				
				</div>
				<div class="span9">	
					<div class="navbar navbar-inverse">
			    		<div class="navbar-inner">
			          		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			          		</a>
			          		<div class="nav-collapse collapse">
			            		<ul class="nav">
			              			<li class="active"><a href="index.php">Beranda</a></li>
			              			<li><a href="produk.php">Produk Kami</a></li>
                                    <li><a href="detail.php">Keranjang</a></li>
                                    <li><a href="logout.php">Logout</a></li>
			            		</ul>
			          		</div>
			        	</div>
			      	</div>		
				</div>	
			</div>
		</div>	
	</header>
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-usd ico-white"></i>Keranjang</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container">

			<!-- start: Table -->
            <div class="title"><h3>Detail Keranjang Belanja</h3></div>
<table class="table table-hover table-condensed">
<tr>
					<th><center>No Pembelian</center></th>
                    <th><center>Kode Barang</center></th>
					<th><center>Nama Barang</center></th>
					<th><center>Jumlah</center></th>
					<th><center>Harga Satuan</center></th>
					<th><center>Sub Total</center></th>
					<!-- <th><center>Opsi</center></th> -->
				</tr>
			    <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
                
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysqli_query($koneksi, "select * from barang where br_id = '$key'");
            $data = mysqli_fetch_array($query);

            $jumlah_harga = $data['br_hrg'] * $val;
            $total += $jumlah_harga;
            $no = 1;
            ?>
                <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $data['br_id']; ?></center></td>
                <td><center><?php echo $data['br_nm']; ?></center></td>
                <td><center><?php echo number_format($data['br_hrg']); ?></center></td>
                <td><center><?php echo number_format($val); ?></center></td>
                <td><center><?php echo number_format($jumlah_harga); ?></center></td>
                <!-- <td><center><a href="cart.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php" class="btn btn-xs btn-success">Tambah</a> <a href="cart.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php" class="btn btn-xs btn-warning">Kurang</a> <a href="cart.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php" class="btn btn-xs btn-danger">Hapus</a></center></td> -->
                </tr>
                
					<?php
                    //mysql_free_result($query);			
						}
							//$total += $sub;
						}?>  
                         <?php
				if($total == 0){
					echo '<tr><td colspan="5" align="center">Ups, Keranjang kosong!</td></tr></table>';
					echo '<p><div align="right">
						<a href="index.php" class="btn btn-info btn-lg"> Continue Shopping</a>
						</div></p>';
				} else {
					echo '
						<tr style="background-color: #DDD;"><td colspan="4" align="right"><b>Total :</b></td><td class="totalid" align="right"><b>Rp. '.number_format($total,2,",",".").'</b></td></td></td><td></td></tr></table>
						<p><div align="right">
						<a href="index.php" class="btn btn-info"> CONTINUE SHOPPING</a>
						</div></p>
					';
				}
				?>
<td></td>
</table>
		</div>				
	</div>
<hr>
	<div id="footer">
        <div class="container">
            <div class="row">
                <div class="tentang">
                <div class="span3">
                    <h3>Tentang Dania Store</h3>
                    <p>
                        Dania Store adalah toko online yang bergerak di bidang fashion, furniture, sasaran kami semua kalangan baik muda maupun tua, mulai dari anak - anak dan orang dewasa.
                    </p>        
                </div></div>
                <div class="alamat">
                <div class="span3">
                    <h3>Alamat Kami</h3>
                    Jl. M.T.Haryono, No.29, RT 020, RW 010, Kel. Kamalaputih, Kec. Kota Waingapu, Kab. Sumba Timur, NTT0<br />
                    Telp : 0812 3113 0571<br />
                    Instagram : <a href="https://www.instagram.com/daniel_adam_ns?igsh=dHV0cTg0dnRieGNw"><font color="blue">daniel_adam_ns</font></a>
                </div></div>
            </div>
        </div>
	</div>
   </div>
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script defer="defer" src="js/custom.js"></script>
<!-- end: Java Script -->

</body>
</html>