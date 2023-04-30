-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 04:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ez2buygames`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `game_name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `date_added` datetime NOT NULL,
  `release_date` datetime NOT NULL,
  `stock` int(100) NOT NULL,
  `genre` varchar(128) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `price` int(100) NOT NULL,
  `game_points` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone_num` int(20) NOT NULL,
  `user_points` int(100) NOT NULL,
  `wallet` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `username`, `password`, `address`, `email`, `phone_num`, `user_points`, `wallet`) VALUES
(3, 'Jed', 'Guzman', 'golgo', '$2y$10$C53Q6ZhJuUv3o5PcTiyEDul4j72WIzsZI2poeHtEo.5BZyYmnR7ry', '777 rue lavoie Montreal Qc Canada', 'jed@gmail.ca', 514, 0, 20),
(4, 'Majed', 'De Guzman', 'Jed24', '$2y$10$vPG0/VXo5LeEMKOYIzN3EeWPyAmhJVQYeK/zb9dzLcxYZZh.mMdDC', '7777 rue de lavoie Montreal, Canada', 'jed@gmail.com', 514, 0, 20),
(5, 'Majed', 'Guzman', 'Jed25', '$2y$10$Hj/7rECRtCkxF2ICljoyt.HLwzMqjnIZXZXrIeP7dcFGg4tpAvQrG', '7777 rue de lavoie Montreal, Canada', 'jed@gmail.com', 514, 0, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
