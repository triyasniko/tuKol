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
	<section class="kontent">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">Silahkan login dulu</div>
						<div class="panel-body">
							<form method="post">
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control">
								</div>
								<button name="btnlogin" class="btn btn-primary">Login</button>
							</form>
							<?php 
								if (isset($_POST["btnlogin"])) {
									$email=$_POST["email"];
									$password=$_POST["password"];

									$ambil=$koneksi->query("SELECT * FROM tb_pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password' ");
									$akunyangcocok=$ambil->num_rows;

									if ($akunyangcocok==1) {
										$akun=$ambil->fetch_assoc();
										$_SESSION["pelanggan"]=$akun;

										echo "<div class='alert alert-info'>Anda berhasil login</div>";
										if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) {
											echo "<meta http-equiv='refresh' content='1;url=checkout.php' >";
										}else{
											echo "<meta http-equiv='refresh' content='1;url=riwayat.php' >";
										}
										
									}else{
										echo "<div class='alert alert-danger'>Anda gagal login</div>";
										echo "<meta http-equiv='refresh' content='1;url=login.php' >";
									}
								}
							 ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
</body>
</html>