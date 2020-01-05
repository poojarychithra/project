-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2017 at 01:31 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineauction`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE `bidding` (
  `bidding_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `bidding_amount` float(10,2) NOT NULL,
  `bidding_date_time` datetime NOT NULL,
  `note` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`bidding_id`, `customer_id`, `product_id`, `bidding_amount`, `bidding_date_time`, `note`, `status`) VALUES
(1, 101, 24, 500.00, '2017-12-13 00:00:00', 'sorry you are not a customer', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billing_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_amount` float(10,2) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `expire_date` date NOT NULL,
  `cvv_number` varchar(5) NOT NULL,
  `card_holder` varchar(50) NOT NULL,
  `delivery_date` date NOT NULL,
  `note` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billing_id`, `customer_id`, `product_id`, `purchase_date`, `purchase_amount`, `payment_type`, `card_number`, `expire_date`, `cvv_number`, `card_holder`, `delivery_date`, `note`, `status`) VALUES
(1, 203, 55, '2017-12-06', 5000.00, 'online', '300', '2017-12-31', '10', 'ssfdgbf', '2018-01-01', 'thankyou monkey', 'tdfcjdfgyh');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_icon` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_icon`, `description`, `status`) VALUES
(50, 'suha', 'Jellyfish.jpg', 'test', 'Active'),
(51, 'ABCDgg', '', 'Test descriptionjnn', 'Active'),
(52, 'XYZ', 'hallbooking.doc', 'PQIE', 'Active'),
(53, 'uuu', 'Hospital Management System.doc', 'vvv', 'Active'),
(54, 'ddddd', 'two.php', 'dddd', 'Active'),
(55, 'ddddd', 'two.php', 'dddd', 'Inactive'),
(56, 'ddddd', 'two.php', 'dddd', 'Inactive'),
(57, 'ddddd', 'two.php', 'dddd', 'Inactive'),
(58, 'ddddd', 'two.php', 'dddd', 'Inactive'),
(59, 'ddddd', 'two.php', 'dddd', 'Inactive'),
(60, 'ddddd', 'two.php', 'dddd', 'Inactive'),
(61, 'ddddd', 'two.php', 'dddd', 'Inactive'),
(62, 'ddddd', 'two.php', 'dddd', 'Inactive'),
(63, 'ddddd', 'two.php', 'dddd', 'Inactive'),
(64, 'ddddd', 'two.php', 'dddd', 'Inactive'),
(65, 'ddddd', 'two.php', 'dddd', 'Inactive'),
(66, 'ddddd', 'two.php', 'dddd', 'Inactive'),
(67, 'Car', 'hallbooking.doc', 'caracar', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `email_id`, `password`, `address`, `state`, `city`, `landmark`, `pincode`, `mobile_no`, `note`, `status`) VALUES
(40, 'deasfg', 'email@gmail.com', '123456789', 'gfcgnsfhdshjvsrnseyj', 'karnatafsh', 'fhgdcfgnjh', 'gchjbj', '456789', '3456789345', 'tryhfikhgjfghju', 'Active'),
(41, 'Raj kiran', 'email1@gmail.com', '123456789', 'gfcgnsfhdshjvsrnseyj', 'karnatafsh', 'fhgdcfgnjh', 'gchjbj', '456789', '3456789345', 'tryhfikhgjfghju', 'Active'),
(42, 'rupesh', 'rupesh@gmail.com', '123456789', '', '', '', '', '', '7894561230', '', 'Active'),
(43, 'Peter', 'peter@gmail.com', '123456789', '3rd floor, city light building', 'Karnataka', 'MAngalore', 'City centre', '748945', '7894561230', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(10) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `login_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `emp_type` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `emp_name`, `login_id`, `password`, `emp_type`, `status`) VALUES
(44, 'Raj kiran', 'suha@gmail.com', '123123', 'Admin', 'active'),
(45, 'sghh', 's', 'u', '', ''),
(46, 'yuiuhg', 'gyg', 'gg', '', 'Active'),
(47, 'yuiuhg', 'gyg', 'gg', '', 'Active'),
(48, 'ygy', 'vvvv', '  ', 'Employee', 'Active'),
(49, 'nhbbn', 'bbj', 'nn', 'Employee', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `receiver_id` int(10) NOT NULL,
  `message_date_time` datetime NOT NULL,
  `product_id` int(10) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `product_id` int(10) NOT NULL,
  `bidding_id` int(10) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `customer_id`, `payment_type`, `product_id`, `bidding_id`, `paid_amount`, `paid_date`, `status`) VALUES
(55, 77, 'vbvcnvbmbn', 98, 55, 15000.00, '2017-12-06', 'fhgfj'),
(56, 0, '', 0, 0, 0.00, '0000-00-00', ''),
(57, 0, '', 0, 0, 0.00, '0000-00-00', ''),
(58, 0, '', 0, 0, 0.00, '0000-00-00', ''),
(59, 0, '', 0, 0, 0.00, '0000-00-00', ''),
(60, 0, '', 0, 0, 0.00, '0000-00-00', ''),
(61, 0, '', 0, 0, 0.00, '0000-00-00', ''),
(62, 0, '', 0, 0, 0.00, '0000-00-00', ''),
(63, 0, '', 0, 0, 0.00, '0000-00-00', ''),
(64, 0, '', 0, 0, 0.00, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category_id` int(10) NOT NULL,
  `product_description` text NOT NULL,
  `starting_bid` float(10,2) NOT NULL,
  `ending_bid` float(10,2) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `product_cost` float(10,2) NOT NULL,
  `product_images` varchar(100) NOT NULL,
  `product_warranty` varchar(100) NOT NULL,
  `product_delivery` text NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `bidding_type` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `customer_id`, `product_name`, `category_id`, `product_description`, `starting_bid`, `ending_bid`, `start_date_time`, `end_date_time`, `product_cost`, `product_images`, `product_warranty`, `product_delivery`, `company_name`, `bidding_type`, `status`) VALUES
(66, 88, 'tfygjngh', 77, 'dfhgfcjnvbcvb', 50.00, 15000.00, '2017-12-20 00:00:00', '2017-12-22 00:00:00', 5000.00, 'hghgvfhngcjmvhbm', 'sdfdxhgbgvh', 'dfhfgmjhvnmcfvggbhbh', 'dfgdfcjnfghjkf', 'dfgdxhgfd', 'sdgf'),
(67, 0, 'ABCD', 0, 'TEst abcd', 789.00, 413131.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 500.00, 'Koala.jpg', '3', 'test', 'test', 'est', 'Active'),
(68, 0, 'ABCD', 0, 'TEst abcd', 789.00, 413131.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 500.00, 'Koala.jpg', '3', 'test', 'test', 'est', 'Active'),
(69, 0, 'ABCD', 0, 'TEst abcd', 789.00, 413131.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 500.00, 'Koala.jpg', '3', 'test', 'test', 'est', 'Active'),
(70, 0, 'TEst1123', 0, 'Test2a abcd werrrrrrr', 1.00, 2.00, '2017-12-06 01:00:00', '2017-01-01 01:00:00', 200.00, '', '5', 'testf snvf', 'test', 'test', ''),
(71, 0, 'Test product', 0, 'Test description', 41.00, 556.00, '2017-12-31 12:59:00', '2017-12-31 12:59:00', 500.00, '3873Big_1.jpg', '1', 'test delivery', 'test comp', 'test', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `winner_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `winners_image` varchar(100) NOT NULL,
  `winning_bid` float(10,2) NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `winners`
--

INSERT INTO `winners` (`winner_id`, `product_id`, `customer_id`, `winners_image`, `winning_bid`, `end_date`, `status`) VALUES
(1, 0, 0, '27616BB.jpg', 500.00, '2017-05-25', 'Active'),
(2, 0, 0, '9479BB.jpg', 500.00, '2017-05-25', 'Active'),
(3, 0, 0, '10188BB.jpg', 500.00, '2017-05-25', 'Active'),
(4, 0, 0, '5684BB.jpg', 500.00, '2017-05-25', 'Active'),
(5, 0, 0, '31837BB.jpg', 500.00, '2017-05-25', 'Active'),
(6, 0, 0, '31186BB.jpg', 500.00, '2017-05-25', 'Active'),
(7, 0, 0, '15335BB.jpg', 500.00, '2017-05-25', 'Active'),
(8, 0, 0, '5012image1303.jpg', 44.00, '2017-12-07', 'Active'),
(9, 0, 0, '24889image1303.jpg', 44.00, '2017-12-07', 'Active'),
(10, 0, 0, '24992image1303.jpg', 44.00, '2017-12-07', 'Active'),
(11, 0, 0, '8490image1303.jpg', 44.00, '2017-12-07', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`bidding_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`winner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `bidding_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billing_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `winner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
