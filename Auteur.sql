-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2019 at 05:36 PM
-- Server version: 5.5.62-0+deb8u1
-- PHP Version: 5.6.38-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tts2330a`
--

-- --------------------------------------------------------

--
-- Table structure for table `Auteur`
--

CREATE TABLE IF NOT EXISTS `Auteur` (
`IdAuteur` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=780 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Auteur`
--

INSERT INTO `Auteur` (`IdAuteur`, `Nom`) VALUES
(45, 'FERHANE'),
(777, 'ET-TALEBY'),
(778, 'FERHANE 2'),
(779, 'ET-TALEBY 666');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Auteur`
--
ALTER TABLE `Auteur`
 ADD PRIMARY KEY (`IdAuteur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Auteur`
--
ALTER TABLE `Auteur`
MODIFY `IdAuteur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=780;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
