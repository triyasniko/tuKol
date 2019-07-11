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
			<?php 
				$id=$_GET['id'];
				$ambil=$koneksi->query("SELECT*FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan WHERE id_pembelian='$id' ");
				$detail=$ambil->fetch_assoc();
				$idpelangganyangbeli=$detail["id_pelanggan"];
				$idpelangganyanglogin=$_SESSION["pelanggan"]["id_pelanggan"];
				if ($idpelangganyangbeli!==$idpelangganyanglogin) {
					echo "<script>
							alert('Tidak dapat mengakses');
						 </script>";
					echo "<meta http-equiv='refresh' content='1;url=riwayat.php' >";
				}

			?>
			<!-- <p><?php //print_r($detail); ?></p> -->
			<div class="row">
				<h2>Detail Pembelian</h2>
				<div class="col-md-4">
					<h3>Pembelian</h3>
					<p><strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong></p>
					<p>
						<?php echo $detail['tanggal_pembelian']; ?><br>
						Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
					</p>
				</div>
				<div class="col-md-4">
					<h3>Pelanggan</h3>
					<p><strong><?php echo $detail['nama_pelanggan']; ?></strong></p>
					<p>
						<?php echo $detail['telepon_pelanggan']; ?><br>
						<?php echo $detail['email_pelanggan']; ?>
					</p>
				</div>
				<div class="col-md-4">
					<h3>Pengiriman</h3>
					<strong><p><?php echo $detail['nama_kota']; ?></p></strong>
					<p>
						Ongkos kirim : Rp. <?php echo $detail['tarif']; ?><br>
						Alamat pengiriman : <?php echo $detail['alamat_pengiriman']; ?>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-resposive table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Produk</th>
								<th>Harga</th>
								<th>Berat</th>
								<th>Jumlah</th>
								<th>Subberat</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$nomor=1;
							$ambil=$koneksi->query("SELECT*FROM tb_pembelian_produk WHERE id_pembelian='$_GET[id]' ");
								while($pecah=$ambil->fetch_assoc()){

							?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah['nama']; ?></td>
								<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
								<td><?php echo $pecah['berat']; ?> Gr.</td>
								<td><?php echo $pecah['jumlah']; ?></td>
								<td><?php echo $pecah['subberat']; ?> Gr.</td>
								<td><?php echo $pecah['subharga']; ?></td>
							</tr>
							<?php 
								$nomor++;
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7">
					<div class="alert alert-info">
						<p>Silahkan melakukan pembayaran sebesar <strong>Rp. <?php echo $detail["total_pembelian"]; ?></strong></p>
						ke <strong>Bank XYZ 1298-230-23412</strong>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>