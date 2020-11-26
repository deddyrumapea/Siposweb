<?php 
require 'functions.php';

$id = $_GET["id"];

hapusProduk($id);
echo "<script>document.location.href = '/Siposweb/produk.php';</script>";
?>