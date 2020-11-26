<?php 
require 'functions.php';

$id = $_GET["id"];

hapusTransaksi($id);
echo "<script>document.location.href = '/Siposweb/laporan.php';</script>";
?>