-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 11:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testcalendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `calllink` varchar(254) DEFAULT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `idate` date DEFAULT NULL,
  `itimezone` varchar(255) DEFAULT NULL,
  `iinvite` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `calllink`, `start_datetime`, `end_datetime`, `idate`, `itimezone`, `iinvite`) VALUES
(33, ' Test 8 ', '', '2025-03-13 15:30:00', '2025-03-13 16:30:00', '2025-03-13', 'IST', 'sp@is4sb.com'),
(34, ' test 5 ', '', '2025-03-12 18:00:00', '2025-03-12 19:00:00', '2025-03-12', 'IST', 'sp@is4sb.com'),
(35, ' Test event ', '', '2025-03-26 15:30:00', '2025-03-26 16:30:00', '2025-03-26', 'IST', 'sp@is4sb.com'),
(36, ' test 4 ', '', '2025-03-20 12:00:00', '2025-03-20 13:00:00', '2025-03-20', 'IST', 'sp@is4sb.com'),
(37, ' test 3 ', '', '2025-03-14 10:00:00', '2025-03-14 11:00:00', '2025-03-14', 'IST', 'sp@is4sb.com'),
(38, ' test 5 ', '', '2025-03-08 18:00:00', '2025-03-08 19:00:00', '2025-03-08', 'IST', 'sp@is4sb.com'),
(39, ' Test event ', '', '2025-03-08 15:30:00', '2025-03-08 16:30:00', '2025-03-08', 'IST', 'sp@is4sb.com'),
(40, ' test 4 ', '', '2025-03-08 12:00:00', '2025-03-08 13:00:00', '2025-03-08', 'IST', 'sp@is4sb.com'),
(41, ' test 3 ', '', '2025-03-08 10:00:00', '2025-03-08 11:00:00', '2025-03-08', 'IST', 'sp@is4sb.com'),
(42, ' test 5 ', '', '2025-03-07 13:30:00', '2025-03-07 14:30:00', '2025-03-07', 'IST', 'sp@is4sb.com'),
(46, ' Unseen invite ', '', '2025-03-08 14:00:00', '2025-03-08 15:00:00', '2025-03-08', 'IST', 'sp@is4sb.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
