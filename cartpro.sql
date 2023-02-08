-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2023 at 03:47 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `attribute_set_id` bigint UNSIGNED NOT NULL,
  `is_filterable` tinyint DEFAULT NULL,
  `is_active` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `slug`, `attribute_set_id`, `is_filterable`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'color', 10, 0, 1, '2022-04-15 17:09:15', '2022-08-28 04:41:48', NULL),
(2, 'ram', 5, 0, 1, '2022-04-26 06:18:02', '2022-04-27 05:53:30', NULL),
(3, 'size', 5, 1, 1, '2022-04-26 06:19:02', '2022-08-27 15:10:56', NULL),
(4, 'ssd', 5, 0, 1, '2022-04-26 08:01:37', '2022-08-29 05:38:51', NULL),
(26, 'test', 10, 0, 1, '2022-09-01 11:50:04', '2022-09-01 11:50:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_category`
--

CREATE TABLE `attribute_category` (
  `attribute_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attribute_category`
--

INSERT INTO `attribute_category` (`attribute_id`, `category_id`) VALUES
(2, 2),
(4, 2),
(2, 12),
(2, 13),
(3, 2),
(3, 12),
(3, 13),
(4, 12),
(1, 2),
(1, 12),
(1, 13),
(3, 6),
(4, 13),
(17, 38),
(26, 38);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_sets`
--

CREATE TABLE `attribute_sets` (
  `id` bigint UNSIGNED NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attribute_sets`
--

INSERT INTO `attribute_sets` (`id`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, '2022-04-15 14:59:52', '2022-04-15 15:10:36', '2022-04-15 15:10:36'),
(5, 1, '2022-04-15 16:58:16', '2022-08-28 04:41:19', NULL),
(6, 1, '2022-04-15 17:06:57', '2022-04-15 17:07:17', '2022-04-15 17:07:17'),
(7, 1, '2022-04-15 17:08:32', '2022-04-15 17:09:35', '2022-04-15 17:09:35'),
(8, 1, '2022-04-15 17:11:12', '2022-04-16 00:13:38', '2022-04-16 00:13:38'),
(9, 1, '2022-04-16 12:07:16', '2022-08-27 15:09:05', NULL),
(10, 1, '2022-04-16 12:07:26', '2022-08-27 15:08:47', NULL),
(12, 1, '2022-05-08 09:57:40', '2022-05-08 09:58:04', '2022-05-08 09:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_set_translations`
--

CREATE TABLE `attribute_set_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_set_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `attribute_set_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attribute_set_translations`
--

INSERT INTO `attribute_set_translations` (`id`, `attribute_set_id`, `locale`, `attribute_set_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'en', 'Hardware', '2022-04-15 14:59:52', '2022-04-15 15:10:36', '2022-04-15 15:10:36'),
(3, 3, 'bn', 'হার্ডওয়্যার', '2022-04-15 15:10:13', '2022-04-15 15:10:36', '2022-04-15 15:10:36'),
(4, 5, 'en', 'Hardware', '2022-04-15 16:58:16', '2022-04-15 17:06:44', NULL),
(5, 6, 'en', 'Hardware test', '2022-04-15 17:06:57', '2022-04-15 17:07:17', '2022-04-15 17:07:17'),
(6, 7, 'en', 'Hardware test', '2022-04-15 17:08:32', '2022-04-15 17:09:35', '2022-04-15 17:09:35'),
(7, 8, 'en', 'Hardware test', '2022-04-15 17:11:12', '2022-04-16 00:13:38', '2022-04-16 00:13:38'),
(8, 9, 'en', 'Camera', '2022-04-16 12:07:16', '2022-04-16 12:07:16', NULL),
(9, 10, 'en', 'Specification', '2022-04-16 12:07:26', '2022-04-16 12:07:26', NULL),
(11, 12, 'en', 'lkjklj', '2022-05-08 09:57:40', '2022-05-08 09:58:04', '2022-05-08 09:58:04'),
(12, 10, 'bn', 'স্পেসিফিকেশন', '2022-08-27 15:08:47', '2022-08-27 15:08:47', NULL),
(13, 9, 'bn', 'ক্যামেরা', '2022-08-27 15:09:05', '2022-08-27 15:09:05', NULL),
(14, 5, 'bn', 'হার্ডওয়্যার', '2022-08-27 15:09:25', '2022-08-27 15:09:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_translations`
--

CREATE TABLE `attribute_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `attribute_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attribute_translations`
--

INSERT INTO `attribute_translations` (`id`, `attribute_id`, `locale`, `attribute_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Color', '2022-04-15 17:09:15', '2022-04-15 17:09:15', NULL),
(2, 2, 'en', 'Ram', '2022-04-26 06:18:02', '2022-04-26 06:18:02', NULL),
(3, 3, 'en', 'Size', '2022-04-26 06:19:02', '2022-04-26 06:19:02', NULL),
(4, 4, 'en', 'SSD', '2022-04-26 08:01:37', '2022-08-29 05:38:51', NULL),
(5, 2, 'bn', 'র‍্যাম', NULL, NULL, NULL),
(6, 4, 'bn', 'এসএসডি', NULL, NULL, NULL),
(7, 3, 'bn', 'সাইজ', NULL, NULL, NULL),
(8, 1, 'bn', 'কালার', NULL, NULL, NULL),
(29, 26, 'en', 'Test', '2022-09-01 11:50:04', '2022-09-01 11:50:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `position` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `position`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, '2022-04-26 06:18:03', '2022-04-26 06:18:03'),
(3, 2, NULL, '2022-04-26 06:18:03', '2022-04-26 06:18:03'),
(4, 2, NULL, '2022-04-26 06:18:03', '2022-04-26 06:18:03'),
(5, 3, NULL, '2022-04-26 06:19:03', '2022-04-26 06:19:03'),
(6, 3, NULL, '2022-04-26 06:19:03', '2022-04-26 06:19:03'),
(7, 4, NULL, '2022-04-26 08:01:38', '2022-04-26 08:01:38'),
(8, 4, NULL, '2022-04-26 08:01:38', '2022-04-26 08:01:38'),
(9, 4, NULL, '2022-04-26 08:37:33', '2022-04-26 08:37:33'),
(10, 1, NULL, '2022-05-02 16:17:04', '2022-05-02 16:17:04'),
(11, 1, NULL, '2022-05-02 16:17:04', '2022-05-02 16:17:04'),
(12, 1, NULL, '2022-05-02 16:17:04', '2022-05-02 16:17:04'),
(13, 3, NULL, '2022-05-02 17:39:59', '2022-05-02 17:39:59'),
(14, 3, NULL, '2022-05-02 17:39:59', '2022-05-02 17:39:59'),
(15, 3, NULL, '2022-05-02 17:39:59', '2022-05-02 17:39:59'),
(16, 3, NULL, '2022-05-02 17:39:59', '2022-05-02 17:39:59'),
(26, 19, NULL, '2022-09-01 11:13:17', '2022-09-01 11:13:17'),
(32, 26, NULL, '2022-09-01 11:50:04', '2022-09-01 11:50:04'),
(33, 26, NULL, '2022-09-01 11:50:04', '2022-09-01 11:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value_translations`
--

CREATE TABLE `attribute_value_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `attribute_value_id` bigint UNSIGNED NOT NULL,
  `local` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attribute_value_translations`
--

INSERT INTO `attribute_value_translations` (`id`, `attribute_id`, `attribute_value_id`, `local`, `value_name`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'en', '2GB', '2022-04-26 06:18:03', '2022-04-26 06:18:03'),
(3, 2, 3, 'en', '4GB', '2022-04-26 06:18:03', '2022-04-26 06:18:03'),
(4, 2, 4, 'en', '8GB', '2022-04-26 06:18:03', '2022-04-26 06:18:03'),
(5, 3, 5, 'en', '14 inch', '2022-04-26 06:19:03', '2022-04-26 06:19:03'),
(6, 3, 6, 'en', '15 inch', '2022-04-26 06:19:03', '2022-04-26 06:19:03'),
(7, 4, 7, 'en', '124 GB', '2022-04-26 08:01:38', '2022-04-26 08:01:38'),
(8, 4, 8, 'en', '256 GB', '2022-04-26 08:01:38', '2022-04-26 08:01:38'),
(9, 4, 9, 'en', '500 GB', '2022-04-26 08:37:33', '2022-08-28 21:22:55'),
(10, 2, 2, 'bn', '২ জিবি', NULL, NULL),
(11, 2, 3, 'bn', '৪ জিবি', NULL, NULL),
(12, 2, 4, 'bn', '৮ জিবি', NULL, NULL),
(13, 1, 10, 'en', 'White', '2022-05-02 16:17:04', '2022-05-02 16:17:04'),
(14, 1, 11, 'en', 'Black', '2022-05-02 16:17:04', '2022-05-02 16:17:04'),
(15, 1, 12, 'en', 'Gray', '2022-05-02 16:17:04', '2022-05-02 16:17:04'),
(16, 3, 13, 'en', 'L', '2022-05-02 17:39:59', '2022-05-02 17:39:59'),
(17, 3, 14, 'en', 'M', '2022-05-02 17:39:59', '2022-05-02 17:39:59'),
(18, 3, 15, 'en', 'S', '2022-05-02 17:39:59', '2022-05-02 17:39:59'),
(19, 3, 16, 'en', 'XL', '2022-05-02 17:39:59', '2022-05-02 17:39:59'),
(20, 4, 7, 'bn', '124 GB', NULL, NULL),
(21, 4, 8, 'bn', '256 GB', NULL, NULL),
(22, 4, 9, 'bn', '500 GB', NULL, NULL),
(23, 3, 5, 'bn', '14 inch', NULL, NULL),
(24, 3, 6, 'bn', '15 inch', NULL, NULL),
(25, 3, 13, 'bn', 'L', NULL, NULL),
(26, 3, 14, 'bn', 'M', NULL, NULL),
(27, 3, 15, 'bn', 'S', NULL, NULL),
(28, 3, 16, 'bn', 'XL', NULL, NULL),
(29, 1, 10, 'bn', 'White', NULL, NULL),
(30, 1, 11, 'bn', 'Black', NULL, NULL),
(31, 1, 12, 'bn', 'Gray', NULL, NULL),
(41, 26, 32, 'en', 'Test 1', '2022-09-01 11:50:04', '2022-09-01 11:50:04'),
(42, 26, 33, 'en', 'Test 2', '2022-09-01 11:50:04', '2022-09-01 11:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_active` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `slug`, `brand_logo`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'samsung', 'images/brands/Tz5Z9TTu92.webp', 1, '2022-02-12 23:43:32', '2022-02-12 23:43:32'),
(2, 'iphone', 'images/brands/wINkFmoWSz.png', 1, '2022-02-13 01:16:17', '2022-02-13 01:16:17'),
(3, 'oneplus', 'images/brands/6mahGTkLEA.png', 1, '2022-02-13 01:43:27', '2022-02-13 01:43:27'),
(4, 'asus', 'images/brands/IYD2AmX929.png', 1, '2022-02-14 05:20:10', '2022-02-14 05:20:10'),
(6, 'macbook', 'images/brands/HKwCvZdvUH.jpg', 1, '2022-02-14 23:32:19', '2022-02-14 23:32:19'),
(7, 'lg', 'images/brands/ntKHCu8jVB.png', 1, '2022-02-20 03:38:46', '2022-05-08 09:28:29'),
(8, 'sony', 'images/brands/Q70VGBwFGS.jpg', 1, '2022-02-20 04:10:53', '2022-05-08 09:28:29'),
(9, 'canon', 'images/brands/rXk6Gw1MWl.jpg', 1, '2022-02-22 01:07:51', '2022-06-05 04:48:57'),
(10, 'fujifilm', 'images/brands/kwYagkVGzn.jpg', 0, '2022-02-22 01:21:51', '2022-05-08 09:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `brand_translations`
--

CREATE TABLE `brand_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `local` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand_translations`
--

INSERT INTO `brand_translations` (`id`, `brand_id`, `local`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Samsung', '2022-02-12 23:43:32', '2022-02-12 23:43:32'),
(2, 2, 'en', 'iPhone', '2022-02-13 01:16:17', '2022-02-13 01:16:17'),
(3, 3, 'en', 'OnePlus', '2022-02-13 01:43:27', '2022-02-13 01:43:27'),
(4, 4, 'en', 'ASUS', '2022-02-14 05:20:10', '2022-02-14 05:20:10'),
(6, 6, 'en', 'Macbook', '2022-02-14 23:32:20', '2022-02-14 23:32:20'),
(7, 7, 'en', 'LG', '2022-02-20 03:38:47', '2022-02-20 03:38:47'),
(8, 8, 'en', 'Sony', '2022-02-20 04:10:53', '2022-02-20 04:10:53'),
(9, 9, 'en', 'Canon', '2022-02-22 01:07:51', '2022-02-22 01:07:51'),
(10, 10, 'en', 'Fujifilm', '2022-02-22 01:21:51', '2022-02-22 01:21:51'),
(11, 9, 'de', 'Kanon', NULL, NULL),
(12, 10, 'bn', 'ফুজিফিল্ম', NULL, NULL),
(13, 9, 'bn', 'ক্যানন', NULL, NULL),
(14, 8, 'bn', 'সনি', NULL, NULL),
(15, 7, 'bn', 'এলজি', NULL, NULL),
(16, 6, 'bn', 'ম্যাকবুক', NULL, NULL),
(17, 4, 'bn', 'আসস', NULL, NULL),
(18, 3, 'bn', 'ওয়ান প্লাস', NULL, NULL),
(19, 2, 'bn', 'আইফোন', NULL, NULL),
(20, 1, 'bn', 'স্যামসাং', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `top` int DEFAULT '0',
  `is_active` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `parent_id`, `image`, `icon`, `top`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mobile', NULL, 'images/categories/LQUANnpB58.png', 'las la-mobile', 1, 1, '2022-02-12 23:38:41', '2022-10-04 07:29:27', NULL),
(2, 'computer-accessories', NULL, 'images/categories/DvCxbcTtyF.png', 'las la-desktop', 1, 1, '2022-02-13 03:27:02', '2022-10-04 06:56:46', NULL),
(3, 'television', NULL, 'images/categories/ypdIDYqXwu.png', 'las la-tv', 1, 1, '2022-02-13 03:34:39', '2022-03-24 14:05:39', NULL),
(4, 'watch', NULL, 'images/categories/V3avktsIxq.jpg', 'las la-clock', 1, 1, '2022-02-14 00:27:58', '2022-03-19 23:10:45', NULL),
(5, 'headphone', NULL, 'images/categories/XrVPQksQey.png', 'las la-headphones', 1, 1, '2022-02-14 00:37:23', '2022-03-19 23:18:02', NULL),
(6, 'clothes', NULL, 'images/categories/HZXLvV3Itt.jpg', 'las la-tshirt', 1, 1, '2022-02-14 00:50:24', '2022-03-19 23:28:59', NULL),
(7, 'shoes', NULL, 'images/categories/W8aentkzuv.jpg', 'las la-shoe-prints', 1, 1, '2022-02-14 01:36:13', '2022-03-19 23:29:35', NULL),
(8, 'furniture', NULL, 'images/categories/TEtAMta36u.jpg', 'las la-couch', 1, 1, '2022-02-14 02:03:17', '2022-03-19 23:30:14', NULL),
(9, 'android', 1, 'images/categories/GL500q94w8.png', NULL, 1, 1, '2022-02-14 02:09:17', '2022-02-14 02:15:12', NULL),
(10, 'iphone', 1, 'images/categories/m7HodRuLNT.jpg', NULL, 1, 1, '2022-02-14 02:27:43', '2022-03-02 03:37:24', NULL),
(11, 'featured-phone', 1, 'images/categories/dAb7jF7Vgo.png', NULL, 1, 1, '2022-02-14 03:11:50', '2022-02-14 03:12:38', NULL),
(12, 'desktop', 2, 'images/categories/Q6IozrjfVZ.png', NULL, 0, 1, '2022-02-14 05:03:29', '2022-03-02 03:35:08', NULL),
(13, 'laptop', 2, 'images/categories/1wsyq0n63O.jpg', NULL, 1, 1, '2022-02-14 05:04:12', '2022-02-14 05:04:40', NULL),
(14, 'camera-&-photo', NULL, 'images/categories/bwznVNPEDn.jpg', 'las la-photo-video', 1, 1, '2022-02-22 00:47:13', '2022-02-22 00:47:13', NULL),
(15, 'tablet', NULL, 'images/categories/wgUPDcKBP8.png', 'las la-tablet', 1, 1, '2022-02-22 02:30:23', '2022-06-22 06:34:12', NULL),
(16, 'test', NULL, 'images/categories/f8lUcgGfL1.webp', 'las', 0, 1, '2022-04-20 01:02:20', '2022-04-20 01:20:59', '2022-04-20 01:20:59'),
(18, 'test', NULL, 'images/categories/blyFlww31G.webp', 'fdf', 0, 1, '2022-04-20 01:21:32', '2022-04-20 01:21:53', '2022-04-20 01:21:53'),
(19, 'test', NULL, 'images/categories/hM9Ik653QU.webp', 'test', 0, 1, '2022-04-20 01:24:41', '2022-04-20 01:25:04', '2022-04-20 01:25:04'),
(20, 'বিভাগ-নাম-1', NULL, 'images/categories/kimBWIJmTI.webp', NULL, 0, 1, '2022-04-20 01:57:49', '2022-04-20 02:51:03', '2022-04-20 02:51:03'),
(21, 'বিভাগ-নাম-2', NULL, 'images/categories/ehAyjSQu7E.webp', NULL, 0, 1, '2022-04-20 01:58:11', '2022-04-20 02:51:03', '2022-04-20 02:51:03'),
(22, 'বিভাগ-নাম-3', NULL, 'images/categories/tlC0e78Ihs.webp', NULL, 0, 1, '2022-04-20 01:58:30', '2022-04-20 02:51:03', '2022-04-20 02:51:03'),
(23, 'test-00', NULL, NULL, NULL, 0, 1, '2022-04-20 03:25:35', '2022-04-20 03:51:50', '2022-04-20 03:51:50'),
(24, 'test', NULL, NULL, 'test', 1, 1, '2022-04-21 00:00:20', '2022-04-21 00:03:25', '2022-04-21 00:03:25'),
(25, 'test', NULL, NULL, 'gdfg', 0, 1, '2022-04-22 13:39:53', '2022-04-22 19:44:40', '2022-04-22 19:44:40'),
(26, 'test-2', NULL, NULL, 'ffsdfd', 0, 1, '2022-04-22 19:44:57', '2022-04-22 20:12:14', '2022-04-22 20:12:14'),
(27, 'cczsddscsdcs', NULL, NULL, NULL, 0, 0, '2022-05-08 08:00:50', '2022-05-08 08:00:57', '2022-05-08 08:00:57'),
(28, 'men\'s-clothes', 6, NULL, NULL, 0, 1, '2022-06-23 08:52:53', '2022-06-23 08:52:53', NULL),
(29, 'women\'s-clothes', 6, 'images/categories/HlCQsGbKE5.jpg', NULL, 0, 1, '2022-06-23 08:53:08', '2022-09-21 09:37:51', NULL),
(30, 'child-clothes', 6, 'images/categories/UPufdZ8AWM.jpg', NULL, 1, 1, '2022-06-23 08:54:33', '2022-09-21 09:37:00', NULL),
(31, 't-shirt', 28, 'images/categories/aoRtJBQ6cX.jpg', NULL, 0, 1, '2022-06-23 08:55:33', '2022-09-21 09:36:22', NULL),
(32, 'pants', 28, 'images/categories/SUQY23O6Hz.webp', NULL, 0, 1, '2022-06-23 08:56:05', '2022-09-21 09:35:55', NULL),
(33, 'symbian', 1, 'images/categories/GhxberwBBd.jpg', NULL, 0, 1, '2022-06-27 04:13:22', '2022-09-21 09:34:54', NULL),
(34, 'ram', 2, 'images/categories/jgA7sD2WNd.webp', NULL, 0, 1, '2022-06-27 05:37:39', '2022-09-21 09:34:19', NULL),
(35, 'ssd', 2, 'images/categories/vF4HyiQW6X.jpg', NULL, 0, 1, '2022-06-27 05:38:14', '2022-09-21 09:33:34', NULL),
(36, 'motherboard', 2, 'images/categories/DM5JO5nozD.jpg', NULL, 0, 1, '2022-06-27 05:38:31', '2022-09-21 09:32:43', NULL),
(37, 'keyboard', 2, 'images/categories/bJrfHpoVck.jpg', NULL, 0, 1, '2022-06-27 05:41:25', '2022-09-21 10:56:41', NULL),
(38, 'microphone', 2, 'images/categories/tWx8MfOpzb.jpg', NULL, 0, 1, '2022-06-27 05:41:47', '2022-10-04 06:53:36', NULL),
(39, 'charger', 2, NULL, NULL, 0, 0, '2022-06-27 05:42:06', '2022-08-28 04:43:06', NULL),
(40, 'cat-cable', 2, NULL, NULL, 0, 0, '2022-06-27 05:42:19', '2022-08-27 06:57:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `category_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 1),
(1, 2),
(2, 8),
(13, 8),
(2, 9),
(13, 9),
(2, 10),
(13, 10),
(2, 11),
(13, 11),
(2, 12),
(13, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(5, 18),
(5, 19),
(5, 20),
(5, 21),
(5, 22),
(4, 23),
(4, 24),
(4, 25),
(14, 26),
(14, 27),
(14, 28),
(7, 29),
(7, 30),
(7, 31),
(15, 32),
(4, 33),
(2, 34),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(6, 43),
(7, 43),
(8, 43),
(9, 43),
(12, 43),
(13, 43),
(14, 43),
(15, 43),
(3, 44),
(4, 44),
(6, 44),
(10, 44),
(15, 44),
(1, 47),
(1, 48),
(9, 48),
(1, 51),
(6, 49),
(2, 50),
(6, 52),
(8, 53),
(1, 54),
(40, 55),
(38, 56),
(38, 57),
(38, 58),
(38, 59);

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `local` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `local`, `category_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Mobile', '2022-02-12 23:38:41', '2022-02-12 23:38:41', NULL),
(2, 2, 'en', 'Computer Accessories', '2022-02-13 03:27:02', '2022-02-13 03:27:02', NULL),
(3, 3, 'en', 'Television', '2022-02-13 03:34:39', '2022-02-13 03:34:39', NULL),
(4, 4, 'en', 'Watch', '2022-02-14 00:27:58', '2022-02-14 00:27:58', NULL),
(5, 5, 'en', 'Headphone', '2022-02-14 00:37:23', '2022-02-14 00:37:23', NULL),
(6, 6, 'en', 'Clothes', '2022-02-14 00:50:24', '2022-02-14 00:50:24', NULL),
(7, 7, 'en', 'Shoes', '2022-02-14 01:36:13', '2022-02-14 01:36:13', NULL),
(8, 8, 'en', 'Furniture', '2022-02-14 02:03:17', '2022-02-14 02:03:17', NULL),
(9, 9, 'en', 'Android', '2022-02-14 02:09:17', '2022-02-14 02:09:17', NULL),
(10, 10, 'en', 'iPhone', '2022-02-14 02:27:43', '2022-02-14 02:27:43', NULL),
(11, 11, 'en', 'Featured Phone', '2022-02-14 03:11:50', '2022-02-14 03:11:50', NULL),
(12, 12, 'en', 'Desktop', '2022-02-14 05:03:29', '2022-02-14 05:03:29', NULL),
(13, 13, 'en', 'Laptop', '2022-02-14 05:04:12', '2022-02-14 05:04:12', NULL),
(14, 14, 'en', 'Camera & Photo', '2022-02-22 00:47:13', '2022-02-22 00:47:13', NULL),
(15, 15, 'en', 'Tablet', '2022-02-22 02:30:23', '2022-02-22 02:30:23', NULL),
(16, 15, 'de', 'Tablette', NULL, NULL, NULL),
(17, 15, 'es', 'Tableta', NULL, NULL, NULL),
(18, 15, 'bn', 'ট্যাবলেট', NULL, NULL, NULL),
(19, 14, 'de', 'Kamera & Foto', NULL, NULL, NULL),
(20, 13, 'de', 'Laptop', NULL, NULL, NULL),
(21, 12, 'de', 'Schreibtisch', NULL, NULL, NULL),
(22, 11, 'de', 'Feature-Telefon', NULL, NULL, NULL),
(23, 10, 'de', 'IPhone', NULL, NULL, NULL),
(24, 9, 'de', 'Android', NULL, NULL, NULL),
(25, 8, 'de', 'Möbel', NULL, NULL, NULL),
(26, 7, 'de', 'Schuhe', NULL, NULL, NULL),
(27, 6, 'de', 'Kleider', NULL, NULL, NULL),
(28, 5, 'de', 'Kopfhörer', NULL, NULL, NULL),
(29, 4, 'de', 'Uhr', NULL, NULL, NULL),
(30, 3, 'de', 'Fernsehen', NULL, NULL, NULL),
(31, 2, 'de', 'Computer & Zubehör', NULL, NULL, NULL),
(32, 1, 'de', 'Handy, Mobiltelefon', NULL, NULL, NULL),
(33, 14, 'es', 'Cámara y foto', NULL, NULL, NULL),
(34, 13, 'es', 'Ordenador portátil', NULL, NULL, NULL),
(35, 12, 'es', 'Escritorio', NULL, NULL, NULL),
(36, 11, 'es', 'Teléfono destacado', NULL, NULL, NULL),
(37, 9, 'es', 'Androide', NULL, NULL, NULL),
(38, 8, 'es', 'Mueble', NULL, NULL, NULL),
(39, 7, 'es', 'Zapatos', NULL, NULL, NULL),
(40, 6, 'es', 'Ropa', NULL, NULL, NULL),
(41, 5, 'es', 'Auricular', NULL, NULL, NULL),
(42, 4, 'es', 'Reloj', NULL, NULL, NULL),
(43, 3, 'es', 'Televisión_test', NULL, NULL, NULL),
(44, 2, 'es', 'Computadoras y accesorios', NULL, NULL, NULL),
(45, 1, 'es', 'Móvil', NULL, NULL, NULL),
(46, 14, 'bn', 'ক্যামেরা এবং ছবি', NULL, NULL, NULL),
(47, 13, 'bn', 'ল্যাপটপ', NULL, NULL, NULL),
(48, 12, 'bn', 'ডেস্কটপ', NULL, NULL, NULL),
(49, 11, 'bn', 'বৈশিষ্ট্য ফোন', NULL, NULL, NULL),
(50, 10, 'bn', 'আইফোন', NULL, NULL, NULL),
(51, 9, 'bn', 'এন্ড্রয়েড', NULL, NULL, NULL),
(52, 8, 'bn', 'ফার্ণিচার', NULL, NULL, NULL),
(53, 7, 'bn', 'জুতা', NULL, NULL, NULL),
(54, 6, 'bn', 'কাপড়', NULL, NULL, NULL),
(55, 5, 'bn', 'হেডফোন', NULL, NULL, NULL),
(56, 4, 'bn', 'ঘড়ি', NULL, NULL, NULL),
(57, 3, 'bn', 'টেলিভিশন', NULL, NULL, NULL),
(58, 2, 'bn', 'কম্পিউটার এবং আনুষাঙ্গিক', NULL, NULL, NULL),
(59, 1, 'bn', 'মোবাইল', NULL, NULL, NULL),
(62, 18, 'en', 'Test', '2022-04-20 01:21:32', '2022-04-20 01:21:53', '2022-04-20 01:21:53'),
(63, 19, 'en', 'Test', '2022-04-20 01:24:41', '2022-04-20 01:25:04', '2022-04-20 01:25:04'),
(64, 20, 'en', 'Test 1', '2022-04-20 01:57:49', '2022-04-20 02:51:03', '2022-04-20 02:51:03'),
(65, 21, 'en', 'Test 2', '2022-04-20 01:58:12', '2022-04-20 02:51:03', '2022-04-20 02:51:03'),
(66, 22, 'en', 'Test 3', '2022-04-20 01:58:30', '2022-04-20 02:51:03', '2022-04-20 02:51:03'),
(67, 22, 'bn', 'বিভাগ নাম 3', NULL, '2022-04-20 02:51:03', '2022-04-20 02:51:03'),
(68, 21, 'bn', 'বিভাগ নাম 2', NULL, '2022-04-20 02:51:03', '2022-04-20 02:51:03'),
(69, 20, 'bn', 'বিভাগ নাম 1', NULL, '2022-04-20 02:51:03', '2022-04-20 02:51:03'),
(70, 23, 'en', 'Test 00', '2022-04-20 03:25:36', '2022-04-20 03:28:01', '2022-04-20 03:28:01'),
(71, 24, 'en', 'test', '2022-04-21 00:00:20', '2022-04-21 00:03:25', '2022-04-21 00:03:25'),
(72, 25, 'en', 'test', '2022-04-22 13:39:53', '2022-04-22 19:44:40', '2022-04-22 19:44:40'),
(73, 26, 'en', 'test 2', '2022-04-22 19:44:57', '2022-04-22 20:12:15', '2022-04-22 20:12:15'),
(74, 27, 'en', 'cczsddscsdcs', '2022-05-08 08:00:50', '2022-05-08 08:00:57', '2022-05-08 08:00:57'),
(75, 28, 'en', 'Men\'s Clothes', '2022-06-23 08:52:53', '2022-06-23 08:52:53', NULL),
(76, 29, 'en', 'Women\'s Clothes', '2022-06-23 08:53:08', '2022-06-23 08:53:08', NULL),
(77, 30, 'en', 'Child Clothes', '2022-06-23 08:54:33', '2022-06-23 08:54:33', NULL),
(78, 31, 'en', 'T-Shirt', '2022-06-23 08:55:33', '2022-06-23 08:55:33', NULL),
(79, 32, 'en', 'Pants', '2022-06-23 08:56:05', '2022-06-23 08:56:05', NULL),
(80, 33, 'en', 'Symbian', '2022-06-27 04:13:22', '2022-06-27 04:13:22', NULL),
(81, 34, 'en', 'Ram', '2022-06-27 05:37:39', '2022-06-27 05:37:39', NULL),
(82, 35, 'en', 'SSD', '2022-06-27 05:38:14', '2022-06-27 05:38:14', NULL),
(83, 36, 'en', 'Motherboard', '2022-06-27 05:38:31', '2022-06-27 05:38:31', NULL),
(84, 37, 'en', 'Keyboard', '2022-06-27 05:41:25', '2022-06-27 05:41:25', NULL),
(85, 38, 'en', 'Microphone', '2022-06-27 05:41:47', '2022-06-27 05:41:47', NULL),
(86, 39, 'en', 'Charger', '2022-06-27 05:42:06', '2022-06-27 05:42:06', NULL),
(87, 40, 'en', 'Cat Cable', '2022-06-27 05:42:19', '2022-06-27 05:42:19', NULL),
(88, 41, 'en', 'Fahim', '2022-09-21 10:43:00', '2022-09-21 10:57:44', '2022-09-21 10:57:44'),
(89, 42, 'en', 'Test', '2022-11-12 06:51:27', '2022-11-12 06:51:35', '2022-11-12 06:51:35'),
(90, 43, 'en', 'Test', '2022-11-12 06:52:24', '2022-11-12 06:55:12', '2022-11-12 06:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `color_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `color_code`, `created_at`, `updated_at`) VALUES
(1, 'Blue', '#0071df', NULL, '2021-10-28 00:20:56'),
(2, 'Black', '#000000', '2021-10-27 23:33:06', '2021-10-27 23:33:06'),
(3, 'Red', '#FF0000', '2021-10-27 23:36:22', '2021-10-28 00:19:45'),
(4, 'Yellow', '#ffff00', '2021-10-28 20:33:18', '2021-10-28 20:33:18'),
(5, 'Test', '#b0b04d', '2021-10-28 20:33:41', '2021-10-28 20:33:41'),
(6, 'Green', '#00ff00', '2021-10-28 20:33:58', '2021-10-28 20:33:58'),
(7, 'Orange', '#ffa500', '2021-10-28 20:34:12', '2021-10-28 20:34:12'),
(8, 'Pink', '#ffc0cb', '2021-10-28 20:34:24', '2021-10-28 20:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `country_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'US', 'United States', NULL, NULL, NULL),
(2, 'CA', 'Canada', NULL, NULL, NULL),
(3, 'AF', 'Afghanistan', NULL, NULL, NULL),
(4, 'AL', 'Albania', NULL, NULL, NULL),
(5, 'DZ', 'Algeria', NULL, NULL, NULL),
(6, 'DS', 'American Samoa', NULL, NULL, NULL),
(7, 'AD', 'Andorra', NULL, NULL, NULL),
(8, 'AO', 'Angola', NULL, NULL, NULL),
(9, 'AI', 'Anguilla', NULL, NULL, NULL),
(10, 'AQ', 'Antarctica', NULL, NULL, NULL),
(11, 'AG', 'Antigua and/or Barbuda', NULL, NULL, NULL),
(12, 'AR', 'Argentina', NULL, NULL, NULL),
(13, 'AM', 'Armenia', NULL, NULL, NULL),
(14, 'AW', 'Aruba', NULL, NULL, NULL),
(15, 'AU', 'Australia', NULL, NULL, NULL),
(16, 'AT', 'Austria', NULL, NULL, NULL),
(17, 'AZ', 'Azerbaijan', NULL, NULL, NULL),
(18, 'BS', 'Bahamas', NULL, NULL, NULL),
(19, 'BH', 'Bahrain', NULL, NULL, NULL),
(20, 'BD', 'Bangladesh', NULL, NULL, NULL),
(21, 'BB', 'Barbados', NULL, NULL, NULL),
(22, 'BY', 'Belarus', NULL, NULL, NULL),
(23, 'BE', 'Belgium', NULL, NULL, NULL),
(24, 'BZ', 'Belize', NULL, NULL, NULL),
(25, 'BJ', 'Benin', NULL, NULL, NULL),
(26, 'BM', 'Bermuda', NULL, NULL, NULL),
(27, 'BT', 'Bhutan', NULL, NULL, NULL),
(28, 'BO', 'Bolivia', NULL, NULL, NULL),
(29, 'BA', 'Bosnia and Herzegovina', NULL, NULL, NULL),
(30, 'BW', 'Botswana', NULL, NULL, NULL),
(31, 'BV', 'Bouvet Island', NULL, NULL, NULL),
(32, 'BR', 'Brazil', NULL, NULL, NULL),
(33, 'IO', 'British lndian Ocean Territory', NULL, NULL, NULL),
(34, 'BN', 'Brunei Darussalam', NULL, NULL, NULL),
(35, 'BG', 'Bulgaria', NULL, NULL, NULL),
(36, 'BF', 'Burkina Faso', NULL, NULL, NULL),
(37, 'BI', 'Burundi', NULL, NULL, NULL),
(38, 'KH', 'Cambodia', NULL, NULL, NULL),
(39, 'CM', 'Cameroon', NULL, NULL, NULL),
(40, 'CV', 'Cape Verde', NULL, NULL, NULL),
(41, 'KY', 'Cayman Islands', NULL, NULL, NULL),
(42, 'CF', 'Central African Republic', NULL, NULL, NULL),
(43, 'TD', 'Chad', NULL, NULL, NULL),
(44, 'CL', 'Chile', NULL, NULL, NULL),
(45, 'CN', 'China', NULL, NULL, NULL),
(46, 'CX', 'Christmas Island', NULL, NULL, NULL),
(47, 'CC', 'Cocos (Keeling) Islands', NULL, NULL, NULL),
(48, 'CO', 'Colombia', NULL, NULL, NULL),
(49, 'KM', 'Comoros', NULL, NULL, NULL),
(50, 'CG', 'Congo', NULL, NULL, NULL),
(51, 'CK', 'Cook Islands', NULL, NULL, NULL),
(52, 'CR', 'Costa Rica', NULL, NULL, NULL),
(53, 'HR', 'Croatia (Hrvatska)', NULL, NULL, NULL),
(54, 'CU', 'Cuba', NULL, NULL, NULL),
(55, 'CY', 'Cyprus', NULL, NULL, NULL),
(56, 'CZ', 'Czech Republic', NULL, NULL, NULL),
(57, 'DK', 'Denmark', NULL, NULL, NULL),
(58, 'DJ', 'Djibouti', NULL, NULL, NULL),
(59, 'DM', 'Dominica', NULL, NULL, NULL),
(60, 'DO', 'Dominican Republic', NULL, NULL, NULL),
(61, 'TP', 'East Timor', NULL, NULL, NULL),
(62, 'EC', 'Ecudaor', NULL, NULL, NULL),
(63, 'EG', 'Egypt', NULL, NULL, NULL),
(64, 'SV', 'El Salvador', NULL, NULL, NULL),
(65, 'GQ', 'Equatorial Guinea', NULL, NULL, NULL),
(66, 'ER', 'Eritrea', NULL, NULL, NULL),
(67, 'EE', 'Estonia', NULL, NULL, NULL),
(68, 'ET', 'Ethiopia', NULL, NULL, NULL),
(69, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL, NULL),
(70, 'FO', 'Faroe Islands', NULL, NULL, NULL),
(71, 'FJ', 'Fiji', NULL, NULL, NULL),
(72, 'FI', 'Finland', NULL, NULL, NULL),
(73, 'FR', 'France', NULL, NULL, NULL),
(74, 'FX', 'France, Metropolitan', NULL, NULL, NULL),
(75, 'GF', 'French Guiana', NULL, NULL, NULL),
(76, 'PF', 'French Polynesia', NULL, NULL, NULL),
(77, 'TF', 'French Southern Territories', NULL, NULL, NULL),
(78, 'GA', 'Gabon', NULL, NULL, NULL),
(79, 'GM', 'Gambia', NULL, NULL, NULL),
(80, 'GE', 'Georgia', NULL, NULL, NULL),
(81, 'DE', 'Germany', NULL, NULL, NULL),
(82, 'GH', 'Ghana', NULL, NULL, NULL),
(83, 'GI', 'Gibraltar', NULL, NULL, NULL),
(84, 'GR', 'Greece', NULL, NULL, NULL),
(85, 'GL', 'Greenland', NULL, NULL, NULL),
(86, 'GD', 'Grenada', NULL, NULL, NULL),
(87, 'GP', 'Guadeloupe', NULL, NULL, NULL),
(88, 'GU', 'Guam', NULL, NULL, NULL),
(89, 'GT', 'Guatemala', NULL, NULL, NULL),
(90, 'GN', 'Guinea', NULL, NULL, NULL),
(91, 'GW', 'Guinea-Bissau', NULL, NULL, NULL),
(92, 'GY', 'Guyana', NULL, NULL, NULL),
(93, 'HT', 'Haiti', NULL, NULL, NULL),
(94, 'HM', 'Heard and Mc Donald Islands', NULL, NULL, NULL),
(95, 'HN', 'Honduras', NULL, NULL, NULL),
(96, 'HK', 'Hong Kong', NULL, NULL, NULL),
(97, 'HU', 'Hungary', NULL, NULL, NULL),
(98, 'IS', 'Iceland', NULL, NULL, NULL),
(99, 'IN', 'India', NULL, NULL, NULL),
(100, 'ID', 'Indonesia', NULL, NULL, NULL),
(101, 'IR', 'Iran (Islamic Republic of)', NULL, NULL, NULL),
(102, 'IQ', 'Iraq', NULL, NULL, NULL),
(103, 'IE', 'Ireland', NULL, NULL, NULL),
(104, 'IL', 'Israel', NULL, NULL, NULL),
(105, 'IT', 'Italy', NULL, NULL, NULL),
(106, 'CI', 'Ivory Coast', NULL, NULL, NULL),
(107, 'JM', 'Jamaica', NULL, NULL, NULL),
(108, 'JP', 'Japan', NULL, NULL, NULL),
(109, 'JO', 'Jordan', NULL, NULL, NULL),
(110, 'KZ', 'Kazakhstan', NULL, NULL, NULL),
(111, 'KE', 'Kenya', NULL, NULL, NULL),
(112, 'KI', 'Kiribati', NULL, NULL, NULL),
(113, 'KP', 'Korea, Democratic People\'s Republic of', NULL, NULL, NULL),
(114, 'KR', 'Korea, Republic of', NULL, NULL, NULL),
(115, 'KW', 'Kuwait', NULL, NULL, NULL),
(116, 'KG', 'Kyrgyzstan', NULL, NULL, NULL),
(117, 'LA', 'Lao People\'s Democratic Republic', NULL, NULL, NULL),
(118, 'LV', 'Latvia', NULL, NULL, NULL),
(119, 'LB', 'Lebanon', NULL, NULL, NULL),
(120, 'LS', 'Lesotho', NULL, NULL, NULL),
(121, 'LR', 'Liberia', NULL, NULL, NULL),
(122, 'LY', 'Libyan Arab Jamahiriya', NULL, NULL, NULL),
(123, 'LI', 'Liechtenstein', NULL, NULL, NULL),
(124, 'LT', 'Lithuania', NULL, NULL, NULL),
(125, 'LU', 'Luxembourg', NULL, NULL, NULL),
(126, 'MO', 'Macau', NULL, NULL, NULL),
(127, 'MK', 'Macedonia', NULL, NULL, NULL),
(128, 'MG', 'Madagascar', NULL, NULL, NULL),
(129, 'MW', 'Malawi', NULL, NULL, NULL),
(130, 'MY', 'Malaysia', NULL, NULL, NULL),
(131, 'MV', 'Maldives', NULL, NULL, NULL),
(132, 'ML', 'Mali', NULL, NULL, NULL),
(133, 'MT', 'Malta', NULL, NULL, NULL),
(134, 'MH', 'Marshall Islands', NULL, NULL, NULL),
(135, 'MQ', 'Martinique', NULL, NULL, NULL),
(136, 'MR', 'Mauritania', NULL, NULL, NULL),
(137, 'MU', 'Mauritius', NULL, NULL, NULL),
(138, 'TY', 'Mayotte', NULL, NULL, NULL),
(139, 'MX', 'Mexico', NULL, NULL, NULL),
(140, 'FM', 'Micronesia, Federated States of', NULL, NULL, NULL),
(141, 'MD', 'Moldova, Republic of', NULL, NULL, NULL),
(142, 'MC', 'Monaco', NULL, NULL, NULL),
(143, 'MN', 'Mongolia', NULL, NULL, NULL),
(144, 'MS', 'Montserrat', NULL, NULL, NULL),
(145, 'MA', 'Morocco', NULL, NULL, NULL),
(146, 'MZ', 'Mozambique', NULL, NULL, NULL),
(147, 'MM', 'Myanmar', NULL, NULL, NULL),
(148, 'NA', 'Namibia', NULL, NULL, NULL),
(149, 'NR', 'Nauru', NULL, NULL, NULL),
(150, 'NP', 'Nepal', NULL, NULL, NULL),
(151, 'NL', 'Netherlands', NULL, NULL, NULL),
(152, 'AN', 'Netherlands Antilles', NULL, NULL, NULL),
(153, 'NC', 'New Caledonia', NULL, NULL, NULL),
(154, 'NZ', 'New Zealand', NULL, NULL, NULL),
(155, 'NI', 'Nicaragua', NULL, NULL, NULL),
(156, 'NE', 'Niger', NULL, NULL, NULL),
(157, 'NG', 'Nigeria', NULL, NULL, NULL),
(158, 'NU', 'Niue', NULL, NULL, NULL),
(159, 'NF', 'Norfork Island', NULL, NULL, NULL),
(160, 'MP', 'Northern Mariana Islands', NULL, NULL, NULL),
(161, 'NO', 'Norway', NULL, NULL, NULL),
(162, 'OM', 'Oman', NULL, NULL, NULL),
(163, 'PK', 'Pakistan', NULL, NULL, NULL),
(164, 'PW', 'Palau', NULL, NULL, NULL),
(165, 'PA', 'Panama', NULL, NULL, NULL),
(166, 'PG', 'Papua New Guinea', NULL, NULL, NULL),
(167, 'PY', 'Paraguay', NULL, NULL, NULL),
(168, 'PE', 'Peru', NULL, NULL, NULL),
(169, 'PH', 'Philippines', NULL, NULL, NULL),
(170, 'PN', 'Pitcairn', NULL, NULL, NULL),
(171, 'PL', 'Poland', NULL, NULL, NULL),
(172, 'PT', 'Portugal', NULL, NULL, NULL),
(173, 'PR', 'Puerto Rico', NULL, NULL, NULL),
(174, 'QA', 'Qatar', NULL, NULL, NULL),
(175, 'RE', 'Reunion', NULL, NULL, NULL),
(176, 'RO', 'Romania', NULL, NULL, NULL),
(177, 'RU', 'Russian Federation', NULL, NULL, NULL),
(178, 'RW', 'Rwanda', NULL, NULL, NULL),
(179, 'KN', 'Saint Kitts and Nevis', NULL, NULL, NULL),
(180, 'LC', 'Saint Lucia', NULL, NULL, NULL),
(181, 'VC', 'Saint Vincent and the Grenadines', NULL, NULL, NULL),
(182, 'WS', 'Samoa', NULL, NULL, NULL),
(183, 'SM', 'San Marino', NULL, NULL, NULL),
(184, 'ST', 'Sao Tome and Principe', NULL, NULL, NULL),
(185, 'SA', 'Saudi Arabia', NULL, NULL, NULL),
(186, 'SN', 'Senegal', NULL, NULL, NULL),
(187, 'SC', 'Seychelles', NULL, NULL, NULL),
(188, 'SL', 'Sierra Leone', NULL, NULL, NULL),
(189, 'SG', 'Singapore', NULL, NULL, NULL),
(190, 'SK', 'Slovakia', NULL, NULL, NULL),
(191, 'SI', 'Slovenia', NULL, NULL, NULL),
(192, 'SB', 'Solomon Islands', NULL, NULL, NULL),
(193, 'SO', 'Somalia', NULL, NULL, NULL),
(194, 'ZA', 'South Africa', NULL, NULL, NULL),
(195, 'GS', 'South Georgia South Sandwich Islands', NULL, NULL, NULL),
(196, 'ES', 'Spain', NULL, NULL, NULL),
(197, 'LK', 'Sri Lanka', NULL, NULL, NULL),
(198, 'SH', 'St. Helena', NULL, NULL, NULL),
(199, 'PM', 'St. Pierre and Miquelon', NULL, NULL, NULL),
(200, 'SD', 'Sudan', NULL, NULL, NULL),
(201, 'SR', 'Suriname', NULL, NULL, NULL),
(202, 'SJ', 'Svalbarn and Jan Mayen Islands', NULL, NULL, NULL),
(203, 'SZ', 'Swaziland', NULL, NULL, NULL),
(204, 'SE', 'Sweden', NULL, NULL, NULL),
(205, 'CH', 'Switzerland', NULL, NULL, NULL),
(206, 'SY', 'Syrian Arab Republic', NULL, NULL, NULL),
(207, 'TW', 'Taiwan', NULL, NULL, NULL),
(208, 'TJ', 'Tajikistan', NULL, NULL, NULL),
(209, 'TZ', 'Tanzania, United Republic of', NULL, NULL, NULL),
(210, 'TH', 'Thailand', NULL, NULL, NULL),
(211, 'TG', 'Togo', NULL, NULL, NULL),
(212, 'TK', 'Tokelau', NULL, NULL, NULL),
(213, 'TO', 'Tonga', NULL, NULL, NULL),
(214, 'TT', 'Trinidad and Tobago', NULL, NULL, NULL),
(215, 'TN', 'Tunisia', NULL, NULL, NULL),
(216, 'TR', 'Turkey', NULL, NULL, NULL),
(217, 'TM', 'Turkmenistan', NULL, NULL, NULL),
(218, 'TC', 'Turks and Caicos Islands', NULL, NULL, NULL),
(219, 'TV', 'Tuvalu', NULL, NULL, NULL),
(220, 'UG', 'Uganda', NULL, NULL, NULL),
(221, 'UA', 'Ukraine', NULL, NULL, NULL),
(222, 'AE', 'United Arab Emirates', NULL, NULL, NULL),
(223, 'GB', 'United Kingdom', NULL, NULL, NULL),
(224, 'UM', 'United States minor outlying islands', NULL, NULL, NULL),
(225, 'UY', 'Uruguay', NULL, NULL, NULL),
(226, 'UZ', 'Uzbekistan', NULL, NULL, NULL),
(227, 'VU', 'Vanuatu', NULL, NULL, NULL),
(228, 'VA', 'Vatican City State', NULL, NULL, NULL),
(229, 'VE', 'Venezuela', NULL, NULL, NULL),
(230, 'VN', 'Vietnam', NULL, NULL, NULL),
(231, 'VG', 'Virigan Islands (British)', NULL, NULL, NULL),
(232, 'VI', 'Virgin Islands (U.S.)', NULL, NULL, NULL),
(233, 'WF', 'Wallis and Futuna Islands', NULL, NULL, NULL),
(234, 'EH', 'Western Sahara', NULL, NULL, NULL),
(235, 'YE', 'Yemen', NULL, NULL, NULL),
(236, 'YU', 'Yugoslavia', NULL, NULL, NULL),
(237, 'ZR', 'Zaire', NULL, NULL, NULL),
(238, 'ZM', 'Zambia', NULL, NULL, NULL),
(239, 'ZW', 'Zimbabwe', NULL, '2022-08-04 08:37:08', NULL),
(240, 'dsfdsfs', 'Test', '2022-06-15 08:47:53', '2022-06-15 09:35:55', '2022-06-15 09:35:55'),
(241, 'fgfdg', 'gfdgdgd', '2022-06-15 09:26:18', '2022-06-15 09:27:37', '2022-06-15 09:27:37'),
(242, 'gfdg', 'gdfgfdg', '2022-06-15 09:27:43', '2022-06-15 09:35:55', '2022-06-15 09:35:55'),
(243, 'fsf', 'sdffd', '2022-06-15 09:27:51', '2022-06-15 09:35:55', '2022-06-15 09:35:55'),
(244, 'Test', 'Test', '2022-06-15 09:36:15', '2022-06-15 09:46:55', '2022-06-15 09:46:55'),
(245, 'fsdfd', 'fsfs', '2022-06-15 09:37:12', '2022-06-15 09:46:18', '2022-06-15 09:46:18'),
(246, 'fsdfsdfsf', 'vcvxvxxcvxc', '2022-06-15 18:33:17', '2022-06-15 18:34:54', '2022-06-15 18:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `coupon_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` decimal(8,4) NOT NULL,
  `discount_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `limit_qty` int DEFAULT NULL,
  `coupon_remaining` int NOT NULL DEFAULT '0',
  `free_shipping` tinyint NOT NULL,
  `minimum_spend` decimal(8,4) DEFAULT NULL,
  `maximum_spend` decimal(8,4) DEFAULT NULL,
  `is_expire` tinyint(1) DEFAULT NULL,
  `is_limit` tinyint(1) DEFAULT NULL,
  `is_active` tinyint NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `slug`, `coupon_code`, `value`, `discount_type`, `limit_qty`, `coupon_remaining`, `free_shipping`, `minimum_spend`, `maximum_spend`, `is_expire`, `is_limit`, `is_active`, `start_date`, `end_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'summer-2022', 'summer2022', '10.0000', 'fixed', 10, 7, 0, '0.0000', '0.0000', 0, 1, 1, NULL, NULL, '2022-03-08 22:54:10', '2023-02-08 10:54:34', NULL),
(2, 'test', 'Test', '10.0000', 'fixed', 50, -1, 0, '0.0000', '0.0000', 0, 1, 1, NULL, NULL, '2023-02-06 09:37:00', '2022-10-31 10:39:07', '2022-10-31 10:39:07'),
(4, 'test-2', 'test_2', '5.0000', 'fixed', NULL, -1, 0, '0.0000', '0.0000', NULL, NULL, 1, NULL, NULL, '2022-07-02 06:56:25', '2022-10-31 10:37:47', '2022-10-31 10:37:47'),
(7, 'ethan-bryan', 'Elit dolor architec', '39.0000', 'fixed', NULL, -1, 0, '0.0000', '0.0000', 1, 0, 1, '2014-08-04', '2018-10-18', '2022-10-31 10:38:54', '2022-10-31 10:41:47', '2022-10-31 10:41:47'),
(8, 'giselle-farrell', 'Aliquam nihil repreh', '72.0000', 'fixed', NULL, -1, 0, '0.0000', '0.0000', 0, 0, 1, NULL, NULL, '2022-10-31 10:41:09', '2022-10-31 10:41:41', '2022-10-31 10:41:41'),
(9, 'hayfa-slater', 'Voluptas aliquid vol', '44.0000', 'fixed', 19, -1, 0, '0.0000', '0.0000', 0, 1, 0, NULL, NULL, '2022-10-31 10:43:38', '2022-10-31 10:44:21', '2022-10-31 10:44:21'),
(10, 'rudyard-hodge', 'Dignissimos eius qui', '53.0000', 'fixed', 883, -1, 0, '0.0000', '0.0000', 0, 1, 0, NULL, NULL, '2022-10-31 10:44:09', '2022-10-31 10:44:21', '2022-10-31 10:44:21'),
(11, 'indira-abbott', 'Veritatis magna offi', '0.0000', 'fixed', -33, -1, 0, '0.0000', '0.0000', 1, 1, 1, '2020-09-01', '2021-11-04', '2022-11-02 04:23:38', '2022-11-02 04:25:53', '2022-11-02 04:25:53'),
(12, 'hammett-blake', 'Nostrum ipsum commod', '67.0000', 'fixed', NULL, -1, 0, '0.0000', '0.0000', 1, 0, 1, '2009-12-07', '2014-02-06', '2022-11-02 04:24:00', '2022-11-02 04:25:09', '2022-11-02 04:25:09'),
(13, 'joelle-marsh', 'A labore labore aut', '82.0000', 'fixed', NULL, -1, 0, '0.0000', '0.0000', 1, 0, 0, '2010-12-28', '2013-06-12', '2022-11-02 04:25:33', '2022-11-02 04:25:53', '2022-11-02 04:25:53'),
(14, 'ocean-melton', 'Unde sit enim corpo', '11.0000', 'fixed', NULL, -1, 0, '0.0000', '0.0000', 0, 0, 1, NULL, NULL, '2022-11-02 04:32:15', '2022-11-02 04:33:11', '2022-11-02 04:33:11'),
(15, 'howard-bass', 'Quod ut consequat S', '15.0000', 'fixed', NULL, -1, 0, '0.0000', '0.0000', 0, 0, 1, NULL, NULL, '2022-11-02 04:32:19', '2022-11-02 04:33:11', '2022-11-02 04:33:11'),
(17, 'ekushe-february', 'ekushe21', '10.0000', 'fixed', 20, 20, 0, '0.0000', '0.0000', 0, 1, 1, NULL, NULL, '2023-02-08 11:44:16', '2023-02-08 14:12:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_categories`
--

CREATE TABLE `coupon_categories` (
  `coupon_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_products`
--

CREATE TABLE `coupon_products` (
  `coupon_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_translations`
--

CREATE TABLE `coupon_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_id` bigint UNSIGNED DEFAULT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `coupon_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupon_translations`
--

INSERT INTO `coupon_translations` (`id`, `coupon_id`, `locale`, `coupon_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Summer-2022', '2022-03-08 22:54:10', '2022-10-31 10:41:47', NULL),
(2, 1, 'de', 'Sommer-2022', '2022-03-08 23:00:51', '2022-10-31 10:41:47', NULL),
(3, 1, 'es', 'Verano-2022', '2022-03-08 23:01:12', '2022-10-31 10:41:47', NULL),
(4, 1, 'bn', 'গ্রীষ্ম-২০২২', '2022-03-08 23:01:32', '2022-10-31 10:41:47', NULL),
(5, 2, 'en', 'Test', '2022-07-02 06:39:27', '2022-07-02 06:39:27', NULL),
(7, 4, 'en', 'Test 2', '2022-07-02 06:56:25', '2022-07-02 06:56:25', NULL),
(9, 6, 'en', 'fhhgf', '2022-07-03 06:49:34', '2022-07-03 06:49:34', NULL),
(10, 7, 'en', 'Ethan Bryan', '2022-10-31 10:38:54', '2022-10-31 10:41:47', '2022-10-31 10:41:47'),
(11, 8, 'en', 'Giselle Farrell', '2022-10-31 10:41:09', '2022-10-31 10:41:41', '2022-10-31 10:41:41'),
(12, 9, 'en', 'Hayfa Slater', '2022-10-31 10:43:38', '2022-10-31 10:44:21', '2022-10-31 10:44:21'),
(13, 10, 'en', 'Rudyard Hodge', '2022-10-31 10:44:09', '2022-10-31 10:44:21', '2022-10-31 10:44:21'),
(14, 11, 'en', 'Indira Abbott', '2022-11-02 04:23:38', '2022-11-02 04:23:38', NULL),
(15, 12, 'en', 'Hammett Blake', '2022-11-02 04:24:00', '2022-11-02 04:25:09', '2022-11-02 04:25:09'),
(16, 13, 'en', 'Joelle Marsh', '2022-11-02 04:25:33', '2022-11-02 04:25:33', NULL),
(17, 14, 'en', 'Ocean Melton', '2022-11-02 04:32:15', '2022-11-02 04:33:11', '2022-11-02 04:33:11'),
(18, 15, 'en', 'Howard Bass', '2022-11-02 04:32:19', '2022-11-02 04:33:11', '2022-11-02 04:33:11'),
(20, 17, 'en', 'Ekushe February', '2023-02-08 11:44:16', '2023-02-08 11:44:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `currency_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `currency_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_name`, `currency_code`, `currency_symbol`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'United Arab Emirates Dirham', 'AED', 'د.إ', NULL, '2023-01-18 05:42:08', NULL),
(2, 'Afghan Afghani', 'AFN', '؋', NULL, '2023-01-18 05:51:02', NULL),
(3, 'Albanian Lek', 'ALL', 'L', NULL, '2023-01-18 05:41:14', NULL),
(4, 'Bangladesh Taka', 'BDT', '৳', NULL, '2023-01-18 05:40:44', NULL),
(5, 'Indian Rupee', 'INR', '₹', NULL, '2023-01-18 05:41:45', NULL),
(6, 'United States Dollar', 'USD', '$', NULL, '2023-01-18 05:41:26', NULL),
(10, 'Testhjh', 'Testjk', '', '2022-06-14 23:52:00', '2022-06-15 07:09:15', '2022-06-15 07:09:15'),
(14, 'Test', 'Test', '', '2022-06-15 05:22:40', '2022-06-15 07:09:37', '2022-06-15 07:09:37'),
(15, 'kjlj', 'ljlj', '', '2022-06-15 05:22:51', '2022-06-15 07:09:15', '2022-06-15 07:09:15'),
(16, 'Test', 'ffdgdfgfdf', '', '2022-06-15 17:40:43', '2022-06-15 18:26:08', '2022-06-15 18:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `currency_rates`
--

CREATE TABLE `currency_rates` (
  `id` bigint UNSIGNED NOT NULL,
  `currency_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `currency_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `currency_symbol` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `currency_rate` decimal(8,4) DEFAULT '0.0000',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currency_rates`
--

INSERT INTO `currency_rates` (`id`, `currency_name`, `currency_code`, `currency_symbol`, `currency_rate`, `default`, `created_at`, `updated_at`) VALUES
(6, 'United States Dollar', 'USD', '$', '1.0000', 0, '2022-04-30 09:10:29', '2022-09-29 07:09:29'),
(7, 'Bangladesh Taka', 'BDT', '৳', '80.0000', 0, '2022-04-30 09:11:07', '2022-09-29 07:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_type` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `first_name`, `last_name`, `username`, `phone`, `email`, `image`, `password`, `user_type`, `created_at`, `updated_at`) VALUES
(6, 52, NULL, NULL, 'Juhair_Vai', NULL, 'juhair@gmail.com', NULL, '$2y$10$qHv0x5ey5vJbFiGzXxlDiOlLkj3T5QYj58MVgtE.uVIai1OtmZJGG', 0, '2022-06-15 04:37:12', '2022-06-15 04:37:12'),
(7, 53, 'dasasdasad', 'ddasa', 'test88', '53455354', 'isa@cazasouq.com', NULL, '$2y$10$CnSkPGqOqdwWxVle.hk4oepcjy9nWR3FG5xPlhlLcGTiz65N6hUCm', 0, '2022-07-23 09:33:32', '2022-07-23 09:33:32'),
(8, 54, NULL, NULL, 'test987', NULL, 'test987@gmail.com', NULL, '$2y$10$kqEL6.rzTpU.8o8sD0W./e8X0n.vzUvjbtSaWSiEf.U1XU7FRt0QG', 0, '2022-08-03 06:25:27', '2022-08-03 06:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `queue` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `faq_type_id` bigint UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_type_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-05-26 06:24:21', '2022-05-26 06:25:00'),
(2, 2, 1, '2022-05-26 06:25:39', '2022-05-26 06:25:39'),
(3, 3, 1, '2022-05-26 06:27:04', '2022-05-26 09:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `faq_translations`
--

CREATE TABLE `faq_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `faq_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq_translations`
--

INSERT INTO `faq_translations` (`id`, `faq_id`, `locale`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Is buying online safe?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos dolorem voluptas dolorum eum tempore, accusantium officia deleniti est culpa autem praesentium, commodi, accusamus ea. Accusamus at iusto enim, esse suscipit?', '2022-05-26 06:24:21', '2022-05-26 06:24:21'),
(2, 2, 'en', 'Do you Ship internationally?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos dolorem voluptas dolorum eum tempore, accusantium officia deleniti est culpa autem praesentium, commodi, accusamus ea. Accusamus at iusto enim, esse suscipit?', '2022-05-26 06:25:39', '2022-05-26 06:25:39'),
(3, 3, 'en', 'What shipping methods are availabe ?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos dolorem voluptas dolorum eum tempore, accusantium officia deleniti est culpa autem praesentium, commodi, accusamus ea. Accusamus at iusto enim, esse suscipit?', '2022-05-26 06:27:04', '2022-05-26 06:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `faq_types`
--

CREATE TABLE `faq_types` (
  `id` bigint UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq_types`
--

INSERT INTO `faq_types` (`id`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 1, '2022-05-26 06:21:42', '2022-05-26 09:39:18'),
(3, 1, '2022-05-26 06:22:01', '2022-05-26 09:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `faq_type_translations`
--

CREATE TABLE `faq_type_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `faq_type_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq_type_translations`
--

INSERT INTO `faq_type_translations` (`id`, `faq_type_id`, `locale`, `type_name`, `created_at`, `updated_at`) VALUES
(2, 2, 'en', 'Shipping', '2022-05-26 06:21:42', '2022-05-26 06:21:42'),
(3, 3, 'en', 'Payment', '2022-05-26 06:22:01', '2022-05-26 06:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `flash_sales`
--

CREATE TABLE `flash_sales` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flash_sales`
--

INSERT INTO `flash_sales` (`id`, `slug`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'summer', 1, '2022-02-22 02:45:34', '2022-05-10 06:22:45', NULL),
(3, 'pohela-boishak', 1, '2022-04-14 15:07:02', '2022-08-27 08:14:31', NULL),
(7, 'megan-mooney', 1, '2022-10-31 09:20:21', '2022-10-31 09:21:23', '2022-10-31 09:21:23'),
(8, 'christopher-sparks', 1, '2022-10-31 09:20:26', '2022-10-31 09:22:23', '2022-10-31 09:22:23'),
(9, 'holly-bentley', 1, '2022-10-31 09:22:02', '2022-10-31 09:22:23', '2022-10-31 09:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale_products`
--

CREATE TABLE `flash_sale_products` (
  `id` bigint UNSIGNED NOT NULL,
  `flash_sale_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `end_date` date NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `position` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flash_sale_products`
--

INSERT INTO `flash_sale_products` (`id`, `flash_sale_id`, `product_id`, `end_date`, `price`, `qty`, `position`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 32, '2024-04-30', '180.00', 10, 0, '2022-02-22 02:45:34', '2022-02-22 02:45:34', NULL),
(5, 2, 33, '2024-04-28', '30.00', 10, 0, NULL, NULL, NULL),
(6, 2, 34, '2024-03-10', '40.00', 8, 0, NULL, NULL, NULL),
(7, 2, 3, '2024-03-12', '150.00', -34, 0, NULL, NULL, NULL),
(8, 3, 1, '2023-04-14', '243.00', 0, 0, '2022-04-14 15:07:02', '2022-04-14 15:07:02', NULL),
(9, 4, 4, '2022-10-20', '4343.00', 395, 0, '2022-10-31 08:17:55', '2022-10-31 08:17:55', NULL),
(10, 5, 13, '1996-04-20', '740.00', 885, 0, '2022-10-31 08:18:45', '2022-10-31 08:18:45', NULL),
(11, 6, 6, '1972-09-12', '152.00', 481, 0, '2022-10-31 08:18:51', '2022-10-31 08:18:51', NULL),
(12, 7, 31, '2013-04-21', '195.00', 556, 0, '2022-10-31 09:20:21', '2022-10-31 09:21:23', '2022-10-31 09:21:23'),
(13, 8, 13, '2010-01-14', '993.00', 406, 0, '2022-10-31 09:20:26', '2022-10-31 09:22:23', '2022-10-31 09:22:23'),
(14, 9, 20, '2012-10-13', '765.00', 546, 0, '2022-10-31 09:22:02', '2022-10-31 09:22:23', '2022-10-31 09:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale_translations`
--

CREATE TABLE `flash_sale_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `flash_sale_id` bigint UNSIGNED DEFAULT NULL,
  `local` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `campaign_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flash_sale_translations`
--

INSERT INTO `flash_sale_translations` (`id`, `flash_sale_id`, `local`, `campaign_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 'en', 'Summer', '2022-02-22 02:45:34', '2022-02-22 02:45:34', NULL),
(3, 3, 'en', 'Pohela Boishak', '2022-04-14 15:07:02', '2022-04-14 15:07:02', NULL),
(4, 4, 'en', 'dgddgg', '2022-10-31 08:17:55', '2022-10-31 08:17:55', NULL),
(5, 5, 'en', 'Ramona Vang', '2022-10-31 08:18:45', '2022-10-31 08:18:45', NULL),
(6, 6, 'en', 'Talon English', '2022-10-31 08:18:51', '2022-10-31 08:18:51', NULL),
(7, 7, 'en', 'Megan Mooney', '2022-10-31 09:20:21', '2022-10-31 09:21:23', '2022-10-31 09:21:23'),
(8, 8, 'en', 'Christopher Sparks', '2022-10-31 09:20:26', '2022-10-31 09:22:23', '2022-10-31 09:22:23'),
(9, 9, 'en', 'Holly Bentley', '2022-10-31 09:22:02', '2022-10-31 09:22:23', '2022-10-31 09:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `footer_descriptions`
--

CREATE TABLE `footer_descriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer_descriptions`
--

INSERT INTO `footer_descriptions` (`id`, `locale`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'en', '<div class=\"row\">\r\n<h2>CartPro - your shopping partner</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<p> </p>\r\n<ul>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n<li>In luctus nunc id lectus pellentesque lacinia.</li>\r\n<li>Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur.</li>\r\n<li>Nam sed sapien sed lacus placerat euismod in consectetur ex.</li>\r\n<li>Sed et odio ultrices, semper sem sed, scelerisque libero.</li>\r\n<li>Proin ut ex varius libero viverra pellentesque.<code></code></li>\r\n</ul>\r\n</div>', 1, '2022-04-25 07:16:23', '2022-04-26 05:50:01'),
(2, 'bn', '<h1>CartPro - আপনার কেনাকাটা অংশীদার</h1>\r\n<p>Lorem Ipsum-এর অনুচ্ছেদের অনেক বৈচিত্র উপলব্ধ রয়েছে, কিন্তু অধিকাংশই কিছু আকারে পরিবর্তনের শিকার হয়েছে, ইনজেকশন করা হাস্যরস, বা এলোমেলো শব্দ যা সামান্য বিশ্বাসযোগ্য মনে হচ্ছে না। আপনি যদি Lorem Ipsum-এর একটি প্যাসেজ ব্যবহার করতে যাচ্ছেন, তাহলে আপনাকে নিশ্চিত হতে হবে যে টেক্সটের মাঝখানে বিব্রতকর কিছু লুকানো নেই। ইন্টারনেটের সমস্ত Lorem Ipsum জেনারেটরগুলি প্রয়োজনীয় হিসাবে পূর্বনির্ধারিত অংশগুলি পুনরাবৃত্তি করার প্রবণতা রাখে, যা এটিকে ইন্টারনেটে প্রথম সত্য জেনারেটর করে তোলে। এটি লরেম ইপসাম তৈরি করতে 200 টিরও বেশি ল্যাটিন শব্দের অভিধান ব্যবহার করে, যা কিছু মডেল বাক্য গঠনের সাথে মিলিত হয় যা যুক্তিসঙ্গত বলে মনে হয়। উত্পন্ন লোরেম ইপসাম তাই সবসময় পুনরাবৃত্তি, ইনজেক্টেড হাস্যরস, বা অ-চরিত্রহীন শব্দ ইত্যাদি থেকে মুক্ত।</p>\r\n<p> </p>\r\n<p>    Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br />    লুকটাস নুনক আইডি লেক্টাস পেলেনটেস্ক ল্যাকিনিয়াতে।<br />    Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur.<br />    Nam sed sapien sed lacus placerat euismod in consectetur ex.<br />    Sed et odio ultrices, Semper Sem Sed, scelerisque libero.<br />    প্রিন্ট ইউটি এক্স varius libero viverra pellentesque.</p>', 1, '2022-04-25 07:18:21', '2022-04-26 05:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `img_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keyword_hits`
--

CREATE TABLE `keyword_hits` (
  `id` bigint UNSIGNED NOT NULL,
  `keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hit` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keyword_hits`
--

INSERT INTO `keyword_hits` (`id`, `keyword`, `hit`, `created_at`, `updated_at`) VALUES
(2, 'Apple', 2, '2022-04-03 11:47:57', '2022-04-03 11:47:58'),
(3, 'Mobile', 1, '2022-04-10 20:57:17', '2022-04-10 20:57:17'),
(4, 'Tablet', 1, '2022-04-11 00:29:59', '2022-04-11 00:29:59'),
(5, 'Watch', 3, '2022-04-16 04:13:38', '2022-04-16 04:14:09'),
(6, 'Bangladesh', 2, '2023-01-18 08:05:14', '2023-01-18 08:05:40'),
(7, 'Shuddokhamar', 1, '2023-01-18 08:05:59', '2023-01-18 08:05:59'),
(8, 'Samsung', 1, '2023-01-18 08:10:15', '2023-01-18 08:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `language_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `local` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `default` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `local`, `default`, `created_at`, `updated_at`) VALUES
(10, 'English', 'en', 1, '2021-02-19 10:23:59', '2023-01-19 05:45:10'),
(11, 'বাংলা', 'bn', 0, '2021-02-19 10:24:49', '2022-06-26 06:40:40'),
(25, 'Spanish', 'es', 0, '2022-03-01 00:44:49', '2022-06-23 08:30:55'),
(26, 'German', 'de', 0, '2022-03-01 00:46:08', '2022-06-26 05:59:52'),
(29, 'French', 'fr', 0, '2022-09-27 04:25:54', '2022-09-27 04:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_active` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'about-menu', 1, '2022-02-25 11:39:09', '2022-03-28 19:06:43'),
(2, 'footer-categories', 1, '2022-03-28 12:36:26', '2022-04-11 12:58:00'),
(3, 'primary-menu', 1, '2022-03-28 19:06:58', '2022-03-28 19:06:58'),
(4, 'footer-others', 1, '2022-05-26 09:04:02', '2022-11-01 08:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent` bigint UNSIGNED NOT NULL DEFAULT '0',
  `sort` int NOT NULL DEFAULT '0',
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `menu` bigint UNSIGNED NOT NULL,
  `depth` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `locale`, `label`, `link`, `parent`, `sort`, `class`, `menu`, `depth`, `created_at`, `updated_at`) VALUES
(1, 'en', 'Terms &amp; Condition', 'https://cartproshop.com/demo/page/terms-&-condition', 0, 0, '', 1, 0, '2022-02-25 11:41:30', '2022-04-20 00:08:25'),
(2, 'en', 'About CartPro', 'https://cartproshop.com/demo/page/about-us', 0, 1, '', 1, 0, '2022-02-25 11:47:47', '2022-04-11 13:57:18'),
(5, 'bn', 'টার্মস এন্ড কন্ডিশন', 'terms-&-condition', 0, 4, NULL, 1, 0, '2022-03-08 23:24:58', '2022-03-08 23:24:58'),
(6, 'bn', 'আমদের সম্পর্কে', 'about-us', 0, 5, NULL, 1, 0, '2022-03-08 23:25:44', '2022-03-08 23:25:44'),
(7, 'bn', 'প্রশ্ন ও জিজ্ঞাসা', 'faq', 0, 6, NULL, 1, 0, '2022-03-08 23:26:17', '2022-03-08 23:26:17'),
(8, 'de', 'Allgemeine Geschäftsbedingungen', 'terms-&-condition', 0, 7, NULL, 1, 0, '2022-03-08 23:27:32', '2022-03-08 23:28:14'),
(9, 'de', 'Über uns', 'about-us', 0, 8, NULL, 1, 0, '2022-03-08 23:27:45', '2022-03-08 23:27:45'),
(10, 'de', 'Häufig Fragen und Fragen', 'faq', 0, 9, NULL, 1, 0, '2022-03-08 23:28:41', '2022-03-08 23:28:41'),
(11, 'es', 'Términos y Condiciones', 'terms-&-condition', 0, 10, NULL, 1, 0, '2022-03-08 23:29:11', '2022-03-08 23:29:11'),
(12, 'es', 'Sobre nosotros', 'about-us', 0, 11, NULL, 1, 0, '2022-03-08 23:29:22', '2022-03-08 23:29:22'),
(13, 'es', 'Preguntas más frecuentes', 'faq', 0, 12, NULL, 1, 0, '2022-03-08 23:29:34', '2022-03-08 23:29:34'),
(14, 'en', 'Computer Accessories', 'https://cartproshop.com/demo/category/computer-accessories', 0, 0, NULL, 2, 0, '2022-03-28 12:38:17', '2022-03-28 12:38:55'),
(15, 'en', 'Camera & Photo', 'https://cartproshop.com/demo/category/camera-&-photo', 0, 1, NULL, 2, 0, '2022-03-28 12:38:55', '2022-03-28 12:39:00'),
(16, 'en', 'Smart Phones', 'https://cartproshop.com/demo/category/mobile', 0, 3, NULL, 2, 0, '2022-03-28 12:52:36', '2022-03-28 12:55:45'),
(17, 'en', 'Watches', 'https://cartproshop.com/demo/category/watch', 0, 4, NULL, 2, 0, '2022-03-28 12:54:23', '2022-03-28 12:55:40'),
(18, 'en', 'Clothes', 'https://cartproshop.com/demo/category/clothes', 0, 5, NULL, 2, 0, '2022-03-28 12:54:43', '2022-03-28 12:55:40'),
(19, 'en', 'Furniture & Home Decor', 'https://cartproshop.com/demo/category/furniture', 0, 2, NULL, 2, 0, '2022-03-28 12:55:17', '2022-03-28 12:55:49'),
(20, 'en', 'Phones', 'https://www.youtube.com/', 0, 0, '', 3, 0, '2022-03-28 19:07:30', '2022-06-23 10:51:27'),
(21, 'en', 'Watches', 'https://cartproshop.com/demo/category/watch', 0, 1, '', 3, 0, '2022-03-28 19:08:02', '2022-04-11 13:33:47'),
(22, 'en', 'Gadgets', 'https://cartproshop.com/demo/category/computer-accessories', 0, 2, '', 3, 0, '2022-03-28 19:08:35', '2022-04-11 13:33:47'),
(30, 'en', 'About Us', 'http://localhost/cartpro/about-us', 0, 0, '', 4, 0, '2022-05-26 09:06:09', '2022-05-26 09:07:10'),
(31, 'en', 'Contact Us', 'http://localhost/cartpro/contact', 0, 1, '', 4, 0, '2022-05-26 09:06:46', '2022-05-26 09:07:03'),
(33, 'en', 'FAQ', 'http://localhost/cartpro/faq', 0, 2, '', 4, 0, '2022-05-26 10:37:41', '2022-05-26 10:37:55'),
(34, 'en', 'Child', 'child1', 0, 0, '', 18, 0, '2022-11-09 09:11:07', '2022-11-09 09:11:17'),
(35, 'en', 'Child2', 'fsds', 0, 1, NULL, 18, 0, '2022-11-09 09:11:45', '2022-11-09 09:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `menu_translations`
--

CREATE TABLE `menu_translations` (
  `id` bigint NOT NULL,
  `menu_id` bigint DEFAULT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `menu_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_translations`
--

INSERT INTO `menu_translations` (`id`, `menu_id`, `locale`, `menu_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'About Menu', '2022-02-25 11:39:09', '2022-03-28 19:06:43'),
(2, 2, 'en', 'Footer Categories', '2022-03-28 12:36:26', '2022-04-11 12:58:00'),
(3, 3, 'en', 'Primary Menu', '2022-03-28 19:06:58', '2022-03-28 19:06:58'),
(4, 4, 'en', 'Footer Others', '2022-05-26 09:04:02', '2022-05-26 10:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users0_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_10_20_093433_create_wishlists_table', 2),
(11, '2020_10_20_093627_create_searchterms_table', 2),
(15, '2016_06_01_000001_create_oauth_auth_codes_table', 5),
(16, '2016_06_01_000002_create_oauth_access_tokens_table', 5),
(17, '2016_06_01_000003_create_oauth_refresh_tokens_table', 5),
(18, '2016_06_01_000004_create_oauth_clients_table', 5),
(19, '2016_06_01_000005_create_oauth_personal_access_clients_table', 5),
(43, '2021_02_08_071833_create_storefront_menus_table', 16),
(44, '2021_02_14_201446_create_storefront_generals_table', 17),
(47, '2021_02_19_115914_create_languages_table', 18),
(54, '2021_02_20_081854_create_brands_table', 19),
(55, '2021_02_20_082601_create_brand_translations_table', 19),
(56, '2021_02_22_021015_create_categories_table', 20),
(58, '2021_02_22_021347_create_category_translations_table', 21),
(91, '2021_03_03_060124_create_attribute_sets_table', 22),
(92, '2021_03_03_061135_create_attribute_set_translations_table', 22),
(105, '2021_03_06_014750_create_attributes_table', 23),
(106, '2021_03_06_015334_create_attribute_translations_table', 23),
(107, '2021_03_07_085220_create_attribute_values_table', 23),
(108, '2021_03_07_093602_create_attribute_value_translations_table', 23),
(109, '2021_03_13_031409_create_tags_table', 23),
(110, '2021_03_13_033422_create_tag_translations_table', 23),
(111, '2021_03_13_154957_create_products_table', 23),
(112, '2021_03_13_161455_create_product_translations_table', 23),
(113, '2021_03_14_074009_create_product_images_table', 23),
(114, '2021_03_14_183523_create_category_product_table', 23),
(115, '2021_03_14_184007_create_product_tag_table', 23),
(119, '2021_03_17_054122_create_attribute_category_table', 24),
(126, '2021_03_27_043501_create_flash_sales_table', 25),
(127, '2021_03_27_044612_create_flash_sale_translations_table', 25),
(128, '2021_03_27_051032_create_flash_sale_products_table', 25),
(133, '2021_04_18_200855_create_coupons_table', 26),
(134, '2021_04_18_202428_create_coupon_translations_table', 26),
(135, '2021_04_18_203035_create_coupon_products_table', 26),
(136, '2021_04_18_203255_create_coupon_categories_table', 26),
(137, '2021_04_19_214122_create_pages_table', 27),
(138, '2021_04_19_214948_create_page_translations_table', 27),
(139, '2021_04_20_101649_create_settings_table', 28),
(141, '2021_04_20_102050_create_setting_translations_table', 29),
(146, '2021_05_07_190540_create_storefront_images_table', 32),
(147, '2021_07_07_054428_create_countries_table', 32),
(153, '2021_07_19_143452_create_setting_generals_table', 33),
(154, '2021_07_22_060151_create_setting_stores_table', 33),
(155, '2021_07_24_060323_create_setting_currencies_table', 34),
(158, '2021_07_24_154925_create_setting_sms_table', 35),
(162, '2021_07_25_042459_create_setting_mails_table', 36),
(163, '2021_07_25_055222_create_setting_newsletters_table', 37),
(164, '2021_07_25_063221_create_setting_custom_css_jsses_table', 38),
(165, '2021_07_25_071506_create_setting_facebooks_table', 39),
(166, '2021_07_25_074456_create_setting_googles_table', 40),
(169, '2021_07_25_085352_create_setting_free_shippings_table', 41),
(170, '2021_07_25_093723_create_setting_local_pickups_table', 42),
(171, '2021_07_25_095024_create_setting_flat_rates_table', 43),
(172, '2021_07_25_133626_create_setting_paypals_table', 44),
(173, '2021_07_25_151050_create_setting_strips_table', 45),
(174, '2021_07_25_153922_create_setting_paytms_table', 46),
(175, '2021_07_25_164941_create_setting_cash_on_deliveries_table', 47),
(176, '2021_07_25_170845_create_setting_bank_transfers_table', 48),
(177, '2021_07_25_172653_create_setting_check_moneyxyz_xyzorders_table', 49),
(178, '2021_07_31_025241_create_permission_tables', 50),
(179, '2021_08_05_060912_create_slider_translations_table', 51),
(180, '2021_02_06_062335_create_sliders0_table', 52),
(181, '2021_08_05_060912_create_slider_translations0_table', 52),
(187, '2021_08_05_121746_create_sliders_table', 53),
(188, '2021_08_05_122939_create_slider_translations_table', 53),
(189, '2014_10_12_000000_create_users_table', 54),
(190, '2021_08_14_110145_create_taxes_table', 55),
(191, '2021_08_14_110440_create_tax_translations_table', 55),
(206, '2017_08_11_073824_create_menus_wp_table', 56),
(207, '2017_08_11_074006_create_menu_items_wp_table', 57),
(208, '2021_08_23_000802_create_menu_translations_wp_table', 58),
(209, '2021_08_28_062405_create_currency_rates_table', 58),
(210, '2021_08_28_081712_create_currencies_table', 59),
(211, '2021_10_03_092326_create_product_attribute_value_table', 60),
(212, '2021_10_05_040237_create_newsletters_table', 61),
(213, '2020_10_20_093705_create_guest_customers_table', 62),
(214, '2021_10_11_141748_create_customers_table', 63),
(215, '2021_10_11_150921_create_orders_table', 64),
(216, '2021_10_11_152037_create_shippings_table', 65),
(217, '2021_07_25_172653_create_setting_check_money_orders_table', 66),
(221, '2021_10_14_051152_create_order_details_table', 67),
(222, '2021_10_25_124957_create_reviews_table', 68),
(223, '2021_10_28_032646_create_colors_table', 69),
(224, '2019_12_14_000001_create_personal_access_tokens_table', 70),
(225, '2022_01_01_060235_create_keyword_hits_table', 70),
(226, '2022_01_01_084443_add_soft_delete_to_slider_table', 71),
(230, '2022_03_14_172533_create_user_billing_addresses_table', 72),
(231, '2022_03_15_015455_create_user_shipping_addresses_table', 73),
(232, '2022_04_25_124335_create_footer_descriptions_table', 74),
(233, '2022_05_22_043611_create_faq_types_table', 75),
(234, '2022_05_22_045101_create_faq_type_translations_table', 75),
(235, '2022_05_22_161456_create_faqs_table', 75),
(236, '2022_05_22_161643_create_faq_translations_table', 75),
(237, '2022_05_25_052755_create_setting_about_us_table', 76),
(238, '2022_05_25_053556_create_setting_about_us_translations_table', 76),
(241, '2022_06_06_114945_add_delivery_info_to_orders_table', 77),
(242, '2022_06_15_013434_add_soft_delete_to_currencies_table', 78),
(243, '2022_06_15_140244_add_soft_delete_column_to_countries_table', 79),
(244, '2022_06_18_205302_add_soft_delete_column_to_tags_table', 80),
(245, '2022_06_18_205521_add_soft_delete_column_to_tag_translations_table', 80),
(246, '2022_06_21_121204_create_shipping_locations_table', 81),
(247, '2022_06_21_121547_create_shipping_location_translations_table', 81),
(251, '2022_07_02_121529_add_limit_coupon_to_coupons_table', 82),
(253, '2022_07_04_144924_add_reference_no_to_orders_table', 83),
(256, '2022_07_27_151144_create_setting_home_page_seos_table', 85),
(257, '2022_07_27_151252_create_setting_home_page_seo_translations_table', 85),
(258, '2022_07_28_130406_add_soft_delete_to_slider_translations_table', 86),
(259, '2022_07_30_220415_add_soft_delete_column_to_pages_table', 87),
(260, '2022_07_30_220641_add_soft_delete_column_to_page_translations_table', 87),
(261, '2022_07_31_123639_add_some_column_to_page_translations_table', 88),
(262, '2022_08_27_224200_add_soft_delete_column_to_attributes_table', 89),
(263, '2022_08_27_224342_add_soft_delete_column_to_attribute_translations_table', 89),
(265, '2022_09_26_141739_add_column_to_setting_mails_table', 90),
(266, '2022_09_29_152210_create_notifications_table', 91),
(267, '2022_10_03_130226_add_soft_delete_column_to_users', 92),
(269, '2022_10_04_104432_add_soft_delete_column_to_notifications', 93),
(270, '2022_10_10_165856_add_soft_delete_column_to_taxes', 94),
(271, '2022_10_10_165949_add_soft_delete_column_to_tax_translations', 94),
(272, '2022_10_30_160400_add_soft_delete_column_to_reviews', 95),
(273, '2022_10_31_112735_add_soft_delete_column_to_orders', 96),
(274, '2022_10_31_120141_add_soft_delete_column_to_order_details', 97),
(275, '2022_10_31_123924_add_soft_delete_column_to_flash_sales', 98),
(276, '2022_10_31_124032_add_soft_delete_column_to_flash_sale_translations', 98),
(277, '2022_10_31_124127_add_soft_delete_column_to_flash_sale_products', 98),
(278, '2022_10_31_161236_add_soft_delete_column_to_coupons', 99),
(279, '2022_10_31_161314_add_soft_delete_column_to_coupon_translations', 99),
(280, '2022_11_08_111527_add_soft_delete_column_to_product_translations', 100),
(281, '2022_11_08_145139_delete_column_to_category_product', 101),
(283, '2022_11_15_114931_add_default_column_to_currency_rates', 102),
(284, '2022_11_15_122204_add_currency_symbol_column_to_currencies', 102),
(285, '2023_02_08_145149_add_coupon_remaining_column_to_coupons', 103);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 6),
(6, 'App\\User', 7),
(6, 'App\\User', 8),
(6, 'App\\User', 9),
(4, 'App\\User', 10),
(3, 'App\\User', 49),
(1, 'App\\User', 50),
(1, 'App\\User', 51),
(1, 'App\\User', 55);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, '&lt;script&gt;alert(\'xss\')&lt;/script&gt;', '2022-04-03 12:00:36', '2022-04-03 12:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
('07e894cb-b7d8-4bee-a5c8-f6b14f2961a4', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 176, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1176\"}', NULL, '2022-12-20 07:11:46', '2022-12-20 07:11:46', NULL),
('0b827074-ff7f-483b-b932-55b9c8774170', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 152, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1152\"}', NULL, '2022-12-13 05:13:45', '2022-12-13 05:13:45', NULL),
('0f10316c-290f-43e0-8096-59af89f0f896', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 138, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1138\"}', NULL, '2022-12-08 13:19:51', '2022-12-08 13:19:51', NULL),
('0f3fd52d-f974-4734-ba0d-c1f59c57c869', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 103, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1103\"}', NULL, '2022-12-01 08:57:02', '2022-12-01 08:57:02', NULL),
('17f28bdb-d9b9-4710-8301-e2d09a0db0de', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 141, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1141\"}', NULL, '2022-12-09 02:34:54', '2022-12-09 02:34:54', NULL),
('1ae457ec-0186-4957-ad85-f4f392ff2d0d', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 169, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1169\"}', NULL, '2022-12-18 06:03:26', '2022-12-18 06:03:26', NULL),
('1c3fac43-47f1-4e0e-8e28-edcb1abd64d5', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 157, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1157\"}', NULL, '2022-12-15 05:36:35', '2022-12-15 05:36:35', NULL),
('1c4447bf-e027-4271-98e6-ef43d957e060', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 160, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1160\"}', NULL, '2022-12-15 06:18:06', '2022-12-15 06:18:06', NULL),
('1d06d0e3-21b4-4021-a6ac-013072ef6811', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 150, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1150\"}', NULL, '2022-12-10 15:49:39', '2022-12-10 15:49:39', NULL),
('1f8c89a8-28e9-4af6-af40-a938c8acabde', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 128, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1128\"}', NULL, '2022-12-05 13:42:35', '2022-12-05 13:42:35', NULL),
('2793827e-1d5c-4c60-83cb-d40b9a9757c9', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 97, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1097\"}', NULL, '2022-12-01 07:02:08', '2022-12-01 07:02:08', NULL),
('2827c322-8169-4f20-b634-26cd3344f9e2', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 136, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1136\"}', NULL, '2022-12-08 10:25:49', '2022-12-08 10:25:49', NULL),
('2badc839-119e-4bb9-bc70-ebfed9eeb261', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 143, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1143\"}', NULL, '2022-12-09 02:47:19', '2022-12-09 02:47:19', NULL),
('2f841963-ee84-4658-90f7-ccfa27c8981e', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 94, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1094\"}', NULL, '2022-12-01 06:38:50', '2022-12-01 06:38:50', NULL),
('2fd45c40-b1cf-413d-b911-f7df08ee8868', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 145, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1145\"}', NULL, '2022-12-09 02:48:57', '2022-12-09 02:48:57', NULL),
('303eab18-9f97-40d8-90c6-9b1ed5a32703', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 115, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1115\"}', NULL, '2022-12-01 09:53:20', '2022-12-01 09:53:20', NULL),
('3a2abd3f-b6cf-4dfa-81c0-490f6feffe96', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 129, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1129\"}', NULL, '2022-12-06 04:06:58', '2022-12-06 04:06:58', NULL),
('3a90c3d9-8604-407e-9b25-225c7b6900af', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 116, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1116\"}', NULL, '2022-12-01 09:54:07', '2022-12-01 09:54:07', NULL),
('3ac39d6e-2966-4ce5-8b02-06776662d243', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 156, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1156\"}', NULL, '2022-12-15 05:31:17', '2022-12-15 05:31:17', NULL),
('4458470c-22cd-4a2f-b027-f72361b25798', 'App\\Notifications\\NewOrderNotification', 'App\\User', 1, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1086\"}', '2022-10-04 08:42:30', '2022-10-03 10:58:36', '2022-10-03 10:58:42', NULL),
('44ccc047-3fd2-4159-82d5-060c29adc139', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 89, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1089\"}', '2022-10-04 05:12:41', '2022-10-03 11:12:41', '2022-10-03 11:12:41', '2022-10-04 05:23:54'),
('44fa11be-a27f-4ae0-81f9-e2d1b6f86c9a', 'App\\Notifications\\NewOrderNotification', 'App\\User', 1, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1089\"}', '2022-10-04 05:12:41', '2022-10-04 04:59:31', '2022-10-04 04:59:31', '2022-10-04 05:23:54'),
('49585fec-b8cd-4075-b44f-b8536c8d11b0', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 147, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1147\"}', NULL, '2022-12-10 15:21:29', '2022-12-10 15:21:29', NULL),
('4a62a98c-cfbf-4772-9890-ffbfae1a9695', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 124, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1124\"}', NULL, '2022-12-05 06:57:45', '2022-12-05 06:57:45', NULL),
('4b23f8fa-8e9f-42de-b367-83442407d5d7', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 162, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1162\"}', NULL, '2022-12-15 06:18:55', '2022-12-15 06:18:55', NULL),
('4da72a38-0fa2-4d7f-aeab-151a22849fa6', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 118, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1118\"}', NULL, '2022-12-03 07:07:35', '2022-12-03 07:07:35', NULL),
('50baf755-0ca8-41ad-a578-61a102a06afc', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 121, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1121\"}', NULL, '2022-12-03 08:46:36', '2022-12-03 08:46:36', NULL),
('52e8b62c-3999-4e41-9748-47acfe1a1ac4', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 175, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1175\"}', NULL, '2022-12-20 07:10:11', '2022-12-20 07:10:11', NULL),
('54f13ab3-8876-4c1c-b96d-08bcdc1f332b', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 123, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1123\"}', NULL, '2022-12-03 08:59:18', '2022-12-03 08:59:18', NULL),
('566cae3c-ddf3-401c-9639-a1780b554f36', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 99, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1099\"}', NULL, '2022-12-01 08:39:29', '2022-12-01 08:39:29', NULL),
('598afcfc-2486-464c-af73-877c290bc70f', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 133, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1133\"}', NULL, '2022-12-06 11:49:19', '2022-12-06 11:49:19', NULL),
('5a868809-33a8-420c-b297-e13f0118c01e', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 149, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1149\"}', NULL, '2022-12-10 15:29:52', '2022-12-10 15:29:52', NULL),
('604e65d8-5c8a-4f99-9f9c-e956e9c86c54', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 153, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1153\"}', NULL, '2022-12-15 04:23:03', '2022-12-15 04:23:03', NULL),
('6687a4b4-74d8-4914-a5f1-2a32cceef94b', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 159, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1159\"}', NULL, '2022-12-15 06:15:15', '2022-12-15 06:15:15', NULL),
('6997d630-d517-42a5-a722-7409db999028', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 100, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1100\"}', NULL, '2022-12-01 08:41:40', '2022-12-01 08:41:40', NULL),
('74a2f52a-3647-4551-ba5d-388c8b9f503e', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 93, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1093\"}', NULL, '2022-12-01 06:33:23', '2022-12-01 06:33:23', NULL),
('790710dc-466d-49c3-ad61-72dc636613d8', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 166, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1166\"}', NULL, '2022-12-18 05:10:28', '2022-12-18 05:10:28', NULL),
('7e362771-e5b3-4832-b976-ba661980c725', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 102, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1102\"}', NULL, '2022-12-01 08:53:32', '2022-12-01 08:53:32', NULL),
('7ef44d91-6189-4b01-87af-1f876a708ed8', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 167, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1167\"}', NULL, '2022-12-18 05:22:19', '2022-12-18 05:22:19', NULL),
('80b83967-3991-4884-9fd2-5d9411c7d01e', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 135, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1135\"}', NULL, '2022-12-08 09:58:47', '2022-12-08 09:58:47', NULL),
('85a9b8c8-f40a-4b16-b35f-65223834202e', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 164, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1164\"}', NULL, '2022-12-15 06:22:23', '2022-12-15 06:22:23', NULL),
('86006f56-d978-4f03-b6fe-053875f0e199', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 101, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1101\"}', NULL, '2022-12-01 08:47:37', '2022-12-01 08:47:37', NULL),
('88b0a6c0-5d61-42cd-ae4b-ada516700048', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 119, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1119\"}', NULL, '2022-12-03 08:28:34', '2022-12-03 08:28:34', NULL),
('88c10a12-4679-4b1e-a5fa-41b0b9fd445d', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 109, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1109\"}', NULL, '2022-12-01 09:13:20', '2022-12-01 09:13:20', NULL),
('89d10860-0aa8-479c-b72a-daafaebdce21', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 170, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1170\"}', NULL, '2022-12-20 05:53:46', '2022-12-20 05:53:46', NULL),
('8a655354-0af1-4bd4-910a-0c76a8f9820a', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 137, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1137\"}', NULL, '2022-12-08 10:29:23', '2022-12-08 10:29:23', NULL),
('8c48a2e7-cae0-45ee-bd76-10c32e1017a5', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 96, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1096\"}', NULL, '2022-12-01 06:52:52', '2022-12-01 06:52:52', NULL),
('8d720f0d-5e75-4817-9609-2fcd8986b0a1', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 90, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1090\"}', '2022-10-04 07:42:50', '2022-10-04 07:41:55', '2022-10-04 07:41:55', NULL),
('8eeb8d62-fe3d-49dc-a62c-039b5f64b0da', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 106, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1106\"}', NULL, '2022-12-01 09:07:55', '2022-12-01 09:07:55', NULL),
('9055217a-523e-4871-96e2-c2aafb5282bf', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 139, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1139\"}', NULL, '2022-12-08 13:24:00', '2022-12-08 13:24:00', NULL),
('911cdefb-6722-4138-8837-c66f9dc8029d', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 134, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1134\"}', NULL, '2022-12-06 11:57:20', '2022-12-06 11:57:20', NULL),
('954119a5-6902-4c19-990c-bc67e5fed500', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 142, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1142\"}', NULL, '2022-12-09 02:37:55', '2022-12-09 02:37:55', NULL),
('9755a9f2-7269-4ade-b366-55f080c3b63c', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 117, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1117\"}', NULL, '2022-12-01 10:49:46', '2022-12-01 10:49:46', NULL),
('97644e57-a53f-495f-b1e0-0ef9a6dc0936', 'App\\Notifications\\NewOrderNotification', 'App\\User', 1, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1088\"}', '2022-10-04 05:12:41', '2022-10-03 11:10:49', '2022-10-03 11:11:38', '2022-10-04 05:23:54'),
('99740874-5f5a-42f5-a1bb-30d706b2db52', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 95, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1095\"}', NULL, '2022-12-01 06:52:51', '2022-12-01 06:52:51', NULL),
('9acde760-0dcc-4abc-8c83-9916b4b1f447', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 112, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1112\"}', NULL, '2022-12-01 09:19:25', '2022-12-01 09:19:25', NULL),
('9ba509e7-c980-495c-a42f-19fac624fae8', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 140, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1140\"}', NULL, '2022-12-08 13:28:15', '2022-12-08 13:28:15', NULL),
('9bae6883-d349-499e-aa26-37f21752a6b3', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 146, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1146\"}', NULL, '2022-12-09 04:21:14', '2022-12-09 04:21:14', NULL),
('a004f2dd-c153-40f3-81fb-c3731c737dc6', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 91, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1091\"}', '2022-11-29 09:20:06', '2022-11-23 09:44:36', '2022-11-23 09:44:36', NULL),
('a35fec5e-f7f2-41df-9a23-7109ed7ddfcf', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 104, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1104\"}', NULL, '2022-12-01 09:00:06', '2022-12-01 09:00:06', NULL),
('a5e50efa-3fce-4a2d-906b-d3ddd006ebce', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 98, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1098\"}', NULL, '2022-12-01 08:09:52', '2022-12-01 08:09:52', NULL),
('a77d85e5-b283-4002-9cdc-3fcf23817635', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 173, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1173\"}', NULL, '2022-12-20 06:40:49', '2022-12-20 06:40:49', NULL),
('ab28e7f0-2e9a-4f63-8088-bc11aaa9929d', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 171, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1171\"}', NULL, '2022-12-20 06:19:25', '2022-12-20 06:19:25', NULL),
('ae27fdd2-acae-4a25-b5c8-a92d8e05bdfa', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 111, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1111\"}', NULL, '2022-12-01 09:18:34', '2022-12-01 09:18:34', NULL),
('af1535d3-64ab-43c0-9553-d5d06fab36c6', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 122, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1122\"}', NULL, '2022-12-03 08:47:34', '2022-12-03 08:47:34', NULL),
('b6694a57-8afe-4916-9c9d-b52d43c7e654', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 132, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1132\"}', NULL, '2022-12-06 11:48:09', '2022-12-06 11:48:09', NULL),
('b82f5080-4b73-4405-877b-561a817df05d', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 174, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1174\"}', NULL, '2022-12-20 07:07:24', '2022-12-20 07:07:24', NULL),
('b9d6d82f-4d35-40cf-96ae-28ddd2166648', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 165, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1165\"}', NULL, '2022-12-15 06:25:18', '2022-12-15 06:25:18', NULL),
('bab02185-2af9-4636-bc2c-42597ca1c8e3', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 107, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1107\"}', NULL, '2022-12-01 09:08:18', '2022-12-01 09:08:18', NULL),
('bf35c9b0-7152-4d43-a4de-ad9b08a1022f', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 172, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1172\"}', NULL, '2022-12-20 06:27:07', '2022-12-20 06:27:07', NULL),
('c08d6bdc-b6c6-4b71-b582-1b698b6afbed', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 127, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1127\"}', NULL, '2022-12-05 13:38:48', '2022-12-05 13:38:48', NULL),
('c50b3cda-425b-4ddf-9528-9ed37f5542ef', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 105, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1105\"}', NULL, '2022-12-01 09:04:52', '2022-12-01 09:04:52', NULL),
('c758fa90-087b-4ed6-88da-f2e5eefa8d7c', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 148, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1148\"}', NULL, '2022-12-10 15:27:03', '2022-12-10 15:27:03', NULL),
('cceec901-6924-4862-93ef-83357f7cbb77', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 126, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1126\"}', NULL, '2022-12-05 13:36:19', '2022-12-05 13:36:19', NULL),
('d1b8c0cf-650a-4796-90ba-2a0fd40a7afa', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 161, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1161\"}', NULL, '2022-12-15 06:18:35', '2022-12-15 06:18:35', NULL),
('d4e1f582-d12a-44d4-a69d-22d851ecae88', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 155, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1155\"}', NULL, '2022-12-15 05:28:58', '2022-12-15 05:28:58', NULL),
('d741de77-7a3b-44fc-acf4-dff7d1f05e6f', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 177, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1177\"}', NULL, '2023-02-08 11:59:14', '2023-02-08 11:59:14', NULL),
('d9af2d5d-2005-4540-99ff-62b44e5e4254', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 110, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1110\"}', NULL, '2022-12-01 09:14:16', '2022-12-01 09:14:16', NULL),
('da048911-fa82-470d-bcc5-331361b88b8f', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 87, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1087\"}', '2022-10-04 05:12:41', '2022-10-03 11:02:39', '2022-10-03 11:02:39', '2022-10-04 05:23:54'),
('dbbc152c-358f-4fe5-96d6-bec9b5c7720f', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 144, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1144\"}', NULL, '2022-12-09 02:48:06', '2022-12-09 02:48:06', NULL),
('dda04b5a-d18b-4ec2-afce-85af5c3c3187', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 151, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1151\"}', NULL, '2022-12-10 17:22:11', '2022-12-10 17:22:11', NULL),
('e02ac14e-ad24-424c-8249-71e90c331f76', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 154, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1154\"}', NULL, '2022-12-15 05:24:55', '2022-12-15 05:24:55', NULL),
('e29987a0-3ae7-4cc8-827d-7efb7250dce4', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 114, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1114\"}', NULL, '2022-12-01 09:51:16', '2022-12-01 09:51:16', NULL),
('e89ef744-f812-40f5-a6dc-85b80cda43c5', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 168, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1168\"}', NULL, '2022-12-18 05:55:47', '2022-12-18 05:55:47', NULL),
('ee21aacb-7577-4b2e-8e70-34636e6eadb2', 'App\\Notifications\\NewOrderNotification', 'App\\User', 1, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1086\"}', '2022-10-04 05:12:41', '2022-10-03 10:56:34', '2022-10-03 10:56:40', '2022-10-04 05:23:54'),
('f2bdafc4-46bc-42f1-a38e-02f5437800d1', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 158, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1158\"}', NULL, '2022-12-15 06:11:04', '2022-12-15 06:11:04', NULL),
('f52ae1b9-1f2a-485a-9b65-f1ed20620b9f', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 120, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1120\"}', NULL, '2022-12-03 08:31:50', '2022-12-03 08:31:50', NULL),
('f73c3a47-40c5-4ab2-acf6-6d738a236517', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 113, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1113\"}', NULL, '2022-12-01 09:23:56', '2022-12-01 09:23:56', NULL),
('f7c5b54f-f16d-4473-9c1f-bfdfda7b2831', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 163, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1163\"}', NULL, '2022-12-15 06:19:58', '2022-12-15 06:19:58', NULL),
('ff9f444d-ad61-4175-8e7c-b7d0903058a0', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Order', 108, '{\"data\":\"A new order has been placed.\",\"link\":\"http:\\/\\/localhost\\/cartpro\\/admin\\/order\\/details\\/1108\"}', NULL, '2022-12-01 09:10:19', '2022-12-01 09:10:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `reference_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `billing_first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_address_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_address_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `billing_city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_zip_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shipping_cost` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `coupon_id` bigint UNSIGNED DEFAULT NULL,
  `payment_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `currency_base_total` decimal(10,2) DEFAULT NULL,
  `currency_symbol` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delivery_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delivery_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `tax_id` int DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `reference_no`, `billing_first_name`, `billing_last_name`, `billing_email`, `billing_phone`, `billing_country`, `billing_address_1`, `billing_address_2`, `billing_city`, `billing_state`, `billing_zip_code`, `shipping_method`, `shipping_cost`, `payment_method`, `coupon_id`, `payment_id`, `discount`, `total`, `currency_base_total`, `currency_symbol`, `order_status`, `delivery_date`, `delivery_time`, `payment_status`, `date`, `tax_id`, `tax`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '1001', 'Test ff', 'gdgdgd', 'test144@gmail.com', '345345555355', 'United States', 'ggdg', 'fgeter', 'fdfg', 'dfgfdgf', 'fdgfd', 'free', '0', 'cash_on_delivery', NULL, '621e2d3cea259', NULL, '30.00', '30.00', '$', 'completed', '10/02/2022', '10:20 AM', 'pending', '2022-03-01', NULL, NULL, '2022-03-01 08:27:08', '2022-09-29 10:24:56', NULL),
(2, NULL, '1002', 'Test', 'Lasdsd', 'irfanchowdhury434@gmail.com', 'Test', 'Canada', 'dasdd', 'sad', 'dsads', 'sdsad', 'asdsa', 'free', '0', 'cash_on_delivery', NULL, '6225c483b512c', NULL, '200.00', '200.00', '$', 'pending', NULL, NULL, 'pending', '2022-03-07', NULL, NULL, '2022-03-07 02:38:27', '2022-07-04 09:11:01', NULL),
(3, 1, '1003', 'Promiq', 'Chowdhury', 'promi@gmail.com', '01829498634', 'United States', 'Ttes', 'Test', 'Ctesas', 'Caslia', '3456', 'free', '0', 'cash_on_delivery', NULL, '6228670bea345', NULL, '640.50', '640.50', '$', 'pending', NULL, NULL, 'pending', '2022-03-09', NULL, NULL, '2022-03-09 02:36:27', '2022-07-04 09:11:01', NULL),
(4, 1, '1004', 'Saimon', 'Khan', 'saimon@gmail.com', '01829498546', 'Bangladesh', 'Muradpur', 'Ma villa', 'Chittagong', 'Bnagladesh', '4430', 'free', '0', 'cash_on_delivery', NULL, '6229cbd268105', NULL, '710.00', '710.00', '$', 'pending', NULL, NULL, 'pending', '2022-03-10', 1, NULL, '2022-03-10 03:58:42', '2022-07-04 09:11:01', NULL),
(5, 1, '1005', 'Kafilus', 'Satter', 'kafil@gmail.com', '01829498651', 'Bangladesh', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', 'flat_rate', '15', 'cash_on_delivery', 1, '622a450d2c9c6', NULL, '930.00', '930.00', '$', 'pending', NULL, NULL, 'pending', '2022-03-10', 1, NULL, '2022-03-10 12:35:57', '2023-02-06 09:39:52', NULL),
(6, 1, '1006', 'Promi', 'Chowdhury', 'promi@gmail.com', '01993678742', 'Bangladesh', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', 'flat_rate', '15', 'cash_on_delivery', 1, '622a4e11513c9', '10.00', '1214.00', '1214.00', '$', 'pending', NULL, NULL, 'pending', '2022-03-10', 1, '10.00', '2022-03-10 13:14:25', '2023-02-06 09:39:52', NULL),
(7, 1, '1007', 'Promi', 'Chowdhury', 'promi@gmail.com', '01829498634', 'Bangladesh', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', 'flat_rate', '15', 'cash_on_delivery', 1, '622a4ebd7ce69', '10.00', '615.00', '615.00', '$', 'pending', NULL, NULL, 'pending', '2022-03-10', 1, '10.00', '2022-03-10 13:17:17', '2023-02-06 09:39:52', NULL),
(8, 1, '1008', 'Promi', 'Chowdhury', 'salman@gmail.com', '01993678742', 'Albania', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', '', '0', 'paypal', NULL, '622ba8524a90c', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-03-11', NULL, NULL, '2022-03-11 13:51:46', '2022-07-04 09:11:01', NULL),
(9, 1, '1009', 'Kafilus', 'Khan', 'kafil@gmail.com', '01993678742', 'Bangladesh', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', 'free', '0', 'paypal', NULL, '622ba8881f5f3', NULL, '10.01', '10.01', '$', 'pending', NULL, NULL, 'pending', '2022-03-11', 1, '10.00', '2022-03-11 13:52:40', '2022-07-04 09:11:01', NULL),
(12, 1, '1012', 'Saimon', 'Satter', 'promi@gmail.com', '01829498634', 'Angola', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', 'free', '0', 'paypal', NULL, '622baa58c1ddc', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-03-11', NULL, NULL, '2022-03-11 14:00:24', '2022-07-04 09:11:01', NULL),
(13, 1, '1013', 'Kamal', 'Satter', 'promi@gmail.com', '01829498634', 'Antarctica', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', 'free', '0', 'paypal', NULL, '622baf020eba7', NULL, '0.02', '0.02', '$', 'pending', NULL, NULL, 'pending', '2022-03-11', NULL, NULL, '2022-03-11 14:20:18', '2022-07-04 09:11:01', NULL),
(14, 1, '1014', 'dsds', 'dsdas', 'dsddas@gmail.com', '55354354435', 'United States', 'dsd', 'dadsa', 'dasd', 'dasd', 'dasd', '', NULL, 'cash_on_delivery', NULL, '622da473db43d', NULL, '229.99', '229.99', '$', 'pending', NULL, NULL, 'pending', '2022-03-13', NULL, NULL, '2022-03-13 01:59:47', '2022-07-04 09:11:01', NULL),
(15, 1, '1015', 'dsds', 'dsdas', 'dsddas@gmail.com', '55354354435', 'United States', 'dsd', 'dadsa', 'dasd', 'dasd', 'dasd', 'free', '0', 'cash_on_delivery', NULL, '622da5a21dc54', NULL, '229.99', '229.99', '$', 'pending', NULL, NULL, 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:04:50', '2022-07-04 09:11:01', NULL),
(16, 1, '1016', 'dsds', 'dsdas', 'dsddas@gmail.com', '55354354435', 'United States', 'dsd', 'dadsa', 'dasd', 'dasd', 'dasd', 'local_pickup', '10', 'cash_on_delivery', NULL, '622da5ca0d49e', NULL, '239.99', '239.99', '$', 'pending', NULL, NULL, 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:05:30', '2022-07-04 09:11:01', NULL),
(17, 1, '1017', 'dsds', 'dsdas', 'dsddas@gmail.com', '55354354435', 'United States', 'dsd', 'dadsa', 'dasd', 'dasd', 'dasd', 'free', '0', 'cash_on_delivery', NULL, '622da5e80c711', NULL, '229.99', '229.99', '$', 'pending', NULL, NULL, 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:06:00', '2022-07-04 09:11:01', NULL),
(18, 1, '1018', 'Irfan', 'cHY', 'irfanchowdhury@gmail.com', '989878779878979', 'Canada', 'nbmbmbmb', 'gjhghjg', 'jjjklj', 'ctg', '4330', 'free', '0', 'cash_on_delivery', NULL, '622da65218b02', NULL, '229.99', '229.99', '$', 'pending', NULL, NULL, 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:07:46', '2022-07-04 09:11:01', NULL),
(19, 1, '1019', 'Maisie', 'Browning', 'vozo@mailinator.com', '75', 'East Timor', '23 Rocky Nobel Road', 'Provident libero as', 'Voluptate repudianda', 'Vel est dolor quis s', '79983', 'free', '0', 'cash_on_delivery', NULL, '622da6ae8bcfe', NULL, '241.00', '241.00', '$', 'pending', NULL, NULL, 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:09:18', '2022-07-04 09:11:01', NULL),
(20, 1, '1020', 'test', 'tses', 'test154534@gmail.com', '21323131312', 'United States', 'fsd', 'fssf', 'fsddsfs', 'fssfdsfd', '3432', 'free', '0', 'cash_on_delivery', NULL, '622dae8861fc2', NULL, '229.99', '229.99', '$', 'pending', NULL, NULL, 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:42:48', '2022-07-04 09:11:01', NULL),
(21, 1, '1021', 'test', 'tses', 'test154534@gmail.com', '21323131312', 'United States', 'fsd', 'fssf', 'fsddsfs', 'fssfdsfd', '3432', 'free', '0', 'cash_on_delivery', NULL, '622dafdb11461', NULL, '229.99', '229.99', '$', 'pending', NULL, NULL, 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:48:27', '2022-07-04 09:11:01', NULL),
(25, NULL, '1025', 'test', 'test', 'tarik_17@yahoo.co.uk', '2231313', 'Bangladesh', '', '', '', '', '', 'free', '0', 'cash_on_delivery', NULL, '625147e21d6c7', NULL, '489.99', '489.99', '$', 'pending', NULL, NULL, 'pending', '2022-04-09', 1, '10.00', '2022-04-09 13:46:26', '2022-07-04 09:11:01', NULL),
(26, 1, '1026', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'cvvxvxc', 'fdsfsdfs', 'fsdsdf', 'fdsfs', '4561', 'free', '0', 'cash_on_delivery', NULL, '625cb81b82954', NULL, '210.00', '210.00', '$', 'pending', NULL, NULL, 'pending', '2022-04-18', 1, '10.00', '2022-04-18 06:00:11', '2022-07-04 09:11:01', NULL),
(27, 1, '1027', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Muradpur', 'Test', 'Test', 'Test', '4336', 'free', '0', 'cash_on_delivery', NULL, '62639e69b543b', NULL, '210.00', '210.00', '$', 'pending', NULL, NULL, 'pending', '2022-04-23', 1, '10.00', '2022-04-23 06:36:25', '2022-07-04 09:11:01', NULL),
(28, 49, '1028', 'Harding', 'Delgado', 'irfan95@mailinator.com', '21323131312', 'Bangladesh', 'Test', 'Test', 'Test', 'Test', '4330', 'free', '0', 'cash_on_delivery', NULL, '6263a5ea93c70', NULL, '210.00', '210.00', '$', 'pending', NULL, NULL, 'pending', '2022-04-23', 1, '10.00', '2022-04-23 07:08:26', '2022-07-04 09:11:01', NULL),
(29, 1, '1029', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Test', 'Test', 'Test', 'Test', '7896', 'free', '0', 'cash_on_delivery', NULL, '6264d7577036f', NULL, '110.00', '110.00', '$', 'pending', NULL, NULL, 'pending', '2022-04-24', 1, '10.00', '2022-04-24 04:51:35', '2022-07-04 09:11:02', NULL),
(30, 1, '1030', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Test', 'Test', 'Test', 'Test', '3432', 'free', '0', 'cash_on_delivery', NULL, '6264dc54c060d', NULL, '110.00', '110.00', '$', 'pending', NULL, NULL, 'pending', '2022-04-24', 1, '10.00', '2022-04-24 05:12:52', '2022-07-04 09:11:02', NULL),
(31, 1, '1031', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Muradpur', 'Ismail Colony', 'Chittagong', 'Chittagong', '4330', 'local_pickup', '10', 'cash_on_delivery', NULL, '6264ec7e1146b', NULL, '748.00', '748.00', '$', 'pending', NULL, NULL, 'pending', '2022-04-24', 1, '10.00', '2022-04-24 06:21:50', '2022-07-04 09:11:02', NULL),
(32, 1, '1032', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Test', 'fsdfsd', 'fsdfsd', 'fsdfsf', '553', 'local_pickup', '10', 'paystack', NULL, '626ecd8b5cb46', NULL, '449.99', '449.99', '$', 'pending', NULL, NULL, 'pending', '2022-05-02', 1, '10.00', '2022-05-01 18:12:27', '2022-07-04 09:11:02', NULL),
(33, 1, '1033', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Test', 'fsdfsd', 'fsdfsd', 'fsdfsf', '553', 'local_pickup', '10', 'paystack', NULL, '626ed18ed9b5e', NULL, '220.00', '220.00', '$', 'pending', NULL, NULL, 'pending', '2022-05-02', 1, '10.00', '2022-05-01 18:29:34', '2022-07-04 09:11:02', NULL),
(34, 1, '1034', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Test', 'fsdfsd', 'fsdfsd', 'fsdfsf', '553', 'local_pickup', '10', 'paystack', NULL, '626ed1cca22d3', NULL, '220.00', '220.00', '$', 'pending', NULL, NULL, 'pending', '2022-05-02', 1, '10.00', '2022-05-01 18:30:36', '2022-07-04 09:11:02', NULL),
(35, 1, '1035', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Test', 'fsdfsd', 'fsdfsd', 'fsdfsf', '553', 'local_pickup', '10', 'paystack', NULL, '626ed5e688cc6', NULL, '220.00', '220.00', '$', 'pending', NULL, NULL, 'pending', '2022-05-02', 1, '10.00', '2022-05-01 18:48:06', '2022-07-04 09:11:02', NULL),
(36, 1, '1036', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Modonhat', 'Fatehpur', 'Chittagong', 'Chittagong', '553', 'local_pickup', '10', 'paystack', NULL, '626ed66ab4a2e', NULL, '75.00', '75.00', '$', 'pending', NULL, NULL, 'pending', '2022-05-02', 1, '10.00', '2022-05-01 18:50:18', '2022-07-04 09:11:02', NULL),
(37, 1, '1037', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Test', 'fsdfsd', 'fsdfsd', 'fsdfsf', '553', 'local_pickup', '10', 'paystack', NULL, '626ed72c080ae', NULL, '220.00', '220.00', '$', 'pending', NULL, NULL, 'pending', '2022-05-02', 1, '10.00', '2022-05-01 18:53:32', '2022-07-04 09:11:02', NULL),
(38, 1, '1038', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Test', 'Fatehpur', 'fsdfsd', 'Chittagong', '553', 'local_pickup', '10', 'paystack', NULL, '626eda7b7161c', NULL, '220.00', '220.00', '$', 'pending', NULL, NULL, 'pending', '2022-05-02', 1, '10.00', '2022-05-01 19:07:39', '2022-07-04 09:11:02', NULL),
(39, 1, '1039', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Test', 'Fatehpur', 'Chittagong', 'fsdfsf', '553', 'local_pickup', '10', 'cash_on_delivery', NULL, '626ee55d50432', NULL, '1340.00', '1340.00', '$', 'pending', NULL, NULL, 'pending', '2022-05-02', 1, '10.00', '2022-05-01 19:54:05', '2022-07-04 09:11:02', NULL),
(40, 1, '1040', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'fdfd', 'gfdgdf', 'gfdgdf', 'ggfdg', '34534', 'free', '0', 'paystack', NULL, '629d85b0da22e', NULL, '409.95', '409.95', '$', 'pending', NULL, NULL, 'pending', '2022-06-06', 1, '10.00', '2022-06-06 04:42:24', '2022-10-31 06:22:08', '2022-10-31 06:22:08'),
(41, 1, '1041', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'dfgdgd', 'gfdgfd', 'dgdfgdf', 'gfsdgfd', '534', 'free', '0', 'paystack', NULL, '629d85dba4938', NULL, '160.00', '160.00', '$', 'pending', NULL, NULL, 'pending', '2022-06-06', 1, '10.00', '2022-06-06 04:43:07', '2022-07-04 09:11:02', NULL),
(42, 1, '1042', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'ggfgd', 'fsdfsdfsd', 'sdfsfsd', 'sdfsdf', '4342', 'free', '0', 'paystack', NULL, '629d8695e3b52', NULL, '10.01', '10.01', '$', 'delivery_scheduled', '06/30/2022', '06:30 PM', 'pending', '2022-06-06', 1, '10.00', '2022-06-06 04:46:13', '2022-07-04 09:11:02', NULL),
(43, 1, '1043', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'fdfd', 'fsdfsd', 'sdsdsdfsd', 'sfsdfsd', '4342', 'free', '0', 'cash_on_delivery', NULL, '629f013c21efa', NULL, '480.00', '480.00', '$', 'pending', '06/30/2022', '05:30 PM', 'pending', '2022-06-07', 1, '10.00', '2022-06-07 07:41:48', '2022-07-04 09:11:02', NULL),
(44, 1, '1044', 'Tarik', 'Iqbal', 'irfanchowdhury434@gmail.com', '01924756759', 'Bangladesh', 'Chittagong', 'czxc', 'Dhaka', 'Chittagong', '4330', 'local_pickup', '10', 'cash_on_delivery', NULL, '62adaed29601f', NULL, '170.00', '170.00', '$', 'pending', NULL, NULL, 'pending', '2022-06-18', 1, '10.00', '2022-06-18 10:54:10', '2022-07-04 09:11:02', NULL),
(45, 1, '1045', 'Tarik', 'Iqbal', 'irfanchowdhury434@gmail.com', '01924756759', 'Bangladesh', 'Chittagong', 'dasdasd', 'Dhaka', 'Chittagong', '4343', 'local_pickup', '10', 'cash_on_delivery', NULL, '62adb13d184b9', NULL, '75.00', '75.00', '$', 'pending', NULL, NULL, 'pending', '2022-06-18', 1, '10.00', '2022-06-18 11:04:29', '2022-07-04 09:11:02', NULL),
(46, 1, '1046', 'Tarik', 'Iqbal', 'tarik@lion-coders.com', '01924756759', 'Bangladesh', 'Chittagong', 'fddfdf', 'Dhaka', 'Chittagong', '4330', 'free', '0', 'cash_on_delivery', NULL, '62adb28f641a6', NULL, '160.00', '160.00', '$', 'pending', NULL, NULL, 'pending', '2022-06-18', 1, '10.00', '2022-06-18 11:10:07', '2022-07-04 09:11:02', NULL),
(47, 1, '1047', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Test', 'fffdf', 'Chittagong', 'Chittagong', '4330', 'free', '0', 'cash_on_delivery', NULL, '62adb2ef1168e', NULL, '160.00', '160.00', '$', 'pending', NULL, NULL, 'pending', '2022-06-18', 1, '10.00', '2022-06-18 11:11:43', '2022-07-04 09:11:02', NULL),
(48, 1, '1048', 'Irfan', 'Chowdhury', 'irfanchowdhury80@gmail.com', '12313131', 'Bangladesh', 'gfdgfd', 'gdf', 'gd', 'Chittagong', '5454', 'free', '0', 'cash_on_delivery', NULL, '62aec959728d3', NULL, '160.00', '160.00', '$', 'pending', NULL, NULL, 'pending', '2022-06-19', 1, '10.00', '2022-06-19 06:59:37', '2022-07-04 09:11:02', NULL),
(49, 1, '1049', 'Irfan', 'Chowdhury', 'irfanchowdhury80@gmail.com', '12313131', 'Bangladesh', 'gfdgfd', 'gdf', 'gd', 'Chittagong', '5454', 'free', '0', 'cash_on_delivery', NULL, '62aeca590c50a', NULL, '160.00', '160.00', '$', 'pending', NULL, NULL, 'pending', '2022-06-19', 1, '10.00', '2022-06-19 07:03:53', '2022-07-04 09:11:02', NULL),
(50, 1, '1050', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Test', 'sfsdf', 'sfsdf', 'sfsdfsd', '4564', 'free', '0', 'cash_on_delivery', NULL, '62badb3e6073d', NULL, '1165.00', '1165.00', '$', 'pending', NULL, NULL, 'pending', '2022-06-28', 1, '10.00', '2022-06-28 10:43:10', '2022-07-04 09:11:02', NULL),
(51, 1, '1051', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', '', '', '', '', '', 'free', '0', 'cash_on_delivery', 1, '62c0166ab8a1b', '10.00', '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-02', 1, '10.00', '2022-07-02 09:56:58', '2023-02-06 09:39:52', NULL),
(52, 1, '1052', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', '', '', '', '', '', 'free', '0', 'cash_on_delivery', 1, '62c016da6b254', '10.00', '160.00', '160.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-02', 1, '10.00', '2022-07-02 09:58:50', '2023-02-06 09:39:52', NULL),
(53, 1, '1053', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', '', '', '', '', '', 'free', '0', 'cash_on_delivery', 1, '62c0175edab53', '10.00', '160.00', '160.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-02', 1, '10.00', '2022-07-02 10:01:02', '2023-02-06 09:39:52', NULL),
(54, 1, '1054', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', '', '', '', '', '', 'free', '0', 'cash_on_delivery', 1, '62c017d7a7ef8', '10.00', '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-02', 1, '10.00', '2022-07-02 10:03:03', '2023-02-06 09:39:52', NULL),
(55, 1, '1055', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', '', '', '', '', '', 'free', '0', 'cash_on_delivery', 1, '62c018198ea18', '10.00', '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-02', 1, '10.00', '2022-07-02 10:04:09', '2023-02-06 09:39:52', NULL),
(56, 1, '1056', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', '', '', '', '', '', 'free', '0', 'cash_on_delivery', 1, '62c0187bd0d20', '10.00', '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-02', 1, '10.00', '2022-07-02 10:05:47', '2023-02-06 09:39:52', NULL),
(57, 1, '1057', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', '', '', '', '', '', 'free', '0', 'cash_on_delivery', 1, '62c1412947d21', '10.00', '300.00', '300.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-03', 1, '10.00', '2022-07-03 07:11:37', '2023-02-06 09:39:52', NULL),
(58, 1, '1058', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', '', '', '', '', '', 'free', '0', 'cash_on_delivery', 1, '62c141b46c940', '10.00', '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-03', 1, '10.00', '2022-07-03 07:13:56', '2023-02-06 09:39:52', NULL),
(59, 1, '1059', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', '', '', '', '', '', 'free', '0', 'cash_on_delivery', NULL, '62c1423cd1096', NULL, '160.00', '160.00', '$', 'delivery_scheduled', NULL, NULL, 'pending', '2022-07-03', 1, '10.00', '2022-07-03 07:16:12', '2022-07-04 09:11:02', NULL),
(60, 1, '1060', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Hathazary Road', 'Madanhat', 'Chittagong', 'Chittagong', '4330', 'local_pickup', '10', 'cash_on_delivery', 1, '62c15ac739bac', '10.00', '480.00', '480.00', '$', 'pending', '', '', 'pending', '2022-07-03', 1, '10.00', '2022-07-03 09:00:55', '2023-02-06 09:39:52', NULL),
(61, 1, '1061', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Hathazary Road', 'Khondokar Bari', 'Chittagong City', 'Chittagong', '4330', 'flat_rate', '15', 'cash_on_delivery', 1, '62c15f8374b1a', '10.00', '565.00', '565.00', '$', 'order_placed', '', '', 'pending', '2022-07-03', 1, '10.00', '2022-07-03 09:21:07', '2023-02-06 09:39:52', NULL),
(66, 1, '1066', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Antarctica', 'fsfssdf', 'fsfsf', 'Chittagong', 'Chittagong', '4242', '', NULL, 'cash_on_delivery', NULL, '62dbbe3e46a15', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-23', NULL, NULL, '2022-07-23 09:24:14', '2022-07-23 09:24:14', NULL),
(67, 1, '1067', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Antarctica', 'fsfssdf', 'fsfsf', 'Chittagong', 'Chittagong', '4242', '', NULL, 'cash_on_delivery', NULL, '62dbbe7d6fc7d', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-23', NULL, NULL, '2022-07-23 09:25:17', '2022-07-23 09:25:17', NULL),
(68, NULL, '1068', 'Salah', 'Uddin', 'salah@gmail.com', '223223434232', 'Canada', 'dasda', 'asdasdsa', 'Chittagong', 'Chittagong', '3434', '', NULL, 'cash_on_delivery', NULL, '62dbbf413df5f', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-23', NULL, NULL, '2022-07-23 09:28:33', '2022-07-23 09:28:33', NULL),
(69, NULL, '1069', 'dasasdasad', 'ddasa', 'isa@cazasouq.com', '53455354', 'Azerbaijan', 'dsdada', 'sdasd', 'dasdas', 'dasdsd4234', '4234', '', NULL, 'cash_on_delivery', NULL, '62dbc06caf194', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-23', NULL, NULL, '2022-07-23 09:33:32', '2022-07-23 09:33:32', NULL),
(70, NULL, '1070', 'sdfsdfs', 'sfsdf', 'fsfsfs@gmail.com', '42344', 'Austria', 'dsda', 'dasdad', 'dsdas', 'sdas', '4343', '', NULL, 'cash_on_delivery', NULL, '62dbc38519d64', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-23', NULL, NULL, '2022-07-23 09:46:45', '2022-07-23 09:46:45', NULL),
(71, NULL, '1071', 'aads', 'dsfsdfs', 'isa@cazasousdsq.com', '34424', 'Bangladesh', 'effsdfs', 'sdfdfs', 'fsf', 'fsfsds', '23324', '', NULL, 'cash_on_delivery', NULL, '62dbc3d41ef5e', NULL, '310.00', '310.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-23', 1, '10.00', '2022-07-23 09:48:04', '2022-07-23 09:48:04', NULL),
(72, NULL, '1072', 'sdfsdfs', 'sfsdf', 'fsfsfsdsdsdss@gmail.com', '42344', 'Austria', 'dsda', 'dasdad', 'dsdas', 'xx', '4343', '', NULL, 'cash_on_delivery', NULL, '62dbc4311f0b3', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-23', NULL, NULL, '2022-07-23 09:49:37', '2022-07-23 09:49:37', NULL),
(73, NULL, '1073', 'sdfsdfs', 'zcczx', 'zxxdczxc@gmail.com', '42344', 'Austria', 'dsda', 'dasdad', 'dsdas', 'ddsa', '4343', '', NULL, 'cash_on_delivery', NULL, '62dbc5b3a1c25', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-23', NULL, NULL, '2022-07-23 09:56:03', '2022-07-23 09:56:03', NULL),
(74, NULL, '1074', 'sdfsdfs', 'sfsdf', 'fsfsssadssfs@gmail.com', '42344', 'Austria', 'dsda', 'dasdad', 'dsdas', 'czxc', '4343', '', NULL, 'cash_on_delivery', NULL, '62dbc65f1bdc3', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-07-23', NULL, NULL, '2022-07-23 09:58:55', '2022-07-23 09:58:55', NULL),
(75, 1, '1075', 'Irfan', 'Chowdhury', 'irfanchowdhury80@gmail.com', '12313131', 'Canada', 'ffsdfsfs', '', 'sdffsd', 'fsdfs', '2332', 'free', '0', 'cash_on_delivery', NULL, '6321572cc6294', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-09-14', NULL, NULL, '2022-09-14 04:23:08', '2022-10-31 06:17:10', '2022-10-31 06:17:10'),
(76, NULL, '1076', 'Md', 'Chowdhury', 'irfanchowdhury80@gmail.com', '01829498634', 'Canada', 'ffsdfsfs', '', 'sdffsd', '', '2332', 'free', '0', 'cash_on_delivery', NULL, '632159eb3f142', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-09-14', NULL, NULL, '2022-09-14 04:34:51', '2022-10-31 06:12:30', '2022-10-31 06:12:30'),
(77, 1, '1077', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Afghanistan', 'fsdsd', 'fsfs', 'fsdff', 'sdfsd', '2234', 'free', '0', 'cash_on_delivery', NULL, '632ec5db963ca', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-09-24', NULL, NULL, '2022-09-24 08:54:51', '2022-09-24 08:54:51', NULL),
(78, 1, '1078', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Algeria', 'sfssdssdf', 'fsdsdsdfsd', 'fsdsdfs', 'sdfsdfs', '3324', 'free', '0', 'cash_on_delivery', NULL, '632ec625318e1', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-09-24', NULL, NULL, '2022-09-24 08:56:05', '2022-09-24 08:56:05', NULL),
(79, 1, '1079', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Albania', 'dgddfgd', 'gfdgfd', 'dfgdd', 'gdfgfd', '5446', 'free', '0', 'cash_on_delivery', NULL, '632fd09d313fb', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-09-25', NULL, NULL, '2022-09-25 03:53:01', '2022-10-31 05:57:01', '2022-10-31 05:57:01'),
(80, 1, '1080', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Canada', 'fsfsfs', 'sdffs', 'sdfsdf', 'sdfsdf', '34334', 'free', '0', 'cash_on_delivery', NULL, '632fd449081a7', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-09-25', NULL, NULL, '2022-09-25 04:08:41', '2022-10-31 05:53:17', '2022-10-31 05:53:17'),
(81, 1, '1081', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Algeria', 'fdsffs', 'fdsfsd', 'fsdfsd', 'fdsfsd', '35435', 'free', '0', 'cash_on_delivery', NULL, '632ff0dfc986a', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-09-25', NULL, NULL, '2022-09-25 06:10:39', '2022-10-31 05:54:26', '2022-10-31 05:54:26'),
(82, 1, '1082', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Afghanistan', 'sdssf', 'fsdfs', 'fsds', 'fsdfsd', '3344', 'free', '0', 'cash_on_delivery', NULL, '632ff2e801726', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-09-25', NULL, NULL, '2022-09-25 06:19:20', '2022-10-31 05:49:32', '2022-10-31 05:49:32'),
(83, 1, '1083', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Mehernega Road', 'Mofzal Member Bari', 'Chittagong', 'Bangladesh', '4330', 'flat_rate', '15', 'cash_on_delivery', 1, '63329ecf81c75', '10.00', '15.02', '15.02', '$', 'pending', NULL, NULL, 'pending', '2022-09-27', 1, '10.00', '2022-09-27 06:57:19', '2023-02-06 09:39:52', NULL),
(84, 1, '1084', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Mehernega Road', 'Mofzal Member Bari', 'Chittagong', 'Bangladesh', '4330', 'flat_rate', '15', 'cash_on_delivery', 1, '63329eed05f8b', '10.00', '15.02', '15.02', '$', 'pending', NULL, NULL, 'pending', '2022-09-27', 1, '10.00', '2022-09-27 06:57:49', '2023-02-06 09:39:52', NULL),
(85, 1, '1085', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'Test', 'Test', 'Chittagong', 'Bangladedh', '4330', 'local_pickup', '10', 'cash_on_delivery', 1, '6332a4bec6c33', '10.00', '160.03', '160.03', '$', 'pending', NULL, NULL, 'pending', '2022-09-27', 1, '10.00', '2022-09-27 07:22:38', '2023-02-06 09:39:52', NULL),
(86, 1, '1086', 'Irfan', 'Chowdhury', 'irfanchowdhury80@gmail.com', '12313131', 'Bangladesh', 'sdsssdfds', 'fdsfsd', 'fsdfsd', 'fsdfsf', '4330', 'flat_rate', '15', 'cash_on_delivery', 1, '6332d44d958cc', '10.00', '165.00', '165.00', '$', 'pending', NULL, '10:20AM', 'pending', '2022-09-27', 1, '10.00', '2022-09-27 10:45:33', '2023-02-06 09:39:52', NULL),
(87, 1, '1087', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Antarctica', 'gdfgd', 'gfdgfd', 'dfgfg', 'gdfg', '5543', 'local_pickup', '10', 'cash_on_delivery', NULL, '633ac144b2d16', NULL, '10.01', '10.01', '$', 'pending', NULL, NULL, 'pending', '2022-10-03', NULL, NULL, '2022-10-03 11:02:28', '2022-10-03 11:02:28', NULL),
(88, 1, '1088', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Afghanistan', 'gfgf', 'gfdgfd', 'gfdgf', 'dfgfdg', '34534', 'free', '0', 'cash_on_delivery', NULL, '633ac332581b6', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-10-03', NULL, NULL, '2022-10-03 11:10:42', '2022-10-03 11:10:42', NULL),
(89, 1, '1089', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Albania', 'ghhghf', 'hfgh', 'hgfhgf', 'hfgh', '6456', 'local_pickup', '10', 'cash_on_delivery', NULL, '633ac3a277652', NULL, '160.00', '160.00', '$', 'pending', NULL, NULL, 'pending', '2022-10-03', NULL, NULL, '2022-10-03 11:12:34', '2022-10-03 11:12:34', NULL),
(90, 1, '1090', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Angola', 'Test', 'sesef', 'fsdfsd', 'fsdsdf', '455', 'free', '0', 'cash_on_delivery', NULL, '633be3b9bfbe9', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-10-04', NULL, NULL, '2022-10-04 07:41:45', '2022-10-31 05:47:09', '2022-10-31 05:47:09'),
(91, 1, '1091', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Bangladesh', 'ghhf', 'hgfh', 'hfgh', 'hfgh', '4334', 'free', '0', 'cash_on_delivery', NULL, '637deb7a1e896', NULL, '10.01', '10.01', '$', 'pending', NULL, NULL, 'pending', '2022-11-23', 1, '10.00', '2022-11-23 09:44:26', '2022-11-23 09:44:26', NULL),
(92, 1, '1092', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Antigua and/or Barbuda', 'fhgfhh', 'hfghfgh', 'hgfhgf', 'hfhf', '4330', 'free', '0', 'stripe', NULL, '637f024ad747b', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-11-24', NULL, NULL, '2022-11-24 05:34:02', '2022-11-24 05:34:02', NULL),
(93, 1, '1093', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Algeria', 'fdgdfgd', 'dfgfdg', 'gdfgd', 'dfgfdg', '5435', 'free', '0', 'stripe', NULL, '63884aa86525e', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 06:33:12', '2022-12-01 06:33:12', NULL),
(94, 1, '1094', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Albania', 'bcbcvbc', 'bcvbvc', 'bvcbvc', 'bcb', '4234', 'free', '0', 'stripe', NULL, '63884bf3eb36a', NULL, '1.00', '1.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 06:38:43', '2022-12-01 06:38:43', NULL),
(95, 1, '1095', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Afghanistan', 'TEst', 'tsets', 'tests', 'tests', '4343', 'free', '0', 'stripe', NULL, '63884f3e230af', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 06:52:46', '2022-12-01 06:52:46', NULL),
(96, 1, '1096', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Afghanistan', 'TEst', 'tsets', 'tests', 'tests', '4343', 'free', '0', 'stripe', NULL, '63884f3e3bfb8', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 06:52:46', '2022-12-01 06:52:46', NULL),
(97, 1, '1097', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Albania', 'gfdgd', 'gdfgd', 'gdfgdf', 'gdfgdf', '3432', 'free', '0', 'stripe', NULL, '6388516aecf28', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 07:02:02', '2022-12-01 07:02:02', NULL),
(98, 1, '1098', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Algeria', 'gfdgdgd', 'gfdgfg', 'gdfgfd', 'gdfgfd', '3434', 'free', '0', 'stripe', NULL, '63886147ad983', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 08:09:43', '2022-12-01 08:09:43', NULL),
(105, 1, '1105', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Albania', 'fggd', 'gfdgdf', 'gfdgfd', 'gdfgfd', '4534', 'free', '0', 'stripe', NULL, '63886e2e86d05', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 09:04:46', '2022-12-01 09:04:52', '2022-12-01 09:04:52'),
(106, 1, '1106', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Canada', 'fsdfsd', 'fsdfsdf', 'fsdfsd', 'fsdf', '4343', 'free', '0', 'stripe', NULL, '63886ee587a12', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 09:07:49', '2022-12-01 09:07:49', NULL),
(107, 1, '1107', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Canada', 'fsdfsd', 'fsdfsdf', 'fsdfsd', 'fsdf', '4343', 'free', '0', 'stripe', NULL, '63886efd6b3b3', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 09:08:13', '2022-12-01 09:08:13', NULL),
(108, 1, '1108', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Argentina', 'xsdsd', 'dsfsdf', 'sfsdf', 'wer', '3434', 'free', '0', 'stripe', NULL, '63886f762d8da', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 09:10:14', '2022-12-01 09:10:14', NULL),
(109, 1, '1109', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Argentina', 'xsdsd', 'dsfsdf', 'sfsdf', 'wer', '3434', 'free', '0', 'stripe', NULL, '6388702ab6e1a', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 09:13:14', '2022-12-01 09:13:14', NULL),
(110, 1, '1110', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Argentina', 'xsdsd', 'dsfsdf', 'sfsdf', 'wer', '3434', 'free', '0', 'stripe', NULL, '6388706259d46', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 09:14:10', '2022-12-01 09:14:17', '2022-12-01 09:14:17'),
(111, 1, '1111', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Argentina', 'xsdsd', 'dsfsdf', 'sfsdf', 'wer', '3434', 'free', '0', 'stripe', NULL, '63887164cb8ed', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 09:18:28', '2022-12-01 09:18:35', '2022-12-01 09:18:35'),
(112, 1, '1112', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Argentina', 'xsdsd', 'dsfsdf', 'sfsdf', 'wer', '3434', 'free', '0', 'stripe', NULL, '63887198002e7', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 09:19:20', '2022-12-01 09:19:26', '2022-12-01 09:19:26'),
(113, 1, '1113', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Argentina', 'xsdsd', 'dsfsdf', 'sfsdf', 'wer', '3434', 'free', '0', 'stripe', NULL, '638872a728bfd', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 09:23:51', '2022-12-01 09:23:51', NULL),
(114, 1, '1114', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Argentina', 'xsdsd', 'dsfsdf', 'sfsdf', 'wer', '3434', 'free', '0', 'stripe', NULL, '6388790e3593a', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 09:51:10', '2022-12-01 09:51:10', NULL),
(115, 1, '1115', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Argentina', 'xsdsd', 'dsfsdf', 'sfsdf', 'wer', '3434', 'free', '0', 'stripe', NULL, '6388798b72f1a', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 09:53:15', '2022-12-01 09:53:21', '2022-12-01 09:53:21'),
(116, 1, '1116', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Argentina', 'xsdsd', 'dsfsdf', 'sfsdf', 'wer', '3434', 'free', '0', 'stripe', NULL, '638879b9c3a2a', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 09:54:01', '2022-12-01 09:54:08', '2022-12-01 09:54:08'),
(117, 1, '1117', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Algeria', 'hghhfghf', 'hgfhgf', 'hgfhfg', 'hfgh', '4321', 'free', '0', 'stripe', NULL, '638886c4955ee', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-01', NULL, NULL, '2022-12-01 10:49:40', '2022-12-01 10:49:40', NULL),
(118, 1, '1118', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Albania', 'fggfd', 'gdfgdfg', 'gfdg', 'gdfg', '4564', 'free', '0', 'paypal', NULL, '638af5acc9311', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-03', NULL, NULL, '2022-12-03 07:07:24', '2022-12-03 07:07:24', NULL),
(119, 1, '1119', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Afghanistan', 'sddsfd', 'fdsfdsfsd', 'fdsfs', 'fdsfsf', '2424', 'free', '0', 'paypal', NULL, '638b08a864987', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-03', NULL, NULL, '2022-12-03 08:28:24', '2022-12-03 08:28:24', NULL),
(120, 1, '1120', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Afghanistan', 'fgfdgdgdsdasasdasdadasd', 'dssaasd', 'dasdas', 'dasd', '342', 'free', '0', 'paypal', NULL, '638b0970363f8', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-03', NULL, NULL, '2022-12-03 08:31:44', '2022-12-03 08:31:44', NULL),
(122, 1, '1122', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Albania', 'dfsd', 'fsd', 'fsdsd', 'sdfs', '354', 'free', '0', 'paypal', NULL, '638b0d20b5cf1', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-03', NULL, NULL, '2022-12-03 08:47:28', '2022-12-03 08:47:28', NULL),
(123, 1, '1123', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Afghanistan', 'dfgdf', 'fgdfdf', 'dsgfd', 'gddfgfdg', '4344', 'free', '0', 'paypal', NULL, '638b0fe04b951', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-03', NULL, NULL, '2022-12-03 08:59:12', '2022-12-03 08:59:12', NULL),
(124, 1, '1124', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'sslcommerz', NULL, '638d965fad5ee', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-05', NULL, NULL, '2022-12-05 06:57:35', '2022-12-05 06:57:35', NULL),
(125, 1, '1125', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'cash_on_delivery', NULL, '638df26fc8cad', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-05', NULL, NULL, '2022-12-05 13:30:23', '2022-12-05 13:30:23', NULL),
(126, 1, '1126', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'cash_on_delivery', NULL, '638df3ca6ab61', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-05', NULL, NULL, '2022-12-05 13:36:10', '2022-12-05 13:36:10', NULL),
(127, 1, '1127', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'cash_on_delivery', NULL, '638df46078278', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-05', NULL, NULL, '2022-12-05 13:38:40', '2022-12-05 13:38:40', NULL),
(128, 1, '1128', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'cash_on_delivery', NULL, '638df541790ae', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-05', NULL, NULL, '2022-12-05 13:42:25', '2022-12-05 13:42:25', NULL),
(129, 1, '1129', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'sslcommerz', NULL, '638ebfccbd6e7', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'complete', '2022-12-06', NULL, NULL, '2022-12-06 04:06:36', '2022-12-06 04:07:31', NULL),
(130, 1, '1130', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'cash_on_delivery', NULL, '638f2b5fea422', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-06', NULL, NULL, '2022-12-06 11:45:35', '2022-12-06 11:48:24', '2022-12-06 11:48:24'),
(131, 1, '1131', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'cash_on_delivery', NULL, '638f2b972ca4e', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-06', NULL, NULL, '2022-12-06 11:46:31', '2022-12-06 11:48:29', '2022-12-06 11:48:29'),
(132, 1, '1132', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'cash_on_delivery', NULL, '638f2bf020771', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-06', NULL, NULL, '2022-12-06 11:48:00', '2022-12-06 11:48:34', '2022-12-06 11:48:34'),
(133, 1, '1133', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'cash_on_delivery', NULL, '638f2c3a77d05', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-06', NULL, NULL, '2022-12-06 11:49:14', '2022-12-06 11:49:14', NULL),
(134, 1, '1134', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'cash_on_delivery', NULL, '638f2e1bdf97b', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-06', NULL, NULL, '2022-12-06 11:57:15', '2022-12-06 11:57:15', NULL),
(137, 1, '1137', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '6391bc7ecb7f5', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-08', NULL, NULL, '2022-12-08 10:29:18', '2022-12-08 10:29:18', NULL),
(138, 1, '1138', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '6391e46e403cb', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-08', NULL, NULL, '2022-12-08 13:19:42', '2022-12-08 13:19:42', NULL),
(139, 1, '1139', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '6391e5689bb74', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-08', NULL, NULL, '2022-12-08 13:23:52', '2022-12-08 13:23:52', NULL),
(140, 1, '1140', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'cash_on_delivery', NULL, '6391e668842c2', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-08', NULL, NULL, '2022-12-08 13:28:08', '2022-12-08 13:28:08', NULL),
(141, 1, '1141', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '63929ec2a1beb', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-09', NULL, NULL, '2022-12-09 02:34:42', '2022-12-09 02:34:42', NULL),
(142, 1, '1142', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '63929f7ac82e9', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-09', NULL, NULL, '2022-12-09 02:37:46', '2022-12-09 02:37:46', NULL),
(143, 1, '1143', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '6392a1ae31f1c', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-09', NULL, NULL, '2022-12-09 02:47:10', '2022-12-09 02:47:10', NULL),
(144, 1, '1144', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '6392a1ddeaadc', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-09', NULL, NULL, '2022-12-09 02:47:57', '2022-12-09 02:47:57', NULL),
(145, 1, '1145', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '6392a2106a4c1', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-09', NULL, NULL, '2022-12-09 02:48:48', '2022-12-09 02:48:48', NULL),
(146, 1, '1146', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '6392b7b05d03d', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-09', NULL, NULL, '2022-12-09 04:21:04', '2022-12-09 04:21:04', NULL),
(147, 1, '1147', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '6394a3ef8682e', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-10', NULL, NULL, '2022-12-10 15:21:19', '2022-12-10 15:21:19', NULL),
(148, 1, '1148', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '6394a53e07bfe', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-10', NULL, NULL, '2022-12-10 15:26:54', '2022-12-10 15:26:54', NULL),
(149, 1, '1149', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '6394a5e7c6e3a', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-10', NULL, NULL, '2022-12-10 15:29:43', '2022-12-10 15:29:43', NULL),
(150, 1, '1150', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '6394aa86aa368', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-10', NULL, NULL, '2022-12-10 15:49:26', '2022-12-10 15:49:26', NULL),
(151, 1, '1151', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'stripe', NULL, '6394c03b679c3', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-10', NULL, NULL, '2022-12-10 17:22:03', '2022-12-10 17:22:03', NULL),
(152, 1, '1152', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paypal', NULL, '63980a0096dd0', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-13', NULL, NULL, '2022-12-13 05:13:36', '2022-12-13 05:13:36', NULL),
(153, 1, '1153', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paystack', NULL, '2366966496', NULL, '0.01', '0.01', '$', 'order_completed', NULL, NULL, 'order_completed', '2022-12-15', NULL, NULL, '2022-12-15 04:22:48', '2022-12-15 04:23:19', NULL),
(154, 1, '1154', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paystack', NULL, '639aaf9e23cc3', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-15', NULL, NULL, '2022-12-15 05:24:46', '2022-12-15 05:25:10', '2022-12-15 05:25:10'),
(155, 1, '1155', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paystack', NULL, '639ab09207c0a', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-15', NULL, NULL, '2022-12-15 05:28:50', '2022-12-15 05:29:16', '2022-12-15 05:29:16'),
(156, 1, '1156', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paystack', NULL, '639ab11d9bcad', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-15', NULL, NULL, '2022-12-15 05:31:09', '2022-12-15 05:31:50', '2022-12-15 05:31:50'),
(157, 1, '1157', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paystack', NULL, '639ab25e4a347', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-15', NULL, NULL, '2022-12-15 05:36:30', '2022-12-15 05:36:30', NULL),
(158, 1, '1158', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paystack', NULL, '2367135664', NULL, '0.01', '0.01', '$', 'order_completed', NULL, NULL, 'complete', '2022-12-15', NULL, NULL, '2022-12-15 06:10:59', '2022-12-15 06:11:16', NULL),
(159, 1, '1159', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paystack', NULL, '639abb6de8665', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-15', NULL, NULL, '2022-12-15 06:15:09', '2022-12-15 06:15:09', NULL),
(160, 1, '1160', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paystack', NULL, '639abc1913352', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-15', NULL, NULL, '2022-12-15 06:18:01', '2022-12-15 06:18:01', NULL),
(161, 1, '1161', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paystack', NULL, '639abc368114a', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-15', NULL, NULL, '2022-12-15 06:18:30', '2022-12-15 06:18:30', NULL),
(162, 1, '1162', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paystack', NULL, '639abc4ad7733', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-15', NULL, NULL, '2022-12-15 06:18:50', '2022-12-15 06:18:50', NULL),
(163, 1, '1163', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paystack', NULL, '639abc88b60aa', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-15', NULL, NULL, '2022-12-15 06:19:52', '2022-12-15 06:19:52', NULL),
(164, 1, '1164', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paystack', NULL, '639abd195cc28', NULL, '0.01', '0.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-15', NULL, NULL, '2022-12-15 06:22:17', '2022-12-15 06:22:17', NULL),
(165, 1, '1165', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'paystack', NULL, '2367170094', NULL, '0.01', '0.01', '$', 'order_completed', NULL, NULL, 'complete', '2022-12-15', NULL, NULL, '2022-12-15 06:25:12', '2022-12-15 06:25:45', NULL),
(166, 1, '1166', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', '', '0', 'razorpay', NULL, '639ea0b691dd3', NULL, '150.01', '150.01', '$', 'pending', NULL, NULL, 'pending', '2022-12-18', NULL, NULL, '2022-12-18 05:10:14', '2022-12-18 05:10:14', NULL),
(167, 1, '1167', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'razorpay', NULL, 'pay_KtFvUDaVi4suRI', NULL, '150.00', '150.00', '$', 'order_completed', NULL, NULL, 'complete', '2022-12-18', NULL, NULL, '2022-12-18 05:22:11', '2022-12-18 05:22:19', NULL);
INSERT INTO `orders` (`id`, `user_id`, `reference_no`, `billing_first_name`, `billing_last_name`, `billing_email`, `billing_phone`, `billing_country`, `billing_address_1`, `billing_address_2`, `billing_city`, `billing_state`, `billing_zip_code`, `shipping_method`, `shipping_cost`, `payment_method`, `coupon_id`, `payment_id`, `discount`, `total`, `currency_base_total`, `currency_symbol`, `order_status`, `delivery_date`, `delivery_time`, `payment_status`, `date`, `tax_id`, `tax`, `created_at`, `updated_at`, `deleted_at`) VALUES
(168, 1, '1168', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'razorpay', NULL, 'pay_KtGUqA83wOUAZJ', NULL, '150.01', '150.01', '$', 'order_completed', NULL, NULL, 'complete', '2022-12-18', NULL, NULL, '2022-12-18 05:55:39', '2022-12-18 05:55:47', NULL),
(169, 1, '1169', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'razorpay', NULL, 'pay_KtGcsvUs1JSNlK', NULL, '150.00', '150.00', '$', 'order_completed', NULL, NULL, 'complete', '2022-12-18', NULL, NULL, '2022-12-18 06:03:18', '2022-12-18 06:03:26', NULL),
(170, 1, '1170', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'sslcommerz', NULL, '63a14ddb810c4', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'complete', '2022-12-20', NULL, NULL, '2022-12-20 05:53:31', '2022-12-20 05:55:15', NULL),
(171, 1, '1171', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'sslcommerz', NULL, '63a153e56ddf4', NULL, '152.00', '152.00', '$', 'pending', NULL, NULL, 'complete', '2022-12-20', NULL, NULL, '2022-12-20 06:19:17', '2022-12-20 06:19:47', NULL),
(172, 1, '1172', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'sslcommerz', NULL, '63a155b66d990', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'complete', '2022-12-20', NULL, NULL, '2022-12-20 06:27:02', '2022-12-20 06:27:55', NULL),
(173, 1, '1173', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'sslcommerz', NULL, '63a158f1c87ef', NULL, '152.00', '152.00', '$', 'order_completed', NULL, NULL, 'complete', '2022-12-20', NULL, NULL, '2022-12-20 06:40:44', '2022-12-20 06:42:45', NULL),
(174, 1, '1174', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'sslcommerz', NULL, '63a15f26f3b51', NULL, '150.00', '150.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-20', NULL, NULL, '2022-12-20 07:07:19', '2022-12-20 07:07:50', '2022-12-20 07:07:50'),
(175, 1, '1175', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'sslcommerz', NULL, '63a15fcee3cea', NULL, '152.00', '152.00', '$', 'pending', NULL, NULL, 'pending', '2022-12-20', NULL, NULL, '2022-12-20 07:10:06', '2022-12-20 07:10:31', '2022-12-20 07:10:31'),
(176, 1, '1176', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'sslcommerz', NULL, '63a160322457d', NULL, '150.00', '150.00', '$', 'order_completed', NULL, NULL, 'complete', '2022-12-20', NULL, NULL, '2022-12-20 07:11:41', '2022-12-20 07:12:10', NULL),
(177, 1, '1177', 'Irfan', 'Chowdhury', 'admin@gmail.com', '12313131', 'Zimbabwe', 'test Addess', 'test Addess 2', 'test city', 'test state', '123', 'free', '0', 'cash_on_delivery', 17, '63e38e7f33c1a', '10.00', '140.00', '140.00', '$', 'pending', NULL, NULL, 'pending', '2023-02-08', NULL, NULL, '2023-02-08 11:58:56', '2023-02-08 11:58:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `weight` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `tax` decimal(8,2) DEFAULT NULL,
  `discount` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subtotal` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `brand_id`, `category_id`, `tags`, `price`, `qty`, `weight`, `image`, `options`, `tax`, `discount`, `subtotal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 33, 7, 4, NULL, '30.00', 1, 1, '/images/products/v5Q6OuT0Yp.webp', '{\"image\":\"\\/images\\/products\\/v5Q6OuT0Yp.webp\",\"product_slug\":\"garmin-vivo-smart-3-activity-tracker-\\u2013-large\",\"category_id\":\"4\"}', '0.00', '', '30.00', '2022-03-01 08:27:09', '2022-03-01 08:27:09', NULL),
(2, 2, 3, 1, 1, NULL, '200.00', 1, 1, '/images/products/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\"}', '0.00', '', '200.00', '2022-03-07 02:38:27', '2022-03-07 02:38:27', NULL),
(3, 3, 3, 1, 1, NULL, '200.00', 2, 1, '/images/products/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\"}', '0.00', '', '400.00', '2022-03-09 02:36:28', '2022-03-09 02:36:28', NULL),
(4, 3, 5, 3, 1, NULL, '240.50', 1, 1, '/images/products/XAbIiTyFAC.webp', '{\"image\":\"\\/images\\/products\\/XAbIiTyFAC.webp\",\"product_slug\":\"oneplus-8-pro-onyx-black-android-smartphone\",\"category_id\":\"1\"}', '0.00', '', '240.50', '2022-03-09 02:36:28', '2022-03-09 02:36:28', NULL),
(5, 4, 7, 1, 1, NULL, '500.00', 1, 1, '/images/products/large/9og6IARLNE.webp', '{\"image\":\"\\/images\\/products\\/large\\/9og6IARLNE.webp\",\"product_slug\":\"samsung-galaxy-note-10\",\"category_id\":\"1\"}', '0.00', '', '500.00', '2022-03-10 03:58:42', '2022-03-10 03:58:42', NULL),
(6, 4, 1, 2, 1, NULL, '100.00', 2, 1, '/images/products/large/f6qXdQdZVm.webp', '{\"image\":\"\\/images\\/products\\/large\\/f6qXdQdZVm.webp\",\"product_slug\":\"apple-iphone-11-64gb-yellow-fully-unlocked\",\"category_id\":\"1\"}', '0.00', '', '200.00', '2022-03-10 03:58:42', '2022-03-10 03:58:42', NULL),
(7, 5, 4, 2, 1, NULL, '715.00', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', '0.00', '', '715.00', '2022-03-10 12:35:57', '2022-03-10 12:35:57', NULL),
(8, 5, 1, 2, 1, NULL, '100.00', 2, 1, '/images/products/large/f6qXdQdZVm.webp', '{\"image\":\"\\/images\\/products\\/large\\/f6qXdQdZVm.webp\",\"product_slug\":\"apple-iphone-11-64gb-yellow-fully-unlocked\",\"category_id\":\"1\"}', '0.00', '', '200.00', '2022-03-10 12:35:57', '2022-03-10 12:35:57', NULL),
(9, 6, 1, 2, 1, NULL, '100.00', 2, 1, '/images/products/large/f6qXdQdZVm.webp', '{\"image\":\"\\/images\\/products\\/large\\/f6qXdQdZVm.webp\",\"product_slug\":\"apple-iphone-11-64gb-yellow-fully-unlocked\",\"category_id\":\"1\"}', '0.00', '', '200.00', '2022-03-10 13:14:25', '2022-03-10 13:14:25', NULL),
(10, 6, 10, 6, 2, NULL, '999.00', 1, 1, '/images/products/large/6E5wX5Zgan.webp', '{\"image\":\"\\/images\\/products\\/large\\/6E5wX5Zgan.webp\",\"product_slug\":\"apple-macbook-pro-13.3-inch-2.7ghz-dual-core-i5\",\"category_id\":\"2\"}', '0.00', '', '999.00', '2022-03-10 13:14:25', '2022-03-10 13:14:25', NULL),
(11, 7, 1, 2, 1, NULL, '100.00', 1, 1, '/images/products/large/f6qXdQdZVm.webp', '{\"image\":\"\\/images\\/products\\/large\\/f6qXdQdZVm.webp\",\"product_slug\":\"apple-iphone-11-64gb-yellow-fully-unlocked\",\"category_id\":\"1\"}', '0.00', '', '100.00', '2022-03-10 13:17:17', '2022-03-10 13:17:17', NULL),
(12, 7, 7, 1, 1, NULL, '500.00', 1, 1, '/images/products/large/9og6IARLNE.webp', '{\"image\":\"\\/images\\/products\\/large\\/9og6IARLNE.webp\",\"product_slug\":\"samsung-galaxy-note-10\",\"category_id\":\"1\"}', '0.00', '', '500.00', '2022-03-10 13:17:17', '2022-03-10 13:17:17', NULL),
(13, 8, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', '0.00', '', '0.01', '2022-03-11 13:51:46', '2022-03-11 13:51:46', NULL),
(14, 9, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', '0.00', '', '0.01', '2022-03-11 13:52:40', '2022-03-11 13:52:40', NULL),
(15, 10, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', '0.00', '', '0.01', '2022-03-11 13:54:11', '2022-03-11 13:54:11', NULL),
(16, 11, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', '0.00', '', '0.01', '2022-03-11 13:59:05', '2022-03-11 13:59:05', NULL),
(17, 12, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', '0.00', '', '0.01', '2022-03-11 14:00:24', '2022-03-11 14:00:24', NULL),
(18, 13, 4, 2, 1, NULL, '0.01', 2, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', '0.00', '', '0.02', '2022-03-11 14:20:18', '2022-03-11 14:20:18', NULL),
(19, 19, 5, 3, 1, NULL, '240.50', 1, 1, '/images/products/large/XAbIiTyFAC.webp', '{\"image\":\"\\/images\\/products\\/large\\/XAbIiTyFAC.webp\",\"product_slug\":\"oneplus-8-pro-onyx-black-android-smartphone\",\"category_id\":\"1\"}', '0.00', '', '240.50', '2022-03-13 02:09:18', '2022-03-13 02:09:18', NULL),
(20, 21, 25, 1, 4, NULL, '229.99', 1, 1, '/images/products/large/ag323drGTc.webp', '{\"image\":\"\\/images\\/products\\/large\\/ag323drGTc.webp\",\"product_slug\":\"\\u09b8\\u09cd\\u09af\\u09be\\u09ae\\u09b8\\u09be\\u0982-\\u0997\\u09be\\u09b2\\u09be\\u0995\\u09cd\\u09b8\\u09bf-\\u0985\\u09cd\\u09af\\u09be\\u09b2\\u09c1\\u09ae\\u09bf\\u09a8\\u09bf\\u09af\\u09bc\\u09be\\u09ae\",\"category_id\":\"4\"}', '0.00', '', '229.99', '2022-03-13 02:48:27', '2022-03-13 02:48:27', NULL),
(21, 22, 6, 2, 1, NULL, '560.00', 1, 1, '/images/products/large/R9phgu9T1C.webp', '{\"image\":\"\\/images\\/products\\/large\\/R9phgu9T1C.webp\",\"product_slug\":\"apple-iphone-xs-max-64gb--white\",\"category_id\":\"1\",\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '560.00', '2022-04-02 15:11:35', '2022-04-02 15:11:35', NULL),
(22, 23, 6, 2, 1, NULL, '560.00', 1, 1, '/images/products/large/R9phgu9T1C.webp', '{\"image\":\"\\/images\\/products\\/large\\/R9phgu9T1C.webp\",\"product_slug\":\"apple-iphone-xs-max-64gb--white\",\"category_id\":\"1\",\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '560.00', '2022-04-03 23:30:19', '2022-04-03 23:30:19', NULL),
(23, 24, 24, NULL, 4, NULL, '249.00', 1, 1, '/images/products/large/DvKRMbOFCR.webp', '{\"image\":\"\\/images\\/products\\/large\\/DvKRMbOFCR.webp\",\"product_slug\":\"apple-watch-series-3-gps-\\u2013-42mm-\\u2013-sport-band\",\"category_id\":\"4\",\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '249.00', '2022-04-03 23:33:12', '2022-04-03 23:33:12', NULL),
(24, 25, 26, 9, 14, NULL, '479.99', 1, 1, '/images/products/large/6w5arLEMnO.webp', '{\"image\":\"\\/images\\/products\\/large\\/6w5arLEMnO.webp\",\"product_slug\":\"Canon-EOS-\\u09ac\\u09bf\\u09a6\\u09cd\\u09b0\\u09cb\\u09b9\\u09c0-\\u0995\\u09cd\\u09af\\u09be\\u09ae\\u09c7\\u09b0\\u09be-T7-EF-S-18-55mm-IS-II-\\u0995\\u09bf\\u099f\",\"category_id\":\"14\",\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '479.99', '2022-04-09 13:46:26', '2022-04-09 13:46:26', NULL),
(25, 26, 3, 1, 1, NULL, '200.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '200.00', '2022-04-18 06:00:11', '2022-04-18 06:00:11', NULL),
(26, 27, 3, 1, 1, NULL, '200.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '200.00', '2022-04-23 06:36:25', '2022-04-23 06:36:25', NULL),
(27, 28, 3, 1, 1, NULL, '200.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '200.00', '2022-04-23 07:08:26', '2022-04-23 07:08:26', NULL),
(28, 29, 48, 1, 1, NULL, '100.00', 1, 1, '/images/products/large/MqsyJGWXoC.jpeg', '{\"image\":\"\\/images\\/products\\/large\\/MqsyJGWXoC.jpeg\",\"product_slug\":\"samsung-a12\",\"category_id\":\"1\",\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '100.00', '2022-04-24 04:51:35', '2022-04-24 04:51:35', NULL),
(29, 30, 48, 1, 1, NULL, '100.00', 1, 1, '/images/products/large/MqsyJGWXoC.jpeg', '{\"image\":\"\\/images\\/products\\/large\\/MqsyJGWXoC.jpeg\",\"product_slug\":\"samsung-a12\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '100.00', '2022-04-24 05:12:52', '2022-04-24 05:12:52', NULL),
(30, 31, 19, 7, 5, NULL, '289.00', 1, 1, '/images/products/large/G0b0EJCKNf.webp', '{\"image\":\"\\/images\\/products\\/large\\/G0b0EJCKNf.webp\",\"product_slug\":\"beats-studio3-wireless-headphones-\\u2013-matte-black\",\"category_id\":\"5\",\"brand_id\":null,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '289.00', '2022-04-24 06:21:50', '2022-04-24 06:21:50', NULL),
(31, 31, 21, 7, 5, NULL, '439.00', 1, 1, '/images/products/large/GaaPwCpDKf.webp', '{\"image\":\"\\/images\\/products\\/large\\/GaaPwCpDKf.webp\",\"product_slug\":\"bose-noise-cancelling-wireless-bluetooth\",\"category_id\":\"5\",\"brand_id\":null,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '439.00', '2022-04-24 06:21:50', '2022-04-24 06:21:50', NULL),
(32, 32, 25, 1, 4, NULL, '229.99', 1, 1, '/images/products/large/ag323drGTc.webp', '{\"image\":\"\\/images\\/products\\/large\\/ag323drGTc.webp\",\"product_slug\":\"\\u09b8\\u09cd\\u09af\\u09be\\u09ae\\u09b8\\u09be\\u0982-\\u0997\\u09be\\u09b2\\u09be\\u0995\\u09cd\\u09b8\\u09bf-\\u0985\\u09cd\\u09af\\u09be\\u09b2\\u09c1\\u09ae\\u09bf\\u09a8\\u09bf\\u09af\\u09bc\\u09be\\u09ae\",\"category_id\":\"4\",\"brand_id\":1,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '229.99', '2022-05-01 18:12:28', '2022-05-01 18:12:28', NULL),
(33, 32, 3, 1, 1, NULL, '200.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '200.00', '2022-05-01 18:12:28', '2022-05-01 18:12:28', NULL),
(34, 33, 3, 1, 1, NULL, '200.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '200.00', '2022-05-01 18:29:34', '2022-05-01 18:29:34', NULL),
(35, 34, 3, 1, 1, NULL, '200.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '200.00', '2022-05-01 18:30:36', '2022-05-01 18:30:36', NULL),
(36, 35, 3, 1, 1, NULL, '200.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '200.00', '2022-05-01 18:48:06', '2022-05-01 18:48:06', NULL),
(37, 36, 23, NULL, 4, NULL, '55.00', 1, 1, '/images/products/large/8druJ8Ag4k.webp', '{\"image\":\"\\/images\\/products\\/large\\/8druJ8Ag4k.webp\",\"product_slug\":\"cubitt-smart-watch-ct2s-waterproof-fitness-tracker\",\"category_id\":\"4\",\"brand_id\":null,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '55.00', '2022-05-01 18:50:18', '2022-05-01 18:50:18', NULL),
(38, 37, 3, 1, 1, NULL, '200.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '200.00', '2022-05-01 18:53:32', '2022-05-01 18:53:32', NULL),
(39, 38, 3, 1, 1, NULL, '200.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '200.00', '2022-05-01 19:07:39', '2022-05-01 19:07:39', NULL),
(40, 39, 3, 1, 1, NULL, '200.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '200.00', '2022-05-01 19:54:05', '2022-05-01 19:54:05', NULL),
(41, 39, 6, 2, 1, NULL, '560.00', 2, 1, '/images/products/large/R9phgu9T1C.webp', '{\"image\":\"\\/images\\/products\\/large\\/R9phgu9T1C.webp\",\"product_slug\":\"apple-iphone-xs-max-64gb--white\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '1120.00', '2022-05-01 19:54:05', '2022-05-01 19:54:05', NULL),
(42, 40, 27, 9, 14, NULL, '399.95', 1, 1, '/images/products/large/Jx35Akri7E.webp', '{\"image\":\"\\/images\\/products\\/large\\/Jx35Akri7E.webp\",\"product_slug\":\"Canon-SX740BK-\\u09aa\\u09be\\u0993\\u09af\\u09bc\\u09be\\u09b0\\u09b6\\u099f-SX740-HS-\\u09a1\\u09bf\\u099c\\u09bf\\u099f\\u09be\\u09b2-\\u0995\\u09cd\\u09af\\u09be\\u09ae\\u09c7\\u09b0\\u09be\",\"category_id\":\"14\",\"brand_id\":9,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '399.95', '2022-06-06 04:42:24', '2022-10-31 06:22:08', '2022-10-31 06:22:08'),
(43, 41, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-06-06 04:43:07', '2022-06-06 04:43:07', NULL),
(44, 42, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-06-06 04:46:13', '2022-06-06 04:46:13', NULL),
(45, 43, 8, 4, 2, NULL, '470.00', 1, 1, '/images/products/large/keY4OoXOe4.webp', '{\"image\":\"\\/images\\/products\\/large\\/keY4OoXOe4.webp\",\"Size\":\"14 inch\",\"Color\":\"White\",\"product_slug\":\"asus-vivobook-15-thin-and-light-laptop-15.6-inch-fhd-display\",\"category_id\":\"2\",\"brand_id\":4,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '470.00', '2022-06-07 07:41:48', '2022-06-07 07:41:48', NULL),
(46, 44, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-06-18 10:54:10', '2022-06-18 10:54:10', NULL),
(47, 45, 23, NULL, 4, NULL, '55.00', 1, 1, '/images/products/large/8druJ8Ag4k.webp', '{\"image\":\"\\/images\\/products\\/large\\/8druJ8Ag4k.webp\",\"product_slug\":\"cubitt-smart-watch-ct2s-waterproof-fitness-tracker\",\"category_id\":\"4\",\"brand_id\":null,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '55.00', '2022-06-18 11:04:29', '2022-06-18 11:04:29', NULL),
(48, 46, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-06-18 11:10:07', '2022-06-18 11:10:07', NULL),
(49, 47, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-06-18 11:11:43', '2022-06-18 11:11:43', NULL),
(50, 48, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-06-19 06:59:37', '2022-06-19 06:59:37', NULL),
(51, 49, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-06-19 07:03:53', '2022-06-19 07:03:53', NULL),
(52, 50, 12, 6, 2, NULL, '1155.00', 1, 1, '/images/products/large/GUj2sOZUDj.webp', '{\"image\":\"\\/images\\/products\\/large\\/GUj2sOZUDj.webp\",\"Ram\":\"2GB\",\"Size\":\"15 inch\",\"product_slug\":\"apple-macbook-pro-15.4-inch-laptop\",\"category_id\":\"2\",\"brand_id\":6,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '1155.00', '2022-06-28 10:43:10', '2022-06-28 10:43:10', NULL),
(53, 51, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-02 09:56:58', '2022-07-02 09:56:58', NULL),
(54, 52, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-02 09:58:50', '2022-07-02 09:58:50', NULL),
(55, 53, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-02 10:01:02', '2022-07-02 10:01:02', NULL),
(56, 54, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-02 10:03:03', '2022-07-02 10:03:03', NULL),
(57, 55, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-02 10:04:09', '2022-07-02 10:04:09', NULL),
(58, 56, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-02 10:05:47', '2022-07-02 10:05:47', NULL),
(59, 57, 3, 1, 1, NULL, '150.00', 2, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '300.00', '2022-07-03 07:11:37', '2022-07-03 07:11:37', NULL),
(60, 58, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-03 07:13:56', '2022-07-03 07:13:56', NULL),
(61, 59, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-03 07:16:13', '2022-07-03 07:16:13', NULL),
(62, 60, 8, 4, 2, NULL, '470.00', 1, 1, '/images/products/large/keY4OoXOe4.webp', '{\"image\":\"\\/images\\/products\\/large\\/keY4OoXOe4.webp\",\"Ram\":\"2GB\",\"Size\":\"14 inch\",\"Color\":\"White\",\"product_slug\":\"asus-vivobook-15-thin-and-light-laptop-15.6-inch-fhd-display\",\"category_id\":\"2\",\"brand_id\":4,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '470.00', '2022-07-03 09:00:55', '2022-07-03 09:00:55', NULL),
(63, 61, 34, NULL, 2, NULL, '40.00', 2, 1, '/images/products/large/DmjxpgwnIv.webp', '{\"image\":\"\\/images\\/products\\/large\\/DmjxpgwnIv.webp\",\"SSD\":\"124 GB\",\"product_slug\":\"echo-dot-(4th-gen,-2020-release)-|-smart-speaker\",\"category_id\":\"2\",\"brand_id\":null,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '80.00', '2022-07-03 09:21:07', '2022-07-03 09:21:07', NULL),
(64, 61, 8, 4, 2, NULL, '470.00', 1, 1, '/images/products/large/keY4OoXOe4.webp', '{\"image\":\"\\/images\\/products\\/large\\/keY4OoXOe4.webp\",\"Ram\":\"2GB\",\"Size\":\"14 inch\",\"Color\":\"White\",\"product_slug\":\"asus-vivobook-15-thin-and-light-laptop-15.6-inch-fhd-display\",\"category_id\":\"2\",\"brand_id\":4,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '470.00', '2022-07-03 09:21:07', '2022-07-03 09:21:07', NULL),
(69, 66, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-23 09:24:14', '2022-07-23 09:24:14', NULL),
(70, 67, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-23 09:25:17', '2022-07-23 09:25:17', NULL),
(71, 68, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-23 09:28:33', '2022-07-23 09:28:33', NULL),
(72, 69, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-23 09:33:32', '2022-07-23 09:33:32', NULL),
(73, 70, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-23 09:46:45', '2022-07-23 09:46:45', NULL),
(74, 71, 3, 1, 1, NULL, '150.00', 2, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '300.00', '2022-07-23 09:48:04', '2022-07-23 09:48:04', NULL),
(75, 72, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-23 09:49:37', '2022-07-23 09:49:37', NULL),
(76, 73, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-23 09:56:03', '2022-07-23 09:56:03', NULL),
(77, 74, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-07-23 09:58:55', '2022-07-23 09:58:55', NULL),
(78, 75, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-09-14 04:23:08', '2022-10-31 06:17:10', '2022-10-31 06:17:10'),
(80, 77, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-09-24 08:54:51', '2022-09-24 08:54:51', NULL),
(81, 78, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-09-24 08:56:05', '2022-09-24 08:56:05', NULL),
(82, 79, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-09-25 03:53:01', '2022-09-25 03:53:01', NULL),
(83, 80, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-09-25 04:08:41', '2022-09-25 04:08:41', NULL),
(84, 81, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-09-25 06:10:39', '2022-09-25 06:10:39', NULL),
(85, 82, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-09-25 06:19:20', '2022-09-25 06:19:20', NULL),
(86, 83, 4, 2, 1, NULL, '0.01', 2, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"Ram\":\"2GB\",\"Color\":\"White\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.02', '2022-09-27 06:57:19', '2022-09-27 06:57:19', NULL),
(87, 84, 4, 2, 1, NULL, '0.01', 2, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"Ram\":\"2GB\",\"Color\":\"White\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.02', '2022-09-27 06:57:49', '2022-09-27 06:57:49', NULL),
(88, 85, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-09-27 07:22:38', '2022-09-27 07:22:38', NULL),
(89, 85, 4, 2, 1, NULL, '0.01', 3, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"Ram\":\"2GB\",\"Color\":\"White\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.03', '2022-09-27 07:22:38', '2022-09-27 07:22:38', NULL),
(90, 86, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-09-27 10:45:33', '2022-09-27 10:45:33', NULL),
(91, 87, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-10-03 11:02:28', '2022-10-03 11:02:28', NULL),
(92, 88, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-10-03 11:10:42', '2022-10-03 11:10:42', NULL),
(93, 89, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-10-03 11:12:34', '2022-10-03 11:12:34', NULL),
(94, 90, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-10-04 07:41:45', '2022-10-04 07:41:45', NULL),
(95, 91, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-11-23 09:44:26', '2022-11-23 09:44:26', NULL),
(96, 92, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-11-24 05:34:02', '2022-11-24 05:34:02', NULL),
(97, 93, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-01 06:33:12', '2022-12-01 06:33:12', NULL),
(98, 94, 4, 2, 1, NULL, '1.00', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '1.00', '2022-12-01 06:38:43', '2022-12-01 06:38:43', NULL),
(109, 105, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-01 09:04:46', '2022-12-01 09:04:52', '2022-12-01 09:04:52'),
(110, 106, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-01 09:07:49', '2022-12-01 09:07:49', NULL),
(111, 107, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-01 09:08:13', '2022-12-01 09:08:13', NULL),
(112, 108, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-01 09:10:14', '2022-12-01 09:10:14', NULL),
(113, 109, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-01 09:13:14', '2022-12-01 09:13:14', NULL),
(114, 110, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-01 09:14:10', '2022-12-01 09:14:10', NULL),
(115, 111, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-01 09:18:28', '2022-12-01 09:18:28', NULL),
(116, 112, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-01 09:19:20', '2022-12-01 09:19:20', NULL),
(117, 113, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-01 09:23:51', '2022-12-01 09:23:51', NULL),
(118, 114, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-01 09:51:10', '2022-12-01 09:51:10', NULL),
(119, 115, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-01 09:53:15', '2022-12-01 09:53:21', '2022-12-01 09:53:21'),
(120, 116, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-01 09:54:01', '2022-12-01 09:54:08', '2022-12-01 09:54:08'),
(121, 117, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-01 10:49:40', '2022-12-01 10:49:40', NULL),
(122, 118, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-03 07:07:24', '2022-12-03 07:07:24', NULL),
(123, 119, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-03 08:28:24', '2022-12-03 08:28:24', NULL),
(124, 120, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-03 08:31:44', '2022-12-03 08:31:44', NULL),
(125, 121, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-03 08:46:28', '2022-12-03 08:46:28', NULL),
(126, 122, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-03 08:47:28', '2022-12-03 08:47:28', NULL),
(127, 123, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-03 08:59:12', '2022-12-03 08:59:12', NULL),
(128, 124, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-05 06:57:35', '2022-12-05 06:57:35', NULL),
(129, 125, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-05 13:30:24', '2022-12-05 13:30:24', NULL),
(130, 126, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-05 13:36:10', '2022-12-05 13:36:10', NULL),
(131, 127, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-05 13:38:40', '2022-12-05 13:38:40', NULL),
(132, 128, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-05 13:42:25', '2022-12-05 13:42:25', NULL),
(133, 129, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-06 04:06:38', '2022-12-06 04:06:38', NULL),
(134, 132, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-06 11:48:00', '2022-12-06 11:48:34', '2022-12-06 11:48:34'),
(135, 133, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-06 11:49:14', '2022-12-06 11:49:14', NULL),
(136, 134, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-06 11:57:15', '2022-12-06 11:57:15', NULL),
(137, 135, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-08 09:58:37', '2022-12-08 09:58:37', NULL),
(138, 136, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-08 10:25:43', '2022-12-08 10:25:43', NULL),
(139, 137, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-08 10:29:18', '2022-12-08 10:29:18', NULL),
(140, 138, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-08 13:19:42', '2022-12-08 13:19:42', NULL),
(141, 139, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-08 13:23:52', '2022-12-08 13:23:52', NULL),
(142, 140, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-08 13:28:08', '2022-12-08 13:28:08', NULL),
(143, 141, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-09 02:34:42', '2022-12-09 02:34:42', NULL),
(144, 142, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-09 02:37:46', '2022-12-09 02:37:46', NULL),
(145, 146, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-09 04:21:04', '2022-12-09 04:21:04', NULL),
(146, 147, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-10 15:21:19', '2022-12-10 15:21:19', NULL),
(147, 148, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-10 15:26:54', '2022-12-10 15:26:54', NULL),
(148, 149, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-10 15:29:43', '2022-12-10 15:29:43', NULL),
(149, 150, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-10 15:49:26', '2022-12-10 15:49:26', NULL);
INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `brand_id`, `category_id`, `tags`, `price`, `qty`, `weight`, `image`, `options`, `tax`, `discount`, `subtotal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(150, 151, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-10 17:22:03', '2022-12-10 17:22:03', NULL),
(151, 152, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-13 05:13:36', '2022-12-13 05:13:36', NULL),
(152, 153, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-15 04:22:48', '2022-12-15 04:22:48', NULL),
(153, 154, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-15 05:24:46', '2022-12-15 05:25:10', '2022-12-15 05:25:10'),
(154, 155, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":1,\"stock_qty\":100,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-15 05:28:50', '2022-12-15 05:29:16', '2022-12-15 05:29:16'),
(155, 156, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":1,\"stock_qty\":100,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-15 05:31:09', '2022-12-15 05:31:50', '2022-12-15 05:31:50'),
(156, 157, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":1,\"stock_qty\":100,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-15 05:36:30', '2022-12-15 05:36:30', NULL),
(157, 158, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":1,\"stock_qty\":100,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-15 06:10:59', '2022-12-15 06:10:59', NULL),
(158, 159, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":1,\"stock_qty\":100,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-15 06:15:09', '2022-12-15 06:15:09', NULL),
(159, 160, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":1,\"stock_qty\":100,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-15 06:18:01', '2022-12-15 06:18:01', NULL),
(160, 162, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":1,\"stock_qty\":100,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-15 06:18:50', '2022-12-15 06:18:50', NULL),
(161, 163, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":1,\"stock_qty\":100,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-15 06:19:52', '2022-12-15 06:19:52', NULL),
(162, 164, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":1,\"stock_qty\":100,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-15 06:22:17', '2022-12-15 06:22:17', NULL),
(163, 165, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":1,\"stock_qty\":100,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-15 06:25:12', '2022-12-15 06:25:12', NULL),
(164, 166, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":1,\"stock_qty\":100,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-18 05:10:14', '2022-12-18 05:10:14', NULL),
(165, 166, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-18 05:10:14', '2022-12-18 05:10:14', NULL),
(166, 167, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-18 05:22:12', '2022-12-18 05:22:12', NULL),
(167, 168, 4, 2, 1, NULL, '0.01', 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":1,\"stock_qty\":100,\"in_stock\":1}', '0.00', '', '0.01', '2022-12-18 05:55:39', '2022-12-18 05:55:39', NULL),
(168, 168, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-18 05:55:39', '2022-12-18 05:55:39', NULL),
(169, 169, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-18 06:03:18', '2022-12-18 06:03:18', NULL),
(170, 170, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-20 05:53:31', '2022-12-20 05:53:31', NULL),
(171, 171, 6, 2, 1, NULL, '152.00', 1, 1, '/images/products/large/R9phgu9T1C.webp', '{\"image\":\"\\/images\\/products\\/large\\/R9phgu9T1C.webp\",\"product_slug\":\"apple-iphone-xs-max-64gb--white\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '152.00', '2022-12-20 06:19:17', '2022-12-20 06:19:17', NULL),
(172, 172, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-20 06:27:02', '2022-12-20 06:27:02', NULL),
(173, 173, 6, 2, 1, NULL, '152.00', 1, 1, '/images/products/large/R9phgu9T1C.webp', '{\"image\":\"\\/images\\/products\\/large\\/R9phgu9T1C.webp\",\"product_slug\":\"apple-iphone-xs-max-64gb--white\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '152.00', '2022-12-20 06:40:44', '2022-12-20 06:40:44', NULL),
(174, 174, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-20 07:07:19', '2022-12-20 07:07:50', '2022-12-20 07:07:50'),
(175, 175, 6, 2, 1, NULL, '152.00', 1, 1, '/images/products/large/R9phgu9T1C.webp', '{\"image\":\"\\/images\\/products\\/large\\/R9phgu9T1C.webp\",\"product_slug\":\"apple-iphone-xs-max-64gb--white\",\"category_id\":\"1\",\"brand_id\":2,\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', '0.00', '', '152.00', '2022-12-20 07:10:06', '2022-12-20 07:10:31', '2022-12-20 07:10:31'),
(176, 176, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2022-12-20 07:11:41', '2022-12-20 07:11:41', NULL),
(177, 177, 3, 1, 1, NULL, '150.00', 1, 1, '/images/products/large/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/large\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\",\"brand_id\":1,\"manage_stock\":1,\"stock_qty\":2,\"in_stock\":1}', '0.00', '', '150.00', '2023-02-08 11:58:56', '2023-02-08 11:58:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'terms-&-condition', 1, '2022-02-25 11:40:27', '2022-02-25 11:46:30', NULL),
(2, 'about-us', 1, '2022-02-25 11:47:18', '2022-04-11 10:12:23', NULL),
(3, 'faq', 1, '2022-02-25 11:48:47', '2022-03-29 14:52:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `page_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `meta_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `page_name`, `body`, `meta_title`, `meta_description`, `meta_url`, `meta_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Terms & Condition', '&lt;p&gt;This website is operated by a.season. Throughout the site, the terms &amp;ldquo;we&amp;rdquo;, &amp;ldquo;us&amp;rdquo; and &amp;ldquo;our&amp;rdquo; refer to a.season. a.season offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;By visiting our site and/ or purchasing something from us, you engage in our &amp;ldquo;Service&amp;rdquo; and agree to be bound by the following terms and conditions (&amp;ldquo;Terms of Service&amp;rdquo;, &amp;ldquo;Terms&amp;rdquo;), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;Online Store Terms&lt;/h4&gt;\n&lt;p&gt;By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;General Conditions&lt;/h4&gt;\n&lt;p&gt;We reserve the right to refuse service to anyone for any reason at any time.&lt;br /&gt;You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;License&lt;/h4&gt;\n&lt;p&gt;You must not:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;Republish material from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;li&gt;Sell, rent or sub-license material from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;li&gt;Reproduce, duplicate or copy material from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;li&gt;Redistribute content from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;Disclaimer&lt;/h4&gt;\n&lt;p&gt;To the maximum extent permitted by applicable law, we exclude all representations:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;limit or exclude our or your liability for death or personal injury;&lt;/li&gt;\n&lt;li&gt;limit or exclude our or your liability for fraud or fraudulent misrepresentation;&lt;/li&gt;\n&lt;li&gt;limit any of our or your liabilities in any way that is not permitted under applicable law; or&lt;/li&gt;\n&lt;li&gt;exclude any of our or your liabilities that may not be excluded under applicable law.&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.&lt;/p&gt;', NULL, NULL, NULL, NULL, '2022-02-25 11:40:27', '2022-02-25 11:46:30', NULL),
(2, 2, 'en', 'About Us', '&lt;div class=&quot;row&quot;&gt;\r\n&lt;h2&gt;CartPro - your shopping partner&lt;/h2&gt;\r\n&lt;p&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.&lt;/p&gt;\r\n&lt;p&gt; &lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;In luctus nunc id lectus pellentesque lacinia.&lt;/li&gt;\r\n&lt;li&gt;Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur.&lt;/li&gt;\r\n&lt;li&gt;Nam sed sapien sed lacus placerat euismod in consectetur ex.&lt;/li&gt;\r\n&lt;li&gt;Sed et odio ultrices, semper sem sed, scelerisque libero.&lt;/li&gt;\r\n&lt;li&gt;Proin ut ex varius libero viverra pellentesque.&lt;code&gt;&lt;/code&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;', 'About Us', 'About us test description', 'http://localhost/cartpro/page/about-us', 'website', '2022-02-25 11:47:18', '2022-07-31 07:18:18', NULL),
(3, 3, 'en', 'FAQ', '&lt;p&gt;Help &amp; FAQ   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.     What does LOREM mean? ‘Lorem ipsum dolor sit amet, consectetur adipisici elit…’ (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts, for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.     Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).     Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.     Where can I get some? There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.     Why do we use Lorem Ipsum? Many times, readers will get distracted by readable text when looking at the layout of a page. Instead of using filler text that says “Insert content here,” Lorem Ipsum uses a normal distribution of letters, making it resemble standard English. This makes it easier for designers to focus on visual elements, as opposed to what the text on a page actually says. Lorem Ipsum is absolutely necessary in most design cases, too. Web design projects like landing pages, website redesigns and so on only look as intended when they\'re fully-fleshed out with content.&lt;/p&gt;', 'ddgdf', 'gfdgd', 'gfdgd', 'website', '2022-02-25 11:48:47', '2022-07-31 08:50:41', NULL),
(4, 3, 'bn', 'প্রশ্ন ও জিজ্ঞাসা', '&lt;p&gt;সাহায্য এবং FAQ&lt;/p&gt;\n&lt;p&gt;Lorem Ipsum হল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য। লোরেম ইপসাম 1500 এর দশক থেকে শিল্পের মানক ডামি টেক্সট হয়েছে, যখন একটি অজানা প্রিন্টার টাইপের একটি গ্যালি নিয়েছিল এবং একটি টাইপ নমুনা বই তৈরি করতে এটিকে স্ক্র্যাম্বল করেছিল। এটি শুধুমাত্র পাঁচ শতক নয়, ইলেকট্রনিক টাইপসেটিং-এ লাফ দিয়েও টিকে আছে, যা মূলত অপরিবর্তিত রয়েছে। এটি 1960-এর দশকে লোরেম ইপসাম প্যাসেজ সম্বলিত লেট্রাসেট শীট প্রকাশের মাধ্যমে এবং অতি সম্প্রতি লোরেম ইপসামের সংস্করণ সহ অ্যালডাস পেজমেকারের মতো ডেস্কটপ প্রকাশনা সফ্টওয়্যারের মাধ্যমে জনপ্রিয় হয়েছিল।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;LOREM মানে কি?&lt;/p&gt;\n&lt;p&gt;\'Lorem ipsum dolor sit amet, consectetur adipisici elit...\' (সম্পূর্ণ টেক্সট) হল ডামি টেক্সট যা কিছু বোঝানোর জন্য নয়। এটি ম্যাগাজিন লেআউটে একটি স্থানধারক হিসাবে ব্যবহৃত হয়, উদাহরণস্বরূপ, সমাপ্ত নথির একটি ছাপ দেওয়ার জন্য। পাঠ্যটি ইচ্ছাকৃতভাবে দুর্বোধ্য যাতে দর্শক বিষয়বস্তু দ্বারা বিভ্রান্ত না হয়। ভাষাটি প্রকৃত ল্যাটিন নয় এবং এমনকি প্রথম শব্দ \'লোরেম\'-এর অস্তিত্ব নেই। বলা হয় যে লোরেম ইপসাম টেক্সটটি 16 শতক থেকে টাইপসেটারদের মধ্যে প্রচলিত।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;আমরা কেন এটা ব্যবহার করি?&lt;/p&gt;\n&lt;p&gt;এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে একটি পাঠক একটি পৃষ্ঠার লেআউট দেখার সময় পাঠযোগ্য বিষয়বস্তু দ্বারা বিভ্রান্ত হবে। Lorem Ipsum ব্যবহার করার বিষয় হল যে এটিতে \'এখানে সামগ্রী, এখানে বিষয়বস্তু\' ব্যবহার করার বিপরীতে অক্ষরগুলির একটি কম-বেশি স্বাভাবিক বিতরণ রয়েছে, এটিকে পঠনযোগ্য ইংরেজির মতো দেখায়। অনেক ডেস্কটপ পাবলিশিং প্যাকেজ এবং ওয়েব পেজ এডিটররা এখন তাদের ডিফল্ট মডেল টেক্সট হিসেবে Lorem Ipsum ব্যবহার করে এবং \'lorem ipsum\'-এর জন্য অনুসন্ধান করলে অনেক ওয়েব সাইট তাদের শৈশবকালেই উন্মোচিত হবে। বছরের পর বছর ধরে বিভিন্ন সংস্করণ বিকশিত হয়েছে, কখনও দুর্ঘটনাক্রমে, কখনও কখনও উদ্দেশ্যমূলক (ইনজেক্টেড হিউমার এবং এর মতো)।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;যেখানে এটি থেকে আসে?&lt;/p&gt;\n&lt;p&gt;জনপ্রিয় বিশ্বাসের বিপরীতে, Lorem Ipsum কেবল এলোমেলো পাঠ্য নয়। এটি 45 খ্রিস্টপূর্বাব্দের ধ্রুপদী ল্যাটিন সাহিত্যের একটি অংশে শিকড় রয়েছে, যা এটিকে 2000 বছরেরও বেশি পুরানো করে তোলে। ভার্জিনিয়ার হ্যাম্পডেন-সিডনি কলেজের একজন ল্যাটিন অধ্যাপক রিচার্ড ম্যাকক্লিনটক, লরেম ইপসাম প্যাসেজ থেকে আরও অস্পষ্ট ল্যাটিন শব্দ, কনসেক্টেটুর, এবং ধ্রুপদী সাহিত্যে শব্দের উদ্ধৃতির মধ্য দিয়ে গিয়ে সন্দেহাতীত উৎস আবিষ্কার করেন।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;আমি কোথায় কিছু পেতে পারি?&lt;/p&gt;\n&lt;p&gt;Lorem Ipsum-এর অনুচ্ছেদের অনেক বৈচিত্র উপলব্ধ রয়েছে, কিন্তু অধিকাংশই কিছু আকারে পরিবর্তনের শিকার হয়েছে, ইনজেকশন করা হাস্যরস, বা এলোমেলো শব্দ যা সামান্য বিশ্বাসযোগ্য মনে হচ্ছে না। আপনি যদি Lorem Ipsum-এর একটি প্যাসেজ ব্যবহার করতে যাচ্ছেন, তাহলে আপনাকে নিশ্চিত হতে হবে যে টেক্সটের মাঝখানে বিব্রতকর কিছু লুকানো নেই। ইন্টারনেটের সমস্ত Lorem Ipsum জেনারেটরগুলি প্রয়োজনীয় হিসাবে পূর্বনির্ধারিত অংশগুলি পুনরাবৃত্তি করার প্রবণতা রাখে, এটিকে ইন্টারনেটে প্রথম সত্য জেনারেটর করে তোলে। এটি লরেম ইপসাম তৈরি করতে 200 টিরও বেশি ল্যাটিন শব্দের অভিধান ব্যবহার করে, যা কিছু মডেল বাক্য গঠনের সাথে মিলিত হয় যা যুক্তিসঙ্গত বলে মনে হয়। উত্পন্ন লোরেম ইপসাম তাই সবসময় পুনরাবৃত্তি, ইনজেকশন করা হাস্যরস, বা অ-চরিত্রহীন শব্দ ইত্যাদি থেকে মুক্ত।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;কেন আমরা Lorem Ipsum ব্যবহার করি?&lt;/p&gt;\n&lt;p&gt;অনেক সময়, পাঠকরা একটি পৃষ্ঠার বিন্যাস দেখার সময় পাঠযোগ্য পাঠ্য দ্বারা বিভ্রান্ত হবেন। &quot;এখানে বিষয়বস্তু ঢোকান&quot; বলে ফিলার টেক্সট ব্যবহার করার পরিবর্তে লোরেম ইপসাম অক্ষরগুলির একটি সাধারণ বিতরণ ব্যবহার করে, এটিকে সাধারণ ইংরেজির মতো করে। এটি ডিজাইনারদের ভিজ্যুয়াল উপাদানগুলিতে ফোকাস করা সহজ করে তোলে, একটি পৃষ্ঠার পাঠ্য আসলে যা বলে তার বিপরীতে। বেশিরভাগ ডিজাইনের ক্ষেত্রেও Lorem Ipsum একেবারে প্রয়োজনীয়। ওয়েব ডিজাইন প্রজেক্ট যেমন ল্যান্ডিং পেজ, ওয়েবসাইট রিডিজাইন ইত্যাদি শুধুমাত্র তখনই দেখায় যখন সেগুলি কন্টেন্টের সাথে সম্পূর্ণরূপে পরিপূর্ণ হয়।&lt;/p&gt;', NULL, NULL, NULL, NULL, '2022-03-08 23:07:24', '2022-03-08 23:07:24', NULL),
(5, 2, 'bn', 'আমদের সম্পর্কে', '&lt;p&gt;Lorem Ipsum-এর অনুচ্ছেদের অনেক বৈচিত্র উপলব্ধ রয়েছে, কিন্তু অধিকাংশই কিছু আকারে পরিবর্তনের শিকার হয়েছে, ইনজেকশন করা হাস্যরস, বা এলোমেলো শব্দ যা সামান্য বিশ্বাসযোগ্য মনে হচ্ছে না। আপনি যদি Lorem Ipsum-এর একটি প্যাসেজ ব্যবহার করতে যাচ্ছেন, তাহলে আপনাকে নিশ্চিত হতে হবে যে টেক্সটের মাঝখানে বিব্রতকর কিছু লুকানো নেই। ইন্টারনেটের সমস্ত Lorem Ipsum জেনারেটরগুলি প্রয়োজনীয় হিসাবে পূর্বনির্ধারিত অংশগুলি পুনরাবৃত্তি করার প্রবণতা রাখে, এটিকে ইন্টারনেটে প্রথম সত্য জেনারেটর করে তোলে। এটি লরেম ইপসাম তৈরি করতে 200 টিরও বেশি ল্যাটিন শব্দের অভিধান ব্যবহার করে, যা কিছু মডেল বাক্য গঠনের সাথে মিলিত হয় যা যুক্তিসঙ্গত বলে মনে হয়। উত্পন্ন লোরেম ইপসাম তাই সবসময় পুনরাবৃত্তি, ইনজেকশন করা হাস্যরস, বা অ-চরিত্রহীন শব্দ ইত্যাদি থেকে মুক্ত।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;br /&gt;লুকটাস নুনক আইডি লেক্টাস পেলেনটেস্ক ল্যাকিনিয়াতে।&lt;br /&gt;Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur.&lt;br /&gt;Nam sed sapien sed lacus placerat euismod in consectetur ex.&lt;br /&gt;Sed et odio ultrices, Semper Sem Sed, scelerisque libero.&lt;br /&gt;প্রিন্ট ইউটি এক্স varius libero viverra pellentesque.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\n&lt;li&gt;In luctus nunc id lectus pellentesque lacinia.&lt;/li&gt;\n&lt;li&gt;Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur.&lt;/li&gt;\n&lt;li&gt;Nam sed sapien sed lacus placerat euismod in consectetur ex.&lt;/li&gt;\n&lt;li&gt;Sed et odio ultrices, semper sem sed, scelerisque libero.&lt;/li&gt;\n&lt;li&gt;Proin ut ex varius libero viverra pellentesque.&lt;/li&gt;\n&lt;/ul&gt;', NULL, NULL, NULL, NULL, '2022-03-08 23:11:32', '2022-03-08 23:11:32', NULL),
(6, 1, 'bn', 'টার্মস এন্ড কন্ডিশন', '&lt;p&gt;এই ওয়েবসাইট a.season দ্বারা পরিচালিত হয়. পুরো সাইট জুড়ে, &quot;আমরা&quot;, &quot;আমাদের&quot; এবং &quot;আমাদের&quot; শব্দগুলো a.season-কে বোঝায়। a.season এই ওয়েবসাইটটি অফার করে, এই সাইট থেকে উপলব্ধ সমস্ত তথ্য, সরঞ্জাম এবং পরিষেবাগুলি সহ আপনার, ব্যবহারকারীর জন্য, এখানে উল্লিখিত সমস্ত শর্তাবলী, শর্তাবলী, নীতি এবং বিজ্ঞপ্তিগুলি আপনার স্বীকৃতির উপর শর্তযুক্ত।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;আমাদের সাইট পরিদর্শন করে এবং/অথবা আমাদের কাছ থেকে কিছু কেনার মাধ্যমে, আপনি আমাদের &quot;পরিষেবা&quot;-তে নিযুক্ত হন এবং নিম্নলিখিত শর্তাবলী (&quot;পরিষেবার শর্তাবলী&quot;, &quot;শর্তাবলী&quot;) দ্বারা আবদ্ধ হতে সম্মত হন, সেই অতিরিক্ত শর্তাবলী এবং নীতিগুলি সহ এখানে উল্লেখ করা হয়েছে এবং/অথবা হাইপারলিঙ্ক দ্বারা উপলব্ধ। এই পরিষেবার শর্তাবলী সাইটের সমস্ত ব্যবহারকারীর জন্য প্রযোজ্য, যার মধ্যে সীমাবদ্ধতা ছাড়াই ব্যবহারকারী যারা ব্রাউজার, বিক্রেতা, গ্রাহক, বণিক, এবং/অথবা সামগ্রীর অবদানকারী।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;অনলাইন স্টোর শর্তাবলী&lt;/p&gt;\n&lt;p&gt;এই পরিষেবার শর্তাবলীতে সম্মত হওয়ার মাধ্যমে, আপনি প্রতিনিধিত্ব করেন যে আপনার রাজ্য বা বসবাসের প্রদেশে আপনি কমপক্ষে সংখ্যাগরিষ্ঠের বয়স, অথবা আপনি আপনার রাজ্য বা বসবাসের প্রদেশে সংখ্যাগরিষ্ঠের বয়স এবং আপনি আমাদের সম্মতি দিয়েছেন আপনার অপ্রাপ্তবয়স্ক নির্ভরশীলদের এই সাইটটি ব্যবহার করার অনুমতি দিন।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;সাধারণ শর্ত&lt;/p&gt;\n&lt;p&gt;আমরা যে কোন সময় যে কোন কারণে যে কাউকে সেবা প্রত্যাখ্যান করার অধিকার সংরক্ষণ করি।&lt;br /&gt;আপনি বুঝতে পারেন যে আপনার বিষয়বস্তু (ক্রেডিট কার্ডের তথ্য সহ নয়), এনক্রিপ্ট ছাড়া স্থানান্তরিত হতে পারে এবং (ক) বিভিন্ন নেটওয়ার্কে ট্রান্সমিশন জড়িত হতে পারে; এবং (খ) সংযোগকারী নেটওয়ার্ক বা ডিভাইসগুলির প্রযুক্তিগত প্রয়োজনীয়তার সাথে সামঞ্জস্য এবং মানিয়ে নেওয়ার জন্য পরিবর্তন। নেটওয়ার্কে স্থানান্তরের সময় ক্রেডিট কার্ডের তথ্য সর্বদা এনক্রিপ্ট করা হয়।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;লাইসেন্স&lt;/p&gt;\n&lt;p&gt;তুমি অবশ্যই না:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;ওয়েবসাইটের নাম থেকে সামগ্রী পুনঃপ্রকাশ করুন&lt;br /&gt;ওয়েবসাইটের নাম থেকে বিক্রয়, ভাড়া বা উপ-লাইসেন্স সামগ্রী&lt;br /&gt;ওয়েবসাইটের নাম থেকে উপাদান পুনরুত্পাদন, অনুলিপি বা অনুলিপি করুন&lt;br /&gt;ওয়েবসাইটের নাম থেকে সামগ্রী পুনরায় বিতরণ করুন&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;দাবিত্যাগ&lt;/p&gt;\n&lt;p&gt;প্রযোজ্য আইন দ্বারা অনুমোদিত সর্বাধিক পরিমাণে, আমরা সমস্ত উপস্থাপনা বাদ দিই:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;মৃত্যু বা ব্যক্তিগত আঘাতের জন্য আমাদের বা আপনার দায়বদ্ধতা সীমিত বা বাদ দিন;&lt;br /&gt;জালিয়াতি বা প্রতারণামূলক ভুল উপস্থাপনের জন্য আমাদের বা আপনার দায়বদ্ধতাকে সীমাবদ্ধ বা বাদ দিন;&lt;br /&gt;প্রযোজ্য আইনের অধীনে অনুমোদিত নয় এমন যেকোন উপায়ে আমাদের বা আপনার দায়বদ্ধতা সীমাবদ্ধ করুন; বা&lt;br /&gt;প্রযোজ্য আইনের অধীনে বাদ দেওয়া যাবে না এমন কোনো আমাদের বা আপনার দায় বাদ দিন।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;যতক্ষণ না ওয়েবসাইট এবং ওয়েবসাইটের তথ্য এবং পরিষেবাগুলি বিনামূল্যে প্রদান করা হয়, আমরা কোনও প্রকৃতির ক্ষতি বা ক্ষতির জন্য দায়ী থাকব না।&lt;/p&gt;', NULL, NULL, NULL, NULL, '2022-03-08 23:12:08', '2022-03-08 23:12:08', NULL),
(7, 3, 'de', 'Häufig Fragen und Fragen', '&lt;h1 style=&quot;text-align: center;&quot;&gt;Hilfe &amp;amp; FAQ&lt;/h1&gt;\n&lt;p&gt;Lorem Ipsum ist einfach Blindtext der Druck- und Satzindustrie. Lorem Ipsum ist seit den 1500er Jahren der Standard-Dummy-Text der Branche, als ein unbekannter Drucker eine Reihe von Typen nahm und daraus ein Musterbuch f&amp;uuml;r Typen erstellte. Sie hat nicht nur f&amp;uuml;nf Jahrhunderte, sondern auch den Sprung in den elektronischen Satz &amp;uuml;berstanden und ist im Wesentlichen unver&amp;auml;ndert geblieben. Es wurde in den 1960er Jahren mit der Ver&amp;ouml;ffentlichung von Letraset-Bl&amp;auml;ttern mit Passagen von Lorem Ipsum und in j&amp;uuml;ngerer Zeit mit Desktop-Publishing-Software wie Aldus PageMaker, einschlie&amp;szlig;lich Versionen von Lorem Ipsum, popul&amp;auml;r.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Was bedeutet LOREM?&lt;/p&gt;\n&lt;p&gt;&amp;bdquo;Lorem ipsum dolor sit amet, consectetur adipisici elit&amp;hellip;&amp;ldquo; (vollst&amp;auml;ndiger Text) ist ein Blindtext, der nichts bedeuten soll. Es wird beispielsweise als Platzhalter in Zeitschriftenlayouts verwendet, um einen Eindruck vom fertigen Dokument zu vermitteln. Der Text ist absichtlich unverst&amp;auml;ndlich, damit der Betrachter nicht vom Inhalt abgelenkt wird. Die Sprache ist kein richtiges Latein und nicht einmal das erste Wort &amp;bdquo;Lorem&amp;ldquo; existiert. Der Lorem-ipsum-Text soll unter Schriftsetzern seit dem 16. Jahrhundert &amp;uuml;blich gewesen sein.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Warum verwenden wir es?&lt;/p&gt;\n&lt;p&gt;Es ist eine seit langem bekannte Tatsache, dass ein Leser beim Betrachten des Layouts durch den lesbaren Inhalt einer Seite abgelenkt wird. Der Punkt bei der Verwendung von Lorem Ipsum ist, dass es eine mehr oder weniger normale Verteilung von Buchstaben hat, im Gegensatz zur Verwendung von &amp;bdquo;Inhalt hier, Inhalt hier&amp;ldquo;, wodurch es wie lesbares Englisch aussieht. Viele Desktop-Publishing-Pakete und Webseiten-Editoren verwenden jetzt Lorem Ipsum als ihren Standardmodelltext, und eine Suche nach &amp;bdquo;lorem ipsum&amp;ldquo; wird viele Websites aufdecken, die noch in den Kinderschuhen stecken. Im Laufe der Jahre haben sich verschiedene Versionen entwickelt, manchmal zuf&amp;auml;llig, manchmal absichtlich (eingespritzter Humor und dergleichen).&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Woher kommt das?&lt;/p&gt;\n&lt;p&gt;Entgegen der landl&amp;auml;ufigen Meinung ist Lorem Ipsum nicht einfach zuf&amp;auml;lliger Text. Es hat seine Wurzeln in einem St&amp;uuml;ck klassischer lateinischer Literatur aus dem Jahr 45 v. Chr. und ist damit &amp;uuml;ber 2000 Jahre alt. Richard McClintock, Lateinprofessor am Hampden-Sydney College in Virginia, schlug eines der obskureren lateinischen W&amp;ouml;rter, consectetur, in einer Lorem-Ipsum-Passage nach, und als er die Zitate des Wortes in der klassischen Literatur durchging, entdeckte er die unbestreitbare Quelle.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Wo kann ich welche bekommen?&lt;/p&gt;\n&lt;p&gt;Es gibt viele Variationen von Passagen von Lorem Ipsum, aber die meisten wurden in irgendeiner Form ver&amp;auml;ndert, durch eingespritzten Humor oder willk&amp;uuml;rliche W&amp;ouml;rter, die nicht einmal ann&amp;auml;hernd glaubw&amp;uuml;rdig aussehen. Wenn Sie eine Passage von Lorem Ipsum verwenden, m&amp;uuml;ssen Sie sicher sein, dass nichts Peinliches in der Mitte des Textes versteckt ist. Alle Lorem Ipsum-Generatoren im Internet neigen dazu, vordefinierte Chunks nach Bedarf zu wiederholen, was dies zum ersten echten Generator im Internet macht. Es verwendet ein W&amp;ouml;rterbuch mit &amp;uuml;ber 200 lateinischen W&amp;ouml;rtern, kombiniert mit einer Handvoll Modellsatzstrukturen, um Lorem Ipsum zu generieren, das vern&amp;uuml;nftig aussieht. Das generierte Lorem Ipsum ist daher immer frei von Wiederholungen, eingespritztem Humor, uncharakteristischen W&amp;ouml;rtern etc.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Warum verwenden wir Lorem Ipsum?&lt;/p&gt;\n&lt;p&gt;Leser werden oft durch lesbaren Text abgelenkt, wenn sie sich das Layout einer Seite ansehen. Anstatt F&amp;uuml;lltext zu verwenden, der besagt: &amp;bdquo;Inhalt hier einf&amp;uuml;gen&amp;ldquo;, verwendet Lorem Ipsum eine normale Buchstabenverteilung, sodass er dem Standardenglisch &amp;auml;hnelt. Dies erleichtert es Designern, sich auf visuelle Elemente zu konzentrieren, im Gegensatz zu dem, was der Text auf einer Seite tats&amp;auml;chlich sagt. Auch Lorem Ipsum ist in den meisten Auslegungsf&amp;auml;llen zwingend erforderlich. Webdesign-Projekte wie Zielseiten, Website-Redesigns usw. sehen erst dann wie beabsichtigt aus, wenn sie vollst&amp;auml;ndig mit Inhalten gef&amp;uuml;llt sind.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, NULL, NULL, NULL, '2022-03-08 23:14:03', '2022-03-08 23:14:03', NULL),
(8, 3, 'es', 'Preguntas más frecuentes', '&lt;h1 style=&quot;text-align: center;&quot;&gt;&lt;span class=&quot;VIiyi&quot; lang=&quot;es&quot;&gt;&lt;span class=&quot;JLqJ4b&quot; data-language-for-alternatives=&quot;es&quot; data-language-to-translate-into=&quot;en&quot; data-phrase-index=&quot;0&quot; data-number-of-phrases=&quot;1&quot;&gt;Ayuda y preguntas frecuentes&lt;/span&gt;&lt;/span&gt;&lt;/h1&gt;\n&lt;p&gt;Lorem Ipsum es simplemente un texto ficticio de la industria de la impresi&amp;oacute;n y la composici&amp;oacute;n tipogr&amp;aacute;fica. Lorem Ipsum ha sido el texto ficticio est&amp;aacute;ndar de la industria desde la d&amp;eacute;cada de 1500, cuando un impresor desconocido tom&amp;oacute; una galera de tipos y la codific&amp;oacute; para hacer un libro de muestras tipogr&amp;aacute;ficas. Ha sobrevivido no solo cinco siglos, sino tambi&amp;eacute;n el salto a la composici&amp;oacute;n tipogr&amp;aacute;fica electr&amp;oacute;nica, permaneciendo esencialmente sin cambios. Se populariz&amp;oacute; en la d&amp;eacute;cada de 1960 con el lanzamiento de hojas de Letraset que conten&amp;iacute;an pasajes de Lorem Ipsum y, m&amp;aacute;s recientemente, con software de autoedici&amp;oacute;n como Aldus PageMaker, que inclu&amp;iacute;a versiones de Lorem Ipsum.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;iquest;Qu&amp;eacute; significa LOREM?&lt;/p&gt;\n&lt;p&gt;&amp;lsquo;Lorem ipsum dolor sit amet, consectetur adipisici elit&amp;hellip;&amp;rsquo; (texto completo) es un texto ficticio que no pretende significar nada. Se utiliza como marcador de posici&amp;oacute;n en dise&amp;ntilde;os de revistas, por ejemplo, para dar una impresi&amp;oacute;n del documento terminado. El texto es intencionalmente ininteligible para que el espectador no se distraiga con el contenido. El idioma no es el lat&amp;iacute;n real e incluso la primera palabra \'Lorem\' no existe. Se dice que el texto lorem ipsum ha sido com&amp;uacute;n entre los tip&amp;oacute;grafos desde el siglo XVI.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;iquest;Por qu&amp;eacute; lo usamos?&lt;/p&gt;\n&lt;p&gt;Es un hecho establecido desde hace mucho tiempo que un lector se distraer&amp;aacute; con el contenido legible de una p&amp;aacute;gina cuando mire su dise&amp;ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&amp;oacute;n de letras m&amp;aacute;s o menos normal, a diferencia de usar \'Contenido aqu&amp;iacute;, contenido aqu&amp;iacute;\', lo que hace que parezca un ingl&amp;eacute;s legible. Muchos paquetes de autoedici&amp;oacute;n y editores de p&amp;aacute;ginas web ahora usan Lorem Ipsum como su modelo de texto predeterminado, y una b&amp;uacute;squeda de \'lorem ipsum\' descubrir&amp;aacute; muchos sitios web que a&amp;uacute;n est&amp;aacute;n en su infancia. Varias versiones han evolucionado a lo largo de los a&amp;ntilde;os, a veces por accidente, a veces a prop&amp;oacute;sito (humor inyectado y cosas por el estilo).&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;iquest;De d&amp;oacute;nde viene?&lt;/p&gt;\n&lt;p&gt;Contrariamente a la creencia popular, Lorem Ipsum no es simplemente un texto aleatorio. Tiene sus ra&amp;iacute;ces en una pieza de la literatura latina cl&amp;aacute;sica del 45 a. C., por lo que tiene m&amp;aacute;s de 2000 a&amp;ntilde;os. Richard McClintock, profesor de lat&amp;iacute;n en Hampden-Sydney College en Virginia, busc&amp;oacute; una de las palabras latinas m&amp;aacute;s oscuras, consectetur, en un pasaje de Lorem Ipsum, y al revisar las citas de la palabra en la literatura cl&amp;aacute;sica, descubri&amp;oacute; la fuente indudable.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;iquest;Donde puedo conseguir algunos?&lt;/p&gt;\n&lt;p&gt;Hay muchas variaciones de pasajes de Lorem Ipsum disponibles, pero la mayor&amp;iacute;a ha sufrido alteraciones de alguna forma, por humor inyectado o palabras aleatorias que no parecen ni un poco cre&amp;iacute;bles. Si vas a usar un pasaje de Lorem Ipsum, debes asegurarte de que no haya nada vergonzoso escondido en medio del texto. Todos los generadores de Lorem Ipsum en Internet tienden a repetir fragmentos predefinidos seg&amp;uacute;n sea necesario, lo que lo convierte en el primer generador real en Internet. Utiliza un diccionario de m&amp;aacute;s de 200 palabras latinas, combinado con un pu&amp;ntilde;ado de estructuras de oraciones modelo, para generar Lorem Ipsum que parece razonable. Por lo tanto, el Lorem Ipsum generado siempre est&amp;aacute; libre de repeticiones, humor inyectado o palabras no caracter&amp;iacute;sticas, etc.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;iquest;Por qu&amp;eacute; usamos Lorem Ipsum?&lt;/p&gt;\n&lt;p&gt;Muchas veces, los lectores se distraen con el texto legible cuando miran el dise&amp;ntilde;o de una p&amp;aacute;gina. En lugar de usar un texto de relleno que dice &quot;Insertar contenido aqu&amp;iacute;&quot;, Lorem Ipsum usa una distribuci&amp;oacute;n normal de letras, lo que lo hace parecerse al ingl&amp;eacute;s est&amp;aacute;ndar. Esto facilita que los dise&amp;ntilde;adores se centren en los elementos visuales, a diferencia de lo que realmente dice el texto de una p&amp;aacute;gina. Lorem Ipsum tambi&amp;eacute;n es absolutamente necesario en la mayor&amp;iacute;a de los casos de dise&amp;ntilde;o. Los proyectos de dise&amp;ntilde;o web, como p&amp;aacute;ginas de destino, redise&amp;ntilde;os de sitios web, etc., solo se ven seg&amp;uacute;n lo previsto cuando est&amp;aacute;n completamente desarrollados con contenido.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', NULL, NULL, NULL, NULL, '2022-03-08 23:15:38', '2022-03-08 23:15:38', NULL),
(9, 2, 'de', 'Über uns', '&lt;p&gt;Es gibt viele Variationen von Passagen von Lorem Ipsum, aber die meisten wurden in irgendeiner Form ver&amp;auml;ndert, durch eingespritzten Humor oder willk&amp;uuml;rliche W&amp;ouml;rter, die nicht einmal ann&amp;auml;hernd glaubw&amp;uuml;rdig aussehen. Wenn Sie eine Passage von Lorem Ipsum verwenden, m&amp;uuml;ssen Sie sicher sein, dass nichts Peinliches in der Mitte des Textes versteckt ist. Alle Lorem Ipsum-Generatoren im Internet neigen dazu, vordefinierte Chunks nach Bedarf zu wiederholen, was dies zum ersten echten Generator im Internet macht. Es verwendet ein W&amp;ouml;rterbuch mit &amp;uuml;ber 200 lateinischen W&amp;ouml;rtern, kombiniert mit einer Handvoll Modellsatzstrukturen, um Lorem Ipsum zu generieren, das vern&amp;uuml;nftig aussieht. Das generierte Lorem Ipsum ist daher immer frei von Wiederholungen, eingespritztem Humor, uncharakteristischen W&amp;ouml;rtern etc.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;br /&gt;In luctus nunc id lectus pellentesque lacinia.&lt;br /&gt;Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur.&lt;br /&gt;Nam sed sapien sed lacus placerat euismod in consectetur ex.&lt;br /&gt;Sed et odio ultrices, semper sem sed, scelerisque libero.&lt;br /&gt;Proin ut ex varius libero viverra pellentesque.&lt;/p&gt;', NULL, NULL, NULL, NULL, '2022-03-08 23:17:07', '2022-03-08 23:18:44', NULL),
(10, 2, 'es', 'Sobre nosotros', '&lt;p&gt;Hay muchas variaciones de pasajes de Lorem Ipsum disponibles, pero la mayor&amp;iacute;a ha sufrido alteraciones de alguna forma, por humor inyectado o palabras aleatorias que no parecen ni un poco cre&amp;iacute;bles. Si vas a usar un pasaje de Lorem Ipsum, debes asegurarte de que no haya nada vergonzoso escondido en medio del texto. Todos los generadores de Lorem Ipsum en Internet tienden a repetir fragmentos predefinidos seg&amp;uacute;n sea necesario, lo que lo convierte en el primer generador real en Internet. Utiliza un diccionario de m&amp;aacute;s de 200 palabras latinas, combinado con un pu&amp;ntilde;ado de estructuras de oraciones modelo, para generar Lorem Ipsum que parece razonable. Por lo tanto, el Lorem Ipsum generado siempre est&amp;aacute; libre de repeticiones, humor inyectado o palabras no caracter&amp;iacute;sticas, etc.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;br /&gt;In luctus nunc id lectus pellentesque lacinia.&lt;br /&gt;Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur.&lt;br /&gt;Nam sed sapien sed lacus placerat euismod in consectetur ex.&lt;br /&gt;Sed et odio ultrices, semper sem sed, scelerisque libero.&lt;br /&gt;Proin ut ex varius libero viverra pellentesque.&lt;/p&gt;', NULL, NULL, NULL, NULL, '2022-03-08 23:19:19', '2022-03-08 23:19:19', NULL),
(11, 1, 'es', 'Términos y Condiciones', '&lt;p&gt;Este sitio web es operado por a.temporada. En todo el sitio, los t&amp;eacute;rminos &amp;ldquo;nosotros&amp;rdquo;, &amp;ldquo;nos&amp;rdquo; y &amp;ldquo;nuestro&amp;rdquo; se refieren a una.temporada. a.temporada ofrece este sitio web, incluyendo toda la informaci&amp;oacute;n, herramientas y servicios disponibles para ti en este sitio, el usuario, est&amp;aacute; condicionado a la aceptaci&amp;oacute;n de todos los t&amp;eacute;rminos, condiciones, pol&amp;iacute;ticas y notificaciones aqu&amp;iacute; establecidos.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Al visitar nuestro sitio y/o comprar algo de nosotros, usted participa en nuestro &quot;Servicio&quot; y acepta estar sujeto a los siguientes t&amp;eacute;rminos y condiciones (&quot;T&amp;eacute;rminos de servicio&quot;, &quot;T&amp;eacute;rminos&quot;), incluidos los t&amp;eacute;rminos y condiciones y pol&amp;iacute;ticas adicionales referenciado aqu&amp;iacute; y/o disponible por hiperv&amp;iacute;nculo. Estos T&amp;eacute;rminos de servicio se aplican a todos los usuarios del sitio, incluidos, entre otros, los usuarios que son navegadores, proveedores, clientes, comerciantes y/o contribuyentes de contenido.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;T&amp;eacute;rminos de la tienda en l&amp;iacute;nea&lt;/p&gt;\n&lt;p&gt;Al aceptar estos T&amp;eacute;rminos de servicio, usted declara que tiene al menos la mayor&amp;iacute;a de edad en su estado o provincia de residencia, o que tiene la mayor&amp;iacute;a de edad en su estado o provincia de residencia y nos ha dado su consentimiento para permitir que cualquiera de sus dependientes menores use este sitio.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Condiciones generales&lt;/p&gt;\n&lt;p&gt;Nos reservamos el derecho de rechazar el servicio a cualquier persona por cualquier motivo en cualquier momento.&lt;br /&gt;Usted comprende que su contenido (sin incluir la informaci&amp;oacute;n de la tarjeta de cr&amp;eacute;dito) puede transferirse sin cifrar e involucrar (a) transmisiones a trav&amp;eacute;s de varias redes; y (b) cambios para cumplir y adaptarse a los requisitos t&amp;eacute;cnicos de conexi&amp;oacute;n de redes o dispositivos. La informaci&amp;oacute;n de la tarjeta de cr&amp;eacute;dito siempre se cifra durante la transferencia a trav&amp;eacute;s de las redes.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Licencia&lt;/p&gt;\n&lt;p&gt;No debes:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Volver a publicar material del nombre del sitio web&lt;br /&gt;Vender, alquilar o sublicenciar material de Nombre del sitio web&lt;br /&gt;Reproducir, duplicar o copiar material de Nombre del sitio web&lt;br /&gt;Redistribuir contenido del nombre del sitio web&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Descargo de responsabilidad&lt;/p&gt;\n&lt;p&gt;En la medida m&amp;aacute;xima permitida por la ley aplicable, excluimos todas las representaciones:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;limitar o excluir nuestra o su responsabilidad por muerte o lesiones personales;&lt;br /&gt;limitar o excluir nuestra o su responsabilidad por fraude o tergiversaci&amp;oacute;n fraudulenta;&lt;br /&gt;limitar cualquiera de nuestras responsabilidades o las suyas de cualquier manera que no est&amp;eacute; permitida por la ley aplicable; o&lt;br /&gt;excluir cualquiera de nuestras o sus responsabilidades que no puedan ser excluidas bajo la ley aplicable.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Siempre que el sitio web y la informaci&amp;oacute;n y los servicios en el sitio web se proporcionen de forma gratuita, no seremos responsables de ninguna p&amp;eacute;rdida o da&amp;ntilde;o de ning&amp;uacute;n tipo.&lt;/p&gt;', NULL, NULL, NULL, NULL, '2022-03-08 23:20:18', '2022-03-08 23:20:18', NULL),
(12, 1, 'de', 'Allgemeine Geschäftsbedingungen', '&lt;p&gt;Diese Website wird von a.season betrieben. Auf der gesamten Website beziehen sich die Begriffe &amp;bdquo;wir&amp;ldquo;, &amp;bdquo;uns&amp;ldquo; und &amp;bdquo;unser&amp;ldquo; auf a.season. a.season bietet diese Website, einschlie&amp;szlig;lich aller Informationen, Tools und Dienste, die auf dieser Website f&amp;uuml;r Sie, den Benutzer, verf&amp;uuml;gbar sind, unter der Bedingung, dass Sie alle hier aufgef&amp;uuml;hrten Bedingungen, Richtlinien und Hinweise akzeptieren.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Indem Sie unsere Website besuchen und/oder etwas von uns kaufen, nehmen Sie an unserem &amp;bdquo;Service&amp;ldquo; teil und stimmen zu, an die folgenden Allgemeinen Gesch&amp;auml;ftsbedingungen (&amp;bdquo;Nutzungsbedingungen&amp;ldquo;, &amp;bdquo;Bedingungen&amp;ldquo;) gebunden zu sein, einschlie&amp;szlig;lich dieser zus&amp;auml;tzlichen Allgemeinen Gesch&amp;auml;ftsbedingungen und Richtlinien auf die hier verwiesen wird und/oder die per Hyperlink verf&amp;uuml;gbar sind. Diese Nutzungsbedingungen gelten f&amp;uuml;r alle Benutzer der Website, einschlie&amp;szlig;lich, aber nicht beschr&amp;auml;nkt auf Benutzer, die Browser, Verk&amp;auml;ufer, Kunden, H&amp;auml;ndler und/oder Beitragende von Inhalten sind.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Online-Shop-Bedingungen&lt;/p&gt;\n&lt;p&gt;Indem Sie diesen Nutzungsbedingungen zustimmen, erkl&amp;auml;ren Sie, dass Sie in Ihrem Bundesland oder Ihrer Provinz mindestens vollj&amp;auml;hrig sind oder dass Sie in Ihrem Bundesland oder Ihrer Provinz vollj&amp;auml;hrig sind und uns Ihre Zustimmung dazu gegeben haben gestatten Sie Ihren minderj&amp;auml;hrigen Angeh&amp;ouml;rigen die Nutzung dieser Website.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Allgemeine Bedingungen&lt;/p&gt;\n&lt;p&gt;Wir behalten uns das Recht vor, den Service jederzeit und ohne Angabe von Gr&amp;uuml;nden zu verweigern.&lt;br /&gt;Sie verstehen, dass Ihre Inhalte (ohne Kreditkarteninformationen) unverschl&amp;uuml;sselt &amp;uuml;bertragen werden k&amp;ouml;nnen und (a) &amp;Uuml;bertragungen &amp;uuml;ber verschiedene Netzwerke beinhalten; und (b) &amp;Auml;nderungen zur Konformit&amp;auml;t und Anpassung an technische Anforderungen von Verbindungsnetzwerken oder -ger&amp;auml;ten. Kreditkarteninformationen werden w&amp;auml;hrend der &amp;Uuml;bertragung &amp;uuml;ber Netzwerke immer verschl&amp;uuml;sselt.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Lizenz&lt;/p&gt;\n&lt;p&gt;Du darfst nicht:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Ver&amp;ouml;ffentlichen Sie Material von Website Name erneut&lt;br /&gt;Verkaufen, vermieten oder unterlizenzieren Sie Material von Website Name&lt;br /&gt;Reproduzieren, duplizieren oder kopieren Sie Material von Website Name&lt;br /&gt;Verbreiten Sie Inhalte von Website Name&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Haftungsausschluss&lt;/p&gt;\n&lt;p&gt;Soweit nach geltendem Recht zul&amp;auml;ssig, schlie&amp;szlig;en wir alle Zusicherungen aus:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;unsere oder Ihre Haftung f&amp;uuml;r Tod oder K&amp;ouml;rperverletzung einschr&amp;auml;nken oder ausschlie&amp;szlig;en;&lt;br /&gt;unsere oder Ihre Haftung f&amp;uuml;r Betrug oder betr&amp;uuml;gerische Falschdarstellung einschr&amp;auml;nken oder ausschlie&amp;szlig;en;&lt;br /&gt;unsere oder Ihre Verbindlichkeiten auf eine Weise einschr&amp;auml;nken, die nach geltendem Recht nicht zul&amp;auml;ssig ist; oder&lt;br /&gt;schlie&amp;szlig;en Sie jegliche unserer oder Ihrer Verbindlichkeiten aus, die nach geltendem Recht nicht ausgeschlossen werden k&amp;ouml;nnen.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Solange die Website und die Informationen und Dienste auf der Website kostenlos zur Verf&amp;uuml;gung gestellt werden, haften wir nicht f&amp;uuml;r Verluste oder Sch&amp;auml;den jeglicher Art.&lt;/p&gt;', NULL, NULL, NULL, NULL, '2022-03-08 23:20:48', '2022-03-08 23:20:48', NULL),
(19, 10, 'en', 'gfdgf', '&lt;p&gt;gfdgd&lt;/p&gt;', NULL, NULL, NULL, NULL, '2022-07-31 04:30:08', '2022-07-31 04:30:08', NULL),
(24, 12, 'en', 'fsdfd', '&lt;p&gt;fsdfsdf&lt;/p&gt;', NULL, NULL, NULL, NULL, '2022-07-31 05:57:51', '2022-07-31 05:57:51', NULL),
(25, 13, 'en', 'sfs', '&lt;p&gt;fsdfsd&lt;/p&gt;', NULL, NULL, NULL, NULL, '2022-07-31 06:00:07', '2022-07-31 06:00:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('irfanchowdhury434@gmail.com', '$2y$10$0CPDos0nEiPWV7fNr6eTV.Emy2/coczkcllnc5aJ6gTujrQjMVohu', '2022-02-24 01:11:02'),
('zuahir2025@gmail.com', '$2y$10$/3XCJqCoLZ3mzD880G8xae2KVwX9cohwn72gdlsPWyag9/qOFY1ci', '2022-02-24 01:31:51'),
('zuhair2025@gmail.com', '$2y$10$PPI617q4e6CWxsYh5mQ6eOv7TekVTGr3b.uKkZTAce51nCqMshR8W', '2022-02-24 01:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'product', 'web', NULL, NULL),
(2, 'catalog', 'web', NULL, NULL),
(3, 'product-view', 'web', NULL, NULL),
(4, 'product-store', 'web', NULL, NULL),
(5, 'product-edit', 'web', NULL, NULL),
(6, 'product-action', 'web', NULL, NULL),
(7, 'category', 'web', NULL, NULL),
(8, 'category-view', 'web', NULL, NULL),
(9, 'category-store', 'web', NULL, NULL),
(10, 'category-edit', 'web', NULL, NULL),
(11, 'category-action', 'web', NULL, NULL),
(12, 'brand', 'web', NULL, NULL),
(13, 'brand-view', 'web', NULL, NULL),
(14, 'brand-store', 'web', NULL, NULL),
(15, 'brand-edit', 'web', NULL, NULL),
(16, 'brand-action', 'web', NULL, NULL),
(17, 'attribute_set', 'web', NULL, NULL),
(18, 'attribute_set-view', 'web', NULL, NULL),
(19, 'attribute_set-store', 'web', NULL, NULL),
(20, 'attribute_set-edit', 'web', NULL, NULL),
(21, 'attribute_set-action', 'web', NULL, NULL),
(22, 'attribute', 'web', NULL, NULL),
(23, 'attribute-view', 'web', NULL, NULL),
(24, 'attribute-store', 'web', NULL, NULL),
(25, 'attribute-edit', 'web', NULL, NULL),
(26, 'attribute-action', 'web', NULL, NULL),
(27, 'tag', 'web', NULL, NULL),
(28, 'tag-view', 'web', NULL, NULL),
(29, 'tag-store', 'web', NULL, NULL),
(30, 'tag-edit', 'web', NULL, NULL),
(31, 'tag-action', 'web', NULL, NULL),
(32, 'flash_sale', 'web', NULL, NULL),
(33, 'flash_sale-view', 'web', NULL, NULL),
(34, 'flash_sale-store', 'web', NULL, NULL),
(35, 'flash_sale-edit', 'web', NULL, NULL),
(36, 'flash_sale-action', 'web', NULL, NULL),
(37, 'coupon', 'web', NULL, NULL),
(38, 'coupon-view', 'web', NULL, NULL),
(39, 'coupon-store', 'web', NULL, NULL),
(40, 'coupon-edit', 'web', NULL, NULL),
(41, 'coupon-action', 'web', NULL, NULL),
(42, 'page', 'web', NULL, NULL),
(43, 'page-view', 'web', NULL, NULL),
(44, 'page-store', 'web', NULL, NULL),
(45, 'page-edit', 'web', NULL, NULL),
(46, 'page-action', 'web', NULL, NULL),
(47, 'menu', 'web', NULL, NULL),
(48, 'menu-view', 'web', NULL, NULL),
(49, 'menu-store', 'web', NULL, NULL),
(50, 'menu-edit', 'web', NULL, NULL),
(51, 'menu-action', 'web', NULL, NULL),
(52, 'menu_item', 'web', NULL, NULL),
(53, 'menu_item-view', 'web', NULL, NULL),
(54, 'menu_item-store', 'web', NULL, NULL),
(55, 'menu_item-edit', 'web', NULL, NULL),
(56, 'menu_item-action', 'web', NULL, NULL),
(57, 'role', 'web', NULL, NULL),
(58, 'role-view', 'web', NULL, NULL),
(59, 'role-store', 'web', NULL, NULL),
(60, 'role-edit', 'web', NULL, NULL),
(61, 'role-action', 'web', NULL, NULL),
(62, 'set_permission', 'web', NULL, NULL),
(63, 'user', 'web', NULL, NULL),
(64, 'user-view', 'web', NULL, NULL),
(65, 'user-store', 'web', NULL, NULL),
(66, 'user-edit', 'web', NULL, NULL),
(67, 'user-action', 'web', NULL, NULL),
(68, 'appearance', 'web', NULL, NULL),
(69, 'store_front', 'web', NULL, NULL),
(70, 'slider', 'web', NULL, NULL),
(71, 'slider-view', 'web', NULL, NULL),
(72, 'slider-store', 'web', NULL, NULL),
(73, 'slider-edit', 'web', NULL, NULL),
(74, 'slider-action', 'web', NULL, NULL),
(75, 'site-setting', 'web', NULL, NULL),
(76, 'setting', 'web', NULL, NULL),
(77, 'language', 'web', NULL, NULL),
(78, 'language-view', 'web', NULL, NULL),
(79, 'language-store', 'web', NULL, NULL),
(80, 'language-edit', 'web', NULL, NULL),
(81, 'language-action', 'web', NULL, NULL),
(82, 'users_and_roles', 'web', NULL, NULL),
(83, 'country', 'web', NULL, NULL),
(84, 'country-view', 'web', NULL, NULL),
(85, 'country-store', 'web', NULL, NULL),
(86, 'country-edit', 'web', NULL, NULL),
(87, 'country-action', 'web', NULL, NULL),
(88, 'currency', 'web', NULL, NULL),
(89, 'currency-view', 'web', NULL, NULL),
(90, 'currency-store', 'web', NULL, NULL),
(91, 'currency-edit', 'web', NULL, NULL),
(92, 'currency-action', 'web', NULL, NULL),
(93, 'review', 'web', NULL, NULL),
(94, 'review-view', 'web', NULL, NULL),
(95, 'review-store', 'web', NULL, NULL),
(96, 'review-edit', 'web', NULL, NULL),
(97, 'review-action', 'web', NULL, NULL),
(98, 'sale', 'web', NULL, NULL),
(99, 'order-view', 'web', NULL, NULL),
(100, 'transaction-view', 'web', NULL, NULL),
(101, 'faq', 'web', NULL, NULL),
(102, 'faq-view', 'web', NULL, NULL),
(103, 'faq-store', 'web', NULL, NULL),
(104, 'faq-edit', 'web', NULL, NULL),
(105, 'faq-action', 'web', NULL, NULL),
(106, 'localization', 'web', NULL, NULL),
(107, 'tax', 'web', NULL, NULL),
(108, 'tax-view', 'web', NULL, NULL),
(109, 'tax-store', 'web', NULL, NULL),
(110, 'tax-edit', 'web', NULL, NULL),
(111, 'tax-action', 'web', NULL, NULL),
(112, 'currency-rate', 'web', NULL, NULL),
(113, 'currency-rate-view', 'web', NULL, NULL),
(114, 'currency-rate-edit', 'web', NULL, NULL),
(115, 'currency-rate-action', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `tax_id` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,4) NOT NULL,
  `special_price` decimal(10,4) DEFAULT NULL,
  `special_price_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_special` tinyint DEFAULT NULL,
  `special_price_start` date DEFAULT NULL,
  `special_price_end` date DEFAULT NULL,
  `selling_price` decimal(10,4) DEFAULT NULL,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `manage_stock` tinyint DEFAULT '0',
  `qty` int DEFAULT NULL,
  `in_stock` tinyint DEFAULT NULL,
  `viewed` int DEFAULT NULL,
  `is_active` tinyint NOT NULL,
  `new_from` date DEFAULT NULL,
  `new_to` date DEFAULT NULL,
  `avg_rating` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `tax_id`, `slug`, `price`, `special_price`, `special_price_type`, `is_special`, `special_price_start`, `special_price_end`, `selling_price`, `sku`, `manage_stock`, `qty`, `in_stock`, `viewed`, `is_active`, `new_from`, `new_to`, `avg_rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 'apple-iphone-11-64gb-yellow-fully-unlocked', '100.0000', '0.0000', '', 0, NULL, NULL, '0.0000', 'SO4JK74', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 00:46:06', '2022-03-03 03:33:29', NULL),
(2, 2, 1, 'apple-iphone-x-64gb-silver-fully-unlocked', '284.0000', '0.0000', '', 0, NULL, NULL, '0.0000', 'CE45VERT', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 01:26:24', '2022-03-03 03:30:06', NULL),
(3, 1, 1, 'samsung-galaxy-a52-5g-android-cell-phone', '200.0000', '150.0000', '', 0, NULL, NULL, '0.0000', 'KGH45YRT', 1, 2, 1, NULL, 1, NULL, NULL, 3, '2022-02-13 01:30:20', '2022-04-23 08:07:17', NULL),
(4, 2, 1, 'apple-iphone-11-pro-max-(64gb)-–-silver', '815.0000', '0.0100', '', 1, '2022-04-10', '2022-04-20', '0.0100', 'S57UK74', 1, 100, 1, NULL, 1, '2022-04-10', '2022-04-20', 3, '2022-02-13 01:36:03', '2022-12-15 05:28:21', NULL),
(5, 3, 1, 'oneplus-8-pro-onyx-black-android-smartphone', '240.5000', '0.0000', '', 0, NULL, NULL, '0.0000', 'YHE4M7', 0, NULL, 0, NULL, 1, NULL, NULL, 0, '2022-02-13 01:41:17', '2022-04-14 11:47:13', NULL),
(6, 2, 1, 'apple-iphone-xs-max-64gb--white', '560.0000', '152.0000', '', 0, NULL, NULL, '0.0000', 'KLIOLP', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 02:11:05', '2022-03-31 08:23:05', NULL),
(7, 1, 1, 'samsung-galaxy-note-10', '590.0000', '500.0000', '', 1, NULL, NULL, '500.0000', 'LKOUHJ', 1, 5, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 02:18:25', '2022-03-31 08:22:30', NULL),
(8, 4, 1, 'asus-vivobook-15-thin-and-light-laptop-15.6-inch-fhd-display', '519.0000', '470.0000', '', 1, NULL, NULL, '470.0000', 'SL4JK74', 0, NULL, 1, NULL, 1, '2022-04-01', '2023-04-01', 0, '2022-02-14 05:36:08', '2022-05-02 16:18:14', NULL),
(9, 4, 1, 'asus-vivobook-17.3″-i5-8gb_1tb-17.3″-fhd-display', '589.0000', '549.0000', '', 1, NULL, NULL, '549.0000', 'BE48VGRN', 0, NULL, 0, NULL, 1, NULL, NULL, 0, '2022-02-14 06:04:57', '2022-05-02 16:19:15', NULL),
(10, 6, 1, 'apple-macbook-pro-13.3-inch-2.7ghz-dual-core-i5', '1299.0000', '999.0000', '', 1, NULL, NULL, '999.0000', 'NBM59UY', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-14 23:40:48', '2022-03-03 02:19:43', NULL),
(11, 4, 1, 'asus-vivobook-15-inch-fhd-slate-gray', '496.0000', '456.0000', '', 1, NULL, NULL, '456.0000', 'KLB5UM', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-15 01:02:40', '2022-03-03 02:11:52', NULL),
(12, 6, 1, 'apple-macbook-pro-15.4-inch-laptop', '1355.0000', '1155.0000', '', 1, NULL, NULL, '1155.0000', 'ZR85UFA', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-15 02:31:06', '2022-04-26 06:30:13', NULL),
(13, 1, 1, 'element-27-inch-1080p-frameless-ips-lcd-pc-monitor', '159.0000', '269.0000', '', 1, NULL, NULL, '269.0000', 'BE875TET', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 01:42:46', '2022-03-03 02:04:07', NULL),
(14, 1, 1, 'jvc-70-inch-class-4k-uhd-2160p-roku-smart-tv', '797.0000', '667.0000', '', 1, NULL, NULL, '767.0000', 'JVC45VGWT', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 03:32:38', '2022-03-03 02:01:01', NULL),
(15, 7, 1, 'lg-43-inch-4k-ultra-hd-smart-led-tv-2020', '346.9900', '289.9900', '', 1, NULL, NULL, '389.9900', 'LG4MK74', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 03:45:01', '2022-03-03 01:55:05', NULL),
(16, NULL, 1, 'samsung-75-inc-class-4k-ultra-hd-hdr-smart-qled-tv', '3299.9900', '2799.9900', '', 1, NULL, NULL, '2799.9900', '75ANGUHD', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:08:00', '2022-03-03 01:38:56', NULL),
(17, 8, 1, 'sony-65-inc-class-4k-uhd-led-android-smart-tv-hdr-bravia', '1398.0000', '1298.0000', '', 1, NULL, NULL, '1498.0000', 'S6C4ULAS', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:13:27', '2022-03-03 01:27:28', NULL),
(18, NULL, 1, 'apple-mwp22am-a-airpods-pro', '189.9800', '149.9800', '', 1, NULL, NULL, '149.9800', 'B9EAVGRT', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:25:57', '2022-03-03 01:23:26', NULL),
(19, 5, 1, 'beats-studio3-wireless-headphones-–-matte-black', '339.0000', '289.0000', '', 1, NULL, NULL, '289.0000', 'KE35VGET', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:32:39', '2022-03-19 03:14:36', NULL),
(20, NULL, 1, 'bose-quietcomfort-noise-cancelling-earbuds-–-black', '319.0000', '279.0000', '', 1, NULL, NULL, '279.0000', 'CIKO6AE', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:35:57', '2022-03-03 01:10:26', NULL),
(21, 5, 1, 'bose-noise-cancelling-wireless-bluetooth', '479.0000', '439.0000', '', 1, NULL, NULL, '439.0000', 'RO5JK73', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:39:41', '2022-03-03 01:06:29', NULL),
(22, NULL, 1, 'google-pixel-buds,-clearly-white', '304.9500', '204.9500', '', 1, '1970-01-01', '1970-01-01', '204.9500', 'HM45UYA', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-20 04:42:50', '2022-03-03 00:14:31', NULL),
(23, NULL, 1, 'cubitt-smart-watch-ct2s-waterproof-fitness-tracker', '65.0000', '55.0000', '', 1, '1970-01-01', '1970-01-01', '95.0000', 'KM45VGRT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 00:19:37', '2022-03-03 00:10:16', NULL),
(24, NULL, 1, 'apple-watch-series-3-gps-–-42mm-–-sport-band', '299.0000', '249.0000', '', 1, '1970-01-01', '1970-01-01', '249.0000', 'EQA5VGRT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 00:25:42', '2022-03-03 00:03:47', NULL),
(25, 1, 1, 'স্যামসাং-গালাক্সি-অ্যালুমিনিয়াম', '249.9900', '229.9900', '', 1, '1970-01-01', '1970-01-01', '229.9900', 'CE45UGT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 00:41:30', '2022-03-02 08:49:24', NULL),
(26, 9, 1, 'Canon-EOS-বিদ্রোহী-ক্যামেরা-T7-EF-S-18-55mm-IS-II-কিট', '529.9900', '479.9900', '', 1, '1970-01-01', '1970-01-01', '479.9900', 'KMT5VET', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 01:10:55', '2022-03-02 08:46:36', NULL),
(27, 9, 1, 'Canon-SX740BK-পাওয়ারশট-SX740-HS-ডিজিটাল-ক্যামেরা', '499.9500', '399.9500', '', 1, '1970-01-01', '1970-01-01', '399.9500', 'BE9TGAV', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 01:18:44', '2022-03-02 08:43:22', NULL),
(28, 10, 1, 'ফুজিফিল্ম-16642939-X100V-ডিজিটাল-ক্যামেরা-–-সিলভার', '1699.0000', '1399.0000', '', 1, '1970-01-01', '1970-01-01', '1399.0000', 'BE459GRT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 01:24:21', '2022-03-02 08:40:53', NULL),
(29, NULL, 1, 'পুরুষদের-জন্য-প্রথম-নৃত্য-অতিরিক্ত-বড়-জুতা-নৈমিত্তিক-জুতা-ক্যামো-প্রিন্ট-বড়-আকারের-ফ্যাশন-স্নিকার-পুরুষদের-জন্য', '180.0000', '0.0000', '', 0, '1970-01-01', '1970-01-01', '0.0000', 'GDSFSDF', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 01:44:26', '2022-03-02 08:26:50', NULL),
(30, NULL, 1, 'COKAFIL-Zapatillas-de-correr-para-hombre-Zapatillas-de-tenis-atléticas-con-cuchilla-para-caminar-Zapatillas-de-deporte-de-moda', '550.0000', '0.0000', '', 0, '1970-01-01', '1970-01-01', '0.0000', '17998302', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 02:02:42', '2022-03-02 08:22:04', NULL),
(31, NULL, 1, 'ওয়ান্ডার-নেশন-টডলার-গার্লস-গ্লিটার-ক্যাজুয়াল-মেরি-জেন-স্নিকার্স', '2156.0000', '195.0000', '', 0, '1970-01-01', '1970-01-01', '0.0000', '45581026', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 02:10:24', '2022-03-02 08:19:20', NULL),
(32, NULL, 1, 'ড্রাগন-টাচ-ম্যাক্স-10-ট্যাবলেট-অ্যান্ড্রয়েড-10.0-ওএস', '189.9900', '180.0000', '', 1, '1970-01-01', '1970-01-01', '129.9900', 'ZR45VGRT', 0, NULL, 1, NULL, 1, '2022-04-01', '2023-04-01', 0, '2022-02-22 02:33:31', '2022-03-02 08:14:51', NULL),
(33, 7, 1, 'garmin-vivo-smart-3-activity-tracker-–-large', '49.9900', '30.0000', '', 1, '1970-01-01', '1970-01-01', '30.0000', 'BE458GET', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 02:58:36', '2022-04-24 05:24:32', NULL),
(34, NULL, 1, 'echo-dot-(4th-gen,-2020-release)-|-smart-speaker', '49.9900', '40.0000', '', 1, '1970-01-01', '1970-01-01', '40.0000', 'SO4JK47', 0, NULL, 1, NULL, 1, '2022-04-01', '2023-04-01', 0, '2022-02-22 03:40:18', '2022-07-07 07:50:40', NULL),
(48, 1, 1, 'samsung-a12', '100.0000', '0.0000', '', 1, NULL, NULL, '0.0000', 'fdsfsge', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-03-10 02:08:25', '2022-04-26 08:00:02', NULL),
(52, NULL, 1, 'women\'s-check-top', '125.0000', '0.0000', '', 1, NULL, NULL, '0.0000', 'sdn45', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-05-10 06:21:00', '2022-11-13 05:10:37', NULL),
(57, NULL, 1, 'test-8-11-2022', '43.0000', '0.0000', '', 0, NULL, NULL, '0.0000', 'dfdsfs', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-11-08 05:51:24', '2022-11-08 05:59:34', '2022-11-08 05:59:34'),
(58, NULL, 1, '2-test-8-11-2022', '34.0000', '0.0000', '', 0, NULL, NULL, '0.0000', '2-Test-8-11-2022', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-11-08 05:54:09', '2022-11-08 05:59:34', '2022-11-08 05:59:34'),
(59, NULL, 1, '3-test-8-11-2022', '34.0000', '0.0000', '', 0, NULL, NULL, '0.0000', '3-Test-8-11-2022', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-11-08 05:54:35', '2022-11-08 05:57:23', '2022-11-08 05:57:23'),
(60, 7, 2, 'vincent-hayes', '730.0000', '0.0000', 'Fixed', 1, NULL, NULL, '0.0000', 'dfgdfggd', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-11-08 07:08:12', '2022-11-08 08:45:36', '2022-11-08 08:45:36'),
(61, NULL, 2, 'test-90dfs', '34.0000', '0.0000', '', 1, NULL, NULL, '0.0000', 'dsadsadsa', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-11-08 07:09:01', '2022-11-08 08:42:47', '2022-11-08 08:42:47'),
(62, NULL, 1, 'test12345', '34.0000', '0.0000', '', 0, NULL, NULL, '0.0000', 'test12345', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-11-08 09:20:04', '2022-11-08 09:20:55', '2022-11-08 09:20:55'),
(63, NULL, 2, 'sdfsdd', '34.0000', '0.0000', '', 0, NULL, NULL, '0.0000', 'fsdfdds', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-11-08 09:24:53', '2022-11-08 09:25:47', '2022-11-08 09:25:47'),
(64, NULL, 2, 'gddgfdg', '50.0000', '0.0000', '', 0, NULL, NULL, '0.0000', 'gdfgfdgdg', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-11-08 09:26:33', '2022-11-08 09:34:11', '2022-11-08 09:34:11'),
(65, NULL, 1, 'fcdfsdsfs', '50.0000', '0.0000', '', 1, NULL, NULL, '0.0000', 'gdsgfg', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-11-08 09:57:46', '2022-11-08 10:40:23', '2022-11-08 10:40:23'),
(66, NULL, 2, 'test-545', '34.0000', '0.0000', '', 0, NULL, NULL, '0.0000', 'dfdsfsdfwe', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-11-09 05:09:37', '2022-11-09 08:16:09', '2022-11-09 08:16:09'),
(67, NULL, 2, 'fgdgrgdfg', '50.0000', '0.0000', '', 1, NULL, NULL, '0.0000', 'dgfdggvdfvdfvfd', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-11-09 05:10:01', '2022-11-09 08:16:09', '2022-11-09 08:16:09'),
(68, NULL, 2, 'ddgddgdgdasd', '43.0000', '0.0000', '', 1, NULL, NULL, '0.0000', 'gdfgdg', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-11-09 05:10:39', '2022-11-09 06:47:45', '2022-11-09 06:47:45'),
(69, NULL, 1, 'test-product', '34.0000', '0.0000', '', 1, NULL, NULL, '0.0000', 'gdfg454dsdasdsa', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-11-12 06:53:28', '2022-11-12 06:59:03', '2022-11-12 06:59:03'),
(70, 9, 2, 'testtset', '35.0000', '0.0000', '', 0, NULL, NULL, '0.0000', 'fsdfsdfds', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-12-29 09:52:19', '2023-01-31 08:14:05', '2023-01-31 08:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_value`
--

CREATE TABLE `product_attribute_value` (
  `product_id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `attribute_value_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_attribute_value`
--

INSERT INTO `product_attribute_value` (`product_id`, `attribute_id`, `attribute_value_id`) VALUES
(12, 2, 2),
(12, 2, 3),
(12, 3, 6),
(48, 1, 1),
(8, 2, 2),
(8, 3, 5),
(8, 1, 10),
(9, 1, 11),
(9, 2, 3),
(9, 4, 8),
(49, 1, 10),
(49, 1, 11),
(49, 1, 12),
(49, 3, 13),
(49, 3, 14),
(49, 3, 15),
(34, 4, 7),
(54, 1, 10),
(54, 1, 11),
(54, 1, 12),
(54, 3, 13),
(54, 3, 14),
(55, 1, 10),
(55, 1, 11),
(55, 3, 13),
(55, 3, 14),
(56, 2, 2),
(56, 2, 3),
(56, 2, 2),
(56, 2, 3),
(56, 1, 10),
(56, 1, 11),
(56, 1, 12),
(56, 1, 10),
(56, 1, 11),
(56, 1, 12),
(62, 1, 10),
(62, 26, 33),
(63, 1, 10),
(52, 1, 10),
(52, 1, 11),
(52, 1, 12),
(52, 3, 13),
(52, 3, 14),
(52, 3, 15),
(52, 3, 13),
(52, 3, 14),
(52, 3, 15),
(52, 1, 10),
(52, 1, 11),
(52, 1, 12),
(4, 2, 2),
(4, 2, 2),
(4, 2, 3),
(4, 2, 3),
(4, 1, 10),
(4, 1, 10),
(4, 1, 11),
(4, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_medium` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_small` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `image_medium`, `image_small`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, '/images/products/large/f6qXdQdZVm.webp', '/images/products/medium/f6qXdQdZVm.webp', '/images/products/small/f6qXdQdZVm.webp', 'base', NULL, '2022-03-10 00:33:29'),
(2, 1, '/images/products/large/fjTtGCeVXq.webp', '/images/products/medium/fjTtGCeVXq.webp', '/images/products/small/fjTtGCeVXq.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(3, 1, '/images/products/large/d6LWjDgIOC.webp', '/images/products/medium/d6LWjDgIOC.webp', '/images/products/small/d6LWjDgIOC.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(4, 1, '/images/products/large/w2fWutUCYg.webp', '/images/products/medium/w2fWutUCYg.webp', '/images/products/small/w2fWutUCYg.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(5, 1, '/images/products/large/UgIMV1OlvG.webp', '/images/products/medium/UgIMV1OlvG.webp', '/images/products/small/UgIMV1OlvG.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(6, 2, '/images/products/large/oxnt4KyMw6.webp', '/images/products/medium/oxnt4KyMw6.webp', '/images/products/small/oxnt4KyMw6.webp', 'base', NULL, '2022-03-10 00:33:29'),
(7, 2, '/images/products/large/uzkWGChGRu.webp', '/images/products/medium/uzkWGChGRu.webp', '/images/products/small/uzkWGChGRu.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(8, 2, '/images/products/large/WAwfYVJrwW.webp', '/images/products/medium/WAwfYVJrwW.webp', '/images/products/small/WAwfYVJrwW.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(9, 2, '/images/products/large/QnLOPyaiSc.webp', '/images/products/medium/QnLOPyaiSc.webp', '/images/products/small/QnLOPyaiSc.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(10, 3, '/images/products/large/gxAhN2e8yY.webp', '/images/products/medium/gxAhN2e8yY.webp', '/images/products/small/gxAhN2e8yY.webp', 'base', NULL, '2022-03-10 00:33:29'),
(11, 3, '/images/products/large/vL50aZsaHL.webp', '/images/products/medium/vL50aZsaHL.webp', '/images/products/small/vL50aZsaHL.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(12, 3, '/images/products/large/lm7LYgCS5I.webp', '/images/products/medium/lm7LYgCS5I.webp', '/images/products/small/lm7LYgCS5I.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(13, 4, '/images/products/large/ydFqlpWr4D.webp', '/images/products/medium/ydFqlpWr4D.webp', '/images/products/small/ydFqlpWr4D.webp', 'base', NULL, '2022-03-10 00:33:29'),
(14, 4, '/images/products/large/qeD9Bz8jGz.webp', '/images/products/medium/qeD9Bz8jGz.webp', '/images/products/small/qeD9Bz8jGz.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(15, 4, '/images/products/large/ccIIb5kBJu.webp', '/images/products/medium/ccIIb5kBJu.webp', '/images/products/small/ccIIb5kBJu.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(16, 4, '/images/products/large/dCIN7dLIJk.webp', '/images/products/medium/dCIN7dLIJk.webp', '/images/products/small/dCIN7dLIJk.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(17, 5, '/images/products/large/XAbIiTyFAC.webp', '/images/products/medium/XAbIiTyFAC.webp', '/images/products/small/XAbIiTyFAC.webp', 'base', NULL, '2022-03-10 00:33:29'),
(18, 5, '/images/products/large/oUGP4MQBc3.webp', '/images/products/medium/oUGP4MQBc3.webp', '/images/products/small/oUGP4MQBc3.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(19, 5, '/images/products/large/jO705z6Fwh.webp', '/images/products/medium/jO705z6Fwh.webp', '/images/products/small/jO705z6Fwh.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(20, 5, '/images/products/large/XoAdBNMrhi.webp', '/images/products/medium/XoAdBNMrhi.webp', '/images/products/small/XoAdBNMrhi.webp', 'additional', NULL, '2022-03-10 00:33:29'),
(21, 6, '/images/products/large/R9phgu9T1C.webp', '/images/products/medium/R9phgu9T1C.webp', '/images/products/small/R9phgu9T1C.webp', 'base', NULL, '2022-03-10 00:33:29'),
(22, 6, '/images/products/large/k8R2d1MiCT.webp', '/images/products/medium/k8R2d1MiCT.webp', '/images/products/small/k8R2d1MiCT.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(23, 6, '/images/products/large/rX3IPqNWvn.webp', '/images/products/medium/rX3IPqNWvn.webp', '/images/products/small/rX3IPqNWvn.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(24, 6, '/images/products/large/KHnOGzt8Ep.webp', '/images/products/medium/KHnOGzt8Ep.webp', '/images/products/small/KHnOGzt8Ep.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(25, 7, '/images/products/large/9og6IARLNE.webp', '/images/products/medium/9og6IARLNE.webp', '/images/products/small/9og6IARLNE.webp', 'base', NULL, '2022-03-10 00:33:30'),
(26, 7, '/images/products/large/ddRCIVLTXd.webp', '/images/products/medium/ddRCIVLTXd.webp', '/images/products/small/ddRCIVLTXd.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(27, 7, '/images/products/large/oqMANvnaD5.webp', '/images/products/medium/oqMANvnaD5.webp', '/images/products/small/oqMANvnaD5.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(28, 7, '/images/products/large/KPHsvgWRDm.webp', '/images/products/medium/KPHsvgWRDm.webp', '/images/products/small/KPHsvgWRDm.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(29, 8, '/images/products/large/keY4OoXOe4.webp', '/images/products/medium/keY4OoXOe4.webp', '/images/products/small/keY4OoXOe4.webp', 'base', NULL, '2022-03-10 00:33:30'),
(30, 8, '/images/products/large/dCsNGJQbbb.webp', '/images/products/medium/dCsNGJQbbb.webp', '/images/products/small/dCsNGJQbbb.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(31, 8, '/images/products/large/7tAW8ED5hq.webp', '/images/products/medium/7tAW8ED5hq.webp', '/images/products/small/7tAW8ED5hq.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(32, 8, '/images/products/large/X263gh72gf.webp', '/images/products/medium/X263gh72gf.webp', '/images/products/small/X263gh72gf.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(33, 9, '/images/products/large/aYunFteYg6.webp', '/images/products/medium/aYunFteYg6.webp', '/images/products/small/aYunFteYg6.webp', 'base', NULL, '2022-03-10 00:33:30'),
(34, 9, '/images/products/large/m6ibd3hpwh.webp', '/images/products/medium/m6ibd3hpwh.webp', '/images/products/small/m6ibd3hpwh.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(35, 9, '/images/products/large/HGuueQID54.webp', '/images/products/medium/HGuueQID54.webp', '/images/products/small/HGuueQID54.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(36, 9, '/images/products/large/lcN6VkqjTw.webp', '/images/products/medium/lcN6VkqjTw.webp', '/images/products/small/lcN6VkqjTw.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(37, 10, '/images/products/large/6E5wX5Zgan.webp', '/images/products/medium/6E5wX5Zgan.webp', '/images/products/small/6E5wX5Zgan.webp', 'base', NULL, '2022-03-10 00:33:30'),
(38, 10, '/images/products/large/ypnzNi6ULc.webp', '/images/products/medium/ypnzNi6ULc.webp', '/images/products/small/ypnzNi6ULc.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(39, 10, '/images/products/large/MB7rDDQ0GS.webp', '/images/products/medium/MB7rDDQ0GS.webp', '/images/products/small/MB7rDDQ0GS.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(40, 10, '/images/products/large/Z0KMQoUYDp.webp', '/images/products/medium/Z0KMQoUYDp.webp', '/images/products/small/Z0KMQoUYDp.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(41, 10, '/images/products/large/9bDNSNNhZH.webp', '/images/products/medium/9bDNSNNhZH.webp', '/images/products/small/9bDNSNNhZH.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(42, 11, '/images/products/large/GUSVaGyEPn.webp', '/images/products/medium/GUSVaGyEPn.webp', '/images/products/small/GUSVaGyEPn.webp', 'base', NULL, '2022-03-10 00:33:30'),
(43, 11, '/images/products/large/jDZOoyuMrd.webp', '/images/products/medium/jDZOoyuMrd.webp', '/images/products/small/jDZOoyuMrd.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(44, 11, '/images/products/large/3IXeP0kqnk.webp', '/images/products/medium/3IXeP0kqnk.webp', '/images/products/small/3IXeP0kqnk.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(45, 12, '/images/products/large/GUj2sOZUDj.webp', '/images/products/medium/GUj2sOZUDj.webp', '/images/products/small/GUj2sOZUDj.webp', 'base', '2022-02-15 02:33:30', '2022-03-10 00:33:30'),
(46, 12, '/images/products/large/zRjD4PUjzv.webp', '/images/products/medium/zRjD4PUjzv.webp', '/images/products/small/zRjD4PUjzv.webp', 'additional', '2022-02-15 02:33:31', '2022-03-10 00:33:30'),
(47, 12, '/images/products/large/YHAQ4uCIox.webp', '/images/products/medium/YHAQ4uCIox.webp', '/images/products/small/YHAQ4uCIox.webp', 'additional', '2022-02-15 02:33:32', '2022-03-10 00:33:30'),
(48, 12, '/images/products/large/AgWjOV86tE.webp', '/images/products/medium/AgWjOV86tE.webp', '/images/products/small/AgWjOV86tE.webp', 'additional', '2022-02-15 02:33:33', '2022-03-10 00:33:30'),
(49, 13, '/images/products/large/LijgcikIje.webp', '/images/products/medium/LijgcikIje.webp', '/images/products/small/LijgcikIje.webp', 'base', NULL, '2022-03-10 00:33:30'),
(50, 13, '/images/products/large/egasouujvJ.webp', '/images/products/medium/egasouujvJ.webp', '/images/products/small/egasouujvJ.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(51, 13, '/images/products/large/ldES6gkTT4.webp', '/images/products/medium/ldES6gkTT4.webp', '/images/products/small/ldES6gkTT4.webp', 'additional', NULL, '2022-03-10 00:33:30'),
(52, 13, '/images/products/large/aMYWzUrTZ4.webp', '/images/products/medium/aMYWzUrTZ4.webp', '/images/products/small/aMYWzUrTZ4.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(53, 14, '/images/products/large/tR6bmjhVtN.webp', '/images/products/medium/tR6bmjhVtN.webp', '/images/products/small/tR6bmjhVtN.webp', 'base', NULL, '2022-03-10 00:33:31'),
(54, 14, '/images/products/large/kgtTyYKePg.webp', '/images/products/medium/kgtTyYKePg.webp', '/images/products/small/kgtTyYKePg.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(55, 14, '/images/products/large/ik1a2qwLK1.webp', '/images/products/medium/ik1a2qwLK1.webp', '/images/products/small/ik1a2qwLK1.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(56, 14, '/images/products/large/o3bWuYpmwq.webp', '/images/products/medium/o3bWuYpmwq.webp', '/images/products/small/o3bWuYpmwq.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(57, 15, '/images/products/large/3dcSosTyJm.webp', '/images/products/medium/3dcSosTyJm.webp', '/images/products/small/3dcSosTyJm.webp', 'base', NULL, '2022-03-10 00:33:31'),
(58, 15, '/images/products/large/8JGPVEoQkJ.webp', '/images/products/medium/8JGPVEoQkJ.webp', '/images/products/small/8JGPVEoQkJ.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(59, 15, '/images/products/large/UKDAD3To4p.webp', '/images/products/medium/UKDAD3To4p.webp', '/images/products/small/UKDAD3To4p.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(60, 15, '/images/products/large/XwOhm3yofM.webp', '/images/products/medium/XwOhm3yofM.webp', '/images/products/small/XwOhm3yofM.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(61, 15, '/images/products/large/pFORtU1Oqi.webp', '/images/products/medium/pFORtU1Oqi.webp', '/images/products/small/pFORtU1Oqi.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(62, 16, '/images/products/large/B0WyOzLmBO.webp', '/images/products/medium/B0WyOzLmBO.webp', '/images/products/small/B0WyOzLmBO.webp', 'base', NULL, '2022-03-10 00:33:31'),
(63, 16, '/images/products/large/O5AOgYJQNm.webp', '/images/products/medium/O5AOgYJQNm.webp', '/images/products/small/O5AOgYJQNm.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(64, 16, '/images/products/large/U0rDGvIU8y.webp', '/images/products/medium/U0rDGvIU8y.webp', '/images/products/small/U0rDGvIU8y.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(65, 16, '/images/products/large/ewoDdf4eay.webp', '/images/products/medium/ewoDdf4eay.webp', '/images/products/small/ewoDdf4eay.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(66, 17, '/images/products/large/X6c6DzkEni.webp', '/images/products/medium/X6c6DzkEni.webp', '/images/products/small/X6c6DzkEni.webp', 'base', NULL, '2022-03-10 00:33:31'),
(67, 17, '/images/products/large/Y42Io0W3jY.webp', '/images/products/medium/Y42Io0W3jY.webp', '/images/products/small/Y42Io0W3jY.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(68, 17, '/images/products/large/pqrrbXRzcA.webp', '/images/products/medium/pqrrbXRzcA.webp', '/images/products/small/pqrrbXRzcA.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(69, 17, '/images/products/large/QnqCo5ClyJ.webp', '/images/products/medium/QnqCo5ClyJ.webp', '/images/products/small/QnqCo5ClyJ.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(70, 17, '/images/products/large/1uLvguw6oQ.webp', '/images/products/medium/1uLvguw6oQ.webp', '/images/products/small/1uLvguw6oQ.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(71, 18, '/images/products/large/evhij3lq8R.webp', '/images/products/medium/evhij3lq8R.webp', '/images/products/small/evhij3lq8R.webp', 'base', NULL, '2022-03-10 00:33:31'),
(72, 18, '/images/products/large/jcCCWoYdo9.webp', '/images/products/medium/jcCCWoYdo9.webp', '/images/products/small/jcCCWoYdo9.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(73, 18, '/images/products/large/o7QDloJpjH.webp', '/images/products/medium/o7QDloJpjH.webp', '/images/products/small/o7QDloJpjH.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(74, 18, '/images/products/large/mz39nRoJVk.webp', '/images/products/medium/mz39nRoJVk.webp', '/images/products/small/mz39nRoJVk.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(75, 19, '/images/products/large/G0b0EJCKNf.webp', '/images/products/medium/G0b0EJCKNf.webp', '/images/products/small/G0b0EJCKNf.webp', 'base', NULL, '2022-03-10 00:33:31'),
(76, 19, '/images/products/large/tbPvBIbOUV.webp', '/images/products/medium/tbPvBIbOUV.webp', '/images/products/small/tbPvBIbOUV.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(77, 19, '/images/products/large/nNNO8NMFjW.webp', '/images/products/medium/nNNO8NMFjW.webp', '/images/products/small/nNNO8NMFjW.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(78, 19, '/images/products/large/rRL2Mjrd0j.webp', '/images/products/medium/rRL2Mjrd0j.webp', '/images/products/small/rRL2Mjrd0j.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(79, 19, '/images/products/large/vbHOXoAWLR.webp', '/images/products/medium/vbHOXoAWLR.webp', '/images/products/small/vbHOXoAWLR.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(80, 20, '/images/products/large/MNxwt35GYl.webp', '/images/products/medium/MNxwt35GYl.webp', '/images/products/small/MNxwt35GYl.webp', 'base', NULL, '2022-03-10 00:33:31'),
(81, 20, '/images/products/large/w5NyCIRoIZ.webp', '/images/products/medium/w5NyCIRoIZ.webp', '/images/products/small/w5NyCIRoIZ.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(82, 20, '/images/products/large/fiKlEn7SdR.webp', '/images/products/medium/fiKlEn7SdR.webp', '/images/products/small/fiKlEn7SdR.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(83, 20, '/images/products/large/1SzJc09Q1L.webp', '/images/products/medium/1SzJc09Q1L.webp', '/images/products/small/1SzJc09Q1L.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(84, 21, '/images/products/large/GaaPwCpDKf.webp', '/images/products/medium/GaaPwCpDKf.webp', '/images/products/small/GaaPwCpDKf.webp', 'base', NULL, '2022-03-10 00:33:31'),
(85, 21, '/images/products/large/q27XLRceit.webp', '/images/products/medium/q27XLRceit.webp', '/images/products/small/q27XLRceit.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(86, 21, '/images/products/large/doNhvLEKNs.webp', '/images/products/medium/doNhvLEKNs.webp', '/images/products/small/doNhvLEKNs.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(87, 21, '/images/products/large/leeBIPpxsU.webp', '/images/products/medium/leeBIPpxsU.webp', '/images/products/small/leeBIPpxsU.webp', 'additional', NULL, '2022-03-10 00:33:31'),
(88, 22, '/images/products/large/4l1LV6eNfS.webp', '/images/products/medium/4l1LV6eNfS.webp', '/images/products/small/4l1LV6eNfS.webp', 'base', NULL, '2022-03-10 00:33:32'),
(89, 22, '/images/products/large/PWHNUfOUzj.webp', '/images/products/medium/PWHNUfOUzj.webp', '/images/products/small/PWHNUfOUzj.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(90, 22, '/images/products/large/CFiNLnfr18.webp', '/images/products/medium/CFiNLnfr18.webp', '/images/products/small/CFiNLnfr18.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(91, 23, '/images/products/large/8druJ8Ag4k.webp', '/images/products/medium/8druJ8Ag4k.webp', '/images/products/small/8druJ8Ag4k.webp', 'base', NULL, '2022-03-10 00:33:32'),
(92, 23, '/images/products/large/1H4OSSruDh.webp', '/images/products/medium/1H4OSSruDh.webp', '/images/products/small/1H4OSSruDh.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(93, 23, '/images/products/large/maiNKUN0Ns.webp', '/images/products/medium/maiNKUN0Ns.webp', '/images/products/small/maiNKUN0Ns.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(94, 24, '/images/products/large/DvKRMbOFCR.webp', '/images/products/medium/DvKRMbOFCR.webp', '/images/products/small/DvKRMbOFCR.webp', 'base', NULL, '2022-03-10 00:33:32'),
(95, 24, '/images/products/large/m3JmjZr2Tz.webp', '/images/products/medium/m3JmjZr2Tz.webp', '/images/products/small/m3JmjZr2Tz.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(96, 25, '/images/products/large/ag323drGTc.webp', '/images/products/medium/ag323drGTc.webp', '/images/products/small/ag323drGTc.webp', 'base', NULL, '2022-03-10 00:33:32'),
(97, 25, '/images/products/large/8RZz6OVtzc.webp', '/images/products/medium/8RZz6OVtzc.webp', '/images/products/small/8RZz6OVtzc.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(98, 25, '/images/products/large/sa5ViWTL2l.webp', '/images/products/medium/sa5ViWTL2l.webp', '/images/products/small/sa5ViWTL2l.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(99, 25, '/images/products/large/NlSBCbaI6A.webp', '/images/products/medium/NlSBCbaI6A.webp', '/images/products/small/NlSBCbaI6A.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(100, 25, '/images/products/large/rUynPy3Ycs.webp', '/images/products/medium/rUynPy3Ycs.webp', '/images/products/small/rUynPy3Ycs.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(101, 26, '/images/products/large/6w5arLEMnO.webp', '/images/products/medium/6w5arLEMnO.webp', '/images/products/small/6w5arLEMnO.webp', 'base', NULL, '2022-03-10 00:33:32'),
(102, 26, '/images/products/large/rTm0iWtKmV.webp', '/images/products/medium/rTm0iWtKmV.webp', '/images/products/small/rTm0iWtKmV.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(103, 26, '/images/products/large/lc47s7w3ts.webp', '/images/products/medium/lc47s7w3ts.webp', '/images/products/small/lc47s7w3ts.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(104, 26, '/images/products/large/PkZbOVkW96.webp', '/images/products/medium/PkZbOVkW96.webp', '/images/products/small/PkZbOVkW96.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(105, 27, '/images/products/large/Jx35Akri7E.webp', '/images/products/medium/Jx35Akri7E.webp', '/images/products/small/Jx35Akri7E.webp', 'base', NULL, '2022-03-10 00:33:32'),
(106, 27, '/images/products/large/S0CzUuQDPh.webp', '/images/products/medium/S0CzUuQDPh.webp', '/images/products/small/S0CzUuQDPh.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(107, 28, '/images/products/large/aBVVN9YOoL.webp', '/images/products/medium/aBVVN9YOoL.webp', '/images/products/small/aBVVN9YOoL.webp', 'base', NULL, '2022-03-10 00:33:32'),
(108, 28, '/images/products/large/dKtnbPI11v.webp', '/images/products/medium/dKtnbPI11v.webp', '/images/products/small/dKtnbPI11v.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(109, 28, '/images/products/large/m0S71yuTbk.webp', '/images/products/medium/m0S71yuTbk.webp', '/images/products/small/m0S71yuTbk.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(110, 28, '/images/products/large/PUorDiJK3r.webp', '/images/products/medium/PUorDiJK3r.webp', '/images/products/small/PUorDiJK3r.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(111, 28, '/images/products/large/0NXjd9NC7Z.webp', '/images/products/medium/0NXjd9NC7Z.webp', '/images/products/small/0NXjd9NC7Z.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(112, 29, '/images/products/large/qMXuTWrl3c.webp', '/images/products/medium/qMXuTWrl3c.webp', '/images/products/small/qMXuTWrl3c.webp', 'base', NULL, '2022-03-10 00:33:32'),
(113, 29, '/images/products/large/F0h0OME5OW.webp', '/images/products/medium/F0h0OME5OW.webp', '/images/products/small/F0h0OME5OW.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(114, 29, '/images/products/large/JoTeeinvkL.webp', '/images/products/medium/JoTeeinvkL.webp', '/images/products/small/JoTeeinvkL.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(115, 30, '/images/products/large/h9DUMY5jzX.webp', '/images/products/medium/h9DUMY5jzX.webp', '/images/products/small/h9DUMY5jzX.webp', 'base', NULL, '2022-03-10 00:33:32'),
(116, 30, '/images/products/large/5cuBzB92xE.webp', '/images/products/medium/5cuBzB92xE.webp', '/images/products/small/5cuBzB92xE.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(117, 30, '/images/products/large/nHdiHvRNs0.webp', '/images/products/medium/nHdiHvRNs0.webp', '/images/products/small/nHdiHvRNs0.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(118, 30, '/images/products/large/Dr3Sd0LoJq.webp', '/images/products/medium/Dr3Sd0LoJq.webp', '/images/products/small/Dr3Sd0LoJq.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(119, 31, '/images/products/large/pPGVDEnby0.webp', '/images/products/medium/pPGVDEnby0.webp', '/images/products/small/pPGVDEnby0.webp', 'base', NULL, '2022-03-10 00:33:32'),
(120, 31, '/images/products/large/Z6smEl2Wwd.webp', '/images/products/medium/Z6smEl2Wwd.webp', '/images/products/small/Z6smEl2Wwd.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(121, 32, '/images/products/large/5lTSsvNPfJ.webp', '/images/products/medium/5lTSsvNPfJ.webp', '/images/products/small/5lTSsvNPfJ.webp', 'base', NULL, '2022-03-10 00:33:32'),
(122, 32, '/images/products/large/Pd9PzCo6X9.webp', '/images/products/medium/Pd9PzCo6X9.webp', '/images/products/small/Pd9PzCo6X9.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(123, 33, '/images/products/large/v5Q6OuT0Yp.webp', '/images/products/medium/v5Q6OuT0Yp.webp', '/images/products/small/v5Q6OuT0Yp.webp', 'base', NULL, '2022-03-10 00:33:32'),
(124, 33, '/images/products/large/NAsHYwqBzv.webp', '/images/products/medium/NAsHYwqBzv.webp', '/images/products/small/NAsHYwqBzv.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(125, 33, '/images/products/large/Qk9YchwYOS.webp', '/images/products/medium/Qk9YchwYOS.webp', '/images/products/small/Qk9YchwYOS.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(126, 34, '/images/products/large/DmjxpgwnIv.webp', '/images/products/medium/DmjxpgwnIv.webp', '/images/products/small/DmjxpgwnIv.webp', 'base', NULL, '2022-03-10 00:33:32'),
(127, 34, '/images/products/large/34Emkm87Ee.webp', '/images/products/medium/34Emkm87Ee.webp', '/images/products/small/34Emkm87Ee.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(128, 34, '/images/products/large/5LBEFwlRMA.webp', '/images/products/medium/5LBEFwlRMA.webp', '/images/products/small/5LBEFwlRMA.webp', 'additional', NULL, '2022-03-10 00:33:32'),
(140, 48, '/images/products/large/MqsyJGWXoC.jpeg', '/images/products/medium/MqsyJGWXoC.jpeg', '/images/products/small/MqsyJGWXoC.jpeg', 'base', NULL, NULL),
(141, 48, '/images/products/large/PctxG8YXNA.jpeg', '/images/products/medium/PctxG8YXNA.jpeg', '/images/products/small/PctxG8YXNA.jpeg', 'additional', NULL, NULL),
(142, 48, '/images/products/large/iIxqY3Q2O0.jpeg', '/images/products/medium/iIxqY3Q2O0.jpeg', '/images/products/small/iIxqY3Q2O0.jpeg', 'additional', NULL, NULL),
(143, 49, '/images/products/large/GEatqm1b1w.jpg', '/images/products/medium/GEatqm1b1w.jpg', '/images/products/small/GEatqm1b1w.jpg', 'base', NULL, NULL),
(144, 49, '/images/products/large/oduFtDNfuv.jpg', '/images/products/medium/oduFtDNfuv.jpg', '/images/products/small/oduFtDNfuv.jpg', 'additional', NULL, NULL),
(145, 49, '/images/products/large/jjyxQPPXm6.jpg', '/images/products/medium/jjyxQPPXm6.jpg', '/images/products/small/jjyxQPPXm6.jpg', 'additional', NULL, NULL),
(146, 49, '/images/products/large/x4AgX5PBbR.jpg', '/images/products/medium/x4AgX5PBbR.jpg', '/images/products/small/x4AgX5PBbR.jpg', 'additional', NULL, NULL),
(147, 49, '/images/products/large/CqhkgCVqvo.jpg', '/images/products/medium/CqhkgCVqvo.jpg', '/images/products/small/CqhkgCVqvo.jpg', 'additional', NULL, NULL),
(148, 52, '/images/products/large/SEF8O0Wys1.jpg', '/images/products/medium/SEF8O0Wys1.jpg', '/images/products/small/SEF8O0Wys1.jpg', 'base', NULL, NULL),
(149, 52, '/images/products/large/cucpfcayr5.jpg', '/images/products/medium/cucpfcayr5.jpg', '/images/products/small/cucpfcayr5.jpg', 'additional', NULL, NULL),
(150, 52, '/images/products/large/evp1ioDdea.jpg', '/images/products/medium/evp1ioDdea.jpg', '/images/products/small/evp1ioDdea.jpg', 'additional', NULL, NULL),
(151, 52, '/images/products/large/3itJIfNNWT.jpg', '/images/products/medium/3itJIfNNWT.jpg', '/images/products/small/3itJIfNNWT.jpg', 'additional', NULL, NULL),
(152, 52, '/images/products/large/G9UwLTgyLC.jpg', '/images/products/medium/G9UwLTgyLC.jpg', '/images/products/small/G9UwLTgyLC.jpg', 'additional', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`) VALUES
(35, 1),
(43, 3),
(43, 5),
(43, 6),
(44, 5),
(44, 7),
(19, 7),
(8, 4),
(7, 1),
(7, 2),
(6, 1),
(50, 1),
(57, 7),
(58, 7);

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `local` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `short_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `meta_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `meta_title`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Apple iPhone 11 64GB Yellow Fully Unlocked', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\n\r\nKey Features:\r\n\r\n    slim body with metal cover\r\n    latest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n    8GB DDR4 RAM and fast 512GB PCIe SSD\r\n    NVIDIA GeForce MX350 2GB GDDR5 graphics card\r\n    backlit keyboard, touchpad with gesture support', NULL, NULL, '2022-02-13 00:46:06', '2022-02-13 00:46:06', NULL),
(2, 2, 'en', 'Apple iPhone X 64GB Silver Fully Unlocked', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-13 01:26:25', '2022-02-13 01:26:25', NULL),
(3, 3, 'en', 'Samsung Galaxy A52 5G Android Cell Phone', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-13 01:30:20', '2022-02-13 01:30:20', NULL),
(4, 4, 'en', 'Apple iPhone 11 Pro Max (64GB) – Silver', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games. Key Features: slim body with metal cover latest Intel Core i5-1135G7 processor (4 cores / 8 threads) 8GB DDR4 RAM and fast 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</p>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', '', '', '2022-02-13 01:36:03', '2022-02-13 01:36:03', NULL),
(5, 5, 'en', 'OnePlus 8 Pro Onyx Black Android Smartphone', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games. Key Features: slim body with metal cover latest Intel Core i5-1135G7 processor (4 cores / 8 threads) 8GB DDR4 RAM and fast 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</p>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-13 01:41:17', '2022-02-13 01:41:17', NULL),
(6, 6, 'en', 'Apple iPhone XS Max-64GB -white', '<p>6.5-inch Super Retina display (OLED) with HDR IP68 dust and water resistant (maximum depth of 2 meters up to 30 minutes) 12MP dual cameras with dual OIS and 7MP TrueDepth front camera&mdash;Portrait mode, Portrait Lighting, Depth Control, and Smart HDR&nbsp;</p>', '6.5-inch Super Retina display (OLED) with HDR IP68 dust and water resistant (maximum depth of 2 meters up to 30 minutes) 12MP dual cameras with dual OIS and 7MP TrueDepth front camera—Portrait mode, Portrait Lighting, Depth Control, and Smart HDR', NULL, NULL, '2022-02-13 02:11:05', '2022-02-13 02:11:05', NULL),
(7, 7, 'en', 'Samsung Galaxy Note 10', '<p>Fast-charging, long-lasting intelligent power and super speed processing outlast whatever you throw at Note 10+. S pen&rsquo;s newest Evolution gives you the power of air gestures, a remote shutter and playlist button and handwriting-to-text, all in One Magic wand. 6.8&rdquo; Nearly Bezel-less Infinity Display* Ultrasonic In-Display Fingerprint ID&nbsp;</p>', 'Fast-charging, long-lasting intelligent power and super speed processing outlast whatever you throw at Note 10+. S pen’s newest Evolution gives you the power of air gestures, a remote shutter and playlist button and handwriting-to-text, all in One Magic wand. 6.8” Nearly Bezel-less Infinity Display* Ultrasonic In-Display Fingerprint ID', NULL, NULL, '2022-02-13 02:18:25', '2022-02-13 02:18:25', NULL),
(8, 8, 'en', 'ASUS VivoBook 15 Thin and Light Laptop 15.6 inch FHD Display', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games. Key Features: slim body with metal cover latest Intel Core i5-1135G7 processor (4 cores / 8 threads) 8GB DDR4 RAM and fast 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</p>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-14 05:36:08', '2022-02-14 05:36:08', NULL),
(9, 9, 'en', 'ASUS VivoBook 17.3″ i5 8GB_1TB 17.3″ FHD Display', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games. Key Features: slim body with metal cover latest Intel Core i5-1135G7 processor (4 cores / 8 threads) 8GB DDR4 RAM and fast 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</p>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-14 06:04:57', '2022-02-14 06:04:57', NULL),
(10, 10, 'en', 'Apple Macbook Pro 13.3-inch 2.7Ghz Dual Core i5', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-14 23:40:48', '2022-02-14 23:40:48', NULL),
(11, 11, 'en', 'ASUS VivoBook 15 inch FHD Slate Gray', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-15 01:02:40', '2022-02-15 01:02:40', NULL),
(12, 12, 'en', 'Apple Macbook Pro 15.4 inch Laptop', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games. Key Features: slim body with metal cover latest Intel Core i5-1135G7 processor (4 cores / 8 threads) 8GB DDR4 RAM and fast 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</p>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-15 02:31:06', '2022-02-15 02:31:06', NULL),
(13, 13, 'en', 'Element 27 inch 1080p Frameless IPS LCD PC Monitor', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 01:42:46', '2022-02-20 01:42:46', NULL),
(14, 14, 'en', 'JVC 70 inch Class 4K UHD 2160p Roku Smart TV', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support.\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 03:32:38', '2022-02-20 03:32:38', NULL),
(15, 15, 'en', 'LG 43 inch 4K Ultra HD Smart LED TV 2020', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 03:45:01', '2022-02-20 03:45:01', NULL),
(16, 16, 'en', 'SAMSUNG 75 inc Class 4K Ultra HD HDR Smart QLED TV', '&lt;p&gt;The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.&lt;/p&gt; &lt;p&gt;Key Features:&lt;/p&gt; &lt;ul&gt; &lt;li&gt;slim body with metal cover&lt;/li&gt; &lt;li&gt;latest Intel Core i5-1135G7 processor (4 cores / 8 threads)&lt;/li&gt; &lt;li&gt;8GB DDR4 RAM and fast 512GB PCIe SSD&lt;/li&gt; &lt;li&gt;NVIDIA GeForce MX350 2GB GDDR5 graphics card&lt;/li&gt; &lt;li&gt;backlit keyboard, touchpad with gesture support&lt;/li&gt; &lt;/ul&gt;', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:08:00', '2022-02-20 04:08:00', NULL),
(17, 17, 'en', 'Sony 65 inc Class 4K UHD LED Android Smart TV HDR BRAVIA', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:13:27', '2022-02-20 04:13:27', NULL),
(18, 18, 'en', 'Apple MWP22AM-A AirPods Pro', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:25:57', '2022-02-20 04:25:57', NULL),
(19, 19, 'en', 'Beats Studio3 Wireless Headphones – Matte Black', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:32:39', '2022-02-20 04:32:39', NULL),
(20, 20, 'en', 'Bose QuietComfort Noise Cancelling Earbuds – Black', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:35:57', '2022-02-20 04:35:57', NULL),
(21, 21, 'en', 'Bose Noise Cancelling Wireless Bluetooth', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:39:41', '2022-02-20 04:39:41', NULL),
(22, 22, 'en', 'Google Pixel Buds, Clearly White', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:42:50', '2022-02-20 04:42:50', NULL),
(23, 23, 'en', 'Cubitt Smart Watch CT2S Waterproof Fitness Tracker', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 00:19:37', '2022-02-22 00:19:37', NULL),
(24, 24, 'en', 'Apple Watch Series 3 GPS – 42mm – Sport Band', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 00:25:42', '2022-02-22 00:25:42', NULL),
(25, 25, 'en', 'SAMSUNG Galaxy Watch Active 2 Aluminum', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 00:41:30', '2022-02-22 00:41:30', NULL),
(26, 26, 'en', 'Canon EOS Rebel Camera T7 EF-S 18-55mm IS II Kit', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 01:10:55', '2022-02-22 01:10:55', NULL),
(27, 27, 'en', 'Canon SX740BK PowerShot SX740 HS Digital Camera', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 01:18:44', '2022-02-22 01:18:44', NULL),
(28, 28, 'en', 'Fujifilm 16642939 X100V Digital Camera – Silver', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 01:24:22', '2022-02-22 01:24:22', NULL),
(29, 29, 'en', 'FIRST DANCE Extra Large Shoes for Men Casual Shoes Camo Print Big Size Fashion Sneakers for Man', '&lt;ul class=\"p-4 f\"&gt; &lt;li&gt;Ethylene Vinyl Acetate sole&lt;/li&gt; &lt;li&gt;Extra big size shoes for men, size from 12 to 15.&lt;/li&gt; &lt;li&gt;Good quality PU upper with camo print, suitable for autumn and winter&lt;/li&gt; &lt;li&gt;Lightweight EVA outsole, very comfortable to wear.&lt;/li&gt; &lt;li&gt;Classic lace up styles, easy to handle.&lt;/li&gt; &lt;li&gt;If you have troubles finding the right big size shoes for you, you should try ours.&lt;/li&gt; &lt;/ul&gt;', 'FIRST DANCE Extra Large Shoes for Men Casual Shoes Camo Print Big Size Fashion Sneakers for Man', NULL, NULL, '2022-02-22 01:44:26', '2022-02-22 01:44:26', NULL),
(30, 30, 'en', 'COKAFIL Mens Running Shoes Athletic Walking Blade Tennis Shoes Fashion Sneakers', '\r\nMesh Fabric\r\nRubber sole\r\nSlip-on closure type easy put on &amp; off，simple and stylish color scheme,looking for beauty in simple life\r\nFashion mesh upper design,keeps the feet dry and breathable, makes you fell comfortable while exercising\r\nBreathing Insole - The interior of the shoe is designed with a honeycomb hole to absorb sweat and deodorize, allowing your feet to breathe freely\r\nBlade Sneakers - The sole is made of Hollow Carved technology , providing stable support and optimal shock absorption for sports\r\nHow To Define - Designed for walking comfortably and casual wear, but not really meant to be worn while doing a hard-core workout or High-intensity exercise\r\n', 'COKAFIL Mens Running Shoes Athletic Walking Blade Tennis Shoes Fashion Sneakers', NULL, NULL, '2022-02-22 02:02:42', '2022-02-22 02:02:42', NULL),
(31, 31, 'en', 'Wonder Nation Toddler Girls Glitter Casual Mary-Jane Sneakers', '\r\n\r\n\r\n\r\nColor\r\nPink\r\n\r\n\r\nBrand\r\nWonder Nation\r\n\r\n\r\nGender\r\nFemale\r\n\r\n\r\nManufacturer Part Number\r\nGTWN41CA001\r\n\r\n\r\nAge Group\r\nToddler\r\n\r\n\r\nMaterial\r\nUPPER:PU+ POLYESTER;OUTSOLE:TPR+POLYESTER\r\n\r\n\r\n\r\n\r\n&nbsp;\r\n\r\nVintage style meets modern flare with this Casual Mary Jane Sneaker from Wonder Nation. Featuring a durable canvas upper and sturdy outsole, with a stay-put strap to ensure a snug fit. The Mary Jane sneaker is great for all day wear with any outfit!\r\n\r\n&nbsp;', 'Material: Upper: Polyurethane/Polyester; Outsole: Thermoplastic Rubber/Polyester\r\n    Care: Wipe clean\r\n    Country of Origin: Imported\r\n    Closure: Slip on style for easy on and off; stay put strap\r\n    Features: Lightweight and durable; glitter accents; flower embellishment \r\n    Mary Jane Shoes for Girls from Wonder Nation', NULL, NULL, '2022-02-22 02:10:24', '2022-02-22 02:10:24', NULL),
(32, 32, 'en', 'Dragon Touch Max10 Tablet Android 10.0 OS', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 02:33:31', '2022-02-22 02:33:31', NULL),
(33, 33, 'en', 'Garmin Vivo smart 3 Activity Tracker – Large', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games. Key Features: slim body with metal cover latest Intel Core i5-1135G7 processor (4 cores / 8 threads) 8GB DDR4 RAM and fast 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</p>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 02:58:36', '2022-02-22 02:58:36', NULL),
(34, 34, 'en', 'Echo Dot (4th Gen, 2020 release) | Smart speaker', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games. Key Features: slim body with metal cover latest Intel Core i5-1135G7 processor (4 cores / 8 threads) 8GB DDR4 RAM and fast 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</p>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', '', '', '2022-02-22 03:40:18', '2022-02-22 03:40:18', NULL),
(35, 34, 'de', 'Echo Dot (4. Generation, Version 2020) | Intelligenter Lautsprecher', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(36, 34, 'es', 'Echo Dot (4.ª generación, versión 2020) | Altavoz inteligente', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(37, 34, 'bn', 'ইকো ডট (4th Gen, 2020 রিলিজ) | স্মার্ট স্পিকার', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(38, 33, 'de', 'Garmin Vivo Smart 3 Activity Tracker – Groß', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet', NULL, NULL, NULL, NULL, NULL),
(39, 33, 'es', 'Rastreador de actividad Garmin Vivo smart 3 - Grande', ' La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(40, 33, 'bn', 'গারমিন ভিভো স্মার্ট 3 অ্যাক্টিভিটি ট্র্যাকার - বড়', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপ সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত', NULL, NULL, NULL, NULL, NULL),
(41, 32, 'de', 'Dragon Touch Max10-Tablet mit Android 10.0-Betriebssystem', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(42, 32, 'es', 'Tableta Dragon Touch Max10 con sistema operativo Android 10.0', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(43, 32, 'bn', 'ড্রাগন টাচ ম্যাক্স 10 ট্যাবলেট অ্যান্ড্রয়েড 10.0 ওএস', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(44, 31, 'de', 'Wonder Nation Kleinkind Mädchen Glitter Casual Mary-Jane Turnschuhe', 'Farbe Pink Marke Wonder Nation Geschlecht Weiblich Hersteller-Teilenummer GTWN41CA001 Altersgruppe Kleinkind Material OBERMATERIAL:PU+ POLYESTER;LAUFSOHLE:TPR+POLYESTER Mit diesem l&auml;ssigen Mary Jane Sneaker von Wonder Nation trifft Vintage-Stil auf modernes Flair. Ausgestattet mit einem strapazierf&auml;higen Canvas-Obermaterial und einer robusten Au&szlig;ensohle mit einem Halteriemen, um eine bequeme Passform zu gew&auml;hrleisten. Der Mary Jane Sneaker ist toll f&uuml;r den ganzen Tag mit jedem Outfit!', 'Material: Obermaterial: Polyurethan/Polyester; Laufsohle: Thermoplastischer Gummi/Polyester\r\nPflege: Abwischen\r\nHerkunftsland: Importiert\r\nVerschluss: Stil zum Hineinschlüpfen für einfaches An- und Ausziehen; Bleiben Sie an Ort und Stelle\r\nEigenschaften: Leicht und langlebig; Glitzerakzente; Blumenverzierung\r\n  Mary Jane Schuhe für Mädchen von Wonder Nation', NULL, NULL, NULL, NULL, NULL),
(45, 31, 'es', 'Wonder Nation - Zapatillas deportivas Mary-Jane informales con purpurina para niñas pequeñas', ' Color rosa Marca Wonder Nation G&eacute;nero femenino N&uacute;mero de pieza del fabricante GTWN41CA001 Grupo de edad Ni&ntilde;o peque&ntilde;o Material SUPERIOR:PU+ POLIESTER;SUELA:TPR+POLYESTER El estilo vintage se combina con el estilo moderno con esta zapatilla casual Mary Jane de Wonder Nation. Con una parte superior de lona duradera y una suela exterior resistente, con una correa que se mantiene en su lugar para garantizar un ajuste ce&ntilde;ido. &iexcl;La zapatilla Mary Jane es ideal para usar todo el d&iacute;a con cualquier atuendo!', 'Material: Empeine: Poliuretano/Poliéster; Suela: Goma Termoplástica/Poliéster\r\nCuidado: Limpiar\r\nPaís de origen: Importado\r\nCierre: estilo deslizable para poner y quitar fácilmente; quédate en la correa\r\nCaracterísticas: Ligero y duradero; acentos de purpurina; adorno de flores\r\n  Zapatos Mary Jane para niñas de Wonder Nation', NULL, NULL, NULL, NULL, NULL),
(46, 31, 'bn', 'ওয়ান্ডার নেশন টডলার গার্লস গ্লিটার ক্যাজুয়াল মেরি-জেন স্নিকার্স', 'রঙ গোলাপি ব্র্যান্ড ওয়ান্ডার নেশন লিঙ্গ মহিলা প্রস্তুতকারকের অংশ নম্বর GTWN41CA001 বয়স গ্রুপ টডলার উপাদান উপরের:পিইউ+পলিয়েস্টার;আউটসোল:টিপিআর+পলিয়েস্টার ওয়ান্ডার নেশনের এই নৈমিত্তিক মেরি জেন স্নিকারের সাথে ভিনটেজ শৈলী আধুনিক ফ্লেয়ারের সাথে মিলিত হয়। একটি টেকসই ক্যানভাস উপরের এবং বলিষ্ঠ আউটসোল বৈশিষ্ট্যযুক্ত, একটি স্নাগ ফিট নিশ্চিত করার জন্য একটি স্টে-পুট স্ট্র্যাপ সহ। মেরি জেন স্নিকার যে কোনও পোশাকের সাথে সারাদিন পরার জন্য দুর্দান্ত!', 'উপাদান: উপরের: পলিউরেথেন/পলিয়েস্টার; আউটসোল: থার্মোপ্লাস্টিক রাবার/পলিয়েস্টার\r\nযত্ন: পরিষ্কার মুছা\r\nউৎপত্তি দেশ: আমদানি করা\r\nবন্ধ: সহজে চালু এবং বন্ধ করার জন্য স্লিপ অন স্টাইল; চাবুক রাখা\r\nবৈশিষ্ট্য: লাইটওয়েট এবং টেকসই; চকচকে উচ্চারণ; ফুলের শোভা\r\n  ওয়ান্ডার নেশনের মেয়েদের জন্য মেরি জেন জুতা', NULL, NULL, NULL, NULL, NULL),
(47, 30, 'bn', 'কোকাফিল পুরুষদের রানিং জুতা অ্যাথলেটিক ওয়াকিং ব্লেড টেনিস জুতা ফ্যাশন স্নিকার্স', '\r\nফ্যাব্রিক জাল রাবার সোল স্লিপ-অন ক্লোজার টাইপ সহজ চালু এবং বন্ধ করা, সহজ এবং আড়ম্বরপূর্ণ রঙের স্কিম, সাধারণ জীবনে সৌন্দর্য খুঁজছেন ফ্যাশন জাল উপরের নকশা, পা শুষ্ক এবং নিঃশ্বাসযোগ্য রাখে, ব্যায়াম করার সময় আপনাকে আরামদায়ক করে তোলে শ্বাস নেওয়ার ইনসোল - জুতার অভ্যন্তরটি ঘাম শোষণ এবং দুর্গন্ধযুক্ত করার জন্য একটি মধুচক্রের ছিদ্র দিয়ে ডিজাইন করা হয়েছে, যাতে আপনার পা অবাধে শ্বাস নিতে পারে। ব্লেড স্নিকার্স - একমাত্র ফাঁপা খোদাই প্রযুক্তি দিয়ে তৈরি, স্থিতিশীল সমর্থন এবং খেলাধুলার জন্য সর্বোত্তম শক শোষণ প্রদান করে কীভাবে সংজ্ঞায়িত করবেন - আরামদায়ক হাঁটা এবং নৈমিত্তিক পরিধানের জন্য ডিজাইন করা হয়েছে, তবে হার্ড-কোর ওয়ার্কআউট বা উচ্চ-তীব্রতা ব্যায়াম করার সময় পরিধান করা উচিত নয়\r\n', 'কোকাফিল পুরুষদের রানিং জুতা অ্যাথলেটিক ওয়াকিং ব্লেড টেনিস জুতা ফ্যাশন স্নিকার্স', NULL, NULL, NULL, NULL, NULL),
(48, 30, 'de', 'COKAFIL Herren Laufschuhe Athletic Walking Blade Tennisschuhe Fashion Sneakers', 'Mesh-Gewebe Gummisohle Aufsteckverschluss, einfach an- und auszuziehen, einfaches und stilvolles Farbschema, auf der Suche nach Sch&ouml;nheit im einfachen Leben Das modische Mesh-Obermaterial h&auml;lt die F&uuml;&szlig;e trocken und atmungsaktiv und sorgt daf&uuml;r, dass Sie sich beim Training wohl f&uuml;hlen Atmungsaktive Einlegesohle - Das Innere des Schuhs ist mit einem Wabenloch ausgestattet, um Schwei&szlig; zu absorbieren und zu desodorieren, sodass Ihre F&uuml;&szlig;e frei atmen k&ouml;nnen Blade Sneakers - Die Sohle besteht aus Hollow Carved-Technologie und bietet stabilen Halt und optimale Sto&szlig;d&auml;mpfung beim Sport Wie zu definieren - Entworfen f&uuml;r bequemes Gehen und Freizeitkleidung, aber nicht wirklich dazu gedacht, w&auml;hrend eines harten Trainings oder hochintensiven Trainings getragen zu werden', 'COKAFIL Herren Laufschuhe Athletic Walking Blade Tennisschuhe Fashion Sneakers', NULL, NULL, NULL, NULL, NULL),
(49, 30, 'es', 'COKAFIL Zapatillas de correr para hombre Zapatillas de tenis atléticas con cuchilla para caminar Zapatillas de deporte de moda', ' tela de malla Suela de goma Tipo de cierre deslizante f&aacute;cil de poner y quitar, esquema de color simple y elegante, buscando belleza en la vida simple Dise&ntilde;o superior de malla de moda, mantiene los pies secos y transpirables, te hace sentir c&oacute;modo mientras haces ejercicio. Plantilla de respiraci&oacute;n: el interior del zapato est&aacute; dise&ntilde;ado con un orificio de panal para absorber el sudor y desodorizar, lo que permite que sus pies respiren libremente Zapatillas Blade: la suela est&aacute; hecha de tecnolog&iacute;a Hollow Carved, que brinda un soporte estable y una absorci&oacute;n de impactos &oacute;ptima para los deportes C&oacute;mo definirlo: dise&ntilde;ado para caminar c&oacute;modamente y con ropa informal, pero en realidad no est&aacute; dise&ntilde;ado para usarse mientras se hace un entrenamiento intenso o un ejercicio de alta intensidad.', 'tela de malla\r\nSuela de goma\r\nTipo de cierre deslizante fácil de poner y quitar, esquema de color simple y elegante, buscando belleza en la vida simple\r\nDiseño superior de malla de moda, mantiene los pies secos y transpirables, te hace sentir cómodo mientras haces ejercicio.\r\nPlantilla de respiración: el interior del zapato está diseñado con un orificio de panal para absorber el sudor y desodorizar, lo que permite que sus pies respiren libremente\r\nZapatillas Blade: la suela está hecha de tecnología Hollow Carved, que brinda un soporte estable y una absorción de impactos óptima para los deportes\r\nCómo definirlo: diseñado para caminar cómodamente y con ropa informal, pero en realidad no está diseñado para usarse mientras se hace un entrenamiento intenso o un ejercicio de alta intensidad.', NULL, NULL, NULL, NULL, NULL),
(50, 29, 'de', 'FIRST DANCE Extra große Schuhe für Herren Freizeitschuhe Camo Print Big Size Fashion Sneakers für Herren', 'Sohle aus Ethylen-Vinylacetat Schuhe in extra gro&szlig;en Gr&ouml;&szlig;en f&uuml;r M&auml;nner, Gr&ouml;&szlig;e von 12 bis 15. Hochwertiges PU-Obermaterial mit Camo-Print, geeignet f&uuml;r Herbst und Winter Leichte EVA-Laufsohle, sehr angenehm zu tragen. Klassische Schn&uuml;rung, einfach zu handhaben. Wenn Sie Probleme haben, die richtigen gro&szlig;en Schuhe f&uuml;r Sie zu finden, sollten Sie unsere ausprobieren.', 'FIRST DANCE Extra große Schuhe für Herren Freizeitschuhe Camo Print Big Size Fashion Sneakers für Herren', NULL, NULL, NULL, NULL, NULL),
(51, 29, 'es', 'PRIMERA DANZA Zapatos extra grandes para hombres Zapatos casuales Estampado de camuflaje Zapatillas de deporte de moda de gran tamaño para hombre', 'Suela de Etileno Acetato de Vinilo Zapatos de hombre talla extra grande, talla de la 12 a la 15. Parte superior de PU de buena calidad con estampado de camuflaje, adecuado para oto&ntilde;o e invierno Suela de EVA ligera, muy c&oacute;moda de llevar. Estilos cl&aacute;sicos con cordones, f&aacute;ciles de manejar. Si tiene problemas para encontrar los zapatos de talla grande adecuados para usted, deber&iacute;a probar los nuestros', 'Suela de Etileno Acetato de Vinilo\r\nZapatos de hombre talla extra grande, talla de la 12 a la 15.\r\nParte superior de PU de buena calidad con estampado de camuflaje, adecuado para otoño e invierno\r\nSuela de EVA ligera, muy cómoda de llevar.\r\nEstilos clásicos con cordones, fáciles de manejar.\r\nSi tiene problemas para encontrar los zapatos de talla grande adecuados para usted, debería probar los nuestros', NULL, NULL, NULL, NULL, NULL),
(52, 29, 'bn', 'পুরুষদের জন্য প্রথম নৃত্য অতিরিক্ত বড় জুতা নৈমিত্তিক জুতা ক্যামো প্রিন্ট বড় আকারের ফ্যাশন স্নিকার পুরুষদের জন্য', ' ইথিলিন ভিনাইল অ্যাসিটেট একমাত্র পুরুষদের জন্য অতিরিক্ত বড় সাইজের জুতা, 12 থেকে 15 পর্যন্ত সাইজ। ক্যামো প্রিন্ট সহ ভাল মানের PU উপরের, শরৎ এবং শীতের জন্য উপযুক্ত লাইটওয়েট ইভা আউটসোল, পরতে খুব আরামদায়ক। ক্লাসিক লেস আপ শৈলী, পরিচালনা করা সহজ। আপনার জন্য সঠিক বড় আকারের জুতা খুঁজে পেতে সমস্যা হলে, আমাদের চেষ্টা করা উচিত।', 'ইথিলিন ভিনাইল অ্যাসিটেট একমাত্র\r\nপুরুষদের জন্য অতিরিক্ত বড় সাইজের জুতা, 12 থেকে 15 পর্যন্ত সাইজ।\r\nক্যামো প্রিন্ট সহ ভাল মানের PU উপরের, শরৎ এবং শীতের জন্য উপযুক্ত\r\nলাইটওয়েট ইভা আউটসোল, পরতে খুব আরামদায়ক।\r\nক্লাসিক লেস আপ শৈলী, পরিচালনা করা সহজ।\r\nআপনার জন্য সঠিক বড় আকারের জুতা খুঁজে পেতে সমস্যা হলে, আমাদের চেষ্টা করা উচিত।', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `meta_title`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(53, 28, 'de', 'Fujifilm 16642939 X100V Digitalkamera – Silber', ' Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(54, 28, 'es', 'Cámara digital Fujifilm 16642939 X100V - Plata', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(55, 28, 'bn', 'ফুজিফিল্ম 16642939 X100V ডিজিটাল ক্যামেরা – সিলভার', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড ', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(56, 27, 'de', 'Cámara digital Canon SX740BK PowerShot SX740 HS', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(57, 27, 'bn', 'Canon SX740BK পাওয়ারশট SX740 HS ডিজিটাল ক্যামেরা', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(58, 26, 'de', 'Canon EOS Rebel Camera T7 EF-S 18–55 mm IS II Kit', ' Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(59, 26, 'es', 'Kit de cámara Canon EOS Rebel T7 EF-S 18-55 mm IS II', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(60, 26, 'bn', 'Canon EOS বিদ্রোহী ক্যামেরা T7 EF-S 18-55mm IS II কিট', ' Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(61, 25, 'de', 'SAMSUNG Galaxy Watch Active 2 Aluminium', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(62, 25, 'es', 'SAMSUNG Galaxy Watch Active 2 Aluminio', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(63, 25, 'bn', 'স্যামসাং গালাক্সি অ্যালুমিনিয়াম', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(64, 24, 'de', 'Apple Watch Series 3 GPS – 42 mm – Sportarmband', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(65, 24, 'es', 'Apple Watch Serie 3 GPS – 42 mm – Brazalete deportivo', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(66, 24, 'bn', 'অ্যাপল ওয়াচ সিরিজ 3 জিপিএস - 42 মিমি - স্পোর্টর্মব্যান্ড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(67, 23, 'de', 'Cubitt Smart Watch CT2S Wasserdichter Fitness-Tracker', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung ', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(68, 23, 'es', 'Reloj inteligente Cubitt CT2S Rastreador de ejercicios a prueba de agua', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(69, 23, 'bn', 'কিউবিট স্মার্ট ওয়াচ CT2S ওয়াটারপ্রুফ ফিটনেস ট্র্যাকার', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(70, 22, 'de', 'Google Pixel Buds, klar weiß', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(71, 22, 'es', 'Google Pixel Buds, claramente blanco', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(72, 22, 'bn', 'গুগল পিক্সেল বাডস, পরিষ্কারভাবে সাদা', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(73, 35, 'en', 'fsdfsdfwfewf', 'fsdsfdfwerew', 'dfdsfdfds', NULL, NULL, '2022-03-03 00:27:22', '2022-03-03 00:27:22', NULL),
(74, 36, 'en', 'mhmghjhjghj', 'yiuyiuyghjv', 'gjhgjghjgj', NULL, NULL, '2022-03-03 00:40:09', '2022-03-03 00:40:09', NULL),
(75, 37, 'en', 'irfan chy', 'fsdfdsfdsfs', 'fffdgdgf', NULL, NULL, '2022-03-03 00:55:25', '2022-03-03 00:55:25', NULL),
(76, 21, 'de', 'Drahtloses Bluetooth mit Bose-Noise-Cancelling', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(77, 21, 'es', 'Bluetooth inalámbrico con cancelación de ruido de Bose', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(78, 21, 'bn', 'বোস নয়েজ ক্যানসেলিং ওয়্যারলেস ব্লুটুথ', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(79, 20, 'de', 'Bose QuietComfort Noise Cancelling Earbuds – Schwarz', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(80, 20, 'es', 'Auriculares con cancelación de ruido Bose QuietComfort - Negro', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(81, 20, 'bn', 'বস কোয়াইট কম্ফপোর্ট নয়েজ ক্যানসেলিং ইয়ারবাডস – কালো', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(82, 19, 'de', 'Beats Studio3 Wireless Kopfhörer – Mattschwarz', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(83, 19, 'es', 'Auriculares inalámbricos Beats Studio3 - Negro mate', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos ', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(84, 19, 'bn', 'বিটস স্টুডিও 3 ওয়্যারলেস হেডফোন - ম্যাট ব্ল্যাক', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(85, 18, 'de', 'Apple MWP22AM-A AirPods Pro vvv', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos ', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(86, 18, 'es', 'Apple MWP22AM-A AirPods ProT', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, NULL, NULL, NULL),
(87, 18, 'bn', 'এপেল MWP22AM-A এয়ারপ্রডস প্রো', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(88, 17, 'de', 'Sony 65 Inc Klasse 4K UHD LED Android Smart TV HDR BRAVIA', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(89, 17, 'es', 'Sony 65 inc Clase 4K UHD LED Android Smart TV HDR BRAVIA', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(90, 17, 'bn', 'সনি ৬৫ ইঞ্চি ক্লাস ৪কে ইউএহডি এন্ড্রয়েড স্মার্ট টিভি এইচডিয়ার', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(91, 16, 'de', 'SAMSUNG 75 Inc Klasse 4K Ultra HD HDR Smart QLED-Fernseher', ' Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(92, 16, 'es', 'Televisor SAMSUNG 75 con Clase 4K Ultra HD HDR Smart QLED', ' La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos ', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(93, 16, 'bn', 'স্যামসাং গায়ালাক্সি ৪কে এলিডি', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(94, 15, 'de', 'LG 43 Zoll 4K Ultra HD Smart LED-Fernseher 2020', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(95, 15, 'es', 'LG 43 pulgadas 4K Ultra HD Smart LED TV 2020', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos ', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(96, 15, 'bn', 'LG 43 ইঞ্চি 4K আল্ট্রা এইচডি স্মার্ট এলইডি টিভি 2020', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(97, 14, 'de', 'JVC 70 Zoll Klasse 4K UHD 2160p Roku Smart TV', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung. ', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(98, 14, 'es', 'JVC 70 pulgadas Clase 4K UHD 2160p Roku Smart TV', ' La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos.', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(99, 14, 'bn', 'JVC 70 ইঞ্চি ক্লাস 4K UHD 2160p Roku স্মার্ট টিভি', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড।', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(100, 13, 'de', 'Element 27 Zoll 1080p rahmenloser IPS-LCD-PC-Monitor', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(101, 13, 'es', 'Monitor de PC LCD IPS sin marco Element de 27 pulgadas y 1080p', ' La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(102, 13, 'bn', 'এলিমেন্ট 27 ইঞ্চি 1080p ফ্রেমলেস আইপিএস এলসিডি পিসি মনিটর', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(103, 12, 'de', 'Apple MacBook Pro 15,4 Zoll Laptop', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `meta_title`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(104, 12, 'es', 'Portátil Apple Macbook Pro de 15,4 pulgadas', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(105, 12, 'bn', 'অ্যাপল ম্যাকবুক প্রো 15.4 ইঞ্চি ল্যাপটপ', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(106, 11, 'de', 'ASUS VivoBook 15 Zoll FHD Schiefergrau', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(107, 11, 'es', 'ASUS VivoBook 15 pulgadas FHD Gris pizarra', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos ', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(108, 11, 'bn', 'আসোস বিবুক ১৫ ইঞ্চি এফএচডি স্লেট গ্রে', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(109, 10, 'de', 'Apple Macbook Pro 13,3 Zoll 2,7 GHz Dual Core i5', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung ', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(110, 10, 'es', 'Apple Macbook Pro 13.3 pulgadas 2.7Ghz Dual Core i5', ' La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(111, 10, 'bn', 'এপ মেক বুক প্রো ১৩.৩-ইঞ্চি ২.৭Ghz ডুয়াল কোর i5', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি', NULL, NULL, NULL, NULL, NULL),
(112, 9, 'de', 'ASUS VivoBook 17,3″ i5 8GB_1TB 17,3″ FHD-Display', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(113, 9, 'es', 'ASUS VivoBook 17.3″ i5 8GB_1TB 17.3″ Pantalla FHD', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(114, 9, 'bn', 'আসোস বিবুক ১৭.৩″ i5 ৮জিবি_১টিবি ১৭.৩″ এফেইচডি ডিসপ্লে', ' Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(115, 8, 'de', 'ASUS VivoBook 15 Dünner und leichter Laptop mit 15,6-Zoll-FHD-Display', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(116, 8, 'es', 'ASUS VivoBook 15 Laptop delgada y liviana Pantalla FHD de 15.6 pulgadas', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos ', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(117, 8, 'bn', 'আসোস বিবুক ১৫ পাতলা এবং হালকা ল্যাপটপ 15.6 ইঞ্চি FHD ডিসপ্লে', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(118, 7, 'de', 'Samsung Galaxy Note 10 German', 'Fast-charging, long-lasting intelligent power and super speed processing outlast whatever you throw at Note 10+. S pen&rsquo;s newest Evolution gives you the power of air gestures, a remote shutter and playlist button and handwriting-to-text, all in One Magic wand. 6.8&rdquo; Nearly Bezel-less Infinity Display* Ultrasonic In-Display Fingerprint ID&nbsp;', 'Fast-charging, long-lasting intelligent power and super speed processing outlast whatever you throw at Note 10+. S pen’s newest Evolution gives you the power of air gestures, a remote shutter and playlist button and handwriting-to-text, all in One Magic wand. 6.8” Nearly Bezel-less Infinity Display* Ultrasonic In-Display Fingerprint ID', NULL, NULL, NULL, NULL, NULL),
(119, 7, 'es', 'Samsung Galaxy nota 10', 'La carga r&aacute;pida, la potencia inteligente de larga duraci&oacute;n y el procesamiento de s&uacute;per velocidad duran m&aacute;s que lo que arrojas en Note 10+. El Evolution m&aacute;s nuevo de S pen le brinda el poder de los gestos a&eacute;reos, un obturador remoto y un bot&oacute;n de lista de reproducci&oacute;n y escritura a mano en texto, todo en una varita m&aacute;gica. Pantalla Infinity de 6.8&rdquo; casi sin bisel* Identificaci&oacute;n ultras&oacute;nica de huellas dactilares en pantalla ', 'La carga rápida, la potencia inteligente de larga duración y el procesamiento de súper velocidad duran más que lo que arrojas en Note 10+. El Evolution más nuevo de S pen le brinda el poder de los gestos aéreos, un obturador remoto y un botón de lista de reproducción y escritura a mano en texto, todo en una varita mágica. Pantalla Infinity de 6.8” casi sin bisel* Identificación ultrasónica de huellas dactilares en pantalla', NULL, NULL, NULL, NULL, NULL),
(120, 7, 'bn', 'স্যামসাং গ্যালাক্সি নোট ১০', 'দ্রুত-চার্জিং, দীর্ঘস্থায়ী বুদ্ধিমান শক্তি এবং সুপার স্পিড প্রসেসিং আপনি নোট 10+ এ যা কিছু ফেলুন তা ছাড়িয়ে যায়। এস পেনের নতুন বিবর্তন আপনাকে বায়ু অঙ্গভঙ্গির শক্তি, একটি দূরবর্তী শাটার এবং প্লেলিস্ট বোতাম এবং হস্তাক্ষর থেকে পাঠ্য, সবই এক জাদুর কাঠিতে দেয়৷ 6.8\" প্রায় বেজেল-লেস ইনফিনিটি ডিসপ্লে* আল্ট্রাসনিক ইন-ডিসপ্লে ফিঙ্গারপ্রিন্ট আইডি', 'দ্রুত-চার্জিং, দীর্ঘস্থায়ী বুদ্ধিমান শক্তি এবং সুপার স্পিড প্রসেসিং আপনি নোট 10+ এ যা কিছু ফেলুন তা ছাড়িয়ে যায়। এস পেনের নতুন বিবর্তন আপনাকে বায়ু অঙ্গভঙ্গির শক্তি, একটি দূরবর্তী শাটার এবং প্লেলিস্ট বোতাম এবং হস্তাক্ষর থেকে পাঠ্য, সবই এক জাদুর কাঠিতে দেয়৷ 6.8&amp;quot; প্রায় বেজেল-লেস ইনফিনিটি ডিসপ্লে* আল্ট্রাসনিক ইন-ডিসপ্লে ফিঙ্গারপ্রিন্ট আই', NULL, NULL, NULL, NULL, NULL),
(121, 6, 'de', 'Apple iPhone XS Max-64GB -weiß', '6,5-Zoll-Super-Retina-Display (OLED) mit HDR IP68 staub- und wasserfest (maximale Tiefe von 2 Metern bis zu 30 Minuten) 12-MP-Dual-Kameras mit dualem OIS und 7-MP-TrueDepth-Frontkamera &ndash; Portr&auml;tmodus, Portr&auml;tbeleuchtung, Tiefensteuerung und Smart HDR', '6,5-Zoll-Super-Retina-Display (OLED) mit HDR IP68 staub- und wasserfest (maximale Tiefe von 2 Metern bis zu 30 Minuten) 12-MP-Dual-Kameras mit dualem OIS und 7-MP-TrueDepth-Frontkamera – Porträtmodus, Porträtbeleuchtung, Tiefensteuerung und Smart HDR', NULL, NULL, NULL, NULL, NULL),
(122, 6, 'es', 'Apple iPhone XS Max-64 GB -blanco', 'Pantalla Super Retina (OLED) de 6,5 pulgadas con HDR IP68 resistente al polvo y al agua (profundidad m&aacute;xima de 2 metros hasta 30 minutos) C&aacute;maras duales de 12 MP con OIS dual y c&aacute;mara frontal TrueDepth de 7 MP: modo retrato, iluminaci&oacute;n de retrato, control de profundidad y Smart HDR', 'Pantalla Super Retina (OLED) de 6,5 pulgadas con HDR IP68 resistente al polvo y al agua (profundidad máxima de 2 metros hasta 30 minutos) Cámaras duales de 12 MP con OIS dual y cámara frontal TrueDepth de 7 MP: modo retrato, iluminación de retrato, control de profundidad y Smart HDR', NULL, NULL, NULL, NULL, NULL),
(123, 6, 'bn', 'সাদা এপেল আইফোন এক্সেস ম্যাক্স-৬৪জিবি', '6.5-ইঞ্চি সুপার রেটিনা ডিসপ্লে (OLED) HDR IP68 ধুলো এবং জল প্রতিরোধী (সর্বোচ্চ 2 মিটার গভীরতা 30 মিনিট পর্যন্ত) 12MP ডুয়াল ক্যামেরা সঙ্গে ডুয়াল OIS এবং 7MP TrueDepth ফ্রন্ট ক্যামেরা&mdash;পোর্ট্রেট মোড, পোর্ট্রেট আলো, গভীরতা নিয়ন্ত্রণ, এবং স্মার্ট এইচডিআর', '6.5-ইঞ্চি সুপার রেটিনা ডিসপ্লে (OLED) HDR IP68 ধুলো এবং জল প্রতিরোধী (সর্বোচ্চ 2 মিটার গভীরতা 30 মিনিট পর্যন্ত) 12MP ডুয়াল ক্যামেরা সঙ্গে ডুয়াল OIS এবং 7MP TrueDepth ফ্রন্ট ক্যামেরা—পোর্ট্রেট মোড, পোর্ট্রেট আলো, গভীরতা নিয়ন্ত্রণ, এবং স্মার্ট এইচডিআর', NULL, NULL, NULL, NULL, NULL),
(124, 5, 'de', 'OnePlus 8 Pro Onyxschwarzes Android-Smartphone', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(125, 5, 'es', 'Teléfono inteligente Android OnePlus 8 Pro Onyx negro', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(126, 5, 'bn', 'ওয়ান প্লাস ৮ প্রো ব্ল্যাক এন্ড্রয়েড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(127, 4, 'de', 'Apple iPhone 11 Pro Max (64 GB) – Silber', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(128, 4, 'es', 'Apple iPhone 11 Pro Max (64 GB) – Plata', ' La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(129, 4, 'bn', 'এপেল আইফোণ ১১ প্রো ম্যাক্স (৬৪জিবি)- সিলভার', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(130, 3, 'de', 'Samsung Galaxy A52 5G Android-Handy', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(131, 3, 'bn', 'স্যামসাং গ্যালাক্সি এ৫২ সেল ফোন', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(132, 3, 'es', 'Celular Samsung Galaxy A52 5G Android', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(133, 2, 'es', 'Apple iPhone X 64GB Plata Totalmente Desbloqueado', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(134, 2, 'de', 'Apple iPhone X 64 GB Silber vollständig entsperrt', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung ', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL, NULL),
(135, 2, 'bn', 'এপেল আইফোন এক্স ৬৪ জিবি সিলভার সম্পূর্ণরূপে আনলক', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL, NULL),
(136, 1, 'de', 'Apple iPhone 11 64 GB gelb vollständig entsperrt', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet', NULL, NULL, NULL, NULL, NULL),
(137, 1, 'es', 'Apple iPhone 11 64GB Amarillo Totalmente Desbloqueado', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL, NULL),
(138, 1, 'bn', 'এপেল আইফোন হলুদ সম্পূর্ণরূপে আনলক করা হয়েছে', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপ সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত', NULL, NULL, NULL, NULL, NULL),
(139, 38, 'en', 'Test Image 95', 'Test Image 95', 'Test Image 95', NULL, NULL, '2022-03-10 01:11:36', '2022-03-10 01:11:36', NULL),
(140, 39, 'en', 'Image Test', 'Image Test', '', NULL, NULL, '2022-03-10 01:15:08', '2022-03-10 01:15:08', NULL),
(141, 40, 'en', 'Image Test 20', 'Image Test 20', '', NULL, NULL, '2022-03-10 01:21:00', '2022-03-10 01:21:00', NULL),
(142, 41, 'en', 'Test 90', 'Test 90', '', NULL, NULL, '2022-03-10 01:23:26', '2022-03-10 01:23:26', NULL),
(143, 42, 'en', 'Test 4545', 'Test 4545', '', NULL, NULL, '2022-03-10 01:29:46', '2022-03-10 01:29:46', NULL),
(144, 43, 'en', 'Penelope Holland', 'Dolor tempora ex est.', '', NULL, NULL, '2022-03-10 01:32:17', '2022-03-10 01:32:17', NULL),
(145, 44, 'en', 'Alan Frederick', 'Laborum. Ipsa, ut re.', '', NULL, NULL, '2022-03-10 01:35:58', '2022-03-10 01:35:58', NULL),
(146, 45, 'en', 'Isaiah Levy', 'Ex sunt ullamco eu q.', '', NULL, NULL, '2022-03-10 01:40:54', '2022-03-10 01:40:54', NULL),
(147, 46, 'en', 'Stephen Vaughn', 'Earum in labore non .', '', NULL, NULL, '2022-03-10 01:47:01', '2022-03-10 01:47:01', NULL),
(148, 47, 'en', 'Test Irfan', 'Test Irfan', '', NULL, NULL, '2022-03-10 01:49:24', '2022-03-10 01:49:24', NULL),
(149, 48, 'en', 'Samsung A12', '<p>Samsung A12</p>', '', NULL, NULL, '2022-03-10 02:08:25', '2022-03-10 02:08:25', NULL),
(162, 50, 'en', 'test 55', '<p>fsdfsdfsdfsfsdjljljlj</p>', '', NULL, NULL, '2022-05-08 07:24:02', '2022-05-08 07:24:02', NULL),
(163, 51, 'en', 'sdfsdfsd', '<p>sdfdsfsds</p>', '', NULL, NULL, '2022-05-08 10:17:42', '2022-05-08 10:17:42', NULL),
(164, 52, 'en', 'Women\'s Check Top', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc condimentum eros idoni rutrum fermentum. Proin nec felis dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>', '', 'Women\'s Check Top', 'ddsada', '2022-05-10 06:21:00', '2022-05-10 06:21:00', NULL),
(169, 57, 'en', 'Test-8-11-2022', '<p>Test-8-11-2022Test-8-11-2022Test-8-11-2022Test-8-11-2022</p>', '', '', '', '2022-11-08 05:51:24', '2022-11-08 05:59:34', '2022-11-08 05:59:34'),
(170, 58, 'en', '2-Test-8-11-2022', '<p>2-Test-8-11-2022</p>', '', '', '', '2022-11-08 05:54:09', '2022-11-08 05:59:34', '2022-11-08 05:59:34'),
(171, 59, 'en', '3-Test-8-11-2022', '<p>3-Test-8-11-2022</p>', '', '', '', '2022-11-08 05:54:35', '2022-11-08 05:57:23', '2022-11-08 05:57:23'),
(172, 60, 'en', 'Vincent Hayes', '<p>Vincent HayesVincent HayesVincent HayesVincent Hayes</p>', 'Proident harum est', 'Voluptatem Fugit o', 'Accusamus ipsum maxi', '2022-11-08 07:08:12', '2022-11-08 08:45:36', '2022-11-08 08:45:36'),
(173, 61, 'en', 'Test 90dfs', '<p>Test 90dfsTest 90dfsTest 90dfs</p>', '', '', '', '2022-11-08 07:09:01', '2022-11-08 08:42:47', '2022-11-08 08:42:47'),
(174, 62, 'en', 'test12345', '<p>test12345test12345test12345test12345</p>', '', '', '', '2022-11-08 09:20:04', '2022-11-08 09:20:55', '2022-11-08 09:20:55'),
(175, 63, 'en', 'sdfsdd', '<p>fsdstrt</p>', '', '', '', '2022-11-08 09:24:53', '2022-11-08 09:25:47', '2022-11-08 09:25:47'),
(176, 64, 'en', 'gddgfdg', '<p>gdfgfdgdf</p>', '', '', '', '2022-11-08 09:26:33', '2022-11-08 09:34:11', '2022-11-08 09:34:11'),
(177, 65, 'en', 'fcdfsdsfs', '<p>sdfsdfdsfsd</p>', '', '', '', '2022-11-08 09:57:46', '2022-11-08 10:40:23', '2022-11-08 10:40:23'),
(178, 66, 'en', 'test 545', '<p>test 545 test 545 test 545</p>', '', '', '', '2022-11-09 05:09:37', '2022-11-09 08:16:09', '2022-11-09 08:16:09'),
(179, 67, 'en', 'fgdgrgdfg', '<p>gdfgdfgfd</p>', '', '', '', '2022-11-09 05:10:01', '2022-11-09 08:16:09', '2022-11-09 08:16:09'),
(180, 68, 'en', 'ddgddgdgdasd', '<p>gfdgfdgdfgdfcv</p>', '', '', '', '2022-11-09 05:10:39', '2022-11-09 06:47:45', '2022-11-09 06:47:45'),
(181, 69, 'en', 'Test Product', '<p>Test Product sdssdfdsfdsfsdfdsfds</p>', '', '', '', '2022-11-12 06:53:28', '2022-11-12 06:59:03', '2022-11-12 06:59:03'),
(182, 70, 'en', 'testtset', '<p>tetsetet</p>', '', '', '', '2022-12-29 09:52:19', '2023-01-31 08:14:05', '2023-01-31 08:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `comment` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `comment`, `rating`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 4, 'Nice', '3', 'approved', '2022-04-16 00:37:18', '2022-10-30 10:10:29', NULL),
(2, 1, 3, 'Good Product', '3', 'approved', '2022-04-23 06:50:45', '2022-04-23 07:11:33', NULL),
(3, 49, 3, 'Good', '3', 'approved', '2022-04-23 07:30:04', '2022-04-23 08:07:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', 1, '2021-07-31 02:31:32', '2022-11-07 10:10:28'),
(3, 'Customer', 'web', 1, '2021-07-31 02:32:28', '2021-07-31 05:22:44'),
(4, 'Manger', 'web', 1, '2021-07-31 03:29:35', '2021-08-11 23:16:53'),
(5, 'Editor', 'web', 1, '2021-07-31 04:25:38', '2022-11-07 10:10:47'),
(6, 'HR', 'web', 1, '2021-07-31 04:26:26', '2022-11-07 10:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 3),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(75, 3),
(76, 3),
(77, 3),
(78, 3),
(79, 3),
(80, 3),
(81, 3),
(82, 3);

-- --------------------------------------------------------

--
-- Table structure for table `searchterms`
--

CREATE TABLE `searchterms` (
  `id` bigint UNSIGNED NOT NULL,
  `search_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `count` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_translatable` tinyint NOT NULL DEFAULT '0',
  `plain_value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `is_translatable`, `plain_value`, `created_at`, `updated_at`) VALUES
(1, 'storefront_welcome_text', 1, NULL, NULL, NULL),
(2, 'storefront_theme_color', 0, '#3D0070', NULL, '2022-10-04 04:25:47'),
(3, 'storefront_mail_theme_color', 0, '#000000', NULL, '2021-11-27 20:39:51'),
(4, 'storefront_slider', 0, NULL, NULL, NULL),
(5, 'storefront_terms_and_condition_page', 0, '', NULL, '2022-10-04 04:25:47'),
(6, 'storefront_privacy_policy_page', 0, '', NULL, '2022-10-04 04:25:47'),
(7, 'storefront_address', 1, NULL, NULL, NULL),
(8, 'storefront_navbar_text', 1, NULL, NULL, NULL),
(9, 'storefront_primary_menu', 0, '3', NULL, '2022-11-09 09:14:30'),
(10, 'storefront_category_menu', 0, '', NULL, '2022-11-09 09:14:30'),
(11, 'storefront_footer_menu_title_one', 1, NULL, NULL, NULL),
(12, 'storefront_footer_menu_one', 0, '2', NULL, '2022-11-09 09:14:30'),
(13, 'storefront_footer_menu_title_two', 1, NULL, NULL, NULL),
(14, 'storefront_footer_menu_two', 0, '1', NULL, '2022-11-09 09:14:30'),
(15, 'storefront_facebook_link', 0, 'https://www.facebook.com/', NULL, '2022-01-20 03:00:54'),
(16, 'storefront_twitter_link', 0, 'https://twitter.com/', NULL, '2022-01-20 03:00:54'),
(17, 'storefront_instagram_link', 0, 'https://www.instagram.com/', NULL, '2022-01-20 03:00:54'),
(18, 'storefront_youtube_link', 0, 'https://www.youtube.com/', NULL, '2022-01-20 03:00:54'),
(19, 'storefront_section_status', 0, '1', NULL, '2022-02-02 02:25:47'),
(20, 'storefront_feature_1_title', 1, NULL, NULL, NULL),
(21, 'storefront_feature_1_subtitle', 1, NULL, NULL, NULL),
(22, 'storefront_feature_1_icon', 0, 'ti-truck', NULL, '2022-02-02 02:25:47'),
(23, 'storefront_feature_2_title', 1, NULL, NULL, NULL),
(24, 'storefront_feature_2_subtitle', 1, NULL, NULL, NULL),
(25, 'storefront_feature_2_icon', 0, 'ti-loop', NULL, '2022-02-02 02:25:47'),
(26, 'storefront_feature_3_title', 1, NULL, NULL, NULL),
(27, 'storefront_feature_3_subtitle', 1, NULL, NULL, NULL),
(28, 'storefront_feature_3_icon', 0, 'ti-lock', NULL, '2022-02-02 02:25:47'),
(29, 'storefront_feature_4_title', 1, NULL, NULL, NULL),
(30, 'storefront_feature_4_subtitle', 1, NULL, NULL, NULL),
(31, 'storefront_feature_4_icon', 0, 'ti-headphone-alt', NULL, '2022-02-02 02:25:47'),
(32, 'storefront_feature_5_title', 1, NULL, NULL, NULL),
(33, 'storefront_feature_5_subtitle', 1, NULL, NULL, NULL),
(34, 'storefront_feature_5_icon', 0, 'ti-truck', NULL, '2022-01-19 23:12:18'),
(35, 'storefront_footer_tag_id', 0, '[\"1\",\"2\",\"3\",\"4\",\"7\"]', NULL, '2022-04-26 05:50:01'),
(36, 'storefront_copyright_text', 1, NULL, NULL, NULL),
(37, 'storefront_payment_method_image', 0, NULL, NULL, NULL),
(38, 'storefront_newsletter_image', 0, NULL, NULL, NULL),
(39, 'storefront_product_page_image', 0, NULL, NULL, NULL),
(40, 'storefront_call_action_url', 0, NULL, NULL, NULL),
(41, 'storefront_open_new_window', 0, NULL, NULL, NULL),
(42, 'storefront_slider_banner_1_image', 0, NULL, NULL, NULL),
(43, 'storefront_slider_banner_1_call_to_action_url', 0, 'https://www.facebook.com/', NULL, '2022-04-05 13:40:23'),
(44, 'storefront_slider_banner_1_open_in_new_window', 0, '1', NULL, '2022-04-05 13:40:23'),
(45, 'storefront_slider_banner_2_image', 0, NULL, NULL, NULL),
(46, 'storefront_slider_banner_2_call_to_action_url', 0, 'http://localhost/cartpro/product/samsung-galaxy-m02s/20', NULL, '2022-04-05 13:40:23'),
(47, 'storefront_slider_banner_2_open_in_new_window', 0, '1', NULL, '2022-04-05 13:40:23'),
(48, 'storefront_one_column_banner_enabled', 0, '1', NULL, '2022-04-12 11:44:56'),
(49, 'storefront_one_column_banner_image', 0, NULL, NULL, NULL),
(50, 'storefront_one_column_banner_call_to_action_url', 0, 'https://www.facebook.com/', NULL, '2022-04-12 11:44:56'),
(51, 'storefront_one_column_banner_open_in_new_window', 0, '1', NULL, '2022-04-12 11:44:56'),
(52, 'storefront_two_column_banner_enabled', 0, '1', NULL, '2022-04-12 11:16:35'),
(53, 'storefront_two_column_banner_image_1', 0, NULL, NULL, NULL),
(54, 'storefront_two_column_banners_1_call_to_action_url', 0, 'https://www.facebook.com/', NULL, '2022-04-12 11:16:35'),
(55, 'storefront_two_column_banners_1_open_in_new_window', 0, '1', NULL, '2022-04-12 11:16:35'),
(56, 'storefront_two_column_banner_image_2', 0, NULL, NULL, NULL),
(57, 'storefront_two_column_banners_2_call_to_action_url', 0, '', NULL, '2022-04-12 11:16:35'),
(58, 'storefront_two_column_banners_2_open_in_new_window', 0, '0', NULL, '2022-04-12 11:16:35'),
(59, 'storefront_three_column_banners_enabled', 0, '1', NULL, '2022-04-12 19:30:16'),
(60, 'storefront_three_column_banners_image_1', 0, NULL, NULL, NULL),
(61, 'storefront_three_column_banners_1_call_to_action_url', 0, 'https://www.facebook.com/', NULL, '2022-04-12 19:30:16'),
(62, 'storefront_three_column_banners_1_open_in_new_window', 0, '1', NULL, '2022-04-12 19:30:16'),
(63, 'storefront_three_column_banners_image_2', 0, NULL, NULL, NULL),
(64, 'storefront_three_column_banners_2_call_to_action_url', 0, '', NULL, '2022-04-12 19:30:16'),
(65, 'storefront_three_column_banners_2_open_in_new_window', 0, '0', NULL, '2022-04-12 19:30:16'),
(66, 'storefront_three_column_banners_image_3', 0, NULL, NULL, NULL),
(67, 'storefront_three_column_banners_3_call_to_action_url', 0, '', NULL, '2022-04-12 19:30:16'),
(68, 'storefront_three_column_banners_3_open_in_new_window', 0, '0', NULL, '2022-04-12 19:30:16'),
(69, 'storefront_three_column_full_width_banners_enabled', 0, '1', NULL, '2022-10-04 04:17:46'),
(70, 'storefront_three_column_full_width_banners_background_image', 0, NULL, NULL, NULL),
(71, 'storefront_three_column_full_width_banners_image_1', 0, NULL, NULL, NULL),
(72, 'storefront_three_column_full_width_banners_1_call_to_action_url', 0, '', NULL, '2022-10-04 04:17:46'),
(73, 'storefront_three_column_full_width_banners_1_open_in_new_window', 0, '0', NULL, '2022-10-04 04:17:46'),
(74, 'storefront_three_column_full_width_banners_image_2', 0, NULL, NULL, NULL),
(75, 'storefront_three_column_full_width_banners_2_call_to_action_url', 0, '', NULL, '2022-10-04 04:17:46'),
(76, 'storefront_three_column_full_width_banners_2_open_in_new_window', 0, '0', NULL, '2022-10-04 04:17:46'),
(77, 'storefront_three_column_full_width_banners_image_3', 0, NULL, NULL, NULL),
(78, 'storefront_three_column_full_width_banners_3_call_to_action_url', 0, '', NULL, '2022-10-04 04:17:46'),
(79, 'storefront_three_column_full_width_banners_3_open_in_new_window', 0, '0', NULL, '2022-10-04 04:17:46'),
(80, 'storefront_top_brands_section_enabled', 0, '0', NULL, '2022-06-20 06:01:00'),
(81, 'storefront_top_brands', 0, '[\"1\",\"2\"]', NULL, '2022-06-20 06:01:00'),
(82, 'storefront_product_tabs_1_section_enabled', 0, '1', NULL, '2022-10-13 01:44:17'),
(83, 'storefront_product_tabs_1_section_tab_1_title', 1, NULL, NULL, NULL),
(84, 'storefront_product_tabs_1_section_tab_1_product_type', 0, 'category_products', NULL, '2022-10-13 01:44:17'),
(85, 'storefront_product_tabs_1_section_tab_1_category_id', 0, '1', NULL, '2022-10-13 01:44:17'),
(86, 'storefront_product_tabs_1_section_tab_1_products', 0, NULL, NULL, NULL),
(87, 'storefront_product_tabs_1_section_tab_1_products_limit', 0, NULL, NULL, NULL),
(88, 'storefront_product_tabs_1_section_tab_2_title', 1, NULL, NULL, NULL),
(89, 'storefront_product_tabs_1_section_tab_2_product_type', 0, 'category_products', NULL, '2022-10-13 01:44:17'),
(90, 'storefront_product_tabs_1_section_tab_2_category_id', 0, '2', NULL, '2022-10-13 01:44:17'),
(91, 'storefront_product_tabs_1_section_tab_2_products', 0, NULL, NULL, NULL),
(92, 'storefront_product_tabs_1_section_tab_2_products_limit', 0, NULL, NULL, NULL),
(93, 'storefront_product_tabs_1_section_tab_3_title', 1, NULL, NULL, NULL),
(94, 'storefront_product_tabs_1_section_tab_3_product_type', 0, 'category_products', NULL, '2022-10-13 01:44:17'),
(95, 'storefront_product_tabs_1_section_tab_3_category_id', 0, '3', NULL, '2022-10-13 01:44:17'),
(96, 'storefront_product_tabs_1_section_tab_3_products', 0, NULL, NULL, NULL),
(97, 'storefront_product_tabs_1_section_tab_3_products_limit', 0, NULL, NULL, NULL),
(98, 'storefront_product_tabs_1_section_tab_4_title', 1, NULL, NULL, NULL),
(99, 'storefront_product_tabs_1_section_tab_4_product_type', 0, 'category_products', NULL, '2022-10-13 01:44:17'),
(100, 'storefront_product_tabs_1_section_tab_4_category_id', 0, '5', NULL, '2022-10-13 01:44:17'),
(101, 'storefront_product_tabs_1_section_tab_4_products', 0, NULL, NULL, NULL),
(102, 'storefront_product_tabs_1_section_tab_4_products_limit', 0, NULL, NULL, NULL),
(103, 'storefront_product_tabs_2_section_enabled', 0, NULL, NULL, NULL),
(104, 'storefront_product_tabs_2_section_title', 1, NULL, NULL, NULL),
(105, 'storefront_product_tabs_2_section_tab_1_title', 1, NULL, NULL, NULL),
(106, 'storefront_product_tabs_2_section_tab_1_product_type', 0, NULL, NULL, NULL),
(107, 'storefront_product_tabs_2_section_tab_1_category_id', 0, NULL, NULL, NULL),
(108, 'storefront_product_tabs_2_section_tab_1_products', 0, NULL, NULL, NULL),
(109, 'storefront_product_tabs_2_section_tab_1_products_limit', 0, NULL, NULL, NULL),
(110, 'storefront_product_tabs_2_section_tab_2_title', 1, NULL, NULL, NULL),
(111, 'storefront_product_tabs_2_section_tab_2_product_type', 0, NULL, NULL, NULL),
(112, 'storefront_product_tabs_2_section_tab_2_category_id', 0, NULL, NULL, NULL),
(113, 'storefront_product_tabs_2_section_tab_2_products', 0, NULL, NULL, NULL),
(114, 'storefront_product_tabs_2_section_tab_2_products_limit', 0, NULL, NULL, NULL),
(115, 'storefront_product_tabs_2_section_tab_3_title', 1, NULL, NULL, NULL),
(116, 'storefront_product_tabs_2_section_tab_3_product_type', 0, NULL, NULL, NULL),
(117, 'storefront_product_tabs_2_section_tab_3_category_id', 0, NULL, NULL, NULL),
(118, 'storefront_product_tabs_2_section_tab_3_products', 0, NULL, NULL, NULL),
(119, 'storefront_product_tabs_2_section_tab_3_products_limit', 0, NULL, NULL, NULL),
(120, 'storefront_product_tabs_2_section_tab_4_title', 1, NULL, NULL, NULL),
(121, 'storefront_product_tabs_2_section_tab_4_product_type', 0, NULL, NULL, NULL),
(122, 'storefront_product_tabs_2_section_tab_4_category_id', 0, NULL, NULL, NULL),
(123, 'storefront_product_tabs_2_section_tab_4_products', 0, NULL, NULL, NULL),
(124, 'storefront_product_tabs_2_section_tab_4_products_limit', 0, NULL, NULL, NULL),
(125, 'storefront_slider_banner_1_title', 1, NULL, NULL, NULL),
(126, 'storefront_slider_banner_2_title', 1, NULL, NULL, NULL),
(127, 'storefront_slider_banner_3_image', 0, 'D:\\xampp\\tmp\\phpA703.tmp', NULL, '2022-01-18 03:40:01'),
(128, 'storefront_slider_banner_3_title', 1, NULL, NULL, NULL),
(129, 'storefront_slider_banner_3_call_to_action_url', 0, 'http://localhost:8081/CartPro/product/bose-noise-cancelling-wireless-bluetooth/5', NULL, '2022-04-05 13:40:23'),
(130, 'storefront_slider_banner_3_open_in_new_window', 0, '0', NULL, '2022-04-05 13:40:23'),
(131, 'storefront_flash_sale_and_vertical_products_section_enabled', 0, 'on', NULL, '2022-10-04 08:34:20'),
(132, 'storefront_flash_sale_title', 1, NULL, NULL, NULL),
(133, 'storefront_flash_sale_active_campaign_flash_id', 0, '2', NULL, '2022-10-04 08:34:20'),
(134, 'storefront_vertical_product_1_title', 1, NULL, NULL, NULL),
(135, 'storefront_vertical_product_1_type', 0, 'category_products', NULL, '2022-10-04 08:34:20'),
(136, 'storefront_vertical_product_1_category_id', 0, '4', NULL, '2022-10-04 08:34:20'),
(137, 'storefront_vertical_product_1_products', 0, NULL, NULL, NULL),
(138, 'storefront_vertical_product_1_products_limit', 0, NULL, NULL, NULL),
(139, 'storefront_vertical_product_2_title', 1, NULL, NULL, NULL),
(140, 'storefront_vertical_product_2_type', 0, 'category_products', NULL, '2022-10-04 08:34:20'),
(141, 'storefront_vertical_product_2_category_id', 0, '14', NULL, '2022-10-04 08:34:20'),
(142, 'storefront_vertical_product_2_products', 0, NULL, NULL, NULL),
(143, 'storefront_vertical_product_2_products_limit', 0, NULL, NULL, NULL),
(144, 'storefront_vertical_product_3_title', 1, NULL, NULL, NULL),
(145, 'storefront_vertical_product_3_type', 0, 'category_products', NULL, '2022-10-04 08:34:20'),
(146, 'storefront_vertical_product_3_category_id', 0, '7', NULL, '2022-10-04 08:34:20'),
(147, 'storefront_vertical_product_3_products', 0, NULL, NULL, NULL),
(148, 'storefront_vertical_product_3_products_limit', 0, NULL, NULL, NULL),
(149, 'store_front_slider_format', 0, 'half_width', NULL, '2022-10-04 04:25:47'),
(150, 'storefront_top_categories_section_enabled', 0, '1', NULL, '2022-01-30 04:11:08'),
(151, 'storefront_shop_page_enabled', 0, '1', NULL, '2022-10-04 04:25:47'),
(152, 'storefront_brand_page_enabled', 0, '1', NULL, '2022-10-04 04:25:47'),
(153, 'storefront_navbar_background_color', 0, '#FFFFFF', NULL, '2022-10-04 04:25:47'),
(154, 'storefront_nav_text_color', 0, '#021523', NULL, '2022-10-04 04:25:47'),
(155, 'storefront_footer_menu_title_three', 1, NULL, NULL, '2022-05-26 09:08:17'),
(156, 'storefront_footer_menu_three', 0, '4', NULL, '2022-11-09 09:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `setting_about_us`
--

CREATE TABLE `setting_about_us` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_about_us`
--

INSERT INTO `setting_about_us` (`id`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 0, 'images/about_us/fm0W4eEBds.jpg', '2022-05-26 07:49:44', '2022-05-26 10:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `setting_about_us_translations`
--

CREATE TABLE `setting_about_us_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `setting_about_us_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_about_us_translations`
--

INSERT INTO `setting_about_us_translations` (`id`, `setting_about_us_id`, `locale`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'CartPro is your favourite shopping destination', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur quasi natus quia facilis corporis quibusdam ut non laudantium recusandae fugiat rerum ab aliquid accusamus cumque quae, illum id voluptatem ducimus.', '2022-05-26 07:49:44', '2022-05-26 07:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `setting_bank_transfers`
--

CREATE TABLE `setting_bank_transfers` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `instruction` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_cash_on_deliveries`
--

CREATE TABLE `setting_cash_on_deliveries` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_cash_on_deliveries`
--

INSERT INTO `setting_cash_on_deliveries` (`id`, `status`, `label`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cash On Delivery', 'Cash On Delivery', '2022-02-25 12:13:06', '2022-02-25 12:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `setting_check_money_orders`
--

CREATE TABLE `setting_check_money_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `instruction` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_currencies`
--

CREATE TABLE `setting_currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `supported_currency` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `default_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `default_currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `currency_format` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exchange_rate_service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fixer_access_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `forge_api_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `currency_data_feed_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `auto_refresh` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_currencies`
--

INSERT INTO `setting_currencies` (`id`, `supported_currency`, `default_currency_code`, `default_currency`, `currency_format`, `exchange_rate_service`, `fixer_access_key`, `forge_api_key`, `currency_data_feed_key`, `auto_refresh`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh Taka,United States Dollar', 'USD', '$', 'prefix', NULL, NULL, NULL, NULL, NULL, '2022-03-01 22:36:43', '2022-11-13 07:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `setting_custom_css_jsses`
--

CREATE TABLE `setting_custom_css_jsses` (
  `id` bigint UNSIGNED NOT NULL,
  `header` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `footer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_facebooks`
--

CREATE TABLE `setting_facebooks` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint DEFAULT NULL,
  `app_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `app_secret` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_flat_rates`
--

CREATE TABLE `setting_flat_rates` (
  `id` bigint UNSIGNED NOT NULL,
  `flat_status` tinyint DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cost` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_flat_rates`
--

INSERT INTO `setting_flat_rates` (`id`, `flat_status`, `label`, `cost`, `created_at`, `updated_at`) VALUES
(1, 1, 'Flat Rate', 15, '2022-02-25 12:12:08', '2022-02-25 12:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `setting_free_shippings`
--

CREATE TABLE `setting_free_shippings` (
  `id` bigint UNSIGNED NOT NULL,
  `shipping_status` tinyint DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `minimum_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_free_shippings`
--

INSERT INTO `setting_free_shippings` (`id`, `shipping_status`, `label`, `minimum_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Free Shipping', 0, '2022-02-25 12:11:22', '2022-02-25 12:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `setting_generals`
--

CREATE TABLE `setting_generals` (
  `id` bigint UNSIGNED NOT NULL,
  `supported_countries` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `default_country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `default_timezone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `number_format_type` int DEFAULT NULL,
  `reviews_and_ratings` tinyint DEFAULT NULL,
  `auto_approve_reviews` tinyint DEFAULT NULL,
  `cookie_bar` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_generals`
--

INSERT INTO `setting_generals` (`id`, `supported_countries`, `default_country`, `default_timezone`, `customer_role`, `number_format_type`, `reviews_and_ratings`, `auto_approve_reviews`, `cookie_bar`, `created_at`, `updated_at`) VALUES
(1, 'United States,Bangladesh,India', 'United States', 'Asia/Dhaka', 'admin', 2, 1, NULL, NULL, '2022-04-22 13:43:32', '2022-12-11 05:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `setting_googles`
--

CREATE TABLE `setting_googles` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint DEFAULT NULL,
  `client_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `client_secret` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_home_page_seos`
--

CREATE TABLE `setting_home_page_seos` (
  `id` bigint UNSIGNED NOT NULL,
  `meta_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_home_page_seos`
--

INSERT INTO `setting_home_page_seos` (`id`, `meta_url`, `meta_type`, `meta_image`, `created_at`, `updated_at`) VALUES
(1, 'http://localhost/cartpro/admin/setting/others', 'website', 'images/setting_home_page_seo/STXu7F6S0K.png', '2022-07-27 10:08:46', '2022-07-27 10:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `setting_home_page_seo_translations`
--

CREATE TABLE `setting_home_page_seo_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `setting_home_page_seo_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_site_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_home_page_seo_translations`
--

INSERT INTO `setting_home_page_seo_translations` (`id`, `setting_home_page_seo_id`, `locale`, `meta_site_name`, `meta_title`, `meta_slug`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'CartPro', 'dasdasd', 'dasdasd', 'dasdad', '2022-07-27 10:08:46', '2022-07-27 10:08:46'),
(2, 1, 'bn', 'কার্টপ্রো', 'টেস্টিং', 'টেস্টিং', 'টেস্টিং', '2022-07-27 10:23:51', '2022-07-27 10:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `setting_local_pickups`
--

CREATE TABLE `setting_local_pickups` (
  `id` bigint UNSIGNED NOT NULL,
  `pickup_status` tinyint DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cost` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_local_pickups`
--

INSERT INTO `setting_local_pickups` (`id`, `pickup_status`, `label`, `cost`, `created_at`, `updated_at`) VALUES
(1, 1, 'Local Pickup', 10, '2022-02-25 12:11:57', '2022-02-25 12:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `setting_mails`
--

CREATE TABLE `setting_mails` (
  `id` bigint UNSIGNED NOT NULL,
  `mail_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_host` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_port` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_encryption` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `welcome_email` tinyint DEFAULT NULL,
  `new_order_to_admin` tinyint DEFAULT NULL,
  `invoice_mail` tinyint DEFAULT NULL,
  `mail_order_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_header_theme_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_body_theme_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_footer_theme_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_layout_background_theme_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_mails`
--

INSERT INTO `setting_mails` (`id`, `mail_address`, `mail_name`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `welcome_email`, `new_order_to_admin`, `invoice_mail`, `mail_order_status`, `mail_header_theme_color`, `mail_body_theme_color`, `mail_footer_theme_color`, `mail_layout_background_theme_color`, `created_at`, `updated_at`) VALUES
(1, 'irfanchowdhury80@gmail.com', 'Fahim Chowdhury', 'smtp.gmail.com', '587', 'irfanchowdhury80@gmail.com', 'lybufwlvdnjcvofzcvofz', 'tls', NULL, NULL, NULL, NULL, '#D0EAE3', '#FFFFFF', '#249BE5', '#6A696B', '2022-07-24 06:02:20', '2022-11-16 07:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `setting_newsletters`
--

CREATE TABLE `setting_newsletters` (
  `id` bigint UNSIGNED NOT NULL,
  `newsletter` tinyint DEFAULT NULL,
  `mailchimp_api_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mailchimp_list_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_newsletters`
--

INSERT INTO `setting_newsletters` (`id`, `newsletter`, `mailchimp_api_key`, `mailchimp_list_id`, `created_at`, `updated_at`) VALUES
(1, 1, '', '', '2022-02-25 11:37:25', '2022-04-21 04:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `setting_paypals`
--

CREATE TABLE `setting_paypals` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sandbox` tinyint DEFAULT NULL,
  `client_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `secret` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_paypals`
--

INSERT INTO `setting_paypals` (`id`, `status`, `label`, `description`, `sandbox`, `client_id`, `secret`, `created_at`, `updated_at`) VALUES
(1, 1, 'Paypal', 'Test', NULL, 'AU9xEUcAhAZ9uK_UNVseT4RAiOVABw38vUjPYDth_M9IGCQp4Ez_WJ8s1HtztNdx3Nt58NuaFKcWX98b', 'EEjSv_jGB0xYCRs3-8L9aEsAp56LeQOOSNNTaXR1LirZxq6Nmgn70tL5jInojNIoCp_JbW_jjoOMT1qG', '2022-02-25 12:14:17', '2022-05-01 20:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `setting_paytms`
--

CREATE TABLE `setting_paytms` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sandbox` tinyint DEFAULT NULL,
  `merchant_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `merchant_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_sms`
--

CREATE TABLE `setting_sms` (
  `id` bigint UNSIGNED NOT NULL,
  `sms_from` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sms_service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `api_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `api_secret` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `account_sid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `auth_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `welcome_sms` tinyint DEFAULT NULL,
  `new_order_sms_to_admin` tinyint DEFAULT NULL,
  `new_order_sms_to_customer` tinyint DEFAULT NULL,
  `sms_order_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_stores`
--

CREATE TABLE `setting_stores` (
  `id` bigint UNSIGNED NOT NULL,
  `store_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `store_tagline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `store_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `store_address_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_address_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `store_zip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `admin_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hide_store_phone` tinyint DEFAULT NULL,
  `hide_store_email` tinyint DEFAULT NULL,
  `get_in_touch` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `schedule` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_stores`
--

INSERT INTO `setting_stores` (`id`, `store_name`, `store_tagline`, `store_email`, `store_phone`, `store_address_1`, `store_address_2`, `store_city`, `store_country`, `store_state`, `store_zip`, `admin_logo`, `hide_store_phone`, `hide_store_email`, `get_in_touch`, `schedule`, `created_at`, `updated_at`) VALUES
(1, 'CartPro Shop', 'Laravel ecommerce CMS', 'irfanchowdhury434@gmail.com', '+880 192 4756 759', 'Agrabad', '', 'Chittagong', 'Bangladesh', NULL, '4330', 'images/general/i7T69GsUWT.png', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quae eum cupiditate et impedit in!\r\n\r\nPraesent efficitur, odio at dictum fringilla, leo dolor ornare nulla, quis condimentum enim arcu id magna.', '[\"Sat - Thursday - 9.00 AM - 05.00 PM\",\"Friday - Off\"]', '2022-02-14 00:01:00', '2022-09-15 05:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `setting_strips`
--

CREATE TABLE `setting_strips` (
  `id` bigint UNSIGNED NOT NULL,
  `status` tinyint DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `publishable_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `secret_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_strips`
--

INSERT INTO `setting_strips` (`id`, `status`, `label`, `description`, `publishable_key`, `secret_key`, `created_at`, `updated_at`) VALUES
(1, 1, 'Stripe', 'dfsfsdfd', 'pk_test_51JlEJWSBbimX2c4JNID3BAgh3lyg2W1PGCEfRI12E92hm681WW7IEyfVqr8xz2rzhBcjl1Ucetxd5uVrkQyoG3ja00IJVnKYbV', 'sk_test_51JlEJWSBbimX2c4JIlBaNrTsNcmF5YYbxrfvtknCiDnmmWrzSiCMfQKrSZQsHMs4IhySSZFJ4y4u36KFx1G3NCio00lSHUqusV', '2022-04-18 05:59:26', '2022-12-01 08:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `setting_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(30, 1, 'en', 'Welcome to CartPro', '2021-09-04 23:50:08', '2022-04-05 10:51:04'),
(31, 7, 'en', 'Dewanhat, Chittagong', '2021-09-04 23:50:09', '2021-10-09 01:18:33'),
(32, 125, 'en', 'Power Bank', '2021-09-05 23:04:39', '2022-04-05 13:40:23'),
(33, 126, 'en', 'Samsung A21', '2021-09-06 03:03:01', '2021-10-31 21:28:27'),
(34, 128, 'en', 'Headphone', '2021-09-06 03:39:58', '2022-02-21 15:34:27'),
(35, 8, 'en', NULL, '2021-09-13 05:32:13', '2021-09-13 05:32:13'),
(36, 11, 'en', 'Quick Shop', '2021-09-13 05:32:13', '2022-03-28 12:40:09'),
(37, 13, 'en', 'Help Center', '2021-09-13 05:32:13', '2022-03-28 12:50:00'),
(38, 1, 'bn', 'স্বাগতম কার্ট-প্রোতে', '2021-09-21 02:25:09', '2021-09-21 02:34:18'),
(39, 7, 'bn', 'test', '2021-09-21 02:25:10', '2021-09-21 02:25:10'),
(40, 20, 'bn', 'Free Shipping Irfan', '2021-09-21 02:38:31', '2021-09-21 02:55:12'),
(41, 21, 'bn', 'Orders over $100', '2021-09-21 02:38:31', '2021-09-21 02:38:31'),
(42, 23, 'bn', 'Money returns', '2021-09-21 02:38:31', '2021-09-21 03:10:40'),
(43, 24, 'bn', 'Within 30 days', '2021-09-21 02:38:31', '2021-09-21 03:10:40'),
(44, 26, 'bn', '100% secure', '2021-09-21 02:38:31', '2021-09-21 03:17:48'),
(45, 27, 'bn', 'Online Trading', '2021-09-21 02:38:31', '2021-09-21 03:17:48'),
(46, 29, 'bn', '24/7 support', '2021-09-21 02:38:31', '2021-09-21 03:25:22'),
(47, 30, 'bn', 'Dedicated Support', '2021-09-21 02:38:31', '2021-09-21 03:25:23'),
(48, 32, 'bn', NULL, '2021-09-21 02:38:32', '2021-09-21 03:25:23'),
(49, 33, 'bn', NULL, '2021-09-21 02:38:32', '2021-09-21 03:25:23'),
(50, 83, 'bn', 'ফিচারড ক্যাটাগরি', '2021-09-21 03:59:12', '2021-11-01 07:02:55'),
(51, 88, 'bn', 'ফার্ণিচার', '2021-09-21 03:59:12', '2021-11-01 07:02:55'),
(52, 93, 'bn', NULL, '2021-09-21 03:59:12', '2021-09-21 03:59:12'),
(53, 98, 'bn', 'শার্ট', '2021-09-21 03:59:12', '2021-11-01 07:02:56'),
(54, 83, 'en', 'Mobile', '2021-09-21 04:50:53', '2022-10-04 07:37:30'),
(55, 88, 'en', 'Computer', '2021-09-21 04:50:53', '2022-10-04 07:37:30'),
(56, 93, 'en', 'Television', '2021-09-21 04:50:54', '2022-10-04 07:37:30'),
(57, 98, 'en', 'Headphone', '2021-09-21 04:50:54', '2022-10-04 07:37:30'),
(58, 132, 'en', 'Best Deals', '2021-10-21 02:09:37', '2021-10-21 02:10:11'),
(59, 134, 'en', 'Watches', '2021-10-21 03:46:08', '2022-02-22 00:20:25'),
(60, 139, 'en', 'Camera', '2021-10-21 03:46:08', '2022-02-22 01:11:45'),
(61, 144, 'en', 'Shoes', '2021-10-21 04:19:23', '2022-02-22 01:45:11'),
(62, 132, 'bn', 'বেস্ট ডিল', '2021-11-01 07:05:32', '2021-11-01 07:05:32'),
(63, 134, 'bn', 'ঘড়ি', '2021-11-01 07:05:32', '2021-11-01 07:06:30'),
(64, 139, 'bn', 'শার্ট', '2021-11-01 07:05:32', '2021-11-01 07:06:30'),
(65, 144, 'bn', 'মোবাইল', '2021-11-01 07:05:32', '2021-11-01 07:06:30'),
(66, 20, 'en', 'Free Shipping', '2021-11-06 10:48:09', '2021-11-06 10:48:09'),
(67, 21, 'en', 'Orders over $100', '2021-11-06 10:48:09', '2021-11-06 10:48:09'),
(68, 23, 'en', 'Money returns', '2021-11-06 10:48:09', '2021-11-06 10:50:03'),
(69, 24, 'en', 'Within 30 days', '2021-11-06 10:48:09', '2021-11-06 10:50:03'),
(70, 26, 'en', '100% secure', '2021-11-06 10:48:09', '2021-11-06 10:50:03'),
(71, 27, 'en', 'Online Trading', '2021-11-06 10:48:09', '2021-11-06 10:50:03'),
(72, 29, 'en', '24/7 support', '2021-11-06 10:48:09', '2021-11-06 10:50:03'),
(73, 30, 'en', 'Dedicated Support', '2021-11-06 10:48:09', '2021-11-06 10:50:03'),
(74, 32, 'en', 'Money returns', '2021-11-06 10:48:09', '2022-01-19 23:12:18'),
(75, 33, 'en', 'Within 30 days', '2021-11-06 10:48:09', '2022-01-19 23:12:18'),
(76, 36, 'en', '&amp;copy; CartPro 2021. All rights reserved', '2021-11-18 04:05:38', '2022-04-25 06:08:58'),
(77, 36, 'bn', '&amp;copy; CartPro 2021. All rights reserved', '2022-04-25 07:18:20', '2022-04-25 07:18:20'),
(78, 155, 'en', 'Others', '2022-05-26 09:09:16', '2022-05-26 10:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `shipping_first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_address_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_address_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shipping_city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_zip_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_phone`, `shipping_country`, `shipping_address_1`, `shipping_address_2`, `shipping_city`, `shipping_state`, `shipping_zip_code`, `created_at`, `updated_at`) VALUES
(1, 60, 'Abdulah Al', 'Juhair', 'juhair@gmail.com', '01993678745', 'Heard and Mc Donald Islands', '97 First Street', 'Atque doloremque et', 'Omnis culpa occaeca', 'Quaerat dolores eius', '75508', '2022-07-03 09:00:55', '2022-07-03 09:00:55'),
(2, 61, 'Arman Ul', 'Alam', 'arman@gmail.com', '01234675987', 'Heard and Mc Donald Islands', '97 First Street', 'Atque doloremque et', 'Omnis culpa occaeca', 'Quaerat dolores eius', '75508', '2022-07-03 09:21:07', '2022-07-03 09:21:07'),
(3, 69, 'fafaf', 'asdds', 'asds@gmail.com', '442342423', 'Austria', 'dad', 'adasd', 'dasasd', 'das', '4323', '2022-07-23 09:33:32', '2022-07-23 09:33:32'),
(4, 85, 'Promi', 'Chy', 'promi@gmail.com', '1234579', 'Heard and Mc Donald Islands', '97 First Street', 'Atque doloremque et', 'Omnis culpa occaeca', 'Quaerat dolores eius', '75508', '2022-09-27 07:22:38', '2022-09-27 07:22:38'),
(5, 86, 'Promi', 'Chowdhury', 'irfanchowdhury434@gmail.com', '454545', 'Heard and Mc Donald Islands', '97 First Street', 'Atque doloremque et', 'Omnis culpa occaeca', 'Quaerat dolores eius', '75508', '2022-09-27 10:45:33', '2022-09-27 10:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_locations`
--

CREATE TABLE `shipping_locations` (
  `id` bigint UNSIGNED NOT NULL,
  `location_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_location_translations`
--

CREATE TABLE `shipping_location_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `shipping_location_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `location_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `slider_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `url` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `slider_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slider_image_full_width` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slider_image_secondary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `text_alignment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `text_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_slug`, `type`, `category_id`, `url`, `slider_image`, `slider_image_full_width`, `slider_image_secondary`, `target`, `is_active`, `text_alignment`, `text_color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'enhance-your', 'category', 1, '', 'images/sliders/jlu9i1qZjW.png', 'images/sliders/full_width/oA4uLZZeuE.png', 'images/sliders/secondary/wM9SEstWIk.png', 'new_tab', '1', 'right', '#121111', '2022-02-13 03:46:32', '2022-03-25 18:24:18', NULL),
(2, 'the-world-largest', 'category', 4, '', 'images/sliders/brOf20e98c.png', 'images/sliders/full_width/J8U1UIjS1W.png', 'images/sliders/secondary/oTtWm7YAev.png', 'new_tab', '1', 'right', '#161515', '2022-02-21 15:49:20', '2022-03-25 18:25:18', NULL),
(3, 'কি-দোকান', 'category', 1, '', 'images/sliders/a9ozZNZ1Ha.jpg', 'images/sliders/full_width/iIcOXJOBns.jpg', 'images/sliders/secondary/guufhHiK0X.jpg', 'new_tab', '0', 'left', '#000000', '2022-02-21 15:51:04', '2022-08-28 04:46:46', NULL),
(4, 'test', 'category', 1, '', 'images/sliders/5EQfGBuEkE.png', NULL, 'images/sliders/secondary/JbZjhArYT3.png', '', '1', '', NULL, '2022-02-27 06:13:49', '2022-02-28 01:55:19', '2022-02-28 01:55:19'),
(5, 'trete', 'category', 5, NULL, 'images/sliders/WLKcgLn11h.jpg', NULL, 'images/sliders/secondary/T6nksvxqzO.jpg', 'same_tab', '1', 'left', NULL, '2022-02-27 07:35:16', '2022-02-28 01:55:12', '2022-02-28 01:55:12'),
(6, 'test-45', 'category', 1, '', 'images/sliders/UzBuaHYyvq.jpg', NULL, 'images/sliders/secondary/LlzSkmMfJP.jpg', 'same_tab', '1', 'left', '#00ff40', '2022-02-28 02:31:23', '2022-03-02 22:48:06', '2022-03-02 22:48:06'),
(7, 'test-95', 'category', 1, '', 'images/sliders/CPIZVQRoAM.png', 'images/sliders/full_width/ogPX8xKtVc.png', 'images/sliders/secondary/JOFGfvijsb.png', '', '1', 'left', '#333333', '2022-07-21 09:36:51', '2022-08-04 10:01:05', '2022-08-04 10:01:05'),
(9, 'test-56', 'category', 35, '', 'images/sliders/wK54xAdzpD.png', 'images/sliders/full_width/9WvFyygIvi.png', 'images/sliders/secondary/vW9GEmg3aG.png', '', '1', '', '#333333', '2022-07-28 08:57:30', '2022-07-28 14:03:25', '2022-07-28 14:03:25'),
(10, 'test-33', 'category', 35, NULL, 'images/sliders/i6WyLq0us1.webp', 'images/sliders/full_width/1nOOpw4v8i.webp', 'images/sliders/secondary/NoG08IpePb.webp', 'same_tab', '1', 'right', '#333333', '2022-07-28 11:57:52', '2022-07-28 13:37:27', '2022-07-28 13:37:27'),
(11, 'fahim-123554', 'category', 1, '', 'images/sliders/0JeRXSWYRf.png', 'images/sliders/full_width/GT01yUl6tJ.png', 'images/sliders/secondary/hmVCwWtiCx.png', '', '1', '', '#333333', '2022-07-28 12:25:41', '2022-07-28 13:59:14', '2022-07-28 13:59:14'),
(12, 'hhfghfh', 'category', 40, NULL, 'images/sliders/eCCVzXbjm9.png', 'images/sliders/full_width/KPBJ4O59VD.png', 'images/sliders/secondary/kZcRUCWAYz.png', 'same_tab', '1', '', '#333333', '2022-07-28 14:05:50', '2022-07-28 14:06:05', '2022-07-28 14:06:05'),
(13, 'test-9465', 'category', 40, NULL, 'images/sliders/rDeneljmQm.png', 'images/sliders/full_width/PxD7dxwhmR.png', 'images/sliders/secondary/FGClhTq8Qv.png', '', '1', '', '#333333', '2022-07-28 14:15:37', '2022-07-28 14:21:19', '2022-07-28 14:21:19'),
(14, 'dfgdfgf', 'category', 39, NULL, 'images/sliders/5Ad5TY9sdu.png', 'images/sliders/full_width/RmOpZunX0x.png', 'images/sliders/secondary/3LuujInYGx.png', '', '1', '', '#333', '2022-07-28 14:15:51', '2022-07-28 14:21:19', '2022-07-28 14:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `slider_translations`
--

CREATE TABLE `slider_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `slider_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slider_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slider_subtitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider_translations`
--

INSERT INTO `slider_translations` (`id`, `slider_id`, `locale`, `slider_title`, `slider_subtitle`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Enhance Your', 'Entertainment', '2022-02-13 03:46:32', '2022-02-21 15:45:38', NULL),
(2, 2, 'en', 'The world largest', 'Online Store', '2022-02-21 15:49:20', '2022-02-21 15:49:20', NULL),
(3, 3, 'en', 'Shop What', 'You Desire', '2022-02-21 15:51:04', '2022-04-11 12:58:26', NULL),
(4, 4, 'en', 'Test', 'Test 2', '2022-02-27 06:13:49', '2022-02-27 06:13:49', NULL),
(5, 5, 'en', 'trete', 'tert', '2022-02-27 07:35:16', '2022-02-27 07:35:16', NULL),
(6, 6, 'en', 'Test 45', 'testbb', '2022-02-28 02:31:23', '2022-02-28 02:31:23', NULL),
(7, 3, 'de', 'Einkaufen was', 'Sie wünschen', '2022-03-09 04:08:12', '2022-03-09 04:08:12', NULL),
(8, 2, 'de', 'Die weltweit größte', 'Online-Shop', '2022-03-09 04:09:02', '2022-03-09 04:09:02', NULL),
(9, 1, 'de', 'Verbessern Sie Ihre', 'Unterhaltung', '2022-03-09 04:09:24', '2022-03-09 04:09:24', NULL),
(10, 3, 'es', 'comprar qué', 'tu deseo', '2022-03-09 04:10:08', '2022-03-09 04:10:08', NULL),
(11, 2, 'es', 'el mundo mas grande', 'Tienda en línea', '2022-03-09 04:10:31', '2022-03-09 04:10:31', NULL),
(12, 1, 'es', 'Mejore su', 'Entretenimiento', '2022-03-09 04:10:52', '2022-03-09 04:10:52', NULL),
(13, 3, 'bn', 'কি দোকান', 'তোমার আকাঙ্খা', '2022-03-09 04:11:29', '2022-03-09 04:11:29', NULL),
(14, 2, 'bn', 'বিশ্বের বৃহত্তম', 'অনলাইন দোকান', '2022-03-09 04:11:55', '2022-03-09 04:11:55', NULL),
(15, 1, 'bn', 'আপনার উন্নত', 'বিনোদন', '2022-03-09 04:12:15', '2022-03-09 04:12:15', NULL),
(16, 7, 'en', 'Test 95', 'Test 95', '2022-07-21 09:36:51', '2022-08-04 10:01:05', '2022-08-04 10:01:05'),
(18, 9, 'en', 'Test 56', 'sdfsd', '2022-07-28 08:57:30', '2022-07-28 14:03:25', '2022-07-28 14:03:25'),
(19, 10, 'en', 'test 33', 'ffsd', '2022-07-28 11:57:52', '2022-07-28 13:37:27', '2022-07-28 13:37:27'),
(20, 11, 'en', 'Fahim 123554', 'sfdsf', '2022-07-28 12:25:41', '2022-07-28 13:59:14', '2022-07-28 13:59:14'),
(21, 12, 'en', 'hhfghfh', 'fhfhg', '2022-07-28 14:05:50', '2022-07-28 14:06:05', '2022-07-28 14:06:05'),
(22, 13, 'en', 'Test 9465', 'ggdgdf', '2022-07-28 14:15:37', '2022-07-28 14:21:19', '2022-07-28 14:21:19'),
(23, 14, 'en', 'dfgdfgf', 'gdfgfdg', '2022-07-28 14:15:51', '2022-07-28 14:21:19', '2022-07-28 14:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `storefront_images`
--

CREATE TABLE `storefront_images` (
  `id` bigint UNSIGNED NOT NULL,
  `setting_id` bigint DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `storefront_images`
--

INSERT INTO `storefront_images` (`id`, `setting_id`, `title`, `type`, `image`, `created_at`, `updated_at`) VALUES
(1, NULL, 'favicon_logo', 'logo', '/images/storefront/logo/7GEBNYRRhp.png', '2022-02-21 15:02:46', '2022-02-21 15:02:46'),
(2, NULL, 'header_logo', 'logo', '/images/storefront/logo/0dhZQlZtZI.png', '2022-02-21 15:07:32', '2022-09-15 05:16:27'),
(3, 42, 'slider_banner_1', 'slider_banner', '/images/storefront/slider_banners/e9OGBqHFpA.jpg', '2022-02-21 15:22:35', '2022-03-19 23:05:38'),
(4, 45, 'slider_banner_2', 'slider_banner', '/images/storefront/slider_banners/SNIWak7D4E.jpg', '2022-02-21 15:32:03', '2022-03-19 23:05:38'),
(5, 127, 'slider_banner_3', 'slider_banner', '/images/storefront/slider_banners/Kqyy8ifW7g.webp', '2022-02-21 15:34:27', '2022-02-21 15:34:27'),
(6, NULL, 'three_column_full_width_banners_image_1', 'three_column_full_width_banners', '/images/storefront/three_column_full_width_banners/0fDYh0O2sH.jpg', '2022-02-25 11:06:18', '2022-04-21 14:33:20'),
(7, NULL, 'three_column_full_width_banners_image_2', 'three_column_full_width_banners', '/images/storefront/three_column_full_width_banners/wpqwCT51dE.jpg', '2022-02-25 11:06:18', '2022-04-21 14:43:35'),
(8, NULL, 'three_column_full_width_banners_image_3', 'three_column_full_width_banners', '/images/storefront/three_column_full_width_banners/lIG8AmDGIw.jpg', '2022-02-25 11:06:19', '2022-04-21 14:43:35'),
(9, NULL, 'three_column_banners_image_1', 'three_column_banners', '/images/storefront/three_column_banners/KwDSqzhqz3.jpg', '2022-02-25 11:20:47', '2022-04-21 14:56:06'),
(10, NULL, 'three_column_banners_image_2', 'three_column_banners', '/images/storefront/three_column_banners/6HWaOUWgE5.jpg', '2022-02-25 11:20:47', '2022-04-21 14:56:06'),
(11, NULL, 'three_column_banners_image_3', 'three_column_banners', '/images/storefront/three_column_banners/ktkRVQQJ7p.jpg', '2022-02-25 11:20:47', '2022-04-21 14:56:06'),
(12, NULL, 'two_column_banner_image_1', 'two_column_banners', '/images/storefront/two_column_banners/zc5h2j78sh.jpg', '2022-02-25 11:26:30', '2022-04-21 15:01:57'),
(13, NULL, 'two_column_banner_image_2', 'two_column_banners', '/images/storefront/two_column_banners/fQoQH0bnJA.jpg', '2022-02-25 11:26:30', '2022-04-21 15:01:58'),
(14, NULL, 'one_column_banner_image', 'one_column_banner', '/images/storefront/one_column_banner/mUtqvXDPZG.jpg', '2022-02-25 11:27:55', '2022-04-21 15:05:11'),
(15, NULL, 'accepted_payment_method_image', 'payment_method', '/images/storefront/payment_method/zQt1rHnU8L.jpg', '2022-02-25 11:31:33', '2022-04-21 12:51:16'),
(16, NULL, 'newsletter_background_image', 'newletter', '/images/storefront/newsletter/newslatter.jpg', '2022-02-25 11:54:03', '2022-03-20 03:03:46'),
(17, NULL, 'topbar_logo', 'logo', '/images/storefront/logo/Hu3IDzXoRU.gif', '2022-03-21 02:56:07', '2022-04-21 11:46:56'),
(18, NULL, 'three_column_full_width_banners_background_image', 'three_column_full_width_banners', '/images/storefront/three_column_full_width_banners/c4Tn6lGaJc.jpg', '2022-04-17 14:47:47', '2022-04-17 15:14:50'),
(19, NULL, 'mail_logo', 'logo', '/images/storefront/logo/QUOGAiriXD.png', '2022-04-21 11:52:08', '2022-09-25 04:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `slug`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'smartphone', 1, '2022-02-25 11:58:31', '2022-03-19 03:09:05', NULL),
(2, 'android', 1, '2022-02-25 11:58:40', '2022-03-19 03:08:56', NULL),
(3, 'আইফোন', 1, '2022-02-25 11:58:49', '2022-03-02 07:43:05', NULL),
(4, 'ল্যাপটপ', 1, '2022-02-25 11:59:11', '2022-03-02 07:42:58', NULL),
(5, 'ডেস্কটপ', 1, '2022-02-25 11:59:18', '2022-03-02 07:42:49', NULL),
(6, 'এইচডি-টিভি', 1, '2022-02-25 11:59:39', '2022-03-02 07:42:40', NULL),
(7, 'headphone', 1, '2022-02-25 11:59:51', '2022-05-08 10:10:49', NULL),
(13, 'test', 1, '2022-06-18 15:27:24', '2022-06-20 05:14:24', '2022-06-20 05:14:24'),
(14, 'test-2', 1, '2022-06-19 17:06:58', '2022-06-20 05:14:24', '2022-06-20 05:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `tag_translations`
--

CREATE TABLE `tag_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `local` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tag_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag_translations`
--

INSERT INTO `tag_translations` (`id`, `tag_id`, `local`, `tag_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Smartphone', '2022-02-25 11:58:31', '2022-02-25 11:58:31', NULL),
(2, 2, 'en', 'Android', '2022-02-25 11:58:40', '2022-02-25 11:58:40', NULL),
(3, 3, 'en', 'iPhone', '2022-02-25 11:58:49', '2022-02-25 11:58:49', NULL),
(4, 4, 'en', 'Laptop', '2022-02-25 11:59:11', '2022-02-25 11:59:11', NULL),
(5, 5, 'en', 'Desktop', '2022-02-25 11:59:18', '2022-02-25 11:59:18', NULL),
(6, 6, 'en', 'HD TV', '2022-02-25 11:59:39', '2022-02-25 11:59:39', NULL),
(7, 7, 'en', 'Headphone', '2022-02-25 11:59:51', '2022-02-25 11:59:51', NULL),
(8, 7, 'de', 'Kopfhörer', NULL, NULL, NULL),
(9, 6, 'de', 'HD-Fernseher', NULL, NULL, NULL),
(10, 5, 'de', 'Schreibtisch', NULL, NULL, NULL),
(11, 4, 'de', 'Laptop', NULL, NULL, NULL),
(12, 7, 'es', 'Auricular', NULL, NULL, NULL),
(13, 6, 'es', 'televisión de alta definición', NULL, NULL, NULL),
(14, 5, 'es', 'Escritorio', NULL, NULL, NULL),
(15, 7, 'bn', 'হেডফোন', NULL, NULL, NULL),
(16, 6, 'bn', 'এইচডি টিভি', NULL, NULL, NULL),
(17, 5, 'bn', 'ডেস্কটপ', NULL, NULL, NULL),
(18, 4, 'bn', 'ল্যাপটপ', NULL, NULL, NULL),
(19, 3, 'bn', 'আইফোন', NULL, NULL, NULL),
(20, 2, 'bn', 'অ্যান্ড্রয়েড', NULL, NULL, NULL),
(21, 1, 'bn', 'স্মার্টফোন', NULL, NULL, NULL),
(25, 13, 'en', 'Test', '2022-06-18 15:27:24', '2022-06-20 05:14:24', '2022-06-20 05:14:24'),
(26, 13, 'bn', 'টেস্ট', NULL, '2022-06-20 05:14:24', '2022-06-20 05:14:24'),
(27, 14, 'en', 'Test 2', '2022-06-19 17:06:59', '2022-06-20 05:14:24', '2022-06-20 05:14:24'),
(28, 14, 'bn', 'টেস্ফদ', '2022-06-19 17:12:22', '2022-06-20 05:14:24', '2022-06-20 05:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `zip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rate` double NOT NULL,
  `based_on` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `country`, `zip`, `rate`, `based_on`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bangladesh', '4330', 10, 'shipping_address', '1', '2022-02-13 00:18:27', '2022-09-21 07:32:03', NULL),
(2, 'United States', '3424', 5, 'shipping_address', '1', '2022-09-21 04:42:05', '2022-09-21 07:32:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tax_translations`
--

CREATE TABLE `tax_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `tax_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tax_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tax_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tax_translations`
--

INSERT INTO `tax_translations` (`id`, `tax_id`, `locale`, `tax_class`, `tax_name`, `state`, `city`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'en', 'Bangladesh', 'BD Tax', 'Chittagong', 'Chittagong', '2022-02-13 00:18:27', '2022-03-09 03:49:29', NULL),
(2, 1, 'de', 'Bangladesch', 'BD-Steuer', 'Chittagong', 'Chittagong', '2022-03-09 03:37:44', '2022-03-09 03:44:26', NULL),
(3, 1, 'es', 'Bangladesh', 'BD Steuer', 'Chittagong', 'Chittagong', '2022-03-09 03:50:17', '2022-03-09 03:50:17', NULL),
(4, 1, 'bn', 'Bangladesh', 'বাংলাদেশ ট্যক্স', 'Chittagong', 'Chittagong', '2022-03-09 03:50:40', '2022-03-09 03:50:40', NULL),
(5, 2, 'en', 'Jewelry Tax', 'Jewelry Tax', 'New York', 'New York', '2022-09-21 04:42:05', '2022-09-21 04:42:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_type` tinyint DEFAULT NULL,
  `role` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_active` tinyint DEFAULT NULL,
  `porvider_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `phone`, `email`, `password`, `user_type`, `role`, `image`, `email_verified_at`, `remember_token`, `last_login_at`, `last_login_ip`, `is_active`, `porvider_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'Irfan', 'Chowdhury', '12313131', 'admin@gmail.com', '$2y$10$WcnC16AXG/mNrVBWQGjfoegFO.1wjiIiBv5LxEHR6uQaJYVciYCOa', 1, 1, 'images/admin/aNiJfKILIo.webp', NULL, 'fffxkyQ5hlVDKiOfpmQfmX7YaWNl0N32oD5z92ScpPeKhFThQfOt09pJGUxE', NULL, NULL, 1, NULL, '2020-12-13 14:35:51', '2022-06-15 10:43:29', NULL),
(49, 'irfan95', 'Harding', 'Delgado', '+1 (645) 533-9812', 'irfan95@mailinator.com', '$2y$10$OnJR5alYsjaGHcwRev67Bu1pWzZ2NdUSF0azAm/8QIgyQXBbglWNi', 1, 3, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-23 07:04:58', '2022-10-03 07:44:58', NULL),
(51, 'ivan_d', 'Ivan', 'D', '123456789', 'contact1@xmb24.com', '$2y$10$Ny.guCOjKSvmx4dV7AoTR.7dVIYUT375vuMYKypRRf8KHpgOXdJ6q', 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-05-17 15:42:00', '2022-10-03 07:33:35', '2022-10-03 07:33:35'),
(52, 'Juhair_Vai', NULL, NULL, NULL, 'juhair@gmail.com', '$2y$10$qHv0x5ey5vJbFiGzXxlDiOlLkj3T5QYj58MVgtE.uVIai1OtmZJGG', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-15 04:37:12', '2022-10-03 07:33:45', '2022-10-03 07:33:45'),
(53, 'test88', 'dasasdasad', 'ddasa', '53455354', 'isa@cazasouq.com', '$2y$10$CnSkPGqOqdwWxVle.hk4oepcjy9nWR3FG5xPlhlLcGTiz65N6hUCm', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-23 09:33:32', '2022-10-03 07:34:38', '2022-10-03 07:34:38'),
(54, 'test987', NULL, NULL, NULL, 'test987@gmail.com', '$2y$10$kqEL6.rzTpU.8o8sD0W./e8X0n.vzUvjbtSaWSiEf.U1XU7FRt0QG', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-08-03 06:25:27', '2022-10-03 08:13:28', '2022-10-03 08:13:28'),
(55, 'gdfgf', 'dfgdfg', 'gdfgdfg', '53453543', 'irfanchowdhury434@gmail.com', '$2y$10$CePvJd0VFNRhIHwKZWiaQ.AWJZZ5zoEAI7PT3zoCBcVmEyPsbVEHq', 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-10-03 07:35:21', '2022-10-03 08:13:28', '2022-10-03 08:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_billing_addresses`
--

CREATE TABLE `user_billing_addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zip_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_billing_addresses`
--

INSERT INTO `user_billing_addresses` (`id`, `user_id`, `country`, `address_1`, `address_2`, `city`, `state`, `zip_code`, `is_default`, `created_at`, `updated_at`) VALUES
(3, 1, 'Ukraine', '46 West Milton Parkwayalert(‘XSS’)', 'alert(‘XSS’)', 'Cillum ut quo corrupalert(‘XSS’)', 'Explicabo Maxime idalert(‘XSS’)', '52463alert(‘XSS’)', 0, '2022-03-14 12:09:38', '2022-04-04 16:16:55'),
(4, 1, 'Guadeloupe', '96 Second Road', 'Sint laboris quisqua', 'Illum voluptate omn', 'Quis ut obcaecati ma', '51776', 0, '2022-03-14 12:10:04', '2022-04-04 16:16:55'),
(7, 1, 'Bangladesh', '21 South White Clarendon Road', 'Dolorem ut et debiti', 'Adipisicing vero seq', 'Aperiam totam except', '4330', 0, '2022-03-14 19:28:10', '2022-04-04 16:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_shipping_addresses`
--

CREATE TABLE `user_shipping_addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zip_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_shipping_addresses`
--

INSERT INTO `user_shipping_addresses` (`id`, `user_id`, `country`, `address_1`, `address_2`, `city`, `state`, `zip_code`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 1, 'Togo', '54 East Old Road', 'Recusandae Est aliq', 'Cum optio eiusmod e', 'Vero in voluptatibus', '36244', 0, '2022-03-14 20:10:24', '2022-03-14 20:12:57'),
(2, 1, 'Heard and Mc Donald Islands', '97 First Street', 'Atque doloremque et', 'Omnis culpa occaeca', 'Quaerat dolores eius', '75508', 1, '2022-03-14 20:12:40', '2022-03-14 20:12:57'),
(3, 1, 'Mongolia', '86 East Old Boulevard', 'Porro do et dignissi', 'Excepturi est tempor', 'Maiores voluptatum n', '66836', 0, '2022-03-14 20:12:49', '2022-03-14 20:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attributes_attribute_set_id_foreign` (`attribute_set_id`);

--
-- Indexes for table `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD KEY `attribute_category_attribute_id_foreign` (`attribute_id`),
  ADD KEY `attribute_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `attribute_sets`
--
ALTER TABLE `attribute_sets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_set_translations`
--
ALTER TABLE `attribute_set_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_set_translations_attribute_set_id_foreign` (`attribute_set_id`);

--
-- Indexes for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_translations_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `attribute_value_translations`
--
ALTER TABLE `attribute_value_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_value_translations_attribute_id_foreign` (`attribute_id`),
  ADD KEY `attribute_value_translations_attribute_value_id_foreign` (`attribute_value_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_translations`
--
ALTER TABLE `brand_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_translations_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD KEY `category_product_category_id_foreign` (`category_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_translations_category_id_foreign` (`category_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_categories`
--
ALTER TABLE `coupon_categories`
  ADD KEY `coupon_categories_coupon_id_foreign` (`coupon_id`),
  ADD KEY `coupon_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `coupon_products`
--
ALTER TABLE `coupon_products`
  ADD KEY `coupon_products_coupon_id_foreign` (`coupon_id`),
  ADD KEY `coupon_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `coupon_translations`
--
ALTER TABLE `coupon_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_translations_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_rates`
--
ALTER TABLE `currency_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_username_unique` (`username`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_translations`
--
ALTER TABLE `faq_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_types`
--
ALTER TABLE `faq_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_type_translations`
--
ALTER TABLE `faq_type_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_sales`
--
ALTER TABLE `flash_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flash_sale_products_flash_sale_id_foreign` (`flash_sale_id`),
  ADD KEY `flash_sale_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `flash_sale_translations`
--
ALTER TABLE `flash_sale_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flash_sale_translations_flash_sale_id_foreign` (`flash_sale_id`);

--
-- Indexes for table `footer_descriptions`
--
ALTER TABLE `footer_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keyword_hits`
--
ALTER TABLE `keyword_hits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_language_name_unique` (`language_name`),
  ADD UNIQUE KEY `languages_local_unique` (`local`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_foreign` (`menu`);

--
-- Indexes for table `menu_translations`
--
ALTER TABLE `menu_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_translations_page_id_foreign` (`page_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`(191),`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_attribute_value`
--
ALTER TABLE `product_attribute_value`
  ADD KEY `product_attribute_value_product_id_foreign` (`product_id`),
  ADD KEY `product_attribute_value_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD KEY `product_tag_product_id_foreign` (`product_id`),
  ADD KEY `product_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_translations_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `searchterms`
--
ALTER TABLE `searchterms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_about_us`
--
ALTER TABLE `setting_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_about_us_translations`
--
ALTER TABLE `setting_about_us_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_bank_transfers`
--
ALTER TABLE `setting_bank_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_cash_on_deliveries`
--
ALTER TABLE `setting_cash_on_deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_check_money_orders`
--
ALTER TABLE `setting_check_money_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_currencies`
--
ALTER TABLE `setting_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_custom_css_jsses`
--
ALTER TABLE `setting_custom_css_jsses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_facebooks`
--
ALTER TABLE `setting_facebooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_flat_rates`
--
ALTER TABLE `setting_flat_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_free_shippings`
--
ALTER TABLE `setting_free_shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_generals`
--
ALTER TABLE `setting_generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_googles`
--
ALTER TABLE `setting_googles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_home_page_seos`
--
ALTER TABLE `setting_home_page_seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_home_page_seo_translations`
--
ALTER TABLE `setting_home_page_seo_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_local_pickups`
--
ALTER TABLE `setting_local_pickups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_mails`
--
ALTER TABLE `setting_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_newsletters`
--
ALTER TABLE `setting_newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_paypals`
--
ALTER TABLE `setting_paypals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_paytms`
--
ALTER TABLE `setting_paytms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_sms`
--
ALTER TABLE `setting_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_stores`
--
ALTER TABLE `setting_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_strips`
--
ALTER TABLE `setting_strips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_translations_setting_id_foreign` (`setting_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_locations`
--
ALTER TABLE `shipping_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_location_translations`
--
ALTER TABLE `shipping_location_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_location_translations_shipping_location_id_foreign` (`shipping_location_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_category_id_foreign` (`category_id`);

--
-- Indexes for table `slider_translations`
--
ALTER TABLE `slider_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_translations_slider_id_foreign` (`slider_id`);

--
-- Indexes for table `storefront_images`
--
ALTER TABLE `storefront_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_translations_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_translations`
--
ALTER TABLE `tax_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tax_translations_tax_id_foreign` (`tax_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_billing_addresses`
--
ALTER TABLE `user_billing_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_billing_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_shipping_addresses`
--
ALTER TABLE `user_shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_shipping_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `attribute_sets`
--
ALTER TABLE `attribute_sets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `attribute_set_translations`
--
ALTER TABLE `attribute_set_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `attribute_value_translations`
--
ALTER TABLE `attribute_value_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brand_translations`
--
ALTER TABLE `brand_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `coupon_translations`
--
ALTER TABLE `coupon_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `currency_rates`
--
ALTER TABLE `currency_rates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faq_translations`
--
ALTER TABLE `faq_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faq_types`
--
ALTER TABLE `faq_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faq_type_translations`
--
ALTER TABLE `faq_type_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `flash_sales`
--
ALTER TABLE `flash_sales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `flash_sale_translations`
--
ALTER TABLE `flash_sale_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `footer_descriptions`
--
ALTER TABLE `footer_descriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keyword_hits`
--
ALTER TABLE `keyword_hits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `menu_translations`
--
ALTER TABLE `menu_translations`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `searchterms`
--
ALTER TABLE `searchterms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `setting_about_us`
--
ALTER TABLE `setting_about_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_about_us_translations`
--
ALTER TABLE `setting_about_us_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_bank_transfers`
--
ALTER TABLE `setting_bank_transfers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_cash_on_deliveries`
--
ALTER TABLE `setting_cash_on_deliveries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_check_money_orders`
--
ALTER TABLE `setting_check_money_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_currencies`
--
ALTER TABLE `setting_currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_custom_css_jsses`
--
ALTER TABLE `setting_custom_css_jsses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_facebooks`
--
ALTER TABLE `setting_facebooks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_flat_rates`
--
ALTER TABLE `setting_flat_rates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_free_shippings`
--
ALTER TABLE `setting_free_shippings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_generals`
--
ALTER TABLE `setting_generals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_googles`
--
ALTER TABLE `setting_googles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_home_page_seos`
--
ALTER TABLE `setting_home_page_seos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_home_page_seo_translations`
--
ALTER TABLE `setting_home_page_seo_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting_local_pickups`
--
ALTER TABLE `setting_local_pickups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_mails`
--
ALTER TABLE `setting_mails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_newsletters`
--
ALTER TABLE `setting_newsletters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_paypals`
--
ALTER TABLE `setting_paypals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_paytms`
--
ALTER TABLE `setting_paytms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_sms`
--
ALTER TABLE `setting_sms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_stores`
--
ALTER TABLE `setting_stores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_strips`
--
ALTER TABLE `setting_strips`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping_locations`
--
ALTER TABLE `shipping_locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_location_translations`
--
ALTER TABLE `shipping_location_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `slider_translations`
--
ALTER TABLE `slider_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `storefront_images`
--
ALTER TABLE `storefront_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tax_translations`
--
ALTER TABLE `tax_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user_billing_addresses`
--
ALTER TABLE `user_billing_addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_shipping_addresses`
--
ALTER TABLE `user_shipping_addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `attributes_attribute_set_id_foreign` FOREIGN KEY (`attribute_set_id`) REFERENCES `attribute_sets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_set_translations`
--
ALTER TABLE `attribute_set_translations`
  ADD CONSTRAINT `attribute_set_translations_attribute_set_id_foreign` FOREIGN KEY (`attribute_set_id`) REFERENCES `attribute_sets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD CONSTRAINT `attribute_translations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_value_translations`
--
ALTER TABLE `attribute_value_translations`
  ADD CONSTRAINT `attribute_value_translations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_value_translations_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_values` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `brand_translations`
--
ALTER TABLE `brand_translations`
  ADD CONSTRAINT `brand_translations_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `shipping_location_translations`
--
ALTER TABLE `shipping_location_translations`
  ADD CONSTRAINT `shipping_location_translations_shipping_location_id_foreign` FOREIGN KEY (`shipping_location_id`) REFERENCES `shipping_locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_billing_addresses`
--
ALTER TABLE `user_billing_addresses`
  ADD CONSTRAINT `user_billing_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_shipping_addresses`
--
ALTER TABLE `user_shipping_addresses`
  ADD CONSTRAINT `user_shipping_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
