-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2019 at 04:41 PM
-- Server version: 5.7.11-0ubuntu6
-- PHP Version: 7.1.29-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `my_student`
--

CREATE TABLE `my_student` (
  `roll_nos` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mid_name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_check` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_student`
--

INSERT INTO `my_student` (`roll_nos`, `firstname`, `mid_name`, `lastname`, `email`, `password`, `password_check`, `gender`, `time`) VALUES
(13, 'John', 'arjun', 'Terry', 'root@gh.vbn', '12345', '12345', 'male', '2019-06-10 10:33:25'),
(14, 'John', 'arjun', 'Terry', 'root@gh.vbn', '12345', '12345', 'male', '2019-06-10 10:33:26'),
(15, 'John', 'arjun', 'Terry', 'root@gh.vbn', '12345', '13344', 'male', '2019-06-10 10:44:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_student`
--
ALTER TABLE `my_student`
  ADD PRIMARY KEY (`roll_nos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_student`
--
ALTER TABLE `my_student`
  MODIFY `roll_nos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
