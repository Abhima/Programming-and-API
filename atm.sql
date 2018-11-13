-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 13, 2018 at 10:12 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atm`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bankid` int(11) UNSIGNED NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bankid`, `bankname`, `balance`) VALUES
(101, 'OBOS', 2000),
(102, 'spar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `companyid` int(11) UNSIGNED NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `coaccountnumber` int(11) NOT NULL,
  `cobalance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`companyid`, `companyname`, `coaccountnumber`, `cobalance`) VALUES
(1, 'icenet AS', 454545000, 0),
(2, 'sio housing', 980765430, 2001);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` int(16) NOT NULL,
  `cuaccountnumber` int(64) NOT NULL,
  `pin` int(6) NOT NULL,
  `cubalance` int(11) NOT NULL,
  `cardnumber` int(11) NOT NULL,
  `attempts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `name`, `email`, `phonenumber`, `cuaccountnumber`, `pin`, `cubalance`, `cardnumber`, `attempts`) VALUES
(1, 'abc', 'abc@gmail.com', 94712356, 1234567890, 1234, 6000, 4321, 3),
(2, 'monika', 'monika@gmail.com', 94730169, 1111111111, 9828, 9999, 9828, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Invoice`
--

CREATE TABLE `Invoice` (
  `invoiceid` int(11) UNSIGNED NOT NULL,
  `invoiceno` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `companyid` int(11) UNSIGNED NOT NULL,
  `customerid` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Invoice`
--

INSERT INTO `Invoice` (`invoiceid`, `invoiceno`, `amount`, `companyid`, `customerid`) VALUES
(2, 1, 1, 2, 2),
(3, 12345, 1000, 2, 1),
(4, 12345, 1000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionid` int(11) UNSIGNED NOT NULL,
  `accountno` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `bankid` int(11) UNSIGNED NOT NULL,
  `customerid` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionid`, `accountno`, `amount`, `bankid`, `customerid`) VALUES
(1, 9090909, 1000, 101, 1),
(2, 9090909, 1000, 101, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bankid`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`companyid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `Invoice`
--
ALTER TABLE `Invoice`
  ADD PRIMARY KEY (`invoiceid`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `companyid` (`companyid`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionid`),
  ADD KEY `bankid` (`bankid`),
  ADD KEY `customerid` (`customerid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bankid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `companyid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Invoice`
--
ALTER TABLE `Invoice`
  MODIFY `invoiceid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Invoice`
--
ALTER TABLE `Invoice`
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`),
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`companyid`) REFERENCES `companies` (`companyid`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`bankid`) REFERENCES `banks` (`bankid`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
