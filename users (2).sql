-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 01:15 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myvoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(10) NOT NULL,
  `complaint_id` varchar(255) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `empid` varchar(255) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `bu` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `city` varchar(120) DEFAULT NULL,
  `work_location` varchar(120) DEFAULT NULL,
  `c_title` varchar(100) DEFAULT NULL,
  `c_subject` varchar(100) DEFAULT NULL,
  `other_issue` varchar(255) DEFAULT NULL,
  `c_option` varchar(100) DEFAULT NULL,
  `c_tried_r_own` varchar(100) DEFAULT NULL,
  `notes` text,
  `concern_details` varchar(255) DEFAULT NULL,
  `position` varchar(200) DEFAULT NULL,
  `attach_data` varchar(255) DEFAULT NULL,
  `policy_agreed` varchar(1) DEFAULT '1',
  `first_access` varchar(10) DEFAULT NULL,
  `last_access` bigint(10) DEFAULT NULL,
  `lastip` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `complaint_id`, `user_type`, `empid`, `confirmed`, `name`, `username`, `password`, `pass`, `email`, `mobile`, `bu`, `department`, `city`, `work_location`, `c_title`, `c_subject`, `other_issue`, `c_option`, `c_tried_r_own`, `notes`, `concern_details`, `position`, `attach_data`, `policy_agreed`, `first_access`, `last_access`, `lastip`, `status`, `upload`) VALUES
(47, 'STEP245764p-ni002', 'Anonymous', 'p-ni002', 1, 'Abhishek', 'Abhishek', '$2y$10$rx5pUwz6DJYgZw8ezjqYpOe6tKBRWleCuSi7ndl0Hfc2hTX4gdIc.', 'My95144800', 'abhishekkumargupta33@gmail.com', '7503275011', 'it', NULL, '', 'Gurgaon', 'Abhishek', 'Others', 'testing', 'No', 'No', 'testing', 'no concern', NULL, NULL, '1', '27.06.2018', NULL, NULL, 1, NULL),
(48, 'STEP459643p-ni003', 'Anonymous', 'p-ni003', 1, 'Akash', 'Akash', '$2y$10$4Kni4kXgAHT2skOn8NNAPukgPeOpSPsF558Y6PwbeDY7.EV5aCs5y', 'My03992000', 'abhishekkkumargupta33@gmail.com', '75032750112', 'its', NULL, 'Varansi', 'Noida', 'Akash', 'Business Ethics', '', 'Yes', 'No', 'no', 'no concern', NULL, NULL, '1', '27.06.2018', NULL, NULL, 1, NULL),
(49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL),
(50, NULL, 'Supervisor', 'p-ni0024', NULL, 'Pooja', 'Pooja', NULL, NULL, 'abhishekkumargupta323@gmail.com', '7503275011', 'bu1', NULL, 'Gurgaon', 'Gurgaon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hr', NULL, '1', NULL, NULL, NULL, NULL, NULL),
(51, NULL, 'Supervisor', 'p-ni0024', NULL, 'Pooja', 'Pooja', NULL, NULL, 'abhishekkumargupta323@gmail.com', '7503275011', 'bu1', NULL, 'Gurgaon', 'Gurgaon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hr', NULL, '1', NULL, NULL, NULL, NULL, NULL),
(52, NULL, 'Supervisor', 'p-ni0024', NULL, 'Pooja', 'Pooja', NULL, NULL, 'abhishekkumargupta323@gmail.com', '7503275011', 'bu1', NULL, 'Gurgaon', 'Gurgaon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hr', NULL, '1', NULL, NULL, NULL, NULL, NULL),
(53, NULL, 'Supervisor', 'p-ni0024', NULL, 'Pooja', 'Pooja', NULL, NULL, 'abhishekkumargupta323@gmail.com', '7503275011', 'bu1', NULL, 'Gurgaon', 'Gurgaon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hr', NULL, '1', NULL, NULL, NULL, NULL, NULL),
(54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
