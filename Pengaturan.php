<?php

	session_start();
	if (isset($_GET['username'])) {
		$username = $_GET['username'];
		# code...
	}

	if( !isset($_SESSION["login"]) ){
		header("Location: login.php");
		exit();
	}	
	

?>

<!DOCTYPE html>
<html>
<head>
		<title>Pengaturan - SIPOSWEB</title>
		<link rel="shortcut icon" type="image/ico" href="assets/images/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="assets/styles/reset.css">
		<link rel="stylesheet" type="text/css" href="assets/styles/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/transaksi.js"></script>
		<script src="https://kit.fontawesome.com/6606a30803.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<nav class="nav-menu">
			<ul>
				<h1 class="logo"><a href="#" title="SIPOSWEB"><img src="assets/images/logo.png" alt="SIPOSWEB" height="35px"></a></h1>
				<li><a href="transaksi.php"><i class="fa fa-shopping-cart"></i> Transaksi</a></li>
				<li><a href="produk.php"><i class="fas fa-box-open"></i> Produk</a></li>
				<li><a href="laporan.php"><i class="fas fa-clipboard-list"></i> Laporan</a></li>
				<li><a href="Pengaturan.php" class="active" href=""><i class="fas fa-user-cog"></i> Pengaturan</a></li>
				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<ul>
			<form action="tambah-user.php" style="float: right;">
				<button type="submit" name="Edit Password" class="btn btn-tmbh-user">Tambah User</button>
			</form>
		</ul>

		<?php
		 require 'functions/functions.php';
			if (isset($_POST['submit'])) {
					$username = $_POST['username'];
					$passwordlama = $_POST['oldPass'];
					$passwordbaru = $_POST['newPass'];
					$KonfirmasiPassword = $_POST['newPass1'];

					$passwordbaru = password_hash($passwordbaru, PASSWORD_DEFAULT);

					$result =  mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

					 if(mysqli_num_rows($result) === 1){
					 	$row = mysqli_fetch_assoc($result);
					 		if (password_verify($passwordlama, $row['password'])) {
								$con = mysqli_query($conn,"UPDATE user set password = '$passwordbaru' WHERE username = '$username'");
			                	echo "<script>alert('password berhasil diubah.');</script>";
			                           }else{
				                echo "<script>alert('password gagal diubah.');</script>";
				                
				            }
					}

				}
		?>
		<form action="" method="post"  style="margin-left: 400px;">
			<h1 style="font-size: 28px; margin-left: 140px; color: #F47216">Mengganti Password</h1>
			<ul>
				<li style="width: 50%; margin-top: 30px; ">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" >
				</li>
				<li style="width: 50%; ">
					<label for="username">Password Lama</label>
					<input type="password" name="oldPass" id="oldPass">
				</li>
				<li style="width: 50%; ">
					<label for="username">Password Baru</label>
					<input type="password" name="newPass" id="newPass">
				</li>
				<li style="width: 50%; margin-bottom: 30px;	">
					<label for="username">Konfirmasi Password</label>
					<input type="password" name="newPass1" id="newPass1">
				</li>
				<button type="submit" name="submit" value="Save Password" class="btn btn-konfirm-pass">
					<i class="fas fa-check-circle"></i> Konfirmasi
				</button>
			</ul>
		</form>
	</main>
</body>
</html>