-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2024 at 03:42 AM
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
-- Table structure for table `text`
--

CREATE TABLE `text` (
  `text_id` int(2) NOT NULL,
  `cat_id` int(2) NOT NULL,
  `text_title` varchar(200) NOT NULL,
  `text_content` text NOT NULL,
  `text_post` varchar(100) NOT NULL,
  `text_read` int(5) NOT NULL,
  `text_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `text`
--

INSERT INTO `text` (`text_id`, `cat_id`, `text_title`, `text_content`, `text_post`, `text_read`, `text_date`) VALUES
(126, 10, 'จะเลือกเบอร์ยังไง ? ', 'จะเลือกเบอร์ยังไง ?', 'ฉัน', 0, '2011-07-18 18:38:52'),
(127, 10, 'น้ำหนักคำพยากรณ์คืออะไร ?', 'น้ำหนักคำพยากรณ์คืออะไร ?', 'ฉัน', 0, '2011-07-26 16:30:26'),
(128, 10, 'ทำไมบางเบอร์แพง แล้วแพงกว่าต้องดีไหม  ?', 'ทำไมบางเบอร์แพง แล้วแพงกว่าต้องดีไหม  ?', 'ฉัน', 0, '2011-07-26 16:30:52'),
(129, 10, 'เป็นชื่อเจ้าของเบอร์หลายเบอร์ส่งผลไหม  ?', 'เป็นชื่อเจ้าของเบอร์หลายเบอร์ส่งผลไหม ?', 'ฉัน', 0, '2011-07-26 16:31:15'),
(130, 10, 'เปลี่ยนเบอร์แล้วกลัวคนติดต่อไม่ได้ทำยังไงดี ?', 'เปลี่ยนเบอร์แล้วกลัวคนติดต่อไม่ได้ทำยังไงดี ?', 'ฉัน', 0, '2011-07-26 16:32:06'),
(131, 0, '', '', '', 0, '2011-07-26 16:35:16'),
(132, 0, '', '', '', 0, '2011-07-26 16:36:43'),
(133, 0, '', '', '', 0, '2011-07-28 18:26:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`text_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `text`
--
ALTER TABLE `text`
  MODIFY `text_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
