-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 11:29 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `funfactsalarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `fact`
--

CREATE TABLE `fact` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Text` varchar(1024) NOT NULL,
  `Author` varchar(40) NOT NULL,
  `Image` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fact`
--

INSERT INTO `fact` (`ID`, `Title`, `Text`, `Author`, `Image`) VALUES
(1, 'Teester 1', 'Testert niet teester', '', 'http://s3-eu-west-1.amazonaws.com/mijntuin/groennet/uploadedImages/radijs(2).jpg'),
(2, 'Testert 2', 'Testert testen radijs', '', 'http://s3-eu-west-1.amazonaws.com/mijntuin/groennet/uploadedImages/radijs(2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pendingfact`
--

CREATE TABLE `pendingfact` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Text` varchar(1024) NOT NULL,
  `Author` varchar(40) NOT NULL,
  `Image` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fact`
--
ALTER TABLE `fact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pendingfact`
--
ALTER TABLE `pendingfact`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fact`
--
ALTER TABLE `fact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pendingfact`
--
ALTER TABLE `pendingfact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
