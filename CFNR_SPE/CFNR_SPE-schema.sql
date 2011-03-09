-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2011 at 11:20 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `cfnr_spe`
--

-- --------------------------------------------------------

--
-- Table structure for table `2005-12345`
--

CREATE TABLE IF NOT EXISTS `2005-12345` (
  `CourseNumber` varchar(20) NOT NULL,
  `CourseTitle` varchar(100) NOT NULL,
  `Grade` varchar(4) NOT NULL,
  `Units` float NOT NULL,
  `Semester` varchar(30) NOT NULL,
  `SchoolYear` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2005-12345`
--

INSERT INTO `2005-12345` (`CourseNumber`, `CourseTitle`, `Grade`, `Units`, `Semester`, `SchoolYear`) VALUES
('MATH 17', 'COLLEGE ALGEBRA AND TRIGONOMETRY', '3', 5, '1st', '2005-2006');

-- --------------------------------------------------------

--
-- Table structure for table `2005-12345/gwa`
--

CREATE TABLE IF NOT EXISTS `2005-12345/gwa` (
  `Semester` varchar(10) NOT NULL,
  `SchoolYear` varchar(10) NOT NULL,
  `GWA` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2005-12345/gwa`
--

INSERT INTO `2005-12345/gwa` (`Semester`, `SchoolYear`, `GWA`) VALUES
('1st', '2005-2006', 3);

-- --------------------------------------------------------

--
-- Table structure for table `2005-46787`
--

CREATE TABLE IF NOT EXISTS `2005-46787` (
  `CourseNumber` varchar(20) NOT NULL,
  `CourseTitle` varchar(100) NOT NULL,
  `Grade` varchar(4) NOT NULL,
  `Units` float NOT NULL,
  `Semester` varchar(30) NOT NULL,
  `SchoolYear` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2005-46787`
--

INSERT INTO `2005-46787` (`CourseNumber`, `CourseTitle`, `Grade`, `Units`, `Semester`, `SchoolYear`) VALUES
('CMSC 130', 'LOGIC DESIGN AND DIGITAL COMPILER CIRCUITS', '2.25', 3, '2nd', '2008-2009');

-- --------------------------------------------------------

--
-- Table structure for table `2005-46787/gwa`
--

CREATE TABLE IF NOT EXISTS `2005-46787/gwa` (
  `Semester` varchar(10) NOT NULL,
  `SchoolYear` varchar(10) NOT NULL,
  `GWA` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2005-46787/gwa`
--

INSERT INTO `2005-46787/gwa` (`Semester`, `SchoolYear`, `GWA`) VALUES
('2nd', '2008-2009', 2.25);

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
('MATH 17', 'COLLEGE ALGEBRA AND TRIGONOMETRY', '2', 5, '1st', '2008-2009'),
('NASC 5 (MST)', 'ENVIRONMENTAL BIOLOGY', '1.5', 3, '1st', '2009-2010'),
('MATH 27', 'ANALYTIC GEOMETRY AND CALCULUS II', '1.75', 3, '1st', '2008-2009');

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
('1st', '2008-2009', 1.90625),
('1st', '2009-2010', 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `2008-58907`
--

CREATE TABLE IF NOT EXISTS `2008-58907` (
  `CourseNumber` varchar(20) NOT NULL,
  `CourseTitle` varchar(100) NOT NULL,
  `Grade` varchar(4) NOT NULL,
  `Units` float NOT NULL,
  `Semester` varchar(30) NOT NULL,
  `SchoolYear` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2008-58907`
--


-- --------------------------------------------------------

--
-- Table structure for table `2008-58907/gwa`
--

CREATE TABLE IF NOT EXISTS `2008-58907/gwa` (
  `Semester` varchar(10) NOT NULL,
  `SchoolYear` varchar(10) NOT NULL,
  `GWA` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2008-58907/gwa`
--


-- --------------------------------------------------------

--
-- Table structure for table `2010-12345`
--

CREATE TABLE IF NOT EXISTS `2010-12345` (
  `CourseNumber` varchar(20) NOT NULL,
  `CourseTitle` varchar(100) NOT NULL,
  `Grade` varchar(4) NOT NULL,
  `Units` float NOT NULL,
  `Semester` varchar(30) NOT NULL,
  `SchoolYear` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2010-12345`
--

INSERT INTO `2010-12345` (`CourseNumber`, `CourseTitle`, `Grade`, `Units`, `Semester`, `SchoolYear`) VALUES
('MATH 11', 'COLLEGE ALGEBRA', '1.75', 3, '1st', '2010-2011'),
('SOSC 1 (SSP)', 'BEHAVIORAL SCIENCES', '1.5', 3, '1st', '2010-2011');

-- --------------------------------------------------------

--
-- Table structure for table `2010-12345/gwa`
--

CREATE TABLE IF NOT EXISTS `2010-12345/gwa` (
  `Semester` varchar(10) NOT NULL,
  `SchoolYear` varchar(10) NOT NULL,
  `GWA` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2010-12345/gwa`
--

INSERT INTO `2010-12345/gwa` (`Semester`, `SchoolYear`, `GWA`) VALUES
('1st', '2010-2011', 1.625);

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

INSERT INTO `students_list` (`StudentNumber`, `TableName`) VALUES
('2008-58907', 'upcat_passers'),
('2005-46787', 'waitlist_students'),
('2010-12345', 'waitlist_students'),
('2005-12345', 'upcat_passers'),
('2008-00196', 'waitlist_students');

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

INSERT INTO `upcat_passers` (`StudentNumber`, `LastName`, `FirstName`, `MiddleInitial`, `Gender`, `Region`, `GWA`) VALUES
('2005-12345', 'SAYAO', 'MARIA LORENA', 'C', 'F', '4-A', 0),
('2008-58907', 'SERIOSO', 'KAYLA MARIE', 'B', 'F', '4-A', 0);

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
('2008-00196', 'BAUTISTA', 'KRISTINE ELAINE', 'P', 74, 74, 74, 74, 2.3, 'F', 'NCR', 1.79545),
('2005-46787', 'AGUIRRE', 'DONNA MAE', 'S', 81, 81, 81, 81, 2.1, 'F', '4-A', 2.25),
('2010-12345', 'ARELAS', 'PRISTINE PEARL', 'H', 70, 67, 81, 94, 2.567, 'F', '4-A', 1.625);
