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
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `pro_id` int(5) NOT NULL,
  `pro_thumb` varchar(255) NOT NULL,
  `pro_title` varchar(255) NOT NULL,
  `pro_content` text NOT NULL,
  `pro_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`pro_id`, `pro_thumb`, `pro_title`, `pro_content`, `pro_date`) VALUES
(2, 'promotion-s.gif', 'โปรโมชันวันนี้', '<img alt=\"\" width=\"950\" height=\"713\" src=\"http://www.waka.co.th/page_promotion/j010.jpg\" /><br />\r\n<br />\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"940\">\r\n    <tbody>\r\n        <tr>\r\n            <td height=\"20\" valign=\"top\" colspan=\"5\">\r\n            <div class=\"style31\" align=\"left\"><span style=\"color: #993300\"><span style=\"font-size: large\"><strong><span class=\"style19\"><span class=\"style24\">โปรโมชั่น !! </span></span></strong></span></span><span class=\"style19\">ประจำ เดือน</span></div>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td height=\"20\" valign=\"top\" colspan=\"5\">\r\n            <div class=\"style31\" align=\"left\"><span class=\"style44\">การเตรียมความพร้อมสำหรับความปลอดภัย</span></div>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td height=\"20\" valign=\"top\" colspan=\"5\">\r\n            <div class=\"style31\" align=\"left\">&nbsp;</div>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td height=\"16\" valign=\"top\">&nbsp;</td>\r\n            <td valign=\"top\" colspan=\"4\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td height=\"16\" valign=\"top\">&nbsp;</td>\r\n            <td valign=\"top\" colspan=\"4\"><span class=\"style33\">บริการตรวจเช็คระบบฟรี</span></td>\r\n        </tr>\r\n        <tr>\r\n            <td height=\"20\">\r\n            <div class=\"style31\" align=\"center\"><img alt=\"\" width=\"7\" height=\"7\" src=\"bulet/icons01.jpg\" /></div>\r\n            </td>\r\n            <td colspan=\"2\">\r\n            <div class=\"style32\" align=\"justify\">ลูกค้าที่มีการใช้ระบบกล้องวงจรปิด และระบบคีย์การ์ด</div>\r\n            </td>\r\n            <td>&nbsp;</td>\r\n            <td>&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td height=\"20\">\r\n            <div class=\"style31\" align=\"center\"><img alt=\"\" width=\"7\" height=\"7\" src=\"bulet/icons01.jpg\" /></div>\r\n            </td>\r\n            <td colspan=\"2\">\r\n            <div class=\"style32\" align=\"justify\">เป็นสินค้าที่ทางบริษัทฯสามารถทำการตรวจเช็คได้</div>\r\n            </td>\r\n            <td>&nbsp;</td>\r\n            <td>&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td height=\"20\">\r\n            <div class=\"style31\" align=\"center\"><img alt=\"\" width=\"7\" height=\"7\" src=\"bulet/icons01.jpg\" /></div>\r\n            </td>\r\n            <td colspan=\"2\">\r\n            <div class=\"style32\" align=\"justify\">ให้ข้อมูลที่ถูกต้องแก่เจ้าหน้าที่ (เจ้าหน้าที่ประเมินผลในการให้บริการ)</div>\r\n            </td>\r\n            <td>&nbsp;</td>\r\n            <td>&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td height=\"20\">\r\n            <div class=\"style31\" align=\"center\"><img alt=\"\" width=\"7\" height=\"7\" src=\"bulet/icons01.jpg\" /></div>\r\n            </td>\r\n            <td colspan=\"2\">\r\n            <div class=\"style32\" align=\"justify\">ค่าบริการตรวจเช็คระบบฟรี โดยไม่มีค่าใช้จ่าย</div>\r\n            </td>\r\n            <td>&nbsp;</td>\r\n            <td>&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td height=\"20\">\r\n            <div class=\"style31\" align=\"center\"><img alt=\"\" width=\"7\" height=\"7\" src=\"bulet/icons01.jpg\" /></div>\r\n            </td>\r\n            <td colspan=\"2\">\r\n            <div class=\"style32\" align=\"justify\">กรณีมีการซ่อมแซม การให้บริการยังไม่รวมค่าอะไหล่</div>\r\n            </td>\r\n            <td>&nbsp;</td>\r\n            <td>&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td height=\"20\">&nbsp;</td>\r\n            <td colspan=\"2\"><span class=\"style28\"><span class=\"style19\">* บริการตามเงื่อนไขของบริษัทเท่านั้น* </span></span></td>\r\n            <td>&nbsp;</td>\r\n            <td>&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td>&nbsp;</td>\r\n            <td><span class=\"style40\">สายด่วน 081-634-4775, 086-321-0211</span></td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<br />', '2011-06-24 11:10:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
