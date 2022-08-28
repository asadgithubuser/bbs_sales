-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2022 at 09:56 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.12

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
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
  `usage_type` int(11) NOT NULL DEFAULT '1' COMMENT '1=Organization, 2=Personal',
  `organization_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_institute` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose_id` int(11) DEFAULT NULL,
  `purpose_specify` text COLLATE utf8mb4_unicode_ci,
  `total_price` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `final_total` double(8,2) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiving_mode_hardcopy` int(11) DEFAULT NULL COMMENT '1=Physical, 2=Courier',
  `receiving_mode_softcopy` int(11) DEFAULT NULL COMMENT '3=CD/DVD/Flash Drive, 4=Download_link',
  `courier_address` text COLLATE utf8mb4_unicode_ci,
  `current_sender_role_id` int(11) DEFAULT NULL,
  `current_receiver_role_id` int(11) DEFAULT NULL,
  `current_application_status_id` int(11) DEFAULT NULL,
  `terms` text COLLATE utf8mb4_unicode_ci,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=UnApproved, 1=Approved',
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=Pending, 2=Received, 3=Processing, 4=Approved, 5=Canceled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `application_id`, `sr_user_id`, `office_id`, `division_id`, `district_id`, `upazila_id`, `usage_type`, `organization_name`, `organization_address`, `organization_designation`, `personal_occupation`, `personal_institute`, `purpose_id`, `purpose_specify`, `total_price`, `discount`, `final_total`, `attachment`, `receiving_mode_hardcopy`, `receiving_mode_softcopy`, `courier_address`, `current_sender_role_id`, `current_receiver_role_id`, `current_application_status_id`, `terms`, `is_approved`, `is_paid`, `status`, `created_at`, `updated_at`) VALUES
(1, 202112281, 12, NULL, NULL, NULL, NULL, 1, 'ServicEngine BPO ltd.', 'Karwanbazar dhaka', 'Software Developer', NULL, NULL, 3, NULL, 270.00, 70.00, 200.00, NULL, 1, 4, NULL, 3, 3, NULL, '1', 1, 1, 4, '2021-12-28 07:50:35', '2021-12-29 12:03:21'),
(2, 202112282, 12, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Service Holder', 'ServicEngine BPO LTD.', 1, NULL, 150.00, 50.00, 100.00, NULL, 1, 4, NULL, 3, 3, NULL, '1', 1, 0, 4, '2021-12-28 09:22:37', '2021-12-28 10:50:31'),
(3, 202112283, 15, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Service Holder', 'ServicEngine', 1, NULL, 2200.00, 200.00, 2000.00, NULL, 1, 4, NULL, 3, 3, NULL, '1', 1, 0, 4, '2021-12-28 12:16:26', '2021-12-29 11:58:36'),
(4, 202112294, 15, NULL, NULL, NULL, NULL, 1, 'asdasds', 'asdasdsad', 'asdasasdasdsd asdasdasd', NULL, NULL, 1, NULL, 3100.00, 100.00, 3000.00, NULL, 1, 4, NULL, 10, 7, NULL, '1', 1, 0, 4, '2021-12-29 04:18:41', '2021-12-29 12:03:41'),
(5, 202112295, 15, NULL, NULL, NULL, NULL, 1, 'popopo', 'popopo', 'popopoppp', NULL, NULL, 1, NULL, 900.00, 0.00, 900.00, NULL, 1, 3, NULL, 7, 3, NULL, '1', 1, 0, 4, '2021-12-29 11:48:55', '2021-12-29 11:51:22'),
(6, 202201036, 1, NULL, NULL, NULL, NULL, 1, 'Barr Reeves Inc', 'Goodwin Casey Traders', 'Booker and Nelson Trading', NULL, NULL, 2, NULL, 7200.00, 0.00, 7200.00, NULL, 1, 3, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:31:41', '2022-01-03 05:31:41'),
(7, 202201037, 1, NULL, NULL, NULL, NULL, 1, 'Nielsen Boyd Associates', 'West and Tran LLC', 'Reeves Weiss Inc', NULL, NULL, 2, NULL, 1600.00, 0.00, 1600.00, NULL, 1, 3, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:31:57', '2022-01-03 05:31:57'),
(8, 202201038, 1, NULL, NULL, NULL, NULL, 1, 'Whitfield and Hopkins Associates', 'Owens and Conley Associates', 'Spears Snyder Co', NULL, NULL, 2, NULL, 400.00, 0.00, 400.00, NULL, 1, NULL, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:32:36', '2022-01-03 05:32:36'),
(9, 202201039, 1, NULL, NULL, NULL, NULL, 1, 'Whitfield and Hopkins Associates', 'Owens and Conley Associates', 'Spears Snyder Co', NULL, NULL, 2, NULL, 400.00, 0.00, 400.00, NULL, 1, NULL, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:32:43', '2022-01-03 05:32:43'),
(10, 2022010310, 1, NULL, NULL, NULL, NULL, 1, 'Clark Boone Trading', 'Rice and Henson Plc', 'Pugh and Hudson Inc', 'Aliquid non sapiente', 'Hic incididunt magni', 100, NULL, 500.00, 0.00, 500.00, NULL, NULL, 3, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:34:20', '2022-01-03 05:34:20'),
(11, 2022010311, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Quo mollit ut ut id', 'Voluptates corporis', 1, NULL, 2600.00, 0.00, 2600.00, NULL, NULL, 3, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:38:10', '2022-01-03 05:38:10'),
(12, 2022010312, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Commodo accusantium', 'Nulla repudiandae ne', 3, NULL, 1000.00, 0.00, 1000.00, NULL, 1, 3, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:41:00', '2022-01-03 05:41:00'),
(13, 2022010313, 1, NULL, NULL, NULL, NULL, 1, 'Castaneda Bass Traders', 'Schneider Newman Inc', 'Irwin Estrada Associates', NULL, NULL, 2, NULL, 2600.00, 0.00, 2600.00, NULL, 1, 3, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:41:59', '2022-01-03 05:41:59'),
(14, 2022010314, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Sit sunt eos qui re', 'Irure illum et moll', 3, NULL, 800.00, 0.00, 800.00, NULL, NULL, NULL, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:43:39', '2022-01-03 05:43:39'),
(15, 2022010315, 1, NULL, NULL, NULL, NULL, 2, 'Palmer and Haley Plc', 'Prince and Hancock Associates', 'Guy Dorsey Associates', 'Asperiores dolore no', 'Sequi vero est hic o', 3, NULL, 3250.00, 0.00, 3250.00, NULL, 1, NULL, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:46:46', '2022-01-03 05:46:46'),
(16, 2022010316, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Vero elit at dolore', 'Autem perferendis qu', 2, NULL, 100.00, 0.00, 100.00, NULL, 1, NULL, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:50:06', '2022-01-03 05:50:06'),
(17, 2022010317, 1, NULL, NULL, NULL, NULL, 1, 'Hess and Torres Trading', 'Cleveland and Payne Inc', 'Workman and Keller Plc', NULL, NULL, 3, NULL, 1800.00, 0.00, 1800.00, NULL, 1, 3, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:50:56', '2022-01-03 05:50:56'),
(18, 2022010318, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Error ratione autem', 'Eu mollitia enim fug', 3, NULL, 800.00, 0.00, 800.00, NULL, NULL, NULL, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:56:09', '2022-01-03 05:56:09'),
(19, 2022010319, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Dolores elit in har', 'Minus sed libero ex', 3, NULL, 1050.00, 0.00, 1050.00, NULL, 1, 3, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-03 05:56:47', '2022-01-03 05:56:47'),
(20, 2022010320, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Assumenda dolore vel', 'Aliquam voluptates a', 1, NULL, 1350.00, 0.00, 1350.00, NULL, 1, 3, NULL, 7, 3, NULL, '1', 0, 0, 3, '2022-01-03 11:19:09', '2022-01-04 09:11:10'),
(21, 2022011021, 10, NULL, NULL, NULL, NULL, 1, 'asdasd', 'asdasd', 'asdasd', NULL, NULL, 1, NULL, 2300.00, 0.00, 2300.00, NULL, 1, 3, NULL, 10, 7, NULL, '1', 0, 0, 1, '2022-01-10 06:54:34', '2022-01-10 06:54:34');

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
  `is_approved_person` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Non Approved Person, 1=Approved Person',
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
(72, 6, 15, 10, 7, NULL, 'images.png', 'Application from service recipient', NULL, 1, '2021-12-27 15:27:12', '2021-12-27 09:27:12', '2021-12-27 09:27:12'),
(73, 6, 7, 7, 3, 3, '1signature2021_12_13_111139_76585857.png', 'Application is appropriate please approve the application.', NULL, 3, '2021-12-27 15:27:12', '2021-12-27 09:34:28', '2021-12-27 09:34:28'),
(74, 6, 3, 3, NULL, 7, '1signature2021_12_13_111139_76585857.png', 'Application Approved', NULL, 4, NULL, '2021-12-27 09:36:45', '2021-12-27 09:36:45'),
(75, 7, 15, 10, 7, NULL, 'images.png', 'Application from service recipient', NULL, 1, '2021-12-27 18:14:38', '2021-12-27 12:14:38', '2021-12-27 12:14:38'),
(76, 7, 7, 7, 3, 3, '1signature2021_12_13_111139_76585857.png', 'Business Application', NULL, 3, '2021-12-27 18:14:38', '2021-12-27 12:16:12', '2021-12-27 12:16:12'),
(77, 7, 3, 3, NULL, 7, '1signature2021_12_13_111139_76585857.png', 'Application Approved', NULL, 4, NULL, '2021-12-27 12:16:49', '2021-12-27 12:16:49'),
(78, 1, 12, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2021-12-28 13:50:35', '2021-12-28 07:50:35', '2021-12-28 07:50:35'),
(79, 1, 7, 7, 3, 3, '1signature2021_12_13_111139_76585857.png', 'They need data for business purpose. please approve the application. \r\nThank you', NULL, 3, '2021-12-28 13:50:35', '2021-12-28 08:04:31', '2021-12-28 08:04:31'),
(80, 1, 3, 3, NULL, 7, '1signature2021_12_13_111139_76585857.png', 'Application Approved', NULL, 4, NULL, '2021-12-28 08:06:42', '2021-12-28 08:06:42'),
(81, 2, 12, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2021-12-28 15:22:38', '2021-12-28 09:22:38', '2021-12-28 09:22:38'),
(82, 2, 7, 7, 3, 3, '1signature2021_12_13_111139_76585857.png', 'Research requirement. \r\nPlease approve the application.\r\nThank you', NULL, 3, '2021-12-28 15:22:38', '2021-12-28 09:24:48', '2021-12-28 09:24:48'),
(83, 2, 3, 3, NULL, 7, '1signature2021_12_13_111139_76585857.png', 'Application Approved', NULL, 4, NULL, '2021-12-28 09:25:50', '2021-12-28 09:25:50'),
(84, 3, 15, 10, 7, NULL, NULL, 'Application from service recipient', NULL, 1, '2021-12-28 18:16:27', '2021-12-28 12:16:27', '2021-12-28 12:16:27'),
(85, 3, 7, 7, 4, 3, '1signature2021_12_13_111139_76585857.png', 'Application send to DDG for approval', NULL, 3, '2021-12-28 18:16:27', '2021-12-28 12:19:47', '2021-12-28 12:19:47'),
(86, 3, 4, 4, 3, 6, '1signature2021_12_13_111139_76585857.png', 'Application can be approved.\r\nPlease consider.\r\nThank you', NULL, 3, '2021-12-28 18:19:47', '2021-12-28 12:21:37', '2021-12-28 12:21:37'),
(87, 3, 3, 3, NULL, 7, '1signature2021_12_13_111139_76585857.png', 'Application Approved', NULL, 4, NULL, '2021-12-28 12:23:18', '2021-12-28 12:23:18'),
(88, 4, 15, 10, 7, NULL, NULL, 'Application from service recipient', NULL, 1, '2021-12-29 10:18:42', '2021-12-29 04:18:42', '2021-12-29 04:18:42'),
(89, 5, 15, 10, 7, NULL, NULL, 'Application from service recipient', NULL, 1, '2021-12-29 17:48:55', '2021-12-29 11:48:55', '2021-12-29 11:48:55'),
(90, 5, 7, 7, 3, 3, '1signature2021_12_13_111139_76585857.png', 'popopopop', NULL, 3, '2021-12-29 17:48:55', '2021-12-29 11:51:22', '2021-12-29 11:51:22'),
(91, 6, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:31:41', '2022-01-03 05:31:41', '2022-01-03 05:31:41'),
(92, 7, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:31:57', '2022-01-03 05:31:57', '2022-01-03 05:31:57'),
(93, 8, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:32:36', '2022-01-03 05:32:36', '2022-01-03 05:32:36'),
(94, 9, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:32:43', '2022-01-03 05:32:43', '2022-01-03 05:32:43'),
(95, 10, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:34:20', '2022-01-03 05:34:20', '2022-01-03 05:34:20'),
(96, 11, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:38:10', '2022-01-03 05:38:10', '2022-01-03 05:38:10'),
(97, 12, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:41:00', '2022-01-03 05:41:00', '2022-01-03 05:41:00'),
(98, 13, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:41:59', '2022-01-03 05:41:59', '2022-01-03 05:41:59'),
(99, 14, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:43:39', '2022-01-03 05:43:39', '2022-01-03 05:43:39'),
(100, 15, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:46:46', '2022-01-03 05:46:46', '2022-01-03 05:46:46'),
(101, 16, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:50:06', '2022-01-03 05:50:06', '2022-01-03 05:50:06'),
(102, 17, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:50:56', '2022-01-03 05:50:56', '2022-01-03 05:50:56'),
(103, 18, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:56:09', '2022-01-03 05:56:09', '2022-01-03 05:56:09'),
(104, 19, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 11:56:47', '2022-01-03 05:56:47', '2022-01-03 05:56:47'),
(105, 20, 1, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-03 17:19:09', '2022-01-03 11:19:09', '2022-01-03 11:19:09'),
(106, 20, 7, 7, 3, 3, '1signature2021_12_13_111139_76585857.png', NULL, NULL, 3, '2022-01-03 17:19:09', '2022-01-04 09:11:10', '2022-01-04 09:11:10'),
(107, 21, 10, 10, 7, NULL, '1signature2021_12_13_111139_76585857.png', 'Application from service recipient', NULL, 1, '2022-01-10 12:54:34', '2022-01-10 06:54:34', '2022-01-10 06:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `applications_statuses`
--

CREATE TABLE `applications_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_access` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_template` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
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
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '1',
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
(1, 1, 2, 5, 90.00, '2021-12-28 07:50:35', '2021-12-28 07:50:35'),
(2, 1, 2, 12, 100.00, '2021-12-28 07:50:35', '2021-12-28 07:50:35'),
(3, 1, 2, 13, 40.00, '2021-12-28 07:50:35', '2021-12-28 07:50:35'),
(4, 1, 2, 14, 40.00, '2021-12-28 07:50:35', '2021-12-28 07:50:35'),
(5, 2, 1, 9, 25.00, '2021-12-28 09:22:38', '2021-12-28 09:22:38'),
(6, 2, 1, 10, 35.00, '2021-12-28 09:22:39', '2021-12-28 09:22:39'),
(7, 2, 1, 11, 15.00, '2021-12-28 09:22:39', '2021-12-28 09:22:39'),
(8, 3, 1, 3, 500.00, '2021-12-28 12:16:27', '2021-12-28 12:16:27'),
(9, 3, 1, 9, 250.00, '2021-12-28 12:16:28', '2021-12-28 12:16:28'),
(10, 3, 1, 10, 350.00, '2021-12-28 12:16:29', '2021-12-28 12:16:29'),
(11, 4, 1, 2, 600.00, '2021-12-29 04:18:42', '2021-12-29 04:18:42'),
(12, 4, 1, 3, 1000.00, '2021-12-29 04:18:42', '2021-12-29 04:18:42'),
(13, 4, 1, 9, 500.00, '2021-12-29 04:18:42', '2021-12-29 04:18:42'),
(14, 4, 1, 10, 700.00, '2021-12-29 04:18:42', '2021-12-29 04:18:42'),
(15, 4, 1, 11, 300.00, '2021-12-29 04:18:42', '2021-12-29 04:18:42'),
(16, 5, 1, 2, 600.00, '2021-12-29 11:48:55', '2021-12-29 11:48:55'),
(17, 5, 1, 11, 300.00, '2021-12-29 11:48:55', '2021-12-29 11:48:55'),
(18, 6, 1, 2, 600.00, '2022-01-03 05:31:41', '2022-01-03 05:31:41'),
(19, 6, 1, 3, 1000.00, '2022-01-03 05:31:41', '2022-01-03 05:31:41'),
(20, 6, 3, 1, 200.00, '2022-01-03 05:31:41', '2022-01-03 05:31:41'),
(21, 7, 1, 2, 600.00, '2022-01-03 05:31:57', '2022-01-03 05:31:57'),
(22, 7, 1, 3, 1000.00, '2022-01-03 05:31:57', '2022-01-03 05:31:57'),
(23, 8, 1, 18, 200.00, '2022-01-03 05:32:36', '2022-01-03 05:32:36'),
(24, 8, 3, 1, 200.00, '2022-01-03 05:32:36', '2022-01-03 05:32:36'),
(25, 9, 1, 18, 200.00, '2022-01-03 05:32:43', '2022-01-03 05:32:43'),
(26, 9, 3, 1, 200.00, '2022-01-03 05:32:43', '2022-01-03 05:32:43'),
(27, 10, 1, 9, 500.00, '2022-01-03 05:34:20', '2022-01-03 05:34:20'),
(28, 11, 1, 2, 300.00, '2022-01-03 05:38:10', '2022-01-03 05:38:10'),
(29, 11, 1, 3, 500.00, '2022-01-03 05:38:10', '2022-01-03 05:38:10'),
(30, 12, 2, 5, 450.00, '2022-01-03 05:41:00', '2022-01-03 05:41:00'),
(31, 12, 2, 12, 550.00, '2022-01-03 05:41:00', '2022-01-03 05:41:00'),
(32, 13, 2, 5, 900.00, '2022-01-03 05:41:59', '2022-01-03 05:41:59'),
(33, 13, 2, 12, 1000.00, '2022-01-03 05:41:59', '2022-01-03 05:41:59'),
(34, 13, 3, 17, 700.00, '2022-01-03 05:41:59', '2022-01-03 05:41:59'),
(35, 14, 1, 2, 300.00, '2022-01-03 05:43:39', '2022-01-03 05:43:39'),
(36, 14, 1, 3, 500.00, '2022-01-03 05:43:39', '2022-01-03 05:43:39'),
(37, 15, 1, 3, 500.00, '2022-01-03 05:46:46', '2022-01-03 05:46:46'),
(38, 15, 3, 1, 100.00, '2022-01-03 05:46:46', '2022-01-03 05:46:46'),
(39, 16, 3, 1, 100.00, '2022-01-03 05:50:06', '2022-01-03 05:50:06'),
(40, 17, 2, 12, 1000.00, '2022-01-03 05:50:56', '2022-01-03 05:50:56'),
(41, 17, 2, 13, 400.00, '2022-01-03 05:50:56', '2022-01-03 05:50:56'),
(42, 17, 2, 14, 400.00, '2022-01-03 05:50:56', '2022-01-03 05:50:56'),
(43, 18, 1, 2, 300.00, '2022-01-03 05:56:09', '2022-01-03 05:56:09'),
(44, 18, 1, 11, 150.00, '2022-01-03 05:56:09', '2022-01-03 05:56:09'),
(45, 18, 1, 9, 250.00, '2022-01-03 05:56:09', '2022-01-03 05:56:09'),
(46, 18, 1, 18, 100.00, '2022-01-03 05:56:09', '2022-01-03 05:56:09'),
(47, 19, 1, 2, 300.00, '2022-01-03 05:56:47', '2022-01-03 05:56:47'),
(48, 19, 1, 3, 500.00, '2022-01-03 05:56:47', '2022-01-03 05:56:47'),
(49, 19, 1, 9, 250.00, '2022-01-03 05:56:47', '2022-01-03 05:56:47'),
(50, 20, 1, 3, 500.00, '2022-01-03 11:19:09', '2022-01-03 11:19:09'),
(51, 20, 1, 9, 250.00, '2022-01-03 11:19:09', '2022-01-03 11:19:09'),
(52, 20, 1, 10, 350.00, '2022-01-03 11:19:09', '2022-01-03 11:19:09'),
(53, 20, 1, 11, 150.00, '2022-01-03 11:19:09', '2022-01-03 11:19:09'),
(54, 20, 1, 18, 100.00, '2022-01-03 11:19:09', '2022-01-03 11:19:09'),
(55, 21, 2, 5, 900.00, '2022-01-10 06:54:34', '2022-01-10 06:54:34'),
(56, 21, 2, 12, 1000.00, '2022-01-10 06:54:34', '2022-01-10 06:54:34'),
(57, 21, 2, 13, 400.00, '2022-01-10 06:54:34', '2022-01-10 06:54:34');

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
  `download_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_download` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_service_item_downloads`
--

INSERT INTO `application_service_item_downloads` (`id`, `application_id`, `service_id`, `service_item_id`, `file_path`, `link`, `download_token`, `total_download`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 5, 'storage/service/item/18file2021_12_08_044330_54697728.jpg', '20211228021946c4239b4c3e6782d09c2d2d29ee97d49a', NULL, 1, '2021-12-28 08:19:46', '2021-12-28 08:20:22'),
(2, 1, 2, 12, 'storage/service/item/18file2021_12_08_044330_54697728.jpg', '2021122802194654455a0163b9114d4aab42e5365e9116', NULL, 0, '2021-12-28 08:19:46', '2021-12-28 08:19:46'),
(3, 1, 2, 13, 'storage/service/item/17file2021_12_08_044340_24151438.jpeg', '2021122802194728495390216c211045219111a2e6d490', NULL, 0, '2021-12-28 08:19:47', '2021-12-28 08:19:47'),
(4, 1, 2, 14, 'storage/service/item/18file2021_12_08_044330_54697728.jpg', '20211228021947fe5072dd3120509d7714c27f6e846e5f', NULL, 0, '2021-12-28 08:19:47', '2021-12-28 08:19:47'),
(5, 2, 1, 9, 'storage/service/item/17file2021_12_08_044340_24151438.jpeg', '2021122803274440f24e492b1b155bb53b8d6972909b89', NULL, 1, '2021-12-28 09:27:44', '2021-12-28 09:30:58'),
(6, 2, 1, 10, 'storage/service/item/18file2021_12_08_044330_54697728.jpg', '20211228032745fab3b38b345a83f6e3b4be5bba9b86b9', NULL, 0, '2021-12-28 09:27:45', '2021-12-28 09:27:45'),
(7, 2, 1, 11, 'storage/service/item/17file2021_12_08_044340_24151438.jpeg', '20211228032745f5d10b58280eed19ed663bda1f87b118', NULL, 0, '2021-12-28 09:27:45', '2021-12-28 09:27:45'),
(8, 3, 1, 3, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '20211228063958f05d9786dbbfffc3c72d8ca45364c253', NULL, 1, '2021-12-28 12:39:58', '2021-12-28 12:42:00'),
(9, 3, 1, 9, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '2021122806395863f05b542c6592fe88f6715d06e1fcfe', NULL, 0, '2021-12-28 12:39:58', '2021-12-28 12:39:58'),
(10, 3, 1, 10, 'storage/service/item/BBISP_Guide.pdf', '20211228063958dca7f81ff58af5aec130c3e1a5a51aec', NULL, 0, '2021-12-28 12:39:58', '2021-12-28 12:39:58'),
(11, 4, 1, 2, 'storage/service/item/Hotel_and_Restaurant_Survey.pdf', '20211229045417685f35c58fa612484f96aa037652c994', NULL, 0, '2021-12-29 10:54:17', '2021-12-29 10:54:17'),
(12, 4, 1, 3, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '20211229045417bd7d177557a89c2661d13fafbc851589', NULL, 0, '2021-12-29 10:54:17', '2021-12-29 10:54:17'),
(13, 4, 1, 9, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '20211229045417d63ad85fbb8bd28c5f6e2c6372b277e4', NULL, 0, '2021-12-29 10:54:17', '2021-12-29 10:54:17'),
(14, 4, 1, 10, 'storage/service/item/BBISP_Guide.pdf', '2021122904541770f5fb7e9e359d493a1ffc7af196848b', NULL, 0, '2021-12-29 10:54:17', '2021-12-29 10:54:17'),
(15, 4, 1, 11, 'storage/service/item/Hotel_and_Restaurant_Survey.pdf', '202112290454179c8fbc2c4edf9199f1f27e3eca13cc97', NULL, 0, '2021-12-29 10:54:17', '2021-12-29 10:54:17'),
(16, 3, 1, 3, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '20211229052920af5e68c40edf819218311455ce4a50f9', NULL, 0, '2021-12-29 11:29:20', '2021-12-29 11:29:20'),
(17, 3, 1, 9, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '20211229052920e686c0f316b39afe158eba1e0d7dcec5', NULL, 0, '2021-12-29 11:29:20', '2021-12-29 11:29:20'),
(18, 3, 1, 10, 'storage/service/item/BBISP_Guide.pdf', '2021122905292007c543102185aae8d374301844a74847', NULL, 0, '2021-12-29 11:29:20', '2021-12-29 11:29:20'),
(19, 3, 1, 3, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '20211229055649f02d101adfa0d26f755a7db09f0ec076', NULL, 0, '2021-12-29 11:56:49', '2021-12-29 11:56:49'),
(20, 3, 1, 9, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '202112290556496bd852aa164595f33dc244262e694318', NULL, 0, '2021-12-29 11:56:49', '2021-12-29 11:56:49'),
(21, 3, 1, 10, 'storage/service/item/BBISP_Guide.pdf', '20211229055649509e139abfb18be93585a3cddf0c0551', NULL, 0, '2021-12-29 11:56:49', '2021-12-29 11:56:49'),
(22, 3, 1, 3, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '20211229055836abbe4fe37c728a858cd2703d8d2b8dc1', NULL, 0, '2021-12-29 11:58:36', '2021-12-29 11:58:36'),
(23, 3, 1, 9, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '20211229055836481e9e84b849175317c6586229af69ba', NULL, 0, '2021-12-29 11:58:36', '2021-12-29 11:58:36'),
(24, 3, 1, 10, 'storage/service/item/BBISP_Guide.pdf', '202112290558368aab02ebf62b4b38963f5df32763daee', NULL, 0, '2021-12-29 11:58:36', '2021-12-29 11:58:36'),
(25, 1, 2, 5, 'storage/service/item/Hotel_and_Restaurant_Survey.pdf', '202112290603218d12521dd9e97456504c94ff7ea8ba4c', NULL, 0, '2021-12-29 12:03:21', '2021-12-29 12:03:21'),
(26, 1, 2, 12, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '202112290603213b1b1136172f13aab8378f1833edf52a', NULL, 0, '2021-12-29 12:03:21', '2021-12-29 12:03:21'),
(27, 1, 2, 13, 'storage/service/item/BBISP_Guide.pdf', '202112290603211b8dafa9660569ba60dc5f28aae5602a', NULL, 0, '2021-12-29 12:03:21', '2021-12-29 12:03:21'),
(28, 1, 2, 14, 'storage/service/item/Hotel_and_Restaurant_Survey.pdf', '20211229060321bd688032e807fca6e0b0732ef80e0330', NULL, 0, '2021-12-29 12:03:21', '2021-12-29 12:03:21'),
(29, 4, 1, 2, 'storage/service/item/Hotel_and_Restaurant_Survey.pdf', '202112290603355aa080ecffee9c74fa1589a19f5c47bd', NULL, 0, '2021-12-29 12:03:35', '2021-12-29 12:03:35'),
(30, 4, 1, 3, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '202112290603358698818c7309a587a8b9aba4e88a608a', NULL, 0, '2021-12-29 12:03:35', '2021-12-29 12:03:35'),
(31, 4, 1, 9, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '20211229060335a273270b1605a21119150d5837333a5b', NULL, 0, '2021-12-29 12:03:35', '2021-12-29 12:03:35'),
(32, 4, 1, 10, 'storage/service/item/BBISP_Guide.pdf', '20211229060335c03df955ff6fdb5881dbd5f35fe73d01', NULL, 0, '2021-12-29 12:03:35', '2021-12-29 12:03:35'),
(33, 4, 1, 11, 'storage/service/item/Hotel_and_Restaurant_Survey.pdf', '20211229060335054622086c4e79e20461eca52c4c15c7', NULL, 0, '2021-12-29 12:03:35', '2021-12-29 12:03:35'),
(34, 4, 1, 2, 'storage/service/item/Hotel_and_Restaurant_Survey.pdf', '20211229060341462ffe089dd701f56c39e5204768ae82', NULL, 0, '2021-12-29 12:03:41', '2021-12-29 12:03:41'),
(35, 4, 1, 3, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '20211229060341769d96eb2eec9588c9e6cbbb04675b8b', NULL, 0, '2021-12-29 12:03:41', '2021-12-29 12:03:41'),
(36, 4, 1, 9, 'storage/service/item/Wholesale_and_Retailsale_Survay.pdf', '202112290603419fca803a2dc7e7525f47eee0011464cb', NULL, 0, '2021-12-29 12:03:41', '2021-12-29 12:03:41'),
(37, 4, 1, 10, 'storage/service/item/BBISP_Guide.pdf', '202112290603412e8167416bb1d0d15a246b98e031b8af', NULL, 0, '2021-12-29 12:03:41', '2021-12-29 12:03:41'),
(38, 4, 1, 11, 'storage/service/item/Hotel_and_Restaurant_Survey.pdf', '202112290603418475f0c55032b385acceba1541032c65', NULL, 0, '2021-12-29 12:03:41', '2021-12-29 12:03:41');

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
  `download_quantity` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_service_item_download_details`
--

INSERT INTO `application_service_item_download_details` (`id`, `ip_address`, `user_id`, `application_id`, `application_service_item_download_id`, `download_quantity`, `created_at`, `updated_at`) VALUES
(1, '203.76.123.100', 12, 1, 1, 1, '2021-12-28 08:20:21', '2021-12-28 08:20:21'),
(2, '203.76.123.100', 12, 2, 5, 1, '2021-12-28 09:30:57', '2021-12-28 09:30:57'),
(3, '203.76.123.100', 15, 3, 8, 1, '2021-12-28 12:42:00', '2021-12-28 12:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_bn` text COLLATE utf8mb4_unicode_ci,
  `is_use_application_form` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_templates`
--

CREATE TABLE `assessment_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assessment_templates`
--

INSERT INTO `assessment_templates` (`id`, `name`, `header`, `footer`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Assessment One', 'Template \r\nHeader', 'Template\r\nFooter', 0, '2021-12-13 10:13:49', '2021-12-13 10:44:25'),
(3, 'Assessment One', 'Template \r\nHeader', 'Template\r\nFooter', 0, '2021-12-13 10:14:14', '2021-12-13 10:44:25'),
(4, 'Assessment One Edited', 'Dear sir\nI am writing to apply for the programmer position advertised in the Times Union. As requested, I enclose a completed job application, my certification, my resume, and three references.', 'Thank you for your time and consideration. I look forward to speaking with you about this employment opportunity.\r\nSincerely,\r\n\r\nJohn Donaldson (signature hard copy letter)\r\nJohn Donaldson', 1, '2021-12-13 10:15:07', '2021-12-13 11:52:31'),
(5, 'Garth Roberson', 'Deleniti quo cupidit', 'Aperiam nostrud rem', 0, '2021-12-13 10:18:56', '2021-12-13 10:18:56'),
(6, 'Clare Dickerson', 'Non magnam quia sint', 'Molestiae voluptatib', 0, '2021-12-13 10:22:58', '2021-12-13 10:44:25'),
(7, 'Clare Dickerson', 'Non magnam quia sint', 'Molestiae voluptatib', 0, '2021-12-13 10:23:57', '2021-12-13 10:44:25'),
(8, 'Judith Hancock', 'Dolore irure sequi p', 'In aliquip sit hic', 0, '2021-12-13 10:44:25', '2021-12-13 11:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) DEFAULT NULL,
  `sr_user_id` bigint(20) NOT NULL DEFAULT '0',
  `certificate_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
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
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
-- Table structure for table `course_calendars`
--

CREATE TABLE `course_calendars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fiscal_year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `forward` int(11) DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `level_id`, `name_en`, `name_bn`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'SSTI', 'SSTI', 1, 1, 1, '2021-12-20 05:27:58', '2021-12-27 06:19:33'),
(2, 1, 'সেন্সাস বিভাগ', 'Census Wings', 1, 1, NULL, '2021-12-27 06:17:20', '2021-12-27 06:17:20'),
(3, 1, 'আগ্রিকালচার বিভাগ', 'Agriculture Wings', 1, 1, NULL, '2021-12-27 06:18:41', '2021-12-27 06:18:41');

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
  `status` tinyint(1) DEFAULT '1',
  `ordering` int(11) DEFAULT '1',
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
  `status` int(2) DEFAULT '1'
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
  `status` int(2) DEFAULT '1'
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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `attachment` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `fiscal_years`
--

CREATE TABLE `fiscal_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fiscal_years`
--

INSERT INTO `fiscal_years` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '2019-2020', 0, 1, 1, '2021-12-20 12:29:00', '2021-12-27 05:07:45'),
(2, '2021-22', 1, 1, 1, '2021-12-20 12:29:34', '2022-01-09 09:18:04'),
(3, '2022-23', 0, 1, NULL, '2021-12-27 05:08:04', '2021-12-27 05:08:04'),
(4, '2015-16', 0, 1, NULL, '2022-01-09 06:48:30', '2022-01-09 06:48:30'),
(5, '2022-23', 0, 1, 1, '2022-01-09 06:51:13', '2022-01-09 06:53:49'),
(6, '2024-25', 0, 1, 1, '2022-01-09 06:51:33', '2022-01-09 06:53:44'),
(7, '2023-24', 0, 1, 1, '2022-01-09 06:51:53', '2022-01-09 06:59:16');

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
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` int(11) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_update_histories`
--

CREATE TABLE `inventory_update_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_inventory_id` bigint(20) DEFAULT NULL,
  `added_by` bigint(20) DEFAULT NULL,
  `number_of_hard_copies` int(11) DEFAULT NULL,
  `number_of_complimentary_copies` int(11) DEFAULT NULL,
  `number_of_sale_copies` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci,
  `name_bn` text COLLATE utf8mb4_unicode_ci,
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
  `sr_user_id` int(11) DEFAULT '0',
  `sms_template_id` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_sms` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unsend, 1=send',
  `is_email` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=unsend, 1=send',
  `modified` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
(307, '2021_12_07_191241_create_service_order_items_table', 6),
(308, '2021_12_12_154106_create_inventory_update_histories_table', 7),
(309, '2021_12_12_143328_create_requisitions_table', 8),
(310, '2021_12_12_143437_create_requisition_items_table', 8),
(311, '2021_12_13_150222_create_assessment_templates_table', 9),
(312, '2021_12_19_153757_create_departments_table', 10),
(313, '2021_12_20_113218_create_fiscal_years_table', 11),
(314, '2021_12_20_113907_create_training_trainers_table', 11),
(315, '2021_12_20_114319_create_training_courses_table', 11),
(316, '2021_12_20_122407_create_training_course_durations_table', 11),
(317, '2021_12_20_130117_create_training_course_curriculumns_table', 11),
(318, '2021_12_20_130505_create_training_course_attachments_table', 11),
(319, '2022_01_03_173643_create_notifications_table', 12),
(320, '2022_01_11_153935_create_course_calendars_table', 12);

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
(1, 'বাংলাদেশ পরিসংখ্যান ব্যুরোর রাজস্ব', 'বাংলাদেশ পরিসংখ্যান ব্যুরোর রাজস্ব বাজেটের নক্সাবিদ, ডাটা এন্ট্রি/কন্ট্রোল অপারেটর, সিনিয়র নক্সাবিদ, এবং সাঁট মুদ্রাক্ষরিক কাম কম্পিউটার অপারেটর পদে নিয়োগের লক্ষ্যে প্রার্থীদের লিখিত পরীক্ষা গ্রহনের সময়সূচি ও পরীক্ষা কেন্দ্রের তালিকা সংক্রান্ত বিজ্ঞপ্তি।', '2022-12-21', 1, '2021-11-18 10:36:24', '2021-12-27 11:21:08'),
(2, '১৯/১১/২০২১ খ্রি. তারিখে অনুষ্ঠিত', '১৯/১১/২০২১ খ্রি. তারিখে অনুষ্ঠিত হিসাবরক্ষক,সাঁটলিপিকার কাম কম্পিউটার অপারেটর, কম্পোজিটর, সহকারী স্টোরকিপার, প্রুফম্যান পদের লিখিত পরীক্ষার ফলাফল প্রকাশ', '2022-12-30', 1, '2021-11-18 10:36:24', '2021-12-27 11:21:24'),
(3, 'বাংলাদেশ পরিসংখ্যান ব্যুরোর', 'বাংলাদেশ পরিসংখ্যান ব্যুরোর বিদ্যমান \"অফিস সহকারী\" পদের পদনাম পরিবর্তনপূর্বক \'অফিস সহকারী-কাম-কম্পিউটার মুদ্রা্ক্ষরিক করণ প্রসংগে', '2022-12-01', 1, '2021-11-18 10:36:24', '2021-12-27 11:21:36'),
(4, 'বাংলাদেশ পরিসংখ্যান ব্যুরোর আওতায়', 'বাংলাদেশ পরিসংখ্যান ব্যুরোর আওতায় পরিসংখ্যান সহকারী পদের ০৫-১১-২০২১ খ্রি. তারিখে অনুষ্ঠিত লিখিত পরীক্ষার ফলাফল বিবিএস এর ওয়েবসাইটে প্রকাশ', '2022-12-22', 1, '2021-11-22 05:18:33', '2022-01-02 06:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('9f15a73a-8be2-4bc4-a3b7-c4af9c276b8a', 'App\\Notifications\\CourseCalendarNotification', 'App\\Models\\User', 16, '{\"data\":\"Course modification notification\",\"sender_user_id\":17,\"gotoURL\":\"http:\\/\\/bbs.test:88\\/bbs\\/course\\/edit\\/1\",\"courseCalendarId\":1}', '2022-01-13 09:01:06', '2022-01-13 08:52:37', '2022-01-13 08:52:37'),
('da3a7e13-9fb5-44d3-82ce-fb4f25151e96', 'App\\Notifications\\CourseCalendarNotification', 'App\\Models\\User', 16, '{\"data\":\"Course modification notification\",\"sender_user_id\":17,\"gotoURL\":\"http:\\/\\/bbs.test:88\\/bbs\\/course\\/edit\\/1\",\"courseCalendarId\":1}', NULL, '2022-01-13 09:29:28', '2022-01-13 09:29:28');

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
  `about_info` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
  `is_app` tinyint(1) NOT NULL DEFAULT '0',
  `challan_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `division_id`, `district_id`, `upazila_id`, `office_id`, `application_id`, `sr_user_id`, `nid`, `dob`, `amount`, `fees`, `bank_name`, `account_number`, `mobile_bank`, `document_img`, `request_id`, `transaction_id`, `certificate_document_no`, `pg_id`, `is_app`, `challan_no`, `request_time`, `response_time`, `created_at`, `updated_at`) VALUES
(16, NULL, NULL, NULL, NULL, 2, 12, '2406181465', '1994-01-07', 150.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2021-12-30', NULL, '2021-12-30 06:10:59', '2021-12-30 06:10:59'),
(17, NULL, NULL, NULL, NULL, 2, 12, '2406181465', '1994-01-07', 150.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2021-12-30', NULL, '2021-12-30 06:11:09', '2021-12-30 06:11:09'),
(18, NULL, NULL, NULL, NULL, 5, 15, '15151515151', '1994-01-07', 900.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2022-01-02', NULL, '2022-01-02 10:52:36', '2022-01-02 10:52:36');

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
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci,
  `name_bn` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
(121, 'assessment_template', 'assessment_template', 1, 1, NULL, '2021-12-02 06:34:39', '2021-12-02 06:34:39'),
(123, 'create_requisition', 'create_requisition', 1, 1, NULL, '2021-12-14 11:41:23', '2021-12-14 11:41:23'),
(124, 'declined_requisitions', 'declined_requisitions', 1, 1, NULL, '2021-12-14 11:41:11', '2021-12-14 11:41:11'),
(125, 'approved_requisitions', 'approved_requisitions', 1, 1, NULL, '2021-12-14 11:40:54', '2021-12-14 11:40:54'),
(126, 'pending_requisitions', 'pending_requisitions', 1, 1, NULL, '2021-12-14 11:40:44', '2021-12-14 11:40:44'),
(127, 'all_requisitions', 'all_requisitions', 1, 1, NULL, '2021-12-14 11:40:24', '2021-12-14 11:40:24'),
(128, 'manage_requisition', 'manage_requisition', 1, 1, NULL, '2021-12-14 11:40:08', '2021-12-14 11:40:08'),
(129, 'manage_department', 'manage_department', 1, 1, NULL, '2021-12-19 09:45:11', '2021-12-19 09:45:11'),
(130, 'all_department', 'all_department', 1, 1, NULL, '2021-12-19 09:45:11', '2021-12-19 09:45:11'),
(131, 'add_department', 'add_department', 1, 1, NULL, '2021-12-19 09:45:11', '2021-12-19 09:45:11'),
(132, 'view_department', 'view_department', 1, 1, NULL, NULL, NULL),
(133, 'edit_department', 'edit_department', 1, 1, NULL, NULL, NULL),
(134, 'delete_department', 'delete_department', 1, 1, NULL, NULL, NULL),
(135, 'total_shop_money_earn', 'total_shop_money_earn', 1, 1, NULL, NULL, NULL),
(136, 'total_online_money_earn', 'total_online_money_earn', 1, 1, NULL, NULL, NULL),
(137, 'manage_fiscal_year', 'manage_fiscal', 1, 1, NULL, NULL, NULL),
(138, 'all_fiscal_year', 'all_fiscal', 1, 1, NULL, NULL, NULL),
(139, 'add_fiscal_year', 'add_fiscal', 1, 1, NULL, NULL, NULL),
(140, 'edit_fiscal_year', 'edit_fiscal', 1, 1, NULL, NULL, NULL),
(141, 'manage_trainer', 'manage_trainer', 1, 1, NULL, NULL, NULL),
(142, 'add_trainer', 'add_trainer', 1, 1, NULL, NULL, NULL),
(143, 'all_trainer', 'all_trainer', 1, 1, NULL, NULL, NULL),
(144, 'edit_trainer', 'edit_trainer', 1, 1, NULL, NULL, NULL),
(145, 'trainer_status', 'trainer_status', 1, 1, NULL, NULL, NULL),
(146, 'manage_course', 'manage_course', 1, 1, NULL, '2021-12-23 12:21:24', '2021-12-23 12:21:24'),
(147, 'application_discount', 'application_discount', 1, 1, NULL, NULL, NULL),
(148, 'deliver_requisition', 'deliver_requisition', 1, 1, NULL, NULL, NULL),
(149, 'manage_calender', 'manage_calender', 1, 1, NULL, '2022-01-11 04:28:01', '2022-01-11 04:28:01');

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
-- Table structure for table `receiving_modes`
--

CREATE TABLE `receiving_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `requisitions`
--

CREATE TABLE `requisitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requisition_number` int(11) DEFAULT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisitions`
--

INSERT INTO `requisitions` (`id`, `requisition_number`, `organization_name`, `name`, `designation`, `phone`, `address`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 202112141, 'Hester and Clayton Plc', 'Rashad Valentine', 'Dolorem est et et au', '+1 (805) 666-2343', 'Enim aliquam ut qui', NULL, 1, '2021-12-14 12:32:28', '2021-12-15 08:32:55'),
(2, 202112142, 'Hester and Clayton Plc', 'Rashad Valentine', 'Dolorem est et et au', '+1 (805) 666-2343', 'Enim aliquam ut qui', NULL, 0, '2021-12-14 12:32:28', '2021-12-15 08:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `requisition_items`
--

CREATE TABLE `requisition_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requisition_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_item_id` int(11) DEFAULT NULL,
  `service_inventory_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisition_items`
--

INSERT INTO `requisition_items` (`id`, `requisition_id`, `service_id`, `service_item_id`, `service_inventory_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 1, 10, '2021-12-14 12:32:28', '2021-12-14 12:32:28'),
(2, 2, 1, 2, 1, 10, '2021-12-14 12:32:28', '2021-12-14 12:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
(11, 'Store manager', 'স্টোর কিপার', 'Store manager', 1, 1, 1, NULL, '2021-12-05 07:16:56', '2021-12-05 07:16:56'),
(12, 'Course Coordinator', 'কোর্স সমন্বয়কারী', 'E-Service Operator', 1, 1, 1, NULL, '2022-01-10 10:18:38', '2022-01-10 10:18:38'),
(13, 'Course Director', 'কোর্স পরিচালক', 'E-Service Operator', 1, 1, 1, NULL, '2022-01-10 10:20:59', '2022-01-10 10:20:59');

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
(1607, NULL, 118, 11, 1, NULL, '2021-12-05 07:17:13', '2021-12-05 07:17:13'),
(3005, NULL, 1, 2, 1, NULL, '2021-12-27 06:51:53', '2021-12-27 06:51:53'),
(3006, NULL, 2, 2, 1, NULL, '2021-12-27 06:51:53', '2021-12-27 06:51:53'),
(3007, NULL, 3, 2, 1, NULL, '2021-12-27 06:51:53', '2021-12-27 06:51:53'),
(3008, NULL, 4, 2, 1, NULL, '2021-12-27 06:51:53', '2021-12-27 06:51:53'),
(3009, NULL, 5, 2, 1, NULL, '2021-12-27 06:51:53', '2021-12-27 06:51:53'),
(3010, NULL, 6, 2, 1, NULL, '2021-12-27 06:51:53', '2021-12-27 06:51:53'),
(3011, NULL, 7, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3012, NULL, 8, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3013, NULL, 9, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3014, NULL, 10, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3015, NULL, 11, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3016, NULL, 12, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3017, NULL, 13, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3018, NULL, 14, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3019, NULL, 15, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3020, NULL, 16, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3021, NULL, 17, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3022, NULL, 19, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3023, NULL, 20, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3024, NULL, 21, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3025, NULL, 22, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3026, NULL, 24, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3027, NULL, 25, 2, 1, NULL, '2021-12-27 06:51:54', '2021-12-27 06:51:54'),
(3028, NULL, 26, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3029, NULL, 27, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3030, NULL, 29, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3031, NULL, 30, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3032, NULL, 31, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3033, NULL, 32, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3034, NULL, 34, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3035, NULL, 35, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3036, NULL, 36, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3037, NULL, 38, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3038, NULL, 39, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3039, NULL, 40, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3040, NULL, 42, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3041, NULL, 43, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3042, NULL, 44, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3043, NULL, 45, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3044, NULL, 46, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3045, NULL, 47, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3046, NULL, 49, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3047, NULL, 50, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3048, NULL, 51, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3049, NULL, 53, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3050, NULL, 54, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3051, NULL, 55, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3052, NULL, 56, 2, 1, NULL, '2021-12-27 06:51:55', '2021-12-27 06:51:55'),
(3053, NULL, 57, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3054, NULL, 58, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3055, NULL, 59, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3056, NULL, 60, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3057, NULL, 61, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3058, NULL, 62, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3059, NULL, 63, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3060, NULL, 64, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3061, NULL, 65, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3062, NULL, 67, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3063, NULL, 68, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3064, NULL, 69, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3065, NULL, 70, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3066, NULL, 71, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3067, NULL, 72, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3068, NULL, 73, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3069, NULL, 75, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3070, NULL, 76, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3071, NULL, 77, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3072, NULL, 78, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3073, NULL, 79, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3074, NULL, 81, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3075, NULL, 82, 2, 1, NULL, '2021-12-27 06:51:56', '2021-12-27 06:51:56'),
(3076, NULL, 83, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3077, NULL, 84, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3078, NULL, 85, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3079, NULL, 86, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3080, NULL, 87, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3081, NULL, 89, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3082, NULL, 90, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3083, NULL, 92, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3084, NULL, 93, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3085, NULL, 94, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3086, NULL, 96, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3087, NULL, 97, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3088, NULL, 98, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3089, NULL, 99, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3090, NULL, 100, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3091, NULL, 101, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3092, NULL, 102, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3093, NULL, 103, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3094, NULL, 105, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3095, NULL, 113, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3096, NULL, 114, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3097, NULL, 115, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3098, NULL, 116, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3099, NULL, 117, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3100, NULL, 119, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3101, NULL, 121, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3102, NULL, 123, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3103, NULL, 124, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3104, NULL, 125, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3105, NULL, 126, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3106, NULL, 127, 2, 1, NULL, '2021-12-27 06:51:57', '2021-12-27 06:51:57'),
(3107, NULL, 128, 2, 1, NULL, '2021-12-27 06:51:58', '2021-12-27 06:51:58'),
(3108, NULL, 129, 2, 1, NULL, '2021-12-27 06:51:58', '2021-12-27 06:51:58'),
(3109, NULL, 130, 2, 1, NULL, '2021-12-27 06:51:58', '2021-12-27 06:51:58'),
(3110, NULL, 131, 2, 1, NULL, '2021-12-27 06:51:58', '2021-12-27 06:51:58'),
(3111, NULL, 132, 2, 1, NULL, '2021-12-27 06:51:58', '2021-12-27 06:51:58'),
(3112, NULL, 133, 2, 1, NULL, '2021-12-27 06:51:59', '2021-12-27 06:51:59'),
(3113, NULL, 134, 2, 1, NULL, '2021-12-27 06:51:59', '2021-12-27 06:51:59'),
(3114, NULL, 135, 2, 1, NULL, '2021-12-27 06:51:59', '2021-12-27 06:51:59'),
(3115, NULL, 136, 2, 1, NULL, '2021-12-27 06:51:59', '2021-12-27 06:51:59'),
(3116, NULL, 137, 2, 1, NULL, '2021-12-27 06:51:59', '2021-12-27 06:51:59'),
(3117, NULL, 138, 2, 1, NULL, '2021-12-27 06:51:59', '2021-12-27 06:51:59'),
(3118, NULL, 139, 2, 1, NULL, '2021-12-27 06:51:59', '2021-12-27 06:51:59'),
(3119, NULL, 140, 2, 1, NULL, '2021-12-27 06:51:59', '2021-12-27 06:51:59'),
(3120, NULL, 1, 10, 1, NULL, '2021-12-27 06:53:01', '2021-12-27 06:53:01'),
(3121, NULL, 10, 10, 1, NULL, '2021-12-27 06:53:01', '2021-12-27 06:53:01'),
(3122, NULL, 11, 10, 1, NULL, '2021-12-27 06:53:01', '2021-12-27 06:53:01'),
(3123, NULL, 12, 10, 1, NULL, '2021-12-27 06:53:01', '2021-12-27 06:53:01'),
(3124, NULL, 85, 10, 1, NULL, '2021-12-27 06:53:01', '2021-12-27 06:53:01'),
(3125, NULL, 86, 10, 1, NULL, '2021-12-27 06:53:01', '2021-12-27 06:53:01'),
(3126, NULL, 87, 10, 1, NULL, '2021-12-27 06:53:02', '2021-12-27 06:53:02'),
(3127, NULL, 88, 10, 1, NULL, '2021-12-27 06:53:02', '2021-12-27 06:53:02'),
(3128, NULL, 106, 10, 1, NULL, '2021-12-27 06:53:02', '2021-12-27 06:53:02'),
(3129, NULL, 107, 10, 1, NULL, '2021-12-27 06:53:02', '2021-12-27 06:53:02'),
(3130, NULL, 109, 10, 1, NULL, '2021-12-27 06:53:02', '2021-12-27 06:53:02'),
(3131, NULL, 110, 10, 1, NULL, '2021-12-27 06:53:02', '2021-12-27 06:53:02'),
(3132, NULL, 111, 10, 1, NULL, '2021-12-27 06:53:03', '2021-12-27 06:53:03'),
(3269, NULL, 1, 7, 1, NULL, '2021-12-28 08:01:26', '2021-12-28 08:01:26'),
(3270, NULL, 11, 7, 1, NULL, '2021-12-28 08:01:26', '2021-12-28 08:01:26'),
(3271, NULL, 12, 7, 1, NULL, '2021-12-28 08:01:26', '2021-12-28 08:01:26'),
(3272, NULL, 13, 7, 1, NULL, '2021-12-28 08:01:26', '2021-12-28 08:01:26'),
(3273, NULL, 85, 7, 1, NULL, '2021-12-28 08:01:26', '2021-12-28 08:01:26'),
(3274, NULL, 86, 7, 1, NULL, '2021-12-28 08:01:26', '2021-12-28 08:01:26'),
(3275, NULL, 87, 7, 1, NULL, '2021-12-28 08:01:26', '2021-12-28 08:01:26'),
(3276, NULL, 88, 7, 1, NULL, '2021-12-28 08:01:26', '2021-12-28 08:01:26'),
(3277, NULL, 89, 7, 1, NULL, '2021-12-28 08:01:26', '2021-12-28 08:01:26'),
(3278, NULL, 90, 7, 1, NULL, '2021-12-28 08:01:26', '2021-12-28 08:01:26'),
(3279, NULL, 91, 7, 1, NULL, '2021-12-28 08:01:26', '2021-12-28 08:01:26'),
(3280, NULL, 112, 7, 1, NULL, '2021-12-28 08:01:26', '2021-12-28 08:01:26'),
(3281, NULL, 147, 7, 1, NULL, '2021-12-28 08:01:26', '2021-12-28 08:01:26'),
(3296, NULL, 1, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3297, NULL, 2, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3298, NULL, 3, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3299, NULL, 4, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3300, NULL, 5, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3301, NULL, 6, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3302, NULL, 7, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3303, NULL, 8, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3304, NULL, 9, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3305, NULL, 10, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3306, NULL, 11, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3307, NULL, 12, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3308, NULL, 13, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3309, NULL, 14, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3310, NULL, 15, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3311, NULL, 16, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3312, NULL, 17, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3313, NULL, 18, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3314, NULL, 19, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3315, NULL, 20, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3316, NULL, 21, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3317, NULL, 22, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3318, NULL, 23, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3319, NULL, 24, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3320, NULL, 25, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3321, NULL, 26, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3322, NULL, 27, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3323, NULL, 28, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3324, NULL, 29, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3325, NULL, 30, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3326, NULL, 31, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3327, NULL, 32, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3328, NULL, 33, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3329, NULL, 34, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3330, NULL, 35, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3331, NULL, 36, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3332, NULL, 37, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3333, NULL, 38, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3334, NULL, 39, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3335, NULL, 40, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3336, NULL, 41, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3337, NULL, 42, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3338, NULL, 43, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3339, NULL, 44, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3340, NULL, 45, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3341, NULL, 46, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3342, NULL, 47, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3343, NULL, 48, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3344, NULL, 49, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3345, NULL, 50, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3346, NULL, 51, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3347, NULL, 52, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3348, NULL, 53, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3349, NULL, 54, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3350, NULL, 55, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3351, NULL, 56, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3352, NULL, 57, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3353, NULL, 58, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3354, NULL, 59, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3355, NULL, 60, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3356, NULL, 61, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3357, NULL, 62, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3358, NULL, 63, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3359, NULL, 64, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3360, NULL, 65, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3361, NULL, 66, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3362, NULL, 67, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3363, NULL, 68, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3364, NULL, 69, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3365, NULL, 70, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3366, NULL, 71, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3367, NULL, 72, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3368, NULL, 73, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3369, NULL, 74, 1, 1, NULL, '2022-01-11 04:31:03', '2022-01-11 04:31:03'),
(3370, NULL, 75, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3371, NULL, 76, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3372, NULL, 77, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3373, NULL, 78, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3374, NULL, 79, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3375, NULL, 80, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3376, NULL, 81, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3377, NULL, 82, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3378, NULL, 83, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3379, NULL, 84, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3380, NULL, 85, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3381, NULL, 86, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3382, NULL, 87, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3383, NULL, 88, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3384, NULL, 89, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3385, NULL, 90, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3386, NULL, 91, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3387, NULL, 92, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3388, NULL, 93, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3389, NULL, 94, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3390, NULL, 96, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3391, NULL, 97, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3392, NULL, 98, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3393, NULL, 99, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3394, NULL, 100, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3395, NULL, 101, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3396, NULL, 102, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3397, NULL, 103, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3398, NULL, 105, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3399, NULL, 113, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3400, NULL, 114, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3401, NULL, 115, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3402, NULL, 116, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3403, NULL, 117, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3404, NULL, 118, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3405, NULL, 119, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3406, NULL, 121, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3407, NULL, 123, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3408, NULL, 124, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3409, NULL, 125, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3410, NULL, 126, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3411, NULL, 127, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3412, NULL, 128, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3413, NULL, 129, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3414, NULL, 130, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3415, NULL, 131, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3416, NULL, 132, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3417, NULL, 133, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3418, NULL, 134, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3419, NULL, 135, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3420, NULL, 136, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3421, NULL, 137, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3422, NULL, 138, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3423, NULL, 139, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3424, NULL, 140, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3425, NULL, 141, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3426, NULL, 142, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3427, NULL, 143, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3428, NULL, 144, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3429, NULL, 145, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3430, NULL, 146, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3431, NULL, 147, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3432, NULL, 149, 1, 1, NULL, '2022-01-11 04:31:04', '2022-01-11 04:31:04'),
(3434, NULL, 146, 12, 1, NULL, '2022-01-12 09:28:20', '2022-01-12 09:28:20'),
(3435, NULL, 149, 12, 1, NULL, '2022-01-12 09:28:20', '2022-01-12 09:28:20'),
(3436, NULL, 1, 3, 1, NULL, '2022-01-13 08:29:36', '2022-01-13 08:29:36'),
(3437, NULL, 11, 3, 1, NULL, '2022-01-13 08:29:36', '2022-01-13 08:29:36'),
(3438, NULL, 12, 3, 1, NULL, '2022-01-13 08:29:36', '2022-01-13 08:29:36'),
(3439, NULL, 13, 3, 1, NULL, '2022-01-13 08:29:36', '2022-01-13 08:29:36'),
(3440, NULL, 86, 3, 1, NULL, '2022-01-13 08:29:36', '2022-01-13 08:29:36'),
(3441, NULL, 87, 3, 1, NULL, '2022-01-13 08:29:36', '2022-01-13 08:29:36'),
(3442, NULL, 88, 3, 1, NULL, '2022-01-13 08:29:36', '2022-01-13 08:29:36'),
(3443, NULL, 89, 3, 1, NULL, '2022-01-13 08:29:36', '2022-01-13 08:29:36'),
(3444, NULL, 90, 3, 1, NULL, '2022-01-13 08:29:36', '2022-01-13 08:29:36'),
(3445, NULL, 91, 3, 1, NULL, '2022-01-13 08:29:36', '2022-01-13 08:29:36'),
(3446, NULL, 96, 3, 1, NULL, '2022-01-13 08:29:36', '2022-01-13 08:29:36'),
(3447, NULL, 112, 3, 1, NULL, '2022-01-13 08:29:36', '2022-01-13 08:29:36'),
(3448, NULL, 117, 3, 1, NULL, '2022-01-13 08:29:36', '2022-01-13 08:29:36'),
(3449, NULL, 146, 13, 1, NULL, '2022-01-13 08:30:40', '2022-01-13 08:30:40'),
(3450, NULL, 149, 13, 1, NULL, '2022-01-13 08:30:40', '2022-01-13 08:30:40');

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
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
  `purpose_specify` text COLLATE utf8mb4_unicode_ci,
  `receiving_mode_hardcopy` int(11) DEFAULT NULL COMMENT '1=Physical, 2=Courier',
  `receiving_mode_softcopy` int(11) DEFAULT NULL COMMENT '3=CD/DVD/Flash Drive, 4=Download_link',
  `courier_address` text COLLATE utf8mb4_unicode_ci,
  `terms` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_carts`
--

INSERT INTO `service_carts` (`id`, `sr_user_id`, `office_id`, `level_id`, `division_id`, `district_id`, `upazila_id`, `usage_type`, `organization_name`, `organization_address`, `organization_designation`, `personal_occupation`, `personal_institute`, `purpose_id`, `purpose_specify`, `receiving_mode_hardcopy`, `receiving_mode_softcopy`, `courier_address`, `terms`, `status`, `created_at`, `updated_at`) VALUES
(5, 12, NULL, NULL, NULL, NULL, NULL, 2, 'sdfsdf', 'sdfsdf', 'sdfsdf', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-28 09:22:41', '2021-12-30 05:09:42'),
(10, 15, NULL, NULL, 3, 13, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-29 11:48:55', '2021-12-29 11:48:55'),
(35, 1, NULL, NULL, NULL, NULL, NULL, 1, 'sdfsdf', 'sdfsdf', 'sdf', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-05 05:30:47', '2022-01-05 05:31:21');

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
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_inventories`
--

INSERT INTO `service_inventories` (`id`, `service_id`, `service_item_id`, `title`, `sub_title`, `data_source`, `service_type`, `survey_date`, `publish_date`, `downloadable_link`, `number_of_hard_copies`, `number_of_complimentary_copies`, `number_of_sale_copies`, `store_room`, `shelf_no`, `rack_no`, `price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Census 2019', 'Census Data', 'Census Data', 'Census Data', '1990-12-07', '2021-12-01', 'https://www.youtube.com/watch?v=CcyJNDrUUcc', 125, 30, 5, 'BBS 101', '151', '2', 150.00, 1, 1, NULL, '2021-12-05 08:27:33', '2021-12-15 08:32:55'),
(2, 1, 2, 'Census 2020', 'Publication', 'Publication', 'Publication', '1984-10-14', '1999-09-09', 'https://www.youtube.com/watch?v=CcyJNDrUUcc', 26, NULL, 71, 'BBS 101', '152', '1', 195.00, 1, 1, NULL, '2021-12-05 11:11:39', '2021-12-28 10:44:46'),
(3, 3, 1, 'Census 2021', 'Minim molestiae reic', 'Census Data', 'Census Data', '2019-01-11', '1990-12-07', 'https://www.youtube.com/watch?v=CcyJNDrUUcc', 92, 907, 12, 'BBS 101', '153', '3', 1000.00, 1, 1, NULL, '2021-12-05 11:12:38', '2021-12-26 12:34:27'),
(7, 2, 14, 'Census publication', 'Polulation', NULL, NULL, '2021-01-01', '2021-01-01', NULL, 540, 50, 490, '101', '10', '5', 500.00, 1, NULL, NULL, '2021-12-28 12:49:05', '2021-12-28 12:55:19');

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
  `price_bdt_personal` double(8,2) DEFAULT NULL,
  `price_bdt_org` double(8,2) DEFAULT NULL,
  `price_usd_personal` double(8,2) DEFAULT NULL,
  `price_usd_org` double(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
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

INSERT INTO `service_items` (`id`, `service_id`, `data_type`, `item_name_en`, `item_name_bn`, `price_bdt_personal`, `price_bdt_org`, `price_usd_personal`, `price_usd_org`, `description`, `status`, `ordering`, `attachment`, `barcode`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Citizen Certificate', 'নাগরিক সার্টিফিকেট', 100.00, 200.00, 10.00, 20.00, 'Through this service, employers can check the validity of the certificate provided by a prospective Bengali employee before applying for the work permit....', 1, 3, 'BBISP_Guide.pdf', 'bbs0000001', 1, 1, NULL, '2021-12-28 10:27:12'),
(2, 1, 1, 'Census Publication 2018', 'আদমশুমারি প্রকাশনা ২০১৮', 300.00, 600.00, 30.00, 60.00, 'Bangladesh is the eighth-most populated country in the world with almost 2.2% of the worlds population. The population is estimated by the 2019 revision of the World Population Prospects to have stood at 161,376,708 in 2018......', 1, 1, 'Hotel_and_Restaurant_Survey.pdf', 'bbs0000002', 1, NULL, NULL, NULL),
(3, 1, 2, 'Population and Housing Census 2011', 'জনসংখ্যা ও গৃহায়ন আদমশুমারি ২০১১', 500.00, 1000.00, 50.00, 100.00, 'The population and housing census is the unique source of reliable and comprehensive benchmark\r\ndata about the size of population and also on major socio-economic & demographic characteristics of\r\nthe population of the country.\r\nThe population and housing census provides information on geographic and administrative\r\ndistribution of population and household, in addition to the aggregated data on demographic and\r\nsocio-economic characteristics of the population of the country. The data from the census is classified,\r\ntabulated and disseminated so that researchers, administrators, policy makers and development\r\npartners can use census data in formulating and implementing multi-sectoral development programs\r\nat the national and sub-national levels.', 1, 1, 'Wholesale_and_Retailsale_Survay.pdf', 'bbs0000003', 1, NULL, '2021-11-23 06:07:44', '2021-11-23 06:07:44'),
(4, 3, 2, 'Area Census Certificate', 'এলাকা শুমারি সার্টিফিকেট', 200.00, 400.00, 20.00, 40.00, 'Whenever the population of any county, township, or city is referred to in any Iowa law, the official population is the last preceding certified federal census unless otherwise provided', 1, 1, 'BBISP_Guide.pdf', 'bbs0000004', 1, NULL, '2021-11-23 06:18:21', '2021-11-23 06:18:21'),
(5, 2, 1, 'CONCEPT NOTE - NATIONAL POPULATION REGISTER (NPR) BANGLADESH', 'কনসেপ্ট নোট - ন্যাশনাল পপুলেশন রেজিস্টার', 450.00, 900.00, 45.00, 90.00, 'Bangladesh is advancing so fast in generation of data and usage of information technology\r\nfor the last couple of years. A wide range of ministries, departments, agencies and private\r\nservice providers create and manage a variety of datasets and mapping capacities for their\r\nspecific needs. The non-government and development partners are also doing the same type\r\nof data management for their own. Government is also creating huge volume of data through\r\ndifferent surveys, census and administrative activities across the entire system.', 1, 1, 'Hotel_and_Restaurant_Survey.pdf', 'bbs0000005', 1, NULL, '2021-11-23 06:21:30', '2021-11-23 06:21:30'),
(9, 1, 2, 'Welfare Monitoring Survey', 'ওয়েলফেয়ার মনিটরিং জরিপ', 250.00, 500.00, 25.00, 50.00, 'Bangladesh Bureau of Statistics has conducted Welfare Monitoring Survey (WMS) in March 2009. The Objectives of the WMS were to collect some core welfare indicators for assessing the poverty situation of the country excluding the income and expenditure dimension of poverty assessment. It is worth mentioning that traditional Household income and Expenditure Survey is the main instrument for measuring the poverty using income/expenditure behavior the household. The WMS included a number of indicators which can be generated annually to measure the progress in poverty reduction strategy of the government. The areas that have been covered in the survey are household and housing characteristics, population characteristics , health situation, self assessment of poverty, food security, clothing and footwear, crisis coping, credit and investment, participation in the social organization such as clubs and associations, security, women empowerment, recreation and leisure etc.', 1, 1, 'Wholesale_and_Retailsale_Survay.pdf', 'bbs0000009', 1, NULL, '2021-11-25 08:00:04', '2021-11-25 08:00:04'),
(10, 1, 1, 'Census of Manufacturing Industries', 'উৎপাদন শিল্পের আদমশুমারি', 350.00, 700.00, 35.00, 70.00, 'Bangladesh Bureau of Statistics has been conducting Census of Manufacturing Industries (CMI) every year for the last two decades. It was designed to cover all industrial units registered with Chief Inspector of Factory (CIF) under the Factory Act 1934. The Factories Act covers all units that employ 10 or more persons.', 1, 2, 'BBISP_Guide.pdf', 'bbs0000010', 1, NULL, '2021-11-25 08:08:02', '2021-11-25 08:08:02'),
(11, 1, 2, 'Annual Establishment & Institution Survey', 'বার্ষিক প্রতিষ্ঠা ও প্রতিষ্ঠান জরিপ', 150.00, 300.00, 15.00, 30.00, 'The Annual Establishment and Institution Survey (AEIS) is an integrated survey programme of BBS. Large and medium scale manufacturing establishments with 10 or more employees were excluded from AEIS. Small manufacturing establishments (less than 10 persons) and all permanent establishments, irrespective of employment sizes such as Wholesale and Retail Trade, Hotel and Restaurant, Business and Social services and Non-farm household based economic activities are included in AEIS.', 1, 1, 'Hotel_and_Restaurant_Survey.pdf', 'bbs0000011', 1, NULL, '2021-11-25 08:10:09', '2021-11-25 08:10:09'),
(12, 2, 2, 'The Statistical Yearbook Bangladesh', 'দ্য স্ট্যাটিসটিক্যাল ইয়ারবুক বাংলাদেশ', 550.00, 1000.00, 55.00, 100.00, 'The Statistical Yearbook Bangladesh is one of the most important public documents which\r\ncontribute a lot towards formulating effective and fruitful public policy. In addition, it is considered\r\nas a unique tool which can greatly help us to face the upcoming challenges in different fields of\r\npublic policy. It is a consolidated report to make an integration of Sustainable Development Goals\r\nof the 2030 Agenda for Sustainable Development into the 8\r\nth Five Year Plan (2020-25), 2\r\nnd\r\nPerspective Plan 2021-2041, National Social Security Strategy and Bangladesh Delta plan 2100.', 1, 1, 'Wholesale_and_Retailsale_Survay.pdf', 'bbs0000012', 1, NULL, '2021-11-25 08:18:26', '2021-11-25 08:18:26'),
(13, 2, 1, 'Report on crop survey', 'ফসল জরিপ রিপোর্ট', 200.00, 400.00, 20.00, 40.00, 'This Report provides rural developments’ information, farmers’\r\nlivelihoods and agriculture related information in different dimension for the users at national and\r\ndivisional levels. I hope that the report will be the key source of data for policy makers, planners,\r\ndeveloping organizations, civil society members, media and development partners in formulating\r\npolicies, defining the strategies and undertaking development programmes in different levels for the\r\ndevelopment of the country', 1, 2, 'BBISP_Guide.pdf', 'bbs0000013', 1, NULL, '2021-11-25 08:29:28', '2021-11-25 08:29:28'),
(14, 2, 1, 'Census of agriculture', 'কৃষি আদমশুমারি', 200.00, 400.00, 20.00, 40.00, 'Agriculture Census is the source of benchmark information of Agriculture sector of a country. Therefore, the development of agriculture sector is virtually synonymous with the development of our country. Timely and realistic statistics on agriculture sector is pre-requisite for sound agriculture development planning.', 1, 1, 'Hotel_and_Restaurant_Survey.pdf', 'bbs0000014', 1, NULL, '2021-11-25 08:36:07', '2021-11-25 08:36:07'),
(15, 2, 1, 'Foreign trade statistics of Bangladesh', 'বাংলাদেশের বৈদেশিক বাণিজ্য পরিসংখ্যান', 650.00, 1200.00, 65.00, 120.00, 'Foreign Trade Statistics (FTS) is an important annual publication of Bangladesh Bureau of Statistics (BBS)\r\nwhich is being published regularly since 1973-74. The publication contains disaggregated data on FTS,\r\nwhich are the end product of a complex process comprising many stages starting from the collection and\r\nprocessing of basic records of compilation. This is the 34th issue of FTS series which bears detailed\r\ninformation on merchandise export and import figures for fiscal year 2019-20 in different dimensions.', 1, 1, 'Wholesale_and_Retailsale_Survay.pdf', 'bbs0000015', 1, NULL, '2021-11-25 08:40:10', '2021-11-25 08:40:10'),
(16, 3, 1, 'Bangladesh compendium of environment statistics', 'বাংলাদেশ পরিবেশ পরিসংখ্যানের সংকলন', 300.00, 600.00, 30.00, 60.00, 'Development of environment statistics is the main base line for developing the sustainable\r\nenvironmental management. It describe the state and trends of the environment, covering the in\r\ngrading of the natural environment (air/climate, water, land/soil, etc), the biota within the media,\r\nhuman settlements, natural events and its impacts, social responses to environmental impacts, and the\r\nquality and availability of natural assets. Thus the broad area of environmental statistic includes\r\nenvironmental indicators, indices and accounting. Compendium of Environment Statistics of\r\nBangladesh’ 2009 is the outcomes from the upgrading of Compendium of Environment Statistics of\r\nBangladesh – 2005 and Bangladesh Framework for Development of Environmental Statistics (BFDES). The data included in this publication are mostly from the secondary sources and efforts have\r\nbeen made to include the latest data wherever possible.', 1, 1, 'BBISP_Guide.pdf', 'bbs0000016', 1, NULL, '2021-11-25 09:03:40', '2021-11-25 09:03:40'),
(17, 3, 1, 'Literacy Assesment Survey', 'সাক্ষরতা মূল্যায়ন জরিপ', 350.00, 700.00, 35.00, 70.00, 'The literacy assessment survey was conducted throughout the country in 73,204 households of 3350\r\nPrimary Sampling Units (PSUs) from 17th to 28th November, 2011 with the budget from the\r\ngovernment. This survey provided valid, reliable and interpretable data on adult literacy status of\r\nthe country. A set of instruments were developed by BBS under this assignment which can be used\r\nin future. The data generated through the survey will also be helpful for planners, policy makers,\r\nresearchers, students and academicians.', 1, 1, 'Hotel_and_Restaurant_Survey.pdf', 'bbs0000017', 1, 1, '2021-11-25 09:06:58', '2021-12-08 10:43:40'),
(18, 1, 1, 'service item1', 'সার্ভিস আইটেম ১', 100.00, 200.00, 10.00, 20.00, 'test', 1, 30, 'Wholesale_and_Retailsale_Survay.pdf', 'bbs00000018', 1, 1, '2021-12-02 07:00:32', '2021-12-08 10:43:30'),
(19, 2, 2, 'service item12', 'সার্ভিস আইটেম ১২', 1231.00, 2100.00, 121.00, 231.00, 'asfasfs11', 1, 121, 'BBISP_Guide.pdf', 'bbs00000019', 1, 1, '2021-12-22 08:35:14', '2021-12-28 13:02:54');

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
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
  `total_quantity` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `paid_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `due_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
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
(1, '1.00', '195.00', '195.00', '0.00', 'paid', 1, 0, '2021-12-28 10:44:46', '2021-12-28 10:44:46'),
(2, '10.00', '5000.00', '5000.00', '0.00', 'paid', 1, 12, '2021-12-28 12:55:18', '2021-12-28 12:55:18');

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
(1, 1, 2, '195.00', 1, 1, 0, '2021-12-28 10:44:46', '2021-12-28 10:44:46'),
(2, 2, 7, '500.00', 10, 1, 12, '2021-12-28 12:55:19', '2021-12-28 12:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `sms_email_templates`
--

CREATE TABLE `sms_email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` mediumtext COLLATE utf8mb4_unicode_ci,
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
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `username`, `email`, `phone`, `activation_code`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'atiqurrahman', 'atiqur.rahman@sebpo.com', '0123456789', '202111230145101f741e00e9a9e5b39c4e93a5ee3d59c1', 0, '2021-11-23 07:45:10', '2021-11-23 07:50:00'),
(3, 'TauhidSEBPO', 'tauhid.hasan@sebpo.com', '01677163339', '20211130121314a6722975e922de2affca2550d7fc6d48', 0, '2021-11-30 06:13:14', '2021-11-30 06:14:20'),
(6, 'md.tauhidalhasan', 'm.tah69@gmail.com', '01677163339', '20211228060900a604761f39592a8604dd341e43e5b67e', 0, '2021-12-28 12:09:01', '2021-12-28 12:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `template_settings`
--

CREATE TABLE `template_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `header` text COLLATE utf8mb4_unicode_ci,
  `footer` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_settings`
--

INSERT INTO `template_settings` (`id`, `service_id`, `header`, `footer`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hello\r\ndear', 'Thank you\r\nfrom Tauhid', 'The \r\nmessage \r\nbody', 1, '2021-12-13 08:20:10', '2021-12-13 08:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `training_courses`
--

CREATE TABLE `training_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiscal_year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `trainer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_director_id` bigint(20) DEFAULT NULL,
  `course_coordinator_id` bigint(20) DEFAULT NULL,
  `course_purpose` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '0',
  `is_published` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=published, 0= draft',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_courses`
--

INSERT INTO `training_courses` (`id`, `title`, `fiscal_year_id`, `trainer_id`, `course_director_id`, `course_coordinator_id`, `course_purpose`, `status`, `is_published`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'abc abc abc', 2, 1, 17, 1, 'asb abs abs', 3, 1, 1, NULL, '2022-01-13 10:00:19', '2022-01-13 11:05:02'),
(2, NULL, 2, 1, NULL, 16, NULL, 0, 0, 1, NULL, '2022-01-13 10:01:31', '2022-01-13 11:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `training_course_attachments`
--

CREATE TABLE `training_course_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `curriculumn_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_course_curriculumns`
--

CREATE TABLE `training_course_curriculumns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `module_no` int(11) DEFAULT NULL,
  `subject_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_course_curriculumns`
--

INSERT INTO `training_course_curriculumns` (`id`, `course_id`, `module_no`, `subject_code`, `subject_title`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '101', 'CSE', 1, NULL, '2021-12-26 12:43:37', '2021-12-26 12:43:37'),
(2, 1, 102, '102', 'CSE21', 1, NULL, '2021-12-26 12:43:51', '2021-12-26 12:43:51'),
(3, 2, 101, '111', 'SDG01', 1, NULL, '2021-12-27 05:10:32', '2021-12-27 05:10:32'),
(4, 3, 1, '1', '1', 1, NULL, '2022-01-11 10:13:04', '2022-01-11 10:13:04'),
(5, 2, 3, '3', '3', 1, NULL, '2022-01-11 10:21:36', '2022-01-11 10:21:36'),
(6, 1, 2, '2', '2', 1, NULL, '2022-01-13 10:01:24', '2022-01-13 10:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `training_course_durations`
--

CREATE TABLE `training_course_durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batch_no` bigint(20) DEFAULT NULL,
  `course_hour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Total course hour',
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Course days',
  `trainee_type` int(11) DEFAULT NULL COMMENT '1=kormochari, 2=kormokorta, 3=both',
  `total_trainees` bigint(20) DEFAULT NULL,
  `training_type` int(11) DEFAULT NULL COMMENT '1=resident, 2= non resident',
  `total_trainer_allowance` int(11) DEFAULT NULL,
  `total_trainee_allowance` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_course_durations`
--

INSERT INTO `training_course_durations` (`id`, `course_id`, `batch_no`, `course_hour`, `month`, `start_date`, `end_date`, `duration`, `trainee_type`, `total_trainees`, `training_type`, `total_trainer_allowance`, `total_trainee_allowance`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '72', 'January', NULL, NULL, '5', 0, 40, 0, 40000, 200, NULL, 1, NULL, '2021-12-26 12:42:30', '2021-12-26 12:42:30'),
(2, 2, 1, '100', 'January', NULL, NULL, '15', 0, 30, 0, 15000, 7500, NULL, 1, NULL, '2021-12-27 05:10:06', '2021-12-27 05:10:06'),
(3, 3, 1, '12', 'January', NULL, NULL, '1', 0, 12, 0, 15000, 1, NULL, 1, NULL, '2022-01-11 10:12:58', '2022-01-11 10:12:58'),
(4, 1, 2, '121', 'January', NULL, NULL, '1', 0, 12, 0, 15000, 7500, NULL, 1, NULL, '2022-01-11 10:19:52', '2022-01-11 10:19:52'),
(5, 2, 2, '3', 'February', NULL, NULL, '3', 0, 303, 0, 3, 3, NULL, 1, NULL, '2022-01-11 10:21:32', '2022-01-11 10:21:32'),
(6, 1, 3, '2', 'January', NULL, NULL, '2', 0, 2, 0, 2, 2, NULL, 1, NULL, '2022-01-13 10:01:19', '2022-01-13 10:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `training_trainers`
--

CREATE TABLE `training_trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=active, 0=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_trainers`
--

INSERT INTO `training_trainers` (`id`, `name`, `phone`, `email`, `address`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chastity England', '+1 (963) 209-2325', 'wiryxu@mailinator.com', 'Explicabo Temporibu', 1, NULL, 1, '2021-12-26 12:39:22', '2021-12-26 12:39:22');

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
  `status` int(1) NOT NULL DEFAULT '1'
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
  `present_address` text COLLATE utf8mb4_unicode_ci,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
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
  `class` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_pass_changed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscribe_id` int(11) DEFAULT NULL,
  `is_sr_user` tinyint(1) NOT NULL DEFAULT '1',
  `notification_email` tinyint(1) NOT NULL DEFAULT '1',
  `notification_sms` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `office_id`, `designation_id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `dob`, `present_address`, `permanent_address`, `nid_no`, `birth_certificate_no`, `country_id`, `division_id`, `district_id`, `upazila_id`, `level_id`, `postal_code`, `photo`, `mobile`, `email`, `class`, `department_id`, `signature`, `email_verified_at`, `remember_token`, `is_pass_changed`, `subscribe_id`, `is_sr_user`, `notification_email`, `notification_sms`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 'superadmin', '$2y$10$ZaoIUJjdV2wP462q0wGD4eh1edhd5AZ0VE8Cq0.Av2p4BVhH0kheO', 'Gazi', 'Alim Al', 'Razy', '', 'Kawran Bazar, Dhaka', 'Kawran Bazar, Dhaka', '2406181492', NULL, 19, NULL, NULL, NULL, NULL, NULL, '1photo2021_12_28_114033_35880963.jpg', '01712345678', 'superadmin@gmail.com', NULL, NULL, '1signature2021_12_13_111139_76585857.png', NULL, NULL, NULL, NULL, 0, 1, 1, '1', '1', 1, '2021-12-01 05:42:26', '2021-12-28 05:40:33'),
(2, 2, 1, 7, 'admin', '$2y$10$qtyMhsnybHJH6rYEiFjqo.oWHdtcsO19ALYzS/im15ItWbWxRwvY6', 'Didarul', NULL, 'Islam', '', 'house 45 road 5 Banasree', 'Kawran Bazar, Dhaka', '2406181493', NULL, 19, NULL, NULL, NULL, 1, NULL, '1photo2021_12_28_114033_35880963.jpg', '01312345678', 'admin@gmail.com', 1, NULL, '1signature2021_12_13_111139_76585857.png', NULL, NULL, NULL, NULL, 0, 1, 1, '1', NULL, 1, '2021-12-01 05:55:55', NULL),
(3, 3, NULL, NULL, 'directorgeneral', '$2y$10$u5XtJFzxMNQjQJ525KZWN.IwONK/IZ69Sc.y7DkfQmZkITC8BgiMO', 'Ashraful', NULL, 'Alam', '', 'house 45 road 5 Badda', 'Kawran Bazar, Dhaka', '2406181494', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3photo2022_01_12_045226_38920265.png', '01518642856', 'e_service_admin@gmail.com', NULL, NULL, '1signature2021_12_13_111139_76585857.png', NULL, NULL, NULL, NULL, 0, 1, 1, '1', '3', 0, '2021-12-01 05:57:52', '2022-01-12 10:52:26'),
(4, 4, 1, 6, 'deputydirectorgeneral', '$2y$10$MSPVNCgM8PmTQiJX5HuYnOPhFJe.9GUHfWuu3Tr7mx3jvZSZHLPwe', 'Shirajul', NULL, 'Prince', '', 'house 45 road 5 Uttara', 'Kawran Bazar, Dhaka', '2406181495', NULL, 19, NULL, NULL, NULL, 1, NULL, '1photo2021_12_28_114033_35880963.jpg', '01518642856', 'e_service_observer@gmail.com', 1, NULL, '1signature2021_12_13_111139_76585857.png', NULL, NULL, NULL, NULL, 0, 1, 1, '1', NULL, 1, '2021-12-01 06:01:36', NULL),
(5, 5, 1, 5, 'director', '$2y$10$Iw2NGI3dW7A2jLDVLyS1s.JFnDvCplcVolzXsvv0c13tPhdVzGaVm', 'Raiyan', NULL, 'Mortaza', '', 'house 45 road 5 Mirpur', 'Kawran Bazar, Dhaka', '2406181496', NULL, 19, NULL, NULL, NULL, 1, NULL, '1photo2021_12_28_114033_35880963.jpg', '01518642856', 'e_service_observer1@gmail.com', 1, NULL, '1signature2021_12_13_111139_76585857.png', NULL, NULL, NULL, NULL, 0, 1, 1, '1', NULL, 1, '2021-12-01 06:01:38', NULL),
(6, 6, 1, 4, 'seniorprogrammer', '$2y$10$JZAHINUGRbUc8Xllh1PnmeUsg5Nii0AXMyFzCxgK29HBpVXvCJ.SK', 'Mafizur', NULL, 'Rahman', '', 'house 45 road 5 Mirpur', 'Kawran Bazar, Dhaka', '2406181497', NULL, 19, NULL, NULL, NULL, 1, NULL, '1photo2021_12_28_114033_35880963.jpg', '01518642856', 'e_service_operator@gmail.com', 1, NULL, '1signature2021_12_13_111139_76585857.png', NULL, NULL, NULL, NULL, 0, 1, 1, '1', NULL, 1, '2021-12-01 06:01:41', NULL),
(7, 7, 1, 3, 'assistantofficer', '$2y$10$gVVldPQzzogDu5ZO9MY3P.93NuKcKlYziFMV.qAauE5LTydGDUAj6', 'Rasel', NULL, 'Udding', '', 'house 45 road 5 Uttara', 'Kawran Bazar, Dhaka', '2406181498', NULL, 19, NULL, NULL, NULL, 1, NULL, '1photo2021_12_28_114033_35880963.jpg', '01518642856', 'e_service_operator1@gmail.com', 2, NULL, '1signature2021_12_13_111139_76585857.png', NULL, NULL, NULL, NULL, 0, 1, 1, '1', NULL, 1, '2021-12-01 06:01:43', NULL),
(8, 8, 1, 2, 'assistantofficerlocal', '$2y$10$GOwzsvFQBHbsm9shg7Ym7.H4X.WEEqPDHyj6Zt8mZCedFfvjoXAiC', 'Tanveer', NULL, 'Noman', '', 'house 45 road 5 Uttara', 'Kawran Bazar, Dhaka', '2406181499', NULL, 19, NULL, NULL, NULL, 1, NULL, '1photo2021_12_28_114033_35880963.jpg', '01518642856', 'e_service_operator2@gmail.com', 2, NULL, '1signature2021_12_13_111139_76585857.png', NULL, NULL, NULL, NULL, 0, 1, 1, '1', NULL, 1, '2021-12-01 06:01:48', NULL),
(9, 9, 1, 1, 'statisticalofficerlocal', '$2y$10$dCsVZ9v0mkVQszSihKJjh.w1.MmgW8cOUg7PDopv6FUDqO5Qmcsge', 'Khondokar', 'Shams', 'Tabrez', '', 'house 45 road 5 Uttara', 'Kawran Bazar, Dhaka', '2406181400', NULL, 19, NULL, NULL, NULL, 1, NULL, '1photo2021_12_28_114033_35880963.jpg', '01518642856', 'e_service_operator3@gmail.com', 2, NULL, '1signature2021_12_13_111139_76585857.png', NULL, NULL, NULL, NULL, 0, 1, 1, '1', NULL, 1, '2021-12-02 06:12:30', NULL),
(10, 10, NULL, NULL, 'rayhan.zaman', '$2y$10$pa.G4dphnfvxhxYBWf9mA..pAZIVLpZI1ERp9Ksr5aWGygkH5TjiK', 'Md. ', 'Rayhan', 'Zaman', '1997-03-22', 'House #17, B Block, Road #3, Banasree, Dhaka', 'Chalkbazar, Dhaka', '2406181491', NULL, 19, NULL, NULL, NULL, NULL, '1205', '1photo2021_12_28_114033_35880963.jpg', '01521449100', 'user@gmail.com', NULL, NULL, '1signature2021_12_13_111139_76585857.png', '2021-12-02 06:20:27', NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, '2021-12-02 06:12:33', NULL),
(11, 10, NULL, NULL, 'atiqurrahman', '$2y$10$WlEHQU2tfAzh.dPJ0mJF5uTDzGwU9hPSrkPth5udvF9pWjOIK1iqa', 'Atiq', 'Ur', 'Rahman', '1990-11-23', 'house 45 road 5 Uttara', 'house 45 road 5 Uttara', '2406181488', NULL, 19, 3, 13, 51, NULL, '1230', '1photo2021_12_28_114033_35880963.jpg', '01518642856', 'atiqur.rahman@sebpo.com', NULL, NULL, '1signature2021_12_13_111139_76585857.png', '2021-11-23 07:50:00', NULL, NULL, 2, 1, 1, 1, NULL, NULL, 1, '2021-11-23 07:50:00', '2021-11-23 07:50:00'),
(12, 10, NULL, NULL, 'TauhidSEBPO', '$2y$10$YvJvY0/4jqXscNnmeBKI4e2SXhqLm9LuG6n74xRl9xvjx.TJoZuCa', 'Tauhid', 'Al', 'Hasan', '1994-01-07', 'house 45 road 5 Uttara', 'house 45 road 5 Uttara', '2406181465', NULL, 236, NULL, NULL, NULL, NULL, NULL, '17photo2021_12_09_111937_65678647.png', '01537152126', 'tauhid.hasan@sebpo.com', NULL, NULL, '1signature2021_12_13_111139_76585857.png', '2021-11-30 06:14:20', NULL, NULL, 3, 1, 1, 1, NULL, NULL, 1, '2021-11-30 06:14:20', '2021-12-27 12:49:11'),
(13, 11, 1, 3, 'md.sheikh', '$2y$10$pa.G4dphnfvxhxYBWf9mA..pAZIVLpZI1ERp9Ksr5aWGygkH5TjiK', 'Md.', 'Mojnu', 'Sheikh', NULL, 'Badda', 'Badda', '2406181434', NULL, 19, NULL, NULL, NULL, 1, NULL, '1photo2021_12_28_114033_35880963.jpg', '01518642856', 'storekeeper@gmail.com', 2, NULL, '1signature2021_12_13_111139_76585857.png', NULL, NULL, NULL, NULL, 1, 0, 1, '1', NULL, 1, '2021-12-05 07:18:40', '2021-12-05 07:18:40'),
(14, 2, NULL, NULL, 'dr.arefin', '$2y$10$p4n/q77.jYA9/gXXcXwvlegoarjEGODJ4E2aEbuoGJLX6I9y80VXi', 'Dr.', 'Shahnaz', 'Arefin', NULL, 'Mirpur', 'Mirpur', '2406181453', NULL, 19, NULL, NULL, NULL, NULL, NULL, '21photo2021_12_27_122556_77956029.png', '01518643844', 'secy@sid.gov.bd', NULL, NULL, 'signature2021_12_27_122344_32354317.png', NULL, NULL, NULL, NULL, 0, 1, 1, '1', '21', 1, '2021-12-27 06:23:46', '2021-12-27 06:25:56'),
(15, 10, NULL, NULL, 'md.tauhidalhasan', '$2y$10$gVVldPQzzogDu5ZO9MY3P.93NuKcKlYziFMV.qAauE5LTydGDUAj6', 'Tauhid', NULL, 'Hasan', '1994-01-07', NULL, NULL, '15151515151', NULL, 19, 3, 13, 49, NULL, '1230', NULL, NULL, 'm.tah69@gmail.com', NULL, NULL, NULL, '2021-12-28 12:11:35', NULL, NULL, 6, 1, 1, 1, NULL, NULL, 1, '2021-12-28 12:11:35', '2021-12-28 12:11:35'),
(16, 12, 1, 6, 'jodu manikmoni', '$2y$10$r5JxuqcaC3MbneCtX.25Ber7hOjTqDJ7SbkE.pwixUVUzOOpelS9K', 'Jodu Manik', 'Ullah', 'Moni', NULL, 'Badda', 'Badda', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'photo2022_01_12_032611_75779093.jpg', '018238974563', 'moni@gmail.com', 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, '2022-01-12 09:26:11', '2022-01-12 09:26:11'),
(17, 13, 1, 5, 'mofizulmofiz', '$2y$10$RyUOCQI1VSwGnBq2bxHSc.7UmBho.rWzXQDu6.KQ/z/7VSndHZTSy', 'Mofizul', 'Islam', 'Mofiz', NULL, 'MIrpur', 'MIrpur', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '01518643883', 'coursedirector@gmail.com', 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, '2022-01-13 08:28:15', '2022-01-13 08:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci,
  `name_bn` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
-- Indexes for table `assessment_templates`
--
ALTER TABLE `assessment_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_calendars`
--
ALTER TABLE `course_calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
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
-- Indexes for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
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
-- Indexes for table `inventory_update_histories`
--
ALTER TABLE `inventory_update_histories`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_items`
--
ALTER TABLE `requisition_items`
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
-- Indexes for table `training_courses`
--
ALTER TABLE `training_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_courses_fiscal_year_id_foreign` (`fiscal_year_id`),
  ADD KEY `training_courses_trainer_id_foreign` (`trainer_id`);

--
-- Indexes for table `training_course_attachments`
--
ALTER TABLE `training_course_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_course_attachments_course_id_foreign` (`course_id`),
  ADD KEY `training_course_attachments_curriculumn_id_foreign` (`curriculumn_id`);

--
-- Indexes for table `training_course_curriculumns`
--
ALTER TABLE `training_course_curriculumns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_course_curriculumns_course_id_foreign` (`course_id`);

--
-- Indexes for table `training_course_durations`
--
ALTER TABLE `training_course_durations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_course_durations_course_id_foreign` (`course_id`);

--
-- Indexes for table `training_trainers`
--
ALTER TABLE `training_trainers`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `applications_forward_maps`
--
ALTER TABLE `applications_forward_maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `applications_processes`
--
ALTER TABLE `applications_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `application_service_item_downloads`
--
ALTER TABLE `application_service_item_downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `application_service_item_download_details`
--
ALTER TABLE `application_service_item_download_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessment_templates`
--
ALTER TABLE `assessment_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_calendars`
--
ALTER TABLE `course_calendars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `group_permissions`
--
ALTER TABLE `group_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_carts`
--
ALTER TABLE `inventory_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_update_histories`
--
ALTER TABLE `inventory_update_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

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
-- AUTO_INCREMENT for table `requisitions`
--
ALTER TABLE `requisitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requisition_items`
--
ALTER TABLE `requisition_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3451;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_carts`
--
ALTER TABLE `service_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `service_cart_items`
--
ALTER TABLE `service_cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_inventories`
--
ALTER TABLE `service_inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `service_item_additionals`
--
ALTER TABLE `service_item_additionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `service_orders`
--
ALTER TABLE `service_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_order_items`
--
ALTER TABLE `service_order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sms_email_templates`
--
ALTER TABLE `sms_email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `template_settings`
--
ALTER TABLE `template_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `training_courses`
--
ALTER TABLE `training_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `training_course_attachments`
--
ALTER TABLE `training_course_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_course_curriculumns`
--
ALTER TABLE `training_course_curriculumns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `training_course_durations`
--
ALTER TABLE `training_course_durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `training_trainers`
--
ALTER TABLE `training_trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=551;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Constraints for table `application_documents`
--
ALTER TABLE `application_documents`
  ADD CONSTRAINT `application_documents_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
