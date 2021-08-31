-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 07:37 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Infrastruktur'),
(3, 'Kesehatan'),
(4, 'Kriminal'),
(5, 'Adminisatrasi');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `bukti` varchar(128) NOT NULL,
  `status` enum('disetujui','diajukan','ditolak') NOT NULL,
  `tanggapan` varchar(256) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_user`, `id_kategori`, `judul`, `keterangan`, `bukti`, `status`, `tanggapan`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'Jalan Rusak Dan Berlubang', 'Terjadi jalan rusak di desa sidorejo, banyak lubang yang telah tergenang oleh air', 'jalan_rusak.jpg', 'disetujui', 'Baik akan segera kami tindak lanjuti', '2021-08-28 14:37:24', NULL),
(7, 12, 3, 'Vaksin Covid', 'Banyak orang yang belum mendapatkan vaksin di desa saya.', 'Corona-vaksin-1.jpg', 'disetujui', '', '2021-08-30 20:00:04', '2021-08-30 20:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nik` int(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `level` enum('admin','pengunjung') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nik`, `password`, `no_telp`, `alamat`, `status`, `level`, `created_at`) VALUES
(7, 'Winandri Kusuma', 12345, '$2y$10$H1MsOVTYPbv2oNmKZ72MGeqorFmIaarTFYXsYtSqYFMX8IO/oTh1q', '085771604051', 'Malang', '1', 'admin', '2021-08-13 14:12:13'),
(8, 'Angkasa ', 123456, '$2y$10$5e.VIzYp/3fm60IiUpqAtes.ogDRawIm6OBc0rgJIW9/bmTfIOsaC', '089123124125', 'Jl. Diponegoro No. 17 Bojonegoro ', '1', 'pengunjung', '2021-08-13 15:59:54'),
(12, 'Ayu Setiawati', 654321, '$2y$10$WI56aPdotPYiULR7yaS1bOXQqCwco1R.X9ItyEc5BT1h5ytfkP522', '089777152156', 'Jl.Kembang Kertas Kec. Padangan', '1', 'pengunjung', '2021-08-30 19:55:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_user` (`id_user`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pengaduan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
