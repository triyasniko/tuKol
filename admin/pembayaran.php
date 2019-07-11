<?php 
	$id_pembelian=$_GET['id'];
	$ambil=$koneksi->query("SELECT*FROM tb_pembayaran WHERE id_pembelian='$id_pembelian' ");
	$detail=$ambil->fetch_assoc();
 ?>
<div class="panel-heading">
	<h3 class="panel-title">Data Pembayaran</h3>
	<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
</div>
<div class="panel-body">
	<div class="row">
		<div class="col-md-6">
			<table class="table table-responsive table-striped table-bordered">
				<tr>
					<th>Nama</th>
					<td><?php echo $detail['nama']; ?></td>
				</tr>
				<tr>
					<th>Bank</th>
					<td><?php echo $detail['bank']; ?></td>
				</tr>
				<tr>
					<th>Jumlah</th>
					<td><?php echo $detail['jumlah']; ?></td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<td><?php echo $detail['tanggal']; ?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-6">
			<img src="../bukti_pembayaran/<?php echo $detail['bukti']; ?>" class="img-responsive">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form method="post">
				<div class="form-group">
					<label>No Resi Pengiriman</label>
					<input type="text" name="resi" class="form-control">
				</div>
				<div class="form-group">
					<label>Status</label>
					<select class="form-control" name="status">
						<option value="">Pilih status</option>
						<option value="lunas">Lunas</option>
						<option value="barang dikirim">Barang dikirim</option>
						<option value="batal">Batal</option>
					</select>
				</div>
				<button class="btn btn-primary" name="proses">Proses</button>
			</form>
			<?php 
				if (isset($_POST["proses"])) {
					$resi=$_POST["resi"];
					$status=$_POST["status"];

					$koneksi->query("UPDATE tb_pembelian SET resi_pengiriman='$resi',status_pembelian='$status' WHERE id_pembelian='$id_pembelian' ");
					echo "
						<script>
							alert('Data Pembelian terupdate');
							location='index.php?halaman=pembelian';
						</script>
					";
				}
			 ?>
		</div>
	</div>
</div>