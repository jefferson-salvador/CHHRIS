-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 05:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chhris_department`
--

CREATE TABLE `chhris_department` (
  `DEPT_ID` int(11) NOT NULL,
  `DEPT_NAME` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `DEPT_HEAD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chhris_department`
--

INSERT INTO `chhris_department` (`DEPT_ID`, `DEPT_NAME`, `DESCRIPTION`, `DEPT_HEAD`) VALUES
(1, 'Accounting', 'Accounting Department', 'Jefferson'),
(2, 'Information Technology', 'IT Department', 'Pao Cortez'),
(3, 'Human Resources', 'HR Department', 'Arvie Alcaraz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chhris_department`
--
ALTER TABLE `chhris_department`
  ADD PRIMARY KEY (`DEPT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chhris_department`
--
ALTER TABLE `chhris_department`
  MODIFY `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
