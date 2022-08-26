-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 10:44 AM
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
(111, 'Siem Reap Angkor 1 Day Tour', 'Siem Reap', '1 Day', 0, 'Upon your arrival tour guide and driver will pick up your from the Siem Reap international airport and process the tours to Angkor Wat temple. Angkor Wat is one of the Seven Wonders of the World. Angkor Wat, the largest temples in the world, with a volume of stone equaling that of the Cheops Pyramid in Egypt. The temples of Angkor built from AD 879 – 1191. Later continue to visit Ta Prohm temple, a jungle temple known as Tomb Raider where the American Movie stars made the film of Tomb Raider there.', '304376de5f7226ea9de8035cf0c65558.png'),
(112, 'Mountain Trekking 1 Day Tour', 'Siem Reap', '1 Day', 0, 'Waterfall mountain. Kulen Mountain was the birth place of Angkor. The mountain is revered by Khmers and regarded as a sacred place. It is here that King Jayavarman II in 9th century proclaimed himself as a divine universal ruler and chose Kulen Mountain as his administration center to rule the Kingdom of Khmer Empire. You will have opportunity to pray to the huge reclining Buddha satue which as built on the top of a natural huge rock. Walking around to see the One Thousand of God Siva\'s Linga and pedestal of Goddess Uma (Linga, literally means: Symbol of man, Pedestal means: Symbol of woman). Then you may enjoy your', '020a3923fea1a1d9ee38768a67b5a2a1.png'),
(113, 'Siem Reap-Angkor 2D1N', 'Siem Reap', '2 Day', 0, 'Upon your arrival we will pick up your from the Siem Reap international airport and escort you to the Siem Reap hotel for check in. Free and leisure on your own.', '75245960d45eeffa5f7e82f2194f984b.png'),
(114, 'Phnom Penh City Tour', 'Phnom Penh', '1 Day', 200, 'Phnom Penh city is situated at the confluence of three great rivers the Four faces of the Mekong River, Tonle Sap and Bassace Rivers, Phnom Penh is Cambodia\'s commercial and political hub. Phnom Penh offers several cultural and historical attraction including the Royal Palace, Silver Pagoda, National Musem, Wat Phnom and Toul Sleng Genocide Museum', '8a73a7c634abf34860b99ebd6afa86f7.png'),
(115, 'Phnom Penh Stopover 3 D2N', 'Phnom Penh', '3 Day', 0, 'Phnom Penh is the vibrant bustling capital of Cambodia. Situated at the confluence of three rivers, the mighty Mekong, the Bassac and the great Tonle Sap, what was once considered the â€˜Gemâ€™ of Indochina. The capital city still maintains considerable charm with plenty to see. It exudes a sort of provincial charm and tranquillity with French colonial mansions and tree-lined boulevards amidst monumental Angkorian architecture. Phnom Penh is a veritable oasis compared to the modernity of other Asian capitals. A mixture of Asian exotica, the famous Cambodian hospitality awaits the visitors to the capital of the Kingdom of Cambodia.', '27002357dfc698bb5d5a1c13d7f982a8.png'),
(116, 'Beach Break Holiday 4D3N', 'Sihanoukville', '4 Day', 500, 'After a marvelous experience of site seeing and enlightenment at Cambodia is historical cities and sites, why not take a breather at the country is beach resort with our Sihanoukville Beach Break package? This Cambodian tour allows you to relax', '5b2a0fc776eda57fb7009088b5458d04.png'),
(117, 'Angkor Excursion Tours 4D3N', 'Siem Reap', '4 Day', 2000, 'In the late 13th century, Angkor Wat gradually moved from Hindu to Theravada Buddhist use, which continues to the present day. Angkor Wat is unusual among the Angkor temples in that although it was somewhat neglected after the 16th century it was never completely abandoned, its preservation being due in part to the fact that its moat also provided some protection from encroachment by the jungle.', '95e977c751b752fa1cf4d2da7876d310.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`locID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
