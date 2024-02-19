-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2024 at 03:22 AM
-- Server version: 10.6.16-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magic2021_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `forecast`
--

CREATE TABLE `forecast` (
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `forecast`
--

INSERT INTO `forecast` (`content`) VALUES
('<p><span style=\"font-size: medium\"><span style=\"font-family: Tahoma\">ท่านคงจะเคยดูดวงจาก วันเกิด ราศี มาแล้ว</span></span></p>\r\n<p><span style=\"font-size: medium\"><span style=\"font-family: Tahoma\">วันนี้เรามีการทำนายดวงจากเบอร์มือถือของท่าน</span></span></p>\r\n<p><span style=\"font-size: medium\"><span style=\"font-family: Tahoma\">ท่านอยากรู้ไหมว่าเบอร์มือถือของท่านจะบอกท่านว่าอะไร</span></span></p>\r\n<p><span style=\"font-size: medium\"><span style=\"font-family: Tahoma\">เพียงใส่ตัวเลขด้านบน ท่านจะได้คำตอบ รออะไรอยู่ล่ะ<br />\r\n</span></span><br />\r\n<img alt=\"\" width=\"85\" height=\"83\" src=\"/image/image/hora%20copy.jpg\" /><img alt=\"\" width=\"85\" height=\"83\" src=\"/image/image/Thumbnails_magic_2.jpg\" />&nbsp;<img alt=\"\" width=\"85\" height=\"83\" src=\"/image/image/magic_3.jpg\" /><img alt=\"rพ่อครู\" width=\"85\" height=\"83\" src=\"/image/image/th.jpg\" /></p>');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
