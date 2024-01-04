-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2021 at 03:47 PM
-- Server version: 10.2.33-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adaptivc_homewire_dbone`
--
CREATE DATABASE IF NOT EXISTS `adaptivc_homewire_dbone` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `adaptivc_homewire_dbone`;

-- --------------------------------------------------------

--
-- Table structure for table `DPM_conversation_history`
--

CREATE TABLE `DPM_conversation_history` (
  `DPM_CH_id` int(11) NOT NULL,
  `chat_reference` varchar(30) NOT NULL,
  `sending_user` varchar(20) NOT NULL,
  `receiving_user` varchar(20) NOT NULL,
  `message` longtext NOT NULL,
  `message_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DPM_conversation_history_media`
--

CREATE TABLE `DPM_conversation_history_media` (
  `DPM_CH_Media_id` int(11) NOT NULL,
  `chat_reference` varchar(30) NOT NULL,
  `media_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `duo_private_messaging`
--

CREATE TABLE `duo_private_messaging` (
  `dp_messaging_id` int(11) NOT NULL,
  `chat_reference` varchar(30) NOT NULL,
  `primary_user` varchar(20) NOT NULL COMMENT 'User initiating/initiated the chat',
  `secondary_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_update_media`
--

CREATE TABLE `status_update_media` (
  `SU_Media_id` int(11) NOT NULL,
  `SU_id` int(11) NOT NULL,
  `media_link` text NOT NULL,
  `media_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_followers`
--

CREATE TABLE `users_followers` (
  `users_followers_id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `follower` varchar(20) NOT NULL,
  `follow_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `unfollow_datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_friends`
--

CREATE TABLE `users_friends` (
  `users_friends_id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `friend` varchar(20) NOT NULL,
  `request_date` timestamp NULL DEFAULT current_timestamp(),
  `request_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `friend_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_status_updates`
--

CREATE TABLE `users_status_updates` (
  `status_update_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `status_update` text NOT NULL,
  `shoutout_count` int(11) NOT NULL DEFAULT 0,
  `like_count` int(11) NOT NULL DEFAULT 0,
  `privacy_attributes` text DEFAULT NULL,
  `status_update_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `users_name` varchar(50) NOT NULL,
  `users_surname` varchar(50) NOT NULL,
  `verification` varchar(20) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `user_profile_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `about` text NOT NULL,
  `store_wallet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `DPM_conversation_history`
--
ALTER TABLE `DPM_conversation_history`
  ADD PRIMARY KEY (`DPM_CH_id`),
  ADD KEY `duo_private_messaging_DPM_conversation_history_chat_reference` (`chat_reference`);

--
-- Indexes for table `DPM_conversation_history_media`
--
ALTER TABLE `DPM_conversation_history_media`
  ADD PRIMARY KEY (`DPM_CH_Media_id`),
  ADD KEY `chat_reference` (`chat_reference`);

--
-- Indexes for table `duo_private_messaging`
--
ALTER TABLE `duo_private_messaging`
  ADD PRIMARY KEY (`chat_reference`),
  ADD KEY `dp_messaging_id` (`dp_messaging_id`),
  ADD KEY `primary_user` (`primary_user`);

--
-- Indexes for table `status_update_media`
--
ALTER TABLE `status_update_media`
  ADD PRIMARY KEY (`SU_Media_id`),
  ADD KEY `status update id` (`SU_id`);

--
-- Indexes for table `users_followers`
--
ALTER TABLE `users_followers`
  ADD PRIMARY KEY (`users_followers_id`),
  ADD KEY `username` (`user`);

--
-- Indexes for table `users_friends`
--
ALTER TABLE `users_friends`
  ADD PRIMARY KEY (`users_friends_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users_status_updates`
--
ALTER TABLE `users_status_updates`
  ADD PRIMARY KEY (`status_update_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`username`),
  ADD KEY `users names` (`users_name`,`users_surname`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`user_profile_id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `DPM_conversation_history`
--
ALTER TABLE `DPM_conversation_history`
  MODIFY `DPM_CH_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DPM_conversation_history_media`
--
ALTER TABLE `DPM_conversation_history_media`
  MODIFY `DPM_CH_Media_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `duo_private_messaging`
--
ALTER TABLE `duo_private_messaging`
  MODIFY `dp_messaging_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_update_media`
--
ALTER TABLE `status_update_media`
  MODIFY `SU_Media_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_followers`
--
ALTER TABLE `users_followers`
  MODIFY `users_followers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_friends`
--
ALTER TABLE `users_friends`
  MODIFY `users_friends_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_status_updates`
--
ALTER TABLE `users_status_updates`
  MODIFY `status_update_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `user_profile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `duo_private_messaging`
--
ALTER TABLE `duo_private_messaging`
  ADD CONSTRAINT `duo_private_messag_ref_DPM_CH_media_viaparentkey_chat_reference` FOREIGN KEY (`chat_reference`) REFERENCES `DPM_conversation_history_media` (`chat_reference`),
  ADD CONSTRAINT `duo_private_messag_ref_DPM_CH_viaparentkey_chat_reference` FOREIGN KEY (`chat_reference`) REFERENCES `DPM_conversation_history` (`chat_reference`);

--
-- Constraints for table `status_update_media`
--
ALTER TABLE `status_update_media`
  ADD CONSTRAINT `status_update_media_ibfk_1` FOREIGN KEY (`SU_id`) REFERENCES `users_status_updates` (`status_update_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_status_updates`
--
ALTER TABLE `users_status_updates`
  ADD CONSTRAINT `users_status_updates_ref_SU_media_viaparentkey_status_update_id` FOREIGN KEY (`status_update_id`) REFERENCES `status_update_media` (`SU_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD CONSTRAINT `user_accounts_ref_duo_private_messaging_viaparentkey_username` FOREIGN KEY (`username`) REFERENCES `duo_private_messaging` (`primary_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_accounts_ref_user_followers_viaparentkey_username` FOREIGN KEY (`username`) REFERENCES `users_followers` (`user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_accounts_ref_user_friends_viaparentkey_username` FOREIGN KEY (`username`) REFERENCES `users_friends` (`user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_accounts_ref_user_profiles_viaparentkey_username` FOREIGN KEY (`username`) REFERENCES `user_profiles` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_accounts_ref_user_status_updates_viaparentkey_username` FOREIGN KEY (`username`) REFERENCES `users_status_updates` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user_accounts` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
