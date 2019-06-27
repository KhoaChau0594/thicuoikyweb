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
-- Database: `thicuoiky2`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang02`
--

CREATE TABLE `chitietdonhang02` (
  `MADH` int(11) NOT NULL,
  `MAHH` int(11) NOT NULL,
  `SOLUONG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `chitietdonhang02`
--

INSERT INTO `chitietdonhang02` (`MADH`, `MAHH`, `SOLUONG`) VALUES
(1, 1, 5),
(1, 2, 10),
(1, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dochang`
--

CREATE TABLE `dochang` (
  `MADH` int(11) NOT NULL,
  `TENDH` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `NGAYDAT` date NOT NULL,
  `MAKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `dochang`
--

INSERT INTO `dochang` (`MADH`, `TENDH`, `NGAYDAT`, `MAKH`) VALUES
(1, 'Mo hang cho chau', '2019-06-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MAHH` int(11) NOT NULL,
  `TENHH` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `GIA` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MAHH`, `TENHH`, `GIA`) VALUES
(1, 'Ao so-mi', 250000),
(2, 'Quan Jean Hello Kitty', 350000),
(3, 'Nuoc muoi 0.9%', 15000),
(4, 'Binh nuoc Lock & Lock', 150000),
(5, 'Giuong', 500000),
(6, 'Chieu', 50000),
(7, 'Goi', 65000),
(8, 'Cap', 500000),
(9, 'Giay', 950000),
(10, 'Xao phoi do', 105000),
(11, 'Du ma bia ra met vkl', 9999999);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` int(11) NOT NULL,
  `TENKH` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `DIACHI` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TENKH`, `DIACHI`) VALUES
(1, 'Khoa', 'VietNam'),
(2, 'Huy', 'England'),
(3, 'Nhan', 'Campuchia'),
(4, 'Hoan', 'Hue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang02`
--
ALTER TABLE `chitietdonhang02`
  ADD PRIMARY KEY (`MADH`,`MAHH`),
  ADD KEY `MAHH` (`MAHH`);

--
-- Indexes for table `dochang`
--
ALTER TABLE `dochang`
  ADD PRIMARY KEY (`MADH`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MAHH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dochang`
--
ALTER TABLE `dochang`
  MODIFY `MADH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MAHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MAKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang02`
--
ALTER TABLE `chitietdonhang02`
  ADD CONSTRAINT `chitietdonhang02_ibfk_1` FOREIGN KEY (`MADH`) REFERENCES `dochang` (`MADH`),
  ADD CONSTRAINT `chitietdonhang02_ibfk_2` FOREIGN KEY (`MAHH`) REFERENCES `hanghoa` (`MAHH`);

--
-- Constraints for table `dochang`
--
ALTER TABLE `dochang`
  ADD CONSTRAINT `dochang_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`),
  ADD CONSTRAINT `dochang_ibfk_2` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
