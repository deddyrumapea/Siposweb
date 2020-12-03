<?php
session_start();

if( !isset($_SESSION["login"]) ){
	header("Location: index.php");
	exit();
}

require 'functions/functions.php';

// Cek apakah tombol submit sudah ditekan
if (isset($_POST["tambah_produk_btn"])) {
	// Ambil data dari setiap elemen dalam form
	$id = $_POST["id-produk"];
	$nama = $_POST["nama-produk"];
	$harga = $_POST["harga"];
	$stock = $_POST["stock"];

	// Query insert data
	$query = "INSERT INTO produk VALUES ('$id', '$nama', $harga, $stock)";

	$isSuccessfullyAdded = queryCreate($query);
}

// Cek apakah tombol edit sudah ditekan
if (isset($_POST["edit_produk_btn"])) {
	// Ambil data dari setiap elemen dalam form
	$id = $_POST["id-produk"];
	$nama = $_POST["nama-produk"];
	$harga = $_POST["harga"];
	$stock = $_POST["stock"];

	// Query insert data
	$query = "UPDATE produk SET nama = '$nama', harga = $harga, stock = $stock WHERE id = '$id'";

	queryUpdate($query);
}

// Menampilkan list produk
$jumlahDataPerHalaman = (isset($_GET["count"]) && $_GET["count"] >= 5)? $_GET["count"] : 15;
$jumlahData = (int) queryRead("SELECT COUNT(id) AS jumlah_data FROM produk")[0]["jumlah_data"];
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData = $jumlahDataPerHalaman * ($halamanAktif - 1);

$produk = queryRead("SELECT * FROM produk ORDER BY nama LIMIT $awalData, $jumlahDataPerHalaman");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Produk - SIPOSWEB</title>
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
				<li><a class="active" href="produk.php"><i class="fas fa-box-open"></i> Produk</a></li>
				<li><a href="laporan.php"><i class="fas fa-clipboard-list"></i> Laporan</a></li>
				<li><a href="Pengaturan.php"><i class="fas fa-user-cog"></i> Pengaturan</a></li>
				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<div class="content-produk">
			<form action="" method="get" class="form-data-count">
				<input type="number" min="5" value="<?= $jumlahDataPerHalaman; ?>" class="input-data-count" id="input-data-count" name="count">
				<label for="input-data-count"> data per halaman</label>
			</form>
			<button class="btn btn-tambahkan-produk" id="btn-tambahkan-produk"><i class="fas fa-plus-circle"></i> Tambah Produk</i></button>

			<table class="table-produk">
				<tr>
					<th>No</th>
					<th>ID Produk</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Stock</th>
					<th>Aksi</th>
				</tr>

				<?php $i = ($halamanAktif == 1) ? 1 : ($halamanAktif - 1) * $jumlahDataPerHalaman + 1; ?>
				<?php foreach ($produk as $row) : ?>
					<tr>
						<td style="text-align: center;"><?= $i; ?></td>
						<td onclick="copyIdProduk(this)" style="cursor: pointer;">
							<i class="far fa-copy" style="color: lightgrey; margin-right: 5px;"></i><?=$row["id"]; ?>
						</td>
						<td><?=$row["nama"]; ?></td>
						<td>Rp<?=number_format($row["harga"], 0, ",", "."); ?></td>
						<td style="text-align: center;"><?=$row["stock"]; ?></td>
						<td style="text-align: center;">
							<a href="#" class="action-edit" onclick="var data = ['<?= $row["id"]; ?>', '<?=$row["nama"]; ?>', <?= $row["harga"] ?>, <?=$row["stock"]; ?>]; editProduk(data);"><i class="fas fa-edit"></i> Edit</a> 
							<a id="btn-hapus-produk" href="#" class="action-hapus" onclick="hapusProduk('<?= $row["id"];?>')"><i class="fas fa-trash"></i> Hapus</a>
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

		<div id="modal-tambah-produk" class="modal">
			<!-- Modal content -->
			<div class="modal-content cf">
				<div class="form-penambahan-produk">
					<form action="" method="post">
						<table>
							<tr>
								<th>
									<label for="id-produk">ID Produk : </label>
								</th>
								<td>
									<?php  
									$generatedId = "";

									// Generate new Product Id
									do {
										$generatedId = "PRD-".strtoupper(bin2hex(random_bytes(3)));
									} while (sizeof(queryRead("SELECT * FROM produk WHERE id='$generatedId'")) > 0);
									?>
									<input type="text" id="id-produk" name="id-produk" value="<?= $generatedId; ?>" class="readonly" readonly>
								</td>
							</tr>
							<tr>
								<th>
									<label for="nama-produk">Nama : </label>
								</th>
								<td>
									<input type="text" id="nama-produk" name="nama-produk" required>
								</td>
							</tr>
							<tr>
								<th>
									<label for="harga">Harga (Rp) : </label>
								</th>
								<td>
									<input type="number" id="harga" name="harga" min="1" required>
								</td>
							</tr>
							<tr>
								<th>
									<label for="stock">Stock : </label>
								</th>
								<td>
									<input type="number" id="stock" name="stock" min="1" required>
								</td>
							</tr>
						</table>
						<button type="submit" name="tambah_produk_btn" class="btn btn-tambah-produk" id="submit-produk"><i class="fas fa-plus-circle"></i> Tambahkan Produk</button>
					</form>
				</div>
			</div>
		</div>

		<div id="modal-edit-produk" class="modal">
			<!-- Modal content -->
			<div class="modal-content cf">
				<div class="form-penambahan-produk">
					<form action="" method="post">
						<table>
							<tr>
								<th>
									<label for="id-produk">ID Produk : </label>
								</th>
								<td>
									<?php  
									$generatedId = "";

									// Generate new Product Id
									do {
										$generatedId = "PRD-".strtoupper(bin2hex(random_bytes(3)));
									} while (sizeof(queryRead("SELECT * FROM produk WHERE id='$generatedId'")) > 0);
									?>
									<input type="text" id="id-produk" name="id-produk" value="<?= $generatedId; ?>" class="readonly" readonly>
								</td>
							</tr>
							<tr>
								<th>
									<label for="nama-produk">Nama : </label>
								</th>
								<td>
									<input type="text" id="nama-produk" name="nama-produk" required>
								</td>
							</tr>
							<tr>
								<th>
									<label for="harga">Harga (Rp) : </label>
								</th>
								<td>
									<input type="number" id="harga" name="harga" min="1" required>
								</td>
							</tr>
							<tr>
								<th>
									<label for="stock">Stock : </label>
								</th>
								<td>
									<input type="number" id="stock" name="stock" min="1" required>
								</td>
							</tr>
						</table>
						<button type="submit" name="edit_produk_btn" class="btn btn-edit-produk" id="submit-produk"><i class="fas fa-check-circle"></i> Edit Produk</button>
					</form>
				</div>
			</div>
		</div>

		<div id="modal-product-added" class="modal" <?php if ($isSuccessfullyAdded) : ?> style="display: block;" <?php endif ?>>
			<!-- Modal content -->
			<div class="modal-content modal-notification">
				<div class="notification">
					<i class="fas fa-check-circle notification-icon"></i>
					<p class="notification-text">Produk berhasil ditambahkan!</p>
					<button class="btn btn-confirmation" id="btn-confirmation" onclick="closeModal();">Selesai</button>
				</div>
			</div>
		</div>

		<div id="modal-product-add-failed" class="modal" <?php if (!$isSuccessfullyAdded) : ?> style="display: block;" <?php endif ?>>
			<!-- Modal content -->
			<div class="modal-content modal-notification">
				<div class="notification">
					<i class="fas fa-times-circle notification-icon-failed"></i>
					<p class="notification-text">Produk Gagal Ditambahkan!</p>
					<button class="btn btn-confirmation" id="btn-confirmation" onclick="closeModal();">Tutup</button>
				</div>
			</div>
		</div>

		<div id="modal-delete" class="modal">
			<!-- Modal content -->
			<div class="modal-content modal-notification">
				<div class="notification">
					<i class="fas fa-exclamation-triangle notification-icon" style="color: #BA2929"></i>
					<p class="notification-text">Hapus produk dari daftar?</p>
					<button class="btn btn-batal" id="btn-confirmation">Batal</button>
					<a href="#!" id="btn-confirm-hapus"><button class="btn btn-hapus">Hapus</button></a>
				</div>
			</div>
		</div>
	</main>

	<footer>
		<p>&copy 2020 Tim Siposweb</p>
	</footer>

	<script type="text/javascript" src="assets/js/produk.js"></script>
	<script src="https://kit.fontawesome.com/6606a30803.js" crossorigin="anonymous"></script>
</body>
</html>