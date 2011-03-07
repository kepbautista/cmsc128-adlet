-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2011 at 03:40 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cfnr_spe`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_list`
--

CREATE TABLE IF NOT EXISTS `students_list` (
  `StudentNumber` varchar(10) NOT NULL,
  `TableName` varchar(20) NOT NULL,
  PRIMARY KEY (`StudentNumber`),
  UNIQUE KEY `StudentNumber` (`StudentNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_list`
--


-- --------------------------------------------------------

--
-- Table structure for table `upcat_passers`
--

CREATE TABLE IF NOT EXISTS `upcat_passers` (
  `StudentNumber` varchar(10) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleInitial` varchar(5) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Region` varchar(10) NOT NULL,
  `GWA` float NOT NULL,
  PRIMARY KEY (`StudentNumber`),
  UNIQUE KEY `StudentNumber` (`StudentNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upcat_passers`
--


-- --------------------------------------------------------

--
-- Table structure for table `waitlist_students`
--

CREATE TABLE IF NOT EXISTS `waitlist_students` (
  `StudentNumber` varchar(10) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleInitial` varchar(5) NOT NULL,
  `Language` float NOT NULL,
  `Reading` float NOT NULL,
  `Mathematics` float NOT NULL,
  `Science` float NOT NULL,
  `UPG` float NOT NULL,
  `Gender` char(1) NOT NULL,
  `Region` varchar(10) NOT NULL,
  `GWA` float DEFAULT NULL,
  PRIMARY KEY (`StudentNumber`),
  UNIQUE KEY `StudentNumber` (`StudentNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waitlist_students`
--

