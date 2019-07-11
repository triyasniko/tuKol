<div class="panel-heading">
	<h3 class="panel-title">Setting Profil</h3>
	<p class="panel-subtitle">Silahkan lakukan perubahan sesuai yang diinginkan</p>
	<hr>
</div>
<div class="panel-body">
	<?php 
		$id_admin=$_SESSION["admin"]["id_admin"];
		$ambil=$koneksi->query("SELECT*FROM tb_admin WHERE id_admin='$id_admin' ");
		$pecah=$ambil->fetch_assoc();
		// echo "<pre>";
		// print_r($pecah);
		// echo "</pre>";
	 ?>
	<form method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-3">
				<div class="thumbnail text-center">
					<img src="assets/img/<?php echo $pecah['foto_admin']; ?>" width="200">
				</div>
			</div>
			<div class="col-md-9">
				<div class="form-group">
					<label>Ganti Foto</label>
					<input type="file" name="foto" class="form-control">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" placeholder="<?php echo $pecah['username']; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" class="form-control" placeholder="<?php echo $pecah['nama_lengkap']; ?>">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group pull-right">
					<button class="btn btn-primary" name="save">Save</button>
					<button class="btn btn-default" type="reset">Reset</button>
				</div>
			</div>
		</div>
	</form>
	<?php 
		if (isset($_POST["save"])) {
			
			$username=$_POST["username"];
			$password=$_POST["password"];
			$nama=$_POST["nama"];
			$namafoto=$_FILES["foto"]["name"];
			$lokasi=$_FILES["foto"]["tmp_name"];

			if (!empty($lokasi)) {
				move_uploaded_file($lokasi, "assets/img/".$namafoto);
				$sql=$koneksi->query("UPDATE tb_admin SET username='$username',password='$password',nama_lengkap='$nama',foto_admin='$namafoto' WHERE id_admin='$id_admin' ");
			}else{
				$sql=$koneksi->query("UPDATE tb_admin SET username='$username',password='$password',nama_lengkap='$nama' WHERE id_admin='$id_admin' ");
			}

			if ($sql) {
				echo "	<script>
							alert('Data berhasil diubah..');
							location='index.php';
						</script>";
			}
		}
	 ?>
</div>
<div class="panel-footer"></div>