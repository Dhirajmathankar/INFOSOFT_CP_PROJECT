-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 09:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashish_container`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `aid` int(11) NOT NULL,
  `login_id` text DEFAULT NULL,
  `emp_type` text DEFAULT NULL,
  `user_type` text DEFAULT NULL,
  `fullname` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `father_name` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `emailid` text DEFAULT NULL,
  `user_password` text DEFAULT NULL,
  `local_address` text DEFAULT NULL,
  `adhar_no` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`aid`, `login_id`, `emp_type`, `user_type`, `fullname`, `gender`, `father_name`, `dob`, `mobile`, `emailid`, `user_password`, `local_address`, `adhar_no`, `permanent_address`, `status`, `created_date`, `updated_date`) VALUES
(1, 'ACS-0001', 'Super Admin', 'Superadmin', 'Mohan Dhoke', 'Male', 'NA', NULL, '9977425237', 'mohan@ashishcontainer.com', 'acslogin', 'Ashish Container Service 236-A Hari Ganga Nagar,Near Indus Town, Hoshangabad Road,Bhopal - 462 026 (MP)', 'NA', 'Ashish Container Service 236-A Hari Ganga Nagar,Near Indus Town, Hoshangabad Road,Bhopal - 462 026 (MP)', 'Active', '2021-07-03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill_tbl`
--

CREATE TABLE `bill_tbl` (
  `blid` int(11) NOT NULL,
  `obid` int(11) NOT NULL,
  `cuid` int(11) DEFAULT NULL,
  `brid` int(11) DEFAULT NULL,
  `billDate` date DEFAULT NULL,
  `billTime` time DEFAULT NULL,
  `billNo` text DEFAULT NULL,
  `trailorNo` text DEFAULT NULL,
  `lrGrNo` text DEFAULT NULL,
  `lrGrDate` date DEFAULT NULL,
  `loadingPoint` text DEFAULT NULL,
  `offLoadingPoint` text DEFAULT NULL,
  `shippingLine` text DEFAULT NULL,
  `portOfDischarge` text DEFAULT NULL,
  `grossWeight` text DEFAULT NULL,
  `jobReference` text DEFAULT NULL,
  `exRate` text DEFAULT NULL,
  `sacNo` text DEFAULT NULL,
  `qty` text DEFAULT NULL,
  `remarks1` text DEFAULT NULL,
  `remarks2` text DEFAULT NULL,
  `description1` text DEFAULT NULL,
  `description2` text DEFAULT NULL,
  `unitRate` text DEFAULT NULL,
  `totalAmt` text DEFAULT NULL,
  `otherChargeText` text DEFAULT NULL,
  `otherChargeINR` text DEFAULT NULL,
  `otherDeductionINR` text DEFAULT NULL,
  `gstApplicable` text DEFAULT NULL,
  `gstAmt` text DEFAULT NULL,
  `invoiceAmtInWords` text DEFAULT NULL,
  `invoiceAmt` text DEFAULT NULL,
  `grossAmt` text DEFAULT NULL,
  `statusPayment` text DEFAULT NULL,
  `updatedDateBill` date DEFAULT NULL,
  `updatedTimeBill` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `broker_tbl`
--

CREATE TABLE `broker_tbl` (
  `brid` int(11) NOT NULL,
  `brokerName` text DEFAULT NULL,
  `brokerAddress` text DEFAULT NULL,
  `brokerCity` text DEFAULT NULL,
  `brokerPINCode` text DEFAULT NULL,
  `brokerState` text DEFAULT NULL,
  `brokerStateCode` text DEFAULT NULL,
  `brokerMobileNo` text DEFAULT NULL,
  `brokerMobileNo1` text DEFAULT NULL,
  `brokerEmailID` text DEFAULT NULL,
  `brokerGSTNo` text DEFAULT NULL,
  `brokerPANNo` text DEFAULT NULL,
  `brokerOpeningBalance` text DEFAULT NULL,
  `brokerClosingBalance` text DEFAULT NULL,
  `statusBroker` text DEFAULT NULL,
  `createdDateBroker` date DEFAULT NULL,
  `createdTimeBroker` time DEFAULT NULL,
  `updatedDateBroker` date DEFAULT NULL,
  `updatedTimeBroker` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `broker_tbl`
--

INSERT INTO `broker_tbl` (`brid`, `brokerName`, `brokerAddress`, `brokerCity`, `brokerPINCode`, `brokerState`, `brokerStateCode`, `brokerMobileNo`, `brokerMobileNo1`, `brokerEmailID`, `brokerGSTNo`, `brokerPANNo`, `brokerOpeningBalance`, `brokerClosingBalance`, `statusBroker`, `createdDateBroker`, `createdTimeBroker`, `updatedDateBroker`, `updatedTimeBroker`) VALUES
(5, 'Self', 'Bhopal', 'Bhopal', '', 'Madhya Pradesh', '23', '', '', '', '', '', '', '', 'Active', '2021-07-26', NULL, NULL, NULL),
(6, 'Self1', 'Fdg', 'Naharlagun', '', 'Arunachal Pradesh', '12', '', '', '', '', '', '', '', 'Active', '2021-08-01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `cuid` int(11) NOT NULL,
  `customerName` text DEFAULT NULL,
  `customerAddress` text DEFAULT NULL,
  `customerCity` text DEFAULT NULL,
  `customerPINCode` text DEFAULT NULL,
  `customerState` text DEFAULT NULL,
  `customerStateCode` text DEFAULT NULL,
  `customerMobileNo` text DEFAULT NULL,
  `customerMobileNo1` text DEFAULT NULL,
  `customerEmailID` text DEFAULT NULL,
  `customerGSTNo` text DEFAULT NULL,
  `customerPANNo` text DEFAULT NULL,
  `customerOpeningBalance` text DEFAULT NULL,
  `customerClosingBalance` text DEFAULT NULL,
  `statusCustomer` text DEFAULT NULL,
  `createdDateCustomer` date DEFAULT NULL,
  `createdTimeCustomer` time DEFAULT NULL,
  `updatedDateCustomer` date DEFAULT NULL,
  `updatedTimeCustomer` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`cuid`, `customerName`, `customerAddress`, `customerCity`, `customerPINCode`, `customerState`, `customerStateCode`, `customerMobileNo`, `customerMobileNo1`, `customerEmailID`, `customerGSTNo`, `customerPANNo`, `customerOpeningBalance`, `customerClosingBalance`, `statusCustomer`, `createdDateCustomer`, `createdTimeCustomer`, `updatedDateCustomer`, `updatedTimeCustomer`) VALUES
(8, 'CENTRAL ROADWAYS OF INDIA', 'C- 633, 6TH FLOOR, STEEL CHAMBER TOWER, PLOT NO.514, SECTOR KWC, KALAMBOLI, NAVI MUMBAI - 410218', 'Mumbai', '', 'Maharashtra', '27', '', '', '', '', '', '', '', 'Active', '2021-07-26', NULL, NULL, NULL),
(9, 'Cust2', 'Dad', 'Naharlagun', '', 'Arunachal Pradesh', '12', '', '', '', '', '', '', '', 'Active', '2021-08-01', NULL, '2021-08-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_tbl`
--

CREATE TABLE `maintenance_tbl` (
  `mid` int(11) NOT NULL,
  `maintenanceNo` text DEFAULT NULL,
  `maintenanceDate` date DEFAULT NULL,
  `maintenanceTime` time DEFAULT NULL,
  `vehicleNo` text DEFAULT NULL,
  `maintenanceAmt` text DEFAULT NULL,
  `narration` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `updatedDateM` date DEFAULT NULL,
  `updatedTimeM` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_booking_list_tbl`
--

CREATE TABLE `order_booking_list_tbl` (
  `oblistid` int(11) NOT NULL,
  `obid` int(11) DEFAULT NULL,
  `bhid` int(11) DEFAULT NULL,
  `containerNo` text DEFAULT NULL,
  `lrGrNo` text DEFAULT NULL,
  `lrGrDate` date DEFAULT NULL,
  `otherPartyInvoiceNo` text DEFAULT NULL,
  `bookingSACNo` text DEFAULT NULL,
  `orderDate` date DEFAULT NULL,
  `expensesDiesel` text DEFAULT NULL,
  `expensesToll` text DEFAULT NULL,
  `expensesOther1` text DEFAULT NULL,
  `expensesTotal` text DEFAULT NULL,
  `bookingTotalSaving` text DEFAULT NULL,
  `bookingInvoiceAmt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_booking_list_tbl`
--

INSERT INTO `order_booking_list_tbl` (`oblistid`, `obid`, `bhid`, `containerNo`, `lrGrNo`, `lrGrDate`, `otherPartyInvoiceNo`, `bookingSACNo`, `orderDate`, `expensesDiesel`, `expensesToll`, `expensesOther1`, `expensesTotal`, `bookingTotalSaving`, `bookingInvoiceAmt`) VALUES
(2, 1, 3, 'ttt', NULL, '1970-01-01', 'dfssdf', '996511', '2021-07-31', '2', '3', '4', '9.00', '391.00', '400'),
(3, 1, 1, 'bvnvbn', NULL, '1970-01-01', 'bvn', 'nvbn', '2021-01-01', '5', '6', '7', '18.00', '182.00', '200');

-- --------------------------------------------------------

--
-- Table structure for table `order_booking_tbl`
--

CREATE TABLE `order_booking_tbl` (
  `obid` int(11) NOT NULL,
  `cuid` int(11) DEFAULT NULL,
  `brid` int(11) DEFAULT NULL,
  `bookingDate` date DEFAULT NULL,
  `bookingTime` time DEFAULT NULL,
  `orderBookingNo` text DEFAULT NULL,
  `totalBillAmt` text DEFAULT NULL,
  `bookingNarration` text DEFAULT NULL,
  `statusBill` text DEFAULT NULL,
  `updatedDateBooking` date DEFAULT NULL,
  `updatedTimeBooking` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_booking_tbl`
--

INSERT INTO `order_booking_tbl` (`obid`, `cuid`, `brid`, `bookingDate`, `bookingTime`, `orderBookingNo`, `totalBillAmt`, `bookingNarration`, `statusBill`, `updatedDateBooking`, `updatedTimeBooking`) VALUES
(1, 8, 5, '2021-07-03', '12:38:02', 'ACSO/21-22/0001', '600.00', 'NA1', 'Pending', '2021-08-02', '12:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `pid` int(11) NOT NULL,
  `cuid` int(11) DEFAULT NULL,
  `obid` int(11) DEFAULT NULL,
  `blid` int(11) DEFAULT NULL,
  `paymentDate` date DEFAULT NULL,
  `paymentTime` time DEFAULT NULL,
  `paymentNo` text DEFAULT NULL,
  `receivedAmt` text DEFAULT NULL,
  `tdsAmt` text DEFAULT NULL,
  `receivedTotalAmt` text DEFAULT NULL,
  `remarks1` text DEFAULT NULL,
  `updatedDatePayment` text DEFAULT NULL,
  `updatedTimePayment` text DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_tbl`
--

INSERT INTO `payment_tbl` (`pid`, `cuid`, `obid`, `blid`, `paymentDate`, `paymentTime`, `paymentNo`, `receivedAmt`, `tdsAmt`, `receivedTotalAmt`, `remarks1`, `updatedDatePayment`, `updatedTimePayment`, `status`) VALUES
(26, 6, 6, 2, '2021-07-21', '03:44:23', 'ACSP/21-22/0001', '4000', '0', '4000.00', '', NULL, NULL, 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_tbl`
--

CREATE TABLE `vehicle_tbl` (
  `bhid` int(11) NOT NULL,
  `vehicleNo` text DEFAULT NULL,
  `purchasedDate` date DEFAULT NULL,
  `purchasedTime` time DEFAULT NULL,
  `insuranceRenewalDate` date DEFAULT NULL,
  `pucRenewalDate` date DEFAULT NULL,
  `fitnessRenewalDate` date DEFAULT NULL,
  `permitRenewalDate` date DEFAULT NULL,
  `hypothecationVehicle` text DEFAULT NULL,
  `statusVehicle` text DEFAULT NULL,
  `createdDateVehicle` date DEFAULT NULL,
  `createdTimeVehicle` time DEFAULT NULL,
  `updatedDateVehicle` date DEFAULT NULL,
  `updatedTimeVehicle` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_tbl`
--

INSERT INTO `vehicle_tbl` (`bhid`, `vehicleNo`, `purchasedDate`, `purchasedTime`, `insuranceRenewalDate`, `pucRenewalDate`, `fitnessRenewalDate`, `permitRenewalDate`, `hypothecationVehicle`, `statusVehicle`, `createdDateVehicle`, `createdTimeVehicle`, `updatedDateVehicle`, `updatedTimeVehicle`) VALUES
(1, 'MP04HE9972', NULL, NULL, NULL, NULL, NULL, NULL, '', 'Active', '2021-07-26', NULL, NULL, NULL),
(2, 'MP04HE4895', NULL, NULL, NULL, NULL, NULL, NULL, '', 'Active', '2021-07-26', NULL, NULL, NULL),
(3, 'MP04HE4898', NULL, NULL, NULL, NULL, NULL, NULL, '', 'Active', '2021-07-26', NULL, '2021-08-02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  ADD PRIMARY KEY (`blid`);

--
-- Indexes for table `broker_tbl`
--
ALTER TABLE `broker_tbl`
  ADD PRIMARY KEY (`brid`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`cuid`);

--
-- Indexes for table `maintenance_tbl`
--
ALTER TABLE `maintenance_tbl`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `order_booking_list_tbl`
--
ALTER TABLE `order_booking_list_tbl`
  ADD PRIMARY KEY (`oblistid`);

--
-- Indexes for table `order_booking_tbl`
--
ALTER TABLE `order_booking_tbl`
  ADD PRIMARY KEY (`obid`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `vehicle_tbl`
--
ALTER TABLE `vehicle_tbl`
  ADD PRIMARY KEY (`bhid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  MODIFY `blid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `broker_tbl`
--
ALTER TABLE `broker_tbl`
  MODIFY `brid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `cuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `maintenance_tbl`
--
ALTER TABLE `maintenance_tbl`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_booking_list_tbl`
--
ALTER TABLE `order_booking_list_tbl`
  MODIFY `oblistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_booking_tbl`
--
ALTER TABLE `order_booking_tbl`
  MODIFY `obid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `vehicle_tbl`
--
ALTER TABLE `vehicle_tbl`
  MODIFY `bhid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6790;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
