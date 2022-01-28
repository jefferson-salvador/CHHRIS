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
-- Table structure for table `chhris_users`
--

CREATE TABLE `chhris_users` (
  `USER_ID` int(11) NOT NULL,
  `ACC_NAME` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `ROLE` varchar(50) NOT NULL,
  `EMP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chhris_users`
--

INSERT INTO `chhris_users` (`USER_ID`, `ACC_NAME`, `USERNAME`, `PASSWORD`, `ROLE`, `EMP_ID`) VALUES
(1, 'Arvie', 'admin', 'admin123', 'HR', 3),
(2, 'Mc Duck Donald', 'mcdonald', 'mcdo123', 'hr', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chhris_users`
--
ALTER TABLE `chhris_users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chhris_users`
--
ALTER TABLE `chhris_users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chhris_users`
--
ALTER TABLE `chhris_users`
  ADD CONSTRAINT `chhris_users_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `chhris_employees` (`EMP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
