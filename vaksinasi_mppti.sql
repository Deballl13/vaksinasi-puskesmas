-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2021 at 09:55 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
(1, 1, 'Kemenkes', 10, '2021-10-14', '2021-10-30 20:37:37', '2021-10-30 20:37:37'),
(2, 2, 'RS. M. Jamil', 25, '2021-10-16', '2021-10-30 20:38:05', '2021-10-30 20:38:05'),
(3, 3, 'Kemenkas', 10, '2021-10-30', '2021-10-30 20:43:35', '2021-10-30 20:43:35');

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
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2014_10_12_100000_create_password_resets_table', 1),
(35, '2019_08_19_000000_create_failed_jobs_table', 1),
(36, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(37, '2021_09_30_004211_create_pasien_table', 1),
(38, '2021_09_30_004222_create_vaksin_table', 1),
(39, '2021_09_30_004235_create_detail_vaksin_table', 1),
(40, '2021_09_30_035258_create_vaksinasi_table', 1);

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
(4239840214987384, 'Immalatunil Khaira Affi', '2001-07-10', 'P', '0812312312312', 'imma@gmail.com', 'alamat imma', NULL, '2021-10-30 20:21:09', '2021-10-30 20:21:09'),
(7815237813877636, 'Dhiya Nabila Denta', '2001-07-08', 'P', '08119001012', 'didi@gmail.com', 'alamat didi', NULL, '2021-10-30 20:34:44', '2021-10-31 01:36:07'),
(7823748532174032, 'Ade Iqbal', '2001-07-12', 'L', '081289217121', 'iqbal@gmail.com', 'alamat iqbal', NULL, '2021-10-30 20:27:06', '2021-10-30 22:38:48'),
(9079078209174890, 'Untung Jamari', '2000-03-20', 'L', '0821312312312', 'ari@gmail.com', 'alamat ari', NULL, '2021-10-30 20:23:55', '2021-10-30 20:23:55'),
(9873249823798127, 'Khairul Zikria Burhan', '2001-10-01', 'L', '081291280001', 'zikri@gmail.com', 'alamat zikri', 'flu dan batuk', '2021-10-30 20:30:58', '2021-10-30 20:30:58');

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
(1, 'Kelompok 2', 'admin', 'kelompok2mppti@gmail.com', NULL, '$2y$10$4eOQ0ROjNDkXZjrP0/OYguWfTgH2152UGHYUJhsX2kcHM/GsN9vEu', NULL, '2021-10-30 20:19:42', '2021-10-30 20:19:42');

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
(1, 'Astrazeneca', 10, '2021-10-30 20:37:01', '2021-10-30 20:37:37'),
(2, 'Sinovac', 23, '2021-10-30 20:37:09', '2021-10-31 01:33:49'),
(3, 'Moderna', 8, '2021-10-30 20:37:15', '2021-10-31 01:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `vaksinasi`
--

CREATE TABLE `vaksinasi` (
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

INSERT INTO `vaksinasi` (`nik`, `id_vaksin`, `tgl_vaksin`, `vaksin_ke`, `status`, `created_at`, `updated_at`) VALUES
(4239840214987384, NULL, '2021-11-02', 1, 2, '2021-10-30 20:21:09', '2021-10-31 01:18:22'),
(9873249823798127, NULL, '2021-11-02', 2, 2, '2021-10-30 20:30:58', '2021-10-31 01:33:35'),
(7815237813877636, NULL, '2021-11-27', 2, 2, '2021-10-30 20:34:44', '2021-10-31 01:34:11'),
(7823748532174032, NULL, '2021-11-07', 1, 2, '2021-10-30 22:54:24', '2021-10-31 01:34:00'),
(9079078209174890, NULL, '2021-11-06', 2, 2, '2021-10-30 22:56:15', '2021-10-31 01:33:49');

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
  ADD KEY `vaksinasi_nik_foreign` (`nik`),
  ADD KEY `vaksinasi_id_vaksin_foreign` (`id_vaksin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_vaksin`
--
ALTER TABLE `detail_vaksin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
