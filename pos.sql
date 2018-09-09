-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2018 at 12:48 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `ltype` varchar(50) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `selection` varchar(100) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vbill_type` int(1) NOT NULL,
  `added_at` datetime NOT NULL,
  `modify_at` varchar(100) DEFAULT NULL,
  `tbl_id` int(11) NOT NULL DEFAULT '0',
  `waiter_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`iid`, `session_id`, `type`, `ltype`, `item_id`, `selection`, `qty`, `sub_total`, `user_id`, `vbill_type`, `added_at`, `modify_at`, `tbl_id`, `waiter_id`, `status`) VALUES
(2, '00000001', 'F', '', 58, 'NO', 1, 1000, 1, 1, '2018-08-26 11:14:38', NULL, 2, 11, 1),
(3, '00000001', 'B', '', 44, 'NO', 10, 6500, 1, 1, '2018-08-26 11:15:05', NULL, 2, 11, 1),
(4, '00000002', 'F', '', 59, 'NO', 1, 1300, 1, 2, '2018-08-26 11:16:51', NULL, 2, 11, 1),
(5, '00000002', 'D', '', 14, 'NO', 1, 350, 1, 2, '2018-08-26 11:17:00', NULL, 2, 11, 1),
(6, '00000002', 'D', '', 11, 'NO', 1, 450, 1, 2, '2018-08-26 11:17:06', NULL, 2, 11, 1),
(7, '00000002', 'D', '', 13, 'NO', 1, 350, 1, 2, '2018-08-26 11:17:11', NULL, 2, 11, 1),
(9, '00000003', 'F', '', 58, 'NO', 1, 1000, 1, 2, '2018-08-26 12:05:19', NULL, 2, 11, 1),
(12, '00000004', 'F', '', 58, 'NO', 1, 1000, 1, 1, '2018-08-26 14:30:56', NULL, 2, 11, 1),
(13, '00000005', 'F', '', 58, 'NO', 1, 1000, 1, 2, '2018-08-26 14:31:50', NULL, 3, 11, 1),
(14, '00000006', 'B', '', 14, 'NO', 3, 750, 1, 1, '2018-08-26 16:14:55', NULL, 3, 14, 1),
(16, '00000007', 'F', '', 58, 'NO', 1, 1000, 1, 2, '2018-08-26 17:12:20', NULL, 4, 15, 1),
(17, '00000007', 'B', '', 53, 'NO', 1, 700, 1, 2, '2018-08-26 17:12:23', NULL, 4, 15, 1),
(18, '00000007', 'D', '', 14, 'NO', 1, 350, 1, 2, '2018-08-26 17:12:25', NULL, 4, 15, 1),
(19, '00000008', 'F', '', 59, 'NO', 1, 1300, 10, 1, '2018-09-01 11:38:23', NULL, 3, 14, 1),
(20, '00000008', 'F', '', 28, 'NO', 1, 700, 10, 1, '2018-09-01 11:38:30', NULL, 3, 14, 1),
(21, '00000009', 'F', '', 30, 'NO', 1, 500, 10, 1, '2018-09-08 08:58:39', NULL, 4, 15, 1),
(22, '00000009', 'B', '', 29, 'NO', 1, 300, 10, 1, '2018-09-08 08:58:42', NULL, 4, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dessert`
--

CREATE TABLE IF NOT EXISTS `tbl_dessert` (
  `dessert_id` int(11) NOT NULL AUTO_INCREMENT,
  `dessert_name` text CHARACTER SET utf8 NOT NULL,
  `dessert_descripton` text CHARACTER SET utf8 NOT NULL,
  `dessert_price` float NOT NULL,
  `dessert_discount` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`dessert_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_dessert`
--

INSERT INTO `tbl_dessert` (`dessert_id`, `dessert_name`, `dessert_descripton`, `dessert_price`, `dessert_discount`, `publish`, `date_created`) VALUES
(4, 'desert te', 'nmbjhbj', 2, 140, 0, '2018-07-29 11:46:16'),
(2, 'chocolate Ice Creams', 'chocolate Ice Cream', 100, 0, 0, '2018-06-17 10:12:23'),
(1, 'Vanila Ice Cream', 'Vanilla Ice Cream', 350, 0, 1, '2018-06-16 14:01:00'),
(5, 'kj ice', 'jkkkk icesss', 1500, 30, 0, '2018-07-29 11:50:42'),
(6, 'Chocolat Ice Cream', '', 350, 0, 1, '2018-08-04 12:01:56'),
(7, 'Mix Ice Cream', '', 400, 0, 1, '2018-08-04 12:02:32'),
(8, 'Fruit Salad', '', 450, 0, 1, '2018-08-04 12:03:06'),
(9, 'Fruit Salad With Curd', '', 500, 0, 1, '2018-08-04 12:03:59'),
(10, 'Fruit Salad With Ice Cream', '', 500, 0, 1, '2018-08-04 12:04:45'),
(11, 'Fruit Plate', '', 450, 0, 1, '2018-08-04 12:05:20'),
(12, 'Sweet pancake Coconut', '', 350, 0, 1, '2018-08-04 12:06:15'),
(13, 'Sweet  Pancake Banana', '', 350, 0, 1, '2018-08-04 12:08:09'),
(14, 'Banana Fitters With Palm Honey', '', 350, 0, 1, '2018-08-04 12:09:30'),
(15, 'Pineapple Fitters With Palm Honey', '', 350, 0, 1, '2018-08-04 12:11:07'),
(16, 'Curd And Honey', '', 350, 0, 1, '2018-08-04 12:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drinks`
--

CREATE TABLE IF NOT EXISTS `tbl_drinks` (
  `drink_id` int(11) NOT NULL AUTO_INCREMENT,
  `drink_name` text CHARACTER SET utf8 NOT NULL,
  `drink_description` text CHARACTER SET utf8 NOT NULL,
  `drink_price` float NOT NULL,
  `drink_salling_price` float NOT NULL,
  `drink_discount` float NOT NULL,
  `drink_purches_date` varchar(100) DEFAULT NULL,
  `drink_stock` int(11) NOT NULL,
  `drink_current_stock` int(11) NOT NULL DEFAULT '0',
  `publish` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`drink_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `tbl_drinks`
--

INSERT INTO `tbl_drinks` (`drink_id`, `drink_name`, `drink_description`, `drink_price`, `drink_salling_price`, `drink_discount`, `drink_purches_date`, `drink_stock`, `drink_current_stock`, `publish`, `date_created`) VALUES
(10, 'Coca Cola Zero', 'Coca Cola suger no', 100, 1800, 12, '2019-01-02', 10, 1000, 0, '2018-07-29 12:05:49'),
(2, 'sprite', 'sprite', 80, 0, 0, '', 100, 1000, 0, '2018-06-17 10:12:23'),
(1, 'Coca Cola', 'Coca Cola suger no', 808, 0, 0, '', 100, 1000, 0, '2018-06-16 13:59:40'),
(12, 'Pineapple Juice', '', 0, 250, 0, '', 0, 1000, 0, '2018-08-04 12:14:47'),
(13, 'Pineapple Juice', '', 0, 250, 0, '', 0, 1000, 0, '2018-08-04 12:17:19'),
(14, 'Pineapple Juice', '', 100, 250, 0, '2018-08-05', 1, 997, 1, '2018-08-05 05:51:38'),
(15, 'Banana Juice', '', 100, 250, 0, '2018-08-05', 1, 1000, 1, '2018-08-05 05:56:22'),
(16, 'Mango Juice', '', 100, 300, 0, '2018-08-05', 1, 1000, 1, '2018-08-05 05:57:54'),
(17, 'Passion Juice', '', 100, 250, 0, '2018-08-05', 1, 1000, 1, '2018-08-05 05:59:16'),
(18, 'Papaya Juice', '', 100, 250, 0, '2018-08-05', 100000, 1000, 1, '2018-08-05 06:00:19'),
(19, 'Lime Juice', '', 100, 250, 0, '2018-08-05', 1000000, 1000, 1, '2018-08-05 06:01:39'),
(20, 'Watermelon Juice', '', 100, 250, 0, '2018-08-05', 1, 1000, 1, '2018-08-05 06:03:01'),
(21, 'Orange Juice', '', 100, 300, 0, '2018-08-05', 10000, 1000, 1, '2018-08-05 06:04:27'),
(22, 'Wood Apple Juice', '', 100, 250, 0, '2018-08-05', 1, 1000, 1, '2018-08-05 06:05:45'),
(23, 'Pineapple Milk Shake', '', 100, 300, 0, '', 1, 1000, 1, '2018-08-05 06:07:12'),
(24, 'Banana Milk Shake', '', 100, 300, 0, '2018-08-05', 1, 1000, 1, '2018-08-05 06:09:49'),
(25, 'Mango Milk Shake', '', 100, 300, 0, '2018-08-05', 1, 1000, 1, '2018-08-05 06:11:05'),
(26, 'Papaya Milk Shake', '', 100, 300, 0, '2018-08-05', 1, 1000, 1, '2018-08-05 06:12:49'),
(27, 'Mango Lazzi', '', 100, 300, 0, '', 1, 1000, 1, '2018-08-05 06:14:07'),
(28, 'Pineapple Lazzi', '', 100, 300, 0, '2018-08-05', 1, 1000, 1, '2018-08-05 06:16:15'),
(29, 'Banana Lazzi', '', 100, 300, 0, '', 1, 999, 1, '2018-08-05 06:17:13'),
(30, 'Papaya Lazzi', '', 100, 300, 0, '', 1, 1000, 1, '2018-08-05 06:18:07'),
(31, 'Water Bottle ', '', 70, 150, 0, '', 1, 68, 1, '2018-08-05 06:19:27'),
(32, 'Cola', '', 75, 150, 0, '', 1, 34, 1, '2018-08-05 06:22:27'),
(33, 'Sprite', '', 75, 150, 0, '', 1, 56, 1, '2018-08-05 06:24:46'),
(34, 'Fanta ', '', 75, 150, 0, '', 1, 9, 1, '2018-08-05 06:25:32'),
(35, 'Ginger Beer', '', 150, 250, 0, '', 1, 42, 1, '2018-08-05 06:26:45'),
(36, 'Soda', '', 75, 150, 0, '', 1, 126, 1, '2018-08-05 06:27:23'),
(37, 'Tonic', '', 75, 150, 0, '', 1000, 72, 1, '2018-08-05 06:28:08'),
(38, 'Light Cola', '', 100, 250, 0, '', 1, 30, 1, '2018-08-05 06:29:01'),
(39, 'Pot of Tea', '', 200, 400, 0, '', 1, 1000, 1, '2018-08-05 06:29:55'),
(40, 'Pot of Coffee', '', 200, 400, 0, '', 1, 1000, 1, '2018-08-05 06:31:04'),
(41, 'Lime Soda', '', 150, 300, 0, '', 1, 1000, 1, '2018-08-05 06:31:41'),
(42, 'Ice Cafe', '', 250, 500, 0, '', 1, 1000, 1, '2018-08-05 06:32:51'),
(43, 'Lion Beer', '', 150, 350, 0, '', 1, 1025, 1, '2018-08-05 06:35:28'),
(44, 'Corona Beer', '', 400, 650, 0, '2018-08-14', 68, 65, 1, '2018-08-05 06:36:34'),
(45, 'Red Wine ', '', 100, 500, 0, '', 100, 1000, 1, '2018-08-05 06:38:46'),
(46, 'White Wine', '', 100, 500, 0, '', 100, 1000, 1, '2018-08-05 06:39:57'),
(47, 'Calsberg Beer', '', 350, 450, 0, '2018-08-11', 34, 26, 1, '2018-08-11 16:35:58'),
(48, 'Mix Fruit Juice', '', 200, 300, 0, '2018-08-12', 100000, 100000, 1, '2018-08-12 07:19:41'),
(49, 'Water Bottle ', '', 100, 150, 0, '2018-08-12', 100000, 100000, 0, '2018-08-12 09:54:40'),
(50, 'Arrack Cocktail', 'Pineapple juice,arrack', 500, 700, 0, '2018-08-13', 100000, 100000, 1, '2018-08-13 06:31:37'),
(51, 'Pinacolada', 'Malibu,white rum,pineapple,ice,coconut milk', 500, 700, 0, '2018-08-13', 100000, 100000, 1, '2018-08-13 06:34:11'),
(52, 'Mojito', 'Lime,sugar,minchi,white rum,ice,soda.', 500, 700, 0, '2018-08-13', 10000, 10000, 1, '2018-08-13 06:37:08'),
(53, 'Banana Diaquri', 'Banana,white rum,lime,ice,sugar,', 500, 700, 0, '2018-08-13', 100000, 99999, 1, '2018-08-13 06:39:18'),
(54, 'Moskamul', 'Vodka,lime,ginger beer,', 500, 700, 0, '2018-08-13', 100000, 100000, 1, '2018-08-13 06:40:44'),
(55, 'Cup of Tae', '', 50, 100, 0, '2018-08-14', 100000, 100000, 1, '2018-08-14 05:19:40'),
(56, 'vanila milk shake', '', 200, 300, 0, '2018-08-19', 10000, 10000, 1, '2018-08-19 10:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE IF NOT EXISTS `tbl_food` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_name` text CHARACTER SET utf8 NOT NULL,
  `food_description` text CHARACTER SET utf8 NOT NULL,
  `food_price` float NOT NULL,
  `food_discount` float NOT NULL,
  `publish` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`food_id`, `food_name`, `food_description`, `food_price`, `food_discount`, `publish`, `date_created`) VALUES
(24, 'dsa', 'dfsdfkhsdmsdfsdf', 343, 345, 0, '2018-07-29 11:29:20'),
(25, 'dsa', 'dfsdfkhsdmsdfsdf', 343, 345, 0, '2018-07-29 11:38:37'),
(26, 'test menu', 'dessss food', 103, 20, 0, '2018-07-29 11:48:16'),
(2, 'Sea Food Rice', 'Rice Mix With prawn And Fish', 390, 0, 0, '2018-06-16 21:44:39'),
(1, 'Chicken Fried Rice', 'Chicken, Rice mix with vegetables', 250, 0, 0, '2018-06-16 13:58:31'),
(23, 'dsa', 'dfsdfkhsdmsdfsdf', 343, 345, 0, '2018-07-29 11:29:19'),
(22, 'dsasdfsdfsdfsdf', 'dfsdfkhsdmsdfsdf', 343, 345, 0, '2018-07-29 11:27:19'),
(27, 'sfgsdgs', 'ssdfsdf', 12, 0, 0, '2018-08-04 09:18:23'),
(28, 'Breakfast', 'eggs tost butter jam tea and coffe', 700, 0, 1, '2018-08-04 09:28:10'),
(29, 'Chees and tomato', '', 400, 0, 1, '2018-08-04 09:30:32'),
(30, 'Chees Egg and Tomato', '', 500, 0, 1, '2018-08-04 09:33:23'),
(31, 'Chees Egg and Tomato', '', 500, 0, 0, '2018-08-04 09:34:57'),
(32, 'Chicken and chees', '', 550, 0, 1, '2018-08-04 09:36:41'),
(33, 'fish and chees', '', 500, 0, 1, '2018-08-04 09:37:23'),
(34, 'Vegetable Sandwich', '', 400, 0, 1, '2018-08-04 09:39:27'),
(35, 'garlic toast', '', 300, 0, 1, '2018-08-04 09:41:00'),
(36, 'Mixed Vegetable Soup', '', 500, 0, 0, '2018-08-04 09:43:17'),
(37, 'Mixed Vegetable Chicken Soup', '', 500, 0, 1, '2018-08-04 09:47:56'),
(38, 'Mixed Vegetable Fish soup', '', 500, 0, 1, '2018-08-04 09:49:08'),
(39, 'Noodles Soup', '', 450, 0, 1, '2018-08-04 09:49:44'),
(40, 'Garlic Soup', '', 400, 0, 1, '2018-08-04 09:50:12'),
(41, 'Mixed  Garden Vegetable Salad', '', 450, 0, 1, '2018-08-04 09:52:23'),
(42, 'Tomato Salad', '', 400, 0, 1, '2018-08-04 09:52:57'),
(43, 'Potato Chips', '', 550, 0, 1, '2018-08-04 09:54:18'),
(44, 'Omlet', '', 300, 0, 1, '2018-08-04 09:54:46'),
(45, 'Tuna Fish Steak with Vegetable Salad', '', 1000, 0, 1, '2018-08-04 00:00:00'),
(46, 'aasd asd', '', 123, 0, 0, '2018-08-04 10:46:08'),
(47, 'aasd asd', '', 123, 0, 0, '2018-08-04 10:46:08'),
(48, 'Tuna Fish Steak with Vegetable Salad', '', 123, 0, 0, '2018-08-04 10:47:21'),
(49, 'Tuna Fish Steak with Vegetable Salad', '', 123, 0, 0, '2018-08-04 10:47:21'),
(50, 'Tuna Fish Steak with Vegetable Salad', '', 123, 0, 0, '2018-08-04 10:48:02'),
(51, 'Tuna Fish Steak with Vegetable Salad', '', 123, 0, 0, '2018-08-04 10:48:16'),
(52, 'una Fish Steak with Vegetable Salad', '', 123, 0, 0, '2018-08-04 10:50:17'),
(53, 'Grilled Calamari With Salad', '', 1000, 0, 1, '2018-08-04 10:55:26'),
(54, 'Devilled  Calamari With Steam Rice', '', 1000, 0, 1, '2018-08-04 10:59:09'),
(55, 'Devilled Tuna Fish With Friede Rice', '', 1000, 0, 1, '2018-08-04 11:02:47'),
(56, 'Grilled Prawns With Salad', '', 1300, 0, 1, '2018-08-04 11:04:04'),
(57, 'Fish  Fingers With Salad', '', 1000, 0, 1, '2018-08-04 11:06:18'),
(58, 'Batter Fried Calamari With Salad', '', 1000, 0, 1, '2018-08-04 11:07:59'),
(59, 'Batter Fried Prawns With Salad', '', 1300, 0, 1, '2018-08-04 11:09:34'),
(60, 'Sea Food Rice', '', 1000, 0, 1, '2018-08-04 11:10:09'),
(61, 'Chicken Chips', '', 1000, 0, 1, '2018-08-04 11:10:54'),
(62, 'Chicken Breast', '', 1500, 0, 0, '2018-08-04 11:11:31'),
(63, 'Chicken Breast Grilled With Salad', '', 1500, 0, 1, '2018-08-04 11:14:54'),
(64, 'Chicken With Mixed Vegetable Fried Rice or Noodles', '', 1000, 0, 1, '2018-08-04 11:16:58'),
(65, 'Chicken Devilled', '', 1250, 0, 1, '2018-08-04 11:17:51'),
(66, 'Mixed Boiled Vegetable', '', 600, 0, 1, '2018-08-04 11:18:54'),
(67, 'Vegetable Chopsuey', '', 600, 0, 1, '2018-08-04 11:19:45'),
(68, 'Mixed Vegetable Fried Rice or Noodles', '', 600, 0, 1, '2018-08-04 11:21:08'),
(69, 'Spaghetti', '', 1000, 0, 1, '2018-08-04 11:22:20'),
(70, 'Pasta With Special Sauce', '', 1000, 0, 1, '2018-08-04 11:23:38'),
(71, 'Londary', '1kg', 400, 0, 1, '2018-08-12 06:42:08'),
(72, 'Rice and curry', '', 700, 0, 1, '2018-08-13 17:45:36'),
(73, 'Chicken Leg', '', 750, 0, 1, '2018-08-15 17:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_liquor`
--

CREATE TABLE IF NOT EXISTS `tbl_liquor` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `brand` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `liq_name` varchar(100) NOT NULL,
  `liq_qty` int(11) NOT NULL,
  `liq_current_stock` int(11) NOT NULL,
  `purchase_date` varchar(100) NOT NULL,
  `buy_price` float NOT NULL,
  `sell_price` float NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '0',
  `description` varchar(500) DEFAULT NULL,
  `publish` int(11) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `date_updated` varchar(100) DEFAULT NULL,
  `no_of_25_shot` int(11) DEFAULT NULL,
  `price_25_shot` float DEFAULT NULL,
  `no_of_50_shot` int(11) DEFAULT NULL,
  `price_50_shot` float DEFAULT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_liquor`
--

INSERT INTO `tbl_liquor` (`iid`, `brand`, `volume`, `liq_name`, `liq_qty`, `liq_current_stock`, `purchase_date`, `buy_price`, `sell_price`, `discount`, `description`, `publish`, `date_created`, `date_updated`, `no_of_25_shot`, `price_25_shot`, `no_of_50_shot`, `price_50_shot`) VALUES
(8, 2, 3, 'jak danial', 3, 3, '2018-08-11', 1500, 2000, 10, '', 1, '2018-08-10 06:34:17', NULL, 120, 15, 60, 200),
(7, 1, 1, 'lion beer', 2, -3, '2019-01-01', 100, 120, 0, 'sample test', 1, '2018-08-08 16:26:55', NULL, -39, 15, -24, 25);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_liquor_prices`
--

CREATE TABLE IF NOT EXISTS `tbl_liquor_prices` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `liq_id` int(11) NOT NULL,
  `liq_vol_id` int(11) NOT NULL,
  `buy_price` float NOT NULL,
  `sell_price` float NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_at` varchar(100) NOT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `modify_at` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_history`
--

CREATE TABLE IF NOT EXISTS `tbl_login_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `login_datetime` varchar(100) DEFAULT NULL,
  `logout_datetime` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_login_history`
--

INSERT INTO `tbl_login_history` (`id`, `user_id`, `login_datetime`, `logout_datetime`) VALUES
(1, 1, '2018-06-21 07:03:42', ''),
(2, 1, '2018-06-22 18:15:09', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_bill_type`
--

CREATE TABLE IF NOT EXISTS `tbl_m_bill_type` (
  `ibill_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `vname` varchar(100) NOT NULL,
  `ipublish` int(1) NOT NULL,
  `ddate_create` date NOT NULL,
  PRIMARY KEY (`ibill_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_m_bill_type`
--

INSERT INTO `tbl_m_bill_type` (`ibill_type_id`, `vname`, `ipublish`, `ddate_create`) VALUES
(1, 'Cash', 1, '2018-08-21'),
(2, 'Credit', 1, '2018-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_liquor_brand`
--

CREATE TABLE IF NOT EXISTS `tbl_m_liquor_brand` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(500) NOT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_m_liquor_brand`
--

INSERT INTO `tbl_m_liquor_brand` (`iid`, `brand_name`) VALUES
(1, 'Lion'),
(2, 'Jack');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_liquor_volume`
--

CREATE TABLE IF NOT EXISTS `tbl_m_liquor_volume` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `liquor_volume` int(11) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `TYPE` varchar(5) NOT NULL,
  `no_of_25_shot` int(11) NOT NULL,
  `no_of_50_shot` int(11) NOT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_m_liquor_volume`
--

INSERT INTO `tbl_m_liquor_volume` (`iid`, `liquor_volume`, `volume`, `TYPE`, `no_of_25_shot`, `no_of_50_shot`) VALUES
(1, 500, '500 ML', 'BTL', 20, 10),
(2, 750, '750 ML', 'BTL', 30, 5),
(3, 1000, '1 L', 'BTL', 40, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_tables`
--

CREATE TABLE IF NOT EXISTS `tbl_m_tables` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_name` varchar(200) NOT NULL,
  `publish` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `tbl_m_tables`
--

INSERT INTO `tbl_m_tables` (`iid`, `tbl_name`, `publish`) VALUES
(10, 'Table 7', 1),
(2, 'Table 1', 1),
(3, 'Table 2', 1),
(4, 'Table 3', 1),
(6, 'Table 4', 1),
(8, 'Table 5', 1),
(9, 'Table 6', 1),
(11, 'Table 8', 1),
(12, 'Table 9', 1),
(13, 'Table 10', 1),
(14, 'Table 11', 1),
(15, 'Table 12', 1),
(16, 'Table 13', 1),
(17, 'Table 14', 1),
(20, 'Table 16', 1),
(19, 'Table 15', 1),
(21, 'Table 17', 1),
(22, 'Table 18', 1),
(23, 'Table 19', 1),
(24, 'Table 20', 1),
(25, 'Table 21', 1),
(26, 'Table 22', 1),
(27, 'Table 23', 1),
(28, 'Table 24', 1),
(29, 'Table 25', 1),
(30, 'Table 26', 1),
(31, 'Table 27', 1),
(32, 'Table 28', 1),
(33, 'Table 29', 1),
(34, 'Table 30', 1),
(35, 'Table 31', 1),
(36, 'Table 32', 1),
(37, 'Table 33', 1),
(38, 'Table 34', 1),
(39, 'Table 35', 1),
(40, 'Table 36', 1),
(41, 'Table 37', 1),
(42, 'Table 38', 1),
(43, 'Table 39', 1),
(44, 'Table 40', 1),
(45, 'Table 41', 1),
(46, 'Table 42', 1),
(47, 'Table 43', 1),
(48, 'Table 44', 1),
(49, 'Table 45', 1),
(50, 'Table 46', 1),
(51, 'Table 47', 1),
(52, 'Table 48', 1),
(53, 'Table 49', 1),
(54, 'Table 50', 1),
(55, 'Room 1', 1),
(56, 'Room 2', 1),
(57, 'Room 3', 1),
(58, 'Room 4', 1),
(59, 'Room 5', 1),
(60, 'Room 6', 1),
(61, 'Room 7', 1),
(62, 'Room 8', 1),
(63, 'Room 9', 1),
(64, 'Room 10', 1),
(65, 'Room 11', 1),
(66, 'Room 12', 1),
(67, 'Room 13', 1),
(68, 'Room 14', 1),
(69, 'Room 15', 1),
(70, 'Room 16', 1),
(71, 'Room 17', 1),
(72, 'Room 18', 1),
(73, 'Room 19', 1),
(74, 'Room 20', 1),
(75, 'Room 201', 1),
(76, 'Room 202', 1),
(77, 'Room 203', 1),
(78, 'Room 204', 1),
(79, 'Room 301', 1),
(80, 'Room 302', 1),
(81, 'Room 303', 1),
(82, 'Room 304', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `purchase_price` float NOT NULL,
  `sell_price` float NOT NULL,
  `discount` float NOT NULL,
  `purchase_date` varchar(100) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `added_at` varchar(100) NOT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`iid`, `product_id`, `product_type`, `qty`, `purchase_price`, `sell_price`, `discount`, `purchase_date`, `added_by`, `added_at`) VALUES
(1, 25, 'F', 0, 0, 343, 0, NULL, 1, '2018-07-29 11:38:37'),
(2, 22, 'F', 0, 0, 343, 0, NULL, 1, '2018-07-29 11:42:40'),
(3, 4, 'D', 0, 0, 2, 0, NULL, 1, '2018-07-29 11:46:16'),
(4, 26, 'F', 0, 0, 103, 10, NULL, 1, '2018-07-29 11:48:16'),
(5, 26, 'F', 0, 0, 103, 20, NULL, 1, '2018-07-29 11:48:35'),
(6, 5, 'D', 0, 0, 150, 30, NULL, 1, '2018-07-29 11:50:42'),
(7, 5, 'D', 0, 0, 1500, 30, NULL, 1, '2018-07-29 11:50:53'),
(8, 5, 'D', 0, 0, 1500, 30, NULL, 1, '2018-07-29 12:04:20'),
(9, 10, 'B', 10, 100, 180, 12, '2019-01-02', 1, '2018-07-29 12:05:49'),
(10, 10, 'B', 10, 100, 1800, 12, '2019-01-02', 1, '2018-07-29 12:10:58'),
(11, 10, 'B', 10, 100, 1800, 12, '2019-01-02', 1, '2018-07-29 12:16:33'),
(12, 10, 'B', 10, 100, 1800, 12, '2019-01-02', 1, '2018-07-29 12:16:42'),
(13, 4, 'L', 10, 980, 120, 16, '2019-01-01', 1, '2018-07-29 12:17:30'),
(14, 4, 'L', 10, 980, 1200, 16, '2019-01-01', 1, '2018-07-29 12:21:18'),
(15, 1, 'B', 100, 808, 0, 0, '', 1, '2018-07-29 14:54:48'),
(16, 5, 'L', 3, 434, 2, 2, '2021-01-02', 1, '2018-07-29 15:06:18'),
(17, 6, 'L', 3, 4, 2, 3, '2020-01-02', 1, '2018-08-01 17:36:42'),
(18, 6, 'L', 3, 4, 2, 3, '2020-01-02', 1, '2018-08-01 17:54:24'),
(19, 6, 'L', 4, 4, 2, 3, '2020-01-02', 1, '2018-08-01 17:55:11'),
(20, 7, 'L', 2, 100, 120, 0, '2019-01-01', 1, '2018-08-08 16:26:55'),
(21, 8, 'L', 3, 1500, 2000, 10, '2018-08-11', 1, '2018-08-10 06:34:17'),
(22, 47, 'B', 100, 350, 450, 0, '2018-08-11', 1, '2018-08-11 16:35:58'),
(23, 19, 'B', 100, 100, 250, 0, '2018-08-05', 1, '2018-08-11 16:46:52'),
(24, 19, 'B', 100, 100, 250, 10000, '2018-08-05', 1, '2018-08-11 16:50:10'),
(25, 71, 'F', 0, 0, 250, 0, NULL, 1, '2018-08-12 06:42:08'),
(26, 48, 'B', 100000, 200, 300, 0, '2018-08-12', 1, '2018-08-12 07:19:41'),
(27, 49, 'B', 100000, 100, 150, 0, '2018-08-12', 1, '2018-08-12 09:54:40'),
(28, 50, 'B', 100000, 500, 700, 0, '2018-08-13', 1, '2018-08-13 06:31:37'),
(29, 51, 'B', 100000, 500, 700, 0, '2018-08-13', 1, '2018-08-13 06:34:11'),
(30, 52, 'B', 10000, 500, 700, 0, '2018-08-13', 1, '2018-08-13 06:37:08'),
(31, 53, 'B', 100000, 500, 700, 0, '2018-08-13', 1, '2018-08-13 06:39:18'),
(32, 54, 'B', 100000, 500, 700, 0, '2018-08-13', 1, '2018-08-13 06:40:44'),
(33, 72, 'F', 0, 0, 700, 0, NULL, 1, '2018-08-13 17:45:36'),
(34, 55, 'B', 100000, 50, 100, 0, '2018-08-14', 1, '2018-08-14 05:19:40'),
(35, 47, 'B', 34, 350, 450, 0, '2018-08-11', 1, '2018-08-14 09:29:14'),
(36, 47, 'B', 34, 350, 450, 0, '2018-08-11', 1, '2018-08-14 09:30:39'),
(37, 44, 'B', 68, 400, 650, 0, '2018-08-14', 1, '2018-08-14 09:32:55'),
(38, 73, 'F', 0, 0, 750, 0, NULL, 1, '2018-08-15 17:25:29'),
(39, 71, 'F', 0, 0, 400, 0, NULL, 1, '2018-08-18 09:16:35'),
(40, 56, 'B', 10000, 200, 300, 0, '2018-08-19', 1, '2018-08-19 10:40:16'),
(41, 14, 'B', 1, 100, 250, 12, '2018-08-05', 1, '2018-08-26 12:43:29'),
(42, 14, 'B', 1, 100, 250, 0, '2018-08-05', 1, '2018-08-26 12:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_lname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_nic` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_mobile` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_login_username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_login_password` text CHARACTER SET utf8 NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `user_create_date` date NOT NULL,
  `publish` int(11) NOT NULL,
  `user_last_update_date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_lname`, `user_nic`, `user_mobile`, `user_login_username`, `user_login_password`, `user_group_id`, `user_create_date`, `publish`, `user_last_update_date`) VALUES
(1, 'malith', 'pathirana', '881703920v', '0712345689', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2018-06-20', 1, '2018-06-20'),
(10, 'Harsha', 'Chathuranga', '882233944v', '0712066987', 'Harsha', 'fa9dce1b94f75e76817cda6b5d87a434', 1, '2018-08-21', 1, '2018-08-21'),
(16, 'Kelum', 'Sasanka', '098766554', '0786757456', 'Sasanka', '20e17d380f481de17c7a36c306a76dc1', 4, '2018-08-26', 1, '2018-08-26'),
(15, 'Kelum', 'Srimal', '980121984V', '0757848453', 'kelum', '130db1fbff2d7ac4c299b7a6da8895b8', 4, '2018-08-26', 1, '2018-08-26'),
(14, 'Sameera', 'Sampath', '098765432V', '8456677965', 'sameera', '470cf15a786f8062ffea303990f25481', 4, '2018-08-26', 1, '2018-08-26'),
(13, 'Kelum', 'Srimal', '980121984v', '0757848453', 'kelum', 'd0b53e019e100e69f9a4c7859fb661fe', 3, '2018-08-26', 1, '2018-08-26'),
(17, 'Sunimal', 'Gamage', '898087867V', '1234567890', 'Sunimal', '8ae01cecafea48bac9341b918ea8cbfd', 4, '2018-08-26', 1, '2018-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_group`
--

CREATE TABLE IF NOT EXISTS `tbl_user_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `publish` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_user_group`
--

INSERT INTO `tbl_user_group` (`group_id`, `group_name`, `publish`) VALUES
(1, 'Manager', 1),
(2, 'Bartender', 1),
(3, 'Restaurant Cashiers', 1),
(4, 'Waiter', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
