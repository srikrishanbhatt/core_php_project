-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 09:20 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srikrishan_bhatt`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`) VALUES
(1, 'php', 'this php department of developement'),
(2, 'html', 'this html department of development'),
(3, 'design', 'designer team'),
(4, 'other', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `course`) VALUES
(1, 'MCA'),
(2, 'BTech'),
(3, 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email_address` varchar(55) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `photo_path` varchar(100) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `department_id` varchar(50) DEFAULT NULL,
  `education_id` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `hobby_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`id`, `name`, `email_address`, `gender`, `contact_no`, `address`, `photo_path`, `joining_date`, `dob`, `department_id`, `education_id`, `experience`, `hobby_id`) VALUES
(14, 'Krish', 'testemailkrish43gmail.com', 'male', '6767867676', 'test user address', 'images/defualt_student_img.png', '2022-04-09', '2002-08-22', '1', '1', '3', '2'),
(16, 'New Krishna', 'newtestKrishna@gmail.com', 'male', '45454545', 'test address', 'images/IMG_1441692532862.jpg', '2022-04-06', '2020-03-10', '1', '1', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hobby`
--

CREATE TABLE `hobby` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hobby`
--

INSERT INTO `hobby` (`id`, `name`) VALUES
(1, 'Singing'),
(2, 'Cricket'),
(3, 'Dancing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `hobby`
--
ALTER TABLE `hobby`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hobby`
--
ALTER TABLE `hobby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
