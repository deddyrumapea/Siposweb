<?php

	session_start();

	if( !isset($_SESSION["login"]) ){
		header("Location: login.php");
		exit();
	}
	require 'functions/functions.php';


	if ( isset($_POST["register"])) {

		if ( registrasi($_POST) > 0 ) {
			echo "<script>alert('user baru telah ditambahkan');</script>";
		} else  {
			echo mysqli_error($conn);
		}
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
				<li><a class="active" href=""><i class="fas fa-user-cog"></i> Pengaturan</a></li>
				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<ul>
			<div style="float: right;" method="post">
				<a href="Pengaturan.php">
					<button type="submit" name="Edit Password" class="btn btn-edit-pass">Edit Password</button>
				</a>
			</div>
		</ul>

		<form action="" method="post" style="margin-left: 450px">
			<h1 style="font-size: 28px; margin-left: 100px; color: #F47216">Menambahkan User Baru</h1>
			<ul>
				<li style="width: 50%; margin-top: 30px; ">
					<label for="username">Username</label>
					<input type="text" name="username" id="username">
				</li>
				<li style="width: 50%;">
					<label for="password">Password</label>
					<input type="password" name="password" id="password">
				</li>
				<li style="width: 50%; margin-bottom: 30px;	">
					<label >Konfirmasi Password</label>
					<input type="password" name="password1" id="password1">
				</li>
				<button type="submit" name="register" class="btn btn-konfirm-pass">
					<i class="fas fa-plus-circle"></i> Tambahkan
				</button>
			</ul>
		</form>
	</main>
</body>
</html>