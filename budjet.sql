-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2018 at 06:42 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignmanagers`
--

CREATE TABLE `assignmanagers` (
  `id` int(11) NOT NULL,
  `mailid` varchar(80) NOT NULL,
  `deptid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignmanagers`
--

INSERT INTO `assignmanagers` (`id`, `mailid`, `deptid`) VALUES
(1, 'manager@gmail.com', 1),
(2, 'manager2@gmail.com', 2),
(3, 'employee@gmail.com', 1),
(4, 'employee2@gmail.com', 1),
(5, 'employee3@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `billrequest`
--

/*CREATE TABLE `billrequest` (
  `id` int(11) NOT NULL,
  `empmailid` varchar(80) NOT NULL,
  `billid` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `expensedate` varchar(100) NOT NULL,
  `billreport` varchar(200) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `accountnumber` varchar(20) NOT NULL,
  `bankaddress` varchar(300) NOT NULL,
  `paymenttype` varchar(50) NOT NULL,
  `billdesc` longtext NOT NULL,
  `billdate` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `managermailid` varchar(80) NOT NULL,
  `managerdate` datetime NOT NULL,
  `managerdesc` longtext NOT NULL,
  `fncmanagermailid` varchar(80) NOT NULL,
  `fncmanagerdate` datetime NOT NULL,
  `fncmanagerdesc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;*/

--
-- Dumping data for table `billrequest`
--

INSERT INTO `billrequest` (`id`, `empmailid`, `billid`, `amount`, `expensedate`, `billreport`, `bankname`, `accountnumber`, `bankaddress`, `paymenttype`, `billdesc`, `billdate`, `status`, `managermailid`, `managerdate`, `managerdesc`, `fncmanagermailid`, `fncmanagerdate`, `fncmanagerdesc`) VALUES
(1, 'employee@gmail.com', 1, '150000', '0000-00-00 00:00:00', 'Bill 1.docx', 'SBI', '124578451214', 'sr nagar Hyderabad.', '', 'This is my bill details.', '2021-05-09 11:55:27', 'Pending', 'manager@gmail.com', '2021-05-09 17:02:27', 'manager close the details.', 'fncmanager@gmail.com', '2021-05-10 19:00:28', 'Finance manager send the details.'),
(2, 'employee@gmail.com', 2, '150000', '0000-00-00 00:00:00', 'Bill 1.docx', 'SBI', '124578451214', 'sr nagar', '', 'ghfg', '2021-05-11 12:14:37', 'Pending', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', ''),
(3, 'employee@gmail.com', 1, '150000', '0000-00-00 00:00:00', 'Bill 1.docx', '', '', '', 'Hand', 'vbmhg', '2021-05-12 12:18:02', 'Pending', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', ''),
(4, 'employee@gmail.com', 1, '150000', '0000-00-00 00:00:00', 'Bill 1.docx', '', '', '', 'Hand', 'sdfsdvgf', '2021-05-13 12:19:19', 'Pending', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', ''),
(5, 'employee@gmail.com', 1, '150000', '23-Feb-2021', 'Bill 1.docx', '', '', '', 'Cheque', 'dfdgvf', '2021-05-14 12:20:01', 'Pending', '', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `billname` varchar(100) NOT NULL,
  `billamount` decimal(10,0) NOT NULL,
  `billdesc` longtext NOT NULL,
  `billenterdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `billname`, `billamount`, `billdesc`, `billenterdate`) VALUES
(1, 'Electricity Bill', '150000', 'Electricity details added successfully.', '2021-05-17 12:11:25'),
(2, 'Telephone Bill', '1200', 'Added the telephone bill.', '2021-05-14 12:44:46'),
(3, 'Employment Bill', '55000', 'added the employment bill details.', '2021-05-13 12:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `countryname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `countryname`) VALUES
(1, 'India'),
(2, 'Australia'),
(3, 'England');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `deptname` varchar(100) NOT NULL,
  `deptlocation` varchar(200) NOT NULL,
  `deptdesc` longtext NOT NULL,
  `deptdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `deptname`, `deptlocation`, `deptdesc`, `deptdate`) VALUES
(1, 'Department', 'Hyderabad', 'Added the department details.', '2021-05-14 11:19:57'),
(2, 'Sales Department', 'Sec-bad', 'sales department details added.', '2021-05-13 11:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `fromid` varchar(50) NOT NULL,
  `toid` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `replymsg` longtext NOT NULL,
  `senddate` varchar(50) NOT NULL,
  `replydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `fromid`, `toid`, `message`, `replymsg`, `senddate`, `replydate`) VALUES
(1, 'admin@gmail.com', 'fncmanager@gmail.com', 'Hi admin.', 'Hi', '2021-05-21 11:05:56', '2021-05-22 05:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` int(11) NOT NULL,
  `fromid` varchar(50) NOT NULL,
  `toid` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `senddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `fromid`, `toid`, `message`, `senddate`) VALUES
(1, 'admin@gmail.com', 'manager@gmail.com', 'Hi manager', '2021-05-01 04:43:16'),
(2, 'employee@gmail.com', 'manager@gmail.com', 'Hi sir.', '2021-05-02 05:16:52'),
(3, 'manager@gmail.com', 'employee@gmail.com', 'Hi employee.', '2021-05-03 05:30:28'),
(4, 'fncmanager@gmail.com', 'admin@gmail.com', 'Hi admin.', '2021-05-04 05:35:56'),
(5, 'admin@gmail.com', 'fncmanager@gmail.com', 'Hi', '2021-05-05 05:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `emailid` varchar(80) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `image` varchar(100) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `postal` varchar(10) NOT NULL,
  `role` varchar(30) NOT NULL,
  `regdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `gender`, `emailid`, `password`, `mobile`, `image`, `dob`, `address`, `city`, `state`, `country`, `postal`, `role`, `regdate`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '0000000000', 'admin.jpg', '00-00-0000', 'admin', 'admin', 'admin', 'admin', '000000', 'admin', '00-00-0000'),
(2, 'Manager', 'Male', 'manager@gmail.com', 'password', '9966885599', 'user1.png', '1984-01-02', 'sr nagar', 'Hyderabad', 'Telangana', 'India', '500018', 'manager', '2021-05-10 15:39:42'),
(3, 'Finance Manager', 'Male', 'fncmanager@gmail.com', 'password', '9966336699', 'User2.png', '1985-02-03', 'balnagar', 'Hyderabad', 'Telangana', 'India', '500018', 'fncmanager', '2021-05-11 15:54:00'),
(4, 'Employee', 'Male', 'employee@gmail.com', 'password', '9988778899', 'user3.png', '1986-02-03', 'Ameerpet', 'Hyderabad', 'Telangana', 'India', '500018', 'employee', '2021-05-12 15:56:19'),
(5, 'Manager 2', 'Female', 'manager2@gmail.com', 'password', '8855225588', 'user4.png', '1992-01-07', 'balnagar', 'Hyderabad', 'Telangana', 'India', '500018', 'manager', '2021-05-13 11:16:52'),
(6, 'Employee 2', 'Male', 'employee2@gmail.com', 'password', '9988778895', 'user6.jpg', '1994-02-02', 'Ameerpet', 'Hyderabad', 'Telangana', 'India', '500018', 'employee', '2021-05-14 12:24:03'),
(7, 'Employee 3', 'Male', 'employee3@gmail.com', 'password', '9988778814', 'user7.jpg', '1989-09-18', 'Ameerpet', 'Hyderabad', 'Telangana', 'India', '500018', 'employee', '2021-05-15 12:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `countryid` varchar(10) NOT NULL,
  `statename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `countryid`, `statename`) VALUES
(1, '1', 'Telangana'),
(2, '1', 'Andhra Pradesh'),
(3, '1', 'Tamilnadu'),
(4, '1', 'Karnataka'),
(5, '1', 'Delhi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignmanagers`
--
ALTER TABLE `assignmanagers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billrequest`
--
ALTER TABLE `billrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignmanagers`
--
ALTER TABLE `assignmanagers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `billrequest`
--
ALTER TABLE `billrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
