<div class="panel-primary">
	<div class="panel-heading">
		<h4 class="panel-title text-center">Form Ubah Produk</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<?php 
					$id=$_GET['id'];
					$ambil=$koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id' ");
					$pecah=$ambil->fetch_assoc();
					// print_r($pecah);

				 ?>
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
					</div>
					<div class="form-group">
						<label>Harga (Rp)</label>
						<input type="text" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
					</div>
					<div class="form-group">
						<label>Berat (Gr)</label>
						<input type="text" name="berat" class="form-control" value="<?php echo $pecah['berat_produk']; ?>">
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input type="number" name="stok" class="form-control" value="<?php echo $pecah['stok_produk']; ?>">
					</div>
					<div class="form-group">
						<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="200">
					</div>
					<div class="form-group">
						<label>Ganti Foto</label>
						<input type="file" name="foto" class="form-control">
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea name="deskripsi" class="form-control" rows="10">
							<?php echo $pecah['deskripsi_produk']; ?>
						</textarea>
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

						if (!empty($lokasi)) {
							move_uploaded_file($lokasi, "../foto_produk/".$namafoto);
							$sql=$koneksi->query("UPDATE tb_produk SET nama_produk='$nama',harga_produk='$harga',berat_produk='$berat',stok_produk='$stok',foto_produk='$namafoto',deskripsi_produk='$deskripsi' WHERE id_produk='$id' ") or die(mysqli_error($koneksi));
						}else{
							$sql=$koneksi->query("UPDATE tb_produk SET nama_produk='$nama',harga_produk='$harga',berat_produk='$berat',stok_produk='$stok',deskripsi_produk='$deskripsi' WHERE id_produk='$id' ") or die(mysqli_error($koneksi));
						}
						

						if ($sql) {
							echo "	<script>
										alert('Data berhasil diubah..');
										location='index.php?halaman=produk';
									</script>";
						}
					}

				?>
			</div>
		</div>
	</div>
</div>