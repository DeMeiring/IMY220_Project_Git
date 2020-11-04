-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 02:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbu17074292`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbalbums`
--

CREATE TABLE `tbalbums` (
  `albumID` int(11) NOT NULL,
  `albumName` varchar(50) DEFAULT '',
  `userID` int(11) NOT NULL,
  `albumImage` varchar(255) NOT NULL DEFAULT 'Images/defaultAlbum.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbalbums`
--

INSERT INTO `tbalbums` (`albumID`, `albumName`, `userID`, `albumImage`) VALUES
(1, 'first', 1, 'Images/defaultAlbum.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbcomments`
--

CREATE TABLE `tbcomments` (
  `comment` varchar(120) NOT NULL,
  `userID` int(11) NOT NULL,
  `galleryID` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbcomments`
--

INSERT INTO `tbcomments` (`comment`, `userID`, `galleryID`, `timeStamp`) VALUES
('come now man', 1, 7, '2020-11-04 11:34:55'),
('hpw about now', 1, 7, '2020-11-04 10:40:51'),
('i have a sneaky suspicion this is working ', 1, 4, '2020-11-04 11:35:23'),
('load test ', 1, 11, '2020-11-04 11:29:02'),
('load test 2', 1, 11, '2020-11-04 11:30:09'),
('please load', 1, 11, '2020-11-04 11:13:54'),
('tes of reload', 1, 11, '2020-11-04 13:02:19'),
('test 12343546', 1, 11, '2020-11-04 11:15:08'),
('test 12343546', 1, 11, '2020-11-04 11:15:16'),
('test 12343546', 1, 11, '2020-11-04 11:15:18'),
('test caption ', 1, 5, '2020-11-04 10:26:03'),
('test dos', 2, 1, '2020-10-04 22:00:00'),
('test dos', 2, 3, '2020-10-04 22:00:00'),
('test for load 2', 1, 7, '2020-11-04 11:31:27'),
('test new load ', 1, 11, '2020-11-04 11:32:25'),
('test new test yes', 1, 11, '2020-11-04 13:01:13'),
('test of new code', 1, 11, '2020-11-04 11:34:41'),
('test of the new system', 1, 7, '2020-11-04 10:40:40'),
('test...yes', 2, 6, '2020-10-04 22:00:00'),
('test1234', 1, 2, '2020-11-04 10:36:58'),
('test1234', 1, 11, '2020-11-04 10:17:33'),
('test12345678', 1, 11, '2020-11-04 10:45:53'),
('test?', 1, 4, '2020-11-04 10:33:05'),
('thi is gonna be a test ', 1, 7, '2020-11-04 10:18:02'),
('this is a tes t', 3, 6, '2020-11-04 10:19:18'),
('this is the newest test ', 1, 11, '2020-11-04 10:51:58'),
('this will be one of many', 1, 1, '2020-10-04 22:00:00'),
('werk man', 3, 1, '2020-11-04 10:31:05'),
('what about now', 1, 11, '2020-11-04 11:14:13'),
('what the hell', 1, 7, '2020-11-04 11:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbfriends`
--

CREATE TABLE `tbfriends` (
  `userID` int(11) NOT NULL,
  `friendID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbgallery`
--

CREATE TABLE `tbgallery` (
  `galleryID` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `hashtags` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `albumID` varchar(90) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `reportedFlag` tinyint(1) NOT NULL DEFAULT 0,
  `reportType` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbgallery`
--

INSERT INTO `tbgallery` (`galleryID`, `filename`, `caption`, `hashtags`, `timestamp`, `albumID`, `userID`, `reportedFlag`, `reportType`) VALUES
(1, 'Images/black_rock.jpg', 'asb werk man', '#testyoumankom', '2020-10-05 17:11:28', NULL, 3, 0, 0),
(2, 'Images/d2.jpg', 'this is a test caption twice', '#tired', '2020-10-05 14:08:58', '2', 1, 0, 0),
(3, 'Images/d1.jpg', 'this is a test caption', '#tired', '2020-10-05 14:07:27', '1', 1, 0, 0),
(4, 'Images/d1.jpg', 'testcaption ', '#tryme', '2020-10-05 17:41:23', NULL, 1, 0, 0),
(5, 'Images/d4.jpg', 'this is a test', '#hellYea', '2020-10-05 17:42:24', NULL, 1, 0, 0),
(6, 'Images/purple.jpg', 'this is a purple ', '#purple', '2020-10-05 18:06:57', NULL, 3, 0, 0),
(7, 'Images/d3.jpg', 'test of this new method', '#newTest', '2020-11-03 11:24:35', NULL, 1, 0, 0),
(11, 'Images/chun-lo-digital-art-4k-e4.jpg', 'chun', '#chun', '2020-11-04 09:07:06', NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbusers`
--

CREATE TABLE `tbusers` (
  `email` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userID` int(11) NOT NULL,
  `profilePictureFile` varchar(255) DEFAULT 'profilePictures/deault.png '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbusers`
--

INSERT INTO `tbusers` (`email`, `password`, `username`, `userID`, `profilePictureFile`) VALUES
('diffelina.dm@gmail.com', '1234', 'diffelina.dm@gmail.com', 1, 'Images/mypfp.jpg'),
('diffelina@gmail.com', '1234', 'diffelina@gmail.com', 2, 'Images/deault.png'),
('diffietwat@gmail.com', '12345', 'diffietwat@gmail.com', 3, 'Images/purple.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbalbums`
--
ALTER TABLE `tbalbums`
  ADD PRIMARY KEY (`albumID`);

--
-- Indexes for table `tbcomments`
--
ALTER TABLE `tbcomments`
  ADD PRIMARY KEY (`comment`,`userID`,`galleryID`,`timeStamp`);

--
-- Indexes for table `tbgallery`
--
ALTER TABLE `tbgallery`
  ADD PRIMARY KEY (`galleryID`);

--
-- Indexes for table `tbusers`
--
ALTER TABLE `tbusers`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbalbums`
--
ALTER TABLE `tbalbums`
  MODIFY `albumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbgallery`
--
ALTER TABLE `tbgallery`
  MODIFY `galleryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
