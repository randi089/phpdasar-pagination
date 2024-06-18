<?php 
require 'functions.php';

if (isset( $_POST["register"]) ) {
	if(registrasi($_POST) > 0){
		echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
	} else {
		echo mysqli_error($conn);
	}
}
if (isset($_POST["login"])) {
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Registrasi</title>
	<style>
		body {
			background-color: rgba(0, 0, 0, .2);
		}
		.container {
			width: 330px;
			margin: 10% auto;
			border-radius: 5px;
			box-shadow: 1px 1px 5px 3px rgba(0, 0, 0, .3);
			padding: 5px 0;
			background-color: white;
		}
		.h1 { 
			margin-left: 30px;
			color: white;
		}
		.bh1 {
			box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, .5);
			background-color: rgba(0, 0, 0, .8);
		}
		label {
			display: block;
		}
		input {
			border-radius: 3px 3px 0 0;
			border: none;
			border-bottom: 1px solid black;
			font-size: 20px;
		}
		button {
			margin-left: 20px;
			margin-top: 15px;
			font-size: 16px;
			padding: 5px 10px;
			border-radius: 5px;
			border: none;
			box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, .5);
		}
	</style>
</head>
<body>

<div class="container">
	<div class="bh1">
		<h1 class="h1">Halaman Registrasi</h1>
	</div>

	<form action="" method="post">
		<ul type="none">
			<li>
				<label for="username">username :</label>
				<input type="text" name="username" id="username">
			</li>
			<br>
			<li>
				<label for="password">password :</label>
				<input type="password" name="password" id="password">
			</li>
			<br>
			<li>
				<label for="password2">konfirmasi password :</label>
				<input type="password" name="password2" id="password2">
			</li>
			<br>
			<li>
				<button type="submit" name="register">Register!</button>
				<button type="submit" name="login">Halaman Login</button>
			</li>
		</ul>
	</form>
</div>
</body>
</html>