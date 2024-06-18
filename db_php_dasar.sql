-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2024 pada 11.35
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nobp` char(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nobp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Randi Febriadi', '18101152620064', 'randifebriadi@gmail.com', 'Sistem Komputer', '662502fac40dd.jpg'),
(2, 'Muhammad Fauzan', '18101152620060', 'muhammadfauzan@gmail.com', 'Teknik Informatika', '2.jpg'),
(3, 'Khairul Fatwa', '18101152620050', 'khairulfatwa@gmail.com', 'Sistem Informasi', '3.jpg'),
(4, 'Tito Yanul Fikri', '18101152620070', 'titoyanulfikri@gmail.com', 'Manajemen Informatika', '4.jpg'),
(5, 'Taufiqur Rahman', '18101152620069', 'taufiqurrahman@gmail.com', 'Akutansi', '5.jpg'),
(6, 'Wahyu Ummy Putra', '18101152620074', 'wahyuummyputra@gmail.com', 'Psikologi', '6.jpg'),
(7, 'Badu Saputra', '18101152620008', 'badusaputra@gmail.com', 'Ekonomi', '7.jpg'),
(8, 'Randi Sa', '18101152620015', 'randisa@gmail.com', 'Kedokteran', '8.jpg'),
(9, 'Tasya Aryati Sakinah', '18101152620001', 'tasyaaryatisakinah@gmail.com', 'Pendidikan Agama Islam', '9.jpg'),
(10, 'Tasya Sakinah', '18101152620038', 'tasyasakinah@gmail.com', 'Matematika', '10.jpg'),
(12, 'Rumzi Rahman', '18101152620009', 'rumzirahman@gmail.com', 'Teknik Elektro', '11.jpg'),
(25, 'Kuceng', '18101152620004', 'kuceng@gmail.com', 'Perikanan', 'kuc.jpg'),
(26, 'Safruddin', '18101152620041', 'safruddin@gmail.com', 'Matematika', '6624c66a6be3b.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$OkEqdpg1uS9Rq4WowlHtHeL85Hbmi4EEoyIO28bbcoimLGWOWi/9u'),
(2, 'admin1', '$2y$10$uHI/PNVl5GztfNvoFCvVoe0ZSAsiYmJls.T3fCN.flgk71916B1x2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
