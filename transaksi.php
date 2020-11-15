<?php 
require 'functions.php';

// INIT TRANSAKSI VARIABLES
$transaksi = "";
$transaksi_id = "";
$transaksi_tanggal = date("Y-m-d H:i:s", time());
$transaksi_total = "";
$transaksi_bayar = "";
$transaksi_kembalian = "";

// INIT PRODUK VARIABLES
$produk = "";
$produk_nama = "";
$produk_harga = "";
$produk_stock = "";


if (isset($_GET["id"])) {
	$transaksi_id = $_GET["id"];
	$transaksi = queryRead("SELECT * FROM laporan_transaksi WHERE id = '$transaksi_id'")[0];
	$transaksi_tanggal = $transaksi["tanggal"];
	$transaksi_total = $transaksi["total"];
	$transaksi_bayar = $transaksi["bayar"];
	$transaksi_kembalian = $transaksi["kembalian"];
} else {
	// Create new transaksi id
	do {
		$transaksi_id = "TRX-".strtoupper(bin2hex(random_bytes(3)));
	} while (sizeof(queryRead("SELECT * FROM laporan_transaksi WHERE id='$transaksi_id'")) > 0);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Transaksi - SIPOSWEB</title>
	<link rel="stylesheet" type="text/css" href="assets/styles/reset.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/transaksi.js"></script>
	<script src="https://kit.fontawesome.com/6606a30803.js" crossorigin="anonymous"></script>
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
				<table>
					<tr>
						<th>
							<label for="id-produk">ID Produk : </label>
						</th>
						<td>
							<input type="text" id="id-produk" name="id-produk-input" style="width: 80%;" value="<?= isset($produk_id) ? $produk_id : ""; ?>" required>
							<button onclick="searchProduk()" id="btn-search" class="btn btn-search"><i class="fas fa-search"></i></button>
						</td>
					</tr>

					<tr>
						<th>
							<label for="nama-produk">Nama Produk : </label>
						</th>
						<td>
							<input type="text" id="nama-produk" name="nama-produk" class="readonly" value="<?= $produk_nama; ?>" readonly required>
						</td>
					</tr>
					<tr>
						<th>
							<label for="harga">Harga (Rp) : </label>
						</th>
						<td>
							<input type="text" id="harga" name="harga" class="readonly" value="<?= $produk_harga; ?>" readonly required>
						</td>
					</tr>
					<tr>
						<th>
							<label for="quantitiy">Quantity : </label>
						</th>
						<td>
							<input type="number" onkeyup="hitungSubTotal()" min="1" id="quantitiy" name="quantitiy" style="width: 41%" <?php if (isset($produk_id)): ?>
							required
							<?php endif ?>>
							<input type="text" id="stock" class="readonly" style="width: 40%" value="<?= $produk_stock; ?>" readonly>
						</td>
					</tr>
					<tr>
						<th>
							<label for="subtotal">Subtotal (Rp) : </label>
						</th>
						<td>
							<input type="text" id="subtotal" name="subtotal" class="readonly" required readonly>
						</td>
					</tr>
				</table>
				<button type="submit" name="tambah-produk-dibeli" class="btn btn-tambah-produk">
					<i class="fas fa-plus-circle"></i> Tambahkan
				</button>
			</div>

			<div class="ringkasan-transaksi">
				<form action="#">
					<table>
						<tr>
							<th>
								<label for="id-transaksi">ID Transaksi : </label>
							</th>
							<th>
								<input type="text" id="id-transaksi" class="readonly" value="<?= $transaksi_id; ?>" readonly>
							</th>
						</tr>

						<tr>
							<th>
								<label for="tanggal">Tanggal : </label>
							</th>
							<th>
								<input type="text" id="tanggal" class="readonly" value="<?= $transaksi_tanggal; ?>" readonly>
							</th>
						</tr>
						<tr>
							<th>
								<label for="total">Total (Rp) : </label>
							</th>
							<td>
								<input type="text" id="total" class="readonly" value="<?= $transaksi_total; ?>" readonly>
							</td>
						</tr>
						<tr>
							<th>
								<label for="bayar">Bayar (Rp) : </label>
							</th>
							<td>
								<input type="number" id="bayar" value="<?= $transaksi_bayar; ?>">
							</td>
						</tr>
						<tr>
							<th>
								<label for="kembalian">Kembalian (Rp) : </label>
							</th>
							<td>
								<input type="text" id="kembalian" class="readonly" value="<?= $transaksi_kembalian; ?>" readonly>
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
</body>
</html>