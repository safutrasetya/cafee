-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 04:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orari`
--

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pembelian`
--

CREATE TABLE `riwayat_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `total_pembayaran` int(10) NOT NULL,
  `status_bayar` int(1) NOT NULL,
  `waktu_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_pembelian`
--

INSERT INTO `riwayat_pembelian` (`id_pembelian`, `id_meja`, `id_keranjang`, `total_pembayaran`, `status_bayar`, `waktu_pembayaran`) VALUES
(1, 1, 2, 20000, 1, '2021-10-24'),
(2, 2, 3, 25000, 2, '2021-10-25'),
(3, 5, 8, 50000, 2, '2021-10-26'),
(4, 4, 5, 100000, 1, '2021-10-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
