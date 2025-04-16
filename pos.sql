-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 11:05 AM
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
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_produk`, `nama_produk`, `id_kategori`, `stok`, `satuan`, `harga`, `product_exp`, `create_at`, `update_at`) VALUES
(1, '8267312918842', 'GULA', '4', 20, 'PACK', 18000, '2026-04-01', '2025-03-03 12:14:58', '2025-03-03 12:14:58'),
(2, '5354876797557', 'MIZONE', '2', 6, 'PCS', 10500, '2027-04-15', '2025-03-03 12:16:01', '2025-03-03 12:16:01'),
(3, '7754531719510', 'INDOMIE', '1', 32, 'PCS', 150000, '2025-04-15', '2025-03-27 09:13:04', '2025-03-27 09:13:04'),
(4, '5056865663452', 'GARAM', '1', 12, 'KILO GRAM', 15000, '2025-04-15', '2025-03-27 09:14:12', '2025-03-27 09:14:12'),
(5, '3660441379666', 'LAMPU PHILIPS', '4', 23, 'PCS', 19000, '2025-07-18', '2025-03-27 09:14:49', '2025-03-27 09:14:49'),
(6, '8992222050258', 'GATSBY', '4', 15, 'PCS', 32000, '2026-01-14', '2025-04-08 15:04:56', '2025-04-08 15:04:56'),
(7, '8999777004552', 'REXONA MEN', '4', 9, 'PCS', 18000, '2026-01-14', '2025-04-08 15:05:30', '2025-04-08 15:05:30'),
(8, '9786232447851', 'BUKU MOTIVASI', '4', 7, 'PCS', 78000, NULL, '2025-04-12 15:27:12', '2025-04-12 15:27:12'),
(9, '8886012207123', 'AIR FRESHENER', '4', 2, 'PCS', 48000, '2026-01-14', '2025-04-12 15:27:48', '2025-04-12 15:27:48'),
(10, '9781107619500', 'KAMUS INGGRIS', '4', 4, 'PCS', 170000, NULL, '2025-04-12 15:28:21', '2025-04-12 15:28:21'),
(11, '8991389211526', 'BUKU HARIAN', '4', 1, 'PCS', 23000, NULL, '2025-04-12 15:29:05', '2025-04-12 15:29:05'),
(13, '8998989100120', 'ROKO FILTER', '4', 12, 'PCS', 26000, NULL, '2025-04-13 06:54:37', '2025-04-13 06:54:37'),
(14, '8995858999991', 'MIXAGRIP FLU', '4', 14, 'PCS', 4000, NULL, '2025-04-15 10:26:44', '2025-04-15 10:26:44'),
(15, '8993058301200', 'KOMIX OBH', '4', 5, 'PCS', 2000, NULL, '2025-04-15 10:27:37', '2025-04-15 10:27:37');

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
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `tgl`, `total`, `diskon`, `bayar`, `kembalian`) VALUES
(1, '2025-04-16 16:01:30', 18000, 0, 20000, 0),
(4, '2025-04-16 16:03:52', 32000, 0, 50000, 0);

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
(4, 4, '8992222050258', 'GATSBY', 32000, 1, 32000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(277) NOT NULL,
  `role` varchar(10) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions_detail`
--
ALTER TABLE `transactions_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions_detail`
--
ALTER TABLE `transactions_detail`
  ADD CONSTRAINT `transactions_detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transactions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
