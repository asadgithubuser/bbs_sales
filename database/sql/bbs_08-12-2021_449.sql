-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 11:49 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `office_id` int(11) DEFAULT NULL,
  `division` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `sr_user_id` int(11) NOT NULL,
  `office_id` bigint(20) UNSIGNED DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `usage_type` int(11) NOT NULL DEFAULT 1 COMMENT '1=Organization, 2=Personal',
  `organization_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_institute` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose_id` int(11) DEFAULT NULL,
  `purpose_specify` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` double(8,2) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiving_mode_hardcopy` int(11) DEFAULT NULL COMMENT '1=Physical, 2=Courier',
  `receiving_mode_softcopy` int(11) DEFAULT NULL COMMENT '3=CD/DVD/Flash Drive, 4=Download_link',
  `current_sender_role_id` int(11) DEFAULT NULL,
  `current_receiver_role_id` int(11) DEFAULT NULL,
  `current_application_status_id` int(11) DEFAULT NULL,
  `terms` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=UnApproved, 1=Approved',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Pending, 2=Received, 3=Processing, 4=Approved, 5=Canceled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `application_id`, `sr_user_id`, `office_id`, `division_id`, `district_id`, `upazila_id`, `usage_type`, `organization_name`, `organization_address`, `organization_designation`, `personal_occupation`, `personal_institute`, `purpose_id`, `purpose_specify`, `total_price`, `attachment`, `receiving_mode_hardcopy`, `receiving_mode_softcopy`, `current_sender_role_id`, `current_receiver_role_id`, `current_application_status_id`, `terms`, `is_approved`, `status`, `created_at`, `updated_at`) VALUES
(4, NULL, 1, NULL, NULL, NULL, NULL, 1, 'Cohen Flynn Plc', 'Mills Frederick Traders', 'Boyd and Wilcox Plc', 'Harum corporis cillu', 'Dicta sint delectus', 1, NULL, NULL, NULL, 3, NULL, 1, 6, NULL, '1', 0, 5, '2021-11-21 10:58:01', '2021-11-24 06:10:36'),
(5, NULL, 1, NULL, NULL, NULL, NULL, 1, 'sdfsdfsf', 'sdfsdff', 'sdfsdf', NULL, NULL, 1, NULL, NULL, '5file2021_11_21_055045_28359433.png', 1, NULL, 7, 6, NULL, '1', 0, 3, '2021-11-21 11:47:27', '2021-11-21 11:50:45'),
(6, NULL, 14, NULL, NULL, NULL, NULL, 1, 'Marshall Gallagher Co', 'Mcintyre Sandoval LLC', 'Walls and Mcgee Plc', NULL, NULL, 100, 'Consequatur Dolore', 1150.00, NULL, 1, NULL, 10, 7, NULL, '1', 0, 3, '2021-11-23 07:51:53', '2021-11-28 12:29:51'),
(8, NULL, 10, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Sunt perferendis se', 'Culpa veniam autem', 1, NULL, 650.00, NULL, 2, NULL, 4, 4, NULL, '1', 0, 5, '2021-11-24 06:34:25', '2021-11-24 06:39:02'),
(9, NULL, 10, NULL, NULL, NULL, NULL, 1, 'Byrd and Dotson Inc', 'Knowles Cabrera Trading', 'Howe Fuller Associates', NULL, NULL, 3, NULL, 10.00, NULL, 3, NULL, 3, 3, NULL, '1', 1, 4, '2021-11-25 12:40:07', '2021-11-28 12:09:53'),
(10, 2021112910, 10, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Service Holder', 'Service Engine', 2, NULL, 600.00, NULL, 3, NULL, 7, 6, NULL, '1', 0, 3, '2021-11-29 08:37:59', '2021-11-30 10:19:47'),
(11, 2021113011, 15, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Service', 'SEBPO', 1, NULL, 800.00, NULL, 3, NULL, 3, 3, NULL, '1', 1, 4, '2021-11-30 06:26:54', '2021-11-30 08:39:16'),
(12, 2021113012, 15, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Service', 'SEBPO', 1, NULL, 700.00, '12file2021_11_30_072400_27468694.jpeg', 3, NULL, 5, 6, NULL, '1', 0, 3, '2021-11-30 12:35:32', '2021-11-30 13:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `applications_forward_maps`
--

CREATE TABLE `applications_forward_maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_role_id` int(11) DEFAULT NULL,
  `forward_role_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `is_approved_person` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Non Approved Person, 1=Approved Person',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications_forward_maps`
--

INSERT INTO `applications_forward_maps` (`id`, `sender_role_id`, `forward_role_id`, `level_id`, `department_id`, `district_id`, `division_id`, `upazila_id`, `office_id`, `is_approved_person`, `created_at`, `updated_at`) VALUES
(1, 7, 3, 1, NULL, 13, 3, 51, 1, 1, '2021-11-16 10:29:21', '2021-11-29 08:30:32'),
(2, 7, 6, 1, NULL, 13, 3, 51, 1, 0, '2021-11-17 10:49:51', '2021-11-17 10:49:51'),
(3, 6, 5, 1, NULL, 13, 3, 51, 1, 0, '2021-11-17 10:50:12', '2021-11-17 10:50:12'),
(4, 5, 4, 1, NULL, 13, 3, 51, 1, 0, '2021-11-17 10:50:29', '2021-11-17 10:50:29'),
(5, 4, 3, 1, NULL, 13, 3, 51, 1, 1, '2021-11-17 10:50:45', '2021-11-17 10:50:45'),
(6, 6, 7, 1, NULL, 13, 3, 51, 1, 0, '2021-11-28 11:11:57', '2021-11-28 11:11:57'),
(7, 7, 5, 1, NULL, 13, 3, 51, 1, 0, '2021-11-28 12:15:48', '2021-11-28 12:15:48'),
(8, 6, 4, 1, NULL, 13, 3, 51, 1, 0, '2021-11-28 12:18:26', '2021-11-28 12:18:26'),
(9, 5, 3, 1, NULL, 13, 3, 51, 1, 1, '2021-11-28 12:19:20', '2021-11-28 12:19:20'),
(10, 3, 4, 1, NULL, 13, 3, 51, 1, 0, '2021-11-28 12:21:26', '2021-11-28 12:21:26'),
(11, 3, 5, 1, NULL, 13, 3, 51, 1, 0, '2021-11-28 12:21:40', '2021-11-28 12:21:40'),
(12, 4, 5, 1, NULL, 13, 3, 51, 1, 0, '2021-11-28 12:22:13', '2021-11-28 12:22:13'),
(13, 4, 6, 1, NULL, 13, 3, 51, 1, 0, '2021-11-28 12:23:18', '2021-11-28 12:23:18'),
(14, 5, 6, 1, NULL, 13, 3, 51, 1, 0, '2021-11-28 12:23:55', '2021-11-28 12:23:55'),
(15, 5, 7, 1, NULL, 13, 3, 51, 1, 0, '2021-11-28 12:24:13', '2021-11-28 12:24:13'),
(17, 7, 4, 1, NULL, 13, 3, 51, 1, 0, '2021-11-29 08:29:58', '2021-11-29 08:29:58'),
(19, 6, 3, 1, NULL, 13, 3, 51, 1, 1, '2021-11-29 08:32:12', '2021-11-29 08:32:12'),
(20, 3, 6, 1, NULL, 13, 3, 51, 1, 0, '2021-11-29 08:32:49', '2021-11-29 08:32:49'),
(21, 3, 7, 1, NULL, 13, 3, 51, 1, 0, '2021-11-29 08:33:03', '2021-11-29 08:33:03'),
(22, 4, 7, 1, NULL, 13, 3, 51, 1, 0, '2021-11-29 08:33:18', '2021-11-29 08:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `applications_processes`
--

CREATE TABLE `applications_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sender_role_id` int(11) DEFAULT NULL,
  `receiver_role_id` int(11) DEFAULT NULL,
  `sender_designation_id` int(11) DEFAULT NULL,
  `sender_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(11) DEFAULT NULL,
  `receive_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications_processes`
--

INSERT INTO `applications_processes` (`id`, `application_id`, `user_id`, `sender_role_id`, `receiver_role_id`, `sender_designation_id`, `sender_signature`, `comment`, `attachment`, `status`, `receive_time`, `created_at`, `updated_at`) VALUES
(22, 4, 7, 7, 6, 3, '11signature2021_11_11_034104_23540151.png', 'please check', NULL, NULL, NULL, '2021-11-21 11:13:31', '2021-11-21 11:13:31'),
(23, 4, 6, 6, 5, 4, NULL, 'tumi ekhon dekho', NULL, NULL, NULL, '2021-11-21 11:24:11', '2021-11-21 11:24:11'),
(24, 5, 7, 7, 6, 3, '11signature2021_11_11_034104_23540151.png', 'please check', NULL, NULL, NULL, '2021-11-21 11:50:45', '2021-11-21 11:50:45'),
(25, 4, 1, 1, NULL, NULL, NULL, 'Not appropriate', NULL, NULL, NULL, '2021-11-24 06:10:36', '2021-11-24 06:10:36'),
(29, 8, 7, 7, 6, 3, '11signature2021_11_11_034104_23540151.png', 'Sending to Senior Programmer', NULL, 3, NULL, '2021-11-24 06:34:52', '2021-11-24 06:34:52'),
(30, 8, 6, 6, 5, 4, NULL, 'Sending to Director', NULL, 3, NULL, '2021-11-24 06:37:52', '2021-11-24 06:37:52'),
(31, 8, 5, 5, 4, 5, NULL, 'Sending application to Deputy Director General', NULL, 3, NULL, '2021-11-24 06:38:30', '2021-11-24 06:38:30'),
(32, 8, 3, 4, NULL, 6, NULL, 'Not appropriate', NULL, 5, NULL, '2021-11-24 06:39:02', '2021-11-24 06:39:02'),
(33, 9, 7, 7, 6, 3, 'signature.png', 'Sending to Senior Programmer', NULL, 3, NULL, '2021-11-28 10:50:23', '2021-11-28 10:50:23'),
(34, 9, 6, 6, 5, 4, 'signature.png', 'Sending to Director', NULL, 3, NULL, '2021-11-28 12:06:10', '2021-11-28 12:06:10'),
(35, 9, 5, 5, 4, 5, 'signature.png', 'Sending application to Deputy Director General', NULL, 3, NULL, '2021-11-28 12:06:45', '2021-11-28 12:06:45'),
(36, 9, 4, 4, 3, 6, 'signature.png', 'Sending application to Director General', NULL, 3, NULL, '2021-11-28 12:07:30', '2021-11-28 12:07:30'),
(37, 9, 3, 3, NULL, 7, 'signature.png', 'Application Approved', NULL, 4, NULL, '2021-11-28 12:09:53', '2021-11-28 12:09:53'),
(38, 6, 7, 7, 5, 3, 'signature.png', 'Sending to Director', NULL, 3, NULL, '2021-11-28 12:29:51', '2021-11-28 12:29:51'),
(43, 11, 7, 7, 3, 3, 'signature.png', 'Sending application to Director General', NULL, 3, NULL, '2021-11-30 06:59:51', '2021-11-30 06:59:51'),
(44, 11, 3, 3, NULL, 7, 'signature.png', 'Application Approved', NULL, 4, NULL, '2021-11-30 08:39:15', '2021-11-30 08:39:15'),
(46, 10, 7, 7, 6, 3, 'signature.png', NULL, NULL, 3, NULL, '2021-11-30 10:19:47', '2021-11-30 10:19:47'),
(47, 10, 7, 7, 6, 3, 'signature.png', NULL, NULL, 3, NULL, '2021-11-30 10:20:45', '2021-11-30 10:20:45'),
(48, 9, 3, 3, 4, 6, 'signature.png', 'Sending application to Director General', NULL, 3, NULL, '2021-11-28 12:07:30', '2021-11-28 12:07:30'),
(49, 9, 4, 4, 3, 6, 'signature.png', 'Sending application to Director General', NULL, 3, NULL, '2021-11-28 12:07:30', '2021-11-28 12:07:30'),
(50, 12, 7, 7, 3, 3, 'signature.png', 'Sending application to Director General', NULL, 3, NULL, '2021-11-30 13:15:25', '2021-11-30 13:15:25'),
(51, 12, 3, 3, 5, 7, 'signature.png', 'Sending to Director', NULL, 3, NULL, '2021-11-30 13:21:21', '2021-11-30 13:21:21'),
(52, 12, 5, 5, 6, 5, 'signature.png', 'Sending to Senior Programmer', NULL, 3, NULL, '2021-11-30 13:24:00', '2021-11-30 13:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `applications_statuses`
--

CREATE TABLE `applications_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_access` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application_documents`
--

CREATE TABLE `application_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED DEFAULT NULL,
  `upload_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application_purposes`
--

CREATE TABLE `application_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ordering` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_purposes`
--

INSERT INTO `application_purposes` (`id`, `name_en`, `name_bn`, `status`, `ordering`, `created_at`, `updated_at`) VALUES
(1, 'Research', 'Research', 1, 1, NULL, NULL),
(2, 'Educational', 'Educational', 1, 1, NULL, NULL),
(3, 'Business', 'Business', 1, 1, NULL, NULL),
(100, 'Others', 'Others', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `application_services`
--

CREATE TABLE `application_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_item_id` int(11) DEFAULT NULL,
  `service_item_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_services`
--

INSERT INTO `application_services` (`id`, `application_id`, `service_id`, `service_item_id`, `service_item_price`, `created_at`, `updated_at`) VALUES
(16, 2, 1, 2, 100.00, '2021-11-18 11:59:25', '2021-11-18 11:59:25'),
(17, 3, 1, 2, 100.00, '2021-11-18 12:10:05', '2021-11-18 12:10:05'),
(18, 3, 2, 3, 100.00, '2021-11-18 12:10:05', '2021-11-18 12:10:05'),
(19, 3, 3, 1, 0.00, '2021-11-18 12:10:05', '2021-11-18 12:10:05'),
(20, 4, 1, 2, 100.00, '2021-11-21 10:58:01', '2021-11-21 10:58:01'),
(21, 4, 4, 4, 500.00, '2021-11-21 10:58:01', '2021-11-21 10:58:01'),
(22, 5, 1, 2, 100.00, '2021-11-21 11:47:27', '2021-11-21 11:47:27'),
(23, 6, 1, 8, 450.00, '2021-11-23 07:51:53', '2021-11-23 07:51:53'),
(24, 6, 2, 7, 200.00, '2021-11-23 07:51:53', '2021-11-23 07:51:53'),
(25, 6, 4, 5, 500.00, '2021-11-23 07:51:53', '2021-11-23 07:51:53'),
(26, 7, 1, 8, 450.00, '2021-11-24 06:27:33', '2021-11-24 06:27:33'),
(27, 7, 2, 7, 200.00, '2021-11-24 06:27:33', '2021-11-24 06:27:33'),
(28, 8, 2, 7, 200.00, '2021-11-24 06:34:25', '2021-11-24 06:34:25'),
(29, 8, 1, 8, 450.00, '2021-11-24 06:34:25', '2021-11-24 06:34:25'),
(30, 9, 1, 11, 150.00, '2021-11-25 12:40:07', '2021-11-25 12:40:07'),
(31, 9, 2, 15, 650.00, '2021-11-25 12:40:07', '2021-11-25 12:40:07'),
(32, 9, 3, 17, 350.00, '2021-11-25 12:40:07', '2021-11-25 12:40:07'),
(33, 10, 3, 1, 100.00, '2021-11-29 08:37:59', '2021-11-29 08:37:59'),
(34, 10, 3, 4, 200.00, '2021-11-29 08:37:59', '2021-11-29 08:37:59'),
(35, 10, 3, 16, 300.00, '2021-11-29 08:37:59', '2021-11-29 08:37:59'),
(36, 11, 1, 2, 300.00, '2021-11-30 06:26:54', '2021-11-30 06:26:54'),
(37, 11, 1, 3, 500.00, '2021-11-30 06:26:54', '2021-11-30 06:26:54'),
(38, 12, 1, 2, 300.00, '2021-11-30 12:35:32', '2021-11-30 12:35:32'),
(39, 12, 1, 9, 250.00, '2021-11-30 12:35:32', '2021-11-30 12:35:32'),
(40, 12, 1, 11, 150.00, '2021-11-30 12:35:32', '2021-11-30 12:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `application_service_item_downloads`
--

CREATE TABLE `application_service_item_downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_item_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_download` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application_service_item_download_details`
--

CREATE TABLE `application_service_item_download_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `application_service_item_download_id` int(11) DEFAULT NULL,
  `download_quantity` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_use_application_form` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) DEFAULT NULL,
  `sr_user_id` bigint(20) NOT NULL DEFAULT 0,
  `certificate_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_by_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) DEFAULT NULL,
  `country_name` varchar(50) DEFAULT NULL,
  `country_code` char(2) DEFAULT NULL,
  `country_code_three` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_code`, `country_code_three`) VALUES
(1, 'Afghanistan', 'AF', 'AFG'),
(2, 'Aland Islands', 'AX', 'ALA'),
(3, 'Albania', 'AL', 'ALB'),
(4, 'Algeria', 'DZ', 'DZA'),
(5, 'American Samoa', 'AS', 'ASM'),
(6, 'Andorra', 'AD', 'AND'),
(7, 'Angola', 'AO', 'AGO'),
(8, 'Anguilla', 'AI', 'AIA'),
(9, 'Antarctica', 'AQ', 'ATA'),
(10, 'Antigua and Barbuda', 'AG', 'ATG'),
(11, 'Argentina', 'AR', 'ARG'),
(12, 'Armenia', 'AM', 'ARM'),
(13, 'Aruba', 'AW', 'ABW'),
(14, 'Australia', 'AU', 'AUS'),
(15, 'Austria', 'AT', 'AUT'),
(16, 'Azerbaijan', 'AZ', 'AZE'),
(17, 'Bahamas', 'BS', 'BHS'),
(18, 'Bahrain', 'BH', 'BHR'),
(19, 'Bangladesh', 'BD', 'BGD'),
(20, 'Barbados', 'BB', 'BRB'),
(21, 'Belarus', 'BY', 'BLR'),
(22, 'Belgium', 'BE', 'BEL'),
(23, 'Belize', 'BZ', 'BLZ'),
(24, 'Benin', 'BJ', 'BEN'),
(25, 'Bermuda', 'BM', 'BMU'),
(26, 'Bhutan', 'BT', 'BTN'),
(27, 'Bolivia', 'BO', 'BOL'),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES'),
(29, 'Bosnia and Herzegovina', 'BA', 'BIH'),
(30, 'Botswana', 'BW', 'BWA'),
(31, 'Bouvet Island', 'BV', 'BVT'),
(32, 'Brazil', 'BR', 'BRA'),
(33, 'British Indian Ocean Territory', 'IO', 'IOT'),
(34, 'Brunei', 'BN', 'BRN'),
(35, 'Bulgaria', 'BG', 'BGR'),
(36, 'Burkina Faso', 'BF', 'BFA'),
(37, 'Burundi', 'BI', 'BDI'),
(38, 'Cambodia', 'KH', 'KHM'),
(39, 'Cameroon', 'CM', 'CMR'),
(40, 'Canada', 'CA', 'CAN'),
(41, 'Cape Verde', 'CV', 'CPV'),
(42, 'Cayman Islands', 'KY', 'CYM'),
(43, 'Central African Republic', 'CF', 'CAF'),
(44, 'Chad', 'TD', 'TCD'),
(45, 'Chile', 'CL', 'CHL'),
(46, 'China', 'CN', 'CHN'),
(47, 'Christmas Island', 'CX', 'CXR'),
(48, 'Cocos (Keeling) Islands', 'CC', 'CCK'),
(49, 'Colombia', 'CO', 'COL'),
(50, 'Comoros', 'KM', 'COM'),
(51, 'Congo', 'CG', 'COG'),
(52, 'Cook Islands', 'CK', 'COK'),
(53, 'Costa Rica', 'CR', 'CRI'),
(54, 'Ivory Coast', 'CI', 'CIV'),
(55, 'Croatia', 'HR', 'HRV'),
(56, 'Cuba', 'CU', 'CUB'),
(57, 'Curacao', 'CW', 'CUW'),
(58, 'Cyprus', 'CY', 'CYP'),
(59, 'Czech Republic', 'CZ', 'CZE'),
(60, 'Democratic Republic of the Congo', 'CD', 'COD'),
(61, 'Denmark', 'DK', 'DNK'),
(62, 'Djibouti', 'DJ', 'DJI'),
(63, 'Dominica', 'DM', 'DMA'),
(64, 'Dominican Republic', 'DO', 'DOM'),
(65, 'Ecuador', 'EC', 'ECU'),
(66, 'Egypt', 'EG', 'EGY'),
(67, 'El Salvador', 'SV', 'SLV'),
(68, 'Equatorial Guinea', 'GQ', 'GNQ'),
(69, 'Eritrea', 'ER', 'ERI'),
(70, 'Estonia', 'EE', 'EST'),
(71, 'Ethiopia', 'ET', 'ETH'),
(72, 'Falkland Islands (Malvinas)', 'FK', 'FLK'),
(73, 'Faroe Islands', 'FO', 'FRO'),
(74, 'Fiji', 'FJ', 'FJI'),
(75, 'Finland', 'FI', 'FIN'),
(76, 'France', 'FR', 'FRA'),
(77, 'French Guiana', 'GF', 'GUF'),
(78, 'French Polynesia', 'PF', 'PYF'),
(79, 'French Southern Territories', 'TF', 'ATF'),
(80, 'Gabon', 'GA', 'GAB'),
(81, 'Gambia', 'GM', 'GMB'),
(82, 'Georgia', 'GE', 'GEO'),
(83, 'Germany', 'DE', 'DEU'),
(84, 'Ghana', 'GH', 'GHA'),
(85, 'Gibraltar', 'GI', 'GIB'),
(86, 'Greece', 'GR', 'GRC'),
(87, 'Greenland', 'GL', 'GRL'),
(88, 'Grenada', 'GD', 'GRD'),
(89, 'Guadaloupe', 'GP', 'GLP'),
(90, 'Guam', 'GU', 'GUM'),
(91, 'Guatemala', 'GT', 'GTM'),
(92, 'Guernsey', 'GG', 'GGY'),
(93, 'Guinea', 'GN', 'GIN'),
(94, 'Guinea-Bissau', 'GW', 'GNB'),
(95, 'Guyana', 'GY', 'GUY'),
(96, 'Haiti', 'HT', 'HTI'),
(97, 'Heard Island and McDonald Islands', 'HM', 'HMD'),
(98, 'Honduras', 'HN', 'HND'),
(99, 'Hong Kong', 'HK', 'HKG'),
(100, 'Hungary', 'HU', 'HUN'),
(101, 'Iceland', 'IS', 'ISL'),
(102, 'India', 'IN', 'IND'),
(103, 'Indonesia', 'ID', 'IDN'),
(104, 'Iran', 'IR', 'IRN'),
(105, 'Iraq', 'IQ', 'IRQ'),
(106, 'Ireland', 'IE', 'IRL'),
(107, 'Isle of Man', 'IM', 'IMN'),
(108, 'Israel', 'IL', 'ISR'),
(109, 'Italy', 'IT', 'ITA'),
(110, 'Jamaica', 'JM', 'JAM'),
(111, 'Japan', 'JP', 'JPN'),
(112, 'Jersey', 'JE', 'JEY'),
(113, 'Jordan', 'JO', 'JOR'),
(114, 'Kazakhstan', 'KZ', 'KAZ'),
(115, 'Kenya', 'KE', 'KEN'),
(116, 'Kiribati', 'KI', 'KIR'),
(117, 'Kosovo', 'XK', '---'),
(118, 'Kuwait', 'KW', 'KWT'),
(119, 'Kyrgyzstan', 'KG', 'KGZ'),
(120, 'Laos', 'LA', 'LAO'),
(121, 'Latvia', 'LV', 'LVA'),
(122, 'Lebanon', 'LB', 'LBN'),
(123, 'Lesotho', 'LS', 'LSO'),
(124, 'Liberia', 'LR', 'LBR'),
(125, 'Libya', 'LY', 'LBY'),
(126, 'Liechtenstein', 'LI', 'LIE'),
(127, 'Lithuania', 'LT', 'LTU'),
(128, 'Luxembourg', 'LU', 'LUX'),
(129, 'Macao', 'MO', 'MAC'),
(130, 'Macedonia', 'MK', 'MKD'),
(131, 'Madagascar', 'MG', 'MDG'),
(132, 'Malawi', 'MW', 'MWI'),
(133, 'Malaysia', 'MY', 'MYS'),
(134, 'Maldives', 'MV', 'MDV'),
(135, 'Mali', 'ML', 'MLI'),
(136, 'Malta', 'MT', 'MLT'),
(137, 'Marshall Islands', 'MH', 'MHL'),
(138, 'Martinique', 'MQ', 'MTQ'),
(139, 'Mauritania', 'MR', 'MRT'),
(140, 'Mauritius', 'MU', 'MUS'),
(141, 'Mayotte', 'YT', 'MYT'),
(142, 'Mexico', 'MX', 'MEX'),
(143, 'Micronesia', 'FM', 'FSM'),
(144, 'Moldava', 'MD', 'MDA'),
(145, 'Monaco', 'MC', 'MCO'),
(146, 'Mongolia', 'MN', 'MNG'),
(147, 'Montenegro', 'ME', 'MNE'),
(148, 'Montserrat', 'MS', 'MSR'),
(149, 'Morocco', 'MA', 'MAR'),
(150, 'Mozambique', 'MZ', 'MOZ'),
(151, 'Myanmar (Burma)', 'MM', 'MMR'),
(152, 'Namibia', 'NA', 'NAM'),
(153, 'Nauru', 'NR', 'NRU'),
(154, 'Nepal', 'NP', 'NPL'),
(155, 'Netherlands', 'NL', 'NLD'),
(156, 'New Caledonia', 'NC', 'NCL'),
(157, 'New Zealand', 'NZ', 'NZL'),
(158, 'Nicaragua', 'NI', 'NIC'),
(159, 'Niger', 'NE', 'NER'),
(160, 'Nigeria', 'NG', 'NGA'),
(161, 'Niue', 'NU', 'NIU'),
(162, 'Norfolk Island', 'NF', 'NFK'),
(163, 'North Korea', 'KP', 'PRK'),
(164, 'Northern Mariana Islands', 'MP', 'MNP'),
(165, 'Norway', 'NO', 'NOR'),
(166, 'Oman', 'OM', 'OMN'),
(167, 'Pakistan', 'PK', 'PAK'),
(168, 'Palau', 'PW', 'PLW'),
(169, 'Palestine', 'PS', 'PSE'),
(170, 'Panama', 'PA', 'PAN'),
(171, 'Papua New Guinea', 'PG', 'PNG'),
(172, 'Paraguay', 'PY', 'PRY'),
(173, 'Peru', 'PE', 'PER'),
(174, 'Phillipines', 'PH', 'PHL'),
(175, 'Pitcairn', 'PN', 'PCN'),
(176, 'Poland', 'PL', 'POL'),
(177, 'Portugal', 'PT', 'PRT'),
(178, 'Puerto Rico', 'PR', 'PRI'),
(179, 'Qatar', 'QA', 'QAT'),
(180, 'Reunion', 'RE', 'REU'),
(181, 'Romania', 'RO', 'ROU'),
(182, 'Russia', 'RU', 'RUS'),
(183, 'Rwanda', 'RW', 'RWA'),
(184, 'Saint Barthelemy', 'BL', 'BLM'),
(185, 'Saint Helena', 'SH', 'SHN'),
(186, 'Saint Kitts and Nevis', 'KN', 'KNA'),
(187, 'Saint Lucia', 'LC', 'LCA'),
(188, 'Saint Martin', 'MF', 'MAF'),
(189, 'Saint Pierre and Miquelon', 'PM', 'SPM'),
(190, 'Saint Vincent and the Grenadines', 'VC', 'VCT'),
(191, 'Samoa', 'WS', 'WSM'),
(192, 'San Marino', 'SM', 'SMR'),
(193, 'Sao Tome and Principe', 'ST', 'STP'),
(194, 'Saudi Arabia', 'SA', 'SAU'),
(195, 'Senegal', 'SN', 'SEN'),
(196, 'Serbia', 'RS', 'SRB'),
(197, 'Seychelles', 'SC', 'SYC'),
(198, 'Sierra Leone', 'SL', 'SLE'),
(199, 'Singapore', 'SG', 'SGP'),
(200, 'Sint Maarten', 'SX', 'SXM'),
(201, 'Slovakia', 'SK', 'SVK'),
(202, 'Slovenia', 'SI', 'SVN'),
(203, 'Solomon Islands', 'SB', 'SLB'),
(204, 'Somalia', 'SO', 'SOM'),
(205, 'South Africa', 'ZA', 'ZAF'),
(206, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS'),
(207, 'South Korea', 'KR', 'KOR'),
(208, 'South Sudan', 'SS', 'SSD'),
(209, 'Spain', 'ES', 'ESP'),
(210, 'Sri Lanka', 'LK', 'LKA'),
(211, 'Sudan', 'SD', 'SDN'),
(212, 'Suriname', 'SR', 'SUR'),
(213, 'Svalbard and Jan Mayen', 'SJ', 'SJM'),
(214, 'Swaziland', 'SZ', 'SWZ'),
(215, 'Sweden', 'SE', 'SWE'),
(216, 'Switzerland', 'CH', 'CHE'),
(217, 'Syria', 'SY', 'SYR'),
(218, 'Taiwan', 'TW', 'TWN'),
(219, 'Tajikistan', 'TJ', 'TJK'),
(220, 'Tanzania', 'TZ', 'TZA'),
(221, 'Thailand', 'TH', 'THA'),
(222, 'Timor-Leste (East Timor)', 'TL', 'TLS'),
(223, 'Togo', 'TG', 'TGO'),
(224, 'Tokelau', 'TK', 'TKL'),
(225, 'Tonga', 'TO', 'TON'),
(226, 'Trinidad and Tobago', 'TT', 'TTO'),
(227, 'Tunisia', 'TN', 'TUN'),
(228, 'Turkey', 'TR', 'TUR'),
(229, 'Turkmenistan', 'TM', 'TKM'),
(230, 'Turks and Caicos Islands', 'TC', 'TCA'),
(231, 'Tuvalu', 'TV', 'TUV'),
(232, 'Uganda', 'UG', 'UGA'),
(233, 'Ukraine', 'UA', 'UKR'),
(234, 'United Arab Emirates', 'AE', 'ARE'),
(235, 'United Kingdom', 'GB', 'GBR'),
(236, 'United States', 'US', 'USA'),
(237, 'United States Minor Outlying Islands', 'UM', 'UMI'),
(238, 'Uruguay', 'UY', 'URY'),
(239, 'Uzbekistan', 'UZ', 'UZB'),
(240, 'Vanuatu', 'VU', 'VUT'),
(241, 'Vatican City', 'VA', 'VAT'),
(242, 'Venezuela', 'VE', 'VEN'),
(243, 'Vietnam', 'VN', 'VNM'),
(244, 'Virgin Islands, British', 'VG', 'VGB'),
(245, 'Virgin Islands, US', 'VI', 'VIR'),
(246, 'Wallis and Futuna', 'WF', 'WLF'),
(247, 'Western Sahara', 'EH', 'ESH'),
(248, 'Yemen', 'YE', 'YEM'),
(249, 'Zambia', 'ZM', 'ZMB'),
(250, 'Zimbabwe', 'ZW', 'ZWE');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `ordering` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `level`, `office_id`, `name_en`, `name_bn`, `description`, `created_by`, `updated_by`, `status`, `ordering`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'Assitance Officer (Local)', 'সহকারী অফিসার (লোকাল)', 'Assitance Officer (Local)', 1, NULL, 1, 1, NULL, NULL),
(2, 4, 2, 'Statistical Officer (Local)', 'পরিসংখ্যানগত অফিসার (লোকাল)', 'Statistical Officer (Local)', 1, NULL, 1, 1, NULL, NULL),
(3, 1, 1, 'Assitance Officer', 'সহকারী অফিসার', 'Assitance Officer', 1, NULL, 1, 1, NULL, NULL),
(4, 1, 1, 'Senior Programmer', 'সিনিয়র প্রোগ্রামার', 'Senior Programmer', 1, NULL, 1, 1, NULL, NULL),
(5, 1, 1, 'Director', 'ডিরেক্টর', 'Director', 1, NULL, 1, 1, NULL, NULL),
(6, 1, 1, 'Deputy Director General', 'সাধারণ ডেপুটি ডিরেক্টর', 'Deputy Director General', 1, NULL, 1, 1, NULL, NULL),
(7, 1, 1, 'Director General', 'সাধারণ ডিরেক্টর', 'Director General', 1, NULL, 1, 1, NULL, NULL),
(8, 1, 1, 'Super Admin', 'সুপার অ্যাডমিন', 'Super Admin', 1, NULL, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `division_id` int(2) DEFAULT NULL,
  `district_bbs_code` char(2) DEFAULT NULL,
  `division_bbs_code` char(2) DEFAULT NULL,
  `name_bn` varchar(40) DEFAULT NULL,
  `name_en` varchar(50) DEFAULT NULL,
  `status` int(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `district_bbs_code`, `division_bbs_code`, `name_bn`, `name_en`, `status`) VALUES
(1, 4, '01', '40', 'বাগেরহাট                                ', 'BAGERHAT', 1),
(2, 2, '03', '20', 'বান্দরবন                 ', 'BANDARBAN', 0),
(3, 1, '04', '10', 'বরগুনা                                  ', 'BARGUNA', 1),
(4, 1, '06', '10', 'বরিশাল                                  ', 'BARISAL', 1),
(5, 1, '09', '10', 'ভোলা                                   ', 'BHOLA', 1),
(6, 5, '10', '50', 'বগুড়া                                   ', 'BOGRA', 1),
(7, 2, '12', '20', 'ব্রাহ্মণবাড়িয়া', 'BRAHMANBARIA', 1),
(8, 2, '13', '20', 'চাঁদপুর                                 ', 'CHANDPUR', 1),
(9, 2, '15', '20', 'চট্টগ্রাম                  ', 'CHITTAGONG', 1),
(10, 4, '18', '40', 'চুয়াডাঙ্গা                ', 'CHUADANGA', 1),
(11, 2, '19', '20', 'কুমিল্লা                                ', 'COMILLA', 1),
(12, 2, '22', '20', 'কক্সবাজার                               ', 'COX\'S BAZAR', 1),
(13, 3, '26', '30', 'ঢাকা                                    ', 'DHAKA', 1),
(14, 6, '27', '55', 'দিনাজপুর                                ', 'DINAJPUR', 1),
(15, 3, '29', '30', 'ফরিদপুর                                 ', 'FARIDPUR', 1),
(16, 2, '30', '20', 'ফেণী                                    ', 'FENI', 1),
(17, 6, '32', '55', 'গাইবান্ধা                               ', 'GAIBANDHA', 1),
(18, 3, '33', '30', 'গাজীপুর                 ', 'GAZIPUR', 1),
(19, 3, '35', '30', 'গোপালগঞ্জ                               ', 'GOPALGANJ', 1),
(20, 7, '36', '60', 'হবিগঞ্জ                                 ', 'HABIGANJ', 1),
(21, 5, '38', '50', 'জয়পুরহাট                                ', 'JOYPURHAT', 1),
(22, 8, '39', '90', 'জামালপুর                                ', 'JAMALPUR', 1),
(23, 4, '41', '40', 'যশোহর                                  ', 'JESSORE', 1),
(24, 1, '42', '10', 'ঝালকাঠী                                 ', 'JHALOKATI', 1),
(25, 4, '44', '40', 'ঝিনাইদহ                                 ', 'JHENAIDAH', 1),
(26, 2, '46', '20', 'খাগড়াছড়ি                ', 'KHAGRACHHARI', 0),
(27, 4, '47', '40', 'খুলনা                                   ', 'KHULNA', 1),
(28, 3, '48', '30', 'কিশোরগঞ্জ                               ', 'KISHOREGONJ', 1),
(29, 6, '49', '55', 'কুড়িগ্রাম                               ', 'KURIGRAM', 1),
(30, 4, '50', '40', 'কুষ্টিয়া                  ', 'KUSHTIA', 1),
(31, 2, '51', '20', 'লক্ষীপুর                                ', 'LAKSHMIPUR', 1),
(32, 6, '52', '55', 'লালমনিরহাট              ', 'LALMONIRHAT', 1),
(33, 3, '54', '30', 'মাদারীপুর                               ', 'MADARIPUR', 1),
(34, 4, '55', '40', 'মাগুরা                                  ', 'MAGURA', 1),
(35, 3, '56', '30', 'মানিকগঞ্জ                               ', 'MANIKGANJ', 1),
(36, 4, '57', '40', 'মেহেরপুর                ', 'MEHERPUR', 1),
(37, 7, '58', '60', 'মৌলভীবাজার                             ', 'MAULVIBAZAR', 1),
(38, 3, '59', '30', 'মুন্সিগঞ্জ                              ', 'MUNSHIGANJ', 1),
(39, 8, '61', '90', 'ময়মনসিংহ                                ', 'MYMENSINGH', 1),
(40, 5, '64', '50', 'নওগাঁ                   ', 'NAOGAON', 1),
(41, 4, '65', '40', 'নড়াইল                                   ', 'NARAIL', 1),
(42, 3, '67', '30', 'নারায়নগঞ্জ                              ', 'NARAYANGANJ', 1),
(43, 3, '68', '30', 'নরসিংদী                                 ', 'NARSINGDI', 1),
(44, 5, '69', '50', 'নাটোর                  ', 'NATORE', 1),
(45, 5, '70', '50', 'চাপাইনবাবগঞ্জ             ', 'CHAPAI NABABGANJ', 1),
(46, 8, '72', '90', 'নেত্রকোনা                               ', 'NETRAKONA', 1),
(47, 6, '73', '55', 'নীলফামারী                               ', 'NILPHAMARI ZILA', 1),
(48, 2, '75', '20', 'নোয়াখালী                               ', 'NOAKHALI', 1),
(49, 5, '76', '50', 'পাবনা                                   ', 'PABNA', 1),
(50, 6, '77', '55', 'পঞ্চগড়                                  ', 'PANCHAGARH', 1),
(51, 1, '78', '10', 'পটুয়াখালী                               ', 'PATUAKHALI', 1),
(52, 1, '79', '10', 'পিরোজপুর                               ', 'PIROJPUR', 1),
(53, 5, '81', '50', 'রাজশাহী                 ', 'RAJSHAHI', 1),
(54, 3, '82', '30', 'রাজবাড়ী                                 ', 'RAJBARI', 1),
(55, 2, '84', '20', 'রাঙ্গামাটি                ', 'RANGAMATI', 0),
(56, 6, '85', '55', 'রংপুর                                   ', 'RANGPUR', 1),
(57, 3, '86', '30', 'শরীয়তপুর                                ', 'SHARIATPUR', 1),
(58, 4, '87', '40', 'সাতক্ষীরা                               ', 'SATKHIRA', 1),
(59, 5, '88', '50', 'সিরাজগঞ্জ                               ', 'SIRAJGANJ', 1),
(60, 8, '89', '90', 'শেরপুর                  ', 'SHERPUR', 1),
(61, 7, '90', '60', 'সুনামগঞ্জ                               ', 'SUNAMGANJ', 1),
(62, 7, '91', '60', 'সিলেট                                   ', 'SYLHET', 1),
(63, 3, '93', '30', 'টাংগাইল                                 ', 'TANGAIL', 1),
(64, 6, '94', '55', 'ঠাকুরগাঁও               ', 'Thakurgaon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(2) NOT NULL,
  `division_bbs_code` char(2) NOT NULL DEFAULT '',
  `name_bn` varchar(40) NOT NULL,
  `name_en` varchar(50) DEFAULT NULL,
  `status` int(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division_bbs_code`, `name_bn`, `name_en`, `status`) VALUES
(1, '10', 'বরিশাল', 'Barisal', 1),
(2, '20', 'চট্টগ্রাম  ', 'Chittagong', 1),
(3, '30', 'ঢাকা                                    ', 'Dhaka', 1),
(4, '40', 'খুলনা                                   ', 'Khulna', 1),
(5, '50', 'রাজশাহী                                 ', 'Rajshahi', 1),
(6, '55', 'রংপূর', 'Rangpur', 1),
(7, '60', 'সিলেট                                   ', 'Sylhet', 1),
(8, '90', 'ময়মনসিংহ', 'Mymensing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_for` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `attachment`, `status`, `created_for`, `created_at`, `updated_at`) VALUES
(1, 'How can i have census data ?', 'Subscribe and register then login to your dashboard. Apply and choose which data you want, checkout the status, if your application approved then pay for the data and receive it.', NULL, NULL, 'Citizen help', '2021-11-18 11:54:35', '2021-11-18 11:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `group_permissions`
--

CREATE TABLE `group_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `controller` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allowed` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_carts`
--

CREATE TABLE `inventory_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_inventory_id` bigint(20) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` int(11) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name_en`, `name_bn`, `created_at`, `updated_at`) VALUES
(1, 'HQ', 'হেড কোয়ার্টার', NULL, NULL),
(2, 'Division Office', 'বিভাগীয় কার্যালয়', NULL, NULL),
(3, 'District Office', 'জেলা কার্যালয়', NULL, NULL),
(4, 'Upazila Office', 'উপজেলা কার্যালয়', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `sr_user_id` int(11) DEFAULT 0,
  `sms_template_id` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_sms` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unsend, 1=send',
  `is_email` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unsend, 1=send',
  `modified` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
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
(259, '2014_10_12_000000_create_users_table', 1),
(260, '2014_10_12_100000_create_password_resets_table', 1),
(261, '2019_08_19_000000_create_failed_jobs_table', 1),
(262, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(263, '2021_10_25_061917_create_accounts_table', 1),
(264, '2021_10_25_080111_create_offices_table', 1),
(265, '2021_10_25_080112_create_applications_table', 1),
(266, '2021_10_25_084940_create_payments_table', 1),
(267, '2021_10_25_085101_create_applications_forward_maps_table', 1),
(268, '2021_10_25_085649_create_applications_processes_table', 1),
(269, '2021_10_25_090308_create_applications_statuses_table', 1),
(270, '2021_10_25_090332_create_payment_gateways_table', 1),
(271, '2021_10_25_090733_create_services_table', 1),
(272, '2021_10_25_090746_create_application_documents_table', 1),
(273, '2021_10_25_090959_create_application_purposes_table', 1),
(274, '2021_10_25_091300_create_application_services_table', 1),
(275, '2021_10_25_091538_create_articles_table', 1),
(276, '2021_10_25_091848_create_certificates_table', 1),
(277, '2021_10_25_093453_create_service_carts_table', 1),
(278, '2021_10_25_093454_create_service_cart_items_table', 1),
(279, '2021_10_25_095218_create_countries_table', 1),
(280, '2021_10_25_095518_create_designations_table', 1),
(282, '2021_10_25_100410_create_service_items_table', 1),
(283, '2021_10_25_100744_create_service_item_additionals_table', 1),
(284, '2021_10_25_101004_create_sms_email_templates_table', 1),
(285, '2021_10_25_101312_create_subscribers_table', 1),
(286, '2021_10_25_101630_create_template_settings_table', 1),
(287, '2021_10_25_102012_create_faqs_table', 1),
(288, '2021_10_25_102701_create_group_permissions_table', 1),
(289, '2021_10_25_102949_create_messages_table', 1),
(290, '2021_10_25_103738_create_notifications_table', 1),
(291, '2021_10_25_103913_create_notices_table', 1),
(292, '2021_10_25_104146_create_user_groups_table', 1),
(293, '2021_10_25_104604_create_user_group_roles_table', 1),
(294, '2021_10_26_121638_create_divisions_table', 1),
(295, '2021_10_26_121639_create_districts_table', 1),
(296, '2021_10_26_121721_create_upazilas_table', 1),
(297, '2021_10_27_062944_create_roles_table', 1),
(298, '2021_10_28_122533_create_permissions_table', 1),
(299, '2021_10_28_143218_create_role_permissions_table', 1),
(300, '2021_11_09_102415_create_receiving_modes_table', 1),
(301, '2021_11_09_181321_create_levels_table', 1),
(302, '2021_12_02_123146_create_application_service_item_downloads_table', 2),
(303, '2021_12_02_123325_create_application_service_item_download_details_table', 2),
(304, '2021_10_25_100012_create_service_inventories_table', 3),
(305, '2021_12_06_174342_create_inventory_carts_table', 4),
(306, '2021_12_07_181804_create_service_orders_table', 5),
(307, '2021_12_07_191241_create_service_order_items_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `detail`, `exp_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'বাংলাদেশ পরিসংখ্যান ব্যুরোর রাজস্ব', 'বাংলাদেশ পরিসংখ্যান ব্যুরোর রাজস্ব বাজেটের নক্সাবিদ, ডাটা এন্ট্রি/কন্ট্রোল অপারেটর, সিনিয়র নক্সাবিদ, এবং সাঁট মুদ্রাক্ষরিক কাম কম্পিউটার অপারেটর পদে নিয়োগের লক্ষ্যে প্রার্থীদের লিখিত পরীক্ষা গ্রহনের সময়সূচি ও পরীক্ষা কেন্দ্রের তালিকা সংক্রান্ত বিজ্ঞপ্তি।\n', '2021-12-21', 1, '2021-11-18 10:36:24', '2021-11-22 05:33:48'),
(2, '১৯/১১/২০২১ খ্রি. তারিখে অনুষ্ঠিত', '১৯/১১/২০২১ খ্রি. তারিখে অনুষ্ঠিত হিসাবরক্ষক,সাঁটলিপিকার কাম কম্পিউটার অপারেটর, কম্পোজিটর, সহকারী স্টোরকিপার, প্রুফম্যান পদের লিখিত পরীক্ষার ফলাফল প্রকাশ', '2021-12-30', 1, '2021-11-18 10:36:24', '2021-11-22 05:25:21'),
(3, 'বাংলাদেশ পরিসংখ্যান ব্যুরোর', 'বাংলাদেশ পরিসংখ্যান ব্যুরোর বিদ্যমান \"অফিস সহকারী\" পদের পদনাম পরিবর্তনপূর্বক \'অফিস সহকারী-কাম-কম্পিউটার মুদ্রা্ক্ষরিক করণ প্রসংগে\n', '2021-12-01', 1, '2021-11-18 10:36:24', '2021-11-22 05:25:38'),
(4, 'বাংলাদেশ পরিসংখ্যান ব্যুরোর আওতায়', 'বাংলাদেশ পরিসংখ্যান ব্যুরোর আওতায় পরিসংখ্যান সহকারী পদের ০৫-১১-২০২১ খ্রি. তারিখে অনুষ্ঠিত লিখিত পরীক্ষার ফলাফল বিবিএস এর ওয়েবসাইটে প্রকাশ', '2021-12-22', 1, '2021-11-22 05:18:33', '2021-12-05 12:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `application_id` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` int(11) DEFAULT NULL,
  `office_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ordering` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `level`, `office_code`, `title_bn`, `title_en`, `division_id`, `district_id`, `upazila_id`, `address`, `web_url`, `about_info`, `phone`, `email`, `fax`, `status`, `ordering`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'bbs01', 'হেড অফিস', 'Head Office', 3, 13, 51, 'ঢাকা', '', '', '0123456789', '', '', 1, 1, 1, NULL, NULL, NULL),
(2, 1, 'bbs02', 'লোকাল অফিস', 'Local Office', 3, 13, 52, 'ঢাকা', '', '', '0123654789', '', '', 1, 2, 1, NULL, NULL, NULL);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `application_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sr_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `amount` double(11,2) DEFAULT NULL,
  `fees` double(10,2) DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate_document_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pg_id` int(11) DEFAULT NULL,
  `is_app` tinyint(1) NOT NULL DEFAULT 0,
  `challan_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `un` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pw` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name_en`, `name_bn`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'manage_applications', 'manage_applications', 1, 1, NULL, NULL, NULL),
(2, 'manage_services', 'manage_services', 1, 1, NULL, NULL, NULL),
(3, 'manage_offices', 'manage_offices', 1, 1, NULL, NULL, NULL),
(4, 'user_management', 'user_management', 1, 1, NULL, NULL, NULL),
(5, 'manage_notice', 'manage_notice', 1, 1, NULL, NULL, NULL),
(6, 'manage_designation', 'manage_designation', 1, 1, NULL, NULL, NULL),
(7, 'manage_faqs', 'manage_faqs', 1, 1, NULL, NULL, NULL),
(8, 'app_settings', 'app_settings', 1, 1, NULL, NULL, NULL),
(9, 'settings', 'settings', 1, 1, NULL, NULL, NULL),
(10, 'create_application', 'create_application', 1, 1, NULL, NULL, NULL),
(11, 'submitted_applications', 'submitted_applications', 1, 1, NULL, NULL, NULL),
(12, 'application_detail', 'application_detail', 1, 1, NULL, NULL, NULL),
(13, 'application_process_history', 'application_process_history', 1, 1, NULL, NULL, NULL),
(14, 'add_service', 'add_service', 1, 1, NULL, NULL, NULL),
(15, 'all_services', 'all_services', 1, 1, NULL, NULL, NULL),
(16, 'view_service', 'view_service', 1, 1, NULL, NULL, NULL),
(17, 'edit_service', 'edit_service', 1, 1, NULL, NULL, NULL),
(18, 'delete_service', 'delete_service', 1, 1, NULL, NULL, NULL),
(19, 'add_service_item', 'add_service_item', 1, 1, NULL, NULL, NULL),
(20, 'all_service_items', 'all_service_items', 1, 1, NULL, NULL, NULL),
(21, 'view_service_item', 'view_service_item', 1, 1, NULL, NULL, NULL),
(22, 'edit_service_item', 'edit_service_item', 1, 1, NULL, NULL, NULL),
(23, 'delete_service_item', 'delete_service_item', 1, 1, NULL, NULL, NULL),
(24, 'add_service_additional_item', 'add_service_additional_item', 1, 1, NULL, NULL, NULL),
(25, 'all_service_additional_items', 'all_service_additional_items', 1, 1, NULL, NULL, NULL),
(26, 'view_service_additional_item', 'view_service_additional_item', 1, 1, NULL, NULL, NULL),
(27, 'edit_service_additional_item', 'edit_service_additional_item', 1, 1, NULL, NULL, NULL),
(28, 'delete_service_additional_item', 'delete_service_additional_item', 1, 1, NULL, NULL, NULL),
(29, 'add_office', 'add_office', 1, 1, NULL, NULL, NULL),
(30, 'all_offices', 'all_offices', 1, 1, NULL, NULL, NULL),
(31, 'view_office', 'view_office', 1, 1, NULL, NULL, NULL),
(32, 'edit_office', 'edit_office', 1, 1, NULL, NULL, NULL),
(33, 'delete_office', 'delete_office', 1, 1, NULL, NULL, NULL),
(34, 'add_notice', 'add_notice', 1, 1, NULL, NULL, NULL),
(35, 'all_notices', 'all_notices', 1, 1, NULL, NULL, NULL),
(36, 'edit_notice', 'edit_notice', 1, 1, NULL, NULL, NULL),
(37, 'delete_notice', 'delete_notice', 1, 1, NULL, NULL, NULL),
(38, 'add_designation', 'add_designation', 1, 1, NULL, NULL, NULL),
(39, 'all_designations', 'all_designations', 1, 1, NULL, NULL, NULL),
(40, 'edit_designation', 'edit_designation', 1, 1, NULL, NULL, NULL),
(41, 'delete_designation', 'delete_designation', 1, 1, NULL, NULL, NULL),
(42, 'add_user', 'add_user', 1, 1, NULL, NULL, NULL),
(43, 'all_users', 'all_users', 1, 1, NULL, NULL, NULL),
(44, 'public_users', 'public_users', 1, 1, NULL, NULL, NULL),
(45, 'view_user', 'view_user', 1, 1, NULL, NULL, NULL),
(46, 'edit_user', 'edit_user', 1, 1, NULL, NULL, NULL),
(47, 'block_user', 'block_user', 1, 1, NULL, NULL, NULL),
(48, 'delete_user', 'delete_user', 1, 1, NULL, NULL, NULL),
(49, 'all_roles', 'all_roles', 1, 1, NULL, NULL, NULL),
(50, 'add_role', 'add_role', 1, 1, NULL, NULL, NULL),
(51, 'edit_role', 'edit_role', 1, 1, NULL, NULL, NULL),
(52, 'delete_role', 'delete_role', 1, 1, NULL, NULL, NULL),
(53, 'all_permissions', 'all_permissions', 1, 1, NULL, NULL, NULL),
(54, 'add_permission', 'add_permission', 1, 1, NULL, NULL, NULL),
(55, 'edit_permission', 'edit_permission', 1, 1, NULL, NULL, NULL),
(56, 'assign_permission_list', 'assign_permission_list', 1, 1, NULL, NULL, NULL),
(57, 'assign_permission', 'assign_permission', 1, 1, NULL, NULL, NULL),
(58, 'edit_assign_permission', 'edit_assign_permission', 1, 1, NULL, NULL, NULL),
(59, 'add_faq', 'add_faq', 1, 1, NULL, NULL, NULL),
(60, 'all_faq', 'all_faq', 1, 1, NULL, NULL, NULL),
(61, 'edit_faq', 'edit_faq', 1, 1, NULL, NULL, NULL),
(62, 'status_faq', 'status_faq', 1, 1, NULL, NULL, NULL),
(63, 'add_application_purpose', 'add_application_purpose', 1, 1, NULL, NULL, NULL),
(64, 'all_application_purpose', 'all_application_purpose', 1, 1, NULL, NULL, NULL),
(65, 'edit_application_purpose', 'edit_application_purpose', 1, 1, NULL, NULL, NULL),
(66, 'delete_application_purpose', 'delete_application_purpose', 1, 1, NULL, NULL, NULL),
(67, 'add_application_forward_mapping', 'add_application_forward_mapping', 1, 1, NULL, NULL, NULL),
(68, 'all_application_forward_mapping', 'all_application_forward_mapping', 1, 1, NULL, NULL, NULL),
(69, 'edit_application_forward_mapping', 'edit_application_forward_mapping', 1, 1, NULL, NULL, NULL),
(70, 'add_receiving_mode', 'add_receiving_mode', 1, 1, NULL, NULL, NULL),
(71, 'all_receiving_mode', 'all_receiving_mode', 1, 1, NULL, NULL, NULL),
(72, 'view_receiving_mode', 'view_receiving_mode', 1, 1, NULL, NULL, NULL),
(73, 'edit_receiving_mode', 'edit_receiving_mode', 1, 1, NULL, NULL, NULL),
(74, 'delete_receiving_mode', 'delete_receiving_mode', 1, 1, NULL, NULL, NULL),
(75, 'add_template', 'add_template', 1, 1, NULL, NULL, NULL),
(76, 'edit_template', 'edit_template', 1, 1, NULL, NULL, NULL),
(77, 'status_template', 'status_template', 1, 1, NULL, NULL, NULL),
(78, 'all_template', 'all_template', 1, 1, NULL, NULL, NULL),
(79, 'edit_sms_template', 'edit_sms_template', 1, 1, NULL, NULL, NULL),
(80, 'delete_sms_template', 'delete_sms_template', 1, 1, NULL, NULL, NULL),
(81, 'all_sms_template', 'all_sms_template', 1, 1, NULL, NULL, NULL),
(82, 'all_level', 'all_level', 1, 1, NULL, NULL, NULL),
(83, 'add_level', 'add_level', 1, 1, NULL, NULL, NULL),
(84, 'edit_level', 'edit_level', 1, 1, NULL, NULL, NULL),
(85, 'pending_applications', 'pending_applications', 1, 1, NULL, NULL, NULL),
(86, 'approved_applications', 'approved_applications', 1, NULL, NULL, NULL, NULL),
(87, 'processing_applications', 'processing_applications', 1, NULL, NULL, NULL, NULL),
(88, 'canceled_applications', 'canceled_applications', 1, NULL, NULL, NULL, NULL),
(89, 'forward_application', 'forward_application', 1, 1, NULL, '2021-11-16 10:15:19', '2021-11-16 10:15:19'),
(90, 'approve_application', 'approve_application', 1, 1, NULL, '2021-11-16 10:15:35', '2021-11-16 10:15:35'),
(91, 'cancel_application', 'cancel_application', 1, 1, NULL, '2021-11-16 10:15:45', '2021-11-16 10:15:45'),
(92, 'add_sms_template', 'add_sms_template', 1, 1, NULL, '2021-11-18 11:05:02', '2021-11-18 11:05:02'),
(93, 'total_application_count', 'total_application_count', 1, 1, NULL, '2021-11-22 06:54:38', '2021-11-22 06:54:38'),
(94, 'total_submitted_application_count', 'total_submitted_application_count', 1, 1, NULL, '2021-11-22 06:55:07', '2021-11-22 06:55:07'),
(95, 'total_received_application_count', 'total_received_application_count', 1, 1, NULL, '2021-11-22 06:55:17', '2021-11-22 06:55:17'),
(96, 'total_processed_application_count', 'total_processed_application_count', 1, 1, NULL, '2021-11-22 06:55:27', '2021-11-22 06:55:27'),
(97, 'total_approved_application_count', 'total_approved_application_count', 1, 1, NULL, '2021-11-22 06:55:35', '2021-11-22 06:55:35'),
(98, 'total_rejected_application_count', 'total_rejected_application_count', 1, 1, NULL, '2021-11-22 06:55:43', '2021-11-22 06:55:43'),
(99, 'total_role_count', 'total_role_count', 1, 1, NULL, '2021-11-22 06:55:51', '2021-11-22 06:55:51'),
(100, 'total_subscriber_count', 'total_subscriber_count', 1, 1, NULL, '2021-11-22 06:55:58', '2021-11-22 06:55:58'),
(101, 'total_registered_user_count', 'total_registered_user_count', 1, 1, NULL, '2021-11-22 06:56:08', '2021-11-22 06:56:08'),
(102, 'total_system_user_count', 'total_system_user_count', 1, 1, NULL, '2021-11-22 06:56:16', '2021-11-22 06:56:16'),
(103, 'total_office_count', 'total_office_count', 1, 1, NULL, '2021-11-22 06:56:23', '2021-11-22 06:56:23'),
(105, 'total_service_count', 'total_service_count', 1, 1, NULL, '2021-11-22 06:56:31', '2021-11-22 06:56:31'),
(106, 'user_application_count', 'user_application_count', 1, 1, NULL, '2021-11-22 08:16:23', '2021-11-22 08:16:23'),
(107, 'user_submitted_application_count', 'user_submitted_application_count', 1, 1, NULL, '2021-11-22 08:16:33', '2021-11-22 08:16:33'),
(108, 'user_received_application_count', 'user_received_application_count', 1, 1, NULL, '2021-11-22 08:16:40', '2021-11-22 08:16:40'),
(109, 'user_approved_application_count', 'user_approved_application_count', 1, 1, NULL, '2021-11-22 08:16:49', '2021-11-22 08:16:49'),
(110, 'user_rejected_application_count', 'user_rejected_application_count', 1, 1, NULL, '2021-11-22 08:16:55', '2021-11-22 08:16:55'),
(111, 'user_processed_application_count', 'user_processed_application_count', 1, 1, NULL, '2021-11-22 08:21:31', '2021-11-22 08:21:31'),
(112, 'receiver_application_count', 'receiver_application_count', 1, 1, NULL, '2021-11-22 08:28:38', '2021-11-22 08:28:38'),
(113, 'application_bar_chart', 'application_bar_chart', 1, 1, NULL, '2021-11-23 05:55:20', '2021-11-23 05:55:20'),
(114, 'system_user_login_line_chart', 'system_user_login_line_chart', 1, 1, NULL, '2021-11-23 05:55:30', '2021-11-23 05:55:30'),
(115, 'citizen_served_pie_chart', 'citizen_served_pie_chart', 1, 1, NULL, '2021-11-23 05:55:39', '2021-11-23 05:55:39'),
(116, 'total_money_earn', 'total_money_earn', 1, 1, NULL, '2021-11-23 05:55:48', '2021-11-23 05:55:48'),
(117, 'return_application', 'return_application', 1, 1, NULL, '2021-11-23 05:55:48', '2021-11-23 05:55:48'),
(118, 'manage_storage', 'manage_storage', 1, 1, NULL, '2021-12-02 06:34:39', '2021-12-02 06:34:39'),
(119, 'report', 'report', 1, 1, NULL, '2021-12-02 06:34:39', '2021-12-02 06:34:39'),
(120, 'report', 'report', 1, 1, NULL, '2021-12-02 06:34:39', '2021-12-02 06:34:39');

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
-- Table structure for table `receiving_modes`
--

CREATE TABLE `receiving_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receiving_modes`
--

INSERT INTO `receiving_modes` (`id`, `name_bn`, `name_en`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'ফিজিক্যাল - হার্ড কপি', 'Physical - Hard Copy', 'Only for Publications & Certificates', 1, 1, NULL, NULL, NULL),
(2, 'ফিজিক্যাল - কুরিয়ার', 'Physical - Courier', 'Get Hard Copy Via Courier', 1, 1, NULL, NULL, NULL),
(3, 'ফিজিক্যাল আইটেম', 'Physical - CD/DVD/Flash Drive', 'Users Own', 1, 1, NULL, NULL, NULL),
(4, 'লিংক', 'Download Link', '', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ordering` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name_en`, `name_bn`, `display_name`, `status`, `ordering`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'সুপার অ্যাডমিন', 'Super Admin', 1, 1, 1, NULL, NULL, NULL),
(2, 'Admin', 'অ্যাডমিন', 'Admin', 1, 2, 1, NULL, NULL, NULL),
(3, 'Director General', 'ই-সার্ভিস অ্যাডমিন', 'E-Service Administrator', 1, 3, 1, NULL, NULL, NULL),
(4, 'Deputy Director General', 'ই-সার্ভিস পর্যবেক্ষক', 'E-Service Observer', 1, 4, 1, NULL, NULL, NULL),
(5, 'Director', 'ই-সার্ভিস পর্যবেক্ষক', 'E-Service Observer', 1, 5, 1, NULL, NULL, NULL),
(6, 'Senior Programmer', 'ই-সার্ভিস অপারেটর', 'E-Service Operator', 1, 6, 1, NULL, NULL, NULL),
(7, 'Assistant Officer', 'ই-সার্ভিস অপারেটর', 'E-Service Operator', 1, 7, 1, NULL, NULL, NULL),
(8, 'Assistant Officer (Local)', 'ই-সার্ভিস অপারেটর', 'E-Service Operator', 1, 8, 1, NULL, NULL, NULL),
(9, 'Statistical Officer (Local)', 'ই-সার্ভিস অপারেটর', 'E-Service Operator', 1, 9, 1, NULL, NULL, NULL),
(10, 'Service Recipient', 'সার্ভিস প্রাপক', 'Service Recipient', 1, 10, 1, NULL, NULL, NULL),
(11, 'Store manager', 'স্টোর কিপার', 'Store manager', 1, 1, 1, NULL, '2021-12-05 07:16:56', '2021-12-05 07:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `user_id`, `permission_id`, `role_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(930, NULL, 1, 8, 1, NULL, '2021-11-22 08:38:44', '2021-11-22 08:38:44'),
(931, NULL, 11, 8, 1, NULL, '2021-11-22 08:38:44', '2021-11-22 08:38:44'),
(932, NULL, 12, 8, 1, NULL, '2021-11-22 08:38:44', '2021-11-22 08:38:44'),
(933, NULL, 13, 8, 1, NULL, '2021-11-22 08:38:44', '2021-11-22 08:38:44'),
(934, NULL, 89, 8, 1, NULL, '2021-11-22 08:38:45', '2021-11-22 08:38:45'),
(935, NULL, 90, 8, 1, NULL, '2021-11-22 08:38:45', '2021-11-22 08:38:45'),
(936, NULL, 91, 8, 1, NULL, '2021-11-22 08:38:45', '2021-11-22 08:38:45'),
(937, NULL, 112, 8, 1, NULL, '2021-11-22 08:38:45', '2021-11-22 08:38:45'),
(938, NULL, 1, 9, 1, NULL, '2021-11-22 08:39:50', '2021-11-22 08:39:50'),
(939, NULL, 11, 9, 1, NULL, '2021-11-22 08:39:50', '2021-11-22 08:39:50'),
(940, NULL, 12, 9, 1, NULL, '2021-11-22 08:39:50', '2021-11-22 08:39:50'),
(941, NULL, 13, 9, 1, NULL, '2021-11-22 08:39:50', '2021-11-22 08:39:50'),
(942, NULL, 89, 9, 1, NULL, '2021-11-22 08:39:50', '2021-11-22 08:39:50'),
(943, NULL, 90, 9, 1, NULL, '2021-11-22 08:39:50', '2021-11-22 08:39:50'),
(944, NULL, 91, 9, 1, NULL, '2021-11-22 08:39:50', '2021-11-22 08:39:50'),
(945, NULL, 112, 9, 1, NULL, '2021-11-22 08:39:50', '2021-11-22 08:39:50'),
(1199, NULL, 1, 7, 1, NULL, '2021-11-29 08:18:33', '2021-11-29 08:18:33'),
(1200, NULL, 11, 7, 1, NULL, '2021-11-29 08:18:33', '2021-11-29 08:18:33'),
(1201, NULL, 12, 7, 1, NULL, '2021-11-29 08:18:33', '2021-11-29 08:18:33'),
(1202, NULL, 13, 7, 1, NULL, '2021-11-29 08:18:33', '2021-11-29 08:18:33'),
(1203, NULL, 85, 7, 1, NULL, '2021-11-29 08:18:33', '2021-11-29 08:18:33'),
(1204, NULL, 86, 7, 1, NULL, '2021-11-29 08:18:33', '2021-11-29 08:18:33'),
(1205, NULL, 87, 7, 1, NULL, '2021-11-29 08:18:33', '2021-11-29 08:18:33'),
(1206, NULL, 88, 7, 1, NULL, '2021-11-29 08:18:33', '2021-11-29 08:18:33'),
(1207, NULL, 89, 7, 1, NULL, '2021-11-29 08:18:33', '2021-11-29 08:18:33'),
(1208, NULL, 90, 7, 1, NULL, '2021-11-29 08:18:33', '2021-11-29 08:18:33'),
(1209, NULL, 91, 7, 1, NULL, '2021-11-29 08:18:33', '2021-11-29 08:18:33'),
(1210, NULL, 112, 7, 1, NULL, '2021-11-29 08:18:33', '2021-11-29 08:18:33'),
(1340, NULL, 1, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1341, NULL, 10, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1342, NULL, 11, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1343, NULL, 12, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1344, NULL, 85, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1345, NULL, 86, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1346, NULL, 87, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1347, NULL, 88, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1348, NULL, 106, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1349, NULL, 107, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1350, NULL, 108, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1351, NULL, 109, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1352, NULL, 110, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1353, NULL, 111, 10, 1, NULL, '2021-11-29 12:44:14', '2021-11-29 12:44:14'),
(1354, NULL, 1, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1355, NULL, 2, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1356, NULL, 3, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1357, NULL, 4, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1358, NULL, 5, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1359, NULL, 6, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1360, NULL, 7, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1361, NULL, 8, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1362, NULL, 9, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1363, NULL, 10, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1364, NULL, 11, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1365, NULL, 12, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1366, NULL, 13, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1367, NULL, 14, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1368, NULL, 15, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1369, NULL, 16, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1370, NULL, 17, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1371, NULL, 19, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1372, NULL, 20, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1373, NULL, 21, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1374, NULL, 22, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1375, NULL, 24, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1376, NULL, 25, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1377, NULL, 26, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1378, NULL, 27, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1379, NULL, 29, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1380, NULL, 30, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1381, NULL, 31, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1382, NULL, 32, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1383, NULL, 34, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1384, NULL, 35, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1385, NULL, 36, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1386, NULL, 38, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1387, NULL, 39, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1388, NULL, 40, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1389, NULL, 42, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1390, NULL, 43, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1391, NULL, 44, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1392, NULL, 45, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1393, NULL, 46, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1394, NULL, 47, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1395, NULL, 49, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1396, NULL, 50, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1397, NULL, 51, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1398, NULL, 53, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1399, NULL, 54, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1400, NULL, 55, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1401, NULL, 56, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1402, NULL, 57, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1403, NULL, 58, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1404, NULL, 59, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1405, NULL, 60, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1406, NULL, 61, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1407, NULL, 62, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1408, NULL, 63, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1409, NULL, 64, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1410, NULL, 65, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1411, NULL, 67, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1412, NULL, 68, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1413, NULL, 69, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1414, NULL, 70, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1415, NULL, 71, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1416, NULL, 72, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1417, NULL, 73, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1418, NULL, 75, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1419, NULL, 76, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1420, NULL, 77, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1421, NULL, 78, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1422, NULL, 79, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1423, NULL, 81, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1424, NULL, 82, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1425, NULL, 83, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1426, NULL, 84, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1427, NULL, 85, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1428, NULL, 86, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1429, NULL, 87, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1430, NULL, 89, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1431, NULL, 90, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1432, NULL, 92, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1433, NULL, 93, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1434, NULL, 94, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1435, NULL, 95, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1436, NULL, 96, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1437, NULL, 97, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1438, NULL, 98, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1439, NULL, 99, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1440, NULL, 100, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1441, NULL, 101, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1442, NULL, 102, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1443, NULL, 103, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1444, NULL, 105, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1445, NULL, 113, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1446, NULL, 114, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1447, NULL, 115, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1448, NULL, 116, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1449, NULL, 117, 2, 1, NULL, '2021-11-30 09:00:59', '2021-11-30 09:00:59'),
(1450, NULL, 1, 5, 1, NULL, '2021-11-30 09:01:14', '2021-11-30 09:01:14'),
(1451, NULL, 11, 5, 1, NULL, '2021-11-30 09:01:14', '2021-11-30 09:01:14'),
(1452, NULL, 12, 5, 1, NULL, '2021-11-30 09:01:14', '2021-11-30 09:01:14'),
(1453, NULL, 13, 5, 1, NULL, '2021-11-30 09:01:14', '2021-11-30 09:01:14'),
(1454, NULL, 86, 5, 1, NULL, '2021-11-30 09:01:14', '2021-11-30 09:01:14'),
(1455, NULL, 87, 5, 1, NULL, '2021-11-30 09:01:14', '2021-11-30 09:01:14'),
(1456, NULL, 88, 5, 1, NULL, '2021-11-30 09:01:14', '2021-11-30 09:01:14'),
(1457, NULL, 89, 5, 1, NULL, '2021-11-30 09:01:14', '2021-11-30 09:01:14'),
(1458, NULL, 90, 5, 1, NULL, '2021-11-30 09:01:14', '2021-11-30 09:01:14'),
(1459, NULL, 91, 5, 1, NULL, '2021-11-30 09:01:14', '2021-11-30 09:01:14'),
(1460, NULL, 112, 5, 1, NULL, '2021-11-30 09:01:14', '2021-11-30 09:01:14'),
(1461, NULL, 117, 5, 1, NULL, '2021-11-30 09:01:14', '2021-11-30 09:01:14'),
(1462, NULL, 1, 3, 1, NULL, '2021-11-30 09:01:25', '2021-11-30 09:01:25'),
(1463, NULL, 11, 3, 1, NULL, '2021-11-30 09:01:25', '2021-11-30 09:01:25'),
(1464, NULL, 12, 3, 1, NULL, '2021-11-30 09:01:25', '2021-11-30 09:01:25'),
(1465, NULL, 13, 3, 1, NULL, '2021-11-30 09:01:25', '2021-11-30 09:01:25'),
(1466, NULL, 86, 3, 1, NULL, '2021-11-30 09:01:25', '2021-11-30 09:01:25'),
(1467, NULL, 87, 3, 1, NULL, '2021-11-30 09:01:25', '2021-11-30 09:01:25'),
(1468, NULL, 88, 3, 1, NULL, '2021-11-30 09:01:25', '2021-11-30 09:01:25'),
(1469, NULL, 89, 3, 1, NULL, '2021-11-30 09:01:25', '2021-11-30 09:01:25'),
(1470, NULL, 90, 3, 1, NULL, '2021-11-30 09:01:25', '2021-11-30 09:01:25'),
(1471, NULL, 91, 3, 1, NULL, '2021-11-30 09:01:25', '2021-11-30 09:01:25'),
(1472, NULL, 112, 3, 1, NULL, '2021-11-30 09:01:25', '2021-11-30 09:01:25'),
(1473, NULL, 117, 3, 1, NULL, '2021-11-30 09:01:25', '2021-11-30 09:01:25'),
(1474, NULL, 1, 6, 1, NULL, '2021-11-30 09:01:38', '2021-11-30 09:01:38'),
(1475, NULL, 11, 6, 1, NULL, '2021-11-30 09:01:38', '2021-11-30 09:01:38'),
(1476, NULL, 12, 6, 1, NULL, '2021-11-30 09:01:38', '2021-11-30 09:01:38'),
(1477, NULL, 13, 6, 1, NULL, '2021-11-30 09:01:38', '2021-11-30 09:01:38'),
(1478, NULL, 86, 6, 1, NULL, '2021-11-30 09:01:38', '2021-11-30 09:01:38'),
(1479, NULL, 87, 6, 1, NULL, '2021-11-30 09:01:38', '2021-11-30 09:01:38'),
(1480, NULL, 88, 6, 1, NULL, '2021-11-30 09:01:38', '2021-11-30 09:01:38'),
(1481, NULL, 89, 6, 1, NULL, '2021-11-30 09:01:38', '2021-11-30 09:01:38'),
(1482, NULL, 90, 6, 1, NULL, '2021-11-30 09:01:38', '2021-11-30 09:01:38'),
(1483, NULL, 91, 6, 1, NULL, '2021-11-30 09:01:38', '2021-11-30 09:01:38'),
(1484, NULL, 112, 6, 1, NULL, '2021-11-30 09:01:38', '2021-11-30 09:01:38'),
(1485, NULL, 117, 6, 1, NULL, '2021-11-30 09:01:38', '2021-11-30 09:01:38'),
(1486, NULL, 1, 4, 1, NULL, '2021-11-30 09:01:52', '2021-11-30 09:01:52'),
(1487, NULL, 11, 4, 1, NULL, '2021-11-30 09:01:52', '2021-11-30 09:01:52'),
(1488, NULL, 12, 4, 1, NULL, '2021-11-30 09:01:52', '2021-11-30 09:01:52'),
(1489, NULL, 13, 4, 1, NULL, '2021-11-30 09:01:52', '2021-11-30 09:01:52'),
(1490, NULL, 86, 4, 1, NULL, '2021-11-30 09:01:52', '2021-11-30 09:01:52'),
(1491, NULL, 87, 4, 1, NULL, '2021-11-30 09:01:52', '2021-11-30 09:01:52'),
(1492, NULL, 88, 4, 1, NULL, '2021-11-30 09:01:52', '2021-11-30 09:01:52'),
(1493, NULL, 89, 4, 1, NULL, '2021-11-30 09:01:52', '2021-11-30 09:01:52'),
(1494, NULL, 90, 4, 1, NULL, '2021-11-30 09:01:52', '2021-11-30 09:01:52'),
(1495, NULL, 91, 4, 1, NULL, '2021-11-30 09:01:52', '2021-11-30 09:01:52'),
(1496, NULL, 112, 4, 1, NULL, '2021-11-30 09:01:52', '2021-11-30 09:01:52'),
(1497, NULL, 117, 4, 1, NULL, '2021-11-30 09:01:52', '2021-11-30 09:01:52'),
(1498, NULL, 1, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1499, NULL, 2, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1500, NULL, 3, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1501, NULL, 4, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1502, NULL, 5, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1503, NULL, 6, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1504, NULL, 7, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1505, NULL, 8, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1506, NULL, 9, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1507, NULL, 10, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1508, NULL, 11, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1509, NULL, 12, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1510, NULL, 13, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1511, NULL, 14, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1512, NULL, 15, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1513, NULL, 16, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1514, NULL, 17, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1515, NULL, 18, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1516, NULL, 19, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1517, NULL, 20, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1518, NULL, 21, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1519, NULL, 22, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1520, NULL, 23, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1521, NULL, 24, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1522, NULL, 25, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1523, NULL, 26, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1524, NULL, 27, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1525, NULL, 28, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1526, NULL, 29, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1527, NULL, 30, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1528, NULL, 31, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1529, NULL, 32, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1530, NULL, 33, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1531, NULL, 34, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1532, NULL, 35, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1533, NULL, 36, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1534, NULL, 37, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1535, NULL, 38, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1536, NULL, 39, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1537, NULL, 40, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1538, NULL, 41, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1539, NULL, 42, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1540, NULL, 43, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1541, NULL, 44, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1542, NULL, 45, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1543, NULL, 46, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1544, NULL, 47, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1545, NULL, 48, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1546, NULL, 49, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1547, NULL, 50, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1548, NULL, 51, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1549, NULL, 52, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1550, NULL, 53, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1551, NULL, 54, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1552, NULL, 55, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1553, NULL, 56, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1554, NULL, 57, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1555, NULL, 58, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1556, NULL, 59, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1557, NULL, 60, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1558, NULL, 61, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1559, NULL, 62, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1560, NULL, 63, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1561, NULL, 64, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1562, NULL, 65, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1563, NULL, 66, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1564, NULL, 67, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1565, NULL, 68, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1566, NULL, 69, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1567, NULL, 70, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1568, NULL, 71, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1569, NULL, 72, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1570, NULL, 73, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1571, NULL, 74, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1572, NULL, 75, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1573, NULL, 76, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1574, NULL, 77, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1575, NULL, 78, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1576, NULL, 79, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1577, NULL, 80, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1578, NULL, 81, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1579, NULL, 82, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1580, NULL, 83, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1581, NULL, 84, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1582, NULL, 85, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1583, NULL, 86, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1584, NULL, 87, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1585, NULL, 88, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1586, NULL, 89, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1587, NULL, 90, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1588, NULL, 91, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1589, NULL, 92, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1590, NULL, 93, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1591, NULL, 94, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1592, NULL, 95, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1593, NULL, 96, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1594, NULL, 97, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1595, NULL, 98, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1596, NULL, 99, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1597, NULL, 100, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1598, NULL, 101, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1599, NULL, 102, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1600, NULL, 103, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1601, NULL, 105, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1602, NULL, 113, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1603, NULL, 114, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1604, NULL, 115, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1605, NULL, 116, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1606, NULL, 118, 1, 1, NULL, '2021-12-05 06:47:30', '2021-12-05 06:47:30'),
(1607, NULL, 118, 11, 1, NULL, '2021-12-05 07:17:13', '2021-12-05 07:17:13'),
(1608, NULL, 119, 1, 1, NULL, '2021-12-07 07:09:50', '2021-12-07 07:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ordering` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name_en`, `name_bn`, `office_id`, `level_id`, `status`, `ordering`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Data Sale Services', 'ডেটা বিক্রয় পরিষেবা', 1, 1, 1, 1, 1, 1, '2021-11-17 06:02:55', '2021-11-21 08:33:56'),
(2, 'Publication Sale Service', 'প্রকাশনা বিক্রয় সেবা', 1, 1, 1, 2, 1, 1, NULL, '2021-11-21 08:37:20'),
(3, 'Certificate Management', 'সনদপত্র ব্যবস্থাপনা', 1, 1, 1, 2, 1, 1, NULL, '2021-11-21 08:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `service_carts`
--

CREATE TABLE `service_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sr_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `usage_type` int(11) DEFAULT NULL,
  `organization_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_institute` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose_id` int(11) DEFAULT NULL,
  `purpose_specify` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiving_mode_hardcopy` int(11) DEFAULT NULL COMMENT '1=Physical, 2=Courier',
  `receiving_mode_softcopy` int(11) DEFAULT NULL COMMENT '3=CD/DVD/Flash Drive, 4=Download_link',
  `terms` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_carts`
--

INSERT INTO `service_carts` (`id`, `sr_user_id`, `office_id`, `level_id`, `division_id`, `district_id`, `upazila_id`, `usage_type`, `organization_name`, `organization_address`, `organization_designation`, `personal_occupation`, `personal_institute`, `purpose_id`, `purpose_specify`, `receiving_mode_hardcopy`, `receiving_mode_softcopy`, `terms`, `status`, `created_at`, `updated_at`) VALUES
(2, 10, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Service Holder', 'Service Engine', 2, NULL, 3, NULL, NULL, NULL, '2021-11-25 12:07:22', '2021-11-29 08:37:53'),
(3, 1, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Pariatur Voluptatem', 'Cupiditate occaecat', 0, NULL, 3, NULL, NULL, NULL, '2021-11-28 04:44:47', '2021-12-05 06:44:18'),
(5, 15, NULL, NULL, 3, 13, 512, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-30 12:35:32', '2021-11-30 12:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `service_cart_items`
--

CREATE TABLE `service_cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_cart_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_item_id` int(11) DEFAULT NULL,
  `service_item_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_inventories`
--

CREATE TABLE `service_inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_item_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'survey data, census data',
  `survey_date` date DEFAULT NULL COMMENT 'survey date, census date',
  `publish_date` date DEFAULT NULL,
  `downloadable_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_hard_copies` int(11) DEFAULT NULL,
  `number_of_complimentary_copies` int(11) DEFAULT NULL,
  `number_of_sale_copies` int(11) DEFAULT NULL,
  `store_room` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shelf_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'shelf_no, almirah no',
  `rack_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_inventories`
--

INSERT INTO `service_inventories` (`id`, `service_id`, `service_item_id`, `title`, `sub_title`, `data_source`, `service_type`, `survey_date`, `publish_date`, `downloadable_link`, `number_of_hard_copies`, `number_of_complimentary_copies`, `number_of_sale_copies`, `store_room`, `shelf_no`, `rack_no`, `price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Test 1 ', 'TEst 1', 'https://www.youtube.com/watch?v=Q3TI27IN7X0', '', NULL, '2021-12-01', 'https://www.youtube.com/watch?v=Q3TI27IN7X0', 145, 40, 5, 'BBS 101', '151', '2', 150.00, 1, 1, NULL, '2021-12-05 08:27:33', '2021-12-08 06:20:00'),
(2, 1, 2, 'Non aut quo sint asp', 'Nostrud laborum elit', 'Quia in ipsum sunt o', NULL, '1984-10-14', '1999-09-09', 'Ex beatae facere sol', 27, NULL, 72, 'Voluptas sint ullam', 'Nam quo repudiandae', 'Ullamco ipsum volupt', 195.00, 1, NULL, NULL, '2021-12-05 11:11:39', '2021-12-05 11:11:39'),
(3, 3, 1, 'Labore sit ut rerum', 'Minim molestiae reic', 'Nulla reprehenderit', NULL, '2019-01-11', '1990-12-07', 'Eaque nihil blanditi', 93, 907, 13, 'Quia eum irure rerum', 'At velit veritatis', 'Rerum ea labore in a', 1000.00, 1, NULL, NULL, '2021-12-05 11:12:38', '2021-12-08 06:20:00'),
(4, 1, 18, 'asdasdsad', 'asdasdasd', 'asdasdasd', NULL, '2021-12-07', '2021-12-07', 'asdasdsad', 144, 120, 30, 'Impedit corporis pr', 'Quia cum minus ut ut', 'Totam enim sit nemo', 120.00, 1, NULL, NULL, '2021-12-07 05:08:40', '2021-12-08 06:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `service_items`
--

CREATE TABLE `service_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `data_type` int(11) DEFAULT NULL COMMENT '1 = Hard Copy, 2 = Soft Copy',
  `item_name_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name_bn` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ordering` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_items`
--

INSERT INTO `service_items` (`id`, `service_id`, `data_type`, `item_name_en`, `item_name_bn`, `price`, `description`, `status`, `ordering`, `attachment`, `barcode`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 0, 'Citizen Certificate', 'নাগরিক সার্টিফিকেট', 100.00, 'Through this service, employers can check the validity of the certificate provided by a prospective Bengali employee before applying for the work permit....', 1, 3, '18file2021_12_08_044330_54697728.jpg', 'bbs0000001', 1, NULL, NULL, NULL),
(2, 1, 0, 'Census Publication 2018', 'আদমশুমারি প্রকাশনা ২০১৮', 300.00, 'Bangladesh is the eighth-most populated country in the world with almost 2.2% of the worlds population. The population is estimated by the 2019 revision of the World Population Prospects to have stood at 161,376,708 in 2018......', 1, 1, '17file2021_12_08_044340_24151438.jpeg', 'bbs0000002', 1, NULL, NULL, NULL),
(3, 1, 0, 'Population and Housing Census 2011', 'জনসংখ্যা ও গৃহায়ন আদমশুমারি ২০১১', 500.00, 'The population and housing census is the unique source of reliable and comprehensive benchmark\r\ndata about the size of population and also on major socio-economic & demographic characteristics of\r\nthe population of the country.\r\nThe population and housing census provides information on geographic and administrative\r\ndistribution of population and household, in addition to the aggregated data on demographic and\r\nsocio-economic characteristics of the population of the country. The data from the census is classified,\r\ntabulated and disseminated so that researchers, administrators, policy makers and development\r\npartners can use census data in formulating and implementing multi-sectoral development programs\r\nat the national and sub-national levels.', 1, 1, '18file2021_12_08_044330_54697728.jpg', 'bbs0000003', 1, NULL, '2021-11-23 06:07:44', '2021-11-23 06:07:44'),
(4, 3, 0, 'Area Census Certificate', 'এলাকা শুমারি সার্টিফিকেট', 200.00, 'Whenever the population of any county, township, or city is referred to in any Iowa law, the official population is the last preceding certified federal census unless otherwise provided', 1, 1, '17file2021_12_08_044340_24151438.jpeg', 'bbs0000004', 1, NULL, '2021-11-23 06:18:21', '2021-11-23 06:18:21'),
(5, 2, 0, 'CONCEPT NOTE - NATIONAL POPULATION REGISTER (NPR) BANGLADESH', 'কনসেপ্ট নোট - ন্যাশনাল পপুলেশন রেজিস্টার', 450.00, 'Bangladesh is advancing so fast in generation of data and usage of information technology\r\nfor the last couple of years. A wide range of ministries, departments, agencies and private\r\nservice providers create and manage a variety of datasets and mapping capacities for their\r\nspecific needs. The non-government and development partners are also doing the same type\r\nof data management for their own. Government is also creating huge volume of data through\r\ndifferent surveys, census and administrative activities across the entire system.', 1, 1, '18file2021_12_08_044330_54697728.jpg', 'bbs0000005', 1, NULL, '2021-11-23 06:21:30', '2021-11-23 06:21:30'),
(9, 1, 0, 'Welfare Monitoring Survey', 'ওয়েলফেয়ার মনিটরিং জরিপ', 250.00, 'Bangladesh Bureau of Statistics has conducted Welfare Monitoring Survey (WMS) in March 2009. The Objectives of the WMS were to collect some core welfare indicators for assessing the poverty situation of the country excluding the income and expenditure dimension of poverty assessment. It is worth mentioning that traditional Household income and Expenditure Survey is the main instrument for measuring the poverty using income/expenditure behavior the household. The WMS included a number of indicators which can be generated annually to measure the progress in poverty reduction strategy of the government. The areas that have been covered in the survey are household and housing characteristics, population characteristics , health situation, self assessment of poverty, food security, clothing and footwear, crisis coping, credit and investment, participation in the social organization such as clubs and associations, security, women empowerment, recreation and leisure etc.', 1, 1, '17file2021_12_08_044340_24151438.jpeg', 'bbs0000009', 1, NULL, '2021-11-25 08:00:04', '2021-11-25 08:00:04'),
(10, 1, 0, 'Census of Manufacturing Industries', 'উৎপাদন শিল্পের আদমশুমারি', 350.00, 'Bangladesh Bureau of Statistics has been conducting Census of Manufacturing Industries (CMI) every year for the last two decades. It was designed to cover all industrial units registered with Chief Inspector of Factory (CIF) under the Factory Act 1934. The Factories Act covers all units that employ 10 or more persons.', 1, 2, '18file2021_12_08_044330_54697728.jpg', 'bbs0000010', 1, NULL, '2021-11-25 08:08:02', '2021-11-25 08:08:02'),
(11, 1, 0, 'Annual Establishment & Institution Survey', 'বার্ষিক প্রতিষ্ঠা ও প্রতিষ্ঠান জরিপ', 150.00, 'The Annual Establishment and Institution Survey (AEIS) is an integrated survey programme of BBS. Large and medium scale manufacturing establishments with 10 or more employees were excluded from AEIS. Small manufacturing establishments (less than 10 persons) and all permanent establishments, irrespective of employment sizes such as Wholesale and Retail Trade, Hotel and Restaurant, Business and Social services and Non-farm household based economic activities are included in AEIS.', 1, 1, '17file2021_12_08_044340_24151438.jpeg', 'bbs0000011', 1, NULL, '2021-11-25 08:10:09', '2021-11-25 08:10:09'),
(12, 2, 0, 'The Statistical Yearbook Bangladesh', 'দ্য স্ট্যাটিসটিক্যাল ইয়ারবুক বাংলাদেশ', 550.00, 'The Statistical Yearbook Bangladesh is one of the most important public documents which\r\ncontribute a lot towards formulating effective and fruitful public policy. In addition, it is considered\r\nas a unique tool which can greatly help us to face the upcoming challenges in different fields of\r\npublic policy. It is a consolidated report to make an integration of Sustainable Development Goals\r\nof the 2030 Agenda for Sustainable Development into the 8\r\nth Five Year Plan (2020-25), 2\r\nnd\r\nPerspective Plan 2021-2041, National Social Security Strategy and Bangladesh Delta plan 2100.', 1, 1, '18file2021_12_08_044330_54697728.jpg', 'bbs0000012', 1, NULL, '2021-11-25 08:18:26', '2021-11-25 08:18:26'),
(13, 2, 0, 'Report on crop survey', 'ফসল জরিপ রিপোর্ট', 200.00, 'This Report provides rural developments’ information, farmers’\r\nlivelihoods and agriculture related information in different dimension for the users at national and\r\ndivisional levels. I hope that the report will be the key source of data for policy makers, planners,\r\ndeveloping organizations, civil society members, media and development partners in formulating\r\npolicies, defining the strategies and undertaking development programmes in different levels for the\r\ndevelopment of the country', 1, 2, '17file2021_12_08_044340_24151438.jpeg', 'bbs0000013', 1, NULL, '2021-11-25 08:29:28', '2021-11-25 08:29:28'),
(14, 2, 0, 'Census of agriculture', 'কৃষি আদমশুমারি', 200.00, 'Agriculture Census is the source of benchmark information of Agriculture sector of a country. Therefore, the development of agriculture sector is virtually synonymous with the development of our country. Timely and realistic statistics on agriculture sector is pre-requisite for sound agriculture development planning.', 1, 1, '18file2021_12_08_044330_54697728.jpg', 'bbs0000014', 1, NULL, '2021-11-25 08:36:07', '2021-11-25 08:36:07'),
(15, 2, 0, 'Foreign trade statistics of Bangladesh', 'বাংলাদেশের বৈদেশিক বাণিজ্য পরিসংখ্যান', 650.00, 'Foreign Trade Statistics (FTS) is an important annual publication of Bangladesh Bureau of Statistics (BBS)\r\nwhich is being published regularly since 1973-74. The publication contains disaggregated data on FTS,\r\nwhich are the end product of a complex process comprising many stages starting from the collection and\r\nprocessing of basic records of compilation. This is the 34th issue of FTS series which bears detailed\r\ninformation on merchandise export and import figures for fiscal year 2019-20 in different dimensions.', 1, 1, '17file2021_12_08_044340_24151438.jpeg', 'bbs0000015', 1, NULL, '2021-11-25 08:40:10', '2021-11-25 08:40:10'),
(16, 3, 0, 'Bangladesh compendium of environment statistics', 'বাংলাদেশ পরিবেশ পরিসংখ্যানের সংকলন', 300.00, 'Development of environment statistics is the main base line for developing the sustainable\r\nenvironmental management. It describe the state and trends of the environment, covering the in\r\ngrading of the natural environment (air/climate, water, land/soil, etc), the biota within the media,\r\nhuman settlements, natural events and its impacts, social responses to environmental impacts, and the\r\nquality and availability of natural assets. Thus the broad area of environmental statistic includes\r\nenvironmental indicators, indices and accounting. Compendium of Environment Statistics of\r\nBangladesh’ 2009 is the outcomes from the upgrading of Compendium of Environment Statistics of\r\nBangladesh – 2005 and Bangladesh Framework for Development of Environmental Statistics (BFDES). The data included in this publication are mostly from the secondary sources and efforts have\r\nbeen made to include the latest data wherever possible.', 1, 1, '18file2021_12_08_044330_54697728.jpg', 'bbs0000016', 1, NULL, '2021-11-25 09:03:40', '2021-11-25 09:03:40'),
(17, 3, 1, 'Literacy Assesment Survey', 'সাক্ষরতা মূল্যায়ন জরিপ', 350.00, 'The literacy assessment survey was conducted throughout the country in 73,204 households of 3350\r\nPrimary Sampling Units (PSUs) from 17th to 28th November, 2011 with the budget from the\r\ngovernment. This survey provided valid, reliable and interpretable data on adult literacy status of\r\nthe country. A set of instruments were developed by BBS under this assignment which can be used\r\nin future. The data generated through the survey will also be helpful for planners, policy makers,\r\nresearchers, students and academicians.', 1, 1, '17file2021_12_08_044340_24151438.jpeg', 'bbs0000017', 1, 1, '2021-11-25 09:06:58', '2021-12-08 10:43:40'),
(18, 1, 1, 'service item1', 'সার্ভিস আইটেম ১', 100.00, 'test', 1, 30, '18file2021_12_08_044330_54697728.jpg', 'bbs00000018', 1, 1, '2021-12-02 07:00:32', '2021-12-08 10:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `service_item_additionals`
--

CREATE TABLE `service_item_additionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `item_name_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name_bn` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ordering` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_item_additionals`
--

INSERT INTO `service_item_additionals` (`id`, `service_id`, `item_name_en`, `item_name_bn`, `price`, `status`, `ordering`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 'Census Publication book', 'আদমশুমারি প্রকাশনার বই', 0.00, 1, 1, 1, NULL, '2021-11-18 11:12:06', '2021-11-18 11:12:06'),
(4, 1, 'Census Publication 2018 book', 'Census Publication 2018 বই', 0.00, 1, 1, 1, NULL, '2021-11-23 06:40:08', '2021-11-23 06:40:08'),
(5, 2, 'Citizen Certificate online copy', 'নাগরিক সনদ অনলাইন কপি', 0.00, 1, 1, 1, NULL, '2021-11-23 06:42:05', '2021-11-23 06:42:05'),
(6, 4, 'Population and Housing Census Guide', 'জনসংখ্যা এবং হাউজিং সেন্সাস গাইড', 0.00, 1, 1, 1, NULL, '2021-11-23 06:43:54', '2021-11-23 06:43:54'),
(7, 1, 'Agriculture Census', 'কৃষি শুমারি', 0.00, 1, 1, 1, NULL, '2021-11-25 09:44:15', '2021-11-25 09:44:15'),
(8, 2, 'Census of Manufacturing Industries', 'উৎপাদনের আদমশুমারি', 0.00, 1, 1, 1, NULL, '2021-11-25 09:45:36', '2021-11-25 09:45:36'),
(9, 1, 'Statistical Year book of Major & Minor Crops', 'পরিসংখ্যানের বছরের বই প্রধান ও গৌণ ফসল', 0.00, 1, 1, 1, NULL, '2021-11-25 09:47:10', '2021-11-25 09:47:10'),
(10, 3, 'Sample Vital Registration Survey', 'নমুনা গুরুত্বপূর্ণ নিবন্ধন জরিপ', 0.00, 1, 1, 1, NULL, '2021-11-25 09:47:51', '2021-11-25 09:47:51'),
(11, 2, 'National Accounting Reports', 'ন্যাশনাল অ্যাকাউন্টিং রিপোর্ট', 0.00, 1, 1, 1, NULL, '2021-11-25 09:48:35', '2021-11-25 09:48:35'),
(12, 2, 'Statistical Pocket Book', 'পরিসংখ্যান পকেট বই', 0.00, 1, 1, 1, NULL, '2021-11-25 09:49:06', '2021-11-25 09:49:06'),
(13, 3, '. Report on Pilot Wage Survey', 'পাইলট মজুরি সম্পর্কে প্রতিবেদন জরিপ', 0.00, 1, 1, 1, NULL, '2021-11-25 09:49:53', '2021-11-25 09:49:53'),
(14, 3, 'Welfare Monitoring Survey', 'ওয়েলফেয়ার মনিটরিং জরিপ', 0.00, 1, 1, 1, NULL, '2021-11-25 09:50:27', '2021-11-25 09:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `service_orders`
--

CREATE TABLE `service_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_quantity` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `user_id` bigint(20) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_orders`
--

INSERT INTO `service_orders` (`id`, `total_quantity`, `total_price`, `paid_amount`, `due_amount`, `payment_status`, `user_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, '13.00', '1270.00', '1270.00', '0.00', 'paid', 1, NULL, '2021-12-08 06:20:00', '2021-12-08 06:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `service_order_items`
--

CREATE TABLE `service_order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `service_inventory_id` bigint(20) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_order_items`
--

INSERT INTO `service_order_items` (`id`, `order_id`, `service_inventory_id`, `price`, `quantity`, `user_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '150.00', 5, 1, NULL, '2021-12-08 06:20:00', '2021-12-08 06:20:00'),
(2, 1, 3, '1000.00', 2, 1, NULL, '2021-12-08 06:20:00', '2021-12-08 06:20:00'),
(3, 1, 4, '120.00', 6, 1, NULL, '2021-12-08 06:20:00', '2021-12-08 06:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `sms_email_templates`
--

CREATE TABLE `sms_email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_email_templates`
--

INSERT INTO `sms_email_templates` (`id`, `title`, `details`, `type`, `subject`, `created_at`, `updated_at`) VALUES
(1, 'Subscriber', 'Subscriber', 1, 'Subscriber', '2021-11-18 11:05:39', '2021-11-18 11:05:39'),
(2, 'Register', 'Thanks you for Registering to BBS.', 1, 'Register Email', '2021-11-18 11:18:06', '2021-11-18 11:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `username`, `email`, `phone`, `activation_code`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'atiqurrahman', 'atiqur.rahman@sebpo.com', '0123456789', '202111230145101f741e00e9a9e5b39c4e93a5ee3d59c1', 0, '2021-11-23 07:45:10', '2021-11-23 07:50:00'),
(3, 'TauhidSEBPO', 'tauhid.hasan@sebpo.com', '01677163339', '20211130121314a6722975e922de2affca2550d7fc6d48', 0, '2021-11-30 06:13:14', '2021-11-30 06:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `template_settings`
--

CREATE TABLE `template_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `header` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` int(11) NOT NULL,
  `upazila_bbs_code` varchar(2) DEFAULT NULL,
  `district_id` varchar(2) NOT NULL,
  `district_bbs_code` varchar(2) NOT NULL,
  `division_id` int(11) NOT NULL,
  `division_bbs_code` varchar(2) NOT NULL,
  `name_bd` varchar(150) DEFAULT NULL,
  `name_en` varchar(150) DEFAULT NULL,
  `district_name` varchar(150) DEFAULT NULL,
  `division_name` varchar(150) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `upazila_bbs_code`, `district_id`, `district_bbs_code`, `division_id`, `division_bbs_code`, `name_bd`, `name_en`, `district_name`, `division_name`, `status`) VALUES
(1, '47', '63', '93', 3, '30', 'কালিহাতী', 'KALIHATI', 'টাংগাইল                                 ', 'ঢাকা                                    ', 1),
(2, '23', '63', '93', 3, '30', 'দেলদুয়ার', 'DELDUAR', 'টাংগাইল                                 ', 'ঢাকা                                    ', 1),
(3, '76', '63', '93', 3, '30', 'নাগরপুর', 'NAGARPUR', 'টাংগাইল                                 ', 'ঢাকা                                    ', 1),
(4, '09', '63', '93', 3, '30', 'বাসাইল', 'BASAIL', 'টাংগাইল                                 ', 'ঢাকা                                    ', 1),
(5, '57', '63', '93', 3, '30', 'মধুপুর', 'MADHUPUR', 'টাংগাইল                                 ', 'ঢাকা                                    ', 1),
(6, '95', '63', '93', 3, '30', 'টাংগাইল সদর', 'TANGAIL SADAR', 'টাংগাইল                                 ', 'ঢাকা                                    ', 1),
(7, '28', '63', '93', 3, '30', 'ঘাটাইল', 'GHATAIL', 'টাংগাইল                                 ', 'ঢাকা                                    ', 1),
(8, '19', '63', '93', 3, '30', 'ভূয়াপুর', 'BHUAPUR', 'টাংগাইল                                 ', 'ঢাকা                                    ', 1),
(9, '38', '63', '93', 3, '30', 'গোপালপুর', 'GOPALPUR', 'টাংগাইল                                 ', 'ঢাকা                                    ', 1),
(10, '66', '63', '93', 3, '30', 'মির্জাপুর', 'MIRZAPUR', 'টাংগাইল                                 ', 'ঢাকা                                    ', 1),
(11, '85', '63', '93', 3, '30', 'সখিপুর', 'SAKHIPUR', 'টাংগাইল                                 ', 'ঢাকা                                    ', 1),
(12, '40', '46', '72', 8, '90', 'কলমাকান্দা', 'KALMAKANDA', 'নেত্রকোনা                               ', 'ময়মনসিংহ                ', 1),
(13, '56', '46', '72', 8, '90', 'মদন', 'MADAN', 'নেত্রকোনা                               ', 'ময়মনসিংহ                ', 1),
(14, '04', '46', '72', 8, '90', 'আটপাড়া', 'ATPARA', 'নেত্রকোনা                               ', 'ময়মনসিংহ                ', 1),
(15, '09', '46', '72', 8, '90', 'বারহাট্টা', 'BARHATTA', 'নেত্রকোনা                               ', 'ময়মনসিংহ                ', 1),
(16, '74', '46', '72', 8, '90', 'নেত্রকোনা সদর', 'NETROKONA SADAR', 'নেত্রকোনা                               ', 'ময়মনসিংহ                ', 1),
(17, '18', '46', '72', 8, '90', 'দুর্গাপুর', 'DURGAPUR', 'নেত্রকোনা                               ', 'ময়মনসিংহ                ', 1),
(18, '63', '46', '72', 8, '90', 'মোহনগঞ্জ', 'MOHANGANJ', 'নেত্রকোনা                               ', 'ময়মনসিংহ                ', 1),
(19, '47', '46', '72', 8, '90', 'কেন্দুয়া', 'KENDUA', 'নেত্রকোনা                               ', 'ময়মনসিংহ                ', 1),
(20, '83', '46', '72', 8, '90', 'পূর্ব্বধলা', 'PURBADHALA', 'নেত্রকোনা                               ', 'ময়মনসিংহ                ', 1),
(21, '38', '46', '72', 8, '90', 'খালিয়াজুরী', 'KHALIAJURI', 'নেত্রকোনা                               ', 'ময়মনসিংহ                ', 1),
(22, '16', '39', '61', 8, '90', 'ধোবাউরা', 'DHOBAURA', 'ময়মনসিংহ                                ', 'ময়মনসিংহ                ', 1),
(23, '81', '39', '61', 8, '90', 'ফুলপুর', 'PHULPUR', 'ময়মনসিংহ                                ', 'ময়মনসিংহ                ', 1),
(24, '24', '39', '61', 8, '90', 'হালুয়াঘাট', 'HALUAGHAT', 'ময়মনসিংহ                                ', 'ময়মনসিংহ                ', 1),
(25, '31', '39', '61', 8, '90', 'ঈশ্বরগঞ্জ', 'ISHWARGANJ', 'ময়মনসিংহ                                ', 'ময়মনসিংহ                ', 1),
(26, '72', '39', '61', 8, '90', 'নান্দাইল', 'NANDAIL', 'ময়মনসিংহ                                ', 'ময়মনসিংহ                ', 1),
(27, '65', '39', '61', 8, '90', 'মুক্তাগাছা', 'MUKTAGACHHA', 'ময়মনসিংহ                                ', 'ময়মনসিংহ                ', 1),
(28, '94', '39', '61', 8, '90', 'ত্রিশাল', 'TRISHAL', 'ময়মনসিংহ                                ', 'ময়মনসিংহ                ', 1),
(29, '23', '39', '61', 8, '90', 'গৌরিপুর', 'GAURIPUR', 'ময়মনসিংহ                                ', 'ময়মনসিংহ                ', 1),
(30, '22', '39', '61', 8, '90', 'গফরগাঁও', 'GAFFARGAON', 'ময়মনসিংহ                                ', 'ময়মনসিংহ                ', 1),
(31, '20', '39', '61', 8, '90', 'ফুলবাড়ীয়া', 'FULBARIA', 'ময়মনসিংহ                                ', 'ময়মনসিংহ                ', 1),
(32, '13', '39', '61', 8, '90', 'ভালুকা', 'BHALUKA', 'ময়মনসিংহ                                ', 'ময়মনসিংহ                ', 1),
(33, '52', '39', '61', 8, '90', 'ময়মনসিংহ সদর', 'Mymensingh Sadar', 'ময়মনসিংহ                                ', 'ময়মনসিংহ                ', 1),
(34, '92', '28', '48', 3, '30', 'তাড়াইল', 'TARAIL', 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(35, '27', '28', '48', 3, '30', 'হোসেনপুর', 'HOSSAINPUR', 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(36, '49', '28', '48', 3, '30', 'কিশোরগঞ্জ সদর', 'KISHOREGANJ SADAR', 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(37, '45', '28', '48', 3, '30', 'কটিয়াদি', 'KATIADI', 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(38, '42', '28', '48', 3, '30', 'করিমগঞ্জ', 'KARIMGANJ', 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(39, '54', '28', '48', 3, '30', 'কুলিয়ারচর', 'KULIAR CHAR', 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(40, '33', '28', '48', 3, '30', 'ইটনা', 'ITNA', 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(41, '11', '28', '48', 3, '30', 'ভৈরব', 'BHAIRAB', 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(42, '02', '28', '48', 3, '30', 'অষ্টগ্রাম', 'AUSTAGRAM', 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(43, '79', '28', '48', 3, '30', 'পাকুন্দিয়া', 'PAKUNDIA', 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(44, '06', '28', '48', 3, '30', 'বাজিতপুর', 'BAJITPUR', 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(45, '59', '28', '48', 3, '30', 'মিঠামইন', 'MITHAMAIN', 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(46, '76', '28', '48', 3, '30', 'নিকলী', 'NIKLI', 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(47, NULL, '28', '48', 3, '30', 'আটপাড়া', NULL, 'কিশোরগঞ্জ                               ', 'ঢাকা                                    ', 1),
(49, '16', '13', '26', 3, '30', 'ধানমন্ডি', 'Dhanmondi', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(50, '08', '13', '26', 3, '30', 'ক্যান্টনমেন্ট', 'CANTONMENT', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(51, '48', '13', '26', 3, '30', 'মিরপুর', 'Mirpur', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(52, '40', '13', '26', 3, '30', 'কোতয়ালী', 'Kotwali', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(53, '26', '13', '26', 3, '30', 'গুলশান', 'Gulshan', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(54, '42', '13', '26', 3, '30', 'লালবাগ', 'Lalbagh', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(55, '54', '13', '26', 3, '30', 'মতিঝিল', 'Motijheel', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(57, '04', '13', '26', 3, '30', 'তেজগাঁও', 'TEJGAON UNNAYAN CIRCLE', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(58, '72', '13', '26', 3, '30', 'সাভার', 'SAVAR', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(59, '12', '13', '26', 3, '30', 'ডেমরা', 'Demra', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(60, '66', '13', '26', 3, '30', 'রমনা', 'Ramna', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(63, '50', '13', '26', 3, '30', 'মোহাম্মদপুর', 'Mohammadpur', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(65, '14', '13', '26', 3, '30', 'ধামরাই', 'DHAMRAI', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(66, '18', '13', '26', 3, '30', 'দোহার', 'DOHAR', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(67, '38', '13', '26', 3, '30', 'কেরানীগঞ্জ', 'KERANIGANJ', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(68, '62', '13', '26', 3, '30', 'নবাবগঞ্জ', 'NAWABGANJ', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(69, '84', '15', '29', 3, '30', 'সদরপুর', 'SADARPUR', 'ফরিদপুর                                 ', 'ঢাকা                                    ', 1),
(70, '62', '15', '29', 3, '30', 'নগরকান্দা', 'NAGARKANDA', 'ফরিদপুর                                 ', 'ঢাকা                                    ', 1),
(71, '47', '15', '29', 3, '30', 'ফরিদপুর সদর', 'FARIDPUR SADAR', 'ফরিদপুর                                 ', 'ঢাকা                                    ', 1),
(72, '10', '15', '29', 3, '30', 'ভাঙ্গা', 'BHANGA', 'ফরিদপুর                                 ', 'ঢাকা                                    ', 1),
(73, '56', '15', '29', 3, '30', 'মধুখালী', 'MADHUKHALI', 'ফরিদপুর                                 ', 'ঢাকা                                    ', 1),
(74, '03', '15', '29', 3, '30', 'আলফাডাঙ্গা', 'ALFADANGA', 'ফরিদপুর                                 ', 'ঢাকা                                    ', 1),
(75, '18', '15', '29', 3, '30', 'বোয়ালমারী', 'BOALMARI', 'ফরিদপুর                                 ', 'ঢাকা                                    ', 1),
(76, '21', '15', '29', 3, '30', 'চর ভদ্রাসন', 'CHAR BHADRASAN', 'ফরিদপুর                                 ', 'ঢাকা                                    ', 1),
(78, '58', '19', '35', 3, '30', 'মুকসুদপুর', 'MUKSUDPUR', 'গোপালগঞ্জ                               ', 'ঢাকা                                    ', 1),
(79, '43', '19', '35', 3, '30', 'কাশিয়ানী', 'KASHIANI', 'গোপালগঞ্জ                               ', 'ঢাকা                                    ', 1),
(80, '32', '19', '35', 3, '30', 'গোপালগঞ্জ সদর', 'GOPALGANJ SADAR', 'গোপালগঞ্জ                               ', 'ঢাকা                                    ', 1),
(81, '51', '19', '35', 3, '30', 'কোটালীপাড়া', 'KOTALIPARA', 'গোপালগঞ্জ                               ', 'ঢাকা                                    ', 1),
(82, '91', '19', '35', 3, '30', 'টুংগীপাড়া', 'TUNGIPARA', 'গোপালগঞ্জ                               ', 'ঢাকা                                    ', 1),
(83, '76', '54', '82', 3, '30', 'রাজবাড়ী সদর', 'RAJBARI SADAR', 'রাজবাড়ী                                 ', 'ঢাকা                                    ', 1),
(84, '07', '54', '82', 3, '30', 'বালিয়াকান্দী', 'BALIAKANDI', 'রাজবাড়ী                                 ', 'ঢাকা                                    ', 1),
(85, '73', '54', '82', 3, '30', 'পাংশা', 'PANGSHA', 'রাজবাড়ী                                 ', 'ঢাকা                                    ', 1),
(86, '29', '54', '82', 3, '30', 'গোয়ালন্দ', 'GOALANDA', 'রাজবাড়ী                                 ', 'ঢাকা                                    ', 1),
(87, '40', '33', '54', 3, '30', 'কালকিনি', 'KALKINI', 'মাদারীপুর                               ', 'ঢাকা                                    ', 1),
(88, '54', '33', '54', 3, '30', 'মাদারীপুর (সদর)', 'MADARIPUR SADAR', 'মাদারীপুর                               ', 'ঢাকা                                    ', 1),
(89, '87', '33', '54', 3, '30', 'শিবচর', 'SHIB CHAR', 'মাদারীপুর                               ', 'ঢাকা                                    ', 1),
(90, '80', '33', '54', 3, '30', 'রাজৈর', 'RAJOIR', 'মাদারীপুর                               ', 'ঢাকা                                    ', 1),
(91, '36', '22', '39', 8, '90', 'জামালপুর সদর', 'JAMALPUR SADAR', 'জামালপুর                                ', 'ময়মনসিংহ                ', 1),
(92, '58', '22', '39', 8, '90', 'মাদারগঞ্জ', 'MADARGANJ', 'জামালপুর                                ', 'ময়মনসিংহ                ', 1),
(93, '61', '22', '39', 8, '90', 'মেলান্দহ', 'MELANDAHA', 'জামালপুর                                ', 'ময়মনসিংহ                ', 1),
(94, '07', '22', '39', 8, '90', 'বকশীগঞ্জ', 'BAKSHIGANJ', 'জামালপুর                                ', 'ময়মনসিংহ                ', 1),
(95, '15', '22', '39', 8, '90', 'দেওয়ানগঞ্জ', 'DEWANGANJ', 'জামালপুর                                ', 'ময়মনসিংহ                ', 1),
(96, '29', '22', '39', 8, '90', 'ইসলামপুর', 'ISLAMPUR', 'জামালপুর                                ', 'ময়মনসিংহ                ', 1),
(97, '85', '22', '39', 8, '90', 'সরিষাবাড়ী', 'SARISHABARI', 'জামালপুর                                ', 'ময়মনসিংহ                ', 1),
(98, '36', '57', '86', 3, '30', 'গোসাইর হাট', 'GOSAIRHAT', 'শরীয়তপুর                                ', 'ঢাকা                                    ', 1),
(99, '69', '57', '86', 3, '30', 'শরীয়তপুর সদর', 'SHARIATPUR SADAR', 'শরীয়তপুর                                ', 'ঢাকা                                    ', 1),
(100, '65', '57', '86', 3, '30', 'নড়িয়া', 'NARIA', 'শরীয়তপুর                                ', 'ঢাকা                                    ', 1),
(101, '14', '57', '86', 3, '30', 'ভেদরগঞ্জ', 'BHEDARGANJ', 'শরীয়তপুর                                ', 'ঢাকা                                    ', 1),
(102, '94', '57', '86', 3, '30', 'জাজিরা', 'ZANJIRA', 'শরীয়তপুর                                ', 'ঢাকা                                    ', 1),
(104, '25', '57', '86', 3, '30', 'ডামুড্যা', 'DAMUDYA', 'শরীয়তপুর                                ', 'ঢাকা                                    ', 1),
(105, '28', '35', '56', 3, '30', 'হরিরামপুর', 'HARIRAMPUR', 'মানিকগঞ্জ                               ', 'ঢাকা                                    ', 1),
(106, '10', '35', '56', 3, '30', 'দৌলতপুর', 'DAULATPUR', 'মানিকগঞ্জ                               ', 'ঢাকা                                    ', 1),
(107, '22', '35', '56', 3, '30', 'ঘিওর', 'GHIOR', 'মানিকগঞ্জ                               ', 'ঢাকা                                    ', 1),
(108, '46', '35', '56', 3, '30', 'মানিকগঞ্জ সদর', 'MANIKGANJ SADAR', 'মানিকগঞ্জ                               ', 'ঢাকা                                    ', 1),
(109, '70', '35', '56', 3, '30', 'সাটুরিয়া', 'SATURIA', 'মানিকগঞ্জ                               ', 'ঢাকা                                    ', 1),
(110, '78', '35', '56', 3, '30', 'শিবালয়', 'SHIBALAYA', 'মানিকগঞ্জ                               ', 'ঢাকা                                    ', 1),
(111, '82', '35', '56', 3, '30', 'সিংগাইর', 'SINGAIR', 'মানিকগঞ্জ                               ', 'ঢাকা                                    ', 1),
(112, '60', '43', '68', 3, '30', 'নরসিংদী', 'NARSINGDI SADAR', 'নরসিংদী                                 ', 'ঢাকা                                    ', 1),
(113, '64', '43', '68', 3, '30', 'রায়পুরা', 'ROYPURA', 'নরসিংদী                                 ', 'ঢাকা                                    ', 1),
(114, '63', '43', '68', 3, '30', 'পলাশ', 'PALASH', 'নরসিংদী                                 ', 'ঢাকা                                    ', 1),
(115, '07', '43', '68', 3, '30', 'বেলাব', 'BELABO', 'নরসিংদী                                 ', 'ঢাকা                                    ', 1),
(116, '52', '43', '68', 3, '30', 'মনোহরদী', 'MANOHARDI', 'নরসিংদী                                 ', 'ঢাকা                                    ', 1),
(117, '76', '43', '68', 3, '30', 'শিবপুর', 'SHIBPUR', 'নরসিংদী                                 ', 'ঢাকা                                    ', 1),
(118, '84', '38', '59', 3, '30', 'শ্রীনগর', 'SREENAGAR', 'মুন্সিগঞ্জ                              ', 'ঢাকা                                    ', 1),
(119, '24', '38', '59', 3, '30', 'গজারিয়া', 'GAZARIA', 'মুন্সিগঞ্জ                              ', 'ঢাকা                                    ', 1),
(120, '44', '38', '59', 3, '30', 'লৌহজং', 'LOHAJANG', 'মুন্সিগঞ্জ                              ', 'ঢাকা                                    ', 1),
(121, '56', '38', '59', 3, '30', 'মুন্সিগঞ্জ সদর', 'MUNSHIGANJ SADAR', 'মুন্সিগঞ্জ                              ', 'ঢাকা                                    ', 1),
(122, '74', '38', '59', 3, '30', 'সিরাজদীখান', 'SERAJDIKHAN', 'মুন্সিগঞ্জ                              ', 'ঢাকা                                    ', 1),
(123, '94', '38', '59', 3, '30', 'টংগীবাড়ী', 'TONGIBARI', 'মুন্সিগঞ্জ                              ', 'ঢাকা                                    ', 1),
(124, '04', '42', '67', 3, '30', 'সোনারগাঁ', 'SONARGAON', 'নারায়নগঞ্জ                              ', 'ঢাকা                                    ', 1),
(125, '02', '42', '67', 3, '30', 'আড়াইহাজার', 'ARAIHAZAR', 'নারায়নগঞ্জ                              ', 'ঢাকা                                    ', 1),
(126, '06', '42', '67', 3, '30', 'বন্দর', 'BANDAR', 'নারায়নগঞ্জ                              ', 'ঢাকা                                    ', 1),
(127, '58', '42', '67', 3, '30', 'নারায়নগঞ্জ সদর', 'NARAYANGANJ SADAR', 'নারায়নগঞ্জ                              ', 'ঢাকা                                    ', 1),
(128, '68', '42', '67', 3, '30', 'রূপগঞ্জ', 'RUPGANJ', 'নারায়নগঞ্জ                              ', 'ঢাকা                                    ', 1),
(129, '30', '18', '33', 3, '30', 'গাজীপুর সদর', 'GAZIPUR SADAR', 'গাজীপুর                 ', 'ঢাকা                                    ', 1),
(130, '32', '18', '33', 3, '30', 'কালিয়াকৈর', 'KALIAKAIR', 'গাজীপুর                 ', 'ঢাকা                                    ', 1),
(131, '34', '18', '33', 3, '30', 'কালীগঞ্জ', 'KALIGANJ', 'গাজীপুর                 ', 'ঢাকা                                    ', 1),
(132, '36', '18', '33', 3, '30', 'কাপাসিয়া', 'KAPASIA', 'গাজীপুর                 ', 'ঢাকা                                    ', 1),
(133, '86', '18', '33', 3, '30', 'শ্রীপুর', 'SREEPUR', 'গাজীপুর                 ', 'ঢাকা                                    ', 1),
(134, '96', '18', '33', 3, '30', 'টঙ্গী', 'Tongi', 'গাজীপুর                 ', 'ঢাকা                                    ', 1),
(135, '37', '60', '89', 8, '90', 'ঝিনাইগাতী', 'JHENAIGATI', 'শেরপুর                  ', 'ময়মনসিংহ                ', 1),
(136, '67', '60', '89', 8, '90', 'নকলা', 'NAKLA', 'শেরপুর                  ', 'ময়মনসিংহ                ', 1),
(137, '70', '60', '89', 8, '90', 'নালিতাবাড়ী', 'NALITABARI', 'শেরপুর                  ', 'ময়মনসিংহ                ', 1),
(138, '88', '60', '89', 8, '90', 'শেরপুর সদর', 'SHERPUR SADAR', 'শেরপুর                  ', 'ময়মনসিংহ                ', 1),
(139, '90', '60', '89', 8, '90', 'শ্রীবরদী', 'SREEBARDI', 'শেরপুর                  ', 'ময়মনসিংহ                ', 1),
(140, '11', '23', '41', 4, '40', 'চৌগাছা', 'CHAUGACHHA', 'যশোহর                                  ', 'খুলনা                                   ', 1),
(141, '90', '23', '41', 4, '40', 'শার্শা', 'SHARSHA', 'যশোহর                                  ', 'খুলনা                                   ', 1),
(142, '09', '23', '41', 4, '40', 'বাঘারপাড়া', 'BAGHER PARA', 'যশোহর                                  ', 'খুলনা                                   ', 1),
(143, '47', '23', '41', 4, '40', 'যশোহর সদর', 'Jessore Sadar', 'যশোহর                                  ', 'খুলনা                                   ', 1),
(144, '61', '23', '41', 4, '40', 'মনিরামপুর', 'MANIRAMPUR', 'যশোহর                                  ', 'খুলনা                                   ', 1),
(145, '38', '23', '41', 4, '40', 'কেশবপুর', 'KESHABPUR', 'যশোহর                                  ', 'খুলনা                                   ', 1),
(146, '23', '23', '41', 4, '40', 'ঝিকরগাছা', 'JHIKARGACHHA', 'যশোহর                                  ', 'খুলনা                                   ', 1),
(147, '04', '23', '41', 4, '40', 'অভয়নগর', 'ABHAYNAGAR', 'যশোহর                                  ', 'খুলনা                                   ', 1),
(149, '57', '34', '55', 4, '40', 'মাগুরা সদর', 'MAGURA SADAR', 'মাগুরা                                  ', 'খুলনা                                   ', 1),
(150, '95', '34', '55', 4, '40', 'শ্রীপুর', 'SREEPUR', 'মাগুরা                                  ', 'খুলনা                                   ', 1),
(151, '85', '34', '55', 4, '40', 'শালিখা', 'SHALIKHA', 'মাগুরা                                  ', 'খুলনা                                   ', 1),
(152, '66', '34', '55', 4, '40', 'মহাম্মদপুর', 'MOHAMMADPUR', 'মাগুরা                                  ', 'খুলনা                                   ', 1),
(153, '52', '41', '65', 4, '40', 'লোহাগড়া', 'LOHAGARA', 'নড়াইল                                   ', 'খুলনা                                   ', 1),
(154, '76', '41', '65', 4, '40', 'নড়াইল সদর', 'NARAIL SADAR', 'নড়াইল                                   ', 'খুলনা                                   ', 1),
(155, '28', '41', '65', 4, '40', 'কালিয়া', 'KALIA', 'নড়াইল                                   ', 'খুলনা                                   ', 1),
(158, '42', '25', '44', 4, '40', 'কোটচাঁদপুর', 'KOTCHANDPUR', 'ঝিনাইদহ                                 ', 'খুলনা                                   ', 1),
(159, '14', '25', '44', 4, '40', 'হরিনাকুন্ড', 'HARINAKUNDA', 'ঝিনাইদহ                                 ', 'খুলনা                                   ', 1),
(160, '80', '25', '44', 4, '40', 'শৈলকুপা', 'SHAILKUPA', 'ঝিনাইদহ                                 ', 'খুলনা                                   ', 1),
(161, '33', '25', '44', 4, '40', 'কালিগঞ্জ', 'KALIGANJ', 'ঝিনাইদহ                                 ', 'খুলনা                                   ', 1),
(162, '71', '25', '44', 4, '40', 'মহেশপুর', 'MAHESHPUR', 'ঝিনাইদহ                                 ', 'খুলনা                                   ', 1),
(163, '19', '25', '44', 4, '40', 'ঝিনাইদহ সদর', 'JHENAIDAH SADAR', 'ঝিনাইদহ                                 ', 'খুলনা                                   ', 1),
(164, '47', '58', '87', 4, '40', 'কালিগঞ্জ', 'KALIGANJ', 'সাতক্ষীরা                               ', 'খুলনা                                   ', 1),
(165, '25', '58', '87', 4, '40', 'দেবহাটা', 'DEBHATA', 'সাতক্ষীরা                               ', 'খুলনা                                   ', 1),
(166, '82', '58', '87', 4, '40', 'সাতক্ষীরা সদর', 'SATKHIRA SADAR', 'সাতক্ষীরা                               ', 'খুলনা                                   ', 1),
(167, '43', '58', '87', 4, '40', 'কলারোয়া', 'KALAROA', 'সাতক্ষীরা                               ', 'খুলনা                                   ', 1),
(168, '04', '58', '87', 4, '40', 'আশাশুনি', 'ASSASUNI', 'সাতক্ষীরা                               ', 'খুলনা                                   ', 1),
(169, '86', '58', '87', 4, '40', 'শ্যামনগর', 'SHYAMNAGAR', 'সাতক্ষীরা                               ', 'খুলনা                                   ', 1),
(170, '90', '58', '87', 4, '40', 'তালা', 'TALA', 'সাতক্ষীরা                               ', 'খুলনা                                   ', 1),
(171, '60', '1', '01', 4, '40', 'মোড়েলগঞ্জ', 'MORRELGANJ', 'বাগেরহাট                                ', 'খুলনা                                   ', 1),
(172, '73', '1', '01', 4, '40', 'রামপাল', 'RAMPAL', 'বাগেরহাট                                ', 'খুলনা                                   ', 1),
(173, '34', '1', '01', 4, '40', 'ফকিরহাট', 'FAKIRHAT', 'বাগেরহাট                                ', 'খুলনা                                   ', 1),
(174, '56', '1', '01', 4, '40', 'মোল্লাহাট', 'MOLLAHAT', 'বাগেরহাট                                ', 'খুলনা                                   ', 1),
(175, '08', '1', '01', 4, '40', 'বাগেরহাট সদর', 'BAGERHAT SADAR', 'বাগেরহাট                                ', 'খুলনা                                   ', 1),
(176, '77', '1', '01', 4, '40', 'শরন খোলা', 'SARANKHOLA', 'বাগেরহাট                                ', 'খুলনা                                   ', 1),
(177, '14', '1', '01', 4, '40', 'চিতলমারী', 'CHITALMARI', 'বাগেরহাট                                ', 'খুলনা                                   ', 1),
(178, '38', '1', '01', 4, '40', 'কচুয়া', 'KACHUA', 'বাগেরহাট                                ', 'খুলনা                                   ', 1),
(179, '58', '1', '01', 4, '40', 'মোংলা', 'MONGLA', 'বাগেরহাট                                ', 'খুলনা                                   ', 1),
(180, '12', '27', '47', 4, '40', 'বটিয়াঘাটা', 'BATIAGHATA', 'খুলনা                                   ', 'খুলনা                                   ', 1),
(181, '30', '27', '47', 4, '40', 'ডুমুরিয়া', 'DUMURIA', 'খুলনা                                   ', 'খুলনা                                   ', 1),
(183, '53', '27', '47', 4, '40', 'কয়রা', 'KOYRA', 'খুলনা                                   ', 'খুলনা                                   ', 1),
(184, '69', '27', '47', 4, '40', 'ফুলতলা', 'PHULTALA', 'খুলনা                                   ', 'খুলনা                                   ', 1),
(185, '51', '27', '47', 4, '40', 'খুলনা সদর', 'khulna Sadar', 'খুলনা                                   ', 'খুলনা                                   ', 1),
(186, '64', '27', '47', 4, '40', 'পাইকগাছা', 'PAIKGACHHA', 'খুলনা                                   ', 'খুলনা                                   ', 1),
(187, '75', '27', '47', 4, '40', 'রূপসা', 'RUPSA', 'খুলনা                                   ', 'খুলনা                                   ', 1),
(188, '94', '27', '47', 4, '40', 'তেরখাদা', 'TEROKHADA', 'খুলনা                                   ', 'খুলনা                                   ', 1),
(189, '17', '27', '47', 4, '40', 'দাকোপ', 'DACOPE', 'খুলনা                                   ', 'খুলনা                                   ', 1),
(190, '40', '27', '47', 4, '40', 'দিঘলিয়া', 'DIGHALIA', 'খুলনা                                   ', 'খুলনা                                   ', 1),
(193, '07', '10', '18', 4, '40', 'আলমডাঙ্গা', 'ALAMDANGA', 'চুয়াডাঙ্গা                ', 'খুলনা                                   ', 1),
(194, '23', '10', '18', 4, '40', 'চুয়াডাঙ্গা সদর', 'CHUADANGA SADAR', 'চুয়াডাঙ্গা                ', 'খুলনা                                   ', 1),
(195, '31', '10', '18', 4, '40', 'দামুরহুদা', 'DAMURHUDA', 'চুয়াডাঙ্গা                ', 'খুলনা                                   ', 1),
(196, '55', '10', '18', 4, '40', 'জীবন নগর', 'JIBAN NAGAR', 'চুয়াডাঙ্গা                ', 'খুলনা                                   ', 1),
(197, '15', '30', '50', 4, '40', 'ভেড়ামারা', 'BHERAMARA', 'কুষ্টিয়া                  ', 'খুলনা                                   ', 1),
(198, '39', '30', '50', 4, '40', 'দৌলতপুর', 'DAULATPUR', 'কুষ্টিয়া                  ', 'খুলনা                                   ', 1),
(199, '63', '30', '50', 4, '40', 'খোকসা', 'KHOKSA', 'কুষ্টিয়া                  ', 'খুলনা                                   ', 1),
(200, '71', '30', '50', 4, '40', 'কুমারখালী', 'KUMARKHALI', 'কুষ্টিয়া                  ', 'খুলনা                                   ', 1),
(201, '79', '30', '50', 4, '40', 'কুষ্টিয়া সদর', 'KUSHTIA SADAR', 'কুষ্টিয়া                  ', 'খুলনা                                   ', 1),
(202, '94', '30', '50', 4, '40', 'মিরপুর', 'MIRPUR', 'কুষ্টিয়া                  ', 'খুলনা                                   ', 1),
(203, '47', '36', '57', 4, '40', 'গাংনী', 'GANGNI', 'মেহেরপুর                ', 'খুলনা                                   ', 1),
(204, '87', '36', '57', 4, '40', 'মেহেরপুর সদর', 'MEHERPUR SADAR', 'মেহেরপুর                ', 'খুলনা                                   ', 1),
(205, '39', '32', '52', 6, '55', 'কালিগঞ্জ', 'KALIGANJ', 'লালমনিরহাট              ', 'রংপূর', 1),
(206, '55', '32', '52', 6, '55', 'লালমনিরহাট সদর', 'LALMONIRHAT SADAR', 'লালমনিরহাট              ', 'রংপূর', 1),
(207, '70', '32', '52', 6, '55', 'পাটগ্রাম', 'PATGRAM', 'লালমনিরহাট              ', 'রংপূর', 1),
(208, '33', '32', '52', 6, '55', 'হাতীবান্ধা', 'HATIBANDHA', 'লালমনিরহাট              ', 'রংপূর', 1),
(209, '02', '32', '52', 6, '55', 'আদিতমারী', 'ADITMARI', 'লালমনিরহাট              ', 'রংপূর', 1),
(210, '24', '17', '32', 6, '55', 'গাইবান্ধা সদর', 'GAIBANDHA SADAR', 'গাইবান্ধা                               ', 'রংপূর', 1),
(211, '82', '17', '32', 6, '55', 'সাদুল্লাপুর', 'SADULLAPUR', 'গাইবান্ধা                               ', 'রংপূর', 1),
(212, '91', '17', '32', 6, '55', 'সুন্দরগঞ্জ', 'SUNDARGANJ', 'গাইবান্ধা                               ', 'রংপূর', 1),
(213, NULL, '17', '32', 6, '55', 'গোবিন্দপুর', NULL, 'গাইবান্ধা                               ', 'রংপূর', 1),
(214, '88', '17', '32', 6, '55', 'সাঘাটা', 'SAGHATA', 'গাইবান্ধা                               ', 'রংপূর', 1),
(215, '30', '17', '32', 6, '55', 'গোবিন্দগঞ্জ', 'GOBINDAGANJ', 'গাইবান্ধা                               ', 'রংপূর', 1),
(216, '67', '17', '32', 6, '55', 'পলাশবাড়ী', 'PALASHBARI', 'গাইবান্ধা                               ', 'রংপূর', 1),
(217, '21', '17', '32', 6, '55', 'ফুলছড়ি', 'FULCHHARI', 'গাইবান্ধা                               ', 'রংপূর', 1),
(218, '49', '56', '85', 6, '55', 'রংপুর সদর', 'RANGPUR SADAR', 'রংপুর                                   ', 'রংপূর', 1),
(219, '27', '56', '85', 6, '55', 'গঙ্গাচড়া', 'GANGACHARA', 'রংপুর                                   ', 'রংপূর', 1),
(220, '42', '56', '85', 6, '55', 'কাউনিয়া', 'KAUNIA', 'রংপুর                                   ', 'রংপূর', 1),
(221, '73', '56', '85', 6, '55', 'পীরগাছা', 'PIRGACHHA', 'রংপুর                                   ', 'রংপূর', 1),
(222, '58', '56', '85', 6, '55', 'মিঠাপুকুর', 'MITHA PUKUR', 'রংপুর                                   ', 'রংপূর', 1),
(223, '92', '56', '85', 6, '55', 'তারাগঞ্জ', 'TARAGANJ', 'রংপুর                                   ', 'রংপূর', 1),
(224, '76', '56', '85', 6, '55', 'পীরগঞ্জ', 'PIRGANJ', 'রংপুর                                   ', 'রংপূর', 1),
(225, '03', '56', '85', 6, '55', 'বদরগঞ্জ', 'BADARGANJ', 'রংপুর                                   ', 'রংপূর', 1),
(226, '47', '21', '38', 5, '50', 'জয়পুরহাট সদর', 'JOYPURHAT SADAR', 'জয়পুরহাট                                ', 'রাজশাহী                                 ', 1),
(227, '74', '21', '38', 5, '50', 'পাঁচবিবি', 'PANCHBIBI', 'জয়পুরহাট                                ', 'রাজশাহী                                 ', 1),
(228, '13', '21', '38', 5, '50', 'আক্কেলপুর', 'AKKELPUR', 'জয়পুরহাট                                ', 'রাজশাহী                                 ', 1),
(229, '58', '21', '38', 5, '50', 'কালাই', 'KALAI', 'জয়পুরহাট                                ', 'রাজশাহী                                 ', 1),
(230, '61', '21', '38', 5, '50', 'ক্ষেতলাল', 'KHETLAL', 'জয়পুরহাট                                ', 'রাজশাহী                                 ', 1),
(231, '94', '29', '49', 6, '55', 'উলিপুর', 'ULIPUR', 'কুড়িগ্রাম                               ', 'রংপূর', 1),
(232, '52', '29', '49', 6, '55', 'কুড়িগ্রাম সদর', 'KURIGRAM SADAR', 'কুড়িগ্রাম                               ', 'রংপূর', 1),
(233, '61', '29', '49', 6, '55', 'নাগেশ্বরী', 'NAGESHWARI', 'কুড়িগ্রাম                               ', 'রংপূর', 1),
(234, '18', '29', '49', 6, '55', 'ফুলবাড়ী', 'PHULBARI', 'কুড়িগ্রাম                               ', 'রংপূর', 1),
(235, '77', '29', '49', 6, '55', 'রাজারহাট', 'RAJARHAT', 'কুড়িগ্রাম                               ', 'রংপূর', 1),
(236, '09', '29', '49', 6, '55', 'চিলমারী', 'CHILMARI', 'কুড়িগ্রাম                               ', 'রংপূর', 1),
(237, '06', '29', '49', 6, '55', 'ভূরুঙ্গামারী', 'BHURUNGAMARI', 'কুড়িগ্রাম                               ', 'রংপূর', 1),
(238, '79', '29', '49', 6, '55', 'রৌমারী', 'RAUMARI', 'কুড়িগ্রাম                               ', 'রংপূর', 1),
(239, '08', '29', '49', 6, '55', 'রাজিবপুর', 'CHAR RAJIBPUR', 'কুড়িগ্রাম                               ', 'রংপূর', 1),
(240, '20', '6', '10', 5, '50', 'বগুড়া সদর', 'BOGRA SADAR', 'বগুড়া                                   ', 'রাজশাহী                                 ', 1),
(241, '95', '6', '10', 5, '50', 'সোনাতলা', 'SONATOLA', 'বগুড়া                                   ', 'রাজশাহী                                 ', 1),
(242, '40', '6', '10', 5, '50', 'গাবতলী', 'GABTALI', 'বগুড়া                                   ', 'রাজশাহী                                 ', 1),
(243, '94', '6', '10', 5, '50', 'শিবগঞ্জ', 'SHIBGANJ', 'বগুড়া                                   ', 'রাজশাহী                                 ', 1),
(244, '06', '6', '10', 5, '50', 'আদমদীঘি', 'ADAMDIGHI', 'বগুড়া                                   ', 'রাজশাহী                                 ', 1),
(245, '67', '6', '10', 5, '50', 'নন্দীগ্রাম', 'NANDIGRAM', 'বগুড়া                                   ', 'রাজশাহী                                 ', 1),
(246, '81', '6', '10', 5, '50', 'সারিয়াকান্দি', 'SARIAKANDI', 'বগুড়া                                   ', 'রাজশাহী                                 ', 1),
(247, '88', '6', '10', 5, '50', 'শেরপুর', 'SHERPUR', 'বগুড়া                                   ', 'রাজশাহী                                 ', 1),
(248, '27', '6', '10', 5, '50', 'ধুনট', 'DHUNAT', 'বগুড়া                                   ', 'রাজশাহী                                 ', 1),
(249, '54', '6', '10', 5, '50', 'কাহালু', 'KAHALOO', 'বগুড়া                                   ', 'রাজশাহী                                 ', 1),
(250, '33', '6', '10', 5, '50', 'দুপচাঁচিয়া', 'DHUPCHANCHIA', 'বগুড়া                                   ', 'রাজশাহী                                 ', 1),
(251, '64', '14', '27', 6, '55', 'দিনাজপুর সদর	', 'DINAJPUR SADAR', 'দিনাজপুর                                ', 'রংপূর', 1),
(253, '17', '14', '27', 6, '55', 'বিরল', 'BIRAL', 'দিনাজপুর                                ', 'রংপূর', 1),
(255, '10', '14', '27', 6, '55', 'বিরামপুর', 'BIRAMPUR', 'দিনাজপুর                                ', 'রংপূর', 1),
(256, '21', '14', '27', 6, '55', 'বোচাগঞ্জ', 'BOCHAGANJ', 'দিনাজপুর                                ', 'রংপূর', 1),
(257, '30', '14', '27', 6, '55', 'চিরিরবন্দর', 'CHIRIRBANDAR', 'দিনাজপুর                                ', 'রংপূর', 1),
(258, '38', '14', '27', 6, '55', 'ফুলবাড়ী', 'FULBARI', 'দিনাজপুর                                ', 'রংপূর', 1),
(259, '43', '14', '27', 6, '55', 'ঘোড়াঘাট', 'GHORAGHAT', 'দিনাজপুর                                ', 'রংপূর', 1),
(260, '47', '14', '27', 6, '55', 'হাকিমপুর', 'HAKIMPUR', 'দিনাজপুর                                ', 'রংপূর', 1),
(261, '56', '14', '27', 6, '55', 'কাহারোল', 'KAHAROLE', 'দিনাজপুর                                ', 'রংপূর', 1),
(262, '60', '14', '27', 6, '55', 'খানসামা', 'KHANSAMA', 'দিনাজপুর                                ', 'রংপূর', 1),
(263, '69', '14', '27', 6, '55', 'নবাবগঞ্জ', 'NAWABGANJ', 'দিনাজপুর                                ', 'রংপূর', 1),
(264, '12', '14', '27', 6, '55', 'বীরগঞ্জ', 'BIRGANJ', 'দিনাজপুর                                ', 'রংপূর', 1),
(265, '77', '14', '27', 6, '55', 'পার্বতীপুর', 'PARBATIPUR', 'দিনাজপুর                                ', 'রংপূর', 1),
(266, '73', '50', '77', 6, '55', 'পঞ্চগড় সদর', 'PANCHAGARH SADAR', 'পঞ্চগড়                                  ', 'রংপূর', 1),
(267, '34', '50', '77', 6, '55', 'দেবীগঞ্জ', 'DEBIGANJ', 'পঞ্চগড়                                  ', 'রংপূর', 1),
(268, '25', '50', '77', 6, '55', 'বোদা', 'BODA', 'পঞ্চগড়                                  ', 'রংপূর', 1),
(269, '90', '50', '77', 6, '55', 'তেতুলিয়া', 'TENTULIA', 'পঞ্চগড়                                  ', 'রংপূর', 1),
(270, '04', '50', '77', 6, '55', 'আটোয়ারী', 'ATWARI', 'পঞ্চগড়                                  ', 'রংপূর', 1),
(271, '15', '47', '73', 6, '55', 'ডোমার', 'DOMAR UPAZILA', 'নীলফামারী                               ', 'রংপূর', 1),
(272, '36', '47', '73', 6, '55', 'জলঢাকা', 'JALDHAKA UPAZILA', 'নীলফামারী                               ', 'রংপূর', 1),
(273, '45', '47', '73', 6, '55', 'কিশোরগঞ্জ', 'KISHOREGANJ UPAZILA', 'নীলফামারী                               ', 'রংপূর', 1),
(274, '85', '47', '73', 6, '55', 'সৈয়দপুর সদর', 'SAIDPUR UPAZILA', 'নীলফামারী                               ', 'রংপূর', 1),
(275, '64', '47', '73', 6, '55', 'নীলফামারী সদর', 'NILPHAMARI SADAR UPAZ', 'নীলফামারী                               ', 'রংপূর', 1),
(276, '12', '47', '73', 6, '55', 'ডিমলা', 'DIMLA UPAZILA', 'নীলফামারী                               ', 'রংপূর', 1),
(277, '78', '59', '88', 5, '50', 'সিরাজগঞ্জ সদর', 'SIRAJGANJ SADAR', 'সিরাজগঞ্জ                               ', 'রাজশাহী                                 ', 1),
(278, '50', '59', '88', 5, '50', 'কাজীপুর', 'KAZIPUR', 'সিরাজগঞ্জ                               ', 'রাজশাহী                                 ', 1),
(279, '67', '59', '88', 5, '50', 'শাহজাদপুর', 'SHAHJADPUR', 'সিরাজগঞ্জ                               ', 'রাজশাহী                                 ', 1),
(280, '11', '59', '88', 5, '50', 'বেলকুচি', 'BELKUCHI', 'সিরাজগঞ্জ                               ', 'রাজশাহী                                 ', 1),
(281, '94', '59', '88', 5, '50', 'উল্লাপাড়া', 'ULLAH PARA', 'সিরাজগঞ্জ                               ', 'রাজশাহী                                 ', 1),
(282, '61', '59', '88', 5, '50', 'রায়গঞ্জ', 'ROYGANJ', 'সিরাজগঞ্জ                               ', 'রাজশাহী                                 ', 1),
(283, '44', '59', '88', 5, '50', 'কামারখন্দ', 'KAMARKHANDA', 'সিরাজগঞ্জ                               ', 'রাজশাহী                                 ', 1),
(284, '27', '59', '88', 5, '50', 'চৌহালী', 'CHAUHALI', 'সিরাজগঞ্জ                               ', 'রাজশাহী                                 ', 1),
(285, '89', '59', '88', 5, '50', 'তারাশ', 'TARASH', 'সিরাজগঞ্জ                               ', 'রাজশাহী                                 ', 1),
(286, '55', '49', '76', 5, '50', 'পাবনা সদর', 'PABNA SADAR', 'পাবনা                                   ', 'রাজশাহী                                 ', 1),
(287, '22', '49', '76', 5, '50', 'চাট মোহর', 'CHATMOHAR', 'পাবনা                                   ', 'রাজশাহী                                 ', 1),
(288, '05', '49', '76', 5, '50', 'আটঘরিয়া', 'ATGHARIA', 'পাবনা                                   ', 'রাজশাহী                                 ', 1),
(289, '83', '49', '76', 5, '50', 'সুজানগর', 'SUJANAGAR', 'পাবনা                                   ', 'রাজশাহী                                 ', 1),
(290, '72', '49', '76', 5, '50', 'সাথিয়া', 'SANTHIA', 'পাবনা                                   ', 'রাজশাহী                                 ', 1),
(291, '39', '49', '76', 5, '50', 'ঈশ্বরদী', 'ISHWARDI', 'পাবনা                                   ', 'রাজশাহী                                 ', 1),
(292, '33', '49', '76', 5, '50', 'ফরিদপুর', 'FARIDPUR', 'পাবনা                                   ', 'রাজশাহী                                 ', 1),
(293, '16', '49', '76', 5, '50', 'বেড়া', 'BERA', 'পাবনা                                   ', 'রাজশাহী                                 ', 1),
(294, '19', '49', '76', 5, '50', 'ভাঙ্গুরা', 'BHANGURA', 'পাবনা                                   ', 'রাজশাহী                                 ', 1),
(295, '94', '64', '94', 6, '55', 'ঠাকুরগাঁও সদর', 'THAKURGAON SADAR', 'ঠাকুরগাঁও               ', 'রংপূর', 1),
(296, '86', '64', '94', 6, '55', 'রানীসংকৈল', 'RANISANKAIL', 'ঠাকুরগাঁও               ', 'রংপূর', 1),
(297, '82', '64', '94', 6, '55', 'পীরগঞ্জ', 'PIRGANJ', 'ঠাকুরগাঁও               ', 'রংপূর', 1),
(298, '51', '64', '94', 6, '55', 'হরিপুর', 'HARIPUR', 'ঠাকুরগাঁও               ', 'রংপূর', 1),
(299, '08', '64', '94', 6, '55', 'বালিয়াডাঙ্গী', 'BALIADANGI', 'ঠাকুরগাঁও               ', 'রংপূর', 1),
(300, '03', '40', '64', 5, '50', 'আত্রাই', 'ATRAI', 'নওগাঁ                   ', 'রাজশাহী                                 ', 1),
(301, '86', '40', '64', 5, '50', 'সাপাহার', 'SAPAHAR', 'নওগাঁ                   ', 'রাজশাহী                                 ', 1),
(302, '06', '40', '64', 5, '50', 'বদলগাছী', 'BADALGACHHI', 'নওগাঁ                   ', 'রাজশাহী                                 ', 1),
(303, '28', '40', '64', 5, '50', 'ধামইরহাট', 'DHAMOIRHAT', 'নওগাঁ                   ', 'রাজশাহী                                 ', 1),
(304, '47', '40', '64', 5, '50', 'মান্দা', 'MANDA', 'নওগাঁ                   ', 'রাজশাহী                                 ', 1),
(305, '50', '40', '64', 5, '50', 'মহাদেবপুর', 'MAHADEBPUR', 'নওগাঁ                   ', 'রাজশাহী                                 ', 1),
(306, '60', '40', '64', 5, '50', 'নওগাঁ সদর', 'NAOGAON SADAR', 'নওগাঁ                   ', 'রাজশাহী                                 ', 1),
(307, '69', '40', '64', 5, '50', 'নিয়ামতপুর', 'NIAMATPUR', 'নওগাঁ                   ', 'রাজশাহী                                 ', 1),
(308, '75', '40', '64', 5, '50', 'পত্নীতলা', 'PATNITALA', 'নওগাঁ                   ', 'রাজশাহী                                 ', 1),
(309, '85', '40', '64', 5, '50', 'রানীনগর', 'RANINAGAR', 'নওগাঁ                   ', 'রাজশাহী                                 ', 1),
(310, '79', '40', '64', 5, '50', 'পোরশা', 'PORSHA', 'নওগাঁ                   ', 'রাজশাহী                                 ', 1),
(311, '09', '44', '69', 5, '50', 'বাগাতিপাড়া', 'BAGATIPARA', 'নাটোর                  ', 'রাজশাহী                                 ', 1),
(312, '41', '44', '69', 5, '50', 'গুরুদাসপুর', 'GURUDASPUR', 'নাটোর                  ', 'রাজশাহী                                 ', 1),
(313, '15', '44', '69', 5, '50', 'বড়াইগ্রাম', 'BARAIGRAM', 'নাটোর                  ', 'রাজশাহী                                 ', 1),
(314, '63', '44', '69', 5, '50', 'নাটোর সদর', 'NATORE SADAR', 'নাটোর                  ', 'রাজশাহী                                 ', 1),
(315, '91', '44', '69', 5, '50', 'সিংড়া', 'SINGRA', 'নাটোর                  ', 'রাজশাহী                                 ', 1),
(316, '44', '44', '69', 5, '50', 'লালপুর', 'LALPUR', 'নাটোর                  ', 'রাজশাহী                                 ', 1),
(317, '72', '53', '81', 5, '50', 'পবা', 'PABA', 'রাজশাহী                 ', 'রাজশাহী                                 ', 1),
(318, '10', '53', '81', 5, '50', 'বাঘা', 'BAGHA', 'রাজশাহী                 ', 'রাজশাহী                                 ', 1),
(319, '12', '53', '81', 5, '50', 'বাগমারা', 'BAGHMARA', 'রাজশাহী                 ', 'রাজশাহী                                 ', 1),
(320, '22', '53', '81', 5, '50', 'বোয়ালিয়া', 'Boalia', 'রাজশাহী                 ', 'রাজশাহী                                 ', 1),
(321, '25', '53', '81', 5, '50', 'চারঘাট', 'CHARGHAT', 'রাজশাহী                 ', 'রাজশাহী                                 ', 1),
(322, '34', '53', '81', 5, '50', 'গোদাগাড়ী', 'GODAGARI', 'রাজশাহী                 ', 'রাজশাহী                                 ', 1),
(323, '53', '53', '81', 5, '50', 'মোহনপুর', 'MOHANPUR', 'রাজশাহী                 ', 'রাজশাহী                                 ', 1),
(324, '82', '53', '81', 5, '50', 'পুঠিয়া', 'PUTHIA', 'রাজশাহী                 ', 'রাজশাহী                                 ', 1),
(325, '94', '53', '81', 5, '50', 'তানোর', 'TANORE', 'রাজশাহী                 ', 'রাজশাহী                                 ', 1),
(326, '31', '53', '81', 5, '50', 'দূর্গাপুর', 'DURGAPUR', 'রাজশাহী                 ', 'রাজশাহী                                 ', 1),
(327, '66', '45', '70', 5, '50', 'চাঁপাইনবাবগঞ্জ সদর', 'CHAPAI NABABGANJ SADAR', 'চাপাইনবাবগঞ্জ             ', 'রাজশাহী                                 ', 1),
(328, '88', '45', '70', 5, '50', 'শিবগঞ্জ', 'SHIBGANJ', 'চাপাইনবাবগঞ্জ             ', 'রাজশাহী                                 ', 1),
(329, '56', '45', '70', 5, '50', 'নাচোল', 'NACHOLE', 'চাপাইনবাবগঞ্জ             ', 'রাজশাহী                                 ', 1),
(330, '37', '45', '70', 5, '50', 'গোমস্তাপুর', 'GOMASTAPUR', 'চাপাইনবাবগঞ্জ             ', 'রাজশাহী                                 ', 1),
(331, '18', '45', '70', 5, '50', 'ভোলাহাট', 'BHOLAHAT', 'চাপাইনবাবগঞ্জ             ', 'রাজশাহী                                 ', 1),
(332, '87', '11', '19', 2, '20', 'নাঙ্গলকোট', 'NANGALKOT', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(333, '18', '11', '19', 2, '20', 'বুড়িচং', 'BURICHANG', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(334, '40', '11', '19', 2, '20', 'দেবিদ্বার', 'DEBIDWAR', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(335, '81', '11', '19', 2, '20', 'মুরাদনগর', 'MURADNAGAR', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(336, '72', '11', '19', 2, '20', 'লাকসাম', 'LAKSAM', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(337, '27', '11', '19', 2, '20', 'চান্দিনা', 'CHANDINA', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(338, '15', '11', '19', 2, '20', 'ব্রাহ্মনপাড়া', 'BRAHMAN PARA', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(339, '67', '11', '19', 2, '20', 'কুমিল্লা আদর্শ সদর', 'Comilla Adarsha Sadar', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(340, '09', '11', '19', 2, '20', 'বরুড়া', 'BARURA', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(341, '36', '11', '19', 2, '20', 'দাউদকান্দি', 'DAUDKANDI', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(342, '54', '11', '19', 2, '20', 'হোমনা', 'HOMNA', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(343, '31', '11', '19', 2, '20', 'চৌদ্দগ্রাম', 'CHAUDDAGRAM', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(344, '94', '7', '12', 2, '20', 'সরাইল', 'SARAIL', 'ব্রাহ্মণবাড়িয়া', 'চট্টগ্রাম                               ', 1),
(345, '90', '7', '12', 2, '20', 'নাছিরনগর', 'NASIRNAGAR', 'ব্রাহ্মণবাড়িয়া', 'চট্টগ্রাম                               ', 1),
(346, '04', '7', '12', 2, '20', 'বাঞ্ছারামপুর', 'BANCHHARAMPUR', 'ব্রাহ্মণবাড়িয়া', 'চট্টগ্রাম                               ', 1),
(347, '85', '7', '12', 2, '20', 'নবীনগর', 'NABINAGAR', 'ব্রাহ্মণবাড়িয়া', 'চট্টগ্রাম                               ', 1),
(348, '13', '7', '12', 2, '20', 'ব্রাহ্মণবাড়িয়া সদর', 'BRAHMANBARIA SADAR', 'ব্রাহ্মণবাড়িয়া', 'চট্টগ্রাম                               ', 1),
(349, '63', '7', '12', 2, '20', 'কসবা', 'KASBA', 'ব্রাহ্মণবাড়িয়া', 'চট্টগ্রাম                               ', 1),
(350, '02', '7', '12', 2, '20', 'আখাউড়া', 'AKHAURA', 'ব্রাহ্মণবাড়িয়া', 'চট্টগ্রাম                               ', 1),
(351, '95', '8', '13', 2, '20', 'শাহরাস্তি', 'SHAHRASTI', 'চাঁদপুর                                 ', 'চট্টগ্রাম                               ', 1),
(352, '58', '8', '13', 2, '20', 'কচুয়া', 'KACHUA', 'চাঁদপুর                                 ', 'চট্টগ্রাম                               ', 1),
(353, '45', '8', '13', 2, '20', 'ফরিদগঞ্জ', 'FARIDGANJ', 'চাঁদপুর                                 ', 'চট্টগ্রাম                               ', 1),
(354, '79', '8', '13', 2, '20', 'মতলব উত্তর', 'MATLAB UTTOR', 'চাঁদপুর                                 ', 'চট্টগ্রাম                               ', 1),
(355, '47', '8', '13', 2, '20', 'হাইমচর', 'HAIM CHAR', 'চাঁদপুর                                 ', 'চট্টগ্রাম                               ', 1),
(356, '49', '8', '13', 2, '20', 'হাজীগঞ্জ', 'HAJIGANJ', 'চাঁদপুর                                 ', 'চট্টগ্রাম                               ', 1),
(357, '22', '8', '13', 2, '20', 'চাঁদপুর সদর', 'CHANDPUR SADAR', 'চাঁদপুর                                 ', 'চট্টগ্রাম                               ', 1),
(358, '29', '16', '30', 2, '20', 'ফেনী সদর', 'FENI SADAR', 'ফেণী                                    ', 'চট্টগ্রাম                               ', 1),
(359, '14', '16', '30', 2, '20', 'ছাগলনাইয়া', 'CHHAGALNAIYA', 'ফেণী                                    ', 'চট্টগ্রাম                               ', 1),
(360, '94', '16', '30', 2, '20', 'সোনাগাজী', 'SONAGAZI', 'ফেণী                                    ', 'চট্টগ্রাম                               ', 1),
(361, '25', '16', '30', 2, '20', 'দাগনভূঞা', 'DAGANBHUIYAN', 'ফেণী                                    ', 'চট্টগ্রাম                               ', 1),
(362, '41', '16', '30', 2, '20', 'ফুলগাজী', 'FULGAZI', 'ফেণী                                    ', 'চট্টগ্রাম                               ', 1),
(363, '51', '16', '30', 2, '20', 'পরশুরাম', 'PARSHURAM', 'ফেণী                                    ', 'চট্টগ্রাম                               ', 1),
(364, '43', '31', '51', 2, '20', 'লক্ষীপুর (সদর)', 'LAKSHMIPUR SADAR', 'লক্ষীপুর                                ', 'চট্টগ্রাম                               ', 1),
(365, '73', '31', '51', 2, '20', 'রামগতি', 'RAMGATI', 'লক্ষীপুর                                ', 'চট্টগ্রাম                               ', 1),
(366, '58', '31', '51', 2, '20', 'রায়পুর', 'ROYPUR', 'লক্ষীপুর                                ', 'চট্টগ্রাম                               ', 1),
(367, '65', '31', '51', 2, '20', 'রামগঞ্জ', 'RAMGANJ', 'লক্ষীপুর                                ', 'চট্টগ্রাম                               ', 1),
(368, '10', '48', '75', 2, '20', 'চাটখিল', 'CHATKHIL', 'নোয়াখালী                               ', 'চট্টগ্রাম                               ', 1),
(371, '80', '48', '75', 2, '20', 'সেনবাগ', 'SENBAGH', 'নোয়াখালী                               ', 'চট্টগ্রাম                               ', 1),
(372, '07', '48', '75', 2, '20', 'বেগমগঞ্জ', 'BEGUMGANJ', 'নোয়াখালী                               ', 'চট্টগ্রাম                               ', 1),
(373, '36', '48', '75', 2, '20', 'হাতিয়া', 'HATIYA', 'নোয়াখালী                               ', 'চট্টগ্রাম                               ', 1),
(374, '21', '48', '75', 2, '20', 'কোম্পানীগঞ্জ', 'COMPANIGANJ', 'নোয়াখালী                               ', 'চট্টগ্রাম                               ', 1),
(376, '87', '48', '75', 2, '20', 'নোয়াখালী সদর', 'NOAKHALI SADAR', 'নোয়াখালী                               ', 'চট্টগ্রাম                               ', 1),
(377, '49', '12', '22', 2, '20', 'মহেশখালী', 'MAHESHKHALI', 'কক্সবাজার                               ', 'চট্টগ্রাম                               ', 1),
(378, '16', '12', '22', 2, '20', 'চকরিয়া', 'CHAKARIA', 'কক্সবাজার                               ', 'চট্টগ্রাম                               ', 1),
(379, '45', '12', '22', 2, '20', 'কুতুবদিয়া', 'KUTUBDIA', 'কক্সবাজার                               ', 'চট্টগ্রাম                               ', 1),
(380, '66', '12', '22', 2, '20', 'রামু', 'RAMU', 'কক্সবাজার                               ', 'চট্টগ্রাম                               ', 1),
(381, '94', '12', '22', 2, '20', 'উখিয়া', 'UKHIA UPAZILA', 'কক্সবাজার                               ', 'চট্টগ্রাম                               ', 1);
INSERT INTO `upazilas` (`id`, `upazila_bbs_code`, `district_id`, `district_bbs_code`, `division_id`, `division_bbs_code`, `name_bd`, `name_en`, `district_name`, `division_name`, `status`) VALUES
(382, '90', '12', '22', 2, '20', 'টেকনাফ', 'TEKNAF', 'কক্সবাজার                               ', 'চট্টগ্রাম                               ', 1),
(383, '24', '12', '22', 2, '20', 'কক্সবাজার সদর', 'COX\'S BAZAR SADAR', 'কক্সবাজার                               ', 'চট্টগ্রাম                               ', 1),
(384, '95', '2', '03', 2, '20', 'থানচি', 'THANCHI', 'বান্দরবন                 ', 'চট্টগ্রাম                               ', 1),
(385, '91', '2', '03', 2, '20', 'রুমা', 'RUMA', 'বান্দরবন                 ', 'চট্টগ্রাম                               ', 1),
(386, '89', '2', '03', 2, '20', 'রোয়াংছড়ি', 'ROWANGCHHARI', 'বান্দরবন                 ', 'চট্টগ্রাম                               ', 1),
(387, '73', '2', '03', 2, '20', 'নাইক্ষংছড়ি', 'NAIKHONGCHHARI', 'বান্দরবন                 ', 'চট্টগ্রাম                               ', 1),
(388, '51', '2', '03', 2, '20', 'লামা', 'LAMA', 'বান্দরবন                 ', 'চট্টগ্রাম                               ', 1),
(389, '14', '2', '03', 2, '20', 'বান্দরবন সদর', 'BANDARBAN SADAR', 'বান্দরবন                 ', 'চট্টগ্রাম                               ', 1),
(390, '04', '2', '03', 2, '20', 'আলীকদম', 'ALIKADAM', 'বান্দরবন                 ', 'চট্টগ্রাম                               ', 1),
(391, '61', '9', '15', 2, '20', 'পটিয়া', 'PATIYA', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(392, '53', '9', '15', 2, '20', 'মিরসরাই', 'MIRSHARAI', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(393, '70', '9', '15', 2, '20', 'রাঙ্গুনিয়া', 'RANGUNIA', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(394, '74', '9', '15', 2, '20', 'রাউজান', 'RAOZAN', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(395, '78', '9', '15', 2, '20', 'সন্দ্বীপ', 'SANDWIP', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(396, '82', '9', '15', 2, '20', 'সাতকানিয়া', 'SATKANIA', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(397, '33', '9', '15', 2, '20', 'ফটিকছড়ি', 'FATIKCHHARI', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(398, '86', '9', '15', 2, '20', 'সীতাকুন্ড', 'SITAKUNDA', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(400, '37', '9', '15', 2, '20', 'হাটহাজারী', 'HATHAZARI', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(401, '47', '9', '15', 2, '20', 'লোহাগড়া', 'LOHAGARA', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(406, '18', '9', '15', 2, '20', 'চন্দনাইশ', 'CHANDANAISH', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(407, '12', '9', '15', 2, '20', 'বোয়ালখালী', 'BOALKHALI', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(408, '08', '9', '15', 2, '20', 'বাঁশখালী', 'BANSHKHALI', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(409, '04', '9', '15', 2, '20', 'আনোয়ারা', 'ANOWARA', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(410, '80', '9', '15', 2, '20', 'চান্দগাঁও', 'Chandgoan', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(411, '43', '26', '46', 2, '20', 'দিঘীনালা', 'DIGHINALA', 'খাগড়াছড়ি                ', 'চট্টগ্রাম                               ', 1),
(412, '49', '26', '46', 2, '20', 'খাগড়াছড়ি সদর', 'KHAGRACHHARI SADAR', 'খাগড়াছড়ি                ', 'চট্টগ্রাম                               ', 1),
(413, '61', '26', '46', 2, '20', 'লক্ষিছড়ি', 'LAKSHMICHHARI', 'খাগড়াছড়ি                ', 'চট্টগ্রাম                               ', 1),
(414, '65', '26', '46', 2, '20', 'মহালছড়ি', 'MAHALCHHARI', 'খাগড়াছড়ি                ', 'চট্টগ্রাম                               ', 1),
(415, '67', '26', '46', 2, '20', 'মানিকছড়ি', 'MANIKCHHARI', 'খাগড়াছড়ি                ', 'চট্টগ্রাম                               ', 1),
(416, '70', '26', '46', 2, '20', 'মাটিরাঙ্গা', 'MATIRANGA', 'খাগড়াছড়ি                ', 'চট্টগ্রাম                               ', 1),
(417, '77', '26', '46', 2, '20', 'পানছড়ি', 'PANCHHARI', 'খাগড়াছড়ি                ', 'চট্টগ্রাম                               ', 1),
(418, '80', '26', '46', 2, '20', 'রামগড়', 'RAMGARH', 'খাগড়াছড়ি                ', 'চট্টগ্রাম                               ', 1),
(419, '07', '55', '84', 2, '20', 'বাঘাইছড়ি', 'BAGHAICHHARI', 'রাঙ্গামাটি                ', 'চট্টগ্রাম                               ', 1),
(420, '21', '55', '84', 2, '20', 'বরকল', 'BARKAL UPAZILA', 'রাঙ্গামাটি                ', 'চট্টগ্রাম                               ', 1),
(421, '25', '55', '84', 2, '20', 'কাউখালী', 'KAWKHALI (BETBUNIA)', 'রাঙ্গামাটি                ', 'চট্টগ্রাম                               ', 1),
(422, '29', '55', '84', 2, '20', 'বিলাইছড়ি', 'BELAI CHHARI  UPAZI', 'রাঙ্গামাটি                ', 'চট্টগ্রাম                               ', 1),
(423, '36', '55', '84', 2, '20', 'কাপ্তাই', 'KAPTAI  UPAZILA', 'রাঙ্গামাটি                ', 'চট্টগ্রাম                               ', 1),
(424, '47', '55', '84', 2, '20', 'জুরাইছড়ি', 'JURAI CHHARI UPAZIL', 'রাঙ্গামাটি                ', 'চট্টগ্রাম                               ', 1),
(425, '58', '55', '84', 2, '20', 'ল্যাংগাদু', 'LANGADU  UPAZILA', 'রাঙ্গামাটি                ', 'চট্টগ্রাম                               ', 1),
(426, '75', '55', '84', 2, '20', 'নানেরচর', 'NANIARCHAR  UPAZILA', 'রাঙ্গামাটি                ', 'চট্টগ্রাম                               ', 1),
(427, '78', '55', '84', 2, '20', 'রাজস্থালী', 'RAJASTHALI  UPAZILA', 'রাঙ্গামাটি                ', 'চট্টগ্রাম                               ', 1),
(428, '87', '55', '84', 2, '20', 'রাঙ্গামাটি সদর', 'RANGAMATI SADAR', 'রাঙ্গামাটি                ', 'চট্টগ্রাম                               ', 1),
(429, '08', '62', '91', 7, '60', 'বালাগঞ্জ', 'BALAGANJ', 'সিলেট                                   ', 'সিলেট                                   ', 1),
(430, '41', '62', '91', 7, '60', 'গোয়াইনঘাট', 'GOWAINGHAT', 'সিলেট                                   ', 'সিলেট                                   ', 1),
(431, '20', '62', '91', 7, '60', 'বিশ্বনাথ', 'BISHWANATH', 'সিলেট                                   ', 'সিলেট                                   ', 1),
(432, '59', '62', '91', 7, '60', 'কানাইঘাট', 'KANAIGHAT', 'সিলেট                                   ', 'সিলেট                                   ', 1),
(433, '53', '62', '91', 7, '60', 'জৈন্তাপুর', 'JAINTIAPUR', 'সিলেট                                   ', 'সিলেট                                   ', 1),
(434, '35', '62', '91', 7, '60', 'ফেঞ্চুগঞ্জ', 'FENCHUGANJ', 'সিলেট                                   ', 'সিলেট                                   ', 1),
(435, '17', '62', '91', 7, '60', 'বিয়ানীবাজার', 'BEANI BAZAR', 'সিলেট                                   ', 'সিলেট                                   ', 1),
(436, '27', '62', '91', 7, '60', 'কোম্পানীগঞ্জ', 'COMPANIGANJ', 'সিলেট                                   ', 'সিলেট                                   ', 1),
(437, '62', '62', '91', 7, '60', 'সিলেট সদর', 'SYLHET SADAR', 'সিলেট                                   ', 'সিলেট                                   ', 1),
(438, '68', '20', '36', 7, '60', 'লাখাই', 'LAKHAI', 'হবিগঞ্জ                                 ', 'সিলেট                                   ', 1),
(439, '44', '20', '36', 7, '60', 'হবিগঞ্জ সদর', 'HABIGANJ SADAR', 'হবিগঞ্জ                                 ', 'সিলেট                                   ', 1),
(440, '11', '20', '36', 7, '60', 'বানিয়াচং', 'BANIACHONG', 'হবিগঞ্জ                                 ', 'সিলেট                                   ', 1),
(441, '77', '20', '36', 7, '60', 'নবীগঞ্জ', 'NABIGANJ', 'হবিগঞ্জ                                 ', 'সিলেট                                   ', 1),
(442, '02', '20', '36', 7, '60', 'আজমিরীগঞ্জ', 'AJMIRIGANJ', 'হবিগঞ্জ                                 ', 'সিলেট                                   ', 1),
(443, '50', '61', '90', 7, '60', 'জামালগঞ্জ', 'JAMALGANJ', 'সুনামগঞ্জ                               ', 'সিলেট                                   ', 1),
(444, '23', '61', '90', 7, '60', 'ছাতক', 'CHHATAK', 'সুনামগঞ্জ                               ', 'সিলেট                                   ', 1),
(445, '92', '61', '90', 7, '60', 'তাহিরপুর', 'TAHIRPUR', 'সুনামগঞ্জ                               ', 'সিলেট                                   ', 1),
(446, '29', '61', '90', 7, '60', 'দিরাই', 'DERAI', 'সুনামগঞ্জ                               ', 'সিলেট                                   ', 1),
(447, '32', '61', '90', 7, '60', 'ধর্মপাশা', 'DHARAMPASHA', 'সুনামগঞ্জ                               ', 'সিলেট                                   ', 1),
(448, '47', '61', '90', 7, '60', 'জগন্নাথপুর', 'JAGANNATHPUR', 'সুনামগঞ্জ                               ', 'সিলেট                                   ', 1),
(449, '89', '61', '90', 7, '60', 'সুনামগঞ্জ সদর', 'SUNAMGANJ SADAR', 'সুনামগঞ্জ                               ', 'সিলেট                                   ', 1),
(450, NULL, '61', '90', 7, '60', 'মধ্যনগর', NULL, 'সুনামগঞ্জ                               ', 'সিলেট                                   ', 1),
(451, '80', '37', '58', 7, '60', 'রাজনগর', 'RAJNAGAR', 'মৌলভীবাজার                             ', 'সিলেট                                   ', 1),
(452, '83', '37', '58', 7, '60', 'শ্রীমঙ্গল', 'SREEMANGAL', 'মৌলভীবাজার                             ', 'সিলেট                                   ', 1),
(453, '14', '37', '58', 7, '60', 'বড়লেখা', 'BARLEKHA', 'মৌলভীবাজার                             ', 'সিলেট                                   ', 1),
(454, '74', '37', '58', 7, '60', 'মৌলভীবাজার সদর', 'MAULVIBAZAR SADAR', 'মৌলভীবাজার                             ', 'সিলেট                                   ', 1),
(455, '56', '37', '58', 7, '60', 'কমলগঞ্জ', 'KAMALGANJ', 'মৌলভীবাজার                             ', 'সিলেট                                   ', 1),
(456, '35', '37', '58', 7, '60', 'জুড়ি', 'JURI', 'মৌলভীবাজার                             ', 'সিলেট                                   ', 1),
(457, '87', '52', '79', 1, '10', 'নেছারাবাদ', 'NESARABAD (SWARUPKATI)', 'পিরোজপুর                               ', 'বরিশাল                                  ', 1),
(458, '80', '52', '79', 1, '10', 'পিরোজপুর সদর', 'PIROJPUR SADAR', 'পিরোজপুর                               ', 'বরিশাল                                  ', 1),
(459, '47', '52', '79', 1, '10', 'কাউখালী', 'KAWKHALI', 'পিরোজপুর                               ', 'বরিশাল                                  ', 1),
(460, '90', '52', '79', 1, '10', 'ইন্দুরকানী', 'INDURKANI', 'পিরোজপুর                               ', 'বরিশাল                                  ', 1),
(461, '14', '52', '79', 1, '10', 'ভান্ডারিয়া', 'BHANDARIA', 'পিরোজপুর                               ', 'বরিশাল                                  ', 1),
(462, '76', '52', '79', 1, '10', 'নাজিরপুর', 'NAZIRPUR UPAZILA', 'পিরোজপুর                               ', 'বরিশাল                                  ', 1),
(463, '58', '52', '79', 1, '10', 'মঠবাড়ীয়া', 'MATHBARIA', 'পিরোজপুর                               ', 'বরিশাল                                  ', 1),
(464, '62', '4', '06', 1, '10', 'মেহেন্দিগঞ্জ', 'MHENDIGANJ', 'বরিশাল                                  ', 'বরিশাল                                  ', 1),
(465, '03', '4', '06', 1, '10', 'বাবুগঞ্জ', 'BABUGANJ', 'বরিশাল                                  ', 'বরিশাল                                  ', 1),
(466, '32', '4', '06', 1, '10', 'গৌরনদী', 'GAURNADI', 'বরিশাল                                  ', 'বরিশাল                                  ', 1),
(467, '51', '4', '06', 1, '10', 'বরিশাল সদর', 'BARISAL SADAR (KOTWALI)', 'বরিশাল                                  ', 'বরিশাল                                  ', 1),
(468, '07', '4', '06', 1, '10', 'বাকেরগঞ্জ', 'BAKERGANJ', 'বরিশাল                                  ', 'বরিশাল                                  ', 1),
(469, '69', '4', '06', 1, '10', 'মুলাদী', 'MULADI', 'বরিশাল                                  ', 'বরিশাল                                  ', 1),
(470, '36', '4', '06', 1, '10', 'হিজলা', 'HIZLA', 'বরিশাল                                  ', 'বরিশাল                                  ', 1),
(471, '02', '4', '06', 1, '10', 'আগৈলঝারা', 'AGAILJHARA', 'বরিশাল                                  ', 'বরিশাল                                  ', 1),
(472, '10', '4', '06', 1, '10', 'বানারীপাড়া', 'BANARI PARA', 'বরিশাল                                  ', 'বরিশাল                                  ', 1),
(473, '94', '4', '06', 1, '10', 'উজিরপুর', 'WAZIRPUR', 'বরিশাল                                  ', 'বরিশাল                                  ', 1),
(474, '85', '3', '04', 1, '10', 'পাথরঘাটা', 'PATHARGHATA', 'বরগুনা                                  ', 'বরিশাল                                  ', 1),
(475, '28', '3', '04', 1, '10', 'বরগুনা সদর', 'BARGUNA SADAR', 'বরগুনা                                  ', 'বরিশাল                                  ', 1),
(476, '09', '3', '04', 1, '10', 'আমতলী', 'AMTALI', 'বরগুনা                                  ', 'বরিশাল                                  ', 1),
(477, '19', '3', '04', 1, '10', 'বামনা', 'BAMNA', 'বরগুনা                                  ', 'বরিশাল                                  ', 1),
(478, '47', '3', '04', 1, '10', 'বেতাগী', 'BETAGI', 'বরগুনা                                  ', 'বরিশাল                                  ', 1),
(479, '95', '51', '78', 1, '10', 'পটুয়াখালী সদর', 'PATUAKHALI SADAR', 'পটুয়াখালী                               ', 'বরিশাল                                  ', 1),
(480, '57', '51', '78', 1, '10', 'গলাচিপা', 'GALACHIPA', 'পটুয়াখালী                               ', 'বরিশাল                                  ', 1),
(481, '66', '51', '78', 1, '10', 'কলাপাড়া', 'KALA PARA', 'পটুয়াখালী                               ', 'বরিশাল                                  ', 1),
(482, '38', '51', '78', 1, '10', 'বাউফল', 'BAUPHAL', 'পটুয়াখালী                               ', 'বরিশাল                                  ', 1),
(483, '52', '51', '78', 1, '10', 'দশমিনা', 'DASHMINA', 'পটুয়াখালী                               ', 'বরিশাল                                  ', 1),
(484, '76', '51', '78', 1, '10', 'মির্জাগঞ্জ', 'MIRZAGANJ UPAZILA', 'পটুয়াখালী                               ', 'বরিশাল                                  ', 1),
(485, '55', '51', '78', 1, '10', 'দুমকী', 'DUMKI UPAZILA', 'পটুয়াখালী                               ', 'বরিশাল                                  ', 1),
(486, '18', '5', '09', 1, '10', 'ভোলা সদর', 'BHOLA SADAR', 'ভোলা                                   ', 'বরিশাল                                  ', 1),
(487, '21', '5', '09', 1, '10', 'বোরহানউদ্দিন', 'BURHANUDDIN', 'ভোলা                                   ', 'বরিশাল                                  ', 1),
(488, '25', '5', '09', 1, '10', 'চরফ্যাশন', 'CHAR FASSON', 'ভোলা                                   ', 'বরিশাল                                  ', 1),
(489, '54', '5', '09', 1, '10', 'লালমোহন', 'LALMOHAN', 'ভোলা                                   ', 'বরিশাল                                  ', 1),
(490, '29', '5', '09', 1, '10', 'দৌলতখান', 'DAULAT KHAN', 'ভোলা                                   ', 'বরিশাল                                  ', 1),
(491, '65', '5', '09', 1, '10', 'মনপুরা', 'MANPURA', 'ভোলা                                   ', 'বরিশাল                                  ', 1),
(492, '91', '5', '09', 1, '10', 'তজুমদ্দিন', 'TAZUMUDDIN', 'ভোলা                                   ', 'বরিশাল                                  ', 1),
(493, '84', '24', '42', 1, '10', 'রাজাপুর', 'RAJAPUR', 'ঝালকাঠী                                 ', 'বরিশাল                                  ', 1),
(494, '40', '24', '42', 1, '10', 'ঝালকাঠী সদর', 'JHALOKATI SADAR', 'ঝালকাঠী                                 ', 'বরিশাল                                  ', 1),
(495, '73', '24', '42', 1, '10', 'নলছিটি', 'NALCHITY', 'ঝালকাঠী                                 ', 'বরিশাল                                  ', 1),
(496, '43', '24', '42', 1, '10', 'কাঠালিয়া', 'KANTHALIA', 'ঝালকাঠী                                 ', 'বরিশাল                                  ', 1),
(497, '94', '62', '91', 7, '60', 'জকিগঞ্জ', 'Jokigonj', 'সিলেট                                   ', 'সিলেট                                   ', 1),
(498, '31', '62', '91', 7, '60', 'দক্ষিণ সুরমা', 'SOUTH SURMA', 'সিলেট                                   ', 'সিলেট                                   ', 1),
(499, '38', '62', '91', 7, '60', 'গোলাপগঞ্জ', 'GOLAPGANJ', 'সিলেট                                   ', 'সিলেট                                   ', 1),
(500, '86', '61', '90', 7, '60', 'শাল্লা', 'SULLA', 'সুনামগঞ্জ                               ', 'সিলেট                                   ', 1),
(502, '18', '61', '90', 7, '60', 'বিশ্বম্ভরপুর', 'Bishwambarpur', 'সুনামগঞ্জ                               ', 'সিলেট                                   ', 1),
(503, '27', '61', '90', 7, '60', 'দক্ষিণ সুনামগঞ্জ', 'DAKKHIN SUNAMGANJ', 'সুনামগঞ্জ                               ', 'সিলেট                                   ', 1),
(504, '26', '20', '36', 7, '60', 'চুনারুঘাট', 'Chunarughat', 'হবিগঞ্জ                                 ', 'সিলেট                                   ', 1),
(507, '65', '37', '58', 7, '60', 'কুলাউড়া', 'KULAURA', 'মৌলভীবাজার                             ', 'সিলেট                                   ', 1),
(512, '96', '13', '26', 3, '30', 'আশুলিয়া', 'Ashulia', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(513, '97', '13', '26', 3, '30', 'আমিন বাজার', 'Amin bazar    ', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(514, '98', '13', '26', 3, '30', 'কেরানীগঞ্জ দক্ষিণ', 'KERANIGANJ South', 'ঢাকা                                    ', 'ঢাকা                                    ', 1),
(515, '33', '7', '12', 2, '20', 'আশুগঞ্জ', 'ASHUGANJ', 'ব্রাহ্মণবাড়িয়া', 'চট্টগ্রাম                               ', 1),
(516, '99', '42', '67', 3, '30', 'সিদ্ধিরগঞ্জ', 'SHIDDHIRGANJ', 'নারায়নগঞ্জ                              ', 'ঢাকা                                    ', 1),
(517, '10', '42', '67', 3, '30', 'ফতুল্লা', 'FATULLAH', 'নারায়নগঞ্জ                              ', 'ঢাকা                                    ', 1),
(518, '55', '44', '69', 5, '50', 'নলডাঙ্গা', 'naldanga', 'নাটোর                  ', 'রাজশাহী                                 ', 1),
(519, '76', '8', '13', 2, '20', 'মতলব দক্ষিণ', 'MATLAB DAKSHIN ', 'চাঁদপুর                                 ', 'চট্টগ্রাম                               ', 1),
(520, '05', '20', '36', 7, '60', 'বাহুবল', 'Bahubal', 'হবিগঞ্জ                                 ', 'সিলেট                                   ', 1),
(521, '47', '54', '82', 3, '30', 'কালুখালী', 'Kalukhali', 'রাজবাড়ী                                 ', 'ঢাকা                                    ', 1),
(522, '94', '11', '19', 2, '20', 'তিতাস', 'Titash', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(523, '75', '11', '19', 2, '20', 'মেঘনা', 'Meghna', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(524, '33', '11', '19', 2, '20', 'কুমিল্লা সদর দক্ষিণ', 'Comilla Sadar Dakkhin', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(525, '25', '63', '93', 3, '30', 'ধনবাড়ী', 'Dhanbari', 'টাংগাইল                                 ', 'ঢাকা                                    ', 1),
(526, '90', '15', '29', 3, '30', 'সালথা', 'Saltha', 'ফরিদপুর                                 ', 'ঢাকা                                    ', 1),
(527, '85', '6', '10', 5, '50', 'শাজাহানপুর', 'Shajahanpur', 'বগুড়া                                   ', 'রাজশাহী                                 ', 1),
(528, '71', '20', '36', 7, '60', 'মাধবপুর', 'Madhabpur', 'হবিগঞ্জ                                 ', 'সিলেট                                   ', 1),
(529, '41', '9', '15', 2, '20', 'কাট্টলি', 'Kattoli', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(530, '65', '9', '15', 2, '20', 'পতেঙ্গা', 'Potenga', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(531, '10', '9', '15', 2, '20', 'বাকলিয়া', 'Baklia', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(532, '56', '12', '22', 2, '20', 'পেকুয়া', 'Pekua', 'কক্সবাজার                               ', 'চট্টগ্রাম                               ', 1),
(533, '74', '11', '19', 2, '20', 'মনোহরগঞ্জ', 'Monohorgonj', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(534, '91', '9', '15', 2, '20', 'আগ্রাবাদ সার্কেল', 'Agrabad Circle', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(535, '92', '9', '15', 2, '20', 'চট্টগ্রাম সদর সার্কেল', 'Chittagong Sadar Circle', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(536, '60', '62', '91', 7, '60', 'ওসমানীনগর', 'OSMANINAGAR', 'সিলেট                                   ', 'সিলেট                                   ', 1),
(537, '33', '31', '51', 2, '20', 'কমলনগর', 'KAMALNAGAR', 'লক্ষীপুর                                ', 'চট্টগ্রাম                               ', 1),
(538, '60', '36', '57', 4, '40', 'মুজিবনগর', 'MUJIBNAGAR', 'মেহেরপুর                ', 'খুলনা                                   ', 1),
(539, '07', '7', '12', 2, '20', 'বিজয়নগর', 'BIJOYNAGAR', 'ব্রাহ্মণবাড়িয়া', 'চট্টগ্রাম                               ', 1),
(540, '97', '51', '78', 1, '10', 'রাংগাবালী', 'RANGABALI', 'পটুয়াখালী                               ', 'বরিশাল                                  ', 1),
(541, '39', '9', '15', 2, '20', 'কর্ণফুলী', 'KARNAPHULI', 'চট্টগ্রাম                  ', 'চট্টগ্রাম                               ', 1),
(542, '47', '48', '75', 2, '20', 'কবিরহাট', 'KABIRHAT', 'নোয়াখালী                               ', 'চট্টগ্রাম                               ', 1),
(543, '85', '48', '75', 2, '20', 'সুবর্ণচর', 'SUBARNACHAR', 'নোয়াখালী                               ', 'চট্টগ্রাম                               ', 1),
(545, '33', '61', '90', 7, '60', 'দোয়ারাবাজার', 'Dowarabazar', 'সুনামগঞ্জ                               ', 'সিলেট                                   ', 1),
(546, '83', '48', '75', 2, '20', 'সোনাইমুড়ী', 'SONAIMURI', 'নোয়াখালী                               ', 'চট্টগ্রাম                               ', 1),
(547, '90', '3', '04', 1, '10', 'তালতলী', 'TALTALI', 'বরগুনা                                  ', 'বরিশাল                                  ', 1),
(548, '88', '39', '61', 8, '90', 'তারাকান্দা', 'TARAKANDA', 'ময়মনসিংহ                                ', 'ময়মনসিংহ                ', 1),
(549, '73', '11', '19', 2, '20', 'লালমাই', 'Lalmai', 'কুমিল্লা                                ', 'চট্টগ্রাম                               ', 1),
(550, '50', '62', '91', 7, '60', 'সিলেট মহানগর', 'Sylhet Mohanagar', 'সিলেট                                   ', 'সিলেট                                   ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_certificate_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `postal_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_pass_changed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscribe_id` int(11) DEFAULT NULL,
  `is_sr_user` tinyint(1) NOT NULL DEFAULT 1,
  `notification_email` tinyint(1) NOT NULL DEFAULT 1,
  `notification_sms` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `office_id`, `designation_id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `dob`, `present_address`, `permanent_address`, `nid_no`, `birth_certificate_no`, `country_id`, `division_id`, `district_id`, `upazila_id`, `level_id`, `postal_code`, `photo`, `mobile`, `email`, `signature`, `email_verified_at`, `remember_token`, `is_pass_changed`, `subscribe_id`, `is_sr_user`, `notification_email`, `notification_sms`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 8, 'superadmin', '$2y$10$ZaoIUJjdV2wP462q0wGD4eh1edhd5AZ0VE8Cq0.Av2p4BVhH0kheO', 'super', 'super', 'admin', '', 'house 36 road 6 kamarpara turag', 'done', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01712345678', 'superadmin@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '1', '1', 0, NULL, '2021-11-21 09:10:40'),
(2, 2, 1, 7, 'admin', '$2y$10$qtyMhsnybHJH6rYEiFjqo.oWHdtcsO19ALYzS/im15ItWbWxRwvY6', 'John', 'super', 'Doe', '', 'house 45 road 5 Banasree', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '01312345678', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(3, 3, 1, 7, 'directorgeneral', '$2y$10$u5XtJFzxMNQjQJ525KZWN.IwONK/IZ69Sc.y7DkfQmZkITC8BgiMO', 'Snow', 'super', 'white', '', 'house 45 road 5 Badda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'e_service_admin@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(4, 4, 1, 6, 'deputydirectorgeneral', '$2y$10$MSPVNCgM8PmTQiJX5HuYnOPhFJe.9GUHfWuu3Tr7mx3jvZSZHLPwe', 'Johnny', 'deep', 'depp', '', 'house 45 road 5 Uttara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'e_service_observer@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(5, 5, 1, 5, 'director', '$2y$10$Iw2NGI3dW7A2jLDVLyS1s.JFnDvCplcVolzXsvv0c13tPhdVzGaVm', 'Amber', 'Heard', 'Heard', '', 'house 45 road 5 Mirpur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'e_service_observer1@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(6, 6, 1, 4, 'seniorprogrammer', '$2y$10$JZAHINUGRbUc8Xllh1PnmeUsg5Nii0AXMyFzCxgK29HBpVXvCJ.SK', 'Amber', 'Heard', 'Heard', '', 'house 45 road 5 Mirpur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'e_service_operator@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(7, 7, 1, 3, 'assistantofficer', '$2y$10$gVVldPQzzogDu5ZO9MY3P.93NuKcKlYziFMV.qAauE5LTydGDUAj6', 'Helena', 'Bonham', 'Carter', '', 'house 45 road 5 Uttara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'e_service_operator1@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(8, 8, 1, 2, 'assistantofficerlocal', '$2y$10$GOwzsvFQBHbsm9shg7Ym7.H4X.WEEqPDHyj6Zt8mZCedFfvjoXAiC', 'Helena', 'Bonham', 'Carter', '', 'house 45 road 5 Uttara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'e_service_operator2@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(9, 9, 1, 1, 'statisticalofficerlocal', '$2y$10$dCsVZ9v0mkVQszSihKJjh.w1.MmgW8cOUg7PDopv6FUDqO5Qmcsge', 'Helena', 'Bonham', 'Carter', '', 'house 45 road 5 Uttara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'e_service_operator3@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(10, 10, NULL, NULL, 'user', '$2y$10$pa.G4dphnfvxhxYBWf9mA..pAZIVLpZI1ERp9Ksr5aWGygkH5TjiK', 'Helena', 'Bonham', 'Carter', '', 'house 45 road 5 Uttara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(14, 10, NULL, NULL, 'atiqurrahman', '$2y$10$WlEHQU2tfAzh.dPJ0mJF5uTDzGwU9hPSrkPth5udvF9pWjOIK1iqa', 'Atiq', 'Ur', 'Rahman', '1990-11-23', NULL, NULL, '1222323665444', NULL, 19, 3, 13, 51, NULL, '1230', 'photo2021_11_23_015000_23091054.png', NULL, 'atiqur.rahman@sebpo.com', NULL, '2021-11-23 07:50:00', NULL, NULL, 2, 1, 1, 1, NULL, NULL, 1, '2021-11-23 07:50:00', '2021-11-23 07:50:00'),
(15, 10, NULL, NULL, 'TauhidSEBPO', '$2y$10$YvJvY0/4jqXscNnmeBKI4e2SXhqLm9LuG6n74xRl9xvjx.TJoZuCa', 'Tauhid', 'Al', 'Hasan', '1994-01-07', NULL, NULL, '123456789', NULL, 19, 3, 13, 512, NULL, '1230', NULL, NULL, 'tauhid.hasan@sebpo.com', NULL, '2021-11-30 06:14:20', NULL, NULL, 3, 1, 1, 1, NULL, NULL, 1, '2021-11-30 06:14:20', '2021-11-30 06:14:20'),
(16, 11, 1, 3, 'md.sheikh', '$2y$10$pa.G4dphnfvxhxYBWf9mA..pAZIVLpZI1ERp9Ksr5aWGygkH5TjiK', 'Md.', 'Mojnu', 'Sheikh', NULL, 'Badda', 'Badda', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '01518642856', 'storekeeper@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, '2021-12-05 07:18:40', '2021-12-05 07:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ordering` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_group_roles`
--

CREATE TABLE `user_group_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `task_index` tinyint(1) DEFAULT NULL,
  `task_view` tinyint(1) DEFAULT NULL,
  `task_add` tinyint(1) DEFAULT NULL,
  `task_edit` tinyint(1) DEFAULT NULL,
  `task_delete` tinyint(1) DEFAULT NULL,
  `task_report` tinyint(1) DEFAULT NULL,
  `task_print` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_office_id_foreign` (`office_id`);

--
-- Indexes for table `applications_forward_maps`
--
ALTER TABLE `applications_forward_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications_processes`
--
ALTER TABLE `applications_processes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_processes_application_id_foreign` (`application_id`);

--
-- Indexes for table `applications_statuses`
--
ALTER TABLE `applications_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_documents`
--
ALTER TABLE `application_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_documents_application_id_foreign` (`application_id`);

--
-- Indexes for table `application_purposes`
--
ALTER TABLE `application_purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_services`
--
ALTER TABLE `application_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_services_application_id_foreign` (`application_id`);

--
-- Indexes for table `application_service_item_downloads`
--
ALTER TABLE `application_service_item_downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_service_item_download_details`
--
ALTER TABLE `application_service_item_download_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_permissions`
--
ALTER TABLE `group_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_carts`
--
ALTER TABLE `inventory_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `receiving_modes`
--
ALTER TABLE `receiving_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_carts`
--
ALTER TABLE `service_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_cart_items`
--
ALTER TABLE `service_cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_cart_items_service_cart_id_foreign` (`service_cart_id`);

--
-- Indexes for table `service_inventories`
--
ALTER TABLE `service_inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_inventories_service_id_foreign` (`service_id`);

--
-- Indexes for table `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_items_service_id_foreign` (`service_id`);

--
-- Indexes for table `service_item_additionals`
--
ALTER TABLE `service_item_additionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_orders`
--
ALTER TABLE `service_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_order_items`
--
ALTER TABLE `service_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_email_templates`
--
ALTER TABLE `sms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_settings`
--
ALTER TABLE `template_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group_roles`
--
ALTER TABLE `user_group_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `applications_forward_maps`
--
ALTER TABLE `applications_forward_maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `applications_processes`
--
ALTER TABLE `applications_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `applications_statuses`
--
ALTER TABLE `applications_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_documents`
--
ALTER TABLE `application_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_purposes`
--
ALTER TABLE `application_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `application_services`
--
ALTER TABLE `application_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `application_service_item_downloads`
--
ALTER TABLE `application_service_item_downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_service_item_download_details`
--
ALTER TABLE `application_service_item_download_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_permissions`
--
ALTER TABLE `group_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_carts`
--
ALTER TABLE `inventory_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receiving_modes`
--
ALTER TABLE `receiving_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1609;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_carts`
--
ALTER TABLE `service_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_cart_items`
--
ALTER TABLE `service_cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_inventories`
--
ALTER TABLE `service_inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `service_item_additionals`
--
ALTER TABLE `service_item_additionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `service_orders`
--
ALTER TABLE `service_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_order_items`
--
ALTER TABLE `service_order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_email_templates`
--
ALTER TABLE `sms_email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `template_settings`
--
ALTER TABLE `template_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=551;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_group_roles`
--
ALTER TABLE `user_group_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `applications_processes`
--
ALTER TABLE `applications_processes`
  ADD CONSTRAINT `applications_processes_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `application_documents`
--
ALTER TABLE `application_documents`
  ADD CONSTRAINT `application_documents_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `service_cart_items`
--
ALTER TABLE `service_cart_items`
  ADD CONSTRAINT `service_cart_items_service_cart_id_foreign` FOREIGN KEY (`service_cart_id`) REFERENCES `service_carts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `service_inventories`
--
ALTER TABLE `service_inventories`
  ADD CONSTRAINT `service_inventories_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
