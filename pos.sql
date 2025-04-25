-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2025 at 12:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `flag` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `flag`, `name`, `create_at`, `update_at`) VALUES
(1, 'MKN', 'MAKANAN', '2025-04-12 16:40:06', '2025-04-12 16:40:06'),
(2, 'MIN', 'MINUMAN', '2025-04-12 17:40:50', '2025-04-12 17:40:50'),
(3, 'ATK', 'ALAT TULIS KANTOR', '2025-04-12 17:41:20', '2025-04-12 17:41:20'),
(4, 'OTR', 'OTHERS', '2025-04-13 03:38:21', '2025-04-13 03:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `aksi` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id`, `id_user`, `aksi`, `waktu`, `keterangan`) VALUES
(2, 5, 'Login', '2025-04-20 21:05:21', 'Login ke sistem'),
(3, 5, 'Login', '2025-04-20 21:08:33', 'Login ke sistem'),
(4, 5, 'Logout', '2025-04-20 21:10:57', 'Logout dari sistem'),
(5, 5, 'Login', '2025-04-20 21:11:03', 'Login ke sistem'),
(6, 5, 'Logout', '2025-04-20 21:11:05', 'Logout dari sistem'),
(7, 5, 'Login', '2025-04-20 21:11:25', 'Login ke sistem'),
(9, 5, 'Hapus Produk', '2025-04-20 21:13:52', 'Hapus produk ID: 5056865663452'),
(10, 5, 'Hapus Produk', '2025-04-20 21:14:15', 'Hapus produk ID: 3660441379666'),
(13, 5, 'Update Produk', '2025-04-20 21:20:40', 'Melakukan Pengurangan Stok Produk ID: 8998989100120'),
(14, 5, 'Update Produk', '2025-04-20 21:21:18', 'Melakukan Penambahan Stok Produk ID: 8998989100120'),
(15, 5, 'Hapus Produk', '2025-04-20 21:28:37', 'Hapus produk ID: '),
(16, 5, 'Add Produk', '2025-04-20 21:28:57', 'Melakukan Penambahan Produk ID: 454546456445'),
(17, 5, 'Hapus Produk', '2025-04-20 21:28:57', 'Hapus produk ID: '),
(18, 5, 'Hapus Produk', '2025-04-20 21:29:35', 'Hapus produk ID: 454546456445'),
(19, 5, 'Transaksi Produk', '2025-04-20 21:31:22', 'Melakukan Transaksi Produk ID: 39'),
(20, 5, 'Hapus users', '2025-04-20 21:35:57', 'Melakukan Hapus User ID: '),
(21, 5, 'Hapus users', '2025-04-20 21:36:04', 'Melakukan Hapus User ID: '),
(22, 5, 'Update User oleh superadmin', '2025-04-20 21:36:15', 'Melakukan Update User'),
(23, 5, 'Hapus users', '2025-04-20 21:36:15', 'Melakukan Hapus User ID: '),
(24, 5, 'Logout', '2025-04-20 21:36:31', 'Logout dari sistem'),
(25, 3, 'Login', '2025-04-20 21:36:37', 'Login ke sistem'),
(26, 3, 'Update Profile User', '2025-04-20 21:36:52', 'Melakukan Update Profil User'),
(27, 3, 'Logout', '2025-04-20 21:39:58', 'Logout dari sistem'),
(28, 4, 'Login', '2025-04-20 21:50:03', 'Login ke sistem'),
(29, 4, 'Transaksi Produk', '2025-04-20 21:54:14', 'Melakukan Transaksi Produk ID: 40'),
(30, 4, 'Logout', '2025-04-20 22:33:18', 'Logout dari sistem'),
(31, 5, 'Login', '2025-04-20 22:33:31', 'Login ke sistem'),
(32, 5, 'Hapus users', '2025-04-20 22:47:08', 'Melakukan Hapus User ID: '),
(33, 5, 'Hapus users', '2025-04-20 22:47:35', 'Melakukan Hapus User ID: '),
(34, 5, 'Logout', '2025-04-20 22:59:17', 'Logout dari sistem'),
(35, 3, 'Login', '2025-04-20 22:59:25', 'Login ke sistem'),
(36, 3, 'Logout', '2025-04-20 22:59:30', 'Logout dari sistem'),
(37, 5, 'Login', '2025-04-20 22:59:39', 'Login ke sistem'),
(38, 5, 'Logout', '2025-04-21 09:59:36', 'Logout dari sistem'),
(39, 3, 'Login', '2025-04-21 10:00:35', 'Login ke sistem'),
(40, 3, 'Logout', '2025-04-21 10:15:02', 'Logout dari sistem'),
(41, 3, 'Login', '2025-04-21 10:15:09', 'Login ke sistem'),
(42, 3, 'Logout', '2025-04-21 10:19:39', 'Logout dari sistem'),
(43, 3, 'Login', '2025-04-21 10:20:48', 'Login ke sistem'),
(44, 3, 'Logout', '2025-04-21 10:23:04', 'Logout dari sistem'),
(45, 3, 'Login', '2025-04-21 10:26:04', 'Login ke sistem'),
(46, 3, 'Logout', '2025-04-21 10:28:02', 'Logout dari sistem'),
(47, 3, 'Login', '2025-04-21 10:28:10', 'Login ke sistem'),
(48, 3, 'Login', '2025-04-21 10:32:50', 'Login ke sistem'),
(49, 3, 'Login', '2025-04-21 10:40:05', 'Login ke sistem'),
(50, 3, 'Logout', '2025-04-21 10:43:12', 'Logout dari sistem'),
(51, 3, 'Login', '2025-04-21 10:43:45', 'Login ke sistem'),
(52, 5, 'Login', '2025-04-21 11:01:42', 'Login ke sistem'),
(53, 5, 'Login', '2025-04-21 11:18:42', 'Login ke sistem'),
(54, 5, 'Logout', '2025-04-21 11:18:44', 'Logout dari sistem'),
(55, 5, 'Login', '2025-04-21 11:19:12', 'Login ke sistem'),
(56, 5, 'Logout', '2025-04-21 11:19:14', 'Logout dari sistem'),
(57, 3, 'Login', '2025-04-21 11:19:24', 'Login ke sistem'),
(58, 3, 'Logout', '2025-04-21 11:19:26', 'Logout dari sistem'),
(59, 5, 'Login', '2025-04-21 11:19:32', 'Login ke sistem'),
(60, 5, 'Hapus users', '2025-04-21 11:19:40', 'Melakukan Hapus User ID: '),
(61, 5, 'Logout', '2025-04-21 11:29:23', 'Logout dari sistem'),
(62, 5, 'Login', '2025-04-21 11:29:44', 'Login ke sistem'),
(63, 5, 'Hapus users', '2025-04-21 11:30:11', 'Melakukan Hapus User ID: '),
(64, 5, 'Hapus Produk', '2025-04-21 11:30:20', 'Hapus produk ID: '),
(65, 5, 'Update Produk', '2025-04-21 11:33:00', 'Melakukan Penambahan Stok Produk ID: 8991389211526'),
(66, 5, 'Transaksi Produk', '2025-04-21 11:33:27', 'Melakukan Transaksi Produk ID: 41'),
(67, 5, 'Logout', '2025-04-21 11:35:44', 'Logout dari sistem'),
(68, 5, 'Login', '2025-04-21 11:35:51', 'Login ke sistem'),
(69, 5, 'Login', '2025-04-21 12:04:02', 'Login ke sistem'),
(70, 5, 'Hapus users', '2025-04-21 12:30:10', 'Melakukan Hapus User ID: '),
(71, 5, 'Hapus Produk', '2025-04-21 12:41:50', 'Hapus produk ID: '),
(72, 5, 'Hapus Produk', '2025-04-21 12:48:36', 'Hapus produk ID: '),
(73, 5, 'Hapus Produk', '2025-04-21 12:48:45', 'Hapus produk ID: '),
(74, 5, 'Hapus Produk', '2025-04-21 12:49:01', 'Hapus produk ID: '),
(75, 5, 'Hapus Produk', '2025-04-21 12:49:04', 'Hapus produk ID: '),
(76, 5, 'Logout', '2025-04-21 12:51:34', 'Logout dari sistem'),
(77, 4, 'Login', '2025-04-21 12:51:48', 'Login ke sistem'),
(78, 5, 'Login', '2025-04-21 13:44:46', 'Login ke sistem'),
(79, 5, 'Login', '2025-04-21 14:02:33', 'Login ke sistem'),
(80, 5, 'Hapus users', '2025-04-21 14:06:08', 'Melakukan Hapus User ID: '),
(81, 5, 'Hapus users', '2025-04-21 14:06:15', 'Melakukan Hapus User ID: '),
(82, 5, 'Hapus Produk', '2025-04-21 14:07:19', 'Hapus produk ID: '),
(83, 5, 'Hapus Produk', '2025-04-21 14:07:20', 'Hapus produk ID: '),
(84, 5, 'Logout', '2025-04-21 14:08:07', 'Logout dari sistem'),
(85, 4, 'Login', '2025-04-22 08:47:25', 'Login ke sistem'),
(86, 4, 'Logout', '2025-04-22 08:59:44', 'Logout dari sistem'),
(87, 5, 'Login', '2025-04-22 08:59:51', 'Login ke sistem'),
(88, 5, 'Hapus Produk', '2025-04-22 09:13:38', 'Hapus produk ID: '),
(89, 5, 'Hapus Produk', '2025-04-22 09:15:16', 'Hapus produk ID: '),
(90, 5, 'Hapus Produk', '2025-04-22 09:15:36', 'Hapus produk ID: '),
(91, 5, 'Hapus Produk', '2025-04-22 09:18:32', 'Hapus produk ID: '),
(92, 5, 'Hapus Produk', '2025-04-22 09:18:42', 'Hapus produk ID: '),
(93, 5, 'Hapus Produk', '2025-04-22 09:19:05', 'Hapus produk ID: '),
(94, 5, 'Logout', '2025-04-22 09:27:42', 'Logout dari sistem'),
(95, 5, 'Login', '2025-04-22 09:27:49', 'Login ke sistem'),
(96, 5, 'Hapus Produk', '2025-04-22 09:29:07', 'Hapus produk ID: '),
(97, 5, 'Hapus Produk', '2025-04-22 09:29:07', 'Hapus produk ID: '),
(98, 5, 'Logout', '2025-04-22 09:34:58', 'Logout dari sistem'),
(99, 5, 'Login', '2025-04-22 09:35:09', 'Login ke sistem'),
(100, 5, 'Hapus Produk', '2025-04-22 09:40:10', 'Hapus produk ID: '),
(101, 5, 'Hapus Produk', '2025-04-22 09:40:15', 'Hapus produk ID: '),
(102, 5, 'Hapus Produk', '2025-04-22 09:40:27', 'Hapus produk ID: '),
(103, 5, 'Hapus Produk', '2025-04-22 09:44:12', 'Hapus produk ID: '),
(104, 5, 'Hapus Produk', '2025-04-22 09:44:14', 'Hapus produk ID: '),
(105, 5, 'Hapus Produk', '2025-04-22 09:47:15', 'Hapus produk ID: '),
(106, 5, 'Hapus Produk', '2025-04-22 09:47:37', 'Hapus produk ID: '),
(107, 5, 'Hapus Produk', '2025-04-22 09:49:24', 'Hapus produk ID: '),
(108, 5, 'Login', '2025-04-22 11:16:24', 'Login ke sistem'),
(109, 5, 'Transaksi Produk', '2025-04-22 11:54:23', 'Melakukan Transaksi Produk ID: 42'),
(110, 5, 'Update Produk', '2025-04-22 11:55:30', 'Melakukan Penambahan Stok Produk ID: 8267312918842'),
(111, 5, 'Pengembalian Produk', '2025-04-22 11:56:33', 'Melakukan Retur Stok Produk ID: 8267312918842'),
(112, 5, 'Update Produk', '2025-04-22 11:57:12', 'Melakukan Pengurangan Stok Produk ID: 8267312918842'),
(113, 5, 'Pengembalian Produk', '2025-04-22 11:57:53', 'Melakukan Retur Stok Produk ID: 8267312918842'),
(114, 5, 'Update Produk', '2025-04-22 11:59:14', 'Melakukan Pengurangan Stok Produk ID: 8267312918842'),
(115, 5, 'Pengembalian Produk', '2025-04-22 12:00:40', 'Melakukan Retur Stok Produk ID: 8267312918842'),
(116, 5, 'Update Produk', '2025-04-22 12:01:15', 'Melakukan Pengurangan Stok Produk ID: 8267312918842'),
(117, 5, 'Pengembalian Produk', '2025-04-22 12:01:30', 'Melakukan Retur Stok Produk ID: 8267312918842'),
(118, 5, 'Pengembalian Produk', '2025-04-22 12:02:45', 'Melakukan Retur Stok Produk ID: 5354876797557'),
(119, 5, 'Pengembalian Produk', '2025-04-22 12:04:49', 'Melakukan Retur Stok Produk ID: 8886012207123'),
(120, 5, 'Logout', '2025-04-22 12:08:58', 'Logout dari sistem'),
(121, 3, 'Login', '2025-04-22 12:09:05', 'Login ke sistem'),
(122, 3, 'Hapus Produk', '2025-04-22 12:11:32', 'Hapus produk ID: '),
(123, 3, 'Hapus Produk', '2025-04-22 12:11:35', 'Hapus produk ID: '),
(124, 3, 'Hapus Produk', '2025-04-22 12:13:54', 'Hapus produk ID: '),
(125, 3, 'Hapus Produk', '2025-04-22 12:13:55', 'Hapus produk ID: '),
(126, 3, 'Hapus Produk', '2025-04-22 12:13:56', 'Hapus produk ID: '),
(127, 3, 'Hapus Produk', '2025-04-22 12:13:57', 'Hapus produk ID: '),
(128, 3, 'Hapus Produk', '2025-04-22 12:13:58', 'Hapus produk ID: '),
(129, 3, 'Hapus Produk', '2025-04-22 12:14:01', 'Hapus produk ID: '),
(130, 3, 'Hapus Produk', '2025-04-22 12:14:01', 'Hapus produk ID: '),
(131, 3, 'Hapus Produk', '2025-04-22 12:14:02', 'Hapus produk ID: '),
(132, 3, 'Hapus Produk', '2025-04-22 12:14:03', 'Hapus produk ID: '),
(133, 3, 'Hapus Produk', '2025-04-22 12:14:04', 'Hapus produk ID: '),
(134, 3, 'Hapus Produk', '2025-04-22 12:14:05', 'Hapus produk ID: '),
(135, 3, 'Hapus Produk', '2025-04-22 12:14:07', 'Hapus produk ID: '),
(136, 3, 'Hapus Produk', '2025-04-22 12:14:07', 'Hapus produk ID: '),
(137, 3, 'Hapus Produk', '2025-04-22 12:14:08', 'Hapus produk ID: '),
(138, 3, 'Hapus Produk', '2025-04-22 12:14:11', 'Hapus produk ID: '),
(139, 3, 'Hapus Produk', '2025-04-22 12:14:12', 'Hapus produk ID: '),
(140, 3, 'Hapus Produk', '2025-04-22 12:14:35', 'Hapus produk ID: '),
(141, 3, 'Hapus Produk', '2025-04-22 12:14:36', 'Hapus produk ID: '),
(142, 3, 'Hapus Produk', '2025-04-22 12:19:01', 'Hapus produk ID: '),
(143, 3, 'Hapus Produk', '2025-04-22 12:19:11', 'Hapus produk ID: '),
(144, 3, 'Logout', '2025-04-22 12:39:04', 'Logout dari sistem'),
(145, 5, 'Login', '2025-04-22 12:39:11', 'Login ke sistem'),
(146, 5, 'Hapus Produk', '2025-04-22 12:40:02', 'Hapus produk ID: '),
(147, 5, 'Hapus Produk', '2025-04-22 12:40:05', 'Hapus produk ID: '),
(148, 5, 'Logout', '2025-04-22 12:44:50', 'Logout dari sistem'),
(149, 4, 'Login', '2025-04-22 12:44:58', 'Login ke sistem'),
(150, 4, 'Logout', '2025-04-22 12:45:11', 'Logout dari sistem'),
(151, 5, 'Login', '2025-04-22 12:52:39', 'Login ke sistem'),
(152, 5, 'Login', '2025-04-22 13:21:19', 'Login ke sistem'),
(153, 5, 'Login', '2025-04-26 03:47:46', 'Login ke sistem'),
(154, 5, 'Hapus Produk', '2025-04-26 03:49:02', 'Hapus produk ID: '),
(155, 5, 'Hapus Produk', '2025-04-26 03:49:23', 'Hapus produk ID: '),
(156, 5, 'Hapus Produk', '2025-04-26 03:49:37', 'Hapus produk ID: '),
(157, 5, 'Hapus Produk', '2025-04-26 03:52:31', 'Hapus produk ID: '),
(158, 5, 'Hapus Produk', '2025-04-26 03:52:43', 'Hapus produk ID: '),
(159, 5, 'Hapus users', '2025-04-26 03:54:21', 'Melakukan Hapus User ID: '),
(160, 5, 'Hapus users', '2025-04-26 03:54:57', 'Melakukan Hapus User ID: '),
(161, 5, 'Hapus users', '2025-04-26 03:55:15', 'Melakukan Hapus User ID: '),
(162, 5, 'Hapus users', '2025-04-26 03:55:24', 'Melakukan Hapus User ID: '),
(163, 5, 'Hapus Produk', '2025-04-26 04:02:15', 'Hapus produk ID: '),
(164, 5, 'Hapus Produk', '2025-04-26 04:03:48', 'Hapus produk ID: '),
(165, 5, 'Hapus Produk', '2025-04-26 04:03:52', 'Hapus produk ID: '),
(166, 5, 'Hapus Produk', '2025-04-26 04:04:14', 'Hapus produk ID: '),
(167, 5, 'Hapus Produk', '2025-04-26 04:09:27', 'Hapus produk ID: '),
(168, 5, 'Logout', '2025-04-26 04:16:19', 'Logout dari sistem'),
(169, 5, 'Login', '2025-04-26 04:16:32', 'Login ke sistem'),
(170, 5, 'Retur Produk', '2025-04-26 04:18:10', 'Melakukan Pengembalian Produk ID: 8267312918842'),
(171, 5, 'Retur Produk', '2025-04-26 04:22:56', 'Melakukan Pengembalian Produk ID: 8267312918842'),
(172, 5, 'Logout', '2025-04-26 04:28:36', 'Logout dari sistem'),
(173, 4, 'Login', '2025-04-26 04:28:42', 'Login ke sistem'),
(174, 4, 'Transaksi Produk', '2025-04-26 04:32:22', 'Melakukan Transaksi Produk ID: 43'),
(175, 4, 'Transaksi Produk', '2025-04-26 04:32:22', 'Melakukan Transaksi Produk ID: 43'),
(176, 4, 'Transaksi Produk', '2025-04-26 04:32:22', 'Melakukan Transaksi Produk ID: 43'),
(177, 4, 'Transaksi Produk', '2025-04-26 04:36:02', 'Melakukan Transaksi Produk ID: 44'),
(178, 4, 'Transaksi Produk', '2025-04-26 04:37:53', 'Melakukan Transaksi Produk ID: 45'),
(179, 4, 'Logout', '2025-04-26 04:39:18', 'Logout dari sistem'),
(180, 5, 'Login', '2025-04-26 04:39:25', 'Login ke sistem'),
(181, 5, 'Retur Produk', '2025-04-26 04:41:46', 'Melakukan Pengembalian Produk ID: 7754531719510'),
(182, 5, 'Hapus Produk', '2025-04-26 04:48:02', 'Hapus produk ID: '),
(183, 5, 'Hapus Produk', '2025-04-26 04:50:35', 'Hapus produk ID: '),
(184, 5, 'Hapus Produk', '2025-04-26 04:50:49', 'Hapus produk ID: '),
(185, 5, 'Hapus Produk', '2025-04-26 04:51:24', 'Hapus produk ID: '),
(186, 5, 'Hapus Produk', '2025-04-26 04:53:05', 'Hapus produk ID: '),
(187, 5, 'Hapus Produk', '2025-04-26 04:53:26', 'Hapus produk ID: '),
(188, 5, 'Hapus Produk', '2025-04-26 04:53:34', 'Hapus produk ID: '),
(189, 5, 'Hapus Produk', '2025-04-26 04:55:00', 'Hapus produk ID: '),
(190, 5, 'Hapus Produk', '2025-04-26 04:55:07', 'Hapus produk ID: '),
(191, 5, 'Hapus Produk', '2025-04-26 04:55:08', 'Hapus produk ID: '),
(192, 5, 'Hapus Produk', '2025-04-26 04:56:11', 'Hapus produk ID: '),
(193, 5, 'Hapus Produk', '2025-04-26 04:56:26', 'Hapus produk ID: '),
(194, 5, 'Hapus Produk', '2025-04-26 04:58:05', 'Hapus produk ID: '),
(195, 5, 'Hapus Produk', '2025-04-26 04:59:45', 'Hapus produk ID: '),
(196, 5, 'Hapus Produk', '2025-04-26 05:00:16', 'Hapus produk ID: '),
(197, 5, 'Hapus Produk', '2025-04-26 05:00:24', 'Hapus produk ID: '),
(198, 5, 'Hapus Produk', '2025-04-26 05:00:25', 'Hapus produk ID: '),
(199, 5, 'Hapus users', '2025-04-26 05:00:47', 'Melakukan Hapus User ID: '),
(200, 5, 'Logout', '2025-04-26 05:01:21', 'Logout dari sistem'),
(201, 3, 'Login', '2025-04-26 05:01:26', 'Login ke sistem'),
(202, 3, 'Hapus Produk', '2025-04-26 05:01:35', 'Hapus produk ID: ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` varchar(11) NOT NULL,
  `stok` int(9) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` int(9) NOT NULL,
  `product_exp` date DEFAULT NULL,
  `diskonitem` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_produk`, `nama_produk`, `id_kategori`, `stok`, `satuan`, `harga`, `product_exp`, `diskonitem`, `create_at`, `update_at`) VALUES
(1, '8267312918842', 'GULA', '4', 37, 'PACK', 18000, '2026-04-01', 0, '2025-03-03 12:14:58', '2025-03-03 12:14:58'),
(2, '5354876797557', 'MIZONE', '2', 11, 'PCS', 10500, '2027-04-15', 0, '2025-03-03 12:16:01', '2025-03-03 12:16:01'),
(3, '7754531719510', 'INDOMIE', '1', 12, 'PCS', 150000, '2025-04-21', 0, '2025-03-27 09:13:04', '2025-03-27 09:13:04'),
(6, '8992222050258', 'GATSBY', '4', 10, 'PCS', 32000, '2026-01-14', 0, '2025-04-08 15:04:56', '2025-04-08 15:04:56'),
(7, '8999777004552', 'REXONA MEN', '4', 8, 'PCS', 18000, '2026-01-14', 10, '2025-04-08 15:05:30', '2025-04-08 15:05:30'),
(8, '9786232447851', 'BUKU MOTIVASI', '4', 6, 'PCS', 78000, NULL, 0, '2025-04-12 15:27:12', '2025-04-12 15:27:12'),
(9, '8886012207123', 'AIR FRESHENER', '4', 6, 'PCS', 48000, '2026-01-14', 0, '2025-04-12 15:27:48', '2025-04-12 15:27:48'),
(10, '9781107619500', 'KAMUS INGGRIS', '4', 3, 'PCS', 170000, NULL, 0, '2025-04-12 15:28:21', '2025-04-12 15:28:21'),
(11, '8991389211526', 'BUKU HARIAN', '4', 1, 'PCS', 23000, NULL, 0, '2025-04-12 15:29:05', '2025-04-12 15:29:05'),
(13, '8998989100120', 'ROKO FILTER', '4', 9, 'PCS', 26000, NULL, 0, '2025-04-13 06:54:37', '2025-04-13 06:54:37'),
(14, '8995858999991', 'MIXAGRIP FLU', '4', 14, 'PCS', 4000, NULL, 0, '2025-04-15 10:26:44', '2025-04-15 10:26:44'),
(15, '8993058301200', 'KOMIX OBH', '4', 3, 'PCS', 2000, NULL, 0, '2025-04-15 10:27:37', '2025-04-15 10:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `products_retur`
--

CREATE TABLE `products_retur` (
  `id` int(11) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `stok_retur` int(11) NOT NULL,
  `ket` text NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_transaksi` date NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_retur`
--

INSERT INTO `products_retur` (`id`, `id_produk`, `nama_produk`, `stok_retur`, `ket`, `tgl`, `tgl_transaksi`, `harga`) VALUES
(8, '8267312918842', 'GULA', 2, 'PRODUK EXPIRED', '2025-04-26 04:22:56', '2025-04-20', 17000),
(9, '7754531719510', 'INDOMIE', 5, 'produk expired', '2025-04-26 04:41:46', '2025-04-22', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`, `create_at`, `update_at`) VALUES
(1, 'superadmin', '2025-04-19 15:10:03', '2025-04-19 15:10:03'),
(2, 'admin', '2025-04-19 15:10:03', '2025-04-19 15:10:03'),
(3, 'cashier', '2025-04-19 15:10:16', '2025-04-19 15:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tlp` varchar(13) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `footer` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat`, `tlp`, `email`, `footer`, `create_at`, `update_at`) VALUES
(1, 'TOKMART BUMDES SEGAR', 'Jl. Karangsegar Pebayuran Bks', '08577615348', 'bumdessegarsejahtera2025@gmail.com', 'Have A nice day!', '2025-04-19 16:26:00', '2025-04-19 16:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `total` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `tgl`, `total`, `diskon`, `bayar`, `kembalian`, `id_user`) VALUES
(1, '2025-04-16 16:01:30', 18000, 0, 20000, 0, 4),
(9, '2025-04-16 17:32:53', 59400, 6600, 0, 0, 4),
(10, '2025-04-16 17:33:50', 32000, 0, 0, 0, 4),
(11, '2025-04-16 17:39:11', 4000, 0, 0, 0, 4),
(12, '2025-04-16 17:46:26', 48000, 0, 0, 0, 4),
(13, '2025-04-16 17:50:19', 64800, 7200, 0, 0, 4),
(14, '2025-04-16 17:57:22', 76000, 4000, 100000, 100000, 4),
(15, '2025-04-16 17:59:05', 36000, 0, 50000, -14000, 5),
(16, '2025-04-16 18:00:41', 98000, 0, 99999, -1999, 4),
(17, '2025-04-16 18:08:24', 24000, 0, 30000, -6000, 5),
(18, '2025-04-16 18:10:50', 18000, 0, 20000, -2000, 5),
(19, '2025-04-17 18:36:32', 36000, 0, 50000, -14000, 5),
(20, '2025-04-17 18:37:14', 90000, 0, 100000, -10000, 3),
(21, '2025-04-17 18:43:45', 36000, 0, 50000, -14000, 3),
(22, '2025-04-17 18:44:25', 18000, 0, 20000, -2000, 3),
(23, '2025-04-17 18:48:15', 18000, 0, 20000, -2000, 3),
(24, '2025-04-17 18:48:39', 18000, 0, 20000, -2000, 3),
(25, '2025-04-17 18:50:21', 18000, 0, 20000, -2000, 4),
(26, '2025-04-17 18:52:19', 36000, 0, 50000, -14000, 3),
(27, '2025-04-17 19:28:06', 48000, 0, 50000, -2000, 5),
(28, '2025-04-17 19:31:15', 48000, 0, 50000, -2000, 5),
(29, '2025-04-17 19:33:26', 18000, 0, 20000, -2000, 5),
(30, '2025-04-18 14:28:18', 66000, 0, 100000, -34000, 5),
(31, '2025-04-18 15:18:35', 93100, 4900, 100000, -6900, 4),
(32, '2025-04-18 20:05:36', 54000, 0, 60000, -6000, 3),
(33, '2025-04-18 20:07:51', 90000, 0, 100000, -10000, 4),
(34, '2025-04-19 23:31:12', 18000, 0, 20000, -2000, 4),
(35, '2025-04-19 23:33:18', 64000, 0, 70000, -6000, 5),
(36, '2025-04-20 08:59:37', 84000, 0, 100000, -16000, 5),
(37, '2025-04-20 19:23:10', 468000, 52000, 550000, -82000, 4),
(38, '2025-04-20 19:47:29', 48000, 0, 50000, -2000, 4),
(39, '2025-04-20 21:31:22', 48000, 0, 50000, -2000, 5),
(40, '2025-04-20 21:54:14', 18000, 0, 20000, -2000, 4),
(41, '2025-04-21 11:33:27', 48000, 0, 50000, -2000, 5),
(42, '2025-04-22 11:54:23', 90000, 0, 100000, -10000, 5),
(43, '2025-04-26 04:32:22', 70000, 0, 100000, -30000, 4),
(44, '2025-04-26 04:36:02', 48000, 0, 50000, -2000, 4),
(45, '2025-04-26 04:37:53', 18000, 0, 20000, -2000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `transactions_detail`
--

CREATE TABLE `transactions_detail` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions_detail`
--

INSERT INTO `transactions_detail` (`id`, `transaksi_id`, `kode_produk`, `nama_produk`, `harga`, `jumlah`, `subtotal`) VALUES
(1, 1, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(11, 9, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(12, 9, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(13, 10, '8992222050258', 'GATSBY', 32000, 1, 32000),
(14, 11, '8995858999991', 'MIXAGRIP FLU', 4000, 1, 4000),
(15, 12, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(16, 13, '8999777004552', 'REXONA MEN', 18000, 2, 36000),
(17, 13, '8995858999991', 'MIXAGRIP FLU', 4000, 1, 4000),
(18, 13, '8992222050258', 'GATSBY', 32000, 1, 32000),
(19, 14, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(20, 14, '8992222050258', 'GATSBY', 32000, 1, 32000),
(21, 15, '8999777004552', 'REXONA MEN', 18000, 2, 36000),
(22, 16, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(23, 16, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(24, 16, '8992222050258', 'GATSBY', 32000, 1, 32000),
(25, 17, '8995858999991', 'MIXAGRIP FLU', 4000, 6, 24000),
(26, 18, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(27, 19, '8999777004552', 'REXONA MEN', 18000, 2, 36000),
(28, 20, '8999777004552', 'REXONA MEN', 18000, 5, 90000),
(29, 21, '8999777004552', 'REXONA MEN', 18000, 2, 36000),
(30, 22, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(31, 23, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(32, 24, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(33, 25, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(34, 26, '8999777004552', 'REXONA MEN', 18000, 2, 36000),
(35, 27, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(36, 28, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(37, 29, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(38, 30, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(39, 30, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(40, 31, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(41, 31, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(42, 31, '8992222050258', 'GATSBY', 32000, 1, 32000),
(43, 32, '8999777004552', 'REXONA MEN', 18000, 3, 54000),
(44, 33, '8999777004552', 'REXONA MEN', 18000, 5, 90000),
(45, 34, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(46, 35, '8992222050258', 'GATSBY', 32000, 2, 64000),
(47, 36, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(48, 36, '8999777004552', 'REXONA MEN', 18000, 2, 36000),
(49, 37, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(50, 37, '8886012207123', 'AIR FRESHENER', 48000, 3, 144000),
(51, 37, '8992222050258', 'GATSBY', 32000, 2, 64000),
(52, 37, '9781107619500', 'KAMUS INGGRIS', 170000, 1, 170000),
(53, 37, '9786232447851', 'BUKU MOTIVASI', 78000, 1, 78000),
(54, 37, '8991389211526', 'BUKU HARIAN', 23000, 2, 46000),
(55, 38, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(56, 39, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(57, 40, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(58, 41, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(59, 42, '8267312918842', 'GULA', 18000, 5, 90000),
(60, 43, '8999777004552', 'REXONA MEN', 18000, 1, 18000),
(61, 43, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(62, 43, '8993058301200', 'KOMIX OBH', 2000, 2, 4000),
(63, 44, '8886012207123', 'AIR FRESHENER', 48000, 1, 48000),
(64, 45, '8999777004552', 'REXONA MEN', 18000, 1, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(277) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `role`, `create_at`, `update_at`) VALUES
(3, 'diki.admin', '$2y$10$JzHzM98CwEbrh1DgvjB27.fxISUHypRGCnBSw36HtUgEEqyzg4P5K', 'Diki seti1', '2', '2025-04-19 15:17:34', '2025-04-19 15:17:34'),
(4, 'diki.cashier', '$2y$10$QR9LFJvi48hf1/w4/xleaeqf35b1CS82LhcLN1WTjA63dFobz.Eyy', 'Dikset', '3', '2025-04-19 15:17:50', '2025-04-19 15:17:50'),
(5, 'diki.superadmin', '$2y$10$zO04GGoIef9hC46Tuf2eB.mYQvvQjVen3OH5D1N.Ioa/Lt261xwmi', 'Diki setiawan', '1', '2025-04-19 15:26:20', '2025-04-19 15:26:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_retur`
--
ALTER TABLE `products_retur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions_detail`
--
ALTER TABLE `transactions_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products_retur`
--
ALTER TABLE `products_retur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `transactions_detail`
--
ALTER TABLE `transactions_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `log_aktivitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `transactions_detail`
--
ALTER TABLE `transactions_detail`
  ADD CONSTRAINT `transactions_detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transactions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
