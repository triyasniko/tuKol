<!-- Developt by : triyasniko -->
<?php 
	session_start();
	include 'admin/koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>tuKol</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="admin/assets/css/gayaku.css">
</head>
<body>
	<?php 
		include 'menu.php';
	 ?>
	<section class="konten">
		<div class="container">
			<h1>Produk Terbaru</h1>
			<div class="row">

				<?php 
					$ambil=$koneksi->query("SELECT*FROM tb_produk");
					while($perproduk=$ambil->fetch_assoc()){

				?>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>">
						<div class="caption">
							<h3><?php echo $perproduk['nama_produk']; ?></h3>
							<h4>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h4>
							<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
							<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default">Detail</a>
						</div>
					</div>
				</div>
				<?php  
					}
				?>
			</div>
		</div>
	</section>

	<script src="admin/assets/vendor/jquery/jquery.min.js"></script>
	<script src="admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>