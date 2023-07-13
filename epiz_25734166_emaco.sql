-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql200.epizy.com
-- Generation Time: Jul 13, 2023 at 11:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_25734166_emaco`
--

-- --------------------------------------------------------

--
-- Table structure for table `featured_items`
--

CREATE TABLE `featured_items` (
  `id` int(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `code` varchar(40) NOT NULL,
  `image` varchar(80) NOT NULL,
  `type` varchar(20) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured_items`
--

INSERT INTO `featured_items` (`id`, `name`, `code`, `image`, `type`, `price`) VALUES
(5, 'Redmi note 8', 'Do gyyy', 'product-images/download.jpeg', 'membername', 9999),
(4, 'Realme 5 Pro', 'efgnm', 'product-images/gsmarena_011.jpg', 'membername', 13999);

-- --------------------------------------------------------

--
-- Table structure for table `hot_items`
--

CREATE TABLE `hot_items` (
  `id` int(8) DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  `code` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `old_price` int(20) NOT NULL,
  `new_price` int(20) NOT NULL,
  `count_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hot_items`
--

INSERT INTO `hot_items` (`id`, `name`, `code`, `image`, `old_price`, `new_price`, `count_date`) VALUES
(100000, 'Ginger', 'rgh', 'product-images/ginger.jpg', 40, 30, '2020-05-08'),
(100001, 'Mango', 'tgb', 'product-images/mango.jpg', 48, 30, '2020-05-16'),
(100002, 'Orange', 'rfgbn', 'product-images/orange.jpg', 90, 80, '2020-05-20'),
(100003, 'Apple', 'gh', 'product-images/apple.jpg', 150, 120, '2020-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `num` int(6) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `role` varchar(18) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`num`, `name`, `password`, `role`) VALUES
(1, 'admin@punalur.ml', 'punaluradmin', 'admin'),
(2, 'db1@punalur.ml', 'db1', 'dboy');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `num` int(6) NOT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `phno` varchar(20) DEFAULT NULL,
  `items` varchar(400) DEFAULT NULL,
  `price` int(20) NOT NULL,
  `action` varchar(20) NOT NULL DEFAULT 'unchecked'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`num`, `uname`, `address`, `phno`, `items`, `price`, `action`) VALUES
(23, 'Jinoy Varghese', 'Parayil house', '9207224063', '  , 1 X Sunflower oil 1L , 3 X Mixture', 150, 'checked'),
(22, 'www', 'www', '333', '  , 2 X Orange', 200, 'checked'),
(21, 'wew', 'gfd', '43', '  , Murukku , Orange', 148, 'checked'),
(24, 'Jinoy Varghese', 'Parayil house Mathra po Punalur', '9207224063', '  , Parle-g', 0, 'checked'),
(25, 'Jain', '#44/4, District Fund Road', '2085754', '  , Parle-g , Sunflower oil 1L', 0, 'unchecked'),
(26, 'Jinoy Varghese', 'Parayil house Mathra po Punalur', '9895650935', '  , Sunflower oil 1L', 0, 'unchecked'),
(27, 'Jinoy Varghese', 'Parayil house Mathra po Punalur', '345677757', '  , Murukku', 0, 'unchecked');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `type`, `price`) VALUES
(9, 'Murukku', 'Bdud', 'product-images/images (8).jpeg', 'grocery', 28.00),
(8, 'Mixture', 'Hdod', 'product-images/images (7).jpeg', 'grocery', 20.00),
(7, 'Sunflower oil 1L', 'Agb', 'product-images/images (3).jpeg', 'grocery', 50.00),
(6, 'Parle-g', 'Hdid', 'product-images/images (2).jpeg', 'grocery', 25.00),
(10, 'Bingo Mad Angles', 'Bkkk', 'product-images/images (9).jpeg', 'grocery', 5.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `featured_items`
--
ALTER TABLE `featured_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hot_items`
--
ALTER TABLE `hot_items`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `featured_items`
--
ALTER TABLE `featured_items`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `num` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `num` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
