-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 07:11 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brick_builders`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `com_id` int(10) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`com_id`, `company_name`, `image`) VALUES
(1, 'JOYA BRICKS', 'joya.png'),
(2, 'A.M.C BRICKS', 'amc.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `cus_id` varchar(50) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `cus_address` varchar(100) NOT NULL,
  `cus_phone` varchar(20) NOT NULL,
  `com_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`cus_id`, `cus_name`, `cus_address`, `cus_phone`, `com_id`) VALUES
('213197', 'Shanto', 'dhaka', '01683182337', 1),
('216190', 'Tanveer', 'north nilkhet', '01683182331', 1),
('33669', 'Tanveer', 'dhaka', '01683182337', 1),
('507308', 'Tanveer', 'ss', '01683182338', 1),
('600458', 'Rahman', 'dhaka', '01683182337', 2),
('754690', 'Koli', 'dhaka', '01683182338', 2),
('829696', 'talukdar', '25/f,Dhaka Unievrsity staff quarter, north nilkhet', '01683182338', 1),
('905753', 'shetu', 'dhaka', '01683182338', 2),
('927949', 'Khilu', 'ss', '01683189657', 1),
('964394', 'nahian', 'dhaka', '01683182337', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `emp_id` varchar(50) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `emp_phone` varchar(50) NOT NULL,
  `emp_des` varchar(50) NOT NULL,
  `emp_salary` int(20) NOT NULL,
  `com_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`emp_id`, `emp_name`, `emp_email`, `emp_address`, `emp_phone`, `emp_des`, `emp_salary`, `com_id`) VALUES
('264977', 'Niss', 'nis@gmail.com', 'dhaka', '01683182331', 'manager', 5000, 2),
('652575', 'TANVEER', 'tanveershuvos@gmail.com', 'north nilkhet', '01683182331', 'manager', 12000, 2),
('772195', 'Shanto', 'shanto@gmail.com', 'dhaka', '01683182331', 'Manager', 12500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_payment`
--

CREATE TABLE `employee_payment` (
  `emp_pay_id` int(50) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `salary` int(20) NOT NULL,
  `bonus` int(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_payment`
--

INSERT INTO `employee_payment` (`emp_pay_id`, `emp_id`, `date`, `salary`, `bonus`, `status`) VALUES
(169368, '168350', '25/10/18', 12000, 0, 'unpaid'),
(265995, '264977', '25/10/18', 5000, 0, 'paid'),
(266095, '264977', '02/11/18', 5000, 0, 'paid'),
(280242, '279224', '25/10/18', 12000, 0, 'paid'),
(365292, '364274', '25/10/18', 12500, 0, 'unpaid'),
(365392, '364274', '25/11/18', 12500, 0, 'paid'),
(653593, '652575', '25/10/18', 12000, 0, 'unpaid'),
(653693, '652575', '02/11/18', 12000, 0, 'paid'),
(773213, '772195', '25/10/18', 12355, 0, 'paid'),
(773313, '772195', '02/11/18', 12500, 0, 'unpaid'),
(782386, '781268', '21/11/18', 12500, 0, 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `jalani_details`
--

CREATE TABLE `jalani_details` (
  `j_id` int(20) NOT NULL,
  `rate` int(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `rental` int(20) NOT NULL,
  `receipt` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jalani_details`
--

INSERT INTO `jalani_details` (`j_id`, `rate`, `type`, `quantity`, `rental`, `receipt`, `date`) VALUES
(1, 12, 'Koyla', 100, 1200, '45df', ''),
(2, 12, 'Koyla', 100, 1200, '45df2', ''),
(3, 12, 'Koyla', 100, 1200, '45df12', ''),
(4, 12, 'Koyla', 100, 1200, '45df122', ''),
(5, 12, 'Koyla', 12, 1200, '45df2211', ''),
(6, 122, 'Koyla', 100, 1200, '45df111', ''),
(7, 23, 'Lakri', 100, 1200, '45dfwe', ''),
(8, 1123, 'Koyla', 100, 1200, '45df1231', ''),
(9, 1232, 'Lakri', 12, 1200, '4125df', ''),
(10, 123, 'Vushi', 100, 1200, '45dfwee', ''),
(11, 123, 'Vushi', 100, 1200, '45dfs', ''),
(12, 12321, 'Vushi', 100, 1200, '4s5df', ''),
(13, 1111, 'Koyla', 111, 1200, '11', '2018-09-17'),
(14, 10000, 'Vushi', 12, 1200, '123321', '2018-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `log_id` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL DEFAULT '25d55ad283aa400af464c76d713c07ad',
  `role` varchar(20) NOT NULL DEFAULT 'emp',
  `access_level` int(10) NOT NULL,
  `OTP` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`log_id`, `email`, `password`, `role`, `access_level`, `OTP`) VALUES
('1', 'tanveershuvos@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1, ''),
('264977', 'nis@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'manager', 2, ''),
('772195', 'shanto@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'emp', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `mechinaries_details`
--

CREATE TABLE `mechinaries_details` (
  `m_id` int(20) NOT NULL,
  `rate` int(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `receipt` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `com_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mechinaries_details`
--

INSERT INTO `mechinaries_details` (`m_id`, `rate`, `type`, `quantity`, `name`, `receipt`, `date`, `com_id`) VALUES
(1, 12000, 'Mechine', '12', 'Polythin', '122d12', '2018-09-28', 1),
(2, 12000, 'Parts', '20 kg', 'Polythen', 'ddd232', '2018-09-27', 1),
(3, 10000, 'Mechine', '10', 'Polythen', '123321d', '2018-09-27', 1),
(4, 12000, 'Mechine', '20 kg', 'Ilastic', '122d12	', '2018-10-02', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(100) NOT NULL,
  `cus_id` varchar(50) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `unit_price` double(10,2) NOT NULL,
  `quantity` int(20) NOT NULL,
  `total_price` int(100) NOT NULL,
  `paid` int(100) NOT NULL,
  `order_date` varchar(20) NOT NULL,
  `sea_id` int(50) NOT NULL,
  `inserted_by` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `cus_id`, `pro_name`, `unit_price`, `quantity`, `total_price`, `paid`, `order_date`, `sea_id`, `inserted_by`) VALUES
(162831, '33669', 'Quality 1', 10.00, 1000, 10000, 8000, '13/10/2018', 9, 'tanveershuvos@gmail.com'),
(195865, '33669', 'Quality 1', 11.00, 23, 253, 253, '12/11/2018', 9, 'tanveershuvos@gmail.com'),
(222856, '927949', 'Quality 1', 10.00, 45, 400, 200, '13/10/2018', 9, 'tanveershuvos@gmail.com'),
(226247, '33669', 'Quality 2', 5.00, 10, 50, 8, '21/11/2018', 9, 'Shanto'),
(325474, '33669', 'Quality 1', 9.00, 700, 6300, 6300, '04/11/2018', 11, 'tanveershuvos@gmail.com'),
(418296, '216190', 'Quality 1', 11.50, 2000, 23000, 20000, '21/11/2018', 9, 'Shanto'),
(422005, '33669', 'Quality 1', 10.00, 23, 230, 230, '13/10/2018', 9, 'tanveershuvos@gmail.com'),
(446714, '33669', 'Quality 1', 11.50, 45, 518, 300, '21/11/2018', 9, 'Shanto'),
(455743, '33669', 'Quality 1', 11.50, 23, 265, 200, '21/11/2018', 9, 'Shanto'),
(469811, '33669', 'Quality 2', 5.00, 10, 50, 50, '29/10/2018', 9, 'tanveershuvos@gmail.com'),
(564941, '927949', 'Quality 2', 10.00, 5000, 50000, 50000, '13/10/2018', 9, 'tanveershuvos@gmail.com'),
(574663, '600458', 'Quality 2', 5.00, 1, 5, 5, '25/10/2018', 14, 'tanveershuvos@gmail.com'),
(671291, '33669', 'Quality 1', 10.00, 45, 450, 300, '13/10/2018', 9, 'tanveershuvos@gmail.com'),
(783846, '33669', 'Quality 1', 10.00, 77, 770, 770, '13/10/2018', 9, 'tanveershuvos@gmail.com'),
(816222, '33669', 'Quality 1', 11.00, 45, 495, 300, '07/11/2018', 9, 'tanveershuvos@gmail.com'),
(851778, '927949', 'Quality 1', 9.00, 100, 900, 700, '13/10/2018', 9, 'tanveershuvos@gmail.com'),
(882576, '33669', 'Quality 1', 10.00, 1000, 10000, 10000, '30/10/2018', 9, 'tanveershuvos@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `others_details`
--

CREATE TABLE `others_details` (
  `rate` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `receipt` int(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `o_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `others_details`
--

INSERT INTO `others_details` (`rate`, `quantity`, `name`, `receipt`, `date`, `o_id`) VALUES
(12, 12, 'saa', 1111, '2018-09-17', 1),
(12000, 10, 'Polythen', 122, '2018-11-18', 2),
(222, 22, 'ss', 2, '2018-09-30', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `pro_id` int(20) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `unit_price` double(10,2) NOT NULL,
  `available` int(20) NOT NULL,
  `com_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`pro_id`, `pro_name`, `unit_price`, `available`, `com_id`) VALUES
(5, 'Quality 1', 11.50, 2052, 1),
(10, 'Quality 1', 7.50, 100, 2),
(11, 'Quality 2', 5.00, 1, 2),
(12, 'Quality 2', 5.00, 352, 1);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `sea_id` int(50) NOT NULL,
  `com_id` int(10) NOT NULL,
  `sea_name` varchar(50) NOT NULL,
  `sea_start_time` varchar(50) NOT NULL,
  `sea_end_time` varchar(20) NOT NULL,
  `sea_budget` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`sea_id`, `com_id`, `sea_name`, `sea_start_time`, `sea_end_time`, `sea_budget`) VALUES
(9, 1, 'WINTER', '2018-10-12', '2018-10-10', 250000),
(11, 1, 'Summer', '2018-10-02', '2018-10-19', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `sordar_delivery_status`
--

CREATE TABLE `sordar_delivery_status` (
  `receipt_no` varchar(50) NOT NULL,
  `delivery_date` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `rate` int(50) NOT NULL,
  `total_bill` int(50) NOT NULL,
  `inserted_by` varchar(50) NOT NULL,
  `sea_id` int(50) NOT NULL,
  `sor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sordar_delivery_status`
--

INSERT INTO `sordar_delivery_status` (`receipt_no`, `delivery_date`, `amount`, `rate`, `total_bill`, `inserted_by`, `sea_id`, `sor_id`) VALUES
('WB021548', '2018-11-21', 10000, 1, 10000, 'Shanto', 11, '680908'),
('WB059427', '2018-11-12', 1000, 1, 1000, 'tanveershuvos@gmail.com', 9, '680908'),
('WB425967', '2018-11-21', 1000, 1, 1000, 'Shanto', 9, '726580'),
('WB500612', '2018-11-04', 1000, 12, 1200, 'tanveershuvos@gmail.com', 11, '726580'),
('WB795412', '2018-10-12', 1000, 12, 12000, 'tanveershuvos@gmail.com', 3, '726580'),
('WB969502', '2018-10-30', 1000, 1, 1000, 'tanveershuvos@gmail.com', 11, '260721'),
('WB973621', '2018-11-07', 10000, 1, 10000, 'tanveershuvos@gmail.com', 12, '260721');

-- --------------------------------------------------------

--
-- Table structure for table `sordar_details`
--

CREATE TABLE `sordar_details` (
  `sor_id` varchar(50) NOT NULL,
  `sor_name` varchar(50) NOT NULL,
  `sor_address` varchar(100) NOT NULL,
  `sor_type` varchar(50) NOT NULL,
  `sor_phone` varchar(20) NOT NULL,
  `com_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sordar_details`
--

INSERT INTO `sordar_details` (`sor_id`, `sor_name`, `sor_address`, `sor_type`, `sor_phone`, `com_id`) VALUES
('260721', 'tan', 'dhaka', 'Porai Sordar', '01683182337', 1),
('680908', 'Riaz', 'dhaka', 'Saak Sordar', '01683182337', 1),
('726580', 'Nissan', 'north nilkhet 200', 'Mail Sordar', '01683182337', 1),
('828481', 'Shetu', 'dhaka', 'Unload Sordar', '01683128335', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sordar_payment`
--

CREATE TABLE `sordar_payment` (
  `sor_id` varchar(50) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `advance` int(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `sea_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sordar_payment`
--

INSERT INTO `sordar_payment` (`sor_id`, `pay_id`, `advance`, `date`, `sea_id`) VALUES
('680908', '01948975', 50000, '2018-11-21', 11),
('260721', '12928580', 50000, '2018-11-07', 12),
('726580', '18994232', 56000, '2018-11-04', 11),
('680908', '31285483', 50000, '2018-11-12', 9),
('260721', '75987185', 50000, '2018-11-22', 9);

-- --------------------------------------------------------

--
-- Table structure for table `sordar_weekly_bill`
--

CREATE TABLE `sordar_weekly_bill` (
  `weekly_bill_id` int(20) NOT NULL,
  `sor_id` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `weekly_bill` int(50) NOT NULL,
  `paid_by` varchar(50) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sea_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sordar_weekly_bill`
--

INSERT INTO `sordar_weekly_bill` (`weekly_bill_id`, `sor_id`, `date`, `weekly_bill`, `paid_by`, `pay_id`, `sea_id`) VALUES
(4, '260721', '2018-10-30', 100, 'tanveershuvos@gmail.com', '67609977', 11),
(6, '726580', '2018-11-04', 5000, 'tanveershuvos@gmail.com', '18994232', 11),
(7, '260721', '2018-11-07', 1200, 'tanveershuvos@gmail.com', '12928580', 9),
(8, '680908', '2018-11-12', 100, 'tanveershuvos@gmail.com', '31285483', 13),
(12, '680908', '2018-11-21', 1000, 'Shanto', '01948975', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_payment`
--
ALTER TABLE `employee_payment`
  ADD PRIMARY KEY (`emp_pay_id`);

--
-- Indexes for table `jalani_details`
--
ALTER TABLE `jalani_details`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `mechinaries_details`
--
ALTER TABLE `mechinaries_details`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `others_details`
--
ALTER TABLE `others_details`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`sea_id`);

--
-- Indexes for table `sordar_delivery_status`
--
ALTER TABLE `sordar_delivery_status`
  ADD PRIMARY KEY (`receipt_no`);

--
-- Indexes for table `sordar_details`
--
ALTER TABLE `sordar_details`
  ADD PRIMARY KEY (`sor_id`);

--
-- Indexes for table `sordar_payment`
--
ALTER TABLE `sordar_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `sordar_weekly_bill`
--
ALTER TABLE `sordar_weekly_bill`
  ADD PRIMARY KEY (`weekly_bill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `com_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee_payment`
--
ALTER TABLE `employee_payment`
  MODIFY `emp_pay_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=782387;
--
-- AUTO_INCREMENT for table `jalani_details`
--
ALTER TABLE `jalani_details`
  MODIFY `j_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `mechinaries_details`
--
ALTER TABLE `mechinaries_details`
  MODIFY `m_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=882577;
--
-- AUTO_INCREMENT for table `others_details`
--
ALTER TABLE `others_details`
  MODIFY `o_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `pro_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `sea_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sordar_weekly_bill`
--
ALTER TABLE `sordar_weekly_bill`
  MODIFY `weekly_bill_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
