-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2024 at 04:47 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `llk_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `day_of_week` varchar(255) NOT NULL,
  `pickup_time` time DEFAULT NULL,
  `dropoff_time` time DEFAULT NULL,
  `appointment_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `service_name`, `day_of_week`, `pickup_time`, `dropoff_time`, `appointment_date`, `user_id`, `username`) VALUES
(1, 'Simple Wash Package', 'Saturday', '12:30:00', '12:00:00', '2024-02-15 12:00:00', 2, 'user2'),
(18, 'Simple Wash Package', 'Saturday', '13:00:00', '10:00:00', '2024-03-30 00:00:00', 3, 'yannick'),
(19, 'Simple Wash Package', 'Saturday', '12:30:00', '12:00:00', '2024-03-30 00:00:00', 3, 'yannick'),
(20, 'Vacuum & Shine Package', 'Saturday', '13:45:00', '13:00:00', '2024-03-30 00:00:00', 3, 'yannick'),
(21, 'Simple Wash Package', 'Sunday', '12:30:00', '12:00:00', '2024-03-31 00:00:00', 2, 'user2'),
(22, 'Vacuum & Shine Package', 'Sunday', '12:15:00', '11:30:00', '2024-03-31 00:00:00', 2, 'user2');

-- --------------------------------------------------------

--
-- Table structure for table `days_available`
--

CREATE TABLE `days_available` (
  `day_of_week_id` int(11) NOT NULL,
  `day_of_week` varchar(255) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `days_available`
--

INSERT INTO `days_available` (`day_of_week_id`, `day_of_week`, `start_time`, `end_time`) VALUES
(1, 'Saturday', '2024-02-15 09:00:00', '2024-02-15 05:00:00'),
(2, 'Sunday', '2024-02-16 09:00:00', '2024-02-16 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `duration` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `cost`, `duration`) VALUES
(1, 'Simple Wash Package', '50.00', '00:30:00'),
(2, 'Vacuum & Shine Package', '100.00', '00:45:00'),
(3, 'Full Package', '250.00', '02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` int(11) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `availability` enum('Available','Booked') DEFAULT 'Available',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`id`, `start_time`, `end_time`, `availability`, `created_at`) VALUES
(1, '09:00:00', '09:15:00', 'Booked', '2024-03-28 14:05:51'),
(2, '09:15:00', '09:30:00', 'Available', '2024-03-28 14:05:51'),
(3, '09:30:00', '09:45:00', 'Available', '2024-03-28 14:05:51'),
(4, '09:45:00', '10:00:00', 'Available', '2024-03-28 14:05:51'),
(5, '10:00:00', '10:15:00', 'Available', '2024-03-28 14:13:14'),
(6, '10:15:00', '10:30:00', 'Available', '2024-03-28 14:13:14'),
(7, '10:30:00', '10:45:00', 'Available', '2024-03-28 14:13:14'),
(8, '10:45:00', '11:00:00', 'Available', '2024-03-28 14:13:14'),
(9, '11:00:00', '11:15:00', 'Available', '2024-03-28 14:13:14'),
(10, '11:15:00', '11:30:00', 'Available', '2024-03-28 14:13:14'),
(11, '11:30:00', '11:45:00', 'Available', '2024-03-28 14:13:14'),
(12, '11:45:00', '12:00:00', 'Available', '2024-03-28 14:13:14'),
(13, '12:00:00', '12:15:00', 'Available', '2024-03-28 14:13:14'),
(14, '12:15:00', '12:30:00', 'Available', '2024-03-28 14:13:14'),
(15, '12:30:00', '12:45:00', 'Available', '2024-03-28 14:13:14'),
(16, '12:45:00', '13:00:00', 'Available', '2024-03-28 14:13:14'),
(17, '13:00:00', '13:15:00', 'Available', '2024-03-28 14:13:14'),
(18, '13:15:00', '13:30:00', 'Available', '2024-03-28 14:13:14'),
(19, '13:30:00', '13:45:00', 'Available', '2024-03-28 14:13:14'),
(20, '13:45:00', '14:00:00', 'Available', '2024-03-28 14:13:14'),
(21, '14:00:00', '14:15:00', 'Available', '2024-03-28 14:20:42'),
(22, '14:15:00', '14:30:00', 'Available', '2024-03-28 14:20:42'),
(23, '14:30:00', '14:45:00', 'Available', '2024-03-28 14:20:42'),
(24, '14:45:00', '15:00:00', 'Available', '2024-03-28 14:20:42'),
(25, '15:00:00', '15:15:00', 'Available', '2024-03-28 14:20:42'),
(26, '15:30:00', '15:45:00', 'Available', '2024-03-28 14:20:42'),
(27, '15:45:00', '16:00:00', 'Available', '2024-03-28 14:20:42'),
(28, '16:00:00', '16:15:00', 'Available', '2024-03-28 14:20:42'),
(29, '16:30:00', '16:45:00', 'Available', '2024-03-28 14:20:42'),
(30, '16:45:00', '17:00:00', 'Available', '2024-03-28 14:20:42'),
(31, '17:00:00', '17:15:00', 'Available', '2024-03-28 15:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `users_llk`
--

CREATE TABLE `users_llk` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `u_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_llk`
--

INSERT INTO `users_llk` (`user_id`, `username`, `email`, `u_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin'),
(2, 'user2', 'user2@gmail.com', '12345678'),
(3, 'yannick', 'yannick@gmail.com', '12345678'),
(4, 'karine', 'karine@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `days_available`
--
ALTER TABLE `days_available`
  ADD PRIMARY KEY (`day_of_week_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_llk`
--
ALTER TABLE `users_llk`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `days_available`
--
ALTER TABLE `days_available`
  MODIFY `day_of_week_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users_llk`
--
ALTER TABLE `users_llk`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
