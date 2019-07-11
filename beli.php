<?php 
	session_start();
	$id_produk=$_GET['id'];

		// cek jika sudah ada, tinggal +1 jumlahnya
	if (isset($_SESSION['keranjang'][$id_produk])) {

		$_SESSION['keranjang'][$id_produk]+=1;

	}else{

			// tdak ada maka jumlahnya =1
		$_SESSION['keranjang'][$id_produk]=1;
	}
		// echo "<pre>";
		// print_r($_SESSION);
		// echo "<pre>";

	echo "	<script>
				alert('Produk berhasil ditambahkan kedalam keranjang belanja..');
				location='keranjang.php';
			</script>";

?>