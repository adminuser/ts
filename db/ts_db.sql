-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2016 at 08:44 AM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ts_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `batchid` int(10) NOT NULL AUTO_INCREMENT,
  `batchname` varchar(200) DEFAULT NULL,
  `skillid` int(10) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `starttime` varchar(10) DEFAULT NULL,
  `endtime` varchar(10) DEFAULT NULL,
  `releasedate` date DEFAULT NULL,
  `trainer_1` int(11) DEFAULT NULL,
  `trainer_2` int(11) DEFAULT NULL,
  `active_trainer` int(10) DEFAULT '0',
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`batchid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batchid`, `batchname`, `skillid`, `startdate`, `enddate`, `starttime`, `endtime`, `releasedate`, `trainer_1`, `trainer_2`, `active_trainer`, `status`) VALUES
(5, 'Php March Batch', 6, '2016-03-21', '2016-03-31', '10', '10', '2016-03-14', 0, NULL, 0, 'released'),
(6, 'Oracle April Batch', 7, '2016-04-01', '2016-04-30', '10', '10', '2016-03-20', 0, NULL, 0, 'adminonly'),
(7, 'April C++ Batch', 3, '2016-04-01', '2016-03-30', '10', '10', '2016-03-20', 0, NULL, 0, 'readytorelease'),
(8, 'April C# Batch', 5, '2016-04-20', '2016-04-30', '9', '13', '2016-03-23', 0, NULL, 0, 'adminonly'),
(9, 'Salesforce April Batch', 8, '2016-04-10', '2016-04-30', '9', '9', '2016-03-20', 0, NULL, 0, 'adminonly');

-- --------------------------------------------------------

--
-- Table structure for table `batchtransaction`
--

CREATE TABLE IF NOT EXISTS `batchtransaction` (
  `batchtransactionid` int(10) NOT NULL AUTO_INCREMENT,
  `batchid` int(10) DEFAULT NULL,
  `skillid` int(10) DEFAULT NULL,
  `skillname` varchar(100) DEFAULT NULL,
  `candidate_userid` int(10) DEFAULT NULL,
  `candidate_firstname` varchar(100) DEFAULT NULL,
  `candidate_middlename` varchar(100) DEFAULT NULL,
  `candidate_lastname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`batchtransactionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `batch_link`
--

CREATE TABLE IF NOT EXISTS `batch_link` (
  `batchlinkid` int(12) NOT NULL AUTO_INCREMENT,
  `batchid` int(12) NOT NULL,
  `skillid` int(12) NOT NULL,
  `candidateid` int(12) NOT NULL,
  `trainerid` int(12) NOT NULL,
  PRIMARY KEY (`batchlinkid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forumpost`
--

CREATE TABLE IF NOT EXISTS `forumpost` (
  `postid` int(10) NOT NULL AUTO_INCREMENT,
  `posttitle` varchar(200) DEFAULT NULL,
  `postdescription` text,
  `createddate` datetime DEFAULT NULL,
  `skillid` int(10) DEFAULT '0',
  `createdby` int(10) DEFAULT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `forumpost`
--

INSERT INTO `forumpost` (`postid`, `posttitle`, `postdescription`, `createddate`, `skillid`, `createdby`) VALUES
(1, 'Java oops concepts', 'I want to understand more about java object orient concepts. Can any one help me out with best reference s for it.\r\nI want to understand more about java object orient concepts. Can any one help me out with best reference s for it.\r\nI want to understand more about java object orient concepts. Can any one help me out with best reference s for it.', '2016-03-11 14:45:25', 1, 9),
(2, 'Operators', 'C++ Operators related best references is required.<b>', '2016-03-11 15:13:44', 3, 9),
(3, 'Oracle Basics', 'Quick references for  Oracle basics  is required. Can any one help me ?', '2016-03-11 15:14:56', 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `forumreply`
--

CREATE TABLE IF NOT EXISTS `forumreply` (
  `replyid` int(10) NOT NULL AUTO_INCREMENT,
  `replydescription` text,
  `postid` int(11) DEFAULT NULL,
  `createddate` date DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`replyid`),
  KEY `FK_forumtag` (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `forumreply`
--

INSERT INTO `forumreply` (`replyid`, `replydescription`, `postid`, `createddate`, `createdby`) VALUES
(2, 'You can find best documentation  at https://docs.oracle.com/en/', 3, '2016-03-11', 10),
(4, 'Oracle documents are best available in oracle websites', 3, '2016-03-11', 9),
(5, 'Refer C++ by -  Balaguruswamy', 2, '2016-03-12', 12);

-- --------------------------------------------------------

--
-- Table structure for table `forumreplycomment`
--

CREATE TABLE IF NOT EXISTS `forumreplycomment` (
  `replycommentid` int(10) NOT NULL AUTO_INCREMENT,
  `replycommentdescription` text,
  `replyid` int(10) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `createdby` int(10) DEFAULT NULL,
  PRIMARY KEY (`replycommentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `roleid` int(10) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(30) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `rolename`, `is_active`) VALUES
(1, 'superadmin', 1),
(2, 'candidate', 1),
(3, 'trainer', 1),
(4, 'resumewriter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `skillid` int(10) NOT NULL AUTO_INCREMENT,
  `skillname` varchar(50) DEFAULT NULL,
  `skillsyllabus` text,
  `is_deleted` tinyint(1) DEFAULT '0',
  `status` varchar(10) DEFAULT 'active',
  PRIMARY KEY (`skillid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`skillid`, `skillname`, `skillsyllabus`, `is_deleted`, `status`) VALUES
(1, 'Java', 'Basics\r\n\r\n1. Datatype\r\n2. Access Specifiers\r\n3. Inheritance.\r\n4. Abstraction\r\n5. Polymorphism', 0, 'active'),
(2, 'C', '', 0, 'active'),
(3, 'C++', '', 0, 'active'),
(5, 'C#', '', 0, 'active'),
(6, 'Php', '', 0, 'active'),
(7, 'Oracle', '', 0, 'active'),
(8, 'Salesforce', '', 0, 'active'),
(9, 'Perl', '', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ts_sessions`
--

CREATE TABLE IF NOT EXISTS `ts_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ts_sessions`
--

INSERT INTO `ts_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('45c2df4b24c3fbfab9a0684d6eafc6cb', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686; rv:38.0) Gecko/20100101 Firefox/38.0', 1464834595, 'a:2:{s:16:"is_authenticated";b:1;s:8:"userinfo";a:6:{s:6:"userid";s:1:"2";s:8:"username";s:14:"admin@test.com";s:5:"email";s:14:"admin@test.com";s:9:"user_type";s:10:"superadmin";s:18:"is_profilecomplete";s:1:"0";s:7:"skillid";s:1:"0";}}'),
('ba59087fc05cd58617c5b4bef5977e5a', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686; rv:38.0) Gecko/20100101 Firefox/38.0', 1464829666, ''),
('d0f13c9cde6096c6b7716179929756e6', '127.0.53.53', 'Mozilla/5.0 (X11; Linux i686; rv:38.0) Gecko/20100101 Firefox/38.0', 1464829666, 'a:3:{s:9:"user_data";s:0:"";s:16:"is_authenticated";b:1;s:8:"userinfo";a:6:{s:6:"userid";s:1:"2";s:8:"username";s:14:"admin@test.com";s:5:"email";s:14:"admin@test.com";s:9:"user_type";s:10:"superadmin";s:18:"is_profilecomplete";s:1:"0";s:7:"skillid";s:1:"0";}}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `userprofileid` int(10) DEFAULT '0',
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `is_active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `activation_code` varchar(100) DEFAULT NULL,
  `user_type` varchar(50) NOT NULL,
  `is_firsttime` tinyint(1) DEFAULT '1',
  `is_profilecomplete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `userprofileid`, `username`, `email`, `password`, `createddate`, `modifieddate`, `is_active`, `is_deleted`, `activation_code`, `user_type`, `is_firsttime`, `is_profilecomplete`) VALUES
(2, 7, 'admin@test.com', 'admin@test.com', 'MTIzNDU2', '2016-03-06 13:14:10', '2016-03-06 13:14:10', 0, 0, NULL, 'superadmin', 1, 0),
(9, 4, 'girish@test.com', 'girish@test.com', 'MTIzNDU2', '2016-03-06 21:45:04', '2016-03-06 21:45:04', 0, 0, NULL, 'candidate', 1, 1),
(10, 5, 'anil@test.com', 'anil@test.com', 'MTIzNDU2', '2016-03-06 21:45:31', '2016-03-06 21:45:31', 0, 0, NULL, 'trainer', 1, 1),
(11, 6, 'arun@test.com', 'arun@test.com', 'MTIzNDU2', '2016-03-11 21:58:13', '2016-03-11 21:58:13', 0, 0, NULL, 'candidate', 1, 1),
(12, 8, 'rw@test.com', 'rw@test.com', 'MTIzNDU2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', 'resumewriter', 1, 1),
(13, 9, '', '', 'QWtNcUMx', '2016-04-27 23:49:29', '2016-04-27 23:49:29', 0, 0, NULL, 'trainer', 1, 0),
(14, 10, 'admin@test.com', 'admin@test.com', 'eHAxNFlt', '2016-04-27 23:49:53', '2016-04-27 23:49:53', 0, 0, NULL, 'trainer', 1, 0),
(15, 11, 'suresh@test.com', 'suresh@test.com', 'R2p3TkxR', '2016-05-25 04:37:00', '2016-05-25 04:37:00', 0, 0, NULL, 'candidate', 1, 0),
(16, 12, 'vivek@gmail.com', 'vivek@gmail.com', 'SnF0Mjd3', '2016-05-25 04:40:27', '2016-05-25 04:40:27', 0, 0, NULL, 'trainer', 1, 0),
(17, 13, 'varun@test.com', 'varun@test.com', 'bnhRRFhI', '2016-05-25 04:44:35', '2016-05-25 04:44:35', 0, 0, NULL, 'candidate', 1, 0),
(18, 14, 'bob@gmail.com', 'bob@gmail.com', 'WnFEdmN6', '2016-05-25 04:47:20', '2016-05-25 04:47:20', 0, 0, NULL, 'candidate', 1, 0),
(19, 15, 'bob@test.com', 'bob@test.com', 'dnQzTERI', '2016-05-25 04:52:02', '2016-05-25 04:52:03', 0, 0, NULL, 'candidate', 1, 0),
(20, 16, 'rocky@test.com', 'rocky@test.com', 'dHF4THI4', '2016-05-25 05:48:03', '2016-05-25 05:48:03', 0, 0, NULL, 'candidate', 1, 0),
(21, 17, 'gourav@test.com', 'gourav@test.com', 'ZHdQZ1Q0', '2016-05-25 05:53:38', '2016-05-25 05:53:38', 0, 0, NULL, 'candidate', 1, 0),
(22, 18, 'raju@test.com', 'raju@test.com', 'OWtIM1FB', '2016-05-25 05:55:13', '2016-05-25 05:55:13', 0, 0, NULL, 'candidate', 1, 0),
(23, 19, 'raju@test.com', 'raju@test.com', 'OWtIM1FB', '2016-05-25 05:57:31', '2016-05-25 05:57:31', 0, 0, NULL, 'candidate', 1, 0),
(24, 20, 'ramesh@test.com', 'ramesh@test.com', 'TnlWS3Fn', '2016-05-25 05:58:38', '2016-05-25 05:58:38', 0, 0, NULL, 'candidate', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `userprofileid` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL DEFAULT '0',
  `user_type` varchar(20) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` int(100) DEFAULT NULL,
  `zipcode` int(10) DEFAULT NULL,
  `applying_visatype` varchar(10) DEFAULT NULL,
  `existing_visatype` varchar(10) DEFAULT NULL,
  `visa_expirymonth` int(2) DEFAULT '0',
  `visa_expiryyear` int(5) DEFAULT '0',
  `primary_skill` varchar(50) DEFAULT NULL,
  `secondary_skill` varchar(50) DEFAULT NULL,
  `primary_skillid` int(10) DEFAULT '0',
  `secondary_skillid` int(10) DEFAULT '0',
  `resume_name` varchar(100) DEFAULT NULL,
  `resume_orgname` varchar(100) DEFAULT NULL,
  `resume_ext` varchar(20) DEFAULT NULL,
  `resume_fullpath` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `userprofileid` (`userprofileid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`userprofileid`, `userid`, `user_type`, `firstname`, `middlename`, `lastname`, `gender`, `phone`, `mobile`, `email`, `country`, `state`, `zipcode`, `applying_visatype`, `existing_visatype`, `visa_expirymonth`, `visa_expiryyear`, `primary_skill`, `secondary_skill`, `primary_skillid`, `secondary_skillid`, `resume_name`, `resume_orgname`, `resume_ext`, `resume_fullpath`) VALUES
(7, 2, 'superadmin', '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', 0, 0, '', '', 0, 0, '', '', '', ''),
(4, 9, 'candidate', 'Girish', NULL, 'R', 'male', NULL, NULL, NULL, 'US', NULL, 4354353, NULL, 'H4', NULL, NULL, NULL, NULL, 7, 0, 'IKBAL_SFDC2', 'IKBAL_SFDC.docx', '.docx', 'C:/wamp/www/talentshores/uploads/resumes/IKBAL_SFDC2.docx'),
(5, 10, 'trainer', 'Anil', NULL, 'Kumar', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 0, NULL, NULL, NULL, NULL),
(6, 11, 'candidate', 'Arun', 'Kumar', 'BV', 'male', NULL, NULL, NULL, 'India', NULL, 123454, NULL, 'H1', NULL, NULL, NULL, NULL, 8, 0, 'Resume', 'Resume.docx', '.docx', 'C:/wamp/www/talentshores/uploads/resumes/Resume.docx'),
(8, 12, 'resumewriter', 'Ramesh', NULL, 'Kumar', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 9, 0, '', '', '', ''),
(9, 13, 'trainer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(10, 14, 'trainer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 2, 0, NULL, NULL, NULL, NULL),
(11, 15, 'candidate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 6, 0, NULL, NULL, NULL, NULL),
(12, 16, 'trainer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL),
(13, 17, 'candidate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL),
(14, 18, 'candidate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL),
(15, 19, 'candidate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 6, 0, NULL, NULL, NULL, NULL),
(16, 20, 'candidate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 6, 0, NULL, NULL, NULL, NULL),
(17, 21, 'candidate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL),
(18, 22, 'candidate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 6, 0, NULL, NULL, NULL, NULL),
(19, 23, 'candidate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 6, 0, NULL, NULL, NULL, NULL),
(20, 24, 'candidate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 6, 0, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forumreply`
--
ALTER TABLE `forumreply`
  ADD CONSTRAINT `forumreply_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `forumpost` (`postid`) ON DELETE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
