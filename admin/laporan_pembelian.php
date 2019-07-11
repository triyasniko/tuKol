<?php 
	$semuadata=array();
	$tgl_mulai="-";
	$tgl_selesai="-";

	if (isset($_POST["kirim"])) {
		$tgl_mulai=$_POST["tglm"];
		$tgl_selesai=$_POST["tgls"];

		$ambil=$koneksi->query("SELECT*FROM tb_pembelian pm LEFT JOIN tb_pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");

		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		// echo "<pre>";
		// print_r($semuadata);
		// echo "</pre>";
	}
?>
<div class="panel-heading">
	<h3 class="text-center">Laporan Pembelian dari <?php echo $tgl_mulai; ?> hingga <?php echo $tgl_selesai ?></h3>
	<hr>
</div>
<div class="panel-body">
	<div class="row">
		<form method="post">
			<div class="col-md-5">
				<div class="form-group">
					<label>Tanggal Mulai : </label>
					<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai; ?>">
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group">
					<label>Tanggal Selesai : </label>
					<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai; ?>">
				</div>
			</div>
			<div class="col-md-2">
				<label>&nbsp;</label><br>
				<button class="btn btn-primary" name="kirim">Lihat</button>
			</div>
		</form>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Pelanggan</th>
						<th>Tanggal</th>
						<th>Jumlah</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$total =0;
						foreach ($semuadata as $key => $value):
						$total+=$value["total_pembelian"]; ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nama_pelanggan"]; ?></td>
							<td><?php echo $value["tanggal_pembelian"]; ?></td>
							<td>Rp. <?php echo number_format($value ["total_pembelian"]);?></td>
							<td><?php echo $value["status_pembelian"]; ?></td>

						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="3">Total :</th>
						<th colspan="2"><?php echo number_format($total); ?></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>