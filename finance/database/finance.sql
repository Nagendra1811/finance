-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2018 at 01:11 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customerid` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `fhname` varchar(30) NOT NULL,
  `hno` varchar(5) NOT NULL,
  `location` varchar(20) NOT NULL,
  `post` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `alternate` varchar(12) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `proof` varchar(15) NOT NULL,
  `idproof` mediumblob NOT NULL,
  `photo` mediumblob NOT NULL,
  `dreg` date NOT NULL,
  `idnum` varchar(15) NOT NULL,
  PRIMARY KEY (`customerid`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `customer`
--


-- --------------------------------------------------------

--
-- Table structure for table `docmap`
--

CREATE TABLE IF NOT EXISTS `docmap` (
  `docid` int(15) NOT NULL AUTO_INCREMENT,
  `custid` int(15) NOT NULL,
  `totcount` int(3) NOT NULL,
  `totgrosswt` decimal(6,4) NOT NULL,
  `totstonewt` decimal(5,4) NOT NULL,
  `totnetwt` varchar(15) NOT NULL,
  `remarkstot` varchar(30) NOT NULL,
  `scheme` varchar(2) NOT NULL,
  `goldrate` varchar(5) NOT NULL,
  `totamt` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `duration` varchar(10) NOT NULL,
  `interest` varchar(8) NOT NULL,
  `loanamt` varchar(15) NOT NULL,
  `remarksloan` varchar(30) NOT NULL,
  `bal` varchar(15) NOT NULL,
  `baldate` date NOT NULL,
  PRIMARY KEY (`docid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `docmap`
--


-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `documentid` int(15) NOT NULL,
  `item` varchar(20) NOT NULL,
  `count` int(3) NOT NULL,
  `stoned` tinyint(1) NOT NULL DEFAULT '0',
  `purity` varchar(20) NOT NULL,
  `grosswt` decimal(5,4) NOT NULL,
  `stonewt` decimal(5,4) NOT NULL,
  `netwt` varchar(15) NOT NULL,
  `remarks` varchar(30) NOT NULL,
  `netwtdeducted` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('Nagendra', 'nag');

-- --------------------------------------------------------

--
-- Table structure for table `open`
--

CREATE TABLE IF NOT EXISTS `open` (
  `oca` varchar(10) NOT NULL,
  `oba` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `open`
--

INSERT INTO `open` (`oca`, `oba`) VALUES
('200000', '125000');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `slno` int(2) NOT NULL AUTO_INCREMENT,
  `ca` varchar(15) NOT NULL,
  `gl` varchar(15) NOT NULL,
  `mt` varchar(15) NOT NULL,
  `insurence` varchar(15) NOT NULL,
  `pan` varchar(15) NOT NULL,
  `pig` varchar(15) NOT NULL,
  `bil` varchar(15) NOT NULL,
  `exp` varchar(15) NOT NULL,
  `interest` varchar(15) NOT NULL,
  `glc` varchar(15) NOT NULL,
  `ba` varchar(15) NOT NULL,
  `re` varchar(15) NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`slno`, `ca`, `gl`, `mt`, `insurence`, `pan`, `pig`, `bil`, `exp`, `interest`, `glc`, `ba`, `re`) VALUES
(1, '200847', '2973', '3000', '600', '220', '300', '200', '0', '0.1932345679012', '0', '125000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `scheme`
--

CREATE TABLE IF NOT EXISTS `scheme` (
  `name` varchar(2) NOT NULL,
  `amount` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheme`
--

INSERT INTO `scheme` (`name`, `amount`) VALUES
('SR', '2000'),
('PO', '1500'),
('MB', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `statement`
--

CREATE TABLE IF NOT EXISTS `statement` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `particular` varchar(23) NOT NULL,
  `debit` varchar(10) NOT NULL,
  `credit` varchar(10) NOT NULL,
  `balance` varchar(10) NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `statement`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
