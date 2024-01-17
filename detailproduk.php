<?php require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welocome Dania Store Waingapu</title> 
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
	</header>	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Produk Detail Produk</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">              
<div class="title"><h3>Keranjang Anda</h3></div>
            <div class="hero-unit">
            <!--<div class="tittle"><h3><strong><span class="glyphicon glyphicon-shopping-cart"></span> Your Cart</strong></h3></div>-->
                    <table class="table table-hover table-condensed">
                    <tr>
                    <th><center>No</center></th>
					<th><center>Item</center></th>
					<th><center>Quantity</center></th>
					<th><center>Sub Total</center></th>
				</tr>
                    <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
                
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysqli_query($koneksi, "SELECT br_id, br_nm, br_hrg FROM barang WHERE br_id = '$key'");
            $data = mysqli_fetch_array($query);

            $jumlah_harga = $data['br_hrg'] * $val;
            $total += $jumlah_harga;
            $no = 1;
            ?>
                <tr>
                <td><center><?php echo $no ++; ?></center></td>
                <td><center><?php echo $data['br_nm']; ?></center></td>
                <td><center><?php echo number_format($val); ?> Pcs</center></td>
                <td><center>Rp. <?php echo number_format($jumlah_harga); ?></center></td>
                </tr>
                
					<?php
                    //mysql_free_result($query);			
						}
							//$total += $sub;
						}?>
                        <?php
				if($total == 0){ ?>
					<td colspan="4" align="center"><?php echo "Keranjang Kosong!"; ?></td>
				<?php } else { ?>
					
                        <td colspan="4" style="font-size: 18px;"><b><div class="pull-right">Total Belanja Anda : Rp. <?php echo number_format($total); ?>,- </div> </b></td>
					
			<?php	}
				?>
                </table> 
                <p><div align="right">
						<a href="detail.php" class="btn btn-success">Details Keranjang</a>
						</div></p>
            </div>
      		<!-- start: Row -->
            
      		<div class="row">
            <div class="col-sm-6">
                    <?php                  
$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE br_id='$_GET[kd]'");
$data  = mysqli_fetch_array($query);
?>
        		<!--<div class="span4">-->
          			<!--<div class="icons-box">-->
                    <div class="hero-unit" style="margin-left: 20px;">
                    <table>
                    <tr>
                        <td rowspan="7"><img src="<?php echo $data['br_gbr']; ?>" /></td>
                        </tr>
                        <tr>
                        <td colspan="4"><div class="title"><h3><?php echo $data['br_nm']; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td size="200"><h3>Harga</h3></td>
                        <td><h3>:</h3></td>
						<td><div><h3>Rp.<?php echo number_format($data['br_hrg'],2,",",".");?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><h3>Stock</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php if ($data['br_stok'] >= 1){
	                           echo '<strong style="color: blue;">In Stock</strong>';	
                                } else {
	                           echo '<strong style="color: red;">Out Of Stock</strong>';	
                                }; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><h3>Satuan</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php echo $data['br_satuan']; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><h3>Keterangan</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php echo $data['ket']; ?></h3></div></td>
                        </tr>
					<!--	<p>
						
						</p> -->
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
						<td><div class="clear"> <a href="cart.php?act=add&amp;barang_id=<?php echo $data['br_id']; ?>&amp;ref=detailproduk.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-danger">Beli</a></div></td>
                        </tr>
     
                    </table>
                    </div>
                    <!--</div> -->
        		<!--</div> -->
<!---->
      		</div>
			<!-- end: Row -->
					
					
				</div>	
				
					
				</div>
				
                </div>
			</div>
			<!--end: Row-->
	
		</div>
	</div>
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
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script def src="js/custom.js"></script>
</body>
</html>	