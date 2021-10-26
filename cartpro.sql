-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2021 at 02:44 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_set_id` bigint(20) UNSIGNED NOT NULL,
  `is_filterable` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `slug`, `attribute_set_id`, `is_filterable`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'size', 5, 1, 1, '2021-03-16 11:50:23', '2021-03-24 11:16:50'),
(3, 'color', 5, 0, 1, '2021-03-16 12:59:53', '2021-03-24 11:16:46'),
(20, 'ram', 7, 1, 1, '2021-03-17 03:35:22', '2021-07-27 00:41:19'),
(23, 'monitor', 7, 0, 1, '2021-03-17 03:40:07', '2021-07-27 00:41:19');

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
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_sets`
--

INSERT INTO `attribute_sets` (`id`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 1, '2021-03-15 08:45:29', '2021-10-03 00:17:40'),
(6, 1, '2021-03-15 08:45:46', '2021-10-03 00:18:16'),
(7, 1, '2021-03-15 08:46:27', '2021-10-03 00:18:14'),
(8, 1, '2021-03-15 08:46:43', '2021-10-03 00:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_set_translations`
--

CREATE TABLE `attribute_set_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_set_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_set_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_set_translations`
--

INSERT INTO `attribute_set_translations` (`id`, `attribute_set_id`, `locale`, `attribute_set_name`, `created_at`, `updated_at`) VALUES
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
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_translations`
--

INSERT INTO `attribute_translations` (`id`, `attribute_id`, `locale`, `attribute_name`, `created_at`, `updated_at`) VALUES
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
(23, 20, NULL, '2021-03-17 03:37:00', '2021-03-17 03:37:00'),
(24, 23, NULL, '2021-09-28 08:08:26', '2021-09-28 08:08:26'),
(25, 3, NULL, '2021-10-09 08:57:32', '2021-10-09 08:57:32'),
(26, 3, NULL, '2021-10-09 08:57:32', '2021-10-09 08:57:32'),
(27, 3, NULL, '2021-10-09 08:57:33', '2021-10-09 08:57:33');

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
(23, 20, 23, 'en', '6GB', '2021-03-17 03:37:00', '2021-03-17 03:37:00'),
(24, 23, 24, 'en', 'xyz', '2021-09-28 08:08:26', '2021-09-28 08:08:26'),
(25, 3, 25, 'en', 'Red', '2021-10-09 08:57:32', '2021-10-09 08:57:32'),
(26, 3, 26, 'en', 'Green', '2021-10-09 08:57:32', '2021-10-09 08:57:32'),
(27, 3, 27, 'en', 'Yellow', '2021-10-09 08:57:33', '2021-10-09 08:57:33');

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
(4, 'sony', 'images/brands/IY4HxpSvjL.png', 1, '2021-02-21 13:34:26', '2021-09-21 01:32:39'),
(7, 'ফল', NULL, 0, '2021-02-22 00:53:39', '2021-09-21 01:26:27'),
(8, 'লায়ন-কোডারস', 'images/brands/NXCIYRZBBs.png', 1, '2021-02-22 00:54:35', '2021-09-21 05:13:00'),
(11, 'Panasonic', NULL, 0, '2021-03-01 23:51:20', '2021-09-21 01:26:22'),
(14, 'Otobi', 'images/brands/d9itR3U0Qa.png', 1, '2021-03-02 02:00:46', '2021-09-21 01:34:53'),
(16, 'ফল', 'images/brands/3FKKzS2ZR2.png', 1, '2021-03-02 02:42:37', '2021-09-21 01:34:15'),
(19, 'Natural', 'images/brands/hjWoY7uWJW.png', 1, '2021-03-02 02:47:06', '2021-09-21 01:05:16'),
(20, 'gkkhkg', 'images/brands/ycp2qDYst3.png', 1, '2021-03-02 03:44:49', '2021-09-21 01:30:44'),
(21, 'hello', 'images/brands/QT4nnHkc8E.png', 1, '2021-03-02 03:45:09', '2021-09-21 01:30:11'),
(22, 'pineapple', 'images/brands/32BaEMEItL.png', 1, '2021-03-02 03:51:16', '2021-09-21 01:33:24'),
(23, 'samsung', 'images/brands/pKB1vdrpJX.webp', 1, '2021-09-22 03:57:09', '2021-09-22 03:57:09'),
(25, 'sdsada', NULL, 0, '2021-10-10 05:32:33', '2021-10-10 05:32:33'),
(26, 'sdsada', NULL, 0, '2021-10-10 05:32:33', '2021-10-10 05:32:33'),
(27, 'irfan', NULL, 0, '2021-10-11 00:38:06', '2021-10-11 00:38:06');

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
(5, 4, 'en', 'Apple', '2021-02-21 13:34:26', '2021-02-21 13:34:26'),
(6, 4, 'bn', 'সনি', NULL, NULL),
(9, 7, 'bn', 'ফল', '2021-02-22 00:53:39', '2021-02-22 00:53:39'),
(10, 8, 'bn', 'লায়ন কোডারস', '2021-02-22 00:54:35', '2021-02-22 00:54:35'),
(13, 11, 'en', 'Panasonic', '2021-03-01 23:51:21', '2021-03-01 23:51:21'),
(16, 14, 'en', 'Otobi', '2021-03-02 02:00:47', '2021-03-02 02:00:47'),
(18, 16, 'en', 'ফল', '2021-03-02 02:42:38', '2021-03-02 02:42:38'),
(21, 19, 'en', 'Adidas', '2021-03-02 02:47:06', '2021-03-02 02:47:06'),
(22, 20, 'en', 'Acer', '2021-03-02 03:44:49', '2021-03-02 03:44:49'),
(23, 21, 'en', 'ASUS', '2021-03-02 03:45:09', '2021-03-02 03:45:09'),
(24, 22, 'en', 'pineapple', '2021-03-02 03:51:16', '2021-03-02 03:51:16'),
(26, 8, 'en', 'Sony', NULL, NULL),
(27, 23, 'en', 'Samsung', '2021-09-22 03:57:10', '2021-09-22 03:57:10'),
(29, 23, 'bn', 'স্যামসাং', NULL, NULL),
(30, 26, 'en', 'sdsada', '2021-10-10 05:32:33', '2021-10-10 05:32:33'),
(31, 25, 'en', 'sdsada', '2021-10-10 05:32:33', '2021-10-10 05:32:33'),
(32, 27, 'en', 'irfan', '2021-10-11 00:38:06', '2021-10-11 00:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `description_position` tinyint(4) DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top` int(11) DEFAULT '0',
  `is_active` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `parent_id`, `description`, `description_position`, `image`, `icon`, `top`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'electronics', NULL, 'This is Electronics', NULL, 'images/categories/syBEXDiaUy.webp', NULL, 1, 1, '2021-02-21 22:59:48', '2021-10-09 04:49:04'),
(3, 'clothes', NULL, 'This is Clothes', NULL, NULL, 'las la-tshirt', NULL, 1, '2021-02-21 23:39:24', '2021-10-09 04:49:44'),
(9, 'Computer', 2, 'This is Computer', 1, NULL, NULL, 1, 0, '2021-02-22 02:07:32', '2021-09-03 23:52:21'),
(10, 'laptop', 9, 'this is good', 1, NULL, NULL, 1, 0, NULL, '2021-09-03 23:52:13'),
(11, 'মিস্টি', NULL, 'test', 1, NULL, NULL, 1, 0, '2021-02-22 04:43:25', '2021-03-25 12:54:10'),
(12, 'men', 3, 'Men Collection', 1, NULL, NULL, 0, 0, '2021-03-20 03:51:04', '2021-09-12 06:51:07'),
(13, 'furniture', NULL, 'good', 1, NULL, 'las la-couch', NULL, 1, '2021-04-18 23:43:13', '2021-10-05 04:52:53'),
(14, 'car', NULL, 'Beautiful Cars', NULL, 'images/categories/TQgwL8HG14.jpg', 'las la-car', NULL, 1, '2021-09-12 04:27:29', '2021-10-09 04:49:29'),
(15, 'test-80', NULL, 'Test 80', NULL, 'images/categories/Keg2VkAQj2.png', NULL, NULL, 1, '2021-09-12 04:35:37', '2021-10-17 10:45:31'),
(16, 'otobi', 13, 'Testing Purpose', NULL, 'images/categories/n3jcVsXfZA.webp', NULL, 1, 1, '2021-09-14 04:44:36', '2021-10-09 04:47:20'),
(17, 'rfl', 13, 'Testing', NULL, 'images/categories/loEqpqXR8k.webp', NULL, 1, 1, '2021-09-14 04:46:12', '2021-10-09 04:46:20'),
(18, 'chair', 17, 'Testing', NULL, 'images/categories/q0DsbTFuc0.webp', NULL, 1, 1, '2021-09-14 04:48:27', '2021-10-09 04:45:10'),
(19, 'table', 17, 'Testing', NULL, 'images/categories/kZ5SxsKTp0.webp', 'las-la-table', 1, 1, '2021-09-14 04:49:03', '2021-10-09 04:44:14'),
(20, 'mobile', 2, 'Mobile', 1, NULL, NULL, NULL, 1, '2021-09-21 04:23:50', '2021-09-22 05:10:17'),
(21, 'android', 20, 'Android', 1, NULL, NULL, 0, 1, '2021-09-21 04:24:57', '2021-09-21 04:24:57'),
(22, 'iphone', 20, 'iPhone', 1, NULL, NULL, 0, 1, '2021-09-21 04:25:31', '2021-09-21 04:25:31'),
(23, 'test', NULL, 'testst', NULL, NULL, NULL, NULL, 1, '2021-10-05 03:46:33', '2021-10-17 10:45:03'),
(24, 'test-55', NULL, 'testt', NULL, NULL, NULL, 1, 0, '2021-10-09 04:28:02', '2021-10-09 04:28:02');

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
(2, 2),
(3, 2),
(20, 6),
(20, 7),
(20, 8),
(13, 1),
(3, 4),
(2, 8),
(2, 5),
(20, 5),
(20, 28),
(2, 3),
(13, 29);

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
(18, 12, 'en', 'Men', '2021-03-20 03:51:04', '2021-03-20 03:51:04'),
(20, 13, 'en', 'Furniture', NULL, NULL),
(21, 13, 'hi', 'फर्नीचर', NULL, NULL),
(22, 13, 'fr', 'un meuble', NULL, NULL),
(23, 3, 'hi', 'फर्नीचर', NULL, NULL),
(24, 14, 'en', 'Car', '2021-09-12 04:27:30', '2021-09-12 04:27:30'),
(25, 15, 'en', 'Toys', '2021-09-12 04:35:37', '2021-09-12 04:35:37'),
(26, 16, 'en', 'Otobi', '2021-09-14 04:44:36', '2021-09-14 04:44:36'),
(27, 17, 'en', 'RFL', '2021-09-14 04:46:12', '2021-09-14 04:46:12'),
(28, 18, 'en', 'Chair', '2021-09-14 04:48:27', '2021-09-14 04:48:27'),
(29, 19, 'en', 'Table', '2021-09-14 04:49:03', '2021-09-14 04:49:03'),
(30, 13, 'bn', 'ফার্নিচার', NULL, NULL),
(31, 16, 'bn', 'অটোবি', NULL, NULL),
(32, 17, 'bn', 'আর এফ এল', NULL, NULL),
(33, 14, 'bn', 'কার', NULL, NULL),
(34, 20, 'en', 'Mobile', '2021-09-21 04:23:50', '2021-09-21 04:23:50'),
(35, 21, 'en', 'Android', '2021-09-21 04:24:57', '2021-09-21 04:24:57'),
(36, 22, 'en', 'iPhone', '2021-09-21 04:25:31', '2021-09-21 04:25:31'),
(37, 20, 'bn', 'মোবাইল', NULL, NULL),
(38, 23, 'en', 'Food', '2021-10-05 03:46:33', '2021-10-05 03:46:33'),
(39, 24, 'en', 'test 55', '2021-10-09 04:28:02', '2021-10-09 04:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'US', 'United States', NULL, NULL),
(2, 'CA', 'Canada', NULL, NULL),
(3, 'AF', 'Afghanistan', NULL, NULL),
(4, 'AL', 'Albania', NULL, NULL),
(5, 'DZ', 'Algeria', NULL, NULL),
(6, 'DS', 'American Samoa', NULL, NULL),
(7, 'AD', 'Andorra', NULL, NULL),
(8, 'AO', 'Angola', NULL, NULL),
(9, 'AI', 'Anguilla', NULL, NULL),
(10, 'AQ', 'Antarctica', NULL, NULL),
(11, 'AG', 'Antigua and/or Barbuda', NULL, NULL),
(12, 'AR', 'Argentina', NULL, NULL),
(13, 'AM', 'Armenia', NULL, NULL),
(14, 'AW', 'Aruba', NULL, NULL),
(15, 'AU', 'Australia', NULL, NULL),
(16, 'AT', 'Austria', NULL, NULL),
(17, 'AZ', 'Azerbaijan', NULL, NULL),
(18, 'BS', 'Bahamas', NULL, NULL),
(19, 'BH', 'Bahrain', NULL, NULL),
(20, 'BD', 'Bangladesh', NULL, NULL),
(21, 'BB', 'Barbados', NULL, NULL),
(22, 'BY', 'Belarus', NULL, NULL),
(23, 'BE', 'Belgium', NULL, NULL),
(24, 'BZ', 'Belize', NULL, NULL),
(25, 'BJ', 'Benin', NULL, NULL),
(26, 'BM', 'Bermuda', NULL, NULL),
(27, 'BT', 'Bhutan', NULL, NULL),
(28, 'BO', 'Bolivia', NULL, NULL),
(29, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(30, 'BW', 'Botswana', NULL, NULL),
(31, 'BV', 'Bouvet Island', NULL, NULL),
(32, 'BR', 'Brazil', NULL, NULL),
(33, 'IO', 'British lndian Ocean Territory', NULL, NULL),
(34, 'BN', 'Brunei Darussalam', NULL, NULL),
(35, 'BG', 'Bulgaria', NULL, NULL),
(36, 'BF', 'Burkina Faso', NULL, NULL),
(37, 'BI', 'Burundi', NULL, NULL),
(38, 'KH', 'Cambodia', NULL, NULL),
(39, 'CM', 'Cameroon', NULL, NULL),
(40, 'CV', 'Cape Verde', NULL, NULL),
(41, 'KY', 'Cayman Islands', NULL, NULL),
(42, 'CF', 'Central African Republic', NULL, NULL),
(43, 'TD', 'Chad', NULL, NULL),
(44, 'CL', 'Chile', NULL, NULL),
(45, 'CN', 'China', NULL, NULL),
(46, 'CX', 'Christmas Island', NULL, NULL),
(47, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(48, 'CO', 'Colombia', NULL, NULL),
(49, 'KM', 'Comoros', NULL, NULL),
(50, 'CG', 'Congo', NULL, NULL),
(51, 'CK', 'Cook Islands', NULL, NULL),
(52, 'CR', 'Costa Rica', NULL, NULL),
(53, 'HR', 'Croatia (Hrvatska)', NULL, NULL),
(54, 'CU', 'Cuba', NULL, NULL),
(55, 'CY', 'Cyprus', NULL, NULL),
(56, 'CZ', 'Czech Republic', NULL, NULL),
(57, 'DK', 'Denmark', NULL, NULL),
(58, 'DJ', 'Djibouti', NULL, NULL),
(59, 'DM', 'Dominica', NULL, NULL),
(60, 'DO', 'Dominican Republic', NULL, NULL),
(61, 'TP', 'East Timor', NULL, NULL),
(62, 'EC', 'Ecudaor', NULL, NULL),
(63, 'EG', 'Egypt', NULL, NULL),
(64, 'SV', 'El Salvador', NULL, NULL),
(65, 'GQ', 'Equatorial Guinea', NULL, NULL),
(66, 'ER', 'Eritrea', NULL, NULL),
(67, 'EE', 'Estonia', NULL, NULL),
(68, 'ET', 'Ethiopia', NULL, NULL),
(69, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL),
(70, 'FO', 'Faroe Islands', NULL, NULL),
(71, 'FJ', 'Fiji', NULL, NULL),
(72, 'FI', 'Finland', NULL, NULL),
(73, 'FR', 'France', NULL, NULL),
(74, 'FX', 'France, Metropolitan', NULL, NULL),
(75, 'GF', 'French Guiana', NULL, NULL),
(76, 'PF', 'French Polynesia', NULL, NULL),
(77, 'TF', 'French Southern Territories', NULL, NULL),
(78, 'GA', 'Gabon', NULL, NULL),
(79, 'GM', 'Gambia', NULL, NULL),
(80, 'GE', 'Georgia', NULL, NULL),
(81, 'DE', 'Germany', NULL, NULL),
(82, 'GH', 'Ghana', NULL, NULL),
(83, 'GI', 'Gibraltar', NULL, NULL),
(84, 'GR', 'Greece', NULL, NULL),
(85, 'GL', 'Greenland', NULL, NULL),
(86, 'GD', 'Grenada', NULL, NULL),
(87, 'GP', 'Guadeloupe', NULL, NULL),
(88, 'GU', 'Guam', NULL, NULL),
(89, 'GT', 'Guatemala', NULL, NULL),
(90, 'GN', 'Guinea', NULL, NULL),
(91, 'GW', 'Guinea-Bissau', NULL, NULL),
(92, 'GY', 'Guyana', NULL, NULL),
(93, 'HT', 'Haiti', NULL, NULL),
(94, 'HM', 'Heard and Mc Donald Islands', NULL, NULL),
(95, 'HN', 'Honduras', NULL, NULL),
(96, 'HK', 'Hong Kong', NULL, NULL),
(97, 'HU', 'Hungary', NULL, NULL),
(98, 'IS', 'Iceland', NULL, NULL),
(99, 'IN', 'India', NULL, NULL),
(100, 'ID', 'Indonesia', NULL, NULL),
(101, 'IR', 'Iran (Islamic Republic of)', NULL, NULL),
(102, 'IQ', 'Iraq', NULL, NULL),
(103, 'IE', 'Ireland', NULL, NULL),
(104, 'IL', 'Israel', NULL, NULL),
(105, 'IT', 'Italy', NULL, NULL),
(106, 'CI', 'Ivory Coast', NULL, NULL),
(107, 'JM', 'Jamaica', NULL, NULL),
(108, 'JP', 'Japan', NULL, NULL),
(109, 'JO', 'Jordan', NULL, NULL),
(110, 'KZ', 'Kazakhstan', NULL, NULL),
(111, 'KE', 'Kenya', NULL, NULL),
(112, 'KI', 'Kiribati', NULL, NULL),
(113, 'KP', 'Korea, Democratic People\'s Republic of', NULL, NULL),
(114, 'KR', 'Korea, Republic of', NULL, NULL),
(115, 'KW', 'Kuwait', NULL, NULL),
(116, 'KG', 'Kyrgyzstan', NULL, NULL),
(117, 'LA', 'Lao People\'s Democratic Republic', NULL, NULL),
(118, 'LV', 'Latvia', NULL, NULL),
(119, 'LB', 'Lebanon', NULL, NULL),
(120, 'LS', 'Lesotho', NULL, NULL),
(121, 'LR', 'Liberia', NULL, NULL),
(122, 'LY', 'Libyan Arab Jamahiriya', NULL, NULL),
(123, 'LI', 'Liechtenstein', NULL, NULL),
(124, 'LT', 'Lithuania', NULL, NULL),
(125, 'LU', 'Luxembourg', NULL, NULL),
(126, 'MO', 'Macau', NULL, NULL),
(127, 'MK', 'Macedonia', NULL, NULL),
(128, 'MG', 'Madagascar', NULL, NULL),
(129, 'MW', 'Malawi', NULL, NULL),
(130, 'MY', 'Malaysia', NULL, NULL),
(131, 'MV', 'Maldives', NULL, NULL),
(132, 'ML', 'Mali', NULL, NULL),
(133, 'MT', 'Malta', NULL, NULL),
(134, 'MH', 'Marshall Islands', NULL, NULL),
(135, 'MQ', 'Martinique', NULL, NULL),
(136, 'MR', 'Mauritania', NULL, NULL),
(137, 'MU', 'Mauritius', NULL, NULL),
(138, 'TY', 'Mayotte', NULL, NULL),
(139, 'MX', 'Mexico', NULL, NULL),
(140, 'FM', 'Micronesia, Federated States of', NULL, NULL),
(141, 'MD', 'Moldova, Republic of', NULL, NULL),
(142, 'MC', 'Monaco', NULL, NULL),
(143, 'MN', 'Mongolia', NULL, NULL),
(144, 'MS', 'Montserrat', NULL, NULL),
(145, 'MA', 'Morocco', NULL, NULL),
(146, 'MZ', 'Mozambique', NULL, NULL),
(147, 'MM', 'Myanmar', NULL, NULL),
(148, 'NA', 'Namibia', NULL, NULL),
(149, 'NR', 'Nauru', NULL, NULL),
(150, 'NP', 'Nepal', NULL, NULL),
(151, 'NL', 'Netherlands', NULL, NULL),
(152, 'AN', 'Netherlands Antilles', NULL, NULL),
(153, 'NC', 'New Caledonia', NULL, NULL),
(154, 'NZ', 'New Zealand', NULL, NULL),
(155, 'NI', 'Nicaragua', NULL, NULL),
(156, 'NE', 'Niger', NULL, NULL),
(157, 'NG', 'Nigeria', NULL, NULL),
(158, 'NU', 'Niue', NULL, NULL),
(159, 'NF', 'Norfork Island', NULL, NULL),
(160, 'MP', 'Northern Mariana Islands', NULL, NULL),
(161, 'NO', 'Norway', NULL, NULL),
(162, 'OM', 'Oman', NULL, NULL),
(163, 'PK', 'Pakistan', NULL, NULL),
(164, 'PW', 'Palau', NULL, NULL),
(165, 'PA', 'Panama', NULL, NULL),
(166, 'PG', 'Papua New Guinea', NULL, NULL),
(167, 'PY', 'Paraguay', NULL, NULL),
(168, 'PE', 'Peru', NULL, NULL),
(169, 'PH', 'Philippines', NULL, NULL),
(170, 'PN', 'Pitcairn', NULL, NULL),
(171, 'PL', 'Poland', NULL, NULL),
(172, 'PT', 'Portugal', NULL, NULL),
(173, 'PR', 'Puerto Rico', NULL, NULL),
(174, 'QA', 'Qatar', NULL, NULL),
(175, 'RE', 'Reunion', NULL, NULL),
(176, 'RO', 'Romania', NULL, NULL),
(177, 'RU', 'Russian Federation', NULL, NULL),
(178, 'RW', 'Rwanda', NULL, NULL),
(179, 'KN', 'Saint Kitts and Nevis', NULL, NULL),
(180, 'LC', 'Saint Lucia', NULL, NULL),
(181, 'VC', 'Saint Vincent and the Grenadines', NULL, NULL),
(182, 'WS', 'Samoa', NULL, NULL),
(183, 'SM', 'San Marino', NULL, NULL),
(184, 'ST', 'Sao Tome and Principe', NULL, NULL),
(185, 'SA', 'Saudi Arabia', NULL, NULL),
(186, 'SN', 'Senegal', NULL, NULL),
(187, 'SC', 'Seychelles', NULL, NULL),
(188, 'SL', 'Sierra Leone', NULL, NULL),
(189, 'SG', 'Singapore', NULL, NULL),
(190, 'SK', 'Slovakia', NULL, NULL),
(191, 'SI', 'Slovenia', NULL, NULL),
(192, 'SB', 'Solomon Islands', NULL, NULL),
(193, 'SO', 'Somalia', NULL, NULL),
(194, 'ZA', 'South Africa', NULL, NULL),
(195, 'GS', 'South Georgia South Sandwich Islands', NULL, NULL),
(196, 'ES', 'Spain', NULL, NULL),
(197, 'LK', 'Sri Lanka', NULL, NULL),
(198, 'SH', 'St. Helena', NULL, NULL),
(199, 'PM', 'St. Pierre and Miquelon', NULL, NULL),
(200, 'SD', 'Sudan', NULL, NULL),
(201, 'SR', 'Suriname', NULL, NULL),
(202, 'SJ', 'Svalbarn and Jan Mayen Islands', NULL, NULL),
(203, 'SZ', 'Swaziland', NULL, NULL),
(204, 'SE', 'Sweden', NULL, NULL),
(205, 'CH', 'Switzerland', NULL, NULL),
(206, 'SY', 'Syrian Arab Republic', NULL, NULL),
(207, 'TW', 'Taiwan', NULL, NULL),
(208, 'TJ', 'Tajikistan', NULL, NULL),
(209, 'TZ', 'Tanzania, United Republic of', NULL, NULL),
(210, 'TH', 'Thailand', NULL, NULL),
(211, 'TG', 'Togo', NULL, NULL),
(212, 'TK', 'Tokelau', NULL, NULL),
(213, 'TO', 'Tonga', NULL, NULL),
(214, 'TT', 'Trinidad and Tobago', NULL, NULL),
(215, 'TN', 'Tunisia', NULL, NULL),
(216, 'TR', 'Turkey', NULL, NULL),
(217, 'TM', 'Turkmenistan', NULL, NULL),
(218, 'TC', 'Turks and Caicos Islands', NULL, NULL),
(219, 'TV', 'Tuvalu', NULL, NULL),
(220, 'UG', 'Uganda', NULL, NULL),
(221, 'UA', 'Ukraine', NULL, NULL),
(222, 'AE', 'United Arab Emirates', NULL, NULL),
(223, 'GB', 'United Kingdom', NULL, NULL),
(224, 'UM', 'United States minor outlying islands', NULL, NULL),
(225, 'UY', 'Uruguay', NULL, NULL),
(226, 'UZ', 'Uzbekistan', NULL, NULL),
(227, 'VU', 'Vanuatu', NULL, NULL),
(228, 'VA', 'Vatican City State', NULL, NULL),
(229, 'VE', 'Venezuela', NULL, NULL),
(230, 'VN', 'Vietnam', NULL, NULL),
(231, 'VG', 'Virigan Islands (British)', NULL, NULL),
(232, 'VI', 'Virgin Islands (U.S.)', NULL, NULL),
(233, 'WF', 'Wallis and Futuna Islands', NULL, NULL),
(234, 'EH', 'Western Sahara', NULL, NULL),
(235, 'YE', 'Yemen', NULL, NULL),
(236, 'YU', 'Yugoslavia', NULL, NULL),
(237, 'ZR', 'Zaire', NULL, NULL),
(238, 'ZM', 'Zambia', NULL, NULL),
(239, 'ZW', 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(8,4) NOT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_shipping` tinyint(4) NOT NULL,
  `minimum_spend` decimal(8,4) DEFAULT NULL,
  `maximum_spend` decimal(8,4) DEFAULT NULL,
  `usage_limit_per_coupon` int(11) DEFAULT NULL,
  `usage_limit_per_customer` int(11) DEFAULT NULL,
  `used` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `slug`, `coupon_code`, `value`, `discount_type`, `free_shipping`, `minimum_spend`, `maximum_spend`, `usage_limit_per_coupon`, `usage_limit_per_customer`, `used`, `is_active`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 'anniversary', 'HAPPY2020', '12.0000', 'fixed', 0, '10.0000', '20.0000', NULL, NULL, 0, 0, '1970-01-01', '1970-01-01', '2021-04-18 16:40:23', '2021-07-27 00:00:29'),
(8, 'dhama-offer', 'Offer2021', '20.0000', 'percent', 0, '15.0000', '25.0000', 50, 30, 0, 1, '2021-04-19', '2021-04-24', '2021-04-19 05:39:08', '2021-09-24 23:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_categories`
--

CREATE TABLE `coupon_categories` (
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_categories`
--

INSERT INTO `coupon_categories` (`coupon_id`, `category_id`) VALUES
(8, 13);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_products`
--

CREATE TABLE `coupon_products` (
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_products`
--

INSERT INTO `coupon_products` (`coupon_id`, `product_id`) VALUES
(8, 6),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_translations`
--

CREATE TABLE `coupon_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_translations`
--

INSERT INTO `coupon_translations` (`id`, `coupon_id`, `locale`, `coupon_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'en', 'Anniversary', '2021-04-18 16:40:23', '2021-04-18 16:40:23'),
(7, 8, 'en', 'Dhamaka Offer', '2021-04-19 05:39:08', '2021-04-19 13:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_name`, `currency_code`, `created_at`, `updated_at`) VALUES
(1, 'United Arab Emirates Dirham', 'AED', NULL, NULL),
(2, 'Afghan Afghani', 'AFN', NULL, NULL),
(3, 'Albanian Lek', 'ALL', NULL, NULL),
(4, 'Bangladesh Taka', 'BDT', NULL, NULL),
(5, 'Indian Rupee', 'INR', NULL, NULL),
(6, 'United States Dollar', 'USD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currency_rates`
--

CREATE TABLE `currency_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_rate` decimal(8,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency_rates`
--

INSERT INTO `currency_rates` (`id`, `currency_name`, `currency_code`, `currency_rate`, `created_at`, `updated_at`) VALUES
(107, 'Bangladesh Taka', 'BDT', NULL, '2021-09-29 03:14:13', '2021-09-29 03:14:13'),
(108, 'Indian Rupee', 'INR', NULL, '2021-09-29 03:14:13', '2021-09-29 03:14:13'),
(109, 'United States Dollar', 'USD', NULL, '2021-09-29 03:14:13', '2021-09-29 03:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `first_name`, `last_name`, `username`, `phone`, `email`, `image`, `password`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 21, 'Promi', 'Chy', 'promi98', '01777703433', 'promi00@gmail.com', 'images/customers/xs7Km7I4tG.webp', '$2y$10$0e6m6BmLQvDkut1xv.Ff7eaQYHhPD6wUpKdcI2AXZ.LhVhMUsbTFC', 0, '2021-10-11 09:01:44', '2021-10-11 09:01:44'),
(3, 23, 'Abir', 'Shanto', 'Abir95', '01548741214', 'abir@gmail.com', NULL, '$2y$10$JXPxVB/3uHhFoaUDhRTj9uJ6/WN4E/jrsAKY9F/f/WAYJO4TxE2pK', 0, '2021-10-13 22:35:10', '2021-10-13 22:35:10'),
(4, 24, 'Ruby', 'Khatun', 'ruby95', '45646454', 'ruby@gmail.com', NULL, '$2y$10$LZ5sDEmGl2H2RGRLMg0C0OyIEzRH9nOXrZzHTfbyE8dBrlgCo9Rse', 0, '2021-10-19 23:26:38', '2021-10-19 23:26:38'),
(5, 25, 'fahamina', 'Chowdhury', 'fahamina95', '1567685454', 'fahamina@gmail.com', NULL, '$2y$10$2QARKVR48tF1Uwvtam2LS.nqKAs12OGonogfYg5VnsNJxc1jGTn.6', 0, '2021-10-20 01:20:22', '2021-10-20 01:20:22'),
(6, 26, 'Maimul', 'islam', 'mainul95', '01521222515', 'mainul@gmail.com', NULL, '$2y$10$VJDRzwfnDfrmfbvSCUj/lOOE9V0KMzpC3vfGGAAkCSzcvKpjvD.g.', 0, '2021-10-20 12:54:13', '2021-10-20 12:54:13');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sales`
--

CREATE TABLE `flash_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flash_sales`
--

INSERT INTO `flash_sales` (`id`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'dhamaka-offer', 1, '2021-03-27 13:52:24', '2021-07-26 21:54:22'),
(2, 'boom-offer', 0, '2021-03-27 14:13:55', '2021-07-26 21:49:36'),
(3, 'awesome-offer', 0, '2021-03-27 14:20:24', '2021-07-26 21:48:52'),
(4, 'winter-offer', 1, '2021-03-27 14:35:15', '2021-07-26 21:54:22'),
(5, 'rainy-offer', 1, '2021-03-27 14:37:48', '2021-07-26 21:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale_products`
--

CREATE TABLE `flash_sale_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flash_sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `end_date` date NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flash_sale_products`
--

INSERT INTO `flash_sale_products` (`id`, `flash_sale_id`, `product_id`, `end_date`, `price`, `qty`, `position`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-03-18', '78.00', 45, 0, '2021-03-27 13:52:24', '2021-03-27 13:52:24'),
(2, 1, 3, '2022-12-28', '47.00', 22, 0, '2021-03-27 13:52:24', '2021-03-27 13:52:24'),
(3, 2, 1, '2021-03-31', '65.00', 45, 0, '2021-03-27 14:13:55', '2021-03-27 14:13:55'),
(4, 2, 2, '2021-03-30', '78.00', 63, 0, '2021-03-27 14:13:55', '2021-03-27 14:13:55'),
(5, 3, 1, '2021-03-28', '65.00', 45, 0, '2021-03-27 14:20:24', '2021-03-27 14:20:24'),
(6, 3, 2, '2021-03-29', '78.00', 63, 0, '2021-03-27 14:20:24', '2021-03-27 14:20:24'),
(7, 3, 3, '2021-03-30', '63.00', 79, 0, '2021-03-27 14:20:24', '2021-03-27 14:20:24'),
(8, 4, 3, '2021-03-17', '65.00', 45, 0, '2021-03-27 14:35:15', '2021-03-27 14:35:15'),
(9, 4, 1, '2021-03-17', '85.00', 63, 0, '2021-03-27 14:35:15', '2021-03-27 14:35:15'),
(11, 5, 4, '2021-03-24', '87.00', 85, 0, '2021-03-27 14:37:48', '2021-03-27 14:37:48'),
(12, 5, 3, '2021-03-02', '78.00', 45, 0, NULL, NULL),
(13, 1, 4, '2022-10-26', '50.00', 10, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale_translations`
--

CREATE TABLE `flash_sale_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flash_sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campaign_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flash_sale_translations`
--

INSERT INTO `flash_sale_translations` (`id`, `flash_sale_id`, `local`, `campaign_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Dhamaka Offer', '2021-03-27 13:52:24', '2021-03-27 13:52:24'),
(2, 2, 'en', 'Boom Offer', '2021-03-27 14:13:55', '2021-03-27 14:13:55'),
(3, 3, 'en', 'Awesome Offer', '2021-03-27 14:20:24', '2021-03-27 14:20:24'),
(4, 4, 'en', 'Winter Offer', '2021-03-27 14:35:15', '2021-03-27 14:35:15'),
(5, 5, 'en', 'Rainy Offer', '2021-03-27 14:37:48', '2021-03-27 14:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img_order` int(5) NOT NULL DEFAULT '0',
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
(11, 'Bangla', 'bn', 0, '2021-02-19 10:24:49', '2021-09-02 01:08:54'),
(12, 'France', 'fr', 0, '2021-02-19 10:33:38', '2021-02-21 11:23:33'),
(15, 'Chinese', 'cn', 0, '2021-02-21 11:23:18', '2021-02-22 00:21:51'),
(17, 'Spanish', 'sn', 0, '2021-09-12 04:21:28', '2021-09-12 04:21:28'),
(18, 'Arabic', 'ar', 0, '2021-10-10 06:02:48', '2021-10-10 06:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'primary-menu', 1, '2021-08-22 19:30:03', '2021-08-22 19:30:03'),
(4, 'category-menu', 1, '2021-08-23 05:10:08', '2021-08-23 05:10:08'),
(5, 'home-page-menu', 1, '2021-10-23 23:18:18', '2021-10-23 23:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` bigint(20) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `locale`, `label`, `link`, `parent`, `sort`, `class`, `menu`, `depth`, `created_at`, `updated_at`) VALUES
(1, 'en', 'Tiktok', 'https://www.facebook.com/Test', 0, 0, NULL, 4, 0, '2021-08-23 05:15:10', '2021-09-13 05:19:11'),
(2, 'en', 'Youtube', 'https://www.youtube.com/', 0, 0, NULL, 3, 0, '2021-08-23 06:12:19', '2021-09-13 06:15:12'),
(3, 'en', 'Linked In', 'https://bd.linkedin.com/', 2, 1, NULL, 3, 1, '2021-08-23 06:15:06', '2021-09-13 06:15:12'),
(4, 'en', 'Samsung', 'https://www.samsung.com/', 0, 1, NULL, 4, 0, '2021-08-23 06:17:39', '2021-09-02 00:51:21'),
(5, 'en', 'Twitter', 'https://bd.linkedin.com/', 0, 2, NULL, 4, 0, '2021-08-23 06:22:38', '2021-08-28 00:32:43'),
(6, 'en', 'Facebook', 'https://www.facebook.com/', 3, 2, NULL, 3, 2, '2021-08-23 15:57:45', '2021-09-13 06:15:12'),
(7, 'en', 'Samsung', 'https://www.samsung.com/us/', 0, 3, NULL, 3, 0, '2021-09-13 06:13:24', '2021-09-13 07:04:13'),
(8, 'en', 'Furniture', '#', 0, 4, NULL, 3, 0, '2021-09-13 06:15:30', '2021-09-13 07:04:13'),
(9, 'en', 'Otobi', 'https://otobi.com/', 8, 5, NULL, 3, 1, '2021-09-13 06:16:17', '2021-09-13 07:04:13'),
(10, 'en', 'RFL', 'https://www.rflbd.com/', 8, 6, NULL, 3, 1, '2021-09-13 06:16:32', '2021-09-13 07:04:13'),
(11, 'en', 'Chair', 'http://lion-coders.com/', 10, 7, NULL, 3, 2, '2021-09-13 07:00:22', '2021-09-13 07:04:23'),
(12, 'en', 'Panasonic', 'https://www.facebook.com/', 10, 8, NULL, 3, 2, '2021-09-13 07:05:05', '2021-09-13 07:05:11'),
(13, NULL, 'About Us', 'https://fleetcart.envaysoft.com/en', 0, 0, NULL, 5, 0, '2021-10-24 00:03:12', '2021-10-24 00:34:37'),
(14, NULL, 'Terms of Service', 'http://cartpro.test/page/terms-&-conditions', 0, 1, NULL, 5, 0, '2021-10-24 00:03:36', '2021-10-24 05:21:04'),
(15, NULL, 'FAQ', 'http://cartpro.test/page/faq', 0, 2, NULL, 5, 0, '2021-10-24 00:03:54', '2021-10-24 22:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `menu_translations`
--

CREATE TABLE `menu_translations` (
  `id` bigint(20) NOT NULL,
  `menu_id` bigint(20) DEFAULT NULL,
  `locale` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_translations`
--

INSERT INTO `menu_translations` (`id`, `menu_id`, `locale`, `menu_name`, `created_at`, `updated_at`) VALUES
(2, 3, 'en', 'Primary Menu', '2021-08-22 19:30:03', '2021-08-23 16:37:27'),
(3, 4, 'en', 'Category Menu', '2021-08-23 05:10:08', '2021-09-02 00:51:30'),
(10, 3, 'bn', 'প্রাইমারী মেনু', '2021-08-23 17:37:07', '2021-08-23 17:39:31'),
(11, 5, 'en', 'Home Page Menu', '2021-10-23 23:18:18', '2021-10-23 23:18:18');

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
(34, '2021_02_04_043043_create_navigations_table', 12),
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
(222, '2021_10_25_124957_create_reviews_table', 68);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\User', 1),
(1, 'App\\User', 6),
(6, 'App\\User', 7),
(6, 'App\\User', 8),
(6, 'App\\User', 9),
(4, 'App\\User', 10);

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
  `url` text COLLATE utf8mb4_unicode_ci,
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
(4, 'Social Site', 'url', NULL, NULL, '#', 'new_tab', NULL, '1', '2021-02-05 10:53:32', '2021-02-05 10:53:32'),
(5, 'Facebook', 'url', NULL, NULL, 'https://www.facebook.com/', 'new_tab', 4, '1', '2021-02-05 11:19:34', '2021-02-05 11:19:34'),
(6, 'Youtube', 'url', NULL, NULL, 'https://www.youtube.com/', 'new_tab', 4, '1', '2021-02-05 12:23:28', '2021-02-05 12:23:28'),
(7, 'Newspaper', 'url', NULL, NULL, '#', 'new_tab', NULL, '1', '2021-02-05 12:24:34', '2021-02-05 12:24:34'),
(8, 'Prthom-Alo', 'url', NULL, NULL, 'https://www.prothomalo.com/', 'new_tab', 7, '1', '2021-02-05 12:26:06', '2021-02-05 12:26:06'),
(9, 'Dainik Azadi', 'url', NULL, NULL, 'https://dainikazadi.net/', 'new_tab', 7, '1', '2021-02-05 12:26:45', '2021-02-05 12:26:45'),
(13, 'Men\'s Fashion', 'category', 1, NULL, NULL, 'same_tab', NULL, '1', '2021-02-05 22:20:04', '2021-02-05 22:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'johncena@hotmail.com', '2021-10-04 22:45:01', '2021-10-04 22:45:01'),
(2, 'irfanchowdhury80@gmail.com', '2021-10-04 22:47:36', '2021-10-04 22:47:36'),
(3, 'samu@gmail.com', '2021-10-04 23:12:21', '2021-10-04 23:12:21'),
(5, 'fahim95@gmail.com', '2021-10-04 23:14:04', '2021-10-04 23:14:04'),
(6, 'samu98@gmail.com', '2021-10-04 23:15:53', '2021-10-04 23:15:53'),
(7, 'irfanchowdhury434@gmail.com', '2021-10-04 23:17:28', '2021-10-04 23:17:28'),
(8, 'shamim@gmail.com', '2021-10-04 23:19:16', '2021-10-04 23:19:16'),
(9, 'admin@gmail.com', '2021-10-04 23:19:32', '2021-10-04 23:19:32'),
(10, 'johncena65@hotmail.com', '2021-10-04 23:22:11', '2021-10-04 23:22:11'),
(11, 'admin98@gmail.com', '2021-10-04 23:33:59', '2021-10-04 23:33:59'),
(12, 'teast34@gmail.com', '2021-10-04 23:35:05', '2021-10-04 23:35:05'),
(13, 'irfanchowdhury12@gmail.com', '2021-10-04 23:36:25', '2021-10-04 23:36:25'),
(14, 'nasrinchowdhury198@gmal.com', '2021-10-05 01:35:43', '2021-10-05 01:35:43'),
(15, 'zuhair2025@gmail.com', '2021-10-05 01:37:39', '2021-10-05 01:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `billing_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `billing_first_name`, `billing_last_name`, `billing_email`, `billing_phone`, `billing_country`, `billing_address_1`, `billing_address_2`, `billing_city`, `billing_state`, `billing_zip_code`, `shipping_method`, `shipping_cost`, `payment_method`, `coupon_id`, `payment_id`, `discount`, `total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 21, 'Irfan', 'Chowdhury', 'irfanchowdhury', '01829498634', 'Bangladesh', 'Chitagong', NULL, 'Chitagong', 'Chitagong', 'Free', 'Paypal', '10', 'Paypal', NULL, NULL, NULL, '20', 'pending', '2021-10-13 00:36:00', '2021-10-13 00:36:00'),
(2, 21, 'Irfan', 'Chowdhury', 'irfanchowdhury', '01829498634', 'Bangladesh', 'Chitagong', NULL, 'Chitagong', 'Chitagong', 'Free', 'Paypal', '10', 'Paypal', NULL, NULL, NULL, '20', 'completed', '2021-10-13 00:54:41', '2021-10-13 00:54:41'),
(9, 21, 'First Name', 'Chowdhury', 'samu@gmail.com', '01829498634', 'Afghanistan', 'Muradpur', NULL, 'Chittagong', 'Chittagong', '4687', 'Paypal', '10', 'Paid By Paypal', NULL, '3X486290H1176245D', NULL, '1000', 'completed', '2021-10-13 05:14:20', '2021-10-13 05:14:20'),
(10, 21, 'First Name', 'Chowdhury', 'samu@gmail.com', '01829498634', 'Afghanistan', 'Muradpur', NULL, 'Chittagong', 'Chittagong', '4687', 'Paypal', '10', 'Paid By Paypal', NULL, '60401147XJ116644V', NULL, '1000', 'completed', '2021-10-13 05:16:11', '2021-10-13 05:16:11'),
(11, 21, 'Fahamina', 'Chy', 'test@gmail.com', '456874', 'Afghanistan', 'Hathazary', NULL, 'Chittagong', 'Chittagong', '46564', 'Paypal', '10', 'Paid By Paypal', NULL, '7CK5159532467043M', NULL, '1000', 'completed', '2021-10-13 05:34:01', '2021-10-13 05:34:01'),
(12, 21, 'Abir', 'Shanto', 'abir@gmail.com', '01548741214', 'Canada', 'halishohor', NULL, 'Chittagong', 'Bangladesh', '4330', 'Paypal', '10', 'Paid By Paypal', NULL, '8YY35375KF236241W', NULL, '1000', 'completed', '2021-10-13 22:37:01', '2021-10-13 22:37:01'),
(14, 21, 'Abdullah', 'khan', 'abdullah@gmail.com', '454867861', 'Algeria', 'Muradpur', NULL, 'Chittagong', 'Chittagong', '4330', 'Paypal', '10', 'Paid By Paypal', NULL, '2KV29378FE790734P', NULL, '1000', 'completed', '2021-10-14 00:55:46', '2021-10-14 00:55:46'),
(15, 21, 'Abdullah', 'khan', 'abdullah@gmail.com', '454867861', 'Algeria', 'Muradpur', NULL, 'Chittagong', 'Chittagong', '4330', 'Paypal', '10', 'Paid By Paypal', NULL, '80L03583FP394253L', NULL, '1000', 'completed', '2021-10-14 00:58:31', '2021-10-14 00:58:31'),
(16, 21, 'Raihan', 'Sharif', 'raihan@gmail.com', '154897164564', 'Canada', 'Aman Bazar', NULL, 'Aman Bazar', 'Bangladesh', '4330', 'Paypal', '10', 'Paid By Paypal', NULL, '8HN96594591745358', NULL, '1000', 'completed', '2021-10-14 01:02:32', '2021-10-14 01:02:32'),
(17, 21, 'Raihan', 'Sharif', 'raihan@gmail.com', '154897164564', 'Canada', 'Aman Bazar', NULL, 'Aman Bazar', 'Bangladesh', '4330', 'Paypal', '10', 'Paid By Paypal', NULL, '8HN96594591745358', NULL, '1000', 'completed', '2021-10-14 01:03:01', '2021-10-14 01:03:01'),
(24, NULL, 'Fahim', 'Khan', 'fahim@gmail.com', '124787', 'Afghanistan', 'Muradpur', NULL, 'Muradpur', 'Bangladesh', '4330', 'Paypal', '10', 'Paid By Paypal', NULL, '9CT05148SW746713K', NULL, '1000', 'completed', '2021-10-15 20:13:11', '2021-10-15 20:13:11'),
(25, 1, 'Fahim', 'Khanna', 'khanna @gmail.com', '464321347', 'Afghanistan', 'Muradpur', NULL, 'Chittagong', 'Chittagong', '4330', 'Paypal', '10', 'Paid By Paypal', NULL, '3M798286JS1795254', NULL, '0', 'canceled', '2021-10-15 21:54:51', '2021-10-15 21:54:51'),
(26, NULL, 'Pathan', 'Chowdhury', 'pathan@gmail.com', '16467774646', 'Canada', 'Muradpur', NULL, 'Muradpur', 'Bangladesh', '4330', 'Free', '10', 'Stripe', NULL, 'tok_1JmX2ySBbimX2c4JtWJglTZM', NULL, '1000', 'completed', '2021-10-19 23:09:03', '2021-10-19 23:09:03'),
(27, NULL, 'Ruby', 'Khatun', 'ruby@gmail.com', '45646454', 'Bangladesh', 'Modonhat', NULL, 'Chittagong', 'Chittagong', '4330', 'Free', '10', 'Stripe', NULL, 'tok_1JmXd9SBbimX2c4JOsVdiD5h', NULL, '1000', 'completed', '2021-10-19 23:46:25', '2021-10-19 23:46:25'),
(28, NULL, 'Ruby', 'Khatun', 'ruby@gmail.com', '45646454', 'Bangladesh', 'Modonhat', NULL, 'Chittagong', 'Chittagong', '4330', 'Free', '10', 'Stripe', NULL, 'tok_1JmXe1SBbimX2c4JqEupeAc0', NULL, '0', 'canceled', '2021-10-19 23:47:19', '2021-10-19 23:47:19'),
(29, NULL, 'Ruby', 'Khatun', 'ruby@gmail.com', '45646454', 'Bangladesh', 'Modonhat', NULL, 'Chittagong', 'Chittagong', '4330', 'Free', '10', 'Stripe', NULL, 'tok_1JmYTWSBbimX2c4JX412G9Rd', NULL, '0', 'canceled', '2021-10-20 00:40:33', '2021-10-20 00:40:33'),
(30, NULL, 'Ruby', 'Khatun', 'ruby@gmail.com', '45646454', 'Bangladesh', 'Modonhat', NULL, 'Chittagong', 'Chittagong', '4330', 'Free', '10', 'Stripe', NULL, 'tok_1JmYTWSBbimX2c4JARHoYKfY', NULL, '0', 'canceled', '2021-10-20 00:40:33', '2021-10-20 00:40:33'),
(31, NULL, 'fahamina', 'Chowdhury', 'fahamina@gmail.com', '1567685454', 'Canada', 'Muradpur', NULL, 'Chittagong', 'Chittagong', '4330', 'Free', '10', 'Stripe', NULL, 'tok_1JmZ62SBbimX2c4J76rfr2EW', NULL, '1000', 'completed', '2021-10-20 01:20:20', '2021-10-20 01:20:20'),
(32, 26, 'Maimul', 'islam', 'mainul@gmail.com', '01521222515', 'United States', 'Murapur', NULL, 'Chittagong', 'Chittagong', '4330', 'Free', '10', 'Stripe', NULL, 'tok_1JmjvVSBbimX2c4JqAGrGhiw', NULL, '1000', 'completed', '2021-10-20 12:54:12', '2021-10-20 12:54:12'),
(33, 26, 'Maimul', 'islam', 'mainul@gmail.com', '01521222515', 'United States', 'Murapur', NULL, 'Chittagong', 'Chittagong', '4330', 'Free', '10', 'Stripe', NULL, 'tok_1JmjxGSBbimX2c4JZYiXlEzQ', NULL, '1000', 'completed', '2021-10-20 12:56:00', '2021-10-20 12:56:00'),
(34, 1, 'Arman', 'Ul Alam', 'arman@gmail.com', '123456789', 'Bangladesh', 'uttora', NULL, 'Dhaka', 'Dhaka', '4330', 'Free', '10', 'Stripe', NULL, 'tok_1JndqmSBbimX2c4JXvcEb9Tx', NULL, '29258', 'completed', '2021-10-23 00:37:08', '2021-10-23 04:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `brands` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` decimal(8,2) DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `subtotal` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `brands`, `categories`, `tags`, `price`, `qty`, `weight`, `image`, `options`, `tax`, `discount`, `subtotal`, `created_at`, `updated_at`) VALUES
(10, 24, 5, NULL, NULL, NULL, '1000.00', 1, 1, '/images/products/RkxnkpCNFT.webp', '{\"image\":\"\\/images\\/products\\/RkxnkpCNFT.webp\",\"product_slug\":\"samsung-a12\",\"category_id\":\"20\"}', '0.00', '0.00', '1000.00', '2021-10-15 20:13:11', '2021-10-15 20:13:11'),
(11, 32, 4, NULL, NULL, NULL, '1000.00', 1, 1, '/images/products/qqPD97Ra8q.webp', '{\"image\":\"\\/images\\/products\\/qqPD97Ra8q.webp\",\"Size\":\"2\",\"Color\":\"25\",\"product_slug\":\"richman-shirt\",\"category_id\":\"3\"}', '0.00', '0.00', '1000.00', '2021-10-15 20:13:11', '2021-10-15 20:13:11'),
(12, 25, 4, NULL, NULL, NULL, '0.02', 1, 1, '/images/products/qqPD97Ra8q.webp', '{\"image\":\"\\/images\\/products\\/qqPD97Ra8q.webp\",\"product_slug\":\"richman-shirt\",\"category_id\":\"3\"}', '0.00', '0.00', '0.02', '2021-10-15 21:54:51', '2021-10-15 21:54:51'),
(13, 26, 5, NULL, NULL, NULL, '1000.00', 1, 1, '/images/products/RkxnkpCNFT.webp', '{\"image\":\"\\/images\\/products\\/RkxnkpCNFT.webp\",\"product_slug\":\"samsung-a12\",\"category_id\":\"20\"}', '0.00', NULL, '1000.00', '2021-10-19 23:09:03', '2021-10-19 23:09:03'),
(14, 32, 6, NULL, NULL, NULL, '1000.00', 1, 1, '/images/products/RkxnkpCNFT.webp', '{\"image\":\"\\/images\\/products\\/RkxnkpCNFT.webp\",\"product_slug\":\"samsung-a12\",\"category_id\":\"20\"}', '0.00', NULL, '1000.00', '2021-10-19 23:46:25', '2021-10-19 23:46:25'),
(15, 32, 5, NULL, NULL, NULL, '1000.00', 1, 1, '/images/products/RkxnkpCNFT.webp', '{\"image\":\"\\/images\\/products\\/RkxnkpCNFT.webp\",\"product_slug\":\"samsung-a12\",\"category_id\":\"20\"}', '0.00', NULL, '1000.00', '2021-10-20 01:20:20', '2021-10-20 01:20:20'),
(16, 33, 5, NULL, NULL, NULL, '1000.00', 1, 1, '/images/products/RkxnkpCNFT.webp', '{\"image\":\"\\/images\\/products\\/RkxnkpCNFT.webp\",\"product_slug\":\"samsung-a12\",\"category_id\":\"20\"}', '0.00', NULL, '1000.00', '2021-10-20 12:56:00', '2021-10-20 12:56:00'),
(17, 34, 1, NULL, NULL, NULL, '400.00', 5, 1, '/images/products/2HKGD5LOsx.webp', '{\"image\":\"\\/images\\/products\\/2HKGD5LOsx.webp\",\"product_slug\":\"bed\",\"category_id\":\"13\"}', '0.00', NULL, '2000.00', '2021-10-23 00:37:08', '2021-10-23 00:37:08'),
(18, 34, 2, NULL, NULL, NULL, '15.00', 4, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"2\"}', '0.00', NULL, '60.00', '2021-10-23 00:37:08', '2021-10-23 00:37:08'),
(19, 34, 4, NULL, NULL, NULL, '500.00', 3, 1, '/images/products/qqPD97Ra8q.webp', '{\"image\":\"\\/images\\/products\\/qqPD97Ra8q.webp\",\"product_slug\":\"richman-shirt\",\"category_id\":\"3\"}', '0.00', NULL, '1500.00', '2021-10-23 00:37:08', '2021-10-23 00:37:08'),
(20, 34, 6, NULL, NULL, NULL, '12499.00', 2, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '0.00', NULL, '24998.00', '2021-10-23 00:37:08', '2021-10-23 00:37:08'),
(21, 34, 3, NULL, NULL, NULL, '700.13', 1, 1, '/images/products/yJAK1MqJUj.webp', '{\"image\":\"\\/images\\/products\\/yJAK1MqJUj.webp\",\"product_slug\":\"probook-430-g8-notebook-pc\",\"category_id\":\"2\"}', '0.00', NULL, '700.13', '2021-10-23 00:37:08', '2021-10-23 00:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'about-us', 1, '2021-04-19 16:24:42', '2021-04-20 01:36:43'),
(5, 'faq', 1, '2021-04-19 16:50:44', '2021-07-27 02:48:40'),
(6, 'privacy-&-policy', 1, '2021-04-20 12:02:11', '2021-04-20 12:02:11'),
(7, 'terms-&-conditions', 1, '2021-04-20 12:02:43', '2021-07-27 02:48:40'),
(8, 'return-policy', 1, '2021-04-20 12:03:28', '2021-07-27 02:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `page_name`, `body`, `created_at`, `updated_at`) VALUES
(1, 4, 'en', 'About Us', '<p>Lorem Ispum</p>', '2021-04-19 16:24:42', '2021-04-20 01:37:00'),
(2, 5, 'en', 'FAQ', '<section class=\"custom-page-wrap clearfix\">\n<div class=\"container\">\n<div class=\"custom-page-content clearfix\">\n<h1 style=\"text-align: center;\">Help &amp; FAQ</h1>\n<p>&nbsp;</p>\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>What does LOREM mean?</h4>\n<p>&lsquo;Lorem ipsum dolor sit amet, consectetur adipisici elit&hellip;&rsquo; (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts, for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word &lsquo;Lorem&rsquo; does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>Why do we use it?</h4>\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>Where does it come from?</h4>\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>Where can I get some?</h4>\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>Why do we use Lorem Ipsum?</h4>\n<p>Many times, readers will get distracted by readable text when looking at the layout of a page. Instead of using filler text that says &ldquo;Insert content here,&rdquo; Lorem Ipsum uses a normal distribution of letters, making it resemble standard English. This makes it easier for designers to focus on visual elements, as opposed to what the text on a page actually says. Lorem Ipsum is absolutely necessary in most design cases, too. Web design projects like landing pages, website redesigns and so on only look as intended when they\'re fully-fleshed out with content.</p>\n</div>\n</div>\n</section>', '2021-04-19 16:50:44', '2021-10-24 22:01:57'),
(3, 6, 'en', 'Privacy & Policy', '<p>This is Testing Purpose</p>', '2021-04-20 12:02:11', '2021-04-20 12:02:11'),
(4, 7, 'en', 'Terms & Conditions', '<section class=\"custom-page-wrap clearfix\">\n<div class=\"container\">\n<div class=\"custom-page-content clearfix\">\n<h1 style=\"text-align: center;\">Terms of Service</h1>\n<p>&nbsp;</p>\n<p>This website is operated by a.season. Throughout the site, the terms &ldquo;we&rdquo;, &ldquo;us&rdquo; and &ldquo;our&rdquo; refer to a.season. a.season offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.</p>\n<p>&nbsp;</p>\n<p>By visiting our site and/ or purchasing something from us, you engage in our &ldquo;Service&rdquo; and agree to be bound by the following terms and conditions (&ldquo;Terms of Service&rdquo;, &ldquo;Terms&rdquo;), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>Online Store Terms</h4>\n<p>By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>General Conditions</h4>\n<p>We reserve the right to refuse service to anyone for any reason at any time.<br />You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>License</h4>\n<p>You must not:</p>\n<p>&nbsp;</p>\n<ul>\n<li>Republish material from&nbsp;<span class=\"highlight preview_website_name\">Website Name</span></li>\n<li>Sell, rent or sub-license material from&nbsp;<span class=\"highlight preview_website_name\">Website Name</span></li>\n<li>Reproduce, duplicate or copy material from&nbsp;<span class=\"highlight preview_website_name\">Website Name</span></li>\n<li>Redistribute content from&nbsp;<span class=\"highlight preview_website_name\">Website Name</span></li>\n</ul>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>Disclaimer</h4>\n<p>To the maximum extent permitted by applicable law, we exclude all representations:</p>\n<p>&nbsp;</p>\n<ul>\n<li>limit or exclude our or your liability for death or personal injury;</li>\n<li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>\n<li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>\n<li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>\n</ul>\n<p>&nbsp;</p>\n<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>\n</div>\n</div>\n</section>', '2021-04-20 12:02:43', '2021-10-24 00:01:50'),
(5, 8, 'en', 'Return Policy', '<p>Testing</p>', '2021-04-20 12:03:28', '2021-04-20 12:03:28'),
(6, 4, 'bn', 'আমাদের সম্পর্কে', '<p>টেস্টিং</p>', '2021-04-20 12:04:16', '2021-04-20 12:04:16'),
(7, 4, 'hi', 'हमारे बारे में', '<p>हमारे बारे मेंहमारे बारे मेंहमारे बारे मेंहमारे बारे मेंहमारे बारे में</p>', '2021-04-20 12:05:49', '2021-04-20 12:05:49');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(77, 'locale', 'web', NULL, NULL),
(78, 'locale-view', 'web', NULL, NULL),
(79, 'locale-store', 'web', NULL, NULL),
(80, 'locale-edit', 'web', NULL, NULL),
(81, 'locale-action', 'web', NULL, NULL),
(82, 'users_and_roles', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tax_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,4) NOT NULL,
  `special_price` decimal(10,4) DEFAULT NULL,
  `special_price_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_price_start` date DEFAULT NULL,
  `special_price_end` date DEFAULT NULL,
  `selling_price` decimal(10,4) DEFAULT NULL,
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

INSERT INTO `products` (`id`, `brand_id`, `tax_id`, `slug`, `price`, `special_price`, `special_price_type`, `special_price_start`, `special_price_end`, `selling_price`, `sku`, `manage_stock`, `qty`, `in_stock`, `viewed`, `is_active`, `new_from`, `new_to`, `created_at`, `updated_at`) VALUES
(1, 22, NULL, 'bed', '500.0000', '400.0000', 'Fixed', '2001-12-05', '2020-05-03', '400.0000', 'KUPLNI', 1, 20, 1, NULL, 0, '2015-05-03 00:00:00', '2021-03-20 00:00:00', '2021-03-18 09:42:21', '2021-09-23 03:12:59'),
(2, NULL, NULL, 'oppo-watch', '15.0000', '0.0000', 'Fixed', '1970-01-01', '1970-01-01', '0.0000', 'Oppo123', 1, 12, 0, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-03-18 10:32:52', '2021-10-22 10:47:52'),
(3, NULL, NULL, 'probook-430-g8-notebook-pc', '9876.1300', '700.1300', NULL, '1970-01-01', '1970-01-01', '700.1300', 'Probook123', 1, 8, 0, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-03-18 10:45:56', '2021-10-22 10:40:43'),
(4, 14, NULL, 'richman-shirt', '500.0000', '0.0000', NULL, '1970-01-01', '1970-01-01', '0.0000', NULL, 1, 7, 0, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-03-20 01:11:04', '2021-10-16 08:01:34'),
(5, NULL, NULL, 'samsung-a12', '1000.0000', '0.0000', NULL, '1970-01-01', '1970-01-01', '0.0000', NULL, 1, 2, 0, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-03-27 09:47:53', '2021-10-13 23:16:46'),
(6, 23, NULL, 'samsung-galaxy-m02s', '12999.0000', '12499.0000', 'Fixed', '1970-01-01', '1970-01-01', '12499.0000', NULL, 0, 13, 0, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-09-21 05:22:42', '2021-10-16 00:56:45'),
(7, NULL, NULL, 'xiaomi-redmi-10', '1200.0000', '0.0000', NULL, '1970-01-01', '1970-01-01', '0.0000', NULL, 0, 2, 0, NULL, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-09-21 05:40:30', '2021-09-21 05:41:19'),
(8, 23, 3, 'vivo-y91', '1500.0000', '0.0000', NULL, '1970-01-01', '1970-01-01', '0.0000', NULL, 0, 2, 0, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-09-21 06:16:59', '2021-10-16 00:56:37'),
(19, NULL, NULL, 'fsdsfsd', '12999.0000', '0.0000', NULL, '1970-01-01', '1970-01-01', '0.0000', NULL, 0, 2, 0, NULL, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-10-03 06:43:32', '2021-10-09 08:16:10'),
(24, NULL, NULL, 'dsfdsfw', '12999.0000', '0.0000', NULL, '1970-01-01', '1970-01-01', '0.0000', NULL, NULL, 2, NULL, NULL, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-10-03 10:19:34', '2021-10-03 10:19:34'),
(25, NULL, NULL, 'irfan', '12999.0000', '0.0000', NULL, '1970-01-01', '1970-01-01', '0.0000', NULL, NULL, 2, NULL, NULL, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-10-03 18:39:05', '2021-10-03 18:39:05'),
(28, NULL, NULL, 'dell-inspiron-3493---specs', '1000.0000', '0.0000', NULL, '1970-01-01', '1970-01-01', '0.0000', 'Dell-100', 1, 10, 0, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-10-22 09:52:59', '2021-10-22 10:11:26'),
(29, NULL, NULL, 'shofa', '500.0000', '0.0000', NULL, '1970-01-01', '1970-01-01', '0.0000', 'S-123', 1, 10, 1, NULL, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2021-10-22 21:49:48', '2021-10-22 21:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `products0`
--

CREATE TABLE `products0` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `collection_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `qty` int(255) NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `old_price` double DEFAULT NULL,
  `has_attribute` int(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
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
-- Table structure for table `product_attribute_value`
--

CREATE TABLE `product_attribute_value` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_value_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute_value`
--

INSERT INTO `product_attribute_value` (`product_id`, `attribute_id`, `attribute_value_id`) VALUES
(24, 20, 21),
(24, 23, 24),
(24, 2, 2),
(25, 20, 21),
(25, 23, 24),
(19, 2, 2),
(19, 20, 21),
(19, 20, 22),
(6, 3, 25),
(4, 2, 2),
(4, 2, 3),
(4, 2, 4),
(4, 3, 25);

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
(1, 1, '/images/products/2HKGD5LOsx.webp', 'base', NULL, '2021-09-23 03:11:53'),
(2, 3, '/images/products/yJAK1MqJUj.webp', 'base', NULL, '2021-10-22 00:06:15'),
(51, 4, '/images/products/qqPD97Ra8q.webp', 'base', '2021-03-20 02:12:27', '2021-09-23 03:22:55'),
(52, 6, '/images/products/a0VVxPrimK.webp', 'base', '2021-09-21 05:24:34', '2021-10-15 23:46:41'),
(53, 7, '/images/products/1VcY7A5k1x.jpg', 'base', '2021-09-21 05:41:19', '2021-09-21 05:41:19'),
(54, 8, '/images/products/qTdbo0QUjq.webp', 'base', NULL, '2021-09-22 02:44:56'),
(55, 6, '/images/products/yVLYD6o4O7.webp', 'additional', '2021-09-22 03:25:33', '2021-09-22 03:25:33'),
(56, 6, '/images/products/K8j74ySGak.webp', 'additional', '2021-09-22 03:25:33', '2021-09-22 03:25:33'),
(57, 6, '/images/products/uNHnDwXJA6.webp', 'additional', '2021-09-22 03:25:33', '2021-09-22 03:25:33'),
(58, 1, '/images/products/xbjTgC3yuC.webp', 'additional', '2021-09-23 03:13:00', '2021-09-23 03:13:00'),
(59, 1, '/images/products/z7j2Hvdb3i.webp', 'additional', '2021-09-23 03:13:00', '2021-09-23 03:13:00'),
(65, 3, '/images/products/YRwEKfQAfo.webp', 'additional', '2021-09-29 00:51:58', '2021-09-29 00:51:58'),
(66, 5, '/images/products/RkxnkpCNFT.webp', 'base', '2021-10-13 23:15:59', '2021-10-13 23:16:46'),
(67, 4, '/images/products/2gQenimtwh.webp', 'additional', '2021-10-15 22:45:48', '2021-10-15 22:45:48'),
(68, 4, '/images/products/Vp2SqsUOTH.webp', 'additional', '2021-10-15 22:45:48', '2021-10-15 22:45:48'),
(69, 4, '/images/products/Yj4g8sx8FR.webp', 'additional', '2021-10-15 22:45:49', '2021-10-15 22:45:49'),
(70, 2, '/images/products/GyohtUA8zd.webp', 'base', '2021-10-22 07:41:18', '2021-10-22 07:48:21'),
(71, 28, '/images/products/VGIVsmBWLY.webp', 'base', '2021-10-22 09:57:25', '2021-10-22 09:57:25'),
(72, 29, '/images/products/8p18rx5inT.webp', 'base', NULL, NULL);

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
(1, 2),
(6, 1),
(8, 1);

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
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Bed', '<h1 id=\"title\" class=\"a-size-large a-spacing-none a-color-secondary\" style=\"text-align: center;\"><span id=\"productTitle\" class=\"a-size-large\">irfan&nbsp;Men\'s Luxury Analog Quartz Gold Wrist Watches</span></h1>\r\n<p>&nbsp;</p>\r\n<div id=\"dp_productDescription_container_div\" class=\"celwidget\" data-feature-name=\"productDescription\" data-cel-widget=\"dp_productDescription_container_div\">\r\n<div id=\"productDescription_feature_div\" class=\"a-row feature\" data-feature-name=\"productDescription\" data-template-name=\"productDescription\" data-cel-widget=\"productDescription_feature_div\">\r\n<div id=\"productDescription\" class=\"a-section a-spacing-small\">\r\n<h4>Product Description:</h4>\r\n<h4>Highlights:</h4>\r\n<p>Original Japanese Movement: provide precise and accurate time keeping<br />Stainless Steel Strap and Stainless Steel Case Cover<br />German High Hardness Mineral Glass, not easy to wear<br />30M Water Resistant - 3ATM: Daily Use Waterproof, Handwash<br />Calendar Date Window<br />Classic Business Casual Dress Watch Design. Combines quality, leading edge fashion, and value.<br /><br />Features:</p>\r\n<p><br />Stainless Steel case and Stainless Steel case back<br />German High Hardness Mineral Glass<br />Calendar Date Window<br />30M Waterproof<br />Stainless Steel Strap<br /><br />Specification:</p>\r\n<p><br />Dial Color: Black<br />Dial Case Diameter: 1.57 inch / 4.0 cm<br />Dial Case Thickness: 0.43 inch / 1.1 cm<br />Band Color: Gold<br />Band Width: 0.79 inch / 2 cm<br />Band Length: 8.7 inch / 22 cm.<br />Band Clasp Type: Fold Over Clasp<br />Watch Weight: 3.39 oz / 96 g<br /><br />**NOTE**:<br />If mist or droplets found inside watch surface, please contact manufacturer immediately.<br />Clean the strap by a soft cloth on regular bases is highly recommended.<br />Too much water contact will shorter watch life.<br /><br />What Is In The Package:<br />Watch x 1</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"detailBullets\" class=\"celwidget\" data-feature-name=\"detailBullets\" data-cel-widget=\"detailBullets\">\r\n<div id=\"detailBulletsWrapper_feature_div\" class=\"a-section a-spacing-none feature\" data-feature-name=\"detailBullets\" data-template-name=\"detailBullets\" data-cel-widget=\"detailBulletsWrapper_feature_div\">\r\n<div id=\"detailBullets_feature_div\">\r\n<ul class=\"a-unordered-list a-nostyle a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Department:&nbsp;</span>Mens</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Manufacturer:&nbsp;</span>Fanmis</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Package Dimensions:&nbsp;</span>3.2 x 2.8 x 2.4 inches</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">ASIN:&nbsp;</span>B06XHJY5XZ</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">UNSPSC Code:&nbsp;</span>54110000</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Item model number:&nbsp;</span>4331787063</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Batteries:&nbsp;</span>1 LR44 batteries required.</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>', 'PRECISE TIME irfan  KEEPING: Japanese Movement, provide precise and accurate time keeping. Japanese battery which can provide the watch strong power.', '2021-03-18 09:42:21', '2021-03-18 09:42:21'),
(2, 2, 'en', 'Oppo Watch', '<h1 id=\"title\" class=\"a-size-large a-spacing-none\" style=\"text-align: center;\"><span id=\"productTitle\" class=\"a-size-large\">Meolin Charm Creative Twisted Crystal Pendant&nbsp;</span></h1>\r\n<p>&nbsp;</p>\r\n<p><span class=\"a-size-large\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"../../../storage/media/w5SaCifIArdhnr8w6ZiEakZOArQ3oIjLIIWMnGip.jpeg\" alt=\"\" width=\"523\" height=\"522\" /></span></p>\r\n<p>&nbsp;</p>\r\n<h4><span class=\"a-size-large\">Details:<br /></span></h4>\r\n<ul class=\"a-unordered-list a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\">Material: high-quality alloy, not easy to fade, not easy allergy, noble elegance, shining charming.</span></li>\r\n<li><span class=\"a-list-item\">Fits most people,you can adjust the length to a perfect fit with the extension chain.</span></li>\r\n<li><span class=\"a-list-item\">Unique design achievements unique to you, no matter what occasion,it will makes you attracting the attention of others.</span></li>\r\n<li><span class=\"a-list-item\">A Magnificent Gift for Your Mom, Sister, Friend, Teacher, Co-worker, Wife or Girlfriend for Christmas, Birthday, Anniversary, Graduation or Mother\'s Day.</span></li>\r\n<li><span class=\"a-list-item\">Note:Avoid contact with water,To keep item bright, clean item regularly and frequently with a soft cloth.</span></li>\r\n</ul>\r\n<h4 class=\"default\">&nbsp;</h4>\r\n<h4 class=\"default\">Product description:</h4>\r\n<div id=\"productDescription\" class=\"a-section a-spacing-small\">\r\n<p>Product Material: Silver</p>\r\n<p>Product size: Chain length: 44cm; Pendant length and width: 2.4*1cm</p>\r\n<p>Package: 1 pcs</p>\r\n<p>Features: Great jewelry gifts Suitable for her, lover, wife, couple, Birthday, Valentine&rsquo;s Day, Christmas&rsquo; Day, Mother&rsquo;s Day, wedding, party, anniversary, prom and casual days.</p>\r\n</div>', NULL, '2021-03-18 10:32:52', '2021-03-18 10:32:52'),
(3, 3, 'en', 'PROBOOK 430 G8 NOTEBOOK PC', '<p>HP PROBOOK 430 G8 NOTEBOOK PCHP PROBOOK 430 G8 NOTEBOOK PCHP PROBOOK 430 G8 NOTEBOOK PC</p>', 'This is a Awesome Laptop', '2021-03-18 10:45:56', '2021-03-18 10:45:56'),
(6, 4, 'en', 'Richman Shirt', '<p>6548PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC</p>', NULL, '2021-03-20 01:11:04', '2021-03-20 01:11:04'),
(7, 4, 'bn', 'রিচম্যান শার্ট', '<p>6548PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC</p>', NULL, NULL, NULL),
(8, 4, 'hi', 'वैश्य', '<p>6548PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC</p>', NULL, NULL, NULL),
(9, 5, 'fr', 'test 2', '<p>gggfdgg</p>', NULL, '2021-03-27 09:47:53', '2021-03-27 09:47:53'),
(10, 6, 'en', 'Samsung Galaxy M02s', '<h4>Details</h4>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reiciendis, ex necessitatibus eum esse odit maxime cupiditate dignissimos velit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reiciendis, ex necessitatibus eum esse odit maxime cupiditate dignissimos velit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reiciendis, ex necessitatibus eum esse odit maxime cupiditate dignissimos velit.</p>\r\n<p>dignissimos velit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reiciendis, ex necessitatibus eum esse odit maxime cupiditate dignissimos velit.</p>\r\n<h4 class=\"mar-top-30\">Features</h4>\r\n<ul>\r\n<li>57% polyester, 43% PCM-infused polyester</li>\r\n<li>Hyperbreathable Stretch Knit</li>\r\n<li>Phase Change Materials</li>\r\n<li>3D collar design with sewn-in collar stays to prevent collar spread and splay</li>\r\n<li>Moisture Wicking</li>\r\n<li>Wrinkle Resistant</li>\r\n<li>Machine wash, tumble dry</li>\r\n</ul>', 'The Best Phone Ever Can Buy On Samsung Superb Battery Life Amazing Battery Decent Performance Camera,Gaming Not Recommended Best For Online Classes', '2021-09-21 05:22:42', '2021-09-21 05:22:42'),
(11, 7, 'en', 'Xiaomi Redmi 10', '<p>Good Phone</p>', NULL, '2021-09-21 05:40:30', '2021-09-21 05:40:30'),
(12, 8, 'en', 'Vivo Y91', '<p>Good Phone</p>', NULL, '2021-09-21 06:16:59', '2021-09-21 06:16:59'),
(13, 6, 'bn', 'স্যামসাং গ্যালাক্সি-এম জিরো ২ এস', '<p>The Best Phone Ever Can Buy On Samsung Superb Battery Life Amazing Battery Decent Performance Camera,Gaming Not Recommended Best For Online Classes</p>', NULL, NULL, NULL),
(14, 9, 'en', 'dfdfffs', '<p>fdfdffd</p>', NULL, '2021-10-03 03:56:06', '2021-10-03 03:56:06'),
(15, 10, 'en', 'gg ggfdg', '<p>gdfggdg</p>', NULL, '2021-10-03 04:01:38', '2021-10-03 04:01:38'),
(16, 11, 'en', 'gdgdgd', '<p>gfdggd</p>', NULL, '2021-10-03 04:04:50', '2021-10-03 04:04:50'),
(17, 12, 'en', 'ggdgfd', '<p>fdgdfgf</p>', NULL, '2021-10-03 04:11:32', '2021-10-03 04:11:32'),
(18, 13, 'en', 'fdggg', '<p>dfgdgd</p>', NULL, '2021-10-03 04:14:23', '2021-10-03 04:14:23'),
(19, 14, 'en', 'jljjhh', '<p>nhkjkhkhkh</p>', NULL, '2021-10-03 04:18:34', '2021-10-03 04:18:34'),
(20, 15, 'en', 'fsdff', '<p>fsfsf</p>', NULL, '2021-10-03 04:24:56', '2021-10-03 04:24:56'),
(21, 16, 'en', 'fsdff', '<p>fsfsf</p>', NULL, '2021-10-03 04:25:18', '2021-10-03 04:25:18'),
(22, 17, 'en', 'dggd', '<p>dfgdgdf</p>', NULL, '2021-10-03 04:25:41', '2021-10-03 04:25:41'),
(23, 18, 'en', 'ttrer', '<p>terterter</p>', NULL, '2021-10-03 04:42:42', '2021-10-03 04:42:42'),
(24, 19, 'en', 'fsdsfsd', '<p>sdffsdf</p>', NULL, '2021-10-03 06:43:32', '2021-10-03 06:43:32'),
(25, 23, 'en', 'ttteretdfsdf', '<p>sffsdfsf</p>', NULL, '2021-10-03 10:18:21', '2021-10-03 10:18:21'),
(26, 24, 'en', 'dsfdsfw', '<p>dsdfsdfew</p>', NULL, '2021-10-03 10:19:34', '2021-10-03 10:19:34'),
(27, 25, 'en', 'Irfan', '<p>sdfsfssf</p>', NULL, '2021-10-03 18:39:05', '2021-10-03 18:39:05'),
(28, 5, 'en', 'Samsung A12', '<p>test</p>', NULL, NULL, NULL),
(31, 28, 'en', 'Dell Inspiron 3493 - Specs', '<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>Display</strong></div>\r\n<div class=\"col-md-8\">14.0&rdquo;, HD (1366 x 768), TN</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>HDD/SSD</strong></div>\r\n<div class=\"col-md-8\">1TB SSD + 1TB HDD</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>RAM</strong></div>\r\n<div class=\"col-md-8\">16GB DDR4, 2666 MHz</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>OS</strong></div>\r\n<div class=\"col-md-8\">Windows 10 Pro</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>Battery</strong></div>\r\n<div class=\"col-md-8\">42Wh, 3-cell</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>Dimensions</strong></div>\r\n<div class=\"col-md-8\">339 x 214.9 x 21 mm (13.35\" x 8.46\" x 0.83\")</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>Weight</strong></div>\r\n<div class=\"col-md-8\">1.79 kg (3.9 lbs)</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-double-table\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<div class=\"lp-row-table-title\"><strong>Ports and connectivity</strong></div>\r\n<ul class=\"lp-ports-conect lp-icon-ul\">\r\n<li class=\"icon-usb-a\"><strong>1x USB Type-A</strong> <em>2.0</em></li>\r\n<li class=\"icon-usb-a\"><strong>2x USB Type-A</strong> <em>3.2 Gen 1 (5 Gbps)</em></li>\r\n<li class=\"icon-hdmi\"><strong>HDMI</strong> <em>1.4b</em></li>\r\n<li class=\"icon-card-reader\"><strong>Card Reader</strong> <em>SD, SDHC, SDXC</em></li>\r\n<li class=\"icon-lan\"><strong>Ethernet LAN</strong> <em>10, 100 Mbit/s</em></li>\r\n<li class=\"icon-wi-fi\"><strong>Wi-Fi</strong> <em>802.11ac</em></li>\r\n<li class=\"icon-bluetooth\"><strong>Bluetooth</strong> <em>5.0</em></li>\r\n<li class=\"icon-audio-jack\"><strong>Audio jack</strong> <em>3.5 mm combo</em></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>', NULL, '2021-10-22 09:52:59', '2021-10-22 09:52:59'),
(32, 29, 'en', 'Shofa', '<p>Shofa is Goog</p>', NULL, '2021-10-22 21:49:48', '2021-10-22 21:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `comment`, `rating`, `created_at`, `updated_at`) VALUES
(1, 26, 6, 'This is a Good Product', '3', '2021-10-25 07:01:13', '2021-10-25 07:01:13'),
(2, 1, 6, 'Awesome product', '5', '2021-10-25 07:08:01', '2021-10-25 07:08:01'),
(3, 1, 6, 'I Love this product', '3', '2021-10-25 08:04:35', '2021-10-25 08:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', 1, '2021-07-31 02:31:32', '2021-07-31 05:22:44'),
(3, 'Customer', 'web', 1, '2021-07-31 02:32:28', '2021-07-31 05:22:44'),
(4, 'Manger', 'web', 1, '2021-07-31 03:29:35', '2021-08-11 23:16:53'),
(5, 'Editor', 'web', 0, '2021-07-31 04:25:38', '2021-07-31 05:24:53'),
(6, 'HR', 'web', 1, '2021-07-31 04:26:26', '2021-08-10 13:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
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
(82, 3),
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(6, 6),
(7, 6),
(8, 6),
(10, 6),
(12, 6),
(13, 6),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(21, 6),
(22, 6),
(23, 6),
(24, 6),
(25, 6),
(26, 6),
(27, 6),
(28, 6),
(29, 6),
(30, 6),
(31, 6),
(32, 6),
(33, 6),
(34, 6),
(35, 6),
(36, 6),
(37, 6),
(38, 6),
(39, 6),
(40, 6),
(41, 6),
(42, 6),
(43, 6),
(44, 6),
(45, 6),
(46, 6),
(47, 6),
(48, 6),
(49, 6),
(50, 6),
(51, 6),
(52, 6),
(53, 6),
(54, 6),
(55, 6),
(56, 6),
(57, 6),
(58, 6),
(59, 6),
(60, 6),
(61, 6),
(62, 6),
(63, 6),
(64, 6),
(65, 6),
(66, 6),
(67, 6),
(75, 6),
(77, 6),
(78, 6),
(82, 6);

-- --------------------------------------------------------

--
-- Table structure for table `searchterms`
--

CREATE TABLE `searchterms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `search_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_translatable` tinyint(4) NOT NULL DEFAULT '0',
  `plain_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `is_translatable`, `plain_value`, `created_at`, `updated_at`) VALUES
(1, 'storefront_welcome_text', 1, NULL, NULL, NULL),
(2, 'storefront_theme_color', 0, NULL, NULL, '2021-10-09 01:18:32'),
(3, 'storefront_mail_theme_color', 0, NULL, NULL, '2021-10-09 01:18:32'),
(4, 'storefront_slider', 0, NULL, NULL, NULL),
(5, 'storefront_terms_and_condition_page', 0, NULL, NULL, '2021-10-09 01:18:32'),
(6, 'storefront_privacy_policy_page', 0, NULL, NULL, '2021-10-09 01:18:32'),
(7, 'storefront_address', 1, NULL, NULL, NULL),
(8, 'storefront_navbar_text', 1, NULL, NULL, NULL),
(9, 'storefront_primary_menu', 0, '5', NULL, '2021-10-24 00:04:13'),
(10, 'storefront_category_menu', 0, NULL, NULL, '2021-10-24 00:04:13'),
(11, 'storefront_footer_menu_title_one', 1, NULL, NULL, NULL),
(12, 'storefront_footer_menu_one', 0, '3', NULL, '2021-10-24 00:04:13'),
(13, 'storefront_footer_menu_title_two', 1, NULL, NULL, NULL),
(14, 'storefront_footer_menu_two', 0, '4', NULL, '2021-10-24 00:04:14'),
(15, 'storefront_facebook_link', 0, NULL, NULL, NULL),
(16, 'storefront_twitter_link', 0, NULL, NULL, NULL),
(17, 'storefront_instagram_link', 0, NULL, NULL, NULL),
(18, 'storefront_youtube_link', 0, NULL, NULL, NULL),
(19, 'storefront_section_status', 0, '1', NULL, '2021-09-21 03:25:23'),
(20, 'storefront_feature_1_title', 1, NULL, NULL, NULL),
(21, 'storefront_feature_1_subtitle', 1, NULL, NULL, NULL),
(22, 'storefront_feature_1_icon', 0, 'ti-truck', NULL, '2021-09-21 03:25:22'),
(23, 'storefront_feature_2_title', 1, NULL, NULL, NULL),
(24, 'storefront_feature_2_subtitle', 1, NULL, NULL, NULL),
(25, 'storefront_feature_2_icon', 0, 'ti-loop', NULL, '2021-09-21 03:25:22'),
(26, 'storefront_feature_3_title', 1, NULL, NULL, NULL),
(27, 'storefront_feature_3_subtitle', 1, NULL, NULL, NULL),
(28, 'storefront_feature_3_icon', 0, 'ti-lock', NULL, '2021-09-21 03:25:22'),
(29, 'storefront_feature_4_title', 1, NULL, NULL, NULL),
(30, 'storefront_feature_4_subtitle', 1, NULL, NULL, NULL),
(31, 'storefront_feature_4_icon', 0, 'ti-headphone-alt', NULL, '2021-09-21 03:25:23'),
(32, 'storefront_feature_5_title', 1, NULL, NULL, NULL),
(33, 'storefront_feature_5_subtitle', 1, NULL, NULL, NULL),
(34, 'storefront_feature_5_icon', 0, NULL, NULL, '2021-09-21 03:25:23'),
(35, 'storefront_footer_tag_id', 0, NULL, NULL, NULL),
(36, 'storefront_copyright_text', 1, NULL, NULL, NULL),
(37, 'storefront_payment_method_image', 0, NULL, NULL, NULL),
(38, 'storefront_newsletter_image', 0, NULL, NULL, NULL),
(39, 'storefront_product_page_image', 0, NULL, NULL, NULL),
(40, 'storefront_call_action_url', 0, NULL, NULL, NULL),
(41, 'storefront_open_new_window', 0, NULL, NULL, NULL),
(42, 'storefront_slider_banner_1_image', 0, NULL, NULL, NULL),
(43, 'storefront_slider_banner_1_call_to_action_url', 0, NULL, NULL, '2021-09-06 03:39:58'),
(44, 'storefront_slider_banner_1_open_in_new_window', 0, '0', NULL, '2021-09-06 03:39:58'),
(45, 'storefront_slider_banner_2_image', 0, NULL, NULL, NULL),
(46, 'storefront_slider_banner_2_call_to_action_url', 0, NULL, NULL, '2021-09-06 03:39:58'),
(47, 'storefront_slider_banner_2_open_in_new_window', 0, '0', NULL, '2021-09-06 03:39:58'),
(48, 'storefront_one_column_banner_enabled', 0, NULL, NULL, NULL),
(49, 'storefront_one_column_banner_image', 0, NULL, NULL, NULL),
(50, 'storefront_one_column_banner_call_to_action_url', 0, NULL, NULL, NULL),
(51, 'storefront_one_column_banner_open_in_new_window', 0, NULL, NULL, NULL),
(52, 'storefront_two_column_banner_enabled', 0, NULL, NULL, NULL),
(53, 'storefront_two_column_banner_image_1', 0, NULL, NULL, NULL),
(54, 'storefront_two_column_banners_1_call_to_action_url', 0, NULL, NULL, NULL),
(55, 'storefront_two_column_banners_1_open_in_new_window', 0, NULL, NULL, NULL),
(56, 'storefront_two_column_banner_image_2', 0, NULL, NULL, NULL),
(57, 'storefront_two_column_banners_2_call_to_action_url', 0, NULL, NULL, NULL),
(58, 'storefront_two_column_banners_2_open_in_new_window', 0, NULL, NULL, NULL),
(59, 'storefront_three_column_banners_enabled', 0, NULL, NULL, NULL),
(60, 'storefront_three_column_banners_image_1', 0, NULL, NULL, NULL),
(61, 'storefront_three_column_banners_1_call_to_action_url', 0, NULL, NULL, NULL),
(62, 'storefront_three_column_banners_1_open_in_new_window', 0, NULL, NULL, NULL),
(63, 'storefront_three_column_banners_image_2', 0, NULL, NULL, NULL),
(64, 'storefront_three_column_banners_2_call_to_action_url', 0, NULL, NULL, NULL),
(65, 'storefront_three_column_banners_2_open_in_new_window', 0, NULL, NULL, NULL),
(66, 'storefront_three_column_banners_image_3', 0, NULL, NULL, NULL),
(67, 'storefront_three_column_banners_3_call_to_action_url', 0, NULL, NULL, NULL),
(68, 'storefront_three_column_banners_3_open_in_new_window', 0, NULL, NULL, NULL),
(69, 'storefront_three_column_full_width_banners_enabled', 0, NULL, NULL, NULL),
(70, 'storefront_three_column_full_width_banners_background_image', 0, NULL, NULL, NULL),
(71, 'storefront_three_column_full_width_banners_image_1', 0, NULL, NULL, NULL),
(72, 'storefront_three_column_full_width_banners_1_call_to_action_url', 0, NULL, NULL, NULL),
(73, 'storefront_three_column_full_width_banners_1_open_in_new_window', 0, NULL, NULL, NULL),
(74, 'storefront_three_column_full_width_banners_image_2', 0, NULL, NULL, NULL),
(75, 'storefront_three_column_full_width_banners_2_call_to_action_url', 0, NULL, NULL, NULL),
(76, 'storefront_three_column_full_width_banners_2_open_in_new_window', 0, NULL, NULL, NULL),
(77, 'storefront_three_column_full_width_banners_image_3', 0, NULL, NULL, NULL),
(78, 'storefront_three_column_full_width_banners_3_call_to_action_url', 0, NULL, NULL, NULL),
(79, 'storefront_three_column_full_width_banners_3_open_in_new_window', 0, NULL, NULL, NULL),
(80, 'storefront_top_brands_section_enabled', 0, '0', NULL, '2021-09-22 22:48:02'),
(81, 'storefront_top_brands', 0, '[\"4\",\"21\"]', NULL, '2021-09-22 22:47:50'),
(82, 'storefront_product_tabs_1_section_enabled', 0, '1', NULL, '2021-09-23 03:21:42'),
(83, 'storefront_product_tabs_1_section_tab_1_title', 1, NULL, NULL, NULL),
(84, 'storefront_product_tabs_1_section_tab_1_product_type', 0, 'category_products', NULL, '2021-09-23 03:21:42'),
(85, 'storefront_product_tabs_1_section_tab_1_category_id', 0, '20', NULL, '2021-09-23 03:21:42'),
(86, 'storefront_product_tabs_1_section_tab_1_products', 0, NULL, NULL, NULL),
(87, 'storefront_product_tabs_1_section_tab_1_products_limit', 0, NULL, NULL, NULL),
(88, 'storefront_product_tabs_1_section_tab_2_title', 1, NULL, NULL, NULL),
(89, 'storefront_product_tabs_1_section_tab_2_product_type', 0, 'category_products', NULL, '2021-09-23 03:21:42'),
(90, 'storefront_product_tabs_1_section_tab_2_category_id', 0, '13', NULL, '2021-09-23 03:21:42'),
(91, 'storefront_product_tabs_1_section_tab_2_products', 0, NULL, NULL, NULL),
(92, 'storefront_product_tabs_1_section_tab_2_products_limit', 0, NULL, NULL, NULL),
(93, 'storefront_product_tabs_1_section_tab_3_title', 1, NULL, NULL, NULL),
(94, 'storefront_product_tabs_1_section_tab_3_product_type', 0, NULL, NULL, '2021-09-23 03:21:42'),
(95, 'storefront_product_tabs_1_section_tab_3_category_id', 0, '14', NULL, '2021-09-23 03:21:42'),
(96, 'storefront_product_tabs_1_section_tab_3_products', 0, NULL, NULL, NULL),
(97, 'storefront_product_tabs_1_section_tab_3_products_limit', 0, NULL, NULL, NULL),
(98, 'storefront_product_tabs_1_section_tab_4_title', 1, NULL, NULL, NULL),
(99, 'storefront_product_tabs_1_section_tab_4_product_type', 0, 'category_products', NULL, '2021-09-23 03:21:42'),
(100, 'storefront_product_tabs_1_section_tab_4_category_id', 0, '3', NULL, '2021-09-23 03:21:42'),
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
(127, 'storefront_slider_banner_3_image', 0, 'C:\\xampp\\tmp\\phpCD3C.tmp', NULL, '2021-09-06 03:39:58'),
(128, 'storefront_slider_banner_3_title', 1, NULL, NULL, NULL),
(129, 'storefront_slider_banner_3_call_to_action_url', 0, 'xyz.com', NULL, '2021-09-06 03:39:58'),
(130, 'storefront_slider_banner_3_open_in_new_window', 0, '1', NULL, '2021-09-06 03:39:58'),
(131, 'storefront_flash_sale_and_vertical_products_section_enabled', 0, '1', NULL, '2021-10-22 22:17:57'),
(132, 'storefront_flash_sale_title', 1, NULL, NULL, NULL),
(133, 'storefront_flash_sale_active_campaign_flash_id', 0, '1', NULL, '2021-10-22 22:17:57'),
(134, 'storefront_vertical_product_1_title', 1, NULL, NULL, NULL),
(135, 'storefront_vertical_product_1_type', 0, 'category_products', NULL, '2021-10-22 22:17:57'),
(136, 'storefront_vertical_product_1_category_id', 0, '13', NULL, '2021-10-22 22:17:57'),
(137, 'storefront_vertical_product_1_products', 0, NULL, NULL, NULL),
(138, 'storefront_vertical_product_1_products_limit', 0, NULL, NULL, NULL),
(139, 'storefront_vertical_product_2_title', 1, NULL, NULL, NULL),
(140, 'storefront_vertical_product_2_type', 0, 'category_products', NULL, '2021-10-22 22:17:57'),
(141, 'storefront_vertical_product_2_category_id', 0, '3', NULL, '2021-10-22 22:17:57'),
(142, 'storefront_vertical_product_2_products', 0, NULL, NULL, NULL),
(143, 'storefront_vertical_product_2_products_limit', 0, NULL, NULL, NULL),
(144, 'storefront_vertical_product_3_title', 1, NULL, NULL, NULL),
(145, 'storefront_vertical_product_3_type', 0, 'category_products', NULL, '2021-10-22 22:17:57'),
(146, 'storefront_vertical_product_3_category_id', 0, '20', NULL, '2021-10-22 22:17:57'),
(147, 'storefront_vertical_product_3_products', 0, NULL, NULL, NULL),
(148, 'storefront_vertical_product_3_products_limit', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_bank_transfers`
--

CREATE TABLE `setting_bank_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_bank_transfers`
--

INSERT INTO `setting_bank_transfers` (`id`, `status`, `label`, `description`, `instruction`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'test', 'test', '2021-07-25 11:19:58', '2021-07-25 11:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `setting_cash_on_deliveries`
--

CREATE TABLE `setting_cash_on_deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_cash_on_deliveries`
--

INSERT INTO `setting_cash_on_deliveries` (`id`, `status`, `label`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'test', '2021-07-25 10:59:16', '2021-07-25 10:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `setting_check_money_orders`
--

CREATE TABLE `setting_check_money_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_check_money_orders`
--

INSERT INTO `setting_check_money_orders` (`id`, `status`, `label`, `description`, `instruction`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Test', 'test', 'test', '2021-10-13 22:54:35', '2021-10-13 22:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `setting_currencies`
--

CREATE TABLE `setting_currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supported_currency` text COLLATE utf8mb4_unicode_ci,
  `default_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixer_access_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forge_api_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_data_feed_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auto_refresh` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_currencies`
--

INSERT INTO `setting_currencies` (`id`, `supported_currency`, `default_currency`, `currency_format`, `exchange_rate_service`, `fixer_access_key`, `forge_api_key`, `currency_data_feed_key`, `auto_refresh`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh Taka,Indian Rupee,United States Dollar', '$', 'prefix', 'forge', NULL, '456', NULL, 1, '2021-07-24 01:20:00', '2021-09-29 03:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `setting_custom_css_jsses`
--

CREATE TABLE `setting_custom_css_jsses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_custom_css_jsses`
--

INSERT INTO `setting_custom_css_jsses` (`id`, `header`, `footer`, `created_at`, `updated_at`) VALUES
(1, 'fsdfef', 'fsdfsd', '2021-07-25 00:39:51', '2021-07-25 00:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `setting_facebooks`
--

CREATE TABLE `setting_facebooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_facebooks`
--

INSERT INTO `setting_facebooks` (`id`, `status`, `app_id`, `app_secret`, `created_at`, `updated_at`) VALUES
(1, 1, 'fsdfsdf', 'wew4', '2021-07-25 01:22:27', '2021-07-25 01:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `setting_flat_rates`
--

CREATE TABLE `setting_flat_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flat_status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_flat_rates`
--

INSERT INTO `setting_flat_rates` (`id`, `flat_status`, `label`, `cost`, `created_at`, `updated_at`) VALUES
(1, 1, 'Flat Rate', 25, '2021-07-25 03:57:26', '2021-10-10 04:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `setting_free_shippings`
--

CREATE TABLE `setting_free_shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_free_shippings`
--

INSERT INTO `setting_free_shippings` (`id`, `shipping_status`, `label`, `minimum_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Free Shipping', NULL, '2021-07-25 03:17:32', '2021-10-10 04:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `setting_generals`
--

CREATE TABLE `setting_generals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supported_countries` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_format_type` int(11) DEFAULT NULL,
  `reviews_and_ratings` tinyint(4) DEFAULT NULL,
  `auto_approve_reviews` tinyint(4) DEFAULT NULL,
  `cookie_bar` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_generals`
--

INSERT INTO `setting_generals` (`id`, `supported_countries`, `default_country`, `default_timezone`, `customer_role`, `number_format_type`, `reviews_and_ratings`, `auto_approve_reviews`, `cookie_bar`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh,India', 'United States', 'Africa/Abidjan', 'admin', 2, 1, 1, 1, '2021-08-27 23:16:40', '2021-09-04 03:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `setting_googles`
--

CREATE TABLE `setting_googles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_googles`
--

INSERT INTO `setting_googles` (`id`, `status`, `client_id`, `client_secret`, `created_at`, `updated_at`) VALUES
(1, 1, 'lkjljl', 'iuyiuyiy', '2021-07-25 02:09:31', '2021-07-25 02:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `setting_local_pickups`
--

CREATE TABLE `setting_local_pickups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pickup_status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_local_pickups`
--

INSERT INTO `setting_local_pickups` (`id`, `pickup_status`, `label`, `cost`, `created_at`, `updated_at`) VALUES
(1, 1, 'Local Pickup', 20, '2021-07-25 03:46:56', '2021-10-10 04:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `setting_mails`
--

CREATE TABLE `setting_mails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `welcome_email` tinyint(4) DEFAULT NULL,
  `new_order_to_admin` tinyint(4) DEFAULT NULL,
  `invoice_mail` tinyint(4) DEFAULT NULL,
  `mail_order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_newsletters`
--

CREATE TABLE `setting_newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `newsletter` tinyint(4) DEFAULT NULL,
  `mailchimp_api_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailchimp_list_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_newsletters`
--

INSERT INTO `setting_newsletters` (`id`, `newsletter`, `mailchimp_api_key`, `mailchimp_list_id`, `created_at`, `updated_at`) VALUES
(1, 1, '8dae1098d58294232c2d14372aefffd9-us5', '02775d787c', '2021-07-25 00:05:52', '2021-10-05 01:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `setting_paypals`
--

CREATE TABLE `setting_paypals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sandbox` tinyint(4) DEFAULT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_paypals`
--

INSERT INTO `setting_paypals` (`id`, `status`, `label`, `description`, `sandbox`, `client_id`, `secret`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Paypal', 'Test', 1, 'AU9xEUcAhAZ9uK_UNVseT4RAiOVABw38vUjPYDth_M9IGCQp4Ez_WJ8s1HtztNdx3Nt58NuaFKcWX98b', 'EEjSv_jGB0xYCRs3-8L9aEsAp56LeQOOSNNTaXR1LirZxq6Nmgn70tL5jInojNIoCp_JbW_jjoOMT1qG', '2021-07-25 08:57:49', '2021-10-16 01:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `setting_paytms`
--

CREATE TABLE `setting_paytms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sandbox` tinyint(4) DEFAULT NULL,
  `merchant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_paytms`
--

INSERT INTO `setting_paytms` (`id`, `status`, `label`, `description`, `sandbox`, `merchant_id`, `merchant_key`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'test', 1, 'test', 'test', '2021-07-25 09:55:50', '2021-07-25 09:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `setting_sms`
--

CREATE TABLE `setting_sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sms_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sms_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_sid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `welcome_sms` tinyint(4) DEFAULT NULL,
  `new_order_sms_to_admin` tinyint(4) DEFAULT NULL,
  `new_order_sms_to_customer` tinyint(4) DEFAULT NULL,
  `sms_order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_sms`
--

INSERT INTO `setting_sms` (`id`, `sms_from`, `sms_service`, `api_key`, `api_secret`, `account_sid`, `auth_token`, `welcome_sms`, `new_order_sms_to_admin`, `new_order_sms_to_customer`, `sms_order_status`, `created_at`, `updated_at`) VALUES
(1, 'test', 'twilio', NULL, NULL, 'test4', 'test5', 1, 1, 1, 'completed', '2021-07-24 10:50:14', '2021-07-24 23:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `setting_stores`
--

CREATE TABLE `setting_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hide_store_phone` tinyint(4) DEFAULT NULL,
  `hide_store_email` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_stores`
--

INSERT INTO `setting_stores` (`id`, `store_name`, `store_tagline`, `store_email`, `store_phone`, `store_address_1`, `store_address_2`, `store_city`, `store_country`, `store_state`, `store_zip`, `hide_store_phone`, `hide_store_email`, `created_at`, `updated_at`) VALUES
(2, 'Basil Mathis', 'Aliqua Nihil ration', 'jovecahu@mailinator.com', '(+800) 1234 5678 90', '949 Cowley Parkway', 'Veniam harum saepe', 'Sint fuga Irure sun', 'Grenada', NULL, '654', 1, 1, '2021-07-22 01:08:16', '2021-10-09 01:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `setting_strips`
--

CREATE TABLE `setting_strips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishable_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_strips`
--

INSERT INTO `setting_strips` (`id`, `status`, `label`, `description`, `publishable_key`, `secret_key`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'test', '1', 'test', '2021-07-25 09:28:36', '2021-07-25 09:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(30, 1, 'en', 'Welcome to CartPro', '2021-09-04 23:50:08', '2021-09-21 02:34:08'),
(31, 7, 'en', 'Dewanhat, Chittagong', '2021-09-04 23:50:09', '2021-10-09 01:18:33'),
(32, 125, 'en', 'Test 1', '2021-09-05 23:04:39', '2021-09-05 23:33:54'),
(33, 126, 'en', 'Test 2', '2021-09-06 03:03:01', '2021-09-06 03:03:01'),
(34, 128, 'en', 'Test 3', '2021-09-06 03:39:58', '2021-09-06 03:39:58'),
(35, 8, 'en', NULL, '2021-09-13 05:32:13', '2021-09-13 05:32:13'),
(36, 11, 'en', 'Our Services', '2021-09-13 05:32:13', '2021-10-04 01:17:02'),
(37, 13, 'en', 'Information', '2021-09-13 05:32:13', '2021-10-04 02:14:07'),
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
(50, 83, 'bn', 'Featured', '2021-09-21 03:59:12', '2021-09-21 03:59:12'),
(51, 88, 'bn', NULL, '2021-09-21 03:59:12', '2021-09-21 03:59:12'),
(52, 93, 'bn', NULL, '2021-09-21 03:59:12', '2021-09-21 03:59:12'),
(53, 98, 'bn', NULL, '2021-09-21 03:59:12', '2021-09-21 03:59:12'),
(54, 83, 'en', 'Featured', '2021-09-21 04:50:53', '2021-09-21 04:50:53'),
(55, 88, 'en', 'Furniture', '2021-09-21 04:50:53', '2021-09-23 03:15:30'),
(56, 93, 'en', NULL, '2021-09-21 04:50:54', '2021-09-23 03:15:01'),
(57, 98, 'en', 'Shirt', '2021-09-21 04:50:54', '2021-09-23 03:21:42'),
(58, 132, 'en', 'Best Deals', '2021-10-21 02:09:37', '2021-10-21 02:10:11'),
(59, 134, 'en', 'Watches', '2021-10-21 03:46:08', '2021-10-21 03:51:36'),
(60, 139, 'en', 'Shirts', '2021-10-21 03:46:08', '2021-10-22 22:09:58'),
(61, 144, 'en', 'Mobile', '2021-10-21 04:19:23', '2021-10-22 22:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_phone`, `shipping_country`, `shipping_address_1`, `shipping_address_2`, `shipping_city`, `shipping_state`, `shipping_zip_code`, `created_at`, `updated_at`) VALUES
(1, 5, 'Promi', 'Chowdhury', 'promi00@gmail.com', '01521222515', 'Afghanistan', 'Hathazary', NULL, 'Chittagong', 'Chittagong', '4226', '2021-10-13 04:54:01', '2021-10-13 04:54:01'),
(2, 33, 'Tarek', 'Hasan', 'mainul@gmail.com', '01521448', 'Canada', 'Dewanhat', NULL, 'Chittagong', 'Chittagong', '4330', '2021-10-20 12:56:00', '2021-10-20 12:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_slug`, `type`, `category_id`, `url`, `slider_image`, `target`, `is_active`, `created_at`, `updated_at`) VALUES
(6, 'sony-headphone', 'category', NULL, NULL, 'images/sliders/tAsUR2IwIy.png', 'same_tab', '1', '2021-08-05 08:12:42', '2021-09-05 03:21:51'),
(7, 'redmi-ear-buds', 'url', NULL, 'https://www.facebook.com/', 'images/sliders/9OqFo6iksD.png', 'same_tab', '1', '2021-08-05 09:13:49', '2021-09-05 03:21:16'),
(8, 'samsung-m02s', 'category', NULL, NULL, 'images/sliders/ILRjGBSHRx.jpg', NULL, NULL, '2021-08-05 09:31:18', '2021-09-05 02:45:02'),
(9, 'apple-watch', 'category', NULL, NULL, 'images/sliders/tRQ335lto2.png', 'new_tab', '1', '2021-08-05 09:35:24', '2021-09-05 03:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `slider_translations`
--

CREATE TABLE `slider_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_translations`
--

INSERT INTO `slider_translations` (`id`, `slider_id`, `locale`, `slider_title`, `slider_subtitle`, `created_at`, `updated_at`) VALUES
(6, 6, 'en', 'Sony Headphone', 'Let the sound come alive!', '2021-08-05 08:12:42', '2021-08-05 14:47:41'),
(7, 7, 'en', 'Redmi Ear-buds', 'Crystal clear sound', '2021-08-05 09:13:49', '2021-09-05 02:42:58'),
(8, 8, 'en', 'Samsung M02s', 'This is a wounderful mobile', '2021-08-05 09:31:18', '2021-09-05 02:45:02'),
(9, 9, 'en', 'Apple Watch', 'Fashion meets functionality', '2021-08-05 09:35:24', '2021-09-05 02:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `storefront_generals0`
--

CREATE TABLE `storefront_generals0` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `welcome_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `terms_condition` bigint(20) UNSIGNED DEFAULT NULL,
  `privacy_policy_page` bigint(20) UNSIGNED DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storefront_generals0`
--

INSERT INTO `storefront_generals0` (`id`, `welcome_text`, `theme_color`, `mail_theme_color`, `slider_id`, `terms_condition`, `privacy_policy_page`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to Lion Coders', NULL, NULL, 2, 1, NULL, 'Muradpur, Chittagong', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `storefront_images`
--

CREATE TABLE `storefront_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storefront_images`
--

INSERT INTO `storefront_images` (`id`, `setting_id`, `title`, `type`, `image`, `created_at`, `updated_at`) VALUES
(2, NULL, 'favicon_logo', 'logo', '/images/storefront/logo/lBAhytALIU.png', '2021-09-04 23:18:20', '2021-09-04 23:18:20'),
(3, NULL, 'header_logo', 'logo', '/images/storefront/logo/wOmGKcjf8U.png', '2021-09-04 23:25:29', '2021-09-04 23:25:29'),
(4, 42, 'slider_banner_1', 'slider_banner', '/images/storefront/slider_banners/He5eDxZxy7.png', '2021-09-05 23:04:39', '2021-09-05 23:04:39'),
(7, 45, 'slider_banner_2', 'slider_banner', '/images/storefront/slider_banners/Py41g9nOaj.png', '2021-09-06 03:13:07', '2021-09-06 03:15:59'),
(8, 127, 'slider_banner_3', 'slider_banner', '/images/storefront/slider_banners/4AkXEEtiCN.jpg', '2021-09-06 03:39:58', '2021-09-06 03:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `storefront_menus0`
--

CREATE TABLE `storefront_menus0` (
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
-- Dumping data for table `storefront_menus0`
--

INSERT INTO `storefront_menus0` (`id`, `navbar_text`, `primary_menu_id`, `category_menu_id`, `footer_menu_title_one`, `footer_menu_one_id`, `footer_menu_title_two`, `footer_menu_two_id`, `created_at`, `updated_at`) VALUES
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
(2, 'new-arrivals', 1, '2021-03-18 09:20:57', '2021-07-27 00:57:13'),
(3, 'trendy', 0, '2021-03-18 09:21:08', '2021-07-27 01:00:41');

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
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double NOT NULL,
  `based_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `country`, `zip`, `rate`, `based_on`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'United States', '4330', 100, 'shipping_address', '1', '2021-08-14 06:06:31', '2021-08-15 00:26:14'),
(3, 'Bangladesh', '4330', 50, 'shipping_address', '1', '2021-08-14 22:28:53', '2021-08-15 00:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `tax_translations`
--

CREATE TABLE `tax_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_translations`
--

INSERT INTO `tax_translations` (`id`, `tax_id`, `locale`, `tax_class`, `tax_name`, `state`, `city`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'BD Dhaka Tax', 'BD Dhaka ', 'Chittagong', 'Chittagong', '2021-08-14 06:06:31', '2021-08-14 06:06:31'),
(3, 3, 'en', 'Chittagong Tax', 'Chittagong', 'Chittagong', 'Chittagong', '2021-08-14 22:28:53', '2021-08-15 00:10:40');

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
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `phone`, `email`, `password`, `user_type`, `role`, `role_id`, `image`, `remember_token`, `last_login_at`, `last_login_ip`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Tarik', 'Iqbal', '01924756759', 'hello@lion-coders.com', '$2y$10$hv5b3a/UUopDp/3oxD3gpO2rA4V0ogL3575fIdXDLSlvxt7TMn3Nu', 1, 4, 0, NULL, NULL, NULL, NULL, 1, '2020-12-13 14:35:51', '2021-08-10 13:57:00'),
(2, 'irfan', 'Irfan', 'Chowdhury', '01829498634', 'irfanchowdhury80@gmail.com', '$2y$10$Bpkr0QPBwpiw6Ax8sqvSy.5sZVa96Np7Dnhyz97WBw7cuT1w7pzOi', 1, 1, 1, NULL, NULL, NULL, NULL, 1, '2021-01-31 02:33:22', '2021-08-10 11:53:08'),
(3, 'arman', 'Arman', 'Alam', '01829498635', 'arman@gmail.com', '$2y$10$sFg.WpMhrzu6gQeVq4k5V.NSnJSE2J0pgW1DXFf/za5SCNFiwBoaa', 1, 1, 1, NULL, NULL, NULL, NULL, 1, '2021-02-07 01:29:29', '2021-09-04 21:55:37'),
(4, 'irfan95', 'Irfan', 'Chowdhury Fahim', '384434q9`', 'irfanchowdhury@gmail.com', '$2y$10$f.m5JjQlDp2hRCF6cAvPreblmJq5ZsAqns1l3GBNgQQ/VGfwhaKdi', 1, 1, 0, NULL, NULL, NULL, NULL, 1, '2021-07-30 12:37:29', '2021-09-04 21:55:34'),
(5, 'khan95', 'Mr', 'Khan', '+8801829498436', 'khan@gmail.com', '$2y$10$O1Ha6motjPgmZTq.ShZiFuWstDgbYqrHcC3HF6Ai0lT21ciMDmpTW', 1, 1, 1, NULL, NULL, NULL, NULL, 1, '2021-08-10 10:06:39', '2021-08-10 12:33:57'),
(7, 'chowdhury95', 'Mr', 'Chowdhury', '+8801829498623', 'chowdhury95@gmail.com', '$2y$10$yF8Y304HCzTN3h4THweBMeL9/4GF4GKejnsv41n06WQTbwtr3lPKa', 1, 6, 6, 'images/users/AhTny4rwdZ.png', NULL, NULL, NULL, 1, '2021-08-10 11:22:10', '2021-08-11 22:46:28'),
(8, 'rahman95', 'Abdur', 'Rahman', '1234533', 'rahman95@gmail.com', '$2y$10$SF6gpA9qdcBhKn3BbmXX0.Xbh68oAQXaTS5isA0SmH4qSyMNYilpC', 1, 6, 6, 'images/users/GGVwvI20bI.png', NULL, NULL, NULL, 1, '2021-08-11 23:07:00', '2021-08-11 23:15:03'),
(9, 'nishat95', 'Shoeb', 'Nishat', '1234554551', 'nishat@gmail.com', '$2y$10$puodf2zCepy8fv0FT9X2muPM6dYOSV6LHaipjipD7oIPRvq/4R6Gi', 1, 6, 6, NULL, NULL, NULL, NULL, 1, '2021-08-11 23:19:34', '2021-08-12 00:41:22'),
(10, 'fahim95', 'Fahim', 'Chowdhury', '5653637', 'fahim95@gmail.com', '$2y$10$4ah1n/ENsHwcqtZnTGwXfOW/Li20hvGlui6gMWbHQm3.88eFoM2iy', 1, 4, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-14 04:48:14', '2021-09-04 21:30:22'),
(16, 'fahim00', 'Fahim', 'Chowdhury', '1234567891', 'fahim@gmail.com', '$2y$10$1r6EcJTXmbBIgnmydt/xw.30RPB3XMks4LamcEYoD4Kwuin54hFc.', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-11 03:57:54', '2021-10-11 03:57:54'),
(21, 'promi98', 'Promi', 'Chy', '01777703433', 'promi00@gmail.com', '$2y$10$0e6m6BmLQvDkut1xv.Ff7eaQYHhPD6wUpKdcI2AXZ.LhVhMUsbTFC', 0, NULL, NULL, 'images/customers/xs7Km7I4tG.webp', NULL, NULL, NULL, NULL, '2021-10-11 09:01:44', '2021-10-11 09:01:44'),
(23, 'Abir95', 'Abir', 'Shanto', '01548741214', 'abir@gmail.com', '$2y$10$JXPxVB/3uHhFoaUDhRTj9uJ6/WN4E/jrsAKY9F/f/WAYJO4TxE2pK', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-13 22:35:10', '2021-10-13 22:35:10'),
(24, 'ruby95', 'Ruby', 'Khatun', '45646454', 'ruby@gmail.com', '$2y$10$LZ5sDEmGl2H2RGRLMg0C0OyIEzRH9nOXrZzHTfbyE8dBrlgCo9Rse', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-19 23:26:38', '2021-10-19 23:26:38'),
(25, 'fahamina95', 'fahamina', 'Chowdhury', '1567685454', 'fahamina@gmail.com', '$2y$10$2QARKVR48tF1Uwvtam2LS.nqKAs12OGonogfYg5VnsNJxc1jGTn.6', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-20 01:20:21', '2021-10-20 01:20:21'),
(26, 'mainul95', 'Mainul', 'Islam', '01521222515', 'mainul@gmail.com', '$2y$10$VJDRzwfnDfrmfbvSCUj/lOOE9V0KMzpC3vfGGAAkCSzcvKpjvD.g.', 0, NULL, NULL, '', NULL, NULL, NULL, NULL, '2021-10-20 12:54:13', '2021-10-20 12:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` double NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`id`, `first_name`, `last_name`, `username`, `phone`, `email`, `password`, `role_id`, `image`, `remember_token`, `last_login_at`, `last_login_ip`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Mr', 'Admin', 'admin', 1924756759, 'hello@lion-coders.com', '$2y$10$hv5b3a/UUopDp/3oxD3gpO2rA4V0ogL3575fIdXDLSlvxt7TMn3Nu', 1, NULL, NULL, '2021-08-13 21:24:47', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
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
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `navigations_category_id_foreign` (`category_id`),
  ADD KEY `navigations_page_id_foreign` (`page_id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

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
-- Indexes for table `storefront_generals0`
--
ALTER TABLE `storefront_generals0`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storefront_images`
--
ALTER TABLE `storefront_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storefront_menus0`
--
ALTER TABLE `storefront_menus0`
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
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `attribute_value_translations`
--
ALTER TABLE `attribute_value_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `brand_translations`
--
ALTER TABLE `brand_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupon_translations`
--
ALTER TABLE `coupon_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `currency_rates`
--
ALTER TABLE `currency_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sales`
--
ALTER TABLE `flash_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `flash_sale_translations`
--
ALTER TABLE `flash_sale_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `menu_translations`
--
ALTER TABLE `menu_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products0`
--
ALTER TABLE `products0`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `setting_bank_transfers`
--
ALTER TABLE `setting_bank_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_cash_on_deliveries`
--
ALTER TABLE `setting_cash_on_deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_check_money_orders`
--
ALTER TABLE `setting_check_money_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_currencies`
--
ALTER TABLE `setting_currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_custom_css_jsses`
--
ALTER TABLE `setting_custom_css_jsses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_facebooks`
--
ALTER TABLE `setting_facebooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_flat_rates`
--
ALTER TABLE `setting_flat_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_free_shippings`
--
ALTER TABLE `setting_free_shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_generals`
--
ALTER TABLE `setting_generals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_googles`
--
ALTER TABLE `setting_googles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_local_pickups`
--
ALTER TABLE `setting_local_pickups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_mails`
--
ALTER TABLE `setting_mails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_newsletters`
--
ALTER TABLE `setting_newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_paypals`
--
ALTER TABLE `setting_paypals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_paytms`
--
ALTER TABLE `setting_paytms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_sms`
--
ALTER TABLE `setting_sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_stores`
--
ALTER TABLE `setting_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting_strips`
--
ALTER TABLE `setting_strips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider_translations`
--
ALTER TABLE `slider_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `storefront_generals0`
--
ALTER TABLE `storefront_generals0`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `storefront_images`
--
ALTER TABLE `storefront_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `storefront_menus0`
--
ALTER TABLE `storefront_menus0`
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
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tax_translations`
--
ALTER TABLE `tax_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- Constraints for table `coupon_categories`
--
ALTER TABLE `coupon_categories`
  ADD CONSTRAINT `coupon_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_categories_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupon_products`
--
ALTER TABLE `coupon_products`
  ADD CONSTRAINT `coupon_products_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupon_translations`
--
ALTER TABLE `coupon_translations`
  ADD CONSTRAINT `coupon_translations_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  ADD CONSTRAINT `flash_sale_products_flash_sale_id_foreign` FOREIGN KEY (`flash_sale_id`) REFERENCES `flash_sales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flash_sale_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `flash_sale_translations`
--
ALTER TABLE `flash_sale_translations`
  ADD CONSTRAINT `flash_sale_translations_flash_sale_id_foreign` FOREIGN KEY (`flash_sale_id`) REFERENCES `flash_sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_foreign` FOREIGN KEY (`menu`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attribute_value`
--
ALTER TABLE `product_attribute_value`
  ADD CONSTRAINT `product_attribute_value_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_attribute_value_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
