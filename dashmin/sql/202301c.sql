-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 08:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `202301c`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `cat_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_image`) VALUES
(2, 'Bags', 'download.jpg'),
(3, 'shoes', 'shoes.jpg'),
(4, 'glasses', 'glasses.jpg'),
(5, 'dresses', 'download (17).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `productCount` int(11) NOT NULL,
  `productAmount` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `userAddress` varchar(500) NOT NULL,
  `userPhone` varchar(50) NOT NULL,
  `orderPlaceDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `mydate` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `productId`, `userId`, `productName`, `productPrice`, `productQuantity`, `userAddress`, `userPhone`, `orderPlaceDate`, `mydate`) VALUES
(1, 5, 2, 'transparent glasses', 650, 2, 'abc', '5456465489', '2024-01-03 07:01:53', NULL),
(2, 4, 2, 'eyep protection glasses', 2500, 2, 'abc', '5456465489', '2024-01-03 07:03:02', NULL),
(3, 5, 2, 'transparent glasses', 650, 3, 'abc', '5456465489', '2024-01-03 07:03:03', NULL),
(4, 6, 4, 'new  bags', 5500, 2, 'nm karachi', '03052044567', '2024-01-03 07:19:48', NULL),
(5, 7, 4, 'nike', 5200, 2, 'nm karachi', '03052044567', '2024-01-03 07:19:48', NULL),
(6, 2, 5, 'shoes', 3000, 2, '', '', '2024-01-03 07:21:47', NULL),
(7, 4, 5, 'eyep protection glasses', 2500, 1, '', '', '2024-01-03 07:21:47', NULL),
(8, 5, 2, 'transparent glasses', 650, 1, 'nm karachi', '5456465489', '2024-01-05 07:12:59', NULL),
(9, 2, 2, 'shoes', 3000, 3, 'nm karachi', '5456465489', '2024-01-05 07:13:42', NULL),
(10, 5, 2, 'transparent glasses', 650, 1, 'nm karachi', '5456465489', '2024-01-05 07:13:42', NULL),
(11, 6, 2, 'new  bags', 5500, 1, 'nm karachi', '5456465489', '2024-01-05 07:13:42', NULL),
(12, 2, 3, 'shoes', 3000, 2, 'new karachi', '0302546585', '2024-01-05 07:35:01', '2024-01-05'),
(13, 6, 3, 'new  bags', 5500, 1, 'new karachi', '0302546585', '2024-01-05 07:35:01', '2024-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_quantity` varchar(250) NOT NULL,
  `product_price` varchar(250) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `category_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_quantity`, `product_price`, `product_image`, `category_type`) VALUES
(2, 'shoes', '5', '3000', 'shoes.jpg', 2),
(4, 'eyep protection glasses', '6', '2500', 'download (14).jpg', 4),
(5, 'transparent glasses', '8', '650', 'download (12).jpg', 4),
(6, 'new  bags', '5', '5500', 'download (2).jpg', 2),
(7, 'nike', '6', '5200', 'pexels-photo-5730956.jpeg', 3),
(8, 'hand bags', '9', '3500', 'pexels-photo-634538.jpeg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(200) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'fariha', 'admin@gmail.com', 'admin1', 'admin'),
(2, 'ali', 'ali@gmail.com', '123', 'user'),
(3, 'salman', 's@gmail.com', 's123', 'user'),
(4, 'ebad', 'ebad@gmail.com', 'e123', 'user'),
(5, 'sana', 'sana@gmail.com', 's123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_type` (`category_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_type`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_type`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
