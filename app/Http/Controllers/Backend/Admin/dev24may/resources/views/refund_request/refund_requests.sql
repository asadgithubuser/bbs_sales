-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 10:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmstest`
--

-- --------------------------------------------------------

--
-- Table structure for table `refund_requests`
--

CREATE TABLE `refund_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `seller_approval` int(1) NOT NULL DEFAULT 0,
  `admin_approval` int(1) NOT NULL DEFAULT 0,
  `refund_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `reason` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason_select` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `refund_method` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_credentials` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mfs_credentials` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_seen` int(11) NOT NULL,
  `refund_status` int(1) NOT NULL DEFAULT 0,
  `reject_reason` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `refund_requests`
--

INSERT INTO `refund_requests` (`id`, `user_id`, `order_id`, `order_detail_id`, `seller_id`, `seller_approval`, `admin_approval`, `refund_amount`, `reason`, `reason_select`, `refund_method`, `bank_credentials`, `mfs_credentials`, `admin_seen`, `refund_status`, `reject_reason`, `created_at`, `updated_at`) VALUES
(2, 584, 380, 374, 48, 0, 1, 14299.00, 'Display is not working', NULL, NULL, NULL, NULL, 1, 1, NULL, '2022-02-08 11:34:53', '2022-02-08 11:35:25'),
(5, 575, 422, 412, 520, 0, 0, 602.00, 'hggfh', 'Not as advertised', 'Wallet', '[null,null,null,null]', '[\"Bkash\",null]', 0, 0, NULL, '2022-02-27 21:19:08', '2022-02-27 21:19:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `refund_requests`
--
ALTER TABLE `refund_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `refund_requests`
--
ALTER TABLE `refund_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
