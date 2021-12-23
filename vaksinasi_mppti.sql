-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 04:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaksinasi_mppti`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_vaksin`
--

CREATE TABLE `detail_vaksin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_vaksin` bigint(20) UNSIGNED NOT NULL,
  `sumber_vaksin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_vaksin`
--

INSERT INTO `detail_vaksin` (`id`, `id_vaksin`, `sumber_vaksin`, `jumlah`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kemenkes', 10, '2021-10-29', '2021-11-01 01:41:40', '2021-11-01 01:41:40'),
(2, 2, 'Kemenkes', 10, '2021-10-28', '2021-11-01 01:41:57', '2021-11-01 01:41:57'),
(3, 5, 'RS. M. Jamil', 10, '2021-10-31', '2021-11-01 01:42:11', '2021-11-01 01:42:11'),
(4, 6, 'RS. M. Jamil', 10, '2021-11-01', '2021-11-01 01:42:22', '2021-11-01 01:42:22'),
(8, 1, 'RS. M. Jamil', 3, '2021-11-11', '2021-11-05 08:29:11', '2021-11-05 08:29:11'),
(9, 1, 'Kemenkes', 3, '2021-11-03', '2021-11-05 08:34:03', '2021-11-05 08:34:03'),
(10, 1, 'Kemenkes', 10, '2021-11-03', '2021-11-05 08:34:25', '2021-11-05 08:34:25'),
(11, 1, 'Kemenkes', 30, '2021-11-03', '2021-11-08 00:02:56', '2021-11-08 00:02:56');

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
(45, '2021_09_30_004211_create_pasien_table', 1),
(46, '2021_09_30_004222_create_vaksin_table', 1),
(47, '2021_09_30_004235_create_detail_vaksin_table', 1),
(48, '2021_09_30_035258_create_vaksinasi_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `nik` bigint(20) NOT NULL,
  `nama_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `riwayat_penyakit` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`nik`, `nama_pasien`, `tgl_lahir`, `jenis_kelamin`, `no_hp`, `email`, `alamat`, `riwayat_penyakit`, `created_at`, `updated_at`) VALUES
(1942991721021921, 'Mila Gustia', '2001-05-25', 'P', '082131231231', 'milagustia@gmail.com', 'alamat mila', NULL, '2021-12-05 17:33:03', '2021-12-05 17:33:03'),
(3243243245443252, 'Dhiya Nabila Denta', '2000-12-03', 'P', '082131231231', 'didi@gmail.com', 'alamat didi', NULL, '2021-11-01 00:48:05', '2021-11-01 03:10:13'),
(4234341299213123, 'Untung Jamari', '2000-02-01', 'L', '081231231231', 'ari@gmail.com', 'alamat ari', NULL, '2021-12-05 20:59:33', '2021-12-05 21:09:15');

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
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kelompok 2', 'admin', 'kelompok2mppti@gmail.com', NULL, '$2y$10$La93W30rx/21cUfoPrNT1uRav85Qblw4YZBhB.EAbqfqFkWqvSk4G', NULL, '2021-10-31 23:42:11', '2021-10-31 23:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `vaksin`
--

CREATE TABLE `vaksin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_vaksin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaksin`
--

INSERT INTO `vaksin` (`id`, `nama_vaksin`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Sinovac', 28, '2021-11-01 01:20:54', '2021-12-05 17:53:06'),
(2, 'Moderna', 8, '2021-11-01 01:21:00', '2021-12-05 17:50:00'),
(5, 'Pfizer', 9, '2021-11-01 01:41:19', '2021-12-05 21:15:11'),
(6, 'Astrazeneca', 10, '2021-11-01 01:41:25', '2021-11-01 01:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `vaksinasi`
--

CREATE TABLE `vaksinasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` bigint(20) NOT NULL,
  `id_vaksin` bigint(20) UNSIGNED DEFAULT NULL,
  `tgl_vaksin` date NOT NULL,
  `vaksin_ke` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaksinasi`
--

INSERT INTO `vaksinasi` (`id`, `nik`, `id_vaksin`, `tgl_vaksin`, `vaksin_ke`, `status`, `created_at`, `updated_at`) VALUES
(1, 3243243245443252, 2, '2021-11-06', 1, 2, '2021-11-01 00:48:06', '2021-11-01 01:43:41'),
(6, 3243243245443252, 1, '2021-11-10', 2, 2, '2021-11-05 09:10:57', '2021-11-05 09:30:16'),
(7, 1942991721021921, 1, '2021-12-09', 2, 2, '2021-12-05 17:33:03', '2021-12-05 17:53:06'),
(9, 4234341299213123, 5, '2021-12-10', 1, 2, '2021-12-05 20:59:33', '2021-12-05 21:15:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_vaksin`
--
ALTER TABLE `detail_vaksin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_vaksin_id_vaksin_foreign` (`id_vaksin`);

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
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`nik`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vaksin`
--
ALTER TABLE `vaksin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaksinasi`
--
ALTER TABLE `vaksinasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaksinasi_nik_foreign` (`nik`),
  ADD KEY `vaksinasi_id_vaksin_foreign` (`id_vaksin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_vaksin`
--
ALTER TABLE `detail_vaksin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaksin`
--
ALTER TABLE `vaksin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vaksinasi`
--
ALTER TABLE `vaksinasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_vaksin`
--
ALTER TABLE `detail_vaksin`
  ADD CONSTRAINT `detail_vaksin_id_vaksin_foreign` FOREIGN KEY (`id_vaksin`) REFERENCES `vaksin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaksinasi`
--
ALTER TABLE `vaksinasi`
  ADD CONSTRAINT `vaksinasi_id_vaksin_foreign` FOREIGN KEY (`id_vaksin`) REFERENCES `vaksin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaksinasi_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `pasien` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
