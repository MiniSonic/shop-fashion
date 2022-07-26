-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2012 at 06:30 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dealthu`
--

-- --------------------------------------------------------

--
-- Table structure for table `ask`
--

CREATE TABLE IF NOT EXISTS `ask` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `team_id` int(10) unsigned NOT NULL DEFAULT '0',
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` enum('ask','transfer') NOT NULL DEFAULT 'ask',
  `content` text,
  `comment` text,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `bankname_short` varchar(50) DEFAULT NULL,
  `bankcode` varchar(20) DEFAULT NULL,
  `bankacc` varchar(200) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `first_element` varchar(3) NOT NULL COMMENT 'ki tu dau',
  `bankname_long` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bankname_short`, `bankcode`, `bankacc`, `image`, `first_element`, `bankname_long`) VALUES
(1, 'Eximbank', '100414849234412', 'TRUONG HOANG THI', 'bank/2012/0214/13291817781409.jpg', 'EIB', 'Ngân hàng TM Cổ phần XNK Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `id` varchar(16) NOT NULL,
  `code` varchar(16) DEFAULT NULL,
  `partner_id` int(10) unsigned NOT NULL DEFAULT '0',
  `team_id` int(10) unsigned NOT NULL DEFAULT '0',
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `credit` int(10) unsigned NOT NULL DEFAULT '0',
  `consume` enum('Y','N') NOT NULL DEFAULT 'N',
  `ip` varchar(16) DEFAULT NULL,
  `begin_time` int(10) unsigned NOT NULL DEFAULT '0',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zone` varchar(16) DEFAULT NULL,
  `czone` varchar(32) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `ename` varchar(40) DEFAULT NULL,
  `letter` char(1) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `display` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_zne` (`zone`,`name`,`ename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `zone`, `czone`, `name`, `ename`, `letter`, `sort_order`, `display`) VALUES
(2, 'group', 'yeugiare', 'Gia dụng', 'gia-dụng', 'G', 5, 'Y'),
(9, 'group', 'yeugiare', 'Làm đẹp', 'lam-dep', 'L', 2, 'Y'),
(8, 'group', 'yeugiare', 'Học tập', 'hoc-tap', 'H', 1, 'Y'),
(7, 'city', 'Việt Nam', 'TP. Cà Mau', 'ca-mau', 'C', 1, 'Y'),
(10, 'partner', '', 'Media Digital', 'Media Digital', 'H', 0, 'Y'),
(11, 'partner', 'Y', 'yeugiare.com', 'yeugiare', 'Y', 0, 'Y'),
(12, 'group', 'yeugiare', 'Quà tặng', 'qua-tang', 'Q', 7, 'Y'),
(16, 'city', 'Việt Nam', 'TP. Hồ Chí Minh', 'ho-chi-minh', 'H', 0, 'Y'),
(17, 'group', 'yeugiare', 'Thời trang', 'thoi-trang', 'T', 4, 'Y'),
(18, 'group', 'yeugiare', 'Công nghệ', 'cong-nghe', 'C', 6, 'Y'),
(28, 'news', 'news', 'Thông báo', 'thong-bao', 'T', 0, 'Y'),
(20, 'public', 'yeugiare', 'Quà tặng', 'qua-tang', 'Q', 0, 'Y'),
(21, 'public', 'yeugiare', 'Công nghệ', 'cong-nghe', 'C', 0, 'Y'),
(22, 'public', 'yeugiare', 'Gia dụng', 'gia-dung', 'G', 0, 'Y'),
(23, 'public', 'yeugiare', 'Thời trang', 'thoi-trang', 'T', 0, 'Y'),
(24, 'public', 'yeugiare', 'Làm đẹp', 'lam-dep', 'L', 0, 'Y'),
(25, 'public', 'yeugiare', 'Học tập', 'hoc-tap', 'H', 0, 'Y'),
(26, 'public', 'yeugiare', 'Ẩm thực', 'am-thuc', 'A', 0, 'Y'),
(29, 'news', 'news', 'Khuyến mãi', 'khuyen-mai', 'K', 1, 'Y'),
(30, 'news', 'news', 'Tin HTDeal.vn', 'tin-htdeal', 'T', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `id` varchar(12) NOT NULL DEFAULT '',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `partner_id` int(10) unsigned NOT NULL DEFAULT '0',
  `team_id` int(10) unsigned NOT NULL DEFAULT '0',
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` enum('consume','credit') NOT NULL DEFAULT 'consume',
  `credit` int(10) unsigned NOT NULL DEFAULT '0',
  `secret` varchar(10) DEFAULT NULL,
  `consume` enum('Y','N') NOT NULL DEFAULT 'N',
  `ip` varchar(16) DEFAULT NULL,
  `sms` int(10) unsigned NOT NULL DEFAULT '0',
  `expire_time` int(10) unsigned NOT NULL DEFAULT '0',
  `consume_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `sms_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE IF NOT EXISTS `credit` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `detail_id` varchar(32) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `score` double(10,2) NOT NULL DEFAULT '0.00',
  `action` varchar(16) NOT NULL DEFAULT 'buy',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `remark` text,
  `op_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `category` enum('suggest','seller') NOT NULL DEFAULT 'suggest',
  `title` varchar(128) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `content` text,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

-- --------------------------------------------------------

--
-- Table structure for table `flow`
--

CREATE TABLE IF NOT EXISTS `flow` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `detail_id` varchar(32) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `direction` enum('income','expense') NOT NULL DEFAULT 'income',
  `money` double(10,2) NOT NULL DEFAULT '0.00',
  `action` varchar(16) NOT NULL DEFAULT 'buy',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Table structure for table `friendlink`
--

CREATE TABLE IF NOT EXISTS `friendlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `display` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `friendlink`
--

INSERT INTO `friendlink` (`id`, `title`, `url`, `logo`, `sort_order`, `display`) VALUES
(1, 'Sinh viên Cà Mau', 'http://sinhviencamau.com', '/static/banner/bannersvcm.gif', 10, 'Y'),
(2, 'Rao vặt Cà Mau', 'http://camauraovat.com', '/static/banner/bannercmrv.gif', 1, 'Y'),
(3, 'yeugiare.com - Deal Cà Mau', 'http://yeugiare.com', '/static/banner/bannerygr.png', 11, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `image` varchar(128) DEFAULT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `number` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `consume` int(11) NOT NULL DEFAULT '0',
  `display` enum('Y','N') NOT NULL DEFAULT 'Y',
  `enable` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

CREATE TABLE IF NOT EXISTS `invite` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_ip` varchar(16) DEFAULT NULL,
  `other_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `other_user_ip` varchar(16) DEFAULT NULL,
  `team_id` int(10) unsigned NOT NULL DEFAULT '0',
  `pay` enum('Y','N','C') NOT NULL DEFAULT 'N',
  `credit` int(10) unsigned NOT NULL DEFAULT '0',
  `buy_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_uo` (`user_id`,`other_user_id`),
  UNIQUE KEY `UNQ_o` (`other_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE IF NOT EXISTS `license` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `domain` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NULL',
  `time_create` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_license` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `local` enum('province','district','ward') COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `display` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=386 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `pid`, `local`, `name`, `sort_order`, `display`) VALUES
(1, 0, 'province', 'Cà Mau', 1, 'Y'),
(2, 0, 'province', 'TP. Hồ Chí Minh', 2, 'N'),
(3, 2, 'district', 'Quận 1', 1, 'Y'),
(4, 2, 'district', 'Quận 2', 2, 'Y'),
(5, 2, 'district', 'Quận 3', 3, 'Y'),
(6, 2, 'district', 'Quận 4', 4, 'Y'),
(7, 2, 'district', 'Quận 5', 5, 'Y'),
(8, 2, 'district', 'Quận 6', 6, 'Y'),
(9, 2, 'district', 'Quận 7', 7, 'Y'),
(10, 2, 'district', 'Quận 8', 8, 'Y'),
(11, 2, 'district', 'Quận 9', 9, 'Y'),
(12, 2, 'district', 'Quận 10', 10, 'Y'),
(13, 2, 'district', 'Quận 11', 11, 'Y'),
(14, 2, 'district', 'Quận 12', 12, 'Y'),
(15, 2, 'district', 'Quận Gò Vấp', 13, 'Y'),
(16, 2, 'district', 'Quận Tân Bình', 14, 'Y'),
(17, 2, 'district', 'Quận Tân Phú', 15, 'Y'),
(18, 2, 'district', 'Quận Bình Thạnh', 16, 'Y'),
(19, 2, 'district', 'Quận Phú Nhuận', 17, 'Y'),
(20, 2, 'district', 'Quận Thủ Đức', 18, 'Y'),
(21, 2, 'district', 'Quận Bình Tân', 19, 'Y'),
(22, 2, 'district', 'Huyện Củ Chi', 20, 'Y'),
(23, 2, 'district', 'Huyện Hóc Môn', 21, 'Y'),
(24, 2, 'district', 'Huyện Bình Chánh', 22, 'Y'),
(25, 2, 'district', 'Huyện Nhà Bè', 23, 'Y'),
(26, 2, 'district', 'Huyện Cần Giờ', 24, 'Y'),
(27, 3, 'ward', 'Phường Bến Nghé', 1, 'Y'),
(28, 3, 'ward', 'Phường Bến Thành', 2, 'Y'),
(29, 3, 'ward', 'Phường Cô Giang', 3, 'Y'),
(30, 3, 'ward', 'Phường Cầu Kho', 4, 'Y'),
(31, 3, 'ward', 'Phường Cầu Ông Lãnh', 5, 'Y'),
(32, 3, 'ward', 'Phường Đa Kao', 6, 'Y'),
(33, 3, 'ward', 'Phường Nguyễn Thái Bình', 7, 'Y'),
(34, 3, 'ward', 'Phường Nguyễn Cư Trinh', 8, 'Y'),
(35, 3, 'ward', 'Phường Phạm Ngũ Lão', 9, 'Y'),
(36, 3, 'ward', 'Phường Tân Định', 10, 'Y'),
(37, 4, 'ward', 'Phường An Khánh', 1, 'Y'),
(38, 4, 'ward', 'Phường An Lợi Đông', 2, 'Y'),
(39, 4, 'ward', 'Phường An Phú', 3, 'Y'),
(40, 4, 'ward', 'Phường Bình An', 4, 'Y'),
(41, 4, 'ward', 'Phường Bình Khánh', 5, 'Y'),
(42, 4, 'ward', 'Phường Bình Trưng Đông', 6, 'Y'),
(43, 4, 'ward', 'Phường Bình Trưng Tây', 7, 'Y'),
(44, 4, 'ward', 'Phường Cát Lái', 8, 'Y'),
(45, 4, 'ward', 'Phường Thạnh Mỹ Lợi', 9, 'Y'),
(46, 4, 'ward', 'Phường Thảo Điền', 10, 'Y'),
(47, 4, 'ward', 'Phường Thủ Thiêm', 11, 'Y'),
(48, 5, 'ward', 'Phường 1', 1, 'Y'),
(49, 5, 'ward', 'Phường 2', 2, 'Y'),
(50, 5, 'ward', 'Phường 3', 3, 'Y'),
(51, 5, 'ward', 'Phường 4', 4, 'Y'),
(52, 5, 'ward', 'Phường 5', 5, 'Y'),
(53, 5, 'ward', 'Phường 6', 6, 'Y'),
(54, 5, 'ward', 'Phường 7', 7, 'Y'),
(55, 5, 'ward', 'Phường 8', 8, 'Y'),
(56, 5, 'ward', 'Phường 9', 9, 'Y'),
(57, 5, 'ward', 'Phường 10', 10, 'Y'),
(58, 5, 'ward', 'Phường 11', 11, 'Y'),
(59, 5, 'ward', 'Phường 12', 12, 'Y'),
(60, 5, 'ward', 'Phường 13', 13, 'Y'),
(61, 5, 'ward', 'Phường 14', 14, 'Y'),
(62, 6, 'ward', 'Phường 1', 1, 'Y'),
(63, 6, 'ward', 'Phường 2', 2, 'Y'),
(64, 6, 'ward', 'Phường 3', 3, 'Y'),
(65, 6, 'ward', 'Phường 4', 4, 'Y'),
(66, 6, 'ward', 'Phường 5', 5, 'Y'),
(67, 6, 'ward', 'Phường 6', 6, 'Y'),
(68, 6, 'ward', 'Phường 8', 8, 'Y'),
(69, 6, 'ward', 'Phường 9', 9, 'Y'),
(70, 6, 'ward', 'Phường 10', 10, 'Y'),
(71, 6, 'ward', 'Phường 12', 12, 'Y'),
(72, 6, 'ward', 'Phường 13', 13, 'Y'),
(73, 6, 'ward', 'Phường 14', 14, 'Y'),
(74, 6, 'ward', 'Phường 16', 16, 'Y'),
(75, 6, 'ward', 'Phường 15', 15, 'Y'),
(76, 6, 'ward', 'Phường 18', 18, 'Y'),
(77, 1, 'district', 'Thành phố Cà Mau', 1, 'Y'),
(78, 1, 'district', 'Huyện Đầm Dơi', 2, 'Y'),
(79, 1, 'district', 'Huyện Ngọc Hiển', 3, 'Y'),
(80, 1, 'district', 'Huyện Cái Nước', 4, 'Y'),
(81, 1, 'district', 'Huyện Trần Văn Thời', 5, 'Y'),
(82, 1, 'district', 'Huyện U Minh', 6, 'Y'),
(83, 1, 'district', 'Huyện Thới Bình', 7, 'Y'),
(84, 1, 'district', 'Huyện Năm Căn', 8, 'Y'),
(85, 1, 'district', 'Huyện Phú Tân', 9, 'Y'),
(86, 77, 'ward', 'Phường 1', 1, 'Y'),
(87, 77, 'ward', 'Phường 2', 2, 'Y'),
(92, 77, 'ward', 'Phường 7', 7, 'Y'),
(89, 77, 'ward', 'Phường 4', 4, 'Y'),
(90, 77, 'ward', 'Phường 5', 5, 'Y'),
(91, 77, 'ward', 'Phường 6', 6, 'Y'),
(93, 77, 'ward', 'Phường 8', 8, 'Y'),
(94, 77, 'ward', 'Phường 9', 9, 'Y'),
(95, 77, 'ward', 'Phường Tân Thành', 10, 'Y'),
(96, 77, 'ward', 'Phường Tân Xuyên', 11, 'Y'),
(97, 78, 'ward', 'Xã Ngọc Chánh', 1, 'Y'),
(98, 78, 'ward', 'Xã Nguyễn Huân', 2, 'Y'),
(99, 78, 'ward', 'Xã Quách Phẩm', 3, 'Y'),
(100, 78, 'ward', 'Xã Quách Phẩm Bắc', 4, 'Y'),
(101, 78, 'ward', 'Xã Tạ An Khương', 5, 'Y'),
(102, 78, 'ward', 'Xã Tạ An Khương Đông', 6, 'Y'),
(103, 78, 'ward', 'Xã Tạ An Khương Nam', 7, 'Y'),
(104, 78, 'ward', 'Xã Tân Dân', 8, 'Y'),
(107, 78, 'ward', 'Xã Tân Duyệt', 10, 'Y'),
(106, 78, 'ward', 'Xã Tân Đức', 9, 'Y'),
(108, 78, 'ward', 'Xã Tân Thuận', 11, 'Y'),
(109, 78, 'ward', 'Xã Tân Tiến', 12, 'Y'),
(110, 78, 'ward', 'Xã Tân Trung', 13, 'Y'),
(111, 78, 'ward', 'Xã Thanh Tùng', 14, 'Y'),
(112, 78, 'ward', 'Xã Trần Phán', 15, 'Y'),
(113, 79, 'ward', 'Xã Đất Mũi', 1, 'Y'),
(114, 79, 'ward', 'Xã Tam Giang Tây', 2, 'Y'),
(115, 79, 'ward', 'Xã Tân Ân Tây', 3, 'Y'),
(116, 79, 'ward', 'Xã Tân Ân', 4, 'Y'),
(117, 79, 'ward', 'Xã Viên An Đông', 5, 'Y'),
(118, 79, 'ward', 'Xã Viên An', 6, 'Y'),
(119, 80, 'ward', 'Xã Đông Hưng', 1, 'Y'),
(120, 80, 'ward', 'Xã Đông Thới', 2, 'Y'),
(121, 80, 'ward', 'Xã Hòa Mỹ', 3, 'Y'),
(122, 80, 'ward', 'Xã Hưng Mỹ', 4, 'Y'),
(123, 80, 'ward', 'Xã Lương Thế Trân', 5, 'Y'),
(124, 80, 'ward', 'Xã Phú Hưng', 6, 'Y'),
(125, 80, 'ward', 'Xã Tân Hưng Đông', 7, 'Y'),
(126, 80, 'ward', 'Xã Tân Hưng', 8, 'Y'),
(127, 80, 'ward', 'Xã Thạnh Phú', 9, 'Y'),
(128, 80, 'ward', 'Xã Trần Thới', 10, 'Y'),
(129, 81, 'ward', 'Xã Khánh Bình Đông', 1, 'Y'),
(130, 81, 'ward', 'Xã Khánh Bình Tây Bắc', 2, 'Y'),
(131, 81, 'ward', 'Xã Khánh Bình Tây', 3, 'Y'),
(132, 81, 'ward', 'Xã Khánh Bình', 4, 'Y'),
(133, 81, 'ward', 'Xã Khánh Hải', 5, 'Y'),
(134, 81, 'ward', 'Xã Khánh Hưng', 6, 'Y'),
(135, 81, 'ward', 'Xã Khánh Lộc', 7, 'Y'),
(136, 81, 'ward', 'Xã Lợi An', 8, 'Y'),
(137, 81, 'ward', 'Xã Phong Điền', 9, 'Y'),
(138, 81, 'ward', 'Xã Phong Lạc', 10, 'Y'),
(139, 81, 'ward', 'Xã Trần Hợi', 11, 'Y'),
(140, 82, 'ward', 'Xã Khánh An', 1, 'Y'),
(141, 82, 'ward', 'Xã Khánh Hòa', 2, 'Y'),
(142, 82, 'ward', 'Xã Khánh Hội', 3, 'Y'),
(143, 82, 'ward', 'Xã Khánh Lâm', 4, 'Y'),
(144, 82, 'ward', 'Xã Khánh Thuận', 5, 'Y'),
(145, 82, 'ward', 'Xã Khánh Tiến', 6, 'Y'),
(146, 82, 'ward', 'Xã Nguyễn Phích', 7, 'Y'),
(147, 83, 'ward', 'Xã Biển Bạch', 1, 'Y'),
(148, 83, 'ward', 'Xã Biển Bạch Đông', 2, 'Y'),
(149, 83, 'ward', 'Xã Hồ Thị Kỷ', 3, 'Y'),
(150, 83, 'ward', 'Xã Tân Bằng', 4, 'Y'),
(151, 83, 'ward', 'Xã Tân Lộc', 5, 'Y'),
(152, 83, 'ward', 'Xã Tân Lộc Bắc', 6, 'Y'),
(153, 83, 'ward', 'Xã Tân Lộc Đông', 7, 'Y'),
(154, 83, 'ward', 'Xã Tân Phú', 8, 'Y'),
(155, 83, 'ward', 'Xã Thới Bình', 9, 'Y'),
(156, 83, 'ward', 'Xã Trí Lực', 10, 'Y'),
(157, 83, 'ward', 'Xã Trí Phải', 11, 'Y'),
(158, 84, 'ward', 'Xã Đất Mới', 1, 'Y'),
(159, 84, 'ward', 'Xã Hàm Rồng', 2, 'Y'),
(160, 84, 'ward', 'Xã Hàng Vịnh', 3, 'Y'),
(161, 84, 'ward', 'Xã Hiệp Tùng', 4, 'Y'),
(162, 84, 'ward', 'Xã Lâm Hải', 5, 'Y'),
(163, 84, 'ward', 'Xã Tam Giang', 6, 'Y'),
(164, 84, 'ward', 'Xã Tam Giang Đông', 7, 'Y'),
(165, 85, 'ward', 'Xã Nguyễn Việt Khái', 1, 'Y'),
(166, 85, 'ward', 'Xã Phú Mỹ', 2, 'Y'),
(167, 85, 'ward', 'Xã Phú Tân', 3, 'Y'),
(168, 85, 'ward', 'Xã Phú Thuận', 4, 'Y'),
(169, 85, 'ward', 'Xã Rạch Chèo', 5, 'Y'),
(170, 85, 'ward', 'Xã Tân Hải', 6, 'Y'),
(171, 85, 'ward', 'Xã Tân Hưng Tây', 7, 'Y'),
(172, 85, 'ward', 'Xã Việt Thắng', 8, 'Y'),
(173, 7, 'ward', 'Phường 1', 1, 'Y'),
(174, 7, 'ward', 'Phường 2', 2, 'Y'),
(175, 7, 'ward', 'Phường 3', 3, 'Y'),
(176, 7, 'ward', 'Phường 4', 4, 'Y'),
(177, 7, 'ward', 'Phường 5', 5, 'Y'),
(178, 7, 'ward', 'Phường 6', 6, 'Y'),
(179, 7, 'ward', 'Phường 7', 7, 'Y'),
(180, 7, 'ward', 'Phường 8', 8, 'Y'),
(181, 7, 'ward', 'Phường 9', 9, 'Y'),
(182, 7, 'ward', 'Phường 10', 10, 'Y'),
(183, 7, 'ward', 'Phường 11', 11, 'Y'),
(184, 7, 'ward', 'Phường 12', 12, 'Y'),
(185, 7, 'ward', 'Phường 13', 13, 'Y'),
(186, 7, 'ward', 'Phường 14', 14, 'Y'),
(187, 7, 'ward', 'Phường 15', 15, 'Y'),
(188, 8, 'ward', 'Phường 1', 1, 'Y'),
(189, 8, 'ward', 'Phường 2', 2, 'Y'),
(190, 8, 'ward', 'Phường 3', 3, 'Y'),
(191, 8, 'ward', 'Phường 4', 4, 'Y'),
(192, 8, 'ward', 'Phường 5', 5, 'Y'),
(193, 8, 'ward', 'Phường 6', 6, 'Y'),
(194, 8, 'ward', 'Phường 7', 7, 'Y'),
(195, 8, 'ward', 'Phường 8', 8, 'Y'),
(196, 8, 'ward', 'Phường 9', 9, 'Y'),
(197, 8, 'ward', 'Phường 10', 10, 'Y'),
(198, 8, 'ward', 'Phường 11', 11, 'Y'),
(199, 8, 'ward', 'Phường 12', 12, 'Y'),
(200, 8, 'ward', 'Phường 13', 13, 'Y'),
(201, 8, 'ward', 'Phường 14', 14, 'Y'),
(202, 9, 'ward', 'Phường Bình Thuận', 1, 'Y'),
(203, 9, 'ward', 'Phường Phú Mỹ', 2, 'Y'),
(204, 9, 'ward', 'Phường Phú Thuận', 3, 'Y'),
(205, 9, 'ward', 'Phường Tân Hưng', 4, 'Y'),
(206, 9, 'ward', 'Phường Tân Phong', 5, 'Y'),
(207, 9, 'ward', 'Phường Tân Phú', 6, 'Y'),
(208, 9, 'ward', 'Phường Tân Kiểng', 7, 'Y'),
(209, 9, 'ward', 'Phường Tân Quy', 8, 'Y'),
(210, 9, 'ward', 'Phường Tân Thuận Đông', 9, 'Y'),
(211, 9, 'ward', 'Phường Tân Thuận Tây', 10, 'Y'),
(212, 10, 'ward', 'Phường 1', 1, 'Y'),
(213, 10, 'ward', 'Phường 2', 1, 'Y'),
(214, 10, 'ward', 'Phường 3', 1, 'Y'),
(215, 10, 'ward', 'Phường 4', 1, 'Y'),
(216, 10, 'ward', 'Phường 5', 1, 'Y'),
(217, 10, 'ward', 'Phường 6', 1, 'Y'),
(218, 10, 'ward', 'Phường 7', 1, 'Y'),
(219, 10, 'ward', 'Phường 8', 1, 'Y'),
(220, 10, 'ward', 'Phường 9', 1, 'Y'),
(221, 10, 'ward', 'Phường 10', 1, 'Y'),
(222, 10, 'ward', 'Phường 11', 1, 'Y'),
(223, 10, 'ward', 'Phường 12', 1, 'Y'),
(224, 10, 'ward', 'Phường 13', 1, 'Y'),
(225, 10, 'ward', 'Phường 14', 1, 'Y'),
(226, 10, 'ward', 'Phường 15', 1, 'Y'),
(227, 10, 'ward', 'Phường 16', 1, 'Y'),
(228, 11, 'ward', 'Phường Hiệp Phú', 1, 'Y'),
(229, 11, 'ward', 'Phường Long Bình', 1, 'Y'),
(230, 11, 'ward', 'Phường Long Phước', 1, 'Y'),
(231, 11, 'ward', 'Phường Long Trường', 1, 'Y'),
(232, 11, 'ward', 'Phường Long Thạnh Mỹ', 1, 'Y'),
(233, 11, 'ward', 'Phường Phú Hữu', 1, 'Y'),
(234, 11, 'ward', 'Phường Phước Bình', 1, 'Y'),
(235, 11, 'ward', 'Phường Phước Long A', 1, 'Y'),
(236, 11, 'ward', 'Phường Phước Long B', 1, 'Y'),
(237, 11, 'ward', 'Phường Tăng Nhơn Phú A', 1, 'Y'),
(238, 11, 'ward', 'Phường Tăng Nhơn Phú B', 1, 'Y'),
(239, 11, 'ward', 'Phường Tân Phú', 1, 'Y'),
(240, 11, 'ward', 'Phường Trường Thạnh', 1, 'Y'),
(241, 12, 'ward', 'Phường 1', 1, 'Y'),
(242, 12, 'ward', 'Phường 2', 1, 'Y'),
(243, 12, 'ward', 'Phường 3', 1, 'Y'),
(244, 12, 'ward', 'Phường 4', 1, 'Y'),
(245, 12, 'ward', 'Phường 5', 1, 'Y'),
(246, 12, 'ward', 'Phường 6', 1, 'Y'),
(247, 12, 'ward', 'Phường 7', 1, 'Y'),
(248, 12, 'ward', 'Phường 8', 1, 'Y'),
(249, 12, 'ward', 'Phường 9', 1, 'Y'),
(250, 12, 'ward', 'Phường 10', 1, 'Y'),
(251, 12, 'ward', 'Phường 11', 1, 'Y'),
(252, 12, 'ward', 'Phường 12', 1, 'Y'),
(253, 12, 'ward', 'Phường 13', 1, 'Y'),
(254, 12, 'ward', 'Phường 14', 1, 'Y'),
(255, 12, 'ward', 'Phường 15', 1, 'Y'),
(256, 13, 'ward', 'Phường 1', 1, 'Y'),
(257, 13, 'ward', 'Phường 2', 1, 'Y'),
(258, 13, 'ward', 'Phường 3', 1, 'Y'),
(259, 13, 'ward', 'Phường 4', 1, 'Y'),
(260, 13, 'ward', 'Phường 5', 1, 'Y'),
(261, 13, 'ward', 'Phường 6', 1, 'Y'),
(262, 13, 'ward', 'Phường 7', 1, 'Y'),
(263, 13, 'ward', 'Phường 8', 1, 'Y'),
(264, 13, 'ward', 'Phường 9', 1, 'Y'),
(265, 13, 'ward', 'Phường 10', 1, 'Y'),
(266, 13, 'ward', 'Phường 11', 1, 'Y'),
(267, 13, 'ward', 'Phường 12', 1, 'Y'),
(268, 13, 'ward', 'Phường 13', 1, 'Y'),
(269, 13, 'ward', 'Phường 14', 1, 'Y'),
(270, 13, 'ward', 'Phường 15', 1, 'Y'),
(271, 13, 'ward', 'Phường 16', 1, 'Y'),
(272, 14, 'ward', 'Phường An Phú Đông', 1, 'Y'),
(273, 14, 'ward', 'Phường Đông Hưng Thuận', 1, 'Y'),
(274, 14, 'ward', 'Phường Hiệp Thành', 1, 'Y'),
(275, 14, 'ward', 'Phường Tân Chánh Hiệp', 1, 'Y'),
(276, 14, 'ward', 'Phường Tân Thới Hiệp', 1, 'Y'),
(277, 14, 'ward', 'Phường Tân Thới Nhất', 1, 'Y'),
(278, 14, 'ward', 'Phường Thạnh Lộc', 1, 'Y'),
(279, 14, 'ward', 'Phường Thạnh Xuân', 1, 'Y'),
(280, 14, 'ward', 'Phường Thới An', 1, 'Y'),
(281, 14, 'ward', 'Phường Trung Mỹ Tây', 1, 'Y'),
(282, 14, 'ward', 'Phường Tân Hưng Thuận', 1, 'Y'),
(283, 15, 'ward', 'Phường 1', 1, 'Y'),
(284, 15, 'ward', 'Phường 2', 1, 'Y'),
(285, 15, 'ward', 'Phường 3', 1, 'Y'),
(286, 15, 'ward', 'Phường 4', 1, 'Y'),
(287, 15, 'ward', 'Phường 5', 1, 'Y'),
(288, 15, 'ward', 'Phường 6', 1, 'Y'),
(289, 15, 'ward', 'Phường 7', 1, 'Y'),
(290, 15, 'ward', 'Phường 8', 1, 'Y'),
(291, 15, 'ward', 'Phường 9', 1, 'Y'),
(292, 15, 'ward', 'Phường 10', 1, 'Y'),
(293, 15, 'ward', 'Phường 11', 1, 'Y'),
(294, 15, 'ward', 'Phường 12', 1, 'Y'),
(295, 15, 'ward', 'Phường 13', 1, 'Y'),
(296, 15, 'ward', 'Phường 14', 1, 'Y'),
(297, 15, 'ward', 'Phường 15', 1, 'Y'),
(298, 15, 'ward', 'Phường 16', 1, 'Y'),
(299, 15, 'ward', 'Phường 17', 1, 'Y'),
(300, 20, 'ward', 'Phường Bình Chiểu', 1, 'Y'),
(301, 20, 'ward', 'Phường Bình Thọ', 1, 'Y'),
(302, 20, 'ward', 'Phường Hiệp Bình Chánh', 1, 'Y'),
(303, 20, 'ward', 'Phường Hiệp Bình Phước', 1, 'Y'),
(304, 20, 'ward', 'Phường Linh Chiểu', 1, 'Y'),
(305, 20, 'ward', 'Phường Linh Đông', 1, 'Y'),
(306, 20, 'ward', 'Phường Linh Tây', 1, 'Y'),
(307, 20, 'ward', 'Phường Linh Trung', 1, 'Y'),
(308, 20, 'ward', 'Phường Linh Xuân', 1, 'Y'),
(309, 20, 'ward', 'Phường Tam Bình', 1, 'Y'),
(310, 20, 'ward', 'Phường Tam Phú', 1, 'Y'),
(311, 20, 'ward', 'Phường Trường Thọ', 1, 'Y'),
(312, 17, 'ward', 'Phường Hòa Thạnh', 1, 'Y'),
(313, 17, 'ward', 'Phường Hiệp Tân', 1, 'Y'),
(314, 17, 'ward', 'Phường Phú Thạnh', 1, 'Y'),
(315, 17, 'ward', 'Phường Phú Thọ Hòa', 1, 'Y'),
(316, 17, 'ward', 'Phường Phú Trung', 1, 'Y'),
(317, 17, 'ward', 'Phường Sơn Kỳ', 1, 'Y'),
(318, 17, 'ward', 'Phường Tân Thành', 1, 'Y'),
(319, 17, 'ward', 'Phường Tân Thới Hòa', 1, 'Y'),
(320, 17, 'ward', 'Phường Tân Quý', 1, 'Y'),
(321, 17, 'ward', 'Phường Tân Sơn Nhì', 1, 'Y'),
(322, 17, 'ward', 'Phường Tây Thạnh', 1, 'Y'),
(323, 21, 'ward', 'Phường An Lạc', 1, 'Y'),
(324, 21, 'ward', 'Phường An Lạc A', 1, 'Y'),
(325, 21, 'ward', 'Phường Bình Hưng Hòa', 1, 'Y'),
(326, 21, 'ward', 'Phường Bình Hưng Hòa A', 1, 'Y'),
(327, 21, 'ward', 'Phường Bình Hưng Hòa B', 1, 'Y'),
(328, 21, 'ward', 'Phường Bình Trị Đông', 1, 'Y'),
(329, 21, 'ward', 'Phường Bình Trị Đông A', 1, 'Y'),
(330, 21, 'ward', 'Phường Bình Trị Đông B', 1, 'Y'),
(331, 21, 'ward', 'Phường Tân Tạo', 1, 'Y'),
(332, 21, 'ward', 'Phường Tân Tạo A', 1, 'Y'),
(333, 19, 'ward', 'Phường 1', 1, 'Y'),
(334, 19, 'ward', 'Phường 2', 1, 'Y'),
(335, 19, 'ward', 'Phường 3', 1, 'Y'),
(336, 19, 'ward', 'Phường 4', 1, 'Y'),
(337, 19, 'ward', 'Phường 5', 1, 'Y'),
(338, 19, 'ward', 'Phường 6', 1, 'Y'),
(339, 19, 'ward', 'Phường 7', 1, 'Y'),
(340, 19, 'ward', 'Phường 8', 1, 'Y'),
(341, 19, 'ward', 'Phường 9', 1, 'Y'),
(342, 19, 'ward', 'Phường 10', 1, 'Y'),
(343, 19, 'ward', 'Phường 11', 1, 'Y'),
(344, 19, 'ward', 'Phường 12', 1, 'Y'),
(345, 19, 'ward', 'Phường 13', 1, 'Y'),
(346, 19, 'ward', 'Phường 14', 1, 'Y'),
(347, 19, 'ward', 'Phường 15', 1, 'Y'),
(348, 19, 'ward', 'Phường 17', 1, 'Y'),
(349, 16, 'ward', 'Phường 1', 1, 'Y'),
(350, 16, 'ward', 'Phường 2', 1, 'Y'),
(351, 16, 'ward', 'Phường 3', 1, 'Y'),
(352, 16, 'ward', 'Phường 4', 1, 'Y'),
(353, 16, 'ward', 'Phường 5', 1, 'Y'),
(354, 16, 'ward', 'Phường 6', 1, 'Y'),
(355, 16, 'ward', 'Phường 7', 1, 'Y'),
(356, 16, 'ward', 'Phường 8', 1, 'Y'),
(357, 16, 'ward', 'Phường 9', 1, 'Y'),
(358, 16, 'ward', 'Phường 10', 1, 'Y'),
(359, 16, 'ward', 'Phường 11', 1, 'Y'),
(360, 16, 'ward', 'Phường 12', 1, 'Y'),
(361, 16, 'ward', 'Phường 13', 1, 'Y'),
(362, 16, 'ward', 'Phường 14', 1, 'Y'),
(363, 16, 'ward', 'Phường 15', 1, 'Y'),
(364, 18, 'ward', 'Phường 1', 0, 'Y'),
(365, 18, 'ward', 'Phường 2', 0, 'Y'),
(366, 18, 'ward', 'Phường 3', 0, 'Y'),
(367, 18, 'ward', 'Phường 4', 0, 'Y'),
(368, 18, 'ward', 'Phường 5', 0, 'Y'),
(369, 18, 'ward', 'Phường 6', 0, 'Y'),
(370, 18, 'ward', 'Phường 7', 0, 'Y'),
(371, 18, 'ward', 'Phường 11', 0, 'Y'),
(372, 18, 'ward', 'Phường 12', 0, 'Y'),
(373, 18, 'ward', 'Phường 13', 0, 'Y'),
(374, 18, 'ward', 'Phường 14', 0, 'Y'),
(375, 18, 'ward', 'Phường 15', 0, 'Y'),
(376, 18, 'ward', 'Phường 17', 0, 'Y'),
(377, 18, 'ward', 'Phường 19', 0, 'Y'),
(378, 18, 'ward', 'Phường 21', 0, 'Y'),
(379, 18, 'ward', 'Phường 22', 0, 'Y'),
(380, 18, 'ward', 'Phường 24', 0, 'Y'),
(381, 18, 'ward', 'Phường 25', 0, 'Y'),
(382, 18, 'ward', 'Phường 26', 0, 'Y'),
(383, 18, 'ward', 'Phường 27', 0, 'Y'),
(384, 18, 'ward', 'Phường 28', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `cate_id` int(3) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `news_desc` text COLLATE utf8_unicode_ci,
  `detail` text COLLATE utf8_unicode_ci,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` int(10) DEFAULT '0',
  `keyword_s` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `sort_order` int(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pay_id` varchar(32) DEFAULT NULL,
  `service` varchar(16) NOT NULL DEFAULT 'alipay',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `team_id` int(10) unsigned NOT NULL DEFAULT '0',
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_id` varchar(16) DEFAULT NULL,
  `state` enum('unpay','pay') NOT NULL DEFAULT 'unpay',
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `realname` varchar(32) DEFAULT NULL,
  `mobile` varchar(128) DEFAULT NULL,
  `zipcode` char(6) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `express` enum('Y','N') NOT NULL DEFAULT 'Y',
  `express_xx` varchar(128) DEFAULT NULL,
  `express_id` int(10) unsigned NOT NULL DEFAULT '0',
  `express_no` varchar(32) DEFAULT NULL,
  `price` double(10,0) NOT NULL DEFAULT '0',
  `money` double(10,0) NOT NULL DEFAULT '0',
  `origin` double(10,0) NOT NULL DEFAULT '0',
  `credit` double(10,0) NOT NULL DEFAULT '0',
  `card` double(10,0) NOT NULL DEFAULT '0',
  `fare` double(10,0) NOT NULL DEFAULT '0',
  `condbuy` varchar(128) DEFAULT NULL,
  `remark` text,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `pay_time` int(10) unsigned NOT NULL DEFAULT '0',
  `code` bigint(20) unsigned NOT NULL COMMENT 'ma don hang',
  `bankID` int(11) NOT NULL DEFAULT '0' COMMENT 'luu id cua ngan hang can thanh toan',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_p` (`pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` varchar(30) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `value`) VALUES
('about_us', '<p>\r\n	<strong>yeugiare.com </strong>l&agrave; một trong chuỗi sản phẩm của <strong>HT Media Digital</strong>, ch&iacute;nh thức hoạt động v&agrave;o đầu th&aacute;ng 12/2011. Website l&agrave; một dự &aacute;n lấy &yacute; tưởng từ m&ocirc; h&igrave;nh Groupon, một m&ocirc; h&igrave;nh thương mại điện tử đầy tiềm năng đang được người ti&ecirc;u d&ugrave;ng v&agrave; c&aacute;c doanh nghiệp rất quan t&acirc;m. Với đội ngũ th&agrave;nh vi&ecirc;n hội đồng s&aacute;ng lập trẻ, nhiều năm kinh nghiệp trong lĩnh vực thương mại điện tử, truyền th&ocirc;ng trực tuyến,ch&uacute;ng t&ocirc;i tự tin sẽ mang đến cho kh&aacute;ch h&agrave;ng những sản phẩm, dịch vụ chất lượng từ c&aacute;c nh&agrave; cung cấp uy t&iacute;n với mức gi&aacute; giảm ưu đ&atilde;i nhất.<br />\r\n	<br />\r\n	Qua sản phẩm n&agrave;y ch&uacute;ng t&ocirc;i mong muốn x&acirc;y dựng một cộng đồng kinh doanh m&agrave; c&aacute;c b&ecirc;n tham gia đều cảm nhận được gi&aacute; trị v&agrave; lợi &iacute;ch:</p>\r\n<p>\r\n	&nbsp;&nbsp; - Người mua c&oacute; thể tiết kiệm l&ecirc;n đến hơn 90% khi mua sắm v&agrave; sử dụng dịch vụ.<br />\r\n	&nbsp;&nbsp; - Người b&aacute;n c&oacute; thể giới thiệu thương hiệu / sản phẩm / dịch vụ của m&igrave;nh đến kh&aacute;ch h&agrave;ng với hiệu quả cao m&agrave; chi ph&iacute; thấp nhất.<br />\r\n	&nbsp;&nbsp; - <strong>yeugiare.com</strong> được trờ th&agrave;nh cầu nối đ&aacute;ng tin cậy cho c&aacute;c b&ecirc;n tham gia.</p>\r\n<p>\r\n	D&ugrave; bạn ở vai tr&ograve; người b&aacute;n hay người mua, rất vui khi bạn tham gia c&ugrave;ng ch&uacute;ng t&ocirc;i x&acirc;y dựng cộng đồng mua sắm sản phẩm, dịch vụ với gi&aacute; ưu đ&atilde;i v&agrave; đừng qu&ecirc;n giới thiệu th&ecirc;m bạn b&egrave; để &ldquo;Y&ecirc;u Gi&aacute; Rẻ&rdquo; ng&agrave;y một lớn mạnh hơn.</p>\r\n<p>\r\n	<strong><em>Mọi thắc mắc, g&oacute;p &yacute; vui l&ograve;ng li&ecirc;n hệ:</em></strong><br />\r\n	<br />\r\n	<strong>SHOP ĐỒ KỸ THUẬT SỐ PHUKIENLA.COM</strong><br />\r\n	<em>HT Media Digital</em><br />\r\n	113A L&yacute; Văn L&acirc;m, Kh&oacute;m 5 Phường 1, Th&agrave;nh phố C&agrave; Mau<br />\r\n	Điện thoại: (849) 44303422<br />\r\n	Email: hoangthikd@@gmail.com</p>'),
('help_tour', '<div>\r\n	<strong><u>Bước 1</u>:</strong> Xem th&ocirc;ng tin sản phẩm &ndash; dịch vụ &amp; bấm n&uacute;t <strong>&ldquo;Mua&quot;</strong><br />\r\n	<br />\r\n	<p>\r\n		<img align="left" alt="" height="242" hspace="3" src="http://hotdeal.vn/static/team/2010/1128/12909562271102.jpg" width="161" />Bạn nhớ lưu &yacute; một số th&ocirc;ng tin về thời gian c&ograve;n lại hoặc số lượng tối thiểu. Bạn n&ecirc;n rủ th&ecirc;m bạn b&egrave; c&ugrave;ng mua để đạt mức quy định tối thiểu.</p>\r\n</div>\r\n<p>\r\n	<u><strong>Bước 2:</strong></u> Xem th&ocirc;ng tin đơn h&agrave;ng v&agrave; chọn<strong> &ldquo;Đồng &yacute; mua&rdquo;</strong><br />\r\n	<br />\r\n	<img alt="" src="http://hotdeal.vn/static/team/2010/1128/12909565083758.jpg" /><br />\r\n	<br />\r\n	<u><strong>Bước 3:</strong></u> Đăng nhập t&agrave;i khoản, xem kỹ th&ocirc;ng tin địa chỉ giao h&agrave;ng.<br />\r\n	<br />\r\n	<img alt="" src="http://hotdeal.vn/static/team/2010/1128/12909565811743.jpg" /><br />\r\n	<br />\r\n	V&agrave; x&aacute;c nhận mua.<br />\r\n	<br />\r\n	<img alt="" src="http://hotdeal.vn/static/team/2010/1128/12909568332350.jpg" /><br />\r\n	<br />\r\n	<u><strong>Bước 4:</strong></u> Th&ocirc;ng tin x&aacute;c nhận đơn h&agrave;ng sẽ được gửi đến địa chỉ email.</p>\r\n<br />\r\n<br />\r\n<div align="center">\r\n	<img alt="" src="http://hotdeal.vn/static/team/2010/1128/12909569562661.jpg" /></div>\r\n<p>\r\n	<br />\r\n	<br />\r\n	Bạn c&oacute; thể bấm v&agrave;o n&uacute;t <strong>&ldquo;Chi tiết đơn h&agrave;ng&rdquo;</strong> để kiểm tra lại c&aacute;c th&ocirc;ng tin đơn h&agrave;ng vừa mua.<br />\r\n	<br />\r\n	<img alt="" src="http://hotdeal.vn/static/team/2010/1128/12909570092136.jpg" /><br />\r\n	<br />\r\n	<strong>Giao Voucher &amp; Thanh To&aacute;n Tận Nơi:</strong> Trong v&ograve;ng&nbsp;3-5 ng&agrave;y (kh&ocirc;ng t&iacute;nh thứ bảy v&agrave; chủ nhật) kể từ khi kết th&uacute;c deal, nh&acirc;n vi&ecirc;n <strong>Y&ecirc;uGi&aacute;Rẻ</strong> sẽ li&ecirc;n hệ x&aacute;c nhận đơn h&agrave;ng v&agrave; tiến h&agrave;nh giao voucher). Khi nhận phiếu bạn sẽ thanh to&aacute;n tiền mặt cho nh&acirc;n vi&ecirc;n giao h&agrave;ng.<br />\r\n	<br />\r\n	Nếu deal kh&ocirc;ng th&agrave;nh c&ocirc;ng: <strong>Y&ecirc;uGi&aacute;Rẻ</strong> sẽ li&ecirc;n hệ điện thoại v&agrave; th&ocirc;ng b&aacute;o hủy deal. Bạn sẽ kh&ocirc;ng phải tốn chi ph&iacute; g&igrave; cả.<br />\r\n	<br />\r\n	Trong một số trường hợp đặc biệt, bạn c&oacute; thể được y&ecirc;u cầu đặt cọc. Ch&uacute;ng t&ocirc;i sẽ c&oacute; hướng dẫn cụ thể trong c&aacute;c trường hợp n&agrave;y.</p>'),
('help_payment', '<p>\r\n	Hướng dẫn thanh to&aacute;n</p>'),
('feedback_sellerf', 'ffffffffffffff&lt;br&gt;'),
('about_contact', '<p>\r\n	<strong>WEBSITE YEUGIARE.COM</strong><br />\r\n	54A L&yacute; Thường Kiệt, phường 6, TP C&agrave; Mau<br />\r\n	Điện thoại: 0944.303.422 - 0945.852.539<br />\r\n	Email: sales@yeugiare.com - yeugiare@gmail.com</p>'),
('feedback_sellerfaq', '<table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n	<tbody>\r\n		<tr>\r\n			<td align="left" colspan="2" style="padding-bottom: 10px;" valign="top">\r\n				Yeugiare.com mang đến cho đối t&aacute;c: <strong>DOANH THU + KH&Aacute;CH H&Agrave;NG + LỢI &Iacute;CH MARKETING với CHI PH&Iacute; = 0 HOẶC RẤT THẤP</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td align="center" style="padding-bottom: 10px;" valign="top">\r\n				<img alt="" src="/static/team/upload/images/2012/hop_tac_kinh_doanh/htkd1.jpg" style="width: 159px; height: 114px;" /></td>\r\n			<td align="center" valign="top">\r\n				<img alt="" src="/static/team/upload/images/2012/hop_tac_kinh_doanh/htkd2.jpg" style="width: 159px; height: 114px;" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td align="left" style="padding-right: 10px; padding-bottom: 10px;" valign="top">\r\n				<span style="font-weight: bold; text-align: center;">Cơ hội b&aacute;n h&agrave;ng với doanh số đảm bảo.</span><br />\r\n				<div align="justify">\r\n					Ch&uacute;ng t&ocirc;i sẽ đưa deal b&aacute;n sản phẩm &ndash; dịch vụ của bạn l&ecirc;n Yeugiare.com với số lượng b&aacute;n cam kết. Bạn sẽ biết chắc chắn doanh số tối thiểu thu được. V&agrave; Yeugiare.com sẽ nỗ lực quảng b&aacute; để bạn đạt mức b&aacute;n tối đa như mong đợi.</div>\r\n			</td>\r\n			<td align="left" style="padding-left: 10px; padding-bottom: 10px;" valign="top">\r\n				<span style="font-weight: bold; text-align: center;">Được truyền miệng - C&oacute; kh&aacute;ch h&agrave;ng mới tức th&igrave;.</span><br />\r\n				<div align="justify">\r\n					Sau mỗi deal được b&aacute;n ra, bạn sẽ c&oacute; lượng kh&aacute;ch h&agrave;ng mới tương ứng ngay lập tức. Đ&acirc;y l&agrave; những kh&aacute;ch h&agrave;ng thật sự c&oacute; nhu cầu với sản phẩm &ndash; dịch vụ của bạn. Kh&ocirc;ng chỉ c&oacute; thế, kh&aacute;ch h&agrave;ng sẽ c&ograve;n rủ bạn b&egrave;, người th&acirc;n c&ugrave;ng đến sử dụng v&agrave; c&ograve;n tiếp tục quay lại với bạn.</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td align="center" style="padding-bottom: 10px;" valign="top">\r\n				<img alt="" src="/static/team/upload/images/2012/hop_tac_kinh_doanh/htkd3.jpg" style="width: 159px; height: 114px;" /></td>\r\n			<td align="center" style="padding-bottom: 10px;">\r\n				<img alt="" src="/static/team/upload/images/2012/hop_tac_kinh_doanh/htkd4.jpg" style="width: 159px; height: 114px;" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td align="left" style="padding-right: 10px; padding-bottom: 10px;" valign="top">\r\n				<span style="text-align: center; font-weight: bold;">Chương tr&igrave;nh marketing hiệu quả.</span><br />\r\n				<div align="justify">\r\n					Với deal hấp dẫn của m&igrave;nh, bạn sẽ được Yeugiare.com quảng b&aacute; đến h&agrave;ng triệu kh&aacute;ch h&agrave;ng.&nbsp; Sản phẩm &ndash; dịch vụ của bạn nhanh ch&oacute;ng được biết đến v&agrave; được truyền b&aacute; trong cộng đồng.</div>\r\n			</td>\r\n			<td align="left" style="padding-left: 10px;" valign="top">\r\n				<span style="text-align: center; font-weight: bold;">Kh&ocirc;ng rủi ro, kh&ocirc;ng chi ph&iacute; trả trước</span><br />\r\n				<div align="justify">\r\n					Bạn sẽ được đảm bảo về hiệu quả kinh doanh v&agrave; kết quả marketing. Bạn kh&ocirc;ng tốn chi ph&iacute; trả trước, kh&ocirc;ng tốn nh&acirc;n sự, nguồn lực marketing. Yeugiare.com sẽ thực hiện tất cả cho bạn!</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td align="center" colspan="2" style="padding-bottom: 10px; padding-top: 5px; font-weight: bold;" valign="top">\r\n				BAN CHỈ CẦN CUNG CẤP CHO YEUGIARE VOUCHER SỬ DỤNG SẢN PHẨM &ndash; DỊCH VỤ VỚI GI&Aacute; GỐC.<br />\r\n				YEUGIARE SẼ L&Agrave;M TẤT CẢ V&Agrave; MANG LẠI HIỆU QUẢ KINH DOANH &ndash; MARKETING CHO BẠN!</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	NẾU BẠN C&Oacute; NHU CẦU XIN <a href="/thong-tin-doanh-nghiep.html">BẤM V&Agrave;O Đ&Acirc;Y</a> ĐỂ LẠI TH&Ocirc;NG TIN CHUNG T&Ocirc;I SẼ LI&Ecirc;N LẠC VỚI BẠN TRONG THỜI GIAN SỚM NHẤT</p>'),
('help_api', ''),
('about_job', '<p>\r\n	Hiện nay ch&uacute;ng t&ocirc;i c&oacute; nhu cầu tuyển dụng nếu bạn th&iacute;ch Y&ecirc;uGi&aacute;Rẻ.com xin li&ecirc;n hệ:</p>\r\n<p>\r\n	<strong>SHOP ĐỒ KỸ THUẬT SỐ PHUKIENLA.COM</strong><br />\r\n	113A L&yacute; Văn L&acirc;m, Kh&oacute;m 5, Phường 1, Th&agrave;nh phố C&agrave; Mau<br />\r\n	Website: phukienla.com - Email: hoangthikd@gmail.com<br />\r\n	Đi&ecirc;n thoại 0944.303.422 - YM: hoangthikd</p>\r\n<p>\r\n	&nbsp;</p>'),
('about_terms', '<p>\r\n	Ch&agrave;o mừng bạn đến với <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> !<br />\r\n	Khi truy cập v&agrave;o <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong>, đăng k&yacute; t&agrave;i khoản v&agrave; sử dụng dịch vụ của ch&uacute;ng t&ocirc;i, nghĩa l&agrave; bạn đ&atilde; đồng &yacute; tu&acirc;n thủ v&agrave; r&agrave;ng buộc bởi những quy định của <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> như sau:<br />\r\n	&nbsp;</p>\r\n<h2>\r\n	1. Quy định về t&agrave;i khoản:</h2>\r\n<br />\r\n<ul class="hkl-rules">\r\n	<li>\r\n		Tất cả những th&ocirc;ng tin li&ecirc;n quan đến t&agrave;i khoản của bạn tr&ecirc;n <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> y&ecirc;u cầu phải nhập trung thực, ch&iacute;nh x&aacute;c. Đ&oacute; l&agrave; những th&ocirc;ng tin gi&uacute;p cho <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> phục vụ bạn tốt nhất, ch&iacute;nh v&igrave; thế khi c&oacute; thay đổi về th&ocirc;ng tin của bạn, vui l&ograve;ng cập nhật lại trong t&agrave;i khoản tại <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong>. Trong trường hợp th&ocirc;ng tin do bạn cung cấp kh&ocirc;ng đầy đủ hoặc sai g&acirc;y kh&oacute; khăn cho việc giao h&agrave;ng, thanh to&aacute;n&hellip;, ch&uacute;ng t&ocirc;i c&oacute; quyền đ&igrave;nh chỉ hoặc từ chối phục vụ, giao h&agrave;ng m&agrave; kh&ocirc;ng phải chịu bất cứ tr&aacute;ch nhiệm n&agrave;o đối với bạn.</li>\r\n	<li>\r\n		Bạn phải giữ k&iacute;n mật khẩu v&agrave; t&agrave;i khoản, ho&agrave;n to&agrave;n chịu tr&aacute;ch nhiệm đối với tất cả c&aacute;c hoạt động diễn ra th&ocirc;ng qua việc sử dụng mật khẩu hoặc t&agrave;i khoản của m&igrave;nh. Bạn n&ecirc;n đảm bảo tho&aacute;t khỏi t&agrave;i khoản tại <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong>sau mỗi lần sử dụng để bảo mật th&ocirc;ng tin của m&igrave;nh.</li>\r\n</ul>\r\n<br />\r\n<h2>\r\n	2. Quy định mua h&agrave;ng:</h2>\r\n<br />\r\n<ul class="hkl-rules">\r\n	<li>\r\n		Mỗi deal được b&aacute;n ra tại <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> sẽ c&oacute; những quy định cụ thể về thời gian diễn ra deal, số lượng mua tối thiểu, c&aacute;c quy định sử dụng phiếu voucher... Bạn n&ecirc;n đọc kỹ để đảm bảo m&igrave;nh hiểu r&otilde; những điều n&agrave;y. Sau khi đ&atilde; đồng &yacute; mua h&agrave;ng, bạn kh&ocirc;ng được hủy giao dịch v&agrave; sẽ kh&ocirc;ng được ho&agrave;n lại tiền nếu voucher kh&ocirc;ng được sử dụng trong thời gian c&oacute; hiệu lực.</li>\r\n	<li>\r\n		Nếu c&oacute; bất kỳ khiếu nại về chất lượng của sản phẩm, dịch vụ, kh&aacute;ch h&agrave;ng vui l&ograve;ng thực hiện trong v&ograve;ng 05 ng&agrave;y kể từ ng&agrave;y hết hạn phiếu voucher, sau thời gian n&agrave;y <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> v&agrave; nh&agrave; cung cấp sẽ kh&ocirc;ng chịu tr&aacute;ch nhi&ecirc;m giải quyết bất kỳ khiếu nại n&agrave;o của kh&aacute;ch h&agrave;ng.</li>\r\n</ul>\r\n<br />\r\n<h2>\r\n	3. Tr&aacute;ch nhiệm v&agrave; quyền lợi của bạn:</h2>\r\n<br />\r\n<ul class="hkl-rules">\r\n	<li>\r\n		<strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> tuyệt đối nghi&ecirc;m cấm mọi h&igrave;nh thức x&acirc;m phạm, can thiệp (hoặc x&uacute;i giục can thiệp) bất hợp ph&aacute;p v&agrave;o hệ thống m&aacute;y chủ hay l&agrave;m thay đổi cấu tr&uacute;c cơ sở dữ liệu của website<strong> Y&ecirc;uGi&aacute;Rẻ.com</strong>. Nếu ph&aacute;t hiện lỗi tr&ecirc;n hệ thống của ch&uacute;ng t&ocirc;i, vui l&ograve;ng th&ocirc;ng b&aacute;o ngay về hotline: (848) 6282 2999 hoặc email: support@51deal.vn.</li>\r\n	<li>\r\n		Bạn kh&ocirc;ng được đưa ra những nhận x&eacute;t, đ&aacute;nh gi&aacute; c&oacute; &yacute; x&uacute;c phạm, g&acirc;y rối, nhằm hạ uy t&iacute;n, thương hiệu của c&aacute; nh&acirc;n hoặc doanh nghiệp kh&aacute;c. Kh&ocirc;ng n&ecirc;u ra những nhận x&eacute;t c&oacute; t&iacute;nh ch&iacute;nh trị (tuy&ecirc;n truyền, chống ph&aacute;, xuy&ecirc;n tạc ch&iacute;nh quyền&hellip;), kỳ thị t&ocirc;n gi&aacute;o, giới t&iacute;nh, sắc tộc.... Tuyệt đối cấm mọi h&agrave;nh vi mạo nhận, cố &yacute; tạo sự nhầm lẫn m&igrave;nh l&agrave; một kh&aacute;ch h&agrave;ng kh&aacute;c hoặc l&agrave; th&agrave;nh vi&ecirc;n Ban Quản Trị <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong>.</li>\r\n	<li>\r\n		<strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> tr&acirc;n trọng v&agrave; sẳn s&agrave;ng ghi nhận những &yacute; kiến, g&oacute;p &yacute; hoặc &yacute; tưởng để ph&aacute;t triển dịch vụ cũng như chất lượng phục vụ của tất cả kh&aacute;ch h&agrave;ng.</li>\r\n	<li>\r\n		<strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> đảm bảo những th&ocirc;ng tin bạn cung cấp sẽ chỉ được d&ugrave;ng để giao dịch giữa bạn v&agrave; 51deal.vn, đồng thời n&acirc;ng cao chất lượng dịch vụ kh&aacute;ch h&agrave;ng v&agrave; sẽ kh&ocirc;ng được chuyển giao cho b&ecirc;n thứ ba n&agrave;o kh&aacute;c v&igrave; mục đ&iacute;ch thương mại. Th&ocirc;ng tin của bạn tại<strong> Y&ecirc;uGi&aacute;Rẻ.com</strong> sẽ được ch&uacute;ng t&ocirc;i bảo mật v&agrave; chỉ buộc phải cung cấp những th&ocirc;ng tin n&agrave;y cho c&aacute;c cơ quan ph&aacute;p luật khi được y&ecirc;u cầu đ&uacute;ng với luật định.<br />\r\n		&nbsp;</li>\r\n</ul>\r\n<h2>\r\n	4. Tr&aacute;ch nhiệm v&agrave; quyền lợi của <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong>:</h2>\r\n<br />\r\n<ul class="hkl-rules">\r\n	<li>\r\n		Đảm bảo cung cấp những sản phẩm, dịch vụ đ&uacute;ng với những th&ocirc;ng tin ghi tr&ecirc;n website <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong>. C&aacute;c vấn đề về chất lượng sản phẩm, bảo h&agrave;nh, vận chuyển, hậu m&atilde;i sẽ do ph&iacute;a nh&agrave; cung cấp chịu tr&aacute;ch nhiệm.</li>\r\n	<li>\r\n		<strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> sẽ hỗ trợ th&ocirc;ng tin v&agrave; hỗ trợ giải quyết trong trường hợp ph&aacute;t sinh thắc mắc, khiếu nại. Nếu x&aacute;c định được lỗi do <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> hoặc nh&agrave; cung cấp, ch&uacute;ng t&ocirc;i sẽ ho&agrave;n tiền 100% cho bạn theo quy định ho&agrave;n tiền của <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong>. Trong trường hợp c&oacute; những ph&aacute;t sinh ngo&agrave;i &yacute; muốn hoặc kh&ocirc;ng thuộc quyền quản l&yacute;, 51deal.vn sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm về mọi tổn thất n&agrave;y.</li>\r\n	<li>\r\n		Khi chưa được sự đồng &yacute;, <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> nghi&ecirc;m cấm tất cả tổ chức, c&aacute;c nh&acirc;n quảng b&aacute; sản phẩm tr&ecirc;n 51deal.vn hoặc sử dụng những th&ocirc;ng tin tr&ecirc;n website 51deal.vn v&igrave; mục đ&iacute;ch c&aacute; nh&acirc;n.</li>\r\n	<li>\r\n		Nhằm đ&aacute;p ứng nhu cầu v&agrave; tạo điều kiện thuận lợi cho người ti&ecirc;u d&ugrave;ng, <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> c&oacute; quyền thay đổi nội dung deal, thời gian deal c&oacute; hiệu lực, số người mua tối thiểu, h&igrave;nh thức thanh to&aacute;n&hellip;.</li>\r\n	<li>\r\n		Tr&ecirc;n cơ sở xem x&eacute;t quyền lợi của c&aacute;c b&ecirc;n, <strong>Y&ecirc;uGi&aacute;Rẻ.com</strong> c&oacute; quyền thay đổi chỉnh sửa, bổ sung Điều khoản sử dụng n&agrave;y bất kỳ l&uacute;c n&agrave;o, v&agrave; c&oacute; hiệu lực ngay khi Điều khoản sử dụng mới được cập nhật.</li>\r\n</ul>'),
('about_privacy', '<p>\r\n	Y&ecirc;uGi&aacute;Rẻ t&ocirc;n trọng sự ri&ecirc;ng tư v&agrave; bảo mật c&aacute;c th&ocirc;ng tin c&aacute; nh&acirc;n của kh&aacute;ch h&agrave;ng v&agrave; người d&ugrave;ng viếng thăm trang web của Y&ecirc;uGi&aacute;Rẻ. Y&ecirc;uGi&aacute;Rẻ lu&ocirc;n cố gắng cung cấp cho c&aacute;c kh&aacute;ch h&agrave;ng nhưng trải nghiệm về dịch vụ mang dấu ấn c&aacute; nh&acirc;n h&oacute;a để thực sự đưa đến cho bạn những sản phẩm v&agrave; dịch vụ m&agrave; bạn cần. Để đạt được mục ti&ecirc;u n&agrave;y, Y&ecirc;uGi&aacute;Rẻ đ&ocirc;i khi cần thu thập th&ocirc;ng tin về kh&aacute;ch h&agrave;ng, về những người gh&eacute; thăm website của Y&ecirc;uGi&aacute;Rẻ. Y&ecirc;uGi&aacute;Rẻ sẽ kh&ocirc;ng tiết lộ th&ocirc;ng tin m&agrave; ch&uacute;ng t&ocirc;i thu thập được cho bất kỳ b&ecirc;n thứ ba n&agrave;o ngoại trừ c&aacute;c trường hợp được n&ecirc;u r&otilde; trong Ch&iacute;nh s&aacute;ch ri&ecirc;ng tư n&agrave;y. Ch&iacute;nh s&aacute;ch ri&ecirc;ng tư n&agrave;y kh&ocirc;ng c&oacute; &yacute; định v&agrave; kh&ocirc;ng tạo ra một hợp đồng hoặc c&aacute;c quyền lợi c&oacute; t&iacute;nh chất ph&aacute;p l&yacute; n&agrave;o cho bất kỳ một đối t&aacute;c thứ ba n&agrave;o.<br />\r\n	Ch&uacute;ng t&ocirc;i x&acirc;y dựng <strong>Ch&iacute;nh s&aacute;ch ri&ecirc;ng tư </strong>nhằm gi&uacute;p cho c&aacute;c kh&aacute;ch h&agrave;ng v&agrave; kh&aacute;ch viếng thăm hiểu rằng ch&uacute;ng t&ocirc;i thu thập những th&ocirc;ng tin g&igrave; v&agrave; bằng những c&aacute;ch n&agrave;o; ch&uacute;ng t&ocirc;i sử dụng được th&ocirc;ng tin thu thập được như thế n&agrave;o v&agrave; v&agrave;o l&uacute;c n&agrave;o; ch&uacute;ng t&ocirc;i bảo vệ th&ocirc;ng tin của bạn bằng những c&aacute;ch g&igrave;; ai c&oacute; thể tiếp cận những th&ocirc;ng tin đ&oacute; v&agrave; l&agrave;m thế n&agrave;o để bạn đ&iacute;nh ch&iacute;nh th&ocirc;ng tin nếu những th&ocirc;ng tin đ&oacute; kh&ocirc;ng ch&iacute;nh x&aacute;c.</p>\r\n<p>\r\n	<strong>TH&Ocirc;NG TIN CH&Uacute;NG T&Ocirc;I THU THẬP</strong>:<br />\r\n	Y&ecirc;uGi&aacute;Rẻ thu thập th&ocirc;ng tin về c&aacute;c kh&aacute;ch h&agrave;ng, người d&ugrave;ng viếng thăm website bằng ba c&aacute;ch: (i) nhật k&yacute; tr&ecirc;n m&aacute;y chủ của ch&uacute;ng t&ocirc;i, (ii) từ tập tin cookies v&agrave; (iii) trực tiếp từ người d&ugrave;ng.<br />\r\n	Nhật k&yacute; tr&ecirc;n m&aacute;y chủ: Khi bạn gh&eacute; thăm website của Y&ecirc;uGi&aacute;Rẻ, ch&uacute;ng t&ocirc;i c&oacute; thể thu thập một số th&ocirc;ng tin nhằm phục vụ cho việc quản trị website v&agrave; đ&aacute;nh gi&aacute; việc sử dụng website đ&oacute;. C&aacute;c th&ocirc;ng tin sẽ được thu thập như:</p>\r\n<ul>\r\n	<li>\r\n		Địa chỉ của bạn tr&ecirc;n Internet (địa chỉ IP).</li>\r\n	<li>\r\n		Loại tr&igrave;nh duyệt hoặc loại m&aacute;y t&iacute;nh m&agrave; bạn sử dụng để truy cập.</li>\r\n	<li>\r\n		Số li&ecirc;n kết/trang m&agrave; bạn đ&atilde; xem tr&ecirc;n website của ch&uacute;ng t&ocirc;i.</li>\r\n	<li>\r\n		Bạn truy cập đến website từ bang hoặc quốc gia n&agrave;o.</li>\r\n	<li>\r\n		Ng&agrave;y giờ bạn truy cập website.</li>\r\n	<li>\r\n		T&ecirc;n nh&agrave; cung cấp dịch vụ Internet của bạn.</li>\r\n	<li>\r\n		Địa chỉ/trang web m&agrave; bạn th&ocirc;ng qua đ&oacute; viếng thăm website của ch&uacute;ng t&ocirc;i.</li>\r\n</ul>\r\n<p>\r\n	<strong>COOKIES</strong> :<br />\r\n	Website của Y&ecirc;uGi&aacute;Rẻ sử dụng cookies (một tệp tin văn bản m&agrave; m&aacute;y chủ của ch&uacute;ng t&ocirc;i đặt tr&ecirc;n ổ cứng của bạn). Ch&uacute;ng t&ocirc;i sử dụng cookies để lưu c&aacute;c th&ocirc;ng tin đăng nhập, cấu h&igrave;nh t&agrave;i khoản của bạn tr&ecirc;n hệ thống của ch&uacute;ng t&ocirc;i, v&agrave; đồng thời cung cấp c&aacute;c tiện &iacute;ch c&aacute; nh&acirc;n h&oacute;a kh&aacute;c. Bạn c&oacute; thể từ chối sử dụng cookies bằng c&aacute;ch thiết lập lại tr&igrave;nh duyệt, nhưng điều đ&oacute; c&oacute; thể khiến bạn kh&ocirc;ng sử dụng được một số t&iacute;nh năng tr&ecirc;n website của Y&ecirc;uGi&aacute;Rẻ.<br />\r\n	Th&ocirc;ng tin c&aacute; nh&acirc;n m&agrave; bạn cung cấp cho ch&uacute;ng t&ocirc;i: Tr&ecirc;n website của ch&uacute;ng t&ocirc;i, bạn c&oacute; thể đăng k&yacute; để đặt mua c&aacute;c sản phẩm v&agrave; dịch vụ, chia sẻ c&aacute;c th&ocirc;ng tin c&aacute; nh&acirc;n v&agrave; tham gia c&aacute;c cuộc điều tra. Khi bạn đăng k&yacute;, ch&uacute;ng t&ocirc;i c&oacute; thể y&ecirc;u cầu bạn cung cấp một số th&ocirc;ng tin c&aacute; nh&acirc;n. Nếu bạn đặt mua sản phẩm/dịch vụ, ch&uacute;ng t&ocirc;i c&oacute; thể y&ecirc;u cầu bạn cung cấp th&ocirc;ng tin li&ecirc;n quan đến t&agrave;i ch&iacute;nh như m&atilde; số thẻ t&iacute;n dụng, th&ocirc;ng tin t&agrave;i khoản ng&acirc;n h&agrave;ng. Mọi th&ocirc;ng tin t&agrave;i ch&iacute;nh đ&oacute; chỉ nhằm mục đ&iacute;ch thanh to&aacute;n ph&iacute; cho c&aacute;c sản phẩm/dịch vụ m&agrave; bạn đặt mua. Nếu l&agrave; thẻ t&iacute;n dụng, th&ocirc;ng tin đ&oacute; c&oacute; thể được chuyển tiếp qua nh&agrave; cung cấp dịch vụ thẻ t&iacute;n dụng của bạn. Đối với c&aacute;c loại h&igrave;nh đăng k&yacute; kh&aacute;c, ch&uacute;ng t&ocirc;i c&oacute; thể y&ecirc;u cầu bạn cung cấp th&ocirc;ng tin: t&ecirc;n, địa chỉ, địa chỉ email hoặc số điện thoại. Ch&uacute;ng t&ocirc;i c&oacute; thể li&ecirc;n hệ với bạn bằng c&aacute;c th&ocirc;ng tin đ&oacute; khi c&oacute; c&aacute;c vấn đề về sản phẩm/dịch vụ do ch&uacute;ng t&ocirc;i cung cấp.<br />\r\n	Với mục đ&iacute;ch bảo mật v&agrave; bảo vệ t&iacute;nh to&agrave;n vẹn th&ocirc;ng tin đồng thời đảm bảo t&iacute;nh th&ocirc;ng suốt của hệ thống mạng, Y&ecirc;uGi&aacute;Rẻ c&oacute; thể sử dụng c&aacute;c phần mềm theo d&otilde;i lưu lượng sử dụng của website, x&aacute;c định c&aacute;c h&agrave;nh động cung cấp, thay đổi th&ocirc;ng tin tr&aacute;i ph&eacute;p hoặc sự mất m&aacute;t th&ocirc;ng tin, dữ liệu. C&aacute;c phần mềm đ&oacute; c&oacute; thể thu thập một số th&ocirc;ng tin li&ecirc;n quan đến qu&aacute; tr&igrave;nh sử dụng website v&agrave; mạng của người d&ugrave;ng.</p>\r\n<p>\r\n	<strong>LI&Ecirc;N KẾT ĐẾN WEBSITE KH&Aacute;C</strong>:<br />\r\n	Tr&ecirc;n website của Y&ecirc;uGi&aacute;Rẻ c&oacute; đặt li&ecirc;n kết đến một số website kh&ocirc;ng thuộc quyền quản l&yacute; của Y&ecirc;uGi&aacute;Rẻ. Ch&uacute;ng t&ocirc;i kh&ocirc;ng chịu tr&aacute;ch nhiệm về c&aacute;c th&ocirc;ng tin được c&ocirc;ng bố v&agrave; c&aacute;c th&ocirc;ng tin được thu thập tr&ecirc;n c&aacute;c website đ&oacute;. Ch&uacute;ng t&ocirc;i khuyến c&aacute;o bạn n&ecirc;n đọc kỹ c&aacute;c điều khoản li&ecirc;n quan ch&iacute;nh s&aacute;ch ri&ecirc;ng tư tr&ecirc;n từng website.</p>\r\n<p>\r\n	<strong>L&Agrave;M THẾ N&Agrave;O ĐỂ Đ&Iacute;NH CH&Iacute;NH TH&Ocirc;NG TIN ĐƯỢC THU THẬP THIẾU CH&Iacute;NH X&Aacute;C</strong>:<br />\r\n	Nếu bạn đ&atilde; đăng k&yacute; l&agrave; th&agrave;nh vi&ecirc;n tr&ecirc;n hệ thống của Y&ecirc;uGi&aacute;Rẻ. Bạn c&oacute; thể cập nhật v&agrave; thay đổi th&ocirc;ng tin c&aacute; nh&acirc;n tại địa chỉ: http://Y&ecirc;uGi&aacute;Rẻ.com. Ngo&agrave;i ra bạn c&oacute; thể li&ecirc;n hệ theo địa chỉ email: support@Y&ecirc;uGi&aacute;Rẻ.com</p>\r\n<p>\r\n	<strong>THAY ĐỔI NỘI DUNG CH&Iacute;NH S&Aacute;CH RI&Ecirc;NG TƯ</strong>:<br />\r\n	Y&ecirc;uGi&aacute;Rẻ c&oacute; thể thay đổi, sửa đổi, bổ sung hoặc thay thế nội dung của Ch&iacute;nh s&aacute;ch ri&ecirc;ng tư bất cứ khi n&agrave;o nhằm ph&ugrave; hợp với quy định của ph&aacute;p luật nước Cộng h&ograve;a x&atilde; hội chủ nghĩa Việt Nam. Mọi thay đổi c&oacute; hiệu lực kể từ khi được c&ocirc;ng bố tr&ecirc;n website của Y&ecirc;uGi&aacute;Rẻ.</p>\r\n<p>\r\n	<strong>GIẢI Đ&Aacute;P V&Agrave; THẮC MẮC</strong><br />\r\n	Mọi thắc mắc, c&aacute;c bạn vui l&ograve;ng li&ecirc;n hệ địa chỉ email: support@Y&ecirc;uGi&aacute;Rẻ.com</p>'),
('help_faqs', '<table id="hoidap" style="border-bottom: #666 2px dotted; margin-bottom:30px;">\r\n	<tbody>\r\n		<tr>\r\n			<th>\r\n				Y&ecirc;uGi&aacute;Rẻ.com l&agrave; g&igrave;?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Mỗi ng&agrave;y, ch&uacute;ng t&ocirc;i sẽ đưa l&ecirc;n một sản phẩm &ndash; dịch vụ được khuyến m&atilde;i với gi&aacute; đặc biệt hấp dẫn m&agrave; chỉ với điều kiện l&agrave; hội đủ số lượng người mua tối thiểu trong thời gian nhất định (1-5 ng&agrave;y). Do b&igrave;nh thường bạn kh&ocirc;ng thể c&oacute; được mức giảm gi&aacute; cao như thế n&agrave;y, n&ecirc;n dịch vụ n&agrave;y được gọi l&agrave; Y&ecirc;uGi&aacute;Rẻ.com.</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				C&oacute; bắt buộc t&ocirc;i phải mời bạn b&egrave; tham gia mua c&ugrave;ng th&igrave; mới được gi&aacute; khuyến m&atilde;i n&agrave;y?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Kh&ocirc;ng bắt buộc bạn phải mời bạn b&egrave; th&igrave; mới được mua voucher. Với số lượng kh&aacute;ch h&agrave;ng đ&ocirc;ng đảo của ch&uacute;ng t&ocirc;i, c&ugrave;ng mạng lưới quảng c&aacute;o rộng khắp, sẽ c&oacute; rất nhiều kh&aacute;ch h&agrave;ng biết đến th&ocirc;ng tin n&agrave;y. Tuy nhi&ecirc;n, bạn n&ecirc;n chia sẻ th&ocirc;ng tin n&agrave;y để bạn b&egrave; cũng được hưởng ưu đ&atilde;i, đồng thời cơ hội deal th&agrave;nh c&ocirc;ng c&agrave;ng cao hơn nữa.</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				C&aacute;ch thức mua phiếu voucher đang b&aacute;n như thế n&agrave;o?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Bạn chỉ cần click chuột v&agrave;o n&uacute;t &quot;Mua&quot; trước khi thời gian b&aacute;n kết th&uacute;c v&agrave; l&agrave;m theo hướng dẫn. Nếu c&oacute; đủ lượng người đăng k&yacute; mua th&igrave; khuyến m&atilde;i đ&oacute; th&agrave;nh c&ocirc;ng v&agrave; Y&ecirc;uGi&aacute;Rẻ.com sẽ li&ecirc;n hệ để x&aacute;c nhận địa chỉ v&agrave; thời gian giao phiếu cho bạn. Chỉ khi nhận phiếu th&igrave; bạn mới phải trả tiền.</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				Điều g&igrave; xảy ra nếu giao dịch kh&ocirc;ng đạt đến ngưỡng tối thiểu người tham gia?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Nếu kh&ocirc;ng đủ người đăng k&yacute; mua, th&igrave; khuyến m&atilde;i sẽ được hủy bỏ, v&agrave; bạn kh&ocirc;ng phải trả chi ph&iacute; g&igrave; cả. Nếu bạn muốn c&oacute; khuyến m&atilde;i gi&aacute; tốt n&agrave;y, tốt nhất l&agrave; h&atilde;y rủ bạn b&egrave;, người th&acirc;n c&ugrave;ng tham gia.</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				C&aacute;ch thức thanh to&aacute;n v&agrave; giao phiếu cho t&ocirc;i như thế n&agrave;o?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Y&ecirc;uGi&aacute;Rẻ sẽ giao phiếu v&agrave; thu tiền tận nh&agrave; cho bạn trong nội &ocirc; th&agrave;nh phố C&agrave; Mau. Trước khi đến, nh&acirc;n vi&ecirc;n giao h&agrave;ng sẽ li&ecirc;n hệ với bạn.</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				Nếu đổi &yacute;, t&ocirc;i c&oacute; được hủy việc đăng k&yacute; mua kh&ocirc;ng?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Bạn c&oacute; thể hủy lệnh mua trong thời gian chờ giao phiếu.</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				Sau bao l&acirc;u th&igrave; t&ocirc;i nhận được phiếu đ&atilde; đăng k&yacute; mua?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Ngay khi đạt số lượng người mua tối thiểu, Y&ecirc;uGi&aacute;Rẻ.com sẽ tiến h&agrave;nh x&aacute;c nhận trong v&ograve;ng 48 tiếng (kh&ocirc;ng kể chiều thứ bảy &amp; chủ nhật) v&agrave; tiến h&agrave;nh giao phiếu ngay cho bạn trong v&ograve;ng 72 tiếng kế tiếp.</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				T&ocirc;i đ&atilde; mua phiếu voucher của HotDeal. T&ocirc;i sẽ sử dụng phiếu như thế n&agrave;o?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Sau khi nhận được phiếu voucher, bạn c&oacute; thể sử dụng ngay tại nơi cung cấp sản phẩm &ndash; dịch vụ khuyến m&atilde;i. Bạn nhớ mang theo voucher v&agrave; đọc kỹ c&aacute;c điều khoản sử dụng ghi tr&ecirc;n phiếu nh&eacute;. Phiếu hợp lệ c&oacute; dấu nổi v&agrave; chữ k&yacute; bạn nh&eacute;!</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				Thời gian sử dụng phiếu như thế n&agrave;o?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Th&ocirc;ng thường, phiếu voucher c&oacute; gi&aacute; trị sử dụng từ 1 &ndash; 3 th&aacute;ng t&ugrave;y theo chương tr&igrave;nh. Bạn nhớ lưu &yacute; sử dụng trước khi hết hạn. C&oacute; một số điểm b&aacute;n kh&ocirc;ng &aacute;p dụng phiếu cho c&aacute;c ng&agrave;y lễ, n&ecirc;n bạn nhớ xem kỹ trước khi sử dụng nh&eacute;!</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				T&ocirc;i c&oacute; được trả lại tiền dư nếu kh&ocirc;ng sử dụng hết gi&aacute; trị của phiếu?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Phiếu chỉ c&oacute; gi&aacute; trị sử dụng cho 1 lần thanh to&aacute;n v&agrave; kh&ocirc;ng trả lại tiền dư nếu bạn kh&ocirc;ng d&ugrave;ng hết gi&aacute; trị sử dụng.</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				Nếu điểm b&aacute;n đang c&oacute; chương tr&igrave;nh khuyến m&atilde;i giảm gi&aacute; kh&aacute;c, t&ocirc;i c&oacute; được cộng dồn phần khuyến m&atilde;i n&agrave;y kh&ocirc;ng?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Phiếu khuyến m&atilde;i của Y&ecirc;uGi&aacute;Rẻ.com kh&ocirc;ng được d&ugrave;ng chung với c&aacute;c chương tr&igrave;nh ưu đ&atilde;i hay giảm gi&aacute; kh&aacute;c. Nếu c&oacute; trường hợp đặc biệt sẽ c&oacute; ghi ch&uacute; tr&ecirc;n phiếu.</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				Chất lượng sản phẩm &ndash; dịch vụ c&oacute; k&eacute;m hơn khi t&ocirc;i d&ugrave;ng phiếu Y&ecirc;uGi&aacute;Rẻ?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Tất cả c&aacute;c đối t&aacute;c cung cấp sản phẩm &ndash; dịch vụ đ&atilde; đươc chọn lọc v&agrave; c&oacute; cam kết với Y&ecirc;uGi&aacute;Rẻ.com để phục vụ c&aacute;c sản phẩm &ndash; dịch vụ đạt chuẩn. Bạn cứ y&ecirc;n t&acirc;m nh&eacute;! Nếu c&oacute; điều g&igrave; kh&ocirc;ng h&agrave;i l&ograve;ng, bạn h&atilde;y phản hồi cho Y&ecirc;uGi&aacute;Rẻ.com ngay tại tổng đ&agrave;i 0944.303.422 &ndash; email: sales@yeugiare.com</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				Nếu t&ocirc;i kh&ocirc;ng h&agrave;i l&ograve;ng với sản phẩm &ndash; dịch vụ của người b&aacute;n, t&ocirc;i c&oacute; được trả lại phiếu kh&ocirc;ng?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Y&ecirc;uGi&aacute;Rẻ.com lu&ocirc;n đặt lợi &iacute;ch của kh&aacute;ch h&agrave;ng l&ecirc;n tr&ecirc;n hết. Do đ&oacute;, nếu bạn c&oacute; điều g&igrave; kh&ocirc;ng h&agrave;i l&ograve;ng, xin h&atilde;y phản &aacute;nh với Y&ecirc;uGi&aacute;Rẻ.com. Ch&uacute;ng t&ocirc;i sẽ ho&agrave;n trả tiền cho bạn nếu bạn kh&ocirc;ng sử dụng được phiếu do lỗi của Y&ecirc;uGi&aacute;Rẻ.com hoặc đối t&aacute;c cung cấp.</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				Trong trường hợp t&ocirc;i l&agrave;m mất voucher đ&atilde; mua từ Y&ecirc;uGi&aacute;Rẻ, Y&ecirc;uGi&aacute;Rẻ c&oacute; giải quyết cấp cho t&ocirc;i voucher mới kh&ocirc;ng?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Trong trường hợp mất voucher, th&igrave; Y&ecirc;uGi&aacute;Rẻ.com kh&ocirc;ng thể hỗ trợ cấp lại v&igrave; Y&ecirc;uGi&aacute;Rẻ.com kh&ocirc;ng thể đối so&aacute;t, kiểm chứng việc mất m&aacute;t t&agrave;i sản c&aacute; nh&acirc;n của Kh&aacute;ch H&agrave;ng. Việc voucher đ&atilde; chuyển quyền sở hữu từ Y&ecirc;uGi&aacute;Rẻ.com sang cho Kh&aacute;ch H&agrave;ng (thể hiện ở việc k&yacute; t&ecirc;n nhận voucher từ nh&acirc;n vi&ecirc;n giao h&agrave;ng) th&igrave; Kh&aacute;ch H&agrave;ng l&agrave; người bảo vệ vật sở hữu (voucher) của m&igrave;nh &amp; ho&agrave;n to&agrave;n chịu tr&aacute;ch nhiệm đối với việc mất m&aacute;t t&agrave;i sản của c&aacute; nh&acirc;n..</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				Nếu t&ocirc;i muốn hợp t&aacute;c cung cấp c&aacute;c phiếu giảm gi&aacute; n&agrave;y cho Y&ecirc;uGi&aacute;Rẻ.com th&igrave; phải l&agrave;m sao?</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				Bạn xem th&ocirc;ng tin về việc hợp t&aacute;c tại đ&acirc;y v&agrave; li&ecirc;n hệ với Y&ecirc;uGi&aacute;Rẻ.com theo th&ocirc;ng tin trong mục vừa đ&ecirc; cập. Nh&acirc;n vi&ecirc;n kinh doanh của ch&uacute;ng t&ocirc;i sẽ tư vấn v&agrave; gi&uacute;p bạn c&oacute; deal tốt nhất v&agrave; đạt hiệu quả cao nhất tại Y&ecirc;uGi&aacute;Rẻ.com.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<table id="lienhe">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				LI&Ecirc;N HỆ</td>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				<strong>SHOP KỸ THUẬT SỐ PHUKIENLA.COM</strong></th>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				113A L&yacute; Văn L&acirc;m, Phường 1, TP C&agrave; Mau</th>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				Phone: 0944303422</th>\r\n		</tr>\r\n		<tr>\r\n			<th>\r\n				Email: hoangthikd@gmail.com</th>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `homepage` varchar(128) DEFAULT NULL,
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `bank_name` varchar(128) DEFAULT NULL,
  `bank_no` varchar(128) DEFAULT NULL,
  `bank_user` varchar(128) DEFAULT NULL,
  `location` text NOT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `image1` varchar(128) DEFAULT NULL,
  `image2` varchar(128) DEFAULT NULL,
  `phone` varchar(18) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `other` text,
  `mobile` varchar(12) DEFAULT NULL,
  `open` enum('Y','N') NOT NULL DEFAULT 'N',
  `enable` enum('Y','N') NOT NULL DEFAULT 'Y',
  `head` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `longlat` varchar(255) DEFAULT NULL,
  `display` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_ct` (`city_id`,`title`),
  UNIQUE KEY `UNQ_u` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE IF NOT EXISTS `pay` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `bank` varchar(32) DEFAULT NULL,
  `money` double(10,2) DEFAULT NULL,
  `currency` enum('CNY','USD') NOT NULL DEFAULT 'CNY',
  `service` varchar(16) NOT NULL DEFAULT 'alipay',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_o` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(15) unsigned NOT NULL DEFAULT '0',
  `bank_number` int(20) unsigned NOT NULL DEFAULT '0',
  `bank_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sender` varchar(100) DEFAULT NULL,
  `comment` text,
  `create_time` int(11) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '1 - chua xu li/ 2 - da xu li',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `product` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(350) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sortimg` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smssubscribe`
--

CREATE TABLE IF NOT EXISTS `smssubscribe` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mobile` varchar(18) DEFAULT NULL,
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `secret` char(6) DEFAULT NULL,
  `enable` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_e` (`mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) DEFAULT NULL,
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `secret` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_e` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `id` enum('1') NOT NULL DEFAULT '1',
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `value`) VALUES
('1', 'eyJkYiI6eyJob3N0IjoibG9jYWxob3N0IiwidXNlciI6InRpZXhpbSIsInBhc3MiOiIwODAzMTk4NCIsIm5hbWUiOiJ0aWV4aW1fc2ltIn0sIm1lbWNhY2hlIjpudWxsLCJ3ZWJyb290IjoiIiwic3lzdGVtIjp7ImNvbXBhbnluYW1lIjoiSFQgREVBTCAxLjAiLCJhZGRyZXNzIjoiMTI4XC8xNiBUclx1MWVhN24gUXVcdTFlZDFjIFRoXHUxZWEzbywgUGhcdTAxYjBcdTFlZGRuZyA3LCBRdVx1MWVhZG4gMywgVFAuIGhcdTFlZDMgQ2hcdTAwZWQgTWluaCIsInRlbCI6IjA5NDQuMzAzLjQyMiIsImhvdGxpbmUiOiIwOTQ0LjMwMy40MjIiLCJmYXgiOiIiLCJlbWFpbCI6ImhvYW5ndGhpa2RAZ21haWwuY29tIiwic2l0ZW5hbWUiOiJIVERlYWwudm4iLCJzaXRldGl0bGUiOiJHaVx1MDBlMSByXHUxZWJiIG1cdTFlZDdpIG5nXHUwMGUweSIsImFiYnJldmlhdGlvbiI6IkhURGVhbC52biIsImNvdXBvbm5hbWUiOiJDb3Vwb24iLCJjdXJyZW5jeSI6IlZOXHUwMTEwIiwiY3VycmVuY3luYW1lIjoiVk5cdTAxMTAiLCJpbnZpdGVjcmVkaXQiOiIwIiwic2lkZXRlYW0iOiIyMCIsInJlY2VudHRlYW0iOiIyMSIsIm1haW50ZWFtIjoiMjIiLCJuZXdzaXRlbSI6IjEwIiwiYWRzX2xlZnQiOiIwIiwiYWRzX3JpZ2h0IjoiMCIsInNsaWRlcl93aWR0aCI6IjEzMCIsInNsaWRlcl9oZWlnaHQiOiI1NTAiLCJ0d2l0dGVyIjoiIiwiZmFjZWJvb2siOiJodHRwOlwvXC9mYWNlYm9vay5jb21cL3lldWdpYXJlY29tIiwieW91dHViZSI6Imh0dHA6XC9cL3lvdXR1YmUuY29tXC95ZXVnaWFyZWNvbSIsImdvb2dsZXBsdXMiOiJodHRwOlwvXC9nb29nbGVwbHVzLmNvbVwveWV1Z2lhcmVjb20iLCJ6aW5nbWUiOiIiLCJsb2dvdXJsIjoibG9nby5wbmciLCJiZ2NvbG9yIjoiIiwiYmd1cmwiOiIiLCJjb25kdXNlciI6MSwicGFydG5lcmRvd24iOjEsImd6aXAiOjEsInltMSI6ImhvYW5ndGhpa2QiLCJ5bTIiOiJob2FuZ3RoaWtkIiwic2sxIjoiaG9hbmd0aGlrZCIsInNrMiI6ImhvYW5ndGhpa2QiLCJtYjEiOiIwOTQ0LjMwMy40MjIiLCJtYjIiOiIwOTQ0LjMwMy40MjIiLCJpY3AiOiIiLCJzdGF0Y29kZSI6IiIsInNpbmFqaXdhaSI6IiIsInRlbmNlbnRqaXdhaSI6IiIsImdhIjoiIiwiZ29vZ2xlbWFwIjoiQUl6YVN5Q216YUl6WW1fUVNvamdLd0g5X0JHLUVSMndmOVgwbTJjIiwiZ216b29tIjoiMTUiLCJ3d3dwcmVmaXgiOiJodHRwOlwvXC9kZWFsLnRpZXhpbS5jb20udm4iLCJpbWdwcmVmaXgiOiJodHRwOlwvXC9kZWFsLnRpZXhpbS5jb20udm4ifSwiYnVsbGV0aW4iOnsiMCI6IiIsIjciOiIifSwiYWxpcGF5IjpudWxsLCJ0ZW5wYXkiOm51bGwsImJpbGwiOm51bGwsImNoaW5hYmFuayI6bnVsbCwicGFnc2VndXJvIjp7Im1pZCI6IjIzMjNzZGFzZGFzIiwiYWNjIjoiYXRlbmRpbWVudG9Ac3NzLmNvbS5iciJ9LCJwYXlwYWwiOnsiYmFva2ltX2VtYWlsIjoiaG9hbmd0aGlrZEBnbWFpbC5jb20iLCJuZ2FubHVvbmdfZW1haWwiOiJ5ZXVnaWFyZUBnbWFpbC5jb20iLCJtaWQiOiJob2FuZ3RoaWtkQHlhaG9vLmNvbSIsImxvYyI6IlZOIn0sInllZXBheSI6bnVsbCwib3RoZXIiOnsicGhpIjoiMCIsInBheSI6IiJ9LCJvcHRpb24iOnsibmdhbmx1b25nIjoiTiIsImJhb2tpbSI6IlkiLCJhdG10cmFuc2ZlciI6IlkiLCJhdG9mZmljZSI6IlkiLCJhdGhvbWUiOiJZIiwibmF2aG9tZWRlYWwiOiJZIiwibmF2cmVjZW50ZGVhbCI6IlkiLCJuYXZuZXdzIjoiWSIsIm5hdmdzYWxlIjoiWSIsIm5hdmZvcnVtIjoiWSIsIm5hdmZlZWRiYWNrIjoiWSIsIm5vdGlmeV9jYXRlIjoiMjgiLCJuZXdzX2NhdGUiOiIiLCJwcm9tb3Rpb25fY2F0ZSI6IiIsImRpc3BsYXlmYWlsdXJlIjoiWSIsInRlYW1hc2siOiJZIiwiZmJjb21tZW50IjoiTiIsInNtc3N1YnNjcmliZSI6Ik4iLCJtb25leXNhdmUiOiJZIiwidGVhbXdob2xlIjoiWSIsImVuY29kZWlkIjoiWSIsInVzZXJwcml2YWN5IjoiWSIsInVzZXJjcmVkaXQiOiJOIiwiY2F0ZXRlYW0iOiJZIiwiY2F0ZXRlYW1fY3VyIjoiWSIsImVtYWlsdmVyaWZ5IjoiWSIsIm5lZWRtb2JpbGUiOiJOIn0sIm1haWwiOnsibWFpbCI6InNtdHAiLCJob3N0Ijoic210cC5nbWFpbC5jb20iLCJwb3J0IjoiNDY1Iiwic3NsIjoic3NsIiwidXNlciI6InlldWdpYXJlQGdtYWlsLmNvbSIsInBhc3MiOiIwODAzMTk4NCIsImZyb20iOiJzYWxlc0B5ZXVnaWFyZS5jb20iLCJyZXBseSI6InNhbGVzQHlldWdpYXJlLmNvbSIsImVuY29kaW5nIjoiVVRGLTgiLCJpbnRlcnZhbCI6IjIiLCJoZWxwcGhvbmUiOiIiLCJoZWxwZW1haWwiOiIifSwic21zIjpudWxsLCJjcmVkaXQiOnsicmVnaXN0ZXIiOjAsImxvZ2luIjowLCJpbnZpdGUiOjIwMDAsImJ1eSI6MCwicGF5IjowLCJjaGFyZ2UiOjB9LCJza2luIjp7InRlbXBsYXRlIjoiaHRkZWFsIiwidGhlbWUiOiJkZWZhdWx0In0sImF1dGhvcml6YXRpb24iOnsiMSI6WyJ0ZWFtIiwiaGVscCIsIm9yZGVyIiwibWFya2V0IiwiYWRtaW4iXSwiNiI6WyJ0ZWFtIiwiaGVscCIsIm9yZGVyIiwibWFya2V0IiwiYWRtaW4iXSwiMiI6WyJ0ZWFtIiwiaGVscCIsIm9yZGVyIiwibWFya2V0IiwiYWRtaW4iXX19');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(256) DEFAULT NULL,
  `summary` text,
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `partner_id` int(10) unsigned NOT NULL DEFAULT '0',
  `system` enum('Y','N') NOT NULL DEFAULT 'Y',
  `team_price` double(10,0) NOT NULL DEFAULT '0',
  `market_price` double(10,0) NOT NULL DEFAULT '0',
  `product` varchar(128) DEFAULT NULL,
  `condbuy` varchar(255) DEFAULT NULL,
  `per_number` int(10) unsigned NOT NULL DEFAULT '1',
  `min_number` int(10) unsigned NOT NULL DEFAULT '1',
  `max_number` int(10) unsigned NOT NULL DEFAULT '0',
  `now_number` int(10) unsigned NOT NULL DEFAULT '0',
  `pre_number` int(10) unsigned NOT NULL DEFAULT '0',
  `image` varchar(128) DEFAULT NULL,
  `image1` varchar(128) DEFAULT NULL,
  `image2` varchar(128) DEFAULT NULL,
  `flv` varchar(128) DEFAULT NULL,
  `mobile` varchar(16) DEFAULT NULL,
  `credit` int(10) unsigned NOT NULL DEFAULT '0',
  `card` int(10) unsigned NOT NULL DEFAULT '0',
  `fare` int(10) unsigned NOT NULL DEFAULT '0',
  `farefree` int(11) NOT NULL DEFAULT '0',
  `bonus` int(11) NOT NULL DEFAULT '0',
  `address` varchar(128) DEFAULT NULL,
  `detail` text,
  `systemreview` text,
  `userreview` text,
  `notice` text,
  `express` text,
  `delivery` enum('coupon','express','pickup') NOT NULL DEFAULT 'coupon',
  `state` enum('none','success','soldout','failure','refund') NOT NULL DEFAULT 'none',
  `conduser` enum('Y','N') NOT NULL DEFAULT 'Y',
  `buyonce` enum('Y','N') NOT NULL DEFAULT 'Y',
  `team_type` varchar(20) DEFAULT 'normal',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `expire_time` int(10) unsigned NOT NULL DEFAULT '0',
  `begin_time` int(10) unsigned NOT NULL DEFAULT '0',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0',
  `reach_time` int(10) unsigned NOT NULL DEFAULT '0',
  `close_time` int(10) unsigned NOT NULL DEFAULT '0',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_keyword` varchar(255) DEFAULT NULL,
  `seo_description` text,
  `image5` varchar(128) DEFAULT NULL COMMENT 'hinh voucher mat truoc',
  `image6` varchar(128) DEFAULT NULL COMMENT 'hinh voucher mat sau',
  `image3` varchar(128) DEFAULT NULL,
  `image4` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `user_id`, `title`, `summary`, `city_id`, `group_id`, `partner_id`, `system`, `team_price`, `market_price`, `product`, `condbuy`, `per_number`, `min_number`, `max_number`, `now_number`, `pre_number`, `image`, `image1`, `image2`, `flv`, `mobile`, `credit`, `card`, `fare`, `farefree`, `bonus`, `address`, `detail`, `systemreview`, `userreview`, `notice`, `express`, `delivery`, `state`, `conduser`, `buyonce`, `team_type`, `sort_order`, `expire_time`, `begin_time`, `end_time`, `reach_time`, `close_time`, `seo_title`, `seo_keyword`, `seo_description`, `image5`, `image6`, `image3`, `image4`) VALUES
(38, 1, 'Nhanh tay sở hữu Balô - Túi xách cực kỳ thời trang và tiện dụng giá chỉ 175.000đ cho giá gốc 250.000đ tại yeugiare.com', '<p>\r\n	- Ba l&ocirc; - t&uacute;i x&aacute;ch đa năng bằng chất liệu vải nylon(Poly) chắc chắn chống nước c&oacute; 2 quai c&oacute; thể điều chỉnh độ d&agrave;i ph&ugrave; hợp với nhu cầu sử dụng của mỗi người.</p>\r\n<p>\r\n	- C&oacute; thể đeo 1 b&ecirc;n vai,hay đeo ch&eacute;o qua vai hoặc l&agrave; đeo ph&iacute;a sau th&agrave;nh ba l&ocirc;.</p>\r\n<p>\r\n	- Ba l&ocirc; c&oacute; k&iacute;ch thước 54x27cm khi mở ra,c&ograve;n khi kh&ocirc;ng sử dụng c&oacute; thể xếp gọn lại cho v&agrave;o t&uacute;i vải k&egrave;m theo c&oacute; k&iacute;ch thước 16x16cm rất gọn g&agrave;ng v&agrave; lịch sự để mang theo b&ecirc;n m&igrave;nh.</p>', 0, 17, 43, 'Y', 175000, 250000, 'Balô - Túi xách thời trang tiện dụng', '', 0, 10, 50, 7, 2, 'team/2012/0331/13331275523571.jpg', 'team/2012/0331/13331275523462.jpg', 'team/2012/0331/13331275523599.jpg', '', '', 0, 0, 0, 0, 0, '', '<p style="text-align: center;">\r\n	Ba l&ocirc; - t&uacute;i x&aacute;ch đa năng bằng chất liệu vải nylon(Poly) chắc chắn chống nước c&oacute; 2 quai c&oacute; thể điều chỉnh độ d&agrave;i ph&ugrave; hợp với nhu cầu sử dụng của mỗi người.</p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/static/team/upload/images/2012/balo-tui-xach-thoi-trang/0001.jpg" style="width: 480px; height: 310px;" /></p>\r\n<p style="text-align: center;">\r\n	<br />\r\n	C&oacute; thể đeo 1 b&ecirc;n vai,hay đeo ch&eacute;o qua vai hoặc l&agrave; đeo ph&iacute;a sau th&agrave;nh ba l&ocirc;.</p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/static/team/upload/images/2012/balo-tui-xach-thoi-trang/0002.jpg" style="width: 480px; height: 260px;" /></p>\r\n<p style="text-align: center;">\r\n	<br />\r\n	Ba l&ocirc; c&oacute; k&iacute;ch thước 54x27cm khi mở ra,c&ograve;n khi kh&ocirc;ng sử dụng c&oacute; thể xếp gọn lại cho v&agrave;o t&uacute;i vải k&egrave;m theo c&oacute; k&iacute;ch thước 16x16cm rất gọn g&agrave;ng v&agrave; lịch sự để mang theo b&ecirc;n m&igrave;nh.</p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/static/team/upload/images/2012/balo-tui-xach-thoi-trang/0003.jpg" style="width: 480px; height: 412px;" /></p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/static/team/upload/images/2012/balo-tui-xach-thoi-trang/0004.jpg" style="width: 480px; height: 674px;" /></p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/static/team/upload/images/2012/balo-tui-xach-thoi-trang/0005.jpg" style="width: 480px; height: 423px;" /></p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/static/team/upload/images/2012/balo-tui-xach-thoi-trang/0006.jpg" style="width: 480px; height: 673px;" /></p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/static/team/upload/images/2012/balo-tui-xach-thoi-trang/0008.jpg" style="width: 544px; height: 450px;" /></p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/static/team/upload/images/2012/balo-tui-xach-thoi-trang/0009.jpg" style="width: 480px; height: 265px;" /></p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/static/team/upload/images/2012/balo-tui-xach-thoi-trang/0010.jpg" style="width: 480px; height: 265px;" /></p>\r\n<p style="text-align: center;">\r\n	<img alt="" src="/static/team/upload/images/2012/balo-tui-xach-thoi-trang/007.jpg" style="width: 480px; height: 264px;" /></p>\r\n<p style="text-align: center;">\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<span style="color:#ff0000;"><strong><span style="font-size: 14px;">Nhanh tay bấm MUA sở hữu sản phẩm thời trang n&agrave;y nha c&aacute;c bạn!</span></strong></span></p>', '', '', '<p>\r\n	- &Aacute;p dụng cho sản phẩm Bal&ocirc; - T&uacute;i x&aacute;ch thời trang.</p>\r\n<p>\r\n	- Kh&ocirc;ng giới hạn số lượng mua đối với mỗi kh&aacute;ch h&agrave;ng.</p>\r\n<p>\r\n	<span style="color: rgb(178, 34, 34);"><strong>- </strong></span><strong>Nhận h&agrave;ng tại C&agrave; Mau: 54A L&yacute; Thường Kiệt, phường 6</strong></p>\r\n<p>\r\n	<strong><span style="color: rgb(255, 0, 0);">- Vui l&ograve;ng li&ecirc;n hệ trước khi đến để ch&uacute;ng t&ocirc;i phục vụ bạn tốt hơn.</span></strong></p>\r\n<p>\r\n	<strong>- Ghi r&otilde; m&agrave;u sắc bạn chọn.</strong></p>', '', 'express', 'none', 'N', 'N', 'normal', 2, 1335805200, 1338397031, 1341161831, 0, 0, 'Balo - tui xach thoi trang va tien dung', 'Balo - tui xach thoi trang va tien dung', 'Balo - tui xach thoi trang va tien dung', NULL, NULL, 'team/2012/0331/13331275522334.jpg', 'team/2012/0331/13331275524152.jpg'),
(37, 1, 'Thiết bị báo động chống trộm thông minh, lắp đặt đơn giản, hiệu quả chính xác. Sản phẩm trị giá 79.000Đ chỉ còn 39.000Đ chỉ có tại yeugiare.com!', '<p>\r\n	<strong>- Thiết kế nhỏ gọn, dễ lắp đặt.</strong></p>\r\n<p>\r\n	<strong>- Sử dụng pin đồng hồ.</strong></p>\r\n<p>\r\n	<strong>- &Acirc;m thanh lớn l&ecirc;n tới 105db.</strong></p>\r\n<p>\r\n	<strong>- C&oacute; n&uacute;t On/Off t&iacute;ch hợp.</strong></p>\r\n<p>\r\n	<strong>- Sản phẩm đ&atilde; k&egrave;m 3 pin.</strong></p>', 0, 2, 41, 'Y', 39000, 79000, 'Thiết bị chống trộm thông minh', '', 0, 10, 0, 1, 0, 'team/2012/0327/13328517432321.jpg', 'team/2012/0327/13328517433719.jpg', 'team/2012/0327/13328517434590.jpg', '', '', 0, 0, 0, 0, 0, '', '<p>\r\n	<strong>Hiện nay t&igrave;nh h&igrave;nh an ninh trật tự, trộm cắp tr&ecirc;n nhiều địa b&agrave;n l&agrave; vấn đề kh&aacute; &ldquo;hot&rdquo; m&agrave; bạn c&oacute; thể nhận thấy mỗi ng&agrave;y</strong>. Trước t&igrave;nh h&igrave;nh đ&oacute; nhiều người đ&atilde; t&igrave;m mua v&agrave; lắp đặt cho gia đ&igrave;nh những hệ thống b&aacute;o động v&agrave; thiết bị chống trộm nhằm đề ph&ograve;ng, bảo vệ v&agrave; hạn chế tối đa việc trộm cắp t&agrave;i sản của bọn tội phạm.<br />\r\n	<br />\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<img alt="" src="/static/team/upload/images/2012/thiet-bi-chong-trom/01.jpg" style="width: 410px; height: 285px;" /><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<p>\r\n	Bạn sẽ kh&ocirc;ng c&ograve;n phải lo lắng về việc trộm cậy cửa, đột nhập v&agrave;o nh&agrave; m&igrave;nh từ cửa sổ hay cửa ch&iacute;nh với sản phẩm <strong>Thiết bị b&aacute;o động chống trộm cửa RL &ndash; 9805</strong> trong lượt Deal h&ocirc;m nay của yeugiare.com.<br />\r\n	<br />\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<img alt="" src="/static/team/upload/images/2012/thiet-bi-chong-trom/02.jpg" style="width: 410px; height: 285px;" /><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<p>\r\n	<strong>Thiết bị b&aacute;o động chống trộm cửa RL &ndash; 9805 hoạt động bằng 3 pin đồng hồ,</strong> gồm 2 bộ phận được đặt gần nhau, c&oacute; t&aacute;c dụng ph&aacute;t hiện ra kẻ gian mở cửa v&agrave; ph&aacute;t t&iacute;n hiệu b&aacute;o động. Với &acirc;m thanh l&ecirc;n đến 105db, rất lớn để đuổi trộm v&agrave; l&agrave;m bạn thức dậy ngay lập tức.</p>\r\n<br />\r\n<br />\r\n<br />\r\n<div align="center">\r\n	<img alt="" src="/static/team/upload/images/2012/thiet-bi-chong-trom/03.jpg" style="width: 410px; height: 285px;" /><br />\r\n	<br />\r\n	<br />\r\n	<img alt="" src="/static/team/upload/images/2012/thiet-bi-chong-trom/04.jpg" style="width: 410px; height: 285px;" /><br />\r\n	&nbsp;</div>\r\n<br />\r\n<p>\r\n	Thiết bị c&oacute; n&uacute;t gạt tắt mở On - Off. Sau khi đ&oacute;ng cửa, bạn gạt Switch l&ecirc;n tr&ecirc;n (ON), chống trộm gắn cửa RL &ndash; 9805 sẽ b&aacute;o động tai chỗ nếu cửa mở v&agrave; muốn tắt th&igrave; bạn gạt Swicth xuống (OFF) rồi mới mở cửa.<br />\r\n	<br />\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<img alt="" src="/static/team/upload/images/2012/thiet-bi-chong-trom/05.jpg" style="width: 410px; height: 285px;" /><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<p>\r\n	Sản phẩm được thiết kế nhỏ gọn, dễ lắp đặt. Bạn c&oacute; thể gắn ở ngay cửa ra v&agrave;o, hoặc tr&ecirc;n cửa sổ. Thiết bị c&ograve;i b&aacute;o động được gắn v&agrave;o c&aacute;nh cửa, thiết bị nam ch&acirc;m t&iacute;ch hợp c&ograve;n lại gắn tr&ecirc;n c&aacute;nh cửa c&ograve;n lại, hoặc b&ecirc;n tường.<br />\r\n	<br />\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<img alt="" src="/static/team/upload/images/2012/thiet-bi-chong-trom/06.jpg" style="width: 410px; height: 285px;" /><br />\r\n	<br />\r\n	&nbsp;</div>\r\n<p>\r\n	<strong>Thiết bị b&aacute;o động chống trộm sẽ gi&uacute;p bạn kh&ocirc;ng c&ograve;n lo lắng g&igrave; về vấn đề an ninh đối với gia đ&igrave;nh m&igrave;nh. V&agrave; chi ph&iacute; th&igrave; si&ecirc;u rẻ, chỉ với 39.000đ l&agrave; bạn đ&atilde; c&oacute; ngay &ldquo;người bảo vệ&rdquo; n&agrave;y cho gia đ&igrave;nh bạn. Rinh ngay về cho m&igrave;nh v&agrave; cho cả bạn b&egrave; người th&acirc;n nh&eacute;! Click Mua nhanh c&ugrave;ng yeugiare n&agrave;o!</strong></p>', '', '', '<p>\r\n	- &Aacute;p dụng cho sản phẩm thiết bị chống trộm th&ocirc;ng minh.</p>\r\n<p>\r\n	- Kh&ocirc;ng giới hạn số lượng mua đối với mỗi kh&aacute;ch h&agrave;ng.</p>\r\n<p>\r\n	<span style="color:#b22222;"><strong>- </strong></span><strong>Nhận h&agrave;ng tại C&agrave; Mau: 54A L&yacute; Thường Kiệt, phường 6, TPHCM: 128/16A Trần Quốc Thảo P8, Q3.</strong></p>\r\n<p>\r\n	<strong><span style="color:#ff0000;">- Vui l&ograve;ng li&ecirc;n hệ trước khi đến để ch&uacute;ng t&ocirc;i phục vụ bạn tốt hơn.</span></strong></p>\r\n<p>\r\n	<strong>- Ghi r&otilde; m&agrave;u sắc bạn chọn.</strong></p>', '', 'express', 'none', 'N', 'N', 'normal', 2, 1343408400, 1332850681, 1343477881, 0, 0, NULL, NULL, NULL, NULL, NULL, 'team/2012/0327/13328517438121.jpg', 'team/2012/0327/13328517431256.jpg'),
(39, 1, 'Chỉ với 75.000đ sở hữu ngay bút chân không văn phòng độc đáo, sành điệu, sang trọng trị giá 140.000đ. Sản phẩm hiện đại, tiện ích thích hợp quà tặng chỉ có tại yeugiare.com', '<p>\r\n	<strong>- Thiết kế nhỏ gọn, kiểu d&aacute;ng sang trọng.</strong></p>\r\n<p>\r\n	- Vỏ b&uacute;t được xi một lớp bạc s&aacute;ng b&oacute;ng, kh&ocirc;ng gỉ.</p>\r\n<p>\r\n	- C&ocirc;ng nghệ nam ch&acirc;m mới: gi&uacute;p b&uacute;t treo lơ lửng thẳng đứng v&ocirc; c&ugrave;ng độc đ&aacute;o.</p>\r\n<p>\r\n	- Đồng hồ b&aacute;o giờ: mặt đồng hồ nhỏ nhắn, xinh xắn, lu&ocirc;n b&aacute;o giờ ch&iacute;nh x&aacute;c.</p>\r\n<p>\r\n	- Đo nhiệt độ: mức nhiệt độ được thiết kế tr&ecirc;n th&acirc;n b&uacute;t, cho biết nhiệt độ ch&iacute;nh x&aacute;c trong ph&ograve;ng.</p>\r\n<p>\r\n	- Hộp để giấy Note: xinh xắn, tiện dụng.</p>', 0, 8, 43, 'Y', 75000, 140000, 'Bút chân không treo văn phòng', '', 0, 10, 0, 1, 0, 'team/2012/0331/13331290887139.jpg', 'team/2012/0331/13331290895300.jpg', 'team/2012/0331/13331290897782.jpg', '', '', 0, 0, 0, 0, 0, '', '<p>\r\n	Thế giới<span style="text-decoration: none;"> văn ph&ograve;ng phẩm</span> ng&agrave;y nay cho bạn cơ hội lựa chọn nhiều hơn bao giờ hết. Những sản phẩm với nhiều m&agrave;u sắc, chất liệu kh&aacute;c nhau sẽ l&agrave;m cho kh&ocirc;ng gian văn ph&ograve;ng của bạn th&ecirc;m sống động. Nhưng với diện t&iacute;ch hạn hẹp, một sản phẩm nhỏ gọn, xinh xắn, độc đ&aacute;o như b&uacute;t treo văn ph&ograve;ng sẽ l&agrave; sự lựa chọn h&agrave;ng đầu của bạn trẻ.<span style="color: #fafafa; font-size: 1px;">h&agrave;ng khuyến m&atilde;i, phiếu giảm gi&aacute;, mua h&agrave;ng giảm gi&aacute;, mua h&agrave;ng trực tuyến, phiếu khuyến m&atilde;i, mua h&agrave;ng online, khuyến m&atilde;i, chương tr&igrave;nh khuyến m&atilde;i, voucher, mua h&agrave;ng gi&aacute; rẻ, h&agrave;ng gi&aacute; rẻ, h&agrave;ng giảm gi&aacute;, mua h&agrave;ng khuyến m&atilde;i, phieu giam gia, mua hang giam gia, khuyen mai, chuong trinh khuyen mai, voucher, mua hang gia re, hang khuyen mai, hang giam gia, mua hang truc tuyen, mua hang online, hang gia re, mua hang khuyen mai, phieu khuyen mai</span></p>\r\n<p>\r\n	<span style="text-decoration: none;"><img alt="Bút bi, bút máy, bút viết, bút xịn, bút cao cấp, quà lưu niệm, quà 20-11, but bi, but may, but viet, but xin, but cao cap" src="/static/team/upload/images/2012/but-chan-khong-van-phong/but_treo_van_phong_01.jpg" style="display: block; margin-left: auto; margin-right: auto; width: 480px; height: 310px;" title="Bút bi, bút máy, bút viết, bút xịn, bút cao cấp, quà lưu niệm, quà 20-11, but bi, but may, but viet, but xin, but cao cap" /></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	B&uacute;t được thiết kế nhỏ gọn, kiểu d&aacute;ng độc đ&aacute;o, được xi một lớp bạc s&aacute;ng b&oacute;ng, kh&ocirc;ng gỉ, cực kỳ <span style="text-decoration: none;">sang trọng</span>.</p>\r\n<p>\r\n	B&ecirc;n cạnh gi&aacute; treo v&agrave; m&oacute;c đỡ thuận tiện, b&uacute;t treo văn ph&ograve;ng c&ograve;n c&oacute; c&aacute;c chức năng th&uacute; vị:</p>\r\n<p>\r\n	<span style="text-decoration: none;">Đồng hồ b&aacute;o giờ</span>: mặt đồng hồ nhỏ nhắn, xinh xắn, lu&ocirc;n b&aacute;o giờ ch&iacute;nh x&aacute;c, gi&uacute;p bạn quản l&yacute; thời gian một c&aacute;ch hiện quả.<span style="font-size: 1px; color: #fafafa;">B&uacute;t bi, b&uacute;t m&aacute;y, b&uacute;t viết, b&uacute;t xịn, b&uacute;t cao cấp, qu&agrave; lưu niệm, qu&agrave; 20-11, but bi, but may, but viet, but xin, but cao cap, qua luu niem, qua 20-11</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="text-decoration: none;"><img alt="Bút bi, bút máy, bút viết, bút xịn, bút cao cấp, quà lưu niệm, quà 20-11, but bi, but may, but viet, but xin, but cao cap" src="/static/team/upload/images/2012/but-chan-khong-van-phong/but_treo_van_phong_02.jpg" style="display: block; margin-left: auto; margin-right: auto; width: 441px; height: 459px;" title="Bút bi, bút máy, bút viết, bút xịn, bút cao cấp, quà lưu niệm, quà 20-11, but bi, but may, but viet, but xin, but cao cap" /></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Đo nhiệt độ: mức nhiệt độ được <span style="text-decoration: none;">thiết kế</span> tr&ecirc;n th&acirc;n b&uacute;t, cho biết nhiệt độ ch&iacute;nh x&aacute;c trong ph&ograve;ng, gi&uacute;p bạn c&oacute; những điều chỉnh cho cơ thể cảm gi&aacute;c thỏa m&aacute;i, dễ chịu nhất.<span style="font-size: 1px; color: #fafafa;">h&agrave;ng khuyến m&atilde;i, phiếu giảm gi&aacute;, mua h&agrave;ng giảm gi&aacute;, mua h&agrave;ng trực tuyến, phiếu khuyến m&atilde;i, mua h&agrave;ng online, khuyến m&atilde;i, chương tr&igrave;nh khuyến m&atilde;i, voucher, mua h&agrave;ng gi&aacute; rẻ, h&agrave;ng gi&aacute; rẻ, h&agrave;ng giảm gi&aacute;, mua h&agrave;ng khuyến m&atilde;i, phieu giam gia, mua hang giam gia, khuyen mai, chuong trinh khuyen mai, voucher, mua hang gia re, hang khuyen mai, hang giam gia, mua hang truc tuyen, mua hang online, hang gia re, mua hang khuyen mai, phieu khuyen mai</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="text-decoration: none;"><img alt="Bút bi, bút máy, bút viết, bút xịn, bút cao cấp, quà lưu niệm, quà 20-11, but bi, but may, but viet, but xin, but cao cap" src="/static/team/upload/images/2012/but-chan-khong-van-phong/but_treo_van_phong_03.jpg" style="display: block; margin-left: auto; margin-right: auto; width: 582px; height: 439px;" title="Bút bi, bút máy, bút viết, bút xịn, bút cao cấp, quà lưu niệm, quà 20-11, but bi, but may, but viet, but xin, but cao cap" /></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Đầu nam ch&acirc;m: l&otilde;i nam ch&acirc;m được đặt ở gi&aacute; đỡ, h&uacute;t v&agrave; giữ chặt b&uacute;t, gi&uacute;p b&uacute;t đứng thẳng, v&agrave; kh&ocirc;ng thất lạc khi sử dụng.<span style="color: #fafafa; font-size: 1px;">B&uacute;t bi, b&uacute;t m&aacute;y, b&uacute;t viết, b&uacute;t xịn, b&uacute;t cao cấp, qu&agrave; lưu niệm, qu&agrave; 20-11, but bi, but may, but viet, but xin, but cao cap, qua luu niem, qua 20-11</span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="text-decoration: none;"><img alt="Bút bi, bút máy, bút viết, bút xịn, bút cao cấp, quà lưu niệm, quà 20-11, but bi, but may, but viet, but xin, but cao cap" src="/static/team/upload/images/2012/but-chan-khong-van-phong/but_treo_van_phong_04.jpg" style="display: block; margin-left: auto; margin-right: auto; width: 579px; height: 374px;" title="Bút bi, bút máy, bút viết, bút xịn, bút cao cấp, quà lưu niệm, quà 20-11, but bi, but may, but viet, but xin, but cao cap" /></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;Hộp để giấy <span style="text-decoration: none;">note</span>: xinh xắn, tiện dụng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="text-decoration: none;"><img alt="Bút bi, bút máy, bút viết, bút xịn, bút cao cấp, quà lưu niệm, quà 20-11, but bi, but may, but viet, but xin, but cao cap" src="/static/team/upload/images/2012/but-chan-khong-van-phong/but_treo_van_phong_05.jpg" style="display: block; margin-left: auto; margin-right: auto; width: 562px; height: 363px;" title="Bút bi, bút máy, bút viết, bút xịn, bút cao cấp, quà lưu niệm, quà 20-11, but bi, but may, but viet, but xin, but cao cap" /></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<strong><span style="color:#ff0000;"><span style="font-size: 12px;">H&atilde;y l&agrave;m mới văn ph&ograve;ng của bạn với c&acirc;y b&uacute;t độc đ&aacute;o, th&ocirc;ng minh n&agrave;y. Nhanh tay click MUA để sở hữu cho m&igrave;nh v&agrave; l&agrave;m qu&agrave; tặng ấn tượng cho người th&acirc;n của bạn!</span></span></strong></p>', '', '', '<p>\r\n	- &Aacute;p dụng cho sản phẩm B&uacute;t ch&acirc;n kh&ocirc;ng treo văn ph&ograve;ng.</p>\r\n<p>\r\n	- Kh&ocirc;ng giới hạn số lượng mua đối với mỗi kh&aacute;ch h&agrave;ng.</p>\r\n<p>\r\n	<span style="color:#b22222;"><strong>- </strong></span><strong>Nhận h&agrave;ng tại C&agrave; Mau: 54A L&yacute; Thường Kiệt, phường 6</strong></p>\r\n<p>\r\n	<strong><span style="color:#ff0000;">- Vui l&ograve;ng li&ecirc;n hệ trước khi đến để ch&uacute;ng t&ocirc;i phục vụ bạn tốt hơn.</span></strong></p>\r\n<p>\r\n	<strong>- Ghi r&otilde; m&agrave;u sắc bạn chọn.</strong></p>', '', 'express', 'none', 'N', 'N', 'normal', 2, 1341162000, 1333128406, 1341077206, 0, 0, 'but treo chan khong van phong', 'but treo chan khong van phong', 'but treo chan khong van phong', NULL, NULL, NULL, NULL),
(40, 1, 'Hiện đại và sang trọng với Fan tản nhiệt laptop cao cấp N19 mới. Cơ hội sở hữu sản phẩm chất lượng cao chỉ với giá 150.000đ tại yeugiare.com', '<p>\r\n	- Một sản phẩm chất lượng cao.<br />\r\n	- Mẫu m&atilde; tinh tế.<br />\r\n	- Chức năng l&agrave;m m&aacute;t v&agrave; tản nhiệt cho laptop.<br />\r\n	- Kiểu d&aacute;ng sang trọng.<br />\r\n	- Vận h&agrave;nh &ecirc;m, 2 đầu USB.<br />\r\n	- Khung nh&ocirc;m chắc chắn.</p>', 0, 18, 43, 'Y', 150000, 280000, 'Fan tản nhiệt laptop Cooler Master N19', '', 0, 5, 100, 3, 1, 'team/2012/0504/13360967856875.jpg', 'team/2012/0504/13360967856685.jpg', NULL, '', '', 0, 0, 0, 0, 0, '', '<p>\r\n	<span style="font-size:12px;"><span style="font-family: arial,helvetica,sans-serif;"><strong>Fan tản nhiệt cao cấp N19 </strong>c&oacute; chức năng l&agrave;m m&aacute;t, tỏa nhiệt nhanh, bảo vệ laptop của bạn 24/24.<br />\r\n	<br />\r\n	</span></span></p>\r\n<p style="text-align: center; ">\r\n	<span style="font-size:12px;"><img alt="fan tản nhiệt" src="/static/team/upload/images/2012/quat-tan-nhiet-cooler-master/n19-01.jpg" style="width: 440px; height: 284px;" /></span></p>\r\n<p>\r\n	<br />\r\n	<span style="font-size:12px;"><span style="font-family: arial,helvetica,sans-serif;">L&agrave;m tăng độ bền cho laptop, l&agrave; phụ kiện kh&ocirc;ng thể thiếu cho việc bảo vệ chiếc laptop th&acirc;n y&ecirc;u của bạn. Nhất l&agrave; khi bạn c&oacute; nhu cầu sử dụng laptop nhiều giờ liền.<br />\r\n	<br />\r\n	</span></span></p>\r\n<p style="text-align: center; ">\r\n	<span style="font-size:12px;"><img alt="fan tản nhiệt laptop" src="/static/team/upload/images/2012/quat-tan-nhiet-cooler-master/n19-02.jpg" style="width: 418px; height: 270px;" /></span></p>\r\n<p>\r\n	<br />\r\n	<span style="font-size:12px;"><span style="font-family: arial,helvetica,sans-serif;">Vẻ ngo&agrave;i sang trọng, đẳng cấp. C&aacute;nh quạt ẩn b&ecirc;n trong với thiết kế h&igrave;nh hoa, nhiều c&aacute;nh quạt bằng nhựa trong, si&ecirc;u mỏng, vận h&agrave;nh cực &ecirc;m.Nghi&ecirc;ng khoảng 15 độ so với mặt phẳng.<br />\r\n	<br />\r\n	</span></span></p>\r\n<p style="text-align: center; ">\r\n	<span style="font-size:12px;"><img alt="vẻ ngoài sang trọng" src="/static/team/upload/images/2012/quat-tan-nhiet-cooler-master/n19-03.jpg" style="width: 440px; height: 284px;" /></span></p>\r\n<p>\r\n	<br />\r\n	<span style="font-size:12px;"><span style="font-family: arial,helvetica,sans-serif;">Đế fan c&oacute; l&oacute;t 4 miếng m&uacute;t nh&aacute;m ma s&aacute;t tốt, gi&uacute;p cố định vị tr&iacute; của fan với mặt phẳng tốt hơn.<br />\r\n	<br />\r\n	</span></span></p>\r\n<p style="text-align: center; ">\r\n	<span style="font-size:12px;"><img alt="ma sát tốt" src="/static/team/upload/images/2012/quat-tan-nhiet-cooler-master/n19-04.jpg" style="width: 440px; height: 250px;" /></span></p>\r\n<p>\r\n	<br />\r\n	<span style="font-size:12px;"><span style="font-family: arial,helvetica,sans-serif;">Bề mặt l&agrave;m bằng chất liệu nh&ocirc;m kh&ocirc;ng gỉ với h&agrave;ng vạn lỗ th&ocirc;ng kh&iacute; li ti kh&eacute;p k&iacute;n. B&ecirc;n ngo&agrave;i phủ lớp nhựa b&oacute;ng lo&aacute;ng. Ph&iacute;a dưới c&oacute; 2 gờ nổi gi&uacute;p laptop kh&ocirc;ng bị trợt do độ nghi&ecirc;ng của fan tản nhiệt với mặt b&agrave;n.<br />\r\n	<br />\r\n	</span></span></p>\r\n<p style="text-align: center; ">\r\n	<span style="font-size:12px;"><img alt="" src="/static/team/upload/images/2012/quat-tan-nhiet-cooler-master/n19-05.jpg" style="width: 440px; height: 234px;" /></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: center; ">\r\n	<span style="font-size:12px;"><img alt="" src="/static/team/upload/images/2012/quat-tan-nhiet-cooler-master/n19-06.jpg" style="width: 440px; height: 248px;" /></span></p>\r\n<p>\r\n	<br />\r\n	<span style="font-size:12px;"><span style="font-family: arial,helvetica,sans-serif;">Với tốc độ quay mạnh, fan tản nhiệt sẽ nhanh ch&oacute;ng l&agrave;m giảm nhiệt độ của laptop, tăng độ bền cho Pin. Tiết kiệm điện năng ti&ecirc;u thụ, cho thời gian sử dụng d&agrave;i hơn.<br />\r\n	<br />\r\n	</span></span></p>\r\n<p style="text-align: center; ">\r\n	<span style="font-size:12px;"><img alt="tiết kiệm điện năng" src="/static/team/upload/images/2012/quat-tan-nhiet-cooler-master/n19-08.jpg" style="width: 440px; height: 257px;" /></span></p>\r\n<p>\r\n	<br />\r\n	<span style="font-size:12px;"><span style="font-family: arial,helvetica,sans-serif;">Fan tản nhiệt d&ugrave;ng nguồn USB hội tụ đầy đủ c&aacute;c t&iacute;nh năng ưu việt để l&agrave;m m&aacute;t m&aacute;y t&iacute;nh của bạn một c&aacute;ch hiệu quả nhất.<br />\r\n	<br />\r\n	</span></span></p>\r\n<p style="text-align: center; ">\r\n	<span style="font-size:12px;"><span style="font-family: arial,helvetica,sans-serif;"><img alt="" src="/static/team/upload/images/2012/quat-tan-nhiet-cooler-master/n19-07.jpg" style="width: 440px; height: 295px;" /></span></span></p>', '', '', '<p>\r\n	- &Aacute;p dụng cho sản phẩm quạt tản nhiệt Cooler Master N19.<br />\r\n	- Kh&ocirc;ng giới hạn số lượng mua đối với mỗi kh&aacute;ch h&agrave;ng.<br />\r\n	<strong>- Giao h&agrave;ng tận nơi hoặc Nhận h&agrave;ng tại C&agrave; Mau: 54A L&yacute; Thường Kiệt, phường 6, TPHCM: 128/16A Trần Quốc Thảo P8, Q3.<br />\r\n	- <span style="color: rgb(255, 0, 0);">Vui l&ograve;ng li&ecirc;n hệ trước khi đến để ch&uacute;ng t&ocirc;i phục vụ bạn tốt hơn.</span></strong></p>', '', 'express', 'none', 'N', 'N', 'normal', 2, 1338829200, 1336096076, 1338821040, 0, 0, 'deal quat tan nhiet, quat tan nhiet cooler master, quat tan nhiet gia re', 'deal quat tan nhiet, quat tan nhiet cooler master, quat tan nhiet gia re', 'deal quat tan nhiet, quat tan nhiet cooler master, quat tan nhiet gia re', NULL, NULL, NULL, NULL),
(41, 1, 'Tận hưởng âm thanh tuyệt đỉnh cùng bộ loa Camac 2.0 nhỏ gọn dành cho laptop chỉ với 95.000đ tại yeugiare.com', '<p>\r\n	- Loa Camac 818 một trong những sản phẩm mini được y&ecirc;u th&iacute;ch nhất hiện nay.<br />\r\n	- Với k&iacute;ch thước nhỏ gọn thật dễ d&agrave;ng cho bạn mang theo khắp mọi nơi.<br />\r\n	- &Acirc;m thanh sống động, trung thực &ndash; nghe thật đ&atilde;.<br />\r\n	- Thiết kế gọn g&agrave;ng, thanh lịch, cực kỳ thời trang, c&aacute; t&iacute;nh.<br />\r\n	- Bảo h&agrave;nh: 3 th&aacute;ng</p>', 0, 18, 41, 'Y', 95000, 150000, 'Loa Camac 2.0 danh cho laptop', '', 0, 5, 100, 1, 1, 'team/2012/0504/13360984887167.jpg', 'team/2012/0504/13360984883089.jpg', 'team/2012/0504/13360984886576.jpg', '', '', 0, 0, 0, 0, 1000, '', '<p>\r\n	<span style="font-size:12px;"><strong>&Acirc;m nhạc l&agrave; điều tuyệt vời nhất trong cuộc sống gi&uacute;p ch&uacute;ng ta qu&ecirc;n đi sự mệt mỏi trong c&ocirc;ng việc, thỏa m&atilde;n niềm đam m&ecirc; &acirc;m nhạc.</strong></span><br />\r\n	&nbsp;</p>\r\n<div style="text-align: center; ">\r\n	<span style="font-size:12px;"><img alt="" src="/static/team/upload/images/2012/loa-camac%202.0/camac818-01.jpg" style="width: 440px; height: 361px;" /></span></div>\r\n<br />\r\n<br />\r\n<br />\r\n<p>\r\n	<span style="font-size:12px;">Bạn muốn tận hưởng &acirc;m thanh tuyệt vời th&igrave; h&atilde;y nhanh tay sở hữu bộ loa vi t&iacute;nh Camac. Thiết kế vượt trội d&ograve;ng sản phẩm n&agrave;y sẽ mang đến cho bạn sự h&agrave;i l&ograve;ng cao nhất.</span></p>\r\n<div style="text-align: center; ">\r\n	<span style="font-size:12px;"><img alt="" src="/static/team/upload/images/2012/loa-camac%202.0/camac818-02.jpg" style="width: 440px; height: 295px;" /></span></div>\r\n<br />\r\n<br />\r\n<p>\r\n	<span style="font-size:12px;">&Acirc;m thanh chi tiết, tiếng bass r&otilde; r&agrave;ng v&agrave; chắc, ho&agrave;n to&agrave;n t&aacute;ch biệt khỏi kh&ocirc;ng gian b&ecirc;n ngo&agrave;i với chế độ c&aacute;ch &acirc;m độc đ&aacute;o.</span></p>\r\n<div style="text-align: center; ">\r\n	<span style="font-size:12px;"><img alt="" src="/static/team/upload/images/2012/loa-camac%202.0/camac818-04.jpg" style="width: 440px; height: 301px;" /></span></div>\r\n<br />\r\n<p>\r\n	<span style="font-size:12px;">Bạn đang sở hữu những m&aacute;y nghe nhạc hiện đại, một chiếc điện thoại hot nhưng khi nghe nhạc bạn lại kh&ocirc;ng thể nghe r&otilde; mọi chi tiết &acirc;m thanh, điều đ&oacute; c&oacute; nghĩa l&agrave; bạn chưa sử dụng tai nghe tốt.<br />\r\n	<br />\r\n	</span></p>\r\n<div style="text-align: center; ">\r\n	<span style="font-size:12px;"><img alt="" src="/static/team/upload/images/2012/loa-camac%202.0/camac818-04.jpg" style="width: 440px; height: 315px;" /></span></div>\r\n<p>\r\n	<br />\r\n	<span style="font-size:12px;">Để ph&aacute;t huy hết ưu điểm của m&aacute;y nghe nhạc, hay bất cứ một thiết bị n&agrave;o th&igrave; điều bạn cần quan t&acirc;m l&agrave; chọn một d&ograve;ng tai nghe tốt. H&atilde;y thử nghe nhạc c&ugrave;ng Camac, bạn sẽ cảm nhận ngay sự kh&aacute;c biệt r&otilde; r&agrave;ng.</span><br />\r\n	&nbsp;</p>\r\n<p style="text-align: center;">\r\n	<br />\r\n	<span style="font-size:12px;"><span style="font-size:14px;"><strong>Bộ loa Camac sẽ l&agrave;m h&agrave;i l&ograve;ng bạn trong những cuộc vui chơi c&ugrave;ng bạn b&egrave;.</strong></span></span></p>', '', '', '<p>\r\n	- &Aacute;p dụng cho sản phẩm loa Camac 2.0 d&agrave;nh cho laptop.<br />\r\n	- Kh&ocirc;ng giới hạn số lượng mua đối với mỗi kh&aacute;ch h&agrave;ng.<br />\r\n	<strong>- Giao h&agrave;ng tận nơi TPHCM (Q1, Q3, Q5, Q4, Q.BT, Q.PN c&aacute;c quận kh&aacute;c vui l&ograve;ng trả th&ecirc;m tiền ship), TPCM (Nội &ocirc; th&agrave;nh phố) hoặc Nhận h&agrave;ng tại C&agrave; Mau: 54A L&yacute; Thường Kiệt, phường 6, TPHCM: 128/16A Trần Quốc Thảo P8, Q3.<br />\r\n	- <span style="color: rgb(255, 0, 0);">Vui l&ograve;ng li&ecirc;n hệ trước khi đến để ch&uacute;ng t&ocirc;i phục vụ bạn tốt hơn.</span></strong></p>', '<p>\r\n	<br />\r\n	&nbsp;</p>', 'express', 'none', 'N', 'N', 'normal', 1, 1338829200, 1336097556, 1338862356, 0, 0, 'loa camac 2.0, loa gia re, loa latop', 'loa camac 2.0, loa gia re, loa latop', 'loa camac 2.0, loa gia re, loa latop', NULL, NULL, 'team/2012/0504/13360984889924.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(128) DEFAULT NULL,
  `team_id` int(10) unsigned NOT NULL DEFAULT '0',
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `public_id` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `head` int(10) unsigned NOT NULL DEFAULT '0',
  `reply_number` int(10) unsigned NOT NULL DEFAULT '0',
  `view_number` int(10) unsigned NOT NULL DEFAULT '0',
  `last_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `last_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `realname` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `avatar` varchar(128) DEFAULT NULL,
  `gender` enum('M','F') NOT NULL DEFAULT 'M',
  `newbie` enum('Y','N') NOT NULL DEFAULT 'Y',
  `mobile` varchar(16) DEFAULT NULL,
  `ym` varchar(128) DEFAULT NULL,
  `money` double(10,2) NOT NULL DEFAULT '0.00',
  `score` int(11) NOT NULL DEFAULT '0',
  `zipcode` char(6) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `province_id` int(10) unsigned DEFAULT NULL,
  `district_id` int(11) unsigned DEFAULT NULL,
  `ward_id` int(11) unsigned DEFAULT NULL,
  `street_info` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `home_num` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `enable` enum('Y','N') NOT NULL DEFAULT 'Y',
  `manager` enum('Y','N') NOT NULL DEFAULT 'N',
  `secret` varchar(32) DEFAULT NULL,
  `recode` varchar(32) DEFAULT NULL,
  `sns` varchar(32) DEFAULT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `login_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `fb_userid` varchar(200) DEFAULT NULL,
  `fl_facebook` set('new','normal','registered') DEFAULT 'registered',
  `twitter_userid` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_name` (`username`),
  UNIQUE KEY `UNQ_e` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `realname`, `password`, `avatar`, `gender`, `newbie`, `mobile`, `ym`, `money`, `score`, `zipcode`, `address`, `province_id`, `district_id`, `ward_id`, `street_info`, `home_num`, `city_id`, `enable`, `manager`, `secret`, `recode`, `sns`, `ip`, `login_time`, `create_time`, `fb_userid`, `fl_facebook`, `twitter_userid`) VALUES
(1, 'admin', 'admin', 'TRƯƠNG HOÀNG THI', 'e10adc3949ba59abbe56e057f20f883e', 'user/2011/0510/13050100737200.jpg', 'M', 'N', '0944303422', '', 0.00, 0, NULL, '', 0, 0, 0, 'Lý Thường Kiệt', '54A', 7, 'Y', 'Y', '', '77bdeb812301efa3942918f112d23cb9', NULL, '127.0.1.1', 1303089890, 1303089890, NULL, 'registered', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vote_feedback`
--

CREATE TABLE IF NOT EXISTS `vote_feedback` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `addtime` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vote_feedback_input`
--

CREATE TABLE IF NOT EXISTS `vote_feedback_input` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `feedback_id` bigint(20) unsigned NOT NULL,
  `options_id` mediumint(8) unsigned NOT NULL,
  `value` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vote_feedback_question`
--

CREATE TABLE IF NOT EXISTS `vote_feedback_question` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `feedback_id` bigint(20) unsigned NOT NULL,
  `question_id` mediumint(8) unsigned NOT NULL,
  `options_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vote_options`
--

CREATE TABLE IF NOT EXISTS `vote_options` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` mediumint(8) unsigned NOT NULL,
  `name` varchar(60) NOT NULL,
  `is_br` char(1) NOT NULL DEFAULT '0',
  `is_input` char(1) NOT NULL DEFAULT '0',
  `is_show` char(1) NOT NULL DEFAULT '1',
  `order` mediumint(8) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vote_question`
--

CREATE TABLE IF NOT EXISTS `vote_question` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'radio',
  `is_show` char(1) NOT NULL DEFAULT '1',
  `addtime` char(10) NOT NULL,
  `order` mediumint(8) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE IF NOT EXISTS `voucher` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL COMMENT 'nguoi mua hang',
  `team_id` bigint(20) unsigned NOT NULL,
  `serial` bigint(20) unsigned NOT NULL,
  `create_date` int(10) unsigned NOT NULL,
  `istatus` int(2) unsigned DEFAULT '1' COMMENT '1 - da tao - 2 da huy',
  `iused` int(2) unsigned NOT NULL DEFAULT '1' COMMENT '1: chua su dung, 2: da su dung',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
