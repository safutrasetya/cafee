-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 04:42 AM
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
(16, 'Paket 2', '', '', 30000, 4, 50);

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
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
