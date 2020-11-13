<?php 

if (isset($_POST["submit"])) {
	echo "hallo";
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login - SIPOSWEB</title>
	<link rel="stylesheet" type="text/css" href="assets/styles/reset.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/style.css">
</head>
<body style="background: #dfe6e9;">
	<div class="login-box-container">

		<!-- LOGIN FORM START -->
		<div class="login-box">
			<h2 class="login-title">Login</h2>
			<div>
				<formk action="" method="post">
					<input type="username" placeholder="Username" class="form-login" required>
					<input type="password" placeholder="Password" class="form-login" required>
					<input type="submit" value="Login" class="btn-login">
				</form>
				<br>
			</div>
		</div>
		<!-- LOGIN FORM END -->

		<!-- SIDE CONTENT START -->
		<div class="login-side-box">
			<h2 class="login-siposweb-title">SIPOSWEB</h2>
			<p class="login-desc">Sistem Informasi Point of Sales Berbasis Web</p>
		</div >
		<!-- SIDE CONTENT END -->
	</div>

</body>
</html>