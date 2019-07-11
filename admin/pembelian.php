<div class="panel-heading">
	<h3 class="panel-title">Data Pembelian</h3>
	<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
</div>
<div class="panel-body">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-resposive table-striped" id="dataTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pelanggan</th>
						<th>Tanggal</th>
						<th>Status Pembelian</th>
						<th>Total</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$nomor=1;
						$ambil=$koneksi->query("SELECT*FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan");
						while($pecah=$ambil->fetch_assoc()){

					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama_pelanggan']; ?></td>
						<td><?php echo $pecah['tanggal_pembelian']; ?></td>
						<td><?php echo $pecah['status_pembelian']; ?></td>
						<td><?php echo $pecah['total_pembelian']; ?></td>
						<td>
							<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-xs btn-info"><i class="lnr lnr-location">&nbsp;Detail</i></a>
							<?php if ($pecah['status_pembelian']!=="pending"): ?>
							<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-xs btn-success"><i class="fa fa-money">&nbsp;Pembayaran</i></a>
							<?php endif ?>
						</td>
					</tr>
					<?php 
						$nomor++;
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>