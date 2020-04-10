-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2020 at 12:47 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `authorised_helpers`
--

DROP TABLE IF EXISTS `authorised_helpers`;
CREATE TABLE IF NOT EXISTS `authorised_helpers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `police_station_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `authorised_helpers_police_station_id_foreign` (`police_station_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authorised_helpers`
--

INSERT INTO `authorised_helpers` (`id`, `name`, `number`, `police_station_id`, `created_at`, `updated_at`) VALUES
(2, 'Rajendra Singh', 'number', 1, '2020-04-05 07:18:06', '2020-04-05 07:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `basic_infos`
--

DROP TABLE IF EXISTS `basic_infos`;
CREATE TABLE IF NOT EXISTS `basic_infos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consumers`
--

DROP TABLE IF EXISTS `consumers`;
CREATE TABLE IF NOT EXISTS `consumers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `phone` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crowd_reports`
--

DROP TABLE IF EXISTS `crowd_reports`;
CREATE TABLE IF NOT EXISTS `crowd_reports` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crowd_reports`
--

INSERT INTO `crowd_reports` (`id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'abc', 0, '2020-04-07 02:02:36', '2020-04-07 02:02:36'),
(2, 'abc', 0, '2020-04-07 02:42:53', '2020-04-07 02:42:53'),
(3, 'abc', 0, '2020-04-07 02:43:27', '2020-04-07 02:43:27'),
(4, 'dvcr', 0, '2020-04-07 02:44:43', '2020-04-07 02:44:43'),
(5, 'rs', 1, '2020-04-07 02:45:03', '2020-04-07 09:14:08'),
(6, 'dhasdgagh', 0, '2020-04-07 10:35:48', '2020-04-07 10:35:48'),
(7, 'hii', 0, '2020-04-08 11:03:24', '2020-04-08 11:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `emergencies`
--

DROP TABLE IF EXISTS `emergencies`;
CREATE TABLE IF NOT EXISTS `emergencies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gps_lan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gps_lon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `map_data`
--

DROP TABLE IF EXISTS `map_data`;
CREATE TABLE IF NOT EXISTS `map_data` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `icon_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `map_data`
--

INSERT INTO `map_data` (`id`, `icon_image`, `address`, `title`, `lan`, `lon`, `status`, `created_at`, `updated_at`) VALUES
(2, 'http://maps.google.com/mapfiles/ms/icons/lodging.png', 'dajhsagh', 'Test', '26.2271121', '78.2134339', 1, '2020-04-07 09:09:35', '2020-04-07 09:10:49'),
(3, 'http://maps.google.com/mapfiles/ms/icons/hospitals.png', '30 SIDDHARTH NAGAR\r\nMELA DULLPUR THATIPUR', 'How to add value in multi dimensions dictionary?', '26.19458', '78.15310', 1, '2020-04-08 10:10:39', '2020-04-08 10:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sendStatus` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `message_type`, `sendStatus`, `created_at`, `updated_at`, `link`) VALUES
(2, 'dajsdjasda', 'Home', 0, '2020-04-07 09:22:33', '2020-04-07 09:22:33', 'https://tonaff.com/aff?pid=MTUwLTI5MTM=&link=http%3A%2F%2Faliexpress.com%2F'),
(3, 'dajsdhjas', 'Home', 0, '2020-04-07 10:04:57', '2020-04-07 10:04:57', 'https://tonaff.com/aff?pid=MTUwLTI5MTM=&link=http%3A%2F%2Faliexpress.com%2F'),
(4, 'dajsdhjas', 'Home', 0, '2020-04-07 10:05:20', '2020-04-07 10:05:20', 'https://tonaff.com/aff?pid=MTUwLTI5MTM=&link=http%3A%2F%2Faliexpress.com%2F'),
(5, 'dajsdhjas', 'Home', 0, '2020-04-07 10:05:31', '2020-04-07 10:05:31', 'https://tonaff.com/aff?pid=MTUwLTI5MTM=&link=http%3A%2F%2Faliexpress.com%2F'),
(6, 'sdgahsjdgjahsdhja', 'Home', 0, '2020-04-08 09:35:46', '2020-04-08 09:35:46', 'https://tonaff.com/aff?pid=MTUwLTI5MTM=&link=http%3A%2F%2Faliexpress.com%2F');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2020_04_01_145410_create_authorised_helpers_table', 5),
(6, '2020_04_01_145530_create_areas_table', 2),
(7, '2020_04_01_180433_create_police_stations_table', 2),
(8, '2020_04_01_180516_create_crowd_reports_table', 2),
(9, '2020_04_01_180540_create_consumers_table', 2),
(14, '2020_04_01_145238_create_stores_table', 4),
(11, '2020_04_01_180641_create_messages_table', 2),
(16, '2020_04_01_180609_create_social_services_table', 6),
(17, '2020_04_03_103543_create_basic_infos_table', 7),
(18, '2020_04_04_164559_create_emergencies_table', 7),
(19, '2020_04_07_141446_create_map_data_table', 8),
(20, '2020_04_08_103419_create_jobs_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `police_stations`
--

DROP TABLE IF EXISTS `police_stations`;
CREATE TABLE IF NOT EXISTS `police_stations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `police_stations`
--

INSERT INTO `police_stations` (`id`, `name`, `number`, `created_at`, `updated_at`) VALUES
(1, 'Thatipur', '9685925522', NULL, NULL),
(2, 'Golekamandir', '9685925522', '2020-04-09 04:36:37', '2020-04-09 04:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `social_services`
--

DROP TABLE IF EXISTS `social_services`;
CREATE TABLE IF NOT EXISTS `social_services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double(8,2) NOT NULL,
  `lon` double(8,2) NOT NULL,
  `end_time` timestamp NOT NULL,
  `police_station_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `social_services_police_station_id_foreign` (`police_station_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_services`
--

INSERT INTO `social_services` (`id`, `title`, `type`, `address`, `lat`, `lon`, `end_time`, `police_station_id`, `created_at`, `updated_at`, `phone`, `status`, `name`) VALUES
(2, 'Test', '', '30 Siddharth Nagar', 154.00, 557.00, '2020-04-21 18:30:00', 1, NULL, '2020-04-03 04:31:33', '9685925522', 'Rejected', 'Hi'),
(3, 'Se', 'Service', '30 Siddharth  Nagar,Near Mela Ground Dullpur', 454545.00, 454554.00, '2020-04-22 12:40:00', 1, '2020-04-10 18:30:00', '2020-04-08 04:41:10', '9685925522', 'Rejected', 'Rajendra Pal Singh');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_num` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crowd` tinyint(1) NOT NULL DEFAULT '0',
  `current_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `police_station_id` int(10) UNSIGNED NOT NULL,
  `lat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stores_police_station_id_foreign` (`police_station_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `shop_name`, `phone_num`, `password`, `crowd`, `current_status`, `address`, `police_station_id`, `lat`, `lon`, `created_at`, `updated_at`, `icon_img`) VALUES
(6, 'Shopyink', '9685925522', '$2y$10$nftoLPimgW3ttyQw/jmNPOH0JAirn5XjjgbmN0fZ2PwO3DJM7Thdm', 0, 'Pending', 'vhsjgjhfdsg', 1, '122.00', '545.00', '2020-04-05 06:43:22', '2020-04-05 06:43:22', 'http://maps.google.com/mapfiles/ms/icons/shopping.png'),
(7, 'Shopyink', '9685925522', '$2y$10$52LAHVSV2ncw7qtB2Zfa..HQ.sku4AniyPKZdbEpPIq5J6YUNSoOW', 0, 'Pending', 'vhsjgjhfdsg', 1, '122.00', '545.00', '2020-04-05 06:43:29', '2020-04-05 06:43:29', 'http://maps.google.com/mapfiles/ms/icons/shopping.png'),
(5, 'Shopyink', '9685925522', '$2y$10$N7OHb92NomguGjzqB053nuk5owa6.isVNMor7Uz.SuJWXUQTSjNJ6', 0, 'Open', 'vhsjgjhfdsg', 1, '26.215510', '78.182979', '2020-04-05 06:42:26', '2020-04-05 06:42:26', 'http://maps.google.com/mapfiles/ms/icons/shopping.png'),
(4, 'Shopyink', '9685925522', '$2y$10$C1QDSFmTVF7ILewJotNt/OJ9EYc250yLdPox.BzA.fPV81IzIe4kC', 0, 'Open', 'dasdasd', 1, '26.205810', '78.182969', '2020-04-02 04:55:23', '2020-04-02 04:55:23', 'http://maps.google.com/mapfiles/ms/icons/shopping.png'),
(8, 'Shopyink', '9685925522', '$2y$10$Ymku4ZKkzupcDBLjVxKZs.diw1MR/AB/ABs4nXtgQbClte9pj3r76', 0, 'Pending', 'vhsjgjhfdsg', 1, '122.00', '545.00', '2020-04-05 06:43:39', '2020-04-05 06:43:39', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rajendra Singh', 'rs188282@gmail.com', NULL, '$2y$10$avbF6.lgrOqpT0oKl5b3uuvIKV6bkK4AqFKk957RIZEmPwsylPxJu', NULL, '2020-04-01 09:14:09', '2020-04-01 09:14:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
