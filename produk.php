<!DOCTYPE html>
<html>
<head>
	<title>Produk - SIPOSWEB</title>
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
				<li><a href="#"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<div class="content-produk">
			<form action="" class="form-data-count">
				<input type="text" value="15" class="input-data-count" id="input-data-count">
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
				<tr>
					<td>1</td>
					<td>P723</td>
					<td>Terasi Udang Mamasuka 120g</td>
					<td>Rp1,200.00</td>
					<td>2</td>
					<td><a href="#" class="action-edit"><i class="fas fa-edit"></i> Edit</a> <a href="#" class="action-hapus"><i class="fas fa-trash"></i> Hapus</a></td>
				</tr>
			</table>
			<button class="btn btn-page-nav"><i class="fas fa-angle-left"></i> Sebelumnya</button>
			<button class="btn btn-page-nav">Selanjutnya <i class="fas fa-angle-right"></i></button>
		</div>

		<div id="modal-tambah-produk" class="modal">
			<!-- Modal content -->
			<div class="modal-content cf">
				<div class="form-penambahan-produk">
					<form action="#">
						<table>
							<tr>
								<th>
									<label for="id-produk">ID Produk : </label>
								</th>
								<td>
									<input type="text" id="id-produk">
								</td>
							</tr>
							<tr>
								<th>
									<label for="nama-produk">Nama Produk : </label>
								</th>
								<td>
									<input type="text" id="nama-produk">
								</td>
							</tr>
							<tr>
								<th>
									<label for="harga">Harga (Rp) : </label>
								</th>
								<td>
									<input type="text" id="harga">
								</td>
							</tr>
							<tr>
								<th>
									<label for="stock">Stock : </label>
								</th>
								<td>
									<input type="text" id="stock">
								</td>
							</tr>
						</table>
					</form>
				</div>
				<button class="btn btn-tambah-produk" id="submit-produk"><i class="fas fa-plus-circle"></i> Tambahkan Produk</button>
			</div>
		</div>

		<div id="modal-product-added" class="modal">
			<!-- Modal content -->
			<div class="modal-content modal-success">
				<div class="success-notification">
					<i class="fas fa-check-circle notification-icon"></i>
					<p class="success-notification-text">Produk berhasil ditambahkan!</p>
					<button class="btn btn-confirmation" id="btn-confirmation">Selesai</button>
				</div>
			</div>
		</div>
	</main>

	<footer>
		<p>&copy 2020 Deddy Romnan Rumapea</p>
	</footer>

	<script type="text/javascript" src="assets/js/produk.js"></script>
	<script src="https://kit.fontawesome.com/6606a30803.js" crossorigin="anonymous"></script>
</body>
</html>