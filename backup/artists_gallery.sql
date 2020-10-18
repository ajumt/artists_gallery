-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 10:53 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `artists_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `art_category`
--

CREATE TABLE IF NOT EXISTS `art_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `art_category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `art_category`
--

INSERT INTO `art_category` (`id`, `art_category_name`) VALUES
(1, 'pencil drawing');

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE IF NOT EXISTS `bidding` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bid_name` varchar(50) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `starting_price` decimal(10,2) DEFAULT NULL,
  `start_date_time` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `acquired_by` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `completed` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bidding_details`
--

CREATE TABLE IF NOT EXISTS `bidding_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bid_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE IF NOT EXISTS `bids` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bid_name` varchar(100) NOT NULL,
  `artist_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `starting_price` int(10) unsigned NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `aquired_by` int(10) NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `created_on` datetime NOT NULL,
  `completed` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `bid_name`, `artist_id`, `product_id`, `starting_price`, `start_date`, `end_date`, `aquired_by`, `amount`, `created_on`, `completed`) VALUES
(1, 'nice pic', 5, 1, 1000, '2019-02-19 10:00:00', '2019-04-05 06:00:00', 12, 1500, '2019-02-19 10:00:00', 1),
(2, 'Nice Drawing', 6, 4, 800, '2019-02-20 13:00:00', '2019-04-06 12:00:00', 0, 0, '2019-02-16 00:00:00', 1),
(6, 'great drawing', 5, 13, 1000, '2019-02-16 08:00:00', '2019-04-06 10:00:00', 0, 0, '2019-02-16 08:00:00', 1),
(10, 'great drawing and nice pic', 12, 15, 12000, '2019-02-19 10:00:00', '2019-04-06 07:00:00', 0, 0, '2019-02-19 10:00:00', 0),
(11, 'Best Offer...', 5, 13, 5000, '2019-03-02 10:00:00', '2019-04-06 14:00:00', 0, 0, '2019-03-02 02:29:39', 1),
(12, 'Best Offer...', 5, 13, 45600, '2019-03-12 10:00:00', '2019-04-06 12:30:00', 0, 0, '2019-03-02 02:32:09', 0),
(13, 'abc', 6, 1, 2500, '2020-06-11 22:08:00', '2020-06-20 22:08:00', 0, 0, '2020-06-11 11:39:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bid_details`
--

CREATE TABLE IF NOT EXISTS `bid_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bid_id` int(10) unsigned NOT NULL,
  `buyer_id` int(10) unsigned NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `created_on` datetime NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bid_details`
--

INSERT INTO `bid_details` (`id`, `bid_id`, `buyer_id`, `amount`, `created_on`, `remarks`) VALUES
(1, 1, 12, 1500, '2019-02-19 10:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `product_qty` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `product_qty`) VALUES
(2, 12, 1, 1),
(3, 12, 4, 1),
(5, 12, 3, 1),
(6, 5, 1, 0),
(7, 13, 2, 0),
(8, 13, 3, 0),
(9, 1, 4, 0),
(10, 1, 1, 0),
(11, 1, 3, 0),
(12, 1, 2, 0),
(13, 1, 8, 0),
(14, 5, 4, 0),
(15, 5, 10, 0),
(16, 5, 3, 0),
(17, 6, 4, 0),
(18, 6, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `comment` text NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `comment`, `userid`, `created_on`) VALUES
(1, 4, 'Nice Flower', 6, '2019-05-02 00:00:00'),
(2, 2, 'pklklklkl;', 5, '0000-00-00 00:00:00'),
(3, 1, 'fxgh hfgd hgfd', 5, '2019-02-03 00:00:00'),
(5, 1, 'hhgggghhhjj', 5, '2019-02-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '-1',
  `image_amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `address` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `total` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `account_no` int(10) unsigned NOT NULL,
  `card_no` int(10) unsigned NOT NULL,
  `cvv` int(10) unsigned NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'shopping',
  `type_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `payment_type`, `total`, `product_id`, `account_no`, `card_no`, `cvv`, `type`, `type_id`) VALUES
(1, 12, 'Neethu p                                        Dist:  kasargod                                     ', 'cash', 4500, 0, 0, 0, 0, 'shopping', 0),
(2, 12, 'Neethu p                                        Dist:  kasargod                                     ', 'cash', 5300, 0, 0, 0, 0, 'shopping', 0),
(3, 12, 'Neethu p                                        Dist:  kasargod                                     ', 'cash', 5300, 0, 0, 0, 0, 'shopping', 0),
(7, 13, 'gv d                                        Dist:  dddd                                        City:', 'cash', 5450, 0, 0, 0, 0, 'shopping', 0),
(13, 1, 'admin admin                                        Dist:  kannur                                    ', 'cash', 5300, 0, 0, 0, 0, 'shopping', 0),
(14, 5, 'Hari K                                        Dist:  Palakkade                                      ', 'cash', 14300, 0, 0, 0, 0, 'shopping', 0),
(15, 6, 'Linju P                                        Dist:  Kannur                                        ', 'cash', 800, 0, 0, 0, 0, 'shopping', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  `shiped_date` date NOT NULL,
  `delivered_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `status`, `shiped_date`, `delivered_date`) VALUES
(1, 1, 1, 1, 0, '0000-00-00', '0000-00-00'),
(2, 2, 1, 2, 0, '0000-00-00', '0000-00-00'),
(3, 2, 4, 2, 0, '0000-00-00', '0000-00-00'),
(4, 3, 1, 0, 0, '0000-00-00', '0000-00-00'),
(5, 3, 4, 0, 0, '0000-00-00', '0000-00-00'),
(9, 7, 2, 0, 0, '0000-00-00', '0000-00-00'),
(10, 7, 3, 0, 0, '0000-00-00', '0000-00-00'),
(17, 13, 4, 0, 0, '0000-00-00', '0000-00-00'),
(18, 13, 1, 0, 0, '0000-00-00', '0000-00-00'),
(19, 14, 1, 0, 0, '0000-00-00', '0000-00-00'),
(20, 14, 4, 0, 0, '0000-00-00', '0000-00-00'),
(21, 14, 10, 0, 0, '0000-00-00', '0000-00-00'),
(22, 14, 3, 0, 0, '0000-00-00', '0000-00-00'),
(23, 15, 4, 0, 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_cat_type` int(10) unsigned NOT NULL,
  `product_quantity` int(10) unsigned NOT NULL,
  `product_price` int(10) unsigned NOT NULL,
  `image` varchar(100) NOT NULL,
  `seller_id` int(10) unsigned NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_cat_type`, `product_quantity`, `product_price`, `image`, `seller_id`, `description`) VALUES
(1, 'Oil Painting 1', 1, 120, 4500, 'oil1.jpg', 6, 'Very nice and beautiful picture'),
(2, 'water Painting 1', 1, 10, 450, 'water3.jpg', 6, 'Very Beautiful'),
(3, 'Ink Wash Painting 1', 1, 3, 5000, 'ink2.jpg', 6, 'Nice Picture'),
(4, 'Acrylic Painting 1', 1, 5, 800, 'acry1.jpg', 6, ''),
(9, 'water Painting 2', 1, 10, 5000, 'water1.jpg', 12, 'very nice'),
(11, 'Glass Painting1', 1, 5, 26000, 'glass22.jpg', 4, 'huygjhjk'),
(13, 'kadhkali', 1, 13, 300, 'kadhakali.jpg', 11, 'Kadhakali kerala art'),
(17, 'budha', 1, 20, 200, 'budha.jpg', 11, 'The budha on water painting'),
(20, 'radhakrishna', 1, 12, 150, 'radhakrishna1.jpg', 11, 'beautiful Radha krishna(home decor)'),
(21, 'vigneshwar', 1, 30, 120, 'vignehwar.jpg', 11, 'balaganapathy'),
(22, 'toys', 7, 30, 50, 'clay31.jpg', 6, 'for children\r\nclay toys'),
(23, 'oilwall', 1, 10, 300, 'oil51.jpg', 11, 'wall decor'),
(24, 'glassart', 1, 10, 100, 'glass1.jpg', 11, 'glass art');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `procat_name` varchar(100) NOT NULL,
  `procat_code` varchar(100) NOT NULL,
  `parent` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `procat_name`, `procat_code`, `parent`) VALUES
(1, 'Painting', 'painting 01', 0),
(2, 'Oil Painting', 'Oil Painting 01', 1),
(3, 'Water Painting', 'Water Painting 02', 1),
(4, 'Ink Wah Painting', 'Ink Wah Painting 03', 1),
(5, 'Acrylic Painting ', 'Acrylic Painting 04', 1),
(6, 'Glasss Painting', 'Glasss Painting 05', 1),
(7, 'Clay Modeling', 'Clay Modeling 01', 0),
(8, 'Toys Modeling', 'Toys Modeling 1', 7),
(9, 'pencil dwawing', 'pd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_property`
--

CREATE TABLE IF NOT EXISTS `product_property` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `product_property_name` varchar(100) NOT NULL,
  `product_property` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `product_property`
--

INSERT INTO `product_property` (`id`, `product_id`, `product_property_name`, `product_property`) VALUES
(1, 1, 'Color', 'Red'),
(2, 1, 'Size', '200px'),
(3, 2, 'Color', 'Blue'),
(4, 2, 'Size', '100px'),
(5, 3, 'Color', 'white'),
(6, 3, 'Size', '100px'),
(7, 4, 'Color', 'Red'),
(8, 5, 'Color', 'Red'),
(9, 6, 'Color', 'Green'),
(10, 7, 'Color', 'Red'),
(11, 8, 'Color', 'Brown'),
(12, 9, 'Color', 'Green'),
(13, 10, 'Color', 'Green'),
(14, 11, '', ''),
(15, 12, '', ''),
(16, 13, 'Color', 'Red'),
(17, 14, 'Color', 'Green'),
(18, 15, 'Color', 'Green'),
(19, 16, '', ''),
(20, 17, '', ''),
(21, 17, '', ''),
(22, 18, '', ''),
(23, 18, '', ''),
(24, 19, '', ''),
(25, 20, '', ''),
(26, 21, '', ''),
(27, 22, '', ''),
(28, 23, '', ''),
(29, 24, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `type`, `mobile_number`, `image`, `city`, `district`, `pin`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin', 'Admin', '7896587455', 'staff.jpg', 'payyannur', 'kannur', '865974'),
(5, 'Hari', 'K', 'hari@gmail.com', 'hari', 'hari', 'Buyer', '8965656566', 'man1.jpg', 'Payyannur', 'Palakkade', '96565'),
(6, 'Linju', 'P', 'linju@gmail.com', 'linju', 'linju', 'Artist', '8965741236', 'staff1.jpg', 'Pilathara', 'Kannur', '625485'),
(11, 'Shilpa', 'S', 'shilpa@gmail.com', 'shilpa', 'shilpa', 'Artist', '9856565855', 'female1.jpg', 'kasargod', 'kasargod', '612352'),
(12, 'Neethu', 'p', 'neethu@gmail.com', 'neethu', 'neethu', 'Buyer', '965852656', 'fem2.jpg', 'Payyannur', 'kasargod', '23562'),
(13, 'Greeshma', 'd', 'greeshmavkannan@gmail.com', 'greeshma', 'greeshma', 'Buyer', '9067300256', '', 'Trikaripur', 'Kasargod', '214532'),
(14, 'Dihan', 'd', 'dihandeepu@gmail.com', 'dihan', 'dihan', 'Buyer', '9048810235', '', 'Banglore', 'karnataka', '42552');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
