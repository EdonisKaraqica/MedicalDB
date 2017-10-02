-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2017 at 09:40 AM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tblrekordetpax`
--

CREATE TABLE IF NOT EXISTS `tblrekordetpax` (
  `rid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `emri` varchar(30) DEFAULT NULL,
  `prindi` varchar(30) DEFAULT NULL,
  `mbiemri` varchar(30) DEFAULT NULL,
  `gjinia` enum('F','M') DEFAULT NULL,
  `ditelindja` date DEFAULT NULL,
  `adresa` varchar(200) DEFAULT NULL,
  `data_regjistrimit` datetime DEFAULT NULL,
  `shifra_veprimtarise` varchar(11) DEFAULT NULL,
  `cmimi` double DEFAULT NULL,
  `NumriID` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `vendlindja` varchar(255) DEFAULT NULL,
  `NumriDosjes` int(11) DEFAULT NULL,
  `njesia` varchar(255) DEFAULT NULL,
  `telefoni` varchar(25) DEFAULT NULL,
  `diagnoza` varchar(100) DEFAULT NULL,
  `ankesa` varchar(255) DEFAULT NULL,
  `anamnezaesemundjes` varchar(255) DEFAULT NULL,
  `anamnezaefamiljes` varchar(255) DEFAULT NULL,
  `laboratori` varchar(255) DEFAULT NULL,
  `trajtimi` varchar(255) DEFAULT NULL,
  `perfundimi` varchar(255) DEFAULT NULL,
  `raportimjeksorid` int(11) DEFAULT NULL,
  `raportudhetimiperpasagjerid` int(11) DEFAULT NULL,
  `receteid` int(11) DEFAULT NULL,
  `udhezimperekzaminimelaboratorikeid` int(11) DEFAULT NULL,
  `udhezimperekzaminimerentgenologjikeid` int(11) DEFAULT NULL,
  `udhezimperkonsultimeid` int(11) DEFAULT NULL,
  `ta` float DEFAULT NULL,
  `pulsi` float DEFAULT NULL,
  `komenti` varchar(255) DEFAULT NULL,
  `spo2` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrekordetpax`
--

INSERT INTO `tblrekordetpax` (`rid`, `did`, `emri`, `prindi`, `mbiemri`, `gjinia`, `ditelindja`, `adresa`, `data_regjistrimit`, `shifra_veprimtarise`, `cmimi`, `NumriID`, `email`, `vendlindja`, `NumriDosjes`, `njesia`, `telefoni`, `diagnoza`, `ankesa`, `anamnezaesemundjes`, `anamnezaefamiljes`, `laboratori`, `trajtimi`, `perfundimi`, `raportimjeksorid`, `raportudhetimiperpasagjerid`, `receteid`, `udhezimperekzaminimelaboratorikeid`, `udhezimperekzaminimerentgenologjikeid`, `udhezimperkonsultimeid`, `ta`, `pulsi`, `komenti`, `spo2`) VALUES
(1, 2, 'Andi', 'Ardian', 'Shala', 'F', '1999-01-01', 'Prishtine', '2017-09-24 09:00:00', '0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 1, 'Besarb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 1, 'Besarb', NULL, NULL, '', '0000-00-00', 'Prishtine', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 1, 'Besarb', NULL, NULL, '', '0000-00-00', 'Prishtine', '2017-09-27 00:00:00', NULL, NULL, 1234, 'besi@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 1, 'Besarb', NULL, NULL, '', '0000-00-00', 'Prishtine', '2017-09-27 00:00:00', NULL, NULL, 1234, 'besi@hotmail.com', NULL, NULL, '', '044112222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 1, 'Besarb', NULL, NULL, '', '0000-00-00', 'Prishtine', '2017-09-27 00:00:00', NULL, NULL, 1234, 'besi@hotmail.com', NULL, NULL, '', '044112222', 'Thyrje e kembes', 'Dhembje e kembes', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 1, 'Besarb', NULL, NULL, '', '0000-00-00', 'Prishtine', '2017-09-27 00:00:00', NULL, NULL, 1234, 'besi@hotmail.com', NULL, NULL, '', '044112222', 'Thyrje e kembes', 'Dhembje e kembes', '', '', '', '', 'Demtim i ligamentit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 1, 'Besarb', NULL, NULL, '', '0000-00-00', 'Prishtine', '2017-09-27 00:00:00', NULL, NULL, 1234, 'besi@hotmail.com', NULL, NULL, '', '044112222', 'Thyrje e kembes', 'Dhembje e kembes', '', '', '', '', 'Demtim i ligamentit', NULL, NULL, 42, NULL, 33, NULL, NULL, NULL, NULL, NULL),
(164, 1, 'Besarb', NULL, NULL, '', '0000-00-00', 'Prishtine', '2017-09-27 00:00:00', NULL, NULL, 1234, 'besi@hotmail.com', NULL, NULL, '', '044112222', 'Thyrje e kembes', 'Dhembje e kembes', '', '', '', '', 'Demtim i ligamentit', NULL, NULL, 43, NULL, 34, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblrekordetpax`
--
ALTER TABLE `tblrekordetpax`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `did` (`did`),
  ADD KEY `receteid` (`receteid`),
  ADD KEY `raportimjeksorid` (`raportimjeksorid`),
  ADD KEY `raportudhetimiperpasagjerid` (`raportudhetimiperpasagjerid`),
  ADD KEY `udhezimperekzaminimelaboratorikeid` (`udhezimperekzaminimelaboratorikeid`),
  ADD KEY `udhezimperekzaminimerentgenologjikeid` (`udhezimperekzaminimerentgenologjikeid`),
  ADD KEY `udhezimperkonsultimeid` (`udhezimperkonsultimeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblrekordetpax`
--
ALTER TABLE `tblrekordetpax`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=165;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblrekordetpax`
--
ALTER TABLE `tblrekordetpax`
  ADD CONSTRAINT `tblrekordetpax_ibfk_1` FOREIGN KEY (`receteid`) REFERENCES `recete` (`ID`),
  ADD CONSTRAINT `tblrekordetpax_ibfk_2` FOREIGN KEY (`raportimjeksorid`) REFERENCES `raportimjeksor` (`ID`),
  ADD CONSTRAINT `tblrekordetpax_ibfk_3` FOREIGN KEY (`raportudhetimiperpasagjerid`) REFERENCES `raportudhetimiperpasagjer` (`ID`),
  ADD CONSTRAINT `tblrekordetpax_ibfk_4` FOREIGN KEY (`udhezimperekzaminimelaboratorikeid`) REFERENCES `udhezimperekzaminimelaboratorike` (`ID`),
  ADD CONSTRAINT `tblrekordetpax_ibfk_5` FOREIGN KEY (`udhezimperekzaminimerentgenologjikeid`) REFERENCES `udhezimperekzaminimerentgenologjike` (`ID`),
  ADD CONSTRAINT `tblrekordetpax_ibfk_6` FOREIGN KEY (`udhezimperkonsultimeid`) REFERENCES `udhezimperkonsultime` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
