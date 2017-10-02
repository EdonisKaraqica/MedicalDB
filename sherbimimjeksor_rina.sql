-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2017 at 07:08 AM
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
-- Table structure for table `largimngapuna`
--

CREATE TABLE IF NOT EXISTS `largimngapuna` (
  `ID` int(11) NOT NULL,
  `Prej` time NOT NULL,
  `Deri` time NOT NULL,
  `qellimiilargimit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `largimngapuna`
--

INSERT INTO `largimngapuna` (`ID`, `Prej`, `Deri`, `qellimiilargimit`) VALUES
(1, '12:30:00', '01:00:00', NULL),
(2, '12:00:00', '01:00:00', 'gripi'),
(3, '00:00:00', '00:00:00', ''),
(4, '00:00:00', '00:00:00', ''),
(5, '00:00:00', '00:00:00', ''),
(6, '00:00:00', '00:00:00', ''),
(7, '00:00:00', '00:00:00', ''),
(8, '00:00:00', '00:00:00', ''),
(9, '00:00:00', '00:00:00', ''),
(10, '03:00:00', '12:30:00', '3'),
(11, '12:30:00', '01:00:00', 'popo'),
(12, '12:30:00', '01:00:00', 'popo'),
(13, '12:30:00', '12:30:00', 'qef'),
(14, '12:30:00', '12:30:00', 'qef'),
(15, '12:30:00', '12:30:00', 'qef'),
(16, '12:30:00', '12:30:00', 'qef'),
(17, '12:30:00', '12:30:00', 'qef'),
(18, '12:30:00', '12:30:00', 'qef'),
(19, '12:30:00', '12:30:00', 'qef'),
(20, '12:30:00', '12:30:00', 'qef'),
(21, '12:30:00', '02:00:00', 'Kokedhembje'),
(22, '12:30:00', '02:00:00', 'Kokedhembje'),
(23, '12:30:00', '02:00:00', 'Kokedhembje'),
(24, '12:30:00', '02:00:00', 'Kokedhembje'),
(25, '12:30:00', '02:00:00', 'Kokedhembje'),
(26, '12:30:00', '02:00:00', 'Kokedhembje'),
(27, '12:30:00', '02:00:00', 'Kokedhembje'),
(28, '12:30:00', '01:00:00', 'Semundja'),
(29, '12:30:00', '01:00:00', 'Semundja'),
(30, '12:30:00', '01:00:00', 'Semundja'),
(31, '12:30:00', '01:00:00', 'Semundja');

-- --------------------------------------------------------

--
-- Table structure for table `raportimjeksor`
--

CREATE TABLE IF NOT EXISTS `raportimjeksor` (
  `ID` int(11) NOT NULL,
  `Raporti` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raportimjeksor`
--

INSERT INTO `raportimjeksor` (`ID`, `Raporti`) VALUES
(1, 'huhuhuh'),
(2, 'huhuhuh'),
(3, 'huhuhuh'),
(4, 'huhuhuh'),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, 'hello'),
(16, 'hello'),
(17, 'hello'),
(18, '1212'),
(19, '1212'),
(20, '1212'),
(21, '333'),
(22, '333'),
(23, '333'),
(24, 'hej'),
(25, 'popo'),
(26, 'I semure'),
(27, 'I semure'),
(28, 'I semure'),
(29, 'asas'),
(30, 'asas'),
(31, 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `raportinderprerjesseperkohshmeperpune`
--

CREATE TABLE IF NOT EXISTS `raportinderprerjesseperkohshmeperpune` (
  `ID` int(11) NOT NULL,
  `Entishendetesor` varchar(255) NOT NULL,
  `Ditaepare` date NOT NULL,
  `Ditaefundit` date NOT NULL,
  `Numriiditevepushim` float NOT NULL,
  `komenti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raportinderprerjesseperkohshmeperpune`
--

INSERT INTO `raportinderprerjesseperkohshmeperpune` (`ID`, `Entishendetesor`, `Ditaepare`, `Ditaefundit`, `Numriiditevepushim`, `komenti`) VALUES
(1, 'enti', '0000-00-00', '0000-00-00', 12, 'i semure'),
(2, '', '0000-00-00', '0000-00-00', 0, ''),
(3, '', '0000-00-00', '0000-00-00', 0, ''),
(4, '1', '0000-00-00', '0000-00-00', 11, 'sen'),
(5, '1', '0000-00-00', '0000-00-00', 11, 'sen'),
(6, '1', '0000-00-00', '0000-00-00', 11, 'sen'),
(7, '1', '0000-00-00', '0000-00-00', 11, 'sen'),
(8, '1', '0000-00-00', '0000-00-00', 11, 'sen'),
(9, '', '0000-00-00', '0000-00-00', 22, ''),
(10, '', '0000-00-00', '0000-00-00', 22, ''),
(11, '', '0000-00-00', '0000-00-00', 22, '');

-- --------------------------------------------------------

--
-- Table structure for table `raportudhetimiperpasagjer`
--

CREATE TABLE IF NOT EXISTS `raportudhetimiperpasagjer` (
  `ID` int(11) NOT NULL,
  `Origjina` varchar(255) NOT NULL,
  `Destinimi` varchar(255) NOT NULL,
  `Shenime` varchar(255) NOT NULL,
  `FileID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raportudhetimiperpasagjer`
--

INSERT INTO `raportudhetimiperpasagjer` (`ID`, `Origjina`, `Destinimi`, `Shenime`, `FileID`) VALUES
(1, '', '', '', 1),
(2, '', '', '', 1),
(3, '', '', '', 1),
(4, 'Prishtine', 'New York', 'Udhetim zyrtar', 1),
(5, 'Prishtine', 'New York', 'Udhetim zyrtar', 1),
(6, 'Prishtine', 'New York', 'Udhetim zyrtar', 1),
(7, 'Prishtine', 'Lyon', '', 1),
(8, 'Prishtine', 'Lyon', '', 1),
(9, 'Prishtine', 'Lyon', '', 1),
(10, 'Prishtine', 'Lyon', '', 1),
(11, 'Prishtine', 'Lyon', '', 1),
(12, 'Prishtine', 'Lyon', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recete`
--

CREATE TABLE IF NOT EXISTS `recete` (
  `ID` int(11) NOT NULL,
  `Rp` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recete`
--

INSERT INTO `recete` (`ID`, `Rp`) VALUES
(1, 'Paracetamol'),
(2, 'Paracetamol'),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, '1212'),
(9, '1212'),
(10, 'hello'),
(11, 'Paracetamol'),
(12, 'Paracetamol'),
(13, 'Paracetamol'),
(14, 'Paracetamol'),
(15, 'Paracetamol'),
(16, 'Paracetamol'),
(17, 'Paracetamol');

-- --------------------------------------------------------

--
-- Table structure for table `tbldoktoret`
--

CREATE TABLE `tbldoktoret` (
  `did` int(11) NOT NULL,
  `limakid` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `hashedpwd` varchar(50) NOT NULL,
  `salt` int(4) NOT NULL,
  `emri` varchar(20) NOT NULL,
  `prindi` varchar(30) NOT NULL,
  `mbiemri` varchar(20) NOT NULL,
  `gjinia` enum('F','M') NOT NULL,
  `ditelindja` date NOT NULL,
  `vendlindja` varchar(30) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `departamenti` varchar(30) NOT NULL,
  `mbikqyresi` varchar(30) NOT NULL,
  `nrtel` int(9) NOT NULL,
  `token` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logged` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `tbldoktoret`
--

INSERT INTO `tbldoktoret` (`did`, `limakid`, `username`, `hashedpwd`, `salt`, `emri`, `prindi`, `mbiemri`, `gjinia`, `ditelindja`, `vendlindja`, `adresa`, `email`, `departamenti`, `mbikqyresi`, `nrtel`, `token`, `logged`) VALUES
(1, 0, 'user1', '5f4dcc3b5aa765d61d8327deb882cf99', 1066, 'emri1', '', 'mbiemri1', 'F', '0000-00-00', '', 'emri 1 mbiemri 2,\nLipjan, Kosovo\n14000', 'emri@ggg.com', 'Medical', '', 44999999, '', 1),
(2, 7790, 'ekaraqica', 'qwdqwd', 1234, 'Edonis', 'Hamdi', 'Karaqica', 'M', '1996-07-12', 'Malisheve', 'Nr 24, Emshir, Prishtine, 10000', 'ekaraqica@limakasi.com', 'Medical', 'Dr. Bashkimi', 45554555, '', 1),
(3, 39393, 'dokdok', 'sdsd', 1234, 'doktor3', 'doktor', 'doktor3m', 'M', '1960-09-12', 'prishtine', 'prishtine', 'sd@wd.com', 'Medical', 'drb', 44444444, '', 0);
-- --------------------------------------------------------

--
-- Table structure for table `tblpacientatstaff`
--

CREATE TABLE `tblpacientatstaff` (
  `pid` int(11) NOT NULL,
  `limakid` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `hashedpwd` varchar(50) NOT NULL,
  `salt` int(4) NOT NULL,
  `emri` varchar(15) NOT NULL,
  `prindi` varchar(15) NOT NULL,
  `mbiemri` varchar(20) NOT NULL,
  `gjinia` enum('F','M') NOT NULL,
  `ditelindja` date NOT NULL,
  `vendlindja` varchar(30) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `departamenti` varchar(30) NOT NULL,
  `njesia` varchar(30) NOT NULL,
  `mbikqyresi` varchar(50) NOT NULL,
  `nrtel` int(9) NOT NULL,
  `token` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logged` tinyint(1) NOT NULL DEFAULT '0',
  `manager` tinyint(1) NOT NULL,
  `supervisor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpacientatstaff`
--

INSERT INTO `tblpacientatstaff` (`pid`, `limakid`, `username`, `hashedpwd`, `salt`, `emri`, `prindi`, `mbiemri`, `gjinia`, `ditelindja`, `vendlindja`, `adresa`, `email`, `departamenti`, `njesia`, `mbikqyresi`, `nrtel`, `token`, `logged`, `manager`, `supervisor`) VALUES
(1, 33333, 'user2', '5f4dcc3b5aa765d61d8327deb882cf99', 2162, 'emri2', 'emri2', 'mbiemri2', 'F', '1960-08-10', '', 'asfasfaasf', 'dsfsdfsdf', 'ICT', 'SAS', 'sdgsdgs', 44999999, '', 1, 0, 1),
(2, 7772, '88yy', '123', 1234, 'Besfort', 'Nexhmi', 'Shala', 'M', '1994-08-08', 'Barileve, Prishtine', 'Nr 88, Te shkolla, posht xhamise, \nBarileve, Prish', 'bshala@limakasi.com', 'ICT', 'SAS', 'Ali Krasniqi', 44877777, '', 0, 0, 0),
(3, 0, 'qweqw', '', 0, 'qweqw', 'ewqiuedq', 'weuifwe', 'M', '2000-08-08', 'jdwnwd', 'wdendwe', 'weenji', 'dwn', 'Elektronika', 'wefn', 999888777, '', 0, 0, 0),
(4, 35353, 'alikrasniqi', '5f4dcc3b5aa765d61d8327deb882cf99', 1234, 'Ali', '', 'Krasniqi', 'M', '1995-09-13', 'Prishtine', 'Prishtine', 'alikrasniqi@email.com', 'ICT', '', 'Ali Krasniqi', 44344344, '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblrekordetpax`
--

CREATE TABLE `tblrekordetpax` (
  `rid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `emri` varchar(30) NOT NULL,
  `prindi` varchar(30) NOT NULL,
  `mbiemri` varchar(30) NOT NULL,
  `gjinia` enum('F','M') NOT NULL,
  `ditelindja` date NOT NULL,
  `adresa` varchar(200) NOT NULL,
  `data_regjistrimit` datetime NOT NULL,
  `shifra_veprimtarise` varchar(11) NOT NULL,
  `ankesa` varchar(100) NOT NULL,
  `anamneza_konstatimi` varchar(100) NOT NULL,
  `diagnoza` varchar(100) NOT NULL,
  `terapia` varchar(100) NOT NULL,
  `ku_udhezohet` varchar(20) NOT NULL,
  `paraqitja_serishme` datetime NOT NULL,
  `cmimi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrekordetpax`
--

INSERT INTO `tblrekordetpax` (`rid`, `did`, `emri`, `prindi`, `mbiemri`, `gjinia`, `ditelindja`, `adresa`, `data_regjistrimit`, `shifra_veprimtarise`, `ankesa`, `anamneza_konstatimi`, `diagnoza`, `terapia`, `ku_udhezohet`, `paraqitja_serishme`, `cmimi`) VALUES
(1, 2, 'Andi', 'Ardian', 'Shala', 'F', '1999-01-01', 'Prishtine', '2017-09-24 09:00:00', '0', 'Ankon1', 'his e lendimit', 'sen ska', 'dy paraceta', '0', '0000-00-00 00:00:00', 0);
--
-- Table structure for table `tblrekordetstaff`
--

CREATE TABLE IF NOT EXISTS `tblrekordetstaff` (
  `rid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `data_regjistrimit` datetime DEFAULT NULL,
  `shifra_veprimtarise` varchar(11) NOT NULL,
  `diagnoza` varchar(100) DEFAULT NULL,
  `ankesa` varchar(255) DEFAULT NULL,
  `anamnezaesemundjes` varchar(255) DEFAULT NULL,
  `anamnezaefamiljes` varchar(255) DEFAULT NULL,
  `laboratori` varchar(255) DEFAULT NULL,
  `trajtimi` varchar(255) DEFAULT NULL,
  `perfundimi` varchar(255) DEFAULT NULL,
  `raportimjeksorid` int(11) DEFAULT NULL,
  `raportinderprerjesseperkohshmeperpuneID` int(15) DEFAULT NULL,
  `raportudhetimiperpasagjerid` int(11) DEFAULT NULL,
  `largimngapunaid` int(11) DEFAULT NULL,
  `receteid` int(11) DEFAULT NULL,
  `udhezimperekzaminimelaboratorikeid` int(11) DEFAULT NULL,
  `udhezimperekzaminimerentgenologjikeid` int(11) DEFAULT NULL,
  `udhezimperkonsultimeid` int(11) DEFAULT NULL,
  `ta` float DEFAULT NULL,
  `pulsi` float DEFAULT NULL,
  `komenti` varchar(255) DEFAULT NULL,
  `spo2` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;


--
-- Table structure for table `tblkerkesat`
--

CREATE TABLE `tblkerkesat` (
  `kid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `plotesuar_nga` int(11) NOT NULL,
  `data1` datetime NOT NULL,
  `data2` datetime NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `approved_by` int(11) DEFAULT NULL,
  `arsyetimi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkerkesat`
--

INSERT INTO `tblkerkesat` (`kid`, `pid`, `plotesuar_nga`, `data1`, `data2`, `approved`, `approved_by`, `arsyetimi`) VALUES
(1, 1, 2, '1990-01-01 00:00:00', '1990-01-02 00:00:00', 1, NULL, ''),
(2, 2, 4, '2017-09-27 00:00:00', '2017-09-29 00:00:00', 0, NULL, ''),
(3, 1, 4, '2017-09-17 08:00:00', '2017-09-24 08:00:00', 0, 0, ''),
(4, 1, 2, '1990-01-01 00:00:00', '1990-01-02 00:00:00', 0, NULL, ''),
(5, 1, 2, '1990-01-01 00:00:00', '1990-01-02 00:00:00', 1, NULL, ''),
(6, 1, 2, '1990-01-01 00:00:00', '1990-01-02 00:00:00', 0, NULL, ''),
(7, 1, 2, '1990-01-01 00:00:00', '1990-01-02 00:00:00', 0, NULL, 'nuk osht mir'),
(8, 1, 2, '1990-01-01 00:00:00', '1990-01-02 00:00:00', 0, NULL, 'nuk osht mir'),
(9, 1, 2, '1990-01-01 00:00:00', '1990-01-02 00:00:00', 0, NULL, 'nuk osht mir'),
(10, 1, 2, '1990-01-01 00:00:00', '1990-01-02 00:00:00', 0, NULL, 'nuk osht mir'),
(11, 1, 2, '1990-01-01 00:00:00', '1990-01-02 00:00:00', 0, NULL, 'nuk osht mir'),
(12, 1, 2, '1990-01-01 00:00:00', '1990-01-02 00:00:00', 0, NULL, 'nuk osht mir'),
(13, 1, 2, '1990-01-01 00:00:00', '1990-01-02 00:00:00', 0, NULL, 'nuk osht mir'),
(14, 1, 2, '1990-01-01 00:00:00', '1990-01-02 00:00:00', 0, NULL, 'nuk osht mir'),
(15, 2, 1, '2017-09-22 00:00:00', '2017-09-23 00:00:00', 0, NULL, 'ryrtytry'),
(16, 2, 1, '2017-09-25 00:00:00', '2017-09-29 00:00:00', 0, NULL, 'osht smut'),
(17, 2, 1, '2017-09-22 00:00:00', '2017-09-23 00:00:00', 0, NULL, 'aspdsam mkasd kmasd '),
(18, 2, 1, '2017-09-06 00:00:00', '2017-09-20 00:00:00', 0, NULL, 'nuuyju8'),
(19, 2, 1, '2017-09-19 00:00:00', '2017-09-27 00:00:00', 0, NULL, 'sadasd'),
(20, 2, 1, '2017-09-12 00:00:00', '2017-09-21 00:00:00', 0, NULL, 'erterg'),
(21, 2, 1, '2017-09-12 00:00:00', '2017-09-21 00:00:00', 0, NULL, 'retert'),
(22, 2, 1, '2017-09-27 00:00:00', '2017-09-29 00:00:00', 0, NULL, 'asfasfasf'),
(23, 2, 1, '2017-09-20 00:00:00', '2017-09-22 00:00:00', 0, NULL, 'asdsadasdasd'),
(24, 2, 1, '2017-09-11 00:00:00', '2017-09-20 00:00:00', 0, NULL, 'dfdsf'),
(25, 2, 1, '2017-09-20 00:00:00', '2017-09-22 00:00:00', 0, NULL, 'sdfdsf'),
(26, 2, 1, '2017-09-20 00:00:00', '2017-09-30 00:00:00', 0, NULL, 'asfasfasfasf'),
(27, 2, 1, '2017-09-20 00:00:00', '2017-09-30 00:00:00', 0, NULL, 'asfasfasfasf'),
(28, 2, 1, '2017-09-20 00:00:00', '2017-09-30 00:00:00', 0, NULL, 'asfasfasfasf'),
(29, 2, 1, '2017-09-20 00:00:00', '2017-09-30 00:00:00', 0, NULL, 'asfasfasfasf'),
(30, 2, 1, '2017-09-20 00:00:00', '2017-09-30 00:00:00', 0, NULL, 'asfasfasfasf'),
(31, 2, 1, '2017-09-25 00:00:00', '2017-09-29 00:00:00', 0, NULL, 'asfsaf'),
(32, 2, 1, '2017-09-26 00:00:00', '2017-09-28 00:00:00', 0, NULL, 'agreherh'),
(33, 2, 1, '2017-09-28 00:00:00', '2017-09-30 00:00:00', 0, NULL, 'rtyert'),
(34, 2, 1, '2017-09-28 00:00:00', '2017-09-30 00:00:00', 0, NULL, 'rtyert'),
(35, 2, 1, '2017-09-28 00:00:00', '2017-09-30 00:00:00', 0, NULL, 'rtyert'),
(36, 2, 1, '2017-09-28 00:00:00', '2017-09-30 00:00:00', 0, NULL, 'rtyert'),
(37, 2, 1, '2017-09-05 00:00:00', '2017-09-15 00:00:00', 0, NULL, 'sadfdfdsgrr');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `content` mediumblob NOT NULL,
  `sdsd` int(11) NOT NULL,
  `asdasd` int(11) NOT NULL,
  `123` int(11) NOT NULL,
  `212` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

--
-- Dumping data for table `tblrekordetstaff`
--

INSERT INTO `tblrekordetstaff` (`rid`, `pid`, `did`, `data_regjistrimit`, `shifra_veprimtarise`, `diagnoza`, `ankesa`, `anamnezaesemundjes`, `anamnezaefamiljes`, `laboratori`, `trajtimi`, `perfundimi`, `raportimjeksorid`, `raportinderprerjesseperkohshmeperpuneID`, `raportudhetimiperpasagjerid`, `largimngapunaid`, `receteid`, `udhezimperekzaminimelaboratorikeid`, `udhezimperekzaminimerentgenologjikeid`, `udhezimperkonsultimeid`, `ta`, `pulsi`, `komenti`, `spo2`) VALUES
(1, 1, 1, '2017-09-05 11:00:00', 'GK20', 'diagnoza 1 2 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 3, 2, '2017-09-07 12:00:00', 'LM20', 'koxha i smut', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1234, 4, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 3, 4, NULL, NULL, NULL, NULL),
(19, 1234, 4, '0000-00-00 00:00:00', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 4, 5, NULL, NULL, NULL, NULL),
(20, 1234, 4, '0000-00-00 00:00:00', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1234, 4, '0000-00-00 00:00:00', '4', NULL, 'kokedhembje', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1234, 4, '0000-00-00 00:00:00', '4', 'I ftohur', 'Gripi', 'Ftohje', '', '', '', 'I semur', 28, 11, 6, NULL, NULL, NULL, NULL, 8, 1, 1, '1', 1),
(24, 1234, 4, '0000-00-00 00:00:00', '4', 'Kaluese ', 'Stres', 'Provime', '', '', '', '', NULL, NULL, NULL, 29, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL),
(25, 1234, 4, '0000-00-00 00:00:00', '4', 'Kaluese ', 'Stres', 'Provime', '', '', '', '', NULL, NULL, NULL, 30, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL),
(26, 1234, 4, '0000-00-00 00:00:00', '4', 'Kaluese ', 'Stres', 'Provime', '', '', '', '', NULL, NULL, NULL, 31, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL),
(27, 1234, 4, '0000-00-00 00:00:00', '4', '', 'Fyti', '', '', '', '', 'Gripi', NULL, NULL, 7, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 1234, 4, '0000-00-00 00:00:00', '4', '', 'Fyti', '', '', '', '', 'Gripi', NULL, NULL, 8, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 1234, 4, '0000-00-00 00:00:00', '4', '', 'Fyti', '', '', '', '', 'Gripi', NULL, NULL, 9, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 1234, 4, '0000-00-00 00:00:00', '4', '', 'Fyti', '', '', '', '', 'Gripi', 29, NULL, 10, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 1234, 4, '0000-00-00 00:00:00', '4', '', 'Fyti', '', '', '', '', 'Gripi', 30, NULL, 11, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 1234, 4, '0000-00-00 00:00:00', '4', '', 'Fyti', '', '', '', '', 'Gripi', 31, NULL, 12, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `udhezimperekzaminimelaboratorike`
--

CREATE TABLE IF NOT EXISTS `udhezimperekzaminimelaboratorike` (
  `ID` int(11) NOT NULL,
  `Udhezohetper` varchar(255) NOT NULL,
  `Gjendjaprezente` varchar(255) NOT NULL,
  `Terapiaeaplikuar` varchar(255) NOT NULL,
  `FileID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `udhezimperekzaminimelaboratorike`
--

INSERT INTO `udhezimperekzaminimelaboratorike` (`ID`, `Udhezohetper`, `Gjendjaprezente`, `Terapiaeaplikuar`, `FileID`) VALUES
(1, '', '', '', 0),
(2, '', '', '', 1),
(3, '', '', '', 1),
(4, 'hello', 'hello', 'hello', 1),
(5, 'hello', 'hello', 'hello', 1),
(6, 'Rentgen', 'Stabile', 'Barna', 1),
(7, 'Rentgen', 'Stabile', 'Barna', 1),
(8, 'Rentgen', 'Stabile', 'Barna', 1),
(9, 'Rentgen', 'Stabile', 'Barna', 1),
(10, 'Rentgen', 'Stabile', 'Barna', 1),
(11, 'Rentgen', 'Stabile', 'Barna', 1);

-- --------------------------------------------------------

--
-- Table structure for table `udhezimperekzaminimerentgenologjike`
--

CREATE TABLE IF NOT EXISTS `udhezimperekzaminimerentgenologjike` (
  `ID` int(11) NOT NULL,
  `Udhezohetper` varchar(255) NOT NULL,
  `Gjendjaprezente` varchar(255) NOT NULL,
  `Terapiaeaplikuar` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `udhezimperekzaminimerentgenologjike`
--

INSERT INTO `udhezimperekzaminimerentgenologjike` (`ID`, `Udhezohetper`, `Gjendjaprezente`, `Terapiaeaplikuar`) VALUES
(1, '', '', ''),
(2, 'hello', 'po', 'po'),
(3, 'hello', 'hello', 'hello'),
(4, 'hello', 'hello', 'hello'),
(5, 'Rentgen', 'ME dhimbje', 'Paracetamol'),
(6, 'Rentgen', 'ME dhimbje', 'Paracetamol'),
(7, 'Rentgen', 'ME dhimbje', 'Paracetamol'),
(8, 'Rentgen', 'ME dhimbje', 'Paracetamol');

-- --------------------------------------------------------


--
-- Table structure for table `udhezimperkonsultime`
--

CREATE TABLE IF NOT EXISTS `udhezimperkonsultime` (
  `ID` int(11) NOT NULL,
  `Udhezohetper` varchar(255) NOT NULL,
  `Gjendjaprezente` varchar(255) NOT NULL,
  `Terapiaeaplikuar` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `udhezimperkonsultime`
--

INSERT INTO `udhezimperkonsultime` (`ID`, `Udhezohetper`, `Gjendjaprezente`, `Terapiaeaplikuar`) VALUES
(1, '', '', ''),
(2, 'helo', 'helo', 'helo'),
(3, 'helo', 'helo', 'helo'),
(4, 'po', 'po', 'po'),
(5, 'po', 'po', 'po'),
(6, 'Edonis Karaqica', '', ''),
(7, 'Edonis Karaqica', '', ''),
(8, 'Edonis Karaqica', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `largimngapuna`
--
ALTER TABLE `largimngapuna`
  ADD PRIMARY KEY (`ID`);
  
  --
-- Indexes for table `tblrekordetpax`
--
ALTER TABLE `tblrekordetpax`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `raportimjeksor`
--
ALTER TABLE `raportimjeksor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `raportinderprerjesseperkohshmeperpune`
--
ALTER TABLE `raportinderprerjesseperkohshmeperpune`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `raportudhetimiperpasagjer`
--
ALTER TABLE `raportudhetimiperpasagjer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `recete`
--
ALTER TABLE `recete`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT for table `tblrekordetpax`
--
ALTER TABLE `tblrekordetpax`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=165;
--
-- Constraints for dumped tables
--

--
-- Indexes for table `tblrekordetstaff`
--
ALTER TABLE `tblrekordetstaff`
  ADD PRIMARY KEY (`rid`),
  ADD UNIQUE KEY `ekzaminimifiskal` (`ta`,`spo2`,`komenti`,`pulsi`),
  ADD KEY `pid` (`pid`),
  ADD KEY `did` (`did`),
  ADD KEY `raportimjeksorid` (`raportimjeksorid`),
  ADD KEY `raportinderprerjesseperkohshmeperpuneID` (`raportinderprerjesseperkohshmeperpuneID`),
  ADD KEY `raportudhetimiperpasagjerid` (`raportudhetimiperpasagjerid`),
  ADD KEY `largimngapunaid` (`largimngapunaid`),
  ADD KEY `receteid` (`receteid`),
  ADD KEY `udhezimperekzaminimelaboratorikeid` (`udhezimperekzaminimelaboratorikeid`),
  ADD KEY `udhezimperekzaminimerentgenologjikeid` (`udhezimperekzaminimerentgenologjikeid`),
  ADD KEY `udhezimperkonsultimeid` (`udhezimperkonsultimeid`);

--
-- Indexes for table `udhezimperekzaminimelaboratorike`
--
ALTER TABLE `udhezimperekzaminimelaboratorike`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `udhezimperekzaminimerentgenologjike`
--
ALTER TABLE `udhezimperekzaminimerentgenologjike`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `udhezimperkonsultime`
--
ALTER TABLE `udhezimperkonsultime`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `largimngapuna`
--
ALTER TABLE `largimngapuna`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `raportimjeksor`
--
ALTER TABLE `raportimjeksor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `raportinderprerjesseperkohshmeperpune`
--
ALTER TABLE `raportinderprerjesseperkohshmeperpune`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `raportudhetimiperpasagjer`
--
ALTER TABLE `raportudhetimiperpasagjer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `recete`
--
ALTER TABLE `recete`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbldoktoret`
--
ALTER TABLE `tbldoktoret`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblpacientatstaff`
--
ALTER TABLE `tblpacientatstaff`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `tblrekordetpax`
--
ALTER TABLE `tblrekordetpax`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblrekordetstaff`
--
ALTER TABLE `tblrekordetstaff`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `udhezimperekzaminimelaboratorike`
--
ALTER TABLE `udhezimperekzaminimelaboratorike`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `udhezimperekzaminimerentgenologjike`
--
ALTER TABLE `udhezimperekzaminimerentgenologjike`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `udhezimperkonsultime`
--
ALTER TABLE `udhezimperkonsultime`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblrekordetpax`
--
ALTER TABLE `tblrekordetpax`
  ADD CONSTRAINT `tblrekordetpax_ibfk_1` FOREIGN KEY (`did`) REFERENCES `tbldoktoret` (`did`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

--
-- Constraints for table `tblrekordetstaff`
--
ALTER TABLE `tblrekordetstaff`
  ADD CONSTRAINT `tblrekordetstaff_ibfk_1` FOREIGN KEY (`raportimjeksorid`) REFERENCES `raportimjeksor` (`ID`),
  ADD CONSTRAINT `tblrekordetstaff_ibfk_2` FOREIGN KEY (`raportinderprerjesseperkohshmeperpuneID`) REFERENCES `raportinderprerjesseperkohshmeperpune` (`ID`),
  ADD CONSTRAINT `tblrekordetstaff_ibfk_3` FOREIGN KEY (`raportudhetimiperpasagjerid`) REFERENCES `raportimjeksor` (`ID`),
  ADD CONSTRAINT `tblrekordetstaff_ibfk_4` FOREIGN KEY (`largimngapunaid`) REFERENCES `largimngapuna` (`ID`),
  ADD CONSTRAINT `tblrekordetstaff_ibfk_5` FOREIGN KEY (`receteid`) REFERENCES `recete` (`ID`),
  ADD CONSTRAINT `tblrekordetstaff_ibfk_6` FOREIGN KEY (`udhezimperekzaminimelaboratorikeid`) REFERENCES `udhezimperekzaminimelaboratorike` (`ID`),
  ADD CONSTRAINT `tblrekordetstaff_ibfk_7` FOREIGN KEY (`udhezimperekzaminimerentgenologjikeid`) REFERENCES `udhezimperekzaminimerentgenologjike` (`ID`),
  ADD CONSTRAINT `tblrekordetstaff_ibfk_8` FOREIGN KEY (`udhezimperkonsultimeid`) REFERENCES `udhezimperkonsultime` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
