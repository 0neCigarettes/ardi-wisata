-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 12:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ardi-wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_tikets`
--

CREATE TABLE `detail_tikets` (
  `id` bigint(20) NOT NULL,
  `idTiket` bigint(20) NOT NULL,
  `jenisTiket` varchar(25) NOT NULL,
  `jumlahBeli` int(5) NOT NULL,
  `adaDiskon` tinyint(1) NOT NULL DEFAULT 0,
  `diskon` tinyint(3) NOT NULL DEFAULT 0,
  `hargaDiskon` double NOT NULL DEFAULT 0,
  `harga` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_tikets`
--

INSERT INTO `detail_tikets` (`id`, `idTiket`, `jenisTiket`, `jumlahBeli`, `adaDiskon`, `diskon`, `hargaDiskon`, `harga`, `created_at`, `updated_at`) VALUES
(441, 307, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:16:03', '2022-04-25 12:16:03'),
(442, 307, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:16:03', '2022-04-25 12:16:03'),
(443, 308, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:17:57', '2022-04-25 12:17:57'),
(444, 308, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:17:57', '2022-04-25 12:17:57'),
(445, 309, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:19:32', '2022-04-25 12:19:32'),
(446, 309, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:19:32', '2022-04-25 12:19:32'),
(447, 310, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:23:07', '2022-04-25 12:23:07'),
(448, 310, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:23:07', '2022-04-25 12:23:07'),
(449, 311, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:32:07', '2022-04-25 12:32:07'),
(450, 311, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:32:07', '2022-04-25 12:32:07'),
(451, 312, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:32:21', '2022-04-25 12:32:21'),
(452, 312, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:32:21', '2022-04-25 12:32:21'),
(453, 313, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:34:54', '2022-04-25 12:34:54'),
(454, 313, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:34:54', '2022-04-25 12:34:54'),
(455, 314, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:35:15', '2022-04-25 12:35:15'),
(456, 314, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:35:15', '2022-04-25 12:35:15'),
(457, 315, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:35:32', '2022-04-25 12:35:32'),
(458, 315, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:35:32', '2022-04-25 12:35:32'),
(459, 316, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:37:04', '2022-04-25 12:37:04'),
(460, 316, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:37:04', '2022-04-25 12:37:04'),
(461, 317, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:38:21', '2022-04-25 12:38:21'),
(462, 317, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:38:21', '2022-04-25 12:38:21'),
(463, 318, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:38:42', '2022-04-25 12:38:42'),
(464, 318, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:38:42', '2022-04-25 12:38:42'),
(465, 319, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:39:46', '2022-04-25 12:39:46'),
(466, 319, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:39:46', '2022-04-25 12:39:46'),
(467, 320, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:40:16', '2022-04-25 12:40:16'),
(468, 320, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:40:16', '2022-04-25 12:40:16'),
(469, 321, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:42:14', '2022-04-25 12:42:14'),
(470, 321, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:42:14', '2022-04-25 12:42:14'),
(471, 322, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:42:34', '2022-04-25 12:42:34'),
(472, 322, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:42:34', '2022-04-25 12:42:34'),
(473, 323, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:42:57', '2022-04-25 12:42:57'),
(474, 323, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:42:57', '2022-04-25 12:42:57'),
(475, 324, 'Dewasa', 1, 0, 0, 20000, 20000, '2022-04-25 12:43:57', '2022-04-25 12:43:57'),
(476, 325, 'Dewasa', 1, 0, 0, 20000, 20000, '2022-04-25 12:44:19', '2022-04-25 12:44:19'),
(477, 326, 'Dewasa', 1, 0, 0, 20000, 20000, '2022-04-25 12:44:36', '2022-04-25 12:44:36'),
(478, 327, 'Dewasa', 1, 0, 0, 20000, 20000, '2022-04-25 12:44:44', '2022-04-25 12:44:44'),
(479, 328, 'Dewasa', 1, 0, 0, 20000, 20000, '2022-04-25 12:44:50', '2022-04-25 12:44:50'),
(480, 329, 'Dewasa', 1, 0, 0, 20000, 20000, '2022-04-25 12:44:58', '2022-04-25 12:44:58'),
(481, 330, 'Dewasa', 1, 0, 0, 20000, 20000, '2022-04-25 12:46:02', '2022-04-25 12:46:02'),
(482, 331, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:46:26', '2022-04-25 12:46:26'),
(483, 332, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:46:45', '2022-04-25 12:46:45'),
(484, 332, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:46:45', '2022-04-25 12:46:45'),
(485, 333, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:47:27', '2022-04-25 12:47:27'),
(486, 333, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:47:27', '2022-04-25 12:47:27'),
(487, 334, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:49:23', '2022-04-25 12:49:23'),
(488, 334, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:49:23', '2022-04-25 12:49:23'),
(489, 335, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:49:36', '2022-04-25 12:49:36'),
(490, 335, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:49:36', '2022-04-25 12:49:36'),
(491, 336, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:52:25', '2022-04-25 12:52:25'),
(492, 336, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:52:25', '2022-04-25 12:52:25'),
(493, 337, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:52:38', '2022-04-25 12:52:38'),
(494, 337, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:52:38', '2022-04-25 12:52:38'),
(495, 338, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:52:53', '2022-04-25 12:52:53'),
(496, 338, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:52:53', '2022-04-25 12:52:53'),
(497, 339, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:53:04', '2022-04-25 12:53:04'),
(498, 339, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:53:04', '2022-04-25 12:53:04'),
(499, 340, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:53:13', '2022-04-25 12:53:13'),
(500, 340, 'Dewasa', 2, 0, 0, 20000, 20000, '2022-04-25 12:53:13', '2022-04-25 12:53:13'),
(501, 341, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:53:49', '2022-04-25 12:53:49'),
(502, 341, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:53:49', '2022-04-25 12:53:49'),
(503, 342, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:54:09', '2022-04-25 12:54:09'),
(504, 342, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:54:09', '2022-04-25 12:54:09'),
(505, 342, 'Anak-anak', 1, 1, 10, 13500, 15000, '2022-04-25 12:54:09', '2022-04-25 12:54:09'),
(506, 343, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:55:45', '2022-04-25 12:55:45'),
(507, 343, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 12:55:45', '2022-04-25 12:55:45'),
(508, 343, 'Anak-anak', 1, 1, 10, 13500, 15000, '2022-04-25 12:55:45', '2022-04-25 12:55:45'),
(509, 344, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 13:01:40', '2022-04-25 13:01:40'),
(510, 344, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 13:01:40', '2022-04-25 13:01:40'),
(511, 344, 'Anak-anak', 1, 1, 10, 13500, 15000, '2022-04-25 13:01:40', '2022-04-25 13:01:40'),
(512, 345, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 13:01:47', '2022-04-25 13:01:47'),
(513, 345, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 13:01:47', '2022-04-25 13:01:47'),
(514, 345, 'Anak-anak', 1, 1, 10, 13500, 15000, '2022-04-25 13:01:47', '2022-04-25 13:01:47'),
(515, 346, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 13:01:54', '2022-04-25 13:01:54'),
(516, 346, 'Anak-anak', 2, 1, 10, 13500, 15000, '2022-04-25 13:01:54', '2022-04-25 13:01:54'),
(517, 346, 'Anak-anak', 1, 1, 10, 13500, 15000, '2022-04-25 13:01:54', '2022-04-25 13:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint(20) NOT NULL,
  `idTransaksi` bigint(20) NOT NULL,
  `namaProduk` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `diskon` tinyint(3) NOT NULL,
  `jumlahBeli` int(3) NOT NULL,
  `adaDiskon` tinyint(1) NOT NULL,
  `hargaDiskon` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `idTransaksi`, `namaProduk`, `harga`, `diskon`, `jumlahBeli`, `adaDiskon`, `hargaDiskon`, `created_at`, `updated_at`) VALUES
(1, 2, 'baju dewasa', 20000, 10, 2, 1, 18000, '2022-04-26 20:07:06', '2022-04-26 20:07:06'),
(2, 3, 'baju dewasa', 20000, 10, 2, 1, 18000, '2022-04-26 20:11:28', '2022-04-26 20:11:28'),
(3, 4, 'baju dewasa', 20000, 10, 2, 1, 18000, '2022-04-26 20:12:12', '2022-04-26 20:12:12'),
(4, 5, 'baju dewasa', 20000, 10, 2, 1, 18000, '2022-04-26 20:13:33', '2022-04-26 20:13:33'),
(5, 6, 'baju dewasa', 20000, 10, 2, 1, 18000, '2022-04-26 20:14:21', '2022-04-26 20:14:21'),
(6, 7, 'baju dewasa', 20000, 10, 2, 1, 18000, '2022-04-26 20:14:32', '2022-04-26 20:14:32'),
(7, 8, 'baju dewasa', 20000, 10, 2, 1, 18000, '2022-04-26 20:14:56', '2022-04-26 20:14:56'),
(8, 9, 'baju dewasa', 20000, 10, 2, 1, 18000, '2022-04-26 20:15:04', '2022-04-26 20:15:04'),
(9, 10, 'baju anak', 45000, 0, 2, 0, 45000, '2022-04-26 20:16:04', '2022-04-26 20:16:04'),
(10, 11, 'baju anak', 45000, 0, 2, 0, 45000, '2022-04-26 20:16:30', '2022-04-26 20:16:30'),
(11, 11, 'baju dewasa', 20000, 10, 1, 1, 18000, '2022-04-26 20:16:30', '2022-04-26 20:16:30'),
(12, 12, 'baju anak', 45000, 0, 2, 0, 45000, '2022-04-26 20:16:54', '2022-04-26 20:16:54'),
(13, 12, 'baju dewasa', 20000, 10, 1, 1, 18000, '2022-04-26 20:16:54', '2022-04-26 20:16:54'),
(14, 13, 'baju anak', 45000, 0, 2, 0, 45000, '2022-04-26 20:17:18', '2022-04-26 20:17:18'),
(15, 13, 'baju dewasa', 20000, 10, 1, 1, 18000, '2022-04-26 20:17:18', '2022-04-26 20:17:18'),
(16, 13, 'baju dewasa', 20000, 10, 2, 1, 18000, '2022-04-26 20:17:18', '2022-04-26 20:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_parkirs`
--

CREATE TABLE `jenis_parkirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(150) NOT NULL,
  `harga` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_parkirs`
--

INSERT INTO `jenis_parkirs` (`id`, `label`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Motor', 5000, '2022-04-17 07:08:16', '2022-04-17 07:09:45'),
(2, 'Mobil', 7000, '2022-04-17 07:09:11', '2022-04-20 22:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tikets`
--

CREATE TABLE `jenis_tikets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(100) NOT NULL,
  `harga` double NOT NULL DEFAULT 0,
  `diskon` int(3) NOT NULL DEFAULT 0,
  `expiredDiskon` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_tikets`
--

INSERT INTO `jenis_tikets` (`id`, `label`, `harga`, `diskon`, `expiredDiskon`, `created_at`, `updated_at`) VALUES
(10, 'Anak-anak', 15000, 10, '2022-04-25', '2022-04-16 15:38:26', '2022-04-23 22:35:18'),
(11, 'Dewasa', 20000, 0, NULL, '2022-04-16 16:07:14', '2022-04-16 16:13:42');

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2022_04_16_114135_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('bramkrisna16@gmail.com', '$2y$10$pc4m8lUTmrPdfwDq3h0N.OasaphgpIxZ7KCobqNUMUTlkXdhDrLWu', '2022-04-16 04:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idWarung` bigint(20) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlahSatuan` varchar(50) DEFAULT '-',
  `harga` double NOT NULL,
  `diskon` int(3) NOT NULL DEFAULT 0,
  `expiredPromo` date DEFAULT NULL,
  `stok` int(25) NOT NULL,
  `keterangan` tinytext DEFAULT '-',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `idWarung`, `kode`, `nama`, `jumlahSatuan`, `harga`, `diskon`, `expiredPromo`, `stok`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'PRDA9X4WPLZU', 'aqua botol', '450 mili', 5000, 0, NULL, 100, 'mineral aqua', '2022-04-20 21:56:32', '2022-04-23 20:25:32'),
(5, 2, 'PRDSKWWK477C', 'baju dewasa', '1 bungkus', 20000, 10, '2022-04-27', 77, 'aasd', '2022-04-26 18:52:36', '2022-04-26 20:17:18'),
(6, 2, 'PRD9FK0UTS6N', 'baju anak', 'asa', 45000, 0, NULL, -7, 'sadas', '2022-04-26 18:56:23', '2022-04-26 20:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('vJYUBxWPoR8rAYDSGG4C9etcYPSve6rWJgfp2TyK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiczhMcUVYTUpNa3hheXJ6ZWRHMUxBSkJkd1VtM1dHMGtGTTJpZ3YwQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1651008469),
('XSJFOFZSS6QYPTjrz6zp0gI0FHg6DlL9aaJ15Gk9', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV0NjUm5EcmFHVmZ2M3JBTHBJSXlUZ2tFVUNDWlFVVGxUSXNQRHppUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zeXMvYWRtaW4vcHJvZHVrIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ0L05DQVo3bEloZGtlUFB1ZGkveE8uU0NmbVp0Y1ZGcUVlUWx4dUpHSGwxalJNM0daNkZoTyI7fQ==', 1651000774),
('yh0YsxEiKOnqrcudmbvD5Feng5BAd6QYJV6pfS9X', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYzRWRlNXSUswSXl1T2VmRTdpR2Z2SGUwYmFoZVVvbUNmUHZ6RVZBZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=', 1651008698);

-- --------------------------------------------------------

--
-- Table structure for table `tikets`
--

CREATE TABLE `tikets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(30) NOT NULL,
  `isParkir` tinyint(1) NOT NULL,
  `nomorPolisi` varchar(10) DEFAULT NULL,
  `jenisKendaraan` varchar(25) DEFAULT NULL,
  `hargaParkir` double DEFAULT 0,
  `totalBayar` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tikets`
--

INSERT INTO `tikets` (`id`, `kode`, `isParkir`, `nomorPolisi`, `jenisKendaraan`, `hargaParkir`, `totalBayar`, `created_at`, `updated_at`) VALUES
(307, 'XRT-PNPKM40VAYPJGULZ', 1, 'BE 0323 EB', 'Mobil', 7000, 74000, '2022-04-25 12:16:03', '2022-04-25 12:16:03'),
(308, 'XRT-VIVNUT5RZ72M7BFO', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:17:57', '2022-04-25 12:17:57'),
(309, 'XRT-CKGRN6SEI3MFDXCF', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:19:32', '2022-04-25 12:19:32'),
(310, 'XRT-TIJP2MJXSVJTNGZX', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:23:07', '2022-04-25 12:23:07'),
(311, 'XRT-WA2AF9QADGU4WW17', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:32:07', '2022-04-25 12:32:07'),
(312, 'XRT-JREUZIO59ECLMSD1', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:32:21', '2022-04-25 12:32:21'),
(313, 'XRT-8M4Z7F2NFEA2FSN8', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:34:54', '2022-04-25 12:34:54'),
(314, 'XRT-GJZVA3ISQRU33OV9', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:35:15', '2022-04-25 12:35:15'),
(315, 'XRT-7R795577Y1A7GF23', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:35:32', '2022-04-25 12:35:32'),
(316, 'XRT-C0DPCV64OBC8I9MN', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:37:04', '2022-04-25 12:37:04'),
(317, 'XRT-AIO1T1GM421309HM', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:38:21', '2022-04-25 12:38:21'),
(318, 'XRT-ZSDZ21QPZFS2VILM', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:38:42', '2022-04-25 12:38:42'),
(319, 'XRT-EORR4XVXJN9PQKGH', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:39:46', '2022-04-25 12:39:46'),
(320, 'XRT-CQPH4D9KLVDV5IDV', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:40:16', '2022-04-25 12:40:16'),
(321, 'XRT-ZCA8SH0O1X7Y0LG7', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:42:14', '2022-04-25 12:42:14'),
(322, 'XRT-O4389NR98DNNOTFQ', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:42:34', '2022-04-25 12:42:34'),
(323, 'XRT-78WM0B3JIPLOYW60', 1, '2', 'Mobil', 7000, 74000, '2022-04-25 12:42:57', '2022-04-25 12:42:57'),
(324, 'XRT-VDUTLRV4TXF1A9MX', 0, NULL, NULL, 0, 20000, '2022-04-25 12:43:57', '2022-04-25 12:43:57'),
(325, 'XRT-UD6RBZ0DSNH6JWPM', 0, NULL, NULL, 0, 20000, '2022-04-25 12:44:19', '2022-04-25 12:44:19'),
(326, 'XRT-9XARSP6D64HHNIV2', 0, NULL, NULL, 0, 20000, '2022-04-25 12:44:36', '2022-04-25 12:44:36'),
(327, 'XRT-5TDPBMX9GNXCRF04', 0, NULL, NULL, 0, 20000, '2022-04-25 12:44:44', '2022-04-25 12:44:44'),
(328, 'XRT-J7ITBYUZ72G13QZH', 0, NULL, NULL, 0, 20000, '2022-04-25 12:44:50', '2022-04-25 12:44:50'),
(329, 'XRT-MEBY8V667FBRDAM4', 0, NULL, NULL, 0, 20000, '2022-04-25 12:44:58', '2022-04-25 12:44:58'),
(330, 'XRT-4J0OVLM7BMIU5YEK', 0, NULL, NULL, 0, 20000, '2022-04-25 12:46:02', '2022-04-25 12:46:02'),
(331, 'XRT-2QJ9KX1KJMRKBMN7', 0, NULL, NULL, 0, 27000, '2022-04-25 12:46:26', '2022-04-25 12:46:26'),
(332, 'XRT-C9BZQRA9PX0ZXWY5', 0, NULL, NULL, 0, 67000, '2022-04-25 12:46:45', '2022-04-25 12:46:45'),
(333, 'XRT-8PIZ8ST4VY6BCVXO', 1, 'BE 0323 EB', 'Mobil', 7000, 74000, '2022-04-25 12:47:27', '2022-04-25 12:47:27'),
(334, 'XRT-5ENS8RO5J5A5UIS9', 1, 'BE 0323 EB', 'Mobil', 7000, 74000, '2022-04-25 12:49:23', '2022-04-25 12:49:23'),
(335, 'XRT-NWN3B830L4QXMNTH', 0, NULL, NULL, 0, 67000, '2022-04-25 12:49:36', '2022-04-25 12:49:36'),
(336, 'XRT-KO8H0O9S6XXG1DQB', 0, NULL, NULL, 0, 67000, '2022-04-25 12:52:25', '2022-04-25 12:52:25'),
(337, 'XRT-NNVXPC58BJEEBLJE', 0, NULL, NULL, 0, 67000, '2022-04-25 12:52:38', '2022-04-25 12:52:38'),
(338, 'XRT-AHHK8ETR60LHMZEP', 0, NULL, NULL, 0, 67000, '2022-04-25 12:52:53', '2022-04-25 12:52:53'),
(339, 'XRT-KKQ1FJF0N4FQXWDR', 0, NULL, NULL, 0, 67000, '2022-04-25 12:53:04', '2022-04-25 12:53:04'),
(340, 'XRT-9LY21L5Y10RFYDJD', 0, NULL, NULL, 0, 67000, '2022-04-25 12:53:13', '2022-04-25 12:53:13'),
(341, 'XRT-L0IY44WKRBZYHW15', 0, NULL, NULL, 0, 54000, '2022-04-25 12:53:49', '2022-04-25 12:53:49'),
(342, 'XRT-S82DZ7C3447KT5TN', 0, NULL, NULL, 0, 67500, '2022-04-25 12:54:09', '2022-04-25 12:54:09'),
(343, 'XRT-PVGWPDZOA9V57AVY', 1, 'BE 0323 EB', 'Mobil', 7000, 74500, '2022-04-25 12:55:45', '2022-04-25 12:55:45'),
(344, 'XRT-BGE6EGRAWT2JY2SV', 1, 'BE 0323 EB', 'Mobil', 7000, 74500, '2022-04-25 13:01:40', '2022-04-25 13:01:40'),
(345, 'XRT-I4CW1A90LPHQ4BX4', 1, 'BE 0323 EB', 'Mobil', 7000, 74500, '2022-04-25 13:01:47', '2022-04-25 13:01:47'),
(346, 'XRT-B48Q6UJ3J7GM7E13', 1, 'BE 0323 EB', 'Mobil', 7000, 74500, '2022-04-25 13:01:54', '2022-04-25 13:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idWarung` bigint(20) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `idWarung`, `kode`, `total`, `created_at`, `updated_at`) VALUES
(1, 2, 'TRX-270420220BYQZ89USU18S', 36000, '2022-04-26 20:06:11', '2022-04-26 20:06:11'),
(2, 2, 'TRX-27042022LOXI3NEQVUHCV', 36000, '2022-04-26 20:07:06', '2022-04-26 20:07:06'),
(3, 2, 'TRX-27042022IO4JL8DAVRDVM', 36000, '2022-04-26 20:11:28', '2022-04-26 20:11:28'),
(4, 2, 'TRX-27042022YNGSAVSZY', 36000, '2022-04-26 20:12:12', '2022-04-26 20:12:12'),
(5, 2, 'TRX-27042022OX33ZMSW1', 36000, '2022-04-26 20:13:33', '2022-04-26 20:13:33'),
(6, 2, 'TRX-27042022UV9ZGOBE8', 36000, '2022-04-26 20:14:21', '2022-04-26 20:14:21'),
(7, 2, 'TRX-27042022ZD68QJNFF', 36000, '2022-04-26 20:14:32', '2022-04-26 20:14:32'),
(8, 2, 'TRX-27042022TWBJEHIHP', 36000, '2022-04-26 20:14:56', '2022-04-26 20:14:56'),
(9, 2, 'TRX-27042022W3GIU0964', 36000, '2022-04-26 20:15:04', '2022-04-26 20:15:04'),
(10, 2, 'TRX-27042022TK1HB1GCB', 90000, '2022-04-26 20:16:04', '2022-04-26 20:16:04'),
(11, 2, 'TRX-27042022Z992AM3XW', 108000, '2022-04-26 20:16:30', '2022-04-26 20:16:30'),
(12, 2, 'TRX-27042022JLKZPXV2E', 108000, '2022-04-26 20:16:54', '2022-04-26 20:16:54'),
(13, 2, 'TRX-27042022WQWZI2O6Y', 144000, '2022-04-26 20:17:18', '2022-04-26 20:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `idWarung` bigint(20) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `role`, `idWarung`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(2, 'admin', NULL, 1, 0, 'admin@gmail.com', NULL, '$2y$10$4/NCAZ7lIhdkePPudi/xO.SCfmZtcVFqEeQlxuJGHl1jRM3GZ6FhO', NULL, NULL, NULL, 'GqLX8gWWmTaG6spsaaCX43G25WawwIrADvPWDkwRzW9BuHozyqvEeueGjkW4', NULL, NULL, '2022-04-16 11:04:57', '2022-04-16 11:04:57'),
(3, 'Tiket', 'asasas', 2, 0, 'tiket@gmail.com', NULL, '$2y$10$ic4OiYzN03DUGMZRAsDORugt23m0UrBjt44HCrNskEwHATuPJB9Rm', NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-17 07:11:47', '2022-04-23 22:43:49'),
(6, 'adi', 'asa', 3, 2, 'adi@mail.com', NULL, '$2y$10$BmyLpcNm3W9c0BZlC95qMOvEhTJ0/ghH.eeg8cyfOO1LE7FDiCCHG', NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-22 03:57:51', '2022-04-25 18:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `warungs`
--

CREATE TABLE `warungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `keterangan` tinytext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warungs`
--

INSERT INTO `warungs` (`id`, `kode`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'WRGMKDCA', 'Warung jajanan', 'jual jajan', '2022-04-20 19:51:14', '2022-04-20 21:18:45'),
(2, 'WRG4UXDF', 'Warung Souvenir', 'Tempat jualan souvenir', '2022-04-20 20:10:09', '2022-04-20 20:13:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_tikets`
--
ALTER TABLE `detail_tikets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_parkirs`
--
ALTER TABLE `jenis_parkirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_tikets`
--
ALTER TABLE `jenis_tikets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tikets`
--
ALTER TABLE `tikets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warungs`
--
ALTER TABLE `warungs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_tikets`
--
ALTER TABLE `detail_tikets`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=518;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_parkirs`
--
ALTER TABLE `jenis_parkirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_tikets`
--
ALTER TABLE `jenis_tikets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tikets`
--
ALTER TABLE `tikets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `warungs`
--
ALTER TABLE `warungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
