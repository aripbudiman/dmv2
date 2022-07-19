-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 02:51 AM
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
(6, '5-116', 'discount');

-- --------------------------------------------------------

--
-- Table structure for table `akuntansi`
--

CREATE TABLE `akuntansi` (
  `id` int(11) NOT NULL,
  `nama_akuntansi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akuntansi`
--

INSERT INTO `akuntansi` (`id`, `nama_akuntansi`) VALUES
(1, 'Asset'),
(2, 'Utang'),
(3, 'Modal'),
(4, 'Pendapatan'),
(5, 'Beban');

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
  `id_pesanan` int(11) NOT NULL,
  `no_payment` varchar(100) NOT NULL,
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
(5, '2022-07-19', 'Pesanan ERAFONE VETERAN 450 CM X 255 CM 1PCS KOREA'),
(6, '2022-07-19', 'Pesanan BANG ABYbanner partai Demokrat'),
(7, '2022-07-20', 'Pesanan a/n MEDIA JUANDA BABELAN baliho'),
(8, '2022-07-18', 'Pesanan a/n ALFIN (banner partai Demokrat)');

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
(16, 5, '1-112', 75000, 'D'),
(17, 5, '4-115', 75000, 'C'),
(18, 6, '1-112', 35000, 'D'),
(19, 6, '4-115', 35000, 'C'),
(20, 7, '1-112', 35000, 'D'),
(21, 7, '4-115', 35000, 'C'),
(22, 8, '1-112', 65000, 'D'),
(23, 8, '4-115', 65000, 'C');

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `no_payment` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `discount` int(11) NOT NULL,
  `trx_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_customer`, `no_pesanan`, `nama_cetakan`, `id_tipe`, `id_bahan`, `id_lebar`, `id_finishing`, `panjang`, `qty`, `harga`, `created_at`, `updated_at`) VALUES
(3, 32, '0', 'nilai awal', 1, 7, 1, 8, 0, 0, 0, '2022-07-15 10:54:30', '2022-07-15 10:54:30'),
(18, 2, '1507220001', 'ERAFONE VETERAN 450 CM X 255 CM 1PCS KOREA', 2, 4, 25, 7, 4.5, 1, 472500, '2022-07-15 08:37:34', '2022-07-15 08:37:34'),
(19, 7, '1507220002', 'NANDA__PESERTA DIDIK BARU 3X1 METER @H280 @1PCS MA', 2, 2, 8, 3, 1, 1, 51000, '2022-07-15 08:38:43', '2022-07-15 08:38:43'),
(20, 7, '1507220003', 'CDB_ VIVIP-BANNER-VISIT_04 _LG_ rev01_ 9 m x 0.95 m_ F STDR_ 1 Pcs', 1, 1, 1, 1, 1, 1, 35000, '2022-07-15 08:42:28', '2022-07-15 08:42:28'),
(27, 2, '1807220004', 'banner partai', 1, 1, 1, 1, 1, 1, 35000, '2022-07-18 10:30:20', '2022-07-18 10:30:20'),
(32, 9, '1807220005', 'ERAFONE VETERAN 450 CM X 255 CM 1PCS KOREA', 2, 8, 32, 1, 1, 1, 75000, '2022-07-18 19:09:41', '2022-07-18 19:09:41'),
(33, 2, '1807220006', 'banner partai Demokrat', 2, 4, 22, 1, 1, 1, 35000, '2022-07-18 19:15:23', '2022-07-18 19:15:23'),
(34, 9, '1807220007', 'baliho', 1, 1, 1, 3, 1, 1, 35000, '2022-07-18 19:16:54', '2022-07-18 19:16:54'),
(35, 6, '1807220008', 'banner partai Demokrat', 1, 1, 4, 1, 1, 1, 65000, '2022-07-18 19:17:58', '2022-07-18 19:17:58');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `down_payment_fk0` (`id_pesanan`);

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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_fk0` (`id_pesanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_fk0` (`id_customer`),
  ADD KEY `pesanan_fk1` (`id_tipe`),
  ADD KEY `pesanan_fk2` (`id_bahan`),
  ADD KEY `pesanan_fk3` (`id_lebar`),
  ADD KEY `pesanan_fk4` (`id_finishing`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `akuntansi`
--
ALTER TABLE `akuntansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `no_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_fk0` FOREIGN KEY (`id_member`) REFERENCES `members` (`id`);

--
-- Constraints for table `down_payment`
--
ALTER TABLE `down_payment`
  ADD CONSTRAINT `down_payment_fk0` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`);

--
-- Constraints for table `lebar`
--
ALTER TABLE `lebar`
  ADD CONSTRAINT `lebar_fk0` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_fk0` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`);

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
