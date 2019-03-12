-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2019 at 09:26 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(100) NOT NULL,
  `user_id` int(254) NOT NULL,
  `task_title` varchar(254) NOT NULL,
  `task_description` text NOT NULL,
  `task_accomplish_method` varchar(254) NOT NULL,
  `task_time` varchar(254) NOT NULL,
  `task_date` varchar(254) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `user_id`, `task_title`, `task_description`, `task_accomplish_method`, `task_time`, `task_date`, `status`) VALUES
(11, 4, 'Go movies', 'Tu you', '', '01:17 PM', '2019-02-05', 0),
(57, 2, 'Reading book', 'Dhggggggggggggggggggggg', '', '12:41 PM', '2019-02-23', 1),
(58, 2, 'Friend', 'Ssssssssssssssssssss', '', '12:43 PM', '2019-02-14', 1),
(60, 2, 'Go movies', 'Ggggggggggggggg', '', '01:18 PM', '2019-02-23', 1),
(61, 2, 'Play video game', 'Jjjjjjhhhhhhhhhhhhhhh', '', '01:20 PM', '2019-02-23', 0),
(62, 3, 'Play video game', 'I will play game with my friends', '', '09:29 AM', '2019-02-23', 0),
(64, 1, 'Go movies again', 'Adfffffffffff', '', '09:30 AM', '2019-02-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `ip` varchar(254) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `name`, `ip`) VALUES
(1, 'juniCodefire', '$2y$10$9Fp0gyUvi/I4giqtbi1llOOYWXmENFKCWekCrS6j3oKIOynOviEFS', 'junipreach2017@gmail.com', 'Obi okechukwu', '127.0.0.1'),
(2, 'juniflyer', '$2y$10$FmguCsPbDZHlP.P5.Y10Pesoihl41xenbsXEpRSWEXc2Xrtp8vWiu', 'juniworld2017@gmail.com', 'David chukwunonye', '127.0.0.1'),
(3, 'tino', '$2y$10$WAVBQATMv2s29Ce3BsqrxO1FzIIO7iDKF4vKO3WsAzLWoMYyqlnIW', 'tino@gmail.com', 'Tino black', '127.0.0.1'),
(4, 'fredo', '$2y$10$pPheW9u28TwmRytjblS6nufAJXlwhNmFB6/iJdENVHyemNTTcjVcq', 'fredo2019@gmail.com', 'Fred Nwachukwu', '127.0.0.1'),
(5, 'francis', '$2y$10$aZAyL/YtlDRboP7rnAcUAuIIAYivcnlZibAVLTTuazaDGxxbJBqYy', 'francis@gmail.com', 'Francis', '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
