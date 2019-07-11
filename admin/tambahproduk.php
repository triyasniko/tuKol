<div class="panel-primary">
	<div class="panel-heading">
		<h4 class="panel-title text-center">Form Tambah Produk</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga (Rp)</label>
						<input type="text" name="harga" class="form-control">
					</div>
					<div class="form-group">
						<label>Berat (Gr)</label>
						<input type="text" name="berat" class="form-control">
					</div>
					<div class="form-group">
						<label>Stok Produk</label>
						<input type="number" name="stok" class="form-control" min="1">
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea name="deskripsi" class="form-control" rows="10"></textarea>
					</div>
					<div class="form-group">
						<label>Foto</label>
						<input type="file" name="foto" class="form-control">
					</div>
					<div class="form-group pull-right">
						<button class="btn btn-primary" name="btn_simpan">Simpan</button>
						<button class="btn btn-warning" name="btn_reset">Reset</button>
					</div>
				</form>
				<?php 
					if (isset($_POST['btn_simpan'])) {
						
						$nama=$_POST['nama'];
						$harga=$_POST['harga'];
						$berat=$_POST['berat'];
						$stok=$_POST['stok'];
						$deskripsi=$_POST['deskripsi'];

						$namafoto=$_FILES['foto']['name'];
						$lokasi=$_FILES['foto']['tmp_name'];
						move_uploaded_file($lokasi, "../foto_produk/".$namafoto);

						$sql=$koneksi->query("INSERT INTO tb_produk (nama_produk,harga_produk,berat_produk,stok_produk,foto_produk,deskripsi_produk) VALUES('$nama','$harga','$berat','$stok','$namafoto','$deskripsi') ") or die(mysqli_error($koneksi));

						if ($sql) {
							echo "	<script>
										alert('Data berhasil ditambahkan..');
										location='index.php?halaman=produk';
									</script>";
						}
					}

				?>
			</div>
		</div>
	</div>
</div>