-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 09:55 AM
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
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `reg_id` int(11) NOT NULL,
  `reg_no` varchar(255) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `mname` varchar(40) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(355) DEFAULT NULL,
  `category` varchar(40) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sign` varchar(255) DEFAULT NULL,
  `pay_status` varchar(20) DEFAULT NULL,
  `course_fees` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`reg_id`, `reg_no`, `name`, `fname`, `mname`, `gender`, `dob`, `address`, `category`, `course`, `image`, `sign`, `pay_status`, `course_fees`, `email`, `mobile`) VALUES
(1, 'TS741699605134', 'Roshan', 'Ramesh', 'Reshama', 'Male', '2001-07-30', 'Mankhurd', 'General', 'PHP Programming', 'photo_1590301227.jpg', 'sign_1650965827.jpg', 'Paid', '6000', 'roshan@gmail.com', '8291392598'),
(2, 'TS871699605343', 'Rasika Dhawde', 'Ramesh', 'Reshama', 'Female', '1999-02-24', 'Mankhurd', 'General', 'Basic Computer', 'photo_1129142281.png', 'sign_1665265244.jpg', 'Paid', '6000', 'rasika@gmail.com', '8956475225'),
(3, 'TS271699605553', 'Sagar dhawde', 'Giridhar', 'Tara', 'Male', '1993-08-02', 'Kankavali', 'General', 'Basic Computer', 'photo_1711134717.png', 'sign_407527984.jpg', 'Paid', '6000', 'sagar@gmail.com', '9224659875');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
