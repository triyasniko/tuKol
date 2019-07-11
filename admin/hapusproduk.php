<?php 
	$id=$_GET['id'];
	$ambil=$koneksi->query("SELECT*FROM tb_produk WHERE id_produk='$id' ");
	$pecah=$ambil->fetch_assoc();
	$fotoproduk=$pecah['foto_produk'];

	if (file_exists("../foto_produk/$fotoproduk")) {
		unlink("../foto_produk/$fotoproduk");
	}

	$sql=$koneksi->query("DELETE FROM tb_produk WHERE id_produk='$id' ");
	if ($sql) {
		echo "	<script>
					alert('Data berhasil dihapus..');
					location='index.php?halaman=produk';
				</script>";
	}
?>