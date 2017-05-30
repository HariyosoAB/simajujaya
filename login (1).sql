-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 08:23 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simajujaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `hak_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `password`, `user_email`, `remember_token`, `hak_akses`) VALUES
(1, '$2y$10$Yw9rdnZ6axNlE.FoYLoaE.p9LwnB4e0RYBzSRILXF5SdjRN8n0Q7y', 'anna@majujaya.co.id', 'IlTCe8FI4Fiqce66araV3tKg5YRuXg4xgunlTUmG2ZbsPaI3jQsOSik16eGt', 'sekretaris'),
(2, '$2y$10$Yw9rdnZ6axNlE.FoYLoaE.p9LwnB4e0RYBzSRILXF5SdjRN8n0Q7y', 'ari@majujaya.co.id', 'nctG3hCsaLsyBBMVEiVf4Fd5MFF1wpDs3Hrsj0QPsk8gJ5IRvi0wgOkYPM4z', 'gudang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
