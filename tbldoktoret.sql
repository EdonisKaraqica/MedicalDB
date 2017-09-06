-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2017 at 09:31 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sherbimimjeksor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldoktoret`
--

CREATE TABLE `tbldoktoret` (
  `did` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `hashedpwd` varchar(50) NOT NULL,
  `salt` int(4) NOT NULL,
  `emri` varchar(20) NOT NULL,
  `mbiemri` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `nrtel` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldoktoret`
--

INSERT INTO `tbldoktoret` (`did`, `username`, `hashedpwd`, `salt`, `emri`, `mbiemri`, `email`, `adresa`, `nrtel`) VALUES
(1, 'user1', '5f4dcc3b5aa765d61d8327deb882cf99', 1122, 'emri1', 'mbiemri1', 'emri@ggg.com', 'emri asdasd', 44999999);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldoktoret`
--
ALTER TABLE `tbldoktoret`
  ADD PRIMARY KEY (`did`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldoktoret`
--
ALTER TABLE `tbldoktoret`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
