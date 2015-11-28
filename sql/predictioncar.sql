-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2015 at 11:34 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `predictioncar`
--

-- --------------------------------------------------------

--
-- Table structure for table `anticipate`
--

CREATE TABLE `anticipate` (
  `anticipate_id` int(8) NOT NULL,
  `date_anti` date NOT NULL,
  `ex_future` int(10) NOT NULL,
  `check_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `maintain_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anticipate`
--

INSERT INTO `anticipate` (`anticipate_id`, `date_anti`, `ex_future`, `check_id`, `maintain_id`) VALUES
(1, '0000-00-00', 0, '00001', '');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `registration` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_` date NOT NULL,
  `cus_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`registration`, `version`, `date_`, `cus_id`) VALUES
('กก1111', 'Accord_Hybrid', '2015-11-27', 'Admin@Service.com'),
('กก11112', 'Accord', '2015-11-27', 'user01@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `checkcar`
--

CREATE TABLE `checkcar` (
  `check_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `registration` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `date_` date NOT NULL,
  `mile_late` int(10) NOT NULL,
  `countday` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checkcar`
--

INSERT INTO `checkcar` (`check_id`, `registration`, `date_`, `mile_late`, `countday`) VALUES
(00082, 'กก1111', '2015-11-27', 0, 0),
(00083, 'กก11112', '2015-11-27', 0, 0),
(00089, 'กก1111', '2016-02-02', 30000, 67),
(00093, 'กก11112', '2015-12-03', 10000, 6),
(00094, 'กก11112', '2015-12-10', 20000, 7),
(00095, 'กก11112', '2016-02-24', 30000, 76),
(00096, 'กก11112', '2016-03-03', 40000, 8),
(00097, 'กก11112', '2016-07-20', 50000, 138);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสลูกค้า',
  `cus_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อลูกค้า',
  `sex` varchar(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เพศ F= หญิง M=ชาย',
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เบอร์โทร',
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ที่อยู่',
  `birthday` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `sex`, `tel`, `address`, `birthday`, `password`, `permission`) VALUES
('Admin@Service.com', 'Administrator', 'M', '0999999999', 'มทรส หันตรา', '1995-08-03', '123456', 'admin'),
('user01@gmail.com', 'user01 นะจร๊', 'M', '0923232332', 'มทรส หันตรา', '2015-11-13', '12345', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัส',
  `emp_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `sex` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintain`
--

CREATE TABLE `maintain` (
  `maintain_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `wage` int(6) NOT NULL,
  `expenses` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anticipate`
--
ALTER TABLE `anticipate`
  ADD PRIMARY KEY (`anticipate_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`registration`);

--
-- Indexes for table `checkcar`
--
ALTER TABLE `checkcar`
  ADD PRIMARY KEY (`check_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `maintain`
--
ALTER TABLE `maintain`
  ADD PRIMARY KEY (`maintain_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anticipate`
--
ALTER TABLE `anticipate`
  MODIFY `anticipate_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `checkcar`
--
ALTER TABLE `checkcar`
  MODIFY `check_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
