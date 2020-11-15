<?php 

require 'functions.php';

if (isset($_POST["query"])) {
	$query = $_POST["query"];

	$result = queryRead("SELECT * FROM produk WHERE id = '$query'")[0];

	echo json_encode($result);
}

?>