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

function hapusTransaksi($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM laporan_transaksi WHERE id = '$id'");
	return mysqli_affected_rows($conn);
}

function registrasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password1 = mysqli_real_escape_string($conn, $data["password1"]);

	if($password !== $password1){
		echo "<script>alert('Konfirmasi Password tidak sesuai!')</script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO user VALUES('$username', '$password')");

	return mysqli_affected_rows($conn);

}

?>
