-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 04:21 PM
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
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_id` varchar(60) DEFAULT NULL,
  `emp_id` varchar(60) DEFAULT NULL,
  `user_type` varchar(60) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `assigned_to` varchar(60) DEFAULT NULL,
  `assigned_role` varchar(60) DEFAULT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `complaint_id`, `emp_id`, `user_type`, `status`, `assigned_to`, `assigned_role`, `notes`) VALUES
(7, 62, '57', 'p-ni00211', 'Supervisor', 'Accept', NULL, NULL, 'dwqefdwe'),
(10, 62, '52', 'p-ni00211', 'Supervisor', 'Accept', NULL, NULL, 'hyrtujtyiju'),
(14, 62, '48', 'p-ni00211', 'Supervisor', 'Accept', NULL, NULL, 'this is raped'),
(15, 62, '51', 'p-ni00211', 'Supervisor', 'Accept', NULL, NULL, 'dyre45u46');

-- --------------------------------------------------------

--
-- Table structure for table `panels`
--

CREATE TABLE `panels` (
  `id` int(11) NOT NULL,
  `complaint_user_id` int(11) NOT NULL,
  `p_empid` varchar(50) DEFAULT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_email` varchar(200) DEFAULT NULL,
  `p_scribe` varchar(50) DEFAULT NULL,
  `supervisor_id` varchar(50) DEFAULT NULL,
  `supervisor_name` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panels`
--

INSERT INTO `panels` (`id`, `complaint_user_id`, `p_empid`, `p_name`, `p_email`, `p_scribe`, `supervisor_id`, `supervisor_name`, `role`) VALUES
(1, 48, 'p-ni0011', 'Satyam', 'satyam@gmail.com', 'Yes', '62', 'Sweta', 'panel'),
(2, 51, 'p-ni00234', 'Pooja', 'a23423@gmail.com', 'Yes', '62', 'Sweta', 'panel');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(10) NOT NULL,
  `complaint_id` varchar(255) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
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
  `complaint_id_genrate_date` date DEFAULT NULL,
  `last_access` bigint(10) DEFAULT NULL,
  `lastip` varchar(45) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL,
  `video_upload` varchar(255) NOT NULL,
  `severity` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `complaint_id`, `user_type`, `role`, `empid`, `confirmed`, `name`, `username`, `password`, `pass`, `email`, `mobile`, `bu`, `department`, `city`, `work_location`, `c_title`, `c_subject`, `other_issue`, `c_option`, `c_tried_r_own`, `notes`, `concern_details`, `position`, `attach_data`, `policy_agreed`, `first_access`, `complaint_id_genrate_date`, `last_access`, `lastip`, `status`, `upload`, `video_upload`, `severity`) VALUES
(47, 'STEP245764p-ni002', 'Accuser', 'Accuser', 'p-ni002', 1, 'Abhishek', 'abhishekkumargupta33@gmail.co', '$2y$10$rx5pUwz6DJYgZw8ezjqYpOe6tKBRWleCuSi7ndl0Hfc2hTX4gdIc.', 'My95144800', 'abhishekkumargupta33@gmail.co', '7503275011', 'it', NULL, '', 'Gurgaon', 'Abhishek', 'Business Ethics', 'testing', 'No', 'No', 'testing', 'no concern', NULL, NULL, '1', '27.06.2018', '0000-00-00', NULL, NULL, 'Accept', NULL, '', 'Low'),
(48, 'STEP459643p-ni003', 'Accuser', 'Accuser', 'p-ni003', 1, 'Akash', 'Akash', '$2y$10$4Kni4kXgAHT2skOn8NNAPukgPeOpSPsF558Y6PwbeDY7.EV5aCs5y', 'My03992000', 'abhishekkkumargupta33@gmail.com', '75032750112', 'its', NULL, 'Varansi', 'Noida', 'Akash', 'Business Ethics', '', 'Yes', 'No', 'no', 'no concern', NULL, NULL, '1', '27.06.2018', '0000-00-00', NULL, NULL, '1', NULL, '', NULL),
(50, '', 'Supervisor', NULL, 'p-ni0024', NULL, 'Pooja', 'Pooja', '$2y$10$Oc98qQJhAX/YclcEP5TgGeAqpt5/RNxWawbQQVmahVNalzGs.tKFe', NULL, 'abhishekkumargupta323@gmail.com', '7503275011', 'bu1', NULL, 'Gurgaon', 'Gurgaon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hr', NULL, '1', NULL, '0000-00-00', NULL, NULL, NULL, NULL, '', NULL),
(51, 'STEP632042p-ni0022', 'Accuser', 'Accuser', 'p-ni0022', 1, 'Sangita', 'Sangita', '$2y$10$Oc98qQJhAX/YclcEP5TgGeAqpt5/RNxWawbQQVmahVNalzGs.tKFe', 'My51473900', 'abhishekkumargupta3233@gmail.com', '7503275011', 'it', NULL, 'Varansi', 'Gurgaon', 'Sangita', 'Harassment', '', '', 'Yes', '', 'no concern', NULL, NULL, '1', '28.06.2018', '0000-00-00', NULL, NULL, '1', NULL, '', NULL),
(52, 'STEP146758p-ni00243', 'Accuser', 'Accuser', 'p-ni00243', 1, 'Shilpa', 'Shilpa', '$2y$10$NkijC386pmY0ohthA.LNVenzLlfzp3H9b3M3DKwNsfIs7TtFH8vaS', 'My86199700', 'shilpa@gmail.com', '750327501122', '', NULL, 'Allahabad', 'Gurgaon', 'Displinary', 'Disciplinary', '', 'Yes', 'No', 'no', 'eee', NULL, NULL, '1', '28.06.2018', '0000-00-00', NULL, NULL, '1', NULL, '', NULL),
(53, 'STEP513129p-ni00242', 'Accuser', 'Accuser', 'p-ni00242', 1, 'Ankita', 'Ankita', '$2y$10$qpQgYAn30iN2BaP0Qiidme.6dtnbG01RdTpdNze2hOe4opIbuuwzy', 'My96519000', 'ankita@mail.com', '7503275011', 'it', NULL, 'Allahabad', 'Noida', 'Bussiness Ethicas', 'Business Ethics', '', 'Yes', 'Yes', 'no', 'yes', NULL, NULL, '1', '28.06.2018', '0000-00-00', NULL, NULL, '1', NULL, '', NULL),
(55, 'STEP838702p-ni00243', 'Accuser', 'Accuser', 'p-ni00243', 1, 'Abhishek', 'Abhishek', '$2y$10$nZk1sgHpa8Fi413MU2V5lufRc/TujjggzmMzw15jAYt4wVWDR8qs2', 'My04908000', 'abhishekkumargupta323@gmail.com', '7503275011', 'it', NULL, 'Allahabad', 'Gurgaon', 'Raped', 'Business Ethics', '', 'Yes', 'No', '', 'no', NULL, NULL, '1', '28.06.2018', '0000-00-00', NULL, NULL, '1', NULL, '', 'Medium'),
(57, 'STEP688708', 'Accuser', 'Accuser', '', 1, 'Sapna', 'Sapna', '$2y$10$.Z8hd51BozXLqLfvjU1IYOIVdKxkh.0F.tKj/9WWxRBqyLgjiAIua', 'My34481300', 'abhishekkumadwargupta33@gmail.com', '', 'fds', NULL, 'fs', 'fs', 'dasfd', 'Harassment', '', 'Yes', 'Yes', '', 'dfas', NULL, NULL, '1', '28.06.2018', '0000-00-00', NULL, NULL, 'Accept', NULL, '', NULL),
(62, NULL, 'Supervisor', NULL, 'p-ni00211', NULL, 'Sweta', 'Sweta', '$2y$10$DFLqon6mxrkZAXR9xz8byeL0zBkTtHYZnySCUO8a2XPAlFYJ0Kl32', 'My82598100', 'abhishekkumargupt23a33@gmail.com', '86786797890', 'bu2', NULL, 'Gurgaon', 'Gurgaon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hr', NULL, '1', NULL, '0000-00-00', NULL, NULL, NULL, NULL, '', NULL),
(72, 'STEP381468', 'Accuser', 'Accuser', '', 1, '', '', '$2y$10$vQ0Fjl/RVwkYP9cdVzulWepGY0.d9uM6a6zc.3qMFfPTAP1Fu9/ny', 'My68746800', 'abhishekkkumargupta33@gmail.com', '', '', NULL, '', '', 'Abhishek', 'Harassment', '', 'Yes', 'Yes', '', 'rtytruyt', NULL, 'vik.wmv,vikky.wmv', '1', '29.06.2018', '0000-00-00', NULL, NULL, '1', NULL, '', NULL),
(73, 'STEP053839p-ni0024', 'Accuser', 'Accuser', 'p-ni0024', 1, 'Avani', 'Avani', '$2y$10$H9jvSOmrl5GyG//GPgZmfOLUhubx0uAlaKVHLLW4.jyHcHriJoeze', 'My86863400', 'abhishekkkumarg243upta33@gmail.com', '7503275011', 'it', NULL, 'Allahabad', 'Thane', 'raped with me', 'Disciplinary', '', 'Yes', 'No', '', 'no', NULL, 'linux.PNG,pr-multiple upload screenshort.png', '1', '02.07.2018', '0000-00-00', NULL, NULL, 'Accept', NULL, '', NULL),
(74, NULL, 'Accuser', 'Accuser', 'qua03876', 1, 'Sanjeev', 'Sanjeev', '$2y$10$.Jz/KS4vSIFkKc0hwG5pvO9ubLw1.cQb6z4OAC3PMKmjshlVRN4DW', 'My52626200', 'sanjeev.yadav@quatrro.com', '9582402696', 'Quatrro Global Services Pvt Ltd', NULL, 'Gurgaon', 'Gurgaon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '05.07.2018', '0000-00-00', NULL, NULL, '1', NULL, '', NULL),
(84, NULL, 'Reg_user', 'Accuser', '', 1, NULL, '', '$2y$10$wuAQ.pSvbEEzNActcrD1/.7QF/iH1eGQ665qRdSdv3JQWsXoj6hpW', 'My20347500', 'abhishekkkum123453argupta33@gmail2.com', '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '05.07.2018', '0000-00-00', NULL, NULL, '1', NULL, '', NULL),
(85, NULL, 'Reg_user', 'Accuser', '', 1, '', 'sanjeev.yadav@mail.com', '$2y$10$UJhFZPqWfEDBitacXQBovuC0rowGvbhf58GgUOHoOstGJrud2BZqy', 'My94085500', 'sanjeev.yadav@mail.com', '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '05.07.2018', '0000-00-00', NULL, NULL, '1', NULL, '', NULL),
(86, 'My8326', 'Reg_user', 'Assuser', '453663', 1, 'Abhishek', 'abhishek33@gmail.com', '$2y$10$RPCVcyqjVWNyKIqRbgK3uezK500DG2h.tECGOUSHpM.micLjgVcJi', 'My52260300', 'abhishek33@gmail.com', '242352543', 'bi', NULL, 'Allhabad', 'Gurgaon', 'fesrty4e5y4ru76454r7', 'Disciplinary', '', 'Yes', 'No', 'uilpop', 'afswsetfgwsioupi0[', NULL, '', '1', '05.07.2018', '0000-00-00', NULL, NULL, 'new', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `witns`
--

CREATE TABLE `witns` (
  `id` int(11) NOT NULL,
  `wi_name` varchar(255) DEFAULT NULL,
  `wi_bu` varchar(255) DEFAULT NULL,
  `wi_city` varchar(255) DEFAULT NULL,
  `wi_location` varchar(255) DEFAULT NULL,
  `wi_empid` varchar(255) DEFAULT NULL,
  `wi_email_id` varchar(255) DEFAULT NULL,
  `a_useremail` varchar(100) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `witns`
--

INSERT INTO `witns` (`id`, `wi_name`, `wi_bu`, `wi_city`, `wi_location`, `wi_empid`, `wi_email_id`, `a_useremail`, `relationship`, `user_id`) VALUES
(54, 'Asad', 'Abhishek', 'Delhi', 'kapershera', 'p-ni002', NULL, NULL, 'developer', NULL),
(55, 'aBHISHEK', 'ASFSGFZ', 'Allhabad', 'Gurgaon', 'p-ni002', 'abh12i@gmail.com', NULL, 'gsj', NULL),
(56, 'aBHISHEK', 'ASFSGFZ', 'Allhabad', 'Gurgaon', 'p-ni002', 'abh12i@gmail.com', NULL, 'gsj', NULL),
(81, 'Aman', 'it', 'Gurgaon', 'Allahabad', 'p-nioo78', 'aman@mail.com', NULL, 'Coligus', 52),
(82, 'Rajeev', 'it', 'Noida', 'Allahabad', 'p-nioo784', 'Rajeev@mail.com', NULL, 'Coligus', NULL),
(83, 'Aman', 'it', 'Gurgaon', 'Allahabad', 'p-nioo7823', 'aman2@mail.com', NULL, 'Coligus', NULL),
(84, 'sdff', 'dfs', 'fsdf', 'sgdsfg', 'sdgdsfg', 'aman1234@mail.com', NULL, 'gd', NULL),
(85, 'EDAd', 'wsd', 'dsa', 'ads', 'dsa', 'aman1qw234@mail.com', NULL, 'asdafds', NULL),
(86, 'da', 'dfs', 'd', 'sdad', 'p-nioo78wqa', 'amwwwan@mail.com', 'abhishekkumadwargupta33@gmail.com', 'Coligus', 57),
(87, 'Sah', 'hr', '', 'Chennai', 'p-ni334', 'abh12i234@gmail.com', 'abhishekkkumarg243upta33@gmail.com', 'coligus', 73);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panels`
--
ALTER TABLE `panels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `witns`
--
ALTER TABLE `witns`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `panels`
--
ALTER TABLE `panels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `witns`
--
ALTER TABLE `witns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
