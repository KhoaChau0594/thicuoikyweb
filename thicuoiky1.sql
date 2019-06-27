-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2019 at 12:44 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thicuoiky1`
--

-- --------------------------------------------------------

--
-- Table structure for table `docgia`
--

CREATE TABLE `docgia` (
  `MADOCGIA` varchar(50) NOT NULL,
  `TENDOCGIA` varchar(50) NOT NULL,
  `SODIENTHOAI` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docgia`
--

INSERT INTO `docgia` (`MADOCGIA`, `TENDOCGIA`, `SODIENTHOAI`) VALUES
('1', 'Khoa', '0948311001'),
('2', 'Gia Loc', '0938664253');

-- --------------------------------------------------------

--
-- Table structure for table `muonsach`
--

CREATE TABLE `muonsach` (
  `MADOCGIA` varchar(50) NOT NULL,
  `MASACH` varchar(50) NOT NULL,
  `NGAYMUON` date NOT NULL,
  `NGAYTRA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muonsach`
--

INSERT INTO `muonsach` (`MADOCGIA`, `MASACH`, `NGAYMUON`, `NGAYTRA`) VALUES
('1', 'SACH02', '2019-06-13', '0000-00-00'),
('1', 'SACH03', '2019-06-26', '0000-00-00'),
('2', 'SACH02', '2019-06-28', '0000-00-00'),
('2', 'SACH03', '2019-07-24', '2019-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `MASACH` varchar(50) NOT NULL,
  `TUADE` varchar(50) NOT NULL,
  `GIA` decimal(10,0) NOT NULL,
  `NAMXB` varchar(4) NOT NULL,
  `TRANGTHAI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`MASACH`, `TUADE`, `GIA`, `NAMXB`, `TRANGTHAI`) VALUES
('SACH02', 'Khoa Dep Trai', '111111111', '1998', 0),
('SACH03', 'Khoa Dep Trai', '111111111', '1998', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `docgia`
--
ALTER TABLE `docgia`
  ADD PRIMARY KEY (`MADOCGIA`);

--
-- Indexes for table `muonsach`
--
ALTER TABLE `muonsach`
  ADD PRIMARY KEY (`MADOCGIA`,`MASACH`),
  ADD KEY `MASACH` (`MASACH`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`MASACH`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `muonsach`
--
ALTER TABLE `muonsach`
  ADD CONSTRAINT `muonsach_ibfk_1` FOREIGN KEY (`MADOCGIA`) REFERENCES `docgia` (`MADOCGIA`),
  ADD CONSTRAINT `muonsach_ibfk_2` FOREIGN KEY (`MASACH`) REFERENCES `sach` (`MASACH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
