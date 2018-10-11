-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2018 at 08:13 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accommodation`
--
CREATE DATABASE IF NOT EXISTS `accommodation` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `accommodation`;

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE `accommodation` (
  `accID` int(11) NOT NULL,
  `accResgistratioonNo` varchar(255) COLLATE utf8_bin NOT NULL,
  `accLocation` varchar(255) COLLATE utf8_bin NOT NULL,
  `accNoOfRooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminFirstN` varchar(255) COLLATE utf8_bin NOT NULL,
  `adminLastN` varchar(255) COLLATE utf8_bin NOT NULL,
  `adminCategory` int(255) NOT NULL,
  `adminAddress` varchar(255) COLLATE utf8_bin NOT NULL,
  `adminPhone` varchar(255) COLLATE utf8_bin NOT NULL,
  `adminEmail` varchar(255) COLLATE utf8_bin NOT NULL,
  `adminPassword` varchar(255) COLLATE utf8_bin NOT NULL,
  `adminActive` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '0',
  `accID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminFirstN`, `adminLastN`, `adminCategory`, `adminAddress`, `adminPhone`, `adminEmail`, `adminPassword`, `adminActive`, `accID`) VALUES
(1, 'Moises', 'Borracha', 1, 'Claremont', '0834866680', 'moisesnt2@gmail.com', '2cb29a44bd2a19bd03400804bb939ddb', '1', 0),
(2, 'Suquila', 'WenyKeny', 2, 'Ronderborch', '0834777832', 'suquila@gmail.com', '7d58ccfcb8eaa301f20480a2953d043b', '0', 0),
(3, 'Robert', 'Zenith', 2, 'Claremont', '348729827833', 'zenith3za@gmail.com', 'Zenith3za', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `bookStatDate` varchar(255) COLLATE utf8_bin NOT NULL,
  `bookEndDate` varchar(255) COLLATE utf8_bin NOT NULL,
  `stayingPeriod` int(11) NOT NULL,
  `bookingDate` datetime NOT NULL,
  `bookingStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookID`, `studID`, `roomID`, `bookStatDate`, `bookEndDate`, `stayingPeriod`, `bookingDate`, `bookingStatus`) VALUES
(16, 17, 2, '2018/09/27', '2019/03/30', 184, '2018-09-27 18:46:56', 1),
(17, 1, 3, '2018/10/27', '2018/12/20', 54, '2018-10-11 14:01:03', 0),
(18, 1, 6, '2018/10/30', '2019/03/23', 144, '2018-10-11 14:01:03', 0),
(19, 1, 4, '2018/12/03', '2019/05/23', 171, '2018-10-11 14:01:03', 0),
(20, 1, 6, '2018/12/05', '2019/02/15', 72, '2018-10-11 14:01:03', 0),
(21, 1, 6, '2018/10/01', '2018/12/05', 65, '2018-10-11 14:01:03', 0),
(22, 1, 5, '2018/10/01', '2018/12/08', 68, '2018-10-11 14:01:03', 0),
(24, 22, 1, '2018/09/30', '2019/02/08', 131, '2018-09-30 03:28:42', 1),
(25, 1, 6, '2018/10/12', '2018/10/13', 1, '2018-10-11 14:01:03', 0),
(26, 1, 5, '2018/10/12', '2018/10/13', 1, '2018-10-11 14:06:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `helpticket`
--

CREATE TABLE `helpticket` (
  `ticketID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `ticketSubject` varchar(255) COLLATE utf8_bin NOT NULL,
  `ticketCategory` varchar(255) COLLATE utf8_bin NOT NULL,
  `ticketTime` datetime NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `helpticket`
--

INSERT INTO `helpticket` (`ticketID`, `studID`, `ticketSubject`, `ticketCategory`, `ticketTime`, `isActive`) VALUES
(5, 22, 'Testing', 'Complaint', '2018-09-25 21:53:33', 0),
(6, 22, 'Room key missing', 'Booking', '2018-09-26 04:02:59', 0),
(7, 22, 'Another test', 'Other', '2018-09-26 20:44:46', 1),
(9, 17, 'Saying', 'Other', '2018-09-30 04:11:53', 1),
(10, 17, 'Saying', 'Other', '2018-09-30 04:13:13', 0),
(11, 17, 'Saying', 'Other', '2018-09-30 04:13:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `helpticketmessage`
--

CREATE TABLE `helpticketmessage` (
  `messageID` int(11) NOT NULL,
  `ticketID` int(11) NOT NULL,
  `studID` int(11) DEFAULT NULL,
  `adminID` int(11) DEFAULT NULL,
  `messageText` longtext COLLATE utf8_bin NOT NULL,
  `messageTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `helpticketmessage`
--

INSERT INTO `helpticketmessage` (`messageID`, `ticketID`, `studID`, `adminID`, `messageText`, `messageTime`) VALUES
(12, 5, 22, NULL, 'Just a simple test', '2018-09-25 21:53:33'),
(13, 6, 22, NULL, 'Where is my room key?! For room 22...', '2018-09-26 04:02:59'),
(14, 7, 22, NULL, 'Yet another to check something', '2018-09-26 20:44:46'),
(19, 7, 22, NULL, 'Reply test', '2018-09-26 22:23:47'),
(22, 7, 22, NULL, 'test', '2018-09-26 22:32:37'),
(23, 7, 22, NULL, 'One last test', '2018-09-26 22:36:41'),
(24, 7, NULL, 1, 'Hello, how can I help?', '2018-09-26 22:49:51'),
(25, 6, 22, NULL, 'test', '2018-09-26 22:58:29'),
(26, 5, 22, NULL, 'test', '2018-09-26 23:12:07'),
(27, 9, 17, NULL, 'I\'ma saying this', '2018-09-30 04:11:54'),
(28, 9, NULL, 1, 'Ok, just say it', '2018-09-30 04:12:41'),
(29, 10, 17, NULL, 'I\'ma saying this', '2018-09-30 04:13:13'),
(30, 11, 17, NULL, 'I\'ma saying this', '2018-09-30 04:13:23'),
(31, 9, NULL, 1, 'u good?', '2018-09-30 04:14:26'),
(27, 7, NULL, 1, 'Test', '2018-09-30 04:35:34'),
(32, 7, NULL, 1, 'Test2', '2018-09-30 05:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `title` longtext COLLATE utf8_bin NOT NULL,
  `body` longtext COLLATE utf8_bin NOT NULL,
  `type` varchar(255) COLLATE utf8_bin NOT NULL,
  `time` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notificationID`, `studID`, `title`, `body`, `type`, `time`, `status`) VALUES
(2, 22, 'A long notification', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque tincidunt scelerisque libero. Vestibulum fermentum tortor id mi. Nullam dapibus fermentum ipsum. Praesent in mauris eu tortor porttitor accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam bibendum elit eget erat. Nullam sit amet magna in magna gravida vehicula. Pellentesque sapien. Mauris metus. Nullam sit amet magna in magna gravida vehicula. Integer malesuada. Duis risus. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Curabitur ligula sapien, pulvinar a vestibulum quis, facilisis vel sapien. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Et harum quidem rerum facilis est et expedita distinctio. Aliquam id dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. ', 'info', '2018-09-27 19:53:17', 0),
(4, 22, 'Test 2', 'Another test', 'notice', '2018-09-27 21:08:20', 1),
(5, 9, 'Test 3', 'For students 9 and 22', 'danger', '2018-09-27 21:08:44', 0),
(6, 22, 'Test 3', 'For students 9 and 22', 'danger', '2018-09-27 21:08:44', 0),
(7, 18, 'Test 4', 'For student with id of 18', 'success', '2018-09-27 21:25:04', 0),
(8, 9, 'Hello', 'Testing again', 'default', '2018-09-27 21:39:08', 0),
(9, 18, 'Hello', 'Testing again', 'default', '2018-09-27 21:39:08', 0),
(10, 22, 'Final test', 'For now...', 'warning', '2018-09-28 02:52:52', 0),
(13, 22, 'Your booking was successful', 'Your booking for room <strong>1</strong> starts at <strong>2018/09/30</strong>.', 'success', '2018-09-30 03:28:42', 0),
(14, 22, 'Your refund request was declined', 'Your payment refund request has been <strong>declined</strong>.', 'danger', '2018-09-30 04:53:09', 0),
(18, 22, 'Your ticket has recieved a reply', 'Your ticket has recieved a reply from <strong>Moises Borracha</strong>. Ticket ID: <strong>7</strong>. Subject: <strong>Another test</strong>.', 'info', '2018-09-30 05:37:10', 0),
(19, 1, 'Your booking was successful', 'Your booking for room <strong>6</strong> starts at <strong>2018/10/12</strong>.', 'success', '2018-10-11 13:53:29', 0),
(20, 1, 'Your booking was successful', 'Your booking for room <strong>5</strong> starts at <strong>2018/10/12</strong>.', 'success', '2018-10-11 14:06:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payID` int(11) NOT NULL,
  `cardNumber` varchar(255) COLLATE utf8_bin NOT NULL,
  `cardMonth` varchar(255) COLLATE utf8_bin NOT NULL,
  `cardYear` varchar(255) COLLATE utf8_bin NOT NULL,
  `payAmount` varchar(255) COLLATE utf8_bin NOT NULL,
  `payMonth` varchar(255) COLLATE utf8_bin NOT NULL,
  `studID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `paymentStatus` int(11) NOT NULL DEFAULT '1',
  `paymentDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payID`, `cardNumber`, `cardMonth`, `cardYear`, `payAmount`, `payMonth`, `studID`, `roomID`, `paymentStatus`, `paymentDate`) VALUES
(16, '37493989238u84', '2989', '2938', '400', '1', 17, 2, 1, '2018-09-23 07:19:35'),
(73, 'we98reeh', 'sduhur', '98er8fh', '440', '2', 17, 2, 1, '2018-10-27 20:21:49'),
(74, '587439', 'siujd', '9348', '999', '1', 1, 3, 0, '2018-10-27 20:48:38'),
(76, 'rfiuf', 'fj4898j4', 'dicu', '4345', '1', 1, 6, 0, '2018-10-27 21:14:45'),
(79, 'eoiriei', 'OIE', 'io', '7386.5', '2', 1, 6, 0, '2018-12-01 21:58:39'),
(80, 'n4875984rfegtredrerer', '98tj', '8f8', '666', '1', 1, 4, 0, '2018-12-01 22:14:42'),
(81, '42u42h3iun', 'kjdn', 'jnde', '400', '3', 17, 2, 1, '2018-12-01 23:02:27'),
(82, '537462j', 'duhfiu', 'fiuhfu', '4345', '1', 1, 6, 0, '2018-12-01 23:14:19'),
(83, '12345', '12345', '12345', '4345', '2', 1, 6, 0, '2018-09-28 00:08:06'),
(84, 'Moises', 'f987y9d', '89f9f', '3445', '1', 1, 5, 0, '2018-09-28 00:13:30'),
(86, '1234123414512', '12', '21', '203.09', '1', 22, 1, 1, '2018-09-30 03:28:42'),
(87, '5467tfgbvht', 'ty', 'jkuu', '4345', '1', 1, 6, 0, '2018-10-11 13:53:29'),
(88, 'fcgvfg', 'gfg', 'gffg', '3445', '1', 1, 5, 1, '2018-10-11 14:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `requestID` int(11) NOT NULL,
  `payID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `reason` longtext COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`requestID`, `payID`, `studID`, `reason`, `date`) VALUES
(1, 81, 17, 'leaving', '2018-10-01 08:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `roomName` varchar(255) COLLATE utf8_bin NOT NULL,
  `roomPrice` float NOT NULL,
  `roomType` varchar(255) COLLATE utf8_bin NOT NULL,
  `roomCapacity` int(11) NOT NULL,
  `roomReserved` enum('0','1') COLLATE utf8_bin NOT NULL,
  `roomImage` varchar(255) COLLATE utf8_bin NOT NULL,
  `roomDescription` text COLLATE utf8_bin NOT NULL,
  `roomShortDescription` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `roomName`, `roomPrice`, `roomType`, `roomCapacity`, `roomReserved`, `roomImage`, `roomDescription`, `roomShortDescription`) VALUES
(1, 'Place 1', 203.09, 'standard', 1, '1', 'namePic1.jpg', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.\r\nDonec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.', 'This is a short description'),
(2, 'Diamond', 400, 'deluxe', 1, '1', 'bridge1.jpg', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.\r\nDonec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna', 'This is a short description. Lorem ipsum dolor sit ametdxf. '),
(3, 'Golden 212', 999, 'standard', 2, '0', '1.jpg', 'Navbar navigation links build on our .nav options with their own modifier class and require the use of toggler classes for proper responsive styling. Navigation in navbars will also grow to occupy as much horizontal space as possible to keep your navbar contents securely aligned.', 'This is a short'),
(4, 'Placio', 666, 'standard', 1, '0', 'park1.jpg', 'This is a short description. Lorem ipsum dolor sit ametdxf. ', 'This is a short description. Lorem ipsum dolor sit ametdxf. '),
(5, 'Orland', 3445, 'deluxe', 1, '1', '3.jpg', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.\r\nDonec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.', 'Donec sed odio dui. Etiam porta sem '),
(6, 'Los Angeles', 4345, 'marketing', 1, '0', 'rails1.jpg', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.\r\nDonec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.', 'Morbi leo risus, porta ac consectetur a'),
(7, 'Plaza', 3455, 'marketing', 1, '0', 'marketing1.jpg', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.\r\n', 'vestibulum at eros. Praesent commodo.'),
(8, 'Deluxe Two', 3234, 'deluxe', 1, '', 'deluxe2.jpg', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.\r\nDonec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.', 'Etiam porta malesuada'),
(9, 'Deluxe Three', 3556, 'deluxe', 1, '', 'deluxe3.jpg', 'Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh ', 'Nullam id dolor id nibh '),
(10, 'Deluxe Four', 3665, 'deluxe', 1, '', 'deluxe4.jpg', 'Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh ', 'Nullam id dolor id nibh '),
(11, 'Gold Two', 6596, 'gold', 2, '', 'gold2.jpg', 'Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh ', 'Nullam id dolor id nibh '),
(12, 'Gold Three', 6798, 'gold', 2, '', 'gold3.jpg', 'Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh ', 'Nullam id dolor id nibh '),
(13, 'Marketing Two', 8757, 'marketing', 2, '', 'marketing2.jpg', 'A stunning combination of endless sandy beaches, warm crystal clear waters, rolling hills and lush green valleys. A voyage through time from primitive Neolithic settlements, to ancient Greek city kingdoms, isolated Byzantine Monasteries and magnificent Crusader Castles.', 'Combination of endless sandy beaches'),
(14, 'Marketing Three', 7856, 'marketing', 2, '', 'marketing3.jpg', 'The Accommodation has several beautiful rooms. The temperature controlled rooms are fully furnished and equipped with every modern amenity, such as satellite 32â€ LED TV, mini bar, tea & coffee making facilities, laptop-sized safe deposit box, as well as Free Wi-Fi internet connection.', 'Combination of all'),
(15, 'Marketing Four', 9347, 'gold', 2, '', 'marketing4.jpg', 'The Accommodation has several beautiful rooms. The temperature controlled rooms are fully furnished and equipped with every modern amenity, such as satellite 32â€ LED TV, mini bar, tea & coffee making facilities, laptop-sized safe deposit box, as well as Free Wi-Fi internet connection.', 'Free Wi-Fi internet connection'),
(16, 'Standard Two', 3211, 'standard', 1, '', 'standard2.jpg', 'Navbar navigation links build on our .nav options with their own modifier class and require the use of toggler classes for proper responsive styling. ', 'Navbar navigation links build on our '),
(17, 'Standard Three', 3221, 'standard', 1, '', 'standard3.jpg', 'Navbar navigation links build on our .nav options with their own modifier class and require the use of toggler classes for proper responsive styling. ', 'Proper responsive styling'),
(18, 'Standard Four', 2999, 'standard', 1, '', 'standard4.jpg', 'Navbar navigation links build on our .nav options with their own modifier class and require the use of toggler classes for proper responsive styling. ', 'Cheaper options for Student'),
(19, 'Standard Five', 3899, 'standard', 1, '', 'standard5.jpg', 'The Accommodation has several beautiful rooms. The temperature controlled rooms are fully furnished and equipped with every modern amenity.', 'Fully furnished and equipped'),
(20, 'Standard Six', 3777, 'standard', 1, '', 'standard6.jpg', 'Navbar navigation links build on our .nav options with their own modifier class and require the use of toggler classes for proper responsive styling.', 'Modifier class and require ');

-- --------------------------------------------------------

--
-- Table structure for table `roommarket`
--

CREATE TABLE `roommarket` (
  `roomMarketID` int(11) NOT NULL,
  `firstText` varchar(255) COLLATE utf8_bin NOT NULL,
  `secondText` varchar(255) COLLATE utf8_bin NOT NULL,
  `roomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `roommarket`
--

INSERT INTO `roommarket` (`roomMarketID`, `firstText`, `secondText`, `roomID`) VALUES
(1, 'First featurette heading.', 'It\'ll blow your mind.', 13),
(2, 'Oh yeah, it\'s that good.', 'See for yourself.', 14),
(3, 'What are you waiting for?', 'Book today.', 7),
(4, 'Oh yeah, it\'s that good.', 'See for yourself.', 6);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studID` int(11) NOT NULL,
  `studFirstName` varchar(255) COLLATE utf8_bin NOT NULL,
  `studMiddleName` varchar(255) COLLATE utf8_bin NOT NULL,
  `studLastName` varchar(255) COLLATE utf8_bin NOT NULL,
  `studEmail` varchar(255) COLLATE utf8_bin NOT NULL,
  `studPassword` varchar(255) COLLATE utf8_bin NOT NULL,
  `studGender` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '''M'',''F''',
  `studDOB` varchar(255) COLLATE utf8_bin NOT NULL,
  `studSchool` varchar(255) COLLATE utf8_bin NOT NULL,
  `studSchoolAddress` varchar(255) COLLATE utf8_bin NOT NULL,
  `studCountry` varchar(255) COLLATE utf8_bin NOT NULL,
  `studCity` varchar(255) COLLATE utf8_bin NOT NULL,
  `studStreet` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_passport` varchar(255) COLLATE utf8_bin NOT NULL,
  `studPhone` varchar(255) COLLATE utf8_bin NOT NULL,
  `activationKey` varchar(255) COLLATE utf8_bin NOT NULL,
  `isActive` enum('0','1') COLLATE utf8_bin NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studID`, `studFirstName`, `studMiddleName`, `studLastName`, `studEmail`, `studPassword`, `studGender`, `studDOB`, `studSchool`, `studSchoolAddress`, `studCountry`, `studCity`, `studStreet`, `id_passport`, `studPhone`, `activationKey`, `isActive`, `data`) VALUES
(1, 'Moises', 'mooo', 'Suquila', 'moisesnt446@gmail.com', '8ee2197f8c482f9cdb157f126e255bc3', 'Male', '2018-08-04', 'hb', 'hb', '', '', '', 'hjghfgdf', '0834866680', 'd50dffefc052e05251ea91eb3a711f9d', '1', '2018-08-10 21:07:09'),
(2, 'Moises', 'mooo', 'Suquila', 'moisesnt4426@gmail.com', '8ee2197f8c482f9cdb157f126e255bc3', 'Male', '2018-08-04', 'hb', 'hb', '', '', '', 'hjghfgdf', '0834866680', 'd50dffefc052e05251ea91eb3a711f9d', '1', '2018-08-10 21:08:45'),
(3, 'ee', 'mooo', 'Suquila', 'moi@dd.c', 'f5213dacaee168fffb80807b1cc0e269', 'Female', '2018-08-10', 'hb', 'trdf', '', '', '', 'hjghfgdf', '0834866680', 'd50dffefc052e05251ea91eb3a711f9d', '1', '2018-08-10 21:09:32'),
(4, 'ee', 'mooo', 'Suquila', 'moid@dd.c', 'f5213dacaee168fffb80807b1cc0e269', 'Male', '2018-08-10', 'hb', 'trdf', '', '', '', 'hjghfgdf', '0834866680', 'd50dffefc052e05251ea91eb3a711f9d', '1', '2018-08-10 21:10:49'),
(5, 'ee', 'mooo', 'Suquila', 'moid@dd.com', 'f5213dacaee168fffb80807b1cc0e269', 'Male', '2018-08-10', 'hb', 'trdf', '', '', '', 'hjghfgdf', '0834866680', 'aef1733fd326b6023c4126ed088af2db', '1', '2018-08-10 21:11:58'),
(6, 'ee', 'mooo', 'Suquila', 'moidd@dd.com', 'f5213dacaee168fffb80807b1cc0e269', 'Male', '2018-08-10', 'hb', 'trdf', '', '', '', 'hjghfgdf', '0834866680', '4c760841c402abea779ff5c857b35afa', '1', '2018-08-10 21:13:02'),
(7, 'Ee', 'Mooo', 'Suquila', 'moisddd@dd.com', 'f5213dacaee168fffb80807b1cc0e269', 'Male', '2018-08-10', 'Hb', 'Trdf', '', '', '', 'hjghfgdf', '0834866680', '92ae56d3c81e8dd53aae2bf77c267ce5', '1', '2018-08-10 21:19:15'),
(8, 'Kdfhbvh', 'KJSDFJN', 'DKJFNF', 'mois@fdj.cisjd', 'efdd30ebc81423fe7e5f016a10c67570', 'Male', '0000-00-00', 'Kjdnjnc', 'Jnxckjn', '', '', '', 'jdnfjncjn', '9387444363', 'bef2e86c5dbc9587fee929d4c84fb08a', '0', '2018-08-14 21:17:02'),
(9, 'OKKKKK', 'Kjxncjn', 'Kdjfnjvnjk', 'moise@gma.com', '6e37469971a8bb23117f0085370dda2d', 'Male', '0000-00-00', 'Cjndjc', 'Kdjncjn', '', '', '', 'kjfnvjfnj', '2345456662211', '27ef5cf82630dd9d694f6843ef5a518c', '1', '2018-08-14 21:21:12'),
(17, 'Moises', 'Wenikeni', 'Borracha', 'moisesnt2@gmail.com', '8ee2197f8c482f9cdb157f126e255bc3', 'Male', '1993-08-20', 'CTI', '21 Claremont', 'Angola', 'Talatona', 'Rua 12', 'N1353299', '23763783772', '8c9c87290a8bb9de1d3e123fe13602a2', '1', '2018-08-22 16:33:34'),
(18, 'Ze', 'Assunca', 'Luia', 'zenaideluis22@gmail.com', '2b0eb3f6a700f8cb1f3148b6b08aab2e', 'Male', '0000-00-00', 'Cti', 'Iamb Road', '', '', '', 'n27382nw34', '9987739279293', '2f444438b0b2cc7a64fe8107107157f8', '1', '2018-08-16 11:11:40'),
(22, 'Robert', 'Fritz', 'Berge', 'zenith3za@gmail.com', 'd106b29303767527fc11214f1b325fb6', 'Male', '1998-01-06', 'Bergvliet High', 'Dunno', 'South Africa', 'Cape Town', 'Hertzog Road', '9806015255087', '0724375326', '91fccd488a9f0015a74dbbf8448e0975', '1', '2018-09-07 00:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `studentprofile`
--

CREATE TABLE `studentprofile` (
  `profileID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `studDescription` varchar(255) COLLATE utf8_bin NOT NULL,
  `studPicture` varchar(255) COLLATE utf8_bin NOT NULL,
  `profileRestriction` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `studentprofile`
--

INSERT INTO `studentprofile` (`profileID`, `studID`, `studDescription`, `studPicture`, `profileRestriction`, `date`) VALUES
(1, 22, '', '', 0, '2018-09-29 01:19:29'),
(5, 18, 'iam here', 'Deluxe', 0, '2018-08-22 11:01:25'),
(7, 17, 'Im There', '17Deluxe.jpg', 0, '2018-08-22 16:33:34'),
(8, 1, '', '', 0, '2018-09-24 18:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `viewing`
--

CREATE TABLE `viewing` (
  `viewBookingID` int(11) NOT NULL,
  `viewerName` varchar(255) COLLATE utf8_bin NOT NULL,
  `viewerEmail` varchar(255) COLLATE utf8_bin NOT NULL,
  `viewerPhone` varchar(255) COLLATE utf8_bin NOT NULL,
  `viewDate` datetime NOT NULL,
  `viewStatus` int(11) NOT NULL,
  `roomName` varchar(55) COLLATE utf8_bin NOT NULL,
  `scheduledDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `viewing`
--

INSERT INTO `viewing` (`viewBookingID`, `viewerName`, `viewerEmail`, `viewerPhone`, `viewDate`, `viewStatus`, `roomName`, `scheduledDate`) VALUES
(1, 'Moises', 'moisesnt2@gmail.com', '8348666889', '2018-08-31 00:00:00', 1, '0', '2018-08-30 01:35:11'),
(2, 'Moises', 'moisesnt2@gmail.com', '8348666889', '2018-08-31 12:00:00', 1, '0', '2018-08-30 01:37:00'),
(3, 'teressa', 'moisesnt2@gmail.com', '65555465766', '2018-09-22 12:30:00', 1, '0', '2018-09-21 21:48:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD PRIMARY KEY (`accID`),
  ADD UNIQUE KEY `Unique` (`accResgistratioonNo`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `unique` (`adminEmail`),
  ADD KEY `accID` (`accID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `helpticket`
--
ALTER TABLE `helpticket`
  ADD PRIMARY KEY (`ticketID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payID`),
  ADD KEY `stupid` (`studID`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`requestID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `roomName` (`roomName`);

--
-- Indexes for table `roommarket`
--
ALTER TABLE `roommarket`
  ADD PRIMARY KEY (`roomMarketID`),
  ADD KEY `Foreign` (`roomID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studID`),
  ADD UNIQUE KEY `studEmail` (`studEmail`);

--
-- Indexes for table `studentprofile`
--
ALTER TABLE `studentprofile`
  ADD PRIMARY KEY (`profileID`),
  ADD UNIQUE KEY `Unique` (`studID`);

--
-- Indexes for table `viewing`
--
ALTER TABLE `viewing`
  ADD PRIMARY KEY (`viewBookingID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodation`
--
ALTER TABLE `accommodation`
  MODIFY `accID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `helpticket`
--
ALTER TABLE `helpticket`
  MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roommarket`
--
ALTER TABLE `roommarket`
  MODIFY `roomMarketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `studentprofile`
--
ALTER TABLE `studentprofile`
  MODIFY `profileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `viewing`
--
ALTER TABLE `viewing`
  MODIFY `viewBookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
