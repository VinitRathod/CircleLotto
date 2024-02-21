-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 21, 2024 at 06:39 PM
-- Server version: 10.11.6-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u735684498_circlelotto`
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
('00bf682413c0a063507d37c712330c6f6d45c4f2e38d1cd8d9b072c08562a49efc89bf6774527536', 14, 7, 'Circle Lotto Login', '[]', 0, '2024-02-15 07:25:25', '2024-02-15 07:25:25', '2025-02-15 07:25:25'),
('036b015f8f6977714cbc8f4a8682acdb3b76d5a5aa609d88b2f5f3c690b335d44cece97c0bf7d32d', 13, 7, 'Circle Lotto Login', '[]', 0, '2024-02-12 16:19:19', '2024-02-12 16:19:19', '2025-02-12 16:19:19'),
('0def1900888d60b5ec096fe2496268d9610d9fa0fba9cf02508379a79324102d29dfca7b1b5ff4fd', 3, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:31:08', '2023-11-22 14:31:08', '2024-11-22 20:01:08'),
('11a414236a05673cbdeca9502dfb234e6502ac28f989fa63d254f5775f223806eac3c31c10ace8f7', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-02-09 10:52:00', '2024-02-09 10:52:01', '2025-02-09 16:22:00'),
('1c05281e7f5661a9b38b14e45888785307f70c5997515c5cfaf0a4548ea452fbfb92d368611ec64e', 11, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:33:54', '2023-11-25 07:33:54', '2024-11-25 13:03:54'),
('3564968f5c59570dce474adbf9430ddbfcd50ce8b6a2860393ca40cdc1ee2d3f8e058468d8ab9e54', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:49:55', '2023-11-01 13:49:55', '2024-11-01 19:19:55'),
('39ddf7dba9e26f2f3d06afb5179498bd95a558b7734ec2a1a35f7d877dba27f9a675d50c7a78c30e', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-02-09 12:33:41', '2024-02-09 12:33:41', '2025-02-09 18:03:41'),
('3b25cb0bc0f49e4856d50702253f2e4fd29ae923cd6eee247875704cfba55d328771221ea7d27daf', 2, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:13:40', '2023-11-22 14:13:40', '2024-11-22 19:43:40'),
('45363d823723406a16e46b7f13bed812dc5d5b2aaf97707fd62f23f9b1a0885e6f1d1d9697bbf607', 1, 7, 'Circle Lotto Login', '[]', 1, '2024-01-16 10:28:43', '2024-01-29 12:27:52', '2025-01-16 15:58:43'),
('4721eaa638f91a928b698b11191aff0a243d45b12511664644b7d85c4fe918538baccda0e6da311a', 8, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:06:47', '2023-11-25 07:06:47', '2024-11-25 12:36:47'),
('4b21a3382df7e09bb0632b930ab44cc7c9e9743098a2f51ff09226669acaa6eeb570b906edd1724f', 14, 7, 'Circle Lotto Login', '[]', 0, '2024-02-14 12:59:35', '2024-02-14 12:59:35', '2025-02-14 12:59:35'),
('56373f435ea7b9933e8a6497df42ccc753241c9da04a5f75afc8fa0687c2e0e4b965dbb267cad532', 6, 7, 'Circle Lotto Login', '[]', 1, '2023-11-02 12:56:37', '2023-11-02 13:00:22', '2024-11-02 18:26:37'),
('6235743b1a1b1e36ab4b8e0b60a2d844c47b56d9e1dd0e05e9fc22b2faea5bf1132f0457c4114e0c', 13, 7, 'Circle Lotto Login', '[]', 0, '2024-02-12 16:18:52', '2024-02-12 16:18:52', '2025-02-12 16:18:52'),
('652229c6d9feadba476e1339fe2da10e0f22de1403af7700d1a3606b1ade2134f856019705b33490', 14, 7, 'Circle Lotto Login', '[]', 0, '2024-02-21 08:54:03', '2024-02-21 08:54:03', '2025-02-21 08:54:03'),
('6e56648b873e4d0a9a8e5830834f0f1b14a337ee329ab6832114c99376f655c49551d46c91b6aeee', 13, 7, 'Circle Lotto Login', '[]', 0, '2024-02-16 18:57:20', '2024-02-16 18:57:20', '2025-02-16 18:57:20'),
('6eaa560d478d40cc223a721c80651264dfbc1c8d2569d02254f585282bf5495a20f986ab7d256d81', 13, 7, 'Circle Lotto Login', '[]', 0, '2024-02-17 18:53:37', '2024-02-17 18:53:37', '2025-02-17 18:53:37'),
('716516e95b48e6e2ca94f3d7cbdca1fa5eb77c25556bad652b2e8cb828d2c2e5549b9c03b5846503', 13, 7, 'Circle Lotto Login', '[]', 0, '2024-02-20 18:40:35', '2024-02-20 18:40:35', '2025-02-20 18:40:35'),
('720528379e2ff9a9980ba22f56dd5013475a93650f40d402bc3e0c5a762a136d2fb8ac5262de71d6', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-17 09:13:42', '2023-11-17 09:13:42', '2024-11-17 14:43:42'),
('7412bef59475d4700b61f3019fa6a2b317dfe77f7e45f22a3e22b361bd0ea244bd9bbecb6931f211', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:33:46', '2023-11-03 14:33:46', '2024-11-03 20:03:46'),
('794e4e0c938256685ea5756cd7417db7882016fee5fca878be61c2a2bacbb325a27b8a8426652fbb', 8, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:26:48', '2023-11-03 14:26:48', '2024-11-03 19:56:48'),
('81339d0fa0d7ac0d41a51d5c34bebe5e9e0eee6ced20515092df013e04d3c02b64f3923ce4136e06', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-15 01:44:18', '2023-11-15 01:44:18', '2024-11-15 07:14:18'),
('81b91f4a6ca8441888377f673d26a0185bb1bf5adac75a2a0de607f679494a948d4b6c3e2c15c127', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:31:46', '2023-11-03 14:31:46', '2024-11-03 20:01:46'),
('862bfd25c9116cf8702b087f96fc33adae1d66fc0411dca40ad433381eef4f13f54a9d07189a0b8c', 14, 7, 'Circle Lotto Login', '[]', 0, '2024-02-14 12:59:40', '2024-02-14 12:59:40', '2025-02-14 12:59:40'),
('86e8e72a42b14c018429760b9faae45e8fd4429633646f58131c3a9c8fb6a1c76a417633d689aa7d', 15, 7, 'Circle Lotto Login', '[]', 0, '2024-02-20 18:30:38', '2024-02-20 18:30:38', '2025-02-20 18:30:38'),
('8b326909ca521cfdf4f13b7edf78d366175588798595df922e6002499f2b75608741d06ac29926e4', 4, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:40:49', '2023-11-22 14:40:49', '2024-11-22 20:10:49'),
('952b28884b3bb147f1f5380cd96cd69248d4e57cee110023f35a322e947dca9ab795bc3895c3b91e', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-02 12:23:31', '2023-11-02 12:23:31', '2024-11-02 17:53:31'),
('97bb6279a7e253ff9a3de51feec12d16f8a63e41ff7319ecc3297d09fbe0381cd3a65ad460ab4e00', 10, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:12:53', '2023-11-25 07:12:53', '2024-11-25 12:42:53'),
('a02ada6dbde608cbfffbc4a17835edb87384b2de4601f0d3a3927f799ad7512d083c93a1dbdcf13a', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:50:23', '2023-11-01 13:50:23', '2024-11-01 19:20:23'),
('a85b3eca8c3b35878d8d27c1918a032aa99fddabb387e25d0ec38d08535f56afb5714ef3ac701185', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-02 11:43:09', '2023-11-02 11:43:09', '2024-11-02 17:13:09'),
('b27fbc8698ef3ec65cc2329769dbff97fe7dcef108b29684d6237792476e41d13b5e3534fcd77b12', 13, 7, 'Circle Lotto Login', '[]', 0, '2024-02-18 15:26:03', '2024-02-18 15:26:03', '2025-02-18 15:26:03'),
('c06fb06127182269c89119a1f25bc6804c34d88aa5541305e6c10f841b790bfaa7e88bcd60817c30', 5, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:41:46', '2023-11-22 14:41:46', '2024-11-22 20:11:46'),
('c496b6ec35c9772fa9cfa44a60cbe0c17ac04b8f0aa5f605e220820f44166f5e657c64fc13784478', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:25:24', '2023-11-03 14:25:25', '2024-11-03 19:55:24'),
('c6a57aa3b70ccb27947d3a0b653da095ec8874afec8f0124dedf73c4d8c2e11d0929f47e8c3c8269', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 12:22:29', '2023-11-03 12:22:29', '2024-11-03 17:52:29'),
('c738cc9e9a15cf133c29b4ddf6bf5f5733ccafe3d7dbd023787e1714d484f15fda5eda2d0c6039d3', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:07:48', '2023-11-25 07:07:48', '2024-11-25 12:37:48'),
('c87d0ca16f45effedd9f3f7dbbc6f292c39f9388cf0224d7c21506d1b9f46a2a88d859f48a3fd644', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:42:02', '2023-11-22 14:42:02', '2024-11-22 20:12:02'),
('ca8aefda37d8b9ae47a47936b8c0ad23e74c32c8852556b89ebed4fc51c0c1dc1ca21a28a0e73943', 10, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:32:22', '2023-11-03 14:32:22', '2024-11-03 20:02:22'),
('ce60f32f3a13ff84ed7ef85d12be745939752f876b50cc695f31d44651ce45b29f8dfd5578bb92ef', 15, 7, 'Circle Lotto Login', '[]', 0, '2024-02-20 18:30:18', '2024-02-20 18:30:18', '2025-02-20 18:30:18'),
('d227b8414249dc19f588a8f4e6dfd1625747afd0342b439123d4e7588161a48de9c3402e11e519e4', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-02-16 17:13:03', '2024-02-16 17:13:03', '2025-02-16 17:13:03'),
('d623d488b3f8cfeb8af9e69c1f59b2f6fef84a76d429f94d39c8b8625460b034d4f18a2c185d41c5', 13, 7, 'Circle Lotto Login', '[]', 0, '2024-02-18 14:49:47', '2024-02-18 14:49:48', '2025-02-18 14:49:47'),
('e55b625ff2a67d151f87fbfd12c99e6062a992a885da5a177ac0476b8cebe3acd6ea401a8bee43d4', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:05:49', '2023-11-25 07:05:49', '2024-11-25 12:35:49'),
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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_circles`
--

INSERT INTO `tbl_circles` (`id`, `user_id`, `circle_name`, `circle_type`, `circle_amount`, `created_at`, `updated_at`) VALUES
(12, 1, 'Test Circle', 1, 5000, '2024-02-09 16:48:28', '2024-02-09 16:48:28'),
(13, 13, 'venis', 2, 5, '2024-02-12 16:25:52', '2024-02-12 16:25:52'),
(14, 14, 'Alpha', 2, 50, '2024-02-14 13:03:04', '2024-02-14 13:03:04'),
(15, 15, '5 star group', 1, 10, '2024-02-20 18:31:14', '2024-02-20 18:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_draw_numbers`
--

CREATE TABLE `tbl_draw_numbers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `circle_id` int(11) NOT NULL,
  `numbers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`numbers`)),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_draw_numbers`
--

INSERT INTO `tbl_draw_numbers` (`id`, `user_id`, `circle_id`, `numbers`, `created_at`, `updated_at`) VALUES
(11, 1, 12, '[44,7,24,50,30,11,5]', '2024-02-12 06:55:08', '2024-02-12 06:55:08'),
(12, 1, 12, '[21,44,46,21,33,2,11]', '2024-02-12 14:24:26', '2024-02-12 14:24:26'),
(13, 13, 13, '[5,9,29,33,34,8,12]', '2024-02-12 16:25:53', '2024-02-12 16:25:53'),
(14, 13, 13, '[2,17,27,29,48,6,7]', '2024-02-12 16:44:33', '2024-02-12 16:44:33'),
(15, 14, 13, '[2,11,24,43,45,1,10]', '2024-02-14 13:00:51', '2024-02-14 13:00:51'),
(16, 14, 13, '[15,17,18,20,22,4,10]', '2024-02-14 13:00:51', '2024-02-14 13:00:51'),
(17, 14, 14, '[7,8,35,38,46,6,11]', '2024-02-15 06:08:18', '2024-02-15 06:08:18'),
(18, 14, 13, '[1,2,3,4,5,4,10]', '2024-02-15 06:09:14', '2024-02-15 06:09:14'),
(19, 14, 13, '[16,22,30,32,49,9,12]', '2024-02-15 06:09:14', '2024-02-15 06:09:14'),
(20, 13, 13, '[3,18,28,40,42,1,5]', '2024-02-17 19:25:48', '2024-02-17 19:25:48'),
(21, 13, 13, '[25,41,44,45,49,7,11]', '2024-02-17 19:41:19', '2024-02-17 19:41:19'),
(22, 13, 13, '[7,8,10,16,35,2,6]', '2024-02-17 19:41:56', '2024-02-17 19:41:56'),
(23, 13, 13, '[1,6,15,31,48,8,11]', '2024-02-17 19:55:08', '2024-02-17 19:55:08'),
(24, 13, 13, '[9,10,33,34,47,4,10]', '2024-02-17 19:55:08', '2024-02-17 19:55:08'),
(25, 13, 13, '[13,20,40,42,44,5,11]', '2024-02-19 15:47:53', '2024-02-19 15:47:53'),
(26, 15, 15, '[3,16,30,37,47,3,11]', '2024-02-20 18:31:14', '2024-02-20 18:31:14'),
(27, 15, 15, '[8,14,21,28,34,2,9]', '2024-02-20 18:31:15', '2024-02-20 18:31:15'),
(28, 13, 15, '[9,15,33,42,43,6,12]', '2024-02-20 18:41:14', '2024-02-20 18:41:14'),
(29, 13, 15, '[9,15,33,42,44,6,12]', '2024-02-20 18:41:18', '2024-02-20 18:41:18'),
(30, 13, 15, '[9,16,33,42,44,6,12]', '2024-02-20 18:41:23', '2024-02-20 18:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_members`
--

CREATE TABLE `tbl_group_members` (
  `id` int(11) NOT NULL,
  `circle_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `verified` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_group_members`
--

INSERT INTO `tbl_group_members` (`id`, `circle_id`, `user_id`, `verified`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 0, '2024-02-09 18:04:43', '2024-02-09 18:04:43'),
(2, 13, 13, 1, '2024-02-12 16:40:31', '2024-02-12 16:40:31'),
(3, 13, 14, 1, '2024-02-14 12:59:51', '2024-02-14 12:59:51'),
(4, 12, 14, 0, '2024-02-14 13:01:19', '2024-02-14 13:01:19'),
(5, 14, 13, 1, '2024-02-14 16:05:29', '2024-02-14 16:05:29'),
(6, 14, 14, 1, '2024-02-15 06:08:04', '2024-02-15 06:08:04'),
(7, 15, 13, 1, '2024-02-20 18:40:17', '2024-02-20 18:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saved_numbers`
--

CREATE TABLE `tbl_saved_numbers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `numbers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`numbers`)),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_saved_numbers`
--

INSERT INTO `tbl_saved_numbers` (`id`, `user_id`, `numbers`, `created_at`, `updated_at`) VALUES
(2, 1, '[34,12,5,7,1,10,3]', '2023-11-15 09:33:17', '2023-11-15 09:33:17'),
(3, 11, '[45,7,3,6,18,10,1]', '2023-11-25 13:05:06', '2023-11-25 13:05:06'),
(4, 11, '[21,44,46,21,33,3,12]', '2023-11-25 13:07:12', '2023-11-25 13:07:12'),
(5, 12, '[21,44,46,21,33,3,12]', '2023-11-25 13:40:01', '2023-11-25 13:40:01'),
(6, 12, '[21,44,46,21,33,3,12]', '2023-12-03 11:11:46', '2023-12-03 11:11:46'),
(7, 12, '[21,44,46,21,33,3,12]', '2023-12-03 11:12:21', '2023-12-03 11:12:21'),
(8, 1, '[44,7,24,50,30,11,5]', '2024-02-12 06:55:08', '2024-02-12 06:55:08'),
(9, 1, '[21,44,46,21,33,2,11]', '2024-02-12 14:24:26', '2024-02-12 14:24:26'),
(10, 13, '[5,9,29,33,34,8,12]', '2024-02-12 16:25:53', '2024-02-12 16:25:53'),
(11, 13, '[2,17,27,29,48,6,7]', '2024-02-12 16:44:33', '2024-02-12 16:44:33'),
(12, 14, '[1,2,3,4,5,4,10]', '2024-02-14 13:00:19', '2024-02-15 06:08:59'),
(16, 14, '[1,2,3,4,5,4,10]', '2024-02-15 06:09:14', '2024-02-15 06:09:14'),
(18, 13, '[3,18,28,40,42,1,5]', '2024-02-17 19:25:48', '2024-02-17 19:25:48'),
(19, 13, '[25,41,44,45,49,7,11]', '2024-02-17 19:41:19', '2024-02-17 19:41:19'),
(20, 13, '[7,8,10,16,35,2,6]', '2024-02-17 19:41:56', '2024-02-17 19:41:56'),
(21, 13, '[1,6,15,31,48,8,11]', '2024-02-17 19:55:08', '2024-02-17 19:55:08'),
(22, 13, '[9,10,33,34,47,4,10]', '2024-02-17 19:55:08', '2024-02-17 19:55:08'),
(23, 13, '[13,20,40,42,44,5,11]', '2024-02-19 15:47:53', '2024-02-19 15:47:53'),
(24, 15, '[3,16,30,37,47,3,11]', '2024-02-20 18:31:14', '2024-02-20 18:31:14'),
(25, 15, '[8,14,21,28,34,2,9]', '2024-02-20 18:31:15', '2024-02-20 18:31:15'),
(26, 13, '[9,15,33,42,43,6,12]', '2024-02-20 18:41:14', '2024-02-20 18:41:14'),
(27, 13, '[9,15,33,42,44,6,12]', '2024-02-20 18:41:18', '2024-02-20 18:41:18'),
(28, 13, '[9,16,33,42,44,6,12]', '2024-02-20 18:41:23', '2024-02-20 18:41:23');

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
(1, 1, '2023-10-09', '8521473699', '395009', 'What is my Grand Grand Father\'s Name', 'Hirjibhai', 1, '2023-11-03 20:03:46', '2023-11-03 20:03:46'),
(8, 8, '2023-10-09', '8521473690', '395009', 'What is my Grand Grand Father\'s Name', 'Hirjibhai', 1, '2023-11-25 12:36:47', '2023-11-25 12:36:47'),
(11, 11, '2023-10-09', '7046377115', '395009', 'What is my Grand Grand Father\'s Name', 'Hirjibhai', 1, '2023-11-25 13:03:54', '2023-11-25 13:03:54'),
(12, 12, '2023-10-09', '7046377115', '395009', 'What is my Grand Grand Father\'s Name', 'Hirjibhai', 1, '2023-11-25 13:39:37', '2023-11-25 13:39:37'),
(13, 13, '2023-10-09', '9157834380', '395008', 'In what city did you meet your partner?', 'jetain', 1, '2024-02-12 16:18:52', '2024-02-12 16:18:52'),
(14, 14, '1980-05-20', '07811878195', 'LE5 6SP', 'In what city did you meet your partner?', 'leicester', 1, '2024-02-14 12:59:35', '2024-02-14 12:59:35'),
(15, 15, '2023-10-09', '9157834380', '395008', 'In what city did you meet your partner?', 'jetain', 1, '2024-02-20 18:30:18', '2024-02-20 18:30:18');

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
(1, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 07:04:58', '2024-02-12 15:59:56'),
(2, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 07:09:40', '2024-02-12 15:59:56'),
(3, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 07:20:39', '2024-02-12 15:59:56'),
(4, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 07:22:36', '2024-02-12 15:59:56'),
(5, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 07:23:23', '2024-02-12 15:59:56'),
(6, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 07:55:11', '2024-02-12 15:59:56'),
(7, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 08:08:49', '2024-02-12 15:59:56'),
(8, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 08:11:29', '2024-02-12 15:59:56'),
(9, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 08:11:32', '2024-02-12 15:59:56'),
(10, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 08:11:33', '2024-02-12 15:59:56'),
(11, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 08:11:35', '2024-02-12 15:59:56'),
(12, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 08:11:37', '2024-02-12 15:59:56'),
(13, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 08:14:25', '2024-02-12 15:59:56'),
(14, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 08:15:03', '2024-02-12 15:59:56'),
(15, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 08:16:50', '2024-02-12 15:59:56'),
(16, 12, 1, '[21,44,46,21,33,2,11]', 'Fully', '2024-02-12 15:59:56', '2024-02-12 14:24:48', '2024-02-12 15:59:56'),
(17, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', '2024-02-12 15:59:56', '2024-02-12 15:59:50', '2024-02-12 15:59:56'),
(18, 12, 1, '[44,7,24,50,30,11,5]', 'Partially', NULL, '2024-02-12 15:59:56', '2024-02-12 15:59:56');

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
(1, 'Mr', 'Vinit', 'Rathod', 'vinitrathod123@gmail.com', NULL, '$2y$12$PylyvmJs8/lVcw0rrpT8QuLy8yV7vxLmILXKhFZlCX1BHzlHQQOIC', NULL, '2023-11-03 14:33:46', '2023-11-03 14:33:46'),
(8, 'Mr', 'Kenndy', 'Space Center', 'asdfsadsf@gmail.com', NULL, '$2y$12$uajXzonyrrqBRG0nIOG5l.8eGPg3top5L/JSs8gqmyKkd7JkPXv8y', NULL, '2023-11-25 07:06:47', '2023-11-25 07:06:47'),
(11, 'Mr', 'John', 'Doe', 'johndoe@gmail.com', NULL, '$2y$12$VEyij7G8h2w4SqqiUKqQY.T8ddVoYq32sGPbcrYutfH8fzdN41CIm', NULL, '2023-11-25 07:33:54', '2023-11-25 07:33:54'),
(12, 'Mr', 'Ronit', 'Rathod', 'ronit@gmail.com', NULL, '$2y$12$Veg7omIArks87Lpbbdcf0eO1aBbZu8dkgtLrZMKnEdBukhTK2Qp/a', NULL, '2023-11-25 08:09:37', '2023-11-25 08:09:37'),
(13, 'Mr', 'hjff', 'vhyr', 'venis@gmail.com', NULL, '$2y$12$a8SbyTdOEcr/5pyDy5d/vuZp8wa82Bt.GMd4FvDNYxU8QgBHgiaHi', NULL, '2024-02-12 16:18:52', '2024-02-12 16:18:52'),
(14, 'Ms', 'henah', 'vadher', 'jetain@hotmail.com', NULL, '$2y$12$pptjYkwacpHi93ZlEnme/ediiYTfBB7aGItkTDj410ORJkrMn1iJa', NULL, '2024-02-14 12:59:35', '2024-02-14 12:59:35'),
(15, 'Mr', 'venish', 'vasani', 'venis1@gmail.com', NULL, '$2y$12$KCgeHyhcYdGAj/kTxWemQ.3Sezvfn.fRiso78TMzaEN9dD0UGjtlu', NULL, '2024-02-20 18:30:18', '2024-02-20 18:30:18');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_draw_numbers`
--
ALTER TABLE `tbl_draw_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_group_members`
--
ALTER TABLE `tbl_group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_saved_numbers`
--
ALTER TABLE `tbl_saved_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user_request`
--
ALTER TABLE `tbl_user_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_winners`
--
ALTER TABLE `tbl_winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
