-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 04:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfid_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_logs`
--

CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL,
  `device_api_key` varchar(20) NOT NULL DEFAULT 'None',
  `student_card_id` varchar(20) NOT NULL DEFAULT 'None',
  `student_id` varchar(20) NOT NULL DEFAULT 'None',
  `hallpass` varchar(20) NOT NULL DEFAULT 'None',
  `log_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `api_logs`
--

INSERT INTO `api_logs` (`id`, `device_api_key`, `student_card_id`, `student_id`, `hallpass`, `log_created`) VALUES
(14, 'abc123', '13811013859', '', '', '2023-03-19 16:23:08'),
(15, 'abc123', '8325420016', '', '', '2023-03-19 16:23:15'),
(16, 'abc123', '20617422067', '', '', '2023-03-19 16:23:22'),
(17, 'abc123', '254180068', '', '', '2023-03-19 16:23:28'),
(18, 'abc123', '238151368', '', '', '2023-03-19 16:23:34'),
(19, 'abc123', '238151368', '', '', '2023-03-19 16:28:13'),
(20, 'abc123', '254180068', '', '', '2023-03-19 16:28:19'),
(21, 'abc123', '20617422067', '', '', '2023-03-19 16:28:25'),
(22, 'abc123', '8325420016', '', '', '2023-03-19 16:28:31'),
(23, 'abc123', '13811013859', '', '', '2023-03-19 16:28:38'),
(24, 'abc123', '2222', '', '', '2023-03-19 16:28:46'),
(25, 'abc123', '12345', '', '', '2023-03-19 16:28:53'),
(26, 'abc123', '67890', '', '', '2023-03-19 16:28:59'),
(27, 'abc123', '1111', '', '', '2023-03-19 16:29:04'),
(28, 'abc123', '22218101', '', '', '2023-03-19 16:29:17'),
(29, 'abc123', '462182568', '', '', '2023-03-19 16:29:23'),
(30, 'abc123', '20617422067', '', '', '2023-03-19 16:29:31'),
(31, 'abc123', '254180068', '', '', '2023-03-19 16:29:37'),
(32, 'abc123', '462182568', '', '', '2023-03-19 16:29:58'),
(33, 'abc123', '238151368', '', '', '2023-03-19 16:30:07'),
(34, 'abc123', '462182568', '', '', '2023-03-19 16:30:14'),
(35, 'abc123', '1451168', '', '', '2023-03-19 16:30:20'),
(36, 'abc123', '238151368', '', '', '2023-03-19 16:31:24'),
(37, 'abc123', '238151368', '', '', '2023-03-19 16:32:12'),
(38, 'abc123', '238151368', '', '', '2023-03-19 16:32:14'),
(39, 'abc123', '462182568', '', '', '2023-03-19 16:32:19'),
(40, 'abc123', '238151368', '', '', '2023-03-19 16:32:25'),
(41, 'abc123', '3333', '', '', '2023-03-22 12:12:37'),
(42, 'abc123', '238151368', '', '', '2023-03-22 12:13:23'),
(43, 'abc123', '8325420016', '', '', '2023-03-22 12:13:32'),
(44, 'abc123', '238151368', '', '', '2023-03-22 12:13:41'),
(45, 'abc123', '8325420016', '', '', '2023-03-22 12:13:49'),
(46, 'abc123', '13811013859', '', '', '2023-03-22 12:13:56'),
(47, 'abc123', '13811013859', '', '', '2023-03-22 12:14:21'),
(48, 'abc123', '4225425259', '', '', '2023-03-22 12:14:47'),
(49, 'abc123', '4225425259', '', '', '2023-03-22 12:15:37'),
(50, 'abc123', '8325420016', '', '', '2023-03-22 12:16:12'),
(51, 'abc123', '8325420016', '', '', '2023-03-22 12:16:19'),
(52, 'abc123', '13811013859', '', '', '2023-03-22 12:16:28'),
(53, 'abc123', '15815868', '', '', '2023-03-22 17:03:40'),
(54, 'abc123', '254180068', '', '', '2023-03-29 15:32:48'),
(55, 'abc123', '254180068', '', '', '2023-03-29 15:33:03'),
(56, 'abc123', '20617422067', '', '', '2023-03-29 15:33:21'),
(57, 'abc123', '254180068', '', '', '2023-03-29 15:33:27'),
(58, 'abc123', '254180068', '', '', '2023-03-29 15:37:23'),
(59, 'abc123', '254180068', '', '', '2023-03-29 15:37:49'),
(60, 'abc123', '31245675', '', '', '2023-03-29 15:45:21'),
(61, 'abc123', '2222351468', '', '', '2023-03-29 15:45:33'),
(62, 'abc123', '2222351468', '', '', '2023-03-29 16:41:21'),
(63, 'abc123', '462182568', '', '', '2023-03-30 15:31:28'),
(64, 'abc123', '238151368', '', '', '2023-03-30 15:31:36'),
(65, 'abc123', '238151368', '', '', '2023-03-30 15:32:08'),
(66, 'abc123', '238151368', '', '', '2023-03-30 15:33:43'),
(67, 'abc123', '238151368', '', '', '2023-03-30 15:34:15'),
(68, 'abc123', '238151368', '', '', '2023-03-30 15:35:56'),
(69, '28-4628-9e55-c11e', '20617422067', '', '', '2023-04-05 14:14:04'),
(70, '28-4628-9e55-c11e', '20617422067', '', '', '2023-04-05 14:14:13'),
(71, '28-4628-9e55-c11e', '20617422067', '', '', '2023-04-05 14:14:20'),
(72, '28-4628-9e55-c11e', '20617422067', '', '', '2023-04-05 14:15:02'),
(73, '28-4628-9e55-c11e', '20617422067', '', '', '2023-04-05 14:15:02'),
(74, '28-4628-9e55-c11e', '20617422067', '', '', '2023-04-05 14:15:03'),
(75, '28-4628-9e55-c11e', '20617422067', '', '', '2023-04-05 14:15:04'),
(76, '28-4628-9e55-c11e', '8325420016', '', '', '2023-04-05 14:15:16'),
(77, '28-4628-9e55-c11e', '8325420016', '', '', '2023-04-05 14:15:47'),
(78, '28-4628-9e55-c11e', '8325420016', '', '', '2023-04-05 14:16:47'),
(79, '28-4628-9e55-c11e', '8325420016', '', '', '2023-04-05 14:17:15'),
(80, '28-4628-9e55-c11e', '20617422067', '', '', '2023-04-05 14:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `device_name` varchar(100) NOT NULL,
  `device_mode` int(11) NOT NULL DEFAULT 0,
  `device_room` varchar(10) NOT NULL DEFAULT 'None',
  `device_api_key` varchar(20) NOT NULL DEFAULT 'None',
  `device_id` double NOT NULL DEFAULT 0,
  `device_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device_name`, `device_mode`, `device_room`, `device_api_key`, `device_id`, `device_created`) VALUES
(4, 'STP12P1', 1, '301', '28-4628-9e55-c11e', 0, '2023-03-31'),
(10, 'TEST', 0, '2142334', 'dd-49a4-8a88-d075', 0, '2023-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_id` double NOT NULL DEFAULT 0,
  `student_room` varchar(10) NOT NULL DEFAULT 'None',
  `student_section` varchar(10) NOT NULL DEFAULT 'None',
  `student_gender` varchar(10) NOT NULL DEFAULT 'None',
  `student_card_id` varchar(30) NOT NULL DEFAULT 'None',
  `student_time_in` time NOT NULL DEFAULT '00:00:00',
  `student_time_out` time NOT NULL DEFAULT '00:00:00',
  `parents_name` varchar(100) NOT NULL DEFAULT 'None',
  `paraents_number` varchar(30) NOT NULL DEFAULT 'None',
  `last_destination` varchar(30) NOT NULL DEFAULT 'None',
  `device_registered` varchar(30) NOT NULL,
  `student_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `student_id`, `student_room`, `student_section`, `student_gender`, `student_card_id`, `student_time_in`, `student_time_out`, `parents_name`, `paraents_number`, `last_destination`, `device_registered`, `student_created`) VALUES
(8, 'Adrienne O. Bocado', 12345, 'A2-301', 'ST12P1', 'Female', '8325420016', '02:00:00', '03:00:00', 'None', 'None', 'None', 'Device-1', '0000-00-00'),
(9, 'Kent A. Rato', 22218101, 'A3-301', 'ST12P1', 'Male', '13811013859', '00:00:00', '00:00:00', 'None', 'None', 'None', '', '0000-00-00'),
(10, 'Nash Penosa', 22221170, 'A3-301', 'ST12P1', 'Male', '4225425259', '00:00:00', '00:00:00', 'None', 'None', 'None', '', '0000-00-00'),
(11, 'Test 2', 9876, 'A3-302', 'ST12P2', 'Male', '254180068', '00:00:00', '00:00:00', 'None', 'None', 'None', '', '0000-00-00'),
(12, 'Test 3', 54321, 'A3-302', 'ST12P2', 'Male', '238151368', '00:00:00', '00:00:00', 'None', 'None', 'None', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `students_logs`
--

CREATE TABLE `students_logs` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_id` double NOT NULL,
  `student_section` varchar(10) NOT NULL,
  `student_card_id` double NOT NULL,
  `student_time_in` time NOT NULL DEFAULT '00:00:00',
  `student_time_out` time NOT NULL DEFAULT '00:00:00',
  `student_card_out` tinyint(1) DEFAULT NULL,
  `device_name` varchar(100) NOT NULL,
  `device_room` varchar(10) NOT NULL,
  `last_destination` varchar(30) NOT NULL DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students_logs`
--

INSERT INTO `students_logs` (`id`, `student_name`, `student_id`, `student_section`, `student_card_id`, `student_time_in`, `student_time_out`, `student_card_out`, `device_name`, `device_room`, `last_destination`) VALUES
(40, 'Kent', 123456, 'ST12P1', 123123, '17:23:32', '00:00:00', 0, 'Room 1', 'Room 1', 'None'),
(41, 'Kent', 123456, 'ST12P1', 123123, '17:26:58', '00:00:00', NULL, 'Room 1', 'Room 1', 'None'),
(42, 'Kent', 123456, 'ST12P1', 123123, '17:27:04', '00:00:00', NULL, 'Room 1', 'Room 1', 'None'),
(43, 'Kent', 123456, 'ST12P1', 8325420016, '16:03:31', '00:00:00', NULL, 'Room 1', 'Room 1', 'None'),
(44, 'Kent', 123456, 'ST12P1', 238151368, '17:51:02', '00:00:00', NULL, 'Room 1', 'Room 1', 'None'),
(45, '324r234234', 123456, 'ST12P1', 13811013859, '17:20:19', '00:00:00', NULL, 'Room 1', 'Room 1', 'None'),
(46, 'Kent', 123456, 'ST12P1', 254180068, '17:28:19', '00:00:00', NULL, 'Room 1', 'Room 1', 'None'),
(47, 'Kent', 123456, 'ST12P1', 20617422067, '17:28:25', '00:00:00', NULL, 'Room 1', 'Room 1', 'None'),
(48, 'Kent', 123456, 'ST12P1', 4225425259, '13:15:37', '00:00:00', NULL, 'Room 1', 'Room 1', 'None');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_logs`
--
ALTER TABLE `api_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_logs`
--
ALTER TABLE `students_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_logs`
--
ALTER TABLE `api_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students_logs`
--
ALTER TABLE `students_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
