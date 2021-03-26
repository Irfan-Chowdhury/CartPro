-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 08:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elevani_working`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_set_id` bigint(20) UNSIGNED NOT NULL,
  `is_filterable` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `slug`, `attribute_set_id`, `is_filterable`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'size', 5, 1, 1, '2021-03-16 11:50:23', '2021-03-24 11:16:50'),
(3, 'color', 5, 0, 1, '2021-03-16 12:59:53', '2021-03-24 11:16:46'),
(20, 'ram', 7, 1, 1, '2021-03-17 03:35:22', '2021-03-25 12:58:37'),
(23, 'monitor', 7, 0, 1, '2021-03-17 03:40:07', '2021-03-25 13:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_category`
--

CREATE TABLE `attribute_category` (
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_category`
--

INSERT INTO `attribute_category` (`attribute_id`, `category_id`) VALUES
(23, 9),
(23, 10),
(3, 3),
(3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_sets`
--

CREATE TABLE `attribute_sets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_sets`
--

INSERT INTO `attribute_sets` (`id`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 1, '2021-03-15 08:45:29', '2021-03-25 13:17:11'),
(6, 1, '2021-03-15 08:45:46', '2021-03-25 13:17:14'),
(7, 1, '2021-03-15 08:46:27', '2021-03-25 13:17:09'),
(8, 1, '2021-03-15 08:46:43', '2021-03-25 13:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_set_translations`
--

CREATE TABLE `attribute_set_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_set_id` bigint(20) UNSIGNED NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_set_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_set_translations`
--

INSERT INTO `attribute_set_translations` (`id`, `attribute_set_id`, `local`, `attribute_set_name`, `created_at`, `updated_at`) VALUES
(5, 5, 'en', 'Specification', '2021-03-15 08:45:29', '2021-03-15 08:45:29'),
(6, 6, 'en', 'Camera', '2021-03-15 08:45:46', '2021-03-15 08:45:46'),
(7, 7, 'en', 'Hardware', '2021-03-15 08:46:27', '2021-03-15 08:46:27'),
(8, 8, 'en', 'Drone Specifications', '2021-03-15 08:46:43', '2021-03-15 08:46:43'),
(9, 5, 'bn', 'স্পেসিফিকেশন', NULL, NULL),
(10, 5, 'hi', 'विनिर्देश', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_translations`
--

CREATE TABLE `attribute_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_translations`
--

INSERT INTO `attribute_translations` (`id`, `attribute_id`, `local`, `attribute_name`, `created_at`, `updated_at`) VALUES
(2, 2, 'en', 'Size', '2021-03-16 11:50:23', '2021-03-16 11:50:23'),
(3, 2, 'bn', 'সাইজ', NULL, NULL),
(4, 3, 'en', 'Color', '2021-03-16 12:59:53', '2021-03-16 12:59:53'),
(5, 2, 'hi', 'आकार', NULL, NULL),
(22, 20, 'en', 'Ram', '2021-03-17 03:35:22', '2021-03-17 03:35:22'),
(25, 23, 'en', 'Monitor', '2021-03-17 03:40:07', '2021-03-17 03:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `position`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, '2021-03-16 11:50:23', '2021-03-16 11:50:23'),
(3, 2, NULL, '2021-03-16 11:50:23', '2021-03-16 11:50:23'),
(4, 2, NULL, '2021-03-16 11:50:23', '2021-03-16 11:50:23'),
(5, 2, NULL, '2021-03-16 11:50:23', '2021-03-16 11:50:23'),
(7, 2, NULL, '2021-03-16 15:43:13', '2021-03-16 15:43:13'),
(21, 20, NULL, '2021-03-17 03:35:22', '2021-03-17 03:35:22'),
(22, 20, NULL, '2021-03-17 03:35:23', '2021-03-17 03:35:23'),
(23, 20, NULL, '2021-03-17 03:37:00', '2021-03-17 03:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value_translations`
--

CREATE TABLE `attribute_value_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_value_id` bigint(20) UNSIGNED NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_value_translations`
--

INSERT INTO `attribute_value_translations` (`id`, `attribute_id`, `attribute_value_id`, `local`, `value_name`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'en', 'S', '2021-03-16 11:50:23', '2021-03-16 14:57:06'),
(2, 2, 3, 'en', 'L', '2021-03-16 11:50:23', '2021-03-16 14:57:06'),
(3, 2, 4, 'en', 'X', '2021-03-16 11:50:23', '2021-03-16 14:57:06'),
(4, 2, 5, 'en', 'XXL', '2021-03-16 11:50:23', '2021-03-16 14:57:06'),
(6, 2, 2, 'bn', 'এস', NULL, NULL),
(7, 2, 3, 'bn', 'এল', NULL, NULL),
(8, 2, 4, 'bn', 'এক্স এল', NULL, NULL),
(9, 2, 5, 'bn ', 'এক্স এক্স এল', NULL, NULL),
(10, 2, 2, 'hi', 'रों', NULL, NULL),
(11, 2, 3, 'hi', 'एल', NULL, NULL),
(12, 2, 4, 'hi', 'X', NULL, NULL),
(13, 2, 5, 'hi', 'XXL', NULL, NULL),
(14, 2, 7, 'en', 'M', '2021-03-16 15:43:14', '2021-03-16 15:43:14'),
(21, 20, 21, 'en', '2GB', '2021-03-17 03:35:23', '2021-03-17 03:35:23'),
(22, 20, 22, 'en', '4GB', '2021-03-17 03:35:23', '2021-03-17 03:35:23'),
(23, 20, 23, 'en', '6GB', '2021-03-17 03:37:00', '2021-03-17 03:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `slug`, `brand_logo`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'samsung', NULL, 1, '2021-02-21 13:26:44', '2021-02-21 13:26:44'),
(4, 'sony', NULL, 1, '2021-02-21 13:34:26', '2021-02-21 13:34:26'),
(7, 'ফল', NULL, 1, '2021-02-22 00:53:39', '2021-02-22 00:53:39'),
(8, 'লায়ন-কোডারস', NULL, 0, '2021-02-22 00:54:35', '2021-02-22 00:54:35'),
(11, 'Panasonic', NULL, 1, '2021-03-01 23:51:20', '2021-03-01 23:51:20'),
(14, 'Otobi', NULL, 1, '2021-03-02 02:00:46', '2021-03-02 02:00:46'),
(16, 'ফল', NULL, 1, '2021-03-02 02:42:37', '2021-03-02 02:42:37'),
(19, 'Natural', NULL, 1, '2021-03-02 02:47:06', '2021-03-02 02:47:06'),
(20, 'gkkhkg', NULL, 1, '2021-03-02 03:44:49', '2021-03-02 03:44:49'),
(21, 'hello', NULL, 1, '2021-03-02 03:45:09', '2021-03-02 03:45:09'),
(22, 'pineapple', NULL, 1, '2021-03-02 03:51:16', '2021-03-02 03:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `brand_translations`
--

CREATE TABLE `brand_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_translations`
--

INSERT INTO `brand_translations` (`id`, `brand_id`, `local`, `brand_name`, `created_at`, `updated_at`) VALUES
(2, 2, 'en', 'Samsung', '2021-02-21 13:26:44', '2021-02-21 13:26:44'),
(5, 4, 'en', 'Sony', '2021-02-21 13:34:26', '2021-02-21 13:34:26'),
(6, 4, 'bn', 'সনি', NULL, NULL),
(9, 7, 'bn', 'ফল', '2021-02-22 00:53:39', '2021-02-22 00:53:39'),
(10, 8, 'bn', 'লায়ন কোডারস', '2021-02-22 00:54:35', '2021-02-22 00:54:35'),
(13, 11, 'en', 'Panasonic', '2021-03-01 23:51:21', '2021-03-01 23:51:21'),
(16, 14, 'en', 'Otobi', '2021-03-02 02:00:47', '2021-03-02 02:00:47'),
(18, 16, 'en', 'ফল', '2021-03-02 02:42:38', '2021-03-02 02:42:38'),
(21, 19, 'en', 'Natural', '2021-03-02 02:47:06', '2021-03-02 02:47:06'),
(22, 20, 'en', 'gkkhkg', '2021-03-02 03:44:49', '2021-03-02 03:44:49'),
(23, 21, 'en', 'hello', '2021-03-02 03:45:09', '2021-03-02 03:45:09'),
(24, 22, 'en', 'pineapple', '2021-03-02 03:51:16', '2021-03-02 03:51:16'),
(25, 2, 'bn', 'Samsung', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_position` tinyint(4) DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` int(11) DEFAULT 0,
  `is_active` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `parent_id`, `description`, `description_position`, `image`, `featured`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'electronics', NULL, 'This is Electronics', 1, NULL, 1, 0, '2021-02-21 22:59:48', '2021-03-25 12:57:10'),
(3, 'clothes', NULL, 'This is Clothes', 0, NULL, 1, 1, '2021-02-21 23:39:24', '2021-03-20 04:01:53'),
(9, 'Computer', 2, 'This is Computer', 1, NULL, 1, 1, '2021-02-22 02:07:32', '2021-02-22 02:07:32'),
(10, 'laptop', 2, 'this is good', 1, NULL, 1, 1, NULL, '2021-03-25 12:53:20'),
(11, 'মিস্টি', NULL, 'test', 1, NULL, 1, 0, '2021-02-22 04:43:25', '2021-03-25 12:54:10'),
(12, 'men', 3, 'Men Collection', 1, NULL, 0, 0, '2021-03-20 03:51:04', '2021-03-25 12:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `local`, `category_name`, `created_at`, `updated_at`) VALUES
(2, 2, 'en', 'Electronics', '2021-02-21 22:59:48', '2021-02-21 22:59:48'),
(3, 3, 'en', 'Clothes', '2021-02-21 23:39:24', '2021-02-21 23:39:24'),
(11, 9, 'en', 'Computer', '2021-02-22 02:07:32', '2021-02-22 02:07:32'),
(12, 10, 'en', 'Laptop', NULL, NULL),
(13, 2, 'bn', 'ইলেক্ট্রনিক্স', NULL, NULL),
(14, 11, 'en', 'Sweet', '2021-02-22 04:43:25', '2021-02-22 04:43:25'),
(15, 3, 'bn', 'কাপড়', NULL, NULL),
(16, 10, 'bn', 'ল্যাপটপ', NULL, NULL),
(17, 9, 'bn', 'কম্পিউটার', NULL, NULL),
(18, 12, 'en', 'Men', '2021-03-20 03:51:04', '2021-03-20 03:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New Arrivals', 'new-arrivals', NULL, 1, '2020-12-19 13:59:39', '2020-12-19 13:59:39'),
(2, 'Shirts', 'shirts', NULL, 1, '2020-12-19 14:00:13', '2020-12-19 14:00:13'),
(3, 'Hoodies', 'hoodies', NULL, 1, '2020-12-19 14:01:34', '2020-12-19 14:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `min_limit` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `usage_limit` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_code`, `discount_type`, `discount_amount`, `min_limit`, `start_date`, `end_date`, `usage_limit`, `status`, `created_at`, `updated_at`) VALUES
(5, 'flat discount', '123456', '0', 111, 1000, '2020-11-11', '2020-11-30', 100, 0, '2020-11-03 03:22:02', '2020-11-03 05:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` double NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_ip` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `guest_customers`
--

CREATE TABLE `guest_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_adddress` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img_order` int(5) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `local`, `default`, `created_at`, `updated_at`) VALUES
(5, 'Hindi', 'hi', 0, '2021-02-19 10:07:25', '2021-02-22 04:43:52'),
(10, 'English', 'en', 0, '2021-02-19 10:23:59', '2021-03-03 13:37:45'),
(11, 'Bangla', 'bn', 1, '2021-02-19 10:24:49', '2021-03-03 13:37:46'),
(12, 'France', 'fr', 0, '2021-02-19 10:33:38', '2021-02-21 11:23:33'),
(15, 'Chinese', 'cn', 0, '2021-02-21 11:23:18', '2021-02-22 00:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Category Menu', 1, '2021-02-07 22:41:17', '2021-02-07 22:41:17'),
(2, 'Primary Menu', 1, '2021-02-07 23:49:30', '2021-02-07 23:49:30'),
(11, 'test', NULL, '2021-02-14 20:24:40', '2021-02-14 20:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fluid_menu` tinyint(4) DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `item_name`, `type`, `category_id`, `page_id`, `url`, `icon`, `fluid_menu`, `target`, `parent_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'test-1', 'category', 1, NULL, NULL, NULL, NULL, 'same_tab', NULL, 1, '2021-02-07 23:39:26', '2021-02-07 23:39:26'),
(2, 1, 'test-2', 'category', 1, NULL, NULL, NULL, NULL, 'new_tab', 1, 1, '2021-02-07 23:47:51', '2021-02-07 23:47:51'),
(6, 2, 'Social Site', 'url', NULL, NULL, '#', NULL, NULL, 'same_tab', NULL, 1, '2021-02-09 04:24:02', '2021-02-09 04:24:02'),
(7, 2, 'w3schools', 'url', NULL, NULL, 'https://www.w3schools.com/', NULL, NULL, 'new_tab', 6, 1, '2021-02-09 04:25:06', '2021-02-09 04:25:06'),
(8, 2, 'Facebook', 'url', NULL, NULL, 'https://www.facebook.com/', NULL, NULL, 'new_tab', 6, 1, '2021-02-09 04:26:33', '2021-02-09 04:26:33');

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
(4, '2020_10_20_093106_create_customers_table', 1),
(7, '2020_10_20_093250_create_coupons_table', 2),
(8, '2020_10_20_093315_create_pages_table', 2),
(9, '2020_10_20_093433_create_wishlists_table', 2),
(10, '2020_10_20_093537_create_products0_table', 2),
(11, '2020_10_20_093627_create_searchterms_table', 2),
(12, '2020_10_20_093705_create_guest_customers_table', 2),
(14, '2020_11_18_050854_create_settings_table', 4),
(15, '2016_06_01_000001_create_oauth_auth_codes_table', 5),
(16, '2016_06_01_000002_create_oauth_access_tokens_table', 5),
(17, '2016_06_01_000003_create_oauth_refresh_tokens_table', 5),
(18, '2016_06_01_000004_create_oauth_clients_table', 5),
(19, '2016_06_01_000005_create_oauth_personal_access_clients_table', 5),
(20, '2020_11_19_092036_create_orders_table', 6),
(21, '2020_11_19_092114_create_order_details_table', 7),
(22, '2020_11_19_092150_create_shipping_table', 8),
(23, '2020_12_13_160802_create_product_attributes0_table', 9),
(24, '2020_12_17_192938_create_collections_table', 10),
(25, '2021_01_02_103431_create_orders_table', 11),
(26, '2021_01_02_104544_create_ordered_products_table', 11),
(34, '2021_02_04_043043_create_navigations_table', 12),
(36, '2021_02_06_062335_create_sliders_table', 13),
(38, '2021_02_07_103825_create_menus_table', 14),
(41, '2021_02_07_104132_create_menu_items_table', 15),
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
(119, '2021_03_17_054122_create_attribute_category_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE `navigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `navigation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigations`
--

INSERT INTO `navigations` (`id`, `navigation_name`, `type`, `category_id`, `page_id`, `url`, `target`, `parent_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'page', NULL, 1, NULL, 'same_tab', NULL, '1', '2021-02-05 10:06:08', '2021-02-05 10:06:08'),
(4, 'Social Site', 'url', NULL, NULL, '#', 'new_tab', NULL, '1', '2021-02-05 10:53:32', '2021-02-05 10:53:32'),
(5, 'Facebook', 'url', NULL, NULL, 'https://www.facebook.com/', 'new_tab', 4, '1', '2021-02-05 11:19:34', '2021-02-05 11:19:34'),
(6, 'Youtube', 'url', NULL, NULL, 'https://www.youtube.com/', 'new_tab', 4, '1', '2021-02-05 12:23:28', '2021-02-05 12:23:28'),
(7, 'Newspaper', 'url', NULL, NULL, '#', 'new_tab', NULL, '1', '2021-02-05 12:24:34', '2021-02-05 12:24:34'),
(8, 'Prthom-Alo', 'url', NULL, NULL, 'https://www.prothomalo.com/', 'new_tab', 7, '1', '2021-02-05 12:26:06', '2021-02-05 12:26:06'),
(9, 'Dainik Azadi', 'url', NULL, NULL, 'https://dainikazadi.net/', 'new_tab', 7, '1', '2021-02-05 12:26:45', '2021-02-05 12:26:45'),
(13, 'Men\'s Fashion', 'category', 1, NULL, NULL, 'same_tab', NULL, '1', '2021-02-05 22:20:04', '2021-02-05 22:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordered_products`
--

INSERT INTO `ordered_products` (`id`, `order_id`, `sku`, `name`, `size`, `color`, `qty`, `unit_price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 'AI-LS-Bright White-074B', 'Big Check Cotton Flanel L.Sleeve Shirt', 'S', 'White', '1', 11.99, 11.99, '2021-01-02 06:19:46', '2021-01-02 06:19:46'),
(2, 1, 'AI-LS-Bright White-074A', 'Big Check Cotton Flanel L.Sleeve Shirt', 'M', 'White', '1', 11.99, 11.99, '2021-01-02 06:19:46', '2021-01-02 06:19:46'),
(3, 2, 'AI-LS-Bright White-074B', 'Big Check Cotton Flanel L.Sleeve Shirt', 'S', 'White', '1', 11.99, 11.99, '2021-01-06 02:49:34', '2021-01-06 02:49:34'),
(4, 2, 'AI-LS-Bright White-074A', 'Big Check Cotton Flanel L.Sleeve Shirt', 'M', 'White', '1', 11.99, 11.99, '2021-01-06 02:49:35', '2021-01-06 02:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_discount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `payment_id`, `user_id`, `customer_id`, `name`, `email`, `phone`, `ship_address`, `ship_city`, `ship_state`, `ship_postal_code`, `item`, `total_qty`, `total_price`, `coupon_id`, `coupon_discount`, `created_at`, `updated_at`) VALUES
(1, '0HT747007J422173W', NULL, NULL, 'John Doe', 'sb-1xqau4236979@business.example.com', NULL, '1 Main St', 'San Jose', 'CA', '95131', '2', '2', 23.98, NULL, NULL, '2021-01-02 06:19:46', '2021-01-02 06:19:46'),
(2, '13830408VG1150216', NULL, NULL, 'John Doe', 'sb-1xqau4236979@business.example.com', NULL, '1 Main St', 'San Jose', 'CA', '95131', '2', '2', 23.98, NULL, NULL, '2021-01-06 02:49:34', '2021-01-06 02:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `URL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `description`, `URL`, `meta_title`, `meta_description`, `og_title`, `og_image`, `og_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with the .sr-only class.', 'https://www.scribd.com/book/338062085/The-Keeper-of-Lost-Things-A-Novel', 'about-us', 'test', 'test', 'public/images/ivLJRT2Q.jpg', 'test', 1, '2020-11-03 23:55:57', '2021-02-04 02:50:16'),
(2, 'Amethyst Robinson', 'Asperiores aut omnis', 'Voluptatum quae dolo', 'Quaerat vero vel do', 'Id dolorum corporis', 'Iure nesciunt nemo', NULL, 'Nam nihil deserunt e', 1, '2021-02-05 09:17:30', '2021-02-05 09:17:30');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tax_class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `special_price` decimal(8,2) DEFAULT NULL,
  `special_price_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_price_start` date DEFAULT NULL,
  `special_price_end` date DEFAULT NULL,
  `selling_price` decimal(8,2) DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manage_stock` tinyint(4) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `in_stock` tinyint(4) DEFAULT NULL,
  `viewed` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `new_from` datetime DEFAULT NULL,
  `new_to` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `tax_class_id`, `slug`, `price`, `special_price`, `special_price_type`, `special_price_start`, `special_price_end`, `selling_price`, `sku`, `manage_stock`, `qty`, `in_stock`, `viewed`, `is_active`, `new_from`, `new_to`, `created_at`, `updated_at`) VALUES
(1, 11, NULL, 'irfan-fanmis-men\'s-luxury-analog-quartz-gold-wrist-watches', '500.00', '400.00', 'Fixed', '2001-12-05', '2020-05-03', '400.00', 'KUPLNI', 1, 30, 1, NULL, 1, '2015-05-03 00:00:00', '2021-03-20 00:00:00', '2021-03-18 09:42:21', '2021-03-19 13:03:02'),
(2, NULL, NULL, 'meolin-charm-creative-twisted-crystal-pendant-necklace-fashion-stylish', '15.00', NULL, 'Fixed', '1970-01-01', '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-03-18 10:32:52', '2021-03-25 13:24:04'),
(3, NULL, NULL, 'probook-430-g8-notebook-pc', '1000.00', '700.00', NULL, '1970-01-01', '1970-01-01', '700.00', NULL, 0, NULL, 0, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-03-18 10:45:56', '2021-03-25 13:23:59'),
(4, NULL, NULL, '6548probook-430-g8-notebook-pc', '1000.00', NULL, NULL, '1970-01-01', '1970-01-01', NULL, NULL, 0, NULL, 0, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-03-20 01:11:04', '2021-03-25 13:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `products0`
--

CREATE TABLE `products0` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `collection_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(255) NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `old_price` double DEFAULT NULL,
  `has_attribute` int(1) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products0`
--

INSERT INTO `products0` (`id`, `sku`, `image`, `product_name`, `slug`, `category_id`, `collection_id`, `brand_id`, `short_description`, `description`, `qty`, `tags`, `price`, `old_price`, `has_attribute`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AI-LS- Bright White-074', 'big-check-cotton-flanel-lsleeve-shirt0.jpg,big-check-cotton-flanel-lsleeve-shirt1.jpg,big-check-cotton-flanel-lsleeve-shirt2.jpg,big-check-cotton-flanel-lsleeve-shirt3.jpg,big-check-cotton-flanel-lsleeve-shirt4.jpg', 'Big Check Cotton Flanel L.Sleeve Shirt', 'big-check-cotton-flanel-lsleeve-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton Flannel &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 195, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 00:08:49', '2021-01-06 23:59:00'),
(2, 'AI-LS- Deep black-064', 'elevani-mens-long-sleeve-check-casual0.jpg,elevani-mens-long-sleeve-check-casual1.jpg,elevani-mens-long-sleeve-check-casual2.jpg,elevani-mens-long-sleeve-check-casual3.jpg', 'Elevani Mens Long Sleeve Check Casual', 'elevani-mens-long-sleeve-check-casual', 1, '2,2,2,2', 1, '', '', 996, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 00:17:22', '2020-12-31 12:16:21'),
(3, 'AI-LS- Lagulite-050', 'elevani-mens-long-sleeve-small-check-casual0.jpg,elevani-mens-long-sleeve-small-check-casual1.jpg,elevani-mens-long-sleeve-small-check-casual2.jpg,elevani-mens-long-sleeve-small-check-casual3.jpg', 'Elevani Mens Long Sleeve small Check Casual', 'elevani-mens-long-sleeve-small-check-casual', 1, '2', 1, '', '&lt;p&gt;&lt;br data-mce-bogus=&quot;1&quot;&gt;&lt;/p&gt;', 485, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 00:43:20', '2021-01-06 23:55:41'),
(4, 'AI-LS- Navy-023', 'elevani-mens-long-sleeve-cotton-flanel0.jpg,elevani-mens-long-sleeve-cotton-flanel1.jpg,elevani-mens-long-sleeve-cotton-flanel2.jpg,elevani-mens-long-sleeve-cotton-flanel3.jpg', 'Elevani Mens Long Sleeve Cotton Flanel', 'elevani-mens-long-sleeve-cotton-flanel', 1, '2,2,2,2', 1, '', '', 360, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 00:51:50', '2020-12-31 12:23:36'),
(5, 'AI-LS- Red Dark-097', 'elevani-mens-long-sleeve-classic-corduroy0.jpg,elevani-mens-long-sleeve-classic-corduroy1.jpg,elevani-mens-long-sleeve-classic-corduroy2.jpg,elevani-mens-long-sleeve-classic-corduroy3.jpg,elevani-mens-long-sleeve-classic-corduroy4.jpg', 'Elevani Mens Long Sleeve Classic Corduroy', 'elevani-mens-long-sleeve-classic-corduroy', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Imported &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton Corduroy &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 586, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 00:55:37', '2021-01-07 00:05:43'),
(6, 'Ai-LS-Black Print-036', 'elevani-mens-long-sleeve-printed-casual0.jpg,elevani-mens-long-sleeve-printed-casual1.jpg,elevani-mens-long-sleeve-printed-casual2.jpg,elevani-mens-long-sleeve-printed-casual3.jpg', 'Elevani Mens Long Sleeve Printed Casual', 'elevani-mens-long-sleeve-printed-casual', 1, '2', 1, '', '', 429, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 01:05:19', '2021-01-07 00:08:00'),
(7, 'AI-LS-Blue Combo-002', 'elevani-mens-l-sleeve-checck-shirt0.jpg,elevani-mens-l-sleeve-checck-shirt1.jpg,elevani-mens-l-sleeve-checck-shirt2.jpg,elevani-mens-l-sleeve-checck-shirt3.jpg,elevani-mens-l-sleeve-checck-shirt4.jpg,elevani-mens-l-sleeve-checck-shirt5.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Checkered Casual White/Blue Shirt', 'elevani-mens-long-sleeve-regular-fit-checkered-casual-whiteblue-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 0, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 01:58:43', '2021-01-07 01:48:02'),
(8, 'AI-LS-Blue-003', 'elevani-mens-l-sleeve-oven-shirt0.jpg,elevani-mens-l-sleeve-oven-shirt1.jpg,elevani-mens-l-sleeve-oven-shirt2.jpg,elevani-mens-l-sleeve-oven-shirt3.jpg,elevani-mens-l-sleeve-oven-shirt4.jpg', 'Elevani Mens L Sleeve Oven Shirt', 'elevani-mens-l-sleeve-oven-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 0, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 11:01:34', '2021-01-07 23:37:51'),
(9, 'AI-LS-Blue-005', 'elevani-mens-l-sleeve-casual-shirt0.jpg,elevani-mens-l-sleeve-casual-shirt1.jpg,elevani-mens-l-sleeve-casual-shirt2.jpg,elevani-mens-l-sleeve-casual-shirt3.jpg,elevani-mens-l-sleeve-casual-shirt4.jpg', 'Elevani Mens L Sleeve Casual Shirt', 'elevani-mens-l-sleeve-casual-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 0, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 11:04:33', '2021-01-07 23:40:14'),
(10, 'AI-LS-Blue-085', 'elevani-cotton-flannel-mens-long-sleeve-small-check0.jpg,elevani-cotton-flannel-mens-long-sleeve-small-check1.jpg,elevani-cotton-flannel-mens-long-sleeve-small-check2.jpg,elevani-cotton-flannel-mens-long-sleeve-small-check3.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Flannel Casual White/Navy Shirt', 'elevani-mens-long-sleeve-regular-fit-flannel-casual-whitenavy-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 610, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 11:08:33', '2021-01-07 23:42:37'),
(12, 'AI-LS-Crisp Navy-012', 'elevani-mens-long-sleeve-cotton-shirt0.jpg,elevani-mens-long-sleeve-cotton-shirt1.jpg,elevani-mens-long-sleeve-cotton-shirt2.jpg,elevani-mens-long-sleeve-cotton-shirt3.jpg,elevani-mens-long-sleeve-cotton-shirt4.jpg', 'Elevani Mens Long Sleeve Cotton shirt', 'elevani-mens-long-sleeve-cotton-shirt', 1, '2', 1, '', '', 306, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 11:18:45', '2021-01-07 23:45:31'),
(13, 'AI-LS-Crispy Navy-012', 'elevani-mens-l-sleeve-cotton-check-shirt0.jpg,elevani-mens-l-sleeve-cotton-check-shirt1.jpg,elevani-mens-l-sleeve-cotton-check-shirt2.jpg,elevani-mens-l-sleeve-cotton-check-shirt3.jpg,elevani-mens-l-sleeve-cotton-check-shirt4.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Casual Checkered Navy Shirt', 'elevani-mens-long-sleeve-regular-fit-casual-checkered-navy-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton Poplin &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 313, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 11:28:43', '2021-01-07 23:47:04'),
(14, 'AI-LS-Dark Scarlet-004', 'elevani-mens-l-sleeve-check-shirt0.jpg,elevani-mens-l-sleeve-check-shirt1.jpg,elevani-mens-l-sleeve-check-shirt2.jpg,elevani-mens-l-sleeve-check-shirt3.jpg,elevani-mens-l-sleeve-check-shirt4.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Flannel Casual Dark Scarlet Shirt', 'elevani-mens-long-sleeve-regular-fit-flannel-casual-dark-scarlet-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 0, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 11:32:13', '2021-01-07 23:49:13'),
(15, 'AI-LS-Dark Scarlet-033', 'elevani-long-sleeve-double-chest-pocket0.jpg,elevani-long-sleeve-double-chest-pocket1.jpg,elevani-long-sleeve-double-chest-pocket2.jpg,elevani-long-sleeve-double-chest-pocket3.jpg,elevani-long-sleeve-double-chest-pocket4.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Casual Dark Scarlet Shirt', 'elevani-mens-long-sleeve-regular-fit-casual-dark-scarlet-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 65% Polyester 35% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 726, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 11:35:59', '2021-01-07 23:51:29'),
(16, 'AI-LS-Dark Scarlet-075', 'elevani-mens-long-sleeve-flanel0.jpg,elevani-mens-long-sleeve-flanel1.jpg,elevani-mens-long-sleeve-flanel2.jpg,elevani-mens-long-sleeve-flanel3.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Flannel Casual Grey/Red Shirt', 'elevani-mens-long-sleeve-regular-fit-flannel-casual-greyred-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 98% Cotton Flannel 2% Spandex &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 109, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 11:39:59', '2021-01-07 23:53:43'),
(17, 'AI-LS-Deep Black-013', 'elevani-mens-flanel-long-sleeve-small-check0.jpg,elevani-mens-flanel-long-sleeve-small-check1.jpg,elevani-mens-flanel-long-sleeve-small-check2.jpg,elevani-mens-flanel-long-sleeve-small-check3.jpg,elevani-mens-flanel-long-sleeve-small-check4.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Checkered Black Shirt', 'elevani-mens-long-sleeve-regular-fit-checkered-black-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 247, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 11:44:32', '2021-01-07 23:55:19'),
(18, 'AI-LS-Deep Navy-010', 'lsleeve-no-pocket0.jpg,lsleeve-no-pocket1.jpg,lsleeve-no-pocket2.jpg,lsleeve-no-pocket3.jpg,lsleeve-no-pocket4.jpg', 'L.Sleeve no pocket', 'lsleeve-no-pocket', 1, '2,2,2,2,2', 1, '', '', 0, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 11:48:04', '2020-12-31 14:06:55'),
(19, 'AI-LS-FIRE-029', 'elevani-mens-long-sleeve-checkered-casual0.jpg,elevani-mens-long-sleeve-checkered-casual1.jpg,elevani-mens-long-sleeve-checkered-casual2.jpg,elevani-mens-long-sleeve-checkered-casual3.jpg,elevani-mens-long-sleeve-checkered-casual4.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Red Checkered Casual Shirt', 'elevani-mens-long-sleeve-regular-fit-red-checkered-casual-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 60% Cotton, 40% Polyester &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Checkered Plaid, Wrinkle and stain free &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect dress shirt or, casual wear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 188, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 11:52:48', '2021-01-08 00:00:54'),
(20, 'AI-LS-Mapu Syrup-054', 'big-check-comfy-flanel-lsleeve-no-pocket0.jpg,big-check-comfy-flanel-lsleeve-no-pocket1.jpg,big-check-comfy-flanel-lsleeve-no-pocket2.jpg,big-check-comfy-flanel-lsleeve-no-pocket3.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Casual Checkered Black Shirt', 'elevani-mens-long-sleeve-regular-fit-casual-checkered-black-shirt', 1, '2', 1, '&lt;div id=&quot;featurebullets_feature_div&quot; class=&quot;celwidget&quot; data-feature-name=&quot;featurebullets&quot; data-csa-c-id=&quot;6dj1vh-ru3k81-a1ofsh-oyee6w&quot; data-cel-widget=&quot;featurebullets_feature_div&quot;&gt;\r\n&lt;div id=&quot;feature-bullets&quot; class=&quot;a-section a-spacing-medium a-spacing-top-small&quot;&gt;\r\n&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton Flannel &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '', 510, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 22:52:43', '2021-01-08 00:04:06'),
(21, 'AI-LS-Navy Blue Solid-096', 'solid-navy-blue-long-sleeve-coudrey-shirt0.jpg,solid-navy-blue-long-sleeve-coudrey-shirt1.jpg,solid-navy-blue-long-sleeve-coudrey-shirt2.jpg,solid-navy-blue-long-sleeve-coudrey-shirt3.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Classic Corduroy Navy Shirt', 'elevani-mens-long-sleeve-regular-fit-classic-corduroy-navy-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton Corduroy &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 0, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 22:55:44', '2021-01-08 00:06:15'),
(22, 'AI-LS-Navy Blue-006', 'elevani-mens-lsleeve-casual-check-shirt0.jpg,elevani-mens-lsleeve-casual-check-shirt1.jpg,elevani-mens-lsleeve-casual-check-shirt2.jpg,elevani-mens-lsleeve-casual-check-shirt3.jpg,elevani-mens-lsleeve-casual-check-shirt4.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Flannel Casual Blue Shirt', 'elevani-mens-long-sleeve-regular-fit-flannel-casual-blue-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 0, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 22:58:54', '2021-01-08 00:08:18'),
(23, 'AI-LS-New Port Navy-084', 'elevani-check-cotton-long-sleeve0.jpg,elevani-check-cotton-long-sleeve1.jpg,elevani-check-cotton-long-sleeve2.jpg,elevani-check-cotton-long-sleeve3.jpg,elevani-check-cotton-long-sleeve4.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Flannel Casual Green/Navy Shirt', 'elevani-mens-long-sleeve-regular-fit-flannel-casual-greennavy-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 606, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 23:01:12', '2021-01-08 00:10:11'),
(24, 'AI-LS-Olive Green-098', 'solid-olive-green-long-sleeve-single-chest-pocket-coudrey-shirt0.jpg,solid-olive-green-long-sleeve-single-chest-pocket-coudrey-shirt1.jpg,solid-olive-green-long-sleeve-single-chest-pocket-coudrey-shirt2.jpg,solid-olive-green-long-sleeve-single-chest-pocket-coudrey-shirt3.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Classic Corduroy Green Shirt', 'elevani-mens-long-sleeve-regular-fit-classic-corduroy-green-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton Corduroy &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 567, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 23:03:56', '2021-01-08 00:11:55'),
(25, 'AI-LS-Red-082', 'elevani-mens-long-sleeve-casual0.jpg,elevani-mens-long-sleeve-casual1.jpg,elevani-mens-long-sleeve-casual2.jpg,elevani-mens-long-sleeve-casual3.jpg,elevani-mens-long-sleeve-casual4.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Casual Checkered Red Shirt', 'elevani-mens-long-sleeve-regular-fit-casual-checkered-red-shirt', 1, '2', 1, '', '', 1160, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 23:06:25', '2021-01-09 00:30:08'),
(26, 'AI-LS-Scarlet Sun-028', 'elevani-mens-long-sleeve-checkered-casual0.jpg,elevani-mens-long-sleeve-checkered-casual1.jpg,elevani-mens-long-sleeve-checkered-casual2.jpg,elevani-mens-long-sleeve-checkered-casual3.jpg,elevani-mens-long-sleeve-checkered-casual4.jpg', 'Elevani Mens Long Sleeve Checkered Casual', 'elevani-mens-long-sleeve-checkered-casual', 1, '2', 1, '', '', 385, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 23:09:29', '2021-01-09 01:19:18'),
(27, 'AI-LS-Sky Blue-030', 'elevani-mens-lsleeve-sleeve-casual-shirt0.jpg,elevani-mens-lsleeve-sleeve-casual-shirt1.jpg,elevani-mens-lsleeve-sleeve-casual-shirt2.jpg,elevani-mens-lsleeve-sleeve-casual-shirt3.jpg,elevani-mens-lsleeve-sleeve-casual-shirt4.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Thin Stripe Casual Purple Shirt', 'elevani-mens-long-sleeve-regular-fit-thin-stripe-casual-purple-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 60% Cotton 40% polyster &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 0, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 23:12:21', '2021-01-09 01:20:16'),
(28, 'AI-LS-White-093', 'elevani-mens-l-sleeve-flanel-checck-shirt0.jpg,elevani-mens-l-sleeve-flanel-checck-shirt1.jpg,elevani-mens-l-sleeve-flanel-checck-shirt2.jpg,elevani-mens-l-sleeve-flanel-checck-shirt3.jpg', 'Elevani Men\'s Long Sleeve Regular Fit Casual Checkered White Shirt', 'elevani-mens-long-sleeve-regular-fit-casual-checkered-white-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton Flannel &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 363, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 23:18:45', '2021-01-09 01:22:31'),
(29, 'AI-SS- Blue Dot-009', 'elevani-mens-short-sleeve-casual0.jpg,elevani-mens-short-sleeve-casual1.jpg,elevani-mens-short-sleeve-casual2.jpg', 'Elevani Men\'s Regular Fit Dotted Print Short Sleeve Shirt', 'elevani-mens-regular-fit-dotted-print-short-sleeve-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Mashine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(20.5&quot;), M(22&quot;), L(23.5&quot;), XL(25&quot;), XXL(26.5&quot;), 3XL(28&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 374, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 23:34:02', '2021-01-09 01:24:50'),
(30, 'AI-SS-Basic Navy-001', 'elevani-mens-short-sleeve-denim0.jpg,elevani-mens-short-sleeve-denim1.jpg,elevani-mens-short-sleeve-denim2.jpg,elevani-mens-short-sleeve-denim3.jpg', 'Elevani Men\'s Short Sleeve Regular Fit Denim Casual Shirt', 'elevani-mens-short-sleeve-regular-fit-denim-casual-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 2396, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 23:38:43', '2021-01-09 01:26:38'),
(31, 'AI-SS-Basic Navy-031', 'elevani-mens-short-sleeve-linen0.jpg,elevani-mens-short-sleeve-linen1.jpg,elevani-mens-short-sleeve-linen2.jpg,elevani-mens-short-sleeve-linen3.jpg,elevani-mens-short-sleeve-linen4.jpg', 'Elevani Men\'s Short Sleeve Linen Textured Blue Shirt', 'elevani-mens-short-sleeve-linen-textured-blue-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 55% Linen, 45% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(20.5&quot;), M(22&quot;), L(23.5&quot;), XL(25&quot;), XXL(26.5&quot;), 3XL(28&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 1233, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 23:45:22', '2021-01-09 01:31:15'),
(32, 'AI-SS-Black White Dot-044', 'elevani-mens-short-sleeve-casual0.jpg,elevani-mens-short-sleeve-casual1.jpg,elevani-mens-short-sleeve-casual2.jpg,elevani-mens-short-sleeve-casual3.jpg', 'Elevani Men\'s Short Sleeve Regular Fit Black Dotted Print Casual Shirt', 'elevani-mens-short-sleeve-regular-fit-black-dotted-print-casual-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Imported &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 98% Cotton 2% Spandex &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Imported, Wrinkle and stain free &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect dress shirt or, casual wear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(20.5&quot;), M(22&quot;), L(23.5&quot;), XL(25&quot;), XXL(26.5&quot;), 3XL(28&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 276, '', 11.99, NULL, 1, '', '', 1, '2020-12-21 23:52:50', '2021-01-09 01:39:13'),
(33, 'AI-SS-BLUE-001', 'elevani-mens-ssleeve-casual-shirt0.jpg,elevani-mens-ssleeve-casual-shirt1.jpg,elevani-mens-ssleeve-casual-shirt2.jpg,elevani-mens-ssleeve-casual-shirt3.jpg,elevani-mens-ssleeve-casual-shirt4.jpg', 'Elevani Men\'s Short Sleeve Regular Fit Stripe Casual White/Blue Shirt', 'elevani-mens-short-sleeve-regular-fit-stripe-casual-whiteblue-shirt', 1, '2', 1, '&lt;ul class=&quot;a-unordered-list a-vertical a-spacing-mini&quot;&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; 100% Cotton &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Perfect Casual or outwear &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Regular Fit &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Machine Washable &lt;/span&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;a-list-item&quot;&gt; Width - S(21.5&quot;), M(23&quot;), L(24.5&quot;), XL(26&quot;), XXL(27.5&quot;), 3XL(29&quot;) &lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;', '', 3333, '', 11.99, NULL, 1, '', '', 1, '2020-12-22 00:18:20', '2021-01-09 01:40:46'),
(34, 'AI-SS-Blue-052', 'elevani-mens-short-sleeve-casual0.jpg,elevani-mens-short-sleeve-casual1.jpg,elevani-mens-short-sleeve-casual2.jpg,elevani-mens-short-sleeve-casual3.jpg', 'Elevani Mens Short Sleeve Casual', 'elevani-mens-short-sleeve-casual', 1, '2,2,2,2', 1, '', '', 420, '', 11.99, NULL, 1, '', '', 1, '2020-12-22 00:27:45', '2020-12-31 14:52:21'),
(35, 'AI-SS-Green Combo-015', 'elevani-mens-short-sleeve-check0.jpg,elevani-mens-short-sleeve-check1.jpg,elevani-mens-short-sleeve-check2.jpg,elevani-mens-short-sleeve-check3.jpg', 'Elevani Mens Short Sleeve Check', 'elevani-mens-short-sleeve-check', 1, '2,2,2,2', 1, '', '', 860, '', 11.99, NULL, 1, '', '', 1, '2020-12-22 00:46:22', '2020-12-31 14:54:44'),
(36, 'AI-SS-Grey Combo-018', 'elevani-mens-ssleeve-western-check0.jpg,elevani-mens-ssleeve-western-check1.jpg,elevani-mens-ssleeve-western-check2.jpg,elevani-mens-ssleeve-western-check3.jpg,elevani-mens-ssleeve-western-check4.jpg', 'Elevani Mens SSleeve Western Check', 'elevani-mens-ssleeve-western-check', 1, '2,2,2,2,2', 1, '', '', 0, '', 11.99, NULL, 1, '', '', 1, '2020-12-22 23:32:51', '2020-12-31 15:11:56'),
(37, 'AI-SS-LIGHT BLUE-012', 'elevani-mens-ssleeve-casual-shirt0.jpg,elevani-mens-ssleeve-casual-shirt1.jpg,elevani-mens-ssleeve-casual-shirt2.jpg,elevani-mens-ssleeve-casual-shirt3.jpg', 'Elevani Mens SSleeve Casual Shirt', 'elevani-mens-ssleeve-casual-shirt', 1, '2,2,2,2', 1, '', '', 0, '', 11.99, NULL, 1, '', '', 1, '2020-12-22 23:35:44', '2020-12-31 15:14:14'),
(38, 'AI-SS-Red Check-051', 'elevani-mens-short-sleeve-casual0.jpg,elevani-mens-short-sleeve-casual1.jpg,elevani-mens-short-sleeve-casual2.jpg,elevani-mens-short-sleeve-casual3.jpg', 'Elevani Mens Short Sleeve Casual', 'elevani-mens-short-sleeve-casual', 1, '2,2,2,2', 1, '', '', 344, '', 11.99, NULL, 1, '', '', 1, '2020-12-22 23:40:05', '2020-12-31 15:17:39'),
(39, 'AI-SS-Red Check-053', 'elevani-mens-short-sleeve-casual0.jpg,elevani-mens-short-sleeve-casual1.jpg,elevani-mens-short-sleeve-casual2.jpg,elevani-mens-short-sleeve-casual3.jpg', 'Elevani Mens Short Sleeve Casual', 'elevani-mens-short-sleeve-casual', 1, '2,2,2,2', 1, '', '', 1428, '', 11.99, NULL, 1, '', '', 1, '2020-12-22 23:42:54', '2020-12-31 15:23:17'),
(40, 'AI-SS-Red Multi-028', 'elevani-mens-short-sleeve-casual0.jpg,elevani-mens-short-sleeve-casual1.jpg,elevani-mens-short-sleeve-casual2.jpg,elevani-mens-short-sleeve-casual3.jpg', 'Elevani Mens Short Sleeve Casual', 'elevani-mens-short-sleeve-casual', 1, '2,2,2,2', 1, '', '', 2112, '', 11.99, NULL, 1, '', '', 1, '2020-12-22 23:46:17', '2020-12-31 15:27:17'),
(41, 'AI-SS-RED-002', 'elevani-mens-ssleeve-casual-shirt0.jpg,elevani-mens-ssleeve-casual-shirt1.jpg,elevani-mens-ssleeve-casual-shirt2.jpg,elevani-mens-ssleeve-casual-shirt3.jpg', 'Elevani Mens S.Sleeve Casual Shirt', 'elevani-mens-ssleeve-casual-shirt', 1, '2,2,2,2', 1, '', '', 9596, '', 11.99, NULL, 1, '', '', 1, '2020-12-22 23:49:49', '2020-12-31 15:30:33'),
(42, 'AI-SS-Red-045', 'elevani-mens-slsleeve-small-check-shirt0.jpg,elevani-mens-slsleeve-small-check-shirt1.jpg,elevani-mens-slsleeve-small-check-shirt2.jpg,elevani-mens-slsleeve-small-check-shirt3.jpg,elevani-mens-slsleeve-small-check-shirt4.jpg', 'Elevani Mens SL.Sleeve Small Check Shirt', 'elevani-mens-slsleeve-small-check-shirt', 1, '2,2,2,2,2', 1, '', '', 1025, '', 11.99, NULL, 1, '', '', 1, '2020-12-22 23:52:10', '2020-12-31 15:33:55'),
(43, 'AI-SS-Red-050', 'elevani-mens-ssleeve-poly-cotton-shirt0.jpg,elevani-mens-ssleeve-poly-cotton-shirt1.jpg,elevani-mens-ssleeve-poly-cotton-shirt2.jpg,elevani-mens-ssleeve-poly-cotton-shirt3.jpg', 'Elevani Mens SSleeve Poly Cotton Shirt', 'elevani-mens-ssleeve-poly-cotton-shirt', 1, '2,2,2,2', 1, '', '', 6416, '', 11.99, NULL, 1, '', '', 1, '2020-12-22 23:56:25', '2020-12-31 15:37:07'),
(44, 'AI-SS-White Multi-029', 'elevani-mens-ssleeve-print-shirt0.jpg,elevani-mens-ssleeve-print-shirt1.jpg,elevani-mens-ssleeve-print-shirt2.jpg,elevani-mens-ssleeve-print-shirt3.jpg', 'Elevani Mens SSleeve Print Shirt', 'elevani-mens-ssleeve-print-shirt', 1, '2,2,2,2', 1, '', '', 1112, '', 11.99, NULL, 1, '', '', 1, '2020-12-23 00:05:21', '2020-12-31 15:39:15'),
(45, 'AI-SS-White Print-027', 'elevani-mens-s-sleeve-casual-shirt0.jpg,elevani-mens-s-sleeve-casual-shirt1.jpg,elevani-mens-s-sleeve-casual-shirt2.jpg,elevani-mens-s-sleeve-casual-shirt3.jpg', 'Elevani Mens S Sleeve Casual Shirt', 'elevani-mens-s-sleeve-casual-shirt', 1, '2,2,2,2', 1, '', '', 2900, '', 11.99, NULL, 1, '', '', 1, '2020-12-23 00:13:51', '2020-12-31 15:42:41'),
(46, 'AI-SS-White Stripe-054', 'elevani-mens-s-sleeve-camp-shirt0.jpg,elevani-mens-s-sleeve-camp-shirt1.jpg,elevani-mens-s-sleeve-camp-shirt2.jpg,elevani-mens-s-sleeve-camp-shirt3.jpg', 'Elevani mens S Sleeve Camp Shirt', 'elevani-mens-s-sleeve-camp-shirt', 1, '2,2,2,2', 1, '', '', 5108, '', 11.99, NULL, 1, '', '', 1, '2020-12-23 00:16:49', '2020-12-31 15:44:47'),
(47, 'AI-SS-White-003', 'elevani-mens-slsleeve-oxford-shirt0.jpg,elevani-mens-slsleeve-oxford-shirt1.jpg,elevani-mens-slsleeve-oxford-shirt2.jpg,elevani-mens-slsleeve-oxford-shirt3.jpg,elevani-mens-slsleeve-oxford-shirt4.jpg', 'Elevani Mens SL.Sleeve Oxford Shirt', 'elevani-mens-slsleeve-oxford-shirt', 1, '2,2,2,2,2', 1, '', '', 0, '', 11.99, NULL, 1, '', '', 1, '2020-12-23 00:20:32', '2020-12-31 15:47:00'),
(48, 'AI-SS-WhiteNavy Dot-042', 'elevani-mens-slsleeve-oxford-shirt0.jpg,elevani-mens-slsleeve-oxford-shirt1.jpg,elevani-mens-slsleeve-oxford-shirt2.jpg,elevani-mens-slsleeve-oxford-shirt3.jpg,elevani-mens-slsleeve-oxford-shirt4.jpg', 'Elevani Mens SL.Sleeve Oxford Shirt', 'elevani-mens-slsleeve-oxford-shirt', 1, '2,2,2,2,2', 1, '', '', 0, '', 11.99, NULL, 1, '', '', 1, '2020-12-23 00:22:39', '2020-12-31 15:50:03'),
(49, 'AI-SS-YELLOW-004', 'elevani-mens-ssleeve-printed-camp-shirt0.jpg,elevani-mens-ssleeve-printed-camp-shirt1.jpg,elevani-mens-ssleeve-printed-camp-shirt2.jpg,elevani-mens-ssleeve-printed-camp-shirt3.jpg,elevani-mens-ssleeve-printed-camp-shirt4.jpg', 'Elevani Mens SSleeve Printed Camp Shirt', 'elevani-mens-ssleeve-printed-camp-shirt', 1, '2,2,2,2,2', 1, '', '', 5110, '', 11.99, NULL, 1, '', '', 1, '2020-12-23 00:25:33', '2020-12-31 15:52:43'),
(50, 'Al-LS- New Field-087', 'elevani-mens-long-sleeve-flanel0.jpg,elevani-mens-long-sleeve-flanel1.jpg,elevani-mens-long-sleeve-flanel2.jpg,elevani-mens-long-sleeve-flanel3.jpg', 'Elevani Mens Long Sleeve Flanel', 'elevani-mens-long-sleeve-flanel', 1, '2,2,2,2', 1, '', '', 1252, '', 11.99, NULL, 1, '', '', 1, '2020-12-23 00:27:54', '2020-12-31 15:55:55'),
(51, 'MJK001P', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'Elevani Men\'s Plaid Sherpa Lined Full-Zip Detachable Hoodie Jacket', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket', 1, '3', 1, '&lt;ul&gt;\r\n&lt;li&gt;Zipper closure&lt;/li&gt;\r\n&lt;li&gt;Lining: Extra soft premium Sherpa lining of body and hood for added warmth and comfort. Helps block the cold.&lt;/li&gt;\r\n&lt;li&gt;Features: Plastic zipper. Zip front hoodie featuring with plaid kangaroo pockets.&lt;/li&gt;\r\n&lt;li&gt;Sleeves: The sleeves are lined but not fleece lined . They have smooth warm polyester padding which will definitely keep you warm.&lt;/li&gt;\r\n&lt;li&gt;2lbs&amp;plusmn; heavyweight fleece hoodie. Hoodie is great for work, school, vacation, outdoor camping, hunting, bonfires, snow and cold weather.&lt;/li&gt;\r\n&lt;li&gt;Machine Washable. Available in 5 colours and Small to XX-large sizes. Model is 6\'2\'\'/180lbs wearing Medium size Jacket.&lt;/li&gt;\r\n&lt;/ul&gt;', '', 125, 'Hoodie', 29.99, NULL, 1, '', '', 1, '2021-01-18 01:50:17', '2021-01-18 03:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes0`
--

CREATE TABLE `product_attributes0` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes0`
--

INSERT INTO `product_attributes0` (`id`, `sku`, `image`, `size`, `color`, `qty`, `price`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'AI-LS-Bright White-074B', NULL, 'S', 'White', 29, 11.99, 1, '2020-12-21 00:08:49', '2020-12-21 00:08:49'),
(2, 'AI-LS-Bright White-074A', NULL, 'M', 'White', 55, 11.99, 1, '2020-12-21 00:08:49', '2021-01-06 03:05:42'),
(3, 'AI-LS-Bright White-074C', NULL, 'L', 'White', 58, 11.99, 1, '2020-12-21 00:08:49', '2020-12-21 00:08:49'),
(4, 'AI-LS-Bright White-074D', NULL, 'XL', 'White', 29, 11.99, 1, '2020-12-21 00:08:49', '2020-12-21 00:08:49'),
(5, 'AI-LS-Bright White-074E', NULL, 'XXL', 'White', 24, 11.99, 1, '2020-12-21 00:08:49', '2020-12-21 00:08:49'),
(6, 'AI-LS- Deep black-064B', NULL, 'S', 'Black', 35, 11.99, 2, '2020-12-21 00:17:22', '2020-12-21 00:17:22'),
(7, 'AI-LS- Deep black-064A', NULL, 'M', 'Black', 71, 11.99, 2, '2020-12-21 00:17:22', '2020-12-21 00:17:22'),
(8, 'AI-LS- Deep black-064C', NULL, 'L', 'Black', 71, 11.99, 2, '2020-12-21 00:17:22', '2020-12-21 00:17:22'),
(9, 'AI-LS- Deep black-064D', NULL, 'XL', 'Black', 36, 11.99, 2, '2020-12-21 00:17:22', '2020-12-21 00:17:22'),
(10, 'AI-LS- Deep black-064E', NULL, 'XXL', 'Black', 36, 11.99, 2, '2020-12-21 00:17:22', '2020-12-21 00:17:22'),
(11, 'AI-LS- Lagulite-050B', NULL, 'S', 'Black', 57, 11.99, 3, '2020-12-21 00:43:20', '2020-12-21 00:43:20'),
(12, 'AI-LS- Lagulite-050A', NULL, 'M', 'Black', 160, 11.99, 3, '2020-12-21 00:43:20', '2020-12-21 00:43:20'),
(13, 'AI-LS- Lagulite-050C', NULL, 'L', 'Black', 145, 11.99, 3, '2020-12-21 00:43:20', '2020-12-21 00:43:20'),
(14, 'AI-LS- Lagulite-050D', NULL, 'XL', 'Black', 61, 11.99, 3, '2020-12-21 00:43:20', '2020-12-21 00:43:20'),
(15, 'AI-LS- Lagulite-050E', NULL, 'XXL', 'Black', 62, 11.99, 3, '2020-12-21 00:43:20', '2020-12-21 00:43:20'),
(16, 'AI-LS- Navy-023B', NULL, 'S', 'Black', 15, 11.99, 4, '2020-12-21 00:51:50', '2020-12-21 00:51:50'),
(17, 'AI-LS- Navy-023A', NULL, 'M', 'Black', 22, 11.99, 4, '2020-12-21 00:51:50', '2020-12-21 00:51:50'),
(18, 'AI-LS- Navy-023C', NULL, 'L', 'Black', 27, 11.99, 4, '2020-12-21 00:51:50', '2020-12-21 00:51:50'),
(19, 'AI-LS- Navy-023D', NULL, 'XL', 'Black', 13, 11.99, 4, '2020-12-21 00:51:50', '2020-12-21 00:51:50'),
(20, 'AI-LS- Navy-023E', NULL, 'XXL', 'Black', 13, 11.99, 4, '2020-12-21 00:51:50', '2020-12-21 00:51:50'),
(21, 'AI-LS- Red Dark-097B', NULL, 'S', 'Red', 91, 11.99, 5, '2020-12-21 00:55:37', '2020-12-21 00:55:37'),
(22, 'AI-LS- Red Dark-097A', NULL, 'M', 'Red', 153, 11.99, 5, '2020-12-21 00:55:37', '2020-12-21 00:55:37'),
(23, 'AI-LS- Red Dark-097C', NULL, 'L', 'Red', 161, 11.99, 5, '2020-12-21 00:55:37', '2020-12-21 00:55:37'),
(24, 'AI-LS- Red Dark-097D', NULL, 'XL', 'Red', 91, 11.99, 5, '2020-12-21 00:55:37', '2020-12-21 00:55:37'),
(25, 'AI-LS- Red Dark-097E', NULL, 'XXL', 'Red', 90, 11.99, 5, '2020-12-21 00:55:37', '2020-12-21 00:55:37'),
(26, 'Ai-LS-Black Print-036B', NULL, 'S', 'Black', 65, 11.99, 6, '2020-12-21 01:05:19', '2020-12-21 01:05:19'),
(27, 'Ai-LS-Black Print-036A', NULL, 'M', 'Black', 126, 11.99, 6, '2020-12-21 01:05:19', '2020-12-21 01:05:19'),
(28, 'Ai-LS-Black Print-036C', NULL, 'L', 'Black', 117, 11.99, 6, '2020-12-21 01:05:19', '2020-12-21 01:05:19'),
(29, 'Ai-LS-Black Print-036D', NULL, 'XL', 'Black', 53, 11.99, 6, '2020-12-21 01:05:19', '2020-12-21 01:05:19'),
(30, 'Ai-LS-Black Print-036E', NULL, 'XXL', 'Black', 68, 11.99, 6, '2020-12-21 01:05:19', '2020-12-21 01:05:19'),
(31, 'AI-LS-Blue Combo-002B', NULL, 'S', 'Blue', 0, 11.99, 7, '2020-12-21 01:58:43', '2021-01-07 01:48:02'),
(32, 'AI-LS-Blue Combo-002A', NULL, 'M', 'Blue', 0, 11.99, 7, '2020-12-21 01:58:43', '2021-01-07 01:48:02'),
(33, 'AI-LS-Blue Combo-002C', NULL, 'L', 'Blue', 0, 11.99, 7, '2020-12-21 01:58:43', '2021-01-07 01:48:02'),
(34, 'AI-LS-Blue Combo-002D', NULL, 'XL', 'Blue', 0, 11.99, 7, '2020-12-21 01:58:43', '2021-01-07 01:48:02'),
(35, 'AI-LS-Blue Combo-002E', NULL, 'XXL', 'Blue', 0, 11.99, 7, '2020-12-21 01:58:43', '2021-01-07 01:48:02'),
(36, 'AI-LS-Blue-003B', NULL, 'S', 'Blue', 0, 11.99, 8, '2020-12-21 11:01:34', '2021-01-07 23:37:51'),
(37, 'AI-LS-Blue-003A', NULL, 'M', 'Blue', 0, 11.99, 8, '2020-12-21 11:01:34', '2021-01-07 23:37:51'),
(38, 'AI-LS-Blue-003C', NULL, 'L', 'Blue', 0, 11.99, 8, '2020-12-21 11:01:35', '2021-01-07 23:37:52'),
(39, 'AI-LS-Blue-003D', NULL, 'XL', 'Blue', 0, 11.99, 8, '2020-12-21 11:01:35', '2021-01-07 23:37:52'),
(40, 'AI-LS-Blue-003E', NULL, 'XXL', 'Blue', 0, 11.99, 8, '2020-12-21 11:01:35', '2021-01-07 23:37:52'),
(41, 'AI-LS-Blue-005B', NULL, 'S', 'Blue', 0, 11.99, 9, '2020-12-21 11:04:33', '2021-01-07 23:40:15'),
(42, 'AI-LS-Blue-005A', NULL, 'M', 'Blue', 0, 11.99, 9, '2020-12-21 11:04:33', '2021-01-07 23:40:15'),
(43, 'AI-LS-Blue-005C', NULL, 'L', 'Blue', 0, 11.99, 9, '2020-12-21 11:04:33', '2021-01-07 23:40:15'),
(44, 'AI-LS-Blue-005D', NULL, 'XL', 'Blue', 0, 11.99, 9, '2020-12-21 11:04:33', '2021-01-07 23:40:15'),
(45, 'AI-LS-Blue-005E', NULL, 'XXL', 'Blue', 0, 11.99, 9, '2020-12-21 11:04:33', '2021-01-07 23:40:15'),
(46, 'AI-LS-Blue-085B', NULL, 'S', 'Blue', 74, 11.99, 10, '2020-12-21 11:08:33', '2021-01-07 23:42:37'),
(47, 'AI-LS-Blue-085A', NULL, 'M', 'Blue', 193, 11.99, 10, '2020-12-21 11:08:33', '2021-01-07 23:42:37'),
(48, 'AI-LS-Blue-085C', NULL, 'L', 'Blue', 196, 11.99, 10, '2020-12-21 11:08:33', '2021-01-07 23:42:37'),
(49, 'AI-LS-Blue-085D', NULL, 'XL', 'Blue', 73, 11.99, 10, '2020-12-21 11:08:33', '2021-01-07 23:42:37'),
(50, 'AI-LS-Blue-085E', NULL, 'XXL', 'Blue', 74, 11.99, 10, '2020-12-21 11:08:33', '2021-01-07 23:42:37'),
(51, 'AI-LS-Crisp Navy-012B', NULL, 'S', 'White', 43, 11.99, 12, '2020-12-21 11:18:45', '2020-12-21 11:18:45'),
(52, 'AI-LS-Crisp Navy-012A', NULL, 'M', 'White', 100, 11.99, 12, '2020-12-21 11:18:45', '2020-12-21 11:18:45'),
(53, 'AI-LS-Crisp Navy-012C', NULL, 'L', 'White', 75, 11.99, 12, '2020-12-21 11:18:45', '2020-12-21 11:18:45'),
(54, 'AI-LS-Crisp Navy-012D', NULL, 'XL', 'White', 43, 11.99, 12, '2020-12-21 11:18:45', '2020-12-21 11:18:45'),
(55, 'AI-LS-Crisp Navy-012E', NULL, 'XXL', 'White', 45, 11.99, 12, '2020-12-21 11:18:45', '2020-12-21 11:18:45'),
(56, 'AI-LS-Crispy Navy-012B', NULL, 'S', 'White', 44, 11.99, 13, '2020-12-21 11:28:43', '2021-01-07 23:47:03'),
(57, 'AI-LS-Crispy Navy-012A', NULL, 'M', 'White', 88, 11.99, 13, '2020-12-21 11:28:43', '2021-01-07 23:47:03'),
(58, 'AI-LS-Crispy Navy-012C', NULL, 'L', 'White', 91, 11.99, 13, '2020-12-21 11:28:43', '2021-01-07 23:47:03'),
(59, 'AI-LS-Crispy Navy-012D', NULL, 'XL', 'White', 44, 11.99, 13, '2020-12-21 11:28:43', '2021-01-07 23:47:03'),
(60, 'AI-LS-Crispy Navy-012E', NULL, 'XXL', 'White', 46, 11.99, 13, '2020-12-21 11:28:43', '2021-01-07 23:47:04'),
(61, 'AI-LS-Dark Scarlet-004B', NULL, 'S', 'Black', 0, 11.99, 14, '2020-12-21 11:32:13', '2021-01-07 23:49:13'),
(62, 'AI-LS-Dark Scarlet-004A', NULL, 'M', 'Black', 0, 11.99, 14, '2020-12-21 11:32:13', '2021-01-07 23:49:13'),
(63, 'AI-LS-Dark Scarlet-004C', NULL, 'L', 'Black', 0, 11.99, 14, '2020-12-21 11:32:13', '2021-01-07 23:49:13'),
(64, 'AI-LS-Dark Scarlet-004D', NULL, 'XL', 'Black', 0, 11.99, 14, '2020-12-21 11:32:13', '2021-01-07 23:49:13'),
(65, 'AI-LS-Dark Scarlet-004E', NULL, 'XXL', 'Black', 0, 11.99, 14, '2020-12-21 11:32:13', '2021-01-07 23:49:13'),
(66, 'AI-LS-Dark Scarlet-033B', NULL, 'S', 'Black', 105, 11.99, 15, '2020-12-21 11:35:59', '2021-01-07 23:51:29'),
(67, 'AI-LS-Dark Scarlet-033A', NULL, 'M', 'Black', 207, 11.99, 15, '2020-12-21 11:35:59', '2021-01-07 23:51:29'),
(68, 'AI-LS-Dark Scarlet-033C', NULL, 'L', 'Black', 206, 11.99, 15, '2020-12-21 11:35:59', '2021-01-07 23:51:29'),
(69, 'AI-LS-Dark Scarlet-033D', NULL, 'XL', 'Black', 103, 11.99, 15, '2020-12-21 11:35:59', '2021-01-07 23:51:29'),
(70, 'AI-LS-Dark Scarlet-033E', NULL, 'XXL', 'Black', 105, 11.99, 15, '2020-12-21 11:35:59', '2021-01-07 23:51:29'),
(71, 'AI-LS-Dark Scarlet-075B', NULL, 'S', 'Black', 16, 11.99, 16, '2020-12-21 11:39:59', '2021-01-07 23:53:43'),
(72, 'AI-LS-Dark Scarlet-075A', NULL, 'M', 'Black', 30, 11.99, 16, '2020-12-21 11:39:59', '2021-01-07 23:53:43'),
(73, 'AI-LS-Dark Scarlet-075C', NULL, 'L', 'Black', 31, 11.99, 16, '2020-12-21 11:39:59', '2021-01-07 23:53:43'),
(74, 'AI-LS-Dark Scarlet-075D', NULL, 'XL', 'Black', 32, 11.99, 16, '2020-12-21 11:39:59', '2021-01-07 23:53:43'),
(75, 'AI-LS-Deep Black-013B', NULL, 'S', 'Black', 36, 11.99, 17, '2020-12-21 11:44:32', '2021-01-07 23:55:19'),
(76, 'AI-LS-Deep Black-013A', NULL, 'M', 'Black', 70, 11.99, 17, '2020-12-21 11:44:32', '2021-01-07 23:55:19'),
(77, 'AI-LS-Deep Black-013C', NULL, 'L', 'Black', 72, 11.99, 17, '2020-12-21 11:44:32', '2021-01-07 23:55:19'),
(78, 'AI-LS-Deep Black-013D', NULL, 'XL', 'Black', 35, 11.99, 17, '2020-12-21 11:44:32', '2021-01-07 23:55:19'),
(79, 'AI-LS-Deep Black-013E', NULL, 'XXL', 'Black', 34, 11.99, 17, '2020-12-21 11:44:32', '2021-01-07 23:55:19'),
(80, 'AI-LS-Deep Navy-010B', NULL, 'S', 'Black', 0, 11.99, 18, '2020-12-21 11:48:04', '2020-12-21 11:48:04'),
(81, 'AI-LS-Deep Navy-010A', NULL, 'M', 'Black', 0, 11.99, 18, '2020-12-21 11:48:04', '2020-12-21 11:48:04'),
(82, 'AI-LS-Deep Navy-010C', NULL, 'L', 'Black', 0, 11.99, 18, '2020-12-21 11:48:04', '2020-12-21 11:48:04'),
(83, 'AI-LS-Deep Navy-010D', NULL, 'XL', 'Black', 0, 11.99, 18, '2020-12-21 11:48:04', '2020-12-21 11:48:04'),
(84, 'AI-LS-Deep Navy-010E', NULL, 'XXL', 'Black', 0, 11.99, 18, '2020-12-21 11:48:04', '2020-12-21 11:48:04'),
(85, 'AI-LS-FIRE-029B', NULL, 'S', 'Black', 23, 11.99, 19, '2020-12-21 11:52:48', '2021-01-08 00:00:53'),
(86, 'AI-LS-FIRE-029A', NULL, 'M', 'Black', 47, 11.99, 19, '2020-12-21 11:52:48', '2021-01-08 00:00:53'),
(87, 'AI-LS-FIRE-029C', NULL, 'L', 'Black', 70, 11.99, 19, '2020-12-21 11:52:48', '2021-01-08 00:00:53'),
(88, 'AI-LS-FIRE-029D', NULL, 'XL', 'Black', 25, 11.99, 19, '2020-12-21 11:52:48', '2021-01-08 00:00:53'),
(89, 'AI-LS-FIRE-029E', NULL, 'XXL', 'Black', 23, 11.99, 19, '2020-12-21 11:52:48', '2021-01-08 00:00:53'),
(90, 'AI-LS-Mapu Syrup-054B', NULL, 'S', 'White', 77, 11.99, 20, '2020-12-21 22:52:43', '2021-01-08 00:04:06'),
(91, 'AI-LS-Mapu Syrup-054A', NULL, 'M', 'White', 141, 11.99, 20, '2020-12-21 22:52:43', '2021-01-08 00:04:06'),
(92, 'AI-LS-Mapu Syrup-054C', NULL, 'L', 'White', 144, 11.99, 20, '2020-12-21 22:52:43', '2021-01-08 00:04:06'),
(93, 'AI-LS-Mapu Syrup-054D', NULL, 'XL', 'White', 84, 11.99, 20, '2020-12-21 22:52:43', '2021-01-08 00:04:06'),
(94, 'AI-LS-Mapu Syrup-054E', NULL, 'XXL', 'White', 64, 11.99, 20, '2020-12-21 22:52:43', '2021-01-08 00:04:06'),
(95, 'AI-LS-Navy Blue Solid-096B', NULL, 'S', 'Blue', 0, 11.99, 21, '2020-12-21 22:55:44', '2021-01-08 00:06:15'),
(96, 'AI-LS-Navy Blue Solid-096A', NULL, 'M', 'Blue', 0, 11.99, 21, '2020-12-21 22:55:44', '2021-01-08 00:06:15'),
(97, 'AI-LS-Navy Blue Solid-096C', NULL, 'L', 'Blue', 0, 11.99, 21, '2020-12-21 22:55:44', '2021-01-08 00:06:16'),
(98, 'AI-LS-Navy Blue Solid-096D', NULL, 'XL', 'Blue', 0, 11.99, 21, '2020-12-21 22:55:44', '2021-01-08 00:06:16'),
(99, 'AI-LS-Navy Blue Solid-096E', NULL, 'XXL', 'Blue', 0, 11.99, 21, '2020-12-21 22:55:45', '2021-01-08 00:06:16'),
(100, 'AI-LS-Navy Blue-006B', NULL, 'S', 'Blue', 0, 11.99, 22, '2020-12-21 22:58:54', '2021-01-08 00:08:18'),
(101, 'AI-LS-Navy Blue-006A', NULL, 'M', 'Blue', 0, 11.99, 22, '2020-12-21 22:58:54', '2021-01-08 00:08:18'),
(102, 'AI-LS-Navy Blue-006C', NULL, 'L', 'Blue', 0, 11.99, 22, '2020-12-21 22:58:54', '2021-01-08 00:08:18'),
(103, 'AI-LS-Navy Blue-006D', NULL, 'XL', 'Blue', 0, 11.99, 22, '2020-12-21 22:58:54', '2021-01-08 00:08:18'),
(104, 'AI-LS-Navy Blue-006E', NULL, 'XXL', 'Blue', 0, 11.99, 22, '2020-12-21 22:58:54', '2021-01-08 00:08:18'),
(105, 'AI-LS-New Port Navy-084B', NULL, 'S', 'Blue', 100, 11.99, 23, '2020-12-21 23:01:12', '2021-01-08 00:10:11'),
(106, 'AI-LS-New Port Navy-084A', NULL, 'M', 'Blue', 177, 11.99, 23, '2020-12-21 23:01:12', '2021-01-08 00:10:11'),
(107, 'AI-LS-New Port Navy-084C', NULL, 'L', 'Blue', 176, 11.99, 23, '2020-12-21 23:01:12', '2021-01-08 00:10:11'),
(108, 'AI-LS-New Port Navy-084D', NULL, 'XL', 'Blue', 76, 11.99, 23, '2020-12-21 23:01:12', '2021-01-08 00:10:11'),
(109, 'AI-LS-New Port Navy-084E', NULL, 'XXL', 'Blue', 77, 11.99, 23, '2020-12-21 23:01:12', '2021-01-08 00:10:11'),
(110, 'AI-LS-Olive Green-098B', NULL, 'S', 'Green', 83, 11.99, 24, '2020-12-21 23:03:56', '2021-01-08 00:11:55'),
(111, 'AI-LS-Olive Green-098A', NULL, 'M', 'Green', 145, 11.99, 24, '2020-12-21 23:03:56', '2021-01-08 00:11:55'),
(112, 'AI-LS-Olive Green-098C', NULL, 'L', 'Green', 147, 11.99, 24, '2020-12-21 23:03:56', '2021-01-08 00:11:55'),
(113, 'AI-LS-Olive Green-098D', NULL, 'XL', 'Green', 109, 11.99, 24, '2020-12-21 23:03:56', '2021-01-08 00:11:55'),
(114, 'AI-LS-Olive Green-098E', NULL, 'XXL', 'Green', 83, 11.99, 24, '2020-12-21 23:03:56', '2021-01-08 00:11:55'),
(115, 'AI-LS-Red-082B', NULL, 'S', 'Red', 165, 11.99, 25, '2020-12-21 23:06:25', '2021-01-09 00:30:08'),
(116, 'AI-LS-Red-082A', NULL, 'M', 'Red', 331, 11.99, 25, '2020-12-21 23:06:25', '2021-01-09 00:30:08'),
(117, 'AI-LS-Red-082C', NULL, 'L', 'Red', 331, 11.99, 25, '2020-12-21 23:06:25', '2021-01-09 00:30:08'),
(118, 'AI-LS-Red-082D', NULL, 'XL', 'Red', 168, 11.99, 25, '2020-12-21 23:06:25', '2021-01-09 00:30:08'),
(119, 'AI-LS-Red-082E', NULL, 'XXL', 'Red', 165, 11.99, 25, '2020-12-21 23:06:25', '2021-01-09 00:30:08'),
(120, 'AI-LS-Scarlet Sun-028B', NULL, 'S', 'Red', 55, 11.99, 26, '2020-12-21 23:09:29', '2021-01-09 01:19:18'),
(121, 'AI-LS-Scarlet Sun-028A', NULL, 'M', 'Red', 111, 11.99, 26, '2020-12-21 23:09:29', '2021-01-09 01:19:18'),
(122, 'AI-LS-Scarlet Sun-028C', NULL, 'L', 'Red', 114, 11.99, 26, '2020-12-21 23:09:29', '2021-01-09 01:19:18'),
(123, 'AI-LS-Scarlet Sun-028D', NULL, 'XL', 'Red', 50, 11.99, 26, '2020-12-21 23:09:29', '2021-01-09 01:19:18'),
(124, 'AI-LS-Scarlet Sun-028E', NULL, 'XXL', 'Red', 55, 11.99, 26, '2020-12-21 23:09:29', '2021-01-09 01:19:18'),
(125, 'AI-LS-Sky Blue-030B', NULL, 'S', 'Blue', 0, 11.99, 27, '2020-12-21 23:12:21', '2021-01-09 01:20:16'),
(126, 'AI-LS-Sky Blue-030A', NULL, 'M', 'Blue', 0, 11.99, 27, '2020-12-21 23:12:21', '2021-01-09 01:20:16'),
(127, 'AI-LS-Sky Blue-030C', NULL, 'L', 'Blue', 0, 11.99, 27, '2020-12-21 23:12:21', '2021-01-09 01:20:17'),
(128, 'AI-LS-Sky Blue-030D', NULL, 'XL', 'Blue', 0, 11.99, 27, '2020-12-21 23:12:21', '2021-01-09 01:20:17'),
(129, 'AI-LS-Sky Blue-030E', NULL, 'XXL', 'Blue', 0, 11.99, 27, '2020-12-21 23:12:21', '2021-01-09 01:20:18'),
(130, 'AI-LS-White-093B', NULL, 'S', 'White', 52, 11.99, 28, '2020-12-21 23:18:45', '2021-01-09 01:22:30'),
(131, 'AI-LS-White-093A', NULL, 'M', 'White', 103, 11.99, 28, '2020-12-21 23:18:45', '2021-01-09 01:22:30'),
(132, 'AI-LS-White-093C', NULL, 'L', 'White', 104, 11.99, 28, '2020-12-21 23:18:45', '2021-01-09 01:22:30'),
(133, 'AI-LS-White-093D', NULL, 'XL', 'White', 52, 11.99, 28, '2020-12-21 23:18:45', '2021-01-09 01:22:30'),
(134, 'AI-LS-White-093E', NULL, 'XXL', 'White', 52, 11.99, 28, '2020-12-21 23:18:45', '2021-01-09 01:22:30'),
(135, 'AI-SS- Blue Dot-009B', NULL, 'S', 'White', 56, 11.99, 29, '2020-12-21 23:34:02', '2021-01-09 01:24:49'),
(136, 'AI-SS- Blue Dot-009A', NULL, 'M', 'White', 111, 11.99, 29, '2020-12-21 23:34:02', '2021-01-09 01:24:49'),
(137, 'AI-SS- Blue Dot-009C', NULL, 'L', 'White', 107, 11.99, 29, '2020-12-21 23:34:02', '2021-01-09 01:24:50'),
(138, 'AI-SS- Blue Dot-009D', NULL, 'XL', 'White', 55, 11.99, 29, '2020-12-21 23:34:02', '2021-01-09 01:24:50'),
(139, 'AI-SS- Blue Dot-009E', NULL, 'XXL', 'White', 45, 11.99, 29, '2020-12-21 23:34:02', '2021-01-09 01:24:50'),
(140, 'AI-SS-Basic Navy-001B', NULL, 'S', 'White', 321, 11.99, 30, '2020-12-21 23:38:43', '2021-01-09 01:26:38'),
(141, 'AI-SS-Basic Navy-001A', NULL, 'M', 'White', 702, 11.99, 30, '2020-12-21 23:38:43', '2021-01-09 01:26:38'),
(142, 'AI-SS-Basic Navy-001C', NULL, 'L', 'White', 646, 11.99, 30, '2020-12-21 23:38:43', '2021-01-09 01:26:38'),
(143, 'AI-SS-Basic Navy-001D', NULL, 'XL', 'White', 379, 11.99, 30, '2020-12-21 23:38:43', '2021-01-09 01:26:38'),
(144, 'AI-SS-Basic Navy-001E', NULL, 'XXL', 'White', 348, 11.99, 30, '2020-12-21 23:38:43', '2021-01-09 01:26:38'),
(145, 'AI-SS-Basic Navy-031B', NULL, 'S', 'White', 172, 11.99, 31, '2020-12-21 23:45:22', '2021-01-09 01:31:15'),
(146, 'AI-SS-Basic Navy-031A', NULL, 'M', 'White', 357, 11.99, 31, '2020-12-21 23:45:22', '2021-01-09 01:31:15'),
(147, 'AI-SS-Basic Navy-031C', NULL, 'L', 'White', 357, 11.99, 31, '2020-12-21 23:45:22', '2021-01-09 01:31:15'),
(148, 'AI-SS-Basic Navy-031D', NULL, 'XL', 'White', 167, 11.99, 31, '2020-12-21 23:45:22', '2021-01-09 01:31:15'),
(149, 'AI-SS-Basic Navy-031E', NULL, 'XXL', 'White', 180, 11.99, 31, '2020-12-21 23:45:22', '2021-01-09 01:31:15'),
(150, 'AI-SS-Black White Dot-044B', NULL, 'S', 'Black/White', 41, 11.99, 32, '2020-12-21 23:52:50', '2021-01-09 01:39:12'),
(151, 'AI-SS-Black White Dot-044A', NULL, 'M', 'Black/White', 78, 11.99, 32, '2020-12-21 23:52:50', '2021-01-09 01:39:12'),
(152, 'AI-SS-Black White Dot-044C', NULL, 'L', 'Black/White', 64, 11.99, 32, '2020-12-21 23:52:50', '2021-01-09 01:39:13'),
(153, 'AI-SS-Black White Dot-044D', NULL, 'XL', 'Black/White', 46, 11.99, 32, '2020-12-21 23:52:50', '2021-01-09 01:39:13'),
(154, 'AI-SS-Black White Dot-044E', NULL, 'XXL', 'Black/White', 47, 11.99, 32, '2020-12-21 23:52:50', '2021-01-09 01:39:13'),
(155, 'AI-SS-BLUE-001B', NULL, 'S', 'Blue', 481, 11.99, 33, '2020-12-22 00:18:20', '2021-01-09 01:40:46'),
(156, 'AI-SS-BLUE-001A', NULL, 'M', 'Blue', 955, 11.99, 33, '2020-12-22 00:18:20', '2021-01-09 01:40:46'),
(157, 'AI-SS-BLUE-001C', NULL, 'L', 'Blue', 948, 11.99, 33, '2020-12-22 00:18:20', '2021-01-09 01:40:46'),
(158, 'AI-SS-BLUE-001D', NULL, 'XL', 'Blue', 479, 11.99, 33, '2020-12-22 00:18:20', '2021-01-09 01:40:46'),
(159, 'AI-SS-BLUE-001E', NULL, 'XXL', 'Blue', 470, 11.99, 33, '2020-12-22 00:18:20', '2021-01-09 01:40:46'),
(160, 'AI-SS-Blue-052B', NULL, 'S', 'Blue', 14, 11.99, 34, '2020-12-22 00:27:45', '2020-12-22 00:27:45'),
(161, 'AI-SS-Blue-052A', NULL, 'M', 'Blue', 30, 11.99, 34, '2020-12-22 00:27:45', '2020-12-22 00:27:45'),
(162, 'AI-SS-Blue-052C', NULL, 'L', 'Blue', 32, 11.99, 34, '2020-12-22 00:27:45', '2020-12-22 00:27:45'),
(163, 'AI-SS-Blue-052D', NULL, 'XL', 'Blue', 15, 11.99, 34, '2020-12-22 00:27:45', '2020-12-22 00:27:45'),
(164, 'AI-SS-Blue-052E', NULL, 'XXL', 'Blue', 14, 11.99, 34, '2020-12-22 00:27:45', '2020-12-22 00:27:45'),
(165, 'AI-SS-Green Combo-015B', NULL, 'S', 'Green', 30, 11.99, 35, '2020-12-22 00:46:22', '2020-12-22 00:46:22'),
(166, 'AI-SS-Green Combo-015A', NULL, 'M', 'Green', 63, 11.99, 35, '2020-12-22 00:46:22', '2020-12-22 00:46:22'),
(167, 'AI-SS-Green Combo-015C', NULL, 'L', 'Green', 61, 11.99, 35, '2020-12-22 00:46:22', '2020-12-22 00:46:22'),
(168, 'AI-SS-Green Combo-015D', NULL, 'XL', 'Green', 38, 11.99, 35, '2020-12-22 00:46:22', '2020-12-22 00:46:22'),
(169, 'AI-SS-Green Combo-015E', NULL, 'XXL', 'Green', 23, 11.99, 35, '2020-12-22 00:46:22', '2020-12-22 00:46:22'),
(170, 'AI-SS-Grey Combo-018B', NULL, 'S', 'Grey', 0, 11.99, 36, '2020-12-22 23:32:51', '2020-12-22 23:32:51'),
(171, 'AI-SS-Grey Combo-018A', NULL, 'M', 'Grey', 0, 11.99, 36, '2020-12-22 23:32:51', '2020-12-22 23:32:51'),
(172, 'AI-SS-Grey Combo-018C', NULL, 'L', 'Grey', 0, 11.99, 36, '2020-12-22 23:32:51', '2020-12-22 23:32:51'),
(173, 'AI-SS-Grey Combo-018D', NULL, 'XL', 'Grey', 0, 11.99, 36, '2020-12-22 23:32:51', '2020-12-22 23:32:51'),
(174, 'AI-SS-Grey Combo-018E', NULL, 'XXL', 'Grey', 0, 11.99, 36, '2020-12-22 23:32:51', '2020-12-22 23:32:51'),
(175, 'AI-SS-LIGHT BLUE-012B', NULL, 'S', 'BLUE', 0, 11.99, 37, '2020-12-22 23:35:44', '2020-12-22 23:35:44'),
(176, 'AI-SS-LIGHT BLUE-012A', NULL, 'M', 'BLUE', 0, 11.99, 37, '2020-12-22 23:35:44', '2020-12-22 23:35:44'),
(177, 'AI-SS-LIGHT BLUE-012C', NULL, 'L', 'BLUE', 0, 11.99, 37, '2020-12-22 23:35:44', '2020-12-22 23:35:44'),
(178, 'AI-SS-LIGHT BLUE-012E', NULL, 'XXL', 'BLUE', 0, 11.99, 37, '2020-12-22 23:35:44', '2020-12-22 23:35:44'),
(179, 'AI-SS-Red Check-051B', NULL, 'S', 'Red', 12, 11.99, 38, '2020-12-22 23:40:05', '2020-12-22 23:40:05'),
(180, 'AI-SS-Red Check-051A', NULL, 'M', 'Red', 23, 11.99, 38, '2020-12-22 23:40:05', '2020-12-22 23:40:05'),
(181, 'AI-SS-Red Check-051C', NULL, 'L', 'Red', 25, 11.99, 38, '2020-12-22 23:40:05', '2020-12-22 23:40:05'),
(182, 'AI-SS-Red Check-051D', NULL, 'XL', 'Red', 13, 11.99, 38, '2020-12-22 23:40:05', '2020-12-22 23:40:05'),
(183, 'AI-SS-Red Check-051E', NULL, 'XXL', 'Red', 13, 11.99, 38, '2020-12-22 23:40:05', '2020-12-22 23:40:05'),
(184, 'AI-SS-Red Check-053B', NULL, 'S', 'Red', 49, 11.99, 39, '2020-12-22 23:42:54', '2020-12-22 23:42:54'),
(185, 'AI-SS-Red Check-053A', NULL, 'M', 'Red', 105, 11.99, 39, '2020-12-22 23:42:54', '2020-12-22 23:42:54'),
(186, 'AI-SS-Red Check-053C', NULL, 'L', 'Red', 104, 11.99, 39, '2020-12-22 23:42:54', '2020-12-22 23:42:54'),
(187, 'AI-SS-Red Check-053D', NULL, 'XL', 'Red', 52, 11.99, 39, '2020-12-22 23:42:54', '2020-12-22 23:42:54'),
(188, 'AI-SS-Red Check-053E', NULL, 'XXL', 'Red', 47, 11.99, 39, '2020-12-22 23:42:54', '2020-12-22 23:42:54'),
(189, 'AI-SS-Red Multi-028B', NULL, 'S', 'Red', 78, 11.99, 40, '2020-12-22 23:46:17', '2020-12-22 23:46:17'),
(190, 'AI-SS-Red Multi-028A', NULL, 'M', 'Red', 143, 11.99, 40, '2020-12-22 23:46:17', '2020-12-22 23:46:17'),
(191, 'AI-SS-Red Multi-028C', NULL, 'L', 'Red', 154, 11.99, 40, '2020-12-22 23:46:17', '2020-12-22 23:46:17'),
(192, 'AI-SS-Red Multi-02DS', NULL, 'XL', 'Red', 76, 11.99, 40, '2020-12-22 23:46:17', '2020-12-22 23:46:17'),
(193, 'AI-SS-Red Multi-028E', NULL, 'XXL', 'Red', 77, 11.99, 40, '2020-12-22 23:46:17', '2020-12-22 23:46:17'),
(194, 'AI-SS-RED-002B', NULL, 'S', 'Red', 339, 11.99, 41, '2020-12-22 23:49:49', '2020-12-22 23:49:49'),
(195, 'AI-SS-RED-002A', NULL, 'M', 'Red', 681, 11.99, 41, '2020-12-22 23:49:49', '2020-12-22 23:49:49'),
(196, 'AI-SS-RED-002C', NULL, 'L', 'Red', 690, 11.99, 41, '2020-12-22 23:49:49', '2020-12-22 23:49:49'),
(197, 'AI-SS-RED-002D', NULL, 'XL', 'Red', 347, 11.99, 41, '2020-12-22 23:49:49', '2020-12-22 23:49:49'),
(198, 'AI-SS-RED-002E', NULL, 'XXL', 'Red', 342, 11.99, 41, '2020-12-22 23:49:49', '2020-12-22 23:49:49'),
(199, 'AI-SS-Red-045B', NULL, 'S', 'Red', 31, 11.99, 42, '2020-12-22 23:52:10', '2020-12-22 23:52:10'),
(200, 'AI-SS-Red-045A', NULL, 'M', 'Red', 58, 11.99, 42, '2020-12-22 23:52:10', '2020-12-22 23:52:10'),
(201, 'AI-SS-Red-045C', NULL, 'L', 'Red', 54, 11.99, 42, '2020-12-22 23:52:10', '2020-12-22 23:52:10'),
(202, 'AI-SS-Red-045D', NULL, 'XL', 'Red', 32, 11.99, 42, '2020-12-22 23:52:10', '2020-12-22 23:52:10'),
(203, 'AI-SS-Red-045E', NULL, 'XXL', 'Red', 30, 11.99, 42, '2020-12-22 23:52:10', '2020-12-22 23:52:10'),
(204, 'AI-SS-Red-050B', NULL, 'S', 'Red', 229, 11.99, 43, '2020-12-22 23:56:25', '2020-12-22 23:56:25'),
(205, 'AI-SS-Red-050A', NULL, 'M', 'Red', 455, 11.99, 43, '2020-12-22 23:56:25', '2020-12-22 23:56:25'),
(206, 'AI-SS-Red-050C', NULL, 'L', 'Red', 460, 11.99, 43, '2020-12-22 23:56:25', '2020-12-22 23:56:25'),
(207, 'AI-SS-Red-050D', NULL, 'XL', 'Red', 230, 11.99, 43, '2020-12-22 23:56:25', '2020-12-22 23:56:25'),
(208, 'AI-SS-Red-050E', NULL, 'XXL', 'Red', 230, 11.99, 43, '2020-12-22 23:56:25', '2020-12-22 23:56:25'),
(209, 'AI-SS-White Multi-029B', NULL, 'S', 'White', 39, 11.99, 44, '2020-12-23 00:05:21', '2020-12-23 00:05:21'),
(210, 'AI-SS-White Multi-029A', NULL, 'M', 'White', 79, 11.99, 44, '2020-12-23 00:05:21', '2020-12-23 00:05:21'),
(211, 'AI-SS-White Multi-029C', NULL, 'L', 'White', 80, 11.99, 44, '2020-12-23 00:05:21', '2020-12-23 00:05:21'),
(212, 'AI-SS-White Multi-029D', NULL, 'XL', 'White', 40, 11.99, 44, '2020-12-23 00:05:21', '2020-12-23 00:05:21'),
(213, 'AI-SS-White Multi-029E', NULL, 'XXL', 'White', 40, 11.99, 44, '2020-12-23 00:05:21', '2020-12-23 00:05:21'),
(214, 'AI-SS-White Print-027B', NULL, 'S', 'White', 105, 11.99, 45, '2020-12-23 00:13:51', '2020-12-23 00:13:51'),
(215, 'AI-SS-White Print-027A', NULL, 'M', 'White', 206, 11.99, 45, '2020-12-23 00:13:51', '2020-12-23 00:13:51'),
(216, 'AI-SS-White Print-027C', NULL, 'L', 'White', 211, 11.99, 45, '2020-12-23 00:13:51', '2020-12-23 00:13:51'),
(217, 'AI-SS-White Print-027D', NULL, 'XL', 'White', 105, 11.99, 45, '2020-12-23 00:13:51', '2020-12-23 00:13:51'),
(218, 'AI-SS-White Print-027E', NULL, 'XXL', 'White', 98, 11.99, 45, '2020-12-23 00:13:51', '2020-12-23 00:13:51'),
(219, 'AI-SS-White Stripe-054B', NULL, 'S', 'White', 184, 11.99, 46, '2020-12-23 00:16:49', '2020-12-23 00:16:49'),
(220, 'AI-SS-White Stripe-054A', NULL, 'M', 'White', 357, 11.99, 46, '2020-12-23 00:16:49', '2020-12-23 00:16:49'),
(221, 'AI-SS-White Stripe-054C', NULL, 'L', 'White', 368, 11.99, 46, '2020-12-23 00:16:49', '2020-12-23 00:16:49'),
(222, 'AI-SS-White Stripe-054D', NULL, 'XL', 'White', 185, 11.99, 46, '2020-12-23 00:16:49', '2020-12-23 00:16:49'),
(223, 'AI-SS-White Stripe-054E', NULL, 'XXL', 'White', 183, 11.99, 46, '2020-12-23 00:16:49', '2020-12-23 00:16:49'),
(224, 'AI-SS-White-003B', NULL, 'S', 'White', 0, 11.99, 47, '2020-12-23 00:20:32', '2020-12-23 00:20:32'),
(225, 'AI-SS-White-003A', NULL, 'M', 'White', 0, 11.99, 47, '2020-12-23 00:20:32', '2020-12-23 00:20:32'),
(226, 'AI-SS-White-003C', NULL, 'L', 'White', 0, 11.99, 47, '2020-12-23 00:20:32', '2020-12-23 00:20:32'),
(227, 'AI-SS-White-003D', NULL, 'XL', 'White', 0, 11.99, 47, '2020-12-23 00:20:32', '2020-12-23 00:20:32'),
(228, 'AI-SS-White-003E', NULL, 'XXL', 'White', 0, 11.99, 47, '2020-12-23 00:20:32', '2020-12-23 00:20:32'),
(229, 'AI-SS-WhiteNavy Dot-042B', NULL, 'S', 'White', 0, 11.99, 48, '2020-12-23 00:22:39', '2020-12-23 00:22:39'),
(230, 'AI-SS-WhiteNavy Dot-042A', NULL, 'M', 'White', 0, 11.99, 48, '2020-12-23 00:22:39', '2020-12-23 00:22:39'),
(231, 'AI-SS-WhiteNavy Dot-042C', NULL, 'L', 'White', 0, 11.99, 48, '2020-12-23 00:22:39', '2020-12-23 00:22:39'),
(232, 'AI-SS-WhiteNavy Dot-042D', NULL, 'XL', 'White', 0, 11.99, 48, '2020-12-23 00:22:39', '2020-12-23 00:22:39'),
(233, 'AI-SS-WhiteNavy Dot-042E', NULL, 'XXL', 'White', 0, 11.99, 48, '2020-12-23 00:22:39', '2020-12-23 00:22:39'),
(234, 'AI-SS-YELLOW-004B', NULL, 'S', 'YELLOW', 142, 11.99, 49, '2020-12-23 00:25:33', '2020-12-23 00:25:33'),
(235, 'AI-SS-YELLOW-004A', NULL, 'M', 'YELLOW', 295, 11.99, 49, '2020-12-23 00:25:33', '2020-12-23 00:25:33'),
(236, 'AI-SS-YELLOW-004C', NULL, 'L', 'YELLOW', 295, 11.99, 49, '2020-12-23 00:25:33', '2020-12-23 00:25:33'),
(237, 'AI-SS-YELLOW-004D', NULL, 'XL', 'YELLOW', 148, 11.99, 49, '2020-12-23 00:25:33', '2020-12-23 00:25:33'),
(238, 'AI-SS-YELLOW-004E', NULL, 'XXL', 'YELLOW', 142, 11.99, 49, '2020-12-23 00:25:33', '2020-12-23 00:25:33'),
(239, 'Al-LS- New Field-087B', NULL, 'S', 'YELLOW', 45, 11.99, 50, '2020-12-23 00:27:54', '2020-12-23 00:27:54'),
(240, 'Al-LS- New Field-087A', NULL, 'M', 'YELLOW', 90, 11.99, 50, '2020-12-23 00:27:54', '2020-12-23 00:27:54'),
(241, 'Al-LS- New Field-087C', NULL, 'L', 'YELLOW', 90, 11.99, 50, '2020-12-23 00:27:54', '2020-12-23 00:27:54'),
(242, 'Al-LS- New Field-087D', NULL, 'XL', 'YELLOW', 44, 11.99, 50, '2020-12-23 00:27:54', '2020-12-23 00:27:54'),
(243, 'Al-LS- New Field-087E', NULL, 'XXL', 'YELLOW', 44, 11.99, 50, '2020-12-23 00:27:54', '2020-12-23 00:27:54'),
(244, 'MJK001P-P10-S', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'S', 'Navy/White/Grey', 5, 29.99, 51, '2021-01-18 01:50:18', '2021-01-18 07:55:17'),
(245, 'MJK001P-P10-M', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'M', 'Navy/White/Grey', 5, 29.99, 51, '2021-01-18 01:50:18', '2021-01-18 07:56:26'),
(246, 'MJK001P-P10-L', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'L', 'Navy/White/Grey', 5, 29.99, 51, '2021-01-18 01:50:18', '2021-01-18 07:57:00'),
(247, 'MJK001P-P10-XL', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'XL', 'Navy/White/Grey', 5, 29.99, 51, '2021-01-18 01:50:18', '2021-01-18 07:57:24'),
(248, 'MJK001P-P10-XXL', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'XXL', 'Navy/White/Grey', 5, 29.99, 51, '2021-01-18 01:50:18', '2021-01-18 07:39:28'),
(249, 'MJK001P-P5-S', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'S', 'Black/Grey', 5, 29.99, 51, '2021-01-18 01:50:18', '2021-01-18 08:00:50'),
(250, 'MJK001P-P5-M', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'M', 'Black/Grey', 5, 29.99, 51, '2021-01-18 01:50:18', '2021-01-18 08:01:45'),
(251, 'MJK001P-P5-L', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'L', 'Black/Grey', 5, 29.99, 51, '2021-01-18 01:50:18', '2021-01-18 08:02:37'),
(252, 'MJK001P-P5-XL', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'XL', 'Black/Grey', 5, 29.99, 51, '2021-01-18 01:50:18', '2021-01-18 08:03:13'),
(253, 'MJK001P-P5-XXL', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'XXL', 'Black/Grey', 5, 29.99, 51, '2021-01-18 01:50:18', '2021-01-18 08:04:04'),
(254, 'MJK001P-P7-S', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'S', 'Navy/Cream/Black', 5, 29.99, 51, '2021-01-18 01:50:18', '2021-01-18 08:10:00'),
(255, 'MJK001P-P7-M', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'M', 'Navy/Cream/Black', 5, 29.99, 51, '2021-01-18 01:50:18', '2021-01-18 08:16:08'),
(256, 'MJK001P-P7-L', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'L', 'Navy/Cream/Black', 5, 29.99, 51, '2021-01-18 01:50:18', '2021-01-18 08:16:34'),
(257, 'MJK001P-P7-XL', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'XL', 'Navy/Cream/Black', 5, 29.99, 51, '2021-01-18 01:50:19', '2021-01-18 08:16:58'),
(258, 'MJK001P-P7-XXL', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'XXL', 'Navy/Cream/Black', 5, 29.99, 51, '2021-01-18 01:50:19', '2021-01-18 08:17:29'),
(259, 'MJK001P-P6-S', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'S', 'Grey/White/Black', 5, 29.99, 51, '2021-01-18 01:50:19', '2021-01-18 08:24:26'),
(260, 'MJK001P-P6-M', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'M', 'Grey/White/Black', 5, 29.99, 51, '2021-01-18 01:50:19', '2021-01-18 08:26:14'),
(261, 'MJK001P-P6-L', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'L', 'Grey/White/Black', 5, 29.99, 51, '2021-01-18 01:50:19', '2021-01-18 08:35:11'),
(262, 'MJK001P-P6-XL', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'XL', 'Grey/White/Black', 5, 29.99, 51, '2021-01-18 01:50:19', '2021-01-18 08:35:36'),
(263, 'MJK001P-P6-XXL', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'XXL', 'Grey/White/Black', 5, 29.99, 51, '2021-01-18 01:50:19', '2021-01-18 08:38:39'),
(264, 'MJK001P-P1-S', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'S', 'Black/Grey/Brown', 5, 29.99, 51, '2021-01-18 01:50:19', '2021-01-18 08:46:36'),
(265, 'MJK001P-P1-M', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'M', 'Black/Grey/Brown', 5, 29.99, 51, '2021-01-18 01:50:19', '2021-01-18 08:49:52'),
(266, 'MJK001P-P1-L', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'L', 'Black/Grey/Brown', 5, 29.99, 51, '2021-01-18 01:50:19', '2021-01-18 08:50:13'),
(267, 'MJK001P-P1-XL', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'XL', 'Black/Grey/Brown', 5, 29.99, 51, '2021-01-18 01:50:19', '2021-01-18 08:50:35'),
(268, 'MJK001P-P1-XXL', 'elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket0.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket1.jpg,elevani-mens-plaid-sherpa-lined-full-zip-detachable-hoodie-jacket2.jpg', 'XXL', 'Black/Grey/Brown', 5, 29.99, 51, '2021-01-18 01:50:19', '2021-01-18 08:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, '/images/products/1616180583.jpg', 'base', NULL, '2021-03-19 13:03:03'),
(2, 3, '/images/products/1616223877.jpg', 'base', NULL, '2021-03-20 01:04:38'),
(51, 4, '/images/products/IB9X1NgGl0.jpg', 'base', '2021-03-20 02:12:27', '2021-03-20 02:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'irfan  Fanmis Men\'s Luxury Analog Quartz Gold Wrist Watches', '<h1 id=\"title\" class=\"a-size-large a-spacing-none a-color-secondary\" style=\"text-align: center;\"><span id=\"productTitle\" class=\"a-size-large\">irfan&nbsp;Men\'s Luxury Analog Quartz Gold Wrist Watches</span></h1>\r\n<p>&nbsp;</p>\r\n<div id=\"dp_productDescription_container_div\" class=\"celwidget\" data-feature-name=\"productDescription\" data-cel-widget=\"dp_productDescription_container_div\">\r\n<div id=\"productDescription_feature_div\" class=\"a-row feature\" data-feature-name=\"productDescription\" data-template-name=\"productDescription\" data-cel-widget=\"productDescription_feature_div\">\r\n<div id=\"productDescription\" class=\"a-section a-spacing-small\">\r\n<h4>Product Description:</h4>\r\n<h4>Highlights:</h4>\r\n<p>Original Japanese Movement: provide precise and accurate time keeping<br />Stainless Steel Strap and Stainless Steel Case Cover<br />German High Hardness Mineral Glass, not easy to wear<br />30M Water Resistant - 3ATM: Daily Use Waterproof, Handwash<br />Calendar Date Window<br />Classic Business Casual Dress Watch Design. Combines quality, leading edge fashion, and value.<br /><br />Features:</p>\r\n<p><br />Stainless Steel case and Stainless Steel case back<br />German High Hardness Mineral Glass<br />Calendar Date Window<br />30M Waterproof<br />Stainless Steel Strap<br /><br />Specification:</p>\r\n<p><br />Dial Color: Black<br />Dial Case Diameter: 1.57 inch / 4.0 cm<br />Dial Case Thickness: 0.43 inch / 1.1 cm<br />Band Color: Gold<br />Band Width: 0.79 inch / 2 cm<br />Band Length: 8.7 inch / 22 cm.<br />Band Clasp Type: Fold Over Clasp<br />Watch Weight: 3.39 oz / 96 g<br /><br />**NOTE**:<br />If mist or droplets found inside watch surface, please contact manufacturer immediately.<br />Clean the strap by a soft cloth on regular bases is highly recommended.<br />Too much water contact will shorter watch life.<br /><br />What Is In The Package:<br />Watch x 1</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"detailBullets\" class=\"celwidget\" data-feature-name=\"detailBullets\" data-cel-widget=\"detailBullets\">\r\n<div id=\"detailBulletsWrapper_feature_div\" class=\"a-section a-spacing-none feature\" data-feature-name=\"detailBullets\" data-template-name=\"detailBullets\" data-cel-widget=\"detailBulletsWrapper_feature_div\">\r\n<div id=\"detailBullets_feature_div\">\r\n<ul class=\"a-unordered-list a-nostyle a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Department:&nbsp;</span>Mens</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Manufacturer:&nbsp;</span>Fanmis</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Package Dimensions:&nbsp;</span>3.2 x 2.8 x 2.4 inches</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">ASIN:&nbsp;</span>B06XHJY5XZ</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">UNSPSC Code:&nbsp;</span>54110000</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Item model number:&nbsp;</span>4331787063</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Batteries:&nbsp;</span>1 LR44 batteries required.</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>', 'PRECISE TIME irfan  KEEPING: Japanese Movement, provide precise and accurate time keeping. Japanese battery which can provide the watch strong power.', '2021-03-18 09:42:21', '2021-03-18 09:42:21'),
(2, 2, 'en', 'Meolin Charm Creative Twisted Crystal Pendant Necklace Fashion Stylish', '<h1 id=\"title\" class=\"a-size-large a-spacing-none\" style=\"text-align: center;\"><span id=\"productTitle\" class=\"a-size-large\">Meolin Charm Creative Twisted Crystal Pendant&nbsp;</span></h1>\r\n<p>&nbsp;</p>\r\n<p><span class=\"a-size-large\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../../../../storage/media/w5SaCifIArdhnr8w6ZiEakZOArQ3oIjLIIWMnGip.jpeg\" alt=\"\" width=\"523\" height=\"522\" /></span></p>\r\n<p>&nbsp;</p>\r\n<h4><span class=\"a-size-large\">Details:<br /></span></h4>\r\n<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">Material: high-quality alloy, not easy to fade, not easy allergy, noble elegance, shining charming.</span></li>\r\n<li><span class=\"a-list-item\">Fits most people,you can adjust the length to a perfect fit with the extension chain.</span></li>\r\n<li><span class=\"a-list-item\">Unique design achievements unique to you, no matter what occasion,it will makes you attracting the attention of others.</span></li>\r\n<li><span class=\"a-list-item\">A Magnificent Gift for Your Mom, Sister, Friend, Teacher, Co-worker, Wife or Girlfriend for Christmas, Birthday, Anniversary, Graduation or Mother\'s Day.</span></li>\r\n<li><span class=\"a-list-item\">Note:Avoid contact with water,To keep item bright, clean item regularly and frequently with a soft cloth.</span></li>\r\n</ul>\r\n<h4 class=\"default\">&nbsp;</h4>\r\n<h4 class=\"default\">Product description:</h4>\r\n<div id=\"productDescription\" class=\"a-section a-spacing-small\">\r\n<p>Product Material: Silver</p>\r\n<p>Product size: Chain length: 44cm; Pendant length and width: 2.4*1cm</p>\r\n<p>Package: 1 pcs</p>\r\n<p>Features: Great jewelry gifts Suitable for her, lover, wife, couple, Birthday, Valentine&rsquo;s Day, Christmas&rsquo; Day, Mother&rsquo;s Day, wedding, party, anniversary, prom and casual days.</p>\r\n</div>', NULL, '2021-03-18 10:32:52', '2021-03-18 10:32:52'),
(3, 3, 'en', 'PROBOOK 430 G8 NOTEBOOK PC', '<p>HP PROBOOK 430 G8 NOTEBOOK PCHP PROBOOK 430 G8 NOTEBOOK PCHP PROBOOK 430 G8 NOTEBOOK PC</p>', NULL, '2021-03-18 10:45:56', '2021-03-18 10:45:56'),
(6, 4, 'en', '6548PROBOOK 430 G8 NOTEBOOK PC', '<p>6548PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC</p>', NULL, '2021-03-20 01:11:04', '2021-03-20 01:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `searchterms`
--

CREATE TABLE `searchterms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `search_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vat`, `shipping_charge`, `shopname`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, '3', '7', 'echovel', 'hshahadat36@gmail.com', '01676074486', 'gblock,halishahar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `ship_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `order_id`, `ship_name`, `ship_phone`, `ship_email`, `ship_address`, `ship_city`, `created_at`, `updated_at`) VALUES
(4, 12, 'shahadat hossain', '5197913995', 'sohidulislam@gmail.com', '2100 Cabana Road west', 'Windsor', NULL, NULL),
(5, 13, 'shahadat hossain', '5197913995', 'hshahadat36@gmail.com', '2100 Cabana Road west', 'Windsor', NULL, NULL),
(6, 15, 'shahadat hossain', '5197913995', 'sohidulislam@gmail.com', '2100 Cabana Road west', 'Windsor', NULL, NULL),
(7, 14, 'shahadat hossain', '5197913995', 'sohidulislam@gmail.com', '2100 Cabana Road west', 'Windsor', NULL, NULL),
(8, 16, 'shahadat hossain', '5197913995', 'sohidulislam@gmail.com', '2100 Cabana Road west', 'Windsor', NULL, NULL),
(9, 17, 'shahadat hossain', '5197913995', 'sohidulislam@gmail.com', '2100 Cabana Road west', 'Windsor', NULL, NULL),
(10, 18, 'test', '53465', 'tt@ttf.com', 'hcffhch', 'Chattogram', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `slider_subtitle`, `slider_slug`, `type`, `category_id`, `page_id`, `url`, `image`, `target`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'test', 'Test', 'category', 1, NULL, NULL, '/images/sliders/1612600436.jpg', 'same_tab', '1', '2021-02-06 02:33:58', '2021-02-06 02:33:58'),
(2, 'slider-1', 'slider-1', 'slider-1', 'url', NULL, NULL, 'https://www.w3schools.com/', '/images/sliders/1612672894.jpg', 'new_tab', '1', '2021-02-06 22:41:35', '2021-02-06 22:41:35'),
(3, 'slider-2', 'slider-2', 'slider-2', 'url', NULL, NULL, 'https://www.w3schools.com/', '/images/sliders/1612673166.jpg', 'new_tab', '1', '2021-02-06 22:46:07', '2021-02-06 22:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `storefront_generals`
--

CREATE TABLE `storefront_generals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `welcome_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `terms_condition` bigint(20) UNSIGNED DEFAULT NULL,
  `privacy_policy_page` bigint(20) UNSIGNED DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storefront_generals`
--

INSERT INTO `storefront_generals` (`id`, `welcome_text`, `theme_color`, `mail_theme_color`, `slider_id`, `terms_condition`, `privacy_policy_page`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to Lion Coders', NULL, NULL, 2, 1, NULL, 'Muradpur, Chittagong', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `storefront_menus`
--

CREATE TABLE `storefront_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `navbar_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `footer_menu_title_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_menu_one_id` bigint(20) UNSIGNED DEFAULT NULL,
  `footer_menu_title_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_menu_two_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storefront_menus`
--

INSERT INTO `storefront_menus` (`id`, `navbar_text`, `primary_menu_id`, `category_menu_id`, `footer_menu_title_one`, `footer_menu_one_id`, `footer_menu_title_two`, `footer_menu_two_id`, `created_at`, `updated_at`) VALUES
(1, 'Test 2', 2, NULL, '', NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'fashion', 1, '2021-03-18 09:20:43', '2021-03-25 13:20:48'),
(2, 'new-arrivals', 1, '2021-03-18 09:20:57', '2021-03-18 09:20:57'),
(3, 'trendy', 1, '2021-03-18 09:21:08', '2021-03-25 13:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `tag_translations`
--

CREATE TABLE `tag_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_translations`
--

INSERT INTO `tag_translations` (`id`, `tag_id`, `local`, `tag_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Fashion', '2021-03-18 09:20:43', '2021-03-18 09:20:43'),
(2, 2, 'en', 'New Arrivals', '2021-03-18 09:20:57', '2021-03-18 09:20:57'),
(3, 3, 'en', 'Trendy', '2021-03-18 09:21:08', '2021-03-18 09:21:08'),
(4, 1, 'bn', 'ফ্যাশন', NULL, NULL),
(5, 2, 'bn', 'নিউ এরাইভাল', NULL, NULL),
(6, 3, 'bn', 'ট্রেন্ডি', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_cat`
--

CREATE TABLE `test_cat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_position` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_cat`
--

INSERT INTO `test_cat` (`id`, `category_name`, `slug`, `parent`, `description`, `description_position`, `image`, `featured`, `status`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Men', 'men', NULL, 'Men\'s', 1, NULL, 1, 1, 1, '2020-12-16 03:32:04', '2020-12-16 03:32:04'),
(2, 'Women', 'women', NULL, 'Women Test', 1, NULL, 1, 1, 1, '2021-02-05 09:51:58', '2021-02-05 09:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `phone`, `email`, `password`, `role`, `image`, `remember_token`, `last_login_at`, `last_login_ip`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Tarik', 'Iqbal', '01924756759', 'hello@lion-coders.com', '$2y$10$hv5b3a/UUopDp/3oxD3gpO2rA4V0ogL3575fIdXDLSlvxt7TMn3Nu', 0, NULL, NULL, NULL, NULL, '2020-12-13 14:35:51', '2020-12-13 14:35:51'),
(2, 'irfan', 'Irfan', 'Chowdhury', '01829498634', 'irfanchowdhury80@gmail.com', '$2y$10$Bpkr0QPBwpiw6Ax8sqvSy.5sZVa96Np7Dnhyz97WBw7cuT1w7pzOi', 1, NULL, NULL, NULL, NULL, '2021-01-31 02:33:22', '2021-01-31 02:33:22'),
(3, 'arman', 'Arman', 'Alam', '01829498635', 'arman@gmail.com', '$2y$10$sFg.WpMhrzu6gQeVq4k5V.NSnJSE2J0pgW1DXFf/za5SCNFiwBoaa', 1, NULL, NULL, NULL, NULL, '2021-02-07 01:29:29', '2021-02-07 01:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `coupon_code` (`coupon_code`),
  ADD UNIQUE KEY `coupon_name` (`coupon_name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_customers`
--
ALTER TABLE `guest_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guest_customers_phone_unique` (`phone`),
  ADD UNIQUE KEY `guest_customers_email_unique` (`email`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
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
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`),
  ADD KEY `menu_items_category_id_foreign` (`category_id`),
  ADD KEY `menu_items_page_id_foreign` (`page_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `navigations_category_id_foreign` (`category_id`),
  ADD KEY `navigations_page_id_foreign` (`page_id`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordered_products_order_id_foreign` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `products0`
--
ALTER TABLE `products0`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes0`
--
ALTER TABLE `product_attributes0`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_category_id_foreign` (`category_id`),
  ADD KEY `sliders_page_id_foreign` (`page_id`);

--
-- Indexes for table `storefront_generals`
--
ALTER TABLE `storefront_generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storefront_menus`
--
ALTER TABLE `storefront_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `storefront_menus_primary_menu_id_foreign` (`primary_menu_id`),
  ADD KEY `storefront_menus_category_menu_id_foreign` (`category_menu_id`),
  ADD KEY `storefront_menus_footer_menu_one_id_foreign` (`footer_menu_one_id`),
  ADD KEY `storefront_menus_footer_menu_two_id_foreign` (`footer_menu_two_id`);

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
-- Indexes for table `test_cat`
--
ALTER TABLE `test_cat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_foreign` (`parent`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `attribute_sets`
--
ALTER TABLE `attribute_sets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attribute_set_translations`
--
ALTER TABLE `attribute_set_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `attribute_value_translations`
--
ALTER TABLE `attribute_value_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `brand_translations`
--
ALTER TABLE `brand_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_customers`
--
ALTER TABLE `guest_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products0`
--
ALTER TABLE `products0`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product_attributes0`
--
ALTER TABLE `product_attributes0`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `searchterms`
--
ALTER TABLE `searchterms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `storefront_generals`
--
ALTER TABLE `storefront_generals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `storefront_menus`
--
ALTER TABLE `storefront_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `test_cat`
--
ALTER TABLE `test_cat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `attributes_attribute_set_id_foreign` FOREIGN KEY (`attribute_set_id`) REFERENCES `attribute_sets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD CONSTRAINT `attribute_category_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `test_cat` (`id`),
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `menu_items_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);

--
-- Constraints for table `navigations`
--
ALTER TABLE `navigations`
  ADD CONSTRAINT `navigations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `test_cat` (`id`),
  ADD CONSTRAINT `navigations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);

--
-- Constraints for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD CONSTRAINT `ordered_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`),
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `test_cat` (`id`),
  ADD CONSTRAINT `sliders_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);

--
-- Constraints for table `storefront_menus`
--
ALTER TABLE `storefront_menus`
  ADD CONSTRAINT `storefront_menus_category_menu_id_foreign` FOREIGN KEY (`category_menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `storefront_menus_footer_menu_one_id_foreign` FOREIGN KEY (`footer_menu_one_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `storefront_menus_footer_menu_two_id_foreign` FOREIGN KEY (`footer_menu_two_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `storefront_menus_primary_menu_id_foreign` FOREIGN KEY (`primary_menu_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD CONSTRAINT `tag_translations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_cat`
--
ALTER TABLE `test_cat`
  ADD CONSTRAINT `categories_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `test_cat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
