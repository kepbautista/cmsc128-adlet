-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2011 at 11:26 AM
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
('MATH 17', 'COLLEGE ALGEBRA AND TRIGONOMETRY', '5', 5, '1st', '2005-2006');

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
('1st', '2005-2006', 5);

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
('SOSC 1', 'BEHAVIORAL SCIENCES', '1.25', 3, '1st', '2005-2006'),
('CMSC 125', 'OPERATING SYSTEMS', '1.75', 3, '2nd', '2010-2011'),
('CMSC 128', 'INTRODUCTION TO SOFTWARE ENGINEERING', '1', 3, '2nd', '2010-2011');

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
('2nd', '2010-2011', 1.375),
('1st', '2005-2006', 1.25);

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
('HIST 1 (SSP)', 'PHILIPPINE HISTORY', '1.25', 3, '1st', '2008-2009'),
('IT 1 (MST)', 'INFORMATION TECHNOLOGY LITERACY', '2', 3, '1st', '2008-2009'),
('ENG 2 (AH)', 'COLLEGE WRITING', '1.75', 3, '1st', '2008-2009'),
('ECON 10 (SSP)', 'ECONOMICS IN SOCIAL ISSUES', '2', 3, '1st', '2008-2009'),
('PE 1', 'FUNDAMENTALS OF PHYSICAL FITNESS', '1.75', 2, '1st', '2008-2009'),
('LTS 1', 'LITERACY TRAINING SERVICE 1', 'PASS', 3, '1st', '2008-2009'),
('CMSC 2', 'INTRODUCTION TO THE INTERNET', '1.5', 3, '2nd', '2008-2009'),
('CMSC 11', 'INTRODUCTION TO COMPUTER SCIENCE', '2', 3, '2nd', '2008-2009'),
('CMSC 56', 'DISCRETE MATHEMATICAL STRUCTURES IN COMPUTER SCIENCE I', '2.5', 3, '2nd', '2008-2009'),
('MATH 26', 'ANALYTIC GEOMETRY AND CALCULUS I', '2.5', 3, '2nd', '2008-2009'),
('NASC 3 (MST)', 'PHYSICS IN EVERYDAY LIFE', '2', 3, '2nd', '2008-2009'),
('ENG 1 (AH)', 'COLLEGE ENGLISH', '1.75', 3, '2nd', '2008-2009'),
('PE 2-FBB', 'BASIC COURSE (BASKETBALL)', '1.5', 2, '2nd', '2008-2009'),
('CMSC 124', 'DESIGN AND IMPLEMENTATION OF PROGRAMMING LANGUAGES', '2.5', 3, '1st', '2010-2011'),
('CMSC 127', 'FILE MANIPULATION AND DATABASE SYSTEMS', '2.25', 3, '1st', '2010-2011'),
('CMSC 131', 'INTRODUCTION TO COMPUTER ORGANIZATION AND MACHINE LEVEL PROGRAMMING', '1.25', 3, '1st', '2010-2011'),
('CMSC 150', 'NUMERICAL AND SYMBOLIC COMPUTATION', '2', 3, '1st', '2010-2011'),
('STS 1 (SSP)', 'SCIENCE, TECHNOLOGY AND SOCIETY', '1.5', 3, '1st', '2010-2011'),
('POSC 1 (SSP)', 'RE-IMAGINING PHILIPPINE POLITICS', '2', 3, '1st', '2010-2011'),
('CMSC 21', 'FUNDAMENTALS OF PROGRAMMING', '2', 3, '1st', '2009-2010'),
('CMSC 22', 'OBJECT-ORIENTED PROGRAMMING', '2.75', 3, '1st', '2009-2010'),
('CMSC 57', 'DISCRETE MATHEMATICAL STRUCTURES IN COMPUTER SCIENCE II', '3', 3, '1st', '2009-2010'),
('MATH 27', 'ANALYTIC GEOMETRY AND CALCULUS II', '1.75', 3, '1st', '2009-2010'),
('STAT 1', 'ELEMENTARY STATISTICS', '2.75', 3, '1st', '2009-2010'),
('NASC 5 (MST)', 'ENVIRONMENTAL BIOLOGY', '1.5', 3, '1st', '2009-2010'),
('PE 2-BW', 'BASIC COURSE (BOWLING)', '1', 2, '1st', '2009-2010'),
('CMSC 100', 'WEB PROGRAMMING', '1.75', 3, '2nd', '2009-2010'),
('CMSC 123', 'DATA STRUCTURES', '2', 3, '2nd', '2009-2010'),
('CMSC 130', 'LOGIC DESIGN AND DIGITAL COMPILER CIRCUITS', '2.25', 3, '2nd', '2009-2010'),
('NASC 2 (MST)', 'THE LIVING PLANET', '2', 3, '2nd', '2009-2010'),
('HUM 1 (AH)', 'LITERATURE, MAN AND SOCIETY', '2', 3, '2nd', '2009-2010'),
('MATH 28', 'ANALYTIC GEOMETRY AND CALCULUS III', '2.25', 3, '2nd', '2009-2010'),
('PE 2-PG', 'PHILIPPINE GAMES', '1.25', 2, '2nd', '2009-2010'),
('LTS 2', 'LITERACY TRAINING SERVICE 2', 'PASS', 3, 'Summer', '2009-2010'),
('SPCM 1 (SSP)', 'SPEECH COMMUNICATION', '2.25', 3, 'Summer', '2009-2010');

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
('2nd', '2008-2009', 2.04167),
('1st', '2010-2011', 1.91667),
('1st', '2009-2010', 2.29167),
('2nd', '2009-2010', 2.04167),
('Summer', '2009-2010', 2.25);

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

INSERT INTO `2008-58907` (`CourseNumber`, `CourseTitle`, `Grade`, `Units`, `Semester`, `SchoolYear`) VALUES
('CMSC 132', 'COMPUTER ARCHITECTURE', '2.25', 3, '2nd', '2010-2011'),
('CMSC 131', 'INTRODUCTION TO COMPUTER ORGANIZATION AND MACHINE LEVEL PROGRAMMING', '1', 3, '1st', '2010-2011'),
('CMSC 150', 'NUMERICAL AND SYMBOLIC COMPUTATIONS', '2.25', 3, '1st', '2010-2011'),
('CMSC 2', 'INTRODUCTION TO THE INTERNET', '1.25', 3, '2nd', '2008-2009'),
('MATH 28', 'ANALYTIC GEOMETRY AND CALCULUS III', '2.25', 3, '1st', '2009-2010');

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

INSERT INTO `2008-58907/gwa` (`Semester`, `SchoolYear`, `GWA`) VALUES
('2nd', '2010-2011', 2.25),
('1st', '2010-2011', 1.625),
('2nd', '2008-2009', 1.25),
('1st', '2009-2010', 2.25);

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
('2008-00196', 'upcat_passers');

-- --------------------------------------------------------

--
-- Table structure for table `upcat_passers`
--

CREATE TABLE IF NOT EXISTS `upcat_passers` (
  `StudentNumber` varchar(10) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleInitial` varchar(5) NOT NULL,
  `Batch` varchar(4) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Region` varchar(10) NOT NULL,
  `GWA` float NOT NULL,
  UNIQUE KEY `StudentNumber` (`StudentNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upcat_passers`
--

INSERT INTO `upcat_passers` (`StudentNumber`, `LastName`, `FirstName`, `MiddleInitial`, `Batch`, `Gender`, `Region`, `GWA`) VALUES
('2005-12345', 'SAYAO', 'MARIA LORENA', 'C', '2005', 'F', '4-A', 5),
('2008-58907', 'SERIOSO', 'KAYLA MARIE', 'B', '2008', 'F', '4-A', 1.8),
('2008-00196', 'BAUTISTA', 'KRISTINE ELAINE', 'P', '2008', 'F', 'NCR', 2.03261);

-- --------------------------------------------------------

--
-- Table structure for table `waitlist_students`
--

CREATE TABLE IF NOT EXISTS `waitlist_students` (
  `StudentNumber` varchar(10) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleInitial` varchar(5) NOT NULL,
  `Batch` varchar(4) NOT NULL,
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

INSERT INTO `waitlist_students` (`StudentNumber`, `LastName`, `FirstName`, `MiddleInitial`, `Batch`, `Language`, `Reading`, `Mathematics`, `Science`, `UPG`, `Gender`, `Region`, `GWA`) VALUES
('2005-46787', 'AGUIRRE', 'DONNA MAE', 'S', '2005', 81, 81, 81, 81, 2.1, 'F', '4-A', 1.33333),
('2010-12345', 'ARELAS', 'PRISTINE PEARL', 'H', '2010', 70, 67, 81, 94, 2.567, 'F', '4-A', 1.625);
