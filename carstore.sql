-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2022 at 02:19 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toolstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `user_id` int NOT NULL,
  `model` varchar(30) NOT NULL,
  `quota` int NOT NULL,
  PRIMARY KEY (`user_id`,`model`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `model`, `quota`) VALUES
(1, 'LCS1240', 1),
(1, 'BDECS300C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `image` varchar(30) NOT NULL,
  `model` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `image`, `model`, `price`, `description`, `quantity`) VALUES
(6, 'Makita', 'Makita-1.jpg', 'XPK01Z', 169, 'LITHIUM-ION CORDLESS UPC: 088381662673 Weight: 7.5 lbs', 100),
(5, 'DeWalt', 'DeWalt-5.jpg', 'DCD130B', 800, 'MAX* MIXER/DRILL UPC: 885911561006 Weight: 7.75 lbs', 100),
(4, 'DeWalt', 'DeWalt-45.jpg', 'DCD703F1', 1450, 'XTREME™ 12V MAX* Brushless Cordless 5-in-1 Drill/Driver Kit', 100),
(2, 'DeWalt', 'DeWalt-2.jpg', 'DCS391B', 499, 'CIRCULAR SAW UPC: 885911262354 Weight: 7.4 lbs', 100),
(3, 'DeWalt', 'DeWalt-3.jpg', 'DCS331B', 1499, 'MAX* JIG SAW UPC: 885911262316 Weight: 5.6 lbs', 100),
(1, 'DeWalt', 'DeWalt-1.jpg', 'DCCS620B', 1799, 'BRUSHLESS CHAINSAW UPC: 885911524056 Weight: 9.85 lbs', 100),
(7, 'Makita', 'Makita-2.jpg', 'XSL02Z', 659, 'DUAL SLIDE COMPOUND UPC: 088381699648 Weight: 27.5 lbs', 100),
(8, 'Makita', 'Makita-3.jpg', 'HR2641', 189, 'AVT ROTARY HAMMER UPC: 088381687485 Weight: 23.1 lbs', 100),
(9, 'Makita', 'Makita-4.jpg', '2012NB', 749, 'PLANER UPC: 088381032858 Weight: 67.6 lbs', 100),
(10, 'Makita', 'Makita-5.jpg', 'XPH03MB', 299, 'HAMMER DRIVER-DRILL UPC: 088381807258 Weight: 16 lbs', 100),
(11, 'BOSCH', 'Bosch-1.jpg', 'PLH181B', 199, 'PLANER BARE TOOL UPC: 000346434125 Weight: 6.14 lbs', 100),
(12, 'BOSCH', 'Bosch-2.jpg', 'GAS18V-02N', 99, 'HANDHELD VACUUM CLEANER UPC: 000346498189 Weight: 2.9 lbs', 99),
(13, 'BOSCH', 'Bosch-3.jpg', 'ROS65VC-5', 249, 'INCH REAR HANDLE UPC: 000346426984 Weight: 7.2 lbs', 100),
(14, 'BOSCH', 'Bosch-4.jpg', 'GDX18V-1600B12', 149, 'BIT/SOCKET IMPACT UPC: 000346617016 Weight: 6.67 lbs', 100),
(15, 'BOSCH', 'Bosch-5.jpg', 'BH2770VCD', 1899, 'HEX BRUTE TURBO UPC: 000346441031 Weight: 131 lbs', 100),
(16, 'Milwaukee', 'Milwaukee-1.jpg', '2656-22CT', 199, 'HEX IMPACT DRIVER UPC: 045242345588 Weight: 9.12 lbs', 100),
(17, 'Milwaukee', 'Milwaukee-2.jpg', '2317-21M12', 799, 'SPECTOR FLEX UPC: 045242344253 Weight: 8.55 lbs', 100),
(18, 'Milwaukee', 'Milwaukee-3.jpg', '5339-21SDS', 749, 'SDS-MAX UPC: 045242023981 Weight: 38 lbs', 100),
(19, 'Milwaukee', 'Milwaukee-4.jpg', '2678-22BGM18', 2199, 'FORCE LOGIC 22BG UPC: 045242339396 Weight: 17.43 lbs', 100),
(20, 'Milwaukee', 'Milwaukee-5.jpg', '2572B-21M12', 399, 'CLEANER AIR GUN KIT-B UPC: 045242506859 Weight: 22 lbs', 100),
(21, 'Black&Decker', 'Black&Decker-1.jpg', 'CM2060C', 399, 'MAX POWERSWAP UPC: 885911499057 Weight: 58.35 lbs', 99),
(22, 'Black&Decker', 'Black&Decker-2.jpg', 'BDECS300C', 49, 'CIRCULAR SAW UPC: 885911479905 Weight: 9.35 lbs', 97),
(23, 'Black&Decker', 'Black&Decker-3.jpg', 'LCS1240', 249, 'MAX LITHIUM UPC: 885911357302 Weight: 11.1 lbs', 98),
(24, 'Black&Decker', 'Black&Decker-4.jpg', 'BEHD201', 59, 'CORDED HAMMER DRILL UPC: 885911534208 Weight: 4.145 lbs', 100),
(25, 'Black&Decker', 'Black&Decker-5.jpg', 'LSW60C', 199, 'MAX POWERBOOST UPC: 885911487160 Weight: 7 lbs', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(30) NOT NULL,
  `isadmin` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `isadmin`) VALUES
(2, 'Sanad1991', '0504619600', 'Sanad', 1),
(1, 'Tamer1989', '0506861443', 'Tamer', 1),
(3, 'Guest', '123456789', 'Guest', 0),
(17, 'hosam1998', '0524069659', 'Hosam', 0),
(18, 'fadi1996', '0535202511', 'Fadi', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
