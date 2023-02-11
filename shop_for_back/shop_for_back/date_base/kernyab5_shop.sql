-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2022 at 02:35 PM
-- Server version: 5.7.21-20-beget-5.7.21-20-1-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kernyab5_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--
-- Creation: Jan 16, 2022 at 08:56 PM
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `password` varchar(128) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `login`, `firstname`, `lastname`, `phone`, `password`, `admin`) VALUES
(1, 'admin', 'Адміністратор', 'Сайту', '+380987654321', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, '123', '123', '123', '123', '202cb962ac59075b964b07152d234b70', 0),
(3, 'tester', 'Just', 'Programmer', '+3333333333', 'f5d1278e8109edd94e1e4197e04873b9', 0),
(4, 'test', 'test', 'test', '1234', '098f6bcd4621d373cade4e832627b4f6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--
-- Creation: Jan 16, 2022 at 08:56 PM
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `ip` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id`, `user_id`, `product_id`, `count`, `ip`) VALUES
(7, 1, 2, 1, 'registered'),
(8, 1, 3, 1, 'registered'),
(9, 0, 2, 1, 'registered'),
(10, 0, 3, 1, 'registered'),
(11, 2, 2, 1, 'registered'),
(14, 4, 3, 1, 'registered');

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--
-- Creation: Jan 16, 2022 at 08:56 PM
--

DROP TABLE IF EXISTS `catalog`;
CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(2048) NOT NULL,
  `category` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `title`, `description`, `price`, `image`, `category`) VALUES
(2, 'Apple Macbook 2020', 'Маєш гроші, купи макбук', 40000, 'c81e728d9d4c2f636f067f89cc14862c.jpg', 'laptop'),
(3, 'Xiaomi Redmi 10', 'Xiaomi Redmi 10 4/64GB Grey', 5199, 'eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg', 'mobile'),
(4, 'Lenovo A-100', 'Дуже хороший ноутбук, рекомендуємо вам його купити', 9999, 'eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg', 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--
-- Creation: Jan 16, 2022 at 08:56 PM
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(512) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `message`, `date`) VALUES
(1, 3, 'Hello', '0000-00-00 00:00:00'),
(2, 2, 'привіт', '0000-00-00 00:00:00'),
(3, 3, 'Дороу', '0000-00-00 00:00:00'),
(4, 3, 'Перший чат ^_^', '0000-00-00 00:00:00'),
(5, 3, 'Ну що?', '0000-00-00 00:00:00'),
(6, 3, 'О', '0000-00-00 00:00:00'),
(7, 3, 'Test', '0000-00-00 00:00:00'),
(8, 2, '123', '0000-00-00 00:00:00'),
(9, 2, '123', '0000-00-00 00:00:00'),
(10, 3, 'Норм\n', '0000-00-00 00:00:00'),
(11, 3, 'Норм\n', '0000-00-00 00:00:00'),
(12, 3, 'LOL', '0000-00-00 00:00:00'),
(13, 4, 'Я купив ноутбук, але він не працює', '0000-00-00 00:00:00'),
(14, 2, 'Привіт, все ок', '0000-00-00 00:00:00'),
(15, 2, '1234', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`login`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
