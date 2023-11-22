-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 03:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutrlbyte_2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `description`, `image`, `active`, `created_at`) VALUES
(2, 'adv 1', 'lorem l0orem', 'Adv_Images/advertisment.png', 1, '2023-10-27 04:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8_bin NOT NULL,
  `image` varchar(191) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(4, 'Keto', 'https://media.istockphoto.com/id/969026792/photo/various-foods-that-are-perfect-for-the-keto-diet.jpg?b=1&s=170667a&w=0&k=20&c=1CAhjaqK1fs6TzBUdQBIWczwUX7rV08rSHFi-LJkxFc='),
(5, 'Veganism', 'https://media.istockphoto.com/id/598708582/photo/vegan-word-on-wood-background-and-vegetable.jpg?s=612x612&w=0&k=20&c=HS1SxHPcoYRJu1ziep2eGDmoPrT3dwquSMCr3G0iFQo='),
(6, 'Paleolithic', 'https://www.shutterstock.com/image-photo/flexitarian-diet-keto-set-products-260nw-1768382126.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `expert_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_chat` text COLLATE utf8_bin NOT NULL,
  `nutrition_chat` text COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `expert_id`, `user_id`, `user_chat`, `nutrition_chat`, `created_at`) VALUES
(2, 8, 9, 'Hello', '', '2023-10-27 04:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `in_body_tests`
--

CREATE TABLE `in_body_tests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `heigh` double NOT NULL,
  `intraoelluar_water` double NOT NULL,
  `extraoelluar_water` double NOT NULL,
  `lean_mass` double NOT NULL,
  `fat_mass` double NOT NULL,
  `body_water` double NOT NULL,
  `weight` double NOT NULL,
  `age` double NOT NULL,
  `gender` varchar(255) COLLATE utf8_bin NOT NULL,
  `image` varchar(191) COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `in_body_tests`
--

INSERT INTO `in_body_tests` (`id`, `user_id`, `heigh`, `intraoelluar_water`, `extraoelluar_water`, `lean_mass`, `fat_mass`, `body_water`, `weight`, `age`, `gender`, `image`, `created_at`) VALUES
(3, 9, 11, 13, 32, 323, 32321, 32132, 2132, 3232, 'male', 'InBodyTest/category1.jpg', '2023-10-27 04:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `meal_plans`
--

CREATE TABLE `meal_plans` (
  `id` int(11) NOT NULL,
  `expert_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `meal_category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `week_number` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `meal_plans`
--

INSERT INTO `meal_plans` (`id`, `expert_id`, `user_id`, `meal_category_id`, `name`, `description`, `price`, `image`, `week_number`, `active`, `created_at`) VALUES
(3, 8, 9, 4, 'food', 'lorem lorem', 15, 'Food_Images/category1.jpg', 1, 1, '2023-10-27 04:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `meal_plan_categories`
--

CREATE TABLE `meal_plan_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8_bin NOT NULL,
  `image` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `meal_id` int(11) DEFAULT NULL,
  `promo_code_id` int(11) DEFAULT NULL,
  `price_after_discount` double DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `provider_id`, `user_id`, `status_id`, `meal_id`, `promo_code_id`, `price_after_discount`, `created_at`) VALUES
(3, 3, 9, 4, 3, 3, NULL, '2023-10-27 04:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `provider_id`, `code`, `discount`, `active`, `created_at`) VALUES
(3, 3, 'Tw12111', 5, 1, '2023-10-27 04:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `user_type_id`, `name`, `email`, `password`, `phone`, `description`, `image`, `active`, `created_at`) VALUES
(3, 3, 'Provider', 'provider@test.com', '1234567890', '0123456789', NULL, 'Providers_Images/defalutUser.png', 1, '2023-10-27 04:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `nutrionist_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `nutrionist_id`, `user_id`, `created_at`) VALUES
(5, 8, 9, '2023-10-27 04:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Accepted'),
(3, 'Rejected'),
(4, 'Delivered'),
(5, 'Delivering');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions_payments`
--

CREATE TABLE `subscriptions_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subscription_type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `from_date` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `to_date` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `subscriptions_payments`
--

INSERT INTO `subscriptions_payments` (`id`, `user_id`, `subscription_type`, `payment_type`, `from_date`, `to_date`, `active`, `created_at`) VALUES
(3, 9, '1', 'CC/DC', '2023-10-27 03:55:48', '26-11-2023', 1, '2023-10-27 04:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `total_rate` double DEFAULT 5,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `category_id`, `name`, `email`, `password`, `phone`, `description`, `image`, `total_rate`, `active`, `created_at`) VALUES
(1, 1, 0, 'Admin', 'admin@nutrlbyte.com', '123456', '0123456789', '', 'Admin_images/defalutUser.png', 5, 1, '2023-04-25 23:52:06'),
(8, 2, 4, 'Nutrioitn', 'nutrition@test.com', '1234567890', '0123456789', '', 'Nutrionist_images/defalutUser.png', 5, 1, '2023-10-27 04:08:01'),
(9, 4, NULL, 'Mohammad', 'moh@yahoo.com', 'Ab@12345', '0123456789', '', 'user_images/defalutUser.png', 5, 1, '2023-10-27 04:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `users_nutrition_rates`
--

CREATE TABLE `users_nutrition_rates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nutritions_id` int(11) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `createdAt`, `updatedAt`) VALUES
(1, 'Admin', '2023-03-18 15:09:35', '2023-03-18 15:09:35'),
(2, 'Nutrionist', '2023-03-18 15:09:35', '2023-03-18 15:09:35'),
(3, 'Provider', '2023-03-18 15:09:35', '2023-03-18 15:09:35'),
(4, 'User', '2023-03-18 15:09:35', '2023-03-18 15:09:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expert_id` (`expert_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `in_body_tests`
--
ALTER TABLE `in_body_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expert_id` (`expert_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `meal_plan_categories`
--
ALTER TABLE `meal_plan_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_id` (`provider_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `meal_id` (`meal_id`),
  ADD KEY `promo_code_id` (`promo_code_id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_id_pfk1` (`provider_id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nutrionist_id` (`nutrionist_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions_payments`
--
ALTER TABLE `subscriptions_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `users_nutrition_rates`
--
ALTER TABLE `users_nutrition_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_ibfk_1` (`user_id`),
  ADD KEY `rates_ibfk_2` (`nutritions_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `in_body_tests`
--
ALTER TABLE `in_body_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meal_plans`
--
ALTER TABLE `meal_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meal_plan_categories`
--
ALTER TABLE `meal_plan_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions_payments`
--
ALTER TABLE `subscriptions_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_nutrition_rates`
--
ALTER TABLE `users_nutrition_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`expert_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `in_body_tests`
--
ALTER TABLE `in_body_tests`
  ADD CONSTRAINT `in_body_tests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD CONSTRAINT `meal_plans_ibfk_1` FOREIGN KEY (`expert_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `meal_plans_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`meal_id`) REFERENCES `meal_plans` (`id`),
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_codes` (`id`);

--
-- Constraints for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD CONSTRAINT `provider_id_pfk1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`);

--
-- Constraints for table `providers`
--
ALTER TABLE `providers`
  ADD CONSTRAINT `providers_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`nutrionist_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subscriptions_payments`
--
ALTER TABLE `subscriptions_payments`
  ADD CONSTRAINT `subscriptions_payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);

--
-- Constraints for table `users_nutrition_rates`
--
ALTER TABLE `users_nutrition_rates`
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rates_ibfk_2` FOREIGN KEY (`nutritions_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
