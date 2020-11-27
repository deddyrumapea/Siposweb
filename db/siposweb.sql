-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 03:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siposweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan_transaksi`
--

CREATE TABLE `laporan_transaksi` (
  `id` char(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_transaksi`
--

INSERT INTO `laporan_transaksi` (`id`, `tanggal`, `total`, `bayar`, `kembalian`) VALUES
('TRX-2CAE1C', '2020-11-26 08:52:45', 49000, 90000, 41000),
('TRX-837C43', '2020-11-26 08:20:04', 196000, 200000, 4000),
('TRX-8990B2', '2020-11-26 13:45:33', 49000, 49000, 0),
('TRX-B93012', '2020-11-26 08:54:00', 196000, 196037, 37),
('TRX-C16971', '2020-11-26 08:18:26', 98000, 100000, 2000),
('TRX-D8A9AD', '2020-11-27 08:22:44', 0, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` char(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `stock`) VALUES
('PRD-219D1E', 'Monde Butter Cookies', 49000, 21),
('PRD-24F270', 'Vixal Pembersih Toilet 350ml', 12000, 25),
('PRD-355EAB', 'Malkist Crackers 90g', 5200, 52),
('PRD-3A2ED9', 'ABC Kecap Manis', 3000, 87),
('PRD-3DA53D', 'Bear Breand 120ml', 8000, 19),
('PRD-70DE20', 'Pulpy Orange 360ml', 6500, 41),
('PRD-836F39', 'Leo Kripik Kentang 14gr', 1600, 32),
('PRD-931B03', 'Kerupuk Kemplang 300gr', 34000, 33),
('PRD-C68F4C', 'Terasi Udang Mamasuka 120g', 1200, 25),
('PRD-CB2D3D', 'Indomie Mie Soto Lamongan', 2500, 31),
('PRD-DEA316', 'Walls Feast', 4500, 31),
('PRD-ECA2ED', 'Malkist Abon 65g', 500, 12);

-- --------------------------------------------------------

--
-- Table structure for table `produk_transaksi`
--

CREATE TABLE `produk_transaksi` (
  `id_transaksi` char(10) NOT NULL,
  `id_produk` char(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', '$2y$10$sHgHUkdlTRp2kFfBPf6F5uiISGgoMEOFfEc5m7ah3om9Ng4rI.rWC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan_transaksi`
--
ALTER TABLE `laporan_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
