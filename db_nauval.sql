-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2021 at 06:58 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nauval`
--

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_guru` varchar(50) CHARACTER SET latin1 NOT NULL,
  `alamat` text CHARACTER SET latin1 NOT NULL,
  `jenkel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmpt_lahir` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tgl_lahir` date NOT NULL,
  `profil` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(30) CHARACTER SET latin1 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `user_id`, `nama_guru`, `alamat`, `jenkel`, `tmpt_lahir`, `tgl_lahir`, `profil`, `email`, `password`, `created_at`, `updated_at`) VALUES
(110011, 141, 'guru', 'jambi', 'Laki-laki', 'jambi', '2021-12-15', NULL, 'guru@gmail.com', 'guru123', '2021-12-29 13:44:42', '2021-12-29 13:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `isipesans`
--

CREATE TABLE `isipesans` (
  `id` int(11) NOT NULL,
  `pesan_id` int(11) NOT NULL,
  `user_type` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `isipesans`
--

INSERT INTO `isipesans` (`id`, `pesan_id`, `user_type`, `user_id`, `pesan`, `created_at`, `updated_at`) VALUES
(32, 22, 'App\\Guru', '110011', 'bisa ngak', '2021-12-29 15:21:40', '2021-12-29 15:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(10, 'VII', '2021-12-29 13:23:15', '2021-12-29 13:23:15'),
(12, 'VIII', '2021-12-29 13:25:22', '2021-12-29 13:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id` int(11) NOT NULL,
  `mapel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mulai` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`id`, `mapel`, `kelas`, `nip`, `soal`, `waktu_mulai`, `waktu_selesai`, `status`, `created_at`, `updated_at`) VALUES
(21, 'IPA', 'VII', '110011', 'dwadawdawdaw', '2021-12-28 15:20:00', '2022-01-08 15:20:00', 1, '2021-12-29 15:20:57', '2021-12-29 15:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `kuissiswas`
--

CREATE TABLE `kuissiswas` (
  `id` int(11) NOT NULL,
  `kuis_id` int(11) DEFAULT NULL,
  `siswa_id` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuissiswas`
--

INSERT INTO `kuissiswas` (`id`, `kuis_id`, `siswa_id`, `nilai`, `created_at`, `updated_at`) VALUES
(11, 21, '12312312312', '100', '2021-12-29 15:28:15', '2021-12-29 15:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` int(11) NOT NULL,
  `nama_pelajaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`id`, `nama_pelajaran`, `nip`, `kelas`, `created_at`, `updated_at`) VALUES
(26, 'IPA', '110011', 'VII', '2021-12-29 13:48:31', '2021-12-29 13:48:31'),
(27, 'IPA', '110011', 'VIII', '2021-12-29 13:48:41', '2021-12-29 13:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `materis`
--

CREATE TABLE `materis` (
  `id` int(11) NOT NULL,
  `nama_materi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_materi` mediumblob NOT NULL,
  `nip` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materis`
--

INSERT INTO `materis` (`id`, `nama_materi`, `mapel`, `kelas`, `file_materi`, `nip`, `created_at`, `updated_at`) VALUES
(20, 'materi 1', 'IPA', 'VII', 0x7075626c69632f67616d6261722f7163476d543571634f7645456331747773685145673830737648384d7958366459543257546a56722e646f6378, '110011', '2021-12-29 13:49:40', '2021-12-29 13:49:40'),
(21, 'materi 1', 'IPA', 'VIII', 0x7075626c69632f67616d6261722f7163476d543571634f7645456331747773685145673830737648384d7958366459543257546a56722e646f6378, '110011', '2021-12-29 13:49:40', '2021-12-29 13:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesans`
--

CREATE TABLE `pesans` (
  `id` int(11) NOT NULL,
  `siswa_id` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_guru` int(11) NOT NULL,
  `guru_id` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_siswa` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesans`
--

INSERT INTO `pesans` (`id`, `siswa_id`, `status_guru`, `guru_id`, `status_siswa`, `created_at`, `updated_at`) VALUES
(22, '12312312312', 0, '110011', 0, '2021-12-29 15:21:40', '2021-12-29 15:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_siswa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tpt_lahir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `user_id`, `nama_siswa`, `alamat`, `tpt_lahir`, `tgl_lahir`, `kelas`, `jenkel`, `profil`, `email`, `password`, `created_at`, `updated_at`) VALUES
('12312312312', 144, 'siswa', 'jambi', 'jambi', '2021-12-22', 'VII', 'Laki-Laki', NULL, 'siswa@gmail.com', 'siswa123', '2021-12-29 13:48:19', '2021-12-29 13:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `soaljawabans`
--

CREATE TABLE `soaljawabans` (
  `id` int(11) NOT NULL,
  `kuissiswa_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `jawaban` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soaljawabans`
--

INSERT INTO `soaljawabans` (`id`, `kuissiswa_id`, `soal_id`, `jawaban`, `value`, `created_at`, `updated_at`) VALUES
(199, 11, 70, 'b', 1, '2021-12-29 15:28:15', '2021-12-29 15:28:15'),
(200, 11, 71, 'b', 1, '2021-12-29 15:28:15', '2021-12-29 15:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `soals`
--

CREATE TABLE `soals` (
  `id` int(11) NOT NULL,
  `kuis_id` int(11) NOT NULL,
  `soal` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soals`
--

INSERT INTO `soals` (`id`, `kuis_id`, `soal`, `a`, `b`, `c`, `d`, `jawaban`, `keterangan`, `created_at`, `updated_at`) VALUES
(70, 21, 'adwadwa', 'ad', 'bc', 'cd', 'dc', 'b', 'asdasda', '2021-12-29 15:21:23', '2021-12-29 15:21:23'),
(71, 21, 'wadwadaw', 'dawd', 'awdawdawd', 'dawaw', 'dwadaw', 'b', 'dadwa', '2021-12-29 15:23:41', '2021-12-29 15:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `nama_tugas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_tugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batas_waktu` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `nama_tugas`, `file_tugas`, `nip`, `mapel`, `kelas`, `batas_waktu`, `status`, `created_at`, `updated_at`) VALUES
(25, 'dwadawdaw', 'public/gambar/jbtSOHvhs58H7cIe03zvp84f9R1NbkJDCDY4cOCn.docx', '110011', 'IPA', 'VII', '2022-01-01 15:20:00', 1, '2021-12-29 15:20:10', '2021-12-29 15:20:19'),
(26, 'dwadawdaw', 'public/gambar/jbtSOHvhs58H7cIe03zvp84f9R1NbkJDCDY4cOCn.docx', '110011', 'IPA', 'VIII', '2022-01-01 15:20:00', 1, '2021-12-29 15:20:10', '2021-12-29 15:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `tugasygdikerjakans`
--

CREATE TABLE `tugasygdikerjakans` (
  `id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `siswa_id` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_upload` date NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugasygdikerjakans`
--

INSERT INTO `tugasygdikerjakans` (`id`, `tugas_id`, `siswa_id`, `nip`, `file_jawaban`, `tgl_upload`, `nilai`, `created_at`, `updated_at`) VALUES
(14, 25, '12312312312', '110011', 'public/gambar/fSyd2nMhDQUglxSB8tIFvTsi9LnO7u3JK4eh7l9W.docx', '2021-12-29', NULL, '2021-12-29 15:22:14', '2021-12-29 15:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `akses`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', '$2y$10$qIh.LwBJVQDZAqAv.MPcJ.FYOFb31NPLum4Nmo0SgEg9JOiFSkzgW', '0', '5RX1FAJCfDh9u1Rm0QJRmnwFNTKJfcAqNOMSsVYDOdyDFEOkxQVQSMVWiShh', '2020-07-16 09:08:04', '2021-02-03 05:43:53'),
(133, 'Budi', 'budi@gmail.com', '$2y$10$la6eqQmFsbKCGdoYehwT8eSnhiYM1INT8tTJmZendqQMpfMV3oxZa', '1', 'LzZUsu2UxOLiLiNDuB2FVW3VU5bxzpxgTizSJ8RfJ76bP3K9tje66dxTko4Q', '2021-12-29 06:21:39', '2021-12-29 06:21:39'),
(141, 'guru', 'guru@gmail.com', '$2y$10$QPbs8C70kVeNYUr84VNyaeTxZeyrBBxrHlW.GFHYPO9JBTfxA93p.', '1', 'jHsfLykKNpZEMwA3t0R4yqvu6FZX99KUGJxv0LY7tU4v2E0Mn9YdyAt1rWcw', '2021-12-29 06:44:42', '2021-12-29 06:44:42'),
(144, 'siswa', 'siswa@gmail.com', '$2y$10$2r.FsvsSMwTtWt0HG2qE.O7om.gHu2D2khITkhqfeqGbIUsplmpwC', '2', 'im7M4VyspWzPQbJIbnPG6RSqhTmDALPPBVrg1CaS2aNGERliMVvDAPRCFw1J', '2021-12-29 06:48:19', '2021-12-29 06:48:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isipesans`
--
ALTER TABLE `isipesans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuissiswas`
--
ALTER TABLE `kuissiswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materis`
--
ALTER TABLE `materis`
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
-- Indexes for table `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soaljawabans`
--
ALTER TABLE `soaljawabans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soals`
--
ALTER TABLE `soals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugasygdikerjakans`
--
ALTER TABLE `tugasygdikerjakans`
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
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110012;

--
-- AUTO_INCREMENT for table `isipesans`
--
ALTER TABLE `isipesans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kuissiswas`
--
ALTER TABLE `kuissiswas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `materis`
--
ALTER TABLE `materis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `soaljawabans`
--
ALTER TABLE `soaljawabans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `soals`
--
ALTER TABLE `soals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tugasygdikerjakans`
--
ALTER TABLE `tugasygdikerjakans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
