-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2022 at 09:31 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hallmark`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_transection`
--

CREATE TABLE `tbl_customer_transection` (
  `id` int(11) NOT NULL,
  `fk_ledger_id` int(10) NOT NULL,
  `type` char(1) COLLATE utf8_bin NOT NULL COMMENT '''C''=Credit ''D''=Debit',
  `remarks` text COLLATE utf8_bin DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `created_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `remarks` text COLLATE utf8_bin DEFAULT NULL,
  `created_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ledger`
--

CREATE TABLE `tbl_ledger` (
  `id` int(11) NOT NULL,
  `jewellers_name` varchar(70) COLLATE utf8_bin NOT NULL,
  `propriter_name` varchar(70) COLLATE utf8_bin NOT NULL,
  `ph_no` varchar(15) COLLATE utf8_bin NOT NULL,
  `lc_no` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `gst_no` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `address` text COLLATE utf8_bin NOT NULL,
  `logo` varchar(15) COLLATE utf8_bin NOT NULL,
  `hallmarking_rate_h` decimal(10,2) NOT NULL,
  `hallmarking_rate_h_more` decimal(10,2) NOT NULL,
  `hallmarking_rate_o` decimal(10,2) NOT NULL,
  `card_rate` decimal(10,2) NOT NULL,
  `photo_rate` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `updated_balance_time` datetime DEFAULT current_timestamp(),
  `is_active` char(1) COLLATE utf8_bin NOT NULL COMMENT 'A=''active'',I=''inactive''',
  `is_delete` char(1) COLLATE utf8_bin NOT NULL COMMENT 'Y=''delete'',N=''notdelete''',
  `created_date_time` datetime NOT NULL,
  `updated_date_time` datetime DEFAULT NULL,
  `last_transaction_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_ledger`
--

INSERT INTO `tbl_ledger` (`id`, `jewellers_name`, `propriter_name`, `ph_no`, `lc_no`, `gst_no`, `address`, `logo`, `hallmarking_rate_h`, `hallmarking_rate_h_more`, `hallmarking_rate_o`, `card_rate`, `photo_rate`, `balance`, `updated_balance_time`, `is_active`, `is_delete`, `created_date_time`, `updated_date_time`, `last_transaction_time`) VALUES
(1, 'RAMKRISHNA  JEWELLERS', 'SUMAN BEJ', '1234567890', '', '', 'CHANDIPUR', 'R J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'Y', '2022-03-17 22:04:01', '0000-00-00 00:00:00', '2022-03-17 22:42:17'),
(2, 'Mallick jewellers', 'Goutam mallick', '1234567892', '', '', 'Chandipur', 'M J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'Y', '2022-03-19 12:32:40', '2022-03-19 12:32:55', '2022-03-19 13:07:55'),
(3, 'Ramkrishna jewellers', 'Suman bej', '3214569870', '', '', 'Chandipur', 'R J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'Y', '2022-03-19 12:34:37', '0000-00-00 00:00:00', '2022-03-19 13:12:42'),
(4, 'AMRETA JEWELLERY WORKS', 'JANINA', '9876543210', '', '', 'NANDIGRAM', 'ARS+', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'Y', '2022-03-19 12:59:46', '2022-03-19 12:59:56', '2022-03-19 12:59:46'),
(5, 'ANUKUL JEWELLERS', 'ARUP DAS', '9647354389', '', '', 'SUTAHATA', 'A J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-19 17:59:56', '0000-00-00 00:00:00', '2022-03-21 20:32:37'),
(6, 'ARATI JEWELLERS', 'TUSHAR DAS', '8768647671', '', '', 'NETAJINAGAR', 'A J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-19 18:01:09', '0000-00-00 00:00:00', '2022-03-22 16:19:52'),
(7, 'ARATI JEWELLERS', 'MOYNA', '9932657674', '', '', 'SUJOY DA', 'A J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-19 18:02:19', '2022-03-25 18:23:41', '2022-03-19 18:02:19'),
(8, 'MONI KANCHAN JEWELLERS', 'SOLIL JANA', '9932948799', '', '', 'MOYNA', 'M K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 14:54:26', '0000-00-00 00:00:00', '2022-03-21 14:54:26'),
(9, 'MATREE JEWELLERS', 'SANTOSH KAMILA', '6295921560', '', '', 'BAZKUL', 'M J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 14:56:44', '0000-00-00 00:00:00', '2022-03-21 14:56:44'),
(10, 'MALLIK JEWELLERS', 'MANOJ   MALLIK', '9732979523', '', '', 'CHANDIPUR\r\nPURBA MEDINIPUR', 'M J', '120.00', '30.00', '30.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 14:58:55', '0000-00-00 00:00:00', '2022-03-27 16:46:54'),
(11, 'MAKALI JEWELLERS', 'SUBHANKAR KARMAKAR', '8670586130', '', '', 'BHIMESWARI', 'M K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:04:30', '0000-00-00 00:00:00', '2022-03-21 15:04:30'),
(12, 'MAKALI JEWELLERS', 'SAMIR HAIT', '4444444444', '', '', 'MOYNA', 'M K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:05:53', '0000-00-00 00:00:00', '2022-03-21 15:05:53'),
(13, 'MAJI JEWELLERS', 'ASISH MAJI', '9679293602', '', '', 'CHANDIPUR', 'M J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:07:43', '0000-00-00 00:00:00', '2022-03-21 15:07:43'),
(14, 'MAITY JEWELLERS', 'AMAL KUMAR  MAITY', '8670155792', '', '', 'CHANDIPUR', 'M J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:10:22', '0000-00-00 00:00:00', '2022-03-21 15:10:22'),
(15, 'MAHALAXMI JEWELLERS', 'RANJIT JANA', '9932450718', '', '', 'KHONCHI \r\nPURBAMEDINIPUR', 'M L J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:11:23', '0000-00-00 00:00:00', '2022-03-21 15:11:23'),
(16, 'MAAKALI JEWELLERS', 'SUBHASH PATRA', '8967303416', '', '', 'HALDIA', 'M K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:12:36', '0000-00-00 00:00:00', '2022-03-21 15:12:36'),
(17, 'MAA SITA JEWELLERS', 'MAA SITA JEWELLERS', '9833966163', '', '', 'HANSCHARA', 'M S J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:13:49', '0000-00-00 00:00:00', '2022-03-21 15:13:49'),
(18, 'MAA SARASWATI JEWEELRS', 'TARUN  BERA', '7430874491', '', '', 'CHANDIPUR\r\nPURBA MEDINI PUR', 'M S J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:15:00', '0000-00-00 00:00:00', '2022-03-21 15:15:00'),
(19, 'MAA NACHINDA JEWELLERS', 'KALIPADA DA', '2578966163', '', '', 'BAJKUL', 'M N J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:17:42', '0000-00-00 00:00:00', '2022-03-21 15:17:42'),
(20, 'MAA LAXMI JEWELLERS', 'BISWAJIT MAJI', '9635013251', '', '', 'MOYNA', 'M L J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:23:57', '0000-00-00 00:00:00', '2022-03-21 15:23:57'),
(21, 'MAA JEWELLERS', 'TARAPADA SAMANTA', '9609123956', '', '', 'THEKUA', 'M J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:25:11', '0000-00-00 00:00:00', '2022-03-21 15:25:11'),
(22, 'MAA GOURI JEWELLERS', 'MAHADEV PRADHAN', '8918577213', '', '', 'GOALAPUKUR\r\nPURBAMEDINIPUR', 'M G J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:26:18', '0000-00-00 00:00:00', '2022-03-21 15:26:18'),
(23, 'MAA DURGA JEWELLRS', 'LAXMIKANTA MAITY', '9733781321', '', '', 'CHANDIPUR', 'M D J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:27:18', '0000-00-00 00:00:00', '2022-03-21 15:27:18'),
(24, 'MAA DAKSHINAKALI JEWELLERS', 'MIHIR RANA', '8768158848', '', '', 'MOYNA \r\nEAST MEDINIPUR', 'M D K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:28:27', '0000-00-00 00:00:00', '2022-03-21 15:28:27'),
(25, 'MAA BINDUBASINI JEWELLERS', 'UTTAM PRAMANIK', '7407949776', '', '', 'NONAKURI,   KAKTIYA  \r\nPURBAMEDINIPUR', 'M B J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:29:28', '0000-00-00 00:00:00', '2022-03-21 15:29:28'),
(26, 'MAA BHAVANI JEWELLERS', 'BHAVANI', '9775206789', '', '', 'CHANDIPUR', 'M B J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:30:26', '0000-00-00 00:00:00', '2022-03-21 15:30:26'),
(27, 'MAA BHARGABHIMA JEWELLERS', 'GOUTAM GHOSH', '7703980106', '', '', 'DIMARI', 'M B J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:31:19', '0000-00-00 00:00:00', '2022-03-21 15:31:19'),
(28, 'MAA BARGABHIMA JEWELLERS', 'KAMAL BERA', '9732909504', '', '', 'KALIKAKHALI,  CHANDIPUR\r\nPURBA MEDINIPUR', 'M B J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:32:34', '0000-00-00 00:00:00', '2022-03-21 15:32:34'),
(29, 'MA MANGALCHANDI JEWELLERS', 'ARJUN MANNA', '9734336692', '', '', 'KOLSAR', 'M M J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:33:41', '0000-00-00 00:00:00', '2022-03-21 15:33:41'),
(30, 'M C B JEWELLERS', 'SIBNATH PATRA', '9874967426', '', '', 'HORIDASPUR', 'M C B J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:34:38', '0000-00-00 00:00:00', '2022-03-21 15:34:38'),
(31, 'LOKNATH JEWELLERS', 'SARAT HAIT', '9932048116', '', '', 'KOLSAR\r\nPURBAMEDINIPUR', 'L J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:35:42', '0000-00-00 00:00:00', '2022-03-21 15:35:42'),
(32, 'LAXMI JEWELLERS', 'SHUBHAS SAMANTA', '6295176972', '', '', 'NETAJINAGAR,    TAMLUK\r\n PURBAMEDINIPUR', 'L J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:36:33', '0000-00-00 00:00:00', '2022-03-21 15:36:33'),
(33, 'KRISNAKALI JEWELLERS', 'DHARMARAJ PRADHAN', '8001970414', '', '', 'CHOUKHALI\r\nPURBAMEDINIPUR', 'K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'Y', '2022-03-21 15:37:42', '0000-00-00 00:00:00', '2022-03-21 15:37:42'),
(34, 'KOLE JEWELLERS', 'DILIP', '9064952600', '', '', 'TAMLUK', 'K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:38:45', '0000-00-00 00:00:00', '2022-03-21 15:38:45'),
(35, 'KOLE JEWELLERS', 'ASHIS  KOLE', '9932847979', '', '', 'TAMLUK', 'K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:39:37', '0000-00-00 00:00:00', '2022-03-21 15:39:37'),
(36, 'KARMAKAR JEWELLERS', 'KARMAKAR', '4561237890', '', '', 'CHANDIPUR', 'K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:40:28', '0000-00-00 00:00:00', '2022-03-21 15:40:28'),
(37, 'KANCHAN JEWELLERS', 'KANCHAN DA', '9932905094', '', '', 'SONAKHALI', 'K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:41:20', '0000-00-00 00:00:00', '2022-03-21 15:41:20'),
(38, 'JOYTI JEWELLERS', 'GOUR DAS', '7797989048', '', '', 'CHANDIPUR    \r\nPURBA MEDINIPUR', 'J J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:42:11', '0000-00-00 00:00:00', '2022-03-21 15:42:11'),
(39, 'JOYGURU JEWELLERS', 'PRADIP GANTAIT', '9800955495', '', '', 'AMRITBERIA', 'J J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:45:30', '0000-00-00 00:00:00', '2022-03-21 15:45:30'),
(40, 'JOYGURU JEWELLERS', 'GURUPADA DHARA', '9732973552', '', '', 'MOYNA\r\nPURBAMEDINIPUR', 'J J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:46:22', '0000-00-00 00:00:00', '2022-03-21 15:46:22'),
(41, 'JANA GINI BHAVAN', 'SOUMEN JANA', '9609133207', '', '', 'BHOGPUR', 'J G B', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:47:18', '0000-00-00 00:00:00', '2022-03-21 15:47:18'),
(42, 'J P JEWELLERS', 'Prasanta sahoo', '8919261290', '', '', 'CHANDIPUR', 'J P J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 15:48:07', '0000-00-00 00:00:00', '2022-03-21 15:48:07'),
(43, 'J K JEWELLERS', 'BISWAJIT DAS', '9732893058', '', '', 'NONAKURI,  KAKTIYA\r\nPURBA MEDINIPUR', 'J K', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:14:40', '0000-00-00 00:00:00', '2022-03-22 11:30:34'),
(44, 'HIMALOYA JEWELLERY', 'JAGABONDHU', '9933749332', '', '', 'MOYNA', 'H J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:15:52', '0000-00-00 00:00:00', '2022-03-21 16:15:52'),
(45, 'GOURANGA JEWELLERS', 'MANATOS SAHOO', '9800373182', '', '', 'CHANDIPUR', 'G J', '120.00', '30.00', '30.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:16:40', '0000-00-00 00:00:00', '2022-03-26 18:34:07'),
(46, 'GITA JEWELLERS', 'JAYONTA SAMANTA', '6296818283', '', '', 'BAHARPOTA', 'G J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:17:30', '0000-00-00 00:00:00', '2022-03-21 16:17:30'),
(47, 'GITA JEWELLERS', 'SUBHENDU KUMAR MAITY', '8145395827', '', '', 'NARGHAT', 'G J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:18:37', '0000-00-00 00:00:00', '2022-03-21 16:18:37'),
(48, 'FENCY JEWELLERS', 'BHOLANATH GUCHAIT', '9732587549', '', '', 'KALIKAKHALI,  CHANDIPUR\r\nPURBA MEDINIPUR', 'F J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:19:33', '0000-00-00 00:00:00', '2022-03-21 16:19:33'),
(49, 'DAS JEWELLRY PALACE', 'BIKAS DAS', '8348401255', '', '', 'CHANDIPUR', 'D J P', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:20:32', '2022-03-27 11:09:51', '2022-03-21 16:20:32'),
(50, 'CHANDAN JEWELLERS', 'CHANDAN KAMILA', '9733991526', '', '', 'BANSGORA BAZAR', 'C J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:21:35', '0000-00-00 00:00:00', '2022-03-21 16:21:35'),
(51, 'CHANCHALA JEWELLRS', 'JAGANNATH  RANA', '9647209412', '', '', 'ARGOAL\r\nPURBA MEDINIPUR', 'C J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:22:35', '0000-00-00 00:00:00', '2022-03-21 16:22:35'),
(52, 'BISWAKARMA JEWELLERS', 'LALTU KAMILA', '9933538445', '', '', 'CHANDIPUR', 'B J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:23:24', '0000-00-00 00:00:00', '2022-03-21 16:23:24'),
(53, 'BISWAKARMA JEWELLERS', 'NANDAN PATRA', '9734353867', '', '', 'ASNANBAZAR', 'B J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:24:09', '0000-00-00 00:00:00', '2022-03-22 18:51:10'),
(54, 'BIJOLI JEWELLERS', 'SANDIP MANNA', '8927310178', '', '', 'HORIDASPUR\r\nPURBAMEDINIPUR', 'B J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:25:42', '0000-00-00 00:00:00', '2022-03-21 16:25:42'),
(55, 'BARGABHIMA JEWELLERS', 'SATTYESWAR', '9679119627', '', '', 'DIMARI', 'B J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:26:25', '0000-00-00 00:00:00', '2022-03-21 16:26:25'),
(56, 'BARAMA JEMS & JEWELLERY', 'SUROJIT KARMAKAR', '8900021018', '', '', 'REYAPARA', 'B J J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:27:30', '0000-00-00 00:00:00', '2022-03-21 16:27:30'),
(57, 'B K JEWELLERY WORKS', 'KARTIK CH KAMILA', '9679467713', '', '', 'BIBHISHAN PUR', 'B K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:28:18', '0000-00-00 00:00:00', '2022-03-21 16:28:18'),
(58, 'ASHIRBAD JEWELLERS', 'MAHADEB JANA', '9733699749', '', '', 'MANUAKHALI', 'A J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-21 16:29:09', '0000-00-00 00:00:00', '2022-03-21 16:29:09'),
(59, 'ARATI JEWELLERS', 'SUJOY DA', '9972657674', '', '', 'MOYNA', 'A J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'Y', '2022-03-21 16:30:15', '0000-00-00 00:00:00', '2022-03-21 16:30:15'),
(60, 'RUPAM JEWELLERS', 'RUPAM', '9800542128', '', '', 'TAMLUK', 'R J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-22 15:29:48', '0000-00-00 00:00:00', '2022-03-22 15:29:48'),
(61, 'RUPAM JEWELLERS', 'UNKNOW', '1597533210', '', '', 'GOKULNAGAR', 'R J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-22 15:31:17', '0000-00-00 00:00:00', '2022-03-22 15:31:17'),
(62, 'MATRI JEWELLERS', 'UNKNOWN', '3214567890', '', '', 'PANSKURA', 'M J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-22 15:34:37', '0000-00-00 00:00:00', '2022-03-22 15:34:37'),
(63, 'MATRI JEWELLERS', 'ROGHUNATHBARI', '1593574560', '', '', 'ROGHUNATH BARI', 'M J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-22 15:36:10', '0000-00-00 00:00:00', '2022-03-22 15:36:10'),
(64, 'PARAMITA JEWELLERS', 'PORIMAL', '3579516540', '', '', 'MOYNA', 'P J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-22 15:48:02', '0000-00-00 00:00:00', '2022-03-22 15:48:02'),
(65, 'J DAS & SONS JEWELLERY', 'J DAS', '3698521470', '', '', 'PARBATIPUR   TAMLUK', 'J S J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-22 15:51:45', '0000-00-00 00:00:00', '2022-03-22 15:51:45'),
(66, 'RANU JEWELLERS', 'BULAN DA', '1234567891', '', '', 'TAMLUK', 'R J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-22 15:52:57', '0000-00-00 00:00:00', '2022-03-22 15:52:57'),
(67, 'NEW RANU JEWELLERS', 'BULAN DA', '1478529630', '', '', 'TAMLUK', 'R J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-22 15:54:37', '0000-00-00 00:00:00', '2022-03-22 15:54:37'),
(68, 'BULBUL', 'CHILAI BALA', '1478523691', '', '', 'TAMLUK', 'B L', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-22 15:56:25', '0000-00-00 00:00:00', '2022-03-22 15:56:25'),
(69, 'NAMITA JEWELLERS & BASONALOY', 'GOYALAPUKUR', '9632587410', '', '', 'GOYALAPUKUR  BHAGAVANPUR', 'N P J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-22 16:41:58', '0000-00-00 00:00:00', '2022-03-22 16:41:58'),
(70, 'JOYGURU JEWELLERS', 'TILKHOJA', '8521479630', '', '', 'TILKHOJA', 'J J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-22 16:44:14', '0000-00-00 00:00:00', '2022-03-22 16:44:14'),
(71, 'NAMITA JEWELLERS', 'CHANDIPUR', '7908895778', '', '', 'GUCHAIT', 'N J', '140.00', '35.00', '25.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 11:51:05', '0000-00-00 00:00:00', '2022-03-25 18:35:04'),
(72, 'RAMKRISHNA JEWELLERS', 'CHANDIPUR', '8926688244', '', '', 'SUMAN BEJ', 'R J', '164.00', '41.30', '25.00', '70.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 11:53:16', '0000-00-00 00:00:00', '2022-03-25 11:53:16'),
(73, 'NEW MAJEE JEWELLERS', 'CHANDIPUR', '9679293502', '', '', 'ASISH MAJEE', 'B P M', '236.00', '53.10', '45.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 12:04:24', '0000-00-00 00:00:00', '2022-03-25 12:04:24'),
(74, 'NEW STAR JEWELLERS', 'CHANDIPUR', '9593434589', '', '', 'JANINI', 'N S J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 12:05:52', '0000-00-00 00:00:00', '2022-03-25 12:05:52'),
(75, 'KRISHNA JEWELLERS', 'BACCHU RAKHIT', '9732955725', '', '', 'KALABERIA', 'K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 12:10:55', '2022-03-27 13:10:16', '2022-03-25 12:10:55'),
(76, 'NEW SRIGOPAL JEWELLERS', 'CHANDIPUR', '9735534267', '', '', 'SUSANTA KAMILA', 'N S G J', '236.00', '53.10', '25.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 12:13:08', '0000-00-00 00:00:00', '2022-03-26 19:01:29'),
(77, 'RAJU JEWELLERS', 'CHANDIPUR', '9434993496', '', '', 'RAJU SAHOO', 'R S', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 12:14:25', '0000-00-00 00:00:00', '2022-03-25 12:14:25'),
(78, 'MAA MANASA JEWELLERS', 'GOPINATHPUR', '9775259218', '', '', 'RADHAKANTA KARMAKAR', 'M M J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 12:58:39', '0000-00-00 00:00:00', '2022-03-25 12:58:39'),
(79, 'MOTHER GINI HOUSE', 'CHANDIPUR', '9474190378', '', '', 'NOTHING', 'M G H', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 13:38:55', '0000-00-00 00:00:00', '2022-03-25 13:38:55'),
(80, 'MAA LAXMI JEWELLERS', 'KULUP BAZAR', '9735504937', '', '', 'JANINI', 'S D', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 16:19:12', '0000-00-00 00:00:00', '2022-03-25 16:19:12'),
(81, 'PARBATI  JEWELLERS', 'KALIPADA KARMAKAR', '8637381599', '', '', 'NOTHING', 'P J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 16:58:15', '0000-00-00 00:00:00', '2022-03-25 16:58:15'),
(82, 'MATRI JEWELLERS', 'SANTOSH KAMILA', '9647177318', '', '', 'BAJKUL', 'M * J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 17:23:54', '0000-00-00 00:00:00', '2022-03-25 17:23:54'),
(83, 'KRISHNA KALI JEWELLERS', 'DHARMARAJ PRADHAN', '7679096980', '', '', 'BORAJ', 'K K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 17:37:27', '0000-00-00 00:00:00', '2022-03-27 15:55:20'),
(84, 'RADHA KRISHNA JEWELLERS', 'PRASHANTA KAMILA', '1111111111', '', '', 'HASCHARA', 'R K J P', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 18:05:18', '0000-00-00 00:00:00', '2022-03-25 18:05:18'),
(85, 'ARATI JEWELLERS', 'CHANDIPUR', '9732919044', '', '', 'SUBHASIS JANA', 'A J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 18:12:03', '0000-00-00 00:00:00', '2022-03-25 18:12:03'),
(86, 'NARAYANI TOUNCH CENTRE', 'OUR', '9732556171', '', '', 'CHANDIPUR', '0', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-25 18:58:39', '0000-00-00 00:00:00', '2022-03-25 18:58:39'),
(87, 'SANTANU JEWELLERS', 'CHANDIPUR', '9732982170', '', '', 'SANTANU MAITY', 'S J S', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-26 10:09:17', '0000-00-00 00:00:00', '2022-03-26 10:09:17'),
(88, 'SRI GOPAL JEWELLERS', 'PICHALDA', '9735648583', '', '', 'JADUPATI MAITY', 'S G J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-26 11:48:31', '0000-00-00 00:00:00', '2022-03-26 11:48:31'),
(89, 'SRI GOPAL JEWELLERS', 'KALABERIA', '9733363635', '', '', 'ANUP KUMAR DUTTA', 'S G J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-26 12:31:01', '0000-00-00 00:00:00', '2022-03-26 12:31:01'),
(90, 'SUDESHNA JEWELLERS', 'NANTU BERA', '9654331671', '', '', 'KULA PARA, CHOUKHALI BAZAR', 'S N J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-26 15:50:51', '2022-03-26 15:56:09', '2022-03-26 15:50:51'),
(91, 'SRI LAXMI JEWELLERS', 'JHANTU PATRA', '7047454673', '', '', 'GURGRAM', 'S L J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-26 16:05:02', '0000-00-00 00:00:00', '2022-03-26 16:05:02'),
(92, 'NEW RAJDHANI JEWELLERS', 'MANTU KARAN', '9564218153', '', '', 'CHANDIPUR', 'N R J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-26 17:26:46', '0000-00-00 00:00:00', '2022-03-26 17:26:46'),
(93, 'MAA SANDHYA JEWELLERS', 'AJAY KAMILA', '8840055670', '', '', 'NANDIGRAM', 'M S J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-26 17:30:04', '0000-00-00 00:00:00', '2022-03-26 17:30:04'),
(94, 'TILOTTAMA JEWELLERS', 'PRASHANTA KUMAR RANA', '9735225271', '', '', 'NANDIGRAM', 'T R P', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-26 18:16:14', '0000-00-00 00:00:00', '2022-03-26 18:16:14'),
(95, 'ASHIRBAD JEWELLERS', 'CHANDAN KAMLIYA', '9933427095', '', '', 'NANDIGRAM', 'A J C', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-26 18:54:33', '0000-00-00 00:00:00', '2022-03-26 18:54:33'),
(96, 'TARAMA JEWELLERS', 'SANJIB KARMAKAR', '9732741890', '', '', 'HANSCHORA', 'T M J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-26 19:32:55', '0000-00-00 00:00:00', '2022-03-26 19:32:55'),
(97, 'SRIMATI JEWELLERS', 'PORIMAL KAMILA', '7362955168', '', '', 'HANSCHORA', 'S M J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-26 19:34:04', '0000-00-00 00:00:00', '2022-03-26 19:34:04'),
(98, 'NEW SRI GOURANGA JEWELLERS', 'SOUMITRA GUCCHAIT', '9732546082', '', '', 'CHOUKHALI', 'N G J', '236.00', '41.30', '30.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-27 09:57:52', '0000-00-00 00:00:00', '2022-03-27 09:57:52'),
(99, 'NEW SRI GOURANGA JEWELLERS', 'SOUMITRA GUCCHAIT', '2222222222', '', '', 'BIJOY MAITY CHAK', 'N G J', '236.00', '41.30', '30.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-27 09:59:42', '0000-00-00 00:00:00', '2022-03-27 09:59:42'),
(100, 'MAA KALI JEWELLERS', 'RANAJIT KAMILA', '9932004571', '', '', 'NANDIGRAM/MAHESPUR', 'M K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-27 10:59:53', '0000-00-00 00:00:00', '2022-03-27 10:59:53'),
(101, 'NEW SAYAN JEWELLERS', 'NARAYAN DA', '8967321530', '', '', 'BOROJ', 'S N J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-27 11:10:45', '0000-00-00 00:00:00', '2022-03-27 11:10:45'),
(102, 'RADHAKRISHNA JEWELLERS', 'NABA KUMAR DAS', '9647003314', '', '', 'SASHIGANJ', 'R K J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-27 11:11:42', '0000-00-00 00:00:00', '2022-03-27 11:11:42'),
(103, 'MAA DURGA JEWELLERS', 'BHAKTA  DA', '3333333333', '', '', 'HARIKHALI', 'M D J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-27 13:04:54', '0000-00-00 00:00:00', '2022-03-27 13:18:21'),
(104, 'SUVANKARI JEWELLERS', 'GANESH GHORA', '8972395300', '', '', 'NIMTOURI', 'S V J', '236.00', '53.10', '40.00', '100.00', '50.00', '0.00', '2022-03-28 13:00:32', 'A', 'N', '2022-03-27 13:11:54', '0000-00-00 00:00:00', '2022-03-27 13:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `status` char(1) COLLATE utf8_bin NOT NULL COMMENT 'A=''active'',I=''inactive''',
  `last_login` datetime NOT NULL,
  `licence_key` varchar(50) COLLATE utf8_bin NOT NULL,
  `is_delete` char(1) COLLATE utf8_bin NOT NULL COMMENT 'Y=''delete'',N=''not delete'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_name`, `password`, `status`, `last_login`, `licence_key`, `is_delete`) VALUES
(1, 'received', 'QkBiNzY3NQ==', 'A', '2022-03-27 13:23:45', 'MjAyMi0xMC0wMQ==', 'N'),
(2, 'xrf', 'MTIzNDU=', 'A', '2022-03-27 16:15:36', 'MjAyMi0xMC0wMQ==', 'N'),
(3, 'lager', 'JC9EMzY4Ng==', 'A', '2022-03-27 10:07:33', 'MjAyMi0xMC0wMQ==', 'N'),
(4, 'owner', 'JG5hbEA1NQ==', 'A', '2022-03-28 12:57:14', 'MjAyMi0xMC0wMQ==', 'N'),
(5, 'manager', 'UyNHNzUyNw==', 'A', '2022-03-27 13:22:14', 'MjAyMi0xMC0wMQ==', 'N'),
(6, 'card', 'UCNHMjk2Ng==', 'A', '2022-03-27 16:55:19', 'MjAyMi0xMC0wMQ==', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_own_fund`
--

CREATE TABLE `tbl_own_fund` (
  `id` int(11) NOT NULL,
  `type` char(1) COLLATE utf8_bin NOT NULL COMMENT '''P''=Paid Amount, ''C''=Customer Fund',
  `amount` decimal(10,2) NOT NULL,
  `remarks` text COLLATE utf8_bin DEFAULT NULL,
  `updated_balance` decimal(10,2) NOT NULL,
  `created_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rate_update`
--

CREATE TABLE `tbl_rate_update` (
  `id` int(11) NOT NULL,
  `hallmarking_h` decimal(10,2) NOT NULL,
  `hallmarking_h_more` decimal(10,2) NOT NULL,
  `more_then` int(3) NOT NULL,
  `hallmarking_o` decimal(10,2) NOT NULL,
  `card` decimal(10,2) NOT NULL,
  `photo` decimal(10,2) NOT NULL,
  `created_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_rate_update`
--

INSERT INTO `tbl_rate_update` (`id`, `hallmarking_h`, `hallmarking_h_more`, `more_then`, `hallmarking_o`, `card`, `photo`, `created_date_time`) VALUES
(1, '0.00', '0.00', 0, '0.00', '0.00', '0.00', '2022-03-17 17:39:38'),
(2, '53.10', '236.00', 4, '40.00', '100.00', '50.00', '2022-03-17 18:39:16'),
(3, '236.00', '53.10', 4, '40.00', '100.00', '50.00', '2022-03-17 22:01:18'),
(4, '236.00', '53.10', 4, '40.00', '100.00', '50.00', '2022-03-25 11:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_received`
--

CREATE TABLE `tbl_received` (
  `id` int(11) NOT NULL,
  `fk_ledger_id` int(10) NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `token_no` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `xrf_man` char(1) COLLATE utf8_bin DEFAULT NULL COMMENT '''P''= Pass, ''F''=Fail',
  `lager_man` char(1) COLLATE utf8_bin DEFAULT NULL COMMENT '''Y''= Yes, ''N''= No',
  `total` decimal(10,2) DEFAULT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `hallmark_type` char(1) COLLATE utf8_bin DEFAULT NULL COMMENT '''H''/''O''',
  `hallmark_rate` decimal(10,2) DEFAULT NULL,
  `hallmark_weight` decimal(10,3) DEFAULT NULL,
  `hallmark_piece` int(10) DEFAULT NULL,
  `hallmark_amount` decimal(10,2) DEFAULT NULL,
  `card_rate` decimal(10,2) NOT NULL,
  `card_weight` decimal(10,3) DEFAULT NULL,
  `card_piece` int(10) DEFAULT NULL,
  `card_amount` decimal(10,2) DEFAULT NULL,
  `photo_rate` decimal(10,2) NOT NULL,
  `photo_weight` decimal(10,3) DEFAULT NULL,
  `photo_piece` int(10) DEFAULT NULL,
  `photo_amount` decimal(10,2) DEFAULT NULL,
  `received_time` datetime NOT NULL,
  `delivery_time` datetime DEFAULT NULL,
  `delivery_weight` decimal(10,3) DEFAULT NULL,
  `is_delete` char(1) COLLATE utf8_bin NOT NULL DEFAULT 'N' COMMENT '''Y''=yes, ''N''=no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_received_card`
--

CREATE TABLE `tbl_received_card` (
  `id` int(11) NOT NULL,
  `fk_received_id` int(11) NOT NULL,
  `weight` decimal(10,3) NOT NULL,
  `piece` int(5) NOT NULL,
  `remarks` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_received_hallmark`
--

CREATE TABLE `tbl_received_hallmark` (
  `id` int(11) NOT NULL,
  `fk_received_id` int(11) NOT NULL,
  `type` char(1) COLLATE utf8_bin NOT NULL COMMENT '''H''/''O''',
  `weight` decimal(10,3) NOT NULL,
  `piece` int(5) NOT NULL,
  `purity` decimal(10,2) NOT NULL,
  `remarks` text COLLATE utf8_bin DEFAULT NULL,
  `delivery_weight` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_received_photo`
--

CREATE TABLE `tbl_received_photo` (
  `id` int(11) NOT NULL,
  `fk_received_id` int(11) NOT NULL,
  `weight` decimal(10,3) NOT NULL,
  `piece` int(5) NOT NULL,
  `remarks` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `proprietor_name` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `address` text COLLATE utf8_bin DEFAULT NULL,
  `ph_no` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `billing_name` varchar(25) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`id`, `shop_name`, `proprietor_name`, `address`, `ph_no`, `email`, `billing_name`) VALUES
(1, 'SANATANI', '', '', '', '', 'S.H.C.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id` int(11) NOT NULL,
  `card` int(10) NOT NULL,
  `photo` int(10) NOT NULL,
  `rebons` int(10) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `customer_fund` decimal(10,2) NOT NULL,
  `xrf_checked` char(1) COLLATE utf8_bin NOT NULL DEFAULT 'A' COMMENT '''A''=Active, ''I''=Inactive',
  `updated_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `card`, `photo`, `rebons`, `paid_amount`, `customer_fund`, `xrf_checked`, `updated_date_time`) VALUES
(1, 0, 0, 0, '0.00', '0.00', 'A', '2022-03-28 13:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock_update`
--

CREATE TABLE `tbl_stock_update` (
  `id` int(11) NOT NULL,
  `type` char(1) COLLATE utf8_bin NOT NULL COMMENT '''I''=In, ''R''=Reject, ''S''=Sell',
  `fk_received_id` int(11) DEFAULT NULL COMMENT 'If type=''S''',
  `fk_ledger_id` int(11) DEFAULT NULL,
  `stock_type` char(1) COLLATE utf8_bin NOT NULL COMMENT '''C''=Card, ''P''=Photo, ''R''= Rebons',
  `piece` int(5) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer_transection`
--
ALTER TABLE `tbl_customer_transection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ledger`
--
ALTER TABLE `tbl_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_own_fund`
--
ALTER TABLE `tbl_own_fund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rate_update`
--
ALTER TABLE `tbl_rate_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_received`
--
ALTER TABLE `tbl_received`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_received_card`
--
ALTER TABLE `tbl_received_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_received_hallmark`
--
ALTER TABLE `tbl_received_hallmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_received_photo`
--
ALTER TABLE `tbl_received_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock_update`
--
ALTER TABLE `tbl_stock_update`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer_transection`
--
ALTER TABLE `tbl_customer_transection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ledger`
--
ALTER TABLE `tbl_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_own_fund`
--
ALTER TABLE `tbl_own_fund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rate_update`
--
ALTER TABLE `tbl_rate_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_received`
--
ALTER TABLE `tbl_received`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_received_card`
--
ALTER TABLE `tbl_received_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_received_hallmark`
--
ALTER TABLE `tbl_received_hallmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_received_photo`
--
ALTER TABLE `tbl_received_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_stock_update`
--
ALTER TABLE `tbl_stock_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
