-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2019 at 11:34 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super@admin.com', '$2y$04$sJbJqpv7TH5RrgTPq0raburfQ6g1XOQtgd59Dgz.VCGlr8f5gUvm6', 'nFZS8u3lixr59jyGmQ6E46TXZQ77dPIM2rRnvGX71TjZyosJrn655tyX77co', '2019-05-22 16:28:55', '2019-05-22 16:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `role_id`, `admin_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `anggarans`
--

CREATE TABLE `anggarans` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL,
  `jenbel_id` int(10) UNSIGNED NOT NULL,
  `kegiatan_id` int(10) UNSIGNED NOT NULL,
  `jumlah_ang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggarans`
--

INSERT INTO `anggarans` (`id`, `profile_id`, `jenbel_id`, `kegiatan_id`, `jumlah_ang`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '4000000', '2019', '2019-05-22 17:17:35', '2019-05-22 17:17:35'),
(2, 1, 2, 1, '5000000', '2019', '2019-05-22 17:18:06', '2019-05-22 17:18:06'),
(3, 1, 3, 1, '6000000', '2019', '2019-05-22 17:18:43', '2019-05-22 17:18:43'),
(4, 1, 4, 1, '6000000', '2019', '2019-05-22 17:19:29', '2019-05-22 17:19:29'),
(5, 2, 1, 1, '3000000', '2019', '2019-05-22 17:19:46', '2019-05-22 17:19:46'),
(6, 2, 2, 1, '3500000', '2019', '2019-05-22 17:19:59', '2019-05-22 17:19:59'),
(7, 2, 3, 1, '5500000', '2019', '2019-05-22 17:20:25', '2019-05-22 17:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `belanjas`
--

CREATE TABLE `belanjas` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_belanja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belanja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegiatan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `belanjas`
--

INSERT INTO `belanjas` (`id`, `kode_belanja`, `nama_belanja`, `kegiatan_id`, `created_at`, `updated_at`) VALUES
(1, '5.2.2.03', 'Belanja Jasa Kantor', 1, '2019-05-22 16:55:55', '2019-05-22 16:55:55'),
(2, '5.2.2.20', 'Belanja Pemeliharaan', 2, '2019-05-22 16:56:45', '2019-05-22 16:56:45'),
(3, '5.2.2.03', 'Belanja Jasa Kantor', 2, '2019-05-22 16:57:11', '2019-05-22 16:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `jenisbelanjas`
--

CREATE TABLE `jenisbelanjas` (
  `id` int(10) UNSIGNED NOT NULL,
  `belanja_id` int(10) UNSIGNED NOT NULL,
  `kode_jenbel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jenbel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenisbelanjas`
--

INSERT INTO `jenisbelanjas` (`id`, `belanja_id`, `kode_jenbel`, `nama_jenbel`, `created_at`, `updated_at`) VALUES
(1, 1, '5.2.2.03.01', 'Belanja telepon', '2019-05-22 17:04:54', '2019-05-22 17:04:54'),
(2, 1, '5.2.2.03.02', 'Belanja Air', '2019-05-22 17:05:26', '2019-05-22 17:05:26'),
(3, 1, '5.2.2.03.03', 'Belanja Listrik', '2019-05-22 17:08:50', '2019-05-22 17:08:50'),
(4, 1, '5.2.2.03.06', 'Belanja Kawat/Fakmisili/Internet/TV Kabel/TV Satelit', '2019-05-22 17:09:06', '2019-05-22 17:09:06'),
(5, 3, '5.2.2.03.07', 'Belanja Pemeliharaan Perlengkapan Kantor', '2019-05-22 17:10:22', '2019-05-22 17:10:22'),
(6, 3, '5.2.2.20.04', 'Belanja Pemeliharaan Peralatan dan Mesin', '2019-05-22 17:10:48', '2019-05-22 17:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `kode_kegiatan`, `nama_kegiatan`, `created_at`, `updated_at`) VALUES
(1, '1.20.07.01.02', 'Program Pelayanan Administrasi Perkantoran Penyediaan Jasa Komunikasi ,Sumber daya air dan listrik', '2019-05-22 16:43:09', '2019-05-22 16:43:09'),
(2, '1.20.07.01.03', 'Program Pelayanan Administrasi Perkantoran Penyediaan Jasa Peratalatan dan Perlengkapan Kantor.', '2019-05-22 16:53:29', '2019-05-22 16:53:29');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2017_03_06_023521_create_admins_table', 1),
(3, '2017_03_06_053834_create_admin_role_table', 1),
(4, '2018_03_06_023523_create_roles_table', 1),
(5, '2019_02_23_063302_create_sekolahs_table', 1),
(6, '2019_02_23_063705_create_profiles_table', 1),
(7, '2019_03_28_011953_create_kegiatans_table', 1),
(8, '2019_03_29_114102_create_belanjas_table', 1),
(9, '2019_03_29_132848_create_jenisbelanjas_table', 1),
(10, '2019_03_29_235755_create_pengeluarans_table', 1),
(11, '2019_04_05_112507_create_anggarans_table', 1),
(12, '2019_05_06_152354_create_pegawais_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluarans`
--

CREATE TABLE `pengeluarans` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL,
  `kegiatan_id` int(10) UNSIGNED NOT NULL,
  `belanja_id` int(10) UNSIGNED NOT NULL,
  `jenbel_id` int(10) UNSIGNED NOT NULL,
  `jum_peng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengeluarans`
--

INSERT INTO `pengeluarans` (`id`, `profile_id`, `kegiatan_id`, `belanja_id`, `jenbel_id`, `jum_peng`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, '250000', '2019-01-01', '2019-05-22 17:26:35', '2019-05-22 17:26:35'),
(2, 2, 1, 1, 2, '400000', '2019-01-01', '2019-05-22 17:26:53', '2019-05-22 17:26:53'),
(3, 2, 1, 1, 3, '600000', '2019-01-30', '2019-05-22 17:30:22', '2019-05-22 17:30:22'),
(4, 1, 1, 1, 1, '300000', '2019-01-30', '2019-05-22 17:32:04', '2019-05-22 17:32:04'),
(5, 1, 1, 1, 2, '300000', '2019-01-30', '2019-05-22 17:33:00', '2019-05-22 17:33:38'),
(6, 1, 1, 1, 3, '550000', '2019-01-30', '2019-05-22 17:33:27', '2019-05-22 17:33:27'),
(7, 1, 1, 1, 4, '200000', '2019-01-30', '2019-05-22 17:34:19', '2019-05-22 17:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `sekolah_id` int(10) UNSIGNED NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `sekolah_id`, `nama_sekolah`, `no_telp`, `alamat`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'SMA NEGERI 1 GETASAN', '0856165454', 'JL. RAYA KOPENG KM.08, SUMOGAWE, Kec. Getasan\r\nKab. Semarang', '1558568155.jpg', '2019-05-22 16:35:55', '2019-05-22 16:35:55'),
(2, 2, 'SMA NEGERI 1 TENGARAN', '08784646315', 'KEMBANGSARI KARANGDUREN TENGARAN, KARANGDUREN, Kec. Tengaran\r\nKab. Semarang', '1558568491.JPG', '2019-05-22 16:41:31', '2019-05-22 16:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super', '2019-05-22 16:28:55', '2019-05-22 16:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SMA NEGERI 1 GETASAN', 'smangetasan1@gmail.com', '$2y$10$TehA/nIEY4S6cSeDKRqJOu0Hhau0D05H8QXr.9pFm7nywivG3dL/m', '2ICTth7gaeXEc4PLayL9jvSY0WADxsJqxmRoFXc7zyLu7TEceXfq42PVnuo3', '2019-05-22 16:30:28', '2019-06-18 18:58:06'),
(2, 'SMA NEGERI 1 TENGARAN', 'smantengaran1@gmail.com', '$2y$10$XasqT1pyG85Pyd37kPZ0b.rKBc7epteR0X/uYkiKWn1FIPfzcrKAq', 'YgAM4tfgpeJC8yFEX0SrZq6DGIEaJagByraYW8lP5ncQaTrecaJ1AMrmCCWk', '2019-05-22 16:32:31', '2019-05-22 16:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_role_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `anggarans`
--
ALTER TABLE `anggarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggarans_profile_id_foreign` (`profile_id`),
  ADD KEY `anggarans_jenbel_id_foreign` (`jenbel_id`),
  ADD KEY `anggarans_kegiatan_id_foreign` (`kegiatan_id`);

--
-- Indexes for table `belanjas`
--
ALTER TABLE `belanjas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `belanjas_kegiatan_id_foreign` (`kegiatan_id`);

--
-- Indexes for table `jenisbelanjas`
--
ALTER TABLE `jenisbelanjas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenisbelanjas_belanja_id_foreign` (`belanja_id`);

--
-- Indexes for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawais_email_unique` (`email`);

--
-- Indexes for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengeluarans_profile_id_foreign` (`profile_id`),
  ADD KEY `pengeluarans_kegiatan_id_foreign` (`kegiatan_id`),
  ADD KEY `pengeluarans_belanja_id_foreign` (`belanja_id`),
  ADD KEY `pengeluarans_jenbel_id_foreign` (`jenbel_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_sekolah_id_foreign` (`sekolah_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sekolahs_email_unique` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggarans`
--
ALTER TABLE `anggarans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `belanjas`
--
ALTER TABLE `belanjas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenisbelanjas`
--
ALTER TABLE `jenisbelanjas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `anggarans`
--
ALTER TABLE `anggarans`
  ADD CONSTRAINT `anggarans_jenbel_id_foreign` FOREIGN KEY (`jenbel_id`) REFERENCES `jenisbelanjas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggarans_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anggarans_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `belanjas`
--
ALTER TABLE `belanjas`
  ADD CONSTRAINT `belanjas_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jenisbelanjas`
--
ALTER TABLE `jenisbelanjas`
  ADD CONSTRAINT `jenisbelanjas_belanja_id_foreign` FOREIGN KEY (`belanja_id`) REFERENCES `belanjas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD CONSTRAINT `pengeluarans_belanja_id_foreign` FOREIGN KEY (`belanja_id`) REFERENCES `belanjas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengeluarans_jenbel_id_foreign` FOREIGN KEY (`jenbel_id`) REFERENCES `jenisbelanjas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengeluarans_kegiatan_id_foreign` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengeluarans_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
