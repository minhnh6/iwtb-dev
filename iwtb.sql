-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2017 at 10:19 AM
-- Server version: 5.5.46
-- PHP Version: 5.6.22



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iwtb_shuvo_milestone_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

CREATE TABLE IF NOT EXISTS `contractor` (
  `contractor_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `trade_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
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
  `access_code` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `tokenCustomerID` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`contractor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=54 ;

--
-- Dumping data for table `contractor`
--

INSERT INTO `contractor` (`contractor_id`, `user_id`, `trade_id`, `business_name`, `abn_number`, `director_name`, `industry`, `office_number`, `mobile_number`, `website`, `profile_picture_url`, `trade_license_url`, `insurance_certificate_url`, `project_capabilities`, `legal_option`, `membership_plan_id`, `membership_activated_on`, `membership_expires_on`, `access_code`, `tokenCustomerID`) VALUES
(1, 3, '2', 'test1', '2221111', 'test', 'Commercial', '04159888', '041598777', 'http://wewewe.com', 'Hydrangeas.jpg', 'Jellyfish.jpg', 'Penguins.jpg', 'asdadawe ', 'option_1', 1, '2016-09-17 18:40:48', '2016-10-17 18:41:16', '44DD7mZBPBYeEDecMPdnihs39C_vDpjmPa9odRVcusvWI-V4ZDztA-lmfXjCcDNA_fH5EK5LeZSbyjXIqQvklL_4_sYIOBH3dCDucgE4bLSfA-nb5G3dRRFXboPI3q8IdKkGTDt6GEUnAFir96U6gD5NXOw==', '917218794610'),
(2, 4, '2', 'new test', '22222', 'test', 'Commercial', '11222', '11222', 'http://test.com', 'Jellyfish1.jpg', 'Koala.jpg', 'Lighthouse.jpg', 'ttest', 'option_1', 1, '2016-09-17 19:28:41', '2016-10-17 19:29:24', '60CF34R3xXhpFJfzLDp8gNdEdaFc92jgd6fBr5jXFKoe-91szo1IWRbjGfbF5BPNe5YskV4ibgCTYXv10F0OLa3m-68YjRpUm-5Ilofvf-a-6SoppOgnKU8srjCz_gyYdxbnlXUwHGQJoH6YPjJbOiKCtjA==', '913748472784'),
(3, 5, '2', 'shuvo cse business name', '11111111', 'shuvo cse', 'Commercial', '222', '111111111111', 'http://e.com', 'avatar.png', '', '', 'Have a lot of capabilities! ', '', 1, '2016-10-10 23:08:12', '2016-11-11 00:05:33', '60CF3c5pf9d0euXeSbbjjSDz9IJP2lI4KjTI56aVVSHOPpAul1qTEgIOQMU6hRSm4ZA7aROsiftKGShLbJ3ZXis4WiMUhRYh8Khh_YJ4eJd72aiMA-g_65lBL3e3-6iDVM8wt8JAvARoyi0tqqZODEcsw4Q==', '912115551853'),
(4, 6, '1', 'test', '123123123', 'test', 'Commercial', 'asd123123', '123123', 'http://test.com', 'Hydrangeas1.jpg', 'Hydrangeas2.jpg', 'Jellyfish2.jpg', 'testataewaw', '', 2, '2016-10-19 05:38:22', '2016-11-11 05:42:43', '44DD7lw08IUFfunqLoDhLFsyQ3fQwy8OZlqBWThL18RybBzpKFk6T9LFxpTTsXBwd6OmeImVBrCxYwb7O_p0aciNJX2IdKkGJUoQiL85iPN8xVZ-5tVOWdNHxucQwfZmaWmQbTnLtCU8QIliU2_4ZVgV5PQ==', '916795097800'),
(5, 8, '1', 'S-Contractor', '11107', 'test', 'Commercial', '888-999-0000', '9999999999', 'http://www.test.com', 'avatar.png', '1484815337Leica-M-Sample-Image.jpg', '1484815251Leica-M-Sample-Image.jpg', 'test test', 'option_1', 3, '2017-01-07 22:58:37', '2017-02-06 22:58:37', NULL, NULL),
(6, 9, '3', 'abc', '111', 'abcd', 'Commercial', '11', '11', 'http://www.testx.com', 'avatar.png', '', '', 'test', 'option_1', 3, '2017-01-07 23:01:13', '2017-02-06 23:01:13', NULL, NULL),
(7, 11, '2', 'staff', '1234', 'test_1', 'Commercial', 'k77/25', '0123456789', 'http://test1.com', 'avatar.png', '', '', 'Project builder', 'option_1', 3, '2017-01-10 00:10:22', '2017-02-09 00:10:22', NULL, NULL),
(8, 12, '1', 'staff', '1234', 'test_2', 'Commercial', 'k77/25', '0123456789', 'http://test2.com', 'avatar.png', '', '', 'project electrician', 'option_1', 3, '2017-01-10 00:13:06', '2017-02-09 00:13:06', NULL, NULL),
(9, 13, '3', 'staff', '1234', 'test_3', 'Commercial', 'k77/25', '0123456789', 'http://test3.com', 'avatar.png', '', '', 'Project Plumber', 'option_1', 3, '2017-01-10 00:16:27', '2017-02-09 00:16:27', NULL, NULL),
(10, 14, '4', 'staff', '1234', 'test_4', 'Commercial', 'k77/25', '0123456789', 'http://test4.com', 'avatar.png', '', '', 'i want to receive this project', 'option_1', 3, '2017-01-10 06:54:23', '2017-02-09 06:54:23', NULL, NULL),
(11, 15, '5', 'staff', '1234', 'test_5', 'Commercial', 'k77/25', '0123456789', 'http://test5.com', 'avatar.png', '', '', 'aaaaaa', 'option_1', 3, '2017-01-10 22:48:43', '2017-02-09 22:48:43', NULL, NULL),
(12, 16, '6', 'staff', '1234', 'test7', 'Commercial', 'k77/25', '0123456789', 'http://test7.com', 'avatar.png', '', '', 'aaaaaa', 'option_2', 3, '2017-01-10 22:51:28', '2017-02-09 22:51:28', NULL, NULL),
(13, 17, '6', 'staff', '1234', 'test_8', 'Commercial', 'k77/25', '0123456789', 'http://test8.com', 'avatar.png', '', '', 'aaaaaa', 'option_1', 3, '2017-01-10 22:53:08', '2017-02-09 22:53:08', NULL, NULL),
(14, 18, '7', 'staff', '1234', 'test_9', 'Commercial', 'k77/25', '0123456789', 'http://test9.com', 'avatar.png', '', '', 'aaaa', 'option_3', 3, '2017-01-10 22:55:25', '2017-02-09 22:55:25', NULL, NULL),
(15, 19, '8', 'staff', '123456', 'test_10', 'Commercial', 'k77/25', '0123456789', 'http://test10.com', 'avatar.png', '', '', 'aaa', 'option_1', 3, '2017-01-10 22:58:19', '2017-02-09 22:58:19', NULL, NULL),
(16, 20, '9', 'staff', '1234', 'test_11', 'Commercial', 'k77/25', '0123456789', 'http://test10.com', 'avatar.png', '', '', 'a', 'option_1', 3, '2017-01-10 23:01:42', '2017-02-09 23:01:42', NULL, NULL),
(17, 21, '11', 'minhtest1', '1234', 'test_12', 'Commercial', 'k77/25', '0123456789', 'http://test12.com', 'avatar.png', '', '', 'aa', 'option_2', 3, '2017-01-10 23:03:35', '2017-02-09 23:03:35', NULL, NULL),
(18, 22, '10', 'staff', '1234', 'test_13', 'Commercial', 'k77/25', '0123456789', 'http://test13.com', 'avatar.png', '', '', 'aaa', 'option_1', 3, '2017-01-10 23:06:08', '2017-02-09 23:06:08', NULL, NULL),
(19, 23, '14', 'staff', '1234', 'test_14', 'Commercial', 'k77/25', '0123456789', 'http://test14.com', 'avatar.png', '', '', 'aaa', 'option_2', 3, '2017-01-10 23:08:19', '2017-02-09 23:08:19', NULL, NULL),
(20, 24, '13', 'staff', '1234', 'test_15', 'Commercial', 'k77/25', '0123456789', 'http://test15.com', 'avatar.png', '', '', 'aass', 'option_1', 3, '2017-01-10 23:10:14', '2017-02-09 23:10:14', NULL, NULL),
(21, 25, '12', 'staff', '1234', 'test_16', 'Commercial', 'k77/25', '0123', 'http://test16.com', 'avatar.png', '', '', 'aaass', 'option_1', 3, '2017-01-10 23:12:00', '2017-02-09 23:12:00', NULL, NULL),
(22, 26, '15', 'staff', '1234', 'test_17', 'Commercial', '123456789', '0123456789', 'http://test17.com', 'avatar.png', '', '', 'aa', 'option_1', 3, '2017-01-10 23:14:43', '2017-02-09 23:14:43', NULL, NULL),
(23, 27, '16', 'staff', '1234', 'test_18', 'Commercial', 'k77/25', '0123456789', 'http://test18.com', 'avatar.png', '', '', 'aaa', 'option_3', 3, '2017-01-10 23:16:25', '2017-02-09 23:16:25', NULL, NULL),
(24, 28, '17', 'staff', '1234', 'test_19', 'Commercial', 'k77/25', '0123456789', 'http://test19.com', 'avatar.png', '', '', 'aaa', 'option_2', 3, '2017-01-10 23:18:17', '2017-02-09 23:18:17', NULL, NULL),
(25, 29, '18', 'staff', '1234', 'test_20', 'Commercial', 'k77/25', '0123456789', 'http://test20.com', 'avatar.png', '', '', 'aaa', 'option_1', 3, '2017-01-10 23:19:46', '2017-02-09 23:19:46', NULL, NULL),
(26, 30, '19', 'staff', '1234', 'test_21', 'Commercial', 'k77/25', '0123456789', 'http://test21.com', 'avatar.png', '', '', 'aaaaa', 'option_1', 3, '2017-01-10 23:21:12', '2017-02-09 23:21:12', NULL, NULL),
(27, 31, '20', 'staff', '1234', 'test_22', 'Commercial', 'k77/25', '0123456789', 'http://test22.com', 'avatar.png', '', '', 'aaaa', 'option_1', 3, '2017-01-10 23:22:56', '2017-02-09 23:22:56', NULL, NULL),
(28, 32, '21', 'staff', '1234', 'test_23', 'Commercial', 'k77/25', '0123456', 'http://test23.com', 'avatar.png', '', '', 'aaaa', 'option_2', 3, '2017-01-10 23:24:42', '2017-02-09 23:24:42', NULL, NULL),
(29, 33, '22', 'staff', '1234', 'test_24', 'Commercial', 'k77/25', '0123456789', 'http://test24.com', 'avatar.png', '', '', 'aaa', 'option_1', 3, '2017-01-10 23:26:22', '2017-02-09 23:26:22', NULL, NULL),
(30, 34, '23', 'staff', '1234', 'test_25', 'Commercial', 'k77/25', '0123456789', 'http://test25.com', 'avatar.png', '', '', 'aaa', 'option_1', 3, '2017-01-10 23:29:40', '2017-02-09 23:29:40', NULL, NULL),
(31, 35, '24', 'staff', '1234', 'test_26', 'Commercial', 'k77/25', '0123456789', 'http://test26.com', 'avatar.png', '', '', 'aaa', 'option_1', 3, '2017-01-10 23:31:12', '2017-02-09 23:31:12', NULL, NULL),
(32, 36, '25', 'staff', '123456', 'test_27', 'Commercial', 'k77/25', '0123456789', 'http://test27.com', 'avatar.png', '', '', 'aa', 'option_1', 3, '2017-01-10 23:32:45', '2017-02-09 23:32:45', NULL, NULL),
(33, 37, '26', 'staff', '1234', 'test_28', 'Commercial', 'k77/25', '0123456789', 'http://test28.com', 'avatar.png', '', '', 'aaa', 'option_1', 3, '2017-01-10 23:34:23', '2017-02-09 23:34:23', NULL, NULL),
(34, 38, '27', 'staff', '1234', 'test_29', 'Commercial', 'k77/25', '0123456789', 'http://test29.com', 'avatar.png', '', '', 'aaa', 'option_1', 3, '2017-01-10 23:35:46', '2017-02-09 23:35:46', NULL, NULL),
(35, 39, '28', 'staff', '1234', 'test_30', 'Commercial', 'k77/25', '0123456789', 'http://test30.com', 'avatar.png', '', '', 'as', 'option_2', 3, '2017-01-10 23:37:26', '2017-02-09 23:37:26', NULL, NULL),
(36, 40, '29', 'staff', '1234', 'test_31', 'Commercial', 'k77/25', '0123456789', 'http://test31.com', 'avatar.png', '', '', 'aaaa', 'option_1', 3, '2017-01-10 23:38:53', '2017-02-09 23:38:53', NULL, NULL),
(37, 41, '30', 'staff', '1234', 'test_32', 'Commercial', 'k77/25', '0123456789', 'http://test32.com', 'avatar.png', '', '', 'aaa', 'option_2', 3, '2017-01-10 23:40:24', '2017-02-09 23:40:24', NULL, NULL),
(38, 42, '31', 'staff', '1234', 'test_33', 'Commercial', 'k77/25', '0123456789', 'http://test33.com', 'avatar.png', '', '', 'aaaa', 'option_2', 3, '2017-01-10 23:41:53', '2017-02-09 23:41:53', NULL, NULL),
(39, 43, '32', 'staff', '1234', 'test_34', 'Commercial', 'k77/25', '0123456789', 'http://test34.com', 'avatar.png', '', '', 'aaaa', 'option_2', 3, '2017-01-10 23:43:13', '2017-02-09 23:43:13', NULL, NULL),
(40, 44, '33', 'staff', '1234', 'test_35', 'Commercial', 'k77/25', '0123456789', 'http://test35.com', 'avatar.png', '', '', 'aaa', 'option_1', 3, '2017-01-10 23:44:39', '2017-02-09 23:44:39', NULL, NULL),
(41, 45, '3', 'staff', '123456', 'test_36', 'Commercial', 'k77/25', '0123456789', 'http://test36.com', 'avatar.png', '', '', 'aaaa', 'option_1', 3, '2017-01-10 23:46:21', '2017-02-09 23:46:21', NULL, NULL),
(42, 46, '34', 'staff', '1234', 'test_37', 'Commercial', 'k77/25', '0123456789', 'http://test37.com', 'avatar.png', '', '', 'aaa', 'option_1', 3, '2017-01-10 23:50:27', '2017-02-09 23:50:27', NULL, NULL),
(43, 47, '41', 'staff', '1234', 'test_38', 'Commercial', 'k77/25', '0123456789', 'http://test38.com', 'avatar.png', '', '', 'aa', 'option_2', 3, '2017-01-10 23:52:45', '2017-02-09 23:52:45', NULL, NULL),
(44, 48, '35', 'staff', '1234', 'test_39', 'Commercial', 'k77/25', '0123456789', 'http://test39.com', 'avatar.png', '', '', 'aa', 'option_2', 3, '2017-01-10 23:54:07', '2017-02-09 23:54:07', NULL, NULL),
(45, 49, '36', 'staff', '1234', 'test_40', 'Commercial', 'k77/25', '0123456789', 'http://test40.com', 'avatar.png', '', '', 'aa', 'option_2', 3, '2017-01-10 23:55:28', '2017-02-09 23:55:28', NULL, NULL),
(46, 50, '37', 'staff', '1234', 'test_41', 'Commercial', 'k77/25', '0123456789', 'http://test41.com', 'avatar.png', '', '', 'aa', 'option_3', 3, '2017-01-10 23:56:46', '2017-02-09 23:56:46', NULL, NULL),
(47, 51, '38', 'staff', '1234', 'test_42', 'Commercial', 'k77/25', '0123456789', 'http://test42.com', 'avatar.png', '', '', 'aa', 'option_1', 3, '2017-01-10 23:57:57', '2017-02-09 23:57:57', NULL, NULL),
(48, 52, '39', 'staff', '1234', 'test_43', 'Commercial', 'k77/25', '0123456789', 'http://test43.com', 'avatar.png', '', '', 'aa', 'option_2', 3, '2017-01-11 00:00:05', '2017-02-10 00:00:05', NULL, NULL),
(49, 53, '40', 'staff', '1234', 'test_44', 'Commercial', 'k77/25', '0123456789', 'http://test44.com', 'avatar.png', '', '', 'aaa', 'option_2', 3, '2017-01-11 00:01:33', '2017-02-10 00:01:33', NULL, NULL),
(50, 55, '8', 'cont1', '111', '11', 'Commercial', '888', '88', 'http://abc.com', 'avatar.png', '', '', 'test test', '', 3, '2017-01-13 01:57:12', '2017-02-12 01:57:12', NULL, NULL),
(51, 56, '4', 'b2', '1', 'test', 'Commercial', '1', '1', 'https://www.xyz.com', 'avatar.png', '', '', 'test', '', 3, '2017-01-13 02:26:35', '2017-02-12 02:26:35', NULL, NULL),
(52, 57, '4,5,6,7,8,2', 'BN', '111', 'D', 'Commercial', '1', '1', 'http://www.test.com', 'avatar.png', '', '', 'test test', 'option_1', 3, '2017-01-17 06:55:45', '2017-02-16 06:55:45', NULL, NULL),
(53, 60, '9', 'test', '123123', 'test', 'Commercial', 'test', '0415987739', 'http://test.com', 'avatar.png', 'Hydrangeas4.jpg', 'Jellyfish3.jpg', 'test', '', 3, '2017-01-24 02:14:24', '2017-02-23 02:14:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`employer_id`, `user_id`, `title`, `first_name`, `surename`, `phone_number`, `suburb`, `post_code`) VALUES
(1, 1, 'Mr.', 'Shuvo', 'Employer', '11111', 'Dhaka', '1111'),
(2, 2, 'Mr.', 'ntest189', 'test', '0415987739', 'suburb', '2232'),
(3, 7, 'Mr.', 'Sejal', 'Chauhan', '8888888888', 'Test', '60604'),
(4, 10, 'Mr.', 'manager', 'test', '0123456789', 'asd', '123456'),
(5, 54, 'Mr.', 'Sejal', 'Test', '8', 'SB', '1234'),
(6, 58, 'Mr.', 'emp', 'Z', '8888888888', 'test', '11'),
(7, 59, 'Mr.', 'test', 'test', '0415987739', 'test', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `membership_plan`
--

CREATE TABLE IF NOT EXISTS `membership_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `duration` enum('365','30') COLLATE utf8_bin DEFAULT NULL,
  `feature_one` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `feature_two` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `feature_three` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `others` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `membership_plan`
--

INSERT INTO `membership_plan` (`id`, `name`, `price`, `duration`, `feature_one`, `feature_two`, `feature_three`, `others`) VALUES
(1, 'Gold', '50.00', '30', NULL, NULL, NULL, NULL),
(2, 'Platinum', '100.00', '30', NULL, NULL, NULL, NULL),
(3, 'Free-Trial', '0.00', '30', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) NOT NULL DEFAULT '0',
  `from` int(11) NOT NULL DEFAULT '0',
  `to` int(11) NOT NULL DEFAULT '0',
  `content` text COLLATE utf8_bin NOT NULL,
  `read_status` tinyint(4) NOT NULL,
  `sent_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE IF NOT EXISTS `payment_details` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(100) NOT NULL,
  `transactionType` varchar(100) NOT NULL,
  `access_code` varchar(512) NOT NULL,
  `isTokenPayment` tinyint(4) DEFAULT '0',
  `tokenCustomerID` varchar(100) DEFAULT NULL,
  `totalAmount` decimal(8,0) DEFAULT NULL COMMENT '// amount is like 100 = 1.00, 10000 = 100.00 //',
  `invoiceDescription` varchar(64) DEFAULT NULL,
  `currencyCode` varchar(3) NOT NULL,
  `payment_for` enum('Posting_project','Membership_fee') NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL COMMENT 'If the payment is for posting project, then it will contain that project ID, that has been paid for',
  `customerIP` varchar(50) NOT NULL,
  `transaction_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`row_id`, `transaction_id`, `transactionType`, `access_code`, `isTokenPayment`, `tokenCustomerID`, `totalAmount`, `invoiceDescription`, `currencyCode`, `payment_for`, `user_id`, `project_id`, `customerIP`, `transaction_time`) VALUES
(1, '13941467', '', 'F9802ZwlB024paLMhj4dvbTt2kjgmBnA4adp8Jp6-MloE0ntJ-fruD6WzNWxRetQwhnMY9_-gkk1jCoff2USQriVkGkr6S-G-iUCvzrSqvCWYu98jAIDv3jZnSJBXoZjTvQFKBNhW8ZXpbE_O8S7oZEZLaw==', 0, NULL, '100', 'Inv-57ddeed52669c-2', 'AUD', 'Posting_project', 2, 1, '', '2016-09-18 01:33:10'),
(2, '13941468', '', '44DD7mZBPBYeEDecMPdnihs39C_vDpjmPa9odRVcusvWI-V4ZDztA-lmfXjCcDNA_fH5EK5LeZSbyjXIqQvklL_4_sYIOBH3dCDucgE4bLSfA-nb5G3dRRFXboPI3q8IdKkGTDt6GEUnAFir96U6gD5NXOw==', 1, '917218794610', '300', 'Inv-57ddf0a07dd6b-3', 'AUD', 'Membership_fee', 3, 0, '', '2016-09-18 01:40:49'),
(3, '13941483', '', '44DD79EY3Fl0OJfc5rJ2Asonwrexe_bWit65IFaunE8ehidez8vpD20X5x3tz7Lnf9Slzk1GH0eO3YKTCC2EVjKWHbmHvItW4xUu7dH4QQHvKenztdrSNknlqypHyCkXcmwB5fecYHvvbCN-GR22T4Pjfqg==', 0, NULL, '100', 'Inv-57ddfb48b5047-2', 'AUD', 'Posting_project', 2, 2, '', '2016-09-18 02:26:17'),
(4, '13941484', '', '60CF34R3xXhpFJfzLDp8gNdEdaFc92jgd6fBr5jXFKoe-91szo1IWRbjGfbF5BPNe5YskV4ibgCTYXv10F0OLa3m-68YjRpUm-5Ilofvf-a-6SoppOgnKU8srjCz_gyYdxbnlXUwHGQJoH6YPjJbOiKCtjA==', 1, '913748472784', '300', 'Inv-57ddfbd9f1c69-4', 'AUD', 'Membership_fee', 4, 0, '', '2016-09-18 02:28:42'),
(5, '14029999', '', '60CF3c5pf9d0euXeSbbjjSDz9IJP2lI4KjTI56aVVSHOPpAul1qTEgIOQMU6hRSm4ZA7aROsiftKGShLbJ3ZXis4WiMUhRYh8Khh_YJ4eJd72aiMA-g_65lBL3e3-6iDVM8wt8JAvARoyi0tqqZODEcsw4Q==', 1, '912115551853', '50', 'Inv-57fc8f28ae5ee-5', 'AUD', 'Membership_fee', 5, 0, '', '2016-10-11 07:05:13'),
(6, '14030335', '', '44DD7lw08IUFfunqLoDhLFsyQ3fQwy8OZlqBWThL18RybBzpKFk6T9LFxpTTsXBwd6OmeImVBrCxYwb7O_p0aciNJX2IdKkGJUoQiL85iPN8xVZ-5tVOWdNHxucQwfZmaWmQbTnLtCU8QIliU2_4ZVgV5PQ==', 1, '916795097800', '100', 'Inv-57fcde08ddeb8-6', 'AUD', 'Membership_fee', 6, 0, '', '2016-10-11 12:41:45'),
(7, '', '', 'C3AB93_N2dPd1IKF_tjIOyI_21T8Nup0_smBWQzqGVTcpp8pEMQtSIxxwCNucd8acIuMOgx9cpqhFahWC2iVWe5_b473IuOIJJNYQ-TkuaT4Q1gCcLAM48bzVolSwOij-voLe2wzQbZmfvNxdulvmpVP6BA==', 0, NULL, NULL, 'Inv-5871e2308573e-7', 'AUD', '', 7, 0, '', '2017-01-08 06:54:41'),
(8, '14212786', '', '44DD7xWt8AMheyynzf_8Ye6DqxrtK6fqLyWzTmO6MAJTfmn_kC9LeCkjivblGtP5tQBKofFPAWCc486M95XtO4qcjhdljmZx_zj4xjP7D7xq2l_9hzSxdU5rYRTYpT3XHqWmQtekKZzW3YoZFmVYPOWP5lQ==', 0, NULL, '100', 'Inv-5874914577d3b-2', 'AUD', 'Posting_project', 2, 3, '', '2017-01-10 07:46:14'),
(9, '14212795', '', 'F9802Rdf5zxvroeYi1f42AVBsLu0MfZ4xb94bup1N6JdMnuPXX_KHOwafIt-gysI8j2-ITsoy6nbc-BqpqUHjcMCxXrh1zRym6WaOaQMyGaJR2A0ISy4LIvHYJhRW2BAhllkdHhhMs9AiO8uC3rkvGAwYlg==', 0, NULL, '100', 'Inv-58749427155ff-10', 'AUD', 'Posting_project', 10, 4, '', '2017-01-10 07:58:32'),
(10, '14212797', '', '60CF3Sa51YuO7k1Izo8ev6BLi2yhGw1yFg_fkzmC4ArVOYaeeD_g9qepl2PNZtS_b03wmbRpN2T5DCDpm6tuF2LiwovJFTCXIMZgOJ0V-uEXfGuMHg2ufIwbfiATHDJ3H2x6Rhx3A-bE4yJnPh0QJ8d6o3A==', 0, NULL, '100', 'Inv-587494a25fb07-10', 'AUD', 'Posting_project', 10, 5, '', '2017-01-10 08:00:35'),
(11, '14212798', '', 'F9802WV5yJzCR8PjqSRgoHsN0EVdVEj23_965VPeRjA_6ZPQYoTS0J25xj2NM4CvFLAGeOO8N5TIW6hWPBBkowgYPL8mi_sYqgijQ9XawY1pg4MwagHhHoYEZb1rMjN-gz7jyGYssJX-hRUIFmu0I5aS7ig==', 0, NULL, '100', 'Inv-587495169961e-10', 'AUD', 'Posting_project', 10, 6, '', '2017-01-10 08:02:31'),
(12, '14212838', '', '60CF3Q1IrhUn44OycEjeNohHn5KUfHEjwC9n_GdjP7kR629cQjboCGBEJIGbMDZVl0GEthD0C6xV_0sK7eaIQdvce_sNMZ2P563ptDGSBnFbvllxBFO5JOvyd430P-AKnQj2mWmTtvxbBig5yhljbCiEryg==', 0, NULL, '100', 'Inv-58749b60f233e-10', 'AUD', 'Posting_project', 10, 7, '', '2017-01-10 08:29:21'),
(13, '14213239', '', 'C3AB9i_xU1A8OxnOcZYIsf1WQQSy9MwBeQ7ixhVvPNjpUg8z9sTD9HqS4VO6NmR8BVuA_VMqy3_3saahO3uEyjc9J4d9t_1htlSswhSUOKncKHn9GbIyT2lwr2wlICHgVmubGIQWUNkAz7-c9caEKzJxr1Q==', 0, NULL, '100', 'Inv-5874e516511df-2', 'AUD', 'Posting_project', 2, 8, '', '2017-01-10 13:43:51'),
(14, '14213240', '', '60CF3QAHD0kEixlsdR_hkYDlsMyvqUuxo_v2oHKBIYzYU9q7WoQLuS-Rfah5x9FTojzdBAddRd430O5eRgCJ5n7wp6q-ajomzYNX9VSMDXPGImL1SiyUwcMYxcm4d-i6q0-LrwizUeYjOSbQhiRIB7m_qjw==', 0, NULL, '100', 'Inv-5874e5a40ce91-2', 'AUD', 'Posting_project', 2, 9, '', '2017-01-10 13:46:13'),
(15, '14213242', '', '60CF32P_aR1qlVymci1d7Y3FyuUQG-PuSPVLa7Zv8KRVpYiaK2pNngG2JmBWXU-geUjtCtQuFbnJ_zrhWcHTbinOyYbjp5h03PHUS30jZNGqG5vRmy0QwxPTOUvcYK6AkqXQmApJd9g0KBcbLM_1kmS4Zow==', 0, NULL, '100', 'Inv-5874e5f9125b3-2', 'AUD', 'Posting_project', 2, 10, '', '2017-01-10 13:47:38'),
(16, '14213243', '', 'A1001CcKzc6XOvzVi7cZme76HF95Y7WkdVRJTL8IyR-HsSgQqpjQuH7bNr1_l9_Nb7FBSgT8N6D55a7KWI72ANSt0DyrLSj_Xqw4071ZLXWlvCKisLmCQpmayJtJoW7yGKa_74wQC_gj63SMaht2av84_eQ==', 0, NULL, '100', 'Inv-5874e64f88f71-2', 'AUD', 'Posting_project', 2, 11, '', '2017-01-10 13:49:04'),
(17, '14213245', '', '60CF3xarzwN3Iur1YXv7vmOkadl2zxz_UmEd6sLP8Io8CZm8r-l2mHHC8LBvUG6Y2Sje219dJuB0wrj5hh_WGt8MkhR5kDhiY9YWr-1-27AY_zm4X_vWKg7EUts-SKMoGV0x_qj9zyn7wm6fpQDDKDJhtCw==', 0, NULL, '100', 'Inv-5874e69ab804a-2', 'AUD', 'Posting_project', 2, 12, '', '2017-01-10 13:50:19'),
(18, '14213249', '', 'F9802RU4LE4lyVuyfhMTf059udeeceEb9KBt0XeJgeBLxWGjdCaJGqOPsM9IGegs5gaBn9MbFeTs6uc27Ywdnw0yVvBibd7xvcPSiZZiv0Jcmezog6UN20MAcG4YmFHb0RrXu4klxwxYLmgpqoMQ_fXqlsw==', 0, NULL, '100', 'Inv-5874e6fa0bfb6-2', 'AUD', 'Posting_project', 2, 13, '', '2017-01-10 13:51:54'),
(19, '14213251', '', 'F98028nN54Rp6pdYd45JPEqopKjEJH3CpCJbq_VzbU3Y2lCn_3swpYfluMAhUKsjk8cDiHR2KSEaGKwPoJtK6VSFDj7QTMCGCNnZGpNxG9EDvbAYSeK61fARP-jI0d0a6cKm_6191l6-XtC_ZB3cD4L2-cA==', 0, NULL, '100', 'Inv-5874e753eb4e3-2', 'AUD', 'Posting_project', 2, 14, '', '2017-01-10 13:53:24'),
(20, '14213252', '', 'F9802RMzuxtyb4JO88w7P_o7cU7UNHzT0iY7lKaJHeUu-9HIloPCYh-W1UHq5TfDuJRb7EPwJDB4HjHs2Bxjga60KHebVkf_SR8AdXD0ID_OnxxvJN-2mKia8upgSLFcKTJ7mwVryIWXFW1Dfzx-zQ7_hLg==', 0, NULL, '100', 'Inv-5874e7a20a758-2', 'AUD', 'Posting_project', 2, 15, '', '2017-01-10 13:54:42'),
(21, '14213255', '', 'A1001EVZgvKHDfuHk47zBRqNdEjIvcNGsrTXi5z8pkKSK2jJvnwedV9o389WaCmnPrg1S84UhZeKeL3U-SuyIkgWcRo3RX_wNrWkc-O5wZ8abgyquKytPvxR9ZJoImRIwK5tsscX7Ug5QMAHJ277A_SWq8Q==', 0, NULL, '100', 'Inv-5874e8023c0de-2', 'AUD', 'Posting_project', 2, 16, '', '2017-01-10 13:56:19'),
(22, '14213256', '', 'F98024s2GXBJNxRmRbw5o_AFB71tWnmLxlVUpV3OOXc2vyJqMaCFMUPoEGPLqr3JAp529gS5bHGpdYbALkqJ-Cn2hvACRae73lBn2VOd020_wDU-ctvZE5zg9k2MOpHPCRLuYvulVX5fr_-dKgCqZUmiEYw==', 0, NULL, '100', 'Inv-5874e84e47037-2', 'AUD', 'Posting_project', 2, 17, '', '2017-01-10 13:57:35'),
(23, '14213259', '', 'C3AB9g-aSZkNXgG3vPcV-jfKOXbaQ0hDQvFXCICe_Ro7Ssx1v8aHCVqE5sVSlrY5diPhZV3gtqfOb7tPK1jGhop4udhDGtk6fR2PQNCpxKhhnTAwUFQS7869sdXhNj4DAAoyS8ErrlufcYrybU7T1RTPHbw==', 0, NULL, '100', 'Inv-5874e8ca037f0-2', 'AUD', 'Posting_project', 2, 18, '', '2017-01-10 13:59:38'),
(24, '14213264', '', '44DD7RzGUxdBvLgg_P5I49Ch8_OPt5A5uV6r2BVBSR6urVdjZz9uLTVHBGU06zEMwHjGxiKrItL0gFSHmoKH6jpNV3bDybZhc2oUMG3-nuGOOtpnNofe-Nvi8kaEWzvorN6zCc7G2RcI5obFmBKv1JVKfAQ==', 0, NULL, '100', 'Inv-5874e937d0026-2', 'AUD', 'Posting_project', 2, 19, '', '2017-01-10 14:01:28'),
(25, '14213265', '', 'C3AB9LQmUg9Rd9QKDUuApJWQFJlBU3XGX-mL1R6yYOeoBDg45iHSUGTb5gGOmeEeT8emjorUZGzzuyPgDn5O2-qlRy6hTa1eL0Ks4Edg9PDBKxbtOY7zez9oDNHq9ebg2BKt9DXouXj8C3lt11SuVeHcQkw==', 0, NULL, '100', 'Inv-5874e9906ab66-2', 'AUD', 'Posting_project', 2, 20, '', '2017-01-10 14:02:57'),
(26, '14213274', '', '60CF3A2OtCSfhfMRdMTr9GaGT3o_ItriNfJwP3tJGbw_O7BOM1QerbrdFKg5GvxD03TVfqSyHr9xOtG2uFSXvrRU3GpWe-4SHYoU3W67MQyfb_Sa2QU2lMNqgtNY0m83cIGPkVBWZMy9Ok6qvHs-szWoPMA==', 0, NULL, '100', 'Inv-5874ea000b64a-2', 'AUD', 'Posting_project', 2, 21, '', '2017-01-10 14:04:48'),
(27, '14213277', '', '60CF3vkZUaI3Lx99L2MNnYm8RqlrkTXJoVLYEBBNoospEgMx2XMUYEPyzdtzSVCy52t5YGMZMK_TTx2bf3SnCpHnudbkjdlMmBY4JyeoaOcGyFIGXsli4m3ZGFvn-aqkyl9VhaXsdFnur5LHoI7-5NgksDQ==', 0, NULL, '100', 'Inv-5874ea5a5697c-2', 'AUD', 'Posting_project', 2, 22, '', '2017-01-10 14:06:19'),
(28, '14213280', '', '60CF3-JOLroVJ6NR7biKzvBDzzBwNu48-0GIcm8dmGE3An0SnxeFocoaS8c0Qg3wB9GRdmipCBEaJ3fCu8fZ_e2BXkKLQhjymt5_9-chSNa4y-aSFGxc9g770vzNTpLaZZ_1aIict5IwYKpp662BXAD5SMw==', 0, NULL, '100', 'Inv-5874eaab3f739-2', 'AUD', 'Posting_project', 2, 23, '', '2017-01-10 14:07:40'),
(29, '14213283', '', '60CF3QxabIwtpFktncBoij7XEm5kJGe-qzfTJnPItLLzDapl-R-qdpolyZMpMEoHlzW4JSA7I2No7R4QEl9mTeWlAp6JcRjAdbIoGhXYggM2pMqCbGdLqPUlSXwm92daUsB_noH2I5o1ByBulHBDYXlAMuQ==', 0, NULL, '100', 'Inv-5874eaf79ed0a-2', 'AUD', 'Posting_project', 2, 24, '', '2017-01-10 14:08:56'),
(30, '14213287', '', '44DD7-q1HJYep6sj9YDBqhIqi5L5U5oL2JQn90BArB5AAMI4z_xczrshcyCVNJWi6V6H-JmQrDgvb8hpsSl5CIWskmFKvq_xW9LMTYyFdV5Qe6sP-InR2CdQXR-6JAiQwL3I_0MzdjiGfi90wgtQnWXRroQ==', 0, NULL, '100', 'Inv-5874eb6f94f2f-2', 'AUD', 'Posting_project', 2, 25, '', '2017-01-10 14:10:56'),
(31, '14213288', '', 'C3AB9ydw7rIx9uxLrlf1NKAndF4Adkr506GW2MLn1dSP3yQHh_7kJMXkpH_q2xWNY5TTevdqW3mOcExgeGqxiOgjQN6B-cC72jueFJXVba1Lo4ZsKwy698JoEz_03uVrY2a58iNzzN28LXlsNiAleb5s82w==', 0, NULL, '100', 'Inv-5874ec0a1b462-2', 'AUD', 'Posting_project', 2, 26, '', '2017-01-10 14:13:31'),
(32, '14213289', '', 'C3AB9Mdt8SHF5HBbTsO1ipEUSb5eI4SSJ9z0LVzL3rsDJT0vfIsv-6mWAFp8lIuSWm59NoBlFwcSILFnyo8MxyyXBJO8FF5GOYx_nPYrca7KsMCOiT2hS3-djYdISXPfOVJRxbI_SwjsHtsYKzXEXZx9UNA==', 0, NULL, '100', 'Inv-5874ec60148cb-2', 'AUD', 'Posting_project', 2, 27, '', '2017-01-10 14:14:57'),
(33, '14213290', '', '44DD7I2YZJtQYKpKgttpA6a-_rmP0jGb-KNl0798eYnLR0QIP3baI4EeeA13A_zhpSZVhvZn5_ffEA6XZy7Guk-9ZaPrm2A-OovA-KEx0hQacRF-W940qPC7Vrd9Vy5Kgq9PEgdTq94p4CMB3G7KoWZADQw==', 0, NULL, '100', 'Inv-5874ecd33924e-2', 'AUD', 'Posting_project', 2, 28, '', '2017-01-10 14:16:52'),
(34, '14213292', '', 'C3AB99huSE1LG2zli40tnhqDpvVw4TO5KjtsMyafnwE_wtM19hzQj23LosncwurtxAhGcM3sfvMqKSNUhSDBXsPBr30xzbsafKPcXhU98BniDoumSvvYfmRMRWgCHqBrcgrQ3c6vHWt76DGKE9R8NCQvt-Q==', 0, NULL, '100', 'Inv-5874ed30206fb-2', 'AUD', 'Posting_project', 2, 29, '', '2017-01-10 14:18:25'),
(35, '14213293', '', 'A10016Sk4xmSE54w-nK2aGlhtvethZS4ha9Zd7D7a2ThITdnCgT7652CHYmBtkWduGAQdDQ1kDij5BCZ-KD3G-NFNPi2qJcm3ouh7gh_jIQhlfNe9KAek3w1-E9JiZctfy4VBsjXjMWv80h0FT_31qfK6DA==', 0, NULL, '100', 'Inv-5874ed961ccc9-2', 'AUD', 'Posting_project', 2, 30, '', '2017-01-10 14:20:17'),
(36, '14213294', '', '44DD7qKElbtxQZBbd4pRvr-ok_MuAwuR16Oj9uFIOUCQH-pVRXQ7yu_lVC4CI6wr_tVm5nnns3T21bSdOf3lNkZZw7nRGuMfkwrGlvKMrTZe16AighyFeJm0LxHmSXZCHH_TTXCWmsOCVuSvVfTY1tdCBpg==', 0, NULL, '100', 'Inv-5874edeac96af-2', 'AUD', 'Posting_project', 2, 31, '', '2017-01-10 14:21:31'),
(37, '14213295', '', '60CF3SZpo4W-HywLmkRGxpfdLgZeM9TKOvKSJS5I8fgvw_F8AAeHXNFContUWLv9Rlavsq-XZwvmVxxqE1c1Mih2oiBRWnDJ6VO3kwlKjIaTk-9rwp5wkXatGziap8aM9L7dDmKzAbjolPvfWngXLwxjGow==', 0, NULL, '100', 'Inv-5874ee2adbbc8-2', 'AUD', 'Posting_project', 2, 32, '', '2017-01-10 14:22:35'),
(38, '14213296', '', '60CF36D3NDppjaPLPJVLVMcoquTiO30DJB2rc_MQZbDvFBeKjDIlnmV284WYIGCl8-9ecNWYNFaT9dQnb5q7m1t8AXGJKnJ6q5AagF37JWHqBWc3iOo7BQsFBdt77mn_1C4YAc73wj7OtgHh-N0FKIdJ5qw==', 0, NULL, '100', 'Inv-5874eea24a72c-2', 'AUD', 'Posting_project', 2, 33, '', '2017-01-10 14:24:35'),
(39, '14213297', '', '44DD7s3T18WqCVSx_icsRn1vXZhdHJBkUsA-g2nJw-AM-v6JPLT4fIu6mQhhkt-iS4XT4NabNCXYYW67JSScI_tQoF6oJGxVQoQXz1YA2SBFeSdLnKkWE-hJ9cBdWkSOCZPidK6l5QsrK-wOIibZ2pC2fRg==', 0, NULL, '100', 'Inv-5874ef25b74a5-2', 'AUD', 'Posting_project', 2, 34, '', '2017-01-10 14:26:46'),
(40, '14213300', '', 'A1001dCvid2FG0Ngvm3Z6x9O8u4A8YRh9aHO0Ns2KKaPO-jwcx5WRRbTZMMknVqP8-nBo8fqhPaTkoRm7roc8QWZmogGH7Han8jX_mIVh0KGkubRAOcvX59ZhZe7pBvdl9RiDRGbMxsaaEhjbG5Db9c0VHA==', 0, NULL, '100', 'Inv-5874ef7d9b026-2', 'AUD', 'Posting_project', 2, 35, '', '2017-01-10 14:28:14'),
(41, '14213303', '', '44DD7t2DbNwHxHrZVijy_S1VClMxpZ9DU0lbkSZY7g0zGe9Qf5UR9wRhvCDixBAZKVEUW9LZSfzUajSge_IwpYlNmsvNP9qi8JVOnW1pZt9wUAVkJyt-Wyu7zi4eFg8bv4XUzDOjlihXjLNbU4QCzC9AuNg==', 0, NULL, '100', 'Inv-5874efd96abb4-2', 'AUD', 'Posting_project', 2, 36, '', '2017-01-10 14:29:46'),
(42, '14213305', '', '60CF3TJfoLVARZdffRtVQVRwAMOLOpIWW6gkmLmcJh2RlR386opr7wSfGjJJLlukmzRwpXYWXJFsjAOCIaZ5bSgG1xGnaP-ne-WZR7ZS9tBSBc_4IP4lqtIDGqM7pMYHeFVwJIDJmds7JzLTWWK6mwJe4ow==', 0, NULL, '100', 'Inv-5874f0404fd6a-2', 'AUD', 'Posting_project', 2, 37, '', '2017-01-10 14:31:29'),
(43, '14213308', '', 'F9802FYrhQH37FbvN7H-ShCW4Lw9-mXrLlt67rRCdYQJ8UZEYSl-awJO-fejbCQIsHUzk7o1TnCr3Y_k74II3g06LlzshLZ6IkgOTuymuZhk3qm_lmUAOR0xm_3z3rcLgJFlYDj34lb8np4DpecGo4DrKWA==', 0, NULL, '100', 'Inv-5874f09cd54e9-2', 'AUD', 'Posting_project', 2, 38, '', '2017-01-10 14:33:01'),
(44, '14213309', '', 'F9802DLmUTV_f1gMEO3kO-osY1jBmNfvMWndxtKhZHOuYgTOFw_hAwWOuPQ0RGSKTyqxqzobKmTNvg6pSmLOYi6DhPft7Dmm7ilmW8-JeJ_fcZ23zHJl6-EPvLUvbHqQlQwkkmk2197bGOmYn6z3SNUJf0A==', 0, NULL, '100', 'Inv-5874f0de07b7a-2', 'AUD', 'Posting_project', 2, 39, '', '2017-01-10 14:34:06'),
(45, '14213311', '', '44DD70lIxub9rdaxYLErd22g2NraUAIx6Pmmp8GGQoqhvBosZmfZDqlErRHz1yZ9_LRYUXDSa8etKGWq3EKoGKoFcQFh-qyS-zKjvYD3Rjt0pZJc1aXRLxWf3aCb7xgBmrRMoOPfAuOGGX1jx1tXs-cJtIA==', 0, NULL, '100', 'Inv-5874f129dc35a-2', 'AUD', 'Posting_project', 2, 40, '', '2017-01-10 14:35:22'),
(46, '14213312', '', 'F9802PLaBWjMqwB2egWNzQbXFl9OXK9pLE3F1uKjLG_t9zdbNw8qvRLPbpjYzC9xJn9R0UwXDJdUZQiwQBJjl_pXth7doirRbrt_LCA5Gi_SqRt62lSobVQds2mSxKhNIKHx6o1iqiiGIpDfrrhgJ86Ildw==', 0, NULL, '100', 'Inv-5874f16d1372f-2', 'AUD', 'Posting_project', 2, 41, '', '2017-01-10 14:36:29'),
(47, '14213313', '', 'C3AB9_zaQHsg7_0XUp8omePX999KwJxmDCj4D2JfobJu3tUCNU5mtBpaUsD2Va00lFggyBabf3-AXzgYp6Z4AoL79-BGE3Gr0LUZhfZ51AnmOCSQFE75vb1-LmMh4rmd-eXP6wz93ubmyYnQg9AKwRQ1ivA==', 0, NULL, '100', 'Inv-5874f1b5dbc92-2', 'AUD', 'Posting_project', 2, 42, '', '2017-01-10 14:37:42'),
(48, '14213319', '', '44DD7YSS_F44As_2M2QA9tD7uuJ-Otu1a8j_UONUaqcSQjmx8qS6NHDMlRnPcjjyEMeU-IjhWVMlbWb4xT0RNDKi6xk2fZxcbkCMX89-EZjqE7kRPbnnS3bA2W1oNjt0-ppdMKKJik-8i92YfxzD8WPm_hw==', 0, NULL, '100', 'Inv-5874f2073196b-2', 'AUD', 'Posting_project', 2, 43, '', '2017-01-10 14:39:04'),
(49, '14213320', '', '60CF3jIPZgF1xqvSLdIspDiqKWSYfx5rWgN4tIeXVWyMlb7k49E5GE_9MYwRhWt97pBc8JH4F12t6PLg13aNkOss1UkxUTExq0pTb1rmydAUiektMZntFxP6pP927Wg64jL5yQBMIbRDWZ1lUWc60Ci2fsg==', 0, NULL, '100', 'Inv-5874f2873efa9-2', 'AUD', 'Posting_project', 2, 44, '', '2017-01-10 14:41:12'),
(50, '14213322', '', 'A1001-Q3gcRwjcSixsvzLFsizipBKa1Q8EY2OqyD_KyVEebmyfZ-gutiNxIjBET_F6faXtkCBRAdfjq-KLh9hph5IhIPtSAFwBGc4AZMqkxJ_6Hu2S3F6vzicW06yhO3BQ_GBMofZFlR8g4zBDrZ1efIadQ==', 0, NULL, '100', 'Inv-5874f32a9726f-2', 'AUD', 'Posting_project', 2, 45, '', '2017-01-10 14:43:55'),
(51, '', '', '44DD7R_YGlvw6eeikqe2fRYWc3Q6pNgWGBDvqcK--RYDPBOiqVdRSGBgpChjidRvcnHv0t7-ohVNl1sWZjfpsbJAys_Ak6KTAgkDqyZWAgyASIgruv3QsHihBdM8vkFU4NgayPZJR-xKqdocq6mw9geTRdg==', 0, NULL, NULL, 'Inv-58775fda0995c-2', 'AUD', 'Posting_project', 2, 47, '', '2017-01-12 10:52:11'),
(52, '14217272', '', 'A10017Va_wXICKOAIfMw3w2oaNlpXCQXuy2ApkrkeoP9X2jdOD8SHfod69ELkYzYin9AgG36LStcuauNoGw-siJUKonLam0NzeOQEK71bOa150diHeob8aewo0O5GvTuvl-Cewopf0sny8EXPGOU_UcifZQ==', 0, NULL, '100', 'Inv-58776334b0fe2-2', 'AUD', 'Posting_project', 2, 48, '', '2017-01-12 11:06:29'),
(53, '14217414', '', 'C3AB9R5KELHn_MlRizQVrYOR-czSGeyAGetOa5zsrMRsg5LgmcSitrUDfPD0qNzn_tE_MavlrPd4OjM_Fs4zFQoAHXTiY05HdpV7HI79l0W5x1S-Elq4isaWlg2CMW9syDvD92Sc_u1ttq2ZxOBw8Icwobw==', 0, NULL, '100', 'Inv-5877798b8a5b5-2', 'AUD', 'Posting_project', 2, 49, '', '2017-01-12 12:41:48'),
(54, '', '', 'A1001vgoBQlhy-T6WFxvsRRd33QN_s_JQRbxnRsq-Lu6QqiKl_uuyi_qOv3XBh7D8Rx1_Q5DaLOmRW89QhsA-UpZEiJx3t0nmQFazlidZ62kd_5oiBW5awmggknRt1Q0fIFmOYXjuM8cJlmh6Ndxd-EHJ5g==', 0, NULL, NULL, 'Inv-5878a0526edc9-54', 'AUD', 'Posting_project', 54, 50, '', '2017-01-13 09:39:31'),
(55, '14219618', '', 'A1001hKYYcmviaBrzYCMrF6WLc2acvbgrLe0Xc8jnq_xPMlMCVstgT92XuCJGh3YDMgbLAt9eOjkZ8MzG4gJusqHvgRFPjaGvnsP7wfb7SNU2LbhQpWhcRM2aiHauP83BnC41lZMhO7CEaAtLiZUaq5RQSQ==', 0, NULL, '100', 'Inv-5878aa439df4d-54', 'AUD', 'Posting_project', 54, 51, '', '2017-01-13 10:21:56'),
(56, '14219633', '', 'F9802f9yz_cmN5hGMvnzGNlkP_EGWHK-nUCTvlwuKfreUd-h_Gi9BMIb2OaR8QtG5APUEYj6kJfyZ73CG5fjfYBoEnlciHmDMbAkXG76fN2R4siIM2_bpj5GVQE_UMekgisspD6pTw0BwDGQQFlmTPVP6cw==', 0, NULL, '100', 'Inv-5878abab51b99-54', 'AUD', 'Posting_project', 54, 52, '', '2017-01-13 10:27:56'),
(57, '14220263', '', 'F9802VBP72pDy1AcqopFPfTphBoCGDwEZFuwfEd8bK7ndBEQfWdkRx8OzGqIVwNxjVQQNxk2tvsRO5WUOyONoWRchNA1daFsNybTwXC3_sTP23WFybXO-6IYe3GcLt8sGmPxq5rDsLhi5cfPPBthJxXKp6Q==', 0, NULL, '100', 'Inv-5879cbd57673f-2', 'AUD', 'Posting_project', 2, 53, '', '2017-01-14 06:57:26'),
(58, '', '', 'A10013LbFe-76-RFolgyng_jXAr3xauHiE4IFVUonNMQnHcnQZSLtk8kHZKtdiogjOMJHdFzCB7NOw8W1vGxaIVYTJ0jyMHzo6MWUmol4qx78riz64FRIMTPYYEdSz4Zf8HlS2aBembbEV_nBPtO9tauoow==', 0, NULL, NULL, 'Inv-5879cd5f963fd-2', 'AUD', '', 2, 0, '', '2017-01-14 07:04:00'),
(59, '14223366', '', 'C3AB9CinU6mLoU0j3H_h_-cxui_Il0WP4GF90N8EUkaQCXmkBmEMo1Cok8Yu7wZ1ND2mAtYVdGKJoiov1DTzgtgiNM6fT0UEJGTVbusREwQdVdROKBbWspNK39CckR0Dp77jAZDKaNwoLduJDad7PAqJuCQ==', 0, NULL, '100', 'Inv-587cdd907bea6-2', 'AUD', 'Posting_project', 2, 57, '', '2017-01-16 14:49:53'),
(60, '14226350', '', '60CF3y_6Ql1qMUCQ1TDzde-s33lStglI_dikv_KtGmbjvrf86wNnmHRegm-sbt0iE9lsrTxoQa1KivxmlMAbDewcH95Ws5Hu3GaYG5pRac9L4DUdCCp3ZoMBFl66Ljsl4m8W41t4ncs8jXwIWYDfi7PJJyA==', 0, NULL, '100', 'Inv-587e33a1dcc08-58', 'AUD', 'Posting_project', 58, 58, '', '2017-01-17 15:09:23'),
(61, '14226352', '', 'C3AB98ilhsTrGDUSxk5DJ-KzBLzGIXtjOHXKXu_wMMQwyAVD8zVt8p33bBgmKCP3bO0-bj5Uo3kOJCjiR3lBKvrH8a9Ptc64vnIBgCdPHCeRf0YY6qgm0pRUafbZtLMv-AugyYbxPXvhvp7dsotB59CYdmA==', 0, NULL, '100', 'Inv-587e3732b5d37-58', 'AUD', 'Posting_project', 58, 59, '', '2017-01-17 15:24:35'),
(62, '', '', 'A1001ggxJvJ2i1i1WoBW3a5zIs9aYGhrmVOKpalBBkTdDO8w80MqdqsEKCnWURtPkvHx5FW1sR-KmBsDdZgL1B8aZecRYRLwrflw1YnnteuKBV1elVI0DRXegqjg4C0vW8Ms_iUB3eq2nQu31AKCP24ylDQ==', 0, NULL, NULL, 'Inv-587e3a5f9fb88-58', 'AUD', 'Posting_project', 58, 60, '', '2017-01-17 15:38:08'),
(63, '14226358', '', 'A1001t7yYAsqeDj1kd7NW7YicdFFuNrTi5BzbVvRFy43wqry0CfbJV_LNPzqxjHZn_CmWdwMyPAlJ8MRTaAqqQ1mLGH7g61CpdIbD-VPARNRPbr8fLsWNAf352VnDj16pYNbXK0IStRSATmVPNRJ0Qi85WA==', 0, NULL, '100', 'Inv-587e3bec80ae1-58', 'AUD', 'Posting_project', 58, 61, '', '2017-01-17 15:44:45'),
(64, '14230680', '', '44DD7VXYZdtPC-L4z7cFscbW0CCDP2dVxOXnYy92MdnPqthyimXzBIRYLHvE96Gu8_26hH4PFuIi-BGD-0WCAlblHQWfc_4F9lxvcfmWVFwypXcORdsluBXW3ubI2w-W54P7C3DG3hlVGs3_WKzwfYQKZjQ==', 0, NULL, '100', 'Inv-588075a27e9e9-54', 'AUD', 'Posting_project', 54, 62, '', '2017-01-19 08:15:31'),
(65, '14238770', '', '60CF3qveMF_SLS4BiI0cTVIgWMfoptDsSzAykAXutEPQi2--q77HCPYkyAl-V97B11cvmc5oGqoJhciTsdu2CaXWrFyn8vrJNI87288yTzZbgt1p_K0oQf0SdpkWYK7Ii088KRv0_6IGSljRWDkWR2Lqa0A==', 0, NULL, '100', 'Inv-58872971e2514-59', 'AUD', 'Posting_project', 59, 63, '', '2017-01-24 10:16:18'),
(66, '14238796', '', 'A1001L9pwk38F4TXF6HTC_QiEqZvY6KG-eM1x3Q4boXI-_IWa041nMTnxhDrEhU1-ByeDmPnQfZVmqoWVrtmJ0Rv4i9Cgb2gbsBiNQCj36fdrNIv1z57NhWPWvnZ6NQof6n0yN2t0Dids3kaUsDo1EsdjSg==', 0, NULL, '100', 'Inv-58872fb26358c-59', 'AUD', 'Posting_project', 59, 64, '', '2017-01-24 10:42:59'),
(67, '14242443', '', '44DD7VOcS5zQULzpKxRaMLdKhtVNvcwjpFb0SrofWmcOe4KQbtCZ_GnuDJBBiK_VarUwrObElYtFXlpWBeTyi1GAo3iozJzPn1tuNan8iqokpefDGZ-6TTSXtHBFOVF56s_Q30PGbajyMY_PjfMEUQ7__3Q==', 0, NULL, '100', 'Inv-5888ad0fd6539-2', 'AUD', 'Posting_project', 2, 65, '', '2017-01-25 13:50:08'),
(68, '14242445', '', 'F9802yFnqwjXRjvu4r_L-OyKblMcDmMZryncTNzq3IKTOoOkbmHRnSGq34RLKrNkXTnHLrrqTA0pfMjcU5CJT9E4EYavOJIdYT7vb0uAEP0U9FgESG6xJbkmC4JL8sblD3hS4bfXvDK-yr0XP27wb3mEAGw==', 0, NULL, '100', 'Inv-5888ad89980bc-2', 'AUD', 'Posting_project', 2, 66, '', '2017-01-25 13:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

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
  `last_updated_on` text COLLATE utf8_bin,
  `project_status` enum('Open','Ended','Unpaid') COLLATE utf8_bin DEFAULT 'Open',
  `access_code` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `txn_id` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=67 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `user_id`, `name`, `description`, `sector`, `suburb`, `budget_range`, `fixed_budget`, `is_inspection_required`, `is_da_approval_required`, `da_document_url`, `is_urgent_project`, `is_hiring_iwtb_expert`, `added_on`, `last_updated_on`, `project_status`, `access_code`, `txn_id`) VALUES
(1, 2, 'test189', 'test189', 'Commercial', 'suburb', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2016-09-18 01:33:10', NULL, 'Ended', 'F9802ZwlB024paLMhj4dvbTt2kjgmBnA4adp8Jp6-MloE0ntJ-fruD6WzNWxRetQwhnMY9_-gkk1jCoff2USQriVkGkr6S-G-iUCvzrSqvCWYu98jAIDv3jZnSJBXoZjTvQFKBNhW8ZXpbE_O8S7oZEZLaw==', '13941467'),
(2, 2, 'new projec', 'test', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2016-09-18 02:26:17', NULL, 'Ended', '44DD79EY3Fl0OJfc5rJ2Asonwrexe_bWit65IFaunE8ehidez8vpD20X5x3tz7Lnf9Slzk1GH0eO3YKTCC2EVjKWHbmHvItW4xUu7dH4QQHvKenztdrSNknlqypHyCkXcmwB5fecYHvvbCN-GR22T4Pjfqg==', '13941483'),
(3, 2, 'php', 'develop Php ', 'Residential', 'develop Php ', '2500-3000', '0.00', 'N', 'N', NULL, 'Y', 'Y', '2017-01-10 07:46:14', '12/01/2017 04:11:31', 'Open', '44DD7xWt8AMheyynzf_8Ye6DqxrtK6fqLyWzTmO6MAJTfmn_kC9LeCkjivblGtP5tQBKofFPAWCc486M95XtO4qcjhdljmZx_zj4xjP7D7xq2l_9hzSxdU5rYRTYpT3XHqWmQtekKZzW3YoZFmVYPOWP5lQ==', '14212786'),
(4, 10, 'builder', 'Project Builder', 'Commercial', 'asd', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 07:58:32', NULL, 'Open', 'F9802Rdf5zxvroeYi1f42AVBsLu0MfZ4xb94bup1N6JdMnuPXX_KHOwafIt-gysI8j2-ITsoy6nbc-BqpqUHjcMCxXrh1zRym6WaOaQMyGaJR2A0ISy4LIvHYJhRW2BAhllkdHhhMs9AiO8uC3rkvGAwYlg==', '14212795'),
(5, 10, 'PROJECT_ELECTRICIAN', 'ASDDASASDASDASDADASD', 'Commercial', 'asd', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 08:00:35', NULL, 'Open', '60CF3Sa51YuO7k1Izo8ev6BLi2yhGw1yFg_fkzmC4ArVOYaeeD_g9qepl2PNZtS_b03wmbRpN2T5DCDpm6tuF2LiwovJFTCXIMZgOJ0V-uEXfGuMHg2ufIwbfiATHDJ3H2x6Rhx3A-bE4yJnPh0QJ8d6o3A==', '14212797'),
(6, 10, 'PROJECT_PLUMBER', 'JUNGLE AD', 'Commercial', 'asd', '>3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 08:02:31', NULL, 'Open', 'F9802WV5yJzCR8PjqSRgoHsN0EVdVEj23_965VPeRjA_6ZPQYoTS0J25xj2NM4CvFLAGeOO8N5TIW6hWPBBkowgYPL8mi_sYqgijQ9XawY1pg4MwagHhHoYEZb1rMjN-gz7jyGYssJX-hRUIFmu0I5aS7ig==', '14212798'),
(7, 10, 'ENGINEER_ELECTRICIAN', 'ASD', 'Commercial', 'asd', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 08:29:21', NULL, 'Open', '60CF3Q1IrhUn44OycEjeNohHn5KUfHEjwC9n_GdjP7kR629cQjboCGBEJIGbMDZVl0GEthD0C6xV_0sK7eaIQdvce_sNMZ2P563ptDGSBnFbvllxBFO5JOvyd430P-AKnQj2mWmTtvxbBig5yhljbCiEryg==', '14212838'),
(8, 2, 'PROJECT_ARCHITECTURAL/ DRAFTSMAN', 'KAKAKAKAKAKAKA', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 13:43:51', NULL, 'Open', 'C3AB9i_xU1A8OxnOcZYIsf1WQQSy9MwBeQ7ixhVvPNjpUg8z9sTD9HqS4VO6NmR8BVuA_VMqy3_3saahO3uEyjc9J4d9t_1htlSswhSUOKncKHn9GbIyT2lwr2wlICHgVmubGIQWUNkAz7-c9caEKzJxr1Q==', '14213239'),
(9, 2, 'PROJECT_ASBESTOS_REMOVAL', 'KAKAKAKAKA', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 13:46:13', NULL, 'Open', '60CF3QAHD0kEixlsdR_hkYDlsMyvqUuxo_v2oHKBIYzYU9q7WoQLuS-Rfah5x9FTojzdBAddRd430O5eRgCJ5n7wp6q-ajomzYNX9VSMDXPGImL1SiyUwcMYxcm4d-i6q0-LrwizUeYjOSbQhiRIB7m_qjw==', '14213240'),
(10, 2, 'PROJECT_AUDIO/ VISUAL (AV)', 'BBBBBBBBB', 'Commercial', 'suburb', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 13:47:38', NULL, 'Open', '60CF32P_aR1qlVymci1d7Y3FyuUQG-PuSPVLa7Zv8KRVpYiaK2pNngG2JmBWXU-geUjtCtQuFbnJ_zrhWcHTbinOyYbjp5h03PHUS30jZNGqG5vRmy0QwxPTOUvcYK6AkqXQmApJd9g0KBcbLM_1kmS4Zow==', '14213242'),
(11, 2, 'PROJECT_BALUSTRADES', 'VN', 'Commercial', 'suburb', '>3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 13:49:04', NULL, 'Open', 'A1001CcKzc6XOvzVi7cZme76HF95Y7WkdVRJTL8IyR-HsSgQqpjQuH7bNr1_l9_Nb7FBSgT8N6D55a7KWI72ANSt0DyrLSj_Xqw4071ZLXWlvCKisLmCQpmayJtJoW7yGKa_74wQC_gj63SMaht2av84_eQ==', '14213243'),
(12, 2, 'PROJECT_BRICKLAYER', 'BBC', 'Commercial', 'suburb', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 13:50:19', NULL, 'Open', '60CF3xarzwN3Iur1YXv7vmOkadl2zxz_UmEd6sLP8Io8CZm8r-l2mHHC8LBvUG6Y2Sje219dJuB0wrj5hh_WGt8MkhR5kDhiY9YWr-1-27AY_zm4X_vWKg7EUts-SKMoGV0x_qj9zyn7wm6fpQDDKDJhtCw==', '14213245'),
(13, 2, 'PROJECT_CARPENTER', 'ASD', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 13:51:54', NULL, 'Open', 'F9802RU4LE4lyVuyfhMTf059udeeceEb9KBt0XeJgeBLxWGjdCaJGqOPsM9IGegs5gaBn9MbFeTs6uc27Ywdnw0yVvBibd7xvcPSiZZiv0Jcmezog6UN20MAcG4YmFHb0RrXu4klxwxYLmgpqoMQ_fXqlsw==', '14213249'),
(14, 2, 'PROJECT_CLEANER', 'ADADAD', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 13:53:24', NULL, 'Open', 'F98028nN54Rp6pdYd45JPEqopKjEJH3CpCJbq_VzbU3Y2lCn_3swpYfluMAhUKsjk8cDiHR2KSEaGKwPoJtK6VSFDj7QTMCGCNnZGpNxG9EDvbAYSeK61fARP-jI0d0a6cKm_6191l6-XtC_ZB3cD4L2-cA==', '14213251'),
(15, 2, 'PROJECT_COMMERCIAL_CARPENTER', 'FFFFF', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 13:54:42', NULL, 'Open', 'F9802RMzuxtyb4JO88w7P_o7cU7UNHzT0iY7lKaJHeUu-9HIloPCYh-W1UHq5TfDuJRb7EPwJDB4HjHs2Bxjga60KHebVkf_SR8AdXD0ID_OnxxvJN-2mKia8upgSLFcKTJ7mwVryIWXFW1Dfzx-zQ7_hLg==', '14213252'),
(16, 2, 'PROJECT_COMMUNICATIONS/ DATA', 'MKMK', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 13:56:19', NULL, 'Open', 'A1001EVZgvKHDfuHk47zBRqNdEjIvcNGsrTXi5z8pkKSK2jJvnwedV9o389WaCmnPrg1S84UhZeKeL3U-SuyIkgWcRo3RX_wNrWkc-O5wZ8abgyquKytPvxR9ZJoImRIwK5tsscX7Ug5QMAHJ277A_SWq8Q==', '14213255'),
(17, 2, 'PROJECT_CONCERT_CUTTING_AND_GRINDING', 'CV', 'Commercial', 'suburb', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 13:57:35', NULL, 'Open', 'F98024s2GXBJNxRmRbw5o_AFB71tWnmLxlVUpV3OOXc2vyJqMaCFMUPoEGPLqr3JAp529gS5bHGpdYbALkqJ-Cn2hvACRae73lBn2VOd020_wDU-ctvZE5zg9k2MOpHPCRLuYvulVX5fr_-dKgCqZUmiEYw==', '14213256'),
(18, 2, 'PROJECT_CONCRETER', 'MSN', 'Commercial', 'suburb', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 13:59:38', NULL, 'Open', 'C3AB9g-aSZkNXgG3vPcV-jfKOXbaQ0hDQvFXCICe_Ro7Ssx1v8aHCVqE5sVSlrY5diPhZV3gtqfOb7tPK1jGhop4udhDGtk6fR2PQNCpxKhhnTAwUFQS7869sdXhNj4DAAoyS8ErrlufcYrybU7T1RTPHbw==', '14213259'),
(19, 2, 'PROJECT_DEMOLITION', 'HK', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:01:28', NULL, 'Open', '44DD7RzGUxdBvLgg_P5I49Ch8_OPt5A5uV6r2BVBSR6urVdjZz9uLTVHBGU06zEMwHjGxiKrItL0gFSHmoKH6jpNV3bDybZhc2oUMG3-nuGOOtpnNofe-Nvi8kaEWzvorN6zCc7G2RcI5obFmBKv1JVKfAQ==', '14213264'),
(20, 2, 'PROJECT_DOOR_INSTALLER', 'JUNIOR', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:02:57', NULL, 'Open', 'C3AB9LQmUg9Rd9QKDUuApJWQFJlBU3XGX-mL1R6yYOeoBDg45iHSUGTb5gGOmeEeT8emjorUZGzzuyPgDn5O2-qlRy6hTa1eL0Ks4Edg9PDBKxbtOY7zez9oDNHq9ebg2BKt9DXouXj8C3lt11SuVeHcQkw==', '14213265'),
(21, 2, 'PROJECT_ELEVATOR', 'MAKE NOISY', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:04:48', NULL, 'Open', '60CF3A2OtCSfhfMRdMTr9GaGT3o_ItriNfJwP3tJGbw_O7BOM1QerbrdFKg5GvxD03TVfqSyHr9xOtG2uFSXvrRU3GpWe-4SHYoU3W67MQyfb_Sa2QU2lMNqgtNY0m83cIGPkVBWZMy9Ok6qvHs-szWoPMA==', '14213274'),
(22, 2, 'PROJECT_FACADES/ EXTERNAL CLADDING', 'MISS', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:06:19', NULL, 'Open', '60CF3vkZUaI3Lx99L2MNnYm8RqlrkTXJoVLYEBBNoospEgMx2XMUYEPyzdtzSVCy52t5YGMZMK_TTx2bf3SnCpHnudbkjdlMmBY4JyeoaOcGyFIGXsli4m3ZGFvn-aqkyl9VhaXsdFnur5LHoI7-5NgksDQ==', '14213277'),
(23, 2, 'PROJECT_FENCING', 'ROUTER', 'Commercial', 'suburb', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:07:40', NULL, 'Open', '60CF3-JOLroVJ6NR7biKzvBDzzBwNu48-0GIcm8dmGE3An0SnxeFocoaS8c0Qg3wB9GRdmipCBEaJ3fCu8fZ_e2BXkKLQhjymt5_9-chSNa4y-aSFGxc9g770vzNTpLaZZ_1aIict5IwYKpp662BXAD5SMw==', '14213280'),
(24, 2, 'PROJECT_FIRE_SERVICES/ HYDRAULICS', 'PICTURE', 'Commercial', 'suburb', '>3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:08:56', NULL, 'Open', '60CF3QxabIwtpFktncBoij7XEm5kJGe-qzfTJnPItLLzDapl-R-qdpolyZMpMEoHlzW4JSA7I2No7R4QEl9mTeWlAp6JcRjAdbIoGhXYggM2pMqCbGdLqPUlSXwm92daUsB_noH2I5o1ByBulHBDYXlAMuQ==', '14213283'),
(25, 2, 'PROJECT_FLOORING/ FLOOR COVERING', 'WORKING OUT', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:10:56', NULL, 'Open', '44DD7-q1HJYep6sj9YDBqhIqi5L5U5oL2JQn90BArB5AAMI4z_xczrshcyCVNJWi6V6H-JmQrDgvb8hpsSl5CIWskmFKvq_xW9LMTYyFdV5Qe6sP-InR2CdQXR-6JAiQwL3I_0MzdjiGfi90wgtQnWXRroQ==', '14213287'),
(26, 2, 'PROJECT_FORMWORK', 'INNER', 'Commercial', 'suburb', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:13:31', NULL, 'Open', 'C3AB9ydw7rIx9uxLrlf1NKAndF4Adkr506GW2MLn1dSP3yQHh_7kJMXkpH_q2xWNY5TTevdqW3mOcExgeGqxiOgjQN6B-cC72jueFJXVba1Lo4ZsKwy698JoEz_03uVrY2a58iNzzN28LXlsNiAleb5s82w==', '14213288'),
(27, 2, 'PROJECT_FURNITURE REMOVAL/S', 'BUDGET', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:14:57', NULL, 'Open', 'C3AB9Mdt8SHF5HBbTsO1ipEUSb5eI4SSJ9z0LVzL3rsDJT0vfIsv-6mWAFp8lIuSWm59NoBlFwcSILFnyo8MxyyXBJO8FF5GOYx_nPYrca7KsMCOiT2hS3-djYdISXPfOVJRxbI_SwjsHtsYKzXEXZx9UNA==', '14213289'),
(28, 2, 'PROJECT_GLAZIER/ WINDOWS', 'EXCUSE', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:16:52', NULL, 'Open', '44DD7I2YZJtQYKpKgttpA6a-_rmP0jGb-KNl0798eYnLR0QIP3baI4EeeA13A_zhpSZVhvZn5_ffEA6XZy7Guk-9ZaPrm2A-OovA-KEx0hQacRF-W940qPC7Vrd9Vy5Kgq9PEgdTq94p4CMB3G7KoWZADQw==', '14213290'),
(29, 2, 'PROJECT_HIRE_EQUIPMENT', 'ROBBERY', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:18:25', NULL, 'Open', 'C3AB99huSE1LG2zli40tnhqDpvVw4TO5KjtsMyafnwE_wtM19hzQj23LosncwurtxAhGcM3sfvMqKSNUhSDBXsPBr30xzbsafKPcXhU98BniDoumSvvYfmRMRWgCHqBrcgrQ3c6vHWt76DGKE9R8NCQvt-Q==', '14213292'),
(30, 2, 'PROJECT_HOARDINGS', 'BLOCK', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:20:17', NULL, 'Open', 'A10016Sk4xmSE54w-nK2aGlhtvethZS4ha9Zd7D7a2ThITdnCgT7652CHYmBtkWduGAQdDQ1kDij5BCZ-KD3G-NFNPi2qJcm3ouh7gh_jIQhlfNe9KAek3w1-E9JiZctfy4VBsjXjMWv80h0FT_31qfK6DA==', '14213293'),
(31, 2, 'PROJECT_JOINERY/ KITCHENS', 'BROKEN', 'Commercial', 'suburb', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:21:31', NULL, 'Open', '44DD7qKElbtxQZBbd4pRvr-ok_MuAwuR16Oj9uFIOUCQH-pVRXQ7yu_lVC4CI6wr_tVm5nnns3T21bSdOf3lNkZZw7nRGuMfkwrGlvKMrTZe16AighyFeJm0LxHmSXZCHH_TTXCWmsOCVuSvVfTY1tdCBpg==', '14213294'),
(32, 2, 'PROJECT_LABOURER', 'DOWNTOWN', 'Commercial', 'suburb', '', '1200.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:22:35', NULL, 'Open', '60CF3SZpo4W-HywLmkRGxpfdLgZeM9TKOvKSJS5I8fgvw_F8AAeHXNFContUWLv9Rlavsq-XZwvmVxxqE1c1Mih2oiBRWnDJ6VO3kwlKjIaTk-9rwp5wkXatGziap8aM9L7dDmKzAbjolPvfWngXLwxjGow==', '14213295'),
(33, 2, 'PROJECT_LANDSCAPER', 'CHOICE', 'Commercial', 'suburb', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:24:35', NULL, 'Open', '60CF36D3NDppjaPLPJVLVMcoquTiO30DJB2rc_MQZbDvFBeKjDIlnmV284WYIGCl8-9ecNWYNFaT9dQnb5q7m1t8AXGJKnJ6q5AagF37JWHqBWc3iOo7BQsFBdt77mn_1C4YAc73wj7OtgHh-N0FKIdJ5qw==', '14213296'),
(34, 2, 'PROJECT_LINE MARKING', 'SUGGESTION', 'Commercial', 'suburb', '', '300.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:26:46', NULL, 'Open', '44DD7s3T18WqCVSx_icsRn1vXZhdHJBkUsA-g2nJw-AM-v6JPLT4fIu6mQhhkt-iS4XT4NabNCXYYW67JSScI_tQoF6oJGxVQoQXz1YA2SBFeSdLnKkWE-hJ9cBdWkSOCZPidK6l5QsrK-wOIibZ2pC2fRg==', '14213297'),
(35, 2, 'PROJECT_MECHANICAL/ AIR CONDITIONING', 'WITHOUT', 'Commercial', 'suburb', '', '600.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:28:14', NULL, 'Open', 'A1001dCvid2FG0Ngvm3Z6x9O8u4A8YRh9aHO0Ns2KKaPO-jwcx5WRRbTZMMknVqP8-nBo8fqhPaTkoRm7roc8QWZmogGH7Han8jX_mIVh0KGkubRAOcvX59ZhZe7pBvdl9RiDRGbMxsaaEhjbG5Db9c0VHA==', '14213300'),
(36, 2, 'PROJECT_PAINTER (EXTERNAL/ INTERNAL)', 'FIGURE OUT', 'Commercial', 'suburb', '', '200.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:29:46', NULL, 'Open', '44DD7t2DbNwHxHrZVijy_S1VClMxpZ9DU0lbkSZY7g0zGe9Qf5UR9wRhvCDixBAZKVEUW9LZSfzUajSge_IwpYlNmsvNP9qi8JVOnW1pZt9wUAVkJyt-Wyu7zi4eFg8bv4XUzDOjlihXjLNbU4QCzC9AuNg==', '14213303'),
(37, 2, 'PROJECT_PLASTERER/ GYPROCKER', 'TRACK', 'Commercial', 'suburb', '', '150.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:31:29', NULL, 'Open', '60CF3TJfoLVARZdffRtVQVRwAMOLOpIWW6gkmLmcJh2RlR386opr7wSfGjJJLlukmzRwpXYWXJFsjAOCIaZ5bSgG1xGnaP-ne-WZR7ZS9tBSBc_4IP4lqtIDGqM7pMYHeFVwJIDJmds7JzLTWWK6mwJe4ow==', '14213305'),
(38, 2, 'PROJECT_RENDERER', 'FACT', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:33:01', NULL, 'Open', 'F9802FYrhQH37FbvN7H-ShCW4Lw9-mXrLlt67rRCdYQJ8UZEYSl-awJO-fejbCQIsHUzk7o1TnCr3Y_k74II3g06LlzshLZ6IkgOTuymuZhk3qm_lmUAOR0xm_3z3rcLgJFlYDj34lb8np4DpecGo4DrKWA==', '14213308'),
(39, 2, 'PROJECT_ROOFER', 'BOTHER', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:34:06', NULL, 'Open', 'F9802DLmUTV_f1gMEO3kO-osY1jBmNfvMWndxtKhZHOuYgTOFw_hAwWOuPQ0RGSKTyqxqzobKmTNvg6pSmLOYi6DhPft7Dmm7ilmW8-JeJ_fcZ23zHJl6-EPvLUvbHqQlQwkkmk2197bGOmYn6z3SNUJf0A==', '14213309'),
(40, 2, 'PROJECT_SECURITY SYSTEMS/ SAFETY', 'HURRY', 'Commercial', 'suburb', '', '150.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:35:22', NULL, 'Open', '44DD70lIxub9rdaxYLErd22g2NraUAIx6Pmmp8GGQoqhvBosZmfZDqlErRHz1yZ9_LRYUXDSa8etKGWq3EKoGKoFcQFh-qyS-zKjvYD3Rjt0pZJc1aXRLxWf3aCb7xgBmrRMoOPfAuOGGX1jx1tXs-cJtIA==', '14213311'),
(41, 2, 'PROJECT_SIGNAGE''S/ FILM & DECALS', 'RUSH', 'Commercial', 'suburb', '', '250.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:36:29', NULL, 'Open', 'F9802PLaBWjMqwB2egWNzQbXFl9OXK9pLE3F1uKjLG_t9zdbNw8qvRLPbpjYzC9xJn9R0UwXDJdUZQiwQBJjl_pXth7doirRbrt_LCA5Gi_SqRt62lSobVQds2mSxKhNIKHx6o1iqiiGIpDfrrhgJ86Ildw==', '14213312'),
(42, 2, 'PROJECT_STEEL_FIXER', 'FUN', 'Commercial', 'suburb', '', '300.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:37:42', NULL, 'Open', 'C3AB9_zaQHsg7_0XUp8omePX999KwJxmDCj4D2JfobJu3tUCNU5mtBpaUsD2Va00lFggyBabf3-AXzgYp6Z4AoL79-BGE3Gr0LUZhfZ51AnmOCSQFE75vb1-LmMh4rmd-eXP6wz93ubmyYnQg9AKwRQ1ivA==', '14213313'),
(43, 2, 'PROJECT_STONE MASON', 'LUGGAGE', 'Commercial', 'suburb', '', '250.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:39:04', NULL, 'Open', '44DD7YSS_F44As_2M2QA9tD7uuJ-Otu1a8j_UONUaqcSQjmx8qS6NHDMlRnPcjjyEMeU-IjhWVMlbWb4xT0RNDKi6xk2fZxcbkCMX89-EZjqE7kRPbnnS3bA2W1oNjt0-ppdMKKJik-8i92YfxzD8WPm_hw==', '14213319'),
(44, 2, 'PROJECT_TILER/ WATERPROOFING', 'BAGGAGE', 'Commercial', 'suburb', '', '350.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:41:12', NULL, 'Open', '60CF3jIPZgF1xqvSLdIspDiqKWSYfx5rWgN4tIeXVWyMlb7k49E5GE_9MYwRhWt97pBc8JH4F12t6PLg13aNkOss1UkxUTExq0pTb1rmydAUiektMZntFxP6pP927Wg64jL5yQBMIbRDWZ1lUWc60Ci2fsg==', '14213320'),
(45, 2, 'PROJECT_WASTE REMOVAL', 'WEIGHT', 'Commercial', 'suburb', '', '250.00', 'N', 'N', NULL, 'N', 'N', '2017-01-10 14:43:55', NULL, 'Open', 'A1001-Q3gcRwjcSixsvzLFsizipBKa1Q8EY2OqyD_KyVEebmyfZ-gutiNxIjBET_F6faXtkCBRAdfjq-KLh9hph5IhIPtSAFwBGc4AZMqkxJ_6Hu2S3F6vzicW06yhO3BQ_GBMofZFlR8g4zBDrZ1efIadQ==', '14213322'),
(46, 2, 'Test project 1', 'Test project 1', 'Commercial', 'suburb', '<2500', '0.00', 'Y', 'N', NULL, 'N', 'N', '2017-01-12 10:36:44', NULL, 'Unpaid', NULL, NULL),
(47, 2, 'zdfgwe', 'retwetretwet', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'Y', 'N', '2017-01-12 10:52:11', NULL, 'Unpaid', '44DD7R_YGlvw6eeikqe2fRYWc3Q6pNgWGBDvqcK--RYDPBOiqVdRSGBgpChjidRvcnHv0t7-ohVNl1sWZjfpsbJAys_Ak6KTAgkDqyZWAgyASIgruv3QsHihBdM8vkFU4NgayPZJR-xKqdocq6mw9geTRdg==', NULL),
(48, 2, 'PHP', 'aa', 'Commercial', 'aa', '<2500', '0.00', 'N', 'N', NULL, 'Y', 'Y', '2017-01-12 11:06:29', '12/01/2017 04:54:31', 'Open', 'A10017Va_wXICKOAIfMw3w2oaNlpXCQXuy2ApkrkeoP9X2jdOD8SHfod69ELkYzYin9AgG36LStcuauNoGw-siJUKonLam0NzeOQEK71bOa150diHeob8aewo0O5GvTuvl-Cewopf0sny8EXPGOU_UcifZQ==', '14217272'),
(49, 2, 'vnexpress', 'aaaa', 'Commercial', 'aaaa', '<2500', '0.00', 'N', 'N', NULL, 'Y', 'Y', '2017-01-12 12:41:48', '12/01/2017 04:47:55', 'Open', 'C3AB9R5KELHn_MlRizQVrYOR-czSGeyAGetOa5zsrMRsg5LgmcSitrUDfPD0qNzn_tE_MavlrPd4OjM_Fs4zFQoAHXTiY05HdpV7HI79l0W5x1S-Elq4isaWlg2CMW9syDvD92Sc_u1ttq2ZxOBw8Icwobw==', '14217414'),
(50, 54, 'Test Project - Sejal', 'Sejal Project Details\n111\n222\n33\n', 'Commercial', 'SB', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-13 09:39:31', NULL, 'Unpaid', 'A1001vgoBQlhy-T6WFxvsRRd33QN_s_JQRbxnRsq-Lu6QqiKl_uuyi_qOv3XBh7D8Rx1_Q5DaLOmRW89QhsA-UpZEiJx3t0nmQFazlidZ62kd_5oiBW5awmggknRt1Q0fIFmOYXjuM8cJlmh6Ndxd-EHJ5g==', NULL),
(51, 54, 'Sejal-Test', 'Test', 'Commercial', 'SB', '>3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-13 10:21:56', NULL, 'Ended', 'A1001hKYYcmviaBrzYCMrF6WLc2acvbgrLe0Xc8jnq_xPMlMCVstgT92XuCJGh3YDMgbLAt9eOjkZ8MzG4gJusqHvgRFPjaGvnsP7wfb7SNU2LbhQpWhcRM2aiHauP83BnC41lZMhO7CEaAtLiZUaq5RQSQ==', '14219618'),
(52, 54, 'Test1', 'test', 'Commercial', 'SB', '>3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-13 10:27:56', NULL, 'Open', 'F9802f9yz_cmN5hGMvnzGNlkP_EGWHK-nUCTvlwuKfreUd-h_Gi9BMIb2OaR8QtG5APUEYj6kJfyZ73CG5fjfYBoEnlciHmDMbAkXG76fN2R4siIM2_bpj5GVQE_UMekgisspD6pTw0BwDGQQFlmTPVP6cw==', '14219633'),
(53, 2, 'test', 'fdsafdsafsafdsa', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-14 06:57:26', NULL, 'Open', 'F9802VBP72pDy1AcqopFPfTphBoCGDwEZFuwfEd8bK7ndBEQfWdkRx8OzGqIVwNxjVQQNxk2tvsRO5WUOyONoWRchNA1daFsNybTwXC3_sTP23WFybXO-6IYe3GcLt8sGmPxq5rDsLhi5cfPPBthJxXKp6Q==', '14220263'),
(54, 2, 'CodeIgniter', 'Hello world', 'Commercial', 'suburb', '<2500', '0.00', 'Y', 'N', NULL, 'Y', 'N', '2017-01-16 14:41:23', NULL, 'Unpaid', NULL, NULL),
(55, 2, 'Codeigniter', 'Hello world', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'Y', 'H.png', 'Y', 'N', '2017-01-16 14:44:17', NULL, 'Unpaid', NULL, NULL),
(56, 2, 'Codeigniter', 'Hello world', 'Commercial', 'suburb', '<2500', '0.00', 'N', 'Y', 'H1.png', 'Y', 'N', '2017-01-16 14:44:23', NULL, 'Unpaid', NULL, NULL),
(57, 2, 'Codeigniter', 'Hello World', 'Residential', 'Hello World', '<2500', '0.00', 'N', 'N', NULL, 'Y', 'Y', '2017-01-16 14:49:53', '25/01/2017 06:44:40', 'Open', 'C3AB9CinU6mLoU0j3H_h_-cxui_Il0WP4GF90N8EUkaQCXmkBmEMo1Cok8Yu7wZ1ND2mAtYVdGKJoiov1DTzgtgiNM6fT0UEJGTVbusREwQdVdROKBbWspNK39CckR0Dp77jAZDKaNwoLduJDad7PAqJuCQ==', '14223366'),
(58, 58, 'Test1', 'test test', 'Commercial', 'test test', '2500-3000', '0.00', 'N', 'N', NULL, 'Y', 'Y', '2017-01-17 15:09:23', '17/01/2017 07:37:15', 'Open', '60CF3y_6Ql1qMUCQ1TDzde-s33lStglI_dikv_KtGmbjvrf86wNnmHRegm-sbt0iE9lsrTxoQa1KivxmlMAbDewcH95Ws5Hu3GaYG5pRac9L4DUdCCp3ZoMBFl66Ljsl4m8W41t4ncs8jXwIWYDfi7PJJyA==', '14226350'),
(59, 58, 'szdfasd', 'asdf asdf asf', 'Commercial', 'test', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'Y', '2017-01-17 15:24:35', NULL, 'Open', 'C3AB98ilhsTrGDUSxk5DJ-KzBLzGIXtjOHXKXu_wMMQwyAVD8zVt8p33bBgmKCP3bO0-bj5Uo3kOJCjiR3lBKvrH8a9Ptc64vnIBgCdPHCeRf0YY6qgm0pRUafbZtLMv-AugyYbxPXvhvp7dsotB59CYdmA==', '14226352'),
(60, 58, '4 images test', 'test', 'Commercial', 'test', '2500-3000', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-17 15:38:08', NULL, 'Unpaid', 'A1001ggxJvJ2i1i1WoBW3a5zIs9aYGhrmVOKpalBBkTdDO8w80MqdqsEKCnWURtPkvHx5FW1sR-KmBsDdZgL1B8aZecRYRLwrflw1YnnteuKBV1elVI0DRXegqjg4C0vW8Ms_iUB3eq2nQu31AKCP24ylDQ==', NULL),
(61, 58, 'Image test', 'test', 'Commercial', 'test', '<2500', '0.00', 'N', 'N', NULL, 'N', 'N', '2017-01-17 15:44:45', NULL, 'Open', 'A1001t7yYAsqeDj1kd7NW7YicdFFuNrTi5BzbVvRFy43wqry0CfbJV_LNPzqxjHZn_CmWdwMyPAlJ8MRTaAqqQ1mLGH7g61CpdIbD-VPARNRPbr8fLsWNAf352VnDj16pYNbXK0IStRSATmVPNRJ0Qi85WA==', '14226358'),
(62, 54, 'Image Test', 'TEst TEst', 'Commercial', 'TEst TEst', '2500-3000', '0.00', 'N', 'N', NULL, 'Y', 'Y', '2017-01-19 08:15:31', '19/01/2017 00:46:36', 'Open', '44DD7VXYZdtPC-L4z7cFscbW0CCDP2dVxOXnYy92MdnPqthyimXzBIRYLHvE96Gu8_26hH4PFuIi-BGD-0WCAlblHQWfc_4F9lxvcfmWVFwypXcORdsluBXW3ubI2w-W54P7C3DG3hlVGs3_WKzwfYQKZjQ==', '14230680'),
(63, 59, 'Test', 'test', 'Commercial', 'test', '<2500', '0.00', 'Y', 'N', NULL, 'N', 'N', '2017-01-24 10:16:18', NULL, 'Open', '60CF3qveMF_SLS4BiI0cTVIgWMfoptDsSzAykAXutEPQi2--q77HCPYkyAl-V97B11cvmc5oGqoJhciTsdu2CaXWrFyn8vrJNI87288yTzZbgt1p_K0oQf0SdpkWYK7Ii088KRv0_6IGSljRWDkWR2Lqa0A==', '14238770'),
(64, 59, 'TEST 2', 'test 2', 'Commercial', 'test', '<2500', '0.00', 'Y', 'N', NULL, 'N', 'N', '2017-01-24 10:42:59', NULL, 'Open', 'A1001L9pwk38F4TXF6HTC_QiEqZvY6KG-eM1x3Q4boXI-_IWa041nMTnxhDrEhU1-ByeDmPnQfZVmqoWVrtmJ0Rv4i9Cgb2gbsBiNQCj36fdrNIv1z57NhWPWvnZ6NQof6n0yN2t0Dids3kaUsDo1EsdjSg==', '14238796'),
(65, 2, 'sdgh', 'dfhdfghd', 'Residential', 'suburb', '>3000', '0.00', 'N', 'N', NULL, 'Y', 'N', '2017-01-25 13:50:08', NULL, 'Open', '44DD7VOcS5zQULzpKxRaMLdKhtVNvcwjpFb0SrofWmcOe4KQbtCZ_GnuDJBBiK_VarUwrObElYtFXlpWBeTyi1GAo3iozJzPn1tuNan8iqokpefDGZ-6TTSXtHBFOVF56s_Q30PGbajyMY_PjfMEUQ7__3Q==', '14242443'),
(66, 2, 'test1', 'sdfgdfsgsfd', 'Commercial', 'sdfgdfsgsfd', '<2500', '0.00', 'N', 'N', NULL, 'Y', 'Y', '2017-01-25 13:52:10', '25/01/2017 06:38:24', 'Open', 'F9802yFnqwjXRjvu4r_L-OyKblMcDmMZryncTNzq3IKTOoOkbmHRnSGq34RLKrNkXTnHLrrqTA0pfMjcU5CJT9E4EYavOJIdYT7vb0uAEP0U9FgESG6xJbkmC4JL8sblD3hS4bfXvDK-yr0XP27wb3mEAGw==', '14242445');

-- --------------------------------------------------------

--
-- Table structure for table `project_bid`
--

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
  `project_testimony` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `testimony_rating` int(11) DEFAULT NULL,
  `testimony_given_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=50 ;

--
-- Dumping data for table `project_bid`
--

INSERT INTO `project_bid` (`bid_id`, `project_id`, `user_id`, `user_trade`, `bid_amount`, `bid_proposal`, `bid_added_on`, `bid_last_updated_on`, `bid_status`, `status_changed_on`, `is_contact_details_shared`, `discard_status`, `resubmit_status`, `project_testimony`, `testimony_rating`, `testimony_given_on`) VALUES
(1, 1, 3, 2, '233.00', 'test', '2016-09-18 01:41:53', NULL, 'Accepted', NULL, 0, 0, 0, 'good', 3, '2016-09-17 00:00:00'),
(2, 2, 4, 2, '122.00', 'test', '2016-09-18 02:30:25', NULL, 'Accepted', NULL, 0, 0, 0, 'great', 5, '2016-09-17 00:00:00'),
(3, 6, 13, 3, '3500.00', 'i want to receive this project', '2017-01-10 08:17:36', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(4, 4, 11, 2, '2600.00', 'i want to receive this project', '2017-01-10 08:19:33', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(5, 5, 12, 1, '3200.00', 'i want to receive this project', '2017-01-10 08:21:01', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(6, 8, 14, 4, '2300.00', 'i want to receive this project', '2017-01-10 14:54:51', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(7, 9, 15, 5, '2000.00', 'i want to receive this project', '2017-01-11 06:49:30', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(8, 10, 16, 6, '1500.00', 'i want to receive this project', '2017-01-11 06:51:49', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(9, 10, 17, 6, '1200.00', 'i want to receive this project', '2017-01-11 06:53:33', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(10, 11, 18, 7, '12.00', 'i want to receive this project', '2017-01-11 06:56:48', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(11, 12, 19, 8, '12.00', 'i want to receive this project', '2017-01-11 06:58:44', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(12, 13, 20, 9, '200.00', 'i want to receive this project', '2017-01-11 07:02:01', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(13, 14, 21, 11, '250.00', 'i want to receive this project', '2017-01-11 07:04:02', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(14, 15, 22, 10, '2.00', 'i want to receive this project', '2017-01-11 07:06:43', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(15, 16, 23, 14, '300.00', 'i want to receive this project', '2017-01-11 07:08:46', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(16, 17, 24, 13, '300.00', 'i want to receive this project', '2017-01-11 07:10:32', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(17, 18, 25, 12, '300.00', 'i want to receive this project', '2017-01-11 07:12:20', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(18, 19, 26, 15, '300.00', 'i want to receive this project', '2017-01-11 07:15:08', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(19, 20, 27, 16, '300.00', 'i want to receive this project', '2017-01-11 07:16:47', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(20, 21, 28, 17, '245.00', 'i want to receive this project', '2017-01-11 07:18:35', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(21, 22, 29, 18, '300.00', 'i want to receive this project', '2017-01-11 07:20:04', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(22, 23, 30, 19, '453.00', 'i want to receive this project', '2017-01-11 07:21:44', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(23, 24, 31, 20, '300.00', 'i want to receive this project', '2017-01-11 07:23:26', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(24, 25, 32, 21, '354.00', 'i want to receive this project', '2017-01-11 07:25:01', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(25, 26, 33, 22, '322.00', 'i want to receive this project', '2017-01-11 07:26:50', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(26, 27, 34, 23, '12.00', 'i want to receive this project', '2017-01-11 07:30:09', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(27, 28, 35, 24, '111.00', 'i want to receive this project', '2017-01-11 07:31:34', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(28, 29, 36, 25, '222.00', 'i want to receive this project', '2017-01-11 07:33:02', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(29, 30, 37, 26, '222.00', 'i want to receive this project', '2017-01-11 07:34:40', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(30, 31, 38, 27, '333.00', 'i want to receive this project', '2017-01-11 07:36:07', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(31, 32, 39, 28, '12.00', 'i want to receive this project', '2017-01-11 07:37:45', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(32, 33, 40, 29, '12.00', 'i want to receive this project', '2017-01-11 07:39:17', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(33, 34, 41, 30, '333.00', 'i want to receive this project', '2017-01-11 07:40:46', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(34, 35, 42, 31, '222.00', 'i want to receive this project', '2017-01-11 07:42:12', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(35, 36, 43, 32, '1111.00', 'i want to receive this project', '2017-01-11 07:43:30', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(36, 37, 44, 33, '244.00', 'i want to receive this project', '2017-01-11 07:44:57', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(37, 6, 45, 3, '9999.99', 'i want to receive this project', '2017-01-11 07:46:43', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(38, 38, 46, 34, '222.00', 'i want to receive this project', '2017-01-11 07:50:49', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(39, 39, 47, 41, '222.00', 'i want to receive this project', '2017-01-11 07:53:11', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(40, 40, 48, 35, '300.00', 'i want to receive this project', '2017-01-11 07:54:27', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(41, 41, 49, 36, '222.00', 'i want to receive this project', '2017-01-11 07:55:47', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(42, 42, 50, 37, '222.00', 'i want to receive this project', '2017-01-11 07:57:03', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(43, 43, 51, 38, '350.00', 'i want to receive this project', '2017-01-11 07:58:17', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(44, 44, 52, 39, '300.00', 'i want to receive this project', '2017-01-11 08:00:24', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(45, 45, 53, 40, '250.00', 'i want to receive this project', '2017-01-11 08:01:54', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(46, 63, 60, 9, '1000.00', 'test', '2017-01-24 10:19:05', NULL, 'Accepted', NULL, 0, 0, 0, NULL, NULL, NULL),
(47, 66, 60, 9, '12.00', 'dfsgsdf gf', '2017-01-25 13:58:05', NULL, 'Awarded', NULL, 0, 0, 0, NULL, NULL, NULL),
(48, 64, 60, 9, '45.00', 'ertwe wer t', '2017-01-25 14:39:07', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL),
(49, 57, 60, 9, '120.00', 'ghjf fjfghjhf g', '2017-01-25 14:41:03', NULL, 'Open', NULL, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_img`
--

CREATE TABLE IF NOT EXISTS `project_img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `url_img` varchar(255) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `project_img`
--

INSERT INTO `project_img` (`img_id`, `project_id`, `url_img`) VALUES
(1, 46, 'projects/46/1184756_624614644229356_1267948847_n.jpg'),
(2, 46, 'projects/46/163196_1687457822760_8185407_n.jpg'),
(3, 47, 'projects/47/163196_1687457822760_8185407_n.jpg'),
(4, 47, 'projects/47/1184756_624614644229356_1267948847_n.jpg'),
(6, 48, 'projects/48/3_8.png'),
(13, 49, 'projects/49/64749_825478027488172_2441213481689681489_n.jpg'),
(14, 49, 'projects/49/1.jpeg'),
(15, 50, 'projects/50/1.jpg'),
(16, 50, 'projects/50/2.jpg'),
(17, 50, 'projects/50/3.jpg'),
(18, 50, 'projects/50/4.jpg'),
(19, 51, 'projects/51/1.jpg'),
(20, 51, 'projects/51/2.jpg'),
(21, 51, 'projects/51/3.jpg'),
(22, 51, 'projects/51/4.jpg'),
(23, 54, 'projects/54/baby-icon.png'),
(24, 54, 'projects/54/child-icon.png'),
(25, 54, 'projects/54/H.png'),
(26, 55, 'projects/55/baby-icon.png'),
(27, 55, 'projects/55/child-icon.png'),
(32, 58, 'projects/58/sample1_l.jpg'),
(33, 58, 'projects/58/Leica-M-Sample-Image.jpg'),
(34, 58, 'projects/58/sample1_l.jpg'),
(35, 58, 'projects/58/sample1_l.jpg'),
(36, 59, 'projects/59/cat-infotecnologhy.png'),
(37, 59, 'projects/59/cat-webdeveloper.png'),
(38, 59, 'projects/59/download-folder.png'),
(39, 60, 'projects/60/sample1_l.jpg'),
(40, 60, 'projects/60/Leica-M-Sample-Image.jpg'),
(41, 61, 'projects/61/sample1_l.jpg'),
(42, 61, 'projects/61/Leica-M-Sample-Image.jpg'),
(48, 62, 'projects/62/sample1_l.jpg'),
(49, 62, 'projects/62/Leica-M-Sample-Image.jpg'),
(50, 62, 'projects/62/Leica-M-Sample-Image1.jpg'),
(51, 62, 'projects/62/sample1_l1.jpg'),
(52, 64, 'projects/64/Koala1.jpg'),
(53, 64, 'projects/64/Jellyfish1.jpg'),
(56, 66, 'projects/66/163196_1687457822760_8185407_n.jpg'),
(57, 66, 'projects/66/1184756_624614644229356_1267948847_n.jpg'),
(58, 57, 'projects/57/child-icon.png'),
(59, 57, 'projects/57/baby-icon.png'),
(60, 57, 'projects/57/Driver_license_21982_28-11-2016_06-54-25pm.png.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `project_trade`
--

CREATE TABLE IF NOT EXISTS `project_trade` (
  `project_trade_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `trade_id` int(11) DEFAULT NULL,
  `bidding_status` tinyint(1) DEFAULT '1' COMMENT 'It tells, whether this type of traders can place bid on this project, it was awarded',
  PRIMARY KEY (`project_trade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=297 ;

--
-- Dumping data for table `project_trade`
--

INSERT INTO `project_trade` (`project_trade_id`, `project_id`, `trade_id`, `bidding_status`) VALUES
(1, 1, 2, 0),
(2, 1, 1, 1),
(3, 1, 3, 1),
(4, 2, 2, 0),
(5, 2, 1, 1),
(7, 4, 2, 1),
(8, 5, 1, 1),
(9, 6, 3, 1),
(10, 7, 1, 1),
(11, 8, 4, 1),
(12, 9, 5, 1),
(13, 10, 6, 1),
(14, 11, 7, 1),
(15, 12, 8, 1),
(16, 13, 9, 1),
(17, 14, 11, 1),
(18, 15, 10, 1),
(19, 16, 14, 1),
(20, 17, 13, 1),
(21, 18, 12, 1),
(22, 19, 15, 1),
(23, 20, 16, 1),
(24, 21, 17, 1),
(25, 22, 18, 1),
(26, 23, 19, 1),
(27, 24, 20, 1),
(28, 25, 21, 1),
(29, 26, 22, 1),
(30, 27, 23, 1),
(31, 28, 24, 1),
(32, 29, 25, 1),
(33, 30, 26, 1),
(34, 31, 27, 1),
(35, 32, 28, 1),
(36, 33, 29, 1),
(37, 34, 30, 1),
(38, 35, 31, 1),
(39, 36, 32, 1),
(40, 37, 33, 1),
(41, 38, 34, 1),
(42, 39, 41, 1),
(43, 40, 35, 1),
(44, 41, 36, 1),
(45, 42, 37, 1),
(46, 43, 38, 1),
(47, 44, 39, 1),
(48, 45, 40, 1),
(49, 46, 5, 1),
(50, 47, 5, 1),
(53, 3, 2, 1),
(54, 48, 4, 1),
(61, 49, 4, 1),
(62, 49, 5, 1),
(63, 50, 2, 1),
(64, 50, 9, 1),
(65, 50, 1, 1),
(66, 50, 24, 1),
(67, 51, 6, 1),
(68, 51, 37, 1),
(69, 52, 4, 1),
(70, 53, 4, 1),
(71, 53, 7, 1),
(72, 53, 2, 1),
(73, 54, 2, 1),
(74, 55, 6, 1),
(75, 55, 2, 1),
(76, 56, 6, 1),
(77, 56, 2, 1),
(82, 58, 4, 1),
(83, 58, 6, 1),
(84, 58, 7, 1),
(85, 59, 6, 1),
(86, 59, 2, 1),
(87, 60, 4, 1),
(88, 60, 7, 1),
(89, 61, 5, 1),
(97, 62, 4, 1),
(98, 62, 5, 1),
(99, 62, 6, 1),
(100, 62, 7, 1),
(101, 62, 8, 1),
(102, 62, 2, 1),
(103, 63, 9, 0),
(104, 64, 9, 1),
(105, 65, 5, 1),
(230, 66, 4, 1),
(231, 66, 5, 1),
(232, 66, 6, 1),
(233, 66, 7, 1),
(234, 66, 8, 1),
(235, 66, 2, 1),
(236, 66, 9, 1),
(237, 66, 11, 1),
(238, 66, 10, 1),
(239, 66, 14, 1),
(240, 66, 13, 1),
(241, 66, 12, 1),
(242, 66, 15, 1),
(243, 66, 16, 1),
(244, 66, 1, 1),
(245, 66, 17, 1),
(246, 66, 18, 1),
(247, 66, 19, 1),
(248, 66, 20, 1),
(249, 66, 21, 1),
(250, 66, 22, 1),
(251, 66, 23, 1),
(252, 66, 24, 1),
(253, 66, 25, 1),
(254, 66, 26, 1),
(255, 66, 27, 1),
(256, 66, 28, 1),
(257, 66, 29, 1),
(258, 66, 30, 1),
(259, 66, 31, 1),
(260, 66, 32, 1),
(261, 66, 33, 1),
(262, 66, 3, 1),
(263, 66, 34, 1),
(264, 66, 41, 1),
(265, 66, 35, 1),
(266, 66, 36, 1),
(267, 66, 37, 1),
(268, 66, 38, 1),
(269, 66, 39, 1),
(270, 66, 40, 1),
(271, 57, 4, 1),
(272, 57, 5, 1),
(273, 57, 6, 1),
(274, 57, 8, 1),
(275, 57, 2, 1),
(276, 57, 9, 1),
(277, 57, 11, 1),
(278, 57, 10, 1),
(279, 57, 14, 1),
(280, 57, 13, 1),
(281, 57, 12, 1),
(282, 57, 15, 1),
(283, 57, 16, 1),
(284, 57, 1, 1),
(285, 57, 17, 1),
(286, 57, 18, 1),
(287, 57, 19, 1),
(288, 57, 20, 1),
(289, 57, 21, 1),
(290, 57, 22, 1),
(291, 57, 23, 1),
(292, 57, 24, 1),
(293, 57, 25, 1),
(294, 57, 27, 1),
(295, 57, 29, 1),
(296, 57, 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `employer_id` int(11) DEFAULT NULL COMMENT 'He''ll initiate chat',
  `contractor_id` int(11) DEFAULT NULL,
  `started_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE IF NOT EXISTS `trade` (
  `trade_id` int(11) NOT NULL AUTO_INCREMENT,
  `trade_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`trade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Trade means the category of the contractors like plumber, electrician, builder or so on..' AUTO_INCREMENT=42 ;

--
-- Dumping data for table `trade`
--

INSERT INTO `trade` (`trade_id`, `trade_name`) VALUES
(1, 'Electrician'),
(2, 'Builder'),
(3, 'Plumber'),
(4, 'Architectural/ Draftsman'),
(5, 'Asbestos Removal'),
(6, 'Audio/ Visual (AV)'),
(7, 'Balustrades'),
(8, 'Bricklayer'),
(9, 'Carpenter'),
(10, 'Commercial Carpenter'),
(11, 'Cleaner'),
(12, 'Concreter'),
(13, 'Concrete cutting and grinding'),
(14, 'Communications/ Data'),
(15, 'Demolition'),
(16, 'Door installer (Gates, roller doors and hardware)'),
(17, 'Elevator (Specialised)'),
(18, 'Facades/ External cladding'),
(19, 'Fencing'),
(20, 'Fire services/ Hydraulics'),
(21, 'Flooring/ Floor covering'),
(22, 'Formwork'),
(23, 'Furniture removal/s'),
(24, 'Glazier/ Windows'),
(25, 'Hire Equipment'),
(26, 'Hoardings'),
(27, 'Joinery/ Kitchens'),
(28, 'Labourer'),
(29, 'Landscaper'),
(30, 'Line marking'),
(31, 'Mechanical/ Air Conditioning'),
(32, 'Painter (External/ Internal)'),
(33, 'Plasterer/ Gyprocker'),
(34, 'Renderer'),
(35, 'Security systems/ Safety'),
(36, 'Signage’s/ Film & Decals'),
(37, 'Steel Fixer'),
(38, 'Stone Mason'),
(39, 'Tiler/ Waterproofing'),
(40, 'Waste Removal'),
(41, 'Roofer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` enum('Employer','Contractor') COLLATE utf8_bin DEFAULT NULL,
  `email_address` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `address_line_1` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `address_line_2` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `account_status` enum('Active','Expired','Pending','Suspended') COLLATE utf8_bin DEFAULT 'Active' COMMENT 'Pending means did not complete registration with payment',
  `added_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=61 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_role`, `email_address`, `password`, `address_line_1`, `address_line_2`, `account_status`, `added_on`) VALUES
(2, 'Employer', 'nick+ntest189@ood.rocks', 'e10adc3949ba59abbe56e057f20f883e', 'add1', 'add2', 'Active', '2016-09-18 01:32:33'),
(3, 'Contractor', 'nick+test189builder@ood.rocks', 'e10adc3949ba59abbe56e057f20f883e', 'wewe', 'wewe', 'Active', '2016-09-18 01:40:48'),
(4, 'Contractor', 'nick+testpayment@ood.rocks', 'e10adc3949ba59abbe56e057f20f883e', 'dasd', 'adad', 'Active', '2016-09-18 02:28:41'),
(5, 'Contractor', 'cse_shuvo@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'address line 1', 'address line 2', 'Active', '2016-10-11 06:08:12'),
(6, 'Contractor', 'nick+test1011@perceptivemind.com.au', '827ccb0eea8a706c4c34a16891f84e7b', '1qwdasd', 'aksjdbad', 'Active', '2016-10-11 12:38:22'),
(7, 'Employer', 'test@test.com', 'e10adc3949ba59abbe56e057f20f883e', 'Test', 'Test', 'Active', '2017-01-08 06:53:30'),
(8, 'Contractor', 'cont@test.com', 'e10adc3949ba59abbe56e057f20f883e', 'test', 'test', 'Active', '2017-01-08 06:58:37'),
(9, 'Contractor', 'scont@test.com', 'e10adc3949ba59abbe56e057f20f883e', 'test', '', 'Active', '2017-01-08 07:01:13'),
(10, 'Employer', 'minhtest1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-10 07:54:42'),
(11, 'Contractor', 'minhtest2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-10 08:10:22'),
(12, 'Contractor', 'minhtest3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-10 08:13:06'),
(13, 'Contractor', 'minhtest4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-10 08:16:27'),
(14, 'Contractor', 'minhtest5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-10 14:54:23'),
(15, 'Contractor', 'minhtest6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 06:48:43'),
(16, 'Contractor', 'minhtest7@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 06:51:28'),
(17, 'Contractor', 'minhtest8@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 06:53:08'),
(18, 'Contractor', 'minhtest9@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 06:55:25'),
(19, 'Contractor', 'minhtest10@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 06:58:19'),
(20, 'Contractor', 'minhtest1c@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:01:42'),
(21, 'Contractor', 'minhtest2c@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:03:35'),
(22, 'Contractor', 'minhtest3c@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:06:08'),
(23, 'Contractor', 'minhtest4c@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:08:19'),
(24, 'Contractor', 'minhtest5c@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:10:14'),
(25, 'Contractor', 'minhtest6c@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:12:00'),
(26, 'Contractor', 'minhtest1d@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:14:43'),
(27, 'Contractor', 'minhtest2d@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:16:25'),
(28, 'Contractor', 'minhtest1e@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:18:17'),
(29, 'Contractor', 'minhtest1f@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:19:46'),
(30, 'Contractor', 'minhtest2f@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:21:12'),
(31, 'Contractor', 'minhtest3f@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'asd', 'http://google.com.vn', 'Active', '2017-01-11 07:22:56'),
(32, 'Contractor', 'minhtest4f@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:24:42'),
(33, 'Contractor', 'minhtest5f@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:26:22'),
(34, 'Contractor', 'minhtest6f@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:29:40'),
(35, 'Contractor', 'minhtest1g@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:31:12'),
(36, 'Contractor', 'minhtest1h@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:32:45'),
(37, 'Contractor', 'minhtest2h@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:34:23'),
(38, 'Contractor', 'minhtest1j@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:35:46'),
(39, 'Contractor', 'minhtest1l@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:37:26'),
(40, 'Contractor', 'minhtest2l@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:38:53'),
(41, 'Contractor', 'minhtest3l@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:40:24'),
(42, 'Contractor', 'minhtest1m@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:41:53'),
(43, 'Contractor', 'minhtest1p@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:43:13'),
(44, 'Contractor', 'minhtest2p@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:44:39'),
(45, 'Contractor', 'minhtest3p@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:46:21'),
(46, 'Contractor', 'minhtest1r@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:50:27'),
(47, 'Contractor', 'minhtest2r@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:52:45'),
(48, 'Contractor', 'minhtest1s@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:54:07'),
(49, 'Contractor', 'minhtest2s@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:55:28'),
(50, 'Contractor', 'minhtest3s@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:56:46'),
(51, 'Contractor', 'minhtest4s@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 07:57:57'),
(52, 'Contractor', 'minhtest1t@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 08:00:05'),
(53, 'Contractor', 'minhtest1w@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'http://google.com', 'http://google.com.vn', 'Active', '2017-01-11 08:01:33'),
(54, 'Employer', 'emp@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Add', 'add2', 'Active', '2017-01-13 09:34:56'),
(55, 'Contractor', 'cont1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '111', '111', 'Active', '2017-01-13 09:57:12'),
(56, 'Contractor', 'cont2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'test', 'test', 'Active', '2017-01-13 10:26:35'),
(57, 'Contractor', 'cont3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'a1', 'a2', 'Active', '2017-01-17 14:55:45'),
(58, 'Employer', 'cont4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'a1', 'a2', 'Active', '2017-01-17 15:03:47'),
(59, 'Employer', 'nick+test2401@perceptivemind.com.au', 'e10adc3949ba59abbe56e057f20f883e', 'test', 'test', 'Active', '2017-01-24 10:11:58'),
(60, 'Contractor', 'nick+test24012@perceptivemind.com.au', 'e10adc3949ba59abbe56e057f20f883e', 'test', 'test', 'Active', '2017-01-24 10:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `variation_tracker`
--

CREATE TABLE IF NOT EXISTS `variation_tracker` (
  `tracker_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `track_action` text NOT NULL,
  `bid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `variation_tracker`
--

INSERT INTO `variation_tracker` (`tracker_id`, `project_id`, `track_action`, `bid_id`) VALUES
(0, 66, '["last_updated_on","last_updated_on","last_updated_on"]', 47);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
