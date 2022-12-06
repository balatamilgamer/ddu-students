-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2022 at 12:20 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e3`
--

-- --------------------------------------------------------

--
-- Table structure for table `qus`
--

DROP TABLE IF EXISTS `qus`;
CREATE TABLE IF NOT EXISTS `qus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qus` text,
  `ans` text,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qus`
--

INSERT INTO `qus` (`id`, `qus`, `ans`, `status`) VALUES
(1, 'What is the capital of France?', 'Paris,London,Berlin,Rome', 1),
(2, 'What is the capital of Germany?', 'Sun,Moon,Earth', 1),
(3, 'What is the capital of Italy?', 'one,two,three', 1),
(4, 'Find Cricket Team ?', 'India,Aus,England', 1),
(5, 'Dummy Qus?', 'test,testing,building,sunday', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
