<?php 
	$id=$_GET['id'];

	$sql=$koneksi->query("DELETE FROM tb_pelanggan WHERE id_pelanggan='$id' ");
	if ($sql) {
		echo "	<script>
					alert('Data berhasil dihapus..');
					location='index.php?halaman=pelanggan';
				</script>";
	}
?>