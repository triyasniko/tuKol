<div class="panel-heading">
	<h3 class="panel-title">Data Produk</h3>
	<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
</div>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
<div class="panel-body">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-resposive table-striped" id="dataTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Harga</th>
						<th>Berat</th>
						<th>Stok</th>
						<th>Foto</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$nomor=1;
						$ambil=$koneksi->query("SELECT*FROM tb_produk");
						while($pecah=$ambil->fetch_assoc()){

					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['nama_produk']; ?></td>
						<td><?php echo $pecah['harga_produk']; ?></td>
						<td><?php echo $pecah['berat_produk']; ?></td>
						<td><?php echo $pecah['stok_produk']; ?></td>
						<td>
							<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
						</td>
						<td>
							<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-xs btn-danger"><i class="lnr lnr-trash"></i></a>
							<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-xs btn-warning"><i class="lnr lnr-pencil"></i></a>
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