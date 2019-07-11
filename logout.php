<?php 
	session_start();
	session_destroy();
	echo "<script>
			alert('logout berhasil');
			location='login.php';
		</script>";
 ?>