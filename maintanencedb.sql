-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 05:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `maintanencedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `currentpartorders`
--

CREATE TABLE `currentpartorders` (
  `orderId` int(10) NOT NULL,
  `ticketId` int(10) NOT NULL,
  `partName` varchar(20) NOT NULL,
  `quantity` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currentpartorders`
--

INSERT INTO `currentpartorders` (`orderId`, `ticketId`, `partName`, `quantity`) VALUES
(1, 123459, 'Hallway Lightbulb', 2),
(6, 123469, 'Hallway Lightbulb', 3),
(7, 123469, 'Dorm Lightbulb', 4),
(8, 123459, 'Hallway Lightbulb', 1),
(9, 123492, 'Dorm Lightbulb', 1),
(10, 123493, 'Dorm Lightbulb', 1),
(11, 123495, 'Dorm Lightbulb', 1),
(12, 123500, 'Dorm Lightbulb', 1),
(13, 123508, 'Dorm Lightbulb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `damagerequest`
--

CREATE TABLE `damagerequest` (
  `requestId` int(10) NOT NULL,
  `ticketId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `damagerequest`
--

INSERT INTO `damagerequest` (`requestId`, `ticketId`) VALUES
(1, 123459),
(2, 123460),
(6, 123460),
(7, 123460),
(3, 123469),
(4, 123476),
(5, 123476),
(9, 123493),
(10, 123493),
(11, 123493),
(8, 123500),
(12, 123508);

-- --------------------------------------------------------

--
-- Table structure for table `maintanence`
--

CREATE TABLE `maintanence` (
  `idNum` int(9) NOT NULL,
  `firstName` varchar(10) NOT NULL,
  `lastName` varchar(10) NOT NULL,
  `specialty` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `userLevel` int(1) NOT NULL DEFAULT 2,
  `profilePic` varchar(50) NOT NULL DEFAULT 'img_avatar1.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintanence`
--

INSERT INTO `maintanence` (`idNum`, `firstName`, `lastName`, `specialty`, `email`, `password`, `userLevel`, `profilePic`) VALUES
(24680, 'Jewls', 'Watts', 'Electrician', 'jewls_watts@email.com', 'J3wl3$Watt$', 2, 'beach.png'),
(123456, 'Buck', 'Etts', 'Janitorial', 'buck_etts@email.com', 'Buck3tt$', 2, 'img_avatar1.png');

-- --------------------------------------------------------

--
-- Table structure for table `roomchangerequest`
--

CREATE TABLE `roomchangerequest` (
  `requestId` int(10) NOT NULL,
  `ticketId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomchangerequest`
--

INSERT INTO `roomchangerequest` (`requestId`, `ticketId`) VALUES
(1, 123469),
(2, 123476),
(3, 123493),
(4, 123493);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `idNum` int(9) UNSIGNED NOT NULL,
  `firstName` varchar(10) NOT NULL,
  `lastName` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `roomNum` int(3) DEFAULT NULL,
  `userLevel` int(1) NOT NULL DEFAULT 1,
  `profilePic` varchar(50) NOT NULL DEFAULT 'img_avatar1.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`idNum`, `firstName`, `lastName`, `email`, `password`, `roomNum`, `userLevel`, `profilePic`) VALUES
(13579, 'Dusty', 'Holmes', 'dusty_holmes@email.com', 'Du$tyH0lm3$', 103, 1, 'pineapple.png'),
(34567, 'John', 'Smith', 'john_smith@email.com', 'J0hn$m1th', 101, 1, 'img_avatar1.png'),
(76543, 'Jane', 'Doe', 'jane_doe@email.com', 'J@n3D031', 102, 1, 'cat.jpg'),
(192837, 'Conner', 'Hartman', 'conner_hartman@email.com', 'C0n3rH@rtm@n', NULL, 1, 'img_avatar1.png');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticketId` int(10) NOT NULL,
  `workType` varchar(50) NOT NULL,
  `workPriority` varchar(1) NOT NULL,
  `workDescription` varchar(200) NOT NULL,
  `placerFirstName` varchar(10) NOT NULL,
  `placerLastName` varchar(10) NOT NULL,
  `placerId` varchar(9) NOT NULL,
  `roomNum` varchar(3) NOT NULL,
  `ownerFirstName` varchar(10) DEFAULT NULL,
  `ownerLastName` varchar(10) DEFAULT NULL,
  `ownerId` varchar(9) DEFAULT NULL,
  `workNotes` varchar(200) NOT NULL DEFAULT 'No Notes',
  `dateCreated` date NOT NULL DEFAULT current_timestamp(),
  `ticketStatus` varchar(10) NOT NULL DEFAULT 'Unclaimed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketId`, `workType`, `workPriority`, `workDescription`, `placerFirstName`, `placerLastName`, `placerId`, `roomNum`, `ownerFirstName`, `ownerLastName`, `ownerId`, `workNotes`, `dateCreated`, `ticketStatus`) VALUES
(123507, 'Light Out', '1', 'The lightbulb in my dorm kitchen is out', 'John', 'Smith', '34567', '100', 'Buck', 'Etts', '123456', '							', '2022-04-23', 'Pending'),
(123508, 'Light Out', '1', 'I am missing a lightbulb in my dorm bedroom.', 'Jane', 'Doe', '76543', '102', 'Jewls', 'Watts', '24680', 'We ordered a lightbulb', '2022-04-23', 'Pending'),
(123509, 'General Cleaning', '1', 'Someone drew inappropriate drawings on this student&#39;s door', 'Jewls', 'Watts', '24680', '102', NULL, NULL, NULL, 'No Notes', '2022-04-23', 'Unclaimed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currentpartorders`
--
ALTER TABLE `currentpartorders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `damagerequest`
--
ALTER TABLE `damagerequest`
  ADD PRIMARY KEY (`requestId`),
  ADD KEY `damagerequest_ibfk_1` (`ticketId`);

--
-- Indexes for table `maintanence`
--
ALTER TABLE `maintanence`
  ADD PRIMARY KEY (`idNum`);

--
-- Indexes for table `roomchangerequest`
--
ALTER TABLE `roomchangerequest`
  ADD PRIMARY KEY (`requestId`),
  ADD KEY `roomchangerequest_ibfk_1` (`ticketId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`idNum`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currentpartorders`
--
ALTER TABLE `currentpartorders`
  MODIFY `orderId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `damagerequest`
--
ALTER TABLE `damagerequest`
  MODIFY `requestId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roomchangerequest`
--
ALTER TABLE `roomchangerequest`
  MODIFY `requestId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticketId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123510;
COMMIT;
