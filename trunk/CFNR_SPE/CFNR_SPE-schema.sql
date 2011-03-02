-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2011 at 11:15 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `cfnr_spe`
--

-- --------------------------------------------------------

--
-- Table structure for table `2008-00196`
--

CREATE TABLE IF NOT EXISTS `2008-00196` (
  `CourseNumber` varchar(20) NOT NULL,
  `CourseTitle` varchar(100) NOT NULL,
  `Grade` varchar(4) NOT NULL,
  `Units` float NOT NULL,
  `Semester` varchar(30) NOT NULL,
  `SchoolYear` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2008-00196`
--

INSERT INTO `2008-00196` (`CourseNumber`, `CourseTitle`, `Grade`, `Units`, `Semester`, `SchoolYear`) VALUES
('MATH 17', 'College Algebra And Trigonometry', '2', 5, '1st', '2008-2009'),
('HIST 1', 'Philippine History', '1.25', 3, '1st', '2008-2009'),
('ECON 10', 'Economics In Social Issues', '2', 3, '1st', '2008-2009'),
('ENG 2', 'College Writing', '1.75', 3, '1st', '2008-2009'),
('IT 1', 'Information Technology Literacy', '2', 3, '1st', '2008-2009'),
('PE 1', 'Fundamentals Of Physical Fitness', '1.75', 2, '1st', '2008-2009'),
('LTS 1', 'Literacy Training Service 1', 'PASS', 3, '1st', '2008-2009'),
('NASC 3 (MST)', 'Physics In Everyday Life', '2', 3, '2nd', '2008-2009'),
('MATH 26', 'Analytic Geometry And Calculus I', '2.5', 3, '2nd', '2008-2009'),
('ENG 1 (AH)', 'College English', '1.75', 3, '2nd', '2008-2009'),
('CMSC 56', 'Discrete Mathematical Structures In Computer Science I', '2.5', 3, '2nd', '2008-2009'),
('CMSC 11', 'Introduction To Computer Science', '2', 3, '2nd', '2008-2009'),
('CMSC 2', 'Introduction To The Internet', '1.5', 3, '2nd', '2008-2009'),
('PE 2 - FBB', 'Basic Course (basketball)', '1.5', 3, '2nd', '2008-2009');

-- --------------------------------------------------------

--
-- Table structure for table `2008-00196/gwa`
--

CREATE TABLE IF NOT EXISTS `2008-00196/gwa` (
  `Semester` varchar(10) NOT NULL,
  `SchoolYear` varchar(10) NOT NULL,
  `GWA` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2008-00196/gwa`
--

INSERT INTO `2008-00196/gwa` (`Semester`, `SchoolYear`, `GWA`) VALUES
('1st', '2008-2009', 1.82353),
('2nd', '2008-2009', 2.04167);

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
  PRIMARY KEY (`StudentNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waitlist_students`
--

INSERT INTO `waitlist_students` (`StudentNumber`, `LastName`, `FirstName`, `MiddleInitial`, `Language`, `Reading`, `Mathematics`, `Science`, `UPG`, `Gender`, `Region`, `GWA`) VALUES
('2008-00196', 'BAUTISTA', 'KRISTINE ELAINE', 'P', 67, 78, 80, 71, 2.3, 'F', 'NCR', 1.93571);
