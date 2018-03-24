-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2018 at 03:43 PM
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
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `seq` int(11) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `propertytype` varchar(100) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `landmark` varchar(250) DEFAULT NULL,
  `propertyarea` int(11) DEFAULT NULL,
  `propertyunit` varchar(25) DEFAULT NULL,
  `dimensionlength` int(11) DEFAULT NULL,
  `dimensionbreadth` int(11) DEFAULT NULL,
  `facing` varchar(50) DEFAULT NULL,
  `referredby` varchar(100) DEFAULT NULL,
  `contactperson` varchar(100) NOT NULL,
  `contactaddress` varchar(500) DEFAULT NULL,
  `contactmobile` int(11) NOT NULL,
  `expectedamount` int(11) DEFAULT NULL,
  `totalrooms` int(11) DEFAULT NULL,
  `isrental` tinyint(4) NOT NULL,
  `lastmodifiedon` datetime NOT NULL,
  `createdon` datetime NOT NULL,
  `isfullfilled` tinyint(4) DEFAULT NULL,
  `specifications` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`seq`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `seq` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
