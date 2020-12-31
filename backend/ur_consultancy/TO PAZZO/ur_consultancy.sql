-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 04:42 PM
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
(1, 'NYARUGENGE'),
(2, 'HUYE');

-- --------------------------------------------------------

--
-- Table structure for table `chat_group`
--

CREATE TABLE `chat_group` (
  `chat_group_id` int(11) NOT NULL,
  `chat_group_name` varchar(100) NOT NULL,
  `chat_group_create_date` datetime NOT NULL,
  `chat_group_creator` int(11) NOT NULL,
  `chat_group_description` text NOT NULL DEFAULT 'Not description',
  `chat_group_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Rwanda Information Society Authority', 'risarwanda@risa.com', 1, 1),
(2, 'Rwanda Social Security Board', 'rssb@rssb.rw', 1, 1);

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
(3, 'COLLEGE OF SCIENCE AND TECHNOLOGY', 1),
(4, 'COLLEGE OF MEDECINE', 2);

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
  `consultancy_exchange_rate` double NOT NULL,
  `consultancy_UR_percentage` double NOT NULL,
  `consultancy_Tax_percentage` double NOT NULL,
  `consultancy_consultants_percentage` double NOT NULL,
  `consultancy_client_id` int(11) NOT NULL,
  `consultancy_progress` int(11) NOT NULL DEFAULT 1,
  `consultancy_adder` int(11) NOT NULL,
  `consultancy_leader` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultancy`
--

INSERT INTO `consultancy` (`consultancy_id`, `consultancy_name`, `consultancy_sign_date`, `consultancy_start_date`, `consultancy_end_date`, `consultancy_amount`, `consultancy_currency`, `consultancy_exchange_rate`, `consultancy_UR_percentage`, `consultancy_Tax_percentage`, `consultancy_consultants_percentage`, `consultancy_client_id`, `consultancy_progress`, `consultancy_adder`, `consultancy_leader`) VALUES
(31, 'People who use smartphones than others', '2020-12-31 04:25:53', '2020-12-31', '2020-12-31', 7500000, 'RWF', 1, 15, 15, 70, 2, 1, 9, 11),
(32, 'Rwandan Population Statistics ', '2020-12-31 04:29:18', '2020-12-31', '2020-12-31', 1400000, 'USD', 950, 10, 20, 70, 1, 1, 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_announcement`
--

CREATE TABLE `consultancy_announcement` (
  `consultancy_announcement_id` int(11) NOT NULL,
  `consultancy_announcement` text NOT NULL,
  `consultancy_announcement_link` text DEFAULT NULL,
  `consultancy_announcement_date` datetime NOT NULL,
  `consultancy_announcement_school` int(11) NOT NULL,
  `consultancy_announcement_status` int(11) NOT NULL,
  `consultancy_announcement_shown` int(11) NOT NULL,
  `consultancy_announcement_poster` int(11) NOT NULL
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
  `contract_assigner_id` int(11) NOT NULL,
  `contract_progress_id` int(11) NOT NULL DEFAULT 1
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

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `school_id`) VALUES
(1, 'COMPUTER SCIENCE', 3),
(2, 'MEDECINE', 4),
(3, 'INFORMATION TECHNOLGY', 3);

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `group_members_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `join_date` datetime NOT NULL,
  `group_members_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_mesages`
--

CREATE TABLE `group_mesages` (
  `group_mesages_id` int(11) NOT NULL,
  `group_mesages_content` text DEFAULT NULL,
  `group_mesages_img` varchar(100) DEFAULT NULL,
  `group_mesages_doc` varchar(100) DEFAULT NULL,
  `group_mesages_sendDate` datetime NOT NULL,
  `group_mesages_sender` int(11) NOT NULL,
  `group_mesages_groupTo` int(11) NOT NULL,
  `group_mesages_status` int(11) NOT NULL DEFAULT 1
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
(2, 'UNREAD'),
(3, 'READ'),
(4, 'UNREAD');

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
(3, 'INFORMATION COMMUNICATION AND TECHNOLOGY', 3),
(4, 'MEDECINE', 4);

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
  `user_location` text NOT NULL DEFAULT 'No location entered',
  `user_education` text NOT NULL DEFAULT 'Not education',
  `user_summary` text NOT NULL DEFAULT 'No summary',
  `user_phone` varchar(20) NOT NULL DEFAULT 'Input your number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_gender`, `user_national_id`, `user_email`, `user_password`, `user_status_id`, `user_type_id`, `user_country`, `user_profile_image`, `user_adder_id`, `user_last_active`, `user_department`, `user_location`, `user_education`, `user_summary`, `user_phone`) VALUES
(9, 'Jean Paul', 'NISHIMIRWE', 'M', '1199780117063139', 'nishimirwepaul2015@gmail.com', '$2y$10$1h.QuF6beAid5VlZD3Kp3uIJ5cgyLdIStss0OtWNa4JT5yfzu97Gy', 1, 1, 2, 'profile_img/957aac49140a47881055fdc78e9ddb413.jpg', 1, '2020-12-31 16:40:46', 2, 'Nyamagabe, Southern Proviince', 'Not education', 'No summary', '+250 789 336 678'),
(10, 'Patrick', 'ISHIMWE', 'M', '1199680012546588', 'patrickishimwe16@gmail.com', '$2y$10$1h.QuF6beAid5VlZD3Kp3uIJ5cgyLdIStss0OtWNa4JT5yfzu97Gy', 1, 2, 1, 'img/mimage.png', 9, '2020-12-30 16:59:56', 1, 'No location entered', 'Not education', 'No summary', 'Input your number'),
(11, 'Philius', 'HAKIZIMANA', 'M', '1199680012546544', 'hakizaphilius@gmail.com', '$2y$10$DdYUNFzZ40x0QBIf4rBd/uEPr6KNtlBV4o6LQf3s6f6kdRPICVqlG', 1, 3, 1, 'img/mimage.png', 10, '2020-12-30 04:41:39', 1, 'No location entered', 'Not education', 'No summary', 'Input your number'),
(12, 'Emmanuel', 'KAGABA', 'M', '1199680012546500', 'kagabathefather@gmail.com', '$2y$10$7rHdJI6ccINfzd1Fnaxrie1.yaoeES6F9f4FuyqmrZzQ0DvTFn2Ka', 1, 2, 1, 'img/mimage.png', 9, '2020-12-30 09:20:13', 1, 'No location entered', 'Not education', 'No summary', 'Input your number');

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
-- Indexes for table `chat_group`
--
ALTER TABLE `chat_group`
  ADD PRIMARY KEY (`chat_group_id`),
  ADD KEY `goup_chat.users.creator_idx` (`chat_group_creator`),
  ADD KEY `goup_chat.status_idx` (`chat_group_status`);

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
  ADD KEY `consultancy.users.adder_idx` (`consultancy_adder`),
  ADD KEY `consultancy.users.leader_idx` (`consultancy_leader`);

--
-- Indexes for table `consultancy_announcement`
--
ALTER TABLE `consultancy_announcement`
  ADD PRIMARY KEY (`consultancy_announcement_id`),
  ADD KEY `announcement.school_idx` (`consultancy_announcement_school`),
  ADD KEY `announcement.status_idx` (`consultancy_announcement_status`),
  ADD KEY `announcement.users.poster_idx` (`consultancy_announcement_poster`);

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
  ADD KEY `contract.users.assigner_idx` (`contract_assigner_id`),
  ADD KEY `contract.progress_idx` (`contract_progress_id`);

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
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`group_members_id`),
  ADD KEY `group_members.group_idx` (`group_id`),
  ADD KEY `group_members.users_idx` (`member_id`),
  ADD KEY `group_members.status_idx` (`group_members_status`);

--
-- Indexes for table `group_mesages`
--
ALTER TABLE `group_mesages`
  ADD PRIMARY KEY (`group_mesages_id`),
  ADD KEY `groupmessage.users_idx` (`group_mesages_sender`),
  ADD KEY `groupmessage.group_idx` (`group_mesages_groupTo`),
  ADD KEY `groupmessage.status_idx` (`group_mesages_status`);

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
  MODIFY `campus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat_group`
--
ALTER TABLE `chat_group`
  MODIFY `chat_group_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consultancy`
--
ALTER TABLE `consultancy`
  MODIFY `consultancy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `consultancy_announcement`
--
ALTER TABLE `consultancy_announcement`
  MODIFY `consultancy_announcement_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `group_members_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_mesages`
--
ALTER TABLE `group_mesages`
  MODIFY `group_mesages_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_read`
--
ALTER TABLE `message_read`
  MODIFY `message_read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `reset_password_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Constraints for table `chat_group`
--
ALTER TABLE `chat_group`
  ADD CONSTRAINT `goup_chat.status` FOREIGN KEY (`chat_group_status`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goup_chat.users.creator` FOREIGN KEY (`chat_group_creator`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `consultancy.users.adder` FOREIGN KEY (`consultancy_adder`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultancy.users.leader` FOREIGN KEY (`consultancy_leader`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultancy_announcement`
--
ALTER TABLE `consultancy_announcement`
  ADD CONSTRAINT `announcement.school` FOREIGN KEY (`consultancy_announcement_school`) REFERENCES `school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `announcement.status` FOREIGN KEY (`consultancy_announcement_status`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `announcement.users.poster` FOREIGN KEY (`consultancy_announcement_poster`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultant_contract`
--
ALTER TABLE `consultant_contract`
  ADD CONSTRAINT `contract.consultancy` FOREIGN KEY (`contract_consultancy_id`) REFERENCES `consultancy` (`consultancy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract.progress` FOREIGN KEY (`contract_progress_id`) REFERENCES `consultancy_progress` (`consultancy_progress_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract.users.assigner` FOREIGN KEY (`contract_assigner_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract.users.consultant` FOREIGN KEY (`contract_consultant_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department.school` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `group_members.group` FOREIGN KEY (`group_id`) REFERENCES `chat_group` (`chat_group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_members.status` FOREIGN KEY (`group_members_status`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_members.users` FOREIGN KEY (`member_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_mesages`
--
ALTER TABLE `group_mesages`
  ADD CONSTRAINT `groupmessage.group` FOREIGN KEY (`group_mesages_groupTo`) REFERENCES `chat_group` (`chat_group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groupmessage.status` FOREIGN KEY (`group_mesages_status`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groupmessage.users` FOREIGN KEY (`group_mesages_sender`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
