-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 09:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbno012`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_pro` int(10) NOT NULL,
  `grade` varchar(13) NOT NULL,
  `namepro` varchar(50) NOT NULL,
  `detailpro` varchar(50) NOT NULL,
  `price` varchar(10) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `picpro` varchar(20) NOT NULL,
  `numbers` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_pro`, `grade`, `namepro`, `detailpro`, `price`, `discount`, `picpro`, `numbers`) VALUES
(11, 'High Grade', 'Ariel Gundam ', 'is cool is my favarote', '730', '10%', 'Ariel.png', '1'),
(13, 'High Grade', 'Ariel Gundam Rebuild', 'Gunpla that come from Mobile Suit Gundam The Witch', '800', '10', 'rb.png', ' 1'),
(14, 'High Grade', 'Caliban Gundam', 'Gunpla that come from Mobile Suit Gundam The Witch', '730', '10', 'caliburn.png', ' 1'),
(15, 'High Grade', 'Destiny Gundam', 'Gunpla that come from Mobile Suit Gundam Seed Free', '800', '10', 'DES.png', '1'),
(16, 'Master Grade', 'Eclips Gundam', 'Gunpla that come from Mobile Suit Gundam Seed Free', '2500', '10', 'EC.png', '1'),
(17, 'Entry Grade', 'Build Strike Exceed Galaxy Gundam', 'is cool is my favarote', '450', '10', 'exceed.png', '1'),
(18, 'Real Grade', 'Eypon gundam', 'is cool is my favarote', '1,700', '10', 'Ey.png', '1'),
(19, 'High Grade', 'Infinite Justic Gundam SpecII', 'Gunpla that come from Mobile Suit Gundam Seed Free', '800', '10', 'IJ2.png', '1'),
(20, 'High Grade', 'Mighty Strike Freeom Gundam', 'Gunpla that come from Mobile Suit Gundam Seed Free', '900', '10', 'MSF.png', '1'),
(21, 'SNAA', 'Blade King', 'is cool is my favarote', '1200', '10', 'BK.png', ' 1'),
(22, 'Master Grade', 'STRIKE FREEDOM GUNDAM', 'Gunpla that come from Mobile Suit Gundam Seed Free', '920', '10', 'stk-freedom.png', '1'),
(23, 'High Grade', 'BLACK KNIGHT SQUAD SHI-VE.A', 'Gunpla that come from Mobile Suit Gundam Seed Free', '800', '10', 'shi-A.png', '1'),
(24, 'High Grade', 'BLACK KNIGHT SQUAD Rudo-E', 'Gunpla that come from Mobile Suit Gundam Seed Free', '800', '10', 'Rudo-E.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id_sale` int(10) NOT NULL,
  `sum` varchar(10) NOT NULL,
  `dayorder` varchar(7) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id_sale`, `sum`, `dayorder`, `id_user`) VALUES
(2, '0.9', '2024-08', 'Hiroshi'),
(3, '720', '2024-08', 'Hiroshi'),
(4, '3330', '2024-08', 'Ten'),
(5, '3330', '2024-08', 'Ten'),
(6, '2250', '2024-08', 'Ten'),
(7, '720', '2024-08', 'Ten');

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `id_saledetail` int(10) NOT NULL,
  `id_sale` varchar(10) NOT NULL,
  `id_pro` varchar(10) NOT NULL,
  `numbersale` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`id_saledetail`, `id_sale`, `id_pro`, `numbersale`) VALUES
(2, '2', '18', 1),
(3, '3', '19', 1),
(4, '4', '16', 1),
(5, '4', '21', 1),
(6, '5', '16', 1),
(7, '5', '21', 1),
(8, '6', '16', 1),
(9, '7', '13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `firstname`, `tel`, `email`, `password`, `status`) VALUES
(1, 'hiro', '000000000', 'Spy261247@gmail.com', 'admin', 'A'),
(2, 'Tem', '000000002', 'Classpattarachock@gmail.com', 'user', 'U'),
(22, 'Ten', '000000000', 'Ten010@gmail.com', '$2y$10$TbwUicaOP/y8xJzvx.KgDumGwPeMeAPE3BT3VwjQIA4aMVhfd0HdW', 'U');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id_sale`);

--
-- Indexes for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD PRIMARY KEY (`id_saledetail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id_sale` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sale_detail`
--
ALTER TABLE `sale_detail`
  MODIFY `id_saledetail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
