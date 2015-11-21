-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2015 at 04:36 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbvdo09`
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
  `mile_start` int(10) NOT NULL DEFAULT '0',
  `cus_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`registration`, `version`, `date_`, `mile_start`, `cus_id`) VALUES
('1111111', 'Accord', '2015-11-20', 0, 'kig@hotmai'),
('1กก', 'city', '2015-11-10', 0, 'surewat'),
('1กง2532', 'city', '2015-11-10', 0, 'admin'),
('1กง2533', 'city', '2015-07-20', 0, 'root'),
('AA77777', 'CR-Z', '2015-11-20', 0, 'kig-st@rmutsb.ac.th'),
('aaaaaaa', 'Accord', '2015-11-15', 0, 'its'),
('ABC1234', 'CR-Z', '2015-11-11', 0, 'kig'),
('ABCXXXX', 'Accord', '2015-11-20', 0, 'kig@hotmai'),
('sssssss', 'Accord', '2015-11-20', 0, 'kig@rmutsb');

-- --------------------------------------------------------

--
-- Table structure for table `checkcar`
--

CREATE TABLE `checkcar` (
  `check_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `registration` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date_` date NOT NULL,
  `mile_late` int(10) NOT NULL,
  `countday` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checkcar`
--

INSERT INTO `checkcar` (`check_id`, `registration`, `date_`, `mile_late`, `countday`) VALUES
(00064, '1กง2533', '2015-11-19', 60000, 0),
(00065, '1กง2533', '2015-11-27', 60000, 8),
(00066, '1กง2533', '2015-11-30', 50000, 2),
(00073, '1111111', '2015-11-20', 0, 3),
(00074, '1111111', '2015-11-23', 10000, 3),
(00075, '1111111', '2015-11-28', 50000, 2),
(00076, 'ABCXXXX', '2015-11-20', 0, 0),
(00077, 'sssssss', '2015-11-20', 0, 0),
(00078, 'AA77777', '2015-11-20', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสลูกค้า',
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
('admin', 'kig kosa', 'M', '0874012863', 'sas', '1/1/2015', '123456', ''),
('its', 'อังคาร  ไกรสินธุ์', 'M', '0874012863', 'asda', '2015-11-15', '123456', 'admin'),
('kig', 'นายพิสุทธิ์  โกสยะมาศ', 'M', '0874012863', '32 m7', '1995-04-19', '123456', 'admin'),
('kig-st@rmutsb.ac.th', 'พิสุทธิ์ โกสยะมาศ', 'M', '0874012863', '-', '1995-04-19', 'ๅ/-ภถุ', ''),
('kig@hotmai', 'kig', 'M', '0874012863', 'ss', '2015-11-19', '123456', ''),
('kig@rmutsb', '11111111111111111111111', 'M', '0874012863', '111111111111111111111111111111', '2015-11-13', '11111111111111111111', ''),
('root', 'surewat intharasuwan', 'F', '093029392', '21313', '3/2/2010', '123456', ''),
('sad', 'นายพิสุทธิ์  โกสยะมาศ', 'M', '0874012863', '32 m7', '1995-04-19', 'asdasds', ''),
('surewat', 'สุเรวัตร อินทรสุวรรณ์', 'M', '0923124124', '18/97 หมู่ 13 คลองหลวง ปทุมธานี', '8/4/1995', '123456789', 'admin'),
('surewat123', 'base kkkk', 'M', '0923124124', '22222', '09/2/1992', '123456', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัส',
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
  MODIFY `check_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
