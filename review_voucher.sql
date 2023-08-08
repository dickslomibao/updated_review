-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 06:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `review_voucher`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `username`, `email`, `password`, `date_created`, `date_updated`) VALUES
(3, 'asdad', 'asdadad', 'asdaasd@gmail.com', '123', '2023-08-08 21:57:29', '2023-08-08 21:57:29'),
(4, 'jpakoako123', 'a', 'jp@gmail.com', 'jp', '2023-08-08 22:05:07', '2023-08-09 00:07:36'),
(6, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2023-08-08 23:13:25', '2023-08-08 23:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `user_id`, `code`, `date_created`, `date_updated`) VALUES
(11, 4, 'pXPiG8oOBm', '2023-08-08 22:53:34', '2023-08-08 22:53:34'),
(12, 4, 'adzSXYxTzF', '2023-08-08 22:53:35', '2023-08-08 22:53:35'),
(13, 4, 'F2TpHZNphV', '2023-08-08 22:53:36', '2023-08-08 22:53:36'),
(14, 4, 'OcQ29Ui7Cx', '2023-08-08 22:53:36', '2023-08-08 22:53:36'),
(15, 4, 'nc9D76Jo5X', '2023-08-08 22:53:37', '2023-08-08 22:53:37'),
(16, 4, 'XrN1tPalrF', '2023-08-08 22:53:38', '2023-08-08 22:53:38'),
(17, 4, 'slEkzhsBuB', '2023-08-08 22:53:38', '2023-08-08 22:53:38'),
(18, 4, 'RcugSP9lEs', '2023-08-08 22:53:41', '2023-08-08 22:53:41'),
(29, 6, 'nacu8o8Qdl', '2023-08-08 23:13:25', '2023-08-08 23:13:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
