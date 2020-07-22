-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 04:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursesitedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `sno` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `webdevcourse` varchar(15) NOT NULL,
  `androidcourse` varchar(15) NOT NULL,
  `aicourse` varchar(15) NOT NULL,
  `mlcourse` varchar(15) NOT NULL,
  `dataanalysiscourse` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`sno`, `username`, `password`, `datetime`, `webdevcourse`, `androidcourse`, `aicourse`, `mlcourse`, `dataanalysiscourse`) VALUES
(3, 'soham', '$2y$10$PGmf3rsiF1MdJmh3Gx52Q.HQs64VJzfXei2OQo6LiUhoiVvOxPDqu', '2020-07-22 17:22:19', 'webdevcourse', 'androidcourse', '', 'mlcourse', ''),
(5, 'devkant', '$2y$10$5KlgfWn5ZYWSFJJljhAoduCLtlg4ZhoL5RmF815.nlcenuwyvo.sO', '2020-07-22 17:36:58', 'webdevcourse', '', 'aicourse', '', ''),
(6, 'yash', '$2y$10$rB4XM3eOm8WHicunq/leQOH/.CgzEP7YEGJbChm8v7Y9.fAKz8V0y', '2020-07-22 18:08:17', '', '', 'aicourse', 'mlcourse', 'dataanalysiscou'),
(7, 'rohan', '$2y$10$xOn9Ndxb2hua/zij3tcXU.h4qQmi222ewJhW1xTQLdTBXf8orVIlC', '2020-07-22 20:11:33', 'webdevcourse', 'androidcourse', 'aicourse', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logindetails`
--
ALTER TABLE `logindetails`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
