-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 02:44 AM
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
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` int(11) NOT NULL,
  `kode_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `lebar`
--

CREATE TABLE `lebar` (
  `id` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `meter` int(11) NOT NULL,
  `harga_lebar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `member` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `lebar`
--
ALTER TABLE `lebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
