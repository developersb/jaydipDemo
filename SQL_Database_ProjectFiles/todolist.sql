-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2021 at 05:51 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `todotbl`
--

DROP TABLE IF EXISTS `todotbl`;
CREATE TABLE IF NOT EXISTS `todotbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taskname` varchar(77) NOT NULL,
  `startdate` varchar(77) NOT NULL,
  `duedate` varchar(77) NOT NULL,
  `priority` varchar(77) NOT NULL,
  `asignpeople` varchar(77) NOT NULL,
  `status` varchar(77) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todotbl`
--

INSERT INTO `todotbl` (`id`, `taskname`, `startdate`, `duedate`, `priority`, `asignpeople`, `status`) VALUES
(20, 'Mia Booker', '1987-05-27', '1987-08-11', 'Low', 'Devam,Milan', 'Completed'),
(21, 'Bertha Pickett', '2002-05-12', '2010-02-14', 'Medium', 'Devam,Milan', 'Completed'),
(19, 'Samantha Powell', '1995-02-27', '1990-01-14', 'High', 'Devam,Jay', 'Completed'),
(18, 'Sylvia Lancaster', '1994-08-21', '1986-01-03', 'Medium', 'Devam,Milan', 'Processing'),
(22, 'Wynne Garrett', '2003-08-08', '1994-12-18', 'High', 'Jay,Milan', 'Processing'),
(23, 'Josephine Delgado', '1989-03-12', '1982-09-26', 'High', 'Devam,Milan', 'Processing'),
(24, 'Richard Hutchinson', '2000-11-12', '1977-01-03', 'High', 'Devam,Milan', 'Processing'),
(25, 'Isaac Beck', '2004-02-22', '2000-11-05', 'Low', 'Devam,Jay', 'Completed'),
(26, 'Irene Dillon', '2013-05-19', '2004-04-28', 'Low', 'Devam,Jay', 'Completed'),
(27, 'Ocean Brady', '2015-11-14', '1992-02-14', 'Low', 'Milan', 'Processing'),
(28, 'Colby May', '1991-11-26', '1973-04-29', 'High', 'Devam,Milan', 'Pending'),
(29, 'Ivana Cox', '2011-08-14', '2002-03-08', 'High', 'Jay,Milan', 'Pending'),
(30, 'Fritz Travis', '2004-12-16', '1984-06-20', 'Low', 'Devam,Jay,Milan', 'Completed'),
(31, 'Zia Sharpe', '2000-07-30', '1977-04-05', 'Medium', 'Jay', 'Processing'),
(32, 'Compose', '2000-07-30', '1977-04-05', 'Medium', 'Jay', 'Processing'),
(33, 'Sloane Nash', '1971-08-30', '2013-12-08', 'High', 'Devam,Jay', 'Processing');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
