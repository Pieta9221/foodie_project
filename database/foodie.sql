-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 08:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pword` varchar(250) NOT NULL,
  `status` varchar(70) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindata`
--

INSERT INTO `admindata` (`id`, `userid`, `email`, `username`, `pword`, `status`, `phone`, `address`, `pic`, `updated_at`) VALUES
(3, 'RES491', 'ofiaku@live.com', 'Ofiaku Kitchen', '81dc9bdb52d04dc20036dbd8313ed055', 'Restaurant', '09080707070', '14 Ziks Avenue, Awka', '', '2023-02-06 06:33:57'),
(4, 'RES851', 'freshpoint@live.com', 'Fresh Point', '81dc9bdb52d04dc20036dbd8313ed055', 'Restaurant', '08123232327', '25 Faith Road, Temp-site, Awka ', '', '2023-02-05 15:45:54'),
(5, 'RES264', 'cami@live.com', 'Camis Treat', '81dc9bdb52d04dc20036dbd8313ed055', 'Restaurant', '08123232323', '23 Works Road, Ogidi', '', '2023-02-05 15:50:53'),
(7, 'ADM773', 'somk@live.com', 'Williams', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', '09067686877', '2, Mike Avenue, Awka', '', '2023-02-05 18:13:07'),
(8, 'ADM373', 'manny@live.com', 'Mannie', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', '08123232329', '2, Fagbile Street, Isheri, Lagos', '', '2023-02-05 16:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menuid` varchar(150) NOT NULL,
  `name` varchar(210) NOT NULL,
  `pic` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menuid`, `name`, `pic`, `price`, `userid`, `updated_at`) VALUES
(1, 'MENU153', 'Jollof Rice', 'pic/product-img-7.jpg', 2000, 'RES491', '2023-02-06 07:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pword` varchar(250) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `address`, `pword`, `userid`, `updated_at`) VALUES
(2, 'Mena1', 'mena67@live.com', '08123232327', '2, Fagbile Street, Isheri, Lagos', '81dc9bdb52d04dc20036dbd8313ed055', 'USER215', '2023-02-04 00:34:52'),
(3, 'Mannie09', 'mannie@live.com', '09012121212', '105, Emeka Offor Drive, Awka', '81dc9bdb52d04dc20036dbd8313ed055', 'USER484', '2023-02-05 23:01:16'),
(4, 'Swiss22', 'swiss22@live.com', '09067686877', '2, James Crescent, Apapa, Lagos', '81dc9bdb52d04dc20036dbd8313ed055', 'USER607', '2023-02-04 00:43:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindata`
--
ALTER TABLE `admindata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
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
-- AUTO_INCREMENT for table `admindata`
--
ALTER TABLE `admindata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
