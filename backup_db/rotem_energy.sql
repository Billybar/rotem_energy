-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 08:09 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rotem_energy`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `user_level` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `created_at`, `status`, `user_level`) VALUES
(21, 'miklik', 'miklik@gmail.com', '$2y$10$hQQ7ToxdLFadRkDBVStrU.L81sCzwmM4c2WMl8U1B0BNDCkLrNRc.', '2020-09-23 10:21:17', 1, 0),
(23, 'billy', 'barchaim10@gmail.com', '$2y$10$KvyMmgb8Y1M3OfdXxcM.beDcLRWjhSkl1P.cF4X3y.JRGl/zz.hi.', '2020-10-06 08:34:57', 1, 0),
(24, 'orly', 'orly@gmail.com', '$2y$10$F8KWXWcO5INeonC0KMvL5em9emrRKb/vcAFq58MKdqXIOQRtWE1U2', '2020-10-11 15:30:38', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `clean_dirt` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `hour_amt` decimal(10,1) DEFAULT NULL,
  `kw_amt` int(11) NOT NULL,
  `kilometer_amt` int(11) NOT NULL,
  `working_day` varchar(255) NOT NULL,
  `working_date` date NOT NULL,
  `employee_notes` text NOT NULL,
  `is_school` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `id_employee`, `hour_amt`, `kw_amt`, `kilometer_amt`, `working_day`, `working_date`, `employee_notes`, `is_school`) VALUES
(1, 1, '0.0', 360, 0, '1', '2020-05-03', '', '1'),
(2, 1, '0.0', 500, 0, '2', '2020-05-04', '', '1'),
(3, 1, '0.0', 520, 0, '1', '2020-05-10', '', '1'),
(4, 1, '0.0', 191, 0, '2', '2020-05-11', '', '1'),
(5, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(6, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(7, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(8, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(9, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(10, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(11, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(12, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(13, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(14, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(15, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(16, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(17, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(18, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(19, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(20, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(21, 1, '8.0', 305, 24, '4', '2020-07-01', 'holll', '1'),
(22, 1, '8.0', 305, 0, '3', '2020-07-31', '', 'no'),
(23, 3, '7.0', 203, 24, '3', '2020-08-09', '', 'yes'),
(24, 3, '7.0', 203, 24, '3', '2020-08-09', '', 'yes'),
(25, 18, '22.0', 22, 45, '2', '2020-09-13', 'test for now', 'yes'),
(26, 18, '22.0', 22, 45, '2', '2020-09-13', 'test for now', 'yes'),
(27, 21, '7.0', 678, 92, '2', '2020-09-21', 'was great', 'no'),
(28, 21, '7.0', 697, 0, '3', '2020-09-23', 'orian rule', 'no'),
(29, 21, '7.0', 479, 0, '4', '2020-09-16', '', 'no'),
(30, 21, '7.0', 305, 0, '2', '2020-09-18', '', 'no'),
(31, 21, '8.0', 305, 0, '1', '2020-09-17', '', 'no'),
(32, 21, '8.0', 305, 0, '1', '2020-09-17', '', 'no'),
(33, 21, '8.0', 305, 0, '2', '2020-09-17', '', 'no'),
(34, 21, '9.0', 305, 0, '3', '2020-09-17', '', 'no'),
(35, 21, '9.5', 305, 0, '2', '2020-09-17', '', 'no'),
(36, 21, '7.5', 360, 24, '3', '2020-09-11', '', 'no'),
(37, 21, '8.5', 360, 24, '2', '2020-09-04', '', 'no'),
(38, 21, '22.0', 360, 45, '2', '2020-09-12', 'xzxzxzxzx', 'yes'),
(39, 20, '8.0', 360, 24, '4', '2020-09-11', '', 'yes'),
(40, 23, '7.0', 672, 122, '1', '2020-10-04', 'lod dayan', 'no'),
(41, 23, '6.5', 250, 150, '2', '2020-10-05', 'afek-refet', 'no'),
(43, 23, '7.5', 124, 170, '5', '2020-10-08', 'חיפה-איינשטיין', 'no'),
(44, 23, NULL, 50, 0, '5', '2020-10-08', 'בר יהודה 195', 'yes'),
(45, 23, NULL, 50, 0, '5', '2020-10-08', 'בר יהודה 131', 'yes'),
(46, 23, NULL, 50, 0, '5', '2020-10-08', 'קדימה-החשמל', 'yes'),
(47, 21, '0.0', 124, 122, '1', '2020-10-11', 'test', 'no'),
(48, 21, '0.0', 305, 24, '3', '2020-10-19', 'test', 'no'),
(49, 21, '0.0', 305, 0, '2', '2020-10-12', 'test', 'no'),
(50, 21, '0.0', 305, 0, '2', '2020-10-12', 'test', 'no'),
(51, 21, NULL, 305, 0, '4', '2020-10-12', 'test', 'no'),
(52, 23, '8.0', 250, 0, '3', '2020-10-13', 'school - modein', 'yes'),
(53, 23, '6.0', 250, 0, '4', '2020-10-14', 'school - yavne', 'yes'),
(54, 23, '6.0', 341, 0, '3', '2020-10-27', 'נופר-מילועוף-חצי_כמות', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_employee` (`id_employee`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_employee` (`id_employee`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
