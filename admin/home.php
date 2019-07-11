<div class="panel-heading">
	<h3 class="panel-title">Weekly Overview</h3>
	<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
</div>
<div class="panel-body">
	<div class="row">
		<div class="col-md-3">
			<div class="metric">
				<span class="icon"><i class="fa fa-paper-plane-o"></i></span>
				<p>
					<?php 
						$sql_pdk=$koneksi->query("SELECT*FROM tb_produk");
						$pecah_pdk=$sql_pdk->num_rows;
					 ?>
					<span class="number"><?php echo $pecah_pdk; ?></span>
					<span class="title">Produk</span>
				</p>
			</div>
		</div>
		<div class="col-md-3">
			<div class="metric">
				<span class="icon"><i class="fa fa-shopping-bag"></i></span>
				<p>
					<?php 
						$sql_pmb=$koneksi->query("SELECT*FROM tb_pembelian");
						$pecah_pmb=$sql_pmb->num_rows;
					 ?>
					<span class="number"><?php echo $pecah_pmb; ?></span>
					<span class="title">Pembelian</span>
				</p>
			</div>
		</div>
		<div class="col-md-3">
			<div class="metric">
				<span class="icon"><i class="fa fa-lock"></i></span>
				<p>
					<?php 
						$sql_adm=$koneksi->query("SELECT*FROM tb_admin");
						$pecah_adm=$sql_adm->num_rows;
					 ?>
					<span class="number"><?php echo $pecah_adm; ?></span>
					<span class="title">Petugas</span>
				</p>
			</div>
		</div>
		<div class="col-md-3">
			<div class="metric">
				<span class="icon"><i class="fa fa-user"></i></span>
				<p>
					<?php 
						$sql_plg=$koneksi->query("SELECT*FROM tb_pelanggan");
						$pecah_plg=$sql_pmb->num_rows;
					 ?>
					<span class="number"><?php echo $pecah_plg; ?></span>
					<span class="title">Pelanggan</span>
				</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<!-- REALTIME CHART -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">System Load</h3>
				</div>
				<div class="panel-body">
					<div id="system-load" class="easy-pie-chart" data-percent="70">
						<span class="percent">70</span>
					</div>
					<h4>CPU Load</h4>
					<ul class="list-unstyled list-justify">
						<li>High: <span>95%</span></li>
						<li>Average: <span>87%</span></li>
						<li>Low: <span>20%</span></li>
						<li>Threads: <span>996</span></li>
						<li>Processes: <span>259</span></li>
					</ul>
				</div>
			</div>
			<!-- END REALTIME CHART -->
		</div>
		<div class="col-md-6">
			<!-- VISIT CHART -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Website Visits</h3>
				</div>
				<div class="panel-body">
					<div id="visits-chart" class="ct-chart"></div>
				</div>
			</div>
			<!-- END VISIT CHART -->
		</div>
	</div>
</div>
