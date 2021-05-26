-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 02:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tit_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_stu`
--

CREATE TABLE `course_stu` (
  `stuco_id` int(12) NOT NULL,
  `st_id` int(12) NOT NULL,
  `cou_id` int(12) NOT NULL,
  `stuco_dateon` datetime NOT NULL DEFAULT current_timestamp(),
  `stuco_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_stu`
--

INSERT INTO `course_stu` (`stuco_id`, `st_id`, `cou_id`, `stuco_dateon`, `stuco_status`) VALUES
(17, 31, 10, '2021-05-21 16:17:42', 1),
(18, 32, 10, '2021-05-21 16:22:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tit_courseapply`
--

CREATE TABLE `tit_courseapply` (
  `couap_id` int(12) NOT NULL,
  `couap_names` text NOT NULL,
  `couap_dob` varchar(20) NOT NULL,
  `couap_email` varchar(255) NOT NULL,
  `ge_id` int(2) NOT NULL,
  `cou_id` int(12) NOT NULL,
  `couap_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tit_courses`
--

CREATE TABLE `tit_courses` (
  `cou_id` int(12) NOT NULL,
  `cou_title` text NOT NULL,
  `cou_code` varchar(30) NOT NULL,
  `cou_date` datetime NOT NULL DEFAULT current_timestamp(),
  `cou_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tit_courses`
--

INSERT INTO `tit_courses` (`cou_id`, `cou_title`, `cou_code`, `cou_date`, `cou_status`) VALUES
(9, 'JAVA', 'CO03875621', '2021-05-21 15:38:41', 1),
(10, 'WEB TECH', 'CO85327614', '2021-05-21 15:39:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tit_gender`
--

CREATE TABLE `tit_gender` (
  `ge_id` int(2) NOT NULL,
  `ge_name` text NOT NULL,
  `ge_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tit_gender`
--

INSERT INTO `tit_gender` (`ge_id`, `ge_name`, `ge_status`) VALUES
(1, 'Male', 1),
(2, 'Female', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tit_student`
--

CREATE TABLE `tit_student` (
  `st_id` int(12) NOT NULL,
  `st_fullnames` text NOT NULL,
  `st_email` varchar(255) NOT NULL,
  `st_dob` varchar(20) NOT NULL,
  `ge_id` int(2) NOT NULL,
  `st_address` varchar(255) NOT NULL,
  `st_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tit_student`
--

INSERT INTO `tit_student` (`st_id`, `st_fullnames`, `st_email`, `st_dob`, `ge_id`, `st_address`, `st_status`) VALUES
(31, 'MUKIMBILI Noah', 'emateduc250@gmail.com', '2002-02-14', 1, 'kicukiro', 1),
(32, 'ISHIMWE YVAN', 'ishimweyvan90@gmail.com', '2009-12-17', 1, 'Kigali', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tit_teachcourse`
--

CREATE TABLE `tit_teachcourse` (
  `teaco_id` int(12) NOT NULL,
  `tea_code` varchar(50) NOT NULL,
  `cou_id` int(12) NOT NULL,
  `teaco_date` datetime NOT NULL DEFAULT current_timestamp(),
  `teaco_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tit_teachcourse`
--

INSERT INTO `tit_teachcourse` (`teaco_id`, `tea_code`, `cou_id`, `teaco_date`, `teaco_status`) VALUES
(14, 'TE51367924', 10, '2021-05-21 16:05:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tit_teacher`
--

CREATE TABLE `tit_teacher` (
  `tea_id` int(12) NOT NULL,
  `tea_code` varchar(50) NOT NULL,
  `tea_names` text NOT NULL,
  `tea_email` varchar(255) NOT NULL,
  `tea_dob` varchar(20) NOT NULL,
  `ge_id` int(2) NOT NULL,
  `tea_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tit_teacher`
--

INSERT INTO `tit_teacher` (`tea_id`, `tea_code`, `tea_names`, `tea_email`, `tea_dob`, `ge_id`, `tea_status`) VALUES
(19, 'TE51367924', 'Lamb Nseng', 'nlambert33.ln@gmail.com', '2000-12-15', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tit_users`
--

CREATE TABLE `tit_users` (
  `usr_id` int(12) NOT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `typ_id` int(2) NOT NULL,
  `usr_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tit_users`
--

INSERT INTO `tit_users` (`usr_id`, `usr_email`, `usr_password`, `typ_id`, `usr_status`) VALUES
(30, 'admin@tit.com', '$2y$10$2lWpagS5Tg8KQgA9GfQq6OOXWp03UXdOZAvERxDnsFlMjM6wzsXdm', 6, 1),
(33, 'nlambert33.ln@gmail.com', '$2y$10$GkQIHYaWfOn0K0FHAPPqduXGRn5f80SdY.KPQEyAioDvYCo7b1.4e', 3, 1),
(35, 'emateduc250@gmail.com', '$2y$10$l0SbwNvbmVak8jWvOWQNiuzB4sx2K3.ESGvrMrNYu.cH.qEIfPt6G', 4, 1),
(36, 'ishimweyvan90@gmail.com', '$2y$10$P524dN8h0Q60TFgQ4o2Tt.xQ.Ps7.5NQ.AGojHNlxlQ3pIVoMU1fC', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tit_usertype`
--

CREATE TABLE `tit_usertype` (
  `typ_id` int(2) NOT NULL,
  `typ_role` text NOT NULL,
  `typ_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tit_usertype`
--

INSERT INTO `tit_usertype` (`typ_id`, `typ_role`, `typ_status`) VALUES
(3, 'teacher', 1),
(4, 'student', 1),
(5, 'headmaster', 1),
(6, 'administrator', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_stu`
--
ALTER TABLE `course_stu`
  ADD PRIMARY KEY (`stuco_id`),
  ADD KEY `usr_id` (`st_id`),
  ADD KEY `cou_id` (`cou_id`);

--
-- Indexes for table `tit_courseapply`
--
ALTER TABLE `tit_courseapply`
  ADD PRIMARY KEY (`couap_id`),
  ADD KEY `ge_id` (`ge_id`),
  ADD KEY `cou_id` (`cou_id`);

--
-- Indexes for table `tit_courses`
--
ALTER TABLE `tit_courses`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `tit_gender`
--
ALTER TABLE `tit_gender`
  ADD PRIMARY KEY (`ge_id`);

--
-- Indexes for table `tit_student`
--
ALTER TABLE `tit_student`
  ADD PRIMARY KEY (`st_id`),
  ADD KEY `ge_id` (`ge_id`);

--
-- Indexes for table `tit_teachcourse`
--
ALTER TABLE `tit_teachcourse`
  ADD PRIMARY KEY (`teaco_id`);

--
-- Indexes for table `tit_teacher`
--
ALTER TABLE `tit_teacher`
  ADD PRIMARY KEY (`tea_id`),
  ADD KEY `ge_id` (`ge_id`);

--
-- Indexes for table `tit_users`
--
ALTER TABLE `tit_users`
  ADD PRIMARY KEY (`usr_id`),
  ADD KEY `typ_id` (`typ_id`);

--
-- Indexes for table `tit_usertype`
--
ALTER TABLE `tit_usertype`
  ADD PRIMARY KEY (`typ_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_stu`
--
ALTER TABLE `course_stu`
  MODIFY `stuco_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tit_courseapply`
--
ALTER TABLE `tit_courseapply`
  MODIFY `couap_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tit_courses`
--
ALTER TABLE `tit_courses`
  MODIFY `cou_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tit_gender`
--
ALTER TABLE `tit_gender`
  MODIFY `ge_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tit_student`
--
ALTER TABLE `tit_student`
  MODIFY `st_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tit_teachcourse`
--
ALTER TABLE `tit_teachcourse`
  MODIFY `teaco_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tit_teacher`
--
ALTER TABLE `tit_teacher`
  MODIFY `tea_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tit_users`
--
ALTER TABLE `tit_users`
  MODIFY `usr_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tit_usertype`
--
ALTER TABLE `tit_usertype`
  MODIFY `typ_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
