-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2014 at 02:24 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `files`
--

-- --------------------------------------------------------

--
-- Table structure for table `1.7.10`
--

CREATE TABLE IF NOT EXISTS `1.7.10` (
  `Mod` longtext NOT NULL,
  `Version` text NOT NULL,
  `Minecraft` text NOT NULL,
  `changelog` longtext NOT NULL,
  `javadoc` longtext NOT NULL,
  `src` longtext NOT NULL,
  `universal` longtext NOT NULL,
  `mcf` longtext NOT NULL,
  `pmc` longtext NOT NULL,
  `dev` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `1.7.10`
--

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `Promotion` longtext NOT NULL,
  `Version` text NOT NULL,
  `Minecraft` text NOT NULL,
  `changelog` longtext NOT NULL,
  `javadoc` longtext NOT NULL,
  `src` longtext NOT NULL,
  `universal` longtext NOT NULL,
  `mcf` longtext NOT NULL,
  `pmc` longtext NOT NULL,
  `dev` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotions`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `Title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`Title`) VALUES
('Rystuff');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
