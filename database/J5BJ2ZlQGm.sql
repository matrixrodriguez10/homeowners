-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2021 at 05:02 AM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `J5BJ2ZlQGm`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `username`, `password`, `firstname`, `lastname`, `contact`, `bday`, `email`, `position`, `address`, `image`) VALUES
(1, 25011, 'admin', 'admin', 'Matrix', 'Rodriguez', 996728601, '1999-11-16', 'matrixemo10@gmail.com', 'admin', '#8856 san pablo st. SAV2', 'guest-user.jpg'),
(2, 30122, 'kelvin', 'test@123', 'Kelvin', 'Sumampong', 996728601, '11/08/1999', '1.kelvinsumampong@gmail.com', 'Admin', '#8860 San Pablo Street SAV2', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `image`, `agenda`, `date`, `time`, `details`) VALUES
(4, 'events_2.jpg', 'Free Zumba', 'May 30, 2021', '4:30pm - 6:00pm', 'This is a free Zumba event for everyone let us stay fit and healthy. this event will be held in our covered court Valley 2, for those who are free they can join.'),
(9, '196581031_294357865692883_5470754165365606351_n.jpg', 'Homeowners Meeting', 'May 7, 2021', '9:00am - 11:00am', 'Meeting of homeowners maintenance. etc.'),
(10, '193671097_487725185844421_4815164614420060766_n.jpg', 'No Parking', 'April 2, 2021', '', 'Starting April 2,2021 Olivares declares that the street of every subdivision are no parking area. All cars must be inside their garages, doing this is to prevent delays on emergencies such as fire alert, etc.');

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `fullname` varchar(64) NOT NULL,
  `date` varchar(20) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adds` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`id`, `user_id`, `fullname`, `date`, `contact`, `email`, `adds`) VALUES
(27, 2, 'Hans B. Calamba', '2021-06-16', 9976728601, 'hanscalamba@gmail.com', '8870 San Pablo Street'),
(28, 0, 'Matrix B. Rodriguez', '2021-06-16', 9976728601, 'matrixemo10@gmail.com', '8856 San Pablo Street'),
(30, 0, 'test', '2021-06-20', 9976728603, 'test@gmail.com', '8857 San Pablo Street'),
(31, 2, 'Hans B. Calamba', '2021-06-20', 9976728601, 'hanscalamba@gmail.com', '8870 San Pablo Street'),
(32, 2, 'Matrix B. Rodriguez', '2021-06-26', 9976728601, 'hanscalamba@gmail.com', '8870 San Pablo Street');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `covid`
--

INSERT INTO `covid` (`id`, `firstname`, `lastname`, `contact`, `gender`, `email`, `address`, `date`, `temperature`, `q1`, `q2`, `q3`, `q4`) VALUES
(2, 'visitor', 'visitor', 9976728602, 'Male', 'visitor@gmail.com', '111 visitor st. St. Lucas', '5/13/2021', '36.52', 'no', 'no', 'no', 'no'),
(8, 'test', 'test', 9976728602, 'Male', 'matrixemo10@gmail.com', 'asd', '2021-06-14', '36.20', 'no', 'no', 'no', 'no'),
(10, 'Patricia', 'Rodriguez', 9161803880, 'F', 'patrodriguez@gmail.com', 'Blk 2 Lot 1 Dona Maxima, San Antonio, Para?aque', '8/23/2021', '35.6', 'no', 'no', 'no', 'no'),
(11, 'Clarice', 'Madrid', 9658502557, 'F', 'clacla_mdrd@gmail.com', '#57 Palawan St. Brgy. Sto Cristo Bago Bantay Quezon City Manila ', '5/17/2021', '36.6', 'no', 'no', 'no', 'no'),
(12, 'Roselene', 'Ambrad', 9999477715, 'F', 'olen16@gmail.com', '110b gold St. Bernabe phase 1 paranaque', '1/15/2021', '36.5', 'no', 'no', 'no', 'no'),
(13, 'Margie', 'Samson', 9058958873, 'F', 'samson_marg@gmail.com', '0421 Quirino Avenue, Brgy. Don Galo, Para?aque', '5/4/2021', '37.1', 'no', 'no', 'no', 'no'),
(14, 'Eunice', 'Sena', 9150554449, 'F', 'eunice@gmail.com', '797B P.Burgos Avenue, San Roque, Cavite City', '10/17/2021', '36.8', 'no', 'no', 'no', 'no'),
(16, 'Try', 'Lang', 9482363710, 'Male', 'ranzryanmartinez@gmail.com', '7th st GHQ Barangay katuparan', 'June 3 2021 ', '36.6', 'No', 'No', 'No', 'No'),
(22, 'Jan Louie', 'Aragon', 9123456789, 'Male', 'makotokashino18@gmail.com', 'Marikina', 'June 25, 2021', '34.6', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `user_id`, `username`, `password`, `firstname`, `lastname`, `contact`, `email`, `address`, `bday`, `position`, `image`) VALUES
(3, 123512, 'matrix10', 'matrix10', 'Matrix', 'Rodriguez', 9976728601, '1.matrixrodriguez@gmail.com', '#8856 San Pablo Street', '1999-11-16', 'Employee', '5066008-circled-user-icon-user-profile-icon-png-png-image-transparent-profile-icon-png-820_860_preview.png'),
(4, 689201, 'jerome', 'patotoy', 'Jeromes', 'Patotoy', 9976728602, '1.jeromepatotoy@gmail.com', '#8835 San Bartolome Street', '1999-04-09', 'Assistant Treasurer', 'images.png'),
(6, 321780992, 'carpila', 'carpila', 'John Rey', 'Carpila', 9976728603, '1.johncarpila@gmail.com', '#8857 San Pablo Street', '2021-05-28', 'Assistant Secretary', 'images.png'),
(7, 33910, 'kelvinsumampong', 'kelvin', 'Kelvin', 'Sumampong', 9976728604, '1.kelvinsumampong@gmail.com', '#8856 San Pablo Street', '2021-05-28', 'Employee', 'guest-user.jpg'),
(8, 518890, 'cascon', 'cascon', 'Angelyn', 'Cascon', 9976728655, '1.angelyncascon@gmail.com', '#8858 San Pablo Street', '2021-05-28', 'Assistant Secretary', 'images (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `payment` int(20) NOT NULL,
  `dpay` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `category`, `payment`, `dpay`) VALUES
(3, 'Electrical Expense', 3000, '2021-06-02'),
(4, 'Internet Expense', 1900, '2021-06-02'),
(5, 'Nawasa Water Expense', 300, '2021-06-02'),
(8, 'Maynilad Expense', 700, '2021-06-02'),
(14, 'Sample Expense', 1000, '2021-06-02'),
(15, 'test Expense', 700, '2021-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `contact` bigint(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`id`, `user_id`, `name`, `date`, `time`, `location`, `contact`, `category`, `description`) VALUES
(35, 0, 'Bianca Dela Cruz', '2021-06-21', '4:00pm', 'San Antonio valley2', 9976728606, 'Property Damage Incident', 'Our house has been sprayed with cement by our neighbor who is constructing a their house'),
(36, 0, 'test', '2021-06-21', '3:00pm', 'San Antonio valley2', 9976728602, 'Vehicle Incident', 'a car bumped in to our car and is damage'),
(37, 2, 'Hans Calamba', '2021-06-21', '10:00am', 'San Antonio valley2', 9976728601, 'Environmental Incident', 'A tree fell and is now blocking the street'),
(38, 0, 'test', '2021-06-23', '3:00pm', 'San Antonio valley2', 9976728601, 'Other', 'Incident Description to incident event'),
(40, 0, 'Kelvin Sumampong', '2021-06-24', '3:00pm', 'San Pablo Street', 9976728602, 'Property Damage Incident', 'Our house has been sprayed with cement by our neighbor who is constructing a their house'),
(41, 0, 'Kelvin Sumampong', '2021-06-24', '3:00pm', 'San Pablo Street', 9976728602, 'Property Damage Incident', 'Our house has been sprayed with cement by our neighbor who is constructing a their house'),
(42, 0, 'test', '2021-06-26', '3:00pm', 'San Antonio valley2', 9976728601, 'Other', 'Description');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `pby`, `pto`, `date`, `amount`, `description`) VALUES
(1, 'Matrix Rodriguez', 'Monthly due', '2021-05-21', '200', 'paid'),
(2, 'Kelvin Sumampong', 'Monthly due', '2021-05-21', '200', 'paid'),
(3, 'John Rey Carpila', 'Monthly due', '2021-05-21', '200', 'paid'),
(4, 'Jerome Patotoy', 'Monthly due', '2021-05-21', '200', 'paid'),
(5, 'Jan Louie Aragon', 'Court', '2021-05-21', '300', 'paid'),
(6, 'Christian Soriano', 'Court', '2021-05-21', '300', 'paid'),
(7, 'jervey salcedo', 'Monthly due', '2021-06-21', '200', 'paid'),
(8, 'dan queroz', 'Monthly due', '2021-06-21', '200', 'paid'),
(9, 'maxene curz', 'Monthly due', '2021-06-21', '200', 'paid'),
(10, 'nica naz', 'Court', '2021-06-21', '300', 'paid'),
(11, 'reynalyn santos', 'Monthly due', '2021-06-21', '200', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `scheduling`
--

CREATE TABLE `scheduling` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `contact` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `scheduling`
--

INSERT INTO `scheduling` (`id`, `user_id`, `name`, `date`, `time`, `location`, `contact`, `email`, `status`) VALUES
(1, 0, 'Matrix', '2021-06-09', '2:00pm-4:00pm', 'valley2 covered court', 9976728603, 'matrixemo10@gmail.com', 'Approved'),
(5, 0, 'Janiero', '2021-06-10', '2:00pm-4:00pm', 'San Antonio valley2', 9976728601, 'janiero_11@gmail.com', 'Pending'),
(7, 2, 'kelvin', '2021-06-16', '2:00pm-4:00pm', 'San Antonio valley2', 9976728601, 'hanscalamba@gmail.com', 'Approved'),
(8, 2, 'Hans Calamba', '2021-06-17', '2:00pm-4:00pm', 'San Antonio valley2', 9976728601, 'hanscalamba@gmail.com', 'Pending'),
(9, 2, 'kelvin', '2021-06-23', '3:00pm', 'valley2 covered court', 9976728601, 'hanscalamba@gmail.com', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `image`, `firstname`, `lastname`, `username`, `password`, `address`, `gender`, `bday`, `email`, `contact`) VALUES
(1, 132521, '5066008-circled-user-icon-user-profile-icon-png-png-image-transparent-profile-icon-png-820_860_preview.png', 'Rovhiee', 'Mercado', 'rovhie00', 'rovhie30', '#8860 san pablo street', 'Male', '2000-09-30', 'rovhiemercado30@gmail.com', 9976728604),
(2, 617294122155, 'guest-user.jpg', 'Hans', 'Calamba', 'hans_c', 'calamba1', '#8872 San Pablo Street', 'Male', '1999-04-09', 'hanscalamba@gmail.com', 9976728601),
(3, 331569, 'guest-user.jpg', 'Christian', 'Soriano', 'xtian30', 'soriano', '#8891 San Hudas Street', 'Male', '2000-10-30', 'xtiansoriano@gmail.com', 9976728606),
(6, 17447500, '5066008-circled-user-icon-user-profile-icon-png-png-image-transparent-profile-icon-png-820_860_preview.png', 'test', 'test', 'test', 'test', 'test', 'Male', '2021-06-09', 'test@gmail.com', 9976728604);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `date`, `time`, `contact`, `relation`, `homename`) VALUES
(1, 'Carl Solis', '2021-06-02', '3:00pm', 9976728602, 'friend', 'Janiero Fuentes'),
(3, 'Clarence John Rodriguez', '2021-06-07', '9:00am', 9976728601, 'Brother', 'Matrix Rodriguez'),
(4, 'Rovhie Mercado', '2021-06-07', '9:00am', 9976728602, 'Cousin', 'Hans Calamba'),
(5, 'Gio Cutanda', '2021-06-07', '3:00pm', 9976728603, 'friend', 'Reinhardt '),
(10, 'Shane garcia', '6/18/2021', '10:00am', 9158246930, 'Family friend', 'bianca'),
(11, 'Carl diaz', '6/18/2021', '12:30pm', 9176283009, 'Cousin', 'ruel'),
(12, 'Kate baban', '6/18/2021', '4:00pm', 9168226841, 'Siblings', 'chloe'),
(13, 'J.A dela torre', '6/18/2021', '8:00am', 9179309600, 'Siblings', 'mark'),
(14, 'Bleazey love echauz', '6/18/2021', '11:30am', 9159784530, 'Cousin', 'Annafe'),
(16, 'try', '2021-06-24', '4:00pm', 9976728601, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `user_id`, `name`, `date`, `time`, `location`, `contact`, `email`, `category`, `description`, `status`) VALUES
(58, 0, 'Kelvin Sumampong', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, '1.kelvinsumampong@gmail.com', 'House Repair', 'House Repair Description / Description of the requested work', 'Pending'),
(61, 0, 'Matrix Rodriguez', '2021-06-03', '3:00pm', 'San Antonio valley2', 9976728602, '1.matrixrodriguez@gmail.com', 'Electrical', 'test', 'Pending'),
(75, 2, 'Hans Calamba', '2021-06-21', '10:00am', 'San Antonio valley2', 9976728601, 'hanscalamba@gmail.com', 'Plumbing', 'Water leaking in front of our house', 'Pending'),
(78, 0, 'John Rey Carpila', '2021-06-24', '10:00am', 'San Pablo Stree', 9976728603, '1.johncarpila@gmail.com', 'Electrical', 'Requested Work Description Etc.', 'Pending');

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
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `covid`
--
ALTER TABLE `covid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `scheduling`
--
ALTER TABLE `scheduling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
