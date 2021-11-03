-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2021 at 03:28 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisuharsih`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `id_user`, `nip`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, '8795611541', '082349179616', 'Batulo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru_pns_absens`
--

CREATE TABLE `guru_pns_absens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_guru_pns` bigint(20) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `jam_kerja` time DEFAULT NULL,
  `lokasi_absen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_pns_absens`
--

INSERT INTO `guru_pns_absens` (`id`, `id_guru_pns`, `tgl`, `jam_masuk`, `jam_keluar`, `jam_kerja`, `lokasi_absen`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-09-22', '05:01:20', '05:01:27', '00:00:07', NULL, '2021-09-21 13:01:20', '2021-09-21 13:01:27'),
(2, 1, '2021-09-23', '16:58:17', '16:58:52', '00:00:35', NULL, '2021-09-23 00:58:17', '2021-09-23 00:58:52'),
(3, 2, '2021-09-23', '17:17:17', '17:17:49', '00:00:32', NULL, '2021-09-23 01:17:17', '2021-09-23 01:17:49'),
(4, 2, '2021-09-24', '13:16:21', '14:43:49', '01:27:28', NULL, '2021-09-23 21:16:21', '2021-09-23 22:43:49'),
(5, 1, '2021-09-24', '16:03:02', '16:03:27', '00:00:25', NULL, '2021-09-24 00:03:02', '2021-09-24 00:03:27'),
(6, 2, '2021-09-28', '11:13:29', '11:19:50', '00:06:21', NULL, '2021-09-27 19:13:29', '2021-09-27 19:19:50'),
(7, 1, '2021-10-02', '13:45:01', '13:45:43', '00:00:42', NULL, '2021-10-01 21:45:01', '2021-10-01 21:45:43'),
(8, 2, '2021-10-02', '18:02:52', '18:09:17', '00:06:25', NULL, '2021-10-02 02:02:52', '2021-10-02 02:09:17'),
(9, 1, '2021-10-16', '16:03:48', '16:04:08', '00:00:20', NULL, '2021-10-16 00:03:48', '2021-10-16 00:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `guru_ptt_absens`
--

CREATE TABLE `guru_ptt_absens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_guru_ptt` bigint(20) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `jam_kerja` time DEFAULT NULL,
  `lokasi_absen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_ptt_absens`
--

INSERT INTO `guru_ptt_absens` (`id`, `id_guru_ptt`, `tgl`, `jam_masuk`, `jam_keluar`, `jam_kerja`, `lokasi_absen`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-09-22', '05:39:31', '05:39:34', '00:00:03', NULL, '2021-09-21 13:39:31', '2021-09-21 13:39:34'),
(2, 1, '2021-09-23', '17:15:03', '17:20:10', '00:05:07', NULL, '2021-09-23 01:15:03', '2021-09-23 01:20:10'),
(3, 1, '2021-09-24', '14:22:48', '14:46:22', '00:23:34', NULL, '2021-09-23 22:22:48', '2021-09-23 22:46:22'),
(4, 2, '2021-09-24', '19:58:26', '19:58:42', '00:00:16', NULL, '2021-09-24 03:58:26', '2021-09-24 03:58:42'),
(5, 1, '2021-10-02', '17:13:15', '17:13:21', '00:00:06', NULL, '2021-10-02 01:13:15', '2021-10-02 01:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `guru_p_n_s`
--

CREATE TABLE `guru_p_n_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_p_n_s`
--

INSERT INTO `guru_p_n_s` (`id`, `id_user`, `nip`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 2, '87875456', '085623231147', 'Batauga', '2021-09-21 12:56:53', '2021-09-21 12:56:53'),
(2, 4, '352132156456', '085623231147', 'Pimpi', '2021-09-23 01:16:51', '2021-09-23 01:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `guru_p_t_t_s`
--

CREATE TABLE `guru_p_t_t_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_p_t_t_s`
--

INSERT INTO `guru_p_t_t_s` (`id`, `id_user`, `nip`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 3, '5564654', '085623231147', 'Lorong Perintis', '2021-09-21 13:37:35', '2021-09-21 13:37:35'),
(2, 5, '2165789561', '085623231147', 'Perintis', '2021-09-23 22:33:13', '2021-09-23 22:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_sekolahs`
--

CREATE TABLE `kepala_sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `koordinats`
--

CREATE TABLE `koordinats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `koordinats`
--

INSERT INTO `koordinats` (`id`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, '-3.7283037', '119.5687646', '2021-09-27 18:52:44', '2021-10-16 00:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2019_08_19_000000_create_failed_jobs_table', 1),
(44, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(45, '2021_09_17_093456_create_admins_table', 1),
(46, '2021_09_17_093615_create_kepala_sekolahs_table', 1),
(47, '2021_09_17_093633_create_guru_p_n_s_table', 1),
(48, '2021_09_17_093649_create_guru_p_t_t_s_table', 1),
(49, '2021_09_17_093726_guru_pns_absens', 1),
(50, '2021_09_17_093742_guru_ptt_absens', 1),
(51, '2021_09_28_024650_create_koordinats_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','kepsek','guru_pns','guru_ptt') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@gmail.com', NULL, 'admin123', NULL, NULL, NULL),
(2, 'Suharsih', 'guru_pns', 'suharsih01@gmail.com', NULL, 'suharsih123', NULL, '2021-09-21 12:56:53', '2021-09-23 03:00:02'),
(3, 'Jeklin', 'guru_ptt', 'jeklin@gmail.com', NULL, 'jeklin123', NULL, '2021-09-21 13:37:35', '2021-09-21 13:37:35'),
(4, 'Asrila Syura', 'guru_pns', 'mush@gmail.com', NULL, '12345678', NULL, '2021-09-23 01:16:51', '2021-09-23 01:16:51'),
(5, 'Ansaruddin', 'guru_ptt', 'calu@gmail.com', NULL, 'calu12345', NULL, '2021-09-23 22:33:13', '2021-09-23 22:33:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_nip_unique` (`nip`),
  ADD KEY `admins_id_user_foreign` (`id_user`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru_pns_absens`
--
ALTER TABLE `guru_pns_absens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_pns_absens_id_guru_pns_foreign` (`id_guru_pns`);

--
-- Indexes for table `guru_ptt_absens`
--
ALTER TABLE `guru_ptt_absens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_ptt_absens_id_guru_ptt_foreign` (`id_guru_ptt`);

--
-- Indexes for table `guru_p_n_s`
--
ALTER TABLE `guru_p_n_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guru_p_n_s_nip_unique` (`nip`),
  ADD KEY `guru_p_n_s_id_user_foreign` (`id_user`);

--
-- Indexes for table `guru_p_t_t_s`
--
ALTER TABLE `guru_p_t_t_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guru_p_t_t_s_nip_unique` (`nip`),
  ADD KEY `guru_p_t_t_s_id_user_foreign` (`id_user`);

--
-- Indexes for table `kepala_sekolahs`
--
ALTER TABLE `kepala_sekolahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kepala_sekolahs_nip_unique` (`nip`),
  ADD KEY `kepala_sekolahs_id_user_foreign` (`id_user`);

--
-- Indexes for table `koordinats`
--
ALTER TABLE `koordinats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru_pns_absens`
--
ALTER TABLE `guru_pns_absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guru_ptt_absens`
--
ALTER TABLE `guru_ptt_absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guru_p_n_s`
--
ALTER TABLE `guru_p_n_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guru_p_t_t_s`
--
ALTER TABLE `guru_p_t_t_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kepala_sekolahs`
--
ALTER TABLE `kepala_sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `koordinats`
--
ALTER TABLE `koordinats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru_pns_absens`
--
ALTER TABLE `guru_pns_absens`
  ADD CONSTRAINT `guru_pns_absens_id_guru_pns_foreign` FOREIGN KEY (`id_guru_pns`) REFERENCES `guru_p_n_s` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru_ptt_absens`
--
ALTER TABLE `guru_ptt_absens`
  ADD CONSTRAINT `guru_ptt_absens_id_guru_ptt_foreign` FOREIGN KEY (`id_guru_ptt`) REFERENCES `guru_p_t_t_s` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru_p_n_s`
--
ALTER TABLE `guru_p_n_s`
  ADD CONSTRAINT `guru_p_n_s_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru_p_t_t_s`
--
ALTER TABLE `guru_p_t_t_s`
  ADD CONSTRAINT `guru_p_t_t_s_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kepala_sekolahs`
--
ALTER TABLE `kepala_sekolahs`
  ADD CONSTRAINT `kepala_sekolahs_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
