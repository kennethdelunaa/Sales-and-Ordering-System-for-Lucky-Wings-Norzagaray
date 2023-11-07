-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 07:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luckywings_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart_table`
--

CREATE TABLE `chart_table` (
  `id` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `expense` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart_table`
--

INSERT INTO `chart_table` (`id`, `sale`, `expense`, `date`) VALUES
(1, 5000, 9000, '2022-02-09 13:30:27'),
(2, 1000, 6000, '2022-01-04 13:30:33'),
(3, 200, 3000, '2021-12-07 13:30:39'),
(4, 5000, 300, '2022-02-08 13:30:43'),
(5, 4000, 3000, '2022-02-08 13:30:46'),
(6, 1000, 300, '2022-01-03 13:30:48'),
(7, 500, 300, '2021-12-13 13:30:52'),
(8, 50, 300, '2022-02-08 13:30:56'),
(9, 0, 5000, '2022-02-02 01:52:36'),
(12, 952, 0, '2022-02-02 13:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `table_num` int(3) NOT NULL,
  `head_count` int(2) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `plan`, `table_num`, `head_count`, `status`) VALUES
(448, 'wendy', '238', 1, 3, 'Admitted'),
(449, 'Nico', '238', 2, 3, 'Admitted'),
(450, 'Mark', '238', 3, 5, 'Admitted'),
(451, 'Conny', '238', 4, 3, 'Admitted'),
(453, 'Josh', '238', 5, 3, 'Admitted'),
(458, 'asd', '198', 0, 6, 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `delete_history`
--

CREATE TABLE `delete_history` (
  `delete_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `position` enum('Admin','Cashier') NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `position`, `password`) VALUES
(1, 'Yosh', 'Admin', 'asdasd'),
(3, 'Yellyflash', 'Cashier', 'asd'),
(8, 'BertoBat', 'Admin', 'berto');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `total_orders` int(11) NOT NULL,
  `picture` varchar(225) NOT NULL,
  `stock_num` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `product_name`, `total_orders`, `picture`, `stock_num`) VALUES
(45, 'Originals', 13, '61f1be90a0bb63.38053153.jpg', 37),
(46, 'Sweet Chili', 26, '61f1bea158a2d2.37312295.jpg', 24),
(47, 'Barbeque', 14, '61f1beb4bc3bf2.81071532.jpg', 36),
(48, 'Buttered Wings', 8, '61f1bec87cd951.76400865.jpg', 42),
(49, 'Cheesy Milk', 3, '61f1bed9be6d67.08956537.jpg', 47),
(50, 'Garlic Parmesan ', 9, '61f1bf2d6f25c9.39446518.jpg', 41),
(51, 'Honey Mustard', 7, '61f1bf4db02d72.90815318.jpg', 43),
(52, 'Korean Soy', 2, '61f1bf63c7ed88.06107568.jpg', 48),
(53, 'Salted Egg', 3, '61f1bfa80c5b53.69094032.jpg', 47),
(54, 'Signature Plain', 5, '61f1bfc35ea0f2.88039745.jpg', 45),
(55, 'Spicy Buffalo', 3, '61f1c004493be3.34704435.jpg', 47),
(56, 'Spicy Signature', 2, '61f1c01d771fa8.56239335.jpg', 48);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `order_id` int(11) NOT NULL,
  `orders` varchar(100) NOT NULL,
  `order_total` int(11) NOT NULL,
  `table_num_order` int(3) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_id`, `orders`, `order_total`, `table_num_order`, `status`) VALUES
(297, 'Sweet Chili', 1, 2, 'Pending'),
(298, 'Signature Plain', 3, 1, 'Pending'),
(299, 'Spicy Buffalo', 1, 1, 'Pending'),
(300, 'Buttered Wings', 1, 4, 'Pending'),
(301, 'Cheesy Milk', 1, 4, 'Pending'),
(302, 'Garlic Parmesan', 1, 4, 'Pending'),
(303, 'Salted Egg', 1, 4, 'Pending'),
(304, 'Sweet Chili', 1, 5, 'Pending'),
(305, 'Originals', 3, 3, 'Pending'),
(306, 'Originals', 1, 2, 'Pending'),
(307, 'Sweet Chili', 2, 2, 'Pending'),
(308, 'Barbeque', 2, 2, 'Pending'),
(309, 'Originals', 1, 1, 'Pending'),
(310, 'Sweet Chili', 1, 1, 'Pending'),
(311, 'Barbeque', 1, 1, 'Pending'),
(312, 'Cheesy Milk', 1, 1, 'Pending'),
(313, 'Garlic Parmesan', 1, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `sale-history`
--

CREATE TABLE `sale-history` (
  `customer_id` int(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_count` int(255) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `total_price` int(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale-history`
--

INSERT INTO `sale-history` (`customer_id`, `customer_name`, `customer_count`, `plan`, `total_price`, `date`) VALUES
(1, 'Joshua', 3, '', 600, '2021-12-09 09:48:20'),
(2, 'QWERTY ', 2, '', 400, '2021-12-15 15:17:16'),
(3, 'Ivan', 2, '', 400, '2021-12-15 16:43:55'),
(4, 'Ivan', 2, '', 400, '2021-12-15 23:41:35'),
(5, 'Joshua', 2, '', 400, '2021-12-16 02:45:47'),
(6, 'Ivan', 3, '', 600, '2021-12-16 02:46:19'),
(7, 'Melvin', 4, '', 800, '2021-12-16 02:46:40'),
(8, 'Kenneth', 1, '', 200, '2021-12-16 02:47:01'),
(9, 'Rouwed', 2, '', 400, '2021-12-16 02:47:13'),
(10, 'Ivan', 1, '', 200, '2021-12-16 05:53:14'),
(11, 'Melvin', 2, '', 400, '2021-12-16 05:58:46'),
(12, 'Rouwed', 3, '', 600, '2022-01-03 08:20:45'),
(13, 'Kenneth', 3, '', 600, '2022-01-03 08:22:08'),
(14, 'Nico', 2, '', 400, '2022-01-13 11:55:47'),
(15, 'Conny', 3, '', 600, '2022-01-13 13:51:07'),
(16, 'Mark', 3, '', 600, '2022-01-13 14:08:38'),
(17, 'Ivan', 3, '', 600, '2022-01-13 14:09:45'),
(18, 'Conny', 3, '', 600, '2022-01-13 14:12:18'),
(19, 'Ivan', 2, '', 400, '2022-01-13 14:13:09'),
(20, 'Conny', 3, '', 600, '2022-01-13 14:16:39'),
(21, 'Ivan', 2, '', 400, '2022-01-14 09:15:10'),
(22, 'Ivan', 3, '', 600, '2022-01-14 09:15:59'),
(23, 'Conny', 1, '', 200, '2022-01-14 09:17:39'),
(24, 'Nico', 1, '', 200, '2022-01-14 11:36:09'),
(25, 'Nico', 2, '', 400, '2022-01-14 11:39:18'),
(26, 'Conny', 2, '', 400, '2022-01-18 11:22:03'),
(27, 'Ivan', 2, '', 400, '2022-01-19 11:24:04'),
(28, 'Ivan', 2, '', 400, '2022-01-19 11:25:03'),
(29, 'Ivan', 2, '', 400, '2022-01-19 15:50:41'),
(30, 'Conny', 2, '', 400, '2022-01-19 15:58:04'),
(31, 'Mark', 3, '', 600, '2022-01-19 16:00:05'),
(32, 'wendy', 2, '', 400, '2022-01-19 16:00:57'),
(33, 'Conny', 1, '', 200, '2022-01-19 16:05:45'),
(34, 'Conny', 2, '', 400, '2022-01-19 16:06:44'),
(35, 'Conny', 3, '', 600, '2022-01-19 16:07:22'),
(36, 'Ivan', 3, '', 600, '2022-01-19 16:09:13'),
(37, 'Ivan', 3, '', 600, '2022-01-19 16:11:17'),
(38, 'jake', 3, '', 600, '2022-01-19 16:15:19'),
(39, 'Conny', 3, '', 600, '2022-01-19 16:22:07'),
(40, 'Nico', 1, '', 200, '2022-01-19 16:23:03'),
(41, 'Nico', 1, '', 200, '2022-01-19 16:26:39'),
(42, 'Ivan', 2, '', 400, '2022-01-19 16:31:13'),
(43, 'Conny', 1, '', 200, '2022-01-19 16:31:51'),
(44, 'Mark', 1, '', 200, '2022-01-19 16:39:05'),
(45, 'Ivan', 1, '', 200, '2022-01-19 17:33:17'),
(46, 'jake', 2, '', 400, '2022-01-20 06:58:26'),
(47, 'Nico', 4, '', 800, '2022-01-20 08:30:57'),
(48, 'gab', 3, '', 600, '2022-01-20 08:32:50'),
(49, 'Nico', 3, '', 600, '2022-01-20 11:25:54'),
(50, 'Ivan', 2, '', 400, '2022-01-20 11:31:51'),
(51, 'wendy', 3, '', 600, '2022-01-20 15:54:41'),
(52, 'jake', 2, '', 400, '2022-01-20 16:29:05'),
(53, 'Mark', 3, '', 600, '2022-01-20 16:38:32'),
(54, 'Nico', 5, '', 1000, '2022-01-20 19:29:28'),
(56, 'Mark', 3, '', 600, '2022-01-21 12:40:47'),
(57, 'Mark', 3, '', 600, '2022-01-24 07:05:32'),
(59, 'Nico', 3, '238', 714, '2022-01-27 09:45:55'),
(60, 'Mark', 5, '238', 1190, '2022-01-27 10:47:02'),
(61, 'Conny', 3, '238', 714, '2022-01-27 12:10:45'),
(62, 'Ed', 4, '238', 952, '2022-01-27 12:10:56'),
(63, 'Josh', 3, '238', 714, '2022-02-05 03:36:22'),
(64, 'Josh', 5, '238', 1190, '2022-02-07 14:38:47'),
(66, 'Joshi', 3, '198', 594, '2022-02-10 00:18:42'),
(67, 'Josasdhi', 5, '238', 1190, '2022-02-10 00:18:51'),
(68, 'asd', 6, '198', 1188, '2022-02-10 00:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `item_name`, `category`, `description`, `price`, `date`, `picture`) VALUES
(1, 'Magic Sarap', 'Seasoning', 'Seasoning for Korean Soy', 23, '2022-01-27', '61f1f22c1fbbd1.45645207.png'),
(2, 'Electronic fan', 'Appliances ', 'Mainit. Pinabili ni boss', 10000, '2022-01-27', '61f1f532f2d2a6.90302789.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `table_1`
--

CREATE TABLE `table_1` (
  `order_id` int(11) NOT NULL,
  `orders` varchar(100) NOT NULL,
  `order_total` int(1) NOT NULL,
  `table_num_order` int(3) NOT NULL,
  `status` enum('Pending','Served','','') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_1`
--

INSERT INTO `table_1` (`order_id`, `orders`, `order_total`, `table_num_order`, `status`) VALUES
(135, 'Signature Plain', 3, 1, 'Pending'),
(136, 'Spicy Buffalo', 1, 1, 'Pending'),
(137, 'Originals', 1, 1, 'Pending'),
(138, 'Sweet Chili', 1, 1, 'Pending'),
(139, 'Barbeque', 1, 1, 'Pending'),
(140, 'Cheesy Milk', 1, 1, 'Pending'),
(141, 'Garlic Parmesan', 1, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `table_2`
--

CREATE TABLE `table_2` (
  `order_id` int(11) NOT NULL,
  `orders` varchar(100) NOT NULL,
  `order_total` int(1) NOT NULL,
  `table_num_order` int(3) NOT NULL,
  `status` enum('Pending','Served','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_2`
--

INSERT INTO `table_2` (`order_id`, `orders`, `order_total`, `table_num_order`, `status`) VALUES
(12, 'Sweet Chili', 1, 2, 'Pending'),
(13, 'Originals', 1, 2, 'Pending'),
(14, 'Sweet Chili', 2, 2, 'Pending'),
(15, 'Barbeque', 2, 2, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `table_3`
--

CREATE TABLE `table_3` (
  `order_id` int(11) NOT NULL,
  `orders` varchar(100) NOT NULL,
  `order_total` int(1) NOT NULL,
  `table_num_order` int(3) NOT NULL,
  `status` enum('Pending','Served','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_3`
--

INSERT INTO `table_3` (`order_id`, `orders`, `order_total`, `table_num_order`, `status`) VALUES
(24, 'Originals', 3, 3, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `table_4`
--

CREATE TABLE `table_4` (
  `order_id` int(11) NOT NULL,
  `orders` varchar(100) NOT NULL,
  `order_total` int(1) NOT NULL,
  `table_num_order` int(3) NOT NULL,
  `status` enum('Pending','Served','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_4`
--

INSERT INTO `table_4` (`order_id`, `orders`, `order_total`, `table_num_order`, `status`) VALUES
(31, 'Buttered Wings', 1, 4, 'Pending'),
(32, 'Cheesy Milk', 1, 4, 'Pending'),
(33, 'Garlic Parmesan', 1, 4, 'Pending'),
(34, 'Salted Egg', 1, 4, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `table_5`
--

CREATE TABLE `table_5` (
  `order_id` int(11) NOT NULL,
  `orders` varchar(100) NOT NULL,
  `order_total` int(1) NOT NULL,
  `table_num_order` int(3) NOT NULL,
  `status` enum('Pending','Served','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_5`
--

INSERT INTO `table_5` (`order_id`, `orders`, `order_total`, `table_num_order`, `status`) VALUES
(4, 'Sweet Chili', 1, 5, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `total_sales` int(11) NOT NULL,
  `total_wings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart_table`
--
ALTER TABLE `chart_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `sale-history`
--
ALTER TABLE `sale-history`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_1`
--
ALTER TABLE `table_1`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `table_2`
--
ALTER TABLE `table_2`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `table_3`
--
ALTER TABLE `table_3`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `table_4`
--
ALTER TABLE `table_4`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `table_5`
--
ALTER TABLE `table_5`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chart_table`
--
ALTER TABLE `chart_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=459;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT for table `sale-history`
--
ALTER TABLE `sale-history`
  MODIFY `customer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `table_1`
--
ALTER TABLE `table_1`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `table_2`
--
ALTER TABLE `table_2`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_3`
--
ALTER TABLE `table_3`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `table_4`
--
ALTER TABLE `table_4`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `table_5`
--
ALTER TABLE `table_5`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
