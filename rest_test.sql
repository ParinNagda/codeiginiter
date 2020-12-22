-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 12:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `key_val`
--

CREATE TABLE `key_val` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `key_val` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `key_val`
--

INSERT INTO `key_val` (`id`, `name`, `key_val`) VALUES
(1, 'a', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `role_type` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `email`, `phone`, `role_type`, `created_date`, `status`) VALUES
(1, 's', 's', 'sdsd', 'parin@gmail.com', '7977525271', 0, '2020-12-22 07:02:44', 0),
(3, 'james', 'bond', 'abc@123', 'bond@007.com', '0071234007', 1, '2020-12-21 18:25:02', 1),
(4, 'sad', 'sada', 'MD@2020', 'simran@meddco.in', '', 1, '2020-12-22 03:42:52', 0),
(8, 'sad', 'sada', 'sd', 'simran@meddco.in', '', 0, '2020-12-22 04:18:59', 0),
(10, 'sdsdsds', 'dsasd', 'MD@2020', 'simran@meddco.in', '', 1, '2020-12-22 04:34:33', 0),
(18, 'ssss', 'ffffffff', 'MD@2020', 'simran@meddco.in', '', 0, '2020-12-22 07:02:30', 0),
(19, 'sssssssssssssssssssssss', 'd', 'MD@2020', 'simran@meddco.in', '', 1, '2020-12-22 06:55:08', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `key_val`
--
ALTER TABLE `key_val`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `key_val`
--
ALTER TABLE `key_val`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
