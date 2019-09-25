-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2019 at 04:33 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chefedu`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `SNo` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`SNo`, `id`, `user_id`, `password`, `name`, `data`, `email`, `time`) VALUES
(14, '20190831131565718474', '9c972dc8ea710046c498edf31e2bcd09b19dfbfb', '9c972dc8ea710046c498edf31e2bcd09b19dfbfb', 'Nagarjun Dhar', 'Untitled.png', 'nagarjundhar@gmail.com', '2019-09-09 10:53:41'),
(15, '20190831131565718778', '7e50a4a1eff5ec72c60c959096ec9b5146ec2f06', '9c972dc8ea710046c498edf31e2bcd09b19dfbfb', 'PravinKumar Gupta', 'f.png', 'nagarjundhar@gmail.com', '2019-08-13 17:54:28'),
(16, '20190831131565720473', '564610ab091dd29433a8e549b59f29336a906958', '7c222fb2927d828af22f592134e8932480637c0d', 'Nbcbbc cba', 'iphone.png', 'darknetking24@protonmail.com', '2019-08-14 15:53:44'),
(17, '20190831191566210506', '1ff776fbfc2d02555ae09a14adeb1ccc1ad215cc', '1d07426c5a0fe929d20a25ca91862e84662d7da5', 'RupayanChandra Das', 'f.png', 'rupayan11@gmail.com', '2019-08-19 10:30:10'),
(18, '20190831271566884155', '71cdaf611d3f458849a067e7c82e74caa04797fc', 'eeb708e6bd38c5a69f1e11f72c7e65dbaa0c3763', 'NagarjunKumar Dhar', 'Penguins.jpg', 'nagarjundhar@gmail.com', '2019-08-27 05:36:32'),
(19, '20190831301567162293', '114ceb82692ac835e4a228dc5b7402ab5de1ee3f', '88b48b6160c0276e92b785029a5627787f877be7', 'neheruKumar gandhi', 'Hydrangeas.jpg', 'nagarjundhar@gmail.com', '2019-08-30 10:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Sno` int(10) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `midname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `placeofbirth` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `cage` varchar(255) NOT NULL,
  `lastexam` varchar(255) NOT NULL,
  `lastyear` date NOT NULL,
  `attempt` varchar(255) NOT NULL,
  `examqulify` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mothertong` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `zoner` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fathersoccupation` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `motheroccupation` varchar(255) NOT NULL,
  `fphone` varchar(255) NOT NULL,
  `mphone` varchar(255) NOT NULL,
  `ophone` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Sno`, `regno`, `firstname`, `midname`, `lastname`, `address`, `gender`, `dob`, `placeofbirth`, `nationality`, `cage`, `lastexam`, `lastyear`, `attempt`, `examqulify`, `email`, `mothertong`, `course`, `subject`, `zoner`, `phone`, `fname`, `fathersoccupation`, `mname`, `motheroccupation`, `fphone`, `mphone`, `ophone`, `time`) VALUES
(8, '20190831131565718474', 'Nagarjun', '', 'Dhar', '78/1/12 biren roy road west kolkata 61', 'Male', '1996-10-10', 'kolkata', 'indian', '23', 'Diploma', '2008-11-11', '1', 'Other', 'nagarjundhar@gmail.com', 'Bengal', 'Traning', 'Python', 'Other', '7073148409', 'Manik Dhar', 'Defence Engg.', 'Anjana Dhar', 'Housewife', '9903311209', '9903311209', '9903311209', '2019-09-09 10:53:41'),
(9, '20190831131565718778', 'Pravin', 'Kumar', 'Gupta', '78/1/12 biren roy road west 61', 'Male', '1998-11-11', 'Banglore', 'indian', '21', 'B-tech', '2009-10-10', '1', 'CAT', 'nagarjundhar@gmail.com', 'English', 'traning', 'python', 'Western', '9903311209', 'manik', 'army', 'Anjana', 'army', '9903311209', '9903311209', '9903311209', '2019-08-13 17:52:58'),
(10, '20190831131565720473', 'Nbc', 'bbc', 'cba', 'uem jaipur,303807', 'Male', '1997-08-24', 'kolkata', 'hindu', '22', '12', '2016-08-24', '65', 'IIT-JEE', 'darknetking24@protonmail.com', 'Bengal', 'cse', 'computer science', 'Western', '9679973922', 'ICS', 'business', 'Csinha', 'housewife', '9679973922', '9679973922', '9679973922', '2019-08-14 15:53:44'),
(11, '20190831191566210506', 'Rupayan', 'Chandra', 'Das', 'UEM, Jaipur', 'Male', '1988-03-16', 'Agartala', 'indian', '31', 'M.tech', '2013-10-05', '1', 'Other', 'rupayan11@gmail.com', 'Bengal', 'CSE', 'CSE', 'Western', '9051207559', 'G.C DAS', 'TEACHER', 'S.K DAS', 'HOME MAKER', '0000', '000', '000', '2019-08-19 10:34:01'),
(12, '20190831271566884155', 'Nagarjun', 'Kumar', 'Dhar', '78/1/12 biren roy road west kolkata 61', 'Male', '1996-10-10', 'kolkata', 'indian', '23', 'diploma', '1996-10-10', '1', 'CAT', 'nagarjundhar@gmail.com', 'Meitei', 'traning', 'python', 'Other', '9903311209', 'manik', 'army', 'Anjana', 'army', '9903311209', '9903311209', '9903311209', '2019-08-27 05:35:55'),
(13, '20190831301567162293', 'neheru', 'Kumar', 'gandhi', '78/1/12 biren roy road west kolkata 61', 'Male', '1996-10-10', 'kolkata', 'indian', '23', 'diploma', '2014-10-10', '1', 'CAT', 'nagarjundhar@gmail.com', 'Hind', 'traning', 'python', 'Northern', '9051207559', 'manik', 'army', 'Anjana', 'army', '9903311209', '9903311209', '9903311209', '2019-08-30 10:51:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`SNo`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Sno`),
  ADD KEY `regno` (`regno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
