-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 05:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
('0def1900888d60b5ec096fe2496268d9610d9fa0fba9cf02508379a79324102d29dfca7b1b5ff4fd', 3, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:31:08', '2023-11-22 14:31:08', '2024-11-22 20:01:08'),
('11a414236a05673cbdeca9502dfb234e6502ac28f989fa63d254f5775f223806eac3c31c10ace8f7', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-02-09 10:52:00', '2024-02-09 10:52:01', '2025-02-09 16:22:00'),
('1c05281e7f5661a9b38b14e45888785307f70c5997515c5cfaf0a4548ea452fbfb92d368611ec64e', 11, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:33:54', '2023-11-25 07:33:54', '2024-11-25 13:03:54'),
('1e80e038f208271ef2a4a220bdaff07886a9afdc40a8c2bce65e4be9c3982aa0691b7d7e18937a0e', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-10 07:51:36', '2024-03-10 07:51:36', '2025-03-10 13:21:36'),
('322f19ae234cf567d785daa9585c66e74fe45e8a3956406cb36c1a1cfbc680db2ebe76fec5fa1bb7', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-02-26 13:33:07', '2024-02-26 13:33:07', '2025-02-26 19:03:07'),
('3564968f5c59570dce474adbf9430ddbfcd50ce8b6a2860393ca40cdc1ee2d3f8e058468d8ab9e54', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:49:55', '2023-11-01 13:49:55', '2024-11-01 19:19:55'),
('39ddf7dba9e26f2f3d06afb5179498bd95a558b7734ec2a1a35f7d877dba27f9a675d50c7a78c30e', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-02-09 12:33:41', '2024-02-09 12:33:41', '2025-02-09 18:03:41'),
('3b25cb0bc0f49e4856d50702253f2e4fd29ae923cd6eee247875704cfba55d328771221ea7d27daf', 2, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:13:40', '2023-11-22 14:13:40', '2024-11-22 19:43:40'),
('45363d823723406a16e46b7f13bed812dc5d5b2aaf97707fd62f23f9b1a0885e6f1d1d9697bbf607', 1, 7, 'Circle Lotto Login', '[]', 1, '2024-01-16 10:28:43', '2024-01-29 12:27:52', '2025-01-16 15:58:43'),
('4721eaa638f91a928b698b11191aff0a243d45b12511664644b7d85c4fe918538baccda0e6da311a', 8, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:06:47', '2023-11-25 07:06:47', '2024-11-25 12:36:47'),
('5357f18bd9670459db6e4171c6c9c6bfb645aa47978b0bd7296c75df109f6f3b7a3340d65c691793', 15, 7, 'Circle Lotto Login', '[]', 0, '2024-03-11 11:14:45', '2024-03-11 11:14:45', '2025-03-11 16:44:45'),
('56373f435ea7b9933e8a6497df42ccc753241c9da04a5f75afc8fa0687c2e0e4b965dbb267cad532', 6, 7, 'Circle Lotto Login', '[]', 1, '2023-11-02 12:56:37', '2023-11-02 13:00:22', '2024-11-02 18:26:37'),
('580b06664c5a04045a828652afbcc77f5a2a87731c16d63e92bf432bd1e62a6648096cbf173525bc', 14, 7, 'Circle Lotto Login', '[]', 0, '2024-03-11 11:04:06', '2024-03-11 11:04:07', '2025-03-11 16:34:06'),
('720528379e2ff9a9980ba22f56dd5013475a93650f40d402bc3e0c5a762a136d2fb8ac5262de71d6', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-17 09:13:42', '2023-11-17 09:13:42', '2024-11-17 14:43:42'),
('7412bef59475d4700b61f3019fa6a2b317dfe77f7e45f22a3e22b361bd0ea244bd9bbecb6931f211', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:33:46', '2023-11-03 14:33:46', '2024-11-03 20:03:46'),
('794e4e0c938256685ea5756cd7417db7882016fee5fca878be61c2a2bacbb325a27b8a8426652fbb', 8, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:26:48', '2023-11-03 14:26:48', '2024-11-03 19:56:48'),
('81339d0fa0d7ac0d41a51d5c34bebe5e9e0eee6ced20515092df013e04d3c02b64f3923ce4136e06', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-15 01:44:18', '2023-11-15 01:44:18', '2024-11-15 07:14:18'),
('81b91f4a6ca8441888377f673d26a0185bb1bf5adac75a2a0de607f679494a948d4b6c3e2c15c127', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:31:46', '2023-11-03 14:31:46', '2024-11-03 20:01:46'),
('8b326909ca521cfdf4f13b7edf78d366175588798595df922e6002499f2b75608741d06ac29926e4', 4, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:40:49', '2023-11-22 14:40:49', '2024-11-22 20:10:49'),
('952b28884b3bb147f1f5380cd96cd69248d4e57cee110023f35a322e947dca9ab795bc3895c3b91e', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-02 12:23:31', '2023-11-02 12:23:31', '2024-11-02 17:53:31'),
('97bb6279a7e253ff9a3de51feec12d16f8a63e41ff7319ecc3297d09fbe0381cd3a65ad460ab4e00', 10, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:12:53', '2023-11-25 07:12:53', '2024-11-25 12:42:53'),
('a02ada6dbde608cbfffbc4a17835edb87384b2de4601f0d3a3927f799ad7512d083c93a1dbdcf13a', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:50:23', '2023-11-01 13:50:23', '2024-11-01 19:20:23'),
('a85b3eca8c3b35878d8d27c1918a032aa99fddabb387e25d0ec38d08535f56afb5714ef3ac701185', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-02 11:43:09', '2023-11-02 11:43:09', '2024-11-02 17:13:09'),
('c06fb06127182269c89119a1f25bc6804c34d88aa5541305e6c10f841b790bfaa7e88bcd60817c30', 5, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:41:46', '2023-11-22 14:41:46', '2024-11-22 20:11:46'),
('c496b6ec35c9772fa9cfa44a60cbe0c17ac04b8f0aa5f605e220820f44166f5e657c64fc13784478', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:25:24', '2023-11-03 14:25:25', '2024-11-03 19:55:24'),
('c6a57aa3b70ccb27947d3a0b653da095ec8874afec8f0124dedf73c4d8c2e11d0929f47e8c3c8269', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 12:22:29', '2023-11-03 12:22:29', '2024-11-03 17:52:29'),
('c738cc9e9a15cf133c29b4ddf6bf5f5733ccafe3d7dbd023787e1714d484f15fda5eda2d0c6039d3', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:07:48', '2023-11-25 07:07:48', '2024-11-25 12:37:48'),
('c87d0ca16f45effedd9f3f7dbbc6f292c39f9388cf0224d7c21506d1b9f46a2a88d859f48a3fd644', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:42:02', '2023-11-22 14:42:02', '2024-11-22 20:12:02'),
('ca8aefda37d8b9ae47a47936b8c0ad23e74c32c8852556b89ebed4fc51c0c1dc1ca21a28a0e73943', 10, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:32:22', '2023-11-03 14:32:22', '2024-11-03 20:02:22'),
('e55b625ff2a67d151f87fbfd12c99e6062a992a885da5a177ac0476b8cebe3acd6ea401a8bee43d4', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:05:49', '2023-11-25 07:05:49', '2024-11-25 12:35:49'),
('e7e60de8a0efc9526c4608c7b55565a052955041db344ed94dbee572eb6acd2547cb975e0215aa7f', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-13 10:37:27', '2024-03-13 10:37:28', '2025-03-13 16:07:27'),
('ebe5d0d2b649e67f1572ad3bbbf0665f92d75d01a0c3ef00b74b5d2507a5946a35c34a8af76f6f72', 8, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:50:05', '2023-11-01 13:50:05', '2024-11-01 19:20:05'),
('fa27f91570c1be2a0458878c67017a173099d7a6de79d5eae561404661c5f86d935eb822c5d49792', 12, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 08:09:37', '2023-11-25 08:09:37', '2024-11-25 13:39:37');

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
-- Table structure for table `tbl_admin_user`
--

CREATE TABLE `tbl_admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin_user`
--

INSERT INTO `tbl_admin_user` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$12$1aXgcS1yyTLwRgAfvdnSz.N8WrioecXOPSO2Lw9QdJnAGCZ.HP2ea', NULL, '2024-01-30 16:01:19', '2024-01-30 16:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_circles`
--

CREATE TABLE `tbl_circles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `circle_name` varchar(255) NOT NULL,
  `circle_type` tinyint(4) NOT NULL COMMENT '1 - private\r\n2 - public',
  `circle_amount` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_circles`
--

INSERT INTO `tbl_circles` (`id`, `user_id`, `circle_name`, `circle_type`, `circle_amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, 1, 'Test Circle', 1, 5000, '2024-03-06 17:02:17', '2024-02-26 19:03:28', '2024-03-06 17:02:17'),
(14, 1, 'Vinit\'s Circle', 1, 5000, '2024-03-13 15:58:38', '2024-03-05 16:20:42', '2024-03-13 15:58:38'),
(15, 1, 'Vinits Circle', 1, 5000, '2024-03-13 15:59:47', '2024-03-05 16:21:20', '2024-03-13 15:59:47'),
(16, 1, 'Vinits Second Circle', 2, 5000, '2024-03-13 15:59:54', '2024-03-10 13:22:17', '2024-03-13 15:59:54'),
(17, 1, 'Vinits Third Circle', 2, 5000, NULL, '2024-03-10 13:36:44', '2024-03-10 13:36:44'),
(18, 1, 'Vinits Fourth Circle', 2, 5000, NULL, '2024-03-10 13:37:18', '2024-03-10 13:37:18'),
(19, 1, 'Vinits Fifth Circle', 2, 5000, NULL, '2024-03-10 13:39:56', '2024-03-10 13:39:56'),
(20, 1, 'Vinits Sixth Circle', 2, 5000, NULL, '2024-03-10 13:40:28', '2024-03-10 13:40:28'),
(21, 1, 'Vinits Seventh Circle', 2, 5000, NULL, '2024-03-10 13:41:36', '2024-03-10 13:41:36'),
(22, 1, 'Vinits Eigth Circle', 2, 5000, NULL, '2024-03-10 13:42:24', '2024-03-10 13:42:24'),
(23, 1, 'Vinits Ninth Circle', 2, 5000, NULL, '2024-03-10 13:43:08', '2024-03-10 13:43:08'),
(24, 1, 'Vinits Tenth Circle', 2, 5000, NULL, '2024-03-10 13:43:41', '2024-03-10 13:43:41'),
(25, 1, 'Vinits Eleventh Circle', 2, 5000, NULL, '2024-03-10 13:44:09', '2024-03-10 13:44:09'),
(26, 1, 'Vinits Twelth Circle', 2, 5000, '2024-03-13 16:01:00', '2024-03-10 13:44:42', '2024-03-13 16:01:00'),
(27, 1, 'Vinits Thirteenth Circle', 2, 5000, NULL, '2024-03-10 13:45:51', '2024-03-10 13:45:51'),
(28, 1, 'Vinits Fourteenth Circle', 2, 5000, NULL, '2024-03-10 13:46:27', '2024-03-10 13:46:27'),
(29, 1, 'Vinits Fifteen Circle', 2, 5000, NULL, '2024-03-10 13:46:57', '2024-03-10 13:46:57'),
(30, 1, 'Vinits Sixteen Circle', 2, 5000, NULL, '2024-03-10 13:47:07', '2024-03-10 13:47:07'),
(31, 1, 'Vinits Seventenn Circle', 2, 5000, NULL, '2024-03-10 13:47:22', '2024-03-10 13:47:22'),
(32, 1, 'Vinits Eighteen Circle', 2, 5000, NULL, '2024-03-10 13:48:15', '2024-03-10 13:48:15'),
(33, 1, 'Vinits Ninteen Circle', 2, 5000, NULL, '2024-03-10 13:48:44', '2024-03-10 13:48:44'),
(34, 1, 'Vinits Twenty Circle', 2, 5000, NULL, '2024-03-10 13:49:04', '2024-03-10 13:49:04'),
(35, 1, 'Vinits Twenty One Circle', 2, 5000, NULL, '2024-03-10 13:49:41', '2024-03-10 13:49:41'),
(36, 1, 'Vinits Twenty Two Circle', 2, 5000, NULL, '2024-03-10 13:50:42', '2024-03-10 13:50:42'),
(37, 1, 'Vinits Twenty Three Circle', 2, 5000, NULL, '2024-03-10 13:51:15', '2024-03-10 13:51:15'),
(38, 1, 'Vinits Twenty Four Circle', 2, 5000, NULL, '2024-03-10 13:51:38', '2024-03-10 13:51:38'),
(39, 1, 'Vinits Twenty Five Circle', 2, 5000, NULL, '2024-03-10 13:54:30', '2024-03-10 13:54:30'),
(40, 1, 'Vinits Twenty Six Circle', 2, 5000, NULL, '2024-03-10 13:56:13', '2024-03-10 13:56:13'),
(41, 1, 'Vinits Twenty Sevn Circle', 2, 5000, NULL, '2024-03-10 13:56:29', '2024-03-10 13:56:29'),
(42, 1, 'Vinits Twenty Eigth Circle', 2, 5000, NULL, '2024-03-10 13:58:10', '2024-03-10 13:58:10'),
(43, 1, 'Vinits Twenty Eigth Circle', 2, 5000, NULL, '2024-03-10 13:58:53', '2024-03-10 13:58:53'),
(44, 1, 'Vinits Twenty Eigth Circle', 2, 5000, NULL, '2024-03-10 13:59:35', '2024-03-10 13:59:35'),
(45, 1, 'Vinits Twenty Eigth Circle', 2, 5000, NULL, '2024-03-10 14:00:03', '2024-03-10 14:00:03'),
(46, 1, 'Vinits Twenty Eigth Circle', 2, 5000, NULL, '2024-03-10 14:00:33', '2024-03-10 14:00:33'),
(47, 1, 'Vinits Twenty Eigth Circle', 2, 5000, NULL, '2024-03-10 14:03:02', '2024-03-10 14:03:02'),
(48, 1, 'Vinits Twenty Eigth Circle', 1, 5000, NULL, '2024-03-10 14:05:03', '2024-03-10 14:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_draw_numbers`
--

CREATE TABLE `tbl_draw_numbers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `circle_id` int(11) NOT NULL,
  `numbers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`numbers`)),
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_draw_numbers`
--

INSERT INTO `tbl_draw_numbers` (`id`, `user_id`, `circle_id`, `numbers`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, 1, 28, '[21,44,46,21,33,2,10]', NULL, '2024-03-13 16:08:04', '2024-03-13 16:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_members`
--

CREATE TABLE `tbl_group_members` (
  `id` int(11) NOT NULL,
  `circle_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `verified` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_group_members`
--

INSERT INTO `tbl_group_members` (`id`, `circle_id`, `user_id`, `verified`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 13, 1, 1, NULL, '2024-02-26 19:03:51', '2024-02-26 19:03:51'),
(3, 15, 1, 1, '2024-03-13 15:59:47', '2024-03-05 16:21:20', '2024-03-13 15:59:47'),
(4, 16, 1, 1, '2024-03-13 15:59:54', '2024-03-10 13:22:17', '2024-03-13 15:59:54'),
(5, 17, 1, 1, NULL, '2024-03-10 13:36:44', '2024-03-10 13:36:44'),
(6, 18, 1, 1, NULL, '2024-03-10 13:37:18', '2024-03-10 13:37:18'),
(7, 19, 1, 1, NULL, '2024-03-10 13:39:56', '2024-03-10 13:39:56'),
(8, 20, 1, 1, NULL, '2024-03-10 13:40:28', '2024-03-10 13:40:28'),
(9, 21, 1, 1, NULL, '2024-03-10 13:41:36', '2024-03-10 13:41:36'),
(10, 22, 1, 1, NULL, '2024-03-10 13:42:24', '2024-03-10 13:42:24'),
(11, 23, 1, 1, NULL, '2024-03-10 13:43:08', '2024-03-10 13:43:08'),
(12, 24, 1, 1, NULL, '2024-03-10 13:43:41', '2024-03-10 13:43:41'),
(13, 25, 1, 1, NULL, '2024-03-10 13:44:09', '2024-03-10 13:44:09'),
(14, 26, 1, 1, '2024-03-13 16:01:00', '2024-03-10 13:44:42', '2024-03-13 16:01:00'),
(15, 27, 1, 1, NULL, '2024-03-10 13:45:51', '2024-03-10 13:45:51'),
(16, 28, 1, 1, NULL, '2024-03-10 13:46:27', '2024-03-10 13:46:27'),
(17, 29, 1, 1, NULL, '2024-03-10 13:46:57', '2024-03-10 13:46:57'),
(18, 30, 1, 1, NULL, '2024-03-10 13:47:07', '2024-03-10 13:47:07'),
(19, 31, 1, 1, NULL, '2024-03-10 13:47:22', '2024-03-10 13:47:22'),
(20, 32, 1, 1, NULL, '2024-03-10 13:48:15', '2024-03-10 13:48:15'),
(21, 33, 1, 1, NULL, '2024-03-10 13:48:44', '2024-03-10 13:48:44'),
(22, 34, 1, 1, NULL, '2024-03-10 13:49:04', '2024-03-10 13:49:04'),
(23, 35, 1, 1, NULL, '2024-03-10 13:49:41', '2024-03-10 13:49:41'),
(24, 36, 1, 1, NULL, '2024-03-10 13:50:42', '2024-03-10 13:50:42'),
(25, 37, 1, 1, NULL, '2024-03-10 13:51:15', '2024-03-10 13:51:15'),
(26, 38, 1, 1, NULL, '2024-03-10 13:51:38', '2024-03-10 13:51:38'),
(27, 39, 1, 1, NULL, '2024-03-10 13:54:30', '2024-03-10 13:54:30'),
(28, 40, 1, 1, NULL, '2024-03-10 13:56:13', '2024-03-10 13:56:13'),
(29, 41, 1, 1, NULL, '2024-03-10 13:56:29', '2024-03-10 13:56:29'),
(30, 42, 1, 1, NULL, '2024-03-10 13:58:10', '2024-03-10 13:58:10'),
(31, 43, 1, 1, NULL, '2024-03-10 13:58:53', '2024-03-10 13:58:53'),
(32, 44, 1, 1, NULL, '2024-03-10 13:59:35', '2024-03-10 13:59:35'),
(33, 45, 1, 1, NULL, '2024-03-10 14:00:03', '2024-03-10 14:00:03'),
(34, 46, 1, 1, NULL, '2024-03-10 14:00:33', '2024-03-10 14:00:33'),
(35, 47, 1, 1, NULL, '2024-03-10 14:03:02', '2024-03-10 14:03:02'),
(36, 48, 1, 1, NULL, '2024-03-10 14:05:03', '2024-03-10 14:05:03'),
(37, 48, 14, 0, NULL, '2024-03-11 16:43:16', '2024-03-11 16:43:16'),
(38, 48, 15, 0, NULL, '2024-03-11 16:45:04', '2024-03-11 16:45:04'),
(39, 48, 15, 0, NULL, '2024-03-11 16:46:14', '2024-03-11 16:46:14'),
(40, 48, 15, 0, NULL, '2024-03-11 16:48:09', '2024-03-11 16:48:09'),
(41, 48, 15, 0, NULL, '2024-03-11 17:08:58', '2024-03-11 17:08:58'),
(42, 48, 15, 0, NULL, '2024-03-11 17:10:50', '2024-03-11 17:10:50'),
(43, 48, 15, 0, NULL, '2024-03-11 17:11:23', '2024-03-11 17:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `id` int(11) NOT NULL,
  `from_user` int(11) DEFAULT NULL,
  `to_user` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `error` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`error`)),
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_notifications`
--

INSERT INTO `tbl_notifications` (`id`, `from_user`, `to_user`, `title`, `body`, `error`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 'Public Group Added', 'Vinits Fourth Circle is Added', NULL, NULL, '2024-03-10 08:07:18', '2024-03-10 08:07:18'),
(2, 1, 11, 'Public Group Added', 'Vinits Fifth Circle is Added', NULL, NULL, '2024-03-10 08:09:56', '2024-03-10 08:09:56'),
(3, 1, 11, 'Public Group Added', 'Vinits Sixth Circle is Added', NULL, NULL, '2024-03-10 08:10:28', '2024-03-10 08:10:28'),
(4, 1, 11, 'Public Group Added', 'Vinits Seventh Circle is Added', NULL, NULL, '2024-03-10 08:11:36', '2024-03-10 08:11:36'),
(5, 1, 11, 'Public Group Added', 'Vinits Eigth Circle is Added', NULL, NULL, '2024-03-10 08:12:25', '2024-03-10 08:12:25'),
(6, 1, 11, 'Public Group Added', 'Vinits Ninth Circle is Added', NULL, NULL, '2024-03-10 08:13:08', '2024-03-10 08:13:08'),
(7, 1, 11, 'Public Group Added', 'Vinits Tenth Circle is Added', NULL, NULL, '2024-03-10 08:13:41', '2024-03-10 08:13:41'),
(8, 1, 11, 'Public Group Added', 'Vinits Eleventh Circle is Added', NULL, NULL, '2024-03-10 08:14:09', '2024-03-10 08:14:09'),
(9, 1, 11, 'Public Group Added', 'Vinits Twelth Circle is Added', NULL, NULL, '2024-03-10 08:14:42', '2024-03-10 08:14:42'),
(10, 1, 11, 'Public Group Added', 'Vinits Thirteenth Circle is Added', NULL, NULL, '2024-03-10 08:15:52', '2024-03-10 08:15:52'),
(11, 1, 11, 'Public Group Added', 'Vinits Fourteenth Circle is Added', NULL, NULL, '2024-03-10 08:16:27', '2024-03-10 08:16:27'),
(12, 1, 11, 'Public Group Added', 'Vinits Fifteen Circle is Added', NULL, NULL, '2024-03-10 08:16:57', '2024-03-10 08:16:57'),
(13, 1, 11, 'Public Group Added', 'Vinits Sixteen Circle is Added', NULL, NULL, '2024-03-10 08:17:09', '2024-03-10 08:17:09'),
(14, 1, 11, 'Public Group Added', 'Vinits Seventenn Circle is Added', NULL, NULL, '2024-03-10 08:17:23', '2024-03-10 08:17:23'),
(15, 1, 11, 'Public Group Added', 'Vinits Eighteen Circle is Added', NULL, NULL, '2024-03-10 08:18:16', '2024-03-10 08:18:16'),
(16, 1, 11, 'Public Group Added', 'Vinits Ninteen Circle is Added', NULL, NULL, '2024-03-10 08:18:44', '2024-03-10 08:18:44'),
(17, 1, 11, 'Public Group Added', 'Vinits Twenty Circle is Added', NULL, NULL, '2024-03-10 08:19:04', '2024-03-10 08:19:04'),
(18, 1, 11, 'Public Group Added', 'Vinits Twenty One Circle is Added', NULL, NULL, '2024-03-10 08:19:42', '2024-03-10 08:19:42'),
(19, 1, 11, 'Public Group Added', 'Vinits Twenty Two Circle is Added', NULL, NULL, '2024-03-10 08:20:43', '2024-03-10 08:20:43'),
(20, 1, 11, 'Public Group Added', 'Vinits Twenty Three Circle is Added', NULL, NULL, '2024-03-10 08:21:16', '2024-03-10 08:21:16'),
(21, 1, 11, 'Public Group Added', 'Vinits Twenty Four Circle is Added', NULL, NULL, '2024-03-10 08:21:38', '2024-03-10 08:21:38'),
(22, 1, 11, 'Public Group Added', 'Vinits Twenty Five Circle is Added', NULL, NULL, '2024-03-10 08:24:30', '2024-03-10 08:24:30'),
(23, 1, 11, 'Public Group Added', 'Vinits Twenty Six Circle is Added', NULL, NULL, '2024-03-10 08:26:13', '2024-03-10 08:26:13'),
(24, 1, 11, 'Public Group Added', 'Vinits Twenty Sevn Circle is Added', NULL, NULL, '2024-03-10 08:26:29', '2024-03-10 08:26:29'),
(25, 1, 11, 'Public Group Added', 'Vinits Twenty Eigth Circle is Added', NULL, NULL, '2024-03-10 08:28:10', '2024-03-10 08:28:10'),
(26, 1, 11, 'Public Group Added', 'Vinits Twenty Eigth Circle is Added', NULL, NULL, '2024-03-10 08:28:53', '2024-03-10 08:28:53'),
(27, 1, 11, 'Public Group Added', 'Vinits Twenty Eigth Circle is Added', NULL, NULL, '2024-03-10 08:29:36', '2024-03-10 08:29:36'),
(28, 1, 11, 'Public Group Added', 'Vinits Twenty Eigth Circle is Added', NULL, NULL, '2024-03-10 08:30:03', '2024-03-10 08:30:03'),
(29, 1, 11, 'Public Group Added', 'Vinits Twenty Eigth Circle is Added', NULL, NULL, '2024-03-10 08:30:33', '2024-03-10 08:30:33'),
(30, 1, 11, 'Public Group Added', 'Vinits Twenty Eigth Circle is Added', '{\"status\":500,\"message\":\"The registration token is not a valid FCM registration token\"}', NULL, '2024-03-10 08:33:02', '2024-03-10 08:33:02'),
(31, 1, 11, 'Public Group Added', 'Vinits Twenty Eigth Circle is Added', NULL, NULL, '2024-03-10 08:35:03', '2024-03-10 08:35:03'),
(32, 14, 1, 'New Member Joined', ' Joined the Group! Please Verify him to continue', NULL, NULL, '2024-03-11 11:13:13', '2024-03-11 11:13:13'),
(33, 15, 1, 'New Member Joined', 'Meera Rathod Joined the Group! Please Verify him to continue', NULL, NULL, '2024-03-11 11:15:03', '2024-03-11 11:15:03'),
(34, 15, 1, 'New Member Joined', 'Meera Rathod Joined the Group! Please Verify him to continue', NULL, NULL, '2024-03-11 11:16:13', '2024-03-11 11:16:13'),
(35, 15, 1, 'New Member Joined', 'Meera Rathod Joined the Group! Please Verify to continue', NULL, NULL, '2024-03-11 11:18:08', '2024-03-11 11:18:08'),
(36, 15, 1, 'New Member Joined', 'Meera Rathod Joined the Group! Please Verify to continue', '{\"status\":500,\"message\":\"Invalid value at \'message.data[1].value\' (TYPE_STRING), 15\\nInvalid value at \'message.data[2].value\' (TYPE_STRING), 1\"}', NULL, '2024-03-11 11:38:58', '2024-03-11 11:38:58'),
(37, 15, 1, 'New Member Joined', 'Meera Rathod Joined the Group! Please Verify to continue', NULL, NULL, '2024-03-11 11:40:49', '2024-03-11 11:40:49'),
(38, 15, 1, 'New Member Joined', 'Meera Rathod Joined the Group! Please Verify to continue', NULL, NULL, '2024-03-11 11:41:22', '2024-03-11 11:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saved_numbers`
--

CREATE TABLE `tbl_saved_numbers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `numbers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`numbers`)),
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_saved_numbers`
--

INSERT INTO `tbl_saved_numbers` (`id`, `user_id`, `numbers`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, '[34,12,5,7,1,10,3]', '2024-02-13 17:39:36', '2023-11-15 09:33:17', '2024-02-13 17:39:36'),
(3, 11, '[45,7,3,6,18,10,1]', '2024-02-13 18:27:38', '2023-11-25 13:05:06', '2024-02-13 18:27:38'),
(4, 11, '[21,44,46,21,33,3,12]', '2024-02-13 18:27:38', '2023-11-25 13:07:12', '2024-02-13 18:27:38'),
(5, 12, '[21,44,46,21,33,3,12]', '2024-02-13 18:26:47', '2023-11-25 13:40:01', '2024-02-13 18:26:47'),
(6, 12, '[21,44,46,21,33,3,12]', '2024-02-13 18:26:47', '2023-12-03 11:11:46', '2024-02-13 18:26:47'),
(7, 12, '[21,44,46,21,33,3,12]', '2024-02-13 18:26:47', '2023-12-03 11:12:21', '2024-02-13 18:26:47'),
(8, 1, '[44,7,24,50,30,11,5]', '2024-02-13 17:39:36', '2024-02-12 06:55:08', '2024-02-13 17:39:36'),
(9, 1, '[21,44,46,21,33,2,11]', '2024-02-13 17:39:36', '2024-02-12 14:24:26', '2024-02-13 17:39:36'),
(10, 1, '[21,44,46,21,33,2,10]', NULL, '2024-03-13 16:08:04', '2024-03-13 16:08:04');

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
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`id`, `user_id`, `dob`, `phone`, `post_code`, `security_question`, `security_answer`, `receive_emails_notification`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-10-09', '8521473699', '395009', 'What is my Grand Grand Father\'s Name', 'Hirjibhai', 1, '2024-02-13 17:36:14', '2023-11-03 20:03:46', '2024-02-13 17:36:14'),
(8, 8, '2023-10-09', '8521473690', '395009', 'What is my Grand Grand Father\'s Name', 'Hirjibhai', 1, '2024-02-13 18:26:31', '2023-11-25 12:36:47', '2024-02-13 18:26:31'),
(11, 11, '2023-10-09', '7046377115', '395009', 'What is my Grand Grand Father\'s Name', 'Hirjibhai', 1, '2024-02-13 18:27:38', '2023-11-25 13:03:54', '2024-02-13 18:27:38'),
(12, 12, '2023-10-09', '7046377115', '395009', 'What is my Grand Grand Father\'s Name', 'Hirjibhai', 1, '2024-02-13 18:26:47', '2023-11-25 13:39:37', '2024-02-13 18:26:47'),
(13, 14, '2023-10-09', '7046377115', '123456', 'What is my Grand Grand Father\'s Name', 'Hirjibhai', 1, NULL, '2024-03-11 16:34:05', '2024-03-11 16:34:05'),
(14, 15, '2023-10-09', '7046377115', '123456', 'What is my Grand Grand Father\'s Name', 'Hirjibhai', 1, NULL, '2024-03-11 16:44:45', '2024-03-11 16:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_request`
--

CREATE TABLE `tbl_user_request` (
  `id` int(11) NOT NULL,
  `user_request_id` int(11) NOT NULL,
  `circle_id` int(11) NOT NULL,
  `verified` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_winners`
--

CREATE TABLE `tbl_winners` (
  `id` int(11) NOT NULL,
  `circle_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_number` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`user_number`)),
  `status` varchar(50) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_winners`
--

INSERT INTO `tbl_winners` (`id`, `circle_id`, `user_id`, `user_number`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 07:04:58', '2024-03-06 17:02:17'),
(2, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 07:09:40', '2024-03-06 17:02:17'),
(3, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 07:20:39', '2024-03-06 17:02:17'),
(4, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 07:22:36', '2024-03-06 17:02:17'),
(5, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 07:23:23', '2024-03-06 17:02:17'),
(6, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 07:55:11', '2024-03-06 17:02:17'),
(7, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 08:08:49', '2024-03-06 17:02:17'),
(8, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 08:11:29', '2024-03-06 17:02:17'),
(9, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 08:11:32', '2024-03-06 17:02:17'),
(10, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 08:11:33', '2024-03-06 17:02:17'),
(11, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 08:11:35', '2024-03-06 17:02:17'),
(12, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 08:11:37', '2024-03-06 17:02:17'),
(13, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 08:14:25', '2024-03-06 17:02:17'),
(14, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 08:15:03', '2024-03-06 17:02:17'),
(15, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-03-06 17:02:17', '2024-02-12 08:16:50', '2024-03-06 17:02:17'),
(16, 12, 1, '[21,44,46,21,33,2,11]', 'Fully', '2024-03-06 17:02:17', '2024-02-12 14:24:48', '2024-03-06 17:02:17');

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
  `firebase_token` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `firebase_token`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mr', 'Vinit', 'Rathod', 'vinitrathod123@gmail.com', NULL, '$2y$12$PylyvmJs8/lVcw0rrpT8QuLy8yV7vxLmILXKhFZlCX1BHzlHQQOIC', 'cH7uAofEDocFWAm4RwZ7G2:APA91bEwXpCm8j5-v7NUc2Tm4iU5q4Q7Q5Pa6el1FqYINrKoURLjqPLfv-xSNUXeHK_Y_eUoNek952tUwksu190rICk6SezMZFZ1n0pT-oJRehpNccedzuB4i4vyjGNzhj7XQtrnXfyK', NULL, NULL, '2023-11-03 14:33:46', '2024-02-13 12:09:36'),
(8, 'Mr', 'Kenndy', 'Space Center', 'asdfsadsf@gmail.com', NULL, '$2y$12$uajXzonyrrqBRG0nIOG5l.8eGPg3top5L/JSs8gqmyKkd7JkPXv8y', NULL, NULL, '2024-02-24 09:00:05', '2023-11-25 07:06:47', '2024-02-24 03:30:05'),
(11, 'Mr', 'John', 'Doe', 'johndoe@gmail.com', NULL, '$2y$12$VEyij7G8h2w4SqqiUKqQY.T8ddVoYq32sGPbcrYutfH8fzdN41CIm', 'cH7uAofEDocFWAm4RwZ7G2:APA91bEwXpCm8j5-v7NUc2Tm4iU5q4Q7Q5Pa6el1FqYINrKoURLjqPLfv-xSNUXeHK_Y_eUoNek952tUwksu190rICk6SezMZFZ1n0pT-oJRehpNccedzuB4i4vyjGNzhj7XQtrnXfyK', NULL, NULL, '2023-11-25 07:33:54', '2024-02-13 12:57:38'),
(12, 'Mr', 'Ronit', 'Rathod', 'ronit@gmail.com', NULL, '$2y$12$Veg7omIArks87Lpbbdcf0eO1aBbZu8dkgtLrZMKnEdBukhTK2Qp/a', NULL, NULL, '2024-02-13 18:26:47', '2023-11-25 08:09:37', '2024-02-13 12:56:47'),
(14, 'Mr', 'Vinod', 'Rathod', 'vinodrathod@gmail.com', NULL, '$2y$12$3Z/gDasVFB.vLPzKKNm.3uTco6jeoXYJEw.kghc/P6lrVLKdzZigO', 'cH7uAofEDocFWAm4RwZ7G2:APA91bEwXpCm8j5-v7NUc2Tm4iU5q4Q7Q5Pa6el1FqYINrKoURLjqPLfv-xSNUXeHK_Y_eUoNek952tUwksu190rICk6SezMZFZ1n0pT-oJRehpNccedzuB4i4vyjGNzhj7XQtrnXfyK', NULL, NULL, '2024-03-11 11:04:05', '2024-03-11 11:04:05'),
(15, 'Mr', 'Meera', 'Rathod', 'meerarathod@gmail.com', NULL, '$2y$12$fRblmWjzt3aSw/UV/UuQ0urs2EC0b812VhkS0BohKDIGZwxbEw6bK', NULL, NULL, NULL, '2024-03-11 11:14:45', '2024-03-11 11:14:45');

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
-- Indexes for table `tbl_admin_user`
--
ALTER TABLE `tbl_admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_circles`
--
ALTER TABLE `tbl_circles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_draw_numbers`
--
ALTER TABLE `tbl_draw_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_group_members`
--
ALTER TABLE `tbl_group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_saved_numbers`
--
ALTER TABLE `tbl_saved_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_request`
--
ALTER TABLE `tbl_user_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_winners`
--
ALTER TABLE `tbl_winners`
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
-- AUTO_INCREMENT for table `tbl_admin_user`
--
ALTER TABLE `tbl_admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_circles`
--
ALTER TABLE `tbl_circles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_draw_numbers`
--
ALTER TABLE `tbl_draw_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_group_members`
--
ALTER TABLE `tbl_group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_saved_numbers`
--
ALTER TABLE `tbl_saved_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user_request`
--
ALTER TABLE `tbl_user_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_winners`
--
ALTER TABLE `tbl_winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
