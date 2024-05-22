-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22.05.2024 klo 14:30
-- Palvelimen versio: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `module_c`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail_path` varchar(255) DEFAULT NULL,
  `results_count` int(11) NOT NULL DEFAULT 10,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vedos taulusta `events`
--

INSERT INTO `events` (`id`, `title`, `thumbnail_path`, `results_count`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Estrella Predovic', NULL, 10, 2, '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(2, 'Noelia Von', NULL, 10, 1, '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(3, 'Jean Waters', NULL, 10, 1, '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(4, 'Malinda Nikolaus DDS', NULL, 10, 1, '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(5, 'Marion Corkery III', NULL, 10, 2, '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(6, 'Maurice Jakubowski', NULL, 10, 1, '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(7, 'Ms. Natasha Emmerich', NULL, 10, 2, '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(8, 'Alysa Zboncak Sr.', NULL, 10, 2, '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(9, 'Ferne Douglas', NULL, 10, 2, '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(10, 'Janiya Gleason', NULL, 10, 2, '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(11, 'MATOPELI', NULL, 10, 2, '2024-05-22 09:30:27', '2024-05-22 09:30:27');

-- --------------------------------------------------------

--
-- Rakenne taululle `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Rakenne taululle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vedos taulusta `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_22_062211_create_events_table', 1),
(6, '2024_05_22_071903_create_results_table', 1);

-- --------------------------------------------------------

--
-- Rakenne taululle `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Rakenne taululle `personal_access_tokens`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Rakenne taululle `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vedos taulusta `results`
--

INSERT INTO `results` (`id`, `score`, `event_id`, `username`, `created_at`, `updated_at`) VALUES
(1, 87842, 2, 'Aliya Kling', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(2, 65422, 6, 'Ms. Tomasa Feest Jr.', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(3, 5823, 10, 'Zechariah Rolfson', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(4, 56657, 4, 'Dr. Michelle Hermann PhD', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(5, 88890, 4, 'Elizabeth Mante', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(6, 61400, 3, 'Ericka Zemlak', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(7, 43172, 6, 'Olen Altenwerth', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(8, 78114, 6, 'Jabari Durgan', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(9, 20165, 9, 'Prof. Brett Rolfson Jr.', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(10, 51731, 8, 'Mikel Johnston', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(11, 87392, 2, 'Prof. Shana Smith', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(12, 6312, 5, 'Lavada Tremblay', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(13, 68810, 5, 'Jimmie Walter', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(14, 79285, 6, 'Alisa Zulauf', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(15, 33368, 6, 'Charlotte Abbott PhD', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(16, 27041, 9, 'Natalia Hegmann III', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(17, 59464, 9, 'Bette Roob', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(18, 76943, 8, 'Bridget McGlynn IV', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(19, 8586, 6, 'Winona D\'Amore', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(20, 68173, 5, 'Mr. Green Jast', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(21, 49666, 10, 'Johnny Herman', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(22, 39243, 1, 'Daija Fay', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(23, 12160, 8, 'Prof. Tate Kihn', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(24, 55132, 4, 'Delores Braun', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(25, 10021, 2, 'Jakob Botsford', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(26, 6279, 1, 'Prof. Leif Gottlieb', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(27, 48073, 1, 'Daniela Corkery', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(28, 71237, 4, 'Miss Monica Durgan III', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(29, 28131, 7, 'Carson Wintheiser', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(30, 39571, 2, 'Alberto Runolfsdottir IV', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(31, 53786, 6, 'Jamal Ernser', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(32, 42078, 8, 'Candace Kuvalis', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(33, 12633, 9, 'Prof. Elinore Wolf', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(34, 10287, 6, 'Vito Mosciski', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(35, 85928, 2, 'Prof. Gracie McKenzie V', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(36, 14024, 2, 'Mr. Jake Smitham V', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(37, 64920, 4, 'Prof. Horacio Corkery I', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(38, 53103, 9, 'Marcelo Renner IV', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(39, 10934, 5, 'Zelma Waters', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(40, 60308, 6, 'Darwin Bins MD', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(41, 75663, 7, 'Eunice Schuppe', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(42, 3844, 4, 'Mrs. Vickie Klein MD', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(43, 36312, 6, 'Prof. Gardner Jacobi', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(44, 2995, 7, 'Giuseppe West', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(45, 1329, 2, 'Michael Murray DVM', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(46, 31467, 4, 'Ms. Kitty Wisoky', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(47, 1292, 8, 'Micaela Parisian II', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(48, 5395, 6, 'Kaylee Rutherford', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(49, 9771, 6, 'Tobin Simonis', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(50, 51294, 1, 'Rosella Fisher', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(51, 78687, 4, 'Prof. Donavon Shields', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(52, 25475, 7, 'Jessie McClure', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(53, 53697, 6, 'Melvin Stroman III', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(54, 91754, 10, 'Annalise Mitchell III', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(55, 66493, 3, 'Rosamond Tremblay', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(56, 20777, 8, 'Liza Breitenberg Sr.', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(57, 40343, 7, 'Kieran Quigley', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(58, 49529, 5, 'Ethyl Pouros', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(59, 53782, 8, 'Aurelia Altenwerth', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(60, 57318, 1, 'Lyda Towne', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(61, 24450, 5, 'Destiny Nienow', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(62, 84055, 1, 'Estelle Hammes', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(63, 77056, 3, 'Layne Hirthe', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(64, 77566, 1, 'Miss Jenifer Jenkins MD', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(65, 65244, 2, 'Trey Botsford', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(66, 98842, 3, 'Emily Batz', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(67, 47327, 10, 'Dr. Ron Medhurst I', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(68, 51766, 2, 'Raoul Deckow', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(69, 16207, 9, 'Ezequiel Haag', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(70, 27617, 6, 'Devonte Zboncak', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(71, 21700, 5, 'Antonia Cronin', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(72, 8610, 1, 'Dana Rosenbaum', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(73, 8516, 3, 'Mr. Declan Medhurst Jr.', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(74, 96954, 9, 'Isabel Rutherford', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(75, 54288, 3, 'Miss Hanna Jacobi', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(76, 2601, 1, 'Anabelle Lakin', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(77, 91050, 10, 'Judd Stiedemann Sr.', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(78, 85081, 6, 'Mrs. Emmanuelle Maggio Jr.', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(79, 69511, 2, 'Mr. Ramon Hane', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(80, 45180, 2, 'Janelle Lynch', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(81, 77603, 6, 'Samson Donnelly', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(82, 22753, 9, 'Devon Johns', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(83, 89396, 1, 'Prof. Donald Powlowski Jr.', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(84, 95932, 10, 'Tad Bahringer DVM', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(85, 34875, 3, 'Rae Gleichner', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(86, 26724, 1, 'Amy Herzog', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(87, 11963, 4, 'Hobart O\'Keefe', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(88, 85603, 5, 'Dr. Harold Beier I', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(89, 53801, 1, 'Ashley Collins', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(90, 93521, 6, 'Luz Wehner', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(91, 78166, 6, 'Hayden Rau', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(92, 72297, 8, 'Miracle Rempel', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(93, 9468, 1, 'Prof. Alia D\'Amore', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(94, 14528, 9, 'Laury McLaughlin', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(95, 84783, 7, 'Myah Glover', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(96, 18207, 6, 'Kathryne Fadel', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(97, 94388, 4, 'Jaclyn Considine', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(98, 82477, 1, 'Monique Keebler I', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(99, 62966, 3, 'Houston Schroeder V', '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(100, 72464, 8, 'Mrs. Serenity Legros Jr.', '2024-05-22 09:30:27', '2024-05-22 09:30:27');

-- --------------------------------------------------------

--
-- Rakenne taululle `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vedos taulusta `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$hVfezTVTdJGIJWOkc9gCTOOwOqhGAFAEcDOZDgDub8e4AQ.Gsqxd6', 1, NULL, '2024-05-22 09:30:27', '2024-05-22 09:30:27'),
(2, 'user', '$2y$10$x2sRoHkaTAoJG3r.GDPao.FYFzzB5yMHhD.Sx9oEBYdcWUnHa2Ugm', 0, NULL, '2024-05-22 09:30:27', '2024-05-22 09:30:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

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
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_event_id_foreign` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Rajoitteet taululle `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
