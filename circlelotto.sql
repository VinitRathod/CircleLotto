-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 09:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `circlelotto`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('00bbfc73f8cc623e51f98fec0fb90f1ec75408cabe2793e1e1fe9c81627c4a3574d0ca26db21a0db', 6, 7, 'Circle Lotto Login', '[]', 1, '2023-11-02 13:01:06', '2023-11-02 13:02:25', '2024-11-02 18:31:06'),
('3564968f5c59570dce474adbf9430ddbfcd50ce8b6a2860393ca40cdc1ee2d3f8e058468d8ab9e54', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:49:55', '2023-11-01 13:49:55', '2024-11-01 19:19:55'),
('56373f435ea7b9933e8a6497df42ccc753241c9da04a5f75afc8fa0687c2e0e4b965dbb267cad532', 6, 7, 'Circle Lotto Login', '[]', 1, '2023-11-02 12:56:37', '2023-11-02 13:00:22', '2024-11-02 18:26:37'),
('7412bef59475d4700b61f3019fa6a2b317dfe77f7e45f22a3e22b361bd0ea244bd9bbecb6931f211', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:33:46', '2023-11-03 14:33:46', '2024-11-03 20:03:46'),
('794e4e0c938256685ea5756cd7417db7882016fee5fca878be61c2a2bacbb325a27b8a8426652fbb', 8, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:26:48', '2023-11-03 14:26:48', '2024-11-03 19:56:48'),
('81b91f4a6ca8441888377f673d26a0185bb1bf5adac75a2a0de607f679494a948d4b6c3e2c15c127', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:31:46', '2023-11-03 14:31:46', '2024-11-03 20:01:46'),
('952b28884b3bb147f1f5380cd96cd69248d4e57cee110023f35a322e947dca9ab795bc3895c3b91e', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-02 12:23:31', '2023-11-02 12:23:31', '2024-11-02 17:53:31'),
('a02ada6dbde608cbfffbc4a17835edb87384b2de4601f0d3a3927f799ad7512d083c93a1dbdcf13a', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:50:23', '2023-11-01 13:50:23', '2024-11-01 19:20:23'),
('a85b3eca8c3b35878d8d27c1918a032aa99fddabb387e25d0ec38d08535f56afb5714ef3ac701185', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-02 11:43:09', '2023-11-02 11:43:09', '2024-11-02 17:13:09'),
('c496b6ec35c9772fa9cfa44a60cbe0c17ac04b8f0aa5f605e220820f44166f5e657c64fc13784478', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:25:24', '2023-11-03 14:25:25', '2024-11-03 19:55:24'),
('c6a57aa3b70ccb27947d3a0b653da095ec8874afec8f0124dedf73c4d8c2e11d0929f47e8c3c8269', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 12:22:29', '2023-11-03 12:22:29', '2024-11-03 17:52:29'),
('ca8aefda37d8b9ae47a47936b8c0ad23e74c32c8852556b89ebed4fc51c0c1dc1ca21a28a0e73943', 10, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:32:22', '2023-11-03 14:32:22', '2024-11-03 20:02:22'),
('ebe5d0d2b649e67f1572ad3bbbf0665f92d75d01a0c3ef00b74b5d2507a5946a35c34a8af76f6f72', 8, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:50:05', '2023-11-01 13:50:05', '2024-11-01 19:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'RDo43rBpTpSStAFNFuyBO981tnUMbmjDuAtqWvZR', NULL, 'http://localhost', 1, 0, 0, '2023-11-01 11:51:25', '2023-11-01 11:51:25'),
(2, NULL, 'Laravel Password Grant Client', '2NizcyqlEEoRAyNgPSr0Q80n4AWREExojMAHdhQN', 'users', 'http://localhost', 0, 1, 0, '2023-11-01 11:51:25', '2023-11-01 11:51:25'),
(3, NULL, 'Laravel Personal Access Client', 'mzDFjWUQmOAX1vGM7T9Vu1akpen05N9BrDldeCnn', NULL, 'http://localhost', 1, 0, 0, '2023-11-01 11:51:34', '2023-11-01 11:51:34'),
(4, NULL, 'Laravel Password Grant Client', 'yq3Dg5PIE8gXSNoad3Rb4bAd2iMd0u5OS7Wx4X7J', 'users', 'http://localhost', 0, 1, 0, '2023-11-01 11:51:34', '2023-11-01 11:51:34'),
(5, NULL, 'Laravel Personal Access Client', 'g5AYN3LIUELjrz0MbQaySdixNR3KM0vR6ezB98eF', NULL, 'http://localhost', 1, 0, 0, '2023-11-01 13:46:40', '2023-11-01 13:46:40'),
(6, NULL, 'Laravel Password Grant Client', 'C94O6flcklqHABfAezf3g0zPggYmkIekjdLtJfLo', 'users', 'http://localhost', 0, 1, 0, '2023-11-01 13:46:40', '2023-11-01 13:46:40'),
(7, NULL, 'Laravel Personal Access Client', 'GOolmpBHzP8fGudv4IgV0uA6cNrnF9nEPwi8jWRz', NULL, 'http://localhost', 1, 0, 0, '2023-11-01 13:47:06', '2023-11-01 13:47:06'),
(8, NULL, 'Laravel Password Grant Client', 'qi0KdPaqfmTx1liYi0ZfksbRokdT1we59YqeSrFN', 'users', 'http://localhost', 0, 1, 0, '2023-11-01 13:47:06', '2023-11-01 13:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-11-01 11:51:25', '2023-11-01 11:51:25'),
(2, 3, '2023-11-01 11:51:34', '2023-11-01 11:51:34'),
(3, 5, '2023-11-01 13:46:40', '2023-11-01 13:46:40'),
(4, 7, '2023-11-01 13:47:06', '2023-11-01 13:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'Circle Lotto Login', 'e27f87cc5feca4ceab95d7a2abdfdbd75cff17eacb6675dacbccdcbe2ed3ad8e', '[\"*\"]', NULL, NULL, '2023-11-01 13:44:53', '2023-11-01 13:44:53'),
(2, 'App\\Models\\User', 2, 'Circle Lotto Login', 'a14d0fa247c838d1d2de7d6a00d7b181aada4d80fc8ae3d1787c72b09b871aee', '[\"*\"]', NULL, NULL, '2023-11-01 13:45:19', '2023-11-01 13:45:19'),
(3, 'App\\Models\\User', 3, 'Circle Lotto Login', '808d26912d0149c6d32ecc8f4f88fa0f6250d1655d590ce08df554c62740cfa9', '[\"*\"]', NULL, NULL, '2023-11-01 13:46:51', '2023-11-01 13:46:51'),
(4, 'App\\Models\\User', 4, 'Circle Lotto Login', 'a76be4eba445a2e0881a3cc1fc21e702770138a269ce24d4a3a8dd5b2cb3d068', '[\"*\"]', NULL, NULL, '2023-11-01 13:47:14', '2023-11-01 13:47:14'),
(5, 'App\\Models\\User', 5, 'Circle Lotto Login', 'bd8d59c8826c9b5db3756eaabda32b9655cff99881df4af5ab2c357bac2e4241', '[\"*\"]', NULL, NULL, '2023-11-01 13:47:50', '2023-11-01 13:47:50'),
(6, 'App\\Models\\User', 6, 'Circle Lotto Login', 'e307a4cac4b6cb55bc12ff8a77a82af096b7fbbdc12f3e0062640c840240dcae', '[\"*\"]', NULL, NULL, '2023-11-01 13:47:59', '2023-11-01 13:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_circles`
--

CREATE TABLE `tbl_circles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `circle_name` varchar(255) NOT NULL,
  `circle_type` tinyint(4) NOT NULL COMMENT '1 - private\r\n2 - public',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_circles`
--

INSERT INTO `tbl_circles` (`id`, `user_id`, `circle_name`, `circle_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test Circle', 1, '2023-11-03 20:03:46', '2023-11-03 20:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_details`
--

CREATE TABLE `tbl_user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `post_code` varchar(150) NOT NULL,
  `security_question` text NOT NULL,
  `security_answer` text NOT NULL,
  `receive_emails_notification` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`id`, `user_id`, `dob`, `phone`, `post_code`, `security_question`, `security_answer`, `receive_emails_notification`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-10-09', '+918521473690', '395009', 'What is my Grand Grand Father\'s Name', 'Hirjibhai', 1, '2023-11-03 20:03:46', '2023-11-03 20:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr', 'Vinit', 'Rathod', 'vinitrathod123@gmail.com', NULL, '$2y$12$PylyvmJs8/lVcw0rrpT8QuLy8yV7vxLmILXKhFZlCX1BHzlHQQOIC', NULL, '2023-11-03 14:33:46', '2023-11-03 14:33:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_circles`
--
ALTER TABLE `tbl_circles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_circles`
--
ALTER TABLE `tbl_circles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
