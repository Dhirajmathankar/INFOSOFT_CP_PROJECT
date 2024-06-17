-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 10:19 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shree_sai_industries`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `aid` int(11) NOT NULL,
  `login_id` text,
  `emp_type` text,
  `user_type` text,
  `fullname` text,
  `gender` text,
  `father_name` text,
  `dob` date DEFAULT NULL,
  `mobile` text,
  `emailid` text,
  `user_password` text,
  `local_address` text,
  `adhar_no` text,
  `permanent_address` text,
  `status` text,
  `created_date` date DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`aid`, `login_id`, `emp_type`, `user_type`, `fullname`, `gender`, `father_name`, `dob`, `mobile`, `emailid`, `user_password`, `local_address`, `adhar_no`, `permanent_address`, `status`, `created_date`, `updated_date`) VALUES
(1, 'admin', 'Super Admin', 'Superadmin', 'Admin', 'Male', 'NA', NULL, '9827226914', 'shrisaiindustriesbetul@gamil.com', 'admin', 'Ashish Container Service 236-A Hari Ganga Nagar,Near Indus Town, Hoshangabad Road,Bhopal - 462 026 (MP', 'NA', 'Ashish Container Service 236-A Hari Ganga Nagar,Near Indus Town, Hoshangabad Road,Bhopal - 462 026 (MP', 'Active', '2021-07-03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill_master`
--

CREATE TABLE `bill_master` (
  `bid` int(11) NOT NULL,
  `billid` varchar(20) DEFAULT NULL,
  `paymentType` text,
  `cid` int(11) DEFAULT NULL,
  `inclusive` varchar(20) DEFAULT NULL,
  `narration` text,
  `customerGSTNo` text,
  `partyType` text,
  `qtyTotal` varchar(20) DEFAULT NULL,
  `priceTotal` varchar(20) DEFAULT NULL,
  `gstAmountTotal` varchar(20) DEFAULT NULL,
  `sgstAmountTotal` varchar(20) DEFAULT NULL,
  `customerStateCode` varchar(20) DEFAULT NULL,
  `gstTotal` varchar(20) DEFAULT NULL,
  `totalAmount` varchar(20) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_master`
--

INSERT INTO `bill_master` (`bid`, `billid`, `paymentType`, `cid`, `inclusive`, `narration`, `customerGSTNo`, `partyType`, `qtyTotal`, `priceTotal`, `gstAmountTotal`, `sgstAmountTotal`, `customerStateCode`, `gstTotal`, `totalAmount`, `createdDate`, `status`) VALUES
(41, 'SGAG-0001', 'yes', 1, NULL, NULL, NULL, NULL, '14', '506', '103', '103', '2266', '206', '2266', '2022-01-10 13:58:36', 'Active'),
(42, 'SGAG-0002', 'no', 1, NULL, NULL, NULL, NULL, '10', '3000', '1800', '1800', '18600', '3600', '18600', '2022-01-10 14:01:56', 'Active'),
(44, 'SGAG-0004', 'no', 1, NULL, NULL, NULL, NULL, '5', '1500', '900', '900', '9300', '1800', '9300', '2022-01-11 08:59:07', 'Active'),
(45, 'SGAG-0005', 'no', 1, NULL, '', NULL, NULL, '0', '0', '0', '0', '0', '0', '0', '2022-01-11 09:00:22', 'Active'),
(46, 'SGAG-0006', 'no', 1, NULL, 'ggggg', NULL, NULL, '0', '0', '0', '0', '0', '0', '0', '2022-01-11 09:05:00', 'Active'),
(47, 'SGAG-0007', 'no', 2, NULL, 'ddd', '456655223', NULL, '3', '506', '50.3', '50.3', '1107', '100.6', '1107', '2022-01-12 05:54:28', 'Active'),
(48, 'SGAG-0008', 'no', 2, NULL, 'gfghf', '65565665', NULL, '11', '1000', '275', '275', '5500', '550', '5500', '2022-01-13 08:03:59', 'Active'),
(49, 'SGAG-0009', 'no', 1, NULL, '', 'GGGG5555', NULL, '5', '500', '125', '125', '2750', '250', '2750', '2022-01-13 08:14:15', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `customerName` text,
  `customerAddress` text,
  `customerState` text,
  `customerStateCode` text,
  `customerCity` text,
  `customerPINCode` text,
  `customerMobileNo` text,
  `customerMobileNo1` text,
  `customerEmailID` text,
  `customerGSTNo` text,
  `customerAdhaarNo` varchar(20) DEFAULT NULL,
  `customerPANNo` text,
  `customerOpeningBalance` text,
  `customerClosingBalance` text,
  `partyType` text,
  `bankAccountNo` text,
  `bankifscCode` text,
  `statusCustomer` text,
  `createdDateCustomer` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `customerName`, `customerAddress`, `customerState`, `customerStateCode`, `customerCity`, `customerPINCode`, `customerMobileNo`, `customerMobileNo1`, `customerEmailID`, `customerGSTNo`, `customerAdhaarNo`, `customerPANNo`, `customerOpeningBalance`, `customerClosingBalance`, `partyType`, `bankAccountNo`, `bankifscCode`, `statusCustomer`, `createdDateCustomer`) VALUES
(1, 'Ram Bharat Ji', 'H. No.5 Bhopal', 'Kerala', '32', 'Changanassery', '462022', '7897897890', '9879879879', 'testing@testing.com', 'GGGG5555', '789789789789', 'CD45M550', '5000', '5000', 'GST Dealer', '4455445544554455', 'DDD444', 'Active', '2022-01-05 18:54:28'),
(2, 'New', 'Pta Nhi', 'Kerala', '23', 'Bhopal', '462022', '7897897898', '7897897898', NULL, '65565665', '7897897898', '7897897898', NULL, NULL, 'NA5', NULL, NULL, 'Active', '2022-01-06 13:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `group_master`
--

CREATE TABLE `group_master` (
  `gid` int(11) NOT NULL,
  `group_name` varchar(50) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_master`
--

INSERT INTO `group_master` (`gid`, `group_name`, `status`, `created_date`) VALUES
(1, 'ACC', 'Active', '2022-01-05'),
(3, 'jdddddd', 'Active', '2022-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `itemlist`
--

CREATE TABLE `itemlist` (
  `itemid` int(11) NOT NULL,
  `bid` int(11) DEFAULT NULL,
  `pid` text,
  `qty` text,
  `price` text,
  `unit` text,
  `gst` text,
  `gstamount` text,
  `total` text,
  `createdDate` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemlist`
--

INSERT INTO `itemlist` (`itemid`, `bid`, `pid`, `qty`, `price`, `unit`, `gst`, `gstamount`, `total`, `createdDate`, `status`) VALUES
(3, 41, '1', '10', '6', 'pic', '5', NULL, '66', NULL, NULL),
(4, 41, '4', '4', '500', '500', '5', NULL, '2200', NULL, NULL),
(5, 42, '2', '5', '1500', '10', '12', '900.00', '9300', NULL, NULL),
(6, 42, '2', '5', '1500', '10', '12', '900.00', '9300', NULL, NULL),
(9, 44, '2', '5', '1500', '10', '12', '900.00', '9300', NULL, NULL),
(10, 47, '4', '2', '500', '500', '5', '50.00', '1100', NULL, NULL),
(11, 47, '1', '1', '6', 'pic', '5', '0.30', '7', NULL, NULL),
(12, 48, '4', '10', '500', '500', '5', '250.00', '5000', NULL, NULL),
(13, 48, '4', '1', '500', '500', '5', '25.00', '500', NULL, NULL),
(14, 49, '4', '5', '500', '500', '5', '125.00', '2750', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `product_id` text,
  `product_name` text,
  `product_company_name` text,
  `price` text,
  `hsn_code` text,
  `unit` text,
  `gst` text,
  `status` text,
  `createdDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `gid`, `product_id`, `product_name`, `product_company_name`, `price`, `hsn_code`, `unit`, `gst`, `status`, `createdDate`) VALUES
(1, NULL, 'SGAG-0001', 'aa', 'fdf55', '6', 'gh', 'pic', '5', 'Active', '2021-10-28'),
(2, NULL, 'SGAG-0002', 'jhg cxvnfdkjl', 'bs', '1500', '22', '10', '12', 'Active', '2022-01-05'),
(3, 3, 'SGAG-0003', 'test', 'TEST1', '45', '5555', 'Kg', '18', 'Active', '2022-01-05'),
(4, 1, 'SGAG-0004', 'ddddddd', 'aaaaaaaaaa', '500', '454554', '500', '5', 'Active', '2022-01-05'),
(5, 1, 'SGAG-0005', 'gghhg', 'gfdhf', '1000', 'dgg4555', 'KG', '12', 'Active', '2022-01-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `bill_master`
--
ALTER TABLE `bill_master`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `group_master`
--
ALTER TABLE `group_master`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `itemlist`
--
ALTER TABLE `itemlist`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill_master`
--
ALTER TABLE `bill_master`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_master`
--
ALTER TABLE `group_master`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `itemlist`
--
ALTER TABLE `itemlist`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
