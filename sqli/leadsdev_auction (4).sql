-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2021 at 07:15 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leadsdev_auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `rules` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_services`
--

CREATE TABLE `admin_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articals`
--

CREATE TABLE `articals` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `biddings`
--

CREATE TABLE `biddings` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `Provider` int(11) NOT NULL,
  `winner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bid` int(11) NOT NULL,
  `last_bider` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biddings`
--

INSERT INTO `biddings` (`id`, `product_id`, `date`, `start`, `end`, `Provider`, `winner`, `bid`, `last_bider`, `created_at`, `updated_at`) VALUES
(26, 5, '2020-10-18', '19:33:00', '20:34:00', 12, NULL, 0, NULL, '2020-10-18 18:33:21', '2020-10-18 18:33:21'),
(28, 4, '2020-10-18', '20:14:00', '21:14:00', 12, NULL, 0, NULL, '2020-10-18 19:14:48', '2020-10-18 19:14:48'),
(29, 4, '2020-10-18', '20:14:00', '21:14:00', 12, NULL, 0, NULL, '2020-10-18 19:15:41', '2020-10-18 19:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `productid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `productid`, `userid`, `quantity`, `total_price`, `detail`, `created_at`, `updated_at`) VALUES
(2, 4, 11, 1, 5, NULL, '2020-10-18 18:08:36', '2020-10-18 18:08:36'),
(3, 5, 11, 1, 4, NULL, '2020-10-21 12:19:10', '2020-10-21 12:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `marker` tinyint(4) NOT NULL COMMENT '0=unread, 1=read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `message`, `file`, `sender`, `receiver`, `marker`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id obcaecati autem recusandae aut laudantium quo qui doloribus. Nihil et voluptatem possimus autem ratione nesciunt vitae id quos aperiam. Aliquid!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id obcaecati autem recusandae aut laudantium quo qui doloribus. Nihil et voluptatem possimus autem ratione nesciunt vitae id quos aperiam. Aliquid!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id obcaecati autem recusandae aut laudantium quo qui doloribus. Nihil et voluptatem possimus autem ratione nesciunt vitae id quos aperiam. Aliquid!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id obcaecati autem recusandae aut laudantium quo qui doloribus. Nihil et voluptatem possimus autem ratione nesciunt vitae id quos aperiam. Aliquid!Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem id obcaecati autem recusandae aut laudantium quo qui doloribus. Nihil et voluptatem possimus autem ratione nesciunt', NULL, 11, 12, 1, '2020-10-15 14:41:39', '2020-10-17 12:03:45'),
(2, 'wqfwq', NULL, 1, 36, 0, '2021-06-03 09:52:06', '2021-06-03 09:52:06'),
(3, 'd', NULL, 1, 36, 0, '2021-06-03 09:52:10', '2021-06-03 09:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(3, 'events/AQRRiHpbg7MuDEZxUTmOfrRXWd6lXk71btbQQEAc.png', 'helloooo', 'asasasasasasasasasassasasasasasasasasas', '2021-06-10 02:46:06', '2021-06-10 02:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_06_163608_add_status_to_user_table', 1),
(5, '2020_09_08_171508_create_sessions_table', 1),
(6, '2020_09_08_175214_create_comments_table', 1),
(7, '2020_09_14_171048_create_chats_table', 1),
(8, '2020_09_21_161001_create_services_table', 2),
(9, '2020_09_21_162418_add_service_owner', 3),
(10, '2020_09_21_165054_create_research_table', 4),
(11, '2020_09_28_160707_create_assets_table', 5),
(12, '2020_09_28_163209_create_admin_services_table', 6),
(13, '2020_09_28_165008_create_markets_table', 7),
(15, '2019_05_03_000001_create_customer_columns', 8),
(16, '2019_05_03_000002_create_subscriptions_table', 8),
(17, '2019_05_03_000003_create_subscription_items_table', 8),
(18, '2020_10_03_182254_create_packages_table', 9),
(19, '2020_10_10_065625_create_cart_table', 10),
(22, '2020_10_13_171651_create_biddings_table', 11),
(23, '2020_10_15_155458_add_colum_bid', 12),
(24, '2020_10_16_061200_add_bidder_colum', 13),
(25, '2020_10_23_162348_create_orderdata_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orderdata`
--

CREATE TABLE `orderdata` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `paid_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `credit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=inprocess\r\n1=completed\r\n3=Cancelled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cloud Computing', 'klklklklklklk', 0, '2021-06-13 07:21:12', '2021-06-13 07:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` int(10) UNSIGNED NOT NULL,
  `researcher` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `product_name`, `price`, `description`, `file`, `provider`, `created_at`, `updated_at`) VALUES
(4, 'Trip', 5, 'afvs', 'image/services/feMxnl66vZRovHcROa68KARZmxP4xwDqBZId1KFS.jpeg', 12, '2020-10-15 11:08:14', '2020-10-15 11:08:14'),
(5, 'Troop', 4, 'afsd', 'image/services/uGROdbSR2mXQiIX4Z2LQkiNmiUVvFHcp0MnQqlML.jpeg', 12, '2020-10-15 11:08:25', '2020-10-15 11:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `userRole` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=admin, 3=seller',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0=pending, 1=approved, 2=rejected, 3=deleted',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `provider_id` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user`, `email`, `cnic`, `address`, `password`, `credit`, `userRole`, `created_at`, `updated_at`, `status`, `image`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `provider_id`, `avatar`, `facebook_id`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, NULL, '$2y$10$EPTAh.Za2E8w0eyK7FLXlOGe84d7wC8igKhAbdoxXENfLAEcnZyqa', NULL, '1', '2020-09-19 19:00:00', '2020-09-26 00:28:58', '1', 'user/BPOBM4IYJHZe5WdduSl74kMCbuUasLMnAqdf42qm.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'saad', 'sado', 'saad@gmail.com', NULL, NULL, '$2y$10$EPTAh.Za2E8w0eyK7FLXlOGe84d7wC8igKhAbdoxXENfLAEcnZyqa', 0, '3', '2020-10-15 11:05:03', '2020-10-15 11:06:29', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'muhammad moeez', 'leadsdev', '70067298@student.uol.edu.pk', '352322222222222', 'sdfghjtgrew', '$2y$10$EPTAh.Za2E8w0eyK7FLXlOGe84d7wC8igKhAbdoxXENfLAEcnZyqa', NULL, '2', '2020-10-17 04:42:33', '2021-03-23 03:12:04', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'mm', 'm123', 'mm@gmail.com', '6543', 'house', '$2y$10$EXzF0zfjc9db8MQ/8ygK1u/B/vZpIkTu3kzXFp8rZPTeEk4..uv/i', 0, '2', '2021-03-21 11:02:15', '2021-03-21 11:02:56', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'hello gee', 'hi', 'hahah1202@gmail.com', '323232323232323', 'asdawdsdsad', '$2y$10$TtUFo2bh/GlS3GLLFs1jhOyWaBszZ.PmomEUEAG/Etf/X.rx/40oG', 0, '3', '2021-03-21 12:56:58', '2021-03-24 13:06:07', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Ahmed Sohail', 'wanileco', 'ahmedsohail1075@gmail.com', '35202-3235684-2', 'wahdat road', '$2y$10$lGCwQHFi8gl8EnBK3NS46uk09UHUhA5Uy0PxZBThC7A6Dc89Uf7EC', 0, '3', '2021-03-23 03:30:07', '2021-03-23 03:30:35', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Ahmed Sohail', 'helloo', 'ahmedsohail10@gmail.com', '35202-3235684-2', 'wahdat road', '$2y$10$c1nmUG2K7qDFUDfy1W8Tgu3hGLESwOVfHhjdSUHhIKF8WmySuEjpO', 0, '3', '2021-03-23 05:04:41', '2021-03-23 05:04:41', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Expert writer', 'wexpert766@gmail.com', 'wexpert766@gmail.com', NULL, NULL, NULL, NULL, '3', '2021-03-24 13:12:04', '2021-03-24 13:12:04', '0', NULL, NULL, NULL, NULL, NULL, '107443111169092240888', 'https://lh4.googleusercontent.com/-9whngUSplf8/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnXtyMOtwN6WiwmqROEtuUyWG5LjA/s96-c/photo.jpg', NULL),
(30, 'Digital Innovation', 'digitalinnovation13@gmail.com', 'digitalinnovation13@gmail.com', NULL, NULL, NULL, NULL, '3', '2021-03-25 09:26:20', '2021-03-25 09:27:28', '1', NULL, NULL, NULL, NULL, NULL, '106498726420468907486', 'https://lh3.googleusercontent.com/a-/AOh14Ggwex8XOh6CEYeFCYnlUMeU_zp2ZyMFzjD1oduZ=s96-c', NULL),
(32, 'Waleed Matloob', 'liveprogramming619@gmail.com', 'liveprogramming619@gmail.com', NULL, NULL, NULL, NULL, '3', '2021-03-25 13:41:54', '2021-03-25 13:43:03', '1', NULL, NULL, NULL, NULL, NULL, '113428812567932652169', 'https://lh6.googleusercontent.com/-7-lzFiL8jpc/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucm5idXP_COin4gA_CrOXoz0xBZ22A/s96-c/photo.jpg', NULL),
(33, 'Waleed khan', 'waleed123', 'abc@gmail.com', '789k', 'kkk', '$2y$10$uM05dAhlU0PQuyf9XCVFye5VBMny6l6YJDlAwAkL.DVmM6g9RPBz.', 0, '3', '2021-03-25 13:46:06', '2021-03-28 10:19:03', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Software engineer', 'lo', 'Mma@gmail.com', '84676286', 'Ahhshs', '$2y$10$aPXkrdvUXJa/bDGICKDtW.iB8m2yq5zwt0WYhOzndXfY9OySaZGRW', 0, '3', '2021-03-28 10:08:10', '2021-03-28 10:08:44', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Muhammad Moeez', 'muhammadmoeez64@gmail.com', 'muhammadmoeez64@gmail.com', NULL, NULL, NULL, NULL, '3', '2021-03-28 10:09:09', '2021-03-28 10:09:09', '5', NULL, NULL, NULL, NULL, NULL, '103846596129071966079', 'https://lh3.googleusercontent.com/a-/AOh14GiGtHygGuJuAGWgc8DCl7jcGT8RFCa28i6bBanR-Q=s96-c', NULL),
(36, 'M Waleed', 'waleed1234', 'waleed@gmail.com', '1234567', 'abc', '$2y$10$JsdlBSkJSXg5I6Zouc5Nru7js1FkJP7Kf8mQyK16J.m9S/xY7.1wS', 0, '3', '2021-03-28 10:20:36', '2021-03-28 10:23:18', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Ahmed Sohail3', 'wanileco13', 'ahmedsohail107536@gmail.com', '35202-20555335-7', '10-S-15 B Bashir Street Wahdat Road3', '$2y$10$aKhQIaqi1KxWWV5TXcBi2ujBFJ8ECMnEIkzyQUFlROflcy9HYyNcy', NULL, '2', '2021-06-12 01:22:10', '2021-06-12 02:16:31', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_services`
--
ALTER TABLE `admin_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articals`
--
ALTER TABLE `articals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biddings`
--
ALTER TABLE `biddings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdata`
--
ALTER TABLE `orderdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  ADD KEY `subscription_items_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_unique` (`user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_services`
--
ALTER TABLE `admin_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articals`
--
ALTER TABLE `articals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biddings`
--
ALTER TABLE `biddings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orderdata`
--
ALTER TABLE `orderdata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
