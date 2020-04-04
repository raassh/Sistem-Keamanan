-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 02:02 PM
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
  `admin_id` varchar(14) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
('1', 'rangga', '$2y$10$sh8M9/cAsnreJUlHjPYKrutM0knDfXkKJBPOUTTQ1aqDjQ/yu8X6m'),
('2', 'ade', '$2y$10$c9.x7WApl84NOl7r1/4f1uoj08A8TzQRvKojKGR//bHCkA4M.JKE6'),
('3', 'hasing', '$2y$10$5gnuH7krKKFGZZku/L5IBOyPwzyqlouUH35t1MrkOe0dCtAzKl62a');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `kd_komentar` varchar(14) NOT NULL,
  `comment` varchar(144) NOT NULL,
  `admin_id` varchar(14) NOT NULL,
  `kd_terbit` varchar(14) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`kd_komentar`, `comment`, `admin_id`, `kd_terbit`, `tanggal`) VALUES
('0', 'akhirnyaaaa', '1', '5e872b6aa719d', '2020-04-04 11:39:50'),
('21', 'ealah', '2', '13', '2020-04-04 11:39:50'),
('2147483647', 'apa coba', '1', '32s1d3f', '2020-04-04 11:39:50'),
('22', 'gils', '1', '13', '2020-04-04 11:39:50'),
('23', 'asoyy', '1', '11', '2020-04-04 11:39:50'),
('24', 'teas', '3', '13', '2020-04-04 11:39:50'),
('25', 'asuu', '1', '11', '2020-04-04 11:39:50'),
('kdk0001', 'piling gud lakasud', '2', 'kdt0001', '2020-04-04 11:40:12'),
('kdk0002', 'boleh', '1', 'kdt0003', '2020-04-04 11:47:15'),
('kdk0003', 'error lagi:(', '1', 'kdt0003', '2020-04-04 11:48:12'),
('kdk0004', 'cob yang ini', '1', 'kdt0001', '2020-04-04 11:48:35'),
('kdk0005', 'mungkin ini bener', '1', 'kdt0001', '2020-04-04 11:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `terbitan`
--

CREATE TABLE `terbitan` (
  `kd_terbit` varchar(14) NOT NULL,
  `post` varchar(144) NOT NULL,
  `admin_id` varchar(14) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terbitan`
--

INSERT INTO `terbitan` (`kd_terbit`, `post`, `admin_id`, `tanggal`) VALUES
('11', 'capeee', '1', '2020-03-22 13:17:06'),
('12', 'wooyyy', '2', '2020-03-22 14:02:43'),
('13', 'covid wow', '3', '2020-03-22 14:02:43'),
('32s1d3f', 'apa iniii', '1', '2020-04-02 16:01:41'),
('5e872b6aa719d', 'taiiii', '1', '2020-04-03 12:26:18'),
('5e8731bd22bc4', 'cobaa', '1', '2020-04-03 12:53:17'),
('a2sd1', 'coba yaa', '1', '2020-04-03 12:13:07'),
('kdt0001', 'halo epribadeh', '1', '2020-04-04 11:11:26'),
('kdt0002', 'haloo salken', '1', '2020-04-04 11:33:31'),
('kdt0003', 'post lagi yaa', '1', '2020-04-04 11:34:04');

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
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
