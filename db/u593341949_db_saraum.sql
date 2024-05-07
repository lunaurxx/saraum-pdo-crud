-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 03:45 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u593341949_db_saraum`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_details` varchar(255) NOT NULL,
  `product_retail_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_details`, `product_retail_price`) VALUES
(5, 'sad', 'adas', 324),
(6, 'etfrer', 'ett', 234);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'loray', '$2y$10$F0LX2K1pA8A4DJHPr1BKwutzcgbKE3q3bx5zJBzt/Gcfe1cVlZhD2', '2024-04-29 11:14:44'),
(2, 'admin', '$2y$10$noIKeqmE7z973V97mGJeqO1ai7LlERFOBBsmkKxa17T4JfEIOPPw2', '2024-05-02 02:59:41'),
(3, 'opop', '$2y$10$34bj52B7Z9nwExgzfN5UsuvTEIBGGcYUsy4Nvh4uI6M7f5kZcdyzG', '2024-05-02 03:06:26'),
(4, 'luna', '$2y$10$m8nTfh0ODhnGarahuDKUJu/sES4dtiLlD/HaqC6bdwDzy7P/cUEry', '2024-05-02 03:07:52'),
(5, 'Mariel', '$2y$10$d7qTQxn0wVqu.G5Ck1SfeOTxUfVBcZ.gNPcD13lW2S4cE0teH2Fj2', '2024-05-07 01:45:51'),
(6, 'asd', '$2y$10$XgERVNqa4jnZ/UGEw772guk9KWc4DbE4QdGUb.bQkPIYFnVLQP4gK', '2024-05-07 03:00:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
