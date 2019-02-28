-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2019 at 07:07 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ISBN` varchar(20) NOT NULL,
  `BookTitle` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Edition` int(1) NOT NULL,
  `Year` year(4) NOT NULL,
  `Category` varchar(3) NOT NULL,
  `Reserved` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `BookTitle`, `Author`, `Edition`, `Year`, `Category`, `Reserved`) VALUES
('093-403992', 'Computers in Business', 'Alicia Oneill', 3, 1997, '003', 'N'),
('23472-8729', 'Exploring Peru', 'Stephanie Birch', 4, 2005, '005', 'Y'),
('237-34823', 'Business Strategy', 'Joe Peppard', 2, 2002, '002', 'N'),
('23u8-923849', 'A guide to nutrition', 'John Thorpe', 2, 1997, '001', 'Y'),
('2983-3494', 'Cooking for children', 'Anabelle Sharpe', 1, 2003, '007', 'N'),
('82n8-308', 'computers for idiots', 'Susan O\'Neill', 5, 1998, '004', 'Y'),
('9823-23984', 'My life in picture', 'Kevin Graham', 8, 2004, '001', 'Y'),
('9823-2403-0', 'DaVinci Code', 'Dan Brown', 1, 2003, '008', 'N'),
('9823-98345', 'How to cook Italian food', 'Jamie Oliver', 2, 2005, '007', 'Y'),
('9823-98487', 'Optimising your business', 'Cleo Blair', 1, 2001, '002', 'N'),
('98234-029384', 'My ranch in Texas', 'George Bush', 1, 2005, '001', 'Y'),
('988745-234', 'Tara Road', 'Maeve Binchy', 4, 2002, '008', 'N'),
('993-004-00', 'My life in bits', 'John Smith', 1, 2001, '001', 'N'),
('9987-0039882', 'Shooting History', 'Jon Snow', 1, 2003, '001', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` varchar(3) NOT NULL,
  `CategoryDescription` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryDescription`) VALUES
('001', 'Health'),
('002', 'Business'),
('003', 'Biography'),
('004', 'Technology'),
('005', 'Travel'),
('006', 'Self-Help'),
('007', 'Cookery'),
('008', 'Fiction'),
('009', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ISBN` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `ReservedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ISBN`, `Username`, `ReservedDate`) VALUES
('9823-98345', 'tommy100', '2008-10-11'),
('98234-029384', 'joecrotty', '2008-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(6) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `AddressLine1` varchar(50) NOT NULL,
  `AddressLine2` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Telephone` int(10) NOT NULL,
  `Mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `FirstName`, `Surname`, `AddressLine1`, `AddressLine2`, `City`, `Telephone`, `Mobile`) VALUES
('alanjmckenna', 't1234s', 'Alan', 'McKenna', '38 Cranley Road', 'Fairview', 'Dublin', 9998377, 856625567),
('joecrotty', 'kj7899', 'Joseph', 'Crotty', 'Apt 5 Clyde Road', 'Donnybrook', 'Dublin', 8887889, 876654456),
('test', 'test11', 'test', 'test', 'test', 'test', 'test', 2147483647, 1111111111),
('tommy100', '123456', 'tom', 'behan', '14 hyde road', 'dalkey', 'dublin', 9983747, 876738782);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `fk_category` (`Category`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `fk_user` (`Username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`Category`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_isbn` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
