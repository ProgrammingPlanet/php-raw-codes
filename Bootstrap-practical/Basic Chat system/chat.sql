-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2019 at 05:58 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatinfo`
--

CREATE TABLE `chatinfo` (
  `id` int(11) NOT NULL,
  `FromEmail` varchar(30) NOT NULL,
  `ToEmail` varchar(30) NOT NULL,
  `chat_type` varchar(20) NOT NULL,
  `chat_text` varchar(255) NOT NULL,
  `date_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatinfo`
--

INSERT INTO `chatinfo` (`id`, `FromEmail`, `ToEmail`, `chat_type`, `chat_text`, `date_time`) VALUES
(1, 'ahmadmoin723@gmail.com', 'user1@gmail.com', 'text', 'fsdf', '19:09:37 02-Mar-2019'),
(2, 'ahmadmoin723@gmail.com', 'user1@gmail.com', 'text', 'asdsafdsf', '19:45:16 02-Mar-2019'),
(3, 'user1@gmail.com', 'ahmadmoin723@gmail.com', 'text', 'asdsad', '19:45:23 02-Mar-2019'),
(4, 'ahmadmoin723@gmail.com', 'user1@gmail.com', 'text', 'sadsad', '19:45:28 02-Mar-2019'),
(5, 'user1@gmail.com', 'ahmadmoin723@gmail.com', 'text', 'asdsadsad', '19:45:38 02-Mar-2019'),
(6, 'ahmadmoin723@gmail.com', 'user1@gmail.com', 'text', 'asdsad', '19:45:44 02-Mar-2019'),
(7, 'user1@gmail.com', 'ahmadmoin723@gmail.com', 'text', 'wqeqwewqe', '19:45:53 02-Mar-2019'),
(8, 'ahmadmoin723@gmail.com', 'user1@gmail.com', 'text', 'asdsadsad', '19:45:58 02-Mar-2019'),
(9, 'user1@gmail.com', 'ahmadmoin723@gmail.com', 'text', 'qqqq', '19:47:09 02-Mar-2019'),
(10, 'user1@gmail.com', 'ahmadmoin723@gmail.com', 'text', 'asdsad', '19:47:18 02-Mar-2019'),
(11, 'ahmadmoin723@gmail.com', 'user1@gmail.com', 'text', 'sadsad', '19:47:22 02-Mar-2019'),
(12, 'ahmadmoin723@gmail.com', 'user1@gmail.com', 'text', '<br>', '19:47:38 02-Mar-2019'),
(13, 'ahmadmoin723@gmail.com', 'user1@gmail.com', 'text', '<span class=\"text-danger\">hello</span>', '19:48:23 02-Mar-2019'),
(14, 'ahmadmoin723@gmail.com', 'user1@gmail.com', 'text', '4555', '19:49:37 02-Mar-2019'),
(15, 'user1@gmail.com', 'ahmadmoin723@gmail.com', 'text', '////', '19:50:16 02-Mar-2019'),
(16, 'user1@gmail.com', 'ahmadmoin723@gmail.com', 'text', '+++++', '19:50:28 02-Mar-2019'),
(17, 'user1@gmail.com', 'ahmadmoin723@gmail.com', 'text', '4555', '19:50:34 02-Mar-2019'),
(18, 'user1@gmail.com', 'ahmadmoin723@gmail.com', 'text', '45454', '19:50:50 02-Mar-2019'),
(19, 'user1@gmail.com', 'ahmadmoin723@gmail.com', 'text', '[]]', '19:50:55 02-Mar-2019'),
(20, 'user1@gmail.com', 'ahmadmoin723@gmail.com', 'text', '1233', '19:51:01 02-Mar-2019'),
(21, 'ahmadmoin723@gmail.com', 'user1@gmail.com', 'text', '45665454', '19:51:13 02-Mar-2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `FullName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `DOB` varchar(15) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `FullName`, `Email`, `DOB`, `Password`, `Gender`, `status`) VALUES
(1, 'user1', 'user1@gmail.com', '2019-02-09', '1497b58230cfb97e5fa8412d52fde1bd', 'Male', 0),
(2, 'Moin Ahmad', 'ahmadmoin723@gmail.com', '1998-08-01', '1497b58230cfb97e5fa8412d52fde1bd', 'Male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `Id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Dp_Cover_img` varchar(255) DEFAULT NULL,
  `work_at` text,
  `FriendList` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`Id`, `Email`, `Dp_Cover_img`, `work_at`, `FriendList`) VALUES
(1, 'user1@gmail.com', '', NULL, 'ahmadmoin723@gmail.com'),
(2, 'ahmadmoin723@gmail.com', '', NULL, 'user1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatinfo`
--
ALTER TABLE `chatinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatinfo`
--
ALTER TABLE `chatinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
