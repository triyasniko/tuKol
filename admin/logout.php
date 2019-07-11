<?php 
	session_start();
	session_destroy();
	echo "<script>
			alert('Anda berhasil logout');
			location='index.php';
		</script>";
?>