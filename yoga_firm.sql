-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 06:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yoga_firm`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(1) NOT NULL,
  `timing` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `timing`) VALUES
(1, '6-7 AM'),
(2, '7-8 AM'),
(3, '8-9 AM'),
(4, '5-6 PM');

-- --------------------------------------------------------

--
-- Table structure for table `fee_paid`
--

CREATE TABLE `fee_paid` (
  `user_id` int(10) NOT NULL,
  `fee` int(100) DEFAULT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_paid`
--

INSERT INTO `fee_paid` (`user_id`, `fee`, `email`) VALUES
(1, 500, 'mdnasir@gmai.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `number` int(10) NOT NULL,
  `age` int(2) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `batch_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `email`, `password`, `number`, `age`, `start_date`, `batch_id`) VALUES
(1, 'Akshat Jain', 'akshat.kodia@gmail.com', 'akki', 2147483647, 21, '0000-00-00', 3),
(2, 'Akshat Jain', 'king@gmail.com', '12345678', 2147483647, 43, '0000-00-00', 3),
(3, 'Akshat Jain', 'king12@gmailcom', '12345678', 2147483647, 64, '0000-00-00', 3),
(4, '', 'king', '12345678', 0, 0, '0000-00-00', 0),
(5, '', 'king11', '12345678', 0, 0, '10/12/2022', 0),
(6, '', 'king2y38', '12345678', 0, 0, '10/12/2022', 0),
(7, '', 'king3y23', '12345678', 0, 0, '10/12/2022', 0),
(8, '', 'kingwq323', '12345678', 0, 0, '10/12/2022', 0),
(9, 'Vijay', 'vj@gmail.com', '1234', 2147483647, 18, '20/12/2022', 2),
(10, 'Vijayyyyyy', 'vijay@gmail.com', '1234', 623728327, 19, '1010/1212/2022', 3),
(13, 'Akshat Jain', 'king@g.x', '2121', 2147483647, 60, '2022-12-01', 4),
(14, 'Mohd Nasir', 'kingfd@gmail.com', '12345678', 2147483647, 18, '2022-12-16', 3),
(15, 'Akshat Jain', 'king1@gmail.com', '12345678', 2147483647, 62, '2022-12-13', 4),
(16, 'Akshat Jain', 'king12@gmail.com', '123', 2147483647, 62, '2022-12-13', 4),
(17, 'Akshat Jain', 'king222', '12345678', 2147483647, 34, '2022-12-23', 0),
(18, 'Mohd Nasir', 'mdnasir@gmai.com', '123', 827382, 23, '2022-12-25', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `fee_paid`
--
ALTER TABLE `fee_paid`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fee_paid`
--
ALTER TABLE `fee_paid`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
