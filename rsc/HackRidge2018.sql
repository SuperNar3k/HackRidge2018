-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2018 at 09:33 AM
-- Server version: 5.1.73
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `HackRidge2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `userRecipeLikes`
--

CREATE TABLE IF NOT EXISTS `userRecipeLikes` (
  `userID` int(9) NOT NULL,
  `recipeID` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userRecipeLikes`
--

INSERT INTO `userRecipeLikes` (`userID`, `recipeID`) VALUES
(0, '47334'),
(1, '47334'),
(2, '47334'),
(3, '47334'),
(1, '34889'),
(2, '34889'),
(3, '5cc4a8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(9) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `passwordHash` varchar(64) NOT NULL,
  `address` varchar(64) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `birthday` date NOT NULL,
  `about` varchar(128) NOT NULL,
  `imageFilePath` varchar(32) NOT NULL DEFAULT 'defaultUserIcon.png',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `passwordHash`, `address`, `phone`, `birthday`, `about`, `imageFilePath`) VALUES
(0, 'Sahil', 'Patel', 'email@email.com', '$2y$10$5FrypOhKYJ2V0T7eg1POheTR4TFDks7dXjpnY2Ip.30HlfpcDXo/C', '357 Erie Circle Bloomingdale, IL 60108', '1-234-567-8910', '2000-09-19', 'It''s me', 'defaultUserIcon.png'),
(1, 'Narek', 'Ohanyan', 'email2@email.com', '$2y$10$5FrypOhKYJ2V0T7eg1POheTR4TFDks7dXjpnY2Ip.30HlfpcDXo/C', '', '', '0000-00-00', '', 'defaultUserIcon.png'),
(2, 'Ben', 'Wagrez', 'email3@email.com', '$2y$10$5FrypOhKYJ2V0T7eg1POheTR4TFDks7dXjpnY2Ip.30HlfpcDXo/C', '', '', '0000-00-00', '', 'defaultUserIcon.png'),
(3, 'Jozef', 'ICantSpellIt', 'email4@email.com', '$2y$10$5FrypOhKYJ2V0T7eg1POheTR4TFDks7dXjpnY2Ip.30HlfpcDXo/C', '', '', '0000-00-00', '', 'defaultUserIcon.png');

-- --------------------------------------------------------

--
-- Table structure for table `usertouserfriends`
--

CREATE TABLE IF NOT EXISTS `usertouserfriends` (
  `userID0` int(9) NOT NULL,
  `userID1` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertouserfriends`
--

INSERT INTO `usertouserfriends` (`userID0`, `userID1`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usertouserfriendspending`
--

CREATE TABLE IF NOT EXISTS `usertouserfriendspending` (
  `requesterID` int(9) NOT NULL,
  `recipientID` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertouserfriendspending`
--

INSERT INTO `usertouserfriendspending` (`requesterID`, `recipientID`) VALUES
(0, 1),
(2, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
