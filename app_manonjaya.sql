-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 06:26 PM
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
-- Database: `app_manonjaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `trx_date` datetime(6) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `trx_date` datetime(6) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id` int(11) NOT NULL,
  `nama_berkas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` int(11) NOT NULL,
  `id_kode` int(11) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_peminjam`
--

CREATE TABLE `data_peminjam` (
  `id` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_berkas` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dikembalikan`
--

CREATE TABLE `dikembalikan` (
  `id` int(11) NOT NULL,
  `id_data` int(11) NOT NULL,
  `trx_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dipinjam`
--

CREATE TABLE `dipinjam` (
  `id` int(11) NOT NULL,
  `id_data` int(11) NOT NULL,
  `trx_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kodes`
--

CREATE TABLE `kodes` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama_petugas` varchar(150) NOT NULL,
  `status_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `trx_date` datetime(6) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_keluar_fk0` (`kode_barang`),
  ADD KEY `barang_keluar_fk1` (`trx_status`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_masuk_fk0` (`kode_barang`),
  ADD KEY `barang_masuk_fk1` (`trx_status`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `data_barang_fk0` (`id_kode`),
  ADD KEY `data_barang_fk1` (`id_satuan`),
  ADD KEY `data_barang_fk2` (`id_jenis`),
  ADD KEY `data_barang_fk3` (`id_status`);

--
-- Indexes for table `data_peminjam`
--
ALTER TABLE `data_peminjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_peminjam_fk0` (`id_petugas`),
  ADD KEY `data_peminjam_fk1` (`id_berkas`),
  ADD KEY `data_peminjam_fk2` (`id_status`);

--
-- Indexes for table `dikembalikan`
--
ALTER TABLE `dikembalikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dikembalikan_fk0` (`id_data`);

--
-- Indexes for table `dipinjam`
--
ALTER TABLE `dipinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dipinjam_fk0` (`id_data`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kodes`
--
ALTER TABLE `kodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petugas_fk0` (`status_karyawan`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_fk0` (`id_petugas`),
  ADD KEY `transaksi_fk1` (`kode_barang`),
  ADD KEY `transaksi_fk2` (`trx_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_peminjam`
--
ALTER TABLE `data_peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dikembalikan`
--
ALTER TABLE `dikembalikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dipinjam`
--
ALTER TABLE `dipinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kodes`
--
ALTER TABLE `kodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_fk0` FOREIGN KEY (`kode_barang`) REFERENCES `data_barang` (`id_kode`),
  ADD CONSTRAINT `barang_keluar_fk1` FOREIGN KEY (`trx_status`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_fk0` FOREIGN KEY (`kode_barang`) REFERENCES `data_barang` (`id_kode`),
  ADD CONSTRAINT `barang_masuk_fk1` FOREIGN KEY (`trx_status`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD CONSTRAINT `data_barang_fk0` FOREIGN KEY (`id_kode`) REFERENCES `kodes` (`id`),
  ADD CONSTRAINT `data_barang_fk1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id`),
  ADD CONSTRAINT `data_barang_fk2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id`),
  ADD CONSTRAINT `data_barang_fk3` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `data_peminjam`
--
ALTER TABLE `data_peminjam`
  ADD CONSTRAINT `data_peminjam_fk0` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`),
  ADD CONSTRAINT `data_peminjam_fk1` FOREIGN KEY (`id_berkas`) REFERENCES `berkas` (`id`),
  ADD CONSTRAINT `data_peminjam_fk2` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `dikembalikan`
--
ALTER TABLE `dikembalikan`
  ADD CONSTRAINT `dikembalikan_fk0` FOREIGN KEY (`id_data`) REFERENCES `data_peminjam` (`id`);

--
-- Constraints for table `dipinjam`
--
ALTER TABLE `dipinjam`
  ADD CONSTRAINT `dipinjam_fk0` FOREIGN KEY (`id_data`) REFERENCES `data_peminjam` (`id`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_fk0` FOREIGN KEY (`status_karyawan`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_fk0` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`),
  ADD CONSTRAINT `transaksi_fk1` FOREIGN KEY (`kode_barang`) REFERENCES `data_barang` (`id_kode`),
  ADD CONSTRAINT `transaksi_fk2` FOREIGN KEY (`trx_status`) REFERENCES `statuses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
