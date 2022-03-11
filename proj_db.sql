-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 03:49 PM
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
-- Database: `proj_db`
--

CREATE DATABASE IF NOT EXISTS `Proj_dB`;
USE `Proj_dB`;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `Order_date` date NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Download_count` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `Order_date`, `User_ID`, `Download_count`, `Product_id`, `created_at`, `updated_at`) VALUES
(1, '0000-00-00', 1, 2, 1, '2022-03-09 12:28:01', '2022-03-10 13:37:28'),
(2, '0000-00-00', 2, 0, 1, '2022-03-09 12:50:16', '2022-03-09 12:50:16'),
(3, '0000-00-00', 3, 0, 1, '2022-03-09 12:52:44', '2022-03-09 12:52:44'),
(4, '0000-00-00', 4, 0, 1, '2022-03-10 08:42:34', '2022-03-10 08:42:34'),
(5, '0000-00-00', 5, 0, 1, '2022-03-10 08:45:19', '2022-03-10 08:45:19'),
(6, '0000-00-00', 6, 0, 1, '2022-03-10 08:51:22', '2022-03-10 08:51:22'),
(7, '0000-00-00', 7, 0, 1, '2022-03-10 09:10:40', '2022-03-10 09:10:40'),
(8, '0000-00-00', 8, 0, 1, '2022-03-10 09:10:54', '2022-03-10 09:10:54'),
(9, '0000-00-00', 9, 0, 1, '2022-03-10 09:26:52', '2022-03-10 09:26:52'),
(10, '0000-00-00', 10, 0, 1, '2022-03-10 09:30:36', '2022-03-10 09:30:36'),
(11, '0000-00-00', 11, 0, 1, '2022-03-10 09:44:49', '2022-03-10 09:44:49'),
(12, '0000-00-00', 12, 0, 1, '2022-03-10 09:54:04', '2022-03-10 09:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_id` int(11) NOT NULL,
  `download_file_link` varchar(60) NOT NULL,
  `Product_name` varchar(60) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_id`, `download_file_link`, `Product_name`, `created_at`, `updated_at`) VALUES
(1, 'xyz6229f108e3eb06.66661222.zip', 'XYZ', NULL, '2022-03-10 13:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `remeber_me_token` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `User_Email` varchar(60) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `User_Email`, `Password`, `created_at`, `updated_at`) VALUES
(1, 'email@mail.com', '$2y$10$m7yENZNQWJgFVGgd1Tz4wens.4FrIX9OdqyXfhn5Z1y37Jc6U992O', '2022-03-09 12:28:01', '2022-03-09 12:28:01'),
(2, 'mahmoudfierro@gmail.com', '$2y$10$v0PSzkH0poDekqd2eYO1O.uD9hMBnmzzpMfLyo01D6L9vU6pNQAjG', '2022-03-09 12:50:16', '2022-03-09 12:50:16'),
(3, 'MahmoudKamal731998@gmail.com', '$2y$10$NneVADUuiBkjxz8dpklaFOeDkHOTJEqFrBaiKYV/UbLPCAkp.GfsO', '2022-03-09 12:52:44', '2022-03-09 12:52:44'),
(4, 'ma@mkdf.com', '$2y$10$6UMgjdPRg.5bKEEHis8Fcea2meFB/lc/MXKdz7w29A0WEt9zgrEb.', '2022-03-10 08:42:34', '2022-03-10 08:42:34'),
(5, 'ma@ilhdfkdg.com', '$2y$10$iV5rWPYmmht2zjOuEnBSA.D9r1E3YlF0sC7BhUwGeJOlB.u10dXqC', '2022-03-10 08:45:18', '2022-03-10 08:45:18'),
(6, 'ma@mgfc.com', '$2y$10$89jVVRD3BA.pRqXgJwYugOF/2zfpaAGx5UHygaRVDsDWPRJaI.HWi', '2022-03-10 08:51:22', '2022-03-10 08:51:22'),
(7, 'KUAKJGSFHZF@YAHOO.COM', '$2y$10$mJXgQlPHWpgzD.hbvtbTLe9cCW3x1Gs5lifvZ6aWutA94FUDcmymy', '2022-03-10 09:10:40', '2022-03-10 09:10:40'),
(8, '.KJDFSS@JAHS.COM', '$2y$10$vqsklVlUgn/87VvZWy9gmemm2RisW5.f10GgSECpfHMGsVwEMvCu.', '2022-03-10 09:10:54', '2022-03-10 09:10:54'),
(9, 'mahmoud@gmail.com', '$2y$10$aHYYsD0LcyvMvkZ443dxRO4SHffXWyiEW64vtaHU.IpmvnZQW0Xay', '2022-03-10 09:26:52', '2022-03-10 09:26:52'),
(10, 'ma@mail.com', '$2y$10$zARt2AHY4rIkRAUEpLE5Qez//ytPSUZT3O/7ks1ockgJWj/zfUo5K', '2022-03-10 09:30:36', '2022-03-10 09:30:36'),
(11, 'rana@gmail.com', '$2y$10$a9n9wxBW0XodDSdl6M/NLef9bwdkTH4JpPjOGCTPnc07Hl8mVRfbS', '2022-03-10 09:44:49', '2022-03-10 09:44:49'),
(12, 'mmm@nnnn.com', '$2y$10$hVxdFHas2/dYVBn1./bV5O471y/2Ec4KD6V2gQiKS9H0fC2wI59C2', '2022-03-10 09:54:04', '2022-03-10 09:54:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Product_id` (`Product_id`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD KEY `User_ID` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `products` (`Product_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
