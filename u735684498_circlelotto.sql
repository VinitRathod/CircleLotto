-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2024 at 03:15 PM
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
('0356b564d5b819264498244772d1daccf05a081b2b2a11ff09f01e8d542eb98df74fa4b586158c5a', 21, 7, 'Circle Lotto Login', '[]', 0, '2024-02-03 09:32:54', '2024-02-03 09:32:54', '2025-02-03 09:32:54'),
('0def1900888d60b5ec096fe2496268d9610d9fa0fba9cf02508379a79324102d29dfca7b1b5ff4fd', 3, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:31:08', '2023-11-22 14:31:08', '2024-11-22 20:01:08'),
('144fcdd801ecfc3017df4e26ca3d2c909f788d5912579c8e8ec3d8a7751f95e757e9d636b2f37840', 13, 7, 'Circle Lotto Login', '[]', 0, '2024-01-30 18:16:18', '2024-01-30 18:16:18', '2025-01-30 18:16:18'),
('16efb774312551da43ea22476692e4b3e4f0c14588d47c9e410e2e8032d33ac0dc7cdf2bb160aad9', 21, 7, 'Circle Lotto Login', '[]', 0, '2024-02-03 09:51:53', '2024-02-03 09:51:53', '2025-02-03 09:51:53'),
('17a8029aee2fe681f44e1e6eeb10494055ce24ebc2a5edb927c6e8988835b89bd6e1da7651af3ad1', 14, 7, 'Circle Lotto Login', '[]', 0, '2024-02-06 16:58:01', '2024-02-06 16:58:01', '2025-02-06 16:58:01'),
('1c05281e7f5661a9b38b14e45888785307f70c5997515c5cfaf0a4548ea452fbfb92d368611ec64e', 11, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:33:54', '2023-11-25 07:33:54', '2024-11-25 13:03:54'),
('26b6bd695180c544579edaa5444c02db0f1a89a824fbf8318637670ff408d194281eec67052b08b4', 21, 7, 'Circle Lotto Login', '[]', 0, '2024-02-03 09:32:00', '2024-02-03 09:32:00', '2025-02-03 09:32:00'),
('277d7e9c97a8d29a9a1db271e94523c10dd7df12f8d0e3ade83159eb13a5d4bc44e82372bc14c685', 14, 7, 'Circle Lotto Login', '[]', 0, '2024-01-30 18:16:27', '2024-01-30 18:16:27', '2025-01-30 18:16:27'),
('2b5984e59b6a96b010c20f017af321472d81f483ebbe11682541f1b961160b527ab211be616cdb02', 21, 7, 'Circle Lotto Login', '[]', 0, '2024-02-04 06:33:03', '2024-02-04 06:33:03', '2025-02-04 06:33:03'),
('2bf9f6153b3e289959d43d372251abbc882b4dc8e6879af9dc8ca1d6710f83e40ef6c8dbc14a4fab', 14, 7, 'Circle Lotto Login', '[]', 0, '2024-01-31 16:01:45', '2024-01-31 16:01:45', '2025-01-31 16:01:45'),
('33606d41fdf2aceff46526f99cbab214a7fd940ccc30d6b38ad187e9522372b8099ded288428421d', 20, 7, 'Circle Lotto Login', '[]', 0, '2024-02-02 16:18:40', '2024-02-02 16:18:40', '2025-02-02 16:18:40'),
('3564968f5c59570dce474adbf9430ddbfcd50ce8b6a2860393ca40cdc1ee2d3f8e058468d8ab9e54', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:49:55', '2023-11-01 13:49:55', '2024-11-01 19:19:55'),
('3b25cb0bc0f49e4856d50702253f2e4fd29ae923cd6eee247875704cfba55d328771221ea7d27daf', 2, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:13:40', '2023-11-22 14:13:40', '2024-11-22 19:43:40'),
('45363d823723406a16e46b7f13bed812dc5d5b2aaf97707fd62f23f9b1a0885e6f1d1d9697bbf607', 1, 7, 'Circle Lotto Login', '[]', 1, '2024-01-16 10:28:43', '2024-01-29 12:27:52', '2025-01-16 15:58:43'),
('4721eaa638f91a928b698b11191aff0a243d45b12511664644b7d85c4fe918538baccda0e6da311a', 8, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:06:47', '2023-11-25 07:06:47', '2024-11-25 12:36:47'),
('50d86af1fe0c1d25d442c1d20d1eccca83875199de5019636c220e650314d89780c3a7968c941c16', 18, 7, 'Circle Lotto Login', '[]', 0, '2024-01-30 19:39:21', '2024-01-30 19:39:21', '2025-01-30 19:39:21'),
('52214dc34baf78d68b786562a339f40cbe7263baa974eb3a87fb8bd2951d1620fdd4fad9471e7c4e', 21, 7, 'Circle Lotto Login', '[]', 0, '2024-02-03 10:36:31', '2024-02-03 10:36:31', '2025-02-03 10:36:31'),
('5495ce551adac489ddab6fd7fb08d07e161737c6449f5acc47d67cefcdb585e9b52219be195fd46a', 21, 7, 'Circle Lotto Login', '[]', 0, '2024-02-03 09:52:15', '2024-02-03 09:52:15', '2025-02-03 09:52:15'),
('56373f435ea7b9933e8a6497df42ccc753241c9da04a5f75afc8fa0687c2e0e4b965dbb267cad532', 6, 7, 'Circle Lotto Login', '[]', 1, '2023-11-02 12:56:37', '2023-11-02 13:00:22', '2024-11-02 18:26:37'),
('5ceb2498a6980de4d3c2e22c885580f95411c153532c1567210dfa4a72ef58f26609a7209e156a91', 17, 7, 'Circle Lotto Login', '[]', 0, '2024-01-30 18:39:40', '2024-01-30 18:39:40', '2025-01-30 18:39:40'),
('6a937582b68b4faeb6ad91aa1646a93b40c977aaf4470ecc39a47f831c227b504ac3c8043cbbfa18', 20, 7, 'Circle Lotto Login', '[]', 0, '2024-02-04 08:48:43', '2024-02-04 08:48:43', '2025-02-04 08:48:43'),
('720528379e2ff9a9980ba22f56dd5013475a93650f40d402bc3e0c5a762a136d2fb8ac5262de71d6', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-17 09:13:42', '2023-11-17 09:13:42', '2024-11-17 14:43:42'),
('7412bef59475d4700b61f3019fa6a2b317dfe77f7e45f22a3e22b361bd0ea244bd9bbecb6931f211', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:33:46', '2023-11-03 14:33:46', '2024-11-03 20:03:46'),
('757783d790943d5c6527e6f59f6cfe2f0b3007e0ba839e901002dc02c7efc9fe22b86f247afd0d3c', 21, 7, 'Circle Lotto Login', '[]', 0, '2024-02-03 10:32:15', '2024-02-03 10:32:15', '2025-02-03 10:32:15'),
('75dbde83ea786156a35d2ea663d635d0b3a3b25fa50074a649cf2d920de709c61c045e9747f5c7a9', 20, 7, 'Circle Lotto Login', '[]', 0, '2024-02-02 16:05:21', '2024-02-02 16:05:21', '2025-02-02 16:05:21'),
('794e4e0c938256685ea5756cd7417db7882016fee5fca878be61c2a2bacbb325a27b8a8426652fbb', 8, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:26:48', '2023-11-03 14:26:48', '2024-11-03 19:56:48'),
('81339d0fa0d7ac0d41a51d5c34bebe5e9e0eee6ced20515092df013e04d3c02b64f3923ce4136e06', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-15 01:44:18', '2023-11-15 01:44:18', '2024-11-15 07:14:18'),
('81b91f4a6ca8441888377f673d26a0185bb1bf5adac75a2a0de607f679494a948d4b6c3e2c15c127', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:31:46', '2023-11-03 14:31:46', '2024-11-03 20:01:46'),
('84137e93504f7dd2de2e62d3ddf5d589c2b3021c1f4e0f131399de93b6492cd379f027818020f46f', 20, 7, 'Circle Lotto Login', '[]', 0, '2024-02-04 08:53:59', '2024-02-04 08:53:59', '2025-02-04 08:53:59'),
('886089888e00ef0189020dc6379c4461084a298db6c2ab208fb781bf48b4681c15164e33a97e66e3', 14, 7, 'Circle Lotto Login', '[]', 0, '2024-02-02 16:01:31', '2024-02-02 16:01:31', '2025-02-02 16:01:31'),
('89cc3d5aa17e4ce9dc400ae704acedbc819756e5982a2cdac676028bd8e1167a61b51501cedf4202', 20, 7, 'Circle Lotto Login', '[]', 0, '2024-02-05 17:56:30', '2024-02-05 17:56:31', '2025-02-05 17:56:30'),
('8b326909ca521cfdf4f13b7edf78d366175588798595df922e6002499f2b75608741d06ac29926e4', 4, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:40:49', '2023-11-22 14:40:49', '2024-11-22 20:10:49'),
('8cce821355d3328a0db8905320a1df1ebbcca0ccaf934f92f28f1f180be77bf16276207bc10afbdb', 21, 7, 'Circle Lotto Login', '[]', 0, '2024-02-03 09:30:46', '2024-02-03 09:30:46', '2025-02-03 09:30:46'),
('952b28884b3bb147f1f5380cd96cd69248d4e57cee110023f35a322e947dca9ab795bc3895c3b91e', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-02 12:23:31', '2023-11-02 12:23:31', '2024-11-02 17:53:31'),
('97bb6279a7e253ff9a3de51feec12d16f8a63e41ff7319ecc3297d09fbe0381cd3a65ad460ab4e00', 10, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:12:53', '2023-11-25 07:12:53', '2024-11-25 12:42:53'),
('9a0f2cda632129682edafb635fba76aafda2fe48cfa32543720be35a27361b232d6220cce1574054', 21, 7, 'Circle Lotto Login', '[]', 0, '2024-02-03 10:05:59', '2024-02-03 10:05:59', '2025-02-03 10:05:59'),
('9bae1b471f0b567a4f55da4f700d261331bd94f0dd9ae295956bbd6f9df63b793a7f7165659126d2', 17, 7, 'Circle Lotto Login', '[]', 0, '2024-01-30 18:41:05', '2024-01-30 18:41:05', '2025-01-30 18:41:05'),
('a02ada6dbde608cbfffbc4a17835edb87384b2de4601f0d3a3927f799ad7512d083c93a1dbdcf13a', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:50:23', '2023-11-01 13:50:23', '2024-11-01 19:20:23'),
('a85b3eca8c3b35878d8d27c1918a032aa99fddabb387e25d0ec38d08535f56afb5714ef3ac701185', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-02 11:43:09', '2023-11-02 11:43:09', '2024-11-02 17:13:09'),
('ae9fad218fa3a25d2e612fb17b1ad28b8d88acb373e0c5db1c47a49969cc4083a7744c5054f4db83', 21, 7, 'Circle Lotto Login', '[]', 0, '2024-02-04 15:32:34', '2024-02-04 15:32:34', '2025-02-04 15:32:34'),
('b1b6a47943b1ed2962f049fc2d9184721ed231eff1d71ab194690c89a87624cc8eea4c181e669574', 20, 7, 'Circle Lotto Login', '[]', 0, '2024-02-04 08:50:12', '2024-02-04 08:50:12', '2025-02-04 08:50:12'),
('c06fb06127182269c89119a1f25bc6804c34d88aa5541305e6c10f841b790bfaa7e88bcd60817c30', 5, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:41:46', '2023-11-22 14:41:46', '2024-11-22 20:11:46'),
('c0a11b1d73d953b31a763a6ac592a2275d712921311feb7a763823bfb8e1e11a08e8521c40db7729', 14, 7, 'Circle Lotto Login', '[]', 0, '2024-01-30 18:56:02', '2024-01-30 18:56:02', '2025-01-30 18:56:02'),
('c496b6ec35c9772fa9cfa44a60cbe0c17ac04b8f0aa5f605e220820f44166f5e657c64fc13784478', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:25:24', '2023-11-03 14:25:25', '2024-11-03 19:55:24'),
('c6a57aa3b70ccb27947d3a0b653da095ec8874afec8f0124dedf73c4d8c2e11d0929f47e8c3c8269', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 12:22:29', '2023-11-03 12:22:29', '2024-11-03 17:52:29'),
('c738cc9e9a15cf133c29b4ddf6bf5f5733ccafe3d7dbd023787e1714d484f15fda5eda2d0c6039d3', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:07:48', '2023-11-25 07:07:48', '2024-11-25 12:37:48'),
('c87d0ca16f45effedd9f3f7dbbc6f292c39f9388cf0224d7c21506d1b9f46a2a88d859f48a3fd644', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:42:02', '2023-11-22 14:42:02', '2024-11-22 20:12:02'),
('ca8aefda37d8b9ae47a47936b8c0ad23e74c32c8852556b89ebed4fc51c0c1dc1ca21a28a0e73943', 10, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:32:22', '2023-11-03 14:32:22', '2024-11-03 20:02:22'),
('dfc9912bc1856cbe2c4421d1ebf7dc0b32ca571bef33d6d814a27baeefd06c1844a56cde1bd2edb6', 21, 7, 'Circle Lotto Login', '[]', 0, '2024-02-04 06:37:09', '2024-02-04 06:37:09', '2025-02-04 06:37:09'),
('e55b625ff2a67d151f87fbfd12c99e6062a992a885da5a177ac0476b8cebe3acd6ea401a8bee43d4', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:05:49', '2023-11-25 07:05:49', '2024-11-25 12:35:49'),
('e8b068bcee6a151e4e7933e14c526484ad059b2c578186519d1541804df22bd95440baf95b8183f8', 16, 7, 'Circle Lotto Login', '[]', 0, '2024-01-30 18:37:02', '2024-01-30 18:37:02', '2025-01-30 18:37:02'),
('ebe5d0d2b649e67f1572ad3bbbf0665f92d75d01a0c3ef00b74b5d2507a5946a35c34a8af76f6f72', 8, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:50:05', '2023-11-01 13:50:05', '2024-11-01 19:20:05'),
('ebee83fa56904a720b82c328769ca8aec56f63828546446a75f9b4261e4a4893dc4d3d5d79ad1345', 20, 7, 'Circle Lotto Login', '[]', 0, '2024-02-04 07:46:04', '2024-02-04 07:46:04', '2025-02-04 07:46:04'),
('f237e7b8ced4915dc9b3fe279cf988c92b5663f762a7c84df5c827667b781d78a808360d3eed9eb2', 19, 7, 'Circle Lotto Login', '[]', 0, '2024-01-31 16:37:08', '2024-01-31 16:37:08', '2025-01-31 16:37:08'),
('f54514ab0b2d8b67adb94461c98fd31313b8c4d4fae377cd46ecc31ccb1c8b0d1a6861d13d48388b', 21, 7, 'Circle Lotto Login', '[]', 0, '2024-02-03 10:38:33', '2024-02-03 10:38:33', '2025-02-03 10:38:33'),
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
(1, 1, 'Test Circle', 1, NULL, '2023-11-03 20:03:46', '2023-11-03 20:03:46'),
(2, 8, 'TestTest Circle', 1, NULL, '2023-11-25 12:36:47', '2023-11-25 12:36:47'),
(3, 14, 'vutr', 2, 50, '2024-01-30 19:03:46', '2024-01-30 19:03:46'),
(4, 20, '12345678', 1, 10, '2024-02-02 16:05:39', '2024-02-02 16:05:39'),
(5, 21, 'jet', 2, 5, '2024-02-03 10:07:15', '2024-02-03 10:07:15');

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
(1, 1, 1, '[16,39,41,21,28,10,1]', '2023-11-15 08:59:26', '2023-11-15 08:59:26'),
(8, 12, 2, '[21,44,46,21,33,3,12]', '2023-11-25 13:40:01', '2023-11-25 13:40:01'),
(11, 14, 3, '[14,18,23,38,44,7,8]', '2024-01-30 19:09:56', '2024-01-30 19:09:56'),
(12, 18, 3, '[2,12,28,45,48,5,9]', '2024-01-31 15:46:06', '2024-01-31 15:46:06'),
(13, 14, 3, '[7,15,33,42,43,5,12]', '2024-01-31 16:36:02', '2024-01-31 16:36:02'),
(14, 19, 3, '[3,17,34,37,39,5,12]', '2024-02-02 15:04:55', '2024-02-02 15:04:55'),
(15, 20, 4, '[9,14,15,22,35,2,10]', '2024-02-02 16:05:40', '2024-02-02 16:05:40'),
(16, 21, 5, '[26,32,34,43,46,1,12]', '2024-02-03 10:07:15', '2024-02-03 10:07:15'),
(17, 21, 5, '[15,16,17,22,28,4,10]', '2024-02-03 10:07:15', '2024-02-03 10:07:15'),
(18, 21, 5, '[4,29,37,39,43,10,12]', '2024-02-03 10:14:34', '2024-02-03 10:14:34'),
(19, 21, 5, '[16,22,26,28,4,10]', '2024-02-03 10:14:35', '2024-02-03 10:14:35'),
(20, 21, 5, '[10,11,33,39,46,4,10]', '2024-02-03 10:14:35', '2024-02-03 10:14:35'),
(21, 21, 3, '[13,22,26,28,34,4,10]', '2024-02-03 10:25:37', '2024-02-03 10:25:37'),
(22, 21, 3, '[11,17,22,26,27,4,10]', '2024-02-03 10:26:17', '2024-02-03 10:26:17'),
(23, 21, 3, '[2,5,10,28,47,1,8]', '2024-02-03 10:29:01', '2024-02-03 10:29:01'),
(24, 21, 3, '[6,7,20,21,36,5,7]', '2024-02-03 10:29:01', '2024-02-03 10:29:01'),
(25, 21, 5, '[12,14,16,21,32,4,6]', '2024-02-03 10:33:23', '2024-02-03 10:33:23'),
(26, 21, 5, '[19,26,30,31,34,11,12]', '2024-02-03 10:34:58', '2024-02-03 10:34:58'),
(27, 21, 3, '[21,22,27,28,34,3,9]', '2024-02-03 10:35:39', '2024-02-03 10:35:39'),
(28, 21, 5, '[16,17,27,41,44,3,12]', '2024-02-03 10:37:24', '2024-02-03 10:37:24'),
(29, 21, 3, '[16,17,22,28,34,4,10]', '2024-02-03 10:40:04', '2024-02-03 10:40:04'),
(30, 21, 3, '[4,5,13,20,37,8,10]', '2024-02-03 10:40:04', '2024-02-03 10:40:04'),
(31, 21, 5, '[1,9,21,31,39,5,10]', '2024-02-03 10:40:32', '2024-02-03 10:40:32'),
(32, 21, 3, '[7,10,16,20,22,4,10]', '2024-02-04 15:29:48', '2024-02-04 15:29:48'),
(33, 21, 3, '[1,18,23,24,26,3,12]', '2024-02-04 15:29:48', '2024-02-04 15:29:48'),
(34, 21, 3, '[16,19,22,26,34,4,10]', '2024-02-05 07:58:32', '2024-02-05 07:58:32'),
(35, 21, 3, '[12,23,29,39,49,4,12]', '2024-02-05 07:58:34', '2024-02-05 07:58:34'),
(36, 21, 3, '[1,3,5,48,49,5,7]', '2024-02-05 08:16:42', '2024-02-05 08:16:42'),
(37, 21, 3, '[11,24,34,36,43,6,10]', '2024-02-05 08:16:42', '2024-02-05 08:16:42'),
(38, 21, 5, '[14,23,26,27,45,8,10]', '2024-02-08 08:48:18', '2024-02-08 08:48:18');

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
(1, 3, 14, 1, '2024-01-30 19:05:07', '2024-01-30 19:05:07'),
(2, 3, 18, 1, '2024-01-30 19:39:32', '2024-01-30 19:39:32'),
(3, 3, 19, 1, '2024-02-02 15:04:32', '2024-02-02 15:04:32'),
(4, 4, 20, 0, '2024-02-02 16:07:00', '2024-02-02 16:07:00'),
(5, 5, 21, 1, '2024-02-03 10:07:41', '2024-02-03 10:07:41'),
(6, 4, 21, 0, '2024-02-03 10:15:31', '2024-02-03 10:15:31'),
(7, 3, 21, 1, '2024-02-03 10:20:01', '2024-02-03 10:20:01'),
(8, 2, 21, 0, '2024-02-03 10:37:56', '2024-02-03 10:37:56'),
(9, 5, 20, 1, '2024-02-04 07:57:18', '2024-02-04 07:57:18'),
(10, 3, 20, 1, '2024-02-04 08:54:09', '2024-02-04 08:54:09');

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
(8, 14, '[14,18,23,38,44,7,8]', '2024-01-30 19:09:56', '2024-01-30 19:09:56'),
(9, 18, '[2,12,28,45,48,5,9]', '2024-01-31 15:46:06', '2024-01-31 15:46:06'),
(10, 14, '[7,15,33,42,43,5,12]', '2024-01-31 16:36:02', '2024-01-31 16:36:02'),
(11, 19, '[3,17,34,37,39,5,12]', '2024-02-02 15:04:55', '2024-02-02 15:04:55'),
(36, 14, '[21,44,46,21,33,3,12]', '2024-02-06 16:58:20', '2024-02-06 16:58:20'),
(37, 20, '[15,16,21,27,28,3,10]', '2024-02-06 17:00:54', '2024-02-06 17:00:54'),
(38, 21, '[14,23,26,27,45,8,10]', '2024-02-08 08:48:18', '2024-02-08 08:48:18');

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
(13, 13, '2023-10-09', '123567890', '395008', 'In what city did you meet your partner?', 'jetain', 1, '2024-01-30 18:16:18', '2024-01-30 18:16:18'),
(14, 14, '2023-10-09', '123567890', '395008', 'In what city did you meet your partner?', 'jetain', 1, '2024-01-30 18:16:27', '2024-01-30 18:16:27'),
(15, 16, '1912-04-07', '0986564321', '395008', 'What was the last name of your favourite teacher?', 'jetain', 1, '2024-01-30 18:37:02', '2024-01-30 18:37:02'),
(16, 17, '1912-04-07', '2356785432', '395007', 'What is your town of birth?', 'jetain', 1, '2024-01-30 18:39:40', '2024-01-30 18:39:40'),
(17, 18, '2003-02-11', '9537534380', '395006', 'In what city did you meet your partner?', 'jetain', 1, '2024-01-30 19:39:21', '2024-01-30 19:39:21'),
(18, 19, '1913-05-10', '9157834381', '395008', 'What is your town of birth?', 'surat', 1, '2024-01-31 16:37:08', '2024-01-31 16:37:08'),
(19, 20, '1911-04-05', '9456789789', '395008', 'What is your mother\'s maiden name?', 'mother', 1, '2024-02-02 16:05:21', '2024-02-02 16:05:21'),
(20, 21, '1978-08-16', '07881596252', 'le56sp', 'What is your mother\'s maiden name?', 'patel', 1, '2024-02-03 09:30:46', '2024-02-03 09:30:46');

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
(13, 'Mr', 'hjff', 'vhyr', 'venis.webfoest@gmail.com', NULL, '$2y$12$qQz6ZFTMfVKH9rrKZuk1duyMViJXJLQ9vFSgRls7nSix8.n337oES', NULL, '2024-01-30 18:16:18', '2024-01-30 18:16:18'),
(14, 'Mr', 'hjff', 'vhyr', 'venis.webforest@gmail.com', NULL, '$2y$12$/CPbD2DPYGRtVIvlOeVkBeU9LumCJhZY4Lj6zsFwItztTl3i7ssZ.', NULL, '2024-01-30 18:16:27', '2024-01-30 18:16:27'),
(16, 'Mrs', 'hhrr', 'jut', 'venis.webforest1@gmail.com', NULL, '$2y$12$MCkp4c0ANKt2XrVP66Xj7.FhuYnGopAiBRtxPdTu6eBBcxNznAFZ.', NULL, '2024-01-30 18:37:02', '2024-01-30 18:37:02'),
(17, 'Mrs', 'ghf', 'vhyr', 'vennyvasani110@gmail.com', NULL, '$2y$12$ALqrBY3dRJTqzI9VAPXCOeyG.rX3ttSVOwU65Igg9R/x9RZ2sKSO6', NULL, '2024-01-30 18:39:40', '2024-01-30 18:39:40'),
(18, 'Ms', 'veni', 'vasani', 'venishvasani1113@gmail.com', NULL, '$2y$12$W4wqzg7WtugkSzBJhcNKSuDAS8iDeqSUiqvbF4xqXSKG/I0sDgjuW', NULL, '2024-01-30 19:39:21', '2024-01-30 19:39:21'),
(19, 'Miss', 'ven', 'vasani', 'ven@gmail.com', NULL, '$2y$12$AJG6CHhYSvFpdQ6z/9iJuecvw17ZvVB65Pet4GjpOEzMzfYl7HS.a', NULL, '2024-01-31 16:37:08', '2024-01-31 16:37:08'),
(20, 'Mr', 'ven', 'men', 'vennyvasani@gmail.com', NULL, '$2y$12$gp4U3kS8.TT9Xjgfr/ZYeOhhvgY0Oof4cxq.1u2grQjYIpPnUsAji', NULL, '2024-02-02 16:05:21', '2024-02-02 16:05:21'),
(21, 'Mr', 'jetain', 'mahendra', 'jetain@hotmail.com', NULL, '$2y$12$qZIU4xsmOS3Ky4aVNHJBZehJyvCKAd7YJIWD3v/D6JPJAdhFJjhDC', NULL, '2024-02-03 09:30:46', '2024-02-03 09:30:46');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_draw_numbers`
--
ALTER TABLE `tbl_draw_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_group_members`
--
ALTER TABLE `tbl_group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_saved_numbers`
--
ALTER TABLE `tbl_saved_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user_request`
--
ALTER TABLE `tbl_user_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
