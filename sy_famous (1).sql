-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2021 at 10:55 AM
-- Server version: 5.6.51
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sy_famous`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `content`, `image`, `btn_name`, `btn_link`, `created_at`, `updated_at`) VALUES
(1, 'اهلا بك في منصة صيت المشاهير', 'المنصة الاولي والاكبر في العالم العربي في التوصل بين العملاء والمشاهير للاعلان من خلال منصاتهم ومواقع التواصل الخاصة بهم', 'uploads/about/1630313564.jpg', 'سجل الدخول', 'https://sytsite.com/login', NULL, '2021-08-30 12:48:01'),
(2, 'مشاهير متنوعون', 'يضم مشاهير السوشيال ميديا الذين يمتلكون شعبية عالية يمكنك ترويج خدماتك من خلالهم ليصل اعلانك الي اقصي عدد ممكن من الاشخاص', 'uploads/about/1630313564.jpg', 'مشاهير متنوعون', 'https://sytsite.com/all-famous', '2021-08-30 12:52:44', '2021-08-30 12:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password_reset` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `image`, `phone`, `email_verified_at`, `password_reset`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ادمن', 'admin@admin.com', 'uploads/admins/1630345707.jpg', '01099999999', NULL, NULL, '$2y$10$XBqG3wLlHLiAoseoTW8tPu3ftz7C6U70g/nSS9LPGj188N0rAnPJe', NULL, NULL, '2021-08-30 21:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('new','accepted','refused','ended') COLLATE utf8mb4_unicode_ci DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `image`, `user_id`, `package_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', NULL, 3, 1, 'new', '2021-07-25 10:55:37', '2021-07-25 10:55:37'),
(2, 'ahmed samir', NULL, 3, 2, 'accepted', '2021-07-25 11:51:53', '2021-07-25 11:51:53'),
(3, 'test', NULL, 3, 3, 'refused', '2021-07-25 12:14:12', '2021-07-25 12:14:12'),
(4, 'test', NULL, 3, 5, 'ended', '2021-07-25 12:14:42', '2021-07-25 12:14:42'),
(5, 'pepsi', NULL, 1, 5, 'accepted', '2021-08-29 16:12:34', '2021-08-29 18:38:01'),
(6, '12121221', 'storage/client/cEnNXJHqTAWgVhiqqYoTq5tNnxhDDPNzB8lHWowy.png', 1, 5, 'ended', '2021-08-29 16:14:26', '2021-08-29 18:28:57'),
(7, 'ahmed samir', 'storage/client/cEnNXJHqTAWgVhiqqYoTq5tNnxhDDPNzB8lHWowy.png', 1, 5, 'ended', '2021-08-29 16:25:59', '2021-08-31 15:36:17'),
(8, 'ahemd tarek', 'storage/client/cEnNXJHqTAWgVhiqqYoTq5tNnxhDDPNzB8lHWowy.png', 1, 5, 'accepted', '2021-08-29 16:56:00', '2021-08-29 17:40:46'),
(9, 'ahmed samir', 'storage/client/cEnNXJHqTAWgVhiqqYoTq5tNnxhDDPNzB8lHWowy.png', 1, 5, 'ended', '2021-08-29 17:04:17', '2021-08-31 16:59:48'),
(10, 'Ali adam ali ali', NULL, 1, 5, 'ended', '2021-08-29 18:14:11', '2021-08-31 17:04:20'),
(11, 'فريق العمل', NULL, 1, 5, 'refused', '2021-08-31 13:23:19', '2021-08-31 15:35:19'),
(12, 'كورة قدم', NULL, 3, 5, 'accepted', '2021-08-31 17:15:08', '2021-08-31 17:51:07'),
(14, 'بيبسي كولا', NULL, 3, 5, 'ended', '2021-08-31 17:42:02', '2021-08-31 17:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `ad_image`
--

CREATE TABLE `ad_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_image`
--

INSERT INTO `ad_image` (`id`, `ad_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, 'storage/ad/1X1R8O0F4i4aXYwvTM4OLiSWqzdN2Pmz3CRAZZCY.png', '2021-07-25 12:14:12', '2021-07-25 12:14:12'),
(2, 3, 'storage/ad/8ogQ3yc1nVyS30CVaTfUuhLQnLq5cVGjAby4K9wd.jpeg', '2021-07-25 12:14:12', '2021-07-25 12:14:12'),
(3, 3, 'storage/ad/yP7IOVVOa8LORsXnuNO9pe0m4pZ2sAt1p6CVdtqa.jpeg', '2021-07-25 12:14:12', '2021-07-25 12:14:12'),
(4, 4, 'storage/ad/zGJkUx0stZDYwiZF9OKbErEUw3CVq8rF4SOEbw3r.png', '2021-07-25 12:14:42', '2021-07-25 12:14:42'),
(5, 4, 'storage/ad/wH5rvvGxSGzpMPmveGlUzSs5aJv3yRUKpZN42rjx.jpeg', '2021-07-25 12:14:42', '2021-07-25 12:14:42'),
(6, 4, 'storage/ad/XMarBvFNO5jq7yCKKgzjoU2mYYy7wzRIbKljwygD.jpeg', '2021-07-25 12:14:42', '2021-07-25 12:14:42'),
(7, 6, 'storage/ad/Oly2BMh2a87qWBtCzIa4CLGLWwx6yMrJMgXfkPJG.png', '2021-08-29 16:14:26', '2021-08-29 16:14:26'),
(8, 6, 'storage/ad/yz45Y1Z4tgSab8LIiFPqUE6tMw4U2SPRK5sikmBt.jpg', '2021-08-29 16:14:26', '2021-08-29 16:14:26'),
(9, 6, 'storage/ad/Ug7WD9mWv97GpEgBieaULEV1TPkvVkd5pEQFZZD4.png', '2021-08-29 16:14:26', '2021-08-29 16:14:26'),
(10, 6, 'storage/ad/0CuzqMzAGAb1BBpUgBc4hagikSacO9SYW1fUAndD.png', '2021-08-29 16:14:26', '2021-08-29 16:14:26'),
(11, 6, 'storage/ad/uzHkUurNYDRSxGgFUbDJLpjvq5GD5E0uZAze0I2y.png', '2021-08-29 16:14:26', '2021-08-29 16:14:26'),
(12, 7, 'storage/ad/43tEYJ6Gkgpgb6WIkZmOowRpseGMFNGCFpY9B0oC.jpg', '2021-08-29 16:26:00', '2021-08-29 16:26:00'),
(13, 7, 'storage/ad/7RZj0Y7LiXMfMisXxYYataLNAA8fwJdzDdHct0Gp.jpg', '2021-08-29 16:26:00', '2021-08-29 16:26:00'),
(14, 8, 'storage/ad/wByCJLDpKqiJSFrFNkF43kVpoWMmWho03Y2qCxkk.jpg', '2021-08-29 16:56:00', '2021-08-29 16:56:00'),
(15, 8, 'storage/ad/MewVA0NhPu6DMuUh8Awq6aYOs9DDjQD7RsnswGa9.jpg', '2021-08-29 16:56:00', '2021-08-29 16:56:00'),
(16, 8, 'storage/ad/yFSazw63xEXkewl31R6CFsOszD5Xu5lyOhB9HLvB.jpg', '2021-08-29 16:56:00', '2021-08-29 16:56:00'),
(17, 9, 'storage/ad/99zyKQbsNLrL3IcuK2qG5iNT7rYYfPEoCjaiuzCH.jpg', '2021-08-29 17:04:17', '2021-08-29 17:04:17'),
(18, 10, 'storage/ad/rrMVV6tINGh6m9ZKzfcPkpbze9rQFTgYjOzwkQtt.jpg', '2021-08-29 18:14:11', '2021-08-29 18:14:11'),
(19, 10, 'storage/ad/c40h2WBAttpIU49kmxr4uXiKzSrf97n76KLW3Zny.jpg', '2021-08-29 18:14:11', '2021-08-29 18:14:11'),
(20, 10, 'storage/ad/Uk16Lza12wFVUEMibbwkjdsdcLDsgx9Oy2rlNIRY.jpg', '2021-08-29 18:14:11', '2021-08-29 18:14:11'),
(21, 11, 'storage/ad/XB2IZyJT8YVi5iyzrNKEaLtB4joXYEvox7waWIY2.png', '2021-08-31 13:23:19', '2021-08-31 13:23:19'),
(23, 12, 'storage/ad/BartMiix09LqNRASVFkL5rAoxFyfIPpi8CcCSAfg.png', '2021-08-31 17:15:08', '2021-08-31 17:15:08'),
(24, 13, 'storage/ad/2fIuE8i0e3DdJtPRyWq2kjcHWXnjZW9DGKnVJzGg.png', '2021-08-31 17:15:12', '2021-08-31 17:15:12'),
(25, 14, 'storage/ad/iIhPMnuSIaOK8Ai3byJHpci3pI6VAy6M6PJXeN0u.jpg', '2021-08-31 17:42:02', '2021-08-31 17:42:02'),
(26, 14, 'storage/ad/zT4XDXJxmzIkrPNKK22GKqrUXhQf2D6haauRk3xT.jpg', '2021-08-31 17:42:02', '2021-08-31 17:42:02'),
(27, 14, 'storage/ad/Ik638A4my4sU80uK4hzPC9CYjbTYKUrbJRik30mJ.jpg', '2021-08-31 17:42:02', '2021-08-31 17:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`title`, `number`, `icon`, `created_at`, `updated_at`, `id`) VALUES
('مشاهير', '799', 'fad fa-stars', NULL, NULL, 2),
('عملاء\r\n', '853', 'fad fa-trophy', NULL, NULL, 3),
('نسبة السعادة', '99%', 'fad fa-laugh-beam', NULL, NULL, 4),
('عملاء', '10000', 'fas fa-child', '2021-08-31 18:23:10', '2021-08-31 18:23:10', 6);

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
-- Table structure for table `jops`
--

CREATE TABLE `jops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jops`
--

INSERT INTO `jops` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'فنان', NULL, NULL),
(2, 'تشكيلى', NULL, NULL),
(3, 'رياضي', '2021-08-31 18:30:28', '2021-08-31 18:30:28');

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
(1, '2013_07_14_095644_create_jops_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_07_14_095359_create_sliders_table', 1),
(6, '2021_07_14_095423_create_abouts_table', 1),
(7, '2021_07_14_095506_create_counters_table', 1),
(8, '2021_07_14_095527_create_packages_table', 1),
(9, '2021_07_14_095555_create_ads_table', 1),
(10, '2021_07_14_095615_create_package_details_table', 1),
(11, '2021_07_14_095719_create_ratings_table', 1),
(12, '2021_07_14_095732_create_settings_table', 1),
(13, '2021_07_14_095750_create_offers_table', 1),
(14, '2021_07_14_095814_create_previous_ads_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) DEFAULT NULL,
  `famous_id` bigint(20) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `client_id`, `famous_id`, `message`, `created_at`, `updated_at`) VALUES
(87, NULL, 1, '  تم تقديم طلب للاعلان تابعة للباقة (باقات السوشيال)', '2021-08-31 17:42:02', NULL),
(88, 3, 1, 'تم قبول طلب الاعلان بنجاح()', '2021-08-31 17:43:47', NULL),
(89, 3, 1, 'تم قبول طلب الاعلان بنجاح(كورة قدم)', '2021-08-31 17:51:07', NULL),
(90, 3, 1, 'تم انهاء طلب الاعلان (بيبسي كولا)', '2021-08-31 17:51:17', NULL),
(91, NULL, 8, 'تم الغاء عضوية VIP لديك', '2021-08-31 18:28:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(3, 'admin.admin@mail.com', '2021-08-29 13:12:44', '2021-08-29 13:12:44'),
(4, 'ahmedtarekya@icloud.com', '2021-08-29 15:07:15', '2021-08-29 15:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `famous_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `famous_id`, `created_at`, `updated_at`) VALUES
(1, 'منتجات بسيطة', '100', 11, NULL, NULL),
(2, 'منتجات متوسطة', '200', 11, NULL, NULL),
(3, 'منتجات عالية', '300', 11, NULL, NULL),
(5, 'باقات السوشيال', '250', 1, '2021-08-29 12:18:07', '2021-08-29 12:18:07'),
(7, 'باقة خاصة', '600', 1, '2021-08-31 17:50:55', '2021-08-31 17:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `package_details`
--

CREATE TABLE `package_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_details`
--

INSERT INTO `package_details` (`id`, `title`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 'فديو قصير', 1, NULL, NULL),
(2, '10 منشور علي وسائل التواصل', 1, NULL, NULL),
(3, 'المدة 10 ايام', 1, NULL, NULL),
(6, 'فديو متوسط', 2, NULL, NULL),
(7, '30 منشور علي وسائل التواصل', 2, NULL, NULL),
(8, 'المدة 15 ايام', 1, NULL, NULL),
(9, 'فديو طويل', 3, NULL, NULL),
(10, '30 منشور علي وسائل التواصل', 3, NULL, NULL),
(11, 'المدة 20 ايام', 3, NULL, NULL),
(12, 'عدد 10 منشورات اسبوعيا لمدة شهر', 5, '2021-08-29 12:18:08', '2021-08-29 12:18:08'),
(13, '25 يوم', 6, '2021-08-29 18:39:33', '2021-08-29 18:39:33'),
(14, '10 ايام', 7, '2021-08-31 17:50:55', '2021-08-31 17:50:55'),
(15, '5 منشورات يوميا', 7, '2021-08-31 17:50:55', '2021-08-31 17:50:55');

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
-- Table structure for table `previous_ads`
--

CREATE TABLE `previous_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `famous_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `previous_ads`
--

INSERT INTO `previous_ads` (`id`, `famous_id`, `name`, `video`, `link`, `date`, `created_at`, `updated_at`) VALUES
(7, 1, 'اعلان شركة اتصالات', NULL, 'https://www.youtube.com/embed/0e2QX2pdY6Y', '2021-08-27', '2021-08-28 09:10:29', '2021-08-28 09:10:29'),
(10, 1, 'اعلان لعبة free fire', NULL, 'https://www.youtube.com/embed/apOFmdgp9gc', '2021-07-15', '2021-08-28 09:25:13', '2021-08-28 09:25:13'),
(11, 1, 'اعلان نت الجيل الرابع', NULL, 'https://www.youtube.com/embed/dVhiZyMcQDI', '2021-08-31', '2021-08-28 17:09:26', '2021-08-28 17:09:26'),
(12, 1, 'اعلان الشركة الدولية', 'uploads/previous_ads/1630246784.mp4', NULL, '2021-08-25', '2021-08-29 18:19:44', '2021-08-29 18:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `famous_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `comment`, `rate`, `date`, `famous_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'سئ علي الاطلاق لا انصح بالتعامل معه', '2', '2021-08-10', 1, 5, '2021-08-01 14:39:40', NULL),
(5, 'ممتاز جدا', '3', '2021-08-10', 1, 3, '2021-08-28 19:14:21', '2021-08-28 19:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `facebook`, `twitter`, `gmail`, `whatsapp`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'https://sytsite.com/', '01013223533', 'https://facebook.com', 'https://twitter.com', 'gmail.com', 'https://wa.me/01013223533', 'https://www.youtube.com/', NULL, '2021-08-31 18:02:29'),
(1, 'https://sytsite.com/', '01013223533', 'https://facebook.com', 'https://twitter.com', 'gmail.com', 'https://wa.me/01013223533', 'https://www.youtube.com/', NULL, '2021-08-31 18:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `content`, `image`, `btn_name`, `btn_link`, `created_at`, `updated_at`) VALUES
(3, 'قم بانشاء حسابك', 'وسارع بالتواصل مع المشاهير وقم بطلب اعلان لخدماتك', 'uploads/slider/1630419468.jpg', 'انشاء حساب', 'https://sytsite.com/register-user', NULL, '2021-08-31 18:17:48'),
(4, 'اهلا بك في منصة صيت المشاهير\r\n', 'المنصة الاولي والاكبر في العالم العربي في التوصل بين العملاء والمشاهير للاعلان من خلال منصاتهم ومواقع التواصل الخاصة بهم\r\n\r\n', 'uploads/slider/BG2.jpg', 'سجل الدخول', 'https://sytsite.com/login', NULL, NULL),
(5, 'وصل اعلانك بسرعة\r\n', 'يمكنك التواصل مع المشاهير لطلب اعلان عن خدماتك بساطة وسرعة وضمان لعملية الاعلان\r\n\r\n', 'uploads/slider/BG3.jpg', 'المشاهير', 'https://sytsite.com/all-famous', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) DEFAULT NULL,
  `type` enum('client','famous') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `visitors` int(11) DEFAULT NULL,
  `cv` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_favorite` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `status` enum('new','accepted','refused') COLLATE utf8mb4_unicode_ci DEFAULT 'new',
  `id_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone_code`, `phone`, `code`, `type`, `image`, `job_id`, `rate`, `visitors`, `cv`, `facebook`, `instagram`, `twitter`, `youtube`, `snapchat`, `is_favorite`, `status`, `id_num`, `tax_num`, `trade_num`, `company_name`, `company_person`, `company_email`, `date`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'خالد سلطان', '20', '1012345698', NULL, 'famous', 'storage/client/j3o7QIGoiSMlKseGZSDR2dgIpKyZUwNorZvxGnK1.jpg', 1, '3', NULL, 'فنان ومطرب شعبي', 'https://www.facebook.com', 'https://www.instagram.com/', 'https://www.twitter.com/', 'https://www.youtube.com/', 'https://www.facebook.com', 'yes', 'accepted', NULL, '01004834728', '01004834728', 'شركة استيراد و تصدير', 'احمد سمير', 'mail@mail.com', '2021-08-31', NULL, '2021-07-18 08:36:32', '2021-08-31 17:53:21'),
(3, 'مصطفي سعيد', '20', '112 345 6789', NULL, 'client', 'storage/client/QaGbIF7bmkDO5swJHbFmhtt8cuLbvqM2Cd4pzAky.jpg', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'new', NULL, '01004834728', '01004834728', 'شركة استيراد و تصدير', 'احمد سمير', 'mail@mail.com', NULL, NULL, '2021-07-19 11:56:22', '2021-08-31 12:24:43'),
(5, 'طلال خالد', '20', '1554534164', NULL, 'famous', 'storage/client/ljwN9UEe7B5dzrPqfteaDKOR6qu0OgElGpbjLhoI.jpg', 1, '4', NULL, 'احمد سمير تشكيلى رائع', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 'https://www.youtube.com/', 'https://www.facebook.com/', 'yes', 'accepted', '01004834728', '01004834728', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-19 12:31:35', '2021-08-31 17:36:54'),
(6, 'سلطان بندر', '20', '1013223533', NULL, 'famous', 'storage/client/ddcXmFlU1utHKERmhhbqMWim6wL1s4OCNOif4ZTZ.jpg', 2, '4', NULL, NULL, 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://twitter.com/', NULL, NULL, 'yes', 'accepted', NULL, '01004834728', '01004834728', 'شركة استيراد و تصدير', 'احمد سمير', 'mail@mail.com', NULL, NULL, '2021-07-18 08:36:32', '2021-08-31 17:25:39'),
(8, 'محمد بن احمد', '20', '1111111111', NULL, 'famous', 'storage/client/dBpsqGdYy8Mqd5zGT98xuoVhNtMkH19Z5symfN8R.jpg', 1, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'accepted', NULL, '01004834728', '01004834728', 'شركة استيراد و تصدير', 'احمد سمير', 'mail@mail.com', NULL, NULL, '2021-07-19 11:56:22', '2021-08-31 18:28:37'),
(10, 'راكان ال احمد', '20', '01004834728', NULL, 'famous', 'storage/client/Q0erC4PC1WBnfI6xjfRTl0UGYY1AtWpCEvRwnexu.jpg', 2, '4', NULL, 'احمد سمير تشكيلى رائع', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 'https://www.youtube.com/', 'https://www.facebook.com/', 'yes', 'accepted', '01004834728', '01004834728', NULL, NULL, NULL, NULL, '2021-08-29', NULL, '2021-07-19 12:31:35', '2021-08-31 17:30:03'),
(11, 'وليد سعود', '20', '1026638997', NULL, 'famous', 'storage/client/oix20Dah4xXMU4StDlSAhRWNbg28t5sbKb9TK8nD.jpg', 1, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', 'accepted', '123', '123', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-30 15:08:50', '2021-08-31 17:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `famous_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `famous_id`, `ip`, `created_at`, `updated_at`) VALUES
(1, 1, '197.40.115.62', '2021-08-28 18:08:12', '2021-08-28 18:08:12'),
(2, 4, '197.40.115.62', '2021-08-28 18:14:11', '2021-08-28 18:14:11'),
(3, 5, '197.40.115.62', '2021-08-28 18:14:23', '2021-08-28 18:14:23'),
(4, 6, '197.40.115.62', '2021-08-28 18:14:37', '2021-08-28 18:14:37'),
(5, 7, '197.40.115.62', '2021-08-28 18:16:54', '2021-08-28 18:16:54'),
(6, 10, '197.40.115.62', '2021-08-28 18:21:25', '2021-08-28 18:21:25'),
(7, 1, '41.187.114.4', '2021-08-29 11:58:38', '2021-08-29 11:58:38'),
(8, 1, '156.219.194.15', '2021-08-29 12:27:02', '2021-08-29 12:27:02'),
(9, 10, '156.219.169.141', '2021-08-29 14:59:20', '2021-08-29 14:59:20'),
(10, 1, '156.219.169.141', '2021-08-29 14:59:37', '2021-08-29 14:59:37'),
(11, 1, '72.13.62.26', '2021-08-30 06:46:34', '2021-08-30 06:46:34'),
(12, 2, '156.219.135.142', '2021-08-30 15:12:13', '2021-08-30 15:12:13'),
(13, 3, '156.219.135.142', '2021-08-30 15:12:17', '2021-08-30 15:12:17'),
(14, 1, '156.219.135.142', '2021-08-30 15:55:06', '2021-08-30 15:55:06'),
(15, 10, '156.219.135.142', '2021-08-30 18:12:24', '2021-08-30 18:12:24'),
(16, 10, '41.187.114.4', '2021-08-30 18:12:26', '2021-08-30 18:12:26'),
(17, 11, '41.187.114.4', '2021-08-31 11:26:04', '2021-08-31 11:26:04'),
(18, 10, '197.40.177.80', '2021-08-31 12:22:00', '2021-08-31 12:22:00'),
(19, 1, '197.40.177.80', '2021-08-31 13:25:47', '2021-08-31 13:25:47'),
(20, 3, '197.40.177.80', '2021-08-31 15:39:46', '2021-08-31 15:39:46'),
(21, 8, '197.40.177.80', '2021-08-31 17:13:16', '2021-08-31 17:13:16'),
(22, 5, '197.40.177.80', '2021-08-31 17:13:29', '2021-08-31 17:13:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_user_id_foreign` (`user_id`),
  ADD KEY `ads_package_id_foreign` (`package_id`);

--
-- Indexes for table `ad_image`
--
ALTER TABLE `ad_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ad_image_id_123` (`ad_id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jops`
--
ALTER TABLE `jops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_famous_id_foreign` (`famous_id`);

--
-- Indexes for table `package_details`
--
ALTER TABLE `package_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_details_package_id_foreign` (`package_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `previous_ads`
--
ALTER TABLE `previous_ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `previous_famous_id` (`famous_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_famous_id` (`famous_id`),
  ADD KEY `rate_user_id` (`user_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ad_image`
--
ALTER TABLE `ad_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jops`
--
ALTER TABLE `jops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package_details`
--
ALTER TABLE `package_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `previous_ads`
--
ALTER TABLE `previous_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `previous_ads`
--
ALTER TABLE `previous_ads`
  ADD CONSTRAINT `previous_famous_id` FOREIGN KEY (`famous_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `rate_famous_id` FOREIGN KEY (`famous_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
