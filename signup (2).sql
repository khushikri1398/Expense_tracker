-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 08:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p2`
--

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `conpassword` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`fname`, `lname`, `pass`, `conpassword`, `email`, `phone`) VALUES
('Aadhya', 'kumari', 'aadhya', 'aadhya', 'aadhya@gmail.com', '7903066784'),
('bhjgu', 'bbjj', '1234567890', '1234567890', 'abcde@gmail.com', '7789878867'),
('aman', 'deep', '1111', '1111', 'aman@gmail.com', '9908189684'),
('Khushi', 'kumari', 'khushi', 'khushi', 'b220052@nitsikkim.ac.in', '7903051637'),
('mansi', 'devi', 'qwerty123', 'qwerty123', 'b220054@nitsikkim.ac.in', '1234567890'),
('dhana', 'laxmi', 'dhana', 'dhana', 'dhana23@gmail.com', '9908189684'),
('Khushi', 'kumari', 'khushi', 'khushi', 'khushi@gmail.com', '9908189684'),
('Khushi', 'kumari', 'klo', 'klo', 'klo@gmail.com', '7893452956'),
('shreya', 'singh', 'shreya123', 'shreya123', 'shreya@gmail.com', '8765987632');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
