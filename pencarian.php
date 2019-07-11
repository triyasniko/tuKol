<?php 
	include 'admin/koneksi.php';
	$keyword=$_GET["keyword"];
	$semuadata=array();
	$ambil=$koneksi->query("SELECT*FROM tb_produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%' ");

	while ($pecah=$ambil->fetch_assoc()) {
		$semuadata[]=$pecah;
	}

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
	<section class="kontainer">
		<div class="container">
			<h3>Hasil pencarian <?php echo $keyword; ?></h3>
			<?php if (empty($semuadata)): ?>
				<div class="alert alert-danger">Produk <strong><?php echo $keyword; ?></strong> tidak ditemukan</div>
			<?php endif ?>
			<div class="row">
				<?php foreach ($semuadata as $key => $value): ?>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="foto_produk/<?php echo $value['foto_produk']; ?>" class="img-responsive">
						<div class="caption">
							<h3><?php echo $value["nama_produk"]; ?></h3>
							<h5>Rp. <?php echo number_format($value["harga_produk"]); ?></h5>
							<a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
							<a href="detail.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-default">Detail</a>
						</div>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
</body>
</html>