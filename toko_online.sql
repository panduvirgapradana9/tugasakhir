-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 04:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat_pengiriman`
--

CREATE TABLE `alamat_pengiriman` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alamat_pengiriman`
--

INSERT INTO `alamat_pengiriman` (`id`, `user_id`, `status`, `nama_penerima`, `no_tlp`, `alamat`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `kodepos`, `created_at`, `updated_at`) VALUES
(1, 2, 'tidak', 'Ihtiara', '085608828683', 'Jl. Melati', 'Jawa Timur', 'Kediri', 'Gurah', 'Turus', '64181', '2021-05-18 20:10:04', '2021-07-01 00:07:34'),
(2, 2, 'tidak', 'Ihtiara (kantor)', '085608828683', 'Jalan Kota Kediri', 'Jawa Timur', 'Kediri', 'Kota Kediri', 'Kediri', '64181', '2021-05-18 23:23:30', '2021-07-01 00:07:34'),
(3, 3, 'tidak', 'vito', '085123456789', 'Jl. Dahlia', 'Jawa Timur', 'Mojokerto', 'Gurah', 'Turus', '64181', '2021-05-18 23:33:16', '2021-07-01 00:07:34'),
(4, 1, 'tidak', 'a', '1', 'a', 'a', 'a', 'a', 'a', '3', '2021-05-25 21:40:27', '2021-07-01 00:07:34'),
(5, 2, 'tidak', 'Yuli', '085321654987', 'Jl. Ledehan No.03', 'Jawa Tengah', 'Semarang', 'Ringin Pitu', 'Pagu', '64322', '2021-06-04 23:11:33', '2021-07-01 00:07:34'),
(6, 2, 'tidak', 'Darman', '081987456556', 'Jl. Kampung No.08', 'Jawa Timur', 'Kediri', 'Wates', 'Tawang', '64186', '2021-06-04 23:21:42', '2021-07-01 00:07:34'),
(7, 3, 'tidak', 'Mas Febri', '083089568342', 'Jl. Duku', 'Jawa Timur', 'Kediri', 'Gurah', 'Bogem', '64181', '2021-06-04 23:29:10', '2021-07-01 00:07:34'),
(8, 4, 'utama', 'Bagus', '081745287465', 'Jl. Kampung Baru No. 07', 'Jawa Timur', 'Kediri', 'Pagu', 'Ngatup', '64182', '2021-06-09 21:22:38', '2021-07-01 00:07:34'),
(9, 4, 'tidak', 'Nabila', '085674387453', 'Jl. Bulu No. 12', 'Jawa Timur', 'Kediri', 'Gurah', 'Turus', '64181', '2021-06-09 21:28:10', '2021-07-01 00:07:34'),
(10, 3, 'tidak', 'Vindi', '085608828683', 'Jl. Dahlia', 'Jawa Timur', 'Kediri', 'Pagu', 'Kawedussan', '64184', '2021-06-27 21:40:11', '2021-07-01 00:07:34'),
(11, 6, 'tidak', 'Ihtiara', '081987456556', 'Sambi', 'Jawa', 'Kediri', 'Sambi', 'Sambi', '64190', '2021-06-30 08:53:15', '2021-07-01 00:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_cart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ekspedisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` double(12,2) NOT NULL DEFAULT 0.00,
  `ongkir` double(12,2) NOT NULL DEFAULT 0.00,
  `diskon` double(12,2) NOT NULL DEFAULT 0.00,
  `total` double(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `no_invoice`, `status_cart`, `status_pembayaran`, `status_pengiriman`, `no_resi`, `ekspedisi`, `subtotal`, `ongkir`, `diskon`, `total`, `created_at`, `updated_at`) VALUES
(1, 2, 'INV 001', 'checkout', 'belum', 'dibatalkan', NULL, NULL, 24300.00, 0.00, 0.00, 24300.00, '2021-05-18 19:50:27', '2021-05-25 07:08:56'),
(2, 3, 'INV 001', 'checkout', 'belum', 'dibatalkan', NULL, NULL, 48500.00, 0.00, 0.00, 48500.00, '2021-05-18 23:29:40', '2021-06-04 23:29:19'),
(3, 2, 'INV 002', 'checkout', 'sudah', 'sudah', 'JP88123111001', 'JNT', 170100.00, 22000.00, 0.00, 170100.00, '2021-05-25 07:19:17', '2021-05-28 19:32:06'),
(4, 1, 'INV 001', 'checkout', 'belum', 'dibatalkan', NULL, NULL, 8100.00, 0.00, 0.00, 8100.00, '2021-05-25 21:39:48', '2021-05-25 21:40:35'),
(5, 2, 'INV 003', 'checkout', 'sudah', 'belum', 'JP-22343564464', 'J&E', 120100.00, 10000.00, 10.00, 120100.00, '2021-05-28 19:43:10', '2021-06-08 18:24:59'),
(6, 1, 'INV 002', 'cart', 'belum', 'belum', NULL, NULL, 0.00, 0.00, 0.00, 0.00, '2021-05-28 20:12:28', '2021-06-30 07:49:18'),
(7, 2, 'INV 004', 'checkout', 'belum', 'belum', NULL, NULL, 61000.00, 0.00, 0.00, 61000.00, '2021-06-04 23:05:32', '2021-06-04 23:06:33'),
(8, 2, 'INV 005', 'checkout', 'sudah', 'belum', NULL, NULL, 54000.00, 0.00, 0.00, 54000.00, '2021-06-04 23:09:13', '2021-06-08 19:46:39'),
(9, 2, 'INV 006', 'checkout', 'sudah', 'belum', NULL, NULL, 107500.00, 0.00, 0.00, 107500.00, '2021-06-04 23:15:03', '2021-06-08 18:30:48'),
(10, 3, 'INV 002', 'checkout', 'belum', 'belum', NULL, NULL, 405000.00, 0.00, 0.00, 405000.00, '2021-06-05 23:19:16', '2021-06-05 23:19:51'),
(11, 4, 'INV 001', 'checkout', 'belum', 'belum', NULL, NULL, 195500.00, 0.00, 0.00, 195500.00, '2021-06-09 21:18:04', '2021-06-09 21:22:48'),
(12, 4, 'INV 002', 'checkout', 'belum', 'belum', NULL, NULL, 108000.00, 0.00, 0.00, 108000.00, '2021-06-09 21:24:54', '2021-06-09 21:26:04'),
(13, 4, 'INV 003', 'checkout', 'belum', 'belum', NULL, NULL, 79800.00, 0.00, 0.00, 79800.00, '2021-06-09 21:26:50', '2021-06-09 21:28:17'),
(14, 2, 'INV 007', 'checkout', 'sudah', 'belum', 'JP-88123111001', 'JNT', 163200.00, 0.00, 0.00, 163200.00, '2021-06-14 07:11:43', '2021-06-29 02:30:35'),
(15, 4, 'INV 004', 'checkout', 'belum', 'belum', NULL, NULL, 192000.00, 0.00, 0.00, 192000.00, '2021-06-20 14:44:32', '2021-06-20 14:45:58'),
(16, 4, 'INV 005', 'checkout', 'belum', 'belum', NULL, NULL, 46000.00, 0.00, 0.00, 46000.00, '2021-06-20 14:46:23', '2021-06-20 14:46:51'),
(17, 3, 'INV 003', 'checkout', 'belum', 'belum', NULL, NULL, 340200.00, 0.00, 0.00, 340200.00, '2021-06-20 14:47:59', '2021-06-20 14:49:25'),
(18, 3, 'INV 004', 'checkout', 'belum', 'belum', NULL, NULL, 1568000.00, 0.00, 0.00, 1568000.00, '2021-06-20 14:49:44', '2021-06-20 14:50:25'),
(19, 3, 'INV 005', 'checkout', 'sudah', 'sudah', NULL, NULL, 6500.00, 0.00, 0.00, 6500.00, '2021-06-22 08:12:52', '2021-06-22 08:17:24'),
(20, 3, 'INV 006', 'checkout', 'sudah', 'sudah', 'JP-22343564464', 'J&E', 57000.00, 0.00, 0.00, 57000.00, '2021-06-25 16:57:28', '2021-06-29 02:33:43'),
(21, 3, 'INV 007', 'checkout', 'belum', 'sudah', 'JP-88123111001', 'JNT', 60000.00, 0.00, 0.00, 60000.00, '2021-06-27 18:47:17', '2021-06-28 03:19:57'),
(22, 3, 'INV 008', 'checkout', 'sudah', 'sudah', 'JP-22343564464', 'J&E', 4000.00, 0.00, 0.00, 4000.00, '2021-06-27 21:38:21', '2021-06-27 21:42:28'),
(23, 3, 'INV 009', 'checkout', 'belum', 'belum', NULL, NULL, 39300.00, 0.00, 0.00, 39300.00, '2021-06-29 02:35:26', '2021-06-29 02:37:34'),
(24, 3, 'INV 010', 'checkout', 'sudah', 'dibatalkan', 'JP-88123111001', 'JNT', 65000.00, 0.00, 0.00, 65000.00, '2021-06-29 02:40:07', '2021-06-30 08:33:44'),
(25, 3, 'INV 011', 'cart', 'belum', 'belum', NULL, NULL, 6300.00, 0.00, 0.00, 6300.00, '2021-06-30 08:03:49', '2021-06-30 08:03:55'),
(26, 6, 'INV 001', 'checkout', 'sudah', 'dibatalkan', 'JP88123111001', 'JNT', 34800.00, 0.00, 0.00, 34800.00, '2021-06-30 08:47:38', '2021-07-01 00:06:11'),
(27, 4, 'INV 006', 'checkout', 'sudah', 'dibatalkan', 'JP-88123111001', 'JNT', 22500.00, 0.00, 0.00, 22500.00, '2021-07-01 00:07:18', '2021-07-01 00:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(10) UNSIGNED NOT NULL,
  `qty` double(12,2) NOT NULL DEFAULT 0.00,
  `harga` double(12,2) NOT NULL DEFAULT 0.00,
  `diskon` double(12,2) NOT NULL DEFAULT 0.00,
  `subtotal` double(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `produk_id`, `cart_id`, `qty`, `harga`, `diskon`, `subtotal`, `created_at`, `updated_at`) VALUES
(12, 2, 1, 3.00, 9000.00, 900.00, 24300.00, '2021-05-25 06:51:13', '2021-05-25 06:51:18'),
(13, 2, 3, 21.00, 9000.00, 900.00, 170100.00, '2021-05-25 07:19:17', '2021-05-25 07:19:33'),
(14, 2, 4, 1.00, 9000.00, 900.00, 8100.00, '2021-05-25 21:39:48', '2021-05-25 21:39:48'),
(15, 5, 5, 11.00, 6500.00, 0.00, 71500.00, '2021-05-28 19:43:10', '2021-05-28 19:43:15'),
(16, 2, 5, 6.00, 9000.00, 900.00, 48600.00, '2021-05-28 19:43:24', '2021-05-28 19:43:27'),
(18, 8, 7, 2.00, 6000.00, 0.00, 12000.00, '2021-06-04 23:05:32', '2021-06-04 23:05:38'),
(19, 1, 7, 7.00, 7000.00, 0.00, 49000.00, '2021-06-04 23:06:07', '2021-06-04 23:06:18'),
(20, 4, 8, 36.00, 1500.00, 0.00, 54000.00, '2021-06-04 23:09:13', '2021-06-04 23:09:22'),
(21, 7, 9, 7.00, 5000.00, 0.00, 35000.00, '2021-06-04 23:15:03', '2021-06-04 23:15:10'),
(22, 5, 9, 9.00, 6500.00, 0.00, 58500.00, '2021-06-04 23:15:50', '2021-06-04 23:16:22'),
(23, 6, 9, 4.00, 3500.00, 0.00, 14000.00, '2021-06-04 23:16:55', '2021-06-04 23:17:06'),
(24, 9, 2, 5.00, 2500.00, 0.00, 12500.00, '2021-06-04 23:24:31', '2021-06-04 23:24:58'),
(25, 8, 2, 6.00, 6000.00, 0.00, 36000.00, '2021-06-04 23:26:15', '2021-06-04 23:26:30'),
(26, 2, 10, 50.00, 9000.00, 900.00, 405000.00, '2021-06-05 23:19:16', '2021-06-05 23:19:41'),
(27, 6, 11, 10.00, 3500.00, 0.00, 35000.00, '2021-06-09 21:18:04', '2021-06-09 21:18:26'),
(28, 9, 11, 10.00, 2500.00, 0.00, 25000.00, '2021-06-09 21:18:39', '2021-06-09 21:18:52'),
(30, 3, 11, 10.00, 3000.00, 450.00, 25500.00, '2021-06-09 21:20:30', '2021-06-09 21:20:38'),
(31, 8, 11, 10.00, 6000.00, 0.00, 60000.00, '2021-06-09 21:20:51', '2021-06-09 21:20:58'),
(32, 7, 11, 10.00, 5000.00, 0.00, 50000.00, '2021-06-09 21:21:10', '2021-06-09 21:21:17'),
(33, 2, 12, 5.00, 9000.00, 900.00, 40500.00, '2021-06-09 21:24:54', '2021-06-09 21:25:01'),
(34, 5, 12, 5.00, 6500.00, 0.00, 32500.00, '2021-06-09 21:25:10', '2021-06-09 21:25:16'),
(35, 1, 12, 5.00, 7000.00, 0.00, 35000.00, '2021-06-09 21:25:48', '2021-06-09 21:25:54'),
(36, 4, 13, 10.00, 1500.00, 0.00, 15000.00, '2021-06-09 21:26:50', '2021-06-09 21:26:55'),
(37, 2, 13, 8.00, 9000.00, 900.00, 64800.00, '2021-06-09 21:27:03', '2021-06-09 21:27:07'),
(38, 3, 14, 64.00, 3000.00, 450.00, 163200.00, '2021-06-14 07:11:43', '2021-06-20 14:52:54'),
(39, 16, 15, 9.00, 3000.00, 0.00, 27000.00, '2021-06-20 14:44:32', '2021-06-20 14:44:40'),
(40, 15, 15, 33.00, 5000.00, 0.00, 165000.00, '2021-06-20 14:45:21', '2021-06-20 14:45:46'),
(41, 20, 16, 1.00, 20000.00, 0.00, 20000.00, '2021-06-20 14:46:23', '2021-06-20 14:46:23'),
(42, 19, 16, 1.00, 14000.00, 0.00, 14000.00, '2021-06-20 14:46:34', '2021-06-20 14:46:34'),
(43, 18, 16, 1.00, 12000.00, 0.00, 12000.00, '2021-06-20 14:46:44', '2021-06-20 14:46:44'),
(44, 2, 17, 42.00, 9000.00, 900.00, 340200.00, '2021-06-20 14:47:59', '2021-06-20 14:49:01'),
(45, 19, 18, 112.00, 14000.00, 0.00, 1568000.00, '2021-06-20 14:49:44', '2021-06-20 14:50:09'),
(46, 5, 19, 1.00, 6500.00, 0.00, 6500.00, '2021-06-22 08:12:52', '2021-06-22 08:12:52'),
(47, 9, 20, 2.00, 2500.00, 0.00, 5000.00, '2021-06-25 16:57:28', '2021-06-25 16:57:32'),
(48, 20, 20, 1.00, 20000.00, 0.00, 20000.00, '2021-06-25 16:57:56', '2021-06-25 16:57:56'),
(49, 21, 20, 4.00, 8000.00, 0.00, 32000.00, '2021-06-25 16:58:16', '2021-06-25 16:58:27'),
(52, 25, 21, 15.00, 4000.00, 0.00, 60000.00, '2021-06-27 18:47:17', '2021-06-27 18:47:31'),
(53, 14, 22, 1.00, 4000.00, 0.00, 4000.00, '2021-06-27 21:38:21', '2021-06-27 21:38:21'),
(54, 2, 23, 3.00, 9000.00, 900.00, 24300.00, '2021-06-29 02:35:26', '2021-06-29 02:35:31'),
(55, 9, 23, 6.00, 2500.00, 0.00, 15000.00, '2021-06-29 02:37:05', '2021-06-29 02:37:09'),
(56, 5, 24, 10.00, 6500.00, 0.00, 65000.00, '2021-06-29 02:40:07', '2021-06-29 02:40:11'),
(59, 6, 25, 2.00, 3500.00, 350.00, 6300.00, '2021-06-30 08:03:49', '2021-06-30 08:03:55'),
(60, 6, 26, 4.00, 3500.00, 350.00, 12600.00, '2021-06-30 08:47:38', '2021-06-30 08:47:43'),
(61, 3, 26, 4.00, 3000.00, 450.00, 10200.00, '2021-06-30 08:47:48', '2021-06-30 08:47:51'),
(62, 25, 26, 3.00, 4000.00, 0.00, 12000.00, '2021-06-30 08:48:01', '2021-06-30 08:48:03'),
(63, 24, 27, 5.00, 4500.00, 0.00, 22500.00, '2021-07-01 00:07:18', '2021-07-01 00:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'files/clACBQgl0URdoLQHA7d32DJksyzFOW7tMU6Y7eAu.jpg', '2021-05-17 03:29:54', '2021-05-17 03:29:54'),
(2, 1, 'files/OmCYi17YXa8lqrbqg0KrbP5Vi7nN66MOYnWkcleO.jpg', '2021-05-17 03:32:03', '2021-05-17 03:32:03'),
(3, 1, 'files/20xodOpbGoAw5OCqWwgwI7pfbxt1DMgTBlDJSxzR.jpg', '2021-05-17 03:35:23', '2021-05-17 03:35:23'),
(4, 3, 'files/3Q81NmtSehDjjM9iCwKO3ad8gDc1hLQRBoc4RZ1r.jpg', '2021-05-17 04:04:14', '2021-05-17 04:04:14'),
(5, 1, 'files/zPT3Va0wrFpA5UjgGUGcSn8ko6xLaYof3zcWuvZ9.jpg', '2021-05-25 19:38:48', '2021-05-25 19:38:48'),
(6, 1, 'files/LWb0Tfy4L4UdvDp5EZNiMgaS1Bw0t4DFeEEN13Vw.jpg', '2021-05-25 19:45:42', '2021-05-25 19:45:42'),
(11, 1, 'files/sc73MbgmiOtOXEWa13HqxWHNlQYkBL3TmRV3gIB6.jpg', '2021-05-28 19:28:07', '2021-05-28 19:28:07'),
(12, 1, 'files/yjTotXlfC9JR1ViQKEhAhtV5lRc3O9Mu6VduT4kl.jpg', '2021-05-28 19:28:14', '2021-05-28 19:28:14'),
(13, 1, 'files/q3KvEQPMoYPItAUTU2Iv00InD1Zv8DSTa3iJVXM3.jpg', '2021-05-28 19:28:22', '2021-05-28 19:28:22'),
(14, 1, 'files/5sceXtwLXtuYegtoswiAoi3Objz6q9zPw6toxsfU.jpg', '2021-05-28 20:22:22', '2021-05-28 20:22:22'),
(15, 1, 'files/h6AKl1U7Rup2kExTIeCIscDmp318KsOT96DPksMJ.jpg', '2021-05-28 20:23:25', '2021-05-28 20:23:25'),
(19, 1, 'files/objNgJYZicuQBVTlJbhgvwp1uf9XZAauWRcIuDPa.jpg', '2021-06-23 07:48:33', '2021-06-23 07:48:33'),
(27, 1, 'files/fQRhlws5eSK8SQjpTSyGifAMMG0xcp0gaDGHnMo0.jpg', '2021-06-24 18:30:05', '2021-06-24 18:30:05'),
(31, 1, 'files/Dy96sHWmG07aH9P41Q3VpuCIgPoonPV8flmKqeuO.jpg', '2021-06-25 06:55:42', '2021-06-25 06:55:42'),
(32, 1, 'files/HkP6DqGKPPwfTr3N3N770L88lURjv15SB5X5NCCB.jpg', '2021-06-25 17:22:56', '2021-06-25 17:22:56'),
(34, 1, 'files/ij6T3fkMhVURQ8NbhwS2Nazn5o8sj1Ez99WwRSFO.jpg', '2021-06-25 17:42:11', '2021-06-25 17:42:11'),
(36, 1, 'files/GZOoc5LgFWDev8gYIcHu0sqvvou9J9jCY3fpBxJ9.jpg', '2021-06-26 21:29:24', '2021-06-26 21:29:24'),
(37, 1, 'files/tMDXNQgRhDjddhC4u6fbKaIXWpDorzZLSHh6kvBH.jpg', '2021-06-26 21:38:59', '2021-06-26 21:38:59'),
(38, 1, 'files/4XRNjPM9Bz9mf3iLi2AYNsh73KQFkJc1jsYcBMAN.jpg', '2021-06-26 21:39:49', '2021-06-26 21:39:49'),
(39, 1, 'files/0o38uDnghaWM4K5jRCYYD75vBhg6aWCVrp6koBFI.jpg', '2021-06-26 21:50:09', '2021-06-26 21:50:09'),
(40, 1, 'files/Py7cb6TJFGTe98pHs9RMLXvCgn082Dhobl0ao0MI.jpg', '2021-06-26 21:53:00', '2021-06-26 21:53:00'),
(41, 1, 'files/pGOl1veSCJenxBepkIRrcMTopdGbg1vmMwI5V4f0.jpg', '2021-06-26 21:53:56', '2021-06-26 21:53:56'),
(42, 1, 'files/PZYNqgRCY68jTqjhiFfjLXTXgfIwhYVO21Ay7BsV.jpg', '2021-06-26 21:54:15', '2021-06-26 21:54:15'),
(43, 1, 'files/gev75m4HCDkhSHGJa0CAHuhE8f5ahFm1oK1EF5Ur.jpg', '2021-06-26 21:55:58', '2021-06-26 21:55:58'),
(44, 1, 'files/jL85IksYGGT1Nvq3HL2WmoEl80Zk3y472GTuntAQ.jpg', '2021-06-26 22:03:06', '2021-06-26 22:03:06'),
(45, 1, 'files/n0s61yALPgRkCRPbYgItuqnovnLD4juE346I90Vk.jpg', '2021-06-26 22:05:09', '2021-06-26 22:05:09'),
(46, 1, 'files/FeuJyDxBRRcSF3HBWXiKY5QlmqgD7oNiO2hUqbvN.jpg', '2021-06-26 22:13:16', '2021-06-26 22:13:16'),
(47, 1, 'files/UGKuef1fCaEbUDyBi1iWBevyMiZmB3EAAvI31uXj.jpg', '2021-06-26 22:20:44', '2021-06-26 22:20:44'),
(48, 1, 'files/ROyY7ja2sKDKdqOXhtozgmrtOXjy5BNdsDM9QI6x.jpg', '2021-06-26 22:21:07', '2021-06-26 22:21:07'),
(49, 1, 'files/XuZpBtuyfKZ45aKedPKmw75vxZy964f7B6F1JUTD.jpg', '2021-06-26 22:22:48', '2021-06-26 22:22:48'),
(53, 1, 'files/p8td3wp24geYl9tAicieXZKTYvXPT1d2ZdDPAY4z.jpg', '2021-06-29 18:13:44', '2021-06-29 18:13:44'),
(54, 1, 'files/VOQsMAHb59oSLYtPYdTcAOTHaAV3GjvgNu0QLIrB.png', '2021-06-29 19:36:27', '2021-06-29 19:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kategori` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kode_kategori`, `nama_kategori`, `slug_kategori`, `deskripsi_kategori`, `status`, `foto`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'K01', 'Gerabah', 'gerabah', 'Perabotan alat bantu kehidupan', 'publish', 'files/q3KvEQPMoYPItAUTU2Iv00InD1Zv8DSTa3iJVXM3.jpg', 1, '2021-05-17 03:18:19', '2021-05-28 19:28:22'),
(2, 'K02', 'Plastik', 'plastik', 'plastik', 'publish', 'files/yjTotXlfC9JR1ViQKEhAhtV5lRc3O9Mu6VduT4kl.jpg', 1, '2021-05-17 03:18:38', '2021-05-28 19:28:14'),
(3, 'K03', 'Bahan Roti', 'bahan-roti', 'Produk bahan baku pembuatan roti', 'publish', 'files/sc73MbgmiOtOXEWa13HqxWHNlQYkBL3TmRV3gIB6.jpg', 1, '2021-05-17 03:19:45', '2021-05-28 19:28:07'),
(4, 'K04', 'Perasa', 'perasa', 'penambah rasa buah-buahan.', 'publish', 'files/ij6T3fkMhVURQ8NbhwS2Nazn5o8sj1Ez99WwRSFO.jpg', 1, '2021-05-17 03:20:28', '2021-06-29 06:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2021_03_17_144242_create_kategoris_table', 1),
(25, '2021_03_17_145756_create_suppliers_table', 1),
(26, '2021_03_18_010321_create_produks_table', 1),
(27, '2021_03_19_013251_create_images_table', 1),
(28, '2021_03_20_040357_create_produk_images_table', 1),
(29, '2021_03_21_042448_create_slideshows_table', 1),
(30, '2021_03_21_125516_create_produk_promos_table', 1),
(31, '2021_03_22_064802_create_wishlists_table', 1),
(32, '2021_04_01_075506_create_carts_table', 1),
(33, '2021_04_04_075538_create_cart_details_table', 1),
(34, '2021_04_05_062603_create_alamat_pengirimen_table', 1),
(35, '2021_04_19_063901_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(10) UNSIGNED NOT NULL,
  `nama_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `cart_id`, `nama_penerima`, `no_tlp`, `alamat`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `kodepos`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ihtiara', '085608828683', 'Jl. Melati', 'Jawa Timur', 'Kediri', 'Gurah', 'Turus', '64181', '2021-05-25 07:08:56', '2021-05-25 07:08:56'),
(2, 3, 'Ihtiara', '085608828683', 'Jl. Melati', 'Jawa Timur', 'Kediri', 'Gurah', 'Turus', '64181', '2021-05-25 07:19:39', '2021-05-25 07:19:39'),
(3, 4, 'a', '1', 'a', 'a', 'a', 'a', 'a', '3', '2021-05-25 21:40:35', '2021-05-25 21:40:35'),
(4, 5, 'Ihtiara (kantor)', '085608828683', 'Jalan Kota Kediri', 'Jawa Timur', 'Kediri', 'Kota Kediri', 'Kediri', '64181', '2021-05-28 19:43:45', '2021-05-28 19:43:45'),
(5, 7, 'Ihtiara (kantor)', '085608828683', 'Jalan Kota Kediri', 'Jawa Timur', 'Kediri', 'Kota Kediri', 'Kediri', '64181', '2021-06-04 23:06:33', '2021-06-04 23:06:33'),
(6, 8, 'Yuli', '085321654987', 'Jl. Ledehan No.03', 'Jawa Tengah', 'Semarang', 'Ringin Pitu', 'Pagu', '64322', '2021-06-04 23:11:50', '2021-06-04 23:11:50'),
(7, 9, 'Darman', '081987456556', 'Jl. Kampung No.08', 'Jawa Timur', 'Kediri', 'Wates', 'Tawang', '64186', '2021-06-04 23:21:56', '2021-06-04 23:21:56'),
(8, 2, 'Mas Febri', '083089568342', 'Jl. Duku', 'Jawa Timur', 'Kediri', 'Gurah', 'Bogem', '64181', '2021-06-04 23:29:19', '2021-06-04 23:29:19'),
(9, 10, 'Mas Febri', '083089568342', 'Jl. Duku', 'Jawa Timur', 'Kediri', 'Gurah', 'Bogem', '64181', '2021-06-05 23:19:51', '2021-06-05 23:19:51'),
(10, 11, 'Bagus', '081745287465', 'Jl. Kampung Baru No. 07', 'Jawa Timur', 'Kediri', 'Pagu', 'Ngatup', '64182', '2021-06-09 21:22:48', '2021-06-09 21:22:48'),
(11, 12, 'Bagus', '081745287465', 'Jl. Kampung Baru No. 07', 'Jawa Timur', 'Kediri', 'Pagu', 'Ngatup', '64182', '2021-06-09 21:26:04', '2021-06-09 21:26:04'),
(12, 13, 'Nabila', '085674387453', 'Jl. Bulu No. 12', 'Jawa Timur', 'Kediri', 'Gurah', 'Turus', '64181', '2021-06-09 21:28:17', '2021-06-09 21:28:17'),
(13, 15, 'Nabila', '085674387453', 'Jl. Bulu No. 12', 'Jawa Timur', 'Kediri', 'Gurah', 'Turus', '64181', '2021-06-20 14:45:58', '2021-06-20 14:45:58'),
(14, 16, 'Nabila', '085674387453', 'Jl. Bulu No. 12', 'Jawa Timur', 'Kediri', 'Gurah', 'Turus', '64181', '2021-06-20 14:46:51', '2021-06-20 14:46:51'),
(15, 17, 'vito', '085123456789', 'Jl. Dahlia', 'Jawa Timur', 'Mojokerto', 'Gurah', 'Turus', '64181', '2021-06-20 14:49:25', '2021-06-20 14:49:25'),
(16, 18, 'Mas Febri', '083089568342', 'Jl. Duku', 'Jawa Timur', 'Kediri', 'Gurah', 'Bogem', '64181', '2021-06-20 14:50:25', '2021-06-20 14:50:25'),
(17, 14, 'Yuli', '085321654987', 'Jl. Ledehan No.03', 'Jawa Tengah', 'Semarang', 'Ringin Pitu', 'Pagu', '64322', '2021-06-20 14:53:13', '2021-06-20 14:53:13'),
(18, 19, 'Mas Febri', '083089568342', 'Jl. Duku', 'Jawa Timur', 'Kediri', 'Gurah', 'Bogem', '64181', '2021-06-22 08:14:06', '2021-06-22 08:14:06'),
(19, 20, 'Mas Febri', '083089568342', 'Jl. Duku', 'Jawa Timur', 'Kediri', 'Gurah', 'Bogem', '64181', '2021-06-25 16:58:40', '2021-06-25 16:58:40'),
(20, 21, 'vito', '085123456789', 'Jl. Dahlia', 'Jawa Timur', 'Mojokerto', 'Gurah', 'Turus', '64181', '2021-06-27 18:47:46', '2021-06-27 18:47:46'),
(21, 22, 'Vindi', '085608828683', 'Jl. Dahlia', 'Jawa Timur', 'Kediri', 'Pagu', 'Kawedussan', '64184', '2021-06-27 21:40:45', '2021-06-27 21:40:45'),
(22, 23, 'Vindi', '085608828683', 'Jl. Dahlia', 'Jawa Timur', 'Kediri', 'Pagu', 'Kawedussan', '64184', '2021-06-29 02:37:34', '2021-06-29 02:37:34'),
(23, 24, 'Vindi', '085608828683', 'Jl. Dahlia', 'Jawa Timur', 'Kediri', 'Pagu', 'Kawedussan', '64184', '2021-06-30 07:51:14', '2021-06-30 07:51:14'),
(24, 26, 'Ihtiara', '081987456556', 'Sambi', 'Jawa', 'Kediri', 'Sambi', 'Sambi', '64190', '2021-06-30 08:53:49', '2021-06-30 08:53:49'),
(25, 27, 'Bagus', '081745287465', 'Jl. Kampung Baru No. 07', 'Jawa Timur', 'Kediri', 'Pagu', 'Ngatup', '64182', '2021-07-01 00:07:37', '2021-07-01 00:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_produk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_qty` int(10) NOT NULL DEFAULT 7,
  `qty` int(10) NOT NULL DEFAULT 0,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double(12,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exp_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `supplier_id`, `user_id`, `kode_produk`, `nama_produk`, `slug_produk`, `deskripsi_produk`, `foto`, `min_qty`, `qty`, `satuan`, `harga`, `status`, `created_at`, `updated_at`, `exp_date`) VALUES
(1, 3, 1, 1, '', 'Tepung', 'tepung', 'Tepung bahan roti merk segitiga biru', 'files/OmCYi17YXa8lqrbqg0KrbP5Vi7nN66MOYnWkcleO.jpg', 7, 8, 'pack', 7000.00, 'publish', '2021-05-17 03:26:13', '2021-06-26 02:22:19', '2025-05-25'),
(2, 3, 1, 1, '', 'Tepung', 'tepung', 'tepung bumbu protein tinggi', 'files/clACBQgl0URdoLQHA7d32DJksyzFOW7tMU6Y7eAu.jpg', 7, 20, 'pack', 9000.00, 'publish', '2021-05-17 03:27:43', '2021-06-08 18:26:13', '2024-05-22'),
(3, 2, 2, 1, '', 'Plastik Sayur', 'plastik-sayur', 'plastik sayur', 'files/20xodOpbGoAw5OCqWwgwI7pfbxt1DMgTBlDJSxzR.jpg', 7, 4, 'pack', 3000.00, 'publish', '2021-05-17 03:35:11', '2021-07-01 00:06:11', '2023-05-12'),
(4, 4, 1, 1, '', 'Red Bell (Doger)', 'red-bell-doger', 'Perasa untuk es campur', 'files/3Q81NmtSehDjjM9iCwKO3ad8gDc1hLQRBoc4RZ1r.jpg', 7, 10, 'bijian', 5000.00, 'publish', '2021-05-17 04:02:53', '2021-06-09 21:34:24', '2023-03-22'),
(5, 3, 1, 1, '', 'Tepung Kunci Biru', 'tepung-kunci-biru', 'Kunci Biru adalah tepung terigu untuk kue kering, cake, dan biskuit.', 'files/zPT3Va0wrFpA5UjgGUGcSn8ko6xLaYof3zcWuvZ9.jpg', 7, 50, 'pack', 6500.00, 'publish', '2021-05-25 19:37:33', '2021-05-25 19:40:07', '2022-05-26'),
(6, 2, 2, 1, '', 'Plastik Bowling', 'plastik-bowling', 'Kantong plastik untuk wadah segala jenis benda asalkan muat.', 'files/LWb0Tfy4L4UdvDp5EZNiMgaS1Bw0t4DFeEEN13Vw.jpg', 7, 18, 'pack', 3500.00, 'publish', '2021-05-25 19:45:19', '2021-07-01 00:06:11', NULL),
(7, 2, 2, 1, '', 'Plastik Jerapah', 'plastik-jerapah', 'Plastik dengan merk dagang jerapah.', 'files/ROyY7ja2sKDKdqOXhtozgmrtOXjy5BNdsDM9QI6x.jpg', 7, 50, 'pack', 5000.00, 'publish', '2021-05-25 20:17:29', '2021-06-26 22:21:07', NULL),
(8, 2, 2, 1, '', 'Plastik Puma', 'plastik-puma', 'Kantong plastik dengan merk dagang puma.', 'files/UGKuef1fCaEbUDyBi1iWBevyMiZmB3EAAvI31uXj.jpg', 7, 40, 'pack', 6000.00, 'publish', '2021-05-25 20:18:41', '2021-06-26 22:20:44', NULL),
(9, 2, 2, 1, '', 'Plastik Wallet', 'plastik-wallet', 'Plastik dengan merk dagang wallet.', 'files/FeuJyDxBRRcSF3HBWXiKY5QlmqgD7oNiO2hUqbvN.jpg', 7, 40, 'pack', 2500.00, 'publish', '2021-05-25 20:19:34', '2021-06-26 22:13:16', NULL),
(10, 4, 1, 1, '', 'Red Bell (Frambozen)', 'red-bell-frambozen', 'Perasa untuk es campur', 'files/GZOoc5LgFWDev8gYIcHu0sqvvou9J9jCY3fpBxJ9.jpg', 7, 50, 'bijian', 5000.00, 'publish', '2021-06-09 21:31:20', '2021-06-26 21:29:24', '2022-06-10'),
(11, 4, 1, 1, '', 'Red Bell (Pandan)', 'red-bell-pandan', 'Cairan perasa untuk es campur', 'files/4XRNjPM9Bz9mf3iLi2AYNsh73KQFkJc1jsYcBMAN.jpg', 7, 50, 'bijian', 5000.00, 'publish', '2021-06-09 21:36:03', '2021-06-26 21:39:49', '2022-06-10'),
(12, 4, 1, 1, '', 'Red Bell (Durian Kuning)', 'red-bell-durian-kuning', 'Cairan perasa untuk es campur', 'files/tMDXNQgRhDjddhC4u6fbKaIXWpDorzZLSHh6kvBH.jpg', 7, 50, 'bijian', 5000.00, 'publish', '2021-06-09 21:37:23', '2021-06-26 21:38:59', '2022-06-10'),
(13, 4, 1, 1, '', 'Red Bell (susu)', 'red-bell-susu', 'Cairan perasa untuk es campur', 'files/Dy96sHWmG07aH9P41Q3VpuCIgPoonPV8flmKqeuO.jpg', 7, 50, 'bijian', 5000.00, 'publish', '2021-06-09 21:38:16', '2021-06-25 06:55:42', '2022-06-10'),
(14, 3, 1, 1, '', 'Mentega (Blue Band)', 'mentega-blue-band', 'Untuk menggoreng atau untuk campuran pembuatan roti', 'files/jL85IksYGGT1Nvq3HL2WmoEl80Zk3y472GTuntAQ.jpg', 7, 100, 'Kemasan', 4000.00, 'publish', '2021-06-09 21:41:34', '2021-06-26 22:10:03', '2021-11-10'),
(15, 3, 1, 1, '', 'Mentega (Palmboom)', 'mentega-palmboom', 'Untuk menggoreng atau untuk campuran pembuatan roti', 'files/fQRhlws5eSK8SQjpTSyGifAMMG0xcp0gaDGHnMo0.jpg', 7, 100, 'potongan', 5000.00, 'publish', '2021-06-09 21:42:19', '2021-06-24 18:30:05', '2021-09-10'),
(16, 3, 1, 1, '', 'Mentega (Amanda)', 'mentega-amanda', 'Mentega adalah makanan produk susu, dibuat dengan mengaduk krim yang didapat dari susu.', 'files/gev75m4HCDkhSHGJa0CAHuhE8f5ahFm1oK1EF5Ur.jpg', 7, 100, 'Kemasan', 3000.00, 'publish', '2021-06-09 21:43:12', '2021-06-26 22:08:15', '2021-10-10'),
(17, 1, 3, 1, '', 'Timba Uk.18', 'timba-uk18', 'Tempat untuk menampung air', 'files/PZYNqgRCY68jTqjhiFfjLXTXgfIwhYVO21Ay7BsV.jpg', 7, 20, 'bijian', 10000.00, 'publish', '2021-06-09 21:48:56', '2021-06-26 21:54:15', NULL),
(18, 1, 3, 1, '', 'Timba Uk. 20', 'timba-uk-20', 'Tempat untuk menampung air', 'files/pGOl1veSCJenxBepkIRrcMTopdGbg1vmMwI5V4f0.jpg', 7, 20, 'bijian', 12000.00, 'publish', '2021-06-09 21:49:50', '2021-06-26 21:53:56', NULL),
(19, 1, 3, 1, '', 'Timba Uk.22', 'timba-uk22', 'Tempat untuk menampung air', 'files/Py7cb6TJFGTe98pHs9RMLXvCgn082Dhobl0ao0MI.jpg', 7, 20, 'bijian', 14000.00, 'publish', '2021-06-09 21:50:37', '2021-06-26 21:53:00', NULL),
(20, 4, 3, 1, '', 'Panci', 'panci', 'Tempat atau wadah untuk memasak', 'files/objNgJYZicuQBVTlJbhgvwp1uf9XZAauWRcIuDPa.jpg', 7, 11, 'bijian', 20000.00, 'publish', '2021-06-09 21:51:52', '2021-06-26 02:22:42', '2022-06-23'),
(21, 2, 3, 1, '', 'Plastik Boyo', 'plastik-boyo', 'Kantong plastik digunakan untuk memuat dan membawa barang konsumsi.', 'files/0o38uDnghaWM4K5jRCYYD75vBhg6aWCVrp6koBFI.jpg', 7, 24, 'pack', 8000.00, 'publish', '2021-06-22 07:08:46', '2021-06-26 22:16:50', '2021-06-22'),
(22, 3, 3, 1, '', 'Makaroni', 'makaroni', 'Makanan yang dibuat dengan bahan yang bekuatitas dimana dapat diolah kembali dengan berbagai varian  rasa.', 'files/HkP6DqGKPPwfTr3N3N770L88lURjv15SB5X5NCCB.jpg', 7, 4, 'bungkus', 8000.00, 'publish', '2021-06-25 17:20:11', '2021-06-28 07:08:45', '2022-02-19'),
(24, 3, 1, 1, '', 'Mentega (Palmia)', 'mentega-palmia', 'Mentega adalah makanan produk susu, dibuat dengan mengaduk krim yang didapat dari susu.', 'files/n0s61yALPgRkCRPbYgItuqnovnLD4juE346I90Vk.jpg', 7, 19, 'Kemasan', 4500.00, 'publish', '2021-06-26 22:04:54', '2021-07-01 00:10:53', '2021-08-27'),
(25, 3, 1, 1, '', 'Mentega (Filma)', 'mentega-filma', 'Mentega adalah makanan produk susu, dibuat dengan mengaduk krim yang didapat dari susu.', 'files/XuZpBtuyfKZ45aKedPKmw75vxZy964f7B6F1JUTD.jpg', 7, 12, 'Kemasan', 4000.00, 'publish', '2021-06-26 22:22:34', '2021-07-01 00:06:11', '2021-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `produk_images`
--

CREATE TABLE `produk_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk_images`
--

INSERT INTO `produk_images` (`id`, `produk_id`, `foto`, `created_at`, `updated_at`) VALUES
(1, 2, 'files/clACBQgl0URdoLQHA7d32DJksyzFOW7tMU6Y7eAu.jpg', '2021-05-17 03:29:54', '2021-05-17 03:29:54'),
(2, 1, 'files/OmCYi17YXa8lqrbqg0KrbP5Vi7nN66MOYnWkcleO.jpg', '2021-05-17 03:32:03', '2021-05-17 03:32:03'),
(3, 3, 'files/20xodOpbGoAw5OCqWwgwI7pfbxt1DMgTBlDJSxzR.jpg', '2021-05-17 03:35:23', '2021-05-17 03:35:23'),
(4, 4, 'files/3Q81NmtSehDjjM9iCwKO3ad8gDc1hLQRBoc4RZ1r.jpg', '2021-05-17 04:04:14', '2021-05-17 04:04:14'),
(5, 5, 'files/zPT3Va0wrFpA5UjgGUGcSn8ko6xLaYof3zcWuvZ9.jpg', '2021-05-25 19:38:48', '2021-05-25 19:38:48'),
(6, 6, 'files/LWb0Tfy4L4UdvDp5EZNiMgaS1Bw0t4DFeEEN13Vw.jpg', '2021-05-25 19:45:42', '2021-05-25 19:45:42'),
(13, 20, 'files/objNgJYZicuQBVTlJbhgvwp1uf9XZAauWRcIuDPa.jpg', '2021-06-23 07:48:33', '2021-06-23 07:48:33'),
(21, 15, 'files/fQRhlws5eSK8SQjpTSyGifAMMG0xcp0gaDGHnMo0.jpg', '2021-06-24 18:30:05', '2021-06-24 18:30:05'),
(25, 13, 'files/Dy96sHWmG07aH9P41Q3VpuCIgPoonPV8flmKqeuO.jpg', '2021-06-25 06:55:42', '2021-06-25 06:55:42'),
(26, 22, 'files/HkP6DqGKPPwfTr3N3N770L88lURjv15SB5X5NCCB.jpg', '2021-06-25 17:22:56', '2021-06-25 17:22:56'),
(28, 10, 'files/GZOoc5LgFWDev8gYIcHu0sqvvou9J9jCY3fpBxJ9.jpg', '2021-06-26 21:29:24', '2021-06-26 21:29:24'),
(29, 12, 'files/tMDXNQgRhDjddhC4u6fbKaIXWpDorzZLSHh6kvBH.jpg', '2021-06-26 21:38:59', '2021-06-26 21:38:59'),
(30, 11, 'files/4XRNjPM9Bz9mf3iLi2AYNsh73KQFkJc1jsYcBMAN.jpg', '2021-06-26 21:39:49', '2021-06-26 21:39:49'),
(31, 21, 'files/0o38uDnghaWM4K5jRCYYD75vBhg6aWCVrp6koBFI.jpg', '2021-06-26 21:50:09', '2021-06-26 21:50:09'),
(32, 19, 'files/Py7cb6TJFGTe98pHs9RMLXvCgn082Dhobl0ao0MI.jpg', '2021-06-26 21:53:00', '2021-06-26 21:53:00'),
(33, 18, 'files/pGOl1veSCJenxBepkIRrcMTopdGbg1vmMwI5V4f0.jpg', '2021-06-26 21:53:56', '2021-06-26 21:53:56'),
(34, 17, 'files/PZYNqgRCY68jTqjhiFfjLXTXgfIwhYVO21Ay7BsV.jpg', '2021-06-26 21:54:15', '2021-06-26 21:54:15'),
(35, 16, 'files/gev75m4HCDkhSHGJa0CAHuhE8f5ahFm1oK1EF5Ur.jpg', '2021-06-26 21:55:58', '2021-06-26 21:55:58'),
(36, 14, 'files/jL85IksYGGT1Nvq3HL2WmoEl80Zk3y472GTuntAQ.jpg', '2021-06-26 22:03:06', '2021-06-26 22:03:06'),
(37, 24, 'files/n0s61yALPgRkCRPbYgItuqnovnLD4juE346I90Vk.jpg', '2021-06-26 22:05:09', '2021-06-26 22:05:09'),
(38, 9, 'files/FeuJyDxBRRcSF3HBWXiKY5QlmqgD7oNiO2hUqbvN.jpg', '2021-06-26 22:13:16', '2021-06-26 22:13:16'),
(39, 8, 'files/UGKuef1fCaEbUDyBi1iWBevyMiZmB3EAAvI31uXj.jpg', '2021-06-26 22:20:44', '2021-06-26 22:20:44'),
(40, 7, 'files/ROyY7ja2sKDKdqOXhtozgmrtOXjy5BNdsDM9QI6x.jpg', '2021-06-26 22:21:07', '2021-06-26 22:21:07'),
(41, 25, 'files/XuZpBtuyfKZ45aKedPKmw75vxZy964f7B6F1JUTD.jpg', '2021-06-26 22:22:48', '2021-06-26 22:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `produk_promo`
--

CREATE TABLE `produk_promo` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `harga_awal` decimal(16,2) NOT NULL DEFAULT 0.00,
  `harga_akhir` decimal(16,2) NOT NULL DEFAULT 0.00,
  `diskon_persen` int(11) NOT NULL DEFAULT 0,
  `diskon_nominal` decimal(16,2) NOT NULL DEFAULT 0.00,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk_promo`
--

INSERT INTO `produk_promo` (`id`, `produk_id`, `harga_awal`, `harga_akhir`, `diskon_persen`, `diskon_nominal`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 2, '9000.00', '8100.00', 10, '900.00', 1, '2021-05-18 06:16:23', '2021-05-18 06:16:23'),
(3, 3, '3000.00', '2550.00', 15, '450.00', 2, '2021-05-28 20:19:32', '2021-06-14 05:38:08'),
(4, 6, '3500.00', '3150.00', 10, '350.00', 1, '2021-06-25 07:06:16', '2021-06-25 07:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `foto`, `caption_title`, `caption_content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'files/5sceXtwLXtuYegtoswiAoi3Objz6q9zPw6toxsfU.jpg', 'Promo', 'Promo akhir tahun', 1, '2021-05-28 20:22:22', '2021-05-28 20:22:22'),
(2, 'files/h6AKl1U7Rup2kExTIeCIscDmp318KsOT96DPksMJ.jpg', 'Promo Dapur', 'deskripsi promo slide show', 1, '2021-05-28 20:23:25', '2021-05-28 20:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama`, `alamat`, `email`, `telp`, `created_at`, `updated_at`) VALUES
(1, 'CV. Tepung Sari', 'Pare Kediri Jawa timur', 'tepungsari@gmail.com', '081231241231', '2021-05-17 03:22:46', '2021-06-25 20:43:11'),
(2, 'CV. Supplier Plastik', 'Jalan Ploso, Ploso Jombang', 'plastiksupplier@gmail.com', '081234567892', '2021-05-17 03:23:31', '2021-06-25 20:43:00'),
(3, 'CV. Makmur Sejahtera', 'Bajaran Kediri jawa Timur', 'makmursejahtera@gmail.com', '081765875675', '2021-06-09 21:46:46', '2021-06-09 21:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `alamat`, `role`, `foto`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Site Administrator', 'administrator@gmail.com', NULL, '$2y$10$f1YxtRjuIA95jrof6tj.3OStF2ForgaYVlv2zluL/EjUa2nFwHyE.', '085852527575', 'Wates Kediri', 'admin', NULL, 'aktif', NULL, NULL, '2021-06-25 20:25:44'),
(2, 'Vito', 'radityavitonugroho@gmail.com', NULL, '$2y$10$zT2Vm4feD27q.qjx5aTVj.0b6MjkegdKc/7TWv97Ne1KK4pZmQ9/C', '085321654987', 'Pare Kediri', 'staff', NULL, 'aktif', NULL, '2021-05-17 03:48:23', '2021-06-26 02:30:33'),
(3, 'Ihtiara', 'ihtiaraafrisani@gmail.com', NULL, '$2y$10$.CQ8EEdKliLrk/utZJrIAujD94FTXBtrhnvQ6ytacQb5bVgZFPeKK', '085987654321', 'Sambi Kediri', 'member', NULL, 'nonaktif', NULL, '2021-05-17 03:50:13', '2021-06-25 20:30:02'),
(4, 'Bagus Setyawan', 'bagussetyawan42@gmail.com', NULL, '$2y$10$YNvhJ47DBR2BitZEqjoLzOU4EdO6ubZtRkL2hmGgHoiIlePGthTgq', '081755387342', 'Pagu Kediri', 'member', NULL, 'aktif', NULL, '2021-06-05 23:21:56', '2021-06-25 20:29:41'),
(6, 'vindi dwi', 'vindidwi@gmail.com', NULL, '$2y$10$rsMRilR1FKUBbDfj3NaX0eHD1ykndkE5.ggwXkD4dUiRmDeAkQbz6', '085608828683', NULL, 'member', NULL, 'aktif', NULL, '2021-06-30 08:46:52', '2021-06-30 08:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `produk_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2021-05-25 07:58:31', '2021-05-25 07:58:31'),
(3, 2, 1, '2021-05-25 20:25:38', '2021-05-25 20:25:38'),
(4, 9, 3, '2021-06-04 23:24:28', '2021-06-04 23:24:28'),
(5, 20, 3, '2021-06-25 16:57:53', '2021-06-25 16:57:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat_pengiriman`
--
ALTER TABLE `alamat_pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alamat_pengiriman_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_detail_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_detail_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_user_id_foreign` (`user_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_cart_id_foreign` (`cart_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_user_id_foreign` (`user_id`),
  ADD KEY `produk_kategori_id_foreign` (`kategori_id`),
  ADD KEY `produk_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `produk_images`
--
ALTER TABLE `produk_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_images_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `produk_promo`
--
ALTER TABLE `produk_promo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_promo_user_id_foreign` (`user_id`),
  ADD KEY `produk_promo_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slideshow_user_id_foreign` (`user_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_user_id_foreign` (`user_id`),
  ADD KEY `wishlist_produk_id_foreign` (`produk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat_pengiriman`
--
ALTER TABLE `alamat_pengiriman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `produk_images`
--
ALTER TABLE `produk_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `produk_promo`
--
ALTER TABLE `produk_promo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat_pengiriman`
--
ALTER TABLE `alamat_pengiriman`
  ADD CONSTRAINT `alamat_pengiriman_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_detail_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `produk_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `produk_images`
--
ALTER TABLE `produk_images`
  ADD CONSTRAINT `produk_images_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Constraints for table `produk_promo`
--
ALTER TABLE `produk_promo`
  ADD CONSTRAINT `produk_promo_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `produk_promo_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD CONSTRAINT `slideshow_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
