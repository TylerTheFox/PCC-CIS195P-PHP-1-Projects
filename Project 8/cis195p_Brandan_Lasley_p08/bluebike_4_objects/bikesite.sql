-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2014 at 01:34 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bikesite`
--

-- --------------------------------------------------------

--
-- Table structure for table `bike`
--

CREATE TABLE IF NOT EXISTS `bike` (
  `ID` int(11) NOT NULL,
  `bikemaker` int(11) NOT NULL,
  `Bike` text NOT NULL,
  `model` text NOT NULL,
  `model_year` text NOT NULL,
  `size` int(4) NOT NULL,
  `type` text NOT NULL,
  `rate` int(5) NOT NULL,
  `quanity` int(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bike`
--

INSERT INTO `bike` (`ID`, `bikemaker`, `Bike`, `model`, `model_year`, `size`, `type`, `rate`, `quanity`) VALUES
(1, 1, 'Fozel', 'A', '2090', 10, 'Medium', 8, 4),
(2, 2, 'Populse', 'B', '2015', 20, 'Street Bike', 5, 2),
(3, 3, 'BranBike', 'C', '2020', 12, 'Helicopter Bike', 22, 1),
(4, 4, 'BranCycle', 'D', '3000', 2, 'Space Cycle ', 900, 2),
(5, 1, 'Rosta', 'E', '2390', 40, 'Bike', 5, 3),
(6, 2, 'Paper', 'F', '1020', 10, 'Paper Type', 20, 6),
(7, 3, 'Onion', 'G', '0001', 1, 'Its an onion', 1, 1),
(8, 4, 'Normandy', 'H', '2148', 900000, 'SR1', 90000, 1),
(9, 1, 'table', 'I', '2930', 1, 'SQL', 7, 8),
(10, 2, 'Apple', 'J', '1010', 4, 'Banana', 5, 2),
(11, 3, 'Boo', 'K', '9201', 7, 'Bahh', 9, 2),
(12, 4, 'Potato', 'L', '1290', 54, 'Large', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bikemaker`
--

CREATE TABLE IF NOT EXISTS `bikemaker` (
  `bikemaker` int(11) NOT NULL,
  `Manufacturer` text NOT NULL,
  PRIMARY KEY (`bikemaker`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bikemaker`
--

INSERT INTO `bikemaker` (`bikemaker`, `Manufacturer`) VALUES
(1, 'beta'),
(2, 'gamma'),
(3, 'delta'),
(4, 'charlie'),
(5, 'alpa');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `pk_CustomerID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL,
  `name` varchar(128) NOT NULL,
  `male` tinyint(1) NOT NULL,
  `iagree` tinyint(1) NOT NULL,
  `login` varchar(12) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`pk_CustomerID`),
  UNIQUE KEY `login` (`login`),
  KEY `pk_CustomerID` (`pk_CustomerID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`pk_CustomerID`, `email`, `name`, `male`, `iagree`, `login`, `password`) VALUES
(6, 'admin@brandanlasley.com', 'Brandan Tyler Lasley', 1, 0, 'brandanl', '664f1cd64d122686304bf41d11f3ccf6'),
(5, 'gt@foo.com', 'Georg Philipp Telemann', 1, 0, 'gptelemann', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'js@foo.com', 'Johann Sebastian Bach', 1, 0, 'jsbach', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'bcollins@foo.com', 'Bootsy Collins', 0, 0, 'bcollins', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'chadyn@foo.com', 'Charlie Hayden', 1, 1, 'chayden', '5f4dcc3b5aa765d61d8327deb882cf99'),
(1, 'lcohen@foo.com', 'Leonard Cohen', 1, 1, 'lcohen', '5f4dcc3b5aa765d61d8327deb882cf99');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
