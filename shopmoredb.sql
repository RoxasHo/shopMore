-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 11:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopmoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics', '2024-04-25 07:32:50', '2024-05-08 04:51:28'),
(2, 'Home and Kitchen', 'home-and-kitchen', '2024-04-25 07:38:15', '2024-05-08 05:01:05'),
(3, 'Fashion', 'fashion', '2024-04-25 08:11:57', '2024-05-08 05:12:00'),
(4, 'Sports and Outdoors', 'sports-and-outdoors', '2024-05-08 05:19:22', '2024-05-08 05:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `courier_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`user_id`, `name`, `password`, `courier_type`, `created_at`, `updated_at`) VALUES
('ctlink01', 'City-Link staff 01', '$2y$10$agB1VlKIFkQYzch7TTPPP.JOy2Ajupk6zcIjrbJpUv0AV8Olnbvwa', 4, '2024-04-30 21:51:35', '2024-04-30 21:51:35'),
('fedex01', 'Fedex Staff 01', '$2y$10$TeHcFkZWrIQQLoDtiBGSoeZrTUbXcAfk0Teg56NV6iTesTpeNz3Hu', 2, '2024-04-30 21:48:36', '2024-04-30 21:48:36'),
('gdex01', 'GDEX Staff 01', '$2y$10$uCSbPyi5etZ1FHX2f1vyeOtEx1Ea00fe9p/amPpeIZBqCvEDDwjMa', 1, '2024-04-30 21:47:12', '2024-04-30 21:47:12'),
('jtxprs01', 'J&T Express Staff 01', '$2y$10$b6ts0JolUEtm87g1Fzhu9e84gSmCOKVszsUA7KNhHFYrMsbcSqxRW', 3, '2024-04-30 21:48:36', '2024-04-30 21:48:36'),
('ninjavan01', 'NinjaVan Staff 01', '$2y$10$3IDaf4e9rjn7XZ4zHgPBCes20v/MuKpMSJb8poYBAupE8vcnVZQ.y', 5, '2024-04-30 21:51:35', '2024-04-30 21:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `customer_report`
--

CREATE TABLE `customer_report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CID` bigint(20) UNSIGNED NOT NULL,
  `Description` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `repy` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_report`
--

INSERT INTO `customer_report` (`id`, `CID`, `Description`, `status`, `repy`, `created_at`, `updated_at`, `Rating`) VALUES
(1, 10001, 'No money leh', 'Replied', 'aqa', '2024-05-11 03:35:35', '2024-05-11 06:30:18', 0),
(2, 10001, 'Very poor', 'Submitted', 'No replied yet', '2024-05-11 03:36:36', '2024-05-11 03:36:36', 0),
(3, 10001, 'qw', 'Replied', 'Go earn money', '2024-05-11 03:37:23', '2024-05-11 06:30:01', 3),
(4, 10001, 'Give me some money', 'Replied', 'i Dong want', '2024-05-11 06:43:28', '2024-05-11 06:50:17', 0),
(5, 10001, 'No money leh', 'Replied', 'Go earn money', '2024-05-11 06:46:34', '2024-05-11 09:03:56', 2),
(6, 10001, 'Very expensive', 'Replied', 'Go earn money', '2024-05-11 07:01:17', '2024-05-11 09:03:28', 1),
(7, 2, 'wqfaaweqwr', 'Replied', 'idc', '2024-05-12 00:08:21', '2024-05-12 00:09:43', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer_service_personnel`
--

CREATE TABLE `customer_service_personnel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `Rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `Question`, `Answer`, `created_at`, `updated_at`) VALUES
(0, 'I no money too', 'alamak', '2024-05-11 23:46:50', '2024-05-11 23:47:01'),
(1, 'sada', 'dsa', '2024-05-10 05:46:42', '2024-05-10 05:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_15_131606_create_categories_table', 1),
(6, '2024_04_15_131638_create_products_table', 1),
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2024_04_15_131606_create_categories_table', 1),
(18, '2024_04_15_131638_create_products_table', 1),
(19, '2024-04-14_000000_create_tracking_log_table', 2),
(20, '2024-04-14_100000_create_tracking_table', 2),
(21, '2024_04_14_000000_create_courier_table', 2),
(22, '2024_05_02_063742_create_orders_table', 3),
(23, '2024_05_02_120119_create_order_items_table', 3),
(24, '2024_05_08_135613_payments', 4),
(25, '2024_04_29_053539_create_customer_service_personnel_table', 5),
(26, '2024_04_30_182853_create_customer_report_table', 5),
(27, '2024_05_05_051420_create_faq_table', 6),
(28, '2024_05_10_051420_create_faq_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` enum('Johor','Kedah','Kelantan','Malacca','Negeri Sembilan','Pahang','Penang','Perak','Perlis','Sabah','Sarawak','Selangor','Terengganu','Kuala Lumpur','Putrajaya','Labuan') NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `firstname`, `lastname`, `address`, `city`, `state`, `postcode`, `phone`, `email`, `user_id`, `product`, `Quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'test', 'test', 'Kelantan', '213', '32131', 'test@gmail.com', 1, 'Test', '1', 34453.10, '2024-05-11 23:38:27', '2024-05-11 23:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) NOT NULL,
  `stock_status` enum('instock','outofstock') NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `image` varchar(255) NOT NULL,
  `images` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Smart LED TV', 'smart-led-tv', 'Smart LED TV', 'Immerse yourself in stunning visuals with this Smart LED TV. Featuring a sleek design and vibrant display, this TV brings your favorite movies, shows, and games to life. With built-in streaming apps and voice control functionality, it offers endless entertainment options at your fingertips.', 699.99, 1.00, 'elec01', 'instock', 0, 100, '1715172668.png', NULL, 1, '2024-04-27 18:07:11', '2024-05-11 23:45:02'),
(2, 'Portable Bluetooth Speaker', 'portable-bluetooth-speaker', 'Portable Bluetooth Speaker', 'Take your music anywhere with this portable Bluetooth speaker. With crisp, clear sound and long battery life, it\'s perfect for parties, picnics, and outdoor adventures. Plus, its compact design and durable construction make it easy to carry and resistant to wear and tear.', 49.99, 49.99, 'elec02', 'instock', 0, 100, '1715172858.png', NULL, 1, '2024-04-27 19:19:36', '2024-05-07 20:54:18'),
(3, 'Digital Camera Kit', 'digital-camera-kit', 'Digital Camera Kit', 'Capture every moment with this digital camera kit. Featuring a high-resolution camera body, interchangeable lenses, and accessories, it\'s ideal for photography enthusiasts and professionals alike. Whether you\'re shooting landscapes, portraits, or action shots, this kit delivers exceptional image quality and versatility.', 999.99, 999.99, 'elec03', 'instock', 0, 5, '1715172982.png', NULL, 1, '2024-04-28 02:04:22', '2024-05-07 20:56:22'),
(4, 'Wireless Charging Pad', 'wireless-charging-pad', 'Wireless Charging Pad', ' Say goodbye to tangled cables with this wireless charging pad. Simply place your compatible device on the pad to enjoy fast and convenient charging without the hassle of cords. Sleek and compact, it\'s perfect for your home, office, or bedside table.', 29.99, 29.99, 'elec04', 'instock', 0, 100, '1715173088.png', NULL, 1, '2024-05-07 20:58:08', '2024-05-07 20:58:08'),
(5, 'Robotic Vacuum Cleaner', 'robotic-vacuum-cleaner', 'Robotic Vacuum Cleaner', 'Keep your home clean without lifting a finger with this robotic vacuum cleaner. Equipped with advanced navigation technology, it efficiently navigates around furniture and obstacles to vacuum carpets, hardwood floors, and tile. With scheduling options and app control, you can enjoy a spotless home with minimal effort.', 249.99, 249.99, 'home01', 'instock', 0, 100, '1715173229.png', NULL, 2, '2024-05-07 21:00:29', '2024-05-07 21:00:29'),
(6, 'Stainless Steel Blender', 'stainless-steel-blender', 'Stainless Steel Blender', 'Blend, puree, and mix with ease using this stainless steel blender. Featuring a powerful motor and durable blades, it effortlessly pulverizes fruits, vegetables, and ice for smoothies, soups, and sauces. With variable speed settings and preset programs, you can achieve perfect results every time.', 79.99, 79.99, 'home02', 'instock', 0, 100, '1715173342.png', NULL, 2, '2024-05-07 21:02:22', '2024-05-07 21:02:22'),
(7, 'Non-Stick Cookware Set', 'non-stick-cookware-set', 'Non-Stick Cookware Set', 'Upgrade your kitchen with this non-stick cookware set. Made from durable aluminum, each piece features a non-stick coating for easy cooking and cleaning. From frying pans to saucepans, this set has everything you need to whip up delicious meals for your family and friends.', 129.99, 129.99, 'home03', 'instock', 0, 100, '1715173695.png', NULL, 2, '2024-05-07 21:08:15', '2024-05-07 21:08:15'),
(8, 'Electric Pressure Cooker', 'electric-pressure-cooker', 'Electric Pressure Cooker', 'Cook meals quickly and effortlessly with this electric pressure cooker. With multiple cooking modes and preset programs, it\'s perfect for busy weeknights and weekend gatherings. Plus, its large capacity and easy-to-use controls make it a must-have appliance for any kitchen.', 89.99, 89.99, 'home04', 'instock', 0, 100, '1715173872.png', NULL, 2, '2024-05-07 21:11:12', '2024-05-07 21:11:12'),
(9, 'Classic Men\'s Watch', 'classic-mens-watch', 'Classic Men\'s Watch', 'Elevate your style with this classic men\'s watch. Featuring a stainless steel case, quartz movement, and leather strap, it exudes sophistication and timeless elegance. Whether you\'re dressing up for a special occasion or keeping it casual, this watch adds the perfect finishing touch to any outfit.', 199.99, 199.99, 'fashion01', 'instock', 0, 100, '1715174008.png', NULL, 3, '2024-05-07 21:13:28', '2024-05-07 21:13:28'),
(10, 'Boho Chic Maxi Dress', 'boho-chic-maxi-dress', 'Boho Chic Maxi Dress', 'Make a statement with this boho chic maxi dress. Crafted from lightweight fabric with vibrant prints and flowing silhouettes, it\'s perfect for summer festivals, beach vacations, and garden parties. Pair it with sandals and accessories for an effortlessly stylish look.', 59.99, 59.99, 'fashion02', 'instock', 0, 100, '1715174134.png', NULL, 3, '2024-05-07 21:15:34', '2024-05-07 21:15:34'),
(11, 'Leather Crossbody Bag', 'leather-crossbody-bag', 'Leather Crossbody Bag', 'Stay organized in style with this leather crossbody bag. With multiple compartments and adjustable straps, it\'s perfect for everyday use and travel. Whether you\'re running errands or exploring a new city, this bag keeps your essentials secure and accessible.', 129.99, 129.99, 'fashion03', 'instock', 0, 100, '1715174231.png', NULL, 3, '2024-05-07 21:17:11', '2024-05-07 21:17:11'),
(12, 'Men\'s Slim Fit Suit', 'mens-slim-fit-suit', 'Men\'s Slim Fit Suit', 'Look sharp and sophisticated in this men\'s slim fit suit. Tailored to perfection with premium fabrics and modern cuts, it\'s ideal for formal events, business meetings, and special occasions. Add a crisp shirt and dress shoes to complete your ensemble.', 299.99, 299.99, 'fashion04', 'instock', 0, 100, '1715174336.png', NULL, 3, '2024-05-07 21:18:56', '2024-05-07 21:18:56'),
(13, 'Premium Yoga Mat', 'premium-yoga-mat', 'Premium Yoga Mat', 'Find your zen with this premium yoga mat. Made from eco-friendly materials with a non-slip surface, it provides the perfect foundation for your yoga practice. Whether you\'re a beginner or an experienced yogi, this mat offers comfort and stability for every pose.', 39.99, 39.99, 'sport01', 'instock', 0, 100, '1715174575.png', NULL, 4, '2024-05-07 21:22:55', '2024-05-07 21:22:55'),
(14, 'Camping Tent', 'camping-tent', 'Camping Tent', 'Experience the great outdoors with this spacious camping tent. With easy setup and durable construction, it\'s perfect for weekend camping trips and outdoor adventures. Whether you\'re hiking in the mountains or relaxing by the lake, this tent provides shelter and comfort wherever you go.', 149.99, 149.99, 'sport02', 'instock', 0, 100, '1715174673.png', NULL, 4, '2024-05-07 21:24:33', '2024-05-07 21:24:33'),
(15, 'Fitness Tracker Watch', 'fitness-tracker-watch', 'Fitness Tracker Watch', 'Track your progress and stay motivated with this fitness tracker watch. With built-in GPS, heart rate monitoring, and activity tracking, it helps you reach your health and fitness goals. Plus, its sleek design and customizable features make it a stylish accessory for everyday wear.', 79.99, 79.99, 'sport03', 'instock', 0, 100, '1715174756.png', NULL, 4, '2024-05-07 21:25:56', '2024-05-07 21:25:56'),
(16, 'Insulated Stainless Steel Water Bottle', 'insulated-stainless-steel-water-bottle', 'Insulated Stainless Steel Water Bottle', 'Stay hydrated on the go with this insulated stainless steel water bottle. Designed to keep your drinks cold for up to 24 hours or hot for up to 12 hours, it\'s perfect for hiking, biking, and outdoor workouts. Plus, its leak-proof lid and durable construction make it a reliable companion for any adventure.', 24.99, 24.99, 'sport04', 'instock', 0, 100, '1715174857.png', NULL, 4, '2024-05-07 21:27:37', '2024-05-07 21:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `order_id` varchar(255) NOT NULL,
  `tracking_id` int(10) UNSIGNED NOT NULL,
  `order_item` varchar(255) NOT NULL,
  `courier_type` int(11) NOT NULL,
  `usr_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `total` double NOT NULL,
  `last_function` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`order_id`, `tracking_id`, `order_item`, `courier_type`, `usr_id`, `status`, `total`, `last_function`, `date_time`) VALUES
('1', 1, 'Test X 1', 0, '6', 0, 34453.1, 'Add Order', '2024-05-12 15:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_log`
--

CREATE TABLE `tracking_log` (
  `order_id` varchar(255) NOT NULL,
  `tracking_id` varchar(255) NOT NULL,
  `order_item` varchar(255) NOT NULL,
  `courier_type` int(11) NOT NULL,
  `usr_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `total` double NOT NULL,
  `last_function` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracking_log`
--

INSERT INTO `tracking_log` (`order_id`, `tracking_id`, `order_item`, `courier_type`, `usr_id`, `status`, `total`, `last_function`, `date_time`) VALUES
('1', '1', 'Test X 1', 0, '6', 0, 34453.1, 'Add Order', '2024-05-12 15:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `utype` varchar(255) NOT NULL DEFAULT 'USR' COMMENT 'ADM for Admin and USR for Normal Users.',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `utype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test', '123@gmail.com', NULL, '$2y$10$U9heRhm7Y7Klp8hZbYxm6e/BwPpmMiBth7BCkw83knuaR/ZI3SOHq', 'ADM', '3u9oBt066dGU5fEBwSiC6p72DdBzB7VHvsea8SX0PnMtwwkUPwTZl3d7fP3F', '2024-04-29 11:38:52', '2024-04-29 11:38:52'),
(2, 'Test2', '456@gmail.com', NULL, '$2y$10$uouWBTr2ALU9X3EKtmQxluZN/8k4CXvN7iueIuGK55LS3u8kW.ppe', 'USR', NULL, '2024-04-29 11:41:03', '2024-04-29 11:41:03'),
(3, 'KianHou', 'kianhou03@gmail.com', NULL, '$2y$10$4g8R3e8b.niCxQZVX2VNLO87INGQ.IJAAKFbMr.//iGiiWJFQo5u6', 'USR', NULL, '2024-05-06 06:19:43', '2024-05-06 06:19:43'),
(4, 'MingYi', 'mingyi00@gmail.com', NULL, '$2y$10$zdjpxp2sqLB00ipG5QzJG.ehkotrAsOdIk3Yq.OrCip4hQyHn7/Ly', 'USR', NULL, '2024-05-06 07:18:47', '2024-05-06 07:18:47'),
(5, 'KahChay', 'kahcay03@gmail.com', NULL, '$2y$10$pPKc9T0jgs0/GwZBC5tlvuNiXY51KJi3K/zQnpiB7eexWWM54rbc.', 'USR', NULL, '2024-05-06 07:33:07', '2024-05-06 07:33:07'),
(6, 'Test01', 'test01@gmail.com', NULL, '$2y$10$fDwBY7Z4iBeJx3zPVkriIu0NI5ZlzlCgcwA4xTsszXbUI929W/IUa', 'USR', NULL, '2024-05-11 07:32:59', '2024-05-11 07:32:59'),
(7, 'Test02', 'test02@gmail.com', NULL, '$2y$10$i0qWhFSNlAExVLscRnbqHOV1D1VYdsizONClRI1AR6EUAUymvV7Tm', 'USR', NULL, '2024-05-11 23:04:19', '2024-05-11 23:04:19'),
(9, 'Test03', 'test03@gmail.com', NULL, '$2y$10$wvIsRrr7KJsIRg/ezj3sWujIPognrQxTNppFbIS308SZn0sI3m1Jm', 'USR', NULL, '2024-05-12 01:20:45', '2024-05-12 01:20:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `customer_report`
--
ALTER TABLE `customer_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_report_cid_foreign` (`CID`);

--
-- Indexes for table `customer_service_personnel`
--
ALTER TABLE `customer_service_personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_id`);

--
-- Indexes for table `tracking_log`
--
ALTER TABLE `tracking_log`
  ADD PRIMARY KEY (`tracking_id`,`date_time`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `customer_report`
--
ALTER TABLE `customer_report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_service_personnel`
--
ALTER TABLE `customer_service_personnel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `tracking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
