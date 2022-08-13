-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2022 at 06:56 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nomor_akun` varchar(50) NOT NULL,
  `nama_akun` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nomor_akun`, `nama_akun`) VALUES
(1, '1-111', 'Kas'),
(2, '1-112', 'accounts receivable'),
(3, '1-113', 'Cash'),
(4, '1-114', 'Down Payment'),
(5, '4-115', 'sale'),
(6, '5-116', 'discount'),
(7, '5-117', 'Beban Gaji Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `akuntansi`
--

CREATE TABLE `akuntansi` (
  `id` int(11) NOT NULL,
  `nama_akuntansi` text NOT NULL,
  `saldo_normal` enum('debet','credit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akuntansi`
--

INSERT INTO `akuntansi` (`id`, `nama_akuntansi`, `saldo_normal`) VALUES
(1, 'Asset', 'debet'),
(2, 'Utang', 'credit'),
(3, 'Modal', 'credit'),
(4, 'Pendapatan', 'credit'),
(5, 'Beban', 'debet');

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(2, '::1', 'muhamadarifbudiman22@gmail.com', 2, '2022-08-09 10:14:28', 1),
(3, '::1', 'muhamadarifbudiman22@gmail.com', 2, '2022-08-09 10:15:02', 1),
(4, '::1', 'muhamadarifbudiman22@gmail.com', 2, '2022-08-09 10:15:39', 1),
(5, '::1', 'muhamadarifbudiman22@gmail.com', 2, '2022-08-09 10:24:33', 1),
(6, '::1', 'muhamadarifbudiman22@gmail.com', 2, '2022-08-09 10:29:45', 1),
(7, '::1', 'muhamadarifbudiman22@gmail.com', 2, '2022-08-10 06:34:52', 1),
(8, '::1', 'muhamadarifbudiman22@gmail.com', 2, '2022-08-10 06:49:08', 1),
(9, '::1', 'muhamadarifbudiman22@gmail.com', 2, '2022-08-11 06:25:55', 1),
(10, '::1', 'muhamadarifbudiman22@gmail.com', 2, '2022-08-12 06:33:04', 1),
(11, '::1', 'aripbudiman', NULL, '2022-08-12 06:33:05', 0),
(12, '::1', 'muhamadarifbudiman22@gmail.com', 2, '2022-08-12 06:33:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` int(11) NOT NULL,
  `kode_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `kode_bahan`, `nama_bahan`) VALUES
(1, 1001, 'Flexi Frontlite 280'),
(2, 1002, 'Flexi Frontlite 280 HIRES'),
(3, 1003, 'FX 340'),
(4, 1004, 'KORCIN 440'),
(6, 1005, 'BACKLITE 510'),
(7, 1006, 'ALBATROS'),
(8, 1007, 'STICKER CHINA'),
(9, 1008, 'STICKER RITRAMA'),
(10, 1009, 'STICKER RITRAMA TRANSPARAN'),
(21, 1010, 'STICKER CHINA TRANSPARAN'),
(22, 1011, 'STICKER ONEWAY'),
(23, 1012, 'CLOTH BANNER/SATIN'),
(24, 1013, 'LUSTER'),
(25, 1014, 'DURATRANS'),
(26, 1015, 'X BANNER 340'),
(27, 1016, 'X BANNER 440'),
(28, 1017, 'X BANNER ALBATROS'),
(29, 1018, 'X BANNER LUSTER'),
(30, 1019, 'ROLL UP 340'),
(31, 1020, 'ROLL UP ALBATROS'),
(32, 1021, 'ROLL UP LUSTER'),
(33, 1022, 'CUTTING PLUS MASKING'),
(34, 1023, 'X BANNER 280'),
(35, 1024, 'SAMBUNG KORCIN'),
(36, 1025, 'SAMBUNG FLEXY');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama_customer`, `id_member`) VALUES
(1, 'OPPO', 1),
(2, 'BANG ABY', 1),
(3, 'MEDIA JUANDA', 2),
(4, 'JAYA PRINTING', 2),
(5, 'NCIM GRAFIKA', 1),
(6, 'ALFIN', 1),
(7, 'CDB', 2),
(8, 'ASEP DM', 1),
(9, 'MEDIA JUANDA BABELAN', 2),
(10, 'BANG MUKTI', 2),
(11, 'MISNANTO', 2),
(12, 'DUDUNG', 2),
(13, 'ENDIN', 2),
(14, 'PAK WAHID BTN', 2),
(15, 'PAK SANDI', 2),
(16, 'PAK CUCU', 2),
(17, 'NURSOLEH', 2),
(18, 'JOKOWI', 2),
(19, 'BUGIE VESTA', 2),
(20, 'GUNGUN', 2),
(21, 'NUSANTARA', 2),
(22, 'GLOBAL FOND', 2),
(23, 'BI ITA', 2),
(24, 'PAK ASWIN', 2),
(25, 'PASSION CREATIF', 2),
(26, 'KOMO', 2),
(27, 'JUNAEDI', 2),
(28, 'SALMA PRINTING', 2),
(29, 'FIRDAUS', 2),
(30, 'Masjid Al Ikhlas Prima Harapan Regency', 1),
(31, 'WAWAN CDB', 2),
(32, 'ACIL', 2);

-- --------------------------------------------------------

--
-- Table structure for table `down_payment`
--

CREATE TABLE `down_payment` (
  `id` int(11) NOT NULL,
  `no_payment` varchar(100) NOT NULL,
  `indexPay` int(11) NOT NULL,
  `dp_amount` float NOT NULL,
  `dp_discount` int(11) NOT NULL,
  `trx_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `finishing`
--

CREATE TABLE `finishing` (
  `id` int(11) NOT NULL,
  `deskripsi_finishing` text NOT NULL,
  `harga_finishing` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finishing`
--

INSERT INTO `finishing` (`id`, `deskripsi_finishing`, `harga_finishing`) VALUES
(1, 'Lipat Pas Gambar', 0),
(2, 'Mata Ayam per 1/2 meter', 1000),
(3, 'Mata ayam per meter', 0),
(4, 'Mata Ayam Pojok2', 0),
(5, 'Potong Pas Gambar', 0),
(6, 'selongsong', 0),
(7, 'Tanpa Finishing', 0),
(8, 'CUTTING ', 30000),
(9, 'TAMBAL SALAH', 5000),
(10, 'SETTING', 25000),
(11, 'SAMBUNG KORCIN', 5000),
(12, 'SAMBUNG FLEXY', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `isi_jurnal`
--

CREATE TABLE `isi_jurnal` (
  `no_jurnal` int(11) NOT NULL,
  `tgl_jurnal` date DEFAULT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `isi_jurnal`
--

INSERT INTO `isi_jurnal` (`no_jurnal`, `tgl_jurnal`, `deskripsi`) VALUES
(1, '2022-07-20', 'Pesanan no DMP0001 a/n BANG ABY (ERAFONE VETERAN 450 CM X 255 CM 1PCS KOREA)'),
(2, '2022-07-20', 'Pesanan no DMP0002 a/n PAK SANDI (banner partai)'),
(3, '2022-07-20', 'Pesanan no DMP0003 a/n CDB (banner partai DEMOKRAT)'),
(4, '2022-08-12', 'Payment a/n BANG ABY (PY1200001)'),
(5, '2022-08-12', 'Payment a/n CDB (PY1200002)'),
(6, '2022-08-12', 'Downpayment a/n PAK SANDI (PY1200003)'),
(7, '2022-07-20', 'Pesanan no DMP0004 a/n BI ITA (banner)'),
(8, '2022-07-20', 'Pesanan no DMP0007 a/n MEDIA JUANDA BABELAN (4x1.5m spanduk selamat datang)'),
(9, '2022-07-20', 'Pesanan no DMP0006 a/n ALFIN (PAK WAHIKPR GAESS_SPANDUK_300X100CM__280_15PCS)'),
(10, '2022-08-12', 'Payment a/n ALFIN (PY1200004)'),
(11, '2022-08-12', 'Pelunasan a/n PAK SANDI (PY1200005)'),
(12, '2022-07-20', 'Pesanan no DMP0008 a/n DUDUNG (Yutakan Safety_Spanduk A SAMPAI D_GABUNG 4 x1 _ 1 PCs_4 GAMBAR)'),
(13, '2022-07-20', 'Pesanan no DMP0011 a/n ENDIN (BILLBOARD MI SHOP 2_FLEXI_T.250CM X L.400CM_1PCS)'),
(14, '2022-08-12', 'Downpayment a/n DUDUNG (PY1200006)'),
(15, '2022-08-12', 'Pelunasan a/n DUDUNG (PY1200007)');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` int(11) NOT NULL,
  `jurnal_no` int(50) NOT NULL,
  `kode_akun` varchar(50) NOT NULL,
  `nominal` float NOT NULL,
  `d/c` enum('D','C') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `jurnal_no`, `kode_akun`, `nominal`, `d/c`) VALUES
(315, 1, '1-112', 35000, 'D'),
(316, 1, '4-115', 35000, 'C'),
(317, 2, '1-112', 65000, 'D'),
(318, 2, '4-115', 65000, 'C'),
(319, 3, '1-112', 112500, 'D'),
(320, 3, '4-115', 112500, 'C'),
(321, 4, '1-113', 31500, 'D'),
(322, 4, '5-116', 3500, 'D'),
(323, 4, '1-112', 35000, 'C'),
(324, 5, '1-113', 101250, 'D'),
(325, 5, '5-116', 11250, 'D'),
(326, 5, '1-112', 112500, 'C'),
(327, 6, '1-113', 30000, 'D'),
(328, 6, '5-116', 6500, 'D'),
(329, 6, '1-112', 36500, 'C'),
(330, 7, '1-112', 660000, 'D'),
(331, 7, '4-115', 660000, 'C'),
(332, 8, '1-112', 337500, 'D'),
(333, 8, '4-115', 337500, 'C'),
(334, 9, '1-112', 210000, 'D'),
(335, 9, '4-115', 210000, 'C'),
(336, 10, '1-113', 189000, 'D'),
(337, 10, '5-116', 21000, 'D'),
(338, 10, '1-112', 210000, 'C'),
(339, 11, '1-113', 28500, 'D'),
(340, 11, '1-112', 28500, 'C'),
(341, 12, '1-112', 360000, 'D'),
(342, 12, '4-115', 360000, 'C'),
(343, 13, '1-112', 504000, 'D'),
(344, 13, '4-115', 504000, 'C'),
(345, 14, '1-113', 200000, 'D'),
(346, 14, '5-116', 36000, 'D'),
(347, 14, '1-112', 236000, 'C'),
(348, 15, '1-113', 124000, 'D'),
(349, 15, '1-112', 124000, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `lebar`
--

CREATE TABLE `lebar` (
  `id` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `meter` float NOT NULL,
  `harga_lebar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lebar`
--

INSERT INTO `lebar` (`id`, `id_bahan`, `meter`, `harga_lebar`) VALUES
(1, 1, 1, 15000),
(2, 1, 1.5, 22500),
(3, 1, 2, 30000),
(4, 1, 3, 45000),
(5, 2, 1, 17000),
(6, 2, 1.5, 25500),
(7, 2, 2, 34000),
(8, 2, 3, 51000),
(9, 3, 1, 20000),
(19, 3, 1.5, 30000),
(20, 3, 2, 40000),
(21, 3, 3, 60000),
(22, 4, 1, 35000),
(23, 4, 1.5, 52500),
(24, 4, 2, 70000),
(25, 4, 3, 105000),
(26, 6, 1, 50000),
(27, 6, 1.5, 75000),
(28, 6, 2, 100000),
(29, 6, 3, 150000),
(30, 7, 1.2, 55000),
(31, 8, 1.2, 60000),
(32, 8, 1.5, 75000),
(33, 9, 1, 55000),
(34, 10, 1, 60000),
(35, 21, 1, 55000),
(36, 21, 1.5, 82500),
(37, 22, 1, 60000),
(38, 22, 1.5, 90000),
(39, 23, 1.2, 40000),
(40, 24, 1.2, 84000),
(41, 25, 1.2, 110000),
(42, 26, 1.6, 65000),
(43, 27, 1.6, 70000),
(44, 28, 1.6, 75000),
(45, 29, 1.6, 90000),
(46, 30, 1.6, 170000),
(47, 30, 2, 185000),
(48, 31, 1.6, 190000),
(49, 31, 2, 210000),
(50, 32, 1.6, 210000),
(51, 32, 2, 230000),
(52, 33, 60, 3000),
(53, 34, 1.6, 60000),
(54, 35, 1, 40000),
(55, 35, 1.5, 60000),
(56, 35, 2, 80000),
(57, 35, 3, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `member` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `member`) VALUES
(1, 'Member'),
(2, 'Non Member');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1660056795, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `no_payment` varchar(100) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `indexPay` int(11) NOT NULL,
  `harga_kotor` float NOT NULL,
  `amount` float NOT NULL,
  `amount_pay` float NOT NULL,
  `discount` int(11) NOT NULL,
  `trx_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `no_payment`, `id_kasir`, `indexPay`, `harga_kotor`, `amount`, `amount_pay`, `discount`, `trx_date`) VALUES
(86, 'PY1200001', 2, 1, 35000, 40000, 31500, 10, '2022-08-12 07:02:11'),
(87, 'PY1200002', 2, 2, 112500, 150000, 101250, 10, '2022-08-12 07:27:12'),
(88, 'PY1200003', 2, 3, 65000, 30000, 30000, 10, '2022-08-12 07:27:55'),
(89, 'PY1200004', 2, 4, 210000, 200000, 189000, 10, '2022-08-12 10:11:49'),
(90, 'PY1200005', 2, 5, 28500, 30000, 28500, 0, '2022-08-12 10:13:29'),
(91, 'PY1200006', 2, 6, 360000, 200000, 200000, 10, '2022-08-12 10:18:50'),
(92, 'PY1200007', 2, 7, 124000, 150000, 124000, 0, '2022-08-12 10:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `no_pesanan` varchar(100) NOT NULL,
  `nama_cetakan` text NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_lebar` int(11) NOT NULL,
  `id_finishing` int(11) NOT NULL,
  `panjang` double NOT NULL,
  `qty` int(30) NOT NULL,
  `harga` float NOT NULL,
  `status` enum('B','A') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_customer`, `no_pesanan`, `nama_cetakan`, `id_tipe`, `id_bahan`, `id_lebar`, `id_finishing`, `panjang`, `qty`, `harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'DMP0001', 'ERAFONE VETERAN 450 CM X 255 CM 1PCS KOREA', 1, 1, 1, 1, 1, 1, 35000, 'A', '2022-07-20 00:17:01', '2022-07-20 00:17:01'),
(39, 15, 'DMP0002', 'banner partai', 1, 1, 4, 1, 1, 1, 65000, 'A', '2022-07-20 00:24:22', '2022-07-20 00:24:22'),
(41, 7, 'DMP0003', 'banner partai DEMOKRAT', 2, 8, 32, 4, 1.5, 1, 112500, 'A', '2022-07-20 05:54:13', '2022-07-20 05:54:13'),
(42, 23, 'DMP0004', 'banner', 2, 7, 30, 1, 1, 12, 660000, 'A', '2022-07-20 06:28:01', '2022-07-20 06:28:01'),
(44, 5, 'DMP0005', 'baliho', 2, 1, 4, 1, 1, 1, 45000, 'B', '2022-07-20 08:08:28', '2022-07-20 08:08:28'),
(45, 6, 'DMP0006', 'PAK WAHIKPR GAESS_SPANDUK_300X100CM__280_15PCS', 2, 4, 25, 1, 1, 2, 210000, 'A', '2022-07-20 10:39:02', '2022-07-20 10:39:02'),
(46, 9, 'DMP0007', '4x1.5m spanduk selamat datang', 1, 7, 30, 3, 1.5, 3, 337500, 'A', '2022-07-20 10:39:28', '2022-07-20 10:39:28'),
(47, 12, 'DMP0008', 'Yutakan Safety_Spanduk A SAMPAI D_GABUNG 4 x1 _ 1 PCs_4 GAMBAR', 2, 8, 31, 4, 1.2, 5, 360000, 'A', '2022-07-20 10:40:01', '2022-07-20 10:40:01'),
(48, 11, 'DMP0009', 'BILLBOARD LUCKY CELL_FLEXI_T300CM X L270CM_1PCS', 2, 21, 36, 3, 3, 2, 495000, 'B', '2022-07-20 10:42:27', '2022-07-20 10:42:27'),
(49, 7, 'DMP0010', 'BANNER PENUNJUK ARAH ERAFONE_FLEXI_T150CM X L100CM_1PCS', 1, 9, 33, 1, 1, 6, 450000, 'B', '2022-07-20 10:42:50', '2022-07-20 10:42:50'),
(50, 13, 'DMP0011', 'BILLBOARD MI SHOP 2_FLEXI_T.250CM X L.400CM_1PCS', 2, 24, 40, 3, 1, 6, 504000, 'A', '2022-07-20 10:43:13', '2022-07-20 10:43:13'),
(51, 3, 'DMP0012', 'MW VIVO B 200 CM X 100 CM 1PCS BACKLITE', 2, 1, 1, 2, 1, 1, 16000, 'B', '2022-07-20 10:49:41', '2022-07-20 10:49:41'),
(52, 2, 'DMP0013', 'banner persib', 2, 1, 2, 1, 1, 1, 22500, 'B', '2022-07-21 09:31:05', '2022-07-21 09:31:05'),
(53, 2, 'DMP0014', 'banner persib juara ke 5x', 2, 7, 30, 1, 1, 12, 660000, 'B', '2022-07-21 09:31:30', '2022-07-21 09:31:30'),
(57, 1, 'DMP0015', 'banner partai Demokrat 2024', 2, 6, 29, 2, 1, 4, 604000, 'B', '2022-07-30 02:09:03', '2022-07-30 02:09:03'),
(58, 13, 'DMP0016', 'cetak poto ', 1, 2, 6, 2, 1.5, 14, 976500, 'B', '2022-07-31 04:59:43', '2022-07-31 04:59:43'),
(59, 9, 'DMP0017', 'passioncreatives_posyandu rw 02 ukuran 200x100 cm', 2, 6, 29, 2, 1.2, 3, 543600, 'B', '2022-08-03 18:07:03', '2022-08-03 18:07:03'),
(60, 1, 'DMP0018', 'baliho', 2, 3, 21, 5, 1, 12, 720000, 'B', '2022-08-03 18:21:17', '2022-08-03 18:21:17'),
(61, 13, 'DMP0019', 'banner partai PKI anjay', 1, 1, 1, 1, 1, 1, 35000, 'B', '2022-08-04 06:36:47', '2022-08-04 06:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id_status` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id` int(11) NOT NULL,
  `nama_tipe` varchar(50) NOT NULL,
  `harga_tipe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id`, `nama_tipe`, `harga_tipe`) VALUES
(1, 'Premium (Uv ink)', 20000),
(2, 'Standard (Solvent)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_payment`
--

CREATE TABLE `tmp_payment` (
  `id` int(11) NOT NULL,
  `no_pesanan` varchar(100) NOT NULL,
  `indexPay` int(11) NOT NULL,
  `status` enum('pending','paid','down payment') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tmp_payment`
--

INSERT INTO `tmp_payment` (`id`, `no_pesanan`, `indexPay`, `status`) VALUES
(142, 'DMP0001', 1, 'paid'),
(143, 'DMP0003', 2, 'paid'),
(144, 'DMP0002', 3, 'paid'),
(145, 'DMP0006', 4, 'paid'),
(146, 'DMP0002', 5, 'paid'),
(147, 'DMP0008', 6, 'down payment'),
(148, 'DMP0008', 7, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_pesanan`
--

CREATE TABLE `tmp_pesanan` (
  `id` int(11) NOT NULL,
  `no_pesanan` varchar(100) NOT NULL,
  `status` enum('unpaid','paid','down payment','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tmp_pesanan`
--

INSERT INTO `tmp_pesanan` (`id`, `no_pesanan`, `status`) VALUES
(66, 'DMP0001', 'paid'),
(67, 'DMP0002', 'paid'),
(68, 'DMP0003', 'paid'),
(69, 'DMP0004', 'unpaid'),
(70, 'DMP0007', 'unpaid'),
(71, 'DMP0006', 'paid'),
(72, 'DMP0008', 'paid'),
(73, 'DMP0011', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'muhamadarifbudiman22@gmail.com', 'aripbudiman', '$2y$10$dgETOlDcn5an/jqv6r1nnu50zkRQKaP10nixVVMRqVFOap76.iA8K', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-08-09 10:14:13', '2022-08-09 10:14:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akuntansi`
--
ALTER TABLE `akuntansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_fk0` (`id_member`);

--
-- Indexes for table `down_payment`
--
ALTER TABLE `down_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finishing`
--
ALTER TABLE `finishing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isi_jurnal`
--
ALTER TABLE `isi_jurnal`
  ADD PRIMARY KEY (`no_jurnal`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_no` (`jurnal_no`);

--
-- Indexes for table `lebar`
--
ALTER TABLE `lebar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lebar_fk0` (`id_bahan`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `pesanan_fk0` (`id_customer`),
  ADD KEY `pesanan_fk1` (`id_tipe`),
  ADD KEY `pesanan_fk2` (`id_bahan`),
  ADD KEY `pesanan_fk3` (`id_lebar`),
  ADD KEY `pesanan_fk4` (`id_finishing`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_payment`
--
ALTER TABLE `tmp_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indexPay` (`indexPay`);

--
-- Indexes for table `tmp_pesanan`
--
ALTER TABLE `tmp_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `akuntansi`
--
ALTER TABLE `akuntansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `down_payment`
--
ALTER TABLE `down_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finishing`
--
ALTER TABLE `finishing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `isi_jurnal`
--
ALTER TABLE `isi_jurnal`
  MODIFY `no_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2010;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `lebar`
--
ALTER TABLE `lebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tmp_payment`
--
ALTER TABLE `tmp_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `tmp_pesanan`
--
ALTER TABLE `tmp_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_fk0` FOREIGN KEY (`id_member`) REFERENCES `members` (`id`);

--
-- Constraints for table `lebar`
--
ALTER TABLE `lebar`
  ADD CONSTRAINT `lebar_fk0` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_fk0` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `pesanan_fk1` FOREIGN KEY (`id_tipe`) REFERENCES `tipe` (`id`),
  ADD CONSTRAINT `pesanan_fk2` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id`),
  ADD CONSTRAINT `pesanan_fk3` FOREIGN KEY (`id_lebar`) REFERENCES `lebar` (`id`),
  ADD CONSTRAINT `pesanan_fk4` FOREIGN KEY (`id_finishing`) REFERENCES `finishing` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
