-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 01:04 PM
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
-- Database: `tp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `category_id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`category_id`, `nama_kategori`) VALUES
(2, 'Minuman'),
(3, 'Perawatan Tubuh'),
(4, 'Perawatan Rumah'),
(7, 'Makanan'),
(12, 'obat-obatan'),
(13, 'perawatan wajah'),
(17, 'Mainan');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `supermarket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `nama_produk`, `harga`, `stok`, `foto_produk`, `category_id`, `supermarket_id`) VALUES
(3, 'Sabun Lifebuoy', '4000', '9876', 'lifebuoy.jpg', 3, 2),
(12, 'Pepsodent', '15000', '938234', 'pepsodent.jpg', 3, 4),
(15, 'marjan', '509888', '5', 'marjan.jpg', 2, 6),
(16, 'byegon', '4000', '89', 'baygon.jpg', 12, 6),
(20, 'sunleg', '40000', '5', 'sunlight.jpg', 4, 6),
(23, 'spirit', '110000', '19', 'sprite.jpg', 2, 1),
(24, 'kimchi', '24000', '24', 'kimchi.jpg', 7, 1),
(26, 'Khong gua', '40000', '5', 'kg.jpg', 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `supermarket`
--

CREATE TABLE `supermarket` (
  `supermarket_id` int(11) NOT NULL,
  `nama_supermarket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supermarket`
--

INSERT INTO `supermarket` (`supermarket_id`, `nama_supermarket`) VALUES
(1, 'Yogya'),
(2, 'Lottemaret'),
(3, 'Matahari'),
(4, 'Transmart'),
(6, 'Bormars');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `supermarket_id` (`supermarket_id`);

--
-- Indexes for table `supermarket`
--
ALTER TABLE `supermarket`
  ADD PRIMARY KEY (`supermarket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `supermarket`
--
ALTER TABLE `supermarket`
  MODIFY `supermarket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `kategori` (`category_id`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`supermarket_id`) REFERENCES `supermarket` (`supermarket_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
