<?php 
session_start();
require 'functions.php';
if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
	

	// cek apakah data berhasil ditambahkan atau tidak
	if ( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah data mahasiswa</title>
	<style>
		body {
			background-image: url(img/bg.jpg);
			background-size: cover;
		}
		h1 {
			margin-left: 460px;
			width: 430px;
			background-color: rgba(255, 255, 255, .7);
			text-align: center;
			text-shadow: 1px 1px 3px rgba(0, 0, 0, .3);
			border-radius: 8px;
			box-shadow: 1px 1px 5px rgba(0, 0, 0, .8);
			padding: 5px 0;
		}
		form {
			margin-left: 505px;
			margin-top: 50px;
		}
		.ul {
			background-color: rgba(255, 255, 255, .7);
			width: 380px;
			box-shadow: 1px 1px 5px rgba(0, 0, 0, .8);
			padding: 5px 0;
			border-radius: 8px;
		}
		.gambar {
			position: absolute;
			right: 398px;
		}
		input {
			float: right;
			margin-right: 60px;
		}
		button {
			margin-left: 110px;
			padding: 8px;
			border: none;
			border-radius: 5px;
			box-shadow: 1px 1px 2px rgba(0, 0, 0, .5);
		}
		a {
			text-decoration: none;
			color: black;
		}
		a:hover .kembali {
			background-color: skyblue;
			color: blue;
		}
		.kembali {
			width: 80px;
			text-align: center;
			background-color: lightblue;
			padding: 7px 0;
			position: absolute;
			border-radius: 5px;
			box-shadow: 1px 1px 5px rgba(0, 0, 0, .3);
		}
	</style>
</head>
<body>
	<h1>Tambah data mahasiswa</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="ul">
			<ul type="none">
				<li>
					<label for="nobp">No Bp : </label>
					<input type="text" name="nobp" id="nobp" required>
				</li>
				<br>
				<li>
					<label for="nama">Nama : </label>
					<input type="text" name="nama" id="nama" required>
				</li>
				<br>
				<li>
					<label for="email">Email : </label>
					<input type="text" name="email" id="email" required>
				</li>
				<br>
				<li>
					<label for="jurusan">Jurusan : </label>
					<input type="text" name="jurusan" id="jurusan" required>
				</li>
				<br>
				<li>
					<label for="gambar">Gambar : </label>
					<input type="file" name="gambar" id="gambar" class="gambar">
				</li>
				<br>
				<li>
					<a href="index.php">
						<div class="kembali">Kembali</div>
					</a>
					<button type="submit" name="submit">Tambah Data!</button>
				</li>
			</ul>
		</div>
	</form>

</body>
</html>