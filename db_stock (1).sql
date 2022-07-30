-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 12:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `locID` int(11) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Province` varchar(64) NOT NULL,
  `Duration` varchar(64) NOT NULL DEFAULT 'Contact Us',
  `Price` int(11) DEFAULT NULL,
  `Description` text DEFAULT 'No Description',
  `Image` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locID`, `Name`, `Province`, `Duration`, `Price`, `Description`, `Image`) VALUES
(1, 'Tokyo', 'Japan', '', NULL, NULL, ''),
(2, 'Phnom Penh', 'Cambodia', '', NULL, NULL, ''),
(3, 'Beijing', 'China', '', NULL, NULL, ''),
(4, 'Paris', 'French', '', NULL, NULL, ''),
(5, 'London', 'United Kingdom', '', NULL, NULL, ''),
(6, 'Rome', 'Italy', '', NULL, NULL, ''),
(7, 'Bali', 'Indonesia', '', NULL, NULL, ''),
(8, 'Kerry', 'Ireland', '', NULL, NULL, ''),
(9, 'Dubrovnik', 'Croatia', '', NULL, NULL, ''),
(10, 'Kyoto', 'Japan', '', NULL, NULL, ''),
(11, '1', '1', '1', 1, '1', '1png'),
(12, '2', '2', '2', 2, '2', '2.png'),
(13, '2', '2', '2', 2, '2', '2.png'),
(14, '2', '2', '2', 2, '2', '2.png'),
(15, '2', '2', '2', 2, '2', '2.png'),
(16, '2', '2', '2', 2, '2', '2.png'),
(17, '2', '2', '2', 2, '2', '2.png'),
(18, 'dd', 'dd', 'dd', 0, 'dd', 'dd.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `pfp` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `Username`, `Password`, `pfp`) VALUES
(1, 'veng', '$2y$10$y5T.vMLsNf3h1uJzDPwazOEvvKDJBeG1ROl8B4X/FWyuYIsMhpe..', ''),
(2, 'jh', '$2y$10$h29PSszc2Xl.cli376368uhmdGBn1gBsUCYvpieBAJMw6zBpDoa.K', '2.png'),
(3, 'narath', '$2y$10$qr0wUmP84JfHO3mMy4xDKOHyfQX8XA/VY.kbUAZJRtAGKW0dYim7O', '3.png'),
(4, 'ff', '$2y$10$IWkvoWmUcEUbuFSuLlHBee0fcNPlBIc/1JGV9aDtkbifZXzj8uK7y', '4.png'),
(5, 'w', '$2y$10$4RAJtwzqSdR.1ZzYpFLlKOlJbuakn9iy46V4DthJVDKq2qAUrdsDm', 'avatar.png'),
(6, 'ww', '$2y$10$zkVEPXv06o/Z4yQVhMaCjuypEny8Sm4XjR8hPqVP.nyz/VhTvVSlK', 'avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`locID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
