-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2018 at 06:30 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CentralCemeteries`
--

CREATE DATABASE IF NOT EXISTS `CentralCemeteries` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `CentralCemeteries`;

-- --------------------------------------------------------

--
-- Table structure for table `cemetery`
--

DROP TABLE IF EXISTS `cemetery`;
CREATE TABLE IF NOT EXISTS `cemetery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `placeId` int(10) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `additionalData` varchar(255) DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `placeId` (`placeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other_photos`
--

DROP TABLE IF EXISTS `other_photos`;
CREATE TABLE IF NOT EXISTS `other_photos` (
  `id` int(10) NOT NULL,
  `photoId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `photoId` (`photoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cemeteryId` int(10) NOT NULL,
  `author` varchar(64) NOT NULL,
  `year` int(10) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `years` int(10) DEFAULT NULL,
  `regional_labels` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `alphabet` varchar(255) NOT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `picture_deceased` varchar(3) NOT NULL,
  `social_status` varchar(255) DEFAULT NULL,
  `religious_symbol` varchar(255) DEFAULT NULL,
  `shape` varchar(255) DEFAULT NULL,
  `historical_monuments` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cemeteryId` (`cemeteryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
CREATE TABLE IF NOT EXISTS `place` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `regionId` int(10) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `regionId` (`regionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `countryId` int(10) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `countryId` (`countryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `type` int(10) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cemetery`
--
ALTER TABLE `cemetery`
  ADD CONSTRAINT `cemetery_ibfk_1` FOREIGN KEY (`placeId`) REFERENCES `place` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `other_photos`
--
ALTER TABLE `other_photos`
  ADD CONSTRAINT `other_photos_ibfk_1` FOREIGN KEY (`photoId`) REFERENCES `photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`cemeteryId`) REFERENCES `cemetery` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`regionId`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`countryId`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
