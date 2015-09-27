-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2014 at 07:15 PM
-- Server version: 5.5.23
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `checkmate14`
--
CREATE DATABASE IF NOT EXISTS `checkmate14` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `checkmate14`;

-- --------------------------------------------------------

--
-- Table structure for table `point_question`
--

CREATE TABLE IF NOT EXISTS `point_question` (
  `question_no` int(3) NOT NULL AUTO_INCREMENT,
  `cost` int(4) NOT NULL,
  `points` int(5) NOT NULL,
  `question` text COLLATE latin1_bin NOT NULL,
  `answer` varchar(30) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`question_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=41 ;

--
-- Dumping data for table `point_question`
--

INSERT INTO `point_question` (`question_no`, `cost`, `points`, `question`, `answer`) VALUES
(1, 5, 5, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(2, 5, 5, 'Kon kise ko frustrate  karna?', 'Shrey'),
(3, 5, 5, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(4, 5, 5, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(5, 5, 5, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(6, 5, 5, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(7, 5, 5, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(8, 5, 5, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(9, 5, 5, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(10, 5, 5, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(11, 5, 5, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(12, 5, 5, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(13, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(14, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(15, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(16, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(17, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(18, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(19, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(20, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(21, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(22, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(23, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(24, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(25, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(26, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(27, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(28, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(29, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(30, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(31, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(32, 15, 20, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(33, 30, 40, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(34, 30, 40, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(35, 30, 40, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(36, 30, 40, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(37, 30, 40, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(38, 30, 40, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(39, 30, 40, 'Kon kise ko frustrate nahi karna?', 'Shrey'),
(40, 30, 40, 'Kon kise ko frustrate nahi karna?', 'Shrey');

-- --------------------------------------------------------

--
-- Table structure for table `q_bank`
--

CREATE TABLE IF NOT EXISTS `q_bank` (
  `q_no` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `q_content` longtext NOT NULL,
  `answer` varchar(200) NOT NULL,
  `base_price` int(11) NOT NULL,
  `max_wrong` int(11) NOT NULL,
  PRIMARY KEY (`q_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q_bank`
--

INSERT INTO `q_bank` (`q_no`, `level`, `q_content`, `answer`, `base_price`, `max_wrong`) VALUES
(1, 2, 'asdkjfha;dfhk?', 'asd', 10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `q_count`
--

CREATE TABLE IF NOT EXISTS `q_count` (
  `q_no` int(11) NOT NULL,
  `no_sub` int(11) NOT NULL,
  `no_correct` int(11) NOT NULL,
  `slots_left` int(11) NOT NULL,
  `slots_allowed` int(11) NOT NULL,
  PRIMARY KEY (`q_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q_count`
--

INSERT INTO `q_count` (`q_no`, `no_sub`, `no_correct`, `slots_left`, `slots_allowed`) VALUES
(1, 10, 11, 6, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_id` int(12) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `name1` varchar(20) NOT NULL,
  `name2` varchar(20) NOT NULL,
  `phone1` bigint(20) NOT NULL,
  `phone2` bigint(20) NOT NULL,
  `email1` varchar(50) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `password` (`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `team_name`, `name1`, `name2`, `phone1`, `phone2`, `email1`, `email2`, `password`) VALUES
(1, 'asd', 'asd', 'asd', 789456123, 4789456123, 'asd@asd', 'asd@asda', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `user_point`
--

CREATE TABLE IF NOT EXISTS `user_point` (
  `user_id` int(12) NOT NULL,
  `question_array` varchar(40) NOT NULL,
  `point` int(11) NOT NULL,
  `multipliers` varchar(40) NOT NULL,
  `wrong_attempt` varchar(40) NOT NULL,
  `multiplier2x` int(11) NOT NULL DEFAULT '15',
  `multiplier3x` int(11) NOT NULL DEFAULT '10',
  `multiplier4x` int(11) NOT NULL DEFAULT '7',
  `multiplier5x` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_point`
--

INSERT INTO `user_point` (`user_id`, `question_array`, `point`, `multipliers`, `wrong_attempt`, `multiplier2x`, `multiplier3x`, `multiplier4x`, `multiplier5x`) VALUES
(1, '0000000000000000000000000000000000000000', 56, '2255555555555555555555555555555555555555', '5555555555555555555555555555555555555555', -4, 10, 7, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
