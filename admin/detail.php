<div class="panel-heading">
	<h3 class="panel-title">Detail Produk</h3>
	<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
</div>
<div class="panel-body">
	<div class="row">
		<?php 
			$id=$_GET['id'];
			$ambil=$koneksi->query("SELECT*FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan WHERE id_pembelian='$id' ");
			$detail=$ambil->fetch_assoc();

			?>
			<!-- <pre><?php //print_r($detail); ?></pre> -->
			
			
		<div class="col-md-4">
			<h3>Pembelian</h3>
			<p>
				tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
				Total : Rp.<?php echo number_format($detail['total_pembelian']); ?><br>
				Status : <?php echo $detail['status_pembelian']; ?>
			</p>
		</div>
		<div class="col-md-4">
			<h3>Pelanggan</h3>
			<strong><?php echo $detail['nama_pelanggan']; ?></strong>
			<p>
				<?php echo $detail['telepon_pelanggan']; ?>
				<?php echo $detail['email_pelanggan']; ?><br>
			</p>
		</div>
		<div class="col-md-4">
			<h3>Pengiriman</h3>
			<strong><?php echo $detail["nama_kota"]; ?></strong><br>
			<p>
				Tarif : Rp.<?php echo number_format($detail["tarif"]); ?><br>
				Alamat : <?php echo $detail["alamat_pengiriman"]; ?>
			</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-resposive table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$nomor=1;
					$ambil=$koneksi->query("SELECT*FROM tb_pembelian_produk JOIN tb_produk ON tb_pembelian_produk.id_produk=tb_produk.id_produk WHERE tb_pembelian_produk.id_pembelian='$_GET[id]' ");
					while($pecah=$ambil->fetch_assoc()){

						?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah['nama_produk']; ?></td>
							<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
							<td><?php echo $pecah['jumlah']; ?></td>
							<td>
								Rp. <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']); ?>
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