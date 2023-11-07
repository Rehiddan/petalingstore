-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 06:32 AM
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
-- Database: `petalingstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `description`) VALUES
(1, 'admin'),
(2, 'customer'),
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `user_id`, `order_date`, `status`) VALUES
(1, 23, '2021-07-03', 'processing'),
(2, 23, '2021-07-03', 'complete'),
(3, 23, '2021-07-03', 'complete'),
(4, 23, '2021-07-03', 'complete'),
(5, 25, '2021-07-03', 'processing'),
(6, 25, '2021-07-03', 'processing'),
(7, 23, '2021-07-12', 'processing'),
(8, 28, '2021-07-13', 'complete'),
(9, 23, '2023-07-03', 'processing'),
(10, 29, '2023-07-03', 'processing'),
(12, 29, '2023-07-05', 'processing'),
(13, 51, '2023-07-05', 'processing'),
(14, 51, '2023-07-05', 'processing'),
(15, 53, '2023-07-05', 'processing'),
(16, 51, '2023-07-07', 'processing'),
(17, 23, '2023-07-11', 'processing'),
(18, 23, '2023-07-11', 'processing'),
(19, 23, '2023-07-11', 'processing'),
(20, 23, '2023-07-11', 'processing'),
(21, 23, '2023-07-11', 'processing'),
(22, 23, '2023-07-11', 'processing'),
(23, 23, '2023-07-11', 'processing'),
(24, 23, '2023-07-11', 'processing'),
(25, 23, '2023-07-11', 'processing'),
(26, 23, '2023-07-11', 'processing'),
(27, 23, '2023-07-11', 'processing'),
(28, 23, '2023-07-11', 'processing'),
(29, 23, '2023-07-11', 'processing'),
(30, 23, '2023-07-11', 'processing'),
(31, 23, '2023-07-12', 'processing'),
(32, 23, '2023-07-12', 'processing'),
(33, 25, '2023-07-12', 'processing'),
(34, 25, '2023-07-12', 'processing'),
(35, 25, '2023-07-12', 'processing'),
(36, 25, '2023-07-12', 'processing'),
(37, 25, '2023-07-12', 'processing'),
(38, 29, '2023-07-12', 'processing'),
(39, 61, '2023-07-12', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `detail_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`detail_id`, `orders_id`, `product_id`, `quantity`) VALUES
(1, 0, 2, 1),
(2, 0, 2, 1),
(3, 0, 2, 1),
(4, 2, 2, 1),
(5, 3, 2, 1),
(6, 4, 3, 1),
(7, 5, 3, 1),
(8, 5, 5, 1),
(9, 5, 6, 1),
(10, 6, 3, 1),
(11, 6, 4, 1),
(12, 7, 6, 1),
(13, 8, 1, 1),
(14, 8, 2, 1),
(15, 9, 3, 3),
(16, 10, 1, 1),
(17, 10, 2, 1),
(18, 10, 3, 1),
(20, 12, 5, 1),
(21, 13, 7, 1),
(22, 14, 3, 1),
(23, 15, 2, 1),
(24, 16, 1, 1),
(25, 17, 3, 1),
(26, 18, 1, 1),
(27, 19, 5, 1),
(28, 20, 3, 1),
(29, 21, 4, 1),
(30, 22, 7, 1),
(31, 23, 6, 1),
(32, 24, 2, 1),
(33, 25, 3, 1),
(34, 26, 7, 1),
(35, 27, 7, 1),
(36, 28, 2, 1),
(37, 29, 1, 1),
(38, 30, 7, 1),
(39, 31, 2, 1),
(40, 32, 2, 1),
(41, 33, 2, 1),
(42, 34, 5, 1),
(43, 35, 5, 1),
(44, 35, 6, 1),
(45, 35, 7, 1),
(46, 36, 1, 1),
(47, 37, 6, 1),
(48, 38, 2, 1),
(49, 39, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `picture`) VALUES
(1, 'YONEX ARCSABER 11', 260, 'mk1.jpg'),
(2, 'Yonex Astrox', 340, 'mk2.jpg'),
(3, 'Yonex Aerosensa 40 Feather Shuttles', 90, 'mk3.JPG'),
(4, 'Senston Grip tape, non-slip overgrip', 15, 'mk7.JPG'),
(5, 'Victor BR 6215 HC Shoulder Bag (Iron Gate/Black)', 230, 'mk8.jpg'),
(6, 'Yonex Astrox 77 Pro', 390, 'mk11.jpg'),
(7, 'Yonex Astrox 99 Play', 460, 'mk12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `level_id` int(11) NOT NULL,
  `membership` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `address`, `level_id`, `membership`) VALUES
(17, 'Admin1234', 'Admin1234', 'admin123@gmail.com', '1234', 'No 31 Taman Markisa', 1, ''),
(23, 'mane', 'man', 'man@gmail.com', 'man123', 'Sungai Petani', 2, 'Basic'),
(25, 'alii', 'ali baba', 'ali@gmail.com', 'ali123', 'Taman Pekan Baru, 08000 Sungai Petani, Kedah', 2, 'Pro'),
(26, 'man', 'tap', 'mantap@gmail.com', '123', '31', 2, 'Ultimate'),
(28, 'lukman', 'lukman', 'lukman@gmail.com', '123', 'taman ria', 2, 'Basic'),
(29, 'nazmi', 'kelas A', 'nazmi@gmail.com', 'nazmi', 'selangor', 2, 'Ultimate'),
(51, 'mubin', '', 'mubin@gmail.com', 'mubin', '123', 2, 'Basic'),
(53, 'haris', '', 'haris@gmail.com', 'haris', '213', 2, 'Pro'),
(59, 'Muhammad', 'Hariz', 'hariz7801yob@gmail.com', '123', 'Lot 1361', 2, 'Pro'),
(60, 'Muhammad', 'Hariz', 'hariz7yob@gmail.com', '123', 'Lot 1361', 2, 'Ultimate'),
(61, 'Haziqq', 'Azizan', 'haziq@gmail.com', 'haziq', 'BG', 2, 'Pro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
