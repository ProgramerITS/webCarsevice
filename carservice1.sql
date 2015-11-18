-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2015 at 04:20 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `Anticipate`
--

CREATE TABLE IF NOT EXISTS `Anticipate` (
  `anticipate_id` int(8) NOT NULL,
  `date_anti` date NOT NULL,
  `ex_future` int(10) NOT NULL,
  `check_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `maintain_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Anticipate`
--

INSERT INTO `Anticipate` (`anticipate_id`, `date_anti`, `ex_future`, `check_id`, `maintain_id`) VALUES
(1, '0000-00-00', 0, '00001', '');

-- --------------------------------------------------------

--
-- Table structure for table `Car`
--

CREATE TABLE IF NOT EXISTS `Car` (
  `registration` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_` date NOT NULL,
  `mile_start` int(10) NOT NULL,
  `cus_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Car`
--

INSERT INTO `Car` (`registration`, `version`, `date_`, `mile_start`, `cus_id`) VALUES
('1กก', 'city', '2015-11-10', 0, 'surewat'),
('1กง2533', 'city', '2015-07-20', 0, 'root');

-- --------------------------------------------------------

--
-- Table structure for table `checkcar`
--

CREATE TABLE IF NOT EXISTS `checkcar` (
  `check_id` int(5) unsigned zerofill NOT NULL,
  `registration` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date_` date NOT NULL,
  `mile_late` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checkcar`
--

INSERT INTO `checkcar` (`check_id`, `registration`, `date_`, `mile_late`) VALUES
(00039, '1กง2533', '2015-11-09', 10000),
(00040, '1กง2533', '2015-11-10', 20000),
(00041, '1กง2533', '2015-11-27', 30000),
(00042, '1กง2533', '2015-11-30', 50000),
(00043, '1กก', '2015-11-09', 10000),
(00044, '1กก', '2015-11-27', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `cus_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสลูกค้า',
  `cus_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อลูกค้า',
  `sex` varchar(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เพศ F= หญิง M=ชาย',
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เบอร์โทร',
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ที่อยู่',
  `birthday` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`cus_id`, `cus_name`, `sex`, `tel`, `address`, `birthday`, `password`) VALUES
('root', 'surewat intharasuwan', 'F', '093029392', '21313', '3/2/2010', '123456'),
('surewat', 'สุเรวัตร อินทรสุวรรณ์', 'M', '0923124124', '18/97 หมู่ 13 คลองหลวง ปทุมธานี', '8/4/1995', '123456789'),
('surewat123', 'ssss sss', 'M', '0923124124', '22222', '09/2/1992', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
  `emp_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัส',
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
-- Table structure for table `Maintain`
--

CREATE TABLE IF NOT EXISTS `Maintain` (
  `maintain_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `wage` int(6) NOT NULL,
  `expenses` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Anticipate`
--
ALTER TABLE `Anticipate`
  ADD PRIMARY KEY (`anticipate_id`);

--
-- Indexes for table `Car`
--
ALTER TABLE `Car`
  ADD PRIMARY KEY (`registration`);

--
-- Indexes for table `checkcar`
--
ALTER TABLE `checkcar`
  ADD PRIMARY KEY (`check_id`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `Maintain`
--
ALTER TABLE `Maintain`
  ADD PRIMARY KEY (`maintain_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Anticipate`
--
ALTER TABLE `Anticipate`
  MODIFY `anticipate_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `checkcar`
--
ALTER TABLE `checkcar`
  MODIFY `check_id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
