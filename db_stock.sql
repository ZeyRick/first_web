-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 11:39 AM
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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgID` int(11) NOT NULL,
  `viewID` int(11) NOT NULL,
  `img` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgID`, `viewID`, `img`) VALUES
(1, 25, 'download (1).jpg'),
(2, 25, 'download (2).jpg'),
(3, 25, 'download (3).jpg'),
(4, 25, 'download (4).jpg'),
(5, 25, 'download (5).jpg'),
(6, 25, 'download (6).jpg'),
(7, 25, 'download (7).jpg'),
(8, 25, 'download (8).jpg'),
(9, 25, 'download.jpg'),
(10, 1, 'yoav-aziz-tKCd-IWc4gI-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `locID` int(11) NOT NULL,
  `City` varchar(64) NOT NULL,
  `Country` varchar(64) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locID`, `City`, `Country`, `Description`) VALUES
(1, 'Tokyo', 'Japan', NULL),
(2, 'Phnom Penh', 'Cambodia', NULL),
(3, 'Beijing', 'China', NULL),
(4, 'Paris', 'French', NULL),
(5, 'London', 'United Kingdom', NULL),
(6, 'Rome', 'Italy', NULL),
(7, 'Bali', 'Indonesia', NULL),
(8, 'Kerry', 'Ireland', NULL),
(9, 'Dubrovnik', 'Croatia', NULL),
(10, 'Kyoto', 'Japan', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `viewID` int(11) NOT NULL,
  `Name` varchar(64) DEFAULT NULL,
  `locID` int(11) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`viewID`, `Name`, `locID`, `Description`) VALUES
(1, NULL, 1, NULL),
(13, NULL, 2, NULL),
(14, NULL, 2, NULL),
(15, NULL, 3, NULL),
(16, NULL, 3, NULL),
(17, NULL, 4, NULL),
(18, NULL, 4, NULL),
(19, NULL, 5, NULL),
(20, NULL, 5, NULL),
(21, NULL, 2, NULL),
(22, NULL, 2, NULL),
(23, NULL, 3, NULL),
(24, NULL, 3, NULL),
(25, NULL, 4, NULL),
(26, NULL, 4, NULL),
(27, NULL, 5, NULL),
(28, NULL, 5, NULL),
(29, NULL, 2, NULL),
(30, NULL, 2, NULL),
(31, NULL, 3, NULL),
(32, NULL, 3, NULL),
(33, NULL, 4, NULL),
(34, NULL, 4, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgID`),
  ADD KEY `viewID` (`viewID`);

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
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`viewID`),
  ADD KEY `locID` (`locID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `viewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `viewID` FOREIGN KEY (`viewID`) REFERENCES `views` (`viewID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `locID` FOREIGN KEY (`locID`) REFERENCES `locations` (`locID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
