<?php 
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
</head>
<body>
	<?php 
		include 'menu.php';
	 ?>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Daftar Pelanggan</h2>
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="form-group">
								<label class="control-label col-md-3">Nama</label>
								<div class="col-md-7">
									<input type="text" name="nama" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Email</label>
								<div class="col-md-7">
									<input type="text" name="email" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password</label>
								<div class="col-md-7">
									<input type="password" name="password" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Alamat</label>
								<div class="col-md-7">
									<textarea name="alamat" class="form-control" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Telp / HP</label>
								<div class="col-md-7">
									<input type="text" name="telepon" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-7">
									<button name="daftar" class="btn btn-primary">Daftar</button>
								</div>
							</div>
						</form>
						<?php 
							if (isset($_POST["daftar"])) {
								$nama=$_POST['nama'];
								$email=$_POST['email'];
								$password=$_POST['password'];
								$alamat=$_POST['alamat'];
								$telepon=$_POST['telepon'];

								$ambil=$koneksi->query("SELECT*FROM tb_pelanggan WHERE email_pelanggan='$email' ") or die(mysqli_error($koneksi));
								$yangcocok=$ambil->num_rows;

								if ($yangcocok==1) {
									echo "<script>
											alert('Email sudah terdaftar');
											location='daftar.php';
										</script>";
								}else{
									$koneksi->query("INSERT INTO tb_pelanggan (nama_pelanggan,email_pelanggan,password_pelanggan,alamat_pelanggan,telepon_pelanggan) VALUES('$nama','$email','$password','$alamat','$telepon')") or die(mysqli_error($koneksi));

									echo "<script>
											alert('Pendaftaran berhasil');
											location='login.php'
										</script>";
								}
							}
						 ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>