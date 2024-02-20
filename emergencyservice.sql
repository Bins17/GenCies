-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 04:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genciesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `emergencyservice`
--

CREATE TABLE `emergencyservice` (
  `a_ID` int(11) NOT NULL,
  `a_Name` varchar(40) NOT NULL,
  `a_Email` varchar(30) NOT NULL,
  `a_Password` varchar(20) NOT NULL,
  `a_Address` varchar(30) NOT NULL,
  `a_Job` varchar(30) NOT NULL,
  `a_SignInOut` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergencyservice`
--

INSERT INTO `emergencyservice` (`a_ID`, `a_Name`, `a_Email`, `a_Password`, `a_Address`, `a_Job`, `a_SignInOut`) VALUES
(1, 'Michael Johnson', 'mj@gmail.com', 'mj123', 'Los Angeles', 'Head Manager', '2024-02-13 01:49:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emergencyservice`
--
ALTER TABLE `emergencyservice`
  ADD PRIMARY KEY (`a_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergencyservice`
--
ALTER TABLE `emergencyservice`
  MODIFY `a_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
