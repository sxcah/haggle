-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 06, 2025 at 05:28 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haggle_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `administrator_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_hero` varchar(255) NOT NULL,
  `category_url` varchar(255) NOT NULL,
  `parent_category` int(11) DEFAULT NULL,
  `category_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_hero`, `category_url`, `parent_category`, `category_description`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics', NULL, 'Deals and discussions about electronic devices and gadgets.', '2025-05-06 03:26:37', '2025-05-06 03:26:37'),
(2, 'Travel', 'travel', NULL, 'Tips and discounts for flights, accommodations, and travel experiences.', '2025-05-06 03:26:37', '2025-05-06 03:26:37'),
(3, 'Food & Dining', 'food-dining', NULL, 'Share and find deals on restaurants, groceries, and food products.', '2025-05-06 03:26:37', '2025-05-06 03:26:37'),
(4, 'Smartphones', 'smartphones', 1, 'Specific deals and discussions related to smartphones.', '2025-05-06 03:26:37', '2025-05-06 03:26:37'),
(5, 'Hotels in Iloilo City', 'iloilo-hotels', 2, 'Specific deals and reviews for hotels within Iloilo City.', '2025-05-06 03:26:38', '2025-05-06 03:26:38'),
(6, 'Local Produce Deals', 'local-produce', 3, 'Find discounts on fresh fruits, vegetables, and other local produce in the Western Visayas region.', '2025-05-06 03:26:38', '2025-05-06 03:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `fragment_post`
--

CREATE TABLE `fragment_post` (
  `post_id` int(11) NOT NULL,
  `post_title` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `administrator_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fragment_post`
--

INSERT INTO `fragment_post` (`post_id`, `post_title`, `content`, `is_visible`, `created_at`, `updated_at`, `administrator_id`, `account_id`, `category_id`) VALUES
(1, 'Fresh Guimaras Mangoes - Buy 2 Get 1 Free!', 'Heads up, everyone! The mangoes from Guimaras are in season and super sweet. This week at the Iloilo Central Market, participating vendors are offering a Buy 2 Get 1 Free deal on Carabao mangoes. Perfect for enjoying now or as a delicious pasalubong!', 1, '2025-05-06 03:27:32', '2025-05-06 03:27:32', NULL, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `account_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_id`, `username`, `password`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'test_user01', 'password', '2025-05-06 03:24:19', '2025-05-06 03:24:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`user_id`, `email`, `first_name`, `last_name`, `address`, `contact_number`, `created_at`, `updated_at`) VALUES
(1, 'test_user01@example.com', 'test_first_name', 'test_last_name', 'test_address', '123456789', '2025-05-06 03:21:47', '2025-05-06 03:21:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`administrator_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `parent_category` (`parent_category`);

--
-- Indexes for table `fragment_post`
--
ALTER TABLE `fragment_post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_title` (`post_title`) USING HASH,
  ADD KEY `administrator_id` (`administrator_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `contact_number` (`contact_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `administrator_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fragment_post`
--
ALTER TABLE `fragment_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_category`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `fragment_post`
--
ALTER TABLE `fragment_post`
  ADD CONSTRAINT `fragment_post_ibfk_1` FOREIGN KEY (`administrator_id`) REFERENCES `admin_user` (`administrator_id`),
  ADD CONSTRAINT `fragment_post_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`),
  ADD CONSTRAINT `fragment_post_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_information` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
