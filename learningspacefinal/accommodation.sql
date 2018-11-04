-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2018 at 07:06 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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
(1, 'Moises', 'Borracha', 1, 'Claremont', '0834866680', 'moisesnt2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', 0),
(2, 'Suquila', 'WenyKeny', 2, 'Ronderborch', '0834777832', 'suquila@gmail.com', '7d58ccfcb8eaa301f20480a2953d043b', '0', 0),
(3, 'Robert', 'Zenith', 2, 'Claremont', '348729827833', 'zenith3za@gmail.com', 'Zenith3za', '0', 0),
(5, 'Zenaide', 'Luis', 2, 'Cape Town', '12312313', 'zenaideluis22@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', 0);

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
(17, 1, 3, '2018/10/27', '2018/12/20', 54, '2018-09-28 00:14:15', 0),
(18, 1, 6, '2018/10/30', '2019/03/23', 144, '2018-09-28 00:14:15', 0),
(19, 1, 4, '2018/12/03', '2019/05/23', 171, '2018-09-28 00:14:15', 0),
(20, 1, 6, '2018/12/05', '2019/02/15', 72, '2018-09-28 00:14:15', 0),
(21, 1, 6, '2018/10/01', '2018/12/05', 65, '2018-09-28 00:14:15', 1),
(22, 1, 5, '2018/10/01', '2018/12/08', 68, '2018-09-28 00:14:15', 1),
(24, 22, 7, '2018/10/19', '2018/10/26', 7, '2018-10-08 21:18:56', 0),
(25, 22, 7, '2018/10/10', '2019/03/08', 149, '2018-10-08 21:21:29', 1),
(26, 23, 3, '2018/10/17', '2020/07/17', 639, '2018-10-16 17:42:15', 1);

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
(7, 22, 'Another test', 'Other', '2018-09-26 20:44:46', 1),
(8, 23, 'Noise coming from room 19', 'Complaint', '2018-10-16 19:49:44', 1);

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
(27, 7, NULL, 1, 'Test', '2018-09-30 04:35:34'),
(32, 7, NULL, 1, 'Test2', '2018-09-30 05:37:10'),
(33, 7, NULL, 1, 'Hello', '2018-10-15 03:02:30'),
(34, 8, 23, NULL, 'The student staying at room 19 is consistently making a loud noise.\r\n\r\nCan this please be looked into as it is very annoying.', '2018-10-16 19:49:44'),
(36, 8, 23, NULL, 'This is a reply', '2018-10-16 19:56:49'),
(37, 8, 23, NULL, 'test', '2018-10-16 20:00:50'),
(38, 8, 23, NULL, 'test', '2018-10-16 20:01:57');

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
(2, 22, 'A long notification', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque tincidunt scelerisque libero. Vestibulum fermentum tortor id mi. Nullam dapibus fermentum ipsum. Praesent in mauris eu tortor porttitor accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam bibendum elit eget erat. Nullam sit amet magna in magna gravida vehicula. Pellentesque sapien. Mauris metus. Nullam sit amet magna in magna gravida vehicula. Integer malesuada. Duis risus. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Curabitur ligula sapien, pulvinar a vestibulum quis, facilisis vel sapien. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Et harum quidem rerum facilis est et expedita distinctio. Aliquam id dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. ', 'info', '2018-09-27 00:00:00', 1),
(4, 22, 'Test 2', 'Another test', 'notice', '2018-09-27 21:08:20', 1),
(6, 22, 'Test 3', 'For students 9 and 22', 'danger', '2018-09-27 21:08:44', 1),
(7, 18, 'Test 4', 'For student with id of 18', 'success', '2018-09-27 21:25:04', 0),
(8, 9, 'Hello', 'Testing again', 'default', '2018-09-27 21:39:08', 0),
(9, 18, 'Hello', 'Testing again', 'default', '2018-09-27 21:39:08', 0),
(10, 22, 'Final test', 'For now...', 'warning', '2018-09-28 02:52:52', 1),
(13, 22, 'Your booking was successful', 'Your booking for room <strong>1</strong> starts at <strong>2018/09/30</strong>.', 'success', '2018-09-30 03:28:42', 1),
(14, 22, 'Your refund request was declined', 'Your payment refund request has been <strong>declined</strong>.', 'danger', '2018-09-30 04:53:09', 1),
(18, 22, 'Your ticket has recieved a reply', 'Your ticket has recieved a reply from <strong>Moises Borracha</strong>. Ticket ID: <strong>7</strong>. Subject: <strong>Another test</strong>.', 'info', '2018-09-30 05:37:10', 1),
(20, 22, 'stress test tttt', 'aesfasdf', 'notice', '2018-10-02 02:08:14', 1),
(21, 22, 'asdfsdfasdfa', 'asdfasdfasdf', 'info', '2018-10-02 02:08:20', 1),
(22, 22, 'sadfasdfasdf', 'asdfasdfasfasdfasdf', 'success', '2018-10-02 02:08:28', 1),
(23, 22, 'Your booking was successful', 'Your booking for room <strong>7</strong> starts at <strong>2018/10/10</strong>.', 'success', '2018-10-06 19:46:52', 1),
(24, 22, 'Your refund request was accepted', 'Your payment refund request has been <strong>accepted</strong>.', 'success', '2018-10-06 19:52:46', 1),
(25, 22, 'Your refund request was accepted', 'Your payment refund request has been <strong>accepted</strong>.', 'success', '2018-10-06 19:52:53', 1),
(26, 22, 'Your booking was successful', 'Your booking for room <strong>7</strong> starts at <strong>2018/10/19</strong>.', 'success', '2018-10-08 21:07:54', 1),
(28, 22, 'Your refund request was declined', 'Your payment refund request has been <strong>declined</strong>.', 'danger', '2018-10-11 18:54:17', 1),
(29, 22, 'Your ticket has recieved a reply', 'Your ticket has recieved a reply from <strong>Moises Borracha</strong>. Ticket ID: <strong>7</strong>. Subject: <strong>Another test</strong>.', 'info', '2018-10-15 03:02:30', 0),
(30, 23, 'Your booking was successful', 'Your booking for room <strong>3</strong> starts at <strong>2018/10/17</strong>.', 'success', '2018-10-16 17:42:15', 1),
(31, 23, 'Your payment was successful', 'Your payment for room <strong>3</strong> was successful.', 'success', '2018-10-16 18:06:23', 1),
(32, 23, 'Your refund request was accepted', 'Your payment refund request has been <strong>accepted</strong>.', 'success', '2018-10-16 18:47:28', 1),
(35, 23, 'Your viewing has been scheduled', 'Your view booking for <strong>Standard Four</strong> (room number <strong>18</strong>) has been scheduled for <strong>2018/10/27 20:51</strong>.', 'notice', '2018-10-25 20:51:26', 0),
(36, 23, 'Your viewing has been scheduled', 'Your view booking for <strong>Standard Four</strong> (room number <strong>18</strong>) has been scheduled for <strong>2018/10/31 20:52</strong>.', 'notice', '2018-10-25 20:52:35', 0);

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
(87, '23423423423', '10', '23', '6455', '1', 22, 7, 0, '2018-10-06 19:46:52'),
(88, '45234234', '12', '22', '6455', '1', 22, 7, 0, '2018-10-08 21:07:54'),
(89, '234234234', '11', '22', '6455', '1', 22, 7, 1, '2018-10-08 21:21:29'),
(90, '2323423', '12', '11', '12049.333333333', '2', 22, 7, 0, '2018-10-10 20:28:29'),
(91, '646546', '12', '21', '12049.333333333', '2', 22, 7, 0, '2018-10-10 20:38:22'),
(92, '2342423423', '12', '21', '12049.333333333', '2', 22, 7, 1, '2018-10-10 20:48:01'),
(93, '123123123', '12', '20', '999', '1', 23, 3, 0, '2018-10-16 17:42:15'),
(94, '123423442', '12', '20', '999', '2', 23, 3, 0, '2018-10-16 18:06:23');

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
(4, 94, 23, '', '2018-10-16 18:39:28');

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
(3, 'Golden 212', 999, 'standard', 2, '1', '1.jpg', 'Navbar navigation links build on our .nav options with their own modifier class and require the use of toggler classes for proper responsive styling. Navigation in navbars will also grow to occupy as much horizontal space as possible to keep your navbar contents securely aligned.', 'This is a short'),
(4, 'Placio', 666, 'standard', 1, '0', 'park1.jpg', 'This is a short description. Lorem ipsum dolor sit ametdxf. ', 'This is a short description. Lorem ipsum dolor sit ametdxf. '),
(5, 'Orland', 3445, 'deluxe', 1, '1', '3.jpg', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.\r\nDonec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.', 'Donec sed odio dui. Etiam porta sem '),
(6, 'Los Angeles', 4345, 'marketing', 1, '0', 'rails1.jpg', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.\r\nDonec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.', 'Morbi leo risus, porta ac consectetur a'),
(7, 'Plaza', 3455, 'marketing', 1, '0', 'marketing1.jpg', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.\r\n', 'vestibulum at eros. Praesent commodo.'),
(8, 'Deluxe Two', 3234, 'deluxe', 1, '', 'deluxe2.jpg', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.\r\nDonec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.', 'Etiam porta malesuada'),
(9, 'Deluxe Three', 3556, 'deluxe', 1, '', 'deluxe3.jpg', 'Etiam commodo dui eget wisi. Duis bibendum, lectus ut viverra rhoncus, dolor nunc faucibus libero, eget facilisis enim ipsum id lacus. Proin mattis lacinia justo. Etiam neque. Nulla non lectus sed nisl molestie malesuada. Vestibulum fermentum tortor id mi. Etiam dictum tincidunt diam. Nulla quis diam. Proin mattis lacinia justo.', 'Nullam id dolor id nibh '),
(10, 'Deluxe Four', 3665, 'deluxe', 1, '', 'deluxe4.jpg', 'Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh ', 'Nullam id dolor id nibh '),
(11, 'Gold Two', 6596, 'gold', 2, '', 'gold2.jpg', 'Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh ', 'Nullam id dolor id nibh '),
(12, 'Gold Three', 6798, 'gold', 2, '', 'gold3.jpg', 'Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh Nullam id dolor id nibh ', 'Nullam id dolor id nibh '),
(14, 'Marketing Three', 7856, 'marketing', 2, '', 'marketing3.jpg', 'The Accommodation has several beautiful rooms. The temperature controlled rooms are fully furnished and equipped with every modern amenity, such as satellite 32â€ LED TV, mini bar, tea & coffee making facilities, laptop-sized safe deposit box, as well as Free Wi-Fi internet connection.', 'Combination of all'),
(15, 'Marketing Four', 9347, 'gold', 2, '', 'marketing4.jpg', 'The Accommodation has several beautiful rooms. The temperature controlled rooms are fully furnished and equipped with every modern amenity, such as satellite 32â€ LED TV, mini bar, tea & coffee making facilities, laptop-sized safe deposit box, as well as Free Wi-Fi internet connection.', 'Free Wi-Fi internet connection'),
(16, 'Standard Two', 3211, 'standard', 1, '', 'standard2.jpg', 'Navbar navigation links build on our .nav options with their own modifier class and require the use of toggler classes for proper responsive styling. ', 'Navbar navigation links build on our '),
(17, 'Standard Three', 3221, 'standard', 1, '', 'standard3.jpg', 'Navbar navigation links build on our .nav options with their own modifier class and require the use of toggler classes for proper responsive styling. ', 'Proper responsive styling'),
(18, 'Standard Four', 2999, 'standard', 1, '', 'standard4.jpg', 'Navbar navigation links build on our .nav options with their own modifier class and require the use of toggler classes for proper responsive styling. ', 'Cheaper options for Student'),
(19, 'Standard Five', 3899, 'standard', 1, '', 'standard5.jpg', 'The Accommodation has several beautiful rooms. The temperature controlled rooms are fully furnished and equipped with every modern amenity.', 'Fully furnished and equipped'),
(20, 'Standard Six', 3777, 'standard', 1, '0', 'standard6.jpg', 'Navbar navigation links build on our .nav options with their own modifier class and require the use of toggler classes for proper responsive styling.', 'Modifier class and require ');

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
(2, 'Moises', 'mooo', 'Suquila', 'moisesnt4426@gmail.com', '8ee2197f8c482f9cdb157f126e255bc3', 'Male', '2018-08-04', 'hb', 'hb', '', '', '', 'hjghfgdf', '0834866680', 'd50dffefc052e05251ea91eb3a711f9d', '1', '2018-08-10 21:08:45'),
(7, 'Ee', 'Mooo', 'Suquila', 'moisddd@dd.com', 'f5213dacaee168fffb80807b1cc0e269', 'Male', '2018-08-10', 'Hb', 'Trdf', 'saasdf', 'sdfsdf', 'sdfsdf', 'hjghfgdf', '0834866680', '92ae56d3c81e8dd53aae2bf77c267ce5', '1', '2018-08-10 21:19:15'),
(9, 'OKKKKK', 'Kjxncjn', 'Kdjfnjvnjk', 'moise@gma.com', '6e37469971a8bb23117f0085370dda2d', 'Male', '0000-00-00', 'Cjndjc', 'Kdjncjn', '', '', '', 'kjfnvjfnj', '2345456662211', '27ef5cf82630dd9d694f6843ef5a518c', '1', '2018-08-14 21:21:12'),
(23, 'Robert', 'Fritz', 'Berge', 'zenith3za@gmail.com', 'd106b29303767527fc11214f1b325fb6', 'Male', '1998-06-01', 'Bergvliet High', '12 Firgrove Road', 'South Africa', 'Cape Town ', 'Hertzog Road', '9806015255087', '0724375326', 'f7baf0c1aa3f4ff186b0a575602a040a', '1', '2018-11-01 02:08:17'),
(24, 'Sdfsdf', 'Sdfsdf', 'Sdfsdf', 'sdfsdf@sdfsdf.csadf', 'd106b29303767527fc11214f1b325fb6', 'Male', '1997-11-12', 'Sdfsdf', 'Sdfsdf', 'Ssdf', 'Sdfsdf', 'sdfsdf', '123123', '123123123333', 'eb7c1238597f6964262b4e7ff2ad07e0', '0', '2018-11-01 02:20:11');

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
(2, 23, 'I\'m A Happy Guy', '23shibe.jpg', 0, '2018-11-01 02:08:17');

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
(4, 'Robert Berge', 'zenith3za@gmail.com', '0724375326', '2018-10-11 03:56:00', 1, '7', '2018-10-02 03:57:00'),
(5, 'Robert Berge', 'zenith3za@gmail.com', '0724375326', '2018-10-18 17:23:00', 1, '9', '2018-10-16 17:29:07'),
(6, 'Robert', 'zenith3za@gmail.com', '0724375326', '2018-10-19 17:30:00', 1, '9', '2018-10-16 17:30:27'),
(7, 'Robert Berge', 'zenith3za@gmail.com', '0724375326', '2018-10-26 20:49:00', 1, '16', '2018-10-25 20:49:26'),
(8, 'Robert Berge', 'zenith3za@gmail.com', '0724375326', '2018-10-27 20:51:00', 1, '18', '2018-10-25 20:51:26'),
(9, 'Robert Berge', 'zenith3za@gmail.com', '0724375326', '2018-10-31 20:52:00', 1, '18', '2018-10-25 20:52:34'),
(10, 'Robert Berge', 'zenith3za@gmail.com', '0724375326', '2018-10-26 20:53:00', 1, '18', '2018-10-25 20:53:31');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `helpticketmessage`
--
ALTER TABLE `helpticketmessage`
  ADD PRIMARY KEY (`messageID`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `helpticket`
--
ALTER TABLE `helpticket`
  MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `helpticketmessage`
--
ALTER TABLE `helpticketmessage`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
