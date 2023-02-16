-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2023 at 12:59 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `user_id`, `name`, `description`, `status`, `created_at`, `modified_at`) VALUES
(1, 1, 'Fortuner', 'This is 4x4 variant', 1, '2023-01-30 14:55:51', NULL),
(2, 1, 'Thar', 'This is 4x2 variant', 1, '2023-01-30 14:55:51', NULL),
(3, 1, 'Alto', 'This is 4x2 variant', 1, '2023-01-30 14:55:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `company` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `make` year NOT NULL,
  `color` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `car_delete` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `company`, `brand`, `model`, `make`, `color`, `description`, `image`, `status`, `car_delete`) VALUES
(1, 'Mahindra', 'Thar', '4x4', 2023, 'Red', 'This is 4x4 Mahindra thar', 'red_thar.jpg', 1, 1),
(2, 'Toyoto', 'Fortuner', '4x4', 2018, 'White', 'This is white fortuner.', 'white_fortuner.jpeg', 1, 1),
(4, 'Mahindra', 'Thar', '4x2', 2021, 'Black', 'This is 4x2 black thar', 'black_thar.jpeg', 1, 1),
(10, 'Maruti Suzuki', 'Alto', '4x2', 2019, 'Red', 'ds  rg tg tr t', 'front-left-side-47.jpg', 1, 1),
(12, 'Toyoto', 'Fortuner', '4x4', 2023, 'White', 'fdg gf d gdf', 'white_fortuner.jpeg', 1, 1),
(13, 'Maruti', 'Alto', '4x4', 2018, 'Red', 'vbjhhhkjuioio', 'front-left-side-47.jpg', 1, 1),
(20, 'Mahindra', 'Thar', '4x4', 2017, 'Black', 'dyh gh  yhyy ', 'front-left-side-47.jpg', 0, 1),
(21, 'Mahindra', 'Thar', '4x4', 2017, 'Black', 'dyh gh  yhyy ', 'front-left-side-47.jpg', 1, 0),
(22, 'Mahindra', 'Thar', '4x2', 2018, 'Black', 'gfhgh hgjhjjh', 'download.jpg', 1, 1),
(23, 'Mahindra', 'Thar', '4x2', 2018, 'Black', 'gfhgh hgjhjjh', 'download.jpg', 0, 0),
(24, 'Maruti Suzuki', 'Fortuner', '4x2', 2018, 'White', 'yuyr uyu tyu yuyu', 'download.png', 0, 0),
(25, 'Mahindra', 'Alto', '4x4', 2018, 'Black', 'hgjfhjhjhj hfjh hj', 'download.jpeg', 1, 0),
(26, 'Maruti', 'Thar', '4x4', 2018, 'Black', 'jhhgjhgjhhjg', 'download.jpeg', 1, 0),
(27, 'Maruti', 'Fortuner', '4x2', 2018, 'Black', 'uytuyuuyuryu', 'download.jpg', 0, 1),
(28, 'Mahindra', 'Thar', '4x2', 2019, 'Red', 'jhgjhgjj hgjhgjj', 'download.jpeg', 0, 1),
(29, 'Maruti', 'Thar', '4x2', 2016, 'Red', 'ytuytu yuytuyu', 'download.jpg', 1, 0),
(30, 'Maruti', 'Thar', '4x2', 2018, 'Black', 'uyry utyuyuytuy', 'download.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `car_id` int NOT NULL,
  `star` int NOT NULL,
  `review` varchar(250) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `car_id`, `star`, `review`, `user_name`, `time`) VALUES
(1, 2, 4, 1, 'hgjg', 'Kunal Singh', '2023-02-13 08:57:33'),
(2, 2, 2, 3, 'Rahul Kumar', 'Kunal Singh', '2023-02-13 09:16:48'),
(3, 2, 1, 4, 'nice car', 'Kunal Singh', '2023-02-13 09:20:41'),
(4, 3, 2, 3, 'what a fancy car..', 'Sachin Singh', '2023-02-13 10:30:40'),
(5, 2, 10, 1, 'Nice', 'Kunal Singh', '2023-02-14 05:43:49'),
(6, 4, 1, 5, 'My favourite car', 'Deepu', '2023-02-14 06:22:08'),
(7, 4, 2, 2, 'nice car', 'Deepu', '2023-02-14 06:23:27'),
(8, 4, 11, 5, 'What a fancy car', 'Deepu', '2023-02-14 07:25:11'),
(9, 4, 10, 3, 'my first car', 'Deepu', '2023-02-14 07:26:35'),
(10, 4, 12, 1, 'dh hh h', 'Deepu', '2023-02-14 07:37:20'),
(11, 4, 4, 3, 'nice', 'Deepu', '2023-02-14 07:37:59'),
(12, 6, 2, 4, 'One of my favourite car.', 'Chandresh', '2023-02-14 08:54:42'),
(13, 6, 12, 5, 'yo', 'Chandresh', '2023-02-14 11:48:46'),
(14, 6, 10, 2, 'Nice car', 'Chandresh', '2023-02-14 12:21:10'),
(15, 6, 4, 3, 'nice one', 'Chandresh', '2023-02-14 12:38:10'),
(16, 2, 12, 1, 'hhkj', 'Kunal Singh', '2023-02-14 12:39:59'),
(17, 9, 4, 5, 'Nice car', 'Rahul Kumar', '2023-02-15 07:45:04'),
(18, 2, 30, 3, 'sd sads', 'Kunal Singh', '2023-02-16 06:42:01'),
(19, 2, 13, 4, 'nice', 'Kunal Singh', '2023-02-16 07:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `token` varchar(250) DEFAULT NULL,
  `user_delete` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `modified_at`, `token`, `user_delete`) VALUES
(1, 'Rahul Kumar', 'krahul@teqmavens.com', '$2y$10$42cYZsiuwopr1s2Rl8hH8.flBf5vqC5H0qGndBtHPZ/4wFifq8b92', 0, '2023-02-09 11:42:55', '2023-02-09 17:38:45', NULL, 1),
(2, 'Kunal Singh', 'skunal@teqmavens.com', '$2y$10$1sGmNasq/wUtmrH9.qoLa.2MB3.vaqhMSTpTqfGY7Kb.ErEuOlT1q', 1, '2023-02-10 05:27:48', NULL, NULL, 1),
(3, 'Sachin Singh', 'sachin@gmail.com', '$2y$10$N/XzmM5NrJnlSVs/ii8lW.kOe.oXttjYOQk0ipPeSLpTsDCVB.H66', 1, '2023-02-10 06:07:58', '2023-02-10 07:19:55', NULL, 1),
(4, 'Deepu', 'deepu@teqmavens.com', '$2y$10$1ItXkv/BjoT1s4B5ycVctOiyeN2aT5ynxbqeAQ6hDsShsqnyXodnK', 1, '2023-02-14 06:21:38', NULL, NULL, 1),
(6, 'Chandresh', 'chandresh@gmail.com', '$2y$10$A8DqituYumzCf3qpP8tbReT4P2sTriHT/enNehfYCBc5JyYGq6d3y', 1, '2023-02-14 08:53:26', NULL, NULL, 1),
(7, 'Rahul Kumar', 'skunall@teqmavens.com', '$2y$10$D5OstYV/16QM.yq5VTCB8enDRqzdyDomtkg0uGM/jHCSJ.il8IEWG', 1, '2023-02-15 07:11:07', NULL, NULL, 1),
(10, 'Sachin Singh', 'sskunal@teqmavens.com', '$2y$10$gtwse.BiduZjgV/2vlgjce/TScfwyIOGyWWP/53YOErtFwVjVKgWK', 1, '2023-02-15 07:51:38', NULL, NULL, 1),
(12, 'Rahul Kumar', 'ssskunal@teqmavens.com', '$2y$10$PZkh09Q1OJZ0.5KWcBdgxusHy7V5QGrR4l/DNjXdcOMgvucTjNyye', 1, '2023-02-15 08:43:39', NULL, NULL, 1),
(13, 'Rahul Kumar', 'sssskunal@teqmavens.com', '$2y$10$QF0ULw9bLcsZVvuhuzzh9ePEef/MS308e3BZh.j5R7kOWCwM.SNmG', 1, '2023-02-15 08:44:18', NULL, NULL, 1),
(22, 'Rahul Kumar', 'rahul@teqmavens.com', '$2y$10$cxFtrnGsj5wuvtD17lQK4u4.BIeqc7rgSZkNT2Ei1/KgvDVaVuQHe', 1, '2023-02-15 18:33:45', NULL, NULL, 1),
(23, 'Rahul Kumar', 'skunddal@teqmavens.com', '$2y$10$CRzj.8c/E7gHmcG/qnZdKuIiYwmfl2kw/FwR1kCu4HgRetT50QmU2', 1, '2023-02-15 18:35:10', '2023-02-16 07:12:12', NULL, 0),
(24, 'Rahul Kumar', 'skuffgnddal@teqmavens.com', '$2y$10$11QGJHl78/V6B03.raLhsudWBZECaeIcaimfTbmXiBD/jnD8ReEnq', 1, '2023-02-15 18:35:16', '2023-02-16 06:39:28', NULL, 0),
(25, 'Rahul Kumar', 'sfdfkunal@teqmavens.com', '$2y$10$cNCNIqtHIwcuiRzL/qJ1HOHkXyGMjA3QBeiZZlsrNo9WhlsPhGkCS', 1, '2023-02-15 18:35:31', '2023-02-16 06:38:04', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
