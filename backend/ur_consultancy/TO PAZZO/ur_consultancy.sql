-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 02:06 PM
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

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`campus_id`, `campus_name`) VALUES
(1, 'NYARUGENGE');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(60) NOT NULL,
  `client_email` varchar(60) NOT NULL,
  `country_id` int(11) NOT NULL,
  `client_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_name`, `client_email`, `country_id`, `client_status`) VALUES
(1, 'Rwanda Social Security Board', 'rssb@rssb.rw', 1, 1),
(2, 'Rwanda National Bank', 'rwandanationalBanK12@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(11) NOT NULL,
  `college_name` text NOT NULL,
  `campus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `college_name`, `campus_id`) VALUES
(1, 'COLLEGE OF SCIENCE AND TECHNOLOGY', 1);

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
  `consultancy_progress` int(11) NOT NULL DEFAULT 1,
  `consultancy_adder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultancy`
--

INSERT INTO `consultancy` (`consultancy_id`, `consultancy_name`, `consultancy_sign_date`, `consultancy_start_date`, `consultancy_end_date`, `consultancy_amount`, `consultancy_currency`, `consultancy_UR_percentage`, `consultancy_Tax_percentage`, `consultancy_consultants_percentage`, `consultancy_client_id`, `consultancy_progress`, `consultancy_adder`) VALUES
(1, 'Rwandan Population Statistics ', '2020-12-22 01:46:23', '2020-12-22', '2021-01-10', 20000, 'USD', 20, 20, 60, 1, 1, 4),
(2, 'People who use smartphones than others in Rwanda', '2020-12-22 01:50:10', '2020-12-22', '2021-01-10', 2000000, 'POUNDS', 10, 20, 70, 2, 1, 4),
(3, 'Rwandan Population Statistics ', '2020-12-23 08:35:41', '2020-12-23', '2021-01-10', 15000, 'RWF', 20, 20, 60, 1, 1, 4);

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
(1, 'IN PROGRESS'),
(2, 'COMPLETED');

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
(5, 'Morroco'),
(6, 'Tunisia');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` text NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `school_id`) VALUES
(1, 'COMPUTER SCIENCE', 3);

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

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_content`, `message_file_docs`, `message_img`, `message_send_date`, `message_sender_id`, `message_receiver_id`, `message_status_id`, `message_reads`) VALUES
(1, 'Hi m boy Pazzo', NULL, NULL, '2020-12-24 08:35:45', 4, 5, 1, 2),
(2, 'Hi m boy Pazzo', NULL, NULL, '2020-12-24 08:37:18', 4, 5, 1, 2),
(3, 'Hi pazzo', NULL, NULL, '2020-12-24 08:40:58', 4, 5, 1, 2),
(4, 'This is good', NULL, NULL, '2020-12-24 08:54:48', 4, 5, 1, 2),
(5, 'This is good', NULL, NULL, '2020-12-24 08:55:24', 4, 5, 1, 2),
(7, 'Hii', NULL, NULL, '2020-12-24 08:56:31', 4, 5, 1, 2),
(8, 'Hello phizzo brother', NULL, NULL, '2020-12-24 08:57:01', 4, 7, 1, 1),
(9, 'Umeze gt se', NULL, NULL, '2020-12-24 08:58:47', 4, 7, 1, 1),
(10, 'Bjr', NULL, NULL, '2020-12-24 09:00:27', 4, 5, 1, 2),
(11, 'Hello', NULL, NULL, '2020-12-24 09:00:49', 4, 5, 1, 2),
(12, 'Boy boy Big man', NULL, NULL, '2020-12-24 09:01:20', 4, 7, 1, 1),
(13, 'Uraryoshye', NULL, NULL, '2020-12-24 09:02:20', 4, 7, 1, 1),
(14, 'Pazzzzz', NULL, NULL, '2020-12-24 09:05:28', 4, 5, 1, 2),
(15, 'Hello', NULL, NULL, '2020-12-24 09:06:39', 4, 7, 1, 1),
(16, 'Yewe, I\\\'m sorry, I have been busy ', NULL, NULL, '2020-12-24 09:11:36', 5, 4, 1, 2),
(17, 'Yewe, I\\\'m sorry, I have been busy ', NULL, NULL, '2020-12-24 09:15:52', 5, 4, 1, 2),
(18, 'But ubu ndahari kkbx', NULL, NULL, '2020-12-24 09:17:51', 5, 4, 1, 2),
(19, 'Pazzo, Salama', NULL, NULL, '2020-12-24 09:19:23', 7, 5, 1, 2),
(20, 'Pazzo, Salama', NULL, NULL, '2020-12-24 09:19:39', 7, 5, 1, 2),
(21, 'Jay P', NULL, NULL, '2020-12-24 09:19:48', 7, 4, 1, 2),
(22, 'Kbx, turaburanye', NULL, NULL, '2020-12-24 09:21:49', 7, 7, 1, 1),
(23, 'Rwanda\\nBurundi', NULL, NULL, '2020-12-24 09:22:39', 7, 7, 1, 1);

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

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `school_name`, `college_id`) VALUES
(3, 'INFORMATION COMMUNICATION AND TECHNOLOGY', 1);

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
  `user_password` varchar(100) NOT NULL,
  `user_status_id` int(11) NOT NULL DEFAULT 1,
  `user_type_id` int(11) NOT NULL,
  `user_country` int(11) NOT NULL,
  `user_profile_image` varchar(100) NOT NULL,
  `user_adder_id` int(11) NOT NULL,
  `user_last_active` datetime NOT NULL,
  `user_department` int(11) NOT NULL,
  `user_location` text NOT NULL DEFAULT 'No entered location',
  `user_education` text NOT NULL DEFAULT 'Not entered',
  `user_summary` text NOT NULL DEFAULT 'No summary',
  `user_phone` varchar(20) NOT NULL DEFAULT 'Input your number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_gender`, `user_national_id`, `user_email`, `user_password`, `user_status_id`, `user_type_id`, `user_country`, `user_profile_image`, `user_adder_id`, `user_last_active`, `user_department`, `user_location`, `user_education`, `user_summary`, `user_phone`) VALUES
(4, 'Mr. Jean Paul', 'NISHIMIRWE', 'M', '1199780117063139', 'nishimirwepaul2015@gmail.com', '$2y$10$/rG2rNMF.LvdvelOuroQQeSVB2JZfMebLHNMMHrH1HNFEpEmfpbI.', 1, 1, 1, 'profile_img/4de7931b4287506ba3a1166beefccb89b.jpg', 4, '2020-12-24 14:05:25', 1, 'Kigali, Rwanda', 'Software Engineering', 'Interested in developing software that aim at changing the world by helping everyone live in better and easy life.\n\nCollaboration and leadership skills are my strengths.', '(+250) 789 336 678'),
(5, 'Patrick', 'ISHIMWE', 'M', '1199680012546588', 'patrickishimwe16@gmail.com', '$2y$10$OXCy5CGHORVrgz2KYJ4zmuQZ0z.B/ouQjTMtT64VDgM.k.PAf4jNe', 1, 2, 1, 'img/mimage.png', 4, '2020-12-24 09:18:57', 1, 'No entered location', 'Not entered', 'No summary', 'Input your number'),
(7, 'Philius', 'HAKIZIMANA', 'M', '1199680012546544', 'hakizaphilius@gmail.com', '$2y$10$5HDLGrap45cFUfr/aVMrROmEY1Ku7bLPQl0Oy.bR5Zn/y8OQZXa0G', 1, 3, 1, 'img/mimage.png', 4, '2020-12-24 10:03:27', 1, 'No entered location', 'Not entered', 'No summary', 'Input your number');

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
  ADD KEY `client.country_idx` (`country_id`),
  ADD KEY `client.status_idx` (`client_status`);

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
  ADD KEY `consultancy.progress_idx` (`consultancy_progress`),
  ADD KEY `consultancy.users.adder_idx` (`consultancy_adder`);

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
  ADD KEY `users.users.adder_idx` (`user_adder_id`),
  ADD KEY `users.country_idx` (`user_country`),
  ADD KEY `users.department_idx` (`user_department`);

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
  MODIFY `campus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consultancy`
--
ALTER TABLE `consultancy`
  MODIFY `consultancy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `client.country` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client.status` FOREIGN KEY (`client_status`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `consultancy.progress` FOREIGN KEY (`consultancy_progress`) REFERENCES `consultancy_progress` (`consultancy_progress_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultancy.users.adder` FOREIGN KEY (`consultancy_adder`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `users.country` FOREIGN KEY (`user_country`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users.department` FOREIGN KEY (`user_department`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users.status` FOREIGN KEY (`user_status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users.user_type` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
