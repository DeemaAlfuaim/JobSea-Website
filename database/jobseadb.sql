-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 05:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobseadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicationstatus`
--

CREATE TABLE `applicationstatus` (
  `id` int(20) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicationstatus`
--

INSERT INTO `applicationstatus` (`id`, `status`) VALUES
(1, 'under consideration'),
(2, 'request for interview'),
(3, 'declined'),
(4, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `jobapplication`
--

CREATE TABLE `jobapplication` (
  `id` int(20) NOT NULL,
  `job_offer_id` int(20) NOT NULL,
  `job_seeker_id` int(20) NOT NULL,
  `application_status_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobapplication`
--

INSERT INTO `jobapplication` (`id`, `job_offer_id`, `job_seeker_id`, `application_status_id`) VALUES
(1111, 1111, 864818, 1),
(2222, 2222, 864818, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jobcategory`
--

CREATE TABLE `jobcategory` (
  `id` int(20) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobcategory`
--

INSERT INTO `jobcategory` (`id`, `category`) VALUES
(1, 'CS'),
(2, 'IT'),
(3, 'IS');

-- --------------------------------------------------------

--
-- Table structure for table `joboffer`
--

CREATE TABLE `joboffer` (
  `id` int(20) NOT NULL,
  `job_provider_id` int(20) NOT NULL,
  `job_category_id` int(20) NOT NULL,
  `title` varchar(30) NOT NULL,
  `full_time` varchar(20) NOT NULL,
  `salary` int(12) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `requirements` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joboffer`
--

INSERT INTO `joboffer` (`id`, `job_provider_id`, `job_category_id`, `title`, `full_time`, `salary`, `location`, `description`, `requirements`) VALUES
(1111, 111, 2, 'web developer', 'full time', 25000, 'riyadh', 'ssss', 'sssss'),
(2222, 222, 2, 'UX designer', 'full time', 20000, 'riyadh', 'we are looking for UX designer that can improve user experience for our product', 'experience with UX design\r\nprototyping'),
(3333, 333, 2, 'manager', 'full time', 20000, 'riyadh', 'aaaa', 'aaaa'),
(4444, 111, 1, 'analytical', 'full time', 25000, 'riyadh', 'zzz', 'zzz'),
(5555, 111, 3, 'developer', 'full time', 32000, 'jeddah', 'zzz', 'zzz');

-- --------------------------------------------------------

--
-- Table structure for table `jobprovider`
--

CREATE TABLE `jobprovider` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `main_location` varchar(30) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobprovider`
--

INSERT INTO `jobprovider` (`id`, `name`, `main_location`, `phone_number`, `email_address`, `username`, `password`) VALUES
(111, 'Deema', 'Riyadh', '0560880708', 'Deema@gmail.com', 'Deema1', '$2y$10$qPWKAKP3.BoUvrOIzfiP6uZ4LAjJTdNm1aoRaKXsQGGNJRuLtgnNW'),
(222, 'Ahmad', 'Jeddah', '0562250809', 'Ahmad@gmail.com', 'Ahmad1', '$2y$10$CZOpMWUOBwcZ2kWxv9BUYeRnvp70XFSA72hgxzTZJMJjIDfHlZnki'),
(333, 'Hessah', 'Dammam', '055660706', 'Hessah@gmail.com', 'Hessah1', '$2y$10$C5MXzVQ1H4WcCjEk13Lxn.w4ueLzmY7CPRZfZcqkxBH.pw3DPNgIa');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `id` int(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `qualifications` varchar(30) NOT NULL,
  `work_experience` varchar(200) NOT NULL,
  `languages` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`id`, `first_name`, `last_name`, `age`, `qualifications`, `work_experience`, `languages`, `phone_number`, `email_address`, `password`) VALUES
(130080, 'Mohammed', 'Alfuaim', 21, 'Bachelor', 'STCPAY , From:  2021-01-20 To: 2021-08-20', 'English Arabic Chinese ', '0592250707', 'Mohammed@gmail.com', '$2y$10$MCPs4n5CxwUzakHjIl7ikOoHpVoOKHiQtXFH6Il8QvQ6i4boRLswi'),
(804327, 'Noura', 'Alsaleh', 37, 'PHD', 'KAUST , From:  2016-01-21 To: 2020-07-20', 'English Arabic ', '0544230567', 'Noura@gmail.com', '$2y$10$qdKYz6imVfyiFlzCzWZrZuNQUMvIVP5/e5yg4RIKKhY9lDouAzJb2'),
(864818, 'Sara', 'Ahmad', 24, 'Master', 'ksu , From:  2015-09-01 To: 2021-12-20', 'Arabic Chinese ', '0554442806', 'sara@gmail.com', '$2y$10$KilUkDYr8WKf7RIbb4D81unO.3Aood6JStRmLj5nrS1r1TEMWIssG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicationstatus`
--
ALTER TABLE `applicationstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobapplication`
--
ALTER TABLE `jobapplication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_offer_id` (`job_offer_id`),
  ADD KEY `job_seeker_id` (`job_seeker_id`),
  ADD KEY `application_status_id` (`application_status_id`);

--
-- Indexes for table `jobcategory`
--
ALTER TABLE `jobcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joboffer`
--
ALTER TABLE `joboffer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_provider_id` (`job_provider_id`),
  ADD KEY `job_category_id` (`job_category_id`);

--
-- Indexes for table `jobprovider`
--
ALTER TABLE `jobprovider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobapplication`
--
ALTER TABLE `jobapplication`
  ADD CONSTRAINT `jobapplication_ibfk_1` FOREIGN KEY (`application_status_id`) REFERENCES `applicationstatus` (`id`),
  ADD CONSTRAINT `jobapplication_ibfk_2` FOREIGN KEY (`job_seeker_id`) REFERENCES `jobseeker` (`id`),
  ADD CONSTRAINT `jobapplication_ibfk_3` FOREIGN KEY (`job_offer_id`) REFERENCES `joboffer` (`id`);

--
-- Constraints for table `joboffer`
--
ALTER TABLE `joboffer`
  ADD CONSTRAINT `joboffer_ibfk_1` FOREIGN KEY (`job_provider_id`) REFERENCES `jobprovider` (`id`),
  ADD CONSTRAINT `joboffer_ibfk_2` FOREIGN KEY (`job_category_id`) REFERENCES `jobcategory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
