-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 03:14 AM
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
-- Database: `quantumbyte`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `province` varchar(100) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `card_expiry_month` varchar(11) NOT NULL,
  `card_expiry_year` int(11) NOT NULL,
  `tax_amount` decimal(10,2) DEFAULT 0.00,
  `total_amount` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `email`, `phone`, `name`, `address`, `city`, `postcode`, `province`, `card_number`, `card_expiry_month`, `card_expiry_year`, `tax_amount`, `total_amount`) VALUES
(49, 'cherryl@gmail.com', '111-111-1111', 'Cherryl Patel', '547 Belmont Ave', 'Kitchener', 'N2G 5S3', 'ON', '2121-9949-9949-9499', 'JAN', 2025, 14.69, 127.69),
(50, 'herry@gmail.com', '111-101-1010', 'Herry', 'King Street', 'Waterloo', 'N2G 5S3', 'BFL', '2121-9949-9949-1000', 'NOV', 2026, 0.60, 4.60),
(55, 'hp@gmail.com', '111-101-1010', 'Harsh patel', 'Longwood Dr', 'Waterloo', 'N2G 5S3', 'ON', '2121-9949-9949-9499', 'JAN', 2025, 1.17, 10.17),
(57, 'cp@gmail.com', '111-111-1111', 'Cherryl', 'king street', 'Kitchener', 'N2G 5S3', 'ON', '2121-9949-9949-9499', 'JAN', 2025, 14.17, 123.17);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_product_id`, `order_id`, `product_name`, `price`, `quantity`, `total`) VALUES
(57, 49, 'Laptop', 100.00, 1, 100.00),
(58, 49, 'Keyboard', 5.00, 1, 5.00),
(59, 49, 'Mouse', 4.00, 1, 4.00),
(60, 49, 'Headphone', 4.00, 1, 4.00),
(61, 50, 'Headphone', 4.00, 1, 4.00),
(66, 55, 'Keyboard', 5.00, 1, 5.00),
(67, 55, 'Mouse', 4.00, 1, 4.00),
(72, 57, 'Laptop', 100.00, 1, 100.00),
(73, 57, 'Keyboard', 5.00, 1, 5.00),
(74, 57, 'Mouse', 4.00, 1, 4.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'cherryl', '000', 'manager'),
(22, 'adam', '000', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
