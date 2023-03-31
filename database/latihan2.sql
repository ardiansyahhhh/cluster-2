-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 02:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kodebarang` varchar(10) NOT NULL,
  `namabarang` varchar(30) NOT NULL,
  `spesifikasi` text NOT NULL,
  `hargabarang` int(11) NOT NULL,
  `gambar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kodebarang`, `namabarang`, `spesifikasi`, `hargabarang`, `gambar`) VALUES
(1, 'EPSN001', 'EPSON L3250', 'Print, scan, copy\r\nCompact integrated tank design\r\nHigh yield ink bottles\r\nSpill-free, error-free refilling\r\nWi-Fi & Wi-Fi Direct\r\nSeamless setup via Epson Smart Panel\r\nBorderless printing up to 4R\r\nPowered by Epson Heat-Free Technology', 2780000, 'epsonl3250.jpg'),
(3, 'HP001', 'HP Printer Ink Tank Wireless 4', 'A4 Color Inkjet Printer Perfect for Home cost-per-page at just IDR 11 (color) & IDR 21 (black) Print Scan and Copy USB & Wireless Color : Black', 2375000, '64200f5c01bd2.jpeg'),
(4, 'CNN001', 'PIXMA G4770', 'Print, Scan, Copy, Fax\r\nPrint Speed (A4, ISO): up to 11 / 6 ipm (mono/colour)\r\nWi-Fi, AirPrint, Mopria, Direct Wireless\r\nRecommended Monthly Print Volume: 150 - 1,500 pages', 4380000, '642012790223f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `pembeli` varchar(20) NOT NULL,
  `barang` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `pembeli`, `barang`, `jumlah`, `totalharga`, `alamat`, `status`) VALUES
(9, 'nova21', 'EPSN001', 2, 5500000, 'Sunter Karya', 'Declined');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` bigint(20) NOT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `telepon`, `level`) VALUES
('Admin', 'admin1', 'admin@gmail.com', 87719928374, 'Admin'),
('nova21', 'nova1', 'nova@gmail.com', 87728388495, 'customer'),
('yasfin78', 'yasfin1', 'yasfin@gmail.com', 87798838495, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodebarang` (`kodebarang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `pembeli` (`pembeli`),
  ADD KEY `barang` (`barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`barang`) REFERENCES `barang` (`kodebarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`pembeli`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
