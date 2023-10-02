-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 03:46 PM
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
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `post_ID` int(11) NOT NULL,
  `author_userID` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `image_link` varchar(1000) DEFAULT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Description` text DEFAULT NULL,
  `CountryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `festivals`
--

INSERT INTO `festivals` (`FesID`, `FesName`, `DateStart`, `Description`, `CountryID`) VALUES
(2, 'Winter Carnival', '2023-12-10', 'Big occasion for people who has the thing for winter', 2),
(3, 'Bastille Day', '2023-07-14', 'Nah, just some demo festival for web app', 3),
(4, 'burning photo', '2023-09-14', 'abcde', 3),
(5, 'NEW FESTIVAL ', '2023-09-13', 'asdjasfiasjnfkasnfas', 3),
(6, 'NEW FESTIVAL 2', '2023-08-11', 'dasdasdasdas', 1),
(7, 'NEW FESTIVAL 3 ', '2023-09-06', 'fajflkan vaknksfsafaf sad as  ascmslkmlaksfcxcaskfannc askndalksncasm ', 1),
(8, 'NEW FESTIVAL 4', '2023-09-20', 'I wanto p33 p33', 2),
(9, 'NEW FESTIVAL  5', '2023-09-20', 'dasfnkas c asndljanslcna  c as sancljansn asnclasln alnlkan lsndlaknsdasd', 3),
(10, 'NEW FESTIVAL 6', '2023-09-29', 'ASSDASDASDASDASDASDASDASDASD', 1),
(11, 'what tho facs', '2023-09-06', 'asdasda', 3),
(14, 'NEW FES', '2023-10-03', 'adsadafas', 2);

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
(3, 3, 2),
(4, 1, 3),
(5, 4, 4),
(6, 5, 5),
(7, 6, 6),
(8, 7, 7),
(9, 8, 8),
(10, 9, 9),
(11, 10, 10),
(12, 11, 11),
(15, 14, 14);

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
(3, 'Wildlife', '/images/wildlife.jpg', '2023-09-22 15:15:00'),
(4, 'title', 'magnifying-glass.png', '2023-09-29 01:29:20'),
(5, 'title', 'image_2023-09-29_013419822.png', '2023-09-29 01:34:24'),
(6, 'title', 'image_2023-09-29_013538042.png', '2023-09-29 01:35:49'),
(7, 'title', 'image_2023-09-29_013645117.png', '2023-09-29 01:36:52'),
(8, 'title', 'image_2023-09-29_013804465.png', '2023-09-29 01:38:14'),
(9, 'title', 'image_2023-09-29_013920951.png', '2023-09-29 01:39:29'),
(10, 'title', 'image_2023-09-29_014300094.png', '2023-09-29 01:43:08'),
(11, 'title', 'photo-1569622296640-38737c1d82de.jpg', '2023-09-29 01:43:28'),
(12, 'title', 'magnifying-glass.svg', '2023-09-29 01:43:59'),
(13, 'title', 'magnifying-glass.svg', '2023-09-29 03:22:18'),
(14, 'title', 'image_2023-10-02_190832774.png', '2023-10-02 19:08:38');

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
(3, 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 'admin@example.com', '2023-09-22 12:00:00', '2023-09-22 12:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`post_ID`),
  ADD KEY `author_userID` (`author_userID`);

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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `FesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `festivals_gallery`
--
ALTER TABLE `festivals_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`author_userID`) REFERENCES `users` (`UserID`);

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
