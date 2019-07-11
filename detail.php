<?php 
	session_start();
	include 'admin/koneksi.php';
	$id_produk = $_GET["id"];
	$ambil = $koneksi->query("SELECT*FROM tb_produk WHERE id_produk='$id_produk' ");
	$detail = $ambil->fetch_assoc();
	
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
 </head>
 <body>
 	<?php 
 		include 'menu.php';
 	 ?>
	<section class="konten">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<img src="foto_produk/<?php echo $detail['foto_produk']; ?>" class="img-responsive">
				</div>
				<div class="col-md-6">
					<h2><?php echo $detail["nama_produk"]; ?></h2>
					<h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>
					<h5>Stok : <?php echo $detail["stok_produk"]; ?></h5>
					<form method="post">
						<div class="form-group">
							<div class="input-group">
								<input type="number" name="jumlah" class="form-control" min="1" max="<?php echo $detail["stok_produk"]; ?>">
								<div class="input-group-btn">
									<button class="btn btn-primary" name="beli">Beli</button>
								</div>
							</div>
						</div>
					</form>
					<?php 
						if (isset($_POST["beli"])) {
							$jumlah = $_POST["jumlah"];
							$_SESSION["keranjang"][$id_produk]=$jumlah;

							echo "<script>
									alert('Produk telah masuk keranjang belanja');
									location='keranjang.php';
								</script>";
						}
					 ?>
					<p><?php echo $detail["deskripsi_produk"]; ?></p>
				</div>
			</div>
		</div>
	</section>
 </body>
 </html>