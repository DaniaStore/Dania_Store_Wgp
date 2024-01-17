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
	</header>
	<div class="slider-wrapper">

		<div id="da-slider" class="da-slider">
			<div class="da-slide">
				<h2>T-Shirt Casual</h2>
				<p>Kami menyediakan kaos sport dan casual yang nyaman anda kenakan setiasp hari juga update dengan perkermbangan mode di era sekarang ini.</p>
				<a href="#" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="img/parallax-slider/kaos.png" alt="image01" /></div>
			</div>
			<div class="da-slide">
				<h2>Jacket & Sweater</h2>
				<p>Kami memiliki banyak koleksi jacket dan sweater, mulai dari rider jacket hingga casual jacket dan juga casual sweater yang cocok dipakai sehari hari.</p>
				<a href="#" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="img/parallax-slider/jaket5.png" alt="image02" /></div>
			</div>
			<div class="da-slide">
				<h2>Pants & Jeans</h2>
				<p>Kami memiliki koleksi jeans dan celana santai yang bisa anda gunakan sehari hari dengan harga yang terjangkau anda bisa memiliki koleksi kami.</p>
				<a href="#" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="img/parallax-slider/jeans.png" alt="image03" /></div>
			</div>
			<div class="da-slide">
				<h2>Custom T-Shirt</h2>
				<p>Kami menerima pembuatan kaos custom sesuai dengan design keinginan anda dengan harga yang bisa di sesuaikan dengan kebutuhan anda.</p>
				<a href="#" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="img/parallax-slider/kaos.png" alt="image04" /></div>
			</div>
			<nav class="da-arrows">
				<span class="da-arrows-prev"></span>
				<span class="da-arrows-next"></span>
			</nav>
		</div>
		
	</div>
	<!-- end: Slider -->
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
      		<div class="hero-unit">
        		<p>
					Kami adalah distro online terlengkap dan terpercaya, dengan harga terjangkau kurang dari 100rb anda sudah dapat memiliki produk kami. Selamat Berbelanja Customer..
				</p>
        		<p><a class="btn btn-success btn-large" href="produk.php">Mulai Berbelanja &raquo;</a></p>
                                
      		</div>
            <!--<div class="title"><h3>Keranjang Anda</h3></div>
            <div class="hero-unit">
            </div> -->
			<!-- end: Hero Unit -->

      		<!-- start: Row -->
            
      		<div class="row">
	                <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY br_id DESC limit 9");
                    while($data = mysqli_fetch_array($sql)){
                    ?>
        		<div class="span4">
          			<div class="icons-box">
                        <div class="title"><h3><?php echo $data['br_nm']; ?></h3></div>
                        <img src="<?php echo $data['br_gbr']; ?>" />
						<div><h3>Rp.<?php echo number_format($data['br_hrg'],2,",",".");?></h3></div>
					<!--	<p>
						
						</p> -->
						<div class="clear"><a href="detailproduk.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-danger">Detail</a> <a href="detailproduk.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-success">Beli &raquo;</a></div>
					
                    </div>
        		</div>
                <?php   
              }
              
              
              ?>
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