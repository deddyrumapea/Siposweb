<!DOCTYPE html>
<html>
<head>
	<title>Transaksi - SIPOSWEB</title>
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
					<th>Keterangan</th>
					<th>Aksi</th>
				</tr>
				<tr>
					<td>1</td>
					<td>54IZBC4SUA</td>
					<td>01/11/2020 09:20AM</td>
					<td>Rp27,500.00</td>
					<td></td>
					<td><a href="#" class="action-edit"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="action-hapus"><i class="fas fa-trash"></i> Hapus</a></td>
				</tr>
			</table>
			<button class="btn btn-page-nav"><i class="fas fa-angle-left"></i> Sebelumnya</button>
			<button class="btn btn-page-nav">Selanjutnya <i class="fas fa-angle-right"></i></button>
		</div>
	</main>

	<footer>
		<p>&copy 2020 Deddy Romnan Rumapea</p>
	</footer>
	<script type="text/javascript" src="assets/js/produk.js"></script>
	<script src="https://kit.fontawesome.com/6606a30803.js" crossorigin="anonymous"></script>
</body>
</html>