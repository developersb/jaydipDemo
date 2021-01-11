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
-- Database: `studentdatab`
--

-- --------------------------------------------------------

--
-- Table structure for table `regtab`
--

DROP TABLE IF EXISTS `regtab`;
CREATE TABLE IF NOT EXISTS `regtab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `birthdate` varchar(55) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `confirmpass` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regtab`
--

INSERT INTO `regtab` (`id`, `firstname`, `lastname`, `username`, `birthdate`, `gender`, `email`, `password`, `confirmpass`, `country`, `city`) VALUES
(145, 'EWE', 'AlQS', 'myuser', '2006-03-15', 'Male', 'qopunyveke@mailinator.com', 'My@User12', 'My@User12', 'india', 'baroda'),
(148, 'Nolan', 'Cain', 'jorora', '2002-01-03', 'Female', 'sunuwy@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!', 'uk', 'ahmedabad'),
(143, 'Daniel', 'Cohen', 'zigonif', '2005-06-12', 'Female', 'secik@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!', 'uk', 'rajkot'),
(147, 'Dem', 'Mccoy', 'mac', '2005-07-02', 'Male', 'ginihofyb@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!', 'uk', 'rajkot'),
(121, 'Wanda', 'Bailey', 'bazikas', '2005-02-03', 'Male', 'wynufisap@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!', 'usa', 'ahmedabad'),
(141, 'ClWW', 'Larsen', 'doxivup', '2003-05-10', 'Female', 'culyvawek@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!', 'usa', 'ahmedabad'),
(140, 'Cole', 'Whitley', 'jay', '2001-10-08', 'Female', 'famonaqunu@mailinator.com', 'Ass@6199', 'Ass@6199', 'india', 'ahmedabad'),
(126, 'Joseph', 'Parrish', 'byduzi', '2009-05-26', 'Male', 'hijisemyf@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!', 'uk', 'rajkot'),
(127, 'NewData', 'Lname', 'qaqulo', '2001-01-18', 'Male', 'dawabu@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!', 'uk', 'baroda');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
