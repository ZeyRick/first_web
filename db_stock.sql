-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 05:01 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `Description` text,
  `Image` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locID`, `Name`, `Province`, `Duration`, `Price`, `Description`, `Image`) VALUES
(27, 'ZeyRick', 'Phnom Penh', '1hour', 300, 'This is description', 'ZeyRick.png');

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
  MODIFY `locID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
