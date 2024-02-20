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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_ID` int(11) NOT NULL,
  `u_Name` varchar(40) NOT NULL,
  `u_Email` varchar(20) NOT NULL,
  `u_Password` varchar(20) NOT NULL,
  `u_Address` varchar(30) NOT NULL,
  `u_PhoneNum` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_ID`, `u_Name`, `u_Email`, `u_Password`, `u_Address`, `u_PhoneNum`) VALUES
(8, 'Vince Allyson Mejico', 'vince@gmail.com', 'vince', 'Baliwag Bulacan', '2147483647'),
(9, 'Naruto Uzumaki', 'naruto@gmail.com', 'naru', 'Konoha', '912753'),
(18, 'LeBron James', 'bron@gmail.com', 'lbj23', 'Los Angeles', '9123'),
(19, 'samespino2', 'sam2@gmail.com', 'sam2', 'baliwag bulacann', '9125558'),
(20, 'Steph Curry', 'sc30@gmail.com', 'sc', 'Golden State', '9155773'),
(21, 'Erick Campano', 'erick@gmail.com', 'er', 'Baliwag', '2147483647'),
(22, 'John Cruz', 'jc@gmail.com', 'jc', 'Balite, San Miguel Bulacan', '9125558'),
(23, 'Vince Allyson ', 'vins17@gmail.com', 'vins', 'San Miguel Bulacan', '2147483647'),
(24, 'Luka Doncic', 'luka@gmail.com', 'luka', 'Dallas Mavericks', '09127539890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
