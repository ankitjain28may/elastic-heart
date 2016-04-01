-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2016 at 11:02 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `state`) VALUES
(1, 'Delhi', 'Delhi'),
(2, 'Mumbai', 'Maharashtra'),
(3, 'Noida', 'Uttar Pradesh');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bath` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`, `image`, `type`, `price`, `address`, `bed`, `bath`, `area`, `lat`, `lon`, `city_id`) VALUES
(1, 'Modern Residence', '1-1-thmb.png', 'For Sale', '1,550,000', 'Banajarahills, Rd No.2, Hyderabad', '3', '2', '3430 Sq Ft', '40.6123489', '-73.9280465', 1),
(2, 'Hauntingly Beautiful Estate', '2-1-thmb.png', 'For Rent', '1,750,000', '169 Warren St, Brooklyn, NY 11201, USA', '2', '2', '4430 Sq Ft', '40.688032', '-73.996454', 1),
(3, 'Sophisticated Residence', '3-1-thmb.png', 'For Sale', '1,340,000', '38-62 Water St, Brooklyn, NY 11201, USA', '2', '3', '2640 Sq Ft', '40.702627', '-73.989689', 2),
(4, 'House With a Lovely Glass-Roofed Pergola', '4-1-thmb.png', 'For Sale', '1,930,000', 'Wunsch Bldg, Brooklyn, NY 11201, USA', '3', '2', '2800 Sq Ft', '40.694345', '-73.985220', 2),
(5, 'Luxury Mansion', '5-1-thmb.png', 'For Rent', '₹2,350,000', '95 Butler St, Brooklyn, NY 11231, USA', '2', '2', '2750 Sq Ft', '40.686848', '-73.990097', 3),
(6, 'Modern Residence', '1-1-thmb.png', 'For Sale', '1,550,000', 'Banajarahills, Rd No.2, Hyderabad', '3', '2', '3430 Sq Ft', '40.563487', '-73.0080455', 3),
(7, 'Hauntingly Beautiful Estate', '2-1-thmb.png', 'For Rent', '1,750,000', '169 Warren St, Brooklyn, NY 11201, USA', '2', '2', '4430 Sq Ft', '40.8042', '-73.039972', 3),
(8, 'Sophisticated Residence', '3-1-thmb.png', 'For Sale', '1,340,000', '38-62 Water St, Brooklyn, NY 11201, USA', '2', '3', '2640 Sq Ft', '41.702620', '-72.989682', 2),
(9, 'House With a Lovely Glass-Roofed Pergola', '4-1-thmb.png', 'For Sale', '1,930,000', 'Wunsch Bldg, Brooklyn, NY 11201, USA', '3', '2', '2800 Sq Ft', '41.694355', '-73.085229', 1),
(10, 'Luxury Mansion', '5-1-thmb.png', 'For Rent', '₹2,350,000', '95 Butler St, Brooklyn, NY 11231, USA', '2', '2', '2750 Sq Ft', '42.686838', '-72.990078', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_10_171202_create_location_table', 1),
('2016_03_10_201618_add_city_column', 2),
('2016_03_10_202008_remove_city_column', 3),
('2016_03_10_202223_create_city_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `subscribe` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
