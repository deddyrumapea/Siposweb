<?php 
require 'functions.php';

if (isset($_POST["id_transaksi"])) {
	$idTransaksi = $_POST["id_transaksi"];
	$result = new stdClass();

	$transaksi = queryRead("SELECT * FROM laporan_transaksi WHERE id = '$idTransaksi'")[0];
	$result->id_transaksi = $transaksi["id"];
	$result->tanggal = $transaksi["tanggal"];
	$result->total = $transaksi["total"];
	$result->bayar = $transaksi["bayar"];
	$result->kembalian = $transaksi["kembalian"];

	$produk = queryRead("SELECT id_produk, nama, quantity FROM produk_transaksi, produk WHERE id_transaksi = '$idTransaksi' AND produk_transaksi.id_produk = produk.id");
	$result->produk = $produk;

	echo json_encode($result);
}

?>