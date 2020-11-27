<?php 

// Cek apakah tombol checkout ditekan
if (isset($_POST["btn-check-out"])) {
	// Ambil data transaksi
	$id = $_POST["id-transaksi"];
	$tanggal = $_POST["tanggal"];
	$total = $_POST["total"];
	$bayar = $_POST["bayar"];
	$kembalian = $_POST["kembalian"];

	// Query insert data transaksi
	$query = "INSERT INTO laporan_transaksi VALUES ('$id', '$tanggal', '$total', '$bayar', '$kembalian')";
	$isSuccessfullyAdded = queryCreate($query);
}

?>