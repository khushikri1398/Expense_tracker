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
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `descr` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `email`, `category`, `amount`, `descr`, `date`) VALUES
(4, 'aashvi@gmail.com', 'Education', 899, 'paid', '2024-06-12'),
(5, 'aashvi@gmail.com', 'Food', 300, 'chill', '2024-06-10'),
(9, 'abcde@gmail.com', 'Travel', 765, 'Trip to Varanasi ', '2024-06-12'),
(17, 'dhana23@gmail.com', 'Education', 1000, 'paid', '2024-06-20'),
(18, 'khushi@gmail.com', 'Food', 78, 'paid', '2024-06-07'),
(44, 'b220052@nitsikkim.ac.in', 'Travel', 1800, 'trips', '2024-08-01'),
(45, 'b220052@nitsikkim.ac.in', 'Others', 1900, 'chill', '2024-08-29'),
(46, 'b220052@nitsikkim.ac.in', 'Shopping', 500, 'dresses', '2024-09-18'),
(47, 'b220052@nitsikkim.ac.in', 'Travel', 800, 'chill', '2024-08-05'),
(48, 'b220054@nitsikkim.ac.in', 'Others', 1000000, 'chill', '2022-05-01'),
(49, 'b220054@nitsikkim.ac.in', 'Food', 10000, 'chai', '2024-08-07'),
(50, 'aman@gmail.com', 'Others', 455, 'dresses', '2024-08-10'),
(51, 'aman@gmail.com', 'Education', 900, 'chill', '2024-08-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
