-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 02:46 PM
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
('11e106752469b5004fd29a26c038cb5218ff335e71d76ec0bb5c828d251279d86821be163f54b7ec', 2, 7, 'Circle Lotto Login', '[]', 1, '2024-03-13 12:12:38', '2024-03-13 12:14:07', '2025-03-13 17:42:38'),
('1318b425a79dac8992a62dcbbd4041b4e1fb05b92038b1cdf70c6e2c61781a03913fe00ee8e68407', 4, 7, 'Circle Lotto Login', '[]', 0, '2024-03-16 04:43:24', '2024-03-16 04:43:24', '2025-03-16 10:13:24'),
('1c05281e7f5661a9b38b14e45888785307f70c5997515c5cfaf0a4548ea452fbfb92d368611ec64e', 11, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:33:54', '2023-11-25 07:33:54', '2024-11-25 13:03:54'),
('1e80e038f208271ef2a4a220bdaff07886a9afdc40a8c2bce65e4be9c3982aa0691b7d7e18937a0e', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-10 07:51:36', '2024-03-10 07:51:36', '2025-03-10 13:21:36'),
('322f19ae234cf567d785daa9585c66e74fe45e8a3956406cb36c1a1cfbc680db2ebe76fec5fa1bb7', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-02-26 13:33:07', '2024-02-26 13:33:07', '2025-02-26 19:03:07'),
('33683e8b9a17fef7da424c10d516c0d53e57890b5a4cb2026eedf9f719ba81ad88300fea1d288942', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-13 12:22:48', '2024-03-13 12:22:48', '2025-03-13 17:52:48'),
('33b866c69451b82d52e7144ec598726cee304283204b7a8150e5e8ef34265dda37d1ed97a2ae2c8d', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-13 12:24:51', '2024-03-13 12:24:51', '2025-03-13 17:54:51'),
('3564968f5c59570dce474adbf9430ddbfcd50ce8b6a2860393ca40cdc1ee2d3f8e058468d8ab9e54', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:49:55', '2023-11-01 13:49:55', '2024-11-01 19:19:55'),
('39ddf7dba9e26f2f3d06afb5179498bd95a558b7734ec2a1a35f7d877dba27f9a675d50c7a78c30e', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-02-09 12:33:41', '2024-02-09 12:33:41', '2025-02-09 18:03:41'),
('3b25cb0bc0f49e4856d50702253f2e4fd29ae923cd6eee247875704cfba55d328771221ea7d27daf', 2, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:13:40', '2023-11-22 14:13:40', '2024-11-22 19:43:40'),
('45363d823723406a16e46b7f13bed812dc5d5b2aaf97707fd62f23f9b1a0885e6f1d1d9697bbf607', 1, 7, 'Circle Lotto Login', '[]', 1, '2024-01-16 10:28:43', '2024-01-29 12:27:52', '2025-01-16 15:58:43'),
('4721eaa638f91a928b698b11191aff0a243d45b12511664644b7d85c4fe918538baccda0e6da311a', 8, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:06:47', '2023-11-25 07:06:47', '2024-11-25 12:36:47'),
('52ceb749ee6b6aea9e33770dc5684cd6540a0263f973bc3b9f228bde0eb73c81549e35ebedda8c12', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-13 12:09:32', '2024-03-13 12:09:32', '2025-03-13 17:39:32'),
('5357f18bd9670459db6e4171c6c9c6bfb645aa47978b0bd7296c75df109f6f3b7a3340d65c691793', 15, 7, 'Circle Lotto Login', '[]', 0, '2024-03-11 11:14:45', '2024-03-11 11:14:45', '2025-03-11 16:44:45'),
('56373f435ea7b9933e8a6497df42ccc753241c9da04a5f75afc8fa0687c2e0e4b965dbb267cad532', 6, 7, 'Circle Lotto Login', '[]', 1, '2023-11-02 12:56:37', '2023-11-02 13:00:22', '2024-11-02 18:26:37'),
('580b06664c5a04045a828652afbcc77f5a2a87731c16d63e92bf432bd1e62a6648096cbf173525bc', 14, 7, 'Circle Lotto Login', '[]', 0, '2024-03-11 11:04:06', '2024-03-11 11:04:07', '2025-03-11 16:34:06'),
('6a1221f5a066abafebf06bf8275ed3ebe723430a41ed5d10393acb4a117f3690a5a1587fd5f9e068', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-13 12:25:39', '2024-03-13 12:25:39', '2025-03-13 17:55:39'),
('6a12e2b5094db046e6ce606cc624895355bf718ed3f071b13f4a348f06c8b575c1598aa1d8eccc43', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-13 12:27:18', '2024-03-13 12:27:18', '2025-03-13 17:57:18'),
('720528379e2ff9a9980ba22f56dd5013475a93650f40d402bc3e0c5a762a136d2fb8ac5262de71d6', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-17 09:13:42', '2023-11-17 09:13:42', '2024-11-17 14:43:42'),
('7412bef59475d4700b61f3019fa6a2b317dfe77f7e45f22a3e22b361bd0ea244bd9bbecb6931f211', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:33:46', '2023-11-03 14:33:46', '2024-11-03 20:03:46'),
('747ea29d96705dbc6608390ba37e3166f61f43a7355b641482a395124bd31645e08c7d78eb523186', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-16 04:46:44', '2024-03-16 04:46:44', '2025-03-16 10:16:44'),
('794e4e0c938256685ea5756cd7417db7882016fee5fca878be61c2a2bacbb325a27b8a8426652fbb', 8, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:26:48', '2023-11-03 14:26:48', '2024-11-03 19:56:48'),
('7b685c3a44b8828583d3cce2e53b9a57ca29576220052df3b6443e4a0a40f0dd6a19a0aaa0a90388', 2, 7, 'Circle Lotto Login', '[]', 1, '2024-04-06 13:54:41', '2024-04-07 03:52:21', '2025-04-06 19:24:41'),
('7cd423e40b31432ffb4e501f25be2f1c900e5d9ad9cb70d8533a93b5c2b281a9e7108e24f63e8b4f', 5, 7, 'Circle Lotto Login', '[]', 0, '2024-03-23 02:06:09', '2024-03-23 02:06:10', '2025-03-23 07:36:09'),
('7d2e2ac9aee347beaae444788c12f23599a3a4cc454f7f24c7b7dd66cca6d276354babbd54b96d1c', 4, 7, 'Circle Lotto Login', '[]', 0, '2024-03-16 04:59:07', '2024-03-16 04:59:07', '2025-03-16 10:29:07'),
('81339d0fa0d7ac0d41a51d5c34bebe5e9e0eee6ced20515092df013e04d3c02b64f3923ce4136e06', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-15 01:44:18', '2023-11-15 01:44:18', '2024-11-15 07:14:18'),
('81b91f4a6ca8441888377f673d26a0185bb1bf5adac75a2a0de607f679494a948d4b6c3e2c15c127', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:31:46', '2023-11-03 14:31:46', '2024-11-03 20:01:46'),
('8b326909ca521cfdf4f13b7edf78d366175588798595df922e6002499f2b75608741d06ac29926e4', 4, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:40:49', '2023-11-22 14:40:49', '2024-11-22 20:10:49'),
('8c95a9a88537d552cc9669a96effdbaffd085fe7cfb345cbe7b8e0b6e84f2b32e272b0e4a05df870', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-13 12:27:26', '2024-03-13 12:27:26', '2025-03-13 17:57:26'),
('952b28884b3bb147f1f5380cd96cd69248d4e57cee110023f35a322e947dca9ab795bc3895c3b91e', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-02 12:23:31', '2023-11-02 12:23:31', '2024-11-02 17:53:31'),
('97bb6279a7e253ff9a3de51feec12d16f8a63e41ff7319ecc3297d09fbe0381cd3a65ad460ab4e00', 10, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:12:53', '2023-11-25 07:12:53', '2024-11-25 12:42:53'),
('a02ada6dbde608cbfffbc4a17835edb87384b2de4601f0d3a3927f799ad7512d083c93a1dbdcf13a', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:50:23', '2023-11-01 13:50:23', '2024-11-01 19:20:23'),
('a7e9793c3ece73e5a6889da6042af3305c1a8d88ef307361f053bcd55ab546d4356f5da83d6882b9', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-13 12:11:46', '2024-03-13 12:11:46', '2025-03-13 17:41:46'),
('a85b3eca8c3b35878d8d27c1918a032aa99fddabb387e25d0ec38d08535f56afb5714ef3ac701185', 1, 7, 'Circle Lotto Login', '[]', 0, '2023-11-02 11:43:09', '2023-11-02 11:43:09', '2024-11-02 17:13:09'),
('ac1731f3439510ac1e2c1d67ff28b97bda6c80b08d9884bffd6d936a7a85db0fcddfd265e50b6ab2', 2, 7, 'Circle Lotto Login', '[]', 0, '2024-04-07 04:06:41', '2024-04-07 04:06:41', '2025-04-07 09:36:41'),
('ae9d240cdf799b2c7b5ed7b6698b779643275edb1e5ef363b7efccd8c8c85d565ba90661f8a66aaa', 6, 7, 'Circle Lotto Login', '[]', 0, '2024-03-23 02:07:33', '2024-03-23 02:07:33', '2025-03-23 07:37:33'),
('bd4e184565ea2ce2a8924c8546068deeead72a53ad21d253f756dd773fba2456847cd4096dd4cc8c', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-13 12:26:02', '2024-03-13 12:26:02', '2025-03-13 17:56:02'),
('c06fb06127182269c89119a1f25bc6804c34d88aa5541305e6c10f841b790bfaa7e88bcd60817c30', 5, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:41:46', '2023-11-22 14:41:46', '2024-11-22 20:11:46'),
('c0f89d264c7b75ca37025ca2d834cb5ca25eb7865a3bd379b495a301038ba4e8f0126cca84db4246', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-13 12:23:59', '2024-03-13 12:23:59', '2025-03-13 17:53:59'),
('c496b6ec35c9772fa9cfa44a60cbe0c17ac04b8f0aa5f605e220820f44166f5e657c64fc13784478', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:25:24', '2023-11-03 14:25:25', '2024-11-03 19:55:24'),
('c6a57aa3b70ccb27947d3a0b653da095ec8874afec8f0124dedf73c4d8c2e11d0929f47e8c3c8269', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 12:22:29', '2023-11-03 12:22:29', '2024-11-03 17:52:29'),
('c738cc9e9a15cf133c29b4ddf6bf5f5733ccafe3d7dbd023787e1714d484f15fda5eda2d0c6039d3', 9, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:07:48', '2023-11-25 07:07:48', '2024-11-25 12:37:48'),
('c87d0ca16f45effedd9f3f7dbbc6f292c39f9388cf0224d7c21506d1b9f46a2a88d859f48a3fd644', 6, 7, 'Circle Lotto Login', '[]', 0, '2023-11-22 14:42:02', '2023-11-22 14:42:02', '2024-11-22 20:12:02'),
('ca8aefda37d8b9ae47a47936b8c0ad23e74c32c8852556b89ebed4fc51c0c1dc1ca21a28a0e73943', 10, 7, 'Circle Lotto Login', '[]', 0, '2023-11-03 14:32:22', '2023-11-03 14:32:22', '2024-11-03 20:02:22'),
('d636e7e545f69216be4e76c3aa55e88a8f2084a13c3d993858112f8ae19b83fed1b4ddd265d5b1ef', 6, 7, 'Circle Lotto Login', '[]', 0, '2024-03-23 02:10:50', '2024-03-23 02:10:50', '2025-03-23 07:40:50'),
('da1ed886ed8a58baa0713957bf7f363522d93d5d6a95eb49a3338c55db41c0e16160aa741d4977d3', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-16 04:50:37', '2024-03-16 04:50:37', '2025-03-16 10:20:37'),
('e2d699b0e827171b47eb75d61fcd864567d12764c43b80811931b9879d15aacd498136bd88ffe5c3', 1, 7, 'Circle Lotto Login', '[]', 1, '2024-04-06 13:53:18', '2024-04-06 13:53:58', '2025-04-06 19:23:18'),
('e4ec46934b4c4296c27b16872e3953d1c998a80effe2f0a00ef3691e98d8a54579ff15ac79b92e46', 3, 7, 'Circle Lotto Login', '[]', 0, '2024-03-16 04:38:45', '2024-03-16 04:38:46', '2025-03-16 10:08:45'),
('e55b625ff2a67d151f87fbfd12c99e6062a992a885da5a177ac0476b8cebe3acd6ea401a8bee43d4', 7, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 07:05:49', '2023-11-25 07:05:49', '2024-11-25 12:35:49'),
('e6fee6b773877fd57cc6f64d7d142bb789f6458b963f0636749d7cbacbe2a2e3a79de6bfa0041dc1', 2, 7, 'Circle Lotto Login', '[]', 0, '2024-03-13 12:10:57', '2024-03-13 12:10:57', '2025-03-13 17:40:57'),
('e7e60de8a0efc9526c4608c7b55565a052955041db344ed94dbee572eb6acd2547cb975e0215aa7f', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-13 10:37:27', '2024-03-13 10:37:28', '2025-03-13 16:07:27'),
('e9179e2538105e8caa8c0b929bdcba2fd82f19f8d4542eb1cb47ee3cc47ca6238bf70eb9e3974b7b', 5, 7, 'Circle Lotto Login', '[]', 0, '2024-03-31 05:00:51', '2024-03-31 05:00:51', '2025-03-31 10:30:51'),
('ebe5d0d2b649e67f1572ad3bbbf0665f92d75d01a0c3ef00b74b5d2507a5946a35c34a8af76f6f72', 8, 7, 'Circle Lotto Login', '[]', 0, '2023-11-01 13:50:05', '2023-11-01 13:50:05', '2024-11-01 19:20:05'),
('f312fa692062d62dac4ff35af0f340c982713aff461db7a08ee416569f0fb7276ccaa48bd6a129a5', 1, 7, 'Circle Lotto Login', '[]', 1, '2024-04-07 03:54:07', '2024-04-07 04:06:18', '2025-04-07 09:24:07'),
('fa267df09a73001f5259c21f5bd50681959bec8004fd5fe8724e6126cd9a25a413362003a27e8569', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-16 04:44:18', '2024-03-16 04:44:18', '2025-03-16 10:14:18'),
('fa27f91570c1be2a0458878c67017a173099d7a6de79d5eae561404661c5f86d935eb822c5d49792', 12, 7, 'Circle Lotto Login', '[]', 0, '2023-11-25 08:09:37', '2023-11-25 08:09:37', '2024-11-25 13:39:37'),
('fe6b14006b9999bb3ab4611794859b7c02102298a3b8985c07cc5dbe324e9c2405a968522b5d23aa', 1, 7, 'Circle Lotto Login', '[]', 0, '2024-03-13 12:26:25', '2024-03-13 12:26:26', '2025-03-13 17:56:25');

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
(1, 1, 'John Doe\'s Circle', 2, 5000, '2024-04-07 09:26:54', '2024-04-06 19:23:43', '2024-04-07 09:26:54'),
(2, 2, 'Example Circle', 2, 5000, NULL, '2024-04-07 12:33:39', '2024-04-07 12:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_draw_numbers`
--

CREATE TABLE `tbl_draw_numbers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `circle_id` int(11) NOT NULL,
  `numbers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`numbers`)),
  `winner` tinyint(4) DEFAULT 0,
  `winning_number_id` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_draw_numbers`
--

INSERT INTO `tbl_draw_numbers` (`id`, `user_id`, `circle_id`, `numbers`, `winner`, `winning_number_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '[41,27,42,46,13,3,10]', 1, 1, '2024-04-07 09:26:54', '2024-04-06 19:27:12', '2024-04-07 09:27:00'),
(2, 1, 1, '[22,34,33,5,39,12,11]', 0, 1, '2024-04-07 09:26:54', '2024-04-07 09:24:51', '2024-04-07 09:27:00');

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
(1, 1, 1, 1, '2024-04-07 09:26:54', '2024-04-06 19:23:43', '2024-04-07 09:26:54'),
(2, 1, 2, 1, '2024-04-07 09:26:54', '2024-04-06 19:26:44', '2024-04-07 09:26:54'),
(3, 2, 2, 1, NULL, '2024-04-07 12:33:39', '2024-04-07 12:33:39');

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
(1, 0, 2, 'You Have Won', 'You\'re the Winner of John Doe\'s Circle', NULL, NULL, '2024-04-07 03:56:55', '2024-04-07 03:56:55'),
(2, 2, 1, 'Public Group Added', 'Example Circle is Added', '{\"status\":500,\"message\":\"The registration token is not a valid FCM registration token\"}', NULL, '2024-04-07 07:03:39', '2024-04-07 07:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `expiry_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 2, '[41,27,42,46,13,3,10]', NULL, '2024-04-06 19:27:12', '2024-04-06 19:27:12'),
(2, 1, '[22,34,33,5,39,12,11]', NULL, '2024-04-07 09:24:51', '2024-04-07 09:24:51');

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
(1, 1, '2023-10-09', '7046377115', '123456', 'What is my Grand Grand Father\'s Name', 'Hirjibhai', 1, NULL, '2024-04-06 19:22:35', '2024-04-06 19:22:35'),
(2, 2, '2023-10-09', '7046377115', '123456', 'What is my Grand Grand Father\'s Name', 'Hirjibhai', 1, NULL, '2024-04-06 19:24:17', '2024-04-06 19:24:17');

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
(1, 1, 2, '[41,27,42,46,13,3,10]', 'Fully', NULL, '2024-04-07 09:27:00', '2024-04-07 09:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_winning_number`
--

CREATE TABLE `tbl_winning_number` (
  `id` int(11) NOT NULL,
  `winning_number` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`winning_number`)),
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_winning_number`
--

INSERT INTO `tbl_winning_number` (`id`, `winning_number`, `created_at`, `updated_at`) VALUES
(1, '[\"41\",\"27\",\"42\",\"46\",\"13\",\"3\",\"10\"]', '2024-04-07 09:26:54', '2024-04-07 09:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `title`, `first_name`, `last_name`, `username`, `email`, `email_verified_at`, `password`, `firebase_token`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mr', 'John', 'Doe', 'vinitrathod', 'vinitrathod100901@gmail.com', NULL, '$2y$12$7KeDEIa0OlaSseCmXpWfzevKV87Vi114SQWcXYDgr134ofpy5tWgK', 'safsafasf', NULL, NULL, '2024-04-06 13:52:35', '2024-04-07 03:52:28'),
(2, 'Mr', 'Vinit', 'Rathod', 'vinitrathod123', 'vinitrathod123@gmail.com', NULL, '$2y$12$FnHgJN9naJch/B0bKRsnrO8c/XIo.PgtNAOJn.bX3aNB9KjSQPb1y', 'safsafasf', NULL, NULL, '2024-04-06 13:54:17', '2024-04-07 04:06:24');

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
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
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
-- Indexes for table `tbl_winning_number`
--
ALTER TABLE `tbl_winning_number`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_draw_numbers`
--
ALTER TABLE `tbl_draw_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_group_members`
--
ALTER TABLE `tbl_group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_saved_numbers`
--
ALTER TABLE `tbl_saved_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_request`
--
ALTER TABLE `tbl_user_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_winners`
--
ALTER TABLE `tbl_winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_winning_number`
--
ALTER TABLE `tbl_winning_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
