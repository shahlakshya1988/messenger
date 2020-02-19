-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2020 at 12:06 PM
-- Server version: 5.7.28-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messenger`
--

-- --------------------------------------------------------

--
-- Table structure for table `clean`
--

DROP TABLE IF EXISTS `clean`;
CREATE TABLE IF NOT EXISTS `clean` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `clean_message_id` int(255) NOT NULL,
  `clean_user_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `clean`
--

INSERT INTO `clean` (`id`, `clean_message_id`, `clean_user_id`) VALUES
(1, 4, 1),
(2, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(255) NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_bin NOT NULL,
  `msg_type` varchar(255) COLLATE utf8_bin NOT NULL COMMENT 'File,Text,Emoji',
  `user_id` int(255) NOT NULL,
  `msg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message`, `msg_type`, `user_id`, `msg_time`) VALUES
(2, '15e4a8cc11c5908.54524634.jpg', 'jpg', 1, '2020-02-17 12:53:21'),
(3, 'assets/emoji/emoji16.png', 'emoji', 1, '2020-02-18 06:00:46'),
(4, 'Hello', 'text', 1, '2020-02-19 06:33:58'),
(5, 'hiii', 'text', 1, '2020-02-19 06:34:00'),
(6, 'i am new user', 'text', 1, '2020-02-19 06:34:03'),
(7, 'Messages after hello1 login', 'text', 1, '2020-02-19 06:36:10'),
(8, 'I am a new user', 'text', 2, '2020-02-19 06:40:04'),
(9, 'hello1', 'text', 2, '2020-02-19 06:40:05'),
(10, 'Checking the code', 'text', 1, '2020-02-19 06:57:45'),
(11, 'hello Welcome', 'text', 1, '2020-02-19 11:57:14'),
(12, 'assets/emoji/emoji6.png', 'emoji', 1, '2020-02-19 11:58:01'),
(13, '15e4d243a052881.07132283.jpg', 'jpg', 1, '2020-02-19 12:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'if user is online then it will store 1 otherwise 0',
  `clean_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `status`, `clean_status`) VALUES
(1, 'hello', 'hello@example.com', '$2y$10$ZH.wzsUxQBE2eAEu/S8jTugFEYLKVZaPHrs.dZ.WSncBnmaMR1axm', '5e4a54212633f3.63902710.png', 1, 1),
(2, 'hello1', 'hello1@example.com', '$2y$10$Zhn3AjPfsQhAYkta4k06/.z1evNixudXviQlAK0NVEXRQcniqln4G', '5e4cd735b33959.61866800.png', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
