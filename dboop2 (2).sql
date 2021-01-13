-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 12, 2021 at 02:13 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dboop2`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL,
  `ActivitySDate` date NOT NULL,
  `ActivityEDate` date NOT NULL,
  `ActivityName` varchar(255) NOT NULL,
  `ActivityFees` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ActivityID` (`parentid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `parentid`, `ActivitySDate`, `ActivityEDate`, `ActivityName`, `ActivityFees`) VALUES
(1, 1, '2020-06-18', '2021-01-05', 'Art classes', 1500),
(4, 2, '2021-01-14', '2021-01-14', 'ورشة علوم الحاسب', 100),
(5, 1, '2021-01-27', '2021-01-28', 'حصص تعليم الرسم', 50);

-- --------------------------------------------------------

--
-- Table structure for table `activitylist`
--

DROP TABLE IF EXISTS `activitylist`;
CREATE TABLE IF NOT EXISTS `activitylist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activitylist`
--

INSERT INTO `activitylist` (`id`, `type`) VALUES
(1, 'Classes'),
(2, 'Workshops'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `childs`
--

DROP TABLE IF EXISTS `childs`;
CREATE TABLE IF NOT EXISTS `childs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `childs`
--

INSERT INTO `childs` (`id`, `name`, `birthdate`, `status`) VALUES
(2, 'Ahmad', '2010-01-01', 'يتيم الاب'),
(3, 'Child Test', '2005-01-01', 'ذوي الاحتياجات الخاصة'),
(6, 'khalid', '2012-02-15', 'aaa'),
(7, 'kareem', '2019-11-12', 'aaa'),
(8, 'ahmed mohamed', '2013-06-10', 'sdasd');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
CREATE TABLE IF NOT EXISTS `donations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` double NOT NULL,
  `type` enum('waranty','cash','inkind','activities') NOT NULL,
  `donor_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `donation_donor_id` (`donor_id`),
  KEY `donation_child_id` (`child_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `date`, `amount`, `type`, `donor_id`, `child_id`, `Notes`) VALUES
(16, '2021-01-09 18:12:11', 543243, 'waranty', 9, 2, 'wasdw'),
(17, '2021-01-10 22:49:36', 1600, 'cash', 13, 2, 'صتحيضتحشسنتحص'),
(18, '2021-01-10 22:52:15', 1500, 'waranty', 14, 6, 'هاعهاعهعا'),
(20, '2021-01-12 03:16:40', 1600, 'cash', 8, 7, 'يصمنيشنس'),
(21, '2021-01-12 03:19:15', 0, 'inkind', 13, 6, 'تبرع بكمبيوتر');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

DROP TABLE IF EXISTS `donors`;
CREATE TABLE IF NOT EXISTS `donors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `govid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `phone`, `address`, `govid`) VALUES
(7, 'raghad', '01096527287', 'Nasr city', 61),
(8, 'Abdulrahman omar', '0112947832', 'Haram', 57),
(9, 'ahmed abdulrahman', '0115879462', 'Nasr city', 45),
(11, 'ahmed mohamed', '01009485479', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa', 32),
(13, 'Mai', '010823948', '6 اكتوبر', 33),
(14, 'ريم سفيان', '01023943822222', 'Nasr city', 30),
(19, 'raghad', '01009485479', 'المبنى رقم 309', 49);

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

DROP TABLE IF EXISTS `extras`;
CREATE TABLE IF NOT EXISTS `extras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `name`, `amount`) VALUES
(1, 'وجبة طعام', 100),
(2, 'تذكرة باص', 50),
(3, 'وجبة طعام + تذكره', 150),
(5, 'تذكرة دخول', 100),
(6, 'عدة عمل', 30),
(7, 'test', 500);

-- --------------------------------------------------------

--
-- Table structure for table `gov`
--

DROP TABLE IF EXISTS `gov`;
CREATE TABLE IF NOT EXISTS `gov` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parentid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gov`
--

INSERT INTO `gov` (`id`, `name`, `parentid`) VALUES
(1, 'القاهره', 0),
(2, 'الاسكندرية', 0),
(3, 'الجيزة', 0),
(4, 'الإسماعيلية', 0),
(5, 'أسوان', 0),
(6, 'أسيوط', 0),
(7, 'الأقصر', 0),
(8, 'البحر الأحمر', 0),
(9, 'البحيرة', 0),
(10, 'بني سويف', 0),
(11, 'بورسعيد', 0),
(12, 'جنوب سيناء', 0),
(13, 'الدقهلية', 0),
(14, 'دمياط', 0),
(15, 'سوهاج', 0),
(16, 'السويس', 0),
(17, 'الشرقية', 0),
(18, 'شمال سيناء', 0),
(19, 'الغربية', 0),
(20, 'الفيوم', 0),
(21, 'القليوبية', 0),
(22, 'قنا', 0),
(23, 'كفر الشيخ', 0),
(24, 'مطروح', 0),
(25, 'المنوفية', 0),
(26, 'المنيا', 0),
(27, 'الوادي الجديد', 0),
(30, 'مدينة نصر', 1),
(32, 'عين شمس', 1),
(33, 'المرج', 1),
(34, 'المطرية', 1),
(35, 'السلام', 1),
(36, 'النزهة', 1),
(37, 'مصر الجديدة', 1),
(38, 'بابا الشعرية', 1),
(39, 'الموسكى', 1),
(40, 'الازبكية', 1),
(41, 'عابدين', 1),
(42, 'بولاق', 1),
(43, 'غرب', 1),
(44, 'الزيتون', 1),
(45, 'حدائق القبة', 1),
(46, 'الزاوية الحمراء', 1),
(47, 'الشرابية', 1),
(48, 'الساحل', 1),
(49, 'شبرا', 1),
(50, 'روض الفرج', 1),
(51, 'السيدة زينب', 1),
(52, 'مصر القديمة', 1),
(53, 'الحلفية', 1),
(54, 'المقطم', 1),
(55, 'البساتين', 1),
(56, 'دار السلام', 1),
(57, 'المعادي', 1),
(58, 'حلوان', 1),
(59, 'التبين', 1),
(60, '15 مايو', 1),
(61, 'الاسكندرية', 2),
(62, 'برج العرب', 2),
(63, 'برج العرب الجديدة', 2);

-- --------------------------------------------------------

--
-- Table structure for table `observers`
--

DROP TABLE IF EXISTS `observers`;
CREATE TABLE IF NOT EXISTS `observers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `readed` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `observers`
--

INSERT INTO `observers` (`id`, `msg`, `date`, `readed`) VALUES
(1, 'Inserted new Donor ... with name :ahmed moahmed', '2021-01-12 02:52:12', 1),
(2, 'Delete Donor id :18', '2021-01-12 02:52:15', 1),
(3, 'Delete Donor id :6', '2021-01-12 02:52:19', 1),
(4, 'Delete Donation id :10', '2021-01-12 02:52:44', 1),
(5, 'Delete Donation id :11', '2021-01-12 02:52:45', 1),
(6, 'Deleted Regestration id :3', '2021-01-12 02:53:38', 1),
(7, 'Deleted Regestration id :5', '2021-01-12 02:53:44', 1),
(8, 'Deleted Regestration id :5', '2021-01-12 02:54:16', 1),
(9, 'Deleted Regestration id :3', '2021-01-12 02:54:40', 1),
(10, 'Deleted Regestration id :5', '2021-01-12 02:54:55', 1),
(11, 'Deleted Regestration id :5', '2021-01-12 02:57:06', 1),
(12, 'Deleted Regestration id :5', '2021-01-12 02:57:13', 1),
(13, 'Deleted Regestration id :5', '2021-01-12 02:57:22', 1),
(14, 'Deleted Regestration id :5', '2021-01-12 02:58:58', 1),
(15, 'Deleted Regestration id :3', '2021-01-12 02:59:04', 1),
(16, 'Deleted Regestration id :3', '2021-01-12 03:01:07', 1),
(17, 'Deleted Regestration id :3', '2021-01-12 03:01:44', 1),
(18, 'Deleted Regestration id :5', '2021-01-12 03:02:11', 1),
(19, 'Inserted new Registration ... for Donor :13', '2021-01-12 03:03:12', 1),
(20, 'Deleted Regestration id :3', '2021-01-12 03:05:20', 1),
(21, 'Deleted Regestration id :9', '2021-01-12 03:07:31', 1),
(22, 'Deleted Regestration id :8', '2021-01-12 03:07:42', 1),
(23, 'Inserted new Registration ... for Donor :8', '2021-01-12 03:07:52', 1),
(24, 'Deleted Regestration id :7', '2021-01-12 03:09:47', 1),
(25, 'Deleted Regestration id :10', '2021-01-12 03:09:49', 1),
(26, 'Delete Activity id :3', '2021-01-12 03:09:52', 1),
(27, 'Inserted new Activity ... with Name :ورشة علوم الحاسب', '2021-01-12 03:10:22', 1),
(28, 'Inserted new Activity ... with Name :حصص تعليم الرسم', '2021-01-12 03:10:39', 1),
(29, 'Inserted new Extra ... with name :عدة عمل', '2021-01-12 03:11:20', 1),
(30, 'Inserted new Registration ... for Donor :11', '2021-01-12 03:11:30', 1),
(31, 'Inserted new Donations ... with Amount :1600', '2021-01-12 03:16:40', 1),
(32, 'Update Donation info ... ID :20', '2021-01-12 03:16:57', 1),
(33, 'Inserted new Donor ... with name :raghad', '2021-01-12 03:18:08', 1),
(34, 'Inserted new Donations ... with Amount :0', '2021-01-12 03:19:15', 1),
(35, 'Inserted new Registration ... for Donor :13', '2021-01-12 03:20:58', 1),
(36, 'Inserted new Extra ... with name :test', '2021-01-12 03:21:43', 1),
(37, 'Inserted new Registration ... for Donor :9', '2021-01-12 03:22:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

DROP TABLE IF EXISTS `reg`;
CREATE TABLE IF NOT EXISTS `reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `extras` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ActivityID2` (`acid`),
  KEY `FK_DonorID5` (`did`),
  KEY `FK_extra` (`extras`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `acid`, `did`, `extras`) VALUES
(2, 1, 8, 1),
(11, 5, 11, 6),
(12, 5, 13, 5),
(13, 4, 9, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `accType` enum('admin','manager','donor','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `accType`) VALUES
(1, 'test', '1234', 'admin'),
(2, 'mhd', '1234', 'manager');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `FK_ActivityID` FOREIGN KEY (`parentid`) REFERENCES `activitylist` (`id`);

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donation_child_id` FOREIGN KEY (`child_id`) REFERENCES `childs` (`id`),
  ADD CONSTRAINT `donation_donor_id` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`id`);

--
-- Constraints for table `reg`
--
ALTER TABLE `reg`
  ADD CONSTRAINT `FK_ActivityID2` FOREIGN KEY (`acid`) REFERENCES `activity` (`id`),
  ADD CONSTRAINT `FK_DonorID5` FOREIGN KEY (`did`) REFERENCES `donors` (`id`),
  ADD CONSTRAINT `FK_extra` FOREIGN KEY (`extras`) REFERENCES `extras` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
