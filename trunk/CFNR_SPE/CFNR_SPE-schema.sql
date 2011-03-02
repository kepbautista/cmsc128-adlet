-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2011 at 04:03 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `cfnr_spe`
--

-- --------------------------------------------------------

--
-- Table structure for table `2005-48767`
--

CREATE TABLE IF NOT EXISTS `2005-48767` (
  `CourseNumber` varchar(20) NOT NULL,
  `CourseTitle` varchar(100) NOT NULL,
  `Grade` varchar(4) NOT NULL,
  `Units` float NOT NULL,
  `Semester` varchar(30) NOT NULL,
  `SchoolYear` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2005-48767`
--

INSERT INTO `2005-48767` (`CourseNumber`, `CourseTitle`, `Grade`, `Units`, `Semester`, `SchoolYear`) VALUES
('LTS 1', 'LITERACY TRAINING SERVICE 1', 'PASS', 3, '1st', '2005-2006'),
('PE 1', 'FUNDAMENTALS OF PHYSICAL FITNESS', '1.75', 3, '1st', '2005-2006'),
('MATH 17', 'COLLEGE ALGEBRA AND TRIGONOMETRY', '2.5', 5, '1st', '2005-2006'),
('ENG 1', 'COLLEGE ENGLISH', '2.75', 3, '1st', '2005-2006'),
('PHLO 1', 'PHILOSOPHICAL ANALYSIS', '1.5', 3, '1st', '2005-2006'),
('IT 1', 'INFORMATION TECHNOLOGY LITERACY', '2', 3, '1st', '2005-2006'),
('PSY 1', 'EXPLORING THE SELF', '1.25', 3, '1st', '2005-2006'),
('LTS 2', 'LITERACY TRAINING SERVICE 2', 'PASS', 3, '2nd', '2005-2006'),
('PE 2-SDF', 'SELF-DEFENSE', '1.75', 2, '2nd', '2005-2006'),
('ENG 2 (AH)', 'COLLEGE WRITING', '2.25', 3, '2nd', '2005-2006'),
('CMSC 11', 'INTRODUCTION TO COMPUTER SCIENCE', '2.75', 3, '2nd', '2005-2006'),
('CMSC 2', 'INTRODUCTION TO THE INTERNET', '1.75', 3, '2nd', '2005-2006'),
('CMSC 56', 'DISCRETE MATHEMATICAL STRUCTURES IN COMPUTER SCIENCE I', '2.25', 3, '2nd', '2005-2006'),
('MATH 26', 'ANALYTIC GEOMETRY AND CALCULUS I', '3', 3, '2nd', '2005-2006'),
('NASC 2 (MST)', 'THE LIVING PLANET', '2', 3, '2nd', '2005-2006');

-- --------------------------------------------------------

--
-- Table structure for table `2005-48767/gwa`
--

CREATE TABLE IF NOT EXISTS `2005-48767/gwa` (
  `Semester` varchar(10) NOT NULL,
  `SchoolYear` varchar(10) NOT NULL,
  `GWA` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2005-48767/gwa`
--

INSERT INTO `2005-48767/gwa` (`Semester`, `SchoolYear`, `GWA`) VALUES
('1st', '2005-2006', 2.05882),
('2nd', '2005-2006', 2.33333);

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
('HIST 1', 'PHILIPPINE HISTORY', '1.25', 3, '1st', '2008-2009'),
('ECON 10', 'ECONOMICS IN SOCIAL ISSUES', '2', 3, '1st', '2008-2009'),
('ENG 2', 'COLLEGE WRITING', '1.75', 3, '1st', '2008-2009'),
('IT 1', 'INFORMATION TECHNOLOGY LITERACY', '2', 3, '1st', '2008-2009'),
('PE 1', 'FUNDAMENTALS OF PHYSICAL FITNESS', '1.75', 2, '1st', '2008-2009'),
('LTS 1', 'LITERACY TRAINING SERVICE 1', 'PASS', 3, '1st', '2008-2009'),
('NASC 3 (MST)', 'PHYSICS IN EVERYDAY LIFE', '2', 3, '2nd', '2008-2009'),
('MATH 26', 'ANALYTIC GEOMETRY AND CALCULUS I', '2.5', 3, '2nd', '2008-2009'),
('ENG 1 (AH)', 'COLLEGE ENGLISH', '1.75', 3, '2nd', '2008-2009'),
('CMSC 56', 'DISCRETE MATHEMATICAL STRUCTURES IN COMPUTER SCIENCE I', '2.5', 3, '2nd', '2008-2009'),
('CMSC 11', 'INTRODUCTION TO COMPUTER SCIENCE', '2', 3, '2nd', '2008-2009'),
('CMSC 2', 'INTRODUCTION TO THE INTERNET', '1.5', 3, '2nd', '2008-2009'),
('PE 2 - FBB', 'BASIC COURSE (BASKETBALL)', '1.5', 3, '2nd', '2008-2009'),
('NASC 5 (MST)', 'ENVIRONMENTAL BIOLOGY', '1.5', 3, '1st', '2009-2010'),
('MATH 27', 'ANALYTIC GEOMETRY AND CALCULUS II', '1.75', 3, '1st', '2009-2010'),
('CMSC 56', 'DISCRETE MATHEMATICAL STRUCTURES IN COMPUTER SCIENCE II', '3', 3, '1st', '2009-2010'),
('CMSC 22', 'OBJECT-ORIENTED PROGRAMMING', '2.75', 3, '1st', '2009-2010'),
('CMSC 21', 'FUNDAMENTALS OF PROGRAMMING', '2', 3, '1st', '2009-2010'),
('STAT 1', 'ELEMENTARY STATISTICS', '2.75', 3, '1st', '2009-2010'),
('PE 2-BW', 'BASIC COURSE (BOWLING)', '1', 3, '1st', '2009-2010');

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
('1st', '2009-2010', 2.29167);

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
('MATH 17', 'COLLEGE ALGEBRA AND TRIGONOMETRY', '3', 5, '1st', '2008-2009'),
('CMSC 131', 'INTRODUCTION TO COMPUTER ORGANIZATION AND MACHINE LEVEL PROGRAMMING', '1', 3, '1st', '2010-2011'),
('CMSC 150', 'NUMERICAL ANALYSIS', '2.25', 3, '1st', '2010-2011'),
('PE 2 - PG', 'PHILIPPINE GAMES', '1.25', 2, '1st', '2008-2009');

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
('1st', '2008-2009', 3),
('1st', '2010-2011', 1.625);

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
('2008-00196', 'BAUTISTA', 'KRISTINE ELAINE', 'P', 67, 78, 80, 71, 2.3, 'F', 'NCR', 2.0566),
('2008-58907', 'SERIOSO', 'KAYLA MARIE', 'B', 43, 35, 76, 67, 2.1, 'F', '4-A', 2.25),
('2005-48767', 'AGUIRRE', 'DONNA MAE', 'S', 88, 78, 65, 74, 2.1, 'F', '4-A', 2.2);
