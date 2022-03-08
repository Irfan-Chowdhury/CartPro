-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 11:09 AM
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
-- Database: `cartpro`
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
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `top` int(11) DEFAULT 0,
  `is_active` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `parent_id`, `image`, `icon`, `top`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'mobile', NULL, 'images/categories/yC9tucZzFA.webp', 'las la-mobile', 1, 1, '2022-02-12 23:38:41', '2022-02-12 23:40:33'),
(2, 'computers-&-accessories', NULL, 'images/categories/Q1LgGmgWHY.jpg', 'las la-desktop', 1, 1, '2022-02-13 03:27:02', '2022-02-14 00:17:40'),
(3, 'television', NULL, 'images/categories/pn3vq9MsJR.png', 'las la-tv', 1, 1, '2022-02-13 03:34:39', '2022-02-14 04:17:11'),
(4, 'watch', NULL, 'images/categories/sUyBsGLV0p.png', 'las la-clock', 1, 1, '2022-02-14 00:27:58', '2022-02-14 00:29:59'),
(5, 'headphone', NULL, 'images/categories/P4BxNp0WCt.webp', 'las la-headphones', 1, 1, '2022-02-14 00:37:23', '2022-02-14 00:38:29'),
(6, 'clothes', NULL, 'images/categories/qbqbFMnVA7.png', 'las la-tshirt', 1, 1, '2022-02-14 00:50:24', '2022-02-14 00:51:38'),
(7, 'shoes', NULL, 'images/categories/nZ7ywNMnSV.jpg', 'las la-shoe-prints', 1, 1, '2022-02-14 01:36:13', '2022-02-14 01:44:03'),
(8, 'furniture', NULL, 'images/categories/39xTzDMwwT.jpg', 'las la-couch', 1, 1, '2022-02-14 02:03:17', '2022-02-14 05:08:25'),
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
(2, 34);

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
(2, 2, 'en', 'Computers & Accessories', '2022-02-13 03:27:02', '2022-02-13 03:27:02'),
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
(43, 3, 'es', 'Televisión', NULL, NULL),
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
(1, 'Bangladesh Taka', 'BDT', '৳', '80.0000', '2022-03-01 22:36:43', '2022-03-02 08:52:02'),
(2, 'United States Dollar', 'USD', '$', '1.0000', '2022-03-01 22:36:43', '2022-03-02 08:52:15');

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
  `position` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flash_sale_products`
--

INSERT INTO `flash_sale_products` (`id`, `flash_sale_id`, `product_id`, `end_date`, `price`, `qty`, `position`, `created_at`, `updated_at`) VALUES
(2, 2, 32, '2022-04-30', '120.00', 10, 0, '2022-02-22 02:45:34', '2022-02-22 02:45:34'),
(5, 2, 33, '2022-04-28', '30.00', 19, 0, NULL, NULL),
(6, 2, 34, '2022-03-10', '40.00', 20, 0, NULL, NULL);

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
(1, 'home-page-menu', 1, '2022-02-25 11:39:09', '2022-02-25 11:39:09');

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
(1, 'en', 'Terms & Condition', 'terms-&-condition', 0, 0, NULL, 1, 0, '2022-02-25 11:41:30', '2022-02-25 11:47:47'),
(2, 'en', 'About Us', 'about-us', 0, 1, NULL, 1, 0, '2022-02-25 11:47:47', '2022-02-25 11:49:01'),
(3, 'en', 'FAQ', 'faq', 0, 3, NULL, 1, 0, '2022-02-25 11:49:01', '2022-02-25 11:49:01');

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
(1, 1, 'en', 'Home Page Menu', '2022-02-25 11:39:09', '2022-02-25 11:39:09');

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
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 1, 'Test ff', 'gdgdgd', 'test144@gmail.com', '345345555355', 'United States', 'ggdg', 'fgeter', 'fdfg', 'dfgfdgf', 'fdgfd', 'free', '0', 'cash_on_delivery', NULL, '621e2d3cea259', NULL, '30.00', '30.00', '$', 'completed', 'pending', '2022-03-01', NULL, '2022-03-01 08:27:08', '2022-03-01 22:37:20');

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
(1, 1, 33, NULL, NULL, NULL, '30.00', 1, 1, '/images/products/v5Q6OuT0Yp.webp', '{\"image\":\"\\/images\\/products\\/v5Q6OuT0Yp.webp\",\"product_slug\":\"garmin-vivo-smart-3-activity-tracker-\\u2013-large\",\"category_id\":\"4\"}', '0.00', '', '30.00', '2022-03-01 08:27:09', '2022-03-01 08:27:09');

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
(3, 'faq', 1, '2022-02-25 11:48:47', '2022-02-25 11:48:47');

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
(1, 1, 'en', 'Terms & Condition', '&lt;p&gt;This website is operated by a.season. Throughout the site, the terms &amp;ldquo;we&amp;rdquo;, &amp;ldquo;us&amp;rdquo; and &amp;ldquo;our&amp;rdquo; refer to a.season. a.season offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;By visiting our site and/ or purchasing something from us, you engage in our &amp;ldquo;Service&amp;rdquo; and agree to be bound by the following terms and conditions (&amp;ldquo;Terms of Service&amp;rdquo;, &amp;ldquo;Terms&amp;rdquo;), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;Online Store Terms&lt;/h4&gt;\n&lt;p&gt;By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;General Conditions&lt;/h4&gt;\n&lt;p&gt;We reserve the right to refuse service to anyone for any reason at any time.&lt;br /&gt;You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;License&lt;/h4&gt;\n&lt;p&gt;You must not:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;Republish material from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;li&gt;Sell, rent or sub-license material from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;li&gt;Reproduce, duplicate or copy material from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;li&gt;Redistribute content from&amp;nbsp;&lt;span class=&quot;highlight preview_website_name&quot;&gt;Website Name&lt;/span&gt;&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;h4&gt;Disclaimer&lt;/h4&gt;\n&lt;p&gt;To the maximum extent permitted by applicable law, we exclude all representations:&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;limit or exclude our or your liability for death or personal injury;&lt;/li&gt;\n&lt;li&gt;limit or exclude our or your liability for fraud or fraudulent misrepresentation;&lt;/li&gt;\n&lt;li&gt;limit any of our or your liabilities in any way that is not permitted under applicable law; or&lt;/li&gt;\n&lt;li&gt;exclude any of our or your liabilities that may not be excluded under applicable law.&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.&lt;/p&gt;', '2022-02-25 11:40:27', '2022-02-25 11:46:30'),
(2, 2, 'en', 'About Us', '&lt;p&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit.&lt;/li&gt;\r\n&lt;li&gt;In luctus nunc id lectus pellentesque lacinia.&lt;/li&gt;\r\n&lt;li&gt;Pellentesque laoreet mi molestie tortor aliquam, sed hendrerit nisi consectetur.&lt;/li&gt;\r\n&lt;li&gt;Nam sed sapien sed lacus placerat euismod in consectetur ex.&lt;/li&gt;\r\n&lt;li&gt;Sed et odio ultrices, semper sem sed, scelerisque libero.&lt;/li&gt;\r\n&lt;li&gt;Proin ut ex varius libero viverra pellentesque.&lt;/li&gt;\r\n&lt;/ul&gt;', '2022-02-25 11:47:18', '2022-02-25 11:47:18'),
(3, 3, 'en', 'FAQ', '&lt;h1 style=&quot;text-align: center;&quot;&gt;Help &amp;amp; FAQ&lt;/h1&gt;\r\n&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h4&gt;What does LOREM mean?&lt;/h4&gt;\r\n&lt;p&gt;&amp;lsquo;Lorem ipsum dolor sit amet, consectetur adipisici elit&amp;hellip;&amp;rsquo; (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts, for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word &amp;lsquo;Lorem&amp;rsquo; does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h4&gt;Why do we use it?&lt;/h4&gt;\r\n&lt;p&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h4&gt;Where does it come from?&lt;/h4&gt;\r\n&lt;p&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h4&gt;Where can I get some?&lt;/h4&gt;\r\n&lt;p&gt;There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h4&gt;Why do we use Lorem Ipsum?&lt;/h4&gt;\r\n&lt;p&gt;Many times, readers will get distracted by readable text when looking at the layout of a page. Instead of using filler text that says &amp;ldquo;Insert content here,&amp;rdquo; Lorem Ipsum uses a normal distribution of letters, making it resemble standard English. This makes it easier for designers to focus on visual elements, as opposed to what the text on a page actually says. Lorem Ipsum is absolutely necessary in most design cases, too. Web design projects like landing pages, website redesigns and so on only look as intended when they\'re fully-fleshed out with content.&lt;/p&gt;', '2022-02-25 11:48:47', '2022-02-25 11:48:47');

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
(1, 2, 1, 'apple-iphone-11-64gb-yellow-fully-unlocked', '100.0000', '0.0000', '', NULL, NULL, NULL, '0.0000', 'SO4JK74', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 00:46:06', '2022-03-03 03:33:29', NULL),
(2, 2, 1, 'apple-iphone-x-64gb-silver-fully-unlocked', '284.0000', '0.0000', '', NULL, NULL, NULL, '0.0000', 'CE45VERT', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 01:26:24', '2022-03-03 03:30:06', NULL),
(3, 1, 1, 'samsung-galaxy-a52-5g-android-cell-phone', '200.0000', '0.0000', '', NULL, NULL, NULL, '0.0000', 'KGH45YRT', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 01:30:20', '2022-03-03 03:26:22', NULL),
(4, 2, 1, 'apple-iphone-11-pro-max-(64gb)-–-silver', '815.0000', '715.0000', '', NULL, NULL, NULL, '715.0000', 'S57UK74', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 01:36:03', '2022-03-03 03:18:38', NULL),
(5, 3, 1, 'oneplus-8-pro-onyx-black-android-smartphone', '240.5000', '0.0000', '', NULL, NULL, NULL, '0.0000', 'YHE4M7', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 01:41:17', '2022-03-03 03:15:12', NULL),
(6, 2, 1, 'apple-iphone-xs-max-64gb--white', '560.0000', '0.0000', '', NULL, NULL, NULL, '0.0000', 'KLIOLP', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 02:11:05', '2022-03-03 03:11:51', NULL),
(7, 1, 1, 'samsung-galaxy-note-10', '590.0000', '500.0000', '', NULL, NULL, NULL, '500.0000', 'LKOUHJ', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-13 02:18:25', '2022-03-03 02:39:26', NULL),
(8, 4, 1, 'asus-vivobook-15-thin-and-light-laptop-15.6-inch-fhd-display', '519.0000', '470.0000', '', NULL, NULL, NULL, '470.0000', 'SL4JK74', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-14 05:36:08', '2022-03-03 02:28:26', NULL),
(9, 4, 1, 'asus-vivobook-17.3″-i5-8gb_1tb-17.3″-fhd-display', '589.0000', '549.0000', '', NULL, NULL, NULL, '549.0000', 'BE48VGRN', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-14 06:04:57', '2022-03-03 02:23:51', NULL),
(10, 6, 1, 'apple-macbook-pro-13.3-inch-2.7ghz-dual-core-i5', '1299.0000', '999.0000', '', NULL, NULL, NULL, '999.0000', 'NBM59UY', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-14 23:40:48', '2022-03-03 02:19:43', NULL),
(11, 4, 1, 'asus-vivobook-15-inch-fhd-slate-gray', '496.0000', '456.0000', '', NULL, NULL, NULL, '456.0000', 'KLB5UM', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-15 01:02:40', '2022-03-03 02:11:52', NULL),
(12, 6, 1, 'apple-macbook-pro-15.4-inch-laptop', '1355.0000', '1155.0000', '', NULL, NULL, NULL, '1155.0000', 'ZR85UFA', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-15 02:31:06', '2022-03-03 02:08:04', NULL),
(13, 1, 1, 'element-27-inch-1080p-frameless-ips-lcd-pc-monitor', '159.0000', '269.0000', '', NULL, NULL, NULL, '269.0000', 'BE875TET', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 01:42:46', '2022-03-03 02:04:07', NULL),
(14, 1, 1, 'jvc-70-inch-class-4k-uhd-2160p-roku-smart-tv', '697.0000', '767.0000', '', NULL, NULL, NULL, '767.0000', 'JVC45VGWT', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 03:32:38', '2022-03-03 02:01:01', NULL),
(15, 7, 1, 'lg-43-inch-4k-ultra-hd-smart-led-tv-2020', '346.9900', '389.9900', '', NULL, NULL, NULL, '389.9900', 'LG4MK74', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 03:45:01', '2022-03-03 01:55:05', NULL),
(16, NULL, 1, 'samsung-75-inc-class-4k-ultra-hd-hdr-smart-qled-tv', '3299.9900', '2799.9900', '', NULL, NULL, NULL, '2799.9900', '75ANGUHD', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:08:00', '2022-03-03 01:38:56', NULL),
(17, 8, 1, 'sony-65-inc-class-4k-uhd-led-android-smart-tv-hdr-bravia', '1398.0000', '1498.0000', '', NULL, NULL, NULL, '1498.0000', 'S6C4ULAS', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:13:27', '2022-03-03 01:27:28', NULL),
(18, NULL, 1, 'apple-mwp22am-a-airpods-pro', '189.9800', '149.9800', '', NULL, NULL, NULL, '149.9800', 'B9EAVGRT', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:25:57', '2022-03-03 01:23:26', NULL),
(19, NULL, 1, 'beats-studio3-wireless-headphones-–-matte-black', '339.0000', '289.0000', '', NULL, NULL, NULL, '289.0000', 'KE35VGET', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:32:39', '2022-03-03 01:15:47', NULL),
(20, NULL, 1, 'bose-quietcomfort-noise-cancelling-earbuds-–-black', '319.0000', '279.0000', '', NULL, NULL, NULL, '279.0000', 'CIKO6AE', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:35:57', '2022-03-03 01:10:26', NULL),
(21, NULL, 1, 'bose-noise-cancelling-wireless-bluetooth', '479.0000', '439.0000', '', NULL, NULL, NULL, '439.0000', 'RO5JK73', 0, NULL, 1, NULL, 1, NULL, NULL, 0, '2022-02-20 04:39:41', '2022-03-03 01:06:29', NULL),
(22, NULL, 1, 'google-pixel-buds,-clearly-white', '304.9500', '204.9500', '', NULL, '1970-01-01', '1970-01-01', '204.9500', 'HM45UYA', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-20 04:42:50', '2022-03-03 00:14:31', NULL),
(23, NULL, 1, 'cubitt-smart-watch-ct2s-waterproof-fitness-tracker', '65.0000', '95.0000', '', NULL, '1970-01-01', '1970-01-01', '95.0000', 'KM45VGRT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 00:19:37', '2022-03-03 00:10:16', NULL),
(24, NULL, 1, 'apple-watch-series-3-gps-–-42mm-–-sport-band', '299.0000', '249.0000', '', NULL, '1970-01-01', '1970-01-01', '249.0000', 'EQA5VGRT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 00:25:42', '2022-03-03 00:03:47', NULL),
(25, 1, 1, 'স্যামসাং-গালাক্সি-অ্যালুমিনিয়াম', '249.9900', '229.9900', '', NULL, '1970-01-01', '1970-01-01', '229.9900', 'CE45UGT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 00:41:30', '2022-03-02 08:49:24', NULL),
(26, 9, 1, 'Canon-EOS-বিদ্রোহী-ক্যামেরা-T7-EF-S-18-55mm-IS-II-কিট', '529.9900', '479.9900', '', NULL, '1970-01-01', '1970-01-01', '479.9900', 'KMT5VET', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 01:10:55', '2022-03-02 08:46:36', NULL),
(27, 9, 1, 'Canon-SX740BK-পাওয়ারশট-SX740-HS-ডিজিটাল-ক্যামেরা', '499.9500', '399.9500', '', NULL, '1970-01-01', '1970-01-01', '399.9500', 'BE9TGAV', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 01:18:44', '2022-03-02 08:43:22', NULL),
(28, 10, 1, 'ফুজিফিল্ম-16642939-X100V-ডিজিটাল-ক্যামেরা-–-সিলভার', '1699.0000', '1399.0000', '', NULL, '1970-01-01', '1970-01-01', '1399.0000', 'BE459GRT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 01:24:21', '2022-03-02 08:40:53', NULL),
(29, NULL, 1, 'পুরুষদের-জন্য-প্রথম-নৃত্য-অতিরিক্ত-বড়-জুতা-নৈমিত্তিক-জুতা-ক্যামো-প্রিন্ট-বড়-আকারের-ফ্যাশন-স্নিকার-পুরুষদের-জন্য', '180.0000', '0.0000', '', NULL, '1970-01-01', '1970-01-01', '0.0000', 'GDSFSDF', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 01:44:26', '2022-03-02 08:26:50', NULL),
(30, NULL, 1, 'COKAFIL-Zapatillas-de-correr-para-hombre-Zapatillas-de-tenis-atléticas-con-cuchilla-para-caminar-Zapatillas-de-deporte-de-moda', '550.0000', '0.0000', '', NULL, '1970-01-01', '1970-01-01', '0.0000', '17998302', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 02:02:42', '2022-03-02 08:22:04', NULL),
(31, NULL, 1, 'ওয়ান্ডার-নেশন-টডলার-গার্লস-গ্লিটার-ক্যাজুয়াল-মেরি-জেন-স্নিকার্স', '2156.0000', '0.0000', '', NULL, '1970-01-01', '1970-01-01', '0.0000', '45581026', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 02:10:24', '2022-03-02 08:19:20', NULL),
(32, NULL, 1, 'ড্রাগন-টাচ-ম্যাক্স-10-ট্যাবলেট-অ্যান্ড্রয়েড-10.0-ওএস', '189.9900', '129.9900', '', NULL, '1970-01-01', '1970-01-01', '129.9900', 'ZR45VGRT', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 02:33:31', '2022-03-02 08:14:51', NULL),
(33, NULL, 1, 'গারমিন-ভিভো-স্মার্ট-3-অ্যাক্টিভিটি-ট্র্যাকার---বড়', '49.9900', '39.9900', '', NULL, '1970-01-01', '1970-01-01', '39.9900', 'BE458GET', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 02:58:36', '2022-03-02 08:09:58', NULL),
(34, NULL, 1, 'ইকো-ডট-(4th-Gen,-2020-রিলিজ)-|-স্মার্ট-স্পিকার', '49.9900', '69.0000', '', NULL, '1970-01-01', '1970-01-01', '69.0000', 'SO4JK47', 0, NULL, 1, NULL, 1, '1970-01-01', '1970-01-01', 0, '2022-02-22 03:40:18', '2022-03-02 07:59:38', NULL);

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
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, '/images/products/f6qXdQdZVm.webp', 'base', NULL, NULL),
(2, 1, '/images/products/fjTtGCeVXq.webp', 'additional', NULL, NULL),
(3, 1, '/images/products/d6LWjDgIOC.webp', 'additional', NULL, NULL),
(4, 1, '/images/products/w2fWutUCYg.webp', 'additional', NULL, NULL),
(5, 1, '/images/products/UgIMV1OlvG.webp', 'additional', NULL, NULL),
(6, 2, '/images/products/oxnt4KyMw6.webp', 'base', NULL, NULL),
(7, 2, '/images/products/uzkWGChGRu.webp', 'additional', NULL, NULL),
(8, 2, '/images/products/WAwfYVJrwW.webp', 'additional', NULL, NULL),
(9, 2, '/images/products/QnLOPyaiSc.webp', 'additional', NULL, NULL),
(10, 3, '/images/products/gxAhN2e8yY.webp', 'base', NULL, NULL),
(11, 3, '/images/products/vL50aZsaHL.webp', 'additional', NULL, NULL),
(12, 3, '/images/products/lm7LYgCS5I.webp', 'additional', NULL, NULL),
(13, 4, '/images/products/ydFqlpWr4D.webp', 'base', NULL, NULL),
(14, 4, '/images/products/qeD9Bz8jGz.webp', 'additional', NULL, NULL),
(15, 4, '/images/products/ccIIb5kBJu.webp', 'additional', NULL, NULL),
(16, 4, '/images/products/dCIN7dLIJk.webp', 'additional', NULL, NULL),
(17, 5, '/images/products/XAbIiTyFAC.webp', 'base', NULL, NULL),
(18, 5, '/images/products/oUGP4MQBc3.webp', 'additional', NULL, NULL),
(19, 5, '/images/products/jO705z6Fwh.webp', 'additional', NULL, NULL),
(20, 5, '/images/products/XoAdBNMrhi.webp', 'additional', NULL, NULL),
(21, 6, '/images/products/R9phgu9T1C.webp', 'base', NULL, NULL),
(22, 6, '/images/products/k8R2d1MiCT.webp', 'additional', NULL, NULL),
(23, 6, '/images/products/rX3IPqNWvn.webp', 'additional', NULL, NULL),
(24, 6, '/images/products/KHnOGzt8Ep.webp', 'additional', NULL, NULL),
(25, 7, '/images/products/9og6IARLNE.webp', 'base', NULL, NULL),
(26, 7, '/images/products/ddRCIVLTXd.webp', 'additional', NULL, NULL),
(27, 7, '/images/products/oqMANvnaD5.webp', 'additional', NULL, NULL),
(28, 7, '/images/products/KPHsvgWRDm.webp', 'additional', NULL, NULL),
(29, 8, '/images/products/keY4OoXOe4.webp', 'base', NULL, NULL),
(30, 8, '/images/products/dCsNGJQbbb.webp', 'additional', NULL, NULL),
(31, 8, '/images/products/7tAW8ED5hq.webp', 'additional', NULL, NULL),
(32, 8, '/images/products/X263gh72gf.webp', 'additional', NULL, NULL),
(33, 9, '/images/products/aYunFteYg6.webp', 'base', NULL, NULL),
(34, 9, '/images/products/m6ibd3hpwh.webp', 'additional', NULL, NULL),
(35, 9, '/images/products/HGuueQID54.webp', 'additional', NULL, NULL),
(36, 9, '/images/products/lcN6VkqjTw.webp', 'additional', NULL, NULL),
(37, 10, '/images/products/6E5wX5Zgan.webp', 'base', NULL, NULL),
(38, 10, '/images/products/ypnzNi6ULc.webp', 'additional', NULL, NULL),
(39, 10, '/images/products/MB7rDDQ0GS.webp', 'additional', NULL, NULL),
(40, 10, '/images/products/Z0KMQoUYDp.webp', 'additional', NULL, NULL),
(41, 10, '/images/products/9bDNSNNhZH.webp', 'additional', NULL, NULL),
(42, 11, '/images/products/GUSVaGyEPn.webp', 'base', NULL, NULL),
(43, 11, '/images/products/jDZOoyuMrd.webp', 'additional', NULL, NULL),
(44, 11, '/images/products/3IXeP0kqnk.webp', 'additional', NULL, NULL),
(45, 12, '/images/products/GUj2sOZUDj.webp', 'base', '2022-02-15 02:33:30', '2022-02-15 02:33:30'),
(46, 12, '/images/products/zRjD4PUjzv.webp', 'additional', '2022-02-15 02:33:31', '2022-02-15 02:33:31'),
(47, 12, '/images/products/YHAQ4uCIox.webp', 'additional', '2022-02-15 02:33:32', '2022-02-15 02:33:32'),
(48, 12, '/images/products/AgWjOV86tE.webp', 'additional', '2022-02-15 02:33:33', '2022-02-15 02:33:33'),
(49, 13, '/images/products/LijgcikIje.webp', 'base', NULL, NULL),
(50, 13, '/images/products/egasouujvJ.webp', 'additional', NULL, NULL),
(51, 13, '/images/products/ldES6gkTT4.webp', 'additional', NULL, NULL),
(52, 13, '/images/products/aMYWzUrTZ4.webp', 'additional', NULL, NULL),
(53, 14, '/images/products/tR6bmjhVtN.webp', 'base', NULL, NULL),
(54, 14, '/images/products/kgtTyYKePg.webp', 'additional', NULL, NULL),
(55, 14, '/images/products/ik1a2qwLK1.webp', 'additional', NULL, NULL),
(56, 14, '/images/products/o3bWuYpmwq.webp', 'additional', NULL, NULL),
(57, 15, '/images/products/3dcSosTyJm.webp', 'base', NULL, NULL),
(58, 15, '/images/products/8JGPVEoQkJ.webp', 'additional', NULL, NULL),
(59, 15, '/images/products/UKDAD3To4p.webp', 'additional', NULL, NULL),
(60, 15, '/images/products/XwOhm3yofM.webp', 'additional', NULL, NULL),
(61, 15, '/images/products/pFORtU1Oqi.webp', 'additional', NULL, NULL),
(62, 16, '/images/products/B0WyOzLmBO.webp', 'base', NULL, NULL),
(63, 16, '/images/products/O5AOgYJQNm.webp', 'additional', NULL, NULL),
(64, 16, '/images/products/U0rDGvIU8y.webp', 'additional', NULL, NULL),
(65, 16, '/images/products/ewoDdf4eay.webp', 'additional', NULL, NULL),
(66, 17, '/images/products/X6c6DzkEni.webp', 'base', NULL, NULL),
(67, 17, '/images/products/Y42Io0W3jY.webp', 'additional', NULL, NULL),
(68, 17, '/images/products/pqrrbXRzcA.webp', 'additional', NULL, NULL),
(69, 17, '/images/products/QnqCo5ClyJ.webp', 'additional', NULL, NULL),
(70, 17, '/images/products/1uLvguw6oQ.webp', 'additional', NULL, NULL),
(71, 18, '/images/products/evhij3lq8R.webp', 'base', NULL, NULL),
(72, 18, '/images/products/jcCCWoYdo9.webp', 'additional', NULL, NULL),
(73, 18, '/images/products/o7QDloJpjH.webp', 'additional', NULL, NULL),
(74, 18, '/images/products/mz39nRoJVk.webp', 'additional', NULL, NULL),
(75, 19, '/images/products/G0b0EJCKNf.webp', 'base', NULL, NULL),
(76, 19, '/images/products/tbPvBIbOUV.webp', 'additional', NULL, NULL),
(77, 19, '/images/products/nNNO8NMFjW.webp', 'additional', NULL, NULL),
(78, 19, '/images/products/rRL2Mjrd0j.webp', 'additional', NULL, NULL),
(79, 19, '/images/products/vbHOXoAWLR.webp', 'additional', NULL, NULL),
(80, 20, '/images/products/MNxwt35GYl.webp', 'base', NULL, NULL),
(81, 20, '/images/products/w5NyCIRoIZ.webp', 'additional', NULL, NULL),
(82, 20, '/images/products/fiKlEn7SdR.webp', 'additional', NULL, NULL),
(83, 20, '/images/products/1SzJc09Q1L.webp', 'additional', NULL, NULL),
(84, 21, '/images/products/GaaPwCpDKf.webp', 'base', NULL, NULL),
(85, 21, '/images/products/q27XLRceit.webp', 'additional', NULL, NULL),
(86, 21, '/images/products/doNhvLEKNs.webp', 'additional', NULL, NULL),
(87, 21, '/images/products/leeBIPpxsU.webp', 'additional', NULL, NULL),
(88, 22, '/images/products/4l1LV6eNfS.webp', 'base', NULL, NULL),
(89, 22, '/images/products/PWHNUfOUzj.webp', 'additional', NULL, NULL),
(90, 22, '/images/products/CFiNLnfr18.webp', 'additional', NULL, NULL),
(91, 23, '/images/products/8druJ8Ag4k.webp', 'base', NULL, NULL),
(92, 23, '/images/products/1H4OSSruDh.webp', 'additional', NULL, NULL),
(93, 23, '/images/products/maiNKUN0Ns.webp', 'additional', NULL, NULL),
(94, 24, '/images/products/DvKRMbOFCR.webp', 'base', NULL, NULL),
(95, 24, '/images/products/m3JmjZr2Tz.webp', 'additional', NULL, NULL),
(96, 25, '/images/products/ag323drGTc.webp', 'base', NULL, NULL),
(97, 25, '/images/products/8RZz6OVtzc.webp', 'additional', NULL, NULL),
(98, 25, '/images/products/sa5ViWTL2l.webp', 'additional', NULL, NULL),
(99, 25, '/images/products/NlSBCbaI6A.webp', 'additional', NULL, NULL),
(100, 25, '/images/products/rUynPy3Ycs.webp', 'additional', NULL, NULL),
(101, 26, '/images/products/6w5arLEMnO.webp', 'base', NULL, NULL),
(102, 26, '/images/products/rTm0iWtKmV.webp', 'additional', NULL, NULL),
(103, 26, '/images/products/lc47s7w3ts.webp', 'additional', NULL, NULL),
(104, 26, '/images/products/PkZbOVkW96.webp', 'additional', NULL, NULL),
(105, 27, '/images/products/Jx35Akri7E.webp', 'base', NULL, NULL),
(106, 27, '/images/products/S0CzUuQDPh.webp', 'additional', NULL, NULL),
(107, 28, '/images/products/aBVVN9YOoL.webp', 'base', NULL, NULL),
(108, 28, '/images/products/dKtnbPI11v.webp', 'additional', NULL, NULL),
(109, 28, '/images/products/m0S71yuTbk.webp', 'additional', NULL, NULL),
(110, 28, '/images/products/PUorDiJK3r.webp', 'additional', NULL, NULL),
(111, 28, '/images/products/0NXjd9NC7Z.webp', 'additional', NULL, NULL),
(112, 29, '/images/products/qMXuTWrl3c.webp', 'base', NULL, NULL),
(113, 29, '/images/products/F0h0OME5OW.webp', 'additional', NULL, NULL),
(114, 29, '/images/products/JoTeeinvkL.webp', 'additional', NULL, NULL),
(115, 30, '/images/products/h9DUMY5jzX.webp', 'base', NULL, NULL),
(116, 30, '/images/products/5cuBzB92xE.webp', 'additional', NULL, NULL),
(117, 30, '/images/products/nHdiHvRNs0.webp', 'additional', NULL, NULL),
(118, 30, '/images/products/Dr3Sd0LoJq.webp', 'additional', NULL, NULL),
(119, 31, '/images/products/pPGVDEnby0.webp', 'base', NULL, NULL),
(120, 31, '/images/products/Z6smEl2Wwd.webp', 'additional', NULL, NULL),
(121, 32, '/images/products/5lTSsvNPfJ.webp', 'base', NULL, NULL),
(122, 32, '/images/products/Pd9PzCo6X9.webp', 'additional', NULL, NULL),
(123, 33, '/images/products/v5Q6OuT0Yp.webp', 'base', NULL, NULL),
(124, 33, '/images/products/NAsHYwqBzv.webp', 'additional', NULL, NULL),
(125, 33, '/images/products/Qk9YchwYOS.webp', 'additional', NULL, NULL),
(126, 34, '/images/products/DmjxpgwnIv.webp', 'base', NULL, NULL),
(127, 34, '/images/products/34Emkm87Ee.webp', 'additional', NULL, NULL),
(128, 34, '/images/products/5LBEFwlRMA.webp', 'additional', NULL, NULL);

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
(35, 1);

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
(1, 1, 'en', 'Apple iPhone 11 64GB Yellow Fully Unlocked', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.\r\n\r\nKey Features:\r\n\r\n    slim body with metal cover\r\n    latest Intel Core i5-1135G7 processor (4 cores / 8 threads)\r\n    8GB DDR4 RAM and fast 512GB PCIe SSD\r\n    NVIDIA GeForce MX350 2GB GDDR5 graphics card\r\n    backlit keyboard, touchpad with gesture support', NULL, NULL, '2022-02-13 00:46:06', '2022-02-13 00:46:06'),
(2, 2, 'en', 'Apple iPhone X 64GB Silver Fully Unlocked', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-13 01:26:25', '2022-02-13 01:26:25'),
(3, 3, 'en', 'Samsung Galaxy A52 5G Android Cell Phone', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-13 01:30:20', '2022-02-13 01:30:20'),
(4, 4, 'en', 'Apple iPhone 11 Pro Max (64GB) – Silver', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-13 01:36:03', '2022-02-13 01:36:03'),
(5, 5, 'en', 'OnePlus 8 Pro Onyx Black Android Smartphone', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-13 01:41:17', '2022-02-13 01:41:17'),
(6, 6, 'en', 'Apple iPhone XS Max-64GB -white', '<p>6.5-inch Super Retina display (OLED) with HDR IP68 dust and water resistant (maximum depth of 2 meters up to 30 minutes) 12MP dual cameras with dual OIS and 7MP TrueDepth front camera&mdash;Portrait mode, Portrait Lighting, Depth Control, and Smart HDR&nbsp;</p>', '6.5-inch Super Retina display (OLED) with HDR IP68 dust and water resistant (maximum depth of 2 meters up to 30 minutes) 12MP dual cameras with dual OIS and 7MP TrueDepth front camera—Portrait mode, Portrait Lighting, Depth Control, and Smart HDR', NULL, NULL, '2022-02-13 02:11:05', '2022-02-13 02:11:05'),
(7, 7, 'en', 'Samsung Galaxy Note 10', '<p>Fast-charging, long-lasting intelligent power and super speed processing outlast whatever you throw at Note 10+. S pen&rsquo;s newest Evolution gives you the power of air gestures, a remote shutter and playlist button and handwriting-to-text, all in One Magic wand. 6.8&rdquo; Nearly Bezel-less Infinity Display* Ultrasonic In-Display Fingerprint ID&nbsp;</p>', 'Fast-charging, long-lasting intelligent power and super speed processing outlast whatever you throw at Note 10+. S pen’s newest Evolution gives you the power of air gestures, a remote shutter and playlist button and handwriting-to-text, all in One Magic wand. 6.8” Nearly Bezel-less Infinity Display* Ultrasonic In-Display Fingerprint ID', NULL, NULL, '2022-02-13 02:18:25', '2022-02-13 02:18:25'),
(8, 8, 'en', 'ASUS VivoBook 15 Thin and Light Laptop 15.6 inch FHD Display', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-14 05:36:08', '2022-02-14 05:36:08'),
(9, 9, 'en', 'ASUS VivoBook 17.3″ i5 8GB_1TB 17.3″ FHD Display', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-14 06:04:57', '2022-02-14 06:04:57'),
(10, 10, 'en', 'Apple Macbook Pro 13.3-inch 2.7Ghz Dual Core i5', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-14 23:40:48', '2022-02-14 23:40:48'),
(11, 11, 'en', 'ASUS VivoBook 15 inch FHD Slate Gray', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-15 01:02:40', '2022-02-15 01:02:40'),
(12, 12, 'en', 'Apple Macbook Pro 15.4 inch Laptop', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-15 02:31:06', '2022-02-15 02:31:06'),
(13, 13, 'en', 'Element 27 inch 1080p Frameless IPS LCD PC Monitor', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 01:42:46', '2022-02-20 01:42:46'),
(14, 14, 'en', 'JVC 70 inch Class 4K UHD 2160p Roku Smart TV', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support.</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 03:32:38', '2022-02-20 03:32:38'),
(15, 15, 'en', 'LG 43 inch 4K Ultra HD Smart LED TV 2020', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 03:45:01', '2022-02-20 03:45:01'),
(16, 16, 'en', 'SAMSUNG 75 inc Class 4K Ultra HD HDR Smart QLED TV', '<p>&lt;p&gt;The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.&lt;/p&gt; &lt;p&gt;Key Features:&lt;/p&gt; &lt;ul&gt; &lt;li&gt;slim body with metal cover&lt;/li&gt; &lt;li&gt;latest Intel Core i5-1135G7 processor (4 cores / 8 threads)&lt;/li&gt; &lt;li&gt;8GB DDR4 RAM and fast 512GB PCIe SSD&lt;/li&gt; &lt;li&gt;NVIDIA GeForce MX350 2GB GDDR5 graphics card&lt;/li&gt; &lt;li&gt;backlit keyboard, touchpad with gesture support&lt;/li&gt; &lt;/ul&gt;</p>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:08:00', '2022-02-20 04:08:00'),
(17, 17, 'en', 'Sony 65 inc Class 4K UHD LED Android Smart TV HDR BRAVIA', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:13:27', '2022-02-20 04:13:27'),
(18, 18, 'en', 'Apple MWP22AM-A AirPods Pro', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:25:57', '2022-02-20 04:25:57'),
(19, 19, 'en', 'Beats Studio3 Wireless Headphones – Matte Black', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:32:39', '2022-02-20 04:32:39'),
(20, 20, 'en', 'Bose QuietComfort Noise Cancelling Earbuds – Black', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:35:57', '2022-02-20 04:35:57'),
(21, 21, 'en', 'Bose Noise Cancelling Wireless Bluetooth', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:39:41', '2022-02-20 04:39:41'),
(22, 22, 'en', 'Google Pixel Buds, Clearly White', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-20 04:42:50', '2022-02-20 04:42:50'),
(23, 23, 'en', 'Cubitt Smart Watch CT2S Waterproof Fitness Tracker', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 00:19:37', '2022-02-22 00:19:37'),
(24, 24, 'en', 'Apple Watch Series 3 GPS – 42mm – Sport Band', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 00:25:42', '2022-02-22 00:25:42'),
(25, 25, 'en', 'SAMSUNG Galaxy Watch Active 2 Aluminum', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 00:41:30', '2022-02-22 00:41:30'),
(26, 26, 'en', 'Canon EOS Rebel Camera T7 EF-S 18-55mm IS II Kit', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 01:10:55', '2022-02-22 01:10:55'),
(27, 27, 'en', 'Canon SX740BK PowerShot SX740 HS Digital Camera', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 01:18:44', '2022-02-22 01:18:44'),
(28, 28, 'en', 'Fujifilm 16642939 X100V Digital Camera – Silver', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 01:24:22', '2022-02-22 01:24:22'),
(29, 29, 'en', 'FIRST DANCE Extra Large Shoes for Men Casual Shoes Camo Print Big Size Fashion Sneakers for Man', '<p>&lt;ul class=\"p-4 f\"&gt; &lt;li&gt;Ethylene Vinyl Acetate sole&lt;/li&gt; &lt;li&gt;Extra big size shoes for men, size from 12 to 15.&lt;/li&gt; &lt;li&gt;Good quality PU upper with camo print, suitable for autumn and winter&lt;/li&gt; &lt;li&gt;Lightweight EVA outsole, very comfortable to wear.&lt;/li&gt; &lt;li&gt;Classic lace up styles, easy to handle.&lt;/li&gt; &lt;li&gt;If you have troubles finding the right big size shoes for you, you should try ours.&lt;/li&gt; &lt;/ul&gt;</p>', 'FIRST DANCE Extra Large Shoes for Men Casual Shoes Camo Print Big Size Fashion Sneakers for Man', NULL, NULL, '2022-02-22 01:44:26', '2022-02-22 01:44:26'),
(30, 30, 'en', 'COKAFIL Mens Running Shoes Athletic Walking Blade Tennis Shoes Fashion Sneakers', '<ul class=\"p-4 f\">\r\n<li>Mesh Fabric</li>\r\n<li>Rubber sole</li>\r\n<li>Slip-on closure type easy put on &amp; off，simple and stylish color scheme,looking for beauty in simple life</li>\r\n<li>Fashion mesh upper design,keeps the feet dry and breathable, makes you fell comfortable while exercising</li>\r\n<li>Breathing Insole - The interior of the shoe is designed with a honeycomb hole to absorb sweat and deodorize, allowing your feet to breathe freely</li>\r\n<li>Blade Sneakers - The sole is made of Hollow Carved technology , providing stable support and optimal shock absorption for sports</li>\r\n<li>How To Define - Designed for walking comfortably and casual wear, but not really meant to be worn while doing a hard-core workout or High-intensity exercise</li>\r\n</ul>', 'COKAFIL Mens Running Shoes Athletic Walking Blade Tennis Shoes Fashion Sneakers', NULL, NULL, '2022-02-22 02:02:42', '2022-02-22 02:02:42'),
(31, 31, 'en', 'Wonder Nation Toddler Girls Glitter Casual Mary-Jane Sneakers', '<div id=\"additional-info\" class=\"\">\r\n<table id=\"product-attribute-specs-table\" class=\"featureTable\">\r\n<tbody>\r\n<tr>\r\n<td>Color</td>\r\n<td>Pink</td>\r\n</tr>\r\n<tr>\r\n<td>Brand</td>\r\n<td>Wonder Nation</td>\r\n</tr>\r\n<tr>\r\n<td>Gender</td>\r\n<td>Female</td>\r\n</tr>\r\n<tr>\r\n<td>Manufacturer Part Number</td>\r\n<td>GTWN41CA001</td>\r\n</tr>\r\n<tr>\r\n<td>Age Group</td>\r\n<td>Toddler</td>\r\n</tr>\r\n<tr>\r\n<td>Material</td>\r\n<td>UPPER:PU+ POLYESTER;OUTSOLE:TPR+POLYESTER</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Vintage style meets modern flare with this Casual Mary Jane Sneaker from Wonder Nation. Featuring a durable canvas upper and sturdy outsole, with a stay-put strap to ensure a snug fit. The Mary Jane sneaker is great for all day wear with any outfit!</li>\r\n</ul>\r\n<p>&nbsp;</p>', 'Material: Upper: Polyurethane/Polyester; Outsole: Thermoplastic Rubber/Polyester\r\n    Care: Wipe clean\r\n    Country of Origin: Imported\r\n    Closure: Slip on style for easy on and off; stay put strap\r\n    Features: Lightweight and durable; glitter accents; flower embellishment \r\n    Mary Jane Shoes for Girls from Wonder Nation', NULL, NULL, '2022-02-22 02:10:24', '2022-02-22 02:10:24'),
(32, 32, 'en', 'Dragon Touch Max10 Tablet Android 10.0 OS', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 02:33:31', '2022-02-22 02:33:31'),
(33, 33, 'en', 'Garmin Vivo smart 3 Activity Tracker – Large', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 02:58:36', '2022-02-22 02:58:36'),
(34, 34, 'en', 'Echo Dot (4th Gen, 2020 release) | Smart speaker', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, '2022-02-22 03:40:18', '2022-02-22 03:40:18'),
(35, 34, 'de', 'Echo Dot (4. Generation, Version 2020) | Intelligenter Lautsprecher', '<p>Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(36, 34, 'es', 'Echo Dot (4.ª generación, versión 2020) | Altavoz inteligente', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"20\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\" data-number-of-phrases=\"20\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"6\" data-number-of-phrases=\"20\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"8\" data-number-of-phrases=\"20\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"10\" data-number-of-phrases=\"20\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"12\" data-number-of-phrases=\"20\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"14\" data-number-of-phrases=\"20\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"16\" data-number-of-phrases=\"20\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(37, 34, 'bn', 'ইকো ডট (4th Gen, 2020 রিলিজ) | স্মার্ট স্পিকার', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"20\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\" data-number-of-phrases=\"20\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"6\" data-number-of-phrases=\"20\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"8\" data-number-of-phrases=\"20\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"10\" data-number-of-phrases=\"20\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"12\" data-number-of-phrases=\"20\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"14\" data-number-of-phrases=\"20\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"16\" data-number-of-phrases=\"20\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(38, 33, 'de', 'Garmin Vivo Smart 3 Activity Tracker – Groß', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet', NULL, NULL, NULL, NULL),
(39, 33, 'es', 'Rastreador de actividad Garmin Vivo smart 3 - Grande', '<p><span class=\"VIiyi\" lang=\"es\"> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(40, 33, 'bn', 'গারমিন ভিভো স্মার্ট 3 অ্যাক্টিভিটি ট্র্যাকার - বড়', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপ সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত', NULL, NULL, NULL, NULL),
(41, 32, 'de', 'Dragon Touch Max10-Tablet mit Android 10.0-Betriebssystem', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL);
INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(42, 32, 'es', 'Tableta Dragon Touch Max10 con sistema operativo Android 10.0', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(43, 32, 'bn', 'ড্রাগন টাচ ম্যাক্স 10 ট্যাবলেট অ্যান্ড্রয়েড 10.0 ওএস', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(44, 31, 'de', 'Wonder Nation Kleinkind Mädchen Glitter Casual Mary-Jane Turnschuhe', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"33\">Farbe Pink</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\" data-number-of-phrases=\"33\">Marke Wonder Nation</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"6\" data-number-of-phrases=\"33\">Geschlecht Weiblich</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"8\" data-number-of-phrases=\"33\">Hersteller-Teilenummer GTWN41CA001</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"10\" data-number-of-phrases=\"33\">Altersgruppe Kleinkind</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"12\" data-number-of-phrases=\"33\">Material OBERMATERIAL:PU+ POLYESTER;LAUFSOHLE:TPR+POLYESTER</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"14\" data-number-of-phrases=\"33\">Mit diesem l&auml;ssigen Mary Jane Sneaker von Wonder Nation trifft Vintage-Stil auf modernes Flair.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"33\">Ausgestattet mit einem strapazierf&auml;higen Canvas-Obermaterial und einer robusten Au&szlig;ensohle mit einem Halteriemen, um eine bequeme Passform zu gew&auml;hrleisten.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"16\" data-number-of-phrases=\"33\">Der Mary Jane Sneaker ist toll f&uuml;r den ganzen Tag mit jedem Outfit!</span></span></p>', 'Material: Obermaterial: Polyurethan/Polyester; Laufsohle: Thermoplastischer Gummi/Polyester\r\nPflege: Abwischen\r\nHerkunftsland: Importiert\r\nVerschluss: Stil zum Hineinschlüpfen für einfaches An- und Ausziehen; Bleiben Sie an Ort und Stelle\r\nEigenschaften: Leicht und langlebig; Glitzerakzente; Blumenverzierung\r\n  Mary Jane Schuhe für Mädchen von Wonder Nation', NULL, NULL, NULL, NULL),
(45, 31, 'es', 'Wonder Nation - Zapatillas deportivas Mary-Jane informales con purpurina para niñas pequeñas', '<p><span class=\"VIiyi\" lang=\"es\"> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"33\">Color rosa</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\" data-number-of-phrases=\"33\">Marca Wonder Nation</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"6\" data-number-of-phrases=\"33\">G&eacute;nero femenino</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"8\" data-number-of-phrases=\"33\">N&uacute;mero de pieza del fabricante GTWN41CA001</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"10\" data-number-of-phrases=\"33\">Grupo de edad Ni&ntilde;o peque&ntilde;o</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"12\" data-number-of-phrases=\"33\">Material SUPERIOR:PU+ POLIESTER;SUELA:TPR+POLYESTER</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"14\" data-number-of-phrases=\"33\">El estilo vintage se combina con el estilo moderno con esta zapatilla casual Mary Jane de Wonder Nation.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"33\">Con una parte superior de lona duradera y una suela exterior resistente, con una correa que se mantiene en su lugar para garantizar un ajuste ce&ntilde;ido.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"16\" data-number-of-phrases=\"33\">&iexcl;La zapatilla Mary Jane es ideal para usar todo el d&iacute;a con cualquier atuendo!</span></span></p>', 'Material: Empeine: Poliuretano/Poliéster; Suela: Goma Termoplástica/Poliéster\r\nCuidado: Limpiar\r\nPaís de origen: Importado\r\nCierre: estilo deslizable para poner y quitar fácilmente; quédate en la correa\r\nCaracterísticas: Ligero y duradero; acentos de purpurina; adorno de flores\r\n  Zapatos Mary Jane para niñas de Wonder Nation', NULL, NULL, NULL, NULL),
(46, 31, 'bn', 'ওয়ান্ডার নেশন টডলার গার্লস গ্লিটার ক্যাজুয়াল মেরি-জেন স্নিকার্স', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"33\">রঙ গোলাপি</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\" data-number-of-phrases=\"33\">ব্র্যান্ড ওয়ান্ডার নেশন</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"6\" data-number-of-phrases=\"33\">লিঙ্গ মহিলা</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"8\" data-number-of-phrases=\"33\">প্রস্তুতকারকের অংশ নম্বর GTWN41CA001</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"10\" data-number-of-phrases=\"33\">বয়স গ্রুপ টডলার</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"12\" data-number-of-phrases=\"33\">উপাদান উপরের:পিইউ+পলিয়েস্টার;আউটসোল:টিপিআর+পলিয়েস্টার</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"14\" data-number-of-phrases=\"33\">ওয়ান্ডার নেশনের এই নৈমিত্তিক মেরি জেন স্নিকারের সাথে ভিনটেজ শৈলী আধুনিক ফ্লেয়ারের সাথে মিলিত হয়।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"33\">একটি টেকসই ক্যানভাস উপরের এবং বলিষ্ঠ আউটসোল বৈশিষ্ট্যযুক্ত, একটি স্নাগ ফিট নিশ্চিত করার জন্য একটি স্টে-পুট স্ট্র্যাপ সহ।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"16\" data-number-of-phrases=\"33\">মেরি জেন স্নিকার যে কোনও পোশাকের সাথে সারাদিন পরার জন্য দুর্দান্ত!</span></span></p>', 'উপাদান: উপরের: পলিউরেথেন/পলিয়েস্টার; আউটসোল: থার্মোপ্লাস্টিক রাবার/পলিয়েস্টার\r\nযত্ন: পরিষ্কার মুছা\r\nউৎপত্তি দেশ: আমদানি করা\r\nবন্ধ: সহজে চালু এবং বন্ধ করার জন্য স্লিপ অন স্টাইল; চাবুক রাখা\r\nবৈশিষ্ট্য: লাইটওয়েট এবং টেকসই; চকচকে উচ্চারণ; ফুলের শোভা\r\n  ওয়ান্ডার নেশনের মেয়েদের জন্য মেরি জেন জুতা', NULL, NULL, NULL, NULL),
(47, 30, 'bn', 'কোকাফিল পুরুষদের রানিং জুতা অ্যাথলেটিক ওয়াকিং ব্লেড টেনিস জুতা ফ্যাশন স্নিকার্স', '<ul class=\"p-4 f\">\r\n<li><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"17\">ফ্যাব্রিক জাল</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\" data-number-of-phrases=\"17\">রাবার সোল</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"6\" data-number-of-phrases=\"17\">স্লিপ-অন ক্লোজার টাইপ সহজ চালু এবং বন্ধ করা, সহজ এবং আড়ম্বরপূর্ণ রঙের স্কিম, সাধারণ জীবনে সৌন্দর্য খুঁজছেন</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"8\" data-number-of-phrases=\"17\">ফ্যাশন জাল উপরের নকশা, পা শুষ্ক এবং নিঃশ্বাসযোগ্য রাখে, ব্যায়াম করার সময় আপনাকে আরামদায়ক করে তোলে</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"10\" data-number-of-phrases=\"17\">শ্বাস নেওয়ার ইনসোল - জুতার অভ্যন্তরটি ঘাম শোষণ এবং দুর্গন্ধযুক্ত করার জন্য একটি মধুচক্রের ছিদ্র দিয়ে ডিজাইন করা হয়েছে, যাতে আপনার পা অবাধে শ্বাস নিতে পারে।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"12\" data-number-of-phrases=\"17\">ব্লেড স্নিকার্স - একমাত্র ফাঁপা খোদাই প্রযুক্তি দিয়ে তৈরি, স্থিতিশীল সমর্থন এবং খেলাধুলার জন্য সর্বোত্তম শক শোষণ প্রদান করে</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"14\" data-number-of-phrases=\"17\">কীভাবে সংজ্ঞায়িত করবেন - আরামদায়ক হাঁটা এবং নৈমিত্তিক পরিধানের জন্য ডিজাইন করা হয়েছে, তবে হার্ড-কোর ওয়ার্কআউট বা উচ্চ-তীব্রতা ব্যায়াম করার সময় পরিধান করা উচিত নয়</span></span></li>\r\n</ul>', 'কোকাফিল পুরুষদের রানিং জুতা অ্যাথলেটিক ওয়াকিং ব্লেড টেনিস জুতা ফ্যাশন স্নিকার্স', NULL, NULL, NULL, NULL),
(48, 30, 'de', 'COKAFIL Herren Laufschuhe Athletic Walking Blade Tennisschuhe Fashion Sneakers', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"17\">Mesh-Gewebe</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\" data-number-of-phrases=\"17\">Gummisohle</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"6\" data-number-of-phrases=\"17\">Aufsteckverschluss, einfach an- und auszuziehen, einfaches und stilvolles Farbschema, auf der Suche nach Sch&ouml;nheit im einfachen Leben</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"8\" data-number-of-phrases=\"17\">Das modische Mesh-Obermaterial h&auml;lt die F&uuml;&szlig;e trocken und atmungsaktiv und sorgt daf&uuml;r, dass Sie sich beim Training wohl f&uuml;hlen</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"10\" data-number-of-phrases=\"17\">Atmungsaktive Einlegesohle - Das Innere des Schuhs ist mit einem Wabenloch ausgestattet, um Schwei&szlig; zu absorbieren und zu desodorieren, sodass Ihre F&uuml;&szlig;e frei atmen k&ouml;nnen</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"12\" data-number-of-phrases=\"17\">Blade Sneakers - Die Sohle besteht aus Hollow Carved-Technologie und bietet stabilen Halt und optimale Sto&szlig;d&auml;mpfung beim Sport</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"14\" data-number-of-phrases=\"17\">Wie zu definieren - Entworfen f&uuml;r bequemes Gehen und Freizeitkleidung, aber nicht wirklich dazu gedacht, w&auml;hrend eines harten Trainings oder hochintensiven Trainings getragen zu werden</span></span></p>', 'COKAFIL Herren Laufschuhe Athletic Walking Blade Tennisschuhe Fashion Sneakers', NULL, NULL, NULL, NULL),
(49, 30, 'es', 'COKAFIL Zapatillas de correr para hombre Zapatillas de tenis atléticas con cuchilla para caminar Zapatillas de deporte de moda', '<p><span class=\"VIiyi\" lang=\"es\"> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"17\">tela de malla</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\" data-number-of-phrases=\"17\">Suela de goma</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"6\" data-number-of-phrases=\"17\">Tipo de cierre deslizante f&aacute;cil de poner y quitar, esquema de color simple y elegante, buscando belleza en la vida simple</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"8\" data-number-of-phrases=\"17\">Dise&ntilde;o superior de malla de moda, mantiene los pies secos y transpirables, te hace sentir c&oacute;modo mientras haces ejercicio.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"10\" data-number-of-phrases=\"17\">Plantilla de respiraci&oacute;n: el interior del zapato est&aacute; dise&ntilde;ado con un orificio de panal para absorber el sudor y desodorizar, lo que permite que sus pies respiren libremente</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"12\" data-number-of-phrases=\"17\">Zapatillas Blade: la suela est&aacute; hecha de tecnolog&iacute;a Hollow Carved, que brinda un soporte estable y una absorci&oacute;n de impactos &oacute;ptima para los deportes</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"14\" data-number-of-phrases=\"17\">C&oacute;mo definirlo: dise&ntilde;ado para caminar c&oacute;modamente y con ropa informal, pero en realidad no est&aacute; dise&ntilde;ado para usarse mientras se hace un entrenamiento intenso o un ejercicio de alta intensidad.</span></span></p>', 'tela de malla\r\nSuela de goma\r\nTipo de cierre deslizante fácil de poner y quitar, esquema de color simple y elegante, buscando belleza en la vida simple\r\nDiseño superior de malla de moda, mantiene los pies secos y transpirables, te hace sentir cómodo mientras haces ejercicio.\r\nPlantilla de respiración: el interior del zapato está diseñado con un orificio de panal para absorber el sudor y desodorizar, lo que permite que sus pies respiren libremente\r\nZapatillas Blade: la suela está hecha de tecnología Hollow Carved, que brinda un soporte estable y una absorción de impactos óptima para los deportes\r\nCómo definirlo: diseñado para caminar cómodamente y con ropa informal, pero en realidad no está diseñado para usarse mientras se hace un entrenamiento intenso o un ejercicio de alta intensidad.', NULL, NULL, NULL, NULL),
(50, 29, 'de', 'FIRST DANCE Extra große Schuhe für Herren Freizeitschuhe Camo Print Big Size Fashion Sneakers für Herren', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"15\">Sohle aus Ethylen-Vinylacetat</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\" data-number-of-phrases=\"15\">Schuhe in extra gro&szlig;en Gr&ouml;&szlig;en f&uuml;r M&auml;nner, Gr&ouml;&szlig;e von 12 bis 15.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"6\" data-number-of-phrases=\"15\">Hochwertiges PU-Obermaterial mit Camo-Print, geeignet f&uuml;r Herbst und Winter</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"8\" data-number-of-phrases=\"15\">Leichte EVA-Laufsohle, sehr angenehm zu tragen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"10\" data-number-of-phrases=\"15\">Klassische Schn&uuml;rung, einfach zu handhaben.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"12\" data-number-of-phrases=\"15\">Wenn Sie Probleme haben, die richtigen gro&szlig;en Schuhe f&uuml;r Sie zu finden, sollten Sie unsere ausprobieren.</span></span></p>', 'FIRST DANCE Extra große Schuhe für Herren Freizeitschuhe Camo Print Big Size Fashion Sneakers für Herren', NULL, NULL, NULL, NULL),
(51, 29, 'es', 'PRIMERA DANZA Zapatos extra grandes para hombres Zapatos casuales Estampado de camuflaje Zapatillas de deporte de moda de gran tamaño para hombre', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"15\">Suela de Etileno Acetato de Vinilo</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\" data-number-of-phrases=\"15\">Zapatos de hombre talla extra grande, talla de la 12 a la 15.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"6\" data-number-of-phrases=\"15\">Parte superior de PU de buena calidad con estampado de camuflaje, adecuado para oto&ntilde;o e invierno</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"8\" data-number-of-phrases=\"15\">Suela de EVA ligera, muy c&oacute;moda de llevar.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"10\" data-number-of-phrases=\"15\">Estilos cl&aacute;sicos con cordones, f&aacute;ciles de manejar.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"12\" data-number-of-phrases=\"15\">Si tiene problemas para encontrar los zapatos de talla grande adecuados para usted, deber&iacute;a probar los nuestros</span></span></p>', 'Suela de Etileno Acetato de Vinilo\r\nZapatos de hombre talla extra grande, talla de la 12 a la 15.\r\nParte superior de PU de buena calidad con estampado de camuflaje, adecuado para otoño e invierno\r\nSuela de EVA ligera, muy cómoda de llevar.\r\nEstilos clásicos con cordones, fáciles de manejar.\r\nSi tiene problemas para encontrar los zapatos de talla grande adecuados para usted, debería probar los nuestros', NULL, NULL, NULL, NULL),
(52, 29, 'bn', 'পুরুষদের জন্য প্রথম নৃত্য অতিরিক্ত বড় জুতা নৈমিত্তিক জুতা ক্যামো প্রিন্ট বড় আকারের ফ্যাশন স্নিকার পুরুষদের জন্য', '<p><span class=\"VIiyi\" lang=\"bn\"> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"15\">ইথিলিন ভিনাইল অ্যাসিটেট একমাত্র</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\" data-number-of-phrases=\"15\">পুরুষদের জন্য অতিরিক্ত বড় সাইজের জুতা, 12 থেকে 15 পর্যন্ত সাইজ।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"6\" data-number-of-phrases=\"15\">ক্যামো প্রিন্ট সহ ভাল মানের PU উপরের, শরৎ এবং শীতের জন্য উপযুক্ত</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"8\" data-number-of-phrases=\"15\">লাইটওয়েট ইভা আউটসোল, পরতে খুব আরামদায়ক।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"10\" data-number-of-phrases=\"15\">ক্লাসিক লেস আপ শৈলী, পরিচালনা করা সহজ।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"12\" data-number-of-phrases=\"15\">আপনার জন্য সঠিক বড় আকারের জুতা খুঁজে পেতে সমস্যা হলে, আমাদের চেষ্টা করা উচিত।</span></span></p>', 'ইথিলিন ভিনাইল অ্যাসিটেট একমাত্র\r\nপুরুষদের জন্য অতিরিক্ত বড় সাইজের জুতা, 12 থেকে 15 পর্যন্ত সাইজ।\r\nক্যামো প্রিন্ট সহ ভাল মানের PU উপরের, শরৎ এবং শীতের জন্য উপযুক্ত\r\nলাইটওয়েট ইভা আউটসোল, পরতে খুব আরামদায়ক।\r\nক্লাসিক লেস আপ শৈলী, পরিচালনা করা সহজ।\r\nআপনার জন্য সঠিক বড় আকারের জুতা খুঁজে পেতে সমস্যা হলে, আমাদের চেষ্টা করা উচিত।', NULL, NULL, NULL, NULL),
(53, 28, 'de', 'Fujifilm 16642939 X100V Digitalkamera – Silber', '<p><span class=\"VIiyi\" lang=\"de\"> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(54, 28, 'es', 'Cámara digital Fujifilm 16642939 X100V - Plata', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(55, 28, 'bn', 'ফুজিফিল্ম 16642939 X100V ডিজিটাল ক্যামেরা – সিলভার', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span> </span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(56, 27, 'de', 'Cámara digital Canon SX740BK PowerShot SX740 HS', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(57, 27, 'bn', 'Canon SX740BK পাওয়ারশট SX740 HS ডিজিটাল ক্যামেরা', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(58, 26, 'de', 'Canon EOS Rebel Camera T7 EF-S 18–55 mm IS II Kit', '<p><span class=\"VIiyi\" lang=\"de\"> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(59, 26, 'es', 'Kit de cámara Canon EOS Rebel T7 EF-S 18-55 mm IS II', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(60, 26, 'bn', 'Canon EOS বিদ্রোহী ক্যামেরা T7 EF-S 18-55mm IS II কিট', '<p><span class=\"VIiyi\" lang=\"bn\"> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(61, 25, 'de', 'SAMSUNG Galaxy Watch Active 2 Aluminium', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL);
INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(62, 25, 'es', 'SAMSUNG Galaxy Watch Active 2 Aluminio', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(63, 25, 'bn', 'স্যামসাং গালাক্সি অ্যালুমিনিয়াম', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(64, 24, 'de', 'Apple Watch Series 3 GPS – 42 mm – Sportarmband', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(65, 24, 'es', 'Apple Watch Serie 3 GPS – 42 mm – Brazalete deportivo', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(66, 24, 'bn', 'অ্যাপল ওয়াচ সিরিজ 3 জিপিএস - 42 মিমি - স্পোর্টর্মব্যান্ড', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(67, 23, 'de', 'Cubitt Smart Watch CT2S Wasserdichter Fitness-Tracker', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span> </span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(68, 23, 'es', 'Reloj inteligente Cubitt CT2S Rastreador de ejercicios a prueba de agua', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, panel t&aacute;ctil con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(69, 23, 'bn', 'কিউবিট স্মার্ট ওয়াচ CT2S ওয়াটারপ্রুফ ফিটনেস ট্র্যাকার', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(70, 22, 'de', 'Google Pixel Buds, klar weiß', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(71, 22, 'es', 'Google Pixel Buds, claramente blanco', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, panel t&aacute;ctil con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(72, 22, 'bn', 'গুগল পিক্সেল বাডস, পরিষ্কারভাবে সাদা', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(73, 35, 'en', 'fsdfsdfwfewf', '<p>fsdsfdfwerew</p>', 'dfdsfdfds', NULL, NULL, '2022-03-03 00:27:22', '2022-03-03 00:27:22'),
(74, 36, 'en', 'mhmghjhjghj', '<p>yiuyiuyghjv</p>', 'gjhgjghjgj', NULL, NULL, '2022-03-03 00:40:09', '2022-03-03 00:40:09'),
(75, 37, 'en', 'irfan chy', '<p>fsdfdsfdsfs</p>', 'fffdgdgf', NULL, NULL, '2022-03-03 00:55:25', '2022-03-03 00:55:25'),
(76, 21, 'de', 'Drahtloses Bluetooth mit Bose-Noise-Cancelling', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(77, 21, 'es', 'Bluetooth inalámbrico con cancelación de ruido de Bose', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, panel t&aacute;ctil con soporte de gestos</span></span></p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(78, 21, 'bn', 'বোস নয়েজ ক্যানসেলিং ওয়্যারলেস ব্লুটুথ', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\"><span class=\"VIiyi\" lang=\"bn\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(79, 20, 'de', 'Bose QuietComfort Noise Cancelling Earbuds – Schwarz', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(80, 20, 'es', 'Auriculares con cancelación de ruido Bose QuietComfort - Negro', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(81, 20, 'bn', 'বস কোয়াইট কম্ফপোর্ট নয়েজ ক্যানসেলিং ইয়ারবাডস – কালো', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(82, 19, 'de', 'Beats Studio3 Wireless Kopfhörer – Mattschwarz', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(83, 19, 'es', 'Auriculares inalámbricos Beats Studio3 - Negro mate', '<p><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"de\" data-phrase-index=\"15\" data-number-of-phrases=\"19\"><span class=\"VIiyi\" lang=\"es\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos. Caracter&iacute;sticas clave: cuerpo delgado con cubierta de metal &Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos) RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5 teclado retroiluminado, panel t&aacute;ctil con soporte de gestos </span></span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(84, 19, 'bn', 'বিটস স্টুডিও 3 ওয়্যারলেস হেডফোন - ম্যাট ব্ল্যাক', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(85, 18, 'de', 'Apple MWP22AM-A AirPods Pro vvv', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, panel t&aacute;ctil con soporte de gestos</span> </span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL);
INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(86, 18, 'es', 'Apple MWP22AM-A AirPods ProT', '<p>The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.</p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'The Aspire 5 is a compact laptop in a thin case with a metal cover, a high-quality Full HD IPS display and a rich set of interfaces. Thanks to its powerful components, the laptop can handle resource-intensive tasks perfectly and is also suitable for most games.', NULL, NULL, NULL, NULL),
(87, 18, 'bn', 'এপেল MWP22AM-A এয়ারপ্রডস প্রো', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(88, 17, 'de', 'Sony 65 Inc Klasse 4K UHD LED Android Smart TV HDR BRAVIA', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(89, 17, 'es', 'Sony 65 inc Clase 4K UHD LED Android Smart TV HDR BRAVIA', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(90, 17, 'bn', 'সনি ৬৫ ইঞ্চি ক্লাস ৪কে ইউএহডি এন্ড্রয়েড স্মার্ট টিভি এইচডিয়ার', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(91, 16, 'de', 'SAMSUNG 75 Inc Klasse 4K Ultra HD HDR Smart QLED-Fernseher', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\"><span class=\"VIiyi\" lang=\"es\"> Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(92, 16, 'es', 'Televisor SAMSUNG 75 con Clase 4K Ultra HD HDR Smart QLED', '<p><span class=\"VIiyi\" lang=\"es\"> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span> </span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(93, 16, 'bn', 'স্যামসাং গায়ালাক্সি ৪কে এলিডি', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(94, 15, 'de', 'LG 43 Zoll 4K Ultra HD Smart LED-Fernseher 2020', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(95, 15, 'es', 'LG 43 pulgadas 4K Ultra HD Smart LED TV 2020', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, panel t&aacute;ctil con soporte de gestos</span> <br /></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(96, 15, 'bn', 'LG 43 ইঞ্চি 4K আল্ট্রা এইচডি স্মার্ট এলইডি টিভি 2020', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(97, 14, 'de', 'JVC 70 Zoll Klasse 4K UHD 2160p Roku Smart TV', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung.</span> </span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(98, 14, 'es', 'JVC 70 pulgadas Clase 4K UHD 2160p Roku Smart TV', '<p><span class=\"VIiyi\" lang=\"es\"> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, panel t&aacute;ctil con soporte de gestos.</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(99, 14, 'bn', 'JVC 70 ইঞ্চি ক্লাস 4K UHD 2160p Roku স্মার্ট টিভি', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড।</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(100, 13, 'de', 'Element 27 Zoll 1080p rahmenloser IPS-LCD-PC-Monitor', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(101, 13, 'es', 'Monitor de PC LCD IPS sin marco Element de 27 pulgadas y 1080p', '<p><span class=\"VIiyi\" lang=\"es\"> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, panel t&aacute;ctil con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(102, 13, 'bn', 'এলিমেন্ট 27 ইঞ্চি 1080p ফ্রেমলেস আইপিএস এলসিডি পিসি মনিটর', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(103, 12, 'de', 'Apple MacBook Pro 15,4 Zoll Laptop', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(104, 12, 'es', 'Portátil Apple Macbook Pro de 15,4 pulgadas', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, panel t&aacute;ctil con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(105, 12, 'bn', 'অ্যাপল ম্যাকবুক প্রো 15.4 ইঞ্চি ল্যাপটপ', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(106, 11, 'de', 'ASUS VivoBook 15 Zoll FHD Schiefergrau', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL);
INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(107, 11, 'es', 'ASUS VivoBook 15 pulgadas FHD Gris pizarra', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, panel t&aacute;ctil con soporte de gestos</span> </span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(108, 11, 'bn', 'আসোস বিবুক ১৫ ইঞ্চি এফএচডি স্লেট গ্রে', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(109, 10, 'de', 'Apple Macbook Pro 13,3 Zoll 2,7 GHz Dual Core i5', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span> </span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(110, 10, 'es', 'Apple Macbook Pro 13.3 pulgadas 2.7Ghz Dual Core i5', '<p><span class=\"VIiyi\" lang=\"es\"> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(111, 10, 'bn', 'এপ মেক বুক প্রো ১৩.৩-ইঞ্চি ২.৭Ghz ডুয়াল কোর i5', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি', NULL, NULL, NULL, NULL),
(112, 9, 'de', 'ASUS VivoBook 17,3″ i5 8GB_1TB 17,3″ FHD-Display', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(113, 9, 'es', 'ASUS VivoBook 17.3″ i5 8GB_1TB 17.3″ Pantalla FHD', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, panel t&aacute;ctil con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(114, 9, 'bn', 'আসোস বিবুক ১৭.৩″ i5 ৮জিবি_১টিবি ১৭.৩″ এফেইচডি ডিসপ্লে', '<p><span class=\"VIiyi\" lang=\"bn\"> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(115, 8, 'de', 'ASUS VivoBook 15 Dünner und leichter Laptop mit 15,6-Zoll-FHD-Display', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(116, 8, 'es', 'ASUS VivoBook 15 Laptop delgada y liviana Pantalla FHD de 15.6 pulgadas', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span> </span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(117, 8, 'bn', 'আসোস বিবুক ১৫ পাতলা এবং হালকা ল্যাপটপ 15.6 ইঞ্চি FHD ডিসপ্লে', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(118, 7, 'de', 'Samsung Galaxy Note 10 German', '<p>Fast-charging, long-lasting intelligent power and super speed processing outlast whatever you throw at Note 10+. S pen&rsquo;s newest Evolution gives you the power of air gestures, a remote shutter and playlist button and handwriting-to-text, all in One Magic wand. 6.8&rdquo; Nearly Bezel-less Infinity Display* Ultrasonic In-Display Fingerprint ID&nbsp;</p>', 'Fast-charging, long-lasting intelligent power and super speed processing outlast whatever you throw at Note 10+. S pen’s newest Evolution gives you the power of air gestures, a remote shutter and playlist button and handwriting-to-text, all in One Magic wand. 6.8” Nearly Bezel-less Infinity Display* Ultrasonic In-Display Fingerprint ID', NULL, NULL, NULL, NULL),
(119, 7, 'es', 'Samsung Galaxy nota 10', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"9\">La carga r&aacute;pida, la potencia inteligente de larga duraci&oacute;n y el procesamiento de s&uacute;per velocidad duran m&aacute;s que lo que arrojas en Note 10+.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"9\">El Evolution m&aacute;s nuevo de S pen le brinda el poder de los gestos a&eacute;reos, un obturador remoto y un bot&oacute;n de lista de reproducci&oacute;n y escritura a mano en texto, todo en una varita m&aacute;gica.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\" data-number-of-phrases=\"9\">Pantalla Infinity de 6.8&rdquo; casi sin bisel* Identificaci&oacute;n ultras&oacute;nica de huellas dactilares en pantalla</span> </span></p>', 'La carga rápida, la potencia inteligente de larga duración y el procesamiento de súper velocidad duran más que lo que arrojas en Note 10+. El Evolution más nuevo de S pen le brinda el poder de los gestos aéreos, un obturador remoto y un botón de lista de reproducción y escritura a mano en texto, todo en una varita mágica. Pantalla Infinity de 6.8” casi sin bisel* Identificación ultrasónica de huellas dactilares en pantalla', NULL, NULL, NULL, NULL),
(120, 7, 'bn', 'স্যামসাং গ্যালাক্সি নোট ১০', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"9\">দ্রুত-চার্জিং, দীর্ঘস্থায়ী বুদ্ধিমান শক্তি এবং সুপার স্পিড প্রসেসিং আপনি নোট 10+ এ যা কিছু ফেলুন তা ছাড়িয়ে যায়।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"9\">এস পেনের নতুন বিবর্তন আপনাকে বায়ু অঙ্গভঙ্গির শক্তি, একটি দূরবর্তী শাটার এবং প্লেলিস্ট বোতাম এবং হস্তাক্ষর থেকে পাঠ্য, সবই এক জাদুর কাঠিতে দেয়৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"4\" data-number-of-phrases=\"9\">6.8\" প্রায় বেজেল-লেস ইনফিনিটি ডিসপ্লে* আল্ট্রাসনিক ইন-ডিসপ্লে ফিঙ্গারপ্রিন্ট আইডি</span></span></p>', 'দ্রুত-চার্জিং, দীর্ঘস্থায়ী বুদ্ধিমান শক্তি এবং সুপার স্পিড প্রসেসিং আপনি নোট 10+ এ যা কিছু ফেলুন তা ছাড়িয়ে যায়। এস পেনের নতুন বিবর্তন আপনাকে বায়ু অঙ্গভঙ্গির শক্তি, একটি দূরবর্তী শাটার এবং প্লেলিস্ট বোতাম এবং হস্তাক্ষর থেকে পাঠ্য, সবই এক জাদুর কাঠিতে দেয়৷ 6.8&amp;quot; প্রায় বেজেল-লেস ইনফিনিটি ডিসপ্লে* আল্ট্রাসনিক ইন-ডিসপ্লে ফিঙ্গারপ্রিন্ট আই', NULL, NULL, NULL, NULL),
(121, 6, 'de', 'Apple iPhone XS Max-64GB -weiß', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"7\">6,5-Zoll-Super-Retina-Display (OLED) mit HDR IP68 staub- und wasserfest (maximale Tiefe von 2 Metern bis zu 30 Minuten) 12-MP-Dual-Kameras mit dualem OIS und 7-MP-TrueDepth-Frontkamera &ndash; Portr&auml;tmodus, Portr&auml;tbeleuchtung, Tiefensteuerung und Smart</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"7\">HDR</span></span></p>', '6,5-Zoll-Super-Retina-Display (OLED) mit HDR IP68 staub- und wasserfest (maximale Tiefe von 2 Metern bis zu 30 Minuten) 12-MP-Dual-Kameras mit dualem OIS und 7-MP-TrueDepth-Frontkamera – Porträtmodus, Porträtbeleuchtung, Tiefensteuerung und Smart HDR', NULL, NULL, NULL, NULL),
(122, 6, 'es', 'Apple iPhone XS Max-64 GB -blanco', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"7\">Pantalla Super Retina (OLED) de 6,5 pulgadas con HDR IP68 resistente al polvo y al agua (profundidad m&aacute;xima de 2 metros hasta 30 minutos) C&aacute;maras duales de 12 MP con OIS dual y c&aacute;mara frontal TrueDepth de 7 MP: modo retrato, iluminaci&oacute;n de retrato, control de profundidad y Smart</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"7\">HDR</span></span></p>', 'Pantalla Super Retina (OLED) de 6,5 pulgadas con HDR IP68 resistente al polvo y al agua (profundidad máxima de 2 metros hasta 30 minutos) Cámaras duales de 12 MP con OIS dual y cámara frontal TrueDepth de 7 MP: modo retrato, iluminación de retrato, control de profundidad y Smart HDR', NULL, NULL, NULL, NULL),
(123, 6, 'bn', 'সাদা এপেল আইফোন এক্সেস ম্যাক্স-৬৪জিবি', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"7\">6.5-ইঞ্চি সুপার রেটিনা ডিসপ্লে (OLED) HDR IP68 ধুলো এবং জল প্রতিরোধী (সর্বোচ্চ 2 মিটার গভীরতা 30 মিনিট পর্যন্ত) 12MP ডুয়াল ক্যামেরা সঙ্গে ডুয়াল OIS এবং 7MP TrueDepth ফ্রন্ট ক্যামেরা&mdash;পোর্ট্রেট মোড, পোর্ট্রেট আলো, গভীরতা নিয়ন্ত্রণ, এবং স্মার্ট</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"7\">এইচডিআর</span></span></p>', '6.5-ইঞ্চি সুপার রেটিনা ডিসপ্লে (OLED) HDR IP68 ধুলো এবং জল প্রতিরোধী (সর্বোচ্চ 2 মিটার গভীরতা 30 মিনিট পর্যন্ত) 12MP ডুয়াল ক্যামেরা সঙ্গে ডুয়াল OIS এবং 7MP TrueDepth ফ্রন্ট ক্যামেরা—পোর্ট্রেট মোড, পোর্ট্রেট আলো, গভীরতা নিয়ন্ত্রণ, এবং স্মার্ট এইচডিআর', NULL, NULL, NULL, NULL),
(124, 5, 'de', 'OnePlus 8 Pro Onyxschwarzes Android-Smartphone', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(125, 5, 'es', 'Teléfono inteligente Android OnePlus 8 Pro Onyx negro', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(126, 5, 'bn', 'ওয়ান প্লাস ৮ প্রো ব্ল্যাক এন্ড্রয়েড', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল HD IPS ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস রয়েছে৷ এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(127, 4, 'de', 'Apple iPhone 11 Pro Max (64 GB) – Silber', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(128, 4, 'es', 'Apple iPhone 11 Pro Max (64 GB) – Plata', '<p><span class=\"VIiyi\" lang=\"es\"> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(129, 4, 'bn', 'এপেল আইফোণ ১১ প্রো ম্যাক্স (৬৪জিবি)- সিলভার', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(130, 3, 'de', 'Samsung Galaxy A52 5G Android-Handy', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\"><span class=\"VIiyi\" lang=\"es\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet. Hauptmerkmale: schlankes Geh&auml;use mit Metallabdeckung neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads) 8 GB DDR4 RAM und schnelle 512 GB PCIe SSD NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL);
INSERT INTO `product_translations` (`id`, `product_id`, `local`, `product_name`, `description`, `short_description`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(131, 3, 'bn', 'স্যামসাং গ্যালাক্সি এ৫২ সেল ফোন', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\"><span class=\"VIiyi\" lang=\"bn\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত। মূল বৈশিষ্ট্য: ধাতু আবরণ সঙ্গে পাতলা শরীর সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড) 8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(132, 3, 'es', 'Celular Samsung Galaxy A52 5G Android', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(133, 2, 'es', 'Apple iPhone X 64GB Plata Totalmente Desbloqueado', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(134, 2, 'de', 'Apple iPhone X 64 GB Silber vollständig entsperrt', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span> </span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet.', NULL, NULL, NULL, NULL),
(135, 2, 'bn', 'এপেল আইফোন এক্স ৬৪ জিবি সিলভার সম্পূর্ণরূপে আনলক', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।', NULL, NULL, NULL, NULL),
(136, 1, 'de', 'Apple iPhone 11 64 GB gelb vollständig entsperrt', '<p><span class=\"VIiyi\" lang=\"de\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Das Aspire 5 ist ein kompakter Laptop in einem d&uuml;nnen Geh&auml;use mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Dank seiner leistungsstarken Komponenten bew&auml;ltigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch f&uuml;r die meisten Spiele geeignet.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Hauptmerkmale:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">schlankes Geh&auml;use mit Metallabdeckung</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">neuster Intel Core i5-1135G7 Prozessor (4 Kerne / 8 Threads)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8 GB DDR4 RAM und schnelle 512 GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2 GB GDDR5-Grafikkarte</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"de\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">Tastatur mit Hintergrundbeleuchtung, Touchpad mit Gestenunterst&uuml;tzung</span></span></p>', 'Das Aspire 5 ist ein kompakter Laptop in einem dünnen Gehäuse mit Metallabdeckung, einem hochwertigen Full-HD-IPS-Display und einer reichhaltigen Auswahl an Schnittstellen. Dank seiner leistungsstarken Komponenten bewältigt der Laptop ressourcenintensive Aufgaben perfekt und ist auch für die meisten Spiele geeignet', NULL, NULL, NULL, NULL),
(137, 1, 'es', 'Apple iPhone 11 64GB Amarillo Totalmente Desbloqueado', '<p><span class=\"VIiyi\" lang=\"es\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">La Aspire 5 es una computadora port&aacute;til compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">Gracias a sus potentes componentes, la computadora port&aacute;til puede manejar perfectamente tareas que requieren muchos recursos y tambi&eacute;n es adecuada para la mayor&iacute;a de los juegos.</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">Caracter&iacute;sticas clave:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">cuerpo delgado con cubierta de metal</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">&Uacute;ltimo procesador Intel Core i5-1135G7 (4 n&uacute;cleos/8 subprocesos)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">RAM DDR4 de 8 GB y SSD PCIe r&aacute;pido de 512 GB</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">Tarjeta gr&aacute;fica NVIDIA GeForce MX350 2GB GDDR5</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"es\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">teclado retroiluminado, touchpad con soporte de gestos</span></span></p>', 'La Aspire 5 es una computadora portátil compacta en una carcasa delgada con una cubierta de metal, una pantalla IPS Full HD de alta calidad y un amplio conjunto de interfaces. Gracias a sus potentes componentes, la computadora portátil puede manejar perfectamente tareas que requieren muchos recursos y también es adecuada para la mayoría de los juegos.', NULL, NULL, NULL, NULL),
(138, 1, 'bn', 'এপেল আইফোন হলুদ সম্পূর্ণরূপে আনলক করা হয়েছে', '<p><span class=\"VIiyi\" lang=\"bn\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"2\" data-number-of-phrases=\"19\">Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"3\" data-number-of-phrases=\"19\">এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপটি সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত।</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"5\" data-number-of-phrases=\"19\">মূল বৈশিষ্ট্য:</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"7\" data-number-of-phrases=\"19\">ধাতু আবরণ সঙ্গে পাতলা শরীর</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"9\" data-number-of-phrases=\"19\">সর্বশেষ ইন্টেল কোর i5-1135G7 প্রসেসর (4 কোর / 8 থ্রেড)</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"11\" data-number-of-phrases=\"19\">8GB DDR4 RAM এবং দ্রুত 512GB PCIe SSD</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"13\" data-number-of-phrases=\"19\">NVIDIA GeForce MX350 2GB GDDR5 গ্রাফিক্স কার্ড</span> <span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"bn\" data-language-to-translate-into=\"en\" data-phrase-index=\"15\" data-number-of-phrases=\"19\">ব্যাকলিট কীবোর্ড, অঙ্গভঙ্গি সমর্থন সহ টাচপ্যাড</span></span></p>\r\n<p>Key Features:</p>\r\n<ul>\r\n<li>slim body with metal cover</li>\r\n<li>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card</li>\r\n<li>backlit keyboard, touchpad with gesture support</li>\r\n</ul>', 'Aspire 5 হল একটি কমপ্যাক্ট ল্যাপটপ যার একটি পাতলা কেস একটি ধাতব কভার, একটি উচ্চ মানের ফুল এইচডি আইপিএস ডিসপ্লে এবং একটি সমৃদ্ধ ইন্টারফেস। এর শক্তিশালী উপাদানগুলির জন্য ধন্যবাদ, ল্যাপটপ সম্পদ-নিবিড় কাজগুলি নিখুঁতভাবে পরিচালনা করতে পারে এবং বেশিরভাগ গেমের জন্যও উপযুক্ত', NULL, NULL, NULL, NULL);

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
(2, 'storefront_theme_color', 0, '#a842ca', NULL, '2022-03-02 22:55:28'),
(3, 'storefront_mail_theme_color', 0, '#000000', NULL, '2021-11-27 20:39:51'),
(4, 'storefront_slider', 0, NULL, NULL, NULL),
(5, 'storefront_terms_and_condition_page', 0, '', NULL, '2022-03-02 22:55:28'),
(6, 'storefront_privacy_policy_page', 0, '', NULL, '2022-03-02 22:55:28'),
(7, 'storefront_address', 1, NULL, NULL, NULL),
(8, 'storefront_navbar_text', 1, NULL, NULL, NULL),
(9, 'storefront_primary_menu', 0, '1', NULL, '2022-02-25 12:06:32'),
(10, 'storefront_category_menu', 0, '', NULL, '2022-02-25 12:06:32'),
(11, 'storefront_footer_menu_title_one', 1, NULL, NULL, NULL),
(12, 'storefront_footer_menu_one', 0, '1', NULL, '2022-02-25 12:06:32'),
(13, 'storefront_footer_menu_title_two', 1, NULL, NULL, NULL),
(14, 'storefront_footer_menu_two', 0, '', NULL, '2022-02-25 12:06:32'),
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
(35, 'storefront_footer_tag_id', 0, '[\"1\",\"2\",\"4\",\"7\"]', NULL, '2022-02-25 12:04:33'),
(36, 'storefront_copyright_text', 1, NULL, NULL, NULL),
(37, 'storefront_payment_method_image', 0, NULL, NULL, NULL),
(38, 'storefront_newsletter_image', 0, NULL, NULL, NULL),
(39, 'storefront_product_page_image', 0, NULL, NULL, NULL),
(40, 'storefront_call_action_url', 0, NULL, NULL, NULL),
(41, 'storefront_open_new_window', 0, NULL, NULL, NULL),
(42, 'storefront_slider_banner_1_image', 0, NULL, NULL, NULL),
(43, 'storefront_slider_banner_1_call_to_action_url', 0, 'https://www.facebook.com/', NULL, '2022-02-21 15:40:54'),
(44, 'storefront_slider_banner_1_open_in_new_window', 0, '1', NULL, '2022-02-21 15:40:54'),
(45, 'storefront_slider_banner_2_image', 0, NULL, NULL, NULL),
(46, 'storefront_slider_banner_2_call_to_action_url', 0, 'http://localhost/cartpro/product/samsung-galaxy-m02s/20', NULL, '2022-02-21 15:40:54'),
(47, 'storefront_slider_banner_2_open_in_new_window', 0, '1', NULL, '2022-02-21 15:40:54'),
(48, 'storefront_one_column_banner_enabled', 0, '1', NULL, '2022-02-25 11:27:54'),
(49, 'storefront_one_column_banner_image', 0, NULL, NULL, NULL),
(50, 'storefront_one_column_banner_call_to_action_url', 0, 'https://www.facebook.com/', NULL, '2022-02-25 11:27:55'),
(51, 'storefront_one_column_banner_open_in_new_window', 0, '1', NULL, '2022-02-25 11:27:55'),
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
(129, 'storefront_slider_banner_3_call_to_action_url', 0, 'http://localhost:8081/CartPro/product/bose-noise-cancelling-wireless-bluetooth/5', NULL, '2022-02-21 15:40:54'),
(130, 'storefront_slider_banner_3_open_in_new_window', 0, '0', NULL, '2022-02-21 15:40:54'),
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
(149, 'store_front_slider_format', 0, 'half_width', NULL, '2022-03-02 22:55:28'),
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
(1, 1, '', '', '2022-02-25 11:37:25', '2022-02-25 11:37:25');

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
(1, NULL, 'Paypal', 'Test', NULL, 'AU9xEUcAhAZ9uK_UNVseT4RAiOVABw38vUjPYDth_M9IGCQp4Ez_WJ8s1HtztNdx3Nt58NuaFKcWX98b', 'EEjSv_jGB0xYCRs3-8L9aEsAp56LeQOOSNNTaXR1LirZxq6Nmgn70tL5jInojNIoCp_JbW_jjoOMT1qG', '2022-02-25 12:14:17', '2022-02-25 12:14:17');

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
(1, 'CartPro', 'CartPro', 'support@lion-coders.com', '01829495876', 'Dewanhat', '', 'Chittagong', 'Bangladesh', NULL, '4330', 'images/general/SvTuwlRwTQ.webp', NULL, NULL, '2022-02-14 00:01:00', '2022-02-14 00:01:00');

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
(34, 128, 'en', 'Headphone', '2021-09-06 03:39:58', '2022-02-21 15:34:27'),
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
(76, 36, 'en', 'Copyright &amp; CartPro 2021. All rights reserved', '2021-11-18 04:05:38', '2022-02-25 12:04:33');

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
  `url` text DEFAULT NULL,
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
(1, 'enhance-your', 'category', 1, '', 'images/sliders/Y6OaZnvCjf.webp', 'images/sliders/full_width/fTPkfLfh9R.webp', 'images/sliders/secondary/Tq0z4vPfJ9.webp', 'new_tab', '1', 'left', '#00ff40', '2022-02-13 03:46:32', '2022-03-02 22:52:46', NULL),
(2, 'the-world-largest', 'category', 4, '', 'images/sliders/P4HwhrzWJr.webp', 'images/sliders/full_width/QRNczJfKao.webp', 'images/sliders/secondary/l7cWkOI6fx.webp', 'new_tab', '1', 'left', '#000000', '2022-02-21 15:49:20', '2022-03-02 22:51:52', NULL),
(3, 'shop-what', 'category', 1, '', 'images/sliders/8a3E2Tuj1F.webp', 'images/sliders/full_width/CSynIH3GZk.webp', 'images/sliders/secondary/hoUe7hUuAK.webp', 'new_tab', '1', 'left', '#000000', '2022-02-21 15:51:04', '2022-03-02 22:50:28', NULL),
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
(3, 3, 'en', 'Shop What', 'you desire', '2022-02-21 15:51:04', '2022-02-21 15:51:04'),
(4, 4, 'en', 'Test', 'Test 2', '2022-02-27 06:13:49', '2022-02-27 06:13:49'),
(5, 5, 'en', 'trete', 'tert', '2022-02-27 07:35:16', '2022-02-27 07:35:16'),
(6, 6, 'en', 'Test 45', 'testbb', '2022-02-28 02:31:23', '2022-02-28 02:31:23');

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
(3, 42, 'slider_banner_1', 'slider_banner', '/images/storefront/slider_banners/Nvr10ycbje.jpg', '2022-02-21 15:22:35', '2022-02-21 15:40:54'),
(4, 45, 'slider_banner_2', 'slider_banner', '/images/storefront/slider_banners/BWF4Zx5IZp.webp', '2022-02-21 15:32:03', '2022-02-21 15:34:27'),
(5, 127, 'slider_banner_3', 'slider_banner', '/images/storefront/slider_banners/Kqyy8ifW7g.webp', '2022-02-21 15:34:27', '2022-02-21 15:34:27'),
(6, NULL, 'three_column_full_width_banners_image_1', 'three_column_full_width_banners', '/images/storefront/three_column_full_width_banners/PG575eXkUO.png', '2022-02-25 11:06:18', '2022-02-25 11:06:18'),
(7, NULL, 'three_column_full_width_banners_image_2', 'three_column_full_width_banners', '/images/storefront/three_column_full_width_banners/NcwDRh0vZd.png', '2022-02-25 11:06:18', '2022-02-25 11:06:18'),
(8, NULL, 'three_column_full_width_banners_image_3', 'three_column_full_width_banners', '/images/storefront/three_column_full_width_banners/Amx863A7II.png', '2022-02-25 11:06:19', '2022-02-25 11:06:19'),
(9, NULL, 'three_column_banners_image_1', 'three_column_banners', '/images/storefront/three_column_banners/gNm5G6hd5K.png', '2022-02-25 11:20:47', '2022-02-25 11:20:47'),
(10, NULL, 'three_column_banners_image_2', 'three_column_banners', '/images/storefront/three_column_banners/qWHafNdN2N.png', '2022-02-25 11:20:47', '2022-02-25 11:20:47'),
(11, NULL, 'three_column_banners_image_3', 'three_column_banners', '/images/storefront/three_column_banners/BvP0BHJ3wL.png', '2022-02-25 11:20:47', '2022-02-25 11:20:47'),
(12, NULL, 'two_column_banner_image_1', 'two_column_banners', '/images/storefront/two_column_banners/vPsK9rVJRG.png', '2022-02-25 11:26:30', '2022-02-25 11:26:30'),
(13, NULL, 'two_column_banner_image_2', 'two_column_banners', '/images/storefront/two_column_banners/eTG56tfFWR.png', '2022-02-25 11:26:30', '2022-02-25 11:26:30'),
(14, NULL, 'one_column_banner_image', 'one_column_banner', '/images/storefront/one_column_banner/g5aHstE35F.png', '2022-02-25 11:27:55', '2022-02-25 11:27:55'),
(15, NULL, 'accepted_payment_method_image', 'payment_method', '/images/storefront/payment_method/ms82rZ9HMJ.webp', '2022-02-25 11:31:33', '2022-02-25 11:34:26'),
(16, NULL, 'newsletter_background_image', 'newletter', '/images/storefront/newsletter/Gaw0vOxtJj.png', '2022-02-25 11:54:03', '2022-02-25 11:54:03');

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
(1, 'স্মার্টফোন', 1, '2022-02-25 11:58:31', '2022-03-02 07:43:22'),
(2, 'অ্যান্ড্রয়েড', 1, '2022-02-25 11:58:40', '2022-03-02 07:43:15'),
(3, 'আইফোন', 1, '2022-02-25 11:58:49', '2022-03-02 07:43:05'),
(4, 'ল্যাপটপ', 1, '2022-02-25 11:59:11', '2022-03-02 07:42:58'),
(5, 'ডেস্কটপ', 1, '2022-02-25 11:59:18', '2022-03-02 07:42:49'),
(6, 'এইচডি-টিভি', 1, '2022-02-25 11:59:39', '2022-03-02 07:42:40'),
(7, 'হেডফোন', 1, '2022-02-25 11:59:51', '2022-03-02 07:42:33');

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
(1, 1, 'en', 'Bangladesh', 'BD Tax', 'Chittagong', 'Chittagong', '2022-02-13 00:18:27', '2022-02-13 00:18:27');

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
(1, 'admin', 'Irfan', 'Chowdhury', '123456789', 'admin@gmail.com', '$2y$10$WcnC16AXG/mNrVBWQGjfoegFO.1wjiIiBv5LxEHR6uQaJYVciYCOa', 1, 4, 0, 'images/admin/aNiJfKILIo.webp', NULL, 'bdPgdVmH8nKDs0a9quLJobpYBNkjLoY3u7VVSLIXwIkvZGD94ISznt2tbEkh', NULL, NULL, 1, NULL, '2020-12-13 14:35:51', '2022-01-18 22:39:06'),
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
(43, 'ferigyxy', 'Alan', 'Cantrell', '+1 (987) 341-9149', 'zuhair2025@gmail.com', '$2y$10$hN/SSRleeEtzM0mkf7jisO2JgrGsZBDmpDuURleKR47nn5aWy6GHG', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-16 09:39:12', '2022-01-16 09:39:12');

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
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 34, 2, '2022-03-01 08:08:28', '2022-03-01 08:08:28');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_sets`
--
ALTER TABLE `attribute_sets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_translations`
--
ALTER TABLE `coupon_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sales`
--
ALTER TABLE `flash_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `flash_sale_translations`
--
ALTER TABLE `flash_sale_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keyword_hits`
--
ALTER TABLE `keyword_hits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_translations`
--
ALTER TABLE `menu_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `storefront_images`
--
ALTER TABLE `storefront_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
