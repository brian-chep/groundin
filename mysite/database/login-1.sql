-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2018 at 09:11 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(255) NOT NULL,
  `jobid` int(100) NOT NULL,
  `dayapplied` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `applicant` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `resume` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `jobid`, `dayapplied`, `applicant`, `owner`, `resume`) VALUES
(19, 9, '2018-07-27 20:51:00', 'brian1', 'brian', ''),
(20, 9, '2018-07-27 20:51:17', 'brian1', 'brian', ''),
(21, 7, '2018-07-28 05:57:58', 'brian1', 'brian', ''),
(22, 7, '2018-07-28 05:58:42', 'brian1', 'brian', ''),
(23, 7, '2018-07-28 05:58:53', 'brian1', 'brian', ''),
(24, 7, '2018-07-28 06:00:22', 'brian1', 'brian', ''),
(25, 7, '2018-07-28 06:16:47', 'brian1', 'brian', 0x786d6c2d7475746f7269616c2e706466);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(255) NOT NULL,
  `file` longblob NOT NULL,
  `owner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file`, `owner`) VALUES
(1, 0x6d657263792e646f6378, 'brian1'),
(2, 0x786d6c2d7475746f7269616c2e706466, 'brian1');

-- --------------------------------------------------------

--
-- Table structure for table `jobposted`
--

CREATE TABLE `jobposted` (
  `id` int(255) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `daypost` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `expectation` varchar(1000) NOT NULL,
  `category` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `dateline` date NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobposted`
--

INSERT INTO `jobposted` (`id`, `owner`, `daypost`, `title`, `description`, `expectation`, `category`, `location`, `dateline`, `level`) VALUES
(7, 'brian', '0000-00-00 00:00:00', 'doewrfv', 'http://127.0.0.1/mysite/view.php3dwerdfv', 'ewf', 'contractual', '', '0000-00-00', ''),
(8, 'brian', '0000-00-00 00:00:00', 'd', '', '', '', '', '0000-00-00', ''),
(9, 'brian', '0000-00-00 00:00:00', 'df', '', '', '', '', '0000-00-00', ''),
(10, 'brian', '2018-07-27 21:24:45', 'WD3EFRT', '', '', '', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `others` varchar(100) NOT NULL,
  `employer` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cemail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `surname`, `others`, `employer`, `dob`, `regdate`, `category`, `email`, `cemail`, `password`, `cpassword`) VALUES
(7, 'admin', 'admin', 'admin', 'admin', '2018-07-01', '2018-07-28 06:38:05', 'admin', 'admin$gmail.com', 'admin$gmail.com', 'admin', 'admin'),
(5, 'brian', 'brian', 'brian', '', '0000-00-00', '2018-07-27 16:52:51', 'employer', 'chepchiengbrian@gmail.com', 'chepchiengbrian@gmail.com', '123', '123'),
(6, 'brian1', 'brian', 'brian', '', '0000-00-00', '2018-07-27 18:19:40', 'applicant', 'kibetbrian87@gmail.com', 'kibetbrian87@gmail.com', '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobposted`
--
ALTER TABLE `jobposted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobposted`
--
ALTER TABLE `jobposted`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
