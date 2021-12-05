-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 01:54 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casket`
--

INSERT INTO `casket` (`casket_id`, `casket_type`, `amount`, `service_id`) VALUES
(1, 'Ordinary Rounded Top Wood Casket', 20000.00, 1),
(2, 'DAHLIA ', 45000.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `casket_qty`
--

CREATE TABLE `casket_qty` (
  `casket_qty_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `casket_id` text NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casket_qty`
--

INSERT INTO `casket_qty` (`casket_qty_id`, `quantity`, `casket_id`, `branch_id`) VALUES
(1, 9, '1', 1),
(2, 7, '2', 1),
(3, 4, '1', 2),
(4, 3, '2', 2);

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
(20, 'Juana', 'Dela', '', 'jdlca@email.com', '0912345678', 'Cruza', '109d83150b725c1b0f755931450ab9cf', '0000-00-00 00:00:00');

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
  `date` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `deceased_id` int(11) NOT NULL,
  `casket_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_id`, `contract_unique_id`, `relation_to_deceased`, `other_charges`, `amount`, `date`, `client_id`, `service_id`, `deceased_id`, `casket_id`, `branch_id`) VALUES
(1, 'CNTRCT202145970', 'Son', 'None', 45000, '2021-12-03', 20, 2, 1, 2, 1),
(2, 'CNTRCT202187210', 'Step-Father', 'None', 45000, '2021-12-03', 19, 2, 2, 2, 1),
(3, 'CNTRCT202158623', 'Brother', 'None', 45000, '2021-12-03', 18, 2, 3, 2, 1);

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
(3, 'Mhdkfh', 'jfdfj', 'jdfkdjf', '1999-12-12', '2021-08-09', '21 Year(s)', 'Cancer', 'Roman Catholic', '1', '2021-12-03 18:40:40', 18, 1);

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
  `payment_amount` double(10,2) NOT NULL,
  `balance` double(10,2) NOT NULL,
  `status` text NOT NULL,
  `contract_id` text NOT NULL,
  `client_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_amount`, `balance`, `status`, `contract_id`, `client_id`, `branch_id`) VALUES
(1, 40000.00, 5000.00, 'NOT FULLY PAID', 'CNTRCT202145970', 20, 1),
(2, 20000.00, 25000.00, 'NOT FULLY PAID', 'CNTRCT202187210', 19, 1),
(3, 45000.00, 0.00, 'FULLY PAID', 'CNTRCT202158623', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `reservation_code` text NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_status` text NOT NULL,
  `branch_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_code`, `reservation_date`, `reservation_status`, `branch_id`, `client_id`) VALUES
(1, 'RES202185706', '2021-11-25', 'PENDING', 1, 18);

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
(2, 'Semi-special Package', ''),
(3, 'Special Package', '');

-- --------------------------------------------------------

--
-- Table structure for table `work_schedule`
--

CREATE TABLE `work_schedule` (
  `work_schedule_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `employee_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_schedule`
--

INSERT INTO `work_schedule` (`work_schedule_id`, `date`, `time`, `employee_id`, `branch_id`) VALUES
(2, '2021-12-06', '09:00:00', 1, 1);

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
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `casket`
--
ALTER TABLE `casket`
  ADD PRIMARY KEY (`casket_id`);

--
-- Indexes for table `casket_qty`
--
ALTER TABLE `casket_qty`
  ADD PRIMARY KEY (`casket_qty_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract_id`);

--
-- Indexes for table `deceased`
--
ALTER TABLE `deceased`
  ADD PRIMARY KEY (`deceased_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `work_schedule`
--
ALTER TABLE `work_schedule`
  ADD PRIMARY KEY (`work_schedule_id`);

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
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `casket`
--
ALTER TABLE `casket`
  MODIFY `casket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `casket_qty`
--
ALTER TABLE `casket_qty`
  MODIFY `casket_qty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `deceased`
--
ALTER TABLE `deceased`
  MODIFY `deceased_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `work_schedule`
--
ALTER TABLE `work_schedule`
  MODIFY `work_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `work_type`
--
ALTER TABLE `work_type`
  MODIFY `work_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
