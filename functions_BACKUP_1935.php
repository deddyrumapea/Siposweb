<?php 

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "siposweb");


function queryRead($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}
<<<<<<< HEAD

function queryCreate($query){
	global $conn;
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
	 	return true;
	 } else {
	 	return false;
	 }
}

function queryUpdate($query){
	global $conn;
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
	 	return true;
	 } else {
	 	return false;
	 }
}


function hapusProduk($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM produk WHERE id = '$id'");
	return mysqli_affected_rows($conn);
}
?>
=======
?>
>>>>>>> 63d5edd84f8c41f30a02e6c4c17cc134f2a6b2d8
