<?php 
	session_start();
	include 'admin/koneksi.php';

	if (!isset($_SESSION["pelanggan"]) or empty($_SESSION["pelanggan"])) {
		echo "<script>
				alert('Tidak dapat mengakses, silahkan login');
				location='login.php';
			 </script>";
		exit();
	}

	$id_pembelian=$_GET["id"];
	$ambil=$koneksi->query("SELECT*FROM tb_pembayaran LEFT JOIN tb_pembelian ON tb_pembayaran.id_pembelian=tb_pembelian.id_pembelian WHERE tb_pembelian.id_pembelian='$id_pembelian' ")or die(mysqli_error());
	$detbay=$ambil->fetch_assoc();

	if (empty($detbay)) {
		echo "<script>
				alert('Belum ada data pembayaran');
				location='riwayat.php';
			 </script>";
		exit();
	}
	if ($_SESSION["pelanggan"]["id_pelanggan"]!==$detbay["id_pelanggan"]) {
		echo "<script>
				alert('Tidak dapat mengakses');
				location='riwayat.php';
			 </script>";
		exit();
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
	<!-- TABLE STYLES-->
	<link href="admin/assets/vendor/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	<link rel="stylesheet" href="admin/assets/vendor/linearicons/style.css">
</head>
<body>
	<?php 
		include 'menu.php';
	 ?>
	<section class="konten">
		<div class="container">
			<h3>Lihat Pembayaran</h3>
			<div class="row">
				<div class="col-md-6">
					<table class="table table-striped">
						<tr>
							<th>Nama</th>
							<td><?php echo $detbay["nama"]; ?></td>
						</tr>
						<tr>
							<th>Bank</th>
							<td><?php echo $detbay["bank"]; ?></td>
						</tr>
						<tr>
							<th>Tanggal</th>
							<td><?php echo $detbay["tanggal"]; ?></td>
						</tr>
						<tr>
							<th>Jumlah</th>
							<td>Rp. <?php echo number_format($detbay["jumlah"]); ?></td>
						</tr>

					</table>
				</div>
				<div class="col-md-6">
					<img src="bukti_pembayaran/<?php echo $detbay['bukti']; ?>" class="img-responsive">
				</div>
			</div>
		</div>
	</section>
</body>
</html>