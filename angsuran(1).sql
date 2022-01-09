-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2022 pada 08.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angsuran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `absensi_id` int(11) NOT NULL,
  `krs_id` int(11) NOT NULL,
  `pertemuan_id` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `durasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
--

CREATE TABLE `angsuran` (
  `angsuran_id` int(11) NOT NULL,
  `angsuran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `angsuran`
--

INSERT INTO `angsuran` (`angsuran_id`, `angsuran`) VALUES
(1, 'Angsuran 1'),
(2, 'Angsuran 2'),
(3, 'Angsuran 3'),
(4, 'Angsuran 5'),
(5, 'Angsuran 4'),
(6, 'Angsuran 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(18) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipe` int(11) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `nama`, `nim`, `email`, `tipe`, `password`) VALUES
(1, 'Vira', '1911521003', 'vira@gmail.com', 1, 123),
(2, 'Gita', '1911522021', 'gita@gmail.com', 1, 234),
(3, 'Novel', '1911521019', 'valentinonovel1@gmail.com', 1, 621),
(4, 'afdhal', '1911523023', 'afdhal@gmail.com', 1, 456);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `angsuran_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `sisa_angsuran` int(11) NOT NULL,
  `jmlh_sisa_angsuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `angsuran_id`, `mahasiswa_id`, `nominal`, `denda`, `sisa_angsuran`, `jmlh_sisa_angsuran`) VALUES
(4, 3, 1, 2, 1, 1, 1),
(34, 4, 3, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertemuan`
--

CREATE TABLE `pertemuan` (
  `pertemuan_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `materi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, '1911521003', '123', 'mahasiswa'),
(3, '1911522021', '123', 'mahasiswa'),
(4, '1911521019', '621', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`absensi_id`),
  ADD KEY `krs_id` (`krs_id`),
  ADD KEY `pertemuan_id` (`pertemuan_id`);

--
-- Indeks untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`angsuran_id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `kelas_id` (`angsuran_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indeks untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`pertemuan_id`),
  ADD KEY `pertemuan_ibfk_1` (`kelas_id`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`krs_id`) REFERENCES `pembayaran` (`pembayaran_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`pertemuan_id`) REFERENCES `pertemuan` (`pertemuan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`mahasiswa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`angsuran_id`) REFERENCES `angsuran` (`angsuran_id`);

--
-- Ketidakleluasaan untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD CONSTRAINT `pertemuan_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `angsuran` (`angsuran_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
