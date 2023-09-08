-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 05:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vicinity_entry_and_exit_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_attendance`
--

CREATE TABLE `tbl_info_attendance` (
  `id` int(11) NOT NULL,
  `primary_id` varchar(255) NOT NULL,
  `rfid_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `time_in` datetime DEFAULT NULL,
  `time_out` datetime DEFAULT NULL,
  `time_in_afternoon` datetime DEFAULT NULL,
  `time_out_afternoon` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `teachers` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_educationalbackground`
--

CREATE TABLE `tbl_info_educationalbackground` (
  `id` int(11) NOT NULL,
  `primary_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `strand_course` varchar(255) NOT NULL,
  `from_year` varchar(255) NOT NULL,
  `to_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_settings`
--

CREATE TABLE `tbl_info_settings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `theme_mode` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_skill`
--

CREATE TABLE `tbl_info_skill` (
  `id` int(11) NOT NULL,
  `primary_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `skill_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_student`
--

CREATE TABLE `tbl_info_student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `rfid_number` varchar(255) NOT NULL,
  `strand` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `current_address` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `facebook_account` varchar(255) NOT NULL,
  `other_email_address` varchar(255) NOT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `guardian_mobile_number` varchar(255) NOT NULL,
  `teachers` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_teacher`
--

CREATE TABLE `tbl_info_teacher` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `user_account_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `rfid_number` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `current_address` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `facebook_account` varchar(255) NOT NULL,
  `other_email_address` varchar(255) NOT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `guardian_mobile_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_useraccounts`
--

CREATE TABLE `tbl_info_useraccounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_info_useraccounts`
--

INSERT INTO `tbl_info_useraccounts` (`id`, `name`, `username`, `password`, `user_type`, `image`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 'Administrator', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_visitor`
--

CREATE TABLE `tbl_info_visitor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `date_created` date DEFAULT NULL,
  `time_in` datetime DEFAULT NULL,
  `time_out` datetime DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings_gender`
--

CREATE TABLE `tbl_settings_gender` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings_grade`
--

CREATE TABLE `tbl_settings_grade` (
  `id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings_maritalstatus`
--

CREATE TABLE `tbl_settings_maritalstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings_nationality`
--

CREATE TABLE `tbl_settings_nationality` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings_section`
--

CREATE TABLE `tbl_settings_section` (
  `id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings_skill`
--

CREATE TABLE `tbl_settings_skill` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings_strand`
--

CREATE TABLE `tbl_settings_strand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings_system`
--

CREATE TABLE `tbl_settings_system` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_info_attendance`
--
ALTER TABLE `tbl_info_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info_educationalbackground`
--
ALTER TABLE `tbl_info_educationalbackground`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info_settings`
--
ALTER TABLE `tbl_info_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info_skill`
--
ALTER TABLE `tbl_info_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info_student`
--
ALTER TABLE `tbl_info_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info_teacher`
--
ALTER TABLE `tbl_info_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info_useraccounts`
--
ALTER TABLE `tbl_info_useraccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info_visitor`
--
ALTER TABLE `tbl_info_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings_gender`
--
ALTER TABLE `tbl_settings_gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings_grade`
--
ALTER TABLE `tbl_settings_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings_maritalstatus`
--
ALTER TABLE `tbl_settings_maritalstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings_nationality`
--
ALTER TABLE `tbl_settings_nationality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings_section`
--
ALTER TABLE `tbl_settings_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings_skill`
--
ALTER TABLE `tbl_settings_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings_strand`
--
ALTER TABLE `tbl_settings_strand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings_system`
--
ALTER TABLE `tbl_settings_system`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_info_attendance`
--
ALTER TABLE `tbl_info_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_info_educationalbackground`
--
ALTER TABLE `tbl_info_educationalbackground`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_info_settings`
--
ALTER TABLE `tbl_info_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_info_skill`
--
ALTER TABLE `tbl_info_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_info_student`
--
ALTER TABLE `tbl_info_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_info_teacher`
--
ALTER TABLE `tbl_info_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_info_useraccounts`
--
ALTER TABLE `tbl_info_useraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_info_visitor`
--
ALTER TABLE `tbl_info_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings_gender`
--
ALTER TABLE `tbl_settings_gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings_grade`
--
ALTER TABLE `tbl_settings_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings_maritalstatus`
--
ALTER TABLE `tbl_settings_maritalstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings_nationality`
--
ALTER TABLE `tbl_settings_nationality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings_section`
--
ALTER TABLE `tbl_settings_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings_skill`
--
ALTER TABLE `tbl_settings_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings_strand`
--
ALTER TABLE `tbl_settings_strand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings_system`
--
ALTER TABLE `tbl_settings_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
