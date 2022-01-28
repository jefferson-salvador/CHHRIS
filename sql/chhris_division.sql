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
-- Table structure for table `chhris_division`
--

CREATE TABLE `chhris_division` (
  `DIV_ID` int(11) NOT NULL,
  `DIV_NAME` varchar(50) NOT NULL,
  `LOCATION` varchar(50) NOT NULL,
  `DIV_MANAGER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chhris_division`
--

INSERT INTO `chhris_division` (`DIV_ID`, `DIV_NAME`, `LOCATION`, `DIV_MANAGER`) VALUES
(2, 'Quezon City -Branch', 'Quezon City, Manila', 1),
(3, 'Pasig-Branch', 'Pasig City, Manila', 2),
(4, 'Pasay-Branch', 'Pasay, Manila', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chhris_division`
--
ALTER TABLE `chhris_division`
  ADD PRIMARY KEY (`DIV_ID`),
  ADD KEY `DIV_MANAGER` (`DIV_MANAGER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chhris_division`
--
ALTER TABLE `chhris_division`
  MODIFY `DIV_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chhris_division`
--
ALTER TABLE `chhris_division`
  ADD CONSTRAINT `chhris_division_ibfk_1` FOREIGN KEY (`DIV_MANAGER`) REFERENCES `chhris_managers` (`MANAGER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
