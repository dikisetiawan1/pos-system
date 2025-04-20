-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2025 at 11:32 AM
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
  `diskonitem` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_produk`, `nama_produk`, `id_kategori`, `stok`, `satuan`, `harga`, `product_exp`, `diskonitem`, `create_at`, `update_at`) VALUES
(1, '8267312918842', 'GULA', '4', 20, 'PACK', 18000, '2026-04-01', 0, '2025-03-03 12:14:58', '2025-03-03 12:14:58'),
(2, '5354876797557', 'MIZONE', '2', 6, 'PCS', 10500, '2027-04-15', 0, '2025-03-03 12:16:01', '2025-03-03 12:16:01'),
(3, '7754531719510', 'INDOMIE', '1', 7, 'PCS', 150000, '2025-04-21', 0, '2025-03-27 09:13:04', '2025-03-27 09:13:04'),
(4, '5056865663452', 'GARAM', '1', 12, 'KILO GRAM', 15000, '2025-04-21', 0, '2025-03-27 09:14:12', '2025-03-27 09:14:12'),
(5, '3660441379666', 'LAMPU PHILIPS', '4', 23, 'PCS', 19000, '2025-07-18', 0, '2025-03-27 09:14:49', '2025-03-27 09:14:49'),
(6, '8992222050258', 'GATSBY', '4', 12, 'PCS', 32000, '2026-01-14', 0, '2025-04-08 15:04:56', '2025-04-08 15:04:56'),
(7, '8999777004552', 'REXONA MEN', '4', 12, 'PCS', 18000, '2026-01-14', 10, '2025-04-08 15:05:30', '2025-04-08 15:05:30'),
(8, '9786232447851', 'BUKU MOTIVASI', '4', 7, 'PCS', 78000, NULL, 0, '2025-04-12 15:27:12', '2025-04-12 15:27:12'),
(9, '8886012207123', 'AIR FRESHENER', '4', 9, 'PCS', 48000, '2026-01-14', 0, '2025-04-12 15:27:48', '2025-04-12 15:27:48'),
(10, '9781107619500', 'KAMUS INGGRIS', '4', 4, 'PCS', 170000, NULL, 0, '2025-04-12 15:28:21', '2025-04-12 15:28:21'),
(11, '8991389211526', 'BUKU HARIAN', '4', 1, 'PCS', 23000, NULL, 0, '2025-04-12 15:29:05', '2025-04-12 15:29:05'),
(13, '8998989100120', 'ROKO FILTER', '4', 12, 'PCS', 26000, NULL, 0, '2025-04-13 06:54:37', '2025-04-13 06:54:37'),
(14, '8995858999991', 'MIXAGRIP FLU', '4', 14, 'PCS', 4000, NULL, 0, '2025-04-15 10:26:44', '2025-04-15 10:26:44'),
(15, '8993058301200', 'KOMIX OBH', '4', 5, 'PCS', 2000, NULL, 0, '2025-04-15 10:27:37', '2025-04-15 10:27:37');

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
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `tgl`, `total`, `diskon`, `bayar`, `kembalian`) VALUES
(1, '2025-04-16 16:01:30', 18000, 0, 20000, 0),
(9, '2025-04-16 17:32:53', 59400, 6600, 0, 0),
(10, '2025-04-16 17:33:50', 32000, 0, 0, 0),
(11, '2025-04-16 17:39:11', 4000, 0, 0, 0),
(12, '2025-04-16 17:46:26', 48000, 0, 0, 0),
(13, '2025-04-16 17:50:19', 64800, 7200, 0, 0),
(14, '2025-04-16 17:57:22', 76000, 4000, 100000, 100000),
(15, '2025-04-16 17:59:05', 36000, 0, 50000, -14000),
(16, '2025-04-16 18:00:41', 98000, 0, 99999, -1999),
(17, '2025-04-16 18:08:24', 24000, 0, 30000, -6000),
(18, '2025-04-16 18:10:50', 18000, 0, 20000, -2000),
(19, '2025-04-17 18:36:32', 36000, 0, 50000, -14000),
(20, '2025-04-17 18:37:14', 90000, 0, 100000, -10000),
(21, '2025-04-17 18:43:45', 36000, 0, 50000, -14000),
(22, '2025-04-17 18:44:25', 18000, 0, 20000, -2000),
(23, '2025-04-17 18:48:15', 18000, 0, 20000, -2000),
(24, '2025-04-17 18:48:39', 18000, 0, 20000, -2000),
(25, '2025-04-17 18:50:21', 18000, 0, 20000, -2000),
(26, '2025-04-17 18:52:19', 36000, 0, 50000, -14000),
(27, '2025-04-17 19:28:06', 48000, 0, 50000, -2000),
(28, '2025-04-17 19:31:15', 48000, 0, 50000, -2000),
(29, '2025-04-17 19:33:26', 18000, 0, 20000, -2000),
(30, '2025-04-18 14:28:18', 66000, 0, 100000, -34000),
(31, '2025-04-18 15:18:35', 93100, 4900, 100000, -6900),
(32, '2025-04-18 20:05:36', 54000, 0, 60000, -6000),
(33, '2025-04-18 20:07:51', 90000, 0, 100000, -10000),
(34, '2025-04-19 23:31:12', 18000, 0, 20000, -2000),
(35, '2025-04-19 23:33:18', 64000, 0, 70000, -6000),
(36, '2025-04-20 08:59:37', 84000, 0, 100000, -16000);

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
(48, 36, '8999777004552', 'REXONA MEN', 18000, 2, 36000);

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
(3, 'diki.admin', '$2y$10$zFKJTXTDvU.jRoPAt8EqhO0DNmnHbfUpE7e4NTbRn96Ewwa2ZfPtm', 'Diki setiawan', '2', '2025-04-19 15:17:34', '2025-04-19 15:17:34'),
(4, 'diki.cashier', '$2y$10$QR9LFJvi48hf1/w4/xleaeqf35b1CS82LhcLN1WTjA63dFobz.Eyy', 'Diki setiawan', '3', '2025-04-19 15:17:50', '2025-04-19 15:17:50'),
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
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `transactions_detail`
--
ALTER TABLE `transactions_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
