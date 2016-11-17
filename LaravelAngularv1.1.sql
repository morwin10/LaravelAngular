-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2016 at 11:10 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `href`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Neckties', 'neckties', 'clothing2', '2016-01-19 22:36:38', '0000-00-00 00:00:00'),
(2, 'Watches', 'watches', 'clock232', '2016-01-19 22:31:10', '0000-00-00 00:00:00'),
(3, 'Women''s shoes', 'womens_shoes', 'female145', '2016-01-19 22:30:57', '0000-00-00 00:00:00'),
(4, 'Smartphones', 'smartphones', 'phone391', '2016-01-19 22:30:52', '0000-00-00 00:00:00'),
(5, 'Suits', 'suits', 'suit', '2016-01-19 22:30:11', '0000-00-00 00:00:00'),
(6, 'Dresses', 'dresses', 'dress3', '2016-01-19 22:31:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `menu_url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `menu_url`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, '/', 'Home', '<div>My Home Page <br> I am now in my Home page</div>', '2016-01-13 02:19:52', '0000-00-00 00:00:00'),
(2, 'about', 'About', 'About <h1>Hi Moti !</h1>', '2015-12-11 08:38:28', '0000-00-00 00:00:00'),
(3, 'services', 'Services', 'Services', '2015-12-07 16:36:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `href` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `href`, `link`, `created_at`, `updated_at`) VALUES
(1, '/', 'Home', '2015-12-01 20:42:17', '0000-00-00 00:00:00'),
(2, 'about', 'About', '2015-12-01 20:42:30', '0000-00-00 00:00:00'),
(3, 'services', 'Services', '2015-12-01 20:42:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categorie_id`, `name`, `img`, `article`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nike Zoom Hypercross TR2 ', 'NIKE-ZOOM-HYPERCROSS-TR2-749362_001_A_PREM.jpg', 'The Nike Zoom Hypercross TR2 Men''s Training Shoe offers superior stability and lightweight impact protection with Flywire technology and Nike Zoom Air units.', 130, '2016-01-25 11:59:33', '0000-00-00 00:00:00'),
(2, 1, 'NIKE ZOOM SPEED TRAINER 3', 'NIKE-ZOOM-SPEED-TR-2015-804401_040_A_PREM.jpg', 'The Nike Zoom Speed Trainer 3 Men''s Training Shoe is made with low-profile cushioning and durable mesh for impact protection and breathability while you work out. Synthetic bands integrate with the laces, keeping your foot stable and locked in place.', 100.75, '2015-12-02 14:08:15', '0000-00-00 00:00:00'),
(3, 2, 'Northfield', 'SS12_M_K70012_NORTHFIELD_MAIN.PNG', 'Beneath its rugged exterior the Main Route Northfield hides a plethora of performance features. These plain toe men’s dress casual shoes feature Hydro-Shield® waterproof construction, waterproof leather that helps keep feet dry, Polyeurethane Kinetic Air Circulator for underfoot cushioning and active air circulation, and ADIPRENE® by adidas sport technology for all-day comfort. Whether you’re in a casual office or going for a night out on the weekend this classic pattern will take you there.', 75, '2015-12-02 14:20:21', '0000-00-00 00:00:00'),
(4, 2, 'ActiveFlex RocSports Lite Leather Mudguard', 'FW15_M_M78334_ACTIVFLXRCSPTLTHRMDGD_MAIN.PNG', 'We made the ActiveFlex RocSports Lite Leather Mudguard with tough weather conditions in mind. This men’s shoe features stitch-to-sole construction and an EVA outsole, so it’s lightweight, durable and flexible enough to withstand whatever your weekend – and mother nature—can send its way. Dual-density IMEVA and ADIPRENE® by adidas sport technology provide shock absorption to help you stay comfortable and help reduce fatigue.', 82.5, '2015-12-02 14:20:21', '0000-00-00 00:00:00'),
(5, 3, 'SKECHERS GOWALK 3 - SOLAR', '54040_NVLM.jpg', 'The next evolution of athletic walking comes in the Skechers GOwalk 3 - Solar. Features GOmat Technology with high-rebound cushioning. Designed with Skechers Performance technology and materials specifically for athletic walking. Skech Knit mesh fabric upper in a lace up technical walking sneaker design.', 80, '2015-12-02 14:25:45', '0000-00-00 00:00:00'),
(6, 3, 'SKECHERS GOWALK 3 - EQUALIZE', '54041_NVGY.jpg', 'The next evolution of athletic walking comes in the Skechers GOwalk 3 - Equalize. Features Goga Mat Technology with high-rebound cushioning. Designed with Skechers Performance technology and materials specifically for athletic walking. Soft suede and mesh fabric upper in a slip on technical walking sneaker design. GO Pillars on sole.', 75, '2015-12-02 14:25:45', '0000-00-00 00:00:00'),
(7, 1, 'Morwin winkler', 'NIKE-ZOOM-SPEED-TR-2015-804401_040_A_PREM.jpg', 'The Nike Zoom Speed Trainer 3 Men''s Training Shoe is made with low-profile cushioning and durable mesh for impact protection and breathability whilethe laces, keeping your foot stable and locked in place. winkler', 100.75, '2016-01-25 11:55:08', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
