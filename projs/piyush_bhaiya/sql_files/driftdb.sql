-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2022 at 11:16 AM
-- Server version: 8.0.31-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driftdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `badge_counter`
--

CREATE TABLE `badge_counter` (
  `view_status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `badge_counter`
--

INSERT INTO `badge_counter` (`view_status`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `answer` varchar(50) DEFAULT NULL,
  `id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_badge_counter`
--

CREATE TABLE `feedback_badge_counter` (
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `view_status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_paper`
--

CREATE TABLE `question_paper` (
  `id` int NOT NULL,
  `category` text NOT NULL,
  `title` text NOT NULL,
  `year` int NOT NULL,
  `content` varchar(500) NOT NULL,
  `file_url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question_paper`
--

INSERT INTO `question_paper` (`id`, `category`, `title`, `year`, `content`, `file_url`) VALUES
(9, 'cat1', 'asdfghj', 5247, 'cntnt', 'http://localhost/drift_pages/add_questions/ques_file/php3304.jpg'),
(13, 'cat2', 'asdfghj', 5472, 'cntnt', 'http://localhost/drift_pages/add_questions/ques_file/php799.jpg'),
(16, 'cat3', 'fyhgbuy', 2547, '<h2>ngfytcvhfbvnjfbyut hello</h2>', 'http://localhost/drift_pages/add_questions/ques_file/php2057.pdf'),
(17, 'cat2', 'asdfgcf', 2584, '<p>zxcvbnkmlmlj</p>', 'http://localhost/drift_pages/add_questions/ques_file/php234E.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user_mngt`
--

CREATE TABLE `user_mngt` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `user_type` text NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_mngt`
--

INSERT INTO `user_mngt` (`id`, `name`, `email`, `user_type`, `password`) VALUES
(1, 'Prateek', 'prateek@gmail.com', 'type1', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `wps3_registration`
--

CREATE TABLE `wps3_registration` (
  `id` int NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_mngt`
--
ALTER TABLE `user_mngt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wps3_registration`
--
ALTER TABLE `wps3_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question_paper`
--
ALTER TABLE `question_paper`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_mngt`
--
ALTER TABLE `user_mngt`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
