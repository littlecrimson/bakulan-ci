-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2020 at 04:28 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bakulan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `qty`, `subtotal`) VALUES
(1, 2, 1, 1, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `slug`, `title`) VALUES
(1, 'pakaian', 'Pakaian'),
(2, 'dompet', 'Dompet'),
(3, 'tas', 'Tas'),
(4, 'kamera', 'Kamera'),
(5, 'game-console', 'Game & Console'),
(6, 'notebook', 'Notebook');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` enum('waiting','paid','delivered','cancel','process') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_confirm`
--

CREATE TABLE `orders_confirm` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `norek` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `is_available` tinyint(4) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_category`, `title`, `slug`, `price`, `is_available`, `image`, `description`) VALUES
(1, 5, 'PS4 PRO Final Fantasy 7 Remake Limited Editions', 'ps4-pro-final-fantasy-7-remake-limited-editions', 10000000, 1, 'ps4-pro-final-fantasy-7-remake-limited-editions-20200514162013.jpg', 'Genre : Action Adventure\r\n<br><br>\r\nThey are coming back to Midgar Mako Reactors are draining the life energy of\r\nthe planet. The Shinra Corporation rules over a corrupt surveillance state. A\r\nfew prosper, the rest are left to rot in the city slums of Midgar. That changes\r\ntonight. The elite mercenary and ex-SOLDIER Cloud Strife has been hired by the\r\nresistance movement AVALANCHE to fight back. Their mission will change the world\r\nforever.\r\n<br>\r\nThe world has fallen under the control of the Shinra Electric Power Company, a\r\nshadowy corporation controlling the planets very life force as mako energy.\r\n<br><br>\r\nIn the sprawling city of Midgar, an anti-Shinra organization calling themselves\r\nAvalanche have stepped up their resistance. Cloud Strife, a former member of\r\nShinras elite SOLDIER unit now turned mercenary, lends his aid to the group,\r\nunaware of the epic consequences that await him.\r\n<br><br>\r\nA spectacular re-imagining of one of the most visionary games ever, the first\r\ngame in this project will be set in the eclectic city of Midgar and presents a\r\nfully standalone gaming experience.\r\n<br><br>\r\n1st Class Edition Includes :<br>\r\n- FINAL FANTASY VII REMAKE game<br>\r\n- Play Arts Kai Cloud Strife & Hardy Daytona<br>\r\n- Artbook<br>\r\n- Mini-Soundtrack<br>\r\n- Steelbook<br>\r\n- Cactuar Summon Materia DLC<br>\r\n- Carbuncle Summon Materia DLC<br>'),
(2, 5, 'Tom Clancy Rainbow Six Siege For PS4', 'tom-clancy-rainbow-six-siege-for-ps4', 300000, 1, 'tom-clancy-rainbow-six-siege-for-ps4-20200514162453.jpeg', 'ump into the latest expansion, Operation Phantom Sight, and play as the two new operators, Nokk and Warden.\r\nIncludes Tom Clancy\'s Rainbow Six Siege original game, with an active community of over 25 million players.\r\nFeatures $30 worth of bonus content including 600 Rainbow Six Credits and 10 Outbreak Collection Packs (Available in-game March 6, 2018) to unlock premium in-game content and customize your Operators.\r\nMaster the art of destruction and gadgetry with highly specialized international Operators.\r\nFace intense close-quarters combat, tactical team play, and explosive action in every moment.'),
(3, 5, 'Final Fantasy VII Remake for PS4', 'final-fantasy-vii-remake-for-ps4', 810000, 1, 'final-fantasy-vii-remake-for-ps4-20200514162720.jpeg', 'Reg : 3 [ Asia ]\r\n<br><br>\r\nThey are coming back to Midgar… Mako Reactors are draining the life energy of the planet. The Shinra Corporation rules over a corrupt surveillance state. A few prosper, the rest are left to rot in the city slums of Midgar. That changes tonight. The elite mercenary and ex-SOLDIER Cloud Strife has been hired by the resistance movement AVALANCHE to fight back. Their mission will change the world forever.');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id`, `image`) VALUES
(1, 'promo-20200514162109.jpg'),
(2, 'promo-20200514162115.png'),
(3, 'promo-20200514162121.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` enum('admin','member') NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`, `role`, `is_active`, `alamat`) VALUES
(1, 'enggar', 'admin@bakulan.com', '$2y$10$bqznFLqnHvnJvWsRnZfHJOWf610Gq.2897gWwk4VV0qKjA3931aWm', 'enggar-20200514161623.jpg', 'admin', 1, 'Tabanan'),
(2, 'Enggar', 'user@bakulan.com', '$2y$10$llQmy/xjzl/txxf2h7LRX.BwWsGTgOcLHSrQ.gRTLfJP8xZrGEvB2', NULL, 'member', 1, NULL);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_confirm`
--
ALTER TABLE `orders_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_confirm`
--
ALTER TABLE `orders_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
