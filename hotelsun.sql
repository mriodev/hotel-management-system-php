-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 01:27 AM
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
-- Database: `hotelsun`
--

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guestid` int(100) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `nic` varchar(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `promocode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guestid`, `fname`, `lname`, `nic`, `type`, `companyname`, `email`, `mobile`, `promocode`) VALUES
(10, 'Ruzny', 'Ahmed', '20031101674', 'Normal Customer', '', 'ruznya@gmail.com', '0766565425', ''),
(11, 'Malindu', 'Darshana', '20012.5015856', 'Normal Customer', '', 'malindu@gmauil.com', '0445252526', ''),
(12, 'aaaaa', 'aaaaaa', '112355255', 'Normal Customer', '', 'aaa@gmail.com', '1111111111', ''),
(13, 'aaaaa', 'aaaaaaa', '444444444444', 'Normal Customer', '', 'sss@gmail.com', '4444444444', ''),
(14, 'eee', 'eee', '222222', 'Normal Customer', '', 'eee@gmail.com', '2222222222', ''),
(15, 'aaa', 'aaaa', '222222222', 'Normal Customer', '', 'ddd@gmail.com', '2222222222', ''),
(16, 'dddd', 'ddddddd', '2323232322', 'Normal Customer', '', 'fdd@gmail.com', '222222222', ''),
(17, 'ccc', 'ccccccc', '2222', 'Normal Customer', '', 'dd@gmail.com', '2333333322', ''),
(18, 's', 's', '1', 'Normal Customer', '', 's@gmailcom', '1322111111', ''),
(19, 'vvvv', 'vvv', '21', 'Normal Customer', '', 'vvv@gmail.com', '1111111111', ''),
(20, 'www', 'www', '2', 'Normal Customer', '', 'ww@gmail.com', '1111111111', ''),
(21, 'zzzz', 'zzzzzz', '22222', 'Normal Customer', '', 'dddddd@gmail.com', '2222222222', ''),
(22, 'ccc', 'ccc', '1111', 'Normal Customer', '', 'cc@gmail.com', '2222222222', ''),
(23, 'qqqqqqqqq', 'qqqqqqqq', '2222222', 'Normal Customer', '8', 'qqqqqq@gmail.com', '1111111111', ''),
(24, 'ddddd', 'ddddddd', '222222', 'Normal Customer', '8', 'ddddd@gmail.com', '2222222222', ''),
(25, 'sss', 'ssssss', '2222222', 'Normal Customer', '', 'ss@gmail.com', '1111111111', ''),
(26, 'sss', 'ssss', '222222222', 'Normal Customer', '', 'dd@gmail.com', '3333333333', ''),
(27, 'sss', 'ssss', '22', 'Normal Customer', '', '2ddd@gmail.com', '2222222222', ''),
(28, 'swsws', 'wswsw', '7878552252', 'Normal Customer', '8', 'wsdsddss@gmail.com', '212121212', '22121'),
(29, 'test', 'test', '87744444444444444444', 'Normal Customer', '8', 'hhshh@gmail.com', '4444444444', '77777'),
(30, 'test', 'test', 'd7777777777777', 'Normal Customer', '8', 'hdh@gmail.com', '2322222222', '55'),
(31, 'test', 'test', '44444444444', 'Normal Customer', '8', 'oo@gmail.com', '1111111111', '444'),
(32, 'test', 'test', '44444444444', 'Normal Customer', '8', 'oo@gmail.com', '1111111111', '444'),
(33, 'rr', 'ee', '777777777', 'Travel Company', '8', 'tete@gm.com', '1212121222', '544'),
(34, 'test', 'dets', '77777777', 'Travel Company', '9', 'rr@g.com', '8778888888', '4444'),
(35, 'Ruzny', 'Ahmed', '20034055683', 'Normal Customer', '', 'ruzny@gmail.com', '0766565452', ''),
(36, 'aaa', 'aaa', '1111', 'Normal Customer', '', 'aaa@gmail.com', '1111111111', ''),
(37, 'aaaaaaa', 'aaaaaaaa', '1111', 'Normal Customer', '', 'aa@gmail.com', '1111111111', ''),
(38, 'qqqq', 'aa', '11111111111', 'Normal Customer', '9', 'aaa@gmail.com', '1111111111', ''),
(39, 'aaaaaaaaaa', 'aaaaaaaaa', '11', 'Normal Customer', '9', 'a@gmail.com', '1111111111', ''),
(40, 'aaaa', 'aaaa', '1111', 'Normal Customer', '', 'aa@gmail.com', '1111111111', ''),
(41, 'aaaa', 'aaaa', '1111', 'Normal Customer', '', 'aa@gmail.com', '1111111111', ''),
(42, 'ddd', 'ddd', '11111', 'Normal Customer', '', 'ss@gmail.com', '1111111111', ''),
(43, 'ruzny', 'ahmed', '11111111111', 'Normal Customer', '', 'ruzny@gmail.com', '0766565451', ''),
(44, 'aaaa', 'aaaa', '11111', 'Normal Customer', '', 'aaa@gmail.com', '1111111111', ''),
(45, 'test', 'test', '12212212212121', 'Normal Customer', '8', 'rrr@test.test', '121212111', '12211212'),
(46, 'eee', 'eee', '122112112211', 'Normal Customer', '8', 'test@testtest.test', '1212112112', '1212'),
(47, 'erere', 'rerr', '12122121222', 'Normal Customer', '8', '2test@test.test', '1212112112', '555'),
(48, 'aaa', 'aaa', '11111', 'Normal Customer', '', 'aa@gmail.com', '1111111111', ''),
(49, 'aaaa', 'dddd', '1111', 'Normal Customer', '', 'sss@hhh.mmm', '1111111111', ''),
(50, 'aaa', 'aaa', '33333', 'Normal Customer', '', 'ddd@ggg.mmm', '1111111111', ''),
(51, 'aaa', 'aaa', '1111111111', 'Normal Customer', '', 'aaa@mmm.mmm', '1111111111', ''),
(52, 'ccc', 'ccc', '1111', 'Normal Customer', '', 'cc@cc.mm', '1111111111', ''),
(53, 'ccc', 'ccc', '222', 'Normal Customer', '', 'ff@ggg.mmm', '2222222222', ''),
(54, 'aaaaaaaaaaa', 'aaaaaaaaaaa', '11111', 'Normal Customer', '', 'aaa@gn.bn', '1111111111', ''),
(55, 'ssss', 'ssss', '11111', 'Normal Customer', '', 'ssss@gb.mn', '1111111111', ''),
(56, 'aaaa', 'aaaa', 'aaaaaa', 'Travel Company', '8', 'aaa@aaa.aaa', '1111111111', 'a111'),
(57, 'aaaa', 'aaaa', '111111111111', 'Travel Company', '8', 'aa@aa.aaa', '1111111111', '111'),
(58, 'cccc', 'cccc', '111111111', 'Travel Company', '8', 'qq@ddd.ddd', '1111111111', '55'),
(59, 'aaaa', 'aaaa', '111111111', 'Normal Customer', '', 'aaa@dd.nn', '1111111111', ''),
(60, 'Ruzny', 'Ahmed', '200031152632', 'Travel Company', '9', 'ruzny@gmail.com', '0766565452', '1215'),
(61, 'Ruzny', 'Ahmed', '200345345333', 'Travel Company', '', 'ruznya@gmail.com', '045223636', '1111'),
(62, 'Ruzny', 'Ahmed', '2005467890', 'Travel Company', '9', 'ruzny@gmail.com', '0766565456', 'dddd'),
(63, 'aaaa', 'aaaaa', '22222222', 'Travel Company', '8', 'aaaa@gmail.com', '1111111111', 'ww22'),
(64, 'aaaa', 'aaaaa', '111111111111111', 'Travel Company', '8', 'ddd@nn.mm', '1111111111', '11'),
(65, 'ccc', 'ccc', '11111111111', 'Travel Company', '8', 'ccc@vv.bb', '1111111111', '11'),
(66, 'sss', 'sss', '1111111111', 'Travel Company', '8', 'sss@ss.sss', '2222222222', '55'),
(67, 'ccccc', 'ccccc', '22222222222222', 'Travel Company', '8', 'ssss@ss.ccc', '1111111111', '1111'),
(68, 'Ruzny', 'Ahmed', '2003144503', 'Normal Customer', '', 'ruzny@gmail.com', '0766565252', ''),
(69, 'Ruzny', 'Ahmed', '200031145562', 'Normal Customer', '', 'ruzny@gmail.com', '0765656452', ''),
(70, 'Ruzny', 'Ahmed', '20001223636', 'Normal Customer', '', 'ruzny@gmail.com', '0765656452', ''),
(71, 'aaa', 'aaa', '111', 'Travel Company', '8', '11@gmsil.com', '1111111111', '1111'),
(72, 'ssss', 'ssss', '333333', 'Travel Company', '8', 'sss@nn.mmm', '1111111111', '333'),
(73, 'sss', 'ssss', '111111111', 'Travel Company', '8', 'sss@ddd.xx', '1111111111', '11'),
(74, 'ss', 'sss', '222', 'Travel Company', '8', 'ww@dd.mm', '2222222222', '22'),
(75, 'aaa', 'aaaaaaa', '1111111111111', 'Travel Company', '8', 'aaa@vv.mm', '1111111111', '11'),
(76, 'aaa', 'aaa', '1111111111111', 'Travel Company', '8', 'aa@aaa.aaa', '1111111111', '22'),
(77, 'aaa', 'aaa', '1111', 'Travel Company', '8', 'aa@gm.nn', '1111111111', '11'),
(78, 'aa', 'aaa', '11111', 'Travel Company', '8', 'aaa@aa.mm', '1111111111', '111'),
(79, 'aa', 'aa', '11111111', 'Travel Company', '9', '1aa@nn.mm', '1111111111', '11');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelcode` int(11) NOT NULL,
  `location` varchar(150) NOT NULL,
  `phone_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelcode`, `location`, `phone_no`) VALUES
(5, 'Matara', '0412256366'),
(10, 'Galle', '0945522336');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `cardnumber` int(15) NOT NULL,
  `cardholdername` varchar(100) NOT NULL,
  `expdate` varchar(50) NOT NULL,
  `totalamount` int(11) NOT NULL,
  `resid` int(11) DEFAULT NULL,
  `paymentdate` date NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `cardnumber`, `cardholdername`, `expdate`, `totalamount`, `resid`, `paymentdate`, `status`) VALUES
(1, 2147483647, 'qqqqq', '', 0, NULL, '0000-00-00', NULL),
(2, 2222222, 'sss', '', 0, NULL, '0000-00-00', NULL),
(3, 0, '', '', 0, NULL, '0000-00-00', 'paid'),
(4, 2147483647, 'wwsd', '', 0, NULL, '0000-00-00', 'paid'),
(5, 0, '', '', 0, NULL, '0000-00-00', 'paid'),
(6, 2147483647, 'ruzny', '2022-12', 0, NULL, '0000-00-00', 'paid'),
(7, 2147483647, 'aaa', '2022-12', 0, NULL, '0000-00-00', 'Unpaid'),
(8, 2147483647, 'aaa', '2023-11', 0, NULL, '0000-00-00', 'Unpaid'),
(9, 2147483647, 'aaaaaaaaa', '2022-12', 0, NULL, '0000-00-00', 'Unpaid'),
(10, 2147483647, 'aaaaaaaaa', '2022-12', 0, NULL, '0000-00-00', 'Unpaid'),
(11, 2147483647, 'aaa', '2022-12', 0, NULL, '0000-00-00', 'Unpaid'),
(12, 2147483647, 'wwww', '2022-12', 0, NULL, '0000-00-00', 'Unpaid'),
(13, 2147483647, 'aaaa', '2022-12', 0, NULL, '0000-00-00', 'Unpaid'),
(14, 2147483647, 'ssss', '2022-12', 0, NULL, '0000-00-00', 'Unpaid'),
(15, 2147483647, 'aaaa', '2022-12', 0, NULL, '0000-00-00', 'Unpaid'),
(16, 2147483647, 'sss', '2022-12', 0, NULL, '2222-08-23', 'Unpaid'),
(17, 2147483647, 'dddd', '2022-12', 0, NULL, '2022-08-23', 'Unpaid'),
(18, 0, '', '', 0, NULL, '0000-00-00', 'Paid'),
(19, 2147483647, 'eeeeeeeeee', '2022-12', 0, NULL, '2022-08-24', 'Unpaid'),
(20, 2147483647, 'aaaaaaaaa', '2022-12', 0, NULL, '2022-08-24', 'Unpaid'),
(21, 2147483647, 'M A R Ahmed', '2024-12', 0, NULL, '0000-00-00', 'Paid'),
(22, 2147483647, 'aaaa', '2022-12', 0, NULL, '2022-08-24', 'Unpaid'),
(23, 2147483647, '1111111111', '2022-12', 0, NULL, '2022-08-24', 'Unpaid'),
(24, 2147483647, 'aaaaaaaaaaaaaaaaaa', '2022-12', 0, NULL, '2022-08-24', 'Unpaid'),
(25, 2147483647, 'aaaaaaaaaaaa', '2022-12', 0, NULL, '2022-08-25', 'Unpaid'),
(26, 2147483647, 'aaaaaaaaaaaaaaaaaa', '2022-12', 0, NULL, '0000-00-00', 'Paid'),
(27, 2147483647, 'aaaaaaaaaaa', '2022-12', 0, NULL, '2022-08-25', 'Unpaid'),
(28, 0, 'aaaaaaaaaaa', '2022-12', 0, NULL, '0000-00-00', 'Paid'),
(29, 2147483647, 'aaaa', '2022-12', 0, NULL, '0000-00-00', 'Paid'),
(30, 2147483647, 'aaaa', '2022-12', 0, NULL, '0000-00-00', 'Paid'),
(31, 2147483647, 'aaaaaaa', '2022-12', 720, NULL, '2022-08-25', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `roomtype_id` int(11) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `reservedate` date NOT NULL,
  `hotelid` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `noofrooms` int(50) NOT NULL,
  `noofoccupants` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `clubcharge` varchar(100) NOT NULL,
  `laundrycharge` varchar(100) NOT NULL,
  `restaurantcharge` varchar(100) NOT NULL,
  `roomservice` varchar(100) NOT NULL,
  `telephonecharge` varchar(100) NOT NULL,
  `totalamount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`res_id`, `cus_id`, `roomtype_id`, `checkindate`, `checkoutdate`, `reservedate`, `hotelid`, `room_id`, `noofrooms`, `noofoccupants`, `status`, `clubcharge`, `laundrycharge`, `restaurantcharge`, `roomservice`, `telephonecharge`, `totalamount`) VALUES
(80, 70, 12, '2022-08-27', '2022-08-28', '2022-08-24', 5, 0, 2, 4, 'Accept', '100', '200', '300', '', '', '950'),
(82, 72, 0, '2022-08-24', '2022-08-24', '2022-08-24', 5, 0, 2, 3, 'Pending', '', '', '', '', '', '670'),
(83, 73, 0, '2022-08-24', '2022-08-24', '2022-08-24', 5, 0, 11, 11, 'Pending', '150.00', '120.00', '250.00', '35.00', '', '894'),
(84, 74, 0, '2022-08-24', '2022-08-24', '2022-08-24', 5, 0, 2, 2, 'Pending', '150.00', '120.00', '250.00', '35.00', '', '705'),
(85, 75, 12, '2022-08-24', '2022-08-24', '2022-08-24', 5, 0, 2, 11, 'Pending', '100', '200', '300', '', '', '950'),
(86, 76, 0, '2022-08-25', '2022-08-25', '2022-08-25', 5, 0, 2, 2, 'Pending', '150.00', '120.00', '250.00', '35.00', '80.00', '985'),
(87, 77, 0, '2022-08-25', '2022-08-25', '2022-08-25', 10, 0, 1, 1, 'Pending', '150.00', '120.00', '', '', '', '620'),
(88, 78, 0, '2022-08-25', '2022-08-25', '2022-08-25', 5, 0, 1, 1, 'Pending', '150.00', '120.00', '250.00', '35.00', '', '905'),
(89, 79, 0, '2022-08-25', '2022-08-25', '2022-08-25', 5, 0, 1, 1, 'Pending', '150.00', '120.00', '', '', '', '720');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_number` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `roomtype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_number`, `status`, `hotel_id`, `roomtype_id`) VALUES
(5, '1212121', 'Available', 5, 12),
(6, '222', 'Available', 5, 13),
(7, '111', 'Available', 5, 12);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `id` int(11) NOT NULL,
  `tname` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`id`, `tname`, `price`, `image`, `description`) VALUES
(11, 'Deluxe', 150, 'Deluxe King-1.jpg', 'Air Conditioned, Sea view balcony, King size bed, Three person occupancy, '),
(12, 'Super Deluxe', 350, 'deluxe-1_1920x960.jpg', 'Good Condition, Free WIFI, Large Room, King Size Bed, Three person occuoancy'),
(13, 'Luxury', 450, 'Park-Hyatt-New-York-Manhattan-Sky-Suite-Master-Bedroom-low-res_54_990x660.jpg', 'Air Conditioned, Mini Bar, Extra King Size Bed, Sea View Balcony, Four Person Occupancy '),
(14, 'Single ', 100, 'room_luxury_images_32.jpg', 'Air Conditioned, Single Size Bed, TV And Furnitures, Single Person Occupancy, Private Balcony'),
(15, 'Guest Room', 100, '', 'Single person occupancy, Free WiFi, Air Conditioned ');

-- --------------------------------------------------------

--
-- Table structure for table `travelpartner`
--

CREATE TABLE `travelpartner` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `promocode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `travelpartner`
--

INSERT INTO `travelpartner` (`id`, `name`, `discount`, `promocode`) VALUES
(8, 'aaaaaaaaaaaa', '10000000000', 'TC#142156'),
(9, 'aaaaaaaaaaaa', '45', 'TC#142156'),
(11, 'ss', '12', 'TC#203057');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` char(10) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `mobile`, `email`, `username`, `password`, `role`, `profile`) VALUES
(4, 'Husny', 'Ahmed', '0766565451', 'husny@gmail.com', 'husny', 'husny123', 'Admin', ''),
(5, 'Ruzny', 'Ahmed', '0766565451', 'ruznyahmed3@gmail.com', 'Ruzny', 'ruzny123', 'Admin', 'pngwing.com (3).png'),
(7, 'Ramzy', 'Ahmed', '0764525124', 'ramzy@gmail.com', 'Ramzy', 'Ramzy123', 'Manager', 'pngwing.com.png'),
(9, 'Ruzny', 'Ahmed', '0766565425', 'ruzny@gmail.com', 'Ruzny.A', 'ruzny123', 'Clerk', 'pngwing.com (3).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guestid`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelcode`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `reservation_ibfk_2` (`room_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hotelid` (`hotel_id`),
  ADD KEY `fk_roomtype` (`roomtype_id`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travelpartner`
--
ALTER TABLE `travelpartner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guestid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotelcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `travelpartner`
--
ALTER TABLE `travelpartner`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_hotelid` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotelcode`),
  ADD CONSTRAINT `fk_roomtype` FOREIGN KEY (`roomtype_id`) REFERENCES `roomtype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
