<?php
ob_start();
session_start();
include "admin/connect.php";

?>


/<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/login-style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="main">
		
		<input type="checkbox" id="chk" aria-hidden="true">
		
			<div class="signup">
				<form action="admin/process.php" method="POST">
					<label for="chk" aria-hidden="true">Kayıt Ol</label>
					<input type="text" name="user_username" placeholder="Kullanıcı Adı" required="">
					<input type="email" name="user_mail" placeholder="Email" required="">
					<input type="password" name="user_password" placeholder="Şifre" required="">
					<button name="register">Kayıt Ol</button>
				</form>
			</div>

			<div class="login">
				<form action="admin/process.php" method="POST">
					<label for="chk" aria-hidden="true">Giriş Yap</label>
					<input type="email" name="user_mail" placeholder="Email" required="">
					<input type="password" name="user_password" placeholder="Şifre" required="">
					<button name="login">Giriş</button>
				</form>
			</div>

	</div>    

</body>
</html>