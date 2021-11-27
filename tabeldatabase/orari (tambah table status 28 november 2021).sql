-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 09:18 PM
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
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `No_Hp` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(1) NOT NULL,
  `waktu_bergabung` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `nama`, `email`, `No_Hp`, `password`, `level`, `waktu_bergabung`) VALUES
(1, 'admin', 'Admin Orari', 'adminOrari@gmail.com', '081279860111', 'admin', '1', '2021-11-01 05:18:28'),
(2, 'Staff_1', 'Staff 1', 'staffOrari1@gmail.com', '083367893579', 'orari1201', '2', '2021-10-31 21:21:14'),
(3, 'Staff_2', 'Staff 2', 'staffOrari2@gmail.com', '083659575277', 'orari1202', '2', '2021-10-31 21:21:24'),
(4, 'Staff_3', 'Staff 3', 'suvikovaailio@gmail.com', '088976123598', 'ngetestaja', '2', '2021-11-25 10:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `meja` int(2) NOT NULL,
  `pass_meja` varchar(5) NOT NULL,
  `reservasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id_meja`, `meja`, `pass_meja`, `reservasi`) VALUES
(1, 1, 'M0001', 0),
(2, 2, 'M0002', 0),
(3, 3, 'M0003', 0),
(4, 4, 'M0004', 0),
(5, 5, 'M0005', 0),
(6, 6, 'M0006', 0),
(7, 7, 'M0007', 0),
(8, 8, 'M0008', 0),
(9, 9, 'M0009', 0),
(10, 10, 'M0010', 0),
(11, 11, 'M0011', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `info_menu` text NOT NULL,
  `harga` int(10) NOT NULL,
  `kategori` int(1) NOT NULL,
  `ketersidiaan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `gambar`, `info_menu`, `harga`, `kategori`, `ketersidiaan`) VALUES
(1, 'Kentang Goreng', '', '', 10000, 3, 20),
(2, 'Nugget ayam', '', '', 15000, 3, 30),
(3, 'Pisang Goreng', '', '', 10000, 3, 40),
(4, 'Roti bakar', '', '', 10000, 3, 50),
(5, 'Teh Manis(P)', '', '', 7000, 2, 100),
(6, 'Teh Manis(D)', '', '', 8000, 2, 100),
(7, 'Kopi Hitam', '', '', 7000, 2, 100),
(8, 'Kopi Susu', '', '', 10000, 2, 100),
(9, 'Teh Susu (P)', '', '', 10000, 2, 100),
(10, 'Teh Susu (D)', '', '', 12000, 2, 100),
(11, 'Nasi Goreng', '', '', 15000, 1, 50),
(12, 'Indomie (K)', '', '', 10000, 1, 50),
(13, 'Nasi Ayam', '', '', 12000, 1, 50),
(14, 'Indomie (G)', '', '', 10000, 1, 50),
(15, 'Paket 1', '', '', 20000, 4, 50),
(16, 'Paket 2', '', '', 30000, 4, 50),
(17, 'Nasi Goreng Spesial', '', 'NASI GORENGNYA SPECIAL', 20000, 1, 1),
(18, 'Nasi Ayam Bakar', '', 'NASINYA PAKE AYAM BAKAR', 20000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `nama_pesanan` varchar(30) NOT NULL,
  `harga_pesanan` int(11) NOT NULL,
  `waktu_pesanan` varchar(40) NOT NULL,
  `banyak_psn` int(3) NOT NULL,
  `status_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_meja`, `id_transaksi`, `nama_pesanan`, `harga_pesanan`, `waktu_pesanan`, `banyak_psn`, `status_pesanan`) VALUES
(1, 1, 20, 'Nasi Goreng', 15000, '06:58:37pm', 1, 0),
(3, 1, 20, 'Nasi Ayam', 12000, '06:58:37pm', 1, 0),
(4, 1, 20, 'Indomie (G)', 10000, '06:58:37pm', 1, 0),
(5, 1, 20, 'Teh Manis(D)', 8000, '06:58:37pm', 1, 0),
(6, 1, 20, 'Kopi Hitam', 28000, '06:58:37pm', 4, 0),
(7, 1, 20, 'Kopi Susu', 10000, '06:58:37pm', 1, 0),
(8, 1, 21, 'Nasi Goreng', 15000, '07:02:08pm', 1, 0),
(9, 1, 21, 'Indomie (K)', 10000, '07:02:08pm', 1, 0),
(10, 1, 21, 'Nasi Ayam', 12000, '07:02:08pm', 1, 0),
(11, 1, 21, 'Indomie (G)', 10000, '07:02:08pm', 1, 0),
(12, 1, 21, 'Teh Manis(D)', 8000, '07:02:08pm', 1, 0),
(13, 1, 21, 'Kopi Hitam', 28000, '07:02:08pm', 4, 0),
(14, 1, 21, 'Kopi Susu', 10000, '07:02:08pm', 1, 0),
(15, 1, 22, 'Nasi Goreng', 15000, '07:05:06pm', 1, 0),
(16, 1, 22, 'Indomie (K)', 10000, '07:05:06pm', 1, 0),
(17, 1, 22, 'Nasi Ayam', 48000, '07:05:06pm', 4, 0),
(18, 1, 22, 'Indomie (G)', 10000, '07:05:06pm', 1, 0),
(19, 1, 22, 'Teh Manis(D)', 8000, '07:05:06pm', 1, 0),
(20, 1, 22, 'Kopi Hitam', 28000, '07:05:06pm', 4, 0),
(21, 1, 22, 'Kopi Susu', 10000, '07:05:06pm', 1, 0),
(22, 1, 23, 'Nasi Goreng', 30000, '07:14:13pm', 2, 0),
(23, 1, 23, 'Indomie (K)', 10000, '07:14:13pm', 1, 0),
(24, 1, 23, 'Nasi Ayam', 48000, '07:14:13pm', 4, 0),
(25, 1, 23, 'Indomie (G)', 10000, '07:14:13pm', 1, 0),
(26, 1, 23, 'Teh Manis(D)', 8000, '07:14:13pm', 1, 0),
(27, 1, 23, 'Kopi Hitam', 35000, '07:14:13pm', 5, 0),
(28, 1, 23, 'Kopi Susu', 10000, '07:14:13pm', 1, 0),
(29, 1, 24, 'Nasi Goreng', 15000, '07:21:56pm', 1, 0),
(30, 1, 24, 'Indomie (K)', 10000, '07:21:56pm', 1, 0),
(31, 1, 24, 'Nasi Ayam', 12000, '07:21:56pm', 1, 0),
(32, 1, 24, 'Indomie (G)', 30000, '07:21:56pm', 3, 0),
(33, 1, 24, 'Nasi Ayam Bakar', 20000, '07:21:56pm', 1, 0),
(34, 1, 24, 'Nasi Goreng Spesial', 60000, '07:21:56pm', 3, 0),
(35, 1, 25, 'Indomie (K)', 10000, '11:48:39am', 1, 0),
(36, 1, 25, 'Nasi Ayam', 12000, '11:48:39am', 1, 0),
(37, 1, 25, 'Indomie (G)', 10000, '11:48:39am', 1, 0),
(38, 1, 26, 'Indomie (K)', 10000, '05:23:35pm', 1, 0),
(39, 1, 26, 'Nasi Ayam', 12000, '05:23:35pm', 1, 0),
(40, 1, 26, 'Indomie (G)', 10000, '05:23:35pm', 1, 0),
(41, 1, 26, 'Nasi Goreng', 15000, '05:23:35pm', 1, 0),
(42, 1, 27, 'Indomie (K)', 10000, '05:25:34pm', 1, 0),
(43, 1, 27, 'Nasi Ayam', 12000, '05:25:34pm', 1, 0),
(44, 1, 27, 'Indomie (G)', 10000, '05:25:34pm', 1, 0),
(45, 1, 27, 'Nasi Goreng', 15000, '05:25:34pm', 1, 0),
(46, 1, 28, 'Indomie (K)', 30000, '05:28:13pm', 3, 0),
(47, 1, 28, 'Nasi Ayam', 12000, '05:28:13pm', 1, 0),
(48, 1, 28, 'Indomie (G)', 10000, '05:28:13pm', 1, 0),
(49, 1, 28, 'Nasi Goreng', 15000, '05:28:13pm', 1, 0),
(50, 1, 29, 'Indomie (K)', 30000, '05:51:16pm', 3, 0),
(51, 1, 29, 'Nasi Ayam', 12000, '05:51:16pm', 1, 0),
(52, 1, 29, 'Indomie (G)', 10000, '05:51:16pm', 1, 0),
(53, 1, 29, 'Nasi Goreng', 15000, '05:51:16pm', 1, 0),
(54, 1, 30, 'Indomie (K)', 30000, '05:54:35pm', 3, 0),
(55, 1, 30, 'Nasi Ayam', 12000, '05:54:35pm', 1, 0),
(56, 1, 30, 'Indomie (G)', 10000, '05:54:35pm', 1, 0),
(57, 1, 30, 'Nasi Goreng', 15000, '05:54:35pm', 1, 0),
(58, 1, 31, 'Indomie (K)', 30000, '05:57:45pm', 3, 0),
(59, 1, 31, 'Nasi Ayam', 12000, '05:57:45pm', 1, 0),
(60, 1, 31, 'Indomie (G)', 10000, '05:57:45pm', 1, 0),
(61, 1, 31, 'Nasi Goreng', 15000, '05:57:45pm', 1, 0),
(62, 1, 31, 'Paket 1', 20000, '05:57:45pm', 1, 0),
(63, 1, 31, 'Paket 2', 30000, '05:57:45pm', 1, 0),
(64, 1, 31, 'Teh Susu (P)', 10000, '05:57:45pm', 1, 0),
(65, 1, 31, 'Teh Manis(D)', 8000, '05:57:45pm', 1, 0),
(66, 1, 31, 'Teh Manis(P)', 7000, '05:57:45pm', 1, 0),
(67, 1, 32, 'Indomie (K)', 10000, '09:40:49am', 1, 0),
(68, 1, 32, 'Nasi Ayam', 12000, '09:40:49am', 1, 0),
(69, 1, 32, 'Indomie (G)', 10000, '09:40:49am', 1, 0),
(70, 1, 32, 'Nasi Goreng', 15000, '09:40:49am', 1, 0),
(71, 1, 33, 'Indomie (K)', 10000, '09:41:36am', 1, 0),
(72, 1, 33, 'Nasi Ayam', 12000, '09:41:36am', 1, 0),
(73, 1, 33, 'Indomie (G)', 10000, '09:41:36am', 1, 0),
(74, 1, 33, 'Nasi Goreng', 15000, '09:41:36am', 1, 0),
(75, 1, 34, 'Indomie (K)', 10000, '09:41:41am', 1, 0),
(76, 1, 34, 'Nasi Ayam', 12000, '09:41:41am', 1, 0),
(77, 1, 34, 'Indomie (G)', 10000, '09:41:41am', 1, 0),
(78, 1, 34, 'Nasi Goreng', 15000, '09:41:41am', 1, 0),
(79, 1, 35, 'Nasi Ayam', 12000, '09:44:46am', 1, 0),
(80, 1, 35, 'Indomie (G)', 10000, '09:44:46am', 1, 0),
(81, 1, 35, 'Indomie (K)', 10000, '09:44:46am', 1, 0),
(82, 1, 36, 'Nasi Goreng', 15000, '01:57:10pm', 1, 0),
(83, 1, 36, 'Indomie (K)', 10000, '01:57:10pm', 1, 0),
(84, 1, 36, 'Nasi Ayam', 36000, '01:57:10pm', 3, 0),
(85, 1, 36, 'Indomie (G)', 30000, '01:57:10pm', 3, 0),
(86, 1, 36, 'Teh Manis(D)', 8000, '01:57:10pm', 1, 0),
(87, 1, 37, 'Nasi Goreng', 15000, '03:02:57pm', 1, 0),
(88, 1, 37, 'Indomie (K)', 10000, '03:02:57pm', 1, 0),
(89, 1, 37, 'Nasi Ayam', 36000, '03:02:57pm', 3, 0),
(90, 1, 37, 'Indomie (G)', 30000, '03:02:57pm', 3, 0),
(91, 1, 37, 'Teh Manis(D)', 8000, '03:02:57pm', 1, 0),
(92, 1, 38, 'Nasi Goreng', 15000, '07:55:44pm', 1, 0),
(93, 1, 38, 'Indomie (K)', 10000, '07:55:44pm', 1, 0),
(94, 1, 38, 'Nasi Ayam', 36000, '07:55:44pm', 3, 0),
(95, 1, 38, 'Indomie (G)', 30000, '07:55:44pm', 3, 0),
(96, 1, 38, 'Teh Manis(D)', 8000, '07:55:44pm', 1, 0),
(97, 1, 39, 'Nasi Goreng', 15000, '08:02:24pm', 1, 0),
(98, 1, 39, 'Indomie (K)', 10000, '08:02:24pm', 1, 0),
(99, 1, 39, 'Nasi Ayam', 36000, '08:02:24pm', 3, 0),
(100, 1, 39, 'Indomie (G)', 30000, '08:02:24pm', 3, 0),
(101, 1, 39, 'Teh Manis(D)', 8000, '08:02:24pm', 1, 0),
(102, 1, 40, 'Nasi Goreng', 15000, '08:05:38pm', 1, 0),
(103, 1, 40, 'Indomie (K)', 10000, '08:05:38pm', 1, 0),
(104, 1, 40, 'Nasi Ayam', 36000, '08:05:38pm', 3, 0),
(105, 1, 40, 'Indomie (G)', 30000, '08:05:38pm', 3, 0),
(106, 1, 40, 'Teh Manis(D)', 8000, '08:05:38pm', 1, 0),
(107, 2, 41, 'Indomie (K)', 20000, '01:42:14pm', 2, 0),
(108, 2, 41, 'Nasi Ayam', 24000, '01:42:14pm', 2, 0),
(109, 2, 41, 'Nasi Goreng', 30000, '01:42:14pm', 2, 0),
(110, 2, 41, 'Kopi Hitam', 14000, '01:42:14pm', 2, 0),
(111, 2, 41, 'Kopi Susu', 20000, '01:42:14pm', 2, 0),
(112, 2, 41, 'Paket 2', 30000, '01:42:14pm', 1, 0),
(113, 2, 41, 'Nugget ayam', 15000, '01:42:14pm', 1, 0),
(114, 1, 42, 'Nasi Ayam', 12000, '07:15:57am', 1, 0),
(115, 1, 42, 'Indomie (K)', 10000, '07:15:57am', 1, 0),
(116, 1, 42, 'Nasi Goreng', 45000, '07:15:57am', 3, 0),
(117, 1, 43, 'Nasi Ayam', 12000, '07:16:38am', 1, 0),
(118, 1, 43, 'Indomie (K)', 10000, '07:16:38am', 1, 0),
(119, 1, 43, 'Nasi Goreng', 45000, '07:16:38am', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

CREATE TABLE `resetpassword` (
  `idcode` int(8) NOT NULL,
  `codeunique` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(23, 1, 158000, 1, 0, '2021-11-19', '07:14:13pm'),
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

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status_pesanan`) VALUES
(0, 0),
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `status_pesanan` (`status_pesanan`);

--
-- Indexes for table `resetpassword`
--
ALTER TABLE `resetpassword`
  ADD PRIMARY KEY (`idcode`);

--
-- Indexes for table `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `status_pesanan` (`status_pesanan`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `idcode` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`status_pesanan`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  ADD CONSTRAINT `riwayat_pembelian_ibfk_1` FOREIGN KEY (`status_pesanan`) REFERENCES `status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
