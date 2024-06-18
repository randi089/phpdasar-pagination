<?php
session_start();
require 'functions.php';
if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if ($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}
if (isset($_SESSION["login"])) {
	header('Location: index.php');
	exit;
}

if ( isset($_POST["login"]) ) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if ( mysqli_num_rows($result) === 1 ) {
		
		// cek password
		$row = mysqli_fetch_assoc($result);
		if ( password_verify($password, $row["password"]) ) {
			
			//set session
			$_SESSION["login"] = true;

			// cek remember me
			if (isset($_POST['ingat'])) {
				// buat cookie

				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

			header("Location: index.php");
			exit;
		}
	}

	$error = true;
}
if (isset($_POST["daftar"])) {
	header('Location: registrasi.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login</title>
	<style>
		body {
			background-color: rgba(0, 0, 0, .3);
		}
		.container {
			background-color: rgba(255, 255, 255, .6);
			width: 300px;
			margin: 10% auto;
			box-shadow: 1px 1px 5px 3px rgba(0, 0, 0, .5);
			padding-bottom: 10px;
			border-radius: 5px;
		}
		.h1 {
			background-color: white;
			height: 70px;
			box-shadow: 0 1px 5px rgba(0, 0, 0, .5);
			text-align: center;
			line-height: 70px;
			border-radius: 5px 5px 0 0;
			text-shadow: 1px 1px 2px rgba(0, 0, 0, .8);
		}
		label {
			display: block;
			margin-bottom: 5px;
		}
		input {
			padding: 6px 0 2px 2px;
			font-size: 18px;
		}
		button {
			padding: 5px;
		}
		p {
			color: red;
			font-style: italic;
			margin: 10px 0 0 40px;
		}
		a {
			text-decoration: none;
			color: black;
		}
		a:hover {
			color: red;
		}
		.ingat {
			display: inline;
			margin: 10px 0;
		}

	</style>
</head>
<body>

<div class="container">
	<div class="h1">
		<h1>Halaman Login</h1>
	</div>
	<?php if( isset($error) ) : ?>
		<?php if ($username === "" || $password === "") : ?>
	    	<p>username / password tidak boleh kosong!</p>
		<?php else : ?>
			<p>username / password salah!</p>
		<?php endif; ?>
	<?php endif; ?>
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
			<li>
				<input type="checkbox" name="ingat" id="ingat" class="ingat">
				<label for="ingat" class="ingat">Remember me</label>
			</li>
			<li>
				<button type="submit" name="login">Login</button>
				<button type="submit" name="daftar">Daftar</button>
			</li>
		</ul>
	</form>
</div>

</body>
</html>