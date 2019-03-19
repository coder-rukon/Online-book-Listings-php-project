-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 04:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookfinder`
--
CREATE DATABASE IF NOT EXISTS `bookfinder` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bookfinder`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(30) NOT NULL,
  `name` text,
  `location` varchar(200) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `description` text,
  `uploaded_by` int(30) DEFAULT NULL,
  `thumbnail` varchar(200) DEFAULT NULL,
  `contact_details` text,
  `type` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `edition` varchar(100) DEFAULT NULL,
  `file_url` varchar(200) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `location`, `author`, `description`, `uploaded_by`, `thumbnail`, `contact_details`, `type`, `status`, `edition`, `file_url`, `language`, `updated_at`, `created_at`) VALUES
(5, 'Java', '7', 'Md RUkon Shekh', 'Java soft book description', NULL, 'thumbnail/bv0BtfRFRptJ1WVt9bRgazR7M2U3BosF26KVhZsf.png', '01733435951', 'soft_copy', 'publish', '10th', 'book_file/fpMQMk5mbhRkTYvVvXneF2wohnaZWw1Hi79ICzb4.txt', NULL, '2019-03-10 13:19:20', '2019-03-10 10:45:27'),
(6, 'Md Rukon UPdate', '5', 'Author', 'sdfdsf', NULL, 'thumbnail/OttDhelvXr6D1jvoKiZDaqE727RyxYABcsqN9XDn.gif', 'dsfdsfdsf', 'hard_copy', 'pending', '10th', 'book_file/5S71NVQbKkfYUj9mZ8NP0JN1UonemXnLa77dCaD7.gif', NULL, '2019-03-10 11:09:44', '2019-03-10 11:09:44'),
(7, 'Md Rukon UPdate', '5', 'Author', 'sdfdsf', NULL, 'thumbnail/hjhtwblBCPG959KCBmkTjOgKs9kNMtOh75zIlbjZ.gif', 'dsfdsfdsf', 'hard_copy', 'pending', '10th', 'book_file/An7JizUjnqNYE8yZTOpyvu0EFoQhYPX6aWEnmdng.gif', NULL, '2019-03-10 11:10:16', '2019-03-10 11:10:16'),
(8, 'Md Rukon UPdate', '5', 'Author', 'sdfdsf', NULL, 'thumbnail/lHad223Rh7hF56Vt955EWgJxn8Yorgyhbv5115nO.gif', 'dsfdsfdsf', 'hard_copy', 'pending', '10th', 'book_file/UPTDxYpRxlrLo7kwwbR4ReUZ96KvsJnDGDWjELVe.gif', NULL, '2019-03-10 11:10:54', '2019-03-10 11:10:54'),
(9, 'Book Name', '5', 'Book Author', 'sdfds', NULL, 'thumbnail/X7pWaSh8zvmOYC7EfxPvWXHih9TxYPrYejen9goz.jpeg', 'C', 'hard_copy', 'pending', '10th', 'book_file/Gpa8LNaPS8bcAUZsGTPcTr8YlEQqT2IjJlaHdHO8.docx', NULL, '2019-03-10 12:32:33', '2019-03-10 11:18:43'),
(15, 'C ++ Basic', '7', 'Ploter', 'test', 23, 'thumbnail/mLs7VfgshYEdyYYckK4xi1YQAEKoTodkDm5Dd4Ck.gif', '01733435951', 'hard_copy', 'publish', '12th', NULL, NULL, '2019-03-14 21:11:27', '2019-03-14 20:34:48'),
(16, 'Php 7', '8', 'Md RUkon Shekh', 'sdfdsf', 23, 'thumbnail/szfmu2aPa8YfxWRKmcLm650jzwau2VZ4M8fz2M6h.jpeg', '0173343565', 'soft_copy', 'publish', '10th', NULL, NULL, '2019-03-14 21:10:57', '2019-03-14 20:42:52'),
(17, 'PDF Book', '8', 'rukon', 'satea', 23, 'thumbnail/NwQ2t7qiDgjOCRMWeZKVI8vwP9MvilDWepSPA9NF.jpeg', '01733435951', 'soft_copy', 'pending', '12', 'book_file/aaX8i38zH1WIhKf6t7Nru91d88qFOqhqnKkbcZKk.pdf', NULL, '2019-03-16 09:23:48', '2019-03-16 09:23:48'),
(18, 'New book', '7', 'Md RUkon Shekh', 'sdfdsf', 29, 'thumbnail/yfgwX2r4ZJYVf0Db1wk889NpRcVjg9yWI5BKHgbw.jpeg', '01', 'soft_copy', 'publish', '10th', 'book_file/b3PgB83oGLF0GSVZtrvgS3vdFx9Q9qXCMVjiB8J1.pdf', NULL, '2019-03-19 14:59:19', '2019-03-19 14:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `parent` int(20) DEFAULT NULL,
  `thumbnail` varchar(200) DEFAULT NULL,
  `updated_at` varchar(20) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `show_in_home` varchar(5) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `thumbnail`, `updated_at`, `created_at`, `show_in_home`) VALUES
(19, 'Mathematics', NULL, 'fa-keyboard', '2019-03-13 17:52:39', '2019-03-10 09:08:46', 'yes'),
(20, 'Computer science', NULL, 'fa-desktop', '2019-03-13 17:50:40', '2019-03-10 09:09:59', 'yes'),
(21, 'Socaial Science', NULL, 'fa-book', '2019-03-13 17:51:46', '2019-03-13 17:21:57', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `category_relation`
--

CREATE TABLE `category_relation` (
  `book_id` int(30) DEFAULT NULL,
  `category_id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_relation`
--

INSERT INTO `category_relation` (`book_id`, `category_id`) VALUES
(8, 19),
(11, 19),
(9, 20),
(5, 19),
(16, 20),
(15, 20),
(17, 21),
(17, 19),
(17, 20),
(18, 20);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `parent` int(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `parent`, `type`) VALUES
(4, 'Mirpur', NULL, NULL),
(5, 'Dhanmondi', NULL, NULL),
(6, 'Dhaka', NULL, NULL),
(7, 'Jamalpur', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'author',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `facebook`, `twitter`, `google`, `picture`, `address`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'red@gmail.com', NULL, 'sddsf', NULL, '2019-02-10 04:17:32', '2019-02-10 04:17:32'),
(3, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'reddd@gmail.com', NULL, 'sddsf', NULL, '2019-02-10 04:19:20', '2019-02-10 04:19:20'),
(4, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'redad@gmail.com', NULL, '$2y$10$Jz9Ac5rL8LPQzTE7jo2R1OA0Kl6.HeuNcz31XngOxi7jad8TPb5NK', NULL, '2019-02-10 04:22:38', '2019-02-10 04:22:38'),
(5, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'red@gmail.com', NULL, '$2y$10$VH2zzyhvBtTE7ITfXLCP2uh7LOc3753OjYJtjiHjQg3/8fZLuTX8e', 'fyWDSWCn4tWCrh4pWtSNUGJqk7HeKeLZgTftCKpzaxFqNLJEPVx4LCxkzkEH', '2019-02-10 04:25:02', '2019-02-10 04:25:02'),
(6, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'red@gmail.coma', NULL, '$2y$10$.psLDBOlRnj0KKtONFidHOPNkzCmOqTmGdUUr70beQm7WDtTL/IOK', NULL, '2019-02-10 04:34:02', '2019-02-10 04:34:02'),
(7, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'red@gmail.comad', NULL, '$2y$10$5zPgAcHyCfCeyWz/SzNyNOiNQUB8lysYvHcvQYvEP6uTLVyag9ws.', NULL, '2019-02-10 04:38:39', '2019-02-10 04:38:39'),
(8, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'redadfsf@gmail.com', NULL, '$2y$10$jsRUoilrexPNZTnkq0c7/ei7vgW.wTh4E/eCORTGifiGCkdVBfUOy', NULL, '2019-02-10 04:39:54', '2019-02-10 04:39:54'),
(9, 'author', NULL, NULL, NULL, NULL, NULL, 'adfdfa', NULL, 'afdsfdsf@gmail.com', NULL, '$2y$10$cGR.E9q3ZobGI4Yl1pdKFu7jmwNn1Oo/3zSvFiYRSDeRAMi83Ofwi', NULL, '2019-02-10 04:47:33', '2019-02-10 04:47:33'),
(10, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'reaadddad@gmail.com', NULL, '$2y$10$/bqH6boeXDxFMusP5PWFHe5mJ2404aUtQ36B0mzi8VaVVyTzvjyV.', NULL, '2019-02-10 05:01:20', '2019-02-10 05:01:20'),
(11, 'author', NULL, NULL, NULL, NULL, NULL, 'teaaffd', NULL, 'redfsadfdsfd@gmail.com', NULL, '$2y$10$U2iSbNBnbnPk5LtYvROGuOAzU71fTrVrfjjfRIys0NhnrVxSCT6gG', NULL, '2019-02-10 05:15:12', '2019-02-10 05:15:12'),
(12, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'red@gmadfail.com', NULL, '$2y$10$LcjJmwsVINDX2JlPZnM0Geahej9qbmYj7qOmwScYyTYE89ppmFNcK', 'Nri5x6RWQEawyjGqscAH9THcaUCb5jDws2KlkNWFlP9kOLAWfWfYgVg2LT4J', '2019-02-10 05:44:50', '2019-02-10 05:44:50'),
(13, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'red@gmadfail.com', NULL, '$2y$10$ook3O0BkXgR1hfcIMfqls.dlLFiDkZZRbwKV.JKK2ehh0FWCK3HRS', NULL, '2019-02-10 05:46:21', '2019-02-10 05:46:21'),
(14, 'author', NULL, NULL, NULL, NULL, NULL, 'sfds', NULL, 'sfdsaf@gad.com', NULL, '$2y$10$DkDrXSzZnYqtSykXm.zONO1GM1.NudHTBVid29Ter41ZdgdUI.y22', NULL, '2019-02-10 05:54:23', '2019-02-10 05:54:23'),
(15, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'redsfsfsdf@gmadfail.com', NULL, '$2y$10$lJcr.XjBFSw1gHtT2QltDubmCxDqWPlwQnOMdv4IgCGG.FG2VZj62', NULL, '2019-02-10 05:59:30', '2019-02-10 05:59:30'),
(18, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'adfdfs@gafda.com', NULL, '$2y$10$LQBF13iXlUn5vQx3YrQb2.2jkbBdcCWnriUyu/m93E7qi6BhgIubq', NULL, '2019-02-10 06:22:21', '2019-02-10 06:22:21'),
(19, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'red2@gmadfail.com', NULL, '$2y$10$3eBmQrW9v.9P9qDJXeF4P..NYgBwBqk2amPn7TT5iytpc0RXBo7w2', NULL, '2019-02-10 06:32:44', '2019-02-10 06:32:44'),
(20, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'red5@gmadfail.com', NULL, '$2y$10$zdOFzkn62VfQCBZyXji4QO7gEp2Z499DcGWSbcsin03yG8z6hu0Vy', NULL, '2019-02-10 06:35:19', '2019-02-10 06:35:19'),
(21, 'author', NULL, NULL, NULL, NULL, NULL, 'red@gmadfail.com', NULL, 'red6@gmadfail.com', NULL, '$2y$10$GUZsnaLyJ4mK5lqxwB8uyuOf7tJ62FDqvIUnErQTPLLVKKc2hhjV.', NULL, '2019-02-10 06:37:01', '2019-02-10 06:37:01'),
(22, 'author', NULL, NULL, NULL, NULL, NULL, 'red@gmadfail.com', NULL, 'red9@gmadfail.com', NULL, '$2y$10$8fBoV5gi1knUhpJup.p4BOkOj9/49ZphE/SvfBZY1AwHxxvkyP8Li', NULL, '2019-02-10 06:38:53', '2019-02-10 06:38:53'),
(23, 'admin', 'Facebook', 'Twitter', 'Google Plus', 'http://127.0.0.1:8000/storage/profile-picture/rjPigcfc1yMg51n0JcH8GWCLWz6dDhEnT97xFPYe.jpeg', 'Address', 'Md Rukon Shekh', '01733435951', 'fahad@gmail.com', NULL, '$2y$10$3KsJn2FLuVrMYdiCSojKPO3Haq6/wkOb4zFCnLgJsyh2CrVhE03lm', 'ZBoDNbdZLvtuZjEdpNN83TYAvKHqW8w8eU6xrrxcxHYUpFKP5wjG4z37lOyt', '2019-02-10 07:05:56', '2019-03-13 15:31:37'),
(24, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Skhe', NULL, 'rukonshekh@gmail.com', NULL, '$2y$10$0X/8zmH.Dp9iDviZ5PMdgOR73LU9QrKxcCi.ChgM9n1RBJjJN9eG2', 'PoSePdeMPhmfcIx6UY7tV56Jl4Wl1MYXalFZ20VFfSQU3SwJANij237jOaRu', '2019-02-10 07:08:46', '2019-02-10 07:08:46'),
(25, 'admin', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'fahasd@gmail.com', NULL, '$2y$10$7t88jmnELK8DdL5sWCZeUuZPlRq9GxqDDzmdmhpJIM4fWBjQvUNki', 'B4YXm8Z8jmIxAjJtrcp54QSK6KlAhLjpBHAeZSclEiYonMu79y87iPP3LmbI', '2019-02-10 07:24:07', '2019-02-10 07:24:07'),
(28, 'author', NULL, NULL, NULL, NULL, NULL, 'Md Rukon Shekh', NULL, 'red@gmail.com', NULL, '$2y$10$5pZo5IdKgoT7VWApqxbs6uJBG6r6gYirRRbQs90XdKNRDaK4Hg6cC', NULL, '2019-03-13 07:33:59', '2019-03-13 07:33:59'),
(29, 'author', 'http://facebook.com', 'http://twitter.com', 'http://google.com', 'http://127.0.0.1:8000/storage/profile-picture/1Wi6wyNzGh0zISfOlD3Shz4XJ4VByfRuO09WRpp1.jpeg', NULL, 'Assad', NULL, 'asad@gmail.com', NULL, '$2y$10$w9sSDU/3RhuaNVyNDzigx.WEpJinAJVq639kYp/0etpwUSyssh502', 'JXz6MUaWWnhggeZih9yq47RPs8SHQALo9UnC97JnXjwePrKD0HbLfOS4EcTh', '2019-03-16 04:43:22', '2019-03-16 04:56:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
