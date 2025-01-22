-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2025 at 10:27 AM
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
-- Database: `ojt_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enrolled` enum('0','1') NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `stud_id` bigint(20) NOT NULL,
  `program` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `acad_yr` enum('2025','2026','2027','2028','2029','2030','2031','2032') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `professor` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `enrolled`, `name`, `stud_id`, `program`, `section`, `email`, `acad_yr`, `password`, `professor`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, '0', 'Prof Renzo Gregorio', 194417626, NULL, NULL, 'rmgregorio3@fatima.edu.ph', NULL, '$2y$12$34aFiISKQtHrskJCtEfzBeKVQhTW/ltscTXXYHAtoapskMFg2wMUe', 1, NULL, NULL, '2025-01-15 20:32:23', '2025-01-22 00:15:47'),
(6, '1', 'Renzo Gregorio', 194417625, 'CS', 'CS4Y2-1', 'rmgregorio3@student.fatima.edu.ph', NULL, '$2y$12$gpqb9Dq0yM/7l5eXcZeU9.pYtqVbj6xSU.38z3wlv5yzLi.tW6m7G', 0, NULL, 'sO1GandhA4Dv7T9r49QnUZWCgPAtCqCYDtnalEJP6K6ECoKWZJHnr27qS7Lh', '2025-01-15 20:33:00', '2025-01-22 01:22:20'),
(7, '0', 'sample student', 11111111, 'IT', 'IT4Y2-1', 'sample@student.fatima.edu.ph', NULL, '$2y$12$fBDDarDWM2sCDuvLV53QyuowAOwi/J.hy6yE9UdXUiJwKbvORCZUi', 0, NULL, NULL, '2025-01-15 20:35:53', '2025-01-22 01:23:08'),
(8, '0', 'sample student 2', 22222222, 'EMC', 'EMC4Y1-2', 'sample2@student.fatima.edu.ph', '2025', '$2y$12$3R2HzXdIxiqeRZDTjHV27errPh02E/ng011yREGGyiQ5iOlsB69HG', 0, NULL, NULL, '2025-01-15 20:40:11', '2025-01-15 20:40:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_stud_id_unique` (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
