-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 05:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartpro_old`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `attribute_set_id` bigint(20) UNSIGNED NOT NULL,
  `is_filterable` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute_category`
--

INSERT INTO `attribute_category` (`attribute_id`, `category_id`) VALUES
(23, 9),
(23, 10),
(3, 3),
(3, 10),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_sets`
--

CREATE TABLE `attribute_sets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `locale` varchar(255) NOT NULL,
  `attribute_set_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `locale` varchar(255) NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `local` varchar(255) NOT NULL,
  `value_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `slug` varchar(255) NOT NULL,
  `brand_logo` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `slug`, `brand_logo`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'sony', 'images/brands/IY4HxpSvjL.png', 1, '2021-02-21 13:34:26', '2021-09-21 01:32:39'),
(8, 'লায়ন-কোডারস', 'images/brands/NXCIYRZBBs.png', 1, '2021-02-22 00:54:35', '2021-09-21 05:13:00'),
(11, 'Panasonic', NULL, 0, '2021-03-01 23:51:20', '2021-09-21 01:26:22'),
(14, 'Otobi', 'images/brands/d9itR3U0Qa.png', 1, '2021-03-02 02:00:46', '2021-09-21 01:34:53'),
(16, 'ফল', 'images/brands/3FKKzS2ZR2.png', 1, '2021-03-02 02:42:37', '2021-09-21 01:34:15'),
(19, 'Natural', 'images/brands/hjWoY7uWJW.png', 1, '2021-03-02 02:47:06', '2021-09-21 01:05:16'),
(20, 'gkkhkg', 'images/brands/ycp2qDYst3.png', 1, '2021-03-02 03:44:49', '2021-09-21 01:30:44'),
(21, 'hello', 'images/brands/QT4nnHkc8E.png', 1, '2021-03-02 03:45:09', '2022-02-08 14:30:27'),
(22, 'pineapple', 'images/brands/32BaEMEItL.png', 1, '2021-03-02 03:51:16', '2021-09-21 01:33:24'),
(23, 'samsung', 'images/brands/pKB1vdrpJX.webp', 1, '2021-09-22 03:57:09', '2022-02-08 14:30:27'),
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
  `local` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand_translations`
--

INSERT INTO `brand_translations` (`id`, `brand_id`, `local`, `brand_name`, `created_at`, `updated_at`) VALUES
(5, 4, 'en', 'Apple', '2021-02-21 13:34:26', '2021-02-21 13:34:26'),
(6, 4, 'bn', 'সনি', NULL, NULL),
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
  `slug` varchar(191) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `top` int(11) DEFAULT 0,
  `is_active` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `parent_id`, `image`, `icon`, `top`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'electronics', NULL, 'images/categories/syBEXDiaUy.webp', 'las la-bolt', 1, 1, '2021-02-21 22:59:48', '2021-11-01 01:28:09'),
(3, 'clothes', NULL, 'images/categories/fvlpKv3heU.webp', 'las la-tshirt', 1, 1, '2021-02-21 23:39:24', '2021-11-01 01:46:39'),
(9, 'computer', 2, 'images/categories/MzUyQtGPq0.webp', 'las la-desktop', 1, 1, '2021-02-22 02:07:32', '2021-11-01 01:32:05'),
(10, 'laptop', 9, NULL, NULL, 1, 0, NULL, '2021-09-03 23:52:13'),
(11, 'মিস্টি', NULL, NULL, NULL, 1, 0, '2021-02-22 04:43:25', '2021-03-25 12:54:10'),
(12, 'men', 3, NULL, NULL, 0, 1, '2021-03-20 03:51:04', '2021-11-01 01:53:26'),
(13, 'furniture', NULL, 'images/categories/kcABDkaXSy.webp', 'las la-couch', 1, 1, '2021-04-18 23:43:13', '2021-11-01 01:28:53'),
(14, 'car', NULL, 'images/categories/uiMbeJqh7O.webp', 'las la-car', NULL, 1, '2021-09-12 04:27:29', '2021-11-01 01:25:37'),
(15, 'toys', NULL, 'images/categories/MaBd2L9nmr.webp', 'las la-universal-access', 1, 1, '2021-09-12 04:35:37', '2021-11-01 01:44:43'),
(16, 'otobi', 13, 'images/categories/n3jcVsXfZA.webp', '', NULL, 1, '2021-09-14 04:44:36', '2021-11-01 01:24:31'),
(17, 'rfl', 13, 'images/categories/loEqpqXR8k.webp', '', NULL, 1, '2021-09-14 04:46:12', '2021-11-01 01:24:23'),
(18, 'chair', 17, 'images/categories/q0DsbTFuc0.webp', '', NULL, 1, '2021-09-14 04:48:27', '2021-11-01 01:24:06'),
(19, 'table', 17, 'images/categories/kZ5SxsKTp0.webp', 'las-la-table', NULL, 1, '2021-09-14 04:49:03', '2021-11-01 01:23:49'),
(20, 'mobile', 2, 'images/categories/Fi1PraSmuf.webp', 'las la-mobile', 1, 1, '2021-09-21 04:23:50', '2021-11-01 01:21:55'),
(21, 'android', 20, 'images/categories/rvPJ7LUCem.webp', 'lab la-android', NULL, 1, '2021-09-21 04:24:57', '2021-11-01 01:23:18'),
(22, 'iphone', 20, 'images/categories/tbGW8iEj20.webp', 'las la-mobile', NULL, 1, '2021-09-21 04:25:31', '2021-11-01 01:21:15'),
(23, 'food', NULL, 'images/categories/MQzAIyoOE9.webp', 'las la-utensils', 1, 1, '2021-10-05 03:46:33', '2021-11-01 01:50:49'),
(25, 'tv', 2, 'images/categories/iGQOxpnD2H.webp', 'las la-tv', NULL, 1, '2021-11-01 01:06:06', '2022-02-09 09:07:56'),
(26, 'soft-drinks', NULL, 'images/categories/9dbXe8Ecjx.webp', 'las la-water', NULL, 0, '2021-11-01 01:49:38', '2021-11-02 00:38:21'),
(27, 'watch', NULL, 'images/categories/3wDgNt253L.webp', 'las la-stopwatch', 1, 1, '2021-11-01 02:05:47', '2022-02-09 09:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
(20, 6),
(20, 7),
(20, 8),
(13, 1),
(3, 4),
(2, 8),
(2, 5),
(20, 5),
(2, 3),
(13, 29),
(9, 28),
(12, 4),
(13, 30),
(27, 2),
(3, 31),
(3, 32),
(27, 33),
(27, 34);

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `local` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(40, 25, 'en', 'TV', '2021-11-01 01:06:06', '2021-11-01 01:06:06'),
(41, 26, 'en', 'Soft Drinks', '2021-11-01 01:49:38', '2021-11-01 01:49:38'),
(42, 27, 'en', 'Watch', '2021-11-01 02:05:47', '2021-11-01 02:05:47'),
(43, 28, 'en', 'Test Category', '2022-01-02 00:30:06', '2022-01-02 00:30:06'),
(48, 33, 'en', 'Warch', '2022-02-12 02:45:37', '2022-02-12 02:45:37'),
(49, 34, 'en', 'Test nn', '2022-02-12 04:42:44', '2022-02-12 04:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `slug` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `value` decimal(8,4) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `free_shipping` tinyint(4) NOT NULL,
  `minimum_spend` decimal(8,4) DEFAULT NULL,
  `maximum_spend` decimal(8,4) DEFAULT NULL,
  `used` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `slug`, `coupon_code`, `value`, `discount_type`, `free_shipping`, `minimum_spend`, `maximum_spend`, `used`, `is_active`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 'anniversary', 'HAPPY2020', '0.0100', 'fixed', 0, '10.0000', '20.0000', 0, 0, '1970-01-01', '1970-01-01', '2021-04-18 16:40:23', '2021-07-27 00:00:29'),
(8, 'dhama-offer', 'Offer2021', '20.0000', 'percent', 0, '15.0000', '25.0000', 0, 1, '2021-04-19', '2021-04-24', '2021-04-19 05:39:08', '2021-09-24 23:57:57'),
(9, 'winter-offer', 'winter2021', '10.0000', 'fixed', 0, '0.0000', '0.0000', 0, 1, '2021-11-01', '2021-11-17', '2021-11-16 22:52:51', '2021-11-16 22:52:51'),
(10, 'rainy-offer', 'rainy_offer', '15.0000', 'fixed', 0, '0.0000', '0.0000', 0, 1, '1970-01-01', '1970-01-01', '2022-01-11 00:06:49', '2022-01-11 00:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_categories`
--

CREATE TABLE `coupon_categories` (
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `locale` varchar(255) NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupon_translations`
--

INSERT INTO `coupon_translations` (`id`, `coupon_id`, `locale`, `coupon_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'en', 'Anniversary', '2021-04-18 16:40:23', '2021-04-18 16:40:23'),
(7, 8, 'en', 'Dhamaka Offer', '2021-04-19 05:39:08', '2021-04-19 13:41:57'),
(8, 9, 'en', 'Winter Offer', '2021-11-16 22:52:51', '2021-11-16 22:52:51'),
(9, 10, 'en', 'Rainy Offer', '2022-01-11 00:06:49', '2022-01-11 00:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `currency_name` varchar(255) DEFAULT NULL,
  `currency_code` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(191) DEFAULT NULL,
  `currency_rate` decimal(8,4) DEFAULT 0.0000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency_rates`
--

INSERT INTO `currency_rates` (`id`, `currency_name`, `currency_code`, `currency_symbol`, `currency_rate`, `created_at`, `updated_at`) VALUES
(134, 'Bangladesh Taka', 'BDT', '৳', '85.3900', '2022-01-11 23:52:53', '2022-01-12 23:32:13'),
(135, 'Indian Rupee', 'INR', '₹', '73.9400', '2022-01-11 23:52:53', '2022-01-12 23:32:29'),
(136, 'United States Dollar', 'USD', '$', '1.0000', '2022-01-11 23:52:53', '2022-01-12 23:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `first_name`, `last_name`, `username`, `phone`, `email`, `image`, `password`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 21, 'Promi', 'Chy', 'promi98', '01777703433', 'promi00@gmail.com', 'images/customers/xs7Km7I4tG.webp', '$2y$10$0e6m6BmLQvDkut1xv.Ff7eaQYHhPD6wUpKdcI2AXZ.LhVhMUsbTFC', 0, '2021-10-11 09:01:44', '2021-10-11 09:01:44'),
(3, 23, 'Abir', 'Shanto', 'Abir95', '01548741214', 'abir@gmail.com', NULL, '$2y$10$JXPxVB/3uHhFoaUDhRTj9uJ6/WN4E/jrsAKY9F/f/WAYJO4TxE2pK', 0, '2021-10-13 22:35:10', '2021-10-13 22:35:10'),
(4, 24, 'Ruby', 'Khatun', 'ruby95', '45646454', 'ruby@gmail.com', NULL, '$2y$10$LZ5sDEmGl2H2RGRLMg0C0OyIEzRH9nOXrZzHTfbyE8dBrlgCo9Rse', 0, '2021-10-19 23:26:38', '2021-10-19 23:26:38'),
(5, 25, 'fahamina', 'Chowdhury', 'fahamina95', '1567685454', 'fahamina@gmail.com', NULL, '$2y$10$2QARKVR48tF1Uwvtam2LS.nqKAs12OGonogfYg5VnsNJxc1jGTn.6', 0, '2021-10-20 01:20:22', '2021-10-20 01:20:22'),
(6, 26, 'Mainul', 'Islam', 'mainul95', '01521222515', 'mainul@gmail.com', NULL, '$2y$10$HmW0l0MsUQVtROaWEOnxYO0sMh05gBaNe1UEQUXlXL3FUUvdF/QnG', 0, '2021-10-20 12:54:13', '2022-02-07 12:22:56'),
(7, 27, 'Shamim', 'Khandokhar', 'shamim95', '1234567890', 'shamim95@gmail.com', 'images/customers/HBGdmz2UIW.webp', '$2y$10$dErhi7MBUXwSSMQ85kqIb.pmyYu5rjeJzDmfvuhftz8RFMtKspH9G', 0, '2021-10-28 02:23:25', '2021-10-28 02:23:25'),
(9, 31, 'Fahim', 'Chy', 'fahimchy95', '22312321321321', 'fahimchy95@gmail.com', 'images/customers/u48sGOGhB6.webp', '$2y$10$LsCvQqV5AuKNjlOJF0NUYOWnlB2jZgbAuDpqlwqOY.f15dTuIDUo.', 0, '2021-12-25 02:18:46', '2021-12-25 02:30:50'),
(10, 32, NULL, NULL, 'juhair95', NULL, 'juhair95@gmail.com', NULL, '$2y$10$.R3a1Eqtq1rIQ4wVa3nY.OgdY4lKuPv0qwfk1FFiEDz.rmWnH7nRa', 0, '2021-12-25 04:02:23', '2021-12-25 04:02:23'),
(11, 33, 'Melodie', 'Bush', 'qihili', '+1 (363) 236-8974', 'duxupamu@mailinator.com', NULL, '$2y$10$/vl.HJs2awM7JQUKYfjIq.8m5k4jwt0ALbXAZc66t.ZSwKsoQyfVW', 0, '2022-01-05 17:28:20', '2022-01-05 17:28:20'),
(12, 38, NULL, NULL, 'test55', NULL, 'irfanchowdhury80@gmail.com', NULL, '$2y$10$hE6Jaixh8Xqlajc/zJUBzurhC6gg.VMHxJpuzUI3ZUbw/jhhj7PE.', 0, '2022-01-10 19:43:48', '2022-01-10 19:43:48'),
(13, 43, 'Alan', 'Cantrell', 'ferigyxy', '+1 (987) 341-9149', 'nubaqufody@mailinator.com', NULL, '$2y$10$hN/SSRleeEtzM0mkf7jisO2JgrGsZBDmpDuURleKR47nn5aWy6GHG', 0, '2022-01-16 09:39:12', '2022-01-16 09:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sales`
--

CREATE TABLE `flash_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `position` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(13, 1, 4, '2022-10-26', '50.00', 10, 0, NULL, NULL),
(14, 6, 6, '2022-01-19', '800.00', 10, 0, '2022-01-08 02:45:53', '2022-01-08 02:45:53'),
(15, 1, 6, '2022-01-24', '300.00', 5, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale_translations`
--

CREATE TABLE `flash_sale_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flash_sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `local` varchar(255) NOT NULL,
  `campaign_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `img_name` varchar(255) NOT NULL,
  `img_order` int(5) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `keyword_hits`
--

CREATE TABLE `keyword_hits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hit` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keyword_hits`
--

INSERT INTO `keyword_hits` (`id`, `keyword`, `hit`, `created_at`, `updated_at`) VALUES
(1, 'test', 2, '2022-01-01 00:47:42', '2022-01-01 01:08:30'),
(2, 'Irfan', 3, '2022-01-01 00:53:54', '2022-01-01 01:04:33'),
(3, 'Irfan chy', 2, '2022-01-01 01:08:11', '2022-01-01 01:08:19'),
(4, 'Apple', 1, '2022-01-01 01:08:44', '2022-01-01 01:08:44'),
(5, 'Richman Shirt', 1, '2022-01-01 01:08:58', '2022-01-01 01:08:58'),
(6, 'Shirt', 2, '2022-01-01 01:09:03', '2022-01-01 01:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_name` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `default` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `local`, `default`, `created_at`, `updated_at`) VALUES
(10, 'English', 'en', 0, '2021-02-19 10:23:59', '2021-03-03 13:37:45'),
(11, 'বাংলা', 'bn', 0, '2021-02-19 10:24:49', '2021-09-02 01:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `locale` varchar(191) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `class` varchar(255) DEFAULT NULL,
  `menu` bigint(20) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(13, 'en', 'About Us', 'about-us', 0, 0, NULL, 5, 0, '2021-10-24 00:03:12', '2021-11-01 00:19:16'),
(15, 'en', 'FAQ', 'faq', 0, 1, NULL, 5, 0, '2021-10-24 00:03:54', '2022-01-26 03:31:42'),
(17, 'bn', 'আমাদের সম্পর্কে', 'about-us', 0, 2, NULL, 5, 0, NULL, '2022-01-26 03:31:42'),
(19, 'bn', 'প্রশ্ন-জিজ্ঞাসা', 'faq', 0, 5, NULL, 5, 0, NULL, '2021-11-02 00:29:24'),
(20, 'en', 'Laravel', 'https://laravel.com/docs/7.x', 0, 9, NULL, 3, 0, '2022-02-07 19:00:08', '2022-02-07 19:00:08'),
(21, 'bn', 'লারাভেল', 'https://laravel.com/docs/7.x', 0, 0, NULL, 3, 0, '2022-02-07 19:17:15', '2022-02-07 20:13:03'),
(24, 'bn', 'টেস্ট', 'test', 0, 11, NULL, 3, 0, '2022-02-07 20:13:03', '2022-02-07 20:13:03');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_translations`
--

INSERT INTO `menu_translations` (`id`, `menu_id`, `locale`, `menu_name`, `created_at`, `updated_at`) VALUES
(2, 3, 'en', 'Primary Menu', '2021-08-22 19:30:03', '2021-08-23 16:37:27'),
(3, 4, 'en', 'Category Menu', '2021-08-23 05:10:08', '2021-09-02 00:51:30'),
(10, 3, 'bn', 'প্রাইমারী মেনু', '2021-08-23 17:37:07', '2021-08-23 17:39:31'),
(11, 5, 'en', 'Home Page Menu', '2021-10-23 23:18:18', '2022-01-25 07:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(222, '2021_10_25_124957_create_reviews_table', 68),
(223, '2021_10_28_032646_create_colors_table', 69),
(224, '2019_12_14_000001_create_personal_access_tokens_table', 70),
(225, '2022_01_01_060235_create_keyword_hits_table', 70),
(226, '2022_01_01_084443_add_soft_delete_to_slider_table', 71);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 6),
(3, 'App\\User', 1),
(4, 'App\\User', 10),
(6, 'App\\User', 7),
(6, 'App\\User', 8),
(6, 'App\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE `navigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `navigation_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` text DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_active` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(15, 'zuhair2025@gmail.com', '2021-10-05 01:37:39', '2021-10-05 01:37:39'),
(16, 'shahmim804@gmail.com', '2021-10-29 07:24:04', '2021-10-29 07:24:04'),
(18, 'irfanchowdhury77@gmail.com', '2021-10-29 07:26:52', '2021-10-29 07:26:52'),
(19, 'test198@gmail.com', '2021-10-29 07:27:58', '2021-10-29 07:27:58'),
(20, 'promichowdhury00@gmail.com', '2021-10-29 07:30:07', '2021-10-29 07:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `billing_first_name` varchar(255) NOT NULL,
  `billing_last_name` varchar(255) NOT NULL,
  `billing_email` varchar(255) NOT NULL,
  `billing_phone` varchar(255) NOT NULL,
  `billing_country` varchar(255) NOT NULL,
  `billing_address_1` varchar(255) NOT NULL,
  `billing_address_2` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_state` varchar(255) NOT NULL,
  `billing_zip_code` varchar(255) NOT NULL,
  `shipping_method` varchar(255) DEFAULT NULL,
  `shipping_cost` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `currency_base_total` decimal(10,2) DEFAULT NULL,
  `currency_symbol` varchar(191) DEFAULT NULL,
  `order_status` varchar(191) DEFAULT NULL,
  `payment_status` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `billing_first_name`, `billing_last_name`, `billing_email`, `billing_phone`, `billing_country`, `billing_address_1`, `billing_address_2`, `billing_city`, `billing_state`, `billing_zip_code`, `shipping_method`, `shipping_cost`, `payment_method`, `coupon_id`, `payment_id`, `discount`, `total`, `currency_base_total`, `currency_symbol`, `order_status`, `payment_status`, `date`, `tax_id`, `created_at`, `updated_at`) VALUES
(1, 21, 'Irfan', 'Chowdhury', 'irfanchowdhury', '01829498634', 'Bangladesh', 'Chitagong', NULL, 'Chitagong', 'Chitagong', 'Free', 'Flat Rate', '10', 'Paypal', NULL, NULL, NULL, '20.00', NULL, NULL, 'pending', NULL, '2021-10-13', NULL, '2021-10-13 00:36:00', '2021-10-13 00:36:00'),
(2, 21, 'Irfan', 'Chowdhury', 'irfanchowdhury', '01829498634', 'Bangladesh', 'Chitagong', NULL, 'Chitagong', 'Chitagong', 'Free', 'Flat Rate', '10', 'Paypal', NULL, NULL, NULL, '20.00', NULL, NULL, 'pending', NULL, '2021-10-11', NULL, '2021-10-13 00:54:41', '2021-10-13 00:54:41'),
(9, 21, 'First Name', 'Chowdhury', 'samu@gmail.com', '01829498634', 'Afghanistan', 'Muradpur', NULL, 'Chittagong', 'Chittagong', '4687', 'Flat Rate', '10', 'Paid By Paypal', NULL, '3X486290H1176245D', NULL, '1000.00', NULL, NULL, 'pending', NULL, '2021-10-13', NULL, '2021-10-13 05:14:20', '2021-10-13 05:14:20'),
(10, 21, 'First Name', 'Chowdhury', 'samu@gmail.com', '01829498634', 'Afghanistan', 'Muradpur', NULL, 'Chittagong', 'Chittagong', '4687', 'Flat Rate', '10', 'Paid By Paypal', NULL, '60401147XJ116644V', NULL, '1000.00', NULL, NULL, 'pending', NULL, '2021-10-13', NULL, '2021-10-13 05:16:11', '2021-10-13 05:16:11'),
(11, 21, 'Fahamina', 'Chy', 'test@gmail.com', '456874', 'Afghanistan', 'Hathazary', NULL, 'Chittagong', 'Chittagong', '46564', 'Flat Rate', '10', 'Paid By Paypal', NULL, '7CK5159532467043M', NULL, '1000.00', NULL, NULL, 'pendiing', NULL, '2021-10-13', NULL, '2021-10-13 05:34:01', '2021-10-13 05:34:01'),
(12, 21, 'Abir', 'Shanto', 'abir@gmail.com', '01548741214', 'Canada', 'halishohor', NULL, 'Chittagong', 'Bangladesh', '4330', 'Flat Rate', '10', 'Paid By Paypal', NULL, '8YY35375KF236241W', NULL, '1000.00', NULL, NULL, 'completed', NULL, '2021-10-14', NULL, '2021-10-13 22:37:01', '2021-10-13 22:37:01'),
(14, 21, 'Abdullah', 'khan', 'abdullah@gmail.com', '454867861', 'Algeria', 'Muradpur', NULL, 'Chittagong', 'Chittagong', '4330', 'Flat Rate', '10', 'Paid By Paypal', NULL, '2KV29378FE790734P', NULL, '1000.00', NULL, NULL, 'completed', NULL, '2021-10-14', NULL, '2021-10-14 00:55:46', '2021-10-14 00:55:46'),
(15, 21, 'Abdullah', 'khan', 'abdullah@gmail.com', '454867861', 'Algeria', 'Muradpur', NULL, 'Chittagong', 'Chittagong', '4330', 'Flat Rate', '10', 'Paid By Paypal', NULL, '80L03583FP394253L', NULL, '1000.00', NULL, NULL, 'completed', NULL, '2021-10-14', NULL, '2021-10-14 00:58:31', '2021-10-14 00:58:31'),
(16, 21, 'Raihan', 'Sharif', 'raihan@gmail.com', '154897164564', 'Canada', 'Aman Bazar', NULL, 'Aman Bazar', 'Bangladesh', '4330', 'Flat Rate', '10', 'Paid By Paypal', NULL, '8HN96594591745358', NULL, '1000.00', NULL, NULL, 'completed', NULL, '2021-10-14', NULL, '2021-10-14 01:02:32', '2021-10-14 01:02:32'),
(17, 21, 'Raihan', 'Sharif', 'raihan@gmail.com', '154897164564', 'Canada', 'Aman Bazar', NULL, 'Aman Bazar', 'Bangladesh', '4330', 'Flat Rate', '10', 'Paid By Paypal', NULL, '8HN96594591745358', NULL, '1000.00', NULL, NULL, 'completed', NULL, '2021-10-14', NULL, '2021-10-14 01:03:01', '2021-10-14 01:03:01'),
(24, NULL, 'Fahim', 'Khan', 'fahim@gmail.com', '124787', 'Afghanistan', 'Muradpur', NULL, 'Muradpur', 'Bangladesh', '4330', 'Flat Rate', '10', 'Paid By Paypal', NULL, '9CT05148SW746713K', NULL, '1000.00', NULL, NULL, 'completed', NULL, '2021-10-16', NULL, '2021-10-15 20:13:11', '2021-10-15 20:13:11'),
(25, 1, 'Fahim', 'Khanna', 'khanna @gmail.com', '464321347', 'Afghanistan', 'Muradpur', NULL, 'Chittagong', 'Chittagong', '4330', 'Flat Rate', '10', 'Paid By Paypal', NULL, '3M798286JS1795254', NULL, '0.00', NULL, NULL, 'canceled', NULL, '2021-10-16', NULL, '2021-10-15 21:54:51', '2021-10-15 21:54:51'),
(26, NULL, 'Pathan', 'Chowdhury', 'pathan@gmail.com', '16467774646', 'Canada', 'Muradpur', NULL, 'Muradpur', 'Bangladesh', '4330', 'Free Shipping', '10', 'Stripe', NULL, 'tok_1JmX2ySBbimX2c4JtWJglTZM', NULL, '1000.00', NULL, NULL, 'completed', NULL, '2021-10-20', NULL, '2021-10-19 23:09:03', '2021-10-19 23:09:03'),
(27, NULL, 'Ruby', 'Khatun', 'ruby@gmail.com', '45646454', 'Bangladesh', 'Modonhat', NULL, 'Chittagong', 'Chittagong', '4330', 'Free Shipping', '10', 'Stripe', NULL, 'tok_1JmXd9SBbimX2c4JOsVdiD5h', NULL, '1000.00', NULL, NULL, 'completed', NULL, '2021-10-20', NULL, '2021-10-19 23:46:25', '2021-10-19 23:46:25'),
(28, NULL, 'Ruby', 'Khatun', 'ruby@gmail.com', '45646454', 'Bangladesh', 'Modonhat', NULL, 'Chittagong', 'Chittagong', '4330', 'Free Shipping', '10', 'Stripe', NULL, 'tok_1JmXe1SBbimX2c4JqEupeAc0', NULL, '0.00', NULL, NULL, 'canceled', NULL, '2021-10-20', 1, '2021-10-19 23:47:19', '2021-10-19 23:47:19'),
(29, NULL, 'Ruby', 'Khatun', 'ruby@gmail.com', '45646454', 'Bangladesh', 'Modonhat', NULL, 'Chittagong', 'Chittagong', '4330', 'Free Shipping', '10', 'Stripe', NULL, 'tok_1JmYTWSBbimX2c4JX412G9Rd', NULL, '0.00', NULL, NULL, 'canceled', NULL, '2021-10-20', 1, '2021-10-20 00:40:33', '2021-10-20 00:40:33'),
(30, NULL, 'Ruby', 'Khatun', 'ruby@gmail.com', '45646454', 'Bangladesh', 'Modonhat', NULL, 'Chittagong', 'Chittagong', '4330', 'Free Shipping', '10', 'Stripe', NULL, 'tok_1JmYTWSBbimX2c4JARHoYKfY', NULL, '100.00', NULL, NULL, 'canceled', NULL, '2021-11-02', 1, '2021-11-02 00:40:33', '2021-10-20 00:40:33'),
(31, NULL, 'fahamina', 'Chowdhury', 'fahamina@gmail.com', '1567685454', 'Canada', 'Muradpur', NULL, 'Chittagong', 'Chittagong', '4330', 'Free Shipping', '10', 'Stripe', NULL, 'tok_1JmZ62SBbimX2c4J76rfr2EW', NULL, '1000.00', NULL, NULL, 'completed', NULL, '2021-10-21', 3, '2021-10-20 01:20:20', '2021-10-20 01:20:20'),
(32, 26, 'Maimul', 'islam', 'mainul@gmail.com', '01521222515', 'United States', 'Murapur', NULL, 'Chittagong', 'Chittagong', '4330', 'Free Shipping', '10', 'Stripe', NULL, 'tok_1JmjvVSBbimX2c4JqAGrGhiw', NULL, '1000.00', NULL, NULL, 'pending', NULL, '2021-10-21', 3, '2021-10-20 12:54:12', '2021-10-20 12:54:12'),
(33, 26, 'Maimul', 'islam', 'mainul@gmail.com', '01521222515', 'United States', 'Murapur', NULL, 'Chittagong', 'Chittagong', '4330', 'Free Shipping', '10', 'Stripe', 2, 'tok_1JmjxGSBbimX2c4JZYiXlEzQ', NULL, '1000.00', NULL, NULL, 'pending', NULL, '2021-10-21', 3, '2021-10-20 12:56:00', '2021-10-20 12:56:00'),
(34, 1, 'Arman', 'Ul Alam', 'arman@gmail.com', '123456789', 'Bangladesh', 'uttora', NULL, 'Dhaka', 'Dhaka', '4330', 'Free Shipping', '10', 'Stripe', 9, 'tok_1JndqmSBbimX2c4JXvcEb9Tx', NULL, '29258.00', NULL, NULL, 'completed', NULL, '2021-11-02', 1, '2021-11-02 00:37:08', '2021-10-23 04:52:29'),
(35, 27, 'Shamim', 'Chowdhury', 'shamim@gmail.com', '123456789', 'United States', 'Muradpur', NULL, 'Chittagong', 'Chittagong', '4330', 'Free Shipping', '10', 'Stripe', 2, 'tok_1JpU0fSBbimX2c4JPWaz8kYo', NULL, '12499.00', NULL, NULL, 'completed', NULL, '2021-10-28', 3, '2021-10-28 02:30:55', '2021-10-28 02:30:55'),
(40, 1, 'Irfan', 'Chowdhury', 'irfan@gmail.com', '123456789021', 'United States', 'XYZ', NULL, 'MNO', 'MON', '4330', 'Flat Rate', '10', 'Cash On Delivery', 2, '291027004', NULL, '1.00', NULL, NULL, 'pending', NULL, '2021-12-05', 1, '2021-11-16 10:09:28', '2021-11-16 10:09:28'),
(45, NULL, 'ffdsf', 'fsfsd', 'irfan@gmail.com', '2525252525', 'Albania', 'ssdfsdf', NULL, 'fsdfs', 'fsdfsdf', '34234', 'Free', '10', 'Stripe', NULL, 'tok_1KDpyESBbimX2c4JO2WGq4W7', NULL, '1815.00', NULL, NULL, 'completed', NULL, '2022-01-03', NULL, '2022-01-03 06:49:03', '2022-01-03 06:49:03'),
(46, NULL, 'ffdsf', 'fsfsd', 'irfan@gmail.com', '2525252525', 'Albania', 'ssdfsdf', NULL, 'fsdfs', 'fsdfsdf', '34234', 'Free', '10', 'Stripe', NULL, 'tok_1KDpyESBbimX2c4JklVNhQil', NULL, '1815.00', NULL, NULL, 'completed', NULL, '2022-01-03', NULL, '2022-01-03 06:49:03', '2022-01-03 06:49:03'),
(47, NULL, 'Aaron', 'Benson', 'xorulihiwy@mailinator.com', '+1 (471) 862-9169', 'Bangladesh', '131 Nobel Avenue', 'Mollitia provident', 'Veniam aliqua Quae', 'Quia molestiae aut c', '80361', 'local_pickup', '20', 'sslcommerz', 9, '61d5cca147851', NULL, '1835.00', NULL, NULL, 'pending', NULL, '2022-01-05', 3, '2022-01-05 10:51:45', '2022-01-05 10:51:45'),
(48, NULL, 'Erin', 'Patterson', 'vezy@mailinator.com', '+1 (319) 254-5713', 'Bangladesh', '356 North Second Lane', 'Omnis anim ea recusa', 'Tempora ipsum volup', 'Iste cumque fugit i', '99571', 'local_pickup', '20', 'sslcommerz', 9, '61d621cd1c8b7', NULL, '1835.00', NULL, NULL, 'pending', NULL, '2022-01-05', 3, '2022-01-05 16:55:09', '2022-01-05 16:55:09'),
(49, NULL, 'Abel', 'Fisher', 'jisyxyqugu@mailinator.com', '+1 (764) 548-6074', 'Bangladesh', '20 White Old Parkway', 'Provident ad debiti', 'Eiusmod ut laudantiu', 'Repudiandae eaque qu', '90460', 'local_pickup', '20', 'sslcommerz', 9, '61d62822f419c', NULL, '1865.00', NULL, NULL, 'pending', NULL, '2022-01-05', 3, '2022-01-05 17:22:11', '2022-01-05 17:22:11'),
(50, NULL, 'Melodie', 'Bush', 'duxupamu@mailinator.com', '+1 (363) 236-8974', 'Bangladesh', '644 Oak Avenue', NULL, 'Magna dolor et culpa', 'Id sed fugiat ea p', '63963', 'Paypal', '10', 'Cash On Delivery', 9, '563338526', NULL, '1875.00', NULL, NULL, 'pending', NULL, '2022-01-05', NULL, '2022-01-05 17:28:18', '2022-01-05 17:28:18'),
(51, NULL, 'Melodie', 'Bush', 'duxupamu@mailinator.com', '+1 (363) 236-8974', 'Bangladesh', '644 Oak Avenue', 'Quasi est ut magnam', 'Magna dolor et culpa', 'Id sed fugiat ea p', '63963', 'local_pickup', '20', 'sslcommerz', 9, '61d629924abac', NULL, '1875.00', NULL, NULL, 'pending', NULL, '2022-01-05', 3, '2022-01-05 17:28:18', '2022-01-05 17:28:18'),
(52, NULL, 'Kelly', 'Macias', 'fyhipi@mailinator.com', '+1 (496) 343-4638', 'Bangladesh', '827 East Cowley Court', 'Ex commodo laboris d', 'In accusamus proiden', 'Incidunt labore vol', '23914', 'local_pickup', '20', 'sslcommerz', 9, '61d62c3f8cb6c', NULL, '857.00', NULL, NULL, 'processing', NULL, '2022-01-05', 3, '2022-01-05 17:39:43', '2022-01-05 17:40:19'),
(53, NULL, 'Cain', 'Witt', 'movom@mailinator.com', '+1 (977) 957-2285', 'Bangladesh', '804 North Hague Parkway', 'Neque atque mollit q', 'Sit non voluptatem m', 'Sint non ipsam temp', '20091', 'local_pickup', '20', 'sslcommerz', NULL, '61d62e978cbd0', NULL, '1592.00', NULL, NULL, 'pending', 'processing', '2022-01-05', 3, '2022-01-05 17:49:43', '2022-01-05 17:50:31'),
(54, 1, '63 West Old Parkway', 'Consectetur sunt re', '', '', 'United States', 'Dolores aliqua Ut d', '89529', '', '+1 (209) 289-5584', '', 'local_pickup', '20', 'sslcommerz', 9, '61d6b64a701f1', NULL, '1592.00', NULL, NULL, 'pending', 'pending', '2022-01-06', 1, '2022-01-06 03:28:42', '2022-01-06 03:28:42'),
(55, 1, '63 West Old Parkway', 'Consectetur sunt re', '', '', 'United States', 'Dolores aliqua Ut d', '89529', '', '+1 (209) 289-5584', '', 'local_pickup', '20', 'sslcommerz', 9, '61d6b6a87ebb8', NULL, '1592.00', NULL, NULL, 'pending', 'pending', '2022-01-06', 1, '2022-01-06 03:30:16', '2022-01-06 03:30:16'),
(56, 1, 'Laurel', 'Burris', 'fiwinul@mailinator.com', '+1 (284) 461-8088', 'Bangladesh', '685 North Second Road', 'Distinctio Eius com', 'Vel in impedit offi', 'Quis quia aliquid no', '27521', 'local_pickup', '20', 'sslcommerz', 9, '61d6b8d806a1e', NULL, '1622.00', NULL, NULL, 'pending', 'pending', '2022-01-06', 3, '2022-01-06 03:39:36', '2022-01-06 03:39:36'),
(57, 1, 'Laurel', 'Burris', 'fiwinul@mailinator.com', '+1 (284) 461-8088', 'Bangladesh', '685 North Second Road', 'Distinctio Eius com', 'Vel in impedit offi', 'Quis quia aliquid no', '27521', 'local_pickup', '20', 'sslcommerz', 9, '61d6b8ebb4999', NULL, '1622.00', NULL, NULL, 'pending', 'pending', '2022-01-06', 3, '2022-01-06 03:39:55', '2022-01-06 03:39:55'),
(58, 1, 'Heather', 'Fuller', 'gequxolam@mailinator.com', '+1 (858) 987-8973', 'United States', '544 Fabien Court', 'Error qui illum imp', 'Est anim modi venia', 'Sequi et velit proid', '32115', 'local_pickup', '20', 'sslcommerz', NULL, '61d6b9a0e4040', NULL, '1592.00', NULL, NULL, 'pending', 'pending', '2022-01-06', 1, '2022-01-06 03:42:56', '2022-01-06 03:42:56'),
(59, 1, 'Heather', 'Fuller', 'gequxolam@mailinator.com', '+1 (858) 987-8973', 'United States', '544 Fabien Court', 'Error qui illum imp', 'Est anim modi venia', 'Sequi et velit proid', '32115', 'local_pickup', '20', 'sslcommerz', NULL, '61d6b9b61ec7f', NULL, '1572.00', NULL, NULL, 'pending', 'pending', '2022-01-06', 1, '2022-01-06 03:43:18', '2022-01-06 03:43:18'),
(69, 1, 'Ray', 'Palmer', 'wehizuh@mailinator.com', '+1 (956) 199-3384', 'United States', '685 West Clarendon Parkway', 'Sed libero ut consec', 'Ipsum sunt tenetur c', 'Possimus fugiat eos', '29030', 'local_pickup', '20', 'sslcommerz', NULL, '61d6be7d333af', NULL, '1572.00', NULL, NULL, 'pending', 'pending', '2022-01-06', 1, '2022-01-06 04:03:41', '2022-01-06 04:03:41'),
(73, 1, 'Noble', 'Mayo', 'zaheb@mailinator.com', '+1 (648) 569-2977', 'United States', '28 First Drive', 'Laborum iste praesen', 'Fuga Aperiam modi d', 'Rerum molestiae quo', '86773', 'local_pickup', '20', 'sslcommerz', NULL, '61d6bfaf37992', NULL, '1592.00', NULL, NULL, 'pending', 'pending', '2022-01-06', 1, '2022-01-06 04:08:47', '2022-01-06 04:08:47'),
(74, NULL, 'Hedley', 'Weber', 'qatyhorybi@mailinator.com', '+1 (605) 963-8814', 'United States', '365 Nobel Avenue', 'Enim ad maxime vel i', 'Sint cillum cum dolo', 'Iste blanditiis expe', '74544', 'local_pickup', '20', 'cash_on_delivery', NULL, '61d91ac11cccf', NULL, '1835.00', NULL, NULL, 'pending', 'pending', '2022-01-08', 1, '2022-01-07 23:01:53', '2022-01-07 23:01:53'),
(75, NULL, 'Channing', 'Norton', 'joxikoq@mailinator.com', '+1 (992) 184-8368', 'United States', '70 North Rocky Second Avenue', NULL, 'Aut sapiente ad reru', 'Eligendi ipsam volup', '69843', 'Free', '10', 'Stripe', NULL, 'tok_1KFXRKSBbimX2c4JKTghdO2P', NULL, '1815.00', NULL, NULL, 'completed', NULL, '2022-01-08', NULL, '2022-01-07 23:26:06', '2022-01-07 23:26:06'),
(76, NULL, 'Channing', 'Norton', 'joxikoq@mailinator.com', '+1 (992) 184-8368', 'United States', '70 North Rocky Second Avenue', NULL, 'Aut sapiente ad reru', 'Eligendi ipsam volup', '69843', 'Free', '10', 'Stripe', NULL, 'tok_1KFXROSBbimX2c4JU6xFJ9or', NULL, '1815.00', NULL, NULL, 'completed', NULL, '2022-01-08', NULL, '2022-01-07 23:26:11', '2022-01-07 23:26:11'),
(77, NULL, 'Channing', 'Norton', 'joxikoq@mailinator.com', '+1 (992) 184-8368', 'United States', '70 North Rocky Second Avenue', NULL, 'Aut sapiente ad reru', 'Eligendi ipsam volup', '69843', 'Free', '10', 'Stripe', NULL, 'tok_1KFXRqSBbimX2c4J14w9AFJq', NULL, '1815.00', NULL, NULL, 'completed', NULL, '2022-01-08', NULL, '2022-01-07 23:26:39', '2022-01-07 23:26:39'),
(78, NULL, 'Inga', 'Bruce', 'loquqacak@mailinator.com', '+1 (988) 144-7056', 'Bangladesh', '67 South Fabien Court', 'Tempor et rerum mini', 'Nisi placeat a plac', 'Odit reprehenderit a', '95208', 'local_pickup', '20', 'stripe', 9, '61db2c110c885', NULL, '1632.00', NULL, NULL, 'pending', 'pending', '2022-01-09', 3, '2022-01-09 12:40:17', '2022-01-09 12:40:17'),
(95, 1, 'Md Irfan', 'Chow', 'testgg@gmail.com', '01829498745', 'Canada', 'Test', NULL, 'test', 'test', '4553', 'Paypal', '10', 'Cash On Delivery', NULL, '544824230', NULL, '3100.00', NULL, NULL, 'pending', NULL, '2022-01-16', NULL, '2022-01-16 04:07:35', '2022-01-16 04:07:35'),
(96, 1, 'Md Irfan', 'Chow', 'testgg@gmail.com', '01829498745', 'Canada', 'Test', NULL, 'test', 'test', '4553', 'Paypal', '10', 'Cash On Delivery', NULL, '963695376', NULL, '0.00', NULL, NULL, 'pending', NULL, '2022-01-16', NULL, '2022-01-16 04:08:14', '2022-01-16 04:08:14'),
(97, 1, 'Test', 'Test bb', 'tes33t@gmail.com', '01829498765', 'Algeria', 'Test', NULL, 'Test', 'Test', 'Test', 'Paypal', '10', 'Cash On Delivery', NULL, '366954102', NULL, '3100.00', NULL, NULL, 'pending', NULL, '2022-01-16', NULL, '2022-01-16 04:10:29', '2022-01-16 04:10:29'),
(98, 1, 'Test', 'Test bb', 'tes33t@gmail.com', '01829498765', 'Algeria', 'Test', NULL, 'Test', 'Test', 'Test', 'Paypal', '10', 'Cash On Delivery', NULL, '806104957', NULL, '0.00', NULL, NULL, 'pending', NULL, '2022-01-16', NULL, '2022-01-16 04:10:53', '2022-01-16 04:10:53'),
(103, NULL, 'Md Irfan', 'Chy', 'test15@gmail.com', '01829498634', 'United States', 'Test', 'Test 12', 'Test 4', 'Test', '3322', 'free', '0', 'cash_on_delivery', NULL, '61e426f66614d', NULL, '36.00', '36.30', '$', 'pending', 'pending', '2022-01-16', 1, '2022-01-16 08:08:54', '2022-01-16 08:08:54'),
(104, NULL, 'test 23', 'hghg', 'tfg@gmail.com', '67903326', 'Canada', 'test', 'test j', 'gghh', 'ghgh', '6567', '', '0', 'cash_on_delivery', NULL, '61e42b0127eaa', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 08:26:09', '2022-01-16 08:26:09'),
(105, NULL, 'test', 'test gg', 'test112@gmail.com', '12345678967', 'Canada', 'gghgh', 'ghhg', 'test', 'test', '6758', '', '0', 'cash_on_delivery', NULL, '61e42ce987097', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 08:34:17', '2022-01-16 08:34:17'),
(106, NULL, 'test 23', 'hghg', 'trd@gmail.com', '1223456789098', 'Albania', 'test', 'ttrr', 'kjjk', 'jkjk', '6789', '', '0', 'cash_on_delivery', NULL, '61e42db01fa4b', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 08:37:36', '2022-01-16 08:37:36'),
(109, NULL, 'Alan', 'Cantrell', 'nubaqufody@mailinator.com', '+1 (987) 341-9149', 'El Salvador', '381 Milton Avenue', 'Fugit labore offici', 'Id at deleniti conse', 'Inventore in eligend', '22042', 'local_pickup', '20', 'cash_on_delivery', NULL, '61e43c210be59', NULL, '56.30', '4807.46', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 09:39:13', '2022-01-16 09:39:13'),
(110, NULL, 'Md Irfan', 'Chy', 'test54@gmail.com', '267389958587', 'Canada', 'Test', 'Test', 'Test', 'Test', '4335', '', '0', 'paypal', NULL, '61e44146ed339', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:01:10', '2022-01-16 10:01:10'),
(111, NULL, 'Md Irfan', 'Chy', 'test54@gmail.com', '267389958587', 'Canada', 'Test', 'Test', 'Test', 'Test', '4335', '', '0', 'paypal', NULL, '61e442ca9af11', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:07:38', '2022-01-16 10:07:38'),
(112, NULL, 'Test 34', 'chg', 'test66gmail.com', '2345678909', 'Canada', 'Tstf hh', 'Tstf hh', 'Tstf hh', 'Tstf hh', '4335', '', '0', 'paypal', NULL, '61e4437e3bffa', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:10:38', '2022-01-16 10:10:38'),
(113, NULL, '', '', '', '', '', '', '', '', '', '', '', '0', 'paypal', NULL, '61e4465c59147', NULL, '36.30', '3099.66', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:22:52', '2022-01-16 10:22:52'),
(114, NULL, 'ksjsksj', 'kjl', 'test908@gmail.com', '12345678907', 'Afghanistan', 'Test34', 'hffj23', 'Chittagong', 'Test', '5678', '', '0', 'stripe', NULL, '61e44705ede03', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:25:41', '2022-01-16 10:25:41'),
(115, NULL, 'Test', 'lkik', 'test9083@gmail.com', '1234567897', 'Canada', 'Test', 'Test', 'Test', 'Test', '430', '', '0', 'paypal', NULL, '61e448082f6ec', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:30:00', '2022-01-16 10:30:00'),
(120, NULL, 'Dane', 'Levy', 'vonoduzuz@mailinator.com', '+1 (313) 339-4374', 'St. Helena', '873 Old Boulevard', 'Dolore veniam sunt', 'Sit vitae soluta ut', 'Consequatur Optio', '38012', 'flat_rate', '25', 'paypal', NULL, '61e44cae97dca', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:49:50', '2022-01-16 10:49:50'),
(121, NULL, 'test', 'test gh', 'test678@gmail.com', '67890543221', 'Canada', 'test67', 'testjj', 'test', 'test', 'test', '', '0', 'paypal', NULL, '61e44d900444a', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:53:36', '2022-01-16 10:53:36'),
(122, NULL, 'test', 'test gh', 'test678@gmail.com', '67890543221', 'Canada', 'test67', 'testjj', 'test', 'test', 'test', '', '0', 'paypal', NULL, '61e44d9271337', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:53:38', '2022-01-16 10:53:38'),
(123, NULL, 'test', 'test gh', 'test678@gmail.com', '67890543221', 'Canada', 'test67', 'testjj', 'test', 'test', 'test', '', '0', 'paypal', NULL, '61e44dad8d29b', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:54:05', '2022-01-16 10:54:05'),
(124, NULL, 'test', 'test gh', 'test678@gmail.com', '67890543221', 'Canada', 'test67', 'testjj', 'test', 'test', 'test', '', '0', 'paypal', NULL, '61e44dafa6692', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:54:07', '2022-01-16 10:54:07'),
(125, NULL, '', '', '', '', '', '', '', '', '', '', '', '0', 'paypal', NULL, '61e44df227db9', NULL, '36.30', '3099.66', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:55:14', '2022-01-16 10:55:14'),
(126, NULL, '', '', '', '', '', '', '', '', '', '', '', '0', 'paypal', NULL, '61e44df4b2976', NULL, '36.30', '3099.66', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:55:16', '2022-01-16 10:55:16'),
(127, NULL, 'test', 'chy', 'test34@gmail.com', '12345678908', 'Afghanistan', 'test', 'test', 'test', 'test', '4332', '', '0', 'paypal', NULL, '61e44ec8df34a', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 10:58:48', '2022-01-16 10:58:48'),
(128, NULL, 'Test ggh', 'Chy', 'test119@gmail.com', '678983567', 'Canada', 'Test', 'Test', 'Test', 'Test', '6789', '', '0', 'paypal', NULL, '61e45050a6789', NULL, '36.30', '3099.66', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 11:05:20', '2022-01-16 11:05:20'),
(129, NULL, 'Test hh', 'Testbb', 'test67@gmail.com', '1234567890', 'Albania', 'Test', 'Test', 'Test', 'Test', '4567', '', '0', 'paypal', NULL, '61e450d8abb01', NULL, '3099.96', '264705.58', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 11:07:36', '2022-01-16 11:07:36'),
(130, NULL, '', '', '', '', '', '', '', '', '', '', '', '0', 'paypal', NULL, '61e451a3d2a1b', NULL, '36.30', '3099.66', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 11:10:59', '2022-01-16 11:10:59'),
(131, NULL, 'Ayanna', 'Schwartz', 'cypedyx@mailinator.com', '+1 (829) 574-3578', 'French Polynesia', '42 West Fabien Court', 'Dolore voluptatem vo', 'Qui non laudantium', 'Beatae suscipit saep', '25588', 'free', '0', 'sslcommerz', NULL, '61e452c5c4829', NULL, '36.30', '3099.66', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 11:15:49', '2022-01-16 11:15:49'),
(132, NULL, 'Kibo', 'Puckett', 'kuzysuhat@mailinator.com', '+1 (931) 204-2276', 'Belarus', '32 South Hague Boulevard', 'Cupiditate voluptate', 'Porro suscipit nostr', 'Et aliquip ea dolore', '63468', 'free', '0', 'sslcommerz', NULL, '61e453356370a', NULL, '36.30', '3099.66', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 11:17:41', '2022-01-16 11:17:41'),
(133, NULL, '', '', '', '', '', '', '', '', '', '', '', '0', 'sslcommerz', NULL, '61e45410b1e17', NULL, '36.30', '3099.66', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 11:21:20', '2022-01-16 11:21:20'),
(134, NULL, 'Elaine', 'Fischer', 'satawax@mailinator.com', '+1 (844) 559-5993', 'France, Metropolitan', '772 Cowley Parkway', 'Laboriosam quaerat', 'Laborum Sequi offic', 'Amet corporis lauda', '28572', 'free', '0', 'sslcommerz', NULL, '61e4545b0994d', NULL, '36.30', '3099.66', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 11:22:35', '2022-01-16 11:22:35'),
(135, NULL, 'Elaine', 'Fischer', 'satawax@mailinator.com', '+1 (844) 559-5993', 'France, Metropolitan', '772 Cowley Parkway', 'Laboriosam quaerat', 'Laborum Sequi offic', 'Amet corporis lauda', '28572', 'free', '0', 'sslcommerz', NULL, '61e45486d7a66', NULL, '36.30', '3099.66', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 11:23:18', '2022-01-16 11:23:18'),
(136, NULL, 'Elaine', 'Fischer', 'satawax@mailinator.com', '+1 (844) 559-5993', 'France, Metropolitan', '772 Cowley Parkway', 'Laboriosam quaerat', 'Laborum Sequi offic', 'Amet corporis lauda', '28572', 'free', '0', 'sslcommerz', NULL, '61e4549e5390b', NULL, '36.30', '3099.66', '৳', 'pending', 'complete', '2022-01-16', NULL, '2022-01-16 11:23:42', '2022-01-16 11:23:54'),
(137, NULL, 'Eric', 'Bass', 'nedoqip@mailinator.com', '+1 (692) 612-6399', 'Vietnam', '616 Milton Boulevard', 'Molestias similique', 'Sint cumque dignissi', 'Veniam culpa assume', '71566', 'local_pickup', '20', 'sslcommerz', NULL, '61e45526b1623', NULL, '56.30', '4807.46', '৳', 'pending', 'complete', '2022-01-16', NULL, '2022-01-16 11:25:58', '2022-01-16 11:26:10'),
(138, NULL, 'Belle', 'Pitts', 'xiqevire@mailinator.com', '+1 (572) 384-4131', 'Cook Islands', '619 North Milton Boulevard', 'Et dolorem facere ab', 'Sunt voluptatem mag', 'Et facere ipsum enim', '93695', 'free', '0', 'sslcommerz', NULL, '61e457c0a6963', NULL, '36.30', '3099.66', '৳', 'pending', 'complete', '2022-01-16', NULL, '2022-01-16 11:37:04', '2022-01-16 11:37:16'),
(139, NULL, 'Nigel', 'Mccall', 'dujowuvopy@mailinator.com', '+1 (819) 241-2227', 'Tuvalu', '295 North Fabien Boulevard', 'Quia sapiente molest', 'Est eum et at praes', 'Vero provident quia', '74998', 'flat_rate', '25', 'sslcommerz', NULL, '61e458569661b', NULL, '36.30', '36.30', '$', 'pending', 'complete', '2022-01-16', NULL, '2022-01-16 11:39:34', '2022-01-16 11:39:46'),
(140, NULL, 'Jenette', 'Freeman', 'botunesem@mailinator.com', '+1 (568) 255-1228', 'Turkey', '723 North Fabien Freeway', 'Est corrupti repreh', 'Ratione debitis comm', 'Amet hic soluta rep', '97353', 'flat_rate', '25', 'sslcommerz', NULL, '61e458b0c637e', NULL, '36.30', '3099.66', '৳', 'pending', 'complete', '2022-01-16', NULL, '2022-01-16 11:41:04', '2022-01-16 11:41:17'),
(141, NULL, 'Silas', 'Irwin', 'cilipyjaw@mailinator.com', '+1 (459) 681-2433', 'Gabon', '93 New Parkway', 'Omnis in ut cum odit', 'Totam quam tempor ea', 'Cum dolor id in illu', '68898', 'local_pickup', '20', 'cash_on_delivery', NULL, '61e45966a306e', NULL, '56.30', '4807.46', '৳', 'pending', 'pending', '2022-01-16', NULL, '2022-01-16 11:44:06', '2022-01-16 11:44:06'),
(142, 1, 'Irfan', 'Chowdhury', 'fahim@gmail.com', '01829498634', 'Bangladesh', 'Muradpur', 'Test', 'Chittagong', 'Chittagong', '4330', 'local_pickup', '20', 'cash_on_delivery', NULL, '61fc0dfb930a6', NULL, '2770.00', '2770.00', '$', 'pending', 'pending', '2022-02-03', 3, '2022-02-03 11:16:43', '2022-02-03 11:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `brands` varchar(255) DEFAULT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL,
  `tax` decimal(8,2) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `subtotal` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `brands`, `categories`, `tags`, `price`, `qty`, `weight`, `image`, `options`, `tax`, `discount`, `subtotal`, `created_at`, `updated_at`) VALUES
(10, 30, 5, NULL, NULL, NULL, '1000.00', 1, 1, '/images/products/RkxnkpCNFT.webp', '{\"image\":\"\\/images\\/products\\/RkxnkpCNFT.webp\",\"product_slug\":\"samsung-a12\",\"category_id\":\"20\"}', '0.00', '0.00', '1000.00', '2021-10-15 20:13:11', '2021-10-15 20:13:11'),
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
(21, 34, 3, NULL, NULL, NULL, '700.13', 1, 1, '/images/products/yJAK1MqJUj.webp', '{\"image\":\"\\/images\\/products\\/yJAK1MqJUj.webp\",\"product_slug\":\"probook-430-g8-notebook-pc\",\"category_id\":\"2\"}', '0.00', NULL, '700.13', '2021-10-23 00:37:08', '2021-10-23 00:37:08'),
(22, 40, 6, NULL, NULL, NULL, '12499.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '0.00', NULL, '12499.00', '2021-10-28 02:30:55', '2021-10-28 02:30:55'),
(24, 40, 2, NULL, NULL, NULL, '0.01', 1, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"27\"}', '0.00', '0.0100', '0.01', '2021-11-16 10:09:28', '2021-11-16 10:09:28'),
(25, 41, 7, NULL, NULL, NULL, '1200.00', 1, 1, '/images/products/6CiDPEZEeK.webp', '{\"image\":\"\\/images\\/products\\/6CiDPEZEeK.webp\",\"product_slug\":\"xiaomi-redmi-10\",\"category_id\":\"20\"}', '252.00', '', '1200.00', '2022-01-03 05:11:41', '2022-01-03 05:11:41'),
(26, 45, 8, NULL, NULL, NULL, '1500.00', 1, 1, '/images/products/qTdbo0QUjq.webp', '{\"image\":\"\\/images\\/products\\/qTdbo0QUjq.webp\",\"product_slug\":\"vivo-y91\",\"category_id\":\"20\"}', '315.00', '', '1500.00', '2022-01-03 06:49:03', '2022-01-03 06:49:03'),
(27, 46, 8, NULL, NULL, NULL, '1500.00', 1, 1, '/images/products/qTdbo0QUjq.webp', '{\"image\":\"\\/images\\/products\\/qTdbo0QUjq.webp\",\"product_slug\":\"vivo-y91\",\"category_id\":\"20\"}', '315.00', '', '1500.00', '2022-01-03 06:49:03', '2022-01-03 06:49:03'),
(28, 47, 8, NULL, NULL, NULL, '1500.00', 1, 1, '/images/products/qTdbo0QUjq.webp', '{\"image\":\"\\/images\\/products\\/qTdbo0QUjq.webp\",\"product_slug\":\"vivo-y91\",\"category_id\":\"20\"}', '315.00', '0', '1500.00', '2022-01-05 10:51:45', '2022-01-05 10:51:45'),
(29, 48, 8, NULL, NULL, NULL, '1500.00', 1, 1, '/images/products/qTdbo0QUjq.webp', '{\"image\":\"\\/images\\/products\\/qTdbo0QUjq.webp\",\"product_slug\":\"vivo-y91\",\"category_id\":\"20\"}', '315.00', '0', '1500.00', '2022-01-05 16:55:09', '2022-01-05 16:55:09'),
(30, 49, 8, NULL, NULL, NULL, '1500.00', 1, 1, '/images/products/qTdbo0QUjq.webp', '{\"image\":\"\\/images\\/products\\/qTdbo0QUjq.webp\",\"product_slug\":\"vivo-y91\",\"category_id\":\"20\"}', '315.00', '10.0000', '1500.00', '2022-01-05 17:22:11', '2022-01-05 17:22:11'),
(31, 50, 8, NULL, NULL, NULL, '1500.00', 1, 1, '/images/products/qTdbo0QUjq.webp', '{\"image\":\"\\/images\\/products\\/qTdbo0QUjq.webp\",\"product_slug\":\"vivo-y91\",\"category_id\":\"20\"}', '315.00', '10.0000', '1500.00', '2022-01-05 17:28:18', '2022-01-05 17:28:18'),
(32, 51, 8, NULL, NULL, NULL, '1500.00', 1, 1, '/images/products/qTdbo0QUjq.webp', '{\"image\":\"\\/images\\/products\\/qTdbo0QUjq.webp\",\"product_slug\":\"vivo-y91\",\"category_id\":\"20\"}', '315.00', '10.0000', '1500.00', '2022-01-05 17:28:18', '2022-01-05 17:28:18'),
(33, 52, 3, NULL, NULL, NULL, '700.13', 1, 1, '/images/products/yJAK1MqJUj.webp', '{\"image\":\"\\/images\\/products\\/yJAK1MqJUj.webp\",\"product_slug\":\"probook-430-g8-notebook-pc\",\"category_id\":\"2\"}', '147.03', '10.0000', '700.13', '2022-01-05 17:39:43', '2022-01-05 17:39:43'),
(34, 53, 6, NULL, NULL, NULL, '1299.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '272.79', '0', '1299.00', '2022-01-05 17:49:43', '2022-01-05 17:49:43'),
(35, 54, 6, NULL, NULL, NULL, '1299.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '272.79', '0', '1299.00', '2022-01-06 03:28:42', '2022-01-06 03:28:42'),
(36, 55, 6, NULL, NULL, NULL, '1299.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '272.79', '0', '1299.00', '2022-01-06 03:30:16', '2022-01-06 03:30:16'),
(37, 56, 6, NULL, NULL, NULL, '1299.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '272.79', '0', '1299.00', '2022-01-06 03:39:36', '2022-01-06 03:39:36'),
(38, 57, 6, NULL, NULL, NULL, '1299.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '272.79', '0', '1299.00', '2022-01-06 03:39:55', '2022-01-06 03:39:55'),
(39, 58, 6, NULL, NULL, NULL, '1299.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '272.79', '0', '1299.00', '2022-01-06 03:42:57', '2022-01-06 03:42:57'),
(40, 59, 6, NULL, NULL, NULL, '1299.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '272.79', '0', '1299.00', '2022-01-06 03:43:18', '2022-01-06 03:43:18'),
(41, 60, 6, NULL, NULL, NULL, '1299.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '272.79', '0', '1299.00', '2022-01-06 03:46:39', '2022-01-06 03:46:39'),
(42, 61, 6, NULL, NULL, NULL, '1299.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '272.79', '0', '1299.00', '2022-01-06 03:49:57', '2022-01-06 03:49:57'),
(43, 62, 6, NULL, NULL, NULL, '1299.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '272.79', '0', '1299.00', '2022-01-06 03:53:07', '2022-01-06 03:53:07'),
(50, 69, 6, NULL, NULL, NULL, '1299.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '272.79', '0', '1299.00', '2022-01-06 04:03:41', '2022-01-06 04:03:41'),
(54, 73, 6, NULL, NULL, NULL, '1299.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '272.79', '0', '1299.00', '2022-01-06 04:08:47', '2022-01-06 04:08:47'),
(55, 74, 30, NULL, NULL, NULL, '1500.00', 1, 1, '/images/products/J0n57usCkM.webp', '{\"image\":\"\\/images\\/products\\/J0n57usCkM.webp\",\"product_slug\":\"dining-table-4-seat\",\"category_id\":\"13\"}', '315.00', '0', '1500.00', '2022-01-07 23:01:53', '2022-01-07 23:01:53'),
(56, 75, 30, NULL, NULL, NULL, '1500.00', 1, 1, '/images/products/J0n57usCkM.webp', '{\"image\":\"\\/images\\/products\\/J0n57usCkM.webp\",\"product_slug\":\"dining-table-4-seat\",\"category_id\":\"13\"}', '315.00', '0', '1500.00', '2022-01-07 23:26:07', '2022-01-07 23:26:07'),
(57, 76, 30, NULL, NULL, NULL, '1500.00', 1, 1, '/images/products/J0n57usCkM.webp', '{\"image\":\"\\/images\\/products\\/J0n57usCkM.webp\",\"product_slug\":\"dining-table-4-seat\",\"category_id\":\"13\"}', '315.00', '0', '1500.00', '2022-01-07 23:26:11', '2022-01-07 23:26:11'),
(58, 78, 6, NULL, NULL, NULL, '1299.00', 1, 1, '/images/products/a0VVxPrimK.webp', '{\"image\":\"\\/images\\/products\\/a0VVxPrimK.webp\",\"product_slug\":\"samsung-galaxy-m02s\",\"category_id\":\"20\"}', '272.79', '10.0000', '1299.00', '2022-01-09 12:40:17', '2022-01-09 12:40:17'),
(59, 79, 34, NULL, NULL, NULL, '30.00', 2, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '60.00', '2022-01-11 02:35:51', '2022-01-11 02:35:51'),
(60, 82, 2, NULL, NULL, NULL, '0.01', 1, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"27\"}', '0.00', '', '0.01', '2022-01-11 04:14:49', '2022-01-11 04:14:49'),
(61, 83, 2, NULL, NULL, NULL, '0.01', 1, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"27\"}', '0.00', '', '0.01', '2022-01-11 04:16:11', '2022-01-11 04:16:11'),
(62, 84, 2, NULL, NULL, NULL, '0.01', 1, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"27\"}', '0.00', '', '0.01', '2022-01-11 04:16:53', '2022-01-11 04:16:53'),
(63, 85, 2, NULL, NULL, NULL, '0.01', 1, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"27\"}', '0.00', '', '0.01', '2022-01-11 04:18:15', '2022-01-11 04:18:15'),
(64, 86, 2, NULL, NULL, NULL, '0.01', 1, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"27\"}', '0.00', '', '0.01', '2022-01-11 04:20:22', '2022-01-11 04:20:22'),
(65, 87, 2, NULL, NULL, NULL, '0.01', 1, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"27\"}', '0.00', '', '0.01', '2022-01-11 04:25:21', '2022-01-11 04:25:21'),
(66, 89, 2, NULL, NULL, NULL, '0.01', 1, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"27\"}', '0.00', '', '0.01', '2022-01-11 04:26:39', '2022-01-11 04:26:39'),
(67, 90, 2, NULL, NULL, NULL, '0.01', 1, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"27\"}', '0.00', '', '0.01', '2022-01-11 04:47:22', '2022-01-11 04:47:22'),
(68, 91, 2, NULL, NULL, NULL, '0.01', 1, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"27\"}', '0.00', '', '0.01', '2022-01-11 04:50:18', '2022-01-11 04:50:18'),
(69, 92, 2, NULL, NULL, NULL, '0.01', 1, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"27\"}', '0.00', '', '0.01', '2022-01-11 04:56:49', '2022-01-11 04:56:49'),
(70, 93, 2, NULL, NULL, NULL, '0.01', 1, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"27\"}', '0.00', '', '0.01', '2022-01-11 04:58:21', '2022-01-11 04:58:21'),
(71, 94, 2, NULL, NULL, NULL, '0.01', 1, 1, '/images/products/GyohtUA8zd.webp', '{\"image\":\"\\/images\\/products\\/GyohtUA8zd.webp\",\"product_slug\":\"oppo-watch\",\"category_id\":\"27\"}', '0.00', '', '0.01', '2022-01-11 05:23:51', '2022-01-11 05:23:51'),
(72, 95, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '0', '30.00', '2022-01-16 04:07:35', '2022-01-16 04:07:35'),
(73, 97, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 04:10:29', '2022-01-16 04:10:29'),
(74, 99, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 04:12:47', '2022-01-16 04:12:47'),
(75, 100, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 04:12:47', '2022-01-16 04:12:47'),
(76, 103, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 08:08:54', '2022-01-16 08:08:54'),
(77, 104, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 08:26:09', '2022-01-16 08:26:09'),
(78, 105, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 08:34:17', '2022-01-16 08:34:17'),
(79, 106, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 08:37:36', '2022-01-16 08:37:36'),
(80, 107, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 09:00:42', '2022-01-16 09:00:42'),
(81, 108, 34, NULL, NULL, NULL, '30.00', 2, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '60.00', '2022-01-16 09:14:48', '2022-01-16 09:14:48'),
(82, 109, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '0', '30.00', '2022-01-16 09:39:13', '2022-01-16 09:39:13'),
(83, 110, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 10:01:11', '2022-01-16 10:01:11'),
(84, 111, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 10:07:38', '2022-01-16 10:07:38'),
(85, 112, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 10:10:38', '2022-01-16 10:10:38'),
(86, 113, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 10:22:52', '2022-01-16 10:22:52'),
(87, 114, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 10:25:42', '2022-01-16 10:25:42'),
(88, 115, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 10:30:00', '2022-01-16 10:30:00'),
(89, 118, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 10:35:25', '2022-01-16 10:35:25'),
(90, 120, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '0', '30.00', '2022-01-16 10:49:50', '2022-01-16 10:49:50'),
(91, 121, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 10:53:36', '2022-01-16 10:53:36'),
(92, 125, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 10:55:14', '2022-01-16 10:55:14'),
(93, 127, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 10:58:49', '2022-01-16 10:58:49'),
(94, 128, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 11:05:20', '2022-01-16 11:05:20'),
(95, 129, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 11:07:36', '2022-01-16 11:07:36'),
(96, 130, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 11:10:59', '2022-01-16 11:10:59'),
(97, 131, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '0', '30.00', '2022-01-16 11:15:49', '2022-01-16 11:15:49'),
(98, 132, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '0', '30.00', '2022-01-16 11:17:41', '2022-01-16 11:17:41'),
(99, 133, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '', '30.00', '2022-01-16 11:21:20', '2022-01-16 11:21:20'),
(100, 134, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '0', '30.00', '2022-01-16 11:22:35', '2022-01-16 11:22:35'),
(101, 135, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '0', '30.00', '2022-01-16 11:23:18', '2022-01-16 11:23:18'),
(102, 136, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '0', '30.00', '2022-01-16 11:23:42', '2022-01-16 11:23:42'),
(103, 137, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '0', '30.00', '2022-01-16 11:25:58', '2022-01-16 11:25:58'),
(104, 138, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '0', '30.00', '2022-01-16 11:37:04', '2022-01-16 11:37:04'),
(105, 139, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '0', '30.00', '2022-01-16 11:39:34', '2022-01-16 11:39:34'),
(106, 140, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '0', '30.00', '2022-01-16 11:41:04', '2022-01-16 11:41:04'),
(107, 141, 34, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/BbuZbWcvXu.webp', '{\"image\":\"\\/images\\/products\\/BbuZbWcvXu.webp\",\"product_slug\":\"current-luxery\",\"category_id\":\"27\"}', '6.30', '0', '30.00', '2022-01-16 11:44:06', '2022-01-16 11:44:06'),
(108, 142, 7, NULL, NULL, NULL, '1200.00', 1, 1, '/images/products/6CiDPEZEeK.webp', '{\"image\":\"\\/images\\/products\\/6CiDPEZEeK.webp\",\"product_slug\":\"xiaomi-redmi-ten\",\"category_id\":\"20\"}', '0.00', '', '1200.00', '2022-02-03 11:16:43', '2022-02-03 11:16:43'),
(109, 142, 8, NULL, NULL, NULL, '1500.00', 1, 1, '/images/products/qTdbo0QUjq.webp', '{\"image\":\"\\/images\\/products\\/qTdbo0QUjq.webp\",\"product_slug\":\"vivo-y91\",\"category_id\":\"20\"}', '0.00', '', '1500.00', '2022-02-03 11:16:43', '2022-02-03 11:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'about-us', 1, '2021-04-19 16:24:42', '2021-04-20 01:36:43'),
(5, 'faq', 1, '2021-04-19 16:50:44', '2021-07-27 02:48:40'),
(6, 'privacy-&-policy', 1, '2021-04-20 12:02:11', '2021-04-20 12:02:11'),
(7, 'terms-&-condition', 1, '2021-04-20 12:02:43', '2022-02-12 02:08:57'),
(8, 'return-policy', 1, '2021-04-20 12:03:28', '2021-07-27 02:48:40'),
(9, 'information', 0, '2021-11-01 00:59:30', '2021-11-01 00:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `page_name`, `body`, `created_at`, `updated_at`) VALUES
(1, 4, 'en', 'About Us', '<h2 style=\"text-align: justify;\">CartPro is your favourite shopping destination</h2>\n<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur quasi natus quia facilis corporis quibusdam ut non laudantium recusandae fugiat rerum ab aliquid accusamus cumque quae, illum id voluptatem ducimus.</p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<div class=\"col-md-5 offset-md-1\">\n<div class=\"single-promo-item style3\">\n<div class=\"promo-icon style3\">&nbsp;</div>\n<div class=\"promo-content style3\">\n<h3>Free Shipping Worldwide</h3>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, eveniet!</p>\n</div>\n</div>\n<div class=\"single-promo-item style3\">\n<div class=\"promo-icon style3\">&nbsp;</div>\n<div class=\"promo-content style3\">\n<h3>Money returns</h3>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, eveniet!</p>\n</div>\n</div>\n<div class=\"single-promo-item style3\">\n<div class=\"promo-icon style3\">&nbsp;</div>\n<div class=\"promo-content style3\">\n<h3>100% secured checkout</h3>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, eveniet!</p>\n</div>\n</div>\n<div class=\"single-promo-item style3\">\n<div class=\"promo-icon style3\">&nbsp;</div>\n<div class=\"promo-content style3\">\n<h3>24/7 Support</h3>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, eveniet!</p>\n</div>\n</div>\n</div>\n<p style=\"text-align: justify;\"><img title=\"bg-about.jpg\" src=\"data:image/jpeg;base64,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\" alt=\"\" width=\"1920\" height=\"1240\" /></p>', '2021-04-19 16:24:42', '2021-11-06 22:15:10');
INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `page_name`, `body`, `created_at`, `updated_at`) VALUES
(2, 5, 'en', 'FAQ', '<section class=\"custom-page-wrap clearfix\">\n<div class=\"container\">\n<div class=\"custom-page-content clearfix\">\n<h1 style=\"text-align: center;\">Help &amp; FAQ</h1>\n<p>&nbsp;</p>\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>What does LOREM mean?</h4>\n<p>&lsquo;Lorem ipsum dolor sit amet, consectetur adipisici elit&hellip;&rsquo; (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts, for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word &lsquo;Lorem&rsquo; does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>Why do we use it?</h4>\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>Where does it come from?</h4>\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>Where can I get some?</h4>\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<h4>Why do we use Lorem Ipsum?</h4>\n<p>Many times, readers will get distracted by readable text when looking at the layout of a page. Instead of using filler text that says &ldquo;Insert content here,&rdquo; Lorem Ipsum uses a normal distribution of letters, making it resemble standard English. This makes it easier for designers to focus on visual elements, as opposed to what the text on a page actually says. Lorem Ipsum is absolutely necessary in most design cases, too. Web design projects like landing pages, website redesigns and so on only look as intended when they\'re fully-fleshed out with content.</p>\n</div>\n</div>\n</section>', '2021-04-19 16:50:44', '2021-10-24 22:01:57'),
(3, 6, 'en', 'Privacy & Policy', '<p>This is Testing Purpose</p>', '2021-04-20 12:02:11', '2021-04-20 12:02:11'),
(4, 7, 'en', 'Terms & Condition', '&lt;section class=&quot;custom-page-wrap clearfix&quot;&gt;\n&lt;div class=&quot;container&quot;&gt;\n&lt;div class=&quot;custom-page-content clearfix&quot;&gt;\n&lt;h1 style=&quot;text-align: center;&quot;&gt;Terms of Service&lt;/h1&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;This website is operated by a.season. Throughout the site, the terms &amp;ldquo;we&amp;rdquo;, &amp;ldquo;us&amp;rdquo; and &amp;ldquo;our&amp;rdquo; refer to a.season. a.season offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;By visiting our site and/ or purchasing something from us, you engage in our &amp;ldquo;Service&amp;rdquo; and agree to be bound by the following terms and conditions (&amp;ldquo;Terms of Service&amp;rdquo;, &amp;ldquo;Terms&amp;rdquo;), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;Online Store Terms&lt;/h4&gt;\n&lt;p&gt;By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;General Conditions&lt;/h4&gt;\n&lt;p&gt;We reserve the right to refuse service to anyone for any reason at any time.&lt;br /&gt;You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;License&lt;/h4&gt;\n&lt;p&gt;You must not:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;Republish material from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;li&gt;Sell, rent or sub-license material from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;li&gt;Reproduce, duplicate or copy material from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;li&gt;Redistribute content from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;Disclaimer&lt;/h4&gt;\n&lt;p&gt;To the maximum extent permitted by applicable law, we exclude all representations:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;limit or exclude our or your liability for death or personal injury;&lt;/li&gt;\n&lt;li&gt;limit or exclude our or your liability for fraud or fraudulent misrepresentation;&lt;/li&gt;\n&lt;li&gt;limit any of our or your liabilities in any way that is not permitted under applicable law; or&lt;/li&gt;\n&lt;li&gt;exclude any of our or your liabilities that may not be excluded under applicable law.&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/section&gt;', '2021-04-20 12:02:43', '2022-02-12 02:07:58'),
(5, 8, 'en', 'Return Policy', '<p>Testing</p>', '2021-04-20 12:03:28', '2021-04-20 12:03:28'),
(6, 4, 'bn', 'আমাদের সম্পর্কে', '<p>Lorem Ipsum-এর অনুচ্ছেদের অনেক বৈচিত্র উপলব্ধ রয়েছে, কিন্তু অধিকাংশই কোনো না কোনো আকারে পরিবর্তনের শিকার হয়েছে, ইনজেকশন করা হাস্যরস, বা এলোমেলো শব্দ যা সামান্য বিশ্বাসযোগ্য মনে হচ্ছে না। আপনি যদি Lorem Ipsum-এর একটি প্যাসেজ ব্যবহার করতে যাচ্ছেন, তাহলে আপনাকে নিশ্চিত হতে হবে যে টেক্সটের মাঝখানে বিব্রতকর কিছু লুকানো নেই। ইন্টারনেটের সমস্ত লোরেম ইপসাম জেনারেটরগুলি প্রয়োজনীয় হিসাবে পূর্বনির্ধারিত অংশগুলি পুনরাবৃত্তি করার প্রবণতা রাখে, যা এটিকে ইন্টারনেটে প্রথম সত্য জেনারেটর করে তোলে। এটি লরেম ইপসাম তৈরি করতে 200 টিরও বেশি ল্যাটিন শব্দের অভিধান ব্যবহার করে, যা কিছু মডেল বাক্য গঠনের সাথে মিলিত হয় যা যুক্তিসঙ্গত বলে মনে হয়। উত্পন্ন লোরেম ইপসাম তাই সবসময় পুনরাবৃত্তি, ইনজেকশন করা হাস্যরস, বা অ-চরিত্রহীন শব্দ ইত্যাদি থেকে মুক্ত। Lorem ipsum dolor sit amet, consectetur adipiscing elit. লুক্টাস নুনক আইডি লেকটাস পেলেনটেস্ক ল্যাকিনিয়াতে। Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur. Nam sed sapien sed lacus placerat euismod in consectetur ex. Sed et odio ultrices, Semper Sem Sed, scelerisque libero. প্রাইভেন ইউটি এক্স varius libero viverra pellentesque.</p>', '2021-04-20 12:04:16', '2021-11-01 06:21:39'),
(7, 4, 'hi', 'हमारे बारे में', '<p>हमारे बारे मेंहमारे बारे मेंहमारे बारे मेंहमारे बारे मेंहमारे बारे में</p>', '2021-04-20 12:05:49', '2021-04-20 12:05:49'),
(8, 9, 'en', 'Information', 'Test', '2021-11-01 00:59:30', '2021-11-01 00:59:30'),
(9, 5, 'bn', 'প্রশ্ন জিজ্ঞাসা', 'সাহায্য এবং FAQ\n\n \n\nLorem Ipsum হল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য। লোরেম ইপসাম 1500 এর দশক থেকে শিল্পের মানক ডামি টেক্সট হয়েছে, যখন একটি অজানা প্রিন্টার টাইপের একটি গ্যালি নিয়েছিল এবং একটি টাইপ নমুনা বই তৈরি করতে এটিকে স্ক্র্যাম্বল করেছিল। এটি শুধুমাত্র পাঁচ শতক নয়, ইলেকট্রনিক টাইপসেটিং-এ লাফিয়েও টিকে আছে, যা অপরিহার্যভাবে অপরিবর্তিত রয়েছে। এটি 1960-এর দশকে লোরেম ইপসাম প্যাসেজ সম্বলিত লেট্রাসেট শীট প্রকাশের মাধ্যমে এবং অতি সম্প্রতি লোরেম ইপসামের সংস্করণ সহ অ্যালডাস পেজমেকারের মতো ডেস্কটপ প্রকাশনা সফ্টওয়্যারের মাধ্যমে জনপ্রিয় হয়েছিল।\n\n \n\n \nLOREM মানে কি?\n\n\'Lorem ipsum dolor sit amet, consectetur adipisici elit...\' (সম্পূর্ণ পাঠ্য) হল ডামি টেক্সট যা কিছু বোঝানোর জন্য নয়। এটি ম্যাগাজিন লেআউটে একটি স্থানধারক হিসাবে ব্যবহৃত হয়, উদাহরণস্বরূপ, সমাপ্ত নথির একটি ছাপ দেওয়ার জন্য। পাঠ্যটি ইচ্ছাকৃতভাবে দুর্বোধ্য যাতে দর্শক বিষয়বস্তু দ্বারা বিভ্রান্ত না হয়। ভাষাটি প্রকৃত ল্যাটিন নয় এবং এমনকি প্রথম শব্দ \'লোরেম\'-এর অস্তিত্ব নেই। বলা হয় যে লোরেম ইপসাম টেক্সট 16 শতক থেকে টাইপসেটারদের মধ্যে প্রচলিত।\n\n \n\n \nআমরা কেন এটা ব্যবহার করি?\n\nএটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে একটি পাঠক একটি পৃষ্ঠার পাঠযোগ্য বিষয়বস্তু দ্বারা বিভ্রান্ত হবে যখন এটির বিন্যাসটি দেখবে। Lorem Ipsum ব্যবহার করার বিষয় হল যে এটিতে \'এখানে সামগ্রী, এখানে বিষয়বস্তু\' ব্যবহার করার বিপরীতে অক্ষরগুলির একটি কম-বেশি স্বাভাবিক বিতরণ রয়েছে, এটিকে পঠনযোগ্য ইংরেজির মতো দেখায়। অনেক ডেস্কটপ পাবলিশিং প্যাকেজ এবং ওয়েব পেজ এডিটররা এখন তাদের ডিফল্ট মডেল টেক্সট হিসেবে Lorem Ipsum ব্যবহার করে এবং \'lorem ipsum\'-এর জন্য একটি অনুসন্ধান অনেক ওয়েব সাইটকে তাদের শৈশবকালে উন্মোচিত করবে। বছরের পর বছর ধরে বিভিন্ন সংস্করণ বিকশিত হয়েছে, কখনো দুর্ঘটনাক্রমে, কখনো উদ্দেশ্যমূলক (ইনজেক্টেড হিউমার এবং এর মতো)।\n\n \n\n \nএটা কোথা থেকে এসেছে?\n\nজনপ্রিয় বিশ্বাসের বিপরীতে, Lorem Ipsum কেবল এলোমেলো পাঠ্য নয়। এটি 45 খ্রিস্টপূর্বাব্দের ধ্রুপদী ল্যাটিন সাহিত্যের একটি অংশে শিকড় রয়েছে, যা এটি 2000 বছরেরও বেশি পুরানো। ভার্জিনিয়ার হ্যাম্পডেন-সিডনি কলেজের একজন ল্যাটিন অধ্যাপক রিচার্ড ম্যাকক্লিনটক লোরেম ইপসাম প্যাসেজ থেকে আরও অস্পষ্ট ল্যাটিন শব্দ কনসেক্টুরের সন্ধান করেছিলেন এবং শাস্ত্রীয় সাহিত্যে এই শব্দের উদ্ধৃতিগুলির মধ্য দিয়ে গিয়ে সন্দেহাতীত উত্সটি আবিষ্কার করেছিলেন।\n\n \n\n \nআমি কোথায় কিছু পেতে পারি?\n\nLorem Ipsum-এর অনুচ্ছেদের অনেক বৈচিত্র উপলব্ধ রয়েছে, কিন্তু অধিকাংশই কোনো না কোনো আকারে পরিবর্তনের শিকার হয়েছে, ইনজেকশন করা হাস্যরস, বা এলোমেলো শব্দ যা সামান্য বিশ্বাসযোগ্য মনে হচ্ছে না। আপনি যদি Lorem Ipsum-এর একটি প্যাসেজ ব্যবহার করতে যাচ্ছেন, তাহলে আপনাকে নিশ্চিত হতে হবে যে টেক্সটের মাঝখানে বিব্রতকর কিছু লুকানো নেই। ইন্টারনেটের সমস্ত লোরেম ইপসাম জেনারেটরগুলি প্রয়োজনীয় হিসাবে পূর্বনির্ধারিত অংশগুলি পুনরাবৃত্তি করার প্রবণতা রাখে, যা এটিকে ইন্টারনেটে প্রথম সত্য জেনারেটর করে তোলে। এটি লরেম ইপসাম তৈরি করতে 200 টিরও বেশি ল্যাটিন শব্দের অভিধান ব্যবহার করে, যা কিছু মডেল বাক্য গঠনের সাথে মিলিত হয় যা যুক্তিসঙ্গত বলে মনে হয়। উত্পন্ন লোরেম ইপসাম তাই সবসময় পুনরাবৃত্তি, ইনজেকশন করা হাস্যরস, বা অ-চরিত্রহীন শব্দ ইত্যাদি থেকে মুক্ত।\n\n \n\n \nকেন আমরা Lorem Ipsum ব্যবহার করি?\n\nঅনেক সময়, পাঠকরা একটি পৃষ্ঠার বিন্যাস দেখার সময় পাঠযোগ্য পাঠ্য দ্বারা বিভ্রান্ত হবেন। \"এখানে বিষয়বস্তু ঢোকান\" বলে ফিলার টেক্সট ব্যবহার করার পরিবর্তে লোরেম ইপসাম অক্ষরগুলির একটি সাধারণ বিতরণ ব্যবহার করে, এটিকে সাধারণ ইংরেজির মতো করে। এটি ডিজাইনারদের ভিজ্যুয়াল উপাদানগুলিতে ফোকাস করা সহজ করে তোলে, একটি পৃষ্ঠার পাঠ্য আসলে যা বলে তার বিপরীতে। বেশিরভাগ ডিজাইনের ক্ষেত্রেও Lorem Ipsum একেবারে প্রয়োজনীয়। ওয়েব ডিজাইন প্রজেক্ট যেমন ল্যান্ডিং পেজ, ওয়েবসাইট রিডিজাইন ইত্যাদি শুধুমাত্র তখনই দেখায় যখন সেগুলি সম্পূর্ণরূপে কন্টেন্টের সাথে পরিপূর্ণ হয়।', NULL, NULL),
(10, 7, 'bn', 'টার্ম ও কন্ডিশন', 'সেবা পাবার শর্ত\n\n \n\nএই ওয়েবসাইট a.season দ্বারা পরিচালিত হয়. পুরো সাইট জুড়ে, “আমরা”, “আমাদের” এবং “আমাদের” শব্দগুলো a.season-কে বোঝায়। a.season এই ওয়েবসাইটটি অফার করে, এই সাইট থেকে উপলব্ধ সমস্ত তথ্য, সরঞ্জাম এবং পরিষেবাগুলি সহ আপনার, ব্যবহারকারীর জন্য, এখানে উল্লিখিত সমস্ত শর্তাবলী, শর্তাবলী, নীতি এবং বিজ্ঞপ্তিগুলি আপনার স্বীকৃতির উপর শর্তযুক্ত।\n\n \n\nআমাদের সাইট পরিদর্শন করে এবং/অথবা আমাদের কাছ থেকে কিছু কেনার মাধ্যমে, আপনি আমাদের \"পরিষেবা\"-তে নিযুক্ত হন এবং নিম্নলিখিত শর্তাবলী (\"পরিষেবার শর্তাবলী\", \"শর্তাবলী\") দ্বারা আবদ্ধ হতে সম্মত হন, সেই অতিরিক্ত শর্তাবলী এবং নীতিগুলি সহ এখানে উল্লেখ করা হয়েছে এবং/অথবা হাইপারলিঙ্ক দ্বারা উপলব্ধ। এই পরিষেবার শর্তাবলী সাইটের সমস্ত ব্যবহারকারীর জন্য প্রযোজ্য, যার মধ্যে সীমাবদ্ধতা ছাড়াই ব্যবহারকারী যারা ব্রাউজার, বিক্রেতা, গ্রাহক, বণিক, এবং/অথবা সামগ্রীর অবদানকারী।\n\n \n\n \nঅনলাইন স্টোর শর্তাবলী\n\nএই পরিষেবার শর্তাবলীতে সম্মত হওয়ার মাধ্যমে, আপনি প্রতিনিধিত্ব করেন যে আপনার রাজ্য বা বসবাসের প্রদেশে আপনার বয়স সংখ্যাগরিষ্ঠ, অথবা আপনি আপনার রাজ্য বা বসবাসের প্রদেশে সংখ্যাগরিষ্ঠের বয়স এবং আপনি আমাদের সম্মতি দিয়েছেন আপনার অপ্রাপ্তবয়স্ক নির্ভরশীলদের এই সাইটটি ব্যবহার করার অনুমতি দিন।\n\n \n\n \nসাধারণ শর্ত\n\nআমরা যে কোন সময় যে কোন কারণে যে কাউকে সেবা প্রত্যাখ্যান করার অধিকার সংরক্ষণ করি।\nআপনি বুঝতে পারেন যে আপনার বিষয়বস্তু (ক্রেডিট কার্ডের তথ্য সহ নয়), এনক্রিপ্ট ছাড়া স্থানান্তরিত হতে পারে এবং (ক) বিভিন্ন নেটওয়ার্কে ট্রান্সমিশন জড়িত হতে পারে; এবং (খ) সংযোগকারী নেটওয়ার্ক বা ডিভাইসগুলির প্রযুক্তিগত প্রয়োজনীয়তাগুলির সাথে সামঞ্জস্য এবং মানিয়ে নেওয়ার জন্য পরিবর্তনগুলি৷ নেটওয়ার্কে স্থানান্তরের সময় ক্রেডিট কার্ডের তথ্য সর্বদা এনক্রিপ্ট করা হয়।\n\n \n\n \nলাইসেন্স\n\nতুমি অবশ্যই না:\n\n \n\n    ওয়েবসাইট নাম থেকে উপাদান পুনঃপ্রকাশ\n    ওয়েবসাইটের নাম থেকে বিক্রি, ভাড়া বা উপ-লাইসেন্স উপাদান\n    ওয়েবসাইটের নাম থেকে উপাদান পুনরুত্পাদন, অনুলিপি বা অনুলিপি করুন\n    ওয়েবসাইটের নাম থেকে সামগ্রী পুনরায় বিতরণ করুন\n\n \n\n \nদাবিত্যাগ\n\nপ্রযোজ্য আইন দ্বারা অনুমোদিত সর্বাধিক পরিমাণে, আমরা সমস্ত উপস্থাপনা বাদ দিই:\n\n \n\n    মৃত্যু বা ব্যক্তিগত আঘাতের জন্য আমাদের বা আপনার দায়বদ্ধতা সীমিত বা বাদ দিন;\n    জালিয়াতি বা প্রতারণামূলক ভুল উপস্থাপনের জন্য আমাদের বা আপনার দায়বদ্ধতাকে সীমাবদ্ধ বা বাদ দিন;\n    প্রযোজ্য আইনের অধীনে অনুমোদিত নয় এমন যেকোন উপায়ে আমাদের বা আপনার দায়বদ্ধতাগুলিকে সীমাবদ্ধ করুন; বা\n    প্রযোজ্য আইনের অধীনে বাদ দেওয়া যাবে না এমন কোনো আমাদের বা আপনার দায় বাদ দিন।\n\n \n\nযতক্ষণ ওয়েবসাইট এবং ওয়েবসাইটের তথ্য ও পরিষেবাগুলি বিনামূল্যে প্রদান করা হয়, ততক্ষণ আমরা কোনও প্রকৃতির ক্ষতি বা ক্ষতির জন্য দায়ী থাকব না।', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tax_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(10,4) NOT NULL,
  `special_price` decimal(10,4) DEFAULT NULL,
  `special_price_type` varchar(255) DEFAULT NULL,
  `is_special` tinyint(4) DEFAULT NULL,
  `special_price_start` date DEFAULT NULL,
  `special_price_end` date DEFAULT NULL,
  `selling_price` decimal(10,4) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `manage_stock` tinyint(4) DEFAULT 0,
  `qty` int(11) DEFAULT NULL,
  `in_stock` tinyint(4) DEFAULT NULL,
  `viewed` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `new_from` datetime DEFAULT NULL,
  `new_to` datetime DEFAULT NULL,
  `avg_rating` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `tax_id`, `slug`, `price`, `special_price`, `special_price_type`, `is_special`, `special_price_start`, `special_price_end`, `selling_price`, `sku`, `manage_stock`, `qty`, `in_stock`, `viewed`, `is_active`, `new_from`, `new_to`, `avg_rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 22, NULL, 'bed', '500.0000', '400.0000', 'Fixed', 1, '2001-12-05', '2020-05-03', '400.0000', 'KUPLNI', 1, 20, 1, NULL, 0, '2015-05-03 00:00:00', '2021-03-20 00:00:00', NULL, '2021-03-18 09:42:21', '2021-09-23 03:12:59', NULL),
(2, NULL, 3, 'oppo-watch', '200.0000', '0.0000', 'Fixed', 0, '1970-01-01', '1970-01-01', '0.0000', 'Oppo123', 1, 49, 1, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '2021-03-18 10:32:52', '2022-01-27 04:33:38', NULL),
(3, NULL, NULL, 'probook-430-g8-notebook-pc', '9876.1300', '700.1300', NULL, 1, '1970-01-01', '1970-01-01', '700.1300', 'Probook123', 1, 7, 1, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '2021-03-18 10:45:56', '2021-10-22 10:40:43', NULL),
(4, 14, 1, 'richman-shirt', '500.0000', '0.0000', '', 0, '1970-01-01', '1970-01-01', '0.0000', '1245ghdd', 1, 50, 1, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '2021-03-20 01:11:04', '2022-01-31 00:07:31', NULL),
(5, NULL, NULL, 'samsung-a12', '1000.0000', '0.0000', NULL, 0, '1970-01-01', '1970-01-01', '0.0000', 'A112345678', 1, 2, 0, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '2021-03-27 09:47:53', '2021-11-09 02:27:00', NULL),
(6, 23, 3, 'samsung-galaxy-m02s', '12999.0000', '1299.0000', 'Fixed', 1, '1970-01-01', '1970-01-01', '1299.0000', 'Mkdldfkds', 0, 10, 1, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 1.86, '2021-09-21 05:22:42', '2022-02-01 10:13:58', NULL),
(7, 4, 1, 'xiaomi-redmi-ten', '1200.0000', '0.0000', '', 0, '1970-01-01', '1970-01-01', '0.0000', 'qwwfgh', 1, 0, 1, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '2021-09-21 05:40:30', '2022-01-31 04:04:25', NULL),
(8, 23, 3, 'vivo-y91', '1500.0000', '0.0000', NULL, 0, '1970-01-01', '1970-01-01', '0.0000', NULL, 0, 5, 1, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '2021-09-21 06:16:59', '2021-10-16 00:56:37', NULL),
(19, NULL, NULL, 'fsdsfsd', '12999.0000', '0.0000', NULL, 0, '1970-01-01', '1970-01-01', '0.0000', NULL, 0, 2, 1, NULL, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '2021-10-03 06:43:32', '2021-10-09 08:16:10', NULL),
(24, NULL, NULL, 'dsfdsfw', '12999.0000', '0.0000', NULL, 0, '1970-01-01', '1970-01-01', '0.0000', NULL, NULL, 2, 1, NULL, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '2021-10-03 10:19:34', '2021-10-03 10:19:34', NULL),
(25, NULL, NULL, 'irfan', '12999.0000', '0.0000', NULL, 0, '1970-01-01', '1970-01-01', '0.0000', NULL, NULL, 2, 1, NULL, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '2021-10-03 18:39:05', '2021-10-03 18:39:05', NULL),
(28, NULL, NULL, 'dell-inspiron-3493---specs', '1000.0000', '0.0000', NULL, 0, '1970-01-01', '1970-01-01', '0.0000', 'Dell-100', 1, 10, 1, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '2021-10-22 09:52:59', '2021-11-01 01:43:47', NULL),
(29, NULL, NULL, 'shofa', '500.0000', '0.0000', NULL, 0, '1970-01-01', '1970-01-01', '0.0000', 'S-123', 1, 10, 1, NULL, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', NULL, '2021-10-22 21:49:48', '2021-10-22 21:49:48', NULL),
(30, NULL, NULL, 'dining-table-4-seat', '2000.0000', '1500.0000', NULL, 1, '1970-01-01', '1970-01-01', '1500.0000', 'table1234', 1, 17, 1, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, '2021-11-01 04:01:32', '2021-11-01 04:02:35', NULL),
(31, NULL, 1, 'richman-ultra-slim-fit-denim-shirt-for-men', '459.0000', '0.0000', '', 0, '1970-01-01', '1970-01-01', '0.0000', '2rewrew4', 1, 33, 1, NULL, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, '2021-11-01 07:15:03', '2021-11-23 22:31:26', NULL),
(32, NULL, NULL, 'richman---exclusive-winter-collection', '23.0000', '0.0000', NULL, 0, '1970-01-01', '1970-01-01', '0.0000', '34', 1, 3, 1, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, '2021-11-01 07:22:15', '2021-11-01 07:22:15', NULL),
(33, NULL, 1, 'watch-castle', '300.0000', '0.0000', '', 0, '1970-01-01', '1970-01-01', '0.0000', 'watch987', 1, 21, 1, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, '2021-11-02 07:30:00', '2021-11-27 19:06:33', NULL),
(34, 23, 1, 'current-luxery', '30.0000', '0.0000', '', 0, '1970-01-01', '1970-01-01', '0.0000', '77rtg', 1, 90, 1, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, '2021-11-02 07:39:27', '2022-01-18 22:39:30', NULL),
(37, NULL, 1, 'test-product', '500.0000', '0.0000', '', NULL, '1970-01-01', '1970-01-01', '0.0000', 'hgs65', 0, NULL, 0, NULL, 1, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, '2022-01-02 00:26:52', '2022-01-02 03:58:53', '2022-01-02 03:58:53'),
(52, 4, 1, 'test-95', '544.0000', '0.0000', '', NULL, '1970-01-01', '1970-01-01', '0.0000', '54', 0, NULL, 0, NULL, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 0, '2022-01-31 00:01:03', '2022-01-31 00:01:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_value`
--

CREATE TABLE `product_attribute_value` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_value_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(31, 2, 2),
(31, 2, 3),
(31, 2, 4),
(31, 3, 25),
(31, 3, 26),
(31, 3, 27),
(4, 2, 2),
(4, 2, 3),
(4, 2, 4),
(4, 3, 25),
(4, 3, 26),
(6, 3, 25);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, '/images/products/2HKGD5LOsx.webp', 'base', NULL, '2021-09-23 03:11:53'),
(2, 3, '/images/products/yJAK1MqJUj.webp', 'base', NULL, '2021-10-22 00:06:15'),
(51, 4, '/images/products/qqPD97Ra8q.webp', 'base', '2021-03-20 02:12:27', '2021-09-23 03:22:55'),
(52, 6, '/images/products/a0VVxPrimK.webp', 'base', '2021-09-21 05:24:34', '2021-10-15 23:46:41'),
(53, 7, '/images/products/6CiDPEZEeK.webp', 'base', '2021-09-21 05:41:19', '2021-11-04 05:56:26'),
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
(72, 29, '/images/products/8p18rx5inT.webp', 'base', NULL, NULL),
(73, 30, '/images/products/J0n57usCkM.webp', 'base', '2021-11-01 04:02:37', '2021-11-01 04:02:37'),
(74, 31, '/images/products/ULrLrVUwGY.webp', 'base', '2021-11-01 07:17:58', '2021-11-01 07:17:58'),
(75, 31, '/images/products/vlSmahy9Uk.webp', 'additional', '2021-11-01 07:19:30', '2021-11-01 07:19:30'),
(76, 31, '/images/products/AXfxopvAkk.webp', 'additional', '2021-11-01 07:19:30', '2021-11-01 07:19:30'),
(77, 32, '/images/products/MCGjFxv7Uo.webp', 'base', NULL, NULL),
(78, 32, '/images/products/oG6uAlrOd6.webp', 'additional', NULL, NULL),
(79, 32, '/images/products/BjEtCVcVHJ.webp', 'additional', NULL, NULL),
(80, 32, '/images/products/d0UogA0Byn.webp', 'additional', NULL, NULL),
(81, 33, '/images/products/X0s9grKAkQ.webp', 'base', NULL, NULL),
(82, 33, '/images/products/2ERIEaM0c6.webp', 'additional', NULL, NULL),
(83, 33, '/images/products/JF8BAOh5J3.webp', 'additional', NULL, NULL),
(84, 33, '/images/products/Yr2JpZZkQU.webp', 'additional', NULL, NULL),
(85, 34, '/images/products/BbuZbWcvXu.webp', 'base', NULL, '2021-12-24 23:57:18'),
(86, 34, '/images/products/NmuFqNYKXz.webp', 'additional', NULL, NULL),
(87, 34, '/images/products/AP3v1Xe3Mu.webp', 'additional', NULL, NULL),
(88, 34, '/images/products/ZF6rUxeZIN.webp', 'additional', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`) VALUES
(1, 2),
(6, 1),
(8, 1),
(34, 1),
(4, 1),
(41, 1),
(46, 1),
(51, 1),
(7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `local` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `short_description` longtext DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Bed', '<h1 id=\"title\" class=\"a-size-large a-spacing-none a-color-secondary\" style=\"text-align: center;\"><span id=\"productTitle\" class=\"a-size-large\">irfan&nbsp;Men\'s Luxury Analog Quartz Gold Wrist Watches</span></h1>\r\n<p>&nbsp;</p>\r\n<div id=\"dp_productDescription_container_div\" class=\"celwidget\" data-feature-name=\"productDescription\" data-cel-widget=\"dp_productDescription_container_div\">\r\n<div id=\"productDescription_feature_div\" class=\"a-row feature\" data-feature-name=\"productDescription\" data-template-name=\"productDescription\" data-cel-widget=\"productDescription_feature_div\">\r\n<div id=\"productDescription\" class=\"a-section a-spacing-small\">\r\n<h4>Product Description:</h4>\r\n<h4>Highlights:</h4>\r\n<p>Original Japanese Movement: provide precise and accurate time keeping<br />Stainless Steel Strap and Stainless Steel Case Cover<br />German High Hardness Mineral Glass, not easy to wear<br />30M Water Resistant - 3ATM: Daily Use Waterproof, Handwash<br />Calendar Date Window<br />Classic Business Casual Dress Watch Design. Combines quality, leading edge fashion, and value.<br /><br />Features:</p>\r\n<p><br />Stainless Steel case and Stainless Steel case back<br />German High Hardness Mineral Glass<br />Calendar Date Window<br />30M Waterproof<br />Stainless Steel Strap<br /><br />Specification:</p>\r\n<p><br />Dial Color: Black<br />Dial Case Diameter: 1.57 inch / 4.0 cm<br />Dial Case Thickness: 0.43 inch / 1.1 cm<br />Band Color: Gold<br />Band Width: 0.79 inch / 2 cm<br />Band Length: 8.7 inch / 22 cm.<br />Band Clasp Type: Fold Over Clasp<br />Watch Weight: 3.39 oz / 96 g<br /><br />**NOTE**:<br />If mist or droplets found inside watch surface, please contact manufacturer immediately.<br />Clean the strap by a soft cloth on regular bases is highly recommended.<br />Too much water contact will shorter watch life.<br /><br />What Is In The Package:<br />Watch x 1</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"detailBullets\" class=\"celwidget\" data-feature-name=\"detailBullets\" data-cel-widget=\"detailBullets\">\r\n<div id=\"detailBulletsWrapper_feature_div\" class=\"a-section a-spacing-none feature\" data-feature-name=\"detailBullets\" data-template-name=\"detailBullets\" data-cel-widget=\"detailBulletsWrapper_feature_div\">\r\n<div id=\"detailBullets_feature_div\">\r\n<ul class=\"a-unordered-list a-nostyle a-vertical a-spacing-none\">\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Department:&nbsp;</span>Mens</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Manufacturer:&nbsp;</span>Fanmis</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Package Dimensions:&nbsp;</span>3.2 x 2.8 x 2.4 inches</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">ASIN:&nbsp;</span>B06XHJY5XZ</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">UNSPSC Code:&nbsp;</span>54110000</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Item model number:&nbsp;</span>4331787063</span></li>\r\n<li><span class=\"a-list-item\"><span class=\"a-text-bold\">Batteries:&nbsp;</span>1 LR44 batteries required.</span></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>', 'PRECISE TIME irfan  KEEPING: Japanese Movement, provide precise and accurate time keeping. Japanese battery which can provide the watch strong power.', NULL, NULL, '2021-03-18 09:42:21', '2021-03-18 09:42:21'),
(2, 2, 'en', 'Oppo Watch', '&lt;p&gt;&amp;lt;h1 id=&quot;title&quot; class=&quot;a-size-large a-spacing-none&quot; style=&quot;text-align: center;&quot;&amp;gt;&amp;lt;span id=&quot;productTitle&quot; class=&quot;a-size-large&quot;&amp;gt;Meolin Charm Creative Twisted Crystal Pendant&amp;amp;nbsp;&amp;lt;/span&amp;gt;&amp;lt;/h1&amp;gt; &amp;lt;p&amp;gt;&amp;amp;nbsp;&amp;lt;/p&amp;gt; &amp;lt;p&amp;gt;&amp;lt;span class=&quot;a-size-large&quot;&amp;gt;&amp;lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;../../../storage/media/w5SaCifIArdhnr8w6ZiEakZOArQ3oIjLIIWMnGip.jpeg&quot; alt=&quot;&quot; width=&quot;523&quot; height=&quot;522&quot; /&amp;gt;&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt; &amp;lt;p&amp;gt;&amp;amp;nbsp;&amp;lt;/p&amp;gt; &amp;lt;h4&amp;gt;&amp;lt;span class=&quot;a-size-large&quot;&amp;gt;Details:&amp;lt;br /&amp;gt;&amp;lt;/span&amp;gt;&amp;lt;/h4&amp;gt; &amp;lt;ul class=&quot;a-unordered-list a-vertical a-spacing-none&quot;&amp;gt; &amp;lt;li&amp;gt;&amp;lt;span class=&quot;a-list-item&quot;&amp;gt;Material: high-quality alloy, not easy to fade, not easy allergy, noble elegance, shining charming.&amp;lt;/span&amp;gt;&amp;lt;/li&amp;gt; &amp;lt;li&amp;gt;&amp;lt;span class=&quot;a-list-item&quot;&amp;gt;Fits most people,you can adjust the length to a perfect fit with the extension chain.&amp;lt;/span&amp;gt;&amp;lt;/li&amp;gt; &amp;lt;li&amp;gt;&amp;lt;span class=&quot;a-list-item&quot;&amp;gt;Unique design achievements unique to you, no matter what occasion,it will makes you attracting the attention of others.&amp;lt;/span&amp;gt;&amp;lt;/li&amp;gt; &amp;lt;li&amp;gt;&amp;lt;span class=&quot;a-list-item&quot;&amp;gt;A Magnificent Gift for Your Mom, Sister, Friend, Teacher, Co-worker, Wife or Girlfriend for Christmas, Birthday, Anniversary, Graduation or Mother\'s Day.&amp;lt;/span&amp;gt;&amp;lt;/li&amp;gt; &amp;lt;li&amp;gt;&amp;lt;span class=&quot;a-list-item&quot;&amp;gt;Note:Avoid contact with water,To keep item bright, clean item regularly and frequently with a soft cloth.&amp;lt;/span&amp;gt;&amp;lt;/li&amp;gt; &amp;lt;/ul&amp;gt; &amp;lt;h4 class=&quot;default&quot;&amp;gt;&amp;amp;nbsp;&amp;lt;/h4&amp;gt; &amp;lt;h4 class=&quot;default&quot;&amp;gt;Product description:&amp;lt;/h4&amp;gt; &amp;lt;div id=&quot;productDescription&quot; class=&quot;a-section a-spacing-small&quot;&amp;gt; &amp;lt;p&amp;gt;Product Material: Silver&amp;lt;/p&amp;gt; &amp;lt;p&amp;gt;Product size: Chain length: 44cm; Pendant length and width: 2.4*1cm&amp;lt;/p&amp;gt; &amp;lt;p&amp;gt;Package: 1 pcs&amp;lt;/p&amp;gt; &amp;lt;p&amp;gt;Features: Great jewelry gifts Suitable for her, lover, wife, couple, Birthday, Valentine&amp;amp;rsquo;s Day, Christmas&amp;amp;rsquo; Day, Mother&amp;amp;rsquo;s Day, wedding, party, anniversary, prom and casual days.&amp;lt;/p&amp;gt; &amp;lt;/div&amp;gt;&lt;/p&gt;', '', NULL, NULL, '2021-03-18 10:32:52', '2021-03-18 10:32:52'),
(3, 3, 'en', 'PROBOOK 430 G8 NOTEBOOK PC', '<p>HP PROBOOK 430 G8 NOTEBOOK PCHP PROBOOK 430 G8 NOTEBOOK PCHP PROBOOK 430 G8 NOTEBOOK PC</p>', 'This is a Awesome Laptop', NULL, NULL, '2021-03-18 10:45:56', '2021-03-18 10:45:56'),
(6, 4, 'en', 'Richman Shirt', '&lt;p&gt;&amp;lt;p&amp;gt;PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC&amp;lt;/p&amp;gt;&lt;/p&gt;', '', '', '', '2021-03-20 01:11:04', '2021-03-20 01:11:04'),
(7, 4, 'bn', 'রিচম্যান শার্ট', '<p>6548PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC</p>', NULL, NULL, NULL, NULL, NULL),
(8, 4, 'hi', 'वैश्य', '<p>6548PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC6548PROBOOK 430 G8 NOTEBOOK PC</p>', NULL, NULL, NULL, NULL, NULL),
(9, 5, 'fr', 'test 2', '<p>gggfdgg</p>', NULL, NULL, NULL, '2021-03-27 09:47:53', '2021-03-27 09:47:53'),
(10, 6, 'en', 'Samsung Galaxy M02s', '&lt;h4&gt;Details&lt;/h4&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reiciendis, ex necessitatibus eum esse odit maxime cupiditate dignissimos velit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reiciendis, ex necessitatibus eum esse odit maxime cupiditate dignissimos velit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reiciendis, ex necessitatibus eum esse odit maxime cupiditate dignissimos velit.&lt;/p&gt;\r\n&lt;p&gt;dignissimos velit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias reiciendis, ex necessitatibus eum esse odit maxime cupiditate dignissimos velit.&lt;/p&gt;\r\n&lt;h4 class=&quot;mar-top-30&quot;&gt;Features&lt;/h4&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;57% polyester, 43% PCM-infused polyester&lt;/li&gt;\r\n&lt;li&gt;Hyperbreathable Stretch Knit&lt;/li&gt;\r\n&lt;li&gt;Phase Change Materials&lt;/li&gt;\r\n&lt;li&gt;3D collar design with sewn-in collar stays to prevent collar spread and splay&lt;/li&gt;\r\n&lt;li&gt;Moisture Wicking&lt;/li&gt;\r\n&lt;li&gt;Wrinkle Resistant&lt;/li&gt;\r\n&lt;li&gt;Machine wash, tumble dry&lt;/li&gt;\r\n&lt;/ul&gt;', 'The Best Phone Ever Can Buy On Samsung Superb Battery Life Amazing Battery Decent Performance Camera,Gaming Not Recommended Best For Online Classes', NULL, NULL, '2021-09-21 05:22:42', '2021-09-21 05:22:42'),
(11, 7, 'en', 'Xiaomi Redmi Ten', '&lt;p&gt;Good Phone&lt;/p&gt;', '', NULL, NULL, '2021-09-21 05:40:30', '2021-09-21 05:40:30'),
(12, 8, 'en', 'Vivo Y91', '<p>Good Phone</p>', NULL, NULL, NULL, '2021-09-21 06:16:59', '2021-09-21 06:16:59'),
(13, 6, 'bn', 'স্যামসাং গ্যালাক্সি-এম জিরো ২ এস', '<p>The Best Phone Ever Can Buy On Samsung Superb Battery Life Amazing Battery Decent Performance Camera,Gaming Not Recommended Best For Online Classes</p>', NULL, NULL, NULL, NULL, NULL),
(14, 9, 'en', 'dfdfffs', '<p>fdfdffd</p>', NULL, NULL, NULL, '2021-10-03 03:56:06', '2021-10-03 03:56:06'),
(15, 10, 'en', 'gg ggfdg', '<p>gdfggdg</p>', NULL, NULL, NULL, '2021-10-03 04:01:38', '2021-10-03 04:01:38'),
(16, 11, 'en', 'gdgdgd', '<p>gfdggd</p>', NULL, NULL, NULL, '2021-10-03 04:04:50', '2021-10-03 04:04:50'),
(17, 12, 'en', 'ggdgfd', '<p>fdgdfgf</p>', NULL, NULL, NULL, '2021-10-03 04:11:32', '2021-10-03 04:11:32'),
(18, 13, 'en', 'fdggg', '<p>dfgdgd</p>', NULL, NULL, NULL, '2021-10-03 04:14:23', '2021-10-03 04:14:23'),
(19, 14, 'en', 'jljjhh', '<p>nhkjkhkhkh</p>', NULL, NULL, NULL, '2021-10-03 04:18:34', '2021-10-03 04:18:34'),
(20, 15, 'en', 'fsdff', '<p>fsfsf</p>', NULL, NULL, NULL, '2021-10-03 04:24:56', '2021-10-03 04:24:56'),
(21, 16, 'en', 'fsdff', '<p>fsfsf</p>', NULL, NULL, NULL, '2021-10-03 04:25:18', '2021-10-03 04:25:18'),
(22, 17, 'en', 'dggd', '<p>dfgdgdf</p>', NULL, NULL, NULL, '2021-10-03 04:25:41', '2021-10-03 04:25:41'),
(23, 18, 'en', 'ttrer', '<p>terterter</p>', NULL, NULL, NULL, '2021-10-03 04:42:42', '2021-10-03 04:42:42'),
(24, 19, 'en', 'fsdsfsd', '<p>sdffsdf</p>', NULL, NULL, NULL, '2021-10-03 06:43:32', '2021-10-03 06:43:32'),
(25, 23, 'en', 'ttteretdfsdf', '<p>sffsdfsf</p>', NULL, NULL, NULL, '2021-10-03 10:18:21', '2021-10-03 10:18:21'),
(26, 24, 'en', 'dsfdsfw', '<p>dsdfsdfew</p>', NULL, NULL, NULL, '2021-10-03 10:19:34', '2021-10-03 10:19:34'),
(27, 25, 'en', 'Irfan', '<p>sdfsfssf</p>', NULL, NULL, NULL, '2021-10-03 18:39:05', '2021-10-03 18:39:05'),
(28, 5, 'en', 'Samsung A12', '<p>test</p>', NULL, NULL, NULL, NULL, NULL),
(31, 28, 'en', 'Dell Inspiron 3493 - Specs', '<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>Display</strong></div>\r\n<div class=\"col-md-8\">14.0&rdquo;, HD (1366 x 768), TN</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>HDD/SSD</strong></div>\r\n<div class=\"col-md-8\">1TB SSD + 1TB HDD</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>RAM</strong></div>\r\n<div class=\"col-md-8\">16GB DDR4, 2666 MHz</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>OS</strong></div>\r\n<div class=\"col-md-8\">Windows 10 Pro</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>Battery</strong></div>\r\n<div class=\"col-md-8\">42Wh, 3-cell</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>Dimensions</strong></div>\r\n<div class=\"col-md-8\">339 x 214.9 x 21 mm (13.35\" x 8.46\" x 0.83\")</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-table lp-row-table-inline\">\r\n<div class=\"row\">\r\n<div class=\"col-md-2\"><strong>Weight</strong></div>\r\n<div class=\"col-md-8\">1.79 kg (3.9 lbs)</div>\r\n</div>\r\n</div>\r\n<div class=\"lp-row-double-table\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<div class=\"lp-row-table-title\"><strong>Ports and connectivity</strong></div>\r\n<ul class=\"lp-ports-conect lp-icon-ul\">\r\n<li class=\"icon-usb-a\"><strong>1x USB Type-A</strong> <em>2.0</em></li>\r\n<li class=\"icon-usb-a\"><strong>2x USB Type-A</strong> <em>3.2 Gen 1 (5 Gbps)</em></li>\r\n<li class=\"icon-hdmi\"><strong>HDMI</strong> <em>1.4b</em></li>\r\n<li class=\"icon-card-reader\"><strong>Card Reader</strong> <em>SD, SDHC, SDXC</em></li>\r\n<li class=\"icon-lan\"><strong>Ethernet LAN</strong> <em>10, 100 Mbit/s</em></li>\r\n<li class=\"icon-wi-fi\"><strong>Wi-Fi</strong> <em>802.11ac</em></li>\r\n<li class=\"icon-bluetooth\"><strong>Bluetooth</strong> <em>5.0</em></li>\r\n<li class=\"icon-audio-jack\"><strong>Audio jack</strong> <em>3.5 mm combo</em></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, NULL, '2021-10-22 09:52:59', '2021-10-22 09:52:59'),
(32, 29, 'en', 'Shofa', '<p>Shofa is Goog</p>', NULL, NULL, NULL, '2021-10-22 21:49:48', '2021-10-22 21:49:48'),
(33, 30, 'en', 'Dining Table 4 Seat', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>', NULL, NULL, NULL, '2021-11-01 04:01:32', '2021-11-01 04:01:32'),
(34, 31, 'en', 'Richman Ultra Slim Fit Denim Shirt for Men', '&amp;lt;p&amp;gt;This is a nice shirt&amp;lt;/p&amp;gt;', '', NULL, NULL, '2021-11-01 07:15:03', '2021-11-01 07:15:03'),
(35, 32, 'en', 'RICHMAN - EXCLUSIVE WINTER COLLECTION', '<p>Nice Shirt</p>', NULL, NULL, NULL, '2021-11-01 07:22:15', '2021-11-01 07:22:15'),
(36, 33, 'en', 'Men Watch Quartz Casual', '&lt;p&gt;&amp;lt;p&amp;gt;&amp;amp;lt;p&amp;amp;gt;&amp;amp;amp;lt;p&amp;amp;amp;gt;&amp;amp;amp;amp;lt;p&amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;div&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;h2&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;What is Lorem Ipsum?&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/h2&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;strong&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;Lorem Ipsum&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/strong&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/div&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;div&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;h2&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;Why do we use it?&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/h2&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/div&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;nbsp;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;div&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;h2&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;Where does it come from?&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/h2&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/div&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;div&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;h2&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;Where can I get some?&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/h2&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt; &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/div&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;amp;gt;&amp;amp;amp;amp;lt;/p&amp;amp;amp;amp;gt;&amp;amp;amp;lt;/p&amp;amp;amp;gt;&amp;amp;lt;/p&amp;amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nWhy do we use it?\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Men Watch Quartz Casual', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into', '2021-11-02 07:30:00', '2021-11-02 07:30:00'),
(37, 33, 'bn', 'ওয়াচ কোর্টাস ক্যাসেল', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\nk</div>', 'এটি খুব ভাল ঘড়ি', NULL, NULL, NULL, NULL),
(38, 34, 'en', 'CURREN Luxury', '&lt;p&gt;&amp;lt;p&amp;gt;&amp;amp;lt;div&amp;amp;gt; &amp;amp;lt;h2&amp;amp;gt;What is Lorem Ipsum?&amp;amp;lt;/h2&amp;amp;gt; &amp;amp;lt;p&amp;amp;gt;&amp;amp;lt;strong&amp;amp;gt;Lorem Ipsum&amp;amp;lt;/strong&amp;amp;gt; is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&amp;amp;lt;/p&amp;amp;gt; &amp;amp;lt;/div&amp;amp;gt; &amp;amp;lt;div&amp;amp;gt; &amp;amp;lt;h2&amp;amp;gt;Why do we use it?&amp;amp;lt;/h2&amp;amp;gt; &amp;amp;lt;p&amp;amp;gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).&amp;amp;lt;/p&amp;amp;gt; &amp;amp;lt;/div&amp;amp;gt; &amp;amp;lt;p&amp;amp;gt;&amp;amp;amp;nbsp;&amp;amp;lt;/p&amp;amp;gt; &amp;amp;lt;div&amp;amp;gt; &amp;amp;lt;h2&amp;amp;gt;Where does it come from?&amp;amp;lt;/h2&amp;amp;gt; &amp;amp;lt;p&amp;amp;gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&amp;amp;lt;/p&amp;amp;gt; &amp;amp;lt;p&amp;amp;gt;The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.&amp;amp;lt;/p&amp;amp;gt; &amp;amp;lt;/div&amp;amp;gt; &amp;amp;lt;div&amp;amp;gt; &amp;amp;lt;h2&amp;amp;gt;Where can I get some?&amp;amp;lt;/h2&amp;amp;gt; &amp;amp;lt;p&amp;amp;gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.&amp;amp;lt;/p&amp;amp;gt; &amp;amp;lt;/div&amp;amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &amp;amp;quot;de Finibus Bonorum et Malorum&amp;amp;quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &amp;amp;quot;Lorem ipsum dolor sit amet..&amp;amp;quot;, comes from a line in section 1.10.32.', NULL, NULL, '2021-11-02 07:39:28', '2021-11-02 07:39:28'),
(39, 34, 'bn', 'কারেন লাক্সারী', '<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>', 'ভাল প্রোডাক্ট', NULL, NULL, NULL, NULL),
(40, 35, 'en', 'Test 2022', '&lt;p&gt;treddd&lt;/p&gt;', '', NULL, NULL, '2022-01-01 23:43:38', '2022-01-01 23:43:38'),
(41, 36, 'en', 'Test irfan', '&lt;p&gt;Test irfan&lt;/p&gt;', '', NULL, NULL, '2022-01-02 00:11:38', '2022-01-02 00:11:38'),
(42, 37, 'en', 'Test Product', '&lt;p&gt;&amp;lt;p&amp;gt;&amp;amp;lt;p&amp;amp;gt;Test&amp;amp;lt;/p&amp;amp;gt;&amp;lt;/p&amp;gt;&lt;/p&gt;', '', NULL, NULL, '2022-01-02 00:26:52', '2022-01-02 00:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `rating` varchar(255) NOT NULL,
  `status` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `comment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 26, 6, 'This is a Good Product', '2', 'approved', '2021-10-25 07:01:13', '2021-10-28 04:19:58'),
(2, 1, 6, 'Awesome product', '3', 'approved', '2021-10-25 07:08:01', '2021-10-28 04:20:06'),
(3, 1, 6, 'I Love this product', '1', 'approved', '2021-10-25 08:04:35', '2021-10-28 04:22:47'),
(4, 2, 6, 'Test', '2', 'approved', NULL, '2021-10-28 04:24:26'),
(5, 1, 6, 'test', '1', NULL, NULL, '2021-10-28 04:24:33'),
(6, 1, 6, 'test', '1', 'approved', NULL, '2021-10-28 04:24:19'),
(7, 2, 6, 'test', '2', 'approved', NULL, NULL),
(8, 27, 6, 'This is a Awesome Product', '2', 'approved', '2021-10-28 02:36:14', '2021-10-28 02:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(1, 6),
(2, 3),
(2, 6),
(3, 3),
(3, 6),
(4, 3),
(4, 6),
(5, 3),
(5, 6),
(6, 3),
(6, 6),
(7, 3),
(7, 6),
(8, 3),
(8, 6),
(9, 3),
(10, 3),
(10, 6),
(11, 3),
(12, 3),
(12, 6),
(13, 3),
(13, 6),
(14, 3),
(14, 6),
(15, 3),
(15, 6),
(16, 3),
(16, 6),
(17, 3),
(17, 6),
(18, 3),
(18, 6),
(19, 3),
(19, 6),
(20, 3),
(20, 6),
(21, 3),
(21, 6),
(22, 3),
(22, 6),
(23, 3),
(23, 6),
(24, 3),
(24, 6),
(25, 3),
(25, 6),
(26, 3),
(26, 6),
(27, 3),
(27, 6),
(28, 3),
(28, 6),
(29, 3),
(29, 6),
(30, 3),
(30, 6),
(31, 3),
(31, 6),
(32, 3),
(32, 6),
(33, 3),
(33, 6),
(34, 3),
(34, 6),
(35, 3),
(35, 6),
(36, 3),
(36, 6),
(37, 3),
(37, 6),
(38, 3),
(38, 6),
(39, 3),
(39, 6),
(40, 3),
(40, 6),
(41, 3),
(41, 6),
(42, 3),
(42, 6),
(43, 3),
(43, 6),
(44, 3),
(44, 6),
(45, 3),
(45, 6),
(46, 3),
(46, 6),
(47, 3),
(47, 6),
(48, 3),
(48, 6),
(49, 3),
(49, 6),
(50, 3),
(50, 6),
(51, 3),
(51, 6),
(52, 3),
(52, 6),
(53, 3),
(53, 6),
(54, 3),
(54, 6),
(55, 3),
(55, 6),
(56, 3),
(56, 6),
(57, 3),
(57, 6),
(58, 3),
(58, 6),
(59, 3),
(59, 6),
(60, 3),
(60, 6),
(61, 3),
(61, 6),
(62, 3),
(62, 6),
(63, 3),
(63, 6),
(64, 3),
(64, 6),
(65, 3),
(65, 6),
(66, 3),
(66, 6),
(67, 3),
(67, 6),
(68, 3),
(69, 3),
(75, 3),
(75, 6),
(76, 3),
(77, 3),
(77, 6),
(78, 3),
(78, 6),
(79, 3),
(80, 3),
(81, 3),
(82, 3),
(82, 6);

-- --------------------------------------------------------

--
-- Table structure for table `searchterms`
--

CREATE TABLE `searchterms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `search_name` varchar(255) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `is_translatable` tinyint(4) NOT NULL DEFAULT 0,
  `plain_value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `is_translatable`, `plain_value`, `created_at`, `updated_at`) VALUES
(1, 'storefront_welcome_text', 1, NULL, NULL, NULL),
(2, 'storefront_theme_color', 0, '#a842ca', NULL, '2022-01-26 03:31:58'),
(3, 'storefront_mail_theme_color', 0, '#000000', NULL, '2021-11-27 20:39:51'),
(4, 'storefront_slider', 0, NULL, NULL, NULL),
(5, 'storefront_terms_and_condition_page', 0, '7', NULL, '2022-01-26 03:31:58'),
(6, 'storefront_privacy_policy_page', 0, '', NULL, '2022-01-26 03:31:58'),
(7, 'storefront_address', 1, NULL, NULL, NULL),
(8, 'storefront_navbar_text', 1, NULL, NULL, NULL),
(9, 'storefront_primary_menu', 0, '5', NULL, '2022-01-20 02:57:47'),
(10, 'storefront_category_menu', 0, '', NULL, '2022-01-20 02:57:47'),
(11, 'storefront_footer_menu_title_one', 1, NULL, NULL, NULL),
(12, 'storefront_footer_menu_one', 0, '3', NULL, '2022-01-20 02:57:47'),
(13, 'storefront_footer_menu_title_two', 1, NULL, NULL, NULL),
(14, 'storefront_footer_menu_two', 0, '4', NULL, '2022-01-20 02:57:47'),
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
(35, 'storefront_footer_tag_id', 0, '[\"1\",\"2\",\"3\"]', NULL, '2022-01-27 04:08:15'),
(36, 'storefront_copyright_text', 1, NULL, NULL, NULL),
(37, 'storefront_payment_method_image', 0, NULL, NULL, NULL),
(38, 'storefront_newsletter_image', 0, NULL, NULL, NULL),
(39, 'storefront_product_page_image', 0, NULL, NULL, NULL),
(40, 'storefront_call_action_url', 0, NULL, NULL, NULL),
(41, 'storefront_open_new_window', 0, NULL, NULL, NULL),
(42, 'storefront_slider_banner_1_image', 0, NULL, NULL, NULL),
(43, 'storefront_slider_banner_1_call_to_action_url', 0, 'https://www.facebook.com/', NULL, '2022-02-05 01:00:15'),
(44, 'storefront_slider_banner_1_open_in_new_window', 0, '1', NULL, '2022-02-05 01:00:15'),
(45, 'storefront_slider_banner_2_image', 0, NULL, NULL, NULL),
(46, 'storefront_slider_banner_2_call_to_action_url', 0, 'http://localhost/cartpro/product/samsung-galaxy-m02s/20', NULL, '2022-02-05 01:00:15'),
(47, 'storefront_slider_banner_2_open_in_new_window', 0, '1', NULL, '2022-02-05 01:00:15'),
(48, 'storefront_one_column_banner_enabled', 0, '1', NULL, '2022-01-25 09:33:11'),
(49, 'storefront_one_column_banner_image', 0, NULL, NULL, NULL),
(50, 'storefront_one_column_banner_call_to_action_url', 0, 'https://www.facebook.com/', NULL, '2022-01-25 09:33:11'),
(51, 'storefront_one_column_banner_open_in_new_window', 0, '1', NULL, '2022-01-25 09:33:11'),
(52, 'storefront_two_column_banner_enabled', 0, '1', NULL, '2022-01-25 09:30:07'),
(53, 'storefront_two_column_banner_image_1', 0, NULL, NULL, NULL),
(54, 'storefront_two_column_banners_1_call_to_action_url', 0, 'https://www.facebook.com/', NULL, '2022-01-25 09:30:07'),
(55, 'storefront_two_column_banners_1_open_in_new_window', 0, '1', NULL, '2022-01-25 09:30:07'),
(56, 'storefront_two_column_banner_image_2', 0, NULL, NULL, NULL),
(57, 'storefront_two_column_banners_2_call_to_action_url', 0, '', NULL, '2022-01-25 09:30:07'),
(58, 'storefront_two_column_banners_2_open_in_new_window', 0, '0', NULL, '2022-01-25 09:30:07'),
(59, 'storefront_three_column_banners_enabled', 0, '1', NULL, '2022-01-25 09:26:44'),
(60, 'storefront_three_column_banners_image_1', 0, NULL, NULL, NULL),
(61, 'storefront_three_column_banners_1_call_to_action_url', 0, 'https://www.facebook.com/', NULL, '2022-01-25 09:26:44'),
(62, 'storefront_three_column_banners_1_open_in_new_window', 0, '1', NULL, '2022-01-25 09:26:44'),
(63, 'storefront_three_column_banners_image_2', 0, NULL, NULL, NULL),
(64, 'storefront_three_column_banners_2_call_to_action_url', 0, '', NULL, '2022-01-25 09:26:44'),
(65, 'storefront_three_column_banners_2_open_in_new_window', 0, '0', NULL, '2022-01-25 09:26:44'),
(66, 'storefront_three_column_banners_image_3', 0, NULL, NULL, NULL),
(67, 'storefront_three_column_banners_3_call_to_action_url', 0, '', NULL, '2022-01-25 09:26:44'),
(68, 'storefront_three_column_banners_3_open_in_new_window', 0, '0', NULL, '2022-01-25 09:26:44'),
(69, 'storefront_three_column_full_width_banners_enabled', 0, '1', NULL, '2022-01-20 07:01:45'),
(70, 'storefront_three_column_full_width_banners_background_image', 0, NULL, NULL, NULL),
(71, 'storefront_three_column_full_width_banners_image_1', 0, NULL, NULL, NULL),
(72, 'storefront_three_column_full_width_banners_1_call_to_action_url', 0, '', NULL, '2022-01-20 07:01:45'),
(73, 'storefront_three_column_full_width_banners_1_open_in_new_window', 0, '0', NULL, '2022-01-20 07:01:45'),
(74, 'storefront_three_column_full_width_banners_image_2', 0, NULL, NULL, NULL),
(75, 'storefront_three_column_full_width_banners_2_call_to_action_url', 0, '', NULL, '2022-01-20 07:01:45'),
(76, 'storefront_three_column_full_width_banners_2_open_in_new_window', 0, '0', NULL, '2022-01-20 07:01:45'),
(77, 'storefront_three_column_full_width_banners_image_3', 0, NULL, NULL, NULL),
(78, 'storefront_three_column_full_width_banners_3_call_to_action_url', 0, '', NULL, '2022-01-20 07:01:45'),
(79, 'storefront_three_column_full_width_banners_3_open_in_new_window', 0, '0', NULL, '2022-01-20 07:01:45'),
(80, 'storefront_top_brands_section_enabled', 0, '0', NULL, '2022-01-30 01:17:34'),
(81, 'storefront_top_brands', 0, '[\"4\",\"19\",\"20\",\"21\",\"23\"]', NULL, '2022-01-20 07:01:48'),
(82, 'storefront_product_tabs_1_section_enabled', 0, '1', NULL, '2022-02-05 01:00:05'),
(83, 'storefront_product_tabs_1_section_tab_1_title', 1, NULL, NULL, NULL),
(84, 'storefront_product_tabs_1_section_tab_1_product_type', 0, 'category_products', NULL, '2022-02-05 01:00:05'),
(85, 'storefront_product_tabs_1_section_tab_1_category_id', 0, '20', NULL, '2022-02-05 01:00:05'),
(86, 'storefront_product_tabs_1_section_tab_1_products', 0, NULL, NULL, NULL),
(87, 'storefront_product_tabs_1_section_tab_1_products_limit', 0, NULL, NULL, NULL),
(88, 'storefront_product_tabs_1_section_tab_2_title', 1, NULL, NULL, NULL),
(89, 'storefront_product_tabs_1_section_tab_2_product_type', 0, 'category_products', NULL, '2022-02-05 01:00:05'),
(90, 'storefront_product_tabs_1_section_tab_2_category_id', 0, '13', NULL, '2022-02-05 01:00:05'),
(91, 'storefront_product_tabs_1_section_tab_2_products', 0, NULL, NULL, NULL),
(92, 'storefront_product_tabs_1_section_tab_2_products_limit', 0, NULL, NULL, NULL),
(93, 'storefront_product_tabs_1_section_tab_3_title', 1, NULL, NULL, NULL),
(94, 'storefront_product_tabs_1_section_tab_3_product_type', 0, 'category_products', NULL, '2022-02-05 01:00:05'),
(95, 'storefront_product_tabs_1_section_tab_3_category_id', 0, '14', NULL, '2022-02-05 01:00:05'),
(96, 'storefront_product_tabs_1_section_tab_3_products', 0, NULL, NULL, NULL),
(97, 'storefront_product_tabs_1_section_tab_3_products_limit', 0, NULL, NULL, NULL),
(98, 'storefront_product_tabs_1_section_tab_4_title', 1, NULL, NULL, NULL),
(99, 'storefront_product_tabs_1_section_tab_4_product_type', 0, 'category_products', NULL, '2022-02-05 01:00:05'),
(100, 'storefront_product_tabs_1_section_tab_4_category_id', 0, '3', NULL, '2022-02-05 01:00:05'),
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
(129, 'storefront_slider_banner_3_call_to_action_url', 0, 'xyz.com', NULL, '2022-02-05 01:00:15'),
(130, 'storefront_slider_banner_3_open_in_new_window', 0, '0', NULL, '2022-02-05 01:00:15'),
(131, 'storefront_flash_sale_and_vertical_products_section_enabled', 0, '1', NULL, '2022-01-29 22:36:28'),
(132, 'storefront_flash_sale_title', 1, NULL, NULL, NULL),
(133, 'storefront_flash_sale_active_campaign_flash_id', 0, '1', NULL, '2022-01-29 22:36:28'),
(134, 'storefront_vertical_product_1_title', 1, NULL, NULL, NULL),
(135, 'storefront_vertical_product_1_type', 0, 'category_products', NULL, '2022-01-29 22:36:28'),
(136, 'storefront_vertical_product_1_category_id', 0, '27', NULL, '2022-01-29 22:36:28'),
(137, 'storefront_vertical_product_1_products', 0, NULL, NULL, NULL),
(138, 'storefront_vertical_product_1_products_limit', 0, NULL, NULL, NULL),
(139, 'storefront_vertical_product_2_title', 1, NULL, NULL, NULL),
(140, 'storefront_vertical_product_2_type', 0, 'category_products', NULL, '2022-01-29 22:36:28'),
(141, 'storefront_vertical_product_2_category_id', 0, '3', NULL, '2022-01-29 22:36:28'),
(142, 'storefront_vertical_product_2_products', 0, NULL, NULL, NULL),
(143, 'storefront_vertical_product_2_products_limit', 0, NULL, NULL, NULL),
(144, 'storefront_vertical_product_3_title', 1, NULL, NULL, NULL),
(145, 'storefront_vertical_product_3_type', 0, 'category_products', NULL, '2022-01-29 22:36:28'),
(146, 'storefront_vertical_product_3_category_id', 0, '20', NULL, '2022-01-29 22:36:28'),
(147, 'storefront_vertical_product_3_products', 0, NULL, NULL, NULL),
(148, 'storefront_vertical_product_3_products_limit', 0, NULL, NULL, NULL),
(149, 'store_front_slider_format', 0, 'half_width', NULL, '2022-01-26 03:31:58'),
(150, 'storefront_top_categories_section_enabled', 0, '1', NULL, '2022-01-30 04:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `setting_bank_transfers`
--

CREATE TABLE `setting_bank_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `instruction` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `label` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_cash_on_deliveries`
--

INSERT INTO `setting_cash_on_deliveries` (`id`, `status`, `label`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'test', '2021-07-25 10:59:16', '2022-02-01 01:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `setting_check_money_orders`
--

CREATE TABLE `setting_check_money_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `instruction` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `supported_currency` text DEFAULT NULL,
  `default_currency_code` varchar(191) DEFAULT NULL,
  `default_currency` varchar(255) NOT NULL,
  `currency_format` varchar(255) NOT NULL,
  `exchange_rate_service` varchar(255) DEFAULT NULL,
  `fixer_access_key` varchar(255) DEFAULT NULL,
  `forge_api_key` varchar(255) DEFAULT NULL,
  `currency_data_feed_key` varchar(255) DEFAULT NULL,
  `auto_refresh` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_currencies`
--

INSERT INTO `setting_currencies` (`id`, `supported_currency`, `default_currency_code`, `default_currency`, `currency_format`, `exchange_rate_service`, `fixer_access_key`, `forge_api_key`, `currency_data_feed_key`, `auto_refresh`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh Taka,Indian Rupee,United States Dollar', 'USD', '$', 'prefix', NULL, NULL, NULL, NULL, NULL, '2021-07-24 01:20:00', '2022-01-13 02:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `setting_custom_css_jsses`
--

CREATE TABLE `setting_custom_css_jsses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header` longtext NOT NULL,
  `footer` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `app_id` varchar(255) DEFAULT NULL,
  `app_secret` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_facebooks`
--

INSERT INTO `setting_facebooks` (`id`, `status`, `app_id`, `app_secret`, `created_at`, `updated_at`) VALUES
(1, 1, '428733002272968', '1ea880658a9188933aa8cbfae44a4207', '2021-07-25 01:22:27', '2022-01-10 09:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `setting_flat_rates`
--

CREATE TABLE `setting_flat_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flat_status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `cost` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `label` varchar(255) DEFAULT NULL,
  `minimum_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `supported_countries` text NOT NULL,
  `default_country` varchar(255) NOT NULL,
  `default_timezone` varchar(255) NOT NULL,
  `customer_role` varchar(255) NOT NULL,
  `number_format_type` int(11) DEFAULT NULL,
  `reviews_and_ratings` tinyint(4) DEFAULT NULL,
  `auto_approve_reviews` tinyint(4) DEFAULT NULL,
  `cookie_bar` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_generals`
--

INSERT INTO `setting_generals` (`id`, `supported_countries`, `default_country`, `default_timezone`, `customer_role`, `number_format_type`, `reviews_and_ratings`, `auto_approve_reviews`, `cookie_bar`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh,India', 'United States', 'Africa/Abidjan', 'admin', 2, 1, NULL, NULL, '2021-08-27 23:16:40', '2022-01-12 23:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `setting_googles`
--

CREATE TABLE `setting_googles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `client_secret` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_googles`
--

INSERT INTO `setting_googles` (`id`, `status`, `client_id`, `client_secret`, `created_at`, `updated_at`) VALUES
(1, 1, '249880665111-t8sr2ncq3lgm0rglk0hdgglj4vlpu2kd.apps.googleusercontent.com', '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', '2021-07-25 02:09:31', '2022-01-10 09:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `setting_local_pickups`
--

CREATE TABLE `setting_local_pickups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pickup_status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `cost` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `mail_address` varchar(255) DEFAULT NULL,
  `mail_name` varchar(255) DEFAULT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(255) DEFAULT NULL,
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_encryption` varchar(255) DEFAULT NULL,
  `welcome_email` tinyint(4) DEFAULT NULL,
  `new_order_to_admin` tinyint(4) DEFAULT NULL,
  `invoice_mail` tinyint(4) DEFAULT NULL,
  `mail_order_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting_newsletters`
--

CREATE TABLE `setting_newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `newsletter` tinyint(4) DEFAULT NULL,
  `mailchimp_api_key` varchar(255) DEFAULT NULL,
  `mailchimp_list_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `label` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `sandbox` tinyint(4) DEFAULT NULL,
  `client_id` varchar(255) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_paypals`
--

INSERT INTO `setting_paypals` (`id`, `status`, `label`, `description`, `sandbox`, `client_id`, `secret`, `created_at`, `updated_at`) VALUES
(1, 1, 'Paypal', 'Test', 1, 'AU9xEUcAhAZ9uK_UNVseT4RAiOVABw38vUjPYDth_M9IGCQp4Ez_WJ8s1HtztNdx3Nt58NuaFKcWX98b', 'EEjSv_jGB0xYCRs3-8L9aEsAp56LeQOOSNNTaXR1LirZxq6Nmgn70tL5jInojNIoCp_JbW_jjoOMT1qG', '2021-07-25 08:57:49', '2022-02-01 01:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `setting_paytms`
--

CREATE TABLE `setting_paytms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `sandbox` tinyint(4) DEFAULT NULL,
  `merchant_id` varchar(255) NOT NULL,
  `merchant_key` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `sms_from` varchar(255) NOT NULL,
  `sms_service` varchar(255) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `api_secret` varchar(255) DEFAULT NULL,
  `account_sid` varchar(255) DEFAULT NULL,
  `auth_token` varchar(255) DEFAULT NULL,
  `welcome_sms` tinyint(4) DEFAULT NULL,
  `new_order_sms_to_admin` tinyint(4) DEFAULT NULL,
  `new_order_sms_to_customer` tinyint(4) DEFAULT NULL,
  `sms_order_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `store_name` varchar(255) NOT NULL,
  `store_tagline` varchar(255) DEFAULT NULL,
  `store_email` varchar(255) NOT NULL,
  `store_phone` varchar(255) NOT NULL,
  `store_address_1` varchar(255) DEFAULT NULL,
  `store_address_2` varchar(255) DEFAULT NULL,
  `store_city` varchar(255) DEFAULT NULL,
  `store_country` varchar(255) DEFAULT NULL,
  `store_state` varchar(255) DEFAULT NULL,
  `store_zip` varchar(255) DEFAULT NULL,
  `admin_logo` varchar(255) DEFAULT NULL,
  `hide_store_phone` tinyint(4) DEFAULT NULL,
  `hide_store_email` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_stores`
--

INSERT INTO `setting_stores` (`id`, `store_name`, `store_tagline`, `store_email`, `store_phone`, `store_address_1`, `store_address_2`, `store_city`, `store_country`, `store_state`, `store_zip`, `admin_logo`, `hide_store_phone`, `hide_store_email`, `created_at`, `updated_at`) VALUES
(2, 'CartPro', 'Aliqua Nihil ration', 'admin@gmail.com', '(+800) 1234 5678 90', '949 Cowley Parkway', 'Veniam harum saepe', 'Sint fuga Irure sun', 'Grenada', NULL, '654', 'images/general/x8ccI5DCHz.webp', 1, 1, '2021-07-22 01:08:16', '2022-02-01 10:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `setting_strips`
--

CREATE TABLE `setting_strips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `publishable_key` varchar(255) NOT NULL,
  `secret_key` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_strips`
--

INSERT INTO `setting_strips` (`id`, `status`, `label`, `description`, `publishable_key`, `secret_key`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'test', 'pk_test_51JlEJWSBbimX2c4JNID3BAgh3lyg2W1PGCEfRI12E92hm681WW7IEyfVqr8xz2rzhBcjl1Ucetxd5uVrkQyoG3ja00IJVnKYbV', 'sk_test_51JlEJWSBbimX2c4JIlBaNrTsNcmF5YYbxrfvtknCiDnmmWrzSiCMfQKrSZQsHMs4IhySSZFJ4y4u36KFx1G3NCio00lSHUqusV', '2021-07-25 09:28:36', '2022-02-01 01:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(30, 1, 'en', 'Welcome to CartPro', '2021-09-04 23:50:08', '2021-09-21 02:34:08'),
(31, 7, 'en', 'Dewanhat, Chittagong', '2021-09-04 23:50:09', '2021-10-09 01:18:33'),
(32, 125, 'en', 'CC Camera', '2021-09-05 23:04:39', '2021-10-31 21:28:27'),
(33, 126, 'en', 'Samsung A21', '2021-09-06 03:03:01', '2021-10-31 21:28:27'),
(34, 128, 'en', 'Apple Watch', '2021-09-06 03:39:58', '2021-10-31 21:28:27'),
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
(50, 83, 'bn', 'ফিচারড ক্যাটাগরি', '2021-09-21 03:59:12', '2021-11-01 07:02:55'),
(51, 88, 'bn', 'ফার্ণিচার', '2021-09-21 03:59:12', '2021-11-01 07:02:55'),
(52, 93, 'bn', NULL, '2021-09-21 03:59:12', '2021-09-21 03:59:12'),
(53, 98, 'bn', 'শার্ট', '2021-09-21 03:59:12', '2021-11-01 07:02:56'),
(54, 83, 'en', 'Featured', '2021-09-21 04:50:53', '2021-09-21 04:50:53'),
(55, 88, 'en', 'Furniture', '2021-09-21 04:50:53', '2021-09-23 03:15:30'),
(56, 93, 'en', '', '2021-09-21 04:50:54', '2022-02-01 09:29:10'),
(57, 98, 'en', 'Shirt', '2021-09-21 04:50:54', '2021-09-23 03:21:42'),
(58, 132, 'en', 'Best Deals', '2021-10-21 02:09:37', '2021-10-21 02:10:11'),
(59, 134, 'en', 'Watches', '2021-10-21 03:46:08', '2021-10-21 03:51:36'),
(60, 139, 'en', 'Shirts', '2021-10-21 03:46:08', '2021-10-22 22:09:58'),
(61, 144, 'en', 'Mobile', '2021-10-21 04:19:23', '2021-10-22 22:17:57'),
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
(76, 36, 'en', 'Copyright &amp;amp;amp;copy; &amp;amp;lt;b&amp;amp;gt;CartPro&amp;amp;lt;/b&amp;amp;gt; 2021. All rights reserved', '2021-11-18 04:05:38', '2022-01-27 04:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_first_name` varchar(255) NOT NULL,
  `shipping_last_name` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `shipping_country` varchar(255) NOT NULL,
  `shipping_address_1` varchar(255) NOT NULL,
  `shipping_address_2` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(255) NOT NULL,
  `shipping_state` varchar(255) NOT NULL,
  `shipping_zip_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_phone`, `shipping_country`, `shipping_address_1`, `shipping_address_2`, `shipping_city`, `shipping_state`, `shipping_zip_code`, `created_at`, `updated_at`) VALUES
(1, 5, 'Promi', 'Chowdhury', 'promi00@gmail.com', '01521222515', 'Afghanistan', 'Hathazary', NULL, 'Chittagong', 'Chittagong', '4226', '2021-10-13 04:54:01', '2021-10-13 04:54:01'),
(2, 33, 'Tarek', 'Hasan', 'mainul@gmail.com', '01521448', 'Canada', 'Dewanhat', NULL, 'Chittagong', 'Chittagong', '4330', '2021-10-20 12:56:00', '2021-10-20 12:56:00'),
(3, 109, 'Hayfa', 'Maddox', 'zopam@mailinator.com', '+1 (255) 537-1144', 'Benin', '743 First Drive', 'Amet est ut labori', 'Culpa voluptatem se', 'Enim molestiae beata', '50712', '2022-01-16 09:39:13', '2022-01-16 09:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` text DEFAULT NULL,
  `slider_image` varchar(255) DEFAULT NULL,
  `slider_image_secondary` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `text_alignment` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_slug`, `type`, `category_id`, `url`, `slider_image`, `slider_image_secondary`, `target`, `is_active`, `text_alignment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'redmi-ear-buds', 'category', 13, 'http://localhost/cartpro/product/samsung-galaxy-m02s/20', 'images/sliders/MyjoTMAzjH.png', 'images/sliders/secondary/7eaI8npksb.png', 'same_tab', '1', '', '2021-08-05 09:13:49', '2022-01-26 00:56:46', NULL),
(9, 'apple-watch', 'category', 2, '', 'images/sliders/5V1sWzwT9j.png', 'images/sliders/secondary/AzCokJ97ln.png', 'new_tab', '1', 'right', '2021-08-05 09:35:24', '2022-01-18 02:33:46', NULL),
(10, 'samsung-m02s', 'url', 20, 'http://localhost/cartpro/product/samsung-galaxy-m02s/20', 'images/sliders/qEx26iBrEy.jpg', 'images/sliders/secondary/NWADpSUN4m.jpg', 'new_tab', '1', 'right', '2021-10-27 02:01:10', '2022-01-26 00:29:22', NULL),
(15, 'year-phone', 'category', 2, '', 'images/sliders/D1eGqiE4t0.png', 'images/sliders/secondary/N478Hzbp2H.png', '', '1', '', '2022-01-18 23:04:52', '2022-02-03 04:18:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider_translations`
--

CREATE TABLE `slider_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_subtitle` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider_translations`
--

INSERT INTO `slider_translations` (`id`, `slider_id`, `locale`, `slider_title`, `slider_subtitle`, `created_at`, `updated_at`) VALUES
(6, 6, 'en', 'Sony Headphone', 'Let the sound come alive!', '2021-08-05 08:12:42', '2021-08-05 14:47:41'),
(7, 7, 'en', 'Redmi Ear-buds', 'Crystal clear sound', '2021-08-05 09:13:49', '2021-09-05 02:42:58'),
(8, 8, 'en', 'Test', 'This is a wounderful mobile', '2021-08-05 09:31:18', '2021-10-27 02:01:04'),
(9, 9, 'en', 'Apple Watch', 'Fashion meets functionality', '2021-08-05 09:35:24', '2021-09-05 02:43:59'),
(10, 10, 'en', 'Samsung M02s', 'Best phone for smart users', '2021-10-27 02:01:10', '2021-10-27 02:01:10'),
(11, 11, 'en', 'Test 22', 'Test subtitle', '2022-01-01 04:44:32', '2022-01-01 04:44:32'),
(12, 12, 'en', 'test tt', 'test', '2022-01-01 22:26:18', '2022-01-01 22:26:18'),
(13, 13, 'en', 'test hh', 'tests hgh', '2022-01-01 22:37:01', '2022-01-01 22:37:01'),
(14, 14, 'en', 'fdfsd', 'fsdfd', '2022-01-18 02:25:44', '2022-01-18 02:25:44'),
(15, 15, 'en', 'Year Phone', 'year phone', '2022-01-18 23:04:52', '2022-02-03 04:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `storefront_images`
--

CREATE TABLE `storefront_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `storefront_images`
--

INSERT INTO `storefront_images` (`id`, `setting_id`, `title`, `type`, `image`, `created_at`, `updated_at`) VALUES
(2, NULL, 'favicon_logo', 'logo', '/images/storefront/logo/OZVkfOdriX.webp', '2021-09-04 23:18:20', '2021-12-21 23:43:08'),
(3, NULL, 'header_logo', 'logo', '/images/storefront/logo/TkSSAXV95T.webp', '2021-09-04 23:25:29', '2021-11-27 19:20:33'),
(4, 42, 'slider_banner_1', 'slider_banner', '/images/storefront/slider_banners/PPwBZTv7xS.webp', '2021-09-05 23:04:39', '2022-01-19 01:33:35'),
(7, 45, 'slider_banner_2', 'slider_banner', '/images/storefront/slider_banners/Q3QgKdKbWD.webp', '2021-09-06 03:13:07', '2022-01-19 01:19:47'),
(8, 127, 'slider_banner_3', 'slider_banner', '/images/storefront/slider_banners/X4sJel0EPu.webp', '2021-09-06 03:39:58', '2022-01-19 01:19:47'),
(9, NULL, 'accepted_payment_method_image', 'payment_method', '/images/storefront/payment_method/ib3KoOJLJN.webp', '2021-11-18 04:05:40', '2021-11-18 04:09:10'),
(11, NULL, 'topbar_logo', 'logo', '/images/storefront/logo/U4D3m4bRse.gif', '2021-11-27 19:18:17', '2022-01-30 06:24:06'),
(12, NULL, 'one_column_banner_image', 'one_column_banner', '/images/storefront/one_column_banner/dRC9rX9CXt.webp', '2021-11-27 20:11:49', '2022-01-19 04:20:21'),
(13, NULL, 'two_column_banner_image_1', 'two_column_banners', '/images/storefront/two_column_banners/YoosLI0CUS.webp', '2021-11-27 20:56:14', '2021-11-27 21:16:43'),
(14, NULL, 'two_column_banner_image_2', 'two_column_banners', '/images/storefront/two_column_banners/ZEsOtUhqsL.webp', '2021-11-27 20:56:15', '2021-11-27 21:16:43'),
(15, NULL, 'three_column_banners_image_1', 'three_column_banners', '/images/storefront/three_column_banners/4PYLWnlgjY.webp', '2021-11-27 21:19:23', '2021-11-27 21:26:13'),
(16, NULL, 'three_column_banners_image_2', 'three_column_banners', '/images/storefront/three_column_banners/QMu5uiw2N5.webp', '2021-11-27 21:19:23', '2021-11-27 21:26:13'),
(17, NULL, 'three_column_banners_image_3', 'three_column_banners', '/images/storefront/three_column_banners/DVYcakXaP0.webp', '2021-11-27 21:19:23', '2021-11-27 21:26:13'),
(18, NULL, 'three_column_full_width_banners_image_1', 'three_column_full_width_banners', '/images/storefront/three_column_full_width_banners/7AnEKcOMiM.webp', '2021-11-27 21:55:25', '2021-11-27 21:55:31'),
(19, NULL, 'three_column_full_width_banners_image_2', 'three_column_full_width_banners', '/images/storefront/three_column_full_width_banners/8OE7eVshD7.webp', '2021-11-27 21:55:25', '2021-11-27 21:55:32'),
(20, NULL, 'three_column_full_width_banners_image_3', 'three_column_full_width_banners', '/images/storefront/three_column_full_width_banners/oUGNfby0mx.webp', '2021-11-27 21:55:25', '2021-11-27 21:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'fashion', 1, '2021-03-18 09:20:43', '2021-03-25 13:20:48'),
(2, 'new-arrivals', 1, '2021-03-18 09:20:57', '2021-07-27 00:57:13'),
(3, 'trendy', 1, '2021-03-18 09:21:08', '2022-01-27 04:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `tag_translations`
--

CREATE TABLE `tag_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `local` varchar(255) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `rate` double NOT NULL,
  `based_on` varchar(255) NOT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `country`, `zip`, `rate`, `based_on`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'United States', '4330', 0.01, 'shipping_address', '1', '2021-08-14 06:06:31', '2021-08-15 00:26:14'),
(3, 'Bangladesh', '4330', 50, 'shipping_address', '1', '2021-08-14 22:28:53', '2021-08-15 00:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `tax_translations`
--

CREATE TABLE `tax_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `tax_class` varchar(255) NOT NULL,
  `tax_name` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `username` varchar(100) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` tinyint(4) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `porvider_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `phone`, `email`, `password`, `user_type`, `role`, `role_id`, `image`, `email_verified_at`, `remember_token`, `last_login_at`, `last_login_ip`, `is_active`, `porvider_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Irfan', 'Chowdhury', '123456789', 'admin@gmail.com', '$2y$10$WcnC16AXG/mNrVBWQGjfoegFO.1wjiIiBv5LxEHR6uQaJYVciYCOa', 1, 4, 0, 'images/admin/aNiJfKILIo.webp', NULL, 'DQqPJGdDDGOxowhRbUOdGSpB5TkCm3ijBvWyqAQSjHc68moKiIyqTz7o7L9C', NULL, NULL, 1, NULL, '2020-12-13 14:35:51', '2022-01-18 22:39:06'),
(2, 'irfan', 'Irfan ', 'Chowdhury', '01829498634', 'irfanchowdhury81@gmail.com', '$2y$10$Bpkr0QPBwpiw6Ax8sqvSy.5sZVa96Np7Dnhyz97WBw7cuT1w7pzOi', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-01-31 02:33:22', '2021-08-10 11:53:08'),
(3, 'arman', 'Arman', 'Alam', '01829498635', 'arman@gmail.com', '$2y$10$sFg.WpMhrzu6gQeVq4k5V.NSnJSE2J0pgW1DXFf/za5SCNFiwBoaa', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-02-07 01:29:29', '2021-09-04 21:55:37'),
(4, 'irfan95', 'Irfan', 'Chowdhury Fahim', '384434q9`', 'irfanchowdhury@gmail.com', '$2y$10$f.m5JjQlDp2hRCF6cAvPreblmJq5ZsAqns1l3GBNgQQ/VGfwhaKdi', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-07-30 12:37:29', '2021-09-04 21:55:34'),
(5, 'khan95', 'Mr', 'Khan', '+8801829498436', 'khan@gmail.com', '$2y$10$O1Ha6motjPgmZTq.ShZiFuWstDgbYqrHcC3HF6Ai0lT21ciMDmpTW', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-08-10 10:06:39', '2021-08-10 12:33:57'),
(7, 'chowdhury95', 'Mr', 'Chowdhury', '+8801829498623', 'chowdhury95@gmail.com', '$2y$10$yF8Y304HCzTN3h4THweBMeL9/4GF4GKejnsv41n06WQTbwtr3lPKa', 1, 6, 6, 'images/users/AhTny4rwdZ.png', NULL, NULL, NULL, NULL, 1, NULL, '2021-08-10 11:22:10', '2021-08-11 22:46:28'),
(8, 'rahman95', 'Abdur', 'Rahman', '1234533', 'rahman95@gmail.com', '$2y$10$SF6gpA9qdcBhKn3BbmXX0.Xbh68oAQXaTS5isA0SmH4qSyMNYilpC', 1, 6, 6, 'images/users/GGVwvI20bI.png', NULL, NULL, NULL, NULL, 1, NULL, '2021-08-11 23:07:00', '2021-08-11 23:15:03'),
(9, 'nishat95', 'Shoeb', 'Nishat', '1234554551', 'nishat@gmail.com', '$2y$10$puodf2zCepy8fv0FT9X2muPM6dYOSV6LHaipjipD7oIPRvq/4R6Gi', 1, 6, 6, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-08-11 23:19:34', '2021-08-12 00:41:22'),
(21, 'promi98', 'Promi', 'Chy', '01777703433', 'promi00@gmail.com', '$2y$10$0e6m6BmLQvDkut1xv.Ff7eaQYHhPD6wUpKdcI2AXZ.LhVhMUsbTFC', 0, 3, NULL, 'images/customers/xs7Km7I4tG.webp', NULL, NULL, NULL, NULL, 1, NULL, '2021-10-11 09:01:44', '2021-10-11 09:01:44'),
(23, 'Abir95', 'Abir', 'Shanto', '01548741214', 'abir@gmail.com', '$2y$10$JXPxVB/3uHhFoaUDhRTj9uJ6/WN4E/jrsAKY9F/f/WAYJO4TxE2pK', 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-10-13 22:35:10', '2021-10-13 22:35:10'),
(24, 'ruby95', 'Ruby', 'Khatun', '45646454', 'ruby@gmail.com', '$2y$10$LZ5sDEmGl2H2RGRLMg0C0OyIEzRH9nOXrZzHTfbyE8dBrlgCo9Rse', 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-10-19 23:26:38', '2021-10-19 23:26:38'),
(25, 'fahamina95', 'fahamina', 'Chowdhury', '1567685454', 'fahamina@gmail.com', '$2y$10$2QARKVR48tF1Uwvtam2LS.nqKAs12OGonogfYg5VnsNJxc1jGTn.6', 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-10-20 01:20:21', '2021-10-20 01:20:21'),
(26, 'mainul95', 'Mainul', 'Islam', '01521222515', 'promichowdhury00@gmail.com', '$2y$10$HmW0l0MsUQVtROaWEOnxYO0sMh05gBaNe1UEQUXlXL3FUUvdF/QnG', 0, NULL, NULL, 'images/customers/hkKiiMbBhr.webp', NULL, 'P6SHIr05z09Yo3EKwQwddHjtK4862PIxsZC7LOwm7YFqmSKAgdAiWLQdEB43', NULL, NULL, 1, NULL, '2021-10-20 12:54:13', '2022-02-07 12:22:56'),
(27, 'shamim95', 'Shamim', 'Khandokhar', '1234567890', 'shamim95@gmail.com', '$2y$10$dErhi7MBUXwSSMQ85kqIb.pmyYu5rjeJzDmfvuhftz8RFMtKspH9G', 0, NULL, NULL, 'images/customers/HBGdmz2UIW.webp', NULL, NULL, NULL, NULL, 1, NULL, '2021-10-28 02:23:25', '2021-10-28 02:23:25'),
(31, 'fahimchy95', 'Fahim', 'Chy', '22312321321321', 'fahimchy95@gmail.com', '$2y$10$LsCvQqV5AuKNjlOJF0NUYOWnlB2jZgbAuDpqlwqOY.f15dTuIDUo.', 0, NULL, NULL, 'images/customers/u48sGOGhB6.webp', NULL, NULL, NULL, NULL, 1, NULL, '2021-12-25 02:18:46', '2021-12-25 02:30:50'),
(32, 'juhair95', NULL, NULL, NULL, 'juhair95@gmail.com', '$2y$10$.R3a1Eqtq1rIQ4wVa3nY.OgdY4lKuPv0qwfk1FFiEDz.rmWnH7nRa', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-12-25 04:02:23', '2021-12-25 04:02:23'),
(33, 'qihili', 'Melodie', 'Bush', '+1 (363) 236-8974', 'duxupamu@mailinator.com', '$2y$10$/vl.HJs2awM7JQUKYfjIq.8m5k4jwt0ALbXAZc66t.ZSwKsoQyfVW', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 17:28:20', '2022-01-05 17:28:20'),
(42, 'irfanchowdhury80@gmail.com', 'Irfan Chowdhury', NULL, NULL, 'irfanchowdhury80@gmail.com', NULL, 0, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14Ggrsn2UgQ_0Y3HLgGbHi8kaBUczNoTN_PwmzZ0hzA=s96-c', NULL, NULL, NULL, NULL, 1, '112073730973873758091', '2022-01-11 03:44:59', '2022-01-11 03:44:59'),
(43, 'ferigyxy', 'Alan', 'Cantrell', '+1 (987) 341-9149', 'nubaqufody@mailinator.com', '$2y$10$hN/SSRleeEtzM0mkf7jisO2JgrGsZBDmpDuURleKR47nn5aWy6GHG', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-16 09:39:12', '2022-01-16 09:39:12');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `brand_translations`
--
ALTER TABLE `brand_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coupon_translations`
--
ALTER TABLE `coupon_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `currency_rates`
--
ALTER TABLE `currency_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sales`
--
ALTER TABLE `flash_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `flash_sale_translations`
--
ALTER TABLE `flash_sale_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keyword_hits`
--
ALTER TABLE `keyword_hits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `menu_translations`
--
ALTER TABLE `menu_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `slider_translations`
--
ALTER TABLE `slider_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `storefront_images`
--
ALTER TABLE `storefront_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
