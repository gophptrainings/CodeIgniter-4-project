-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 12:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `message`) VALUES
(1, 'hello world', 'ram@Mial.com', 7897897892, '23424'),
(2, 'hello world', 'rambabburi@gmail.com', 7897897892, 'Welcome'),
(3, 'hello world', 'ram@Mial.com', 7897897892, 'wefewrwerew'),
(4, 'hello world', 'ram@Mial.com', 7897897892, '3242342342'),
(5, 'hello world', 'ram@Mial.com', 7897897892, '43');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `salary` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `mobile`, `salary`, `designation`, `city`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Gophp', 'rambabburi@gmail.com', '9885776740', 25000, 'developer', 'alabama', '2020-09-29 21:38:29', '2020-09-30 13:08:57', '0000-00-00 00:00:00'),
(2, 'welcome', 'welcome@mail.com', '9885776740', 25000, 'developer', 'HYDERABAD', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'employee1', 'employee1@mail.com', '9885776740', 25000, 'developer', 'HYDERABAD', '2020-10-02 11:21:55', '2020-10-02 11:21:55', '0000-00-00 00:00:00'),
(6, 'employee2', 'employee2@mail.com', '9885776740', 35000, 'designer', 'alabama', '2020-10-02 11:22:26', '2020-10-02 11:22:26', '0000-00-00 00:00:00'),
(7, 'employee3', 'employee3@mail.com', '9885776740', 45000, 'tester', 'Nairobi', '2020-10-02 11:28:12', '2020-10-02 11:28:12', '0000-00-00 00:00:00'),
(8, 'employee4', 'employee4@mail.com', '9885776740', 45000, 'System Engineer', 'Lagos', '2020-10-02 11:28:48', '2020-10-02 11:28:48', '0000-00-00 00:00:00'),
(9, 'employee5', 'employee5@mail.com', '9885776740', 55000, 'Network Engineer', 'Bandung', '2020-10-02 11:29:53', '2020-10-02 11:29:53', '0000-00-00 00:00:00'),
(10, 'employee6', 'employee6@mail.com', '9885776740', 65000, 'Software Engineer', 'PalemBang', '2020-10-02 11:30:47', '2020-10-02 11:30:47', '0000-00-00 00:00:00'),
(11, 'employee7', 'employee7@mail.com', '9885776740', 75000, 'Junior Software Enagineer', 'Dhaka', '2020-10-02 11:36:17', '2020-10-02 11:36:17', '0000-00-00 00:00:00'),
(12, 'Employee8', 'Employee8@mail.com', '9885776740', 85000, 'Developer', 'Chattogram', '2020-10-02 11:38:22', '2020-10-02 11:38:22', '0000-00-00 00:00:00'),
(13, 'Employee9', 'Employee9@mail.com', '9885776740', 95000, 'Developer', 'Manila', '2020-10-02 11:39:04', '2020-10-02 11:39:04', '0000-00-00 00:00:00'),
(14, 'Employee10', 'Employee10@mail.com', '9885776740', 105000, 'Developer', 'Sudan', '2020-10-02 11:40:11', '2020-10-02 11:40:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `login_activity`
--

CREATE TABLE `login_activity` (
  `id` int(11) NOT NULL,
  `uniid` varchar(32) NOT NULL,
  `agent` varchar(100) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_activity`
--

INSERT INTO `login_activity` (`id`, `uniid`, `agent`, `ip`, `login_time`, `logout_time`) VALUES
(1, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-07-22 12:55:13', '2020-07-22 12:58:25'),
(2, '94f3447849f9a78cebb1babd5302f2ad', 'Chrome', '::1', '2020-07-22 12:58:41', '2020-07-22 12:58:54'),
(3, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-07-22 12:59:14', '2020-07-22 01:14:09'),
(4, '94f3447849f9a78cebb1babd5302f2ad', 'Chrome', '::1', '2020-07-22 01:14:17', '0000-00-00 00:00:00'),
(5, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-07-23 08:02:32', '2020-07-23 08:02:42'),
(6, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-07-23 11:39:15', '2020-07-23 11:39:21'),
(7, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-07-24 01:01:12', '2020-07-24 01:01:18'),
(8, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-07-31 12:45:23', '2020-07-31 12:49:20'),
(9, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-08-01 12:11:54', '2020-08-01 12:17:19'),
(10, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-08-01 12:23:02', '2020-08-01 12:52:25'),
(11, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-08-01 01:19:07', '2020-08-01 02:08:58'),
(12, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-08-01 02:09:14', '0000-00-00 00:00:00'),
(13, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-08-05 12:20:04', '2020-08-05 01:14:20'),
(14, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-08-05 01:19:35', '2020-08-05 01:35:24'),
(15, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-08-07 12:40:07', '2020-08-07 12:40:13'),
(16, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-08-07 02:51:02', '0000-00-00 00:00:00'),
(17, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-08-11 01:29:36', '2020-08-11 01:29:53'),
(18, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-08-11 01:32:26', '2020-08-11 01:32:34'),
(19, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-08-18 11:02:35', '2020-08-18 11:02:39'),
(20, '94f3447849f9a78cebb1babd5302f2ad', 'Chrome', '::1', '2020-09-09 10:03:50', '2020-09-09 10:03:54'),
(21, 'fe5d35b9a562203a55ab608fe7619028', 'Chrome', '::1', '2020-09-09 10:58:09', '2020-09-09 10:58:16'),
(22, '07e526c9bb529712580d88a6a17c6f9a', 'Chrome', '::1', '2020-09-22 11:12:08', '2020-09-22 11:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `quantity`, `created_at`) VALUES
(1, 'Shirt', 2000, 1, '2020-08-23 21:22:26'),
(2, 'Reebok Shoes', 2500, 1, '2020-08-23 21:23:20'),
(3, 'Belt', 150, 1, '2020-08-23 21:23:20'),
(4, 'Washing Machine', 15000, 1, '2020-08-23 21:24:25'),
(5, 'Nextra Cycle', 4500, 1, '2020-08-23 21:25:32'),
(6, 'Wood Desk', 1400, 1, '2020-08-23 21:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `social_login`
--

CREATE TABLE `social_login` (
  `id` int(11) NOT NULL,
  `oauth_id` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `profile_pic` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_login`
--

INSERT INTO `social_login` (`id`, `oauth_id`, `email`, `first_name`, `last_name`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, '114060942945316235553', 'rambabburi@gmail.com', 'Ram', 'Babburi', 'https://lh3.googleusercontent.com/a-/AOh14Ghiymn07RpbVNwfgw-Z9LLNAYBaVs7NnEnmo8rbXQ', '2020-07-24 11:15:33', '0000-00-00 00:00:00'),
(2, '115839598225349844194', 'gophptrainings@gmail.com', 'gophp', 'trainings', 'https://lh5.googleusercontent.com/-Wth-L06rmu8/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnIbh8T9epy8eYzPGQcZutnjcHXcA/photo.jpg', '2020-07-24 11:29:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `profile_pic` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'inactive',
  `uniid` varchar(32) NOT NULL,
  `activation_date` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `mobile`, `profile_pic`, `created_at`, `status`, `uniid`, `activation_date`, `updated_at`) VALUES
(2, 'Gophp Trainings', 'rambabburi@gmail.com', '$2y$10$E44cXlnOGhkEZSM1zwr3OOHjgH4m4.I6IS8G2q/ppaEhvyQn1l2fe', '7897897894', 'http://localhost/ci4/public/profiles/1596304316_4db64269db2f44d8ec2d.jpg', '2020-07-19 23:38:31', 'active', '07e526c9bb529712580d88a6a17c6f9a', '2020-07-19 11:08:31', '2020-08-07 03:45:38'),
(4, 'gophp', 'gophptrainings@gmail.com', '$2y$10$HCTg5Bqhjqtv8zm19E4Ol.TRPz6zVlNPMOHbUbUL8vTmT3SINwd5W', '7897897892', '', '2020-07-20 20:45:49', 'active', '94f3447849f9a78cebb1babd5302f2ad', '2020-07-20 10:15:49', '0000-00-00 00:00:00'),
(5, 'Welcome', 'welcome@mail.com', '$2y$10$WriJbCo4n.kRGeTpJBh3IOgKI5mFGt6Bf.z1ILT7s5D4vitddmwCy', '9885776740', '', '2020-09-10 09:23:17', 'active', 'fe5d35b9a562203a55ab608fe7619028', '2020-09-09 10:53:17', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `login_activity`
--
ALTER TABLE `login_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_login`
--
ALTER TABLE `social_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login_activity`
--
ALTER TABLE `login_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_login`
--
ALTER TABLE `social_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
