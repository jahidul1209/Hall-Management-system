-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 03:30 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pstu_sofia_kamal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `email`, `password`) VALUES
(1, 'eva', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notices`
--

CREATE TABLE `tbl_notices` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notices`
--

INSERT INTO `tbl_notices` (`id`, `title`, `description`, `time`) VALUES
(2, 'Hall New feast', '<p>Hall New feastHall New feastHall New feastHall New feastHall New feastHall New feastHall New feastHall New feastHall New feastHall New feastHall New feastHall New feast</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hall New feastHall New feastHall New feastHall New feastHall New feastHall New feastHall New feastHall New feastHall New feastHall New feastHall New feastHall New feast</p>\r\n', '2018-07-12 12:36:50'),
(3, 'Another Hall Notice', '<p>Another Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall Notice</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Another Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall NoticeAnother Hall Notice</p>\r\n', '2018-07-12 12:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `block` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`id`, `name`, `block`) VALUES
(6, '101', 'A'),
(8, '402', 'B'),
(9, '301', 'A'),
(10, '302', 'A'),
(11, '102', 'A'),
(12, '401', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `registration_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `room_id` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `university_id`, `registration_no`, `name`, `email`, `phone_no`, `address`, `room_id`, `session`, `image`) VALUES
(1, 1402073, 5422, 'Farjana Islam Eva', 'eva@gmail.com', '000000000000', 'Kulna', 6, '2014-15', '1.JPG'),
(3, 1402033, 3432, 'Tonima Sen', 'tonima@gmail.com', '+8801951233023', 'Dumki-8602, Patuakhali', 6, '2014-2015', '3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notices`
--
ALTER TABLE `tbl_notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_notices`
--
ALTER TABLE `tbl_notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
