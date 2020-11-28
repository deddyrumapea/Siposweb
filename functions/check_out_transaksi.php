<?php

require 'functions.php';

if (isset($_POST["transaksi"])) {
	$transaksi = json_decode($_POST["transaksi"]);
	
	$idTransaksi = $transaksi->{"id_transaksi"};
	$tanggal = $transaksi->{"tanggal"};
	$total = $transaksi->{"total"};
	$bayar = $transaksi->{"bayar"};
	$kembalian = $transaksi->{"kembalian"};
	$produk = $transaksi->{"produk"};

	// Query insert data ke tabel laporan transaksi
	$queryTransaksi = "INSERT INTO laporan_transaksi VALUES ('$idTransaksi', '$tanggal', $total, $bayar, $kembalian);";

	// Query insert ke tabel produk transaksi
	$queryProduk = "INSERT INTO produk_transaksi VALUES ";
	$produkValues = array();
	for ($i = 0; $i < count($produk); $i++) { 
		$produkValues[] = "('".$idTransaksi."', '".$produk[$i]->{"id_produk"}."', ".$produk[$i]->{"quantity"}.")";
	}
	$queryProduk .= implode(',', $produkValues);

	$result = queryCreate($queryTransaksi) and queryCreate($queryProduk);
	echo $result;
}

?>