<div class="panel-primary">
	<div class="panel-heading">
		<h4 class="panel-title text-center">Form Tambah Pelanggan</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email_pelanggan" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password_pelanggan" class="form-control">
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama_pelanggan" class="form-control">
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input name="telepon_pelanggan" class="form-control">
					</div>
					<div class="form-group pull-right">
						<button class="btn btn-primary" name="btn_simpan">Simpan</button>
						<button class="btn btn-warning" name="btn_reset">Reset</button>
					</div>
				</form>
				<?php 
					if (isset($_POST['btn_simpan'])) {
						
						$nama_pelanggan=$_POST['nama_pelanggan'];
						$email_pelanggan=$_POST['email_pelanggan'];
						$password_pelanggan=$_POST['password_pelanggan'];
						$telepon_pelanggan=$_POST['telepon_pelanggan'];

						$sql=$koneksi->query("INSERT INTO tb_pelanggan (nama_pelanggan,email_pelanggan,password_pelanggan,telepon_pelanggan) VALUES('$nama_pelanggan','$email_pelanggan','$password_pelanggan','$telepon_pelanggan') ") or die(mysqli_error($koneksi));

						if ($sql) {
							echo "	<script>
										alert('Data berhasil ditambahkan..');
										location='index.php?halaman=pelanggan';
									</script>";
						}
					}

				?>
			</div>
		</div>
	</div>
</div>