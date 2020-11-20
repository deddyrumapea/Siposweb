<?php 
require 'functions.php';
$transaksi = queryRead("SELECT * FROM laporan_transaksi");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Laporan - SIPOSWEB</title>
	<link rel="shortcut icon" type="image/ico" href="assets/images/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="assets/styles/reset.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/style.css">
</head>

<body>
	<header>
		<nav class="nav-menu">
			<ul>
				<h1 class="logo"><a href="#" title="SIPOSWEB"><img src="assets/images/logo.png" alt="SIPOSWEB" height="35px"></a></h1>
				<li><a href="transaksi.php"><i class="fa fa-shopping-cart"></i> Transaksi</a></li>
				<li><a href="produk.php"><i class="fas fa-box-open"></i> Produk</a></li>
				<li><a class="active" href="laporan.php"><i class="fas fa-clipboard-list"></i> Laporan</a></li>
				<li><a href="#"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<div class="content-laporan">
			<form action="" class="form-data-count">
				<input type="text" value="15" class="input-data-count" id="input-data-count">
				<label for="input-data-count"> data per halaman</label>
			</form>
			<a href="transaksi.php">
				<button class="btn btn-tambahkan-transaksi">
					<i class="fas fa-plus-circle"></i> Tambahkan Transaksi
				</button>
			</a>

			<table class="table-laporan">
				<tr>
					<th>No</th>
					<th>ID Transaksi</th>
					<th>Tanggal</th>
					<th>Total</th>
					<th>Pembayaran</th>
					<th>Kembalian</th>
					<th>Aksi</th>
				</tr>

				<?php $i = 1; ?>
				<?php foreach ($transaksi as $row) : ?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $row["id"]; ?></td>
						<td><?= $row["tanggal"]; ?></td>
						<td>Rp<?=number_format($row["total"], 2, ",", "."); ?></td>
						<td><?= $row["bayar"]; ?></td>
						<td><?= $row["kembalian"]; ?></td>
						<td>
							<a href="transaksi.php?id=<?= $row["id"]; ?>" class="action-edit"><i class="fas fa-edit"></i> Edit</a> 
							<a id="btn-hapus-produk" href="#" class="action-hapus" onclick="hapusTransaksi('<?= $row["id"];?>')"><i class="fas fa-trash"></i> Hapus</a>
						</td>
					</tr>
					<?php $i++; ?>
				<?php endforeach; ?>

			</table>
			<button class="btn btn-page-nav"><i class="fas fa-angle-left"></i> Sebelumnya</button>
			<button class="btn btn-page-nav">Selanjutnya <i class="fas fa-angle-right"></i></button>
		</div>

		<div id="modal-delete" class="modal">
			<!-- Modal content -->
			<div class="modal-content modal-notification">
				<div class="notification">
					<i class="fas fa-exclamation-triangle notification-icon" style="color: #BA2929"></i>
					<p class="notification-text">Hapus transaksi dari daftar?</p>
					<button class="btn btn-batal" id="btn-confirmation">Batal</button>
					<a id="btn-confirm-hapus"><button class="btn btn-hapus">Hapus</button></a>
				</div>
			</div>
		</div>
	</main>

	<footer>
		<p>&copy 2020 Deddy Romnan Rumapea</p>
	</footer>
	<script type="text/javascript" src="assets/js/laporan.js"></script>
	<script src="https://kit.fontawesome.com/6606a30803.js" crossorigin="anonymous"></script>
</body>
</html>