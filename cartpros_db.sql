-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2022 at 04:33 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartpros_db`
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
  `is_active` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_category`
--

CREATE TABLE `attribute_category` (
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_sets`
--

CREATE TABLE `attribute_sets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute_sets`
--

INSERT INTO `attribute_sets` (`id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-03-19 03:18:33', '2022-03-19 03:18:33'),
(2, 1, '2022-03-19 03:18:49', '2022-03-19 03:18:49');

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
(1, 'samsung', 'images/brands/Tz5Z9TTu92.webp', 1, '2022-02-12 23:43:32', '2022-02-12 23:43:32'),
(2, 'iphone', 'images/brands/wINkFmoWSz.png', 1, '2022-02-13 01:16:17', '2022-02-13 01:16:17'),
(3, 'oneplus', 'images/brands/6mahGTkLEA.png', 1, '2022-02-13 01:43:27', '2022-02-13 01:43:27'),
(4, 'asus', 'images/brands/IYD2AmX929.png', 1, '2022-02-14 05:20:10', '2022-02-14 05:20:10'),
(6, 'macbook', 'images/brands/HKwCvZdvUH.jpg', 1, '2022-02-14 23:32:19', '2022-02-14 23:32:19'),
(7, 'lg', 'images/brands/ntKHCu8jVB.png', 1, '2022-02-20 03:38:46', '2022-02-20 03:38:46'),
(8, 'sony', 'images/brands/Q70VGBwFGS.jpg', 1, '2022-02-20 04:10:53', '2022-02-20 04:10:53'),
(9, 'canon', 'images/brands/9StdOHUO4c.jpg', 1, '2022-02-22 01:07:51', '2022-02-22 01:07:51'),
(10, 'fujifilm', 'images/brands/kwYagkVGzn.jpg', 1, '2022-02-22 01:21:51', '2022-02-22 01:21:51');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `top` int(11) DEFAULT '0',
  `is_active` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `parent_id`, `image`, `icon`, `top`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'mobile', NULL, 'images/categories/LQUANnpB58.png', 'las la-mobile', 1, 1, '2022-02-12 23:38:41', '2022-03-19 23:08:57'),
(2, 'computer-accessories', NULL, 'images/categories/DvCxbcTtyF.png', 'las la-desktop', 1, 1, '2022-02-13 03:27:02', '2022-03-24 14:06:12'),
(3, 'television', NULL, 'images/categories/ypdIDYqXwu.png', 'las la-tv', 1, 1, '2022-02-13 03:34:39', '2022-03-24 14:05:39'),
(4, 'watch', NULL, 'images/categories/V3avktsIxq.jpg', 'las la-clock', 1, 1, '2022-02-14 00:27:58', '2022-03-19 23:10:45'),
(5, 'headphone', NULL, 'images/categories/XrVPQksQey.png', 'las la-headphones', 1, 1, '2022-02-14 00:37:23', '2022-03-19 23:18:02'),
(6, 'clothes', NULL, 'images/categories/HZXLvV3Itt.jpg', 'las la-tshirt', 1, 1, '2022-02-14 00:50:24', '2022-03-19 23:28:59'),
(7, 'shoes', NULL, 'images/categories/W8aentkzuv.jpg', 'las la-shoe-prints', 1, 1, '2022-02-14 01:36:13', '2022-03-19 23:29:35'),
(8, 'furniture', NULL, 'images/categories/TEtAMta36u.jpg', 'las la-couch', 1, 1, '2022-02-14 02:03:17', '2022-03-19 23:30:14'),
(9, 'android', 1, 'images/categories/GL500q94w8.png', NULL, 1, 1, '2022-02-14 02:09:17', '2022-02-14 02:15:12'),
(10, 'iphone', 1, 'images/categories/m7HodRuLNT.jpg', NULL, 1, 1, '2022-02-14 02:27:43', '2022-03-02 03:37:24'),
(11, 'featured-phone', 1, 'images/categories/dAb7jF7Vgo.png', NULL, 1, 1, '2022-02-14 03:11:50', '2022-02-14 03:12:38'),
(12, 'desktop', 2, 'images/categories/Q6IozrjfVZ.png', NULL, 0, 1, '2022-02-14 05:03:29', '2022-03-02 03:35:08'),
(13, 'laptop', 2, 'images/categories/1wsyq0n63O.jpg', NULL, 1, 1, '2022-02-14 05:04:12', '2022-02-14 05:04:40'),
(14, 'camera-&-photo', NULL, 'images/categories/bwznVNPEDn.jpg', 'las la-photo-video', 1, 1, '2022-02-22 00:47:13', '2022-02-22 00:47:13'),
(15, 'tablet', NULL, 'images/categories/wgUPDcKBP8.png', 'las la-tablet', 1, 1, '2022-02-22 02:30:23', '2022-02-22 02:30:23');

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
(2, 49),
(6, 50),
(1, 51),
(1, 52),
(3, 53),
(6, 54),
(3, 55),
(1, 56),
(1, 57),
(4, 58),
(3, 59);

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
(1, 1, 'en', 'Mobile', '2022-02-12 23:38:41', '2022-02-12 23:38:41'),
(2, 2, 'en', 'Computer Accessories', '2022-02-13 03:27:02', '2022-02-13 03:27:02'),
(3, 3, 'en', 'Television', '2022-02-13 03:34:39', '2022-02-13 03:34:39'),
(4, 4, 'en', 'Watch', '2022-02-14 00:27:58', '2022-02-14 00:27:58'),
(5, 5, 'en', 'Headphone', '2022-02-14 00:37:23', '2022-02-14 00:37:23'),
(6, 6, 'en', 'Clothes', '2022-02-14 00:50:24', '2022-02-14 00:50:24'),
(7, 7, 'en', 'Shoes', '2022-02-14 01:36:13', '2022-02-14 01:36:13'),
(8, 8, 'en', 'Furniture', '2022-02-14 02:03:17', '2022-02-14 02:03:17'),
(9, 9, 'en', 'Android', '2022-02-14 02:09:17', '2022-02-14 02:09:17'),
(10, 10, 'en', 'iPhone', '2022-02-14 02:27:43', '2022-02-14 02:27:43'),
(11, 11, 'en', 'Featured Phone', '2022-02-14 03:11:50', '2022-02-14 03:11:50'),
(12, 12, 'en', 'Desktop', '2022-02-14 05:03:29', '2022-02-14 05:03:29'),
(13, 13, 'en', 'Laptop', '2022-02-14 05:04:12', '2022-02-14 05:04:12'),
(14, 14, 'en', 'Camera & Photo', '2022-02-22 00:47:13', '2022-02-22 00:47:13'),
(15, 15, 'en', 'Tablet', '2022-02-22 02:30:23', '2022-02-22 02:30:23'),
(16, 15, 'de', 'Tablette', NULL, NULL),
(17, 15, 'es', 'Tableta', NULL, NULL),
(18, 15, 'bn', 'ট্যাবলেট', NULL, NULL),
(19, 14, 'de', 'Kamera & Foto', NULL, NULL),
(20, 13, 'de', 'Laptop', NULL, NULL),
(21, 12, 'de', 'Schreibtisch', NULL, NULL),
(22, 11, 'de', 'Feature-Telefon', NULL, NULL),
(23, 10, 'de', 'IPhone', NULL, NULL),
(24, 9, 'de', 'Android', NULL, NULL),
(25, 8, 'de', 'Möbel', NULL, NULL),
(26, 7, 'de', 'Schuhe', NULL, NULL),
(27, 6, 'de', 'Kleider', NULL, NULL),
(28, 5, 'de', 'Kopfhörer', NULL, NULL),
(29, 4, 'de', 'Uhr', NULL, NULL),
(30, 3, 'de', 'Fernsehen', NULL, NULL),
(31, 2, 'de', 'Computer & Zubehör', NULL, NULL),
(32, 1, 'de', 'Handy, Mobiltelefon', NULL, NULL),
(33, 14, 'es', 'Cámara y foto', NULL, NULL),
(34, 13, 'es', 'Ordenador portátil', NULL, NULL),
(35, 12, 'es', 'Escritorio', NULL, NULL),
(36, 11, 'es', 'Teléfono destacado', NULL, NULL),
(37, 9, 'es', 'Androide', NULL, NULL),
(38, 8, 'es', 'Mueble', NULL, NULL),
(39, 7, 'es', 'Zapatos', NULL, NULL),
(40, 6, 'es', 'Ropa', NULL, NULL),
(41, 5, 'es', 'Auricular', NULL, NULL),
(42, 4, 'es', 'Reloj', NULL, NULL),
(43, 3, 'es', 'Televisión_test', NULL, NULL),
(44, 2, 'es', 'Computadoras y accesorios', NULL, NULL),
(45, 1, 'es', 'Móvil', NULL, NULL),
(46, 14, 'bn', 'ক্যামেরা এবং ছবি', NULL, NULL),
(47, 13, 'bn', 'ল্যাপটপ', NULL, NULL),
(48, 12, 'bn', 'ডেস্কটপ', NULL, NULL),
(49, 11, 'bn', 'বৈশিষ্ট্য ফোন', NULL, NULL),
(50, 10, 'bn', 'আইফোন', NULL, NULL),
(51, 9, 'bn', 'এন্ড্রয়েড', NULL, NULL),
(52, 8, 'bn', 'ফার্ণিচার', NULL, NULL),
(53, 7, 'bn', 'জুতা', NULL, NULL),
(54, 6, 'bn', 'কাপড়', NULL, NULL),
(55, 5, 'bn', 'হেডফোন', NULL, NULL),
(56, 4, 'bn', 'ঘড়ি', NULL, NULL),
(57, 3, 'bn', 'টেলিভিশন', NULL, NULL),
(58, 2, 'bn', 'কম্পিউটার এবং আনুষাঙ্গিক', NULL, NULL),
(59, 1, 'bn', 'মোবাইল', NULL, NULL);

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
(1, 'গ্রীষ্ম-২০২২', 'summer2022', 10.0000, 'fixed', 0, 0.0000, 0.0000, 0, 1, '1970-01-01', '1970-01-01', '2022-03-08 22:54:10', '2022-03-08 23:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_categories`
--

CREATE TABLE `coupon_categories` (
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_products`
--

CREATE TABLE `coupon_products` (
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 1, 'en', 'Summer-2022', '2022-03-08 22:54:10', '2022-03-08 22:54:10'),
(2, 1, 'de', 'Sommer-2022', '2022-03-08 23:00:51', '2022-03-08 23:00:51'),
(3, 1, 'es', 'Verano-2022', '2022-03-08 23:01:12', '2022-03-08 23:01:12'),
(4, 1, 'bn', 'গ্রীষ্ম-২০২২', '2022-03-08 23:01:32', '2022-03-08 23:01:32');

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
  `currency_rate` decimal(8,4) DEFAULT '0.0000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency_rates`
--

INSERT INTO `currency_rates` (`id`, `currency_name`, `currency_code`, `currency_symbol`, `currency_rate`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh Taka', 'BDT', '৳', 80.0000, '2022-03-01 22:36:43', '2022-03-02 08:52:02'),
(2, 'United States Dollar', 'USD', '$', 1.0000, '2022-03-01 22:36:43', '2022-03-02 08:52:15');

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
(1, 44, NULL, NULL, '&lt;script&gt;alert(\'xss\')&lt;/script&gt;', NULL, 'jj@vhg.com', NULL, '$2y$10$jRBQa2MA3bmJhmS82GcO7uWz4c3/XFAXsN82wlX4EoP3UnUk.fVme', 0, '2022-04-03 10:54:41', '2022-04-03 10:54:41'),
(3, 46, NULL, NULL, 'alert(\'xss\')', NULL, 'irfan@gmail.com', NULL, '$2y$10$TL945kB3yzIA/O5VCX7Oy.ygu2myZ.BmCUfT17lzqHGZixobJGITC', 0, '2022-04-04 10:24:14', '2022-04-04 10:24:14'),
(5, 48, NULL, NULL, '<script>alert(\'xss\')</script>', NULL, 'abc@gmail.com', NULL, '$2y$10$ENTTg18aUCedRIuU5TLAre4ioQJHhiJGsMTsIkE9e4qsVmuR9q4bm', 0, '2022-04-04 10:29:06', '2022-04-04 10:29:06');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sales`
--

CREATE TABLE `flash_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flash_sales`
--

INSERT INTO `flash_sales` (`id`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'spring', 1, '2022-02-22 02:45:34', '2022-02-22 02:45:34');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flash_sale_products`
--

INSERT INTO `flash_sale_products` (`id`, `flash_sale_id`, `product_id`, `end_date`, `price`, `qty`, `position`, `created_at`, `updated_at`) VALUES
(2, 2, 32, '2022-04-30', 120.00, 10, 0, '2022-02-22 02:45:34', '2022-02-22 02:45:34'),
(5, 2, 33, '2022-04-28', 30.00, 19, 0, NULL, NULL),
(6, 2, 34, '2022-03-10', 40.00, 20, 0, NULL, NULL),
(7, 2, 3, '2022-03-12', 100.00, 10, 0, NULL, NULL);

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
(2, 2, 'en', 'Spring', '2022-02-22 02:45:34', '2022-02-22 02:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_order` int(5) NOT NULL DEFAULT '0',
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
(1, '', 4, '2022-03-05 23:08:47', '2022-04-03 12:04:55'),
(2, 'Apple', 2, '2022-04-03 11:47:57', '2022-04-03 11:47:58');

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
(11, 'বাংলা', 'bn', 0, '2021-02-19 10:24:49', '2021-09-02 01:08:54'),
(25, 'Spanish', 'es', 0, '2022-03-01 00:44:49', '2022-03-01 00:44:49'),
(26, 'German', 'de', 0, '2022-03-01 00:46:08', '2022-03-01 00:46:08');

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
(1, 'about-menu', 1, '2022-02-25 11:39:09', '2022-03-28 19:06:43'),
(2, 'footer-categories', 1, '2022-03-28 12:36:26', '2022-03-28 12:36:26'),
(3, 'primary-menu', 1, '2022-03-28 19:06:58', '2022-03-28 19:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(191) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `class` varchar(255) DEFAULT NULL,
  `menu` bigint(20) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `locale`, `label`, `link`, `parent`, `sort`, `class`, `menu`, `depth`, `created_at`, `updated_at`) VALUES
(1, 'en', 'Terms & Condition', 'https://cartproshop.com/demo/page/terms-&-condition', 0, 0, NULL, 1, 0, '2022-02-25 11:41:30', '2022-03-29 14:57:43'),
(2, 'en', 'About CartPro', 'https://cartproshop.com/demo/page/about-us', 0, 1, NULL, 1, 0, '2022-02-25 11:47:47', '2022-03-29 14:57:43'),
(3, 'en', 'FAQ', 'https://cartproshop.com/demo/page/faq', 0, 2, NULL, 1, 0, '2022-02-25 11:49:01', '2022-03-29 14:57:43'),
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
(20, 'en', 'Phones', 'https://cartproshop.com/demo/category/mobile', 0, 0, NULL, 3, 0, '2022-03-28 19:07:30', '2022-04-05 10:47:22'),
(21, 'en', 'Watches', 'https://cartproshop.com/demo/category/watch', 0, 1, NULL, 3, 0, '2022-03-28 19:08:02', '2022-03-28 19:08:02'),
(22, 'en', 'Gadgets', 'https://cartproshop.com/demo/category/computer-accessories', 0, 2, NULL, 3, 0, '2022-03-28 19:08:35', '2022-03-28 19:08:35');

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
(1, 1, 'en', 'About Menu', '2022-02-25 11:39:09', '2022-03-28 19:06:43'),
(2, 2, 'en', 'Footer Categories', '2022-03-28 12:36:26', '2022-03-28 12:36:26'),
(3, 3, 'en', 'Primary Menu', '2022-03-28 19:06:58', '2022-03-28 19:06:58');

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
(226, '2022_01_01_084443_add_soft_delete_to_slider_table', 71),
(230, '2022_03_14_172533_create_user_billing_addresses_table', 72),
(231, '2022_03_15_015455_create_user_shipping_addresses_table', 73);

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
(3, 'App\\User', 1),
(1, 'App\\User', 6),
(6, 'App\\User', 7),
(6, 'App\\User', 8),
(6, 'App\\User', 9),
(4, 'App\\User', 10);

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
(1, '&lt;script&gt;alert(\'xss\')&lt;/script&gt;', '2022-04-03 12:00:36', '2022-04-03 12:00:36');

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
  `discount` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `currency_base_total` decimal(10,2) DEFAULT NULL,
  `currency_symbol` varchar(191) DEFAULT NULL,
  `order_status` varchar(191) DEFAULT NULL,
  `payment_status` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `billing_first_name`, `billing_last_name`, `billing_email`, `billing_phone`, `billing_country`, `billing_address_1`, `billing_address_2`, `billing_city`, `billing_state`, `billing_zip_code`, `shipping_method`, `shipping_cost`, `payment_method`, `coupon_id`, `payment_id`, `discount`, `total`, `currency_base_total`, `currency_symbol`, `order_status`, `payment_status`, `date`, `tax_id`, `tax`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test ff', 'gdgdgd', 'test144@gmail.com', '345345555355', 'United States', 'ggdg', 'fgeter', 'fdfg', 'dfgfdgf', 'fdgfd', 'free', '0', 'cash_on_delivery', NULL, '621e2d3cea259', NULL, 30.00, 30.00, '$', 'completed', 'pending', '2022-03-01', NULL, NULL, '2022-03-01 08:27:08', '2022-03-01 22:37:20'),
(2, NULL, 'Test', 'Lasdsd', 'irfanchowdhury434@gmail.com', 'Test', 'Canada', 'dasdd', 'sad', 'dsads', 'sdsad', 'asdsa', 'free', '0', 'cash_on_delivery', NULL, '6225c483b512c', NULL, 200.00, 200.00, '$', 'pending', 'pending', '2022-03-07', NULL, NULL, '2022-03-07 02:38:27', '2022-03-07 02:38:27'),
(3, 1, 'Promiq', 'Chowdhury', 'promi@gmail.com', '01829498634', 'United States', 'Ttes', 'Test', 'Ctesas', 'Caslia', '3456', 'free', '0', 'cash_on_delivery', NULL, '6228670bea345', NULL, 640.50, 640.50, '$', 'pending', 'pending', '2022-03-09', NULL, NULL, '2022-03-09 02:36:27', '2022-03-09 02:36:27'),
(4, 1, 'Saimon', 'Khan', 'saimon@gmail.com', '01829498546', 'Bangladesh', 'Muradpur', 'Ma villa', 'Chittagong', 'Bnagladesh', '4430', 'free', '0', 'cash_on_delivery', NULL, '6229cbd268105', NULL, 710.00, 710.00, '$', 'pending', 'pending', '2022-03-10', 1, NULL, '2022-03-10 03:58:42', '2022-03-10 03:58:42'),
(5, 1, 'Kafilus', 'Satter', 'kafil@gmail.com', '01829498651', 'Bangladesh', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', 'flat_rate', '15', 'cash_on_delivery', 1, '622a450d2c9c6', NULL, 930.00, 930.00, '$', 'pending', 'pending', '2022-03-10', 1, NULL, '2022-03-10 12:35:57', '2022-03-10 12:35:57'),
(6, 1, 'Promi', 'Chowdhury', 'promi@gmail.com', '01993678742', 'Bangladesh', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', 'flat_rate', '15', 'cash_on_delivery', 1, '622a4e11513c9', 10.00, 1214.00, 1214.00, '$', 'pending', 'pending', '2022-03-10', 1, 10.00, '2022-03-10 13:14:25', '2022-03-10 13:14:25'),
(7, 1, 'Promi', 'Chowdhury', 'promi@gmail.com', '01829498634', 'Bangladesh', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', 'flat_rate', '15', 'cash_on_delivery', 1, '622a4ebd7ce69', 10.00, 615.00, 615.00, '$', 'pending', 'pending', '2022-03-10', 1, 10.00, '2022-03-10 13:17:17', '2022-03-10 13:17:17'),
(8, 1, 'Promi', 'Chowdhury', 'salman@gmail.com', '01993678742', 'Albania', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', '', '0', 'paypal', NULL, '622ba8524a90c', NULL, 0.01, 0.01, '$', 'pending', 'pending', '2022-03-11', NULL, NULL, '2022-03-11 13:51:46', '2022-03-11 13:51:46'),
(9, 1, 'Kafilus', 'Khan', 'kafil@gmail.com', '01993678742', 'Bangladesh', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', 'free', '0', 'paypal', NULL, '622ba8881f5f3', NULL, 10.01, 10.01, '$', 'pending', 'pending', '2022-03-11', 1, 10.00, '2022-03-11 13:52:40', '2022-03-11 13:52:40'),
(12, 1, 'Saimon', 'Satter', 'promi@gmail.com', '01829498634', 'Angola', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', 'free', '0', 'paypal', NULL, '622baa58c1ddc', NULL, 0.01, 0.01, '$', 'pending', 'pending', '2022-03-11', NULL, NULL, '2022-03-11 14:00:24', '2022-03-11 14:00:24'),
(13, 1, 'Kamal', 'Satter', 'promi@gmail.com', '01829498634', 'Antarctica', 'Muradpur', 'Muradpur', 'Chittagong', 'Bangladesh', '4330', 'free', '0', 'paypal', NULL, '622baf020eba7', NULL, 0.02, 0.02, '$', 'pending', 'pending', '2022-03-11', NULL, NULL, '2022-03-11 14:20:18', '2022-03-11 14:20:18'),
(14, 1, 'dsds', 'dsdas', 'dsddas@gmail.com', '55354354435', 'United States', 'dsd', 'dadsa', 'dasd', 'dasd', 'dasd', '', NULL, 'cash_on_delivery', NULL, '622da473db43d', NULL, 229.99, 229.99, '$', 'pending', 'pending', '2022-03-13', NULL, NULL, '2022-03-13 01:59:47', '2022-03-13 01:59:47'),
(15, 1, 'dsds', 'dsdas', 'dsddas@gmail.com', '55354354435', 'United States', 'dsd', 'dadsa', 'dasd', 'dasd', 'dasd', 'free', '0', 'cash_on_delivery', NULL, '622da5a21dc54', NULL, 229.99, 229.99, '$', 'pending', 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:04:50', '2022-03-13 02:04:50'),
(16, 1, 'dsds', 'dsdas', 'dsddas@gmail.com', '55354354435', 'United States', 'dsd', 'dadsa', 'dasd', 'dasd', 'dasd', 'local_pickup', '10', 'cash_on_delivery', NULL, '622da5ca0d49e', NULL, 239.99, 239.99, '$', 'pending', 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:05:30', '2022-03-13 02:05:30'),
(17, 1, 'dsds', 'dsdas', 'dsddas@gmail.com', '55354354435', 'United States', 'dsd', 'dadsa', 'dasd', 'dasd', 'dasd', 'free', '0', 'cash_on_delivery', NULL, '622da5e80c711', NULL, 229.99, 229.99, '$', 'pending', 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:06:00', '2022-03-13 02:06:00'),
(18, 1, 'Irfan', 'cHY', 'irfanchowdhury@gmail.com', '989878779878979', 'Canada', 'nbmbmbmb', 'gjhghjg', 'jjjklj', 'ctg', '4330', 'free', '0', 'cash_on_delivery', NULL, '622da65218b02', NULL, 229.99, 229.99, '$', 'pending', 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:07:46', '2022-03-13 02:07:46'),
(19, 1, 'Maisie', 'Browning', 'vozo@mailinator.com', '75', 'East Timor', '23 Rocky Nobel Road', 'Provident libero as', 'Voluptate repudianda', 'Vel est dolor quis s', '79983', 'free', '0', 'cash_on_delivery', NULL, '622da6ae8bcfe', NULL, 241.00, 241.00, '$', 'pending', 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:09:18', '2022-03-13 02:09:18'),
(20, 1, 'test', 'tses', 'test154534@gmail.com', '21323131312', 'United States', 'fsd', 'fssf', 'fsddsfs', 'fssfdsfd', '3432', 'free', '0', 'cash_on_delivery', NULL, '622dae8861fc2', NULL, 229.99, 229.99, '$', 'pending', 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:42:48', '2022-03-13 02:42:48'),
(21, 1, 'test', 'tses', 'test154534@gmail.com', '21323131312', 'United States', 'fsd', 'fssf', 'fsddsfs', 'fssfdsfd', '3432', 'free', '0', 'cash_on_delivery', NULL, '622dafdb11461', NULL, 229.99, 229.99, '$', 'pending', 'pending', '2022-03-13', NULL, NULL, '2022-03-13 02:48:27', '2022-03-13 02:48:27'),
(22, NULL, '&lt;script&gt;alert(\'xss\')&lt;/script&gt;', '&lt;script&gt;alert(\'xss\')&lt;/script&gt;', 'bbh@fcf.com', '535466', 'Canada', '&lt;script&gt;alert(\'xss\')&lt;/script&gt;', '', '', '', '', 'free', '0', 'cash_on_delivery', NULL, '624821579b66b', NULL, 560.00, 560.00, '$', 'pending', 'pending', '2022-04-02', NULL, NULL, '2022-04-02 15:11:35', '2022-04-02 15:11:35'),
(23, 1, 'alert(‘XSS’)', 'alert(‘XSS’)', 'admin@gmail.com', '12313131', 'Bangladesh', '21 South White Clarendon Road', 'Dolorem ut et debiti', 'Adipisicing vero seq', 'Aperiam totam except', '4330', 'free', '0', 'cash_on_delivery', NULL, '6249e7bb806f2', NULL, 570.00, 570.00, '$', 'pending', 'pending', '2022-04-03', 1, 10.00, '2022-04-03 23:30:19', '2022-04-03 23:30:19'),
(24, NULL, 'alert(‘XSS’)', 'alert(‘XSS’)', 'sdfas@afdas.com', '12324', 'Canada', '', '', '', '', '', 'free', '0', 'cash_on_delivery', NULL, '6249e868d8a2a', NULL, 249.00, 249.00, '$', 'pending', 'pending', '2022-04-03', NULL, NULL, '2022-04-03 23:33:12', '2022-04-03 23:33:12');

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
  `options` longtext,
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
(1, 1, 33, NULL, NULL, NULL, 30.00, 1, 1, '/images/products/v5Q6OuT0Yp.webp', '{\"image\":\"\\/images\\/products\\/v5Q6OuT0Yp.webp\",\"product_slug\":\"garmin-vivo-smart-3-activity-tracker-\\u2013-large\",\"category_id\":\"4\"}', 0.00, '', 30.00, '2022-03-01 08:27:09', '2022-03-01 08:27:09'),
(2, 2, 3, NULL, NULL, NULL, 200.00, 1, 1, '/images/products/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\"}', 0.00, '', 200.00, '2022-03-07 02:38:27', '2022-03-07 02:38:27'),
(3, 3, 3, NULL, NULL, NULL, 200.00, 2, 1, '/images/products/gxAhN2e8yY.webp', '{\"image\":\"\\/images\\/products\\/gxAhN2e8yY.webp\",\"product_slug\":\"samsung-galaxy-a52-5g-android-cell-phone\",\"category_id\":\"1\"}', 0.00, '', 400.00, '2022-03-09 02:36:28', '2022-03-09 02:36:28'),
(4, 3, 5, NULL, NULL, NULL, 240.50, 1, 1, '/images/products/XAbIiTyFAC.webp', '{\"image\":\"\\/images\\/products\\/XAbIiTyFAC.webp\",\"product_slug\":\"oneplus-8-pro-onyx-black-android-smartphone\",\"category_id\":\"1\"}', 0.00, '', 240.50, '2022-03-09 02:36:28', '2022-03-09 02:36:28'),
(5, 4, 7, NULL, NULL, NULL, 500.00, 1, 1, '/images/products/large/9og6IARLNE.webp', '{\"image\":\"\\/images\\/products\\/large\\/9og6IARLNE.webp\",\"product_slug\":\"samsung-galaxy-note-10\",\"category_id\":\"1\"}', 0.00, '', 500.00, '2022-03-10 03:58:42', '2022-03-10 03:58:42'),
(6, 4, 1, NULL, NULL, NULL, 100.00, 2, 1, '/images/products/large/f6qXdQdZVm.webp', '{\"image\":\"\\/images\\/products\\/large\\/f6qXdQdZVm.webp\",\"product_slug\":\"apple-iphone-11-64gb-yellow-fully-unlocked\",\"category_id\":\"1\"}', 0.00, '', 200.00, '2022-03-10 03:58:42', '2022-03-10 03:58:42'),
(7, 5, 4, NULL, NULL, NULL, 715.00, 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', 0.00, '', 715.00, '2022-03-10 12:35:57', '2022-03-10 12:35:57'),
(8, 5, 1, NULL, NULL, NULL, 100.00, 2, 1, '/images/products/large/f6qXdQdZVm.webp', '{\"image\":\"\\/images\\/products\\/large\\/f6qXdQdZVm.webp\",\"product_slug\":\"apple-iphone-11-64gb-yellow-fully-unlocked\",\"category_id\":\"1\"}', 0.00, '', 200.00, '2022-03-10 12:35:57', '2022-03-10 12:35:57'),
(9, 6, 1, NULL, NULL, NULL, 100.00, 2, 1, '/images/products/large/f6qXdQdZVm.webp', '{\"image\":\"\\/images\\/products\\/large\\/f6qXdQdZVm.webp\",\"product_slug\":\"apple-iphone-11-64gb-yellow-fully-unlocked\",\"category_id\":\"1\"}', 0.00, '', 200.00, '2022-03-10 13:14:25', '2022-03-10 13:14:25'),
(10, 6, 10, NULL, NULL, NULL, 999.00, 1, 1, '/images/products/large/6E5wX5Zgan.webp', '{\"image\":\"\\/images\\/products\\/large\\/6E5wX5Zgan.webp\",\"product_slug\":\"apple-macbook-pro-13.3-inch-2.7ghz-dual-core-i5\",\"category_id\":\"2\"}', 0.00, '', 999.00, '2022-03-10 13:14:25', '2022-03-10 13:14:25'),
(11, 7, 1, NULL, NULL, NULL, 100.00, 1, 1, '/images/products/large/f6qXdQdZVm.webp', '{\"image\":\"\\/images\\/products\\/large\\/f6qXdQdZVm.webp\",\"product_slug\":\"apple-iphone-11-64gb-yellow-fully-unlocked\",\"category_id\":\"1\"}', 0.00, '', 100.00, '2022-03-10 13:17:17', '2022-03-10 13:17:17'),
(12, 7, 7, NULL, NULL, NULL, 500.00, 1, 1, '/images/products/large/9og6IARLNE.webp', '{\"image\":\"\\/images\\/products\\/large\\/9og6IARLNE.webp\",\"product_slug\":\"samsung-galaxy-note-10\",\"category_id\":\"1\"}', 0.00, '', 500.00, '2022-03-10 13:17:17', '2022-03-10 13:17:17'),
(13, 8, 4, NULL, NULL, NULL, 0.01, 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', 0.00, '', 0.01, '2022-03-11 13:51:46', '2022-03-11 13:51:46'),
(14, 9, 4, NULL, NULL, NULL, 0.01, 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', 0.00, '', 0.01, '2022-03-11 13:52:40', '2022-03-11 13:52:40'),
(15, 10, 4, NULL, NULL, NULL, 0.01, 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', 0.00, '', 0.01, '2022-03-11 13:54:11', '2022-03-11 13:54:11'),
(16, 11, 4, NULL, NULL, NULL, 0.01, 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', 0.00, '', 0.01, '2022-03-11 13:59:05', '2022-03-11 13:59:05'),
(17, 12, 4, NULL, NULL, NULL, 0.01, 1, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', 0.00, '', 0.01, '2022-03-11 14:00:24', '2022-03-11 14:00:24'),
(18, 13, 4, NULL, NULL, NULL, 0.01, 2, 1, '/images/products/large/ydFqlpWr4D.webp', '{\"image\":\"\\/images\\/products\\/large\\/ydFqlpWr4D.webp\",\"product_slug\":\"apple-iphone-11-pro-max-(64gb)-\\u2013-silver\",\"category_id\":\"1\"}', 0.00, '', 0.02, '2022-03-11 14:20:18', '2022-03-11 14:20:18'),
(19, 19, 5, NULL, NULL, NULL, 240.50, 1, 1, '/images/products/large/XAbIiTyFAC.webp', '{\"image\":\"\\/images\\/products\\/large\\/XAbIiTyFAC.webp\",\"product_slug\":\"oneplus-8-pro-onyx-black-android-smartphone\",\"category_id\":\"1\"}', 0.00, '', 240.50, '2022-03-13 02:09:18', '2022-03-13 02:09:18'),
(20, 21, 25, NULL, NULL, NULL, 229.99, 1, 1, '/images/products/large/ag323drGTc.webp', '{\"image\":\"\\/images\\/products\\/large\\/ag323drGTc.webp\",\"product_slug\":\"\\u09b8\\u09cd\\u09af\\u09be\\u09ae\\u09b8\\u09be\\u0982-\\u0997\\u09be\\u09b2\\u09be\\u0995\\u09cd\\u09b8\\u09bf-\\u0985\\u09cd\\u09af\\u09be\\u09b2\\u09c1\\u09ae\\u09bf\\u09a8\\u09bf\\u09af\\u09bc\\u09be\\u09ae\",\"category_id\":\"4\"}', 0.00, '', 229.99, '2022-03-13 02:48:27', '2022-03-13 02:48:27'),
(21, 22, 6, NULL, NULL, NULL, 560.00, 1, 1, '/images/products/large/R9phgu9T1C.webp', '{\"image\":\"\\/images\\/products\\/large\\/R9phgu9T1C.webp\",\"product_slug\":\"apple-iphone-xs-max-64gb--white\",\"category_id\":\"1\",\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', 0.00, '', 560.00, '2022-04-02 15:11:35', '2022-04-02 15:11:35'),
(22, 23, 6, NULL, NULL, NULL, 560.00, 1, 1, '/images/products/large/R9phgu9T1C.webp', '{\"image\":\"\\/images\\/products\\/large\\/R9phgu9T1C.webp\",\"product_slug\":\"apple-iphone-xs-max-64gb--white\",\"category_id\":\"1\",\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', 0.00, '', 560.00, '2022-04-03 23:30:19', '2022-04-03 23:30:19'),
(23, 24, 24, NULL, NULL, NULL, 249.00, 1, 1, '/images/products/large/DvKRMbOFCR.webp', '{\"image\":\"\\/images\\/products\\/large\\/DvKRMbOFCR.webp\",\"product_slug\":\"apple-watch-series-3-gps-\\u2013-42mm-\\u2013-sport-band\",\"category_id\":\"4\",\"manage_stock\":0,\"stock_qty\":null,\"in_stock\":1}', 0.00, '', 249.00, '2022-04-03 23:33:12', '2022-04-03 23:33:12');

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
(1, 'terms-&-condition', 1, '2022-02-25 11:40:27', '2022-02-25 11:46:30'),
(2, 'about-us', 1, '2022-02-25 11:47:18', '2022-02-25 11:47:18'),
(3, 'faq', 1, '2022-02-25 11:48:47', '2022-03-29 14:52:33');

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
(1, 1, 'en', 'Terms & Condition', '&lt;p&gt;This website is operated by a.season. Throughout the site, the terms &amp;ldquo;we&amp;rdquo;, &amp;ldquo;us&amp;rdquo; and &amp;ldquo;our&amp;rdquo; refer to a.season. a.season offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;By visiting our site and/ or purchasing something from us, you engage in our &amp;ldquo;Service&amp;rdquo; and agree to be bound by the following terms and conditions (&amp;ldquo;Terms of Service&amp;rdquo;, &amp;ldquo;Terms&amp;rdquo;), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;Online Store Terms&lt;/h4&gt;\n&lt;p&gt;By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;General Conditions&lt;/h4&gt;\n&lt;p&gt;We reserve the right to refuse service to anyone for any reason at any time.&lt;br /&gt;You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;License&lt;/h4&gt;\n&lt;p&gt;You must not:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;Republish material from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;li&gt;Sell, rent or sub-license material from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;li&gt;Reproduce, duplicate or copy material from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;li&gt;Redistribute content from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;Disclaimer&lt;/h4&gt;\n&lt;p&gt;To the maximum extent permitted by applicable law, we exclude all representations:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;limit or exclude our or your liability for death or personal injury;&lt;/li&gt;\n&lt;li&gt;limit or exclude our or your liability for fraud or fraudulent misrepresentation;&lt;/li&gt;\n&lt;li&gt;limit any of our or your liabilities in any way that is not permitted under applicable law; or&lt;/li&gt;\n&lt;li&gt;exclude any of our or your liabilities that may not be excluded under applicable law.&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.&lt;/p&gt;', '2022-02-25 11:40:27', '2022-02-25 11:46:30');
INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `page_name`, `body`, `created_at`, `updated_at`) VALUES
(2, 2, 'en', 'About Us', '&lt;h1&gt;&lt;img title=&quot;breadcrumb-5.jpg&quot; src=&quot;data:image/jpeg;base64,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Y2tnT2JqYwAAAAEAAAAAAABSR0JDAAAAAwAAAABSZCAgZG91YkBv4AAAAAAAAAAAAEdybiBkb3ViQG/gAAAAAAAAAAAAQmwgIGRvdWJAb+AAAAAAAAAAAABCcmRUVW50RiNSbHQAAAAAAAAAAAAAAABCbGQgVW50RiNSbHQAAAAAAAAAAAAAAABSc2x0VW50RiNQeGxAUgAAAAAAAAAAAAp2ZWN0b3JEYXRhYm9vbAEAAAAAUGdQc2VudW0AAAAAUGdQcwAAAABQZ1BDAAAAAExlZnRVbnRGI1JsdAAAAAAAAAAAAAAAAFRvcCBVbnRGI1JsdAAAAAAAAAAAAAAAAFNjbCBVbnRGI1ByY0BZAAAAAAAAAAAAEGNyb3BXaGVuUHJpbnRpbmdib29sAAAAAA5jcm9wUmVjdEJvdHRvbWxvbmcAAAAAAAAADGNyb3BSZWN0TGVmdGxvbmcAAAAAAAAADWNyb3BSZWN0UmlnaHRsb25nAAAAAAAAAAtjcm9wUmVjdFRvcGxvbmcAAAAAADhCSU0D7QAAAAAAEABIAAAAAQABAEgAAAABAAE4QklNBCYAAAAAAA4AAAAAAAAAAAAAP4AAADhCSU0EDQAAAAAABAAAAB44QklNBBkAAAAAAAQAAAAeOEJJTQPzAAAAAAAJAAAAAAAAAAABADhCSU0nEAAAAAAACgABAAAAAAAAAAE4QklNA/UAAAAAAEgAL2ZmAAEAbGZmAAYAAAAAAAEAL2ZmAAEAoZmaAAYAAAAAAAEAMgAAAAEAWgAAAAYAAAAAAAEANQAAAAEALQAAAAYAAAAAAAE4QklNA/gAAAAAAHAAAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAAAAA/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAOEJJTQQIAAAAAAAQAAAAAQAAAkAAAAJAAAAAADhCSU0EHgAAAAAABAAAAAA4QklNBBoAAAAAA00AAAAGAAAAAAAAAAAAAAG9AAAHgAAAAAwAYgByAGUAYQBkAGMAcgB1AG0AYgAtADUAAAABAAAAAAAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAAAAAB4AAAAG9AAAAAAAAAAAAAAAAAAAAAAEA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bwBzAGgAbwBwAAAAFwBBAGQAbwBiAGUAIABQAGgAbwB0AG8AcwBoAG8AcAAgAEMAQwAgADIAMAAxADkAAAABADhCSU0EBgAAAAAABwAIAQEAAQEA/+EM2Wh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8APD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDUgNzkuMTYzNDk5LCAyMDE4LzA4LzEzLTE2OjQwOjIyICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIiB4bWxuczpwaG90b3Nob3A9Imh0dHA6Ly9ucy5hZG9iZS5jb20vcGhvdG9zaG9wLzEuMC8iIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0iOTIyNjMyQkYzNjFFQ0VFNEY3MzVBNERFNzkzNTRDN0MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6YjE4MTVlYWYtNDljZC0yMjQ4LWJlNDYtOWIwM2FmN2QyNTdiIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9IjkyMjYzMkJGMzYxRUNFRTRGNzM1QTRERTc5MzU0QzdDIiBkYzpmb3JtYXQ9ImltYWdlL2pwZWciIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSIiIHhtcDpDcmVhdGVEYXRlPSIyMDE5LTAyLTA0VDEzOjIwOjI5KzA2OjAwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAxOS0wMi0wOFQxMDoxMTozNiswNjowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAxOS0wMi0wOFQxMDoxMTozNiswNjowMCI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOmIxODE1ZWFmLTQ5Y2QtMjI0OC1iZTQ2LTliMDNhZjdkMjU3YiIgc3RFdnQ6d2hlbj0iMjAxOS0wMi0wOFQxMDoxMTozNiswNjowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTkgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8P3hwYWNrZXQgZW5kPSJ3Ij8+/+4AIUFkb2JlAGRAAAAAAQMAEAMCAwYAAAAAAAAAAAAAAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQECAQEBAQEBAgICAgICAgICAgICAgIDAwMDAwMDAwMDAwMDAwMBAQEBAQEBAgEBAgMCAgIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA//CABEIAb0HgAMBEQACEQEDEQH/xAEQAAEAAAYDAQEAAAAAAAAAAAAAAgMEBQYIAQcJCgsBAQACAgMBAQAAAAAAAAAAAAABBAMFAgYIBwkQAAEDBAECBQIEAwYGAwEAAAECAwQAEQUGBxAScCExEwggFDA0FQlBIiNAUBY2FzdgwDIzJDWARAomEQABAwIEAggCBQcIBQkJAAABAgMEEQUAITEGQRJRYYGRIhMUB3EyEKHBIxVwsUJSMyQWMNHhcpJDUzQg8GKCCLJjg5NEdCU1F0BgwHOzhLR1JhIAAQEEBggCBgYHBgUFAAAAAQARITECEFFxEgME8EFhgZEiMgUgcKGxUnITFDDhQmIjFUDB0fEzJAZQglNUdCVggMCSY3M0RIQW/9oADAMBAQIRAxEAAAD7MfF/3EAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABIAIAAAAAAAAAAAAAAAAAAAAAAAAAABIAABAJAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACKxAAhryAAAAAAAAAAAAAAAAAAAAAAAAAAIrEAAAQ4JQisQBDXkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAARWICAhwSAAAAAAAAAAAAAAAAAAAAAAAAAAIs8JAAAQ4JizwBDXkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAARWIQhwSAAAAAAAAAAAAAAAAAAAAAAAAAAABFnhIAAAAQ15AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEViIa8gAAAAAAAAAAAAAAAAAAAAAAAAAAAARWIAAAAENeQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABFYiGvIAAAAAAAAAAAAAAAAAAAAAAAAAAAAEWeEgAEEgIa8gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACKxENeQAAAAAAAAAAAAAAAAAAAAAAAAAAAABFnhIAQ4JizwBDXkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAARZ4hwSAAAAAAAAAAAAAAAAAAAAAAAAAAAAABFnhIAACGvIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA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&quot; alt=&quot;&quot; width=&quot;1920&quot; height=&quot;445&quot; /&gt;&lt;/h1&gt;\r\n&lt;h1&gt;CartPro - your \'go to\' shopping platform&lt;/h1&gt;\r\n&lt;p&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h4&gt;Why shop at CartPro&lt;/h4&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;In luctus nunc id lectus pellentesque lacinia.&lt;/li&gt;\r\n&lt;li&gt;Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur.&lt;/li&gt;\r\n&lt;li&gt;Nam sed sapien sed lacus placerat euismod in consectetur ex.&lt;/li&gt;\r\n&lt;li&gt;Sed et odio ultrices, semper sem sed, scelerisque libero.&lt;/li&gt;\r\n&lt;li&gt;Proin ut ex varius libero viverra pellentesque.&lt;/li&gt;\r\n&lt;/ul&gt;', '2022-02-25 11:47:18', '2022-03-29 15:21:23');
INSERT INTO `page_translations` (`id`, `page_id`, `locale`, `page_name`, `body`, `created_at`, `updated_at`) VALUES
(3, 3, 'en', 'FAQ', '&lt;p&gt;Help &amp; FAQ   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.     What does LOREM mean? ‘Lorem ipsum dolor sit amet, consectetur adipisici elit…’ (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts, for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.     Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).     Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.     Where can I get some? There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.     Why do we use Lorem Ipsum? Many times, readers will get distracted by readable text when looking at the layout of a page. Instead of using filler text that says “Insert content here,” Lorem Ipsum uses a normal distribution of letters, making it resemble standard English. This makes it easier for designers to focus on visual elements, as opposed to what the text on a page actually says. Lorem Ipsum is absolutely necessary in most design cases, too. Web design projects like landing pages, website redesigns and so on only look as intended when they\'re fully-fleshed out with content.&lt;/p&gt;', '2022-02-25 11:48:47', '2022-04-05 13:52:20'),
(4, 3, 'bn', 'প্রশ্ন ও জিজ্ঞাসা', '&lt;p&gt;সাহায্য এবং FAQ&lt;/p&gt;\n&lt;p&gt;Lorem Ipsum হল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য। লোরেম ইপসাম 1500 এর দশক থেকে শিল্পের মানক ডামি টেক্সট হয়েছে, যখন একটি অজানা প্রিন্টার টাইপের একটি গ্যালি নিয়েছিল এবং একটি টাইপ নমুনা বই তৈরি করতে এটিকে স্ক্র্যাম্বল করেছিল। এটি শুধুমাত্র পাঁচ শতক নয়, ইলেকট্রনিক টাইপসেটিং-এ লাফ দিয়েও টিকে আছে, যা মূলত অপরিবর্তিত রয়েছে। এটি 1960-এর দশকে লোরেম ইপসাম প্যাসেজ সম্বলিত লেট্রাসেট শীট প্রকাশের মাধ্যমে এবং অতি সম্প্রতি লোরেম ইপসামের সংস্করণ সহ অ্যালডাস পেজমেকারের মতো ডেস্কটপ প্রকাশনা সফ্টওয়্যারের মাধ্যমে জনপ্রিয় হয়েছিল।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;LOREM মানে কি?&lt;/p&gt;\n&lt;p&gt;\'Lorem ipsum dolor sit amet, consectetur adipisici elit...\' (সম্পূর্ণ টেক্সট) হল ডামি টেক্সট যা কিছু বোঝানোর জন্য নয়। এটি ম্যাগাজিন লেআউটে একটি স্থানধারক হিসাবে ব্যবহৃত হয়, উদাহরণস্বরূপ, সমাপ্ত নথির একটি ছাপ দেওয়ার জন্য। পাঠ্যটি ইচ্ছাকৃতভাবে দুর্বোধ্য যাতে দর্শক বিষয়বস্তু দ্বারা বিভ্রান্ত না হয়। ভাষাটি প্রকৃত ল্যাটিন নয় এবং এমনকি প্রথম শব্দ \'লোরেম\'-এর অস্তিত্ব নেই। বলা হয় যে লোরেম ইপসাম টেক্সটটি 16 শতক থেকে টাইপসেটারদের মধ্যে প্রচলিত।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;আমরা কেন এটা ব্যবহার করি?&lt;/p&gt;\n&lt;p&gt;এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে একটি পাঠক একটি পৃষ্ঠার লেআউট দেখার সময় পাঠযোগ্য বিষয়বস্তু দ্বারা বিভ্রান্ত হবে। Lorem Ipsum ব্যবহার করার বিষয় হল যে এটিতে \'এখানে সামগ্রী, এখানে বিষয়বস্তু\' ব্যবহার করার বিপরীতে অক্ষরগুলির একটি কম-বেশি স্বাভাবিক বিতরণ রয়েছে, এটিকে পঠনযোগ্য ইংরেজির মতো দেখায়। অনেক ডেস্কটপ পাবলিশিং প্যাকেজ এবং ওয়েব পেজ এডিটররা এখন তাদের ডিফল্ট মডেল টেক্সট হিসেবে Lorem Ipsum ব্যবহার করে এবং \'lorem ipsum\'-এর জন্য অনুসন্ধান করলে অনেক ওয়েব সাইট তাদের শৈশবকালেই উন্মোচিত হবে। বছরের পর বছর ধরে বিভিন্ন সংস্করণ বিকশিত হয়েছে, কখনও দুর্ঘটনাক্রমে, কখনও কখনও উদ্দেশ্যমূলক (ইনজেক্টেড হিউমার এবং এর মতো)।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;যেখানে এটি থেকে আসে?&lt;/p&gt;\n&lt;p&gt;জনপ্রিয় বিশ্বাসের বিপরীতে, Lorem Ipsum কেবল এলোমেলো পাঠ্য নয়। এটি 45 খ্রিস্টপূর্বাব্দের ধ্রুপদী ল্যাটিন সাহিত্যের একটি অংশে শিকড় রয়েছে, যা এটিকে 2000 বছরেরও বেশি পুরানো করে তোলে। ভার্জিনিয়ার হ্যাম্পডেন-সিডনি কলেজের একজন ল্যাটিন অধ্যাপক রিচার্ড ম্যাকক্লিনটক, লরেম ইপসাম প্যাসেজ থেকে আরও অস্পষ্ট ল্যাটিন শব্দ, কনসেক্টেটুর, এবং ধ্রুপদী সাহিত্যে শব্দের উদ্ধৃতির মধ্য দিয়ে গিয়ে সন্দেহাতীত উৎস আবিষ্কার করেন।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;আমি কোথায় কিছু পেতে পারি?&lt;/p&gt;\n&lt;p&gt;Lorem Ipsum-এর অনুচ্ছেদের অনেক বৈচিত্র উপলব্ধ রয়েছে, কিন্তু অধিকাংশই কিছু আকারে পরিবর্তনের শিকার হয়েছে, ইনজেকশন করা হাস্যরস, বা এলোমেলো শব্দ যা সামান্য বিশ্বাসযোগ্য মনে হচ্ছে না। আপনি যদি Lorem Ipsum-এর একটি প্যাসেজ ব্যবহার করতে যাচ্ছেন, তাহলে আপনাকে নিশ্চিত হতে হবে যে টেক্সটের মাঝখানে বিব্রতকর কিছু লুকানো নেই। ইন্টারনেটের সমস্ত Lorem Ipsum জেনারেটরগুলি প্রয়োজনীয় হিসাবে পূর্বনির্ধারিত অংশগুলি পুনরাবৃত্তি করার প্রবণতা রাখে, এটিকে ইন্টারনেটে প্রথম সত্য জেনারেটর করে তোলে। এটি লরেম ইপসাম তৈরি করতে 200 টিরও বেশি ল্যাটিন শব্দের অভিধান ব্যবহার করে, যা কিছু মডেল বাক্য গঠনের সাথে মিলিত হয় যা যুক্তিসঙ্গত বলে মনে হয়। উত্পন্ন লোরেম ইপসাম তাই সবসময় পুনরাবৃত্তি, ইনজেকশন করা হাস্যরস, বা অ-চরিত্রহীন শব্দ ইত্যাদি থেকে মুক্ত।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;কেন আমরা Lorem Ipsum ব্যবহার করি?&lt;/p&gt;\n&lt;p&gt;অনেক সময়, পাঠকরা একটি পৃষ্ঠার বিন্যাস দেখার সময় পাঠযোগ্য পাঠ্য দ্বারা বিভ্রান্ত হবেন। &quot;এখানে বিষয়বস্তু ঢোকান&quot; বলে ফিলার টেক্সট ব্যবহার করার পরিবর্তে লোরেম ইপসাম অক্ষরগুলির একটি সাধারণ বিতরণ ব্যবহার করে, এটিকে সাধারণ ইংরেজির মতো করে। এটি ডিজাইনারদের ভিজ্যুয়াল উপাদানগুলিতে ফোকাস করা সহজ করে তোলে, একটি পৃষ্ঠার পাঠ্য আসলে যা বলে তার বিপরীতে। বেশিরভাগ ডিজাইনের ক্ষেত্রেও Lorem Ipsum একেবারে প্রয়োজনীয়। ওয়েব ডিজাইন প্রজেক্ট যেমন ল্যান্ডিং পেজ, ওয়েবসাইট রিডিজাইন ইত্যাদি শুধুমাত্র তখনই দেখায় যখন সেগুলি কন্টেন্টের সাথে সম্পূর্ণরূপে পরিপূর্ণ হয়।&lt;/p&gt;', '2022-03-08 23:07:24', '2022-03-08 23:07:24'),
(5, 2, 'bn', 'আমদের সম্পর্কে', '&lt;p&gt;Lorem Ipsum-এর অনুচ্ছেদের অনেক বৈচিত্র উপলব্ধ রয়েছে, কিন্তু অধিকাংশই কিছু আকারে পরিবর্তনের শিকার হয়েছে, ইনজেকশন করা হাস্যরস, বা এলোমেলো শব্দ যা সামান্য বিশ্বাসযোগ্য মনে হচ্ছে না। আপনি যদি Lorem Ipsum-এর একটি প্যাসেজ ব্যবহার করতে যাচ্ছেন, তাহলে আপনাকে নিশ্চিত হতে হবে যে টেক্সটের মাঝখানে বিব্রতকর কিছু লুকানো নেই। ইন্টারনেটের সমস্ত Lorem Ipsum জেনারেটরগুলি প্রয়োজনীয় হিসাবে পূর্বনির্ধারিত অংশগুলি পুনরাবৃত্তি করার প্রবণতা রাখে, এটিকে ইন্টারনেটে প্রথম সত্য জেনারেটর করে তোলে। এটি লরেম ইপসাম তৈরি করতে 200 টিরও বেশি ল্যাটিন শব্দের অভিধান ব্যবহার করে, যা কিছু মডেল বাক্য গঠনের সাথে মিলিত হয় যা যুক্তিসঙ্গত বলে মনে হয়। উত্পন্ন লোরেম ইপসাম তাই সবসময় পুনরাবৃত্তি, ইনজেকশন করা হাস্যরস, বা অ-চরিত্রহীন শব্দ ইত্যাদি থেকে মুক্ত।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;br /&gt;লুকটাস নুনক আইডি লেক্টাস পেলেনটেস্ক ল্যাকিনিয়াতে।&lt;br /&gt;Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur.&lt;br /&gt;Nam sed sapien sed lacus placerat euismod in consectetur ex.&lt;br /&gt;Sed et odio ultrices, Semper Sem Sed, scelerisque libero.&lt;br /&gt;প্রিন্ট ইউটি এক্স varius libero viverra pellentesque.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\n&lt;li&gt;In luctus nunc id lectus pellentesque lacinia.&lt;/li&gt;\n&lt;li&gt;Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur.&lt;/li&gt;\n&lt;li&gt;Nam sed sapien sed lacus placerat euismod in consectetur ex.&lt;/li&gt;\n&lt;li&gt;Sed et odio ultrices, semper sem sed, scelerisque libero.&lt;/li&gt;\n&lt;li&gt;Proin ut ex varius libero viverra pellentesque.&lt;/li&gt;\n&lt;/ul&gt;', '2022-03-08 23:11:32', '2022-03-08 23:11:32'),
(6, 1, 'bn', 'টার্মস এন্ড কন্ডিশন', '&lt;p&gt;এই ওয়েবসাইট a.season দ্বারা পরিচালিত হয়. পুরো সাইট জুড়ে, &quot;আমরা&quot;, &quot;আমাদের&quot; এবং &quot;আমাদের&quot; শব্দগুলো a.season-কে বোঝায়। a.season এই ওয়েবসাইটটি অফার করে, এই সাইট থেকে উপলব্ধ সমস্ত তথ্য, সরঞ্জাম এবং পরিষেবাগুলি সহ আপনার, ব্যবহারকারীর জন্য, এখানে উল্লিখিত সমস্ত শর্তাবলী, শর্তাবলী, নীতি এবং বিজ্ঞপ্তিগুলি আপনার স্বীকৃতির উপর শর্তযুক্ত।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;আমাদের সাইট পরিদর্শন করে এবং/অথবা আমাদের কাছ থেকে কিছু কেনার মাধ্যমে, আপনি আমাদের &quot;পরিষেবা&quot;-তে নিযুক্ত হন এবং নিম্নলিখিত শর্তাবলী (&quot;পরিষেবার শর্তাবলী&quot;, &quot;শর্তাবলী&quot;) দ্বারা আবদ্ধ হতে সম্মত হন, সেই অতিরিক্ত শর্তাবলী এবং নীতিগুলি সহ এখানে উল্লেখ করা হয়েছে এবং/অথবা হাইপারলিঙ্ক দ্বারা উপলব্ধ। এই পরিষেবার শর্তাবলী সাইটের সমস্ত ব্যবহারকারীর জন্য প্রযোজ্য, যার মধ্যে সীমাবদ্ধতা ছাড়াই ব্যবহারকারী যারা ব্রাউজার, বিক্রেতা, গ্রাহক, বণিক, এবং/অথবা সামগ্রীর অবদানকারী।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;অনলাইন স্টোর শর্তাবলী&lt;/p&gt;\n&lt;p&gt;এই পরিষেবার শর্তাবলীতে সম্মত হওয়ার মাধ্যমে, আপনি প্রতিনিধিত্ব করেন যে আপনার রাজ্য বা বসবাসের প্রদেশে আপনি কমপক্ষে সংখ্যাগরিষ্ঠের বয়স, অথবা আপনি আপনার রাজ্য বা বসবাসের প্রদেশে সংখ্যাগরিষ্ঠের বয়স এবং আপনি আমাদের সম্মতি দিয়েছেন আপনার অপ্রাপ্তবয়স্ক নির্ভরশীলদের এই সাইটটি ব্যবহার করার অনুমতি দিন।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;সাধারণ শর্ত&lt;/p&gt;\n&lt;p&gt;আমরা যে কোন সময় যে কোন কারণে যে কাউকে সেবা প্রত্যাখ্যান করার অধিকার সংরক্ষণ করি।&lt;br /&gt;আপনি বুঝতে পারেন যে আপনার বিষয়বস্তু (ক্রেডিট কার্ডের তথ্য সহ নয়), এনক্রিপ্ট ছাড়া স্থানান্তরিত হতে পারে এবং (ক) বিভিন্ন নেটওয়ার্কে ট্রান্সমিশন জড়িত হতে পারে; এবং (খ) সংযোগকারী নেটওয়ার্ক বা ডিভাইসগুলির প্রযুক্তিগত প্রয়োজনীয়তার সাথে সামঞ্জস্য এবং মানিয়ে নেওয়ার জন্য পরিবর্তন। নেটওয়ার্কে স্থানান্তরের সময় ক্রেডিট কার্ডের তথ্য সর্বদা এনক্রিপ্ট করা হয়।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;লাইসেন্স&lt;/p&gt;\n&lt;p&gt;তুমি অবশ্যই না:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;ওয়েবসাইটের নাম থেকে সামগ্রী পুনঃপ্রকাশ করুন&lt;br /&gt;ওয়েবসাইটের নাম থেকে বিক্রয়, ভাড়া বা উপ-লাইসেন্স সামগ্রী&lt;br /&gt;ওয়েবসাইটের নাম থেকে উপাদান পুনরুত্পাদন, অনুলিপি বা অনুলিপি করুন&lt;br /&gt;ওয়েবসাইটের নাম থেকে সামগ্রী পুনরায় বিতরণ করুন&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;দাবিত্যাগ&lt;/p&gt;\n&lt;p&gt;প্রযোজ্য আইন দ্বারা অনুমোদিত সর্বাধিক পরিমাণে, আমরা সমস্ত উপস্থাপনা বাদ দিই:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;মৃত্যু বা ব্যক্তিগত আঘাতের জন্য আমাদের বা আপনার দায়বদ্ধতা সীমিত বা বাদ দিন;&lt;br /&gt;জালিয়াতি বা প্রতারণামূলক ভুল উপস্থাপনের জন্য আমাদের বা আপনার দায়বদ্ধতাকে সীমাবদ্ধ বা বাদ দিন;&lt;br /&gt;প্রযোজ্য আইনের অধীনে অনুমোদিত নয় এমন যেকোন উপায়ে আমাদের বা আপনার দায়বদ্ধতা সীমাবদ্ধ করুন; বা&lt;br /&gt;প্রযোজ্য আইনের অধীনে বাদ দেওয়া যাবে না এমন কোনো আমাদের বা আপনার দায় বাদ দিন।&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;যতক্ষণ না ওয়েবসাইট এবং ওয়েবসাইটের তথ্য এবং পরিষেবাগুলি বিনামূল্যে প্রদান করা হয়, আমরা কোনও প্রকৃতির ক্ষতি বা ক্ষতির জন্য দায়ী থাকব না।&lt;/p&gt;', '2022-03-08 23:12:08', '2022-03-08 23:12:08'),
(7, 3, 'de', 'Häufig Fragen und Fragen', '&lt;h1 style=&quot;text-align: center;&quot;&gt;Hilfe &amp;amp; FAQ&lt;/h1&gt;\n&lt;p&gt;Lorem Ipsum ist einfach Blindtext der Druck- und Satzindustrie. Lorem Ipsum ist seit den 1500er Jahren der Standard-Dummy-Text der Branche, als ein unbekannter Drucker eine Reihe von Typen nahm und daraus ein Musterbuch f&amp;uuml;r Typen erstellte. Sie hat nicht nur f&amp;uuml;nf Jahrhunderte, sondern auch den Sprung in den elektronischen Satz &amp;uuml;berstanden und ist im Wesentlichen unver&amp;auml;ndert geblieben. Es wurde in den 1960er Jahren mit der Ver&amp;ouml;ffentlichung von Letraset-Bl&amp;auml;ttern mit Passagen von Lorem Ipsum und in j&amp;uuml;ngerer Zeit mit Desktop-Publishing-Software wie Aldus PageMaker, einschlie&amp;szlig;lich Versionen von Lorem Ipsum, popul&amp;auml;r.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Was bedeutet LOREM?&lt;/p&gt;\n&lt;p&gt;&amp;bdquo;Lorem ipsum dolor sit amet, consectetur adipisici elit&amp;hellip;&amp;ldquo; (vollst&amp;auml;ndiger Text) ist ein Blindtext, der nichts bedeuten soll. Es wird beispielsweise als Platzhalter in Zeitschriftenlayouts verwendet, um einen Eindruck vom fertigen Dokument zu vermitteln. Der Text ist absichtlich unverst&amp;auml;ndlich, damit der Betrachter nicht vom Inhalt abgelenkt wird. Die Sprache ist kein richtiges Latein und nicht einmal das erste Wort &amp;bdquo;Lorem&amp;ldquo; existiert. Der Lorem-ipsum-Text soll unter Schriftsetzern seit dem 16. Jahrhundert &amp;uuml;blich gewesen sein.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Warum verwenden wir es?&lt;/p&gt;\n&lt;p&gt;Es ist eine seit langem bekannte Tatsache, dass ein Leser beim Betrachten des Layouts durch den lesbaren Inhalt einer Seite abgelenkt wird. Der Punkt bei der Verwendung von Lorem Ipsum ist, dass es eine mehr oder weniger normale Verteilung von Buchstaben hat, im Gegensatz zur Verwendung von &amp;bdquo;Inhalt hier, Inhalt hier&amp;ldquo;, wodurch es wie lesbares Englisch aussieht. Viele Desktop-Publishing-Pakete und Webseiten-Editoren verwenden jetzt Lorem Ipsum als ihren Standardmodelltext, und eine Suche nach &amp;bdquo;lorem ipsum&amp;ldquo; wird viele Websites aufdecken, die noch in den Kinderschuhen stecken. Im Laufe der Jahre haben sich verschiedene Versionen entwickelt, manchmal zuf&amp;auml;llig, manchmal absichtlich (eingespritzter Humor und dergleichen).&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Woher kommt das?&lt;/p&gt;\n&lt;p&gt;Entgegen der landl&amp;auml;ufigen Meinung ist Lorem Ipsum nicht einfach zuf&amp;auml;lliger Text. Es hat seine Wurzeln in einem St&amp;uuml;ck klassischer lateinischer Literatur aus dem Jahr 45 v. Chr. und ist damit &amp;uuml;ber 2000 Jahre alt. Richard McClintock, Lateinprofessor am Hampden-Sydney College in Virginia, schlug eines der obskureren lateinischen W&amp;ouml;rter, consectetur, in einer Lorem-Ipsum-Passage nach, und als er die Zitate des Wortes in der klassischen Literatur durchging, entdeckte er die unbestreitbare Quelle.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Wo kann ich welche bekommen?&lt;/p&gt;\n&lt;p&gt;Es gibt viele Variationen von Passagen von Lorem Ipsum, aber die meisten wurden in irgendeiner Form ver&amp;auml;ndert, durch eingespritzten Humor oder willk&amp;uuml;rliche W&amp;ouml;rter, die nicht einmal ann&amp;auml;hernd glaubw&amp;uuml;rdig aussehen. Wenn Sie eine Passage von Lorem Ipsum verwenden, m&amp;uuml;ssen Sie sicher sein, dass nichts Peinliches in der Mitte des Textes versteckt ist. Alle Lorem Ipsum-Generatoren im Internet neigen dazu, vordefinierte Chunks nach Bedarf zu wiederholen, was dies zum ersten echten Generator im Internet macht. Es verwendet ein W&amp;ouml;rterbuch mit &amp;uuml;ber 200 lateinischen W&amp;ouml;rtern, kombiniert mit einer Handvoll Modellsatzstrukturen, um Lorem Ipsum zu generieren, das vern&amp;uuml;nftig aussieht. Das generierte Lorem Ipsum ist daher immer frei von Wiederholungen, eingespritztem Humor, uncharakteristischen W&amp;ouml;rtern etc.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Warum verwenden wir Lorem Ipsum?&lt;/p&gt;\n&lt;p&gt;Leser werden oft durch lesbaren Text abgelenkt, wenn sie sich das Layout einer Seite ansehen. Anstatt F&amp;uuml;lltext zu verwenden, der besagt: &amp;bdquo;Inhalt hier einf&amp;uuml;gen&amp;ldquo;, verwendet Lorem Ipsum eine normale Buchstabenverteilung, sodass er dem Standardenglisch &amp;auml;hnelt. Dies erleichtert es Designern, sich auf visuelle Elemente zu konzentrieren, im Gegensatz zu dem, was der Text auf einer Seite tats&amp;auml;chlich sagt. Auch Lorem Ipsum ist in den meisten Auslegungsf&amp;auml;llen zwingend erforderlich. Webdesign-Projekte wie Zielseiten, Website-Redesigns usw. sehen erst dann wie beabsichtigt aus, wenn sie vollst&amp;auml;ndig mit Inhalten gef&amp;uuml;llt sind.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '2022-03-08 23:14:03', '2022-03-08 23:14:03'),
(8, 3, 'es', 'Preguntas más frecuentes', '&lt;h1 style=&quot;text-align: center;&quot;&gt;&lt;span class=&quot;VIiyi&quot; lang=&quot;es&quot;&gt;&lt;span class=&quot;JLqJ4b&quot; data-language-for-alternatives=&quot;es&quot; data-language-to-translate-into=&quot;en&quot; data-phrase-index=&quot;0&quot; data-number-of-phrases=&quot;1&quot;&gt;Ayuda y preguntas frecuentes&lt;/span&gt;&lt;/span&gt;&lt;/h1&gt;\n&lt;p&gt;Lorem Ipsum es simplemente un texto ficticio de la industria de la impresi&amp;oacute;n y la composici&amp;oacute;n tipogr&amp;aacute;fica. Lorem Ipsum ha sido el texto ficticio est&amp;aacute;ndar de la industria desde la d&amp;eacute;cada de 1500, cuando un impresor desconocido tom&amp;oacute; una galera de tipos y la codific&amp;oacute; para hacer un libro de muestras tipogr&amp;aacute;ficas. Ha sobrevivido no solo cinco siglos, sino tambi&amp;eacute;n el salto a la composici&amp;oacute;n tipogr&amp;aacute;fica electr&amp;oacute;nica, permaneciendo esencialmente sin cambios. Se populariz&amp;oacute; en la d&amp;eacute;cada de 1960 con el lanzamiento de hojas de Letraset que conten&amp;iacute;an pasajes de Lorem Ipsum y, m&amp;aacute;s recientemente, con software de autoedici&amp;oacute;n como Aldus PageMaker, que inclu&amp;iacute;a versiones de Lorem Ipsum.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;iquest;Qu&amp;eacute; significa LOREM?&lt;/p&gt;\n&lt;p&gt;&amp;lsquo;Lorem ipsum dolor sit amet, consectetur adipisici elit&amp;hellip;&amp;rsquo; (texto completo) es un texto ficticio que no pretende significar nada. Se utiliza como marcador de posici&amp;oacute;n en dise&amp;ntilde;os de revistas, por ejemplo, para dar una impresi&amp;oacute;n del documento terminado. El texto es intencionalmente ininteligible para que el espectador no se distraiga con el contenido. El idioma no es el lat&amp;iacute;n real e incluso la primera palabra \'Lorem\' no existe. Se dice que el texto lorem ipsum ha sido com&amp;uacute;n entre los tip&amp;oacute;grafos desde el siglo XVI.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;iquest;Por qu&amp;eacute; lo usamos?&lt;/p&gt;\n&lt;p&gt;Es un hecho establecido desde hace mucho tiempo que un lector se distraer&amp;aacute; con el contenido legible de una p&amp;aacute;gina cuando mire su dise&amp;ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&amp;oacute;n de letras m&amp;aacute;s o menos normal, a diferencia de usar \'Contenido aqu&amp;iacute;, contenido aqu&amp;iacute;\', lo que hace que parezca un ingl&amp;eacute;s legible. Muchos paquetes de autoedici&amp;oacute;n y editores de p&amp;aacute;ginas web ahora usan Lorem Ipsum como su modelo de texto predeterminado, y una b&amp;uacute;squeda de \'lorem ipsum\' descubrir&amp;aacute; muchos sitios web que a&amp;uacute;n est&amp;aacute;n en su infancia. Varias versiones han evolucionado a lo largo de los a&amp;ntilde;os, a veces por accidente, a veces a prop&amp;oacute;sito (humor inyectado y cosas por el estilo).&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;iquest;De d&amp;oacute;nde viene?&lt;/p&gt;\n&lt;p&gt;Contrariamente a la creencia popular, Lorem Ipsum no es simplemente un texto aleatorio. Tiene sus ra&amp;iacute;ces en una pieza de la literatura latina cl&amp;aacute;sica del 45 a. C., por lo que tiene m&amp;aacute;s de 2000 a&amp;ntilde;os. Richard McClintock, profesor de lat&amp;iacute;n en Hampden-Sydney College en Virginia, busc&amp;oacute; una de las palabras latinas m&amp;aacute;s oscuras, consectetur, en un pasaje de Lorem Ipsum, y al revisar las citas de la palabra en la literatura cl&amp;aacute;sica, descubri&amp;oacute; la fuente indudable.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;iquest;Donde puedo conseguir algunos?&lt;/p&gt;\n&lt;p&gt;Hay muchas variaciones de pasajes de Lorem Ipsum disponibles, pero la mayor&amp;iacute;a ha sufrido alteraciones de alguna forma, por humor inyectado o palabras aleatorias que no parecen ni un poco cre&amp;iacute;bles. Si vas a usar un pasaje de Lorem Ipsum, debes asegurarte de que no haya nada vergonzoso escondido en medio del texto. Todos los generadores de Lorem Ipsum en Internet tienden a repetir fragmentos predefinidos seg&amp;uacute;n sea necesario, lo que lo convierte en el primer generador real en Internet. Utiliza un diccionario de m&amp;aacute;s de 200 palabras latinas, combinado con un pu&amp;ntilde;ado de estructuras de oraciones modelo, para generar Lorem Ipsum que parece razonable. Por lo tanto, el Lorem Ipsum generado siempre est&amp;aacute; libre de repeticiones, humor inyectado o palabras no caracter&amp;iacute;sticas, etc.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;iquest;Por qu&amp;eacute; usamos Lorem Ipsum?&lt;/p&gt;\n&lt;p&gt;Muchas veces, los lectores se distraen con el texto legible cuando miran el dise&amp;ntilde;o de una p&amp;aacute;gina. En lugar de usar un texto de relleno que dice &quot;Insertar contenido aqu&amp;iacute;&quot;, Lorem Ipsum usa una distribuci&amp;oacute;n normal de letras, lo que lo hace parecerse al ingl&amp;eacute;s est&amp;aacute;ndar. Esto facilita que los dise&amp;ntilde;adores se centren en los elementos visuales, a diferencia de lo que realmente dice el texto de una p&amp;aacute;gina. Lorem Ipsum tambi&amp;eacute;n es absolutamente necesario en la mayor&amp;iacute;a de los casos de dise&amp;ntilde;o. Los proyectos de dise&amp;ntilde;o web, como p&amp;aacute;ginas de destino, redise&amp;ntilde;os de sitios web, etc., solo se ven seg&amp;uacute;n lo previsto cuando est&amp;aacute;n completamente desarrollados con contenido.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '2022-03-08 23:15:38', '2022-03-08 23:15:38'),
(9, 2, 'de', 'Über uns', '&lt;p&gt;Es gibt viele Variationen von Passagen von Lorem Ipsum, aber die meisten wurden in irgendeiner Form ver&amp;auml;ndert, durch eingespritzten Humor oder willk&amp;uuml;rliche W&amp;ouml;rter, die nicht einmal ann&amp;auml;hernd glaubw&amp;uuml;rdig aussehen. Wenn Sie eine Passage von Lorem Ipsum verwenden, m&amp;uuml;ssen Sie sicher sein, dass nichts Peinliches in der Mitte des Textes versteckt ist. Alle Lorem Ipsum-Generatoren im Internet neigen dazu, vordefinierte Chunks nach Bedarf zu wiederholen, was dies zum ersten echten Generator im Internet macht. Es verwendet ein W&amp;ouml;rterbuch mit &amp;uuml;ber 200 lateinischen W&amp;ouml;rtern, kombiniert mit einer Handvoll Modellsatzstrukturen, um Lorem Ipsum zu generieren, das vern&amp;uuml;nftig aussieht. Das generierte Lorem Ipsum ist daher immer frei von Wiederholungen, eingespritztem Humor, uncharakteristischen W&amp;ouml;rtern etc.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;br /&gt;In luctus nunc id lectus pellentesque lacinia.&lt;br /&gt;Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur.&lt;br /&gt;Nam sed sapien sed lacus placerat euismod in consectetur ex.&lt;br /&gt;Sed et odio ultrices, semper sem sed, scelerisque libero.&lt;br /&gt;Proin ut ex varius libero viverra pellentesque.&lt;/p&gt;', '2022-03-08 23:17:07', '2022-03-08 23:18:44'),
(10, 2, 'es', 'Sobre nosotros', '&lt;p&gt;Hay muchas variaciones de pasajes de Lorem Ipsum disponibles, pero la mayor&amp;iacute;a ha sufrido alteraciones de alguna forma, por humor inyectado o palabras aleatorias que no parecen ni un poco cre&amp;iacute;bles. Si vas a usar un pasaje de Lorem Ipsum, debes asegurarte de que no haya nada vergonzoso escondido en medio del texto. Todos los generadores de Lorem Ipsum en Internet tienden a repetir fragmentos predefinidos seg&amp;uacute;n sea necesario, lo que lo convierte en el primer generador real en Internet. Utiliza un diccionario de m&amp;aacute;s de 200 palabras latinas, combinado con un pu&amp;ntilde;ado de estructuras de oraciones modelo, para generar Lorem Ipsum que parece razonable. Por lo tanto, el Lorem Ipsum generado siempre est&amp;aacute; libre de repeticiones, humor inyectado o palabras no caracter&amp;iacute;sticas, etc.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;br /&gt;In luctus nunc id lectus pellentesque lacinia.&lt;br /&gt;Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur.&lt;br /&gt;Nam sed sapien sed lacus placerat euismod in consectetur ex.&lt;br /&gt;Sed et odio ultrices, semper sem sed, scelerisque libero.&lt;br /&gt;Proin ut ex varius libero viverra pellentesque.&lt;/p&gt;', '2022-03-08 23:19:19', '2022-03-08 23:19:19'),
(11, 1, 'es', 'Términos y Condiciones', '&lt;p&gt;Este sitio web es operado por a.temporada. En todo el sitio, los t&amp;eacute;rminos &amp;ldquo;nosotros&amp;rdquo;, &amp;ldquo;nos&amp;rdquo; y &amp;ldquo;nuestro&amp;rdquo; se refieren a una.temporada. a.temporada ofrece este sitio web, incluyendo toda la informaci&amp;oacute;n, herramientas y servicios disponibles para ti en este sitio, el usuario, est&amp;aacute; condicionado a la aceptaci&amp;oacute;n de todos los t&amp;eacute;rminos, condiciones, pol&amp;iacute;ticas y notificaciones aqu&amp;iacute; establecidos.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Al visitar nuestro sitio y/o comprar algo de nosotros, usted participa en nuestro &quot;Servicio&quot; y acepta estar sujeto a los siguientes t&amp;eacute;rminos y condiciones (&quot;T&amp;eacute;rminos de servicio&quot;, &quot;T&amp;eacute;rminos&quot;), incluidos los t&amp;eacute;rminos y condiciones y pol&amp;iacute;ticas adicionales referenciado aqu&amp;iacute; y/o disponible por hiperv&amp;iacute;nculo. Estos T&amp;eacute;rminos de servicio se aplican a todos los usuarios del sitio, incluidos, entre otros, los usuarios que son navegadores, proveedores, clientes, comerciantes y/o contribuyentes de contenido.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;T&amp;eacute;rminos de la tienda en l&amp;iacute;nea&lt;/p&gt;\n&lt;p&gt;Al aceptar estos T&amp;eacute;rminos de servicio, usted declara que tiene al menos la mayor&amp;iacute;a de edad en su estado o provincia de residencia, o que tiene la mayor&amp;iacute;a de edad en su estado o provincia de residencia y nos ha dado su consentimiento para permitir que cualquiera de sus dependientes menores use este sitio.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Condiciones generales&lt;/p&gt;\n&lt;p&gt;Nos reservamos el derecho de rechazar el servicio a cualquier persona por cualquier motivo en cualquier momento.&lt;br /&gt;Usted comprende que su contenido (sin incluir la informaci&amp;oacute;n de la tarjeta de cr&amp;eacute;dito) puede transferirse sin cifrar e involucrar (a) transmisiones a trav&amp;eacute;s de varias redes; y (b) cambios para cumplir y adaptarse a los requisitos t&amp;eacute;cnicos de conexi&amp;oacute;n de redes o dispositivos. La informaci&amp;oacute;n de la tarjeta de cr&amp;eacute;dito siempre se cifra durante la transferencia a trav&amp;eacute;s de las redes.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Licencia&lt;/p&gt;\n&lt;p&gt;No debes:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Volver a publicar material del nombre del sitio web&lt;br /&gt;Vender, alquilar o sublicenciar material de Nombre del sitio web&lt;br /&gt;Reproducir, duplicar o copiar material de Nombre del sitio web&lt;br /&gt;Redistribuir contenido del nombre del sitio web&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Descargo de responsabilidad&lt;/p&gt;\n&lt;p&gt;En la medida m&amp;aacute;xima permitida por la ley aplicable, excluimos todas las representaciones:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;limitar o excluir nuestra o su responsabilidad por muerte o lesiones personales;&lt;br /&gt;limitar o excluir nuestra o su responsabilidad por fraude o tergiversaci&amp;oacute;n fraudulenta;&lt;br /&gt;limitar cualquiera de nuestras responsabilidades o las suyas de cualquier manera que no est&amp;eacute; permitida por la ley aplicable; o&lt;br /&gt;excluir cualquiera de nuestras o sus responsabilidades que no puedan ser excluidas bajo la ley aplicable.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Siempre que el sitio web y la informaci&amp;oacute;n y los servicios en el sitio web se proporcionen de forma gratuita, no seremos responsables de ninguna p&amp;eacute;rdida o da&amp;ntilde;o de ning&amp;uacute;n tipo.&lt;/p&gt;', '2022-03-08 23:20:18', '2022-03-08 23:20:18'),
(12, 1, 'de', 'Allgemeine Geschäftsbedingungen', '&lt;p&gt;Diese Website wird von a.season betrieben. Auf der gesamten Website beziehen sich die Begriffe &amp;bdquo;wir&amp;ldquo;, &amp;bdquo;uns&amp;ldquo; und &amp;bdquo;unser&amp;ldquo; auf a.season. a.season bietet diese Website, einschlie&amp;szlig;lich aller Informationen, Tools und Dienste, die auf dieser Website f&amp;uuml;r Sie, den Benutzer, verf&amp;uuml;gbar sind, unter der Bedingung, dass Sie alle hier aufgef&amp;uuml;hrten Bedingungen, Richtlinien und Hinweise akzeptieren.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Indem Sie unsere Website besuchen und/oder etwas von uns kaufen, nehmen Sie an unserem &amp;bdquo;Service&amp;ldquo; teil und stimmen zu, an die folgenden Allgemeinen Gesch&amp;auml;ftsbedingungen (&amp;bdquo;Nutzungsbedingungen&amp;ldquo;, &amp;bdquo;Bedingungen&amp;ldquo;) gebunden zu sein, einschlie&amp;szlig;lich dieser zus&amp;auml;tzlichen Allgemeinen Gesch&amp;auml;ftsbedingungen und Richtlinien auf die hier verwiesen wird und/oder die per Hyperlink verf&amp;uuml;gbar sind. Diese Nutzungsbedingungen gelten f&amp;uuml;r alle Benutzer der Website, einschlie&amp;szlig;lich, aber nicht beschr&amp;auml;nkt auf Benutzer, die Browser, Verk&amp;auml;ufer, Kunden, H&amp;auml;ndler und/oder Beitragende von Inhalten sind.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Online-Shop-Bedingungen&lt;/p&gt;\n&lt;p&gt;Indem Sie diesen Nutzungsbedingungen zustimmen, erkl&amp;auml;ren Sie, dass Sie in Ihrem Bundesland oder Ihrer Provinz mindestens vollj&amp;auml;hrig sind oder dass Sie in Ihrem Bundesland oder Ihrer Provinz vollj&amp;auml;hrig sind und uns Ihre Zustimmung dazu gegeben haben gestatten Sie Ihren minderj&amp;auml;hrigen Angeh&amp;ouml;rigen die Nutzung dieser Website.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Allgemeine Bedingungen&lt;/p&gt;\n&lt;p&gt;Wir behalten uns das Recht vor, den Service jederzeit und ohne Angabe von Gr&amp;uuml;nden zu verweigern.&lt;br /&gt;Sie verstehen, dass Ihre Inhalte (ohne Kreditkarteninformationen) unverschl&amp;uuml;sselt &amp;uuml;bertragen werden k&amp;ouml;nnen und (a) &amp;Uuml;bertragungen &amp;uuml;ber verschiedene Netzwerke beinhalten; und (b) &amp;Auml;nderungen zur Konformit&amp;auml;t und Anpassung an technische Anforderungen von Verbindungsnetzwerken oder -ger&amp;auml;ten. Kreditkarteninformationen werden w&amp;auml;hrend der &amp;Uuml;bertragung &amp;uuml;ber Netzwerke immer verschl&amp;uuml;sselt.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Lizenz&lt;/p&gt;\n&lt;p&gt;Du darfst nicht:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Ver&amp;ouml;ffentlichen Sie Material von Website Name erneut&lt;br /&gt;Verkaufen, vermieten oder unterlizenzieren Sie Material von Website Name&lt;br /&gt;Reproduzieren, duplizieren oder kopieren Sie Material von Website Name&lt;br /&gt;Verbreiten Sie Inhalte von Website Name&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Haftungsausschluss&lt;/p&gt;\n&lt;p&gt;Soweit nach geltendem Recht zul&amp;auml;ssig, schlie&amp;szlig;en wir alle Zusicherungen aus:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;unsere oder Ihre Haftung f&amp;uuml;r Tod oder K&amp;ouml;rperverletzung einschr&amp;auml;nken oder ausschlie&amp;szlig;en;&lt;br /&gt;unsere oder Ihre Haftung f&amp;uuml;r Betrug oder betr&amp;uuml;gerische Falschdarstellung einschr&amp;auml;nken oder ausschlie&amp;szlig;en;&lt;br /&gt;unsere oder Ihre Verbindlichkeiten auf eine Weise einschr&amp;auml;nken, die nach geltendem Recht nicht zul&amp;auml;ssig ist; oder&lt;br /&gt;schlie&amp;szlig;en Sie jegliche unserer oder Ihrer Verbindlichkeiten aus, die nach geltendem Recht nicht ausgeschlossen werden k&amp;ouml;nnen.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;br /&gt;Solange die Website und die Informationen und Dienste auf der Website kostenlos zur Verf&amp;uuml;gung gestellt werden, haften wir nicht f&amp;uuml;r Verluste oder Sch&amp;auml;den jeglicher Art.&lt;/p&gt;', '2022-03-08 23:20:48', '2022-03-08 23:20:48'),
(13, 4, 'en', 'dsfs', '&lt;h1&gt;gdfdf hgjgh  &lt;/h1&gt;', '2022-04-05 10:32:35', '2022-04-05 12:03:00'),
(14, 5, 'en', 'am', '&lt;script&gt;alert(&lsquo;XSS&rsquo;)&lt;/script&gt;', '2022-04-05 10:32:56', '2022-04-05 10:32:56'),
(15, 6, 'en', 'alert(‘XSS’)', '&lt;h1&gt;ghfhgfh hhj alert(\'xss\')&lt;/h1&gt;', '2022-04-05 10:34:47', '2022-04-05 12:06:15'),
(16, 7, 'en', 'abcd', 'alert(\'xss\')alert(\'xss\')', '2022-04-05 11:41:36', '2022-04-05 11:41:36'),
(17, 8, 'en', 'abcs', 'alert(\'xss\')alert(\'xss\')alert(\'xss\')', '2022-04-05 11:42:26', '2022-04-05 11:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `manage_stock` tinyint(4) DEFAULT '0',
  `qty` int(11) DEFAULT NULL,
  `in_stock` tinyint(4) DEFAULT NULL,
  `viewed` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `new_from` date DEFAULT NULL,
  `new_to` date DEFAULT NULL,
  `avg_rating` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `tax_id`, `slug`, `price`, `special_price`, `special_price_type`, `is_special`, `special_price_start`, `special_price_end`, `selling_price`, `sku`, `manage_stock`, `qty`, `in_stock`, `viewed`, `is_active`, `new_from`, `new_to`, `avg_rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 'apple-iphone-11-64gb-yellow-fully-unlocked', 100.0000, 0.0000, '', 0, NULL, NULL, 0.0000, 'SO4JK74', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 00:46:06', '2022-03-03 03:33:29', NULL),
(2, 2, 1, 'apple-iphone-x-64gb-silver-fully-unlocked', 284.0000, 0.0000, '', 0, NULL, NULL, 0.0000, 'CE45VERT', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 01:26:24', '2022-03-03 03:30:06', NULL),
(3, 1, 1, 'samsung-galaxy-a52-5g-android-cell-phone', 200.0000, 0.0000, '', 0, NULL, NULL, 0.0000, 'KGH45YRT', 1, 2, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 01:30:20', '2022-03-06 05:41:22', NULL),
(4, 2, 1, 'apple-iphone-11-pro-max-(64gb)-–-silver', 815.0000, 0.0100, '', 1, NULL, NULL, 0.0100, 'S57UK74', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 01:36:03', '2022-03-11 13:24:23', NULL),
(5, 3, 1, 'oneplus-8-pro-onyx-black-android-smartphone', 240.5000, 0.0000, '', 0, NULL, NULL, 0.0000, 'YHE4M7', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 01:41:17', '2022-03-03 03:15:12', NULL),
(6, 2, 1, 'apple-iphone-xs-max-64gb--white', 560.0000, 0.0000, '', 1, NULL, NULL, 0.0000, 'KLIOLP', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 02:11:05', '2022-03-31 08:23:05', NULL),
(7, 1, 1, 'samsung-galaxy-note-10', 590.0000, 500.0000, '', 1, NULL, NULL, 500.0000, 'LKOUHJ', 1, 5, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 02:18:25', '2022-03-31 08:22:30', NULL),
(8, 4, 1, 'asus-vivobook-15-thin-and-light-laptop-15.6-inch-fhd-display', 519.0000, 470.0000, '', 1, NULL, NULL, 470.0000, 'SL4JK74', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-14 05:36:08', '2022-03-31 08:21:27', NULL),
(9, 4, 1, 'asus-vivobook-17.3″-i5-8gb_1tb-17.3″-fhd-display', 589.0000, 549.0000, '', 1, NULL, NULL, 549.0000, 'BE48VGRN', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-14 06:04:57', '2022-03-03 02:23:51', NULL),
(10, 6, 1, 'apple-macbook-pro-13.3-inch-2.7ghz-dual-core-i5', 1299.0000, 999.0000, '', 1, NULL, NULL, 999.0000, 'NBM59UY', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-14 23:40:48', '2022-03-03 02:19:43', NULL),
(11, 4, 1, 'asus-vivobook-15-inch-fhd-slate-gray', 496.0000, 456.0000, '', 1, NULL, NULL, 456.0000, 'KLB5UM', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-15 01:02:40', '2022-03-03 02:11:52', NULL),
(12, 6, 1, 'apple-macbook-pro-15.4-inch-laptop', 1355.0000, 1155.0000, '', 1, NULL, NULL, 1155.0000, 'ZR85UFA', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-15 02:31:06', '2022-03-03 02:08:04', NULL),
(13, 1, 1, 'element-27-inch-1080p-frameless-ips-lcd-pc-monitor', 159.0000, 269.0000, '', 1, NULL, NULL, 269.0000, 'BE875TET', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 01:42:46', '2022-03-03 02:04:07', NULL),
(14, 1, 1, 'jvc-70-inch-class-4k-uhd-2160p-roku-smart-tv', 697.0000, 767.0000, '', 1, NULL, NULL, 767.0000, 'JVC45VGWT', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 03:32:38', '2022-03-03 02:01:01', NULL),
(15, 7, 1, 'lg-43-inch-4k-ultra-hd-smart-led-tv-2020', 346.9900, 389.9900, '', 1, NULL, NULL, 389.9900, 'LG4MK74', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 03:45:01', '2022-03-03 01:55:05', NULL),
(16, NULL, 1, 'samsung-75-inc-class-4k-ultra-hd-hdr-smart-qled-tv', 3299.9900, 2799.9900, '', 1, NULL, NULL, 2799.9900, '75ANGUHD', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:08:00', '2022-03-03 01:38:56', NULL),
(17, 8, 1, 'sony-65-inc-class-4k-uhd-led-android-smart-tv-hdr-bravia', 1398.0000, 1498.0000, '', 1, NULL, NULL, 1498.0000, 'S6C4ULAS', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:13:27', '2022-03-03 01:27:28', NULL),
(18, NULL, 1, 'apple-mwp22am-a-airpods-pro', 189.9800, 149.9800, '', 1, NULL, NULL, 149.9800, 'B9EAVGRT', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:25:57', '2022-03-03 01:23:26', NULL),
(19, NULL, 1, 'beats-studio3-wireless-headphones-–-matte-black', 339.0000, 289.0000, '', 1, NULL, NULL, 289.0000, 'KE35VGET', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:32:39', '2022-03-19 03:14:36', NULL),
(20, NULL, 1, 'bose-quietcomfort-noise-cancelling-earbuds-–-black', 319.0000, 279.0000, '', 1, NULL, NULL, 279.0000, 'CIKO6AE', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:35:57', '2022-03-03 01:10:26', NULL),
(21, NULL, 1, 'bose-noise-cancelling-wireless-bluetooth', 479.0000, 439.0000, '', 1, NULL, NULL, 439.0000, 'RO5JK73', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:39:41', '2022-03-03 01:06:29', NULL),
(22, NULL, 1, 'google-pixel-buds,-clearly-white', 304.9500, 204.9500, '', 1, '1970-01-01', '1970-01-01', 204.9500, 'HM45UYA', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-20 04:42:50', '2022-03-03 00:14:31', NULL),
(23, NULL, 1, 'cubitt-smart-watch-ct2s-waterproof-fitness-tracker', 65.0000, 95.0000, '', 1, '1970-01-01', '1970-01-01', 95.0000, 'KM45VGRT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 00:19:37', '2022-03-03 00:10:16', NULL),
(24, NULL, 1, 'apple-watch-series-3-gps-–-42mm-–-sport-band', 299.0000, 249.0000, '', 1, '1970-01-01', '1970-01-01', 249.0000, 'EQA5VGRT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 00:25:42', '2022-03-03 00:03:47', NULL),
(25, 1, 1, 'স্যামসাং-গালাক্সি-অ্যালুমিনিয়াম', 249.9900, 229.9900, '', 1, '1970-01-01', '1970-01-01', 229.9900, 'CE45UGT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 00:41:30', '2022-03-02 08:49:24', NULL),
(26, 9, 1, 'Canon-EOS-বিদ্রোহী-ক্যামেরা-T7-EF-S-18-55mm-IS-II-কিট', 529.9900, 479.9900, '', 1, '1970-01-01', '1970-01-01', 479.9900, 'KMT5VET', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 01:10:55', '2022-03-02 08:46:36', NULL),
(27, 9, 1, 'Canon-SX740BK-পাওয়ারশট-SX740-HS-ডিজিটাল-ক্যামেরা', 499.9500, 399.9500, '', 1, '1970-01-01', '1970-01-01', 399.9500, 'BE9TGAV', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 01:18:44', '2022-03-02 08:43:22', NULL),
(28, 10, 1, 'ফুজিফিল্ম-16642939-X100V-ডিজিটাল-ক্যামেরা-–-সিলভার', 1699.0000, 1399.0000, '', 1, '1970-01-01', '1970-01-01', 1399.0000, 'BE459GRT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 01:24:21', '2022-03-02 08:40:53', NULL),
(29, NULL, 1, 'পুরুষদের-জন্য-প্রথম-নৃত্য-অতিরিক্ত-বড়-জুতা-নৈমিত্তিক-জুতা-ক্যামো-প্রিন্ট-বড়-আকারের-ফ্যাশন-স্নিকার-পুরুষদের-জন্য', 180.0000, 0.0000, '', 0, '1970-01-01', '1970-01-01', 0.0000, 'GDSFSDF', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 01:44:26', '2022-03-02 08:26:50', NULL),
(30, NULL, 1, 'COKAFIL-Zapatillas-de-correr-para-hombre-Zapatillas-de-tenis-atléticas-con-cuchilla-para-caminar-Zapatillas-de-deporte-de-moda', 550.0000, 0.0000, '', 0, '1970-01-01', '1970-01-01', 0.0000, '17998302', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 02:02:42', '2022-03-02 08:22:04', NULL),
(31, NULL, 1, 'ওয়ান্ডার-নেশন-টডলার-গার্লস-গ্লিটার-ক্যাজুয়াল-মেরি-জেন-স্নিকার্স', 2156.0000, 0.0000, '', 0, '1970-01-01', '1970-01-01', 0.0000, '45581026', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 02:10:24', '2022-03-02 08:19:20', NULL),
(32, NULL, 1, 'ড্রাগন-টাচ-ম্যাক্স-10-ট্যাবলেট-অ্যান্ড্রয়েড-10.0-ওএস', 189.9900, 129.9900, '', 1, '1970-01-01', '1970-01-01', 129.9900, 'ZR45VGRT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 02:33:31', '2022-03-02 08:14:51', NULL),
(33, NULL, 1, 'গারমিন-ভিভো-স্মার্ট-3-অ্যাক্টিভিটি-ট্র্যাকার---বড়', 49.9900, 39.9900, '', 1, '1970-01-01', '1970-01-01', 39.9900, 'BE458GET', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 02:58:36', '2022-03-02 08:09:58', NULL),
(34, NULL, 1, 'ইকো-ডট-(4th-Gen,-2020-রিলিজ)-|-স্মার্ট-স্পিকার', 49.9900, 69.0000, '', 1, '1970-01-01', '1970-01-01', 69.0000, 'SO4JK47', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 03:40:18', '2022-03-02 07:59:38', NULL),
(48, 1, 1, 'samsung-a12', 100.0000, 0.0000, '', 1, NULL, NULL, 0.0000, 'fdsfsge', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-03-10 02:08:25', '2022-03-27 11:56:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_value`
--

CREATE TABLE `product_attribute_value` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_value_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_medium` varchar(255) DEFAULT NULL,
  `image_small` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(142, 48, '/images/products/large/iIxqY3Q2O0.jpeg', '/images/products/medium/iIxqY3Q2O0.jpeg', '/images/products/small/iIxqY3Q2O0.jpeg', 'additional', NULL, NULL);

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
(6, 1);

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
  `short_description` longtext,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Apple iPhone 11 64GB Yellow Fully Unlocked', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\n\r\nKey Features:\r\n\r\n    slim body with metal cover\r\n    latest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n    8GB DDR4 RAM and fast 512GB PCIe SSD\r\n    NVIDIA GeForce MX350 2GB GDDR5 graphics card\r\n    backlit keyboard, touchpad with gesture support', NULL, NULL, '2022-02-13 00:46:06', '2022-02-13 00:46:06'),
(2, 2, 'en', 'Apple iPhone X 64GB Silver Fully Unlocked', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-13 01:26:25', '2022-02-13 01:26:25'),
(3, 3, 'en', 'Samsung Galaxy A52 5G Android Cell Phone', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-13 01:30:20', '2022-02-13 01:30:20'),
(4, 4, 'en', 'Apple iPhone 11 Pro Max (64GB) – Silver', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-13 01:36:03', '2022-02-13 01:36:03'),
(5, 5, 'en', 'OnePlus 8 Pro Onyx Black Android Smartphone', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-13 01:41:17', '2022-02-13 01:41:17'),
(6, 6, 'en', 'Apple iPhone XS Max-64GB -white', '<p>6.5-inch Super Retina display (OLED) with HDR IP68 dust and water resistant (maximum depth of 2 meters up to 30 minutes) 12MP dual cameras with dual OIS and 7MP TrueDepth front camera&mdash;Portrait mode, Portrait Lighting, Depth Control, and Smart HDR&nbsp;</p>', '6.5-inch Super Retina display (OLED) with HDR IP68 dust and water resistant (maximum depth of 2 meters up to 30 minutes) 12MP dual cameras with dual OIS and 7MP TrueDepth front camera—Portrait mode, Portrait Lighting, Depth Control, and Smart HDR', NULL, NULL, '2022-02-13 02:11:05', '2022-02-13 02:11:05'),
(7, 7, 'en', 'Samsung Galaxy Note 10', '<p>Fast-charging, long-lasting intelligent power and super speed processing outlast whatever you throw at Note 10+. S pen&rsquo;s newest Evolution gives you the power of air gestures, a remote shutter and playlist button and handwriting-to-text, all in One Magic wand. 6.8&rdquo; Nearly Bezel-less Infinity Display* Ultrasonic In-Display Fingerprint ID&nbsp;</p>', 'Fast-charging, long-lasting intelligent power and super speed processing outlast whatever you throw at Note 10+. S pen’s newest Evolution gives you the power of air gestures, a remote shutter and playlist button and handwriting-to-text, all in One Magic wand. 6.8” Nearly Bezel-less Infinity Display* Ultrasonic In-Display Fingerprint ID', NULL, NULL, '2022-02-13 02:18:25', '2022-02-13 02:18:25'),
(8, 8, 'en', 'ASUS VivoBook 15 Thin and Light Laptop 15.6 inch FHD Display', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games. Key Features: slim body with metal cover latest Intel Core i5-1135G7 processor (4 cores / 8 threads) 8GB DDR4 RAM and fast 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</p>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-14 05:36:08', '2022-02-14 05:36:08'),
(9, 9, 'en', 'ASUS VivoBook 17.3″ i5 8GB_1TB 17.3″ FHD Display', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-14 06:04:57', '2022-02-14 06:04:57'),
(10, 10, 'en', 'Apple Macbook Pro 13.3-inch 2.7Ghz Dual Core i5', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-14 23:40:48', '2022-02-14 23:40:48'),
(11, 11, 'en', 'ASUS VivoBook 15 inch FHD Slate Gray', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-15 01:02:40', '2022-02-15 01:02:40'),
(12, 12, 'en', 'Apple Macbook Pro 15.4 inch Laptop', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-15 02:31:06', '2022-02-15 02:31:06'),
(13, 13, 'en', 'Element 27 inch 1080p Frameless IPS LCD PC Monitor', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 01:42:46', '2022-02-20 01:42:46'),
(14, 14, 'en', 'JVC 70 inch Class 4K UHD 2160p Roku Smart TV', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support.\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 03:32:38', '2022-02-20 03:32:38'),
(15, 15, 'en', 'LG 43 inch 4K Ultra HD Smart LED TV 2020', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 03:45:01', '2022-02-20 03:45:01'),
(16, 16, 'en', 'SAMSUNG 75 inc Class 4K Ultra HD HDR Smart QLED TV', '&lt;p&gt;The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.&lt;/p&gt; &lt;p&gt;Key Features:&lt;/p&gt; &lt;ul&gt; &lt;li&gt;slim body with metal cover&lt;/li&gt; &lt;li&gt;latest Intel Core i5-1135G7 processor (4 cores / 8 threads)&lt;/li&gt; &lt;li&gt;8GB DDR4 RAM and fast 512GB PCIe SSD&lt;/li&gt; &lt;li&gt;NVIDIA GeForce MX350 2GB GDDR5 graphics card&lt;/li&gt; &lt;li&gt;backlit keyboard, touchpad with gesture support&lt;/li&gt; &lt;/ul&gt;', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:08:00', '2022-02-20 04:08:00'),
(17, 17, 'en', 'Sony 65 inc Class 4K UHD LED Android Smart TV HDR BRAVIA', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:13:27', '2022-02-20 04:13:27'),
(18, 18, 'en', 'Apple MWP22AM-A AirPods Pro', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:25:57', '2022-02-20 04:25:57'),
(19, 19, 'en', 'Beats Studio3 Wireless Headphones – Matte Black', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:32:39', '2022-02-20 04:32:39'),
(20, 20, 'en', 'Bose QuietComfort Noise Cancelling Earbuds – Black', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:35:57', '2022-02-20 04:35:57'),
(21, 21, 'en', 'Bose Noise Cancelling Wireless Bluetooth', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:39:41', '2022-02-20 04:39:41'),
(22, 22, 'en', 'Google Pixel Buds, Clearly White', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:42:50', '2022-02-20 04:42:50'),
(23, 23, 'en', 'Cubitt Smart Watch CT2S Waterproof Fitness Tracker', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 00:19:37', '2022-02-22 00:19:37'),
(24, 24, 'en', 'Apple Watch Series 3 GPS – 42mm – Sport Band', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 00:25:42', '2022-02-22 00:25:42'),
(25, 25, 'en', 'SAMSUNG Galaxy Watch Active 2 Aluminum', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 00:41:30', '2022-02-22 00:41:30'),
(26, 26, 'en', 'Canon EOS Rebel Camera T7 EF-S 18-55mm IS II Kit', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 01:10:55', '2022-02-22 01:10:55'),
(27, 27, 'en', 'Canon SX740BK PowerShot SX740 HS Digital Camera', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 01:18:44', '2022-02-22 01:18:44'),
(28, 28, 'en', 'Fujifilm 16642939 X100V Digital Camera – Silver', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 01:24:22', '2022-02-22 01:24:22'),
(29, 29, 'en', 'FIRST DANCE Extra Large Shoes for Men Casual Shoes Camo Print Big Size Fashion Sneakers for Man', '&lt;ul class=\"p-4 f\"&gt; &lt;li&gt;Ethylene Vinyl Acetate sole&lt;/li&gt; &lt;li&gt;Extra big size shoes for men, size from 12 to 15.&lt;/li&gt; &lt;li&gt;Good quality PU upper with camo print, suitable for autumn and winter&lt;/li&gt; &lt;li&gt;Lightweight EVA outsole, very comfortable to wear.&lt;/li&gt; &lt;li&gt;Classic lace up styles, easy to handle.&lt;/li&gt; &lt;li&gt;If you have troubles finding the right big size shoes for you, you should try ours.&lt;/li&gt; &lt;/ul&gt;', 'FIRST DANCE Extra Large Shoes for Men Casual Shoes Camo Print Big Size Fashion Sneakers for Man', NULL, NULL, '2022-02-22 01:44:26', '2022-02-22 01:44:26'),
(30, 30, 'en', 'COKAFIL Mens Running Shoes Athletic Walking Blade Tennis Shoes Fashion Sneakers', '\r\nMesh Fabric\r\nRubber sole\r\nSlip-on closure type easy put on &amp; off，simple and stylish color scheme,looking for beauty in simple life\r\nFashion mesh upper design,keeps the feet dry and breathable, makes you fell comfortable while exercising\r\nBreathing Insole - The interior of the shoe is designed with a honeycomb hole to absorb sweat and deodorize, allowing your feet to breathe freely\r\nBlade Sneakers - The sole is made of Hollow Carved technology , providing stable support and optimal shock absorption for sports\r\nHow To Define - Designed for walking comfortably and casual wear, but not really meant to be worn while doing a hard-core workout or High-intensity exercise\r\n', 'COKAFIL Mens Running Shoes Athletic Walking Blade Tennis Shoes Fashion Sneakers', NULL, NULL, '2022-02-22 02:02:42', '2022-02-22 02:02:42'),
(31, 31, 'en', 'Wonder Nation Toddler Girls Glitter Casual Mary-Jane Sneakers', '\r\n\r\n\r\n\r\nColor\r\nPink\r\n\r\n\r\nBrand\r\nWonder Nation\r\n\r\n\r\nGender\r\nFemale\r\n\r\n\r\nManufacturer Part Number\r\nGTWN41CA001\r\n\r\n\r\nAge Group\r\nToddler\r\n\r\n\r\nMaterial\r\nUPPER:PU+ POLYESTER;OUTSOLE:TPR+POLYESTER\r\n\r\n\r\n\r\n\r\n&nbsp;\r\n\r\nVintage style meets modern flare with this Casual Mary Jane Sneaker from Wonder Nation. Featuring a durable canvas upper and sturdy outsole, with a stay-put strap to ensure a snug fit. The Mary Jane sneaker is great for all day wear with any outfit!\r\n\r\n&nbsp;', 'Material: Upper: Polyurethane/Polyester; Outsole: Thermoplastic Rubber/Polyester\r\n    Care: Wipe clean\r\n    Country of Origin: Imported\r\n    Closure: Slip on style for easy on and off; stay put strap\r\n    Features: Lightweight and durable; glitter accents; flower embellishment \r\n    Mary Jane Shoes for Girls from Wonder Nation', NULL, NULL, '2022-02-22 02:10:24', '2022-02-22 02:10:24'),
(32, 32, 'en', 'Dragon Touch Max10 Tablet Android 10.0 OS', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 02:33:31', '2022-02-22 02:33:31'),
(33, 33, 'en', 'Garmin Vivo smart 3 Activity Tracker – Large', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 02:58:36', '2022-02-22 02:58:36'),
(34, 34, 'en', 'Echo Dot (4th Gen, 2020 release) | Smart speaker', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 03:40:18', '2022-02-22 03:40:18'),
(35, 34, 'de', 'Echo Dot (4. Generation, Version 2020) | Intelligenter Lautsprecher', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(36, 34, 'es', 'Echo Dot (4.ª generación, versión 2020) | Altavoz inteligente', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(37, 34, 'bn', 'ইকো ডট (4th Gen, 2020 রিলিজ) | স্মার্ট স্পিকার', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(38, 33, 'de', 'Garmin Vivo Smart 3 Activity Tracker – Groß', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet', NULL, NULL, NULL, NULL),
(39, 33, 'es', 'Rastreador de actividad Garmin Vivo smart 3 - Grande', ' La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(40, 33, 'bn', 'গারমিন ভিভো স্মার্ট 3 অ্যাক্টিভিটি ট্র্যাকার - বড়', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপ সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত', NULL, NULL, NULL, NULL),
(41, 32, 'de', 'Dragon Touch Max10-Tablet mit Android 10.0-Betriebssystem', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(42, 32, 'es', 'Tableta Dragon Touch Max10 con sistema operativo Android 10.0', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(43, 32, 'bn', 'ড্রাগন টাচ ম্যাক্স 10 ট্যাবলেট অ্যান্ড্রয়েড 10.0 ওএস', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(44, 31, 'de', 'Wonder Nation Kleinkind Mädchen Glitter Casual Mary-Jane Turnschuhe', 'Farbe Pink Marke Wonder Nation Geschlecht Weiblich Hersteller-Teilenummer GTWN41CA001 Altersgruppe Kleinkind Material OBERMATERIAL:PU+ POLYESTER;LAUFSOHLE:TPR+POLYESTER Mit diesem l&auml;ssigen Mary Jane Sneaker von Wonder Nation trifft Vintage-Stil auf modernes Flair. Ausgestattet mit einem strapazierf&auml;higen Canvas-Obermaterial und einer robusten Au&szlig;ensohle mit einem Halteriemen, um eine bequeme Passform zu gew&auml;hrleisten. Der Mary Jane Sneaker ist toll f&uuml;r den ganzen Tag mit jedem Outfit!', 'Material: Obermaterial: Polyurethan/Polyester; Laufsohle: Thermoplastischer Gummi/Polyester\r\nPflege: Abwischen\r\nHerkunftsland: Importiert\r\nVerschluss: Stil zum Hineinschlüpfen für einfaches An- und Ausziehen; Bleiben Sie an Ort und Stelle\r\nEigenschaften: Leicht und langlebig; Glitzerakzente; Blumenverzierung\r\n  Mary Jane Schuhe für Mädchen von Wonder Nation', NULL, NULL, NULL, NULL),
(45, 31, 'es', 'Wonder Nation - Zapatillas deportivas Mary-Jane informales con purpurina para niñas pequeñas', ' Color rosa Marca Wonder Nation G&eacute;nero femenino N&uacute;mero de pieza del fabricante GTWN41CA001 Grupo de edad Ni&ntilde;o peque&ntilde;o Material SUPERIOR:PU+ POLIESTER;SUELA:TPR+POLYESTER El estilo vintage se combina con el estilo moderno con esta zapatilla casual Mary Jane de Wonder Nation. Con una parte superior de lona duradera y una suela exterior resistente, con una correa que se mantiene en su lugar para garantizar un ajuste ce&ntilde;ido. &iexcl;La zapatilla Mary Jane es ideal para usar todo el d&iacute;a con cualquier atuendo!', 'Material: Empeine: Poliuretano/Poliéster; Suela: Goma Termoplástica/Poliéster\r\nCuidado: Limpiar\r\nPaís de origen: Importado\r\nCierre: estilo deslizable para poner y quitar fácilmente; quédate en la correa\r\nCaracterísticas: Ligero y duradero; acentos de purpurina; adorno de flores\r\n  Zapatos Mary Jane para niñas de Wonder Nation', NULL, NULL, NULL, NULL),
(46, 31, 'bn', 'ওয়ান্ডার নেশন টডলার গার্লস গ্লিটার ক্যাজুয়াল মেরি-জেন স্নিকার্স', 'রঙ গোলাপি ব্র্যান্ড ওয়ান্ডার নেশন লিঙ্গ মহিলা প্রস্তুতকারকের অংশ নম্বর GTWN41CA001 বয়স গ্রুপ টডলার উপাদান উপরের:পিইউ+পলিয়েস্টার;আউটসোল:টিপিআর+পলিয়েস্টার ওয়ান্ডার নেশনের এই নৈমিত্তিক মেরি জেন স্নিকারের সাথে ভিনটেজ শৈলী আধুনিক ফ্লেয়ারের সাথে মিলিত হয়। একটি টেকসই ক্যানভাস উপরের এবং বলিষ্ঠ আউটসোল বৈশিষ্ট্যযুক্ত, একটি স্নাগ ফিট নিশ্চিত করার জন্য একটি স্টে-পুট স্ট্র্যাপ সহ। মেরি জেন স্নিকার যে কোনও পোশাকের সাথে সারাদিন পরার জন্য দুর্দান্ত!', 'উপাদান: উপরের: পলিউরেথেন/পলিয়েস্টার; আউটসোল: থার্মোপ্লাস্টিক রাবার/পলিয়েস্টার\r\nযত্ন: পরিষ্কার মুছা\r\nউৎপত্তি দেশ: আমদানি করা\r\nবন্ধ: সহজে চালু এবং বন্ধ করার জন্য স্লিপ অন স্টাইল; চাবুক রাখা\r\nবৈশিষ্ট্য: লাইটওয়েট এবং টেকসই; চকচকে উচ্চারণ; ফুলের শোভা\r\n  ওয়ান্ডার নেশনের মেয়েদের জন্য মেরি জেন জুতা', NULL, NULL, NULL, NULL),
(47, 30, 'bn', 'কোকাফিল পুরুষদের রানিং জুতা অ্যাথলেটিক ওয়াকিং ব্লেড টেনিস জুতা ফ্যাশন স্নিকার্স', '\r\nফ্যাব্রিক জাল রাবার সোল স্লিপ-অন ক্লোজার টাইপ সহজ চালু এবং বন্ধ করা, সহজ এবং আড়ম্বরপূর্ণ রঙের স্কিম, সাধারণ জীবনে সৌন্দর্য খুঁজছেন ফ্যাশন জাল উপরের নকশা, পা শুষ্ক এবং নিঃশ্বাসযোগ্য রাখে, ব্যায়াম করার সময় আপনাকে আরামদায়ক করে তোলে শ্বাস নেওয়ার ইনসোল - জুতার অভ্যন্তরটি ঘাম শোষণ এবং দুর্গন্ধযুক্ত করার জন্য একটি মধুচক্রের ছিদ্র দিয়ে ডিজাইন করা হয়েছে, যাতে আপনার পা অবাধে শ্বাস নিতে পারে। ব্লেড স্নিকার্স - একমাত্র ফাঁপা খোদাই প্রযুক্তি দিয়ে তৈরি, স্থিতিশীল সমর্থন এবং খেলাধুলার জন্য সর্বোত্তম শক শোষণ প্রদান করে কীভাবে সংজ্ঞায়িত করবেন - আরামদায়ক হাঁটা এবং নৈমিত্তিক পরিধানের জন্য ডিজাইন করা হয়েছে, তবে হার্ড-কোর ওয়ার্কআউট বা উচ্চ-তীব্রতা ব্যায়াম করার সময় পরিধান করা উচিত নয়\r\n', 'কোকাফিল পুরুষদের রানিং জুতা অ্যাথলেটিক ওয়াকিং ব্লেড টেনিস জুতা ফ্যাশন স্নিকার্স', NULL, NULL, NULL, NULL),
(48, 30, 'de', 'COKAFIL Herren Laufschuhe Athletic Walking Blade Tennisschuhe Fashion Sneakers', 'Mesh-Gewebe Gummisohle Aufsteckverschluss, einfach an- und auszuziehen, einfaches und stilvolles Farbschema, auf der Suche nach Sch&ouml;nheit im einfachen Leben Das modische Mesh-Obermaterial h&auml;lt die F&uuml;&szlig;e trocken und atmungsaktiv und sorgt daf&uuml;r, dass Sie sich beim Training wohl f&uuml;hlen Atmungsaktive Einlegesohle - Das Innere des Schuhs ist mit einem Wabenloch ausgestattet, um Schwei&szlig; zu absorbieren und zu desodorieren, sodass Ihre F&uuml;&szlig;e frei atmen k&ouml;nnen Blade Sneakers - Die Sohle besteht aus Hollow Carved-Technologie und bietet stabilen Halt und optimale Sto&szlig;d&auml;mpfung beim Sport Wie zu definieren - Entworfen f&uuml;r bequemes Gehen und Freizeitkleidung, aber nicht wirklich dazu gedacht, w&auml;hrend eines harten Trainings oder hochintensiven Trainings getragen zu werden', 'COKAFIL Herren Laufschuhe Athletic Walking Blade Tennisschuhe Fashion Sneakers', NULL, NULL, NULL, NULL),
(49, 30, 'es', 'COKAFIL Zapatillas de correr para hombre Zapatillas de tenis atléticas con cuchilla para caminar Zapatillas de deporte de moda', ' tela de malla Suela de goma Tipo de cierre deslizante f&aacute;cil de poner y quitar, esquema de color simple y elegante, buscando belleza en la vida simple Dise&ntilde;o superior de malla de moda, mantiene los pies secos y transpirables, te hace sentir c&oacute;modo mientras haces ejercicio. Plantilla de respiraci&oacute;n: el interior del zapato est&aacute; dise&ntilde;ado con un orificio de panal para absorber el sudor y desodorizar, lo que permite que sus pies respiren libremente Zapatillas Blade: la suela est&aacute; hecha de tecnolog&iacute;a Hollow Carved, que brinda un soporte estable y una absorci&oacute;n de impactos &oacute;ptima para los deportes C&oacute;mo definirlo: dise&ntilde;ado para caminar c&oacute;modamente y con ropa informal, pero en realidad no est&aacute; dise&ntilde;ado para usarse mientras se hace un entrenamiento intenso o un ejercicio de alta intensidad.', 'tela de malla\r\nSuela de goma\r\nTipo de cierre deslizante fácil de poner y quitar, esquema de color simple y elegante, buscando belleza en la vida simple\r\nDiseño superior de malla de moda, mantiene los pies secos y transpirables, te hace sentir cómodo mientras haces ejercicio.\r\nPlantilla de respiración: el interior del zapato está diseñado con un orificio de panal para absorber el sudor y desodorizar, lo que permite que sus pies respiren libremente\r\nZapatillas Blade: la suela está hecha de tecnología Hollow Carved, que brinda un soporte estable y una absorción de impactos óptima para los deportes\r\nCómo definirlo: diseñado para caminar cómodamente y con ropa informal, pero en realidad no está diseñado para usarse mientras se hace un entrenamiento intenso o un ejercicio de alta intensidad.', NULL, NULL, NULL, NULL),
(50, 29, 'de', 'FIRST DANCE Extra große Schuhe für Herren Freizeitschuhe Camo Print Big Size Fashion Sneakers für Herren', 'Sohle aus Ethylen-Vinylacetat Schuhe in extra gro&szlig;en Gr&ouml;&szlig;en f&uuml;r M&auml;nner, Gr&ouml;&szlig;e von 12 bis 15. Hochwertiges PU-Obermaterial mit Camo-Print, geeignet f&uuml;r Herbst und Winter Leichte EVA-Laufsohle, sehr angenehm zu tragen. Klassische Schn&uuml;rung, einfach zu handhaben. Wenn Sie Probleme haben, die richtigen gro&szlig;en Schuhe f&uuml;r Sie zu finden, sollten Sie unsere ausprobieren.', 'FIRST DANCE Extra große Schuhe für Herren Freizeitschuhe Camo Print Big Size Fashion Sneakers für Herren', NULL, NULL, NULL, NULL),
(51, 29, 'es', 'PRIMERA DANZA Zapatos extra grandes para hombres Zapatos casuales Estampado de camuflaje Zapatillas de deporte de moda de gran tamaño para hombre', 'Suela de Etileno Acetato de Vinilo Zapatos de hombre talla extra grande, talla de la 12 a la 15. Parte superior de PU de buena calidad con estampado de camuflaje, adecuado para oto&ntilde;o e invierno Suela de EVA ligera, muy c&oacute;moda de llevar. Estilos cl&aacute;sicos con cordones, f&aacute;ciles de manejar. Si tiene problemas para encontrar los zapatos de talla grande adecuados para usted, deber&iacute;a probar los nuestros', 'Suela de Etileno Acetato de Vinilo\r\nZapatos de hombre talla extra grande, talla de la 12 a la 15.\r\nParte superior de PU de buena calidad con estampado de camuflaje, adecuado para otoño e invierno\r\nSuela de EVA ligera, muy cómoda de llevar.\r\nEstilos clásicos con cordones, fáciles de manejar.\r\nSi tiene problemas para encontrar los zapatos de talla grande adecuados para usted, debería probar los nuestros', NULL, NULL, NULL, NULL),
(52, 29, 'bn', 'পুরুষদের জন্য প্রথম নৃত্য অতিরিক্ত বড় জুতা নৈমিত্তিক জুতা ক্যামো প্রিন্ট বড় আকারের ফ্যাশন স্নিকার পুরুষদের জন্য', ' ইথিলিন ভিনাইল অ্যাসিটেট একমাত্র পুরুষদের জন্য অতিরিক্ত বড় সাইজের জুতা, 12 থেকে 15 পর্যন্ত সাইজ। ক্যামো প্রিন্ট সহ ভাল মানের PU উপরের, শরৎ এবং শীতের জন্য উপযুক্ত লাইটওয়েট ইভা আউটসোল, পরতে খুব আরামদায়ক। ক্লাসিক লেস আপ শৈলী, পরিচালনা করা সহজ। আপনার জন্য সঠিক বড় আকারের জুতা খুঁজে পেতে সমস্যা হলে, আমাদের চেষ্টা করা উচিত।', 'ইথিলিন ভিনাইল অ্যাসিটেট একমাত্র\r\nপুরুষদের জন্য অতিরিক্ত বড় সাইজের জুতা, 12 থেকে 15 পর্যন্ত সাইজ।\r\nক্যামো প্রিন্ট সহ ভাল মানের PU উপরের, শরৎ এবং শীতের জন্য উপযুক্ত\r\nলাইটওয়েট ইভা আউটসোল, পরতে খুব আরামদায়ক।\r\nক্লাসিক লেস আপ শৈলী, পরিচালনা করা সহজ।\r\nআপনার জন্য সঠিক বড় আকারের জুতা খুঁজে পেতে সমস্যা হলে, আমাদের চেষ্টা করা উচিত।', NULL, NULL, NULL, NULL);
INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(53, 28, 'de', 'Fujifilm 16642939 X100V Digitalkamera – Silber', ' Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(54, 28, 'es', 'Cámara digital Fujifilm 16642939 X100V - Plata', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(55, 28, 'bn', 'ফুজিফিল্ম 16642939 X100V ডিজিটাল ক্যামেরা – সিলভার', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড ', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(56, 27, 'de', 'Cámara digital Canon SX740BK PowerShot SX740 HS', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(57, 27, 'bn', 'Canon SX740BK পাওয়ারশট SX740 HS ডিজিটাল ক্যামেরা', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(58, 26, 'de', 'Canon EOS Rebel Camera T7 EF-S 18–55 mm IS II Kit', ' Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(59, 26, 'es', 'Kit de cámara Canon EOS Rebel T7 EF-S 18-55 mm IS II', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(60, 26, 'bn', 'Canon EOS বিদ্রোহী ক্যামেরা T7 EF-S 18-55mm IS II কিট', ' Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(61, 25, 'de', 'SAMSUNG Galaxy Watch Active 2 Aluminium', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(62, 25, 'es', 'SAMSUNG Galaxy Watch Active 2 Aluminio', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(63, 25, 'bn', 'স্যামসাং গালাক্সি অ্যালুমিনিয়াম', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(64, 24, 'de', 'Apple Watch Series 3 GPS – 42 mm – Sportarmband', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(65, 24, 'es', 'Apple Watch Serie 3 GPS – 42 mm – Brazalete deportivo', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(66, 24, 'bn', 'অ্যাপল ওয়াচ সিরিজ 3 জিপিএস - 42 মিমি - স্পোর্টর্মব্যান্ড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(67, 23, 'de', 'Cubitt Smart Watch CT2S Wasserdichter Fitness-Tracker', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung ', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(68, 23, 'es', 'Reloj inteligente Cubitt CT2S Rastreador de ejercicios a prueba de agua', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(69, 23, 'bn', 'কিউবিট স্মার্ট ওয়াচ CT2S ওয়াটারপ্রুফ ফিটনেস ট্র্যাকার', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(70, 22, 'de', 'Google Pixel Buds, klar weiß', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(71, 22, 'es', 'Google Pixel Buds, claramente blanco', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(72, 22, 'bn', 'গুগল পিক্সেল বাডস, পরিষ্কারভাবে সাদা', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(73, 35, 'en', 'fsdfsdfwfewf', 'fsdsfdfwerew', 'dfdsfdfds', NULL, NULL, '2022-03-03 00:27:22', '2022-03-03 00:27:22'),
(74, 36, 'en', 'mhmghjhjghj', 'yiuyiuyghjv', 'gjhgjghjgj', NULL, NULL, '2022-03-03 00:40:09', '2022-03-03 00:40:09'),
(75, 37, 'en', 'irfan chy', 'fsdfdsfdsfs', 'fffdgdgf', NULL, NULL, '2022-03-03 00:55:25', '2022-03-03 00:55:25'),
(76, 21, 'de', 'Drahtloses Bluetooth mit Bose-Noise-Cancelling', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(77, 21, 'es', 'Bluetooth inalámbrico con cancelación de ruido de Bose', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(78, 21, 'bn', 'বোস নয়েজ ক্যানসেলিং ওয়্যারলেস ব্লুটুথ', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(79, 20, 'de', 'Bose QuietComfort Noise Cancelling Earbuds – Schwarz', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(80, 20, 'es', 'Auriculares con cancelación de ruido Bose QuietComfort - Negro', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(81, 20, 'bn', 'বস কোয়াইট কম্ফপোর্ট নয়েজ ক্যানসেলিং ইয়ারবাডস – কালো', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(82, 19, 'de', 'Beats Studio3 Wireless Kopfhörer – Mattschwarz', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(83, 19, 'es', 'Auriculares inalámbricos Beats Studio3 - Negro mate', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos ', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(84, 19, 'bn', 'বিটস স্টুডিও 3 ওয়্যারলেস হেডফোন - ম্যাট ব্ল্যাক', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(85, 18, 'de', 'Apple MWP22AM-A AirPods Pro vvv', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos ', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(86, 18, 'es', 'Apple MWP22AM-A AirPods ProT', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, NULL, NULL),
(87, 18, 'bn', 'এপেল MWP22AM-A এয়ারপ্রডস প্রো', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(88, 17, 'de', 'Sony 65 Inc Klasse 4K UHD LED Android Smart TV HDR BRAVIA', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(89, 17, 'es', 'Sony 65 inc Clase 4K UHD LED Android Smart TV HDR BRAVIA', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(90, 17, 'bn', 'সনি ৬৫ ইঞ্চি ক্লাস ৪কে ইউএহডি এন্ড্রয়েড স্মার্ট টিভি এইচডিয়ার', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(91, 16, 'de', 'SAMSUNG 75 Inc Klasse 4K Ultra HD HDR Smart QLED-Fernseher', ' Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(92, 16, 'es', 'Televisor SAMSUNG 75 con Clase 4K Ultra HD HDR Smart QLED', ' La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos ', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(93, 16, 'bn', 'স্যামসাং গায়ালাক্সি ৪কে এলিডি', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(94, 15, 'de', 'LG 43 Zoll 4K Ultra HD Smart LED-Fernseher 2020', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(95, 15, 'es', 'LG 43 pulgadas 4K Ultra HD Smart LED TV 2020', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos ', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(96, 15, 'bn', 'LG 43 ইঞ্চি 4K আল্ট্রা এইচডি স্মার্ট এলইডি টিভি 2020', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(97, 14, 'de', 'JVC 70 Zoll Klasse 4K UHD 2160p Roku Smart TV', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung. ', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(98, 14, 'es', 'JVC 70 pulgadas Clase 4K UHD 2160p Roku Smart TV', ' La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos.', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(99, 14, 'bn', 'JVC 70 ইঞ্চি ক্লাস 4K UHD 2160p Roku স্মার্ট টিভি', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড।', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(100, 13, 'de', 'Element 27 Zoll 1080p rahmenloser IPS-LCD-PC-Monitor', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(101, 13, 'es', 'Monitor de PC LCD IPS sin marco Element de 27 pulgadas y 1080p', ' La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(102, 13, 'bn', 'এলিমেন্ট 27 ইঞ্চি 1080p ফ্রেমলেস আইপিএস এলসিডি পিসি মনিটর', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(103, 12, 'de', 'Apple MacBook Pro 15,4 Zoll Laptop', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL);
INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(104, 12, 'es', 'Portátil Apple Macbook Pro de 15,4 pulgadas', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(105, 12, 'bn', 'অ্যাপল ম্যাকবুক প্রো 15.4 ইঞ্চি ল্যাপটপ', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(106, 11, 'de', 'ASUS VivoBook 15 Zoll FHD Schiefergrau', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(107, 11, 'es', 'ASUS VivoBook 15 pulgadas FHD Gris pizarra', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos ', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(108, 11, 'bn', 'আসোস বিবুক ১৫ ইঞ্চি এফএচডি স্লেট গ্রে', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(109, 10, 'de', 'Apple Macbook Pro 13,3 Zoll 2,7 GHz Dual Core i5', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung ', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(110, 10, 'es', 'Apple Macbook Pro 13.3 pulgadas 2.7Ghz Dual Core i5', ' La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(111, 10, 'bn', 'এপ মেক বুক প্রো ১৩.৩-ইঞ্চি ২.৭Ghz ডুয়াল কোর i5', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি', NULL, NULL, NULL, NULL),
(112, 9, 'de', 'ASUS VivoBook 17,3″ i5 8GB_1TB 17,3″ FHD-Display', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(113, 9, 'es', 'ASUS VivoBook 17.3″ i5 8GB_1TB 17.3″ Pantalla FHD', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(114, 9, 'bn', 'আসোস বিবুক ১৭.৩″ i5 ৮জিবি_১টিবি ১৭.৩″ এফেইচডি ডিসপ্লে', ' Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(115, 8, 'de', 'ASUS VivoBook 15 Dünner und leichter Laptop mit 15,6-Zoll-FHD-Display', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(116, 8, 'es', 'ASUS VivoBook 15 Laptop delgada y liviana Pantalla FHD de 15.6 pulgadas', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos ', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(117, 8, 'bn', 'আসোস বিবুক ১৫ পাতলা এবং হালকা ল্যাপটপ 15.6 ইঞ্চি FHD ডিসপ্লে', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(118, 7, 'de', 'Samsung Galaxy Note 10 German', 'Fast-charging, long-lasting intelligent power and super speed processing outlast whatever you throw at Note 10+. S pen&rsquo;s newest Evolution gives you the power of air gestures, a remote shutter and playlist button and handwriting-to-text, all in One Magic wand. 6.8&rdquo; Nearly Bezel-less Infinity Display* Ultrasonic In-Display Fingerprint ID&nbsp;', 'Fast-charging, long-lasting intelligent power and super speed processing outlast whatever you throw at Note 10+. S pen’s newest Evolution gives you the power of air gestures, a remote shutter and playlist button and handwriting-to-text, all in One Magic wand. 6.8” Nearly Bezel-less Infinity Display* Ultrasonic In-Display Fingerprint ID', NULL, NULL, NULL, NULL),
(119, 7, 'es', 'Samsung Galaxy nota 10', 'La carga r&aacute;pida, la potencia inteligente de larga duraci&oacute;n y el procesamiento de s&uacute;per velocidad duran m&aacute;s que lo que arrojas en Note 10+. El Evolution m&aacute;s nuevo de S pen le brinda el poder de los gestos a&eacute;reos, un obturador remoto y un bot&oacute;n de lista de reproducci&oacute;n y escritura a mano en texto, todo en una varita m&aacute;gica. Pantalla Infinity de 6.8&rdquo; casi sin bisel* Identificaci&oacute;n ultras&oacute;nica de huellas dactilares en pantalla ', 'La carga rápida, la potencia inteligente de larga duración y el procesamiento de súper velocidad duran más que lo que arrojas en Note 10+. El Evolution más nuevo de S pen le brinda el poder de los gestos aéreos, un obturador remoto y un botón de lista de reproducción y escritura a mano en texto, todo en una varita mágica. Pantalla Infinity de 6.8” casi sin bisel* Identificación ultrasónica de huellas dactilares en pantalla', NULL, NULL, NULL, NULL),
(120, 7, 'bn', 'স্যামসাং গ্যালাক্সি নোট ১০', 'দ্রুত-চার্জিং, দীর্ঘস্থায়ী বুদ্ধিমান শক্তি এবং সুপার স্পিড প্রসেসিং আপনি নোট 10+ এ যা কিছু ফেলুন তা ছাড়িয়ে যায়। এস পেনের নতুন বিবর্তন আপনাকে বায়ু অঙ্গভঙ্গির শক্তি, একটি দূরবর্তী শাটার এবং প্লেলিস্ট বোতাম এবং হস্তাক্ষর থেকে পাঠ্য, সবই এক জাদুর কাঠিতে দেয়৷ 6.8\" প্রায় বেজেল-লেস ইনফিনিটি ডিসপ্লে* আল্ট্রাসনিক ইন-ডিসপ্লে ফিঙ্গারপ্রিন্ট আইডি', 'দ্রুত-চার্জিং, দীর্ঘস্থায়ী বুদ্ধিমান শক্তি এবং সুপার স্পিড প্রসেসিং আপনি নোট 10+ এ যা কিছু ফেলুন তা ছাড়িয়ে যায়। এস পেনের নতুন বিবর্তন আপনাকে বায়ু অঙ্গভঙ্গির শক্তি, একটি দূরবর্তী শাটার এবং প্লেলিস্ট বোতাম এবং হস্তাক্ষর থেকে পাঠ্য, সবই এক জাদুর কাঠিতে দেয়৷ 6.8&amp;quot; প্রায় বেজেল-লেস ইনফিনিটি ডিসপ্লে* আল্ট্রাসনিক ইন-ডিসপ্লে ফিঙ্গারপ্রিন্ট আই', NULL, NULL, NULL, NULL),
(121, 6, 'de', 'Apple iPhone XS Max-64GB -weiß', '6,5-Zoll-Super-Retina-Display (OLED) mit HDR IP68 staub- und wasserfest (maximale Tiefe von 2 Metern bis zu 30 Minuten) 12-MP-Dual-Kameras mit dualem OIS und 7-MP-TrueDepth-Frontkamera &ndash; Portr&auml;tmodus, Portr&auml;tbeleuchtung, Tiefensteuerung und Smart HDR', '6,5-Zoll-Super-Retina-Display (OLED) mit HDR IP68 staub- und wasserfest (maximale Tiefe von 2 Metern bis zu 30 Minuten) 12-MP-Dual-Kameras mit dualem OIS und 7-MP-TrueDepth-Frontkamera – Porträtmodus, Porträtbeleuchtung, Tiefensteuerung und Smart HDR', NULL, NULL, NULL, NULL),
(122, 6, 'es', 'Apple iPhone XS Max-64 GB -blanco', 'Pantalla Super Retina (OLED) de 6,5 pulgadas con HDR IP68 resistente al polvo y al agua (profundidad m&aacute;xima de 2 metros hasta 30 minutos) C&aacute;maras duales de 12 MP con OIS dual y c&aacute;mara frontal TrueDepth de 7 MP: modo retrato, iluminaci&oacute;n de retrato, control de profundidad y Smart HDR', 'Pantalla Super Retina (OLED) de 6,5 pulgadas con HDR IP68 resistente al polvo y al agua (profundidad máxima de 2 metros hasta 30 minutos) Cámaras duales de 12 MP con OIS dual y cámara frontal TrueDepth de 7 MP: modo retrato, iluminación de retrato, control de profundidad y Smart HDR', NULL, NULL, NULL, NULL),
(123, 6, 'bn', 'সাদা এপেল আইফোন এক্সেস ম্যাক্স-৬৪জিবি', '6.5-ইঞ্চি সুপার রেটিনা ডিসপ্লে (OLED) HDR IP68 ধুলো এবং জল প্রতিরোধী (সর্বোচ্চ 2 মিটার গভীরতা 30 মিনিট পর্যন্ত) 12MP ডুয়াল ক্যামেরা সঙ্গে ডুয়াল OIS এবং 7MP TrueDepth ফ্রন্ট ক্যামেরা&mdash;পোর্ট্রেট মোড, পোর্ট্রেট আলো, গভীরতা নিয়ন্ত্রণ, এবং স্মার্ট এইচডিআর', '6.5-ইঞ্চি সুপার রেটিনা ডিসপ্লে (OLED) HDR IP68 ধুলো এবং জল প্রতিরোধী (সর্বোচ্চ 2 মিটার গভীরতা 30 মিনিট পর্যন্ত) 12MP ডুয়াল ক্যামেরা সঙ্গে ডুয়াল OIS এবং 7MP TrueDepth ফ্রন্ট ক্যামেরা—পোর্ট্রেট মোড, পোর্ট্রেট আলো, গভীরতা নিয়ন্ত্রণ, এবং স্মার্ট এইচডিআর', NULL, NULL, NULL, NULL),
(124, 5, 'de', 'OnePlus 8 Pro Onyxschwarzes Android-Smartphone', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(125, 5, 'es', 'Teléfono inteligente Android OnePlus 8 Pro Onyx negro', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(126, 5, 'bn', 'ওয়ান প্লাস ৮ প্রো ব্ল্যাক এন্ড্রয়েড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(127, 4, 'de', 'Apple iPhone 11 Pro Max (64 GB) – Silber', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(128, 4, 'es', 'Apple iPhone 11 Pro Max (64 GB) – Plata', ' La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(129, 4, 'bn', 'এপেল আইফোণ ১১ প্রো ম্যাক্স (৬৪জিবি)- সিলভার', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(130, 3, 'de', 'Samsung Galaxy A52 5G Android-Handy', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(131, 3, 'bn', 'স্যামসাং গ্যালাক্সি এ৫২ সেল ফোন', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(132, 3, 'es', 'Celular Samsung Galaxy A52 5G Android', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(133, 2, 'es', 'Apple iPhone X 64GB Plata Totalmente Desbloqueado', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(134, 2, 'de', 'Apple iPhone X 64 GB Silber vollständig entsperrt', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung ', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(135, 2, 'bn', 'এপেল আইফোন এক্স ৬৪ জিবি সিলভার সম্পূর্ণরূপে আনলক', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(136, 1, 'de', 'Apple iPhone 11 64 GB gelb vollständig entsperrt', 'Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet', NULL, NULL, NULL, NULL),
(137, 1, 'es', 'Apple iPhone 11 64GB Amarillo Totalmente Desbloqueado', 'La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, touchpad con soporte de gestos', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(138, 1, 'bn', 'এপেল আইফোন হলুদ সম্পূর্ণরূপে আনলক করা হয়েছে', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড\r\nKey Features:\r\n\r\nslim body with metal cover\r\nlatest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n8GB DDR4 RAM and fast 512GB PCIe SSD\r\nNVIDIA GeForce MX350 2GB GDDR5 graphics card\r\nbacklit keyboard, touchpad with gesture support\r\n', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপ সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত', NULL, NULL, NULL, NULL),
(139, 38, 'en', 'Test Image 95', 'Test Image 95', 'Test Image 95', NULL, NULL, '2022-03-10 01:11:36', '2022-03-10 01:11:36'),
(140, 39, 'en', 'Image Test', 'Image Test', '', NULL, NULL, '2022-03-10 01:15:08', '2022-03-10 01:15:08'),
(141, 40, 'en', 'Image Test 20', 'Image Test 20', '', NULL, NULL, '2022-03-10 01:21:00', '2022-03-10 01:21:00'),
(142, 41, 'en', 'Test 90', 'Test 90', '', NULL, NULL, '2022-03-10 01:23:26', '2022-03-10 01:23:26'),
(143, 42, 'en', 'Test 4545', 'Test 4545', '', NULL, NULL, '2022-03-10 01:29:46', '2022-03-10 01:29:46'),
(144, 43, 'en', 'Penelope Holland', 'Dolor tempora ex est.', '', NULL, NULL, '2022-03-10 01:32:17', '2022-03-10 01:32:17'),
(145, 44, 'en', 'Alan Frederick', 'Laborum. Ipsa, ut re.', '', NULL, NULL, '2022-03-10 01:35:58', '2022-03-10 01:35:58'),
(146, 45, 'en', 'Isaiah Levy', 'Ex sunt ullamco eu q.', '', NULL, NULL, '2022-03-10 01:40:54', '2022-03-10 01:40:54'),
(147, 46, 'en', 'Stephen Vaughn', 'Earum in labore non .', '', NULL, NULL, '2022-03-10 01:47:01', '2022-03-10 01:47:01'),
(148, 47, 'en', 'Test Irfan', 'Test Irfan', '', NULL, NULL, '2022-03-10 01:49:24', '2022-03-10 01:49:24'),
(149, 48, 'en', 'Samsung A12', '<p>Samsung A12</p>', '', NULL, NULL, '2022-03-10 02:08:25', '2022-03-10 02:08:25'),
(150, 49, 'en', 'test kjkjk', 'jhgjjgjg', '', NULL, NULL, '2022-03-12 05:41:54', '2022-03-12 05:41:54'),
(151, 50, 'en', 'hkjhkjhk', 'hggg ggghkj', '', NULL, NULL, '2022-03-12 05:42:55', '2022-03-12 05:42:55'),
(152, 51, 'en', 'dsfsd', '&lt;p&gt;fsdfdsfd&lt;/p&gt;', '', NULL, NULL, '2022-03-12 05:45:05', '2022-03-12 05:45:05'),
(153, 52, 'en', 'vvdfdf', '&lt;p&gt;fddgfgf&lt;/p&gt;', '', NULL, NULL, '2022-03-12 05:48:02', '2022-03-12 05:48:02'),
(154, 53, 'en', 'fgfgf', 'gfgddg', '', NULL, NULL, '2022-03-12 05:49:47', '2022-03-12 05:49:47'),
(155, 54, 'en', 'fgdgfgsd', 'gdfgff', '', NULL, NULL, '2022-03-12 05:51:01', '2022-03-12 05:51:01'),
(156, 55, 'en', 'fsfsfwe', 'ewewfdsfsd', '', NULL, NULL, '2022-03-12 05:51:50', '2022-03-12 05:51:50'),
(157, 56, 'en', 'sfsdfsdffs', '&lt;p&gt;sfsdfsd&lt;/p&gt;', '', NULL, NULL, '2022-03-12 05:52:43', '2022-03-12 05:52:43'),
(158, 57, 'en', 'dsaads', 'dasdsadsa', '', NULL, NULL, '2022-03-12 05:57:31', '2022-03-12 05:57:31'),
(159, 58, 'en', 'dfddsfs', '&lt;p&gt;sdfsdfdsf&lt;/p&gt;', '', NULL, NULL, '2022-03-12 05:58:42', '2022-03-12 05:58:42'),
(160, 59, 'en', 'fdf', 'sdfsdfsdfs', '', NULL, NULL, '2022-03-12 05:59:12', '2022-03-12 05:59:12');

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
  `search_name` varchar(255) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
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
  `is_translatable` tinyint(4) NOT NULL DEFAULT '0',
  `plain_value` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `is_translatable`, `plain_value`, `created_at`, `updated_at`) VALUES
(1, 'storefront_welcome_text', 1, NULL, NULL, NULL),
(2, 'storefront_theme_color', 0, '#007BFF', NULL, '2022-04-05 10:51:04'),
(3, 'storefront_mail_theme_color', 0, '#000000', NULL, '2021-11-27 20:39:51'),
(4, 'storefront_slider', 0, NULL, NULL, NULL),
(5, 'storefront_terms_and_condition_page', 0, '', NULL, '2022-04-05 10:51:04'),
(6, 'storefront_privacy_policy_page', 0, '', NULL, '2022-04-05 10:51:04'),
(7, 'storefront_address', 1, NULL, NULL, NULL),
(8, 'storefront_navbar_text', 1, NULL, NULL, NULL),
(9, 'storefront_primary_menu', 0, '3', NULL, '2022-03-28 19:08:57'),
(10, 'storefront_category_menu', 0, '', NULL, '2022-03-28 19:08:57'),
(11, 'storefront_footer_menu_title_one', 1, NULL, NULL, NULL),
(12, 'storefront_footer_menu_one', 0, '2', NULL, '2022-03-28 19:08:57'),
(13, 'storefront_footer_menu_title_two', 1, NULL, NULL, NULL),
(14, 'storefront_footer_menu_two', 0, '1', NULL, '2022-03-28 19:08:57'),
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
(35, 'storefront_footer_tag_id', 0, '[\"1\",\"2\",\"4\",\"7\"]', NULL, '2022-04-05 09:29:46'),
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
(48, 'storefront_one_column_banner_enabled', 0, '1', NULL, '2022-03-25 20:49:16'),
(49, 'storefront_one_column_banner_image', 0, NULL, NULL, NULL),
(50, 'storefront_one_column_banner_call_to_action_url', 0, 'https://www.facebook.com/', NULL, '2022-03-25 20:49:16'),
(51, 'storefront_one_column_banner_open_in_new_window', 0, '1', NULL, '2022-03-25 20:49:16'),
(52, 'storefront_two_column_banner_enabled', 0, '1', NULL, '2022-02-25 11:26:30'),
(53, 'storefront_two_column_banner_image_1', 0, NULL, NULL, NULL),
(54, 'storefront_two_column_banners_1_call_to_action_url', 0, 'https://www.facebook.com/', NULL, '2022-02-25 11:26:30'),
(55, 'storefront_two_column_banners_1_open_in_new_window', 0, '1', NULL, '2022-02-25 11:26:30'),
(56, 'storefront_two_column_banner_image_2', 0, NULL, NULL, NULL),
(57, 'storefront_two_column_banners_2_call_to_action_url', 0, '', NULL, '2022-02-25 11:26:30'),
(58, 'storefront_two_column_banners_2_open_in_new_window', 0, '0', NULL, '2022-02-25 11:26:30'),
(59, 'storefront_three_column_banners_enabled', 0, '1', NULL, '2022-02-25 11:20:47'),
(60, 'storefront_three_column_banners_image_1', 0, NULL, NULL, NULL),
(61, 'storefront_three_column_banners_1_call_to_action_url', 0, 'https://www.facebook.com/', NULL, '2022-02-25 11:20:47'),
(62, 'storefront_three_column_banners_1_open_in_new_window', 0, '1', NULL, '2022-02-25 11:20:47'),
(63, 'storefront_three_column_banners_image_2', 0, NULL, NULL, NULL),
(64, 'storefront_three_column_banners_2_call_to_action_url', 0, '', NULL, '2022-02-25 11:20:47'),
(65, 'storefront_three_column_banners_2_open_in_new_window', 0, '0', NULL, '2022-02-25 11:20:47'),
(66, 'storefront_three_column_banners_image_3', 0, NULL, NULL, NULL),
(67, 'storefront_three_column_banners_3_call_to_action_url', 0, '', NULL, '2022-02-25 11:20:47'),
(68, 'storefront_three_column_banners_3_open_in_new_window', 0, '0', NULL, '2022-02-25 11:20:47'),
(69, 'storefront_three_column_full_width_banners_enabled', 0, '1', NULL, '2022-02-25 11:06:17'),
(70, 'storefront_three_column_full_width_banners_background_image', 0, NULL, NULL, NULL),
(71, 'storefront_three_column_full_width_banners_image_1', 0, NULL, NULL, NULL),
(72, 'storefront_three_column_full_width_banners_1_call_to_action_url', 0, '', NULL, '2022-02-25 11:06:17'),
(73, 'storefront_three_column_full_width_banners_1_open_in_new_window', 0, '0', NULL, '2022-02-25 11:06:19'),
(74, 'storefront_three_column_full_width_banners_image_2', 0, NULL, NULL, NULL),
(75, 'storefront_three_column_full_width_banners_2_call_to_action_url', 0, '', NULL, '2022-02-25 11:06:18'),
(76, 'storefront_three_column_full_width_banners_2_open_in_new_window', 0, '0', NULL, '2022-02-25 11:06:19'),
(77, 'storefront_three_column_full_width_banners_image_3', 0, NULL, NULL, NULL),
(78, 'storefront_three_column_full_width_banners_3_call_to_action_url', 0, '', NULL, '2022-02-25 11:06:18'),
(79, 'storefront_three_column_full_width_banners_3_open_in_new_window', 0, '0', NULL, '2022-02-25 11:06:19'),
(80, 'storefront_top_brands_section_enabled', 0, '0', NULL, '2022-01-30 01:17:34'),
(81, 'storefront_top_brands', 0, '[\"4\",\"19\",\"20\",\"21\",\"23\"]', NULL, '2022-01-20 07:01:48'),
(82, 'storefront_product_tabs_1_section_enabled', 0, '1', NULL, '2022-02-22 02:20:23'),
(83, 'storefront_product_tabs_1_section_tab_1_title', 1, NULL, NULL, NULL),
(84, 'storefront_product_tabs_1_section_tab_1_product_type', 0, 'category_products', NULL, '2022-02-22 02:20:23'),
(85, 'storefront_product_tabs_1_section_tab_1_category_id', 0, '1', NULL, '2022-02-22 02:20:23'),
(86, 'storefront_product_tabs_1_section_tab_1_products', 0, NULL, NULL, NULL),
(87, 'storefront_product_tabs_1_section_tab_1_products_limit', 0, NULL, NULL, NULL),
(88, 'storefront_product_tabs_1_section_tab_2_title', 1, NULL, NULL, NULL),
(89, 'storefront_product_tabs_1_section_tab_2_product_type', 0, 'category_products', NULL, '2022-02-22 02:20:23'),
(90, 'storefront_product_tabs_1_section_tab_2_category_id', 0, '2', NULL, '2022-02-22 02:20:24'),
(91, 'storefront_product_tabs_1_section_tab_2_products', 0, NULL, NULL, NULL),
(92, 'storefront_product_tabs_1_section_tab_2_products_limit', 0, NULL, NULL, NULL),
(93, 'storefront_product_tabs_1_section_tab_3_title', 1, NULL, NULL, NULL),
(94, 'storefront_product_tabs_1_section_tab_3_product_type', 0, 'category_products', NULL, '2022-02-22 02:20:24'),
(95, 'storefront_product_tabs_1_section_tab_3_category_id', 0, '3', NULL, '2022-02-22 02:20:24'),
(96, 'storefront_product_tabs_1_section_tab_3_products', 0, NULL, NULL, NULL),
(97, 'storefront_product_tabs_1_section_tab_3_products_limit', 0, NULL, NULL, NULL),
(98, 'storefront_product_tabs_1_section_tab_4_title', 1, NULL, NULL, NULL),
(99, 'storefront_product_tabs_1_section_tab_4_product_type', 0, 'category_products', NULL, '2022-02-22 02:20:24'),
(100, 'storefront_product_tabs_1_section_tab_4_category_id', 0, '5', NULL, '2022-02-22 02:20:24'),
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
(131, 'storefront_flash_sale_and_vertical_products_section_enabled', 0, '1', NULL, '2022-02-22 03:02:44'),
(132, 'storefront_flash_sale_title', 1, NULL, NULL, NULL),
(133, 'storefront_flash_sale_active_campaign_flash_id', 0, '2', NULL, '2022-02-22 03:02:44'),
(134, 'storefront_vertical_product_1_title', 1, NULL, NULL, NULL),
(135, 'storefront_vertical_product_1_type', 0, 'category_products', NULL, '2022-02-22 03:02:44'),
(136, 'storefront_vertical_product_1_category_id', 0, '4', NULL, '2022-02-22 03:02:44'),
(137, 'storefront_vertical_product_1_products', 0, NULL, NULL, NULL),
(138, 'storefront_vertical_product_1_products_limit', 0, NULL, NULL, NULL),
(139, 'storefront_vertical_product_2_title', 1, NULL, NULL, NULL),
(140, 'storefront_vertical_product_2_type', 0, 'category_products', NULL, '2022-02-22 03:02:44'),
(141, 'storefront_vertical_product_2_category_id', 0, '14', NULL, '2022-02-22 03:02:44'),
(142, 'storefront_vertical_product_2_products', 0, NULL, NULL, NULL),
(143, 'storefront_vertical_product_2_products_limit', 0, NULL, NULL, NULL),
(144, 'storefront_vertical_product_3_title', 1, NULL, NULL, NULL),
(145, 'storefront_vertical_product_3_type', 0, 'category_products', NULL, '2022-02-22 03:02:44'),
(146, 'storefront_vertical_product_3_category_id', 0, '7', NULL, '2022-02-22 03:02:44'),
(147, 'storefront_vertical_product_3_products', 0, NULL, NULL, NULL),
(148, 'storefront_vertical_product_3_products_limit', 0, NULL, NULL, NULL),
(149, 'store_front_slider_format', 0, 'half_width', NULL, '2022-04-05 10:51:04'),
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
(1, 1, 'Cash On Delivery', 'Cash On Delivery', '2022-02-25 12:13:06', '2022-02-25 12:13:06');

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

-- --------------------------------------------------------

--
-- Table structure for table `setting_currencies`
--

CREATE TABLE `setting_currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supported_currency` text,
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
(1, NULL, 'USD', '$', 'prefix', NULL, NULL, NULL, NULL, NULL, '2022-03-01 22:36:43', '2022-03-01 22:36:43');

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
(1, 1, 'Flat Rate', 15, '2022-02-25 12:12:08', '2022-02-25 12:12:08');

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
(1, 1, 'Free Shipping', 0, '2022-02-25 12:11:22', '2022-02-25 12:11:51');

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
(1, 1, 'Local Pickup', 10, '2022-02-25 12:11:57', '2022-02-25 12:11:57');

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
(1, 1, '', '', '2022-02-25 11:37:25', '2022-03-20 00:02:14');

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
(1, 1, 'Paypal', 'Test', NULL, 'AU9xEUcAhAZ9uK_UNVseT4RAiOVABw38vUjPYDth_M9IGCQp4Ez_WJ8s1HtztNdx3Nt58NuaFKcWX98b', 'EEjSv_jGB0xYCRs3-8L9aEsAp56LeQOOSNNTaXR1LirZxq6Nmgn70tL5jInojNIoCp_JbW_jjoOMT1qG', '2022-02-25 12:14:17', '2022-03-11 13:32:38');

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
(1, 'CartPro Shop', 'Laravel ecommerce CMS', 'hello@lion-coders.com', '+880 192 4756 759', 'Agrabad', '', 'Chittagong', 'Bangladesh', NULL, '4330', 'images/general/SvTuwlRwTQ.webp', NULL, NULL, '2022-02-14 00:01:00', '2022-04-05 10:44:34');

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

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `value` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(54, 83, 'en', 'Mobile', '2021-09-21 04:50:53', '2022-02-14 04:27:51'),
(55, 88, 'en', 'Computer', '2021-09-21 04:50:53', '2022-02-14 04:27:51'),
(56, 93, 'en', 'Television', '2021-09-21 04:50:54', '2022-02-20 01:44:11'),
(57, 98, 'en', 'Headphone', '2021-09-21 04:50:54', '2022-02-20 04:27:32'),
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
(76, 36, 'en', '&copy; CartPro 2021. All rights reserved', '2021-11-18 04:05:38', '2022-04-05 09:29:46');

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

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` text,
  `slider_image` varchar(255) DEFAULT NULL,
  `slider_image_full_width` varchar(255) DEFAULT NULL,
  `slider_image_secondary` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `text_alignment` varchar(191) DEFAULT NULL,
  `text_color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_slug`, `type`, `category_id`, `url`, `slider_image`, `slider_image_full_width`, `slider_image_secondary`, `target`, `is_active`, `text_alignment`, `text_color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'enhance-your', 'category', 1, '', 'images/sliders/jlu9i1qZjW.png', 'images/sliders/full_width/oA4uLZZeuE.png', 'images/sliders/secondary/wM9SEstWIk.png', 'new_tab', '1', 'right', '#121111', '2022-02-13 03:46:32', '2022-03-25 18:24:18', NULL),
(2, 'the-world-largest', 'category', 4, '', 'images/sliders/brOf20e98c.png', 'images/sliders/full_width/J8U1UIjS1W.png', 'images/sliders/secondary/oTtWm7YAev.png', 'new_tab', '1', 'right', '#161515', '2022-02-21 15:49:20', '2022-03-25 18:25:18', NULL),
(3, 'shop-what', 'category', 1, '', 'images/sliders/a9ozZNZ1Ha.jpg', 'images/sliders/full_width/iIcOXJOBns.jpg', 'images/sliders/secondary/guufhHiK0X.jpg', 'new_tab', '1', 'left', '#000000', '2022-02-21 15:51:04', '2022-03-25 23:31:08', NULL),
(4, 'test', 'category', 1, '', 'images/sliders/5EQfGBuEkE.png', NULL, 'images/sliders/secondary/JbZjhArYT3.png', '', '1', '', NULL, '2022-02-27 06:13:49', '2022-02-28 01:55:19', '2022-02-28 01:55:19'),
(5, 'trete', 'category', 5, NULL, 'images/sliders/WLKcgLn11h.jpg', NULL, 'images/sliders/secondary/T6nksvxqzO.jpg', 'same_tab', '1', 'left', NULL, '2022-02-27 07:35:16', '2022-02-28 01:55:12', '2022-02-28 01:55:12'),
(6, 'test-45', 'category', 1, '', 'images/sliders/UzBuaHYyvq.jpg', NULL, 'images/sliders/secondary/LlzSkmMfJP.jpg', 'same_tab', '1', 'left', '#00ff40', '2022-02-28 02:31:23', '2022-03-02 22:48:06', '2022-03-02 22:48:06');

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
(1, 1, 'en', 'Enhance Your', 'Entertainment', '2022-02-13 03:46:32', '2022-02-21 15:45:38'),
(2, 2, 'en', 'The world largest', 'Online Store', '2022-02-21 15:49:20', '2022-02-21 15:49:20'),
(3, 3, 'en', 'Shop What', 'You Desire', '2022-02-21 15:51:04', '2022-04-05 13:51:18'),
(4, 4, 'en', 'Test', 'Test 2', '2022-02-27 06:13:49', '2022-02-27 06:13:49'),
(5, 5, 'en', 'trete', 'tert', '2022-02-27 07:35:16', '2022-02-27 07:35:16'),
(6, 6, 'en', 'Test 45', 'testbb', '2022-02-28 02:31:23', '2022-02-28 02:31:23'),
(7, 3, 'de', 'Einkaufen was', 'Sie wünschen', '2022-03-09 04:08:12', '2022-03-09 04:08:12'),
(8, 2, 'de', 'Die weltweit größte', 'Online-Shop', '2022-03-09 04:09:02', '2022-03-09 04:09:02'),
(9, 1, 'de', 'Verbessern Sie Ihre', 'Unterhaltung', '2022-03-09 04:09:24', '2022-03-09 04:09:24'),
(10, 3, 'es', 'comprar qué', 'tu deseo', '2022-03-09 04:10:08', '2022-03-09 04:10:08'),
(11, 2, 'es', 'el mundo mas grande', 'Tienda en línea', '2022-03-09 04:10:31', '2022-03-09 04:10:31'),
(12, 1, 'es', 'Mejore su', 'Entretenimiento', '2022-03-09 04:10:52', '2022-03-09 04:10:52'),
(13, 3, 'bn', 'কি দোকান', 'তোমার আকাঙ্খা', '2022-03-09 04:11:29', '2022-03-09 04:11:29'),
(14, 2, 'bn', 'বিশ্বের বৃহত্তম', 'অনলাইন দোকান', '2022-03-09 04:11:55', '2022-03-09 04:11:55'),
(15, 1, 'bn', 'আপনার উন্নত', 'বিনোদন', '2022-03-09 04:12:15', '2022-03-09 04:12:15');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storefront_images`
--

INSERT INTO `storefront_images` (`id`, `setting_id`, `title`, `type`, `image`, `created_at`, `updated_at`) VALUES
(1, NULL, 'favicon_logo', 'logo', '/images/storefront/logo/7GEBNYRRhp.png', '2022-02-21 15:02:46', '2022-02-21 15:02:46'),
(2, NULL, 'header_logo', 'logo', '/images/storefront/logo/50E8Oj7szt.webp', '2022-02-21 15:07:32', '2022-02-21 15:07:32'),
(3, 42, 'slider_banner_1', 'slider_banner', '/images/storefront/slider_banners/e9OGBqHFpA.jpg', '2022-02-21 15:22:35', '2022-03-19 23:05:38'),
(4, 45, 'slider_banner_2', 'slider_banner', '/images/storefront/slider_banners/SNIWak7D4E.jpg', '2022-02-21 15:32:03', '2022-03-19 23:05:38'),
(5, 127, 'slider_banner_3', 'slider_banner', '/images/storefront/slider_banners/Kqyy8ifW7g.webp', '2022-02-21 15:34:27', '2022-02-21 15:34:27'),
(6, NULL, 'three_column_full_width_banners_image_1', 'three_column_full_width_banners', '/images/storefront/three_column_full_width_banners/PG575eXkUO.png', '2022-02-25 11:06:18', '2022-02-25 11:06:18'),
(7, NULL, 'three_column_full_width_banners_image_2', 'three_column_full_width_banners', '/images/storefront/three_column_full_width_banners/NcwDRh0vZd.png', '2022-02-25 11:06:18', '2022-02-25 11:06:18'),
(8, NULL, 'three_column_full_width_banners_image_3', 'three_column_full_width_banners', '/images/storefront/three_column_full_width_banners/Amx863A7II.png', '2022-02-25 11:06:19', '2022-02-25 11:06:19'),
(9, NULL, 'three_column_banners_image_1', 'three_column_banners', '/images/storefront/three_column_banners/gNm5G6hd5K.png', '2022-02-25 11:20:47', '2022-02-25 11:20:47'),
(10, NULL, 'three_column_banners_image_2', 'three_column_banners', '/images/storefront/three_column_banners/qWHafNdN2N.png', '2022-02-25 11:20:47', '2022-02-25 11:20:47'),
(11, NULL, 'three_column_banners_image_3', 'three_column_banners', '/images/storefront/three_column_banners/BvP0BHJ3wL.png', '2022-02-25 11:20:47', '2022-02-25 11:20:47'),
(12, NULL, 'two_column_banner_image_1', 'two_column_banners', '/images/storefront/two_column_banners/vPsK9rVJRG.png', '2022-02-25 11:26:30', '2022-02-25 11:26:30'),
(13, NULL, 'two_column_banner_image_2', 'two_column_banners', '/images/storefront/two_column_banners/eTG56tfFWR.png', '2022-02-25 11:26:30', '2022-02-25 11:26:30'),
(14, NULL, 'one_column_banner_image', 'one_column_banner', '/images/storefront/one_column_banner/7EkGjD8f1B.jpg', '2022-02-25 11:27:55', '2022-03-25 20:49:16'),
(15, NULL, 'accepted_payment_method_image', 'payment_method', '/images/storefront/payment_method/ms82rZ9HMJ.webp', '2022-02-25 11:31:33', '2022-02-25 11:34:26'),
(16, NULL, 'newsletter_background_image', 'newletter', '/images/storefront/newsletter/newslatter.jpg', '2022-02-25 11:54:03', '2022-03-20 03:03:46'),
(17, NULL, 'topbar_logo', 'logo', '/images/storefront/logo/7gsL9SwO1s.gif', '2022-03-21 02:56:07', '2022-03-21 03:19:08');

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
(1, 'smartphone', 1, '2022-02-25 11:58:31', '2022-03-19 03:09:05'),
(2, 'android', 1, '2022-02-25 11:58:40', '2022-03-19 03:08:56'),
(3, 'আইফোন', 1, '2022-02-25 11:58:49', '2022-03-02 07:43:05'),
(4, 'ল্যাপটপ', 1, '2022-02-25 11:59:11', '2022-03-02 07:42:58'),
(5, 'ডেস্কটপ', 1, '2022-02-25 11:59:18', '2022-03-02 07:42:49'),
(6, 'এইচডি-টিভি', 1, '2022-02-25 11:59:39', '2022-03-02 07:42:40'),
(7, 'headphone', 1, '2022-02-25 11:59:51', '2022-03-19 03:08:25');

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
(1, 1, 'en', 'Smartphone', '2022-02-25 11:58:31', '2022-02-25 11:58:31'),
(2, 2, 'en', 'Android', '2022-02-25 11:58:40', '2022-02-25 11:58:40'),
(3, 3, 'en', 'iPhone', '2022-02-25 11:58:49', '2022-02-25 11:58:49'),
(4, 4, 'en', 'Laptop', '2022-02-25 11:59:11', '2022-02-25 11:59:11'),
(5, 5, 'en', 'Desktop', '2022-02-25 11:59:18', '2022-02-25 11:59:18'),
(6, 6, 'en', 'HD TV', '2022-02-25 11:59:39', '2022-02-25 11:59:39'),
(7, 7, 'en', 'Headphone', '2022-02-25 11:59:51', '2022-02-25 11:59:51'),
(8, 7, 'de', 'Kopfhörer', NULL, NULL),
(9, 6, 'de', 'HD-Fernseher', NULL, NULL),
(10, 5, 'de', 'Schreibtisch', NULL, NULL),
(11, 4, 'de', 'Laptop', NULL, NULL),
(12, 7, 'es', 'Auricular', NULL, NULL),
(13, 6, 'es', 'televisión de alta definición', NULL, NULL),
(14, 5, 'es', 'Escritorio', NULL, NULL),
(15, 7, 'bn', 'হেডফোন', NULL, NULL),
(16, 6, 'bn', 'এইচডি টিভি', NULL, NULL),
(17, 5, 'bn', 'ডেস্কটপ', NULL, NULL),
(18, 4, 'bn', 'ল্যাপটপ', NULL, NULL),
(19, 3, 'bn', 'আইফোন', NULL, NULL),
(20, 2, 'bn', 'অ্যান্ড্রয়েড', NULL, NULL),
(21, 1, 'bn', 'স্মার্টফোন', NULL, NULL);

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
(1, 'Bangladesh', '4330', 10, 'shipping_address', '1', '2022-02-13 00:18:27', '2022-02-13 00:18:27');

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
(1, 1, 'en', 'Bangladesh', 'BD Tax', 'Chittagong', 'Chittagong', '2022-02-13 00:18:27', '2022-03-09 03:49:29'),
(2, 1, 'de', 'Bangladesch', 'BD-Steuer', 'Chittagong', 'Chittagong', '2022-03-09 03:37:44', '2022-03-09 03:44:26'),
(3, 1, 'es', 'Bangladesh', 'BD Steuer', 'Chittagong', 'Chittagong', '2022-03-09 03:50:17', '2022-03-09 03:50:17'),
(4, 1, 'bn', 'Bangladesh', 'বাংলাদেশ ট্যক্স', 'Chittagong', 'Chittagong', '2022-03-09 03:50:40', '2022-03-09 03:50:40');

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
(1, 'admin', 'Irfan', 'Chowdhury', '12313131', 'admin@gmail.com', '$2y$10$WcnC16AXG/mNrVBWQGjfoegFO.1wjiIiBv5LxEHR6uQaJYVciYCOa', 1, 4, 0, 'images/admin/aNiJfKILIo.webp', NULL, 'D7lys5iheDVsaCHZMMmymdjXqbOBxiKpGiWXuKnKWJkmoD06FfqiRAUNxfym', NULL, NULL, 1, NULL, '2020-12-13 14:35:51', '2022-04-03 22:46:39'),
(2, 'irfan', 'Irfan ', 'Chowdhury', '01829498634', 'irfanchowdhury81@gmail.com', '$2y$10$Bpkr0QPBwpiw6Ax8sqvSy.5sZVa96Np7Dnhyz97WBw7cuT1w7pzOi', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-01-31 02:33:22', '2021-08-10 11:53:08'),
(3, 'arman', 'Arman', 'Alam', '01829498635', 'arman@gmail.com', '$2y$10$sFg.WpMhrzu6gQeVq4k5V.NSnJSE2J0pgW1DXFf/za5SCNFiwBoaa', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-02-07 01:29:29', '2021-09-04 21:55:37'),
(4, 'irfan95', 'Irfan', 'Chowdhury Fahim', '384434q9`', 'irfanchowdhury@gmail.com', '$2y$10$f.m5JjQlDp2hRCF6cAvPreblmJq5ZsAqns1l3GBNgQQ/VGfwhaKdi', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-07-30 12:37:29', '2021-09-04 21:55:34'),
(5, 'khan95', 'Mr', 'Khan', '+8801829498436', 'khan@gmail.com', '$2y$10$O1Ha6motjPgmZTq.ShZiFuWstDgbYqrHcC3HF6Ai0lT21ciMDmpTW', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-08-10 10:06:39', '2021-08-10 12:33:57'),
(7, 'user', 'Mr', 'User', '+880123456789', 'user@gmail.com', '$2y$10$sJS8.LlL45T6zyB4NDuApuG2Z3TaWJ33WTNHbduTAqPvLrjRF6gKS', 0, 6, 6, 'images/customers/J4Fspmzm5A.png', NULL, NULL, NULL, NULL, 1, NULL, '2021-08-10 11:22:10', '2022-03-22 01:09:33'),
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
(42, 'irfanchowdhury80@gmail.com', 'Irfan Chowdhury', NULL, NULL, 'irfanchowdhury80@gmail.com', NULL, 0, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14Ggrsn2UgQ_0Y3HLgGbHi8kaBUczNoTN_PwmzZ0hzA=s96-c', NULL, NULL, NULL, NULL, 1, '112073730973873758091', '2022-01-11 03:44:59', '2022-01-11 03:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_billing_addresses`
--

CREATE TABLE `user_billing_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_sets`
--
ALTER TABLE `attribute_sets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_set_translations`
--
ALTER TABLE `attribute_set_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_value_translations`
--
ALTER TABLE `attribute_value_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brand_translations`
--
ALTER TABLE `brand_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon_translations`
--
ALTER TABLE `coupon_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `currency_rates`
--
ALTER TABLE `currency_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sales`
--
ALTER TABLE `flash_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `flash_sale_translations`
--
ALTER TABLE `flash_sale_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keyword_hits`
--
ALTER TABLE `keyword_hits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `menu_translations`
--
ALTER TABLE `menu_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_cash_on_deliveries`
--
ALTER TABLE `setting_cash_on_deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_check_money_orders`
--
ALTER TABLE `setting_check_money_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_currencies`
--
ALTER TABLE `setting_currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_custom_css_jsses`
--
ALTER TABLE `setting_custom_css_jsses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_facebooks`
--
ALTER TABLE `setting_facebooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_googles`
--
ALTER TABLE `setting_googles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_sms`
--
ALTER TABLE `setting_sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_stores`
--
ALTER TABLE `setting_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_strips`
--
ALTER TABLE `setting_strips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider_translations`
--
ALTER TABLE `slider_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `storefront_images`
--
ALTER TABLE `storefront_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tax_translations`
--
ALTER TABLE `tax_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user_billing_addresses`
--
ALTER TABLE `user_billing_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_shipping_addresses`
--
ALTER TABLE `user_shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
