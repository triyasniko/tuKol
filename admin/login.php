<?php 
	session_start();
	include 'koneksi.php';
?>	
<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
	<title>Login | tuKol</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/gayaku.css">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="main-content">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-headline">
					<div class="kotak">
						<div class="container-fluid">
							<div class="row">
								<div class="kiri">
									<div class="col-md-6 col-sm-6">
										<img class="img-responsive" id="avatar" src="assets/img/avatar.png">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="kanan">
										<p class="lead text-center">Login to get Acces yourself</p><br>
										<form method="post">
											<div class="form-group input-group">
												<span class="input-group-addon"><i class="fa fa-user" ></i></span>
												<input type="text" name="username" class="form-control" placeholder="username">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon"><i class="fa fa-lock" ></i></span>
												<input type="password" name="password" class="form-control">
											</div>
											<div class="form-group">
												<span>forget</span>
												<a href="#">username / password ?</a>
												<button class="btn btn-primary pull-right" name="btnlogin">Login</button>
											</div>
										</form>
										<?php 
											if (isset($_POST['btnlogin'])) {
												$username=$_POST['username'];
												$password=$_POST['password'];

												$ambil=$koneksi->query("SELECT * FROM tb_admin WHERE username='$username' AND password='$password' ");
												$yangcocok=$ambil->num_rows;

												if ($yangcocok==1) {

													$_SESSION['admin']=$ambil->fetch_assoc();
													echo "<div class='alert alert-info'>Login berhasil</div>";
													echo "<meta http-equiv='refresh' content='1;url=index.php' ";
												}else{
													echo "<div class='alert alert-danger'>Login gagal</div>";
													echo "<meta http-equiv='refresh' content='1;url=login.php' ";
												}
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
