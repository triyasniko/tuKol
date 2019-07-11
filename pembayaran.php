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
	$idpem=$_GET["id"];
	$ambil=$koneksi->query("SELECT*FROM tb_pembelian WHERE id_pembelian='$idpem' ");
	$detpem=$ambil->fetch_assoc();
	$id_pelanggan_beli=$detpem["id_pelanggan"];
	$id_pelanggan_login=$_SESSION["pelanggan"]["id_pelanggan"];

	if ($id_pelanggan_login!==$id_pelanggan_beli) {
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
	<link rel="stylesheet" href="admin/assets/vendor/linearicons/style.css">
</head>
<body>
	<?php 
		include 'menu.php';
	 ?>
	<section class="konten">
		<div class="container">
			<h2>Konfirmasi Pembayaran</h2>
			<p>kirim bukti pembayaran anda disini</p>
			<div class="alert alert-info">
				<p>Total tagihan anda : <strong>Rp. <?php echo number_format($detpem["total_pembelian"]); ?></strong></p>
			</div>

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama Penyetor</label>
					<input type="text" name="nama" class="form-control">
				</div>
				<div class="form-group">
					<label>Bank</label>
					<input type="text" name="bank" class="form-control">
				</div>
				<div class="form-group">
					<label>Jumlah</label>
					<input type="number" min="1" name="jumlah" class="form-control">
				</div>
				<div class="form-group">
					<label>Foto Bukti</label>
					<input type="file" name="bukti" class="form-control">
					<p class="text-danger">Foto harus JPG maks. 2mb</p>
				</div>
				<button class="btn btn-primary" name="kirim">Kirim</button>
			</form>
			<?php 
				if (isset($_POST["kirim"])) {
					$nama=$_POST["nama"];
					$bank=$_POST["bank"];
					$jumlah=$_POST["jumlah"];
					$tanggal=date("Y-m-d");
					$namabukti=$_FILES["bukti"]["name"];
					$lokasibukti=$_FILES["bukti"]["tmp_name"];
					$namafiks=date("YmdHis").$namabukti;

					if (move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks")) {

						$sql_input=$koneksi->query("INSERT INTO tb_pembayaran 
						(id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES 
						('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')"
						) or die(mysqli_error($koneksi));

						if ($sql_input) {
							$sql_update=$koneksi->query("UPDATE tb_pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$idpem' ");

							echo "<script>
									alert('Terima kasih sudah mengirimkan bukti pembayaran');
									location='riwayat.php';
								 </script>";
						}

					}					

				}
			 ?>
		</div>
	</section>
</body>
</html>