<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">tuKol</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="keranjang.php">Keranjang</a></li>
			<?php if (isset($_SESSION["pelanggan"])): ?>
			<li><a href="riwayat.php">Riwayat</a></li>
			<li><a href="logout.php">Logout</a></li>
			<?php else: ?>
			<li><a href="login.php">Login</a></li>
			<li><a href="daftar.php">Daftar</a></li>
			<?php endif ?>
			<li><a href="checkout.php">Checkout</a></li>
		</ul>

		<form action="pencarian.php" method="get" class="navbar-form navbar-right">
			<div class="input-group">
				<input type="text" name="keyword" class="form-control">
				<div class="input-group-btn">
					<button class="btn btn-info" >Cari</button>
				</div>
			</div>
		</form>
	</div>
</nav>