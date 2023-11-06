-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 08:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c2education`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Type` varchar(50) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `S_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Type`, `Color`, `S_ID`) VALUES
('math', 'blue', 2),
('math', 'white', 1),
('math', 'yellow', 3),
('reading', 'blue', 1),
('reading', 'blue', 2),
('reading', 'yellow', 3),
('writing', 'blue', 1),
('writing', 'blue', 2),
('writing', 'yellow', 3);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `S_ID` int(20) NOT NULL,
  `Session_ID` int(20) NOT NULL,
  `Homework` varchar(500) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  `Behavior` int(1) NOT NULL,
  `Motivation` int(1) NOT NULL,
  `Confidence` int(1) NOT NULL,
  `Focus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`S_ID`, `Session_ID`, `Homework`, `Comments`, `Behavior`, `Motivation`, `Confidence`, `Focus`) VALUES
(123, 1, 'No Homework!', 'Kind of slacking today.', 5, 6, 6, 6),
(321, 2, 'Essay on why blankets are warm', 'Very good work today!', 7, 7, 7, 7),
(213, 3, 'Worksheet on how to add numbers larger than 5', 'She normally doesn\'t show up for sessions but when she did today, she forgot how to add.', 4, 4, 3, 2),
(1, 6547, 'asd', 'asd', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `FName` varchar(50) NOT NULL,
  `MINIT` varchar(1) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `S_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`FName`, `MINIT`, `LName`, `phone_no`, `S_ID`) VALUES
('Paul', 'J', 'Revere', '4431234567', 1),
('Panera', 'B', 'Read', '4433216547', 2),
('Chick', 'F', 'A', '4439876541', 3),
('test', 't', 'test', '123', 4);

-- --------------------------------------------------------

--
-- Table structure for table `phone_no`
--

CREATE TABLE `phone_no` (
  `Phone_No` varchar(15) NOT NULL,
  `G_FName` varchar(50) NOT NULL,
  `G_MINIT` varchar(1) NOT NULL,
  `G_LName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phone_no`
--

INSERT INTO `phone_no` (`Phone_No`, `G_FName`, `G_MINIT`, `G_LName`) VALUES
('4431234567', 'Paul', 'A', 'Revere'),
('4432135467', 'Chick', 'F', 'A'),
('4433216547', 'Panera', 'B', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `Session_ID` int(50) NOT NULL,
  `Start_Time` varchar(10) NOT NULL,
  `Length` varchar(10) NOT NULL,
  `Subject` varchar(20) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `T_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`Session_ID`, `Start_Time`, `Length`, `Subject`, `Date`, `T_ID`) VALUES
(6547, '1PM', '1HR', 'Math', '10/28/2023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `S_ID` int(10) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `MINIT` varchar(20) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `SAT_date` varchar(50) NOT NULL,
  `Grade` int(2) NOT NULL,
  `DOB` varchar(50) NOT NULL,
  `G_FName` varchar(50) NOT NULL,
  `G_Minit` varchar(1) NOT NULL,
  `G_LName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_ID`, `FName`, `MINIT`, `LName`, `SAT_date`, `Grade`, `DOB`, `G_FName`, `G_Minit`, `G_LName`) VALUES
(1, 'Jin', 'B', 'Chen', '04/25/2023', 11, '1998-11-30', 'Paul', 'J', 'Revere'),
(2, 'Michelle', 'A', 'Curry', '08/19/2023', 10, '02/16/1999', 'Panera', 'B', 'Read'),
(3, 'Noah', 'C', 'Wilkens', '05/30/2023', 10, '08/15/2000', 'Chick', 'F', 'A'),
(4, 'test', 't', 'test', 'test', 10, 'test', 'test', 't', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`) VALUES
('Hi', 'Jin'),
('asd', 'michelle');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `T_ID` int(20) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `MINIT` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `Degree` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`T_ID`, `FName`, `MINIT`, `LName`, `Degree`) VALUES
(1, 'Brian', 'N', 'Dao', 'PDH In Gender Studies'),
(2, 'Rick', 'N', 'Morty', 'Bachelors In Liberal Arts'),
(3, 'Sharon', 'A', 'Anderson', 'Bachelors In English');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Type`,`Color`,`S_ID`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`Session_ID`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `phone_no`
--
ALTER TABLE `phone_no`
  ADD PRIMARY KEY (`Phone_No`,`G_FName`,`G_MINIT`,`G_LName`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`Session_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`T_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `Session_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6548;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `S_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `Session_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6548;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `S_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `T_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
