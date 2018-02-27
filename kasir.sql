-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2017 at 06:06 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_produk`, `tanggal_order`, `qty`, `total_harga`, `status`) VALUES
(129, 43, '2017-07-12 11:22:58', 1, 40000, 'berhasil'),
(130, 43, '2017-07-12 11:24:08', 10, 400000, 'berhasil'),
(131, 43, '2017-07-12 11:29:48', 2, 80000, 'berhasil'),
(132, 48, '2017-07-12 11:35:01', 1, 28000, 'berhasil'),
(133, 44, '2017-07-12 11:35:33', 3, 168000, 'berhasil'),
(134, 52, '2017-07-12 11:39:02', 6, 12000, 'berhasil'),
(135, 46, '2017-07-13 11:04:13', 10, 220000, 'berhasil');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(29, 'Makanan'),
(30, 'Minuman'),
(33, 'Snack'),
(34, 'jajanpasar');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ava` varchar(255) DEFAULT NULL,
  `telp` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `email`, `ava`, `telp`, `username`, `pass`, `role`) VALUES
(8, 'admin', 'adminn@gmail.com', 'file.png', 3214338, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(9, 'adek', 'adek@gmail.com', 'home2.png', 9, 'adek', '4993b2e58e43436bc2d347838b87772e', 'kasir'),
(16, 'aura', 'aura@gmail.com', 'garbage3.png', 123, 'ara', '636bfa0fb2716ff876f5e33854cc9648', 'kasir'),
(17, 'mama2', 'aura@gmail.com', 'All-the-talk-about-the-knew-Joker-I-think-this-guy-would-kill-it9.jpg', 9, 'mama', 'eeafbf4d9b3957b139da7b7f2e7f2d4a', 'kasir'),
(18, 'kasir', 'a@a.x', NULL, 2121, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir'),
(19, 'nia', '', NULL, 6789, 'nia', '04a481486dd84d7c8bfdfc89d38136a6', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kategori` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `pajak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `gambar`, `nama_produk`, `kategori`, `deskripsi`, `harga`, `pajak`) VALUES
(43, '1.jpg', 'Salmon Roll', 29, 'skinless salmon fillet (use really fresh), cucumber, squeeze wasabi, gingger, soy sauce, salmon roe', 40000, 0),
(44, '2.jpg', 'Sashimi Sushi', 29, 'alala', 56000, 0),
(45, '3.jpg', 'Spicy Octopus', 29, 'spicy octopus', 41000, 0),
(46, '4.jpg', 'Ocha', 30, 'hot ocha', 22000, 0),
(47, '5.jpg', 'hot tea', 30, 'hot tea', 10000, 0),
(48, '6.jpg', 'Green Tea Latte', 30, 'Green Tea Latte', 28000, 0),
(49, '8.jpg', 'dorayaki', 33, 'dorayaki', 15000, 0),
(50, '9.jpg', 'takoyaki', 33, 'takoyaki', 22000, 0),
(51, 'amora_menolak_cinta.jpg', 'Waffle', 33, 'waffle', 2000, 0),
(52, 'home1.png', 'rumah', 29, 'hijau', 2000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sementara`
--

CREATE TABLE `sementara` (
  `id_sementara` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `produk` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id`, `id_detail`) VALUES
(19, 16, 129);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `sementara`
--
ALTER TABLE `sementara`
  ADD PRIMARY KEY (`id_sementara`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id` (`id`),
  ADD KEY `id_detail` (`id_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `sementara`
--
ALTER TABLE `sementara`
  MODIFY `id_sementara` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `detail_transaksi` (`id_detail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
