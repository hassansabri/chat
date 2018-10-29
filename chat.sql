-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 07:31 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_group`
--

CREATE TABLE `chat_group` (
  `chat_group_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `created_date` bigint(20) NOT NULL,
  `modified_date` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_group`
--

INSERT INTO `chat_group` (`chat_group_id`, `name`, `is_active`, `is_delete`, `created_date`, `modified_date`) VALUES
(1, 'Testing group', 1, 0, 1516776862, 1516776862);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `user_id_from` bigint(20) NOT NULL,
  `user_id_to` bigint(20) NOT NULL,
  `message_type` enum('text','file') NOT NULL DEFAULT 'text',
  `file_org_name` varchar(255) DEFAULT NULL,
  `chat_type` enum('single','group') NOT NULL DEFAULT 'single',
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `created_date` bigint(20) NOT NULL,
  `modified_date` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_type` enum('admin','normal','super_admin','representative','operations','test') NOT NULL DEFAULT 'normal',
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `passport_no` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `emergency_number` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `created_date` bigint(20) NOT NULL,
  `modified_date` bigint(20) NOT NULL,
  `random_id` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `geo_address` varchar(255) NOT NULL,
  `radius` int(11) NOT NULL,
  `entity_id` bigint(20) NOT NULL DEFAULT '0',
  `nationality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `user_name`, `name`, `user_type`, `email`, `password`, `gender`, `phone`, `user_image`, `passport_no`, `blood_group`, `emergency_number`, `designation`, `is_active`, `is_delete`, `created_date`, `modified_date`, `random_id`, `latitude`, `longitude`, `geo_address`, `radius`, `entity_id`, `nationality`) VALUES
(1, 'A', 'Muhammad Hassan Sabri', 'admin', 'hassan@kafaat.me', '21232f297a57a5a743894a0e4a801fc3', 'Male', '+971528419988', '93811035.jpg', 'd13d24t2123', 'B+', '00971528419988', 'Web Application Developer', 1, 0, 1471718201, 1508334315, '12323341436345', 25.395, 55.4515, 'Rashidiya Towers - Abuhrirh St - Ajman - United Arab Emirates', 50, 0, 'Pakistan'),
(2, 'B', 'Qaisar Mahmood', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Male', '+971528419988', '93811035.jpg', 'd13d24t2123', 'B+', '00971528419988', 'Web Application Developer', 1, 0, 1471718201, 1508334315, '12323341436345', 25.395, 55.4515, '', 50, 0, 'Pakistan'),
(3, 'C', 'Waleed Shakir', 'admin', 'adminc', '21232f297a57a5a743894a0e4a801fc3', 'Male', '+971528419988', '93811035.jpg', 'd13d24t2123', 'B+', '00971528419988', 'Web Application Developer', 1, 0, 1471718201, 1508334315, '12323341436345', 25.395, 55.4515, 'Rashidiya Towers - Abuhrirh St - Ajman - United Arab Emirates', 50, 0, 'Pakistan'),
(4, 'D', 'Majid Husan', 'admin', 'admind', '21232f297a57a5a743894a0e4a801fc3', 'Male', '+971528419988', '93811035.jpg', 'd13d24t2123', 'B+', '00971528419988', 'Web Application Developer', 1, 0, 1471718201, 1508334315, '12323341436345', 25.395, 55.4515, '', 50, 0, 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `user_group_id` bigint(20) UNSIGNED NOT NULL,
  `chat_group_id_fk` bigint(20) NOT NULL,
  `user_id_fk` bigint(20) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `created_date` bigint(20) NOT NULL,
  `modified_date` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`user_group_id`, `chat_group_id_fk`, `user_id_fk`, `is_active`, `is_delete`, `created_date`, `modified_date`) VALUES
(1, 1, 1, 1, 0, 1516776862, 1516776862),
(2, 1, 2, 1, 0, 1516776862, 1516776862),
(3, 1, 3, 1, 0, 1516776862, 1516776862);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_group`
--
ALTER TABLE `chat_group`
  ADD PRIMARY KEY (`chat_group_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`user_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_group`
--
ALTER TABLE `chat_group`
  MODIFY `chat_group_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `user_group_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
