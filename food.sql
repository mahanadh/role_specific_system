-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2018 at 10:42 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(50) NOT NULL,
  `food_name` text NOT NULL,
  `food_quantity` int(50) NOT NULL,
  `food_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_quantity`, `food_price`) VALUES
(1, 'alu', 2, 100),
(1, 'alu', 2, 100),
(3, 'kera', 2, 10),
(3, 'kera', 2, 10),
(3, 'kera', 2, 10),
(0, '', 0, 0),
(6, 'syau', 2, 20),
(6, 'syau', 2, 20),
(9, 'bhat', 20, 30),
(8, 'laddu', 3, 20),
(78, 'dahi', 3, 24),
(50, 'matar', 2, 10),
(9, 'tarkari', 10, 30),
(0, 'roti', 10, 10),
(8, 'mango', 20, 50),
(78, 'masu', 20, 50),
(78, 'masu', 20, 50),
(67, 'bodi', 3, 20),
(99, 'simi', 20, 20),
(99, 'simi', 20, 20),
(99, 'simi', 20, 20),
(50, 'matar', 2, 10),
(78, 'dahi', 3, 24);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
