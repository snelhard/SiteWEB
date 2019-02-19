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
-- Table structure for table `Livre`
--

CREATE TABLE IF NOT EXISTS `Livre` (
  `IdLivre` int(11) NOT NULL,
  `Titre` varchar(50) NOT NULL,
  `idAuteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Livre`
--

INSERT INTO `Livre` (`IdLivre`, `Titre`, `idAuteur`) VALUES
(1, 'Martine à bellefontaine', 777),
(2, 'Il était une fois au mirail', 45),
(3, 'Le livre 3', 778);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Livre`
--
ALTER TABLE `Livre`
 ADD KEY `fk_livre_IdAuteur` (`idAuteur`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Livre`
--
ALTER TABLE `Livre`
ADD CONSTRAINT `fk_livre_IdAuteur` FOREIGN KEY (`idAuteur`) REFERENCES `Auteur` (`IdAuteur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
