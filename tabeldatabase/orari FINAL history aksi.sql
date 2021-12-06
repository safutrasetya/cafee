-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 02:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

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
  `gambar` varchar(255) NOT NULL,
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

INSERT INTO `akun` (`id`, `gambar`, `username`, `nama`, `email`, `No_Hp`, `password`, `level`, `waktu_bergabung`) VALUES
(1, '61a3714d45c46.jpg', 'admin', 'Admin Orari', 'suvikovaailio@gmail.com', '081279860111', 'admin123', '2', '2021-12-02 01:27:11'),
(2, '', 'Staff_1', 'Staff 1', 'staffOrari1@gmail.com', '083367893579', 'orari1201', '2', '2021-12-02 01:27:14'),
(9, '61a78ce831c62.png', 'asdsdfs', 'sdfdfgdfg', 'waaaaaa@gmail.com', '786453123485678', 'sdfdfgdfgfh', '3', '2021-12-02 01:27:16'),
(12, '61a822b5a5e6d.jpg', 'Developer', 'Developer Dev', 'Testing@gmail.test', '08126663335454', 'developingweb1', '1', '2021-12-02 01:35:03'),
(13, '61a86dc3d34a4.png', 'Staff', 'nama sataff', 'staff@staff.staff', '035498423134235', 'staff1234', '3', '2021-12-02 06:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(255) NOT NULL,
  `pelaku` varchar(50) NOT NULL,
  `aksi` text NOT NULL,
  `akibat` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `pelaku`, `aksi`, `akibat`, `waktu`) VALUES
(1, 'Admin Orari', 'Penambahan Menu', 'ngetest', '0000-00-00 00:00:00'),
(2, 'Admin Orari', 'Penambahan Menu', 'OKEEe', '2021-12-02 05:28:37'),
(3, 'Admin Orari', 'Penambahan Menu', 'qerwetwrtwrt', '2021-12-02 11:33:40'),
(4, 'Admin Orari', 'Hapus Menu', '27', '2021-12-02 11:41:20'),
(5, 'Admin Orari', 'Hapus Menu', '26', '2021-12-02 11:41:25'),
(6, 'Admin Orari', 'Hapus Menu', '25', '2021-12-02 11:41:29'),
(7, 'Admin Orari', 'Hapus Menu', '24', '2021-12-02 11:41:33'),
(8, 'Admin Orari', 'Hapus Menu', 'id menu 23', '2021-12-02 11:42:53'),
(9, 'Admin Orari', 'Ubah Level', '9', '2021-12-02 11:51:47'),
(10, 'Admin Orari', 'Ubah Level', '9', '2021-12-02 11:51:47'),
(11, 'Admin Orari', 'Update status transaksi menjadi 1', '54', '2021-12-02 12:02:06'),
(12, 'Admin Orari', 'Update status transaksi menjadi 1', '54', '2021-12-02 12:02:06'),
(13, 'Admin Orari', 'Edit Meja', '14', '2021-12-02 12:04:19'),
(14, 'Admin Orari', 'Edit Meja', '14', '2021-12-02 12:04:19'),
(15, 'Admin Orari', 'Edit Meja', '14', '2021-12-02 12:04:40'),
(16, 'Admin Orari', 'Edit Meja', '14', '2021-12-02 12:04:41'),
(17, 'Admin Orari', 'Edit Meja', '14', '2021-12-02 12:04:47'),
(18, 'Admin Orari', 'Edit Meja', '14', '2021-12-02 12:04:50'),
(19, 'Admin Orari', 'Edit Status Meja', '14', '2021-12-02 12:06:10'),
(20, 'Admin Orari', 'Login Staff/Admin', 'Admin Orari', '2021-12-02 12:09:07'),
(21, 'Admin Orari', 'Login Staff/Admin', 'Admin Orari', '2021-12-02 12:09:57'),
(22, 'Admin Orari', 'Login Staff/Admin', 'Admin Orari', '2021-12-02 12:10:24'),
(23, 'Admin Orari', 'Logout Meja', 'Admin Orari', '2021-12-02 12:11:25'),
(24, 'Admin Orari', 'Login Staff/Admin', 'Admin Orari', '2021-12-02 12:55:15'),
(25, 'Admin Orari', 'Logout Staff/Admin', 'Admin Orari', '2021-12-02 13:55:12'),
(26, 'nama sataff', 'Login Staff/Admin', 'nama sataff', '2021-12-02 13:55:43'),
(27, 'nama sataff', 'Logout Staff/Admin', 'nama sataff', '2021-12-02 14:41:58'),
(28, 'Developer Dev', 'Login Staff/Admin', 'Developer Dev', '2021-12-02 14:42:17'),
(29, 'Developer Dev', 'Logout Staff/Admin', 'Developer Dev', '2021-12-02 19:13:06'),
(30, 'Admin Orari', 'Login Staff/Admin', 'Admin Orari', '2021-12-06 08:30:01'),
(31, 'Admin Orari', 'Logout Staff/Admin', 'Admin Orari', '2021-12-06 08:44:22');

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
(11, 11, 'M0011', 0),
(13, 0, '', 0),
(14, 12, 'M0001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mejareservasi`
--

CREATE TABLE `mejareservasi` (
  `id_reservasi` int(255) NOT NULL,
  `nama_plggn` varchar(50) NOT NULL,
  `no_telp` varchar(64) NOT NULL,
  `no_meja` varchar(255) NOT NULL,
  `waktu_rsrvs` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mejareservasi`
--

INSERT INTO `mejareservasi` (`id_reservasi`, `nama_plggn`, `no_telp`, `no_meja`, `waktu_rsrvs`) VALUES
(1, 'Safutra', '2147483647', '11', '2021-12-08 17:40:00'),
(2, 'rfghfsgjrtrst', '1432443464566', '9', '2021-12-19 17:55:00'),
(3, 'rfghfsgjrtrst', '1432443464566', '5', '2021-12-19 17:55:00'),
(4, 'Safutra', '12312312312', '1', '2021-12-23 20:06:00'),
(5, 'Safutra', '123123124', '6', '2021-12-21 19:09:00'),
(6, 'assfsdfsdf', '1225235345345', '1', '2021-12-02 22:08:00');

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
(22, 'asdasdasd', '61a785445d208.png', 'TESTING', 123123123, 1, 1);

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
  `status_pesanan` int(11) NOT NULL,
  `banyak_psn` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_meja`, `id_transaksi`, `nama_pesanan`, `harga_pesanan`, `waktu_pesanan`, `status_pesanan`, `banyak_psn`) VALUES
(1, 1, 20, 'Nasi Goreng', 15000, '06:58:37pm', 0, 1),
(2, 1, 20, 'Indomie (K)', 10000, '06:58:37pm', 0, 1),
(3, 1, 20, 'Nasi Ayam', 12000, '06:58:37pm', 0, 1),
(4, 1, 20, 'Indomie (G)', 10000, '06:58:37pm', 0, 1),
(5, 1, 20, 'Teh Manis(D)', 8000, '06:58:37pm', 0, 1),
(6, 1, 20, 'Kopi Hitam', 28000, '06:58:37pm', 0, 4),
(7, 1, 20, 'Kopi Susu', 10000, '06:58:37pm', 0, 1),
(8, 1, 21, 'Nasi Goreng', 15000, '07:02:08pm', 0, 1),
(9, 1, 21, 'Indomie (K)', 10000, '07:02:08pm', 0, 1),
(10, 1, 21, 'Nasi Ayam', 12000, '07:02:08pm', 0, 1),
(11, 1, 21, 'Indomie (G)', 10000, '07:02:08pm', 0, 1),
(12, 1, 21, 'Teh Manis(D)', 8000, '07:02:08pm', 0, 1),
(13, 1, 21, 'Kopi Hitam', 28000, '07:02:08pm', 0, 4),
(14, 1, 21, 'Kopi Susu', 10000, '07:02:08pm', 0, 1),
(15, 1, 22, 'Nasi Goreng', 15000, '07:05:06pm', 0, 1),
(16, 1, 22, 'Indomie (K)', 10000, '07:05:06pm', 0, 1),
(17, 1, 22, 'Nasi Ayam', 48000, '07:05:06pm', 0, 4),
(18, 1, 22, 'Indomie (G)', 10000, '07:05:06pm', 0, 1),
(19, 1, 22, 'Teh Manis(D)', 8000, '07:05:06pm', 0, 1),
(20, 1, 22, 'Kopi Hitam', 28000, '07:05:06pm', 0, 4),
(21, 1, 22, 'Kopi Susu', 10000, '07:05:06pm', 0, 1),
(22, 1, 23, 'Nasi Goreng', 30000, '07:14:13pm', 0, 2),
(23, 1, 23, 'Indomie (K)', 10000, '07:14:13pm', 0, 1),
(24, 1, 23, 'Nasi Ayam', 48000, '07:14:13pm', 0, 4),
(25, 1, 23, 'Indomie (G)', 10000, '07:14:13pm', 0, 1),
(26, 1, 23, 'Teh Manis(D)', 8000, '07:14:13pm', 0, 1),
(27, 1, 23, 'Kopi Hitam', 35000, '07:14:13pm', 0, 5),
(28, 1, 23, 'Kopi Susu', 10000, '07:14:13pm', 0, 1),
(29, 1, 24, 'Nasi Goreng', 15000, '07:21:56pm', 0, 1),
(30, 1, 24, 'Indomie (K)', 10000, '07:21:56pm', 0, 1),
(31, 1, 24, 'Nasi Ayam', 12000, '07:21:56pm', 0, 1),
(32, 1, 24, 'Indomie (G)', 30000, '07:21:56pm', 0, 3),
(33, 1, 24, 'Nasi Ayam Bakar', 20000, '07:21:56pm', 0, 1),
(34, 1, 24, 'Nasi Goreng Spesial', 60000, '07:21:56pm', 0, 3),
(35, 1, 25, 'Indomie (K)', 10000, '11:48:39am', 0, 1),
(36, 1, 25, 'Nasi Ayam', 12000, '11:48:39am', 0, 1),
(37, 1, 25, 'Indomie (G)', 10000, '11:48:39am', 0, 1),
(38, 1, 26, 'Indomie (K)', 10000, '05:23:35pm', 0, 1),
(39, 1, 26, 'Nasi Ayam', 12000, '05:23:35pm', 0, 1),
(40, 1, 26, 'Indomie (G)', 10000, '05:23:35pm', 0, 1),
(41, 1, 26, 'Nasi Goreng', 15000, '05:23:35pm', 0, 1),
(42, 1, 27, 'Indomie (K)', 10000, '05:25:34pm', 0, 1),
(43, 1, 27, 'Nasi Ayam', 12000, '05:25:34pm', 0, 1),
(44, 1, 27, 'Indomie (G)', 10000, '05:25:34pm', 0, 1),
(45, 1, 27, 'Nasi Goreng', 15000, '05:25:34pm', 0, 1),
(46, 1, 28, 'Indomie (K)', 30000, '05:28:13pm', 0, 3),
(47, 1, 28, 'Nasi Ayam', 12000, '05:28:13pm', 0, 1),
(48, 1, 28, 'Indomie (G)', 10000, '05:28:13pm', 0, 1),
(49, 1, 28, 'Nasi Goreng', 15000, '05:28:13pm', 0, 1),
(50, 1, 29, 'Indomie (K)', 30000, '05:51:16pm', 0, 3),
(51, 1, 29, 'Nasi Ayam', 12000, '05:51:16pm', 0, 1),
(52, 1, 29, 'Indomie (G)', 10000, '05:51:16pm', 0, 1),
(53, 1, 29, 'Nasi Goreng', 15000, '05:51:16pm', 0, 1),
(54, 1, 30, 'Indomie (K)', 30000, '05:54:35pm', 0, 3),
(55, 1, 30, 'Nasi Ayam', 12000, '05:54:35pm', 0, 1),
(56, 1, 30, 'Indomie (G)', 10000, '05:54:35pm', 0, 1),
(57, 1, 30, 'Nasi Goreng', 15000, '05:54:35pm', 0, 1),
(58, 1, 31, 'Indomie (K)', 30000, '05:57:45pm', 0, 3),
(59, 1, 31, 'Nasi Ayam', 12000, '05:57:45pm', 0, 1),
(60, 1, 31, 'Indomie (G)', 10000, '05:57:45pm', 0, 1),
(61, 1, 31, 'Nasi Goreng', 15000, '05:57:45pm', 0, 1),
(62, 1, 31, 'Paket 1', 20000, '05:57:45pm', 0, 1),
(63, 1, 31, 'Paket 2', 30000, '05:57:45pm', 0, 1),
(64, 1, 31, 'Teh Susu (P)', 10000, '05:57:45pm', 0, 1),
(65, 1, 31, 'Teh Manis(D)', 8000, '05:57:45pm', 0, 1),
(66, 1, 31, 'Teh Manis(P)', 7000, '05:57:45pm', 0, 1),
(67, 1, 32, 'Indomie (K)', 10000, '09:40:49am', 0, 1),
(68, 1, 32, 'Nasi Ayam', 12000, '09:40:49am', 0, 1),
(69, 1, 32, 'Indomie (G)', 10000, '09:40:49am', 0, 1),
(70, 1, 32, 'Nasi Goreng', 15000, '09:40:49am', 0, 1),
(71, 1, 33, 'Indomie (K)', 10000, '09:41:36am', 0, 1),
(72, 1, 33, 'Nasi Ayam', 12000, '09:41:36am', 0, 1),
(73, 1, 33, 'Indomie (G)', 10000, '09:41:36am', 0, 1),
(74, 1, 33, 'Nasi Goreng', 15000, '09:41:36am', 0, 1),
(75, 1, 34, 'Indomie (K)', 10000, '09:41:41am', 0, 1),
(76, 1, 34, 'Nasi Ayam', 12000, '09:41:41am', 0, 1),
(77, 1, 34, 'Indomie (G)', 10000, '09:41:41am', 0, 1),
(78, 1, 34, 'Nasi Goreng', 15000, '09:41:41am', 0, 1),
(79, 1, 35, 'Nasi Ayam', 12000, '09:44:46am', 0, 1),
(80, 1, 35, 'Indomie (G)', 10000, '09:44:46am', 0, 1),
(81, 1, 35, 'Indomie (K)', 10000, '09:44:46am', 0, 1),
(82, 1, 36, 'Nasi Goreng', 15000, '01:57:10pm', 0, 1),
(83, 1, 36, 'Indomie (K)', 10000, '01:57:10pm', 0, 1),
(84, 1, 36, 'Nasi Ayam', 36000, '01:57:10pm', 0, 3),
(85, 1, 36, 'Indomie (G)', 30000, '01:57:10pm', 0, 3),
(86, 1, 36, 'Teh Manis(D)', 8000, '01:57:10pm', 0, 1),
(87, 1, 37, 'Nasi Goreng', 15000, '03:02:57pm', 0, 1),
(88, 1, 37, 'Indomie (K)', 10000, '03:02:57pm', 0, 1),
(89, 1, 37, 'Nasi Ayam', 36000, '03:02:57pm', 0, 3),
(90, 1, 37, 'Indomie (G)', 30000, '03:02:57pm', 0, 3),
(91, 1, 37, 'Teh Manis(D)', 8000, '03:02:57pm', 0, 1),
(92, 1, 38, 'Nasi Goreng', 15000, '07:55:44pm', 0, 1),
(93, 1, 38, 'Indomie (K)', 10000, '07:55:44pm', 0, 1),
(94, 1, 38, 'Nasi Ayam', 36000, '07:55:44pm', 0, 3),
(95, 1, 38, 'Indomie (G)', 30000, '07:55:44pm', 0, 3),
(96, 1, 38, 'Teh Manis(D)', 8000, '07:55:44pm', 0, 1),
(97, 1, 39, 'Nasi Goreng', 15000, '08:02:24pm', 0, 1),
(98, 1, 39, 'Indomie (K)', 10000, '08:02:24pm', 0, 1),
(99, 1, 39, 'Nasi Ayam', 36000, '08:02:24pm', 0, 3),
(100, 1, 39, 'Indomie (G)', 30000, '08:02:24pm', 0, 3),
(101, 1, 39, 'Teh Manis(D)', 8000, '08:02:24pm', 0, 1),
(102, 1, 40, 'Nasi Goreng', 15000, '08:05:38pm', 0, 1),
(103, 1, 40, 'Indomie (K)', 10000, '08:05:38pm', 0, 1),
(104, 1, 40, 'Nasi Ayam', 36000, '08:05:38pm', 0, 3),
(105, 1, 40, 'Indomie (G)', 30000, '08:05:38pm', 0, 3),
(106, 1, 40, 'Teh Manis(D)', 8000, '08:05:38pm', 0, 1),
(107, 2, 41, 'Indomie (K)', 20000, '01:42:14pm', 0, 2),
(108, 2, 41, 'Nasi Ayam', 24000, '01:42:14pm', 0, 2),
(109, 2, 41, 'Nasi Goreng', 30000, '01:42:14pm', 0, 2),
(110, 2, 41, 'Kopi Hitam', 14000, '01:42:14pm', 0, 2),
(111, 2, 41, 'Kopi Susu', 20000, '01:42:14pm', 0, 2),
(112, 2, 41, 'Paket 2', 30000, '01:42:14pm', 0, 1),
(113, 2, 41, 'Nugget ayam', 15000, '01:42:14pm', 0, 1),
(114, 1, 42, 'Nasi Ayam', 12000, '07:15:57am', 0, 1),
(115, 1, 42, 'Indomie (K)', 10000, '07:15:57am', 0, 1),
(116, 1, 42, 'Nasi Goreng', 45000, '07:15:57am', 0, 3),
(117, 1, 43, 'Nasi Ayam', 12000, '07:16:38am', 0, 1),
(118, 1, 43, 'Indomie (K)', 10000, '07:16:38am', 0, 1),
(119, 1, 43, 'Nasi Goreng', 45000, '07:16:38am', 0, 3),
(120, 1, 44, 'Teh Manis(P)', 7000, '07:10:02pm', 0, 1),
(121, 1, 44, 'Teh Manis(D)', 8000, '07:10:02pm', 0, 1),
(122, 1, 44, 'Teh Susu (D)', 12000, '07:10:02pm', 0, 1),
(123, 1, 45, 'Teh Manis(P)', 7000, '07:10:24pm', 0, 1),
(124, 1, 45, 'Teh Manis(D)', 8000, '07:10:24pm', 0, 1),
(125, 1, 45, 'Teh Susu (D)', 12000, '07:10:24pm', 0, 1),
(126, 1, 46, 'Nasi Ayam', 24000, '08:06:01am', 0, 2),
(127, 1, 46, 'Indomie (K)', 20000, '08:06:01am', 0, 2),
(128, 1, 46, 'Indomie (G)', 20000, '08:06:01am', 0, 2),
(129, 1, 47, 'Nasi Ayam', 12000, '10:52:36am', 0, 1),
(130, 1, 47, 'Indomie (G)', 10000, '10:52:36am', 0, 1),
(131, 1, 47, 'Nasi Goreng Spesial', 20000, '10:52:36am', 0, 1),
(132, 1, 48, 'Nasi Ayam', 24000, '11:02:15am', 0, 2),
(133, 1, 48, 'Indomie (G)', 20000, '11:02:15am', 0, 2),
(134, 1, 48, 'Nasi Goreng Spesial', 20000, '11:02:15am', 0, 1),
(135, 1, 49, 'Nasi Ayam', 24000, '11:07:35am', 0, 2),
(136, 1, 49, 'Indomie (G)', 20000, '11:07:35am', 0, 2),
(137, 1, 49, 'Nasi Goreng Spesial', 20000, '11:07:35am', 0, 1),
(138, 1, 50, 'Nasi Ayam', 24000, '11:15:23am', 0, 2),
(139, 1, 50, 'Indomie (G)', 20000, '11:15:23am', 0, 2),
(140, 1, 50, 'Nasi Goreng Spesial', 20000, '11:15:23am', 0, 1),
(141, 1, 51, 'Nasi Ayam', 24000, '11:18:02am', 0, 2),
(142, 1, 51, 'Indomie (G)', 20000, '11:18:02am', 0, 2),
(143, 1, 51, 'Nasi Goreng Spesial', 20000, '11:18:02am', 0, 1),
(144, 1, 52, 'Nasi Ayam', 24000, '11:21:05am', 0, 2),
(145, 1, 52, 'Indomie (G)', 20000, '11:21:05am', 0, 2),
(146, 1, 52, 'Nasi Goreng Spesial', 20000, '11:21:05am', 0, 1),
(147, 1, 52, 'Indomie (K)', 10000, '11:21:05am', 0, 1),
(148, 1, 53, 'Nasi Goreng', 15000, '02:11:17am', 0, 1),
(149, 1, 53, 'Indomie (K)', 20000, '02:11:17am', 0, 2),
(150, 1, 53, 'Nasi Ayam', 24000, '02:11:17am', 0, 2),
(151, 1, 53, 'Indomie (G)', 10000, '02:11:17am', 0, 1),
(152, 1, 54, 'Nasi Goreng', 15000, '02:13:36am', 0, 1),
(153, 1, 54, 'Indomie (K)', 20000, '02:13:36am', 0, 2),
(154, 1, 54, 'Nasi Ayam', 24000, '02:13:36am', 0, 2),
(155, 1, 54, 'Indomie (G)', 10000, '02:13:36am', 0, 1),
(156, 1, 54, 'Teh Susu (D)', 12000, '02:13:36am', 0, 1),
(157, 1, 54, 'Teh Susu (P)', 10000, '02:13:36am', 0, 1),
(158, 1, 54, 'Teh Manis(D)', 8000, '02:13:36am', 0, 1),
(159, 1, 54, 'Teh Manis(P)', 7000, '02:13:36am', 0, 1),
(160, 1, 54, 'Roti bakar', 10000, '02:13:36am', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

CREATE TABLE `resetpassword` (
  `idcode` int(8) NOT NULL,
  `codeunique` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resetpassword`
--

INSERT INTO `resetpassword` (`idcode`, `codeunique`, `email`) VALUES
(12, '161a78d35dfd38', 'suvikovaailio@gmail.com'),
(13, '161a78d49aaa2a', 'suvikovaailio@gmail.com');

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
(20, 1, 87000, 1, 1, '2019-11-01', ''),
(22, 1, 138000, 1, 0, '2019-11-08', '07:05:06pm'),
(23, 1, 158000, 1, 1, '2021-11-19', '07:14:13pm'),
(24, 1, 147000, 0, 0, '2020-11-11', '07:21:56pm'),
(25, 1, 32000, 1, 1, '2020-11-20', '11:48:39am'),
(26, 1, 47000, 0, 1, '2021-11-20', '05:23:35pm'),
(27, 1, 47000, 0, 1, '2021-11-20', '05:25:34pm'),
(28, 1, 77000, 0, 0, '2021-11-20', '05:28:13pm'),
(29, 1, 77000, 1, 0, '2021-11-20', '05:51:16pm'),
(30, 1, 77000, 1, 0, '2021-11-20', '05:54:35pm'),
(33, 1, 47000, 1, 0, '2021-11-21', '09:41:36am'),
(34, 1, 47000, 0, 0, '2021-11-21', '09:41:41am'),
(35, 1, 32000, 1, 0, '2021-09-02', '09:44:46am'),
(36, 1, 99000, 1, 0, '2021-11-22', '01:57:10pm'),
(41, 2, 156000, 1, 0, '2021-11-24', '01:42:14pm'),
(42, 1, 61000, 0, 0, '2021-11-25', '07:15:57am'),
(43, 1, 61000, 0, 0, '2021-11-25', '07:16:38am'),
(44, 1, 27000, 0, 0, '2021-11-28', '07:10:02pm'),
(45, 1, 27000, 0, 0, '2021-11-28', '07:10:24pm'),
(46, 1, 64000, 1, 0, '2021-12-01', '08:06:01am'),
(47, 1, 42000, 0, 0, '2021-12-01', '10:52:36am'),
(48, 1, 64000, 0, 0, '2021-12-01', '11:02:15am'),
(49, 1, 64000, 0, 0, '2021-12-01', '11:07:35am'),
(50, 1, 64000, 0, 0, '2021-12-01', '11:15:23am'),
(51, 1, 64000, 1, 0, '2021-12-01', '11:18:02am'),
(52, 1, 74000, 1, 0, '2021-12-01', '11:21:05am'),
(53, 1, 69000, 0, 0, '2021-12-02', '02:11:17am'),
(54, 1, 109000, 1, 0, '2021-12-02', '02:13:36am');

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
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `mejareservasi`
--
ALTER TABLE `mejareservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

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
  ADD KEY `status_pesanan` (`status_pesanan`),
  ADD KEY `id_meja` (`id_meja`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mejareservasi`
--
ALTER TABLE `mejareservasi`
  MODIFY `id_reservasi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `idcode` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat_pembelian`
--
ALTER TABLE `riwayat_pembelian`
  ADD CONSTRAINT `id_meja_rtrnsks` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_pembelian_ibfk_1` FOREIGN KEY (`status_pesanan`) REFERENCES `status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
