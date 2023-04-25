-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 02:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+08:00";

-- --------------------------------------------------------
--
-- Table structure for table `students`
--
CREATE TABLE
  `students` (
    `id` int (11) NOT NULL,
    `student_name` varchar(100) NOT NULL,
    `student_id` double NOT NULL DEFAULT 0,
    `student_room` varchar(10) NOT NULL DEFAULT 'None',
    `student_section` varchar(10) NOT NULL DEFAULT 'None',
    `student_gender` varchar(10) NOT NULL DEFAULT 'None',
    `student_card_id` double NOT NULL DEFAULT 0,
    `student_time_in` time NOT NULL DEFAULT 'None',
    `student_time_out` time NOT NULL DEFAULT 'None',
    `parents_name` varchar(100) NOT NULL DEFAULT 'None',
    `paraents_number` varchar(30) NOT NULL DEFAULT 'None',
    `last_destination` varchar(30) NOT NULL DEFAULT 'None',
    `device_registered` varchar(30) NOT NULL,
    `student_created` date NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

ALTER TABLE `students` ADD PRIMARY KEY (`id`);

ALTER TABLE `students` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 1;

CREATE TABLE
  `devices` (
    `id` int (11) NOT NULL,
    `device_name` varchar(100) NOT NULL,
    `device_mode` int (11) NOT NULL DEFAULT 0,
    `device_room` varchar(10) NOT NULL DEFAULT 'None',
    `device_api_key` varchar(20) NOT NULL DEFAULT 'None',
    `device_id` double NOT NULL DEFAULT 0,
    `device_created` date NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

ALTER TABLE `devices` ADD PRIMARY KEY (`id`);

ALTER TABLE `devices` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 1;

CREATE TABLE
  `students_logs` (
    `id` int (11) NOT NULL,
    `student_name` varchar(100) NOT NULL,
    `student_id` double NOT NULL,
    `student_section` varchar(10) NOT NULL,
    `student_card_id` double NOT NULL,
    `student_time_in` time NOT NULL DEFAULT '00:00:00',
    `student_time_out` time NOT NULL DEFAULT '00:00:00',
    `student_card_out` int NOT NULL DEFAULT 0,
    `device_name` varchar(100) NOT NULL,
    `device_room` varchar(10) NOT NULL,
    `last_destination` varchar(30) NOT NULL DEFAULT 'None',
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

ALTER TABLE `students_logs` ADD PRIMARY KEY (`id`);

ALTER TABLE `students_logs` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 1;

COMMIT;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfidattendance`
--
-- --------------------------------------------------------
--
-- Table structure for table `admin`
--
CREATE TABLE
  `admin` (
    `id` int (11) NOT NULL,
    `admin_name` varchar(30) NOT NULL,
    `admin_email` varchar(80) NOT NULL,
    `admin_pwd` longtext NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

-- --------------------------------------------------------
--
-- Table structure for table `devices`
--
CREATE TABLE
  `devices` (
    `id` int (11) NOT NULL,
    `device_name` varchar(50) NOT NULL,
    `device_dep` varchar(20) NOT NULL,
    `device_uid` text NOT NULL,
    `device_date` date NOT NULL,
    `device_mode` tinyint (1) NOT NULL DEFAULT 0
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

--
-- Dumping data for table `devices`
--
INSERT INTO
  `devices` (
    `id`,
    `device_name`,
    `device_dep`,
    `device_uid`,
    `device_date`,
    `device_mode`
  )
VALUES
  (
    2,
    'TEST',
    'home',
    'd68aabce17696838',
    '2023-03-04',
    1
  );

--
-- Dumping data for table `users`
--
INSERT INTO
  `users` (
    `id`,
    `username`,
    `serialnumber`,
    `gender`,
    `email`,
    `card_uid`,
    `card_select`,
    `user_date`,
    `device_uid`,
    `device_dep`,
    `add_card`
  )
VALUES
  (
    6,
    'CARD',
    1234,
    'Male',
    'kent@rato.com',
    '8325420016',
    0,
    '2023-03-04',
    'd68aabce17696838',
    'home',
    1
  ),
  (
    7,
    'blue tag',
    4567,
    'Female',
    'Sasay@rato.com',
    '172174374',
    1,
    '2023-03-04',
    'd68aabce17696838',
    'home',
    1
  );

-- --------------------------------------------------------
--
-- Table structure for table `users_logs`
--
CREATE TABLE
  `users_logs` (
    `id` int (11) NOT NULL,
    `username` varchar(100) NOT NULL,
    `serialnumber` double NOT NULL,
    `card_uid` varchar(30) NOT NULL,
    `device_uid` varchar(20) NOT NULL,
    `device_dep` varchar(20) NOT NULL,
    `checkindate` date NOT NULL,
    `timein` time NOT NULL,
    `timeout` time NOT NULL,
    `card_out` tinyint (1) NOT NULL DEFAULT 0
  ) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

--
-- Dumping data for table `users_logs`
--
INSERT INTO
  `users_logs` (
    `id`,
    `username`,
    `serialnumber`,
    `card_uid`,
    `device_uid`,
    `device_dep`,
    `checkindate`,
    `timein`,
    `timeout`,
    `card_out`
  )
VALUES
  (
    27,
    'CARD',
    1234,
    '8325420016',
    'd68aabce17696838',
    'home',
    '2023-03-04',
    '14:16:44',
    '14:22:08',
    1
  ),
  (
    28,
    'CARD',
    1234,
    '8325420016',
    'd68aabce17696838',
    'home',
    '2023-03-04',
    '14:22:11',
    '14:22:49',
    1
  ),
  (
    29,
    'blue tag',
    4567,
    '172174374',
    'd68aabce17696838',
    'home',
    '2023-03-04',
    '14:22:34',
    '14:22:54',
    1
  ),
  (
    30,
    'blue tag',
    4567,
    '172174374',
    'd68aabce17696838',
    'home',
    '2023-03-04',
    '14:22:56',
    '00:00:00',
    0
  ),
  (
    31,
    'CARD',
    1234,
    '8325420016',
    'd68aabce17696838',
    'home',
    '2023-03-04',
    '16:38:38',
    '00:00:00',
    0
  );

--
-- Indexes for dumped tables
--
--
-- Indexes for table `admin`
--
ALTER TABLE `admin` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_logs`
--
ALTER TABLE `users_logs` ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 8;

--
-- AUTO_INCREMENT for table `users_logs`
--
ALTER TABLE `users_logs` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 32;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;