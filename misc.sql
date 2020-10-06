-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2020 at 03:26 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `misc`
--

-- --------------------------------------------------------

--
-- Table structure for table `autos`
--

CREATE TABLE `autos` (
  `auto_id` int(11) NOT NULL,
  `make` varchar(128) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autos`
--

INSERT INTO `autos` (`auto_id`, `make`, `year`, `mileage`) VALUES
(2, 'BMW', 1987, 100000),
(4, 'Volvo', 2019, 30),
(10, 'Ford', 2010, 7000),
(18, 'Saab', 1998, 20000),
(19, 'MG', 1973, 100322),
(21, 'Ford', 1998, 20000),
(26, 'Mitsubishi', 2003, 43000),
(28, 'Suzuki', 2006, 12000),
(37, 'Toyota', 2013, 20000),
(38, 'Chevy', 2003, 2000000),
(39, 'Nissan', 2002, 75000),
(40, 'Porche', 2019, 105),
(41, 'Lincoln', 2012, 70000),
(42, 'Honda', 1979, 129000),
(44, 'Yugo', 1985, 100000),
(45, NULL, NULL, NULL),
(46, 'volvo', 2019, 73000),
(47, 'volvo', 2019, 55555),
(48, 'BMW', 2020, 23300),
(49, 'BMW', 2020, 23300),
(50, 'BMW', 2020, 23300),
(51, 'BMW', 2020, 23300),
(52, 'BMW', 2020, 23300),
(53, 'BMW', 2020, 23300),
(54, 'Alpha Romeo', 1977, 23700),
(55, 'Datsun', 1976, 173000),
(56, 'Datsun', 1976, 173000),
(57, 'Datsun', 1976, 173000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'Chuck', 'csev@umich.edu', '123'),
(2, 'Glenn', 'gg@umich.edu', '456'),
(3, 'Rod', 'rod@umich.edu', 'php123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autos`
--
ALTER TABLE `autos`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
