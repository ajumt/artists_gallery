-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 17, 2020 at 09:40 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artists_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `art_category`
--

DROP TABLE IF EXISTS `art_category`;
CREATE TABLE IF NOT EXISTS `art_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `art_category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

DROP TABLE IF EXISTS `bidding`;
CREATE TABLE IF NOT EXISTS `bidding` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bidding_details`
--

DROP TABLE IF EXISTS `bidding_details`;
CREATE TABLE IF NOT EXISTS `bidding_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bid_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

DROP TABLE IF EXISTS `bids`;
CREATE TABLE IF NOT EXISTS `bids` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bid_name` varchar(100) NOT NULL,
  `artist_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `starting_price` int(10) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `aquired_by` int(10) NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `created_on` datetime NOT NULL,
  `completed` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `bid_name`, `artist_id`, `product_id`, `starting_price`, `start_date`, `end_date`, `aquired_by`, `amount`, `created_on`, `completed`) VALUES
(1, 'nice pic', 5, 1, 1000, '2019-02-19 10:00:00', '2019-04-05 06:00:00', 12, 1500, '2019-02-19 10:00:00', 1),
(2, 'Nice Drawing', 6, 4, 800, '2019-02-20 13:00:00', '2019-04-06 12:00:00', 0, 0, '2019-02-16 00:00:00', 0),
(6, 'great drawing', 5, 13, 1000, '2019-02-16 08:00:00', '2019-04-06 10:00:00', 0, 0, '2019-02-16 08:00:00', 1),
(10, 'great drawing and nice pic', 12, 15, 12000, '2019-02-19 10:00:00', '2019-04-06 07:00:00', 0, 0, '2019-02-19 10:00:00', 1),
(11, 'Best Offer...', 5, 13, 5000, '2019-03-02 10:00:00', '2019-04-06 14:00:00', 0, 0, '2019-03-02 02:29:39', 1),
(12, 'Best Offer...', 5, 13, 45600, '2019-03-12 10:00:00', '2019-04-06 12:30:00', 0, 0, '2019-03-02 02:32:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bid_details`
--

DROP TABLE IF EXISTS `bid_details`;
CREATE TABLE IF NOT EXISTS `bid_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bid_id` int(10) UNSIGNED NOT NULL,
  `buyer_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `created_on` datetime NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bid_details`
--

INSERT INTO `bid_details` (`id`, `bid_id`, `buyer_id`, `amount`, `created_on`, `remarks`) VALUES
(1, 1, 12, 1500, '2019-02-19 10:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_qty` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `product_qty`) VALUES
(2, 12, 1, 1),
(3, 12, 4, 1),
(5, 12, 3, 1),
(6, 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `comment`, `userid`, `created_on`) VALUES
(1, 4, 'Nice Flower', 6, '2019-05-02 00:00:00'),
(2, 2, 'pklklklkl;', 5, '0000-00-00 00:00:00'),
(3, 1, 'fxgh hfgd hgfd', 5, '2019-02-03 00:00:00'),
(5, 1, 'hhgggghhhjj', 5, '2019-02-03 00:00:00'),
(6, 1, 'sdg sd sgsdg sdg sdg sdg s', 5, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '-1',
  `image_amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `message`, `file`, `artist_id`, `status`, `image_amount`) VALUES
(1, 'Create a sculpture of this logo', 'Create a sculpture of this logo', '57209327_1982405588553194_8200648591765667840_n.jpg', 6, 1, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
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

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `account_no` int(10) UNSIGNED NOT NULL,
  `card_no` int(10) UNSIGNED NOT NULL,
  `cvv` int(10) UNSIGNED NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'shopping',
  `type_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `payment_type`, `total`, `product_id`, `account_no`, `card_no`, `cvv`, `type`, `type_id`) VALUES
(1, 12, 'Neethu p                                        Dist:  kasargod                                     ', 'cash', 4500, 0, 0, 0, 0, 'shopping', 0),
(2, 12, 'Neethu p                                        Dist:  kasargod                                     ', 'cash', 5300, 0, 0, 0, 0, 'shopping', 0),
(3, 12, 'Neethu p                                        Dist:  kasargod                                     ', 'cash', 5300, 0, 0, 0, 0, 'shopping', 0),
(4, 5, 'Hari K, Dist:  Palakkade, City:  Payyannur ,Pincode: 96565 ,Phone:8965656566, Email:hari@gmail.com\r\n', 'cash', 4500, 0, 0, 0, 0, 'shopping', 0),
(5, 6, 'Linju', 'cash', 2500, 0, 0, 0, 0, 'Ondemand', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `status` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `shiped_date` date NOT NULL,
  `delivered_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `status`, `shiped_date`, `delivered_date`) VALUES
(1, 1, 1, 1, 0, '0000-00-00', '0000-00-00'),
(2, 2, 1, 2, 1, '2020-06-14', '2020-06-19'),
(3, 2, 4, 2, 1, '2020-06-14', '2020-06-19'),
(4, 3, 1, 0, 0, '0000-00-00', '0000-00-00'),
(5, 3, 4, 0, 0, '0000-00-00', '0000-00-00'),
(6, 4, 1, 0, 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_cat_type` int(10) UNSIGNED NOT NULL,
  `product_quantity` int(10) UNSIGNED NOT NULL,
  `product_price` int(10) UNSIGNED NOT NULL,
  `image` varchar(100) NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_cat_type`, `product_quantity`, `product_price`, `image`, `seller_id`, `description`) VALUES
(1, 'Oil Painting 1', 1, 120, 4500, 'oil1.jpg', 6, 'Very nice and beautiful picture'),
(2, 'water Painting 1', 1, 10, 450, 'water3.jpg', 6, 'Very Beautiful'),
(3, 'Ink Wash Painting 1', 1, 3, 5000, 'ink2.jpg', 6, 'Nice Picture'),
(4, 'Acrylic Painting 1', 1, 5, 800, 'acry1.jpg', 6, 'sdfgfdgf'),
(7, 'Oil Painting 1', 1, 14, 450, 'oil11.jpg', 5, 'Beautiful picture............!!'),
(8, 'Oil Painting 2', 1, 10, 5000, 'oil11.jpg', 5, 'kjkjkjkdfjkdfjkds ujhjhhhhhhhhhhhhhhhh jaaaaaaaaaaaaaaaaaa'),
(9, 'water Painting 2', 1, 10, 5000, 'water1.jpg', 12, 'very nice'),
(10, 'Glass Painting 2', 1, 10, 4000, 'glass21.jpg', 12, 'very nice'),
(11, 'Glass Painting1', 1, 5, 26000, 'glass22.jpg', 4, 'huygjhjk'),
(12, 'Oil Painting 3', 1, 10, 3000, 'oil12.jpg', 11, 'swfefcedsfcsdv wefesfvsvsdfc'),
(13, 'water Painting 1', 1, 13, 3000, 'water11.jpg', 5, 'sgdgfdfgdfgfg'),
(15, 'Oil Painting 1', 1, 10, 13000, 'oil13.jpg', 12, 'ddgdfg sd dgdfg ffbghdf'),
(16, 'water Painting 1', 1, 11, 120, 'water12.jpg', 12, 'ghjhvhjg fjhjgfhh');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `procat_name` varchar(100) NOT NULL,
  `procat_code` varchar(100) NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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
(8, 'Toys Modeling', 'Toys Modeling 1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `product_property`
--

DROP TABLE IF EXISTS `product_property`;
CREATE TABLE IF NOT EXISTS `product_property` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_property_name` varchar(100) NOT NULL,
  `product_property` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

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
(19, 16, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `type`, `mobile_number`, `image`, `city`, `district`, `pin`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'Admin', 'admin', 'Admin', '7896587455', 'staff.jpg', 'payyannur', 'kannur', '865974'),
(5, 'Hari', 'K', 'hari@gmail.com', 'hari', 'hari', 'Buyer', '8965656566', 'man1.jpg', 'Payyannur', 'Palakkade', '96565'),
(6, 'Linju', 'P', 'linju@gmail.com', 'linju', 'linju', 'Artist', '8965741236', 'staff1.jpg', 'Pilathara', 'Kannur', '625485'),
(11, 'Harsha', 'S', 'Harsha@gmail.com', 'harsha', 'harsha', 'Artist', '9856565855', 'female1.jpg', 'parassinikadave', 'Kannur', '612352'),
(12, 'Neethu', 'p', 'neethu@gmail.com', 'neethu', 'neethu', 'Buyer', '965852656', 'fem2.jpg', 'Payyannur', 'kasargod', '23562'),
(13, 'Aju', 'm t', 'ajumt@gmail.com', 'ajumt', 'pass', 'Buyer', '9947044038', '47907ca2aaaf44ef160e0211479c7160.png', 'Payyannur', 'Kannur', '670307');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
