-- phpMyAdmin SQL Dump
-- version 3.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2016 at 10:24 AM
-- Server version: 5.5.49
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smart_decoder`
--

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE IF NOT EXISTS `codes` (
  `code_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `code_value` text NOT NULL,
  `code_desc` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`code_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`code_id`, `code_value`, `code_desc`, `created_at`, `updated_at`) VALUES
(1, '85', 'Optimal Controller', '2016-06-23 00:00:00', '2016-06-23 15:36:14'),
(2, '83', 'Processor DIMM ECC Error', '2016-06-23 00:00:00', '2016-06-23 15:36:14'),
(3, '89', 'Mismatched Controller Types', '2016-06-23 00:00:00', '2016-06-23 15:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `ocr_tasks`
--

CREATE TABLE IF NOT EXISTS `ocr_tasks` (
  `ocr_id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'oc',
  `ocr_imgfile` varchar(255) NOT NULL,
  `ocr_text` text NOT NULL,
  `ocr_serial_num` text,
  `ocr_upload_type` varchar(255) NOT NULL DEFAULT 'android_app',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ocr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `ocr_tasks`
--

INSERT INTO `ocr_tasks` (`ocr_id`, `ocr_imgfile`, `ocr_text`, `ocr_serial_num`, `ocr_upload_type`, `created_at`, `updated_at`) VALUES
(2, 'IMG_20160623_104615.jpg', 'found too many digits (3)', '', 'ANDROID-APP', '2016-06-23 10:51:56', '2016-06-23 21:48:43'),
(3, 'IMG_20160623_105246.jpg', '89', '', 'ANDROID-APP', '2016-06-23 10:53:07', '2016-06-23 21:58:53'),
(4, 'IMG_20160623_095537.jpg', 'found too many digits (3)', '', 'ANDROID-APP', '2016-06-23 11:50:45', '2016-06-23 21:48:43'),
(5, 'IMG_20160623_095537.jpg', 'found too many digits (3)', '', 'ANDROID-APP', '2016-06-23 11:54:08', '2016-06-23 21:48:43'),
(6, 'IMG_20160623_095537.jpg', 'found too many digits (3)', '', 'ANDROID-APP', '2016-06-23 11:55:59', '2016-06-23 21:48:43'),
(7, 'IMG_20160623_095537.jpg', 'found too many digits (3)', '', 'ANDROID-APP', '2016-06-23 11:57:02', '2016-06-23 21:48:43'),
(8, 'IMG_20160623_095537.jpg', 'found too many digits (3)', '', 'ANDROID-APP', '2016-06-23 11:57:58', '2016-06-23 21:48:43'),
(9, 'IMG_20160623_105246.jpg', '89', '', 'ANDROID-APP', '2016-06-23 11:58:28', '2016-06-23 21:58:53'),
(10, 'IMG_20160623_120057.jpg', '86', '', 'ANDROID-APP', '2016-06-23 12:01:34', '2016-06-23 21:48:43'),
(11, 'IMG_20160623_120145.jpg', '89', '', 'ANDROID-APP', '2016-06-23 12:02:00', '2016-06-23 21:48:43'),
(12, '1466701426344-290655625.jpg', 'could not load image /var/www/html/smart_decoder/uploads/1466701426344-290655625.jpg,   Imlib2 error code: IMLIB_LOAD_ERROR_FILE_DOES_NOT_EXIST', '', 'ANDROID-APP', '2016-06-23 12:04:01', '2016-06-23 21:48:43'),
(13, '1466701703298-459300424.jpg', 'could not load image /var/www/html/smart_decoder/uploads/1466701703298-459300424.jpg,   Imlib2 error code: IMLIB_LOAD_ERROR_FILE_DOES_NOT_EXIST', '', 'ANDROID-APP', '2016-06-23 12:08:36', '2016-06-23 21:48:43'),
(14, '14667019233291582703089.jpg', 'could not load image /var/www/html/smart_decoder/uploads/14667019233291582703089.jpg,   Imlib2 error code: IMLIB_LOAD_ERROR_FILE_DOES_NOT_EXIST', '', 'ANDROID-APP', '2016-06-23 12:12:13', '2016-06-23 21:48:43'),
(16, 'IMG_20160623_105246.jpg', '89', '', 'ANDROID-APP', '2016-06-23 12:15:54', '2016-06-23 21:58:53'),
(18, 'IMG_20160623_105246.jpg', '89', '', 'WEB-APP', '2016-06-23 16:53:59', '2016-06-23 21:58:53'),
(21, 'IMG_20160623_105246.jpg', '89', '434532453245', 'WEB-APP', '2016-06-23 17:56:29', '2016-06-23 21:58:53'),
(22, 'IMG_20160623_105246.jpg', '89', '234234', 'WEB-APP', '2016-06-23 17:58:53', '2016-06-23 21:58:53'),
(28, 'IMG_20160623_190116.jpg', '85', '345644', 'ANDROID-APP', '2016-06-23 19:01:41', '2016-06-23 23:01:41'),
(29, 'IMG_20160623_190519.jpg', '83', '5778', 'ANDROID-APP', '2016-06-23 19:05:35', '2016-06-23 23:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `settingsconfig`
--

CREATE TABLE IF NOT EXISTS `settingsconfig` (
  `sc_id` int(10) NOT NULL AUTO_INCREMENT,
  `sc_site_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sc_last_updated` datetime NOT NULL,
  PRIMARY KEY (`sc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settingsconfig`
--

INSERT INTO `settingsconfig` (`sc_id`, `sc_site_title`, `sc_last_updated`) VALUES
(1, 'Smart Decoder', '2013-03-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sysuser`
--

CREATE TABLE IF NOT EXISTS `sysuser` (
  `sysuser_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `sysuser_login` varchar(50) NOT NULL,
  `sysuser_password` varchar(50) DEFAULT NULL,
  `sysuser_role` bigint(10) DEFAULT '1',
  `sysuser_email` varchar(50) DEFAULT NULL,
  `sysuser_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`sysuser_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sysuser`
--

INSERT INTO `sysuser` (`sysuser_id`, `sysuser_login`, `sysuser_password`, `sysuser_role`, `sysuser_email`, `sysuser_status`, `created_date`, `updated_date`, `is_deleted`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 1, 'admin@test.com', 'active', '2013-12-05 06:00:00', '2016-06-18 01:43:10', 'no');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
