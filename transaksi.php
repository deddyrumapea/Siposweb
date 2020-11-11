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
				<li><a class="active" href="transaksi.php"><i class="fa fa-shopping-cart"></i> Transaksi</a></li>
				<li><a href="produk.php"><i class="fas fa-box-open"></i> Produk</a></li>
				<li><a href="laporan.php"><i class="fas fa-clipboard-list"></i> Laporan</a></li>
				<li><a href="#"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<div class="cf">
			<div class="tambah-produk">
				<form action="#">
					<table>
						<tr>
							<th>
								<label for="id-produk">ID Produk : </label>
							</th>
							<td>
								<input type="text" id="id-produk" style="width: 80%;">
								<button class="btn btn-search"><i class="fas fa-search"></i></button>
							</td>
						</tr>
						<tr>
							<th>
								<label for="nama-produk">Nama Produk : </label>
							</th>
							<td>
								<input type="text" id="nama-produk" class="readonly" readonly>
							</td>
						</tr>
						<tr>
							<th>
								<label for="harga">Harga (Rp) : </label>
							</th>
							<td>
								<input type="text" id="harga" class="readonly" readonly>
							</td>
						</tr>
						<tr>
							<th>
								<label for="quantitiy">Quantity : </label>
							</th>
							<td>
								<input type="text" id="quantitiy" style="width: 41%">
								<input type="text" id="stock" class="readonly" style="width: 40%" readonly>
							</td>
						</tr>
						<tr>
							<th>
								<label for="subtotal">Subtotal (Rp) : </label>
							</th>
							<td>
								<input type="text" id="subtotal" class="readonly" readonly>
							</td>
						</tr>
					</table>
					<button type="submit" class="btn btn-tambah-produk">
						<i class="fas fa-plus-circle"></i> Tambahkan
					</button>
				</form>
			</div>

			<div class="ringkasan-transaksi">
				<form action="#">
					<table>
						<tr>
							<th>
								<label for="tanggal">Tanggal : </label>
							</th>
							<th>
								<input type="text" id="tanggal" class="readonly" readonly>
							</th>
						</tr>
						<tr>
							<th>
								<label for="total">Total (Rp) : </label>
							</th>
							<td>
								<input type="text" id="tanggal" class="readonly" readonly>
							</td>
						</tr>
						<tr>
							<th>
								<label for="bayar">Bayar (Rp) : </label>
							</th>
							<td>
								<input type="text" id="bayar">
							</td>
						</tr>
						<tr>
							<th>
								<label for="kembalian">Kembalian (Rp) : </label>
							</th>
							<td>
								<input type="text" id="kembalian" class="readonly" readonly>
							</td>
						</tr>
					</table>
				</form>
				<button type="submit" class="btn btn-check-out" id="btn-check-out"><i class="fas fa-cash-register"></i> Check Out</button>
			</div>
		</div>
		<table class="dibeli">
			<tr>
				<th>No</th>
				<th>ID Produk</th>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Quantity</th>
				<th>Subtotal</th>
				<th>Aksi</th>
			</tr>
			<tr>
				<td>1</td>
				<td>P723</td>
				<td>Terasi Udang Mamasuka 120g</td>
				<td>Rp1,200.00</td>
				<td>2</td>
				<td>Rp2,400.00</td>
				<td><a href="#" class="action-hapus"><i class="fas fa-trash"></i> Hapus</a></td>
			</tr>
		</table>

		<div id="modal-transaction-added" class="modal">
			<!-- Modal content -->
			<div class="modal-content modal-success">
				<div class="success-notification">
					<i class="fas fa-check-circle notification-icon"></i>
					<p class="success-notification-text">Transaksi berhasil ditambahkan!</p>
					<button class="btn btn-confirmation" id="btn-confirmation">Selesai</button>
				</div>
			</div>
		</div>
	</main>

	<footer>
		<p>&copy 2020 Deddy Romnan Rumapea</p>
	</footer>
	<script type="text/javascript" src="assets/js/transaksi.js"></script>
	<script src="https://kit.fontawesome.com/6606a30803.js" crossorigin="anonymous"></script>
</body>
</html>