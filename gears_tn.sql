-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 02:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gears_tn`
--

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
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `sn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `seller_id`, `category`, `sub_category`, `manufacture`, `model`, `year`, `sn`, `condition`, `hours`, `description`, `sell_type`, `rent_hours`, `country`, `slug`, `images`, `approved`, `created_at`, `updated_at`) VALUES
(3, '2', 'construction', 'wheel loader', 'caterpiller', '910k', 2015, 'AY400951', 'used', '1630', 'CAB, A/C, HEAT, LIGHTING, TIER 4 INTERIM, PRODUCT LINK', 'sell', '0', 'Egypt', '2015-caterpiller-910k-0883c171-1652-4abf-9a21-f5b2313a0943', '[\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/636ac9d7-0472-47a4-b2be-2016adf75ceb1.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/8adc7595-5c0f-4690-b19b-50dea89398112.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/c890a047-e71c-4758-a3a2-b0744ad290ca3.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/0d4c5eaf-e3dd-4a28-bb9a-8c54afdd33194.jpg\"]', 0, '2021-06-08 18:46:52', '2021-06-08 18:46:52'),
(4, '2', 'construction', 'wheel loader', 'caterpiller', '910k', 2015, 'CAT0910KKAY401290', 'used', '1220', '2015 Caterpillar 910K\n93 Hp, Hydrostatic,\n2.4 Yard Bucket, Hydraulic Coupler,\nAuxiliary Hydraulics, Ride Control, Diff-Lock,\nOnly 1,220 Hours!!!', 'sell', '0', 'Saudi Arabia', '2015-caterpiller-910k-b023608c-2e57-4e95-9a33-9e6bb28020e5', '[\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/cb89bdc8-151a-4dcb-9f42-d8762850b3731.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/f7c28753-2a09-4de5-bc0d-d30f23d535a92.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/0a68b354-5dc5-445c-b64f-996d0274909e3.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/89870ad1-b161-4afb-82bc-6bc4934a5db14.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/314f622b-1289-4d9c-9014-b4bb5c4a84c75.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/cda20c05-7629-4fe4-95b3-e8661e0c94966.jpg\"]', 0, '2021-06-08 18:51:00', '2021-06-08 18:51:00'),
(5, '2', 'construction', 'wheel loader', 'caterpiller', '916', 1999, '2XB01785', 'used', '25960', 'caterpillar 916', 'sell', '0', 'Kuwait', '1999-caterpiller-916-07f411be-5040-4520-b28b-b633822cd0f4', '[\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/e22553b2-f6bd-48e7-8226-35dacb9385b22.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/2c87428e-c7dd-4fd5-a7df-7fd6c216d6143.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/2c08a4ff-84de-4313-b63d-185237a112454.jpg\"]', 0, '2021-06-08 18:57:56', '2021-06-08 18:57:56'),
(6, '2', 'construction', 'motor grader', 'caterpiller', '12g', 1989, '72V2398', 'used', '20900', '4 New tires Painted Machine ran but smoked. Put a new starter on, now won’t do anything. Selling as-is.', 'sell', '0', 'United Arab Emirates', '1989-caterpiller-12g-2f95676b-4169-402e-9274-eff4c0d9132d', '[\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/ad731170-820d-411a-8e77-57396938ab401.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/18d648e2-ead3-4a98-83ca-cb61a2b177692.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/2111b028-51b7-4263-8fad-2da10f7398253.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/70aa97bc-1aa2-4c80-818e-9ff8e947d2214.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/fbd8ebe9-0581-4eaa-b336-e2eb69a050bf5.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/baac6226-9c88-4928-8269-e23e4a47ebb86.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/bc789096-c7b8-46dc-b47b-c757d23a13467.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/f1279183-08ce-419f-8fc4-8eb6100cccaf8.jpg\"]', 0, '2021-06-08 19:39:47', '2021-06-08 19:39:47'),
(7, '2', 'construction', 'motor grader', 'caterpiller', '12g', 1979, '61M06847', 'used', '6276', 'Cab/heat, 12\' board, scarifier, good shape.', 'sell', '0', 'Egypt', '1979-caterpiller-12g-5f6bbb97-cc74-4838-8039-226ee0ef00ef', '[\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/53c23852-f2e8-4949-afa3-70764109cacd1.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/7f36fdf2-d092-4f8f-bbe4-4f9ffefd8b472.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/569b30be-4620-41d5-a834-47dafc67dcd93.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/edb1eac0-c25f-47ab-a5a8-1ae05600a0324.jpg\",\"https://s3.eu-central-1.amazonaws.com/gears-tn-bucket/uploads/8a348059-6ff9-41de-a129-c1b4b7f114ca5.jpg\"]', 0, '2021-06-08 19:42:53', '2021-06-08 19:42:53'),
(8, '2', 'construction', 'motor grader', 'caterpiller', '12g', 1992, '61M14732', 'used', '11082', 'Ripper, PB, Very nice', 'sell', '0', 'Algeria', '1992-caterpiller-12g-0222e25c-5179-409a-b457-b7e803ee9acb', '[]', 0, '2021-06-08 19:45:20', '2021-06-08 19:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `machine_category`
--

CREATE TABLE `machine_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_category`
--

INSERT INTO `machine_category` (`id`, `category`, `sub_category`, `img`, `created_at`, `updated_at`) VALUES
(1, 'construction', 'wheel loader', '/images/wheelloader.svg', '2021-05-31 19:39:58', '2021-05-31 19:39:58'),
(3, 'construction', 'forklift', '/images/forklift.svg', '2021-05-31 19:50:39', '2021-05-31 19:50:39'),
(4, 'construction', 'excavator', '/images/excavator.svg', '2021-05-31 20:19:03', '2021-05-31 20:19:03'),
(5, 'construction', 'motor grader', '/images/motor-grader.svg', '2021-06-02 20:06:53', '2021-06-02 20:06:53'),
(6, 'construction', 'backhoe loader', '/images/backhoeloader.svg', '2021-06-02 20:07:17', '2021-06-02 20:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `machine_manufacture`
--

CREATE TABLE `machine_manufacture` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_manufacture`
--

INSERT INTO `machine_manufacture` (`id`, `category`, `sub_category`, `manufacture`, `created_at`, `updated_at`) VALUES
(1, 'construction', 'excavator', 'caterpiller', '2021-06-02 20:23:35', '2021-06-02 20:23:35'),
(2, 'construction', 'wheel loader', 'caterpiller', '2021-06-02 20:24:00', '2021-06-02 20:24:00'),
(3, 'construction', 'wheel loader', 'kawasaki', '2021-06-02 20:24:30', '2021-06-02 20:24:30'),
(4, 'construction', 'motor grader', 'caterpiller', '2021-06-02 20:25:05', '2021-06-02 20:25:05'),
(5, 'construction', 'backhoe loader', 'caterpiller', '2021-06-02 20:25:37', '2021-06-02 20:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `machine_model`
--

CREATE TABLE `machine_model` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_model`
--

INSERT INTO `machine_model` (`id`, `category`, `sub_category`, `manufacture`, `model`, `created_at`, `updated_at`) VALUES
(1, 'construction', 'excavator', 'caterpiller', '330bl', '2021-06-02 19:44:52', '2021-06-02 19:44:52'),
(2, 'construction', 'wheel loader', 'kawasaki', '65z', '2021-06-02 20:01:34', '2021-06-02 20:01:34'),
(3, 'construction', 'wheel loader', 'kawasaki', '70z', '2021-06-02 20:01:46', '2021-06-02 20:01:46'),
(4, 'construction', 'wheel loader', 'kawasaki', '75z', '2021-06-02 20:01:53', '2021-06-02 20:01:53'),
(5, 'construction', 'backhoe loader', 'caterpiller', '416c', '2021-06-02 20:49:56', '2021-06-02 20:49:56'),
(6, 'construction', 'backhoe loader', 'caterpiller', '420d', '2021-06-02 20:50:14', '2021-06-02 20:50:14'),
(7, 'construction', 'backhoe loader', 'caterpiller', '430d', '2021-06-02 20:50:22', '2021-06-02 20:50:22'),
(8, 'construction', 'excavator', 'caterpiller', '312b', '2021-06-02 20:50:56', '2021-06-02 20:50:56'),
(9, 'construction', 'excavator', 'caterpiller', '315b', '2021-06-02 20:51:14', '2021-06-02 20:51:14'),
(10, 'construction', 'excavator', 'caterpiller', '320b', '2021-06-02 20:51:19', '2021-06-02 20:51:19'),
(11, 'construction', 'excavator', 'caterpiller', '322b', '2021-06-02 20:51:28', '2021-06-02 20:51:28'),
(12, 'construction', 'excavator', 'caterpiller', '325b', '2021-06-02 20:51:36', '2021-06-02 20:51:36'),
(13, 'construction', 'excavator', 'caterpiller', '330b', '2021-06-02 20:51:49', '2021-06-02 20:51:49'),
(14, 'construction', 'wheel loader', 'caterpiller', '910', '2021-06-02 20:52:23', '2021-06-02 20:52:23'),
(15, 'construction', 'wheel loader', 'caterpiller', '916', '2021-06-02 20:52:31', '2021-06-02 20:52:31'),
(16, 'construction', 'wheel loader', 'caterpiller', '920', '2021-06-02 20:52:43', '2021-06-02 20:52:43'),
(17, 'construction', 'wheel loader', 'caterpiller', '930', '2021-06-02 20:52:47', '2021-06-02 20:52:47'),
(18, 'construction', 'wheel loader', 'caterpiller', '936e', '2021-06-02 20:53:11', '2021-06-02 20:53:11'),
(19, 'construction', 'wheel loader', 'caterpiller', '936f', '2021-06-02 20:53:15', '2021-06-02 20:53:15'),
(20, 'construction', 'wheel loader', 'caterpiller', '950', '2021-06-02 20:53:25', '2021-06-02 20:53:25'),
(21, 'construction', 'wheel loader', 'caterpiller', '950b', '2021-06-02 20:53:28', '2021-06-02 20:53:28'),
(22, 'construction', 'wheel loader', 'caterpiller', '950e', '2021-06-02 20:53:37', '2021-06-02 20:53:37'),
(23, 'construction', 'wheel loader', 'caterpiller', '950f', '2021-06-02 20:53:51', '2021-06-02 20:53:51'),
(24, 'construction', 'wheel loader', 'caterpiller', '950f-2', '2021-06-02 20:53:59', '2021-06-02 20:53:59'),
(25, 'construction', 'wheel loader', 'caterpiller', '966e', '2021-06-02 20:54:05', '2021-06-02 20:54:05'),
(26, 'construction', 'wheel loader', 'caterpiller', '966d', '2021-06-02 20:54:59', '2021-06-02 20:54:59'),
(27, 'construction', 'wheel loader', 'caterpiller', '966f', '2021-06-02 20:55:15', '2021-06-02 20:55:15'),
(28, 'construction', 'wheel loader', 'caterpiller', '966f-2', '2021-06-02 20:55:21', '2021-06-02 20:55:21'),
(29, 'construction', 'wheel loader', 'caterpiller', '966g', '2021-06-02 20:55:28', '2021-06-02 20:55:28'),
(30, 'construction', 'wheel loader', 'caterpiller', '966g-2', '2021-06-02 20:55:35', '2021-06-02 20:55:35'),
(31, 'construction', 'wheel loader', 'caterpiller', '970f', '2021-06-02 20:55:51', '2021-06-02 20:55:51'),
(32, 'construction', 'wheel loader', 'caterpiller', '972g', '2021-06-02 20:56:24', '2021-06-02 20:56:24'),
(33, 'construction', 'wheel loader', 'caterpiller', '972h', '2021-06-02 20:56:28', '2021-06-02 20:56:28'),
(34, 'construction', 'wheel loader', 'caterpiller', '980f', '2021-06-02 20:56:48', '2021-06-02 20:56:48'),
(35, 'construction', 'wheel loader', 'caterpiller', '980g', '2021-06-02 20:56:54', '2021-06-02 20:56:54'),
(36, 'construction', 'wheel loader', 'caterpiller', '988', '2021-06-02 20:56:59', '2021-06-02 20:56:59'),
(37, 'construction', 'wheel loader', 'caterpiller', '910k', '2021-06-02 20:52:23', '2021-06-02 20:52:23'),
(38, 'construction', 'motor grader', 'caterpiller', '12g', '2021-06-08 19:27:42', '2021-06-08 19:27:42'),
(39, 'construction', 'motorgrader', 'caterpiller', '14g', '2021-06-08 19:27:52', '2021-06-08 19:27:52'),
(40, 'construction', 'motor grader', 'caterpiller', '140g', '2021-06-08 19:28:04', '2021-06-08 19:28:04'),
(41, 'construction', 'motor grader', 'caterpiller', '140h', '2021-06-08 19:28:08', '2021-06-08 19:28:08');

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
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2021_04_20_203846_create_machines_table', 1),
(15, '2021_04_20_203846_create_news_table', 1),
(17, '2021_04_20_203846_create_machine_category_table', 2),
(21, '2021_04_20_203846_create_machine_model_table', 4),
(22, '2021_04_20_203846_create_machine_manufacture_table', 5),
(26, '2014_10_12_000000_create_users_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` date NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bodytext` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kareem.m.habib@gmail.com', '$2y$10$O/AfTjqj1qPWznxy7QvK8uBWi0AWpe0.HpEiGYMUxN4oUnxvj0Sta', '2021-06-06 19:54:43');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 2, 'API Token', '503d4b36fbffb4243f63c386907bc2cc429f3895dad5f020c8b256e6e56e7ee2', '[\"*\"]', '2021-07-23 16:52:13', '2021-07-23 16:52:13', '2021-07-23 16:52:13'),
(3, 'App\\Models\\User', 3, 'API Token', '66fd2e501bc8271887c07b9275bc41f509f29c4b6a8e67923cd296bc2d8ef600', '[\"*\"]', '2021-07-23 16:53:32', '2021-07-23 16:53:31', '2021-07-23 16:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commercial_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `company_name`, `reg_license`, `country`, `tax_license`, `commercial_license`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'NULL', 'NULL', NULL, NULL, NULL, NULL, NULL, 'kareem.m.habib@gmail.com', NULL, '$2y$10$BMv6cnOq7CUgc2st5EPhduuJuhUWwq/g050FEDvwVa/bdnhMkVxJ2', 'member', NULL, '2021-07-23 16:53:31', '2021-07-23 16:53:31');

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
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine_category`
--
ALTER TABLE `machine_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `machine_category_id_unique` (`id`),
  ADD UNIQUE KEY `machine_category_sub_category_unique` (`sub_category`);

--
-- Indexes for table `machine_manufacture`
--
ALTER TABLE `machine_manufacture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine_model`
--
ALTER TABLE `machine_model`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `machine_model_model_unique` (`model`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
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
  ADD UNIQUE KEY `users_id_unique` (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_reg_license_unique` (`reg_license`),
  ADD UNIQUE KEY `users_tax_license_unique` (`tax_license`),
  ADD UNIQUE KEY `users_commercial_license_unique` (`commercial_license`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `machine_category`
--
ALTER TABLE `machine_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `machine_manufacture`
--
ALTER TABLE `machine_manufacture`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `machine_model`
--
ALTER TABLE `machine_model`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
