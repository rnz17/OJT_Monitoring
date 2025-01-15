-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 08:09 AM
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
  `name` varchar(255) NOT NULL,
  `stud_id` int(22) NOT NULL,
  `program` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `acad_yr` enum('2024-2025','2025-2026','2026-2027','2027-2028','2028-2029') DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `stud_id`, `program`, `section`, `email`, `acad_yr`, `password`, `professor`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Renzo Gregorio', 194417625, 'CS', 'section 1', 'rmgregorio3@student.fatima.edu.ph', '2024-2025', '$2y$12$.F6gM.aoZlNsMAE.7TRJSumz.r1Q7G7h.MS5zLyAz3MWbpWHdmitS', 0, NULL, NULL, '2025-01-14 03:01:01', '2025-01-14 03:01:01'),
(2, 'Prof Renzo', 194417626, 'IT', 'section 1', 'rmgregorio3@fatima.edu.ph', NULL, '$2y$12$CoHLjDl8plxT0LARmBVXB.kdB.zHVuYLZmmxxrpRSnfKqM0lC3f0e', 1, NULL, NULL, '2025-01-14 03:15:51', '2025-01-14 03:15:51'),
(3, 'testers', 12341234, 'IT', 'section 1', 'test@fatima.edu.ph', NULL, '$2y$12$DDi9NQWIcqp9YCuohgPgLug5/1c1ojBm4dEMHSZ8XUd7mv29XUzNm', 1, NULL, NULL, '2025-01-14 03:45:01', '2025-01-14 03:45:01');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
