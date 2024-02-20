-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 04:23 AM
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
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `R_ID` int(11) NOT NULL,
  `u_ID` int(20) NOT NULL,
  `u_Name` varchar(20) NOT NULL,
  `Report` varchar(50) NOT NULL,
  `Severity` varchar(20) NOT NULL,
  `E_Type` varchar(30) NOT NULL,
  `rTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`R_ID`, `u_ID`, `u_Name`, `Report`, `Severity`, `E_Type`, `rTime`) VALUES
(15, 20, 'Steph Curry', 'I ate dinner last night that has food poison', 'mild', 'Medical Assistance', '2024-02-19 13:11:19'),
(16, 22, 'John Cruz', 'I\'m having trouble breathing', 'mild', 'Schedule a Doctor', '2024-02-19 13:11:19'),
(17, 20, 'Steph Curry', 'Coughing', 'moderate', 'Schedule a Doctor', '2024-02-19 13:11:19'),
(18, 8, 'Vince Allyson Mejico', 'My friend lost consciousness', 'critical', 'Medical Assistance', '2024-02-19 14:01:20'),
(19, 8, 'Vince Allyson Mejico', 'Reduced Eyesight', 'moderate', 'Schedule a Doctor', '2024-02-20 02:10:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`R_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `R_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
