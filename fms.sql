-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 03:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_firstname` text NOT NULL,
  `admin_middlename` text NOT NULL,
  `admin_lastname` text NOT NULL,
  `admin_email` text NOT NULL,
  `admin_contact` text NOT NULL,
  `admin_username` text NOT NULL,
  `admin_password` text NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_firstname`, `admin_middlename`, `admin_lastname`, `admin_email`, `admin_contact`, `admin_username`, `admin_password`, `branch_id`) VALUES
(1, 'Admin', 'Middlename', 'Lastname', 'admin@admin.com', '091234567890', 'admin', 'admin', 1),
(4, 'A', 'B', 'C', 'abc@gmail.com', '-1', 'admin2', 'admin2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcemnt_id` int(11) NOT NULL,
  `announcement_name` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `branch_name` text NOT NULL,
  `branch_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`, `branch_address`) VALUES
(1, 'Sipocot -Main Branch', 'Sipocot, Camarines Sur'),
(2, 'Del Gallego Branch', 'Del Gallego, Camarines Sur'),
(3, 'Lupi Branch', 'Lupi, Camarines Sur'),
(4, 'Ragay Branch', 'Ragay, Camarines Sur');

-- --------------------------------------------------------

--
-- Table structure for table `casket`
--

CREATE TABLE `casket` (
  `casket_id` int(11) NOT NULL,
  `casket_type` text NOT NULL,
  `amount` double(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casket`
--

INSERT INTO `casket` (`casket_id`, `casket_type`, `amount`, `image`, `service_id`) VALUES
(1, 'Ordinary Rounded Top Wood Casket', 25000.00, '', 1),
(2, 'DAHLIA Wood Casket', 45000.00, 'DAHLIA WOOD casket.jpg', 2),
(3, 'METAL Casket Full Cap', 80000.00, 'METAL Casket Full Cap.jpg', 3),
(4, 'ORIB Wood Casket', 30000.00, 'ORIB WOOD casket.jpg', 2),
(5, 'FLEXI Metal Casket Full Cap', 150000.00, 'FLEXI METAL Full Cap.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `casket_qty`
--

CREATE TABLE `casket_qty` (
  `casket_qty_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `casket_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casket_qty`
--

INSERT INTO `casket_qty` (`casket_qty_id`, `quantity`, `casket_id`, `branch_id`) VALUES
(1, 8, 1, 1),
(2, 6, 2, 1),
(3, 4, 3, 2),
(4, 1, 4, 2),
(5, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chapel`
--

CREATE TABLE `chapel` (
  `chapel_id` int(11) NOT NULL,
  `chapel_name` varchar(255) NOT NULL,
  `branch` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chapel`
--

INSERT INTO `chapel` (`chapel_id`, `chapel_name`, `branch`) VALUES
(1, 'CHAPEL 1', 1),
(2, 'CHAPEL 2', 1),
(3, 'CHAPEL 3', 1),
(4, 'CHAPEL 4', 1),
(5, 'NONE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_firstname` text NOT NULL,
  `client_middlename` text NOT NULL,
  `client_lastname` text NOT NULL,
  `client_email` text NOT NULL,
  `client_phone` text NOT NULL,
  `client_username` text NOT NULL,
  `client_password` text NOT NULL,
  `client_application_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_firstname`, `client_middlename`, `client_lastname`, `client_email`, `client_phone`, `client_username`, `client_password`, `client_application_date`) VALUES
(18, 'Marifer', 'B.', 'Comia', 'mc@email.com', '343433', 'mc', 'd6fd0924e324f50669ae0295adf59567', '2021-11-24 12:34:36'),
(19, 'Juan', 'Dela', 'Cruz', 'jdlc@email.com', '0912345678', 'Cruz', '1b6ecd67f81e2b0afdd6b0efb432255c', '0000-00-00 00:00:00'),
(20, 'Juana', 'Dela', '', 'jdlca@email.com', '0912345678', 'Cruza', '109d83150b725c1b0f755931450ab9cf', '0000-00-00 00:00:00'),
(21, 'john', 'd', 'doe', 'gfgjfgj@vbhvgg', '0978867', 'ok', '444bcb3a3fcf8389296c49467f27e1d6', '2021-12-06 11:09:40'),
(23, 'jane', 'd.', 'doe', 'dg@fhfh', '0967674', 'one', 'f97c5d29941bfb1b2fdab0874906ab82', '2021-12-07 19:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contract_id` int(11) NOT NULL,
  `contract_unique_id` text NOT NULL,
  `relation_to_deceased` text NOT NULL,
  `other_charges` text NOT NULL,
  `amount` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `deceased_id` int(11) NOT NULL,
  `casket_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `chapel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_id`, `contract_unique_id`, `relation_to_deceased`, `other_charges`, `amount`, `address`, `date`, `client_id`, `service_id`, `deceased_id`, `casket_id`, `branch_id`, `chapel_id`) VALUES
(1, 'CNTRCT202145970', 'Son', 'None', 45000, '', '2021-12-03', 20, 2, 1, 2, 1, 1),
(50, 'CNTRCT202197248', 'son', 'none', 30000, '', '2021-12-14', 23, 2, 13, 4, 2, 4),
(53, 'CNTRCT202137296', 'son', 'none', 30000, '', '2021-12-14', 23, 2, 13, 4, 2, 1),
(62, 'CNTRCT202149756', 'niece', 'none', 150000, 'Tara, Sipocot Camarines Sur', '2021-12-16', 23, 3, 13, 5, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `deceased`
--

CREATE TABLE `deceased` (
  `deceased_id` int(11) NOT NULL,
  `deceased_fname` text NOT NULL,
  `deceased_mname` text NOT NULL,
  `deceased_lname` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_died` date NOT NULL,
  `age` text NOT NULL,
  `cause_of_death` text NOT NULL,
  `religion` text NOT NULL,
  `status` text NOT NULL,
  `added_date` datetime NOT NULL,
  `family_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deceased`
--

INSERT INTO `deceased` (`deceased_id`, `deceased_fname`, `deceased_mname`, `deceased_lname`, `date_of_birth`, `date_died`, `age`, `cause_of_death`, `religion`, `status`, `added_date`, `family_id`, `branch_id`) VALUES
(1, 'Juan', 'Dela', 'Cruz', '2000-01-01', '2007-12-12', '7 Year(s)', 'Asthma', 'Roman Catholic', '1', '2021-12-03 13:42:11', 20, 1),
(2, 'Jose', 'Mari', 'Chan', '1960-01-01', '2001-12-25', '41 Year(s)', 'Asthma', 'Roman Catholic', '1', '2021-12-03 18:33:42', 19, 1),
(3, 'Mhdkfh', 'jfdfj', 'jdfkdjf', '1999-12-12', '2021-08-09', '21 Year(s)', 'Cancer', 'Roman Catholic', '1', '2021-12-03 18:40:40', 18, 1),
(13, 'joe', 'anderson', 'smith', '2021-12-29', '2022-01-04', '0 Year(s)', 'covid', 'born again', '', '2021-12-09 17:59:19', 23, 1),
(14, 'jy', 'jutyuy', 'yuyt', '2021-12-15', '2021-12-27', '0 Year(s)', 'yuyu', 'ytuy', '', '2021-12-09 18:01:28', 23, 1),
(15, 'ytyt', 'yrtyty', 'tryty', '2021-12-23', '2021-12-28', '0 Year(s)', 'tyty', 'rtytyty', '', '2021-12-09 18:04:04', 23, 2),
(16, 'sfg', 'ggg', 'gtg', '2022-01-01', '2021-12-27', '0 Year(s)', 'fff', 'ghgh', '', '2021-12-09 19:52:12', 23, 1),
(17, 'rgt', 'g', 'thgh', '2021-12-22', '2021-12-28', '0 Year(s)', 'ghg', 'ghgg', '', '2021-12-09 19:54:08', 23, 2),
(18, 'ghghgh', 'hgh', 'ghg', '2022-01-05', '2021-12-28', '0 Year(s)', 'ghgh', 'ghg', '', '2021-12-09 19:55:08', 23, 2),
(19, 'loe', 'biden', 'joe', '2021-10-08', '2019-06-04', '2 Year(s)', 'cancer', 'catholic', '', '2021-12-12 09:10:00', 23, 1),
(20, 'rodulf', 'smik', 'hjhjh', '2021-10-22', '2021-12-21', '1 Month(s)', 'hjhj', 'hjh', '', '2021-12-12 09:14:38', 23, 1),
(21, 'HJHJ', 'JJ', 'HJH', '2021-10-27', '2021-12-10', '0 Year(s)', 'HJ', 'HJJH', '', '2021-12-12 17:32:38', 23, 1),
(22, 'RT', 'HTH', 'HH', '2021-10-08', '2021-12-23', '0 Year(s)', 'HGHH', 'GHGH', '', '2021-12-12 17:44:28', 23, 1),
(23, 'GHG', 'GJJ', 'J', '2021-10-22', '2021-12-08', '0 Year(s)', 'HJH', 'HJH', '', '2021-12-12 17:48:33', 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_fname` text NOT NULL,
  `employee_mname` text NOT NULL,
  `employee_lname` text NOT NULL,
  `contact` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `work_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_fname`, `employee_mname`, `employee_lname`, `contact`, `branch_id`, `work_type`) VALUES
(1, 'John', '', 'Kennedy', 912356788, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `contract_id` varchar(255) NOT NULL,
  `payment_amount` double(10,2) NOT NULL,
  `balance` double(10,2) NOT NULL,
  `status` text NOT NULL,
  `client_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `deceased_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `casket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `contract_id`, `payment_amount`, `balance`, `status`, `client_id`, `branch_id`, `deceased_id`, `service_id`, `casket_id`) VALUES
(1, 'CNTRCT202145970', 45000.00, 0.00, 'FULLY PAID', 20, 1, 1, 1, 1),
(5, 'CNTRCT202197248', 300.00, 5000.00, 'NOT FULLY PAID', 23, 1, 19, 1, 1),
(10, 'CNTRCT202137296', 677.00, 29323.00, 'NOT FULLY PAID', 23, 2, 13, 1, 1),
(16, 'CNTRCT202149756', 10000.00, 140000.00, 'NOT FULLY PAID', 23, 1, 13, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `reservation_code` text NOT NULL,
  `reservation_date` date NOT NULL,
  `relation_to_deceased` varchar(255) NOT NULL,
  `reservation_status` text NOT NULL,
  `branch_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `casket_id` int(11) NOT NULL,
  `chapel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_code`, `reservation_date`, `relation_to_deceased`, `reservation_status`, `branch_id`, `client_id`, `casket_id`, `chapel_id`) VALUES
(1, 'RES202185706', '2021-11-25', '', 'CANCELED', 1, 18, 1, 1),
(2, 'RES202153049', '2022-01-11', '', 'CANCELED', 1, 21, 2, 2),
(10, 'RES202127930', '2021-12-17', '', 'PENDING', 1, 21, 2, 4),
(49, 'RES202123470', '2022-02-14', 'son', 'APPROVED', 2, 23, 4, 2),
(50, 'RES202189531', '2022-01-26', 'granfather', 'CANCELED', 2, 23, 4, 3),
(52, 'RES202145329', '0000-00-00', 'jhj', 'APPROVED', 1, 23, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service` text NOT NULL,
  `package_include` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service`, `package_include`) VALUES
(1, 'Ordinary Package', '7 days embalming process, flowers, tarpaulin, chandeliers and vigil equipments, funeral car'),
(2, 'Semi-Special Package', '7 days Embalming Process Flowers Tarpaulin Dress Chandeliers and Vigil Equipment’s Funeral Car/ Funeral Horses Funeral Band'),
(3, 'Special Package', '7 days Embalming Process Flowers Tarpaulin Dress Chandeliers and Vigil Equipment’s Funeral Car/Funeral Horses Funeral Band');

-- --------------------------------------------------------

--
-- Table structure for table `work_schedule`
--

CREATE TABLE `work_schedule` (
  `work_schedule_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `title` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_schedule`
--

INSERT INTO `work_schedule` (`work_schedule_id`, `date`, `time`, `title`, `employee_id`, `branch_id`) VALUES
(1, '2021-12-31', '08:16:26', 'chapel 4', 1, 1),
(2, '2021-12-06', '09:00:00', 'chapel 1', 1, 1),
(3, '2021-12-31', '10:52:00', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_type`
--

CREATE TABLE `work_type` (
  `work_type_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_type`
--

INSERT INTO `work_type` (`work_type_id`, `description`) VALUES
(1, 'Regular'),
(2, 'On-call');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcemnt_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `casket`
--
ALTER TABLE `casket`
  ADD PRIMARY KEY (`casket_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `casket_qty`
--
ALTER TABLE `casket_qty`
  ADD PRIMARY KEY (`casket_qty_id`),
  ADD KEY `casket_id` (`casket_id`);

--
-- Indexes for table `chapel`
--
ALTER TABLE `chapel`
  ADD PRIMARY KEY (`chapel_id`),
  ADD KEY `branch` (`branch`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract_id`),
  ADD UNIQUE KEY `contract_unique_id` (`contract_unique_id`) USING HASH,
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `deceased_id` (`deceased_id`),
  ADD KEY `casket_id` (`casket_id`),
  ADD KEY `chapel_id` (`chapel_id`),
  ADD KEY `chapel_id_2` (`chapel_id`);

--
-- Indexes for table `deceased`
--
ALTER TABLE `deceased`
  ADD PRIMARY KEY (`deceased_id`),
  ADD KEY `family_id` (`family_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `work_type` (`work_type`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `deceased_id` (`deceased_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `casket_id` (`casket_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `casket_id` (`casket_id`),
  ADD KEY `chapel_id` (`chapel_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `work_schedule`
--
ALTER TABLE `work_schedule`
  ADD PRIMARY KEY (`work_schedule_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `work_type`
--
ALTER TABLE `work_type`
  ADD PRIMARY KEY (`work_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcemnt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `casket`
--
ALTER TABLE `casket`
  MODIFY `casket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `casket_qty`
--
ALTER TABLE `casket_qty`
  MODIFY `casket_qty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chapel`
--
ALTER TABLE `chapel`
  MODIFY `chapel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `deceased`
--
ALTER TABLE `deceased`
  MODIFY `deceased_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_schedule`
--
ALTER TABLE `work_schedule`
  MODIFY `work_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_type`
--
ALTER TABLE `work_type`
  MODIFY `work_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `casket`
--
ALTER TABLE `casket`
  ADD CONSTRAINT `casket_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `casket_qty`
--
ALTER TABLE `casket_qty`
  ADD CONSTRAINT `casket_qty_ibfk_1` FOREIGN KEY (`casket_id`) REFERENCES `casket` (`casket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chapel`
--
ALTER TABLE `chapel`
  ADD CONSTRAINT `chapel_ibfk_1` FOREIGN KEY (`branch`) REFERENCES `branches` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`casket_id`) REFERENCES `casket` (`casket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`deceased_id`) REFERENCES `deceased` (`deceased_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_4` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_5` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_6` FOREIGN KEY (`chapel_id`) REFERENCES `chapel` (`chapel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deceased`
--
ALTER TABLE `deceased`
  ADD CONSTRAINT `deceased_ibfk_1` FOREIGN KEY (`family_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`work_type`) REFERENCES `work_type` (`work_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_4` FOREIGN KEY (`deceased_id`) REFERENCES `deceased` (`deceased_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_5` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_6` FOREIGN KEY (`casket_id`) REFERENCES `casket` (`casket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`casket_id`) REFERENCES `casket` (`casket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`chapel_id`) REFERENCES `chapel` (`chapel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_schedule`
--
ALTER TABLE `work_schedule`
  ADD CONSTRAINT `work_schedule_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_schedule_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
