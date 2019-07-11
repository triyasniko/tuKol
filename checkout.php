<?php 
	session_start();
	include 'admin/koneksi.php';

	if (!isset($_SESSION["pelanggan"])) {
		echo "<script>
				alert('Silahkan login lebih dulu');
				location='login.php';
			</script>";
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
					</tr>
				</thead>
				<tbody>
					<?php 
						$nomor=1;
						$totalbelanja=0;
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
					</tr>
					<?php $nomor++; ?>
					<?php $totalbelanja+=$subharga; ?>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<th colspan="4">Total Belanja :</th>
					<th>Rp. <?php echo number_format($totalbelanja); ?></th>
				</tfoot>
			</table>
			<form method="post">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input class="form-control" type="text" value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan']; ?>" readonly>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<input class="form-control" type="text" value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan']; ?>" readonly>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group" name="id_ongkir">
							<select class="form-control" name="id_ongkir" required>
								<option value="">Pilih Ongkos Kirim</option>
								<?php 
									$ambil=$koneksi->query("SELECT * FROM tb_ongkir");
									while ($perongkir=$ambil->fetch_assoc()) {
								?>
								<option value="<?php echo $perongkir["id_ongkir"]; ?>">
									<?php echo $perongkir['nama_kota']; ?> -
									Rp. <?php echo number_format($perongkir['tarif']); ?>
								</option>
								<?php }?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Alamat Lengkap Pengiriman</label>
					<textarea class="form-control" name="alamat_pengiriman" placeholder="Masukkan alamat lengkap ( termasuk kode pos )">
						
					</textarea>
				</div>
				<button class="btn btn-primary" name="checkout">Checkout</button>
			</form>
			<?php 
				if (isset($_POST["checkout"])) {
					$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
					$id_ongkir = $_POST["id_ongkir"];
					$tanggal_pembelian = date("Y-m-d");
					$alamat_pengiriman = $_POST["alamat_pengiriman"];

					$ambil = $koneksi->query("SELECT * FROM tb_ongkir WHERE id_ongkir='$id_ongkir' ");
					$arrayongkir = $ambil->fetch_assoc();
					$nama_kota = $arrayongkir['nama_kota'];
					$tarif = $arrayongkir['tarif'];
					$total_pembelian = $totalbelanja + $tarif;

					$koneksi->query("INSERT INTO tb_pembelian(id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman') ");
					
					$id_pembelian_barusan = $koneksi->insert_id;
					foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
						$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk' ");
						$perproduk = $ambil->fetch_assoc();

						$nama = $perproduk['nama_produk'];
						$harga = $perproduk['harga_produk'];
						$berat = $perproduk['berat_produk'];
						$subberat = $perproduk['berat_produk']*$jumlah;
						$subharga = $perproduk['harga_produk']*$jumlah;

						$koneksi->query("INSERT INTO tb_pembelian_produk(id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah) VALUES('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah') ");

						$koneksi->query("UPDATE tb_produk SET stok_produk=stok_produk-$jumlah WHERE id_produk='$id_produk' ");

					}
					unset($_SESSION["keranjang"]);
					$_SESSION["keranjang"]="";
					echo "<script>
							alert('Pembelian sukses');
							location='nota.php?id=$id_pembelian_barusan';
						</script>";
				}

			?>
		</div>
		<pre>
			<?php print_r($_SESSION["pelanggan"]); ?>
			<?php print_r($_SESSION["keranjang"]); ?>
		</pre>

	</section>
</body>
</html>