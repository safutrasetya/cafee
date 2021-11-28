-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 01:48 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
  `id_transaksi` int(11) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `total_pembayaran` int(10) NOT NULL,
  `status_bayar` int(1) NOT NULL,
  `status_pesanan` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `waktu_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_pembelian`
--

INSERT INTO `riwayat_pembelian` (`id_transaksi`, `id_meja`, `total_pembayaran`, `status_bayar`, `status_pesanan`, `tanggal_pembayaran`, `waktu_pembayaran`) VALUES
(19, 1, 57000, 0, 1, '0000-00-00', '2021-11-18 16:41:26'),
(20, 1, 87000, 1, 1, '2021-11-17', ''),
(22, 1, 138000, 1, 1, '2021-11-19', '07:05:06pm'),
(23, 1, 158000, 1, 1, '2021-11-19', '07:14:13pm'),
(24, 1, 147000, 0, 0, '2021-11-19', '07:21:56pm'),
(25, 1, 32000, 1, 0, '2021-11-20', '11:48:39am'),
(26, 1, 47000, 0, 0, '2021-11-20', '05:23:35pm'),
(27, 1, 47000, 0, 0, '2021-11-20', '05:25:34pm'),
(28, 1, 77000, 0, 0, '2021-11-20', '05:28:13pm'),
(29, 1, 77000, 1, 0, '2021-11-20', '05:51:16pm'),
(30, 1, 77000, 1, 0, '2021-11-20', '05:54:35pm'),
(31, 1, 136000, 1, 0, '2021-11-20', '05:57:45pm'),
(32, 1, 47000, 1, 0, '2021-11-21', '09:40:49am'),
(33, 1, 47000, 1, 0, '2021-11-21', '09:41:36am'),
(34, 1, 47000, 0, 0, '2021-11-21', '09:41:41am'),
(35, 1, 32000, 1, 0, '2021-11-21', '09:44:46am'),
(36, 1, 99000, 1, 0, '2021-11-22', '01:57:10pm'),
(41, 2, 156000, 1, 0, '2021-11-24', '01:42:14pm'),
(42, 1, 61000, 0, 0, '2021-11-25', '07:15:57am'),
(43, 1, 61000, 0, 0, '2021-11-25', '07:16:38am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `status_pesanan` (`status_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  ADD CONSTRAINT `riwayat_pembelian_ibfk_1` FOREIGN KEY (`status_pesanan`) REFERENCES `status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
