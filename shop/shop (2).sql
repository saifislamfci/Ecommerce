-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2020 at 10:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `adminid` int(10) NOT NULL,
  `adName` varchar(2155) NOT NULL,
  `adUser` varchar(255) NOT NULL,
  `adEmail` varchar(255) NOT NULL,
  `adPass` varchar(255) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`adminid`, `adName`, `adUser`, `adEmail`, `adPass`, `level`) VALUES
(1, 'Saiful Islam Sharif', 'admin', 'saifislamfci@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(10) NOT NULL,
  `brandname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brandname`) VALUES
(1, 'ACER'),
(5, 'SAMSUNG'),
(8, 'IPHONE'),
(9, 'CANON');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartid` int(10) NOT NULL,
  `ssid` varchar(255) NOT NULL,
  `pdid` int(10) NOT NULL,
  `pdname` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quentity` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartid`, `ssid`, `pdid`, `pdname`, `price`, `quentity`, `image`) VALUES
(5, 'jjg7k03b4scds6lmh9emneict0', 32, 'Lorem Ipsum is simply', 350, 2, '256029d4ec.png'),
(6, 'jjg7k03b4scds6lmh9emneict0', 32, 'Lorem Ipsum is simply', 350, 2, '256029d4ec.png'),
(7, 'jjg7k03b4scds6lmh9emneict0', 32, 'Lorem Ipsum is simply', 350, 3, '256029d4ec.png'),
(8, 'rkof9jokka5pvsl202jknhm73h', 31, 'Lorem Ipsum is simply', 415, 2, 'd147f41881.png'),
(9, 'rkof9jokka5pvsl202jknhm73h', 31, 'Lorem Ipsum is simply', 415, 1, 'd147f41881.png'),
(10, 'rkof9jokka5pvsl202jknhm73h', 30, 'Lorem Ipsum is simply', 220.87, 1, '956e910810.jpg'),
(11, 'jjg7k03b4scds6lmh9emneict0', 31, 'Lorem Ipsum is simply', 415, 3, 'd147f41881.png'),
(12, 'jjg7k03b4scds6lmh9emneict0', 30, 'Lorem Ipsum is simply', 220.87, 1, '956e910810.jpg'),
(41, 'vkhe2pboa2pegr7ccjfq52f5kp', 32, 'Lorem Ipsum is simply', 350, 1, '256029d4ec.png'),
(42, 'vkhe2pboa2pegr7ccjfq52f5kp', 31, 'Lorem Ipsum is simply', 415, 1, 'd147f41881.png'),
(48, 'c4na0qj5h73eve2japd2405at0', 29, 'Lorem Ipsum is simply', 620, 1, '57978f59d9.jpg'),
(51, 'lkmg7i4lcmrt870cv2dk9ipbc2', 30, 'Lorem Ipsum is simply', 220.87, 1, '956e910810.jpg'),
(52, 'lkmg7i4lcmrt870cv2dk9ipbc2', 26, 'IPHONE', 800, 1, '66c1a15e23.png'),
(53, 'lkmg7i4lcmrt870cv2dk9ipbc2', 29, 'Lorem Ipsum is simply', 620, 1, '57978f59d9.jpg'),
(54, 'adjqi02ubnsl1fin5goitelack', 31, 'Lorem Ipsum is simply', 415, 1, 'd147f41881.png'),
(68, '3a9sa0vpnndojiu4kqnshln83s', 31, 'Lorem Ipsum is simply', 415, 1, 'd147f41881.png'),
(79, 'nnlfll6lom7iki9vcs3rcnq0do', 26, 'IPHONE', 800, 1, '66c1a15e23.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

CREATE TABLE `tbl_cat` (
  `id` int(10) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`id`, `cat_name`) VALUES
(12, 'Mobiles Phones'),
(13, 'Desktop'),
(14, 'Accessories'),
(15, 'Software'),
(16, 'Sports &amp; Fitness'),
(17, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(255) NOT NULL,
  `cmr_id` int(11) NOT NULL,
  `pdid` int(11) NOT NULL,
  `pdname` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `cmr_id`, `pdid`, `pdname`, `price`, `image`) VALUES
(24, 5, 30, 'Lorem Ipsum is simply', 110.63, '956e910810.jpg'),
(33, 4, 26, 'IPHONE', 800, '66c1a15e23.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` int(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `city`, `zip`, `email`, `address`, `country`, `phone`, `pass`) VALUES
(4, 'saiful islam sharif', 'comilla', 1200, 'saifislamfci@gmail.com', 'suangonj,comilla', 'Bangladesh', 1872330757, '202cb962ac59075b964b07152d234b70'),
(5, 'Touhidul Islam NOman', 'comilla', 1300, 'saif109152@gmail.com', 'suangonj,comilla', 'Bangladesh', 1829145724, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(255) NOT NULL,
  `cmr_id` int(255) NOT NULL,
  `pdid` int(255) NOT NULL,
  `pdname` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quentity` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pdid` int(11) NOT NULL,
  `pdname` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pdid`, `pdname`, `catid`, `brandid`, `body`, `price`, `image`, `type`) VALUES
(15, 'ACER', 13, 9, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, iste! Tenetur praesentium iste, reiciendis dignissimos adipisci libero. Ullam odit rem tempore, labore deserunt, inventore error praesentium recusandae aspernatur quaerat nesciunt!</p>', 800, 'afd0401547.jpg', 1),
(26, 'IPHONE', 14, 8, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum ea inventore odit totam nisi maxime consequatur pariatur veniam natus, officia! Corrupti eum ipsam fugiat sequi, eius necessitatibus dolorum laboriosam aspernatur!</p>', 800, '66c1a15e23.png', 0),
(27, 'Lorem Ipsum is simply', 14, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum ea inventore odit totam nisi maxime consequatur pariatur veniam natus, officia! Corrupti eum ipsam fugiat sequi, eius necessitatibus dolorum laboriosam aspernatur!</p>', 200, '58af95a296.png', 1),
(28, 'Lorem Ipsum is simply', 14, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum ea inventore odit totam nisi maxime consequatur pariatur veniam natus, officia! Corrupti eum ipsam fugiat sequi, eius necessitatibus dolorum laboriosam aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum ea inventore odit totam nisi maxime consequatur pariatur veniam natus, officia! Corrupti eum ipsam fugiat sequi, eius necessitatibus dolorum laboriosam aspernatur!vLorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum ea inventore odit totam nisi maxime consequatur pariatur veniam natus, officia! Corrupti eum ipsam fugiat sequi, eius necessitatibus dolorum laboriosam aspernatur!</p>', 1000, '01f234caad.png', 0),
(29, 'Lorem Ipsum is simply', 14, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem in molestias animi doloremque nihil cum illo commodi, quae suscipit eveniet a tempore veniam quasi reiciendis. Minus placeat sequi, dolores nisi!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem in molestias animi doloremque nihil cum illo commodi, quae suscipit eveniet a tempore veniam quasi reiciendis. Minus placeat sequi, dolores nisi!</p>', 620, '57978f59d9.jpg', 0),
(30, 'Lorem Ipsum is simply', 14, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem in molestias animi doloremque nihil cum illo commodi, quae suscipit eveniet a tempore veniam quasi reiciendis. Minus placeat sequi, dolores nisi!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem in molestias animi doloremque nihil cum illo commodi, quae suscipit eveniet a tempore veniam quasi reiciendis. Minus placeat sequi, dolores nisi!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem in molestias animi doloremque nihil cum illo commodi, quae suscipit eveniet a tempore veniam quasi reiciendis. Minus placeat sequi, dolores nisi!</p>', 110.63, '956e910810.jpg', 0),
(31, 'Lorem Ipsum is simply', 14, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem in molestias animi doloremque nihil cum illo commodi, quae suscipit eveniet a tempore veniam quasi reiciendis. Minus placeat sequi, dolores nisi!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem in molestias animi doloremque nihil cum illo commodi, quae suscipit eveniet a tempore veniam quasi reiciendis. Minus placeat sequi, dolores nisi!</p>', 415, 'd147f41881.png', 0),
(32, 'Lorem Ipsum is simply', 14, 5, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem in molestias animi doloremque nihil cum illo commodi, quae suscipit eveniet a tempore veniam quasi reiciendis. Minus placeat sequi, dolores nisi!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem in molestias animi doloremque nihil cum illo commodi, quae suscipit eveniet a tempore veniam quasi reiciendis. Minus placeat sequi, dolores nisi!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem in molestias animi doloremque nihil cum illo commodi, quae suscipit eveniet a tempore veniam quasi reiciendis. Minus placeat sequi, dolores nisi!</p>', 350, '256029d4ec.png', 0),
(33, 'Lorem Ipsum is simply', 17, 9, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum ea inventore odit totam nisi maxime consequatur pariatur veniam natus, officia! Corrupti eum ipsam fugiat sequi, eius necessitatibus dolorum laboriosam aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum ea inventore odit totam nisi maxime consequatur pariatur veniam natus, officia! Corrupti eum ipsam fugiat sequi, eius necessitatibus dolorum laboriosam aspernatur!vLorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum ea inventore odit totam nisi maxime consequatur pariatur veniam natus, officia! Corrupti eum ipsam fugiat sequi, eius necessitatibus dolorum laboriosam aspernatur!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum ea inventore odit totam nisi maxime consequatur pariatur veniam natus, officia! Corrupti eum ipsam fugiat sequi, eius necessitatibus dolorum laboriosam aspernatur!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum ea inventore odit totam nisi maxime consequatur pariatur veniam natus, officia! Corrupti eum ipsam fugiat sequi, eius necessitatibus dolorum laboriosam aspernatur!vLorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum ea inventore odit totam nisi maxime consequatur pariatur veniam natus, officia! Corrupti eum ipsam fugiat sequi, eius necessitatibus dolorum laboriosam aspernatur!</p>', 800, 'd84ae3ad64.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pdid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `adminid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
