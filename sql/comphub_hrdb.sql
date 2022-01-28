-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 08:08 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--
DROP DATABASE HRDB;
CREATE DATABASE IF NOT EXISTS HRDB;
USE HRDB; 

CREATE TABLE `department` (
  `DEPT_ID` int(11) NOT NULL,
  `DEPT_NAME` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `DEPT_HEAD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DEPT_ID`, `DEPT_NAME`, `DESCRIPTION`, `DEPT_HEAD`) VALUES
(1, 'Accounting', 'Accounting Department', 'Jefferson'),
(2, 'Information Technology', 'IT Department', 'Pao Cortez'),
(3, 'Human Resources', 'HR Department', 'Arvie Alcaraz');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `DIV_ID` int(11) NOT NULL,
  `DIV_NAME` varchar(50) NOT NULL,
  `LOCATION` varchar(50) NOT NULL,
  `DIV_MANAGER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`DIV_ID`, `DIV_NAME`, `LOCATION`, `DIV_MANAGER`) VALUES
(2, 'Quezon City-Branch', 'Quezon City , Manila', 1),
(3, 'Pasig-Branch', 'Pasig City, Manila', 2),
(4, 'Pasay-Branch', 'Pasay, Manila', 3);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EMP_ID` int(11) NOT NULL,
  `FNAME` varchar(50) NOT NULL,
  `MNAME` varchar(50) NOT NULL,
  `LNAME` varchar(50) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `SEX` enum('MALE','FEMALE','','') NOT NULL,
  `DOB` date NOT NULL,
  `PLACE_OF_BIRTH` varchar(100) NOT NULL,
  `CONTACT_NUM` varchar(11) NOT NULL,
  `CIVIL_STATUS` enum('MARRIED','SINGLE','DIVORCED','WIDOWED') NOT NULL,
  `POSITION` varchar(50) NOT NULL,
  `DEPT_ID` int(11) NOT NULL,
  `DIV_ID` int(11) NOT NULL,
  `WORK_STATUS` enum('REGULAR','PART-TIME','SUSPENDED','LEAVE','INTERN','CONTRACTUAL','AWOL') NOT NULL,
  `HIRED_DATE` date NOT NULL,
  `MANAGER_ID` int(11) DEFAULT NULL,
  `SALARY` int(11) NOT NULL,
  `COMMISSION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EMP_ID`, `FNAME`, `MNAME`, `LNAME`, `ADDRESS`, `SEX`, `DOB`, `PLACE_OF_BIRTH`, `CONTACT_NUM`, `CIVIL_STATUS`, `POSITION`, `DEPT_ID`, `DIV_ID`, `WORK_STATUS`, `HIRED_DATE`, `MANAGER_ID`, `SALARY`, `COMMISSION`) VALUES
(1, 'Jefferson ', 'Millen', 'Salvador', 'Zapote, Cavite', 'MALE', '0998-01-18', 'Cavite', '09876543215', 'SINGLE', 'Manager', 1, 2, 'REGULAR', '2019-01-18', 1, 30000, 10000),
(2, 'Pao', 'tang', 'Cortez', 'San Jose Del Monte, Bulacan', 'MALE', '1999-11-14', 'Bulacan', '09876543512', 'SINGLE', 'Manager', 3, 3, 'REGULAR', '2019-11-14', 2, 25000, 8000),
(3, 'Arvie', 'Salvador', 'Millen', 'Pasay, Manila', 'MALE', '1999-09-13', 'Manila', '09876541235', 'SINGLE', 'Manager', 3, 4, 'REGULAR', '2019-09-13', 3, 8000, 5000),
(4, 'Julie', 'Ann', 'Fabiosa', 'Pasay, Manila', 'FEMALE', '1999-05-20', 'Pasay', '09876545135', 'MARRIED', 'Staff', 2, 2, 'PART-TIME', '2019-07-25', 1, 5000, 1000),
(5, 'Enna', 'Ann ', 'Angulo', 'Pedro Gil, Manila', 'FEMALE', '1999-11-23', 'Batangas', '09876587538', 'SINGLE', 'Staff', 1, 2, 'INTERN', '2020-11-25', 1, 7000, 3000),
(6, 'Jonathan', 'Kyle ', 'Lozano', 'Bacoor City, Cavite', 'MALE', '1999-11-23', 'Manila', '09457943909', 'SINGLE', 'Staff', 3, 2, 'REGULAR', '2020-06-25', 1, 8000, 4000),
(7, 'Ancess', 'Lazarra', 'Condeza', 'Zapote, Cavite', 'FEMALE', '2000-04-11', 'Manila', '09123456987', 'SINGLE', 'Staff', 2, 4, 'REGULAR', '2019-04-15', 3, 7000, 3000),
(8, 'Sabine', 'DelaCruz', 'Mae', 'Pasay, Manila', 'FEMALE', '1999-12-06', 'Manila', '09546789125', 'DIVORCED', 'Staff', 1, 4, 'PART-TIME', '2019-04-20', 3, 3000, 1000),
(9, 'Josephine', 'Santos', 'Bracken', 'Libertad, Manila', 'FEMALE', '1999-07-30', 'Manila', '09876546748', 'SINGLE', 'Staff', 3, 4, 'INTERN', '2020-08-05', 3, 3000, 1000),
(10, 'Jose', 'Marie', 'Chan', 'Marikina, Manila', 'MALE', '2000-05-28', 'Manila', '09475613485', 'MARRIED', 'Staff', 2, 3, 'REGULAR', '2020-04-18', 2, 5000, 3000),
(11, 'Juan', 'Dela ', 'Cruz', 'Pasig, Manila', 'MALE', '2001-11-14', 'Manila', '09876548156', 'SINGLE', 'Staff', 1, 3, 'REGULAR', '2019-10-26', 2, 8000, 4000),
(12, 'Bella', 'Swan', 'Cullen', 'Tondo, Manila', 'FEMALE', '1998-05-26', 'Manila', '09876354874', 'MARRIED', 'Staff', 3, 3, 'PART-TIME', '2020-01-17', 2, 6000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `MANAGER_ID` int(11) NOT NULL,
  `Manager_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`MANAGER_ID`, `Manager_Name`) VALUES
(1, 'Jefferson Salvador'),
(2, 'Pao Cortez'),
(3, 'Arvie Alcaraz');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `ACC_NAME` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `ROLE` varchar(50) NOT NULL,
  `EMP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `ACC_NAME`, `USERNAME`, `PASSWORD`, `ROLE`, `EMP_ID`) VALUES
(1, 'Arvie', 'admin', 'admin123', 'HR', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DEPT_ID`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`DIV_ID`),
  ADD KEY `DIV_MANAGER` (`DIV_MANAGER`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EMP_ID`),
  ADD KEY `MANAGER_ID` (`MANAGER_ID`),
  ADD KEY `DEPT_ID` (`DEPT_ID`),
  ADD KEY `DIV_ID` (`DIV_ID`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`MANAGER_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `DIV_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `MANAGER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `division`
--
ALTER TABLE `division`
  ADD CONSTRAINT `division_ibfk_1` FOREIGN KEY (`DIV_MANAGER`) REFERENCES `managers` (`MANAGER_ID`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`MANAGER_ID`) REFERENCES `managers` (`MANAGER_ID`),
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`DEPT_ID`) REFERENCES `department` (`DEPT_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`DIV_ID`) REFERENCES `division` (`DIV_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employees` (`EMP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
