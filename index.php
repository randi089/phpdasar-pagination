<?php
session_start();
require 'functions.php';
if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}

// tombol cari ditekan
if (isset($_POST["cari"])) {
	$_SESSION["keyword"] = $_POST["keyword"];
	$mahasiswa = cari($_SESSION["keyword"]);
	if (isset($_GET["hal"])) {
		if ($_GET["hal"] > 1) {
			header('Location: index.php');
		}
	}
	$sessi = $_SESSION["keyword"];
} else {
	$sessi = $_SESSION["keyword"];
}

// pagination
// konfigurasi
$jumlahDataPerhalaman = 4;
if (isset($sessi)) {
	$jumlahData = count(query("SELECT * FROM mahasiswa 
				WHERE
			  nama LIKE '%$sessi%' OR 
			  nobp LIKE '%$sessi%' OR 
			  email LIKE '%$sessi%' OR 
			  jurusan LIKE '%$sessi%' 
				;"));
} else {
	$jumlahData = count(query("SELECT * FROM mahasiswa"));
}
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

if (isset($sessi)) {
	$mahasiswa = query("SELECT * FROM mahasiswa WHERE
			  nama LIKE '%$sessi%' OR 
			  nobp LIKE '%$sessi%' OR 
			  email LIKE '%$sessi%' OR 
			  jurusan LIKE '%$sessi%' LIMIT $awalData, $jumlahDataPerhalaman");
} else {
	$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Admin</title>
	<style>
		body {
			background-image: url(img/bg1.jpg);
			background-size: cover;
			background-repeat: no-repeat;
		}

		.h1 {
			width: 280px;
			background-color: rgba(255, 255, 255, .8);
			text-align: center;
			margin-left: 350px;
			text-shadow: 1px 1px 5px rgba(0, 0, 0, .3);
			border-radius: 10px;
			box-shadow: 2px 2px 5px rgba(0, 0, 0, .9);
		}

		h1 {
			padding: 3px 0;
		}

		.tambah {
			width: 180px;
			background-color: lightblue;
			margin-bottom: 10px;
			text-align: center;
			line-height: 25px;
			border-radius: 5px;
			box-shadow: 1px 1px 5px rgba(0, 0, 0, .8);
			padding: 3px 0;
			display: inline-block;
		}

		.tambah2 {
			width: 90px;
			background-color: lightblue;
			margin-bottom: 10px;
			text-align: center;
			line-height: 25px;
			border-radius: 5px;
			box-shadow: 1px 1px 5px rgba(0, 0, 0, .8);
			padding: 3px 0;
			display: inline-block;
		}

		a {
			text-decoration: none;
			color: black;
		}

		.tambah:hover,
		.tambah2:hover {
			background-color: skyblue;
		}

		.tambah:hover .tambah1 {
			color: blue;
		}

		.tambah2:hover .tambah1 {
			color: red;
		}

		.ubah,
		.hapus {
			width: 50px;
			height: 25px;
			background-color: lightblue;
			text-align: center;
			line-height: 25px;
			float: left;
			margin-right: 10px;
			border-radius: 5px;
			box-shadow: 1px 1px 5px rgba(0, 0, 0, .3);
			padding: 3px 0;
		}

		.uh:hover .hapus {
			color: mediumvioletred;
			background-color: skyblue;
		}

		.uh:hover .ubah {
			background-color: skyblue;
			color: mediumblue;
		}

		.tabel {
			width: 73%;
			padding: 10px;
			box-shadow: 1px 1px 5px rgba(0, 0, 0, .8);
			background-color: rgba(255, 255, 255, .8);
			border-radius: 5px;
		}

		.cr {
			width: 320px;
			text-align: center;
			padding: 5px 0;
			margin: 5px 0 8px 0;
			border: 1px solid black;
			border-radius: 5px;
			box-shadow: 1px 1px 5px rgba(0, 0, 0, .8);
			background-color: rgba(255, 255, 255, .8);
		}

		.cr1 {
			padding-bottom: 5px;
		}

		h3 {
			padding: 3px 0;
			margin: 0 45px 0 0;
			font-weight: normal;
		}

		.hal1 {
			width: 100px;
			text-align: center;
			padding: 5px 10px;
			background-color: rgba(255, 255, 255, .8);
			border-radius: 5px;
			margin-bottom: 5px;
			box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, .8);
		}

		.hal2:hover {
			color: skyblue;
		}

		.hal3 {
			color: red;
			font-weight: bold;
		}

		.text-center {
			text-align: center;
			font-size: 30px;
			font-weight: bold;
			color: red;
		}

		.container {
			margin: 0 10%;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="h1">
			<h1>Daftar Mahasiswa</h1>
		</div>

		<div class="tambah2">
			<a href="logout.php" class="tambah1">Logout</a>
		</div>
		<div class="tambah">
			<a href="tambah.php" class="tambah1">Tambah data mahasiswa</a>
		</div>

		<form action="" method="post" class="cr">
			<h3>Cari data mahasiswa : </h3>
			<div class="cr1">
				<input type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
				<button type="submit" name="cari">Cari!</button>
			</div>
		</form>

		<!-- navigasi -->
		<div class="hal1">
			<?php if ($halamanAktif > 1) : ?>
				<a href="?hal=<?= $halamanAktif - 1; ?>" class="hal2">&laquo;</a>
			<?php endif; ?>

			<!-- Angka halaman -->
			<?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
				<?php if ($i == $halamanAktif) : ?>
					<a href="?hal=<?= $i; ?>" class="hal2 hal3"><?= $i; ?></a>
				<?php else : ?>
					<a href="?hal=<?= $i; ?>" class="hal2"><?= $i; ?></a>
				<?php endif ?>
			<?php endfor; ?>

			<?php if ($halamanAktif < $jumlahHalaman) : ?>
				<a href="?hal=<?= $halamanAktif + 1; ?>" class="hal2">&raquo;</a>
			<?php endif; ?>
		</div>

		<div class="tabel">
			<table border="1" cellpadding="10" cellspacing="0">

				<tr>
					<th>No.</th>
					<th>Aksi</th>
					<th>Gambar</th>
					<th>No Bp</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Jurusan</th>
				</tr>

				<?php if (empty($mahasiswa)) : ?>
					<tr>
						<td class="text-center" colspan="7">Data not found!</td>
					</tr>
				<?php endif; ?>

				<?php $i = 1; ?>
				<?php foreach ($mahasiswa as $row) : ?>
					<tr>
						<td><?= $i; ?></td>
						<td>
							<a href="ubah.php?id=<?= $row["id"]; ?>" class="uh">
								<div class="ubah">ubah</div>
							</a>
							<a href="hapus.php?id=<?= $row["id"]; ?>" class="uh" onclick="return confirm('Yakin hapus data <?= $row["nama"]; ?>?');">
								<div class="hapus">hapus</div>
							</a>
						</td>
						<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
						<td><?= $row["nobp"]; ?></td>
						<td><?= $row["nama"]; ?></td>
						<td><?= $row["email"]; ?></td>
						<td><?= $row["jurusan"]; ?></td>
					</tr>
					<?php $i++; ?>
				<?php endforeach; ?>

			</table>
		</div>
	</div>

</body>

</html>