<?php 
session_start();
require 'functions.php';
if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}

// ambil data di URL
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
	

	

	// cek apakah data berhasil diubah atau tidak
	if ( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
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
	<title>Ubah data mahasiswa</title>
	<style>
		body {
			background-image: url(img/bg.jpg);
			background-size: cover;
			background-repeat: no-repeat;
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
			margin-left: 490px;
			margin-top: 50px;
		}
		.ul {
			background-color: rgba(255, 255, 255, .7);
			width: 380px;
			height: 345px;
			box-shadow: 1px 1px 5px rgba(0, 0, 0, .8);
			padding: 5px 0;
			border-radius: 8px;
		}
		.gambar {
			position: absolute;
			right: 398px;
			top: 385px;
		}
		.img {
			position: absolute;
			right: 620px;
			top: 280px;
			width: 100px;
			height: 100px;	
			border-radius: 10px;
			box-shadow: 1px 1px 5px rgba(0, 0, 0, .3);
		}
		input {
			float: right;
			margin-right: 60px;
		}
		button {
			margin-top: 100px;
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
			top: 419px;
		}
	</style>
</head>
<body>
	<h1>Ubah Data data mahasiswa</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="ul">
			<ul type="none">
					<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
					<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
					<li>
						<label for="nobp">No Bp : </label>
						<input type="text" name="nobp" id="nobp" required value="<?= $mhs["nobp"]; ?>">
					</li>
					<br>
					<li>
						<label for="nama">Nama : </label>
						<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
					</li>
					<br>
					<li>
						<label for="email">Email : </label>
						<input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
					</li>
					<br>
					<li>
						<label for="jurusan">Jurusan : </label>
						<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
					</li>
					<br>
					<li>
						<label for="gambar">Gambar : </label>
						<img src="img/<?= $mhs["gambar"]; ?>" class= "img">
						<input type="file" name="gambar" id="gambar" class="gambar">
					</li>
					<br>
					<li>
						<a href="index.php">
							<div class="kembali">Kembali</div>
						</a>
						<button type="submit" name="submit">Ubah Data!</button>
					</li>
			</ul>
		</div>
	</form>

</body>
</html>