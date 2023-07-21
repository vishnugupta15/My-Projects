-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 01:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `result_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_name`
--

CREATE TABLE `class_name` (
  `id` int(25) NOT NULL,
  `class_code` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_create_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_name`
--

INSERT INTO `class_name` (`id`, `class_code`, `class_name`, `class_create_date`) VALUES
(1, 'C04C01', 'B.Tech Computer Science 1st Sem', '11-08-2022 11:41'),
(4, 'C04C02', 'B.Tech Computer Science 2nd Sem', '11-08-2022 11:41'),
(5, 'C04C03', 'B.Tech Computer Science 3rd Sem', '11-08-2022 11:45'),
(6, 'C04C04', 'B.Tech Computer Science 4th Sem', '11-08-2022 11:45'),
(7, 'C04C05', 'B.Tech Computer Science 5th Sem', '11-08-2022 11:46'),
(13, 'C04C06', 'B.Tech Computer Science 6th Sem', '12-08-2022 08:24'),
(16, 'E01E01', 'B.Tech Electrical 1st Sem', '14-08-2022 09:04'),
(17, 'E01E02', 'B.Tech Electrical 2nd Sem ', '14-08-2022 10:21'),
(18, 'E01E03', 'B.Tech Electrical 3rd Sem', '14-08-2022 10:23'),
(19, 'E01E04', 'B.Tech Electrical 4th Sem', '14-08-2022 10:24'),
(20, 'E01E05', 'B.Tech Electrical 5th Sem', '14-08-2022 10:24'),
(21, 'E01E06', 'B.Tech Electrical 6th Sem', '14-08-2022 10:24'),
(22, 'E03E01', 'B.Tech  Electronics & Tele Communication 1st Sem', '14-08-2022 10:35'),
(23, 'E03E02', 'B.Tech  Electronics & Tele Communication 2nd Sem', '14-08-2022 10:35'),
(24, 'E03E03', 'B.Tech  Electronics & Tele Communication 3rd Sem', '14-08-2022 10:35'),
(25, 'E03E04', 'B.Tech  Electronics & Tele Communication 4th Sem', '14-08-2022 10:36'),
(26, 'E03E05', 'B.Tech  Electronics & Tele Communication 5th Sem', '14-08-2022 10:36'),
(27, 'E03E06', 'B.Tech  Electronics & Tele Communication 6th Sem', '14-08-2022 10:36'),
(28, 'M02M01', 'B.Tech Mechanical 1st Sem', '14-08-2022 10:42'),
(29, 'M02M02', 'B.Tech Mechanical 2nd Sem', '14-08-2022 10:37'),
(30, 'M02M03', 'B.Tech Mechanical 3rd Sem', '14-08-2022 10:38'),
(31, 'M02M04', 'B.Tech Mechanical 4th Sem', '14-08-2022 10:38'),
(32, 'M02M05', 'B.Tech Mechanical 5th Sem', '14-08-2022 10:38'),
(33, 'M02M06', 'B.Tech Mechanical 6th Sem', '14-08-2022 10:38'),
(41, 'C01C01', 'B.Tech Civil 1st Sem', '19-08-2022 01:03'),
(45, 'I05I02', 'B.Tech Information Technology 2nd Sem', '29-08-2022 12:15');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pswd` varchar(70) NOT NULL,
  `profile_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `pswd`, `profile_image`) VALUES
(1, 'Admin', 'admin', 'admin', 'C:\\xampp\\htdocs\\Result Managment\\admin\\img\\Prashant Jain.png');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `marks_id` int(10) NOT NULL,
  `result_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`marks_id`, `result_id`, `subject_id`, `marks`) VALUES
(1, 1, 96, 55),
(2, 1, 97, 65),
(3, 1, 98, 85),
(4, 1, 99, 95),
(5, 2, 101, 85),
(6, 2, 102, 88),
(7, 2, 103, 72),
(8, 2, 104, 52),
(9, 3, 15, 88),
(10, 3, 36, 72),
(11, 3, 37, 78),
(12, 3, 38, 93),
(13, 4, 15, 48),
(14, 4, 36, 58),
(15, 4, 37, 68),
(16, 4, 38, 88);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(25) NOT NULL,
  `class_id` int(25) NOT NULL,
  `student_id` int(25) NOT NULL,
  `total_marks` int(10) NOT NULL,
  `percentage` int(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `result_create_date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `class_id`, `student_id`, `total_marks`, `percentage`, `status`, `result_create_date`) VALUES
(3, 13, 7, 331, 83, 'PASS', '29-08-2022'),
(4, 13, 22, 262, 66, 'PASS', '29-08-2022');

-- --------------------------------------------------------

--
-- Table structure for table `student_name`
--

CREATE TABLE `student_name` (
  `id` int(25) NOT NULL,
  `class_id` int(25) NOT NULL,
  `student_roll_no` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `student_created_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_name`
--

INSERT INTO `student_name` (`id`, `class_id`, `student_roll_no`, `student_name`, `student_email`, `class`, `gender`, `dob`, `student_created_date`) VALUES
(2, 1, '21105C0401017', 'Prashant Dhakad', 'prashantdhakad@gmail.com', 'B.Tech Computer Science 1st Sem', 'Male', '2005-01-01', '12-08-2022 11:58'),
(3, 4, '21105C0402018', 'Rohit Kushwaha', 'rohitkushwaha@gmail.com', 'B.Tech Computer Science 2nd Sem', 'Male', '2005-02-01', '12-08-2022 11:58'),
(4, 5, '20105C0401008', 'Dusyant Singh Bais', 'dusyant@gmail.com', 'B.Tech Computer Science 3rd Sem', 'Male', '2004-01-01', '12-08-2022 11:59'),
(5, 6, '20105C0402025', 'Pranav Tiwari', 'pranav@gmail.com', 'B.Tech Computer Science 4th Sem', 'Male', '2004-01-01', '12-08-2022 12:00'),
(6, 7, '19105C0401024', 'Ravi Reddy', 'ravi@gmail.com', 'B.Tech Computer Science 5th Sem', 'Male', '1999-01-01', '12-08-2022 12:01'),
(7, 13, '19105C0402017', 'Prashant Jain', 'prashantjain@gmail.com', 'B.Tech Computer Science 6th Sem', 'Male', '2002-02-02', '12-08-2022 12:01'),
(8, 13, '19105C0402018', 'Priyanshu Udainiya', 'priyanshu@gmail.com', 'B.Tech Computer Science 6th Sem', 'Male', '2001-05-15', '12-08-2022 01:03'),
(9, 16, '21105E0101015', 'Mahak Dubey', 'mahak@gmail.com', 'B.Tech Electrical 1st Sem', 'Female', '2005-12-03', '14-08-2022 09:10'),
(18, 21, '19105C0402001', 'Abhishek Rajak', 'abhishekrajak@gmail.com', 'B.Tech Computer Science 6th Sem', 'Male', '2005-12-09', '26-08-2022 04:00'),
(22, 13, '21105C04025', 'Shishansh Birthare', 'shishansh@gmail.com', 'B.Tech Computer Science 6th Sem', 'Male', '2003-01-01', '29-08-2022 12:14');

-- --------------------------------------------------------

--
-- Table structure for table `subject_name`
--

CREATE TABLE `subject_name` (
  `id` int(25) NOT NULL,
  `class_id` int(25) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_created_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_name`
--

INSERT INTO `subject_name` (`id`, `class_id`, `subject_code`, `class_name`, `subject_name`, `subject_created_date`) VALUES
(15, 13, 'C04S601', 'B.Tech Computer Science 6th Sem', 'Data Science', '12-08-2022 09:55'),
(16, 1, 'C04S101', 'B.Tech Computer Science 1st Sem', 'Introduction To Computer', '12-08-2022 10:00'),
(17, 1, 'C04S103', 'B.Tech Computer Science 1st Sem', 'Physics', '12-08-2022 10:33'),
(18, 1, 'C04S102', 'B.Tech Computer Science 1st Sem', 'Communication Skills', '12-08-2022 10:35'),
(19, 1, 'C04S104', 'B.Tech Computer Science 1st Sem', 'Math', '12-08-2022 10:01'),
(20, 4, 'C04S201', 'B.Tech Computer Science 2nd Sem', 'C Programming', '12-08-2022 10:01'),
(21, 4, 'C04S202', 'B.Tech Computer Science 2nd Sem', 'Digital Technique', '12-08-2022 10:01'),
(22, 4, 'C04S203', 'B.Tech Computer Science 2nd Sem', 'Basics of Electrical, Electronics & Measurement', '12-08-2022 10:05'),
(23, 4, 'C04S204', 'B.Tech Computer Science 2nd Sem', ' Environmental Engineering & Safety', '12-08-2022 10:06'),
(24, 5, 'C04S301', 'B.Tech Computer Science 3rd Sem', 'Computer Arcitecture', '12-08-2022 10:06'),
(25, 5, 'C04S302', 'B.Tech Computer Science 3rd Sem', ' Data Structure and Algorithm', '14-08-2022 09:19'),
(26, 5, 'C04S303', 'B.Tech Computer Science 3rd Sem', ' Operating System', '12-08-2022 10:07'),
(27, 5, 'C04S304', 'B.Tech Computer Science 3rd Sem', 'Python Programming', '12-08-2022 10:07'),
(28, 6, 'C04S401', 'B.Tech Computer Science 4th Sem', ' Linux And Shell Programming', '12-08-2022 10:08'),
(29, 6, 'C04S402', 'B.Tech Computer Science 4th Sem', ' Computer Network', '12-08-2022 10:08'),
(30, 6, 'C04S403', 'B.Tech Computer Science 4th Sem', ' Database Management', '12-08-2022 10:08'),
(31, 6, 'C04S404', 'B.Tech Computer Science 4th Sem', ' Web Technology', '12-08-2022 10:09'),
(32, 7, 'C04S501', 'B.Tech Computer Science 5th Sem', ' Java Programming', '12-08-2022 10:09'),
(33, 7, 'C04S502', 'B.Tech Computer Science 5th Sem', ' Software Engineering', '12-08-2022 10:09'),
(34, 7, 'C04S503', 'B.Tech Computer Science 5th Sem', ' Theory of Computation', '12-08-2022 10:10'),
(35, 7, 'C04S504', 'B.Tech Computer Science 5th Sem', 'Artificial Intelligence & Expert System', '12-08-2022 10:10'),
(36, 13, 'C04S602', 'B.Tech Computer Science 6th Sem', ' Network & Cyber Security', '12-08-2022 10:11'),
(37, 13, 'C04S603', 'B.Tech Computer Science 6th Sem', ' Internet Of Things', '12-08-2022 10:11'),
(38, 13, 'C04S604', 'B.Tech Computer Science 6th Sem', 'Project', '12-08-2022 10:12'),
(40, 16, 'E01S101', 'B.Tech Electrical 1st Sem', 'Communication Skills in English', '14-08-2022 09:08'),
(41, 16, 'E01S102', 'B.Tech Electrical 1st Sem', ' Physics', '14-08-2022 09:08'),
(42, 16, 'E01S103', 'B.Tech Electrical 1st Sem', ' Chemistry', '14-08-2022 09:08'),
(43, 16, 'E01S104', 'B.Tech Electrical 1st Sem', ' Mathematics', '14-08-2022 09:09'),
(44, 17, 'E01S201', 'B.Tech Electrical 2nd Sem ', 'Basic Electronics', '14-08-2022 10:22'),
(45, 17, 'E01S202', 'B.Tech Electrical 2nd Sem ', ' Environmental Engineering & Safety', '14-08-2022 10:22'),
(46, 17, 'E01S203', 'B.Tech Electrical 2nd Sem ', ' Basic Electrical Engineering', '14-08-2022 10:22'),
(47, 17, 'E01S204', 'B.Tech Electrical 2nd Sem ', ' Introduction to Computers', '14-08-2022 10:23'),
(48, 18, 'E01S301', 'B.Tech Electrical 3rd Sem', 'DC Machines and Transformers', '14-08-2022 10:31'),
(49, 18, 'E01S302', 'B.Tech Electrical 3rd Sem', 'Electrical & Electronics Measurements Measuring Instruments', '14-08-2022 10:31'),
(50, 18, 'E01S303', 'B.Tech Electrical 3rd Sem', 'General Mechanical Engineering', '14-08-2022 10:31'),
(51, 18, 'E01S304', 'B.Tech Electrical 3rd Sem', 'Electrical Circuits', '14-08-2022 10:31'),
(52, 19, 'E01S401', 'B.Tech Electrical 4th Sem', 'Rotating Ac Machines', '14-08-2022 10:31'),
(53, 19, 'E01S402', 'B.Tech Electrical 4th Sem', 'Generation Transmission & Distribution(GTD)', '14-08-2022 10:30'),
(54, 19, 'E04S403', 'B.Tech Electrical 4th Sem', 'Instrumentation', '14-08-2022 10:30'),
(55, 19, 'E01S404', 'B.Tech Electrical 4th Sem', 'Electrical Engineering Drawing Using Cad', '14-08-2022 10:30'),
(56, 20, 'E01S501', 'B.Tech Electrical 5th Sem', 'Power System Operation and Protection', '14-08-2022 10:30'),
(57, 20, 'E01S502', 'B.Tech Electrical 5th Sem', 'Power Electronics and Applications', '14-08-2022 10:30'),
(58, 20, 'E01S503', 'B.Tech Electrical 5th Sem', 'Estimation , Costing & Contracting', '14-08-2022 10:29'),
(59, 20, 'E01S504', 'B.Tech Electrical 5th Sem', 'Control System and Industrial Automation', '14-08-2022 10:29'),
(60, 21, 'E01S601', 'B.Tech Electrical 6th Sem', 'Installation Maintenance And Testing', '14-08-2022 10:32'),
(61, 21, 'E01S602', 'B.Tech Electrical 6th Sem', 'Renewable Energy Technologies', '14-08-2022 10:32'),
(62, 21, 'E01S603', 'B.Tech Electrical 6th Sem', 'Utilization Of Electrical Energy & Traction', '14-08-2022 10:32'),
(63, 21, 'E01S604', 'B.Tech Electrical 6th Sem', 'Major Project', '14-08-2022 10:33'),
(64, 28, 'M02S101', 'B.Tech Mechanical 1st Sem', 'Applied Mechanics', '14-08-2022 10:43'),
(65, 28, 'M02S102', 'B.Tech Mechanical 1st Sem', 'Environmental Engineering & Safety', '14-08-2022 10:44'),
(66, 28, 'M02S103', 'B.Tech Mechanical 1st Sem', 'Introduction to Computers', '14-08-2022 10:43'),
(67, 28, 'M02S104', 'B.Tech Mechanical 1st Sem', 'Engineering Drawing', '14-08-2022 10:44'),
(68, 29, 'M02S201', 'B.Tech Mechanical 2nd Sem', 'Communication Skills in English', '14-08-2022 10:45'),
(69, 29, 'M02S202', 'B.Tech Mechanical 2nd Sem', 'Physics', '14-08-2022 10:45'),
(70, 29, 'M02S203', 'B.Tech Mechanical 2nd Sem', 'Chemistry', '14-08-2022 10:45'),
(71, 29, 'M02S204', 'B.Tech Mechanical 2nd Sem', 'Mathematics', '14-08-2022 10:45'),
(72, 30, 'M02S301', 'B.Tech Mechanical 3rd Sem', 'Manufacturing Process', '14-08-2022 10:46'),
(73, 30, 'M02S302', 'B.Tech Mechanical 3rd Sem', 'Thermal Engineering', '14-08-2022 10:46'),
(74, 30, 'M02S303', 'B.Tech Mechanical 3rd Sem', 'Basic Electrical And Electronics', '14-08-2022 10:46'),
(75, 30, 'M02S304', 'B.Tech Mechanical 3rd Sem', 'Material Science And Engineering', '14-08-2022 10:47'),
(76, 31, 'M02S401', 'B.Tech Mechanical 4th Sem', 'Strenght Of Materials', '14-08-2022 10:47'),
(77, 31, 'M02S402', 'B.Tech Mechanical 4th Sem', 'Fluid Mechanics And Hydraulic Machinery', '14-08-2022 10:48'),
(78, 31, 'M02S403', 'B.Tech Mechanical 4th Sem', 'Machine Drawing And Cad', '14-08-2022 10:48'),
(79, 31, 'M02S404', 'B.Tech Mechanical 4th Sem', 'Engineering Measurement And Maintenance Practices', '14-08-2022 10:48'),
(80, 32, 'M02S501', 'B.Tech Mechanical 5th Sem', 'Theory of Machine', '14-08-2022 10:49'),
(81, 32, 'M02S502', 'B.Tech Mechanical 5th Sem', 'Automobile Engineering', '14-08-2022 10:49'),
(82, 32, 'M02S503', 'B.Tech Mechanical 5th Sem', 'Manufacturing Techniques and Systems', '14-08-2022 10:49'),
(83, 32, 'M02S504', 'B.Tech Mechanical 5th Sem', 'Industrial Engineering and Quality Control', '14-08-2022 10:50'),
(84, 33, 'M02S601', 'B.Tech Mechanical 6th Sem', 'Desigh Of Machine Elements', '14-08-2022 10:52'),
(85, 33, 'M02S602', 'B.Tech Mechanical 6th Sem', 'Refrigeration & Air Conditioning', '14-08-2022 10:52'),
(86, 33, 'M02S603', 'B.Tech Mechanical 6th Sem', 'Tool Engineering', '14-08-2022 10:53'),
(87, 33, 'M02S604', 'B.Tech Mechanical 6th Sem', 'Hybrid Vehicles', '14-08-2022 10:53'),
(88, 22, 'E03S101', 'B.Tech  Electronics & Tele Communication 1st Sem', 'Communication Skills in English', '14-08-2022 10:54'),
(89, 22, 'E03S102', 'B.Tech  Electronics & Tele Communication 1st Sem', 'Physics', '14-08-2022 10:55'),
(90, 22, 'E03S103', 'B.Tech  Electronics & Tele Communication 1st Sem', 'Chemistry', '14-08-2022 10:55'),
(91, 22, 'E03S104', 'B.Tech  Electronics & Tele Communication 1st Sem', 'Mathematics', '14-08-2022 10:55'),
(92, 23, 'E03S201', 'B.Tech  Electronics & Tele Communication 2nd Sem', 'Basic Electronics', '14-08-2022 10:56'),
(93, 23, 'E03S202', 'B.Tech  Electronics & Tele Communication 2nd Sem', 'Environmental Engineering & Safety', '14-08-2022 10:56'),
(94, 23, 'E03S203', 'B.Tech  Electronics & Tele Communication 2nd Sem', 'Basic Electrical Engineering', '14-08-2022 10:56'),
(95, 23, 'E03S204', 'B.Tech  Electronics & Tele Communication 2nd Sem', 'Introduction to Computers', '14-08-2022 10:56'),
(96, 42, '101', 'Demo', 'Demo1', '26-08-2022 04:02'),
(97, 42, '102', 'Demo', 'Demo2', '26-08-2022 04:02'),
(98, 42, '103', 'Demo', 'Demo3', '26-08-2022 04:03'),
(99, 42, '104', 'Demo', 'Demo6', '26-08-2022 04:03'),
(101, 44, 'I05I101', 'B.Tech Information Technology 1st Sem', 'Communication Skills  ', '29-08-2022 11:58'),
(102, 44, 'I05I102', 'B.Tech Information Technology 1st Sem', 'Physics', '29-08-2022 11:57'),
(103, 44, 'I05I103', 'B.Tech Information Technology 1st Sem', 'Introduction To Computer', '29-08-2022 11:57'),
(104, 44, 'I05I104', 'B.Tech Information Technology 1st Sem', 'Data Strcture', '29-08-2022 11:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_name`
--
ALTER TABLE `class_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`marks_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `student_name`
--
ALTER TABLE `student_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_name`
--
ALTER TABLE `subject_name`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_name`
--
ALTER TABLE `class_name`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `marks_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_name`
--
ALTER TABLE `student_name`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subject_name`
--
ALTER TABLE `subject_name`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
