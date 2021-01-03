-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 09:19 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `password`, `name`) VALUES
('admin1', 'admin123', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(4) NOT NULL DEFAULT 0,
  `choice` text COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_number`, `is_correct`, `choice`) VALUES
(41, 1, 0, 'Segment'),
(42, 1, 0, 'Datagram'),
(43, 1, 1, 'Message'),
(44, 1, 0, ' Frame'),
(45, 2, 1, 'SMTP'),
(46, 2, 0, 'IP'),
(47, 2, 0, 'TCP'),
(48, 2, 0, 'UDP'),
(49, 3, 0, '2^14  '),
(50, 3, 0, '2^7'),
(51, 3, 1, '2^21'),
(52, 4, 1, '245.248.136.0/21 and 245.248.128.0/22'),
(53, 4, 0, '245.248.128.0/21 and 245.248.128.0/22'),
(54, 4, 0, '245.248.132.0/22 and 245.248.132.0/21'),
(55, 5, 1, 'block HTTP traffic during 9:00PM and 5:00AM'),
(56, 5, 0, 'block all ICMP traffic'),
(57, 5, 0, 'stop incoming traffic from a specific IP address but allow outgoing traffic to same IP'),
(58, 5, 0, 'block TCP traffic from a specific user on a specific IP address on multi-user system during 9:00PM and 5:00AM'),
(59, 6, 0, '9'),
(60, 6, 0, '3'),
(61, 6, 1, '10'),
(62, 6, 0, '25'),
(63, 7, 1, 'mesh'),
(64, 7, 0, 'star'),
(65, 7, 0, 'bus'),
(66, 8, 1, 'Star'),
(67, 8, 0, 'Mesh'),
(68, 8, 0, 'BUs'),
(69, 8, 0, 'Ring'),
(70, 9, 0, 'Network Layer protocols'),
(71, 9, 1, 'Transport Layer Protocols'),
(72, 9, 0, 'Data Link Layer Protocols'),
(73, 10, 0, '16'),
(74, 10, 0, '32'),
(75, 10, 0, '64'),
(76, 10, 1, 'none'),
(77, 11, 0, 'Zim Den'),
(78, 11, 1, 'Guido van Rossum '),
(79, 11, 0, 'Niene Stom'),
(80, 12, 0, '.p'),
(81, 12, 1, '.py'),
(82, 12, 0, '.python'),
(83, 13, 0, 'key'),
(84, 13, 0, 'brackets'),
(85, 13, 1, 'Indentation'),
(86, 13, 0, 'none'),
(87, 14, 0, 'Classes are real-world entities while objects are not real'),
(88, 14, 1, 'Objects are real-world entities while classes are not real'),
(89, 14, 0, 'Both objects and classes are real-world entities'),
(90, 14, 0, 'All'),
(91, 15, 0, 'Object'),
(92, 15, 1, 'Function'),
(93, 15, 0, 'Attribute'),
(94, 15, 0, 'Argument'),
(95, 16, 0, '_x = 2'),
(96, 16, 0, '__x = 3'),
(97, 16, 0, '__xyz__ = 5'),
(98, 16, 1, 'None of these'),
(99, 17, 1, 'Pink'),
(100, 17, 0, 'black'),
(101, 18, 1, '-2'),
(102, 18, 0, '-1'),
(103, 18, 0, '2'),
(104, 18, 0, '1'),
(105, 19, 1, '1'),
(106, 19, 0, '2');

-- --------------------------------------------------------

--
-- Table structure for table `exam_name`
--

CREATE TABLE `exam_name` (
  `exam_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_name`
--

INSERT INTO `exam_name` (`exam_id`, `name`) VALUES
(26, 'Dhruvita'),
(23, 'Networks'),
(24, 'Python'),
(27, 'Trial');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `username` varchar(30) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`username`, `exam_id`, `marks`) VALUES
('varunipherle@gm', 26, 100),
('varunipherle@gm', 26, 100),
('varunipherle@gm', 26, 100),
('admin@gmail.com', 26, 100),
('varunipherle@gmail.com', 26, 100),
('varunipherle@gmail.com', 23, 56),
('varunipherle@gmail.com', 23, 56),
('varunipherle@gmail.com', 23, 67),
('varunipherle@gmail.com', 24, 71),
('admin@gmail.com', 23, 67),
('xyz@gmail.com', 23, 11),
('dhruvita@gmail.com', 26, 100);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_number` int(11) NOT NULL,
  `question` text COLLATE utf16_bin NOT NULL,
  `exam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_number`, `question`, `exam_id`) VALUES
(1, 'The protocol data unit(PDU) for the application layer in the Internet stack is', 23),
(2, 'Which of the following transport layer protocolss is used to support electronic mail?', 23),
(3, 'In the IPv4 addressing format, the number of networks allowed under Class C addresses is', 23),
(4, 'An Internet Service Provider(ISP) has the following chunk of CIDR-based IP addresses available with it:245.248.128.0/20. The ISP wants to give half of this chunk of addreses to Organization A, and a quarter to Organization B, while retaining the remaining with itself. Which of the following is a valid allocation of addresses to A and B?', 23),
(5, 'A layer-4 firewall ( a device that can look at all protocol headers up to the transport layer) CANNOT', 23),
(6, 'After the update in the previous question, the link N1-N2 goes down. N2 will reflect this change immediately in its distance vector as cost, âˆž. After the NEXT ROUND of update, what will be cost to N1 in the distance vector of N3?', 23),
(7, 'In______topology, every device is connected to another device via particular channel. ', 23),
(8, 'In ______ topology, all the devices are connected to a single hub through a cable. This hub is the central node and all others nodes are connected to the central node', 23),
(9, 'TCP and UDP are:', 23),
(10, 'What is the maximum possible length of an identifier?', 24),
(11, ' Who developed the Python language?  ', 24),
(12, 'Which one of the following is the correct extension of the Python file?', 24),
(13, 'What do we use to define a block of code in Python language?', 24),
(14, ' Which of the following statements is correct regarding the object-oriented programming concept in Python?', 24),
(15, 'What is the method inside the class in python language?', 24),
(16, 'Which of the following declarations is incorrect?', 24),
(17, 'Which color does she like', 26),
(18, '7-9', 27),
(19, '48', 27);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `email` varchar(30) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email`, `pass`, `name`) VALUES
('admin@gmail.com', 'admin', 'Admin'),
('dhruvita@gmail.com', '123', 'Dhruvita'),
('varunipherle@gmail.com', '123', 'Varuni'),
('xyz@gmail.com', '123', 'XYZ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `choices_ibfk_1` (`question_number`);

--
-- Indexes for table `exam_name`
--
ALTER TABLE `exam_name`
  ADD PRIMARY KEY (`exam_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_number`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `exam_name`
--
ALTER TABLE `exam_name`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_ibfk_1` FOREIGN KEY (`question_number`) REFERENCES `questions` (`question_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam_name` (`exam_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
