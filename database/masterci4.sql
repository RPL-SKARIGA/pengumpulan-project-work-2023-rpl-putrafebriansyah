-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 12:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masterci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `nama_ktg` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama_ktg`, `created_at`) VALUES
(2, 'kategori 1', '2023-10-19 19:13:20'),
(3, 'kategori 2', '2023-10-19 20:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `id_ktg` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `diskon` int(3) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `nama_brg`, `id_ktg`, `gambar`, `harga`, `diskon`, `stok`, `created_at`) VALUES
(2, 'Produk 1', 2, '1699080426_91dc64217dc427dbdcfc.png', '50000', 10, 1, '2023-11-04 06:47:06'),
(4, 'Produk 1 [coba]', 3, '1699081129_d2db1f696262e935ad13.png', '15000', 65, 0, '2023-11-04 06:58:49'),
(5, 'Produk 2', 2, '1699443981_cd1f8c0186432a3d4c93.png', '10000', 10, 15, '2023-11-08 11:46:21'),
(6, 'Produk 3', 3, '1699444042_fa53a8950a9847c690a6.png', '25000', 15, 5, '2023-11-08 11:47:22'),
(7, 'Produk 4', 2, '1699444060_8c0284250d1cf9b6ffc8.png', '50000', 1, 1, '2023-11-08 11:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'indi ramadhan', 'indi@gmail.com', '$2y$10$mSFor/4nS8z0xw6tZK3GZOQjPYjqni9AMouKOQ.ju2SlRXckP3S2C', '2023-09-25 14:49:06'),
(2, 'lorem ipsum', 'lorem@gmail.com', '$2y$10$LGuWs5/FslMtKLiE7WKljOQvB3ruzDF/IY1V8Runmk.cOEwMP0Bfu', '2023-09-25 16:23:47'),
(3, 'aku aku aku', 'aku@gmail.com', '$2y$10$ps0N99Gqu0XcuOCXPEBTkum8ZUPxcEN13Mwo/gsPfW4oXYtEjGZZ.', '2023-09-26 15:11:24'),
(4, 'indiramadhan', 'indirmd01@gmail.com', '$2y$10$Q4kOv78I2DFzu3nyYdfJHu415Ya3ANhqSpdvHb9foUBx4wgVzDndC', '2023-10-19 18:50:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
