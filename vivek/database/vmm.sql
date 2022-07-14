-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2019 at 04:38 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vmm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 for admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `status`) VALUES
(1, 'admin@gmail.com', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(10) NOT NULL,
  `state` int(1) NOT NULL,
  `district` varchar(100) COLLATE utf8_bin NOT NULL,
  `candidate_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `father_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `dob` date NOT NULL,
  `photo` varchar(150) COLLATE utf8_bin NOT NULL,
  `permanent_address` text COLLATE utf8_bin NOT NULL,
  `pin_code` int(6) NOT NULL,
  `office_address` text COLLATE utf8_bin NOT NULL,
  `mobile` int(10) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `aadhar` int(16) NOT NULL,
  `create_date` datetime NOT NULL,
  `application_no` int(15) NOT NULL,
  `verify_status` int(1) DEFAULT NULL COMMENT '1 = varified, 0 = rejected'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `state`, `district`, `candidate_name`, `father_name`, `dob`, `photo`, `permanent_address`, `pin_code`, `office_address`, `mobile`, `email`, `aadhar`, `create_date`, `application_no`, `verify_status`) VALUES
(1, 0, 'Paschim Medinipur', 'Santu Shee', 'Ajit Shee', '2019-10-01', '5735.jpg', 'Debra', 721126, 'Tamluk', 2147483647, 'santu@gmail.com', 123456789, '2019-01-22 18:21:12', 1000000000, 1),
(2, 0, 'North 24 Parganas', 'rrrrr', 'rrrrrrrrrrrrrrrrrrrr', '1996-07-12', '9925.png', 'rrrrrrrrrrrrrrrrrrr', 123654, 'rrrrrrrrrrrrrrrrrrr', 1230456987, 'prabhas@gmail.com', 7412586, '2019-01-22 19:04:17', 1000000001, NULL),
(3, 0, 'Nadia', 'Bapan Debnath', 'Swapan Debnath', '2018-05-12', '5654.jpg', 'vill- barsuklalchak', 721654, 'vill- barsuklalchak', 2147483647, 'prabhasdebnath1996@gmail.com', 1233654, '2019-01-22 19:06:04', 1000000002, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
