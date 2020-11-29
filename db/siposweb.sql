-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 04:54 PM
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
('TRX-1920A2', '2020-11-29 05:07:50', 51000, 60000, 9000),
('TRX-683777', '2020-11-29 09:42:10', 98000, 100000, 2000),
('TRX-90CE9F', '2020-11-29 05:56:11', 98000, 100000, 2000),
('TRX-A0AB28', '2020-11-29 05:56:30', 1000, 5000, 4000),
('TRX-C94814', '2020-11-29 06:13:33', 294000, 300000, 6000),
('TRX-D86865', '2020-11-29 08:49:40', 2400, 5000, 2600),
('TRX-DD47BD', '2020-11-29 09:46:42', 147000, 150000, 3000);

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
('PRD-377674', 'Nora Kerak Keling', 7000, 12),
('PRD-3A2ED9', 'ABC Kecap Manis', 3000, 87),
('PRD-3D1AC6', 'Superpell 50ml', 4500, 78),
('PRD-3DA53D', 'Bear Breand 120ml', 8000, 19),
('PRD-4D219B', 'Chocolatos 50g', 1000, 90),
('PRD-51BB7D', 'Chitato Sapi Panggang 500g', 8900, 34),
('PRD-70DE20', 'Pulpy Orange 360ml', 6500, 41),
('PRD-72B2E3', 'Combatrin Obat Cacing 500ml', 32000, 21),
('PRD-7CC1AA', 'Wipol Pembersih Lantai 750ml', 29800, 43),
('PRD-836F39', 'Leo Kripik Kentang 14gr', 1600, 32),
('PRD-931B03', 'Kerupuk Kemplang 300gr', 34000, 33),
('PRD-C68F4C', 'Terasi Udang Mamasuka 120g', 1200, 25),
('PRD-CB2D3D', 'Indomie Mie Soto Lamongan', 2500, 31),
('PRD-D947F2', 'Sunsilk Hijabisa Sachet', 500, 90),
('PRD-DEA316', 'Walls Feast', 4500, 31),
('PRD-ECA2ED', 'Malkist Abon 65g', 500, 12),
('PRD-F9A373', 'Lays Rumput Laut 100g', 4300, 23);

-- --------------------------------------------------------

--
-- Table structure for table `produk_transaksi`
--

CREATE TABLE `produk_transaksi` (
  `id_transaksi` char(10) NOT NULL,
  `id_produk` char(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_transaksi`
--

INSERT INTO `produk_transaksi` (`id_transaksi`, `id_produk`, `quantity`) VALUES
('TRX-1920A2', 'PRD-219D1E', 1),
('TRX-1920A2', 'PRD-ECA2ED', 4),
('TRX-90CE9F', 'PRD-219D1E', 2),
('TRX-A0AB28', 'PRD-ECA2ED', 2),
('TRX-C94814', 'PRD-219D1E', 6),
('TRX-D86865', 'PRD-C68F4C', 2),
('TRX-02A145', 'PRD-7CC1AA', 1),
('TRX-683777', 'PRD-219D1E', 2),
('TRX-DD47BD', 'PRD-219D1E', 3);

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
