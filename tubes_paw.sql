-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 07:14 PM
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
(42, 8, 7, 1, 'L', 26700),
(44, 8, 16, 1, 'XS', 26700),
(46, 8, 5, 1, 'XL', 26700),
(47, 8, 5, 2, 'XS', 53400),
(48, 6, 5, 1, 'L', 32000),
(49, 3, 4, 1, 'XS', 90000);

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
-- Table structure for table `confirm_payment`
--

CREATE TABLE `confirm_payment` (
  `id` int(11) NOT NULL,
  `no_order` int(25) NOT NULL,
  `date` datetime NOT NULL,
  `transfer_to` text NOT NULL,
  `transfer_from` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirm_payment`
--

INSERT INTO `confirm_payment` (`id`, `no_order`, `date`, `transfer_to`, `transfer_from`, `image`) VALUES
(1, 202009241, '2020-09-24 02:12:09', 'BANK CENTRAL ASIA', 'asdas', '520-09-24Capture.PNG'),
(2, 202009241, '2020-09-25 05:12:11', 'BANK CENTRAL ASIA', 'asdas', '520-09-24Capture.PNG'),
(3, 202009241, '2020-09-25 20:10:14', 'BANK RAKYAT INDONESIA', '12312321', '5-20-09-24background_5k.jpg');

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
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `verif_key` varchar(255) NOT NULL,
  `verified_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`id`, `user_id`, `status`, `verif_key`, `verified_date`) VALUES
(1, 23, 1, 'adaee9d5b1250d87fb2f41aecbdea817', '2020-09-24'),
(2, 24, 0, '55b1e7a1ee59eee26c44f3377fba21f6', NULL),
(3, 25, 0, 'f24783f3ebdb434630942f5d469d8f9a', NULL),
(4, 26, 0, '54a2db643e1d6883894951bbf2b85a88', NULL),
(5, 27, 0, '7055996ca99b359beb35d9746ae88ecd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `no_order` varchar(255) NOT NULL,
  `grandtotal` double NOT NULL,
  `discount` double DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `no_order`, `grandtotal`, `discount`, `user_id`, `order_date`, `status`, `address`) VALUES
(1, '202009241', 90000, 0, 5, '2020-09-24', 2, 'Eras    +1 (213) 808-32<br>Jl. Surga Durka murhaka');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `variance` varchar(255) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `variance`, `subtotal`) VALUES
(1, 1, 3, 1, 'XS', 90000);

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
(1, 'Orla Owens', 'Qui minima sapiente ', '1.jpg', 14, 37200, 40),
(3, 'test 1 ', 'loha loha loha', 'baju4.jpg,baju2.jpg,baju3.jpg', 3, 90000, 2),
(6, '2 test', '12312321', '2.jpg', 2, 32000, 2),
(8, '334', '45000', 'user.jpg', 2, 26700, 40),
(9, 'Whitney Mcmillan', 'Dolores eligendi mol', 'elle-zhu-O_uV3KhQuo8-unsplash.jpg,lubo-minar-3K6ZkYBj2Xo-unsplash.jpg,nathan-anderson-roZgc7SXXmI-unsplash.jpg', 12, 884, 69),
(10, 'Pandora Meyer', 'Dolor totam ut omnis', '235812212-20-09-25Circle-icons-computer.svg.png,1113341032-20-09-25Settings-512.png,1727594508-20-09-25Spotify Flat.png,253375755-20-09-25youtube flat.png', 7, 475, 39);

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
(4, 'Kai Sharpe', 'duda@mailinator.com', '$2y$10$UDviotGnsKlHum8uCn1Eue9mFy6lEdsq4/RCG.r4KLvalhFuOMuxq', '+1 (584) 367-95', 'asda', 1, 0),
(5, 'Eras', 'eras@admin.com', '$2y$10$vqMX1wg2duHbkx.lDmCmFO7SAVTYItWffp4.h8FBZA6lOOVIdTmiC', '+1 (213) 808-32', 'Jl. Surga Durka murhaka', 1, 1),
(6, 'Declan Park', 'cecuxixa@mailinator.com', '$2y$10$TQZ0lnBQmquqkH0WguPKgutSr0NbC70EHErHY0RlCSqKvnQMDEKBO', '+1 (873) 757-88', NULL, 0, 0),
(7, 'Christian Dudley', 'fawobaror@mailinator.com', '$2y$10$sJVIOz9TELeAyfABYilFq.uquT8/iismUMPQS3zpvC4gFqQN61QD2', '+1 (566) 207-19', NULL, 1, 0),
(8, 'Jena Cabrera', 'lemyceke@mailinator.com', '$2y$10$5Bs43hUhagft9GcTV80/6up1l9jeR2PKSorSdaLQlvmCsyvKXgYE6', '+1 (426) 162-24', '   <br>latitude &nbsp; longtitude:', 0, 0),
(11, 'Jordan Glenn', 'xuhoxawy@mailinator.com', '$2y$10$c2T7rTyFW7PBAMe1DMYnsuMa1EiZmp2UxRVZ2uc5ZM2fua.4ntdJi', '+1 (704) 927-98', '   <br>latitude &nbsp; longtitude:', 0, 0),
(13, 'Renee Tyson', 'dajybufatu@mailinator.com', '$2y$10$T4bRbEJu03FxCRySLylU4OHs1MeZrmbTD6Wltu/HN2rSvz3VbSRpG', '+1 (436) 388-37', '', 0, 0),
(14, 'Courtney Cash', 'jidovamo@mailinator.com', '$2y$10$uLDo4MoCeuBRPagfyWo14.3wUNIvVMwRWTMXAgDousfN3WgjyKuLK', '+1 (504) 675-44', '', 1, 0),
(16, 'Gretchen Velez', 'natehupob@mailinator.com', '$2y$10$fe5scbms9RuKJxEvKRdA8.CeYQJ2yeGx6SrWIPm0/OsyScNT2bn3u', '+1 (826) 272-89', 'asdasdasdas', 1, 0),
(23, 'Jasper Poole', 'mabezew@mailinator.com', '$2y$10$tp/0ijZStg8cwyQ9zVXRf.px.VNz7Kg0FN2fbTCqlyVJ7fKHDgoHC', '+1 (361) 411-16', '', 1, 0),
(24, 'Blossom Roberson', 'bygeg@mailinator.com', '$2y$10$Ik1O6c1mgSg0N.EmIVzUY.YLavYNYC4AXsoJ8FUVjFBpYBtAJvFjy', '+1 (618) 481-11', '', 0, 0),
(25, 'Meredith Landry', 'cilaturaxi@mailinator.com', '$2y$10$S2nsm2IBvkWcLtAUeXCKYuPMyenYIEeQ6dn9tF.aL/ciuP91Z0KK2', '+1 (173) 391-65', '', 0, 0),
(26, 'Bianca Nixon', 'sogel@mailinator.com', '$2y$10$F8WZf0MWZM/DFIvcEhiVfut5GHV.468Dd3eYHhCmqkyCdDDgXE9jm', '+1 (742) 595-16', '', 0, 0),
(27, 'Erica Espinoza', 'pirepy@mailinator.com', '$2y$10$wqU1iOP7YQBy2N5r.yMFFO.Scidjcg/4C2.XasG0vQDZaqCDJA/HG', '+1 (804) 134-48', '', 0, 0);

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
-- Indexes for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `verif_key` (`verif_key`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_order` (`no_order`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
