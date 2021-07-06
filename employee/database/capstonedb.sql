-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 08:39 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstonedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `contact` bigint(11) NOT NULL,
  `bday` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `position` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `username`, `password`, `firstname`, `lastname`, `contact`, `bday`, `email`, `position`, `address`, `image`) VALUES
(1, 25011, 'admin', 'admin', 'matrix', 'Rodriguez', 996728601, '2021-06-03', 'matrixemo10@gmail.com', 'admin', '8856 san pablo st. SAV2', '169087295_507898013931048_6255512621918095939_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `agenda` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `image`, `agenda`, `date`, `time`, `details`) VALUES
(1, 'Ex9qC6pUcAMtZrm.jpg', 'Tech', 'May 20, 2021', '4:00pm', 'Tech details'),
(3, 'F0R1P4V.png', 'Test', 'May 23, 2021', '10:00am-12:00pm', 'Having a meeting of the officials to support the students who are in need of technology to support their studies'),
(4, 'events_2.jpg', 'Free Zumba', 'May 30, 2021', '4:30pm - 6:00pm', 'This is a free Zumba event for everyone let us stay fit and healthy. this event will be held in our covered court Valley 2, for those who are free they can join.');

-- --------------------------------------------------------

--
-- Table structure for table `covid`
--

CREATE TABLE `covid` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `contact` bigint(11) NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date` varchar(30) NOT NULL,
  `temperature` varchar(10) NOT NULL,
  `q1` varchar(5) NOT NULL,
  `q2` varchar(5) NOT NULL,
  `q3` varchar(5) NOT NULL,
  `q4` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `covid`
--

INSERT INTO `covid` (`id`, `firstname`, `lastname`, `contact`, `gender`, `email`, `address`, `date`, `temperature`, `q1`, `q2`, `q3`, `q4`) VALUES
(1, 'test', 'test', 9976728602, 'Female', 'test@gmail.com', 'test', '20-May-21', '36.4', 'no', 'no', 'no', 'no'),
(2, 'visitor', 'visitor', 9976728602, 'Male', 'visitor@gmail.com', '111 visitor st. St. Lucas', '5/13/2021', '36.52', 'no', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `contact` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `bday` varchar(50) NOT NULL,
  `position` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `firstname`, `lastname`, `contact`, `email`, `address`, `bday`, `position`, `image`) VALUES
(3, 'test', 'test', 'test', 'test', 9976728601, 'test@gmail.com', 'San Antonio Valley 2', '2021-05-28', 'Assistant Secretary', '169087295_507898013931048_6255512621918095939_n.jpg'),
(4, 'rain_04', 'rain', 'test', 'test', 9976728602, 'rain_04@gmail.com', 'San Antonio Valley 2', '2021-05-28', 'Assistant Secretary', 'EuhgZRmUcAMwnrz.jpg'),
(6, 'admin', 'admin', 'test', 'test', 9976728603, 'test@gmail.com', 'San Antonio Valley 2', '2021-05-28', 'Assistant Secretary', 'IMG_20201014_065603.jpg'),
(7, 'lucy', 'lucy', 'lucy', 'lucy', 9976728604, 'lucy@gmail.com', 'San Antonio Valley 2', '2021-05-28', 'Assistant Secretary', 'FB_IMG_1599694821481.jpg'),
(8, 'materodriguez10', 'matrix', 'test', 'test', 9976728601, 'matrixemo10@gmail.com', 'San Antonio Valley 2', '2021-05-28', 'Assistant Secretary', '169426899_508437317210451_4191240078935847467_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `payment` int(20) NOT NULL,
  `dpay` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `category`, `payment`, `dpay`) VALUES
(3, 'Electric Bill', 2000, '2021-06-02'),
(4, 'Internet Bill', 1700, '2021-06-02'),
(5, 'Nawasa Water', 300, '2021-05-31'),
(8, 'Sample', 300, '2021-05-31'),
(9, 'Water Bill', 700, '2021-06-02'),
(10, 'Internet Bill', 1700, '2021-06-02'),
(11, 'Nawasa Water', 300, '2021-05-31'),
(12, 'Sample', 300, '2021-05-31'),
(13, 'Water Bill', 700, '2021-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `contact` bigint(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`id`, `name`, `date`, `time`, `location`, `contact`, `description`) VALUES
(1, 'test', '2021-05-28', '4:00pm', 'San Antonio valley2', 9976728601, 'test 123'),
(7, 'kelvin', '2021-05-28', '3:00pm', 'San Antonio valley2', 9976728602, 'asd'),
(8, 'Sample', '2021-06-02', '4:00pm', 'Sav 2', 9976728603, 'sample'),
(11, 'asd', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, 'asd'),
(12, 'asd', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, 'asd'),
(13, 'asd', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, 'asd'),
(14, 'asd', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, 'asd'),
(15, 'asd', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, 'asd'),
(16, 'asd', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `pby` text NOT NULL,
  `pto` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `pby`, `pto`, `date`, `amount`, `description`) VALUES
(1, 'Matrix Rodriguez', 'Sample', '6/2/2021', '200', 'paid'),
(2, 'Kelvin Sumampong', 'Sample', '6/2/2021', '200', 'paid'),
(3, 'John Rey Carpila', 'Sample', '6/2/2021', '200', ''),
(4, 'Jerome Patotoy', 'Sample', '6/2/2021', '200', 'sample'),
(5, 'Jan Louie Aragon', 'Sample', '6/2/2021', '200', ''),
(6, 'Christian Soriano', 'Sample', '6/2/2021', '200', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `scheduling`
--

CREATE TABLE `scheduling` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `contact` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scheduling`
--

INSERT INTO `scheduling` (`id`, `name`, `date`, `time`, `location`, `contact`, `email`) VALUES
(1, 'test', '2021-06-03', '2:00pm-4:00pm', 'valley2 covered court', 9976728601, 'matrixemo10@gmail.com'),
(2, 'test', '2021-06-03', '4:00pm-5:00pm', 'valley2 covered court', 9976728602, 'test@gmail.com'),
(3, 'test', '2021-06-03', '4:00pm-5:00pm', 'valley2 covered court', 9976728602, 'test@gmail.com'),
(4, 'test', '2021-06-03', '4:00pm-5:00pm', 'valley2 covered court', 9976728602, 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `bday` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `firstname`, `lastname`, `username`, `password`, `address`, `gender`, `bday`, `email`, `contact`) VALUES
(1, 'IMG_20201014_065603.jpg', 'hori', 'test', 'test', 'test', 'asd', 'Female', '2021-06-02', 'matrixemo10@gmail.com', 9976728601),
(2, '169087295_507898013931048_6255512621918095939_n.jpg', 'hori', 'sample', 'test', 'test', 'sample', 'Female', '2021-06-02', 'matrixemo10@gmail.com', 9976728601),
(3, '144158180_222624566208746_8801061079760390959_o.jpg', 'a', 'a', 'a', 'a', 'a', 'Female', '2021-06-03', 'notme@gmail.com', 9976728606);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `relation` text NOT NULL,
  `homename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `date`, `time`, `contact`, `relation`, `homename`) VALUES
(1, 'test', '5/28/2021', '3:00pm', 9976728602, 'friend', 'test'),
(3, 'me', '5/28/2021', '9:00am', 9976728601, 'friend', 'him'),
(4, 'test', '5/28/2021', '10:00am', 9976728601, 'friend', 'test'),
(5, 'test', '5/28/2021', '3:00pm', 9976728602, 'friend', 'test'),
(6, 'test', '5/28/2021', '3:00pm', 9976728603, 'friend', 't'),
(7, 'me', '5/28/2021', '9:00am', 9976728601, 'friend', 'him');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `name`, `date`, `time`, `location`, `contact`, `description`) VALUES
(1, 'jan louie aragon', '2021-05-10', '10:00am', 'San Antonio valley2', 9976728602, 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testingtestingtestingtesting testing testingtestingtestingtesting testingtestingtestingtesting testingtestingtestingtesting testingtestingtestingtesting testingtestingtestingtesting testingtestingtestingtesting testingtestingtestingtesting testingtestingtestingtesting'),
(58, 'Kelvin Sumampong', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, 'A work order is usually a task or a job for a customer, that can be scheduled or assigned to someone. Such an order may be from a customer request or created internally within the organization. Work orders may also be created as follow ups to Inspections or Audits. A work order may be for products or services.'),
(59, 'John Rey Carpila', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, 'A work order is usually a task or a job for a customer, that can be scheduled or assigned to someone. Such an order may be from a customer request or created internally within the organization. Work orders may also be created as follow ups to Inspections or Audits. A work order may be for products or services.'),
(60, 'Jerome Patotoy', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, 'A work order is usually a task or a job for a customer, that can be scheduled or assigned to someone. Such an order may be from a customer request or created internally within the organization. Work orders may also be created as follow ups to Inspections or Audits. A work order may be for products or services.'),
(61, 'asd', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, 'A work order is usually a task or a job for a customer, that can be scheduled or assigned to someone. Such an order may be from a customer request or created internally within the organization. Work orders may also be created as follow ups to Inspections or Audits. A work order may be for products or services.'),
(62, 'asd', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, 'A work order is usually a task or a job for a customer, that can be scheduled or assigned to someone. Such an order may be from a customer request or created internally within the organization. Work orders may also be created as follow ups to Inspections or Audits. A work order may be for products or services.'),
(63, 'asd', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, 'A work order is usually a task or a job for a customer, that can be scheduled or assigned to someone. Such an order may be from a customer request or created internally within the organization. Work orders may also be created as follow ups to Inspections or Audits. A work order may be for products or services.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `covid`
--
ALTER TABLE `covid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheduling`
--
ALTER TABLE `scheduling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `covid`
--
ALTER TABLE `covid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `scheduling`
--
ALTER TABLE `scheduling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
