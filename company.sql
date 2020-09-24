-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 07:55 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--
CREATE DATABASE IF NOT EXISTS `company` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `company`;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DEPT_ID` varchar(3) NOT NULL,
  `DEPT_NAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DEPT_ID`, `DEPT_NAME`) VALUES
('ACC', 'ACCOUNTING'),
('COM', 'COMPUTER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DEPT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
