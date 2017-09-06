-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2017 at 09:44 AM
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
-- Database: `sherbimimjeksor++`
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

-- --------------------------------------------------------

--
-- Table structure for table `tblpacientatstaff`
--

CREATE TABLE `tblpacientatstaff` (
  `pid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `hashedpwd` varchar(50) NOT NULL,
  `salt` int(4) NOT NULL,
  `emri` varchar(15) NOT NULL,
  `prindi` varchar(15) NOT NULL,
  `mbiemri` varchar(20) NOT NULL,
  `ditelindja` date NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `departamenti` varchar(30) NOT NULL,
  `mbikqyresi` varchar(50) NOT NULL,
  `nrtel` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpacientatstaff`
--

INSERT INTO `tblpacientatstaff` (`pid`, `username`, `hashedpwd`, `salt`, `emri`, `prindi`, `mbiemri`, `ditelindja`, `adresa`, `email`, `departamenti`, `mbikqyresi`, `nrtel`) VALUES
(1, 'user2', '5f4dcc3b5aa765d61d8327deb882cf99', 1212, 'emri2', 'emri2', 'mbiemri2', '1960-08-10', 'asfasfasfasf', 'dsfsdfsdf', 'sdfsdgs', 'sdgsdgs', 44999999);

-- --------------------------------------------------------

--
-- Table structure for table `tblrekordetpax`
--

CREATE TABLE `tblrekordetpax` (
  `rid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `emri` varchar(30) NOT NULL,
  `mbiemri` varchar(30) NOT NULL,
  `data_regjistrimit` int(11) NOT NULL,
  `shifra_veprimtarise` int(11) NOT NULL,
  `anamneza_konstatimi` varchar(100) NOT NULL,
  `diagnoza` varchar(100) NOT NULL,
  `terapia` varchar(100) NOT NULL,
  `ku_udhezohet` int(11) NOT NULL,
  `paraqitja_serishme` datetime NOT NULL,
  `cmimi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblrekordetstaff`
--

CREATE TABLE `tblrekordetstaff` (
  `rid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `data_regjistrimit` datetime NOT NULL,
  `shifra_veprimtarise` int(11) NOT NULL,
  `pozita_punes` varchar(20) NOT NULL,
  `anamneza_konstatimi` varchar(100) NOT NULL,
  `diagnoza` varchar(100) NOT NULL,
  `terapia` varchar(100) NOT NULL,
  `ku_udhezohet` varchar(50) NOT NULL,
  `data_paraqitjes_serishme` datetime NOT NULL,
  `cmimi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldoktoret`
--
ALTER TABLE `tbldoktoret`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `tblpacientatstaff`
--
ALTER TABLE `tblpacientatstaff`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tblrekordetpax`
--
ALTER TABLE `tblrekordetpax`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `tblrekordetstaff`
--
ALTER TABLE `tblrekordetstaff`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `did` (`did`),
  ADD KEY `pid` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldoktoret`
--
ALTER TABLE `tbldoktoret`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblpacientatstaff`
--
ALTER TABLE `tblpacientatstaff`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblrekordetpax`
--
ALTER TABLE `tblrekordetpax`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblrekordetstaff`
--
ALTER TABLE `tblrekordetstaff`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblrekordetpax`
--
ALTER TABLE `tblrekordetpax`
  ADD CONSTRAINT `tblrekordetpax_ibfk_1` FOREIGN KEY (`did`) REFERENCES `tbldoktoret` (`did`);

--
-- Constraints for table `tblrekordetstaff`
--
ALTER TABLE `tblrekordetstaff`
  ADD CONSTRAINT `tblrekordetstaff_ibfk_1` FOREIGN KEY (`did`) REFERENCES `tbldoktoret` (`did`),
  ADD CONSTRAINT `tblrekordetstaff_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `tblpacientatstaff` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
