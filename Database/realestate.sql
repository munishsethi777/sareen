-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2018 at 10:10 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `seq` bigint(20) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `medium` varchar(100) NOT NULL,
  `plotnumber` varchar(25) DEFAULT NULL,
  `address1` varchar(500) NOT NULL,
  `address2` varchar(500) DEFAULT NULL,
  `landmark` varchar(500) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `propertyarea` int(11) DEFAULT NULL,
  `propertyunit` varchar(25) DEFAULT NULL,
  `dimensionlength` int(11) DEFAULT NULL,
  `dimensionbreadth` int(11) DEFAULT NULL,
  `facing` varchar(50) DEFAULT NULL,
  `referredby` varchar(100) DEFAULT NULL,
  `contactperson` varchar(100) NOT NULL,
  `contactmobile` varchar(50) NOT NULL,
  `contactaddress` varchar(500) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `expectedamount` bigint(20) DEFAULT NULL,
  `documentation` varchar(100) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `furnishing` varchar(50) DEFAULT NULL,
  `furnishingdetails` varchar(500) DEFAULT NULL,
  `stories` int(11) DEFAULT NULL,
  `constructionyears` int(11) DEFAULT NULL,
  `totalsellers` int(11) DEFAULT NULL,
  `propertynumbers` varchar(100) DEFAULT NULL,
  `acquired` varchar(100) DEFAULT NULL,
  `propertytype` varchar(100) NOT NULL,
  `totalrooms` int(11) DEFAULT NULL,
  `isrental` tinyint(4) DEFAULT NULL,
  `createdon` datetime NOT NULL,
  `lastmodifiedon` datetime NOT NULL,
  `isavailable` tinyint(4) NOT NULL,
  `floornumber` int(11) DEFAULT NULL,
  `specifications` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`seq`, `purpose`, `medium`, `plotnumber`, `address1`, `address2`, `landmark`, `city`, `propertyarea`, `propertyunit`, `dimensionlength`, `dimensionbreadth`, `facing`, `referredby`, `contactperson`, `contactmobile`, `contactaddress`, `rate`, `expectedamount`, `documentation`, `time`, `furnishing`, `furnishingdetails`, `stories`, `constructionyears`, `totalsellers`, `propertynumbers`, `acquired`, `propertytype`, `totalrooms`, `isrental`, `createdon`, `lastmodifiedon`, `isavailable`, `floornumber`, `specifications`) VALUES
(7, 'residential', 'direct', '111', 'addr', 'add2', 'Near Jandu Tower', 'Ludhiana', 500, NULL, 100, 200, 'east', 'baljeet', 'Munish', '111111', 'add', 50000, 2000, 'registry', 2, 'finished', 'test furnishing detail', 2, 3, 0, 'building', 'building', 'building', NULL, 1, '0000-00-00 00:00:00', '2018-03-20 16:11:56', 1, 2, 'test spec'),
(9, 'residential', 'Relative', 'test dd', 'add2', 'add2', 'fg', 'Ludhiana', 233, NULL, 3, 3, 'north', '34', 'a', '87879989', 'add', 12, 25, 'registry', 0, 'finished', '', 0, 0, 0, 'sco', 'building', 'sco', NULL, 0, '0000-00-00 00:00:00', '2018-03-20 16:12:52', 0, 0, ''),
(10, 'residential', 'relativIncharge', '110', 'adress1', 'adress2', 'Near Gill Road', 'Ludhiana', 200, NULL, 2, 3, 'north', 'bb', 'a', 'b', 'add', 0, 0, 'registry', 0, 'finished', '', 0, 0, 0, 'building', 'Self Purchased', 'godown', NULL, 0, '2018-03-19 16:26:09', '2018-03-19 16:26:09', 0, 0, NULL),
(11, 'residential', 'direct', '111', 'add', 'adf', 'd', 'ludhiana', 23, NULL, 3, 3, 'north', 'baljeet', '3', '3', '3', 344, 44, 'registry', 0, 'finished', '', 0, 0, 0, 'building', 'Self Purchased', 'bank', NULL, 0, '2018-03-19 16:27:11', '2018-03-19 16:27:11', 0, 0, NULL),
(12, 'residential', 'direct', '111', 'add', 'adf', 'd', 'ludhiana', 23, NULL, 3, 3, 'north', '3', '3', '3', '3', 344, 44, 'registry', 0, 'finished', '', 0, 0, 0, 'building', 'Self Purchased', 'sco', NULL, 0, '2018-03-19 16:27:17', '2018-03-19 16:27:17', 0, 0, NULL),
(13, 'commercial', 'Relative', '111', 'add', 'adf', 'd', 'ludhiana', 23, NULL, 3, 3, 'north', '3', '3', '3', '3', 344, 44, 'registry', 0, 'finished', '', 0, 0, 0, 'building', 'Self Purchased', 'mallShop', NULL, 0, '2018-03-19 16:27:27', '2018-03-19 16:27:27', 0, 0, NULL),
(14, 'commercial', 'Relative', '1113', 'adda', 'adf', 'd', 'ludhiana', 34, NULL, 3, 3, 'north', '3', '3', '3', '3', 344, 44, 'registry', 0, 'finished', '', 0, 0, 0, 'building', 'Self Purchased', 'parking', NULL, 0, '2018-03-19 16:27:39', '2018-03-19 16:27:39', 0, 0, NULL),
(15, 'commercial', 'Relative', '1113', 'adda', 'adf', 'd', 'ludhiana', 34, NULL, 3, 3, 'north', '3', '3', '3', '3', 344, 44, 'registry', 0, 'finished', '', 0, 0, 0, 'building', 'Self Purchased', 'parking', NULL, 0, '2018-03-19 16:27:43', '2018-03-19 16:27:43', 0, 0, NULL),
(16, 'commercial', 'Relative', '1113', 'adda', 'adf', 'd', 'ludhiana', 34, NULL, 3, 3, 'north', '3', '3', '3', '3', 344, 44, 'registry', 0, 'finished', '', 0, 0, 0, 'building', 'Ancestral', 'parking', NULL, 0, '2018-03-19 16:27:49', '2018-03-19 16:27:49', 0, 0, NULL),
(17, 'commercial', 'Relative', '1113', 'addas', 'adfd', 'd', 'ludhiana', 34, NULL, 3, 3, 'north', '3', '3', '3', '3', 344, 44, 'registry', 0, 'finished', '', 0, 0, 0, 'building', 'Ancestral', 'parking', NULL, 0, '2018-03-19 16:28:01', '2018-03-19 16:28:01', 0, 0, NULL),
(18, 'commercial', 'Relative', '1113', 'addas', 'adfd', 'd', 'ludhiana', 34, NULL, 3, 3, 'north', '3', '3', '3', '3', 344, 44, 'registry', 0, 'finished', 'dte', 0, 0, 0, 'building', 'Ancestral', 'parking', NULL, 0, '2018-03-19 16:28:05', '2018-03-19 16:28:05', 0, 0, NULL),
(19, 'commercial', 'Relative', '1113', 'addas', 'adfd', 'd', 'ludhiana', 34, NULL, 3, 3, 'north', '3', '3', '3', '3', 344, 44, 'registry', 0, 'finished', 'dtedd', 0, 0, 0, 'building', 'Ancestral', 'parking', NULL, 0, '2018-03-19 16:28:08', '2018-03-19 16:28:08', 0, 0, NULL),
(20, 'commercial', 'Relative', '1113s', 'addas', 'adfd', 'd', 'ludhiana', 34, NULL, 3, 3, 'north', '3', '3', '3', '3', 344, 44, 'registry', 0, 'finished', 'dtedd', 0, 0, 0, 'building', 'Ancestral', 'plot', NULL, 0, '2018-03-19 16:28:14', '2018-03-19 16:28:14', 0, 0, NULL),
(22, 'industrial', 'direct', '1113 C', 'addas', 'adfd', 'd', 'ludhiana', 34, NULL, 3, 3, 'north', '3', '3', '3', '3', 344, 44, 'registry', 0, 'finished', 'dtedd', 0, 0, 0, 'building', 'Ancestral', 'floor', NULL, 0, '2018-03-19 16:28:59', '2018-03-19 16:28:59', 0, 0, NULL),
(23, 'industrial', 'direct', '1112 C', 'addas', 'adfd', 'd', 'ludhiana', 34, NULL, 3, 3, 'north', '3', '3', '3', '3', 344, 44, 'registry', 0, 'finished', 'dtedd', 0, 0, 0, 'building', 'Ancestral', 'bank', NULL, 0, '2018-03-19 16:29:14', '2018-03-19 16:29:14', 0, 0, NULL),
(24, 'commercial', 'direct', '112', 'add', 'add 2', 'NN', 'Ludhiana', 100, NULL, 1, 2, 'north', 'M Singh', 'R Singh', '435445354', 'add', 5, 200, 'registry', 2, 'finished', 'tsasd', 0, 0, 0, 'building', 'building', 'building', NULL, 1, '2018-03-20 16:22:18', '2018-03-20 16:22:18', 1, 0, ''),
(25, 'residential', 'direct', '11234', 'ss', 'ss', 'Near Gill Road', 'LDH', 1, NULL, 1, 2, 'north', 'f', 'f', '232323', 'ad', 500, 0, 'registry', 0, 'finished', 'at', 0, 0, 0, 'building', 'building', 'building', NULL, 0, '2018-03-20 16:23:12', '2018-03-20 16:23:12', 1, 0, ''),
(26, 'residential', 'direct', 'tes', 'dd', 'dd', 'dd', 'Ludhiana', 0, NULL, 0, 0, 'north', '', 'n', '424', '434', 23, 3, 'registry', 2, 'finished', 'dd', 0, 0, 0, 'building', 'building', 'building', NULL, 0, '2018-03-20 16:23:46', '2018-03-20 16:23:46', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`seq`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `seq` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
