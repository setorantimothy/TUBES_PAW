-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 10:22 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_paw`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `variance` varchar(255) DEFAULT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `quantity`, `variance`, `subtotal`) VALUES
(2, 3, 4, 2, 'L', 180000),
(3, 3, 4, 3, 'XXL', 270000),
(4, 3, 4, 7, 'XS', 630000),
(5, 3, 4, 4, 'M', 360000),
(6, 3, 4, 2, 'S', 180000),
(7, 3, 4, 2, 'XL', 180000),
(8, 6, 4, 2, 'XS', 64000),
(9, 6, 4, 2, 'L', 64000),
(12, 3, 5, 2, 'M', 180000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `slug` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `slug`, `name`, `parent_id`) VALUES
(1, 'new_arrival', 'New Arrival', NULL),
(2, 'populer', 'Populer', NULL),
(3, 'hot_sale', 'Hot Sale', NULL),
(4, 'Man', 'Man', NULL),
(5, 'woman', 'Woman', NULL),
(6, 'kids', 'Kids', NULL),
(7, 'man_batik', 'Batik', 4),
(8, 'man_jaket', 'Jaket', 4),
(9, 'man_kemeja', 'Kemeja', 4),
(10, 'man_kaos', 'Kaos', 4),
(11, 'woman_batik', 'Batik', 5),
(12, 'woman_kemeja', 'Kemeja', 5),
(13, 'woman_kaos', 'Kaos', 5),
(14, 'woman_luaran', 'Luaran', 5),
(15, 'kids_boy', 'Boy', 6),
(16, 'kids_girl', 'girl', 6);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `disc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `name`, `disc`) VALUES
(1, 'FIRST', 10000),
(2, 'OPENING', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `no_order` varchar(255) NOT NULL,
  `grandtotal` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `variance_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `category_id` int(5) NOT NULL,
  `price` double NOT NULL,
  `stocks` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `image`, `category_id`, `price`, `stocks`) VALUES
(1, 'test aja', 'test aja', '1.jpg', 2, 56000, 0),
(3, 'test 1 ', 'loha loha loha', 'baju4.jpg,baju2.jpg,baju3.jpg', 3, 90000, 4),
(6, '2 test', '12312321', '2.jpg', 2, 32000, 0),
(7, 'd324', '12312321', '3.jpg', 2, 112000, 0),
(8, '334', '45000', 'user.jpg', 2, 26700, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `is_verified` int(1) NOT NULL DEFAULT 0,
  `is_admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_number`, `address`, `is_verified`, `is_admin`) VALUES
(1, 'Ferris Byers', 'xefazud@mailinator.com', '$2y$10$v7xGqNj1L5USMh/dt6tTqOAw6lI21D/IjBAxeluZXg3SamMt7jQcq', '+1 (657) 522-69', NULL, 0, 0),
(2, 'Karina Adkins', 'tusiged@mailinator.com', '$2y$10$bj2DAKRw.SL4RlKKRiyr.OmieX4XV6Tg0bU7jwU80bN5TbwWScyu6\r\n\r\n$2y$10$wBQKdMpGFzqtkPeQb/JhYOnaXKwTHAnB3fIKVxc0jj.HGr9s/yy36', '+1 (982) 881-11', NULL, 0, 0),
(3, 'Jamalia Oneill', 'zyxywudax@mailinator.com', '$2y$10$Sxl3nL0chanAqptBpgzByu2FZzyAJhZQamImi48yevNh7BCCXxm1i', '+1 (315) 454-37', NULL, 0, 0),
(4, 'Kai Sharpe', 'duda@mailinator.com', '$2y$10$UDviotGnsKlHum8uCn1Eue9mFy6lEdsq4/RCG.r4KLvalhFuOMuxq', '+1 (584) 367-95', NULL, 1, 0),
(5, 'Aquila Mclaughlin', 'eras@admin.com', '$2y$10$E2Atd/iRhC7QnZG/gTU..eO/jPvApx6YecQ6SyBfeo/wzL0W.oeZC', '+1 (213) 808-32', NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
