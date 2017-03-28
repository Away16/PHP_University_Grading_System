-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2016 at 08:07 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `pass` varchar(70) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `pass`) VALUES
('admin', '356a192b7913b04c54574d18c28d46e6395428ab');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `st_name` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `st_code` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `st_cmelli` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `course` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `grade` float NOT NULL,
  `ostad_user_id` int(11) NOT NULL,
  `ostad_name` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `eteraz` tinyint(1) NOT NULL DEFAULT '0',
  `st_note` varchar(3500) COLLATE utf8_persian_ci NOT NULL,
  `ostad_note` varchar(3500) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ostad_login`
--

CREATE TABLE `ostad_login` (
  `id` int(11) NOT NULL,
  `ostad_name` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `user` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `pass` varchar(70) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ostad_user_id` (`ostad_user_id`),
  ADD KEY `ostad_name` (`ostad_name`);

--
-- Indexes for table `ostad_login`
--
ALTER TABLE `ostad_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `ostad_name` (`ostad_name`),
  ADD KEY `ostad_name_2` (`ostad_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ostad_login`
--
ALTER TABLE `ostad_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`ostad_user_id`) REFERENCES `ostad_login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`ostad_name`) REFERENCES `ostad_login` (`ostad_name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
