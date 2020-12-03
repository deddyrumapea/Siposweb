<?php 
session_start();

if( !isset($_SESSION["login"]) ){
	header("Location: index.php");
	exit();
}

require 'functions/functions.php';

// Menampilkan list transaksi
$jumlahDataPerHalaman = (isset($_GET["count"]) && $_GET["count"] >= 5)? $_GET["count"] : 15;
$jumlahData = (int) queryRead("SELECT COUNT(id) AS jumlah_data FROM laporan_transaksi")[0]["jumlah_data"];
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData = $jumlahDataPerHalaman * ($halamanAktif - 1);

$transaksi = queryRead("SELECT * FROM laporan_transaksi ORDER BY tanggal DESC LIMIT $awalData, $jumlahDataPerHalaman");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Laporan - SIPOSWEB</title>
	<link rel="shortcut icon" type="image/ico" href="assets/images/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="assets/styles/reset.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<header>
		<nav class="nav-menu">
			<ul>
				<h1 class="logo"><a href="#" title="SIPOSWEB"><img src="assets/images/logo.png" alt="SIPOSWEB" height="35px"></a></h1>
				<li><a href="transaksi.php"><i class="fa fa-shopping-cart"></i> Transaksi</a></li>
				<li><a href="produk.php"><i class="fas fa-box-open"></i> Produk</a></li>
				<li><a class="active" href="laporan.php"><i class="fas fa-clipboard-list"></i> Laporan</a></li>
				<li><a href="Pengaturan.php"><i class="fas fa-user-cog"></i> Pengaturan</a></li>
				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<div class="content-laporan">
			<form action="" method="get" class="form-data-count">
				<input type="number" min="5" value="<?= $jumlahDataPerHalaman; ?>" class="input-data-count" id="input-data-count" name="count">
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

				<?php $i = ($halamanAktif == 1) ? 1 : ($halamanAktif - 1) * $jumlahDataPerHalaman + 1; ?>
				<?php foreach ($transaksi as $row) : ?>
					<tr>
						<td style="text-align: center;"><?= $i ?></td>
						<td onclick="copyIdTransaksi(this)" style="cursor: pointer;">
							<i class="far fa-copy" style="color: lightgrey; margin-right: 5px;"></i>
							<?= $row["id"]; ?>
						</td>
						<td><?= $row["tanggal"]; ?></td>
						<td>Rp<?=number_format($row["total"], 0, ",", "."); ?></td>
						<td>Rp<?=number_format($row["bayar"], 0, ",", "."); ?></td>
						<td>Rp<?=number_format($row["kembalian"], 0, ",", "."); ?></td>
						<td style="text-align: center;">
							<a href="#" class="action-detail" onclick="showDetail('<?= $row["id"]; ?>')"><i class="far fa-eye"></i> Detail</a>
							<a id="btn-hapus-transaksi" href="#" class="action-hapus" onclick="hapusTransaksi('<?= $row["id"];?>')"><i class="fas fa-trash"></i> Hapus</a>
						</td>
					</tr>
					<?php $i++; ?>
				<?php endforeach; ?>

			</table>
			<a href="<?= ($halamanAktif > 1) ? "?count=$jumlahDataPerHalaman&page=".($halamanAktif - 1) : "#"; ?>" class="btn btn-page-nav"><i class="fas fa-angle-left"></i> Sebelumnya</a>
			<?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
				<a href="?count=<?= $jumlahDataPerHalaman; ?>&page=<?= $i; ?>" class="btn btn-page-nav <?php if($i == $halamanAktif): ?>number-active<?php endif; ?>">
					<?= $i; ?>
				</a>
			<?php endfor; ?>
			<a href="<?= ($halamanAktif < $jumlahHalaman) ? "?count=$jumlahDataPerHalaman&page=".($halamanAktif + 1) : "#"; ?>" class="btn btn-page-nav">Selanjutnya <i class="fas fa-angle-right"></i></a>
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

		<div id="modal-laporan" class="modal">
			<!-- Modal content -->
			<div class="modal-content cf">
				<div class="form-penambahan-produk">
					<form action="" method="">
						<table>
							<tr>
								<th>
									<label for="id-transaksi">ID Transaksi : </label>
								</th>
								<td>
									<input type="text" id="id-transaksi" name="id-transaksi"  class="readonly" readonly>
								</td>
							</tr>
							<tr>
								<th>
									<label for="tanggal">Tanggal : </label>
								</th>
								<td>
									<input type="text" id="tanggal" name="tanggal" class="readonly" readonly>
								</td>
							</tr>
							<tr>
								<th>
									<label for="total">Total : </label>
								</th>
								<td>
									<input type="text" id="total" name="total" class="readonly" readonly>
								</td>
							</tr>
							<tr>
								<th>
									<label for="bayar">Bayar : </label>
								</th>
								<td>
									<input type="text" id="bayar" name="bayar" class="readonly"  readonly>
								</td>
							</tr>
							<tr>
								<th>
									<label for="kembalian">Kembalian : </label>
								</th>
								<td>
									<input type="text" id="kembalian" name="kembalian" class="readonly" readonly>
								</td>
							</tr>
						</table>
					</form>
				</div>
				<table id="tabel-produk-dibeli" class="table-laporan" style="margin: 20px 0 0">
					<thead>
						<tr>
							<th>ID Produk</th>
							<th>Nama Produk</th>
							<th>Quantity</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<button onclick="tutupModal();" class="btn btn-check-out" id="close-modal"><i class="fas fa-check-circle"></i> Tutup</button>
			</div>
		</div>
	</main>

	<footer>
		<p>&copy 2020 Tim Siposweb</p>
	</footer>
	<script type="text/javascript" src="assets/js/laporan.js"></script>
	<script src="https://kit.fontawesome.com/6606a30803.js" crossorigin="anonymous"></script>
</body>
</html>