-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 01:47 PM
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
-- Database: `ur_consultancy`
--

-- --------------------------------------------------------

--
-- Table structure for table `block_user`
--

CREATE TABLE `block_user` (
  `block_user_id` int(11) NOT NULL,
  `block_user_blocker` int(11) NOT NULL,
  `block_user_blockee` int(11) NOT NULL,
  `block_user_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `campus_id` int(11) NOT NULL,
  `campus_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(60) NOT NULL,
  `client_email` varchar(60) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(11) NOT NULL,
  `college_name` text NOT NULL,
  `campus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consultancy`
--

CREATE TABLE `consultancy` (
  `consultancy_id` int(11) NOT NULL,
  `consultancy_name` text NOT NULL,
  `consultancy_sign_date` datetime NOT NULL,
  `consultancy_start_date` date NOT NULL,
  `consultancy_end_date` date NOT NULL,
  `consultancy_amount` double NOT NULL,
  `consultancy_currency` varchar(10) NOT NULL,
  `consultancy_UR_percentage` double NOT NULL,
  `consultancy_Tax_percentage` double NOT NULL,
  `consultancy_consultants_percentage` double NOT NULL,
  `consultancy_client_id` int(11) NOT NULL,
  `consultancy_progress` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_progress`
--

CREATE TABLE `consultancy_progress` (
  `consultancy_progress_id` int(11) NOT NULL,
  `consultancy_progress_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultancy_progress`
--

INSERT INTO `consultancy_progress` (`consultancy_progress_id`, `consultancy_progress_name`) VALUES
(1, 'Ongoing'),
(2, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `consultant_contract`
--

CREATE TABLE `consultant_contract` (
  `consultant_contract_id` int(11) NOT NULL,
  `contract_consultancy_id` int(11) NOT NULL,
  `contract_consultant_id` int(11) NOT NULL,
  `contract_sign_date` datetime NOT NULL,
  `contract_start_date` date NOT NULL,
  `contract_end_date` date NOT NULL,
  `contract_amount` double NOT NULL,
  `contract_assigner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'Rwanda'),
(2, 'Uganda'),
(3, 'Tanzania'),
(4, 'Kenya'),
(5, 'Morroco');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` text NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_content` text DEFAULT NULL,
  `message_file_docs` varchar(45) DEFAULT NULL,
  `message_img` varchar(45) DEFAULT NULL,
  `message_send_date` datetime NOT NULL,
  `message_sender_id` int(11) NOT NULL,
  `message_receiver_id` int(11) NOT NULL,
  `message_status_id` int(11) NOT NULL DEFAULT 1,
  `message_reads` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message_read`
--

CREATE TABLE `message_read` (
  `message_read_id` int(11) NOT NULL,
  `message_read_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_read`
--

INSERT INTO `message_read` (`message_read_id`, `message_read_name`) VALUES
(1, 'READ'),
(2, 'UNREAD');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `reset_password_id` int(11) NOT NULL,
  `reset_password_user` int(11) NOT NULL,
  `reset_password_date` datetime NOT NULL,
  `reset_password_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `school_name` text NOT NULL,
  `college_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'ON'),
(2, 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(45) NOT NULL,
  `user_last_name` varchar(45) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_national_id` varchar(20) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `user_status_id` int(11) NOT NULL DEFAULT 1,
  `user_type_id` int(11) NOT NULL,
  `user_profile_image` varchar(45) NOT NULL,
  `user_adder_id` int(11) NOT NULL,
  `user_last_active` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type`) VALUES
(1, 'ADMIN'),
(2, 'BDCS'),
(3, 'CONSULTANT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block_user`
--
ALTER TABLE `block_user`
  ADD PRIMARY KEY (`block_user_id`),
  ADD KEY `block.users.blocker_idx` (`block_user_blocker`),
  ADD KEY `block.users.blockee_idx` (`block_user_blockee`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`campus_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_email_UNIQUE` (`client_email`),
  ADD KEY `client.country_idx` (`country_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`),
  ADD KEY `college.campus_idx` (`campus_id`);

--
-- Indexes for table `consultancy`
--
ALTER TABLE `consultancy`
  ADD PRIMARY KEY (`consultancy_id`),
  ADD KEY `consultancy.client_idx` (`consultancy_client_id`),
  ADD KEY `consultancy.progress_idx` (`consultancy_progress`);

--
-- Indexes for table `consultancy_progress`
--
ALTER TABLE `consultancy_progress`
  ADD PRIMARY KEY (`consultancy_progress_id`);

--
-- Indexes for table `consultant_contract`
--
ALTER TABLE `consultant_contract`
  ADD PRIMARY KEY (`consultant_contract_id`),
  ADD KEY `contract.consultancy_idx` (`contract_consultancy_id`),
  ADD KEY `contract.consltant_idx` (`contract_consultant_id`),
  ADD KEY `contract.users.assigner_idx` (`contract_assigner_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `department.school_idx` (`school_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message.users_idx` (`message_sender_id`),
  ADD KEY `message.users.receiver_idx` (`message_receiver_id`),
  ADD KEY `message.status_idx` (`message_status_id`),
  ADD KEY `message.reads_idx` (`message_reads`);

--
-- Indexes for table `message_read`
--
ALTER TABLE `message_read`
  ADD PRIMARY KEY (`message_read_id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`reset_password_id`),
  ADD KEY `reset_password.users_idx` (`reset_password_user`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`),
  ADD KEY `school.college_idx` (`college_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_national_id_UNIQUE` (`user_national_id`),
  ADD UNIQUE KEY `user_email_UNIQUE` (`user_email`),
  ADD KEY `users.status_idx` (`user_status_id`),
  ADD KEY `users.user_type_idx` (`user_type_id`),
  ADD KEY `users.users.adder_idx` (`user_adder_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block_user`
--
ALTER TABLE `block_user`
  MODIFY `block_user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `campus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultancy`
--
ALTER TABLE `consultancy`
  MODIFY `consultancy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultancy_progress`
--
ALTER TABLE `consultancy_progress`
  MODIFY `consultancy_progress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consultant_contract`
--
ALTER TABLE `consultant_contract`
  MODIFY `consultant_contract_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_read`
--
ALTER TABLE `message_read`
  MODIFY `message_read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `reset_password_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `block_user`
--
ALTER TABLE `block_user`
  ADD CONSTRAINT `block.users.blockee` FOREIGN KEY (`block_user_blockee`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `block.users.blocker` FOREIGN KEY (`block_user_blocker`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client.country` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `college`
--
ALTER TABLE `college`
  ADD CONSTRAINT `college.campus` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`campus_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultancy`
--
ALTER TABLE `consultancy`
  ADD CONSTRAINT `consultancy.client` FOREIGN KEY (`consultancy_client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultancy.progress` FOREIGN KEY (`consultancy_progress`) REFERENCES `consultancy_progress` (`consultancy_progress_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultant_contract`
--
ALTER TABLE `consultant_contract`
  ADD CONSTRAINT `contract.consultancy` FOREIGN KEY (`contract_consultancy_id`) REFERENCES `consultancy` (`consultancy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract.users.assigner` FOREIGN KEY (`contract_assigner_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract.users.consultant` FOREIGN KEY (`contract_consultant_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department.school` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message.reads` FOREIGN KEY (`message_reads`) REFERENCES `message_read` (`message_read_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message.status` FOREIGN KEY (`message_status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message.users.receiver` FOREIGN KEY (`message_receiver_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message.users.sender` FOREIGN KEY (`message_sender_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD CONSTRAINT `reset_password.users` FOREIGN KEY (`reset_password_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `school.college` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users.status` FOREIGN KEY (`user_status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users.user_type` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users.users.adder` FOREIGN KEY (`user_adder_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
