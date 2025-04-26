-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 12:52 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bursakerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftarperusahaan`
--

CREATE TABLE `daftarperusahaan` (
  `idperusahaan` int(11) NOT NULL,
  `namaperusahaan` varchar(80) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `alamatperusahaan` varchar(100) NOT NULL,
  `noteleponperusahaan` varchar(50) NOT NULL,
  `emailperusahaan` varchar(50) NOT NULL,
  `posisidibutuhkan` varchar(100) NOT NULL,
  `gaji` varchar(100) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftarperusahaan`
--

INSERT INTO `daftarperusahaan` (`idperusahaan`, `namaperusahaan`, `deskripsi`, `alamatperusahaan`, `noteleponperusahaan`, `emailperusahaan`, `posisidibutuhkan`, `gaji`, `keterangan`) VALUES
(6, 'PT. Internasional Academy', 'Perusahaan dengan fokus pada bidang internet, dan teknologi informasi. ', 'Pegangsaaan, Jakarta Selatan', '081256789', 'internasionalacademy@gmail.com', 'Full Stack Developer', 'Rp. 10.000.000, dan Rp. 5.000.000', 'Tersedia kuota hanya 5 peserta');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `nama_lengkap`, `email`, `password`, `level`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin12345', 'admin'),
(2, 'Fauzi Achmad', 'fauzi@gmail.com', 'fauzi123', 'siswa'),
(3, 'PT Internasional Academy', 'internasionalacademy@gmail.com', 'internasional123', 'perusahaan'),
(4, 'Ridwan Maulana', 'ridwanmau@gmail.com', 'ridwan123', 'siswa'),
(5, 'PT. Telkom Jakarta Barat', 'telkombarat@gmail.com', 'telkom123', 'perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `idpelamar` int(11) NOT NULL,
  `nispelamar` varchar(50) NOT NULL,
  `namapelamar` varchar(100) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan') NOT NULL,
  `tanggallahir` date NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `notelepon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`idpelamar`, `nispelamar`, `namapelamar`, `jenkel`, `tanggallahir`, `alamat`, `notelepon`, `email`) VALUES
(1, '20208945', 'Fauzi Achmad', 'Laki-Laki', '2005-01-11', 'Jalan Tanjung Priok, Jakarta Utara', '081234567', 'fauziachmad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `idriwayat` int(11) NOT NULL,
  `riwayat_nispelamar` varchar(50) NOT NULL,
  `riwayat_namapelamar` varchar(100) NOT NULL,
  `perusahaanpelamar` varchar(100) NOT NULL,
  `posisipelamar` varchar(100) NOT NULL,
  `no_teleponriwayat` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `dokumen` varchar(500) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`idriwayat`, `riwayat_nispelamar`, `riwayat_namapelamar`, `perusahaanpelamar`, `posisipelamar`, `no_teleponriwayat`, `status`, `dokumen`, `tanggal`) VALUES
(36, '20208945', 'Fauzi Achmad', 'PT. Internasional Academy', 'Full Stack Developer', '081234567', 'Wawancara', '7b2529eb0d387d054886bcc452284d46.pdf', '2022-05-23 10:46:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftarperusahaan`
--
ALTER TABLE `daftarperusahaan`
  ADD PRIMARY KEY (`idperusahaan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`idpelamar`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`idriwayat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftarperusahaan`
--
ALTER TABLE `daftarperusahaan`
  MODIFY `idperusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `idpelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `idriwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
