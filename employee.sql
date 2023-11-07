-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2023 pada 20.22
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_div` int(11) NOT NULL,
  `divisi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_div`, `divisi`) VALUES
(1, 'Produksi'),
(2, 'General Affair'),
(3, 'Quality'),
(4, 'Warehouse'),
(5, 'Engineer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jab` int(11) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `gapok` varchar(20) NOT NULL,
  `tunjangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jab`, `jabatan`, `gapok`, `tunjangan`) VALUES
(1, 'Operator', '4500000', '100000'),
(2, 'Leader', '4500000', '500000'),
(3, 'Supervisor', '4500000', '1000000'),
(4, 'HOD', '5400000', '3000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `d_join` date NOT NULL,
  `id_jab` int(11) NOT NULL,
  `id_div` int(11) NOT NULL,
  `tgl_sub` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nip`, `nama`, `alamat`, `email`, `phone`, `d_join`, `id_jab`, `id_div`, `tgl_sub`) VALUES
(1, 'I0002500', 'Ramdoni', 'Tangerang', 'mangga@gmail.com', '08226026269', '2017-03-11', 4, 2, '2023-06-29 14:42:37'),
(2, 'I0002501', 'Baresi Halim', 'Tangerang', 'jeruk@gmail.com', '082260434546', '2017-03-22', 2, 1, '2023-06-29 12:54:29'),
(3, 'I0002502', 'Ahmad Muzaqi', 'Tangerang', 'zakidong@gmail.com', '08226026223', '2017-06-08', 4, 1, '2023-06-29 12:54:29'),
(4, 'I0002503', 'Rendi Sabililah', 'Bogor', 'zzakiturun@gmail.com', '082234323439', '2017-03-22', 3, 5, '2023-06-29 12:54:29'),
(5, 'i0002504', 'Febri Kurniawan', 'Tangerang', 'apel@gmail.como', '0897676545321', '2017-03-11', 3, 3, '2023-06-29 13:14:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `tgl`) VALUES
(1, 'admin', '$2y$10$E1n.sXcRpuCeWIuL4d.T..H0kQo9TLgTmTH3T4ZmCOL', '2023-06-29 16:05:36'),
(2, 'doni', '$2y$10$CLA6N8VFIHiH4f8f9SN1B.a3bOynq8rSuvhPMUYvc1c', '2023-06-29 17:51:19'),
(3, 'doniram', '$2y$10$ZAeEpV/emDfHaN5kCnETZOiIrYRuZD.YZMZchhuz.Ri', '2023-06-29 17:57:48'),
(4, 'pola', '$2y$10$Zk6XcmU4CvoGU/p5dHXpcebFM2bNcpKktvhWN8rT1Bl', '2023-06-29 18:05:13'),
(5, 'kopiganteng', '$2y$10$16DDhGQ0E2ixSUW78hAKWOUaOXDAIA2a0p9QuH3BH3e', '2023-06-29 18:11:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_div`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jab`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_jab` (`id_jab`),
  ADD KEY `FKK_div` (`id_div`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_div` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `FKK_div` FOREIGN KEY (`id_div`) REFERENCES `divisi` (`id_div`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_jab` FOREIGN KEY (`id_jab`) REFERENCES `jabatan` (`id_jab`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
