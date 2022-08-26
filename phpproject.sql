-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2021 at 10:20 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `events_table`
--

DROP TABLE IF EXISTS `events_table`;
CREATE TABLE IF NOT EXISTS `events_table` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `frst_team_name` varchar(100) NOT NULL,
  `frst_team_result` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `scnd_team_name` varchar(100) NOT NULL,
  `scnd_team_result` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `event_time` varchar(20) NOT NULL,
  `event_date` varchar(20) NOT NULL,
  `event_comp` varchar(100) NOT NULL,
  `event_channel` varchar(100) NOT NULL,
  `event_com` varchar(100) NOT NULL,
  `event_place` varchar(100) NOT NULL,
  `event_status` int NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events_table`
--

INSERT INTO `events_table` (`event_id`, `frst_team_name`, `frst_team_result`, `scnd_team_name`, `scnd_team_result`, `event_time`, `event_date`, `event_comp`, `event_channel`, `event_com`, `event_place`, `event_status`) VALUES
(1, 'BARCELONA', NULL, 'REAL MADRID', NULL, '20:00', '11/24/2021', 'UEFA Champions League', 'CBS Sport 3 (English)', 'Martin Tyler', 'Camp nuo', 0),
(2, 'BARCELONA', NULL, 'REAL MADRID', NULL, '14:00', '11/30/2021', 'UEFA Champions League', 'CBS Sport 3 (English)', 'Martin Tyler', 'Camp nuo', 0),
(3, 'Chelsea', '0', 'manchester United', '0', '20:30', '11/30/2021', 'The Premier League', 'Sky Sport 1', 'Gary Neville', 'Stamford Bridge', 1),
(4, 'HILAL', NULL, 'POHANG', NULL, '19:00', '11/30/2021', 'ACL Champions', 'SSC Sport 2+3', 'Fahad Al-Otaibi', 'King Fahad Stadium', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

DROP TABLE IF EXISTS `users_table`;
CREATE TABLE IF NOT EXISTS `users_table` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_image` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `full_name`, `username`, `email`, `password`, `birth_date`, `gender`, `user_status`, `user_image`) VALUES
(18, 'Osama albuhairy', 'osama4', 'osama3@gmail.com', '$2y$10$yIGFzwSpNFgmYfVJ5i/TYuse0iM/a7U7k1qYFIfumTlYQJYOLV5Fa', '1999-03-27', 'Male', 1, 'user.jpg'),
(25, 'Osama mohd', 'osama3', 'osama3@gmai.com', '$2y$10$aaVZnDcSuWaqBDBs0sacB.V.LMkYlI5v/BlL5r81XN2oY5KqkNF4a', '2000-01-15', 'Male', 1, 'user.jpg'),
(4, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$TLQAFbt9XGO0UGYqnU7Sae6ccsK6GQTbwulMpfquVCo0VysZ26jYW', '2000-01-15', 'Male', 1, 'admin.jpg'),
(16, 'Mohammed', 'mohd', 'mohd@gmail.com', '$2y$10$l4HP0207OGG1FR3KHTXfquNMdHyDQYOvGGh.OzXCKTordiiVKqloO', '2000-01-15', 'Female', 1, 'user.jpg'),
(23, 'Try4', 'try4', 'try4@gmail.com', '$2y$10$AvnGqgKu/lQp7Z3R.IIdZO8hDpfGQS1AAvYzMs/SF.6zYud.JdNM.', '2000-01-15', 'Male', 0, 'user.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
