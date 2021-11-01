-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 04:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `meja` int(2) NOT NULL,
  `pass_meja` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id_meja`, `meja`, `pass_meja`) VALUES
(1, 1, 'M0001'),
(2, 2, 'M0002'),
(3, 3, 'M0003'),
(4, 4, 'M0004'),
(5, 5, 'M0005'),
(6, 6, 'M0006'),
(7, 7, 'M0007'),
(8, 8, 'M0008'),
(9, 9, 'M0009'),
(10, 10, 'M0010');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
