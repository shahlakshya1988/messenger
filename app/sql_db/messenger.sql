-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 21, 2020 at 07:44 AM
-- Server version: 5.7.28-log
-- PHP Version: 7.1.33

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `clean`
--

INSERT INTO `clean` (`id`, `clean_message_id`, `clean_user_id`) VALUES
(1, 4, 1),
(2, 7, 2),
(3, 22, 3);

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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(13, '15e4d243a052881.07132283.jpg', 'jpg', 1, '2020-02-19 12:04:10'),
(14, '25e4e17f69ebb89.50303045.zip', 'zip', 2, '2020-02-20 05:24:06'),
(15, '15e4e192eb02be4.00312385.pdf', 'pdf', 1, '2020-02-20 05:29:18'),
(16, '15e4e1b5c5dace7.82850712.docx', 'docx', 1, '2020-02-20 05:38:36'),
(17, '15e4e1b6bb74bc1.25245927.xlsx', 'xlsx', 1, '2020-02-20 05:38:51'),
(18, '15e4e1b709c9e18.53012693.docx', 'docx', 1, '2020-02-20 05:38:56'),
(19, '25e4e1b8b305eb1.98327303.docx', 'docx', 2, '2020-02-20 05:39:23'),
(20, '25e4e1b94239407.03001295.xlsx', 'xlsx', 2, '2020-02-20 05:39:32'),
(21, '15e4e1bb9df5876.81802107.zip', 'zip', 1, '2020-02-20 05:40:09'),
(22, 'hello', 'text', 3, '2020-02-20 05:52:32'),
(23, 'hello', 'text', 1, '2020-02-20 07:58:24'),
(24, 'd', 'text', 3, '2020-02-21 05:23:20'),
(25, 'assets/emoji/emoji4.png', 'emoji', 3, '2020-02-21 05:23:50'),
(26, 'assets/emoji/emoji4.png', 'emoji', 3, '2020-02-21 05:23:51'),
(27, 'assets/emoji/emoji4.png', 'emoji', 3, '2020-02-21 05:23:51'),
(28, 'assets/emoji/emoji4.png', 'emoji', 3, '2020-02-21 05:23:51'),
(29, 'assets/emoji/emoji4.png', 'emoji', 3, '2020-02-21 05:23:52'),
(30, 'assets/emoji/emoji4.png', 'emoji', 3, '2020-02-21 05:23:52'),
(31, 'assets/emoji/emoji4.png', 'emoji', 3, '2020-02-21 05:23:52'),
(32, 'assets/emoji/emoji14.png', 'emoji', 1, '2020-02-21 05:33:27'),
(33, 'assets/emoji/emoji19.png', 'emoji', 3, '2020-02-21 07:41:23');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `status`, `clean_status`) VALUES
(1, 'hello', 'hello@example.com', '$2y$10$ZH.wzsUxQBE2eAEu/S8jTugFEYLKVZaPHrs.dZ.WSncBnmaMR1axm', '5e4a54212633f3.63902710.png', 0, 1),
(2, 'hello1', 'hello1@example.com', '$2y$10$Zhn3AjPfsQhAYkta4k06/.z1evNixudXviQlAK0NVEXRQcniqln4G', '5e4cd735b33959.61866800.png', 0, 1),
(3, 'hello2@example.com', 'hello2@example.com', '$2y$10$gqU6pMCZLdYda9RO38uOaOiIhBnRNwsBeZnAel5sEFWRw0R7J0h/K', '5e4e1e93a03551.20743619.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

DROP TABLE IF EXISTS `user_sessions`;
CREATE TABLE IF NOT EXISTS `user_sessions` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
