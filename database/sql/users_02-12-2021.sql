-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2021 at 12:57 PM
-- Server version: 10.3.31-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sebpobd_bbs_db`
--

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
(1, 1, NULL, 8, 'superadmin', '$2y$10$ZaoIUJjdV2wP462q0wGD4eh1edhd5AZ0VE8Cq0.Av2p4BVhH0kheO', 'super', 'super', 'admin', '', 'house 36 road 6 kamarpara turag', 'done', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01518643843', 'superadmin@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '1', '1', 0, NULL, '2021-11-21 09:10:40'),
(2, 2, 1, 7, 'admin', '$2y$10$qtyMhsnybHJH6rYEiFjqo.oWHdtcsO19ALYzS/im15ItWbWxRwvY6', 'John', 'super', 'Doe', '', 'house 45 road 5 Banasree', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '01312345678', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(3, 3, 1, 7, 'directorgeneral', '$2y$10$u5XtJFzxMNQjQJ525KZWN.IwONK/IZ69Sc.y7DkfQmZkITC8BgiMO', 'Snow', 'super', 'white', '', 'house 45 road 5 Badda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'directorgeneral@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(4, 4, 1, 6, 'deputydirectorgeneral', '$2y$10$MSPVNCgM8PmTQiJX5HuYnOPhFJe.9GUHfWuu3Tr7mx3jvZSZHLPwe', 'Johnny', 'deep', 'depp', '', 'house 45 road 5 Uttara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'deputydirectorgeneral@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(5, 5, 1, 5, 'director', '$2y$10$Iw2NGI3dW7A2jLDVLyS1s.JFnDvCplcVolzXsvv0c13tPhdVzGaVm', 'Amber', 'Heard', 'Heard', '', 'house 45 road 5 Mirpur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'director@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(6, 6, 1, 4, 'seniorprogrammer', '$2y$10$JZAHINUGRbUc8Xllh1PnmeUsg5Nii0AXMyFzCxgK29HBpVXvCJ.SK', 'Amber', 'Heard', 'Heard', '', 'house 45 road 5 Mirpur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'seniorprogrammer@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(7, 7, 1, 3, 'assistantofficer', '$2y$10$gVVldPQzzogDu5ZO9MY3P.93NuKcKlYziFMV.qAauE5LTydGDUAj6', 'Helena', 'Bonham', 'Carter', '', 'house 45 road 5 Uttara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '01714897926', 'assistantofficer@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(8, 8, 1, 2, 'assistantofficerlocal', '$2y$10$GOwzsvFQBHbsm9shg7Ym7.H4X.WEEqPDHyj6Zt8mZCedFfvjoXAiC', 'Helena', 'Bonham', 'Carter', '', 'house 45 road 5 Uttara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'assistantofficerlocal@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(9, 9, 1, 1, 'statisticalofficerlocal', '$2y$10$dCsVZ9v0mkVQszSihKJjh.w1.MmgW8cOUg7PDopv6FUDqO5Qmcsge', 'Helena', 'Bonham', 'Carter', '', 'house 45 road 5 Uttara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'statisticalofficerlocal@gmail.com', 'signature.png', NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(10, 10, NULL, NULL, 'user', '$2y$10$pa.G4dphnfvxhxYBWf9mA..pAZIVLpZI1ERp9Ksr5aWGygkH5TjiK', 'Helena', 'Akhter', 'Shima', '', 'house 45 road 5 Uttara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01671820622', 'user@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '1', NULL, 1, NULL, NULL),
(14, 10, NULL, NULL, 'atiqurrahman', '$2y$10$WlEHQU2tfAzh.dPJ0mJF5uTDzGwU9hPSrkPth5udvF9pWjOIK1iqa', 'Atiq', 'Ur', 'Rahman', '1990-11-23', NULL, NULL, '1222323665444', NULL, 19, 3, 13, 51, NULL, '1230', 'photo2021_11_23_015000_23091054.png', NULL, 'atiqur.rahman11@sebpo.com', NULL, '2021-11-23 07:50:00', NULL, NULL, 2, 1, 1, 1, NULL, NULL, 1, '2021-11-23 07:50:00', '2021-11-23 07:50:00'),
(15, 10, NULL, NULL, 'TauhidSEBPO', '$2y$10$YvJvY0/4jqXscNnmeBKI4e2SXhqLm9LuG6n74xRl9xvjx.TJoZuCa', 'Tauhid', 'Al', 'Hasan', '1994-01-07', NULL, NULL, '123456789', NULL, 19, 3, 13, 512, NULL, '1230', NULL, NULL, 'tauhid.hasan@sebpo.com', NULL, '2021-11-30 06:14:20', NULL, NULL, 3, 1, 1, 1, NULL, NULL, 1, '2021-11-30 06:14:20', '2021-11-30 06:14:20'),
(16, 10, NULL, NULL, 'Master', '$2y$10$Wgdiz1Y9JfqTrEwDDsZv1uV9Ca/o4om45HCSmhJcGYp0erZ/a7KZa', 'Md.Shah', 'Alam', 'Kabir', '1992-12-01', NULL, NULL, '4567123456', NULL, 19, 5, 44, 314, NULL, '1212', NULL, NULL, 'atiqewu012@gmail.com', NULL, '2021-12-01 02:31:44', NULL, NULL, 4, 1, 1, 1, NULL, NULL, 1, '2021-12-01 02:31:44', '2021-12-01 02:31:44');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
