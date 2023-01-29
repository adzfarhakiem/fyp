-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 04:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aId` int(10) NOT NULL,
  `aName` varchar(225) DEFAULT NULL,
  `aEmail` varchar(225) DEFAULT NULL,
  `aPassword` varchar(10) DEFAULT NULL,
  `aTel` varchar(15) DEFAULT NULL,
  `aAddress` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aId`, `aName`, `aEmail`, `aPassword`, `aTel`, `aAddress`) VALUES
(1, 'Admin', 'admin@gmail.com', '123', '172352638', 'Main');

-- --------------------------------------------------------

--
-- Table structure for table `boarding`
--

CREATE TABLE `boarding` (
  `boardingid` int(11) NOT NULL,
  `cId` varchar(100) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'pending',
  `booked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boarding`
--

INSERT INTO `boarding` (`boardingid`, `cId`, `title`, `start_time`, `end_time`, `start_date`, `end_date`, `status`, `booked`) VALUES
(89, '14', 'Boarding', '19:19:00', '20:19:00', '2023-01-16', '2023-01-31', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `cId` int(11) NOT NULL,
  `vetId` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cId` int(10) NOT NULL,
  `cName` varchar(225) NOT NULL,
  `cEmail` varchar(225) NOT NULL,
  `cPassword` varchar(225) NOT NULL,
  `cTel` int(225) NOT NULL,
  `cAddress` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cId`, `cName`, `cEmail`, `cPassword`, `cTel`, `cAddress`) VALUES
(14, 'Adzfar Hakiem', 'adzfarhakiem@gmail.com', '123', 111183560, 'No.51.JLN PULAI RIA 11.BANDAR BARU KANGKAR PULAI.JOHOR BAHRU'),
(15, 'Arif Haikal', 'arifhaikal@gmail.com', '123', 145785468, 'No 23, Jalan Impian Emas, Tok Gajah 43222 Ayer Baloi, Melaka'),
(16, 'Muhammad Nasri', 'nasri@gmail.com', '123', 111184533, 'No 21, Jalan Norman, Puteri Habour, 81500 Johor bahru'),
(17, 'Test 1', 'test@gmail.com', '123', 123456789, 'X');

-- --------------------------------------------------------

--
-- Table structure for table `grooming`
--

CREATE TABLE `grooming` (
  `groomingId` int(11) NOT NULL,
  `cId` int(11) NOT NULL,
  `pName` varchar(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `start_time` time NOT NULL,
  `start_date` date NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grooming`
--

INSERT INTO `grooming` (`groomingId`, `cId`, `pName`, `title`, `start_time`, `start_date`, `status`) VALUES
(3, 14, '', 'Grooming', '21:19:00', '2023-01-20', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mId` int(10) NOT NULL,
  `mName` varchar(225) NOT NULL,
  `mEmail` varchar(225) NOT NULL,
  `mPassword` int(225) NOT NULL,
  `mTel` int(10) NOT NULL,
  `mAddress` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mId`, `mName`, `mEmail`, `mPassword`, `mTel`, `mAddress`) VALUES
(1, 'Manager', 'manager@gmail.com', 123, 111111111, 'Owner');

-- --------------------------------------------------------

--
-- Table structure for table `mating`
--

CREATE TABLE `mating` (
  `matingId` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `cId` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `start_date` date NOT NULL,
  `pGrade` varchar(3) NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mating`
--

INSERT INTO `mating` (`matingId`, `title`, `cId`, `start_time`, `start_date`, `pGrade`, `status`) VALUES
(6, 'Mating', 14, '22:36:00', '2023-01-25', 'B', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pId` int(225) NOT NULL,
  `pName` varchar(225) NOT NULL,
  `pBreed` varchar(225) NOT NULL,
  `pGrade` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `utype`
--

CREATE TABLE `utype` (
  `email` varchar(225) NOT NULL,
  `usertype` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utype`
--

INSERT INTO `utype` (`email`, `usertype`) VALUES
('admin@gmail.com', 'a'),
('adzfarhakiem@gmail.com', 'c'),
('arifhaikal@gmail.com', 'c'),
('manager@gmail.com', 'm'),
('nasri@gmail.com', 'c'),
('test@gmail.com', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `vet_transport`
--

CREATE TABLE `vet_transport` (
  `vetId` int(11) NOT NULL,
  `cId` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `start_time` time NOT NULL,
  `start_date` date NOT NULL,
  `capacity` int(20) NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vet_transport`
--

INSERT INTO `vet_transport` (`vetId`, `cId`, `title`, `start_time`, `start_date`, `capacity`, `status`) VALUES
(1, 0, 'Vet Transport', '02:23:00', '2023-01-23', 10, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aId`);

--
-- Indexes for table `boarding`
--
ALTER TABLE `boarding`
  ADD PRIMARY KEY (`boardingid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cId`);

--
-- Indexes for table `grooming`
--
ALTER TABLE `grooming`
  ADD PRIMARY KEY (`groomingId`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mId`);

--
-- Indexes for table `mating`
--
ALTER TABLE `mating`
  ADD PRIMARY KEY (`matingId`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `utype`
--
ALTER TABLE `utype`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `vet_transport`
--
ALTER TABLE `vet_transport`
  ADD PRIMARY KEY (`vetId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `boarding`
--
ALTER TABLE `boarding`
  MODIFY `boardingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `grooming`
--
ALTER TABLE `grooming`
  MODIFY `groomingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `mId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mating`
--
ALTER TABLE `mating`
  MODIFY `matingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vet_transport`
--
ALTER TABLE `vet_transport`
  MODIFY `vetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
