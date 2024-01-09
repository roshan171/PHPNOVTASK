-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 09:51 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_man`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_management`
--

CREATE TABLE `product_management` (
  `id` int(11) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `images` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_management`
--

INSERT INTO `product_management` (`id`, `productname`, `status`, `color`, `images`) VALUES
(1, 'dog', 'option2', 'Red,Yellow', '4099.jpg'),
(2, 'cat', 'option2', 'Red,Orange', '7631.jpg'),
(3, 'roshan', 'option2', 'Red,Orange', '2488.jpg'),
(5, 'ankita', 'option1', 'Yellow,Orange', '1510.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_management`
--
ALTER TABLE `product_management`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_management`
--
ALTER TABLE `product_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
