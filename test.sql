-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2020 at 01:22 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'rangga', '$2y$10$sh8M9/cAsnreJUlHjPYKrutM0knDfXkKJBPOUTTQ1aqDjQ/yu8X6m'),
(2, 'ade', '$2y$10$c9.x7WApl84NOl7r1/4f1uoj08A8TzQRvKojKGR//bHCkA4M.JKE6'),
(3, 'hasing', '$2y$10$5gnuH7krKKFGZZku/L5IBOyPwzyqlouUH35t1MrkOe0dCtAzKl62a');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `kd_komentar` int(11) NOT NULL,
  `comment` varchar(144) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `kd_terbit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`kd_komentar`, `comment`, `admin_id`, `kd_terbit`) VALUES
(21, 'ealah', 2, 13),
(22, 'gils', 1, 13),
(23, 'asoyy', 1, 11),
(24, 'teas', 3, 13),
(25, 'asuu', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `terbitan`
--

CREATE TABLE `terbitan` (
  `kd_terbit` int(11) NOT NULL,
  `post` varchar(144) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terbitan`
--

INSERT INTO `terbitan` (`kd_terbit`, `post`, `admin_id`, `tanggal`) VALUES
(11, 'capeee', 1, '2020-03-22 13:17:06'),
(12, 'wooyyy', 2, '2020-03-22 14:02:43'),
(13, 'covid wow', 3, '2020-03-22 14:02:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`kd_komentar`),
  ADD KEY `fk_admin` (`admin_id`),
  ADD KEY `fk_terbitan` (`kd_terbit`);

--
-- Indexes for table `terbitan`
--
ALTER TABLE `terbitan`
  ADD PRIMARY KEY (`kd_terbit`),
  ADD KEY `foreignkey_admin` (`admin_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `fk_terbitan` FOREIGN KEY (`kd_terbit`) REFERENCES `terbitan` (`kd_terbit`);

--
-- Constraints for table `terbitan`
--
ALTER TABLE `terbitan`
  ADD CONSTRAINT `foreignkey_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
