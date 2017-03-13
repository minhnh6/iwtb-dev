-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.36 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table iwtb.contractor
CREATE TABLE IF NOT EXISTS `contractor` (
  `contractor_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `trade_id` int(11) DEFAULT NULL,
  `business_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `abn_number` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `director_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `industry` enum('Commercial','Residential') COLLATE utf8_bin DEFAULT NULL,
  `office_number` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `mobile_number` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `profile_picture_url` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `trade_license_url` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `insurance_certificate_url` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `project_capabilities` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `legal_option` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `membership_plan_id` int(11) DEFAULT NULL,
  `membership_activated_on` datetime DEFAULT NULL,
  `membership_expires_on` datetime DEFAULT NULL,
  PRIMARY KEY (`contractor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table iwtb.contractor: ~3 rows (approximately)
/*!40000 ALTER TABLE `contractor` DISABLE KEYS */;
INSERT INTO `contractor` (`contractor_id`, `user_id`, `trade_id`, `business_name`, `abn_number`, `director_name`, `industry`, `office_number`, `mobile_number`, `website`, `profile_picture_url`, `trade_license_url`, `insurance_certificate_url`, `project_capabilities`, `legal_option`, `membership_plan_id`, `membership_activated_on`, `membership_expires_on`) VALUES
	(1, 2, 1, 'business name', 'asdf', 'asdf', 'Commercial', 'asdf', '234234', 'sadf', '146554679811.png', '11.png', '10313378_1121936187832805_162771338567455466_n.jpg', 'capabilities', 'option_3', 4, '2016-06-10 06:22:06', '2016-07-10 06:22:06'),
	(2, 3, 3, 'East West Properties Ltd.', '123456789', 'Md. Shuvo', 'Commercial', 'sadfsadf', '23423423', 'http://test.pcom', '1619485_1397144790540916_1761995668_n.jpg', '11110443_10153254457482425_4354658773858597440_n.jpg', '36th_BCS_Suggestion2.pdf', 'project capabilities.. ', 'option_2', 1, '2016-06-10 11:02:29', '2016-07-10 11:02:29'),
	(3, 4, 1, 'Mr. Electrician Ltd.', '34543', 'asdfsdf', 'Residential', 'sadf', '23423', 'asdf', '11139405_791096674311463_5495261644861826274_n.jpg', '240392.jpg', '11159518_966282026737384_5020964232147582608_n1.jpg', 'project capabilities..', 'option_3', 2, '2016-06-10 11:05:54', '2016-07-10 11:05:54');
/*!40000 ALTER TABLE `contractor` ENABLE KEYS */;


-- Dumping structure for table iwtb.employer
CREATE TABLE IF NOT EXISTS `employer` (
  `employer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `title` enum('Mr.','Mrs.') COLLATE utf8_bin NOT NULL,
  `first_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `surename` varchar(50) COLLATE utf8_bin NOT NULL,
  `phone_number` varchar(15) COLLATE utf8_bin NOT NULL,
  `suburb` varchar(150) COLLATE utf8_bin NOT NULL,
  `post_code` varchar(8) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`employer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table iwtb.employer: ~1 rows (approximately)
/*!40000 ALTER TABLE `employer` DISABLE KEYS */;
INSERT INTO `employer` (`employer_id`, `user_id`, `title`, `first_name`, `surename`, `phone_number`, `suburb`, `post_code`) VALUES
	(1, 1, 'Mr.', 'shuvo', 'voboghure', '234', 'Dhaka', '234');
/*!40000 ALTER TABLE `employer` ENABLE KEYS */;


-- Dumping structure for table iwtb.membership_plan
CREATE TABLE IF NOT EXISTS `membership_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `duration` enum('Yearly','Monthly') COLLATE utf8_bin DEFAULT NULL,
  `feature_one` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `feature_two` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `feature_three` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `others` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table iwtb.membership_plan: ~4 rows (approximately)
/*!40000 ALTER TABLE `membership_plan` DISABLE KEYS */;
INSERT INTO `membership_plan` (`id`, `name`, `price`, `duration`, `feature_one`, `feature_two`, `feature_three`, `others`) VALUES
	(1, 'Silver', NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'Gold', NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'Platinum', NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 'Diamond', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `membership_plan` ENABLE KEYS */;


-- Dumping structure for table iwtb.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) NOT NULL DEFAULT '0',
  `from` int(11) NOT NULL DEFAULT '0',
  `to` int(11) NOT NULL DEFAULT '0',
  `content` text COLLATE utf8_bin NOT NULL,
  `read_status` tinyint(4) NOT NULL,
  `sent_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table iwtb.messages: ~61 rows (approximately)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `thread_id`, `from`, `to`, `content`, `read_status`, `sent_on`) VALUES
	(1, 1, 1, 3, 'Hello plumber, East West media!', 1, '2016-07-25 20:38:03'),
	(2, 2, 1, 4, 'Hello Electrician, Mr Electric Ltd!', 1, '2016-07-25 20:38:42'),
	(3, 2, 1, 4, 'hey electrician Mr Electric LTD!', 1, '2016-07-25 20:39:56'),
	(4, 2, 1, 4, 'there electrician??', 1, '2016-07-25 20:54:23'),
	(6, 2, 4, 1, 'yeah!', 1, '2016-07-25 21:15:01'),
	(7, 1, 3, 1, 'Thanks for the knock!', 1, '2016-07-25 21:16:10'),
	(8, 3, 1, 4, 'hello, I just checked your plumber related project! ', 1, '2016-07-25 23:02:24'),
	(9, 3, 1, 4, 'hello, electrician!', 1, '2016-07-25 23:09:58'),
	(10, 4, 1, 3, 'hey plumber!', 1, '2016-07-25 23:10:33'),
	(11, 4, 3, 1, 'hello!', 1, '2016-07-25 23:25:02'),
	(12, 4, 1, 2, 'Are you available to work?', 0, '2016-07-25 23:25:40'),
	(17, 3, 4, 1, 'there?', 1, '2016-07-28 21:44:50'),
	(18, 3, 4, 1, 'hi', 1, '2016-07-28 21:47:20'),
	(19, 3, 4, 1, 'how are you?', 1, '2016-07-28 21:48:04'),
	(20, 3, 4, 1, 'hello..', 1, '2016-07-28 21:48:36'),
	(21, 4, 3, 1, 'yeah!', 1, '2016-07-28 22:09:15'),
	(22, 4, 3, 1, 'I\'m available! ', 1, '2016-07-28 22:10:15'),
	(23, 3, 4, 1, 'there?', 1, '2016-07-28 22:11:14'),
	(24, 3, 4, 1, 'hh', 1, '2016-07-28 22:13:08'),
	(25, 3, 4, 1, 'asdf', 1, '2016-07-28 22:13:55'),
	(26, 3, 4, 1, 'hii', 1, '2016-07-28 22:14:52'),
	(27, 3, 4, 1, 'sdfsdaf', 1, '2016-07-28 22:15:07'),
	(28, 3, 4, 1, 'there?', 1, '2016-07-28 22:16:02'),
	(29, 3, 4, 1, 'asdfsdfsadf', 1, '2016-07-28 22:16:45'),
	(30, 3, 4, 1, 'ewwef', 1, '2016-07-28 22:17:09'),
	(31, 4, 3, 1, 'ha?', 1, '2016-07-28 22:17:58'),
	(32, 4, 3, 1, '??', 1, '2016-07-28 22:18:39'),
	(33, 4, 3, 1, 'hello..', 1, '2016-07-28 23:02:01'),
	(34, 4, 3, 1, 'there?', 1, '2016-07-28 23:06:29'),
	(35, 4, 3, 1, '???', 1, '2016-07-28 23:17:12'),
	(36, 4, 3, 1, '!!!', 1, '2016-07-28 23:17:35'),
	(37, 4, 3, 1, 'there?', 1, '2016-07-28 23:19:45'),
	(38, 4, 3, 1, '??', 1, '2016-07-28 23:20:20'),
	(39, 4, 3, 1, '?????', 1, '2016-07-28 23:21:50'),
	(40, 4, 3, 1, 'hii', 1, '2016-07-28 23:50:24'),
	(41, 4, 3, 1, 'therer?', 1, '2016-07-28 23:53:01'),
	(42, 4, 3, 1, '??', 1, '2016-07-28 23:58:01'),
	(43, 4, 3, 1, 'hei', 1, '2016-07-28 23:58:40'),
	(44, 4, 3, 1, 'there??', 1, '2016-07-29 00:00:50'),
	(45, 4, 3, 1, 'there bro?', 1, '2016-07-29 00:01:04'),
	(46, 4, 3, 1, 'you there?', 1, '2016-07-29 00:02:49'),
	(47, 4, 3, 1, 'you therer?', 1, '2016-07-29 00:03:04'),
	(48, 4, 3, 1, 'tmi ceranchy koro?', 1, '2016-07-29 00:04:13'),
	(51, 4, 1, 3, 'done?', 1, '2016-07-29 00:20:59'),
	(52, 4, 1, 3, 'you there?', 1, '2016-07-29 00:21:43'),
	(53, 4, 1, 3, 'hello bro!', 1, '2016-07-29 00:22:19'),
	(54, 4, 1, 3, 'plumber bro', 1, '2016-07-29 00:29:41'),
	(55, 4, 1, 3, 'bro, you there?', 1, '2016-07-29 00:30:08'),
	(56, 4, 1, 3, 'there?', 1, '2016-07-29 00:30:26'),
	(57, 4, 1, 3, 'hey, you?', 1, '2016-07-29 00:32:01'),
	(58, 4, 1, 3, 'there?', 1, '2016-07-29 00:32:13'),
	(59, 4, 1, 3, '??', 1, '2016-07-29 00:33:26'),
	(60, 4, 1, 3, 'he he plumber', 1, '2016-07-29 00:35:32'),
	(61, 4, 3, 1, 'yeah! tell me the issues!', 1, '2016-07-29 00:36:40'),
	(62, 3, 4, 1, 'you thre?', 1, '2016-07-29 00:39:17'),
	(63, 3, 4, 1, '?', 1, '2016-07-29 00:42:49'),
	(64, 3, 1, 4, 'hello!', 0, '2016-07-29 10:18:55'),
	(65, 3, 1, 4, 'hi', 0, '2016-07-29 10:21:10'),
	(66, 3, 1, 4, '??', 0, '2016-07-29 10:22:23'),
	(67, 3, 1, 4, 'ahey man!', 0, '2016-07-29 10:36:37'),
	(68, 3, 1, 4, 'hello man, you there?', 0, '2016-07-29 10:42:29');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;


-- Dumping structure for table iwtb.project
CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT 'This user ID must be of an Employer',
  `name` varchar(250) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_bin NOT NULL,
  `sector` enum('Commercial','Residential') COLLATE utf8_bin NOT NULL,
  `suburb` varchar(100) COLLATE utf8_bin NOT NULL,
  `budget_range` varchar(50) COLLATE utf8_bin NOT NULL,
  `fixed_budget` decimal(6,2) DEFAULT NULL,
  `is_inspection_required` enum('Y','N') COLLATE utf8_bin DEFAULT NULL,
  `is_da_approval_required` enum('Y','N') COLLATE utf8_bin DEFAULT NULL,
  `da_document_url` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `is_urgent_project` enum('Y','N') COLLATE utf8_bin DEFAULT NULL,
  `is_hiring_iwtb_expert` enum('Y','N') COLLATE utf8_bin DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table iwtb.project: ~5 rows (approximately)
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` (`project_id`, `user_id`, `name`, `description`, `sector`, `suburb`, `budget_range`, `fixed_budget`, `is_inspection_required`, `is_da_approval_required`, `da_document_url`, `is_urgent_project`, `is_hiring_iwtb_expert`, `added_on`, `last_updated_on`) VALUES
	(1, 1, 'Mind renovation of nivin', ':(', 'Commercial', 'Dhaka', '<2500', 0.00, 'Y', 'Y', NULL, 'Y', 'N', '2016-06-10 10:19:47', NULL),
	(2, 1, 'Test messaging features', 'asdf', 'Commercial', 'Dhaka', '<2500', 0.00, 'Y', 'N', NULL, 'N', 'N', '2016-07-25 20:32:00', NULL),
	(3, 1, 'This is for builder', 'sdf', 'Commercial', 'Dhaka', '<2500', 0.00, 'Y', 'N', NULL, 'N', 'N', '2016-07-25 22:54:55', NULL),
	(4, 1, 'This is for electrician', 'sadfdf', 'Commercial', 'Dhaka', '<2500', 0.00, 'Y', 'N', NULL, 'N', 'N', '2016-07-25 22:55:29', NULL),
	(5, 1, 'This is for plumber', 'asdf', 'Commercial', 'Dhaka', '<2500', 0.00, 'Y', 'N', NULL, 'N', 'N', '2016-07-25 22:58:07', NULL);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;


-- Dumping structure for table iwtb.project_bid
CREATE TABLE IF NOT EXISTS `project_bid` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'This user must be contractor',
  `user_trade` int(11) DEFAULT NULL,
  `bid_amount` decimal(6,2) DEFAULT NULL,
  `bid_proposal` text COLLATE utf8_bin,
  `bid_added_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `bid_last_updated_on` datetime DEFAULT NULL,
  `bid_status` enum('Awarded','Accepted','Rejected','Open') COLLATE utf8_bin DEFAULT 'Open' COMMENT 'General bid - Normal bid, which is just posted, no accepting or rejecting or awarding',
  `status_changed_on` datetime DEFAULT NULL,
  `is_contact_details_shared` tinyint(1) DEFAULT '0',
  `discard_status` tinyint(1) DEFAULT '0',
  `resubmit_status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`bid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table iwtb.project_bid: ~5 rows (approximately)
/*!40000 ALTER TABLE `project_bid` DISABLE KEYS */;
INSERT INTO `project_bid` (`bid_id`, `project_id`, `user_id`, `user_trade`, `bid_amount`, `bid_proposal`, `bid_added_on`, `bid_last_updated_on`, `bid_status`, `status_changed_on`, `is_contact_details_shared`, `discard_status`, `resubmit_status`) VALUES
	(3, 1, 4, 1, 1850.00, 'We are a country\'s top electric company.', '2016-06-10 15:07:12', NULL, 'Awarded', NULL, 1, 0, 0),
	(4, 2, 4, 1, 1500.00, 'I am interested sir!!', '2016-07-25 20:32:45', NULL, 'Open', NULL, 0, 0, 0),
	(5, 2, 3, 3, 2000.00, 'I want to work with you! Please check my profile! Thanks!', '2016-07-25 20:33:46', NULL, 'Open', NULL, 0, 0, 0),
	(6, 4, 4, 1, 100.00, 'I am an experienced electrician. I want to work!', '2016-07-25 22:56:13', NULL, 'Open', NULL, 0, 0, 0),
	(7, 5, 3, 3, 300.00, 'I\'m an interested plumber!', '2016-07-25 23:00:57', NULL, 'Open', NULL, 0, 0, 0);
/*!40000 ALTER TABLE `project_bid` ENABLE KEYS */;


-- Dumping structure for table iwtb.project_trade
CREATE TABLE IF NOT EXISTS `project_trade` (
  `project_trade_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `trade_id` int(11) DEFAULT NULL,
  `bidding_status` tinyint(1) DEFAULT '1' COMMENT 'It tells, whether this type of traders can place bid on this project, it was awarded',
  PRIMARY KEY (`project_trade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table iwtb.project_trade: ~9 rows (approximately)
/*!40000 ALTER TABLE `project_trade` DISABLE KEYS */;
INSERT INTO `project_trade` (`project_trade_id`, `project_id`, `trade_id`, `bidding_status`) VALUES
	(1, 1, 2, 1),
	(2, 1, 1, 1),
	(3, 1, 3, 1),
	(4, 2, 2, 1),
	(5, 2, 1, 1),
	(6, 2, 3, 1),
	(7, 3, 2, 1),
	(8, 4, 1, 1),
	(9, 5, 3, 1);
/*!40000 ALTER TABLE `project_trade` ENABLE KEYS */;


-- Dumping structure for table iwtb.threads
CREATE TABLE IF NOT EXISTS `threads` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `employer_id` int(11) DEFAULT NULL COMMENT 'He''ll initiate chat',
  `contractor_id` int(11) DEFAULT NULL,
  `started_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`thread_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table iwtb.threads: ~4 rows (approximately)
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
INSERT INTO `threads` (`thread_id`, `project_id`, `employer_id`, `contractor_id`, `started_on`) VALUES
	(1, 2, 1, 3, '2016-07-25 20:38:03'),
	(2, 2, 1, 4, '2016-07-25 20:38:42'),
	(3, 4, 1, 4, '2016-07-25 23:02:24'),
	(4, 5, 1, 3, '2016-07-25 23:10:33');
/*!40000 ALTER TABLE `threads` ENABLE KEYS */;


-- Dumping structure for table iwtb.trade
CREATE TABLE IF NOT EXISTS `trade` (
  `trade_id` int(11) NOT NULL AUTO_INCREMENT,
  `trade_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`trade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Trade means the category of the contractors like plumber, electrician, builder or so on..';

-- Dumping data for table iwtb.trade: ~3 rows (approximately)
/*!40000 ALTER TABLE `trade` DISABLE KEYS */;
INSERT INTO `trade` (`trade_id`, `trade_name`) VALUES
	(1, 'Electrician'),
	(2, 'Builder'),
	(3, 'Plumber');
/*!40000 ALTER TABLE `trade` ENABLE KEYS */;


-- Dumping structure for table iwtb.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` enum('Employer','Contractor') COLLATE utf8_bin DEFAULT NULL,
  `email_address` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `address_line_1` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `address_line_2` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table iwtb.user: ~4 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `user_role`, `email_address`, `password`, `address_line_1`, `address_line_2`, `added_on`) VALUES
	(1, 'Employer', 'shuvo.voboghure007@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'sadf', 'sadf', '2016-06-07 16:09:13'),
	(2, 'Contractor', 'shuvo.voboghure@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdf', 'sadf', '2016-06-10 10:22:06'),
	(3, 'Contractor', 'plumber@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'adsfsdf', 'asdfsadf', '2016-06-10 15:02:29'),
	(4, 'Contractor', 'electrician@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'asdf', 'sadf', '2016-06-10 15:05:54');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
