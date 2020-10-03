-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2020 at 06:06 AM
-- Server version: 10.2.33-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rasposmy_paw`
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
(8, 8, 2, 1, 'XS', 74900),
(9, 10, 2, 2, 'M', 111110),
(10, 10, 2, 1, 'XL', 55555);

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
(4, 202009251, '0000-00-00 00:00:00', 'BANK CENTRAL ASIA', 'USER - 29722312', '2-20-09-25instance_9642.JPG');

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
(1, 'FIRST', 20000),
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
(1, 1, 0, 'd2311812fbf1d8a40be8970c37f0ce7d', NULL),
(2, 2, 0, '0d4ce7b9b90c17e9ef366adfbb9c10a1', NULL),
(3, 3, 1, '28b3755295c84773f71aa5ede020d414', '2020-09-25'),
(4, 4, 1, 'b16faca3ec923baff750af52e3923bde', '2020-09-25'),
(5, 5, 1, '158017449379ade6fd67d43d5fc26213', '2020-09-26'),
(6, 6, 0, 'ffeaa49acf61f3aea5a7eceedbc26492', NULL),
(7, 7, 0, 'b533112c0822668c8bc00d15a483bc63', NULL),
(8, 8, 0, '883ee679a30841c593d1b32ac38f00b0', NULL),
(9, 9, 0, '0d791605ca81d3d21126aff1a5bac041', NULL),
(10, 10, 0, '3a2ddba3c67ccea610861244a5256212', NULL),
(11, 11, 0, 'd950d4278bd52641d3e76626890c96b8', NULL),
(12, 12, 0, 'ef0a0d16a75b1af8b3284f9ee51a4420', NULL),
(13, 13, 0, '88eaceaa0c4067e1b9e5015ffa4068cf', NULL),
(14, 14, 0, 'bde99eeeae50096ff2351d3322ce6389', NULL),
(15, 15, 0, 'b342eff8fbd3513ae03861e96f962960', NULL),
(16, 16, 0, '1d4043ae32f76f6c20d83709a6e6d332', NULL),
(17, 17, 0, 'aa6eaa770351d47d86e4adf739b91651', NULL),
(18, 18, 0, '778fd5fcb950bf90c0bb63bbc5bab4b7', NULL),
(19, 19, 0, 'e92e4d98d54053d948400757bd30def6', NULL),
(20, 20, 0, '4f5edd1cbea547a3607d3790ec651559', NULL),
(21, 21, 0, '086d948c816c0b7b58dd2d65b85b7c3d', NULL),
(22, 22, 0, '7d33f9b1b30e88aba82c69bb39ff1065', NULL),
(23, 23, 0, 'aed5a27b4e0d7aa5ef8a08c997bd2f7a', NULL),
(24, 24, 1, '21b1b487a1778ea2346744ac53775e4d', '2020-09-29'),
(25, 25, 0, 'b3d243a69592b06562f398c7d9c05564', NULL),
(26, 26, 1, 'e933fee13aa262dfd66958ddec39acfa', '2020-09-30'),
(27, 27, 0, '2cbe508440d0d4b9b386b413a463a5b4', NULL),
(28, 28, 0, '4ee338678cc752f8d829f5b81acdebbd', NULL),
(29, 29, 0, 'f311999ddc047d07d8795ff4404d70a9', NULL),
(30, 30, 0, '8fadd6b56681dab42ad0386117d49a53', NULL),
(31, 31, 0, 'b5c1142d0712e6bb17bcb18cebb89ab1', NULL),
(32, 32, 0, '4320027a73e14e7a6ca1eb240b14b216', NULL),
(33, 33, 1, 'f583f1052c17691ee699eac3d6a66176', '2020-10-03'),
(34, 34, 0, '6a26c1ea7e2c52409d8301a9336fd609', NULL);

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
(1, '202009251', 108000, 20000, 2, '2020-09-25', 1, 'user Â Â  081223451231<br>Pontianak West Kalimantan  Indonesia<br>latitude-0.031 Â  longtitude:109.3257'),
(2, '202009252', 68900, 20000, 2, '2020-09-25', 3, 'user Â Â  081223451231<br>Pontianak West Kalimantan  Indonesia<br>latitude-0.031 Â  longtitude:109.3257'),
(3, '202009253', 96800, 0, 2, '2020-09-25', 0, 'user Â Â  081223451231<br>Pontianak West Kalimantan  Indonesia<br>latitude-0.031 Â  longtitude:109.3257'),
(4, '202009254', 48600, 5400, 2, '2020-09-25', 2, 'user Â Â  081223451231<br>Pontianak West Kalimantan  Indonesia<br>latitude-0.031 Â  longtitude:109.3257');

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
(1, 1, 8, 1, 'L', 74900),
(2, 1, 7, 1, 'S', 20800),
(3, 1, 6, 1, 'M', 32300),
(4, 2, 5, 1, 'L', 88900),
(5, 3, 4, 1, 'M', 96800),
(6, 4, 1, 1, 'XS', 54000);

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
(1, 'Batik Perempuan Bagus', 'Batik ini cocok untuk perempuan yang suka batik', '1429111484-20-09-25model-baju-batik-wanita-Batik-Agrapana-Puspita-.jpg,864863338-20-09-25BAJU ATASAN WANITA BLOUSE BATIK.jpg', 11, 54000, 22),
(2, 'Bryar Fisher', 'Ad omnis odit dolore', '1971667308-20-09-250_b0bfe378-9d0d-4eae-9fd1-8286e9e975de_540_545.jpg', 15, 60900, 54),
(3, 'Kalia Dunlap', 'Dolorum iure et quas', '944827392-20-09-25fbbf9913396a3e9aad13e1e6da1d6303.jpg', 7, 71600, 4),
(4, 'Lamar Leach', 'Sint earum sunt non ', '72545368-20-09-25adf914cd55a2edc4b282abdbad34be6c.jpg,271121504-20-09-251130967_faa639df-fe2a-4252-bc74-c220fe02e4be_1771_1771.png', 13, 96800, 0),
(5, 'Wynne Blair', 'Est maiores voluptat', '955905997-20-09-256142589_1e8ed387-8c2b-4e52-876c-dc9105154049_1536_1536.jpeg,1651289617-20-09-25screenplay-8789-7377381-1.jpg,1696775275-20-09-25kaos-printing-galaxy-spilled-milk-wb-700x700.jpg', 1, 88900, 79),
(6, 'Karen Parrish', 'Ex praesentium maxim', '189864993-20-09-25a22f18e40980f287547c43a84d73cb91.jpeg,256055773-20-09-25hemmeh-9979-5985851-1.jpg', 9, 32300, 17),
(7, 'Kiayada Savage', 'Magnam quibusdam rer', '2006970468-20-09-25PAKAIAN_WANITA_OVERALL_BAJU_WANITA_BUSANA_WANITA_GAMIS_BLOUS.jpg', 14, 20800, 22),
(8, 'Sylvia Frye', 'Quo minima est moles', '760081587-20-09-25fbbf9913396a3e9aad13e1e6da1d6303.jpg,492625384-20-09-25blouse_ema__pakaian_wanita__baju_wanita_1527697954_819d2dea.jpg,617493154-20-09-25154028932_031520aa-7305-4c4c-9eff-b309a8cd0956_768_768.jpg', 2, 74900, 8),
(10, 'Malcolm Mills', 'Libero quod similiqu', '1819397120-20-09-25baju1.png,26421327-20-09-25baju2.jpg,1065008215-20-09-25baju3.jpg,1920939731-20-09-25baju4.jpg', 3, 55555, 1);

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
  `is_admin` int(1) NOT NULL DEFAULT 0,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_number`, `address`, `is_verified`, `is_admin`, `last_login`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$WHQiEVStx7pAYt2N3kmR3OKkvZz9Y4eyV.lrme6VlHHdE5d5vWb0u', '08982866621', 'Pontianak West Kalimantan  Indonesia<br>latitude-0.031 &nbsp; longtitude:109.3257', 1, 1, '2020-09-29 11:22:38'),
(2, 'user', 'user@user.com', '$2y$10$wg1hZnmv4eYDqNFc4aWVDePDiGbpMqxfleYa58SEQg1zG8lybbs7C', '081223451231', 'Pontianak West Kalimantan  Indonesia<br>latitude-0.031 &nbsp; longtitude:109.3257', 1, 0, NULL),
(4, 'rum', 'rum@1secmail.com', '$2y$10$u2teeNoeq6Mmt15nZ/LS/.OZNPCzeAP1JIA0CJHY8/1n5xUTcNbui', '12312312312', 'Singapore   Singapore<br>latitude1.3325 &nbsp; longtitude:103.8816', 1, 0, NULL),
(5, 'Hop Golden', 'sewah@1secmail.com', '$2y$10$1xWR7YDZmICySznecyKv/uANqCsVrxdlZzljdCxrAfmxvnCUvesUO', '+1 (772) 306-57', 'Jl. Juicy loved by me', 1, 0, NULL),
(34, 'Eras Timothy', 'setorantimothy@gmail.com', '$2y$10$/Swk/gb.hRRIZxPrv48MhudgJbPQN9ZntFJz4mxhibQOjNmWOc71u', '087721230725', 'Pontianak West Kalimantan  Indonesia<br>latitude-0.031 &nbsp; longtitude:109.3257', 0, 0, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
