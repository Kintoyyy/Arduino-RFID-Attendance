-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 10.15.0.5
-- Generation Time: Apr 10, 2023 at 04:21 PM
-- Server version: 10.5.16-MariaDB-log
-- PHP Version: 8.0.21

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
-- Table structure for table `attendance_logs`
--

CREATE TABLE `attendance_logs` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `api_log` int(11) NOT NULL,
  `attendance_event` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `device_api_logs`
--

CREATE TABLE `device_api_logs` (
  `id` int(11) NOT NULL,
  `device_api_key` varchar(30) NOT NULL,
  `student_id` int(20) DEFAULT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `device_data`
--

CREATE TABLE `device_data` (
  `id` int(11) NOT NULL,
  `device_api_key` varchar(30) NOT NULL,
  `device_name` varchar(30) NOT NULL,
  `device_room` varchar(20) DEFAULT NULL,
  `device_floor` varchar(30) DEFAULT NULL,
  `device_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `device_mode` int(11) NOT NULL DEFAULT 0,
  `device_building` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `device_data`
--

INSERT INTO `device_data` (`id`, `device_api_key`, `device_name`, `device_room`, `device_floor`, `device_created`, `device_mode`, `device_building`) VALUES
(4, '7e-4122-a3cf-40fd', 'ST12P1', '301', '3', '2023-04-10 14:22:07', 1, 'Annex 2'),
(5, 'd6-4870-aa31-b575', 'ST12P2', '302', '3', '2023-04-10 14:22:41', 1, 'Annex 2'),
(10, '16-4193-8171-cab4', 'ST12P3', '303', '3', '2023-04-10 15:23:07', 1, 'Annex 2'),
(11, '05-472c-8f58-fbcc', 'ST12P4', '304', '3', '2023-04-10 16:17:08', 1, 'Annex 2'),
(12, '8d-4602-b8af-d04c', 'ST12P5', '305', '3', '2023-04-10 16:17:53', 1, 'Annex 2'),
(13, 'a4-47dd-8cc8-54c0', 'AB11A2', '307', '3', '2023-04-10 16:18:48', 1, 'Annex 2');

-- --------------------------------------------------------

--
-- Table structure for table `device_logs`
--

CREATE TABLE `device_logs` (
  `id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `api_log` int(11) NOT NULL,
  `device_event` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hallpass_data`
--

CREATE TABLE `hallpass_data` (
  `id` int(11) NOT NULL,
  `hallpass_name` varchar(50) NOT NULL,
  `hallpass_destination` varchar(20) NOT NULL,
  `hallpass_room` varchar(20) NOT NULL,
  `hallpass_floor` varchar(20) DEFAULT NULL,
  `keypad_key` char(1) NOT NULL,
  `hallpass_limit` time DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hallpass_data`
--

INSERT INTO `hallpass_data` (`id`, `hallpass_name`, `hallpass_destination`, `hallpass_room`, `hallpass_floor`, `keypad_key`, `hallpass_limit`) VALUES
(4, 'CR', 'Comfort Room', '2nd floor', NULL, 'A', '00:15:00'),
(11, 'Faculty Room', 'Faculty', '4th Floor', NULL, 'B', '00:45:00'),
(14, 'Canteen', 'Canteen', '5th Floor', NULL, 'C', '01:20:00'),
(15, 'LA BURAT ORY', 'BALAY SA GWAPO', 'SHEEESHHHHHH', NULL, 'D', '24:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hallpass_logs`
--

CREATE TABLE `hallpass_logs` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `hallpass_id` int(11) NOT NULL,
  `api_log` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hallpass_activated_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students_data`
--

CREATE TABLE `students_data` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_section` int(11) NOT NULL,
  `student_gender` varchar(10) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `student_card_id` int(11) NOT NULL,
  `student_registered` int(11) NOT NULL,
  `student_image` varbinary(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_sections`
--

CREATE TABLE `student_sections` (
  `id` int(11) NOT NULL,
  `section_name` varchar(20) NOT NULL,
  `section_adviser` varchar(50) NOT NULL,
  `section_room` varchar(20) NOT NULL,
  `section_floor` varchar(20) NOT NULL,
  `section_building` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_privilege` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_logs`
--
ALTER TABLE `attendance_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_logs_student_id_students_data_id` (`student_id`),
  ADD KEY `attendance_logs_api_log_device_api_logs_id` (`api_log`);

--
-- Indexes for table `device_api_logs`
--
ALTER TABLE `device_api_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_api_logs_device_api_key_device_data_device_api_key` (`device_api_key`),
  ADD KEY `device_api_logs_student_id_students_data_id` (`student_id`);

--
-- Indexes for table `device_data`
--
ALTER TABLE `device_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `device_api_key` (`device_api_key`);

--
-- Indexes for table `device_logs`
--
ALTER TABLE `device_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_logs_device_id_device_data_id` (`device_id`),
  ADD KEY `device_logs_api_log_device_api_logs_id` (`api_log`);

--
-- Indexes for table `hallpass_data`
--
ALTER TABLE `hallpass_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keypad_key` (`keypad_key`);

--
-- Indexes for table `hallpass_logs`
--
ALTER TABLE `hallpass_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hallpass_logs_student_id_students_data_id` (`student_id`),
  ADD KEY `hallpass_logs_hallpass_id_hallpass_data_id` (`hallpass_id`),
  ADD KEY `hallpass_logs_api_log_device_api_logs_id` (`api_log`);

--
-- Indexes for table `students_data`
--
ALTER TABLE `students_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD UNIQUE KEY `student_card_id` (`student_card_id`),
  ADD KEY `students_data_student_section_student_sections_id` (`student_section`),
  ADD KEY `students_data_student_registered_device_data_id` (`student_registered`);

--
-- Indexes for table `student_sections`
--
ALTER TABLE `student_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_logs`
--
ALTER TABLE `attendance_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_api_logs`
--
ALTER TABLE `device_api_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_data`
--
ALTER TABLE `device_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `device_logs`
--
ALTER TABLE `device_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hallpass_data`
--
ALTER TABLE `hallpass_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hallpass_logs`
--
ALTER TABLE `hallpass_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students_data`
--
ALTER TABLE `students_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_sections`
--
ALTER TABLE `student_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_logs`
--
ALTER TABLE `attendance_logs`
  ADD CONSTRAINT `attendance_logs_api_log_device_api_logs_id` FOREIGN KEY (`api_log`) REFERENCES `device_api_logs` (`id`),
  ADD CONSTRAINT `attendance_logs_student_id_students_data_id` FOREIGN KEY (`student_id`) REFERENCES `students_data` (`id`);

--
-- Constraints for table `device_api_logs`
--
ALTER TABLE `device_api_logs`
  ADD CONSTRAINT `device_api_logs_device_api_key_device_data_device_api_key` FOREIGN KEY (`device_api_key`) REFERENCES `device_data` (`device_api_key`),
  ADD CONSTRAINT `device_api_logs_student_id_students_data_id` FOREIGN KEY (`student_id`) REFERENCES `students_data` (`id`);

--
-- Constraints for table `device_logs`
--
ALTER TABLE `device_logs`
  ADD CONSTRAINT `device_logs_api_log_device_api_logs_id` FOREIGN KEY (`api_log`) REFERENCES `device_api_logs` (`id`),
  ADD CONSTRAINT `device_logs_device_id_device_data_id` FOREIGN KEY (`device_id`) REFERENCES `device_data` (`id`);

--
-- Constraints for table `hallpass_logs`
--
ALTER TABLE `hallpass_logs`
  ADD CONSTRAINT `hallpass_logs_api_log_device_api_logs_id` FOREIGN KEY (`api_log`) REFERENCES `device_api_logs` (`id`),
  ADD CONSTRAINT `hallpass_logs_hallpass_id_hallpass_data_id` FOREIGN KEY (`hallpass_id`) REFERENCES `hallpass_data` (`id`),
  ADD CONSTRAINT `hallpass_logs_student_id_students_data_id` FOREIGN KEY (`student_id`) REFERENCES `students_data` (`id`);

--
-- Constraints for table `students_data`
--
ALTER TABLE `students_data`
  ADD CONSTRAINT `students_data_student_registered_device_data_id` FOREIGN KEY (`student_registered`) REFERENCES `device_data` (`id`),
  ADD CONSTRAINT `students_data_student_section_student_sections_id` FOREIGN KEY (`student_section`) REFERENCES `student_sections` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
