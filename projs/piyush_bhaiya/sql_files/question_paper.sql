-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 07:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
-- Table structure for table `question_paper`
--

CREATE TABLE `question_paper` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `title` text NOT NULL,
  `year` int(4) NOT NULL,
  `content` varchar(500) NOT NULL,
  `file_url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_paper`
--

INSERT INTO `question_paper` (`id`, `category`, `title`, `year`, `content`, `file_url`) VALUES
(9, 'cat1', 'asdfghj', 5247, 'cntnt', 'http://localhost/drift_pages/add_questions/ques_file/php3304.jpg'),
(13, 'cat2', 'asdfghj', 5472, 'cntnt', 'http://localhost/drift_pages/add_questions/ques_file/php799.jpg'),
(16, 'cat3', 'fyhgbuy', 2547, '<h2>ngfytcvhfbvnjfbyut hello</h2>', 'http://localhost/drift_pages/add_questions/ques_file/php2057.pdf'),
(17, 'cat2', 'asdfgcf', 2584, '<p>zxcvbnkmlmlj</p>', 'http://localhost/drift_pages/add_questions/ques_file/php234E.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question_paper`
--
ALTER TABLE `question_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
