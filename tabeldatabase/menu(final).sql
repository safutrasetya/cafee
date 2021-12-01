-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 02:34 PM
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
(1, 'Kentang Goreng', 'kentang_goreng.jpg', '', 10000, 3, 20),
(2, 'Nugget ayam', 'nugget_ayam.jpg', '', 15000, 3, 30),
(3, 'Pisang Goreng', 'pisang_goreng.jpeg', '', 10000, 3, 40),
(4, 'Roti bakar', 'roti_bakar.jpg', '', 10000, 3, 50),
(5, 'Teh Manis(P)', 'teh_panas.jpg', '', 7000, 2, 100),
(6, 'Teh Manis(D)', 'teh_dingin.jpg', '', 8000, 2, 100),
(7, 'Kopi Hitam', 'kopi_hitam.jpg', '', 7000, 2, 100),
(8, 'Kopi Susu', 'kopi_susu.jpg', '', 10000, 2, 100),
(9, 'Teh Susu (P)', 'teh_susu_panas.jpg', '', 10000, 2, 100),
(10, 'Teh Susu (D)', 'teh_susu_dingin.jpg', '', 12000, 2, 100),
(11, 'Nasi Goreng', 'nasi_goreng.jpeg', '', 15000, 1, 50),
(12, 'Indomie (K)', 'indomie_kuah.jpg', '', 10000, 1, 50),
(13, 'Nasi Ayam', 'nasi_ayam.jpg', '', 12000, 1, 50),
(14, 'Indomie (G)', 'indomie_goreng.jpg', '', 10000, 1, 50),
(15, 'Paket 1', 'paket1.jpg', '', 20000, 4, 50),
(16, 'Paket 2', 'paket2.jpg', '', 30000, 4, 50),
(17, 'Nasi Goreng Spesial', 'nasi_goreng_spesial.jpg', 'NASI GORENGNYA SPECIAL', 20000, 1, 1),
(18, 'Nasi Ayam Bakar', 'nasi_ayam_bakar.jpg', 'NASINYA PAKE AYAM BAKAR', 20000, 1, 1),
(19, 'asdasd', '61a44febb54f5.png', 'asdasdasd', 123123, 0, 0),
(20, 'testsetrset', '61a46aa8cd537.jpg', 'serset', 234234234, 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
