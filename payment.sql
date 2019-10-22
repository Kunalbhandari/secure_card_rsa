-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 08:38 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `uname` varchar(50) NOT NULL,
  `cardnum` varchar(20) NOT NULL,
  `encr_cardnum` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`uname`, `cardnum`, `encr_cardnum`) VALUES
('kunal', '4512468256219999', '6300950088715038'),
('arnab', '5401129747606900', '85371459991112727'),
('arnab', '7589502425743217', '59627587176161054'),
('kunal', '9521172774566201', '65461143771674240'),
('arnab', '4094025400113791', '1824313335870711423'),
('kunal', '4094025400113791', '1824313335870711423'),
('kunal', '7000100990791', '168071167297548'),
('arnab', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `encr_pass` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uname`, `password`, `encr_pass`) VALUES
('arnab', 'abc123', 'e99a18c428cb38d5f260853678922e03'),
('kunal', '123abc', 'a906449d5769fa7361d7ecc6aa3f6d28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD KEY `foreign` (`uname`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uname`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `foreign` FOREIGN KEY (`uname`) REFERENCES `login` (`uname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
