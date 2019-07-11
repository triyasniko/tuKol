<div class="panel-heading">
	<h3 class="panel-title">Data Pelanggan</h3>
	<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
</div>
<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
<div class="panel-body">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-resposive table-striped" id="dataTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Telepon</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$nomor=1;
						$ambil=$koneksi->query("SELECT*FROM tb_pelanggan");
						while($pecah=$ambil->fetch_assoc()){

					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama_pelanggan']; ?></td>
						<td><?php echo $pecah['email_pelanggan']; ?></td>
						<td><?php echo $pecah['telepon_pelanggan']; ?></td>
						<td>
							<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan']; ?>"" class="btn btn-xs btn-danger"><i class="lnr lnr-trash"></i></a>
							<a href="index.php?halaman=ubahpelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-xs btn-warning"><i class="lnr lnr-pencil"></i></a>
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