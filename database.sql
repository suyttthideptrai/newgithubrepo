-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 02:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moonlightfestival`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Created_at` datetime DEFAULT NULL,
  `Message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `Name`, `Email`, `PhoneNumber`, `Created_at`, `Message`) VALUES
(1, 'John Doe', 'john.doe@example.com', '123-456-7890', '2023-09-22 10:30:00', 'Hello, I have a question.'),
(2, 'Alice Smith', 'alice.smith@example.com', '987-654-3210', '2023-09-22 11:15:00', 'Please get back to me as soon as possible.'),
(3, 'Bob Johnson', 'bob.johnson@example.com', '555-555-5555', '2023-09-22 12:45:00', 'I would like to inquire about your services.');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `CountryID` int(11) NOT NULL,
  `CountryName` varchar(50) DEFAULT NULL,
  `ImageID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryID`, `CountryName`, `ImageID`) VALUES
(1, 'USA', 1),
(2, 'Canada', 2),
(3, 'France', 3);

-- --------------------------------------------------------

--
-- Table structure for table `festivals`
--

CREATE TABLE `festivals` (
  `FesID` int(11) NOT NULL,
  `FesName` varchar(50) DEFAULT NULL,
  `DateStart` date DEFAULT NULL,
  `ImagePath` varchar(255) DEFAULT NULL,
  `CountryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `festivals`
--

INSERT INTO `festivals` (`FesID`, `FesName`, `DateStart`, `ImagePath`, `CountryID`) VALUES
(1, 'Summer Music Festival', '2023-07-15', '/images/summerfest.jpg', 1),
(2, 'Winter Carnival', '2023-12-10', '/images/wintercarnival.jpg', 2),
(3, 'Bastille Day', '2023-07-14', '/images/bastilleday.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `festivals_gallery`
--

CREATE TABLE `festivals_gallery` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `festival_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `festivals_gallery`
--

INSERT INTO `festivals_gallery` (`id`, `gallery_id`, `festival_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `ImageID` int(11) NOT NULL,
  `ImageTitle` varchar(50) DEFAULT NULL,
  `ImagePath` varchar(255) DEFAULT NULL,
  `UploadDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`ImageID`, `ImageTitle`, `ImagePath`, `UploadDate`) VALUES
(1, 'Nature Scenery', '/images/nature.jpg', '2023-09-22 14:00:00'),
(2, 'Cityscape', '/images/city.jpg', '2023-09-22 14:30:00'),
(3, 'Wildlife', '/images/wildlife.jpg', '2023-09-22 15:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Created_at` datetime DEFAULT NULL,
  `Updated_at` datetime DEFAULT NULL,
  `Role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `Created_at`, `Updated_at`, `Role`) VALUES
(1, 'user1', 'e38ad214943daad1d64c102faec29de4afe9da3d', 'user1@example.com', '2023-09-22 10:00:00', '2023-09-22 10:00:00', 1),
(2, 'user2', '2aa60a8ff7fcd473d321e0146afd9e26df395147', 'user2@example.com', '2023-09-22 11:00:00', '2023-09-22 11:00:00', 2),
(3, 'admin', 'efacc4001e857f7eba4ae781c2932dedf843865e', 'admin@example.com', '2023-09-22 12:00:00', '2023-09-22 12:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryID`),
  ADD UNIQUE KEY `CountryName` (`CountryName`);

--
-- Indexes for table `festivals`
--
ALTER TABLE `festivals`
  ADD PRIMARY KEY (`FesID`),
  ADD KEY `CountryID` (`CountryID`);

--
-- Indexes for table `festivals_gallery`
--
ALTER TABLE `festivals_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_id` (`gallery_id`),
  ADD KEY `festival_id` (`festival_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ImageID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `CountryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `festivals`
--
ALTER TABLE `festivals`
  MODIFY `FesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `festivals_gallery`
--
ALTER TABLE `festivals_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `festivals`
--
ALTER TABLE `festivals`
  ADD CONSTRAINT `festivals_ibfk_1` FOREIGN KEY (`CountryID`) REFERENCES `country` (`CountryID`);

--
-- Constraints for table `festivals_gallery`
--
ALTER TABLE `festivals_gallery`
  ADD CONSTRAINT `festivals_gallery_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`ImageID`),
  ADD CONSTRAINT `festivals_gallery_ibfk_2` FOREIGN KEY (`festival_id`) REFERENCES `festivals` (`FesID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
