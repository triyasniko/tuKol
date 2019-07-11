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
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h3>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-striped" id="dataTable">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Status</th>
								<th>Total</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$nomor=1;
								$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
								$ambil=$koneksi->query("SELECT*FROM tb_pembelian WHERE id_pelanggan='$id_pelanggan' ");
								while ($pecah=$ambil->fetch_assoc()) {

							 ?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah["tanggal_pembelian"]; ?></td>
								<td>
									<?php echo $pecah["status_pembelian"]; ?><br>
									<?php if (!empty($pecah["resi_pengiriman"])): ?>
										Resi : <?php echo $pecah["resi_pengiriman"]; ?>
									<?php endif ?>
								</td>
								<td><?php echo number_format($pecah["total_pembelian"]); ?></td>
								<td>
									<a href="nota.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-info">Nota</a>

									<?php if ($pecah["status_pembelian"]=="pending"): ?>
									<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-warning">Input Pembayaran</a>

									<?php else: ?>
										<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-success">Lihat Pembayaran</a>
									<?php endif ?>
								</td>
							</tr>
							<?php
								$nomor++; 
								} 
							?>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
	</section>

	<script src="admin/assets/vendor/jquery/jquery.min.js"></script>
	<script src="admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="admin/assets/vendor/dataTables/jquery.dataTables.js"></script>
	<script src="admin/assets/vendor/dataTables/dataTables.bootstrap.js"></script>
	<script>
		$(document).ready(function () {
			$('#dataTable').dataTable();
		});
		
	</script>
</body>
</html>