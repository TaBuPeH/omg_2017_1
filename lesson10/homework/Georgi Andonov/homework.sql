-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 05:42 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `EGN` varchar(10) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Age` varchar(2) NOT NULL,
  `fav_subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`EGN`, `Name`, `Age`, `fav_subject_id`) VALUES
('9901123423', 'Petar Ivanov', '18', 3),
('9902132367', 'Maria Ivanova', '18', 1),
('9903132367', 'Divan Projinkov', '18', 5),
('9906132367', 'Georgi Budinov', '17', 4),
('9907132367', 'Varadin Paranov', '17', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(40) NOT NULL,
  `classes_per_year` int(11) NOT NULL,
  `teacher` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `classes_per_year`, `teacher`) VALUES
(1, 'Biology', 36, 'Voivoda Stoqnov'),
(2, 'Physical Education', 72, 'Georgi Varbandinov'),
(3, 'History', 72, 'Atanaska Koleva'),
(4, 'Math', 288, 'Dimitrinka Ognqnova'),
(5, 'Chemistry', 36, 'Gergina Varbanova'),
(6, 'English', 144, 'Varbanka Georgieva'),
(7, 'Geography', 36, 'Gurga Varbanova');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`EGN`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
