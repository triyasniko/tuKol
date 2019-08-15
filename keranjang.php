<?php 
	session_start();
	include 'admin/koneksi.php';
	//echo "<pre>";
	//print_r($_SESSION['keranjang']);
	//echo "</pre>";

	if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
		?>
	<script>
		alert('Keranjang belanja anda kosong, \n silahkan pilih-pilih dulu!');
		location='index.php';
	</script>";
	<?php
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
	<section class="kontent">
		<div class="container">
			<h1>Keranjang Belanja</h1>
			<hr>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subharga</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$nomor=1;
						foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): 
						$ambil=$koneksi->query("SELECT*FROM tb_produk WHERE id_produk='$id_produk' ");
						$pecah=$ambil->fetch_assoc();
						$subharga=$pecah['harga_produk']*$jumlah;
					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah["nama_produk"]; ?></td>
						<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
						<td><?php echo $jumlah; ?></td>
						<td><?php echo $subharga; ?></td>
						<td>
							<a href="hapuskeranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger btn-xs">Hapus</a>
						</td>
					</tr>
					<?php $nomor++; ?>
					<?php endforeach ?>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-default">Lanjut Belanja</a>
			<a href="checkout.php" class="btn btn-info">Checkout</a>
		</div>
	</section>
</body>
</html>